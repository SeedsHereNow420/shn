<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:11
         compiled from "module:steasycontent/views/templates/hook/steasycontent-columns.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8765420405c32fdab3364e6-24928932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '269ab7d40e59c9b96f2d22c51f7f25ca48e5a1b0' => 
    array (
      0 => 'module:steasycontent/views/templates/hook/steasycontent-columns.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '8765420405c32fdab3364e6-24928932',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'columns' => 0,
    'column' => 0,
    'column_width_total' => 0,
    'sub_column' => 0,
    'column_width' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fdab3b73e9_33577403',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fdab3b73e9_33577403')) {function content_5c32fdab3b73e9_33577403($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/function.math.php';
if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>
<!-- MODULE st easy content -->
<?php if (count($_smarty_tpl->tpl_vars['columns']->value)>0) {?>
    <?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['columns']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
        <?php if (isset($_smarty_tpl->tpl_vars['column']->value['columns'])&&count($_smarty_tpl->tpl_vars['column']->value['columns'])) {?>
		<div id="steasy_column_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['column']->value['id_st_easy_content_column'], ENT_QUOTES, 'UTF-8');?>
" class="row <?php if ($_smarty_tpl->tpl_vars['column']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['column']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?>">
	        <?php $_smarty_tpl->tpl_vars['column_width_total'] = new Smarty_variable(0, null, 0);?> 
        	<?php  $_smarty_tpl->tpl_vars['sub_column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub_column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['column']->value['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub_column']->key => $_smarty_tpl->tpl_vars['sub_column']->value) {
$_smarty_tpl->tpl_vars['sub_column']->_loop = true;
?>
        		<?php $_smarty_tpl->tpl_vars['column_width_total'] = new Smarty_variable($_smarty_tpl->tpl_vars['column_width_total']->value+$_smarty_tpl->tpl_vars['sub_column']->value['width'], null, 0);?>
        		<?php if ($_smarty_tpl->tpl_vars['column_width_total']->value>12) {?><?php break 1?><?php }?>
	        	<?php echo smarty_function_math(array('assign'=>"column_width",'equation'=>'x*y/y','x'=>$_smarty_tpl->tpl_vars['sub_column']->value['width'],'y'=>10),$_smarty_tpl);?>
 
	            <div id="steasy_column_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_column']->value['id_st_easy_content_column'], ENT_QUOTES, 'UTF-8');?>
" class="col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['column_width']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 steasy_column <?php if ($_smarty_tpl->tpl_vars['sub_column']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['sub_column']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?>" >
    				<?php if (!$_smarty_tpl->tpl_vars['sub_column']->value['element']&&isset($_smarty_tpl->tpl_vars['sub_column']->value['columns'])&&count($_smarty_tpl->tpl_vars['sub_column']->value['columns'])) {?>
	                	<div class="steasy_column_block"><?php echo $_smarty_tpl->getSubTemplate ("module:steasycontent/views/templates/hook/steasycontent-columns.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('columns'=>$_smarty_tpl->tpl_vars['sub_column']->value['columns']), 0);?>
</div>
	                <?php } elseif ($_smarty_tpl->tpl_vars['sub_column']->value['element']&&((isset($_smarty_tpl->tpl_vars['sub_column']->value['elements'])&&count($_smarty_tpl->tpl_vars['sub_column']->value['elements']))||$_smarty_tpl->tpl_vars['sub_column']->value['element']==7)) {?>
	                	<div class="steasy_element_block"><?php echo $_smarty_tpl->getSubTemplate ("module:steasycontent/views/templates/hook/steasycontent-element-".((string)$_smarty_tpl->tpl_vars['sub_column']->value['element']).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('sub_column'=>$_smarty_tpl->tpl_vars['sub_column']->value), 0);?>
</div>
            		<?php }?>
	            </div>
	        <?php } ?>
		</div>
        <?php }?>   
    <?php } ?>     
<?php }?>
<!-- MODULE st easy content --><?php }} ?>
