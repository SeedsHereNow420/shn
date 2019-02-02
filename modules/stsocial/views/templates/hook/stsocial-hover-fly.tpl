{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{if $sttheme.flyout_share && isset($stsocial) && $stsocial}
	<div class="hover_fly_btn social_share_button" href="javascript:;" rel="nofollow" title="{l s='Share on social networks' d='Shop.Theme.Transformer'}">
		<div class="social_share_box">
			{strip}
			{foreach $stsocial as $v}
				{if $v.url && $v.url_key}
				<a href="{$v.url}?{$v.url_key}={$product.url|urlencode}{if $v.name_key}&{$v.name_key}={$product.name|urlencode}{/if}{if $v.image_key}&{$v.image_key}={$product.cover.bySize.home_default.url|urlencode}{/if}" class="social_share_item social_share_{$v.id_st_social} {if $v.item} social_share_{$v.item} {/if} {if $v.hide_on_mobile == 1} hidden-md-down {elseif $v.hide_on_mobile == 2} hidden-lg-up {/if}" rel="nofollow" title="{$v.title}" target="_blank"><i class="{$v.icon_class}"></i></a>
				{/if}
			{/foreach}
			{strip}
		</div>
		<div class="hover_fly_btn_inner"><i class="fto-share-1"></i><span>{l s='Share' d='Shop.Theme.Transformer'}</span></div>
	</div>
{/if}