<?php
/* Smarty version 4.5.3, created on 2025-07-22 12:10:58
  from '/var/www/html/alpha/ui/ui/admin/bandwidth/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687f55a207e8e0_91881250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee73f3b795aa3094809aedf30f9e3a5e15fd32e5' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/bandwidth/list.tpl',
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
function content_687f55a207e8e0_91881250 (Smarty_Internal_Template $_smarty_tpl) {
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
				<div class="bs-callout bs-callout-info" id="callout-navbar-role">
					<h4><?php echo Lang::T('Create Bandwidth Package for expired Internet Package');?>
</h4>
					<p><?php echo Lang::T('When customer expired, you can move it to Expired Internet Package');?>
</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
