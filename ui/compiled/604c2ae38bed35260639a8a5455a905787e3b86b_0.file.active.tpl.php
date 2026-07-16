<?php
/* Smarty version 4.5.3, created on 2025-09-17 16:17:59
  from '/var/www/html/demo/ui/ui/admin/plan/active.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68cab507057468_74223781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '604c2ae38bed35260639a8a5455a905787e3b86b' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/plan/active.tpl',
      1 => 1755680792,
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
function content_68cab507057468_74223781 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <?php echo Lang::T('Active Customers');?>

            </div>
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
