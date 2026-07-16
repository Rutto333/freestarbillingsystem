<?php
/* Smarty version 4.5.3, created on 2025-07-22 11:21:03
  from '/var/www/html/alpha/ui/ui/admin/settings/widgets.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687f49ef2cd9d2_93482555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d5c071f4c53e4f7e6910db66cd4d17afe4ff36f' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/settings/widgets.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_687f49ef2cd9d2_93482555 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'showWidget' => 
  array (
    'compiled_filepath' => '/var/www/html/alpha/ui/compiled/7d5c071f4c53e4f7e6910db66cd4d17afe4ff36f_0.file.widgets.tpl.php',
    'uid' => '7d5c071f4c53e4f7e6910db66cd4d17afe4ff36f',
    'call_name' => 'smarty_template_function_showWidget_330672383687f49ef26ddf4_11941043',
  ),
));
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<ul class="nav nav-tabs nav-justified">
    <li role="presentation" <?php if ($_smarty_tpl->tpl_vars['tipeUser']->value == 'Admin') {?> class="active" <?php }?>><a
            href="<?php echo Text::url('widgets&user=Admin');?>
">Admin</a></li>
    <li role="presentation" <?php if ($_smarty_tpl->tpl_vars['tipeUser']->value == 'Agent') {?> class="active" <?php }?>><a
            href="<?php echo Text::url('widgets&user=Agent');?>
">Agent</a></li>
    <li role="presentation" <?php if ($_smarty_tpl->tpl_vars['tipeUser']->value == 'Sales') {?> class="active" <?php }?>><a
            href="<?php echo Text::url('widgets&user=Sales');?>
">Sales</a></li>
    <li role="presentation" <?php if ($_smarty_tpl->tpl_vars['tipeUser']->value == 'Customer') {?> class="active" <?php }?>><a
            href="<?php echo Text::url('widgets&user=Customer');?>
">Customer</a></li>
</ul>
<br>

<?php $_smarty_tpl->_assignInScope('dtipe', "dashboard_".((string)$_smarty_tpl->tpl_vars['tipeUser']->value));?>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo Lang::T("Dashboard Structure");?>
</div>
            <div class="panel-body">
                <?php $_smarty_tpl->_assignInScope('rows', explode(".",$_smarty_tpl->tpl_vars['_c']->value[$_smarty_tpl->tpl_vars['dtipe']->value]));?>
                <?php $_smarty_tpl->_assignInScope('pos', 1);?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'cols');
$_smarty_tpl->tpl_vars['cols']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cols']->value) {
$_smarty_tpl->tpl_vars['cols']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['cols']->value == 12) {?>
                        <div class="row row-no-gutters">
                            <div class="col-xs-12" style="border: 1px;">
                                <a href="<?php echo Text::url('widgets/add/',$_smarty_tpl->tpl_vars['pos']->value,'&user=',$_smarty_tpl->tpl_vars['tipeUser']->value);?>
" class="btn btn-default btn-block"><?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
</a>
                            </div>
                        </div>
                        <?php $_smarty_tpl->_assignInScope('pos', $_smarty_tpl->tpl_vars['pos']->value+1);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->_assignInScope('colss', explode(",",$_smarty_tpl->tpl_vars['cols']->value));?>
                        <div class="row row-no-gutters">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['colss']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                                <div class="col-xs-<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
">
                                    <a href="<?php echo Text::url('widgets/add/',$_smarty_tpl->tpl_vars['pos']->value,'&user=',$_smarty_tpl->tpl_vars['tipeUser']->value);?>
" class="btn btn-default btn-block"><?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
</a>
                                </div>
                                <?php $_smarty_tpl->_assignInScope('pos', $_smarty_tpl->tpl_vars['pos']->value+1);?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="panel-footer">
                <form method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/docs/#Dashboard%20Structure"
                                target="_blank"><?php echo Lang::T("Structure");?>
</a></span>
                        <input type="text" name="dashboard" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value[$_smarty_tpl->tpl_vars['dtipe']->value];?>
" class="form-control"
                            placeholder="<?php echo Lang::T("Dashboard");?>
">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="save"
                        value="struct"><?php echo Lang::T("Save");?>
</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6">
                <?php
$_smarty_tpl->tpl_vars['pos'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['pos']->step = 1;$_smarty_tpl->tpl_vars['pos']->total = (int) ceil(($_smarty_tpl->tpl_vars['pos']->step > 0 ? $_smarty_tpl->tpl_vars['max']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['max']->value)+1)/abs($_smarty_tpl->tpl_vars['pos']->step));
if ($_smarty_tpl->tpl_vars['pos']->total > 0) {
for ($_smarty_tpl->tpl_vars['pos']->value = 1, $_smarty_tpl->tpl_vars['pos']->iteration = 1;$_smarty_tpl->tpl_vars['pos']->iteration <= $_smarty_tpl->tpl_vars['pos']->total;$_smarty_tpl->tpl_vars['pos']->value += $_smarty_tpl->tpl_vars['pos']->step, $_smarty_tpl->tpl_vars['pos']->iteration++) {
$_smarty_tpl->tpl_vars['pos']->first = $_smarty_tpl->tpl_vars['pos']->iteration === 1;$_smarty_tpl->tpl_vars['pos']->last = $_smarty_tpl->tpl_vars['pos']->iteration === $_smarty_tpl->tpl_vars['pos']->total;?>
                    <?php if ($_smarty_tpl->tpl_vars['pos']->value%2 != 0) {?>
                        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'showWidget', array('widgets'=>$_smarty_tpl->tpl_vars['widgets']->value,'pos'=>$_smarty_tpl->tpl_vars['pos']->value), true);?>

                    <?php }?>
                <?php }
}
?>
            </div>
            <div class="col-md-6">
                <?php
$_smarty_tpl->tpl_vars['pos'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['pos']->step = 1;$_smarty_tpl->tpl_vars['pos']->total = (int) ceil(($_smarty_tpl->tpl_vars['pos']->step > 0 ? $_smarty_tpl->tpl_vars['max']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['max']->value)+1)/abs($_smarty_tpl->tpl_vars['pos']->step));
if ($_smarty_tpl->tpl_vars['pos']->total > 0) {
for ($_smarty_tpl->tpl_vars['pos']->value = 1, $_smarty_tpl->tpl_vars['pos']->iteration = 1;$_smarty_tpl->tpl_vars['pos']->iteration <= $_smarty_tpl->tpl_vars['pos']->total;$_smarty_tpl->tpl_vars['pos']->value += $_smarty_tpl->tpl_vars['pos']->step, $_smarty_tpl->tpl_vars['pos']->iteration++) {
$_smarty_tpl->tpl_vars['pos']->first = $_smarty_tpl->tpl_vars['pos']->iteration === 1;$_smarty_tpl->tpl_vars['pos']->last = $_smarty_tpl->tpl_vars['pos']->iteration === $_smarty_tpl->tpl_vars['pos']->total;?>
                    <?php if ($_smarty_tpl->tpl_vars['pos']->value%2 == 0) {?>
                        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'showWidget', array('widgets'=>$_smarty_tpl->tpl_vars['widgets']->value,'pos'=>$_smarty_tpl->tpl_vars['pos']->value), true);?>

                    <?php }?>
                <?php }
}
?>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* smarty_template_function_showWidget_330672383687f49ef26ddf4_11941043 */
if (!function_exists('smarty_template_function_showWidget_330672383687f49ef26ddf4_11941043')) {
function smarty_template_function_showWidget_330672383687f49ef26ddf4_11941043(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('pos'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

    <form method="post" action="<?php echo Text::url('widgets/pos/','&user=',$_smarty_tpl->tpl_vars['tipeUser']->value);?>
">
        <div class="panel panel-info">
            <div class="panel-heading"><?php echo Lang::T("Area Fields");?>
 <?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
</div>
            <div class="panel-body">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['widgets']->value, 'w');
$_smarty_tpl->tpl_vars['w']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['w']->value['position'] == $_smarty_tpl->tpl_vars['pos']->value) {?>
                        <div class="panel panel-<?php if ($_smarty_tpl->tpl_vars['w']->value['enabled']) {?>default<?php } else { ?>danger<?php }?>">
                            <div class="panel-heading"><b><?php echo $_smarty_tpl->tpl_vars['w']->value['title'];?>
</b></div>
                            <div class="panel-body"><?php echo ucwords(str_replace('.php','',str_replace('_',' ',$_smarty_tpl->tpl_vars['w']->value['widget'])));?>
</div>
                            <table class="table table-bordered table-condensed">
                                <tr>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-addon"><?php echo Lang::T("Sequence");?>
</span>
                                            <input type="number" style="width: 100px;" name="orders[]" value="<?php echo $_smarty_tpl->tpl_vars['w']->value['orders'];?>
"
                                                class="form-control" placeholder="<?php echo Lang::T("Sequence");?>
">
                                        </div>
                                        <input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
">
                                    </td>
                                    <td width="130">
                                        <div class="btn-group btn-group-justified" role="group">
                                            <a href="<?php echo Text::url('widgets/delete/',$_smarty_tpl->tpl_vars['w']->value['id'],'&user=',$_smarty_tpl->tpl_vars['tipeUser']->value);?>
"
                                                onclick="return ask(this, '<?php echo Lang::T("Delete this widget?");?>
')" class="btn btn-sm btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </a>
                                            <a href="<?php echo Text::url('widgets/edit/',$_smarty_tpl->tpl_vars['w']->value['id'],'&user=',$_smarty_tpl->tpl_vars['tipeUser']->value);?>
"
                                                class="btn btn-sm btn-success"><?php echo Lang::T("Edit");?>
</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="panel-footer">
                <div class="btn-group btn-group-justified" role="group">
                    <div class="btn-group" role="group">
                        <button type="submit" class="btn btn-info"><?php echo Lang::T("Save sequence");?>
</button>
                    </div>
                    <a href="<?php echo Text::url('widgets/add/',$_smarty_tpl->tpl_vars['pos']->value,'&user=',$_smarty_tpl->tpl_vars['tipeUser']->value);?>
" class="btn btn-xs btn-primary"><?php echo Lang::T("Add new widget");?>
</a>
                </div>
            </div>
        </div>
    </form>
<?php
}}
/*/ smarty_template_function_showWidget_330672383687f49ef26ddf4_11941043 */
}
