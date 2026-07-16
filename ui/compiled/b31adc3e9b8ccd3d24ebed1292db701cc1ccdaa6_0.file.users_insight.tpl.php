<?php
/* Smarty version 4.5.3, created on 2025-08-29 10:07:45
  from '/var/www/html/example/ui/ui/widget/users_insight.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b151c1a3e429_49401288',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b31adc3e9b8ccd3d24ebed1292db701cc1ccdaa6' => 
    array (
      0 => '/var/www/html/example/ui/ui/widget/users_insight.tpl',
      1 => 1756451253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68b151c1a3e429_49401288 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard with User Count</title>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid p-4">
        <div class="row">
            <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Report'))) {?>
                <!-- Online Users - Green Accent Card -->
                <div class="col-lg-4 col-xs-6">
                    <div class="card shadow rounded" style="background: #fdf6ec; color: #343a40;">
                        <div class="card-body d-flex align-items-center">
                            <div class="mr-3">
                                <i class="ion ion-ios-pulse-strong" style="font-size: 2rem; color: #28a745;"></i>
                            </div>
                            <div>
                                <h5 class="mb-1"><?php echo Lang::T('Online Users');?>
</h5>
                                <h4 class="mb-2 font-weight-bold" id="online-users-count">
                                    <span class="spinner-border spinner-border-sm text-success" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                    Loading...
                                </h4>
                                <a href="<?php echo Text::url('reports/by-period');?>
" class="small text-success">
                                    View Report
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>

            <!-- Active Users - Yellow Accent Card -->
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
                                View Plans
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- All Users - Blue Accent Card -->
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
                                View Users
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Horizontal Divider Between Sections -->
        <hr class="my-4" style="border-top: 2px solid #dee2e6;">
    </div>

    <?php echo '<script'; ?>
>
        var $j = jQuery.noConflict();

        // Function to get online user count using the new controller API
        function getOnlineUserCount(router) {
            return $j.ajax({
                url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
mikrotik-monitor/api/online-users/' + router,
                method: 'GET',
                timeout: 10000
            }).then(response => {
                let totalCount = 0;

                // Count PPPoE users only if username is not empty
                if (response.pppoe && Array.isArray(response.pppoe)) {
                    totalCount += response.pppoe.filter(user => user.username && user.username.trim() !== "").length;
                }

                // Count Hotspot users only if username is not empty
                if (response.hotspot && Array.isArray(response.hotspot)) {
                    totalCount += response.hotspot.filter(user => user.username && user.username.trim() !== "").length;
                }

                return totalCount;
            }).catch(error => {
                console.log('Failed to get user count (router might be offline):', error.status);
                return 0;
            });
        }


        // Function to update the online users card
        function updateOnlineUsersCard(router) {
            getOnlineUserCount(router).then(count => {
                // Always show the count (0 if router is offline)
                $j('#online-users-count').html(count);

                // Optional: Add visual indicator if count is 0
                if (count === 0) {
                    $j('#online-users-count').removeClass('text-danger').addClass('text-muted');
                } else {
                    $j('#online-users-count').removeClass('text-muted text-danger').addClass('text-success');
                }
            }).catch(error => {
                console.log('Error updating user count display:', error);
                // Even in case of error, show 0
                $j('#online-users-count').html('0').removeClass('text-success').addClass('text-muted');
            });
        }

        // Initialize when document is ready
        $j(document).ready(function() {
            // Replace 'your_router_id' with the actual router ID variable
            const routerId = '<?php echo $_smarty_tpl->tpl_vars['router']->value;?>
' || '1'; // Use your router variable here

            // Initial load
            updateOnlineUsersCard(routerId);

        });
    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
