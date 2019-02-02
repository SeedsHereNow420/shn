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

{foreach from=$pagination.pages item="page"}
{if $page.type === 'next' && $page.clickable}
<div class="text-center infinite-box mar_b6 m-t-1">
  <a class="infinite-more-link btn btn-default btn-large {if $sttheme.infinite_scroll==1} hidden {/if}" data-start="{$pagination.items_shown_from}" href="{$page.url}" rel="nofollow {$smarty.now}">{l s='Load More Products' d='Shop.Theme.Transformer'}</a>
</div>
{/if}
{/foreach}
<div class="product_count_infinite fs_md text-center mb-3">
{l s='Showing %from%-%to% of %total% item(s)' d='Shop.Theme.Catalog' sprintf=['%from%' => "<span>{$pagination.items_shown_from}</span>" ,'%to%' => $pagination.items_shown_to, '%total%' => $pagination.total_items]}
</div>