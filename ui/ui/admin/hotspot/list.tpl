{include file="sections/header.tpl"}

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                    <a class="btn btn-primary btn-xs" title="save" href="{Text::url('services/sync/hotspot')}"
                        onclick="return ask(this, 'This will sync/send hotspot package to Mikrotik?')"><span
                            class="glyphicon glyphicon-refresh" aria-hidden="true"></span> sync</a>
                </div>{Lang::T('Hotspot Plans')}
            </div>
            <form id="site-search" method="post" action="{Text::url('services/hotspot/')}">
                <div class="panel-body">
                    <div class="row" style="padding: 5px; align-items: center;">

                        <!-- Search Input with Clear Button -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control"
                                    placeholder="{Lang::T('Search by Name')}...">
                            </div>
                        </div>

                        <!-- Add New Service -->
                        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                            <a href="{Text::url('services/add')}" class="btn btn-primary btn-block"
                            title="{Lang::T('New Service Package')}">
                            <i class="ion ion-android-add"></i> {Lang::T('Add')}
                            </a>
                        </div>

                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <div style="margin-left: 5px; margin-right: 5px;">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>{Lang::T('Name')}</th>
                                <th>{Lang::T('Bandwidth')}</th>
                                <th>{Lang::T('Category')}</th>
                                <th>{Lang::T('Price')}</th>
                                <th>{Lang::T('Validity')}</th>
                                <th>{Lang::T('Routers')}</th>
                                <th>{Lang::T('Device')}</th>
                                <th{Lang::T('Internet Package')}</th>
                                <th>{Lang::T('ID')}</th>
                                <th>{Lang::T('Manage')}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach $d as $ds}
                                <tr {if $ds['enabled'] !=1}class="danger" title="disabled" {elseif $ds['prepaid'] !='yes'
                                            }class="warning" title="Postpaid" {/if}>
                                    <td class="headcol">{$ds['name_plan']}</td>
                                    <td>{$ds['name_bw']}</td>
                                    <td>{$ds['typebp']}</td>
                                    <td>{Lang::moneyFormat($ds['price'])}
                                        {if !empty($ds['price_old'])}
                                            <sup
                                                style="text-decoration: line-through; color: red">{Lang::moneyFormat($ds['price_old'])}</sup>
                                        {/if}
                                    </td>
                                    <td>{$ds['validity']} {$ds['validity_unit']}</td>

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
                                    <td>{$ds['id']}</td>
                                    <td>
                                        <a href="{Text::url('services/edit/')}{$ds['id']}"
                                            class="btn btn-info btn-xs">{Lang::T('Edit')}</a>
                                        <a href="{Text::url('services/delete/')}{$ds['id']}" id="{$ds['id']}"
                                            onclick="return ask(this, '{Lang::T('Delete')}?')"
                                            class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
            {include file="pagination.tpl"}
        </div>
    </div>
</div>




{include file="sections/footer.tpl"}
