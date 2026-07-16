<?php
/* Smarty version 4.5.3, created on 2025-08-27 08:47:47
  from '/var/www/html/example/ui/ui/widget/mikrotik_cron_monitor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68ae9c030582b7_78831242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '517a3a46f56ef129b859ac74e9f5a7eeee5936d0' => 
    array (
      0 => '/var/www/html/example/ui/ui/widget/mikrotik_cron_monitor.tpl',
      1 => 1742449432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68ae9c030582b7_78831242 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_c']->value['router_check'] && count($_smarty_tpl->tpl_vars['routeroffs']->value) > 0) {?>
    <div class="panel panel-danger">
        <div class="panel-heading text-bold"><?php echo Lang::T('Routers Offline');?>
</div>
        <div class="table-responsive">
            <table class="table table-condensed">
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['routeroffs']->value, 'ros');
$_smarty_tpl->tpl_vars['ros']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ros']->value) {
$_smarty_tpl->tpl_vars['ros']->do_else = false;
?>
                        <tr>
                            <td><a href="<?php echo Text::url('routers/edit/',$_smarty_tpl->tpl_vars['ros']->value['id']);?>
" class="text-bold text-red"><?php echo $_smarty_tpl->tpl_vars['ros']->value['name'];?>
</a></td>
                            <td data-toggle="tooltip" data-placement="top" class="text-red"
                                    title="<?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ros']->value['last_seen']);?>
"><?php echo Lang::timeElapsed($_smarty_tpl->tpl_vars['ros']->value['last_seen']);?>

                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>
    </div>
<?php }
}
}
