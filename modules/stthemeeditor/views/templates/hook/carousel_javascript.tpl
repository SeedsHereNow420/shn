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
<script type="text/javascript">
//<![CDATA[
{literal}
jQuery(function($) { 
    var owl = $("#{/literal}{$identify}{literal}-itemslider .slides");
    owl.owlCarousel({
        {/literal}
        autoPlay: {if $slideshow}{$s_speed|default:5000}{else}false{/if},
        slideSpeed: {$a_speed},
        stopOnHover: {if $pause_on_hover}true{else}false{/if},
        lazyLoad: {if $lazy_load}true{else}false{/if},
        scrollPerPage: {if $move}1{else}false{/if},
        rewindNav: {if $rewind_nav}true{else}false{/if},
        navigation: {if $direction_nav}true{else}false{/if},
        pagination: {if $control_nav}true{else}false{/if},
        afterInit: productsSliderAfterInit,
        {literal}
        itemsCustom : [
            {/literal}
            {if $sttheme.responsive && !$sttheme.version_switching}
            {if $sttheme.responsive_max==2}{literal}[1420, {/literal}{$pro_per_xl}{literal}],{/literal}{/if}
            {if $sttheme.responsive_max>=1}{literal}[1180, {/literal}{$pro_per_lg}{literal}],{/literal}{/if}
            {literal}
            [972, {/literal}{$pro_per_md}{literal}],
            [748, {/literal}{$pro_per_sm}{literal}],
            [460, {/literal}{$pro_per_xs}{literal}],
            [0, {/literal}{$pro_per_xxs}{literal}]
            {/literal}{else}{literal}
            [0, {/literal}{if $sttheme.responsive_max==2}{$pro_per_xl}{elseif $sttheme.responsive_max==1}{$pro_per_lg}{else}{$pro_per_md}{/if}{literal}]
            {/literal}
            {/if}
            {literal} 
        ]
    });
});
{/literal} 
//]]>
</script>