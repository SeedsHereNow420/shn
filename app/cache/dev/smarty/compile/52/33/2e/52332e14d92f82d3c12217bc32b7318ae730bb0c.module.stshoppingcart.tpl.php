<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:42:34
         compiled from "module:stshoppingcart/views/templates/hook/stshoppingcart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2727083275c322ffa318477-95803408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52332e14d92f82d3c12217bc32b7318ae730bb0c' => 
    array (
      0 => 'module:stshoppingcart/views/templates/hook/stshoppingcart.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '2727083275c322ffa318477-95803408',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'block_cart_style' => 0,
    'refresh_url' => 0,
    'cart_url' => 0,
    'click_on_header_cart' => 0,
    'block_cart_info' => 0,
    'cart' => 0,
    'hover_display_cp' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322ffa329cc9_13675784',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322ffa329cc9_13675784')) {function content_5c322ffa329cc9_13675784($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/stshoppingcart/views/templates/hook/stshoppingcart.tpl --><div class="blockcart dropdown_wrap top_bar_item shopping_cart_style_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block_cart_style']->value, ENT_QUOTES, 'UTF-8');?>
 clearfix" data-refresh-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['refresh_url']->value, ENT_QUOTES, 'UTF-8');?>
"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart_url']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'View my shopping cart','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow" class="st_shopping_cart dropdown_tri header_item <?php if ($_smarty_tpl->tpl_vars['click_on_header_cart']->value) {?> rightbar_tri <?php }?>" data-name="side_products_cart" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['click_on_header_cart']->value==2) {?>left<?php } else { ?>right<?php }?>"><div class="flex_container"><div class="ajax_cart_bag cart_icon_item"><i class="fto-glyph icon_btn"></i><?php if ($_smarty_tpl->tpl_vars['block_cart_style']->value==0&&$_smarty_tpl->tpl_vars['block_cart_info']->value&1) {?><span class="icon_text"><?php echo smartyTranslate(array('s'=>'Cart','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span><?php }?><?php if ($_smarty_tpl->tpl_vars['block_cart_info']->value&4) {?><span class="ajax_cart_quantity amount_circle <?php if ($_smarty_tpl->tpl_vars['cart']->value['products_count']>9) {?> dozens <?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['products_count'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></div><?php if ($_smarty_tpl->tpl_vars['block_cart_style']->value!=0&&$_smarty_tpl->tpl_vars['block_cart_info']->value&1) {?><span class="cart_text cart_icon_item"><?php echo smartyTranslate(array('s'=>'Shopping cart','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span><?php }?><?php if ($_smarty_tpl->tpl_vars['block_cart_info']->value&2) {?><span class="ajax_cart_quantity cart_icon_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['products_count'], ENT_QUOTES, 'UTF-8');?>
</span><span class="ajax_cart_product_txt cart_icon_item"><?php echo smartyTranslate(array('s'=>'item(s)','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span><?php }?><?php if (($_smarty_tpl->tpl_vars['block_cart_info']->value&1||$_smarty_tpl->tpl_vars['block_cart_info']->value&2)&&$_smarty_tpl->tpl_vars['block_cart_info']->value&8) {?><span class="ajax_cart_split cart_icon_item"><?php echo smartyTranslate(array('s'=>'-','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span><?php }?><?php if ($_smarty_tpl->tpl_vars['block_cart_info']->value&8) {?><span class="ajax_cart_total cart_icon_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></div></a><?php if ($_smarty_tpl->tpl_vars['hover_display_cp']->value) {?><div class="dropdown_list cart_body <?php if ($_smarty_tpl->tpl_vars['hover_display_cp']->value==1&&!$_smarty_tpl->tpl_vars['cart']->value['products_count']) {?> no_show_empty <?php }?>"><div class="dropdown_box"><?php echo $_smarty_tpl->getSubTemplate ('module:stshoppingcart/views/templates/hook/stshoppingcart-list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div></div><?php }?></div><!-- end /var/www/html/SHN/modules/stshoppingcart/views/templates/hook/stshoppingcart.tpl --><?php }} ?>
