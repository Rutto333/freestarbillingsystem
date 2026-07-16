<?php
/* Smarty version 4.5.3, created on 2025-09-11 23:16:02
  from '/var/www/html/myapp/ui/ui/customer/orderHistory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c32e0295f936_78412649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5320680dbefd4b92b6ee23b9e5387d80800f260a' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/customer/orderHistory.tpl',
      1 => 1757621744,
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
function content_68c32e0295f936_78412649 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- user-orderHistory -->

<div class="row">
    <div class="col-sm-12">
        <div class="panel mb20 panel-hovered" style="border-color: #8B4513; background-color: #FAFAFA; box-shadow: 0 2px 8px rgba(139, 69, 19, 0.1); border-radius: 6px; overflow: hidden;">
            <div class="panel-heading" style="background-color: #8B4513; color: white; border-bottom: 2px solid #654321; padding: 10px 15px;">
                <h3 style="color: white; font-weight: bold; margin: 0;"><?php echo Lang::T('Order History');?>
</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-striped table-condensed" style="border-color: #D2B48C;">
                        <thead style="background-color: #F5F5DC;">
                            <tr>
                                <th style="color: #8B4513;"><?php echo Lang::T('Package Name');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Payment Method');?>
</th>
                                <th style="color: #8B4513;">Routers</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Type');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Package Price');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Created on');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Expires on');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Date');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Status');?>
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
                                    <td style="color: #654321;"><a href="<?php echo Text::url('order/view/');
echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" style="color: #8B4513;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_name'];?>
</a></td>
                                    <td style="color: #654321;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['gateway'];?>
</td>
                                    <td style="color: #654321;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];?>
</td>
                                    <td style="color: #654321;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['payment_channel'];?>
</td>
                                    <td style="color: #654321;"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                                    <td class="text-primary" style="color: #228B22;"><?php echo date(((string)$_smarty_tpl->tpl_vars['_c']->value['date_format'])." H:i",strtotime($_smarty_tpl->tpl_vars['ds']->value['created_date']));?>
</td>
                                    <td class="text-danger" style="color: #B22222;"><?php echo date(((string)$_smarty_tpl->tpl_vars['_c']->value['date_format'])." H:i",strtotime($_smarty_tpl->tpl_vars['ds']->value['expired_date']));?>
</td>
                                    <td class="text-success" style="color: #228B22;"><?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] != 1) {
echo date(((string)$_smarty_tpl->tpl_vars['_c']->value['date_format'])." H:i",strtotime($_smarty_tpl->tpl_vars['ds']->value['paid_date']));
}?></td>
                                    <td style="color: #654321;"><?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 1) {
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
