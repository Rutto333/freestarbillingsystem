<?php
/* Smarty version 4.5.3, created on 2025-07-23 16:06:17
  from '/var/www/html/alpha/ui/ui/customer/selectGateway.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6880de491c7a06_44436085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2a8dc98e07ae36a7b26b1276b6e977ee79a90e5' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/customer/selectGateway.tpl',
      1 => 1753275639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header.tpl' => 1,
    'file:customer/footer.tpl' => 1,
  ),
),false)) {
function content_6880de491c7a06_44436085 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <?php if (file_exists(((string)$_smarty_tpl->tpl_vars['PAGES_PATH']->value)."/Payment_Info.html")) {?>
        <div class="col-md-6">
            <div class="panel panel-warning panel-hovered">
                <div class="panel-heading"><?php echo Lang::T('Payment Info');?>
</div>
                <div class="panel-body"><?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['PAGES_PATH']->value)."/Payment_Info.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div>
            </div>
        </div>
    <?php }?>
    <div class="<?php if (file_exists(((string)$_smarty_tpl->tpl_vars['PAGES_PATH']->value)."/Payment_Info.html")) {?>col-md-6<?php } else { ?>col-md-6 col-md-offset-3<?php }?>">
        <div class="panel panel-success panel-hovered">
            <div class="panel-heading"><?php echo Lang::T('Make Payment');?>
</div>

            <div class="panel-body">
                <center><b><?php echo Lang::T('Package Details');?>
</b></center>
                <?php if (!$_smarty_tpl->tpl_vars['custom']->value) {?>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b><?php echo Lang::T('Package Name');?>
</b>
                            <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</span>
                        </li>

                        <?php if ($_smarty_tpl->tpl_vars['plan']->value['is_radius'] || $_smarty_tpl->tpl_vars['plan']->value['routers']) {?>
                            <li class="list-group-item">
                                <b><?php echo Lang::T('Location');?>
</b>
                                <span class="pull-right"><?php if ($_smarty_tpl->tpl_vars['plan']->value['is_radius']) {?>Radius<?php } else {
echo $_smarty_tpl->tpl_vars['plan']->value['routers'];
}?></span>
                            </li>
                        <?php }?>

                        <li class="list-group-item">
                            <b><?php echo Lang::T('Type');?>
</b>
                            <span class="pull-right">
                                <?php if ($_smarty_tpl->tpl_vars['plan']->value['prepaid'] == 'yes') {
echo Lang::T('Prepaid');
} else {
echo Lang::T('Postpaid');
}?>
                                <?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>

                            </span>
                        </li>

                        <li class="list-group-item">
                            <b><?php echo Lang::T('Package Price');?>
</b>
                            <span class="pull-right">
                                <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                    <sup style="text-decoration: line-through; color: red">
                                        <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>

                                    </sup>
                                <?php }?>
                                <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                            </span>
                        </li>

                        <?php if ($_smarty_tpl->tpl_vars['plan']->value['validity']) {?>
                            <li class="list-group-item">
                                <b><?php echo Lang::T('Validity Period');?>
</b>
                                <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</span>
                            </li>
                        <?php }?>
                    </ul>
                <?php } else { ?>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b><?php echo Lang::T('Package Name');?>
</b>
                            <span class="pull-right"><?php echo Lang::T('Custom Balance');?>
</span>
                        </li>

                        <li class="list-group-item">
                            <b><?php echo Lang::T('Amount');?>
</b>
                            <span class="pull-right">
                                <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['amount']->value);?>

                            </span>
                        </li>
                    </ul>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['discount']->value == '' && $_smarty_tpl->tpl_vars['plan']->value['type'] != 'Balance' && $_smarty_tpl->tpl_vars['custom']->value == '' && $_smarty_tpl->tpl_vars['_c']->value['enable_coupons'] == 'yes') {?>
                    <!-- Coupon Code Form -->
                    <form action="<?php echo Text::url('order/gateway/');
echo $_smarty_tpl->tpl_vars['route2']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['route3']->value;?>
" method="post">
                        <div class="form-group row">
                            <label class="col-md-4 control-label"><?php echo Lang::T('Coupon Code');?>
</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="coupon" id="coupon" maxlength="50"
                                        required placeholder="<?php echo Lang::T('Enter your coupon code');?>
">
                                    <span class="input-group-btn">
                                        <button type="submit" name="add_coupon"
                                            class="btn btn-info btn-flat"><?php echo Lang::T('Apply Coupon');?>
</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php }?>
                <br>
                <center><b><?php echo Lang::T('Summary');?>
</b></center>
                <ul class="list-group list-group-unbordered">

                    <?php if ($_smarty_tpl->tpl_vars['add_cost']->value != 0) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bills']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                            <li class="list-group-item">
                                <b><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</b>
                                <span class="pull-right"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['v']->value);?>
</span>
                            </li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <li class="list-group-item">
                            <b><?php echo Lang::T('Additional Cost');?>
</b>
                            <span class="pull-right"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['add_cost']->value);?>
</span>
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['discount']->value) {?>
                        <li class="list-group-item">
                            <b><?php echo Lang::T('Discount Applied');?>
</b>
                            <span class="pull-right"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['discount']->value);?>
</span>
                        </li>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['amount']->value != '' && $_smarty_tpl->tpl_vars['custom']->value == '1') {?>
                        <li class="list-group-item">
                            <b><?php echo Lang::T('Total');?>
</b>
                            <span class="pull-right" style="font-size: large; font-weight: bolder;">
                                <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['amount']->value);?>

                            </span>
                        </li>
                    <?php } elseif ($_smarty_tpl->tpl_vars['plan']->value['type'] == 'Balance') {?>
                        <li class="list-group-item">
                            <b><?php echo Lang::T('Total');?>
</b>
                            <span class="pull-right" style="font-size: large; font-weight: bolder;">
                                <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']+$_smarty_tpl->tpl_vars['add_cost']->value);?>

                            </span>
                        </li>
                    <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['tax']->value) {?>
                            <li class="list-group-item">
                                <b><?php echo Lang::T('Tax');?>
</b>
                                <span class="pull-right"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['tax']->value);?>
</span>
                            </li>
                        <?php }?>
                        <li class="list-group-item">
                            <b><?php echo Lang::T('Total');?>
</b>
                            <span class="pull-right" style="font-size: large; font-weight: bolder;">
                                <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']+$_smarty_tpl->tpl_vars['add_cost']->value+$_smarty_tpl->tpl_vars['tax']->value);?>

                            </span>
                        </li>
                    <?php }?>
                </ul>

                <!-- Payment Gateway Form -->
                <form method="post" action="<?php echo Text::url('order/buy/');
echo $_smarty_tpl->tpl_vars['route2']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['route3']->value;?>
">
                    <input type="hidden" name="coupon" value="<?php echo $_smarty_tpl->tpl_vars['discount']->value;?>
">
                    <?php if ($_smarty_tpl->tpl_vars['custom']->value == '1' && $_smarty_tpl->tpl_vars['amount']->value != '') {?>
                        <input type="hidden" name="custom" value="1">
                        <input type="hidden" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
">
                    <?php }?>
                    <div class="form-group row">
                        <label class="col-md-4"><?php echo Lang::T('Payment Gateway');?>
</label>
                        <div class="col-md-8">
                            <select name="gateway" id="gateway" class="form-control">
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] != 'no' && $_smarty_tpl->tpl_vars['plan']->value['type'] != 'Balance' && $_smarty_tpl->tpl_vars['custom']->value == '' && $_smarty_tpl->tpl_vars['_user']->value['balance'] >= $_smarty_tpl->tpl_vars['plan']->value['price']+$_smarty_tpl->tpl_vars['add_cost']->value+$_smarty_tpl->tpl_vars['tax']->value) {?>
                                <option value="balance"><?php echo Lang::T('Balance');?>
 <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['_user']->value['balance']);?>

                                </option>
                                <?php }?>
                                //<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pgs']->value, 'pg');
$_smarty_tpl->tpl_vars['pg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pg']->value) {
$_smarty_tpl->tpl_vars['pg']->do_else = false;
?>
                                 //   <option value="<?php echo $_smarty_tpl->tpl_vars['pg']->value;?>
"><?php echo ucwords($_smarty_tpl->tpl_vars['pg']->value);?>
</option>
                                //<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                    <center>
                        <button type="submit" name="pay" class="btn btn-primary"
                        onclick="return ask(this, '<?php echo Lang::T("Are You Sure?");?>
')"><?php echo Lang::T('Pay Now');?>
</button>
                        <a href="<?php echo Text::url('home');?>
" class="btn btn-secondary"><?php echo Lang::T('Cancel');?>
</a>
                    </center>
                </form>
            </div>
        </div>
    </div>

</div>

<?php $_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
