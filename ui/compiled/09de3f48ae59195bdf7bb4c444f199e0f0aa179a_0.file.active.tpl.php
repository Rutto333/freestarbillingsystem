<?php
/* Smarty version 4.5.3, created on 2026-06-22 15:24:42
  from '/var/www/html/dev/ui/ui/admin/plan/active.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a39298ae1d6b3_31418371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09de3f48ae59195bdf7bb4c444f199e0f0aa179a' => 
    array (
      0 => '/var/www/html/dev/ui/ui/admin/plan/active.tpl',
      1 => 1782131076,
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
function content_6a39298ae1d6b3_31418371 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                    <div class="btn-group pull-right">
                        <a class="btn btn-primary btn-xs" title="save" href="<?php echo Text::url('');?>
plan/sync"
                            onclick="return ask(this, '<?php echo Lang::T("This will sync dan send Customer active package to Mikrotik");?>
?')"><span
                                class="glyphicon glyphicon-refresh" aria-hidden="true"></span> <?php echo Lang::T("Sync");?>
</a>
                    </div>
                                    <?php }?>
                &nbsp;
                <?php echo Lang::T('Active Customers');?>

            </div>
            <form id="site-search" method="post" action="<?php echo Text::url('');?>
plan/list/">
                <div class="panel-body">
                    <div class="row row-no-gutters" style="padding: 5px">
                        <div class="col-lg-2 col-xs-4">
                            <select class="form-control" id="router" name="router">
                                <option value=""><?php echo Lang::T("Location");?>
</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['routers']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['router']->value == $_smarty_tpl->tpl_vars['r']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r']->value;?>

                                    </option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                        <div class="col-lg-2 col-xs-4">
                            <select class="form-control" id="plan" name="plan">
                                <option value=""><?php echo Lang::T("Plan Name");?>
</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['plan']->value == $_smarty_tpl->tpl_vars['p']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['p']->value['name_plan'];?>

                                    </option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                        <div class="col-lg-2 col-xs-4">
                            <select class="form-control" id="status" name="status">
                                <option value="-"><?php echo Lang::T("Status");?>
</option>
                                <option value="on" <?php if ($_smarty_tpl->tpl_vars['status']->value == 'on') {?>selected<?php }?>><?php echo Lang::T("Active");?>
</option>
                                <option value="off" <?php if ($_smarty_tpl->tpl_vars['status']->value == 'off') {?>selected<?php }?>><?php echo Lang::T("Expired");?>
</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-xs-6">
                            <button class="btn btn-success btn-block" type="submit"><span
                                    class="fa fa-search"></span></button>
                        </div>
                        <div class="col-md-2 col-xs-6">
                            <a href="<?php echo Text::url('');?>
plan/recharge" class="btn btn-primary btn-block"><i
                                    class="ion ion-android-add">
                                </i> <?php echo Lang::T("Recharge Account");?>
</a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <div style="margin-left: 5px; margin-right: 5px;">&nbsp;
                    <table id="datatable" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><?php echo Lang::T("Username");?>
</th>
                                <th><?php echo Lang::T("Plan Name");?>
</th>
                                <th><?php echo Lang::T("Type");?>
</th>
                                <th><?php echo Lang::T("Created On");?>
</th>
                                <th><?php echo Lang::T("Expires On");?>
</th>
                                <th><?php echo Lang::T("Method");?>
</th>
                                <th><a href="<?php echo Text::url('');?>
routers/list"><?php echo Lang::T("Router");?>
</a></th>
                                <th><?php echo Lang::T("Manage");?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'off') {?>class="danger" <?php }?>>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_id'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>
</td>
                                    <td><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['recharged_on'],$_smarty_tpl->tpl_vars['ds']->value['recharged_time']);?>
</td>
                                    <td><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expiration'],$_smarty_tpl->tpl_vars['ds']->value['time']);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['method'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];?>
</td>
                                    <td>
                                        <a href="<?php echo Text::url('');?>
plan/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-warning btn-xs"
                                            style="color: black;"><?php echo Lang::T("Edit");?>
</a>
                                        <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                                            <a href="<?php echo Text::url('');?>
plan/delete/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                                onclick="return ask(this, '<?php echo Lang::T("Delete");?>
?')"
                                                class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'off' && $_smarty_tpl->tpl_vars['_c']->value['extend_expired']) {?>
                                            <a href="javascript:extend('<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
')"
                                                class="btn btn-info btn-xs"><?php echo Lang::T("Extend");?>
</a>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
    function extend(idP) {
        var res = prompt("Extend for many days?", "3");
        if (res) {
            if (confirm("Extend for " + res + " days?")) {
                window.location.href = "<?php echo Text::url('plan/extend/');?>
" + idP + "/" + res + "<?php echo Text::isQA('? or &');?>
stoken=<?php echo App::getToken();?>
";
            }
        }
    }
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
