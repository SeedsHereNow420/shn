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
  {assign var='for_w' value='category'}
  {if isset($for_f) && $for_f}
    {$for_w=$for_f}
  {/if}
  {assign var='is_list' value=0}
  {if ($for_w=='category' && $category_layouts!=3) || (isset($display_as_grid) && ($display_as_grid==3 || $display_as_grid==4))}{$is_list=1}{/if}
  
  {if !$pro_per_fw}{$pro_per_fw=1}{/if}
  {if !$pro_per_xxl}{$pro_per_xxl=1}{/if}
  {if !$pro_per_xl}{$pro_per_xl=1}{/if}
  {if !$pro_per_lg}{$pro_per_lg=1}{/if}
  {if !$pro_per_md}{$pro_per_md=1}{/if}
  {if !$pro_per_sm}{$pro_per_sm=1}{/if}
  {if !$pro_per_xs}{$pro_per_xs=1}{/if}
  
  {assign var='nbLi' value=$blogs|@count}
  {assign var='nbLiNext' value=($nbLi+1)}
  {math equation="nbLi/nbItemsPerLineScreen" nbLi=$nbLi nbItemsPerLineScreen=$pro_per_fw assign=nbLinesScreen}
  {math equation="nbLi/nbItemsPerLineLarge" nbLi=$nbLi nbItemsPerLineLarge=$pro_per_xxl assign=nbLinesLarge}
  {math equation="nbLi/nbItemsPerLineDesktop" nbLi=$nbLi nbItemsPerLineDesktop=$pro_per_xl assign=nbLinesDesktop}
  {math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$pro_per_lg assign=nbLines}
  {math equation="nbLi/nbItemsPerLineTablet" nbLi=$nbLi nbItemsPerLineTablet=$pro_per_md assign=nbLinesTablet}
  {math equation="nbLi/nbItemsPerLineMobile" nbLi=$nbLi nbItemsPerLineMobile=$pro_per_sm assign=nbLinesMobile}
  {math equation="nbLi/nbItemsPerLinePortrait" nbLi=$nbLi nbItemsPerLinePortrait=$pro_per_xs assign=nbLinesPortrait}

  <div class="st_posts product_list {if $is_list} list {else} row grid {/if}">
    {foreach $blogs as $index => $blog}
    {assign var="curr_index" value=$index}
    {assign var="curr_iteration" value=$index+1}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_fw assign=totModuloScreen}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_xxl assign=totModuloLarge}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_xl assign=totModuloDesktop}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_lg assign=totModulo}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_md assign=totModuloTablet}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_sm assign=totModuloMobile}
    {math equation="(total%perLine)" total=$nbLi perLine=$pro_per_xs assign=totModuloPortrait}
    {if $totModuloScreen == 0}{assign var='totModuloScreen' value=$pro_per_fw}{/if}
    {if $totModuloLarge == 0}{assign var='totModuloLarge' value=$pro_per_xxl}{/if}
    {if $totModuloDesktop == 0}{assign var='totModuloDesktop' value=$pro_per_xl}{/if}
    {if $totModulo == 0}{assign var='totModulo' value=$pro_per_lg}{/if}
    {if $totModuloTablet == 0}{assign var='totModuloTablet' value=$pro_per_md}{/if}
    {if $totModuloMobile == 0}{assign var='totModuloMobile' value=$pro_per_sm}{/if}
    {if $totModuloPortrait == 0}{assign var='totModuloPortrait' value=$pro_per_xs}{/if}
      <div class="product_list_item {if $is_list} clearfix {else} col-fw-{(12/$pro_per_fw)|replace:'.':'-'} col-xxl-{(12/$pro_per_xxl)|replace:'.':'-'} col-xl-{(12/$pro_per_xl)|replace:'.':'-'} col-lg-{(12/$pro_per_lg)|replace:'.':'-'} col-md-{(12/$pro_per_md)|replace:'.':'-'} col-sm-{(12/$pro_per_sm)|replace:'.':'-'} col-{(12/$pro_per_xs)|replace:'.':'-'} {/if}
    {if $curr_iteration%$pro_per_fw == 0} last-item-of-screen-line{elseif $curr_iteration%$pro_per_fw == 1} first-item-of-screen-line{/if}{if $curr_iteration > ($nbLi - $totModuloScreen)} last-screen-line{/if}{if $curr_index < $pro_per_fw} first-screen-line{/if}
    {if $curr_iteration%$pro_per_xxl == 0} last-item-of-large-line{elseif $curr_iteration%$pro_per_xxl == 1} first-item-of-large-line{/if}{if $curr_iteration > ($nbLi - $totModuloLarge)} last-large-line{/if}{if $curr_index < $pro_per_xxl} first-large-line{/if}
    {if $curr_iteration%$pro_per_xl == 0} last-item-of-desktop-line{elseif $curr_iteration%$pro_per_xl == 1} first-item-of-desktop-line{/if}{if $curr_iteration > ($nbLi - $totModuloDesktop)} last-desktop-line{/if}{if $curr_index < $pro_per_xl} first-desktop-line{/if}
    {if $curr_iteration%$pro_per_lg == 0} last-in-line{elseif $curr_iteration%$pro_per_lg == 1} first-in-line{/if}{if $curr_iteration > ($nbLi - $totModulo)} last-line{/if}{if $curr_index < $pro_per_lg} first-line{/if}
    {if $curr_iteration%$pro_per_md == 0} last-item-of-tablet-line{elseif $curr_iteration%$pro_per_md == 1} first-item-of-tablet-line{/if}{if $curr_iteration > ($nbLi - $totModuloTablet)} last-tablet-line{/if}{if $curr_index < $pro_per_md} first-tablet-line{/if}
    {if $curr_iteration%$pro_per_sm == 0} last-item-of-mobile-line{elseif $curr_iteration%$pro_per_sm == 1} first-item-of-mobile-line{/if}{if $curr_iteration > ($nbLi - $totModuloMobile)} last-mobile-line{/if}{if $curr_index < $pro_per_sm} first-mobile-line{/if}
    {if $curr_iteration%$pro_per_xs == 0} last-item-of-portrait-line{elseif $curr_iteration%$pro_per_xs == 1} first-item-of-portrait-line{/if}{if $curr_iteration > ($nbLi - $totModuloPortrait)} last-portrait-line{/if}{if $curr_index < $pro_per_xs} first-portrait-line{/if}">
        {include file='module:stblog/views/templates/slider/post.tpl'}
      </div>
    {/foreach}
  </div>