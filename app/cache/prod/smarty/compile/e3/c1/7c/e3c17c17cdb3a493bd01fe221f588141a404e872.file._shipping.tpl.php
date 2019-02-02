<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 13:11:04
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_shipping.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11106910115c33c068617b27-82128986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3c17c17cdb3a493bd01fe221f588141a404e872' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_shipping.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11106910115c33c068617b27-82128986',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'line' => 0,
    'currency' => 0,
    'link' => 0,
    'recalculate_shipping_cost' => 0,
    'carrier_list' => 0,
    'carrier' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c33c068683eb4_28433051',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c33c068683eb4_28433051')) {function content_5c33c068683eb4_28433051($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>
<div class="table-responsive">
	<table class="table" id="shipping_table">
		<thead>
			<tr>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Date','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box ">&nbsp;</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Carrier','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Weight','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Shipping cost','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Tracking number','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</span>
				</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value->getShipping(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value) {
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['line']->value['date_add'],'full'=>true),$_smarty_tpl);?>
</td>
				<td>&nbsp;</td>
				<td><?php echo $_smarty_tpl->tpl_vars['line']->value['carrier_name'];?>
</td>
				<td class="weight"><?php echo sprintf("%.3f",$_smarty_tpl->tpl_vars['line']->value['weight']);?>
 <?php echo Configuration::get('PS_WEIGHT_UNIT');?>
</td>
				<td class="price_carrier_<?php echo intval($_smarty_tpl->tpl_vars['line']->value['id_carrier']);?>
" class="center">
					<span>
					<?php if ($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_INC')) {?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['line']->value['shipping_cost_tax_incl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

					<?php } else { ?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['line']->value['shipping_cost_tax_excl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

					<?php }?>
					</span>
				</td>
				<td>
					<span class="shipping_number_show"><?php if ($_smarty_tpl->tpl_vars['line']->value['url']&&$_smarty_tpl->tpl_vars['line']->value['tracking_number']) {?><a class="_blank" href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['line']->value['url'],'@',$_smarty_tpl->tpl_vars['line']->value['tracking_number']);?>
"><?php echo $_smarty_tpl->tpl_vars['line']->value['tracking_number'];?>
</a><?php } else { ?><?php echo $_smarty_tpl->tpl_vars['line']->value['tracking_number'];?>
<?php }?></span>
				</td>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['line']->value['can_edit']) {?>
						<a href="#" class="edit_shipping_link btn btn-default"
						data-id-order-carrier="<?php echo intval($_smarty_tpl->tpl_vars['line']->value['id_order_carrier']);?>
"
						data-id-carrier="<?php echo intval($_smarty_tpl->tpl_vars['line']->value['id_carrier']);?>
"
						data-tracking-number="<?php echo htmlentities($_smarty_tpl->tpl_vars['line']->value['tracking_number']);?>
"
						>
 							<i class="icon-pencil"></i>
 							<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl);?>

 						</a>
					<?php }?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<!-- shipping update modal -->
	<div class="modal fade" id="modal-shipping">
		<div class="modal-dialog">
			<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
&amp;vieworder&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
">
				<input type="hidden" name="submitShippingNumber" id="submitShippingNumber" value="1" />
				<input type="hidden" name="id_order_carrier" id="id_order_carrier" />
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="<?php echo smartyTranslate(array('s'=>'Close','d'=>'Admin.Actions'),$_smarty_tpl);?>
"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><?php echo smartyTranslate(array('s'=>'Edit shipping details','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<?php if (!$_smarty_tpl->tpl_vars['recalculate_shipping_cost']->value) {?>
							<div class="alert alert-info">
							<?php echo smartyTranslate(array('s'=>'Please note that carrier change will not recalculate your shipping costs, if you want to change this please visit Shop Parameters > Order Settings','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

							</div>
							<?php }?>
							<div class="form-group">
								<div class="col-lg-5"><?php echo smartyTranslate(array('s'=>'Tracking number','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</div>
								<div class="col-lg-7"><input type="text" name="shipping_tracking_number" id="shipping_tracking_number" /></div>
							</div>
							<div class="form-group">
								<div class="col-lg-5"><?php echo smartyTranslate(array('s'=>'Carrier','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</div>
								<div class="col-lg-7">
									<select name="shipping_carrier" id="shipping_carrier">
										<?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carrier_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
?>
											<option value="<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['carrier']->value['name'],'html','UTF-8');?>
 <?php if (isset($_smarty_tpl->tpl_vars['carrier']->value['delay'])) {?>(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['carrier']->value['delay'],'html','UTF-8');?>
)<?php }?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>
</button>
						<button type="submit" class="btn btn-primary"><?php echo smartyTranslate(array('s'=>'Update','d'=>'Admin.Actions'),$_smarty_tpl);?>
</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- END shipping update modal -->
</div>
<?php }} ?>
