<?php
/* Smarty version 4.5.3, created on 2025-08-29 17:22:53
  from '/var/www/html/example/ui/ui/customer/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68b1b7bd73bed8_04010283',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76d701b2a3f333c5f687ccd024afe5195a0dc372' => 
    array (
      0 => '/var/www/html/example/ui/ui/customer/login.tpl',
      1 => 1756477351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header-public.tpl' => 1,
    'file:customer/footer-public.tpl' => 1,
  ),
),false)) {
function content_68b1b7bd73bed8_04010283 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header-public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
:root {
    /* Primary warm brown/coffee palette */
    --primary-brown: #8B4513;
    --light-brown: #D2B48C;
    --warm-brown: #A0522D;
    --dark-brown: #654321;
    --coffee: #6F4E37;
    --coffee-light: #8B6F47;
    --coffee-dark: #5A3A2A;
    --mocha: #C09853;
    --espresso: #4A3728;
    --cappuccino: #B8860B;
    --latte: #DEB887;
    --cream: #F5E6D3;
    --beige: #F5F5DC;
    --amber: #D4AF37;
}

/* Panel styling */
.panel-primary {
    border-color: var(--primary-brown);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
}

.panel-primary > .panel-heading {
    background: linear-gradient(135deg, var(--primary-brown) 0%, var(--warm-brown) 100%);
    color: white;
    font-weight: 600;
    font-size: 18px;
    text-align: center;
    padding: 15px;
}

.panel-body {
    padding: 25px;
    background: #fff;
}

/* Input groups */
.input-group-addon {
    background: var(--primary-brown);
    color: white;
    border: none;
    border-radius: 6px 0 0 6px;
}

.form-control {
    border: 2px solid var(--light-brown);
    border-left: none;
    border-radius: 0 6px 6px 0;
    font-size: 15px;
    color: var(--coffee-dark);
    padding: 12px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--primary-brown);
    box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.2);
    outline: none;
}

/* Buttons */
.btn-primary {
    background: linear-gradient(135deg, var(--primary-brown) 0%, var(--warm-brown) 100%);
    border: none;
    font-weight: 600;
    padding: 12px 20px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(139, 69, 19, 0.25);
    color: #fff;
}

/* Modal */
.modal-content {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 12px 40px rgba(0,0,0,0.15);
}

.modal-header {
    background: linear-gradient(135deg, var(--primary-brown) 0%, var(--warm-brown) 100%);
    color: white;
}

.modal-footer {
    border-top: 1px solid var(--light-brown);
}
</style>

<div class="hidden-xs" style="height:100px"></div>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo Lang::T('Log in to Member Panel');?>
</div>
                <div class="panel-body">
                    <form action="<?php echo Text::url('login/post');?>
" method="post">
                        <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">

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
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['_c']->value['registration_username'] == 'email') {?>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <?php } else { ?>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <?php }?>
                                <input type="text" class="form-control" name="username"
                                    placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <label><?php echo Lang::T('Password');?>
</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" name="password"
                                    placeholder="<?php echo Lang::T('Password');?>
">
                            </div>
                        </div>

                        <div class="btn-group btn-group-justified mb15">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary"><?php echo Lang::T('Login');?>
</button>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="HTMLModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="HTMLModal_konten"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:customer/footer-public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
