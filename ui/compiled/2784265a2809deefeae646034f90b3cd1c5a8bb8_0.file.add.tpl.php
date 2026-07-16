<?php
/* Smarty version 4.5.3, created on 2025-09-20 22:55:06
  from '/var/www/html/demo/ui/ui/admin/voucher/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68cf069a3ca831_68587519',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2784265a2809deefeae646034f90b3cd1c5a8bb8' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/voucher/add.tpl',
      1 => 1752321010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68cf069a3ca831_68587519 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- voucher-add -->

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary panel-hovered panel-stacked mb30">
            <div class="panel-heading"><?php echo Lang::T('Add Vouchers');?>
</div>
            <div class="panel-body">

                <form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('');?>
plan/voucher-post">
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Type');?>
</label>
                        <div class="col-md-6">
                            <input type="radio" id="Hot" name="type" value="Hotspot"> <?php echo Lang::T('Hotspot Plans');?>

                            <input type="radio" id="POE" name="type" value="PPPOE"> <?php echo Lang::T('PPPOE Plans');?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Routers');?>
</label>
                        <div class="col-md-6">
                            <select id="server" name="server" class="form-control select2">
                                <option value=''><?php echo Lang::T('Select Routers');?>
</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Service Plan');?>
</label>
                        <div class="col-md-6">
                            <select id="plan" name="plan" class="form-control select2">
                                <option value=''><?php echo Lang::T('Select Plans');?>
</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Number of Vouchers');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="numbervoucher" value="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Voucher Format');?>
</label>
                        <div class="col-md-6">
                            <select name="voucher_format" id="voucher_format" class="form-control">
                                <option value="numbers" <?php if ($_smarty_tpl->tpl_vars['_c']->value['voucher_format'] == 'numbers') {?>selected="selected" <?php }?>>
                                    Numbers
                                </option>
                                <option value="up" <?php if ($_smarty_tpl->tpl_vars['_c']->value['voucher_format'] == 'up') {?>selected="selected" <?php }?>>UPPERCASE
                                </option>
                                <option value="low" <?php if ($_smarty_tpl->tpl_vars['_c']->value['voucher_format'] == 'low') {?>selected="selected" <?php }?>>
                                    lowercase
                                </option>
                                <option value="rand" <?php if ($_smarty_tpl->tpl_vars['_c']->value['voucher_format'] == 'rand') {?>selected="selected" <?php }?>>
                                    RaNdoM
                                </option>
                            </select>
                        </div>
                        <p class="help-block col-md-4">UPPERCASE lowercase RaNdoM</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Voucher Prefix');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="prefix" placeholder="NUX-"
                                value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['voucher_prefix'];?>
">
                        </div>
                        <p class="help-block col-md-4">NUX-VoUCHeRCOdE</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Length Code');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="lengthcode" value="12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label"><?php echo Lang::T('Print Now');?>
</label>

                        <div class="col-sm-10">
                            <input type="checkbox" id="print_now" name="print_now" class="iCheck" value="yes"
                                onclick="showVouchersPerPage()">
                        </div>
                    </div>

                    <div class="form-group" id="printers" style="display:none;">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Vouchers Per Page');?>
</label>
                        <div class="col-md-6">
                            <input type="text" id="voucher-print" class="form-control" name="voucher_per_page"
                                value="36" placeholder="<?php echo Lang::T("Vouchers Per Page");?>
 (default 36)">
                        </div>
                        <p class="help-block col-md-4">
                            <?php echo Lang::T('Vouchers Per Page');?>
 (default 36)
                        </p>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-success"
                                onclick="return ask(this, '<?php echo Lang::T("Continue the Voucher creation process?");?>
')"
                                type="submit"><?php echo Lang::T('Generate');?>
</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- /voucher-add -->

<?php echo '<script'; ?>
>
    function showVouchersPerPage() {
        var printNow = document.getElementById('print_now');
        var printers = document.getElementById('printers');
        var voucherPrint = document.getElementById('voucher-print');

        voucherPrint.required = false;
        if (printNow.checked) {
            printers.style.display = 'block';
            voucherPrint.required = true;
        } else {
            printers.style.display = 'none';
        }
    }
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
