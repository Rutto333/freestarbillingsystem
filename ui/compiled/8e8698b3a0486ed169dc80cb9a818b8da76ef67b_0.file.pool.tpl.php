<?php
/* Smarty version 4.5.3, created on 2025-09-16 21:51:56
  from '/var/www/html/demo/ui/ui/admin/autoload/pool.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c9b1cc9d62b0_77096829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e8698b3a0486ed169dc80cb9a818b8da76ef67b' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/autoload/pool.tpl',
      1 => 1742435032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68c9b1cc9d62b0_77096829 (Smarty_Internal_Template $_smarty_tpl) {
?><option value=''><?php echo Lang::T('Select Pool');?>
</option>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['pool_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['pool_name'];
if ($_smarty_tpl->tpl_vars['routers']->value == '') {?> - <?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];
}?></option>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
