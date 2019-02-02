<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:17:59
         compiled from "module:stowlcarousel/views/templates/hook/stowlcarousel-0.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9107907295c31aba7e3d238-25312787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a455d96ab52e75abb3e2db4dd9cfee473853e5b' => 
    array (
      0 => 'module:stowlcarousel/views/templates/hook/stowlcarousel-0.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '9107907295c31aba7e3d238-25312787',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slides' => 0,
    'banner' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31aba7e48180_84530608',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31aba7e48180_84530608')) {function content_5c31aba7e48180_84530608($_smarty_tpl) {?><!-- MODULE stowlcarousel -->
<?php if (isset($_smarty_tpl->tpl_vars['slides']->value)) {?>
    <?php if (isset($_smarty_tpl->tpl_vars['slides']->value['slide'])&&count($_smarty_tpl->tpl_vars['slides']->value['slide'])) {?>
        <div id="st_owl_carousel-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slides']->value['id_st_owl_carousel_group'], ENT_QUOTES, 'UTF-8');?>
" class="<?php if (count($_smarty_tpl->tpl_vars['slides']->value['slide'])>1) {?> owl-carousel owl-theme <?php if ($_smarty_tpl->tpl_vars['slides']->value['prev_next']) {?> owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['slides']->value['prev_next']==4||$_smarty_tpl->tpl_vars['slides']->value['prev_next']==6) {?> owl-navigation-circle <?php } elseif ($_smarty_tpl->tpl_vars['slides']->value['prev_next']==3||$_smarty_tpl->tpl_vars['slides']->value['prev_next']==5) {?> owl-navigation-rectangle <?php }?> <?php if ($_smarty_tpl->tpl_vars['slides']->value['prev_next']==1||$_smarty_tpl->tpl_vars['slides']->value['prev_next']==5||$_smarty_tpl->tpl_vars['slides']->value['prev_next']==6) {?> owl-navigation_visible <?php }?><?php }?><?php }?>">
            <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slides']->value['slide']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("module:stowlcarousel/views/templates/hook/stowlcarousel-block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('banner_data'=>$_smarty_tpl->tpl_vars['banner']->value), 0);?>

            <?php } ?>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("module:stowlcarousel/views/templates/hook/stowlcarousel-script.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('js_data'=>$_smarty_tpl->tpl_vars['slides']->value), 0);?>

    <?php }?>
<?php }?>
<!--/ MODULE stowlcarousel --><?php }} ?>
