<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 20:35:19
         compiled from "module:stwishlist/views/templates/hook/go_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9512587105c318587bbac94-38567574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ff48a5b1c26633e01c0a7d1b263223ce25a5f53' => 
    array (
      0 => 'module:stwishlist/views/templates/hook/go_login.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '9512587105c318587bbac94-38567574',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'urls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c318587bbd478_96028840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c318587bbd478_96028840')) {function content_5c318587bbd478_96028840($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/stwishlist/views/templates/hook/go_login.tpl -->
<div id="wishlist_go_login" class="inline_popup_content small_popup mfp-with-anim mfp-hide text-center">
  <p class="fs_md"><?php echo smartyTranslate(array('s'=>'Create a free account to use wishlists.','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</p>
  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['authentication'], ENT_QUOTES, 'UTF-8');?>
" class="go" title="<?php echo smartyTranslate(array('s'=>'Sign in','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Sign in','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a> 
</div><!-- end /var/www/html/SHN/modules/stwishlist/views/templates/hook/go_login.tpl --><?php }} ?>
