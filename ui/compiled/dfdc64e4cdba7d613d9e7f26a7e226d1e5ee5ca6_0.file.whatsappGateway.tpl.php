<?php
/* Smarty version 4.5.3, created on 2025-08-29 14:03:54
  from '/var/www/html/example/system/plugin/ui/whatsappGateway.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b1891a1b69c0_90499666',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfdc64e4cdba7d613d9e7f26a7e226d1e5ee5ca6' => 
    array (
      0 => '/var/www/html/example/system/plugin/ui/whatsappGateway.tpl',
      1 => 1756465302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68b1891a1b69c0_90499666 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ($_smarty_tpl->tpl_vars['menu']->value == 'login') {?>

    <form class="form" method="post" role="form">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Login Whatsapp
                        </h3>
                    </div>
                    <div class="box-body with-border text-center">
                        <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xs-4">
                                <a class="btn btn-default btn-sm btn-block" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/whatsappGateway">back</a>
                            </div>
                            <div class="col-xs-8">
                                <button class="btn btn-primary btn-sm btn-block" type="submit">Check Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } elseif ($_smarty_tpl->tpl_vars['menu']->value == 'config') {?>

    <form class="form" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/whatsappGateway_config">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Configuration
                        </h3>
                    </div>
                    <div class="box-body with-border">
                        <div class="form-group">
                            <label>Server URL</label>
                            <input type="text" class="form-control" name="whatsapp_gateway_url"
                                value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['whatsapp_gateway_url'];?>
" required placeholder="http://localhost:3000">
                            <a href="https://github.com/dimaskiddo/go-whatsapp-multidevice-rest" class="pull-right"
                                target="_blank">Go WhatsApp Multi-Device</a>
                        </div>
                        <div class="form-group">
                            <label>Auth Basic Password</label>
                            <input type="text" class="form-control" name="whatsapp_gateway_secret" required
                                placeholder="AUTH_BASIC_PASSWORD" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['whatsapp_gateway_secret'];?>
">
                            <span class="text-muted">AUTH_BASIC_PASSWORD From .env, change this will change secret for API</span>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><?php echo Lang::T('Country Code Phone');?>
</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">+</span>
                                <input type="text" class="form-control" id="whatsapp_country_code_phone" placeholder="62"
                                    name="whatsapp_country_code_phone" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['whatsapp_country_code_phone'];?>
">
                            </div>
                            <span class="text-muted">if you put 62, Phone started with 0xxxx will change to 62xxxx</span>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xs-4">
                                <a class="btn btn-default btn-sm btn-block" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/whatsappGateway">back</a>
                            </div>
                            <div class="col-xs-8">
                                <button class="btn btn-primary btn-sm btn-block" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } else { ?>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="glyphicon glyphicon-plus"></i>
                        Add Phone
                    </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/whatsappGateway_config" class="btn btn-box-tool" data-toggle="tooltip"
                            data-placement="top" title="Configuration"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="box-body with-border">
                    <form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/whatsappGateway_addPhone">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label><?php echo Lang::T('Phone Number');?>
</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-phone"></i></span>
                                    <input type="text" class="form-control" name="phonenumber" required
                                        placeholder="<?php echo $_smarty_tpl->tpl_vars['_c']->value['country_code_phone'];?>
 <?php echo Lang::T('Phone Number');?>
">
                                </div>
                                <span class="pull-right">Use Country Code as whatsapp need it</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success btn-block btn-sm" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Registered Phone</h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/whatsappGateway_config" class="btn btn-box-tool" data-toggle="tooltip"
                            data-placement="top" title="Configuration"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <table class="table table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['phones']->value, 'phone');
$_smarty_tpl->tpl_vars['phone']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['phone']->value) {
$_smarty_tpl->tpl_vars['phone']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
                                <td api-get-text='<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/whatsappGateway_status&p=<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
'><span
                                        class="label label-default">&nbsp;</span></td>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/whatsappGateway_login&p=<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
"
                                        class="btn btn-xs btn-primary">QRCode</a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/whatsappGateway_login&p=<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
&pair"
                                        class="btn btn-xs btn-primary">Paircode</a>
                                </td>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/whatsappGateway_delPhone&p=<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" class="btn btn-xs btn-danger"
                                        onclick="return confirm('Remove <?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
?')">Remove</a>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
            <div class="bs-callout bs-callout-warning well">
                <h4>API To send directly</h4>
                <input type="text" class="form-control" readonly onclick="this.select();"
                    value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/whatsappGateway_send&to=[number]&msg=[text]&secret=<?php echo md5($_smarty_tpl->tpl_vars['_c']->value['whatsapp_gateway_secret']);?>
">
                <span class="text-muted">Change Auth Basic Password will change secret. No need to change whatsapp URL in PHPNuxBill with this. the plugin will work directly.</span>
            </div>
        </div>
    </div>
<?php }?>

<div class="bs-callout bs-callout-warning well">
    <h4>Sending WhatsApp</h4>
    <p>If you put multiple number, it will send random to any existed phone number. even if it not logged in to
        WhatsApp.</p>
    <p><b>Empty Whatsapp Server URL in PHPNuxBill configuration</b>, this plugin will overide sending WhatsApp.</p>
    <p>This plugin only support <a href="https://github.com/dimaskiddo/go-whatsapp-multidevice-rest" target="_blank">Go
            WhatsApp Multi-Device</a>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
