{*
* 2013 - 2017 HiPresta
*
* MODULE Out Of Stock Notification
*
* @version   1.2.2
* @author    HiPresta <suren.mikaelyan@gmail.com>
* @link      http://www.hipresta.com
* @copyright HiPresta 2015
* @license   Addons PrestaShop license limitation
*
* NOTICE OF LICENSE
*
* Don't use this module on several shops. The license provided by PrestaShop Addons 
* for all its modules is valid only once for a single shop.
*}

{if $display_oosn && $order_out_of_stock}
	<div class="subscribe_form_content">
		{if $oosn_position == 'popup'}
			<a class="oosn-popup {if !$show_subscribe_form} hide {/if}" href="#oosn-popup-container">{l s='Subscribe To When In Stock' mod='hioutofstocknotification'}</a>
			<div id="oosn-popup-container" class="oosn-popup-container">
		{/if}
				<div id="hi-oosn-block" class="{if !$show_subscribe_form}hide{/if} clearfix">
					<span class="hi-oosn-title">{l s='Subscribe To When In Stock' mod='hioutofstocknotification'}</span>
					<div class="hi-oosn-email-content clearfix">
						<input type="text" name="hi_stock_email" {if $psv < 1.6} class="hi_stock_email_" {else} class="hi_stock_email" {/if} placeholder="{l s='Email' mod='hioutofstocknotification'}" {if $logged && $oosn_auto_fill_on} value="{$oosn_customer|escape:'htmlall':'UTF-8'}"{/if}>
						<button type="submit" class="oosn-button" id="submit_subscribe">
						</button>
						<input type="hidden" name="product_combination_id" value="{$id_combination}">
						<div class="hi-oosn-invalid-email hide">
							<div></div>
							<span></span>
						</div>
					</div>
				</div>
				<div class="{if $psv >= 1.6} alert alert-success {else} success {/if} hi-oosn-success hide">
					{l s='You have successfully subscribed to this product' mod='hioutofstocknotification'}
				</div>
		{if $oosn_position == "popup"}
			</div>
		{/if}
	</div>
{/if}
