<?php
/* Smarty version 4.5.3, created on 2025-07-13 23:05:59
  from '/var/www/html/alpha/ui/ui/widget/customers/voucher_activation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687411a73f2154_60411406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25543f487945e2b881e02b9e575e8d431f5758cf' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/widget/customers/voucher_activation.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687411a73f2154_60411406 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_c']->value['disable_voucher'] != 'yes') {?>
    <div class="box box-primary box-solid mb30">
        <div class="box-header">
            <h3 class="box-title"><?php echo Lang::T('Voucher Activation');?>
</h3>
        </div>
        <div class="box-body">
            <form method="post" role="form" class="form-horizontal" action="<?php echo Text::url('voucher/activation-post');?>
">
                <div class="input-group">
                    <span class="input-group-btn">
                        <a class="btn btn-default"
                            href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/scan/?back=<?php echo urlencode(Text::url('home&code='));?>
"><i
                                class="glyphicon glyphicon-qrcode"></i></a>
                    </span>
                    <input type="text" id="code" name="code" class="form-control"
                        placeholder="<?php echo Lang::T('Enter voucher code here');?>
" value="<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><?php echo Lang::T('Recharge');?>
</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="box-body">
            <div class="btn-group btn-group-justified" role="group">
                <a class="btn btn-default" href="<?php echo Text::url('voucher/activation');?>
">
                    <i class="ion ion-ios-cart"></i>
                    <?php echo Lang::T('Order Voucher');?>

                </a>
                <?php if ($_smarty_tpl->tpl_vars['_c']->value['payment_gateway'] != 'none' || $_smarty_tpl->tpl_vars['_c']->value['payment_gateway'] == '') {?>
                    <a href="<?php echo Text::url('order/package');?>
" class="btn btn-default">
                        <i class="ion ion-ios-cart"></i>
                        <?php echo Lang::T('Order Package');?>

                    </a>
                <?php }?>
            </div>
        </div>
    </div>
<?php }
}
}
