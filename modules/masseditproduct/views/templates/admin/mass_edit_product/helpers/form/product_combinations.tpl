{*
* 2007-2016 PrestaShop
*
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

{if isset($combinations) && is_array($combinations) && count($combinations)}
    <input type="hidden" name="products[{$id_product|intval}][has_combination]" value="1"/>
    <div class="selector_container">
        <div class="selector_label">
            <a class="selector_list" href="#"><i class="icon-list"></i></a>
            <span class="selector_count">0</span>
            <span class="selector_all">
						<input name="pa_{$id_product|intval}" type="checkbox" class="selector_checkbox" data-selector-all value="1"/>
						<span class="checkbox_styler">{l s='all' mod='masseditproduct'}</span>
					</span>
        </div>
        <div class="selector_item">
            {foreach from=$combinations key=id_pa item=combination}
                <div>
                    <input name="{$id_product|intval}" data-selector-item="{$combination.id_product|intval}_{$id_pa|intval}" type="checkbox">
                    <span class="pa_attributes">
								{$combination.attributes|escape:'quotes':'UTF-8'},
							</span>
                    <span class="pa_quantity">
								{l s='qty' mod='masseditproduct'}: <span data-pa-quantity="{$id_pa|intval}"> {$combination.quantity|intval}</span>,
							</span>
                    <span class="pa_price">
								{l s='price' mod='masseditproduct'}: <span data-pa-total-price="{$id_pa|intval}">{displayPrice price=$combination.total_price currency=$currency}</span> [{l s='impact' mod='masseditproduct'} <span data-pa-price="{$id_pa|intval}">{displayPrice price=$combination.price currency=$currency}</span>],
							</span>
                    <span class="pa_price_final">
								{l s='price final' mod='masseditproduct'}: <span data-pa-total-price-final="{$id_pa|intval}">{displayPrice price=$combination.total_price_final currency=$currency} ({l s='incl tax' mod='masseditproduct'})</span> [{l s='impact' mod='masseditproduct'} <span data-pa-price-final="{$id_pa|intval}">{displayPrice price=$combination.price_final currency=$currency} ({l s='incl tax' mod='masseditproduct'})</span>]
							</span>
                </div>
            {/foreach}
        </div>
    </div>
{else}
    <input type="hidden" name="products[{$id_product|intval}][has_combination]" value="0"/>
{/if}