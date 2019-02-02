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
{block name='checkout_mobile_header'}
  <section id="mobile_bar" class="animated fast">
    <div class="container">
      <div id="mobile_bar_top" class="flex_container">
          <div id="mobile_bar_left" class="flex_child">
            <a class="mobile_logo" href="{$urls.base_url}" title="{$shop.name}">
              <img class="logo" src="{$shop.logo}" {if $sttheme.retina && $sttheme.retina_logo_src } srcset="{$sttheme.retina_logo_src} 2x" {/if} alt="{$shop.name}"{if isset($sttheme.st_logo_image_width) && $sttheme.st_logo_image_width} width="{$sttheme.st_logo_image_width}"{/if}{if isset($sttheme.st_logo_image_height) && $sttheme.st_logo_image_height} height="{$sttheme.st_logo_image_height}"{/if}/>
            </a>
          </div>
          <div id="mobile_bar_right">
            <div class="flex_container">
              <a class="checkout_mobile_bar_tri mobile_bar_item mobile_bar_tri" data-name="checkout_mobile_nav" data-direction="open_bar_right" href="javascript:;" rel="nofollow" title="{l s='Menu' d='Shop.Theme.Transformer'}">
                  <i class="fto-menu fs_xl"></i>
                  <span class="mobile_bar_tri_text">{l s='Menu' d='Shop.Theme.Transformer'}</span>
              </a>
            </div>
          </div>
      </div>
    </div>
  </section>
{/block}
{block name='checkout_header'}
<header id="header_primary" class="checkout_header">
  <div class="wide_container">
      <div class="container">
        <div id="checkout_header_wrap" class="flex_container">
          {if isset($sttheme.logo_position) && $sttheme.logo_position==1}<div class="flex_child"></div>{/if}
          <a class="shop_logo" href="{$urls.base_url}" title="{$shop.name}">
            <img class="logo" src="{$shop.logo}" {if $sttheme.retina && $sttheme.retina_logo_src } srcset="{$sttheme.retina_logo_src} 2x" {/if} alt="{$shop.name}"{if isset($sttheme.st_logo_image_width) && $sttheme.st_logo_image_width} width="{$sttheme.st_logo_image_width}"{/if}{if isset($sttheme.st_logo_image_height) && $sttheme.st_logo_image_height} height="{$sttheme.st_logo_image_height}"{/if}/>
          </a>
          <div class="flex_child">
              <div class="checkout_header_right flex_container flex_right ">
                {hook h='displayCheckoutHeader'}
              </div>
          </div>
        </div>
    </div>
  </div>
</header>
{/block}
