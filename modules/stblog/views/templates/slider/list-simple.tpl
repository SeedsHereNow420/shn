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
{if isset($blogs) AND $blogs}
    <ul class="pro_itemlist row">
    {foreach $blogs as $blog}
        <li class="{if $pro_per_fw}col-fw-{(12/$pro_per_fw)|replace:'.':'-'}{/if}  {if $pro_per_xxl}col-xxl-{(12/$pro_per_xxl)|replace:'.':'-'}{/if}  {if $pro_per_xl}col-xl-{(12/$pro_per_xl)|replace:'.':'-'}{/if} col-lg-{(12/$pro_per_lg)|replace:'.':'-'} col-md-{(12/$pro_per_md)|replace:'.':'-'} col-sm-{(12/$pro_per_sm)|replace:'.':'-'} col-{(12/$pro_per_xs)|replace:'.':'-'}  {if $pro_per_fw && $blog@iteration%$pro_per_fw == 1} first-item-of-screen-line{/if} {if $pro_per_xxl && $blog@iteration%$pro_per_xxl == 1} first-item-of-large-line{/if} {if $pro_per_xl && $blog@iteration%$pro_per_xl == 1} first-item-of-desktop-line{/if}{if $blog@iteration%$pro_per_lg == 1} first-item-of-line{/if}{if $blog@iteration%$pro_per_md == 1} first-item-of-tablet-line{/if}{if $blog@iteration%$pro_per_sm == 1} first-item-of-mobile-line{/if}{if $blog@iteration%$pro_per_xs == 1} first-item-of-portrait-line{/if}">
          {include file="module:stblog/views/templates/slider/post.tpl" classname='blog_lr blog_lr_small'}
        </li>
    {/foreach}
    </ul>
{else}
    <p class="warning">{l s='No posts' d='Shop.Theme.Transformer'}</p>
{/if}