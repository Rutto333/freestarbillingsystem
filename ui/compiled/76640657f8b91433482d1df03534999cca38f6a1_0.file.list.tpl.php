<?php
/* Smarty version 4.5.3, created on 2025-07-18 10:03:16
  from '/var/www/html/alpha/ui/ui/admin/balance/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6879f1b47453a3_42001480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76640657f8b91433482d1df03534999cca38f6a1' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/balance/list.tpl',
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
function content_6879f1b47453a3_42001480 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-hovered mb20 panel-primary">
			<div class="panel-heading"><?php echo Lang::T('Balance Package');?>
</div>
			<div class="panel-body">
				<div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
					<div class="col-md-8">
						<form id="site-search" method="post" action="<?php echo Text::url('services/balance/');?>
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
						<a href="<?php echo Text::url('services/balance-add');?>
" class="btn btn-primary btn-block"><i
								class="ion ion-android-add"> </i> <?php echo Lang::T('New Service Package');?>
</a>
					</div>&nbsp;
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-condensed">
						<thead>
							<tr>
								<th><?php echo Lang::T('Package Name');?>
</th>
								<th><?php echo Lang::T('Package Price');?>
</th>
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
								<tr <?php if ($_smarty_tpl->tpl_vars['ds']->value['enabled'] != 1) {?>class="danger" title="disabled" <?php }?>>
									<td><?php echo $_smarty_tpl->tpl_vars['ds']->value['name_plan'];?>
</td>
									<td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);
if (!empty($_smarty_tpl->tpl_vars['ds']->value['price_old'])) {?>
											<sup
												style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price_old']);?>
</sup>
										<?php }?>
									</td>
									<td>
										<a href="<?php echo Text::url('services/balance-edit/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
"
											class="btn btn-info btn-xs"><?php echo Lang::T('Edit');?>
</a>
										<a href="<?php echo Text::url('services/balance-delete/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
"
											onclick="return ask(this, '<?php echo Lang::T('Delete');?>
?')" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
											class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
