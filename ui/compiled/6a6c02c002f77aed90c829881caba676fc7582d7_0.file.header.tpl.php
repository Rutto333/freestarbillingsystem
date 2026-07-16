<?php
/* Smarty version 4.5.3, created on 2025-08-28 09:19:01
  from '/var/www/html/example/ui/ui/customer/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68aff4d5133e84_45076462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a6c02c002f77aed90c829881caba676fc7582d7' => 
    array (
      0 => '/var/www/html/example/ui/ui/customer/header.tpl',
      1 => 1756361888,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68aff4d5133e84_45076462 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</title>

    <?php echo '<script'; ?>
>
        var appUrl = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
';
    <?php echo '</script'; ?>
>
    <style>
        .user-initials {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #3c8dbc; /* Change to match your theme */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
        }

        .user-header .user-initials {
            width: 80px;
            height: 80px;
            font-size: 24px;
            margin: auto;
        }

    </style>

    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/modern-AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/sweetalert2.min.css" />
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/scripts/sweetalert2.all.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/phpnuxbill.customer.css?2025.2.4" />

    <style>

    </style>

    <?php if ((isset($_smarty_tpl->tpl_vars['xheader']->value))) {?>
        <?php echo $_smarty_tpl->tpl_vars['xheader']->value;?>

    <?php }?>

</head>

<body class="hold-transition modern-skin-dark sidebar-mini">
    <div class="wrapper">
        <header class="main-header" style="position:fixed; width: 100%">
            <a href="<?php echo Text::url('home');?>
" class="logo">
                <span class="logo-mini"></span>
                <span class="logo-lg"><?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="toggle-container" href="#">
                            	<i class="toggle-icon" id="toggleIcon">🌜</i>
                            </a>
                        </li>

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes') {?>
                                    <span style="color: whitesmoke;">&nbsp;<?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['_user']->value['balance']);?>
&nbsp;</span>
                                <?php } else { ?>
                                    <span><?php echo $_smarty_tpl->tpl_vars['_user']->value['fullname'];?>
</span>
                                <?php }?>
                                <div class="user-initials user-image"><?php echo $_smarty_tpl->tpl_vars['initials']->value;?>
</div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <div class="user-initials img-circle"><?php echo $_smarty_tpl->tpl_vars['initials']->value;?>
</div>
                                    <p>
                                        <?php echo $_smarty_tpl->tpl_vars['_user']->value['fullname'];?>

                                        <small><?php echo $_smarty_tpl->tpl_vars['_user']->value['phonenumber'];?>
<br>
                                            <?php echo $_smarty_tpl->tpl_vars['_user']->value['email'];?>
</small>
                                    </p>
                                </li>

                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-7 text-center text-sm">
                                            <a href="<?php echo Text::url('accounts/change-password');?>
"><i class="ion ion-settings"></i>
                                                <?php echo Lang::T('Change Password');?>
</a>
                                        </div>
                                        <div class="col-xs-5 text-center text-sm">
                                            <a href="<?php echo Text::url('accounts/profile');?>
"><i class="ion ion-person"></i>
                                                <?php echo Lang::T('My Account');?>
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

        <aside class="main-sidebar" style="position:fixed;">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'home') {?>class="active" <?php }?>>
                        <a href="<?php echo Text::url('home');?>
">
                            <i class="ion ion-monitor"></i>
                            <span><?php echo Lang::T('Dashboard');?>
</span>
                        </a>
                    </li>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_DASHBOARD']->value;?>

                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['payment_gateway'] != 'none' || $_smarty_tpl->tpl_vars['_c']->value['payment_gateway'] == '') {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'package') {?>class="active" <?php }?>>
                            <a href="<?php echo Text::url('order/package');?>
">
                                <i class="ion ion-ios-cart"></i>
                                <span><?php echo Lang::T('Buy Package');?>
</span>
                            </a>
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'history') {?>class="active" <?php }?>>
                            <a href="<?php echo Text::url('order/history');?>
">
                                <i class="fa fa-file-text"></i>
                                <span><?php echo Lang::T('Payment History');?>
</span>
                            </a>
                        </li>
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_ORDER']->value;?>

                    <li <?php if ($_smarty_tpl->tpl_vars['_system_menu']->value == 'list-activated') {?>class="active" <?php }?>>
                        <a href="<?php echo Text::url('voucher/list-activated');?>
">
                            <i class="fa fa-list-alt"></i>
                            <span><?php echo Lang::T('Activation History');?>
</span>
                        </a>
                    </li>
                    <?php echo $_smarty_tpl->tpl_vars['_MENU_AFTER_HISTORY']->value;?>

                </ul>
            </section>
        </aside>

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
                            icon: '<?php if ($_smarty_tpl->tpl_vars['notify_t']->value == "s") {?>success<?php } else { ?>warning<?php }?>',
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
