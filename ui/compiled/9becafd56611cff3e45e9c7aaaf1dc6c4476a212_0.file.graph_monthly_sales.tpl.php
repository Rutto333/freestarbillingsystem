<?php
/* Smarty version 4.5.3, created on 2025-07-09 11:38:43
  from '/var/www/html/alpha/ui/ui/widget/graph_monthly_sales.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_686e2a934e2220_28212555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9becafd56611cff3e45e9c7aaaf1dc6c4476a212' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/widget/graph_monthly_sales.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686e2a934e2220_28212555 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-solid ">
    <div class="box-header">
        <i class="fa fa-inbox"></i>

        <h3 class="box-title"><?php echo Lang::T('Total Monthly Sales');?>
</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <a href="<?php echo Text::url('dashboard&refresh');?>
" class="btn bg-teal btn-sm"><i class="fa fa-refresh"></i>
            </a>
        </div>
    </div>
    <div class="box-body border-radius-none">
        <canvas class="chart" id="salesChart" style="height: 250px;"></canvas>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
    <?php if ($_smarty_tpl->tpl_vars['_c']->value['hide_tmc'] != 'yes') {?>
        
            document.addEventListener("DOMContentLoaded", function() {
                var monthlySales = JSON.parse('<?php echo json_encode($_smarty_tpl->tpl_vars['monthlySales']->value);?>
');

                var monthNames = [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ];

                var labels = [];
                var data = [];

                for (var i = 1; i <= 12; i++) {
                    var month = findMonthData(monthlySales, i);
                    labels.push(month ? monthNames[i - 1] : monthNames[i - 1].substring(0, 3));
                    data.push(month ? month.totalSales : 0);
                }

                var ctx = document.getElementById('salesChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Monthly Sales',
                            data: data,
                            backgroundColor: 'rgba(2, 10, 242)', // Customize the background color
                            borderColor: 'rgba(255, 99, 132, 1)', // Customize the border color
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.1)'
                                }
                            }
                        }
                    }
                });
            });

            function findMonthData(monthlySales, month) {
                for (var i = 0; i < monthlySales.length; i++) {
                    if (monthlySales[i].month === month) {
                        return monthlySales[i];
                    }
                }
                return null;
            }
        
    <?php }
echo '</script'; ?>
><?php }
}
