<?php
/* Smarty version 4.5.3, created on 2026-06-30 10:40:02
  from '/var/www/html/dev/system/plugin/ui/ip_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a4372d27ff154_10993707',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '607db7a8ad871a5ac5f0b7a8c208ce0aeffde245' => 
    array (
      0 => '/var/www/html/dev/system/plugin/ui/ip_list.tpl',
      1 => 1782805186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a4372d27ff154_10993707 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/dev/system/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
        <h4><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</h4>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-6">
    <div class="card text-bg-success shadow-sm border-0">
      <div class="card-body text-center">
        <h6>Regular</h6>
        <h4><?php echo $_smarty_tpl->tpl_vars['regular']->value;?>
</h4>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-6">
    <div class="card text-bg-warning shadow-sm border-0">
      <div class="card-body text-center">
        <h6>Bypassed</h6>
        <h4><?php echo $_smarty_tpl->tpl_vars['bypassed']->value;?>
</h4>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-6">
    <div class="card text-bg-danger shadow-sm border-0">
      <div class="card-body text-center">
        <h6>Blocked</h6>
        <h4><?php echo $_smarty_tpl->tpl_vars['blocked']->value;?>
</h4>
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
        <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['bindings']->value) > 0) {?>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bindings']->value, 'b');
$_smarty_tpl->tpl_vars['b']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->do_else = false;
?>
          <tr class="<?php if ($_smarty_tpl->tpl_vars['b']->value['status'] == 'inactive') {?>expired-row<?php }?>">
            <td><?php echo $_smarty_tpl->tpl_vars['b']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['b']->value['router_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['b']->value['mikrotik_id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['b']->value['ip_address'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['b']->value['mac_address'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['b']->value['device_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['b']->value['type'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['b']->value['comment'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['b']->value['package_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['b']->value['expires'];?>
</td>
            <td>
              <?php if ($_smarty_tpl->tpl_vars['b']->value['status'] == 'inactive') {?>
                <span class="badge bg-danger">Inactive</span>
              <?php } else { ?>
                <span class="badge bg-success">Active</span>
              <?php }?>
            </td>
            <td class="text-center">
              <button class="btn btn-danger btn-sm remove-binding" data-id="<?php echo $_smarty_tpl->tpl_vars['b']->value['id'];?>
">
                <i class="ion-trash-b"></i>
              </button>
            </td>
          </tr>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
          <tr><td colspan="12" class="table-empty">No bindings found.</td></tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</div>

<!-- DataTables & SweetAlert -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@11"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
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
                $j.post("<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/ip_list_remove", {id: id}, function(resp) {
                    location.reload();
                }, 'json');
            }
        });
    });
});
<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
