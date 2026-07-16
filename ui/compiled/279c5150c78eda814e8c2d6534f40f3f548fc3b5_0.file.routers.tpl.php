<?php
/* Smarty version 4.5.3, created on 2025-07-22 12:00:01
  from '/var/www/html/alpha/ui/ui/admin/maps/routers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687f5311e1f9e4_70971104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '279c5150c78eda814e8c2d6534f40f3f548fc3b5' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/maps/routers.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:pagination.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_687f5311e1f9e4_70971104 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<form id="site-search" method="post" action="<?php echo Text::url('');?>
routers/maps">
    <input type="hidden" name="_route" value="routers/maps">
    <div class="input-group">
        <div class="input-group-addon">
            <span class="fa fa-search"></span>
        </div>
        <input type="text" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" placeholder="<?php echo Lang::T('Search');?>
...">
        <div class="input-group-btn">
            <button class="btn btn-success" type="submit"><?php echo Lang::T('Search');?>
</button>
        </div>
    </div>
</form>

<!-- Map container div -->
<div id="map" class="well" style="width: '100%'; height: 70vh; margin: 20px auto"></div>

<?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <?php echo '<script'; ?>
>
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
            var map = L.map('map').setView([lat, lon], 9);
            var group = L.featureGroup().addTo(map);

            var routers = <?php echo json_encode($_smarty_tpl->tpl_vars['d']->value);?>
;

            L.tileLayer('https://{s}.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}&s=Ga', {
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                maxZoom: 20
        }).addTo(map);

        routers.forEach(function(router) {
            var name = router.name;
            var info = router.description;
            var coordinates = router.coordinates;
            console.log(coordinates.split(","))
            // Create a popup for the marker
            var popupContent = "<strong>Name</strong>: " + name + "<br>" +
                "<strong>Info</strong>: " + info + "<br>" +
                "<a href='<?php echo Text::url('routers/edit/');?>
"+ router.id +"'>More Info</a> &bull; " +
                "<a href='https://www.google.com/maps/dir//" + coordinates +
                "' target='maps'>Get Direction</a><br>";

            // Add marker to map
            if (router.enabled == 1) {
                var circle = L.circle(coordinates.split(","), router.coverage * 1, {
                    color: 'blue',
                    fillOpacity: 0.1
                }).addTo(map);
            } else {
                var circle = L.circle(coordinates.split(","), router.coverage * 1, {
                    color: 'red',
                    fillOpacity: 0.1
                }).addTo(map);
            }
            var marker = L.marker(coordinates.split(",")).addTo(group);
            marker.bindTooltip(name, { permanent: true }).bindPopup(popupContent);
        });

        map.fitBounds(group.getBounds());
        }
        window.onload = function() {
            getLocation();
        }
    <?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
