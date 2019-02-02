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
{if $averages}
    {foreach $averages as $av_k=>$av_v}
        <div class="flex_container mb-2">
            <div class="average_left">{$criterions.{$av_k}}</div>
            <div class="pc_progress progress flex_child">
              <div class="progress-bar" role="progressbar" style="width: {$av_v*20}%; height: 16px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="average_right ml-1">
                ({$av_v})
            </div>
        </div>
    {/foreach}
{/if}