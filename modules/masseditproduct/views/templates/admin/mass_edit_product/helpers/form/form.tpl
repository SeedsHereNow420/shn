{*
* 2007-2016 PrestaShop
*567
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author    SeoSA <885588@bk.ru>
* @copyright 2012-2017 SeoSA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}
<script>
    var upload_file_dir = "{$upload_file_dir|escape:'quotes':'UTF-8'}";
    var upload_image_dir = "{$upload_image_dir|escape:'quotes':'UTF-8'}";
    var text_already_exists_attribute = "{l s='Attribute already exists!' mod='masseditproduct'}";
    var text_filename_empty = "{l s='Filename required field!' mod='masseditproduct' js=true}";
    var text_template_name_empty = "{l s='Template name empty!' mod='masseditproduct' js=true}";
    var text_not_products = "{l s='Not products!' mod='masseditproduct' js=true}";
    var features = {$features|json_encode};
</script>


<div class="{if $smarty.const._PS_VERSION_ < 1.6}custom_responsive{/if}">
	<div class="popup_mep">
		<div class="popup_info_row">
			<span class="popup_info">
				{l s='Count products:' mod='masseditproduct'}
				<span class="count_products">0</span>
			</span>
			<button class="toggleList active" type="button">
				<i class="icon-list"></i>
			</button>
			<button class="clearAll" type="button">
                {l s='Clear all' mod='masseditproduct'}
			</button>
		</div>
		<div class="popup_info_template">
			<div>{l s='Select template' mod='masseditproduct'}</div>
			<div class="row">
				<div class="col-lg-8">
					<select name="template_products">
						<option value="">-----</option>
                        {foreach from=$templates_products item=template}
							<option value="{$template.id|intval}">{$template.name|escape:'quotes':'UTF-8'}</option>
                        {/foreach}
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
					<button type="button" class="btn btn-success saveTemplateProduct">{l s='Save list products' mod='masseditproduct'}</button>
				</div>
			</div>
		</div>
		<div class="list_products"></div>
		<div>
			<div class="btn-group btn-group-radio">
				<label for="mode_search">
					<input type="radio" checked name="mode" value="mode_search" id="mode_search"/>
					<span class="btn btn-default">{l s='Select products' mod='masseditproduct'}</span>
				</label>
				<label for="mode_edit">
					<input type="radio" name="mode" value="mode_edit" id="mode_edit"/>
					<span class="btn btn-default">{l s='Begin edit' mod='masseditproduct'}</span>
				</label>
			</div>
		</div>
	</div>
	<div class="wrapp_content custom_bootstrap">
		<div class="panel mode_search">
			<h3 class="panel-heading panel-heading-top">{l s='Search products' mod='masseditproduct'}
			</h3>
			<div class="row">
				<div class="col-lg-6 tree_custom">
					<div class="row">
						<label class="control-label col-lg-12">
                            {l s='Select category by search' mod='masseditproduct'}
						</label>
                        {include file="./tree.tpl"
                        categories=$categories
                        id_category=Configuration::get('PS_ROOT_CATEGORY')
                        root=true
                        view_header=true
                        multiple=true
                        selected_categories=[]
                        name='categories'
						search_view = true
                        }
					</div>
				</div>
				<div class="col-lg-6 search-products">
					<div class="row">
						<label class="control-label col-lg-3 search-prod">
                            {l s='Search product' mod='masseditproduct'}
						</label>
						<div class="row search_product_name">
							<div class="col-lg-9">
                                {include file="./btn_radio.tpl" input=$input_product_name_type_search}
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group form-group-lg">
								<div class="col-sm-9">
									<input name="search_query" class="form-control" type="text"/>
								</div>
								<div class="col-sm-3">
									<select class="form-control" name="type_search">
										<option value="0">{l s='Name' mod='masseditproduct'}</option>
										<option value="1">{l s='Id product' mod='masseditproduct'}</option>
										<option value="2">{l s='Reference' mod='masseditproduct'}</option>
										<option value="3">{l s='EAN-13' mod='masseditproduct'}</option>
										<option value="4">{l s='UPC' mod='masseditproduct'}</option>
										<option value="5">{l s='Description' mod='masseditproduct'}</option>
										<option value="6">{l s='Description short' mod='masseditproduct'}</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<label class="control-label col-lg-12">
                            {l s='Search by manufacturer' mod='masseditproduct'}
						</label>
						<div class="col-lg-12">
							<select id="manufacturer" class="form-control" multiple name="manufacturer[]">
                                {foreach from=$manufacturers item=manufacturer}
									<option value="{$manufacturer.id_manufacturer|intval}">{$manufacturer.name|escape:'quotes':'UTF-8'}</option>
                                {/foreach}
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
                            {l s='Search by supplier' mod='masseditproduct'}
						</label>
						<div class="col-lg-12">
							<select id="supplier" class="form-control" multiple name="supplier[]">
                                {foreach from=$suppliers item=supplier}
									<option value="{$supplier.id_supplier|intval}">{$supplier.name|escape:'quotes':'UTF-8'}</option>
                                {/foreach}
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
                                {l s='Only active products' mod='masseditproduct'}
							</label>
							<div class="col-lg-12">
                                {if $smarty.const._PS_VERSION_ < 1.6}
									<label class="t"><img src="../img/admin/enabled.gif"></label>
									<input name="active" value="1" type="radio"/>
									<label class="t"><img src="../img/admin/disabled.gif"></label>
									<input checked name="active" value="0" type="radio"/>
                                {else}
									<div class="input-group col-lg-4">
								<span class="switch prestashop-switch">
									{foreach [1,0] as $value}
										<input
												type="radio"
												name="active"
                                                {if $value == 1}
													id="active_on"
                                                {else}
													id="active_off"
                                                {/if}
												value="{$value|escape:'quotes':'UTF-8'}"
                                                {if 0 == $value}checked="checked"{/if}
										/>
										<label
                                                {if $value == 1}
													for="active_on"
                                                {else}
													for="active_off"
                                                {/if}
										>
											{if $value == 1}
                                                {l s='Yes' mod='masseditproduct'}
                                            {else}
                                                {l s='No' mod='masseditproduct'}
                                            {/if}
										</label>
                                    {/foreach}
									<a class="slide-button btn"></a>
								</span>
									</div>
                                {/if}
							</div>
						</div>
						<div class="col-lg-6">
							<label class="control-label col-lg-12">
                                {l s='Only disabled products' mod='masseditproduct'}
							</label>
							<div class="col-lg-12">
                                {if $smarty.const._PS_VERSION_ < 1.6}
									<label class="t"><img src="../img/admin/enabled.gif"></label>
									<input name="disable" value="1" type="radio"/>
									<label class="t"><img src="../img/admin/disabled.gif"></label>
									<input checked name="disable" value="0" type="radio"/>
                                {else}
									<div class="input-group col-lg-4">
								<span class="switch prestashop-switch">
									{foreach [1,0] as $value}
										<input
												type="radio"
												name="disable"
                                                {if $value == 1}
													id="disable_on"
                                                {else}
													id="disable_off"
                                                {/if}
												value="{$value|escape:'quotes':'UTF-8'}"
                                                {if 0 == $value}checked="checked"{/if}
										/>
										<label
                                                {if $value == 1}
													for="disable_on"
                                                {else}
													for="disable_off"
                                                {/if}
										>
											{if $value == 1}
                                                {l s='Yes' mod='masseditproduct'}
                                            {else}
                                                {l s='No' mod='masseditproduct'}
                                            {/if}
										</label>
                                    {/foreach}
									<a class="slide-button btn"></a>
								</span>
									</div>
                                {/if}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<label class="control-label col-lg-12">
								{l s='Search by quantity?' mod='masseditproduct'}
							</label>

							<div class="search-quantity col-lg-5">
								<label class="control-label">
									{l s='From' mod='masseditproduct'}
								</label>
								<input type="text" name="qty_from"">
							</div>

							<div class="search-quantity col-lg-5">
								<label class="control-label">
									{l s='To' mod='masseditproduct'}
								</label>
								<input type="text" name="qty_to">
							</div>
						</div>
						<div class="col-lg-6">
							<label class="control-label col-lg-12">
                                {l s='Search by price?' mod='masseditproduct'}
							</label>

							<div class="search-quantity col-lg-5">
								<label class="control-label">
                                    {l s='From' mod='masseditproduct'}
								</label>
								<input type="text" name="price_from">
							</div>

							<div class="search-quantity col-lg-5">
								<label class="control-label">
                                    {l s='To' mod='masseditproduct'}
								</label>
								<input type="text" name="price_to">
							</div>
						</div>
					</div>
					<div class="row">
						<label class="control-label col-lg-12">
                            {l s='How many to show products?' mod='masseditproduct'}
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
								<label class="control-label col-lg-12">{l s='Select feature' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<select name="feature_group">
                                        {foreach from=$features item=feature}
											<option value="{$feature.id_feature|escape:'quotes':'UTF-8'}">{$feature.name|escape:'quotes':'UTF-8'} ({count($feature.values)|intval})</option>
                                        {/foreach}
									</select>
								</div>
							</div>
                            {foreach from=$features item=feature}
								<div data-feature-values="{$feature.id_feature|escape:'quotes':'UTF-8'}" style="display: none" class="form-group clearfix"></div>
                            {/foreach}
						</div>
					</div>
				</div>
				<div class="col-lg-12 control_btn">
					<button id="beginSearch" class="btn btn-default">
                        {l s='Search product' mod='masseditproduct'}
					</button>
				</div>
			</div>
		</div>
		<div class="panel mode_search">
			<h3 class="panel-heading">{l s='Result search product' mod='masseditproduct'}</h3>
			<div class="row table_search_product">
				<div class="alert alert-warning">{l s='Need begin search' mod='masseditproduct'}</div>
			</div>
			<div class="row_select_all">
				<button class="btn btn-default selectAll">
                    {l s='Select all' mod='masseditproduct'}
				</button>
			</div>
		</div>
		<div class="panel mode_edit panel-container">
			<div class="message_successfully success alert alert-success" style="display: none;">
                {l s='Update successfully!' mod='masseditproduct'}
			</div>
			<div class="message_error error alert alert-danger" style="display: none;">
			</div>
			<div class="panel">
				<div class="panel-heading">
					<button class="change_date_button">
						<i class="icon-plus"></i>
					</button>
					<span>{l s='Global settings' mod='masseditproduct'}
				</span> /
					<a class="masseditdoc" href="{$link_on_tab_module|escape:'quotes':'UTF-8'}">{l s='Documentation' mod='masseditproduct'}</a>
					<a class="float-right" id="seosa_manager_btn" href="#">{l s='Our modules' mod='masseditproduct'}</a>
				</div>
				<div class="form-group change_date_container clearfix">
					<label class="control-label col-lg-12">{l s='Change date update in product after apply changes?' mod='masseditproduct'}</label>
					<div class="col-lg-12">
						<div class="btn-group btn-group-radio">
							<label for="change_date_upd_yes">
								<input type="radio" name="change_date_upd" value="1" id="change_date_upd_yes">
								<span class="btn btn-default">{l s='Yes' mod='masseditproduct'}</span>
							</label>
							<label for="change_date_upd_no">
								<input type="radio" checked="" name="change_date_upd" value="0" id="change_date_upd_no">
								<span class="btn btn-default">{l s='No' mod='masseditproduct'}</span>
							</label>
						</div>
					</div>
				</div>
				<div class="form-group change_date_container clearfix">
					<label class="control-label col-lg-12">{l s='Reindex products after change?' mod='masseditproduct'}</label>
					<div class="col-lg-12">
						<div class="btn-group btn-group-radio">
							<label for="reindex_products_yes">
								<input type="radio" checked name="reindex_products" value="1" id="reindex_products_yes">
								<span class="btn btn-default">{l s='Yes' mod='masseditproduct'}</span>
							</label>
							<label for="reindex_products_no">
								<input type="radio" name="reindex_products" value="0" id="reindex_products_no">
								<span class="btn btn-default">{l s='No' mod='masseditproduct'}</span>
							</label>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="tab_container">
				<div class="col-md-2">
					<button class="tab-menu">{l s='Menu' mod='masseditproduct'}<i class="icon-chevron-down"></i></button>
					<ul class="tabs clearfix">
						<li data-tab="tab1">{l s='Category' mod='masseditproduct'}</li>
						<li data-tab="tab2">{l s='Price' mod='masseditproduct'}</li>
						<li data-tab="tab3">{l s='Quantity' mod='masseditproduct'}</li>
						<li data-tab="tab4">{l s='Active' mod='masseditproduct'}</li>
						<li data-tab="tab5">{l s='Manufacturer' mod='masseditproduct'}</li>
						<li data-tab="tab6">{l s='Accessories' mod='masseditproduct'}</li>
						<li data-tab="tab7">{l s='Supplier' mod='masseditproduct'}</li>
						<li data-tab="tab8">{l s='Discount' mod='masseditproduct'}</li>
						<li data-tab="tab9">{l s='Features' mod='masseditproduct'}</li>
						<li data-tab="tab10">{l s='Delivery' mod='masseditproduct'}</li>
						<li data-tab="tab11">{l s='Image' mod='masseditproduct'}</li>
						<li data-tab="tab12">{l s='Description' mod='masseditproduct'}</li>
						<li data-tab="tab13">{l s='Combinations' mod='masseditproduct'}</li>
						<li data-tab="tab14">{l s='Attachments' mod='masseditproduct'}</li>
                        {if $advanced_stock_management}
							<li data-tab="tab15">{l s='Stock management' mod='masseditproduct'}</li>
                        {/if}
						<li data-tab="tab16">{l s='Meta' mod='masseditproduct'}</li>
						<li data-tab="tab17">{l s='Reference' mod='masseditproduct'}</li>
						<li data-tab="tab18" data-action="create_products">{l s='Create products' mod='masseditproduct'}</li>
						<li data-tab="tab19">{l s='Customization fields' mod='masseditproduct'}</li>
					</ul>
				</div>
				<div class="col-md-10">
					<div class="tabs_content clearfix ">
						<h3 id="title_edit_tabs" class="panel-heading">{l s='Begin work with selected products' mod='masseditproduct'}</h3>
						<h3 id="title_create_tabs" class="panel-heading">{l s='Begin create products' mod='masseditproduct'}</h3>
						<div id="tab1">
							<div class="row">
								<label class="control-label col-lg-12">{l s='Action with categories' mod='masseditproduct'}</label>
								<div class="col-lg-8">
									<div class="btn-group btn-group-radio">
										<label for="action_with_category_add">
											<input type="radio" checked name="action_with_category" value="0" id="action_with_category_add"/>
											<span class="btn btn-default">{l s='Add selected' mod='masseditproduct'}</span>
										</label>
										<label for="action_with_category_delete">
											<input type="radio" name="action_with_category" value="1" id="action_with_category_delete"/>
											<span class="btn btn-default">{l s='Delete selected' mod='masseditproduct'}</span>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="control-label col-lg-12">
                                    {l s='Set categories for all products' mod='masseditproduct'}
								</label>
								<div class="col-lg-12 tree_custom_categories">
                                    {include file="./tree.tpl"
                                    categories=$categories
                                    id_category=Configuration::get('PS_ROOT_CATEGORY')
                                    root=true
                                    view_header=true
                                    multiple=true
                                    selected_categories=[]
                                    name='category[]'
                                    }
                                    {*<select name="category">*}
                                    {*{foreach from=$simple_categories item=category}*}
                                    {*<option value="{$category.id_category|intval}">{$category.name|escape:'quotes':'UTF-8'}</option>*}
                                    {*{/foreach}*}
                                    {*</select>*}
								</div>
							</div>
							<div class="row _action _action_add">
								<label class="control-label col-lg-12">
                                    {l s='Set default category for all products' mod='masseditproduct'}
								</label>
								<div class="col-lg-6">
									<select name="category_default"></select>
								</div>
							</div>
							<div class="row _action _action_add">
								<div class="col-lg-12">
									<input type="checkbox" name="remove_old_categories">
                                    {l s='Remove old categories' mod='masseditproduct'}
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setCategoryAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab2">
							<div class="row disabled_option_stage">
								<input checked type="checkbox" name="disabled[]" value="price" class="disable_option">
								<div class="col-lg-12">
									<div class="row">
										<label class="control-label col-lg-12 apply_change">{l s='Apply change for' mod='masseditproduct'}</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="change_for_product">
													<input type="radio" checked name="change_for" value="0" id="change_for_product"/>
													<span class="btn btn-default">{l s='Product' mod='masseditproduct'}</span>
												</label>
												<label for="change_for_combination">
													<input type="radio" name="change_for" value="1" id="change_for_combination"/>
													<span class="btn btn-default">{l s='Combination' mod='masseditproduct'}</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<script>
                                            var change_product = {literal}{{/literal}
                                                'title':'{l s='Apply change for price' mod='masseditproduct' js=true}',
                                                'base': '{l s='Base' mod='masseditproduct' js=true}',
                                                'final': '{l s='Final' mod='masseditproduct' js=true}'
                                                {literal}}{/literal};
                                            var change_combination = {literal}{{/literal}
                                                'title':'{l s='Apply change for impact on price' mod='masseditproduct' js=true}',
                                                'base': '{l s='tax excl.' mod='masseditproduct' js=true}',
                                                'final': '{l s='tax incl.' mod='masseditproduct' js=true}'
                                                {literal}}{/literal};
										</script>
										<label class="control-label col-lg-12">{l s='Apply change for price' mod='masseditproduct'}</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="type_price_base">
													<input type="radio" checked name="type_price" value="0" id="type_price_base"/>
													<span class="btn btn-default">{l s='Base' mod='masseditproduct'}</span>
												</label>
												<label for="type_price_final">
													<input type="radio" name="type_price" value="1" id="type_price_final"/>
													<span class="btn btn-default">{l s='Final' mod='masseditproduct'}</span>
												</label>
												<label for="type_price_wholesale">
													<input type="radio" name="type_price" value="2" id="type_price_wholesale"/>
													<span class="btn btn-default">{l s='Wholesale' mod='masseditproduct'}</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="control-label col-lg-12">{l s='What to do with price?' mod='masseditproduct'}</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="action_price_increase_percent">
													<input type="radio" checked name="action_price" value="1" id="action_price_increase_percent"/>
													<span class="btn btn-default">{l s='Increase on %' mod='masseditproduct'}</span>
												</label>
												<label for="action_price_increase">
													<input type="radio" name="action_price" value="2" id="action_price_increase"/>
													<span class="btn btn-default">{l s='Increase on value' mod='masseditproduct'}</span>
												</label>
												<label for="action_price_reduce_percent">
													<input type="radio" name="action_price" value="3" id="action_price_reduce_percent"/>
													<span class="btn btn-default">{l s='Reduce on %' mod='masseditproduct'}</span>
												</label>
												<label for="action_price_reduce">
													<input type="radio" name="action_price" value="4" id="action_price_reduce"/>
													<span class="btn btn-default">{l s='Reduce on value' mod='masseditproduct'}</span>
												</label>
												<label for="action_price_rewrite">
													<input type="radio" name="action_price" value="5" id="action_price_rewrite"/>
													<span class="btn btn-default">{l s='Rewrite' mod='masseditproduct'}</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="control-label col-lg-12">{l s='Write value' mod='masseditproduct'}</label>
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
									<label class="control-label col-lg-12 tax_rule">{l s='Tax rule group' mod='masseditproduct'}</label>
									<div class="col-lg-6">
										<select name="id_tax_rules_group"
                                                {if $tax_exclude_taxe_option}disabled="disabled"{/if} >
											<option value="0">{l s='No Tax' mod='masseditproduct'}</option>
                                            {foreach from=$tax_rules_groups item=tax_rules_group}
												<option value="{$tax_rules_group.id_tax_rules_group|escape:'quotes':'UTF-8'}">
                                                    {$tax_rules_group['name']|htmlentitiesUTF8|escape:'quotes':'UTF-8'}
												</option>
                                            {/foreach}
										</select>
										<br />
										<input type="checkbox" name="not_change_final_price">
										{l s='Not to change the final price' mod='masseditproduct'}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setPriceAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab3">
                            {if $advanced_stock_management}
								<div class="row">
									<label class="control-label col-lg-12">{l s='Management quantity in' mod='masseditproduct'}</label>
									<div class="col-lg-12">
										<div class="btn-group btn-group-radio">
											<label for="change_type_quantity">
												<input type="radio" name="change_type" value="quantity" id="change_type_quantity"/>
												<span class="btn btn-default">{l s='Shop' mod='masseditproduct'}</span>
											</label>
											<label for="change_type_warehouse">
												<input type="radio" name="change_type" value="warehouse" id="change_type_warehouse"/>
												<span class="btn btn-default">{l s='Warehouse' mod='masseditproduct'}</span>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="alert alert-info">
                                            {l s='If some of your products not uses advanced stock management, then these products will be skipped when changing the amount, If updated with the option Warehouses.' mod='masseditproduct'}
										</div>
									</div>
								</div>
                            {/if}
							<div class="row {if $advanced_stock_management}_type type_quantity type_warehouse{/if}">
								<label class="control-label col-lg-12">{l s='Apply change for' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="change_for_qty_product">
											<input type="radio" checked name="change_for_qty" value="0" id="change_for_qty_product"/>
											<span class="btn btn-default">{l s='Product' mod='masseditproduct'}</span>
										</label>
										<label for="change_for_qty_combination">
											<input type="radio" name="change_for_qty" value="1" id="change_for_qty_combination"/>
											<span class="btn btn-default">{l s='Combination' mod='masseditproduct'}</span>
										</label>
									</div>
								</div>
							</div>
							<div class="row {if $advanced_stock_management}_type type_quantity{/if}">
								<label class="control-label col-lg-12">{l s='What to do with quantity?' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="action_quantity_increase">
											<input type="radio" name="action_quantity" value="1" id="action_quantity_increase"/>
											<span class="btn btn-default">{l s='Increase on value' mod='masseditproduct'}</span>
										</label>
										<label for="action_quantity_reduce">
											<input type="radio" name="action_quantity" value="2" id="action_quantity_reduce"/>
											<span class="btn btn-default">{l s='Reduce on value' mod='masseditproduct'}</span>
										</label>
										<label for="action_quantity_rewrite">
											<input checked type="radio" name="action_quantity" value="3" id="action_quantity_rewrite"/>
											<span class="btn btn-default">{l s='Rewrite' mod='masseditproduct'}</span>
										</label>
									</div>
								</div>
							</div>
                            {if $advanced_stock_management}
								<div class="row _type type_warehouse">
									<label class="control-label col-lg-12">{l s='Select warehouse' mod='masseditproduct'}</label>
									<div class="col-lg-12">
										<select name="warehouse">
                                            {foreach from=$warehouses item=warehouse}
												<option value="{$warehouse.id_warehouse|intval}">{$warehouse.name|escape:'quotes':'UTF-8'}</option>
                                            {/foreach}
										</select>
									</div>
								</div>
								<div class="row _type type_warehouse">
									<label class="control-label col-lg-12">{l s='Action on stock' mod='masseditproduct'}</label>
									<div class="co-lg-12">
										<select name="action_warehouse">
											<option value="1">{l s='Increase in stock' mod='masseditproduct'}</option>
											<option value="0">{l s='Decrease in stock' mod='masseditproduct'}</option>
										</select>
									</div>
								</div>
                            {/if}
							<div class="row {if $advanced_stock_management}_type type_quantity type_warehouse{/if}">
								<input checked type="checkbox" name="disabled[]" value="quantity" class="disable_option">
								<label class="control-label col-lg-12">{l s='Write quantity' mod='masseditproduct'}</label>
								<div class="col-lg-4">
									<input type="text" name="quantity" value="0"/>
									<br />
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="minimal_quantity" class="disable_option">
								<label class="control-label col-lg-12">{l s='Minimum quantity' mod='masseditproduct'}</label>
								<div class="col-lg-4">
									<input type="text" name="minimal_quantity" value="0"/>
									<p class="help-block">{l s='The minimum quantity to buy this product (set to 1 to disable this feature)' mod='masseditproduct'}</p>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="available_now" class="disable_option">
								<label class="control-label col-lg-4 select-lang">{l s='Select language' mod='masseditproduct'}</label>
								<div class="col-lg-8">
									<div class="btn-group btn-group-radio">
										<label for="all_language_qty">
											<input type="radio" checked name="language_qty" value="0" id="all_language_qty"/>
											<span class="btn btn-default">{l s='For all' mod='masseditproduct'}</span>
										</label>
                                        {foreach from=$languages item=language}
											<label for="{$language.id_lang|intval}_language_qty">
												<input type="radio" name="language_qty" value="{$language.id_lang|intval}" id="{$language.id_lang|intval}_language_qty"/>
												<span class="btn btn-default">{$language.name|escape:'quotes':'UTF-8'}</span>
											</label>
                                        {/foreach}
									</div>
								</div>
								<label class="control-label col-lg-12 desc-label">{l s='Displayed text when in-stock' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<input type="text" name="available_now"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="available_later" class="disable_option">
								<label class="control-label col-lg-12 desc-label">{l s='Displayed text when backordering is allowed' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<input type="text" name="available_later"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="available_date" class="disable_option">
								<label class="control-label col-lg-12 desc-label">{l s='Availability date' mod='masseditproduct'}</label>
								<div class="col-lg-4">
									<div class="btn-group btn-group-radio">
										<label for="ad_for_product">
											<input type="radio" checked name="change_available_date" value="0" id="ad_for_product"/>
											<span class="btn btn-default">{l s='For product' mod='masseditproduct'}</span>
										</label>
										<label for="ad_for_pa">
											<input type="radio" checked name="change_available_date" value="1" id="ad_for_pa"/>
											<span class="btn btn-default">{l s='For combinations' mod='masseditproduct'}</span>
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
									<label class="control-label col-lg-3">{l s='When out of stock' mod='masseditproduct'}</label>
									<div class="col-lg-9">
										<p class="radio">
											<label id="label_out_of_stock_1" for="out_of_stock_1">
												<input type="radio" id="out_of_stock_1" name="out_of_stock" checked="checked" value="0" class="out_of_stock">
                                                {l s='Deny orders' mod='masseditproduct'}
											</label>
										</p>
										<p class="radio">
											<label id="label_out_of_stock_2" for="out_of_stock_2">
												<input type="radio" id="out_of_stock_2" name="out_of_stock" value="1" class="out_of_stock">
                                                {l s='Allow orders' mod='masseditproduct'}
											</label>
										</p>
										<p class="radio">
											<label id="label_out_of_stock_3" for="out_of_stock_3">
												<input type="radio" id="out_of_stock_3" name="out_of_stock" value="2" class="out_of_stock">
                                                {l s='Default' mod='masseditproduct'}:
                                                {if $pack_stock_type == 0}
                                                    {l s='Decrement pack only.'  mod='masseditproduct'}
                                                {elseif $pack_stock_type == 1}
                                                    {l s='Decrement products in pack only.'  mod='masseditproduct'}
                                                {else}
                                                    {l s='Decrement both.'  mod='masseditproduct'}
                                                {/if}
												<a class="confirm_leave" href="index.php?tab=AdminPPreferences&token=&amp;token={$token_preferences|not_filtered}">
                                                    {l s='as set in the Products Preferences page' mod='masseditproduct'}
												</a>
											</label>
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setQuantityAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab4">
							<div class="row">
								<label class="control-label col-lg-12">{l s='Set active for all products' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="is_active_disable">
											<input type="radio" checked name="is_active" value="-1" id="is_active_disable"/>
											<span class="btn btn-default">{l s='Do nothing' mod='masseditproduct'}</span>
										</label>
										<label for="is_active_on">
											<input type="radio" name="is_active" value="1" id="is_active_on"/>
											<span class="btn btn-default">{l s='Yes' mod='masseditproduct'}</span>
										</label>
										<label for="is_active_off">
											<input type="radio" name="is_active" value="0" id="is_active_off"/>
											<span class="btn btn-default">{l s='No' mod='masseditproduct'}</span>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<input checked="" type="checkbox" name="disabled[]" value="on_sale" class="disable_option">
								<label class="control-label col-xs-10">
									<input type="checkbox" name="on_sale" class="tab4-checkbox" value="1"/>
                                    {l s='Display the "on sale" icon on the product page, and in the text found within the product listing' mod='masseditproduct'}
								</label>
							</div>
							<div class="row">
								<label class="control-label col-lg-12">{l s='Visibility' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<select name="visibility">
										<option selected value="-1">{l s='Do nothing' mod='masseditproduct'}</option>
										<option value="both">{l s='Both' mod='masseditproduct'}</option>
										<option value="catalog">{l s='Only catalog' mod='masseditproduct'}</option>
										<option value="search">{l s='Only search' mod='masseditproduct'}</option>
										<option value="none">{l s='Nothing' mod='masseditproduct'}</option>
									</select>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="available_for_order,show_price,online_only" class="disable_option">
								<label class="control-label col-xs-12 options-label">{l s='Options' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<label class="col-xs-10">
										<input checked type="checkbox" name="available_for_order">
                                        {l s='Available for order' mod='masseditproduct'}
									</label>
									<label class="col-xs-10">
										<input checked disabled type="checkbox" name="show_price">
                                        {l s='Show price' mod='masseditproduct'}
									</label>
									<label class="col-xs-10">
										<input type="checkbox" name="online_only">
                                        {l s='Online only' mod='masseditproduct'}
									</label>
								</div>
							</div>
							<div class="row">
								<label class="control-label col-lg-12">{l s='Condition' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<select name="condition">
										<option selected value="-1">{l s='Do nothing' mod='masseditproduct'}</option>
										<option value="new">{l s='New' mod='masseditproduct'}</option>
										<option value="used">{l s='Used' mod='masseditproduct'}</option>
										<option value="refurbished">{l s='Refurbished' mod='masseditproduct'}</option>
									</select>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="delete_product" class="disable_option">
								<div class="col-lg-12">
									<label class="options-label">
										<input type="checkbox" name="delete_product">
                                        {l s='Delete selected product' mod='masseditproduct'}
									</label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setActiveAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab5">
							<div class="row">
								<label class="control-label col-lg-12">
                                    {l s='Set manufacturer for all products' mod='masseditproduct'}
								</label>
								<div class="col-lg-12">
									<select class="select2 select2manufacturer" name="id_manufacturer">
										<option value="0">-</option>
                                        {foreach from=$manufacturers item=manufacturer}
											<option value="{$manufacturer.id_manufacturer|intval}">{$manufacturer.name|escape:'quotes':'UTF-8'}</option>
                                        {/foreach}
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setManufacturerAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab6">
							<div class="row">
								<div class="select_products">
									<div class="search_row">
										<label>{l s='Write for search' mod='masseditproduct'}</label>
										<input class="search_product" type="text"/>
									</div>
									<div class="search_row">
										<div class="row">
											<div class="col-lg-12">
												<div class="btn-group btn-group-radio">
													<label for="search_by_name">
														<input type="radio" checked="" name="search_by" value="name" id="search_by_name">
														<span class="btn btn-default">{l s='Search by name' mod='masseditproduct'}</span>
													</label>
													<label for="search_by_reference">
														<input type="radio" name="search_by" value="reference" id="search_by_reference">
														<span class="btn btn-default">{l s='Search by reference' mod='masseditproduct'}</span>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="search_row">
										<div class="left_column">
											<label>{l s='Select from list' mod='masseditproduct'}</label>
											<select class="no_selected_product" multiple></select>
											<input class="add_select_product btn-default btn" value="{l s='Add in select products' mod='masseditproduct'}" type="button"/>
										</div>
										<div class="right_column">
											<label>{l s='Selected' mod='masseditproduct'}</label>
											<select name="accessories[]" class="selected_product" multiple></select>
											<input class="remove_select_product btn-default btn" value="{l s='Remove from select products' mod='masseditproduct'}" type="button"/>
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
								<label class="control-label col-lg-12">{l s='Remove old?' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="remove_old_yes">
											<input type="radio" checked="" name="remove_old" value="1" id="remove_old_yes">
											<span class="btn btn-default">{l s='Yes' mod='masseditproduct'}</span>
										</label>
										<label for="remove_old_no">
											<input type="radio" name="remove_old" value="0" id="remove_old_no">
											<span class="btn btn-default">{l s='No' mod='masseditproduct'}</span>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setAccessoriesAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab7">
							<div class="row">
								<input checked="" type="checkbox" name="disabled[]" value="supplier" class="disable_option">
								<label class="control-label col-lg-12">{l s='Select suppliers' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<select multiple name="supplier[]">
                                        {if is_array($suppliers) && count($suppliers)}
                                            {foreach from=$suppliers item=supplier}
												<option value="{$supplier.id_supplier|intval}">{$supplier.name|escape:'quotes':'UTF-8'}</option>
                                            {/foreach}
                                        {/if}
									</select>
								</div>
							</div>
							<div class="row">
								<input checked="" type="checkbox" name="disabled[]" value="id_supplier_default" class="disable_option">
								<label class="control-label col-lg-12">{l s='Select supplier default' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<select name="id_supplier_default"></select>
								</div>
							</div>
							<div class="row">
								<input checked="" type="checkbox" name="disabled[]" value="supplier_reference" class="disable_option">
								<label class="control-label col-lg-12">{l s='Supplier reference(s)' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<table class="table">
										<thead>
										<tr>
											<th><span class="title_box">{l s='Suppliers' mod='masseditproduct'}</span></th>
											<th><span class="title_box">{l s='Supplier reference' mod='masseditproduct'}</span></th>
											<th><span class="title_box">{l s='Unit price tax excluded' mod='masseditproduct'}</span></th>
											<th><span class="title_box">{l s='Unit price currency' mod='masseditproduct'}</span></th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>
												<select multiple name="suppliers_sr[]">
                                                    {if is_array($suppliers) && count($suppliers)}
                                                        {foreach from=$suppliers item=supplier}
															<option value="{$supplier.id_supplier|intval}">{$supplier.name|escape:'quotes':'UTF-8'}</option>
                                                        {/foreach}
                                                    {/if}
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
                                                    {foreach $currencies AS $currency}
														<option value="{$currency['id_currency']|intval}"
                                                                {if $currency['id_currency'] == $id_default_currency}selected="selected"{/if}
														>{$currency['name']|escape:'quotes':'UTF-8'}</option>
                                                    {/foreach}
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
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab8">
							<div class="row disabled_option_stage">
								<input checked="" type="checkbox" name="disabled[]" value="specific_price" class="disable_option">
								<div class="col-lg-12">
									<div class="row">
										<label class="control-label col-lg-12 apply_change_tab8">{l s='Action' mod='masseditproduct'}</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="change_for_sp_add">
													<input type="radio" checked name="action_for_sp" value="0" id="change_for_sp_add"/>
													<span class="btn btn-default">{l s='Add' mod='masseditproduct'}</span>
												</label>
												<label for="change_for_sp_delete">
													<input type="radio" name="action_for_sp" value="1" id="change_for_sp_delete"/>
													<span class="btn btn-default">{l s='Delete' mod='masseditproduct'}</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="control-label col-lg-12 apply_change_tab8">{l s='Apply change for' mod='masseditproduct'}</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="change_for_sp_product">
													<input type="radio" checked name="change_for_sp" value="0" id="change_for_sp_product"/>
													<span class="btn btn-default">{l s='Product' mod='masseditproduct'}</span>
												</label>
												<label for="change_for_sp_combination">
													<input type="radio" name="change_for_sp" value="1" id="change_for_sp_combination"/>
													<span class="btn btn-default">{l s='Combination' mod='masseditproduct'}</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="control-label col-lg-12 apply_change2"">{l s='For' mod='masseditproduct'}</label>
										<div class="col-lg-12">
											<div class="col-lg-4">
												<select name="sp_id_currency">
													<option value="0">{l s='All currencies' mod='masseditproduct'}</option>
                                                    {if is_array($currencies) && count($currencies)}
                                                        {foreach from=$currencies item=currency}
															<option value="{$currency.id_currency|intval}">{$currency.name|escape:'quotes':'UTF-8'}</option>
                                                        {/foreach}
                                                    {/if}
												</select>
											</div>
											<div class="col-lg-4">
												<select name="sp_id_country">
													<option value="0">{l s='All countries' mod='masseditproduct'}</option>
                                                    {if is_array($countries) && count($countries)}
                                                        {foreach from=$countries item=country}
															<option value="{$country.id_country|intval}">{$country.country|escape:'quotes':'UTF-8'}</option>
                                                        {/foreach}
                                                    {/if}
												</select>
											</div>
											<div class="col-lg-4">
												<select name="sp_id_group">
													<option value="0">{l s='All groups' mod='masseditproduct'}</option>
                                                    {if is_array($groups) && count($groups)}
                                                        {foreach from=$groups item=group}
															<option value="{$group.id_group|intval}">{$group.name|escape:'quotes':'UTF-8'}</option>
                                                        {/foreach}
                                                    {/if}
												</select>
											</div>
											<input name="sp_id_product_attribute" value="0" type="hidden"/>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<label class="control-label col-sm-2 col-md-1">{l s='From' mod='masseditproduct'}</label>
											<div class="col-sm-8">
												<input class="col-xs-6 datepicker" name="sp_from" type="text"/>
											</div>
										</div>
										<div class="col-xs-6">
											<label class="control-label col-sm-2 col-md-1">{l s='To' mod='masseditproduct'}</label>
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
                                            currentText: '{l s='Now' mod='masseditproduct' js=true}',
                                            closeText: '{l s='Done' mod='masseditproduct' js=true}',
                                            ampm: false,
                                            amNames: ['AM', 'A'],
                                            pmNames: ['PM', 'P'],
                                            timeFormat: 'hh:mm:ss tt',
                                            timeSuffix: '',
                                            timeOnlyTitle: '{l s='Choose Time' mod='masseditproduct' js=true}',
                                            timeText: '{l s='Time' mod='masseditproduct' js=true}',
                                            hourText: '{l s='Hour' mod='masseditproduct' js=true}',
                                            minuteText: '{l s='Minute' mod='masseditproduct' js=true}'
                                        });
									</script>
									<div class="row">
										<label class="control-label col-lg-12">{l s='Begin from quantity' mod='masseditproduct'}</label>
										<div class="col-lg-3">
											<input name="sp_from_quantity" value="1" type="text"/>
										</div>
									</div>
									<div class="row">
										<label class="control-label col-lg-12">{l s='Product price (tax excl.)' mod='masseditproduct'}</label>
										<div class="col-lg-12">
											<div class="col-lg-4">
												<input type="text" disabled class="specific_price_price" name="price"
													   value="-1">
											</div>
											<div class="col-lg-8">
												<input type="checkbox" name="leave_base_price" class="leave_base_price" checked>
                                                {l s='Leave base price' mod='masseditproduct'}
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<label class="control-label col-lg-12">{l s='Apply discount' mod='masseditproduct'}</label>
											<div class="col-lg-6">
												<div class="col-lg-3">
													<input name="sp_reduction" value="0" type="text"/>
												</div>
												<div class="col-lg-6">
													<select name="sp_reduction_type">
														<option selected>-</option>
														<option value="amount">{l s='Currency' mod='masseditproduct'}</option>
														<option value="percentage">{l s='Percent' mod='masseditproduct'}</option>
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
                                    {l s='Delete old discount' mod='masseditproduct'}
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setSpecificPriceAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab9">
							{if $feature_tab_html}
								{*{$feature_tab_html}*}
								<iframe id="seosaextendedfeatures"
									onload="$(this).parent().removeClass('loading'); initFeatures()"
									src="{$link->getAdminLink('AdminSeoSaExtendedFeatures')|not_filtered}&id_product=-1&updateproduct">
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

											$(this).find('.delete_option_feature').after('<span class="string_delete_old">{l s='Delete old' mod='masseditproduct' js=true}</span>');
										});
										$('.delete_option_feature', window.parent.frames['seosaextendedfeatures'].contentWindow.document).trigger('change');
                                    }
								</script>
                            {else}
							<div class="row header_table">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">{l s='Feature' mod='masseditproduct'}</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">{l s='Available values' mod='masseditproduct'}</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">{l s='Other value' mod='masseditproduct'}</div>
							</div>
							<div class="list_features">
                                {foreach from=$features item=feature}
                                    {include file="./row_feature.tpl"}
                                {/foreach}
							</div>
                            {if $total_features > $count_feature_view}
								<a class="view_more_features" href="#">
                                    {l s='More' mod='masseditproduct'}
									(<span class="counter">{($total_features - $count_feature_view)|intval}</span>)
								</a>
                            {/if}
							{/if}
							<div class="row">
								<div class="col-lg-12">
									<button id="setFeaturesAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
							<script type="text/javascript">
                                var allowEmployeeFormLang = {$allowEmployeeFormLang|intval};
                                var languages = {$languages|json_encode};
                                var id_language = {$default_form_language|intval};

                                function initLanguages()
                                {
                                    {if $smarty.const._PS_VERSION_ < 1.6}
                                    displayFlags(languages, id_language, allowEmployeeFormLang);
                                    {else}
                                    hideOtherLanguage({$default_form_language|intval});
                                    {literal}
                                    $(".textarea-autosize").autosize();
                                    {/literal}
                                    {/if}
                                }

                                initLanguages();

                                var feature_pages = [];
                                var total_features = {$total_features|intval};
                                var count_feature_view = {$count_feature_view|intval};
                                for (var i = 2; i <= Math.ceil(total_features/count_feature_view); i++)
                                    feature_pages.push(i);
							</script>
						</div>
						<div id="tab10">
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="width" class="disable_option">
								<label class="control-label col-lg-12">{l s='Package width' mod='masseditproduct'}</label>
								<div class="col-lg-3">
									<input maxlength="14" name="width" value="0" type="text" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="height" class="disable_option">
								<label class="control-label col-lg-12">{l s='Package height' mod='masseditproduct'}</label>
								<div class="col-lg-3">
									<input maxlength="14" name="height" value="0" type="text" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="depth" class="disable_option">
								<label class="control-label col-lg-12">{l s='Package depth' mod='masseditproduct'}</label>
								<div class="col-lg-3">
									<input maxlength="14" name="depth" value="0" type="text" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="weight" class="disable_option">
								<div class="col-lg-4">
									<div class="form-group clearfix">
										<label class="control-label col-lg-12 apply_change_tab10">{l s='Package weight, apply change for' mod='masseditproduct'}</label>
										<div class="col-lg-12">
											<div class="btn-group btn-group-radio">
												<label for="weight_change_for_product">
													<input type="radio" checked name="weight_change_for_combination" value="0" id="weight_change_for_product"/>
													<span class="btn btn-default">{l s='Product' mod='masseditproduct'}</span>
												</label>
												<label for="weight_change_for_combination">
													<input type="radio" name="weight_change_for_combination" value="1" id="weight_change_for_combination"/>
													<span class="btn btn-default">{l s='Combination' mod='masseditproduct'}</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group clearfix">
										<label class="control-label col-lg-12">{l s='Value' mod='masseditproduct'}</label>
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
								<label class="control-label col-lg-12">{l s='Additional shipping fees (for a single item)' mod='masseditproduct'}</label>
								<div class="col-lg-3">
									<input name="additional_shipping_cost" value="0" type="text" onchange="this.value = this.value.replace(/,/g, '.');"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="id_carrier" class="disable_option">
								<label class="control-label col-lg-12">{l s='Available carriers' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<ul class="available_carrier">
                                        {if is_array($carriers) && count($carriers)}
                                            {foreach from=$carriers item=carrier}
												<li>
													<input type="checkbox" name="id_carrier[{$carrier.id_reference|intval}]" value="{$carrier.id_reference|intval}"> {$carrier.name|escape:'quotes':'UTF-8'}
												</li>
                                            {/foreach}
                                        {/if}
									</ul>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setDeliveryAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab11">
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="disable_image" class="disable_option">
								<div class="row">
									<label class="control-label col-lg-12">{l s='Apply change for' mod='masseditproduct'}</label>
									<div class="col-lg-12">
										<div class="btn-group btn-group-radio">
											<label for="change_for_product_image">
												<input type="radio" checked name="change_for_img" value="0" id="change_for_product_image"/>
												<span class="btn btn-default">{l s='Product' mod='masseditproduct'}</span>
											</label>
											<label for="change_for_combination_image">
												<input type="radio" name="change_for_img" value="1" id="change_for_combination_image"/>
												<span class="btn btn-default">{l s='Combination' mod='masseditproduct'}</span>
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
                                            {l s='Add image' mod='masseditproduct'}
										</button>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 checkbox-delete">
										<input type="checkbox" name="delete_images">
                                        {l s='Delete old images about products' mod='masseditproduct'}
									</div>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="disable_image_caption" class="disable_option">
								<div class="form-group">
									<label class="control-label col-lg-1">
				<span class="label-tooltip" data-toggle="tooltip"
					  title="{l s='Update all captions at once, or select the position of the image whose caption you wish to edit. Invalid characters: %s'|sprintf:'<>;=#{}' mod='masseditproduct'}">
					{l s='Caption' mod='masseditproduct'}
				</span>
									</label>
									<div class="col-lg-5">
                                        {foreach from=$languages item=language}
                                            {if $languages|count > 1}
												<div class="translatable-field row lang-{$language.id_lang|intval}">
												<div class="col-lg-8">
                                            {/if}
											<input type="text" id="legend_{$language.id_lang|intval}"{if isset($input_class)} class="{$input_class|escape:'html':'UTF-8'}"{/if} name="legend_{$language.id_lang|intval}" data-lang="{$language.id_lang|intval}" value=""/>
											<br /><span>{l s='If other language an empty caption for him will be removed' mod='masseditproduct'}</span>
                                            {if $languages|count > 1}
												</div>
												<div class="col-lg-2" style="margin-top: 15px;">
													<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                                        {$language.iso_code|escape:'html':'UTF-8'}
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu">
                                                        {foreach from=$languages item=language}
															<li>
																<a href="javascript:hideOtherLanguage({$language.id_lang|intval});">{$language.name|escape:'html':'UTF-8'}</a>
															</li>
                                                        {/foreach}
													</ul>
												</div>
												</div>
                                            {/if}
                                        {/foreach}
									</div>
									<div class="col-lg-3" id="caption_selection">
										<select name="id_caption">
											<option value="0">{l s='All captions' mod='masseditproduct'}</option>
										</select>
									</div>
									<div class="col-lg-3 checkbox-delete" style="line-height: 36px;padding: 0 10px;padding-top: 0 !important">
										<input type="checkbox" name="delete_captions">
                                        {l s='Delete old captions' mod='masseditproduct'}
									</div>
								</div>
								<div class="col-lg-12">
									<button type="button" class="btn btn-default" onclick="$('[name^=legend]:visible').insertAtCaret('{literal}{name}{/literal}');">
										name product
									</button>
									<button type="button" class="btn btn-default" onclick="$('[name^=legend]:visible').insertAtCaret('{literal}{manufacturer}{/literal}');">
										manufacturer
									</button>
									<button type="button" class="btn btn-default" onclick="$('[name^=legend]:visible').insertAtCaret('{literal}{category}{/literal}');">
										default category
									</button>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setImageAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab12">
							<div class="row">
								<label class="control-label col-lg-4 select-lang">{l s='Select language' mod='masseditproduct'}</label>
								<div class="col-lg-8">
									<div class="btn-group btn-group-radio">
										<label for="all_language">
											<input type="radio" checked name="language" value="0" id="all_language"/>
											<span class="btn btn-default">{l s='For all' mod='masseditproduct'}</span>
										</label>
                                        {foreach from=$languages item=language}
											<label for="{$language.id_lang|intval}_language">
												<input type="radio" name="language" value="{$language.id_lang|intval}" id="{$language.id_lang|intval}_language"/>
												<span class="btn btn-default">{$language.name|escape:'quotes':'UTF-8'}</span>
											</label>
                                        {/foreach}
									</div>
								</div>
							</div>
							<div class="row">

								<input checked type="checkbox" name="disabled[]" value="product_name" class="disable_option">
								<label class="control-label col-lg-12 label-meta">{l s='Name' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<input class="form-control" name="name">
								</div>
                                {capture name='foo'}{$variables_for_name=$variables}{$variables_for_name.static=$static_for_name}{/capture}
                                {include file="./row_variables.tpl" name='name' variables=$variables_for_name}
							</div>
                            {include file="./copy_row.tpl" field='description_short'}
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="description_short" class="disable_option">
								<label class="control-label col-lg-12 desc-label">{l s='Short description' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<textarea class="editor_html" name="description_short"></textarea>
								</div>
                                {include file="./row_variables_description.tpl" name='description_short'}
							</div>
                            {include file="./copy_row.tpl" field='description'}
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="description" class="disable_option">
								<label class="control-label col-lg-12 desc-label">{l s='Description' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<textarea class="editor_html" name="description"></textarea>
								</div>
                                {include file="./row_variables_description.tpl" name='description'}
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setDescriptionAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab13">
							<div class="row">
								<div class="col-lg-12">
									<input checked type="checkbox" name="disabled[]" value="selected_attributes" class="disable_option">
									<label class="control-label col-lg-12">{l s='Delete combinations, which match attributes' mod='masseditproduct'}</label>
								</div>
								<div class="col-lg-12">
									<div class="row row_attributes">
                                        {if is_array($attribute_groups) && count($attribute_groups)}
											<div class="col-lg-3">
												<select name="attribute_group">
                                                    {foreach from=$attribute_groups item=attribute_group}
														<option value="{$attribute_group.id_attribute_group|escape:'quotes':'UTF-8'}">{$attribute_group.name|escape:'quotes':'UTF-8'}</option>
                                                    {/foreach}
												</select>
											</div>

                                            {foreach from=$attribute_groups item=attribute_group}
                                                {if isset($attribute_group.attributes) && count($attribute_group.attributes)}
													<div class="col-lg-3" id="attribute_group_{$attribute_group.id_attribute_group|intval}">
														<select name="attributes">
                                                            {foreach from=$attribute_group.attributes item=attribute}
																<option value="{$attribute.id_attribute|intval}">{$attribute.name|escape:'quotes':'UTF-8'}</option>
                                                            {/foreach}
														</select>
													</div>
                                                {/if}
                                            {/foreach}
											<div class="col-lg-4">
												<button class="btn btn-success addAttribute">
													<i class="icon-plus"></i>
                                                    {l s='Add attribute' mod='masseditproduct'}
												</button>
												<input type="hidden" name="selected_attributes" value="">
											</div>
                                        {/if}
									</div>
									<div class="row">
										<div class="selected_attributes col-lg-6">
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="row">
										<label class="control-label col-lg-12">{l s='Exact Match' mod='masseditproduct'}
											<input type="checkbox" name="exact_match">
										</label>
										<div class="col-lg-12">
											<div class="alert alert-info">
                                                {l s='Search exact match. In combinations of products in this case must be the same set of attributes that you have chosen' mod='masseditproduct'}
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<input checked type="checkbox" name="disabled[]" value="delete_attribute" class="disable_option">
									<label class="control-label col-lg-12">{l s='Delete attribute from combinations' mod='masseditproduct'}</label>
								</div>
								<div class="col-lg-12">
									<div class="row row_attributes">
                                        {if is_array($attribute_groups) && count($attribute_groups)}
											<div class="col-lg-3">
												<select name="attribute_group">
                                                    {foreach from=$attribute_groups item=attribute_group}
														<option value="{$attribute_group.id_attribute_group|escape:'quotes':'UTF-8'}">{$attribute_group.name|escape:'quotes':'UTF-8'}</option>
                                                    {/foreach}
												</select>
											</div>
                                            {foreach from=$attribute_groups item=attribute_group}
                                                {if isset($attribute_group.attributes) && count($attribute_group.attributes)}
													<div class="col-lg-3 delete_attribute" id="attribute_group_{$attribute_group.id_attribute_group|intval}">
														<select name="delete_attribute">
                                                            {foreach from=$attribute_group.attributes item=attribute}
																<option value="{$attribute.id_attribute|intval}">{$attribute.name|escape:'quotes':'UTF-8'}</option>
                                                            {/foreach}
														</select>
													</div>
                                                {/if}
                                            {/foreach}
                                        {/if}
									</div>
								</div>
								<div class="col-lg-12">
									<label class="control-label col-lg-12">
										<input type="checkbox" name="force_delete_attribute" value="1">
                                        {l s='Force delete attribute from combinations' mod='masseditproduct'}
									</label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<input checked type="checkbox" name="disabled[]" value="add_attribute" class="disable_option">
									<label class="control-label col-lg-12">{l s='Add attribute in combinations' mod='masseditproduct'}</label>
								</div>
								<div class="col-lg-12">
									<div class="row row_attributes">
                                        {if is_array($attribute_groups) && count($attribute_groups)}
											<div class="col-lg-3">
												<select name="attribute_group">
                                                    {foreach from=$attribute_groups item=attribute_group}
														<option value="{$attribute_group.id_attribute_group|escape:'quotes':'UTF-8'}">{$attribute_group.name|escape:'quotes':'UTF-8'}</option>
                                                    {/foreach}
												</select>
											</div>
                                            {foreach from=$attribute_groups item=attribute_group}
                                                {if isset($attribute_group.attributes) && count($attribute_group.attributes)}
													<div class="col-lg-3 add_attribute" id="attribute_group_{$attribute_group.id_attribute_group|intval}">
														<select name="add_attribute">
                                                            {foreach from=$attribute_group.attributes item=attribute}
																<option value="{$attribute.id_attribute|intval}">{$attribute.name|escape:'quotes':'UTF-8'}</option>
                                                            {/foreach}
														</select>
													</div>
                                                {/if}
                                            {/foreach}
                                        {/if}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setRuleCombinationAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab14">
							<div class="form-group">
								<label class="control-label col-lg-2 required">{l s='Filename' mod='masseditproduct'}</label>
								<div class="col-lg-9">
                                    {include file="./input_text_lang.tpl" input_name='filename' languages=$languages required=true maxlength=32}
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">
                                    {l s='Description' mod='masseditproduct'}
								</label>
								<div class="col-lg-9">
                                    {include file="./input_text_lang.tpl" input_name='description' languages=$languages}
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-11 align-center">
							<span data-attachment-file class="btn btn-default wrap_file_input">
								<span class="label_input">
									{l s='Select file' mod='masseditproduct'}
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
												<label>{l s='Select from list' mod='masseditproduct'}</label>
												<select class="no_selected_product" multiple>
                                                    {if is_array($attachments) && count($attachments)}
                                                        {foreach from=$attachments item=attachment}
															<option value="{$attachment.id_attachment|escape:'quotes':'UTF-8'}">{$attachment.name|escape:'quotes':'UTF-8'}</option>
                                                        {/foreach}
                                                    {/if}
												</select>
												<input class="add_select_product btn btn-default" value="{l s='Add in select products' mod='masseditproduct'}" type="button"/>
											</div>
											<div class="right_column">
												<label>{l s='Selected' mod='masseditproduct'}</label>
												<select name="attachments[]" class="selected_product" multiple></select>
												<input class="remove_select_product btn btn-default" value="{l s='Remove from select products' mod='masseditproduct'}" type="button"/>
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
                                    {l s='Delete old attachment' mod='masseditproduct'}
								</label>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<button id="setAttachmentAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
                        {if $advanced_stock_management}
						<div id="tab15">
							<div class="form-group" {if $product->is_virtual}style="display:none;"{/if} class="row stockForVirtualProduct">
								<div class="col-lg-9 col-lg-offset-3">
									<p class="checkbox">
										<label for="advanced_stock_management">
											<input type="checkbox" id="advanced_stock_management" name="advanced_stock_management" class="advanced_stock_management"/>
                                            {l s='I want to use the advanced stock management system for this product.' mod='masseditproduct'}
										</label>
									</p>
								</div>
							</div>

							<div class="form-group stockForVirtualProduct">
								<label class="control-label col-lg-3" for="depends_on_stock_1">{l s='Available quantities' mod='masseditproduct'}</label>
								<div class="col-lg-9">
									<p class="radio">
										<label for="depends_on_stock_1">
											<input type="radio" id="depends_on_stock_1" name="depends_on_stock" class="depends_on_stock"  value="1"
														checked="checked"
														disabled="disabled"
											/>
                                            {l s='The available quantities for the current product and its combinations are based on the stock in your warehouse (using the advanced stock management system). ' mod='masseditproduct'}
										</label>
									</p>
									<p class="radio">
										<label for="depends_on_stock_0" for="depends_on_stock_0">
											<input type="radio"  id="depends_on_stock_0" name="depends_on_stock" class="depends_on_stock" value="0"
												   checked="checked"
											/>
                                            {l s='I want to specify available quantities manually.' mod='masseditproduct'}
										</label>
									</p>
								</div>
							</div>
								<div class="form-group">
									<div class="col-lg-12">
										<button id="setAdvancedStockManagementAllProduct" class="btn btn-default">
											<span>{l s='Apply' mod='masseditproduct'}</span>
										</button>
									</div>
								</div>
						</div>
                        {/if}
						<div id="tab16">
							<div class="row">
								<label class="control-label col-lg-12">{l s='Select language' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="all_language_meta">
											<input type="radio" checked name="language_meta" value="0" id="all_language_meta"/>
											<span class="btn btn-default">{l s='For all' mod='masseditproduct'}</span>
										</label>
                                        {foreach from=$languages item=language}
											<label for="{$language.id_lang|intval}_language_meta">
												<input type="radio" name="language_meta" value="{$language.id_lang|intval}" id="{$language.id_lang|intval}_language_meta"/>
												<span class="btn btn-default">{$language.name|escape:'quotes':'UTF-8'}</span>
											</label>
                                        {/foreach}
									</div>
								</div>
							</div>
							<div class="row">

								<input checked type="checkbox" name="disabled[]" value="meta_title" class="disable_option">
								<label class="control-label col-lg-12 label-meta">{l s='Meta title' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<input class="form-control" name="meta_title">
								</div>
                                {include file="./row_variables.tpl" name='meta_title'}
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="meta_keywords" class="disable_option">
								<label class="control-label col-lg-12 label-meta">{l s='Meta keywords' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<input class="form-control" name="meta_keywords">
								</div>
                                {include file="./row_variables.tpl" name='meta_keywords'}
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="meta_description" class="disable_option">
								<label class="control-label col-lg-12 label-meta">{l s='Meta description' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<input class="form-control" name="meta_description">
								</div>
                                {include file="./row_variables.tpl" name='meta_description'}
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="tags" class="disable_option">
								<label class="control-label col-lg-12 label-metat">{l s='Tags' mod='masseditproduct'}</label>
								<div class="row">
									<div class="col-lg-12">
										<div class="btn-group btn-group-radio">
											<label for="add_tags">
												<input type="radio" checked name="edit_tags" value="0" id="add_tags"/>
												<span class="btn btn-default">{l s='Add tags' mod='masseditproduct'}</span>
											</label>
											<label for="add_del_tags">
												<input type="radio" name="edit_tags" value="1" id="add_del_tags"/>
												<span class="btn btn-default">{l s='Add and delete old tags' mod='masseditproduct'}</span>
											</label>
											<label for="del_tags">
												<input type="radio" name="edit_tags" value="2" id="del_tags"/>
												<span class="btn btn-default">{l s='Delete tags' mod='masseditproduct'}</span>
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
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab17">
							<div class="row">
								<label class="control-label col-lg-12">{l s='Apply change for' mod='masseditproduct'}</label>
								<div class="col-lg-12">
									<div class="btn-group btn-group-radio">
										<label for="change_for_product_property">
											<input type="radio" checked name="change_for_property" value="0" id="change_for_product_property"/>
											<span class="btn btn-default">{l s='Product' mod='masseditproduct'}</span>
										</label>
										<label for="change_for_combination_property">
											<input type="radio" name="change_for_property" value="1" id="change_for_combination_property"/>
											<span class="btn btn-default">{l s='Combination' mod='masseditproduct'}</span>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="selected_reference" class="disable_option">
								<label class="control-label col-lg-12">
                                    {l s='Reference code' mod='masseditproduct'}
								</label>
								<div class="col-lg-12">
									<input class="" name="reference" type="text"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="selected_ean13" class="disable_option">
								<label class="control-label col-lg-12">
                                    {l s='EAN-13 or JAN barcode' mod='masseditproduct'}
								</label>
								<div class="col-lg-12">
									<input class="" maxlength="13" name="ean13" type="text"/>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="selected_upc" class="disable_option">
								<label class="control-label col-lg-12">
                                    {l s='UPC barcode' mod='masseditproduct'}
								</label>
								<div class="col-lg-12">
									<input class="" maxlength="12" name="upc" type="text"/>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setReferenceAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab18">
							{$form_create_products|not_filtered}
							<div id="product-prices" class="panel product-tab">
								<div class="form-group">
									<label class="control-label col-lg-2" for="unit_price">
										<span class="label-tooltip" data-toggle="tooltip" title="{l s='When selling a pack of items, you can indicate the unit price for each item of the pack. For instance, "per bottle" or "per pound".' mod='masseditproduct'}">{l s='Unit price (tax excl.)' mod='masseditproduct'}</span>
									</label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-addon">{$currency2->prefix|not_filtered}{$currency2->suffix|not_filtered}</span>
											<input id="unit_price" name="unit_price" type="text" value="" maxlength="27"/>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="createProducts" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
						<div id="tab19">
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="delete_customization_fields" class="disable_option">
								<div class="col-lg-12">
									<input type="checkbox" name="delete_customization_fields">
                                    {l s='Delete old customization fields' mod='masseditproduct'}
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="customization_file_labels" class="disable_option">
								<div class="col-lg-12">
									<div id="customization_fields_0" class="customization_file_labels clearfix">
                                        {include file="./customization_field.tpl" type=0 counter=0 languages=$languages}
									</div>
									<div class="form-group clearfix">
										<div class="col-lg-12">
											<input type="button" class="btn btn-default addFileLabel" value="{l s='Add file label' mod='masseditproduct'}">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<input checked type="checkbox" name="disabled[]" value="customization_text_labels" class="disable_option">
								<div class="col-lg-12">
									<div id="customization_fields_1" class="customization_text_labels clearfix">
                                        {include file="./customization_field.tpl" type=1 counter=0 languages=$languages}
									</div>
									<div class="form-group clearfix">
										<div class="col-lg-12">
											<input type="button" class="btn btn-default addTextLabel" value="{l s='Add text label' mod='masseditproduct'}">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button id="setCustomizationAllProduct" class="btn btn-default">
										<span>{l s='Apply' mod='masseditproduct'}</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel mode_edit">
			<h3 class="panel-heading">{l s='Selected products' mod='masseditproduct'}</h3>
			<div class="row table_selected_products">
                {include file="./products.tpl" without_product=true}
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
        $('#'+input_id).tagify({ delimiters: [13,44], addTagPrompt: "{l s='Add tag' mod='masseditproduct'}" });
        $('#setMetaAllProduct').live('click', function() {
            $(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
        });
    });
</script>