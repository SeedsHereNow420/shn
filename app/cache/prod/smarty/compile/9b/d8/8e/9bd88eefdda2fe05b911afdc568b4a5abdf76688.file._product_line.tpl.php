<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 13:11:03
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_product_line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16694746595c33c067ef69d6-41541380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9bd88eefdda2fe05b911afdc568b4a5abdf76688' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_product_line.tpl',
      1 => 1513708271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16694746595c33c067ef69d6-41541380',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'product' => 0,
    'link' => 0,
    'product_price' => 0,
    'currency' => 0,
    'can_edit' => 0,
    'display_warehouse' => 0,
    'refund' => 0,
    'return' => 0,
    'stock_management' => 0,
    'productQuantity' => 0,
    'amount_refundable' => 0,
    'invoices_collection' => 0,
    'invoice' => 0,
    'current_id_lang' => 0,
    'pack_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c33c068344895_71629138',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c33c068344895_71629138')) {function content_5c33c068344895_71629138($_smarty_tpl) {?>


<?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
	<?php $_smarty_tpl->tpl_vars['product_price'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_excl']+$_smarty_tpl->tpl_vars['product']->value['ecotax']), null, 0);?>
<?php } else { ?>
	<?php $_smarty_tpl->tpl_vars['product_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_incl'], null, 0);?>
<?php }?>

<?php if (($_smarty_tpl->tpl_vars['product']->value['product_quantity']>$_smarty_tpl->tpl_vars['product']->value['customized_product_quantity'])) {?>
<tr class="product-line-row">
	<td><?php if (isset($_smarty_tpl->tpl_vars['product']->value['image'])&&$_smarty_tpl->tpl_vars['product']->value['image']->id) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['image_tag'];?>
<?php }?></td>
	<td>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminProducts',true,array('id_product'=>intval($_smarty_tpl->tpl_vars['product']->value['product_id']),'updateproduct'=>'1')),'html','UTF-8');?>
">
			<span class="productName"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</span><br />
			<?php if ($_smarty_tpl->tpl_vars['product']->value['product_reference']) {?><?php echo smartyTranslate(array('s'=>'Reference number:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['product']->value['product_reference'];?>
<br /><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['product']->value['product_supplier_reference']) {?><?php echo smartyTranslate(array('s'=>'Supplier reference:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['product']->value['product_supplier_reference'];?>
<?php }?>
		</a>
        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['pack_items'])&&count($_smarty_tpl->tpl_vars['product']->value['pack_items'])>0) {?><br>
            <button name="package" class="btn btn-default" type="button" onclick="TogglePackage('<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
'); return false;" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
"><?php echo smartyTranslate(array('s'=>'Package content','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</button>
        <?php }?>
		<div class="row-editing-warning" style="display:none;">
			<div class="alert alert-warning">
				<strong><?php echo smartyTranslate(array('s'=>'Editing this product line will remove the reduction and base price.','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>
</strong>
			</div>
		</div>
	</td>
	<td>
		<span class="product_price_show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
</span>
		<?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
		<div class="product_price_edit" style="display:none;">
			<input type="hidden" name="product_id_order_detail" class="edit_product_id_order_detail" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
" />
			<div class="form-group">
				<div class="fixed-width-xl">
					<div class="input-group">
						<?php if ($_smarty_tpl->tpl_vars['currency']->value->format%2) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax excl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
						<input type="text" name="product_price_tax_excl" class="edit_product_price_tax_excl edit_product_price" value="<?php echo Tools::ps_round($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_excl'],2);?>
"/>
						<?php if (!($_smarty_tpl->tpl_vars['currency']->value->format%2)) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax excl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
					</div>
				</div>
				<br/>
				<div class="fixed-width-xl">
					<div class="input-group">
						<?php if ($_smarty_tpl->tpl_vars['currency']->value->format%2) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax incl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
						<input type="text" name="product_price_tax_incl" class="edit_product_price_tax_incl edit_product_price" value="<?php echo Tools::ps_round($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_incl'],2);?>
"/>
						<?php if (!($_smarty_tpl->tpl_vars['currency']->value->format%2)) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax incl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
					</div>
				</div>
			</div>
		</div>
		<?php }?>
	</td>
	<td class="productQuantity text-center">
		<span class="product_quantity_show<?php if ((int)$_smarty_tpl->tpl_vars['product']->value['product_quantity']-(int)$_smarty_tpl->tpl_vars['product']->value['customized_product_quantity']>1) {?> badge<?php }?>"><?php echo (int)$_smarty_tpl->tpl_vars['product']->value['product_quantity']-(int)$_smarty_tpl->tpl_vars['product']->value['customized_product_quantity'];?>
</span>
		<?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
		<span class="product_quantity_edit" style="display:none;">
			<input type="text" name="product_quantity" class="edit_product_quantity" value="<?php echo htmlentities($_smarty_tpl->tpl_vars['product']->value['product_quantity']);?>
"/>
		</span>
		<?php }?>
	</td>
	<?php if ($_smarty_tpl->tpl_vars['display_warehouse']->value) {?>
		<td>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['warehouse_name'],'html','UTF-8');?>

			<?php if ($_smarty_tpl->tpl_vars['product']->value['warehouse_location']) {?>
				<br><?php echo smartyTranslate(array('s'=>'Location','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
: <strong><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['warehouse_location'],'html','UTF-8');?>
</strong>
			<?php }?>
		</td>
	<?php }?>
	<?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())) {?>
		<td class="productQuantity text-center">
			<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['amount_refund'])) {?>
				<?php echo smartyTranslate(array('s'=>'%quantity_refunded% (%amount_refunded% refund)','sprintf'=>array('%quantity_refunded%'=>$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded'],'%amount_refunded%'=>$_smarty_tpl->tpl_vars['product']->value['amount_refund']),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

			<?php }?>
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['quantity_refundable'];?>
" class="partialRefundProductQuantity" />
			<input type="hidden" value="<?php echo (Tools::ps_round($_smarty_tpl->tpl_vars['product_price']->value,2)*($_smarty_tpl->tpl_vars['product']->value['product_quantity']-$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']));?>
" class="partialRefundProductAmount" />
			<?php if (count($_smarty_tpl->tpl_vars['product']->value['refund_history'])) {?>
				<span class="tooltip">
					<span class="tooltip_label tooltip_button">+</span>
					<span class="tooltip_content">
					<span class="title"><?php echo smartyTranslate(array('s'=>'Refund history','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
					<?php  $_smarty_tpl->tpl_vars['refund'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['refund']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['refund_history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['refund']->key => $_smarty_tpl->tpl_vars['refund']->value) {
$_smarty_tpl->tpl_vars['refund']->_loop = true;
?>
						<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['refund']->value['date_add']),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['refund']->value['amount_tax_incl']),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smartyTranslate(array('s'=>'%refund_date% - %refund_amount%','sprintf'=>array('%refund_date%'=>$_tmp1,'%refund_amount%'=>$_tmp2),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
<br />
					<?php } ?>
					</span>
				</span>
			<?php }?>
		</td>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||$_smarty_tpl->tpl_vars['order']->value->hasProductReturned()) {?>
		<td class="productQuantity text-center">
			<?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity_return'];?>

			<?php if (count($_smarty_tpl->tpl_vars['product']->value['return_history'])) {?>
				<span class="tooltip">
					<span class="tooltip_label tooltip_button">+</span>
					<span class="tooltip_content">
					<span class="title"><?php echo smartyTranslate(array('s'=>'Return history','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
					<?php  $_smarty_tpl->tpl_vars['return'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['return']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['return_history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['return']->key => $_smarty_tpl->tpl_vars['return']->value) {
$_smarty_tpl->tpl_vars['return']->_loop = true;
?>
						<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['return']->value['date_add']),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smartyTranslate(array('s'=>'%return_date% - %return_quantity% - %return_state%','sprintf'=>array('%return_date%'=>$_tmp3,'%return_quantity%'=>$_smarty_tpl->tpl_vars['return']->value['product_quantity'],'3return_state%'=>$_smarty_tpl->tpl_vars['return']->value['state']),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
<br />
					<?php } ?>
					</span>
				</span>
			<?php }?>
		</td>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['stock_management']->value) {?><td class="productQuantity product_stock text-center"><?php echo $_smarty_tpl->tpl_vars['product']->value['current_stock'];?>
</td><?php }?>
	<td class="total_product">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>(Tools::ps_round($_smarty_tpl->tpl_vars['product_price']->value,2)*($_smarty_tpl->tpl_vars['product']->value['product_quantity']-$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'])),'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

	</td>
	<td colspan="2" style="display: none;" class="add_product_fields">&nbsp;</td>
	<td class="cancelCheck standard_refund_fields current-edit" style="display:none">
		<input type="hidden" name="totalQtyReturn" id="totalQtyReturn" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity_return'];?>
" />
		<input type="hidden" name="totalQty" id="totalQty" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity'];?>
" />
		<input type="hidden" name="productName" id="productName" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
" />
	<?php if (((!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||Configuration::get('PS_ORDER_RETURN'))&&(int)($_smarty_tpl->tpl_vars['product']->value['product_quantity_return'])<(int)($_smarty_tpl->tpl_vars['product']->value['product_quantity']))) {?>
		<input type="checkbox" name="id_order_detail[<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
]" id="id_order_detail[<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
" onchange="setCancelQuantity(this, <?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity']-$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']-$_smarty_tpl->tpl_vars['product']->value['product_quantity_return']-$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded'];?>
)" <?php if (($_smarty_tpl->tpl_vars['product']->value['product_quantity_return']+$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded']>=$_smarty_tpl->tpl_vars['product']->value['product_quantity'])) {?>disabled="disabled" <?php }?>/>
	<?php } else { ?>
		--
	<?php }?>
	</td>
	<td class="cancelQuantity standard_refund_fields current-edit" style="display:none">
	<?php if (($_smarty_tpl->tpl_vars['product']->value['product_quantity_return']+$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded']>=$_smarty_tpl->tpl_vars['product']->value['product_quantity'])) {?>
		<input type="hidden" name="cancelQuantity[<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
]" value="0" />
	<?php } elseif ((!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||Configuration::get('PS_ORDER_RETURN'))) {?>
		<input type="text" id="cancelQuantity_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
" name="cancelQuantity[<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
]" onchange="checkTotalRefundProductQuantity(this)" value="" />
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']) {?>
		<?php $_smarty_tpl->tpl_vars['productQuantity'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value['product_quantity']-$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']), null, 0);?>
	<?php } else { ?>
		<?php $_smarty_tpl->tpl_vars['productQuantity'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_quantity'], null, 0);?>
	<?php }?>

	<?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered())) {?>
		<?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded'];?>
/<?php echo $_smarty_tpl->tpl_vars['productQuantity']->value-$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded'];?>

	<?php } elseif (($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())) {?>
		<?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity_return'];?>
/<?php echo $_smarty_tpl->tpl_vars['productQuantity']->value;?>

	<?php } else { ?>
		0/<?php echo $_smarty_tpl->tpl_vars['productQuantity']->value;?>

	<?php }?>
	</td>
	<td class="partial_refund_fields current-edit" colspan="2" style="display:none; width: 250px;">
		<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity_refundable']>0) {?>
		<?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
			<?php $_smarty_tpl->tpl_vars['amount_refundable'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['amount_refundable'], null, 0);?>
		<?php } else { ?>
			<?php $_smarty_tpl->tpl_vars['amount_refundable'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['amount_refundable_tax_incl'], null, 0);?>
		<?php }?>
		<div class="form-group">
			<div class="<?php if ($_smarty_tpl->tpl_vars['product']->value['amount_refundable']>0) {?>col-lg-4<?php } else { ?>col-lg-12<?php }?>">
				<label class="control-label">
					<?php echo smartyTranslate(array('s'=>'Quantity:'),$_smarty_tpl);?>

				</label>
				<div class="input-group">
					<input onchange="checkPartialRefundProductQuantity(this)" type="text" name="partialRefundProductQuantity[<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
]" value="0" />
					<div class="input-group-addon">/ <?php echo $_smarty_tpl->tpl_vars['product']->value['quantity_refundable'];?>
</div>
				</div>
			</div>
			<div class="<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity_refundable']>0) {?>col-lg-8<?php } else { ?>col-lg-12<?php }?>">
				<label class="control-label">
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Amount','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
					<small class="text-muted">(<?php echo Smarty::$_smarty_vars['capture']['TaxMethod'];?>
)</small>
				</label>
				<div class="input-group">
					<?php if ($_smarty_tpl->tpl_vars['currency']->value->format%2) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</div><?php }?>
					<input onchange="checkPartialRefundProductAmount(this)" type="text" name="partialRefundProduct[<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
]" />
					<?php if (!($_smarty_tpl->tpl_vars['currency']->value->format%2)) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</div><?php }?>
				</div>
        <p class="help-block"><i class="icon-warning-sign"></i> <?php echo smartyTranslate(array('s'=>'(Max %amount_refundable% %tax_method%)','sprintf'=>array('%amount_refundable%'=>Tools::displayPrice(Tools::ps_round($_smarty_tpl->tpl_vars['amount_refundable']->value,2),$_smarty_tpl->tpl_vars['currency']->value->id),'%tax_method%'=>Smarty::$_smarty_vars['capture']['TaxMethod']),'d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl);?>
</p>
			</div>
		</div>
		<?php }?>
	</td>
	<?php if (($_smarty_tpl->tpl_vars['can_edit']->value&&!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered())) {?>
	<td class="product_invoice" style="display: none;">
		<?php if (sizeof($_smarty_tpl->tpl_vars['invoices_collection']->value)) {?>
		<select name="product_invoice" class="edit_product_invoice">
			<?php  $_smarty_tpl->tpl_vars['invoice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['invoice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['invoices_collection']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['invoice']->key => $_smarty_tpl->tpl_vars['invoice']->value) {
$_smarty_tpl->tpl_vars['invoice']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['invoice']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['invoice']->value->id==$_smarty_tpl->tpl_vars['product']->value['id_order_invoice']) {?>selected="selected"<?php }?>>
				#<?php echo Configuration::get('PS_INVOICE_PREFIX',$_smarty_tpl->tpl_vars['current_id_lang']->value,null,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>
<?php echo sprintf('%06d',$_smarty_tpl->tpl_vars['invoice']->value->number);?>

			</option>
			<?php } ?>
		</select>
		<?php } else { ?>
		&nbsp;
		<?php }?>
	</td>
	<td class="product_action text-right">
		
		<div class="btn-group">
			<button type="button" class="btn btn-default edit_product_change_link">
				<i class="icon-pencil"></i>
				<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl);?>

			</button>
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li>
					<a href="#" class="delete_product_line">
						<i class="icon-trash"></i>
						<?php echo smartyTranslate(array('s'=>'Delete','d'=>'Admin.Actions'),$_smarty_tpl);?>

					</a>
				</li>
			</ul>
		</div>
		
		<button type="button" class="btn btn-default submitProductChange" style="display: none;">
			<i class="icon-ok"></i>
			<?php echo smartyTranslate(array('s'=>'Update','d'=>'Admin.Actions'),$_smarty_tpl);?>

		</button>
		<button type="button" class="btn btn-default cancel_product_change_link" style="display: none;">
			<i class="icon-remove"></i>
			<?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>

		</button>
	</td>
	<?php }?>
</tr>
   <?php if (isset($_smarty_tpl->tpl_vars['product']->value['pack_items'])&&count($_smarty_tpl->tpl_vars['product']->value['pack_items'])>0) {?>
    <tr>
        <td colspan="8" style="width:100%">
            <table style="width: 100%; display:none;" class="table" id="pack_items_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
">
            <thead>
                <th style="width:15%;">&nbsp;</th>
                <th style="width:15%;">&nbsp;</th>
                <th style="width:50%;"><span class="title_box "><?php echo smartyTranslate(array('s'=>'Product','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
                <th style="width:10%;"><span class="title_box "><?php echo smartyTranslate(array('s'=>'Qty','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</th>
                <?php if ($_smarty_tpl->tpl_vars['stock_management']->value) {?><th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Available quantity','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span></th><?php }?>
                <th>&nbsp;</th>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['pack_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pack_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['pack_items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pack_item']->key => $_smarty_tpl->tpl_vars['pack_item']->value) {
$_smarty_tpl->tpl_vars['pack_item']->_loop = true;
?>
                <?php if (!empty($_smarty_tpl->tpl_vars['pack_item']->value['active'])) {?>
                    <tr class="product-line-row" <?php if (isset($_smarty_tpl->tpl_vars['pack_item']->value['image'])&&$_smarty_tpl->tpl_vars['pack_item']->value['image']->id&&isset($_smarty_tpl->tpl_vars['pack_item']->value['image_size'])) {?> height="<?php echo $_smarty_tpl->tpl_vars['pack_item']->value['image_size'][1]+7;?>
"<?php }?>>
                        <td><?php echo smartyTranslate(array('s'=>'Package item','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</td>
                        <td><?php if (isset($_smarty_tpl->tpl_vars['pack_item']->value['image'])&&$_smarty_tpl->tpl_vars['pack_item']->value['image']->id) {?><?php echo $_smarty_tpl->tpl_vars['pack_item']->value['image_tag'];?>
<?php }?></td>
                        <td>
                            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminProducts',true,array('id_product'=>$_smarty_tpl->tpl_vars['pack_item']->value['id_product'],'updateproduct'=>'1')),'html','UTF-8');?>
">
                                <span class="productName"><?php echo $_smarty_tpl->tpl_vars['pack_item']->value['name'];?>
</span><br />
                                <?php if ($_smarty_tpl->tpl_vars['pack_item']->value['reference']) {?><?php echo smartyTranslate(array('s'=>'Ref:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['pack_item']->value['reference'];?>
<br /><?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['pack_item']->value['supplier_reference']) {?><?php echo smartyTranslate(array('s'=>'Ref Supplier:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['pack_item']->value['supplier_reference'];?>
<?php }?>
                            </a>
                        </td>
                        <td class="productQuantity">
                            <span class="product_quantity_show<?php if ((int)$_smarty_tpl->tpl_vars['pack_item']->value['pack_quantity']>1) {?> red bold<?php }?>"><?php echo $_smarty_tpl->tpl_vars['pack_item']->value['pack_quantity'];?>
</span>
                        </td>
                        <?php if ($_smarty_tpl->tpl_vars['stock_management']->value) {?><td class="productQuantity product_stock"><?php echo $_smarty_tpl->tpl_vars['pack_item']->value['current_stock'];?>
</td><?php }?>
                        <td>&nbsp;</td>
                    </tr>
                <?php }?>
            <?php } ?>
            </tbody>
            </table>
        </td>
    </tr>
    <?php }?>
<?php }?>
<?php }} ?>
