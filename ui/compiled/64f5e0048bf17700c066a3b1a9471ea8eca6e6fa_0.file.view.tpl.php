<?php
/* Smarty version 4.5.3, created on 2025-09-10 06:08:58
  from '/var/www/html/myapp/ui/ui/admin/admin/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c0ebca484207_47781310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64f5e0048bf17700c066a3b1a9471ea8eca6e6fa' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/admin/view.tpl',
      1 => 1756382288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68c0ebca484207_47781310 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- user-edit -->

<form class="form-horizontal">
    <div class="row">
        <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type'] == "Sales") {?><div class="col-sm-6 col-md-6"><?php } else { ?><div class="col-md-6 col-md-offset-3"><?php }?>
                <div
                    class="panel panel-<?php if ($_smarty_tpl->tpl_vars['d']->value['status'] != 'Active') {?>danger<?php } else { ?>primary<?php }?> panel-hovered panel-stacked mb30">
                    <div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
</div>
                    <div class="panel-body">
                        <center>
                            <div style="
                                width:120px;
                                height:120px;
                                border-radius:50%;
                                background:linear-gradient(135deg,#4f8ef7,#1d63f0);
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                color:#fff;
                                font-size:64px;
                                font-weight:bold;
                                text-transform:uppercase;
                            ">
                                <?php echo substr((string) $_smarty_tpl->tpl_vars['d']->value['fullname'], (int) 0, (int) 2);?>

                            </div>
                        </center>
                        <br>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b><?php echo Lang::T('Username');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
</span>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo Lang::T('Phone Number');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['phone'];?>
</span>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo Lang::T('Email');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
</span>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo Lang::T('City');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['city'];?>
</span>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo Lang::T('Sub District');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['subdistrict'];?>
</span>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo Lang::T('Ward');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['ward'];?>
</span>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo Lang::T('User Type');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['user_type'];?>
</span>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <center><a href="<?php echo Text::url('settings/users-edit/',$_smarty_tpl->tpl_vars['d']->value['id']);?>
"
                                class="btn btn-info btn-block"><?php echo Lang::T('Edit');?>
</a>
                            <a href="<?php echo Text::url('settings/users');?>
" class="btn btn-link btn-block"><?php echo Lang::T('Cancel');?>
</a>
                        </center>
                    </div>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type'] == "Sales" && $_smarty_tpl->tpl_vars['d']->value['root'] != '') {?>
                <div class="col-sm-6 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">Agent - <?php echo $_smarty_tpl->tpl_vars['agent']->value['fullname'];?>
</div>
                        <div class="panel-body">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b><?php echo Lang::T('Phone Number');?>
</b> <span class="pull-right"><a
                                            href="tel:<?php echo $_smarty_tpl->tpl_vars['agent']->value['phone'];?>
"><?php echo $_smarty_tpl->tpl_vars['agent']->value['phone'];?>
</a></span>
                                </li>
                                <li class="list-group-item">
                                    <b><?php echo Lang::T('Email');?>
</b> <span class="pull-right"><a
                                            href="mailto:<?php echo $_smarty_tpl->tpl_vars['agent']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['agent']->value['email'];?>
</a></span>
                                </li>
                                <li class="list-group-item">
                                    <b><?php echo Lang::T('City');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['agent']->value['city'];?>
</span>
                                </li>
                                <li class="list-group-item">
                                    <b><?php echo Lang::T('Sub District');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['agent']->value['subdistrict'];?>
</span>
                                </li>
                                <li class="list-group-item">
                                    <b><?php echo Lang::T('Ward');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['agent']->value['ward'];?>
</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
</form>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
