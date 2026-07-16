<?php
/* Smarty version 4.5.3, created on 2025-07-09 11:56:09
  from '/var/www/html/alpha/ui/ui/admin/admin/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_686e2ea9776da6_13425457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b59fb68d48573f1cf299196b6dd095a218e79e7' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/admin/list.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:pagination.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_686e2ea9776da6_13425457 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- users -->

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading"><?php echo Lang::T('Manage Administrator');?>
</div>
            <div class="panel-body">
                <div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
                    <div class="col-md-8">
                        <form id="site-search" method="post" action="<?php echo Text::url('settings/users/');?>
">
                            <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="search" value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
" class="form-control"
                                    placeholder="Search by Username...">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="submit"><?php echo Lang::T('Search');?>
</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo Text::url('settings/users-add');?>
" class="btn btn-primary btn-block"><i
                                class="ion ion-android-add"> </i> <?php echo Lang::T('Add New Administrator');?>
</a>
                    </div>&nbsp;
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><?php echo Lang::T('Username');?>
</th>
                                <th><?php echo Lang::T('Full Name');?>
</th>
                                <th><?php echo Lang::T('Phone');?>
</th>
                                <th><?php echo Lang::T('Email');?>
</th>
                                <th><?php echo Lang::T('Type');?>
</th>
                                <th><?php echo Lang::T('Location');?>
</th>
                                <th><?php echo Lang::T('Agent');?>
</th>
                                <th><?php echo Lang::T('Last Login');?>
</th>
                                <th><?php echo Lang::T('Manage');?>
</th>
                                <th>ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] != 'Active') {?>class="danger"<?php }?>>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['fullname'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['phone'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['user_type'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['ds']->value['subdistrict'];?>
, <?php echo $_smarty_tpl->tpl_vars['ds']->value['ward'];?>
</td>
                                <td><?php if ($_smarty_tpl->tpl_vars['ds']->value['root']) {?>
                                    <a href="<?php echo Text::url('settings/users-view/',$_smarty_tpl->tpl_vars['ds']->value['root']);?>
">
                            <?php echo $_smarty_tpl->tpl_vars['admins']->value[$_smarty_tpl->tpl_vars['ds']->value['root']];?>
</a><?php }?></td>
                        <td><?php if ($_smarty_tpl->tpl_vars['ds']->value['last_login']) {
echo Lang::timeElapsed($_smarty_tpl->tpl_vars['ds']->value['last_login']);
}?></td>
                                    <td>
                                        <a href="<?php echo Text::url('settings/users-view/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
"
                                            class="btn btn-success btn-xs"><?php echo Lang::T('View');?>
</a>
                                        <a href="<?php echo Text::url('settings/users-edit/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
"
                                            class="btn btn-info btn-xs"><?php echo Lang::T('Edit');?>
</a>
                                        <?php if (($_smarty_tpl->tpl_vars['_admin']->value['id']) != ($_smarty_tpl->tpl_vars['ds']->value['id'])) {?>
                                            <a href="<?php echo Text::url('settings/users-delete/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                                class="btn btn-danger btn-xs" onclick="return ask(this, '<?php echo Lang::T('Delete');?>
?')"><i class="glyphicon glyphicon-trash"></i></a>
                                        <?php }?>
                                    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
</td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
                <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
