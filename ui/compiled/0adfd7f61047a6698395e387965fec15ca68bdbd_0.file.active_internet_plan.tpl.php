<?php
/* Smarty version 4.5.3, created on 2025-07-23 15:27:17
  from '/var/www/html/alpha/ui/ui/widget/customers/active_internet_plan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6880d525491296_05865078',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0adfd7f61047a6698395e387965fec15ca68bdbd' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/widget/customers/active_internet_plan.tpl',
      1 => 1753273627,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6880d525491296_05865078 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_bills']->value) {?>
    <div class="box box-primary box-solid">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_bills']->value, '_bill');
$_smarty_tpl->tpl_vars['_bill']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_bill']->value) {
$_smarty_tpl->tpl_vars['_bill']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['routers'] != 'radius') {?>
                <div class="box-header">
                    <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['_bill']->value['routers'];?>
</h3>
                    <div class="btn-group pull-right">
                        <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'Hotspot') {?>
                            <?php if ($_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'] == '') {?>Hotspot Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'];
}?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'PPPOE') {?>
                            <?php if ($_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'] == '') {?>Monthly Subscription<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'];
}?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'VPN') {?>
                            <?php if ($_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'] == '') {?>VPN Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['vpn_plan'];
}?>
                        <?php }?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="box-header">
                    <h3 class="box-title"><?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_plan'] == '') {?>Radius Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['radius_plan'];
}?></h3>
                </div>
            <?php }?>
            <div style="margin-left: 5px; margin-right: 5px;">
                <table class="table table-bordered table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                    <tr>
                        <td class="small text-primary text-uppercase text-normal"><?php echo Lang::T('Package Name');?>
</td>
                        <td class="small mb15">
                            <?php echo $_smarty_tpl->tpl_vars['_bill']->value['namebp'];?>

                            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['status'] != 'on') {?>
                                <a class="label label-danger pull-right"
                                    href="<?php echo Text::url('order/package');?>
"><?php echo Lang::T('Expired');?>
</a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                        <tr>
                            <td class="small text-primary text-uppercase text-normal"><?php echo Lang::T('Bandwidth');?>
</td>
                            <td class="small mb15">
                                <?php echo $_smarty_tpl->tpl_vars['_bill']->value['name_bw'];?>

                            </td>
                        </tr>
                    <?php }?>
                    <tr>
                        <td class="small text-info text-uppercase text-normal"><?php echo Lang::T('Created On');?>
</td>
                        <td class="small mb15">
                            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['time'] != '') {?>
                                <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['_bill']->value['recharged_on'],$_smarty_tpl->tpl_vars['_bill']->value['recharged_time']);?>

                            <?php }?>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="small text-danger text-uppercase text-normal"><?php echo Lang::T('Expires On');?>
</td>
                        <td class="small mb15 text-danger">
                            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['time'] != '') {?>
                                <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['_bill']->value['expiration'],$_smarty_tpl->tpl_vars['_bill']->value['time']);?>

                            <?php }?>&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td class="small text-success text-uppercase text-normal"><?php echo Lang::T('Type');?>
</td>
                        <td class="small mb15 text-success">
                            <b><?php if ($_smarty_tpl->tpl_vars['_bill']->value['prepaid'] == 'yes') {?>Prepaid<?php } else { ?>Postpaid<?php }?></b>
                            <?php echo $_smarty_tpl->tpl_vars['_bill']->value['plan_type'];?>

                        </td>
                    </tr>
                    <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'VPN' && $_smarty_tpl->tpl_vars['_bill']->value['routers'] == $_smarty_tpl->tpl_vars['vpn']->value['routers']) {?>
                        <tr>
                            <td class="small text-success text-uppercase text-normal"><?php echo Lang::T('Public IP');?>
</td>
                            <td class="small mb15"><?php echo $_smarty_tpl->tpl_vars['vpn']->value['public_ip'];?>
 / <?php echo $_smarty_tpl->tpl_vars['vpn']->value['port_name'];?>
</td>
                        </tr>
                        <tr>
                            <td class="small text-success text-uppercase text-normal"><?php echo Lang::T('Private IP');?>
</td>
                            <td class="small mb15"><?php echo $_smarty_tpl->tpl_vars['_user']->value['pppoe_ip'];?>
</td>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cf']->value, 'tcf');
$_smarty_tpl->tpl_vars['tcf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tcf']->value) {
$_smarty_tpl->tpl_vars['tcf']->do_else = false;
?>
                            <tr>
                                <?php if ($_smarty_tpl->tpl_vars['tcf']->value['field_name'] == 'Winbox' || $_smarty_tpl->tpl_vars['tcf']->value['field_name'] == 'Api' || $_smarty_tpl->tpl_vars['tcf']->value['field_name'] == 'Web') {?>
                                    <td class="small text-info text-uppercase text-normal"><?php echo $_smarty_tpl->tpl_vars['tcf']->value['field_name'];?>
 - Port</td>
                                    <td class="small mb15"><a href="http://<?php echo $_smarty_tpl->tpl_vars['vpn']->value['public_ip'];?>
:<?php echo $_smarty_tpl->tpl_vars['tcf']->value['field_value'];?>
"
                                            target="_blank"><?php echo $_smarty_tpl->tpl_vars['tcf']->value['field_value'];?>
</a></td>
                                </tr>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['nux_ip']->value != '') {?>
                        <tr>
                            <td class="small text-primary text-uppercase text-normal"><?php echo Lang::T('Current IP');?>
</td>
                            <td class="small mb15"><?php echo $_smarty_tpl->tpl_vars['nux_ip']->value;?>
</td>
                        </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['nux_mac']->value != '') {?>
                        <tr>
                            <td class="small text-primary text-uppercase text-normal"><?php echo Lang::T('Current MAC');?>
</td>
                            <td class="small mb15"><?php echo $_smarty_tpl->tpl_vars['nux_mac']->value;?>
</td>
                        </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'Hotspot' && $_smarty_tpl->tpl_vars['_bill']->value['status'] == 'on' && $_smarty_tpl->tpl_vars['_bill']->value['routers'] != 'radius' && $_smarty_tpl->tpl_vars['_c']->value['hs_auth_method'] != 'hchap') {?>
                        <tr>
                            <td class="small text-primary text-uppercase text-normal"><?php echo Lang::T('Login Status');?>
</td>
                            <td class="small mb15" id="login_status_<?php echo $_smarty_tpl->tpl_vars['_bill']->value['id'];?>
">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/images/loading.gif">
                            </td>
                        </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'Hotspot' && $_smarty_tpl->tpl_vars['_bill']->value['status'] == 'on' && $_smarty_tpl->tpl_vars['_c']->value['hs_auth_method'] == 'hchap') {?>
                        <tr>
                            <td class="small text-primary text-uppercase text-normal"><?php echo Lang::T('Login Status');?>
</td>
                            <td class="small mb15">
                                <?php if ($_smarty_tpl->tpl_vars['logged']->value == '1') {?>
                                    <a href="http://<?php echo $_smarty_tpl->tpl_vars['hostname']->value;?>
/status" class="btn btn-success btn-xs btn-block">
                                        <?php echo Lang::T('You are Online, Check Status');?>
</a>
                                <?php } else { ?>
                                    <a href="<?php echo Text::url('home&mikrotik=login');?>
"
                                        onclick="return ask(this, '<?php echo Lang::T('Connect to Internet');?>
')"
                                        class="btn btn-danger btn-xs btn-block"><?php echo Lang::T('Not Online, Login now?');?>
</a>
                                <?php }?>
                            </td>
                        </tr>
                    <?php }?>
                    <tr>
                        <td class="small text-primary text-uppercase text-normal">
                            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['status'] == 'on' && $_smarty_tpl->tpl_vars['_bill']->value['prepaid'] != 'YES') {?>
                                <a href="<?php echo Text::url('home&deactivate=',$_smarty_tpl->tpl_vars['_bill']->value['id']);?>
"
                                    onclick="return ask(this, '<?php echo Lang::T('Deactivate');?>
?')" class="btn btn-danger btn-xs"><i
                                        class="glyphicon glyphicon-trash"></i></a>
                            <?php }?>
                        </td>
                        <td class="small row">
                            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['status'] != 'on' && $_smarty_tpl->tpl_vars['_bill']->value['prepaid'] != 'yes' && $_smarty_tpl->tpl_vars['_c']->value['extend_expired']) {?>
                                <a class="btn btn-warning text-black btn-sm"
                                    href="<?php echo Text::url('home&extend=',$_smarty_tpl->tpl_vars['_bill']->value['id'],'&stoken=',App::getToken());?>
"
                                    onclick="return ask(this, '<?php echo Text::toHex($_smarty_tpl->tpl_vars['_c']->value['extend_confirmation']);?>
')"><?php echo Lang::T('Extend');?>
</a>
                            <?php }?>
                            <a class="btn btn-warning text-black pull-right btn-sm"
                                href="<?php echo Text::url('home&sync=',$_smarty_tpl->tpl_vars['_bill']->value['id'],'&stoken=',App::getToken());?>
"
                                onclick="return ask(this, '<?php echo Lang::T('Sync account if you failed login to internet');?>
?')"
                                data-toggle="tooltip" data-placement="top"
                                title="<?php echo Lang::T('Sync account if you failed login to internet');?>
"><span
                                    class="glyphicon glyphicon-refresh" aria-hidden="true"></span> <?php echo Lang::T('Sync');?>
</a>
                        </td>
                    </tr>
                </table>
            </div>
            &nbsp;&nbsp;
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_bills']->value, '_bill');
$_smarty_tpl->tpl_vars['_bill']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_bill']->value) {
$_smarty_tpl->tpl_vars['_bill']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'Hotspot' && $_smarty_tpl->tpl_vars['_bill']->value['status'] == 'on' && $_smarty_tpl->tpl_vars['_c']->value['hs_auth_method'] != 'hchap') {?>
            <?php echo '<script'; ?>
>
                setTimeout(() => {
                    $.ajax({
                        url: "<?php echo Text::url('autoload_user/isLogin/');
echo $_smarty_tpl->tpl_vars['_bill']->value['id'];?>
",
                        cache: false,
                        success: function(msg) {
                            $("#login_status_<?php echo $_smarty_tpl->tpl_vars['_bill']->value['id'];?>
").html(msg);
                        }
                    });
                }, 2000);
            <?php echo '</script'; ?>
>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
