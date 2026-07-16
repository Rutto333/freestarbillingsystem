{include file="sections/header.tpl"}

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

    .form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.2s, box-shadow 0.2s;
        background-color: #FFFFFF;
    }

    .form-control:focus {
        outline: none;
        border-color: #1A73E8;
        box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
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
</style>


<div class="container-simple">
    <div class="card-simple">
        <div class="header-simple">
            <h2><i class="fa fa-cogs me-2"></i> General Settings</h2>
        </div>

        <div class="content-simple">
            <form method="post" role="form" action="{Text::url('')}settings/app-post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="{$csrf_token}">
                <!-- Hidden fields -->
                <input type="hidden" name="printer_cols" value="{if $_c['printer_cols']}{$_c['printer_cols']}{else}37{/if}">
                <input type="hidden" name="note" value="{$_c['note']}">
                <input type="hidden" name="theme" value="{if $_c['theme']}{$_c['theme']}{else}default{/if}">
                <input type="hidden" name="dashboard_cr" value="{$_c['dashboard_cr']}">

                <div class="form-group">
                    <label class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="CompanyName" name="CompanyName"
                           value="{$_c['CompanyName']}" placeholder="Enter Company Name">
                </div>

                <div class="form-group">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                           value="{$_c['phone']}" placeholder="Enter Phone Number">
                </div>

                <div class="form-group">
                    <label class="form-label">Income Reset Date</label>
                    <input type="number" required class="form-control" id="reset_day"
                           name="reset_day" placeholder="20" min="1" max="28" step="1"
                           value="{$_c['reset_day']}">
                    <small class="form-text">Income will reset every month on this day.</small>
                </div>

                <!-- WhatsApp Notification Section -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fa fa-whatsapp"></i> WhatsApp Secret Key
                    </label>
                    <input type="text" class="form-control" id="wa_secret_key" name="wa_secret_key"
                        value="{$_c['wa_secret_key']}" placeholder="Enter your WhatsApp secret key">
                    <input type="hidden" id="wa_url" name="wa_url" value="">
                </div>

                <!-- SMS Notification Section -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fa fa-comment"></i> SMS Secret Key
                    </label>
                    <input type="text" class="form-control" id="sms_secret_key" name="sms_secret_key"
                        value="{$_c['sms_secret_key']}" placeholder="Enter your SMS secret key">
                    <input type="hidden" id="sms_url" name="sms_url" value="">
                    <small class="form-text">
                        This system currently supports <a href="https://talksasa.com/" target="_blank">Talksasa SMS</a>.
                    </small>
                </div>

                <!-- User Notification Settings -->
                <hr style="margin: 30px 0;">
                <h3 style="margin-bottom: 20px;">
                    <i class="fa fa-bell"></i> {Lang::T('User Notification')}
                </h3>

                <div class="form-group">
                    <label class="form-label">{Lang::T('Expired Notification')}</label>
                    <select name="user_notification_expired" id="user_notification_expired" class="form-control">
                        <option value="none">{Lang::T('None')}</option>
                        <option value="wa" {if $_c['user_notification_expired']=='wa'}selected="selected"{/if}>
                            {Lang::T('By WhatsApp')}
                        </option>
                        <option value="sms" {if $_c['user_notification_expired']=='sms'}selected="selected"{/if}>
                            {Lang::T('By SMS')}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">{Lang::T('Payment Notification')}</label>
                    <select name="user_notification_payment" id="user_notification_payment" class="form-control">
                        <option value="none">{Lang::T('None')}</option>
                        <option value="wa" {if $_c['user_notification_payment']=='wa'}selected="selected"{/if}>
                            {Lang::T('By WhatsApp')}
                        </option>
                        <option value="sms" {if $_c['user_notification_payment']=='sms'}selected="selected"{/if}>
                            {Lang::T('By SMS')}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">{Lang::T('Reminder Notification')}</label>
                    <select name="user_notification_reminder" id="user_notification_reminder" class="form-control">
                        <option value="none">{Lang::T('None')}</option>
                        <option value="wa" {if $_c['user_notification_reminder']=='wa'}selected="selected"{/if}>
                            {Lang::T('By WhatsApp')}
                        </option>
                        <option value="sms" {if $_c['user_notification_reminder']=='sms'}selected="selected"{/if}>
                            {Lang::T('By SMS')}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">{Lang::T('Reminder Notification Intervals')}</label>
                    <div style="margin-top: 10px;">
                        <label style="display: block; margin-bottom: 10px;">
                            <input type="checkbox" name="notification_reminder_1day" value="yes"
                                {if !isset($_c['notification_reminder_1day']) || $_c['notification_reminder_1day'] neq 'no'}checked{/if}>
                            {Lang::T('1 Day before expiry')}
                        </label>
                        <label style="display: block; margin-bottom: 10px;">
                            <input type="checkbox" name="notification_reminder_3days" value="yes"
                                {if !isset($_c['notification_reminder_3days']) || $_c['notification_reminder_3days'] neq 'no'}checked{/if}>
                            {Lang::T('3 Days before expiry')}
                        </label>
                        <label style="display: block; margin-bottom: 10px;">
                            <input type="checkbox" name="notification_reminder_7days" value="yes"
                                {if !isset($_c['notification_reminder_7days']) || $_c['notification_reminder_7days'] neq 'no'}checked{/if}>
                            {Lang::T('7 Days before expiry')}
                        </label>
                    </div>
                </div>

                <div class="footer-simple">
                    <button type="submit" name="general" class="btn-save">
                        <i class="fa fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Combined form submission handler
(function() {
    var settingsForm = document.querySelector('form[action*="settings/app-post"]');

    if (settingsForm) {
        settingsForm.addEventListener('submit', function(e) {
            // WhatsApp URL concatenation
            var waSecretKey = document.getElementById('wa_secret_key');
            var waUrlField = document.getElementById('wa_url');

            if (waSecretKey && waUrlField && waSecretKey.value) {
                var waBaseUrl = "https://wa.nux.my.id/api/sendWA?to=[number]&msg=[text]&secret=";
                waUrlField.value = waBaseUrl + waSecretKey.value;
            }

            // SMS URL concatenation
            var smsSecretKey = document.getElementById('sms_secret_key');
            var smsUrlField = document.getElementById('sms_url');

            if (smsSecretKey && smsUrlField && smsSecretKey.value) {
                var smsBaseUrl = "https://umejipangasolutions.co.ke/talksasa.php?param_number=[number]&param_text=[text]&api_key=";
                smsUrlField.value = smsBaseUrl + smsSecretKey.value;
            }
        });
    }
})();
</script>

{include file="sections/footer.tpl"}
