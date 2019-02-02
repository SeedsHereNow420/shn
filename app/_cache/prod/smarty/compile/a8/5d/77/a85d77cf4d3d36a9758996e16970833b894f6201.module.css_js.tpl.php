<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 13:42:02
         compiled from "module:fsadvancedurl/views/templates/front/css_js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10550184075c2fd32aa3fef0-56633306%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a85d77cf4d3d36a9758996e16970833b894f6201' => 
    array (
      0 => 'module:fsadvancedurl/views/templates/front/css_js.tpl',
      1 => 1519199365,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '10550184075c2fd32aa3fef0-56633306',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fsau_product_urls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2fd32aa45069_47308310',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fd32aa45069_47308310')) {function content_5c2fd32aa45069_47308310($_smarty_tpl) {?>

<script type="text/javascript">
    var FSAU = FSAU || { };
    FSAU.product_urls = <?php echo FsAdvancedUrlModule::jsonEncodeStatic($_smarty_tpl->tpl_vars['fsau_product_urls']->value);?>
;
</script><?php }} ?>
