{include file="sections/header.tpl"}
<!-- routers -->

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">{Lang::T('Routers')}
                <div class="btn-group pull-right">
                    <a class="btn btn-primary btn-xs" title="save" href="{Text::url('')}routers/maps">
                        <span class="glyphicon glyphicon-map-marker"></span></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
                    <div class="col-md-8">

                        <form id="site-search" method="post" action="{Text::url('')}routers/list/">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="name" class="form-control"
                                    placeholder="{Lang::T('Search by Name')}...">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="submit">{Lang::T('Search')}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a href="{Text::url('')}routers/add" class="btn btn-primary btn-block"><i
                                class="ion ion-android-add">
                            </i> {Lang::T('New Router')}</a>
                    </div>&nbsp;
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>{Lang::T('Router Name')}</th>
                                {if $_c['router_check']}
                                    <th>{Lang::T('Online Status')}</th>
                                {/if}
                                <th>{Lang::T('Manage')}</th>

                            </tr>
                        </thead>
                        <tbody>
                            {foreach $d as $ds}
                                <tr {if $ds['enabled'] !=1}class="danger" title="disabled" {/if}>
                                    <td>
                                        {$ds['name']}
                                    </td>
                                    {if $_c['router_check']}
                                        <td>
                                            <span
                                                class="label {if $ds['status'] == 'Online'}label-success {else}label-danger {/if}">
                                                {if $ds['status'] == 'Online'}
                                                    {Lang::T('Online')}
                                                {else}
                                                    {Lang::T('Offline')}
                                                {/if}
                                            </span>
                                        </td>
                                    {/if}
                                    <td>
                                        <a href="{Text::url('')}routers/edit/{$ds['id']}"
                                        class="btn btn-info btn-xs">
                                        {Lang::T('Edit')}
                                        </a>
                                        <a href="{Text::url('')}routers/delete/{$ds['id']}" id="{$ds['id']}"
                                        class="btn btn-danger btn-xs"
                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
                {include file="pagination.tpl"}
            </div>
        </div>
    </div>
</div>


{include file="sections/footer.tpl"}
