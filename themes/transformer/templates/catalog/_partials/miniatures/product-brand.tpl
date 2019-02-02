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
      <div class="product-manufacturer pro_extra_info flex_container">
          <span class="pro_extra_info_label">{l s='Brand' d='Shop.Theme.Transformer'}:</span>
          <div class="pro_extra_info_content flex_child">
            <a {if $sttheme.google_rich_snippets} itemprop="brand" itemscope="" itemtype="https://schema.org/Organization" {/if} href="{$product_brand_url}" title="{l s='Click here to see all products of this brand' d='Shop.Theme.Transformer'}" target="_top" class="pro_extra_info_brand">
                {if $sttheme.google_rich_snippets}<meta itemprop="name" content="{$product_manufacturer->name}" />{/if}
                {if $sttheme.show_brand_logo==2 || $sttheme.show_brand_logo==4 || !$manufacturer_image_url}
                    {$product_manufacturer->name}
                {else}
                    <img {if $sttheme.google_rich_snippets} itemprop="image" {/if} alt="{$product_manufacturer->name}" src="{$manufacturer_image_url}" width="{$sttheme.brand_default.width}" height="{$sttheme.brand_default.height}" class="general_border" /> <!-- class="replace-2x" to do how pre get brand image is suck-->
                {/if}
            </a>
          </div>
      </div>