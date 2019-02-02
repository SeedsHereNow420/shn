<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:40
         compiled from "module:fsadvancedurl/views/templates/front/css_js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17818034755c31a978a58499-48698027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '17818034755c31a978a58499-48698027',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fsau_product_urls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a978a597a1_39213437',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a978a597a1_39213437')) {function content_5c31a978a597a1_39213437($_smarty_tpl) {?>

<script type="text/javascript">
    var FSAU = FSAU || { };
    FSAU.product_urls = <?php echo FsAdvancedUrlModule::jsonEncodeStatic($_smarty_tpl->tpl_vars['fsau_product_urls']->value);?>
;
</script><?php }} ?>
