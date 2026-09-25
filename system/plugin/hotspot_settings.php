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

// Create banner ads table if it doesn't exist
ensure_banner_ads_table($conn);

function hotspot_settings()
{
    global $ui, $conn;
    _admin();
    $ui->assign('_title', 'Hotspot Settings');
    $admin = Admin::_info();

    // ---- Ticker ad actions ----
    if (
        isset($_GET['delete_ad']) ||
        isset($_GET['toggle_ad']) ||
        (isset($_POST['action']) && $_POST['action'] === 'save_ad')
    ) {
        hotspot_ticker_ads();
        return; // r2() inside redirects
    }

    // ---- Banner ad actions ----
    if (
        isset($_GET['delete_banner']) ||
        isset($_GET['toggle_banner']) ||
        (isset($_POST['action']) && $_POST['action'] === 'save_banner')
    ) {
        hotspot_banner_ads();
        return; // r2() inside redirects
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
        'green'  => ['primary' => 'green',  'secondary' => 'teal'],
        'brown'  => ['primary' => 'yellow', 'secondary' => 'orange'],
        'orange' => ['primary' => 'orange', 'secondary' => 'yellow'],
        'red'    => ['primary' => 'red',    'secondary' => 'pink'],
        'blue'   => ['primary' => 'blue',   'secondary' => 'indigo'],
        'black'  => ['primary' => 'black',  'secondary' => 'gray'],
        'yellow' => ['primary' => 'yellow', 'secondary' => 'red'],
        'pink'   => ['primary' => 'pink',   'secondary' => 'fuchsia'],
    ];

    $primaryColor = $colorSchemes[$selectedColorScheme]['primary'] ?? 'green';
    $secondaryColor = $colorSchemes[$selectedColorScheme]['secondary'] ?? 'teal';

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
                        $updateStmt = $conn->prepare("UPDATE tbl_appconfig SET value = :router_name WHERE setting = 'router_name'");
                        $updateStmt->execute(['router_name' => $routerName['name']]);
                    } else {
                        $insertStmt = $conn->prepare("INSERT INTO tbl_appconfig (setting, value) VALUES ('router_name', :router_name)");
                        $insertStmt->execute(['router_name' => $routerName['name']]);
                    }
                } else {
                    throw new Exception("Router with the specified ID not found.");
                }
            } catch (Exception $e) {
                error_log("Error processing router name: " . $e->getMessage());
            }

            // Prepared statements
            $checkStmt = $conn->prepare("SELECT COUNT(*) FROM tbl_appconfig WHERE setting = ?");
            $updateStmt = $conn->prepare("UPDATE tbl_appconfig SET value = ? WHERE setting = ?");
            $insertStmt = $conn->prepare("INSERT INTO tbl_appconfig (setting, value) VALUES (?, ?)");

            foreach ($settingsToProcess as $key => $value) {
                $checkStmt->execute([$key]);
                $exists = $checkStmt->fetchColumn() > 0;

                if ($exists) {
                    $updateStmt->execute([$value, $key]);
                } else {
                    $insertStmt->execute([$key, $value]);
                }
            }

            // Commit transaction
            $conn->commit();

            r2(U . "plugin/hotspot_settings", 's', "Settings Saved and Uploaded to Router Successfully");
        } catch (Exception $e) {
            if ($conn->inTransaction()) {
                $conn->rollBack();
            }
            error_log("Failed to process settings: " . $e->getMessage());
            r2(U . "plugin/hotspot_settings", 'e', "Error processing settings: " . $e->getMessage());
        }
    }

    // Fetch the current hotspot title from the database
    $stmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'hotspot_title'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $hotspotTitle = $result ? $result['value'] : '';
    $ui->assign('hotspot_title', $hotspotTitle);

    // Fetch the current description from the database
    $stmt = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'description'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $description = $result ? $result['value'] : '';
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

    // Fetch shape selector
    $hostspotShape = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'shape_selector'");
    $hostspotShape->execute();
    $shape = $hostspotShape->fetch(PDO::FETCH_ASSOC);
    $ui->assign('selected_shape_selector', $shape['value'] ?? 'square');

    // Fetch auto/manual display
    $autoManualDisplay = $conn->prepare("SELECT value FROM tbl_appconfig WHERE setting = 'auto_manual_display'");
    $autoManualDisplay->execute();
    $autoManual = $autoManualDisplay->fetch(PDO::FETCH_ASSOC);
    $ui->assign('selected_auto_manual_display', $autoManual['value'] ?? 'auto');

    // GET DOMAIN WITH SUBDOMAIN
    function getMainHTPluginDomain($url)
    {
        $host = parse_url($url, PHP_URL_HOST);
        $parts = explode('.', $host);
        $count = count($parts);
        if ($count >= 3) {
            return implode('.', array_slice($parts, -3));
        } elseif ($count >= 2) {
            return implode('.', array_slice($parts, -2));
        }
        return $host;
    }

    $APP_URL = APP_URL;
    $main_domain = getMainHTPluginDomain($APP_URL);
    $ui->assign('main_domain', $main_domain);

    // Assign the routers and selected router ID to the template
    $ui->assign('routers', $routers);
    $ui->assign('selected_router_id', $selectedRouterId);
    $ui->assign('selected_color_scheme', $selectedColorScheme);

    // Load both ad lists, then render
    hotspot_ticker_ads();
    hotspot_banner_ads();
    $ui->display('hotspot_settings.tpl');
}


/* ======================================================================
 *  TICKER ADS (unchanged)
 * ==================================================================== */

function hotspot_ticker_ads()
{
    global $ui, $conn;

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
        $status  = isset($_POST['ad_status']) ? (int)$_POST['ad_status'] : 1;

        if (empty($message)) {
            r2(U . "plugin/hotspot_settings", 'e', "Ad message cannot be empty");
        }

        try {
            $maxOrder = $conn->query("SELECT COALESCE(MAX(sort_order), 0) + 1 FROM tbl_ticker_ads")->fetchColumn();

            $stmt = $conn->prepare(
                "INSERT INTO tbl_ticker_ads (message,status, sort_order, created_at)
                 VALUES (:message, :status, :sort_order, NOW())"
            );
            $stmt->execute([
                'message'    => $message,
                'status'     => $status,
                'sort_order' => (int)$maxOrder,
            ]);

            r2(U . "plugin/hotspot_settings", 's', "Ad added successfully");
        } catch (Exception $e) {
            error_log("Error saving ticker ad: " . $e->getMessage());
            r2(U . "plugin/hotspot_settings", 'e', "Error saving ad: " . $e->getMessage());
        }
    }

    $stmt = $conn->query("SELECT * FROM tbl_ticker_ads ORDER BY sort_order ASC, id ASC");
    $ticker_ads = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $ui->assign('ticker_ads', $ticker_ads);
}

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


/* ======================================================================
 *  BANNER (PICTURE) ADS
 * ==================================================================== */

const BANNER_MAX_UPLOAD_BYTES = 2097152; // 2 MB upload limit
const BANNER_MAX_WIDTH        = 1200;    // wider images are shrunk to this

/**
 * Folder on disk where banner images are stored: <web root>/ads/
 * (this file lives in system/plugin/, so the root is two levels up)
 */
function banner_ads_dir()
{
    return __DIR__ . '/../uploads/ads/';
}

function ensure_banner_ads_table($conn)
{
    try {
        $conn->exec(
            "CREATE TABLE IF NOT EXISTS tbl_banner_ads (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(150) NULL,
                image_url VARCHAR(500) NOT NULL,
                link VARCHAR(500) NULL,
                status TINYINT(1) NOT NULL DEFAULT 1,
                sort_order INT NOT NULL DEFAULT 0,
                start_date DATE NULL,
                end_date DATE NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
        );
    } catch (Exception $e) {
        error_log("Error ensuring tbl_banner_ads table: " . $e->getMessage());
    }
}

/**
 * Validates and stores an uploaded banner image.
 * Returns [true, 'ads/filename.jpg'] or [false, 'error message'].
 */
function save_banner_image($file)
{
    if (!$file || !isset($file['error']) || $file['error'] === UPLOAD_ERR_NO_FILE) {
        return [false, 'Please choose an image to upload'];
    }
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return [false, 'Upload failed (error code ' . (int)$file['error'] . '). The file may exceed the server upload limit.'];
    }
    if ($file['size'] > BANNER_MAX_UPLOAD_BYTES) {
        return [false, 'Image is too large. Maximum size is 2 MB.'];
    }
    if (!is_uploaded_file($file['tmp_name'])) {
        return [false, 'Invalid upload'];
    }

    // Check the real file contents, not the file name or browser-supplied type
    $info = @getimagesize($file['tmp_name']);
    if (!$info) {
        return [false, 'The file is not a valid image'];
    }
    $allowed = [
        IMAGETYPE_JPEG => 'jpg',
        IMAGETYPE_PNG  => 'png',
        IMAGETYPE_WEBP => 'webp',
    ];
    if (!isset($allowed[$info[2]])) {
        return [false, 'Only JPG, PNG or WEBP images are allowed'];
    }
    $type = $info[2];
    $ext  = $allowed[$type];

    $dir = banner_ads_dir();
    if (!is_dir($dir) && !@mkdir($dir, 0755, true)) {
        return [false, 'Could not create the ads folder. Create "ads" in your web root and make it writable.'];
    }
    if (!is_writable($dir)) {
        return [false, 'The ads folder is not writable. Set its permissions to 755 or 775.'];
    }
    // Stop directory listing
    if (!file_exists($dir . 'index.html')) {
        @file_put_contents($dir . 'index.html', '');
    }

    $name = 'banner_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $dest = $dir . $name;
    $saved = false;

    // Shrink large images (also re-encodes the file) to keep pages light on slow hotspot connections
    if ($info[0] > BANNER_MAX_WIDTH && function_exists('imagecreatetruecolor')) {
        $src = null;
        if ($type === IMAGETYPE_JPEG && function_exists('imagecreatefromjpeg')) {
            $src = @imagecreatefromjpeg($file['tmp_name']);
        } elseif ($type === IMAGETYPE_PNG && function_exists('imagecreatefrompng')) {
            $src = @imagecreatefrompng($file['tmp_name']);
        } elseif ($type === IMAGETYPE_WEBP && function_exists('imagecreatefromwebp')) {
            $src = @imagecreatefromwebp($file['tmp_name']);
        }

        if ($src) {
            $newW = BANNER_MAX_WIDTH;
            $newH = (int)round($info[1] * $newW / $info[0]);
            $dst  = imagecreatetruecolor($newW, $newH);

            if ($type !== IMAGETYPE_JPEG) {
                imagealphablending($dst, false);
                imagesavealpha($dst, true);
            }
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $info[0], $info[1]);

            if ($type === IMAGETYPE_JPEG) {
                $saved = imagejpeg($dst, $dest, 80);
            } elseif ($type === IMAGETYPE_PNG) {
                $saved = imagepng($dst, $dest, 8);
            } else {
                $saved = function_exists('imagewebp') ? imagewebp($dst, $dest, 80) : false;
            }
            imagedestroy($src);
            imagedestroy($dst);
        }
    }

    if (!$saved) {
        if (!move_uploaded_file($file['tmp_name'], $dest)) {
            return [false, 'Could not save the image on the server'];
        }
    }
    @chmod($dest, 0644);

    return [true, 'system/uploads/ads/' . $name];
}

/**
 * Turns a stored path (ads/xyz.jpg) into a full URL for previews.
 */
function banner_preview_url($path)
{
    if (preg_match('#^https?://#i', $path)) {
        return $path;
    }
    return rtrim(APP_URL, '/') . '/' . ltrim($path, '/');
}

function hotspot_banner_ads()
{
    global $ui, $conn;

    ensure_banner_ads_table($conn);
    $back = U . "plugin/hotspot_settings";

    // Handle DELETE (also removes the image file)
    if (isset($_GET['delete_banner'])) {
        $id = (int)$_GET['delete_banner'];

        $stmt = $conn->prepare("SELECT image_url FROM tbl_banner_ads WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $conn->prepare("DELETE FROM tbl_banner_ads WHERE id = :id");
        $stmt->execute(['id' => $id]);

        // Only delete files inside our own ads/ folder
        if ($row && strpos($row['image_url'], 'ads/') === 0) {
            $file = banner_ads_dir() . basename($row['image_url']);
            if (is_file($file)) {
                @unlink($file);
            }
        }
        r2($back, 's', "Banner deleted successfully");
    }

    // Handle TOGGLE status
    if (isset($_GET['toggle_banner'])) {
        $id = (int)$_GET['toggle_banner'];
        $stmt = $conn->prepare("UPDATE tbl_banner_ads SET status = IF(status = 1, 0, 1) WHERE id = :id");
        $stmt->execute(['id' => $id]);
        r2($back, 's', "Banner status updated");
    }

    // Handle ADD new banner
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_banner') {
        $title  = trim($_POST['banner_title'] ?? '');
        $status = isset($_POST['banner_status']) ? (int)$_POST['banner_status'] : 1;
        $start  = trim($_POST['banner_start'] ?? '');
        $end    = trim($_POST['banner_end'] ?? '');

        // Validate dates
        $dateOk = '/^\d{4}-\d{2}-\d{2}$/';
        if ($start !== '' && !preg_match($dateOk, $start)) {
            r2($back, 'e', "Invalid start date");
        }
        if ($end !== '' && !preg_match($dateOk, $end)) {
            r2($back, 'e', "Invalid end date");
        }
        if ($start !== '' && $end !== '' && $end < $start) {
            r2($back, 'e', "End date cannot be before the start date");
        }

        // Upload image
        list($ok, $result) = save_banner_image($_FILES['banner_image'] ?? null);
        if (!$ok) {
            r2($back, 'e', $result);
        }

        try {
            $maxOrder = $conn->query("SELECT COALESCE(MAX(sort_order), 0) + 1 FROM tbl_banner_ads")->fetchColumn();

            $stmt = $conn->prepare(
                "INSERT INTO tbl_banner_ads (title, image_url, status, sort_order, start_date, end_date, created_at)
                 VALUES (:title, :image_url, :status, :sort_order, :start_date, :end_date, NOW())"
            );
            $stmt->execute([
                'title'      => $title !== '' ? $title : null,
                'image_url'  => $result,
                'status'     => $status ? 1 : 0,
                'sort_order' => (int)$maxOrder,
                'start_date' => $start !== '' ? $start : null,
                'end_date'   => $end !== '' ? $end : null,
            ]);

            r2($back, 's', "Banner added successfully");
        } catch (Exception $e) {
            // Don't leave an orphaned image behind if the insert failed
            $file = banner_ads_dir() . basename($result);
            if (is_file($file)) {
                @unlink($file);
            }
            error_log("Error saving banner ad: " . $e->getMessage());
            r2($back, 'e', "Error saving banner: " . $e->getMessage());
        }
    }

    // Fetch all banners for the admin list
    $stmt = $conn->query("SELECT * FROM tbl_banner_ads ORDER BY sort_order ASC, id ASC");
    $banner_ads = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $today = date('Y-m-d');
    foreach ($banner_ads as &$b) {
        $b['preview_url'] = banner_preview_url($b['image_url']);
        // Work out if the banner is really live right now
        $live = ((int)$b['status'] === 1)
            && (empty($b['start_date']) || $b['start_date'] <= $today)
            && (empty($b['end_date']) || $b['end_date'] >= $today);
        $b['is_live'] = $live ? 1 : 0;
    }
    unset($b);

    $ui->assign('banner_ads', $banner_ads);
}
