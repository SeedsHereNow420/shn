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

<footer id="footer" class="footer-container">
    {block name='hook_stacked_footer'}
	{if $HOOK_STACKED_FOOTER_1|trim || $HOOK_STACKED_FOOTER_2|trim || $HOOK_STACKED_FOOTER_3|trim || $HOOK_STACKED_FOOTER_4|trim || $HOOK_STACKED_FOOTER_5|trim || $HOOK_STACKED_FOOTER_6|trim}
    <section id="footer-primary">
		<div class="{if !$sttheme.f_top_fullwidth && $sttheme.responsive_max!=3}wide_container{/if}">
            <div class="{if !$sttheme.f_top_fullwidth && $sttheme.responsive_max!=3}container{else}container-fluid{/if}">
                <div class="row">
                    {if $sttheme.stacked_footer_column_1}<div id="stacked_footer_column_1" class="col-lg-{$sttheme.stacked_footer_column_1|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_1 nofilter}</div>{/if}
                    {if $sttheme.stacked_footer_column_2}<div id="stacked_footer_column_2" class="col-lg-{$sttheme.stacked_footer_column_2|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_2 nofilter}</div>{/if}
                    {if $sttheme.stacked_footer_column_3}<div id="stacked_footer_column_3" class="col-lg-{$sttheme.stacked_footer_column_3|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_3 nofilter}</div>{/if}
                    {if $sttheme.stacked_footer_column_4}<div id="stacked_footer_column_4" class="col-lg-{$sttheme.stacked_footer_column_4|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_4 nofilter}</div>{/if}
                    {if $sttheme.stacked_footer_column_5}<div id="stacked_footer_column_5" class="col-lg-{$sttheme.stacked_footer_column_5|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_5 nofilter}</div>{/if}
                    {if $sttheme.stacked_footer_column_6}<div id="stacked_footer_column_6" class="col-lg-{$sttheme.stacked_footer_column_6|replace:'.':'-'}">{$HOOK_STACKED_FOOTER_6 nofilter}</div>{/if}
                </div>
			</div>
        </div>
    </section>
    {/if}
    {/block}
    {block name='hook_footer'}
    {capture name="displayFooter"}{hook h="displayFooter"}{/capture}
    {if $smarty.capture.displayFooter|trim}
    <section id="footer-secondary">
		<div class="{if !$sttheme.footer_fullwidth && $sttheme.responsive_max!=3}wide_container{/if}">
			<div class="{if !$sttheme.footer_fullwidth && $sttheme.responsive_max!=3}container{else}container-fluid{/if}">
                <div class="row">
				    {$smarty.capture.displayFooter nofilter}
                </div>
			</div>
        </div>
    </section>
    {/if}
    {/block}
    {block name='hook_footer_after'}
    {capture name="displayFooterAfter"}{hook h="displayFooterAfter"}{/capture}
    {if $smarty.capture.displayFooterAfter|trim}
    <section id="footer-tertiary">
		<div class="{if !$sttheme.f_secondary_fullwidth && $sttheme.responsive_max!=3}wide_container{/if}">
			<div class="{if !$sttheme.f_secondary_fullwidth && $sttheme.responsive_max!=3}container{else}container-fluid{/if}">
                <div class="row">
                	{$smarty.capture.displayFooterAfter nofilter}
                </div>
			</div>
        </div>
    </section>
    {/if}
    {/block}

    {include file='_partials/footer-bottom.tpl'}
</footer>