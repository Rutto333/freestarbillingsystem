<?php
/* Smarty version 4.5.3, created on 2025-08-29 22:48:19
  from '/var/www/html/example/ui/ui/admin/settings/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b2040310cf17_63238299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '481425947a80a8a9a2c3e673538eb5af47faa41d' => 
    array (
      0 => '/var/www/html/example/ui/ui/admin/settings/page.tpl',
      1 => 1755630317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68b2040310cf17_63238299 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form id="formpages" method="post" role="form" action="<?php echo Text::url('');?>
pages/<?php echo $_smarty_tpl->tpl_vars['PageFile']->value;?>
-post">
    <div class="row">
        <div class="<?php if ($_smarty_tpl->tpl_vars['action']->value == 'Voucher') {?>col-md-8<?php } else { ?>col-md-12<?php }?>">
            <div class="panel mb20 panel-primary panel-hovered">
                <div class="panel-heading">
                    <?php if ($_smarty_tpl->tpl_vars['action']->value != 'Voucher') {?>
                        <div class="btn-group pull-right">
                            <a class="btn btn-danger btn-xs" title="Reset File"
                                href="<?php echo Text::url('');?>
pages/<?php echo $_smarty_tpl->tpl_vars['PageFile']->value;?>
-reset"
                                onclick="return ask(this, 'Reset File?')"><span class="glyphicon glyphicon-refresh"
                                    aria-hidden="true"></span></a>
                        </div>
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['pageHeader']->value;?>

                </div>
                <textarea name="html" id="summernote"><?php echo $_smarty_tpl->tpl_vars['htmls']->value;?>
</textarea>
                <?php if ($_smarty_tpl->tpl_vars['writeable']->value) {?>
                    <div class="panel-footer">
                        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'Voucher') {?>
                            <label>
                                <input type="checkbox" name="template_save" value="yes"> <?php echo Lang::T('Save as template');?>

                            </label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon3"><?php echo Lang::T('Template Name');?>
</span>
                                <input type="text" class="form-control" id="template_name" name="template_name">
                            </div>
                            <br>
                        <?php }?>
                        <button type="submit" class="btn btn-primary btn-block"><?php echo Lang::T('Save');?>
</button>
                        <br>
                        <p class="help-block"><?php echo Lang::T('Sometimes you need to refresh 3 times until content change');?>
</p>
                    </div>
                <?php } else { ?>
                    <div class="panel-footer">
                        <?php echo Lang::T("Failed to save page, make sure i can write to folder pages, <i>chmod 664 pages/*.html<i>");?>

                    </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['PageFile']->value == 'Voucher') {?>
                    <div class="panel-footer">
                        <p class="help-block">
                            <b>[[company_name]]</b> <?php echo Lang::T('Your Company Name at Settings');?>
.<br>
                            <b>[[price]]</b> <?php echo Lang::T('Package Price');?>
.<br>
                            <b>[[voucher_code]]</b> <?php echo Lang::T('Voucher Code');?>
.<br>
                            <b>[[plan]]</b> <?php echo Lang::T('Voucher Package');?>
.<br>
                            <b>[[counter]]</b> <?php echo Lang::T('Counter');?>
.<br>
                        </p>
                    </div>
                <?php }?>
            </div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['action']->value == 'Voucher') {?>
            <div class="col-md-4">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vouchers']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
                    <?php if (is_file(((string)$_smarty_tpl->tpl_vars['PAGES_PATH']->value)."/vouchers/".((string)$_smarty_tpl->tpl_vars['v']->value))) {?>
                        <div class="panel mb20 panel-primary panel-hovered" style="cursor: pointer;" onclick="selectTemplate(this)">
                            <div class="panel-heading"><?php echo str_replace(".html",'',$_smarty_tpl->tpl_vars['v']->value);?>
</div>
                            <div class="panel-body"><?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['PAGES_PATH']->value)."/vouchers/".((string)$_smarty_tpl->tpl_vars['v']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div>
                        </div>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        <?php }?>
    </div>
</form>

    <?php echo '<script'; ?>
 type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            $('#summernote').summernote();
        });

        function selectTemplate(f) {
            let children = f.children;
            $('#template_name').val(children[0].innerHTML)
            $('#summernote').summernote('code', children[1].innerHTML);
            window.scrollTo(0, 0);
        }
    <?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
