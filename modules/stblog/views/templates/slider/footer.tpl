{*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if isset($blogs) && $blogs}
<section id="{$module}_footer_{$hook_hash}" class="{$module}_footer footer_block block {if $hide_mob == 1} hidden-md-down {elseif $hide_mob == 2} hidden-lg-up {/if}{if !isset($is_stacked_footer) || !$is_stacked_footer} col-lg-{if $footer_wide}{$footer_wide}{else}3{/if}{/if}">
    <div class="title_block">
        {if (isset($title_link) && $title_link) || (isset($url_entity) && $url_entity)}
        <a href="{if isset($title_link) && $title_link}{$title_link}{else}{url entity=$url_entity}{/if}" class="title_block_inner" title="{$title}">{$title}</a>
        {else}
        <div class="title_block_inner">{$title}</div>
        {/if}
        <div class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></div>
    </div>
    <div class="footer_block_content">
    {if is_array($blogs) && $blogs|count}
        <div class="base_list_line medium_list">
        {foreach $blogs as $blog}
            {include file="module:stblog/views/templates/slider/simple.tpl"}
        {/foreach}
        </div>
    {else}
        <p class="warning">{l s='No posts' d='Shop.Theme.Transformer'}</p>
    {/if}
    </div>
</section>
{/if}