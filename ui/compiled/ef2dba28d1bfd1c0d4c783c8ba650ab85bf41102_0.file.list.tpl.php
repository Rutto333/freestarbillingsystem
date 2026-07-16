<?php
/* Smarty version 4.5.3, created on 2025-09-24 14:11:58
  from '/var/www/html/demo/ui/ui/admin/reports/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68d3d1fe6d7886_68984006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef2dba28d1bfd1c0d4c783c8ba650ab85bf41102' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/reports/list.tpl',
      1 => 1758712286,
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
function content_68d3d1fe6d7886_68984006 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- reports-daily -->


<style>
/* Google-inspired Color Palette */
:root {
    --google-blue: #4285F4;
    --google-green: #34A853;
    --google-yellow: #FBBC05;
    --google-red: #EA4335;
    --white: #FFFFFF;
    --black: #000000;
    --gray-50: #f9f9f9;
    --gray-100: #f5f5f5;
    --gray-200: #eeeeee;
    --gray-300: #e0e0e0;
    --text-dark: #202124;
    --text-light: #5f6368;
}

/* Panel styling */
.panel-primary {
    border-color: var(--google-blue);
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(66, 133, 244, 0.15);
}
.panel-primary > .panel-heading {
    background: linear-gradient(135deg, var(--google-blue), #679ef5);
    color: var(--white);
    font-weight: 600;
    border-radius: 10px 10px 0 0;
    border-bottom: 2px solid var(--google-blue);
}
.panel-primary > .panel-heading .panel-title {
    font-size: 1rem;
    letter-spacing: 0.3px;
    color: var(--white);
}
.panel-primary > .panel-body {
    background: var(--white);
    padding: 20px;
    border-radius: 0 0 10px 10px;
}

/* Table styling */
.table thead th {
    background: var(--gray-100);
    color: var(--text-dark);
    font-weight: 600;
    border-bottom: 2px solid var(--gray-200);
}
.table tbody tr:hover {
    background: var(--gray-50);
}
.table tfoot tr {
    background: var(--gray-100);
    font-weight: bold;
    color: var(--text-dark);
}

/* Labels */
.label-primary {
    background: var(--google-blue);
    border-radius: 4px;
    padding: 3px 8px;
    color: var(--white);
}
.label-default {
    background: var(--gray-200);
    color: var(--text-dark);
}
.label-success {
    background: var(--google-green);
    color: var(--white);
}
.label-warning {
    background: var(--google-yellow);
    color: var(--black);
}
.label-danger {
    background: var(--google-red);
    color: var(--white);
}

/* Buttons */
.btn-primary {
    background: var(--google-blue);
    border-color: #3367d6;
    color: var(--white);
    font-weight: 500;
    border-radius: 6px;
    transition: all 0.2s ease-in-out;
}
.btn-primary:hover {
    background: #3367d6;
    border-color: #2a56c6;
}
.btn-danger {
    background: var(--google-red);
    border-color: #d93025;
    color: var(--white);
    border-radius: 6px;
}
.btn-danger:hover {
    background: #d93025;
    border-color: #c5221f;
}

/* Filter box */
#filter_box {
    background: var(--gray-50);
    border-radius: 10px;
    padding: 15px;
    box-shadow: inset 0 1px 3px rgba(66, 133, 244, 0.15);
}

/* Form inputs */
.form-control {
    border: 1px solid var(--gray-300);
    border-radius: 6px;
    padding: 8px 12px;
    background: var(--white);
    transition: border 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}
.form-control:focus {
    border-color: var(--google-blue);
    box-shadow: 0 0 6px rgba(66, 133, 244, 0.3);
}

/* Chart containers */
.chart-container {
    background: var(--white);
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(66, 133, 244, 0.1);
    margin-bottom: 20px;
    text-align: center;
}
.chart-title {
    color: var(--text-dark);
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Panel footer */
.panel-footer {
    background: var(--gray-50);
    border-top: 1px solid var(--gray-200);
    border-radius: 0 0 10px 10px;
    color: var(--text-light);
}

/* Checkbox and form styling */
.checkbox-label {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    font-weight: 500;
    color: var(--text-dark);
    margin: 10px 0;
}
.form-group {
    margin-bottom: 20px;
}
.form-group label {
    color: var(--text-dark);
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
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
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chartjs-plugin-autocolors"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var isShow = false;

    // Google-inspired Color Palette for Charts
    const googleColors = [
        '#4285F4', // Google Blue
        '#34A853', // Google Green
        '#FBBC05', // Google Yellow
        '#EA4335', // Google Red
        '#679EF5', // Lighter Blue
        '#8BC34A', // Lighter Green
        '#FFD600', // Lighter Yellow
        '#F44336', // Lighter Red
        '#1976D2', // Darker Blue
        '#2E7D32', // Darker Green
        '#FF9800', // Orange
        '#795548', // Brown
        '#9C27B0', // Purple
        '#00BCD4', // Cyan
        '#607D8B', // Blue-Gray
    ];

    // Chart options for pie/doughnut charts
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
                    color: '#202124'
                }
            },
            tooltip: {
                backgroundColor: 'rgba(66, 133, 244, 0.9)',
                titleColor: '#FFFFFF',
                bodyColor: '#FFFFFF',
                borderColor: '#4285F4',
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
                borderColor: '#FFFFFF',
                hoverBorderWidth: 4,
                hoverBorderColor: '#4285F4'
            }
        },
        animation: {
            animateScale: true,
            animateRotate: true,
            duration: 1000,
            easing: 'easeInOutQuart'
        }
    };

    // Chart options for line charts
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
                    color: '#202124',
                    font: {
                        size: 12,
                        weight: '600'
                    }
                },
                grid: {
                    color: 'rgba(66, 133, 244, 0.1)',
                    borderColor: '#4285F4',
                },
                ticks: {
                    color: '#202124',
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
                    color: '#202124',
                    font: {
                        size: 12,
                        weight: '600'
                    }
                },
                grid: {
                    color: 'rgba(66, 133, 244, 0.1)',
                    borderColor: '#4285F4',
                },
                ticks: {
                    color: '#202124',
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
                    color: '#202124'
                }
            },
            tooltip: {
                backgroundColor: 'rgba(66, 133, 244, 0.95)',
                titleColor: '#FFFFFF',
                bodyColor: '#FFFFFF',
                borderColor: '#4285F4',
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

    // Create chart function
    function create_cart(field, labels, datas, options) {
        const ctx = document.getElementById(field);
        if (!ctx) return;
        const backgroundColors = labels.map((_, index) =>
            googleColors[index % googleColors.length]
        );
        const hoverColors = labels.map((_, index) => {
            const color = googleColors[index % googleColors.length];
            return adjustBrightness(color, 20);
        });
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: datas,
                    backgroundColor: backgroundColors,
                    hoverBackgroundColor: hoverColors,
                    borderWidth: 3,
                    borderColor: '#FFFFFF',
                    hoverBorderColor: '#4285F4',
                    hoverBorderWidth: 4
                }]
            },
            options: options
        });
    }

    // Adjust brightness for hover effects
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

    // Show/hide filter box
    function showFilter() {
        if (isShow) {
            $("#filter_box").addClass("hidden-xs hidden-sm hidden-md");
            isShow = false;
        } else {
            $("#filter_box").removeClass("hidden-xs hidden-sm hidden-md");
            isShow = true;
        }
    }

    // Load and display charts
    function showChart() {
        $("#chart_area").removeClass("hidden").hide().fadeIn(800);
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

    // Load line chart data
    function getLineChartData() {
        $.getJSON("<?php echo Text::url('reports/ajax/line&',$_smarty_tpl->tpl_vars['filter']->value);?>
", function(data) {
            const ctx = document.getElementById('line_cart');
            if (!ctx) return;
            const enhancedData = data.datas.map((dataset, index) => {
                const colorIndex = index % googleColors.length;
                const baseColor = googleColors[colorIndex];
                return {
                    ...dataset,
                    borderColor: baseColor,
                    backgroundColor: baseColor + '20',
                    pointBackgroundColor: baseColor,
                    pointBorderColor: '#FFFFFF',
                    pointHoverBackgroundColor: '#FFFFFF',
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

    // Check if charts should be shown on load
    document.addEventListener("DOMContentLoaded", function() {
        if (getCookie('show_report_graph') != 'hide') {
            $("#chart_area").removeClass("hidden");
            document.getElementById('show_chart').checked = true;
            showChart();
        }
    });

    // Set cookie for chart visibility
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
