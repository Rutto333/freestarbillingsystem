<?php
/* Smarty version 4.5.3, created on 2025-08-27 09:29:09
  from '/var/www/html/example/ui/ui/admin/customers/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68aea5b56434a7_18541464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f63e7c763b44bc76ca6d3c5565b7e33366c11ee6' => 
    array (
      0 => '/var/www/html/example/ui/ui/admin/customers/list.tpl',
      1 => 1742420632,
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
function content_68aea5b56434a7_18541464 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        border: 1px solid #ccc;
        background-color: #fff;
        color: #333;
        cursor: pointer;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                <div class="btn-group pull-right">
                    <a class="btn btn-primary btn-xs" title="save"
                        href="<?php echo Text::url('customers/csv&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                        onclick="return ask(this, '<?php echo Lang::T("This will export to CSV");?>
?')"><span
                            class="glyphicon glyphicon-download" aria-hidden="true"></span> CSV</a>
                </div>
                <?php }?>
                <?php echo Lang::T('Manage Contact');?>

            </div>
            <div class="panel-body">
                <form id="site-search" method="post" action="<?php echo Text::url('customers');?>
">
                    <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">
                    <div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo Lang::T('Order ');?>
&nbsp;&nbsp;</span>
                                <div class="row row-no-gutters">
                                    <div class="col-xs-8">
                                        <select class="form-control" id="order" name="order">
                                            <option value="username" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'username') {?>selected<?php }?>>
                                                <?php echo Lang::T('Username');?>
</option>
                                            <option value="fullname" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'fullname') {?>selected<?php }?>>
                                                <?php echo Lang::T('First Name');?>
</option>
                                            <option value="lastname" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'lastname') {?>selected<?php }?>>
                                                <?php echo Lang::T('Last Name');?>
</option>
                                            <option value="created_at" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'created_at') {?>selected<?php }?>>
                                                <?php echo Lang::T('Created Date');?>
</option>
                                            <option value="balance" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'balance') {?>selected<?php }?>>
                                                <?php echo Lang::T('Balance');?>
</option>
                                            <option value="status" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'status') {?>selected<?php }?>>
                                                <?php echo Lang::T('Status');?>
</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <select class="form-control" id="orderby" name="orderby">
                                            <option value="asc" <?php if ($_smarty_tpl->tpl_vars['orderby']->value == 'asc') {?>selected<?php }?>>
                                                <?php echo Lang::T('Ascending');?>
</option>
                                            <option value="desc" <?php if ($_smarty_tpl->tpl_vars['orderby']->value == 'desc') {?>selected<?php }?>>
                                                <?php echo Lang::T('Descending');?>
</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo Lang::T('Status');?>
</span>
                                <select class="form-control" id="filter" name="filter">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['statuses']->value, 'status');
$_smarty_tpl->tpl_vars['status']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['filter']->value == $_smarty_tpl->tpl_vars['status']->value) {?>selected<?php }?>><?php echo Lang::T($_smarty_tpl->tpl_vars['status']->value);?>

                                    </option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="<?php echo Lang::T('Search');?>
..." value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><span class="fa fa-search"></span>
                                        <?php echo Lang::T('Search');?>
</button>
                                    <button class="btn btn-info" type="submit" name="export" value="csv">
                                        <span class="glyphicon glyphicon-download" aria-hidden="true"></span> CSV
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <a href="<?php echo Text::url('customers/add');?>
" class="btn btn-success text-black btn-block"
                                title="<?php echo Lang::T('Add');?>
">
                                <i class="ion ion-android-add"></i><i class="glyphicon glyphicon-user"></i>
                            </a>
                        </div>
                    </div>
                </form>
                <br>&nbsp;
                <div class="table-responsive table_mobile">
                    <table id="customerTable" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th><?php echo Lang::T('Username');?>
</th>
                                <th>Photo</th>
                                <th><?php echo Lang::T('Account Type');?>
</th>
                                <th><?php echo Lang::T('Full Name');?>
</th>
                                <th><?php echo Lang::T('Balance');?>
</th>
                                <th><?php echo Lang::T('Contact');?>
</th>
                                <th><?php echo Lang::T('Package');?>
</th>
                                <th><?php echo Lang::T('Service Type');?>
</th>
                                <th>PPPOE</th>
                                <th><?php echo Lang::T('Status');?>
</th>
                                <th><?php echo Lang::T('Created On');?>
</th>
                                <th><?php echo Lang::T('Manage');?>
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
                            <tr <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] != 'Active') {?>class="danger" <?php }?>>
                                <td><input type="checkbox" name="customer_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"></td>
                                <td onclick="window.location.href = '<?php echo Text::url('customers/view/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
'"
                                    style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</td>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['ds']->value['photo'];?>
" target="photo">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['ds']->value['photo'];?>
.thumb.jpg" width="32" alt="">
                                    </a>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account_type'];?>
</td>
                                <td onclick="window.location.href = '<?php echo Text::url('customers/view/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
'"
                                    style="cursor: pointer;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['fullname'];?>
</td>
                                <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['balance']);?>
</td>
                                <td align="center">
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['phonenumber']) {?>
                                    <a href="tel:<?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
" class="btn btn-default btn-xs"
                                        title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
"><i class="glyphicon glyphicon-earphone"></i></a>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['email']) {?>
                                    <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
" class="btn btn-default btn-xs"
                                        title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
"><i class="glyphicon glyphicon-envelope"></i></a>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['coordinates']) {?>
                                    <a href="https://www.google.com/maps/dir//<?php echo $_smarty_tpl->tpl_vars['ds']->value['coordinates'];?>
/" target="_blank"
                                        class="btn btn-default btn-xs" title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['coordinates'];?>
"><i
                                            class="glyphicon glyphicon-map-marker"></i></a>
                                    <?php }?>
                                </td>
                                <td align="center" api-get-text="<?php echo Text::url('autoload/plan_is_active/');
echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
">
                                    <span class="label label-default">&bull;</span>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['service_type'];?>
</td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['ds']->value['pppoe_username'];?>

                                    <?php if (!empty($_smarty_tpl->tpl_vars['ds']->value['pppoe_username']) && !empty($_smarty_tpl->tpl_vars['ds']->value['pppoe_ip'])) {?>:<?php }?>
                                    <?php echo $_smarty_tpl->tpl_vars['ds']->value['pppoe_ip'];?>

                                </td>
                                <td><?php echo Lang::T($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</td>
                                <td><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['created_at']);?>
</td>
                                <td align="center">
                                    <a href="<?php echo Text::url('customers/view/');
echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                        style="margin: 0px; color:black"
                                        class="btn btn-success btn-xs">&nbsp;&nbsp;<?php echo Lang::T('View');?>
&nbsp;&nbsp;</a>
                                    <a href="<?php echo Text::url('customers/edit/',$_smarty_tpl->tpl_vars['ds']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                        id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" style="margin: 0px; color:black"
                                        class="btn btn-info btn-xs">&nbsp;&nbsp;<?php echo Lang::T('Edit');?>
&nbsp;&nbsp;</a>
                                    <a href="<?php echo Text::url('customers/sync/',$_smarty_tpl->tpl_vars['ds']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                        id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" style="margin: 5px; color:black"
                                        class="btn btn-success btn-xs">&nbsp;&nbsp;<?php echo Lang::T('Sync');?>
&nbsp;&nbsp;</a>
                                    <a href="<?php echo Text::url('plan/recharge/',$_smarty_tpl->tpl_vars['ds']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                        id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" style="margin: 0px;"
                                        class="btn btn-primary btn-xs"><?php echo Lang::T('Recharge');?>
</a>
                                </td>
                            </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                    <div class="row" style="padding: 5px">
                        <div class="col-lg-3 col-lg-offset-9">
                            <div class="btn-group btn-group-justified" role="group">
                                <!-- <div class="btn-group" role="group">
                                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                                    <button id="deleteSelectedTokens" class="btn btn-danger"><?php echo Lang::T('Delete
                                        Selected');?>
</button>
                                    <?php }?>
                                </div> -->
                                <div class="btn-group" role="group">
                                    <button id="sendMessageToSelected" class="btn btn-success"><?php echo Lang::T('Send
                                        Message');?>
</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Sending Messages -->
<div id="sendMessageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sendMessageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendMessageModalLabel"><?php echo Lang::T('Send Message');?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select id="messageType" class="form-control">
                    <option value="all"><?php echo Lang::T('All');?>
</option>
                    <option value="email"><?php echo Lang::T('Email');?>
</option>
                    <option value="inbox"><?php echo Lang::T('Inbox');?>
</option>
                    <option value="sms"><?php echo Lang::T('SMS');?>
</option>
                    <option value="wa"><?php echo Lang::T('WhatsApp');?>
</option>
                </select>
                <br>
                <textarea id="messageContent" class="form-control" rows="4"
                    placeholder="<?php echo Lang::T('Enter your message here...');?>
"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo Lang::T('Close');?>
</button>
                <button type="button" id="sendMessageButton" class="btn btn-primary"><?php echo Lang::T('Send Message');?>
</button>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
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
                    text: "<?php echo Lang::T('Please select at least one customer to send a message.');?>
",
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
                    text: "<?php echo Lang::T('Please enter a message to send.');?>
",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Disable the button and show loading text
            $(this).prop('disabled', true).text('<?php echo Lang::T('Sending...');?>
');

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
                            text: "<?php echo Lang::T('Message sent successfully.');?>
",
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: "<?php echo Lang::T('Error sending message: ');?>
" + response.message,
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
                        text: "<?php echo Lang::T('Failed to send the message. Please try again.');?>
",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                },
                complete: function () {
                    // Re-enable the button and reset text
                    $('#sendMessageButton').prop('disabled', false).text('<?php echo Lang::T('Send Message');?>
');
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
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
