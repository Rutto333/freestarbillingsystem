{include file="sections/header.tpl"}

<style>
    body {
        background-color: #FFFFFF; 
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
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
        padding: 24px 30px;
        border-bottom: 1px solid #e5e7eb;
    }

    .header-simple h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .content-simple {
        padding: 0;
    }

    .gateway-row {
        display: flex;
        align-items: center;
        padding: 20px 30px;
        border-bottom: 1px solid #f1f5f9;
        transition: background-color 0.2s;
    }

    .gateway-row:last-child {
        border-bottom: none;
    }

    .gateway-row:hover {
        background-color: #f7f7f7; 
    }

    .gateway-checkbox {
        margin-right: 16px;
        width: 18px;
        height: 18px;
        accent-color: #1A73E8; 
    }

    .gateway-link {
        flex: 1;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.2s;
        display: block;
    }

    .gateway-link.active {
        background-color: #1A73E8; 
        color: #FFFFFF;
    }

    .gateway-link.inactive {
        background-color: #f1f5f9;
        color: #64748b;
    }

    .gateway-link:hover {
        text-decoration: none;
        background-color: #1557B0; 
        color: #FFFFFF;
    }

    .gateway-actions {
        display: flex;
        gap: 8px;
        margin-left: 16px;
    }

    .btn-simple {
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .btn-audit {
        background-color: #1A73E8; 
        color: #FFFFFF;
    }

    .btn-audit:hover {
        background-color: #1557B0; 
        color: #FFFFFF;
        text-decoration: none;
    }

    .btn-delete {
        background-color: #DC2626; 
        color: #FFFFFF;
        padding: 8px 12px;
    }

    .btn-delete:hover {
        background-color: #B91C1C; 
        color: #FFFFFF;
        text-decoration: none;
    }

    .footer-simple {
        padding: 24px 30px;
        border-top: 1px solid #e5e7eb;
    }

    .btn-save {
        background-color: #1A73E8; 
        color: #FFFFFF;
        border: none;
        padding: 12px 24px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        width: 100%;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .btn-save:hover {
        background-color: #1557B0; 
    }

    @media (max-width: 768px) {
        .container-simple {
            margin: 20px auto;
            padding: 0 16px;
        }

        .gateway-row {
            flex-wrap: wrap;
            gap: 12px;
        }

        .gateway-actions {
            margin-left: 0;
            width: 100%;
            justify-content: flex-end;
        }
    }
</style>


<form method="post">
    <div class="container-simple">
        <div class="card-simple">
            <div class="header-simple">
                <h2>{Lang::T('Payment Gateway')}</h2>
            </div>

            <div class="content-simple">
                {foreach $pgs as $pg}
                    <div class="gateway-row">
                        <input type="checkbox"
                               name="pgs[]"
                               class="gateway-checkbox"
                               {if in_array($pg, $actives)}checked{/if}
                               value="{$pg}">

                        <a href="{Text::url('paymentgateway/')}{$pg}"
                           class="gateway-link {if in_array($pg, $actives)}active{else}inactive{/if}">
                            {ucwords($pg)}
                        </a>

                        <div class="gateway-actions">
                            <a href="{Text::url('paymentgateway/audit/')}{$pg}"
                               class="btn-simple btn-audit">
                                Audit
                            </a>
                            <a href="{Text::url('paymentgateway/delete/')}{$pg}"
                               onclick="return ask(this, '{Lang::T('Delete')} {$pg}?')"
                               class="btn-simple btn-delete">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </div>
                    </div>
                {/foreach}
            </div>

            <div class="footer-simple">
                <button type="submit" class="btn-save" name="save" value="actives">
                    {Lang::T('Save Changes')}
                </button>
            </div>
        </div>
    </div>
</form>

{include file="sections/footer.tpl"}
