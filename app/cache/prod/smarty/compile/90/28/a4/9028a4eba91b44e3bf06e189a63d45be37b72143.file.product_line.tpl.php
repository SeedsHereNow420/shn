<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:57
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/product_line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13726895595c338f29df1a99-23069845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9028a4eba91b44e3bf06e189a63d45be37b72143' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/product_line.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13726895595c338f29df1a99-23069845',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f29e009b2_55397838',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f29e009b2_55397838')) {function content_5c338f29e009b2_55397838($_smarty_tpl) {?>

<tr class="product_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
">
	<td style="width: 100px; text-align: center;">
		<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>

		<input name="id_product" type="hidden" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
"/>
		<input name="product" class="product_checkbox" type="checkbox"/>
		<div class="wrapp_checkbox"><i class="icon-check"></i></div>
	</td>
	<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['image'],'quotes','UTF-8');?>
</td>
	<td data-name><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['name'],'quotes','UTF-8');?>
</td>
	<td data-reference><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['reference'],'quotes','UTF-8');?>
</td>
	<td data-category><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['category'],'quotes','UTF-8');?>
</td>
	<td data-price><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
	<td data-price_final><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_final'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
	<td data-manufacturer><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['manufacturer'],'quotes','UTF-8');?>
</td>
	<td data-supplier><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['supplier'],'quotes','UTF-8');?>
</td>
	<td data-quantity><?php echo intval($_smarty_tpl->tpl_vars['product']->value['quantity']);?>
</td>
	<td data-stock_management><img src="../img/admin/<?php if ($_smarty_tpl->tpl_vars['product']->value['advanced_stock_management']) {?>enabled.gif<?php } else { ?>disabled.gif<?php }?>"></td>
	<td data-active><img src="../img/admin/<?php if ($_smarty_tpl->tpl_vars['product']->value['active']) {?>enabled.gif<?php } else { ?>disabled.gif<?php }?>"></td>
	<td data-combinations="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
"></td>
</tr><?php }} ?>
