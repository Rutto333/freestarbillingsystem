{include file="customer/header.tpl"}

<div class="row">
    <div class="col-sm-12">
        <div class="box box-solid box-default">
            <div class="box-header">{Lang::T('Order Internet Package')}</div>
        </div>

        {* PPPoE Plans Section *}
        {if Lang::arrayCount($plans_pppoe) > 0}
            <div class="box box-solid box-primary">
                <div class="box-header text-bold">
                    {if $_c['pppoe_plan'] == ''}PPPoE Plans{else}{$_c['pppoe_plan']}{/if}
                </div>
                <div class="box-body row">
                    {foreach $plans_pppoe as $plan}
                        <div class="col col-md-4">
                            <div class="box box-primary">
                                <div class="box-header text-center text-bold">{$plan['name_plan']}</div>
                                <div class="table-responsive">
                                    <div style="margin: 5px;">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>{Lang::T('Type')}</td>
                                                    <td>{$plan['type']}</td>
                                                </tr>
                                                {if $_c['show_bandwidth_plan'] == 'yes'}
                                                    <tr>
                                                        <td>{Lang::T('Bandwidth')}</td>
                                                        <td api-get-text="{Text::url('autoload_user/bw_name/')}{$plan['id_bw']}"></td>
                                                    </tr>
                                                {/if}
                                                <tr>
                                                    <td>{Lang::T('Price')}</td>
                                                    <td>
                                                        {Lang::moneyFormat($plan['price'])}
                                                        {if !empty($plan['price_old'])}
                                                            <sup style="text-decoration: line-through; color: red">
                                                                {Lang::moneyFormat($plan['price_old'])}
                                                            </sup>
                                                        {/if}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{Lang::T('Validity')}</td>
                                                    <td>{$plan['validity']} {$plan['validity_unit']}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <button onclick="BuyNow('{$plan['id']}','{$plan['routers']}', '{$plan['price']}', '{$plan['name_plan']}')"
                                            class="btn btn-sm btn-block btn-success">
                                        {Lang::T('Buy Now')}
                                    </button>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        {else}
            <div class="box box-solid box-warning">
                <div class="box-body text-center">
                    <p>{Lang::T('No PPPoE plans available at the moment')}</p>
                </div>
            </div>
        {/if}
    </div>
</div>

{literal}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

// Configuration - Set your payment gateway URLs here
const GATEWAY_CONFIG = {
    "MpesatillStk": "{/literal}{$smarty.const.U}plugin/initiatetillstk{literal}",
    "BankStkPush": "{/literal}{$smarty.const.U}plugin/initiatebankstk{literal}",
    "MpesaPaybill": "{/literal}{$smarty.const.U}plugin/initiatePaybillStk{literal}",
    "mpesa": "{/literal}{$smarty.const.U}plugin/initiatempesa{literal}",
    "paybilltillsbankmpesa": "{/literal}{$smarty.const.U}plugin/initiatepaybilltillsbankmpesa{literal}",
    "mtn": "{/literal}{$smarty.const.U}plugin/initiatemtn{literal}",
    "kopokopo": "{/literal}{$smarty.const.U}plugin/initiatekopokopo{literal}",
    "campay": "{/literal}{$smarty.const.U}plugin/initiatecampay{literal}",
    "gatewayUrl": appUrl + "/index.php?_route=plugin/CreateHotspotuser&type=recharge_pppoe"
};

// Get gateway from config (you can set this dynamically)
const CURRENT_GATEWAY = "{/literal}{$_c['payment_gateway']}{literal}" || "MpesatillStk";
const GATEWAY_URL = GATEWAY_CONFIG["gatewayUrl"];
const USERNAME = "{/literal}{$_user['username']}{literal}";
const BASE_URL = "{/literal}{$smarty.const.APPP_URL}{literal}";

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

</script>
{/literal}

{include file="customer/footer.tpl"}
