<?php

/**
 *  PHP Mikrotik Billing (https://github.com/hotspotbilling/phpnuxbill/)
 *  by https://t.me/ibnux
 **/

_admin();
$ui->assign('_title', Lang::T('Network'));
$ui->assign('_system_menu', 'network');

$action = $routes['1'];
$ui->assign('_admin', $admin);

if (!in_array($admin['user_type'], ['SuperAdmin', 'Admin'])) {
    _alert(Lang::T('You do not have permission to access this page'), 'danger', "dashboard");
}

require_once $DEVICE_PATH . DIRECTORY_SEPARATOR . 'MikrotikPppoe' . '.php';

switch ($action) {
    case 'list':

        $name = _post('name');
        if ($name != '') {
            $query = ORM::for_table('tbl_pool')->where_like('pool_name', '%' . $name . '%')->order_by_desc('id');
            $d = Paginator::findMany($query, ['name' => $name]);
        } else {
            $query = ORM::for_table('tbl_pool')->order_by_desc('id');
            $d = Paginator::findMany($query);
        }

        $ui->assign('d', $d);
        run_hook('view_pool'); #HOOK
        $ui->display('admin/pool/list.tpl');
        break;

    case 'add':
        $r = ORM::for_table('tbl_routers')->find_many();
        $ui->assign('r', $r);
        run_hook('view_add_pool'); #HOOK
        $ui->display('admin/pool/add.tpl');
        break;

    case 'edit':
        $id  = $routes['2'];
        $d = ORM::for_table('tbl_pool')->find_one($id);
        if ($d) {
            $ui->assign('d', $d);
            run_hook('view_edit_pool'); #HOOK
            $ui->display('admin/pool/edit.tpl');
        } else {
            r2(getUrl('pool/list'), 'e', Lang::T('Account Not Found'));
        }
        break;

    case 'delete':
        $id = $routes['2'];
        run_hook('delete_pool'); #HOOK

        $d = ORM::for_table('tbl_pool')->find_one($id);

        if (!$d) {
            r2(getUrl('pool/list'), 'e', Lang::T('Pool not found.'));
            break;
        }

        $routerName = $d['routers'];

        // Skip if RADIUS pool
        if ($routerName == 'radius') {
            $d->delete();
            r2(getUrl('pool/list'), 's', Lang::T('Radius pool deleted successfully.'));
            break;
        }

        // Find router
        $router = ORM::for_table('tbl_routers')->where('name', $routerName)->find_one();

        if (!$router) {
            // Router not found, delete from DB only
            $d->delete();
            r2(getUrl('pool/list'), 'w', Lang::T('Router not found. Pool deleted locally only.'));
            break;
        }

        // If router is offline, skip Mikrotik call
        if ($router->status !== 'Online') {
            $d->delete();
            r2(getUrl('pool/list'), 'w', Lang::T('Router is offline. Pool deleted locally. Please sync when the router is online.'));
            break;
        }

        // Router online → delete from router too
        if ($_app_stage != 'demo') {
            try {
                (new MikrotikPppoe())->remove_pool($d);
            } catch (Exception $e) {
                // Failsafe in case Mikrotik API error occurs
                $d->delete();
                r2(getUrl('pool/list'), 'w', Lang::T('Error deleting pool from router: ') . $e->getMessage());
                break;
            }
        }

        $d->delete();
        r2(getUrl('pool/list'), 's', Lang::T('Pool deleted and synced successfully.'));
        break;



    case 'sync':
        $pools = ORM::for_table('tbl_pool')->find_many();
        $log = '';

        if (!$pools) {
            r2(getUrl('pool/list'), 'w', Lang::T('No pools found to sync.'));
            break;
        }

        foreach ($pools as $pool) {
            $routerName = $pool['routers'];

            // Skip if it's a RADIUS pool
            if ($routerName == 'radius') {
                $log .= 'SKIPPED: ' . $pool['pool_name'] . ' (RADIUS pool)' . '<br>';
                continue;
            }

            // Check router record
            $router = ORM::for_table('tbl_routers')->where('name', $routerName)->find_one();
            if (!$router) {
                $log .= 'ERROR: Router not found for ' . $pool['pool_name'] . '<br>';
                continue;
            }

            // If router is offline, skip syncing
            if ($router->status !== 'Online') {
                $log .= 'SKIPPED (Offline): ' . $routerName . ' → ' . $pool['pool_name'] . '<br>';
                continue;
            }

            // Perform sync only if router is online and not in demo mode
            if ($_app_stage != 'demo') {
                try {
                    (new MikrotikPppoe())->update_pool($pool, $pool);
                    $log .= '✅ DONE: ' . $pool['pool_name'] . ' (' . $routerName . ')' . '<br>';
                } catch (Exception $e) {
                    $log .= '❌ ERROR: ' . $pool['pool_name'] . ' (' . $routerName . ') — ' . $e->getMessage() . '<br>';
                }
            } else {
                $log .= '⚙️ DEMO: Skipped ' . $pool['pool_name'] . '<br>';
            }
        }

        r2(getUrl('pool/list'), 's', $log);
        break;


    case 'add-post':
        $name = _post('name');
        $ip_address = _post('ip_address');
        $local_ip = _post('local_ip');
        $routers = _post('routers');

        run_hook('add_pool'); #HOOK

        $msg = '';
        if (Validator::Length($name, 30, 2) == false) {
            $msg .= 'Name should be between 3 to 30 characters' . '<br>';
        }
        if ($ip_address == '' || $routers == '') {
            $msg .= Lang::T('All fields are required') . '<br>';
        }

        $d = ORM::for_table('tbl_pool')->where('pool_name', $name)->find_one();
        if ($d) {
            $msg .= Lang::T('Pool Name Already Exist') . '<br>';
        }

        if ($msg == '') {
            // Create the pool entry first
            $b = ORM::for_table('tbl_pool')->create();
            $b->local_ip = $local_ip;
            $b->pool_name = $name;
            $b->range_ip = $ip_address;
            $b->routers = $routers;

            // Check router status
            $offlineCheck = ORM::for_table('tbl_routers')->where('name', $routers)->find_one();

            if (!$offlineCheck) {
                r2(getUrl('pool/list'), 'e', Lang::T('Router not found.'));
                break;
            }

            // Save to database first
            $b->save();

            if ($routers != 'radius') {
                if ($offlineCheck->status === "Online") {
                    // Router is online → push to router
                    if ($_app_stage != 'demo') {
                        (new MikrotikPppoe())->add_pool($b);
                    }
                    r2(getUrl('pool/list'), 's', Lang::T('Pool added and synced successfully.'));
                } else {
                    // Router offline → only save to DB
                    r2(getUrl('pool/list'), 'w', Lang::T('Router is offline. Pool saved locally. Please sync when router is online.'));
                }
            } else {
                r2(getUrl('pool/list'), 's', Lang::T('Radius pool added successfully.'));
            }

        } else {
            r2(getUrl('pool/add'), 'e', $msg);
        }

        break;



    case 'edit-post':
        $local_ip = _post('local_ip');
        $ip_address = _post('ip_address');
        $routers = _post('routers');
        $id = _post('id');

        run_hook('edit_pool'); #HOOK

        $msg = '';

        if ($ip_address == '' || $routers == '') {
            $msg .= Lang::T('All fields are required') . '<br>';
        }

        $d = ORM::for_table('tbl_pool')->find_one($id);
        $old = ORM::for_table('tbl_pool')->find_one($id);

        if (!$d) {
            $msg .= Lang::T('Data not found') . '<br>';
        }

        if ($msg == '') {
            // Update database fields
            $d->local_ip = $local_ip;
            $d->range_ip = $ip_address;
            $d->routers = $routers;
            $d->save();

            // Check router status
            $offlineCheck = ORM::for_table('tbl_routers')->where('name', $routers)->find_one();

            if (!$offlineCheck) {
                r2(getUrl('pool/list'), 'e', Lang::T('Router not found.'));
                break;
            }

            if ($routers != 'radius') {
                if ($offlineCheck->status === "Online") {
                    // Router online → sync the change
                    if ($_app_stage != 'demo') {
                        (new MikrotikPppoe())->update_pool($old, $d);
                    }
                    r2(getUrl('pool/list'), 's', Lang::T('Pool updated and synced successfully.'));
                } else {
                    // Router offline → save only, no sync
                    r2(getUrl('pool/list'), 'w', Lang::T('Router is offline. Pool updated locally. Please sync when the router is online.'));
                }
            } else {
                r2(getUrl('pool/list'), 's', Lang::T('Radius pool updated successfully.'));
            }

        } else {
            r2(getUrl('pool/edit/') . $id, 'e', $msg);
        }
        break;

    case 'port':

        $name = _post('name');
        if ($name != '') {
            $query = ORM::for_table('tbl_port_pool')->where_like('pool_name', '%' . $name . '%')->order_by_desc('id');
            $d = Paginator::findMany($query, ['name' => $name]);
        } else {
            $query = ORM::for_table('tbl_port_pool')->order_by_desc('id');
            $d = Paginator::findMany($query);
        }

        $ui->assign('d', $d);
        run_hook('view_port'); #HOOK
        $ui->display('admin/port/list.tpl');
        break;


    case 'add-port':
        $r = ORM::for_table('tbl_routers')->find_many();
        $ui->assign('r', $r);
        run_hook('view_add_port'); #HOOK
        $ui->display('admin/port/add.tpl');
        break;

    case 'edit-port':
        $id  = $routes['2'];
        $d = ORM::for_table('tbl_port_pool')->find_one($id);
        if ($d) {
            $ui->assign('d', $d);
            run_hook('view_edit_port'); #HOOK
            $ui->display('admin/port/edit.tpl');
        } else {
            r2(getUrl('pool/port'), 'e', Lang::T('Account Not Found'));
        }
        break;

    case 'delete-port':
        $id  = $routes['2'];
        run_hook('delete_port'); #HOOK
        $d = ORM::for_table('tbl_port_pool')->find_one($id);
        if ($d) {
            $d->delete();

            r2(getUrl('pool/port'), 's', Lang::T('Data Deleted Successfully'));
        }
        break;
    case 'add-port-post':
        $name = _post('name');
        $port_range = _post('port_range');
        $public_ip = _post('public_ip');
        $routers = _post('routers');
        run_hook('add_pool'); #HOOK
        $msg = '';
        if (Validator::Length($name, 30, 2) == false) {
            $msg .= 'Name should be between 3 to 30 characters' . '<br>';
        }
        if ($port_range == '' or $routers == '') {
            $msg .= Lang::T('All field is required') . '<br>';
        }

        $d = ORM::for_table('tbl_port_pool')->where('routers', $routers)->find_one();
        if ($d) {
            $msg .= Lang::T('Routers already have ports, each router can only have 1 port range!') . '<br>';
        }
        if ($msg == '') {
            $b = ORM::for_table('tbl_port_pool')->create();
            $b->public_ip = $public_ip;
            $b->port_name = $name;
            $b->range_port = $port_range;
            $b->routers = $routers;
            $b->save();
            r2(getUrl('pool/port'), 's', Lang::T('Data Created Successfully'));
        } else {
            r2(getUrl('pool/add-port'), 'e', $msg);
        }
        break;


    case 'edit-port-post':
        $name = _post('name');
        $public_ip = _post('public_ip');
        $range_port = _post('range_port');
        $routers = _post('routers');
        run_hook('edit_port'); #HOOK
        $msg = '';
        $msg = '';
        if (Validator::Length($name, 30, 2) == false) {
            $msg .= 'Name should be between 3 to 30 characters' . '<br>';
        }
        if ($range_port == '' or $routers == '') {
            $msg .= Lang::T('All field is required') . '<br>';
        }

        $id = _post('id');
        $d = ORM::for_table('tbl_port_pool')->find_one($id);
        $old = ORM::for_table('tbl_port_pool')->find_one($id);
        if (!$d) {
            $msg .= Lang::T('Data Not Found') . '<br>';
        }

        if ($msg == '') {
            $d->port_name = $name;
            $d->public_ip = $public_ip;
            $d->range_port = $range_port;
            $d->routers = $routers;
            $d->save();

            r2(getUrl('pool/port'), 's', Lang::T('Data Updated Successfully'));
        } else {
            r2(getUrl('pool/edit-port/') . $id, 'e', $msg);
        }
        break;

    default:
        r2(getUrl('pool/list/'), 's', '');
}
