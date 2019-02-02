<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 11:30:00
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/cart_rules/actions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11461392475c33a8b8b35a67-07980689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4f874d92853d0b4a2199fac331b68bbc898a9df' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/cart_rules/actions.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11461392475c33a8b8b35a67-07980689',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currentObject' => 0,
    'currentTab' => 0,
    'currencies' => 0,
    'currency' => 0,
    'defaultCurrency' => 0,
    'product_rule_groups' => 0,
    'reductionProductFilter' => 0,
    'giftProductFilter' => 0,
    'gift_product_select' => 0,
    'hasAttribute' => 0,
    'gift_product_attribute_select' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c33a8ba0a5e40_98566988',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c33a8ba0a5e40_98566988')) {function content_5c33a8ba0a5e40_98566988($_smarty_tpl) {?>
<div class="form-group">
	<label class="control-label  col-lg-3"><?php echo smartyTranslate(array('s'=>'Free shipping','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</label>
	<div class="col-lg-9">
		<span class="switch prestashop-switch fixed-width-lg">
			<input type="radio" name="free_shipping" id="free_shipping_on" value="1" <?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'free_shipping'))) {?>checked="checked"<?php }?> />
			<label class="t" for="free_shipping_on">
				<?php echo smartyTranslate(array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl);?>

			</label>
			<input type="radio" name="free_shipping" id="free_shipping_off" value="0"  <?php if (!intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'free_shipping'))) {?>checked="checked"<?php }?> />
			<label class="t" for="free_shipping_off">
				<?php echo smartyTranslate(array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl);?>

			</label>
			<a class="slide-button btn"></a>
		</span>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Apply a discount','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</label>
	<div class="col-lg-9">
		<div class="radio">
			<label for="apply_discount_percent">
				<input type="radio" name="apply_discount" id="apply_discount_percent" value="percent" <?php if (floatval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_percent'))>0) {?>checked="checked"<?php }?> />
				<?php echo smartyTranslate(array('s'=>'Percent (%)','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

			</label>
		</div>
		<div class="radio">
			<label for="apply_discount_amount">
				<input type="radio" name="apply_discount" id="apply_discount_amount" value="amount" <?php if (floatval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_amount'))>0) {?>checked="checked"<?php }?> />
				<?php echo smartyTranslate(array('s'=>'Amount','d'=>'Admin.Global'),$_smarty_tpl);?>

			</label>
		</div>
		<div class="radio">
			<label for="apply_discount_off">
				<input type="radio" name="apply_discount" id="apply_discount_off" value="off" <?php if (!floatval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_amount'))>0&&!floatval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_percent'))>0) {?>checked="checked"<?php }?> />
				<i class="icon-remove color_danger"></i> <?php echo smartyTranslate(array('s'=>'None','d'=>'Admin.Global'),$_smarty_tpl);?>

			</label>
		</div>
	</div>
</div>

<div id="apply_discount_percent_div" class="form-group">
	<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Value','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
	<div class="col-lg-9">
		<div class="input-group col-lg-2">
			<span class="input-group-addon">%</span>
			<input type="text" id="reduction_percent" class="input-mini" name="reduction_percent" value="<?php echo floatval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_percent'));?>
" />
		</div>
		<span class="help-block"><i class="icon-warning-sign"></i> <?php echo smartyTranslate(array('s'=>'Does not apply to the shipping costs','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
</span>
	</div>
</div>

<div id="apply_discount_amount_div" class="form-group">
	<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Amount','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
	<div class="col-lg-7">
		<div class="row">
			<div class="col-lg-4">
				<input type="text" id="reduction_amount" name="reduction_amount" value="<?php echo floatval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_amount'));?>
" onchange="this.value = this.value.replace(/,/g, '.');" />
			</div>
			<div class="col-lg-4">
				<select name="reduction_currency" >
				<?php  $_smarty_tpl->tpl_vars['currency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['currency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->key => $_smarty_tpl->tpl_vars['currency']->value) {
$_smarty_tpl->tpl_vars['currency']->_loop = true;
?>
					<option value="<?php echo intval($_smarty_tpl->tpl_vars['currency']->value['id_currency']);?>
" <?php if ($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_currency')==$_smarty_tpl->tpl_vars['currency']->value['id_currency']||(!$_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_currency')&&$_smarty_tpl->tpl_vars['currency']->value['id_currency']==$_smarty_tpl->tpl_vars['defaultCurrency']->value)) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['currency']->value['iso_code'];?>
</option>
				<?php } ?>
				</select>
			</div>
			<div class="col-lg-4">
				<select name="reduction_tax" >
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_tax')==0) {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Tax excluded','d'=>'Admin.Global'),$_smarty_tpl);?>
</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_tax')==1) {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Tax included','d'=>'Admin.Global'),$_smarty_tpl);?>
</option>
				</select>
			</div>
		</div>
	</div>
</div>

<div id="apply_discount_to_div" class="form-group">
	<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Apply a discount to','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</label>
	<div class="col-lg-7">
		<p class="radio">
			<label for="apply_discount_to_order">
				<input type="radio" name="apply_discount_to" id="apply_discount_to_order" value="order"<?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_product'))==0) {?> checked="checked"<?php }?> />
				 <?php echo smartyTranslate(array('s'=>'Order (without shipping)','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

			</label>
		</p>
		<p class="radio">
			<label for="apply_discount_to_product">
				<input type="radio" name="apply_discount_to" id="apply_discount_to_product" value="specific"<?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_product'))>0) {?> checked="checked"<?php }?> />
				<?php echo smartyTranslate(array('s'=>'Specific product','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

			</label>
		</p>
		<p class="radio">
			<label for="apply_discount_to_cheapest">
				<input type="radio" name="apply_discount_to" id="apply_discount_to_cheapest" value="cheapest"<?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_product'))==-1) {?> checked="checked"<?php }?> />
				 <?php echo smartyTranslate(array('s'=>'Cheapest product','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

			</label>
		</p>
		<p class="radio">
			<label for="apply_discount_to_selection">
				<input type="radio" name="apply_discount_to" id="apply_discount_to_selection" value="selection"<?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_product'))==-2) {?> checked="checked"<?php }?><?php if (count($_smarty_tpl->tpl_vars['product_rule_groups']->value)==0) {?>disabled="disabled"<?php }?> />
				<?php echo smartyTranslate(array('s'=>'Selected product(s)','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
<?php if (count($_smarty_tpl->tpl_vars['product_rule_groups']->value)==0) {?>&nbsp;<span id="apply_discount_to_selection_warning" class="text-muted clearfix"><i class="icon-warning-sign"></i> <a href="#" id="apply_discount_to_selection_shortcut"><?php echo smartyTranslate(array('s'=>'You must select some products before','d'=>'Admin.Catalog.Notification'),$_smarty_tpl);?>
</a></span><?php }?>
			</label>
		</p>
	</div>
</div>

<div id="apply_discount_to_product_div" class="form-group">
	<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Product','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
	<div class="col-lg-9">
		<div class="input-group col-lg-5">
			<input type="text" id="reductionProductFilter" name="reductionProductFilter" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['reductionProductFilter']->value,'html','UTF-8');?>
" />
			<input type="hidden" id="reduction_product" name="reduction_product" value="<?php echo intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_product'));?>
" />
			<span class="input-group-addon"><i class="icon-search"></i></span>
		</div>
	</div>
</div>

<div id="apply_discount_to_product_special" class="form-group">
 	<label class="control-label col-lg-3">
    <span class="label-tooltip" data-toggle="tooltip"
        title="<?php echo smartyTranslate(array('s'=>'If enabled, the voucher will not apply to products already on sale.'),$_smarty_tpl);?>
">
    <?php echo smartyTranslate(array('s'=>'Exclude discounted products','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

    </span>
  </label>
 	<div class="col-lg-9">
 		<span class="switch prestashop-switch fixed-width-lg">
 			<input type="radio" name="reduction_exclude_special" id="reduction_exclude_special_on" value="1"<?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_exclude_special'))) {?> checked="checked"<?php }?>/>
 			<label class="t" for="reduction_exclude_special_on">
 				<?php echo smartyTranslate(array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl);?>

 			</label>
 			<input type="radio" name="reduction_exclude_special" id="reduction_exclude_special_off" value="0"<?php if (!intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'reduction_exclude_special'))) {?> checked="checked"<?php }?>/>
 			<label class="t" for="reduction_exclude_special_off">
 				<?php echo smartyTranslate(array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl);?>

 			</label>
 			<a class="slide-button btn"></a>
 		</span>
 	</div>
 </div>

<div class="form-group">
	<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Send a free gift','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</label>
	<div class="col-lg-9">
		<span class="switch prestashop-switch fixed-width-lg">
			<input type="radio" name="free_gift" id="free_gift_on" value="1" <?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'gift_product'))) {?>checked="checked"<?php }?> />
			<label class="t" for="free_gift_on">
				<?php echo smartyTranslate(array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl);?>

			</label>
			<input type="radio" name="free_gift" id="free_gift_off" value="0" <?php if (!intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'gift_product'))) {?>checked="checked"<?php }?> />
			<label class="t" for="free_gift_off">
				<?php echo smartyTranslate(array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl);?>

			</label>
			<a class="slide-button btn"></a>
		</span>
	</div>
</div>

<div id="free_gift_div" class="form-group">
	<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Search a product','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</label>
	<div class="col-lg-9">
		<div class="input-group col-lg-5">
			<input type="text" id="giftProductFilter" value="<?php echo $_smarty_tpl->tpl_vars['giftProductFilter']->value;?>
" />
			<span class="input-group-addon"><i class="icon-search"></i></span>
		</div>
	</div>
</div>

<div id="gift_products_found" <?php if ($_smarty_tpl->tpl_vars['gift_product_select']->value=='') {?>style="display:none"<?php }?>>
	<div id="gift_product_list" class="form-group">
		<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Matching products','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</label>
		<div class="col-lg-5">
			<select name="gift_product" id="gift_product" onclick="displayProductAttributes();" class="control-form">
				<?php echo $_smarty_tpl->tpl_vars['gift_product_select']->value;?>

			</select>
		</div>
	</div>
	<div id="gift_attributes_list" class="form-group" <?php if (!$_smarty_tpl->tpl_vars['hasAttribute']->value) {?>style="display:none"<?php }?>>
		<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Available combinations','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</label>
		<div class="col-lg-5" id="gift_attributes_list_select">
			<?php echo $_smarty_tpl->tpl_vars['gift_product_attribute_select']->value;?>

		</div>
	</div>
</div>
<div id="gift_products_err" class="alert alert-warning" style="display:none"></div>
<?php }} ?>
