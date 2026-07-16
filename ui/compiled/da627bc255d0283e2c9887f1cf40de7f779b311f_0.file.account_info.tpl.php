<?php
/* Smarty version 4.5.3, created on 2025-09-24 15:30:48
  from '/var/www/html/demo/ui/ui/widget/customers/account_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68d3e478561a99_47946624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da627bc255d0283e2c9887f1cf40de7f779b311f' => 
    array (
      0 => '/var/www/html/demo/ui/ui/widget/customers/account_info.tpl',
      1 => 1758716629,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d3e478561a99_47946624 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-primary box-solid" style="border-color: var(--primary-blue); background-color: var(--gray-50);">
    <div class="box-header" style="background-color: var(--primary-blue); color: var(--white); border-bottom: 2px solid var(--dark-blue);">
        <h3 class="box-title" style="color: var(--white); font-weight: bold;"><?php echo Lang::T('Your Account Information');?>
</h3>
    </div>
    <div style="margin-left: 5px; margin-right: 5px; background-color: var(--white); padding: 10px;">
        <table class="table table-bordered table-striped table-hover mb-0" style="margin-bottom: 0px; border-color: var(--gray-200);">
            <tr style="background-color: var(--gray-100);">
                <td class="small text-uppercase text-normal" style="color: var(--primary-blue); font-weight: bold; border-color: var(--gray-200);"><?php echo Lang::T('Usernames');?>
</td>
                <td class="small mb15" style="color: var(--text-dark); border-color: var(--gray-200);"><?php echo $_smarty_tpl->tpl_vars['_user']->value['username'];?>
</td>
            </tr>
            <tr style="background-color: var(--white);">
                <td class="small text-uppercase text-normal" style="color: var(--primary-blue); font-weight: bold; border-color: var(--gray-200);"><?php echo Lang::T('Password');?>
</td>
                <td class="small mb15" style="border-color: var(--gray-200);">
                    <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['_user']->value['password'];?>
"
                        style="width:100%; border: 1px solid var(--gray-200); background-color: var(--white); color: var(--text-dark); padding: 5px;" 
                        onmouseleave="this.type = 'password'"
                        onmouseenter="this.type = 'text'" onclick="this.select()">
                </td>
            </tr>
            <tr style="background-color: var(--gray-100);">
                <td class="small text-uppercase text-normal" style="color: var(--primary-blue); font-weight: bold; border-color: var(--gray-200);"><?php echo Lang::T('Service Type');?>
</td>
                <td class="small mb15" style="color: var(--text-dark); border-color: var(--gray-200);">
                    <?php if ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'Hotspot') {?>
                        <span style="background-color: var(--lighter-blue); color: var(--dark-blue); padding: 3px 8px; border-radius: 4px; font-weight: bold;">Hotspot</span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'PPPoE') {?>
                        <span style="background-color: var(--lighter-blue); color: var(--dark-blue); padding: 3px 8px; border-radius: 4px; font-weight: bold;">PPPoE</span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'VPN') {?>
                        <span style="background-color: var(--lighter-blue); color: var(--dark-blue); padding: 3px 8px; border-radius: 4px; font-weight: bold;">VPN</span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['_user']->value['service_type'] == 'Others' || $_smarty_tpl->tpl_vars['_user']->value['service_type'] == null) {?>
                        <span style="background-color: var(--lighter-blue); color: var(--dark-blue); padding: 3px 8px; border-radius: 4px; font-weight: bold;">Others</span>
                    <?php }?>
                </td>
            </tr>

            <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes') {?>
                <tr style="background-color: var(--white);">
                    <td class="small text-uppercase text-normal" style="color: var(--accent-blue); font-weight: bold; border-color: var(--gray-200);"><?php echo Lang::T('Yours Balances');?>
</td>
                    <td class="small mb15 text-bold" style="color: var(--text-dark); border-color: var(--gray-200); font-weight: bold;">
                        <?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['_user']->value['balance']);?>

                        <?php if ($_smarty_tpl->tpl_vars['_user']->value['auto_renewal'] == 1) {?>
                            <a class="label pull-right" 
                               style="background-color: var(--success-green); color: var(--white); padding: 4px 8px; text-decoration: none; border-radius: 4px; font-size: 11px;"
                               href="<?php echo Text::url('home&renewal=0');?>
"
                               onclick="return ask(this, '<?php echo Lang::T('Disable auto renewal?');?>
')"><?php echo Lang::T('Auto Renewal On');?>
</a>
                        <?php } else { ?>
                            <a class="label pull-right" 
                               style="background-color: var(--warning-orange); color: var(--white); padding: 4px 8px; text-decoration: none; border-radius: 4px; font-size: 11px;"
                               href="<?php echo Text::url('home&renewal=1');?>
"
                               onclick="return ask(this, '<?php echo Lang::T('Enable auto renewal?');?>
')"><?php echo Lang::T('Auto Renewal Off');?>
</a>
                        <?php }?>
                    </td>
                </tr>
            <?php }?>
        </table>&nbsp;&nbsp;
    </div>
</div>

<style>
:root {
    --primary-blue: #1e40af;
    --light-blue: #3b82f6;
    --lighter-blue: #60a5fa;
    --white: #FFFFFF;
    --dark-blue: #1e3a8a;
    --accent-blue: #2563eb;
    --text-dark: #1f2937;
    --text-light: #4b5563;
    --success-green: #10b981;
    --warning-orange: #f59e0b;
    --danger-red: #dc2626;
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
}

/* Hover effects */
.table-hover tbody tr:hover {
    background-color: var(--light-blue) !important;
    color: var(--white);
}

.box {
    box-shadow: 0 2px 8px rgba(30, 64, 175, 0.1);
    border-radius: 6px;
    overflow: hidden;
}

.box-header {
    border-radius: 6px 6px 0 0;
}

input[type="password"]:focus, input[type="text"]:focus {
    outline: none;
    border-color: var(--accent-blue) !important;
    box-shadow: 0 0 5px rgba(37, 99, 235, 0.3);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .table td {
        padding: 8px 5px;
        font-size: 12px;
    }
    
    .pull-right {
        float: none !important;
        display: block;
        margin-top: 5px;
        text-align: center;
    }
}
</style>
<?php }
}
