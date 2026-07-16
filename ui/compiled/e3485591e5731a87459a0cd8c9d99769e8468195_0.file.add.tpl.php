<?php
/* Smarty version 4.5.3, created on 2025-09-16 21:42:16
  from '/var/www/html/demo/ui/ui/admin/routers/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c9af88b07102_82698407',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3485591e5731a87459a0cd8c9d99769e8468195' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/routers/add.tpl',
      1 => 1756489434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68c9af88b07102_82698407 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- routers-add -->

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary panel-hovered panel-stacked mb30">
            <div class="panel-heading"><?php echo Lang::T('Add Router');?>
</div>
            <div class="panel-body">

                <form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('');?>
routers/add-post">
                    <div class="form-group" style="display:none;">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Status');?>
</label>
                        <div class="col-md-10">
                            <input type="hidden" name="enabled" value="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Router Name');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" maxlength="32">
			</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('IP Address');?>
</label>
                        <div class="col-md-6">
                            <input type="text" placeholder="192.168.88.1:8728" class="form-control" id="ip_address"
                                name="ip_address">
                    	</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Username');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('password');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="password" name="password"
                            onmouseleave="this.type = 'password'" onmouseenter="this.type = 'text'">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-6">
                            <label><input type="checkbox" checked name="testIt" value="yes"> <?php echo Lang::T('Test Connection');?>
</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" onclick="return ask(this, '<?php echo Lang::T("Continue the process of adding Routers?");?>
')"
                                type="submit"><?php echo Lang::T('Save');?>
</button>
                            Or <a href="<?php echo Text::url('');?>
routers/list"><?php echo Lang::T('Cancel');?>
</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
