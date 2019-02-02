<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 11:48:38
         compiled from "/var/www/html/SHN/modules/dgridproducts/views/templates/hook/backoffice_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13070275405c34fe96a29250-04297927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a04cbec94cd5a182906c20d50d68d35fe60787c' => 
    array (
      0 => '/var/www/html/SHN/modules/dgridproducts/views/templates/hook/backoffice_header.tpl',
      1 => 1512598745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13070275405c34fe96a29250-04297927',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'attribute_groups' => 0,
    'attribute_group' => 0,
    'attribute' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34fe96a64420_63635201',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34fe96a64420_63635201')) {function content_5c34fe96a64420_63635201($_smarty_tpl) {?>
<script>
	var ajax_url = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(Context::getContext()->link->getAdminLink('AdminProductGrid'),'quotes','UTF-8');?>
";
</script>
<div class="bootstrap custom_bootstrap">
	<div class="stage_combinations" style="display: none;"></div>
	<div class="form_combinations" style="display: none;">
		<div class="form_create_combination form_cc" style="display: none;">
			<form id="form_create_combination">
				<input type="hidden" name="id_product" value="0"/>
				<input type="hidden" name="product_price" value="0"/>
				<input type="hidden" name="product_rate" value="0"/>
				<div class="row">
					<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'Attribute','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
					<div class="col-md-3">
						<select name="attribute_group">
							<?php if (is_array($_smarty_tpl->tpl_vars['attribute_groups']->value)&&count($_smarty_tpl->tpl_vars['attribute_groups']->value)) {?>
								<?php  $_smarty_tpl->tpl_vars['attribute_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute_group']->key => $_smarty_tpl->tpl_vars['attribute_group']->value) {
$_smarty_tpl->tpl_vars['attribute_group']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['attribute_group']->value['id_attribute_group']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute_group']->value['name'],'quotes','UTF-8');?>
</option>
								<?php } ?>
							<?php }?>
						</select>
					</div>
				</div>
				<?php if (is_array($_smarty_tpl->tpl_vars['attribute_groups']->value)&&count($_smarty_tpl->tpl_vars['attribute_groups']->value)) {?>
					<?php  $_smarty_tpl->tpl_vars['attribute_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute_group']->key => $_smarty_tpl->tpl_vars['attribute_group']->value) {
$_smarty_tpl->tpl_vars['attribute_group']->_loop = true;
?>
						<div class="row" data-group="<?php echo intval($_smarty_tpl->tpl_vars['attribute_group']->value['id_attribute_group']);?>
">
							<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'Value','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
							<div class="col-md-4">
								<select name="attribute">
									<?php if (isset($_smarty_tpl->tpl_vars['attribute_group']->value['attributes'])&&count($_smarty_tpl->tpl_vars['attribute_group']->value['attributes'])) {?>
										<?php  $_smarty_tpl->tpl_vars['attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->key => $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['attribute']->_loop = true;
?>
											<option value="<?php echo intval($_smarty_tpl->tpl_vars['attribute']->value['id_attribute']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute']->value['name'],'quotes','UTF-8');?>
</option>
										<?php } ?>
									<?php }?>
								</select>
							</div>
							<div class="col-md-2">
								<button type="button" class="btn btn-default btn-block add_attr"><i class="icon-plus-sign-alt"></i><?php echo smartyTranslate(array('s'=>'Add','mod'=>'dgridproducts'),$_smarty_tpl);?>
</button>
							</div>
						</div>
					<?php } ?>
				<?php }?>
				<div class="row">
					<div class="col-md-4 col-md-offset-3">
						<select id="product_att_list" name="attribute_combination_list[]" multiple="multiple"></select>
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-default btn-block delete_attr"><i class="icon-minus-sign-alt"></i><?php echo smartyTranslate(array('s'=>'Delete','mod'=>'dgridproducts'),$_smarty_tpl);?>
</button>
					</div>
				</div>
				<hr>
				<div class="row">
					<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'Reference','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
					<div class="col-md-3">
						<input type="text" id="attribute_reference" name="attribute_reference" value="">
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'EAN-13 or JAN barcode','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
					<div class="col-md-2">
						<input maxlength="13" type="text" id="attribute_ean13" name="attribute_ean13" value="">
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'UPC barcode','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
					<div class="col-md-2">
						<input maxlength="12" type="text" id="attribute_upc" name="attribute_upc" value="">
					</div>
				</div>
				<hr>
				<div class="row">
					<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'Wholesale price','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
					<div class="col-md-2">
						<input type="text" name="attribute_wholesale_price" id="attribute_wholesale_price" value="0" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'Impact on price','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
					<div class="col-md-2">
						<select id="attribute_price_impact" name="attribute_price_impact">
							<option value="0"><?php echo smartyTranslate(array('s'=>'None','mod'=>'dgridproducts'),$_smarty_tpl);?>
</option>
							<option value="1"><?php echo smartyTranslate(array('s'=>'Increase','mod'=>'dgridproducts'),$_smarty_tpl);?>
</option>
							<option value="-1"><?php echo smartyTranslate(array('s'=>'Reduce','mod'=>'dgridproducts'),$_smarty_tpl);?>
</option>
						</select>
					</div>
					<div class="col-md-2">
						<div class="col-md-2">
                            <label class="control-label">
							    <?php echo smartyTranslate(array('s'=>'on','mod'=>'dgridproducts'),$_smarty_tpl);?>

                            </label>
						</div>
						<div class="col-md-10">
							<input type="text" name="attribute_price" id="attribute_price" value="0.00" onkeyup="$(this).val(this.value.replace(/,/g, '.')); if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
						</div>
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'Final price','mod'=>'dgridproducts'),$_smarty_tpl);?>
:</label>
					<div class="col-md-4">
						<div class="pa_final_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>0),$_smarty_tpl);?>
</div>
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'Impact on weight','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
					<div class="col-md-2">
						<select id="attribute_weight_impact" name="attribute_weight_impact">
							<option value="0"><?php echo smartyTranslate(array('s'=>'None','mod'=>'dgridproducts'),$_smarty_tpl);?>
</option>
							<option value="1"><?php echo smartyTranslate(array('s'=>'Increase','mod'=>'dgridproducts'),$_smarty_tpl);?>
</option>
							<option value="-1"><?php echo smartyTranslate(array('s'=>'Discount','mod'=>'dgridproducts'),$_smarty_tpl);?>
</option>
						</select>
					</div>
					<div class="col-md-2">
						<div class="col-md-2">
							<label class="control-label">
								<?php echo smartyTranslate(array('s'=>'on','mod'=>'dgridproducts'),$_smarty_tpl);?>

							</label>
						</div>
						<div class="col-md-10">
							<input type="text" name="attribute_weight" id="attribute_weight" value="0.00" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
						</div>
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'Impact on unit price','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
					<div class="col-md-2">
						<select id="attribute_unit_impact" name="attribute_unit_impact">
							<option value="0"><?php echo smartyTranslate(array('s'=>'None','mod'=>'dgridproducts'),$_smarty_tpl);?>
</option>
							<option value="1"><?php echo smartyTranslate(array('s'=>'Increase','mod'=>'dgridproducts'),$_smarty_tpl);?>
</option>
							<option value="-1"><?php echo smartyTranslate(array('s'=>'Reduction','mod'=>'dgridproducts'),$_smarty_tpl);?>
</option>
						</select>
					</div>
					<div class="col-md-2">
						<div class="col-md-2">
							<label class="control-label">
								<?php echo smartyTranslate(array('s'=>'on','mod'=>'dgridproducts'),$_smarty_tpl);?>

							</label>
						</div>
						<div class="col-md-10">
							<input type="text" name="attribute_unity" id="attribute_unity" value="0.00" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
						</div>
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'Minimal quantity','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
					<div class="col-md-2">
						<input maxlength="6" name="attribute_minimal_quantity" id="attribute_minimal_quantity" type="text" value="1">
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'Available(date)','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
					<div class="col-md-2">
						<input class="datepicker" id="available_date_attribute" name="available_date_attribute" value="0000-00-00" type="text">
					</div>
				</div>
				<hr>
				<label class="control-label col-md-3"><?php echo smartyTranslate(array('s'=>'Images','mod'=>'dgridproducts'),$_smarty_tpl);?>
</label>
				<div class="row product_images"></div>
				<div class="row">
					<div class="col-md-12">
                        <button class="btn btn-danger cancelCreateCombination" type="reset"><i class="icon-remove"></i><?php echo smartyTranslate(array('s'=>'Cancel','mod'=>'dgridproducts'),$_smarty_tpl);?>
</button>
                        <button class="btn btn-success createCombination" type="button"><i class="icon-save"></i><?php echo smartyTranslate(array('s'=>'Save','mod'=>'dgridproducts'),$_smarty_tpl);?>
</button>
					</div>
				</div>
			</form>
		</div>
		<div class="add_combinations col-lg-12" style="text-align: right; margin-bottom: 10px;">
			<a class="button btn btn-success add_combination" href="#">
				<i class="icon-plus"></i>
				<?php echo smartyTranslate(array('s'=>'Add combination','mod'=>'dgridproducts'),$_smarty_tpl);?>

			</a>
		</div>
		<div class="ajax_form_edit_attributes form_cc"></div>
		<div class="content_form"></div>
		<div class="add_combinations" style="text-align: right; margin-bottom: 10px;">
			<button class="button btn btn-default close_form_combinations" href="#"><i class="process-icon-cancel"></i><?php echo smartyTranslate(array('s'=>'Close','mod'=>'dgridproducts'),$_smarty_tpl);?>
</button>
		</div>
	</div>

	<div class="stage_images" style="display: none;"></div>
	<div class="form_images" style="display: none;">
		<div style="text-align: right; margin-bottom: 10px;">
			<a class="button btn btn-success add_image" href="#">
				<input class="add_image_input" multiple name="add_image_input" type="file"/>
				<i class="icon-plus"></i>
				<?php echo smartyTranslate(array('s'=>'Add image','mod'=>'dgridproducts'),$_smarty_tpl);?>

			</a>
			<a class="button btn btn-default close_form_images" href="#"><?php echo smartyTranslate(array('s'=>'Close','mod'=>'dgridproducts'),$_smarty_tpl);?>
</a>
		</div>
		<div class="content_form">

		</div>
	</div>

	<div class="stage_features" style="display: none;"></div>
	<div class="form_features" style="display: none;">
		<div class="content_form">

		</div>
	</div>

	<div class="stage_seo" style="display: none;"></div>
	<div class="form_seo" style="display: none;">
		<div class="content_form"></div>
	</div>


	<div class="box_categories" style="display: none">
		<div class="box_categories_stage"></div>
		<div class="box_categories_form content_form">
		</div>
	</div>

	<div class="stage_popup_form" style="display: none"></div>
	<div class="form_popup" style="display: none"></div>
</div>
<script>
	var not_available_type = "<?php echo smartyTranslate(array('s'=>'This is type file not available. Use file type JPG','mod'=>'dgridproducts','js'=>true),$_smarty_tpl);?>
";
	var exists_attr  = "<?php echo smartyTranslate(array('s'=>'Can add one attribute from one group!','mod'=>'dgridproducts','js'=>true),$_smarty_tpl);?>
";
	var combination_create_success  = "<?php echo smartyTranslate(array('s'=>'Combination created successfully!','mod'=>'dgridproducts','js'=>true),$_smarty_tpl);?>
";
	$('.form_create_combination .datepicker').datepicker({
		dateFormat: 'yy-mm-dd'
	});
</script><?php }} ?>
