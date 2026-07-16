<?php
/* Smarty version 4.5.3, created on 2025-10-12 16:21:46
  from '/var/www/html/dev/ui/ui/widget/top_widget.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68ebab6a5bf077_41045679',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daf3266c0519762f885de4d2cce188afd50b6d70' => 
    array (
      0 => '/var/www/html/dev/ui/ui/widget/top_widget.tpl',
      1 => 1760275299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68ebab6a5bf077_41045679 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>
/* Responsive adjustments for info boxes on mobile */
@media (max-width: 767px) {
    .info-box {
        display: flex;
        align-items: center;
        padding: 8px !important;
        min-height: 60px !important;
    }

    .info-box-icon {
        font-size: 24px !important;
        width: 40px !important;
        height: 40px !important;
        line-height: 40px !important;
        text-align: center !important;
        margin-right: 10px !important;
    }

    .info-box-content {
        margin-left: 0 !important;
        font-size: 14px !important;
    }

    .info-box-text {
        font-size: 13px !important;
    }

    .info-box-number {
        font-size: 16px !important;
    }

    .col-xs-6 {
        width: 100% !important;
    }
}
</style>




<div class="row">
    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Report'))) {?>
        <!-- Income Today -->
        <div class="col-lg-3 col-xs-6">
            <div class="info-box text-white rounded" style="background: #9C27B0;">
                <span class="info-box-icon">
                    <i class="ion ion-clock" style="color: #FFFFFF;"></i>
                </span>
                <div class="info-box-content" style="color: #FFFFFF;">
                    <span class="info-box-text" style="font-weight: bold;"><?php echo Lang::T('Income Today');?>
</span>
                    <span class="info-box-number" style="font-size: 18px; font-weight: bold;">
                        <sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
                        <?php echo number_format($_smarty_tpl->tpl_vars['iday']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>

                    </span>
                    <a href="<?php echo Text::url('reports/by-date');?>
" class="text-white small d-block mt-2" style="text-decoration: underline;color: #FFFFFF";>
                        View Today Report
                    </a>
                </div>
            </div>
        </div>

        <!-- Income This Week -->
        <div class="col-lg-3 col-xs-6">
            <div class="info-box text-white rounded" style="background: #2196F3;">
                <span class="info-box-icon">
                    <i class="ion ion-calendar" style="color: #FFFFFF;"></i>
                </span>
                <div class="info-box-content" style="color: #FFFFFF;">
                    <span class="info-box-text" style="font-weight: bold;"><?php echo Lang::T('Income This Week');?>
</span>
                    <span class="info-box-number" style="font-size: 18px; font-weight: bold;">
                        <sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
                        <?php echo number_format($_smarty_tpl->tpl_vars['iweek']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>

                    </span>
                    <a href="<?php echo Text::url('reports/by-week');?>
" class="text-white small d-block mt-2" style="text-decoration: underline; color: #FFFFFF";>
                        View Weekly Stats
                    </a>
                </div>
            </div>
        </div>

        <!-- Income This Month -->
        <div class="col-lg-3 col-xs-6">
            <div class="info-box text-white rounded" style="background: #4CAF50;">
                <span class="info-box-icon">
                    <i class="ion ion-android-calendar" style="color: #FFFFFF;"></i>
                </span>
                <div class="info-box-content" style="color: #FFFFFF;">
                    <span class="info-box-text" style="font-weight: bold;"><?php echo Lang::T('Income This Month');?>
</span>
                    <span class="info-box-number" style="font-size: 18px; font-weight: bold;">
                        <sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
                        <?php echo number_format($_smarty_tpl->tpl_vars['imonth']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>

                    </span>
                    <a href="<?php echo Text::url('reports/by-period');?>
" class="text-white small d-block mt-2" style="text-decoration: underline; color: #FFFFFF";">
                        View Monthly Stats
                    </a>
                </div>
            </div>
        </div>
    <?php }?>

    <!-- Active -->
    <div class="col-lg-3 col-xs-6">
        <div class="info-box rounded" style="background: #FBC02D;"> <!-- Darker yellow -->
            <span class="info-box-icon">
                <i class="ion ion-person" style="color: #FFFFFF;"></i>
            </span>
            <div class="info-box-content" style="color: #FFFFFF;">
                <span class="info-box-text" style="font-weight: bold;"><?php echo Lang::T('Active');?>
</span>
                <span class="info-box-number" style="font-size: 18px; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['u_act']->value;?>
</span>
                <a href="<?php echo Text::url('plan/list');?>
" class="small d-block mt-2" style="text-decoration: underline; color: #FFFFFF;">
                    Manage Plans
                </a>
            </div>
        </div>
    </div>

</div><?php }
}
