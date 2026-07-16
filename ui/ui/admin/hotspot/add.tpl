{include file="sections/header.tpl"}

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary panel-hovered panel-stacked mb30">
            <div class="panel-heading">{Lang::T('Add Service Package')}</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" role="form" action="{Text::url('services/add-post')}">

                    <!-- Hidden default values -->
                    <input type="hidden" name="enabled" value="1">
                    <input type="hidden" name="prepaid" value="yes">
                    <input type="hidden" name="plan_type" value="Personal">
                    {if $_c['radius_enable']}
                        <input type="hidden" name="radius" value="1">
                    {/if}

                    <span id="deviceChoose" class="">
                        <div class="form-group">
                            <label class="col-md-2 control-label">
                                {Lang::T('Device')}
                            </label>
                            <div class="col-md-6">
                                <select id="device" name="device" required class="form-control">
                                    <option value=''>{Lang::T('Select a Device')}</option>
                                    {foreach $devices as $dev}
                                        <option value="{$dev}" {if $dev == $d['device']}selected{/if}>{$dev}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </span>

                    <div class="form-group">
                        <label class="col-md-2 control-label">{Lang::T('Package Name')}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" maxlength="40">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">{Lang::T('Package Type')}</label>
                        <div class="col-md-10">
                            <div class="radio-group">
                                <label class="radio-option">
                                    <input type="radio" id="Unlimited" name="typebp" value="Unlimited" checked>
                                    <span class="radio-custom"></span>
                                    {Lang::T('Unlimited')}
                                </label>
                                <label class="radio-option">
                                    <input type="radio" id="Limited" name="typebp" value="Limited">
                                    <span class="radio-custom"></span>
                                    {Lang::T('Limited')}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div style="display:none;" id="Type">
                        <div class="form-group">
                            <label class="col-md-2 control-label">{Lang::T('Limit Type')}</label>
                            <div class="col-md-10">
                                <div class="radio-group">
                                    <label class="radio-option">
                                        <input type="radio" id="Time_Limit" name="limit_type" value="Time_Limit" checked>
                                        <span class="radio-custom"></span>
                                        {Lang::T('Time Limit')}
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" id="Data_Limit" name="limit_type" value="Data_Limit">
                                        <span class="radio-custom"></span>
                                        {Lang::T('Data Limit')}
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" id="Both_Limit" name="limit_type" value="Both_Limit">
                                        <span class="radio-custom"></span>
                                        {Lang::T('Both Limit')}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="display:none;" id="TimeLimit">
                        <div class="form-group">
                            <label class="col-md-2 control-label">{Lang::T('Time Limit')}</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="time_limit" name="time_limit" value="0">
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="time_unit" name="time_unit">
                                    <option value="Hrs">{Lang::T('Hrs')}</option>
                                    <option value="Mins">{Lang::T('Mins')}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div style="display:none;" id="DataLimit">
                        <div class="form-group">
                            <label class="col-md-2 control-label">{Lang::T('Data Limit')}</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="data_limit" name="data_limit" value="0">
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="data_unit" name="data_unit">
                                    <option value="MB">MBs</option>
                                    <option value="GB">GBs</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            {Lang::T('Bandwidth Name')}
                        </label>
                        <div class="col-md-6">
                            <select id="id_bw" name="id_bw" class="form-control">
                                <option value="">{Lang::T('Select Bandwidth')}...</option>
                                {foreach $d as $ds}
                                    <option value="{$ds['id']}">{$ds['name_bw']}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">{Lang::T('Package Price')}</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">{$_c['currency_code']}</span>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">{Lang::T('Shared Users')}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="sharedusers" name="sharedusers" value="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">{Lang::T('Package Validity')}</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="validity" name="validity">
                        </div>
                        <div class="col-md-2">
                            <select id="validity_unit" name="validity_unit" required class="form-control">
                                <option value="">{Lang::T('Select Unit')}</option>
                                <option value="Minutes">{Lang::T('Minutes')}</option>
                                <option value="Hours">{Lang::T('Hours')}</option>
                                <option value="Days">{Lang::T('Days')}</option>
                                <option value="Weeks">{Lang::T('Weeks')}</option>
                                <option value="Months">{Lang::T('Months')}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group hidden" id="expired_date">
                        <label class="col-md-2 control-label">{Lang::T('Expired Date')}</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="expired_date" maxlength="2" value="20" min="1" max="28" step="1">
                        </div>
                    </div>

                    <span id="routerChoose" class="">
                        <div class="form-group">
                            <label class="col-md-2 control-label">{Lang::T('Router Name')}</label>
                            <div class="col-md-6">
                                <select id="routers" name="routers" required class="form-control select2">
                                    <option value=''>{Lang::T('Select Routers')}</option>
                                    {foreach $r as $rs}
                                        <option value="{$rs['name']}">{$rs['name']}</option>
                                    {/foreach}
                                </select>
                                <p class="help-block">{Lang::T('Cannot be change after saved')}</p>
                            </div>
                        </div>
                    </span>

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-success" onclick="return ask(this, '{Lang::T("Continue the process of changing Hotspot Package data?")}')" type="submit">
                                {Lang::T('Save Changes')}
                            </button>
                            {Lang::T("Or")} <a href="{Text::url('services/hotspot')}">{Lang::T('Cancel')}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var preOpt = `<option value="Mins">{Lang::T('Mins')}</option>
    <option value="Hrs">{Lang::T('Hrs')}</option>
    <option value="Days">{Lang::T('Days')}</option>
    <option value="Months">{Lang::T('Months')}</option>`;
    var postOpt = `<option value="Period">{Lang::T('Period')}</option>`;
    function prePaid() {
        $("#validity_unit").html(preOpt);
        $('#expired_date').addClass('hidden');
    }

    function postPaid() {
        $("#validity_unit").html(postOpt);
        $("#expired_date").removeClass('hidden');
    }
    document.addEventListener("DOMContentLoaded", function(event) {
        prePaid()
    })
</script>

{if $_c['radius_enable']}
    {literal}
        <script>
            function isRadius(cek) {
                if (cek.checked) {
                    $("#routerChoose").addClass('hidden');
                    document.getElementById("routers").required = false;
                } else {
                    document.getElementById("routers").required = true;
                    $("#routerChoose").removeClass('hidden');
                }
            }
        </script>
    {/literal}
{/if}

{include file="sections/footer.tpl"}
