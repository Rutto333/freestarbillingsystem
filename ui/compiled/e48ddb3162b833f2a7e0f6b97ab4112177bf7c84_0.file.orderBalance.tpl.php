<?php
/* Smarty version 4.5.3, created on 2025-07-13 23:07:05
  from '/var/www/html/alpha/ui/ui/customer/orderBalance.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687411e94d1806_58041326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e48ddb3162b833f2a7e0f6b97ab4112177bf7c84' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/customer/orderBalance.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header.tpl' => 1,
    'file:customer/footer.tpl' => 1,
  ),
),false)) {
function content_687411e94d1806_58041326 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- user-orderPlan -->
<div class="row">
    <div class="col-sm-12">
        <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes') {?>
            <div class="box box-solid box-success bg-gray-light">
                <div class="box-header"><?php echo Lang::T('Buy Balance Package');?>
</div>
                <div class="box-body row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans_balance']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                        <div class="col col-md-4">
                            <div class="box box-solid box-default">
                                <div class="box-header text-bold"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</div>
                                <div class="table-responsive">
                                    <div style="margin-left: 5px; margin-right: 5px;">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <a href="<?php echo Text::url('order/gateway/0/');
echo $_smarty_tpl->tpl_vars['plan']->value['id'];?>
"
                                        onclick="return ask(this, '<?php echo Lang::T('Buy Balance');?>
?')"
                                        class="btn btn-sm btn-block btn-primary"><?php echo Lang::T('Buy');?>
</a>
                                </div>
                            </div>
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['allow_balance_custom'] == 'yes') {?>
                        <div class="col col-md-4">
                            <form action="<?php echo Text::url('order/gateway/0/0');?>
" method="post">
                                <input type="hidden" name="custom" value="1">
                                <div class="box box-solid box-default">
                                    <div class="box-header text-bold"><?php echo Lang::T('Custom Balance');?>
</div>
                                    <div class="table-responsive">
                                        <div style="margin-left: 5px; margin-right: 5px;">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    <tr>
                                                        <input type="number" name="amount" id="amount" class="form-control"
                                                            placeholder="<?php echo Lang::T('Input Desired Amount');?>
">
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <button onclick="return ask(this, '<?php echo Lang::T('Buy Balance');?>
?')"
                                            class="btn btn-sm btn-block btn-primary"><?php echo Lang::T('Buy');?>
</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php }?>
                </div>
            </div>
        <?php }?>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
