<?php
/* Smarty version 4.5.3, created on 2025-09-13 08:49:02
  from '/var/www/html/myapp/ui/ui/admin/pppoe/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c505ce59fde8_89304969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b74b12edbcd4aae8d08f7c0b701e012edac0ef3' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/pppoe/edit.tpl',
      1 => 1757742534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68c505ce59fde8_89304969 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('');?>
services/edit-pppoe-post">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary panel-hovered panel-stacked mb30">
                <div class="panel-heading"><?php echo Lang::T('Edit Service Plan');?>
 || <?php echo $_smarty_tpl->tpl_vars['d']->value['name_plan'];?>
</div>
                <div class="panel-body">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                    <input type="hidden" name="enabled" value="1">
                    <input type="hidden" name="prepaid" value="yes">
                    <input type="hidden" name="plan_type" value="Personal">
                    <input type="hidden" name="plan_expired" value="0">
                    <input type="hidden" class="form-control" name="price_old" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['price_old'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_enable'] && $_smarty_tpl->tpl_vars['d']->value['is_radius']) {?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Radius
                                <a tabindex="0" class="btn btn-link btn-xs" role="button" data-toggle="popover"
                                    data-trigger="focus" data-container="body"
                                    data-content="<?php echo Lang::T("If you enable Radius, choose device to radius, except if you have custom device.");?>
">?</a>
                            </label>
                            <div class="col-md-9">
                                <label class="label label-primary">RADIUS</label>
                            </div>
                        </div>
                    <?php }?>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Device');?>

                            <a tabindex="0" class="btn btn-link btn-xs" role="button" data-toggle="popover"
                                data-trigger="focus" data-container="body"
                                data-content="<?php echo Lang::T("This Device are the logic how PHPNuxBill Communicate with Mikrotik or other Devices");?>
"></a>
                        </label>
                        <div class="col-md-9">
                            <select class="form-control" id="device" name="device">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['devices']->value, 'dev');
$_smarty_tpl->tpl_vars['dev']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dev']->value) {
$_smarty_tpl->tpl_vars['dev']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['dev']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['dev']->value == $_smarty_tpl->tpl_vars['d']->value['device']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['dev']->value;?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Package Name');?>
</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="name_plan" maxlength="40" name="name_plan"
                                value="<?php echo $_smarty_tpl->tpl_vars['d']->value['name_plan'];?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Bandwidth Name');?>
</label>
                        <div class="col-md-9">
                            <select id="id_bw" name="id_bw" class="form-control select2">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['b']->value, 'bs');
$_smarty_tpl->tpl_vars['bs']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['bs']->value) {
$_smarty_tpl->tpl_vars['bs']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['bs']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['d']->value['id_bw'] == $_smarty_tpl->tpl_vars['bs']->value['id']) {?> selected <?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['bs']->value['name_bw'];?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Package Price');?>
</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</span>
                                <input type="number" class="form-control" name="price" required value="<?php echo $_smarty_tpl->tpl_vars['d']->value['price'];?>
">
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
                        <label class="col-md-3 control-label"><?php echo Lang::T('Plan Validity');?>
</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="validity" name="validity"
                                value="<?php echo $_smarty_tpl->tpl_vars['d']->value['validity'];?>
">
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="validity_unit" name="validity_unit">
                                <?php if ($_smarty_tpl->tpl_vars['d']->value['prepaid'] == 'yes') {?>
                                    <option value="Mins" <?php if ($_smarty_tpl->tpl_vars['d']->value['validity_unit'] == 'Mins') {?> selected <?php }?>><?php echo Lang::T('Mins');?>

                                    </option>
                                    <option value="Hrs" <?php if ($_smarty_tpl->tpl_vars['d']->value['validity_unit'] == 'Hrs') {?> selected <?php }?>><?php echo Lang::T('Hrs');?>

                                    </option>
                                    <option value="Days" <?php if ($_smarty_tpl->tpl_vars['d']->value['validity_unit'] == 'Days') {?> selected <?php }?>><?php echo Lang::T('Days');?>

                                    </option>
                                    <option value="Months" <?php if ($_smarty_tpl->tpl_vars['d']->value['validity_unit'] == 'Months') {?> selected <?php }?>>
                                        <?php echo Lang::T('Months');?>
</option>
                                <?php } else { ?>
                                    <option value="Period" <?php if ($_smarty_tpl->tpl_vars['d']->value['validity_unit'] == 'Period') {?> selected <?php }?>>
                                        <?php echo Lang::T('Period');?>
</option>
                                <?php }?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group <?php if ($_smarty_tpl->tpl_vars['d']->value['prepaid'] == 'yes') {?>hidden<?php }?>" id="expired_date">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Expired Date');?>

                            <a tabindex="0" class="btn btn-link btn-xs" role="button" data-toggle="popover"
                                data-trigger="focus" data-container="body"
                                data-content="<?php echo Lang::T("Expired will be this date every month");?>
">?</a>
                        </label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="expired_date" maxlength="2"
                                value="<?php if ($_smarty_tpl->tpl_vars['d']->value['expired_date']) {
echo $_smarty_tpl->tpl_vars['d']->value['expired_date'];
} else { ?>20<?php }?>" min="1" max="28"
                                step="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('IP Pool');?>
</label>
                        <div class="col-md-9">
                            <select id="pool_name" name="pool_name" required class="form-control select2">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['p']->value, 'ps');
$_smarty_tpl->tpl_vars['ps']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ps']->value) {
$_smarty_tpl->tpl_vars['ps']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ps']->value['pool_name'];?>
" <?php if ($_smarty_tpl->tpl_vars['d']->value['pool'] == $_smarty_tpl->tpl_vars['ps']->value['pool_name']) {?> selected <?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['ps']->value['pool_name'];?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Router Name');?>
</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="routers" name="routers" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['routers'];?>
"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button class="btn btn-success"
                onclick="return ask(this, '<?php echo Lang::T("Continue the PPPoE Package change process?");?>
')"
                type="submit"><?php echo Lang::T('Save Changes');?>
</button>
            Or <a href="<?php echo Text::url('');?>
services/pppoe"><?php echo Lang::T('Cancel');?>
</a>
        </div>
    </div>
</form>


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
</option>
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
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript" type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript" type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/perl/perl.min.js"><?php echo '</script'; ?>
>

<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css">
</link>
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/theme/abbott.min.css">
</link>

<?php echo '<script'; ?>
>
    CodeMirror.fromTextArea(document.getElementById('code'), {
        lineNumbers: true,
        mode: 'text/x-perl',
    });
    CodeMirror.fromTextArea(document.getElementById('code2'), {
        lineNumbers: true,
        mode: 'text/x-perl',
    });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
