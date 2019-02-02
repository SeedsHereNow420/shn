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

{extends file="helpers/form/form.tpl"}

{block name="field"}
    {$smarty.block.parent}
    {if $input.name == 'short_description'}
        <label class="control-label col-lg-3"  style="margin-top: 10px;">
            {l s='Length of text' mod='dgridproducts'}
        </label>
        <div class="col-lg-9" style="margin-top: 10px;">
            <input type="text" name="lenght_short_desc" value="{$fields_value['lenght_short_desc']}" class="fixed-width-xs">
            <p class="help-block">
                {l s='number of characters including spaces' mod='dgridproducts'}
            </p>
        </div>
    {/if}
    {if $input.name == 'description'}
        <label class="control-label col-lg-3"  style="margin-top: 10px;">
            {l s='Length of text' mod='dgridproducts'}
        </label>
        <div class="col-lg-9" style="margin-top: 10px;">
            <input type="text" name="lenght_desc" value="{$fields_value['lenght_desc']}" class="fixed-width-xs">
            <p class="help-block">
                {l s='number of characters including spaces' mod='dgridproducts'}
            </p>
        </div>
    {/if}
{/block}