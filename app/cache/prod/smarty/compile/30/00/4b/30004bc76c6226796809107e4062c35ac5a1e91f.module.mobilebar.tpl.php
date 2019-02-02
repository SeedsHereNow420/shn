<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:08
         compiled from "module:stsidebar/views/templates/hook/mobilebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17594234865c32fda8e9e518-29416136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30004bc76c6226796809107e4062c35ac5a1e91f' => 
    array (
      0 => 'module:stsidebar/views/templates/hook/mobilebar.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '17594234865c32fda8e9e518-29416136',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mobilebar' => 0,
    'sidebar_item' => 0,
    'cart' => 0,
    'products_viewed_nbr' => 0,
    'sttheme' => 0,
    'quick_search_mobile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fda929e4c2_72888299',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fda929e4c2_72888299')) {function content_5c32fda929e4c2_72888299($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['mobilebar']->value)) {?>
<?php  $_smarty_tpl->tpl_vars['sidebar_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sidebar_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mobilebar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sidebar_item']->key => $_smarty_tpl->tpl_vars['sidebar_item']->value) {
$_smarty_tpl->tpl_vars['sidebar_item']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==1) {?>
	<a id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" href="javascript:;" rel="nofollow" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'View my shopping cart','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>" class="cart_mobile_bar_tri mobile_bar_tri mobile_bar_item shopping_cart_style_2" data-name="side_products_cart" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>">
		<div class="ajax_cart_bag">
			<span class="ajax_cart_quantity amount_circle <?php if ($_smarty_tpl->tpl_vars['cart']->value['products_count']>9) {?> dozens <?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['products_count'], ENT_QUOTES, 'UTF-8');?>
</span>
			<span class="ajax_cart_bg_handle"></span>
			<i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-glyph<?php }?> icon_btn fs_xl"></i>
		</div>
		<span class="mobile_bar_tri_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Cart','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	</a>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==2) {?>
	
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==3) {?>
	<a id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="viewed_mobile_bar_tri mobile_bar_item mobile_bar_tri" data-name="side_viewed" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" href="javascript:;" rel="nofollow" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Recently Viewed','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	    <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-history<?php }?> fs_xl"></i>
	    <span class="mobile_bar_tri_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Viewed','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['products_viewed_nbr']->value, ENT_QUOTES, 'UTF-8');?>
)</span>
	</a>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==4) {?>
	<a id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="qrcode_mobile_bar_tri mobile_bar_item mobile_bar_tri" data-name="side_qrcode" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" href="javascript:;" rel="nofollow" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'QR code','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	    <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-qrcode<?php }?> fs_xl"></i>
	    <span class="mobile_bar_tri_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'QR code','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	</a>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==5) {?>
	<a id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="to_top_mobile_bar_tri mobile_bar_item"  href="#top_bar" rel="nofollow" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Top','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	    <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-up-open-2<?php }?> fs_xl"></i>
	    <span class="mobile_bar_tri_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Top','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	</a>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==6) {?>
	<a id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="menu_mobile_bar_tri mobile_bar_item mobile_bar_tri <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['menu_icon_with_text']==1) {?> with_text<?php }?>" data-name="side_stmobilemenu" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" href="javascript:;" rel="nofollow" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Menu','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	    <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-menu<?php }?> fs_xl"></i>
	    <span class="mobile_bar_tri_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Menu','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	</a>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==7) {?>
	<a id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="customer_mobile_bar_tri mobile_bar_item mobile_bar_tri" data-name="side_mobile_nav" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" href="javascript:;" rel="nofollow" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Settings','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	    <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-ellipsis<?php }?> fs_xl"></i>
	    <span class="mobile_bar_tri_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Settings','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	</a>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==8) {?>
	<?php if (!isset($_smarty_tpl->tpl_vars['quick_search_mobile']->value)||!$_smarty_tpl->tpl_vars['quick_search_mobile']->value) {?>
	<a id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" href="javascript:;" data-name="side_search" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" class="search_mobile_bar_tri mobile_bar_tri mobile_bar_item" rel="nofollow" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Search','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	    <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-search-1<?php }?> fs_xl"></i>
	    <span class="mobile_bar_tri_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Search','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	</a>
	<?php } else { ?>
		<?php echo $_smarty_tpl->getSubTemplate ('module:stsearchbar/views/templates/hook/stsearchbar-block.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==9) {?>
	<a id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" href="javascript:;" data-name="side_share" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" class="share_mobile_bar_tri mobile_bar_tri mobile_bar_item" rel="nofollow" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Share','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	    <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-share-1<?php }?> fs_xl"></i>
	    <span class="mobile_bar_tri_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Share','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	</a>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==10) {?>
	<a id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" href="javascript:;" data-name="side_loved" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" class="loved_mobile_bar_tri mobile_bar_tri mobile_bar_item" rel="nofollow" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Loved','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	    <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-heart-4<?php }?> fs_xl"></i>
	    <span class="mobile_bar_tri_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Loved','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	</a>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==11||$_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==12) {?>
<?php } else { ?>
	<a id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" href="javascript:;" data-name="side_custom_sidebar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" class="custom_mobile_bar_tri mobile_bar_tri mobile_bar_item" rel="nofollow" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
">
	    <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-info-circled<?php }?> fs_xl"></i>
	    <span class="mobile_bar_tri_text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
</span>
	</a>
<?php }?>
<?php } ?>
<?php }?>
<?php }} ?>
