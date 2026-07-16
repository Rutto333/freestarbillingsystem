<?php
/* Smarty version 4.5.3, created on 2025-10-16 12:53:29
  from '/var/www/html/dev/ui/ui/admin/customers/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68f0c09939cbe8_20856421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecf85d1765ba0529022e3101f693624aac6ff730' => 
    array (
      0 => '/var/www/html/dev/ui/ui/admin/customers/edit.tpl',
      1 => 1759655212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68f0c09939cbe8_20856421 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form class="form-horizontal" enctype="multipart/form-data" method="post" role="form" action="<?php echo Text::url('customers/edit-post');?>
">
    <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-<?php if ($_smarty_tpl->tpl_vars['d']->value['status'] == 'Active') {?>primary<?php } else { ?>danger<?php }?> panel-hovered panel-stacked mb30">
                <div class="panel-heading"><?php echo Lang::T('Edit Contact');?>
</div>
                <div class="panel-body">
                                        <?php $_smarty_tpl->_assignInScope('initials', mb_strtoupper((string) substr((string) (($tmp = $_smarty_tpl->tpl_vars['d']->value['username'] ?? null)===null||$tmp==='' ? '??' ?? null : $tmp), (int) 0, (int) 2) ?? '', 'UTF-8'));?>
                    <div class="profile-user-img img-responsive img-circle"
                        style="width:100px; height:100px; background:#007bff; color:#fff;
                                display:flex; align-items:center; justify-content:center;
                                font-size:32px; font-weight:bold; cursor:default; margin:auto;">
                        <?php echo $_smarty_tpl->tpl_vars['initials']->value;?>

                    </div><br>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Usernames');?>
</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['country_code_phone'] != '') {?>
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-phone-alt"></i></span>
                                <?php } else { ?>
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-user"></i></span>
                                <?php }?>
                                <input type="text" class="form-control" name="username" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
"
                                    required
                                    placeholder="<?php if ($_smarty_tpl->tpl_vars['_c']->value['country_code_phone'] != '') {
echo $_smarty_tpl->tpl_vars['_c']->value['country_code_phone'];?>
 <?php echo Lang::T('Phone Number');
} else {
echo Lang::T('Usernames');
}?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Full Name');?>
</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                value="<?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Email');?>
</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Phone Number');?>
</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['country_code_phone'] != '') {?>
                                    <span class="input-group-addon" id="basic-addon1">+</span>
                                <?php } else { ?>
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-phone-alt"></i></span>
                                <?php }?>
                                <input type="text" class="form-control" name="phonenumber" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['phonenumber'];?>
"
                                    placeholder="<?php if ($_smarty_tpl->tpl_vars['_c']->value['country_code_phone'] != '') {
echo $_smarty_tpl->tpl_vars['_c']->value['country_code_phone'];
}?> <?php echo Lang::T('Phone Number');?>
">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Password');?>
</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="password" autocomplete="off" class="form-control" id="password" name="password"
                                    value="<?php echo $_smarty_tpl->tpl_vars['d']->value['password'];?>
">
                                <span class="input-group-addon" style="cursor:pointer;" onclick="togglePassword('password')">
                                    <i class="glyphicon glyphicon-eye-open" id="password-icon"></i>
                                </span>
                            </div>
                            <span class="help-block"><?php echo Lang::T('Keep Blank to do not change Password');?>
</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Service Type');?>
</label>
                        <div class="col-md-9">
                            <select class="form-control" id="service_type" name="service_type">
                                <option value="Hotspot" <?php if ($_smarty_tpl->tpl_vars['d']->value['service_type'] == 'Hotspot') {?>selected<?php }?>>Hotspot
                                </option>
                                <option value="PPPoE" <?php if ($_smarty_tpl->tpl_vars['d']->value['service_type'] == 'PPPoE') {?>selected<?php }?>>PPPoE</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Assign Router');?>
</label>
                        <div class="col-md-9">
                            <select class="form-control" id="router_id" name="router_id">
                                <option value=""><?php echo Lang::T('Select MikroTik Router');?>
</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['routers']->value, 'router');
$_smarty_tpl->tpl_vars['router']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['router']->value) {
$_smarty_tpl->tpl_vars['router']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['router']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['d']->value['router_id'] == $_smarty_tpl->tpl_vars['router']->value['id']) {?>selected<?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['router']->value['name'];?>

                                    </option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            <small class="help-block"><?php echo Lang::T('Select the MikroTik router for this customer');?>
</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Account Type');?>
</label>
                        <div class="col-md-9">
                            <select class="form-control" id="account_type" name="account_type">
                                <option value="Personal" <?php if ($_smarty_tpl->tpl_vars['d']->value['account_type'] == 'Personal') {?>selected<?php }?>><?php echo Lang::T("Personal");?>

                                </option>
                                <option value="Business" <?php if ($_smarty_tpl->tpl_vars['d']->value['account_type'] == 'Business') {?>selected<?php }?>><?php echo Lang::T("Business");?>

                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Status');?>
</label>
                        <div class="col-md-9">
                            <select class="form-control" id="status" name="status">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['statuses']->value, 'status');
$_smarty_tpl->tpl_vars['status']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] == $_smarty_tpl->tpl_vars['status']->value) {?>selected<?php }?>><?php echo Lang::T($_smarty_tpl->tpl_vars['status']->value);?>

                                    </option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            <span class="help-block">
                                <?php echo Lang::T('Banned');?>
: <?php echo Lang::T('Customer cannot login again');?>
.<br>
                                <?php echo Lang::T('Disabled');?>
: <?php echo Lang::T('Customer can login but cannot buy internet package');?>
.<br>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="panel-heading">PPPoE</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Usernames');?>
 <span class="label label-danger"
                                id="warning_username"></span></label>
                        <div class="col-md-9">
                            <input type="username" class="form-control" id="pppoe_username" name="pppoe_username"
                                onkeyup="checkUsername(this, <?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
)" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['pppoe_username'];?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Password');?>
</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="pppoe_password" name="pppoe_password"
                                value="<?php echo $_smarty_tpl->tpl_vars['d']->value['pppoe_password'];?>
" onmouseleave="this.type = 'password'"
                                onmouseenter="this.type = 'text'">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button class="btn btn-primary" onclick="return ask(this, '<?php echo Lang::T("Continue the Customer Data change process?");?>
')"
            type="submit">
            <?php echo Lang::T('Save Changes');?>

        </button>
        <br><a href="<?php echo Text::url('');?>
customers/list" class="btn btn-link"><?php echo Lang::T('Cancel');?>
</a>
    </div>
</form>



<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<?php echo '<script'; ?>
 src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
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
                        <input type="text" class="form-control" name="custom_field_name[]" placeholder="<?php echo Lang::T('Name');?>
">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="custom_field_value[]" placeholder="<?php echo Lang::T('Value');?>
">
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

        <?php if ($_smarty_tpl->tpl_vars['d']->value['coordinates']) {?>
            var coords = '<?php echo $_smarty_tpl->tpl_vars['d']->value['coordinates'];?>
'.split(',');
            if (coords.length === 2) {
                setupMap(parseFloat(coords[0]), parseFloat(coords[1]));
            } else {
                getLocation();
            }
        <?php } else { ?>
            getLocation();
        <?php }?>

    }
<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
