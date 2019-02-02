<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:05:46
         compiled from "module:stsocial/views/templates/hook/stsocial-drop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10507365275c319aba69f992-72404187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00e55177070fe5c7f54d99263115f894ebda2651' => 
    array (
      0 => 'module:stsocial/views/templates/hook/stsocial-drop.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '10507365275c319aba69f992-72404187',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stsocial' => 0,
    'classname' => 0,
    'social_label' => 0,
    'pro_share_drop' => 0,
    'product' => 0,
    'urls' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c319aba6a8fa5_41496638',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c319aba6a8fa5_41496638')) {function content_5c319aba6a8fa5_41496638($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/stsocial/views/templates/hook/stsocial-drop.tpl -->
<?php if (isset($_smarty_tpl->tpl_vars['stsocial']->value)&&$_smarty_tpl->tpl_vars['stsocial']->value) {?>
<div class="top_bar_item dropdown_wrap pro_right_item">
    <div class="dropdown_tri dropdown_tri_in header_item <?php if (isset($_smarty_tpl->tpl_vars['classname']->value)) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['classname']->value, ENT_QUOTES, 'UTF-8');?>
 <?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['social_label']->value==0||$_smarty_tpl->tpl_vars['social_label']->value==2) {?><i class="fto-share-1<?php if ($_smarty_tpl->tpl_vars['social_label']->value==0) {?> mar_r4 <?php }?>"></i><?php }?><?php if ($_smarty_tpl->tpl_vars['social_label']->value==0||$_smarty_tpl->tpl_vars['social_label']->value==1) {?><?php echo smartyTranslate(array('s'=>'Share','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?><i class="fto-angle-down arrow_down arrow"></i><i class="fto-angle-up arrow_up arrow"></i>
    </div>
    <div class="dropdown_list">
        <div class="dropdown_box">
        <?php if (isset($_smarty_tpl->tpl_vars['pro_share_drop']->value)) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("module:stsocial/views/templates/hook/stsocial.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('share_url'=>$_smarty_tpl->tpl_vars['product']->value['url'],'share_name'=>$_smarty_tpl->tpl_vars['product']->value['name']), 0);?>

        <?php } else { ?>
            <?php echo $_smarty_tpl->getSubTemplate ("module:stsocial/views/templates/hook/stsocial.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('share_url'=>$_smarty_tpl->tpl_vars['urls']->value['current_url'],'share_name'=>$_smarty_tpl->tpl_vars['page']->value['meta']['title']), 0);?>

        <?php }?>
        </div>
    </div>
</div>
<?php }?><!-- end /var/www/html/SHN/modules/stsocial/views/templates/hook/stsocial-drop.tpl --><?php }} ?>
