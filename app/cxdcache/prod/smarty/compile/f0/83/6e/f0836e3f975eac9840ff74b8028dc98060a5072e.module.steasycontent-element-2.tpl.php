<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:07:07
         compiled from "module:steasycontent/views/templates/hook/steasycontent-element-2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12427600365c31a91b761b15-39867661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0836e3f975eac9840ff74b8028dc98060a5072e' => 
    array (
      0 => 'module:steasycontent/views/templates/hook/steasycontent-element-2.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '12427600365c31a91b761b15-39867661',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sub_column' => 0,
    'element_width_total' => 0,
    'element' => 0,
    'element_width' => 0,
    'pre_template' => 0,
    'column_width_total' => 0,
    'easy_image_path' => 0,
    'sttheme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a91b958472_51681580',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a91b958472_51681580')) {function content_5c31a91b958472_51681580($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/function.math.php';
if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>
<div class="row">
<?php $_smarty_tpl->tpl_vars['element_width_total'] = new Smarty_variable(0, null, 0);?> 
<?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sub_column']->value['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
    <?php if (($_smarty_tpl->tpl_vars['element_width_total']->value+$_smarty_tpl->tpl_vars['element']->value['st_el_width'])>12) {?>
    	</div><div class="row">
    	<?php $_smarty_tpl->tpl_vars['element_width_total'] = new Smarty_variable(0, null, 0);?>
    <?php }?>
    <?php $_smarty_tpl->tpl_vars['element_width_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['element_width_total']->value+$_smarty_tpl->tpl_vars['element']->value['st_el_width'], null, 0);?>
    <?php echo smarty_function_math(array('assign'=>"element_width",'equation'=>'x*y/y','x'=>$_smarty_tpl->tpl_vars['element']->value['st_el_width'],'y'=>10),$_smarty_tpl);?>
 
	<?php $_smarty_tpl->tpl_vars["pre_template"] = new Smarty_variable(explode("_",$_smarty_tpl->tpl_vars['element']->value['st_el_text_block']), null, 0);?>
    <div id="steasy_element_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>
" class="col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['element_width']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 sttext_block sttext_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pre_template']->value[0], ENT_QUOTES, 'UTF-8');?>
 sttext_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_text_block'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['st_el_hide_on_mobile']==2) {?> hidden-lg-up <?php }?>">
		<div class="steasy_element_item text-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_text_align'], ENT_QUOTES, 'UTF-8');?>
 <?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_mobile_text_align'])) {?> text-md-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_mobile_text_align'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> <?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_content_width']) {?> width_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_content_width'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> clearfix <?php if ($_smarty_tpl->tpl_vars['pre_template']->value[0]==2) {?> row <?php }?>">  
	        <?php $_smarty_tpl->tpl_vars['column_width_total'] = new Smarty_variable(12, null, 0);?>  
			<?php if ($_smarty_tpl->tpl_vars['element']->value['st_image_block_width']&&(isset($_smarty_tpl->tpl_vars['element']->value['st_image'])&&$_smarty_tpl->tpl_vars['element']->value['st_image'])) {?>
	        	<?php $_smarty_tpl->tpl_vars['column_width_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['column_width_total']->value-$_smarty_tpl->tpl_vars['element']->value['st_image_block_width'], null, 0);?>  
				<div class="sttext_item_image <?php if ($_smarty_tpl->tpl_vars['element']->value['st_image_hover']) {?> hover_effect_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_image_hover'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> <?php if ($_smarty_tpl->tpl_vars['pre_template']->value[0]==2) {?> col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['element']->value['st_image_block_width'],'.','-'), ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['pre_template']->value[1]==2||$_smarty_tpl->tpl_vars['pre_template']->value[1]==4) {?> push-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['column_width_total']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 <?php }?> <?php }?> <?php if ($_smarty_tpl->tpl_vars['pre_template']->value[0]==3) {?><?php if ($_smarty_tpl->tpl_vars['pre_template']->value[1]==1) {?> fl <?php } else { ?> fr  <?php }?><?php }?>">
					<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_image_big'])&&$_smarty_tpl->tpl_vars['element']->value['st_image_big']) {?><a href="<?php echo htmlspecialchars(($_smarty_tpl->tpl_vars['easy_image_path']->value).($_smarty_tpl->tpl_vars['element']->value['st_image_big']), ENT_QUOTES, 'UTF-8');?>
" class="sttext_item_image_inner view_large_box st_popup_image" data-group="sttext_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_column']->value['id_st_easy_content_column'], ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_header'], ENT_QUOTES, 'UTF-8');?>
"><i class="fto-arrows-alt "></i><?php } else { ?><div class="sttext_item_image_inner"><?php }?>
						<img src="<?php if (strpos($_smarty_tpl->tpl_vars['element']->value['st_image'],'/modules/')!==false) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_image'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars(($_smarty_tpl->tpl_vars['easy_image_path']->value).($_smarty_tpl->tpl_vars['element']->value['st_image']), ENT_QUOTES, 'UTF-8');?>
<?php }?>" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_header'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_image_width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_image_height'], ENT_QUOTES, 'UTF-8');?>
" class="hover_effect_target" />
					<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_image_big'])&&$_smarty_tpl->tpl_vars['element']->value['st_image_big']) {?></a><?php } else { ?></div><?php }?>
				</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['column_width_total']->value) {?>
				<?php if ($_smarty_tpl->tpl_vars['pre_template']->value[0]==2) {?><div class="sttext_item_text col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['column_width_total']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['pre_template']->value[1]==2||$_smarty_tpl->tpl_vars['pre_template']->value[1]==4) {?> pull-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['element']->value['st_image_block_width'],'.','-'), ENT_QUOTES, 'UTF-8');?>
 <?php }?>"><?php }?>
					<?php if ($_smarty_tpl->tpl_vars['element']->value['st_title_position']!=3&&$_smarty_tpl->tpl_vars['element']->value['st_el_header']) {?>
                        <div class="title_block flex_container title_align_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['element']->value['st_title_position'], ENT_QUOTES, 'UTF-8');?>
 title_style_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['sttheme']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
 sttext_item_header">
                            <div class="flex_child title_flex_left"></div>
                            <div class="title_block_inner"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_header'], ENT_QUOTES, 'UTF-8');?>
</div>
                            <div class="flex_child title_flex_right"></div>
                        </div>
                    <?php }?>
                    <div class="sttext_item_content <?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_text_style'])&&$_smarty_tpl->tpl_vars['element']->value['st_el_text_style']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_text_style'], ENT_QUOTES, 'UTF-8');?>
<?php }?>">
					<?php echo $_smarty_tpl->tpl_vars['element']->value['st_el_text'];?>

                    </div>
				<?php if ($_smarty_tpl->tpl_vars['pre_template']->value[0]==2) {?></div><?php }?>
			<?php }?>
		</div>
    </div>
<?php } ?>   
</div>  
<?php }} ?>
