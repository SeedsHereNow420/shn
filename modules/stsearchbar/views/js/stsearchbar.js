/*
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
*/
if(typeof(quick_search_as_size) === 'undefined')
	var quick_search_as_size = 6;
if(typeof(quick_search_as_min) === 'undefined')
	var quick_search_as_min = 3;
if(typeof(quick_search_as) === 'undefined')
	var quick_search_as = true;

$(document).ready(function () {
	if(quick_search_as)
		$('.search_widget').each(function(){
	    	var search_url     = $(this).data('search-controller-url');
			var search_results = $(this).find('.search_results');
			var search_more_products = $(this).find('.search_more_products');
			var search_btn = $(this).find('.search_widget_btn');
			$(this).find('.search_widget_text').devbridgeAutocomplete({
				noCache: true,
				paramName: 's',
	            params: {resultsPerPage: quick_search_as_size, is_ajax_search: 1},
	            dataType: 'json',
				minChars: 3,
				appendTo: search_results,
				triggerSelectOnValidInput: false,
				showNoSuggestionNotice: true,
	            noSuggestionNotice: $('.search_no_products').html(),
				serviceUrl: search_url,
				onSearchStart: function() {
					search_btn.addClass('active');
				},
				onSearchComplete: function() {
					search_btn.removeClass('active');
				},
				transformResult: function(response) {
					var suggestions = $.map(response.products, function(dataItem) {
			                return { value: dataItem.name, data: dataItem };
			            });
			        return {
			            suggestions: suggestions
			        };
			    },
			    beforeRender: function (container, suggestions) {
					if(suggestions.length==quick_search_as_size)
						$(container).append(search_more_products.clone());
			    },
				formatResult: function(suggestion, currentValue) {
					var result = '<a href="'+suggestion.data.link+'" title="'+suggestion.data.name+'" rel="nofollow" class="search_product_row flex_container">';
						if (suggestion.data.cover && typeof(suggestion.data.cover.bySize)!='undefined')
							result += '<img class="search_product_img search_result_item" alt="'+suggestion.data.name+'" src="' + suggestion.data.cover.bySize.small_default.url + '" width="' + suggestion.data.cover.bySize.small_default.width + '" height="' + suggestion.data.cover.bySize.small_default.height + '"/>';
						result += '<div class="search_product_name flex_child search_result_item">' + suggestion.data.name + '</div>';
						result += '<div class="search_product_price search_result_item price">' + (suggestion.data.has_discount ? suggestion.data.price : suggestion.data.regular_price) + '</div>';
						result += '</a>';
					return result;
				}
			});
		});
	$(document).on('click', '.search_more_products', function(e){
		$(this).closest('.search_widget').find('form').submit();
	});
});
