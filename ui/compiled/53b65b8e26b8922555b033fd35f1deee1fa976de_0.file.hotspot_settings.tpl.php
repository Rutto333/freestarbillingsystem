<?php
/* Smarty version 4.5.3, created on 2025-09-25 10:03:24
  from '/var/www/html/demo/system/plugin/ui/hotspot_settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68d4e93ce6c328_64189471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53b65b8e26b8922555b033fd35f1deee1fa976de' => 
    array (
      0 => '/var/www/html/demo/system/plugin/ui/hotspot_settings.tpl',
      1 => 1758783797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68d4e93ce6c328_64189471 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@11"><?php echo '</script'; ?>
>

<style>
:root {
    --primary-color: #000000;
    --background-color: #FFFFFF;
    --text-color: #000000;
    --border-color: #e5e7eb;
    --button-color: #1A73E8;
    --button-hover-color: #1557B0;
}

body {
    background-color: var(--background-color);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-size: 14px;
    color: var(--text-color);
}

.card-simple {
    background: var(--background-color);
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 30px;
    border: 1px solid var(--border-color);
}

.header-simple {
    background: #1A73E8; /* Blue background color */
    color: #FFFFFF; /* White text color */
    padding: 20px 28px;
    border-bottom: 1px solid var(--border-color);
}

.header-simple h2 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn-save {
    background-color: var(--button-color);
    color: var(--background-color);
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s;
    min-width: 120px;
}

.btn-purple {
    background-color: #7A288A; /* Purple color */
    border-color: #7A288A;
    color: #FFFFFF;
}

.btn-purple:hover {
    background-color: #5C1A66; /* Darker purple on hover */
    border-color: #5C1A66;
}

.btn-save:hover {
    background-color: var(--button-hover-color);
}

.btn-copy {
    background-color: var(--button-color);
    color: var(--background-color);
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.2s;
}

.btn-copy:hover {
    background-color: var(--button-hover-color);
}

.form-control {
    border: 1px solid var(--border-color);
}

.form-control:focus {
    outline: none;
    border-color: var(--button-color);
    box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
}

</style>

<div class="container-simple">
    <!-- Hotspot Settings -->
    <div class="card-simple">
        <div class="header-simple">
            <h2><i class="fa fa-wifi"></i> Download Login Page</h2>
        </div>
        <div class="content-simple">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Page Title</label>
                    <input type="text" class="form-control" name="hotspot_title" value="<?php echo $_smarty_tpl->tpl_vars['hotspot_title']->value;?>
"
                           required placeholder="Hotspot Page Title">
                </div>
                <div class="form-group">
                    <label class="form-label">Router</label>
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
                <br>
                <aside class="custom-nav">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/download.php?download=1" class="btn btn-lg btn-purple shadow">
                        <i class="fa fa-download"></i> Download Page
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
