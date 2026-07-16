<?php
/* Smarty version 4.5.3, created on 2025-09-09 15:02:53
  from '/var/www/html/myapp/ui/ui/admin/pool/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c0176de75e46_21991610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ca619ab563cfa711f02c79c2c97e2de254225df' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/pool/edit.tpl',
      1 => 1752317410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68c0176de75e46_21991610 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-primary panel-hovered panel-stacked mb30">
			<div class="panel-heading"><?php echo Lang::T('Edit Pool');?>
</div>
			<div class="panel-body">

				<form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('');?>
pool/edit-post">
					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo Lang::T('Name Pool');?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['pool_name'];?>
"
								readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo Lang::T('Local IP');?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="local_ip" name="local_ip"
								value="<?php echo $_smarty_tpl->tpl_vars['d']->value['local_ip'];?>
" placeholder="192.168.88.1">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo Lang::T('Range IP');?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="ip_address" name="ip_address"
								value="<?php echo $_smarty_tpl->tpl_vars['d']->value['range_ip'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo Lang::T('Routers');?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="routers" name="routers" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['routers'];?>
"
								readonly>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_enable']) {?>
							<p class="help-block col-md-4"><?php echo Lang::T('For Radius, you need to add');?>
 <b><?php echo Lang::T('Name');?>

									Pool</b> <?php echo Lang::T('in Mikrotik manually');?>
</p>
						<?php }?>
					</div>

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success"
								onclick="return ask(this, '<?php echo Lang::T("Continue the Port change process?");?>
')"
								type="submit"><?php echo Lang::T('Save Changes');?>
</button>
							Or <a href="<?php echo Text::url('');?>
pool/list"><?php echo Lang::T('Cancel');?>
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
