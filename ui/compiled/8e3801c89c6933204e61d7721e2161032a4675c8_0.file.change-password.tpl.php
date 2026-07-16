<?php
/* Smarty version 4.5.3, created on 2025-09-10 14:14:01
  from '/var/www/html/myapp/ui/ui/customer/change-password.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c15d799f95f3_73241897',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e3801c89c6933204e61d7721e2161032a4675c8' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/customer/change-password.tpl',
      1 => 1742427832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header.tpl' => 1,
    'file:customer/footer.tpl' => 1,
  ),
),false)) {
function content_68c15d799f95f3_73241897 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- user-change-password -->

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary panel-hovered panel-stacked mb30">
            <div class="panel-heading"><?php echo Lang::T('Change Password');?>
</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" role="form"
                    action="<?php echo Text::url('accounts/change-password-post');?>
">
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Current Password');?>
</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('New Password');?>
</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="npass" name="npass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Confirm New Password');?>
</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="cnpass" name="cnpass">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-success" type="submit"><?php echo Lang::T('Save Changes');?>
</button>
                            Or <a href="<?php echo Text::url('home');?>
"><?php echo Lang::T('Cancel');?>
</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
