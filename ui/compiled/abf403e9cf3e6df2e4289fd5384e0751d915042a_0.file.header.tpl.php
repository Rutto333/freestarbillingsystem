<?php
/* Smarty version 4.5.3, created on 2025-07-26 22:04:54
  from '/var/www/html/alpha/ui/ui/admin/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_688526d6236460_51695229',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abf403e9cf3e6df2e4289fd5384e0751d915042a' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/header.tpl',
      1 => 1753556683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_688526d6236460_51695229 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</title>
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/images/logo.png" type="image/x-icon" />

    <?php echo '<script'; ?>
>
        var appUrl = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
';
    <?php echo '</script'; ?>
>

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/modern-AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/select2.min.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/sweetalert2.min.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/plugins/pace.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/summernote/summernote.min.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/phpnuxbill.css?2025.2.4" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/7.css" />

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/scripts/sweetalert2.all.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"><?php echo '</script'; ?>
>
    <style>

    </style>
    <?php if ((isset($_smarty_tpl->tpl_vars['xheader']->value))) {?>
        <?php echo $_smarty_tpl->tpl_vars['xheader']->value;?>

    <?php }?>

</head>

<body class="hold-transition modern-skin-dark sidebar-mini <?php if ($_smarty_tpl->tpl_vars['_kolaps']->value) {?>sidebar-collapse<?php }?>">
    <div class="wrapper">
        <header class="main-header">
            <a href="<?php echo Text::url('dashboard');?>
" class="logo">
                <span class="logo-mini"></span>
                <span class="logo-lg"><?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" onclick="return setKolaps()">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <div class="wrap">
                            <div class="">
                                <button id="openSearch" class="search"><i class="fa fa-search x2"></i></button>
                            </div>
                        </div>
                        <div id="searchOverlay" class="search-overlay">
                            <div class="search-container">
                                <input type="text" id="searchTerm" class="searchTerm"
                                    placeholder="<?php echo Lang::T('Search Users');?>
" autocomplete="off">
                                <div id="searchResults" class="search-results">
                                    <!-- Search results will be displayed here -->
                                </div>
                                <button type="button" id="closeSearch" class="cancelButton"><?php echo Lang::T('Cancel');?>
</button>
                            </div>
                        </div>
                        <li>
                            <a class="toggle-container" href="#">
                                <i class="toggle-icon" id="toggleIcon">🌜</i>
                            </a>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['_admin']->value['photo'];?>
.thumb.jpg"
                                    onerror="this.src='<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;?>
/admin.default.png'" class="user-image"
                                    alt="Avatar">
                                <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['_admin']->value['fullname'];?>
</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['_admin']->value['photo'];?>
.thumb.jpg"
                                        onerror="this.src='<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;?>
/admin.default.png'" class="img-circle"
                                        alt="Avatar">
                                    <p>
                                        <?php echo $_smarty_tpl->tpl_vars['_admin']->value['fullname'];?>

                                        <small><?php echo Lang::T($_smarty_tpl->tpl_vars['_admin']->value['user_type']);?>
</small>
                                    </p>
                                </li>
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-7 text-center text-sm">
                                            <a href="<?php echo Text::url('settings/change-password');?>
"><i
                                                    class="ion ion-settings"></i>
                                                <?php echo Lang::T('Change Password');?>
</a>
                                        </div>
                                        <div class="col-xs-5 text-center text-sm">
                                            <a href="<?php echo Text::url('settings/users-view/',$_smarty_tpl->tpl_vars['_admin']->value['id']);?>
">
                                                <i class="ion ion-person"></i> <?php echo Lang::T('My Account');?>
</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?php echo Text::url('logout');?>
" class="btn btn-default btn-flat"><i
                                                class="ion ion-power"></i> <?php echo Lang::T('Logout');?>
</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'dashboard') {?>class="active" <?php }?>>
                        <a href="<?php echo Text::url('dashboard');?>
">
                            <i class="ion ion-monitor"></i>
                            <span><?php echo Lang::T('Dashboard');?>
</span>
                        </a>
                    </li>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_DASHBOARD']->value;?>

                    <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'customers') {?>class="active" <?php }?>>
                        <a href="<?php echo Text::url('customers');?>
">
                            <i class="fa fa-user"></i>
                            <span><?php echo Lang::T('Customer');?>
</span>
                        </a>
                    </li>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_CUSTOMERS']->value;?>

                    <?php if (!in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('Report'))) {?>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['_routes']->value[0] == 'plan' || $_smarty_tpl->tpl_vars['_routes']->value[0] == 'coupons') {?>active<?php }?> treeview">
                            <a href="#">
                                <i class="fa fa-ticket"></i> <span><?php echo Lang::T('Services');?>
</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'list') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('plan/list');?>
"><?php echo Lang::T('Active Customers');?>
</a></li>
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_coupons'] == 'yes') {?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[0] == 'coupons') {?>class="active" <?php }?>><a
                                            href="<?php echo Text::url('coupons');?>
"><?php echo Lang::T('Coupons');?>
</a></li>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['disable_voucher'] != 'yes') {?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'voucher') {?>class="active" <?php }?>><a
                                            href="<?php echo Text::url('plan/voucher');?>
"><?php echo Lang::T('Vouchers');?>
</a></li>
                                <?php }?>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'recharge') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('plan/recharge');?>
"><?php echo Lang::T('Recharge Customer');?>
</a></li>
                                <?php echo $_smarty_tpl->tpl_vars['_MENU_SERVICES']->value;?>

                            </ul>
                        </li>
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_SERVICES']->value;?>

                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'services') {?>active<?php }?> treeview">
                            <a href="#">
                                <i class="ion ion-cube"></i> <span><?php echo Lang::T('Internet Plan');?>
</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'hotspot') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('services/hotspot');?>
">Hotspot</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'pppoe') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('services/pppoe');?>
">PPPOE</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'vpn') {?>class="active" <?php }?>><a href="<?php echo Text::url('services/vpn');?>
">VPN</a>
                                </li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'list') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('bandwidth/list');?>
">Bandwidth</a></li>
                                <?php echo $_smarty_tpl->tpl_vars['_MENU_PLANS']->value;?>

                            </ul>
                        </li>
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_PLANS']->value;?>

                    <li class="<?php if (in_array($_smarty_tpl->tpl_vars['_routes']->value[0],array('maps'))) {?>active<?php }?> treeview">
                        <a href="#">
                            <i class="fa fa-map-marker"></i> <span><?php echo Lang::T('Maps');?>
</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'customer') {?>class="active" <?php }?>><a
                                    href="<?php echo Text::url('maps/customer');?>
"><?php echo Lang::T('Customer');?>
</a></li>
                            <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'routers') {?>class="active" <?php }?>><a
                                    href="<?php echo Text::url('maps/routers');?>
"><?php echo Lang::T('Routers');?>
</a></li>
                            <?php echo $_smarty_tpl->tpl_vars['_MENU_MAPS']->value;?>

                        </ul>
                    </li>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'reports') {?>active<?php }?> treeview">
                        <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Report'))) {?>
                            <a href="#">
                                <i class="ion ion-clipboard"></i> <span><?php echo Lang::T('Reports');?>
</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                        <?php }?>
                        <ul class="treeview-menu">
                            <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'reports') {?>class="active" <?php }?>><a
                                    href="<?php echo Text::url('reports');?>
"><?php echo Lang::T('Daily Reports');?>
</a></li>
                            <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'activation') {?>class="active" <?php }?>><a
                                    href="<?php echo Text::url('reports/activation');?>
"><?php echo Lang::T('Activation History');?>
</a></li>
                            <?php echo $_smarty_tpl->tpl_vars['_MENU_REPORTS']->value;?>

                        </ul>
                    </li>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_REPORTS']->value;?>

                    <li class="<?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'message') {?>active<?php }?> treeview">
                        <a href="#">
                            <i class="ion ion-android-chat"></i> <span><?php echo Lang::T('Send Message');?>
</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'send') {?>class="active" <?php }?>><a
                                    href="<?php echo Text::url('message/send');?>
"><?php echo Lang::T('Single Customer');?>
</a></li>
                            <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'send_bulk') {?>class="active" <?php }?>><a
                                    href="<?php echo Text::url('message/send_bulk');?>
"><?php echo Lang::T('Bulk Customers');?>
</a></li>
                            <?php echo $_smarty_tpl->tpl_vars['_MENU_MESSAGE']->value;?>

                        </ul>
                    </li>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_MESSAGE']->value;?>

                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'network') {?>active<?php }?> treeview">
                            <a href="#">
                                <i class="ion ion-network"></i> <span><?php echo Lang::T('Network');?>
</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[0] == 'routers' && $_smarty_tpl->tpl_vars['_routes']->value[1] == '') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('routers');?>
">Routers</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[0] == 'pool' && $_smarty_tpl->tpl_vars['_routes']->value[1] == 'list') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('pool/list');?>
">IP Pool</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[0] == 'pool' && $_smarty_tpl->tpl_vars['_routes']->value[1] == 'port') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('pool/port');?>
">Port Pool</a></li>
                                <?php echo $_smarty_tpl->tpl_vars['_MENU_NETWORK']->value;?>

                            </ul>
                        </li>
                        <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_NETWORKS']->value;?>

                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_enable']) {?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'radius') {?>active<?php }?> treeview">
                                <a href="#">
                                    <i class="fa fa-database"></i> <span><?php echo Lang::T('Radius');?>
</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[0] == 'radius' && $_smarty_tpl->tpl_vars['_routes']->value[1] == 'nas-list') {?>class="active" <?php }?>><a
                                            href="<?php echo Text::url('radius/nas-list');?>
"><?php echo Lang::T('Radius NAS');?>
</a></li>
                                    <?php echo $_smarty_tpl->tpl_vars['_MENU_RADIUS']->value;?>

                                </ul>
                            </li>
                        <?php }?>
                        <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_RADIUS']->value;?>

                        <li class="<?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'pages') {?>active<?php }?> treeview">
                            <a href="#">
                                <i class="ion ion-document"></i> <span><?php echo Lang::T("Announcement");?>
</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'Announcement_Customer') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('pages/Announcement_Customer');?>
"><?php echo Lang::T('Customer Announcement');?>
</a>
                                </li>
                                <?php echo $_smarty_tpl->tpl_vars['_MENU_PAGES']->value;?>

                            </ul>
                        </li>
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_PAGES']->value;?>

                    <li
                        class="<?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'settings' || $_smarty_tpl->tpl_vars['_system_menu']->value == 'paymentgateway') {?>active<?php }?> treeview">
                        <a href="#">
                            <i class="ion ion-gear-a"></i> <span><?php echo Lang::T('Settings');?>
</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'app') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('settings/app');?>
"><?php echo Lang::T('General Settings');?>
</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'localisation') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('settings/localisation');?>
"><?php echo Lang::T('Localisation');?>
</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[0] == 'customfield') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('customfield');?>
"><?php echo Lang::T('Custom Fields');?>
</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'miscellaneous') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('settings/miscellaneous');?>
"><?php echo Lang::T('Miscellaneous');?>
</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'maintenance') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('settings/maintenance');?>
"><?php echo Lang::T('Maintenance Mode');?>
</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[0] == 'widgets') {?>class="active" <?php }?>><a
                                            href="<?php echo Text::url('widgets');?>
"><?php echo Lang::T('Widgets');?>
</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'notifications') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('settings/notifications');?>
"><?php echo Lang::T('User Notification');?>
</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'devices') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('settings/devices');?>
"><?php echo Lang::T('Devices');?>
</a></li>
                            <?php }?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Agent'))) {?>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'users') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('settings/users');?>
"><?php echo Lang::T('Administrator Users');?>
</a></li>
                            <?php }?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'dbstatus') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('settings/dbstatus');?>
"><?php echo Lang::T('Backup/Restore');?>
</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'paymentgateway') {?>class="active" <?php }?>>
                                    <a href="<?php echo Text::url('paymentgateway');?>
">
                                        <span class="text"><?php echo Lang::T('Payment Gateway');?>
</span>
                                    </a>
                                </li>
                                <?php echo $_smarty_tpl->tpl_vars['_MENU_SETTINGS']->value;?>

                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[0] == 'pluginmanager') {?>class="active" <?php }?>>
                                    <a href="<?php echo Text::url('pluginmanager');?>
"><i class="glyphicon glyphicon-tasks"></i>
                                        <?php echo Lang::T('Plugin Manager');?>
</a>
                                </li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_SETTINGS']->value;?>

                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'logs') {?>active<?php }?> treeview">
                            <a href="#">
                                <i class="ion ion-clock"></i> <span><?php echo Lang::T('Logs');?>
</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'list') {?>class="active" <?php }?>><a
                                        href="<?php echo Text::url('logs/phpnuxbill');?>
">System</a></li>
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_enable']) {?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'radius') {?>class="active" <?php }?>><a
                                            href="<?php echo Text::url('logs/radius');?>
">Radius</a>
                                    </li>
                                <?php }?>
                                <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'message') {?>class="active" <?php }?>><a
                                    href="<?php echo Text::url('logs/message');?>
">Message</a></li>
                                <?php echo $_smarty_tpl->tpl_vars['_MENU_LOGS']->value;?>

                            </ul>
                        </li>
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_LOGS']->value;?>

                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'docs') {?>class="active" <?php }?>>
                            <a href="<?php if ($_smarty_tpl->tpl_vars['_c']->value['docs_clicked'] != 'yes') {
echo Text::url('settings/docs');
} else {
echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/docs<?php }?>">
                                <i class="ion ion-ios-bookmarks"></i>
                                <span class="text"><?php echo Lang::T('Documentation');?>
</span>
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['docs_clicked'] != 'yes') {?>
                                    <span class="pull-right-container"><small
                                            class="label pull-right bg-green">New</small></span>
                                <?php }?>
                            </a>
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'community') {?>class="active" <?php }?>>
                            <a href="<?php echo Text::url('community');?>
">
                                <i class="ion ion-chatboxes"></i>
                                <span class="text">Community</span>
                            </a>
                        </li>
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_COMMUNITY']->value;?>

                </ul>
            </section>
        </aside>

        <?php if ($_smarty_tpl->tpl_vars['_c']->value['maintenance_mode'] == 1) {?>
            <div class="notification-top-bar">
                <p><?php echo Lang::T('The website is currently in maintenance mode, this means that some or all functionality may be
                unavailable to regular users during this time.');?>
<small> &nbsp;&nbsp;<a
                            href="<?php echo Text::url('settings/maintenance');?>
"><?php echo Lang::T('Turn Off');?>
</a></small></p>
            </div>
        <?php }?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <?php echo $_smarty_tpl->tpl_vars['_title']->value;?>

                </h1>
            </section>

            <section class="content">
                <?php if ((isset($_smarty_tpl->tpl_vars['notify']->value))) {?>
                    <?php echo '<script'; ?>
>
                        // Display SweetAlert toast notification
                        Swal.fire({
                            icon: '<?php if ($_smarty_tpl->tpl_vars['notify_t']->value == "s") {?>success<?php } else { ?>error<?php }?>',
                            title: '<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>
',
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                    <?php echo '</script'; ?>
>
<?php }
}
}
