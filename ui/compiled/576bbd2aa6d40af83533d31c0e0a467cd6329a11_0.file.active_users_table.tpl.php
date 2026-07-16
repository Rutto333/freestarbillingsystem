<?php
/* Smarty version 4.5.3, created on 2025-09-17 16:45:11
  from '/var/www/html/demo/ui/ui/widget/active_users_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68cabb674f6f81_27490165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '576bbd2aa6d40af83533d31c0e0a467cd6329a11' => 
    array (
      0 => '/var/www/html/demo/ui/ui/widget/active_users_table.tpl',
      1 => 1758116702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68cabb674f6f81_27490165 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['active_users']->value) {?>
<div class="panel panel-primary mb20 panel-hovered project-stats table-responsive">
    <div class="panel-heading">Users Active Packages</div>
    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
        <table class="table table-hover table-striped table-condensed">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Package Name</th>
                    <th>Routers</th>
                    <th>Type</th>
                    <th>Recharged On</th>
                    <th>Expiration</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['active_users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->namebp;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->routers;?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['user']->value->type == 'pppoe') {?>
                            <span class="label label-info">PPPoE</span>
                            <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->type == 'hotspot') {?>
                            <span class="label label-success">Hotspot</span>
                            <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['user']->value->type;?>

                            <?php }?>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->recharged_on;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->recharged_time;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->expiration;?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->time;?>
</td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</div>
<?php } else { ?>
<div class="panel panel-primary mb20 panel-hovered project-stats table-responsive">
    <div class="panel-heading">Active Users</div>
    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
        <table class="table table-hover table-striped table-condensed">
            <tbody>
                <tr>
                    <td colspan="6" class="text-center text-muted">No active users found.</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php }
}
}
