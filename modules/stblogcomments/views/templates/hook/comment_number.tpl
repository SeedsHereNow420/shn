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
<span>{if isset($link_rewrite)}<a href="{$link->getModuleLink('stblog','article',['id_st_blog'=>$id_st_blog,'rewrite'=>$link_rewrite])|escape:'html'}#comments" title="{$comment_number} {if $comment_number>1}{l s='Comments' d='Shop.Theme.Transformer'}{else}{l s='Comment' d='Shop.Theme.Transformer'}{/if}">{/if}<i class="fto-chat-1 mar_r4"></i>{$comment_number}{if isset($link_rewrite)}</a>{/if}</span>