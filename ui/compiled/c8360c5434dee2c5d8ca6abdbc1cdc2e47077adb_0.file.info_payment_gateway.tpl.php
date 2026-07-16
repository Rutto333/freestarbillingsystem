<?php
/* Smarty version 4.5.3, created on 2025-07-09 11:38:43
  from '/var/www/html/alpha/ui/ui/widget/info_payment_gateway.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_686e2a9354a531_88167339',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8360c5434dee2c5d8ca6abdbc1cdc2e47077adb' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/widget/info_payment_gateway.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686e2a9354a531_88167339 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-success panel-hovered mb20 activities">
    <div class="panel-heading"><?php echo Lang::T('Payment Gateway');?>
: <?php echo str_replace(',',', ',$_smarty_tpl->tpl_vars['_c']->value['payment_gateway']);?>

    </div>
</div><?php }
}
