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

function mikrotik_ipbinding_edit_ui()
{
    global $ui, $routes;
    _admin();

    $ui->assign('_system_menu', 'Mikrotik IP Binding');
    $admin = Admin::_info();
    $ui->assign('_admin', $admin);

    // Binding id comes from the route segment
    $bindingId = $routes['2'] ?? 0;

    $binding = ORM::for_table('tbl_mikrotik_bindings')->find_one($bindingId);
    if (!$binding) {
        r2(U . 'plugin/mikrotik_ipbinding_ui', 'e', 'Binding not found');
        return;
    }

    $routerId = $binding->router_id;

    // Fetch routers (for the selector, kept consistent with the add form)
    $routers = ORM::for_table('tbl_routers')->where('enabled', 1)->find_many();
    $ui->assign('routers', $routers);
    $ui->assign('router', $routerId);

    // Fetch selected router
    $selectedRouter = ORM::for_table('tbl_routers')->find_one($routerId);

    // Fetch packages available for this router
    $packages = ORM::for_table('tbl_plans')
        ->where('routers', $selectedRouter->name ?? '')
        ->where('enabled', 1)
        ->find_many();
    $ui->assign('packages', $packages);

    // Pass the binding itself so the tpl can pre-fill the form
    $ui->assign('binding', $binding);

    $ui->display('mikrotik_ipbinding_edit.tpl');
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
    // Strip all non-hex chars, then re-insert colons every 2 chars, uppercase
    $rawMac = preg_replace('/[^a-fA-F0-9]/', '', $_POST['mac']);
    $mac    = strtoupper(implode(':', str_split($rawMac, 2)));// must be real MAC
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

    header("Location: " . U . "plugin/ip_list_ui/$routerId");
    exit;
}

/**
 * Create (or extend) a bypassed IP binding for a MAC. No redirects, no die().
 * Returns true on success, false on failure.
 */
function mikrotik_ipbinding_create($routerId, $macRaw, $package_id, $device_name = '', $comment = '')
{
    try {
        $rawMac = preg_replace('/[^a-fA-F0-9]/', '', $macRaw);
        if (strlen($rawMac) !== 12) return false;
        $mac = strtoupper(implode(':', str_split($rawMac, 2)));
        $type = 'bypassed';

        $package = ORM::for_table('tbl_plans')->find_one($package_id);
        $router  = ORM::for_table('tbl_routers')->find_one($routerId);
        if (!$package || !$router) return false;

        $newDuration = "+{$package->validity} {$package->validity_unit}";

        // TV already has an active binding -> just extend it (repeat purchase)
        $existing = ORM::for_table('tbl_mikrotik_bindings')
            ->where('router_id', $routerId)
            ->where('mac_address', $mac)
            ->where('status', 'active')
            ->find_one();

        if ($existing) {
            // Guard against double-processing: if this exact recharge event
            // (same comment, e.g. order/transaction reference) was already
            // applied to this binding, don't extend again.
            if ($comment !== '' && $existing->comment === $comment) {
                _log("mikrotik_ipbinding_create: duplicate recharge ignored (mac={$mac}, comment={$comment})");
                return true;
            }

            $base = max(time(), strtotime($existing->expires ?: 'now'));
            $existing->expires      = date('Y-m-d H:i:s', strtotime($newDuration, $base));
            $existing->package_id   = $package_id;
            $existing->package_name = $package->name_plan;
            $existing->comment      = $comment; // persist so the next duplicate call can be detected
            $existing->save();
            return true;
        }

        $expires = date('Y-m-d H:i:s', strtotime($newDuration));

        $ip = mikrotik_get_next_ip($routerId);
        if (!$ip) return false;

        $client = Mikrotik::getClient($router->ip_address, $router->username, $router->password);

        // Step 1: static DHCP lease (ignore "already exists" errors)
        try {
            $dhcpReq = new RouterOS\Request('/ip/dhcp-server/lease/add');
            $dhcpReq->setArgument('mac-address', $mac);
            $dhcpReq->setArgument('address', $ip);
            $dhcpReq->setArgument('comment', $device_name);
            $client->sendSync($dhcpReq);
        } catch (\Throwable $e) {
            _log('TV DHCP lease: ' . $e->getMessage());
        }

        // Step 2: hotspot ip-binding
        $req = new RouterOS\Request('/ip/hotspot/ip-binding/add');
        $req->setArgument('address', $ip);
        $req->setArgument('mac-address', $mac);
        $req->setArgument('type', $type);
        $req->setArgument('comment', $device_name);
        $response = $client->sendSync($req);

        $mikrotik_id = null;
        foreach ($response as $item) {
            $mikrotik_id = $item->getProperty('.id');
            if ($mikrotik_id) break;
        }
        if (!$mikrotik_id) {
            $reqFind = new RouterOS\Request('/ip/hotspot/ip-binding/print');
            $reqFind->setQuery(RouterOS\Query::where('mac-address', $mac));
            foreach ($client->sendSync($reqFind) as $item) {
                $mikrotik_id = $item->getProperty('.id');
                if ($mikrotik_id) break;
            }
        }
        if (!$mikrotik_id) return false;

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

        return true;
    } catch (\Throwable $e) {
        _log('mikrotik_ipbinding_create failed: ' . $e->getMessage());
        return false;
    }
}


// Sync DB with router state
function mikrotik_ipbinding_sync() {

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

    $routerId = $_POST['router'] ?? null;

    try {
        mikrotik_ipbinding_sync($routerId ?: null);
        echo json_encode(['status' => 'success', 'message' => 'Bindings synced successfully.']);
    } catch (\Throwable $e) {
        _log('mikrotik_ipbinding_sync_ui failed: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Sync failed. Check logs for details.']);
    }

    // 1. Expire anything past its date first
    mikrotik_remove_expired_bindings();

    // 2. Reconcile active bindings against the router
    $routers = $routerId
        ? [ORM::for_table('tbl_routers')->find_one($routerId)]
        : ORM::for_table('tbl_routers')->where('enabled', 1)->find_many();

    foreach ($routers as $router) {
        if (!$router) continue;

        // Skip routers that are marked offline — don't attempt anything on them
        if (isset($router->status) && strtolower($router->status) !== 'online') {
            _log("sync: router {$router->id} ({$router->name}) is offline — skipping");
            echo "Router {$router->id} ({$router->name}) is offline. Skipped.\n";
            continue;
        }

        $activeBindings = ORM::for_table('tbl_mikrotik_bindings')
            ->where('router_id', $router->id)
            ->where('status', 'active')
            ->find_many();

        if (!$activeBindings) continue;

        try {
            $client = Mikrotik::getClient($router->ip_address, $router->username, $router->password);
        } catch (\Throwable $e) {
            _log("sync: cannot connect to router {$router->id}: " . $e->getMessage());
            continue;
        }
        // Pull current router state once per router (cheap vs. per-binding lookups)
        $routerMacs = [];
        try {
            $reqIpb = new RouterOS\Request('/ip/hotspot/ip-binding/print');
            foreach ($client->sendSync($reqIpb) as $item) {
                $mac = $item->getProperty('mac-address');
                if ($mac) $routerMacs[strtoupper($mac)] = $item->getProperty('.id');
            }
        } catch (\Throwable $e) {
            _log("sync: failed to fetch ip-bindings from router {$router->id}: " . $e->getMessage());
            continue; // don't risk mass-recreating if we can't even read current state
        }

        foreach ($activeBindings as $binding) {
            $mac = strtoupper($binding->mac_address);

            if (isset($routerMacs[$mac])) {
                // Present on router — make sure our stored mikrotik_id is still correct
                if ($binding->mikrotik_id !== $routerMacs[$mac]) {
                    $binding->mikrotik_id = $routerMacs[$mac];
                    $binding->save();
                }
                continue;
            }

            // Missing on router but marked active in DB -> recreate it
            _log("sync: recreating missing binding for {$mac} on router {$router->id}");

            try {
                // Static DHCP lease (ignore "already exists")
                try {
                    $dhcpReq = new RouterOS\Request('/ip/dhcp-server/lease/add');
                    $dhcpReq->setArgument('mac-address', $mac);
                    $dhcpReq->setArgument('address', $binding->ip_address);
                    $dhcpReq->setArgument('comment', $binding->device_name);
                    $client->sendSync($dhcpReq);
                } catch (\Throwable $e) {
                    _log("sync: DHCP lease re-add failed for {$mac}: " . $e->getMessage());
                }

                // Hotspot ip-binding
                $req = new RouterOS\Request('/ip/hotspot/ip-binding/add');
                $req->setArgument('address', $binding->ip_address);
                $req->setArgument('mac-address', $mac);
                $req->setArgument('type', $binding->type ?: 'bypassed');
                $req->setArgument('comment', $binding->device_name);
                $response = $client->sendSync($req);

                $newId = null;
                foreach ($response as $item) {
                    $newId = $item->getProperty('.id');
                    if ($newId) break;
                }
                if (!$newId) {
                    $reqFind = new RouterOS\Request('/ip/hotspot/ip-binding/print');
                    $reqFind->setQuery(RouterOS\Query::where('mac-address', $mac));
                    foreach ($client->sendSync($reqFind) as $item) {
                        $newId = $item->getProperty('.id');
                        if ($newId) break;
                    }
                }

                if ($newId) {
                    $binding->mikrotik_id = $newId;
                    $binding->save();
                    echo "Re-added binding on router: {$mac}\n";
                } else {
                    _log("sync: could not confirm re-added binding id for {$mac} on router {$router->id}");
                }
            } catch (\Throwable $e) {
                _log("sync: failed to recreate binding for {$mac} on router {$router->id}: " . $e->getMessage());
            }
        }
    }
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

            $router = ORM::for_table('tbl_routers')->find_one($binding->router_id);

            if (!$router) {
                continue;
            }

            // Skip router cleanup if offline — DB is already updated above
            if (isset($router->status) && strtolower($router->status) !== 'online') {
                _log("expire: router {$router->id} ({$router->name}) is offline — skipped router cleanup for {$binding->mac_address}");
                echo "Router {$router->id} ({$router->name}) is offline. Skipped router cleanup for {$binding->mac_address}.\n";
                continue;
            }

            $client = Mikrotik::getClient(
                $router->ip_address,
                $router->username,
                $router->password
            );

            // Remove Hotspot IP Binding
            try {
                $req = new RouterOS\Request('/ip/hotspot/ip-binding/remove');
                $req->setArgument('.id', $binding->mikrotik_id);
                $client->sendSync($req);
            } catch (Exception $e) {
                _log("Unable to remove hotspot binding {$binding->mikrotik_id}: " . $e->getMessage());
            }

            // Remove DHCP Lease
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
            // 1. Disable in database
            // -----------------------------
            $binding->status = 'inactive';
            $binding->save();

            echo "Removed from router: {$binding->mac_address}\n";

        } catch (Throwable $e) {
            _log("Expired Binding Router Error ({$binding->mac_address}): " . $e->getMessage());
            echo "Router cleanup failed for {$binding->mac_address}: " . $e->getMessage() . "\n";
        }
    }
}

// Update binding inline
function mikrotik_ipbinding_update()
{
    global $routes;
    _admin();

    $bindingId  = $_POST['id'] ?? 0;
    $routerId   = $_POST['router'] ?? 0;
    $mac        = trim($_POST['mac'] ?? '');
    $deviceName = trim($_POST['device_name'] ?? '');
    $type       = $_POST['type'] ?? 'regular';
    $comment    = trim($_POST['comment'] ?? '');
    $packageId  = $_POST['package'] ?? 0;

    $binding = ORM::for_table('tbl_mikrotik_bindings')->find_one($bindingId);
    if (!$binding) {
        r2(U . 'plugin/mikrotik_ipbinding_ui', 'e', 'Binding not found');
        return;
    }

    if ($mac === '' || $packageId === '') {
        r2(U . 'plugin/mikrotik_ipbinding_edit_ui/' . $bindingId, 'e', 'MAC address and package are required');
        return;
    }

    $binding->router_id    = $routerId;
    $binding->mac_address  = $mac;
    $binding->device_name  = $deviceName;
    $binding->type         = $type;
    $binding->comment      = $comment;
    $binding->package_id   = $packageId;
    $binding->updated_at   = date('Y-m-d H:i:s');
    $binding->save();

    // Optional: push the change to the Mikrotik router itself here,
    // mirroring whatever mikrotik_ipbinding_add() does after insert.

    r2(U . 'plugin/mikrotik_ipbinding_ui/' . $routerId, 's', 'Binding updated successfully');
}

