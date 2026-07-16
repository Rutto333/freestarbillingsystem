{include file="sections/header.tpl"}
<!-- routers-add -->

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary panel-hovered panel-stacked mb30">
            <div class="panel-heading">{Lang::T('Add Router')}</div>
            <div class="panel-body">

                <form class="form-horizontal" method="post" role="form" action="{Text::url('')}routers/add-post">
                    <div class="form-group" style="display:none;">
                        <label class="col-md-2 control-label">{Lang::T('Status')}</label>
                        <div class="col-md-10">
                            <input type="hidden" name="enabled" value="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">{Lang::T('Router Name')}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" maxlength="32">
			</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">{Lang::T('IP Address')}</label>
                        <div class="col-md-6">
                            <input type="text" placeholder="192.168.88.1:8728" class="form-control" id="ip_address"
                                name="ip_address">
                    	</div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">{Lang::T('Username')}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">{Lang::T('password')}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="password" name="password"
                            onmouseleave="this.type = 'password'" onmouseenter="this.type = 'text'">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-6">
                            <label><input type="checkbox" checked name="testIt" value="yes"> {Lang::T('Test Connection')}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" onclick="return ask(this, '{Lang::T("Continue the process of adding Routers?")}')"
                                type="submit">{Lang::T('Save')}</button>
                            Or <a href="{Text::url('')}routers/list">{Lang::T('Cancel')}</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

{include file="sections/footer.tpl"}
