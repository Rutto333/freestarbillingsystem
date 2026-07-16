<?php
/* Smarty version 4.5.3, created on 2025-09-11 23:13:17
  from '/var/www/html/myapp/ui/ui/customer/orderPlan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c32d5d829d79_40253529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab9e6969b4eee42b0084834dae1138d4de37db17' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/customer/orderPlan.tpl',
      1 => 1757621586,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header.tpl' => 1,
    'file:customer/footer.tpl' => 1,
  ),
),false)) {
function content_68c32d5d829d79_40253529 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-solid" style="border-color: #8B4513; background-color: #FAFAFA; box-shadow: 0 2px 8px rgba(139, 69, 19, 0.1); border-radius: 6px; overflow: hidden;">
            <div class="box-header" style="background-color: #8B4513; color: white; border-bottom: 2px solid #654321; padding: 10px 15px;">
                <h3 class="box-title" style="color: white; font-weight: bold; margin: 0;"><?php echo Lang::T('Order Internet Package');?>
</h3>
            </div>
        </div>

                <?php if (Lang::arrayCount($_smarty_tpl->tpl_vars['plans_pppoe']->value) > 0) {?>
            <div class="box box-solid" style="border-color: #8B4513; background-color: #FAFAFA; box-shadow: 0 2px 8px rgba(139, 69, 19, 0.1); border-radius: 6px; overflow: hidden;">
                <div class="box-header" style="background-color: #8B4513; color: white; border-bottom: 2px solid #654321; padding: 10px 15px;">
                    <h3 class="box-title" style="color: white; font-weight: bold; margin: 0;">
                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'] == '') {?>PPPoE Plans<?php } else {
echo $_smarty_tpl->tpl_vars['_c']->value['pppoe_plan'];
}?>
                    </h3>
                </div>
                <div class="box-body row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans_pppoe']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                        <div class="col col-md-4">
                            <div class="box box-primary" style="background-color: white; border-color: #D2B48C; box-shadow: 0 2px 4px rgba(139, 69, 19, 0.1); border-radius: 6px; overflow: hidden;">
                                <div class="box-header" style="background-color: #F5F5DC; color: #8B4513; border-bottom: 1px solid #D2B48C; padding: 10px 15px;">
                                    <h3 class="box-title" style="color: #8B4513; font-weight: bold; margin: 0;"><?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
</h3>
                                </div>
                                <div class="table-responsive">
                                    <div style="margin: 5px;">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <td style="color: #654321;"><?php echo Lang::T('Type');?>
</td>
                                                    <td style="color: #8B4513;"><?php echo $_smarty_tpl->tpl_vars['plan']->value['type'];?>
</td>
                                                </tr>
                                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['show_bandwidth_plan'] == 'yes') {?>
                                                    <tr>
                                                        <td style="color: #654321;"><?php echo Lang::T('Bandwidth');?>
</td>
                                                        <td style="color: #8B4513;" api-get-text="<?php echo Text::url('autoload_user/bw_name/');
echo $_smarty_tpl->tpl_vars['plan']->value['id_bw'];?>
"></td>
                                                    </tr>
                                                <?php }?>
                                                <tr>
                                                    <td style="color: #654321;"><?php echo Lang::T('Price');?>
</td>
                                                    <td style="color: #8B4513;">
                                                        <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price']);?>

                                                        <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['price_old'])) {?>
                                                            <sup style="text-decoration: line-through; color: red">
                                                                <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['plan']->value['price_old']);?>

                                                            </sup>
                                                        <?php }?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="color: #654321;"><?php echo Lang::T('Validity');?>
</td>
                                                    <td style="color: #8B4513;"><?php echo $_smarty_tpl->tpl_vars['plan']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['plan']->value['validity_unit'];?>
</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <button onclick="BuyNow('<?php echo $_smarty_tpl->tpl_vars['plan']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['plan']->value['routers'];?>
', '<?php echo $_smarty_tpl->tpl_vars['plan']->value['price'];?>
', '<?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
')"
                                            style="background-color: #8B4513; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-weight: bold; border: none;"
                                            class="btn btn-sm btn-block">
                                        <?php echo Lang::T('Buy Now');?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        <?php } else { ?>
            <div class="box box-solid box-warning" style="background-color: #F5F5DC; border-color: #D2B48C; box-shadow: 0 2px 4px rgba(139, 69, 19, 0.1); border-radius: 6px; overflow: hidden;">
                <div class="box-body text-center">
                    <p style="color: #8B4513;"><?php echo Lang::T('No PPPoE plans available at the moment');?>
</p>
                </div>
            </div>
        <?php }?>
    </div>
</div>


<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@11"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>

// Configuration - Set your payment gateway URLs here
const GATEWAY_CONFIG = {
    "MpesatillStk": "<?php echo (defined('U') ? constant('U') : null);?>
plugin/initiatetillstk",
    "BankStkPush": "<?php echo (defined('U') ? constant('U') : null);?>
plugin/initiatebankstk",
    "MpesaPaybill": "<?php echo (defined('U') ? constant('U') : null);?>
plugin/initiatePaybillStk",
    "mpesa": "<?php echo (defined('U') ? constant('U') : null);?>
plugin/initiatempesa",
    "paybilltillsbankmpesa": "<?php echo (defined('U') ? constant('U') : null);?>
plugin/initiatepaybilltillsbankmpesa",
    "mtn": "<?php echo (defined('U') ? constant('U') : null);?>
plugin/initiatemtn",
    "kopokopo": "<?php echo (defined('U') ? constant('U') : null);?>
plugin/initiatekopokopo",
    "campay": "<?php echo (defined('U') ? constant('U') : null);?>
plugin/initiatecampay",
    "gatewayUrl": appUrl + "/index.php?_route=plugin/CreateHotspotuser&type=recharge_pppoe"
};

// Get gateway from config (you can set this dynamically)
const CURRENT_GATEWAY = "<?php echo $_smarty_tpl->tpl_vars['_c']->value['payment_gateway'];?>
" || "MpesatillStk";
const GATEWAY_URL = GATEWAY_CONFIG["gatewayUrl"];
const USERNAME = "<?php echo $_smarty_tpl->tpl_vars['_user']->value['username'];?>
";
const BASE_URL = "<?php echo (defined('APPP_URL') ? constant('APPP_URL') : null);?>
";

// FIXED: Create proper payment record endpoint URLs
const COMPLETE_PAYMENT_URL = GATEWAY_CONFIG["gatewayUrl"];


const formatPhoneNumber = (phone) => {
    phone = phone.replace(/^\+/, '').replace(/^0/, '254');
    return phone.match(/^(7|1)/) ? `254${phone}` : phone;
};

function BuyNow(planId,routerId, price, planName) {
    const button = event.target;
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processing...';
    button.disabled = true;

    // Validate gateway configuration
    if (!GATEWAY_URL) {
        Swal.fire({
            icon: 'error',
            title: 'Configuration Error',
            text: 'Payment gateway not configured. Please contact support.'
        });
        button.innerHTML = originalText;
        button.disabled = false;
        return;
    }

    // Ask phone number with SweetAlert2
    Swal.fire({
        title: 'Enter Phone Number',
        input: 'text',
        inputLabel: 'Format: 07XXXXXXXX or +2547XXXXXXXX',
        inputPlaceholder: '07XXXXXXXX',
        showCancelButton: true,
        confirmButtonText: 'Proceed to Payment',
        cancelButtonText: 'Cancel',
        preConfirm: (phone) => {
            if (!phone) {
                Swal.showValidationMessage('Phone number is required');
                return false;
            }
            phone = formatPhoneNumber(phone.trim());
            const phoneRegex = /^254[0-9]{9}$/;
            if (!phoneRegex.test(phone)) {
                Swal.showValidationMessage('Invalid Kenyan phone number format');
                return false;
            }
            return phone;
        }
    }).then((result) => {
        if (!result.isConfirmed) {
            button.innerHTML = originalText;
            button.disabled = false;
            return;
        }

        const phone = result.value;

        // Show processing dialog
        Swal.fire({
            title: 'Processing Payment...',
            html: `
                <div class="text-center">
                    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p class="mt-3">Setting up payment for <strong>${phone}</strong></p>
                    <p class="text-muted">Plan: ${planName} - KES ${price}</p>
                </div>
            `,
            showConfirmButton: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Process payment with both record creation and STK push
       processPayment(phone, planId,routerId, price, planName, button, originalText);
    });
}

function processPayment(phone, planId,routerId, price, planName, button, originalText) {
    // Log the request for debugging
    console.log('Processing Payment:', {
        username: USERNAME,
        plan_id: planId,
        router_id: routerId,
        phone: phone,
        gateway: CURRENT_GATEWAY
    });

    // Use the complete payment endpoint that handles both record creation and STK push
    const paymentData = {
        username: USERNAME,
        plan_id: planId,
        router_id: routerId,
        phone: phone
    };

    console.log('Sending to:', COMPLETE_PAYMENT_URL);
    console.log('Payload:', paymentData);

    // Send complete payment request
    fetch(COMPLETE_PAYMENT_URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify(paymentData)
    })
    .then(response => {
        console.log('Payment Response status:', response.status);

        return response.text().then(text => ({
            ok: response.ok,
            status: response.status,
            statusText: response.statusText,
            text: text
        }));
    })
    .then(result => {
        console.log('Payment Full response:', result);

        let data;
        try {
            data = JSON.parse(result.text);
            console.log('Payment Parsed JSON:', data);
        } catch (e) {
            console.log('Payment Response is not JSON:', result.text);
            data = {
                status: result.text.toLowerCase().includes('success') ? 'success' : 'error',
                message: result.text,
                raw_response: result.text
            };
        }

        // Handle the response
        handlePaymentResponse({ result, data }, phone, planName, price);
    })
    .catch(error => {
        console.error('Payment Error:', error);
        handlePaymentError(error, phone, planName, price, planId, button, originalText);
    })
    .finally(() => {
        // Reset button
        if (button) {
            button.innerHTML = originalText;
            button.disabled = false;
        }
    });
}
function handlePaymentResponse(response, phone, planName, price) {
    const { result, data } = response;

    const isSuccess = data.status?.toLowerCase() === 'success' ||
                     result.text.toLowerCase().includes('success') ||
                     result.text.toLowerCase().includes('initiated');

    if (isSuccess) {
        Swal.fire({
            icon: 'success',
            title: 'Payment Initiated',
            html: `
                <p>Check your phone (${phone})</p>
                <p>Enter your M-Pesa PIN to pay <strong>KES ${price}</strong></p>
            `,
            confirmButtonText: 'OK',
            timer: 15000
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Payment Failed',
            text: data.message || 'Unable to process payment. Please try again.',
            confirmButtonText: 'Retry'
        });
    }
}

function handlePaymentError(error, phone, planName, price, planId, button, originalText) {
    Swal.fire({
        icon: 'error',
        title: 'Payment Error',
        text: 'Something went wrong. Please try again.',
        confirmButtonText: 'Retry',
        showCancelButton: true,
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            BuyNow(planId, '', price, planName);
        }
    });
}

// Alternative payment method if the main one fails
function tryStepByStepPayment(phone, planId, price, planName) {
    Swal.close();

    Swal.fire({
        title: 'Trying Alternative Method...',
        html: `
            <div class="text-center">
                <div class="spinner-border text-warning" role="status" style="width: 3rem; height: 3rem;">
                    <span class="sr-only">Loading...</span>
                </div>
                <p class="mt-3">Using step-by-step payment processing</p>
            </div>
        `,
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    processPaymentStepByStep(phone, planId, price, planName, null, '');
}

// Utility function to check payment status (optional)
function checkPaymentStatus() {
    console.log('Payment status check functionality can be added here');
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    console.log('Payment system initialized (FIXED VERSION)');
    console.log('Gateway:', CURRENT_GATEWAY);
    console.log('Gateway URL:', GATEWAY_URL);
    console.log('Username:', USERNAME);
    console.log('Fixed URLs:');
    console.log('  - CREATE_PAYMENT_URL:', CREATE_PAYMENT_URL);
    console.log('  - COMPLETE_PAYMENT_URL:', COMPLETE_PAYMENT_URL);
    console.log('  - STK_PUSH_URL:', STK_PUSH_URL);
});

<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
