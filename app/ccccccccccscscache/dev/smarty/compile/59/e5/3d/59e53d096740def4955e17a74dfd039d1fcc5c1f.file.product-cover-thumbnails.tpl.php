<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:08:31
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-cover-thumbnails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7584675025c319b5f56bc44-63565838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59e53d096740def4955e17a74dfd039d1fcc5c1f' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-cover-thumbnails.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'ca6d163464ea9f351e641e98f17b9b4aad19d000' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/miniatures/sticker.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '78606e7de160fb34c3b7441db7d78b804cb8e201' => 
    array (
      0 => 'module:stvideo/views/templates/hook/stvideo.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
    '1151c2c7524115caa39787a245346cf37856866f' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-cover-item.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'd5101ef76064ebc7e852c3f205ee884223eba3a5' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-thumbnails-item.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7584675025c319b5f56bc44-63565838',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'sttheme' => 0,
    'image_count' => 0,
    'gallery_thumbnails_width_v_mobile' => 0,
    'gallery_top_width_v_mobile' => 0,
    'gallery_top_width_v' => 0,
    'extra' => 0,
    'pro_popup_trigger' => 0,
    'image' => 0,
    'language' => 0,
    'index' => 0,
    'curr_combination_thumbs' => 0,
    'slidesPerView' => 0,
    'pro_gallery_initial' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c319b5f62b778_95671037',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c319b5f62b778_95671037')) {function content_5c319b5f62b778_95671037($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>
<?php $_smarty_tpl->tpl_vars["image_count"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['product']->value['images']), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']==2) {?><?php $_smarty_tpl->tpl_vars['image_count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['sttheme']->value['pro_images']), null, 0);?><?php }?>
<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==6&&$_smarty_tpl->tpl_vars['image_count']->value<2) {?><?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 5;?><?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==6&&$_smarty_tpl->tpl_vars['image_count']->value>1) {?><?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 0;?><?php }?>
<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['is_mobile_device']) {?>
    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==5&&$_smarty_tpl->tpl_vars['image_count']->value<2) {?><?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile'] = 3;?><?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==5&&$_smarty_tpl->tpl_vars['image_count']->value>1) {?><?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile'] = 4;?><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==1) {?>
      <?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 3;?>
    <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==2) {?>
      <?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 4;?>
    <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==3) {?>
      <?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 5;?>
    <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==4) {?>
      <?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 0;?>
    <?php }?>
<?php }?>
<div class="images-container pro_number_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
">
<div class="images-container-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1||$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==2) {?> row <?php }?>">
<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v']) {?><?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v'] = 3;?><?php }?>
<?php $_smarty_tpl->tpl_vars["gallery_top_width_v"] = new Smarty_variable(12-$_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v'], null, 0);?>
<?php $_smarty_tpl->tpl_vars["gallery_thumbnails_width_v_mobile"] = new Smarty_variable(floor($_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v'])+1, null, 0);?>
<?php $_smarty_tpl->tpl_vars["gallery_top_width_v_mobile"] = new Smarty_variable(12-$_smarty_tpl->tpl_vars['gallery_thumbnails_width_v_mobile']->value, null, 0);?>
<div class="pro_gallery_top_container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1||$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==2) {?> col-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_top_width_v_mobile']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-md-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_top_width_v']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 <?php }?><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1) {?> push-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_thumbnails_width_v_mobile']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 push-md-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v'],'.','-'), ENT_QUOTES, 'UTF-8');?>
 <?php }?> mb-3">
  <div class="pro_gallery_top_inner posi_rel">
  
    <?php  $_smarty_tpl->tpl_vars['extra'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extra']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['extraContent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['extra']->key => $_smarty_tpl->tpl_vars['extra']->value) {
$_smarty_tpl->tpl_vars['extra']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['extra']->value['moduleName']=='ststickers') {?>
            <?php /*  Call merged included template "catalog/_partials/miniatures/sticker.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/miniatures/sticker.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stickers'=>$_smarty_tpl->tpl_vars['extra']->value['content'],'sticker_position'=>array(0,1,2,3,4,5,6,7,8,9),'sticker_sold_out'=>(!$_smarty_tpl->tpl_vars['product']->value['add_to_cart_url'])), 0, '7584675025c319b5f56bc44-63565838');
content_5c319b5f588dd1_31529297($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/miniatures/sticker.tpl" */?>
        <?php } elseif ($_smarty_tpl->tpl_vars['extra']->value['moduleName']=='stvideo') {?>
            <div class="st_popup_video_wrap">
            <?php /*  Call merged included template "module:stvideo/views/templates/hook/stvideo.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("module:stvideo/views/templates/hook/stvideo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stvideos'=>$_smarty_tpl->tpl_vars['extra']->value['content']['videos'],'video_position'=>array(1,2,3,4,5,6,7,8,9,12)), 0, '7584675025c319b5f56bc44-63565838');
content_5c319b5f5b7001_60407263($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "module:stvideo/views/templates/hook/stvideo.tpl" */?>
            </div>
        <?php }?>
    <?php } ?>
  

  
  
    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_thickbox']) {?>
      <div class="pro_popup_trigger_box">
      <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']==2) {?>
        <?php $_smarty_tpl->tpl_vars['pro_popup_trigger'] = new Smarty_variable($_smarty_tpl->tpl_vars['sttheme']->value['pro_images'], null, 0);?>
      <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['pro_popup_trigger'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['images'], null, 0);?>
      <?php }?>
      <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pro_popup_trigger']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
        
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['superlarge_default']['url'], ENT_QUOTES, 'UTF-8');?>
" class="pro_popup_trigger st_popup_image st_pro_popup_image replace-2x layer_icon_wrap" data-group="pro_gallery_popup_trigger" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"><i class="fto-resize-full"></i></a>
      <?php } ?>
      </div>
    <?php }?>
    <div class="swiper-container pro_gallery_top swiper-button-lr <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['thumbs_direction_nav']==3) {?> swiper-navigation-rectangle <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['thumbs_direction_nav']==2) {?> swiper-navigation-arrow <?php } else { ?> swiper-navigation-circle <?php }?>" <?php if ($_smarty_tpl->tpl_vars['language']->value['is_rtl']) {?> dir="rtl" <?php }?>>
        <div class="swiper-wrapper">
            <?php $_smarty_tpl->tpl_vars['pro_gallery_initial'] = new Smarty_variable(0, null, 0);?>
              <?php $_smarty_tpl->tpl_vars["curr_combination_thumbs"] = new Smarty_variable(array(), null, 0);?>
              <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image']==$_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?><?php $_smarty_tpl->tpl_vars['pro_gallery_initial'] = new Smarty_variable($_smarty_tpl->tpl_vars['index']->value, null, 0);?><?php }?>
                <?php $_smarty_tpl->createLocalArrayVariable('curr_combination_thumbs', null, 0);
$_smarty_tpl->tpl_vars['curr_combination_thumbs']->value[] = $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
                <?php /*  Call merged included template "catalog/_partials/product-cover-item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-cover-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '7584675025c319b5f56bc44-63565838');
content_5c319b5f5c8f22_94320813($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-cover-item.tpl" */?>
              <?php } ?>
              <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']==2) {?>
                <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sttheme']->value['pro_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
                  <?php if (!in_array($_smarty_tpl->tpl_vars['image']->value['id_image'],$_smarty_tpl->tpl_vars['curr_combination_thumbs']->value)) {?>
                    <?php /*  Call merged included template "catalog/_partials/product-cover-item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-cover-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '7584675025c319b5f56bc44-63565838');
content_5c319b5f5c8f22_94320813($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-cover-item.tpl" */?>
                  <?php }?>
                <?php } ?>
              <?php }?>
        </div>
        <div class="swiper-button swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        <div class="swiper-button swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==4) {?><div class="swiper-pagination"></div><?php }?>
    </div>
    <script type="text/javascript">
    //<![CDATA[
        
        if(typeof(swiper_options) ==='undefined')
        var swiper_options = [];
        
        
        swiper_options.push({
            
            id_st: '.pro_gallery_top',
            spaceBetween: <?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['sttheme']->value['gallery_spacing'], ENT_QUOTES, 'UTF-8');?>
,
            nextButton: '.pro_gallery_top .swiper-button-next',
            prevButton: '.pro_gallery_top .swiper-button-prev',
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==4) {?>
            pagination: '.pro_gallery_top .swiper-pagination',
            <?php }?>
            loop: false,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==3&&$_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_fw']) {?>
                <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_fw'], null, 0);?>
            <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>
                    <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xxl'], null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']>=1) {?>
                    <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xl'], null, 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_lg'], null, 0);?>
                <?php }?>
            <?php }?>
            slidesPerView: <?php if ($_smarty_tpl->tpl_vars['slidesPerView']->value<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slidesPerView']->value, ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>,
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive']) {?>
            
            breakpoints: {
                
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==3&&$_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_fw']) {?>1600: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xxl']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xxl'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> },<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']>=2) {?>1440: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xl']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xl'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> },<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']>=1) {?>1200: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_lg']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_lg'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> },<?php }?>
                992: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_md']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_md'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> },
                768: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_sm']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_sm'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> },
                480: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xs']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xs'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> }
            },
            
            <?php }?>
            onSlideChangeEnd: function(swiper){
              prestashop.easyzoom.init(swiper.wrapper.find('.swiper-slide-visible .easyzoom'));
              
              if($('.pro_gallery_thumbs').length && typeof($('.pro_gallery_thumbs')[0].swiper)!=='undefined')
              {
                $('.pro_gallery_thumbs')[0].swiper.slideTo(swiper.activeIndex);
                $($('.pro_gallery_thumbs')[0].swiper.slides).removeClass('clicked_thumb').eq(swiper.activeIndex).addClass('clicked_thumb');
              }
            },
            onInit : function (swiper) {
                  prestashop.easyzoom.init(swiper.wrapper.find('.swiper-slide-visible .easyzoom'));
                  $('.pro_popup_trigger_box a').removeClass('st_active').eq(swiper.activeIndex).addClass('st_active');

                  if($(swiper.slides).length==$(swiper.slides).filter('.swiper-slide-visible').length)
                  {
                      $(swiper.params.nextButton).hide();
                      $(swiper.params.prevButton).hide();
                  }
                  else
                  {
                      $(swiper.params.nextButton).show();
                      $(swiper.params.prevButton).show();
                  }
              },
            onSlideChangeStart : function (swiper) {
                  $('.pro_popup_trigger_box a').removeClass('st_active').eq(swiper.activeIndex).addClass('st_active');
              },
            roundLengths: true,
            lazyLoading: true,
            lazyLoadingInPrevNext: true,
            lazyLoadingInPrevNextAmount: 2,
            initialSlide: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pro_gallery_initial']->value, ENT_QUOTES, 'UTF-8');?>

        
        });
         
    //]]>
    </script>
  
  </div>
</div>
<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=4&&$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=5) {?>
<div class="pro_gallery_thumbs_container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1||$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==2) {?> col-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_thumbnails_width_v_mobile']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-md-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v'],'.','-'), ENT_QUOTES, 'UTF-8');?>
 pro_gallery_thumbs_vertical <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==3) {?> pro_gallery_thumbs_grid <?php } else { ?> pro_gallery_thumbs_horizontal <?php }?><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1) {?> pull-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_top_width_v_mobile']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
  pull-md-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_top_width_v']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 <?php }?>">
  
    <div class="swiper-container pro_gallery_thumbs swiper-button-lr <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['thumbs_direction_nav']==3) {?> swiper-navigation-rectangle <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['thumbs_direction_nav']==2) {?> swiper-navigation-arrow <?php } else { ?> swiper-navigation-circle <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==0) {?> swiper-small-button <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']) {?> hightlight_curr_thumbs <?php }?>" <?php if ($_smarty_tpl->tpl_vars['language']->value['is_rtl']) {?> dir="rtl" <?php }?>>
        <div class="swiper-wrapper">
            <?php $_smarty_tpl->tpl_vars["curr_combination_thumbs"] = new Smarty_variable(array(), null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
              <?php $_smarty_tpl->createLocalArrayVariable('curr_combination_thumbs', null, 0);
$_smarty_tpl->tpl_vars['curr_combination_thumbs']->value[] = $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
              <?php /*  Call merged included template "catalog/_partials/product-thumbnails-item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-thumbnails-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('curr_combination_thumb'=>true,'disable_lazyloading'=>$_smarty_tpl->tpl_vars['pro_gallery_initial']->value), 0, '7584675025c319b5f56bc44-63565838');
content_5c319b5f60a9b8_48749311($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-thumbnails-item.tpl" */?>
            <?php } ?>
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']==2) {?>
              <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sttheme']->value['pro_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
                <?php if (!in_array($_smarty_tpl->tpl_vars['image']->value['id_image'],$_smarty_tpl->tpl_vars['curr_combination_thumbs']->value)) {?>
                  <?php /*  Call merged included template "catalog/_partials/product-thumbnails-item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-thumbnails-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('disable_lazyloading'=>$_smarty_tpl->tpl_vars['pro_gallery_initial']->value), 0, '7584675025c319b5f56bc44-63565838');
content_5c319b5f60a9b8_48749311($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-thumbnails-item.tpl" */?>
                <?php }?>
              <?php } ?>
            <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1||$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==2) {?>
        <div class="swiper-button swiper-button-top"><i class="fto-up-open slider_arrow_top"></i><i class="fto-down-open slider_arrow_bottom"></i></div>
        <div class="swiper-button swiper-button-bottom"><i class="fto-up-open slider_arrow_top"></i><i class="fto-down-open slider_arrow_bottom"></i></div>
        <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==0) {?>
        <div class="swiper-button swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        <div class="swiper-button swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        <?php }?>
    </div>
    <script type="text/javascript">
    //<![CDATA[
    sttheme.product_thumbnails = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'], ENT_QUOTES, 'UTF-8');?>
;
    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=3) {?>
        
        if(typeof(swiper_options) ==='undefined')
        var swiper_options = [];
        
        
        swiper_options.push({
            
            id_st: '.pro_gallery_thumbs',
            spaceBetween: 10,
            slidesPerView: 'auto',
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1||$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==2) {?>
            direction: 'vertical',
            nextButton: '.pro_gallery_thumbs .swiper-button-top',
            prevButton: '.pro_gallery_thumbs .swiper-button-bottom',
            <?php } else { ?>
            nextButton: '.pro_gallery_thumbs .swiper-button-next',
            prevButton: '.pro_gallery_thumbs .swiper-button-prev',
            <?php }?>            
            loop: false,
            slideToClickedSlide: true,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            onSlideChangeEnd: function(swiper){
              if(typeof($('.pro_gallery_top')[0].swiper)!=='undefined')
                $('.pro_gallery_top')[0].swiper.slideTo(swiper.activeIndex);
            },
            onInit : function (swiper) {
                if($(swiper.slides).length==$(swiper.slides).filter('.swiper-slide-visible').length)
                {
                    $(swiper.params.nextButton).hide();
                    $(swiper.params.prevButton).hide();
                }
                else
                {
                    $(swiper.params.nextButton).show();
                    $(swiper.params.prevButton).show();
                }
            },
            onClick: function(swiper){
              if(typeof($('.pro_gallery_top')[0].swiper)!=='undefined')
                $('.pro_gallery_top')[0].swiper.slideTo(swiper.clickedIndex);
              $(swiper.slides).removeClass('clicked_thumb').eq(swiper.clickedIndex).addClass('clicked_thumb');
            },
            roundLengths: true,
            lazyLoading: <?php if ($_smarty_tpl->tpl_vars['pro_gallery_initial']->value) {?>false<?php } else { ?>true<?php }?>,
            lazyLoadingInPrevNext: true,
            lazyLoadingInPrevNextAmount: 2,
            initialSlide: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pro_gallery_initial']->value, ENT_QUOTES, 'UTF-8');?>

        
        });
         
    <?php }?>
    //]]>
    </script>
  
</div>
<?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']==1&&count($_smarty_tpl->tpl_vars['curr_combination_thumbs']->value)<count($_smarty_tpl->tpl_vars['sttheme']->value['pro_images'])) {?>
  <a href="javascript:;" class="btn btn-link pro_gallery_show_all"><?php echo smartyTranslate(array('s'=>'Show all images','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a>
<?php }?>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:08:31
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/miniatures/sticker.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c319b5f588dd1_31529297')) {function content_5c319b5f588dd1_31529297($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["has_sticker_static"] = new Smarty_variable(0, null, 0);?><?php if (isset($_smarty_tpl->tpl_vars['stickers']->value)&&$_smarty_tpl->tpl_vars['stickers']->value) {?><?php  $_smarty_tpl->tpl_vars['ststicker'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ststicker']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stickers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ststicker']->key => $_smarty_tpl->tpl_vars['ststicker']->value) {
$_smarty_tpl->tpl_vars['ststicker']->_loop = true;
?><?php if (in_array($_smarty_tpl->tpl_vars['ststicker']->value['sticker_position'],$_smarty_tpl->tpl_vars['sticker_position']->value)) {?><?php if (!$_smarty_tpl->tpl_vars['has_sticker_static']->value) {?><div class="st_sticker_block"><?php $_smarty_tpl->tpl_vars['has_sticker_static'] = new Smarty_variable(1, null, 0);?><?php }?><div class="st_sticker layer_btn flag_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['ststicker']->value['is_flag'], ENT_QUOTES, 'UTF-8');?>
 <?php if (in_array(10,$_smarty_tpl->tpl_vars['sticker_position']->value)||in_array(11,$_smarty_tpl->tpl_vars['sticker_position']->value)) {?> st_sticker_static <?php }?> st_sticker_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['id_st_sticker'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['type']) {?> st_sticker_type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['type'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?> st_sticker_img <?php }?>"><?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['height'], ENT_QUOTES, 'UTF-8');?>
"><?php } else { ?><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></div><?php }?><?php } ?><?php }?><?php if (isset($_smarty_tpl->tpl_vars['ststickers']->value)&&$_smarty_tpl->tpl_vars['ststickers']->value) {?><?php  $_smarty_tpl->tpl_vars['flag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['flag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['flags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->key => $_smarty_tpl->tpl_vars['flag']->value) {
$_smarty_tpl->tpl_vars['flag']->_loop = true;
?><?php  $_smarty_tpl->tpl_vars['ststicker'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ststicker']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ststickers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ststicker']->key => $_smarty_tpl->tpl_vars['ststicker']->value) {
$_smarty_tpl->tpl_vars['ststicker']->_loop = true;
?><?php if (in_array($_smarty_tpl->tpl_vars['ststicker']->value['sticker_position'],$_smarty_tpl->tpl_vars['sticker_position']->value)&&(($_smarty_tpl->tpl_vars['flag']->value['type']=='new'&&$_smarty_tpl->tpl_vars['ststicker']->value['type']==1)||($_smarty_tpl->tpl_vars['flag']->value['type']=='on-sale'&&$_smarty_tpl->tpl_vars['ststicker']->value['type']==2)||($_smarty_tpl->tpl_vars['flag']->value['type']=='discount'&&$_smarty_tpl->tpl_vars['ststicker']->value['type']==3)||($_smarty_tpl->tpl_vars['flag']->value['type']=='online-only'&&$_smarty_tpl->tpl_vars['ststicker']->value['type']==5)||($_smarty_tpl->tpl_vars['flag']->value['type']=='pack'&&$_smarty_tpl->tpl_vars['ststicker']->value['type']==6))) {?><?php if (!$_smarty_tpl->tpl_vars['has_sticker_static']->value) {?><div class="st_sticker_block"><?php $_smarty_tpl->tpl_vars['has_sticker_static'] = new Smarty_variable(1, null, 0);?><?php }?><div class="st_sticker layer_btn flag_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['ststicker']->value['is_flag'], ENT_QUOTES, 'UTF-8');?>
 <?php if (in_array(10,$_smarty_tpl->tpl_vars['sticker_position']->value)||in_array(11,$_smarty_tpl->tpl_vars['sticker_position']->value)) {?> st_sticker_static <?php }?> st_sticker_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['id_st_sticker'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['type']) {?> st_sticker_type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['type'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?> st_sticker_img <?php }?>"><?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
"  width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['height'], ENT_QUOTES, 'UTF-8');?>
"><?php } else { ?><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></div><?php }?><?php } ?><?php } ?><?php  $_smarty_tpl->tpl_vars['ststicker'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ststicker']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ststickers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ststicker']->key => $_smarty_tpl->tpl_vars['ststicker']->value) {
$_smarty_tpl->tpl_vars['ststicker']->_loop = true;
?><?php if (in_array($_smarty_tpl->tpl_vars['ststicker']->value['sticker_position'],$_smarty_tpl->tpl_vars['sticker_position']->value)&&(($_smarty_tpl->tpl_vars['ststicker']->value['type']==4&&$_smarty_tpl->tpl_vars['sticker_sold_out']->value)||($_smarty_tpl->tpl_vars['ststicker']->value['type']==7&&!$_smarty_tpl->tpl_vars['sticker_sold_out']->value))) {?><?php if (!$_smarty_tpl->tpl_vars['has_sticker_static']->value) {?><div class="st_sticker_block"><?php $_smarty_tpl->tpl_vars['has_sticker_static'] = new Smarty_variable(1, null, 0);?><?php }?><div class="st_sticker layer_btn flag_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['ststicker']->value['is_flag'], ENT_QUOTES, 'UTF-8');?>
 <?php if (in_array(10,$_smarty_tpl->tpl_vars['sticker_position']->value)||in_array(11,$_smarty_tpl->tpl_vars['sticker_position']->value)) {?> st_sticker_static <?php }?> st_sticker_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['id_st_sticker'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['type']) {?> st_sticker_type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['type'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?> st_sticker_img <?php }?>"><?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
"  width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['height'], ENT_QUOTES, 'UTF-8');?>
"><?php } else { ?><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></div><?php }?><?php } ?><?php }?><?php if ($_smarty_tpl->tpl_vars['has_sticker_static']->value) {?></div><?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:08:31
         compiled from "module:stvideo/views/templates/hook/stvideo.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c319b5f5b7001_60407263')) {function content_5c319b5f5b7001_60407263($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/stvideo/views/templates/hook/stvideo.tpl --><?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['video']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stvideos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['video']->value['url']&&in_array($_smarty_tpl->tpl_vars['video']->value['video_position'],$_smarty_tpl->tpl_vars['video_position']->value)) {?>
<a class="st_popup_video layer_icon_wrap <?php if ($_smarty_tpl->tpl_vars['video']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['video']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?>" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Open video','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow"><i class="fto-play"></i></a>
<?php }?>
<?php } ?><!-- end /var/www/html/SHN/modules/stvideo/views/templates/hook/stvideo.tpl --><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:08:31
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-cover-item.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c319b5f5c8f22_94320813')) {function content_5c319b5f5c8f22_94320813($_smarty_tpl) {?>
              <div class="swiper-slide">
                <div class="easyzoom--overlay <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']) {?> easyzoom <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']==2) {?> disable_easyzoom_on_mobile <?php }?>">
                    <a href="<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']==1||($_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']==2&&!$_smarty_tpl->tpl_vars['sttheme']->value['is_mobile_device'])||$_smarty_tpl->tpl_vars['sttheme']->value['enable_thickbox']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['superlarge_default']['url'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>" class="<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_thickbox']&&!$_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']) {?> st_popup_image st_pro_popup_image <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['retina']&&isset($_smarty_tpl->tpl_vars['image']->value['bySize']['superlarge_default_2x']['url'])) {?> replace-2x <?php }?>" <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_thickbox']&&!$_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']) {?> data-group="pro_gallery_popup" <?php }?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
">
                        <img
                          class="pro_gallery_item <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']) {?>swiper-lazy<?php }?>"
                          <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']) {?>data-<?php }?>src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['gallery_image_type']]['url'], ENT_QUOTES, 'UTF-8');?>
"
                          <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['retina']&&isset($_smarty_tpl->tpl_vars['image']->value['bySize'][($_smarty_tpl->tpl_vars['sttheme']->value['gallery_image_type']).('_2x')]['url'])) {?> <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']) {?>data-<?php }?>srcset="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][($_smarty_tpl->tpl_vars['sttheme']->value['gallery_image_type']).('_2x')]['url'], ENT_QUOTES, 'UTF-8');?>
 2x" <?php }?>
                          alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
                          title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
                          width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['gallery_image_type']]['width'], ENT_QUOTES, 'UTF-8');?>
"
                          height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['gallery_image_type']]['height'], ENT_QUOTES, 'UTF-8');?>
"
                          data-id_image="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['id_image'], ENT_QUOTES, 'UTF-8');?>
"
                          <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['google_rich_snippets']) {?> itemprop="image" <?php }?>
                        />
                    </a>
                </div>
              </div><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:08:31
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-thumbnails-item.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c319b5f60a9b8_48749311')) {function content_5c319b5f60a9b8_48749311($_smarty_tpl) {?>
              <div class="swiper-slide <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image']==$_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?> clicked_thumb <?php }?>">
                <div class="pro_gallery_thumb_box general_border <?php if (isset($_smarty_tpl->tpl_vars['curr_combination_thumb']->value)&&$_smarty_tpl->tpl_vars['curr_combination_thumb']->value) {?> curr_combination_thumb <?php }?>">
                  <img
                      class="pro_gallery_thumb <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=3&&!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']&&(!isset($_smarty_tpl->tpl_vars['disable_lazyloading']->value)||!$_smarty_tpl->tpl_vars['disable_lazyloading']->value)&&(!isset($_smarty_tpl->tpl_vars['disable_lazyloading']->value)||!$_smarty_tpl->tpl_vars['disable_lazyloading']->value)) {?>swiper-lazy<?php }?>"
                      <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=3&&!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']&&(!isset($_smarty_tpl->tpl_vars['disable_lazyloading']->value)||!$_smarty_tpl->tpl_vars['disable_lazyloading']->value)) {?>data-<?php }?>src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['thumb_image_type']]['url'], ENT_QUOTES, 'UTF-8');?>
"
                      <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['retina']&&isset($_smarty_tpl->tpl_vars['image']->value['bySize'][($_smarty_tpl->tpl_vars['sttheme']->value['thumb_image_type']).('_2x')]['url'])) {?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=3&&!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']&&(!isset($_smarty_tpl->tpl_vars['disable_lazyloading']->value)||!$_smarty_tpl->tpl_vars['disable_lazyloading']->value)) {?>data-<?php }?>srcset="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][($_smarty_tpl->tpl_vars['sttheme']->value['thumb_image_type']).('_2x')]['url'], ENT_QUOTES, 'UTF-8');?>
 2x" <?php }?>
                      alt="<?php if ($_smarty_tpl->tpl_vars['image']->value['legend']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
<?php }?>"
                      title="<?php if ($_smarty_tpl->tpl_vars['image']->value['legend']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
<?php }?>"
                      width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['thumb_image_type']]['width'], ENT_QUOTES, 'UTF-8');?>
"
                      height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['thumb_image_type']]['height'], ENT_QUOTES, 'UTF-8');?>
"
                      
                    /> 
                </div>
              </div><?php }} ?>
