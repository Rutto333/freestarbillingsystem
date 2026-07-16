<?php
/* Smarty version 4.5.3, created on 2026-01-02 14:27:45
  from '/var/www/html/dev/ui/ui/admin/paymentgateway/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6957abb10c9040_47950677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78dbc8c18387d88e38017f74c85ab6b606f60c02' => 
    array (
      0 => '/var/www/html/dev/ui/ui/admin/paymentgateway/list.tpl',
      1 => 1758714188,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6957abb10c9040_47950677 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
                <h2><?php echo Lang::T('Payment Gateway');?>
</h2>
            </div>

            <div class="content-simple">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pgs']->value, 'pg');
$_smarty_tpl->tpl_vars['pg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pg']->value) {
$_smarty_tpl->tpl_vars['pg']->do_else = false;
?>
                    <div class="gateway-row">
                        <input type="checkbox"
                               name="pgs[]"
                               class="gateway-checkbox"
                               <?php if (in_array($_smarty_tpl->tpl_vars['pg']->value,$_smarty_tpl->tpl_vars['actives']->value)) {?>checked<?php }?>
                               value="<?php echo $_smarty_tpl->tpl_vars['pg']->value;?>
">

                        <a href="<?php echo Text::url('paymentgateway/');
echo $_smarty_tpl->tpl_vars['pg']->value;?>
"
                           class="gateway-link <?php if (in_array($_smarty_tpl->tpl_vars['pg']->value,$_smarty_tpl->tpl_vars['actives']->value)) {?>active<?php } else { ?>inactive<?php }?>">
                            <?php echo ucwords($_smarty_tpl->tpl_vars['pg']->value);?>

                        </a>

                        <div class="gateway-actions">
                            <a href="<?php echo Text::url('paymentgateway/audit/');
echo $_smarty_tpl->tpl_vars['pg']->value;?>
"
                               class="btn-simple btn-audit">
                                Audit
                            </a>
                            <a href="<?php echo Text::url('paymentgateway/delete/');
echo $_smarty_tpl->tpl_vars['pg']->value;?>
"
                               onclick="return ask(this, '<?php echo Lang::T('Delete');?>
 <?php echo $_smarty_tpl->tpl_vars['pg']->value;?>
?')"
                               class="btn-simple btn-delete">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>

            <div class="footer-simple">
                <button type="submit" class="btn-save" name="save" value="actives">
                    <?php echo Lang::T('Save Changes');?>

                </button>
            </div>
        </div>
    </div>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
