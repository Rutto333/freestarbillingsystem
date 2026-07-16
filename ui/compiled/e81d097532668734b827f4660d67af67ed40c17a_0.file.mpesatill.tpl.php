<?php
/* Smarty version 4.5.3, created on 2026-06-25 10:17:05
  from '/var/www/html/dev/system/paymentgateway/ui/mpesatill.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a3cd5f1b7ca09_25328135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e81d097532668734b827f4660d67af67ed40c17a' => 
    array (
      0 => '/var/www/html/dev/system/paymentgateway/ui/mpesatill.tpl',
      1 => 1758714042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a3cd5f1b7ca09_25328135 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    body {
        background-color: #FFFFFF; 
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 14px;
    }

    .container-simple {
        max-width: 600px;
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

    .form-input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.2s, box-shadow 0.2s;
        background-color: #FFFFFF;
    }

    .form-input:focus {
        outline: none;
        border-color: #1A73E8; 
        box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
    }

    .form-input::placeholder {
        color: #9ca3af;
        font-size: 13px;
    }

    .footer-simple {
        padding: 20px 28px;
        border-top: 1px solid #e5e7eb;
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
        min-width: 110px;
    }

    .btn-save:hover {
        background-color: #1557B0; 
    }

    .help-text {
        font-size: 12px;
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


<form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
paymentgateway/MpesatillStk" >
    <input type="hidden" name="mpesa_till_consumer_key" value="F9whD1He9L7V2PxsZpGKmSoChcBAfBSQfXCMYT52xSpa5QWl">
    <input type="hidden" name="mpesa_till_consumer_secret" value="u2Tr9GBlVIIOMHnG8aN8TXn7scoA1AU8KAHrRzucTqsAkizLecfGNRiVUa9ymz69">
    <input type="hidden" name="mpesa_till_business_code" value="4164679">
    <input type="hidden" name="mpesa_till_pass_key" value="ee3965abccf07decb8a9764b8e2351a86c2ccc79714668cbe3b893609da54fc3">
    <input type="hidden" name="mpesa_till_env" value="live">

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-primary panel-hovered panel-stacked mb30">
                <div class="panel-heading">M-Pesa</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Business Shortcode(Till number)</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="mpesa_business_code" name="mpesa_till_partyb" placeholder="xxxxxxx" maxlength="7" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_till_partyb'];?>
">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
