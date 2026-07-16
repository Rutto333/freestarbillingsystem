{include file="sections/header.tpl"}

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                    <a class="btn btn-primary btn-xs" title="save" href="{Text::url('')}services/sync/pppoe"
                        onclick="return ask(this, '{Lang::T('This will sync/send PPPOE plan to Mikrotik')}?')"><span
                            class="glyphicon glyphicon-refresh" aria-hidden="true"></span> sync</a>
                </div>{Lang::T('PPPOE Package')}
            </div>
            <form id="site-search" method="post" action="{Text::url('')}services/pppoe">
                <div class="panel-body">
                    <div class="row" style="padding: 5px; align-items: center;">

                        <!-- Search Input -->
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control"
                                    placeholder="{Lang::T('Search by Name')}...">
                            </div>
                        </div>


                        <!-- Add New Service -->
                        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 mb-2">
                            <a href="{Text::url('')}services/pppoe-add" 
                            class="btn btn-primary btn-block"
                            title="{Lang::T('New Service Plan')}">
                            <i class="ion ion-android-add"></i> {Lang::T('Add')}
                            </a>
                        </div>

                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <div style="margin-left: 5px; margin-right: 5px;">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th colspan="4" class="text-center">{Lang::T('Internet Plan')}</th>
                                <th></th>
                                <th colspan="2" class="text-center" ">
                                    {Lang::T('Expired')}</th>
                                <th colspan="4"></th>
                            </tr>
                            <tr>
                                <th>{Lang::T('Name')}</th>
                                <th>{Lang::T('Type')}</th>
                                <th><{Lang::T('Bandwidth')}/th>
                                <th>{Lang::T('Price')}</th>
                                <th>{Lang::T('Validity')}</th>
                                <th>{Lang::T('IP Pool')}</th>
                                <th{Lang::T('Internet Plan')}</th>
                                <th{Lang::T('Date')}</th>
                                <th>{Lang::T('Routers')}</th>
                                <th>{Lang::T('Device')}</th>
                                <th>{Lang::T('Manage')}</th>
                                <th>ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach $d as $ds}
                                <tr {if $ds['enabled'] !=1}class="danger" title="disabled" {/if}>
                                    <td>{$ds['name_plan']}</td>
                                    <td>{$ds['plan_type']} {if $ds['prepaid'] !=
                                        'yes'}<b>{Lang::T('Postpaid')}</b>
                                    {else}
                                        {Lang::T('Prepaid')}
                                    {/if}</td>
                                <td>{$ds['name_bw']}</td>
                                <td>{Lang::moneyFormat($ds['price'])}{if !empty($ds['price_old'])}
                                        <sup
                                            style="text-decoration: line-through; color: red">{Lang::moneyFormat($ds['price_old'])}</sup>
                                    {/if}
                                </td>
                                <td>{$ds['validity']} {$ds['validity_unit']}</td>
                                <td>{$ds['pool']}</td>
                                <td>{if $ds['plan_expired']}<a
                                        href="{Text::url('')}services/pppoe-edit/{$ds['plan_expired']}">{Lang::T('Yes')}</a>{else}{Lang::T('No')}
                                    {/if}</td>
                                <td>{if $ds['prepaid'] == no}{$ds['expired_date']}{/if}</td>
                                <td>
                                    {if $ds['is_radius']}
                                        <span class="label label-primary">RADIUS</span>
                                    {else}
                                        {if $ds['routers']!=''}
                                            {$ds['routers']}
                                        {/if}
                                    {/if}
                                </td>
                                <td>{$ds['device']}</td>
                                <td>
                                    <a href="{Text::url('')}services/pppoe-edit/{$ds['id']}"
                                        class="btn btn-info btn-xs">{Lang::T('Edit')}</a>
                                    <a href="{Text::url('')}services/pppoe-delete/{$ds['id']}"
                                        onclick="return ask(this, '{Lang::T('Delete')}?')" id="{$ds['id']}"
                                        class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                                <td>{$ds['id']}</td>
                            </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="sections/footer.tpl"}