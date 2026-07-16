<?php
/* Smarty version 4.5.3, created on 2025-07-13 23:07:36
  from '/var/www/html/alpha/ui/ui/customer/inbox.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68741208c7ac81_15156586',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '478c9b3b42332be0a1d5794686afe2aa08868a96' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/customer/inbox.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header.tpl' => 1,
    'file:customer/footer.tpl' => 1,
  ),
),false)) {
function content_68741208c7ac81_15156586 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ($_smarty_tpl->tpl_vars['tipe']->value == 'view') {?>
    <div class="box box-primary">
        <div class="box-body no-padding">
            <div class="mailbox-read-info">
                <h3><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['mail']->value['subject'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
                <h5>From: <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['mail']->value['from'], ENT_QUOTES, 'UTF-8', true);?>

                    <span class="mailbox-read-time pull-right" data-toggle="tooltip" data-placement="top"
                        title="Read at <?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['mail']->value['date_read']);?>
"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['mail']->value['date_created']);?>
</span>
                </h5>
            </div>
            <div class="mailbox-read-message">
                <?php if (Text::is_html($_smarty_tpl->tpl_vars['mail']->value['body'])) {?>
                    <?php echo $_smarty_tpl->tpl_vars['mail']->value['body'];?>

                <?php } else { ?>
                    <?php echo nl2br(htmlspecialchars_decode($_smarty_tpl->tpl_vars['mail']->value['body']));?>

                <?php }?>
            </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <?php if ($_smarty_tpl->tpl_vars['prev']->value) {?>
                    <a href="<?php echo Text::url('mail/view/',$_smarty_tpl->tpl_vars['prev']->value);?>
" class="btn btn-default"><i class="fa fa-chevron-left"></i>
                        <?php echo Lang::T("Previous");?>
</a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['next']->value) {?>
                    <a href="<?php echo Text::url('mail/view/',$_smarty_tpl->tpl_vars['next']->value);?>
" class="btn btn-default"><i class="fa fa-chevron-right"></i>
                        <?php echo Lang::T("Next");?>
</a>
                <?php }?>
            </div>
            <a href="<?php echo Text::url('mail');?>
" class="btn btn-primary"><i class="fa fa-arrow-left"></i> <?php echo Lang::T("Back");?>
</a>
            <a href="<?php echo Text::url('mail/delete/');
echo $_smarty_tpl->tpl_vars['mail']->value['id'];?>
" class="btn btn-danger"
                onclick="return ask(this, '<?php echo Lang::T("Delete");?>
?')"><i class="fa fa-trash-o"></i>
                <?php echo Lang::T("Delete");?>
</a>
            <a href="https://api.whatsapp.com/send?text=<?php if (Text::is_html($_smarty_tpl->tpl_vars['mail']->value['body'])) {
echo urlencode(strip_tags($_smarty_tpl->tpl_vars['mail']->value['body']));
} else {
echo urlencode($_smarty_tpl->tpl_vars['mail']->value['body']);
}?>"
                class="btn btn-success"><i class="fa fa-share"></i> <?php echo Lang::T("Share");?>
</a>
        </div>
        <!-- /.box-footer -->
    </div>
<?php } else { ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <form method="post">
                <div class="box-tools pull-right">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="<?php echo Lang::T('Search');?>
..." value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['q']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-success"><span
                                    class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="box-body no-padding">
            <div class="mailbox-controls">
                <a href="<?php echo Text::url('mail');?>
" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
                <div class="pull-right">
                    <div class="btn-group">
                        <?php if ($_smarty_tpl->tpl_vars['p']->value > 0) {?>
                            <a href="<?php echo Text::url('mail&p=');
echo $_smarty_tpl->tpl_vars['p']->value-1;?>
&q=<?php echo urlencode($_smarty_tpl->tpl_vars['q']->value);?>
" class="btn btn-default btn-sm"><i
                                    class="fa fa-chevron-left"></i></a>
                        <?php }?>
                        <a href="<?php echo Text::url('mail&p=');
echo $_smarty_tpl->tpl_vars['p']->value+1;?>
&q=<?php echo urlencode($_smarty_tpl->tpl_vars['q']->value);?>
" class="btn btn-default btn-sm"><i
                                class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mails']->value, 'mail');
$_smarty_tpl->tpl_vars['mail']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mail']->value) {
$_smarty_tpl->tpl_vars['mail']->do_else = false;
?>
                            <tr>
                                <td class="mailbox-subject">
                                    <a href="<?php echo Text::url('mail/view/');
echo $_smarty_tpl->tpl_vars['mail']->value['id'];?>
">
                                        <div>
                                            <?php if ($_smarty_tpl->tpl_vars['mail']->value['date_read'] == null) {?>
                                                <i class="fa fa-envelope text-yellow" title="unread"></i>
                                            <?php } else { ?>
                                                <i class="fa fa-envelope-o text-yellow" title="read"></i>
                                            <?php }?>
                                            <b><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['mail']->value['subject'], ENT_QUOTES, 'UTF-8', true);?>
</b>
                                        </div>
                                    </a>
                                </td>
                                <td class="mailbox-name"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['mail']->value['from'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td class="mailbox-attachment"></td>
                                <td class="mailbox-date"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['mail']->value['date_created']);?>
</td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php if (empty($_smarty_tpl->tpl_vars['mails']->value)) {?>
                            <tr>
                                <td colspan="4"><?php echo Lang::T("No email found.");?>
</td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer no-padding">
            <div class="mailbox-controls">
                <a href="<?php echo Text::url('mail');?>
" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
                <div class="pull-right">
                    <div class="btn-group">
                        <?php if ($_smarty_tpl->tpl_vars['p']->value > 0) {?>
                            <a href="<?php echo Text::url('mail&p=');
echo $_smarty_tpl->tpl_vars['p']->value-1;?>
&q=<?php echo urlencode($_smarty_tpl->tpl_vars['q']->value);?>
" class="btn btn-default btn-sm"><i
                                    class="fa fa-chevron-left"></i></a>
                        <?php }?>
                        <a href="<?php echo Text::url('mail&p=');
echo $_smarty_tpl->tpl_vars['p']->value+1;?>
&q=<?php echo urlencode($_smarty_tpl->tpl_vars['q']->value);?>
" class="btn btn-default btn-sm"><i
                                class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
