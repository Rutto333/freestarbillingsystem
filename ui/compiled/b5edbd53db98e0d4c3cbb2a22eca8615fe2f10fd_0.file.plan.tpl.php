<?php
/* Smarty version 4.5.3, created on 2025-09-18 20:02:36
  from '/var/www/html/demo/ui/ui/admin/autoload/plan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68cc3b2c4a0ec7_12505899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5edbd53db98e0d4c3cbb2a22eca8615fe2f10fd' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/autoload/plan.tpl',
      1 => 1742435032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68cc3b2c4a0ec7_12505899 (Smarty_Internal_Template $_smarty_tpl) {
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
