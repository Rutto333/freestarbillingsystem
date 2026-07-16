{include file="sections/header.tpl"}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    var appUrl = '{$app_url}';
</script>

<style>
    body {
        background-color: #FFFFFF; 
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 14px;
    }

    .container-simple {
        max-width: 800px;
        margin: 30px auto;
        padding: 0 20px;
    }

    .card-simple {
        background: #FFFFFF;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border: 1px solid #e5e7eb;
    }

    .header-simple {
        background: #FFFFFF;
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
        font-size: 13px;
    }

    .form-text {
        font-size: 12px;
        margin-top: 4px;
    }

    .footer-simple {
        padding: 20px 28px;
        border-top: 1px solid #e5e7eb;
        text-align: right;
    }

    .btn-save {
        background-color: #1A73E8; 
        color: #FFFFFF;
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
        background-color: #1557B0; 
    }

    .styled-btn {
        color: #1A73E8;
        border: 1px solid #1A73E8;
        background-color: #FFFFFF;
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 6px;
        transition: all 0.3s ease;
        display: inline-block;
        text-decoration: none;
    }

    .styled-btn:hover {
        background-color: #1A73E8;
        color: #FFFFFF;
    }
</style>



<div class="container-simple">
    <div class="card-simple">
        <div class="header-simple">
            <h2>M-Pesa Configuration</h2>
        </div>

        <div class="content-simple">
            <form id="mpesaConfigForm" method="post" action="{$_url}paymentgateway/mpesa">

                <div class="form-group">
                    <label class="form-label">M-Pesa Environment</label>
                    <select class="form-control" name="mpesa_env">
                        <option value="sandbox" {if $_c['mpesa_env'] == 'sandbox'}selected{/if}>Sandbox / Testing</option>
                        <option value="live" {if $_c['mpesa_env'] == 'live'}selected{/if}>Live / Production</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Consumer Key</label>
                    <input type="text" class="form-control" name="mpesa_consumer_key" value="{$_c['mpesa_consumer_key']}" placeholder="Enter Mpesa Consumer Key">
                </div>

                <div class="form-group">
                    <label class="form-label">Consumer Secret</label>
                    <input type="password" class="form-control" name="mpesa_consumer_secret" value="{$_c['mpesa_consumer_secret']}" placeholder="Enter Mpesa Consumer Secret">
                </div>

                <div class="form-group">
                    <label class="form-label">Shortcode Type</label>
                    <select class="form-control" id="mpesa_shortcode_type" name="mpesa_shortcode_type">
                        <option value="Paybill" {if $_c['mpesa_shortcode_type'] == "Paybill"}selected{/if}>Paybill</option>
                        <option value="BuyGoods" {if $_c['mpesa_shortcode_type'] == "BuyGoods"}selected{/if}>BuyGoods Till</option>
                    </select>
                </div>

                <div class="form-group" id="tillNumberContainer" {if $_c['mpesa_shortcode_type'] != "BuyGoods"}style="display:none;"{/if}>
                    <label class="form-label">BuyGoods Till Number</label>
                    <input type="text" class="form-control" name="mpesa_buygoods_till_number" value="{$_c['mpesa_buygoods_till_number']}" placeholder="Enter Till Number">
                </div>

                <div class="form-group">
                    <label class="form-label">Business Shortcode</label>
                    <input type="text" class="form-control" name="mpesa_business_code" value="{$_c['mpesa_business_code']}" maxlength="7" placeholder="Enter Business Shortcode">
                </div>

                <div class="form-group">
                    <label class="form-label">Pass Key</label>
                    <input type="text" class="form-control" name="mpesa_pass_key" value="{$_c['mpesa_pass_key']}" placeholder="Enter Pass Key">
                </div>

                <div class="form-group">
                    <label class="form-label">Support Offline Pay Methods</label>
                    <select class="form-control select2" id="mpesa_channel_ofline_online" name="mpesa_channel_ofline_online">
                        <option value="0" {if $_c['mpesa_channel_ofline_online'] == 0}selected{/if}>No</option>
                        <option value="1" {if $_c['mpesa_channel_ofline_online'] == 1}selected{/if}>Yes</option>
                    </select>
                </div>

                <div id="offlinePayFields" style="display:none;">
                    <div class="form-group">
                        <label class="form-label">C2B Version</label>
                        <select class="form-control select2" name="mpesa_api_version">
                            <option value="v1" {if $_c['mpesa_api_version'] == 'v1'}selected{/if}>v1</option>
                            <option value="v2" {if $_c['mpesa_api_version'] == 'v2'}selected{/if}>v2</option>
                        </select>
                        <small class="form-text">Select the version of the API you want to use.</small>
                    </div>

                    {if $_c['mpesa_channel_ofline_online'] == 1}
                    <div class="form-group">
                        <label class="form-label">Register URL</label>
                        <a href="{$_url}plugin/c2b&kind=register" class="styled-btn">Register Mpesa C2B URL</a>
                    </div>
                    {/if}
                </div>

                <div class="footer-simple">
                    <button class="btn-save" type="submit">Save Changes</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
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
                window.location.href = "{$app_url}/?_route=paymentgateway";
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
</script>

{include file="sections/footer.tpl"}
