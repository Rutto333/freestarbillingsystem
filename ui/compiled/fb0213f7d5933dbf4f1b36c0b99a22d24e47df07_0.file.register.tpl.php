<?php
/* Smarty version 4.5.3, created on 2025-07-23 14:50:08
  from '/var/www/html/alpha/ui/ui/customer/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6880cc70b2d8f0_89432155',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb0213f7d5933dbf4f1b36c0b99a22d24e47df07' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/customer/register.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header-public.tpl' => 1,
    'file:customer/footer-public.tpl' => 1,
  ),
),false)) {
function content_6880cc70b2d8f0_89432155 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header-public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="hidden-xs" style="height:100px"></div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><?php echo Lang::T('Registration Info');?>
</div>
            <div class="panel-body">
                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['_path']->value)."/../pages/Registration_Info.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            </div>
        </div>
    </div>
    <form enctype="multipart/form-data" action="<?php echo Text::url('register/post');?>
" method="post">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">1. <?php echo Lang::T('Register as Member');?>
</div>
                <div class="panel-body">
                    <div class="form-container">
                        <div class="form-group">
                            <label>
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['registration_username'] == 'phone') {?>
                                    <?php echo Lang::T('Phone Number');?>

                                <?php } elseif ($_smarty_tpl->tpl_vars['_c']->value['registration_username'] == 'email') {?>
                                    <?php echo Lang::T('Email');?>

                                <?php } else { ?>
                                    <?php echo Lang::T('Usernames');?>

                                <?php }?>
                            </label>
                            <div class="input-group">
                                <?php if ($_smarty_tpl->tpl_vars['_c']->value['registration_username'] == 'phone') {?>
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-phone-alt"></i></span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['_c']->value['registration_username'] == 'email') {?>
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-envelope"></i></span>
                                <?php } else { ?>
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="glyphicon glyphicon-user"></i></span>
                                <?php }?>
                                <input type="text" class="form-control" name="username"
                                    placeholder="<?php if ($_smarty_tpl->tpl_vars['_c']->value['country_code_phone'] != '' || $_smarty_tpl->tpl_vars['_c']->value['registration_username'] == 'phone') {
echo $_smarty_tpl->tpl_vars['_c']->value['country_code_phone'];?>
 <?php echo Lang::T('Phone Number');
} elseif ($_smarty_tpl->tpl_vars['_c']->value['registration_username'] == 'email') {
echo Lang::T('Email');
} else {
echo Lang::T('Usernames');
}?>">
                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['_c']->value['photo_register'] == 'yes') {?>
                            <div class="form-group">
                                <label><?php echo Lang::T('Photo');?>
</label>
                                <input type="file" required class="form-control" id="photo" name="photo" accept="image/*">
                            </div>
                        <?php }?>
                        <div class="form-group">
                            <label><?php echo Lang::T('Full Name');?>
</label>
                            <input type="text" <?php if ($_smarty_tpl->tpl_vars['_c']->value['man_fields_fname'] != 'no') {?>required<?php }?> class="form-control"
                                id="fullname" value="<?php echo $_smarty_tpl->tpl_vars['fullname']->value;?>
" name="fullname">
                        </div>
                        <div class="form-group">
                            <label><?php echo Lang::T('Email');?>
</label>
                            <input type="text" <?php if ($_smarty_tpl->tpl_vars['_c']->value['man_fields_email'] != 'no') {?>required<?php }?> class="form-control"
                                id="email" placeholder="xxxxxxx@xxxx.xx" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" name="email">
                        </div>
                        <div class="form-group">
                            <label><?php echo Lang::T('Home Address');?>
</label>
                            <input type="text" <?php if ($_smarty_tpl->tpl_vars['_c']->value['man_fields_address'] != 'no') {?>required<?php }?> name="address"
                                id="address" value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
" class="form-control">
                        </div>
                        <?php echo $_smarty_tpl->tpl_vars['customFields']->value;?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">2. <?php echo Lang::T('Password');?>
</div>
                <div class="panel-body">
                    <div class="form-container">
                        <div class="form-group">
                            <label><?php echo Lang::T('Password');?>
</label>
                            <input type="password" required class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label><?php echo Lang::T('Confirm Password');?>
</label>
                            <input type="password" required class="form-control" id="cpassword" name="cpassword">
                        </div>
                        <br>
                        <div class="btn-group btn-group-justified mb15">
                            <div class="btn-group">
                                <a href="<?php echo Text::url('login');?>
" class="btn btn-warning"><?php echo Lang::T('Cancel');?>
</a>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-success" type="submit"><?php echo Lang::T('Register');?>
</button>
                            </div>
                        </div>
                        <br>
                        <center>
                            <a href="javascript:showPrivacy()">Privacy</a>
                            &bull;
                            <a href="javascript:showTaC()">T &amp; C</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:customer/footer-public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
