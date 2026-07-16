{include file="sections/header.tpl"}

<form class="form-horizontal" enctype="multipart/form-data" method="post" role="form" action="{Text::url('customers/edit-post')}">
    <input type="hidden" name="csrf_token" value="{$csrf_token}">
    <input type="hidden" name="id" value="{$d['id']}">

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-{if $d['status']=='Active'}primary{else}danger{/if} panel-hovered panel-stacked mb30">
                <div class="panel-heading">{Lang::T('Edit Contact')}</div>
                <div class="panel-body">
                    {* Avatar with initials *}
                    {assign var="initials" value=$d['username']|default:'??'|substr:0:2|upper}
                    <div class="profile-user-img img-responsive img-circle"
                        style="width:100px; height:100px; background:#007bff; color:#fff;
                                display:flex; align-items:center; justify-content:center;
                                font-size:32px; font-weight:bold; cursor:default; margin:auto;">
                        {$initials}
                    </div><br>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Usernames')}</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                {if $_c['country_code_phone']!= ''}
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-phone-alt"></i></span>
                                {else}
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-user"></i></span>
                                {/if}
                                <input type="text" class="form-control" name="username" value="{$d['username']}"
                                    required
                                    placeholder="{if $_c['country_code_phone']!= ''}{$_c['country_code_phone']} {Lang::T('Phone Number')}{else}{Lang::T('Usernames')}{/if}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Full Name')}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                value="{$d['fullname']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Email')}</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="email" name="email" value="{$d['email']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Phone Number')}</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                {if $_c['country_code_phone']!= ''}
                                    <span class="input-group-addon" id="basic-addon1">+</span>
                                {else}
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-phone-alt"></i></span>
                                {/if}
                                <input type="text" class="form-control" name="phonenumber" value="{$d['phonenumber']}"
                                    placeholder="{if $_c['country_code_phone']!= ''}{$_c['country_code_phone']}{/if} {Lang::T('Phone Number')}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Password')}</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="password" autocomplete="off" class="form-control" id="password" name="password"
                                    value="{$d['password']}">
                                <span class="input-group-addon" style="cursor:pointer;" onclick="togglePassword('password')">
                                    <i class="glyphicon glyphicon-eye-open" id="password-icon"></i>
                                </span>
                            </div>
                            <span class="help-block">{Lang::T('Keep Blank to do not change Password')}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Service Type')}</label>
                        <div class="col-md-9">
                            <select class="form-control" id="service_type" name="service_type">
                                <option value="Hotspot" {if $d['service_type'] eq 'Hotspot' }selected{/if}>Hotspot
                                </option>
                                <option value="PPPoE" {if $d['service_type'] eq 'PPPoE' }selected{/if}>PPPoE</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Assign Router')}</label>
                        <div class="col-md-9">
                            <select class="form-control" id="router_id" name="router_id">
                                <option value="">{Lang::T('Select MikroTik Router')}</option>
                                {foreach $routers as $router}
                                    <option value="{$router['id']}" {if $d['router_id'] eq $router['id']}selected{/if}>
                                        {$router['name']}
                                    </option>
                                {/foreach}
                            </select>
                            <small class="help-block">{Lang::T('Select the MikroTik router for this customer')}</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Account Type')}</label>
                        <div class="col-md-9">
                            <select class="form-control" id="account_type" name="account_type">
                                <option value="Personal" {if $d['account_type'] eq 'Personal' }selected{/if}>{Lang::T("Personal")}
                                </option>
                                <option value="Business" {if $d['account_type'] eq 'Business' }selected{/if}>{Lang::T("Business")}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Status')}</label>
                        <div class="col-md-9">
                            <select class="form-control" id="status" name="status">
                                {foreach $statuses as $status}
                                    <option value="{$status}" {if $d['status'] eq $status }selected{/if}>{Lang::T($status)}
                                    </option>
                                {/foreach}
                            </select>
                            <span class="help-block">
                                {Lang::T('Banned')}: {Lang::T('Customer cannot login again')}.<br>
                                {Lang::T('Disabled')}: {Lang::T('Customer can login but cannot buy internet package')}.<br>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="panel-heading">PPPoE</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Usernames')} <span class="label label-danger"
                                id="warning_username"></span></label>
                        <div class="col-md-9">
                            <input type="username" class="form-control" id="pppoe_username" name="pppoe_username"
                                onkeyup="checkUsername(this, {$d['id']})" value="{$d['pppoe_username']}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Password')}</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="pppoe_password" name="pppoe_password"
                                value="{$d['pppoe_password']}" onmouseleave="this.type = 'password'"
                                onmouseenter="this.type = 'text'">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button class="btn btn-primary" onclick="return ask(this, '{Lang::T("Continue the Customer Data change process?")}')"
            type="submit">
            {Lang::T('Save Changes')}
        </button>
        <br><a href="{Text::url('')}customers/list" class="btn btn-link">{Lang::T('Cancel')}</a>
    </div>
</form>


{literal}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

<script type="text/javascript">
    // Password toggle function
    function togglePassword(fieldId) {
        var field = document.getElementById(fieldId);
        var icon = document.getElementById(fieldId + '-icon');

        if (field.type === 'password') {
            field.type = 'text';
            icon.className = 'glyphicon glyphicon-eye-close';
        } else {
            field.type = 'password';
            icon.className = 'glyphicon glyphicon-eye-open';
        }
    }

    // Custom fields management
    document.addEventListener("DOMContentLoaded", function() {
        var customFieldsContainer = document.getElementById('custom-fields-container');
        var addCustomFieldButton = document.getElementById('add-custom-field');

        if (addCustomFieldButton) {
            addCustomFieldButton.addEventListener('click', function() {
                var newField = document.createElement('div');
                newField.className = 'form-group';
                newField.innerHTML = `
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="custom_field_name[]" placeholder="{/literal}{Lang::T('Name')}{literal}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="custom_field_value[]" placeholder="{/literal}{Lang::T('Value')}{literal}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="remove-custom-field btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-minus"></i>
                        </button>
                    </div>
                `;
                customFieldsContainer.appendChild(newField);
            });
        }

        if (customFieldsContainer) {
            customFieldsContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-custom-field') ||
                    event.target.parentNode.classList.contains('remove-custom-field')) {
                    var button = event.target.classList.contains('remove-custom-field') ?
                        event.target : event.target.parentNode;
                    var fieldContainer = button.parentNode.parentNode;
                    fieldContainer.parentNode.removeChild(fieldContainer);
                }
            });
        }
    });

    // Username checker function (placeholder - implement your own logic)
    function checkUsername(input, userId) {
        var username = input.value.trim();
        var warningLabel = document.getElementById('warning_username');

        if (username.length === 0) {
            warningLabel.textContent = '';
            return;
        }

        // Add your AJAX call here to check username availability
        // Example:
        // $.ajax({
        //     url: baseUrl + 'customers/check-username',
        //     data: { username: username, id: userId },
        //     success: function(response) {
        //         if (response.exists) {
        //             warningLabel.textContent = 'Username already exists';
        //         } else {
        //             warningLabel.textContent = '';
        //         }
        //     }
        // });
    }

    // Map functionality
    var map, marker;

    function getLocation() {
        if (window.location.protocol === "https:" && navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                showPosition,
                function(error) {
                    console.log('Geolocation error:', error);
                    setupMap(0.5143, 35.2698); // Default to Eldoret, Kenya
                }
            );
        } else {
            setupMap(0.5143, 35.2698); // Default to Eldoret, Kenya
        }
    }

    function showPosition(position) {
        setupMap(position.coords.latitude, position.coords.longitude);
    }

    function setupMap(lat, lon) {
        if (map) {
            map.remove();
        }

        map = L.map('map').setView([lat, lon], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 19
        }).addTo(map);

        marker = L.marker([lat, lon], { draggable: true }).addTo(map);

        // Update coordinates when marker is dragged
        marker.on('dragend', function(e) {
            var coord = marker.getLatLng();
            document.getElementById('coordinates').value = coord.lat.toFixed(6) + ',' + coord.lng.toFixed(6);
        });

        // Update coordinates and marker position when map is clicked
        map.on('click', function(e) {
            var coord = e.latlng;
            var newLatLng = new L.LatLng(coord.lat, coord.lng);
            marker.setLatLng(newLatLng);
            document.getElementById('coordinates').value = coord.lat.toFixed(6) + ',' + coord.lng.toFixed(6);
        });

        // Set initial coordinates value
        document.getElementById('coordinates').value = lat.toFixed(6) + ',' + lon.toFixed(6);
    }

    window.onload = function() {
{/literal}
        {if $d['coordinates']}
            var coords = '{$d['coordinates']}'.split(',');
            if (coords.length === 2) {
                setupMap(parseFloat(coords[0]), parseFloat(coords[1]));
            } else {
                getLocation();
            }
        {else}
            getLocation();
        {/if}
{literal}
    }
</script>
{/literal}

{include file="sections/footer.tpl"}
