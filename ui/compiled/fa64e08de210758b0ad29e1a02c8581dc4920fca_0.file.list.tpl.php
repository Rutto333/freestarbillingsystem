<?php
/* Smarty version 4.5.3, created on 2025-07-14 20:30:56
  from '/var/www/html/alpha/ui/ui/admin/routers/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68753ed0de43d5_48253864',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa64e08de210758b0ad29e1a02c8581dc4920fca' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/routers/list.tpl',
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
function content_68753ed0de43d5_48253864 (Smarty_Internal_Template $_smarty_tpl) {
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
                                <th><?php echo Lang::T('IP Address');?>
</th>
                                <th><?php echo Lang::T('Username');?>
</th>
                                <th><?php echo Lang::T('Description');?>
</th>
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['router_check']) {?>
                                    <th><?php echo Lang::T('Online Status');?>
</th>
                                    <th><?php echo Lang::T('Last Seen');?>
</th>
                                <?php }?>
                                <th><?php echo Lang::T('Status');?>
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
                                <tr <?php if ($_smarty_tpl->tpl_vars['ds']->value['enabled'] != 1) {?>class="danger" title="disabled" <?php }?>>
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['coordinates']) {?>
                                            <a href="https://www.google.com/maps/dir//<?php echo $_smarty_tpl->tpl_vars['ds']->value['coordinates'];?>
/" target="_blank"
                                                class="btn btn-default btn-xs" title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['coordinates'];?>
"><i
                                                    class="glyphicon glyphicon-map-marker"></i></a>
                                        <?php }?>
                                        <?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>

                                    </td>
                                    <td style="background-color: black; color: black;"
                                        onmouseleave="this.style.backgroundColor = 'black';"
                                        onmouseenter="this.style.backgroundColor = 'white';"><?php echo $_smarty_tpl->tpl_vars['ds']->value['ip_address'];?>
</td>
                                    <td style="background-color: black; color: black;"
                                        onmouseleave="this.style.backgroundColor = 'black';"
                                        onmouseenter="this.style.backgroundColor = 'white';"><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['description'];?>
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
                                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['last_seen'];?>
</td>
                                    <?php }?>
                                    <td><?php if ($_smarty_tpl->tpl_vars['ds']->value['enabled'] == 1) {
echo Lang::T('Enabled');
} else {
echo Lang::T('Disabled');
}?></td>
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
                <div class="bs-callout bs-callout-info" id="callout-navbar-role">
                    <h4><?php echo Lang::T('Check if Router Online?');?>
</h4>
                    <p><?php echo Lang::T('To check whether the Router is online or not, please visit the following page');?>
 <a
                            href="<?php echo Text::url('');?>
settings/miscellaneous#router_check" target="_blank"
                            class="btn btn-link"><?php echo Lang::T('Cek Now');?>
</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
