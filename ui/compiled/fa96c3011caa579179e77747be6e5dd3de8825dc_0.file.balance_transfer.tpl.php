<?php
/* Smarty version 4.5.3, created on 2025-07-13 23:05:59
  from '/var/www/html/alpha/ui/ui/widget/customers/balance_transfer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687411a7452027_57452171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa96c3011caa579179e77747be6e5dd3de8825dc' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/widget/customers/balance_transfer.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687411a7452027_57452171 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && $_smarty_tpl->tpl_vars['_c']->value['allow_balance_transfer'] == 'yes') {?>
    <div class="box box-primary box-solid mb30">
        <div class="box-header">
            <h4 class="box-title"><?php echo Lang::T("Transfer Balance");?>
</h4>
        </div>
        <div class="box-body p-0">
            <form method="post" onsubmit="return askConfirm()" role="form" action="<?php echo Text::url('home');?>
">
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="text" id="username" name="username" class="form-control" required
                            placeholder="<?php echo Lang::T('Friend Usernames');?>
">
                    </div>
                    <div class="col-sm-5">
                        <input type="number" id="balance" name="balance" autocomplete="off" class="form-control"
                            required placeholder="<?php echo Lang::T('Balance Amount');?>
">
                    </div>
                    <div class="form-group col-sm-2" align="center">
                        <button class="btn btn-success btn-block" id="sendBtn" type="submit" name="send"
                            onclick="return ask(this, '<?php echo Lang::T(" Are You Sure?");?>
')" value="balance"><i
                                class="glyphicon glyphicon-send"></i></button>
                    </div>
                </div>
            </form>
            <?php echo '<script'; ?>
>
                function askConfirm() {
                    if (confirm('<?php echo Lang::T('Send yours balance ? ');?>
')) {
                    setTimeout(() => {
                        document.getElementById('sendBtn').setAttribute('disabled', '');
                    }, 1000);
                    return true;
                }
                return false;
                }
            <?php echo '</script'; ?>
>
        </div>
    </div>
<?php }
}
}
