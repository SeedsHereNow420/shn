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

	{block name='breadcrumb'}
	{/block}
    {block name='page_content_container'}
      <section id="content" class="page-home">
        {block name='page_content_top'}{/block}
        {block name='page_content'}

          {hook h="displayHomeTop"}

          {block name='hook_home'}
            {$HOOK_HOME nofilter}
          {/block}

          {capture name="displayHomeRight"}{hook h="displayHomeRight"}{/capture}
          {capture name="displayHomeLeft"}{hook h="displayHomeLeft"}{/capture}
          {capture name="displayHomeFirstQuarter"}{hook h="displayHomeFirstQuarter"}{/capture}
          {capture name="displayHomeSecondQuarter"}{hook h="displayHomeSecondQuarter"}{/capture}
          {capture name="displayHomeThirdQuarter"}{hook h="displayHomeThirdQuarter"}{/capture}
          {capture name="displayHomeFourthQuarter"}{hook h="displayHomeFourthQuarter"}{/capture}

          {if $smarty.capture.displayHomeRight || $smarty.capture.displayHomeLeft}
            <div id="home_secondary_row" class="row">
              <div id="home_secondary_left" class="col-lg-6">
                {$smarty.capture.displayHomeLeft nofilter}
              </div>
              <div id="home_secondary_right" class="col-lg-6">
                {$smarty.capture.displayHomeRight nofilter}
              </div>
            </div>
          {/if}
          {if $smarty.capture.displayHomeFirstQuarter || $smarty.capture.displayHomeSecondQuarter || $smarty.capture.displayHomeThirdQuarter || $smarty.capture.displayHomeFourthQuarter }
          <div id="home_tertiary_row" class="row">
              {if $sttheme.quarter_1}
              <div id="home_first_quarter" class="col-lg-{$sttheme.quarter_1}">
                  {$smarty.capture.displayHomeFirstQuarter nofilter}
              </div>
              {/if}
              {if $sttheme.quarter_2}
              <div id="home_second_quarter" class="col-lg-{$sttheme.quarter_2}">
                  {$smarty.capture.displayHomeSecondQuarter nofilter}
              </div>
              {/if}
              {if $sttheme.quarter_3}
              <div id="home_third_quarter" class="col-lg-{$sttheme.quarter_3}">
                  {$smarty.capture.displayHomeThirdQuarter nofilter}
              </div>
              {/if}
              {if $sttheme.quarter_4}
              <div id="home_fourth_quarter" class="col-lg-{$sttheme.quarter_4}">
                  {$smarty.capture.displayHomeFourthQuarter nofilter}
              </div>
              {/if}
          </div>
          {/if}

          {hook h="displayHomeBottom"}

        {/block}
      </section>
    {/block}
