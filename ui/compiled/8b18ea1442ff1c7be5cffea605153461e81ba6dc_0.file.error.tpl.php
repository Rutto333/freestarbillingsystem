<?php
/* Smarty version 4.5.3, created on 2025-07-14 16:03:12
  from '/var/www/html/alpha/ui/ui/admin/error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6875001038c6b5_02700963',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b18ea1442ff1c7be5cffea605153461e81ba6dc' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/error.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6875001038c6b5_02700963 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Error - PHPNuxBill</title>
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
                        <section class="content-header">
                            <h1 class="text-center">
                                <?php echo $_smarty_tpl->tpl_vars['error_title']->value;?>

                            </h1>
                        </section>
                        <div class="box-body" style="font-size: larger;">
                            <center>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/images/error.png" class="img-responsive hidden-sm hidden-xs"></center>
                            <br>
                            <?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>

                            <br>
                            Mikrotik troubleshooting: <br>
                            <ul>
                                <li><?php echo Lang::T('Make sure you use API Port, Default 8728');?>
</li>
                                <li><?php echo Lang::T('Make sure Username and Password are correct');?>
</li>
                                <li><?php echo Lang::T('Make sure your hosting not blocking port to external');?>
</li>
                                <li><?php echo Lang::T('Make sure your Mikrotik accessible from PHPNuxBill');?>
</li>
                            </ul>
                            <?php echo Lang::T('If you just update PHPNuxBill from upload files, try click Update');?>
 Database
                        </div>
                        <div class="box-footer">
                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                <a href="./update.php?step=4" style="color: black;" class="btn btn-info btn-sm btn-block"><?php echo Lang::T('Update');?>
 Database</a>
                                <a href="<?php echo Text::url('community#update');?>
" style="color: black;" class="btn btn-success btn-sm btn-block"><?php echo Lang::T('Update PHPNuxBill');?>
</a>
                            </div>
                            <br>
                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <a href="https://github.com/hotspotbilling/phpnuxbill/discussions" target="_blank"
                            class="btn btn-success btn-sm btn-block" style="color: black;"><?php echo Lang::T('Ask Github Community');?>
</a>
                                <a href="https://t.me/phpnuxbill" target="_blank"
                                    class="btn btn-primary btn-sm btn-block"><?php echo Lang::T('Ask Telegram Community');?>
</a>
                            </div>
                            <br><br>
                            <a href="javascript::history.back()" onclick="history.back()"
                                class="btn btn-warning btn-block"><?php echo Lang::T('Back');?>
</a>
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
