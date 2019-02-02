<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 11:53:23
         compiled from "/var/www/html/SHN/modules/sthoverimage/views/templates/admin/sthoverimage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1673776445c34ffb36707e8-32673522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fb9e8a588c685ff23bebd5538fabf02106ded03' => 
    array (
      0 => '/var/www/html/SHN/modules/sthoverimage/views/templates/admin/sthoverimage.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1673776445c34ffb36707e8-32673522',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_dir' => 0,
    'images' => 0,
    'image' => 0,
    'current_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34ffb36938e1_96827674',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34ffb36938e1_96827674')) {function content_5c34ffb36938e1_96827674($_smarty_tpl) {?>
<link href="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
views/css/admin.css" rel="stylesheet" type="text/css"/>
<div class="alert alert-info" role="alert">
    <i class="material-icons">help</i>
    <p class="alert-text"><?php echo smartyTranslate(array('s'=>'Click on one image below to set it as the hover image. The cover image is not showing on the list.','d'=>'Admin.Theme.Transformer'),$_smarty_tpl);?>
</p>
</div>
<div id="product-images-container-sthoverimage" class="m-b-2">
    <div id="product-images-dropzone-sthoverimage" class="panel dropzone ui-sortable col-md-12 dz-started" data-max-size="8">
        <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
        <div class="dz-preview dz-image-preview">
            <div class="dz-image bg" data-id="<?php echo $_smarty_tpl->tpl_vars['image']->value['id'];?>
" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['image']->value['base_image_url'];?>
-home_default.<?php echo $_smarty_tpl->tpl_vars['image']->value['format'];?>
');"></div>
            <div class="ishover<?php if (!$_smarty_tpl->tpl_vars['image']->value['hover']) {?> hide<?php }?>"><?php echo smartyTranslate(array('s'=>'Hover','d'=>'Admin.Theme.Transformer'),$_smarty_tpl);?>
</div>
        </div>
        <?php } ?>
    </div>
</div>
<script type="text/javascript">
jQuery(function($){
    var module_url = '<?php echo $_smarty_tpl->tpl_vars['current_url']->value;?>
';
    
    $('#product-images-dropzone-sthoverimage .dz-image').click(function(){
        var _this = $(this);
        $.getJSON(module_url+'&ajax=1&action=update_hover&id_image='+_this.data('id'), function(json){
            if (json.r) {
                $('#product-images-dropzone-sthoverimage').find('.ishover').hide();
                
                if (_this.parent().find('.ishover').hasClass('hide')) {
                    _this.parent().find('.ishover').removeClass('hide').show(); 
                } else {
                    _this.parent().find('.ishover').addClass('hide').hide();    
                }
                
            }
        });
    });
    
});
</script><?php }} ?>
