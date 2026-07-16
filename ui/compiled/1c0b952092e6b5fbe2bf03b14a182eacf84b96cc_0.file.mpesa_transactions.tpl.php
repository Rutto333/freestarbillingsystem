<?php
/* Smarty version 4.5.3, created on 2025-09-18 20:07:08
  from '/var/www/html/demo/system/plugin/ui/mpesa_transactions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68cc3c3c38b3a8_36816571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c0b952092e6b5fbe2bf03b14a182eacf84b96cc' => 
    array (
      0 => '/var/www/html/demo/system/plugin/ui/mpesa_transactions.tpl',
      1 => 1742637342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68cc3c3c38b3a8_36816571 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/demo/system/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'/var/www/html/demo/system/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                Mpesa Transactions
            </div>
            <div class="panel-body">
                <!-- Search Form -->
                <form class="form-inline mb20">
                    <div class="form-group">
                        <input type="text" id="live-search" class="form-control" placeholder="Search by Transaction ID, First Name, Amount, Phone, or Account No">
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <!-- Table to display transactions -->
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>First Name</th>
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Account No</th>
                            <th>Org Account Balance</th>
                            <th>Transaction ID</th>
                            <th>Transaction Type</th>
                            <th>Transaction Time</th>
                            <th>Business Short Code</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-table-body">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['t']->value, 'ts', false, 'key');
$_smarty_tpl->tpl_vars['ts']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['ts']->value) {
$_smarty_tpl->tpl_vars['ts']->do_else = false;
?>
                            <tr class="transaction-row">
                                <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                                <td class="search-target"><?php echo $_smarty_tpl->tpl_vars['ts']->value['FirstName'];?>
</td>
                                <td class="search-target"><?php if ($_smarty_tpl->tpl_vars['ts']->value['MSISDN']) {
echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['ts']->value['MSISDN'],20,"...");
} else { ?>No MSISDN available<?php }?></td>
                                <td class="search-target"><?php echo $_smarty_tpl->tpl_vars['ts']->value['TransAmount'];?>
</td>
                                <td class="search-target"><?php echo $_smarty_tpl->tpl_vars['ts']->value['BillRefNumber'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ts']->value['OrgAccountBalance'];?>
</td>
                                <td class="search-target"><?php echo $_smarty_tpl->tpl_vars['ts']->value['TransID'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ts']->value['TransactionType'];?>
</td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ts']->value['TransTime'],"%B %e, %Y, %I:%M %p");?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ts']->value['BusinessShortCode'];?>
</td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
                <div id="no-results" class="alert alert-warning" style="display: none;">
                    <strong>No M-Pesa Transactions Found</strong>
                    <p>There are currently no M-Pesa transactions to display.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- jQuery (if not already included) -->

<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$(document).ready(function() {
    $('#live-search').on('keyup', function() {
        let searchValue = $(this).val().toLowerCase();
        let hasResults = false;

        $('.transaction-row').each(function() {
            let rowText = $(this).text().toLowerCase();
            if (rowText.includes(searchValue)) {
                $(this).show();
                hasResults = true;
            } else {
                $(this).hide();
            }
        });

        if (hasResults) {
            $('#no-results').hide();
        } else {
            $('#no-results').show();
        }
    });
});
<?php echo '</script'; ?>
>

<?php }
}
