<?php
/* Smarty version 4.5.3, created on 2025-07-17 19:27:44
  from '/var/www/html/alpha/ui/ui/admin/message/single.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687924809e9106_23236700',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e91874891332e13c6b76ef2ab3a1159c395e23e7' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/admin/message/single.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_687924809e9106_23236700 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-primary panel-hovered panel-stacked mb30">
			<div class="panel-heading"><?php echo Lang::T('Send Personal Message');?>
</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('message/send-post');?>
">
					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo Lang::T('Customer');?>
</label>
						<div class="col-md-6">
							<select <?php if ($_smarty_tpl->tpl_vars['cust']->value) {
} else { ?>id="personSelect" <?php }?> class="form-control select2"
								name="id_customer" style="width: 100%"
								data-placeholder="<?php echo Lang::T('Select a customer');?>
...">
								<?php if ($_smarty_tpl->tpl_vars['cust']->value) {?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['cust']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cust']->value['username'];?>
 &bull; <?php echo $_smarty_tpl->tpl_vars['cust']->value['fullname'];?>
 &bull;
										<?php echo $_smarty_tpl->tpl_vars['cust']->value['email'];?>
</option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo Lang::T('Send Via');?>
</label>
						<div class="col-md-6">
							<select class="form-control" name="via" id="via">
								<option value="sms" selected> <?php echo Lang::T('via SMS');?>
</option>
								<option value="wa"> <?php echo Lang::T('Via WhatsApp');?>
</option>
								<option value="both"> <?php echo Lang::T('Via WhatsApp and SMS');?>
</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo Lang::T('Message');?>
</label>
						<div class="col-md-6">
							<textarea class="form-control" id="message" name="message"
								placeholder="<?php echo Lang::T('Compose your message...');?>
" rows="5"></textarea>
						</div>
						<p class="help-block col-md-4">
							<?php echo Lang::T('Use placeholders:');?>

							<br>
							<b>[[name]]</b> - <?php echo Lang::T('Customer Name');?>

							<br>
							<b>[[user_name]]</b> - <?php echo Lang::T('Customer Username');?>

							<br>
							<b>[[phone]]</b> - <?php echo Lang::T('Customer Phone');?>

							<br>
							<b>[[company_name]]</b> - <?php echo Lang::T('Your Company Name');?>

							<br>
							<b>[[payment_link]]</b> - <a href="<?php echo Text::url('docs');?>
/#Reminder%20with%20payment%20link"
								target="_blank"><?php echo Lang::T('Read documentation');?>
</a>.
						</p>
					</div>

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-success"
								onclick="return ask(this, '<?php echo Lang::T('Continue the process of sending messages');?>
?')"
								type="submit"><?php echo Lang::T('Send Message');?>
</button>
							<a href="<?php echo Text::url('dashboard');?>
" class="btn btn-default"><?php echo Lang::T('Cancel');?>
</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
