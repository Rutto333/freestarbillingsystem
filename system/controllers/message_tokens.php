<?php

/**
 *  PHP Mikrotik Billing (https://github.com/hotspotbilling/phpnuxbill/)
 *  by https://t.me/ibnux
 **/

_admin();
$ui->assign('_title', Lang::T('Message Tokens'));
$ui->assign('_system_menu', 'message');

$action = $routes['1'];
$ui->assign('_admin', $admin);


switch ($action) {

    case 'token':
            $tokenBalance = ORM::for_table('tbl_appconfig')->where('setting', 'token_message')->find_one();

            if (!$tokenBalance) {
                // Row doesn't exist yet, create it
                $tokenBalance = ORM::for_table('tbl_appconfig')->create();
                $tokenBalance->setting = 'token_message';
                $tokenBalance->value = 0;
                $tokenBalance->save();
            }

            $ui->assign('tokenBalance', $tokenBalance->value);
            $ui->display('admin/message/message_tokens.tpl');
            break;

    default:
        echo "Invalid action";
        break;
}
