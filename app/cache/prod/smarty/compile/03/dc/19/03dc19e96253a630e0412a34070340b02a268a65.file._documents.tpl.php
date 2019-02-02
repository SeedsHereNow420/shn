<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 13:11:04
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_documents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14349272135c33c068449ff4-96940080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03dc19e96253a630e0412a34070340b02a268a65' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_documents.tpl',
      1 => 1515322500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14349272135c33c068449ff4-96940080',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'document' => 0,
    'link' => 0,
    'current_id_lang' => 0,
    'currency' => 0,
    'current_index' => 0,
    'invoice_management_active' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c33c0685e31f9_02916025',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c33c0685e31f9_02916025')) {function content_5c33c0685e31f9_02916025($_smarty_tpl) {?>
<div class="table-responsive">
	<table class="table" id="documents_table">
		<thead>
			<tr>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Date','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Document','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Number','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Amount','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
				</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['document'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['document']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value->getDocuments(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['document']->key => $_smarty_tpl->tpl_vars['document']->value) {
$_smarty_tpl->tpl_vars['document']->_loop = true;
?>

				<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
					<?php if (isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
					<tr id="delivery_<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
					<?php } else { ?>
					<tr id="invoice_<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
					<?php }?>
				<?php } elseif (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderSlip') {?>
					<tr id="orderslip_<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
				<?php }?>

						<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['document']->value->date_add),$_smarty_tpl);?>
</td>
						<td>
							<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
								<?php if (isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
									<?php echo smartyTranslate(array('s'=>'Delivery slip','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

								<?php } else { ?>
									<?php echo smartyTranslate(array('s'=>'Invoice','d'=>'Admin.Global'),$_smarty_tpl);?>

								<?php }?>
							<?php } elseif (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderSlip') {?>
								<?php echo smartyTranslate(array('s'=>'Credit Slip','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

							<?php }?>
						</td>
						<td>
							<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
								<?php if (isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
									<a class="_blank" title="<?php echo smartyTranslate(array('s'=>'See the document'),$_smarty_tpl);?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'),'html','UTF-8');?>
&amp;submitAction=generateDeliverySlipPDF&amp;id_order_invoice=<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
								<?php } else { ?>
									<a class="_blank" title="<?php echo smartyTranslate(array('s'=>'See the document'),$_smarty_tpl);?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'),'html','UTF-8');?>
&amp;submitAction=generateInvoicePDF&amp;id_order_invoice=<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
							   <?php }?>
							<?php } elseif (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderSlip') {?>
								<a class="_blank" title="<?php echo smartyTranslate(array('s'=>'See the document'),$_smarty_tpl);?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'),'html','UTF-8');?>
&amp;submitAction=generateOrderSlipPDF&amp;id_order_slip=<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
							<?php }?>
							<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
								<?php if (isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
									<?php echo $_smarty_tpl->tpl_vars['document']->value->getDeliveryNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>

								<?php } else { ?>
									<?php echo $_smarty_tpl->tpl_vars['document']->value->getInvoiceNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>

								<?php }?>
							<?php } elseif (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderSlip') {?>
								<?php echo $_smarty_tpl->tpl_vars['document']->value->getCreditSlipsNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>

							<?php }?>
							</a>
						</td>
						<td>
						<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
							<?php if (isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
								--
							<?php } else { ?>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['document']->value->total_paid_tax_incl,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
&nbsp;
								<?php if ($_smarty_tpl->tpl_vars['document']->value->getTotalPaid()) {?>
									<span>
									<?php if ($_smarty_tpl->tpl_vars['document']->value->getRestPaid()>0) {?>
										(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['document']->value->getRestPaid(),'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'not paid','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
)
									<?php } elseif ($_smarty_tpl->tpl_vars['document']->value->getRestPaid()<0) {?>
										(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>-$_smarty_tpl->tpl_vars['document']->value->getRestPaid(),'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'overpaid','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
)
									<?php }?>
									</span>
								<?php }?>
							<?php }?>
						<?php } elseif (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderSlip') {?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['document']->value->total_products_tax_incl+$_smarty_tpl->tpl_vars['document']->value->total_shipping_tax_incl,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

						<?php }?>
						</td>
						<td class="text-right document_action">
						<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
							<?php if (!isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>

								<?php if ($_smarty_tpl->tpl_vars['document']->value->getRestPaid()) {?>
									<a href="#formAddPaymentPanel" class="js-set-payment btn btn-default anchor" data-amount="<?php echo $_smarty_tpl->tpl_vars['document']->value->getRestPaid();?>
" data-id-invoice="<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
" title="<?php echo smartyTranslate(array('s'=>'Set payment form'),$_smarty_tpl);?>
">
										<i class="icon-money"></i>
										<?php echo smartyTranslate(array('s'=>'Enter payment','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

									</a>
								<?php }?>

								<a href="#" class="btn btn-default" onclick="$('#invoiceNote<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
').show(); return false;" title="<?php if ($_smarty_tpl->tpl_vars['document']->value->note=='') {?><?php echo smartyTranslate(array('s'=>'Add note'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Edit note'),$_smarty_tpl);?>
<?php }?>">
									<?php if ($_smarty_tpl->tpl_vars['document']->value->note=='') {?>
										<i class="icon-plus-sign-alt"></i>
										<?php echo smartyTranslate(array('s'=>'Add note','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

									<?php } else { ?>
										<i class="icon-pencil"></i>
										<?php echo smartyTranslate(array('s'=>'Edit note','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

									<?php }?>
								</a>

							<?php }?>
						<?php }?>
						</td>
					</tr>
				<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
					<?php if (!isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
					<tr id="invoiceNote<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
" style="display:none">
						<td colspan="5">
							<form action="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;viewOrder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
<?php if (isset($_GET['token'])) {?>&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
<?php }?>" method="post">
								<p>
									<label for="editNote<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
" class="t"><?php echo smartyTranslate(array('s'=>'Note','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
									<input type="hidden" name="id_order_invoice" value="<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
" />
									<textarea name="note" id="editNote<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
" class="edit-note textarea-autosize"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['document']->value->note,'html','UTF-8');?>
</textarea>
								</p>
								<p>
									<button type="submit" name="submitEditNote" class="btn btn-default">
										<i class="icon-save"></i>
										<?php echo smartyTranslate(array('s'=>'Save','d'=>'Admin.Actions'),$_smarty_tpl);?>

									</button>
									<a class="btn btn-default" href="#" id="cancelNote" onclick="$('#invoiceNote<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
').hide();return false;">
										<i class="icon-remove"></i>
										<?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>

									</a>
								</p>
							</form>
						</td>
					</tr>
					<?php }?>
				<?php }?>
			<?php }
if (!$_smarty_tpl->tpl_vars['document']->_loop) {
?>
				<tr>
					<td colspan="5" class="list-empty">
						<div class="list-empty-msg">
							<i class="icon-warning-sign list-empty-icon"></i>
							<?php echo smartyTranslate(array('s'=>'There is no available document','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

						</div>
						<?php if (isset($_smarty_tpl->tpl_vars['invoice_management_active']->value)&&$_smarty_tpl->tpl_vars['invoice_management_active']->value) {?>
							<a class="btn btn-default" href="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;viewOrder&amp;submitGenerateInvoice&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
<?php if (isset($_GET['token'])) {?>&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
<?php }?>">
								<i class="icon-repeat"></i>
								<?php echo smartyTranslate(array('s'=>'Generate invoice','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

							</a>
						<?php }?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php }} ?>
