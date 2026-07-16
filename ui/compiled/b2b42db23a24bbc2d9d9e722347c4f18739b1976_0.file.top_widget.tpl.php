<?php
/* Smarty version 4.5.3, created on 2025-07-22 11:57:45
  from '/var/www/html/alpha/ui/ui/widget/top_widget.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687f5289f30627_97689784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2b42db23a24bbc2d9d9e722347c4f18739b1976' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/widget/top_widget.tpl',
      1 => 1753174656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687f5289f30627_97689784 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Report'))) {?>
        <div class="col-lg-4 col-xs-6">
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
        <div class="col-lg-4 col-xs-6">
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
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h4 class="text-bold" style="font-size: large;"><?php echo $_smarty_tpl->tpl_vars['u_act']->value;?>
</h4>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo Text::url('plan');?>
" class="small-box-footer"><?php echo Lang::T('Active');?>
</a>
        </div>
    </div>
</div><?php }
}
