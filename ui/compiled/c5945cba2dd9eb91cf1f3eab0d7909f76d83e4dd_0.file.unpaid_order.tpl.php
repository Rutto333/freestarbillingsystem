<?php
/* Smarty version 4.5.3, created on 2025-07-13 23:05:59
  from '/var/www/html/alpha/ui/ui/widget/customers/unpaid_order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687411a73c3572_56979542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5945cba2dd9eb91cf1f3eab0d7909f76d83e4dd' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/widget/customers/unpaid_order.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687411a73c3572_56979542 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['unpaid']->value) {?>
    <div class="box box-danger box-solid">
        <div class="box-header">
            <h3 class="box-title"><?php echo Lang::T('Unpaid Order');?>
</h3>
        </div>
        <div style="margin-left: 5px; margin-right: 5px;">
            <table class="table table-condensed table-bordered table-striped table-hover"
                style="margin-bottom: 0px;">
                <tbody>
                    <tr>
                        <td><?php echo Lang::T('expired');?>
</td>
                        <td><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['unpaid']->value['expired_date']);?>
 </td>
                    </tr>
                    <tr>
                        <td><?php echo Lang::T('Package Name');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['unpaid']->value['plan_name'];?>
</td>
                    </tr>
                    <tr>
                        <td><?php echo Lang::T('Package Price');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['unpaid']->value['price'];?>
</td>
                    </tr>
                    <tr>
                        <td><?php echo Lang::T('Routers');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['unpaid']->value['routers'];?>
</td>
                    </tr>
                </tbody>
            </table> &nbsp;
        </div>
        <div class="box-footer p-2">
            <div class="btn-group btn-group-justified mb15">
                <div class="btn-group">
                    <a href="<?php echo Text::url('order/view/',$_smarty_tpl->tpl_vars['unpaid']->value['id'],'/cancel');?>
" class="btn btn-danger btn-sm"
                        onclick="return ask(this, '<?php echo Lang::T('Cancel it?');?>
')">
                        <span class="glyphicon glyphicon-trash"></span>
                        <?php echo Lang::T('Cancel');?>

                    </a>
                </div>
                <div class="btn-group">
                    <a class="btn btn-success btn-block btn-sm" href="<?php echo Text::url('order/view/',$_smarty_tpl->tpl_vars['unpaid']->value['id']);?>
">
                        <span class="icon"><i class="ion ion-card"></i></span>
                        <span><?php echo Lang::T('PAY NOW');?>
</span>
                    </a>
                </div>
            </div>

        </div>&nbsp;&nbsp;
    </div>
<?php }
}
}
