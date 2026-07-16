<?php
/* Smarty version 4.5.3, created on 2025-09-16 12:35:28
  from '/var/www/html/myapp/ui/ui/widget/users_insight.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c92f60d1db34_60174491',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '443b55765ba7abf9f2aecab3accc53a19558aa14' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/widget/users_insight.tpl',
      1 => 1758015204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68c92f60d1db34_60174491 (Smarty_Internal_Template $_smarty_tpl) {
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
</head>
<body>
    <div class="container-fluid p-4">
        <!-- Dashboard Cards Row -->
        <div class="row">
            <!-- Online Users Card-->

            <div class="col-lg-4 col-xs-6">
                <div class="card shadow rounded" style="background: #fdf6ec; color: #343a40;">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3">
                            <i class="ion ion-ios-pulse-strong" style="font-size: 2rem; color: #28a745;"></i>
                        </div>
                        <div>
                            <h5 class="mb-1"><?php echo Lang::T('Online Users');?>
</h5>
                            <h4 class="mb-2 font-weight-bold <?php if ($_smarty_tpl->tpl_vars['online_users_count']->value > 0) {?>text-success<?php } else { ?>text-muted<?php }?>">
                                <?php echo $_smarty_tpl->tpl_vars['online_users_count']->value;?>

                            </h4>
                            <a href="<?php echo Text::url('mikrotik-monitor');?>
" class="small text-success">
                               <i class="ion ion-eye"></i> View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Active Users Card -->
            <div class="col-lg-4 col-xs-6">
                <div class="card shadow rounded" style="background: #fdf6ec; color: #343a40;">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3">
                            <i class="ion ion-person" style="font-size: 2rem; color: #ffc107;"></i>
                        </div>
                        <div>
                            <h5 class="mb-1"><?php echo Lang::T('Active Users');?>
</h5>
                            <h4 class="mb-2 font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['u_act']->value;?>
</h4>
                            <a href="<?php echo Text::url('plan/list');?>
" class="small text-warning">
                                View Active Users
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- All Users Card -->
            <div class="col-lg-4 col-xs-6">
                <div class="card shadow rounded" style="background: #fdf6ec; color: #343a40;">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3">
                            <i class="ion ion-android-people" style="font-size: 2rem; color: #17a2b8;"></i>
                        </div>
                        <div>
                            <h5 class="mb-1"><?php echo Lang::T('Users');?>
</h5>
                            <h4 class="mb-2 font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['c_all']->value;?>
</h4>
                            <a href="<?php echo Text::url('customers/list');?>
" class="small text-primary">
                                <i class="ion ion-person-stalker"></i> View All Users
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
</html>
<?php }
}
