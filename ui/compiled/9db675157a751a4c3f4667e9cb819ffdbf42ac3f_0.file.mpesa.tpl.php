<?php
/* Smarty version 4.5.3, created on 2025-07-19 11:53:20
  from '/var/www/html/alpha/system/paymentgateway/ui/mpesa.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687b5d00b069f7_82089328',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9db675157a751a4c3f4667e9cb819ffdbf42ac3f' => 
    array (
      0 => '/var/www/html/alpha/system/paymentgateway/ui/mpesa.tpl',
      1 => 1742616090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_687b5d00b069f7_82089328 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
<style>
.styled-form-group {
    margin-bottom: 20px;
}

.styled-btn {
    color: #28a745;
    border: 1px solid #28a745;
    background-color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.styled-btn:hover {
    background-color: #28a745;
    color: #fff;
}

.styled-small-text {
    color: blue;
    margin-top: 10px;
    display: block;
    font-size: 14px;
}
</style>

<form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
paymentgateway/mpesa" >
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-primary panel-hovered panel-stacked mb30">
                <div class="panel-heading">M-Pesa</div>
                <div class="panel-body row">
                  <div class="form-group col-6">
                        <label class="col-md-3 control-label">M-Pesa Environment</label>
                        <div class="col-md-6">
                            <select class="form-control" name="mpesa_env">
                                <option value="sandbox" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_env'] == 'sandbox') {?>selected<?php }?>>SandBox or Testing</option>
                                <option value="live" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_env'] == 'live') {?>selected<?php }?>>Live or Production</option>
                            </select>
                            <small class="form-text text-muted"><font color="red"><b>Sandbox</b></font> is for testing purpose, please switch to <font color="green"><b>Live</b></font> in production.</small>
                        </div>
                    </div>

                    <div class="form-group col-6">
                        <label class="col-md-3 control-label">Consumer Key</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mpesa_consumer_key" name="mpesa_consumer_key" placeholder="xxxxxxxxxxxxxxxxx" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_consumer_key'];?>
">
                            <small class="form-text text-muted"><a href="https://developer.safaricom.co.ke/MyApps" target="_blank">https://developer.safaricom.co.ke/MyApps</a></small>
                        </div>
                    </div>

                    <div class="form-group col-6">
                        <label class="col-md-3 control-label">Consumer Secret</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="mpesa_consumer_secret" name="mpesa_consumer_secret" placeholder="xxxxxxxxxxxxxxxxx" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_consumer_secret'];?>
">
                        </div>
                    </div>

                    <div class="form-group col-6">
                        <label class="col-md-3 control-label">Mpesa Shortcode Type</label>
                        <div class="col-md-6">
                            <select class="form-control" name="mpesa_shortcode_type" id="mpesa_shortcode_type">
                                <option value="Paybill" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_shortcode_type'] == "Paybill") {?>selected<?php }?>>Paybill Number</option>
                                <option value="BuyGoods" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_shortcode_type'] == "BuyGoods") {?>selected<?php }?>>BuyGoods Till Number</option>
                            </select>
                        </div>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_shortcode_type'] == "BuyGoods") {?>
                        <div class="form-group col-6" id="tillNumberContainer">
                            <label class="col-md-3 control-label">Mpesa BuyGoods Till Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_buygoods_till_number'];?>
" name="mpesa_buygoods_till_number"  placeholder="Enter Till Number">
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="form-group col-6" id="tillNumberContainer" style="display: none;">
                            <label class="col-md-3 control-label">Mpesa BuyGoodsTill Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mpesa_buygoods_till_number"  placeholder="Enter Till Number">
                            </div>
                        </div>
                    <?php }?>


                    




                    <div class="form-group col-6">
                        <label class="col-md-3 control-label">Business Shortcode</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mpesa_business_code" name="mpesa_business_code" placeholder="xxxxxxx" maxlength="7" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_business_code'];?>
">
                        </div>
                    </div>
					<div class="form-group col-6">
                        <label class="col-md-3 control-label">Pass Key</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mpesa_pass_key" name="mpesa_pass_key" placeholder="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919" maxlength="" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_pass_key'];?>
">
                        </div>
                    </div>

                  

                    <div class="form-group col-6">
                        <label class="col-md-3 control-label">Support Offline Pay Methods</label>
                        <div class="col-md-6">
                            <select class="form-control" name="mpesa_channel_ofline_online" id="mpesa_channel_ofline_online">
                                <option value="0" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_channel_ofline_online'] == 0) {?>selected<?php }?>>No</option>
                                <option value="1" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_channel_ofline_online'] == 1) {?>selected<?php }?>>Yes</option>
                            </select>
                            <small class="form-text text-muted">Enable this if you want to support offline payment methods.</small>
                        </div>
                    </div>

                    <div id="offlinePayFields" style="display: none;">
                        <div class="form-group col-6">
                            <label class="col-md-3 control-label">C2B Version</label>
                            <div class="col-md-6">
                                <select class="form-control" name="mpesa_api_version">
                                    <option value="v1" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_api_version'] == 'v1') {?>selected<?php }?>>v1</option>
                                    <option value="v2" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_api_version'] == 'v2') {?>selected<?php }?>>v2</option>
                                </select>
                                <small class="form-text text-muted">Select the version of the API you want to use.</small>
                            </div>    
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_channel_ofline_online'] == 1) {?>
                            <div class="form-group col-12 styled-form-group">
                                <label class="col-md-3 control-label">Register Url</label>
                                <div class="col-md-6">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/c2b&kind=register" class="btn styled-btn">Click to Register Mpesa C2B Url Support Offline Payment</a>
                                    <small class="form-text text-muted styled-small-text">Click only after you have saved the changes.</small>
                                </div>
                            </div>
                        <?php }?>

                    </div>

                    <div class="form-group col-6">
                        <div class="col-lg-offset-3 col-lg-10">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Save Changes</button>
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
<?php echo '<script'; ?>
>
        $(document).ready(function() {
            toggleOfflinePayFields();
            $('#mpesa_channel_ofline_online').on('change', function() {
                toggleOfflinePayFields();
            });
            function toggleOfflinePayFields() {
                if ($('#mpesa_channel_ofline_online').val() == '1') {
                    $('#offlinePayFields').show();
                } else {
                    $('#offlinePayFields').hide();
                }
            }
        });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
        $(document).ready(function() {
            toggleTillNumberInput();
            $('#mpesa_shortcode_type').on('change', function() {
                toggleTillNumberInput();
            });
            function toggleTillNumberInput() {
                if ($('#mpesa_shortcode_type').val() === 'BuyGoods') {
                    $('#tillNumberContainer').show();
                } else {
                    $('#tillNumberContainer').hide();
                }
            }
        });
    <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
