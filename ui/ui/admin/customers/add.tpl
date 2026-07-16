{include file="sections/header.tpl"}

<form class="form-horizontal" method="post" role="form" action="{Text::url('customers/add-post')}">
    <input type="hidden" name="csrf_token" value="{$csrf_token}">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary panel-hovered panel-stacked mb30">
                <div class="panel-heading">{Lang::T('Add New Contact')}</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Username')}</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                {if $_c['country_code_phone'] != ''}
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-phone-alt"></i></span>
                                {else}
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-user"></i></span>
                                {/if}
                                <input type="text" class="form-control" name="username" required
                                    placeholder=" ACC010">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Full Name')}</label>
                        <div class="col-md-9">
                            <input type="text" required class="form-control" id="fullname" name="fullname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Email')}</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="email" name="email">
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
                                <input type="text" class="form-control" name="phonenumber"
                                    placeholder="{if $_c['country_code_phone']!= ''}{$_c['country_code_phone']}{/if} {Lang::T('Phone Number')}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Password')}</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" autocomplete="off" required id="password"
                                value="1234" name="password" onmouseleave="this.type = 'password'"
                                onmouseenter="this.type = 'text'">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Service Type')}</label>
                        <div class="col-md-9">
                            <select class="form-control" id="service_type" name="service_type">
                                <option value="Hotspot">Hotspot
                                </option>
                                <option value="PPPoE">PPPoE</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Assign Router')}</label>
                        <div class="col-md-9">
                            <select class="form-control" id="router_id" name="router_id" required>
                                <option value="">{Lang::T('Select MikroTik Router')}</option>
                                {foreach $routers as $router}
                                    <option value="{$router['id']}">{$router['name']}</option>
                                {/foreach}
                            </select>
                            <small class="help-block">{Lang::T('Select the MikroTik router for this customer')}</small>
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
                                onkeyup="checkUsername(this, '0')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Password')}</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="pppoe_password" name="pppoe_password"
                                onmouseleave="this.type = 'password'" onmouseenter="this.type = 'text'">
                        </div>
                    </div>
                </div>
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">{Lang::T('Send welcome message')}</label>
                        <div class="col-md-9">
                            <label class="switch">
                                <input type="checkbox" id="send_welcome_message" value="1" name="send_welcome_message">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="method" style="display: none;">
                        <label class="col-md-3 control-label">{Lang::T('Notification via')}</label>
                        <label class="col-md-3 control-label"><input type="checkbox" name="sms" value="1">
                            {Lang::T('SMS')}</label>
                        <label class="col-md-2 control-label"><input type="checkbox" name="wa" value="1">
                            {Lang::T('WA')}</label>
                        <label class="col-md-2 control-label"><input type="checkbox" name="mail" value="1">
                            {Lang::T('Email')}</label>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div>
        <button class="btn btn-primary"
            onclick="return ask(this, '{Lang::T("Continue the process of adding Customer Data?")}')" type="submit">
            {Lang::T('Save Changes')}
        </button>
        <br><a href="{Text::url('customers/list')}" class="btn btn-link">{Lang::T('Cancel')}</a>
    </div>
</form>
{literal}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sendWelcomeCheckbox = document.getElementById('send_welcome_message');
            var methodSection = document.getElementById('method');

            function toggleMethodSection() {
                if (sendWelcomeCheckbox.checked) {
                    methodSection.style.display = 'block';
                } else {
                    methodSection.style.display = 'none';
                }
            }

            toggleMethodSection();

            sendWelcomeCheckbox.addEventListener('change', toggleMethodSection);
            document.querySelector('form').addEventListener('submit', function(event) {
                if (sendWelcomeCheckbox.checked) {
                    var methodCheckboxes = methodSection.querySelectorAll('input[type="checkbox"]');
                    var oneChecked = Array.from(methodCheckboxes).some(function(checkbox) {
                        return checkbox.checked;
                    });

                    if (!oneChecked) {
                        event.preventDefault();
                        alert('Please choose at least one method notification.');
                        methodSection.focus();
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var customFieldsContainer = document.getElementById('custom-fields-container');
            var addCustomFieldButton = document.getElementById('add-custom-field');

            addCustomFieldButton.addEventListener('click', function() {
                var fieldIndex = customFieldsContainer.children.length;
                var newField = document.createElement('div');
                newField.className = 'form-group';
                newField.innerHTML = `
                <div class="col-md-4">
                    <input type="text" class="form-control" name="custom_field_name[]" placeholder="Name">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="custom_field_value[]" placeholder="Value">
                </div>
                <div class="col-md-2">
                    <button type="button" class="remove-custom-field btn btn-danger btn-sm">-</button>
                </div>
            `;
                customFieldsContainer.appendChild(newField);
            });

            customFieldsContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-custom-field')) {
                    var fieldContainer = event.target.parentNode.parentNode;
                    fieldContainer.parentNode.removeChild(fieldContainer);
                }
            });
        });
    </script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        function getLocation() {
            if (window.location.protocol == "https:" && navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                setupMap(51.505, -0.09);
            }
        }

        function showPosition(position) {
            setupMap(position.coords.latitude, position.coords.longitude);
        }

        function setupMap(lat, lon) {
            var map = L.map('map').setView([lat, lon], 13);
            L.tileLayer('https://{s}.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}&s=Ga', {
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                maxZoom: 20
        }).addTo(map);
        var marker = L.marker([lat, lon]).addTo(map);
        map.on('click', function(e) {
            var coord = e.latlng;
            var lat = coord.lat;
            var lng = coord.lng;
            var newLatLng = new L.LatLng(lat, lng);
            marker.setLatLng(newLatLng);
            $('#coordinates').val(lat + ',' + lng);
        });
        }
        window.onload = function() {
            getLocation();
        }
    </script>
{/literal}


{include file="sections/footer.tpl"}