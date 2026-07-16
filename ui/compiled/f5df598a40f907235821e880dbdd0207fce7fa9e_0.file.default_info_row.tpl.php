<?php
/* Smarty version 4.5.3, created on 2025-07-09 11:38:43
  from '/var/www/html/alpha/ui/ui/widget/default_info_row.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_686e2a934d9870_97064152',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5df598a40f907235821e880dbdd0207fce7fa9e' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/widget/default_info_row.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686e2a934d9870_97064152 (Smarty_Internal_Template $_smarty_tpl) {
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
