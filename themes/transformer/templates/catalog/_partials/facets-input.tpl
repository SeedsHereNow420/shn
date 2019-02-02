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
              {foreach from=$facet.filters key=filter_key item="filter"}
                {if $filter.displayed}
                  <li class="facet_filter_item_li">
                    <label class="facet-label checkbox-inline {if $filter.active} active {/if} flex_container flex_start" for="facet_input_{$_expand_id}_{$filter_key}">
                      {if $facet.multipleSelectionAllowed}
                        <span class="custom-input-box">
                          <input
                            id="facet_input_{$_expand_id}_{$filter_key}"
                            data-search-url="{$filter.nextEncodedFacetsURL}"
                            type="checkbox"
                            class="custom-input"
                            {if $filter.active } checked {/if}
                          >
                          {if isset($filter.properties.color)}
                            <span class="custom-input-item custom-input-color" style="background-color:{$filter.properties.color}"><i class="fto-ok-1 checkbox-checked"></i><i class="fto-spin5 animate-spin"></i></span>
                            {elseif isset($filter.properties.texture)}
                              <span class="custom-input-item custom-input-color texture" style="background-image:url({$filter.properties.texture})"><i class="fto-ok-1 checkbox-checked"></i><i class="fto-spin5 animate-spin"></i></span>
                            {else}
                            <span class="custom-input-item custom-input-checkbox {if !$js_enabled} ps-shown-by-js {/if}"><i class="fto-ok-1 checkbox-checked"></i><i class="fto-spin5 animate-spin"></i></span>
                          {/if}
                        </span>
                      {else}
                        <span class="custom-input-box">
                          <input
                            id="facet_input_{$_expand_id}_{$filter_key}"
                            data-search-url="{$filter.nextEncodedFacetsURL}"
                            type="radio"
                            class="custom-input "
                            name="filter {$facet.label}"
                            {if $filter.active } checked {/if}
                          >
                          <span class="custom-input-item custom-input-radio {if !$js_enabled} ps-shown-by-js {/if}"><i class="fto-ok-1 checkbox-checked"></i><i class="fto-spin5 animate-spin"></i></span>
                        </span>
                      {/if}

                      <a
                        href="{$filter.nextEncodedFacetsURL}"
                        class="_gray-darker search-link js-search-link flex_child"
                        rel="nofollow"
                      >
                        {$filter.label}
                        {if $filter.magnitude}
                          <span class="magnitude">({$filter.magnitude})</span>
                        {/if}
                      </a>
                    </label>
                  </li>
                {/if}
              {/foreach}