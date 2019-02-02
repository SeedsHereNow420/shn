{**
* 2013 - 2017 HiPresta
*
* MODULE Black list
*
* @author    HiPresta <suren.mikaelyan@gmail.com>
* @copyright HiPresta 2017
* @license   Addons PrestaShop license limitation
* @link      http://www.hipresta.com
*
* NOTICE OF LICENSE
*
* Don't use this module on several shops. The license provided by PrestaShop Addons
* for all its modules is valid only once for a single shop.
*}

<form class="form-horizontal defaultForm" method="post" >
	{if $psv >= 1.6}
		<div class="col-lg-12">
			<div class="panel clearfix">
				<div class="panel-heading"> <i class="icon-cogs"></i> {l s='Check our modules' mod='hiblacklist'}</div>
	{else}
		<fieldset id="fieldset_0" class="module_advertising">
			<legend>{l s='Check our modules' mod='hiblacklist'}</legend>
	{/if}
				<div class="module_info col-lg-6 col-md-6 col-sm-6">
					<a class="addons-style-module-link" href="https://addons.prestashop.com/en/share-buttons-comments/28923-fb-all-in-one-shop-tab-comments-autopost-share.html" target="_blank">
						<div class="media addons-style-module panel">
							<div class="media-body addons-style-media-body">
								<h4 class="media-heading addons-style-media-heading">{l s='FB - All in One (shop tab, comments, autopost, share)' mod='hiblacklist'}</h4>
							</div>
							<div class="addons-style-theme-preview center-block">
								<img class="addons-style-img_preview-theme" src="http://hipresta.com/images/facebook.jpg">
								<p class="btn btn-default">
									{if $psv >= 1.6}
										<i class="icon-shopping-cart"></i>
									{else}
										<img src="../img/t/AdminParentOrders.gif" alt="">
									{/if}
									€29.99
								</p>
							</div>
						</div>
					</a>
				</div>
				<div class="module_info col-lg-6 col-md-6 col-sm-6">
					<a class="addons-style-module-link" href="https://addons.prestashop.com/en/cross-selling-product-bundles/29380-upsell-push-on-cart.html" target="_blank">
						<div class="media addons-style-module panel">
							<div class="media-body addons-style-media-body">
								<h4 class="media-heading addons-style-media-heading">{l s='UpSell - Push on Cart' mod='hiblacklist'}</h4>
							</div>
							<div class="addons-style-theme-preview center-block">
								<img class="addons-style-img_preview-theme" src="http://hipresta.com/images/upsell.jpg">
								<p class="btn btn-default">
									{if $psv >= 1.6}
										<i class="icon-shopping-cart"></i>
									{else}
										<img src="../img/t/AdminParentOrders.gif" alt="">
									{/if}
									€29.99
								</p>
							</div>
						</div>
					</a>
				</div>
				<div class="module_info col-lg-6 col-md-6 col-sm-6">
					<a class="addons-style-module-link" href="https://addons.prestashop.com/en/social-widgets/27728-twitter-full-package.html" target="_blank">
						<div class="media addons-style-module panel">
							<div class="media-body addons-style-media-body">
								<h4 class="media-heading addons-style-media-heading">{l s='Twitter All in One' mod='hiblacklist'}</h4>
							</div>
							<div class="addons-style-theme-preview center-block">
								<img class="addons-style-img_preview-theme" src="http://hipresta.com/images/tfp.jpg">
								<p class="btn btn-default">
									{if $psv >= 1.6}
										<i class="icon-shopping-cart"></i>
									{else}
										<img src="../img/t/AdminParentOrders.gif" alt="">
									{/if}
									€29.99
								</p>
							</div>
						</div>
					</a>
				</div>
				<div class="module_info col-lg-6 col-md-6 col-sm-6">
					<a class="addons-style-module-link" href="https://addons.prestashop.com/en/price-comparison/24799-product-combinations-as-pricing-tables.html" target="_blank">
						<div class="media addons-style-module panel">
							<div class="media-body addons-style-media-body">
								<h4 class="media-heading addons-style-media-heading">{l s='Product Combinations as Pricing Tables	Module' mod='hiblacklist'}</h4>
							</div>
							<div class="addons-style-theme-preview center-block">
								<img class="addons-style-img_preview-theme" src="http://hipresta.com/images/pt.jpg">
								<p class="btn btn-default">
									{if $psv >= 1.6}
										<i class="icon-shopping-cart"></i>
									{else}
										<img src="../img/t/AdminParentOrders.gif" alt="">
									{/if}
									€29.99
								</p>
							</div>
						</div>
					</a>
				</div>
				<div class="module_info col-lg-6 col-md-6 col-sm-6">
					<a class="addons-style-module-link" href="http://addons.prestashop.com/en/slideshows-prestashop-modules/20410-carousels-pack-14-in-1.html" target="_blank">
						<div class="media addons-style-module panel">
							<div class="media-body addons-style-media-body">
								<h4 class="media-heading addons-style-media-heading">{l s='Carousels Pack (16 in 1)' mod='hiblacklist'}</h4>
							</div>
							<div class="addons-style-theme-preview center-block">
								<img class="addons-style-img_preview-theme" src="http://hipresta.com/images/cp.jpg">
								<p class="btn btn-default">
									{if $psv >= 1.6}
										<i class="icon-shopping-cart"></i>
									{else}
										<img src="../img/t/AdminParentOrders.gif" alt="">
									{/if}
									€29.99
								</p>
							</div>
						</div>
					</a>
				</div>

	{if $psv >=1.6}
			</div>
		</div>
	{else}
		</fieldset>
	{/if}
</form>
<div class="clearfix"></div>
