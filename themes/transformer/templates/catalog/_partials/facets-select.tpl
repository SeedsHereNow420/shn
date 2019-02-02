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

            <ul id="facet_{$_expand_id}" class="collapse{if !$_collapse} in{/if}">
              <li>
                <div class="col-sm-12 col-12 col-md-12 facet-dropdown dropdown">
                  <a class="select-title" rel="nofollow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {$active_found = false}
                    <span>
                      {foreach from=$facet.filters item="filter"}
                        {if $filter.active}
                          {$filter.label}
                          {if $filter.magnitude}
                            ({$filter.magnitude})
                          {/if}
                          {$active_found = true}
                        {/if}
                      {/foreach}
                      {if !$active_found}
                        {l s='(no filter)' d='Shop.Theme'}
                      {/if}
                    </span>
                    <i class="fto-down-open"></i>
                  </a>
                  <div class="dropdown-menu">
                    {foreach from=$facet.filters item="filter"}
                      {if !$filter.active}
                        <a
                          rel="nofollow"
                          href="{$filter.nextEncodedFacetsURL}"
                          class="select-list"
                        >
                          {$filter.label}
                          {if $filter.magnitude}
                            ({$filter.magnitude})
                          {/if}
                        </a>
                      {/if}
                    {/foreach}
                  </div>
                </div>
              </li>
            </ul>