<?php
/* Smarty version 4.5.3, created on 2025-10-12 16:23:59
  from '/var/www/html/dev/ui/ui/widget/revenue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68ebabefb45c59_38553328',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e58a82578402dd90d67b334b5f9c080032889339' => 
    array (
      0 => '/var/www/html/dev/ui/ui/widget/revenue.tpl',
      1 => 1760275419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68ebabefb45c59_38553328 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-info panel-hovered mb20 activities">
    <div class="panel-body">
        <!-- Donut Charts -->
        <div class="row mt-6">
            <div class="col-md-6 mb-4 text-center">
                <canvas id="dayChart" width="100" height="100"></canvas>
            </div>
            <div class="col-md-6 mb-4 text-center">
                <canvas id="weekChart" width="100" height="100"></canvas>
            </div>
            <div class="col-md-6 mb-4 text-center">
                <canvas id="monthChart" width="100" height="100"></canvas>
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
                backgroundColor: ['#9C27B0', '#E1BEE7']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
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
                backgroundColor: ['#2196F3', '#BBDEFB']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
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
                backgroundColor: ['#4CAF50', '#C8E6C9']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
<?php echo '</script'; ?>
>
<?php }
}
