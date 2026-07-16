<?php
/* Smarty version 4.5.3, created on 2025-09-04 09:08:07
  from '/var/www/html/myapp/ui/ui/admin/bandwidth/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b92cc7d6ff48_43850513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '105930568476cf03612eeb9ebc34b6b85381b213' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/bandwidth/list.tpl',
      1 => 1755677096,
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
function content_68b92cc7d6ff48_43850513 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-primary">
			<div class="panel-heading"><?php echo Lang::T('Bandwidth Plans');?>
</div>
			<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="col-md-8">
						<form id="site-search" method="post" action="<?php echo Text::url('bandwidth/list/');?>
">
							<div class="input-group">
								<input type="text" name="name" class="form-control"
									placeholder="<?php echo Lang::T('Search by Name');?>
...">
							</div>
						</form>
					</div>
					<div class="col-md-4">
						<a href="<?php echo Text::url('bandwidth/add');?>
" class="btn btn-primary btn-block"><i
								class="ion ion-android-add">
							</i> <?php echo Lang::T('New Bandwidth');?>
</a>
					</div>&nbsp;
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-condensed table-striped table_mobile">
						<thead>
							<tr>
								<th><?php echo Lang::T('Bandwidth Name');?>
</th>
								<th><?php echo Lang::T('Rate');?>
</th>
								<th>Burst</th>
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
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['name_bw'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['rate_down'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['rate_down_unit'];?>
 / <?php echo $_smarty_tpl->tpl_vars['ds']->value['rate_up'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['rate_up_unit'];?>

									</td>
									<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['burst'];?>
</td>
									<td>
										<a href="<?php echo Text::url('bandwidth/edit/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
"
											class="btn btn-sm btn-warning"><?php echo Lang::T('Edit');?>
</a>
										<a href="<?php echo Text::url('bandwidth/delete/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
											class="btn btn-danger btn-sm"
											onclick="return ask(this, '<?php echo Lang::T('Delete');?>
?')"><i
												class="glyphicon glyphicon-trash"></i></a>
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
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
