<?php
/* Smarty version 4.5.3, created on 2025-10-17 10:03:26
  from '/var/www/html/dev/ui/ui/admin/routers/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68f1ea3e70bfe4_13484715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b1b9e25e40ccb6a9e87613b3b3f2a6e701e9894' => 
    array (
      0 => '/var/www/html/dev/ui/ui/admin/routers/edit.tpl',
      1 => 1756494746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68f1ea3e70bfe4_13484715 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- routers-edit -->

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary panel-hovered panel-stacked mb30">
            <div class="panel-heading"><?php echo Lang::T('Edit Router');?>
</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('');?>
routers/edit-post">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                    <div class="form-group" style="display:none;">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Status');?>
</label>
                        <div class="col-md-10">
                            <input type="hidden" name="enabled" value="1">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Router Name');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" maxlength="32"
                                value="<?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('IP Address');?>
</label>
                        <div class="col-md-6">
                            <input type="text" placeholder="192.168.88.1:8728" class="form-control" id="ip_address"
                                name="ip_address" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ip_address'];?>
">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Username');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Password');?>
</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="password"
                                value="<?php echo $_smarty_tpl->tpl_vars['d']->value['password'];?>
" onmouseleave="this.type = 'password'"
                                onmouseenter="this.type = 'text'">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" onclick="return ask(this, '<?php echo Lang::T("Continue the process of changing Routers?");?>
')" type="submit"><?php echo Lang::T('Save Changes');?>
</button>
                            Or <a href="<?php echo Text::url('');?>
routers/list"><?php echo Lang::T('Cancel');?>
</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


    <?php echo '<script'; ?>
 src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        var circle;
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

        function updateCoverage() {
            if(circle != undefined){
                circle.setRadius($("#coverage").val());
            }
        }


        function setupMap(lat, lon) {
            var map = L.map('map').setView([lat, lon], 13);
            L.tileLayer('https://{s}.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}&s=Ga', {
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                maxZoom: 20
            }).addTo(map);
            circle = L.circle([lat, lon], 5, {
            color: 'blue',
            fillOpacity: 0.1
            }).addTo(map);
            var marker = L.marker([lat, lon]).addTo(map);
            map.on('click', function(e) {
                var coord = e.latlng;
                var lat = coord.lat;
                var lng = coord.lng;
                newLatLng = new L.LatLng(lat, lng);
                marker.setLatLng(newLatLng);
                circle.setLatLng(newLatLng);
                $('#coordinates').val(lat + ',' + lng);
                updateCoverage();
            });
            updateCoverage();
        }
        window.onload = function() {
        
        <?php if ($_smarty_tpl->tpl_vars['d']->value['coordinates']) {?>
            setupMap(<?php echo $_smarty_tpl->tpl_vars['d']->value['coordinates'];?>
);
        <?php } else { ?>
            getLocation();
        <?php }?>
        
        }
    <?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
