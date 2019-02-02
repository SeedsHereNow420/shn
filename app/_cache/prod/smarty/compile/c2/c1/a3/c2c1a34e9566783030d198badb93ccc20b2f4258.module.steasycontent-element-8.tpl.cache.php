<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 13:36:06
         compiled from "module:steasycontent/views/templates/hook/steasycontent-element-8.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13438819015c2fd1c68597c5-22218237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2c1a34e9566783030d198badb93ccc20b2f4258' => 
    array (
      0 => 'module:steasycontent/views/templates/hook/steasycontent-element-8.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '13438819015c2fd1c68597c5-22218237',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sub_column' => 0,
    'element' => 0,
    'pro_per_fw' => 0,
    'pro_per_xxl' => 0,
    'pro_per_xl' => 0,
    'pro_per_lg' => 0,
    'pro_per_md' => 0,
    'pro_per_sm' => 0,
    'pro_per_xs' => 0,
    'pre_template' => 0,
    'sttheme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2fd1c68a7b88_71111070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fd1c68a7b88_71111070')) {function content_5c2fd1c68a7b88_71111070($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>
<?php $_smarty_tpl->tpl_vars['pro_per_fw'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['sub_column']->value['st_per_fw'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_per_fw'] ? $_smarty_tpl->tpl_vars['sub_column']->value['st_per_fw'] : 4), null, 0);?>
<?php $_smarty_tpl->tpl_vars['pro_per_xxl'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['sub_column']->value['st_per_xxl'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_per_xxl'] ? $_smarty_tpl->tpl_vars['sub_column']->value['st_per_xxl'] : 4), null, 0);?>
<?php $_smarty_tpl->tpl_vars['pro_per_xl'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['sub_column']->value['st_per_xl'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_per_xl'] ? $_smarty_tpl->tpl_vars['sub_column']->value['st_per_xl'] : 3), null, 0);?>
<?php $_smarty_tpl->tpl_vars['pro_per_lg'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['sub_column']->value['st_per_lg'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_per_lg'] ? $_smarty_tpl->tpl_vars['sub_column']->value['st_per_lg'] : 3), null, 0);?>
<?php $_smarty_tpl->tpl_vars['pro_per_md'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['sub_column']->value['st_per_md'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_per_md'] ? $_smarty_tpl->tpl_vars['sub_column']->value['st_per_md'] : 2), null, 0);?>
<?php $_smarty_tpl->tpl_vars['pro_per_sm'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['sub_column']->value['st_per_sm'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_per_sm'] ? $_smarty_tpl->tpl_vars['sub_column']->value['st_per_sm'] : 2), null, 0);?>
<?php $_smarty_tpl->tpl_vars['pro_per_xs'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['sub_column']->value['st_per_xs'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_per_xs'] ? $_smarty_tpl->tpl_vars['sub_column']->value['st_per_xs'] : 1), null, 0);?>


<?php if (!isset($_smarty_tpl->tpl_vars['sub_column']->value['st_slider_s_speed'])||!$_smarty_tpl->tpl_vars['sub_column']->value['st_slider_s_speed']) {?><?php $_smarty_tpl->createLocalArrayVariable('sub_column', null, 0);
$_smarty_tpl->tpl_vars['sub_column']->value['st_slider_s_speed'] = 7000;?><?php }?>
<?php if (!isset($_smarty_tpl->tpl_vars['sub_column']->value['st_slider_a_speed'])||!$_smarty_tpl->tpl_vars['sub_column']->value['st_slider_a_speed']) {?><?php $_smarty_tpl->createLocalArrayVariable('sub_column', null, 0);
$_smarty_tpl->tpl_vars['sub_column']->value['st_slider_a_speed'] = 400;?><?php }?>
<?php if (!isset($_smarty_tpl->tpl_vars['sub_column']->value['st_slider_slideshow'])) {?><?php $_smarty_tpl->createLocalArrayVariable('sub_column', null, 0);
$_smarty_tpl->tpl_vars['sub_column']->value['st_slider_slideshow'] = 0;?><?php }?>
<?php if (!isset($_smarty_tpl->tpl_vars['sub_column']->value['st_pause'])) {?><?php $_smarty_tpl->createLocalArrayVariable('sub_column', null, 0);
$_smarty_tpl->tpl_vars['sub_column']->value['st_pause'] = 0;?><?php }?>
<?php if (!isset($_smarty_tpl->tpl_vars['sub_column']->value['st_rewind_nav'])) {?><?php $_smarty_tpl->createLocalArrayVariable('sub_column', null, 0);
$_smarty_tpl->tpl_vars['sub_column']->value['st_rewind_nav'] = 0;?><?php }?>
<?php if (!isset($_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav'])) {?><?php $_smarty_tpl->createLocalArrayVariable('sub_column', null, 0);
$_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav'] = 0;?><?php }?>
<?php if (!isset($_smarty_tpl->tpl_vars['sub_column']->value['st_control_nav'])) {?><?php $_smarty_tpl->createLocalArrayVariable('sub_column', null, 0);
$_smarty_tpl->tpl_vars['sub_column']->value['st_control_nav'] = 0;?><?php }?>
<?php if (!isset($_smarty_tpl->tpl_vars['sub_column']->value['st_move'])) {?><?php $_smarty_tpl->createLocalArrayVariable('sub_column', null, 0);
$_smarty_tpl->tpl_vars['sub_column']->value['st_move'] = 0;?><?php }?>
<?php if (!isset($_smarty_tpl->tpl_vars['sub_column']->value['st_spacing_between'])) {?><?php $_smarty_tpl->createLocalArrayVariable('sub_column', null, 0);
$_smarty_tpl->tpl_vars['sub_column']->value['st_spacing_between'] = 0;?><?php }?>
<?php if (!isset($_smarty_tpl->tpl_vars['sub_column']->value['st_auto_height'])) {?><?php $_smarty_tpl->createLocalArrayVariable('sub_column', null, 0);
$_smarty_tpl->tpl_vars['sub_column']->value['st_auto_height'] = false;?><?php }?>

<section id="textboxes_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_column']->value['id_st_easy_content_column'], ENT_QUOTES, 'UTF-8');?>
" class="textboxes_container static_bullets" >
    <?php if (isset($_smarty_tpl->tpl_vars['sub_column']->value['st_grid'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_grid']) {?>
        <div class="row textboxes_grid">
        <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sub_column']->value['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['element']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->_loop = true;
 $_smarty_tpl->tpl_vars['element']->iteration++;
?>
            <div id="steasy_element_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>
" class="col-fw-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_fw']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-xxl-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_xxl']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-xl-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_xl']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-lg-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_lg']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-md-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_md']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-sm-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_sm']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_xs']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
  <?php if ($_smarty_tpl->tpl_vars['element']->iteration%$_smarty_tpl->tpl_vars['pro_per_xxl']->value==1) {?> first-item-of-large-line<?php }?><?php if ($_smarty_tpl->tpl_vars['element']->iteration%$_smarty_tpl->tpl_vars['pro_per_xl']->value==1) {?> first-item-of-desktop-line<?php }?><?php if ($_smarty_tpl->tpl_vars['element']->iteration%$_smarty_tpl->tpl_vars['pro_per_lg']->value==1) {?> first-item-of-line<?php }?><?php if ($_smarty_tpl->tpl_vars['element']->iteration%$_smarty_tpl->tpl_vars['pro_per_md']->value==1) {?> first-item-of-tablet-line<?php }?><?php if ($_smarty_tpl->tpl_vars['element']->iteration%$_smarty_tpl->tpl_vars['pro_per_sm']->value==1) {?> first-item-of-mobile-line<?php }?><?php if ($_smarty_tpl->tpl_vars['element']->iteration%$_smarty_tpl->tpl_vars['pro_per_xs']->value==1) {?> first-item-of-portrait-line<?php }?>">
                <div class="steasy_element_item text-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_text_align'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_content_width']) {?> width_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_content_width'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> textboxes_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_textboxes'], ENT_QUOTES, 'UTF-8');?>
">
                <?php $_smarty_tpl->tpl_vars["pre_template"] = new Smarty_variable(explode("_",$_smarty_tpl->tpl_vars['element']->value['st_el_textboxes']), null, 0);?>
                <?php echo $_smarty_tpl->getSubTemplate ("module:steasycontent/views/templates/hook/textboxes/".((string)$_smarty_tpl->tpl_vars['pre_template']->value[0]).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

                </div>
            </div>
        <?php } ?>  
        </div>
    <?php } else { ?>
        <div class="block_content">
            <div class="swiper-container products_sldier_swiper <?php if (isset($_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav'])) {?><?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']>1) {?> swiper-button-lr <?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==6||$_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==7) {?> swiper-navigation-circle <?php } elseif ($_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==4||$_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==5) {?> swiper-navigation-rectangle  <?php } elseif ($_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==8||$_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==9) {?> swiper-navigation-arrow <?php } elseif ($_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==2||$_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==3) {?> swiper-navigation-full <?php }?> <?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==2||$_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==4||$_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==6||$_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']==8) {?> swiper-navigation_visible <?php }?><?php }?><?php }?>" <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['is_rtl']) {?> dir="rtl" <?php }?>>
                <div class="swiper-wrapper">
                    <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sub_column']->value['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['element']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->_loop = true;
 $_smarty_tpl->tpl_vars['element']->iteration++;
?>
                    <div id="steasy_element_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>
" class="swiper-slide">
                        <div class="steasy_element_item text-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_text_align'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_content_width']) {?> width_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_content_width'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> textboxes_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_textboxes'], ENT_QUOTES, 'UTF-8');?>
">
                        <?php $_smarty_tpl->tpl_vars["pre_template"] = new Smarty_variable(explode("_",$_smarty_tpl->tpl_vars['element']->value['st_el_textboxes']), null, 0);?>
                        <?php echo $_smarty_tpl->getSubTemplate ("module:steasycontent/views/templates/hook/textboxes/".((string)$_smarty_tpl->tpl_vars['pre_template']->value[0]).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php if (isset($_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav']>1) {?>
                    <div class="swiper-button swiper-button-outer swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
                    <div class="swiper-button swiper-button-outer swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['sub_column']->value['st_control_nav'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_control_nav']) {?>
                <div class="swiper-pagination <?php if (isset($_smarty_tpl->tpl_vars['sub_column']->value['st_control_nav'])) {?><?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_control_nav']==2) {?> swiper-pagination-st-custom <?php } elseif ($_smarty_tpl->tpl_vars['sub_column']->value['st_control_nav']==4) {?> swiper-pagination-st-round <?php }?><?php }?>"></div>
                <?php }?>
            </div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("catalog/slider/script.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('block_name'=>"#textboxes_".((string)$_smarty_tpl->tpl_vars['sub_column']->value['id_st_easy_content_column']),'is_product_slider'=>0,'slider_s_speed'=>$_smarty_tpl->tpl_vars['sub_column']->value['st_slider_s_speed'],'slider_slideshow'=>$_smarty_tpl->tpl_vars['sub_column']->value['st_slider_slideshow'],'slider_a_speed'=>$_smarty_tpl->tpl_vars['sub_column']->value['st_slider_a_speed'],'slider_pause_on_hover'=>$_smarty_tpl->tpl_vars['sub_column']->value['st_pause'],'rewind_nav'=>$_smarty_tpl->tpl_vars['sub_column']->value['st_rewind_nav'],'lazy_load'=>false,'direction_nav'=>$_smarty_tpl->tpl_vars['sub_column']->value['st_direction_nav'],'control_nav'=>$_smarty_tpl->tpl_vars['sub_column']->value['st_control_nav'],'slider_move'=>$_smarty_tpl->tpl_vars['sub_column']->value['st_move'],'spacing_between'=>$_smarty_tpl->tpl_vars['sub_column']->value['st_spacing_between'],'autoHeight'=>$_smarty_tpl->tpl_vars['sub_column']->value['st_auto_height'],'pro_per_fw'=>$_smarty_tpl->tpl_vars['pro_per_fw']->value,'pro_per_xxl'=>$_smarty_tpl->tpl_vars['pro_per_xxl']->value,'pro_per_xl'=>$_smarty_tpl->tpl_vars['pro_per_xl']->value,'pro_per_lg'=>$_smarty_tpl->tpl_vars['pro_per_lg']->value,'pro_per_md'=>$_smarty_tpl->tpl_vars['pro_per_md']->value,'pro_per_sm'=>$_smarty_tpl->tpl_vars['pro_per_sm']->value,'pro_per_xs'=>$_smarty_tpl->tpl_vars['pro_per_xs']->value), 0);?>

    <?php }?> 
</section><?php }} ?>
