<?php
/* Smarty version 4.5.3, created on 2025-07-22 11:59:51
  from '/var/www/html/alpha/ui/ui/admin/balance/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687f53076c8936_83219623',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7d6d223a4f911be74a23e2703da047d59c5562f' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/balance/add.tpl',
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
function content_687f53076c8936_83219623 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary panel-hovered panel-stacked mb30">
            <div class="panel-heading"><?php echo Lang::T('Add Service Package');?>
</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('services/balance-add-post');?>
">
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Status');?>
</label>
                        <div class="col-md-10">
                            <label class="radio-inline warning">
                                <input type="radio" checked name="enabled" value="1"> <?php echo Lang::T('Active');?>

                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="enabled" value="0"> <?php echo Lang::T('Not Active');?>

                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Package Name');?>
</label>
                        <div class="col-md-6">
                            <input type="text" required class="form-control" id="name" name="name" maxlength="40"
                                placeholder="Topup 100">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Package Price');?>
</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</span>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_tax'] == 'yes') {?>
                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['tax_rate'] == 'custom') {?>
                        <p class="help-block col-md-4"><?php echo number_format($_smarty_tpl->tpl_vars['_c']->value['custom_tax_rate'],2);?>
 % <?php echo Lang::T('Tax Rates
                            will be added');?>
</p>
                        <?php } else { ?>
                        <p class="help-block col-md-4"><?php echo number_format($_smarty_tpl->tpl_vars['_c']->value['tax_rate']*100,2);?>
 % <?php echo Lang::T('Tax Rates
                            will be added');?>
</p>
                        <?php }?>
                        <?php }?>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-success" onclick="return ask(this, '<?php echo Lang::T("Continue the balance top-up process?");?>
')" type="submit"><?php echo Lang::T('Save Changes');?>
</button>
                            Or <a href="<?php echo Text::url('services/balance');?>
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
