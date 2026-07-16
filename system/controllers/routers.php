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

require_once $DEVICE_PATH . DIRECTORY_SEPARATOR . "MikrotikHotspot.php";

if (!in_array($admin['user_type'], ['SuperAdmin', 'Admin'])) {
    _alert(Lang::T('You do not have permission to access this page'), 'danger', "dashboard");
}

$leafletpickerHeader = <<<EOT
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
EOT;

/**
 * Cache helper functions
 */
function getCachedRouter($id) {
    try {
        $cacheKey = "router_" . $id;
        // Check if cache class exists and is available
        if (class_exists('Cache')) {
            $cached = Cache::get($cacheKey);
            if ($cached) {
                return $cached;
            }
        }

        $router = ORM::for_table('tbl_routers')->find_one($id);

        // Cache the result if caching is available
        if (class_exists('Cache') && $router) {
            Cache::set($cacheKey, $router, 3600); // 1 hour cache
        }

        return $router;
    } catch (Exception $e) {
        error_log("Cache retrieval error for router {$id}: " . $e->getMessage());
        // Fallback to direct database query
        return ORM::for_table('tbl_routers')->find_one($id);
    }
}

function invalidateRouterCache($id, $name = null) {
    try {
        if (class_exists('Cache')) {
            Cache::forget("router_" . $id);
            if ($name) {
                Cache::forget("router_name_" . $name);
            }
            // Clear router list cache
            Cache::tags(['routers'])->flush();
        }
    } catch (Exception $e) {
        error_log("Cache invalidation error for router {$id}: " . $e->getMessage());
    }
}

function testMikrotikConnection($ip_address, $username, $password) {
    try {
        $mikrotik = new MikrotikHotspot();
        return $mikrotik->getClient($ip_address, $username, $password);
    } catch (Exception $e) {
        error_log("Mikrotik connection test failed for {$ip_address}: " . $e->getMessage());
        throw new Exception("Connection test failed: " . $e->getMessage());
    }
}

switch ($action) {
    case 'add':
        try {
            run_hook('view_add_routers'); #HOOK
            $ui->display('admin/routers/add.tpl');
        } catch (Exception $e) {
            error_log("Error in add router view: " . $e->getMessage());
            r2(getUrl('routers/list'), 'e', Lang::T('Error loading add router page'));
        }
        break;

    case 'edit':
        try {
            $id = $routes['2'];
            $d = getCachedRouter($id);

            if (!$d) {
                $name = _get('name');
                if ($name) {
                    $d = ORM::for_table('tbl_routers')->where_equal('name', $name)->find_one();
                }
            }

            $ui->assign('xheader', $leafletpickerHeader);

            if ($d) {
                $ui->assign('d', $d);
                run_hook('view_router_edit'); #HOOK
                $ui->display('admin/routers/edit.tpl');
            } else {
                r2(getUrl('routers/list'), 'e', Lang::T('Account Not Found'));
            }
        } catch (Exception $e) {
            error_log("Error in edit router: " . $e->getMessage());
            r2(getUrl('routers/list'), 'e', Lang::T('Error loading router details'));
        }
        break;

    case 'delete':
        try {
            $id = $routes['2'];
            run_hook('router_delete'); #HOOK

            $d = getCachedRouter($id);
            if ($d) {
                $routerName = $d->name;

                $routerId = $d->id;

                $db = ORM::get_db();

                try {
                    $db->beginTransaction();

                    ORM::for_table('tbl_plans')
                        ->where('routers', $routerName)
                        ->delete_many();

                    ORM::for_table('tbl_transactions')
                        ->where('routers', $routerName)
                        ->delete_many();

                    ORM::for_table('tbl_user_recharges')
                        ->where('routers', $routerName)
                        ->delete_many();

                    ORM::for_table('tbl_voucher')
                        ->where('routers', $routerName)
                        ->delete_many();

                    ORM::for_table('tbl_customers')
                        ->where('router_id', $routerId)
                        ->delete_many();

                    ORM::for_table('tbl_pool')
                        ->where('routers', $routerName)
                        ->delete_many();

                    $d->delete();

                    $db->commit();
                } catch (Exception $e) {
                    $db->rollBack();
                    throw $e;
                }

                // Invalidate cache after successful deletion
                invalidateRouterCache($id, $routerName);

                r2(getUrl('routers/list'), 's', Lang::T('Data Deleted Successfully'));
            } else {
                r2(getUrl('routers/list'), 'e', Lang::T('Router not found'));
            }
        } catch (Exception $e) {
            error_log("Error deleting router {$id}: " . $e->getMessage());
            r2(getUrl('routers/list'), 'e', Lang::T('Error deleting router'));
        }
        break;

    case 'add-post':
        try {
            $name = _post('name');
            $ip_address = _post('ip_address');
            $username = _post('username');
            $password = _post('password');
            $description = _post('description');
            $enabled = _post('enabled');

            $msg = '';

            // Validation
            if (Validator::Length($name, 30, 1) == false) {
                $msg .= 'Name should be between 1 to 30 characters' . '<br>';
            }

            if ($enabled || _post("testIt")) {
                if ($ip_address == '' || $username == '') {
                    $msg .= Lang::T('All field is required') . '<br>';
                }

                // Check for duplicate IP with error handling
                try {
                    $d = ORM::for_table('tbl_routers')->where('ip_address', $ip_address)->find_one();
                    if ($d) {
                        $msg .= Lang::T('IP Router Already Exist') . '<br>';
                    }
                } catch (Exception $e) {
                    error_log("Database error checking duplicate IP: " . $e->getMessage());
                    $msg .= 'Database error occurred during validation' . '<br>';
                }
            }

            if (strtolower($name) == 'radius') {
                $msg .= '<b>Radius</b> name is reserved<br>';
            }

            if ($msg == '') {
                run_hook('add_router'); #HOOK

                // Test connection if requested
                if (_post("testIt")) {
                    try {
                        testMikrotikConnection($ip_address, $username, $password);
                    } catch (Exception $e) {
                        r2(getUrl('routers/add'), 'e', "Connection test failed: " . $e->getMessage());
                        break;
                    }
                }

                // Create router record with transaction
                try {
                    $d = ORM::for_table('tbl_routers')->create();
                    $d->name = $name;
                    $d->ip_address = $ip_address;
                    $d->username = $username;
                    $d->password = $password;
                    $d->description = $description;
                    $d->enabled = $enabled;
                    $d->save();

                    // Invalidate router list cache
                    invalidateRouterCache(null, $name);

                    r2(getUrl('routers/list'), 's', Lang::T('Data Created Successfully'));
                } catch (Exception $e) {
                    error_log("Error creating router: " . $e->getMessage());
                    r2(getUrl('routers/add'), 'e', 'Database error: Failed to create router');
                }
            } else {
                r2(getUrl('routers/add'), 'e', $msg);
            }
        } catch (Exception $e) {
            error_log("Unexpected error in add-post: " . $e->getMessage());
            r2(getUrl('routers/add'), 'e', Lang::T('An unexpected error occurred'));
        }
        break;

    case 'edit-post':
        try {
            $name = _post('name');
            $ip_address = _post('ip_address');
            $username = _post('username');
            $password = _post('password');
            $description = _post('description');
            $coordinates = _post('coordinates');
            $coverage = _post('coverage');
            $enabled = $_POST['enabled'];
            $id = _post('id');

            $msg = '';

            // Validation
            if (Validator::Length($name, 30, 4) == false) {
                $msg .= 'Name should be between 5 to 30 characters' . '<br>';
            }

            if ($enabled || _post("testIt")) {
                if ($ip_address == '' || $username == '') {
                    $msg .= Lang::T('All field is required') . '<br>';
                }
            }

            // Get router record with error handling
            try {
                $d = getCachedRouter($id);
                if (!$d) {
                    $msg .= Lang::T('Data Not Found') . '<br>';
                }
            } catch (Exception $e) {
                error_log("Error fetching router for edit: " . $e->getMessage());
                $msg .= 'Database error occurred' . '<br>';
            }

            if ($d) {
                // Check for duplicate name
                if ($d['name'] != $name) {
                    try {
                        $c = ORM::for_table('tbl_routers')->where('name', $name)->where_not_equal('id', $id)->find_one();
                        if ($c) {
                            $msg .= 'Name Already Exists<br>';
                        }
                    } catch (Exception $e) {
                        error_log("Error checking duplicate name: " . $e->getMessage());
                        $msg .= 'Database error during name validation' . '<br>';
                    }
                }

                $oldname = $d['name'];

                // Check for duplicate IP
                if ($enabled || _post("testIt")) {
                    if ($d['ip_address'] != $ip_address) {
                        try {
                            $c = ORM::for_table('tbl_routers')->where('ip_address', $ip_address)->where_not_equal('id', $id)->find_one();
                            if ($c) {
                                $msg .= 'IP Already Exists<br>';
                            }
                        } catch (Exception $e) {
                            error_log("Error checking duplicate IP: " . $e->getMessage());
                            $msg .= 'Database error during IP validation' . '<br>';
                        }
                    }
                }

                if (strtolower($name) == 'radius') {
                    $msg .= '<b>Radius</b> name is reserved<br>';
                }

                if ($msg == '') {
                    run_hook('router_edit'); #HOOK

                    // Test connection if requested
                    if (_post("testIt")) {
                        try {
                            testMikrotikConnection($ip_address, $username, $password);
                        } catch (Exception $e) {
                            r2(getUrl('routers/edit/') . $id, 'e', "Connection test failed: " . $e->getMessage());
                            break;
                        }
                    }

                    // Update router with transaction handling
                    try {
                        $d->name = $name;
                        $d->ip_address = $ip_address;
                        $d->username = $username;
                        $d->password = $password;
                        $d->description = $description;
                        $d->coordinates = $coordinates;
                        $d->coverage = $coverage;
                        $d->enabled = $enabled;
                        $d->save();

                        // Update related tables if name changed
                        if ($name != $oldname) {
                            try {
                                $tables = ['tbl_plans', 'tbl_payment_gateway', 'tbl_pool', 'tbl_transactions', 'tbl_user_recharges', 'tbl_voucher'];

                                foreach ($tables as $table) {
                                    $p = ORM::for_table($table)->where('routers', $oldname)->find_result_set();
                                    $p->set('routers', $name);
                                    $p->save();
                                }
                            } catch (Exception $e) {
                                error_log("Error updating related tables after router rename: " . $e->getMessage());
                                // Continue execution as main update succeeded
                            }
                        }

                        // Invalidate cache after successful update
                        invalidateRouterCache($id, $name);
                        if ($name != $oldname) {
                            invalidateRouterCache($id, $oldname);
                        }

                        r2(getUrl('routers/list'), 's', Lang::T('Data Updated Successfully'));
                    } catch (Exception $e) {
                        error_log("Error updating router {$id}: " . $e->getMessage());
                        r2(getUrl('routers/edit/') . $id, 'e', 'Database error: Failed to update router');
                    }
                } else {
                    r2(getUrl('routers/edit/') . $id, 'e', $msg);
                }
            }
        } catch (Exception $e) {
            error_log("Unexpected error in edit-post: " . $e->getMessage());
            $id = _post('id');
            r2(getUrl('routers/edit/') . $id, 'e', Lang::T('An unexpected error occurred'));
        }
        break;

    default:
        try {
            $name = _post('name');

            // Build query with error handling
            $query = ORM::for_table('tbl_routers')->order_by_desc('id');
            if ($name != '') {
                $query->where_like('name', '%' . $name . '%');
            }

            // Get paginated results with error handling
            try {
                $d = Paginator::findMany($query, ['name' => $name]);
            } catch (Exception $e) {
                error_log("Error in pagination: " . $e->getMessage());
                // Fallback to simple query without pagination
                $d = $query->limit(50)->find_many(); // Limit to prevent memory issues
            }

            $ui->assign('d', $d);
            run_hook('view_list_routers'); #HOOK
            $ui->display('admin/routers/list.tpl');

        } catch (Exception $e) {
            error_log("Error in router list view: " . $e->getMessage());
            $ui->assign('d', []);
            $ui->assign('error_message', Lang::T('Error loading router list'));
            $ui->display('admin/routers/list.tpl');
        }
        break;
}
