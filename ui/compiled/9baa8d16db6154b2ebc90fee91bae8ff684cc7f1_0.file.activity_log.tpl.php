<?php
/* Smarty version 4.5.3, created on 2025-07-09 11:38:43
  from '/var/www/html/alpha/ui/ui/widget/activity_log.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_686e2a935ce440_01805029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9baa8d16db6154b2ebc90fee91bae8ff684cc7f1' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/widget/activity_log.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686e2a935ce440_01805029 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-info panel-hovered mb20 activities">
    <div class="panel-heading"><a href="<?php echo Text::url('logs');?>
"><?php echo Lang::T('Activity Log');?>
</a></div>
    <div class="panel-body">
        <ul class="list-unstyled">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dlog']->value, 'dl');
$_smarty_tpl->tpl_vars['dl']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dl']->value) {
$_smarty_tpl->tpl_vars['dl']->do_else = false;
?>
                <li class="primary">
                    <span class="point"></span>
                    <span class="time small text-muted"><?php echo Lang::timeElapsed($_smarty_tpl->tpl_vars['dl']->value['date'],true);?>
</span>
                    <p><?php echo $_smarty_tpl->tpl_vars['dl']->value['description'];?>
</p>
                </li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
</div><?php }
}
