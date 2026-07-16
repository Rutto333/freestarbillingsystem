<?php
/* Smarty version 4.5.3, created on 2025-09-09 12:35:13
  from '/var/www/html/myapp/ui/ui/admin/reports/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68bff4d1c84823_26437110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e31f5a2c35cc46eaebeb7df643d9ff7c6379507b' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/reports/list.tpl',
      1 => 1757410500,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:pagination.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68bff4d1c84823_26437110 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- reports-daily -->


<style>
/* reports-daily.css */

/* Panel styling */
.panel-primary {
    border-color: var(--primary-brown);
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(139, 69, 19, 0.15);
}

.panel-primary > .panel-heading {
    background: linear-gradient(135deg, var(--warm-brown), var(--latte));
    color: #452B1F; /* Dark brown text color */
    font-weight: 600;
    border-radius: 10px 10px 0 0;
    border-bottom: 2px solid var(--primary-brown);
}

.panel-primary > .panel-heading .panel-title {
    font-size: 1rem;
    letter-spacing: 0.3px;
    color: #452B1F; /* Same dark brown text color */
}

.panel-primary > .panel-body {
    background: #fff;
    padding: 20px;
    border-radius: 0 0 10px 10px;
}

/* Table styling */
.table thead th {
    background: var(--latte);
    color: var(--dark-brown);
    font-weight: 600;
    border-bottom: 2px solid var(--warm-brown);
}

.table tbody tr:hover {
    background: var(--cream);
}

.table tfoot tr {
    background: var(--beige);
    font-weight: bold;
    color: var(--dark-brown);
}

/* Labels */
.label-primary {
    background: var(--warm-brown);
    border-radius: 4px;
    padding: 3px 8px;
}

.label-default {
    background: var(--coffee-light);
    color: #fff;
}

.label-success {
    background: var(--cappuccino);
    color: #fff;
}

/* Buttons */
.btn-primary {
    background: var(--warm-brown);
    border-color: var(--primary-brown);
    color: #fff;
    font-weight: 500;
    border-radius: 6px;
    transition: all 0.2s ease-in-out;
}

.btn-primary:hover {
    background: var(--primary-brown);
    border-color: var(--dark-brown);
}

.btn-danger {
    background: var(--claude-orange);
    border-color: var(--claude-orange-dark);
    color: #fff;
    border-radius: 6px;
}

.btn-danger:hover {
    background: var(--claude-orange-dark);
    border-color: var(--claude-orange-darker);
}

/* Filter box */
#filter_box {
    background: var(--cream);
    border-radius: 10px;
    padding: 15px;
    box-shadow: inset 0 1px 3px rgba(139, 69, 19, 0.15);
}

/* Form inputs */
.form-control {
    border: 1px solid var(--light-brown);
    border-radius: 6px;
    padding: 8px 12px;
    background: #fff;
    transition: border 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.form-control:focus {
    border-color: var(--warm-brown);
    box-shadow: 0 0 6px rgba(160, 82, 45, 0.3);
}

/* Chart containers */
.chart-container {
    background: var(--beige);
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(139, 69, 19, 0.1);
    margin-bottom: 20px;
    text-align: center;
}

.chart-title {
    color: var(--dark-brown);
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Panel footer */
.panel-footer {
    background: var(--cream);
    border-top: 1px solid var(--light-brown);
    border-radius: 0 0 10px 10px;
    color: var(--coffee-dark);
}

</style>
<div class="row">
    <div class="col-lg-3">
        <form method="get" class="form">
            <div class="panel panel-primary">
                <div class="panel-heading" onclick="showFilter()" style="cursor: pointer;">
                    <h3 class="panel-title">
                        <i class="fa fa-filter"></i>
                        <?php echo Lang::T('Filter');?>

                    </h3>
                </div>
                <div id="filter_box" class="panel-body hidden-xs hidden-sm hidden-md">
                    <center>
                        <label class="checkbox-label">
                            <input type="checkbox" id="show_chart" onclick="return setShowChart()">
                            <span class="checkmark"></span>
                            <?php echo Lang::T('Show chart');?>

                        </label>
                    </center>
                    <hr style="margin: 15px 0;">
                    <input type="hidden" name="_route" value="reports">

                    <div class="form-group">
                        <label><?php echo Lang::T('Start Date');?>
</label>
                        <input type="date" class="form-control" name="sd" value="<?php echo $_smarty_tpl->tpl_vars['sd']->value;?>
">
                    </div>

                    <div class="form-group">
                        <label><?php echo Lang::T('Start time');?>
</label>
                        <input type="time" class="form-control" name="ts" value="<?php echo $_smarty_tpl->tpl_vars['ts']->value;?>
">
                    </div>

                    <div class="form-group">
                        <label><?php echo Lang::T('End Date');?>
</label>
                        <input type="date" class="form-control" name="ed" value="<?php echo $_smarty_tpl->tpl_vars['ed']->value;?>
">
                    </div>

                    <div class="form-group">
                        <label><?php echo Lang::T('End Time');?>
</label>
                        <input type="time" class="form-control" name="te" value="<?php echo $_smarty_tpl->tpl_vars['te']->value;?>
">
                    </div>

                    <div class="form-group">
                        <label><?php echo Lang::T('Type');?>
</label>
                        <select class="form-control select2" name="tps[]" multiple>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['types']->value, 'type');
$_smarty_tpl->tpl_vars['type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" <?php if (in_array($_smarty_tpl->tpl_vars['type']->value,$_smarty_tpl->tpl_vars['tps']->value)) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?php echo Lang::T('Internet Plans');?>
</label>
                        <select class="form-control select2" name="plns[]" multiple>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['plan']->value;?>
" <?php if (in_array($_smarty_tpl->tpl_vars['plan']->value,$_smarty_tpl->tpl_vars['plns']->value)) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['plan']->value;?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?php echo Lang::T('Methods');?>
</label>
                        <select class="form-control select2" name="mts[]" multiple>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['methods']->value, 'method');
$_smarty_tpl->tpl_vars['method']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['method']->value) {
$_smarty_tpl->tpl_vars['method']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['method']->value;?>
" <?php if (in_array($_smarty_tpl->tpl_vars['method']->value,$_smarty_tpl->tpl_vars['mts']->value)) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['method']->value;?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?php echo Lang::T('Routers');?>
</label>
                        <select class="form-control select2" name="rts[]" multiple>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['routers']->value, 'router');
$_smarty_tpl->tpl_vars['router']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['router']->value) {
$_smarty_tpl->tpl_vars['router']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['router']->value;?>
" <?php if (in_array($_smarty_tpl->tpl_vars['router']->value,$_smarty_tpl->tpl_vars['rts']->value)) {?>selected<?php }?>><?php echo Lang::T($_smarty_tpl->tpl_vars['router']->value);?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-search"></i>
                        Apply Filter
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-9">
        <span id="chart_area" class="hidden">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pie-chart"></i>
                        Analytics Overview
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="chart-container">
                                <h4 class="chart-title">Types</h4>
                                <canvas id="cart_type"></canvas>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="chart-container">
                                <h4 class="chart-title">Plans</h4>
                                <canvas id="cart_plan"></canvas>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="chart-container">
                                <h4 class="chart-title">Methods</h4>
                                <canvas id="cart_method"></canvas>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="chart-container">
                                <h4 class="chart-title">Routers</h4>
                                <canvas id="cart_router"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-line-chart"></i>
                        Trends: <?php echo Lang::dateFormat($_smarty_tpl->tpl_vars['sd']->value);?>
 - <?php echo Lang::dateFormat($_smarty_tpl->tpl_vars['ed']->value);?>

                        <small class="label label-info"><?php echo Lang::T('Max 30 days');?>
</small>
                    </h3>
                </div>
                <div class="panel-body" style="height: 350px; padding: 20px;">
                    <canvas id="line_cart"></canvas>
                </div>
            </div>
        </span>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-table"></i>
                    Detailed Report
                </h3>
                <div class="btn-group">
                    <a href="<?php echo Text::url('export/print-by-date&');
echo $_smarty_tpl->tpl_vars['filter']->value;?>
" class="btn btn-default btn-xs" target="_blank">
                        <i class="fa fa-print"></i> Print
                    </a>
                    <a href="<?php echo Text::url('export/pdf-by-date&');
echo $_smarty_tpl->tpl_vars['filter']->value;?>
" class="btn btn-danger btn-xs">
                        <i class="fa fa-file-pdf-o"></i> PDF
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th><i class="fa fa-user"></i> <?php echo Lang::T('Username');?>
</th>
                            <th><i class="fa fa-tag"></i> <?php echo Lang::T('Type');?>
</th>
                            <th><i class="fa fa-server"></i> <?php echo Lang::T('Plan Name');?>
</th>
                            <th class="text-right"><i class="fa fa-money"></i> <?php echo Lang::T('Plan Price');?>
</th>
                            <th><i class="fa fa-calendar"></i> <?php echo Lang::T('Created On');?>
</th>
                            <th><i class="fa fa-clock-o"></i> <?php echo Lang::T('Expires On');?>
</th>
                            <th><i class="fa fa-credit-card"></i> <?php echo Lang::T('Method');?>
</th>
                            <th><i class="fa fa-router"></i> <?php echo Lang::T('Routers');?>
</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                            <tr>
                                <td><strong><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</strong></td>
                                <td>
                                    <span class="label label-primary"><?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>
</span>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_name'];?>
</td>
                                <td class="text-right">
                                    <strong class="text-success"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</strong>
                                </td>
                                <td>
                                    <small><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['recharged_on'],$_smarty_tpl->tpl_vars['ds']->value['recharged_time']);?>
</small>
                                </td>
                                <td>
                                    <small><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expiration'],$_smarty_tpl->tpl_vars['ds']->value['time']);?>
</small>
                                </td>
                                <td>
                                    <span class="label label-default"><?php echo $_smarty_tpl->tpl_vars['ds']->value['method'];?>
</span>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];?>
</td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                    <tfoot>
                        <tr class="info">
                            <th colspan="3">
                                <i class="fa fa-calculator"></i>
                                <?php echo Lang::T('Total');?>

                            </th>
                            <th class="text-right">
                                <span class="label label-success"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['dr']->value);?>
</span>
                            </th>
                            <th colspan="4"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="panel-footer">
                <p class="text-center">
                    <small class="text-muted">
                        <i class="fa fa-info-circle"></i>
                        <?php echo Lang::T('All Transactions at Date');?>
:
                        <strong><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['sd']->value,$_smarty_tpl->tpl_vars['ts']->value);?>
 - <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ed']->value,$_smarty_tpl->tpl_vars['te']->value);?>
</strong>
                    </small>
                </p>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    .chart-container {
        background: white;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(139, 69, 19, 0.1);
        margin-bottom: 15px;
        text-align: center;
    }

    .chart-title {
        color: var(--dark-brown);
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        font-weight: 500;
        color: var(--dark-brown);
        margin: 10px 0;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        color: var(--dark-brown);
        font-weight: 600;
        margin-bottom: 5px;
        display: block;
    }
</style>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chartjs-plugin-autocolors"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
    var isShow = false;

    // Enhanced Brown Color Palette for Charts
    const brownThemeColors = [
        '#8B4513', // Saddle Brown
        '#D2B48C', // Tan
        '#A0522D', // Sienna
        '#CD853F', // Peru
        '#DEB887', // Burly Wood
        '#F4A460', // Sandy Brown
        '#DAA520', // Goldenrod
        '#B8860B', // Dark Goldenrod
        '#D2691E', // Chocolate
        '#8B7355', // Khaki Dark
        '#A0522D', // Dark Sienna
        '#CD853F', // Light Peru
        '#BC8F8F', // Rosy Brown
        '#F5DEB3', // Wheat
        '#FFEFD5', // Papaya Whip
    ];

    const brownGradients = [
        'linear-gradient(45deg, #8B4513, #D2B48C)',
        'linear-gradient(45deg, #A0522D, #DEB887)',
        'linear-gradient(45deg, #CD853F, #F4A460)',
        'linear-gradient(45deg, #DAA520, #B8860B)',
        'linear-gradient(45deg, #D2691E, #BC8F8F)',
    ];

    function showFilter() {
        if (isShow) {
            $("#filter_box").addClass("hidden-xs hidden-sm hidden-md");
            isShow = false;
        } else {
            $("#filter_box").removeClass("hidden-xs hidden-sm hidden-md");
            isShow = true;
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Custom brown theme options for pie charts
        var pieOptions = {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 1.2,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 12,
                        boxHeight: 12,
                        padding: 15,
                        usePointStyle: true,
                        font: {
                            size: 11,
                            weight: '500'
                        },
                        color: '#654321'
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(139, 69, 19, 0.9)',
                    titleColor: '#F5E6D3',
                    bodyColor: '#F5E6D3',
                    borderColor: '#D2B48C',
                    borderWidth: 2,
                    cornerRadius: 8,
                    displayColors: true,
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed * 100) / total).toFixed(1);
                            return `${context.label}: ${context.parsed} (${percentage}%)`;
                        }
                    }
                }
            },
            elements: {
                arc: {
                    borderWidth: 3,
                    borderColor: '#ffffff',
                    hoverBorderWidth: 4,
                    hoverBorderColor: '#8B4513'
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true,
                duration: 1000,
                easing: 'easeInOutQuart'
            }
        };

        // Line chart options with brown theme
        var lineOptions = {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Date',
                        color: '#654321',
                        font: {
                            size: 12,
                            weight: '600'
                        }
                    },
                    grid: {
                        color: 'rgba(139, 69, 19, 0.1)',
                        borderColor: '#D2B48C',
                    },
                    ticks: {
                        color: '#654321',
                        font: {
                            size: 11
                        }
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Amount',
                        color: '#654321',
                        font: {
                            size: 12,
                            weight: '600'
                        }
                    },
                    grid: {
                        color: 'rgba(139, 69, 19, 0.1)',
                        borderColor: '#D2B48C',
                    },
                    ticks: {
                        color: '#654321',
                        font: {
                            size: 11
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        boxWidth: 15,
                        boxHeight: 15,
                        padding: 20,
                        usePointStyle: true,
                        font: {
                            size: 12,
                            weight: '500'
                        },
                        color: '#654321'
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(139, 69, 19, 0.95)',
                    titleColor: '#F5E6D3',
                    bodyColor: '#F5E6D3',
                    borderColor: '#D2B48C',
                    borderWidth: 2,
                    cornerRadius: 8,
                    displayColors: true,
                    titleFont: {
                        size: 13,
                        weight: '600'
                    },
                    bodyFont: {
                        size: 12
                    }
                }
            },
            elements: {
                line: {
                    tension: 0.4,
                    borderWidth: 3,
                },
                point: {
                    radius: 5,
                    hoverRadius: 8,
                    borderWidth: 2,
                    hoverBorderWidth: 3
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        };

        function create_cart(field, labels, datas, options) {
            const ctx = document.getElementById(field);
            if (!ctx) return;

            // Apply brown theme colors to pie charts
            const backgroundColors = labels.map((_, index) =>
                brownThemeColors[index % brownThemeColors.length]
            );

            const hoverColors = labels.map((_, index) => {
                const color = brownThemeColors[index % brownThemeColors.length];
                return adjustBrightness(color, 20);
            });

            new Chart(ctx, {
                type: 'doughnut', // Changed from pie to doughnut for modern look
                data: {
                    labels: labels,
                    datasets: [{
                        data: datas,
                        backgroundColor: backgroundColors,
                        hoverBackgroundColor: hoverColors,
                        borderWidth: 3,
                        borderColor: '#ffffff',
                        hoverBorderColor: '#8B4513',
                        hoverBorderWidth: 4
                    }]
                },
                options: options
            });
        }

        function adjustBrightness(hex, percent) {
            const num = parseInt(hex.replace("#", ""), 16);
            const amt = Math.round(2.55 * percent);
            const R = (num >> 16) + amt;
            const G = (num >> 8 & 0x00FF) + amt;
            const B = (num & 0x0000FF) + amt;
            return "#" + (0x1000000 + (R < 255 ? R < 1 ? 0 : R : 255) * 0x10000 +
                (G < 255 ? G < 1 ? 0 : G : 255) * 0x100 +
                (B < 255 ? B < 1 ? 0 : B : 255)).toString(16).slice(1);
        }

        function showChart() {
            // Show loading animation
            $("#chart_area").removeClass("hidden").hide().fadeIn(800);

            // Get charts one by one with enhanced styling
            $.getJSON("<?php echo Text::url('reports/ajax/type&',$_smarty_tpl->tpl_vars['filter']->value);?>
", function(data) {
                create_cart('cart_type', data.labels, data.datas, pieOptions);

                $.getJSON("<?php echo Text::url('reports/ajax/plan&',$_smarty_tpl->tpl_vars['filter']->value);?>
", function(data) {
                    create_cart('cart_plan', data.labels, data.datas, pieOptions);

                    $.getJSON("<?php echo Text::url('reports/ajax/method&',$_smarty_tpl->tpl_vars['filter']->value);?>
", function(data) {
                        create_cart('cart_method', data.labels, data.datas, pieOptions);

                        $.getJSON("<?php echo Text::url('reports/ajax/router&',$_smarty_tpl->tpl_vars['filter']->value);?>
", function(data) {
                            create_cart('cart_router', data.labels, data.datas, pieOptions);
                            getLineChartData();
                        });
                    });
                });
            });
        }

        function getLineChartData() {
            $.getJSON("<?php echo Text::url('reports/ajax/line&',$_smarty_tpl->tpl_vars['filter']->value);?>
", function(data) {
                const ctx = document.getElementById('line_cart');
                if (!ctx) return;

                // Apply brown theme colors to line chart datasets
                const enhancedData = data.datas.map((dataset, index) => {
                    const colorIndex = index % brownThemeColors.length;
                    const baseColor = brownThemeColors[colorIndex];

                    return {
                        ...dataset,
                        borderColor: baseColor,
                        backgroundColor: baseColor + '20', // Add transparency
                        pointBackgroundColor: baseColor,
                        pointBorderColor: '#ffffff',
                        pointHoverBackgroundColor: '#ffffff',
                        pointHoverBorderColor: baseColor,
                        fill: false,
                        tension: 0.4
                    };
                });

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: enhancedData,
                    },
                    options: lineOptions
                });
            });
        }

        // Check if charts should be shown
        if (getCookie('show_report_graph') != 'hide') {
            $("#chart_area").removeClass("hidden");
            document.getElementById('show_chart').checked = true;
            showChart();
        }
    });

    function setShowChart() {
        if (document.getElementById('show_chart').checked) {
            setCookie('show_report_graph', 'show', 30);
        } else {
            setCookie('show_report_graph', 'hide', 30);
        }
        location.reload();
    }
<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
