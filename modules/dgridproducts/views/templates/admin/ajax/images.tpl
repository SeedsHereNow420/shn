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
*  @author    SeoSA <885588@bk.ru>
*  @copyright 2012-2017 SeoSA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if isset($id_product_attribute)}<input name="id_product_attribute" class="dgp_product_attribute_image" value="{$id_product_attribute|intval}" type="hidden"/>{/if}
<input name="id_product" class="dgp_product_image" value="{$id_product|intval}" type="hidden"/>
<table class="table tableDnD" style="width: 100%;" id="imageTable">
	<thead>
		<th>{l s='Image' mod='dgridproducts'}</th>
		<th>{l s='Position' mod='dgridproducts'}</th>
		<th>{l s='Legend' mod='dgridproducts'}</th>
		{if isset($id_product_attribute)}
			<th>{l s='In combination' mod='dgridproducts'}</th>
		{else}
			<th>{l s='Cover' mod='dgridproducts'}</th>
		{/if}
		<th>{l s='Actions' mod='dgridproducts'}</th>
	</thead>
	<tbody class="dgp_images" id="imageList">
		{if is_array($images) && count($images)}
			{foreach from=$images item=image}
				<tr id="{$image.id_image|intval}" class="dgp_image_{$image.id_image|intval}">
					<td style="padding-right: 10px">{$image.mini|escape:'quotes':'UTF-8'}</td>
					<td id="td_{$image.id_image|intval}" class="pointer dragHandle center positionImage">
						<div class="dragGroup">
							<div class="positions">
								{$image.position|intval}
							</div>
						</div>
					</td>
					<td style="padding-right: 10px">
					{if isset($image.legend)}
						<div style="width: 70%; float: left;" data-translate="true">
							{foreach from=$languages item=l}
								<div {if !$l.is_default}style="display: none;" {/if} data-lang="{$l['id_lang']|intval}">
									<input data-image="{$image.id_image|intval}" value="{$image.legend[$l.id_lang]|escape:'quotes':'UTF-8'}" type="text" class="legend_image" name="legend[{$l['id_lang']|intval}]"/>
								</div>
							{/foreach}
						</div>
						<div style="width: 30%; float: left;">
							{if count($languages)}
							<select data-switcher-translate="true">
								{foreach from=$languages item=l}
									<option {if $l.is_default}selected{/if} value="{$l['id_lang']|intval}">{$l['iso_code']|escape:'quotes':'UTF-8'}</option>
								{/foreach}
							</select>
							{else}

							{/if}
						</div>
					{/if}
					</td>
					{if isset($id_product_attribute)}
						<td style="text-align: center;">
							<input data-image="{$image.id_image|intval}" data-pa="{$id_product_attribute|intval}" type="checkbox" {if in_array($image.id_image, $pa_images)}checked="checked"{/if} class="in_combination"/>
						</td>
					{else}
						<td>
							<a href="#"	data-image="{$image.id_image|intval}" data-value="{if $image.cover}1{else}0{/if}" class="set_cover">
								<img src="../img/admin/{if $image.cover}enabled{else}disabled{/if}.gif" alt="{if $image.cover}enabled{else}disabled{/if}.gif" title="{if $image.cover}enabled{else}disabled{/if}.gif">
							</a>
						</td>
					{/if}
					<td>
						<a href="#" data-image="{$image.id_image|intval}" class="delete_image button btn btn-default">
							<i class="icon-trash"></i> {l s='Delete' mod='dgridproducts'}
						</a>
					</td>
				</tr>
			{/foreach}
		{else}
		<tr class="none_images" {if is_array($images) && count($images)}style="display: none;"{else}style="display: block;"{/if}>
			<td colspan="4">{l s='Not images' mod='dgridproducts'}</td>
		</tr>
		{/if}
	</tbody>
</table>


<script type="text/javascript">
{literal}
$(document).ready(function(){
    initTableImages();
});
{/literal}
</script>

