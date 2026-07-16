<?php
require_once __DIR__ . '/../autoload/Package.php';

$requestUri = $_SERVER['REQUEST_URI'];
$queryString = parse_url($requestUri, PHP_URL_QUERY);
$kind = null;

if ($queryString) {
    parse_str($queryString, $queryParameters);
    if (isset($queryParameters['kind'])) {
        $kind = $queryParameters['kind'];
        if ($kind === "register") {
            RegisterUrl();
            exit;
        } elseif ($kind === "confirmation") {
            ConfirmationURL();
            exit;
        } elseif ($kind === "validation") {
            ValidationURL();
            exit;
        } else {
            echo "This is unknown URL";
            exit;
        }
    }
}

function generateAccessToken()
{
    $mpesa_env = ORM::for_table('tbl_appconfig')
        ->where('setting', 'mpesa_env')
        ->find_one();
    $mpesa_env = ($mpesa_env) ? $mpesa_env->value : null;

    $mpesa_consumer_key = ORM::for_table('tbl_appconfig')
        ->where('setting', 'mpesa_consumer_key')
        ->find_one();
    $mpesa_consumer_key = ($mpesa_consumer_key) ? $mpesa_consumer_key->value : null;

    $mpesa_consumer_secret = ORM::for_table('tbl_appconfig')
        ->where('setting', 'mpesa_consumer_secret')
        ->find_one();
    $mpesa_consumer_secret = ($mpesa_consumer_secret) ? $mpesa_consumer_secret->value : null;

    // Validate required configurations
    if (!$mpesa_env || !$mpesa_consumer_key || !$mpesa_consumer_secret) {
        return null;
    }

    if ($mpesa_env == "live") {
        $access_token_url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    } elseif ($mpesa_env == "sandbox") {
        $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    } else {
        return null;
    }

    $headers = ['Content-Type:application/json; charset=utf8'];
    $curl = curl_init($access_token_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $mpesa_consumer_key . ':' . $mpesa_consumer_secret);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    
    $result = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if ($result === false || $httpCode !== 200) {
        return null;
    }

    $result = json_decode($result);
    return isset($result->access_token) ? $result->access_token : null;
}

function RegisterUrl()
{
    $access_token = generateAccessToken();
    if ($access_token == null) {
        r2(U . 'paymentgateway/mpesa', 'e', "Failed to generate access token");
        return;
    }

    $mpesa_business_code = ORM::for_table('tbl_appconfig')
        ->where('setting', 'mpesa_business_code')
        ->find_one();
    $mpesa_business_code = ($mpesa_business_code) ? $mpesa_business_code->value : null;

    $mpesa_env = ORM::for_table('tbl_appconfig')
        ->where('setting', 'mpesa_env')
        ->find_one();
    $mpesa_env = ($mpesa_env) ? $mpesa_env->value : null;

    if (!$mpesa_business_code || !$mpesa_env) {
        r2(U . 'paymentgateway/mpesa', 'e', "Missing M-Pesa configuration");
        return;
    }

    $confirmationUrl = U . 'plugin/c2b&kind=confirmation';
    $validationUrl = U . 'plugin/c2b&kind=validation';
    $BusinessShortCode = $mpesa_business_code;

    $mpesa_api_version = ORM::for_table('tbl_appconfig')
        ->where('setting', 'mpesa_api_version')
        ->find_one();
    $mpesa_api_version = ($mpesa_api_version) ? $mpesa_api_version->value : 'v1';

    if ($mpesa_env == "live") {
        if ($mpesa_api_version == "v2") {
            $registerurl = 'https://api.safaricom.co.ke/mpesa/c2b/v2/registerurl';
        } else {
            $registerurl = 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        }
    } elseif ($mpesa_env == "sandbox") {
        $registerurl = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
    } else {
        r2(U . 'paymentgateway/mpesa', 'e', "Invalid M-Pesa environment");
        return;
    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $registerurl);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type:application/json',
        'Authorization:Bearer ' . $access_token
    ));

    $data = array(
        'ShortCode' => $BusinessShortCode,
        'ResponseType' => 'Completed',
        'ConfirmationURL' => $confirmationUrl,
        'ValidationURL' => $validationUrl
    );

    $data_string = json_encode($data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    
    $curl_response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if ($curl_response === false || $httpCode !== 200) {
        r2(U . 'paymentgateway/mpesa', 'e', "Failed to connect to M-Pesa API");
        return;
    }

    $data = json_decode($curl_response);

    if (isset($data->ResponseCode) && $data->ResponseCode == 0) {
        r2(U . 'paymentgateway/mpesa', 's', "M-Pesa C2B URL registered successfully");
    } else {
        $errorMessage = isset($data->errorMessage) ? $data->errorMessage : 'Unknown error';
        r2(U . 'paymentgateway/mpesa', 'e', "Failed to register M-Pesa C2B URL. Error: $errorMessage");
    }
}

function ConfirmationURL()
{
    header("Content-Type: application/json");
    $mpesaResponse = file_get_contents('php://input');
    $content = json_decode($mpesaResponse);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['ResultCode' => 1, 'ResultDesc' => 'Invalid JSON']);
        return;
    }

    $TransactionType = $content->TransactionType ?? '';
    $TransID = $content->TransID ?? '';
    $TransTime = $content->TransTime ?? '';
    $TransAmount = $content->TransAmount ?? 0;
    $BusinessShortCode = $content->BusinessShortCode ?? '';
    $BillRefNumber = $content->BillRefNumber ?? '';
    $OrgAccountBalance = $content->OrgAccountBalance ?? 0;
    $MSISDN = $content->MSISDN ?? '';
    $FirstName = $content->FirstName ?? '';

    try {
        storeTransaction($TransactionType, $TransID, $TransTime, $TransAmount, $BusinessShortCode, $BillRefNumber, $OrgAccountBalance, $MSISDN, $FirstName);

        $result = processPayment($TransAmount, $BillRefNumber, $MSISDN, $TransID, $FirstName);

        if ($result['success']) {
            echo json_encode(['ResultCode' => 0, 'ResultDesc' => $result['message']]);
        } else {
            echo json_encode(['ResultCode' => 1, 'ResultDesc' => $result['message']]);
        }

    } catch (Exception $e) {
        echo json_encode(['ResultCode' => 1, 'ResultDesc' => 'Processing failed']);
    }
}

function ValidationURL()
{
    header("Content-Type: application/json");
    echo json_encode(['ResultCode' => 0, 'ResultDesc' => 'Accepted']);
}

function processPayment($amount, $billRef, $phoneNumber, $transID, $FirstName)
{
    try {
        $user_recharge = null;

        // Handle till payments - if billRef is empty, use phone number
        if (!empty($billRef)) {
            $identifier = trim($billRef); // Remove whitespace
            
            // Case-insensitive search for username
            $user_recharge = ORM::for_table('tbl_user_recharges')
                ->where_raw('LOWER(username) = ?', [strtolower($identifier)])
                ->where('type', 'PPPOE')
                ->find_one();
        } else {
            $identifier = trim($FirstName); // Remove whitespace
            
            // Case-insensitive search for username using FirstName
            $user_recharge = ORM::for_table('tbl_user_recharges')
                ->where_raw('LOWER(username) = ?', [strtolower($identifier)])
                ->where('type', 'PPPOE')
                ->find_one();
        }

        if ($user_recharge) {
            // Check if customer has active package before processing
            $hasActivePackage = checkActivePackage($user_recharge['customer_id']);
            
            if ($hasActivePackage) {
                // Customer has active package, add amount to balance instead
                $result = processBalanceTopup($amount, $identifier, $phoneNumber, $transID, $FirstName);
                $result['message'] = "You have an active package. KES {$amount} added to your balance instead.";
                return $result;
            } else {
                // Customer doesn't have active package, proceed with package purchase
                return processPackagePurchase($user_recharge, $amount, $transID, $identifier, $phoneNumber, $FirstName);
            }
        } else {
            return processBalanceTopup($amount, $identifier, $phoneNumber, $transID, $FirstName);
        }

    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Payment processing failed'];
    }
}

function processPackagePurchase($user_recharge, $amount, $transID, $identifier, $phoneNumber, $customerName)
{
    try {
        $plan = ORM::for_table('tbl_plans')
            ->where('id', $user_recharge['plan_id'])
            ->find_one();

        if (!$plan) {
            return ['success' => false, 'message' => 'Package plan not found'];
        }

        $package_price = $plan['price'];

        if ($amount >= $package_price) {
            if (class_exists('Package')) {
                $channel_mode = "M-Pesa C2B - $transID";
                $success = Package::rechargeUser($user_recharge['customer_id'], $user_recharge['routers'], $user_recharge['plan_id'], 'mpesa', $channel_mode);

                if ($success) {
                    $customer = ORM::for_table('tbl_customers')
                        ->where('id', $user_recharge['customer_id'])
                        ->find_one();

                    if (!$customer) {
                        return ['success' => false, 'message' => 'Customer not found after package activation'];
                    }

                    $message = "Package activated successfully! Plan: {$plan['name_plan']}, Amount: KES {$amount}";

                    $excess = $amount - $package_price;
                    if ($excess > 0) {
                        $customer->balance += $excess;
                        $customer->save();
                        $message .= ". Excess KES {$excess} added to your balance.";
                    }

                    logBalanceTransaction($customer->id, $amount, $transID, 'M-Pesa C2B');

                    $phone = $customer->phonenumber;
                    $whatsappMessage = "PACKAGE ACTIVATED SUCCESSFULLY!\n\n";
                    $whatsappMessage .= "Dear {$customer->fullname},\n\n";
                    $whatsappMessage .= "Your internet package has been activated:\n";
                    $whatsappMessage .= "• Package: {$plan['name_plan']}\n";
                    $whatsappMessage .= "• Amount Paid: KES " . number_format($amount, 2) . "\n";
                    $whatsappMessage .= "• Package Cost: KES " . number_format($package_price, 2) . "\n";

                    if (isset($plan['validity']) && !empty($plan['validity'])) {
                        $whatsappMessage .= "• Validity: {$plan['validity']}{$plan['validity_unit']}\n";
                    }

                    if ($excess > 0) {               
                        $whatsappMessage .= "• Current Balance: KES " . number_format($customer->balance, 2) . "\n";
                    }

                    $whatsappMessage .= "• Transaction ID: {$transID}\n";
                    $whatsappMessage .= "• Activated: " . date('d/m/Y H:i:s') . "\n\n";                   
                    $whatsappMessage .= "Your internet is now active! Enjoy browsing!\n\n";
                    if (class_exists('Message')) {
                        sendWhatsAppMessage($phone, $whatsappMessage);
                    }

                    return ['success' => true, 'message' => $message];
                } else {
                    return ['success' => false, 'message' => 'Package activation failed'];
                }
            } else {
                return ['success' => false, 'message' => 'Package class not available'];
            }
        } else {
            $result = processBalanceTopup($amount, $identifier, $phoneNumber, $transID, $customerName);
            if ($result['success']) {
                $result['message'] = "Insufficient amount for package. KES {$amount} added to your balance.";
            }
            return $result;
        }

    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Package purchase failed'];
    }
}

function processBalanceTopup($amount, $identifier, $phoneNumber, $transID, $FirstName)
{
    try {
        $customer = null;

        if (!empty($identifier)) {
            $identifier = trim($identifier); // Remove whitespace
            
            // Case-insensitive search for username
            $customer = ORM::for_table('tbl_customers')
                ->where_raw('LOWER(username) = ?', [strtolower($identifier)])
                ->find_one();
        }

        if ($customer) {
            $oldBalance = $customer->balance;
            $customer->balance += $amount;
            $customer->save();

            logBalanceTransaction($customer->id, $amount, $transID, 'M-Pesa C2B');

            $phone = $customer->phonenumber;
            $message = "BALANCE TOP-UP SUCCESSFUL\n\n";
            $message .= "Dear {$customer->fullname},\n\n";
            $message .= "Your account has been credited:\n";
            $message .= "• Amount: KES " . number_format($amount, 2) . "\n";
            $message .= "• New Balance: KES " . number_format($customer->balance, 2) . "\n";
            $message .= "• Transaction ID: {$transID}\n";
            $message .= "• Date: " . date('d/m/Y H:i:s') . "\n\n";
            $message .= "Thank you for using our services!";

            if (class_exists('Message')) {
                sendWhatsAppMessage($phone, $message);
            }

            return [
                'success' => true,
                'message' => "Balance updated successfully. Previous: KES {$oldBalance}, New: KES {$customer->balance}"
            ];
        } else {
            return [
                'success' => false,
                'message' => "Customer not found with identifier: {$identifier}. Payment will be processed manually."
            ];
        }
    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Balance update failed'];
    }
}

function sendWhatsAppMessage($phoneNumber, $message)
{
    try {
        $wa_url = ORM::for_table('tbl_appconfig')
            ->where('setting', 'wa_url')
            ->find_one();
        $wa_url = ($wa_url) ? $wa_url->value : null;

        if (!$wa_url) {
            return false;
        }

        // Extract the secret key from the URL
        $parsed_url = parse_url($wa_url);
        if (!isset($parsed_url['query'])) {
            return false;
        }
        
        parse_str($parsed_url['query'], $query_params);
        if (!isset($query_params['secret'])) {
            return false;
        }
        
        $secret = $query_params['secret'];

        // Sanitize and encode inputs
        $phoneNumber = urlencode($phoneNumber);
        $message = urlencode($message);

        // Construct new URL with user input
        $api_url = "https://wa.nux.my.id/api/sendWA?to=$phoneNumber&msg=$message&secret=$secret";

        // Use cURL to send request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            curl_close($ch);
            return false;
        }

        curl_close($ch);
        return $response;
        
    } catch (Exception $e) {
        return false;
    }
}

function checkActivePackage($customerId)
{
    try {
        $activePackage = ORM::for_table('tbl_user_recharges')
            ->where('customer_id', $customerId)
            ->where('status', 'on')
            ->find_one();

        return $activePackage ? true : false;
    } catch (Exception $e) {
        return false;
    }
}

function logBalanceTransaction($customerId, $amount, $transID, $method)
{
    try {
        $transaction = ORM::for_table('tbl_balance_history')->create();
        $transaction->customer_id = $customerId;
        $transaction->amount = $amount;
        $transaction->type = 'credit';
        $transaction->method = $method;
        $transaction->description = "M-Pesa payment - TransID: $transID";
        $transaction->created_date = date('Y-m-d H:i:s');
        $transaction->save();

    } catch (Exception $e) {
        // Handle exception silently
    }
}

function cleanPhoneNumber($phone)
{
    if (empty($phone)) {
        return '';
    }

    // Remove any non-numeric characters except +
    $phone = preg_replace('/[^\d+]/', '', $phone);
    
    // Handle different phone number formats
    $phone = (substr($phone, 0, 1) == '+') ? str_replace('+', '', $phone) : $phone;
    $phone = (substr($phone, 0, 1) == '0') ? preg_replace('/^0/', '254', $phone) : $phone;
    $phone = (substr($phone, 0, 1) == '7') ? preg_replace('/^7/', '2547', $phone) : $phone;
    $phone = (substr($phone, 0, 1) == '1') ? preg_replace('/^1/', '2541', $phone) : $phone;
    $phone = (substr($phone, 0, 2) == '01') ? preg_replace('/^01/', '2541', $phone) : $phone;
    $phone = (substr($phone, 0, 2) == '07') ? preg_replace('/^07/', '2547', $phone) : $phone;
    
    return $phone;
}

function storeTransaction($TransactionType, $TransID, $TransTime, $TransAmount, $BusinessShortCode, $BillRefNumber, $OrgAccountBalance, $MSISDN, $FirstName)
{
    try {
        createTableIfNotExists();

        $existingTransaction = ORM::for_table('tbl_mpesa_transactions')
            ->where('TransID', $TransID)
            ->find_one();

        if ($existingTransaction) {
            $existingTransaction->TransactionType = $TransactionType;
            $existingTransaction->TransTime = $TransTime;
            $existingTransaction->TransAmount = $TransAmount;
            $existingTransaction->BusinessShortCode = $BusinessShortCode;
            $existingTransaction->BillRefNumber = $BillRefNumber;
            $existingTransaction->OrgAccountBalance = $OrgAccountBalance;
            $existingTransaction->MSISDN = $MSISDN;
            $existingTransaction->FirstName = $FirstName;
            $existingTransaction->save();
        } else {
            $transaction = ORM::for_table('tbl_mpesa_transactions')->create();
            $transaction->TransID = $TransID;
            $transaction->TransactionType = $TransactionType;
            $transaction->TransTime = $TransTime;
            $transaction->TransAmount = $TransAmount;
            $transaction->BusinessShortCode = $BusinessShortCode;
            $transaction->BillRefNumber = $BillRefNumber;
            $transaction->OrgAccountBalance = $OrgAccountBalance;
            $transaction->MSISDN = $MSISDN;
            $transaction->FirstName = $FirstName;
            $transaction->save();
        }

    } catch (Exception $e) {
        // Handle exception silently
    }
}

function createTableIfNotExists()
{
    try {
        $db = ORM::get_db();

        $mpesaTableQuery = "CREATE TABLE IF NOT EXISTS tbl_mpesa_transactions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            TransID VARCHAR(255) NOT NULL UNIQUE,
            TransactionType VARCHAR(255) NOT NULL,
            TransTime VARCHAR(255) NOT NULL,
            TransAmount DECIMAL(10, 2) NOT NULL,
            BusinessShortCode VARCHAR(255) NOT NULL,
            BillRefNumber VARCHAR(255) DEFAULT '',
            OrgAccountBalance DECIMAL(10, 2) NOT NULL,
            MSISDN VARCHAR(255) NOT NULL,
            FirstName VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $db->exec($mpesaTableQuery);

    } catch (Exception $e) {
        // Handle exception silently
    }
}