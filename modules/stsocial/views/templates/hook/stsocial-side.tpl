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
<div class="st-menu" id="side_share">
	<div class="st-menu-header">
		<h3 class="st-menu-title">{l s='Share' d='Shop.Theme.Transformer'}</h3>
    	<a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
	</div>
	<div id="share_side_box" class="pad_10">
		{if isset($stsocial) && $stsocial}
			<ul class="row">
			{foreach $stsocial as $v}
				{if $v.sidebar && $v.url && $v.url_key}
				    <li class="col-6 {if $v.hide_on_mobile == 1} hidden-md-down {elseif $v.hide_on_mobile == 2} hidden-lg-up {/if} text-center">
				    	<a href="{$v.url}?{$v.url_key}={$urls.current_url|urlencode}{if $v.name_key}&{$v.name_key}={$page.meta.title|urlencode}{/if}" class="social_share_item social_share_{$v.id_st_social} {if $v.item} social_share_{$v.item} {/if} " title="{$v.title}" target="_blank"><i class="{$v.icon_class}"></i></a>
				    	<a href="{$v.url}?{$v.url_key}={$urls.current_url|urlencode}{if $v.name_key}&{$v.name_key}={$page.meta.title|urlencode}{/if}" class="social_share_title" title="{$v.title}" target="_blank">{$v.title}</a>
				    </li>
				{/if}
			{/foreach}
			</ul>
		{/if}
	</div>
</div>
