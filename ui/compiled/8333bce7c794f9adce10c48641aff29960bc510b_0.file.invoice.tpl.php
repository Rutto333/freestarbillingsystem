<?php
/* Smarty version 4.5.3, created on 2025-09-06 14:05:02
  from '/var/www/html/myapp/ui/ui/admin/plan/invoice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68bc155ebffd49_42661921',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8333bce7c794f9adce10c48641aff29960bc510b' => 
    array (
      0 => '/var/www/html/myapp/ui/ui/admin/plan/invoice.tpl',
      1 => 1752317410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_68bc155ebffd49_42661921 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"><?php echo '</script'; ?>
>
<div class="row">
    <div class="col-md-6 col-sm-12 col-md-offset-3">
        <div class="panel panel-hovered panel-primary panel-stacked mb30">
            <div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['in']->value['invoice'];?>
</div>
            <div class="panel-body">
                <?php if (!empty($_smarty_tpl->tpl_vars['logo']->value)) {?>
                    <center><img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
?"></center>
                <?php }?>
                <form class="form-horizontal" method="post" action="<?php echo Text::url('');?>
plan/print" target="_blank">
                    <pre id="content"
                    style="border: 0px; ;text-align: center; background-color: transparent; background-image: url('<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/system/uploads/paid.png');background-repeat:no-repeat;background-position: center"></pre>
                    <textarea class="hidden" id="formcontent" name="content"><?php echo $_smarty_tpl->tpl_vars['invoice']->value;?>
</textarea>
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['in']->value['id'];?>
">
                    <a href="<?php echo Text::url('plan/list');?>
" class="btn btn-default btn-sm"><i
                            class="ion-reply-all"></i><?php echo Lang::T('Finish');?>
</a>
                    <a href="javascript:download()" class="btn btn-success btn-sm text-black">
                        <i class="glyphicon glyphicon-share"></i> Download</a>
                    <a href="https://api.whatsapp.com/send/?text=<?php echo $_smarty_tpl->tpl_vars['whatsapp']->value;?>
" target="_blank"
                        class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-share"></i> WhatsApp</a>
                    <a href="<?php echo Text::url('');?>
plan/view/<?php echo $_smarty_tpl->tpl_vars['in']->value['id'];?>
/send" class="btn btn-info text-black btn-sm"><i
                            class="glyphicon glyphicon-envelope"></i> <?php echo Lang::T("Resend");?>
</a>
                    <hr>
                    <a href="<?php echo Text::url('');?>
plan/print/<?php echo $_smarty_tpl->tpl_vars['in']->value['id'];?>
" target="_print"
                        class="btn btn-info text-black btn-sm"><i class="glyphicon glyphicon-print"></i>
                        <?php echo Lang::T('Print');?>
 HTML</a>
                    <button type="submit" class="btn btn-info text-black btn-sm"><i
                            class="glyphicon glyphicon-print"></i>
                        <?php echo Lang::T('Print');?>
 Text</button>
                    <a href="nux://print?text=<?php echo urlencode($_smarty_tpl->tpl_vars['invoice']->value);?>
"
                        class="btn btn-success text-black btn-sm hidden-md hidden-lg">
                        <i class="glyphicon glyphicon-phone"></i>
                        NuxPrint
                    </a>
                    <a href="https://github.com/hotspotbilling/android-printer"
                        class="btn btn-success text-black btn-sm hidden-xs hidden-sm" target="_blank">
                        <i class="glyphicon glyphicon-phone"></i>
                        NuxPrint
                    </a><br><br>
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
    var text = document.getElementById("formcontent").innerHTML;
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
        doc.text($('#formcontent').html(), width / 2, new_height + 30, 'center');
        doc.save('<?php echo $_smarty_tpl->tpl_vars['in']->value['invoice'];?>
.pdf');
    }

    var s5_taf_parent = window.location;
    document.getElementById('content').innerHTML = document.getElementById('formcontent').innerHTML;
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
