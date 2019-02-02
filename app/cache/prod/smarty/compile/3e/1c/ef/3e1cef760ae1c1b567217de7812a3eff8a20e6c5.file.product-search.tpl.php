<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 10:16:47
         compiled from "/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/product-search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4783015935c34e90f1425d7-87992994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e1cef760ae1c1b567217de7812a3eff8a20e6c5' => 
    array (
      0 => '/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/product-search.tpl',
      1 => 1519199329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4783015935c34e90f1425d7-87992994',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_search_ids' => 0,
    'product_search_names' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34e90f146f49_24218206',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34e90f146f49_24218206')) {function content_5c34e90f146f49_24218206($_smarty_tpl) {?>

<div class="col-lg-4">
    <input type="hidden" name="inputProducts" id="inputProducts" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product_search_ids']->value,'htmlall','UTF-8');?>
" />
    <input type="hidden" name="nameProducts" id="nameProducts" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product_search_names']->value,'htmlall','UTF-8');?>
" />
    <div id="ajax_choose_product">
        <p>
            <input type="text" value="" id="product_autocomplete_input" />
            <?php echo smartyTranslate(array('s'=>'Begin typing the first letters of the product name, then select the product from the drop-down list','mod'=>'ordersplusplus'),$_smarty_tpl);?>

        </p>
    </div>
    <div id="divProductsFilter"></div>
</div>
<?php }} ?>
