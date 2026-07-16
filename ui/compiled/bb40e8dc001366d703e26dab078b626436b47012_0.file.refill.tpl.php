<?php
/* Smarty version 4.5.3, created on 2025-07-22 12:09:17
  from '/var/www/html/alpha/ui/ui/admin/plan/refill.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687f553d58def4_49512606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb40e8dc001366d703e26dab078b626436b47012' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/plan/refill.tpl',
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
function content_687f553d58def4_49512606 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary panel-hovered panel-stacked mb30">
            <div class="panel-heading"><?php echo Lang::T('Refill Account');?>
</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('');?>
plan/refill-post">
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Select Account');?>
</label>
                        <div class="col-md-6">
                            <select id="personSelect" class="form-control select2" name="id_customer"
                                style="width: 100%" data-placeholder="<?php echo Lang::T('Select a customer');?>
...">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Code Voucher');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="code" name="code"
                                placeholder="<?php echo Lang::T('Enter voucher code here');?>
">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-success" onclick="return ask(this, '<?php echo Lang::T('Continue the Refill process');?>
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


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
