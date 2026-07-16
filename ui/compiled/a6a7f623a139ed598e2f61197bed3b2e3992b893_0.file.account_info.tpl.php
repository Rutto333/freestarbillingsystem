<?php
/* Smarty version 4.5.3, created on 2025-09-11 22:07:12
  from '/var/www/html/myapp/ui/ui/widget/customers/account_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c31de05d49a5_23489537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6a7f623a139ed598e2f61197bed3b2e3992b893' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/widget/customers/account_info.tpl',
      1 => 1757617616,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68c31de05d49a5_23489537 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-primary box-solid" style="border-color: #8B4513; background-color: #FAFAFA;">
    <div class="box-header" style="background-color: #8B4513; color: white; border-bottom: 2px solid #654321;">
        <h3 class="box-title" style="color: white; font-weight: bold;"><?php echo Lang::T('Your Account Information');?>
</h3>
    </div>
    <div style="margin-left: 5px; margin-right: 5px; background-color: white; padding: 10px;">
        <table class="table table-bordered table-striped table-bordered table-hover mb-0" style="margin-bottom: 0px; border-color: #D2B48C;">
            <tr style="background-color: #F5F5DC;">
                <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Usernames');?>
</td>
                <td class="small mb15" style="color: #654321; border-color: #D2B48C;"><?php echo $_smarty_tpl->tpl_vars['_user']->value['username'];?>
</td>
            </tr>
            <tr style="background-color: white;">
                <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Password');?>
</td>
                <td class="small mb15" style="border-color: #D2B48C;"><input type="password" value="<?php echo $_smarty_tpl->tpl_vars['_user']->value['password'];?>
"
                        style="width:100%; border: 1px solid #D2B48C; background-color: #FEFEFE; color: #654321; padding: 5px;" 
                        onmouseleave="this.type = 'password'"
                        onmouseenter="this.type = 'text'" onclick="this.select()"></td>
            </tr>
            <tr style="background-color: #F5F5DC;">
                <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Service Type');?>
</td>
                <td class="small mb15" style="color: #654321; border-color: #D2B48C;">
                    <?php if ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'Hotspot') {?>
                        <span style="background-color: #DEB887; color: #8B4513; padding: 3px 8px; border-radius: 4px; font-weight: bold;">Hotspot</span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'PPPoE') {?>
                        <span style="background-color: #DEB887; color: #8B4513; padding: 3px 8px; border-radius: 4px; font-weight: bold;">PPPoE</span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'VPN') {?>
                        <span style="background-color: #DEB887; color: #8B4513; padding: 3px 8px; border-radius: 4px; font-weight: bold;">VPN</span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'Others' || $_smarty_tpl->tpl_vars['_user']->value['service_type'] == null) {?>
                        <span style="background-color: #DEB887; color: #8B4513; padding: 3px 8px; border-radius: 4px; font-weight: bold;">Others</span>
                    <?php }?>
                </td>
            </tr>

            <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes') {?>
                <tr style="background-color: white;">
                    <td class="small text-uppercase text-normal" style="color: #A0522D; font-weight: bold; border-color: #D2B48C;"><?php echo Lang::T('Yours Balances');?>
</td>
                    <td class="small mb15 text-bold" style="color: #654321; border-color: #D2B48C; font-weight: bold;">
                        <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['_user']->value['balance']);?>

                        <?php if ($_smarty_tpl->tpl_vars['_user']->value['auto_renewal'] == 1) {?>
                            <a class="label pull-right" 
                               style="background-color: #228B22; color: white; padding: 4px 8px; text-decoration: none; border-radius: 4px; font-size: 11px;"
                               href="<?php echo Text::url('home&renewal=0');?>
"
                               onclick="return ask(this, '<?php echo Lang::T('Disable auto renewal?');?>
')"><?php echo Lang::T('Auto Renewal On');?>
</a>
                        <?php } else { ?>
                            <a class="label pull-right" 
                               style="background-color: #CD853F; color: white; padding: 4px 8px; text-decoration: none; border-radius: 4px; font-size: 11px;"
                               href="<?php echo Text::url('home&renewal=1');?>
"
                               onclick="return ask(this, '<?php echo Lang::T('Enable auto renewal?');?>
')"><?php echo Lang::T('Auto Renewal Off');?>
</a>
                        <?php }?>
                    </td>
                </tr>
            <?php }?>
        </table>&nbsp;&nbsp;
    </div>
    
    <?php if ($_smarty_tpl->tpl_vars['abills']->value && count($_smarty_tpl->tpl_vars['abills']->value) > 0) {?>
        <div class="box-header" style="background-color: #A0522D; color: white; border-top: 1px solid #D2B48C; margin-top: 10px;">
            <h3 class="box-title" style="color: white; font-weight: bold;"><?php echo Lang::T('Additional Billing');?>
</h3>
        </div>

        <div style="margin-left: 5px; margin-right: 5px; background-color: white; padding: 10px;">
            <table class="table table-bordered table-striped table-bordered table-hover mb-0" style="margin-bottom: 0px; border-color: #D2B48C;">
                <?php $_smarty_tpl->_assignInScope('total', 0);?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['abills']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                    <tr style="background-color: <?php if ((1 & (isset($_smarty_tpl->tpl_vars['__smarty_foreach_bills']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_bills']->value['index'] : null))) {?>#F5F5DC<?php } else { ?>white<?php }?>;">
                        <td class="small text-uppercase text-normal" style="color: #8B4513; font-weight: bold; border-color: #D2B48C;"><?php echo str_replace(' Bill','',$_smarty_tpl->tpl_vars['k']->value);?>
</td>
                        <td class="small mb15" style="color: #654321; border-color: #D2B48C;">
                            <?php if (strpos($_smarty_tpl->tpl_vars['v']->value,':') === false) {?>
                                <span style="font-weight: bold;"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['v']->value);?>
</span>
                                <sup title="recurring" style="color: #A0522D;">8</sup>
                                <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['v']->value+$_smarty_tpl->tpl_vars['total']->value);?>
                            <?php } else { ?>
                                <?php $_smarty_tpl->_assignInScope('exp', explode(':',$_smarty_tpl->tpl_vars['v']->value));?>
                                <span style="font-weight: bold;"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['exp']->value[0]);?>
</span>
                                <sup title="<?php echo $_smarty_tpl->tpl_vars['exp']->value[1];?>
 more times" style="color: #A0522D;">
                                    <?php if ($_smarty_tpl->tpl_vars['exp']->value[1] == 0) {?>
                                        <span style="color: #228B22; font-weight: bold;"><?php echo Lang::T('paid off');?>
</span>
                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['exp']->value[1];?>
x
                                    <?php }?>
                                </sup>
                                <?php if ($_smarty_tpl->tpl_vars['exp']->value[1] > 0) {?>
                                    <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['exp']->value[0]+$_smarty_tpl->tpl_vars['total']->value);?>
                                <?php }?>
                            <?php }?>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <tr style="background-color: #DEB887; border-top: 2px solid #8B4513;">
                    <td class="small text-uppercase text-normal" style="color: #654321; font-weight: bold; border-color: #8B4513;"><b><?php echo Lang::T('Total');?>
</b></td>
                    <td class="small mb15" style="color: #654321; font-weight: bold; border-color: #8B4513;"><b>
                            <?php if ($_smarty_tpl->tpl_vars['total']->value == 0) {?>
                                <span style="color: #228B22; text-transform: uppercase;"><?php echo ucwords(Lang::T('paid off'));?>
</span>
                            <?php } else { ?>
                                <span style="color: #8B4513; font-size: 14px;"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['total']->value);?>
</span>
                            <?php }?>
                        </b></td>
                </tr>
            </table>
        </div> &nbsp;&nbsp;
    <?php }?>
</div>

<style>
/* Additional CSS for enhanced brown and white theme */
.table-hover tbody tr:hover {
    background-color: #F4E4BC !important;
}

.box {
    box-shadow: 0 2px 8px rgba(139, 69, 19, 0.1);
    border-radius: 6px;
    overflow: hidden;
}

.box-header {
    border-radius: 6px 6px 0 0;
}

input[type="password"]:focus, input[type="text"]:focus {
    outline: none;
    border-color: #8B4513 !important;
    box-shadow: 0 0 5px rgba(139, 69, 19, 0.3);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .table td {
        padding: 8px 5px;
        font-size: 12px;
    }
    
    .pull-right {
        float: none !important;
        display: block;
        margin-top: 5px;
        text-align: center;
    }
}
</style><?php }
}
