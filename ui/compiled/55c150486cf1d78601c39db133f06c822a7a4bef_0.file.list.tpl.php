<?php
/* Smarty version 4.5.3, created on 2025-09-04 09:18:12
  from '/var/www/html/myapp/ui/ui/admin/routers/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b92f246c61b2_92132459',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55c150486cf1d78601c39db133f06c822a7a4bef' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/routers/list.tpl',
      1 => 1756485114,
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
function content_68b92f246c61b2_92132459 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- routers -->

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading"><?php echo Lang::T('Routers');?>

                <div class="btn-group pull-right">
                    <a class="btn btn-primary btn-xs" title="save" href="<?php echo Text::url('');?>
routers/maps">
                        <span class="glyphicon glyphicon-map-marker"></span></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
                    <div class="col-md-8">

                        <form id="site-search" method="post" action="<?php echo Text::url('');?>
routers/list/">
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
routers/add" class="btn btn-primary btn-block"><i
                                class="ion ion-android-add">
                            </i> <?php echo Lang::T('New Router');?>
</a>
                    </div>&nbsp;
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><?php echo Lang::T('Router Name');?>
</th>
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['router_check']) {?>
                                    <th><?php echo Lang::T('Online Status');?>
</th>
                                <?php }?>
                                <th><?php echo Lang::T('Manage');?>
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
                                <tr <?php if ($_smarty_tpl->tpl_vars['ds']->value['enabled'] != 1) {?>class="danger" title="disabled" <?php }?>>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>

                                    </td>
                                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['router_check']) {?>
                                        <td>
                                            <span
                                                class="label <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Online') {?>label-success <?php } else { ?>label-danger <?php }?>">
                                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Online') {?>
                                                    <?php echo Lang::T('Online');?>

                                                <?php } else { ?>
                                                    <?php echo Lang::T('Offline');?>

                                                <?php }?>
                                            </span>
                                        </td>
                                    <?php }?>
                                    <td>
                                        <a href="<?php echo Text::url('');?>
routers/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                            class="btn btn-info btn-xs"><?php echo Lang::T('Edit');?>
</a>
                                        <a href="<?php echo Text::url('');?>
routers/delete/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                            onclick="return ask(this, '<?php echo Lang::T('Delete');?>
?')"
                                            class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
