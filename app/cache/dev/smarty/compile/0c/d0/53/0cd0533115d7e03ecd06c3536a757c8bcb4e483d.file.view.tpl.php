<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:30:32
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/carts/helpers/view/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16917391695c322d28d161b0-77546275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cd0533115d7e03ecd06c3536a757c8bcb4e483d' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/carts/helpers/view/view.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '7cac1082554124db66226276f88c32a350f4f98e' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/helpers/view/view.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16917391695c322d28d161b0-77546275',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name_controller' => 0,
    'hookName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322d28d6f041_78415178',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322d28d6f041_78415178')) {function content_5c322d28d6f041_78415178($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/function.math.php';
?>

<div class="leadin"></div>


<div class="panel">
	<?php echo $_smarty_tpl->tpl_vars['kpi']->value;?>

</div>
<div class="row">
	<div class="col-lg-6">
		<div class="panel">
			<h3><i class="icon-user"></i> <?php echo smartyTranslate(array('s'=>'Customer information','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</h3>
			<?php if ($_smarty_tpl->tpl_vars['customer']->value->id) {?>
				<a class="btn btn-default pull-right" href="mailto:<?php echo $_smarty_tpl->tpl_vars['customer']->value->email;?>
"><i class="icon-envelope"></i> <?php echo $_smarty_tpl->tpl_vars['customer']->value->email;?>
</a>
				<h2>
					<?php if ($_smarty_tpl->tpl_vars['customer']->value->id_gender==1) {?>
					<i class="icon-male"></i>
					<?php } elseif ($_smarty_tpl->tpl_vars['customer']->value->id_gender==2) {?>
					<i class="icon-female"></i>
					<?php } else { ?>
					<i class="icon-question"></i>
					<?php }?>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomers'),'html','UTF-8');?>
&amp;id_customer=<?php echo intval($_smarty_tpl->tpl_vars['customer']->value->id);?>
&amp;viewcustomer"><?php echo $_smarty_tpl->tpl_vars['customer']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['customer']->value->lastname;?>
</a></h2>
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Account registration date:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</label>
						<div class="col-lg-3"><p class="form-control-static"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['customer']->value->date_add),$_smarty_tpl);?>
</p></div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Valid orders placed:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</label>
						<div class="col-lg-3"><p class="form-control-static"><?php echo $_smarty_tpl->tpl_vars['customer_stats']->value['nb_orders'];?>
</p></div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Total spent since registration:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</label>
						<div class="col-lg-3"><p class="form-control-static"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['customer_stats']->value['total_orders'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</p></div>
					</div>
				</div>
			<?php } else { ?>
				<h2><?php echo smartyTranslate(array('s'=>'Guest not registered','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</h2>
			<?php }?>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel">
			<h3><i class="icon-shopping-cart"></i> <?php echo smartyTranslate(array('s'=>'Order information','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</h3>
			<?php if ($_smarty_tpl->tpl_vars['order']->value->id) {?>
				<h2><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
&amp;vieworder"> <?php echo smartyTranslate(array('s'=>'Order #%d','sprintf'=>array(sprintf("%06d",$_smarty_tpl->tpl_vars['order']->value->id)),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</a></h2>
				<?php echo smartyTranslate(array('s'=>'Made on:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['order']->value->date_add),$_smarty_tpl);?>

			<?php } else { ?>
				<h2><?php echo smartyTranslate(array('s'=>'No order was created from this cart.','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</h2>
				<?php if ($_smarty_tpl->tpl_vars['customer']->value->id) {?>
					<a class="btn btn-default" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
&amp;id_cart=<?php echo intval($_smarty_tpl->tpl_vars['cart']->value->id);?>
&amp;addorder"><i class="icon-shopping-cart"></i> <?php echo smartyTranslate(array('s'=>'Create an order from this cart.','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</a>
				<?php }?>
			<?php }?>
		</div>
	</div>
</div>
<div class="panel">
	<h3><i class="icon-archive"></i> <?php echo smartyTranslate(array('s'=>'Cart summary','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</h3>
		<div class="row">
			<table class="table" id="orderProducts">
				<thead>
					<tr>
						<th class="fixed-width-xs">&nbsp;</th>
						<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Product','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
						<th class="text-right fixed-width-md"><span class="title_box"><?php echo smartyTranslate(array('s'=>'Unit price','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
						<th class="text-center fixed-width-md"><span class="title_box"><?php echo smartyTranslate(array('s'=>'Quantity','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
						<th class="text-center fixed-width-sm"><span class="title_box"><?php echo smartyTranslate(array('s'=>'Stock','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
						<th class="text-right fixed-width-sm"><span class="title_box"><?php echo smartyTranslate(array('s'=>'Total','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
					</tr>
				</thead>
				<tbody>
				<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['product']->value['customizedDatas']) {?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
</td>
							<td><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminProducts',true,array('id_product'=>$_smarty_tpl->tpl_vars['product']->value['id_product'],'updateproduct'=>1)),'html','UTF-8');?>
">
										<span class="productName"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</span><?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes'])) {?><br /><?php echo $_smarty_tpl->tpl_vars['product']->value['attributes'];?>
<?php }?><br />
									<?php if ($_smarty_tpl->tpl_vars['product']->value['reference']) {?><?php echo smartyTranslate(array('s'=>'Ref:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['product']->value['reference'];?>
<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['product']->value['reference']&&$_smarty_tpl->tpl_vars['product']->value['supplier_reference']) {?> / <?php echo $_smarty_tpl->tpl_vars['product']->value['supplier_reference'];?>
<?php }?>
								</a>
							</td>
							<td class="text-right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_wt'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
							<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'];?>
</td>
							<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['product']->value['qty_in_stock'];?>
</td>
							<td class="text-right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_customization_wt'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
						</tr>

            <?php  $_smarty_tpl->tpl_vars['customizationPerAddress'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customizationPerAddress']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizedDatas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customizationPerAddress']->key => $_smarty_tpl->tpl_vars['customizationPerAddress']->value) {
$_smarty_tpl->tpl_vars['customizationPerAddress']->_loop = true;
?>
              <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customizationPerAddress']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
						    <?php if (count($_smarty_tpl->tpl_vars['customizationPerAddress']->value)==1&&((int)$_smarty_tpl->tpl_vars['customization']->value['id_customization']!=(int)$_smarty_tpl->tpl_vars['product']->value['id_customization'])) {?><?php continue 1?><?php }?>
						    <tr>
							    <td colspan="2">
							    <?php  $_smarty_tpl->tpl_vars['datas'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datas']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customization']->value['datas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datas']->key => $_smarty_tpl->tpl_vars['datas']->value) {
$_smarty_tpl->tpl_vars['datas']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['datas']->key;
?>
								    <?php if ($_smarty_tpl->tpl_vars['type']->value==constant('Product::CUSTOMIZE_FILE')) {?>
									    <ul style="margin: 0; padding: 0; list-style-type: none;">
									    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
											    <li style="display: inline; margin: 2px;">
												    <a href="displayImage.php?img=<?php echo $_smarty_tpl->tpl_vars['data']->value['value'];?>
&name=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
-file<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" class="_blank">
												    <img src="<?php echo $_smarty_tpl->tpl_vars['pic_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['value'];?>
_small" alt="" /></a>
											    </li>
									    <?php } ?>
									    </ul>
								    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==constant('Product::CUSTOMIZE_TEXTFIELD')) {?>
									    <div class="form-horizontal">
										    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
											    <div class="form-group">
												    <span class="control-label col-lg-3"><strong><?php if ($_smarty_tpl->tpl_vars['data']->value['name']) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Text #','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
<?php }?></strong></span>
												    <div class="col-lg-9">
													    <p class="form-control-static"><?php echo $_smarty_tpl->tpl_vars['data']->value['value'];?>
</p>
												    </div>
											    </div>
										    <?php } ?>
									    </div>
								    <?php }?>
							    <?php } ?>
							    </td>
							    <td></td>
							    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];?>
</td>
							    <td></td>
							    <td></td>
						    </tr>
              <?php } ?>
						<?php } ?>
					<?php }?>

					<?php if (!isset($_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'])||$_smarty_tpl->tpl_vars['product']->value['cart_quantity']>$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']) {?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
</td>
							<td>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminProducts',true,array('id_product'=>$_smarty_tpl->tpl_vars['product']->value['id_product'],'updateproduct'=>1)),'html','UTF-8');?>
">
									<span class="productName"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</span><?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes'])) {?><br /><?php echo $_smarty_tpl->tpl_vars['product']->value['attributes'];?>
<?php }?><br />
									<?php if ($_smarty_tpl->tpl_vars['product']->value['reference']) {?><?php echo smartyTranslate(array('s'=>'Ref:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['product']->value['reference'];?>
<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['product']->value['reference']&&$_smarty_tpl->tpl_vars['product']->value['supplier_reference']) {?> / <?php echo $_smarty_tpl->tpl_vars['product']->value['supplier_reference'];?>
<?php }?>
								</a>
							</td>
							<td class="text-right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['product_price'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
							<td class="text-center"><?php if (isset($_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'])) {?><?php echo smarty_function_math(array('equation'=>'x - y','x'=>$_smarty_tpl->tpl_vars['product']->value['cart_quantity'],'y'=>intval($_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'])),$_smarty_tpl);?>
<?php } else { ?><?php echo smarty_function_math(array('equation'=>'x - y','x'=>$_smarty_tpl->tpl_vars['product']->value['cart_quantity'],'y'=>intval($_smarty_tpl->tpl_vars['product']->value['customization_quantity'])),$_smarty_tpl);?>
<?php }?></td>
							<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['product']->value['qty_in_stock'];?>
</td>
							<td class="text-right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['product_total'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
						</tr>
					<?php }?>
				<?php } ?>
				<tr>
					<td colspan="5"><?php echo smartyTranslate(array('s'=>'Total cost of products:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</td>
					<td class="text-right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['total_products']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['total_discounts']->value!=0) {?>
				<tr>
					<td colspan="5"><?php echo smartyTranslate(array('s'=>'Total value of vouchers:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</td>
					<td class="text-right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['total_discounts']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
				</tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['total_wrapping']->value>0) {?>
				<tr>
					<td colspan="5"><?php echo smartyTranslate(array('s'=>'Total cost of gift wrapping:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</td>
					<td class="text-right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
				</tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true,Cart::ONLY_SHIPPING)>0) {?>
				<tr>
					<td colspan="5"><?php echo smartyTranslate(array('s'=>'Total shipping costs:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</td>
					<td class="text-right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['total_shipping']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
				</tr>
				<?php }?>
				<tr>
					<td colspan="5" class=" success"><strong><?php echo smartyTranslate(array('s'=>'Total','d'=>'Admin.Global'),$_smarty_tpl);?>
</strong></td>
					<td class="text-right success"><strong><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['total_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</strong></td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['discounts']->value) {?>
	<div class="clear">&nbsp;</div>
	<div class="row">
		<table class="table">
			<thead>
				<tr>
					<th class="fixed-width-xs"><img src="../img/admin/coupon.gif" alt="<?php echo smartyTranslate(array('s'=>'Discounts','d'=>'Admin.Global'),$_smarty_tpl);?>
" /></th>
					<th><?php echo smartyTranslate(array('s'=>'Discount name'),$_smarty_tpl);?>
</th>
					<th class="text-right fixed-width-md"><?php echo smartyTranslate(array('s'=>'Value','d'=>'Admin.Global'),$_smarty_tpl);?>
</th>
				</tr>
			</thead>
			<tbody>
			<?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
?>
				<tr>
					<td class="fixed-width-xs"><?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
</td>
					<td><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCartRules'),'html','UTF-8');?>
&amp;id_cart_rule=<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
&amp;updatecart_rule"><?php echo $_smarty_tpl->tpl_vars['discount']->value['name'];?>
</a></td>
					<td class="text-right fixed-width-md"><?php if ((float)$_smarty_tpl->tpl_vars['discount']->value['value_real']==0&&(int)$_smarty_tpl->tpl_vars['discount']->value['free_shipping']==1) {?><?php echo smartyTranslate(array('s'=>'Free shipping','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
<?php } else { ?>- <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
<?php }?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
	<?php }?>
	<div class="clear">&nbsp;</div>
	<div class="row alert alert-warning">
		<?php echo smartyTranslate(array('s'=>'For this particular customer group, prices are displayed as:','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>
 <b><?php if ($_smarty_tpl->tpl_vars['tax_calculation_method']->value==@constant('PS_TAX_EXC')) {?><?php echo smartyTranslate(array('s'=>'Tax excluded','d'=>'Admin.Global'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Tax included','d'=>'Admin.Global'),$_smarty_tpl);?>
<?php }?></b>
	</div>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminView'),$_smarty_tpl);?>

<?php if (isset($_smarty_tpl->tpl_vars['name_controller']->value)) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo ucfirst($_smarty_tpl->tpl_vars['name_controller']->value);?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php } elseif (isset($_GET['controller'])) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo htmlentities(ucfirst($_GET['controller']));?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php }?>
<?php }} ?>
