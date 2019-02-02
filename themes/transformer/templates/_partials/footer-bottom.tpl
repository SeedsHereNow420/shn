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
    {capture name="displayFooterBottomLeft"}{hook h="displayFooterBottomLeft"}{/capture}
    {capture name="displayFooterBottomRight"}{hook h="displayFooterBottomRight"}{/capture}
    {if (isset($sttheme.copyright_text) && $sttheme.copyright_text) 
    || $smarty.capture.displayFooterBottomLeft|trim
    || $smarty.capture.displayFooterBottomRight|trim
    || (isset($sttheme.footer_img_src) && $sttheme.footer_img_src) 
    || (isset($sttheme.responsive) && $sttheme.responsive && isset($sttheme.enabled_version_swithing) && $sttheme.enabled_version_swithing)}
    <div id="footer-bottom" class="{if $sttheme.f_info_center} footer_bottom_center {/if}">
        <div class="{if !$sttheme.f_info_fullwidth && $sttheme.responsive_max!=3}wide_container{/if}">
            <div class="{if !$sttheme.f_info_fullwidth && $sttheme.responsive_max!=3}container{else}container-fluid{/if}">
                <div class="row">
                    <div class="col-12 col-sm-12 clearfix">      
                    	{if (isset($sttheme.footer_img_src) && $sttheme.footer_img_src) || $smarty.capture.displayFooterBottomRight|trim}
                        <aside id="footer_bottom_right">
                        	{if isset($sttheme.footer_img_src) && $sttheme.footer_img_src}    
	                            <img src="{$sttheme.footer_img_src}" alt="{l s='Payment methods' d='Shop.Theme.Transformer'}" />
	                        {/if}
                            {$smarty.capture.displayFooterBottomRight nofilter}
                        </aside>
    					{/if}
                        <aside id="footer_bottom_left">
                        	{block name='copyright_link'}{if isset($sttheme.copyright_text)}{$sttheme.copyright_text nofilter}{/if}{/block}
	    					{$smarty.capture.displayFooterBottomLeft nofilter} 
    					</aside> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    {/if}