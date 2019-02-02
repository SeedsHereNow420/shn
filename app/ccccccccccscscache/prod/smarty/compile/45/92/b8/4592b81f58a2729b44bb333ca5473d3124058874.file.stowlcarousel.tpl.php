<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:29:51
         compiled from "modules/stowlcarousel/views/templates/hook/stowlcarousel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1743071585c31a05f626185-56551772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4592b81f58a2729b44bb333ca5473d3124058874' => 
    array (
      0 => 'modules/stowlcarousel/views/templates/hook/stowlcarousel.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1743071585c31a05f626185-56551772',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slide_group' => 0,
    'group' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a05f630e81_05361677',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a05f630e81_05361677')) {function content_5c31a05f630e81_05361677($_smarty_tpl) {?><!-- MODULE st owl carousel -->
<?php if (isset($_smarty_tpl->tpl_vars['slide_group']->value)) {?>
    <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slide_group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
        <?php if (isset($_smarty_tpl->tpl_vars['group']->value['slide'])&&count($_smarty_tpl->tpl_vars['group']->value['slide'])) {?>
            <?php if ($_smarty_tpl->tpl_vars['group']->value['is_full_width']) {?><div id="owl_carousel_container_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value['id_st_owl_carousel_group'], ENT_QUOTES, 'UTF-8');?>
" class="owl_carousel_container full_container <?php if ($_smarty_tpl->tpl_vars['group']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['group']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?> block"><?php }?>
            <div id="st_owl_carousel_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value['id_st_owl_carousel_group'], ENT_QUOTES, 'UTF-8');?>
" class="owl_carousel_wrap st_owl_carousel_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value['templates'], ENT_QUOTES, 'UTF-8');?>
 <?php if (!$_smarty_tpl->tpl_vars['group']->value['is_full_width']) {?> block <?php }?> owl_images_slider <?php if ($_smarty_tpl->tpl_vars['group']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['group']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?>">
                <?php echo $_smarty_tpl->getSubTemplate ("module:stowlcarousel/views/templates/hook/stowlcarousel-".((string)$_smarty_tpl->tpl_vars['group']->value['templates']).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('slides'=>$_smarty_tpl->tpl_vars['group']->value), 0);?>

            </div>
            <?php if ($_smarty_tpl->tpl_vars['group']->value['is_full_width']) {?></div><?php }?>
        <?php }?>
    <?php } ?>
<?php }?>
<!--/ MODULE st owl carousel --><?php }} ?>
