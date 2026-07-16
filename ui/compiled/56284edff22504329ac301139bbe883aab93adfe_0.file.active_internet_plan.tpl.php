<?php
/* Smarty version 4.5.3, created on 2025-09-24 15:30:48
  from '/var/www/html/demo/ui/ui/widget/customers/active_internet_plan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68d3e478764e90_26710815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56284edff22504329ac301139bbe883aab93adfe' => 
    array (
      0 => '/var/www/html/demo/ui/ui/widget/customers/active_internet_plan.tpl',
      1 => 1758716996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d3e478764e90_26710815 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_bills']->value) {?>
    <div class="box box-primary box-solid bills-box">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_bills']->value, '_bill');
$_smarty_tpl->tpl_vars['_bill']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_bill']->value) {
$_smarty_tpl->tpl_vars['_bill']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['routers'] != 'radius') {?>
                <div class="box-header bill-header">
                    <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['_bill']->value['routers'];?>
</h3>
                    <div class="btn-group pull-right plan-badge">
                        <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'Hotspot') {?>
                            <?php if ($_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'] == '') {?>Hotspot Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'];
}?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'PPPOE') {?>
                            <?php if ($_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'] == '') {?>PPPOE Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'];
}?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'VPN') {?>
                            <?php if ($_smarty_tpl->tpl_vars['_c']->value['vpn_plan'] == '') {?>VPN Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['vpn_plan'];
}?>
                        <?php }?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="box-header bill-header">
                    <h3 class="box-title"><?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_plan'] == '') {?>Radius Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['radius_plan'];
}?></h3>
                </div>
            <?php }?>

            <div class="bill-body">
                <table class="table table-bordered table-hover bill-table">
                    <tr class="row-accent">
                        <td><?php echo Lang::T('Package Name');?>
</td>
                        <td>
                            <span class="bold-text"><?php echo $_smarty_tpl->tpl_vars['_bill']->value['namebp'];?>
</span>
                            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['status'] != 'on') {?>
                                <a class="status-badge expired" href="<?php echo Text::url('order/package');?>
"><?php echo Lang::T('Expired');?>
</a>
                            <?php }?>
                        </td>
                    </tr>

                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                        <tr>
                            <td><?php echo Lang::T('Bandwidth');?>
</td>
                            <td><span class="highlight"><?php echo $_smarty_tpl->tpl_vars['_bill']->value['name_bw'];?>
</span></td>
                        </tr>
                    <?php }?>

                    <tr class="row-accent">
                        <td><?php echo Lang::T('Created On');?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['time'] != '') {?>
                                <span class="created-on"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['_bill']->value['recharged_on'],$_smarty_tpl->tpl_vars['_bill']->value['recharged_time']);?>
</span>
                            <?php }?>
                        </td>
                    </tr>

                    <tr>
                        <td><?php echo Lang::T('Expires On');?>
</td>
                        <td class="expires">
                            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['time'] != '') {?>
                                <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['_bill']->value['expiration'],$_smarty_tpl->tpl_vars['_bill']->value['time']);?>

                            <?php }?>
                        </td>
                    </tr>

                    <tr class="row-accent">
                        <td><?php echo Lang::T('Type');?>
</td>
                        <td>
                            <span class="type-badge"><?php if ($_smarty_tpl->tpl_vars['_bill']->value['prepaid'] == 'yes') {?>Prepaid<?php } else { ?>Postpaid<?php }?></span>
                            <span class="ml-2"><?php echo $_smarty_tpl->tpl_vars['_bill']->value['plan_type'];?>
</span>
                        </td>
                    </tr>

                    <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'VPN' && $_smarty_tpl->tpl_vars['_bill']->value['routers'] == $_smarty_tpl->tpl_vars['vpn']->value['routers']) {?>
                        <tr>
                            <td><?php echo Lang::T('Public IP');?>
</td>
                            <td class="mono"><?php echo $_smarty_tpl->tpl_vars['vpn']->value['public_ip'];?>
 / <?php echo $_smarty_tpl->tpl_vars['vpn']->value['port_name'];?>
</td>
                        </tr>
                        <tr class="row-accent">
                            <td><?php echo Lang::T('Private IP');?>
</td>
                            <td class="mono"><?php echo $_smarty_tpl->tpl_vars['_user']->value['pppoe_ip'];?>
</td>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cf']->value, 'tcf');
$_smarty_tpl->tpl_vars['tcf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tcf']->value) {
$_smarty_tpl->tpl_vars['tcf']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['tcf']->value['field_name'] == 'Winbox' || $_smarty_tpl->tpl_vars['tcf']->value['field_name'] == 'Api' || $_smarty_tpl->tpl_vars['tcf']->value['field_name'] == 'Web') {?>
                                <tr class="<?php if ((1 & (isset($_smarty_tpl->tpl_vars['__smarty_foreach_cf']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_cf']->value['index'] : null))) {?>odd-row<?php } else { ?>row-accent<?php }?>">
                                    <td><?php echo $_smarty_tpl->tpl_vars['tcf']->value['field_name'];?>
 - Port</td>
                                    <td><a href="http://<?php echo $_smarty_tpl->tpl_vars['vpn']->value['public_ip'];?>
:<?php echo $_smarty_tpl->tpl_vars['tcf']->value['field_value'];?>
" target="_blank" class="mono link-bold"><?php echo $_smarty_tpl->tpl_vars['tcf']->value['field_value'];?>
</a></td>
                                </tr>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['nux_ip']->value != '') {?>
                        <tr>
                            <td><?php echo Lang::T('Current IP');?>
</td>
                            <td class="mono bold-text"><?php echo $_smarty_tpl->tpl_vars['nux_ip']->value;?>
</td>
                        </tr>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['nux_mac']->value != '') {?>
                        <tr class="row-accent">
                            <td><?php echo Lang::T('Current MAC');?>
</td>
                            <td class="mono bold-text"><?php echo $_smarty_tpl->tpl_vars['nux_mac']->value;?>
</td>
                        </tr>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'Hotspot' && $_smarty_tpl->tpl_vars['_bill']->value['status'] == 'on' && $_smarty_tpl->tpl_vars['_bill']->value['routers'] != 'radius' && $_smarty_tpl->tpl_vars['_c']->value['hs_auth_method'] != 'hchap') {?>
                        <tr>
                            <td><?php echo Lang::T('Login Status');?>
</td>
                            <td id="login_status_<?php echo $_smarty_tpl->tpl_vars['_bill']->value['id'];?>
">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/images/loading.gif" class="loading-icon">
                            </td>
                        </tr>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'Hotspot' && $_smarty_tpl->tpl_vars['_bill']->value['status'] == 'on' && $_smarty_tpl->tpl_vars['_c']->value['hs_auth_method'] == 'hchap') {?>
                        <tr class="row-accent">
                            <td><?php echo Lang::T('Login Status');?>
</td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['logged']->value == '1') {?>
                                    <a href="http://<?php echo $_smarty_tpl->tpl_vars['hostname']->value;?>
/status" class="btn btn-success btn-xs btn-block">? You are Online, Check Status</a>
                                <?php } else { ?>
                                    <a href="<?php echo Text::url('home&mikrotik=login');?>
" onclick="return ask(this, '<?php echo Lang::T('Connect to Internet');?>
')" class="btn btn-warning btn-xs btn-block">? Not Online, Login now?</a>
                                <?php }?>
                            </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
            &nbsp;&nbsp;
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
<?php }?>

<style>
/* Box and header */
.bills-box {
    border: 1px solid var(--gray-200);
    background: var(--gray-50);
    border-radius: 10px;
    box-shadow: 0 6px 20px rgba(30, 64, 175, 0.15);
    overflow: hidden;
}
.bill-header {
    background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
    color: var(--white);
    padding: 12px 18px;
}
.bill-header h3 {
    font-weight: bold;
    margin: 0;
    font-size: 16px;
}
.plan-badge {
    background: var(--light-blue);
    padding: 4px 8px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 12px;
    color: var(--white);
}

/* Table styling */
.bill-body { padding: 12px; background: var(--white); }
.bill-table { border-color: var(--gray-200); font-size: 13px; }
.bill-table td { border-color: var(--gray-200); padding: 8px 10px; vertical-align: middle; color: var(--text-dark); }
.bill-table tr.row-accent { background: var(--gray-100); }

/* Typography */
.bold-text { font-weight: bold; color: var(--primary-blue); }
.highlight { font-weight: bold; color: var(--accent-blue); }
.created-on { font-weight: bold; color: var(--success-green); }
.expires { font-weight: bold; color: var(--danger-red); }
.type-badge { background: var(--lighter-blue); padding: 3px 8px; border-radius: 4px; font-weight: bold; color: var(--dark-blue); }
.mono { font-family: monospace; letter-spacing: 0.5px; }

/* Status badges */
.status-badge {
    float: right;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: bold;
    color: var(--white);
    text-decoration: none;
}
.status-badge.expired { background: var(--warning-orange); }

/* Loading */
.loading-icon {
    height: 18px;
    opacity: 0.8;
    filter: hue-rotate(190deg) saturate(150%);
}

/* Buttons */
.btn-success { background: var(--success-green); border: none; }
.btn-warning { background: var(--warning-orange); border: none; }

/* Hover states */
.table-hover tbody tr:hover { background-color: var(--lighter-blue) !important; color: var(--white); }
a.link-bold { color: var(--primary-blue); font-weight: bold; text-decoration: none; }
a.link-bold:hover { text-decoration: underline; }

/* Responsive */
@media (max-width: 768px) {
    .bill-table td { font-size: 11px; padding: 6px; }
    .bill-header h3 { font-size: 14px; }
}
</style>
<?php }
}
