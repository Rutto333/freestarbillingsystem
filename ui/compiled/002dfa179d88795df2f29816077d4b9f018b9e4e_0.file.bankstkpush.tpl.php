<?php
/* Smarty version 4.5.3, created on 2025-09-24 13:36:12
  from '/var/www/html/demo/system/paymentgateway/ui/bankstkpush.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68d3c99c84d008_39022667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '002dfa179d88795df2f29816077d4b9f018b9e4e' => 
    array (
      0 => '/var/www/html/demo/system/paymentgateway/ui/bankstkpush.tpl',
      1 => 1758710158,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68d3c99c84d008_39022667 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@11"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    var appUrl = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
';
<?php echo '</script'; ?>
>

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
            <h2>Bank STK Push Configuration</h2>
        </div>
        <div class="content-simple">
            <form id="bankStkForm" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
paymentgateway/BankStkPush">
                <div class="form-group">
                    <label class="form-label">Bank Account Number</label>
                    <input
                        type="text"
                        class="form-control"
                        name="account"
                        placeholder="Enter Bank account number"
                        value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['Stkbankacc'];?>
"
                        required
                    >
                </div>
                <div class="form-group">
                    <label class="form-label">Bank Name</label>
                    <select class="form-control" name="bankname" id="bankstk">
                        <option value="">Select Bank</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['banks']->value, 'bank');
$_smarty_tpl->tpl_vars['bank']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['bank']->value) {
$_smarty_tpl->tpl_vars['bank']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['bank']->value['name'];?>
" <?php if ($_smarty_tpl->tpl_vars['_c']->value['Stkbankname'] == $_smarty_tpl->tpl_vars['bank']->value['name']) {?>selected<?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['bank']->value['name'];?>
 Bank
                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
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
        $('#bankStkForm').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var saveBtn = $('.btn-save');
            saveBtn.prop('disabled', true);

            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Configuration Saved!',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    setTimeout(function() {
                        window.location.href = appUrl + "/?_route=paymentgateway";
                    }, 2000);
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Could not save Bank STK settings. Please try again.',
                        timer: 4000
                    });
                },
                complete: function() {
                    saveBtn.prop('disabled', false);
                }
            });
        });
    });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
