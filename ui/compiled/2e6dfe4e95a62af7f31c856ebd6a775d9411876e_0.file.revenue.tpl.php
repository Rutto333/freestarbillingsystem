<?php
/* Smarty version 4.5.3, created on 2025-09-09 14:59:32
  from '/var/www/html/myapp/ui/ui/widget/revenue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c016a44dc0a0_61784998',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e6dfe4e95a62af7f31c856ebd6a775d9411876e' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/widget/revenue.tpl',
      1 => 1757419146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68c016a44dc0a0_61784998 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-info panel-hovered mb20 activities">    
    <div class="panel-body">

        <div class="row">
            <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Report'))) {?>
                <!-- Yellow Gradient for Income Today -->
                <div class="col-lg-12 col-xs-6">
                    <div class="info-box text-white rounded" style="background: linear-gradient(135deg, #ffc107, #fff176);">
                        <span class="info-box-icon">
                            <i class="ion ion-clock"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text"><?php echo Lang::T('Income Today');?>
</span>
                            <span class="info-box-number">
                                <sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
                                <?php echo number_format($_smarty_tpl->tpl_vars['iday']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>

                            </span>
                            <a href="<?php echo Text::url('reports/by-date');?>
" class="text-white small d-block mt-2">
                                View Today Report
                            </a>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row">
                <!-- Blue Gradient for Income This Week -->
                <div class="col-lg-12 col-xs-6">
                    <div class="info-box text-white rounded" style="background: linear-gradient(135deg, #17a2b8, #7dd3fc);">
                        <span class="info-box-icon">
                            <i class="ion ion-calendar"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text"><?php echo Lang::T('Income This Week');?>
</span>
                            <span class="info-box-number">
                                <sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
                                <?php echo number_format($_smarty_tpl->tpl_vars['iweek']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>

                            </span>
                            <a href="<?php echo Text::url('reports');?>
" class="text-white small d-block mt-2">
                                View Stats
                            </a>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row">
                <!-- Green Gradient for Income This Month -->
                <div class="col-lg-12 col-xs-6">
                    <div class="info-box text-white rounded" style="background: linear-gradient(135deg, #28a745, #85e085);">
                        <span class="info-box-icon">
                            <i class="ion ion-android-calendar"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text"><?php echo Lang::T('Income This Month');?>
</span>
                            <span class="info-box-number">
                                <sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
                                <?php echo number_format($_smarty_tpl->tpl_vars['imonth']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>

                            </span>
                            <a href="<?php echo Text::url('reports');?>
" class="text-white small d-block mt-2">
                                View Stats
                            </a>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>

        <!-- Donut Charts -->
        <div class="row mt-4">
            <div class="col-md-4">
                <canvas id="dayChart"></canvas>
            </div>
            <div class="col-md-4">
                <canvas id="weekChart"></canvas>
            </div>
            <div class="col-md-4">
                <canvas id="monthChart"></canvas>
            </div>
        </div>

    </div>
</div>

<!-- Chart.js -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    const currency = "<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
";

    // Donut for Day (Today vs Yesterday)
    new Chart(document.getElementById("dayChart"), {
        type: 'doughnut',
        data: {
            labels: ['Today', 'Yesterday'],
            datasets: [{
                data: [<?php echo $_smarty_tpl->tpl_vars['iday']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['lday']->value;?>
],
                backgroundColor: ['#ffc107', '#ff9800']
            }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
    });

    // Donut for Week (This Week vs Last Week)
    new Chart(document.getElementById("weekChart"), {
        type: 'doughnut',
        data: {
            labels: ['This Week', 'Last Week'],
            datasets: [{
                data: [<?php echo $_smarty_tpl->tpl_vars['iweek']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['lweekly']->value;?>
],
                backgroundColor: ['#17a2b8', '#0288d1']
            }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
    });

    // Donut for Month (This Month vs Last Month)
    new Chart(document.getElementById("monthChart"), {
        type: 'doughnut',
        data: {
            labels: ['This Month', 'Last Month'],
            datasets: [{
                data: [<?php echo $_smarty_tpl->tpl_vars['imonth']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['lmonth']->value;?>
],
                backgroundColor: ['#28a745', '#1e7e34']
            }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
    });
<?php echo '</script'; ?>
>
<?php }
}
