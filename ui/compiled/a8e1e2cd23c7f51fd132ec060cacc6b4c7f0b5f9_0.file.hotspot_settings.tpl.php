<?php
/* Smarty version 4.5.3, created on 2025-09-16 13:10:46
  from '/var/www/html/myapp/system/plugin/ui/hotspot_settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c937a6c328b5_54393138',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8e1e2cd23c7f51fd132ec060cacc6b4c7f0b5f9' => 
    array (
      0 => '/var/www/html/myapp/system/plugin/ui/hotspot_settings.tpl',
      1 => 1758017437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68c937a6c328b5_54393138 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@11"><?php echo '</script'; ?>
>

<style>
    body {
        background-color: #f5f5dc;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 14px;
    }
    .container-simple {
        max-width: 900px;
        margin: 30px auto;
        padding: 0 20px;
    }
    .card-simple {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 30px;
    }
    .header-simple {
        background: #964B00;
        color: white;
        padding: 20px 28px;
        border-bottom: 1px solid #e5e7eb;
    }
    .header-simple h2 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
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
        color: #786c3b;
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
        border-color: #964B00;
        box-shadow: 0 0 0 2px rgba(150, 75, 0, 0.1);
    }
    .footer-simple {
        background-color: #f5f5dc;
        padding: 20px 28px;
        border-top: 1px solid #e5e7eb;
        text-align: right;
    }
    .btn-save {
        background-color: #964B00;
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
        background-color: #78493b;
    }
    .walled-garden-content {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        padding: 15px;
        font-size: 13px;
        overflow-x: auto;
        margin-top: 10px;
    }
    .walled-garden-content pre {
        background: transparent;
        border: none;
        padding: 0;
        margin: 0;
    }
    .btn-copy {
        background-color: #786c3b;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.2s;
    }
    .custom-nav {
        background-color: #FFFFFF;
        padding: 10px;
        border-radius: 6px;
        margin-top: 10px;
        text-align: center;
    }
    .btn-copy:hover {
        background-color: #964B00;
    }
</style>

<div class="container-simple">
    <!-- Hotspot Settings -->
    <div class="card-simple">
        <div class="header-simple">
            <h2><i class="fa fa-wifi"></i> Hotspot Settings</h2>
        </div>
        <div class="content-simple">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label"><i class="fa fa-header"></i> Hotspot Page Title</label>
                    <input type="text" class="form-control" name="hotspot_title" value="<?php echo $_smarty_tpl->tpl_vars['hotspot_title']->value;?>
"
                           required placeholder="Hotspot Page Title">
                </div>
                <div class="form-group">
                    <label class="form-label"><i class="fa fa-server"></i> Router</label>
                    <select class="form-control select2" name="router_id">
                        <option value="">Select a router</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['routers']->value, 'router');
$_smarty_tpl->tpl_vars['router']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['router']->value) {
$_smarty_tpl->tpl_vars['router']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['router']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['router']->value['id'] == $_smarty_tpl->tpl_vars['selected_router_id']->value) {?>selected<?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['router']->value['name'];?>

                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
                <button type="submit" class="btn-save">
                    <i class="fa fa-save"></i> Save Changes
                </button>
                <br>
                <aside class="custom-nav">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/download.php?download=1" class="btn btn-lg btn-info shadow">
                        <i class="fa fa-download"></i> Download Login Page
                    </a>
                </aside>
            </form>
        </div>
    </div>

    <!-- Usage Instructions -->
    <div class="card-simple">
        <div class="header-simple">
            <h2><i class="fa fa-info-circle"></i> Add website URL to the MikroTik walled garden</h2>
        </div>
        <div class="content-simple">
            <div class="walled-garden-content">
                <pre id="scriptContent">
/ip hotspot walled-garden
add dst-host=jsdelivr.com
add dst-host=cdn.tailwindcss.com
add dst-host=cdnjs.cloudflare.com
add dst-host=cdn.jsdelivr.net
add dst-host=sweetalert2.github.io
add dst-host=jsdelivr.com
add dst-host=www.jsdelivr.com
add dst-host=ajax.googleapis.com
add dst-host=sweetalert2.github.io
add dst-host=fonts.googleapis.com
add dst-host=fonts.gstatic.com
add dst-host=unpkg.com
add dst-host=kit.fontawesome.com
add dst-host=code.jquery.com
add dst-host=<?php echo $_smarty_tpl->tpl_vars['_domain']->value;?>

add dst-host=*.<?php echo $_smarty_tpl->tpl_vars['_domain']->value;?>

                </pre>
                <button onclick="copyToClipboard()" class="btn-copy">
                    <i class="fa fa-copy"></i> Copy Script
                </button>
            </div>
            <br>
            <br>


            <p class="mt-4">Also consider adding the following domains to the walled garden:</p>
            <div class="walled-garden-content">
                <pre id="scriptContent_2">
/ip hotspot walled-garden ip add action=accept dst-host="<?php echo $_smarty_tpl->tpl_vars['_domain']->value;?>
"
/ip hotspot walled-garden ip add action=accept dst-host="<?php echo $_smarty_tpl->tpl_vars['main_domain']->value;?>
"
/ip hotspot walled-garden ip add action=accept dst-host="code.jquery.com"
/ip hotspot walled-garden ip add action=accept dst-host="cdn.jsdelivr.net"
/ip hotspot walled-garden ip add action=accept dst-host="cdnjs.cloudflare.com"
/ip hotspot walled-garden ip add action=accept dst-host="fonts.googleapis.com"
/ip hotspot walled-garden ip add action=accept dst-host="cdn.tailwindcss.com"
/ip hotspot walled-garden ip add action=accept dst-host="*.<?php echo $_smarty_tpl->tpl_vars['main_domain']->value;?>
"
/ip hotspot walled-garden ip add action=accept dst-host="ajax.googleapis.com"
                </pre>
                <button onclick="copyToClipboardSecond()" class="btn-copy">
                    <i class="fa fa-copy"></i> Copy Script
                </button>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
    function copyToClipboard() {
        const scriptContent = document.getElementById("scriptContent").innerText;
        navigator.clipboard.writeText(scriptContent).then(() => {
            Swal.fire({
                icon: "success",
                title: "Copied!",
                text: "Walled garden script copied to clipboard!",
                timer: 2000,
                showConfirmButton: false
            });
        }).catch(err => console.error("Failed to copy: ", err));
    }

    function copyToClipboardSecond() {
        const scriptContent = document.getElementById("scriptContent_2").innerText;
        navigator.clipboard.writeText(scriptContent).then(() => {
            Swal.fire({
                icon: "success",
                title: "Copied!",
                text: "Walled garden script copied to clipboard!",
                timer: 2000,
                showConfirmButton: false
            });
        }).catch(err => console.error("Failed to copy: ", err));
    }
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
