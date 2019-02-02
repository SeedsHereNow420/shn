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
<section class="{if $hide_mob == 1} hidden-md-down {elseif $hide_mob == 2} hidden-lg-up {/if} pcomment_footer {if !isset($is_stacked_footer) || !$is_stacked_footer}col-lg-{if $footer_wide}{$footer_wide}{else}3{/if}{/if} footer_block block">
    <div class="title_block">
        <a href="{url entity='module' name='stproductcomments' controller='list'}" title="{l s='Testimonial' d='Shop.Theme.Transformer'}" class="title_block_inner">{l s='Testimonial' d='Shop.Theme.Transformer'}</a>
        <div class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></div>
    </div>
    <div class="style_content footer_block_content">
        <div class="base_list_line large_list">
        {foreach $pcomments as $node}
            {include file='module:stproductcomments/views/templates/hook/pcomments_item.tpl' list_item=1}
        {/foreach}
        </div>
    </div>
</section>