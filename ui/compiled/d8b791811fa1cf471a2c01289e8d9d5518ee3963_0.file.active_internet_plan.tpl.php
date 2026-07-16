<?php
/* Smarty version 4.5.3, created on 2025-09-11 23:06:40
  from '/var/www/html/myapp/ui/ui/widget/customers/active_internet_plan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c32bd0832754_36140651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8b791811fa1cf471a2c01289e8d9d5518ee3963' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/widget/customers/active_internet_plan.tpl',
      1 => 1757621187,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68c32bd0832754_36140651 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_bills']->value) {?>
    <div class="box box-primary box-solid" style="border-color: #8B4513; background-color: #FAFAFA; box-shadow: 0 2px 8px rgba(139, 69, 19, 0.1); border-radius: 6px; overflow: hidden;">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_bills']->value, '_bill');
$_smarty_tpl->tpl_vars['_bill']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_bill']->value) {
$_smarty_tpl->tpl_vars['_bill']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['routers'] != 'radius') {?>
                <div class="box-header" style="background-color: #8B4513; color: white; border-bottom: 2px solid #654321; padding: 10px 15px;">
                    <h3 class="box-title" style="color: white; font-weight: bold; margin: 0;"><?php echo $_smarty_tpl->tpl_vars['_bill']->value['routers'];?>
</h3>
                    <div class="btn-group pull-right" style="background-color: #A0522D; color: white; padding: 5px 10px; border-radius: 4px; font-size: 12px; font-weight: bold;">
                        <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'Hotspot') {?>
                            <?php if ($_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'] == '') {?>Hotspot Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_plan'];
}?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'PPPOE') {?>
                            <?php if ($_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'] == '') {?>PPPOE Plan<?php } else {
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
                <div class="box-header" style="background-color: #8B4513; color: white; border-bottom: 2px solid #654321; padding: 10px 15px;">
                    <h3 class="box-title" style="color: white; font-weight: bold; margin: 0;"><?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_plan'] == '') {?>Radius Plan<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['radius_plan'];
}?></h3>
                </div>
            <?php }?>
            <div style="margin-left: 5px; margin-right: 5px; background-color: white; padding: 10px;">
                <table class="table table-bordered table-striped table-bordered table-hover" style="margin-bottom: 0px; border-color: #D2B48C;">
                    <tr style="background-color: #F5F5DC;">
                        <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Package Name');?>
</td>
                        <td class="small mb15" style="color: #654321; border-color: #D2B48C;">
                            <span style="font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['_bill']->value['namebp'];?>
</span>
                            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['status'] != 'on') {?>
                                <a class="label pull-right"
                                   style="background-color: #CD853F; color: white; padding: 4px 8px; text-decoration: none; border-radius: 4px; font-size: 11px;"
                                   href="<?php echo Text::url('order/package');?>
"><?php echo Lang::T('Expired');?>
</a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                        <tr style="background-color: white;">
                            <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Bandwidth');?>
</td>
                            <td class="small mb15" style="color: #654321; border-color: #D2B48C;">
                                <span style="font-weight: bold; color: #A0522D;"><?php echo $_smarty_tpl->tpl_vars['_bill']->value['name_bw'];?>
</span>
                            </td>
                        </tr>
                    <?php }?>
                    <tr style="background-color: #F5F5DC;">
                        <td class="small text-uppercase text-normal" style="color: #6B8E23; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Created On');?>
</td>
                        <td class="small mb15" style="color: #654321; border-color: #D2B48C;">
                            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['time'] != '') {?>
                                <span style="color: #6B8E23; font-weight: bold;"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['_bill']->value['recharged_on'],$_smarty_tpl->tpl_vars['_bill']->value['recharged_time']);?>
</span>
                            <?php }?>
                            &nbsp;</td>
                    </tr>
                    <tr style="background-color: white;">
                        <td class="small text-uppercase text-normal" style="color: #B22222; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Expires On');?>
</td>
                        <td class="small mb15" style="color: #B22222; font-weight: bold; border-color: #D2B48C;">
                            <?php if ($_smarty_tpl->tpl_vars['_bill']->value['time'] != '') {?>
                                <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['_bill']->value['expiration'],$_smarty_tpl->tpl_vars['_bill']->value['time']);?>

                            <?php }?>&nbsp;
                        </td>
                    </tr>
                    <tr style="background-color: #F5F5DC;">
                        <td class="small text-uppercase text-normal" style="color: #228B22; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Type');?>
</td>
                        <td class="small mb15" style="color: #228B22; font-weight: bold; border-color: #D2B48C;">
                            <span style="background-color: #DEB887; color: #8B4513; padding: 3px 8px; border-radius: 4px;">
                                <?php if ($_smarty_tpl->tpl_vars['_bill']->value['prepaid'] == 'yes') {?>Prepaid<?php } else { ?>Postpaid<?php }?>
                            </span>
                            <span style="margin-left: 5px;"><?php echo $_smarty_tpl->tpl_vars['_bill']->value['plan_type'];?>
</span>
                        </td>
                    </tr>
                    <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'VPN' && $_smarty_tpl->tpl_vars['_bill']->value['routers'] == $_smarty_tpl->tpl_vars['vpn']->value['routers']) {?>
                        <tr style="background-color: white;">
                            <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Public IP');?>
</td>
                            <td class="small mb15" style="color: #654321; font-family: monospace; border-color: #D2B48C;"><?php echo $_smarty_tpl->tpl_vars['vpn']->value['public_ip'];?>
 / <?php echo $_smarty_tpl->tpl_vars['vpn']->value['port_name'];?>
</td>
                        </tr>
                        <tr style="background-color: #F5F5DC;">
                            <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Private IP');?>
</td>
                            <td class="small mb15" style="color: #654321; font-family: monospace; border-color: #D2B48C;"><?php echo $_smarty_tpl->tpl_vars['_user']->value['pppoe_ip'];?>
</td>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cf']->value, 'tcf');
$_smarty_tpl->tpl_vars['tcf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tcf']->value) {
$_smarty_tpl->tpl_vars['tcf']->do_else = false;
?>
                            <tr style="background-color: <?php if ((1 & (isset($_smarty_tpl->tpl_vars['__smarty_foreach_cf']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_cf']->value['index'] : null))) {?>white<?php } else { ?>#F5F5DC<?php }?>;">
                                <?php if ($_smarty_tpl->tpl_vars['tcf']->value['field_name'] == 'Winbox' || $_smarty_tpl->tpl_vars['tcf']->value['field_name'] == 'Api' || $_smarty_tpl->tpl_vars['tcf']->value['field_name'] == 'Web') {?>
                                    <td class="small text-uppercase text-normal" style="color: #6B8E23; font-weight: bold; border-color: #D2B48C;"><?php echo $_smarty_tpl->tpl_vars['tcf']->value['field_name'];?>
 - Port</td>
                                    <td class="small mb15" style="border-color: #D2B48C;"><a href="http://<?php echo $_smarty_tpl->tpl_vars['vpn']->value['public_ip'];?>
:<?php echo $_smarty_tpl->tpl_vars['tcf']->value['field_value'];?>
"
                                            target="_blank" style="color: #8B4513; text-decoration: none; font-weight: bold; font-family: monospace;"><?php echo $_smarty_tpl->tpl_vars['tcf']->value['field_value'];?>
</a></td>
                                </tr>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['nux_ip']->value != '') {?>
                        <tr style="background-color: white;">
                            <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Current IP');?>
</td>
                            <td class="small mb15" style="color: #654321; font-family: monospace; font-weight: bold; border-color: #D2B48C;"><?php echo $_smarty_tpl->tpl_vars['nux_ip']->value;?>
</td>
                        </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['nux_mac']->value != '') {?>
                        <tr style="background-color: #F5F5DC;">
                            <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Current MAC');?>
</td>
                            <td class="small mb15" style="color: #654321; font-family: monospace; font-weight: bold; border-color: #D2B48C;"><?php echo $_smarty_tpl->tpl_vars['nux_mac']->value;?>
</td>
                        </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'Hotspot' && $_smarty_tpl->tpl_vars['_bill']->value['status'] == 'on' && $_smarty_tpl->tpl_vars['_bill']->value['routers'] != 'radius' && $_smarty_tpl->tpl_vars['_c']->value['hs_auth_method'] != 'hchap') {?>
                        <tr style="background-color: white;">
                            <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Login Status');?>
</td>
                            <td class="small mb15" id="login_status_<?php echo $_smarty_tpl->tpl_vars['_bill']->value['id'];?>
" style="border-color: #D2B48C;">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/images/loading.gif" style="opacity: 0.7;">
                            </td>
                        </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['_bill']->value['type'] == 'Hotspot' && $_smarty_tpl->tpl_vars['_bill']->value['status'] == 'on' && $_smarty_tpl->tpl_vars['_c']->value['hs_auth_method'] == 'hchap') {?>
                        <tr style="background-color: #F5F5DC;">
                            <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Login Status');?>
</td>
                            <td class="small mb15" style="border-color: #D2B48C;">
                                <?php if ($_smarty_tpl->tpl_vars['logged']->value == '1') {?>
                                    <a href="http://<?php echo $_smarty_tpl->tpl_vars['hostname']->value;?>
/status" class="btn btn-xs btn-block"
                                       style="background-color: #228B22; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-weight: bold; border: none;">
                                        <?php echo Lang::T('You are Online, Check Status');?>
</a>
                                <?php } else { ?>
                                    <a href="<?php echo Text::url('home&mikrotik=login');?>
"
                                        onclick="return ask(this, '<?php echo Lang::T('Connect to Internet');?>
')"
                                        class="btn btn-xs btn-block"
                                        style="background-color: #CD853F; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-weight: bold; border: none;"><?php echo Lang::T('Not Online, Login now?');?>
</a>
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
}?>

<style>
/* Enhanced brown and white theme styles */
.table-hover tbody tr:hover {
    background-color: #F4E4BC !important;
    transition: background-color 0.2s ease;
}

.box {
    box-shadow: 0 2px 8px rgba(139, 69, 19, 0.1);
    border-radius: 6px;
    overflow: hidden;
    margin-bottom: 20px;
}

.box-header {
    border-radius: 6px 6px 0 0;
}

/* Button hover effects */
.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    transition: all 0.2s ease;
}

/* Status badges */
.label {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.7; }
    100% { opacity: 1; }
}

/* Link styles */
a[href^="http://"]:hover {
    color: #654321 !important;
    text-decoration: underline;
}

/* Responsive design */
@media (max-width: 768px) {
    .table td {
        padding: 6px 4px;
        font-size: 11px;
    }

    .btn-sm {
        padding: 4px 8px;
        font-size: 10px;
    }

    .box-header h3 {
        font-size: 16px;
    }

    .btn-group {
        font-size: 10px;
        padding: 3px 6px;
    }

    /* Button row responsive layout */
    div[style*="justify-content: space-between"] {
        flex-direction: column !important;
        gap: 10px !important;
    }

    div[style*="justify-content: space-between"] > div {
        justify-content: center !important;
        width: 100%;
    }

    div[style*="justify-content: space-between"] > div:last-child {
        order: -1;
    }
}

/* Loading animation enhancement */
img[src*="loading.gif"] {
    filter: sepia(100%) hue-rotate(30deg) saturate(150%);
}

/* Tooltip styling */
[data-toggle="tooltip"] {
    position: relative;
}

/* Monospace font for technical data */
.table td[style*="monospace"] {
    letter-spacing: 0.5px;
    background-color: rgba(139, 69, 19, 0.05);
}
</style>
<?php }
}
