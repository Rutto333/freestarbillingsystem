<?php
/* Smarty version 4.5.3, created on 2025-08-27 08:47:47
  from '/var/www/html/example/ui/ui/widget/default_info_row.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68ae9c03028462_68428095',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfea52f87a62fbbd31b8f48c0dc0ea4e85d20b64' => 
    array (
      0 => '/var/www/html/example/ui/ui/widget/default_info_row.tpl',
      1 => 1742449432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68ae9c03028462_68428095 (Smarty_Internal_Template $_smarty_tpl) {
?><ol class="breadcrumb">
    <li><?php echo Lang::dateFormat($_smarty_tpl->tpl_vars['start_date']->value);?>
</li>
    <li><?php echo Lang::dateFormat($_smarty_tpl->tpl_vars['current_date']->value);?>
</li>
    <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Report'))) {?>
        <li onclick="window.location.href = '<?php echo Text::url('customers&search=&order=balance&filter=Active&orderby=desc');?>
'" style="cursor: pointer;">
            <?php echo Lang::T('Customer Balance');?>
 <sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
            <b><?php echo number_format($_smarty_tpl->tpl_vars['cb']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</b>
        </li>
    <?php }?>
</ol><?php }
}
