<?php /* Smarty version Smarty-3.1.19, created on 2019-01-03 13:12:56
         compiled from "module:stshoppingcart/views/templates/hook/flying_image.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13715605655c2e7ad89a7245-53770079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b30e35164a3967fad8c311ffdb834642e4031d1' => 
    array (
      0 => 'module:stshoppingcart/views/templates/hook/flying_image.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '13715605655c2e7ad89a7245-53770079',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2e7ad8b1ce57_70056442',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2e7ad8b1ce57_70056442')) {function content_5c2e7ad8b1ce57_70056442($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/stshoppingcart/views/templates/hook/flying_image.tpl --><img class="flying_image" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['medium']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
" /><!-- end /var/www/html/SHN/modules/stshoppingcart/views/templates/hook/flying_image.tpl --><?php }} ?>
