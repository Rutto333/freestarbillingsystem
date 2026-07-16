{include file="sections/header.tpl"}
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                {if in_array($_admin['user_type'],['SuperAdmin','Admin'])}
                <div class="btn-group pull-right">
                </div>
                {/if}
                {Lang::T('Manage Contact')}
            </div>
            <div class="panel-body">
                <form id="site-search" method="post" action="{Text::url('customers')}">
                    <input type="hidden" name="csrf_token" value="{$csrf_token}">
                    <div class="md-whiteframe-z1 mb20 d-flex justify-content-center" style="padding: 15px">
                        <div class="row w-100 justify-content-center">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="{Lang::T('Search')}..." value="{$search}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">
                                            <span class="fa fa-search"></span> {Lang::T('Search')}
                                        </button>
                                        <button class="btn btn-info" type="submit" name="export" value="csv">
                                            <span class="glyphicon glyphicon-download" aria-hidden="true"></span> CSV
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <a href="{Text::url('customers/add')}"
                                class="btn btn-success text-black btn-block"
                                title="{Lang::T('Add')}">
                                    <i class="ion ion-android-add"></i>
                                    <i class="glyphicon glyphicon-user"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <br>&nbsp;
                <div class="table-responsive table_mobile">
                    <table id="customerTable" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>{Lang::T('Username')}</th>
                                <th>{Lang::T('Full Name')}</th>
                                <th>{Lang::T('Balance')}</th>
                                <th>{Lang::T('Package')}</th>
                                <th>{Lang::T('Service Type')}</th>
                                <th>PPPOE</th>
                                <th>{Lang::T('Assigned Router')}</th>
                                <th>{Lang::T('Status')}</th>
                                <th>{Lang::T('Created On')}</th>
                                <th>{Lang::T('Manage')}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach $d as $ds}
                            <tr {if $ds['status'] !='Active' }class="danger" {/if}>
                                <td><input type="checkbox" name="customer_ids[]" value="{$ds['id']}"></td>
                                <td onclick="window.location.href = '{Text::url('customers/view/', $ds['id'])}'"
                                    style="cursor:pointer;">{$ds['username']}</td>
                                <td onclick="window.location.href = '{Text::url('customers/view/', $ds['id'])}'"
                                    style="cursor: pointer;">{$ds['fullname']}</td>
                                <td>{Lang::moneyFormat($ds['balance'])}</td>
                                <td align="center" api-get-text="{Text::url('autoload/plan_is_active/')}{$ds['id']}">
                                    <span class="label label-default">&bull;</span>
                                </td>
                                <td>{$ds['service_type']}</td>
                                <td>
                                    {$ds['pppoe_username']}
                                    {if !empty($ds['pppoe_username']) && !empty($ds['pppoe_ip'])}:{/if}
                                    {$ds['pppoe_ip']}
                                </td>
                                <td>
                                    {if !empty($ds['router_name'])}
                                        <span class="label label-info">
                                            <i class="glyphicon glyphicon-hdd"></i> {$ds['router_name']}
                                        </span>
                                    {else}
                                        <span class="label label-default">
                                            <i class="glyphicon glyphicon-minus"></i> {Lang::T('Not Assigned')}
                                        </span>
                                    {/if}
                                </td>
                                <td>{Lang::T($ds['status'])}</td>
                                <td>{Lang::dateTimeFormat($ds['created_at'])}</td>
                                <td align="left">
                                    <a href="{Text::url('customers/view/')}{$ds['id']}" id="{$ds['id']}"
                                        style="margin: 0px; color:black"
                                        class="btn btn-success btn-xs">&nbsp;&nbsp;{Lang::T('View')}&nbsp;&nbsp;</a>
                                    <a href="{Text::url('customers/sync/', $ds['id'], '&token=', $csrf_token)}"
                                        id="{$ds['id']}" style="margin: 5px; color:black"
                                        class="btn btn-success btn-xs">&nbsp;&nbsp;{Lang::T('Sync')}&nbsp;&nbsp;</a>
                                </td>
                            </tr>
                            {/foreach}
                        </tbody>
                    </table>
                    <div class="row" style="padding: 5px">
                        <div class="col-lg-3 col-lg-offset-9">
                            <div class="btn-group btn-group-justified" role="group">
                                <!-- <div class="btn-group" role="group">
                                    {if in_array($_admin['user_type'],['SuperAdmin','Admin'])}
                                    <button id="deleteSelectedTokens" class="btn btn-danger">{Lang::T('Delete
                                        Selected')}</button>
                                    {/if}
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                {include file="pagination.tpl"}
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Select or deselect all checkboxes
    document.getElementById('select-all').addEventListener('change', function () {
        var checkboxes = document.querySelectorAll('input[name="customer_ids[]"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });

    $(document).ready(function () {
        let selectedCustomerIds = [];

        // Collect selected customer IDs when the button is clicked
        $('#sendMessageToSelected').on('click', function () {
            selectedCustomerIds = $('input[name="customer_ids[]"]:checked').map(function () {
                return $(this).val();
            }).get();

            if (selectedCustomerIds.length === 0) {
                Swal.fire({
                    title: 'Error!',
                    text: "{Lang::T('Please select at least one customer to send a message.')}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Open the modal
            $('#sendMessageModal').modal('show');
        });

        // Handle sending the message
        $('#sendMessageButton').on('click', function () {
            const message = $('#messageContent').val().trim();
            const messageType = $('#messageType').val();

            if (!message) {
                Swal.fire({
                    title: 'Error!',
                    text: "{Lang::T('Please enter a message to send.')}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Disable the button and show loading text
            $(this).prop('disabled', true).text('{Lang::T('Sending...')}');

            $.ajax({
                url: '?_route=message/send_bulk_selected',
                method: 'POST',
                data: {
                    customer_ids: selectedCustomerIds,
                    message_type: messageType,
                    message: message
                },
                dataType: 'json',
                success: function (response) {
                    // Handle success response
                    if (response.status === 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: "{Lang::T('Message sent successfully.')}",
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: "{Lang::T('Error sending message: ')}" + response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                    $('#sendMessageModal').modal('hide');
                    $('#messageContent').val(''); // Clear the message content
                },
                error: function () {
                    Swal.fire({
                        title: 'Error!',
                        text: "{Lang::T('Failed to send the message. Please try again.')}",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                },
                complete: function () {
                    // Re-enable the button and reset text
                    $('#sendMessageButton').prop('disabled', false).text('{Lang::T('Send Message')}');
                }
            });
        });
    });

    $(document).ready(function () {
        $('#sendMessageModal').on('show.bs.modal', function () {
            $(this).attr('inert', 'true');
        });
        $('#sendMessageModal').on('shown.bs.modal', function () {
            $('#messageContent').focus();
            $(this).removeAttr('inert');
        });
        $('#sendMessageModal').on('hidden.bs.modal', function () {
            // $('#button').focus();
        });
    });
</script>
{include file = "sections/footer.tpl" }
