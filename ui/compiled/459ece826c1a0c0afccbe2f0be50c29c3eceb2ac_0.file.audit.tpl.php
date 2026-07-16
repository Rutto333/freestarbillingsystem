<?php
/* Smarty version 4.5.3, created on 2025-09-19 18:45:35
  from '/var/www/html/demo/ui/ui/admin/paymentgateway/audit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68cd7a9f1cbc44_85614560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '459ece826c1a0c0afccbe2f0be50c29c3eceb2ac' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/paymentgateway/audit.tpl',
      1 => 1742435032,
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
function content_68cd7a9f1cbc44_85614560 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="panel panel-hovered mb20 panel-primary">
    <div class="panel-heading">
        <?php echo ucwords($_smarty_tpl->tpl_vars['pg']->value);?>

    </div>
    <div class="panel-body">
        <form id="site-search" method="post" action="<?php echo Text::url('paymentgateway/audit/');
echo $_smarty_tpl->tpl_vars['pg']->value;?>
">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="<?php echo Lang::T('Search');?>
..." value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-success"><span
                            class="glyphicon glyphicon-search"></span></button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th><?php echo Lang::T('TRX ID');?>
</th>
                        <th><?php echo Lang::T('PG ID');?>
</th>
                        <th><?php echo Lang::T('Username');?>
</th>
                        <th><?php echo Lang::T('Plan Name');?>
</th>
                        <th><?php echo Lang::T('Routers');?>
</th>
                        <th><?php echo Lang::T('Price');?>
</th>
                        <th><?php echo Lang::T('Payment Link');?>
</th>
                        <th><?php echo Lang::T('Channel');?>
</th>
                        <th><?php echo Lang::T('Created');?>
</th>
                        <th><?php echo Lang::T('Expired');?>
</th>
                        <th><?php echo Lang::T('Paid');?>
</th>
                        <th><?php echo Lang::T('Invoice');?>
</th>
                        <th><?php echo Lang::T('Status');?>
</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pgs']->value, 'pg');
$_smarty_tpl->tpl_vars['pg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pg']->value) {
$_smarty_tpl->tpl_vars['pg']->do_else = false;
?>
                        <tr class="<?php if ($_smarty_tpl->tpl_vars['pg']->value['status'] == 1) {?>warning<?php } elseif ($_smarty_tpl->tpl_vars['pg']->value['status'] == 2) {?>success<?php } else { ?>danger<?php }?>">
                            <td><?php echo $_smarty_tpl->tpl_vars['pg']->value['id'];?>
</td>
                            <td><a href="<?php echo Text::url('paymentgateway/audit-view/');
echo $_smarty_tpl->tpl_vars['pg']->value['id'];?>
"
                                    class="text-black"><?php echo $_smarty_tpl->tpl_vars['pg']->value['gateway_trx_id'];?>
</a></td>
                            <td><a href="<?php echo Text::url('customers/viewu/');
echo $_smarty_tpl->tpl_vars['pg']->value['username'];?>
"
                                    class="text-black"><?php echo $_smarty_tpl->tpl_vars['pg']->value['username'];?>
</a>
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pg']->value['plan_name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pg']->value['routers'];?>
</td>
                            <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['pg']->value['price']);?>
</td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['pg']->value['pg_url_payment']) {?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['pg']->value['pg_url_payment'];?>
" target="_blank" class="btn btn-xs btn-default btn-block"
                                        rel="noopener noreferrer"><?php echo Lang::T('open');?>
</a>
                                <?php }?>
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pg']->value['payment_method'];?>
 - <?php echo $_smarty_tpl->tpl_vars['pg']->value['payment_channel'];?>
</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['pg']->value['created_date'] != null) {
echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['pg']->value['created_date']);
}?></td>
                            <td><?php if ($_smarty_tpl->tpl_vars['pg']->value['expired_date'] != null) {
echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['pg']->value['expired_date']);
}?></td>
                            <td><?php if ($_smarty_tpl->tpl_vars['pg']->value['paid_date'] != null) {
echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['pg']->value['paid_date']);
}?></td>
                            <td><?php if ($_smarty_tpl->tpl_vars['pg']->value['trx_invoice']) {?><a href="<?php echo Text::url('reports/activation&q=');
echo $_smarty_tpl->tpl_vars['pg']->value['trx_invoice'];?>
"
                                    class="text-black"><?php echo $_smarty_tpl->tpl_vars['pg']->value['trx_invoice'];?>
</a><?php }?></td>
                            <td><?php if ($_smarty_tpl->tpl_vars['pg']->value['status'] == 1) {?>UNPAID<?php } elseif ($_smarty_tpl->tpl_vars['pg']->value['status'] == 2) {?>PAID<?php } elseif ($_smarty_tpl->tpl_vars['pg']->value['status'] == 3) {?>FAILED<?php } else { ?>CANCELED<?php }?>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>
        <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <a href="<?php echo Text::url('paymentgateway');?>
" class="btn btn-default btn-xs"><?php echo Lang::T('back');?>
</a>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
