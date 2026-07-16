
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
    {if in_array($_admin['user_type'],['SuperAdmin','Admin', 'Report'])}
        <!-- Income Today -->
        <div class="col-lg-3 col-xs-6">
            <div class="info-box text-white rounded" style="background: #9C27B0;">
                <span class="info-box-icon">
                    <i class="ion ion-clock" style="color: #FFFFFF;"></i>
                </span>
                <div class="info-box-content" style="color: #FFFFFF;">
                    <span class="info-box-text" style="font-weight: bold;">{Lang::T('Income Today')}</span>
                    <span class="info-box-number" style="font-size: 18px; font-weight: bold;">
                        <sup>{$_c['currency_code']}</sup>
                        {number_format($iday,0,$_c['dec_point'],$_c['thousands_sep'])}
                    </span>
                    <a href="{Text::url('reports/by-date')}" class="text-white small d-block mt-2" style="text-decoration: underline;color: #FFFFFF";>
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
                    <span class="info-box-text" style="font-weight: bold;">{Lang::T('Income This Week')}</span>
                    <span class="info-box-number" style="font-size: 18px; font-weight: bold;">
                        <sup>{$_c['currency_code']}</sup>
                        {number_format($iweek,0,$_c['dec_point'],$_c['thousands_sep'])}
                    </span>
                    <a href="{Text::url('reports/by-week')}" class="text-white small d-block mt-2" style="text-decoration: underline; color: #FFFFFF";>
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
                    <span class="info-box-text" style="font-weight: bold;">{Lang::T('Income This Month')}</span>
                    <span class="info-box-number" style="font-size: 18px; font-weight: bold;">
                        <sup>{$_c['currency_code']}</sup>
                        {number_format($imonth,0,$_c['dec_point'],$_c['thousands_sep'])}
                    </span>
                    <a href="{Text::url('reports/by-period')}" class="text-white small d-block mt-2" style="text-decoration: underline; color: #FFFFFF";">
                        View Monthly Stats
                    </a>
                </div>
            </div>
        </div>
    {/if}

    <!-- Active -->
    <div class="col-lg-3 col-xs-6">
        <div class="info-box rounded" style="background: #FBC02D;"> <!-- Darker yellow -->
            <span class="info-box-icon">
                <i class="ion ion-person" style="color: #FFFFFF;"></i>
            </span>
            <div class="info-box-content" style="color: #FFFFFF;">
                <span class="info-box-text" style="font-weight: bold;">{Lang::T('Active')}</span>
                <span class="info-box-number" style="font-size: 18px; font-weight: bold;">{$u_act}</span>
                <a href="{Text::url('plan/list')}" class="small d-block mt-2" style="text-decoration: underline; color: #FFFFFF;">
                    Manage Plans
                </a>
            </div>
        </div>
    </div>

</div>