<?php
use PEAR2\Net\RouterOS;
use PEAR2\Net\RouterOS\Client;
use PEAR2\Net\RouterOS\Request;


// Display UI
function mikrotik_ipbinding_ui() {
    global $ui, $routes;
    _admin();

    $ui->assign('_system_menu', 'Mikrotik IP Binding');
    $admin = Admin::_info();
    $ui->assign('_admin', $admin);

    // Fetch routers
    $routers = ORM::for_table('tbl_routers')->where('enabled', 1)->find_many();
    $routerId = $routes['2'] ?? ($routers[0]->id ?? 0);
    $ui->assign('routers', $routers);
    $ui->assign('router', $routerId);

    // Fetch selected router
    $selectedRouter = ORM::for_table('tbl_routers')->find_one($routerId);

    // Fetch packages for this router
    $packages = ORM::for_table('tbl_plans')
        ->where('routers', $selectedRouter->name ?? '')
        ->where('enabled', 1)
        ->find_many();
    $ui->assign('packages', $packages);

    // Fetch bindings
    $bindings = ORM::for_table('tbl_mikrotik_bindings')
        ->where('router_id', $routerId)
        ->find_many();
    $ui->assign('bindings', $bindings);

    $ui->display('mikrotik_ipbinding.tpl');
}

// Fetch next free IP from Mikrotik pool
function mikrotik_get_next_ip($routerId) {
    $router = ORM::for_table('tbl_routers')->find_one($routerId);
    if (!$router) return '';

    $client = Mikrotik::getClient($router->ip_address, $router->username, $router->password);

    // Step 1: Get pool name from hotspot server
    $req = new RouterOS\Request('/ip/hotspot/print');
    $servers = $client->sendSync($req);
    $poolName = '';
    foreach ($servers as $server) {
        $poolName = $server->getProperty('address-pool');
        if ($poolName) break;
    }

    if (!$poolName) return '';

    // Step 2: Get pool range
    $req = new RouterOS\Request('/ip/pool/print');
    $pools = $client->sendSync($req);
    $range = '';
    foreach ($pools as $pool) {
        if ($pool->getProperty('name') === $poolName) {
            $range = $pool->getProperty('ranges');
            break;
        }
    }

    if (!$range) return '';

    // Step 3: Collect used IPs from active sessions
    $usedIps = [];
    $reqActive = new RouterOS\Request('/ip/hotspot/active/print');
    $active = $client->sendSync($reqActive);
    foreach ($active as $u) {
        $usedIps[] = $u->getProperty('address');
    }

    // Step 4: Collect used IPs from existing bindings
    $reqBindings = new RouterOS\Request('/ip/hotspot/ip-binding/print');
    $bindings = $client->sendSync($reqBindings);
    foreach ($bindings as $b) {
        $addr = $b->getProperty('address');
        if ($addr) $usedIps[] = $addr;
    }

    // Step 5: Find next free IP
    list($start, $end) = explode('-', trim($range));
    $startLong = ip2long(trim($start));
    $endLong   = ip2long(trim($end));

    if ($startLong === false || $endLong === false) return '';

    for ($ip_long = $startLong; $ip_long <= $endLong; $ip_long++) {
        $ip = long2ip($ip_long);
        if (!in_array($ip, $usedIps)) {
            return $ip;
        }
    }

    return ''; // Pool exhausted
}

// Add binding
function mikrotik_ipbinding_add() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

    $routerId    = $_POST['router'];
    $mac         = $_POST['mac']; // must be real MAC
    $type        = 'bypassed';
    $device_name = $_POST['device_name'] ?? '';
    $comment     = $_POST['comment'] ?? '';
    $package_id  = $_POST['package'] ?? '';

    $package = ORM::for_table('tbl_plans')->find_one($package_id);
    $expires = $package
        ? date('Y-m-d H:i:s', strtotime("+{$package->validity} {$package->validity_unit}"))
        : '';

    $ip = mikrotik_get_next_ip($routerId);
    if (!$ip) die("No available IP in hotspot pool");

    $router = ORM::for_table('tbl_routers')->find_one($routerId);
    if (!$router) return;

    $client = Mikrotik::getClient($router->ip_address, $router->username, $router->password);

    // Step 1: Create static DHCP lease so MAC always gets the same IP
    $dhcpReq = new RouterOS\Request('/ip/dhcp-server/lease/add');
    $dhcpReq->setArgument('mac-address', $mac);
    $dhcpReq->setArgument('address', $ip);
    $dhcpReq->setArgument('comment', $device_name);
    $client->sendSync($dhcpReq);

    // Step 2: Add hotspot IP binding with that IP
    $req = new RouterOS\Request('/ip/hotspot/ip-binding/add');
    $req->setArgument('address', $ip);
    $req->setArgument('mac-address', $mac);
    $req->setArgument('type', $type);
    $req->setArgument('comment', $device_name);
    $response = $client->sendSync($req);

    // Get mikrotik_id
    $mikrotik_id = null;
    foreach ($response as $item) {
        $mikrotik_id = $item->getProperty('.id');
        if ($mikrotik_id) break;
    }

    if (!$mikrotik_id) {
        $reqFind = new RouterOS\Request('/ip/hotspot/ip-binding/print');
        $reqFind->setQuery(RouterOS\Query::where('mac-address', $mac));
        $found = $client->sendSync($reqFind);
        foreach ($found as $item) {
            $mikrotik_id = $item->getProperty('.id');
            if ($mikrotik_id) break;
        }
    }

    if (!$mikrotik_id) die("Failed to retrieve MikroTik binding ID");

        ORM::for_table('tbl_mikrotik_bindings')->create()->set([
            'router_id'    => $routerId,
            'mikrotik_id'  => $mikrotik_id,
            'ip_address'   => $ip,
            'mac_address'  => $mac,
            'device_name'  => $device_name,
            'type'         => $type,
            'comment'      => $comment,
            'package_id'   => $package_id,
            'package_name' => $package->name_plan ?? '',
            'expires'      => $expires,
            'status'       => 'active'
        ])->save();

    header("Location: " . U . "plugin/mikrotik_ipbinding_ui/$routerId");
    exit;
}

// cron job to remove expired bindings
function mikrotik_remove_expired_bindings()
{
    $now = date('Y-m-d H:i:s');

    $expiredBindings = ORM::for_table('tbl_mikrotik_bindings')
        ->where_not_null('expires')
        ->where_lte('expires', $now)
        ->where('status', 'active')
        ->find_many();

    if (!$expiredBindings) {
        return;
    }

    foreach ($expiredBindings as $binding) {

        try {

            $router = ORM::for_table('tbl_routers')
                ->find_one($binding->router_id);

            if (!$router) {
                continue;
            }

            $client = Mikrotik::getClient(
                $router->ip_address,
                $router->username,
                $router->password
            );

            // -----------------------------
            // Remove Hotspot IP Binding
            // -----------------------------
            try {
                $req = new RouterOS\Request('/ip/hotspot/ip-binding/remove');
                $req->setArgument('.id', $binding->mikrotik_id);
                $client->sendSync($req);
            } catch (Exception $e) {
                _log("Unable to remove hotspot binding {$binding->mikrotik_id}: " . $e->getMessage());
            }

            // -----------------------------
            // Remove DHCP Lease
            // -----------------------------
            if (!empty($binding->mac_address)) {

                $leaseReq = new RouterOS\Request('/ip/dhcp-server/lease/print');
                $leaseReq->setQuery(
                    RouterOS\Query::where('mac-address', $binding->mac_address)
                );

                $leases = $client->sendSync($leaseReq);

                foreach ($leases as $lease) {

                    $leaseId = $lease->getProperty('.id');

                    if ($leaseId) {
                        $removeLease = new RouterOS\Request('/ip/dhcp-server/lease/remove');
                        $removeLease->setArgument('.id', $leaseId);
                        $client->sendSync($removeLease);
                    }
                }
            }

            // -----------------------------
            // Disable Local Record
            // -----------------------------
            $binding->status = 'inactive';
            $binding->save();

            echo "Expired IP Binding disabled: {$binding->mac_address}\n";

        } catch (Throwable $e) {

            _log("Expired Binding Error: " . $e->getMessage());

            echo "Failed disabling {$binding->mac_address}: "
                . $e->getMessage() . "\n";
        }
    }
}

// Update binding inline
function mikrotik_ipbinding_update() {
    $routerId = $_POST['router'];
    $id = $_POST['id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    $mikrotik = ORM::for_table('tbl_routers')->find_one($routerId);
    if (!$mikrotik) return;

    $client = Mikrotik::getClient($mikrotik->ip_address, $mikrotik->username, $mikrotik->password);
    $req = new RouterOS\Request('/ip/hotspot/ip-binding/set');
    $req->setArgument('.id', $id);
    $req->setArgument($field, $value);
    $client->sendSync($req);

    $binding = ORM::for_table('tbl_mikrotik_bindings')->where('mikrotik_id', $id)->find_one();
    if ($binding) {
        $binding->$field = $value;
        $binding->save();
    }

    echo json_encode(["status" => "success"]);
}
