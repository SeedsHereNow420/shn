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
<!-- MODULE St Blog Link Nav  -->
{if $prev_blog || $next_blog}
<section id="blog_link_nav" class="clearfix general_bottom_border">
    {if $prev_blog}
    <a href="{$link->getModuleLink('stblog', 'article',['id_st_blog'=>$prev_blog['id_st_blog'],'rewrite'=>$prev_blog['link_rewrite']])|escape:'html'}" title="{l s='Previous article' d='Shop.Theme.Transformer'}" class="fl"><i class="icon-left-open-3 icon-mar-lr2"></i>{l s='Previous article' d='Shop.Theme.Transformer'}</a>
    {/if}
    {if $next_blog}
    <a href="{$link->getModuleLink('stblog', 'article',['id_st_blog'=>$next_blog['id_st_blog'],'rewrite'=>$next_blog['link_rewrite']])|escape:'html'}" title="{l s='Next article' d='Shop.Theme.Transformer'}" class="fr">{l s='Next article' d='Shop.Theme.Transformer'}<i class="icon-right-open-3 icon-mar-lr2"></i></a>
    {/if}
</section>
{/if}
<!-- /MODULE St Blog Link Nav -->