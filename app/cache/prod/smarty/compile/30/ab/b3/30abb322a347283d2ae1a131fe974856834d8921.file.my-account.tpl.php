<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:28:12
         compiled from "modules/stblogcomments/views/templates/hook/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19104781265c32ff8c079db3-30456419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30abb322a347283d2ae1a131fe974856834d8921' => 
    array (
      0 => 'modules/stblogcomments/views/templates/hook/my-account.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19104781265c32ff8c079db3-30456419',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32ff8c07bf42_25818776',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32ff8c07bf42_25818776')) {function content_5c32ff8c07bf42_25818776($_smarty_tpl) {?>
<div class="list-group-item">
<a class="lnk_stblogcomments" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'module','name'=>'stblogcomments','controller'=>'mycomments'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Blog comments','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
  <i class="fto-comment-empty mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'Blog comments','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

</a>
</div><?php }} ?>
