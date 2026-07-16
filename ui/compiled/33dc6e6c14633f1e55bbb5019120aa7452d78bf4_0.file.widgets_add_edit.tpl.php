<?php
/* Smarty version 4.5.3, created on 2025-08-28 23:35:56
  from '/var/www/html/example/ui/ui/admin/settings/widgets_add_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b0bdac0c5d89_96637776',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33dc6e6c14633f1e55bbb5019120aa7452d78bf4' => 
    array (
      0 => '/var/www/html/example/ui/ui/admin/settings/widgets_add_edit.tpl',
      1 => 1742420632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68b0bdac0c5d89_96637776 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form method="post" action="<?php echo Text::url('widgets/',$_smarty_tpl->tpl_vars['do']->value);?>
">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><?php if ($_smarty_tpl->tpl_vars['do']->value == 'add') {
echo Lang::T("Add");
} else {
echo Lang::T("Edit");
}?> <?php echo Lang::T("Widget");?>
</div>
                <div class="panel-body">
                    <input type="hidden" class="form-control" required id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['widget']->value['id'];?>
">
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T("Widget");?>
</label>
                        <div class="col-md-5">
                            <select name="widget" id="widget" class="form-control" onchange="changeTitle(this)">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['widgets']->value, 'v', false, 'k');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['widget']->value['widget'] == $_smarty_tpl->tpl_vars['k']->value) {?>selected="selected" <?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['v']->value;?>

                                    </option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                        <p class="help-block col-md-4">&nbsp;</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T("Title");?>
</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" required id="title" name="title"
                                value="<?php echo $_smarty_tpl->tpl_vars['widget']->value['title'];?>
">
                        </div>
                        <span class="help-block col-md-4">&nbsp;</span>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T("Sequence");?>
</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" id="orders" name="orders"
                                value="<?php if ($_smarty_tpl->tpl_vars['widget']->value['orders'] > 0) {
echo $_smarty_tpl->tpl_vars['widget']->value['orders'];
} else { ?>99<?php }?>">
                        </div>
                        <span class="help-block col-md-4">&nbsp;</span>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T("Position");?>
</label>
                        <div class="col-md-5">
                            <select name="position" id="position" class="form-control">
                                <?php
$_smarty_tpl->tpl_vars['pos'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['pos']->step = 1;$_smarty_tpl->tpl_vars['pos']->total = (int) ceil(($_smarty_tpl->tpl_vars['pos']->step > 0 ? $_smarty_tpl->tpl_vars['max']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['max']->value)+1)/abs($_smarty_tpl->tpl_vars['pos']->step));
if ($_smarty_tpl->tpl_vars['pos']->total > 0) {
for ($_smarty_tpl->tpl_vars['pos']->value = 1, $_smarty_tpl->tpl_vars['pos']->iteration = 1;$_smarty_tpl->tpl_vars['pos']->iteration <= $_smarty_tpl->tpl_vars['pos']->total;$_smarty_tpl->tpl_vars['pos']->value += $_smarty_tpl->tpl_vars['pos']->step, $_smarty_tpl->tpl_vars['pos']->iteration++) {
$_smarty_tpl->tpl_vars['pos']->first = $_smarty_tpl->tpl_vars['pos']->iteration === 1;$_smarty_tpl->tpl_vars['pos']->last = $_smarty_tpl->tpl_vars['pos']->iteration === $_smarty_tpl->tpl_vars['pos']->total;?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['widget']->value['position'] == $_smarty_tpl->tpl_vars['pos']->value) {?>selected="selected" <?php }?>>
                                        Area <?php echo $_smarty_tpl->tpl_vars['pos']->value;?>

                                    </option>
                                <?php }
}
?>
                            </select>
                        </div>
                        <p class="help-block col-md-4">&nbsp;</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T("User");?>
</label>
                        <div class="col-md-5">
                            <select name="tipeUser" aria-readonly="" id="tipeUser" class="form-control">
                                <option value="<?php echo $_smarty_tpl->tpl_vars['widget']->value['user'];?>
" <?php if ($_smarty_tpl->tpl_vars['widget']->value['user'] == $_smarty_tpl->tpl_vars['u']->value) {?>selected="selected" <?php }?>>
                                    <?php echo Lang::T("Dashboard");?>
 <?php echo $_smarty_tpl->tpl_vars['widget']->value['user'];?>

                                </option>
                            </select>
                        </div>
                        <p class="help-block col-md-4">&nbsp;</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T("Status");?>
</label>
                        <div class="col-md-5">
                            <select name="enabled" id="enabled" class="form-control">
                                <option value="1"
                                    <?php if ((isset($_smarty_tpl->tpl_vars['widget']->value['enabled'])) && $_smarty_tpl->tpl_vars['widget']->value['enabled'] != 1) {?>selected="selected" <?php }?>>
                                    <?php echo Lang::T("Active");?>

                                </option>
                                <option value="0"
                                    <?php if ((isset($_smarty_tpl->tpl_vars['widget']->value['enabled'])) && $_smarty_tpl->tpl_vars['widget']->value['enabled'] == 0) {?>selected="selected" <?php }?>>
                                    <?php echo Lang::T("Not Active");?>

                                </option>
                            </select>
                        </div>
                        <p class="help-block col-md-4">&nbsp;</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T("Content");?>
</label>
                        <div class="col-md-9">
                            <textarea name="content" rows="15" id="summernote"
                                class="form-control"><?php echo $_smarty_tpl->tpl_vars['widget']->value['content'];?>
</textarea>
                            <p class="help-block">
                                <?php echo Lang::T("Not all widgets require content. HTML widgets require content, either text or PHP code. Please be careful when writing this content.");?>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="btn-group btn-group-justified" role="group">
                        <a href="<?php echo Text::url('widgets/','&user=',$_smarty_tpl->tpl_vars['tipeUser']->value);?>
" class="btn btn-default btn-block"><?php echo Lang::T("Back");?>
</a>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-info btn-block"><?php echo Lang::T("Save");?>
</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['do']->value == 'edit') {?>
                <a href="<?php echo Text::url('widgets/delete/',$_smarty_tpl->tpl_vars['widget']->value['id'],'&user=',$_smarty_tpl->tpl_vars['tipeUser']->value);?>
" class="btn btn-danger btn-xs"
                    onclick="return ask(this, '<?php echo Lang::T("Remove this widget?");?>
')"><?php echo Lang::T("Delete");?>
</a>
            <?php }?>
        </div>
    </div>
</form>

<?php echo '<script'; ?>
>
    function changeTitle(sel) {
        var name = sel.options[sel.selectedIndex].text;
        document.getElementById('title').value = name;
    }
    document.addEventListener("DOMContentLoaded", function() {
        $('#summernote').summernote();
    });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
