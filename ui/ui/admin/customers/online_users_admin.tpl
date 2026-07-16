{include file="sections/header.tpl"}

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                    <select id="routerSelect" class="form-control" onchange="changeRouter(this.value)">
                        {foreach $routers as $r}
                            <option value="{$r['id']}" {if $r['id'] eq $router_id}selected{/if}>
                                {$r['name']}
                            </option>
                        {/foreach}
                    </select>
                </div>
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm" onclick="refreshAllData()">
                        <i class="fa fa-refresh"></i> Refresh All
                    </button>
                    <button class="btn btn-success btn-sm" onclick="autoRefreshToggle()">
                        <i class="fa fa-play" id="autoRefreshIcon"></i>
                        <span id="autoRefreshText">Start Auto Refresh</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Combined Online Users Stats -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title text-center">
                    <i class="fa fa-users"></i> Online Users Summary
                </h3>
            </div>
            <div class="panel-body">
                <div class="row text-center">
                    <div class="col-xs-4">
                        <h3 class="text-success" id="pppoeUsersCount">
                            <i class="fa fa-spinner fa-spin"></i>
                        </h3>
                        <p><i class="fa fa-ethernet"></i><br>PPPoE Users</p>
                    </div>
                    <div class="col-xs-4">
                        <h3 class="text-warning" id="hotspotUsersCount">
                            <i class="fa fa-spinner fa-spin"></i>
                        </h3>
                        <p><i class="fa fa-wifi"></i><br>Hotspot Users</p>
                    </div>
                    <div class="col-xs-4">
                        <h3 class="text-primary" id="totalUsersCount">
                            <i class="fa fa-spinner fa-spin"></i>
                        </h3>
                        <p><i class="fa fa-globe"></i><br>Total Online</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Online Users Tables -->
<div class="row">
    <!-- PPPoE Users -->
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-ethernet"></i> PPPoE Online Users
                    <span class="pull-right">
                        <button class="btn btn-xs btn-default" onclick="refreshPPPoEUsers()">
                            <i class="fa fa-refresh"></i>
                        </button>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="pppoeTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>IP Address</th>
                                <th>Uptime</th>
                                <th>Upload</th>
                                <th>Download</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="pppoeTableBody">
                            <tr>
                                <td colspan="6" class="text-center">
                                    <i class="fa fa-spinner fa-spin"></i> Loading...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Hotspot Users -->
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-wifi"></i> Hotspot Online Users
                    <span class="pull-right">
                        <button class="btn btn-xs btn-default" onclick="refreshHotspotUsers()">
                            <i class="fa fa-refresh"></i>
                        </button>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="hotspotTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>IP Address</th>
                                <th>Uptime</th>
                                <th>Upload</th>
                                <th>Download</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="hotspotTableBody">
                            <tr>
                                <td colspan="6" class="text-center">
                                    <i class="fa fa-spinner fa-spin"></i> Loading...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Disconnect User Modal -->
<div class="modal fade" id="disconnectModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Disconnect User</h4>
            </div>
            <form action="{$_url}mikrotik-monitor/disconnect" method="POST">
                <div class="modal-body">
                    <p>Are you sure you want to disconnect user <strong id="disconnectUsername"></strong>?</p>
                    <input type="hidden" name="router_id" id="disconnectRouterId" value="{$router_id}">
                    <input type="hidden" name="username" id="disconnectUsernameInput">
                    <input type="hidden" name="user_type" id="disconnectUserType">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-power-off"></i> Disconnect
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{literal}
<script>
let autoRefreshInterval = null;
let isAutoRefreshing = false;
const REFRESH_INTERVAL = 30000; // 30 seconds

// Wait for jQuery to load before initializing
function initializePage() {
    if (typeof jQuery === 'undefined') {
        setTimeout(initializePage, 100);
        return;
    }

    jQuery(document).ready(function($) {
        console.log('jQuery loaded, initializing DataTables...');

        // Check if DataTables is available, if not load it
        if (typeof $.fn.DataTable === 'undefined') {
            // Load DataTables CSS and JS
            $('head').append('<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">');

            $.getScript('https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js')
                .done(function() {
                    console.log('DataTables loaded successfully');
                    initializeDataTables();
                })
                .fail(function() {
                    console.error('Failed to load DataTables');
                    // Continue without DataTables
                    loadOnlineUsers();
                });
        } else {
            initializeDataTables();
        }

        function initializeDataTables() {
            try {
                // Initialize DataTables
                $('#pppoeTable').DataTable({
                    "pageLength": 10,
                    "ordering": true,
                    "searching": true,
                    "info": true,
                    "responsive": true,
                    "destroy": true // Allow reinitialization
                });

                $('#hotspotTable').DataTable({
                    "pageLength": 10,
                    "ordering": true,
                    "searching": true,
                    "info": true,
                    "responsive": true,
                    "destroy": true // Allow reinitialization
                });

                console.log('DataTables initialized successfully');
            } catch (error) {
                console.error('Error initializing DataTables:', error);
            }

            // Load initial data
            loadOnlineUsers();
        }
    });
}

// Initialize when page loads
initializePage();

function changeRouter(routerId) {
    if (routerId) {
        window.location.href = '{/literal}{$appUrl}{literal}/?_route=mikrotik-monitor/' + routerId;
    }
}

function refreshAllData() {
    loadOnlineUsers();

    // Show success message if toastr is available
    if (typeof toastr !== 'undefined') {
        toastr.success('All data refreshed successfully');
    } else {
        alert('Data refreshed successfully');
    }
}

function autoRefreshToggle() {
    if (typeof jQuery === 'undefined') {
        alert('jQuery not loaded');
        return;
    }

    const icon = jQuery('#autoRefreshIcon');
    const text = jQuery('#autoRefreshText');

    if (isAutoRefreshing) {
        // Stop auto refresh
        clearInterval(autoRefreshInterval);
        autoRefreshInterval = null;
        isAutoRefreshing = false;
        icon.removeClass('fa-stop').addClass('fa-play');
        text.text('Start Auto Refresh');
        if (typeof toastr !== 'undefined') {
            toastr.info('Auto refresh stopped');
        }
    } else {
        // Start auto refresh
        autoRefreshInterval = setInterval(function() {
            loadOnlineUsers();
        }, REFRESH_INTERVAL);
        isAutoRefreshing = true;
        icon.removeClass('fa-play').addClass('fa-stop');
        text.text('Stop Auto Refresh');
        if (typeof toastr !== 'undefined') {
            toastr.success('Auto refresh started (every 30 seconds)');
        }
    }
}

function loadOnlineUsers() {
    if (typeof jQuery === 'undefined') {
        console.error('jQuery not available for AJAX call');
        return;
    }

    jQuery.ajax({
        url: '{/literal}{$appUrl}{literal}/?_route=mikrotik-monitor/api/online-users/{/literal}{$router_id}{literal}',
        method: 'GET',
        dataType: 'json',
        timeout: 10000,
        success: function(data) {
            console.log('Online users loaded:', data);
            updateOnlineUsersCount(data);
            updatePPPoETable(data.pppoe || []);
            updateHotspotTable(data.hotspot || []);
        },
        error: function(xhr, status, error) {
            console.error('Online users error:', xhr.responseText);
            jQuery('#pppoeTableBody').html('<tr><td colspan="6" class="text-center text-danger">Failed to load PPPoE users: ' + error + '</td></tr>');
            jQuery('#hotspotTableBody').html('<tr><td colspan="6" class="text-center text-danger">Failed to load Hotspot users: ' + error + '</td></tr>');
        }
    });
}

function updateOnlineUsersCount(data) {
    // Filter out entries without username
    const pppoeCount = data.pppoe ? data.pppoe.filter(u => u.username && u.username.trim() !== '').length : 0;
    const hotspotCount = data.hotspot ? data.hotspot.filter(u => u.username && u.username.trim() !== '').length : 0;
    const totalCount = pppoeCount + hotspotCount;

    if (typeof jQuery !== 'undefined') {
        jQuery('#pppoeUsersCount').html(pppoeCount);
        jQuery('#hotspotUsersCount').html(hotspotCount);
        jQuery('#totalUsersCount').html(totalCount);
    }
}

function updatePPPoETable(users) {
    if (typeof jQuery === 'undefined') return;

    const tbody = jQuery('#pppoeTableBody');
    tbody.empty();

    // Only keep users with a valid username
    const filteredUsers = users.filter(u => u.username && u.username.trim() !== '');

    if (filteredUsers.length === 0) {
        tbody.append('<tr><td colspan="6" class="text-center text-muted">No PPPoE users online</td></tr>');
        return;
    }

    filteredUsers.forEach(function(user) {
        const row = `
            <tr>
                <td><strong>${user.username}</strong></td>
                <td>${user.address || 'N/A'}</td>
                <td>${user.uptime || 'N/A'}</td>
                <td>${user.tx || 'N/A'}</td>
                <td>${user.rx || 'N/A'}</td>
                <td>
                    <button class="btn btn-xs btn-danger" onclick="showDisconnectModal('${user.username}', 'pppoe')">
                        <i class="fa fa-power-off"></i>
                    </button>
                </td>
            </tr>
        `;
        tbody.append(row);
    });
}

function updateHotspotTable(users) {
    if (typeof jQuery === 'undefined') return;

    const tbody = jQuery('#hotspotTableBody');
    tbody.empty();

    // Only keep users with a valid username
    const filteredUsers = users.filter(u => u.username && u.username.trim() !== '');

    if (filteredUsers.length === 0) {
        tbody.append('<tr><td colspan="6" class="text-center text-muted">No Hotspot users online</td></tr>');
        return;
    }

    filteredUsers.forEach(function(user) {
        const row = `
            <tr>
                <td><strong>${user.username}</strong></td>
                <td>${user.address || 'N/A'}</td>
                <td>${user.uptime || 'N/A'}</td>
                <td>${user.tx || 'N/A'}</td>
                <td>${user.rx || 'N/A'}</td>
                <td>
                    <button class="btn btn-xs btn-danger" onclick="showDisconnectModal('${user.username}', 'hotspot')">
                        <i class="fa fa-power-off"></i>
                    </button>
                </td>
            </tr>
        `;
        tbody.append(row);
    });
}

function showDisconnectModal(username, userType) {
    if (typeof jQuery === 'undefined') return;
    
    jQuery('#disconnectUsername').text(username);
    jQuery('#disconnectUsernameInput').val(username);
    jQuery('#disconnectUserType').val(userType);
    jQuery('#disconnectModal').modal('show');
}

function refreshPPPoEUsers() {
    loadOnlineUsers();
}

function refreshHotspotUsers() {
    loadOnlineUsers();
}
</script>
{/literal}

{include file="sections/footer.tpl"}