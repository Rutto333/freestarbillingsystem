<?php
/* Smarty version 4.5.3, created on 2025-09-16 21:51:33
  from '/var/www/html/demo/ui/ui/admin/hotspot/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c9b1b5d472a3_54448460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70642de0ed2d660196b8c4383041e7c5a739191d' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/hotspot/add.tpl',
      1 => 1757417304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68c9b1b5d472a3_54448460 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary panel-hovered panel-stacked mb30">
            <div class="panel-heading"><?php echo Lang::T('Add Service Package');?>
</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('services/add-post');?>
">

                    <!-- Hidden default values -->
                    <input type="hidden" name="enabled" value="1">
                    <input type="hidden" name="prepaid" value="yes">
                    <input type="hidden" name="plan_type" value="Personal">
                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_enable']) {?>
                        <input type="hidden" name="radius" value="1">
                    <?php }?>

                    <span id="deviceChoose" class="">
                        <div class="form-group">
                            <label class="col-md-2 control-label">
                                <?php echo Lang::T('Device');?>

                            </label>
                            <div class="col-md-6">
                                <select id="device" name="device" required class="form-control">
                                    <option value=''><?php echo Lang::T('Select a Device');?>
</option>
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
                    </span>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Package Name');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" maxlength="40">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Package Type');?>
</label>
                        <div class="col-md-10">
                            <div class="radio-group">
                                <label class="radio-option">
                                    <input type="radio" id="Unlimited" name="typebp" value="Unlimited" checked>
                                    <span class="radio-custom"></span>
                                    <?php echo Lang::T('Unlimited');?>

                                </label>
                                <label class="radio-option">
                                    <input type="radio" id="Limited" name="typebp" value="Limited">
                                    <span class="radio-custom"></span>
                                    <?php echo Lang::T('Limited');?>

                                </label>
                            </div>
                        </div>
                    </div>

                    <div style="display:none;" id="Type">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo Lang::T('Limit Type');?>
</label>
                            <div class="col-md-10">
                                <div class="radio-group">
                                    <label class="radio-option">
                                        <input type="radio" id="Time_Limit" name="limit_type" value="Time_Limit" checked>
                                        <span class="radio-custom"></span>
                                        <?php echo Lang::T('Time Limit');?>

                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" id="Data_Limit" name="limit_type" value="Data_Limit">
                                        <span class="radio-custom"></span>
                                        <?php echo Lang::T('Data Limit');?>

                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" id="Both_Limit" name="limit_type" value="Both_Limit">
                                        <span class="radio-custom"></span>
                                        <?php echo Lang::T('Both Limit');?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="display:none;" id="TimeLimit">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo Lang::T('Time Limit');?>
</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="time_limit" name="time_limit" value="0">
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="time_unit" name="time_unit">
                                    <option value="Hrs"><?php echo Lang::T('Hrs');?>
</option>
                                    <option value="Mins"><?php echo Lang::T('Mins');?>
</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div style="display:none;" id="DataLimit">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo Lang::T('Data Limit');?>
</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="data_limit" name="data_limit" value="0">
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="data_unit" name="data_unit">
                                    <option value="MB">MBs</option>
                                    <option value="GB">GBs</option>
                                </select>
                            </div>
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
                        <label class="col-md-2 control-label"><?php echo Lang::T('Package Price');?>
</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</span>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Shared Users');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="sharedusers" name="sharedusers" value="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Package Validity');?>
</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="validity" name="validity">
                        </div>
                        <div class="col-md-2">
                            <select id="validity_unit" name="validity_unit" required class="form-control">
                                <option value=""><?php echo Lang::T('Select Unit');?>
</option>
                                <option value="Minutes"><?php echo Lang::T('Minutes');?>
</option>
                                <option value="Hours"><?php echo Lang::T('Hours');?>
</option>
                                <option value="Days"><?php echo Lang::T('Days');?>
</option>
                                <option value="Weeks"><?php echo Lang::T('Weeks');?>
</option>
                                <option value="Months"><?php echo Lang::T('Months');?>
</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group hidden" id="expired_date">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Expired Date');?>
</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="expired_date" maxlength="2" value="20" min="1" max="28" step="1">
                        </div>
                    </div>

                    <span id="routerChoose" class="">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo Lang::T('Router Name');?>
</label>
                            <div class="col-md-6">
                                <select id="routers" name="routers" required class="form-control select2">
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
                                <p class="help-block"><?php echo Lang::T('Cannot be change after saved');?>
</p>
                            </div>
                        </div>
                    </span>

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-success" onclick="return ask(this, '<?php echo Lang::T("Continue the process of changing Hotspot Package data?");?>
')" type="submit">
                                <?php echo Lang::T('Save Changes');?>

                            </button>
                            <?php echo Lang::T("Or");?>
 <a href="<?php echo Text::url('services/hotspot');?>
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
    var preOpt = `<option value="Mins"><?php echo Lang::T('Mins');?>
</option>
    <option value="Hrs"><?php echo Lang::T('Hrs');?>
</option>
    <option value="Days"><?php echo Lang::T('Days');?>
</option>
    <option value="Months"><?php echo Lang::T('Months');?>
</option>`;
    var postOpt = `<option value="Period"><?php echo Lang::T('Period');?>
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

<?php if ($_smarty_tpl->tpl_vars['_c']->value['radius_enable']) {?>
    
        <?php echo '<script'; ?>
>
            function isRadius(cek) {
                if (cek.checked) {
                    $("#routerChoose").addClass('hidden');
                    document.getElementById("routers").required = false;
                } else {
                    document.getElementById("routers").required = true;
                    $("#routerChoose").removeClass('hidden');
                }
            }
        <?php echo '</script'; ?>
>
    
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
