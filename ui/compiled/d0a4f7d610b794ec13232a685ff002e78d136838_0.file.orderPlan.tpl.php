<?php
/* Smarty version 4.5.3, created on 2025-07-23 15:51:26
  from '/var/www/html/alpha/ui/ui/customer/orderPlan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6880dacef37a19_17306515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0a4f7d610b794ec13232a685ff002e78d136838' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/customer/orderPlan.tpl',
      1 => 1753275072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header.tpl' => 1,
    'file:customer/footer.tpl' => 1,
  ),
),false)) {
function content_6880dacef37a19_17306515 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- user-orderPlan -->
<div class="row">
    <div class="col-sm-12">
        <div class="box box-solid box-default">
            <div class="box-header"><?php echo Lang::T('Order Internet Package');?>
</div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_enable']) {?>
            <?php if ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'PPPoE') {?>
                <?php if (Lang::arrayCount($_smarty_tpl->tpl_vars['radius_pppoe']->value) > 0) {?>
                    <ol class="breadcrumb">
                        <li><?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_plan'] == '') {?>Radius Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['radius_plan'];
}?></li>
                        <li><?php if ($_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'] == '') {?>Home Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'];
}?></li>
                    </ol>
                    <div class="row">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['radius_pppoe']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                            <div class="col col-md-4">
                                <div class="box box-primary">
                                    <div class="box-header text-bold"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</div>
                                    <div class="table-responsive">
                                        <div style="margin-left: 5px; margin-right: 5px;">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo Lang::T('Type');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>
</td>
                                                    </tr>
                                                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                                                        <tr>
                                                            <td><?php echo Lang::T('Bandwidth');?>
</td>
                                                            <td api-get-text="<?php echo Text::url('autoload_user/bw_name/');
echo $_smarty_tpl->tpl_vars['plan']->value['id_bw'];?>
"></td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td><?php echo Lang::T('Price');?>
</td>
                                                        <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                                                            <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                                                <sup
                                                                    style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>
</sup>
                                                            <?php }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo Lang::T('Validity');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <a href="<?php echo Text::url('order/gateway/radius/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                            onclick="return ask(this, '<?php echo Lang::T('Buy this? your active package will be overwrite');?>
')"
                                            class="btn btn-sm btn-block btn-warning text-black"><?php echo Lang::T('Buy');?>
</a>
                                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && $_smarty_tpl->tpl_vars['_c']->value['allow_balance_transfer'] == 'yes' && $_smarty_tpl->tpl_vars['_user']->value['balance'] >= $_smarty_tpl->tpl_vars['plan']->value['price']) {?>
                                            <a href="<?php echo Text::url('order/send/radius/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                                onclick="return ask(this, '<?php echo Lang::T('Buy this for friend account?');?>
')"
                                                class="btn btn-sm btn-block btn-primary"><?php echo Lang::T('Buy for friend');?>
</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php }?>
            <?php } elseif ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'Hotspot') {?>
                <?php if (Lang::arrayCount($_smarty_tpl->tpl_vars['radius_hotspot']->value) > 0) {?>
                    <ol class="breadcrumb">
                        <li><?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_plan'] == '') {?>Radius Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['radius_plan'];
}?></li>
                        <li><?php if ($_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'] == '') {?>Hotspot Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'];
}?></li>
                    </ol>
                    <div class="row">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['radius_hotspot']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                            <div class="col col-md-4">
                                <div class="box box-primary">
                                    <div class="box-header text-bold"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</div>
                                    <div class="table-responsive">
                                        <div style="margin-left: 5px; margin-right: 5px;">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo Lang::T('Type');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>
</td>
                                                    </tr>
                                                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                                                        <tr>
                                                            <td><?php echo Lang::T('Bandwidth');?>
</td>
                                                            <td api-get-text="<?php echo Text::url('autoload_user/bw_name/');
echo $_smarty_tpl->tpl_vars['plan']->value['id_bw'];?>
"></td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td><?php echo Lang::T('Price');?>
</td>
                                                        <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                                                            <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                                                <sup
                                                                    style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>
</sup>
                                                            <?php }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo Lang::T('Validity');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <a href="<?php echo Text::url('order/gateway/radius/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                            onclick="return ask(this, '<?php echo Lang::T('Buy this? your active package will be overwrite');?>
')"
                                            class="btn btn-sm btn-block btn-warning text-black"><?php echo Lang::T('Buy');?>
</a>
                                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && $_smarty_tpl->tpl_vars['_c']->value['allow_balance_transfer'] == 'yes' && $_smarty_tpl->tpl_vars['_user']->value['balance'] >= $_smarty_tpl->tpl_vars['plan']->value['price']) {?>
                                            <a href="<?php echo Text::url('order/send/radius/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                                onclick="return ask(this, '<?php echo Lang::T('Buy this for friend account?');?>
')"
                                                class="btn btn-sm btn-block btn-primary"><?php echo Lang::T('Buy for friend');?>
</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'Others' || $_smarty_tpl->tpl_vars['_user']->value['service_type'] == '' && (Lang::arrayCount($_smarty_tpl->tpl_vars['radius_pppoe']->value) > 0 || Lang::arrayCount($_smarty_tpl->tpl_vars['radius_hotspot']->value) > 0)) {?>
                <ol class="breadcrumb">
                    <li><?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_plan'] == '') {?>Radius Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['radius_plan'];
}?></li>
                    <li><?php if ($_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'] == '') {?>PPPOE Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'];
}?></li>
                </ol>
                <?php if (Lang::arrayCount($_smarty_tpl->tpl_vars['radius_pppoe']->value) > 0) {?>
                    <div class="row">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['radius_pppoe']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                            <div class="col col-md-4">
                                <div class="box box-primary">
                                    <div class="box-header text-bold"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</div>
                                    <div class="table-responsive">
                                        <div style="margin-left: 5px; margin-right: 5px;">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo Lang::T('Type');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>
</td>
                                                    </tr>
                                                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                                                        <tr>
                                                            <td><?php echo Lang::T('Bandwidth');?>
</td>
                                                            <td api-get-text="<?php echo Text::url('autoload_user/bw_name/');
echo $_smarty_tpl->tpl_vars['plan']->value['id_bw'];?>
"></td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td><?php echo Lang::T('Price');?>
</td>
                                                        <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                                                            <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                                                <sup
                                                                    style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>
</sup>
                                                            <?php }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo Lang::T('Validity');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <a href="<?php echo Text::url('order/gateway/pppoe/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                            onclick="return ask(this, '<?php echo Lang::T('Buy this? your active package will be overwritten');?>
')"
                                            class="btn btn-sm btn-block btn-warning text-black"><?php echo Lang::T('Buy');?>
</a>
                                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && $_smarty_tpl->tpl_vars['_c']->value['allow_balance_transfer'] == 'yes' && $_smarty_tpl->tpl_vars['_user']->value['balance'] >= $_smarty_tpl->tpl_vars['plan']->value['price']) {?>
                                            <a href="<?php echo Text::url('order/send/pppoe/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                                onclick="return ask(this, '<?php echo Lang::T('Buy this for friend account?');?>
')"
                                                class="btn btn-sm btn-block btn-primary"><?php echo Lang::T('Buy for friend');?>
</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php }?>
                <?php if (Lang::arrayCount($_smarty_tpl->tpl_vars['radius_hotspot']->value) > 0) {?>
                    <ol class="breadcrumb">
                        <li><?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_plan'] == '') {?>Radius Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['radius_plan'];
}?></li>
                        <li><?php if ($_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'] == '') {?>Hotspot Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'];
}?></li>
                    </ol>
                    <div class="row">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['radius_hotspot']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                            <div class="col col-md-4">
                                <div class="box box-primary">
                                    <div class="box-header text-bold"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</div>
                                    <div class="table-responsive">
                                        <div style="margin-left: 5px; margin-right: 5px;">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo Lang::T('Type');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>
</td>
                                                    </tr>
                                                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                                                        <tr>
                                                            <td><?php echo Lang::T('Bandwidth');?>
</td>
                                                            <td api-get-text="<?php echo Text::url('autoload_user/bw_name/');
echo $_smarty_tpl->tpl_vars['plan']->value['id_bw'];?>
"></td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td><?php echo Lang::T('Price');?>
</td>
                                                        <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                                                            <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                                                <sup
                                                                    style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>
</sup>
                                                            <?php }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo Lang::T('Validity');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <a href="<?php echo Text::url('order/gateway/hotspot/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                            onclick="return ask(this, '<?php echo Lang::T('Buy this? your active package will be overwritten');?>
')"
                                            class="btn btn-sm btn-block btn-warning text-black"><?php echo Lang::T('Buy');?>
</a>
                                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && $_smarty_tpl->tpl_vars['_c']->value['allow_balance_transfer'] == 'yes' && $_smarty_tpl->tpl_vars['_user']->value['balance'] >= $_smarty_tpl->tpl_vars['plan']->value['price']) {?>
                                        <a href="<?php echo Text::url('order/send/hotspot/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                            onclick="return ask(this, '<?php echo Lang::T('Buy this for friend account?');?>
')"
                                            class="btn btn-sm btn-block btn-primary"><?php echo Lang::T('Buy for friend');?>
</a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            <?php }?>
        <?php }?>
        <?php }?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['routers']->value, 'router');
$_smarty_tpl->tpl_vars['router']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['router']->value) {
$_smarty_tpl->tpl_vars['router']->do_else = false;
?>
            <?php if (Validator::isRouterHasPlan($_smarty_tpl->tpl_vars['plans_hotspot']->value,$_smarty_tpl->tpl_vars['router']->value['name']) || Validator::isRouterHasPlan($_smarty_tpl->tpl_vars['plans_pppoe']->value,$_smarty_tpl->tpl_vars['router']->value['name']) || Validator::isRouterHasPlan($_smarty_tpl->tpl_vars['plans_vpn']->value,$_smarty_tpl->tpl_vars['router']->value['name'])) {?>
            <div class="box box-solid box-primary bg-gray">
                <div class="box-header text-white text-bold"><?php echo $_smarty_tpl->tpl_vars['router']->value['name'];?>
</div>
                <?php if ($_smarty_tpl->tpl_vars['router']->value['description'] != '') {?>
                    <div class="box-body">
                        <?php echo $_smarty_tpl->tpl_vars['router']->value['description'];?>

                    </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'Hotspot' && Validator::countRouterPlan($_smarty_tpl->tpl_vars['plans_hotspot']->value,$_smarty_tpl->tpl_vars['router']->value['name']) > 0) {?>
                    <div class="box-header text-white"><?php if ($_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'] == '') {?>Hotspot Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'];
}?>
                    </div>
                    <div class="box-body row">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans_hotspot']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['router']->value['name'] == $_smarty_tpl->tpl_vars['plan']->value['routers']) {?>
                                <div class="col col-md-4">
                                    <div class="box box-primary">
                                        <div class="box-header text-center text-bold"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</div>
                                        <div class="table-responsive">
                                            <div style="margin-left: 5px; margin-right: 5px;">
                                                <table class="table table-bordered table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo Lang::T('Type');?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>
</td>
                                                        </tr>
                                                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                                                            <tr>
                                                                <td><?php echo Lang::T('Bandwidth');?>
</td>
                                                                <td api-get-text="<?php echo Text::url('autoload_user/bw_name/');
echo $_smarty_tpl->tpl_vars['plan']->value['id_bw'];?>
">
                                                                </td>
                                                            </tr>
                                                        <?php }?>
                                                        <tr>
                                                            <td><?php echo Lang::T('Price');?>
</td>
                                                            <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                                                                <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                                                    <sup
                                                                        style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>
</sup>
                                                                <?php }?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo Lang::T('Validity');?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <a href="<?php echo Text::url('order/gateway/',$_smarty_tpl->tpl_vars['router']->value['id'],'/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                                onclick="return ask(this, '<?php echo Lang::T('Buy this? your active package will be overwrite');?>
')"
                                                class="btn btn-sm btn-block btn-warning text-black"><?php echo Lang::T('Buy');?>
</a>
                                            <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && $_smarty_tpl->tpl_vars['_c']->value['allow_balance_transfer'] == 'yes' && $_smarty_tpl->tpl_vars['_user']->value['balance'] >= $_smarty_tpl->tpl_vars['plan']->value['price']) {?>
                                                <a href="<?php echo Text::url('order/send/',$_smarty_tpl->tpl_vars['router']->value['id'],'/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                                    onclick="return ask(this, '<?php echo Lang::T('Buy this for friend account?');?>
')"
                                                    class="btn btn-sm btn-block btn-primary"><?php echo Lang::T('Buy for friend');?>
</a>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'PPPoE' && Validator::countRouterPlan($_smarty_tpl->tpl_vars['plans_pppoe']->value,$_smarty_tpl->tpl_vars['router']->value['name']) > 0) {?>
                    <div class="box-header text-white"><?php if ($_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'] == '') {?>PPPOE Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'];
}?></div>
                    <div class="box-body row">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans_pppoe']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['router']->value['name'] == $_smarty_tpl->tpl_vars['plan']->value['routers']) {?>
                                <div class="col col-md-4">
                                    <div class="box box- box-primary">
                                        <div class="box-header text-bold text-center"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</div>
                                        <div class="table-responsive">
                                            <div style="margin-left: 5px; margin-right: 5px;">
                                                <table class="table table-bordered table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo Lang::T('Type');?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>
</td>
                                                        </tr>
                                                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                                                            <tr>
                                                                <td><?php echo Lang::T('Bandwidth');?>
</td>
                                                                <td api-get-text="<?php echo Text::url('autoload_user/bw_name/');
echo $_smarty_tpl->tpl_vars['plan']->value['id_bw'];?>
">
                                                                </td>
                                                            </tr>
                                                        <?php }?>
                                                        <tr>
                                                            <td><?php echo Lang::T('Price');?>
</td>
                                                            <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                                                                <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                                                    <sup
                                                                        style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>
</sup>
                                                                <?php }?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo Lang::T('Validity');?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                        	<?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes') {?>
        						<?php if ($_smarty_tpl->tpl_vars['_user']->value['balance'] >= $_smarty_tpl->tpl_vars['plan']->value['price']) {?>
            							<a href="<?php echo Text::url('order/gateway/',$_smarty_tpl->tpl_vars['router']->value['id'],'/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                							onclick="return ask(this, '<?php echo Lang::T('Buy this? your active package will be overwrite');?>
')"
                							class="btn btn-sm btn-block btn-warning text-black">
                							<?php echo Lang::T('Buy');?>

            							</a>
        							<?php } else { ?>
            								<a class="btn btn-sm btn-block btn-default text-muted" disabled>
                							<?php echo Lang::T('Insufficient Balance');?>

            								</a>
        							<?php }?>
    							<?php }?>
					</div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'VPN' && Validator::countRouterPlan($_smarty_tpl->tpl_vars['plans_vpn']->value,$_smarty_tpl->tpl_vars['router']->value['name']) > 0) {?>
                    <div class="box-header text-white"><?php if ($_smarty_tpl->tpl_vars['_c']->value['vpn_plan'] == '') {?>VPN Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['vpn_plan'];
}?></div>
                    <div class="box-body row">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans_vpn']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['router']->value['name'] == $_smarty_tpl->tpl_vars['plan']->value['routers']) {?>
                                <div class="col col-md-4">
                                    <div class="box box- box-primary">
                                        <div class="box-header text-bold text-center"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</div>
                                        <div class="table-responsive">
                                            <div style="margin-left: 5px; margin-right: 5px;">
                                                <table class="table table-bordered table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo Lang::T('Type');?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>
</td>
                                                        </tr>
                                                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                                                            <tr>
                                                                <td><?php echo Lang::T('Bandwidth');?>
</td>
                                                                <td api-get-text="<?php echo Text::url('autoload_user/bw_name/');
echo $_smarty_tpl->tpl_vars['plan']->value['id_bw'];?>
">
                                                                </td>
                                                            </tr>
                                                        <?php }?>
                                                        <tr>
                                                            <td><?php echo Lang::T('Price');?>
</td>
                                                            <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                                                                <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                                                    <sup
                                                                        style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>
</sup>
                                                                <?php }?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo Lang::T('Validity');?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <a href="<?php echo Text::url('order/gateway/',$_smarty_tpl->tpl_vars['router']->value['id'],'/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                                onclick="return ask(this, '<?php echo Lang::T('Buy this? your active package will be overwrite');?>
')"
                                                class="btn btn-sm btn-block btn-warning text-black"><?php echo Lang::T('Buy');?>
</a>
                                            <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && $_smarty_tpl->tpl_vars['_c']->value['allow_balance_transfer'] == 'yes' && $_smarty_tpl->tpl_vars['_user']->value['balance'] >= $_smarty_tpl->tpl_vars['plan']->value['price']) {?>
                                                <a href="<?php echo Text::url('order/send/',$_smarty_tpl->tpl_vars['router']->value['id'],'/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                                    onclick="return ask(this, '<?php echo Lang::T('Buy this for friend account?');?>
')"
                                                    class="btn btn-sm btn-block btn-primary"><?php echo Lang::T('Buy for friend');?>
</a>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'Others' || $_smarty_tpl->tpl_vars['_user']->value['service_type'] == '' && (Validator::countRouterPlan($_smarty_tpl->tpl_vars['plans_hotspot']->value,$_smarty_tpl->tpl_vars['router']->value['name']) > 0 || Validator::countRouterPlan($_smarty_tpl->tpl_vars['plans_pppoe']->value,$_smarty_tpl->tpl_vars['router']->value['name']) > 0 || Validator::countRouterPlan($_smarty_tpl->tpl_vars['plans_vpn']->value,$_smarty_tpl->tpl_vars['router']->value['name']) > 0)) {?>
                <div class="box-header text-white"><?php if ($_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'] == '') {?>Hotspot Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'];
}?>
                </div>
                <div class="box-body row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans_hotspot']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['router']->value['name'] == $_smarty_tpl->tpl_vars['plan']->value['routers']) {?>
                            <div class="col col-md-4">
                                <div class="box box-primary">
                                    <div class="box-header text-center text-bold"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</div>
                                    <div class="table-responsive">
                                        <div style="margin-left: 5px; margin-right: 5px;">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo Lang::T('Type');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>
</td>
                                                    </tr>
                                                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                                                        <tr>
                                                            <td><?php echo Lang::T('Bandwidth');?>
</td>
                                                            <td api-get-text="<?php echo Text::url('autoload_user/bw_name/');
echo $_smarty_tpl->tpl_vars['plan']->value['id_bw'];?>
">
                                                            </td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td><?php echo Lang::T('Price');?>
</td>
                                                        <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                                                            <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                                                <sup
                                                                    style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>
</sup>
                                                            <?php }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo Lang::T('Validity');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <a href="<?php echo Text::url('order/gateway/',$_smarty_tpl->tpl_vars['router']->value['id'],'/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                            onclick="return ask(this, '<?php echo Lang::T('Buy this? your active package will be overwrite');?>
')"
                                            class="btn btn-sm btn-block btn-warning text-black"><?php echo Lang::T('Buy');?>
</a>
                                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && $_smarty_tpl->tpl_vars['_c']->value['allow_balance_transfer'] == 'yes' && $_smarty_tpl->tpl_vars['_user']->value['balance'] >= $_smarty_tpl->tpl_vars['plan']->value['price']) {?>
                                            <a href="<?php echo Text::url('order/send/',$_smarty_tpl->tpl_vars['router']->value['id'],'/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                                onclick="return ask(this, '<?php echo Lang::T('Buy this for friend account?');?>
')"
                                                class="btn btn-sm btn-block btn-primary"><?php echo Lang::T('Buy for friend');?>
</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <div class="box-header text-white"><?php if ($_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'] == '') {?>PPPOE Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'];
}?></div>
                <div class="box-body row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans_pppoe']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['router']->value['name'] == $_smarty_tpl->tpl_vars['plan']->value['routers']) {?>
                            <div class="col col-md-4">
                                <div class="box box- box-primary">
                                    <div class="box-header text-bold text-center"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</div>
                                    <div class="table-responsive">
                                        <div style="margin-left: 5px; margin-right: 5px;">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo Lang::T('Type');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>
</td>
                                                    </tr>
                                                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                                                        <tr>
                                                            <td><?php echo Lang::T('Bandwidth');?>
</td>
                                                            <td api-get-text="<?php echo Text::url('autoload_user/bw_name/');
echo $_smarty_tpl->tpl_vars['plan']->value['id_bw'];?>
">
                                                            </td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td><?php echo Lang::T('Price');?>
</td>
                                                        <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                                                            <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                                                <sup
                                                                    style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>
</sup>
                                                            <?php }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo Lang::T('Validity');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <a href="<?php echo Text::url('order/gateway/',$_smarty_tpl->tpl_vars['router']->value['id'],'/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                            onclick="return ask(this, '<?php echo Lang::T('Buy this? your active package will be overwrite');?>
')"
                                            class="btn btn-sm btn-block btn-warning text-black"><?php echo Lang::T('Buy');?>
</a>
                                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && $_smarty_tpl->tpl_vars['_c']->value['allow_balance_transfer'] == 'yes' && $_smarty_tpl->tpl_vars['_user']->value['balance'] >= $_smarty_tpl->tpl_vars['plan']->value['price']) {?>
                                            <a href="<?php echo Text::url('order/send/',$_smarty_tpl->tpl_vars['router']->value['id'],'/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                                onclick="return ask(this, '<?php echo Lang::T('Buy this for friend account?');?>
')"
                                                class="btn btn-sm btn-block btn-primary"><?php echo Lang::T('Buy for friend');?>
</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <div class="box-header text-white"><?php if ($_smarty_tpl->tpl_vars['_c']->value['vpn_plan'] == '') {?>VPN Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['vpn_plan'];
}?></div>
                <div class="box-body row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans_vpn']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['router']->value['name'] == $_smarty_tpl->tpl_vars['plan']->value['routers']) {?>
                            <div class="col col-md-4">
                                <div class="box box- box-primary">
                                    <div class="box-header text-bold text-center"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</div>
                                    <div class="table-responsive">
                                        <div style="margin-left: 5px; margin-right: 5px;">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo Lang::T('Type');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>
</td>
                                                    </tr>
                                                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                                                        <tr>
                                                            <td><?php echo Lang::T('Bandwidth');?>
</td>
                                                            <td api-get-text="<?php echo Text::url('autoload_user/bw_name/');
echo $_smarty_tpl->tpl_vars['plan']->value['id_bw'];?>
">
                                                            </td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td><?php echo Lang::T('Price');?>
</td>
                                                        <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                                                            <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                                                <sup
                                                                    style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>
</sup>
                                                            <?php }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo Lang::T('Validity');?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <a href="<?php echo Text::url('order/gateway/',$_smarty_tpl->tpl_vars['router']->value['id'],'/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                            onclick="return ask(this, '<?php echo Lang::T('Buy this? your active package will be overwrite');?>
')"
                                            class="btn btn-sm btn-block btn-warning text-black"><?php echo Lang::T('Buy');?>
</a>
                                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && $_smarty_tpl->tpl_vars['_c']->value['allow_balance_transfer'] == 'yes' && $_smarty_tpl->tpl_vars['_user']->value['balance'] >= $_smarty_tpl->tpl_vars['plan']->value['price']) {?>
                                            <a href="<?php echo Text::url('order/send/',$_smarty_tpl->tpl_vars['router']->value['id'],'/',$_smarty_tpl->tpl_vars['plan']->value['id'],'&stoken=',App::getToken());?>
"
                                                onclick="return ask(this, '<?php echo Lang::T('Buy this for friend account?');?>
')"
                                                class="btn btn-sm btn-block btn-primary"><?php echo Lang::T('Buy for friend');?>
</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            <?php }?>
        </div>
        <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
