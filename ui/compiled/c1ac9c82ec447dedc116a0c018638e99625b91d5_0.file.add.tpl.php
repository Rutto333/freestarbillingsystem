<?php
/* Smarty version 4.5.3, created on 2025-10-23 10:53:21
  from '/var/www/html/dev/ui/ui/admin/pppoe/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68f9def1a91b90_59686853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1ac9c82ec447dedc116a0c018638e99625b91d5' => 
    array (
      0 => '/var/www/html/dev/ui/ui/admin/pppoe/add.tpl',
      1 => 1757421374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68f9def1a91b90_59686853 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary panel-hovered panel-stacked mb30">
            <div class="panel-heading"><?php echo Lang::T('Add Service Plan');?>
</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('');?>
services/pppoe-add-post">

                    <!-- Hidden default values -->
                    <input type="hidden" name="enabled" value="1">
                    <input type="hidden" name="prepaid" value="yes">
                    <input type="hidden" name="plan_type" value="Personal">
                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_enable']) {?>
                        <input type="hidden" name="radius" value="1">
                    <?php }?>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Device');?>

                            <a tabindex="0" class="btn btn-link btn-xs" role="button" data-toggle="popover"
                                data-trigger="focus" data-container="body"
                                data-content="<?php echo Lang::T("This Device are the logic how PHPNuxBill Communicate with Mikrotik or other Devices");?>
"></a>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" id="device" name="device">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['devices']->value, 'dev');
$_smarty_tpl->tpl_vars['dev']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dev']->value) {
$_smarty_tpl->tpl_vars['dev']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['dev']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['dev']->value;?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Plan Name');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name_plan" maxlength="40" name="name_plan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">
                        <?php echo Lang::T('Bandwidth Name');?>

                        </label>
                        <div class="col-md-6">
                            <select id="id_bw" name="id_bw" class="form-control">
                                <option value=""><?php echo Lang::T('Select Bandwidth');?>
...</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['name_bw'];?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Plan Price');?>
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
 % <?php echo Lang::T('Tax Rates will be added');?>
</p>
                            <?php } else { ?>
                                <p class="help-block col-md-4"><?php echo number_format($_smarty_tpl->tpl_vars['_c']->value['tax_rate']*100,2);?>
 % <?php echo Lang::T('Tax Rates will be added');?>
</p>
                            <?php }?>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Plan Validity');?>
</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="validity" name="validity">
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="validity_unit" name="validity_unit">
                            </select>
                        </div>
                    </div>

                    <div class="form-group hidden" id="expired_date">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Expired Date');?>

                            <a tabindex="0" class="btn btn-link btn-xs" role="button" data-toggle="popover"
                                data-trigger="focus" data-container="body"
                                data-content="<?php echo Lang::T("Expired will be this date every month");?>
">?</a>
                        </label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="expired_date" maxlength="2" value="20" min="1" max="28" step="1" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Router Name');?>
</label>
                        <div class="col-md-6">
                            <select id="routers" name="routers" required class="form-control">
                                <option value=''><?php echo Lang::T('Select Routers');?>
</option>
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
                        <label class="col-md-2 control-label"><?php echo Lang::T('IP Pool');?>
</label>
                        <div class="col-md-6">
                            <select id="pool_name" name="pool_name" required class="form-control">
                                <option value=''><?php echo Lang::T('Select Pool');?>
</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-primary" onclick="return ask(this, '<?php echo Lang::T("Continue the process of adding the PPPoE Package?");?>
')" type="submit"><?php echo Lang::T('Save Changes');?>
</button>
                            Or <a href="<?php echo Text::url('');?>
services/pppoe"><?php echo Lang::T('Cancel');?>
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
    var preOpt = `<option value="Mins"><?php echo Lang::T('Mins');?>
</option>
    <option value="Hrs"><?php echo Lang::T('Hrs');?>
</option>
    <option value="Days"><?php echo Lang::T('Days');?>
</option>
    <option value="Months"><?php echo Lang::T('Months');?>
</option>`;
    var postOpt = `<option value="Period"><?php echo Lang::T('Period');?>

    <option value="Months"><?php echo Lang::T('Months');?>
</option>`;
    function prePaid() {
        $("#validity_unit").html(preOpt);
        $('#expired_date').addClass('hidden');
    }

    function postPaid() {
        $("#validity_unit").html(postOpt);
        $("#expired_date").removeClass('hidden');
    }
    document.addEventListener("DOMContentLoaded", function(event) {
        prePaid()
    })
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
