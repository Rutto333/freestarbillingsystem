<?php
/* Smarty version 4.5.3, created on 2025-10-12 14:15:53
  from '/var/www/html/dev/ui/ui/widget/graph_monthly_growth.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68eb8de97a12b0_43978107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffdf31b87043cd3d33b41e3569cfcd85f96f673b' => 
    array (
      0 => '/var/www/html/dev/ui/ui/widget/graph_monthly_growth.tpl',
      1 => 1758795944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68eb8de97a12b0_43978107 (Smarty_Internal_Template $_smarty_tpl) {
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
                // Google Colors Palette (excluding brown)
                const googleColors = {
                    blue: '#4285F4',
                    blueDark: '#1A73E8',
                    red: '#EA4335',
                    redDark: '#D33B2C',
                    green: '#34A853',
                    greenDark: '#137333',
                    yellow: '#FBBC04',
                    yellowDark: '#F29900',
                    purple: '#9C27B0',
                    purpleDark: '#7B1FA2',
                    teal: '#00ACC1',
                    tealDark: '#00838F',
                    orange: '#FF9800',
                    orangeDark: '#F57C00',
                    pink: '#E91E63',
                    pinkDark: '#C2185B'
                };

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
                                backgroundColor: googleColors.green,
                                borderColor: googleColors.greenDark,
                                borderWidth: 2,
                                yAxisID: 'y'
                            },
                            {
                                type: 'line',
                                label: 'Registered Customers',
                                data: registeredData,
                                backgroundColor: googleColors.yellow,
                                borderColor: googleColors.yellowDark,
                                borderWidth: 3,
                                fill: false,
                                tension: 0.4,
                                pointBackgroundColor: googleColors.yellow,
                                pointBorderColor: googleColors.yellowDark,
                                pointRadius: 5,
                                pointHoverRadius: 7,
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
                                labels: {
                                    usePointStyle: true,
                                    pointStyle: 'rect',
                                    color: '#202124'
                                }
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                backgroundColor: '#202124',
                                titleColor: '#FFFFFF',
                                bodyColor: '#FFFFFF',
                                borderColor: googleColors.blue,
                                borderWidth: 1,
                                callbacks: {
                                    label: function(context) {
                                        if (context.datasetIndex === 0) {
                                            return 'Monthly Sales: KSh ' + context.parsed.y.toLocaleString();
                                        }
                                        return context.dataset.label + ': ' + context.parsed.y;
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Month',
                                    color: '#202124',
                                    font: {
                                        size: 12,
                                        weight: 'bold'
                                    }
                                },
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#5F6368'
                                }
                            },
                            y: {
                                type: 'linear',
                                display: true,
                                position: 'left',
                                title: {
                                    display: true,
                                    text: 'Sales Amount (KSh)',
                                    color: googleColors.yellowDark,
                                    font: {
                                        size: 12,
                                        weight: 'bold'
                                    }
                                },
                                beginAtZero: true,
                                grace: '10%',
                                grid: {
                                    color: 'rgba(66, 133, 244, 0.1)',
                                    drawBorder: false
                                },
                                ticks: {
                                    color: googleColors.greenDark,
                                    display: true,
                                    callback: function(value, index, values) {
                                        return 'KSh ' + value.toLocaleString();
                                    }
                                }
                            },
                            y1: {
                                type: 'linear',
                                display: true,
                                position: 'right',
                                title: {
                                    display: true,
                                    text: 'Registered Customers',
                                    color: googleColors.yellowDark,
                                    font: {
                                        size: 12,
                                        weight: 'bold'
                                    }
                                },
                                beginAtZero: true,
                                grace: '10%',
                                grid: {
                                    drawOnChartArea: false,
                                },
                                ticks: {
                                    color: googleColors.yellowDark
                                }
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
