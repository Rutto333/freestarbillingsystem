<?php
/* Smarty version 4.5.3, created on 2025-08-29 00:10:28
  from '/var/www/html/example/ui/ui/widget/plans_chart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b0c5c48031b2_90292860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41f8c2cd2defbd2ff36316c9e55edcdf67e1a533' => 
    array (
      0 => '/var/www/html/example/ui/ui/widget/plans_chart.tpl',
      1 => 1755002438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68b0c5c48031b2_90292860 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <!-- Hotspot Plans Chart -->
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Hotspot Plans</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <canvas id="hotspotChart" style="height: 150px;"></canvas>
            </div>
            <div class="box-footer text-muted">
                Period: <?php echo $_smarty_tpl->tpl_vars['plans_chart']->value['start'];?>
 to <?php echo $_smarty_tpl->tpl_vars['plans_chart']->value['end'];?>

            </div>
        </div>
    </div>

    <!-- PPPoE Plans Chart -->
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">PPPoE Plans</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <canvas id="pppoeChart" style="height: 150px;"></canvas>
            </div>
            <div class="box-footer text-muted">
                Period: <?php echo $_smarty_tpl->tpl_vars['plans_chart']->value['start'];?>
 to <?php echo $_smarty_tpl->tpl_vars['plans_chart']->value['end'];?>

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
(function() {
    // Hotspot data
    var hotspotLabels = <?php echo json_encode(array_column($_smarty_tpl->tpl_vars['plans_chart']->value['hotspot'],'label'));?>
;
    var hotspotValues = <?php echo json_encode(array_column($_smarty_tpl->tpl_vars['plans_chart']->value['hotspot'],'value'));?>
;

    // PPPoE data
    var pppoeLabels = <?php echo json_encode(array_column($_smarty_tpl->tpl_vars['plans_chart']->value['pppoe'],'label'));?>
;
    var pppoeValues = <?php echo json_encode(array_column($_smarty_tpl->tpl_vars['plans_chart']->value['pppoe'],'value'));?>
;

    var colors = ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff', '#f7464a', '#46bfbd'];

    new Chart(document.getElementById('hotspotChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: hotspotLabels,
            datasets: [{
                data: hotspotValues,
                backgroundColor: colors
            }]
        },
        options: { responsive: true }
    });

    new Chart(document.getElementById('pppoeChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: pppoeLabels,
            datasets: [{
                data: pppoeValues,
                backgroundColor: colors
            }]
        },
        options: { responsive: true }
    });
})();
<?php echo '</script'; ?>
>
<?php }
}
