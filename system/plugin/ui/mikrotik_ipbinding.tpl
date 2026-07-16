{include file="sections/header.tpl"}

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
    <h2><i class="fas fa-link"></i> {Lang::T('Mikrotik IP Binding')}</h2>
    <p>{Lang::T('Manage Hotspot IP/MAC bindings (bypass, block, allow)')}</p>
</div>

<div class="binding-card">
  <form method="post" action="{$_url}plugin/mikrotik_ipbinding_add">
    <input type="hidden" name="router" value="{$router}">

    <div class="row">
      <!-- Left Column -->
      <div class="col-md-6">
        <!-- Router Selector -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-network-wired"></i> {Lang::T('Select Router')}</label>
          <p class="text-muted">{Lang::T('Choose the router you want to manage IP bindings for.')}</p>
          <select id="router" class="form-control" onchange="location.href='{$_url}plugin/mikrotik_ipbinding_ui/' + this.value;">
            {foreach $routers as $r}
              <option value="{$r.id}" {if $r.id==$router}selected{/if}>{$r.name}</option>
            {/foreach}
          </select>
        </div>

        <!-- IP Address -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-network-wired"></i> {Lang::T('IP Address')}</label>
          <p class="text-muted">{Lang::T('Automatically assigned by the system.')}</p>
          <input type="text" name="ip" value="Auto-generated" class="form-control" readonly>
        </div>

        <!-- MAC Address -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-microchip"></i> {Lang::T('MAC Address')}</label>
          <p class="text-muted">{Lang::T('Enter the unique MAC address of the device (e.g. AA:BB:CC:DD:EE:FF).')}</p>
          <input type="text" name="mac" placeholder="00:11:22:33:44:55" class="form-control" required>
        </div>

        <!-- Device Name -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-desktop"></i> {Lang::T('Device Name')}</label>
          <p class="text-muted">{Lang::T('Optional: Assign a friendly name for easy identification.')}</p>
          <input type="text" name="device_name" placeholder="Tv" class="form-control">
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">
        <!-- Binding Type -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-toggle-on"></i> {Lang::T('Binding Type')}</label>
          <p class="text-muted">{Lang::T('Choose how this device should be handled by the Hotspot.')}</p>
          <select name="type" class="form-control">
            <option value="regular">{Lang::T('Regular')}</option>
            <option value="bypassed">{Lang::T('Bypassed')}</option>
            <option value="blocked">{Lang::T('Blocked')}</option>
          </select>
        </div>

        <!-- Comment -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-comment-alt"></i> {Lang::T('Comment')}</label>
          <p class="text-muted">{Lang::T('Optional: Add notes about this binding for reference.')}</p>
          <input type="text" name="comment" placeholder="Office PC - Reception" class="form-control">
        </div>

        <!-- Package Selection -->
        <div class="form-group mb-4">
          <label class="h5"><i class="fas fa-box"></i> {Lang::T('Assign Package')}</label>
          <p class="text-muted">{Lang::T('Select a package plan to apply to this binding.')}</p>
          <select name="package" class="form-control" required>
            {if $packages|@count > 0}
              {foreach $packages as $p}
                <option value="{$p.id}">{$p.name_plan} ({$p.validity} {$p.validity_unit})</option>
              {/foreach}
            {else}
              <option value="">{Lang::T('No Packages Available')}</option>
            {/if}
          </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">
          <i class="fas fa-plus-circle"></i> {Lang::T('Add Binding')}
        </button>
      </div>
    </div>
  </form>
</div>
<!-- Add this script before </body> -->
<script>
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
</script>


{include file="sections/footer.tpl"}
