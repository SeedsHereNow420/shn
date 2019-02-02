<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 16:25:09
         compiled from "/var/www/html/SHN/pdf/invoice.product-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7371863665c2ff965296501-97657473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cda59b065d699d82f5d57ac60abcd71fc69ac1c3' => 
    array (
      0 => '/var/www/html/SHN/pdf/invoice.product-tab.tpl',
      1 => 1546552163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7371863665c2ff965296501-97657473',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'layout' => 0,
    'order_details' => 0,
    'bgcolor_class' => 0,
    'order_detail' => 0,
    'display_product_images' => 0,
    'order' => 0,
    'customizationPerAddress' => 0,
    'customization' => 0,
    'customization_infos' => 0,
    'end' => 0,
    'cart_rules' => 0,
    'cart_rule' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2ff9652c9b05_98645508',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2ff9652c9b05_98645508')) {function content_5c2ff9652c9b05_98645508($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/function.cycle.php';
?>
<table class="product" width="100%" cellpadding="4" cellspacing="0">

	<thead>
	<tr>
		<th class="product header small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['reference']['width'];?>
%"><?php echo smartyTranslate(array('s'=>'Reference','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</th>
		<th class="product header small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['product']['width'];?>
%"><?php echo smartyTranslate(array('s'=>'Product','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</th>
		<th class="product header small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['tax_code']['width'];?>
%"><?php echo smartyTranslate(array('s'=>'Tax Rate','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</th>

		<?php if (isset($_smarty_tpl->tpl_vars['layout']->value['before_discount'])) {?>
			<th class="product header small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['unit_price_tax_excl']['width'];?>
%"><?php echo smartyTranslate(array('s'=>'Base price','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
 <br /> <?php echo smartyTranslate(array('s'=>'(Tax excl.)','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</th>
		<?php }?>

		<th class="product header-right small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['unit_price_tax_excl']['width'];?>
%"><?php echo smartyTranslate(array('s'=>'Unit Price','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
 <br /> <?php echo smartyTranslate(array('s'=>'(Tax excl.)','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</th>
		<th class="product header small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['quantity']['width'];?>
%"><?php echo smartyTranslate(array('s'=>'Qty','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</th>
		<th class="product header-right small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['total_tax_excl']['width'];?>
%"><?php echo smartyTranslate(array('s'=>'Total','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
 <br /> <?php echo smartyTranslate(array('s'=>'(Tax excl.)','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</th>
	</tr>
	</thead>

	<tbody>

	<!-- PRODUCTS -->
	<?php  $_smarty_tpl->tpl_vars['order_detail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order_detail']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order_detail']->key => $_smarty_tpl->tpl_vars['order_detail']->value) {
$_smarty_tpl->tpl_vars['order_detail']->_loop = true;
?>
		<?php echo smarty_function_cycle(array('values'=>array("color_line_even","color_line_odd"),'assign'=>'bgcolor_class'),$_smarty_tpl);?>

		<tr class="product <?php echo $_smarty_tpl->tpl_vars['bgcolor_class']->value;?>
">

			<td class="product center">
				<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['product_reference'];?>

			</td>
			<td class="product left">
				<?php if ($_smarty_tpl->tpl_vars['display_product_images']->value) {?>
					<table width="100%">
						<tr>
							<td width="15%">
								<?php if (isset($_smarty_tpl->tpl_vars['order_detail']->value['image'])&&$_smarty_tpl->tpl_vars['order_detail']->value['image']->id) {?>
									<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['image_tag'];?>

								<?php }?>
							</td>
							<td width="5%">&nbsp;</td>
							<td width="80%">
								<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['product_name'];?>

							</td>
						</tr>
					</table>
				<?php } else { ?>
					<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['product_name'];?>

				<?php }?>

			</td>
			<td class="product center">
				<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['order_detail_tax_label'];?>

			</td>

			<?php if (isset($_smarty_tpl->tpl_vars['layout']->value['before_discount'])) {?>
				<td class="product center">
					<?php if (isset($_smarty_tpl->tpl_vars['order_detail']->value['unit_price_tax_excl_before_specific_price'])) {?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order_detail']->value['unit_price_tax_excl_before_specific_price']),$_smarty_tpl);?>

					<?php } else { ?>
						--
					<?php }?>
				</td>
			<?php }?>

			<td class="product right">
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order_detail']->value['unit_price_tax_excl_including_ecotax']),$_smarty_tpl);?>

				<?php if ($_smarty_tpl->tpl_vars['order_detail']->value['ecotax_tax_excl']>0) {?>
					<br>
					<small><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order_detail']->value['ecotax_tax_excl']),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smartyTranslate(array('s'=>'ecotax: %s','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo sprintf($_tmp2,$_tmp1);?>
</small>
				<?php }?>
			</td>
			<td class="product center">
				<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['product_quantity'];?>

			</td>
			<td  class="product right">
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order_detail']->value['total_price_tax_excl_including_ecotax']),$_smarty_tpl);?>

			</td>
		</tr>

		<?php  $_smarty_tpl->tpl_vars['customizationPerAddress'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customizationPerAddress']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_detail']->value['customizedDatas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customizationPerAddress']->key => $_smarty_tpl->tpl_vars['customizationPerAddress']->value) {
$_smarty_tpl->tpl_vars['customizationPerAddress']->_loop = true;
?>
			<?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_smarty_tpl->tpl_vars['customizationId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customizationPerAddress']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
 $_smarty_tpl->tpl_vars['customizationId']->value = $_smarty_tpl->tpl_vars['customization']->key;
?>
				<tr class="customization_data <?php echo $_smarty_tpl->tpl_vars['bgcolor_class']->value;?>
">
					<td class="center"> &nbsp;</td>

					<td>
						<?php if (isset($_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_TEXTFIELD_')])&&count($_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_TEXTFIELD_')])>0) {?>
							<table style="width: 100%;">
								<?php  $_smarty_tpl->tpl_vars['customization_infos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization_infos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_TEXTFIELD_')]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization_infos']->key => $_smarty_tpl->tpl_vars['customization_infos']->value) {
$_smarty_tpl->tpl_vars['customization_infos']->_loop = true;
?>
									<tr>
										<td style="width: 30%;">
											<?php ob_start();?><?php echo smartyTranslate(array('s'=>'%s:','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo sprintf($_tmp3,$_smarty_tpl->tpl_vars['customization_infos']->value['name']);?>

										</td>
										<td><?php if ((int)$_smarty_tpl->tpl_vars['customization_infos']->value['id_module']) {?><?php echo $_smarty_tpl->tpl_vars['customization_infos']->value['value'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['customization_infos']->value['value'];?>
<?php }?></td>
									</tr>
								<?php } ?>
							</table>
						<?php }?>

						<?php if (isset($_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_FILE_')])&&count($_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_FILE_')])>0) {?>
							<table style="width: 100%;">
								<tr>
									<td style="width: 70%;"><?php echo smartyTranslate(array('s'=>'image(s):','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</td>
									<td><?php echo count($_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_FILE_')]);?>
</td>
								</tr>
							</table>
						<?php }?>
					</td>

					<td class="center">
						(<?php if ($_smarty_tpl->tpl_vars['customization']->value['quantity']==0) {?>1<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];?>
<?php }?>)
					</td>

					<?php $_smarty_tpl->tpl_vars['end'] = new Smarty_variable(($_smarty_tpl->tpl_vars['layout']->value['_colCount']-3), null, 0);?>
					<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['end']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['end']->value)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 0, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
						<td class="center">
							--
						</td>
					<?php }} ?>

				</tr>
				<!--if !$smarty.foreach.custo_foreach.last-->
			<?php } ?>
		<?php } ?>
	<?php } ?>
	<!-- END PRODUCTS -->

	<!-- CART RULES -->

	<?php $_smarty_tpl->tpl_vars["shipping_discount_tax_incl"] = new Smarty_variable("0", null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['cart_rule'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cart_rule']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart_rules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['cart_rule']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['cart_rule']->key => $_smarty_tpl->tpl_vars['cart_rule']->value) {
$_smarty_tpl->tpl_vars['cart_rule']->_loop = true;
 $_smarty_tpl->tpl_vars['cart_rule']->index++;
 $_smarty_tpl->tpl_vars['cart_rule']->first = $_smarty_tpl->tpl_vars['cart_rule']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cart_rules_loop"]['first'] = $_smarty_tpl->tpl_vars['cart_rule']->first;
?>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['cart_rules_loop']['first']) {?>
		<tr class="discount">
			<th class="header" colspan="<?php echo $_smarty_tpl->tpl_vars['layout']->value['_colCount'];?>
">
				<?php echo smartyTranslate(array('s'=>'Discounts','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>

			</th>
		</tr>
		<?php }?>
		<tr class="discount">
			<td class="white right" colspan="<?php echo $_smarty_tpl->tpl_vars['layout']->value['_colCount']-1;?>
">
				<?php echo $_smarty_tpl->tpl_vars['cart_rule']->value['name'];?>

			</td>
			<td class="right white">
				- <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['cart_rule']->value['value_tax_excl']),$_smarty_tpl);?>

			</td>
		</tr>
	<?php } ?>

	</tbody>

</table>
<?php }} ?>
