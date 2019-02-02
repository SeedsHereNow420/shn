<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 03:15:42
         compiled from "module:stwishlist/views/templates/hook/fly.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7266109975c31e35ea35b32-75130100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a66c9d690965af454ffe1370964a4f4a96eb2af' => 
    array (
      0 => 'module:stwishlist/views/templates/hook/fly.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '7266109975c31e35ea35b32-75130100',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'classname' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31e35ea39109_51297403',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31e35ea39109_51297403')) {function content_5c31e35ea39109_51297403($_smarty_tpl) {?>
<a class="add_to_wishlit hover_fly_btn <?php if (isset($_smarty_tpl->tpl_vars['classname']->value)) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['classname']->value, ENT_QUOTES, 'UTF-8');?>
 <?php }?> pro_right_item" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
" href="javascript:;" title="<?php echo smartyTranslate(array('s'=>'Add to wishlist','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow"><div class="hover_fly_btn_inner"><i class="fto-star icon_btn"></i><span><?php echo smartyTranslate(array('s'=>'Add to wishlist','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span></div></a><?php }} ?>
