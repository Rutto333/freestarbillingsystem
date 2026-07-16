<?php
/**
 *  MikroTik Monitor for PHPNuxBill
 *  Online Users Monitoring and Management
 **/

_admin();
$ui->assign('_title', 'Online Users');
$ui->assign('_system_menu', 'mikrotik_monitor');

$action = $routes['1'];
$ui->assign('_admin', $admin);

// ADD THIS LINE - This is what was missing!
$appUrl = APP_URL;
$ui->assign('appUrl', $appUrl);

switch ($action) {
    case 'api':
        switch ($routes['2']) {
            case 'online-users':
                $router_id = isset($routes['3']) ? $routes['3'] : null;
                $data = MikrotikMonitorController::getOnlineUsers($router_id);
                header('Content-Type: application/json');
                echo json_encode($data);
                exit;
                break;
            case 'online-users-count':
                $router_id = isset($routes['3']) ? $routes['3'] : null;
                $count = MikrotikMonitorController::getOnlineUsersCount($router_id);
                header('Content-Type: application/json');
                echo json_encode(['count' => $count]);
                exit;
                break;
            default:
                r2(U . 'mikrotik-monitor', 'e', 'API endpoint not found');
        }
        break;

    case 'disconnect':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            r2(U . 'mikrotik-monitor', 'e', 'Invalid request method');
            return;
        }

        $router_id = _post('router_id');
        $username = _post('username');
        $user_type = _post('user_type');

        if (!$router_id || !$username || !$user_type) {
            r2(U . 'mikrotik-monitor', 'e', 'Missing required parameters');
            return;
        }

        $router = ORM::for_table('tbl_routers')->where('enabled', '1')->find_one($router_id);
        if (!$router) {
            r2(U . 'mikrotik-monitor', 'e', 'Router not found');
            return;
        }

        try {
            $client = Mikrotik::getClient($router['ip_address'], $router['username'], $router['password']);

            if ($user_type == 'hotspot') {
                Mikrotik::removeHotspotActiveUser($client, $username);
                r2(U . 'mikrotik-monitor', 's', 'Hotspot user ' . $username . ' disconnected successfully');
            } elseif ($user_type == 'pppoe') {
                Mikrotik::removePpoeActive($client, $username);
                r2(U . 'mikrotik-monitor', 's', 'PPPoE user ' . $username . ' disconnected successfully');
            } else {
                r2(U . 'mikrotik-monitor', 'e', 'Invalid user type');
            }
        } catch (Exception $e) {
            _log('Error disconnecting user: ' . $e->getMessage());
            r2(U . 'mikrotik-monitor', 'e', 'Failed to disconnect user: ' . $e->getMessage());
        }
        break;

    default:
        // Main UI - index page
        
        // Get all enabled routers
        $routers = ORM::for_table('tbl_routers')->where('enabled', '1')->find_many();
        
        // FIXED: Use routes[1] for router_id since routes[0] is the base route
        $router_id = isset($routes['1']) && !empty($routes['1']) && is_numeric($routes['1']) ? $routes['1'] : ($routers ? $routers[0]['id'] : null);
        
        if (!$router_id) {
            r2(U . 'routers', 'e', 'No MikroTik router configured');
            return;
        }
        
        $ui->assign('routers', $routers);
        $ui->assign('router_id', $router_id);
        
        // Add required CSS and JS
        $ui->assign('xheader', MikrotikMonitorController::getHeaderAssets());
        
        $ui->display('admin/customers/online_users_admin.tpl');
        break;
}

/**
 * MikroTik Monitor Controller Class - Online Users Only
 */
class MikrotikMonitorController
{
    /**
     * Get online users count for sidebar
     */
    public static function getOnlineUsersCount($router_id = null)
    {
        if (!$router_id) {
            $router = ORM::for_table('tbl_routers')->where('enabled', '1')->find_one();
            if (!$router) return 0;
            $router_id = $router['id'];
        } else {
            $router = ORM::for_table('tbl_routers')->where('enabled', '1')->find_one($router_id);
            if (!$router) return 0;
        }

        try {
            $client = Mikrotik::getClient($router['ip_address'], $router['username'], $router['password']);
            
            // Count PPPoE users
            $pppUsers = $client->sendSync(new PEAR2\Net\RouterOS\Request('/ppp/active/print'));
            $pppCount = count($pppUsers);
            
            // Count Hotspot users
            $hotspotUsers = $client->sendSync(new PEAR2\Net\RouterOS\Request('/ip/hotspot/active/print'));
            $hotspotCount = count($hotspotUsers);
            
            return $pppCount + $hotspotCount;
            
        } catch (Exception $e) {
            _log('Error getting online users count: ' . $e->getMessage());
            return 0;
        }
    }

    /**
     * Get detailed online users data
     */
    public static function getOnlineUsers($router_id = null)
    {
        if (!$router_id) {
            $router = ORM::for_table('tbl_routers')->where('enabled', '1')->find_one();
            if (!$router) return [];
            $router_id = $router['id'];
        } else {
            $router = ORM::for_table('tbl_routers')->where('enabled', '1')->find_one($router_id);
            if (!$router) return [];
        }

        try {
            $client = Mikrotik::getClient($router['ip_address'], $router['username'], $router['password']);
            
            $onlineUsers = [
                'pppoe' => self::getPPPoEUsers($client),
                'hotspot' => self::getHotspotUsers($client),
                'total' => 0
            ];
            
            $onlineUsers['total'] = count($onlineUsers['pppoe']) + count($onlineUsers['hotspot']);
            
            return $onlineUsers;
            
        } catch (Exception $e) {
            _log('Error getting online users: ' . $e->getMessage());
            return ['pppoe' => [], 'hotspot' => [], 'total' => 0];
        }
    }

    /**
     * Get PPPoE users
     */
    private static function getPPPoEUsers($client)
    {
        try {
            $pppUsers = $client->sendSync(new PEAR2\Net\RouterOS\Request('/ppp/active/print'));
            $interfaceTraffic = $client->sendSync(new PEAR2\Net\RouterOS\Request('/interface/print'));
            
            // Build interface data array
            $interfaceData = [];
            foreach ($interfaceTraffic as $interface) {
                $name = $interface->getProperty('name');
                if (!empty($name)) {
                    $interfaceData[$name] = [
                        'txBytes' => intval($interface->getProperty('tx-byte')),
                        'rxBytes' => intval($interface->getProperty('rx-byte')),
                    ];
                }
            }

            $userList = [];
            foreach ($pppUsers as $pppUser) {
                $username = $pppUser->getProperty('name');
                $address = $pppUser->getProperty('address');
                $uptime = $pppUser->getProperty('uptime');
                $service = $pppUser->getProperty('service');
                $callerid = $pppUser->getProperty('caller-id');

                // Get traffic data
                $interfaceName = "<pppoe-$username>";
                if (isset($interfaceData[$interfaceName])) {
                    $trafficData = $interfaceData[$interfaceName];
                    $txBytes = $trafficData['txBytes'];
                    $rxBytes = $trafficData['rxBytes'];
                } else {
                    $txBytes = 0;
                    $rxBytes = 0;
                }

                $userList[] = [
                    'username' => $username,
                    'address' => $address,
                    'uptime' => $uptime,
                    'service' => $service,
                    'caller_id' => $callerid,
                    'tx' => self::formatBytes($txBytes),
                    'rx' => self::formatBytes($rxBytes),
                    'total' => self::formatBytes($txBytes + $rxBytes),
                    'type' => 'pppoe'
                ];
            }

            return $userList;
        } catch (Exception $e) {
            _log('Error getting PPPoE users: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get Hotspot users
     */
    private static function getHotspotUsers($client)
    {
        try {
            $hotspotActive = $client->sendSync(new PEAR2\Net\RouterOS\Request('/ip/hotspot/active/print'));

            $hotspotList = [];
            foreach ($hotspotActive as $hotspot) {
                $username = $hotspot->getProperty('user');
                $address = $hotspot->getProperty('address');
                $uptime = $hotspot->getProperty('uptime');
                $server = $hotspot->getProperty('server');
                $mac = $hotspot->getProperty('mac-address');
                $sessionTime = $hotspot->getProperty('session-time-left');
                $rxBytes = intval($hotspot->getProperty('bytes-in'));
                $txBytes = intval($hotspot->getProperty('bytes-out'));

                $hotspotList[] = [
                    'username' => $username,
                    'address' => $address,
                    'uptime' => $uptime,
                    'server' => $server,
                    'mac' => $mac,
                    'session_time' => $sessionTime,
                    'rx' => self::formatBytes($rxBytes),
                    'tx' => self::formatBytes($txBytes),
                    'total' => self::formatBytes($txBytes + $rxBytes),
                    'type' => 'hotspot'
                ];
            }

            return $hotspotList;
        } catch (Exception $e) {
            _log('Error getting Hotspot users: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Format bytes to human readable format
     */
    private static function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    /**
     * Get header assets (CSS/JS)
     */
    public static function getHeaderAssets()
    {
        return '
        <style>
            /* Simple brown warm theme - embedded styles */
            .mikrotik-monitor {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            }
        </style>';
    }
}

// Function to get online users count for sidebar integration
function get_mikrotik_online_users_count()
{
    return MikrotikMonitorController::getOnlineUsersCount();
}

// Function to get detailed online users data for sidebar
function get_mikrotik_online_users_data()
{
    return MikrotikMonitorController::getOnlineUsers();
}