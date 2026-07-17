<?php
// File: ip_list.php

use PEAR2\Net\RouterOS;
use PEAR2\Net\RouterOS\Client;
use PEAR2\Net\RouterOS\Request;
register_menu("Mikrotik IP Binding", true, "ip_list_ui", 'AFTER_NETWORKS');


function ip_list_ui() {
    ensure_mikrotik_bindings_table();
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
    ensure_mikrotik_bindings_table();
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

function ensure_mikrotik_bindings_table()
{
    $db = ORM::get_db();

    // Check if table exists
    $stmt = $db->query("SHOW TABLES LIKE 'tbl_mikrotik_bindings'");

    if ($stmt->rowCount() > 0) {
        return;
    }

    // Create table
    $sql = "
    CREATE TABLE `tbl_mikrotik_bindings` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `router_id` int(11) NOT NULL,
      `mikrotik_id` varchar(50) NOT NULL,
      `ip_address` varchar(45) DEFAULT NULL,
      `mac_address` varchar(17) DEFAULT NULL,
      `device_name` varchar(100) DEFAULT NULL,
      `type` enum('regular','bypassed','blocked') DEFAULT 'regular',
      `comment` varchar(255) DEFAULT NULL,
      `package_id` int(11) DEFAULT NULL,
      `package_name` varchar(100) DEFAULT NULL,
      `expires` datetime DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `router_id` (`router_id`),
      KEY `package_id` (`package_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    $db->exec($sql);
}
