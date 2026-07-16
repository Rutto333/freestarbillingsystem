<?php
/* Smarty version 4.5.3, created on 2025-07-22 12:09:50
  from '/var/www/html/alpha/ui/ui/admin/plan/deposit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687f555eb19269_09969331',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1ea643dfa246aa8f65d2c9a6179dbd298d96586' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/plan/deposit.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_687f555eb19269_09969331 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-primary panel-hovered panel-stacked mb30">
            <div class="panel-heading"><?php echo Lang::T('Refill Balance');?>
</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('');?>
plan/deposit-post">
                    <input type="hidden" name="stoken" value="<?php echo App::getToken();?>
">
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Select Account');?>
</label>
                        <div class="col-md-9">
                            <select id="personSelect" class="form-control select2" onchange="getBalance(this)"
                                name="id_customer" style="width: 100%"
                                data-placeholder="<?php echo Lang::T('Select a customer');?>
...">
                            </select>
                            <span class="help-block" id="customerBalance">-</span>
                        </div>
                    </div>
                    <span class="help-block"><?php echo Lang::T('Select Balance Package or Custom Amount');?>
</span>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><a
                                href="<?php echo Text::url('');?>
services/balance"><?php echo Lang::T('Balance Package');?>
</a></label>
                        <div class="col-md-9">
                            <select id="planSelect" class="form-control select2" name="id_plan" style="width: 100%"
                                data-placeholder="<?php echo Lang::T('Select Plans');?>
...">
                                <option></option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['p']->value, 'pl');
$_smarty_tpl->tpl_vars['pl']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pl']->value) {
$_smarty_tpl->tpl_vars['pl']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['pl']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['pl']->value['enabled'] != 1) {?>DISABLED PLAN &bull;
                                        <?php }
echo $_smarty_tpl->tpl_vars['pl']->value['name_plan'];?>
 - <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['pl']->value['price']);?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            <span class="help-block"><?php echo Lang::T('Or custom balance amount below');?>
</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Balance Amount');?>
</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="amount" style="width: 100%" placeholder="0">
                            <span class="help-block"><?php echo Lang::T('Input custom balance, will ignore plan above');?>
</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Note');?>
</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="note" style="width: 100%"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button class="btn btn-success"
                                onclick="return ask(this, '<?php echo Lang::T('Continue the Customer Balance top-up process');?>
?')"
                                type="submit"><?php echo Lang::T('Recharge');?>
</button>
                            Or <a href="<?php echo Text::url('');?>
customers/list"><?php echo Lang::T('Cancel');?>
</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
    function getBalance(f) {
        $.get('<?php echo Text::url('');?>
autoload/balance/'+f.value+'/1', function(data) {
        document.getElementById('customerBalance').innerHTML = data;
    });
    }
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
