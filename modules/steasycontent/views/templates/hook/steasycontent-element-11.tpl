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
{foreach $sub_column['elements'] as $element}
    <div id="steasy_element_{$element.id_st_easy_content_element}" class="steasy_divider steasy_divider_{$element.st_el_divider} flex_container {if $element.st_el_hide_on_mobile == 1} hidden-md-down {elseif $element.st_el_hide_on_mobile == 2} hidden-lg-up {/if}">
        {if $element.st_text_align!=1}<div class="steasy_divider_item flex_child"></div>{/if}
        {if $element.st_text}
        <div class="steasy_divider_text">
            {$element.st_text nofilter}
        </div>
    	{if $element.st_text_align!=2}<div class="steasy_divider_item flex_child"></div>{/if}
        {/if}
    </div>
{/foreach}   