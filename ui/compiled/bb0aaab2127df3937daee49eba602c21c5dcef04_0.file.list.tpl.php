<?php
/* Smarty version 4.5.3, created on 2025-09-18 11:27:34
  from '/var/www/html/demo/ui/ui/admin/pool/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68cbc276ce1180_66075946',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb0aaab2127df3937daee49eba602c21c5dcef04' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/pool/list.tpl',
      1 => 1755816628,
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
function content_68cbc276ce1180_66075946 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- pool -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                    <a class="btn btn-primary btn-xs" title="save" href="<?php echo Text::url('');?>
pool/sync"
                        onclick="return ask(this, '<?php echo Lang::T('This will sync/send IP Pool to Mikrotik');?>
?')"><span
                            class="glyphicon glyphicon-refresh" aria-hidden="true"></span> <?php echo Lang::T('Sync');?>
</a>
                </div>
                <?php echo Lang::T('IP Pool');?>

            </div>
            <div class="panel-body">
                <div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
                    <div class="col-md-8">
                        <form id="site-search" method="post" action="<?php echo Text::url('');?>
pool/list/">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="name" class="form-control"
                                    placeholder="<?php echo Lang::T('Search by Name');?>
...">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="submit"><?php echo Lang::T('Search');?>
</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo Text::url('');?>
pool/add" class="btn btn-primary btn-block"><i
                                class="ion ion-android-add"> </i> <?php echo Lang::T('New Pool');?>
</a>
                    </div>&nbsp;
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><?php echo Lang::T('Name Pool');?>
</th>
                                <th><?php echo Lang::T('Local IP');?>
</th>
                                <th><?php echo Lang::T('Range IP');?>
</th>
                                <th><?php echo Lang::T('Routers');?>
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
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['pool_name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['local_ip'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['range_ip'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];?>
</td>
                                    <td align="center">
                                        <a href="<?php echo Text::url('');?>
pool/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                            class="btn btn-info btn-xs"><?php echo Lang::T('Edit');?>
</a>
                                        <a href="<?php echo Text::url('');?>
pool/delete/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                            onclick="return ask(this, '<?php echo Lang::T('Delete');?>
?')"
                                            class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
