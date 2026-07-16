<?php
/* Smarty version 4.5.3, created on 2025-07-22 12:00:00
  from '/var/www/html/alpha/ui/ui/admin/maps/customers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687f53105c2c01_26391901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d2695e983f52a728165864ad131577a337d153d' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/maps/customers.tpl',
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
function content_687f53105c2c01_26391901 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<form id="site-search" method="post" action="<?php echo Text::url('map/customer/');?>
">
    <input type="hidden" name="_route" value="map/customer">
    <div class="input-group">
        <div class="input-group-addon">
            <span class="fa fa-search"></span>
        </div>
        <input type="text" name="search" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
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
            var map = L.map('map').setView([lat, lon], 13);
            var group = L.featureGroup().addTo(map);

            var customers = <?php echo json_encode($_smarty_tpl->tpl_vars['customers']->value);?>
;

            L.tileLayer('https://{s}.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}&s=Ga', {
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                maxZoom: 20
        }).addTo(map);

        customers.forEach(function(customer) {
            var name = customer.id;
            var name = customer.name;
            var info = customer.info;
            var direction = customer.direction;
            var coordinates = customer.coordinates;
            var balance = customer.balance;
            var address = customer.address;

            // Create a popup for the marker
            var popupContent = "<strong>Name</strong>: " + name + "<br>" +
                "<strong>Info</strong>: " + info + "<br>" +
                "<strong>Balance</strong>: " + balance + "<br>" +
                "<strong>Address</strong>: " + address + "<br>" +
                "<a href='<?php echo Text::url('customers/view/');?>
"+ customer.id +"'>More Info</a> &bull; " +
                "<a href='https://www.google.com/maps/dir//" + direction + "' target='maps'>Get Direction</a><br>";

            // Add marker to map
            var marker = L.marker(JSON.parse(coordinates)).addTo(group);
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
