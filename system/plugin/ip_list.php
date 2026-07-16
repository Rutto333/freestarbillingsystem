<?php
// File: ip_list.php

use PEAR2\Net\RouterOS;
use PEAR2\Net\RouterOS\Client;
use PEAR2\Net\RouterOS\Request;
register_menu("Mikrotik IP Binding", true, "ip_list_ui", 'AFTER_NETWORKS');


function ip_list_ui() {
    global $ui;
    _admin();

    $ui->assign('_title', 'Mikrotik IP Bindings');
    $ui->assign('_system_menu', 'Mikrotik IP List');
    $admin = Admin::_info();
    $ui->assign('_admin', $admin);

    // Join bindings with routers to fetch router name
    $bindings = ORM::for_table('tbl_mikrotik_bindings')
        ->table_alias('b')
        ->select('b.*')
        ->select('r.name', 'router_name') // alias router name
        ->join('tbl_routers', array('b.router_id', '=', 'r.id'), 'r')
        ->order_by_desc('b.id')
        ->find_many();

    $ui->assign('bindings', $bindings);

    // Summary stats
    $total    = ORM::for_table('tbl_mikrotik_bindings')->count();
    $regular  = ORM::for_table('tbl_mikrotik_bindings')->where('type', 'regular')->count();
    $bypassed = ORM::for_table('tbl_mikrotik_bindings')->where('type', 'bypassed')->count();
    $blocked  = ORM::for_table('tbl_mikrotik_bindings')->where('type', 'blocked')->count();

    $ui->assign('total', $total);
    $ui->assign('regular', $regular);
    $ui->assign('bypassed', $bypassed);
    $ui->assign('blocked', $blocked);

    $ui->display('ip_list.tpl');
}

function ip_list_remove() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

    $id = $_POST['id'];
    $binding = ORM::for_table('tbl_mikrotik_bindings')->find_one($id);

    if (!$binding) {
        echo json_encode(["status" => "error", "message" => "Not found"]);
        return;
    }

    $router = ORM::for_table('tbl_routers')->find_one($binding->router_id);

    if ($router) {
        $client = Mikrotik::getClient($router->ip_address, $router->username, $router->password);

        // Step 1: Remove hotspot IP binding from MikroTik
        $req = new RouterOS\Request('/ip/hotspot/ip-binding/remove');
        $req->setArgument('.id', $binding->mikrotik_id);
        $client->sendSync($req);

        // Step 2: Find and remove DHCP lease by MAC
        if ($binding->mac_address) {
            $leaseReq = new RouterOS\Request('/ip/dhcp-server/lease/print');
            $leaseReq->setQuery(RouterOS\Query::where('mac-address', $binding->mac_address));
            $leases = $client->sendSync($leaseReq);

            foreach ($leases as $lease) {
                $leaseId = $lease->getProperty('.id');
                if ($leaseId) {
                    $removeLeaseReq = new RouterOS\Request('/ip/dhcp-server/lease/remove');
                    $removeLeaseReq->setArgument('.id', $leaseId);
                    $client->sendSync($removeLeaseReq);
                }
            }
        }
    }

    // Step 3: Remove from local DB
    $binding->delete();

    echo json_encode(["status" => "success"]);
}
