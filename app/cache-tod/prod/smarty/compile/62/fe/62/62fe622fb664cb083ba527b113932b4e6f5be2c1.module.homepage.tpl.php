<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 03:15:42
         compiled from "module:stthemeeditor/views/templates/slider/homepage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4633732345c31e35eab5373-79072966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62fe622fb664cb083ba527b113932b4e6f5be2c1' => 
    array (
      0 => 'module:stthemeeditor/views/templates/slider/homepage.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '4633732345c31e35eab5373-79072966',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'blogs' => 0,
    'homeverybottom' => 0,
    'pro_per_fw' => 0,
    'column_slider' => 0,
    'pro_or_blog_slider' => 0,
    'aw_display' => 0,
    'module' => 0,
    'hook_hash' => 0,
    'hide_mob' => 0,
    'countdown_on' => 0,
    'column_fix' => 0,
    'has_background_img' => 0,
    'speed' => 0,
    'is_quarter' => 0,
    'video_mpfour' => 0,
    'bg_img_v_offset' => 0,
    'video_webm' => 0,
    'video_ogg' => 0,
    'video_poster' => 0,
    'video_loop' => 0,
    'video_muted' => 0,
    'video_v_offset' => 0,
    'bu_full_width' => 0,
    'custom_content' => 0,
    'display_as_grid' => 0,
    'title_position' => 0,
    'is_blog' => 0,
    'stblog' => 0,
    'sttheme' => 0,
    'title_link' => 0,
    'url_entity' => 0,
    'title' => 0,
    'direction_nav' => 0,
    'hide_direction_nav_on_mob' => 0,
    'view_more' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31e35eaf7fa3_50156735',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31e35eaf7fa3_50156735')) {function content_5c31e35eaf7fa3_50156735($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars["pro_or_blog_slider"] = new Smarty_variable(0, null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?><?php $_smarty_tpl->tpl_vars['pro_or_blog_slider'] = new Smarty_variable(1, null, 0);?><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['blogs']->value)&&$_smarty_tpl->tpl_vars['blogs']->value) {?><?php $_smarty_tpl->tpl_vars['pro_or_blog_slider'] = new Smarty_variable(2, null, 0);?><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value&&!$_smarty_tpl->tpl_vars['pro_per_fw']->value) {?><?php $_smarty_tpl->tpl_vars["bu_full_width"] = new Smarty_variable(true, null, 0);?><?php } else { ?><?php $_smarty_tpl->tpl_vars["bu_full_width"] = new Smarty_variable(false, null, 0);?><?php }?>
<?php $_smarty_tpl->tpl_vars["column_fix"] = new Smarty_variable('', null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value) {?><?php $_smarty_tpl->tpl_vars['column_fix'] = new Smarty_variable("_column", null, 0);?><?php }?>
<?php if ($_smarty_tpl->tpl_vars['pro_or_blog_slider']->value||(isset($_smarty_tpl->tpl_vars['aw_display']->value)&&$_smarty_tpl->tpl_vars['aw_display']->value)) {?>
<div id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module']->value, ENT_QUOTES, 'UTF-8');?>
_container_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['hook_hash']->value, ENT_QUOTES, 'UTF-8');?>
" class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module']->value, ENT_QUOTES, 'UTF-8');?>
_container <?php if ($_smarty_tpl->tpl_vars['hide_mob']->value) {?> hidden-xs <?php }?> block <?php if ($_smarty_tpl->tpl_vars['pro_or_blog_slider']->value==1&&$_smarty_tpl->tpl_vars['countdown_on']->value) {?> s_countdown_block <?php }?> <?php if (!$_smarty_tpl->tpl_vars['column_fix']->value&&$_smarty_tpl->tpl_vars['has_background_img']->value&&$_smarty_tpl->tpl_vars['speed']->value) {?> st_parallax_block <?php }?> products_container<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['column_fix']->value, ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['column_slider']->value&&!isset($_smarty_tpl->tpl_vars['is_quarter']->value)) {?> column_block <?php }?> <?php if (!$_smarty_tpl->tpl_vars['column_fix']->value&&$_smarty_tpl->tpl_vars['video_mpfour']->value) {?> video_bg_block <?php }?>" 
<?php if (!$_smarty_tpl->tpl_vars['column_fix']->value&&$_smarty_tpl->tpl_vars['has_background_img']->value&&$_smarty_tpl->tpl_vars['speed']->value) {?> data-stellar-background-ratio="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['speed']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['bg_img_v_offset']->value) {?> data-stellar-vertical-offset="<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['bg_img_v_offset']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php }?>
<?php if (!$_smarty_tpl->tpl_vars['column_fix']->value&&$_smarty_tpl->tpl_vars['video_mpfour']->value) {?> data-vide-bg="mp4: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video_mpfour']->value, ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['video_webm']->value) {?>, webm: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video_webm']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['video_ogg']->value) {?>, ogv: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video_ogg']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['video_poster']->value) {?>, poster: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video_poster']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>" data-vide-options="loop: <?php if ($_smarty_tpl->tpl_vars['video_loop']->value) {?>true<?php } else { ?>false<?php }?>, muted: <?php if ($_smarty_tpl->tpl_vars['video_muted']->value) {?>true<?php } else { ?>false<?php }?>, position: 50% <?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['video_v_offset']->value, ENT_QUOTES, 'UTF-8');?>
%" <?php }?>>
<?php if ($_smarty_tpl->tpl_vars['bu_full_width']->value) {?><div class="wide_container"><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value) {?><div class="<?php if ($_smarty_tpl->tpl_vars['bu_full_width']->value) {?>container<?php } else { ?>container-fluid<?php }?>"><?php }?>
<section class="products_section" >

    <div class="row flex_lg_container flex_stretch">
        <?php if (isset($_smarty_tpl->tpl_vars['custom_content']->value)&&$_smarty_tpl->tpl_vars['custom_content']->value&&$_smarty_tpl->tpl_vars['custom_content']->value[10]['width']) {?>
            <?php echo $_smarty_tpl->tpl_vars['custom_content']->value[10]['content'];?>

        <?php }?>
        <div class="col-lg-<?php if (isset($_smarty_tpl->tpl_vars['custom_content']->value)&&$_smarty_tpl->tpl_vars['custom_content']->value) {?><?php echo htmlspecialchars(12-$_smarty_tpl->tpl_vars['custom_content']->value[10]['width']-$_smarty_tpl->tpl_vars['custom_content']->value[30]['width'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>12<?php }?> products_slider <?php if ($_smarty_tpl->tpl_vars['display_as_grid']->value==1) {?> display_as_grid <?php } elseif ($_smarty_tpl->tpl_vars['display_as_grid']->value==2) {?> display_as_simple <?php }?>"> <!-- to do what if the sum of left and right contents larger than 12 -->
    
    <?php if ($_smarty_tpl->tpl_vars['title_position']->value!=3) {?>
	<div class="title_block flex_container title_align_<?php if ($_smarty_tpl->tpl_vars['column_slider']->value) {?>0<?php } else { ?><?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['title_position']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> title_style_<?php if (isset($_smarty_tpl->tpl_vars['is_blog']->value)&&$_smarty_tpl->tpl_vars['is_blog']->value) {?><?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['stblog']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['sttheme']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
<?php }?>">
        <div class="flex_child title_flex_left"></div>
        <?php if ((isset($_smarty_tpl->tpl_vars['title_link']->value)&&$_smarty_tpl->tpl_vars['title_link']->value)||(isset($_smarty_tpl->tpl_vars['url_entity']->value)&&$_smarty_tpl->tpl_vars['url_entity']->value)) {?>
        <a href="<?php if (isset($_smarty_tpl->tpl_vars['title_link']->value)&&$_smarty_tpl->tpl_vars['title_link']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title_link']->value, ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>$_smarty_tpl->tpl_vars['url_entity']->value),$_smarty_tpl);?>
<?php }?>" class="title_block_inner" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>
</a>
        <?php } else { ?>
        <div class="title_block_inner"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>
</div>
        <?php }?>
        <div class="flex_child title_flex_right"></div>
        <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value&&((!$_smarty_tpl->tpl_vars['display_as_grid']->value&&$_smarty_tpl->tpl_vars['direction_nav']->value==1)||$_smarty_tpl->tpl_vars['column_slider']->value)&&((isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value)||(isset($_smarty_tpl->tpl_vars['blogs']->value)&&$_smarty_tpl->tpl_vars['blogs']->value))) {?>
            <div class="swiper-button-tr <?php if ($_smarty_tpl->tpl_vars['hide_direction_nav_on_mob']->value) {?> hidden-md-down <?php }?>"><div class="swiper-button swiper-button-outer swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div><div class="swiper-button swiper-button-outer swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div></div>        
        <?php }?>
    </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['direction_nav']->value==1) {?>
        <?php $_smarty_tpl->tpl_vars['direction_nav'] = new Smarty_variable(5, null, 0);?>
    <?php }?>
    
    <?php if (isset($_smarty_tpl->tpl_vars['custom_content']->value)&&$_smarty_tpl->tpl_vars['custom_content']->value) {?><?php echo $_smarty_tpl->tpl_vars['custom_content']->value[1]['content'];?>
<?php }?>

        <?php if ($_smarty_tpl->tpl_vars['pro_or_blog_slider']->value==1) {?>
            <?php if (!$_smarty_tpl->tpl_vars['display_as_grid']->value||$_smarty_tpl->tpl_vars['column_slider']->value) {?>
            <div class="block_content">
                <?php echo $_smarty_tpl->getSubTemplate ("catalog/slider/product-slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("catalog/slider/script.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('block_name'=>"#".((string)$_smarty_tpl->tpl_vars['module']->value)."_container_".((string)$_smarty_tpl->tpl_vars['hook_hash']->value)), 0);?>

            <?php } elseif ($_smarty_tpl->tpl_vars['display_as_grid']->value==2) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("catalog/listing/product-list-simple.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('for_f'=>((string)$_smarty_tpl->tpl_vars['module']->value)), 0);?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/list-item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('class'=>((string)$_smarty_tpl->tpl_vars['module']->value)."_grid",'for_f'=>((string)$_smarty_tpl->tpl_vars['module']->value)), 0);?>

            <?php }?>
    	<?php } elseif ($_smarty_tpl->tpl_vars['pro_or_blog_slider']->value==2) {?>
            <?php if (!$_smarty_tpl->tpl_vars['display_as_grid']->value||$_smarty_tpl->tpl_vars['column_slider']->value) {?>
            <div class="block_content">
                <?php echo $_smarty_tpl->getSubTemplate ("module:stblog/views/templates/slider/slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("catalog/slider/script.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('block_name'=>"#".((string)$_smarty_tpl->tpl_vars['module']->value)."_container_".((string)$_smarty_tpl->tpl_vars['hook_hash']->value),'is_product_slider'=>0), 0);?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->getSubTemplate ("module:stblog/views/templates/slider/list-item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('for_f'=>((string)$_smarty_tpl->tpl_vars['module']->value)), 0);?>

            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['pro_or_blog_slider']->value) {?>
            <?php if (isset($_smarty_tpl->tpl_vars['view_more']->value)&&$_smarty_tpl->tpl_vars['view_more']->value&&((isset($_smarty_tpl->tpl_vars['title_link']->value)&&$_smarty_tpl->tpl_vars['title_link']->value)||(isset($_smarty_tpl->tpl_vars['url_entity']->value)&&$_smarty_tpl->tpl_vars['url_entity']->value))) {?><div class="product_view_more_box text-center"><a href="<?php if (isset($_smarty_tpl->tpl_vars['title_link']->value)&&$_smarty_tpl->tpl_vars['title_link']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title_link']->value, ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>$_smarty_tpl->tpl_vars['url_entity']->value),$_smarty_tpl);?>
<?php }?>" class="btn btn-default btn-more-padding btn-large" title="<?php echo smartyTranslate(array('s'=>'View more','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'View more','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a></div><?php }?>
        <?php } else { ?>
            <div class="block_content"><?php echo smartyTranslate(array('s'=>'No items','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</div>
    	<?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['custom_content']->value)&&$_smarty_tpl->tpl_vars['custom_content']->value) {?><?php echo $_smarty_tpl->tpl_vars['custom_content']->value[2]['content'];?>
<?php }?>
        </div>
        <?php if (isset($_smarty_tpl->tpl_vars['custom_content']->value)&&$_smarty_tpl->tpl_vars['custom_content']->value&&$_smarty_tpl->tpl_vars['custom_content']->value[30]['width']) {?>
            <?php echo $_smarty_tpl->tpl_vars['custom_content']->value[30]['content'];?>

        <?php }?>
    </div>
</section>
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value) {?></div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['bu_full_width']->value) {?></div><?php }?>
</div>
<?php }?><?php }} ?>
