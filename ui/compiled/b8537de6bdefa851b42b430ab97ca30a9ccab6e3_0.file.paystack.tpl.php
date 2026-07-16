<?php
/* Smarty version 4.5.3, created on 2025-09-04 12:25:02
  from '/var/www/html/myapp/system/paymentgateway/ui/paystack.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b95aeed3d159_78678414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8537de6bdefa851b42b430ab97ca30a9ccab6e3' => 
    array (
      0 => '/var/www/html/myapp/system/paymentgateway/ui/paystack.tpl',
      1 => 1741770366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68b95aeed3d159_78678414 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
paymentgateway/paystack">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-primary panel-hovered panel-stacked mb30">
                <div class="panel-heading">Paystack Payment Gateway</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Paystack Secret Key</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="paystack_secret_key" name="paystack_secret_key"
                                value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['paystack_secret_key'];?>
">
                            <a href="https://dashboard.paystack.co/#/settings/developer" target="_blank"
                                class="help-block">https://dashboard.paystack.co/#/settings/developer</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Webhook Url</label>
                        <div class="col-md-6">
                            <input type="text" readonly class="form-control" onclick="this.select()"
                                value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
callback/paystack">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                        </div>
                    </div>
                    <div class="bs-callout bs-callout-info" id="callout-navbar-role">
                        <h4>Paystack Settings in Mikrotik</h4>
                        /ip hotspot walled-garden <br>
                        add dst-host=paystack.com <br>
                        add dst-host=*.paystack.com <br><br>
                        <small class="form-text text-muted">Set Telegram Bot to get any error and
                            notification</small>

                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
