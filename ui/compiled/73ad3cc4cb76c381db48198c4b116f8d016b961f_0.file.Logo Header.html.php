<?php
/* Smarty version 4.5.3, created on 2025-07-22 11:20:42
  from '/var/www/html/alpha/pages/vouchers/Logo Header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687f49dae3f741_55635534',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73ad3cc4cb76c381db48198c4b116f8d016b961f' => 
    array (
      0 => '/var/www/html/alpha/pages/vouchers/Logo Header.html',
      1 => 1748444862,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687f49dae3f741_55635534 (Smarty_Internal_Template $_smarty_tpl) {
?><table border="0" cellspacing="0" cellpadding="2">
    <tbody><tr>
        <td valign="middle">
            <center><img src="system/uploads/logo.png"></center>
            <table width="100%" border="1" cellspacing="0" cellpadding="1" bordercolor="#757575">
                <tbody>
                    <tr>
                        <td rowspan="4" width="1">[[qrcode]]
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="center" style="font-size:25px">
                            [[price]]</td>
                    </tr>
                    <tr>
                        <td valign="middle" align="center" style="font-size:20px">
                            [[voucher_code]]</td>
                    </tr>
                    <tr>
                        <td valign="middle" align="center" style="font-size:15px">
                            [[plan]] - [[counter]]<br></td>
                    </tr>
                </tbody>
            </table>
            <center>[[company_name]]</center>
        </td>
    </tr>
</tbody></table><?php }
}
