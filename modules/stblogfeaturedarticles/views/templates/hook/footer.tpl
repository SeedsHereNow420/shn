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
{if isset($blog_categories) && count($blog_categories)}
    {foreach $blog_categories as $p_c}
        {if (isset($p_c.blogs) && is_array($p_c.blogs)) || $p_c.aw_display_fot}
        <section id="blog_categories_footer_{$hook_hash}" class="blog_categories_footer footer_block block {if $p_c.hide_mob_fot == 1} hidden-md-down {elseif $p_c.hide_mob_fot == 2} hidden-lg-up {/if} {if !isset($is_stacked_footer) || !$is_stacked_footer}col-lg-{if $p_c.footer_wide}{$p_c.footer_wide}{else}3{/if}{/if}">
            <div class="title_block">
                {if $p_c.link}<a href="{$p_c.link}" title="{$p_c.name}" class="title_block_inner">{else}<div class="title_block_inner">{/if}
                {$p_c.name}
                {if $p_c.link}</a>{else}</div>{/if}
                <div class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></div>
            </div>
            <div class="footer_block_content">
            {if isset($p_c.blogs) && is_array($p_c.blogs) && $p_c.blogs|count}
                <div class="base_list_line line_free">
                {foreach $p_c.blogs as $blog}
                    {include file="module:stblog/views/templates/slider/simple.tpl"}
                {/foreach}
                </div>
            {else}
                <p>{l s='No posts' d='Shop.Theme.Transformer'}</p>
            {/if}
            </div>
        </section>
        {/if}
    {/foreach}
{/if}