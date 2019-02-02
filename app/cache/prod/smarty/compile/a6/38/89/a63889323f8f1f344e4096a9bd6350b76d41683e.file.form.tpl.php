<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:55
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18561985265c338f279edc71-14763398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a63889323f8f1f344e4096a9bd6350b76d41683e' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/form.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18561985265c338f279edc71-14763398',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'upload_file_dir' => 0,
    'upload_image_dir' => 0,
    'features' => 0,
    'templates_products' => 0,
    'template' => 0,
    'categories' => 0,
    'input_product_name_type_search' => 0,
    'manufacturers' => 0,
    'manufacturer' => 0,
    'suppliers' => 0,
    'supplier' => 0,
    'value' => 0,
    'feature' => 0,
    'link_on_tab_module' => 0,
    'advanced_stock_management' => 0,
    'tax_exclude_taxe_option' => 0,
    'tax_rules_groups' => 0,
    'tax_rules_group' => 0,
    'warehouses' => 0,
    'warehouse' => 0,
    'languages' => 0,
    'language' => 0,
    'pack_stock_type' => 0,
    'token_preferences' => 0,
    'currencies' => 0,
    'currency' => 0,
    'id_default_currency' => 0,
    'countries' => 0,
    'country' => 0,
    'groups' => 0,
    'group' => 0,
    'feature_tab_html' => 0,
    'link' => 0,
    'total_features' => 0,
    'count_feature_view' => 0,
    'allowEmployeeFormLang' => 0,
    'default_form_language' => 0,
    'carriers' => 0,
    'carrier' => 0,
    'input_class' => 0,
    'variables' => 0,
    'static_for_name' => 0,
    'variables_for_name' => 0,
    'attribute_groups' => 0,
    'attribute_group' => 0,
    'attribute' => 0,
    'attachments' => 0,
    'attachment' => 0,
    'product' => 0,
    'form_create_products' => 0,
    'currency2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f27b10d06_05164479',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f27b10d06_05164479')) {function content_5c338f27b10d06_05164479($_smarty_tpl) {?>
<script>
    var upload_file_dir = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['upload_file_dir']->value,'quotes','UTF-8');?>
";
    var upload_image_dir = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['upload_image_dir']->value,'quotes','UTF-8');?>
";
    var text_already_exists_attribute = "<?php echo smartyTranslate(array('s'=>'Attribute already exists!','mod'=>'masseditproduct'),$_smarty_tpl);?>
";
    var text_filename_empty = "<?php echo smartyTranslate(array('s'=>'Filename required field!','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
";
    var text_template_name_empty = "<?php echo smartyTranslate(array('s'=>'Template name empty!','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
";
    var text_not_products = "<?php echo smartyTranslate(array('s'=>'Not products!','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
";
    var features = <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['features']->value);?>
;
</script>


<div class="<?php if (@constant('_PS_VERSION_')<1.6) {?>custom_responsive<?php }?>">
	<div class="popup_mep">
		<div class="popup_info_row">
			<span class="popup_info">
				<?php echo smartyTranslate(array('s'=>'Count products:','mod'=>'masseditproduct'),$_smarty_tpl);?>

				<span class="count_products">0</span>
			</span>
			<button class="toggleList active" type="button">
				<i class="icon-list"></i>
			</button>
			<button class="clearAll" type="button">
                <?php echo smartyTranslate(array('s'=>'Clear all','mod'=>'masseditproduct'),$_smarty_tpl);?>

			</button>
		</div>
		<div class="popup_info_template">
			<div><?php echo smartyTranslate(array('s'=>'Select template','mod'=>'masseditproduct'),$_smarty_tpl);?>
</div>
			<div class="row">
				<div class="col-lg-8">
					<select name="template_products">
						<option value="">-----</option>
                        <?php  $_smarty_tpl->tpl_vars['template'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['template']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['templates_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['template']->key => $_smarty_tpl->tpl_vars['template']->value) {
$_smarty_tpl->tpl_vars['template']->_loop = true;
?>
							<option value="<?php echo intval($_smarty_tpl->tpl_vars['template']->value['id']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['template']->value['name'],'quotes','UTF-8');?>
</option>
                        <?php } ?>
					</select>
				</div>
				<div class="col-lg-4">
					<button class="btn btn-default selectTemplateProduct">
						<i class="icon-paste"></i>
					</button>
					<button class="btn btn-danger deleteTemplateProduct">
						<i class="icon-remove"></i>
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-7">
					<input type="text" name="template_product">
				</div>
				<div class="col-lg-5">
					<button type="button" class="btn btn-success saveTemplateProduct"><?php echo smartyTranslate(array('s'=>'Save list products','mod'=>'masseditproduct'),$_smarty_tpl);?>
</button>
				</div>
			</div>
		</div>
		<div class="list_products"></div>
		<div>
			<div class="btn-group btn-group-radio">
				<label for="mode_search">
					<input type="radio" checked name="mode" value="mode_search" id="mode_search"/>
					<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Select products','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
				</label>
				<label for="mode_edit">
					<input type="radio" name="mode" value="mode_edit" id="mode_edit"/>
					<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Begin edit','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
				</label>
			</div>
		</div>
	</div>
	<div class="wrapp_content custom_bootstrap">
		<div class="panel mode_search">
			<h3 class="panel-heading panel-heading-top"><?php echo smartyTranslate(array('s'=>'Search products','mod'=>'masseditproduct'),$_smarty_tpl);?>

			</h3>
			<div class="row">
				<div class="col-lg-6 tree_custom">
					<div class="row">
						<label class="control-label col-lg-12">
                            <?php echo smartyTranslate(array('s'=>'Select category by search','mod'=>'masseditproduct'),$_smarty_tpl);?>

						</label>
                        <?php echo $_smarty_tpl->getSubTemplate ("./tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'id_category'=>Configuration::get('PS_ROOT_CATEGORY'),'root'=>true,'view_header'=>true,'multiple'=>true,'selected_categories'=>array(),'name'=>'categories','search_view'=>true), 0);?>

					</div>
				</div>
				<div class="col-lg-6 search-products">
					<div class="row">
						<label class="control-label col-lg-3 search-prod">
                            <?php echo smartyTranslate(array('s'=>'Search product','mod'=>'masseditproduct'),$_smarty_tpl);?>

						</label>
						<div class="row search_product_name">
							<div class="col-lg-9">
                                <?php echo $_smarty_tpl->getSubTemplate ("./btn_radio.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('input'=>$_smarty_tpl->tpl_vars['input_product_name_type_search']->value), 0);?>

							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group form-group-lg">
								<div class="col-sm-9">
									<input name="search_query" class="form-control" type="text"/>
								</div>
								<div class="col-sm-3">
									<select class="form-control" name="type_search">
										<option value="0"><?php echo smartyTranslate(array('s'=>'Name','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="1"><?php echo smartyTranslate(array('s'=>'Id product','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="2"><?php echo smartyTranslate(array('s'=>'Reference','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="3"><?php echo smartyTranslate(array('s'=>'EAN-13','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="4"><?php echo smartyTranslate(array('s'=>'UPC','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="5"><?php echo smartyTranslate(array('s'=>'Description','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="6"><?php echo smartyTranslate(array('s'=>'Description short','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<label class="control-label col-lg-12">
                            <?php echo smartyTranslate(array('s'=>'Search by manufacturer','mod'=>'masseditproduct'),$_smarty_tpl);?>

						</label>
						<div class="col-lg-12">
							<select id="manufacturer" class="form-control" multiple name="manufacturer[]">
                                <?php  $_smarty_tpl->tpl_vars['manufacturer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manufacturer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['manufacturers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->key => $_smarty_tpl->tpl_vars['manufacturer']->value) {
$_smarty_tpl->tpl_vars['manufacturer']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['manufacturer']->value['name'],'quotes','UTF-8');?>
</option>
                                <?php } ?>
							</select>
							<script>
                                $(document).ready(function() {
                                    $('#manufacturer').select2();
                                });
							</script>
						</div>
					</div>
					<div class="row">
						<label class="control-label col-lg-12">
                            <?php echo smartyTranslate(array('s'=>'Search by supplier','mod'=>'masseditproduct'),$_smarty_tpl);?>

						</label>
						<div class="col-lg-12">
							<select id="supplier" class="form-control" multiple name="supplier[]">
                                <?php  $_smarty_tpl->tpl_vars['supplier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['supplier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['suppliers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['supplier']->key => $_smarty_tpl->tpl_vars['supplier']->value) {
$_smarty_tpl->tpl_vars['supplier']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['supplier']->value['id_supplier']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['supplier']->value['name'],'quotes','UTF-8');?>
</option>
                                <?php } ?>
							</select>
							<script>
                                $(document).ready(function() {
                                    $('#supplier').select2();
                                });
							</script>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<label class="control-label col-lg-12">
                                <?php echo smartyTranslate(array('s'=>'Only active products','mod'=>'masseditproduct'),$_smarty_tpl);?>

							</label>
							<div class="col-lg-12">
                                <?php if (@constant('_PS_VERSION_')<1.6) {?>
									<label class="t"><img src="../img/admin/enabled.gif"></label>
									<input name="active" value="1" type="radio"/>
									<label class="t"><img src="../img/admin/disabled.gif"></label>
									<input checked name="active" value="0" type="radio"/>
                                <?php } else { ?>
									<div class="input-group col-lg-4">
								<span class="switch prestashop-switch">
									<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = array(1,0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
										<input
												type="radio"
												name="active"
                                                <?php if ($_smarty_tpl->tpl_vars['value']->value==1) {?>
													id="active_on"
                                                <?php } else { ?>
													id="active_off"
                                                <?php }?>
												value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value,'quotes','UTF-8');?>
"
                                                <?php if (0==$_smarty_tpl->tpl_vars['value']->value) {?>checked="checked"<?php }?>
										/>
										<label
                                                <?php if ($_smarty_tpl->tpl_vars['value']->value==1) {?>
													for="active_on"
                                                <?php } else { ?>
													for="active_off"
                                                <?php }?>
										>
											<?php if ($_smarty_tpl->tpl_vars['value']->value==1) {?>
                                                <?php echo smartyTranslate(array('s'=>'Yes','mod'=>'masseditproduct'),$_smarty_tpl);?>

                                            <?php } else { ?>
                                                <?php echo smartyTranslate(array('s'=>'No','mod'=>'masseditproduct'),$_smarty_tpl);?>

                                            <?php }?>
										</label>
                                    <?php } ?>
									<a class="slide-button btn"></a>
								</span>
									</div>
                                <?php }?>
							</div>
						</div>
						<div class="col-lg-6">
							<label class="control-label col-lg-12">
                                <?php echo smartyTranslate(array('s'=>'Only disabled products','mod'=>'masseditproduct'),$_smarty_tpl);?>

							</label>
							<div class="col-lg-12">
                                <?php if (@constant('_PS_VERSION_')<1.6) {?>
									<label class="t"><img src="../img/admin/enabled.gif"></label>
									<input name="disable" value="1" type="radio"/>
									<label class="t"><img src="../img/admin/disabled.gif"></label>
									<input checked name="disable" value="0" type="radio"/>
                                <?php } else { ?>
									<div class="input-group col-lg-4">
								<span class="switch prestashop-switch">
									<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = array(1,0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
										<input
												type="radio"
												name="disable"
                                                <?php if ($_smarty_tpl->tpl_vars['value']->value==1) {?>
													id="disable_on"
                                                <?php } else { ?>
													id="disable_off"
                                                <?php }?>
												value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value,'quotes','UTF-8');?>
"
                                                <?php if (0==$_smarty_tpl->tpl_vars['value']->value) {?>checked="checked"<?php }?>
										/>
										<label
                                                <?php if ($_smarty_tpl->tpl_vars['value']->value==1) {?>
													for="disable_on"
                                                <?php } else { ?>
													for="disable_off"
                                                <?php }?>
										>
											<?php if ($_smarty_tpl->tpl_vars['value']->value==1) {?>
                                                <?php echo smartyTranslate(array('s'=>'Yes','mod'=>'masseditproduct'),$_smarty_tpl);?>

                                            <?php } else { ?>
                                                <?php echo smartyTranslate(array('s'=>'No','mod'=>'masseditproduct'),$_smarty_tpl);?>

                                            <?php }?>
										</label>
                                    <?php } ?>
									<a class="slide-button btn"></a>
								</span>
									</div>
                                <?php }?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<label class="control-label col-lg-12">
								<?php echo smartyTranslate(array('s'=>'Search by quantity?','mod'=>'masseditproduct'),$_smarty_tpl);?>

							</label>

							<div class="search-quantity col-lg-5">
								<label class="control-label">
									<?php echo smartyTranslate(array('s'=>'From','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
								<input type="text" name="qty_from"">
							</div>

							<div class="search-quantity col-lg-5">
								<label class="control-label">
									<?php echo smartyTranslate(array('s'=>'To','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
								<input type="text" name="qty_to">
							</div>
						</div>
						<div class="col-lg-6">
							<label class="control-label col-lg-12">
                                <?php echo smartyTranslate(array('s'=>'Search by price?','mod'=>'masseditproduct'),$_smarty_tpl);?>

							</label>

							<div class="search-quantity col-lg-5">
								<label class="control-label">
                                    <?php echo smartyTranslate(array('s'=>'From','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
								<input type="text" name="price_from">
							</div>

							<div class="search-quantity col-lg-5">
								<label class="control-label">
                                    <?php echo smartyTranslate(array('s'=>'To','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
								<input type="text" name="price_to">
							</div>
						</div>
					</div>
					<div class="row">
						<label class="control-label col-lg-12">
                            <?php echo smartyTranslate(array('s'=>'How many to show products?','mod'=>'masseditproduct'),$_smarty_tpl);?>

						</label>
						<div class="col-lg-12">
							<select class="form-control" name="how_many_show">
								<option selected value="20">20</option>
								<option value="50">50</option>
								<option value="100">100</option>
								<option value="300">300</option>
								<option value="500">500</option>
								<option value="1000">1000</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group clearfix">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Select feature','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<select name="feature_group">
                                        <?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['feature']->value['id_feature'],'quotes','UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['feature']->value['name'],'quotes','UTF-8');?>
 (<?php echo intval(count($_smarty_tpl->tpl_vars['feature']->value['values']));?>
)</option>
                                        <?php } ?>
									</select>
								</div>
							</div>
                            <?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
								<div data-feature-values="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['feature']->value['id_feature'],'quotes','UTF-8');?>
" style="display: none" class="form-group clearfix"></div>
                            <?php } ?>
						</div>
					</div>
				</div>
				<div class="col-lg-12 control_btn">
					<button id="beginSearch" class="btn btn-default">
                        <?php echo smartyTranslate(array('s'=>'Search product','mod'=>'masseditproduct'),$_smarty_tpl);?>

					</button>
				</div>
			</div>
		</div>
		<div class="panel mode_search">
			<h3 class="panel-heading"><?php echo smartyTranslate(array('s'=>'Result search product','mod'=>'masseditproduct'),$_smarty_tpl);?>
</h3>
			<div class="row table_search_product">
				<div class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'Need begin search','mod'=>'masseditproduct'),$_smarty_tpl);?>
</div>
			</div>
			<div class="row_select_all">
				<button class="btn btn-default selectAll">
                    <?php echo smartyTranslate(array('s'=>'Select all','mod'=>'masseditproduct'),$_smarty_tpl);?>

				</button>
			</div>
		</div>
		<div class="panel mode_edit panel-container">
			<div class="message_successfully success alert alert-success" style="display: none;">
                <?php echo smartyTranslate(array('s'=>'Update successfully!','mod'=>'masseditproduct'),$_smarty_tpl);?>

			</div>
			<div class="message_error error alert alert-danger" style="display: none;">
			</div>
			<div class="panel">
				<div class="panel-heading">
					<button class="change_date_button">
						<i class="icon-plus"></i>
					</button>
					<span><?php echo smartyTranslate(array('s'=>'Global settings','mod'=>'masseditproduct'),$_smarty_tpl);?>

				</span> /
					<a class="masseditdoc" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link_on_tab_module']->value,'quotes','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Documentation','mod'=>'masseditproduct'),$_smarty_tpl);?>
</a>
					<a class="float-right" id="seosa_manager_btn" href="#"><?php echo smartyTranslate(array('s'=>'Our modules','mod'=>'masseditproduct'),$_smarty_tpl);?>
</a>
				</div>
				<div class="form-group change_date_container clearfix">
					<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Change date update in product after apply changes?','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
					<div class="col-lg-12">
						<div class="btn-group btn-group-radio">
							<label for="change_date_upd_yes">
								<input type="radio" name="change_date_upd" value="1" id="change_date_upd_yes">
								<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Yes','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
							</label>
							<label for="change_date_upd_no">
								<input type="radio" checked="" name="change_date_upd" value="0" id="change_date_upd_no">
								<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'No','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
							</label>
						</div>
					</div>
				</div>
				<div class="form-group change_date_container clearfix">
					<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Reindex products after change?','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
					<div class="col-lg-12">
						<div class="btn-group btn-group-radio">
							<label for="reindex_products_yes">
								<input type="radio" checked name="reindex_products" value="1" id="reindex_products_yes">
								<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Yes','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
							</label>
							<label for="reindex_products_no">
								<input type="radio" name="reindex_products" value="0" id="reindex_products_no">
								<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'No','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
							</label>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="tab_container">
				<div class="col-md-2">
					<button class="tab-menu"><?php echo smartyTranslate(array('s'=>'Menu','mod'=>'masseditproduct'),$_smarty_tpl);?>
<i class="icon-chevron-down"></i></button>
					<ul class="tabs clearfix">
						<li data-tab="tab1"><?php echo smartyTranslate(array('s'=>'Category','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab2"><?php echo smartyTranslate(array('s'=>'Price','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab3"><?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab4"><?php echo smartyTranslate(array('s'=>'Active','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab5"><?php echo smartyTranslate(array('s'=>'Manufacturer','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab6"><?php echo smartyTranslate(array('s'=>'Accessories','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab7"><?php echo smartyTranslate(array('s'=>'Supplier','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab8"><?php echo smartyTranslate(array('s'=>'Discount','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab9"><?php echo smartyTranslate(array('s'=>'Features','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab10"><?php echo smartyTranslate(array('s'=>'Delivery','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab11"><?php echo smartyTranslate(array('s'=>'Image','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab12"><?php echo smartyTranslate(array('s'=>'Description','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab13"><?php echo smartyTranslate(array('s'=>'Combinations','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab14"><?php echo smartyTranslate(array('s'=>'Attachments','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
                        <?php if ($_smarty_tpl->tpl_vars['advanced_stock_management']->value) {?>
							<li data-tab="tab15"><?php echo smartyTranslate(array('s'=>'Stock management','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
                        <?php }?>
						<li data-tab="tab16"><?php echo smartyTranslate(array('s'=>'Meta','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab17"><?php echo smartyTranslate(array('s'=>'Reference','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab18" data-action="create_products"><?php echo smartyTranslate(array('s'=>'Create products','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
						<li data-tab="tab19"><?php echo smartyTranslate(array('s'=>'Customization fields','mod'=>'masseditproduct'),$_smarty_tpl);?>
</li>
					</ul>
				</div>
				<div class="col-md-10">
					<div class="tabs_content clearfix ">
						<h3 id="title_edit_tabs" class="panel-heading"><?php echo smartyTranslate(array('s'=>'Begin work with selected products','mod'=>'masseditproduct'),$_smarty_tpl);?>
</h3>
						<h3 id="title_create_tabs" class="panel-heading"><?php echo smartyTranslate(array('s'=>'Begin create products','mod'=>'masseditproduct'),$_smarty_tpl);?>
</h3>
						<div id="tab1">
							<div class="row">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Action with categories','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-8">
									<div class="btn-group btn-group-radio">
										<label for="action_with_category_add">
											<input type="radio" checked name="action_with_category" value="0" id="action_with_category_add"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Add selected','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
										<label for="action_with_category_delete">
											<input type="radio" name="action_with_category" value="1" id="action_with_category_delete"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Delete selected','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="control-label col-lg-12">
                                    <?php echo smartyTranslate(array('s'=>'Set categories for all products','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
								<div class="col-lg-12 tree_custom_categories">
                                    <?php echo $_smarty_tpl->getSubTemplate ("./tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'id_category'=>Configuration::get('PS_ROOT_CATEGORY'),'root'=>true,'view_header'=>true,'multiple'=>true,'selected_categories'=>array(),'name'=>'category[]'), 0);?>

                                    
                                    
                                    
                                    
                                    
								</div>
							</div>
							<div class="row _action _action_add">
								<label class="control-label col-lg-12">
                                    <?php echo smartyTranslate(array('s'=>'Set default category for all products','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
								<div class="col-lg-6">
									<select name="category_default"></select>
								</div>
							</div>
							<div class="row _action _action_add">
								<div class="col-lg-12">
									<input type="checkbox" name="remove_old_categories">
                                    <?php echo smartyTranslate(array('s'=>'Remove old categories','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setCategoryAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab2">
							<div class="row disabled_option_stage">
								<input checked type="checkbox" name="disabled[]" value="price" class="disable_option">
								<div class="col-lg-12">
									<div class="row">
										<label class="control-label col-lg-12 apply_change"><?php echo smartyTranslate(array('s'=>'Apply change for','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="change_for_product">
													<input type="radio" checked name="change_for" value="0" id="change_for_product"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
												<label for="change_for_combination">
													<input type="radio" name="change_for" value="1" id="change_for_combination"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Combination','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<script>
                                            var change_product = {
                                                'title':'<?php echo smartyTranslate(array('s'=>'Apply change for price','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
',
                                                'base': '<?php echo smartyTranslate(array('s'=>'Base','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
',
                                                'final': '<?php echo smartyTranslate(array('s'=>'Final','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
'
                                                };
                                            var change_combination = {
                                                'title':'<?php echo smartyTranslate(array('s'=>'Apply change for impact on price','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
',
                                                'base': '<?php echo smartyTranslate(array('s'=>'tax excl.','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
',
                                                'final': '<?php echo smartyTranslate(array('s'=>'tax incl.','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
'
                                                };
										</script>
										<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Apply change for price','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="type_price_base">
													<input type="radio" checked name="type_price" value="0" id="type_price_base"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Base','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
												<label for="type_price_final">
													<input type="radio" name="type_price" value="1" id="type_price_final"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Final','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
												<label for="type_price_wholesale">
													<input type="radio" name="type_price" value="2" id="type_price_wholesale"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Wholesale','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'What to do with price?','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="action_price_increase_percent">
													<input type="radio" checked name="action_price" value="1" id="action_price_increase_percent"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Increase on %','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
												<label for="action_price_increase">
													<input type="radio" name="action_price" value="2" id="action_price_increase"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Increase on value','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
												<label for="action_price_reduce_percent">
													<input type="radio" name="action_price" value="3" id="action_price_reduce_percent"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Reduce on %','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
												<label for="action_price_reduce">
													<input type="radio" name="action_price" value="4" id="action_price_reduce"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Reduce on value','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
												<label for="action_price_rewrite">
													<input type="radio" name="action_price" value="5" id="action_price_rewrite"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Rewrite','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Write value','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<div class="col-lg-4">
											<input type="text" name="price_value"/>
										</div>
									</div>
								</div>
							</div>
							<div class="row disabled_option_stage">
								<div class="col-lg-12">
									<input checked type="checkbox" name="disabled[]" value="tax_rule_group"
										   class="disable_option">
									<label class="control-label col-lg-12 tax_rule"><?php echo smartyTranslate(array('s'=>'Tax rule group','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
									<div class="col-lg-6">
										<select name="id_tax_rules_group"
                                                <?php if ($_smarty_tpl->tpl_vars['tax_exclude_taxe_option']->value) {?>disabled="disabled"<?php }?> >
											<option value="0"><?php echo smartyTranslate(array('s'=>'No Tax','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
                                            <?php  $_smarty_tpl->tpl_vars['tax_rules_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tax_rules_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tax_rules_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tax_rules_group']->key => $_smarty_tpl->tpl_vars['tax_rules_group']->value) {
$_smarty_tpl->tpl_vars['tax_rules_group']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tax_rules_group']->value['id_tax_rules_group'],'quotes','UTF-8');?>
">
                                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(smarty_modifier_htmlentitiesUTF8($_smarty_tpl->tpl_vars['tax_rules_group']->value['name']),'quotes','UTF-8');?>

												</option>
                                            <?php } ?>
										</select>
										<br />
										<input type="checkbox" name="not_change_final_price">
										<?php echo smartyTranslate(array('s'=>'Not to change the final price','mod'=>'masseditproduct'),$_smarty_tpl);?>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setPriceAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab3">
                            <?php if ($_smarty_tpl->tpl_vars['advanced_stock_management']->value) {?>
								<div class="row">
									<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Management quantity in','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
									<div class="col-lg-12">
										<div class="btn-group btn-group-radio">
											<label for="change_type_quantity">
												<input type="radio" name="change_type" value="quantity" id="change_type_quantity"/>
												<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Shop','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
											</label>
											<label for="change_type_warehouse">
												<input type="radio" name="change_type" value="warehouse" id="change_type_warehouse"/>
												<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Warehouse','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="alert alert-info">
                                            <?php echo smartyTranslate(array('s'=>'If some of your products not uses advanced stock management, then these products will be skipped when changing the amount, If updated with the option Warehouses.','mod'=>'masseditproduct'),$_smarty_tpl);?>

										</div>
									</div>
								</div>
                            <?php }?>
							<div class="row <?php if ($_smarty_tpl->tpl_vars['advanced_stock_management']->value) {?>_type type_quantity type_warehouse<?php }?>">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Apply change for','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="change_for_qty_product">
											<input type="radio" checked name="change_for_qty" value="0" id="change_for_qty_product"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
										<label for="change_for_qty_combination">
											<input type="radio" name="change_for_qty" value="1" id="change_for_qty_combination"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Combination','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
									</div>
								</div>
							</div>
							<div class="row <?php if ($_smarty_tpl->tpl_vars['advanced_stock_management']->value) {?>_type type_quantity<?php }?>">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'What to do with quantity?','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="action_quantity_increase">
											<input type="radio" name="action_quantity" value="1" id="action_quantity_increase"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Increase on value','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
										<label for="action_quantity_reduce">
											<input type="radio" name="action_quantity" value="2" id="action_quantity_reduce"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Reduce on value','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
										<label for="action_quantity_rewrite">
											<input checked type="radio" name="action_quantity" value="3" id="action_quantity_rewrite"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Rewrite','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
									</div>
								</div>
							</div>
                            <?php if ($_smarty_tpl->tpl_vars['advanced_stock_management']->value) {?>
								<div class="row _type type_warehouse">
									<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Select warehouse','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
									<div class="col-lg-12">
										<select name="warehouse">
                                            <?php  $_smarty_tpl->tpl_vars['warehouse'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['warehouse']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['warehouses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['warehouse']->key => $_smarty_tpl->tpl_vars['warehouse']->value) {
$_smarty_tpl->tpl_vars['warehouse']->_loop = true;
?>
												<option value="<?php echo intval($_smarty_tpl->tpl_vars['warehouse']->value['id_warehouse']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['warehouse']->value['name'],'quotes','UTF-8');?>
</option>
                                            <?php } ?>
										</select>
									</div>
								</div>
								<div class="row _type type_warehouse">
									<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Action on stock','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
									<div class="co-lg-12">
										<select name="action_warehouse">
											<option value="1"><?php echo smartyTranslate(array('s'=>'Increase in stock','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
											<option value="0"><?php echo smartyTranslate(array('s'=>'Decrease in stock','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										</select>
									</div>
								</div>
                            <?php }?>
							<div class="row <?php if ($_smarty_tpl->tpl_vars['advanced_stock_management']->value) {?>_type type_quantity type_warehouse<?php }?>">
								<input checked type="checkbox" name="disabled[]" value="quantity" class="disable_option">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Write quantity','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-4">
									<input type="text" name="quantity" value="0"/>
									<br />
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="minimal_quantity" class="disable_option">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Minimum quantity','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-4">
									<input type="text" name="minimal_quantity" value="0"/>
									<p class="help-block"><?php echo smartyTranslate(array('s'=>'The minimum quantity to buy this product (set to 1 to disable this feature)','mod'=>'masseditproduct'),$_smarty_tpl);?>
</p>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="available_now" class="disable_option">
								<label class="control-label col-lg-4 select-lang"><?php echo smartyTranslate(array('s'=>'Select language','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-8">
									<div class="btn-group btn-group-radio">
										<label for="all_language_qty">
											<input type="radio" checked name="language_qty" value="0" id="all_language_qty"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'For all','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
                                        <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
											<label for="<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
_language_qty">
												<input type="radio" name="language_qty" value="<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" id="<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
_language_qty"/>
												<span class="btn btn-default"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['language']->value['name'],'quotes','UTF-8');?>
</span>
											</label>
                                        <?php } ?>
									</div>
								</div>
								<label class="control-label col-lg-12 desc-label"><?php echo smartyTranslate(array('s'=>'Displayed text when in-stock','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<input type="text" name="available_now"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="available_later" class="disable_option">
								<label class="control-label col-lg-12 desc-label"><?php echo smartyTranslate(array('s'=>'Displayed text when backordering is allowed','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<input type="text" name="available_later"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="available_date" class="disable_option">
								<label class="control-label col-lg-12 desc-label"><?php echo smartyTranslate(array('s'=>'Availability date','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-4">
									<div class="btn-group btn-group-radio">
										<label for="ad_for_product">
											<input type="radio" checked name="change_available_date" value="0" id="ad_for_product"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'For product','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
										<label for="ad_for_pa">
											<input type="radio" checked name="change_available_date" value="1" id="ad_for_pa"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'For combinations','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
									</div>
								</div>
								<div class="col-lg-2">
									<input type="text" class="datepicker" name="available_date"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="out_of_stock" class="disable_option">
								<div id="when_out_of_stock" class="form-group">
									<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'When out of stock','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
									<div class="col-lg-9">
										<p class="radio">
											<label id="label_out_of_stock_1" for="out_of_stock_1">
												<input type="radio" id="out_of_stock_1" name="out_of_stock" checked="checked" value="0" class="out_of_stock">
                                                <?php echo smartyTranslate(array('s'=>'Deny orders','mod'=>'masseditproduct'),$_smarty_tpl);?>

											</label>
										</p>
										<p class="radio">
											<label id="label_out_of_stock_2" for="out_of_stock_2">
												<input type="radio" id="out_of_stock_2" name="out_of_stock" value="1" class="out_of_stock">
                                                <?php echo smartyTranslate(array('s'=>'Allow orders','mod'=>'masseditproduct'),$_smarty_tpl);?>

											</label>
										</p>
										<p class="radio">
											<label id="label_out_of_stock_3" for="out_of_stock_3">
												<input type="radio" id="out_of_stock_3" name="out_of_stock" value="2" class="out_of_stock">
                                                <?php echo smartyTranslate(array('s'=>'Default','mod'=>'masseditproduct'),$_smarty_tpl);?>
:
                                                <?php if ($_smarty_tpl->tpl_vars['pack_stock_type']->value==0) {?>
                                                    <?php echo smartyTranslate(array('s'=>'Decrement pack only.','mod'=>'masseditproduct'),$_smarty_tpl);?>

                                                <?php } elseif ($_smarty_tpl->tpl_vars['pack_stock_type']->value==1) {?>
                                                    <?php echo smartyTranslate(array('s'=>'Decrement products in pack only.','mod'=>'masseditproduct'),$_smarty_tpl);?>

                                                <?php } else { ?>
                                                    <?php echo smartyTranslate(array('s'=>'Decrement both.','mod'=>'masseditproduct'),$_smarty_tpl);?>

                                                <?php }?>
												<a class="confirm_leave" href="index.php?tab=AdminPPreferences&token=&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['not_filtered'][0][0]->notFiltered($_smarty_tpl->tpl_vars['token_preferences']->value);?>
">
                                                    <?php echo smartyTranslate(array('s'=>'as set in the Products Preferences page','mod'=>'masseditproduct'),$_smarty_tpl);?>

												</a>
											</label>
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setQuantityAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab4">
							<div class="row">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Set active for all products','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="is_active_disable">
											<input type="radio" checked name="is_active" value="-1" id="is_active_disable"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Do nothing','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
										<label for="is_active_on">
											<input type="radio" name="is_active" value="1" id="is_active_on"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Yes','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
										<label for="is_active_off">
											<input type="radio" name="is_active" value="0" id="is_active_off"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'No','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<input checked="" type="checkbox" name="disabled[]" value="on_sale" class="disable_option">
								<label class="control-label col-xs-10">
									<input type="checkbox" name="on_sale" class="tab4-checkbox" value="1"/>
                                    <?php echo smartyTranslate(array('s'=>'Display the "on sale" icon on the product page, and in the text found within the product listing','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
							</div>
							<div class="row">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Visibility','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<select name="visibility">
										<option selected value="-1"><?php echo smartyTranslate(array('s'=>'Do nothing','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="both"><?php echo smartyTranslate(array('s'=>'Both','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="catalog"><?php echo smartyTranslate(array('s'=>'Only catalog','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="search"><?php echo smartyTranslate(array('s'=>'Only search','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="none"><?php echo smartyTranslate(array('s'=>'Nothing','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
									</select>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="available_for_order,show_price,online_only" class="disable_option">
								<label class="control-label col-xs-12 options-label"><?php echo smartyTranslate(array('s'=>'Options','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<label class="col-xs-10">
										<input checked type="checkbox" name="available_for_order">
                                        <?php echo smartyTranslate(array('s'=>'Available for order','mod'=>'masseditproduct'),$_smarty_tpl);?>

									</label>
									<label class="col-xs-10">
										<input checked disabled type="checkbox" name="show_price">
                                        <?php echo smartyTranslate(array('s'=>'Show price','mod'=>'masseditproduct'),$_smarty_tpl);?>

									</label>
									<label class="col-xs-10">
										<input type="checkbox" name="online_only">
                                        <?php echo smartyTranslate(array('s'=>'Online only','mod'=>'masseditproduct'),$_smarty_tpl);?>

									</label>
								</div>
							</div>
							<div class="row">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Condition','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<select name="condition">
										<option selected value="-1"><?php echo smartyTranslate(array('s'=>'Do nothing','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="new"><?php echo smartyTranslate(array('s'=>'New','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="used"><?php echo smartyTranslate(array('s'=>'Used','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										<option value="refurbished"><?php echo smartyTranslate(array('s'=>'Refurbished','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
									</select>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="delete_product" class="disable_option">
								<div class="col-lg-12">
									<label class="options-label">
										<input type="checkbox" name="delete_product">
                                        <?php echo smartyTranslate(array('s'=>'Delete selected product','mod'=>'masseditproduct'),$_smarty_tpl);?>

									</label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setActiveAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab5">
							<div class="row">
								<label class="control-label col-lg-12">
                                    <?php echo smartyTranslate(array('s'=>'Set manufacturer for all products','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
								<div class="col-lg-12">
									<select class="select2 select2manufacturer" name="id_manufacturer">
										<option value="0">-</option>
                                        <?php  $_smarty_tpl->tpl_vars['manufacturer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manufacturer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['manufacturers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->key => $_smarty_tpl->tpl_vars['manufacturer']->value) {
$_smarty_tpl->tpl_vars['manufacturer']->_loop = true;
?>
											<option value="<?php echo intval($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['manufacturer']->value['name'],'quotes','UTF-8');?>
</option>
                                        <?php } ?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setManufacturerAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab6">
							<div class="row">
								<div class="select_products">
									<div class="search_row">
										<label><?php echo smartyTranslate(array('s'=>'Write for search','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<input class="search_product" type="text"/>
									</div>
									<div class="search_row">
										<div class="row">
											<div class="col-lg-12">
												<div class="btn-group btn-group-radio">
													<label for="search_by_name">
														<input type="radio" checked="" name="search_by" value="name" id="search_by_name">
														<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Search by name','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
													</label>
													<label for="search_by_reference">
														<input type="radio" name="search_by" value="reference" id="search_by_reference">
														<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Search by reference','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="search_row">
										<div class="left_column">
											<label><?php echo smartyTranslate(array('s'=>'Select from list','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
											<select class="no_selected_product" multiple></select>
											<input class="add_select_product btn-default btn" value="<?php echo smartyTranslate(array('s'=>'Add in select products','mod'=>'masseditproduct'),$_smarty_tpl);?>
" type="button"/>
										</div>
										<div class="right_column">
											<label><?php echo smartyTranslate(array('s'=>'Selected','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
											<select name="accessories[]" class="selected_product" multiple></select>
											<input class="remove_select_product btn-default btn" value="<?php echo smartyTranslate(array('s'=>'Remove from select products','mod'=>'masseditproduct'),$_smarty_tpl);?>
" type="button"/>
										</div>
									</div>
								</div>
								<script>
                                    $(function () {
                                        $('.select_products').selectProducts({
                                            path_ajax: document.location.href.replace(document.location.hash, '')
                                        });
                                    });
								</script>
							</div>
							<div class="row">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Remove old?','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="remove_old_yes">
											<input type="radio" checked="" name="remove_old" value="1" id="remove_old_yes">
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Yes','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
										<label for="remove_old_no">
											<input type="radio" name="remove_old" value="0" id="remove_old_no">
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'No','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setAccessoriesAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab7">
							<div class="row">
								<input checked="" type="checkbox" name="disabled[]" value="supplier" class="disable_option">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Select suppliers','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<select multiple name="supplier[]">
                                        <?php if (is_array($_smarty_tpl->tpl_vars['suppliers']->value)&&count($_smarty_tpl->tpl_vars['suppliers']->value)) {?>
                                            <?php  $_smarty_tpl->tpl_vars['supplier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['supplier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['suppliers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['supplier']->key => $_smarty_tpl->tpl_vars['supplier']->value) {
$_smarty_tpl->tpl_vars['supplier']->_loop = true;
?>
												<option value="<?php echo intval($_smarty_tpl->tpl_vars['supplier']->value['id_supplier']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['supplier']->value['name'],'quotes','UTF-8');?>
</option>
                                            <?php } ?>
                                        <?php }?>
									</select>
								</div>
							</div>
							<div class="row">
								<input checked="" type="checkbox" name="disabled[]" value="id_supplier_default" class="disable_option">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Select supplier default','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<select name="id_supplier_default"></select>
								</div>
							</div>
							<div class="row">
								<input checked="" type="checkbox" name="disabled[]" value="supplier_reference" class="disable_option">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Supplier reference(s)','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<table class="table">
										<thead>
										<tr>
											<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Suppliers','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span></th>
											<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Supplier reference','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span></th>
											<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Unit price tax excluded','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span></th>
											<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Unit price currency','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span></th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>
												<select multiple name="suppliers_sr[]">
                                                    <?php if (is_array($_smarty_tpl->tpl_vars['suppliers']->value)&&count($_smarty_tpl->tpl_vars['suppliers']->value)) {?>
                                                        <?php  $_smarty_tpl->tpl_vars['supplier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['supplier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['suppliers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['supplier']->key => $_smarty_tpl->tpl_vars['supplier']->value) {
$_smarty_tpl->tpl_vars['supplier']->_loop = true;
?>
															<option value="<?php echo intval($_smarty_tpl->tpl_vars['supplier']->value['id_supplier']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['supplier']->value['name'],'quotes','UTF-8');?>
</option>
                                                        <?php } ?>
                                                    <?php }?>
												</select>
											</td>
											<td>
												<input type="text" value="" name="supplier_reference">
											</td>
											<td>
												<input type="text" value="" name="product_price">
											</td>
											<td>
												<select name="product_price_currency">
                                                    <?php  $_smarty_tpl->tpl_vars['currency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['currency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->key => $_smarty_tpl->tpl_vars['currency']->value) {
$_smarty_tpl->tpl_vars['currency']->_loop = true;
?>
														<option value="<?php echo intval($_smarty_tpl->tpl_vars['currency']->value['id_currency']);?>
"
                                                                <?php if ($_smarty_tpl->tpl_vars['currency']->value['id_currency']==$_smarty_tpl->tpl_vars['id_default_currency']->value) {?>selected="selected"<?php }?>
														><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['currency']->value['name'],'quotes','UTF-8');?>
</option>
                                                    <?php } ?>
												</select>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setSupplierAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab8">
							<div class="row disabled_option_stage">
								<input checked="" type="checkbox" name="disabled[]" value="specific_price" class="disable_option">
								<div class="col-lg-12">
									<div class="row">
										<label class="control-label col-lg-12 apply_change_tab8"><?php echo smartyTranslate(array('s'=>'Action','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="change_for_sp_add">
													<input type="radio" checked name="action_for_sp" value="0" id="change_for_sp_add"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Add','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
												<label for="change_for_sp_delete">
													<input type="radio" name="action_for_sp" value="1" id="change_for_sp_delete"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Delete','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="control-label col-lg-12 apply_change_tab8"><?php echo smartyTranslate(array('s'=>'Apply change for','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="change_for_sp_product">
													<input type="radio" checked name="change_for_sp" value="0" id="change_for_sp_product"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
												<label for="change_for_sp_combination">
													<input type="radio" name="change_for_sp" value="1" id="change_for_sp_combination"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Combination','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="control-label col-lg-12 apply_change2""><?php echo smartyTranslate(array('s'=>'For','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<div class="col-lg-12">
											<div class="col-lg-4">
												<select name="sp_id_currency">
													<option value="0"><?php echo smartyTranslate(array('s'=>'All currencies','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
                                                    <?php if (is_array($_smarty_tpl->tpl_vars['currencies']->value)&&count($_smarty_tpl->tpl_vars['currencies']->value)) {?>
                                                        <?php  $_smarty_tpl->tpl_vars['currency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['currency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->key => $_smarty_tpl->tpl_vars['currency']->value) {
$_smarty_tpl->tpl_vars['currency']->_loop = true;
?>
															<option value="<?php echo intval($_smarty_tpl->tpl_vars['currency']->value['id_currency']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['currency']->value['name'],'quotes','UTF-8');?>
</option>
                                                        <?php } ?>
                                                    <?php }?>
												</select>
											</div>
											<div class="col-lg-4">
												<select name="sp_id_country">
													<option value="0"><?php echo smartyTranslate(array('s'=>'All countries','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
                                                    <?php if (is_array($_smarty_tpl->tpl_vars['countries']->value)&&count($_smarty_tpl->tpl_vars['countries']->value)) {?>
                                                        <?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
															<option value="<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['country']->value['country'],'quotes','UTF-8');?>
</option>
                                                        <?php } ?>
                                                    <?php }?>
												</select>
											</div>
											<div class="col-lg-4">
												<select name="sp_id_group">
													<option value="0"><?php echo smartyTranslate(array('s'=>'All groups','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
                                                    <?php if (is_array($_smarty_tpl->tpl_vars['groups']->value)&&count($_smarty_tpl->tpl_vars['groups']->value)) {?>
                                                        <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
															<option value="<?php echo intval($_smarty_tpl->tpl_vars['group']->value['id_group']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['group']->value['name'],'quotes','UTF-8');?>
</option>
                                                        <?php } ?>
                                                    <?php }?>
												</select>
											</div>
											<input name="sp_id_product_attribute" value="0" type="hidden"/>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<label class="control-label col-sm-2 col-md-1"><?php echo smartyTranslate(array('s'=>'From','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
											<div class="col-sm-8">
												<input class="col-xs-6 datepicker" name="sp_from" type="text"/>
											</div>
										</div>
										<div class="col-xs-6">
											<label class="control-label col-sm-2 col-md-1"><?php echo smartyTranslate(array('s'=>'To','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
											<div class="col-sm-8">
												<input class="col-xs-6 datepicker" name="sp_to" type="text"/>
											</div>
										</div>
									</div>
									<script>
                                        $('.datepicker').datetimepicker({
                                            prevText: '',
                                            nextText: '',
                                            dateFormat: 'yy-mm-dd',
                                            // Define a custom regional settings in order to use PrestaShop translation Tools
                                            currentText: '<?php echo smartyTranslate(array('s'=>'Now','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
',
                                            closeText: '<?php echo smartyTranslate(array('s'=>'Done','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
',
                                            ampm: false,
                                            amNames: ['AM', 'A'],
                                            pmNames: ['PM', 'P'],
                                            timeFormat: 'hh:mm:ss tt',
                                            timeSuffix: '',
                                            timeOnlyTitle: '<?php echo smartyTranslate(array('s'=>'Choose Time','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
',
                                            timeText: '<?php echo smartyTranslate(array('s'=>'Time','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
',
                                            hourText: '<?php echo smartyTranslate(array('s'=>'Hour','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
',
                                            minuteText: '<?php echo smartyTranslate(array('s'=>'Minute','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
'
                                        });
									</script>
									<div class="row">
										<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Begin from quantity','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<div class="col-lg-3">
											<input name="sp_from_quantity" value="1" type="text"/>
										</div>
									</div>
									<div class="row">
										<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Product price (tax excl.)','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<div class="col-lg-12">
											<div class="col-lg-4">
												<input type="text" disabled class="specific_price_price" name="price"
													   value="-1">
											</div>
											<div class="col-lg-8">
												<input type="checkbox" name="leave_base_price" class="leave_base_price" checked>
                                                <?php echo smartyTranslate(array('s'=>'Leave base price','mod'=>'masseditproduct'),$_smarty_tpl);?>

											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Apply discount','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
											<div class="col-lg-6">
												<div class="col-lg-3">
													<input name="sp_reduction" value="0" type="text"/>
												</div>
												<div class="col-lg-6">
													<select name="sp_reduction_type">
														<option selected>-</option>
														<option value="amount"><?php echo smartyTranslate(array('s'=>'Currency','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
														<option value="percentage"><?php echo smartyTranslate(array('s'=>'Percent','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row disabled_option_stage">
								<input checked="" type="checkbox" name="disabled[]" value="delete_specific_price" class="disable_option">
								<div for="col-lg-12" class="checkbox-delete">
									<input type="checkbox" name="delete_old_discount">
                                    <?php echo smartyTranslate(array('s'=>'Delete old discount','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setSpecificPriceAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab9">
							<?php if ($_smarty_tpl->tpl_vars['feature_tab_html']->value) {?>
								
								<iframe id="seosaextendedfeatures"
									onload="$(this).parent().removeClass('loading'); initFeatures()"
									src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['not_filtered'][0][0]->notFiltered($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminSeoSaExtendedFeatures'));?>
&id_product=-1&updateproduct">
								</iframe>
								<script>
									$('#seosaextendedfeatures').parent().addClass('loading');

									function initFeatures() {
										var new_feature = [];
										for (var key in features) {
											new_feature[features[key]['name']] = features[key]['id_feature'];
										}
										var table_features = $('.table-features', window.parent.frames['seosaextendedfeatures'].contentWindow.document);
										console.log(table_features);
                                        table_features.find('td').addClass('disabled_option_stage');
                                        table_features.find('tr').each(function(){
											var name = $(this).find('[ng-bind="feature.name"]').first().text();

											$('<input>').attr('type', 'checkbox').attr('name', 'disabled[feature]['+new_feature[name]+']')
												.addClass('disable_option_feature')
												.prop('checked', true)
												.val(new_feature[name])
												.prependTo($(this).find('td').last());

											$('<input>').attr('type', 'checkbox').attr('name', 'delete_old[feature]['+new_feature[name]+']')
												.addClass('delete_option_feature')
												.val(0)
												.prependTo($(this).find('td').last());

											$(this).find('.delete_option_feature').after('<span class="string_delete_old"><?php echo smartyTranslate(array('s'=>'Delete old','mod'=>'masseditproduct','js'=>true),$_smarty_tpl);?>
</span>');
										});
										$('.delete_option_feature', window.parent.frames['seosaextendedfeatures'].contentWindow.document).trigger('change');
                                    }
								</script>
                            <?php } else { ?>
							<div class="row header_table">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo smartyTranslate(array('s'=>'Feature','mod'=>'masseditproduct'),$_smarty_tpl);?>
</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo smartyTranslate(array('s'=>'Available values','mod'=>'masseditproduct'),$_smarty_tpl);?>
</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo smartyTranslate(array('s'=>'Other value','mod'=>'masseditproduct'),$_smarty_tpl);?>
</div>
							</div>
							<div class="list_features">
                                <?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
                                    <?php echo $_smarty_tpl->getSubTemplate ("./row_feature.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                <?php } ?>
							</div>
                            <?php if ($_smarty_tpl->tpl_vars['total_features']->value>$_smarty_tpl->tpl_vars['count_feature_view']->value) {?>
								<a class="view_more_features" href="#">
                                    <?php echo smartyTranslate(array('s'=>'More','mod'=>'masseditproduct'),$_smarty_tpl);?>

									(<span class="counter"><?php echo intval(($_smarty_tpl->tpl_vars['total_features']->value-$_smarty_tpl->tpl_vars['count_feature_view']->value));?>
</span>)
								</a>
                            <?php }?>
							<?php }?>
							<div class="row">
								<div class="col-lg-12">
									<button id="setFeaturesAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
							<script type="text/javascript">
                                var allowEmployeeFormLang = <?php echo intval($_smarty_tpl->tpl_vars['allowEmployeeFormLang']->value);?>
;
                                var languages = <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['languages']->value);?>
;
                                var id_language = <?php echo intval($_smarty_tpl->tpl_vars['default_form_language']->value);?>
;

                                function initLanguages()
                                {
                                    <?php if (@constant('_PS_VERSION_')<1.6) {?>
                                    displayFlags(languages, id_language, allowEmployeeFormLang);
                                    <?php } else { ?>
                                    hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['default_form_language']->value);?>
);
                                    
                                    $(".textarea-autosize").autosize();
                                    
                                    <?php }?>
                                }

                                initLanguages();

                                var feature_pages = [];
                                var total_features = <?php echo intval($_smarty_tpl->tpl_vars['total_features']->value);?>
;
                                var count_feature_view = <?php echo intval($_smarty_tpl->tpl_vars['count_feature_view']->value);?>
;
                                for (var i = 2; i <= Math.ceil(total_features/count_feature_view); i++)
                                    feature_pages.push(i);
							</script>
						</div>
						<div id="tab10">
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="width" class="disable_option">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Package width','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-3">
									<input maxlength="14" name="width" value="0" type="text" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="height" class="disable_option">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Package height','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-3">
									<input maxlength="14" name="height" value="0" type="text" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="depth" class="disable_option">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Package depth','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-3">
									<input maxlength="14" name="depth" value="0" type="text" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="weight" class="disable_option">
								<div class="col-lg-4">
									<div class="form-group clearfix">
										<label class="control-label col-lg-12 apply_change_tab10"><?php echo smartyTranslate(array('s'=>'Package weight, apply change for','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="weight_change_for_product">
													<input type="radio" checked name="weight_change_for_combination" value="0" id="weight_change_for_product"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
												<label for="weight_change_for_combination">
													<input type="radio" name="weight_change_for_combination" value="1" id="weight_change_for_combination"/>
													<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Combination','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group clearfix">
										<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Value','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
										<div class="col-lg-3">
											<input
													maxlength="14"
													name="weight"
													value="0"
													type="text"
													onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');"
											/>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="additional_shipping_cost" class="disable_option">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Additional shipping fees (for a single item)','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-3">
									<input name="additional_shipping_cost" value="0" type="text" onchange="this.value = this.value.replace(/,/g, '.');"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="id_carrier" class="disable_option">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Available carriers','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<ul class="available_carrier">
                                        <?php if (is_array($_smarty_tpl->tpl_vars['carriers']->value)&&count($_smarty_tpl->tpl_vars['carriers']->value)) {?>
                                            <?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carriers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
?>
												<li>
													<input type="checkbox" name="id_carrier[<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_reference']);?>
]" value="<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_reference']);?>
"> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['carrier']->value['name'],'quotes','UTF-8');?>

												</li>
                                            <?php } ?>
                                        <?php }?>
									</ul>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setDeliveryAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab11">
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="disable_image" class="disable_option">
								<div class="row">
									<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Apply change for','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
									<div class="col-lg-12">
										<div class="btn-group btn-group-radio">
											<label for="change_for_product_image">
												<input type="radio" checked name="change_for_img" value="0" id="change_for_product_image"/>
												<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
											</label>
											<label for="change_for_combination_image">
												<input type="radio" name="change_for_img" value="1" id="change_for_combination_image"/>
												<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Combination','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
											</label>
										</div>
									</div>
								</div>
								<div class="images">
								</div>
								<div class="row">
									<div class="col-lg-6">
										<button class="add_image btn btn-default">
											<i class="icon-plus"></i>
                                            <?php echo smartyTranslate(array('s'=>'Add image','mod'=>'masseditproduct'),$_smarty_tpl);?>

										</button>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 checkbox-delete">
										<input type="checkbox" name="delete_images">
                                        <?php echo smartyTranslate(array('s'=>'Delete old images about products','mod'=>'masseditproduct'),$_smarty_tpl);?>

									</div>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="disable_image_caption" class="disable_option">
								<div class="form-group">
									<label class="control-label col-lg-1">
				<span class="label-tooltip" data-toggle="tooltip"
					  title="<?php echo smartyTranslate(array('s'=>sprintf('Update all captions at once, or select the position of the image whose caption you wish to edit. Invalid characters: %s','<>;=#{}'),'mod'=>'masseditproduct'),$_smarty_tpl);?>
">
					<?php echo smartyTranslate(array('s'=>'Caption','mod'=>'masseditproduct'),$_smarty_tpl);?>

				</span>
									</label>
									<div class="col-lg-5">
                                        <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
                                            <?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
												<div class="translatable-field row lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
">
												<div class="col-lg-8">
                                            <?php }?>
											<input type="text" id="legend_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
"<?php if (isset($_smarty_tpl->tpl_vars['input_class']->value)) {?> class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['input_class']->value,'html','UTF-8');?>
"<?php }?> name="legend_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" data-lang="<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value=""/>
											<br /><span><?php echo smartyTranslate(array('s'=>'If other language an empty caption for him will be removed','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
                                            <?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
												</div>
												<div class="col-lg-2" style="margin-top: 15px;">
													<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['language']->value['iso_code'],'html','UTF-8');?>

														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu">
                                                        <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
															<li>
																<a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
);"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['language']->value['name'],'html','UTF-8');?>
</a>
															</li>
                                                        <?php } ?>
													</ul>
												</div>
												</div>
                                            <?php }?>
                                        <?php } ?>
									</div>
									<div class="col-lg-3" id="caption_selection">
										<select name="id_caption">
											<option value="0"><?php echo smartyTranslate(array('s'=>'All captions','mod'=>'masseditproduct'),$_smarty_tpl);?>
</option>
										</select>
									</div>
									<div class="col-lg-3 checkbox-delete" style="line-height: 36px;padding: 0 10px;padding-top: 0 !important">
										<input type="checkbox" name="delete_captions">
                                        <?php echo smartyTranslate(array('s'=>'Delete old captions','mod'=>'masseditproduct'),$_smarty_tpl);?>

									</div>
								</div>
								<div class="col-lg-12">
									<button type="button" class="btn btn-default" onclick="$('[name^=legend]:visible').insertAtCaret('{name}');">
										name product
									</button>
									<button type="button" class="btn btn-default" onclick="$('[name^=legend]:visible').insertAtCaret('{manufacturer}');">
										manufacturer
									</button>
									<button type="button" class="btn btn-default" onclick="$('[name^=legend]:visible').insertAtCaret('{category}');">
										default category
									</button>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setImageAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab12">
							<div class="row">
								<label class="control-label col-lg-4 select-lang"><?php echo smartyTranslate(array('s'=>'Select language','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-8">
									<div class="btn-group btn-group-radio">
										<label for="all_language">
											<input type="radio" checked name="language" value="0" id="all_language"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'For all','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
                                        <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
											<label for="<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
_language">
												<input type="radio" name="language" value="<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" id="<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
_language"/>
												<span class="btn btn-default"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['language']->value['name'],'quotes','UTF-8');?>
</span>
											</label>
                                        <?php } ?>
									</div>
								</div>
							</div>
							<div class="row">

								<input checked type="checkbox" name="disabled[]" value="product_name" class="disable_option">
								<label class="control-label col-lg-12 label-meta"><?php echo smartyTranslate(array('s'=>'Name','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<input class="form-control" name="name">
								</div>
                                <?php $_smarty_tpl->_capture_stack[0][] = array('foo', null, null); ob_start(); ?><?php $_smarty_tpl->tpl_vars['variables_for_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['variables']->value, null, 0);?><?php $_smarty_tpl->createLocalArrayVariable('variables_for_name', null, 0);
$_smarty_tpl->tpl_vars['variables_for_name']->value['static'] = $_smarty_tpl->tpl_vars['static_for_name']->value;?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                                <?php echo $_smarty_tpl->getSubTemplate ("./row_variables.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('name'=>'name','variables'=>$_smarty_tpl->tpl_vars['variables_for_name']->value), 0);?>

							</div>
                            <?php echo $_smarty_tpl->getSubTemplate ("./copy_row.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('field'=>'description_short'), 0);?>

							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="description_short" class="disable_option">
								<label class="control-label col-lg-12 desc-label"><?php echo smartyTranslate(array('s'=>'Short description','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<textarea class="editor_html" name="description_short"></textarea>
								</div>
                                <?php echo $_smarty_tpl->getSubTemplate ("./row_variables_description.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('name'=>'description_short'), 0);?>

							</div>
                            <?php echo $_smarty_tpl->getSubTemplate ("./copy_row.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('field'=>'description'), 0);?>

							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="description" class="disable_option">
								<label class="control-label col-lg-12 desc-label"><?php echo smartyTranslate(array('s'=>'Description','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<textarea class="editor_html" name="description"></textarea>
								</div>
                                <?php echo $_smarty_tpl->getSubTemplate ("./row_variables_description.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('name'=>'description'), 0);?>

							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setDescriptionAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab13">
							<div class="row">
								<div class="col-lg-12">
									<input checked type="checkbox" name="disabled[]" value="selected_attributes" class="disable_option">
									<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Delete combinations, which match attributes','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								</div>
								<div class="col-lg-12">
									<div class="row row_attributes">
                                        <?php if (is_array($_smarty_tpl->tpl_vars['attribute_groups']->value)&&count($_smarty_tpl->tpl_vars['attribute_groups']->value)) {?>
											<div class="col-lg-3">
												<select name="attribute_group">
                                                    <?php  $_smarty_tpl->tpl_vars['attribute_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute_group']->key => $_smarty_tpl->tpl_vars['attribute_group']->value) {
$_smarty_tpl->tpl_vars['attribute_group']->_loop = true;
?>
														<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute_group']->value['id_attribute_group'],'quotes','UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute_group']->value['name'],'quotes','UTF-8');?>
</option>
                                                    <?php } ?>
												</select>
											</div>

                                            <?php  $_smarty_tpl->tpl_vars['attribute_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute_group']->key => $_smarty_tpl->tpl_vars['attribute_group']->value) {
$_smarty_tpl->tpl_vars['attribute_group']->_loop = true;
?>
                                                <?php if (isset($_smarty_tpl->tpl_vars['attribute_group']->value['attributes'])&&count($_smarty_tpl->tpl_vars['attribute_group']->value['attributes'])) {?>
													<div class="col-lg-3" id="attribute_group_<?php echo intval($_smarty_tpl->tpl_vars['attribute_group']->value['id_attribute_group']);?>
">
														<select name="attributes">
                                                            <?php  $_smarty_tpl->tpl_vars['attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->key => $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['attribute']->_loop = true;
?>
																<option value="<?php echo intval($_smarty_tpl->tpl_vars['attribute']->value['id_attribute']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute']->value['name'],'quotes','UTF-8');?>
</option>
                                                            <?php } ?>
														</select>
													</div>
                                                <?php }?>
                                            <?php } ?>
											<div class="col-lg-4">
												<button class="btn btn-success addAttribute">
													<i class="icon-plus"></i>
                                                    <?php echo smartyTranslate(array('s'=>'Add attribute','mod'=>'masseditproduct'),$_smarty_tpl);?>

												</button>
												<input type="hidden" name="selected_attributes" value="">
											</div>
                                        <?php }?>
									</div>
									<div class="row">
										<div class="selected_attributes col-lg-6">
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="row">
										<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Exact Match','mod'=>'masseditproduct'),$_smarty_tpl);?>

											<input type="checkbox" name="exact_match">
										</label>
										<div class="col-lg-12">
											<div class="alert alert-info">
                                                <?php echo smartyTranslate(array('s'=>'Search exact match. In combinations of products in this case must be the same set of attributes that you have chosen','mod'=>'masseditproduct'),$_smarty_tpl);?>

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<input checked type="checkbox" name="disabled[]" value="delete_attribute" class="disable_option">
									<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Delete attribute from combinations','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								</div>
								<div class="col-lg-12">
									<div class="row row_attributes">
                                        <?php if (is_array($_smarty_tpl->tpl_vars['attribute_groups']->value)&&count($_smarty_tpl->tpl_vars['attribute_groups']->value)) {?>
											<div class="col-lg-3">
												<select name="attribute_group">
                                                    <?php  $_smarty_tpl->tpl_vars['attribute_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute_group']->key => $_smarty_tpl->tpl_vars['attribute_group']->value) {
$_smarty_tpl->tpl_vars['attribute_group']->_loop = true;
?>
														<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute_group']->value['id_attribute_group'],'quotes','UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute_group']->value['name'],'quotes','UTF-8');?>
</option>
                                                    <?php } ?>
												</select>
											</div>
                                            <?php  $_smarty_tpl->tpl_vars['attribute_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute_group']->key => $_smarty_tpl->tpl_vars['attribute_group']->value) {
$_smarty_tpl->tpl_vars['attribute_group']->_loop = true;
?>
                                                <?php if (isset($_smarty_tpl->tpl_vars['attribute_group']->value['attributes'])&&count($_smarty_tpl->tpl_vars['attribute_group']->value['attributes'])) {?>
													<div class="col-lg-3 delete_attribute" id="attribute_group_<?php echo intval($_smarty_tpl->tpl_vars['attribute_group']->value['id_attribute_group']);?>
">
														<select name="delete_attribute">
                                                            <?php  $_smarty_tpl->tpl_vars['attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->key => $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['attribute']->_loop = true;
?>
																<option value="<?php echo intval($_smarty_tpl->tpl_vars['attribute']->value['id_attribute']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute']->value['name'],'quotes','UTF-8');?>
</option>
                                                            <?php } ?>
														</select>
													</div>
                                                <?php }?>
                                            <?php } ?>
                                        <?php }?>
									</div>
								</div>
								<div class="col-lg-12">
									<label class="control-label col-lg-12">
										<input type="checkbox" name="force_delete_attribute" value="1">
                                        <?php echo smartyTranslate(array('s'=>'Force delete attribute from combinations','mod'=>'masseditproduct'),$_smarty_tpl);?>

									</label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<input checked type="checkbox" name="disabled[]" value="add_attribute" class="disable_option">
									<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Add attribute in combinations','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								</div>
								<div class="col-lg-12">
									<div class="row row_attributes">
                                        <?php if (is_array($_smarty_tpl->tpl_vars['attribute_groups']->value)&&count($_smarty_tpl->tpl_vars['attribute_groups']->value)) {?>
											<div class="col-lg-3">
												<select name="attribute_group">
                                                    <?php  $_smarty_tpl->tpl_vars['attribute_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute_group']->key => $_smarty_tpl->tpl_vars['attribute_group']->value) {
$_smarty_tpl->tpl_vars['attribute_group']->_loop = true;
?>
														<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute_group']->value['id_attribute_group'],'quotes','UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute_group']->value['name'],'quotes','UTF-8');?>
</option>
                                                    <?php } ?>
												</select>
											</div>
                                            <?php  $_smarty_tpl->tpl_vars['attribute_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute_group']->key => $_smarty_tpl->tpl_vars['attribute_group']->value) {
$_smarty_tpl->tpl_vars['attribute_group']->_loop = true;
?>
                                                <?php if (isset($_smarty_tpl->tpl_vars['attribute_group']->value['attributes'])&&count($_smarty_tpl->tpl_vars['attribute_group']->value['attributes'])) {?>
													<div class="col-lg-3 add_attribute" id="attribute_group_<?php echo intval($_smarty_tpl->tpl_vars['attribute_group']->value['id_attribute_group']);?>
">
														<select name="add_attribute">
                                                            <?php  $_smarty_tpl->tpl_vars['attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attribute']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attribute_group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->key => $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['attribute']->_loop = true;
?>
																<option value="<?php echo intval($_smarty_tpl->tpl_vars['attribute']->value['id_attribute']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attribute']->value['name'],'quotes','UTF-8');?>
</option>
                                                            <?php } ?>
														</select>
													</div>
                                                <?php }?>
                                            <?php } ?>
                                        <?php }?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setRuleCombinationAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab14">
							<div class="form-group">
								<label class="control-label col-lg-2 required"><?php echo smartyTranslate(array('s'=>'Filename','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-9">
                                    <?php echo $_smarty_tpl->getSubTemplate ("./input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('input_name'=>'filename','languages'=>$_smarty_tpl->tpl_vars['languages']->value,'required'=>true,'maxlength'=>32), 0);?>

								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">
                                    <?php echo smartyTranslate(array('s'=>'Description','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
								<div class="col-lg-9">
                                    <?php echo $_smarty_tpl->getSubTemplate ("./input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('input_name'=>'description','languages'=>$_smarty_tpl->tpl_vars['languages']->value), 0);?>

								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-11 align-center">
							<span data-attachment-file class="btn btn-default wrap_file_input">
								<span class="label_input">
									<?php echo smartyTranslate(array('s'=>'Select file','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</span>
								<input type="file">
							</span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<div class="select_attachments">
										<div class="search_row">
											<div class="left_column">
												<label><?php echo smartyTranslate(array('s'=>'Select from list','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
												<select class="no_selected_product" multiple>
                                                    <?php if (is_array($_smarty_tpl->tpl_vars['attachments']->value)&&count($_smarty_tpl->tpl_vars['attachments']->value)) {?>
                                                        <?php  $_smarty_tpl->tpl_vars['attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attachments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attachment']->key => $_smarty_tpl->tpl_vars['attachment']->value) {
$_smarty_tpl->tpl_vars['attachment']->_loop = true;
?>
															<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attachment']->value['id_attachment'],'quotes','UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['attachment']->value['name'],'quotes','UTF-8');?>
</option>
                                                        <?php } ?>
                                                    <?php }?>
												</select>
												<input class="add_select_product btn btn-default" value="<?php echo smartyTranslate(array('s'=>'Add in select products','mod'=>'masseditproduct'),$_smarty_tpl);?>
" type="button"/>
											</div>
											<div class="right_column">
												<label><?php echo smartyTranslate(array('s'=>'Selected','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
												<select name="attachments[]" class="selected_product" multiple></select>
												<input class="remove_select_product btn btn-default" value="<?php echo smartyTranslate(array('s'=>'Remove from select products','mod'=>'masseditproduct'),$_smarty_tpl);?>
" type="button"/>
											</div>
										</div>
									</div>
									<script>
                                        $(function () {
                                            $('.select_attachments').selectProducts({
                                                path_ajax: document.location.href.replace(document.location.hash, ''),
                                                search: false
                                            });
                                        });
									</script>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-12">
									<input type="checkbox" name="old_attachment">
                                    <?php echo smartyTranslate(array('s'=>'Delete old attachment','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<button id="setAttachmentAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
                        <?php if ($_smarty_tpl->tpl_vars['advanced_stock_management']->value) {?>
						<div id="tab15">
							<div class="form-group" <?php if ($_smarty_tpl->tpl_vars['product']->value->is_virtual) {?>style="display:none;"<?php }?> class="row stockForVirtualProduct">
								<div class="col-lg-9 col-lg-offset-3">
									<p class="checkbox">
										<label for="advanced_stock_management">
											<input type="checkbox" id="advanced_stock_management" name="advanced_stock_management" class="advanced_stock_management"/>
                                            <?php echo smartyTranslate(array('s'=>'I want to use the advanced stock management system for this product.','mod'=>'masseditproduct'),$_smarty_tpl);?>

										</label>
									</p>
								</div>
							</div>

							<div class="form-group stockForVirtualProduct">
								<label class="control-label col-lg-3" for="depends_on_stock_1"><?php echo smartyTranslate(array('s'=>'Available quantities','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-9">
									<p class="radio">
										<label for="depends_on_stock_1">
											<input type="radio" id="depends_on_stock_1" name="depends_on_stock" class="depends_on_stock"  value="1"
														checked="checked"
														disabled="disabled"
											/>
                                            <?php echo smartyTranslate(array('s'=>'The available quantities for the current product and its combinations are based on the stock in your warehouse (using the advanced stock management system). ','mod'=>'masseditproduct'),$_smarty_tpl);?>

										</label>
									</p>
									<p class="radio">
										<label for="depends_on_stock_0" for="depends_on_stock_0">
											<input type="radio"  id="depends_on_stock_0" name="depends_on_stock" class="depends_on_stock" value="0"
												   checked="checked"
											/>
                                            <?php echo smartyTranslate(array('s'=>'I want to specify available quantities manually.','mod'=>'masseditproduct'),$_smarty_tpl);?>

										</label>
									</p>
								</div>
							</div>
								<div class="form-group">
									<div class="col-lg-12">
										<button id="setAdvancedStockManagementAllProduct" class="btn btn-default">
											<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</button>
									</div>
								</div>
						</div>
                        <?php }?>
						<div id="tab16">
							<div class="row">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Select language','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="all_language_meta">
											<input type="radio" checked name="language_meta" value="0" id="all_language_meta"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'For all','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
                                        <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
											<label for="<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
_language_meta">
												<input type="radio" name="language_meta" value="<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" id="<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
_language_meta"/>
												<span class="btn btn-default"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['language']->value['name'],'quotes','UTF-8');?>
</span>
											</label>
                                        <?php } ?>
									</div>
								</div>
							</div>
							<div class="row">

								<input checked type="checkbox" name="disabled[]" value="meta_title" class="disable_option">
								<label class="control-label col-lg-12 label-meta"><?php echo smartyTranslate(array('s'=>'Meta title','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<input class="form-control" name="meta_title">
								</div>
                                <?php echo $_smarty_tpl->getSubTemplate ("./row_variables.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('name'=>'meta_title'), 0);?>

							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="meta_keywords" class="disable_option">
								<label class="control-label col-lg-12 label-meta"><?php echo smartyTranslate(array('s'=>'Meta keywords','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<input class="form-control" name="meta_keywords">
								</div>
                                <?php echo $_smarty_tpl->getSubTemplate ("./row_variables.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('name'=>'meta_keywords'), 0);?>

							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="meta_description" class="disable_option">
								<label class="control-label col-lg-12 label-meta"><?php echo smartyTranslate(array('s'=>'Meta description','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<input class="form-control" name="meta_description">
								</div>
                                <?php echo $_smarty_tpl->getSubTemplate ("./row_variables.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('name'=>'meta_description'), 0);?>

							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="tags" class="disable_option">
								<label class="control-label col-lg-12 label-metat"><?php echo smartyTranslate(array('s'=>'Tags','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="row">
									<div class="col-lg-12">
										<div class="btn-group btn-group-radio">
											<label for="add_tags">
												<input type="radio" checked name="edit_tags" value="0" id="add_tags"/>
												<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Add tags','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
											</label>
											<label for="add_del_tags">
												<input type="radio" name="edit_tags" value="1" id="add_del_tags"/>
												<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Add and delete old tags','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
											</label>
											<label for="del_tags">
												<input type="radio" name="edit_tags" value="2" id="del_tags"/>
												<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Delete tags','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-xs-12">
										<input id="tags" class="form-control" name="tags">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setMetaAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab17">
							<div class="row">
								<label class="control-label col-lg-12"><?php echo smartyTranslate(array('s'=>'Apply change for','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="change_for_product_property">
											<input type="radio" checked name="change_for_property" value="0" id="change_for_product_property"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
										<label for="change_for_combination_property">
											<input type="radio" name="change_for_property" value="1" id="change_for_combination_property"/>
											<span class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Combination','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="selected_reference" class="disable_option">
								<label class="control-label col-lg-12">
                                    <?php echo smartyTranslate(array('s'=>'Reference code','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
								<div class="col-lg-12">
									<input class="" name="reference" type="text"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="selected_ean13" class="disable_option">
								<label class="control-label col-lg-12">
                                    <?php echo smartyTranslate(array('s'=>'EAN-13 or JAN barcode','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
								<div class="col-lg-12">
									<input class="" maxlength="13" name="ean13" type="text"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="selected_upc" class="disable_option">
								<label class="control-label col-lg-12">
                                    <?php echo smartyTranslate(array('s'=>'UPC barcode','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</label>
								<div class="col-lg-12">
									<input class="" maxlength="12" name="upc" type="text"/>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setReferenceAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab18">
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['not_filtered'][0][0]->notFiltered($_smarty_tpl->tpl_vars['form_create_products']->value);?>

							<div id="product-prices" class="panel product-tab">
								<div class="form-group">
									<label class="control-label col-lg-2" for="unit_price">
										<span class="label-tooltip" data-toggle="tooltip" title="<?php echo smartyTranslate(array('s'=>'When selling a pack of items, you can indicate the unit price for each item of the pack. For instance, "per bottle" or "per pound".','mod'=>'masseditproduct'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Unit price (tax excl.)','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-addon"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['not_filtered'][0][0]->notFiltered($_smarty_tpl->tpl_vars['currency2']->value->prefix);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['not_filtered'][0][0]->notFiltered($_smarty_tpl->tpl_vars['currency2']->value->suffix);?>
</span>
											<input id="unit_price" name="unit_price" type="text" value="" maxlength="27"/>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="createProducts" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab19">
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="delete_customization_fields" class="disable_option">
								<div class="col-lg-12">
									<input type="checkbox" name="delete_customization_fields">
                                    <?php echo smartyTranslate(array('s'=>'Delete old customization fields','mod'=>'masseditproduct'),$_smarty_tpl);?>

								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="customization_file_labels" class="disable_option">
								<div class="col-lg-12">
									<div id="customization_fields_0" class="customization_file_labels clearfix">
                                        <?php echo $_smarty_tpl->getSubTemplate ("./customization_field.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>0,'counter'=>0,'languages'=>$_smarty_tpl->tpl_vars['languages']->value), 0);?>

									</div>
									<div class="form-group clearfix">
										<div class="col-lg-12">
											<input type="button" class="btn btn-default addFileLabel" value="<?php echo smartyTranslate(array('s'=>'Add file label','mod'=>'masseditproduct'),$_smarty_tpl);?>
">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="customization_text_labels" class="disable_option">
								<div class="col-lg-12">
									<div id="customization_fields_1" class="customization_text_labels clearfix">
                                        <?php echo $_smarty_tpl->getSubTemplate ("./customization_field.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('type'=>1,'counter'=>0,'languages'=>$_smarty_tpl->tpl_vars['languages']->value), 0);?>

									</div>
									<div class="form-group clearfix">
										<div class="col-lg-12">
											<input type="button" class="btn btn-default addTextLabel" value="<?php echo smartyTranslate(array('s'=>'Add text label','mod'=>'masseditproduct'),$_smarty_tpl);?>
">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setCustomizationAllProduct" class="btn btn-default">
										<span><?php echo smartyTranslate(array('s'=>'Apply','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel mode_edit">
			<h3 class="panel-heading"><?php echo smartyTranslate(array('s'=>'Selected products','mod'=>'masseditproduct'),$_smarty_tpl);?>
</h3>
			<div class="row table_selected_products">
                <?php echo $_smarty_tpl->getSubTemplate ("./products.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('without_product'=>true), 0);?>

			</div>
		</div>
	</div>
</div>

<script id="image_row" type="text/html">
	<div class="row">
		<div class="col-lg-12">
			<input name="image[]" type="file">
		</div>
	</div>
</script>

<script>
    $(function () {
        initLanguages();
    });
    $().ready(function () {
        var input_id = 'tags';
        $('#'+input_id).tagify({ delimiters: [13,44], addTagPrompt: "<?php echo smartyTranslate(array('s'=>'Add tag','mod'=>'masseditproduct'),$_smarty_tpl);?>
" });
        $('#setMetaAllProduct').live('click', function() {
            $(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
        });
    });
</script><?php }} ?>
