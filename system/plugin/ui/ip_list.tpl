{include file="sections/header.tpl"}

<style>
/* Dashboard Header */
.dashboard-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #fff;
    padding: 20px 25px;
    border-radius: 12px;
    box-shadow: 0 6px 16px rgba(0,0,0,0.05);
    margin-bottom: 20px;
}
.expired-row {
    background-color: #fdecea !important;
}
.expired-row td {
    color: #842029;
}
.dashboard-card h4 { margin: 0; font-size: 22px; font-weight: 700; color: #0f6d42; }
.dashboard-card small { color: #555; font-size: 14px; }
.btn-back {
    background: #0f6d42; color: #fff; border-radius: 8px; padding: 8px 12px;
    text-decoration: none; font-weight: 500; display: inline-flex; align-items: center;
    transition: background 0.3s ease;
}
.btn-back:hover { background: #0c5433; color: #fff; }
.btn-back i { margin-right: 5px; }

/* Summary Cards */
.card.text-bg-primary { background-color: #0d6efd !important; color: #fff !important; }
.card.text-bg-success { background-color: #198754 !important; color: #fff !important; }
.card.text-bg-warning { background-color: #ffc107 !important; color: #212529 !important; }
.card.text-bg-danger { background-color: #dc3545 !important; color: #fff !important; }
.card-body h6 { font-size: 14px; margin-bottom: 5px; }
.card-body h4 { font-size: 24px; margin: 0; font-weight: 700; }

/* Bindings Table Card */
.card.border-0 { border-radius: 12px; box-shadow: 0 6px 16px rgba(0,0,0,0.05); }
.card-header { font-weight: 600; font-size: 16px; background: #f8f9fa; border-bottom: 1px solid #e0e0e0; }
.table-empty { text-align: center; padding: 15px; color: #777; }
.remove-binding { border-radius: 6px; }

/* Responsive Fixes */
@media (max-width: 576px) {
    .dashboard-card { flex-direction: column; align-items: flex-start; gap: 10px; }
}
/* Add spacing between summary cards and table */
.row.mb-4.g-3 {
    margin-bottom: 30px; /* increases space below the cards */
}

/* Optional: add padding to the table card */
.card.border-0.shadow-sm.mb-4 {
    padding: 15px; /* adds space inside the table card */
}

/* Ensure table doesn't stick to card edges */
.card-body.table-responsive {
    padding: 10px;
}

</style>

<!-- Dashboard Header -->
<div class="dashboard-card">
  <div>
    <h4>Mikrotik IP Bindings</h4>
    <small>Manage and monitor all your bindings easily</small>
  </div>
  <div class="d-flex">
    <a href="?_route=plugin/mikrotik_ipbinding_ui" class="btn btn-back">
       <i class="fas fa-plus-circle"></i> Add New
    </a>
  </div>
</div>

<!-- Summary Cards -->
<div class="row mb-4 g-3">
  <div class="col-md-3 col-6">
    <div class="card text-bg-primary shadow-sm border-0">
      <div class="card-body text-center">
        <h6>Total Bindings</h6>
        <h4>{$total}</h4>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-6">
    <div class="card text-bg-success shadow-sm border-0">
      <div class="card-body text-center">
        <h6>Regular</h6>
        <h4>{$regular}</h4>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-6">
    <div class="card text-bg-warning shadow-sm border-0">
      <div class="card-body text-center">
        <h6>Bypassed</h6>
        <h4>{$bypassed}</h4>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-6">
    <div class="card text-bg-danger shadow-sm border-0">
      <div class="card-body text-center">
        <h6>Blocked</h6>
        <h4>{$blocked}</h4>
      </div>
    </div>
  </div>
</div>

<!-- Bindings Table -->
<div class="card border-0 shadow-sm mb-4">

  <div class="card-body p-0 table-responsive">
    <table id="bindingsTable" class="table table-hover mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Router</th>
          <th>Mikrotik ID</th>
          <th>IP Address</th>
          <th>MAC Address</th>
          <th>Device Name</th>
          <th>Type</th>
          <th>Comment</th>
          <th>Package</th>
          <th>Expires</th>
          <th>Status</th>
          <th class="text-center" style="width:100px;">Action</th>
        </tr>
      </thead>
      <tbody>
        {if $bindings|@count > 0}
          {foreach $bindings as $b}
          <tr class="{if $b.status == 'inactive'}expired-row{/if}">
            <td>{$b.id}</td>
            <td>{$b.router_name}</td>
            <td>{$b.mikrotik_id}</td>
            <td>{$b.ip_address}</td>
            <td>{$b.mac_address}</td>
            <td>{$b.device_name}</td>
            <td>{$b.type}</td>
            <td>{$b.comment}</td>
            <td>{$b.package_name}</td>
            <td>{$b.expires}</td>
            <td>
              {if $b.status == 'inactive'}
                <span class="badge bg-danger">Inactive</span>
              {else}
                <span class="badge bg-success">Active</span>
              {/if}
            </td>
            <td class="text-center">
              <button class="btn btn-danger btn-sm remove-binding" data-id="{$b.id}">
                <i class="ion-trash-b"></i>
              </button>
            </td>
          </tr>
          {/foreach}
        {else}
          <tr><td colspan="12" class="table-empty">No bindings found.</td></tr>
        {/if}
      </tbody>
    </table>
  </div>
</div>

<!-- DataTables & SweetAlert -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{literal}
<script>
var $j = jQuery.noConflict();
$j(document).ready(function() {
    $j('#bindingsTable').DataTable({ responsive: true });

    $j('.remove-binding').on('click', function() {
        var id = $j(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "This will permanently remove the binding.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if(result.isConfirmed) {
                $j.post("{/literal}{$_url}plugin/ip_list_remove{literal}", {id: id}, function(resp) {
                    location.reload();
                }, 'json');
            }
        });
    });
});
</script>
{/literal}

{include file="sections/footer.tpl"}
