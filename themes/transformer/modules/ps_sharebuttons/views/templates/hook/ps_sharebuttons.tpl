{*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{block name='social_sharing'}
  {if $social_share_links}
    <div class="social-sharing m-b-1">
      <span>{l s='Share' d='Shop.Theme.Actions'}</span>
      <ul>
        {foreach $social_share_links as $social_key=>$social_share_link}
          <li><a href="{$social_share_link.url}" title="{$social_share_link.label}" target="_blank">
          <i class="{if $social_key=='facebook'}fto-facebook{elseif $social_key=='twitter'}fto-twitter{elseif $social_key=='googleplus'}fto-gplus{else}fto-pinterest{/if}"></i>
          </a></li>
        {/foreach}
      </ul>
    </div>
  {/if}
{/block}
