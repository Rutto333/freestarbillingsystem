<?php
/* Smarty version 4.5.3, created on 2025-09-04 09:23:08
  from '/var/www/html/myapp/ui/ui/admin/message/bulk.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b9304ccbc187_40485361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a79b2bf9767799dcee69655ea31529642dfd35c5' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/message/bulk.tpl',
      1 => 1755633260,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68b9304ccbc187_40485361 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- External Styles -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="row">
    <div class="col-sm-12 col-md-12">

        <!-- Status messages -->
        <div id="status" class="mb-3"></div>

        <!-- Bulk Message Panel -->
        <div class="panel panel-primary panel-hovered panel-stacked mb30 <?php if ($_smarty_tpl->tpl_vars['page']->value > 0 && $_smarty_tpl->tpl_vars['totalCustomers']->value > 0) {?>hidden<?php }?>">
            <div class="panel-heading"><?php echo Lang::T('Send Bulk Message');?>
</div>
            
            <div class="panel-body">

                <!-- Bulk Message Form -->
                <form class="form-horizontal" method="get" role="form" id="bulkMessageForm" action="">
                    <input type="hidden" name="page" value="<?php if ($_smarty_tpl->tpl_vars['page']->value > 0 && $_smarty_tpl->tpl_vars['totalCustomers']->value == 0) {?>-1<?php } else {
echo $_smarty_tpl->tpl_vars['page']->value;
}?>">

                    <!-- Router Selection -->
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Router');?>
</label>
                        <div class="col-md-6">
                            <select class="form-control select2" name="router" id="router">
                                <option value=""><?php echo Lang::T('All Routers');?>
</option>
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_enable']) {?>
                                <option value="radius"><?php echo Lang::T('Radius');?>
</option>
                                <?php }?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['routers']->value, 'router');
$_smarty_tpl->tpl_vars['router']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['router']->value) {
$_smarty_tpl->tpl_vars['router']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['router']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['router']->value['name'];?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>

                    <!-- Service Type -->
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Service Type');?>
</label>
                        <div class="col-md-6">
                            <select class="form-control select2" name="service" id="service">
                                <option value="all" <?php if ($_smarty_tpl->tpl_vars['group']->value == 'all') {?>selected<?php }?>><?php echo Lang::T('All');?>
</option>
                                <option value="PPPoE" <?php if ($_smarty_tpl->tpl_vars['service']->value == 'PPPoE') {?>selected<?php }?>><?php echo Lang::T('PPPoE');?>
</option>
                                <option value="Hotspot" <?php if ($_smarty_tpl->tpl_vars['service']->value == 'Hotspot') {?>selected<?php }?>><?php echo Lang::T('Hotspot');?>
</option>
                                <option value="VPN" <?php if ($_smarty_tpl->tpl_vars['service']->value == 'VPN') {?>selected<?php }?>><?php echo Lang::T('VPN');?>
</option>
                            </select>
                        </div>
                    </div>

                    <!-- Group Selection -->
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Group');?>
</label>
                        <div class="col-md-6">
                            <select class="form-control select2" name="group" id="group">
                                <option value="all" <?php if ($_smarty_tpl->tpl_vars['group']->value == 'all') {?>selected<?php }?>><?php echo Lang::T('All Customers');?>
</option>
                                <option value="new" <?php if ($_smarty_tpl->tpl_vars['group']->value == 'new') {?>selected<?php }?>><?php echo Lang::T('New Customers');?>
</option>
                                <option value="expired" <?php if ($_smarty_tpl->tpl_vars['group']->value == 'expired') {?>selected<?php }?>><?php echo Lang::T('Expired Customers');?>
</option>
                                <option value="active" <?php if ($_smarty_tpl->tpl_vars['group']->value == 'active') {?>selected<?php }?>><?php echo Lang::T('Active Customers');?>
</option>
                            </select>
                        </div>
                    </div>

                    <!-- Send Via -->
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Send Via');?>
</label>
                        <div class="col-md-6">
                            <select class="form-control select2" name="via" id="via">                                
                                <option value="wa" <?php if ($_smarty_tpl->tpl_vars['via']->value == 'wa') {?>selected<?php }?>><?php echo Lang::T('WhatsApp');?>
</option>                                
                            </select>
                        </div>
                    </div>

                    <!-- Message per Batch -->
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Message per time');?>
</label>
                        <div class="col-md-6">
                            <select class="form-control select2" name="batch" id="batch">
                                <option value="5" <?php if ($_smarty_tpl->tpl_vars['batch']->value == '5') {?>selected<?php }?>><?php echo Lang::T('5 Messages');?>
</option>
                                <option value="10" <?php if ($_smarty_tpl->tpl_vars['batch']->value == '10') {?>selected<?php }?>><?php echo Lang::T('10 Messages');?>
</option>
                                <option value="15" <?php if ($_smarty_tpl->tpl_vars['batch']->value == '15') {?>selected<?php }?>><?php echo Lang::T('15 Messages');?>
</option>
                                <option value="20" <?php if ($_smarty_tpl->tpl_vars['batch']->value == '20') {?>selected<?php }?>><?php echo Lang::T('20 Messages');?>
</option>
                                <option value="30" <?php if ($_smarty_tpl->tpl_vars['batch']->value == '30') {?>selected<?php }?>><?php echo Lang::T('30 Messages');?>
</option>
                                <option value="40" <?php if ($_smarty_tpl->tpl_vars['batch']->value == '40') {?>selected<?php }?>><?php echo Lang::T('40 Messages');?>
</option>
                                <option value="50" <?php if ($_smarty_tpl->tpl_vars['batch']->value == '50') {?>selected<?php }?>><?php echo Lang::T('50 Messages');?>
</option>
                                <option value="60" <?php if ($_smarty_tpl->tpl_vars['batch']->value == '60') {?>selected<?php }?>><?php echo Lang::T('60 Messages');?>
</option>
                            </select>
                            <small><?php echo Lang::T('Use 20 and above if you are sending to all customers to avoid server time out');?>
</small>
                        </div>
                    </div>

                    <!-- Message Input -->
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Message');?>
</label>
                        <div class="col-md-6">
                            <textarea class="form-control" id="message" name="message" required placeholder="<?php echo Lang::T('Compose your message...');?>
" rows="5"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</textarea>
                            <div class="checkbox mt-2">
                                <label>
                                    <input name="test" id="test" type="checkbox"> <?php echo Lang::T('Testing [if checked no real message is sent]');?>

                                </label>
                            </div>
                        </div>
                        <p class="help-block col-md-4">
                            <?php echo Lang::T('Use placeholders:');?>

                            <br>
                            <b>[[name]]</b> - <?php echo Lang::T('Customer Name');?>

                            <br>
                            <b>[[user_name]]</b> - <?php echo Lang::T('Customer Username');?>

                            <br>
                            <b>[[phone]]</b> - <?php echo Lang::T('Customer Phone');?>

                            <br>
                            <b>[[company_name]]</b> - <?php echo Lang::T('Your Company Name');?>

                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="button" id="startBulk" class="btn btn-primary"><?php echo Lang::T('Start Bulk Messaging');?>
</button>
                            <a href="<?php echo Text::url('dashboard');?>
" class="btn btn-default"><?php echo Lang::T('Cancel');?>
</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<!-- External Scripts -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
    // Initialize variables
    let page = 0;
    let totalSent = 0;
    let totalFailed = 0;
    let hasMore = true;

    // Function to send a batch of messages
    function sendBatch() {
        if (!hasMore) return;

        $.ajax({
            url: '?_route=message/send_bulk_ajax',
            method: 'POST',
            data: {
                group: $('#group').val(),
                message: $('#message').val(),
                via: $('#via').val(),
                batch: $('#batch').val(),
                router: $('#router').val() || '',
                page: page,
                test: $('#test').is(':checked') ? 'on' : 'off',
                service: $('#service').val(),
            },
            dataType: 'json',
            beforeSend: function () {
                $('#status').html('<div class="alert alert-info"><i class="fas fa-spinner fa-spin"></i> Sending batch ' + (page + 1) + '...</div>');
            },
            success: function (response) {
                if (response && response.status === 'success') {
                    totalSent += response.totalSent || 0;
                    totalFailed += response.totalFailed || 0;
                    page = response.page || 0;
                    hasMore = response.hasMore || false;

                    $('#status').html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> Batch ' + page + ' sent! Total Sent: ' + totalSent + ', Failed: ' + totalFailed + '</div>');

                    if (hasMore) sendBatch();
                    else $('#status').html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> All batches sent! Total Sent: ' + totalSent + ', Failed: ' + totalFailed + '</div>');
                } else {
                    $('#status').html('<div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> Error: Unexpected response format.</div>');
                }
            },
            error: function () {
                $('#status').html('<div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> Error: Failed to send batch ' + (page + 1) + '.</div>');
            }
        });
    }

    // Start bulk messaging
    $('#startBulk').on('click', function () {
        page = 0;
        totalSent = 0;
        totalFailed = 0;
        hasMore = true;
        $('#status').html('<div class="alert alert-info"><i class="fas fa-spinner fa-spin"></i> Starting bulk message sending...</div>');
        sendBatch();
    });
<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
