{*
* 2007-2017 PrestaShop
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}

<a href="{if $link.url}{$link.url}{else}javascript:;{/if}" class="dropdown_list_item {if isset($link_extra_classes)} {$link_extra_classes} {/if}" title="{$link.title|strip_tags:false}" {if isset($link.nofollow) && $link.nofollow} rel="nofollow" {/if} {if $link.new_window} target="_blank" {/if}>
    {if $link.icon_class}<i class="{$link.icon_class} {if $link.label} list_arrow {/if} st_custom_link_icon"></i>{/if}{$link.label}
</a>
    