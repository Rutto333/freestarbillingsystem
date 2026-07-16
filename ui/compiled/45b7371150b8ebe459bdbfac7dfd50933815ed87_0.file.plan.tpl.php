<?php
/* Smarty version 4.5.3, created on 2025-09-06 14:04:46
  from '/var/www/html/myapp/ui/ui/admin/autoload/plan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68bc154e9470e9_30106433',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45b7371150b8ebe459bdbfac7dfd50933815ed87' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/autoload/plan.tpl',
      1 => 1742427832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68bc154e9470e9_30106433 (Smarty_Internal_Template $_smarty_tpl) {
?><option value="">Select Plans</option>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
">
    <?php if ($_smarty_tpl->tpl_vars['ds']->value['enabled'] != 1) {?>DISABLED PLAN &bull; <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['ds']->value['name_plan'];?>
 &bull;
    <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>

    <?php if ($_smarty_tpl->tpl_vars['ds']->value['prepaid'] != 'yes') {?> &bull; POSTPAID  <?php }?>
</option>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
