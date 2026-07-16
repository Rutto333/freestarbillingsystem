<?php
/* Smarty version 4.5.3, created on 2025-10-23 09:17:19
  from '/var/www/html/dev/ui/ui/admin/error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68f9c86fb45018_07247607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd52951025d2592aab093bf18be668bb1c3483133' => 
    array (
      0 => '/var/www/html/dev/ui/ui/admin/error.tpl',
      1 => 1761200067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68f9c86fb45018_07247607 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>SYSTEM - ERROR </title>
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/images/logo.png" type="image/x-icon" />

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/fonts/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/modern-AdminLTE.min.css">

    <style>
        ::-moz-selection {
            /* Code for Firefox */
            color: red;
            background: yellow;
        }

        ::selection {
            color: red;
            background: yellow;
        }
    </style>

</head>

<body class="hold-transition skin-blue">
    <div class="container">

        <section class="content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box box-danger box-solid">
                        <div class="box-body" style="font-size: larger;">
                            <center>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/images/error.png" class="img-responsive hidden-sm hidden-xs"></center>
                            <br>
                            <?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/images/error.png" class="img-responsive hidden-md hidden-lg">
                </div>
            </div>
        </section>
    </div>
</body>

</html>
<?php }
}
