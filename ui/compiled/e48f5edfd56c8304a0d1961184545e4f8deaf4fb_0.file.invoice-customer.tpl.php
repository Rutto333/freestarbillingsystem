<?php
/* Smarty version 4.5.3, created on 2025-07-18 13:28:01
  from '/var/www/html/alpha/ui/ui/customer/invoice-customer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_687a21b1f2f880_54071145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e48f5edfd56c8304a0d1961184545e4f8deaf4fb' => 
    array (
      0 => '/var/www/html/alpha/ui/ui/customer/invoice-customer.tpl',
      1 => 1742413432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header-public.tpl' => 1,
    'file:customer/header.tpl' => 1,
    'file:customer/footer.tpl' => 1,
  ),
),false)) {
function content_687a21b1f2f880_54071145 (Smarty_Internal_Template $_smarty_tpl) {
if (empty($_smarty_tpl->tpl_vars['_user']->value)) {?>
    <?php $_smarty_tpl->_subTemplateRender("file:customer/header-public.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else { ?>
    <?php $_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"><?php echo '</script'; ?>
>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-hovered panel-primary panel-stacked mb30">
            <div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['in']->value['invoice'];?>
</div>
            <div class="panel-body">
                <?php if (!empty($_smarty_tpl->tpl_vars['logo']->value)) {?>
                    <center><img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
"></center>
                <?php }?>
                <form class="form-horizontal" method="post" action="<?php echo Text::url('plan/print');?>
" target="_blank">
                    <pre id="content"
                        style="border: 0px; ;text-align: center; background-color: transparent; background-image: url('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/system/uploads/paid.png');background-repeat:no-repeat;background-position: center"><?php echo $_smarty_tpl->tpl_vars['invoice']->value;?>
</pre>
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['in']->value['id'];?>
">
                    <?php if (!empty($_smarty_tpl->tpl_vars['_user']->value)) {?>
                        <a href="<?php echo Text::url('voucher/list-activated');?>
" class="btn btn-default btn-sm"><i
                            class="ion-reply-all"></i><?php echo Lang::T('Finish');?>
</a>
                    <?php }?>
                    <a href="javascript:download()" class="btn btn-success btn-sm text-black">
                        <i class="glyphicon glyphicon-share"></i> Download</a>
                    <a href="https://api.whatsapp.com/send/?text=<?php echo $_smarty_tpl->tpl_vars['whatsapp']->value;?>
" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-share"></i> WhatsApp</a>
                        <br><br>
                        <input type="text" class="form-control form-sm" style="border: 0px; padding: 1px; background-color: white;" readonly onclick="this.select()" value="<?php echo $_smarty_tpl->tpl_vars['public_url']->value;?>
">
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
>
    const canvas = document.createElement("canvas");
    const ctx = canvas.getContext('2d');
    ctx.font = '16px Courier';
    var text = document.getElementById("content").innerHTML;
    var lines = text.split(/\r\n|\r|\n/).length;
    var meas = ctx.measureText("A");
    let width = Math.round(<?php echo $_smarty_tpl->tpl_vars['_c']->value['printer_cols'];?>
 * 9.6);
    var height = Math.round((14 * lines));
    console.log(width, height, lines);
    var paid = new Image();
    paid.src = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/system/uploads/paid.png';
    <?php if (!empty($_smarty_tpl->tpl_vars['logo']->value)) {?>
        var img = new Image();
        img.src = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
?<?php echo time();?>
';
        var new_width = (width / 4) * 2;
        var new_height = Math.ceil(<?php echo $_smarty_tpl->tpl_vars['hlogo']->value;?>
 * (new_width/<?php echo $_smarty_tpl->tpl_vars['wlogo']->value;?>
));
        height = height + new_height;
    <?php }?>

    function download() {
        var doc = new jsPDF('p', 'px', [width, height]);
        <?php if (!empty($_smarty_tpl->tpl_vars['logo']->value)) {?>
            try {
                doc.addImage(img, 'PNG', (width - new_width) / 2, 10, new_width, new_height);
            } catch (err) {}
        <?php }?>
        try {
            doc.addImage(paid, 'PNG', (width - 200) / 2, (height - 145) / 2, 200, 145);
        } catch (err) {}
        doc.setFont("Courier");
        doc.setFontSize(16);
        doc.text($('#content').html(), width / 2, new_height + 30, 'center');
        doc.save('<?php echo $_smarty_tpl->tpl_vars['in']->value['invoice'];?>
.pdf');
    }
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
