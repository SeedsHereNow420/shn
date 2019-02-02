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
{if isset($stsocial) && $stsocial}
{if !isset($share_url)}{assign var='share_url' value=$urls.current_url}{/if}
{if !isset($share_name)}{assign var='share_name' value=$page.meta.title}{/if}
	<div class="social_share_block social_size_{$social_links_size} flex_container flex_left">
	{foreach $stsocial as $v}
		{if $v.sidebar && $v.url && $v.url_key}
		    <a href="{$v.url}?{$v.url_key}={$share_url|urlencode}{if $v.name_key}&{$v.name_key}={$share_name|urlencode}{/if}" class="social_share_item social_share_{$v.id_st_social} {if $v.item} social_share_{$v.item} {/if} {if $v.hide_on_mobile == 1} hidden-md-down {elseif $v.hide_on_mobile == 2} hidden-lg-up {/if}" title="{$v.title}" target="_blank" rel="nofollow"><i class="{$v.icon_class}"></i></a>
		{/if}
	{/foreach}
	</div>
{/if}