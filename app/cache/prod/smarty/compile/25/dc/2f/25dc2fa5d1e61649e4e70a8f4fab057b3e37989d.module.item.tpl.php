<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:21:23
         compiled from "module:stwishlist/views/templates/hook/item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16862647565c32fdf344c676-85277296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25dc2fa5d1e61649e4e70a8f4fab057b3e37989d' => 
    array (
      0 => 'module:stwishlist/views/templates/hook/item.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '16862647565c32fdf344c676-85277296',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'wishlist_name' => 0,
    'id_st_wishlist' => 0,
    'wishlist_total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fdf34516d1_14579790',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fdf34516d1_14579790')) {function content_5c32fdf34516d1_14579790($_smarty_tpl) {?><li class="line_item fs_md"><a href="javascript:;" class="btn-spin" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_name']->value, ENT_QUOTES, 'UTF-8');?>
" data-id-wishlist="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_st_wishlist']->value, ENT_QUOTES, 'UTF-8');?>
" rel="nofollow"><i class="fto-dot mar_r4"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_name']->value, ENT_QUOTES, 'UTF-8');?>
 (<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_total']->value, ENT_QUOTES, 'UTF-8');?>
</span>)</a></li><?php }} ?>
