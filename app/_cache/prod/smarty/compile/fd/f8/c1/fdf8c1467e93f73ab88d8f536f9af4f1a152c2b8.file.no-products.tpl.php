<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 18:22:44
         compiled from "modules/amazzingfilter/views/templates/front/no-products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9887638965c3014f4840490-22008700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdf8c1467e93f73ab88d8f536f9af4f1a152c2b8' => 
    array (
      0 => 'modules/amazzingfilter/views/templates/front/no-products.tpl',
      1 => 1513425263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9887638965c3014f4840490-22008700',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'class' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3014f484a321_46589996',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3014f484a321_46589996')) {function content_5c3014f484a321_46589996($_smarty_tpl) {?>

<div id="js-product-list" class="alert alert-warning<?php if (!empty($_smarty_tpl->tpl_vars['class']->value)) {?> <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['class']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php }?>"><?php echo smartyTranslate(array('s'=>'No products','mod'=>'amazzingfilter'),$_smarty_tpl);?>
</div>

<?php }} ?>
