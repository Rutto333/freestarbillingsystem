<?php
/* Smarty version 4.5.3, created on 2025-08-29 00:10:28
  from '/var/www/html/example/ui/ui/widget/graph_monthly_growth.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b0c5c47b2602_84046908',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '729544aac955ba93544d56433c501f0f5f6c80d0' => 
    array (
      0 => '/var/www/html/example/ui/ui/widget/graph_monthly_growth.tpl',
      1 => 1754998441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68b0c5c47b2602_84046908 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-solid">
    <div class="box-header">
        <i class="fa fa-bar-chart"></i>
        <h3 class="box-title"><?php echo Lang::T('Monthly Growth');?>
</h3>
    </div>
    <div class="box-body border-radius-none">
        <canvas class="chart" id="combinedChart" style="height: 300px;"></canvas>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
    <?php if ($_smarty_tpl->tpl_vars['_c']->value['hide_tmc'] != 'yes') {?>
        
            document.addEventListener("DOMContentLoaded", function() {
                // Parse data from backend
                var monthlySales = JSON.parse('<?php echo json_encode($_smarty_tpl->tpl_vars['monthlySales']->value);?>
');
                var monthlyRegistered = JSON.parse('<?php echo json_encode($_smarty_tpl->tpl_vars['monthlyRegistered']->value);?>
');
                
                var monthNames = [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ];
                
                var labels = [];
                var salesData = [];
                var registeredData = [];
                
                // Prepare data for all 12 months
                for (var i = 1; i <= 12; i++) {
                    labels.push(monthNames[i - 1]);
                    
                    // Find sales data for current month
                    var salesMonth = findMonthData(monthlySales, i);
                    salesData.push(salesMonth ? salesMonth.totalSales : 0);
                    
                    // Find registered customers data for current month
                    var registeredMonth = monthlyRegistered.find(count => count.month === i);
                    registeredData.push(registeredMonth ? registeredMonth.count : 0);
                }
                
                var ctx = document.getElementById('combinedChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                type: 'bar',
                                label: 'Monthly Sales',
                                data: salesData,
                                backgroundColor: 'rgba(102, 187, 106, 0.6)',
                                borderColor: 'rgba(56, 142, 60, 1)',
                                borderWidth: 1,
                                yAxisID: 'y'
                                                           },
                            {
                                type: 'line',
                                label: 'Registered Customers',
                                data: registeredData,
                                backgroundColor: 'rgba(255, 202, 128, 0.4)',
                                borderColor: 'rgba(255, 152, 0, 1)',
                                borderWidth: 2,
                                fill: false,
                                tension: 0.4,
                                yAxisID: 'y1'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false,
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                            }
                        },
                        scales: {
                            x: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Month'
                                },
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                type: 'linear',
                                display: false,
                                position: 'left',
                                title: {
                                    display: true,
                                    text: ''  // Removed Sales Amount label here
                                },
                                beginAtZero: true,
                                grace: '10%', // Adds space before scale starts
                                grid: {
                                    color: 'rgba(102, 187, 106, 0.6)'                                },
                                ticks: {
                                    color: 'rgba(56, 142, 60, 1)',
                                    display: true
                                }
                            },
                            y1: {
                                type: 'linear',
                                display: true,
                                position: 'right',
                                title: {
                                    display: true,
                                    text: 'Registered Customers',
                                    color: 'rgba(255, 152, 0, 1)'
                                },
                                beginAtZero: true,
                                grace: '10%', // Adds space before scale starts
                                grid: {
                                    drawOnChartArea: false,
                                },
                                ticks: {
                                    color: 'rgba(255, 152, 0, 1)'                                }
                            },
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
>
<?php }
}
