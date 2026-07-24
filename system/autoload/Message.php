<?php

/**
 *  PHP Mikrotik Billing (https://github.com/hotspotbilling/phpnuxbill/)
 *  by https://t.me/ibnux
 **/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PEAR2\Net\RouterOS;

require $root_path . 'system/autoload/mail/Exception.php';
require $root_path . 'system/autoload/mail/PHPMailer.php';
require $root_path . 'system/autoload/mail/SMTP.php';

class Message
{

    public static function sendTelegram($txt, $chat_id = null, $topik = '')
    {
        global $config;
        run_hook('send_telegram', [$txt, $chat_id, $topik]); #HOOK
        if (!empty($config['telegram_bot'])) {
            if (empty($chat_id)) {
                $chat_id = $config['telegram_target_id'];
            }
            if (!empty($topik)) {
                $topik = "message_thread_id=$topik&";
            }
            return Http::getData('https://api.telegram.org/bot' . $config['telegram_bot'] . '/sendMessage?' . $topik . 'chat_id=' . $chat_id . '&text=' . urlencode($txt));
        }
    }


    public static function sendSMS($phone, $txt)
    {
        global $config;
        if (empty($txt)) {
            return "";
        }
        run_hook('send_sms', [$phone, $txt]); #HOOK

        $use_system = (!empty($config['use_system_notification']) && $config['use_system_notification'] == 'yes');

        $sms_url = $use_system
            ? (!empty($config['system_sms_url']) ? $config['system_sms_url'] : '')
            : (!empty($config['sms_url']) ? $config['sms_url'] : '');

        if (empty($sms_url)) {
            return "";
        }

        if ($use_system && !self::deductTokenBalance(1)) {
            return "";
        }

        if (strlen($sms_url) > 4 && substr($sms_url, 0, 4) != "http") {
            if (strlen($txt) > 160) {
                $txts = str_split($txt, 160);
                try {
                    foreach ($txts as $t) {
                        self::MikrotikSendSMS($sms_url, $phone, $t);
                    }
                } catch (Throwable $e) {
                }
            } else {
                try {
                    self::MikrotikSendSMS($sms_url, $phone, $txt);
                } catch (Throwable $e) {
                }
            }
        } else {
            $smsurl = str_replace('[number]', urlencode($phone), $sms_url);
            $smsurl = str_replace('[text]', urlencode($txt), $smsurl);
            try {
                $response = Http::getData($smsurl);
                return $response;
            } catch (Throwable $e) {
            }
        }
    }

    public static function sendWhatsapp($phone, $txt)
    {
        global $config;
        if (empty($txt)) {
            return "kosong";
        }

        run_hook('send_whatsapp', [$phone, $txt]); // HOOK

        $use_system = (!empty($config['use_system_notification']) && $config['use_system_notification'] == 'yes');

        $wa_url = $use_system
            ? (!empty($config['system_sms_url']) ? $config['system_sms_url'] : '')
            : (!empty($config['wa_url']) ? $config['wa_url'] : '');

        if (empty($wa_url)) {
            return "";
        }

        if ($use_system && !self::deductTokenBalance(1)) {
            return "";
        }

        $waurl = str_replace('[number]', urlencode(Lang::phoneFormat($phone)), $wa_url);
        $waurl = str_replace('[text]', urlencode($txt), $waurl);

        try {
            $response = Http::getData($waurl);
            return $response;
        } catch (Throwable $e) {
            return "";
        }
    }

    /**
     * Deducts $cost tokens (default 1 per message) from the system token balance
     * stored in tbl_appconfig. Returns true if the deduction succeeded, false if
     * balance is insufficient or the update failed.
     */
    private static function deductTokenBalance($cost = 1)
    {
        global $config;
        $current = isset($config['token_message']) ? (float) $config['token_message'] : 0;

        if ($current < $cost) {
            return false;
        }

        $new_balance = $current - $cost;

        try {
            $row = ORM::for_table('tbl_appconfig')->where('setting', 'token_message')->find_one();
            if (!$row) {
                return false;
            }
            $row->value = $new_balance;
            $row->save();
            $config['token_message'] = $new_balance; // keep in-memory config in sync
            return true;
        } catch (Throwable $e) {
            return false;
        }
    }
}
