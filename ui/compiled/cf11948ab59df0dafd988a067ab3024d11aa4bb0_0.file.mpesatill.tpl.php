<?php
/* Smarty version 4.5.3, created on 2025-08-27 09:37:37
  from '/var/www/html/example/system/paymentgateway/ui/mpesatill.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68aea7b1507992_49458767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf11948ab59df0dafd988a067ab3024d11aa4bb0' => 
    array (
      0 => '/var/www/html/example/system/paymentgateway/ui/mpesatill.tpl',
      1 => 1749730990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68aea7b1507992_49458767 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
paymentgateway/MpesatillStk" >
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-primary panel-hovered panel-stacked mb30">
                <div class="panel-heading">M-Pesa</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Consumer Key</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mpesa_consumer_key" name="mpesa_till_consumer_key" placeholder="xxxxxxxxxxxxxxxxx" value="F9whD1He9L7V2PxsZpGKmSoChcBAfBSQfXCMYT52xSpa5QWl">
                            <small class="form-text text-muted"><a href="https://developer.safaricom.co.ke/MyApps" target="_blank">https://developer.safaricom.co.ke/MyApps</a></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Consumer Secret</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mpesa_consumer_secret" name="mpesa_till_consumer_secret" placeholder="xxxxxxxxxxxxxxxxx" value="u2Tr9GBlVIIOMHnG8aN8TXn7scoA1AU8KAHrRzucTqsAkizLecfGNRiVUa9ymz69">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Business Shortcode(Store number/H.O)</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mpesa_business_code" name="mpesa_till_business_code" placeholder="xxxxxxx" maxlength="7" value="4164679">
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="col-md-2 control-label">Business Shortcode(Till number)</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mpesa_business_code" name="mpesa_till_partyb" placeholder="xxxxxxx" maxlength="7" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_till_partyb'];?>
">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-2 control-label">Pass Key</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mpesa_pass_key" name="mpesa_till_pass_key" placeholder="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919" maxlength="" value="ee3965abccf07decb8a9764b8e2351a86c2ccc79714668cbe3b893609da54fc3">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-2 control-label">M-Pesa Environment</label>
                        <div class="col-md-6">
                            <select class="form-control" name="mpesa_till_env">
                                <option value="sandbox">Sandbox</option>
                                <option value="live" selected>Live</option>
                            </select>
                            <small class="form-text text-muted"><font color="red"><b>Sandbox</b></font> is for testing purpose, please switch to <font color="green"><b>Live</b></font> in production.</small>
                        </div>
                    </div>

                   
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                        </div>
                    </div>
                        <pre>/ip hotspot walled-garden
                   add dst-host=safaricom.co.ke
                   add dst-host=*.safaricom.co.ke</pre>
                </div>
            </div>

        </div>
    </div>
</form>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
