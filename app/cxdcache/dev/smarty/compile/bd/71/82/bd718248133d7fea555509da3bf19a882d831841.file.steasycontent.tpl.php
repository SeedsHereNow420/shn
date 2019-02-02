<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:13:07
         compiled from "modules/steasycontent/views/templates/hook/steasycontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16206453445c31aa83b43721-68106250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd718248133d7fea555509da3bf19a882d831841' => 
    array (
      0 => 'modules/steasycontent/views/templates/hook/steasycontent.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16206453445c31aa83b43721-68106250',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'easy_content' => 0,
    'ec' => 0,
    'is_column' => 0,
    'is_product_tab' => 0,
    'stblog' => 0,
    'sttheme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31aa83b75e45_19808739',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31aa83b75e45_19808739')) {function content_5c31aa83b75e45_19808739($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['easy_content']->value)&&count($_smarty_tpl->tpl_vars['easy_content']->value)>0) {?>
    <?php  $_smarty_tpl->tpl_vars['ec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['easy_content']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ec']->key => $_smarty_tpl->tpl_vars['ec']->value) {
$_smarty_tpl->tpl_vars['ec']->_loop = true;
?>
        <?php $_smarty_tpl->_capture_stack[0][] = array("parallax_param", null, null); ob_start(); ?><?php if (($_smarty_tpl->tpl_vars['ec']->value['bg_img']||$_smarty_tpl->tpl_vars['ec']->value['bg_pattern'])&&$_smarty_tpl->tpl_vars['ec']->value['speed']!=1&&!$_smarty_tpl->tpl_vars['ec']->value['mpfour']) {?> data-stellar-background-ratio="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['speed'], ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['ec']->value['bg_img_v_offset']) {?> data-stellar-vertical-offset="<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['ec']->value['bg_img_v_offset'], ENT_QUOTES, 'UTF-8');?>
" <?php }?><?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php $_smarty_tpl->_capture_stack[0][] = array("video_background", null, null); ob_start(); ?><?php if ($_smarty_tpl->tpl_vars['ec']->value['mpfour']) {?> data-vide-bg="mp4: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['mpfour'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['ec']->value['webm']) {?>, webm: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['webm'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['ec']->value['ogg']) {?>, ogv: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['ogg'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['ec']->value['video_poster']) {?>, poster: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['video_poster'], ENT_QUOTES, 'UTF-8');?>
<?php }?>" data-vide-options="loop: <?php if ($_smarty_tpl->tpl_vars['ec']->value['loop']) {?>true<?php } else { ?>false<?php }?>, muted: <?php if ($_smarty_tpl->tpl_vars['ec']->value['muted']) {?>true<?php } else { ?>false<?php }?>, position: 50% <?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['ec']->value['video_v_offset'], ENT_QUOTES, 'UTF-8');?>
%" <?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php if ($_smarty_tpl->tpl_vars['ec']->value['is_full_width']) {?><div id="easycontent_container_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['id_st_easy_content'], ENT_QUOTES, 'UTF-8');?>
" class="easycontent_container full_container <?php if (($_smarty_tpl->tpl_vars['ec']->value['bg_img']||$_smarty_tpl->tpl_vars['ec']->value['bg_pattern'])&&$_smarty_tpl->tpl_vars['ec']->value['speed']!=1&&!$_smarty_tpl->tpl_vars['ec']->value['mpfour']) {?> st_parallax_block <?php }?> <?php if ($_smarty_tpl->tpl_vars['ec']->value['mpfour']) {?> video_bg_block <?php }?><?php if ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==3) {?> hidden-sm-down <?php } elseif ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?> block" <?php echo Smarty::$_smarty_vars['capture']['parallax_param'];?>
 <?php echo Smarty::$_smarty_vars['capture']['video_background'];?>
 ><?php if (!$_smarty_tpl->tpl_vars['ec']->value['full_screen']) {?><div class="container"><?php }?><div class="row"><div class="col-12"><?php }?>
            <aside id="easycontent_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['id_st_easy_content'], ENT_QUOTES, 'UTF-8');?>
" class="easycontent_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['id_st_easy_content'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==3) {?> hidden-sm-down <?php } elseif ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?> <?php if (!$_smarty_tpl->tpl_vars['ec']->value['is_full_width']) {?> block <?php if (($_smarty_tpl->tpl_vars['ec']->value['bg_img']||$_smarty_tpl->tpl_vars['ec']->value['bg_pattern'])&&$_smarty_tpl->tpl_vars['ec']->value['speed']!=1&&!$_smarty_tpl->tpl_vars['ec']->value['mpfour']) {?> st_parallax_block <?php }?><?php if ($_smarty_tpl->tpl_vars['ec']->value['mpfour']) {?> video_bg_block <?php }?><?php }?> easycontent <?php if (isset($_smarty_tpl->tpl_vars['is_column']->value)&&$_smarty_tpl->tpl_vars['is_column']->value) {?> column_block <?php }?> <?php if ($_smarty_tpl->tpl_vars['ec']->value['is_header_item']) {?> header_item flex_child <?php }?> <?php if ($_smarty_tpl->tpl_vars['ec']->value['type']==2&&$_smarty_tpl->tpl_vars['ec']->value['module_align']>2) {?> easy_stretch_child <?php if ($_smarty_tpl->tpl_vars['ec']->value['module_align']>10&&$_smarty_tpl->tpl_vars['ec']->value['module_align']<23) {?> col-lg-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['module_align']-10, ENT_QUOTES, 'UTF-8');?>
 st_parallax_left <?php }?> <?php if ($_smarty_tpl->tpl_vars['ec']->value['module_align']>30&&$_smarty_tpl->tpl_vars['ec']->value['module_align']<43) {?> col-lg-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['module_align']-30, ENT_QUOTES, 'UTF-8');?>
 st_parallax_right <?php }?> <?php }?>" <?php if (!$_smarty_tpl->tpl_vars['ec']->value['is_full_width']) {?><?php echo Smarty::$_smarty_vars['capture']['parallax_param'];?>
 <?php echo Smarty::$_smarty_vars['capture']['video_background'];?>
<?php }?>>
                <?php if ($_smarty_tpl->tpl_vars['ec']->value['title']&&$_smarty_tpl->tpl_vars['ec']->value['title_align']!=3&&(!isset($_smarty_tpl->tpl_vars['is_product_tab']->value)||!$_smarty_tpl->tpl_vars['is_product_tab']->value)) {?>
                <div class="title_block flex_container title_align_<?php if ($_smarty_tpl->tpl_vars['is_column']->value) {?>0<?php } else { ?><?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['ec']->value['title_align'], ENT_QUOTES, 'UTF-8');?>
<?php }?> title_style_<?php if ($_smarty_tpl->tpl_vars['ec']->value['is_blog']) {?><?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['stblog']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['sttheme']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
<?php }?>">
                    <div class="flex_child title_flex_left"></div>
                    <?php if ($_smarty_tpl->tpl_vars['ec']->value['url']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['title'], ENT_QUOTES, 'UTF-8');?>
" class="title_block_inner"><?php } else { ?><div class="title_block_inner"><?php }?>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['title'], ENT_QUOTES, 'UTF-8');?>

                    <?php if ($_smarty_tpl->tpl_vars['ec']->value['url']) {?></a><?php } else { ?></div><?php }?>
                    <div class="flex_child title_flex_right"></div>
                </div>
                <?php }?>
            	<div class="style_content <?php if ($_smarty_tpl->tpl_vars['ec']->value['width']) {?> width_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['width'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> block_content <?php if ($_smarty_tpl->tpl_vars['ec']->value['id_cms']) {?> cms_content <?php }?>">
                    <?php if ($_smarty_tpl->tpl_vars['ec']->value['text']) {?><div class="easy_brother_block text-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['text_align'], ENT_QUOTES, 'UTF-8');?>
 text-md-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['mobile_text_align'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['ec']->value['text'];?>
</div><?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['ec']->value['columns'])&&count($_smarty_tpl->tpl_vars['ec']->value['columns'])) {?><?php echo $_smarty_tpl->getSubTemplate ("module:steasycontent/views/templates/hook/steasycontent-columns.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('columns'=>$_smarty_tpl->tpl_vars['ec']->value['columns']), 0);?>
<?php }?>
            	</div>
            </aside>
        <?php if (isset($_smarty_tpl->tpl_vars['ec']->value['is_full_width'])&&$_smarty_tpl->tpl_vars['ec']->value['is_full_width']) {?></div><?php if (!$_smarty_tpl->tpl_vars['ec']->value['full_screen']) {?></div><?php }?></div></div><?php }?>
    <?php } ?>
<?php }?><?php }} ?>
