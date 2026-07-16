<?php
/* Smarty version 4.5.3, created on 2025-08-27 09:32:17
  from '/var/www/html/example/ui/ui/widget/customers/announcement.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68aea671ae7c63_47762898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5ef005cb1cd199f5cb6e2e0c374c48d190ff9f7' => 
    array (
      0 => '/var/www/html/example/ui/ui/widget/customers/announcement.tpl',
      1 => 1742449432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68aea671ae7c63_47762898 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-info box-solid">
    <div class="box-header">
        <h3 class="box-title"><?php echo Lang::T('Announcement');?>
</h3>
    </div>
    <div class="box-body">
        <?php $_smarty_tpl->_assignInScope('Announcement_Customer', ((string)$_smarty_tpl->tpl_vars['PAGES_PATH']->value)."/Announcement_Customer.html");?>
        <?php if (file_exists($_smarty_tpl->tpl_vars['Announcement_Customer']->value)) {?>
            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['Announcement_Customer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php }?>
    </div>
</div><?php }
}
