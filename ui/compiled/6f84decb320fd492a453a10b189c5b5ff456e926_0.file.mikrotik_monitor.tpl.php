<?php
/* Smarty version 4.5.3, created on 2025-08-29 07:16:50
  from '/var/www/html/example/system/plugin/ui/mikrotik_monitor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b129b26bb591_53877886',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f84decb320fd492a453a10b189c5b5ff456e926' => 
    array (
      0 => '/var/www/html/example/system/plugin/ui/mikrotik_monitor.tpl',
      1 => 1733916616,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68b129b26bb591_53877886 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<style>
    /* Styles for overall layout and responsiveness */
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .container {
        margin-top: 20px;
        background-color: #d8dfe5;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 98%;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }

    /* Styles for table and pagination */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table th {
        vertical-align: middle;
        border-color: #dee2e6;
        background-color: #343a40;
        color: #fff;
    }

    .table td {
        vertical-align: middle;
        border-color: #dee2e6;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .dataTables_length,
    .dataTables_filter {
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 4px;
    }

    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-item .page-link {
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
        margin: 0 2px;
        padding: 6px 12px;
        transition: background-color 0.3s, color 0.3s;
    }

    .pagination .page-item .page-link:hover {
        background-color: #e9ecef;
        color: #0056b3;
    }

    .pagination .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    /* Styles for log message badges */
    .badge {
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    .badge-danger {
        color: #721c24;
        background-color: #f8d7da;
    }

    .badge-success {
        color: #155724;
        background-color: #d4edda;
    }

    .badge-warning {
        color: #856404;
        background-color: #ffeeba;
    }

    .badge-info {
        color: #0c5460;
        background-color: #d1ecf1;
    }

    .badge:hover {
        opacity: 0.8;
    }

    @media screen and (max-width: 600px) {
        .container {
            overflow-x: auto;
        }
    }
</style>
<div class="box-body table-responsive no-padding">
    <div class="col-sm-12 col-md-12">
        <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_monitor_ui">
            <ul class="nav nav-tabs"> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['routers']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?> <li role="presentation" <?php if ($_smarty_tpl->tpl_vars['r']->value['id'] == $_smarty_tpl->tpl_vars['router']->value) {?>class="active" <?php }?>> <a
                        href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_monitor_ui/<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
</a>
                </li> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </ul>
        </form>
        <div class="panel">
            <div class="table-responsive" api-get-text="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_monitor_get_resources/<?php echo $_smarty_tpl->tpl_vars['router']->value;?>
">
                <center>
                    <br>
                    <br>
                    <img src="ui/ui/images/loading.gif">
                    <br>
                    <br>
                    <br>
                </center>
            </div>
            <!-- Progress Bars -->
            <div class="column-card-container" id="progress-bars">
                <!-- CPU Load Progress Bar -->
                <div class="column-card" id="cpu-load-bar">
                    <div class="column-card-header_progres"><?php echo Lang::T('CPU Load');?>
</div>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-success progress-animated" role="progressbar"
                            style="width: 0%; background-color: #5cb85c">0%</div>
                    </div>
                </div>
                <!-- Temperature Progress Bar -->
                <div class="column-card" id="temperature-bar">
                    <div class="column-card-header_progres"><?php echo Lang::T('Temperature');?>
</div>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-info progress-animated" role="progressbar"
                            style="width: 0%; background-color: #5cb85c">0°C</div>
                    </div>
                </div>
                <!-- Voltage Progress Bar -->
                <div class="column-card" id="voltage-bar">
                    <div class="column-card-header_progres"><?php echo Lang::T('Voltage');?>
</div>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-primary progress-animated" role="progressbar"
                            style="width: 0%; background-color: #5cb85c">0 V</div>
                    </div>
                </div>
            </div>
            <!-- End of Progress Bars -->
        </div>
        <div class="table-responsive">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_4" data-toggle="tab"><?php echo Lang::T('Wireless Status');?>
</a>
                    </li>
                    <li>
                        <a href="#tab_1" data-toggle="tab"><?php echo Lang::T('Interface Status');?>
</a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab"><?php echo Lang::T('Hotspot Online Users');?>
</a>
                    </li>
                    <li>
                        <a href="#tab_3" data-toggle="tab"><?php echo Lang::T('PPPoE Online Users');?>
</a>
                    </li>
                    <li>
                        <a href="#tab_5" data-toggle="tab"><?php echo Lang::T('Traffic Monitor');?>
</a>
                    </li>
                    <li>
                        <a href="#tab_6" data-toggle="tab"><?php echo Lang::T('Logs');?>
</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab_1">
                        <div class="box-body no-padding" id="">
                            <div class="table-responsive">
                                <div id="logsys-mikrotik" class="container">
                                    <div class="row">
                                        <table id="traffic-table" class="table table-bordered table-striped">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th><?php echo Lang::T('Interface Name');?>
</th>
                                                    <th><?php echo Lang::T('Tx (bytes Out)');?>
</th>
                                                    <th><?php echo Lang::T('Rx (bytes In)');?>
</th>
                                                    <th><?php echo Lang::T('Total Usage');?>
</th>
                                                    <th><?php echo Lang::T('Status');?>
</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="box-body no-padding" id="">
                            <div class="table-responsive">
                                <div id="logsys-mikrotik" class="container">
                                    <div class="row">
                                        <table class="table table-bordered table-striped" id="hotspot-table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th><?php echo Lang::T('Username');?>
</th>
                                                    <th><?php echo Lang::T('IP Address');?>
</th>
                                                    <th><?php echo Lang::T('Uptime');?>
</th>
                                                    <th><?php echo Lang::T('Server');?>
</th>
                                                    <th><?php echo Lang::T('Mac Address');?>
</th>
                                                    <th><?php echo Lang::T('Session Time Left');?>
</th>
                                                    <th><?php echo Lang::T('Upload (RX)');?>
</th>
                                                    <th><?php echo Lang::T('Download (TX)');?>
</th>
                                                    <th><?php echo Lang::T('Total Usage');?>
</th>
                                                    <!--  <th>Action</th>  -->
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div style="overflow-x:auto;" class="tab-pane" id="tab_3">
                        <div class="box-body no-padding" id="">
                            <div class="table-responsive">
                                <div id="logsys-mikrotik" class="container">
                                    <div class="row">
                                        <table class="table table-bordered table-striped" id="ppp-table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th><?php echo Lang::T('Username');?>
</th>
                                                    <th><?php echo Lang::T('IP Address');?>
</th>
                                                    <th><?php echo Lang::T('Uptime');?>
</th>
                                                    <th><?php echo Lang::T('Service');?>
</th>
                                                    <th><?php echo Lang::T('Caller ID');?>
</th>
                                                    <th><?php echo Lang::T('Download');?>
</th>
                                                    <th><?php echo Lang::T('Upload');?>
</th>
                                                    <th><?php echo Lang::T('Total Usage');?>
</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_4">
                        <div class="box-body no-padding" id="">
                            <div class="table-responsive">
                                <div id="logsys-mikrotik" class="container">
                                    <div class="row">
                                        <table class="table table-bordered table-striped" id="signal-table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th><?php echo Lang::T('Interface');?>
</th>
                                                    <th><?php echo Lang::T('Mac Address');?>
</th>
                                                    <th><?php echo Lang::T('Uptime');?>
</th>
                                                    <th><?php echo Lang::T('Last Ip');?>
</th>
                                                    <th><?php echo Lang::T('Last Activity');?>
</th>
                                                    <th><?php echo Lang::T('Signal Strength');?>
</th>
                                                    <th><?php echo Lang::T('Tx / Rx CCQ');?>
</th>
                                                    <th><?php echo Lang::T('Rx Rate');?>
</th>
                                                    <th><?php echo Lang::T('Tx Rate');?>
</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_5">
                        <div class="box-body no-padding" id="">
                            <div class="table-responsive">
                                <div id="logsys-mikrotik" class="container">
                                    <div class="row">
                                        <table class="table table-bordered table-striped">
                                            <thead class="thead-dark">
                                                <th><?php echo Lang::T('Interace');?>
</th>
                                                <th><?php echo Lang::T('TX');?>
</th>
                                                <th><?php echo Lang::T('RX');?>
</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select name="interface" id="interface">
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['interfaces']->value, 'interface');
$_smarty_tpl->tpl_vars['interface']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['interface']->value) {
$_smarty_tpl->tpl_vars['interface']->do_else = false;
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['interface']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['interface']->value;?>

                                                            </option>
                                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div id="tabletx"></div>
                                                    </td>
                                                    <td>
                                                        <div id="tablerx"></div>
                                                    </td>
                                                </tr>
                                        </table>
                                        <canvas id="chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_6">
                        <div class="box-body no-padding" id="">
                            <div class="table-responsive">
                                <div id="logsys-mikrotik" class="container">
                                    <div class="row">
                                        <table id="logTable" class="table table-bordered table-striped">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th><?php echo Lang::T('Date/Time');?>
</th>
                                                    <th><?php echo Lang::T('Topic');?>
</th>
                                                    <th><?php echo Lang::T('Message');?>
</th>
                                                </tr>
                                            </thead>
                                            <tbody id="logTableBody">
                                                <!-- Table rows will be populated here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
>

            <?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
>
                var $j = jQuery.noConflict(); // Use $j as an alternative to $

                function fetchData() {
                    return $j.ajax({
                        url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_monitor_get_resources_json<?php echo $_smarty_tpl->tpl_vars['routes']->value;?>
', // Ganti dengan URL yang sesuai untuk mendapatkan data real-time
                        method: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $j('#cpu-load-bar .progress-bar').css('width', data.cpu_load + '%').text(data.cpu_load + '%');
                            $j('#temperature-bar .progress-bar').css('width', data.temperature + '%').text(data.temperature + '°C');
                            $j('#voltage-bar .progress-bar').css('width', data.voltage + '%').text(data.voltage + ' V');
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error:', error);
                        }
                    });
                }

                function fetchTrafficData() {
                    return $j.ajax({
                        url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_monitor_get_traffic/<?php echo $_smarty_tpl->tpl_vars['router']->value;?>
',
                        method: 'GET',
                        success: function (response) {
                            $j('#traffic-table').DataTable().clear().rows.add(response).draw();
                        },
                        error: function (xhr, error, thrown) {
                            console.log('AJAX error:', error);
                        }
                    });
                }

                function fetchUserListData() {
                    var table = $j('#ppp-table').DataTable({
                        columns: [
                            { data: 'username' },
                            { data: 'address' },
                            { data: 'uptime' },
                            { data: 'service' },
                            { data: 'caller_id' },
                            { data: 'tx' },
                            { data: 'rx' },
                            { data: 'total' },
                        ]
                    });
                    return $j.ajax({
                        url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_monitor_get_ppp_online_users/<?php echo $_smarty_tpl->tpl_vars['router']->value;?>
',
                        method: 'GET',
                        success: function (response) {
                            table.clear().rows.add(response).draw();
                        },
                        error: function (xhr, error, thrown) {
                            console.log('AJAX error:', error);
                        },
                    });
                }

                function fetchHotspotListData() {
                    var table = $j('#hotspot-table').DataTable({
                        columns: [
                            { data: 'username' },
                            { data: 'address' },
                            { data: 'uptime' },
                            { data: 'server' },
                            { data: 'mac' },
                            { data: 'session_time' },
                            { data: 'tx_bytes' },
                            { data: 'rx_bytes' },
                            { data: 'total' },
                        ]
                    });
                    return $j.ajax({
                        url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_monitor_get_hotspot_online_users/<?php echo $_smarty_tpl->tpl_vars['router']->value;?>
',
                        method: 'GET',
                        success: function (response) {
                            table.clear().rows.add(response).draw();
                        },
                        error: function (xhr, error, thrown) {
                            console.log('AJAX error:', error);
                        },
                    });
                }

                function fetchSignalListData() {
                    var table = $j('#signal-table').DataTable({
                        columns: [
                            { data: 'interface' },
                            { data: 'mac_address' },
                            { data: 'uptime' },
                            { data: 'last_ip' },
                            { data: 'last_activity' },
                            { data: 'signal_strength' },
                            { data: 'tx_ccq' },
                            { data: 'rx_rate' },
                            { data: 'tx_rate' }
                        ]
                    });
                    return $j.ajax({
                        url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_monitor_get_wlan/<?php echo $_smarty_tpl->tpl_vars['router']->value;?>
',
                        method: 'GET',
                        success: function (response) {
                            table.clear().rows.add(response).draw();
                        },
                        error: function (xhr, error, thrown) {
                            console.log('AJAX error:', error);
                        }
                    });
                }

                function disconnectUser(username) {
                    console.log('Disconnect user:', username);
                }

                var chart;
                var chartData = {
                    labels: [],
                    txData: [],
                    rxData: []
                };

                function createChart() {
                    var ctx = document.getElementById('chart').getContext('2d');
                    chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: chartData.labels,
                            datasets: [{
                                label: 'TX',
                                data: chartData.txData,
                                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 0,
                                tension: 0.4,
                                fill: 'start'
                            },
                            {
                                label: 'RX',
                                data: chartData.rxData,
                                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 0,
                                tension: 0.4,
                                fill: 'start'
                            }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: 'Time'
                                    }
                                },
                                y: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: 'Live Traffic'
                                    },
                                    ticks: {
                                        callback: function (value) {
                                            return formatBytes(value);
                                        }
                                    }
                                }
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function (context) {
                                            var label = context.dataset.label || '';
                                            var value = context.parsed.y || 0;
                                            return label + ': ' + formatBytes(value) + 'ps';
                                        }
                                    }
                                }
                            },
                            elements: {
                                point: {
                                    radius: 0,
                                    hoverRadius: 0
                                },
                                line: {
                                    tension: 0
                                }
                            }
                        }
                    });
                }

                function formatBytes(bytes) {
                    if (bytes === 0) return '0 B';
                    var k = 1024;
                    var sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
                    var i = Math.floor(Math.log(bytes) / Math.log(k));
                    var formattedValue = parseFloat((bytes / Math.pow(k, i)).toFixed(2));
                    return formattedValue + ' ' + sizes[i];
                }

                function updateTrafficValues() {
                    var interface = $j('#interface').val();
                    $j.ajax({
                        url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_monitor_traffic_update/<?php echo $_smarty_tpl->tpl_vars['router']->value;?>
',
                        dataType: 'json',
                        data: {
                            interface: interface
                        },
                        success: function (data) {
                            var labels = data.labels;
                            var txData = data.rows.tx;
                            var rxData = data.rows.rx;
                            if (txData.length > 0 && rxData.length > 0) {
                                var TX = parseInt(txData[0]);
                                var RX = parseInt(rxData[0]);
                                chartData.labels.push(labels[0]);
                                chartData.txData.push(TX);
                                chartData.rxData.push(RX);
                                var maxDataPoints = 10;
                                if (chartData.labels.length > maxDataPoints) {
                                    chartData.labels.shift();
                                    chartData.txData.shift();
                                    chartData.rxData.shift();
                                }
                                chart.update();
                                document.getElementById("tabletx").textContent = formatBytes(TX);
                                document.getElementById("tablerx").textContent = formatBytes(RX);
                            } else {
                                document.getElementById("tabletx").textContent = "0";
                                document.getElementById("tablerx").textContent = "0";
                            }
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            console.error("Status: " + textStatus + " request: " + XMLHttpRequest);
                            console.error("Error: " + errorThrown);
                        }
                    });
                }

                function startRefresh() {
                    setInterval(updateTrafficValues, 2000);
                }

                $j(document).ready(function () {
                    $j('#traffic-table').DataTable({
                        columns: [
                            { data: 'name' },
                            { data: 'tx' },
                            { data: 'rx' },
                            { data: 'total' },
                            { data: 'status' }
                        ]
                    });

                    fetchData()
                        .then(fetchTrafficData)
                        .then(fetchUserListData)
                        .then(fetchHotspotListData)
                        .then(fetchSignalListData)
                        .then(fetchLogs)
                        .then(function () {
                            createChart();
                            startRefresh();
                            $j('#interface').on('input', function () {
                                updateTrafficValues();
                            });
                        });
                });
            <?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
>
                window.addEventListener('DOMContentLoaded', function () {
                    var portalLink = "https://github.com/focuslinkstech";
                    $('#version').html('MikroTik Monitor | Ver: 3.0 | by: <a href="' + portalLink + '">Focuslinks Tech</a>');
                });
            <?php echo '</script'; ?>
>

            <?php echo '<script'; ?>
>
                var $j = jQuery.noConflict();

                async function fetchLogs() {
                    const logTableBody = $j('#logTableBody');
                    logTableBody.empty();

                    try {
                        // Fetch logs from the API
                        const response = await fetch('<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_monitor_getLogs&routerId=<?php echo $_smarty_tpl->tpl_vars['router']->value;?>
');
                        if (!response.ok) {
                            throw new Error('Network response was not ok: ' + response.statusText);
                        }

                        const logs = await response.json();
                        console.log(logs);

                        logs.reverse().forEach(log => {
                            const row = document.createElement('tr');
                            row.classList.add('log-entry');

                            // Create date/time cell
                            const timeCell = document.createElement('td');
                            timeCell.textContent = log.time || 'N/A';
                            row.appendChild(timeCell);

                            // Create topic cell
                            const topicCell = document.createElement('td');
                            topicCell.textContent = log.topics || 'N/A';
                            row.appendChild(topicCell);

                            // Create message cell with badge
                            const messageCell = document.createElement('td');
                            const messageBadge = document.createElement('span');
                            messageBadge.classList.add('badge');

                            // Use a safe check for the message
                            const message = log.message || 'No message available';
                            const messageLower = message.toLowerCase();

                            if (messageLower.includes('failed')) {
                                messageBadge.classList.add('badge-danger');
                                messageBadge.textContent = 'Error';
                            } else if (messageLower.includes('trying')) {
                                messageBadge.classList.add('badge-warning');
                                messageBadge.textContent = 'Warning';
                            } else if (messageLower.includes('logged in')) {
                                messageBadge.classList.add('badge-success');
                                messageBadge.textContent = 'Success';
                            } else if (messageLower.includes('login failed')) {
                                messageBadge.classList.add('badge-info');
                                messageBadge.textContent = 'Login Info';
                            } else {
                                messageBadge.classList.add('badge-info');
                                messageBadge.textContent = 'Info';
                            }

                            messageCell.appendChild(messageBadge);
                            messageCell.appendChild(document.createTextNode(' ' + message));
                            row.appendChild(messageCell);
                            logTableBody.append(row);
                        });

                        // Destroy existing DataTable instance if it exists
                        if ($j.fn.DataTable.isDataTable('#logTable')) {
                            $j('#logTable').DataTable().destroy();
                        }

                        // Reinitialize DataTable
                        $j('#logTable').DataTable({
                            "pagingType": "full_numbers",
                            "order": [
                                [0, 'desc']
                            ]
                        });

                    } catch (error) {
                        console.error('Error fetching logs:', error);
                    }
                }
            <?php echo '</script'; ?>
>

            <?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
