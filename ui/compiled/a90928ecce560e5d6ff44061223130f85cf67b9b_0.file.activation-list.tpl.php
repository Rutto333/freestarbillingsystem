<?php
/* Smarty version 4.5.3, created on 2025-07-13 23:07:20
  from '/var/www/html/alpha/ui/ui/customer/activation-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687411f87e7d91_63806625',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a90928ecce560e5d6ff44061223130f85cf67b9b' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/customer/activation-list.tpl',
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
function content_687411f87e7d91_63806625 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- user-activation-list -->

<div class="row">
    <div class="col-sm-12">
        <div class="panel mb20 panel-hovered panel-primary">
            <div class="panel-heading"><?php echo Lang::T('Transaction History List');?>
</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><?php echo Lang::T('Invoice');?>
</th>
                                <th><?php echo Lang::T('Package Name');?>
</th>
                                <th><?php echo Lang::T('Package Price');?>
</th>
                                <th><?php echo Lang::T('Type');?>
</th>
                                <th><?php echo Lang::T('Created On');?>
</th>
                                <th><?php echo Lang::T('Expires On');?>
</th>
                                <th><?php echo Lang::T('Method');?>
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
                                <tr onclick="window.location.href = '<?php echo Text::url('voucher/invoice/');
echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['ds']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
'" style="cursor: pointer;">
                                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['ds']->value['invoice'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['ds']->value['plan_name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['ds']->value['type'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['recharged_on'],$_smarty_tpl->tpl_vars['ds']->value['recharged_time']);?>
</td>
                                    <td><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expiration'],$_smarty_tpl->tpl_vars['ds']->value['time']);?>
</td>
                                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['ds']->value['method'], ENT_QUOTES, 'UTF-8', true);?>
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
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
