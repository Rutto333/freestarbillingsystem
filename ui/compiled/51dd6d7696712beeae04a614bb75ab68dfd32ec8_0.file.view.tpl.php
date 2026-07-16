<?php
/* Smarty version 4.5.3, created on 2025-10-16 12:53:07
  from '/var/www/html/dev/ui/ui/admin/customers/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68f0c0831545e6_28517221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51dd6d7696712beeae04a614bb75ab68dfd32ec8' => 
    array (
      0 => '/var/www/html/dev/ui/ui/admin/customers/view.tpl',
      1 => 1755815958,
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
function content_68f0c0831545e6_28517221 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-sm-4 col-md-4">
        <div class="box box-<?php if ($_smarty_tpl->tpl_vars['d']->value['status'] == 'Active') {?>primary<?php } else { ?>danger<?php }?>">
            <div class="box-body box-profile">
                        <?php $_smarty_tpl->_assignInScope('initials', mb_strtoupper((string) substr((string) $_smarty_tpl->tpl_vars['d']->value['username'], (int) 0, (int) 2) ?? '', 'UTF-8'));?>
            <div class="profile-user-img img-responsive img-circle"
                style="width:100px; height:100px; background:#007bff; color:#fff; 
                        display:flex; align-items:center; justify-content:center; 
                        font-size:32px; font-weight:bold; cursor:default; margin:auto;">
                <?php echo $_smarty_tpl->tpl_vars['initials']->value;?>

            </div>
                <h3 class="profile-username text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
</h3>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Status');?>
</b> <span
                            class="pull-right <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] != 'Active') {?>bg-red<?php }?>">&nbsp;<?php echo Lang::T($_smarty_tpl->tpl_vars['d']->value['status']);?>
&nbsp;</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Username');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Phone Number');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['phonenumber'];?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Email');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
</span>
                    </li>

                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <li class="list-group-item">
                            <b><?php echo Lang::T('Password');?>
</b> <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['password'];?>
"
                                style=" border: 0px; text-align: right;" class="pull-right"
                                onmouseleave="this.type = 'password'" onmouseenter="this.type = 'text'"
                                onclick="this.select()">
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['pppoe_username'] != '') {?>
                        <li class="list-group-item">
                            <b>PPPOE <?php echo Lang::T('Username');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['pppoe_username'];?>
</span>
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['pppoe_password'] != '' && in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <li class="list-group-item">
                            <b>PPPOE <?php echo Lang::T('Password');?>
</b> <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['pppoe_password'];?>
"
                                style=" border: 0px; text-align: right;" class="pull-right"
                                onmouseleave="this.type = 'password'" onmouseenter="this.type = 'text'"
                                onclick="this.select()">
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['pppoe_ip'] != '') {?>
                        <li class="list-group-item">
                            <b><?php echo Lang::T('PPPoE Remote IP');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['pppoe_ip'];?>
</span>
                        </li>
                    <?php }?>
                    <!--Customers Attributes view start -->
                    <?php if ($_smarty_tpl->tpl_vars['customFields']->value) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customFields']->value, 'customField');
$_smarty_tpl->tpl_vars['customField']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['customField']->value) {
$_smarty_tpl->tpl_vars['customField']->do_else = false;
?>
                            <li class="list-group-item">
                                <b><?php echo $_smarty_tpl->tpl_vars['customField']->value['field_name'];?>
</b> <span class="pull-right">
                                    <?php if (strpos($_smarty_tpl->tpl_vars['customField']->value['field_value'],':0') === false) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['customField']->value['field_value'];?>

                                    <?php } else { ?>
                                        <b><?php echo Lang::T('Paid');?>
</b>
                                    <?php }?>
                                </span>
                            </li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                    <!--Customers Attributes view end -->
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Service Type');?>
</b> <span class="pull-right"><?php echo Lang::T($_smarty_tpl->tpl_vars['d']->value['service_type']);?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Account Type');?>
</b> <span class="pull-right"><?php echo Lang::T($_smarty_tpl->tpl_vars['d']->value['account_type']);?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Balance');?>
</b> <span class="pull-right"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['d']->value['balance']);?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Auto Renewal');?>
</b> <span class="pull-right"><?php if ($_smarty_tpl->tpl_vars['d']->value['auto_renewal']) {?>yes<?php } else { ?>no
                            <?php }?></span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Created On');?>
</b> <span
                            class="pull-right"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['d']->value['created_at']);?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Last Login');?>
</b> <span
                            class="pull-right"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['d']->value['last_login']);?>
</span>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['coordinates']) {?>
                        <li class="list-group-item">
                            <b><?php echo Lang::T('Coordinates');?>
</b> <span class="pull-right">
                                <i class="glyphicon glyphicon-road"></i> <a style="color: black;"
                                    href="https://www.google.com/maps/dir//<?php echo $_smarty_tpl->tpl_vars['d']->value['coordinates'];?>
/"
                                    target="_blank"><?php echo Lang::T('Get Directions');?>
</a>
                            </span>
                            <div id="map" style="width: '100%'; height: 100px;"></div>
                        </li>
                    <?php }?>
                </ul>
                <div class="row">
                    <div class="col-xs-4">
                        <a href="<?php echo Text::url('customers/delete/',$_smarty_tpl->tpl_vars['d']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
" id="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"
                            class="btn btn-danger btn-block btn-sm"
                            onclick="return ask(this, '<?php echo Lang::T('Delete');?>
?')"><span class="fa fa-trash"></span></a>
                    </div>
                    <div class="col-xs-8">
                        <a href="<?php echo Text::url('customers/edit/',$_smarty_tpl->tpl_vars['d']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                            class="btn btn-warning btn-sm btn-block"><?php echo Lang::T('Edit');?>
</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-8 col-md-8">
        <div class="box box-info">
            <ul class="nav nav-tabs">
                <li role="presentation" <?php if ($_smarty_tpl->tpl_vars['v']->value == 'order') {?>class="active" <?php }?>><a
                        href="<?php echo Text::url('customers/view/',$_smarty_tpl->tpl_vars['d']->value['id'],'/order');?>
">30 <?php echo Lang::T('Order History');?>
</a></li>
                <li role="presentation" <?php if ($_smarty_tpl->tpl_vars['v']->value == 'activation') {?>class="active" <?php }?>><a
                        href="<?php echo Text::url('customers/view/',$_smarty_tpl->tpl_vars['d']->value['id'],'/activation');?>
">30
                        <?php echo Lang::T('Activation History');?>
</a></li>
            </ul>
            <div class="table-responsive" style="background-color: white;">
                <table id="datatable" class="table table-bordered table-striped">
                    <?php if (Lang::arrayCount($_smarty_tpl->tpl_vars['activation']->value)) {?>
                        <thead>
                            <tr>
                                <th><?php echo Lang::T('Invoice');?>
</th>
                                <th><?php echo Lang::T('Username');?>
</th>
                                <th><?php echo Lang::T('Plan Name');?>
</th>
                                <th><?php echo Lang::T('Plan Price');?>
</th>
                                <th><?php echo Lang::T('Type');?>
</th>
                                <th><?php echo Lang::T('Created On');?>
</th>
                                <th><?php echo Lang::T('Expires On');?>
</th>
                                <th><?php echo Lang::T('Method');?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['activation']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr onclick="window.location.href = '<?php echo Text::url('plan/view/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
'"
                                    style="cursor:pointer;">
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['invoice'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_name'];?>
</td>
                                    <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>
</td>
                                    <td class="text-success">
                                        <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['recharged_on'],$_smarty_tpl->tpl_vars['ds']->value['recharged_time']);?>

                                    </td>
                                    <td class="text-danger"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expiration'],$_smarty_tpl->tpl_vars['ds']->value['time']);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['method'];?>
</td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    <?php }?>
                    <?php if (Lang::arrayCount($_smarty_tpl->tpl_vars['order']->value)) {?>
                        <thead>
                            <tr>
                                <th><?php echo Lang::T('Plan Name');?>
</th>
                                <th><?php echo Lang::T('Gateway');?>
</th>
                                <th><?php echo Lang::T('Routers');?>
</th>
                                <th><?php echo Lang::T('Type');?>
</th>
                                <th><?php echo Lang::T('Plan Price');?>
</th>
                                <th><?php echo Lang::T('Created On');?>
</th>
                                <th><?php echo Lang::T('Expires On');?>
</th>
                                <th><?php echo Lang::T('Date Done');?>
</th>
                                <th><?php echo Lang::T('Method');?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['gateway'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['payment_channel'];?>
</td>
                                    <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                                    <td class="text-primary"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['created_date']);?>
</td>
                                    <td class="text-danger"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expired_date']);?>
</td>
                                    <td class="text-success"><?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] != 1) {
echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['paid_date']);
}?>
                                    </td>
                                    <td><?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 1) {
echo Lang::T('UNPAID');?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 2) {
echo Lang::T('PAID');?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 3) {
echo $_smarty_tpl->tpl_vars['_L']->value['FAILED'];?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 4) {
echo Lang::T('CANCELED');?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 5) {
echo Lang::T('UNKNOWN');?>

                                        <?php }?></td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    <?php }?>
                </table>
            </div>
            <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['packages']->value, 'package');
$_smarty_tpl->tpl_vars['package']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['package']->value) {
$_smarty_tpl->tpl_vars['package']->do_else = false;
?>
                <div class="col-md-6">
                    <div class="box box-<?php if ($_smarty_tpl->tpl_vars['package']->value['status'] == 'on') {?>success<?php } else { ?>danger<?php }?>">
                        <div class="box-body box-profile">
                            <h4 class="text-center"><?php echo $_smarty_tpl->tpl_vars['package']->value['type'];?>
 - <?php echo $_smarty_tpl->tpl_vars['package']->value['namebp'];?>
 <span
                                    api-get-text="<?php echo Text::url('autoload/customer_is_active/');
echo $_smarty_tpl->tpl_vars['package']->value['username'];?>
/<?php echo $_smarty_tpl->tpl_vars['package']->value['plan_id'];?>
"></span>
                            </h4>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <?php echo Lang::T('Active');?>
 <span class="pull-right"><?php if ($_smarty_tpl->tpl_vars['package']->value['status'] == 'on') {?>yes<?php } else { ?>no
                                    <?php }?></span>
                            </li>
                            <li class="list-group-item">
                                <?php echo Lang::T('Type');?>
 <span class="pull-right">
                                    <?php if ($_smarty_tpl->tpl_vars['package']->value['prepaid'] == 'yes') {?>Prepaid<?php } else { ?><b><?php echo Lang::T('Postpaid');?>
</b><?php }?></span>
                            </li>
                            <li class="list-group-item">
                                <?php echo Lang::T('Bandwidth');?>
 <span class="pull-right">
                                    <?php echo $_smarty_tpl->tpl_vars['package']->value['name_bw'];?>
</span>
                            </li>
                            <li class="list-group-item">
                                <?php echo Lang::T('Created On');?>
 <span
                                    class="pull-right"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['package']->value['recharged_on'],$_smarty_tpl->tpl_vars['package']->value['recharged_time']);?>
</span>
                            </li>
                            <li class="list-group-item">
                                <?php echo Lang::T('Expires On');?>
 <span class="pull-right"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['package']->value['expiration'],$_smarty_tpl->tpl_vars['package']->value['time']);?>
</span>
                            </li>
                            <li class="list-group-item">
                                <?php echo $_smarty_tpl->tpl_vars['package']->value['routers'];?>
 <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['package']->value['method'];?>
</span>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-xs-4">
                                <a href="<?php echo Text::url('customers/deactivate/',$_smarty_tpl->tpl_vars['d']->value['id'],'/',$_smarty_tpl->tpl_vars['package']->value['plan_id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                    id="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" class="btn btn-danger btn-block btn-sm"
                                    onclick="return ask(this, '<?php echo Lang::T('This will deactivate Customer Plan, and make it expired');?>
')"><?php echo Lang::T('Deactivate');?>
</a>
                            </div>
                            <div class="col-xs-8">
                                <a href="<?php echo Text::url('customers/recharge/',$_smarty_tpl->tpl_vars['d']->value['id'],'/',$_smarty_tpl->tpl_vars['package']->value['plan_id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                    class="btn btn-success btn-sm btn-block"><?php echo Lang::T('Recharge');?>
</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-6 col-md-3">
        <a href="<?php echo Text::url('customers/list');?>
" class="btn btn-primary btn-sm btn-block"><?php echo Lang::T('Back');?>
</a>
    </div>
    <div class="col-xs-6 col-md-3">
        <a href="<?php echo Text::url('customers/sync/',$_smarty_tpl->tpl_vars['d']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
            onclick="return ask(this, '<?php echo Lang::T('This will sync Customer to Mikrotik');?>
?')"
            class="btn btn-info btn-sm btn-block"><?php echo Lang::T('Sync');?>
</a>
    </div>
    <div class="col-xs-6 col-md-3">
        <a href="<?php echo Text::url('message/send/',$_smarty_tpl->tpl_vars['d']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
            class="btn btn-success btn-sm btn-block">
            <?php echo Lang::T('Send Message');?>

        </a>
    </div>
    <div class="col-xs-6 col-md-3">
        <a href="<?php echo Text::url('customers/login/',$_smarty_tpl->tpl_vars['d']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
" target="_blank"
            class="btn btn-warning btn-sm btn-block">
            <?php echo Lang::T('Login as Customer');?>

        </a>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['d']->value['coordinates']) {?>
    
        <?php echo '<script'; ?>
 src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            function setupMap(lat, lon) {
                var map = L.map('map').setView([lat, lon], 17);
                L.tileLayer('https://{s}.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}&s=Ga', {
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                    maxZoom: 20
            }).addTo(map);
            var marker = L.marker([lat, lon]).addTo(map);
            }
            window.onload = function() {
                setupMap(<?php echo $_smarty_tpl->tpl_vars['d']->value['coordinates'];?>
);
            }
        <?php echo '</script'; ?>
>
    
<?php }
$_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
