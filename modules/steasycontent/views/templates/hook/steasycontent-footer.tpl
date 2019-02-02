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
{if $easy_content|@count > 0}
    {foreach $easy_content as $ec}
    <section id="easycontent_{$ec.id_st_easy_content}" class="{if $ec.hide_on_mobile == 1} hidden-md-down {elseif $ec.hide_on_mobile == 2} hidden-lg-up {/if} easycontent {if !$ec.is_stacked_footer}col-lg-{if $ec.span}{$ec.span}{/if}{/if} footer_block block">
        {if $ec.title}
        <div class="title_block">
            {if $ec.url}<a href="{$ec.url}" class="title_block_inner" title="{$ec.title}">{else}<div class="title_block_inner">{/if}
            {$ec.title}
            {if $ec.url}</a>{else}</div>{/if}
            <div class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></div>
        </div>
        {/if}
    	<div class="style_content footer_block_content {if !$ec.title} keep_open{/if}  {if $ec.width} width_{$ec.width} {/if}">
            {if $ec.text}<div class="easy_brother_block text-{$ec.text_align} text-md-{$ec.mobile_text_align}">{$ec.text nofilter}</div>{/if}
            {if isset($ec.columns) && count($ec.columns)}{include file="module:steasycontent/views/templates/hook/steasycontent-columns.tpl" columns=$ec.columns}{/if}
    	</div>
    </section>
    {/foreach}
{/if}