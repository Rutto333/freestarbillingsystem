<?php
/* Smarty version 4.5.3, created on 2025-08-27 08:55:21
  from '/var/www/html/example/ui/ui/customer/footer-public.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68ae9dc9927374_05171448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '342f58fb8e84a8b6b14c6ee4e13b8cfec85ed594' => 
    array (
      0 => '/var/www/html/example/ui/ui/customer/footer-public.tpl',
      1 => 1742420632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68ae9dc9927374_05171448 (Smarty_Internal_Template $_smarty_tpl) {
?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="HTMLModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="HTMLModal_konten"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button>
                </div>
            </div>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['_c']->value['tawkto'] != '') {?>
        <!--Start of Tawk.to Script-->
        <?php echo '<script'; ?>
 type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src='https://embed.tawk.to/<?php echo $_smarty_tpl->tpl_vars['_c']->value['tawkto'];?>
';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        <?php echo '</script'; ?>
>
        <!--End of Tawk.to Script-->
    <?php }?>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/scripts/vendors.js?v=1"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
