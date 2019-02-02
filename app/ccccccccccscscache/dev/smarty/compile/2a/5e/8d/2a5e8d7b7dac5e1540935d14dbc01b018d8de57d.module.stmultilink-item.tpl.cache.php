<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 20:35:19
         compiled from "module:stmultilink/views/templates/hook/stmultilink-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7329563445c3185878dbf34-29855766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a5e8d7b7dac5e1540935d14dbc01b018d8de57d' => 
    array (
      0 => 'module:stmultilink/views/templates/hook/stmultilink-item.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '7329563445c3185878dbf34-29855766',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'link_extra_classes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3185878e3833_61548233',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3185878e3833_61548233')) {function content_5c3185878e3833_61548233($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/stmultilink/views/templates/hook/stmultilink-item.tpl -->

<a href="<?php if ($_smarty_tpl->tpl_vars['link']->value['url']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['url'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>" class="dropdown_list_item <?php if (isset($_smarty_tpl->tpl_vars['link_extra_classes']->value)) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_extra_classes']->value, ENT_QUOTES, 'UTF-8');?>
 <?php }?>" title="<?php echo htmlspecialchars(strip_tags($_smarty_tpl->tpl_vars['link']->value['title']), ENT_QUOTES, 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['link']->value['nofollow'])&&$_smarty_tpl->tpl_vars['link']->value['nofollow']) {?> rel="nofollow" <?php }?> <?php if ($_smarty_tpl->tpl_vars['link']->value['new_window']) {?> target="_blank" <?php }?>>
    <?php if ($_smarty_tpl->tpl_vars['link']->value['icon_class']) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['link']->value['label']) {?> list_arrow <?php }?> st_custom_link_icon"></i><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['label'], ENT_QUOTES, 'UTF-8');?>

</a>
    <!-- end /var/www/html/SHN/modules/stmultilink/views/templates/hook/stmultilink-item.tpl --><?php }} ?>
