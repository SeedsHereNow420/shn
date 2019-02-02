<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 00:20:22
         compiled from "module:fsadvancedurl/views/templates/front/css_js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4531769695c330bc64de9b8-41197319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '4531769695c330bc64de9b8-41197319',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fsau_product_urls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c330bc64e36c5_68740291',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c330bc64e36c5_68740291')) {function content_5c330bc64e36c5_68740291($_smarty_tpl) {?>

<script type="text/javascript">
    var FSAU = FSAU || { };
    FSAU.product_urls = <?php echo FsAdvancedUrlModule::jsonEncodeStatic($_smarty_tpl->tpl_vars['fsau_product_urls']->value);?>
;
</script><?php }} ?>
