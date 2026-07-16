<?php
/* Smarty version 4.5.3, created on 2026-06-29 09:18:15
  from '/var/www/html/dev/system/plugin/ui/mikrotik_ipbinding.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a420e272c1ea1_22763476',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccfadb7aa306fe50ec90995d37017bcad41d4498' => 
    array (
      0 => '/var/www/html/dev/system/plugin/ui/mikrotik_ipbinding.tpl',
      1 => 1758211026,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a420e272c1ea1_22763476 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/dev/system/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
.section-title {
    margin: 20px 0;
    text-align: left;
}
.section-title h2 {
    font-size: 26px;
    font-weight: bold;
    margin: 0;
    color: #0f6d42;
}
.section-title p {
    margin: 5px 0 0;
    color: #555;
    font-size: 16px;
}

.binding-card {
    border-radius: 14px;
    box-shadow: 0 6px 16px rgba(0,0,0,0.05);
    padding: 25px;
    background: #fff;
    transition: transform 0.2s ease;
}
.binding-card:hover { transform: translateY(-2px); }

.form-group label.h5 {
    font-size: 18px;
    font-weight: 600;
    color: #0f6d42;
}

.form-group p.text-muted {
    margin-bottom: 6px;
    font-size: 14px;
}

body { background: #f9fafb; }
</style>

<div class="section-title">
    <h2><i class="fas fa-link"></i> <?php echo Lang::T('Mikrotik IP Binding');?>
</h2>
    <p><?php echo Lang::T('Manage Hotspot IP/MAC bindings (bypass, block, allow)');?>
</p>
</div>

<div class="binding-card">
  <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_ipbinding_add">
    <input type="hidden" name="router" value="<?php echo $_smarty_tpl->tpl_vars['router']->value;?>
">

    <div class="row">
      <!-- Left Column -->
      <div class="col-md-6">
        <!-- Router Selector -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-network-wired"></i> <?php echo Lang::T('Select Router');?>
</label>
          <p class="text-muted"><?php echo Lang::T('Choose the router you want to manage IP bindings for.');?>
</p>
          <select id="router" class="form-control" onchange="location.href='<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/mikrotik_ipbinding_ui/' + this.value;">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['routers']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['r']->value['id'] == $_smarty_tpl->tpl_vars['router']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </select>
        </div>

        <!-- IP Address -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-network-wired"></i> <?php echo Lang::T('IP Address');?>
</label>
          <p class="text-muted"><?php echo Lang::T('Automatically assigned by the system.');?>
</p>
          <input type="text" name="ip" value="Auto-generated" class="form-control" readonly>
        </div>

        <!-- MAC Address -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-microchip"></i> <?php echo Lang::T('MAC Address');?>
</label>
          <p class="text-muted"><?php echo Lang::T('Enter the unique MAC address of the device (e.g. AA:BB:CC:DD:EE:FF).');?>
</p>
          <input type="text" name="mac" placeholder="00:11:22:33:44:55" class="form-control" required>
        </div>

        <!-- Device Name -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-desktop"></i> <?php echo Lang::T('Device Name');?>
</label>
          <p class="text-muted"><?php echo Lang::T('Optional: Assign a friendly name for easy identification.');?>
</p>
          <input type="text" name="device_name" placeholder="Tv" class="form-control">
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">
        <!-- Binding Type -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-toggle-on"></i> <?php echo Lang::T('Binding Type');?>
</label>
          <p class="text-muted"><?php echo Lang::T('Choose how this device should be handled by the Hotspot.');?>
</p>
          <select name="type" class="form-control">
            <option value="regular"><?php echo Lang::T('Regular');?>
</option>
            <option value="bypassed"><?php echo Lang::T('Bypassed');?>
</option>
            <option value="blocked"><?php echo Lang::T('Blocked');?>
</option>
          </select>
        </div>

        <!-- Comment -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-comment-alt"></i> <?php echo Lang::T('Comment');?>
</label>
          <p class="text-muted"><?php echo Lang::T('Optional: Add notes about this binding for reference.');?>
</p>
          <input type="text" name="comment" placeholder="Office PC - Reception" class="form-control">
        </div>

        <!-- Package Selection -->
        <div class="form-group mb-4">
          <label class="h5"><i class="fas fa-box"></i> <?php echo Lang::T('Assign Package');?>
</label>
          <p class="text-muted"><?php echo Lang::T('Select a package plan to apply to this binding.');?>
</p>
          <select name="package" class="form-control" required>
            <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['packages']->value) > 0) {?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['packages']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['name_plan'];?>
 (<?php echo $_smarty_tpl->tpl_vars['p']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['validity_unit'];?>
)</option>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
              <option value=""><?php echo Lang::T('No Packages Available');?>
</option>
            <?php }?>
          </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">
          <i class="fas fa-plus-circle"></i> <?php echo Lang::T('Add Binding');?>

        </button>
      </div>
    </div>
  </form>
</div>
<!-- Add this script before </body> -->
<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const addButton = form.querySelector('button[type="submit"]');
    const macInput = form.querySelector('input[name="mac"]');
    const packageSelect = form.querySelector('select[name="package"]');

    // Initially disable the button
    addButton.disabled = true;

    // Function to check if required fields are filled
    function checkFields() {
        if (macInput.value.trim() !== '' && packageSelect.value.trim() !== '') {
            addButton.disabled = false;
        } else {
            addButton.disabled = true;
        }
    }

    // Listen for input changes
    macInput.addEventListener('input', checkFields);
    packageSelect.addEventListener('change', checkFields);

    // Show confirmation before submitting
    form.addEventListener('submit', function(e) {
        const confirmed = confirm('Are you sure you want to add this binding?');
        if (!confirmed) {
            e.preventDefault(); // Stop form submission if not confirmed
        }
    });
});
<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
