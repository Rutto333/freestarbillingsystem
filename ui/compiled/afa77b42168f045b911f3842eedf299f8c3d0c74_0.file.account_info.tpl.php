<?php
/* Smarty version 4.5.3, created on 2025-08-27 09:32:17
  from '/var/www/html/example/ui/ui/widget/customers/account_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68aea671ab8e24_44435030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afa77b42168f045b911f3842eedf299f8c3d0c74' => 
    array (
      0 => '/var/www/html/example/ui/ui/widget/customers/account_info.tpl',
      1 => 1742449432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68aea671ab8e24_44435030 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-primary box-solid">
    <div class="box-header">
        <h3 class="box-title"><?php echo Lang::T('Your Account Information');?>
</h3>
    </div>
    <div style="margin-left: 5px; margin-right: 5px;">
        <table class="table table-bordered table-striped table-bordered table-hover mb-0" style="margin-bottom: 0px;">
            <tr>
                <td class="small text-success text-uppercase text-normal"><?php echo Lang::T('Usernames');?>
</td>
                <td class="small mb15"><?php echo $_smarty_tpl->tpl_vars['_user']->value['username'];?>
</td>
            </tr>
            <tr>
                <td class="small text-success text-uppercase text-normal"><?php echo Lang::T('Password');?>
</td>
                <td class="small mb15"><input type="password" value="<?php echo $_smarty_tpl->tpl_vars['_user']->value['password'];?>
"
                        style="width:100%; border: 0px;" onmouseleave="this.type = 'password'"
                        onmouseenter="this.type = 'text'" onclick="this.select()"></td>
            </tr>
            <tr>
                <td class="small text-success text-uppercase text-normal"><?php echo Lang::T('Service Type');?>
</td>
                <td class="small mb15">
                    <?php if ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'Hotspot') {?>
                        Hotspot
                    <?php } elseif ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'PPPoE') {?>
                        PPPoE
                    <?php } elseif ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'VPN') {?>
                        VPN
                    <?php } elseif ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'Others' || $_smarty_tpl->tpl_vars['_user']->value['service_type'] == null) {?>
                        Others
                    <?php }?>
                </td>
            </tr>

            <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes') {?>
                <tr>
                    <td class="small text-warning text-uppercase text-normal"><?php echo Lang::T('Yours Balances');?>
</td>
                    <td class="small mb15 text-bold">
                        <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['_user']->value['balance']);?>

                        <?php if ($_smarty_tpl->tpl_vars['_user']->value['auto_renewal'] == 1) {?>
                            <a class="label label-success pull-right" href="<?php echo Text::url('home&renewal=0');?>
"
                                onclick="return ask(this, '<?php echo Lang::T('Disable auto renewal?');?>
')"><?php echo Lang::T('Auto Renewal
                                On');?>
</a>
                        <?php } else { ?>
                            <a class="label label-danger pull-right" href="<?php echo Text::url('home&renewal=1');?>
"
                                onclick="return ask(this, '<?php echo Lang::T('Enable auto renewal?');?>
')"><?php echo Lang::T('Auto Renewal
                                Off');?>
</a>
                        <?php }?>
                    </td>
                </tr>
            <?php }?>
        </table>&nbsp;&nbsp;
    </div>
    <?php if ($_smarty_tpl->tpl_vars['abills']->value && count($_smarty_tpl->tpl_vars['abills']->value) > 0) {?>
        <div class="box-header">
            <h3 class="box-title"><?php echo Lang::T('Additional Billing');?>
</h3>
        </div>

        <div style="margin-left: 5px; margin-right: 5px;">
            <table class="table table-bordered table-striped table-bordered table-hover mb-0" style="margin-bottom: 0px;">
                <?php $_smarty_tpl->_assignInScope('total', 0);?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['abills']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                    <tr>
                        <td class="small text-success text-uppercase text-normal"><?php echo str_replace(' Bill','',$_smarty_tpl->tpl_vars['k']->value);?>
</td>
                        <td class="small mb15">
                            <?php if (strpos($_smarty_tpl->tpl_vars['v']->value,':') === false) {?>
                                <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['v']->value);?>

                                <sup title="recurring">∞</sup>
                                <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['v']->value+$_smarty_tpl->tpl_vars['total']->value);?>
                            <?php } else { ?>
                                <?php $_smarty_tpl->_assignInScope('exp', explode(':',$_smarty_tpl->tpl_vars['v']->value));?>
                                <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['exp']->value[0]);?>

                                <sup title="<?php echo $_smarty_tpl->tpl_vars['exp']->value[1];?>
 more times"><?php if ($_smarty_tpl->tpl_vars['exp']->value[1] == 0) {
echo Lang::T('paid
                                off');
} else {
echo $_smarty_tpl->tpl_vars['exp']->value[1];?>
x<?php }?></sup>
                                <?php if ($_smarty_tpl->tpl_vars['exp']->value[1] > 0) {?>
                                    <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['exp']->value[0]+$_smarty_tpl->tpl_vars['total']->value);?>
                                <?php }?>
                            <?php }?>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <tr>
                    <td class="small text-success text-uppercase text-normal"><b><?php echo Lang::T('Total');?>
</b></td>
                    <td class="small mb15"><b>
                            <?php if ($_smarty_tpl->tpl_vars['total']->value == 0) {?>
                                <?php echo ucwords(Lang::T('paid off'));?>

                            <?php } else { ?>
                                <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['total']->value);?>

                            <?php }?>
                        </b></td>
                </tr>
            </table>
        </div> &nbsp;&nbsp;
    <?php }?>
</div>
<?php }
}
