<?php
/* Smarty version 4.5.3, created on 2025-07-13 23:07:12
  from '/var/www/html/alpha/ui/ui/customer/orderHistory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687411f0de27c3_57107638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39312ea526e53650625a6970e34e39d210fa2203' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/customer/orderHistory.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header.tpl' => 1,
    'file:pagination.tpl' => 1,
    'file:customer/footer.tpl' => 1,
  ),
),false)) {
function content_687411f0de27c3_57107638 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- user-orderHistory -->

<div class="row">
    <div class="col-sm-12">
        <div class="panel mb20 panel-hovered panel-primary">
            <div class="panel-heading"><?php echo Lang::T('Order History');?>
</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><?php echo Lang::T('Package Name');?>
</th>
                                <th><?php echo Lang::T('Payment Method');?>
</th>
                                <th>Routers</th>
                                <th><?php echo Lang::T('Type');?>
</th>
                                <th><?php echo Lang::T('Package Price');?>
</th>
                                <th><?php echo Lang::T('Created on');?>
</th>
                                <th><?php echo Lang::T('Expires on');?>
</th>
                                <th><?php echo Lang::T('Date');?>
</th>
                                <th><?php echo Lang::T('Status');?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr>
                                    <td><a href="<?php echo Text::url('order/view/');
echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_name'];?>
</a></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['gateway'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['payment_channel'];?>
</td>
                                    <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                                    <td class="text-primary"><?php echo date(((string)$_smarty_tpl->tpl_vars['_c']->value['date_format'])." H:i",strtotime($_smarty_tpl->tpl_vars['ds']->value['created_date']));?>
</td>
                                    <td class="text-danger"><?php echo date(((string)$_smarty_tpl->tpl_vars['_c']->value['date_format'])." H:i",strtotime($_smarty_tpl->tpl_vars['ds']->value['expired_date']));?>
</td>
                                    <td class="text-success"><?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] != 1) {
echo date(((string)$_smarty_tpl->tpl_vars['_c']->value['date_format'])." H:i",strtotime($_smarty_tpl->tpl_vars['ds']->value['paid_date']));
}?></td>
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
                    </table>
                </div>
                <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
