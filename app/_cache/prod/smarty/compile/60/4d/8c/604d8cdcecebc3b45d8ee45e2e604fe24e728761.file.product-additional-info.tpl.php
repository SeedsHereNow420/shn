<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 13:44:55
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-additional-info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2703869385c2fd3d76c59c1-35874389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '604d8cdcecebc3b45d8ee45e2e604fe24e728761' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-additional-info.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2703869385c2fd3d76c59c1-35874389',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2fd3d76c6a56_82933422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fd3d76c6a56_82933422')) {function content_5c2fd3d76c6a56_82933422($_smarty_tpl) {?>
<div class="product-additional-info">
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductAdditionalInfo','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

</div>
<?php }} ?>
