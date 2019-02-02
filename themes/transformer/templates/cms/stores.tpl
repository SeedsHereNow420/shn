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
{extends file='page.tpl'}

{block name='page_title'}
  {l s='Our stores' d='Shop.Theme'}
{/block}

{block name='page_content_container'}
  <section id="content" class="page-content page-stores">
    <div class="base_list_line large_list">
    {foreach $stores as $store}
      <article id="store-{$store.id}" class="store-item line_item">
        <div class="store-item-container row">
          <div class="col-md-3 col-sm-12 store-picture">
            <img src="{$store.image.bySize.stores_default.url}" alt="{$store.image.legend}" title="{$store.image.legend}"/>
          </div>
          <div class="col-md-5 col-sm-12 store-description">
            <h3 class="page_heading mt-1">{$store.name}</h3>
            <address>{$store.address.formatted nofilter}</address>
            {if $store.note || $store.phone || $store.fax || $store.email}
              <a data-toggle="collapse" href="#about-{$store.id}" aria-expanded="false" aria-controls="about-{$store.id}" title="{l s='About and Contact' d='Shop.Theme'}" class="mb-3">{l s='About and Contact' d='Shop.Theme.Global'}<i class="fto-down-open mar_l4"></i></a>
            {/if}
          </div>
          <div class="col-md-4 col-sm-12">
            
              {foreach $store.business_hours as $day}
              <div class="flex_container">
                <div class="mar_r6 heading_color">{$day.day}</div>
                <div class="flex_child">
                  {foreach $day.hours as $h}
                    {$h}{if !$h@last}, {/if}
                  {/foreach}
                </div>
              </div>
              {/foreach}
          </div>
        </div>
        <footer id="about-{$store.id}" class="collapse store-item-footer m-t-1">
            <ul>
              {if $store.phone}
                <li><i class="fto-phone fs_md mar_r4"></i>{$store.phone}</li>
              {/if}
              {if $store.fax}
                <li><i class="fto-print fs_md mar_r4"></i>{$store.fax}</li>
              {/if}
              {if $store.email}
                <li><i class="fto-mail-alt fs_md mar_r4"></i>{$store.email}</li>
              {/if}
            </ul>
            {if $store.note}
              <div class="style_content">{$store.note}<div>
            {/if}
        </footer>
      </article>
    {/foreach}
    </div>
  </section>
{/block}
