<?php
/* Smarty version 4.5.3, created on 2025-07-17 19:29:48
  from '/var/www/html/alpha/ui/ui/admin/logs/system.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687924fc490180_55639135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ca26774f3d542bcafbff58c50efc32ed83471c9' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/logs/system.tpl',
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
function content_687924fc490180_55639135 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- pool -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                    <div class="btn-group pull-right">
                        <a class="btn btn-primary btn-xs" title="save" href="<?php echo Text::url('logs/list-csv');?>
"
                            onclick="return ask(this, '<?php echo Lang::T('This will export to CSV');?>
?')"><span class="glyphicon glyphicon-download"
                                aria-hidden="true"></span> CSV</a>
                    </div>
                <?php }?>
                <?php echo Lang::T('Activity Log');?>

            </div>
            <div class="panel-body">
                <div class="text-center" style="padding: 15px">
                    <div class="col-md-4">
                        <form id="site-search" method="post" action="<?php echo Text::url('logs/list/');?>
">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="q" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
"
                                    placeholder="<?php echo Lang::T('Search by Name');?>
...">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="submit"><?php echo Lang::T('Search');?>
</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <form class="form-inline" method="post" action="<?php echo Text::url('');?>
logs/list/">
                            <div class="input-group has-error">
                                <span class="input-group-addon"><?php echo Lang::T('Keep Logs');?>
 </span>
                                <input type="text" name="keep" class="form-control" placeholder="90" value="90">
                                <span class="input-group-addon"><?php echo Lang::T('Days');?>
</span>
                            </div>
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return ask(this, '<?php echo Lang::T("Clear old logs?");?>
')"><?php echo Lang::T('Clean up Logs');?>
</button>
                        </form>
                    </div>&nbsp;
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed">
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
</td>
                                    <td><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['date']);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['ip'];?>
</td>
                                    <td style="overflow-x: scroll;"><?php echo nl2br($_smarty_tpl->tpl_vars['ds']->value['description']);?>
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
