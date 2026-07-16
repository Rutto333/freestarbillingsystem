<?php
/* Smarty version 4.5.3, created on 2025-08-27 09:14:44
  from '/var/www/html/example/ui/ui/admin/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68aea254ee8568_10844508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '147b75d548169c4d70bba1b36beac9a2ca2808d3' => 
    array (
      0 => '/var/www/html/example/ui/ui/admin/404.tpl',
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
function content_68aea254ee8568_10844508 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
.err-container {
    text-align: center;
    padding: 50px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.m404 {
    font-size: 100px;
    color: #ff6b6b;
}

.error-message {
    font-size: 20px;
    color: #333333;
    margin: 20px 0;
}

.error-btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 18px;
    color: #ffffff;
    background-color: #007bff;
    border-radius: 5px;
    text-decoration: none;
}

.error-btn:hover {
    background-color: #0056b3;
}
</style>

<div class="page page-err clearfix">
    <div class="err-container">
        <h1 class="m404 mb0">404 <a href="<?php echo Text::url('dashboard');?>
" class="ion ion-forward" title="go to dashboard"></a></h1>
        <p class="error-message"><?php echo Lang::T("Oops! The page you are looking for was not found");?>
.</p>
        <a href="<?php echo Text::url('dashboard');?>
" class="btn btn-primary error-btn"><?php echo Lang::T("Back to Dashboard");?>
</a>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
