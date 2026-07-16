<?php
/* Smarty version 4.5.3, created on 2025-07-13 23:07:33
  from '/var/www/html/alpha/ui/ui/customer/activation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68741205c37955_72497808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a48f844af7e89135de67a8d17b6921e8f5a2f615' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/customer/activation.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header.tpl' => 1,
    'file:customer/footer.tpl' => 1,
  ),
),false)) {
function content_68741205c37955_72497808 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- user-activation -->

<div class="row">
    <div class="col-md-8">
        <div class="box box-primary box-solid">
            <div class="box-header">
                <h3 class="box-title"><?php echo Lang::T('Order Voucher');?>
</h3>
            </div>
            <div class="box-body">
                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['PAGES_PATH']->value)."/Order_Voucher.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-primary box-solid">
            <div class="box-header"><?php echo Lang::T('Voucher Activation');?>
</div>
            <div class="box-body">
                <form method="post" role="form" action="<?php echo Text::url('voucher/activation-post');?>
">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="code" name="code" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['code']->value, ENT_QUOTES, 'UTF-8', true);?>
"
                                placeholder="<?php echo Lang::T('Enter voucher code here');?>
">
                            <span class="input-group-btn">
                                <a class="btn btn-default"
                                    href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['app_url']->value, ENT_QUOTES, 'UTF-8', true);?>
/scan/?back=<?php echo urlencode(Text::url('voucher/activation&code='));?>
"><i
                                        class="glyphicon glyphicon-qrcode"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-success" type="submit"><?php echo Lang::T('Recharge');?>
</button>
                            Or <a href="<?php echo Text::url('home');?>
"><?php echo Lang::T('Cancel');?>
</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
