<?php
/* Smarty version 4.5.3, created on 2025-07-12 08:45:04
  from '/var/www/html/alpha/ui/ui/admin/reports/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6871f6606ffe76_12908234',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '724d44652df6b6c02006470e06811c902d0bd8a8' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/reports/list.tpl',
      1 => 1742413432,
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
function content_6871f6606ffe76_12908234 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- reports-daily -->
<div class="row">
    <div class="col-lg-3">
        <form method="get" class="form">
            <div class="box box-primary box-solid">
                <div class="box-header" onclick="showFilter()" style=" cursor: pointer;">
                    <h3 class="box-title"><?php echo Lang::T('Filter');?>
</h3>
                </div>
                <div id="filter_box" class="box-body hidden-xs hidden-sm hidden-md">
                    <center>
                        <label>
                            <input type="checkbox" id="show_chart" onclick="return setShowChart()">
                            <?php echo Lang::T('Show chart');?>

                        </label>
                    </center>
                    <hr style="margin: 1px;">
                    <input type="hidden" name="_route" value="reports">
                    <label><?php echo Lang::T('Start Date');?>
</label>
                    <input type="date" class="form-control" name="sd" value="<?php echo $_smarty_tpl->tpl_vars['sd']->value;?>
">
                    <label><?php echo Lang::T('Start time');?>
</label>
                    <input type="time" class="form-control" name="ts" value="<?php echo $_smarty_tpl->tpl_vars['ts']->value;?>
">
                    <label><?php echo Lang::T('End Date');?>
</label>
                    <input type="date" class="form-control" name="ed" value="<?php echo $_smarty_tpl->tpl_vars['ed']->value;?>
">
                    <label><?php echo Lang::T('End Time');?>
</label>
                    <input type="time" class="form-control" name="te" value="<?php echo $_smarty_tpl->tpl_vars['te']->value;?>
">
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
                    <input type="submit" class="btn btn-success btn-block">
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-9">
        <span id="chart_area" class="hidden">
            <div class="box box-primary box-solid">
                <div class="box-body row">
                    <div class="col-md-3 col-xs-6">
                        <canvas id="cart_type"></canvas>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <canvas id="cart_plan"></canvas>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <canvas id="cart_method"></canvas>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <canvas id="cart_router"></canvas>
                    </div>
                </div>
            </div>
            <div class="box box-primary box-solid">
                <div class="box-header">
                    <h3 class="box-title"><?php echo Lang::dateFormat($_smarty_tpl->tpl_vars['sd']->value);?>
 - <?php echo Lang::dateFormat($_smarty_tpl->tpl_vars['ed']->value);?>

                        <sup><?php echo Lang::T('Max 30 days');?>
</sup>
                    </h3>
                </div>
                <div class="box-body row" style="height: 300px;">
                    <canvas id="line_cart"></canvas>
                </div>
            </div>
        </span>
        <div class="box box-primary box-solid">
            <div class="table-responsive">&nbsp;&nbsp;
                <div style="margin-left: 5px; margin-right: 5px;">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>
                                    <a href="<?php echo Text::url('export/print-by-date&');
echo $_smarty_tpl->tpl_vars['filter']->value;?>
" class="btn btn-default"
                                        target="_blank"><i class="ion ion-printer"></i></a>
                                    <a href="<?php echo Text::url('export/pdf-by-date&');
echo $_smarty_tpl->tpl_vars['filter']->value;?>
" class="btn btn-default"><i
                                            class="fa fa-file-pdf-o"></i></a>
                                </th>
                                <th colspan="7"></th>
                            </tr>
                            <tr>
                                <th><?php echo Lang::T('Username');?>
</th>
                                <th><?php echo Lang::T('Type');?>
</th>
                                <th><?php echo Lang::T('Plan Name');?>
</th>
                                <th><?php echo Lang::T('Plan Price');?>
</th>
                                <th><?php echo Lang::T('Created On');?>
</th>
                                <th><?php echo Lang::T('Expires On');?>
</th>
                                <th><?php echo Lang::T('Method');?>
</th>
                                <th><?php echo Lang::T('Routers');?>
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
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_name'];?>
</td>
                                    <td class="text-right"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                                    <td><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['recharged_on'],$_smarty_tpl->tpl_vars['ds']->value['recharged_time']);?>
</td>
                                    <td><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expiration'],$_smarty_tpl->tpl_vars['ds']->value['time']);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['method'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];?>
</td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <tr>
                                <th><?php echo Lang::T('Total');?>
</th>
                                <td colspan="2"></td>
                                <th class="text-right"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['dr']->value);?>
</th>
                                <td colspan="4"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer">
                <p class="text-center small text-info"><?php echo Lang::T('All Transactions at Date');?>
:
                    <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['sd']->value,$_smarty_tpl->tpl_vars['ts']->value);?>
 - <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ed']->value,$_smarty_tpl->tpl_vars['te']->value);?>
</p>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="bs-callout bs-callout-warning bg-gray">
    <h4><?php echo Lang::T('Information');?>
</h4>
    <p><?php echo Lang::T('Export and Print will show all data without pagination');?>
.</p>
</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chartjs-plugin-autocolors"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
>
        var isShow = false;

        function showFilter() {
            if (isShow) {
                $("#filter_box").addClass("hidden-xs");
                $("#filter_box").addClass("hidden-sm");
                $("#filter_box").addClass("hidden-md");
                isShow = false;
            } else {
                // remove class
                $("#filter_box").removeClass("hidden-xs");
                $("#filter_box").removeClass("hidden-sm");
                $("#filter_box").removeClass("hidden-md");
                isShow = true;
            }
        }
        document.addEventListener("DOMContentLoaded", function() {
        const autocolors = window['chartjs-plugin-autocolors'];
        Chart.register(autocolors);
        var options = {
        responsive: true,
        aspectRatio: 1,
        plugins: {
            autocolors: {
                mode: 'data'
            },
            legend: {
                position: 'bottom',
                labels: {
                    boxWidth: 15
                }
            }
        }
        };

        function create_cart(field, labels, datas, options) {
        new Chart(document.getElementById(field), {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: datas,
                    borderWidth: 1
                }]
            },
            options: options
        });
        }

        function showChart() {
        // get cart one by one
        $.getJSON("<?php echo Text::url('reports/ajax/type&',$_smarty_tpl->tpl_vars['filter']->value);?>
", function( data ) {
        create_cart('cart_type', data.labels, data.datas, options);
        $.getJSON("<?php echo Text::url('reports/ajax/plan&',$_smarty_tpl->tpl_vars['filter']->value);?>
", function( data ) {
        create_cart('cart_plan', data.labels, data.datas, options);
        $.getJSON("<?php echo Text::url('reports/ajax/method&',$_smarty_tpl->tpl_vars['filter']->value);?>
", function( data ) {
        create_cart('cart_method', data.labels, data.datas, options);
        $.getJSON("<?php echo Text::url('reports/ajax/router&',$_smarty_tpl->tpl_vars['filter']->value);?>
", function( data ) {
        create_cart('cart_router', data.labels, data.datas, options);
        getLineChartData();
        });
        });
        });
        });
        }

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

        function getLineChartData() {
            $.getJSON("<?php echo Text::url('reports/ajax/line&',$_smarty_tpl->tpl_vars['filter']->value);?>
", function( data ) {
            var linechart = new Chart(document.getElementById('line_cart'), {
                type: 'line',
                data: {
                    labels: data.labels,
                    datasets: data.datas,
                },
                options: {
                    maintainAspectRatio: false,
                    aspectRatio: 1,
                    plugins: {
                        autocolors: {
                            mode: 'data'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });
        }
        // [{
        //     label: 'a',
        //     data: [8, 3, 9, 2, 7, 4, 2]
        // }, {
        //     label: 'b',
        //     data: [6, 4, 5, 5, 9, 6, 3]
        // }, {
        //     label: 'c',
        //     data: [5, 2, 3, 6, 4, 8, 6]
        // }]
    <?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
