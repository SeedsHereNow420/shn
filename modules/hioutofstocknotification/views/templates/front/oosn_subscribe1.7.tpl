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

{extends file='customer/page.tpl'}
{block name='page_title'}
  {l s='Out of stock subscriptions' mod='hioutofstocknotification'}
{/block}
{block name='page_content'}
    {if !empty($subscribe_db_resaul)}
        <table class="table table-bordered stock-management-on" id="cart_summary">
            <thead>
                <tr>
                    <th>{l s='Image' mod='hioutofstocknotification'}</th>
                    <th>{l s='Description' mod='hioutofstocknotification'}</th>
                    <th>{l s='Date' mod='hioutofstocknotification'}</th>
                    <th>{l s='Email' mod='hioutofstocknotification'}</th>
                    <th>{l s='Action' mod='hioutofstocknotification'}</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$subscribe_db_resaul item=res}
                    <tr class="subscribe_item_{$res.stock_id|intval}">
                        <input type="hidden" name="id_subscribe" value="{$res.stock_id|intval}">
                        <td class="cart_product">
                            <a href="{$res.stock_pr_link|escape:'htmlall':'UTF-8'}" title="{$res.stock_pr_name|escape:'htmlall':'UTF-8'}">
                                <img src="{$res.stock_pr_img|escape:'htmlall':'UTF-8'}" />
                            </a>
                        </td>
                        <td class="cart_description" >
                            <p class="product-name">
                                <a href="{$res.stock_pr_link|escape:'htmlall':'UTF-8'}" title="{$res.stock_pr_name|escape:'htmlall':'UTF-8'}">
                                    {$res.stock_pr_name|escape:'htmlall':'UTF-8'|truncate:20:"...":true}
                                </a>
                            </p>
                            <small class="cart_ref">{l s='SKU:' mod='hioutofstocknotification'} {$res.stock_pr_reference|escape:'htmlall':'UTF-8'}</small><br/>
                            {if $res.stock_pr_comb_name != ''}
                                <small>
                                    <a href="{$res.stock_pr_link|escape:'htmlall':'UTF-8'}" title="{$res.stock_pr_name|escape:'htmlall':'UTF-8'}">
                                    {foreach from=$res.stock_pr_comb_name item= attr}
                                        {$attr.group_name|escape:'htmlall':'UTF-8'}:
                                        {$attr.attribute_name|escape:'htmlall':'UTF-8'}
                                    {/foreach}
                                    </a>
                                </small>
                            {/if}
                        </td>
                        <td>{$res.stock_subscr_date|escape:'htmlall':'UTF-8'}</td>
                        <td>{$res.email|escape:'htmlall':'UTF-8'}</td>
                        <td class="cart_delete text-center">
                            <a href="{$res.stock_pr_link|escape:'htmlall':'UTF-8'}" class="view_subscribes" title="{l s='View' mod='hioutofstocknotification'}">
                               <i class="material-icons">view_compact</i>
                            </a>
                            <a href="#" class="delete_subscribe_product" title="{l s='Delete' mod='hioutofstocknotification'}">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <p class="alert alert-warning">{l s='No products' mod='hioutofstocknotification'}</p>
    {/if}
{/block}

