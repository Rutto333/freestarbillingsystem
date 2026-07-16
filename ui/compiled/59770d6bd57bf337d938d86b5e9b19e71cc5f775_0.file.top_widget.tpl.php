<?php
/* Smarty version 4.5.3, created on 2025-08-27 08:47:46
  from '/var/www/html/example/ui/ui/widget/top_widget.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68ae9c02f420e1_13160338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59770d6bd57bf337d938d86b5e9b19e71cc5f775' => 
    array (
      0 => '/var/www/html/example/ui/ui/widget/top_widget.tpl',
      1 => 1742449432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68ae9c02f420e1_13160338 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Report'))) {?>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h4 class="text-bold" style="font-size: large;"><sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
                        <?php echo number_format($_smarty_tpl->tpl_vars['iday']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-clock"></i>
                </div>
                <a href="<?php echo Text::url('reports/by-date');?>
" class="small-box-footer"><?php echo Lang::T('Income Today');?>
</a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h4 class="text-bold" style="font-size: large;"><sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
                        <?php echo number_format($_smarty_tpl->tpl_vars['imonth']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-android-calendar"></i>
                </div>
                <a href="<?php echo Text::url('reports/by-period');?>
" class="small-box-footer"><?php echo Lang::T('Income This Month');?>
</a>
            </div>
        </div>
    <?php }?>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h4 class="text-bold" style="font-size: large;"><?php echo $_smarty_tpl->tpl_vars['u_act']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['u_all']->value-$_smarty_tpl->tpl_vars['u_act']->value;?>
</h4>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo Text::url('plan/list');?>
" class="small-box-footer"><?php echo Lang::T('Active');?>
/<?php echo Lang::T('Expired');?>
</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h4 class="text-bold" style="font-size: large;"><?php echo $_smarty_tpl->tpl_vars['c_all']->value;?>
</h4>
            </div>
            <div class="icon">
                <i class="ion ion-android-people"></i>
            </div>
            <a href="<?php echo Text::url('customers/list');?>
" class="small-box-footer"><?php echo Lang::T('Customers');?>
</a>
        </div>
    </div>
</div><?php }
}
