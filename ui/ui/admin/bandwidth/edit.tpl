{include file="sections/header.tpl"}

<div class="row">
	<div class="col-sm-8">
		<div class="panel panel-primary panel-hovered panel-stacked mb30">
			<div class="panel-heading">{Lang::T('Edit Bandwidth')}</div>
			<div class="panel-body">

				<form class="form-horizontal" method="post" role="form" action="{Text::url('bandwidth/edit-post')}">
					<input type="hidden" name="id" value="{$d['id']}">
					<div class="form-group">
						<label class="col-md-3 control-label">{Lang::T('Bandwidth Name')}</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="name" name="name" value="{$d['name_bw']}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">{Lang::T('Rate Download')}</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="rate_down" name="rate_down"
								value="{$d['rate_down']}">
						</div>
						<div class="col-md-3">
							<select class="form-control" id="rate_down_unit" name="rate_down_unit">
								<option value="Kbps" {if $d['rate_down_unit'] eq 'Kbps'}selected="selected" {/if}>Kbps
								</option>
								<option value="Mbps" {if $d['rate_down_unit'] eq 'Mbps'}selected="selected" {/if}>Mbps
								</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">{Lang::T('Rate Upload')}</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="rate_up" name="rate_up" value="{$d['rate_up']}">
						</div>
						<div class="col-md-3">
							<select class="form-control" id="rate_up_unit" name="rate_up_unit">
								<option value="Kbps" {if $d['rate_up_unit'] eq 'Kbps'}selected="selected" {/if}>Kbps
								</option>
								<option value="Mbps" {if $d['rate_up_unit'] eq 'Mbps'}selected="selected" {/if}>Mbps
								</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary" onclick="return ask(this, '{Lang::T("Continue the Bandwidth change process?")}')" type="submit">{Lang::T('Save Change')}</button>
							{Lang::T("Or")} <a href="{Text::url('bandwidth/list')}">{Lang::T('Cancel')}</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	function burstIt(value) {
		var b = value.split(" ");
		$("#burst_limit").val(b[1]);
		$("#burst_threshold").val(b[2]);
		$("#burst_time").val(b[3]);
		$("#burst_priority").val(b[4]);
		$("#burst_limit_at").val(b[5]);
		var a = b[0].split("/");
		$("#rate_down").val(a[0].replace('M',''));
		$("#rate_up").val(a[1].replace('M',''));
		$('#rate_down_unit').val('Mbps');
		$('#rate_up_unit').val('Mbps');
		window.scrollTo(0, 0);
	}
</script>

{include file="sections/footer.tpl"}
