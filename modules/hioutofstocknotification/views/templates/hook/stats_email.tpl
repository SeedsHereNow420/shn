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

<table cellspacing=15>
	{foreach from=$get_subscribe_product item= product name=products}
		{if $smarty.foreach.products.index % 3 == 0}
			<tr>
		{/if}
		<td style="border:1px solid #d6d4d4; padding: 15px;text-align: center"; margin-right:16px;>
            <div>
                <a href="{$product['product_link']|escape:'html':'UTF-8'}" >
                    <img src="{$protocol|escape:'html':'UTF-8'}{$product['product_img']|escape:'html':'UTF-8'}" alt="{$product['id_product']|escape:'html':'UTF-8'}"/>
                </a>
            </div>
            <div>
                <a href="{$product['product_link']|escape:'html':'UTF-8'}" >{$product['name']|escape:'html':'UTF-8'}</a>
                {if $type_day_count}
                    <span style="display: block;"> {l s='Subscribers count: ' mod='hioutofstocknotification'} {$product['product_count']|escape:'html':'UTF-8'}</span>
                {else}
                    <span style="display: block;"> {l s='Subscriber email: ' mod='hioutofstocknotification'} {$subscriber_email|escape:'html':'UTF-8'}</span>
                {/if}
            </div>
        </td>
        {if $smarty.foreach.products.index % 3 == 0 && $smarty.foreach.products.index != 0}
			</tr>
		{/if}
	{/foreach}
</table>
