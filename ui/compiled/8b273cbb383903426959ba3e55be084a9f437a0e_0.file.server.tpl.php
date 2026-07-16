<?php
/* Smarty version 4.5.3, created on 2025-09-06 14:04:41
  from '/var/www/html/myapp/ui/ui/admin/autoload/server.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68bc154922fd55_43785581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b273cbb383903426959ba3e55be084a9f437a0e' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/autoload/server.tpl',
      1 => 1742427832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68bc154922fd55_43785581 (Smarty_Internal_Template $_smarty_tpl) {
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
