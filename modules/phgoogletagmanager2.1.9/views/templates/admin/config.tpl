{**
* PrestaChamps
*
* NOTICE OF LICENSE
*
* This source file is subject to the Commercial License
* you can"t distribute, modify or sell this code
*
* DISCLAIMER
*
* Do not edit or add to this file
* If you need help please contact leo@prestachamps.com
*
* @author     PrestaChamps <leo@prestachamps.com>
* @copyright  PrestaChamps
*}
<form action="{$requesturi|escape:'htmlall':'UTF-8'}" method="post">
		<fieldset>
				<legend>{l s='Settings' mod='phgoogletagmanager'}</legend>

				<label>{l s='GoogleTagManager ID' mod='phgoogletagmanager'}</label>

				<div class="margin-form">
						<input type="text" name="ph_id_googletagmanager" value="{$ph_id_googletagmanager|escape:'htmlall':'UTF-8'}"/>

						<p class="clear">{l s='insert your Google Tag Manager ID ' mod='phgoogletagmanager'}</p>
				</div>

				<label>{l s='Adwords' mod='phgoogletagmanager'}</label>

				<div class="margin-form">
						<input type="checkbox" name="checkbox_adwords_params" {if $checkbox_adwords_params}checked="checked""{/if}/>
						<p class="clear">{l s='check if you want add adwords conversion' mod='phgoogletagmanager'}</p>
				</div>

				<label>{l s='Remarketing' mod='phgoogletagmanager'}</label>

				<div class="margin-form">
						<input type="checkbox" name="checkbox_remarketing_params"
											{if $checkbox_remarketing_params|escape:'htmlall':'UTF-8'}checked="checked"{/if}/>

						<p class="clear">{l s='check if you have an Adwords Remarketing Campaign' mod='phgoogletagmanager'}</p>
				</div>

				<label>{l s='Enhanced Ecommerce' mod='phgoogletagmanager'}</label>

				<div class="margin-form">
						<input type="checkbox" name="checkbox_enhanced_ecommerce"
													{if $checkbox_enhanced_ecommerce|escape:'htmlall':'UTF-8'}checked="checked"{/if} />

						<p class="clear">{l s='check if you want enable enhanced e-commerce in Google Analytics' mod='phgoogletagmanager'}</p>
				</div>


				<div class="margin-form">
						<input type="submit" name="submitGeneralSettings" value="{l s='save' mod='phgoogletagmanager'}"
													class="button"/>
				</div>
		</fieldset>
</form>
<br/>
<form action="{$requesturi|escape:'htmlall':'UTF-8'}" method="post">
		<fieldset>
				<legend>{l s='Adwords parameters' mod='phgoogletagmanager'}</legend>

				<label>{l s='Conversion ID' mod='phgoogletagmanager'}</label>

				<div class="margin-form">
						<input type="text" name="adwords_conversion_id" value="{$adwords_conversion_id|escape:'htmlall':'UTF-8'}"/>

						<p class="clear">{l s='insert your Adwords Conversion Id ' mod='phgoogletagmanager'}</p>
				</div>
				<label>{l s='Conversion Language' mod='phgoogletagmanager'}</label>

				<div class="margin-form">
						<input type="text" name="adwords_conversion_language" value="{$adwords_conversion_language|escape:'htmlall':'UTF-8'}"/>

						<p class="clear">{l s='insert your Adwords Conversion Language ' mod='phgoogletagmanager'}</p>
				</div>
				<label>{l s='Conversion Label' mod='phgoogletagmanager'}</label>

				<div class="margin-form">
						<input type="text" name="adwords_conversion_label" value="{$adwords_conversion_label|escape:'htmlall':'UTF-8'}"/>

						<p class="clear">{l s='insert your Adwords Conversion Label ' mod='phgoogletagmanager'}</p>
				</div>
				<div class="margin-form">
						<input type="submit" name="submitAdwordsParams" value="{l s='save' mod='phgoogletagmanager'}" class="button"/>
				</div>
		</fieldset>
</form>
<br/>
<form action="{$requesturi|escape:'htmlall':'UTF-8'}" method="post">
		<fieldset>
				<legend>{l s='Google Merchant parameters' mod='phgoogletagmanager'}</legend>

				<label>{l s='ID for Merchant Center' mod='phgoogletagmanager'}</label>

				<div class="margin-form">
						<select name="merchant_center_id">
								<option value="product_id" {if $merchant_center_id == 'product_id'}selected {/if}>product_id</option>
								<option value="product_reference" {if $merchant_center_id == 'product_reference'}selected {/if}>
										product_reference
								</option>
								<option value="product_upc" {if $merchant_center_id == 'product_upc'}selected {/if}>produc_upc</option>
								<option value="product_ean" {if $merchant_center_id == 'product_ean'}selected {/if}>produc_ean</option>
						</select>

						<p class="clear">{l s='insert your Adwords Conversion Id ' mod='phgoogletagmanager'}</p>
				</div>
				<div class="margin-form">
						<input type="submit" name="submitMerchantcenterParams" value="{l s='save' mod='phgoogletagmanager'}"
													class="button"/>
				</div>
		</fieldset>
</form>
