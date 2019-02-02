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
<div class="pro_column_box clearfix line_item">
  {if $blog.cover}
  <a href="{$blog.link}" title="{$blog.name}" class="pro_column_left">
    <img src="{$blog.cover.links.thumb.image}" alt="{$blog.name}" width="{$blog.cover.links.thumb.width}" height="{$blog.cover.links.thumb.height}" />
  </a>
  {/if}
  <div class="{if $blog.cover} pro_column_right {/if}">
    <h3 class="s_title_block nohidden"><a href="{$blog.link}" title="{$blog.name}">{$blog.name|truncate:50:'...'}</a></h3>
    {if $stblog.display_date}
    {strip}
    <span class="date-add"><i class="fto-clock mar_r4"></i>
    {if $stblog.display_date==2}
        {if !count($blog.timeago)}
            {l s='Just now' d='Shop.Theme.Transformer'}
        {else}
            {if key($blog.timeago)=='y'}
                {$blog.timeago['y']} {if $blog.timeago['y']>1}{l s='Year'  d='Shop.Theme.Transformer'}{else}{l s='Years'  d='Shop.Theme.Transformer'}{/if}
            {elseif key($blog.timeago)=='m'}
                {$blog.timeago['m']} {if $blog.timeago['m']>1}{l s='Month'  d='Shop.Theme.Transformer'}{else}{l s='Months'  d='Shop.Theme.Transformer'}{/if}
            {elseif key($blog.timeago)=='w'}
                {$blog.timeago['w']} {if $blog.timeago['w']>1}{l s='Week'  d='Shop.Theme.Transformer'}{else}{l s='Weeks'  d='Shop.Theme.Transformer'}{/if}
            {elseif key($blog.timeago)=='d'}
                {$blog.timeago['d']} {if $blog.timeago['d']>1}{l s='Day'  d='Shop.Theme.Transformer'}{else}{l s='Days'  d='Shop.Theme.Transformer'}{/if}
            {elseif key($blog.timeago)=='h'}
                {$blog.timeago['h']} {if $blog.timeago['h']>1}{l s='Hour'  d='Shop.Theme.Transformer'}{else}{l s='Hours'  d='Shop.Theme.Transformer'}{/if}
            {elseif key($blog.timeago)=='i'}
                {$blog.timeago['i']} {if $blog.timeago['i']>1}{l s='Minute'  d='Shop.Theme.Transformer'}{else}{l s='Minutes'  d='Shop.Theme.Transformer'}{/if}
            {/if}
            &nbsp;{l s='ago'  d='Shop.Theme.Transformer'}
        {/if}
    {else}{dateFormat date=$blog.date_add full=0}{/if}</span>
    {/strip}
    {/if}
  </div>
</div>