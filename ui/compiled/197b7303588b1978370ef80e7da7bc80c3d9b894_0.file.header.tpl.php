<?php
/* Smarty version 4.5.3, created on 2025-09-04 06:54:59
  from '/var/www/html/example/ui/ui/admin/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b90d9340fc59_04348474',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '197b7303588b1978370ef80e7da7bc80c3d9b894' => 
    array (
      0 => '/var/www/html/example/ui/ui/admin/header.tpl',
      1 => 1756958086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68b90d9340fc59_04348474 (Smarty_Internal_Template $_smarty_tpl) {
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
        /* Sidebar */
        .main-sidebar {
            position: fixed;
            height: 100vh;
            width: 200px;
            background: #1c2a40;
            overflow: hidden;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .sidebar-menu {
            flex: 1;
            overflow-y: auto;
            margin: 0;
            padding: 0;
        }

        .sidebar-user {
            flex-shrink: 0;
            margin-top: auto;
            position: sticky;
            bottom: 0;
            background: #1c2a40;
            z-index: 10;
            position: relative;
            padding: 10px;
            margin-bottom: 30px; /* Added margin at the bottom */
        }

        /* Custom dropdown styles */
        .custom-dropdown {
            position: relative;
        }

        .custom-dropdown-menu {
            position: absolute;
            bottom: 100%;
            left: 0;
            right: 0;
            width: 220px;
            border-radius: 10px;
            padding: 0;
            overflow: hidden;
            background: #1c2a40;
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 6px 18px rgba(0,0,0,0.4);
            margin-bottom: 5px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .custom-dropdown.active .custom-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-toggle {
            cursor: pointer;
            user-select: none;
        }

        .dropdown-toggle:hover {
            background: rgba(255,255,255,0.05);
            border-radius: 5px;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            body.sidebar-open {
                overflow: hidden;
            }
            .main-sidebar {
                left: -250px;
                transition: left 0.3s ease;
                z-index: 1000;
            }
            body.sidebar-open .main-sidebar {
                left: 0;
            }
            .sidebar-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }
            body.sidebar-open .sidebar-overlay {
                display: block;
            }
            .mobile-menu-toggle {
                position: fixed;
                top: 15px;
                left: 15px;
                z-index: 1001;
                background: #1c2a40;
                border: none;
                color: white;
                padding: 10px;
                border-radius: 5px;
                cursor: pointer;
            }
        }

        /* Hide toggle on desktop */
        @media (min-width: 769px) {
            .mobile-menu-toggle {
                display: none;
            }
        }
    </style>

    <?php if ((isset($_smarty_tpl->tpl_vars['xheader']->value))) {?>
        <?php echo $_smarty_tpl->tpl_vars['xheader']->value;?>

    <?php }?>

</head>

<body class="hold-transition modern-skin-dark sidebar-mini <?php if ($_smarty_tpl->tpl_vars['_kolaps']->value) {?>sidebar-collapse<?php }?>">
    <div class="wrapper">

        <button class="mobile-menu-toggle" id="mobileMenuToggle">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Sidebar Overlay for Mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <aside class="main-sidebar">
            <section class="sidebar" style="display: flex; flex-direction: column; height: 100vh;">
                <ul class="sidebar-menu" style="flex: 1; overflow-y: auto;">
                    <!-- Dashboard -->
                    <li class="menu-header">
                        <i class="fa fa-dashboard"></i>DASHBOARD
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'dashboard') {?> <?php }?>>
                        <a href="<?php echo Text::url('dashboard');?>
">
                            <span><?php echo Lang::T('Home');?>
</span>
                        </a>
                    </li>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_DASHBOARD']->value;?>


                    <!-- Customer Section - Flattened -->
                    <li class="menu-header">
                        <i class="fa fa-users"></i> SERVICES
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'mikrotik_monitor') {?> <?php }?>>
                        <a href="<?php echo Text::url('mikrotik-monitor');?>
">
                            <span><?php echo Lang::T('Online Users');?>
</span>
                        </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'list') {
}?>>
                        <a href="<?php echo Text::url('plan/list');?>
">
                            <span><?php echo Lang::T('Active Users');?>
</span>
                        </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'customers') {?> <?php }?>>
                        <a href="<?php echo Text::url('customers');?>
">
                            <span><?php echo Lang::T('Users');?>
</span>
                        </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'recharge') {
}?>>
                        <a href="<?php echo Text::url('plan/recharge');?>
">
                            <span><?php echo Lang::T('Recharge User');?>
</span>
                        </a>
                    </li>

                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_CUSTOMERS']->value;?>


                    <!-- Services Section - Flattened -->
                    <?php if (!in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('Report'))) {?>
                        <li class="menu-header">
                            <i class="fa fa-cogs"></i> PLANS
                        </li>

                        <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'list') {?> <?php }?>>
                            <a href="<?php echo Text::url('bandwidth/list');?>
">
                                <span>Bandwidth</span>
                            </a>
                        </li>

                        <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'hotspot') {?> <?php }?>>
                            <a href="<?php echo Text::url('services/hotspot');?>
">
                                <span>Hotspot</span>
                            </a>
                        </li>

                        <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'pppoe') {?> <?php }?>>
                            <a href="<?php echo Text::url('services/pppoe');?>
">
                                <span>PPPOE</span>
                            </a>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['disable_voucher'] != 'yes') {?>
                            <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'voucher') {?> <?php }?>>
                                <a href="<?php echo Text::url('plan/voucher');?>
">
                                    <span><?php echo Lang::T('Vouchers');?>
</span>
                                </a>
                            </li>
                        <?php }?>
                        <?php echo $_smarty_tpl->tpl_vars['_MENU_SERVICES']->value;?>

                    <?php }?>

                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_SERVICES']->value;?>


                    <!-- Send Message Section - Flattened -->
                    <li class="menu-header">
                        <i class="ion ion-android-chat"></i> COMMUNICATION
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'send') {?> <?php }?>>
                        <a href="<?php echo Text::url('message/send');?>
">
                            <span><?php echo Lang::T('Single User');?>
</span>
                        </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'send_bulk') {?> <?php }?>>
                        <a href="<?php echo Text::url('message/send_bulk');?>
">
                            <span><?php echo Lang::T('Many Users');?>
</span>
                        </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'Announcement_Customer') {
}?>>
                        <a href="<?php echo Text::url('pages/Announcement_Customer');?>
">
                            <span><?php echo Lang::T('Announcement');?>
</span>
                        </a>
                    </li>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_MESSAGE']->value;?>


                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_MESSAGE']->value;?>

                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_PLANS']->value;?>


                    <!-- Reports Section - Flattened -->
                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Report'))) {?>
                        <li class="menu-header">
                            <i class="fa fa-bar-chart"></i> REPORTS
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'reports') {
}?>>
                            <a href="<?php echo Text::url('reports');?>
">
                                <span><?php echo Lang::T('Purchase Report');?>
</span>
                            </a>
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'activation') {?> <?php }?>>
                            <a href="<?php echo Text::url('reports/activation');?>
">
                                <span><?php echo Lang::T('Activation Report');?>
</span>
                            </a>
                        </li>
                        <?php echo $_smarty_tpl->tpl_vars['_MENU_REPORTS']->value;?>

                    <?php }?>

                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_REPORTS']->value;?>

                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_MESSAGE']->value;?>


                    <!-- Network Section - Flattened -->
                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <li class="menu-header">
                            <i class="fa fa-sitemap"></i> NETWORK
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[0] == 'routers' && $_smarty_tpl->tpl_vars['_routes']->value[1] == '') {?> <?php }?>>
                            <a href="<?php echo Text::url('routers');?>
">
                                <span>Routers</span>
                            </a>
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[0] == 'pool' && $_smarty_tpl->tpl_vars['_routes']->value[1] == 'list') {?> <?php }?>>
                            <a href="<?php echo Text::url('pool/list');?>
">
                                <span>PPPoE Pool</span>
                            </a>
                        </li>
                        <?php echo $_smarty_tpl->tpl_vars['_MENU_NETWORK']->value;?>

                    <?php }?>

                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_NETWORKS']->value;?>

                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_PAGES']->value;?>

                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_LOGS']->value;?>


                    <!-- Settings Section - Flattened -->
                    <li class="menu-header">
                        <i class="fa fa-gear"></i> SETTINGS
                    </li>
                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['_routes']->value[1] == 'app') {?> <?php }?>>
                            <a href="<?php echo Text::url('settings/app');?>
">
                                <span><?php echo Lang::T('General Settings');?>
</span>
                            </a>
                        </li>
                    <?php }?>
                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'paymentgateway') {?> <?php }?>>
                            <a href="<?php echo Text::url('paymentgateway');?>
">
                                <span><?php echo Lang::T('Payment Gateway');?>
</span>
                            </a>
                        </li>
                        <?php echo $_smarty_tpl->tpl_vars['_MENU_SETTINGS']->value;?>

                    <?php }?>
                </ul>

                <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Agent'))) {?>
                    <div class="sidebar-user custom-dropdown" style="margin-top: auto; padding: 10px; border-top: 1px solid rgba(255,255,255,0.08);">
                        <div class="dropdown-toggle" id="userDropdownToggle" style="display: flex; align-items: center; gap: 8px; text-decoration: none; color: #fff; cursor: pointer;">
                            <div class="user-initials" style="background: #4f8ef7; color: #fff; font-weight: bold; border-radius: 50%; width: 34px; height: 34px; display: flex; align-items: center; justify-content: center; font-size: 14px;">
                                <?php echo substr($_smarty_tpl->tpl_vars['_admin']->value['fullname'],0,1);?>

                            </div>
                            <span class="hidden-xs" style="font-size: 14px; font-weight: 500; color: #fff;"><?php echo $_smarty_tpl->tpl_vars['_admin']->value['fullname'];?>
</span>
                            <i class="ion ion-chevron-up dropdown-arrow" style="margin-left: auto; font-size: 12px; color: #bbb; transition: transform 0.3s ease;"></i>
                        </div>

                        <div class="custom-dropdown-menu">
                            <div class="user-header text-center" style="background: #24344f; padding: 15px; border-bottom: 1px solid rgba(255,255,255,0.08); text-align: center;">
                                <div class="user-initials big" style="width: 70px; height: 70px; font-size: 28px; margin: 0 auto 10px auto; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #4f8ef7; color: #fff; font-weight: bold;">
                                    <?php echo substr($_smarty_tpl->tpl_vars['_admin']->value['fullname'],0,1);?>

                                </div>
                                <p style="margin: 0; font-weight: 600; color: #fff;"><?php echo $_smarty_tpl->tpl_vars['_admin']->value['fullname'];?>
</p>
                                <small style="color: #aaa;"><?php echo Lang::T($_smarty_tpl->tpl_vars['_admin']->value['user_type']);?>
</small>
                            </div>

                            <div class="user-body" style="padding: 10px;">
                                <div class="row" style="display: flex; justify-content: space-between; text-align: center;">
                                    <div style="flex: 1; border-right: 1px solid rgba(255,255,255,0.08);">
                                        <a href="<?php echo Text::url('settings/change-password');?>
" style="display: block; padding: 6px; color: #ccc; text-decoration: none; font-size: 13px;">
                                            <i class="ion ion-settings"></i><br>
                                            <span style="font-size: 12px;"><?php echo Lang::T('Password');?>
</span>
                                        </a>
                                    </div>
                                    <div style="flex: 1;">
                                        <a href="<?php echo Text::url('settings/users-view/',$_smarty_tpl->tpl_vars['_admin']->value['id']);?>
" style="display: block; padding: 6px; color: #ccc; text-decoration: none; font-size: 13px;">
                                            <i class="ion ion-person"></i><br>
                                            <span style="font-size: 12px;"><?php echo Lang::T('Account');?>
</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="user-footer" style="background: #24344f; padding: 10px; text-align: right; border-top: 1px solid rgba(255,255,255,0.08);">
                                <a href="<?php echo Text::url('logout');?>
" class="btn btn-danger btn-sm" style="background: #e53935; color: #fff; padding: 6px 14px; border-radius: 20px; text-decoration: none; font-size: 13px; display: inline-flex; align-items: center; gap: 5px;">
                                    <i class="ion ion-power"></i> <?php echo Lang::T('Logout');?>

                                </a>
                            </div>
                        </div>
                    </div>
                <?php }?>
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
                <?php }?>

    <?php echo '<script'; ?>
>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const body = document.body;

            // Mobile sidebar functions
            function toggleMobileSidebar() {
                body.classList.toggle('sidebar-open');
            }

            function closeMobileSidebar() {
                body.classList.remove('sidebar-open');
            }

            if (mobileMenuToggle) {
                mobileMenuToggle.addEventListener('click', toggleMobileSidebar);
            }
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', closeMobileSidebar);
            }

            // Close sidebar when clicking any menu item (on mobile only)
            document.querySelectorAll('.sidebar-menu a').forEach(item => {
                item.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        closeMobileSidebar();
                    }
                });
            });

            // Reset sidebar state on resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    body.classList.remove('sidebar-open');
                }
            });

            // Custom dropdown functionality
            const dropdown = document.querySelector('.custom-dropdown');
            const dropdownToggle = document.getElementById('userDropdownToggle');
            const dropdownArrow = document.querySelector('.dropdown-arrow');

            if (dropdownToggle && dropdown) {
                dropdownToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    dropdown.classList.toggle('active');

                    // Rotate arrow
                    if (dropdown.classList.contains('active')) {
                        dropdownArrow.style.transform = 'rotate(180deg)';
                    } else {
                        dropdownArrow.style.transform = 'rotate(0deg)';
                    }
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target)) {
                        dropdown.classList.remove('active');
                        dropdownArrow.style.transform = 'rotate(0deg)';
                    }
                });

                // Prevent dropdown from closing when clicking inside the menu
                const dropdownMenu = dropdown.querySelector('.custom-dropdown-menu');
                if (dropdownMenu) {
                    dropdownMenu.addEventListener('click', function(e) {
                        e.stopPropagation();
                    });
                }
            }
        });
    <?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
