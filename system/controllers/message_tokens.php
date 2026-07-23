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

    case 'token/recharge':
        header('Content-Type: application/json');

        // Call your Daraja STK Push function
        $stkResult = Mpesa::stkPush($admin['phonenumber'], 100); // Example: KES 100 for tokens

        if ($stkResult['status'] == 'success') {
            echo json_encode(['status' => 'success', 'message' => 'STK Push sent. Enter your M-Pesa PIN.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to send STK Push.']);
        }
        exit;

    default:
        echo "Invalid action";
        break;
}
