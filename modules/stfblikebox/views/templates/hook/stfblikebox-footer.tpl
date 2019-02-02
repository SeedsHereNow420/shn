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
{if isset($st_lb_url) && $st_lb_url}
<section id="facebook_like_box_footer" class="{if !isset($is_stacked_footer) || !$is_stacked_footer}col-lg-{if $st_fb_lb_wide_on_footer}{$st_fb_lb_wide_on_footer}{else}3{/if}{/if} block footer_block">
    <div class="title_block">
        <div class="title_block_inner">{l s='Facebook' d='Shop.Theme.Transformer'}</div>
        <div class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></div>
    </div>

    <div class="footer_block_content fb_like_box_warp">
        <div class="fb-page" data-href="{$st_lb_url}"{if $st_lb_height} data-height="{$st_lb_height}"{/if} data-small-header="{if $st_lb_small_header}true{else}false{/if}" data-adapt-container-width="true" data-hide-cover="{if $st_lb_hide_cover}true{else}false{/if}" data-show-facepile="{if $st_lb_face}true{else}false{/if}" data-show-posts="{if $st_lb_stream}true{else}false{/if}"></div>
        <div id="fb-root"></div>
        <script>
        //<![CDATA[
        {literal}
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/{/literal}{$st_lb_locale}{literal}/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        {/literal} 
        //]]>
        </script>
    </div>
</section>
{/if}