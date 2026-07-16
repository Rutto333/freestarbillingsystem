<?php
/// Allow requests from any origin
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}
function Alloworigins()
{
    if (isset($_GET['type'])) {
        $type = $_GET['type'];

        if ($type == "verify") {
            VerifyHotspot();

        } elseif ($type == "grant") {
            CreateHostspotUser();

        } elseif ($type == "hotspot_plans") {
            GetHotspotPlans();

        }elseif($type == "ticker_ads") {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]);
                exit();
            }

            $ads = GetTickerAds(true);

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($ads ?: []);
            exit();
        }elseif ($type == "redeem_voucher") {
            RedeemVoucher();

        } elseif ($type == "recharge_pppoe") {
            rechargePppoe();

        }elseif ($type == "redeem_mpesa_code") {
            MpesaCodeLogin();
        } else {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(["status" => "error", "message" => "Invalid request type"]);
            exit();
        }
    }
}

function VerifyHotspot()
{
    $input = json_decode(file_get_contents('php://input'), true);
    $account_number = isset($input['account_number']) ? $input['account_number'] : '';
    if (empty($account_number)) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "error", "message" => "Missing required account_number when verifying"]);
        exit();
    }
    $user = ORM::for_table('tbl_payment_gateway')
        ->where('username', $account_number)
        ->order_by_desc('id')
        ->find_one();
    if ($user) {
        $status = $user->status;
        $mpesacode = $user->gateway_trx_id;
        $res = $user->pg_paid_response;
        if ($status == 2) {
            $data = [
                "Resultcode" => "3",
                "username" => $account_number,
                "tyhK" => "1234",
                "Message" => "We have received your transaction under the Mpesa Transaction $mpesacode, Please don't leave this page as we are redirecting you",
                "Status" => "success"
            ];
        } elseif ($res == "Not enough balance") {
            $data = [
                "Resultcode" => "2",
                "Message1" => "Insufficient Balance for the transaction",
                "Status" => "danger",
                "Redirect" => "Insufficient balance"
            ];
        } elseif ($res == "Wrong Mpesa pin") {
            $data = [
                "Resultcode" => "2",
                "Message" => "You entered Wrong Mpesa pin, please resubmit",
                "Status" => "danger",
                "Redirect" => "Wrong Mpesa pin"
            ];
        } elseif ($status == 4) {
            $data = [
                "Resultcode" => "2",
                "Message" => "You cancelled the transaction, you can enter phone number again to activate",
                "Status" => "danger",
                "Redirect" => "Transaction Cancelled"
            ];
        } else {
            $data = [
                "Resultcode" => "1",
                "Message" => "A payment pop up has been sent, Please enter pin to continue (Please do not leave or reload the page until redirected)",
                "Status" => "primary"
            ];
        }
    } else {
        $data = ["status" => "error", "message" => "Account " . $account_number . " not found"];
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    exit();
}

function CreateHostspotUser()
{
    $result = ORM::for_table('tbl_appconfig')->find_many();
    foreach ($result as $value) {
        $config[$value['setting']] = $value['value'];
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "error", "message" => "Invalid request method"]);
        exit();
    }

    if ($config['maintenance_mode']) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['status' => 'error', 'message' => 'Scheduled maintenance is currently in progress. Please check back soon.']);
        exit();
    }

    try {
        $input = json_decode(file_get_contents('php://input'), true);

        $phone        = isset($input['phone_number'])   ? $input['phone_number']   : '';
        $planId       = isset($input['plan_id'])        ? $input['plan_id']        : '';
        $routerId     = isset($input['router_id'])      ? $input['router_id']      : '';
        $user_account = isset($input['account_number']) ? $input['account_number'] : '';
        $mac_address  = isset($input['mac_address'])    ? $input['mac_address']    : '';

        // --- Validate required fields (phone only required for paid plans) ---
        $missing = [];
        if (empty($planId))       $missing[] = 'planId';
        if (empty($routerId))     $missing[] = 'routerId';
        if (empty($user_account)) $missing[] = 'user_account';

        if (!empty($missing)) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(["status" => "error", "message" => "Missing required parameters: " . implode(', ', $missing)]);
            exit();
        }

        // --- MAC block ---
        $macs = ["22:12:59:0C:45:58"];
        if (in_array($mac_address, $macs)) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(['status' => 'error', 'message' => 'This device has been blocked. Please contact the service provider.']);
            exit();
        }

        // --- Validate plan & router exist ---
        $PlanExist   = ORM::for_table('tbl_plans')->where('id', $planId)->count() > 0;
        $RouterExist = ORM::for_table('tbl_routers')->where('id', $routerId)->count() > 0;

        if (!$PlanExist || !$RouterExist) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(["status" => "error", "message" => "Unable to process your request, please refresh the page"]);
            exit();
        }

        // --- Check if this is a FREE plan (price = 0) ---
        $plan      = ORM::for_table('tbl_plans')->where('id', $planId)->find_one();
        $planPrice = $plan ? floatval($plan->price) : -1;
        $isFree    = ($planPrice === 0.0);

        // For free plans, use a default phone if none provided
        if ($isFree && empty($phone)) {
            $phone = '254712345677';
        }

        // For paid plans, phone is required
        if (!$isFree && empty($phone)) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(["status" => "error", "message" => "Missing required parameters: phone"]);
            exit();
        }

        // --- Normalize phone number ---
        $phone = (substr($phone, 0, 1) == '+') ? str_replace('+', '', $phone) : $phone;
        $phone = (substr($phone, 0, 1) == '0') ? preg_replace('/^0/', '254', $phone) : $phone;
        $phone = (substr($phone, 0, 1) == '7') ? preg_replace('/^7/', '2547', $phone) : $phone;
        $phone = (substr($phone, 0, 1) == '1') ? preg_replace('/^1/', '2541', $phone) : $phone;

        // --- Get router name for recharge ---
        $router      = ORM::for_table('tbl_routers')->where('id', $routerId)->find_one();
        $router_name = $router ? $router->name : '';

        // --- Upsert user ---
        $Userexist = ORM::for_table('tbl_customers')
            ->where('username', $user_account)
            ->where('service_type', 'Hotspot')
            ->find_one();

        if ($Userexist) {
            $Userexist->phonenumber = $phone;
            $Userexist->router_id   = $routerId;
            $Userexist->fullname    = $phone;
            $Userexist->password    = '1234';
            $Userexist->save();
            $UserId = $Userexist->id;
        } else {
            // Ensure router_id column exists
            $table = ORM::for_table('tbl_customers')->raw_query('SHOW COLUMNS FROM tbl_customers LIKE "router_id"')->find_one();
            if (!$table) {
                ORM::for_table('tbl_customers')->raw_execute("ALTER TABLE tbl_customers ADD router_id VARCHAR(255) AFTER fullname");
            }

            $createUser                  = ORM::for_table('tbl_customers')->create();
            $createUser->username        = $user_account;
            $createUser->password        = '1234';
            $createUser->fullname        = $phone;
            $createUser->router_id       = $routerId;
            $createUser->phonenumber     = $phone;
            $createUser->pppoe_password  = '1234';
            $createUser->address         = 'Hotspot Address';
            $createUser->email           = $user_account . '@gmail.com';
            $createUser->service_type    = 'Hotspot';

            if (!$createUser->save()) {
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode(["status" => "error", "message" => "System error when registering user, please contact support"]);
                exit();
            }
            $UserId = $createUser->id();
        }

        // --- Route: free plan ? direct recharge, paid plan ? STK push ---
        if ($isFree) {
            $note = 'FREE-' . strtoupper(substr(md5(uniqid()), 0, 8));

            // Set globals required by Package::rechargeUser
            global $config, $admin, $c, $p, $b, $t, $d, $zero, $trx, $_app_stage, $isChangePlan;

            $_app_stage = 'Live';   // prevents Demo mode skip
            $admin      = null;     // no admin session in API context
            $trx        = null;     // no payment transaction object
            $zero       = 1;        // CRITICAL: forces price to 0, skips billing checks

            // Get router name (rechargeUser needs name, not id)
            $router     = ORM::for_table('tbl_routers')->where('id', $routerId)->find_one();
            $router_name = $router ? $router->name : '';

            if (empty($router_name)) {
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode(["status" => "error", "message" => "Router not found"]);
                exit();
            }

            try {
                $inv = Package::rechargeUser($UserId, $router_name, $planId, 'Free', 'Free Trial', $note);

                if ($inv) {
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode([
                        "status"   => "success",
                        "username" => $user_account,
                        "message"  => "Free plan activated successfully"
                    ]);
                } else {
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode([
                        "status"  => "error",
                        "message" => "Failed to activate free plan. It may already be active."
                    ]);
                }
            } catch (Throwable $e) {
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode([
                    "status"  => "error",
                    "message" => $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine()
                ]);
            }
            exit();
        } else {
            InitiateStkpush($phone, $planId, $routerId, $user_account, $mac_address);
        }

    } catch (Exception $e) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
        exit();
    }
}

function GetHotspotPlans()
{

    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "error", "message" => "Invalid request method"]);
        exit();
    }
    $input = json_decode(file_get_contents('php://input'), true);
    $router_id = isset($input['router_id']) ? $input['router_id'] : '';
    if (empty($router_id)) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "error", "message" => "Missing required parameters router_id : " . $router_id]);
        exit();
    }


    //GET ROUTER NAME
    $routerName = ORM::for_table('tbl_routers')
        ->where('id', $router_id)
        ->find_one();
    $routerName = $routerName->name;
    $result = ORM::for_table('tbl_appconfig')->find_many();
    foreach ($result as $value) {
        $config[$value['setting']] = $value['value'];
    }
    if ($config['maintenance_mode']) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['status' => 'error', 'message' => 'Scheduled maintenance is currently in progress. Please check back soon. We apologize for any inconvenience']);
        exit();
    }
    $routers = ORM::for_table('tbl_routers')->find_array();
    $plans_hotspot = ORM::for_table('tbl_plans')->where('type', 'Hotspot')->find_array();
    $bandwidth_map = ORM::for_table('tbl_bandwidth')->find_array();

    $color_scheme = ORM::for_table('tbl_appconfig')->where('setting', 'color_scheme')->find_one();
    $color_scheme = $color_scheme ? $color_scheme->value : 'blue';


    $shape = ORM::for_table('tbl_appconfig')->where('setting', 'shape_selector')->find_one();
    $shape = $shape ? $shape->value : 'square';
    if ($shape == 'square') {
        $shape_card_class_name = 'w-64 h-64 rounded-lg';
    } elseif ($shape == 'rectangle') {
        $shape_card_class_name = 'w-80 h-48 rounded-lg';
    } elseif ($shape == 'circle') {
        $shape_card_class_name = 'w-64 h-64 rounded-full';
    } elseif ($shape == 'oval') {
        $shape_card_class_name = 'w-80 h-48 rounded-full';
    } else {
        $shape_card_class_name = 'rounded-lg';
    }

    $currency_config = ORM::for_table('tbl_appconfig')->where('setting', 'currency_code')->find_one();
    $currency = $currency_config ? $currency_config->value : 'Ksh';
    $data = [];
    foreach ($routers as $router) {
        if ($router['name'] === $routerName) {
            $routerData = [
                'name' => $router['name'],
                'router_id' => $router['id'],
                'description' => $router['description'],
                'plans_hotspot' => [],
            ];
            foreach ($plans_hotspot as $plan) {
                if ($router['name'] == $plan['routers']) {
                    $plan_id = $plan['id'];
                    $bandwidth_data = isset($bandwidth_map[$plan_id]) ? $bandwidth_map[$plan_id] : [];
                    $paymentlink = "";
                    $routerData['plans_hotspot'][] = [
                        'plantype' => $plan['type'],
                        'planname' => $plan['name_plan'],
                        'typebp' => $plan['typebp'],
                        'currency' => $currency,
                        'price' => $plan['price'],
                        'validity' => $plan['validity'],
                        'device' => $plan['shared_users'],
                        'datalimit' => $plan['data_limit'],
                        'timelimit' => $plan['validity_unit'] ?? null,
                        'downlimit' => $bandwidth_data['rate_down'] ?? null,
                        'uplimit' => $bandwidth_data['rate_up'] ?? null,
                        'paymentlink' => $paymentlink,
                        'planId' => $plan['id'],
                        'routerName' => $router['name'],
                        'routerId' => $router['id'],
                        'shape' => $shape,
                        'shape_card_class_name' => $shape_card_class_name,
                        'color_scheme' => $color_scheme,
                    ];
                }
            }
            $data[] = $routerData;
        }
    }
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}

function InitiateStkpush($phone, $planId, $routerId, $user_Account, $mac_address)
{
    try {
        $file_path = 'system/removeuser.php';
        $gateway = ORM::for_table('tbl_appconfig')
            ->where('setting', 'payment_gateway')
            ->find_one();
        $gateway = ($gateway) ? $gateway->value : null;

        if ($gateway == "MpesatillStk") {
            $url = (U . "plugin/initiatetillstk");
        } elseif ($gateway == "BankStkPush") {
            $url = (U . "plugin/initiatebankstk");
        } elseif ($gateway == "MpesaPaybill") {
            $url = (U . "plugin/initiatePaybillStk");
        } elseif ($gateway == "mpesa") {
            $url = (U . "plugin/initiatempesa");
        } elseif ($gateway == "paybilltillsbankmpesa") {
            $url = (U . "plugin/initiatepaybilltillsbankmpesa");
        } elseif ($gateway == "mtn") {
            $url = (U . "plugin/initiatemtn");
        } elseif ($gateway == "kopokopo") {
            $url = (U . "plugin/initiatekopokopo");
        } elseif ($gateway == "campay") {
            $url = (U . "plugin/initiatecampay");
        } else {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(["status" => "error", "message" => "Payment gateway not configured"]);
            exit();
        }

        $Planname = ORM::for_table('tbl_plans')
            ->where('id', $planId)
            ->order_by_desc('id')
            ->find_one();
        $Findrouter = ORM::for_table('tbl_routers')
            ->where('id', $routerId)
            ->order_by_desc('id')
            ->find_one();

        $rname = $Findrouter->name;
        $price = $Planname->price;
        $Planname = $Planname->name_plan;

        $Checkorders = ORM::for_table('tbl_payment_gateway')
            ->where('username', $user_Account)
            ->where('status', 1)
            ->order_by_desc('id')
            ->find_many();

        if ($Checkorders) {
            foreach ($Checkorders as $Dorder) {
                $Dorder->delete();
            }
        }

        //check first if routers_id column is available in the table if not add it
        $table = ORM::for_table('tbl_payment_gateway')->raw_query('SHOW COLUMNS FROM tbl_payment_gateway LIKE "routers_id"')->find_one();
        if (!$table) {
            $sql = "ALTER TABLE tbl_payment_gateway ADD routers_id VARCHAR(255) AFTER plan_name";
            ORM::for_table('tbl_payment_gateway')->raw_execute($sql);
        }

        //check first if mac_address column is available in the table if not add it
        $table = ORM::for_table('tbl_payment_gateway')->raw_query('SHOW COLUMNS FROM tbl_payment_gateway LIKE "mac_address"')->find_one();
        if (!$table) {
            $sql = "ALTER TABLE tbl_payment_gateway ADD mac_address VARCHAR(255) AFTER gateway";
            ORM::for_table('tbl_payment_gateway')->raw_execute($sql);
        }

        $d = ORM::for_table('tbl_payment_gateway')->create();
        $d->username = $user_Account;
        $d->gateway = $gateway;
        $d->mac_address = $mac_address;
        $d->plan_id = $planId;
        $d->plan_name = $Planname;
        $d->routers_id = $routerId;
        $d->routers = $rname;
        $d->price = $price;
        $d->payment_method = $gateway;
        $d->payment_channel = $gateway;
        $d->created_date = date('Y-m-d H:i:s');
        $d->paid_date = date('Y-m-d H:i:s');
        $d->expired_date = date('Y-m-d H:i:s');
        $d->pg_url_payment = $url;
        $d->status = 1;
        $d->save();
        //echo json_encode(["status" => "success", "phone" => $phone, "message" => "Registration complete,Please enter Mpesa Pin to activate the package"]);
        SendSTKcred($phone, $user_Account, $url);
        exit();
    } catch (Exception $e) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
        exit();
    }
}

function SendSTKcred($phone, $user_Account, $url)
{
    $fields = [
        'username' => $user_Account,
        'phone' => $phone,
        'channel' => 'Yes',
    ];

    $postvars = json_encode($fields); // Encode fields as JSON

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Capture the response
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json', // Set header to JSON
        'Content-Length: ' . strlen($postvars),
    ]);

    $result = curl_exec($ch);
    if ($result === false) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "error", "message" => curl_error($ch)]);
        exit();
    }

    curl_close($ch);
    echo $result;
}

function RedeemVoucher()
{
    // Ensure the request method is POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "error", "message" => "Invalid request method"]);
        exit();
    }

    // Get input data
    $input = json_decode(file_get_contents('php://input'), true);
    $voucher_code = $input['voucher_code'] ?? '';
    $user_account = $input['account_number'] ?? '';
    $routerId = $input['router_id'] ?? '';

    // Validate required parameters
    if (empty($voucher_code) || empty($user_account) || empty($routerId)) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "error", "message" => "Missing required parameters"]);
        exit();
    }

    ///REMOVE WHITE SPACES
    $voucher_code = preg_replace('/\s+/', '', $voucher_code);

    // Use parameterized queries to prevent SQL injection
    $voucher_code_data = ORM::for_table('tbl_voucher')
        ->where_raw("BINARY code = ?", [$voucher_code])
        ->where('status', 0)
        ->find_one();

    if (!$voucher_code_data) {
        header('Content-Type: application/json; charset=utf-8');
        //CHECK IF VOUCHER CODE IS USED
        $voucher_code_data_used = ORM::for_table('tbl_voucher')
            ->where_raw("BINARY code = ?", [$voucher_code])
            ->where('status', 1)
            ->find_one();
        if ($voucher_code_data_used) {
            echo json_encode([
                "status" => "used",
                "message" => "Voucher code " . $voucher_code . " has already been used. Please wait fo auto logging",
                "username" => $voucher_code_data_used['user'],
                "voucher" => $voucher_code_data_used['code'],
                "tyhK" => "1234",
            ]);
            exit();
        } else {
            echo json_encode(["status" => "error", "message" => "Voucher entered is invalid"]);
            exit();
        }
    }

    $phone = "254123456789"; // Static phone, consider replacing with dynamic data

    // Delete customer record if exists
    ORM::for_table('tbl_customers')
        ->where('phonenumber', $phone)
        ->where('service_type', 'Hotspot')
        ->delete_many();

    // Check if `router_id` column exists, if not, add it (Run only once)
    $tableCheck = ORM::for_table('tbl_customers')
        ->raw_query('SHOW COLUMNS FROM tbl_customers LIKE "router_id"')
        ->find_one();

    if (!$tableCheck) {
        ORM::for_table('tbl_customers')->raw_execute("ALTER TABLE tbl_customers ADD router_id VARCHAR(255) AFTER fullname");
    }

    // Define default values
    $defpass = '1234';
    $defaddr = 'Hotspot Address';
    $defmail = $user_account . '@gmail.com';

    // Create a new user in `tbl_customers`
    $createUser = ORM::for_table('tbl_customers')->create();
    $createUser->username = $user_account;
    $createUser->password = $defpass;
    $createUser->fullname = $phone;
    $createUser->router_id = $routerId;
    $createUser->phonenumber = $phone;
    $createUser->pppoe_password = $defpass;
    $createUser->address = $defaddr;
    $createUser->email = $defmail;
    $createUser->service_type = 'Hotspot';
    $createUser->save();

    // Retrieve the newly created user
    $userid = ORM::for_table('tbl_customers')
        ->where('username', $user_account)
        ->order_by_desc('id')
        ->find_one();

    if (!$userid) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "error", "message" => "User creation failed"]);
        exit();
    }

    // Recharge user using the voucher
    $rechargeStatus = Package::rechargeUser(
        $userid->id,  // Use the user ID from `tbl_customers`
        $voucher_code_data['routers'],
        $voucher_code_data['id_plan'],
        "Voucher",
        $voucher_code,
        $voucher_code
    );

    if ($rechargeStatus) {
        // Update the voucher status
        $voucher_code_data->status = 1;
        $voucher_code_data->used_date = date('Y-m-d H:i:s');
        $voucher_code_data->user = $user_account;
        $voucher_code_data->save();

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            "status" => "success",
            "message" => "User recharged successfully",
            "username" => $user_account,
            "voucher" => $voucher_code,
        ]);
        exit();
    } else {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "error", "message" => "Failed to recharge user"]);
        exit();
    }
}

function MpesaCodeLogin()
{
    // Ensure the request method is POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendJsonMpesaCodeResponse("error", "Invalid request method");
    }

    // Get input data
    $input = json_decode(file_get_contents('php://input'), true);
    $mpesa_code = $input['mpesa_code'] ?? '';

    // Validate required parameters
    if (empty($mpesa_code)) {
        sendJsonMpesaCodeResponse("error", "Missing required parameters");
    }

    // Get the first 10 characters of the Mpesa code
    $mpesa_code = substr($mpesa_code, 0, 10);

    // Fetch user details from the database
    $user = ORM::for_table('tbl_payment_gateway')
        ->where('gateway_trx_id', $mpesa_code)
        ->order_by_desc('id')
        ->find_one();

    if ($user) {
        $status = $user->status;
        $mpesacode = $user->gateway_trx_id;
        $res = $user->pg_paid_response;

        if ($status == 2) {
            sendJsonMpesaCodeResponse("success", "We have received your transaction under the Mpesa Transaction $mpesacode, Please don't leave this page as we are redirecting you", [
                "Resultcode" => "3",
                "username" => $user->username,
                "tyhK" => "1234",
            ]);
        } elseif ($res == "Not enough balance") {
            sendJsonMpesaCodeResponse("danger", "Insufficient Balance for the transaction", [
                "Resultcode" => "2",
                "Redirect" => "Insufficient balance"
            ]);
        } elseif ($res == "Wrong Mpesa pin") {
            sendJsonMpesaCodeResponse("danger", "You entered Wrong Mpesa pin, please resubmit", [
                "Resultcode" => "2",
                "Redirect" => "Wrong Mpesa pin"
            ]);
        } elseif ($status == 4) {
            sendJsonMpesaCodeResponse("danger", "You cancelled the transaction, you can enter phone number again to activate", [
                "Resultcode" => "2",
                "Redirect" => "Transaction Cancelled"
            ]);
        } else {
            sendJsonMpesaCodeResponse("primary", "A payment pop-up has been sent, Please enter PIN to continue (Please do not leave or reload the page until redirected)", [
                "Resultcode" => "1"
            ]);
        }
    } else {
        sendJsonMpesaCodeResponse("error", "Mpesa code $mpesa_code not found");
    }
}



function rechargePppoe()
{
    try {
        header('Content-Type: application/json; charset=utf-8');

        // Get JSON input
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input) {
            echo json_encode(["status" => "error", "message" => "Invalid JSON input"]);
            exit();
        }

        $username_pppoe = isset($input['username']) ? $input['username'] : null;
        $planId_pppoe = isset($input['plan_id']) ? $input['plan_id'] : null;
        $router_pppoe = isset($input['router_id']) ? $input['router_id'] : null;
        $phone_pppoe = isset($input['phone']) ? $input['phone'] : null;

        if (empty($username_pppoe) || empty($planId_pppoe) || empty($router_pppoe) || empty($phone_pppoe)) {
            echo json_encode(["status" => "error", "message" => "Missing required fields: username, plan_id, price, phone"]);
            exit();
        }

        $FindrouterId = ORM::for_table('tbl_routers')
            ->where('name', $router_pppoe)
            ->order_by_desc('id')
            ->find_one();

        $routerId_pppoe = $FindrouterId ? $FindrouterId->id : null;

        $mac_pppoe = ["22:42:59:0C:45:58"];
        InitiateStkpush($phone_pppoe, $planId_pppoe, $routerId_pppoe, $username_pppoe, $mac_pppoe);




    } catch (Exception $e) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            "status" => "error",
            "message" => $e->getMessage(),
            "trace" => $e->getTraceAsString()
        ]);
    }
    exit();
}

function GetTickerAds($active_only = false)
{
    $query = ORM::for_table('tbl_ticker_ads')->order_by_asc('sort_order');

    if ($active_only) {
        $query = $query->where('status', 1);
    }

    $result = $query->find_many();
    $ads = [];
    foreach ($result as $value) {
        $ads[] = [
            'id'         => $value['id'],
            'message'    => $value['message'],
            'link'       => $value['link'],
            'status'     => $value['status'],
            'sort_order' => $value['sort_order'],
        ];
    }
    return $ads;
}

/**
 * Helper function to send JSON response
 */
function sendJsonMpesaCodeResponse($status, $message, $data = [])
{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array_merge(["status" => $status, "message" => $message], $data));
    exit();
}


Alloworigins();
