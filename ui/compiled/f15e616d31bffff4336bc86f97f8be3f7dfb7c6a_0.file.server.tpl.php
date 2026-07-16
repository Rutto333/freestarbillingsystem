<?php
/* Smarty version 4.5.3, created on 2025-07-15 11:04:02
  from '/var/www/html/alpha/ui/ui/admin/autoload/server.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68760b720656e0_28697152',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f15e616d31bffff4336bc86f97f8be3f7dfb7c6a' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/autoload/server.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68760b720656e0_28697152 (Smarty_Internal_Template $_smarty_tpl) {
?><option value=''><?php echo Lang::T('Select Routers');?>
</option>
<?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_enable']) {?>
    <option value="radius">Radius</option>
<?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
</option>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
