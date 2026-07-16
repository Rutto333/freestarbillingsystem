<?php
/* Smarty version 4.5.3, created on 2025-09-19 11:35:16
  from '/var/www/html/demo/ui/ui/admin/pool/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68cd15c4e3bae3_53023062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fcb728c50363749171c0161b8535b330839f195' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/pool/add.tpl',
      1 => 1757423110,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68cd15c4e3bae3_53023062 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="panel panel-primary panel-hovered panel-stacked mb30">
					<div class="panel-heading"><?php echo Lang::T('Add Pool');?>
</div>
						<div class="panel-body">

                <form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('');?>
pool/add-post" >
                    <div class="form-group">
						<label class="col-md-2 control-label"><?php echo Lang::T('Name Pool');?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="name" name="name">
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label"><?php echo Lang::T('Local IP');?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="local_ip" name="local_ip" placeholder="192.168.88.1">
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label"><?php echo Lang::T('Range IP');?>
</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="192.168.88.2-192.168.88.254">
						</div>
                    </div>
                    <div class="form-group">
						<label class="col-md-2 control-label"><?php echo Lang::T('Routers');?>
</label>
						<div class="col-md-6">
							<select id="routers" name="routers" class="form-control select2">
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_enable']) {?>
                                    <option value="radius">Radius</option>
                                <?php }?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['r']->value, 'rs');
$_smarty_tpl->tpl_vars['rs']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rs']->value) {
$_smarty_tpl->tpl_vars['rs']->do_else = false;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['rs']->value['name'];?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
						</div>
                    </div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary" onclick="return ask(this, '<?php echo Lang::T("Continue the Pool addition process?");?>
')" type="submit"><?php echo Lang::T('Save Changes');?>
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
