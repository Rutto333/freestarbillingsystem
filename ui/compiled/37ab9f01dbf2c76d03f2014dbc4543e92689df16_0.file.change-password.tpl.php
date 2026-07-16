<?php
/* Smarty version 4.5.3, created on 2025-09-24 14:51:15
  from '/var/www/html/demo/ui/ui/admin/change-password.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68d3db33221f29_39119051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37ab9f01dbf2c76d03f2014dbc4543e92689df16' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/change-password.tpl',
      1 => 1742435032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68d3db33221f29_39119051 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="panel panel-primary panel-hovered panel-stacked mb30">
					<div class="panel-heading"><?php echo Lang::T('Change Password');?>
</div>
						<div class="panel-body">
						<form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('settings/change-password-post');?>
">
							<input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
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
									<?php echo Lang::T('Or');?>
 <a href="<?php echo Text::url('dashboard');?>
"><?php echo Lang::T('Cancel');?>
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
