<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:18:07
         compiled from "module:stsidebar/views/templates/hook/rightbar-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2919839315c31abafd82b47-90543166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c5d3614f01ee531b413b9ce188b3c8d8690f744' => 
    array (
      0 => 'module:stsidebar/views/templates/hook/rightbar-item.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '2919839315c31abafd82b47-90543166',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sidebar_item' => 0,
    'cart' => 0,
    'link' => 0,
    'compared_products' => 0,
    'products_viewed_nbr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31abafdccbe7_83018391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31abafdccbe7_83018391')) {function content_5c31abafdccbe7_83018391($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==1) {?>
	<div id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="rightbar_cart rightbar_wrap rightbar_visi_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['hide_on_mobile'], ENT_QUOTES, 'UTF-8');?>
">
	    <a href="javascript:;" data-name="side_products_cart" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" class="rightbar_tri icon_wrap with_text" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'View my shopping cart','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	        <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-glyph<?php }?> icon_btn"></i>
	        <span class="icon_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Cart','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	        <span class="ajax_cart_quantity amount_circle <?php if ($_smarty_tpl->tpl_vars['cart']->value['products_count']==0) {?> simple_hidden <?php }?><?php if ($_smarty_tpl->tpl_vars['cart']->value['products_count']>9) {?> dozens <?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['products_count'], ENT_QUOTES, 'UTF-8');?>
</span>
	    </a>
	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==2) {?>
	<section id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="rightbar_compare rightbar_wrap rightbar_visi_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['hide_on_mobile'], ENT_QUOTES, 'UTF-8');?>
">
	    <a class="rightbar_tri icon_wrap with_text" data-name="side_products_compared" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getPageLink('products-comparison'),'html'), ENT_QUOTES, 'UTF-8');?>
" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Compare Products','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	        <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-adjust<?php }?> icon_btn"></i>
	        <span class="icon_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Compare','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	        <span class="compare_quantity amount_circle <?php if (!count($_smarty_tpl->tpl_vars['compared_products']->value)) {?> simple_hidden <?php }?><?php if (count($_smarty_tpl->tpl_vars['compared_products']->value)>9) {?> dozens <?php }?>"><?php echo htmlspecialchars(count($_smarty_tpl->tpl_vars['compared_products']->value), ENT_QUOTES, 'UTF-8');?>
</span>
	    </a>
	</section>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==3) {?>
	<div id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="rightbar_viewed rightbar_wrap rightbar_visi_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['hide_on_mobile'], ENT_QUOTES, 'UTF-8');?>
">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_viewed" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Recently Viewed','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	        <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-history<?php }?>"></i>
	        <span class="icon_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Viewed','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	        <span class="products_viewed_nbr amount_circle <?php if ($_smarty_tpl->tpl_vars['products_viewed_nbr']->value>9) {?> dozens <?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['products_viewed_nbr']->value, ENT_QUOTES, 'UTF-8');?>
</span>
	    </a>
	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==4) {?>
	<div id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="rightbar_qrcode rightbar_wrap rightbar_visi_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['hide_on_mobile'], ENT_QUOTES, 'UTF-8');?>
">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_qrcode" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'QR code','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	        <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-qrcode<?php }?>"></i>
	        <span class="icon_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'QR code','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	    </a>
	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==5) {?>
	<div id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="to_top_wrap rightbar_wrap rightbar_visi_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['hide_on_mobile'], ENT_QUOTES, 'UTF-8');?>
">
	    <a href="#top_bar" class="to_top_btn icon_wrap with_text" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Back to top','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>"><i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-up-open-2<?php }?>"></i><span class="icon_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Top','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span></a>
	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==6) {?>
	<div  id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="rightbar_menu rightbar_wrap rightbar_visi_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['hide_on_mobile'], ENT_QUOTES, 'UTF-8');?>
">
		<a class="rightbar_tri icon_wrap with_text" data-name="side_stmobilemenu" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" href="javascript:;" rel="nofollow" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Menu','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
		    <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-menu<?php }?>"></i>
		    <span class="icon_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Menu','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
		</a>
	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==7) {?>
	<div id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="rightbar_nav rightbar_wrap rightbar_visi_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['hide_on_mobile'], ENT_QUOTES, 'UTF-8');?>
">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_mobile_nav" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Settings','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	        <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-ellipsis<?php }?>"></i>
	        <span class="icon_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Settings','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	    </a>
	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==8) {?>
	<div id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="rightbar_search rightbar_wrap rightbar_visi_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['hide_on_mobile'], ENT_QUOTES, 'UTF-8');?>
">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_search" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Search','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	        <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-search-1<?php }?> icon_btn"></i>
	        <span class="icon_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Search','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	    </a>
	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==9) {?>
	<div id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="rightbar_share rightbar_wrap rightbar_visi_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['hide_on_mobile'], ENT_QUOTES, 'UTF-8');?>
">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_share" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Share','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	        <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-share-1<?php }?>"></i>
	        <span class="icon_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Share','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	    </a>
	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==10) {?>
	<div id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="rightbar_viewed rightbar_wrap rightbar_visi_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['hide_on_mobile'], ENT_QUOTES, 'UTF-8');?>
">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_loved" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" title="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Loved products','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>">
	        <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-heart-4<?php }?> icon_btn"></i>
	        <span class="icon_text"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Loved','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></span>
	        
	    </a>
	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==11||$_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==12) {?>
<?php } else { ?>
	<div id="rightbar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" class="rightbar_custom rightbar_wrap rightbar_visi_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['hide_on_mobile'], ENT_QUOTES, 'UTF-8');?>
">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_custom_sidebar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
" data-direction="open_bar_<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['direction']==2) {?>left<?php } else { ?>right<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
">
	        <i class="<?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-info-circled<?php }?>"></i>
	        <span class="icon_text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
</span>
	    </a>
	</div>
<?php }?>
<?php }} ?>
