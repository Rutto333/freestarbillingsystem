<?php
/* Smarty version 4.5.3, created on 2025-09-09 14:06:36
  from '/var/www/html/myapp/system/paymentgateway/ui/mpesa.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c00a3cc3bc02_70716699',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27ed70a790a4227e2c0b2bc8b7f08536ecc76847' => 
    array (
      0 => '/var/www/html/myapp/system/paymentgateway/ui/mpesa.tpl',
      1 => 1757415987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68c00a3cc3bc02_70716699 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var appUrl = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
';
<?php echo '</script'; ?>
>

<style>
    body {
        background-color: #f5f5dc; /* Cream background */
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 14px;
    }

    .container-simple {
        max-width: 800px;
        margin: 30px auto;
        padding: 0 20px;
    }

    .card-simple {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .header-simple {
        background: #964B00; /* Light brown theme */
        color: white;
        padding: 20px 28px;
        border-bottom: 1px solid #e5e7eb;
    }

    .header-simple h2 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
    }

    .content-simple {
        padding: 24px 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: #786c3b; /* Brown label text */
        font-size: 13px;
    }
    .form-text {
        font-size: 12px;
        color: #786c3b; /* Brown form text */
        margin-top: 4px;
    }

    .footer-simple {
        background-color: #f5f5dc; /* Cream footer background */
        padding: 20px 28px;
        border-top: 1px solid #e5e7eb;
        text-align: right;
    }

    .btn-save {
        background-color: #964B00; /* Brown button */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s;
        min-width: 120px;
    }

    .btn-save:hover {
        background-color: #78493b; /* Darker brown on hover */
    }

    .styled-btn {
        color: #964B00; /* Brown styled button text */
        border: 1px solid #964B00; /* Brown styled button border */
        background-color: #fff;
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 6px;
        transition: all 0.3s ease;
        display: inline-block;
        text-decoration: none;
    }

    .styled-btn:hover {
        background-color: #964B00; /* Brown styled button hover background */
        color: #fff;
    }
</style>

<div class="container-simple">
    <div class="card-simple">
        <div class="header-simple">
            <h2>M-Pesa Configuration</h2>
        </div>

        <div class="content-simple">
            <form id="mpesaConfigForm" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
paymentgateway/mpesa">

                <div class="form-group">
                    <label class="form-label">M-Pesa Environment</label>
                    <select class="form-control" name="mpesa_env">
                        <option value="sandbox" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_env'] == 'sandbox') {?>selected<?php }?>>Sandbox / Testing</option>
                        <option value="live" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_env'] == 'live') {?>selected<?php }?>>Live / Production</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Consumer Key</label>
                    <input type="text" class="form-control" name="mpesa_consumer_key" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_consumer_key'];?>
" placeholder="Enter Mpesa Consumer Key">
                </div>

                <div class="form-group">
                    <label class="form-label">Consumer Secret</label>
                    <input type="password" class="form-control" name="mpesa_consumer_secret" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_consumer_secret'];?>
" placeholder="Enter Mpesa Consumer Secret">
                </div>

                <div class="form-group">
                    <label class="form-label">Shortcode Type</label>
                    <select class="form-control" id="mpesa_shortcode_type" name="mpesa_shortcode_type">
                        <option value="Paybill" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_shortcode_type'] == "Paybill") {?>selected<?php }?>>Paybill</option>
                        <option value="BuyGoods" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_shortcode_type'] == "BuyGoods") {?>selected<?php }?>>BuyGoods Till</option>
                    </select>
                </div>

                <div class="form-group" id="tillNumberContainer" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_shortcode_type'] != "BuyGoods") {?>style="display:none;"<?php }?>>
                    <label class="form-label">BuyGoods Till Number</label>
                    <input type="text" class="form-control" name="mpesa_buygoods_till_number" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_buygoods_till_number'];?>
" placeholder="Enter Till Number">
                </div>

                <div class="form-group">
                    <label class="form-label">Business Shortcode</label>
                    <input type="text" class="form-control" name="mpesa_business_code" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_business_code'];?>
" maxlength="7" placeholder="Enter Business Shortcode">
                </div>

                <div class="form-group">
                    <label class="form-label">Pass Key</label>
                    <input type="text" class="form-control" name="mpesa_pass_key" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_pass_key'];?>
" placeholder="Enter Pass Key">
                </div>

                <div class="form-group">
                    <label class="form-label">Support Offline Pay Methods</label>
                    <select class="form-control select2" id="mpesa_channel_ofline_online" name="mpesa_channel_ofline_online">
                        <option value="0" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_channel_ofline_online'] == 0) {?>selected<?php }?>>No</option>
                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_channel_ofline_online'] == 1) {?>selected<?php }?>>Yes</option>
                    </select>
                </div>

                <div id="offlinePayFields" style="display:none;">
                    <div class="form-group">
                        <label class="form-label">C2B Version</label>
                        <select class="form-control select2" name="mpesa_api_version">
                            <option value="v1" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_api_version'] == 'v1') {?>selected<?php }?>>v1</option>
                            <option value="v2" <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_api_version'] == 'v2') {?>selected<?php }?>>v2</option>
                        </select>
                        <small class="form-text">Select the version of the API you want to use.</small>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['_c']->value['mpesa_channel_ofline_online'] == 1) {?>
                    <div class="form-group">
                        <label class="form-label">Register URL</label>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/c2b&kind=register" class="styled-btn">Register Mpesa C2B URL</a>
                    </div>
                    <?php }?>
                </div>

                <div class="footer-simple">
                    <button class="btn-save" type="submit">Save Changes</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
$(document).ready(function() {
    function toggleOfflinePayFields() {
        if ($('#mpesa_channel_ofline_online').val() == '1') {
            $('#offlinePayFields').show();
        } else {
            $('#offlinePayFields').hide();
        }
    }
    function toggleTillNumberInput() {
        if ($('#mpesa_shortcode_type').val() === 'BuyGoods') {
            $('#tillNumberContainer').show();
        } else {
            $('#tillNumberContainer').hide();
        }
    }
    toggleOfflinePayFields();
    toggleTillNumberInput();
    $('#mpesa_channel_ofline_online').on('change', toggleOfflinePayFields);
    $('#mpesa_shortcode_type').on('change', toggleTillNumberInput);

    // Ajax Save (like Payment Gateway page)
    $('#mpesaConfigForm').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);

        $.post(form.attr('action'), form.serialize(), function(response) {
            // If backend returns success, redirect
            Swal.fire({
                icon: 'success',
                title: 'Configuration Saved!',
                timer: 2000,
                showConfirmButton: false
            });
            setTimeout(function() {
                window.location.href = "<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/?_route=paymentgateway";
            }, 2000);
        }).fail(function() {
            Swal.fire({
                icon: 'error',
                title: 'Failed to save configuration!',
                text: 'Please try again.'
            });
        });
    });
});
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
