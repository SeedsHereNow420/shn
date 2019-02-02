<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:17:59
         compiled from "module:stowlcarousel/views/templates/hook/stowlcarousel-block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13241480585c31aba7e49956-80154588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6cde061adda6affe201717fabef8393e2a8c021' => 
    array (
      0 => 'module:stowlcarousel/views/templates/hook/stowlcarousel-block.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '13241480585c31aba7e49956-80154588',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'banner_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31aba7e5fed5_14110011',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31aba7e5fed5_14110011')) {function content_5c31aba7e5fed5_14110011($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['banner_data']->value['url']&&!$_smarty_tpl->tpl_vars['banner_data']->value['description_has_links']) {?>
    <a id="st_owl_carousel_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['id_st_owl_carousel'], ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['banner_data']->value['url'],'html'), ENT_QUOTES, 'UTF-8');?>
" class="st_owl_carousel_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['id_st_owl_carousel'], ENT_QUOTES, 'UTF-8');?>
 st_owl_carousel_block" target="<?php if ($_smarty_tpl->tpl_vars['banner_data']->value['new_window']) {?>_blank<?php } else { ?>_self<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['banner_data']->value['title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
<?php } else { ?>
    <div id="st_owl_carousel_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['id_st_owl_carousel'], ENT_QUOTES, 'UTF-8');?>
" class="st_owl_carousel_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['id_st_owl_carousel'], ENT_QUOTES, 'UTF-8');?>
 st_owl_carousel_block">
<?php }?>
<img class="st_owl_carousel_image" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['image_multi_lang'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['banner_data']->value['title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" <?php if ((isset($_smarty_tpl->tpl_vars['banner_data']->value['width'])&&$_smarty_tpl->tpl_vars['banner_data']->value['width'])) {?>width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['width'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['banner_data']->value['height'])&&$_smarty_tpl->tpl_vars['banner_data']->value['height'])) {?>height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['height'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> />
<?php if ($_smarty_tpl->tpl_vars['banner_data']->value['description']) {?>
    <div class="st_image_layered_description <?php if (isset($_smarty_tpl->tpl_vars['banner_data']->value['content_width'])&&$_smarty_tpl->tpl_vars['banner_data']->value['content_width']) {?> container <?php }?> <?php if ($_smarty_tpl->tpl_vars['banner_data']->value['hide_text_on_mobile']) {?> hidden-sm-down <?php }?> <?php if ($_smarty_tpl->tpl_vars['banner_data']->value['text_align']==1) {?> text-left <?php } elseif ($_smarty_tpl->tpl_vars['banner_data']->value['text_align']==3) {?> text-right <?php } else { ?> text-center <?php }?> <?php if ($_smarty_tpl->tpl_vars['banner_data']->value['text_position']==1) {?> flex_start flex_left <?php } elseif ($_smarty_tpl->tpl_vars['banner_data']->value['text_position']==2) {?> flex_start flex_center <?php } elseif ($_smarty_tpl->tpl_vars['banner_data']->value['text_position']==3) {?> flex_start flex_right <?php } elseif ($_smarty_tpl->tpl_vars['banner_data']->value['text_position']==4) {?> flex_middle flex_left <?php } elseif ($_smarty_tpl->tpl_vars['banner_data']->value['text_position']==6) {?> flex_middle flex_right <?php } elseif ($_smarty_tpl->tpl_vars['banner_data']->value['text_position']==7) {?> flex_end flex_left <?php } elseif ($_smarty_tpl->tpl_vars['banner_data']->value['text_position']==8) {?> flex_end flex_center <?php } elseif ($_smarty_tpl->tpl_vars['banner_data']->value['text_position']==9) {?> flex_end flex_right <?php } else { ?> flex_middle flex_center <?php }?>">
        <div class="st_image_layered_description_inner <?php if ($_smarty_tpl->tpl_vars['banner_data']->value['text_width']) {?> width_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['text_width'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> style_content">
        <?php echo $_smarty_tpl->tpl_vars['banner_data']->value['description'];?>

        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['banner_data']->value['url']&&!$_smarty_tpl->tpl_vars['banner_data']->value['description_has_links']) {?>
    </a>
<?php } else { ?>
    </div>
<?php }?><?php }} ?>
