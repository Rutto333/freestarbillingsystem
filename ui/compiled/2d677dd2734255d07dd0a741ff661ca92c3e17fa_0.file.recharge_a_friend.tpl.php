<?php
/* Smarty version 4.5.3, created on 2025-07-13 23:05:59
  from '/var/www/html/alpha/ui/ui/widget/customers/recharge_a_friend.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687411a74585c2_09930934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d677dd2734255d07dd0a741ff661ca92c3e17fa' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/widget/customers/recharge_a_friend.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687411a74585c2_09930934 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-primary box-solid mb30">
    <div class="box-header">
        <h4 class="box-title"><?php echo Lang::T("Recharge a friend");?>
</h4>
    </div>
    <div class="box-body p-0">
        <form method="post" role="form" action="<?php echo Text::url('home');?>
">
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="text" id="username" name="username" class="form-control" required
                        placeholder="<?php echo Lang::T('Friend username');?>
">
                </div>
                <div class="form-group col-sm-2" align="center">
                    <button class="btn btn-success btn-block" id="sendBtn" type="submit" name="send"
                        onclick="return ask(this, '<?php echo Lang::T(" Are You Sure?");?>
')" value="plan"><i
                            class="glyphicon glyphicon-send"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php }
}
