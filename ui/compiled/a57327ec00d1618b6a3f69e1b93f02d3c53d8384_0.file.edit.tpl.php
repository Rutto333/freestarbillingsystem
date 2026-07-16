<?php
/* Smarty version 4.5.3, created on 2025-09-09 13:43:39
  from '/var/www/html/myapp/ui/ui/admin/bandwidth/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c004db2410e2_70839038',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a57327ec00d1618b6a3f69e1b93f02d3c53d8384' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/bandwidth/edit.tpl',
      1 => 1757414608,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68c004db2410e2_70839038 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
	<div class="col-sm-8">
		<div class="panel panel-primary panel-hovered panel-stacked mb30">
			<div class="panel-heading"><?php echo Lang::T('Edit Bandwidth');?>
</div>
			<div class="panel-body">

				<form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('bandwidth/edit-post');?>
">
					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo Lang::T('Bandwidth Name');?>
</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['name_bw'];?>
">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo Lang::T('Rate Download');?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="rate_down" name="rate_down"
								value="<?php echo $_smarty_tpl->tpl_vars['d']->value['rate_down'];?>
">
						</div>
						<div class="col-md-3">
							<select class="form-control" id="rate_down_unit" name="rate_down_unit">
								<option value="Kbps" <?php if ($_smarty_tpl->tpl_vars['d']->value['rate_down_unit'] == 'Kbps') {?>selected="selected" <?php }?>>Kbps
								</option>
								<option value="Mbps" <?php if ($_smarty_tpl->tpl_vars['d']->value['rate_down_unit'] == 'Mbps') {?>selected="selected" <?php }?>>Mbps
								</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo Lang::T('Rate Upload');?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="rate_up" name="rate_up" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['rate_up'];?>
">
						</div>
						<div class="col-md-3">
							<select class="form-control" id="rate_up_unit" name="rate_up_unit">
								<option value="Kbps" <?php if ($_smarty_tpl->tpl_vars['d']->value['rate_up_unit'] == 'Kbps') {?>selected="selected" <?php }?>>Kbps
								</option>
								<option value="Mbps" <?php if ($_smarty_tpl->tpl_vars['d']->value['rate_up_unit'] == 'Mbps') {?>selected="selected" <?php }?>>Mbps
								</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary" onclick="return ask(this, '<?php echo Lang::T("Continue the Bandwidth change process?");?>
')" type="submit"><?php echo Lang::T('Save Change');?>
</button>
							<?php echo Lang::T("Or");?>
 <a href="<?php echo Text::url('bandwidth/list');?>
"><?php echo Lang::T('Cancel');?>
</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php echo '<script'; ?>
>
	function burstIt(value) {
		var b = value.split(" ");
		$("#burst_limit").val(b[1]);
		$("#burst_threshold").val(b[2]);
		$("#burst_time").val(b[3]);
		$("#burst_priority").val(b[4]);
		$("#burst_limit_at").val(b[5]);
		var a = b[0].split("/");
		$("#rate_down").val(a[0].replace('M',''));
		$("#rate_up").val(a[1].replace('M',''));
		$('#rate_down_unit').val('Mbps');
		$('#rate_up_unit').val('Mbps');
		window.scrollTo(0, 0);
	}
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
