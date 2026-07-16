<?php
/* Smarty version 4.5.3, created on 2025-09-10 11:56:25
  from '/var/www/html/myapp/ui/ui/customer/dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c13d392a4f38_08365900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b8889220e1bad601796e64bde56936c7a1d2042' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/customer/dashboard.tpl',
      1 => 1742427832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header.tpl' => 1,
    'file:customer/footer.tpl' => 1,
  ),
),false)) {
function content_68c13d392a4f38_08365900 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'showWidget' => 
  array (
    'compiled_filepath' => '/var/www/html/myapp/ui/compiled/5b8889220e1bad601796e64bde56936c7a1d2042_0.file.dashboard.tpl.php',
    'uid' => '5b8889220e1bad601796e64bde56936c7a1d2042',
    'call_name' => 'smarty_template_function_showWidget_53461486668c13d39255238_80584782',
  ),
));
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- user-dashboard -->




<?php $_smarty_tpl->_assignInScope('rows', explode(".",$_smarty_tpl->tpl_vars['_c']->value['dashboard_Customer']));
$_smarty_tpl->_assignInScope('pos', 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'cols');
$_smarty_tpl->tpl_vars['cols']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cols']->value) {
$_smarty_tpl->tpl_vars['cols']->do_else = false;
?>
    <?php if ($_smarty_tpl->tpl_vars['cols']->value == 12) {?>
        <div class="row">
            <div class="col-md-12">
                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'showWidget', array('widgets'=>$_smarty_tpl->tpl_vars['widgets']->value,'pos'=>$_smarty_tpl->tpl_vars['pos']->value), true);?>

            </div>
        </div>
        <?php $_smarty_tpl->_assignInScope('pos', $_smarty_tpl->tpl_vars['pos']->value+1);?>
    <?php } else { ?>
        <?php $_smarty_tpl->_assignInScope('colss', explode(",",$_smarty_tpl->tpl_vars['cols']->value));?>
        <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['colss']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                <div class="col-md-<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
">
                    <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'showWidget', array('widgets'=>$_smarty_tpl->tpl_vars['widgets']->value,'pos'=>$_smarty_tpl->tpl_vars['pos']->value), true);?>

                </div>
                <?php $_smarty_tpl->_assignInScope('pos', $_smarty_tpl->tpl_vars['pos']->value+1);?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php if ((isset($_smarty_tpl->tpl_vars['hostname']->value)) && $_smarty_tpl->tpl_vars['hchap']->value == 'true' && $_smarty_tpl->tpl_vars['_c']->value['hs_auth_method'] == 'hchap') {?>
    <?php echo '<script'; ?>
 type="text/javascript" src="/ui/ui/scripts/md5.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        var hostname = "http://<?php echo $_smarty_tpl->tpl_vars['hostname']->value;?>
/login";
        var user = "<?php echo $_smarty_tpl->tpl_vars['_user']->value['username'];?>
";
        var pass = "<?php echo $_smarty_tpl->tpl_vars['_user']->value['password'];?>
";
        var dst = "<?php echo $_smarty_tpl->tpl_vars['apkurl']->value;?>
";
        var authdly = "2";
        var key = hexMD5('<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
' + pass + '<?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
');
        var auth = hostname + '?username=' + user + '&dst=' + dst + '&password=' + key;
        document.write('<meta http-equiv="refresh" target="_blank" content="' + authdly + '; url=' + auth + '">');
    <?php echo '</script'; ?>
>
<?php }
$_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* smarty_template_function_showWidget_53461486668c13d39255238_80584782 */
if (!function_exists('smarty_template_function_showWidget_53461486668c13d39255238_80584782')) {
function smarty_template_function_showWidget_53461486668c13d39255238_80584782(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('pos'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['widgets']->value, 'w');
$_smarty_tpl->tpl_vars['w']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['w']->value['position'] == $_smarty_tpl->tpl_vars['pos']->value) {?>
            <?php echo $_smarty_tpl->tpl_vars['w']->value['content'];?>

        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}}
/*/ smarty_template_function_showWidget_53461486668c13d39255238_80584782 */
}
