<?php
/* Smarty version 4.5.3, created on 2025-09-09 13:49:22
  from '/var/www/html/myapp/ui/ui/admin/settings/app.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c00632122a75_15003692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '072c284633936ad261600a56dd190457a2812a4b' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/settings/app.tpl',
      1 => 1757414952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68c00632122a75_15003692 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    body {
        background-color: #f5f5dc; /* Cream background */
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 14px;
    }

    .container-simple {
        max-width: 800px;
        margin: 30px auto;
        padding: 0 20px;
    }

    .card-simple {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .header-simple {
        background: #964B00; /* Light brown theme */
        color: white;
        padding: 20px 28px;
        border-bottom: 1px solid #e5e7eb;
    }

    .header-simple h2 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
    }

    .content-simple {
        padding: 24px 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: #786c3b; /* Brown label text */
        font-size: 13px;
    }

    .form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.2s, box-shadow 0.2s;
        background-color: white;
    }

    .form-control:focus {
        outline: none;
        border-color: #964B00; /* Brown focus border */
        box-shadow: 0 0 0 2px rgba(150, 75, 0, 0.1);
    }

    .form-text {
        font-size: 12px;
        color: #786c3b; /* Brown form text */
        margin-top: 4px;
    }

    .footer-simple {
        background-color: #f5f5dc; /* Cream footer background */
        padding: 20px 28px;
        border-top: 1px solid #e5e7eb;
        text-align: right;
    }

    .btn-save {
        background-color: #964B00; /* Brown button */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s;
        min-width: 120px;
    }

    .btn-save:hover {
        background-color: #78493b; /* Darker brown on hover */
    }
</style>

<div class="container-simple">
    <div class="card-simple">
        <div class="header-simple">
            <h2><i class="fa fa-cogs me-2"></i> General Settings</h2>
        </div>

        <div class="content-simple">
            <form method="post" role="form" action="<?php echo Text::url('');?>
settings/app-post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">

                <!-- Hidden fields -->
                <input type="hidden" name="printer_cols" value="<?php if ($_smarty_tpl->tpl_vars['_c']->value['printer_cols']) {
echo $_smarty_tpl->tpl_vars['_c']->value['printer_cols'];
} else { ?>37<?php }?>">
                <input type="hidden" name="note" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['note'];?>
">
                <input type="hidden" name="theme" value="<?php if ($_smarty_tpl->tpl_vars['_c']->value['theme']) {
echo $_smarty_tpl->tpl_vars['_c']->value['theme'];
} else { ?>default<?php }?>">
                <input type="hidden" name="dashboard_cr" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dashboard_cr'];?>
">

                <div class="form-group">
                    <label class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="CompanyName" name="CompanyName"
                           value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
" placeholder="Enter Company Name">
                </div>

                <div class="form-group">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                           value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['phone'];?>
" placeholder="Enter Phone Number">
                </div>

                <div class="form-group">
                    <label class="form-label">Income Reset Date</label>
                    <input type="number" required class="form-control" id="reset_day"
                           name="reset_day" placeholder="20" min="1" max="28" step="1"
                           value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['reset_day'];?>
">
                    <small class="form-text">Income will reset every month on this day.</small>
                </div>

                <div class="footer-simple">
                    <button type="submit" name="general" class="btn-save">
                        <i class="fa fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
