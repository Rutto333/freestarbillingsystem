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
    <h2><i class="fas fa-link"></i> {Lang::T('Edit Mikrotik IP Binding')}</h2>
    <p>{Lang::T('Update this Hotspot IP/MAC binding (bypass, block, allow)')}</p>
</div>

<div class="binding-card">
  <form method="post" action="{$_url}plugin/mikrotik_ipbinding_update">
    <input type="hidden" name="id" value="{$binding.id}">
    <input type="hidden" name="router" value="{$router}">

    <div class="row">
      <!-- Left Column: read-only summary of the binding -->
      <div class="col-md-6">
        <!-- Router -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-network-wired"></i> {Lang::T('Router')}</label>
          <p class="text-muted">{Lang::T('Router this binding belongs to.')}</p>
          <input type="text" value="{$selectedRouter.name}" class="form-control" readonly>
        </div>

        <!-- IP Address -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-network-wired"></i> {Lang::T('IP Address')}</label>
          <p class="text-muted">{Lang::T('Assigned by the system.')}</p>
          <input type="text" value="{$binding.ip_address}" class="form-control" readonly>
        </div>

        <!-- MAC Address -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-microchip"></i> {Lang::T('MAC Address')}</label>
          <p class="text-muted">{Lang::T('Not editable for now.')}</p>
          <input type="text" value="{$binding.mac_address}" class="form-control" readonly>
        </div>

        <!-- Device Name -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-desktop"></i> {Lang::T('Device Name')}</label>
          <p class="text-muted">{Lang::T('Not editable for now.')}</p>
          <input type="text" value="{$binding.device_name}" class="form-control" readonly>
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">
        <!-- Binding Type -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-toggle-on"></i> {Lang::T('Binding Type')}</label>
          <p class="text-muted">{Lang::T('Not editable for now.')}</p>
          <input type="text" value="{if $binding.type=='bypassed'}{Lang::T('Bypassed')}{elseif $binding.type=='blocked'}{Lang::T('Blocked')}{else}{Lang::T('Regular')}{/if}" class="form-control" readonly>
        </div>

        <!-- Comment -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-comment-alt"></i> {Lang::T('Comment')}</label>
          <p class="text-muted">{Lang::T('Not editable for now.')}</p>
          <input type="text" value="{$binding.comment}" class="form-control" readonly>
        </div>

        <!-- Package -->
        <div class="form-group mb-3">
          <label class="h5"><i class="fas fa-box"></i> {Lang::T('Package')}</label>
          <p class="text-muted">{Lang::T('Not editable for now.')}</p>
          <input type="text" value="{$binding.package_name}" class="form-control" readonly>
        </div>

        <!-- Expiry (the only editable field for now) -->
        <div class="form-group mb-4">
          <label class="h5"><i class="fas fa-calendar-alt"></i> {Lang::T('Expiry Date')}</label>
          <p class="text-muted">{Lang::T('Extend or change when this binding expires.')}</p>
          <input type="date" name="expiry" value="{$binding.expiry|date_format:'%Y-%m-%d'}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">
          <i class="fas fa-save"></i> {Lang::T('Save Changes')}
        </button>
      </div>
    </div>
  </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const saveButton = form.querySelector('button[type="submit"]');
    const expiryInput = form.querySelector('input[name="expiry"]');

    function checkFields() {
        saveButton.disabled = expiryInput.value.trim() === '';
    }

    expiryInput.addEventListener('input', checkFields);
    checkFields(); // run once on load since the field is pre-filled

    form.addEventListener('submit', function(e) {
        const confirmed = confirm('Are you sure you want to update ?');
        if (!confirmed) {
            e.preventDefault();
        }
    });
});
</script>

{include file="sections/footer.tpl"}
