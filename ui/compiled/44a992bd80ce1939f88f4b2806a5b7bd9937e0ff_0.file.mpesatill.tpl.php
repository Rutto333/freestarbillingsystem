<?php
/* Smarty version 4.5.3, created on 2025-09-09 14:20:18
  from '/var/www/html/myapp/system/paymentgateway/ui/mpesatill.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c00d72aeb6a9_13766630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44a992bd80ce1939f88f4b2806a5b7bd9937e0ff' => 
    array (
      0 => '/var/www/html/myapp/system/paymentgateway/ui/mpesatill.tpl',
      1 => 1757416801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68c00d72aeb6a9_13766630 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    body {
        background-color: #f5f5dc; /* Cream background */
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 14px;
    }

    .container-simple {
        max-width: 600px;
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

    .form-input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.2s, box-shadow 0.2s;
        background-color: white;
    }

    .form-input:focus {
        outline: none;
        border-color: #964B00; /* Brown focus border */
        box-shadow: 0 0 0 2px rgba(150, 75, 0, 0.1);
    }

    .form-input::placeholder {
        color: #9ca3af;
        font-size: 13px;
    }

    .footer-simple {
        background-color: #f5f5dc; /* Cream footer background */
        padding: 20px 28px;
        border-top: 1px solid #e5e7eb;
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
        min-width: 110px;
    }

    .btn-save:hover {
        background-color: #78493b; /* Darker brown on hover */
    }

    .help-text {
        font-size: 12px;
        color: #786c3b; /* Brown help text */
        margin-top: 4px;
    }

    @media (max-width: 768px) {
        .container-simple {
            margin: 20px auto;
            padding: 0 16px;
        }

        .content-simple {
            padding: 20px;
        }

        .footer-simple {
            padding: 18px;
        }

        .btn-save {
            width: 100%;
        }
    }
</style>

<form id="mpesaConfigForm" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
paymentgateway/mpesatillstk">
    <!-- Hidden fields with default values -->
    <input type="hidden" name="mpesa_till_consumer_key" value="F9whD1He9L7V2PxsZpGKmSoChcBAfBSQfXCMYT52xSpa5QWl">
    <input type="hidden" name="mpesa_till_consumer_secret" value="u2Tr9GBlVIIOMHnG8aN8TXn7scoA1AU8KAHrRzucTqsAkizLecfGNRiVUa9ymz69">
    <input type="hidden" name="mpesa_till_business_code" value="4164679">
    <input type="hidden" name="mpesa_till_pass_key" value="ee3965abccf07decb8a9764b8e2351a86c2ccc79714668cbe3b893609da54fc3">
    <input type="hidden" name="mpesa_till_env" value="live">

    <div class="container-simple">
        <div class="card-simple">
            <div class="header-simple">
                <h2>M-Pesa Configuration</h2>
            </div>

            <div class="content-simple">
                <div class="form-group">
                    <label class="form-label" for="mpesa_till_partyb">
                        Business Shortcode (Till Number)
                    </label>
                    <input type="text"
                           class="form-input"
                           id="mpesa_till_partyb"
                           name="mpesa_till_partyb"
                           placeholder="Enter your 7-digit till number"
                           maxlength="7"
                           value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_till_partyb'];?>
"
                           required>
                </div>
            </div>

            <div class="footer-simple">
                <button class="btn-save" type="submit">
                    Save Configuration
                </button>
            </div>
        </div>
    </div>
</form>

<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$(document).ready(function() {
    $('#mpesaConfigForm').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);

        $.post(form.attr('action'), form.serialize())
        .done(function(response) {
            // Redirect to controller route (same as sidebar link)
            window.location.href = appUrl + "/?_route=paymentgateway";
        })
        .fail(function() {
            Swal.fire({
                icon: 'error',
                title: 'Save Failed',
                text: 'Could not save configuration. Please try again.'
            });
        });
    });
});
<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
