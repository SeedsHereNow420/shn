{**
* PrestaChamps
*
* NOTICE OF LICENSE
*
* This source file is subject to the Commercial License
* you can"t distribute, modify or sell this code
*
* DISCLAIMER
*
* Do not edit or add to this file
* If you need help please contact leo@prestachamps.com
*
* @author     PrestaChamps <leo@prestachamps.com>
* @copyright  PrestaChamps
*}
<script type="text/javascript" data-keepinline="true">
	window.dataLayer = window.dataLayer || [];
</script>
<script type="text/javascript" data-keepinline="true">
    	var currencyCode = "{$valuta|escape:'quotes':'UTF-8'}";

    	var ph_page_name = "{$meta_title|escape:'htmlall':'UTF-8'}";
    	var ph_analytics_uacode = "{$ph_analytics_uacode|escape:'quotes':'UTF-8'}";
    	var ph_no_track_backoffice = false;
    	var ph_allowLinker = {if isset($ph_allowLinker)}{$ph_allowLinker|escape:'html':'UTF-8'}{else}false{/if};
    	var ph_autoLinkDomains = "{$ph_autoLinkDomains|escape:'html':'UTF-8'}";
    	var ph_fbpixel_activ = {$ph_fbpixel_activ|escape:'html':'UTF-8'};
    	var ph_fbpixel_code = "{$ph_fbpixel_code|escape:'quotes':'UTF-8'}";
    	var ph_User_ID_Custom_Dimension_Nr = {$ph_user_id_custom_dimension_nr|escape:'quotes':'UTF-8'};
    	var ph_ecomm_prodid_custom_dimension_nr = {$ph_ecomm_prodid_custom_dimension_nr|escape:'quotes':'UTF-8'};
    	var ph_ecomm_pagetype_custom_dimension_nr = {$ph_ecomm_pagetype_custom_dimension_nr|escape:'quotes':'UTF-8'};
    	var ph_ecomm_totalvalue_custom_dimension_nr = {$ph_ecomm_totalvalue_custom_dimension_nr|escape:'quotes':'UTF-8'};
    	var ph_customer_id_dimension_nr = {$ph_customer_id_dimension_nr|escape:'quotes':'UTF-8'};
    	var FBuser = "{$FBuser|escape:'quotes':'UTF-8'}";
		{if true == $trackuid}
			var ph_UID = "{$uid|escape:'quotes':'UTF-8'}";
			var ph_CID = "{$cid|escape:'quotes':'UTF-8'}";
		{/if}
		{if isset($product.embedded_attributes.price) && $product.embedded_attributes.price }
			var ph_product_price = {$product.embedded_attributes.price|escape:'quotes':'UTF-8'};
		{/if}
    	var ph_tgmm_v = "{$tgmm_v|escape:'quotes':'UTF-8'}";

    	var ph_hotjar_activ = {$ph_hotjar_activ|escape:'html':'UTF-8'};
    	var ph_hotjar_code = "{$ph_hotjar_code|escape:'quotes':'UTF-8'}";
    	
    	var ph_inspectlet_activ = {$ph_inspectlet_activ|escape:'html':'UTF-8'};
    	var ph_inspectlet_code = "{$ph_inspectlet_code|escape:'quotes':'UTF-8'}";

    	var ph_pinterest_activ = {$ph_pinterest_activ|escape:'html':'UTF-8'};
    	var ph_pinterest_code = "{$ph_pinterest_code|escape:'quotes':'UTF-8'}";

    	var ph_GTS_activ = {$ph_GTS_activ|escape:'html':'UTF-8'};
    	var ph_adwords_activ = {$ph_adwords_activ|escape:'html':'UTF-8'};
    	var ph_remarketing_activ = {$ph_remarketing_activ|escape:'html':'UTF-8'};

    	var ph_GTS_Store_ID = "{$ph_GTS_Store_ID|escape:'quotes':'UTF-8'}";
    	var ph_GTS_Localee = "{$ph_GTS_Locale|escape:'quotes':'UTF-8'}";
    	var ph_GTS_Shopping_ID = "{$ph_GTS_Shopping_ID|escape:'quotes':'UTF-8'}";
    	var ph_GTS_Shopping_Account_ID = "{$ph_GTS_Shopping_Account_ID|escape:'quotes':'UTF-8'}";
    	var ph_GTS_Shopping_Country = "{$ph_GTS_Shopping_Country|escape:'quotes':'UTF-8'}";
    	var ph_GTS_Shopping_Language = "{$ph_GTS_Shopping_Language|escape:'quotes':'UTF-8'}";

    	var ph_GCR_BADGE_activ = {$ph_GCR_BADGE_activ|escape:'html':'UTF-8'};
    	var ph_GCR_OPTIN_activ = {$ph_GCR_OPTIN_activ|escape:'html':'UTF-8'};
    	var ph_GCR_ID = "{$ph_GCR_ID|escape:'html':'UTF-8'}";
		{if empty($action) != true && ($action.action == "purchase" || $action.action == "purchase_already_sent")}
	    	var ph_GCR_orderid = "{$action.id|escape:'html':'UTF-8'}";
	    	var ph_GCR_email = "{$action.email|escape:'html':'UTF-8'}";
	    	var ph_GCR_delivery_country = "{$action.delivery_country|escape:'html':'UTF-8'}";
	    	var ph_GCR_est_delivery_days = "{$ph_GCR_est_delivery_days|escape:'html':'UTF-8'}";
	    	var ph_GCR_est_delivery_date = "{$ph_GCR_est_delivery_date|escape:'html':'UTF-8'}";
		{else}
	    	var ph_GCR_orderid = "";
	    	var ph_GCR_email = "";
	    	var ph_GCR_delivery_country = "";
	    	var ph_GCR_est_delivery_days = "";
	    	var ph_GCR_est_delivery_date = "";
		{/if}

    	var ph_crazyegg_activ = {$ph_crazyegg_activ|escape:'html':'UTF-8'};
    	var ph_crazyegg_code = "{$ph_crazyegg_code|escape:'quotes':'UTF-8'}";


    	var ph_shop_name = "{$ph_shop_name|escape:'quotes':'UTF-8'}";

		var removeFromCartClick = function (e) {
				var mybtn = (this).closest('dt'); 
				var qtity = $(mybtn).find('.quantity').text();
				var mydataid = $(mybtn).attr('data-id') ;
				var product_id = mydataid.split('_')[3] ;
				var attribute_id = mydataid.split('_')[4] ;
				//console.log("remove from cart: " + product_id + "-" + attribute_id + " x " + qtity);
				window.dataLayer.push({
				'event': 'removeFromCart',
				'ecommerce': {
					'remove': {
						'products': [{
							'id': product_id + "-" + attribute_id,
							'quantity': qtity
						}]
					}
				}
			});
		}
		var removeFromCartClick_ps171 = function (e) {
				var mybtn = (this).closest('.product-line-grid'); 
				var qtity = $(mybtn).find('.js-cart-line-product-quantity').val();
				var product_id = $(this).attr('data-id-product');
				var attribute_id = $(this).attr('data-id-product-attribute');
				console.log("remove from cart 1.7: " + product_id + "-" + attribute_id + " x " + qtity);
				window.dataLayer.push({
				'event': 'removeFromCart',
				'ecommerce': {
					'remove': {
						'products': [{
							'id': product_id + "-" + attribute_id,
							'quantity': qtity
						}]
					}
				}
			});
		}
    	window.addEventListener('load', function() {
			$(document).on('click', '.ajax_cart_block_remove_link',
				removeFromCartClick
			);
			$(document).on('mousedown', 'BODY#cart .cart-items a.remove-from-cart',
				removeFromCartClick_ps171
			);
		});
    	{** PS1.7 js variable fixes **}
		if (typeof(page_name)== "undefined"){
			if (!(typeof(prestashop))== "undefined"){
				var page_name = prestashop.page.page_name;
			}
		}
		if (typeof(ph_product_price) == 'number'){
			var productPrice = ph_product_price;
		}
		if(typeof(productPrice) == 'undefined'){
			var productPrice = 0;
			var productPriceFloat = 0;
		}else{
			if(isFloat(productPrice)){
				var productPriceFloat = productPrice;
			} else {
				var productPriceFloat = productPrice.toFixed(2);
			}
		}		
		if (typeof(sharing_name) == 'undefined' ){			
			if(typeof(prestashop) !== "undefined"){
				if(typeof(prestashop.page) !== "undefined"){
					if(typeof(prestashop.page.meta) !== "undefined"){
						if(typeof(prestashop.page.meta.title) !== "undefined"){
							var sharing_name = prestashop.page.meta.title;
						}
					}
				}
			} else {
				var sharing_name = ph_page_name;
			}
		}

		{*enhanced ecommerce data*}
		{if empty($action) != true or empty($impressions) != true }

			{if empty($impressions) == true }
				{if $action.action == "purchase"}
				/*PURCHASE*/

				var id = "{$action.id|intval}";
				var revenue = "{$action.revenue|floatval}";
				var tax = "{$action.tax|floatval}";
				var shipping = "{$action.shipping|floatval}";
				var products = {$products|@json_encode|escape:'quotes':'UTF-8' nofilter};
				{foreach from=$products item=product}
					{$product_ids[] = {$product.id|escape:'quotes':'UTF-8'}}
				{/foreach}
				var product_ids = {$product_ids|@json_encode|escape:'quotes':'UTF-8' nofilter};
				var currencyCode = "{$valuta|escape:'quotes':'UTF-8'}";
				{literal}

				window.dataLayer.push({
						"page": "order-confirmation",
						"ecommerce": {
								"purchase": {
										"actionField": {
												"id": id,
												"revenue": revenue,
												"tax": tax,
												"shipping": shipping
										},
										"products": products
								}
						}
				});
				{/literal}


				{elseif $action.action == "checkout"}
				/*CHECKOUT*/
				var step = "{$action.step|intval}";
				var option = "{$action.option|escape:'quotes':'UTF-8'}";
				var products = '';
				{if empty($products) != true}
				products = {$products|@json_encode|escape:'quotes':'UTF-8' nofilter}
				{/if}

				{literal}

					window.dataLayer.push({
							"page": "checkout-step-" + step,
							"ecommerce": {
									"checkout": {
											"actionField": {
													"step": step,
													"option": option
											},
											"products": products
									}
							}
					});

				{/literal}

				{else}

					{if $action.page == 'product' }
					/*VIEW  PRODUCT DETAIL*/
					var filtered_keys = function(obj, filter) {
					  var key, keys = [];
					  for (key in obj) {
					    if (obj.hasOwnProperty(key) && filter.test(key)) {
					      keys.push(key);
					    }
					  }
					  return keys;
					}
			    	{** PS1.7 js variable fixes **}
					if (typeof(id_product) == "undefined"){
						if(typeof(prestashop) == "undefined" ){
							id_product = {$remarketing.id_product|escape:'quotes':'UTF-8' nofilter};
						} else{

							var findproductid = filtered_keys( prestashop.page.body_classes , /^product-id-\d+$/ );
							id_product = findproductid[0].replace('product-id-','');
						}
					}

					var action = "{$action.action|escape:'quotes':'UTF-8'}"
					var list = "{$action.actionFieldValue|escape:'quotes':'UTF-8'}";
					var products = {$products|@json_encode|escape:'quotes':'UTF-8' nofilter};
					var currencyCode = "{$valuta|escape:'quotes':'UTF-8'}";
						{literal}
						window.dataLayer.push({
								"page": "viewProduct",
								"ecommerce": {
										'detail': {
												"actionField": {
														"list": list
												},
												"products": products
										}
								}
						});
						{/literal}



					{/if}

				{/if}

			{else}

				/*IMPRESSIONS PRODUCTS*/
				var impressions = [];
				var maxProducts = 35; 
				{if empty($products) != true}
					var impressions =  {$products|@json_encode|escape:'quotes':'UTF-8' nofilter};
					
				{/if};

				{literal}

				while(impressions.length){
					var impressions_part = impressions.splice(0,maxProducts);
					window.dataLayer.push({
							"page": "viewCategory",
							"parentCateg": "{/literal}{$parentCateg}{literal}",

							"ecommerce": {
									"currencyCode": currencyCode,
									"impressions": impressions_part
							}
					});
				}

				/*CLICK PRODUCT ON CATEGORY*/
				var clickCallBack = function (e) {
						var url = $(this).attr('href');
						window.dataLayer.push({
								'event': 'productClick',
								'ecommerce': {
										'click': {
												'actionField': {'list': 'Category Listing'},      // Optional list property.*/
												'products': [{
														'name': this.text.trim()
														//'id': productObj.id,
														//'price': $,
														//'brand': productObj.brand,
														//'category': productObj.cat,
														//'variant': productObj.variant,
														//'position': productObj.position
												}]
										}
								},
								'eventCallback': function () {
									document.location = url
								}
						});
					/*	$(document).on('click', '.product-name', clickCallBack); */
						/*e.preventDefault();*/
				};
		    	window.addEventListener('load', function() {
					$(document).on('click', '.product-name , BODY#category .products article a', clickCallBack);
				});

				{/literal}

			{/if}

		{/if}

		{if isset($action) }
		/* for all pages*/
		var action = "{$action.action|escape:'quotes':'UTF-8'}"
		var list = "{$action.actionFieldValue|escape:'quotes':'UTF-8'}";
		var products = {$products|@json_encode|escape:'quotes':'UTF-8' nofilter};
		var currencyCode = "{$valuta|escape:'quotes':'UTF-8'}";
			{literal}
			window.addEventListener('load', function() {

				$(document).on('click', '.ajax_add_to_cart_button , #add_to_cart > button > span , .add-to-cart', function (e) {
					var products = {/literal}{$products|@json_encode|escape:'quotes':'UTF-8' nofilter}{literal};

					if(products.length>1){/* Fix For PS1.7  */
					// if(typeof(products) == "undefined" ){
					  // if(!(typeof(products[0]) == "undefined" )){
					      var products_quickview = $(this).closest('.quickview');
					      if(products_quickview.size()>0){
					          var products_quickview = $(this).closest('.quickview');
					          //if(typeof(ph_merchant_center_id) == "undefined")
					          var products_name = products_quickview.find('H1').text();
					          var products_id = products_quickview.find('INPUT[name=id_product]').attr('value') ;    /*reference*/
					          var products_id_product =  products_quickview.find('INPUT[name=id_product]').attr('value');
					          var products_reference = products_quickview.find('INPUT[name=id_product]').attr('value') ;
					          var products_price = products_quickview.find('.product-price span').attr('content') ;
					          var products_quantity = products_quickview.find('.qty input').attr('value'); ;
					          var products_ean13 = '' ;
					          var products_upc = '' ;
					          var products_category = '' ;
					          var products = [{"reference":products_reference,"ean13":products_ean13,"upc":products_upc,"id":products_id,"id_product":products_id_product,"name":products_name,"price":products_price,"quantity":products_quantity,"category":products_category,"list":"QuickView"}];
					      }
					  // }
					}

					window.dataLayer.push({
							'event': 'addToCart',
							'ecommerce': {
									'currencyCode': currencyCode,
									'add': {
											'products': products
									}
							}
					});
				});
			});
			{/literal}
		{/if}

		{*	adwords data*}

		{if empty($adwords) != true }
		if (typeof(id) == "undefined"){
			{if isset($action.id)}id = {$action.id};{/if}
		}
		if (typeof(id) != "undefined"){
			window.dataLayer.push({
					"google_conversion_id": "{$adwords.conversion_id|escape:'quotes':'UTF-8'}",
					"google_conversion_language": "{$adwords.conversion_language|escape:'quotes':'UTF-8'}",
					"google_conversion_format": "3",
					"google_conversion_color": "ffffff",
					"google_conversion_label": "{$adwords.conversion_label|escape:'quotes':'UTF-8'}",
					{if isset($adwords.conversion_value)}"google_conversion_value": "{$valuta|escape:'quotes':'UTF-8'}{$adwords.conversion_value|replace:'\'':''|floatval}",{/if}
					"google_conversion_only": false,
					"currency_code": currencyCode,
					"order_id": id
			});
		}else{
			window.dataLayer.push({
					"google_conversion_id": "{$adwords.conversion_id|escape:'quotes':'UTF-8'}",
					"google_conversion_language": "{$adwords.conversion_language|escape:'quotes':'UTF-8'}",
					"google_conversion_format": "3",
					"google_conversion_color": "ffffff",
					"google_conversion_label": "{$adwords.conversion_label|escape:'quotes':'UTF-8'}",
					{if isset($adwords.conversion_value)}"google_conversion_value": "{$valuta|escape:'quotes':'UTF-8'}{$adwords.conversion_value|replace:'\'':''|floatval}",{/if}
					"google_conversion_only": false,
					"currency_code": currencyCode,
			});
		}
		{/if}

		{*remarketing data*}
		{if empty($remarketing) != true}
		{*$remarketing|dump*}
			var google_tag_params = {
				{if isset($remarketing.id_product)}
					ecomm_prodid: {$remarketing.id_product|escape:'quotes':'UTF-8' nofilter},
				{else}
				{/if}
					ecomm_pagetype: "{$remarketing.page_type|escape:'quotes':'UTF-8'}",
				{if isset($remarketing.total)}	
					ecomm_totalvalue: "{$remarketing.total|floatval}",
				{else}
				{/if}
				{if isset($remarketing.content_type)}	
					content_type: "{$remarketing.content_type|escape:'quotes':'UTF-8'}",
				{/if}
				{if isset($remarketing.ecomm_category)}	
					ecomm_category: "{$remarketing.ecomm_category|escape:'quotes':'UTF-8'}",
				{/if}
			};
			{if isset($remarketing.info)}
				{if isset($remarketing.info.category_name)}
					google_tag_params["category"] = "{if isset($remarketing.info.category_name)}{$remarketing.info.category_name|escape:'quotes':'UTF-8'}{/if}";
				{/if}

				{if isset($info.product_name)}
					google_tag_params["product"] = "{if isset($remarketing.info.product_name)}{$remarketing.info.product_name|escape:'quotes':'UTF-8'}{/if}";
				{/if}
				window.dataLayer.push({
					"google_tag_params": google_tag_params
				});
			{else}
				window.dataLayer.push({
					"google_tag_params": google_tag_params
				});
			{/if}
		{/if}
		
		{if isset($trackuid) || isset($AdwConvId) }
			window.dataLayer.push({
				{if true == $trackuid}"UID_Cookie": "{$uid|escape:'quotes':'UTF-8'}",{/if}
				{if true == $trackuid}"CID_Cookie": "{$cid|escape:'quotes':'UTF-8'}",{/if}
				{if isset($AdwConvId)}"AdwConvId": "{$AdwConvId|escape:'quotes':'UTF-8'}",{/if}
				{if isset($AdwConvLg)}"AdwConvLg": "{$AdwConvLg|escape:'quotes':'UTF-8'}",{/if}
				{if isset($AdwConvLb)}"AdwConvLb": "{$AdwConvLb|escape:'quotes':'UTF-8'}",{/if}
				{if isset($product_name)}"product_name": "{$product_name|escape:'htmlall':'UTF-8'}",{/if}
			});
		{/if}
		function isFloat(n) {
			return n === +n && n !== (n|0);
		}
		function isInteger(n) {
		    return n === +n && n === (n|0);
		}
		function createCookie(name,value,days,path) {
		    if (days) {
		        var date = new Date();
		        date.setTime(date.getTime()+(days*24*60*60*1000));
		        var expires = "; expires="+date.toGMTString();
		    }
		    else var expires = "";
		    document.cookie = name+"="+value+expires+"; path="+path;
		}
		function eraseCookie(cookie_name,path) {
			createCookie(cookie_name,"",0,path);
		}
		function getCookie(name) {
		  var value = "; " + document.cookie;
		  var parts = value.split("; " + name + "=");
		  if (parts.length == 2) return parts.pop().split(";").shift();
		}

</script>
<script data-keepinline="true">{literal}(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})({/literal}window,document,'script','dataLayer','{$gtm|escape:'htmlall':'UTF-8'}');</script>

