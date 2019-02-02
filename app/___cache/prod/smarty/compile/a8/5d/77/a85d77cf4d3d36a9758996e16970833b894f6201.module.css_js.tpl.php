<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 20:18:02
         compiled from "module:fsadvancedurl/views/templates/front/css_js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6092433085c31817a1eb5a1-25652364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '6092433085c31817a1eb5a1-25652364',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fsau_product_urls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31817a1f0718_44931285',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31817a1f0718_44931285')) {function content_5c31817a1f0718_44931285($_smarty_tpl) {?>

<script type="text/javascript">
    var FSAU = FSAU || { };
    FSAU.product_urls = <?php echo FsAdvancedUrlModule::jsonEncodeStatic($_smarty_tpl->tpl_vars['fsau_product_urls']->value);?>
;
</script><?php }} ?>
