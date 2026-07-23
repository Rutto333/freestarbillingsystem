<?php

use PEAR2\Net\RouterOS;

register_menu("Hotspot Settings", true, "hotspot_settings", 'SETTINGS');

$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

// Create ticker ads table if it doesn't exist
$conn->exec("
    CREATE TABLE IF NOT EXISTS tbl_ticker_ads (
        id         INT AUTO_INCREMENT PRIMARY KEY,
        message    VARCHAR(200) NOT NULL,
        link       VARCHAR(500) DEFAULT NULL,
        status     TINYINT(1)  NOT NULL DEFAULT 1,
        sort_order INT         NOT NULL DEFAULT 0,
        created_at TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");

function hotspot_settings()
{
    global $ui, $conn;
    _admin();
    $ui->assign('_title', 'Hotspot Settings');
    $admin = Admin::_info();
    if (
        isset($_GET['delete_ad']) ||
        isset($_GET['toggle_ad']) ||
        (isset($_POST['action']) && $_POST['action'] === 'save_ad')
    ) {
        hotspot_ticker_ads();
        return; // stop here, r2() inside will redirect
    }
    $ui->assign('_admin', $admin);

    // Get the selected router ID from user input
    $routerId = isset($_POST['router_id']) ? trim($_POST['router_id']) : '';

    if (!empty($routerId)) {
        // Update router_id in tbl_appconfig
        $updateRouterIdStmt = $conn->prepare("UPDATE tbl_appconfig SET value = :router_id WHERE setting = 'router_id'");
        $updateRouterIdStmt->execute(['router_id' => $routerId]);

        // Fetch the router name based on the selected router ID
        $routerStmt = $conn->prepare("SELECT name FROM tbl_routers WHERE id = :router_id");
        $routerStmt->execute(['router_id' => $routerId]);
        $router = $routerStmt->fetch(PDO::FETCH_ASSOC);

        if ($router) {
            // Update router_name in tbl_appconfig
            $updateRouterNameStmt = $conn->prepare("UPDATE tbl_appconfig SET value = :router_name WHERE setting = 'router_name'");
            $updateRouterNameStmt->execute(['router_name' => $router['name']]);
        }
    }

    // Fetch the current router ID from the tbl_appconfig table
    $stmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'router_id'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $routerId = $result ? $result['value'] : '';

    // Fetch the router details from the tbl_routers table based on the router ID
    $stmt = $conn->prepare("SELECT ip_address, username, password FROM tbl_routers WHERE id = :router_id");
    $stmt->bindParam(':router_id', $routerId);
    $stmt->execute();

    // Fetch other settings
    $stmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'hotspot_title'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $hotspotTitle = $result ? $result['value'] : '';

    $stmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'description'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $description = $result ? $result['value'] : '';

    $stmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'phone'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $phone = $result ? $result['value'] : '';

    $stmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'CompanyName'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $company = $result ? $result['value'] : '';

    // Fetch color scheme
    $stmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'color_scheme'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $selectedColorScheme = $result ? $result['value'] : 'green';

    $colorSchemes = [
        'green' => [
            'primary' => 'green',
            'secondary' => 'teal',
        ],
        'brown' => [
            'primary' => 'yellow',
            'secondary' => 'orange',
        ],
        'orange' => [
            'primary' => 'orange',
            'secondary' => 'yellow',
        ],
        'red' => [
            'primary' => 'red',
            'secondary' => 'pink',
        ],
        'blue' => [
            'primary' => 'blue',
            'secondary' => 'indigo',
        ],
        'black' => [
            'primary' => 'black',
            'secondary' => 'gray',
        ],
        'yellow' => [
            'primary' => 'yellow',
            'secondary' => 'red',
        ],
        'pink' => [
            'primary' => 'pink',
            'secondary' => 'fuchsia',
        ],
    ];

    $primaryColor = $colorSchemes[$selectedColorScheme]['primary'];
    $secondaryColor = $colorSchemes[$selectedColorScheme]['secondary'];

    // Fetch available plans
    $stmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'router_name'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $routerName = $result ? $result['value'] : '';

    $planQuery = "SELECT id, name_plan, price, validity, validity_unit FROM tbl_plans WHERE routers = :router_name AND type = 'Hotspot'";
    $planStmt = $conn->prepare($planQuery);
    $planStmt->bindValue(':router_name', $routerName);
    $planStmt->execute();
    $planResult = $planStmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Begin a transaction
            $conn->beginTransaction();

            // Settings to update or insert
            $settingsToProcess = [
                'hotspot_title' => isset($_POST['hotspot_title']) ? trim($_POST['hotspot_title']) : $hotspotTitle,
                'color_scheme' => isset($_POST['color_scheme']) ? $_POST['color_scheme'] : $selectedColorScheme,
                'shape_selector' => isset($_POST['shape_selector']) ? $_POST['shape_selector'] : 'square',
                'description' => isset($_POST['description']) ? trim($_POST['description']) : $description,
                'router_id' => isset($_POST['router_id']) ? trim($_POST['router_id']) : $routerId,
                'auto_manual_display' => isset($_POST['auto_manual_display']) ? trim($_POST['auto_manual_display']) : 'auto',
            ];

            try {
                // Get the router name
                $stmt = $conn->prepare("SELECT name FROM tbl_routers WHERE id = :router_id");
                $stmt->bindParam(':router_id', $settingsToProcess['router_id'], PDO::PARAM_INT);
                $stmt->execute();
                $routerName = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($routerName) {
                    // Check if 'router_name' setting exists in tbl_appconfig
                    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM tbl_appconfig WHERE setting = 'router_name'");
                    $checkStmt->execute();
                    $exists = $checkStmt->fetchColumn() > 0;

                    if ($exists) {
                        // Update if exists
                        $updateStmt = $conn->prepare("UPDATE tbl_appconfig SET value = :router_name WHERE setting = 'router_name'");
                        $updateStmt->execute(['router_name' => $routerName['name']]);
                    } else {
                        // Insert if not exists
                        $insertStmt = $conn->prepare("INSERT INTO tbl_appconfig (setting, value) VALUES ('router_name', :router_name)");
                        $insertStmt->execute(['router_name' => $routerName['name']]);
                    }
                } else {
                    throw new Exception("Router with the specified ID not found.");
                }

                echo "Router name processed successfully.";
            } catch (Exception $e) {
                // Handle errors
                error_log("Error processing router name: " . $e->getMessage());
                echo "Error: " . $e->getMessage();
            }




            // Prepared statements
            $checkStmt = $conn->prepare("SELECT COUNT(*) FROM tbl_appconfig WHERE setting = ?");
            $updateStmt = $conn->prepare("UPDATE tbl_appconfig SET value = ? WHERE setting = ?");
            $insertStmt = $conn->prepare("INSERT INTO tbl_appconfig (setting, value) VALUES (?, ?)");

            foreach ($settingsToProcess as $key => $value) {
                // Check if the setting exists
                $checkStmt->execute([$key]);
                $exists = $checkStmt->fetchColumn() > 0;

                if ($exists) {
                    // Update if exists
                    $updateStmt->execute([$value, $key]);
                } else {
                    // Insert if not exists
                    $insertStmt->execute([$key, $value]);
                }
            }

            // Commit transaction
            $conn->commit();

            r2(U . "plugin/hotspot_settings", 's', "Settings Saved and Uploaded to Router Successfully");
        } catch (Exception $e) {
            // Rollback transaction in case of error
            $conn->rollBack();

            // Log or display the error
            error_log("Failed to process settings: " . $e->getMessage());
            r2(U . "plugin/hotspot_settings", 'e', "Error processing settings: " . $e->getMessage());
        }
    }



    // Fetch the current hotspot title from the database
    $stmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'hotspot_title'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $hotspotTitle = $result ? $result['value'] : '';

    // Assign the fetched title to the template
    $ui->assign('hotspot_title', $hotspotTitle);

    // Fetch the current faq description from the database
    $stmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'description'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $description = $result ? $result['value'] : '';

    // Assign the fetched title to the template
    $ui->assign('description', $description);

    // Fetch the available routers from the tbl_routers table
    $routerStmt = $conn->prepare("SELECT id, name FROM tbl_routers");
    $routerStmt->execute();
    $routers = $routerStmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch the current router ID from the tbl_appconfig table
    $routerIdStmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'router_id'");
    $routerIdStmt->execute();
    $routerIdResult = $routerIdStmt->fetch(PDO::FETCH_ASSOC);
    $selectedRouterId = $routerIdResult ? $routerIdResult['value'] : '';

    // Fetch shape selector to the template
    $hostspotShape = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'shape_selector'");
    $hostspotShape->execute();
    $shape = $hostspotShape->fetch(PDO::FETCH_ASSOC);
    $ui->assign('selected_shape_selector', $shape['value']);

    // Fetch auto/manual display to the template
    $autoManualDisplay = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'auto_manual_display'");
    $autoManualDisplay->execute();
    $autoManual = $autoManualDisplay->fetch(PDO::FETCH_ASSOC);
    $ui->assign('selected_auto_manual_display', $autoManual['value']);

    //GET DOMAIN WITH SUDOMAIN
    function getMainHTPluginDomain($url) {
        // Extract the host from the URL
        $host = parse_url($url, PHP_URL_HOST);
        // Break the host into parts
        $parts = explode('.', $host);
        // Ensure we have at least two parts (e.g., example.com)
        $count = count($parts);
        if ($count >= 3) {
            return implode('.', array_slice($parts, -3)); // Keeps last 2 or 3 parts depending on TLD structure
        } elseif ($count >= 2) {
            return implode('.', array_slice($parts, -2)); // Keeps last 2 parts
        }
        return $host; // If no subdomain, return as is
    }

    // Example Usage
    $APP_URL = APP_URL;
    $main_domain = getMainHTPluginDomain($APP_URL);
    $ui->assign('main_domain', $main_domain);

    // Assign the routers and selected router ID to the template
    $ui->assign('routers', $routers);
    $ui->assign('selected_router_id', $selectedRouterId);

    // Assign the selected color scheme to the template
    $ui->assign('selected_color_scheme', $selectedColorScheme);

    // Render the template
    hotspot_ticker_ads();
    $ui->display('hotspot_settings.tpl');
}

function hotspot_ticker_ads()
{
    global $ui, $conn;

    // Ensure table exists before doing anything else
    ensure_ticker_ads_table($conn);

    // Handle DELETE
    if (isset($_GET['delete_ad'])) {
        $id = (int)$_GET['delete_ad'];
        $stmt = $conn->prepare("DELETE FROM tbl_ticker_ads WHERE id = :id");
        $stmt->execute(['id' => $id]);
        r2(U . "plugin/hotspot_settings", 's', "Ad deleted successfully");
    }

    // Handle TOGGLE status
    if (isset($_GET['toggle_ad'])) {
        $id = (int)$_GET['toggle_ad'];
        $stmt = $conn->prepare("UPDATE tbl_ticker_ads SET status = IF(status = 1, 0, 1) WHERE id = :id");
        $stmt->execute(['id' => $id]);
        r2(U . "plugin/hotspot_settings", 's', "Ad status updated");
    }

    // Handle ADD new ad
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_ad') {
        $message = trim($_POST['ad_message'] ?? '');
        $link    = trim($_POST['ad_link'] ?? '');
        $status  = isset($_POST['ad_status']) ? (int)$_POST['ad_status'] : 1;

        if (empty($message)) {
            r2(U . "plugin/hotspot_settings", 'e', "Ad message cannot be empty");
        }

        try {
            // Get the current max sort_order
            $maxOrder = $conn->query("SELECT COALESCE(MAX(sort_order), 0) + 1 FROM tbl_ticker_ads")->fetchColumn();

            $stmt = $conn->prepare(
                "INSERT INTO tbl_ticker_ads (message, link, status, sort_order, created_at)
                 VALUES (:message, :link, :status, :sort_order, NOW())"
            );
            $stmt->execute([
                'message'    => $message,
                'link'       => $link ?: null,
                'status'     => $status,
                'sort_order' => (int)$maxOrder,
            ]);

            r2(U . "plugin/hotspot_settings", 's', "Ad added successfully");
        } catch (Exception $e) {
            error_log("Error saving ticker ad: " . $e->getMessage());
            r2(U . "plugin/hotspot_settings", 'e', "Error saving ad: " . $e->getMessage());
        }
    }

    // Fetch all ads ordered by sort_order
    $stmt = $conn->query("SELECT * FROM tbl_ticker_ads ORDER BY sort_order ASC, id ASC");
    $ticker_ads = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $ui->assign('ticker_ads', $ticker_ads);
}

/**
 * Creates tbl_ticker_ads if it doesn't already exist.
 */
function ensure_ticker_ads_table($conn)
{
    try {
        $conn->exec(
            "CREATE TABLE IF NOT EXISTS tbl_ticker_ads (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                message VARCHAR(500) NOT NULL,
                link VARCHAR(500) DEFAULT NULL,
                status TINYINT(1) NOT NULL DEFAULT 1,
                sort_order INT NOT NULL DEFAULT 0,
                created_at DATETIME NOT NULL,
                PRIMARY KEY (id),
                KEY idx_status (status),
                KEY idx_sort_order (sort_order)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
        );
    } catch (Exception $e) {
        error_log("Error ensuring tbl_ticker_ads table: " . $e->getMessage());
    }
}
