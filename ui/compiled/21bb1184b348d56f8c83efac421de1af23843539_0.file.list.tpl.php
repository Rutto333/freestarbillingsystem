<?php
/* Smarty version 4.5.3, created on 2025-09-16 21:51:31
  from '/var/www/html/demo/ui/ui/admin/hotspot/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68c9b1b3c90e32_68321934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21bb1184b348d56f8c83efac421de1af23843539' => 
    array (
      0 => '/var/www/html/demo/ui/ui/admin/hotspot/list.tpl',
      1 => 1755811434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68c9b1b3c90e32_68321934 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                    <a class="btn btn-primary btn-xs" title="save" href="<?php echo Text::url('services/sync/hotspot');?>
"
                        onclick="return ask(this, 'This will sync/send hotspot package to Mikrotik?')"><span
                            class="glyphicon glyphicon-refresh" aria-hidden="true"></span> sync</a>
                </div><?php echo Lang::T('Hotspot Plans');?>

            </div>
            <form id="site-search" method="post" action="<?php echo Text::url('services/hotspot/');?>
">
                <div class="panel-body">
                    <div class="row" style="padding: 5px; align-items: center;">

                        <!-- Search Input with Clear Button -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control"
                                    placeholder="<?php echo Lang::T('Search by Name');?>
...">
                            </div>
                        </div>

                        <!-- Add New Service -->
                        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                            <a href="<?php echo Text::url('services/add');?>
" class="btn btn-primary btn-block"
                            title="<?php echo Lang::T('New Service Package');?>
">
                            <i class="ion ion-android-add"></i> <?php echo Lang::T('Add');?>

                            </a>
                        </div>

                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <div style="margin-left: 5px; margin-right: 5px;">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th colspan="5" class="text-center"><?php echo Lang::T('Internet Package');?>
</th>
                                <th colspan="2" class="text-center" >
                                    <?php echo Lang::T('Limit');?>
</th>
                                <th colspan="2"></th>
                                <th colspan="2" class="text-center" >
                                    <?php echo Lang::T('Expired');?>
</th>
                                <th colspan="3"></th>
                            </tr>
                            <tr>
                                <th><?php echo Lang::T('Name');?>
</th>
                                <th><?php echo Lang::T('Bandwidth');?>
</th>
                                <th><?php echo Lang::T('Category');?>
</th>
                                <th><?php echo Lang::T('Price');?>
</th>
                                <th><?php echo Lang::T('Validity');?>
</th>
                                <th <?php echo Lang::T('Time');?>
</th>
                                <th<?php echo Lang::T('Data');?>
</th>
                                <th><?php echo Lang::T('Routers');?>
</th>
                                <th><?php echo Lang::T('Device');?>
</th>
                                <th<?php echo Lang::T('Internet Package');?>
</th>
                                <th <?php echo Lang::T('Date');?>
</th>
                                <th><?php echo Lang::T('ID');?>
</th>
                                <th><?php echo Lang::T('Manage');?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr <?php if ($_smarty_tpl->tpl_vars['ds']->value['enabled'] != 1) {?>class="danger" title="disabled" <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['prepaid'] != 'yes') {?>class="warning" title="Postpaid" <?php }?>>
                                    <td class="headcol"><?php echo $_smarty_tpl->tpl_vars['ds']->value['name_plan'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['name_bw'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['typebp'];?>
</td>
                                    <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>

                                        <?php if (!empty($_smarty_tpl->tpl_vars['ds']->value['price_old'])) {?>
                                            <sup
                                                style="text-decoration: line-through; color: red"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price_old']);?>
</sup>
                                        <?php }?>
                                    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['validity'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['validity_unit'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['time_limit'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['time_unit'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['data_limit'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['data_unit'];?>
</td>
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['is_radius']) {?>
                                            <span class="label label-primary">RADIUS</span>
                                        <?php } else { ?>
                                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['routers'] != '') {?>
                                                <?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];?>

                                            <?php }?>
                                        <?php }?>
                                    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['device'];?>
</td>
                                    <td><?php if ($_smarty_tpl->tpl_vars['ds']->value['plan_expired']) {?><a
                                            href="<?php echo Text::url('services/edit/');
echo $_smarty_tpl->tpl_vars['ds']->value['plan_expired'];?>
"><?php echo Lang::T('Yes');?>
</a><?php } else {
echo Lang::T('No');?>

                                        <?php }?></td>
                                    <td><?php if ($_smarty_tpl->tpl_vars['ds']->value['prepaid'] == 'no') {
echo $_smarty_tpl->tpl_vars['ds']->value['expired_date'];
}?></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
</td>
                                    <td>
                                        <a href="<?php echo Text::url('services/edit/');
echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                            class="btn btn-info btn-xs"><?php echo Lang::T('Edit');?>
</a>
                                        <a href="<?php echo Text::url('services/delete/');
echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                            onclick="return ask(this, '<?php echo Lang::T('Delete');?>
?')"
                                            class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
