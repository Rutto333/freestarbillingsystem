<?php
/* Smarty version 4.5.3, created on 2025-08-29 10:22:33
  from '/var/www/html/example/ui/ui/widget/online_users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b15539ee9493_06908538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d602fa2ad416c4f87fb549224a0fd2c8c791aed' => 
    array (
      0 => '/var/www/html/example/ui/ui/widget/online_users.tpl',
      1 => 1756451995,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68b15539ee9493_06908538 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['onlineUsers']->value) {?>
<div class="panel panel-primary mb20 panel-hovered project-stats table-responsive">
    <div class="panel-heading">Online Users</div>
    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
        <table class="table table-hover table-striped table-condensed">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Username</th>
                    <th>IP Address</th>
                    <th>Uptime</th>
                 </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['onlineUsers']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                    <?php if (trim($_smarty_tpl->tpl_vars['user']->value['username']) != '') {?>
                    <tr>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['user']->value['type'] == 'pppoe') {?>
                            <span class="label label-info">PPPoE</span>
                            <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['type'] == 'hotspot') {?>
                            <span class="label label-success">Hotspot</span>
                            <?php }?>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
                        <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value['address'] ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
</td>
                        <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['user']->value['uptime'] ?? null)===null||$tmp==='' ? 'N/A' ?? null : $tmp);?>
</td>
                    </tr>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</div>
<?php } else { ?>
<div class="panel panel-primary mb20 panel-hovered project-stats table-responsive">
    <div class="panel-heading">Online Users</div>
    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
        <table class="table table-hover table-striped table-condensed">
            <tbody>
                <tr>
                    <td colspan="10" class="text-center text-muted">No online users found.</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php }
}
}
