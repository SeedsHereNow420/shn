{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{block name='header_banner'}
  {capture name="displayBanner"}{hook h="displayBanner"}{/capture}
  {if $smarty.capture.displayBanner}
  <div id="displayBanner" class="header-banner">
    {$smarty.capture.displayBanner nofilter}
  </div>
  {/if}
{/block}
{block name='mobile_header'}
{*similar code in the checkout/_partials/header.tpl*}
  <section id="mobile_bar" class="animated fast">
    <div class="container">
      <div id="mobile_bar_top" class="flex_container">
        {capture name="mobile_shop_logo"}
          <a class="mobile_logo" href="{$urls.base_url}" title="{$shop.name}">
              <img class="logo" src="{$shop.logo}" {if $sttheme.retina && $sttheme.retina_logo_src } srcset="{$sttheme.retina_logo_src} 2x"{/if} alt="{$shop.name}"{if isset($sttheme.st_logo_image_width) && $sttheme.st_logo_image_width} width="{$sttheme.st_logo_image_width}"{/if}{if isset($sttheme.st_logo_image_height) && $sttheme.st_logo_image_height} height="{$sttheme.st_logo_image_height}"{/if}/>
            </a>
        {/capture}
          <div id="mobile_bar_left">
            <div class="flex_container">
            	{if $sttheme.sticky_mobile_header%2!=0}
                  {$smarty.capture.mobile_shop_logo nofilter}
              	{/if}
                {hook h="displayMobileBarLeft"}
            </div>
          </div>
          <div id="mobile_bar_center" class="flex_child">
            <div class="flex_container {if $sttheme.sticky_mobile_header%2==0} flex_center {/if}">{*center content when logo is in center*}
            	{if $sttheme.sticky_mobile_header%2==0}
                  {$smarty.capture.mobile_shop_logo nofilter}
              	{/if}
              {hook h="displayMobileBarCenter"}
            </div>
          </div>
          <div id="mobile_bar_right">
            <div class="flex_container">{hook h="displayMobileBar"}</div>
          </div>
      </div>
      <div id="mobile_bar_bottom" class="flex_container">
        {hook h="displayMobileBarBottom"}
      </div>
    </div>
  </section>
{/block}
  {hook h='displayNavFullWidth'}

{block name='header_nav'}
  {capture name="displayNav1"}{hook h="displayNav1"}{/capture}
  {capture name="displayNav2"}{hook h="displayNav2"}{/capture}
  {capture name="displayNav3"}{hook h="displayNav3"}{/capture}
  {if $smarty.capture.displayNav1 || $smarty.capture.displayNav2 || $smarty.capture.displayNav3}
    <div id="top_bar" class="nav_bar {$sttheme.header_topbar_sep_type|default:'vertical-s'} {if !$sttheme.sticky_topbar} hide_when_sticky {/if}" >
      <div class="{if !$sttheme.fullwidth_topbar && $sttheme.responsive_max!=3}wide_container{/if}">
        <div id="top_bar_container" class="{if !$sttheme.fullwidth_topbar && $sttheme.responsive_max!=3}container{else}container-fluid{/if}">
          <div id="top_bar_row" class="flex_container">
            <nav id="nav_left" class="flex_float_left"><div class="flex_box">{$smarty.capture.displayNav1 nofilter}</div></nav>
            <nav id="nav_center" class="flex_float_center"><div class="flex_box">{$smarty.capture.displayNav3 nofilter}</div></nav>
            <nav id="nav_right" class="flex_float_right"><div class="flex_box">{$smarty.capture.displayNav2 nofilter}</div></nav>
          </div>
        </div>
      </div>
    </div>
  {/if}
{/block}
{block name='header_top'}
{*similar code in the checkout/_partials/header.tpl*}
  <div id="header_primary" class="{if !$sttheme.sticky_primary_header} hide_when_sticky {/if}">
    <div class="{if !$sttheme.fullwidth_header && $sttheme.responsive_max!=3}wide_container{/if}">
      <div id="header_primary_container" class="{if !$sttheme.fullwidth_header && $sttheme.responsive_max!=3}container{else}container-fluid{/if}">
        <div id="header_primary_row" class="flex_container {if !isset($sttheme.logo_position) || !$sttheme.logo_position} logo_left {else} logo_center {/if}">
        {capture name="displaySlogan1"}{hook h="displaySlogan1"}{/capture}
        {capture name="displaySlogan2"}{hook h="displaySlogan2"}{/capture}
        {capture name="shop_logo"}
        <div class="logo_box">
          <div class="slogan_horizon">
            <a class="shop_logo" href="{$urls.base_url}" title="{$shop.name}">
                <img class="logo" src="{$shop.logo}" {if $sttheme.retina && $sttheme.retina_logo_src } srcset="{$sttheme.retina_logo_src} 2x"{/if} alt="{$shop.name}"{if isset($sttheme.st_logo_image_width) && $sttheme.st_logo_image_width} width="{$sttheme.st_logo_image_width}"{/if}{if isset($sttheme.st_logo_image_height) && $sttheme.st_logo_image_height} height="{$sttheme.st_logo_image_height}"{/if}/>
            </a>
            {if $smarty.capture.displaySlogan1}<div class="slogan_box_beside">{$smarty.capture.displaySlogan1 nofilter}</div>{/if}
          </div>
          {if $smarty.capture.displaySlogan2}<div class="slogan_box_under">{$smarty.capture.displaySlogan2 nofilter}</div>{/if}
        </div>
        {/capture}
          <div id="header_left" class="">
            <div class="flex_container header_box {if $sttheme.header_left_alignment==1} flex_center {elseif $sttheme.header_left_alignment==2} flex_right {else} flex_left {/if}">
              {if !isset($sttheme.logo_position) || !$sttheme.logo_position}
                  {$smarty.capture.shop_logo nofilter}
              {/if}
              {if isset($HOOK_HEADER_LEFT) && $HOOK_HEADER_LEFT|trim}
                {$HOOK_HEADER_LEFT nofilter}
              {/if}
            </div>
          </div>
            <div id="header_center" class="">
              <div class="flex_container header_box {if $sttheme.header_center_alignment==1} flex_center {elseif $sttheme.header_center_alignment==2} flex_right {else} flex_left {/if}">
              {if isset($sttheme.logo_position) && $sttheme.logo_position}
                {$smarty.capture.shop_logo nofilter}
              {/if}
              {if isset($HOOK_HEADER_CENTER) && $HOOK_HEADER_CENTER|trim}
                  {$HOOK_HEADER_CENTER nofilter}
                {/if}
              </div>
            </div>
          <div id="header_right" class="">
            <div id="header_right_top" class="flex_container header_box {if $sttheme.header_right_alignment==1} flex_center {elseif $sttheme.header_right_alignment==2} flex_right {else} flex_left {/if}">
                {hook h='displayTop'}
            </div>
            {if isset($HOOK_HEADER_BOTTOM) && $HOOK_HEADER_BOTTOM|trim}
                <div id="header_right_bottom" class="flex_container header_box {if $sttheme.header_right_bottom_alignment==1} flex_center {elseif $sttheme.header_right_bottom_alignment==2} flex_right {else} flex_left {/if}">
                    {$HOOK_HEADER_BOTTOM nofilter}
                </div>
            {/if}
          </div>
        </div>
      </div>
    </div>
  </div>
{/block}
{block name='header_menu'}
  {capture name="displayMainMenu"}{hook h="displayMainMenu"}{/capture}
  {capture name="displayMainMenuWidget"}{hook h="displayMainMenuWidget"}{/capture}
  {assign var='has_widgets' value=0}
  {if isset($smarty.capture.displayMainMenuWidget) && $smarty.capture.displayMainMenuWidget|trim}{$has_widgets=1}{/if}
    {if (isset($smarty.capture.displayMainMenu) && $smarty.capture.displayMainMenu|trim) || $has_widgets}
    <section id="top_extra" class="main_menu_has_widgets_{$has_widgets}">
      {if !$sttheme.megamenu_width}<div class="wide_container boxed_megamenu">{/if}
      <div id="st_mega_menu_container" class="animated fast">
      <div class="container">
        <div id="top_extra_container" class="flex_container {if $sttheme.megamenu_position==1} flex_center {elseif $sttheme.megamenu_position==2} flex_right {/if}">
            {if isset($smarty.capture.displayMainMenu)}{$smarty.capture.displayMainMenu nofilter}{/if}
            {if $has_widgets}
              <div id="main_menu_widgets">
                <div class="flex_box">
                  {if isset($smarty.capture.displayMainMenuWidget)}{$smarty.capture.displayMainMenuWidget nofilter}{/if}
                </div>
              </div>
            {/if}
        </div>
      </div>
      </div>
      {if !$sttheme.megamenu_width}</div>{/if}
  </section>
  {/if}
{/block}