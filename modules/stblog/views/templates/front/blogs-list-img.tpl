{*
* 2007-2012 PrestaShop
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
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 17677 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

                    {if $blog.type==1}
                        <div class="blog_image"><a href="{$blog.link}" rel="bookmark" title="{$blog.name}"><img src="{$blog.cover.links.medium}" alt="{$blog.name}" width="{$imageSize[1]['medium'][0]}" height="{$imageSize[1]['medium'][1]}" class="hover_effect" /></a></div>
                    {/if}
                    
                    {if $blog.type==2 && isset($blog['galleries']) && $blog['galleries']|count}
                        <div class="blog_gallery">
                        <div class="{if count($blog['galleries'])>1} blog_flexslider owl-carousel owl-theme owl-navigation-lr owl-navigation-rectangle {/if}">
                            {foreach $blog['galleries'] as $gallery}
                            <div class="blog_gallery_item">
                              <a href="{$blog.link}" rel="bookmark" title="{$blog.name}"><img src="{$gallery.links.large}" alt="{$blog.name}" width="{$imageSize[1]['large'][0]}" height="{$imageSize[1]['large'][1]}" class="hover_effect" /></a>
                            </div>
                            {/foreach}
                        </div>
                        </div>
                    {elseif $blog.type==2}
                        <div class="blog_image"><a href="{$blog.link}" rel="bookmark" title="{$blog.name}"><img src="{$blog.cover.links.medium}" alt="{$blog.name}" width="{$imageSize[1]['medium'][0]}" height="{$imageSize[1]['medium'][1]}" class="hover_effect" /></a></div>
                    {/if}
                    
                    {if $blog.type==3 && $blog.video}
                        <div class="blog_video"><div class="full_video">{$blog.video}</div></div>
                    {elseif $blog.type==3}
                        <div class="blog_image"><a href="{$blog.link}" rel="bookmark" title="{$blog.name}"><img src="{$blog.cover.links.medium}" alt="{$blog.name}" width="{$imageSize[1]['medium'][0]}" height="{$imageSize[1]['medium'][1]}" class="hover_effect" /></a></div>
                    {/if}