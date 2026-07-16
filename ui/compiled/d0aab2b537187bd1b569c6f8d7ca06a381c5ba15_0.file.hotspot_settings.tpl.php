<?php
/* Smarty version 4.5.3, created on 2025-07-09 11:40:42
  from '/var/www/html/alpha/system/plugin/ui/hotspot_settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_686e2b0a0a7593_13913805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0aab2b537187bd1b569c6f8d7ca06a381c5ba15' => 
    array (
      0 => '/var/www/html/alpha/system/plugin/ui/hotspot_settings.tpl',
      1 => 1749734842,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_686e2b0a0a7593_13913805 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section class="content-header">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="text-success fw-bold display-5 d-flex align-items-center">
            <i class="fa fa-wifi me-3"></i> Hotspot Settings
        </h6>

    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hotspot Settings</li>
        </ol>
        <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/download.php?download=1" class="btn btn-lg btn-info shadow">
            <i class="fa fa-download"></i> Download Login Page
        </a>
    </nav>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">

                <div class="show" id="settingsForm">
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label"><i class="fa fa-header"></i> Hotspot Page Title</label>
                                <input type="text" class="form-control" name="hotspot_title" value="<?php echo $_smarty_tpl->tpl_vars['hotspot_title']->value;?>
"
                                    required placeholder="Hotspot Page Title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fa fa-info-circle"></i> Description /
                                    Tagline</label>
                                <input type="text" class="form-control" name="description" value="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"
                                    required placeholder="Description / Tagline">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fa fa-wifi"></i> Router</label>
                                <select class="form-control" name="router_id">
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
                            <div class="mb-3">
                                <label class="form-label"><i class="fa fa-info"></i> Hotspot Card Auto/ Manual
                                    Display</label>
                                <select class="form-control" name="auto_manual_display">
                                    <option value="auto" <?php if ($_smarty_tpl->tpl_vars['selected_auto_manual_display']->value == 'auto') {?>selected<?php }?>>Auto
                                    </option>
                                    <option value="manual" <?php if ($_smarty_tpl->tpl_vars['selected_auto_manual_display']->value == 'manual') {?>selected<?php }?>>
                                        Manual</option>
                                </select>
                            </div>
                            <br>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0"><i class="fa fa-info-circle"></i> Usage Instructions</h3>
                </div>
                <div class="card-body">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Click "Save Changes" twice for quick upload.</li>
                        <li class="list-group-item">Customize and personalize your settings.</li>
                        <li class="list-group-item">Download the <code>login.html</code> file.</li>
                        <li class="list-group-item">Upload <code>login.html</code> to your MikroTik router.</li>
                        <li class="list-group-item">Ensure the file is named <strong>login.html</strong>.</li>
                        <li class="list-group-item">Add your website URL to the MikroTik walled garden.</li>
                        <div class="relative">
                            <pre id="scriptContent"
                                class="w-full p-3 border rounded-md text-sm bg-gray-50 overflow-auto">
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
                        </div>

                        <button onclick="copyToClipboard()" class="btn btn-primary mt-4">
                            <i class="fa fa-copy"></i> Copy Script
                        </button>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

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
        }).catch(err => {
            console.error("Failed to copy: ", err);
        });
    }
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
