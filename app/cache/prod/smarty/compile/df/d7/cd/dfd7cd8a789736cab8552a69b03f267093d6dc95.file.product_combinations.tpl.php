<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:58
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/product_combinations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1956379485c338f2a58c915-58750363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfd7cd8a789736cab8552a69b03f267093d6dc95' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/product_combinations.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1956379485c338f2a58c915-58750363',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'combinations' => 0,
    'id_product' => 0,
    'combination' => 0,
    'id_pa' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f2a5a1286_12783472',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f2a5a1286_12783472')) {function content_5c338f2a5a1286_12783472($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['combinations']->value)&&is_array($_smarty_tpl->tpl_vars['combinations']->value)&&count($_smarty_tpl->tpl_vars['combinations']->value)) {?>
    <input type="hidden" name="products[<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
][has_combination]" value="1"/>
    <div class="selector_container">
        <div class="selector_label">
            <a class="selector_list" href="#"><i class="icon-list"></i></a>
            <span class="selector_count">0</span>
            <span class="selector_all">
						<input name="pa_<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
" type="checkbox" class="selector_checkbox" data-selector-all value="1"/>
						<span class="checkbox_styler"><?php echo smartyTranslate(array('s'=>'all','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
					</span>
        </div>
        <div class="selector_item">
            <?php  $_smarty_tpl->tpl_vars['combination'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['combination']->_loop = false;
 $_smarty_tpl->tpl_vars['id_pa'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['combinations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['combination']->key => $_smarty_tpl->tpl_vars['combination']->value) {
$_smarty_tpl->tpl_vars['combination']->_loop = true;
 $_smarty_tpl->tpl_vars['id_pa']->value = $_smarty_tpl->tpl_vars['combination']->key;
?>
                <div>
                    <input name="<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
" data-selector-item="<?php echo intval($_smarty_tpl->tpl_vars['combination']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['id_pa']->value);?>
" type="checkbox">
                    <span class="pa_attributes">
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['combination']->value['attributes'],'quotes','UTF-8');?>
,
							</span>
                    <span class="pa_quantity">
								<?php echo smartyTranslate(array('s'=>'qty','mod'=>'masseditproduct'),$_smarty_tpl);?>
: <span data-pa-quantity="<?php echo intval($_smarty_tpl->tpl_vars['id_pa']->value);?>
"> <?php echo intval($_smarty_tpl->tpl_vars['combination']->value['quantity']);?>
</span>,
							</span>
                    <span class="pa_price">
								<?php echo smartyTranslate(array('s'=>'price','mod'=>'masseditproduct'),$_smarty_tpl);?>
: <span data-pa-total-price="<?php echo intval($_smarty_tpl->tpl_vars['id_pa']->value);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['combination']->value['total_price'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</span> [<?php echo smartyTranslate(array('s'=>'impact','mod'=>'masseditproduct'),$_smarty_tpl);?>
 <span data-pa-price="<?php echo intval($_smarty_tpl->tpl_vars['id_pa']->value);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['combination']->value['price'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</span>],
							</span>
                    <span class="pa_price_final">
								<?php echo smartyTranslate(array('s'=>'price final','mod'=>'masseditproduct'),$_smarty_tpl);?>
: <span data-pa-total-price-final="<?php echo intval($_smarty_tpl->tpl_vars['id_pa']->value);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['combination']->value['total_price_final'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
 (<?php echo smartyTranslate(array('s'=>'incl tax','mod'=>'masseditproduct'),$_smarty_tpl);?>
)</span> [<?php echo smartyTranslate(array('s'=>'impact','mod'=>'masseditproduct'),$_smarty_tpl);?>
 <span data-pa-price-final="<?php echo intval($_smarty_tpl->tpl_vars['id_pa']->value);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['combination']->value['price_final'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
 (<?php echo smartyTranslate(array('s'=>'incl tax','mod'=>'masseditproduct'),$_smarty_tpl);?>
)</span>]
							</span>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } else { ?>
    <input type="hidden" name="products[<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
][has_combination]" value="0"/>
<?php }?><?php }} ?>
