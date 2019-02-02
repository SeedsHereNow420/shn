<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:11:35
         compiled from "modules/stwishlist/views/templates/hook/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13063524505c31aa27885122-50561825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12d8a6dce1c795c8dc626bb0db3a0923bfdbc164' => 
    array (
      0 => 'modules/stwishlist/views/templates/hook/my-account.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13063524505c31aa27885122-50561825',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31aa27886f57_18403543',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31aa27886f57_18403543')) {function content_5c31aa27886f57_18403543($_smarty_tpl) {?>
<div class="list-group-item">
<a class="wishlist-link" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'module','name'=>'stwishlist','controller'=>'mywishlist'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'My wishlists','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
  <i class="fto-star icon_btn mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'My wishlists','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

</a>    
</div><?php }} ?>
