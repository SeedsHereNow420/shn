<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 20:06:13
         compiled from "module:steasycontent/views/templates/hook/steasycontent-element-1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15646691745c317eb5a96fb4-29118936%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '896af6a64713a5bd4ec2b642e53cc415f1f0f976' => 
    array (
      0 => 'module:steasycontent/views/templates/hook/steasycontent-element-1.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '15646691745c317eb5a96fb4-29118936',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c317eb5aa2ba4_39953787',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c317eb5aa2ba4_39953787')) {function content_5c317eb5aa2ba4_39953787($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/function.math.php';
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
 
    <div id="steasy_element_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>
" class="col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['element_width']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 steasy_element_1 <?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['st_el_hide_on_mobile']==2) {?> hidden-lg-up <?php }?>">
    	<div class="steasy_element_item text-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_text_align'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_content_width']) {?> width_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_content_width'], ENT_QUOTES, 'UTF-8');?>
 <?php }?>">
		<?php $_smarty_tpl->tpl_vars["pre_template"] = new Smarty_variable(explode("_",$_smarty_tpl->tpl_vars['element']->value['st_el_icon_with_text']), null, 0);?>
    	<?php echo $_smarty_tpl->getSubTemplate ("module:steasycontent/views/templates/hook/icon_with_text/".((string)$_smarty_tpl->tpl_vars['pre_template']->value[0]).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

    	</div>
    </div>
<?php } ?>   
</div>  <?php }} ?>
