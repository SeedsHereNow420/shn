<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:05:20
         compiled from "/var/www/html/SHN/modules/ststickers/views/templates/admin/ststickers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11672244635c31a8b04736d9-35995374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93257b7f62434839f34f20c0bcf31c24495135d4' => 
    array (
      0 => '/var/www/html/SHN/modules/ststickers/views/templates/admin/ststickers.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11672244635c31a8b04736d9-35995374',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_dir' => 0,
    'stickers' => 0,
    'sticker' => 0,
    'current_url' => 0,
    'id_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a8b0481a09_30813124',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a8b0481a09_30813124')) {function content_5c31a8b0481a09_30813124($_smarty_tpl) {?>
<link href="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
views/css/admin.css" rel="stylesheet" type="text/css"/>
<div class="alert alert-info" role="alert">
    <i class="material-icons">help</i>
    <p class="alert-text"><?php echo smartyTranslate(array('s'=>'Click a sticker to add it on on the product, click it once more to remove it from the product .','d'=>'Admin.Theme.Transformer'),$_smarty_tpl);?>
</p>
</div>
<div id="product-images-container-ststickers" class="m-b-2">
    <div id="product-images-dropzone-ststickers" class="panel dropzone ui-sortable col-md-12 dz-started" data-max-size="8">
        <?php  $_smarty_tpl->tpl_vars['sticker'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sticker']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stickers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sticker']->key => $_smarty_tpl->tpl_vars['sticker']->value) {
$_smarty_tpl->tpl_vars['sticker']->_loop = true;
?>
        <div class="dz-preview dz-image-preview" data-id_st_sticker="<?php echo $_smarty_tpl->tpl_vars['sticker']->value['id_st_sticker'];?>
" data-id_st_sticker_map="<?php echo $_smarty_tpl->tpl_vars['sticker']->value['id_st_sticker_map'];?>
" >
            <div class="dz-details">
                <?php if ($_smarty_tpl->tpl_vars['sticker']->value['name']) {?>
                    <div><?php echo smartyTranslate(array('s'=>'Name:','d'=>'Admin.Theme.Transformer'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['sticker']->value['name'];?>
</div>
                <?php } else { ?>
                    <div><?php echo smartyTranslate(array('s'=>'Id:','d'=>'Admin.Theme.Transformer'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['sticker']->value['id_st_sticker'];?>
</div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['sticker']->value['text']) {?><div><?php echo smartyTranslate(array('s'=>'Text:','d'=>'Admin.Theme.Transformer'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['sticker']->value['text'];?>
</div><?php }?>
            </div>
            <div class="dz-image bg" style="<?php if ($_smarty_tpl->tpl_vars['sticker']->value['image_multi_lang']) {?>background-image: url('<?php echo $_smarty_tpl->tpl_vars['sticker']->value['image_multi_lang'];?>
');<?php }?>"></div>
            <div class="ishover <?php if (!$_smarty_tpl->tpl_vars['sticker']->value['id_st_sticker_map']) {?> hide<?php }?>"><?php echo smartyTranslate(array('s'=>'Selected','d'=>'Admin.Theme.Transformer'),$_smarty_tpl);?>
</div>
        </div>
        <?php } ?>
    </div>
</div>
<script type="text/javascript">
jQuery(function($){
    var module_url = '<?php echo $_smarty_tpl->tpl_vars['current_url']->value;?>
';
    var id_product = '<?php echo $_smarty_tpl->tpl_vars['id_product']->value;?>
'
    
    $('#product-images-dropzone-ststickers .dz-preview').click(function(){
        var _this = $(this);
        $.getJSON(module_url+'&ajax=1&act=changeProductSticker&id_st_sticker_map='+_this.data('id_st_sticker_map')+'&id_st_sticker='+_this.data('id_st_sticker')+'&id_product='+id_product, function(json){
            if (json.r && json.d) {
                _this.find('.ishover').show();
                _this.data('id_st_sticker_map', json.d);
            } else {
                _this.find('.ishover').hide();
                _this.data('id_st_sticker_map', 0);
            }
        });
    });
    
});
</script><?php }} ?>
