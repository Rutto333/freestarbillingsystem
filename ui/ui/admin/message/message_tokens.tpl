{include file="sections/header.tpl"}
<style>
    body {
        background-color: #FFFFFF;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 14px;
    }
    .container-simple {
        max-width: 400px;
        margin: 50px auto;
        padding: 0 20px;
    }
    .card-simple {
        background: #FFFFFF;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 40px 20px;
        text-align: center;
        margin-bottom: 12px;
    }
    .balance-display h3 {
        margin: 0 0 12px 0;
        font-size: 14px;
        font-weight: 500;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .balance-amount {
        font-size: 48px;
        font-weight: 700;
        margin: 0;
        color: #111827;
    }
    .note {
        font-size: 12px;
        color: #6b7280;
        margin-bottom: 20px;
        text-align: center;
    }
    .btn-recharge {
        background-color: #1A73E8;
        color: #FFFFFF;
        border: none;
        padding: 14px 32px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .btn-recharge:hover {
        background-color: #1557B0;
    }
    .btn-recharge:disabled {
        background-color: #9ca3af;
        cursor: not-allowed;
    }
    /* Custom SweetAlert styling */
    .swal2-popup {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    .swal2-input {
        font-size: 14px;
        padding: 12px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
    }
    .swal2-html-container {
        font-size: 14px;
    }
</style>
<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-simple">
    <div class="card-simple">
        <div class="balance-display">
            <h3>Available Balance</h3>
            <p class="balance-amount">{$tokenBalance|default:0}</p>
        </div>
    </div>
    <p class="note">1 KES = 5 Tokens</p>
    <button type="button" class="btn-recharge" id="rechargeBtn">
        <i class="fa fa-plus-circle"></i> Recharge Tokens
    </button>
</div>

<script>
    // Expose Smarty variable to JS
    const appUrl = "{$appUrl}";
    console.log("App URL:", appUrl);
</script>

{literal}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const rechargeBtn = document.getElementById('rechargeBtn');

    rechargeBtn.addEventListener('click', async function() {
        // Step 1: Ask for phone number
        const { value: phoneNumber } = await Swal.fire({
            title: 'Enter Phone Number',
            input: 'text',
            inputLabel: 'Phone Number',
            inputPlaceholder: '254712345678',
            inputAttributes: {
                maxlength: 12,
                autocapitalize: 'off',
                autocorrect: 'off'
            },
            html: '<small style="color: #6b7280;">Format: 254XXXXXXXXX</small>',
            showCancelButton: true,
            confirmButtonText: 'Next',
            confirmButtonColor: '#1A73E8',
            cancelButtonColor: '#6b7280',
            inputValidator: (value) => {
                if (!value) {
                    return 'Please enter your phone number';
                }
                const cleanNumber = value.replace(/[^0-9]/g, '');
                if (!/^254[0-9]{9}$/.test(cleanNumber)) {
                    return 'Invalid phone number. Use format 254XXXXXXXXX';
                }
            }
        });

        if (!phoneNumber) return;

        const cleanPhoneNumber = phoneNumber.replace(/[^0-9]/g, '');

        // Step 2: Ask for amount
        const { value: amount } = await Swal.fire({
            title: 'Enter Amount',
            input: 'number',
            inputLabel: 'Amount (KES)',
            inputPlaceholder: 'Enter amount',
            inputAttributes: {
                min: 1,
                step: 1
            },
            html: '<div id="tokenInfo" style="margin-top: 10px; font-size: 13px; color: #6b7280;"></div>',
            showCancelButton: true,
            confirmButtonText: 'Recharge',
            confirmButtonColor: '#1A73E8',
            cancelButtonColor: '#6b7280',
            didOpen: () => {
                const input = Swal.getInput();
                const tokenInfo = document.getElementById('tokenInfo');

                input.addEventListener('input', function() {
                    const amt = parseFloat(this.value) || 0;
                    const tokens = amt * 5;
                    tokenInfo.textContent = `You will receive ${tokens} tokens`;
                });
            },
            inputValidator: (value) => {
                if (!value || parseFloat(value) < 1) {
                    return 'Amount must be at least 1 KES';
                }
            }
        });

        if (!amount) return;

        // Step 3: Confirm transaction
        const result = await Swal.fire({
            title: 'Confirm Recharge',
            html: `
                <div style="text-align: left; padding: 10px;">
                    <p><strong>Phone Number:</strong> ${cleanPhoneNumber}</p>
                    <p><strong>Amount:</strong> KES ${amount}</p>
                    <p><strong>Tokens:</strong> ${amount * 5}</p>
                </div>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Confirm & Pay',
            confirmButtonColor: '#1A73E8',
            cancelButtonColor: '#6b7280'
        });

        if (!result.isConfirmed) return;

        // Step 4: Process payment
        Swal.fire({
            title: 'Processing...',
            html: 'Initiating STK Push. Please wait...',
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        try {
            const response = await fetch(`${appUrl}/index.php?_route=plugin/initiateRechargeTokens&type=initiateRechargeTokens`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    phone: cleanPhoneNumber,
                    amount: parseFloat(amount)
                })
            });

            const data = await response.json();

            if (data.success) {
                Swal.fire({
                    title: 'STK Push Sent!',
                    html: `
                        <p>Please check your phone and enter your M-Pesa PIN to complete the payment.</p>
                        <p style="margin-top: 10px; font-size: 13px; color: #6b7280;">
                            You will receive ${amount * 5} tokens after successful payment.
                        </p>
                    `,
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#1A73E8',
                    timer: 10000
                });
            } else {
                Swal.fire({
                    title: 'Payment Failed',
                    text: data.message || 'Unable to initiate payment. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#1A73E8'
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Error',
                text: 'An error occurred while connecting to the server. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#1A73E8'
            });
            console.error('Error:', error);
        }
    });
});
</script>
{/literal}

{include file="sections/footer.tpl"}
