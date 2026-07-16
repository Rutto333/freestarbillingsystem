<?php
/* Smarty version 4.5.3, created on 2025-10-12 15:49:29
  from '/var/www/html/dev/ui/ui/widget/graph_week_sales.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68eba3d983df39_48497829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '746e5782d092d99bce22e5e6038fbaa4926bd403' => 
    array (
      0 => '/var/www/html/dev/ui/ui/widget/graph_week_sales.tpl',
      1 => 1760266212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68eba3d983df39_48497829 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-solid">
    <div class="box-header">
        <i class="fa fa-calendar"></i>

        <h3 class="box-title"><?php echo Lang::T('Total Weekly Sales (Mon – Sun)');?>
</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
            <a href="<?php echo Text::url('dashboard&refresh');?>
" class="btn bg-teal btn-sm">
                <i class="fa fa-refresh"></i>
            </a>
        </div>
    </div>

    <div class="box-body border-radius-none">
        <canvas class="chart" id="weeklySalesChart" style="height: 250px;"></canvas>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
    <?php if ($_smarty_tpl->tpl_vars['_c']->value['hide_tmc'] != 'yes') {?>
        
        document.addEventListener("DOMContentLoaded", function() {
            // Get weekly sales from PHP
            var weeklySales = JSON.parse('<?php echo json_encode($_smarty_tpl->tpl_vars['weeklySales']->value);?>
');

            // Prepare labels and data
            var labels = [];
            var data = [];

            for (var i = 0; i < weeklySales.length; i++) {
                labels.push(weeklySales[i].weekday);      // Monday, Tuesday...
                data.push(weeklySales[i].totalSales || 0);
            }

            var ctx = document.getElementById('weeklySalesChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Weekly Sales',
                        data: data,
                        backgroundColor: 'rgba(2, 10, 242, 0.6)',
                        borderColor: 'rgba(2, 10, 242, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            grid: { display: false }
                        },
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(0, 0, 0, 0.1)' }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Ksh ' + context.parsed.y.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        });
        
    <?php }
echo '</script'; ?>
>
<?php }
}
