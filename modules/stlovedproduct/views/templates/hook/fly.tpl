{*
* 2007-2015 PrestaShop
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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if isset($id_source) && $id_source}
<a class="add_to_love hover_fly_btn {if isset($classname)} {$classname} {/if} btn-spin pro_right_item" data-id-source="{$id_source}" data-type="{if isset($love_blog) && $love_blog}2{else}1{/if}" href="javascript:;" title="{l s='Love' d='Shop.Theme.Transformer'}" rel="nofollow"><div class="hover_fly_btn_inner"><i class="fto-heart-4 icon_btn"></i><span class="btn_text">{l s='Love' d='Shop.Theme.Transformer'}</span>{if isset($loved_with_number) && $loved_with_number}<span class="amount_inline">{(int)$loved_total}</span>{/if}</div></a>
{/if}