
<?php

function mtokens_payment_notification()
{
    // Read callback data
    $callbackJSON = file_get_contents('php://input');
    $callbackData = json_decode($callbackJSON, true);

    if (!isset($callbackData['Body']['stkCallback'])) {
        http_response_code(400);
        echo "Invalid callback format";
        return;
    }

    $stkCallback = $callbackData['Body']['stkCallback'];
    $resultCode  = $stkCallback['ResultCode'];
    $resultDesc  = $stkCallback['ResultDesc'];

    if ($resultCode == 0) {
        $amount = null;
        $phoneNumber = null;
        $mpesaReceipt = null;

        if (isset($stkCallback['CallbackMetadata']['Item'])) {
            foreach ($stkCallback['CallbackMetadata']['Item'] as $item) {
                if ($item['Name'] == 'Amount') {
                    $amount = $item['Value'];
                }
                if ($item['Name'] == 'PhoneNumber') {
                    $phoneNumber = $item['Value'];
                }
                if ($item['Name'] == 'MpesaReceiptNumber') {
                    $mpesaReceipt = $item['Value'];
                }
            }
        }

        // Convert amount to tokens (1 KES = 5 tokens)
        $tokensToAdd = intval($amount) * 5;

        // Fetch and update tokens in tbl_appconfig
        $tokenConfig = ORM::for_table('tbl_appconfig')
            ->where('setting', 'token_message')
            ->find_one();

        if ($tokenConfig) {
            $tokenConfig->value = (int)$tokenConfig->value + $tokensToAdd;
            $tokenConfig->save();
        } else {
            // If token_message doesn’t exist, create it
            $newToken = ORM::for_table('tbl_appconfig')->create();
            $newToken->setting = 'token_message';
            $newToken->value   = $tokensToAdd;
            $newToken->save();
        }

    }

    // Always reply success to Safaricom
    echo json_encode([
        "ResultCode" => 0,
        "ResultDesc" => "Callback received successfully"
    ]);
}

