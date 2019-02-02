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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div class="flex_container flex_start">
	{if isset($element.st_image) && $element.st_image}
		<div class="steasy_textboxes_image m-r-1">
			<img src="{if $element.st_image|strpos:'/modules/' !== false}{$element.st_image}{else}{$easy_image_path|cat:$element.st_image}{/if}" class="easy_image" alt="{if $element.st_el_header}{$element.st_el_header}{/if}">
		</div>
	{/if}
	<div class="flex_child">
		{if isset($element.st_el_header) && $element.st_el_header}<h6 class="easy_header mar_b4">{$element.st_el_header}</h6>{/if}
		{if isset($element.st_el_sub_header) && $element.st_el_sub_header}<div class="mar_b1 easy_sub_header">{$element.st_el_sub_header}</div>{/if}
		{if $element.st_el_stars}
		<div class="testimonial_stars stars_box m-b-1 fs_lg">
			{for $foo=1 to 5}
			<i class="fto-star-2 {if $foo<=$element.st_el_stars} star_on {else} star_off {/if}"></i>
			{/for}
		</div>
		{/if}
		{if isset($element.st_el_text) && $element.st_el_text}<div class="easy_text {if isset($element.st_el_text_style) && $element.st_el_text_style}{$element.st_el_text_style}{/if}">{$element.st_el_text nofilter}</div>{/if}
		{if isset($element.st_el_info) && $element.st_el_info}<div class="mar_b1 easy_additional_info">{$element.st_el_info}</div>{/if}
		{if isset($element.st_el_url) && $element.st_el_url}<a href="{$element.st_el_url}" title="{if $element.st_el_button}{$element.st_el_button}{else}{l s='Read more' d='Shop.Theme.Transformer'}{/if}" class="btn btn-link easy_link" rel="nofollow">{if $element.st_el_button}{$element.st_el_button}{else}{l s='Read more' d='Shop.Theme.Transformer'}{/if}</a>{/if}
	</div>
</div>