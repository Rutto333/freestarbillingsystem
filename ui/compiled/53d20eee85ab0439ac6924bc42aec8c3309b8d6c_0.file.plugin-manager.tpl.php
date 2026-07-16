<?php
/* Smarty version 4.5.3, created on 2025-07-09 11:38:55
  from '/var/www/html/alpha/ui/ui/admin/settings/plugin-manager.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_686e2a9f501ef2_29694480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53d20eee85ab0439ac6924bc42aec8c3309b8d6c' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/settings/plugin-manager.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_686e2a9f501ef2_29694480 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (empty($_smarty_tpl->tpl_vars['_c']->value['github_token'])) {?>
    <p class="help-block"><?php echo Lang::T('To download from private/paid repository');?>
, <a
            href="<?php echo Text::url('');?>
settings/app#GithubAuthentication">
            <?php echo Lang::T('Set your Github Authentication first');?>
</a></p>
<?php }?>

<form method="post" enctype="multipart/form-data"
    onsubmit="return ask(this, 'Warning, installing unknown source can damage your server, continue?')"
    action="<?php echo Text::url('');?>
pluginmanager/dlinstall">
    <div class="panel panel-primary panel-hovered">
        <div class="panel-heading">
            <?php echo Lang::T('Plugin Installer');?>

            <div class="btn-group pull-right">
                <a class="btn btn-warning btn-xs" title="info"
                    href="https://github.com/hotspotbilling/phpnuxbill/wiki/Installing-Plugin-or-Payment-Gateway"
                    target="_blank"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> info</a>
                <a class="btn btn-success btn-xs" title="refresh cache"
                    href="<?php echo Text::url('');?>
pluginmanager/refresh"><span class="glyphicon glyphicon-refresh"
                        aria-hidden="true"></span> refresh</a>
            </div>
        </div>
        <div class="panel-body row">
            <div class="form-group col-md-4">
                <label><?php echo Lang::T('Upload Zip Plugin/Theme/Device');?>
</label>
                <input type="file" name="zip_plugin" accept="application/zip" onchange="this.submit()">
            </div>
            <div class="form-group col-md-7">
                <label>Github url</label>
                <input type="url" class="form-control" name="gh_url"
                    placeholder="https://github.com/username/repository">
            </div>
            <div class="col-md-1">
                <br>
                <button type="submit" class="btn btn-primary"><?php echo Lang::T('Install');?>
</button>
            </div>
        </div>
    </div>
</form>

<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#plugin" aria-controls="plugin" role="tab"
                data-toggle="tab"><?php echo Lang::T('Plugin');?>
</a></li>
        <li role="presentation"><a href="#pg" aria-controls="pg" role="tab"
                data-toggle="tab"><?php echo Lang::T('Payment Gateway');?>
</a>
        </li>
        <li role="presentation"><a href="#device" aria-controls="device" role="tab"
                data-toggle="tab"><?php echo Lang::T('Devices');?>
</a>
        </li>
    </ul>
    <br>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="plugin">
            <div class="row">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plugins']->value, 'plugin');
$_smarty_tpl->tpl_vars['plugin']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plugin']->value) {
$_smarty_tpl->tpl_vars['plugin']->do_else = false;
?>
                    <div class="col-md-4">
                        <div class="box box-hovered mb20 box-primary">
                            <div class="box-header">
                                <h3 class="box-title text1line"><?php echo $_smarty_tpl->tpl_vars['plugin']->value['name'];?>
</h3>
                            </div>
                            <div class="box-body" style="overflow-y: scroll;">
                                <div style="max-height: 50px; min-height: 50px;"><?php echo $_smarty_tpl->tpl_vars['plugin']->value['description'];?>
</div>
                            </div>
                            <div class="box-footer">
                                <center><small><i>@<?php echo $_smarty_tpl->tpl_vars['plugin']->value['author'];?>
 Last update: <?php echo $_smarty_tpl->tpl_vars['plugin']->value['last_update'];?>
</i></small>
                                </center>
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['url'];?>
" target="_blank" style="color: black;"
                                        class="btn btn-<?php if ($_smarty_tpl->tpl_vars['plugin']->value['ispaid']) {?>warning<?php } else { ?>primary<?php }?>"><i
                                            class="glyphicon glyphicon-globe"></i>
                                        <?php if ($_smarty_tpl->tpl_vars['plugin']->value['ispaid']) {?>Buy<?php } else { ?>Web<?php }?></a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['github'];?>
" target="_blank" style="color: black;"
                                        class="btn btn-info"><i class="glyphicon glyphicon-align-left"></i> Source</a>
                                </div>
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <a href="<?php echo Text::url('');?>
pluginmanager/delete/plugin/<?php echo $_smarty_tpl->tpl_vars['plugin']->value['id'];?>
"
                                        onclick="return ask(this, '<?php echo Lang::T('Delete');?>
?')" class="btn btn-danger"><i
                                            class="glyphicon glyphicon-trash"></i> Delete</a>
                                    <a <?php if ($_smarty_tpl->tpl_vars['zipExt']->value) {?> href="<?php echo Text::url('');?>
pluginmanager/install/plugin/<?php echo $_smarty_tpl->tpl_vars['plugin']->value['id'];?>
"
                                            onclick="return ask(this, 'Installing plugin will take some time to complete, do not close the page while it loading to install the plugin')"
                                        <?php } else { ?> href="#" onclick="alert('PHP ZIP extension is not installed')"
                                        <?php }?>
                                        style="color: black;" class="btn btn-success"><i
                                            class="glyphicon glyphicon-circle-arrow-down"></i> Install</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="pg">
            <div class="row">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pgs']->value, 'pg');
$_smarty_tpl->tpl_vars['pg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pg']->value) {
$_smarty_tpl->tpl_vars['pg']->do_else = false;
?>
                    <div class="col-md-4">
                        <div class="box box-hovered mb20 box-primary">
                            <div class="box-header">
                                <h3 class="box-title text1line"><?php echo $_smarty_tpl->tpl_vars['pg']->value['name'];?>
</h3>
                            </div>
                            <div class="box-body" style="overflow-y: scroll;">
                                <div style="max-height: 50px; min-height: 50px;"><?php echo $_smarty_tpl->tpl_vars['pg']->value['description'];?>
</div>
                            </div>
                            <div class="box-footer ">
                                <center><small><i>@<?php echo $_smarty_tpl->tpl_vars['pg']->value['author'];?>
 Last update: <?php echo $_smarty_tpl->tpl_vars['pg']->value['last_update'];?>
</i></small>
                                </center>
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['pg']->value['url'];?>
" target="_blank" style="color: black;"
                                        class="btn btn-<?php if ($_smarty_tpl->tpl_vars['pg']->value['ispaid']) {?>warning<?php } else { ?>primary<?php }?>"><i
                                            class="glyphicon glyphicon-globe"></i>
                                        <?php if ($_smarty_tpl->tpl_vars['pg']->value['ispaid']) {?>Buy<?php } else { ?>Web<?php }?>
                                    </a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['pg']->value['github'];?>
" target="_blank" style="color: black;" class="btn btn-info"><i
                                            class="glyphicon glyphicon-align-left"></i> Source</a>
                                    <a <?php if ($_smarty_tpl->tpl_vars['zipExt']->value) {?> href="<?php echo Text::url('');?>
pluginmanager/install/payment/<?php echo $_smarty_tpl->tpl_vars['pg']->value['id'];?>
"
                                            onclick="return ask(this, 'Installing plugin will take some time to complete, do not close the page while it loading to install the plugin')"
                                        <?php } else { ?> href="#" onclick="alert('PHP ZIP extension is not available')"
                                        <?php }?>
                                        style="color: black;" class="btn btn-success"><i
                                            class="glyphicon glyphicon-circle-arrow-down"></i> Install</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="device">
            <div class="row">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dvcs']->value, 'dvc');
$_smarty_tpl->tpl_vars['dvc']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dvc']->value) {
$_smarty_tpl->tpl_vars['dvc']->do_else = false;
?>
                    <div class="col-md-4">
                        <div class="box box-hovered mb20 box-primary">
                            <div class="box-header">
                                <h3 class="box-title text1line"><?php echo $_smarty_tpl->tpl_vars['dvc']->value['name'];?>
</h3>
                            </div>
                            <div class="box-body" style="overflow-y: scroll;">
                                <div style="max-height: 50px; min-height: 50px;"><?php echo $_smarty_tpl->tpl_vars['dvc']->value['description'];?>
</div>
                            </div>
                            <div class="box-footer ">
                                <center><small><i>@<?php echo $_smarty_tpl->tpl_vars['dvc']->value['author'];?>
 Last update: <?php echo $_smarty_tpl->tpl_vars['dvc']->value['last_update'];?>
</i></small>
                                </center>
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['dvc']->value['url'];?>
" target="_blank" style="color: black;"
                                        class="btn btn-<?php if ($_smarty_tpl->tpl_vars['dvc']->value['ispaid']) {?>warning<?php } else { ?>primary<?php }?>"><i
                                            class="glyphicon glyphicon-globe"></i>
                                        <?php if ($_smarty_tpl->tpl_vars['dvc']->value['ispaid']) {?>Buy<?php } else { ?>Web<?php }?>
                                    </a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['dvc']->value['github'];?>
" target="_blank" style="color: black;" class="btn btn-info"><i
                                            class="glyphicon glyphicon-align-left"></i> Source</a>
                                    <a <?php if ($_smarty_tpl->tpl_vars['zipExt']->value) {?> href="<?php echo Text::url('');?>
pluginmanager/install/device/<?php echo $_smarty_tpl->tpl_vars['dvc']->value['id'];?>
"
                                            onclick="return ask(this, 'Installing plugin will take some time to complete, do not close the page while it loading to install the plugin')"
                                        <?php } else { ?> href="#" onclick="alert('PHP ZIP extension is not available')"
                                        <?php }?>
                                        style="color: black;" class="btn btn-success"><i
                                            class="glyphicon glyphicon-circle-arrow-down"></i> Install</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
    </div>

</div>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
