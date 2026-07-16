<?php
/* Smarty version 4.5.3, created on 2025-09-25 12:10:32
  from '/var/www/html/demo/ui/ui/widget/users_insight.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68d507081c44b1_47110265',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73e3e4453cff97f747f1cccd727672aba609da6d' => 
    array (
      0 => '/var/www/html/demo/ui/ui/widget/users_insight.tpl',
      1 => 1758791421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d507081c44b1_47110265 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard with User Count</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Ionicons CSS -->
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
<style>
.dashboard-card {
min-height: 120px; /* Fixed minimum height for all cards */
color: #fff !important; /* Force white text for all cards */
}
.dashboard-card * {
color: #fff !important; /* Force white text for all child elements */
}
.card-title {
min-height: 2.5rem; /* Ensure consistent title height */
display: flex;
align-items: center;
color: #fff !important;
}
.card a {
color: rgba(255, 255, 255, 0.9) !important;
}
.card a:hover {
color: #fff !important;
text-decoration: none;
}
.card h4, .card h5 {
color: #fff !important;
}
</style>
</head>
<body>
<div class="container-fluid p-4">
<!-- Dashboard Cards Row -->
<div class="row">
<!-- Active Users Card -->
<div class="col-lg-4 col-xs-6">
<div class="card shadow rounded dashboard-card" style="background: #2196F3;"> <!-- Google Blue -->
<div class="card-body d-flex align-items-center">
<div class="mr-3">
<i class="ion ion-person" style="font-size: 2rem; color: #BBDEFB;"></i>
</div>
<div class="flex-grow-1">
<h5 class="mb-1 card-title">Active Users</h5>
<h4 class="mb-2 font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['u_act']->value;?>
</h4>
<a href="<?php echo Text::url('mikrotik-monitor');?>
" class="small">
View Online Users
</a>
</div>
</div>
</div>
</div>
<!-- All Users Card -->
<div class="col-lg-4 col-xs-6">
<div class="card shadow rounded dashboard-card" style="background: #4CAF50;"> <!-- Google Green -->
<div class="card-body d-flex align-items-center">
<div class="mr-3">
<i class="ion ion-android-people" style="font-size: 2rem; color: #C8E6C9;"></i>
</div>
<div class="flex-grow-1">
<h5 class="mb-1 card-title">All Users</h5>
<h4 class="mb-2 font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['c_all']->value;?>
</h4>
<a href="<?php echo Text::url('customers');?>
" class="small">
<i class="ion ion-person-stalker"></i> View All Users
</a>
</div>
</div>
</div>
</div>
<!-- Today's Transactions Card -->
<div class="col-lg-4 col-xs-6">
<div class="card shadow rounded dashboard-card" style="background: #FFC107;"> <!-- Google Amber -->
<div class="card-body d-flex align-items-center">
<div class="mr-3">
<i class="ion ion-card" style="font-size: 2rem; color: #FFECB3;"></i>
</div>
<div class="flex-grow-1">
<h5 class="mb-1 card-title">Today's Transactions</h5>
<h4 class="mb-2 font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['today_transactions']->value;?>
</h4>
<a href="<?php echo Text::url('reports/activation');?>
" class="small">
<i class="ion ion-stats-bars"></i> View Transactions
</a>
</div>
</div>
</div>
</div>
</div>
<!-- Horizontal Divider -->
<hr class="my-4" style="border-top: 2px solid #dee2e6;">
</div>
</body>
</html><?php }
}
