{*
* 2007-2012 PrestaShop
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
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 17677 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if isset($blogs)}
    {assign var='blog_grid_per_xl' value=Configuration::get('STSN_BLOG_GRID_PER_XL_0')}
    {assign var='blog_grid_per_lg' value=Configuration::get('STSN_BLOG_GRID_PER_LG_0')}
    {assign var='blog_grid_per_md' value=Configuration::get('STSN_BLOG_GRID_PER_MD_0')}
    {assign var='blog_grid_per_sm' value=Configuration::get('STSN_BLOG_GRID_PER_SM_0')}
    {assign var='blog_grid_per_xs' value=Configuration::get('STSN_BLOG_GRID_PER_XS_0')}
    {assign var='blog_grid_per_xxs' value=Configuration::get('STSN_BLOG_GRID_PER_XXS_0')}
	<!-- Blogs list -->
	<ul class="blog_list_grid row blog_list clearfix">
	{foreach $blogs as $blog}
        {math equation="(total%perLine)" total=$blog@total perLine=$blog_grid_per_xl assign=totModuloLarge}
        {math equation="(total%perLine)" total=$blog@total perLine=$blog_grid_per_lg assign=totModuloDesktop}
        {math equation="(total%perLine)" total=$blog@total perLine=$blog_grid_per_md assign=totModulo}
        {math equation="(total%perLine)" total=$blog@total perLine=$blog_grid_per_sm assign=totModuloTablet}
        {math equation="(total%perLine)" total=$blog@total perLine=$blog_grid_per_xs assign=totModuloMobile}
        {math equation="(total%perLine)" total=$blog@total perLine=$blog_grid_per_xxs assign=totModuloPortrait}
        {if $totModuloLarge == 0}{assign var='totModuloLarge' value=$blog_grid_per_xl}{/if}
        {if $totModuloDesktop == 0}{assign var='totModuloDesktop' value=$blog_grid_per_lg}{/if}
        {if $totModulo == 0}{assign var='totModulo' value=$blog_grid_per_md}{/if}
        {if $totModuloTablet == 0}{assign var='totModuloTablet' value=$blog_grid_per_sm}{/if}
        {if $totModuloMobile == 0}{assign var='totModuloMobile' value=$blog_grid_per_xs}{/if}
        {if $totModuloPortrait == 0}{assign var='totModuloPortrait' value=$blog_grid_per_xxs}{/if}
		<li class="block_blog col-xl-{(12/$blog_grid_per_xl)|replace:'.':'-'} col-lg-{(12/$blog_grid_per_lg)|replace:'.':'-'} col-md-{(12/$blog_grid_per_md)|replace:'.':'-'} col-sm-{(12/$blog_grid_per_sm)|replace:'.':'-'} col-{(12/$blog_grid_per_xs)|replace:'.':'-'} col-xxs-{(12/$blog_grid_per_xxs)|replace:'.':'-'}  {if $blog@iteration%$blog_grid_per_xl == 0} last-item-of-large-line{elseif $blog@iteration%$blog_grid_per_xl == 1} first-item-of-large-line{/if}{if $blog@iteration > ($blog@total - $totModuloLarge)} last-large-line{/if}{if $blog@index < $blog_grid_per_xl} first-large-line{/if}
        {if $blog@iteration%$blog_grid_per_lg == 0} last-item-of-desktop-line{elseif $blog@iteration%$blog_grid_per_lg == 1} first-item-of-desktop-line{/if}{if $blog@iteration > ($blog@total - $totModuloDesktop)} last-desktop-line{/if}{if $blog@index < $blog_grid_per_lg} first-desktop-line{/if}
        {if $blog@iteration%$blog_grid_per_md == 0} last-in-line{elseif $blog@iteration%$blog_grid_per_md == 1} first-in-line{/if}{if $blog@iteration > ($blog@total - $totModulo)} last-line{/if}{if $blog@index < $blog_grid_per_md} first-line{/if}
        {if $blog@iteration%$blog_grid_per_sm == 0} last-item-of-tablet-line{elseif $blog@iteration%$blog_grid_per_sm == 1} first-item-of-tablet-line{/if}{if $blog@iteration > ($blog@total - $totModuloTablet)} last-tablet-line{/if}{if $blog@index < $blog_grid_per_sm} first-tablet-line{/if}
        {if $blog@iteration%$blog_grid_per_xs == 0} last-item-of-mobile-line{elseif $blog@iteration%$blog_grid_per_xs == 1} first-item-of-mobile-line{/if}{if $blog@iteration > ($blog@total - $totModuloMobile)} last-mobile-line{/if}{if $blog@index < $blog_grid_per_xs} first-mobile-line{/if}
        {if $blog@iteration%$blog_grid_per_xxs == 0} last-item-of-portrait-line{elseif $blog@iteration%$blog_grid_per_xxs == 1} first-item-of-portrait-line{/if}{if $blog@iteration > ($blog@total - $totModuloPortrait)} last-portrait-line{/if}{if $blog@index < $blog_grid_per_xxs} first-portrait-line{/if}">
            {include file="module:stblog/views/templates/front/blogs-list-img.tpl"}
            <div>
                {include file="module:stblog/views/templates/front/blogs-list-info.tpl"}
            </div>
		</li>
	{/foreach}
	</ul>
	<!-- /Products list -->
{/if}