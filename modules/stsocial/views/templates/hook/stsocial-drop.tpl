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
<div class="top_bar_item dropdown_wrap pro_right_item">
    <div class="dropdown_tri dropdown_tri_in header_item {if isset($classname)} {$classname} {/if}">
        {if $social_label==0 || $social_label==2}<i class="fto-share-1{if $social_label==0} mar_r4 {/if}"></i>{/if}{if $social_label==0 || $social_label==1}{l s='Share' d='Shop.Theme.Transformer'}{/if}<i class="fto-angle-down arrow_down arrow"></i><i class="fto-angle-up arrow_up arrow"></i>
    </div>
    <div class="dropdown_list">
        <div class="dropdown_box">
        {if isset($pro_share_drop)}
            {include file="module:stsocial/views/templates/hook/stsocial.tpl" share_url=$product.url share_name=$product.name}
        {else}
            {include file="module:stsocial/views/templates/hook/stsocial.tpl" share_url=$urls.current_url share_name=$page.meta.title}
        {/if}
        </div>
    </div>
</div>
{/if}