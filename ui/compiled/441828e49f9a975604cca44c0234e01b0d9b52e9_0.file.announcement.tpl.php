<?php
/* Smarty version 4.5.3, created on 2025-09-19 11:33:38
  from '/var/www/html/demo/ui/ui/widget/customers/announcement.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68cd1562b71bc6_83540443',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '441828e49f9a975604cca44c0234e01b0d9b52e9' => 
    array (
      0 => '/var/www/html/demo/ui/ui/widget/customers/announcement.tpl',
      1 => 1757624926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68cd1562b71bc6_83540443 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-solid" style="border-color: #8B4513; background-color: #FAFAFA; box-shadow: 0 2px 8px rgba(139, 69, 19, 0.1); border-radius: 6px; overflow: hidden;">
    <div class="box-header" style="background-color: #8B4513; color: white; border-bottom: 2px solid #654321; padding: 10px 15px;">
        <h3 class="box-title" style="color: white; font-weight: bold; margin: 0;"><?php echo Lang::T('Announcement');?>
</h3>
    </div>
    <div class="box-body" style="background-color: white; padding: 15px;">
        <?php $_smarty_tpl->_assignInScope('Announcement_Customer', ((string)$_smarty_tpl->tpl_vars['PAGES_PATH']->value)."/Announcement_Customer.html");?>
        <?php if (file_exists($_smarty_tpl->tpl_vars['Announcement_Customer']->value)) {?>
            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['Announcement_Customer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php }?>
    </div>
</div><?php }
}
