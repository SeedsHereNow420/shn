{*
* 2007-2017 PrestaShop
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}
<!-- MODULE wishlist -->
{if isset($wishlists) && count($wishlists) > 1}
	<nav class="st-menu" id="side_stwishlist">
		<div class="divscroll">
			<div class="wrapperscroll">
				<div class="st-menu-header">
					<h3 class="st-menu-title">{l s='Wishlists' d='Shop.Theme.Transformer'}</h3>
			    	<a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
				</div>
				<div id="stwishlist_content">
					<p id="stwishlist_added" class="alert alert-success unvisible">{l s='The product was successfully added to your wishlist.' d='Shop.Theme.Transformer'}</p>
					<ul id="stwishlist_list">
						{foreach $wishlists as $wishlist}
							<li><a href="javascript:;" title="{$wishlist.name}" class="stwishlist" data-wid="{$wishlist.id_wishlist}">{l s='Add to %s' sprintf=[$wishlist.name] d='Shop.Theme.Transformer'}</a></li>
						{/foreach}
					</ul>
					<div class="row">
						<div class="col-6">
							<span class="side_continue btn btn-default btn-bootstrap" title="{l s='Close' d='Shop.Theme.Transformer'}">
								{l s='Close' d='Shop.Theme.Transformer'}
							</span>
						</div>
						<div class="col-6">
							<a class="btn btn-default btn-bootstrap" href="{$link->getModuleLink('blockwishlist', 'mywishlist', array(), true)|escape:'html':'UTF-8'}" title="{l s='My wishlists' d='Shop.Theme.Transformer'}" rel="nofollow">{l s='My wishlists' d='Shop.Theme.Transformer'}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
{/if}
<!-- /MODULE wishlist -->