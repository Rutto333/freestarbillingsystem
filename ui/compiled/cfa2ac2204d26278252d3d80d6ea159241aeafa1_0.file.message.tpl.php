<?php
/* Smarty version 4.5.3, created on 2025-07-17 19:25:29
  from '/var/www/html/alpha/ui/ui/admin/logs/message.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687923f9c57ea4_40515442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfa2ac2204d26278252d3d80d6ea159241aeafa1' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/logs/message.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:pagination.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_687923f9c57ea4_40515442 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<style>
    /* Styles for overall layout and responsiveness */
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .container {
        margin-top: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }


    .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table th {
        vertical-align: middle;
        border-color: #dee2e6;
        background-color: #343a40;
        color: #fff;
    }

    .table td {
        vertical-align: middle;
        border-color: #dee2e6;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .badge {
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    .badge-danger {
        color: #721c24;
        background-color: #f8d7da;
    }

    .badge-success {
        color: #155724;
        background-color: #d4edda;
    }

    .badge-warning {
        color: #856404;
        background-color: #ffeeba;
    }

    .badge-info {
        color: #0c5460;
        background-color: #d1ecf1;
    }

    .badge:hover {
        opacity: 0.8;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                <div class="btn-group pull-right">
                    <a class="btn btn-primary btn-xs" title="save" href="<?php echo Text::url('logs/message-csv');?>
"
                        onclick="return ask(this, '<?php echo Lang::T('This will export to CSV');?>
?')"><span
                            class="glyphicon glyphicon-download" aria-hidden="true"></span> CSV</a>
                </div>
                <?php }?>
                <?php echo Lang::T('Message Log');?>

            </div>
            <div class="panel-body">
                <div class="text-center" style="padding: 15px">
                    <div class="col-md-4">
                        <form id="site-search" method="post" action="<?php echo Text::url('logs/message/');?>
">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="q" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
"
                                    placeholder="<?php echo Lang::T('Search');?>
...">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="submit"><?php echo Lang::T('Search');?>
</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <form class="form-inline" method="post" action="<?php echo Text::url('');?>
logs/message/">
                            <div class="input-group has-error">
                                <span class="input-group-addon"><?php echo Lang::T('Keep Logs');?>
 </span>
                                <input type="text" name="keep" class="form-control" placeholder="90" value="90">
                                <span class="input-group-addon"><?php echo Lang::T('Days');?>
</span>
                            </div>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return ask(this, '<?php echo Lang::T("
                                Clear old logs?");?>
')"><?php echo Lang::T('Clean up Logs');?>
</button>
                        </form>
                    </div>&nbsp;
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th><?php echo Lang::T('ID');?>
</th>
                                <th><?php echo Lang::T('Date Sent');?>
</th>
                                <th><?php echo Lang::T('Type');?>
</th>
                                <th><?php echo Lang::T('Status');?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($_smarty_tpl->tpl_vars['d']->value) {?> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
</td>
                                <td><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['sent_at']);?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['message_type'];?>
</td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Success') {?>
                                    <span class="badge badge-success"> <?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
 </span>
                                    <?php } else { ?>
                                    <span class="badge badge-danger"> <?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
 </span>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['message_content']) {?>
                            <tr>
                                <td colspan="4" style="text-align: center;" style="overflow-x: scroll;">
                                    <?php echo nl2br($_smarty_tpl->tpl_vars['ds']->value['message_content']);?>
</td>
                            </tr>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['error_message']) {?>
                            <tr>
                                <td colspan="4" style="text-align: center;" style="overflow-x: scroll;">
                                    <?php echo nl2br($_smarty_tpl->tpl_vars['ds']->value['error_message']);?>
</td>
                            </tr>
                            <?php }?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>
                            <tr>
                                <td colspan="4" style="text-align: center;">
                                    <?php echo Lang::T('No logs found.');?>

                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
