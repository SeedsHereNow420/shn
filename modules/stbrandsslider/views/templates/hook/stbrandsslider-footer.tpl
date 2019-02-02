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
<!-- Brand slider footer -->
<section id="st_brand_slider-footer_{$hook_hash}" class="block col-sm-12 col-md-3">
    <div class="title_block"><div class="title_block_inner">{l s='Product Brands' d='Shop.Theme.Transformer'}</div><a href="javascript:;" class="opener dlm">&nbsp;</a></div>
    <div class="footer_block_content">
    {if is_array($brands) && $brands|count}
    <ul class="pro_column_list base_list_line medium_list">
        {foreach $brands as $brand}
        <li class="clearfix line_item pro_column_box">
            <div class="pro_column_left">
            <a href="{$brand.url}" title="{$brand.name}">
                <img src="{$brand.image}" alt="{$brand.name}" width="{$manufacturerSize.width}" height="{$manufacturerSize.height}" class="replace-2x" />
            </a>
            </div>
			<div class="pro_column_right">
				<h4 class="s_title_block nohidden"><a href="{$brand.url}" title="{$brand.name}">{$brand.name|truncate:50:'...'}</a></h4></span>
            </div>
        </li>
        {/foreach}
    </ul>
    {else}
        <p class="warning">{l s='No product Brands' d='Shop.Theme.Transformer'}</p>
    {/if}
    </div>
</section>
<!-- /Brand slider footer  -->