<?php
/* Smarty version 4.5.3, created on 2025-07-09 11:56:23
  from '/var/www/html/alpha/ui/ui/admin/admin/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_686e2eb73e3da7_30908820',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc715594ecd2363f995399c8295357a3f762f862' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/admin/edit.tpl',
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
function content_686e2eb73e3da7_30908820 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- user-edit -->

<form class="form-horizontal" method="post" enctype="multipart/form-data" role="form"
    action="<?php echo Text::url('settings/users-edit-post');?>
">
    <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div
                class="panel panel-<?php if ($_smarty_tpl->tpl_vars['d']->value['status'] != 'Active') {?>danger<?php } else { ?>primary<?php }?> panel-hovered panel-stacked mb30">
                <div class="panel-heading"><?php echo Lang::T('Profile');?>
</div>
                <div class="panel-body">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                    <center>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['d']->value['photo'];?>
.thumb.jpg" width="200"
                            onerror="this.src='<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;?>
/admin.default.png'" class="img-circle img-responsive" alt="Foto"
                            onclick="return deletePhoto(<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
)">
                    </center><br>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label"><?php echo Lang::T('Photo');?>
</label>
                        <div class="col-md-6 col-xs-8">
                            <input type="file" class="form-control" name="photo" accept="image/*">
                        </div>
                        <div class="form-group col-md-3 col-xs-4" title="Not always Working">
                            <label class=""><input type="checkbox" checked name="faceDetect" value="yes"> Facedetect</label>
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
                        <label class="col-md-3 control-label"><?php echo Lang::T('Phone');?>
</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['phone'];?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Email');?>
</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="city" name="city"
                                placeholder="<?php echo Lang::T('City');?>
" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['city'];?>
">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="subdistrict" name="subdistrict"
                                placeholder="<?php echo Lang::T('Sub District');?>
" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['subdistrict'];?>
">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="ward" name="ward"
                                placeholder="<?php echo Lang::T('Ward');?>
" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['ward'];?>
">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div
                class="panel panel-<?php if ($_smarty_tpl->tpl_vars['d']->value['status'] != 'Active') {?>danger<?php } else { ?>primary<?php }?> panel-hovered panel-stacked mb30">
                <div class="panel-heading"><?php echo Lang::T('Credentials');?>
</div>
                <div class="panel-body">
                    <?php if (($_smarty_tpl->tpl_vars['_admin']->value['id']) != ($_smarty_tpl->tpl_vars['d']->value['id'])) {?>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo Lang::T('Status');?>
</label>
                            <div class="col-md-9">
                                <select name="status" id="status" class="form-control">
                                    <option value="Active" <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] == 'Active') {?>selected="selected" <?php }?>>
                                        <?php echo Lang::T('Active');?>
</option>
                                    <option value="Inactive" <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] == 'Inactive') {?>selected="selected" <?php }?>>
                                        <?php echo Lang::T('Inactive');?>
</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo Lang::T('User Type');?>
</label>
                            <div class="col-md-9">
                                <select name="user_type" id="user_type" class="form-control" onchange="checkUserType(this)">
                                    <?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type'] == 'Agent') {?>
                                        <option value="Sales" <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type'] == 'Sales') {?>selected="selected" <?php }?>>Sales
                                        </option>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type'] == 'Admin' || $_smarty_tpl->tpl_vars['_admin']->value['user_type'] == 'SuperAdmin') {?>
                                        <option value="Report" <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type'] == 'Report') {?>selected="selected" <?php }?>>Report
                                            Viewer</option>
                                        <option value="Agent" <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type'] == 'Agent') {?>selected="selected" <?php }?>>Agent
                                        </option>
                                        <option value="Sales" <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type'] == 'Sales') {?>selected="selected" <?php }?>>Sales
                                        </option>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['_admin']->value['user_type'] == 'SuperAdmin') {?>
                                        <option value="Admin" <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type'] == 'Admin') {?>selected="selected" <?php }?>>
                                            Administrator</option>
                                        <option value="SuperAdmin" <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type'] == 'SuperAdmin') {?>selected="selected"
                                            <?php }?>>Super Administrator</option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type'] != 'Sales') {?>hidden<?php }?>" id="agentChooser">
                            <label class="col-md-3 control-label"><?php echo Lang::T('Agent');?>
</label>
                            <div class="col-md-9">
                                <select name="root" id="root" class="form-control">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['agents']->value, 'agent');
$_smarty_tpl->tpl_vars['agent']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['agent']->value) {
$_smarty_tpl->tpl_vars['agent']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['agent']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['agent']->value['username'];?>
 | <?php echo $_smarty_tpl->tpl_vars['agent']->value['fullname'];?>
 |
                                            <?php echo $_smarty_tpl->tpl_vars['agent']->value['phone'];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                        </div>
                    <?php }?>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Username');?>
</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Password');?>
</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="password" name="password">
                            <span class="help-block"><?php echo Lang::T('Keep Blank to do not change Password');?>
</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo Lang::T('Password');?>
</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="cpassword" name="cpassword"
                                placeholder="<?php echo Lang::T('Confirm Password');?>
">
                            <span class="help-block"><?php echo Lang::T('Keep Blank to do not change Password');?>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group text-center">
        <button class="btn btn-primary" onclick="return ask(this, 'Continue the Admin change process?')"
            type="submit"><?php echo Lang::T('Save Changes');?>
</button>
        Or <a href="<?php echo Text::url('settings/users');?>
"><?php echo Lang::T('Cancel');?>
</a>
    </div>
</form>

<?php echo '<script'; ?>
>
    function checkUserType($field) {
        if ($field.value == 'Sales') {
            $('#agentChooser').removeClass('hidden');
        } else {
            $('#agentChooser').addClass('hidden');
        }
    }

    function deletePhoto(id) {
        if (confirm('Delete photo?')) {
            if (confirm('Are you sure to delete photo?')) {
                window.location.href = '<?php echo Text::url('settings/users-edit/');?>
'+id+'/deletePhoto'
            }
        }
    }
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
