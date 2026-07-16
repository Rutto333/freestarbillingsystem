<?php
/* Smarty version 4.5.3, created on 2025-09-24 15:31:48
  from '/var/www/html/demo/ui/ui/customer/activation-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68d3e4b4e83315_29170776',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd23e8f0e59aa49eafda3cc0e6b9c67490deb362e' => 
    array (
      0 => '/var/www/html/demo/ui/ui/customer/activation-list.tpl',
      1 => 1757625510,
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
function content_68d3e4b4e83315_29170776 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- user-activation-list -->

<div class="row">
    <div class="col-sm-12">
        <div class="panel mb20 panel-hovered" style="border-color: #8B4513; background-color: #FAFAFA; box-shadow: 0 2px 8px rgba(139, 69, 19, 0.1); border-radius: 6px; overflow: hidden;">
            <div class="panel-heading" style="background-color: #8B4513; color: white; border-bottom: 2px solid #654321; padding: 10px 15px;">
                <h3 style="color: white; font-weight: bold; margin: 0;"><?php echo Lang::T('Transaction History List');?>
</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-striped table-condensed" style="border-color: #D2B48C;">
                        <thead style="background-color: #F5F5DC;">
                            <tr>
                                <th style="color: #8B4513;"><?php echo Lang::T('Invoice');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Package Name');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Package Price');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Type');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Created On');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Expires On');?>
</th>
                                <th style="color: #8B4513;"><?php echo Lang::T('Method');?>
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
'" style="cursor: pointer; background-color: white;">
                                    <td style="color: #654321;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['ds']->value['invoice'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td style="color: #654321;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['ds']->value['plan_name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td style="color: #654321;"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                                    <td style="color: #654321;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['ds']->value['type'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td style="color: #228B22;"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['recharged_on'],$_smarty_tpl->tpl_vars['ds']->value['recharged_time']);?>
</td>
                                    <td style="color: #B22222;"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expiration'],$_smarty_tpl->tpl_vars['ds']->value['time']);?>
</td>
                                    <td style="color: #654321;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['ds']->value['method'], ENT_QUOTES, 'UTF-8', true);?>
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
