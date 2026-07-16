{include file="sections/header.tpl"}

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            <form id="bankStkForm" method="post" action="{$_url}paymentgateway/BankStkPush">
                <div class="form-group">
                    <label class="form-label">Bank Account Number</label>
                    <input
                        type="text"
                        class="form-control"
                        name="account"
                        placeholder="Enter Bank account number"
                        value="{$_c['Stkbankacc']}"
                        required
                    >
                </div>
                <div class="form-group">
                    <label class="form-label">Bank Name</label>
                    <select class="form-control" name="bankname" id="bankstk">
                        <option value="">Select Bank</option>
                        {foreach from=$banks item=bank}
                            <option value="{$bank.name}" {if $_c['Stkbankname'] == $bank.name}selected{/if}>
                                {$bank.name} Bank
                            </option>
                        {/foreach}
                    </select>
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
</script>

{include file="sections/footer.tpl"}
