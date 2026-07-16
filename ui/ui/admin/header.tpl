<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{$_title} - {$_c['CompanyName']}</title>
    <link rel="shortcut icon" href="{$app_url}/ui/ui/images/logo.png" type="image/x-icon" />

    <script>
        var appUrl = '{$app_url}';
    </script>

    <link rel="stylesheet" href="{$app_url}/ui/ui/styles/bootstrap.min.css">
    <link rel="stylesheet" href="{$app_url}/ui/ui/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="{$app_url}/ui/ui/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{$app_url}/ui/ui/styles/modern-AdminLTE.min.css">
    <link rel="stylesheet" href="{$app_url}/ui/ui/styles/select2.min.css" />
    <link rel="stylesheet" href="{$app_url}/ui/ui/styles/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="{$app_url}/ui/ui/styles/sweetalert2.min.css" />
    <link rel="stylesheet" href="{$app_url}/ui/ui/styles/plugins/pace.css" />
    <link rel="stylesheet" href="{$app_url}/ui/ui/summernote/summernote.min.css" />
    <link rel="stylesheet" href="{$app_url}/ui/ui/styles/phpnuxbill.css?2025.2.4" />
    <link rel="stylesheet" href="{$app_url}/ui/ui/styles/7.css" />

    <script src="{$app_url}/ui/ui/scripts/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>

<style>
        .main-header {
            background: transparent;
            border: none;
            position: relative;
        }

        .navbar {
            background: transparent;
            box-shadow: none;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .navbar-spacer {
            flex: 1;
        }

        /* Enhanced News & Date Ticker Styles - Blue Theme */
        .news-ticker-container {
            position: absolute;
            left: 80px;
            top: 50%;
            transform: translateY(-50%);
            width: calc(100% - 120px);
            height: 50px;
            overflow: hidden;
            background: linear-gradient(135deg, #1e40af, #2563eb);
            border-radius: 25px;
            border: 2px solid #1e3a8a;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(30, 64, 175, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .news-ticker {
            display: flex;
            align-items: center;
            height: 100%;
            white-space: nowrap;
            animation: scroll-news 45s linear infinite;
            color: #FFFFFF;
            font-weight: 600;
            font-size: 15px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
            padding: 0 25px;
        }

        .news-content {
            display: inline-flex;
            align-items: center;
            gap: 40px;
            padding-right: 100px;
        }

        .news-item {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
        }

        .news-icon {
            font-size: 18px;
            color: #60a5fa;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .news-label {
            font-size: 12px;
            color: #dbeafe;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .news-value {
            font-weight: 800;
            color: #FFFFFF;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }

        .breaking-news {
            background: linear-gradient(90deg, #dc2626, #f59e0b);
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 800;
            color: #FFFFFF;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            animation: pulse-glow 2s ease-in-out infinite alternate;
        }

        @keyframes scroll-news {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        @keyframes pulse-glow {
            0% {
                box-shadow: 0 0 5px rgba(220, 38, 38, 0.7);
            }
            100% {
                box-shadow: 0 0 20px rgba(220, 38, 38, 0.9), 0 0 30px rgba(245, 158, 11, 0.7);
            }
        }

        .news-ticker-container:hover .news-ticker {
            animation-play-state: paused;
        }

        /* Base sidebar styles - Corporate Blue */
        .main-sidebar {
            position: fixed;
            height: 100vh;
            width: 230px;
            background: #1e40af;
            overflow: hidden;
            transition: left 0.3s ease;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Fixed sidebar menu with proper scrolling */
        .sidebar-menu {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            margin: 0;
            padding: 0 0 20px 0; /* Add bottom padding to prevent cutoff */
            scrollbar-width: thin;
            scrollbar-color: rgba(96, 165, 250, 0.3) transparent;
        }

        /* Custom scrollbar for webkit browsers */
        .sidebar-menu::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-menu::-webkit-scrollbar-track {
            background: rgba(96, 165, 250, 0.1);
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(96, 165, 250, 0.3);
            border-radius: 3px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb:hover {
            background: rgba(96, 165, 250, 0.5);
        }

        /* Fixed sidebar user section */
        .sidebar-user {
            flex-shrink: 0;
            position: sticky;
            bottom: 0;
            margin-bottom: 40px;
            background: #1e3a8a;
            z-index: 10;
            padding: 15px 10px;
            margin: 0;
            border-top: 2px solid rgba(96, 165, 250, 0.15);
            box-shadow: 0 -2px 10px rgba(30, 58, 138, 0.3);
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
            background: #1e40af;
            border: 1px solid rgba(96, 165, 250, 0.1);
            box-shadow: 0 6px 18px rgba(30, 58, 138, 0.4);
            margin-bottom: 8px;
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
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #FFFFFF;
            padding: 10px 8px;
            border-radius: 8px;
            transition: background 0.2s ease;
        }

        .dropdown-toggle:hover {
            background: rgba(96, 165, 250, 0.15);
            color: #FFFFFF;
            text-decoration: none;
        }

        .user-initials {
            background: #3b82f6;
            color: #FFFFFF;
            font-weight: bold;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .user-initials.big {
            width: 70px;
            height: 70px;
            font-size: 28px;
        }

        .username {
            font-size: 14px;
            font-weight: 500;
            color: #FFFFFF;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100px;
        }

        .dropdown-arrow {
            margin-left: auto;
            font-size: 12px;
            color: #93c5fd;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        /* User dropdown content styles */
        .user-header {
            background: #2563eb;
            padding: 15px;
            border-bottom: 1px solid rgba(96, 165, 250, 0.08);
            text-align: center;
        }

        .user-header p {
            margin: 0;
            font-weight: 600;
            color: #FFFFFF;
        }

        .user-header small {
            color: #93c5fd;
        }

        .user-body {
            padding: 10px;
        }

        .user-footer {
            background: #2563eb;
            padding: 10px;
            text-align: right;
            border-top: 1px solid rgba(96, 165, 250, 0.08);
        }

        .btn-danger {
            background: #dc2626;
            color: #FFFFFF;
            padding: 6px 14px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .btn-danger:hover {
            background: #b91c1c;
            color: #FFFFFF;
            text-decoration: none;
        }

        /* Desktop styles */
        @media (min-width: 769px) {
            .mobile-menu-toggle {
                display: none;
            }

            .sidebar-overlay {
                display: none;
            }

            .main-sidebar {
                left: 0;
            }

            /* Ensure proper spacing on desktop */
            .sidebar-menu {
                padding: 0;
            }

            .sidebar-user {
                margin: 0;
            }
        }

        /* Tablet and mobile responsiveness */
        @media (max-width: 768px) {
            .news-ticker-container {
                left: 60px;
                width: calc(100% - 80px);
                height: 40px;
            }

            .news-ticker {
                font-size: 13px;
            }

            .news-content {
                gap: 25px;
            }

            .news-icon {
                font-size: 16px;
            }

            body {
                padding-left: 0;
            }

            body.sidebar-open {
                overflow: hidden;
            }

            .main-sidebar {
                left: -200px;
                z-index: 1000;
                box-shadow: 2px 0 10px rgba(30, 58, 138, 0.3);
            }

            body.sidebar-open .main-sidebar {
                left: 0;
            }

            .sidebar-overlay {
                position: fixed;
                inset: 0;
                background: rgba(30, 64, 175, 0.5);
                z-index: 999;
                display: none;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            body.sidebar-open .sidebar-overlay {
                display: block;
                opacity: 1;
            }

            .mobile-menu-toggle {
                position: fixed;
                top: 15px;
                left: 15px;
                z-index: 1001;
                background: #1e40af;
                border: none;
                color: white;
                padding: 10px;
                border-radius: 5px;
                cursor: pointer;
                box-shadow: 0 2px 10px rgba(30, 58, 138, 0.2);
                transition: background 0.2s ease;
            }

            .mobile-menu-toggle:hover {
                background: #2563eb;
            }

            /* Mobile sidebar adjustments */
            .sidebar-menu {
                padding-bottom: 30px; /* Extra padding for mobile */
            }

            .sidebar-user {
                padding: 15px 10px;
                border-top: 2px solid rgba(96, 165, 250, 0.2);
            }

            .custom-dropdown-menu {
                width: 200px;
                font-size: 13px;
                margin-bottom: 10px;
            }

            .dropdown-toggle {
                padding: 12px 8px;
            }

            .username {
                font-size: 13px;
                max-width: 80px;
            }
        }

        /* Small mobile phones */
        @media (max-width: 480px) {
            .news-ticker-container {
                left: 55px;
                width: calc(100% - 70px);
                height: 35px;
            }

            .news-ticker {
                font-size: 11px;
            }

            .news-content {
                gap: 20px;
            }

            .news-label {
                font-size: 10px;
            }

            .main-sidebar {
                width: 180px;
                left: -180px;
                padding-bottom: 30px;
            }

            .sidebar-menu {
                padding-bottom: 35px; /* Even more padding for small screens */
            }

            .sidebar-user {
                padding: 12px 8px;
            }

            .dropdown-toggle {
                padding: 10px 6px;
                gap: 6px;
            }

            .user-initials {
                width: 32px;
                height: 32px;
                font-size: 14px;
            }

            .username {
                font-size: 12px;
                max-width: 70px;
            }

            .custom-dropdown-menu {
                width: 175px;
                font-size: 12px;
                margin-bottom: 12px;
            }

            .user-header {
                padding: 12px;
            }

            .user-initials.big {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }

            .dropdown-arrow {
                font-size: 10px;
            }
        }

        /* Additional menu item styling for better visibility */
        .sidebar-menu li {
            margin-bottom: 2px;
        }

        .sidebar-menu .menu-header {
            padding: 12px 15px 8px 15px;
            font-size: 11px;
            color: #93c5fd;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid rgba(96, 165, 250, 0.1);
            margin-bottom: 5px;
        }

        .sidebar-menu li a {
            color: #dbeafe;
            padding: 10px 15px;
            display: block;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .sidebar-menu li a:hover {
            background: #3b82f6 !important; /* Light blue background */
            color: #FFFFFF !important; /* White text color */
            text-decoration: none;
        }
    </style>



    {if isset($xheader)}
        {$xheader}
    {/if}

</head>

<body class="hold-transition modern-skin-dark sidebar-mini {if $_kolaps}sidebar-collapse{/if}">
    <div class="wrapper">

        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <!-- Toggle -->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" onclick="return setKolaps()">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Empty spacer -->
                <div class="navbar-spacer"></div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar" style="display: flex; flex-direction: column; height: 80vh;">
                <ul class="sidebar-menu" style="flex: 1; overflow-y: auto;">
                    <!-- Dashboard -->
                    <li class="menu-header">
                        <i class="fa fa-dashboard"></i>DASHBOARD
                    </li>
                    <li {if $_system_menu eq 'dashboard' } {/if}>
                        <a href="{Text::url('dashboard')}">
                            <span>{Lang::T('Home')}</span>
                        </a>
                    </li>
                    {$_MENU_AFTER_DASHBOARD}

                    <!-- Customer Section - Flattened -->
                    <li class="menu-header">
                        <i class="fa fa-users"></i> SERVICES
                    </li>
                    <li {if $_system_menu eq 'mikrotik_monitor' } {/if}>
                        <a href="{Text::url('mikrotik-monitor')}">
                            <span>{Lang::T('Online Users')}</span>
                        </a>
                    </li>
                    <li {if $_routes[1] eq 'list' }{/if}>
                        <a href="{Text::url('plan/list')}">
                            <span>{Lang::T('Active Users')}</span>
                        </a>
                    </li>
                    <li {if $_system_menu eq 'customers' } {/if}>
                        <a href="{Text::url('customers')}">
                            <span>{Lang::T('Users')}</span>
                        </a>
                    </li>
                    <li {if $_routes[1] eq 'recharge' }{/if}>
                        <a href="{Text::url('plan/recharge')}">
                            <span>{Lang::T('Recharge User')}</span>
                        </a>
                    </li>

                    {$_MENU_AFTER_CUSTOMERS}

                    <!-- Services Section - Flattened -->
                    {if !in_array($_admin['user_type'],['Report'])}
                        <li class="menu-header">
                            <i class="fa fa-cogs"></i> PLANS
                        </li>

                        <li {if $_routes[1] eq 'list' } {/if}>
                            <a href="{Text::url('bandwidth/list')}">
                                <span>Bandwidth</span>
                            </a>
                        </li>

                        <li {if $_routes[1] eq 'hotspot' } {/if}>
                            <a href="{Text::url('services/hotspot')}">
                                <span>Hotspot</span>
                            </a>
                        </li>

                        <li {if $_routes[1] eq 'pppoe' } {/if}>
                            <a href="{Text::url('services/pppoe')}">
                                <span>PPPOE</span>
                            </a>
                        </li>
                        {if $_c['disable_voucher'] != 'yes'}
                            <li {if $_routes[1] eq 'voucher' } {/if}>
                                <a href="{Text::url('plan/voucher')}">
                                    <span>{Lang::T('Vouchers')}</span>
                                </a>
                            </li>
                        {/if}
                        {$_MENU_SERVICES}
                    {/if}

                    {$_MENU_AFTER_SERVICES}

                    <!-- Send Message Section - Flattened -->
                    <li class="menu-header">
                        <i class="ion ion-android-chat"></i> COMMUNICATION
                    </li>
                    <li {if $_routes[1] eq 'send' } {/if}>
                        <a href="{Text::url('message/send')}">
                            <span>{Lang::T('Single User')}</span>
                        </a>
                    </li>
                    <li {if $_routes[1] eq 'send_bulk' } {/if}>
                        <a href="{Text::url('message/send_bulk')}">
                            <span>{Lang::T('Many Users')}</span>
                        </a>
                    </li>
                    <li {if $_routes[1] eq 'Announcement_Customer' }{/if}>
                        <a href="{Text::url('pages/Announcement_Customer')}">
                            <span>{Lang::T('Announcement')}</span>
                        </a>
                    </li>
                    <li {if $_routes[1] eq 'Message Tokens' }{/if}>
                        <a href="{Text::url('message_tokens/token')}">
                            <span>{Lang::T('Message Token')}</span>
                        </a>
                    </li>

                    {$_MENU_MESSAGE}

                    {$_MENU_AFTER_MESSAGE}
                    {$_MENU_AFTER_PLANS}

                    <!-- Reports Section - Flattened -->
                    {if in_array($_admin['user_type'],['SuperAdmin','Admin', 'Report'])}
                        <li class="menu-header">
                            <i class="fa fa-bar-chart"></i> REPORTS
                        </li>
                        <li {if $_routes[1] eq 'reports' }{/if}>
                            <a href="{Text::url('reports')}">
                                <span>{Lang::T('Purchase Report')}</span>
                            </a>
                        </li>
                        <li {if $_routes[1] eq 'activation' } {/if}>
                            <a href="{Text::url('reports/activation')}">
                                <span>{Lang::T('Activation Report')}</span>
                            </a>
                        </li>
                        {$_MENU_REPORTS}
                    {/if}

                    {$_MENU_AFTER_REPORTS}
                    {$_MENU_AFTER_MESSAGE}

                    <!-- Network Section - Flattened -->
                    {if in_array($_admin['user_type'],['SuperAdmin','Admin'])}
                        <li class="menu-header">
                            <i class="fa fa-sitemap"></i> NETWORK
                        </li>
                        <li {if $_routes[0] eq 'routers' and $_routes[1] eq '' } {/if}>
                            <a href="{Text::url('routers')}">
                                <span>Routers</span>
                            </a>
                        </li>
                        <li {if $_routes[0] eq 'pool' and $_routes[1] eq 'list' } {/if}>
                            <a href="{Text::url('pool/list')}">
                                <span>PPPoE Pool</span>
                            </a>
                        </li>
                        {$_MENU_NETWORK}
                    {/if}

                    {$_MENU_AFTER_NETWORKS}
                    {$_MENU_AFTER_PAGES}
                    {$_MENU_AFTER_LOGS}

                    <!-- Settings Section - Flattened -->
                    <li class="menu-header">
                        <i class="fa fa-gear"></i> SETTINGS
                    </li>
                    {if in_array($_admin['user_type'],['SuperAdmin','Admin'])}
                        <li {if $_routes[1] eq 'app' } {/if}>
                            <a href="{Text::url('settings/app')}">
                                <span>{Lang::T('General Settings')}</span>
                            </a>
                        </li>
                    {/if}
                    {if in_array($_admin['user_type'],['SuperAdmin','Admin'])}
                        <li {if $_system_menu eq 'paymentgateway' } {/if}>
                            <a href="{Text::url('paymentgateway')}">
                                <span>{Lang::T('Payment Gateway')}</span>
                            </a>
                        </li>
                        {$_MENU_SETTINGS}
                    {/if}
                </ul>

                {if in_array($_admin['user_type'],['SuperAdmin','Admin','Agent'])}
                    <div class="sidebar-user custom-dropdown" style="margin-top: auto; padding: 10px; border-top: 1px solid #1e40af; background: #1e40af;">
                        <div class="dropdown-toggle" id="userDropdownToggle" style="display: flex; align-items: center; gap: 8px; text-decoration: none; color: #333; cursor: pointer;">
                            <div class="user-initials" style="background: #1A73E8; color: #fff; font-weight: bold; border-radius: 50%; width: 34px; height: 34px; display: flex; align-items: center; justify-content: center; font-size: 14px;">
                                {substr($_admin['fullname'],0,1)}
                            </div>
                            <span class="hidden-xs" style="font-size: 14px; font-weight: 500; color: #fff;">{$_admin['fullname']}</span>
                            <i class="ion ion-chevron-up dropdown-arrow" style="margin-left: auto; font-size: 12px; color: #fff; transition: transform 0.3s ease;"></i>
                        </div>

                        <div class="custom-dropdown-menu" style="background: #fff; border: 1px solid #e5e5e5; border-radius: 6px; overflow: hidden;">
                            <div class="user-header text-center" style="background: #f5f5f5; padding: 15px; border-bottom: 1px solid #e5e5e5; text-align: center;">
                                <div class="user-initials big" style="width: 70px; height: 70px; font-size: 28px; margin: 0 auto 10px auto; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #1A73E8; color: #fff; font-weight: bold;">
                                    {substr($_admin['fullname'],0,1)}
                                </div>
                                <p style="margin: 0; font-weight: 600; color: #000000;">{$_admin['fullname']}</p>
                                <small style="color: #666;">{Lang::T($_admin['user_type'])}</small>
                            </div>

                            <div class="user-body" style="padding: 10px;">
                                <div class="row" style="display: flex; justify-content: space-between; text-align: center;">
                                    <div style="flex: 1; border-right: 1px solid #e5e5e5;">
                                        <a href="{Text::url('settings/change-password')}" style="display: block; padding: 6px; color: #555; text-decoration: none; font-size: 13px;">
                                            <i class="ion ion-settings"></i><br>
                                            <span style="font-size: 12px;">{Lang::T('Password')}</span>
                                        </a>
                                    </div>
                                    <div style="flex: 1;">
                                        <a href="{Text::url('settings/users-view/', $_admin['id'])}" style="display: block; padding: 6px; color: #555; text-decoration: none; font-size: 13px;">
                                            <i class="ion ion-person"></i><br>
                                            <span style="font-size: 12px;">{Lang::T('Account')}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="user-footer" style="background: #f5f5f5; padding: 10px; text-align: right; border-top: 1px solid #e5e5e5;">
                                <a href="{Text::url('logout')}" class="btn btn-danger btn-sm" style="background: #DC2626; color: #fff; padding: 6px 14px; border-radius: 20px; text-decoration: none; font-size: 13px; display: inline-flex; align-items: center; gap: 5px;">
                                    <i class="ion ion-power"></i> {Lang::T('Logout')}
                                </a>
                            </div>
                        </div>
                    </div>
                {/if}

            </section>
        </aside>

        {if $_c['maintenance_mode'] == 1}
            <div class="notification-top-bar">
                <p>{Lang::T('The website is currently in maintenance mode, this means that some or all functionality may be
                unavailable to regular users during this time.')}<small> &nbsp;&nbsp;<a
                            href="{Text::url('settings/maintenance')}">{Lang::T('Turn Off')}</a></small></p>
            </div>
        {/if}

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    {$_title}
                </h1>
            </section>

            <section class="content">
                {if isset($notify)}
                    <script>
                        // Display SweetAlert toast notification
                        Swal.fire({
                            icon: '{if $notify_t == "s"}success{else}error{/if}',
                            title: '{$notify}',
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                    </script>
                {/if}

    <script>
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
    </script>

</body>
</html>
