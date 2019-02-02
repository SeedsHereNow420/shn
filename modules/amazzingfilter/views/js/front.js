/**
*  2007-2017 PrestaShop
*
*  @author    Amazzing
*  @copyright Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

var af_timeStart, af_timeEnd, af_hideZeroMatches, af_dimZeroMatches, af_showCounters, af_subcatProducts,
	af_includeGroup, af_includeSorting, af_nb_items_original, af_viewBtn, af_compactView,
	possiblePrimaryFilters = [],
	dynamic_url_params = {'af_page': page_link_rewrite_text},
	blockAjaxRequests = false,
	refreshRequired = false,
	folderedStructureActivated = false,
	af_product_list_selector = is_17 ? '#js-product-list' : '.'+af_product_list_class,
	locked_class = af_classes['icon-lock'],
	unlocked_class = af_classes['icon-unlock-alt'],
	unlocked_selector = '.'+unlocked_class.replace(/ /g, '.'),
	times_class = af_classes['icon-times'],
	pagination_class = af_classes['pagination'],
	product_count_class = af_classes['product-count'],
	pagination_holder_id = af_ids['pagination'],
	pagination_bottom_holder_id = af_ids['pagination_bottom'],
	af_primary_filter = {
		trigger: '',
		url: ''
	};

$(document).ready(function(){

	af_hideZeroMatches = $('#af_hide_zero_matches').val() == 1 ? true : false;
	af_dimZeroMatches = $('#af_dim_zero_matches').val() == 1 ? true : false;
	af_showCounters = $('#af_count_data').val() == 1 ? true : false;
	af_subcatProducts = $('#af_subcat_products').val() == 1 ? true : false;
	af_includeGroup = $('#af_include_group').val() == 1 ? true : false;
	af_includeSorting = $('#af_include_sorting').val() == 1 ? true : false;
	af_nb_items_original = $('#af_nb_items').val();
	af_viewBtn = $('.viewFilteredProducts').length;
	af_compactView = $('#amazzing_filter.compact').length;

	if (!$(af_product_list_selector).length) {
		// refresh is not required on main page in either case
		refreshRequired = $('#af_current_controller').val() != 'index';
	} else {
		$(af_product_list_selector).first().wrap('<div class="af_pl_wrapper af"></div>');
		if (load_more) {
			$('.dynamic-product-count').html(af_product_count_text);
			$('.af.dynamic-loading').insertAfter('.af_pl_wrapper');
			if (show_load_more_btn) {
				$('.dynamic-loading').removeClass('hidden');
			}
		}
	}

	// infinite scroll
	if ($('#af_p_type').val() == 3) {
		var scrollTimer;
		$(window).on('scroll', function() {
			clearTimeout(scrollTimer);
			scrollTimer = setTimeout(function() {
				if ($('.af_pl_wrapper').length) {
					var viewportTop = $(window).scrollTop(),
						windowOffset = viewportTop + $(window).height(),
						listTop = $('.af_pl_wrapper').offset().top,
						listOffset = listTop + $('.af_pl_wrapper').outerHeight(),
						isInViewPort = listOffset > viewportTop && listTop < windowOffset;
					if (!$('.dynamic-loading').hasClass('loading') &&
						!$('.dynamic-loading').hasClass('hidden') &&
						isInViewPort && (windowOffset + 500) > listOffset) {
						$('.loadMore').click();
					}
				}
			}, 100);
		});
	}

	if (af_compactView) {
		// avoid position:absolute + -webkit-overflow-scrolling: touch;
		$('#amazzing_filter').find('.btn-holder').appendTo('#amazzing_filter');
		$('#amazzing_filter.compact').prependTo('body').find('.af_filter').addClass('closed');
		$('body').addClass('has-compact-filter');
		$('#af_autoscroll').val(1);
		$('.compact-toggle').on('click', function(e){
			e.preventDefault();
			$('body').toggleClass('show-filter');
		});
	}

	if (af_viewBtn) {
		$('#af_nb_items').val(0);
	}

	$('.viewFilteredProducts').on('click', function(e){
		e.preventDefault();
		if ($(this).hasClass('loading')) {
			return;
		}
		// layout is prepared in main-page.js
		if (!$(this).hasClass('no-layout')) {
			$('#af_orderBy').change();
		}
		if (af_compactView) {
			$('body').removeClass('show-filter');
		}
	})

	if (!$('#amazzing_filter').hasClass('horizontal-layout')) {
		$('.af_subtitle').on('click', function(e){
			e.preventDefault();
			var $filter = $(this).closest('.af_filter');
			$filter.toggleClass('closed');
			if ($filter.hasClass('type-3') && !$filter.hasClass('closed')) {
				try{$filter.find('.af-select').uniform()}catch(err){};
			}
			if (af_compactView) {
				$filter.siblings('.af_filter').addClass('closed');
			}
		});
	}

	$('.toggle-cut-off').on('click', function(e){
		e.preventDefault();
		$(this).closest('.af_filter').toggleClass('full');
	});

	prepareCutOff($('.toggle-cut-off'));

	function prepareCutOff($toggler) {
		$toggler.each(function(){
			var $content = $(this).siblings('.af_filter_content'),
				$filter = $content.closest('.af_filter'),
				full = $filter.hasClass('full');
			$filter.removeClass('full');
			var expandable = $content.prop('scrollHeight') > $content.prop('offsetHeight');
			$filter.toggleClass('expandable', expandable).toggleClass('full', full);
		})
	}

	// af_timeStart = new Date().getTime()/1000;
	$('.af_filter').each(function(){
		dynamic_url_params[$(this).data('trigger')] = $(this).data('url');
		if (!$(this).hasClass('special') && !$(this).hasClass('has-slider')) {
			possiblePrimaryFilters.push($(this).data('url'));
		}

		if (!$(this).hasClass('has-slider')) {
			hideFilterBlockIfRequired($(this));
			if ($(this).hasClass('foldered')) {
				activateFolderedStructure();
				adjustFolderedStructure($(this));
			}
		} else {
			var slider_type = $(this).data('trigger');
			if ($('#'+slider_type+'_max').val() == 0) {
				$(this).addClass('hidden');
			}
		}
	});

	function hideFilterBlockIfRequired($block) {
		if (af_hideZeroMatches) {
			$block.toggleClass('hidden', !$block.find('li, option').not('.no-matches:not(.active), .first').length);
		}
	}

	function activateFolderedStructure() {
		if (folderedStructureActivated) {
			return;
		}
		$('.af-toggle-child').on('click', function(){
			$(this).closest('.af-parent-category').toggleClass('open');
			prepareCutOff($(this).closest('.af_filter').find('.toggle-cut-off'));
		});
		folderedStructureActivated = true;
	}

	function adjustFolderedStructure($block) {
		if (!af_subcatProducts) {
			$block.find('.af-parent-category.no-matches').each(function(){
				if ($(this).children('ul').find('li').not('.no-matches').length) {
					$(this).removeClass('no-matches').addClass('open');
				}
			});
		}
		if (af_hideZeroMatches) {
			$block.find('.af-parent-category').each(function(){
				var hideToggler = !$(this).children('ul').find('li').not('.no-matches').length;
				// hide foldered trigger if none of subcategories is available
				$(this).children('label').find('.af-toggle-child').toggleClass('hidden', hideToggler);
			})
		}
		// make sure parents of checked subcategories are open
		$block.find('.af-parent-category').not('.open').each(function(){
			if ($(this).children('ul').find('input:checked').length) {
				$(this).addClass('open');
			}
		});
	}

	// af_timeEnd = new Date().getTime()/1000;
	// console.dir(af_timeEnd - af_timeStart);

	$('#amazzing_filter').on('click', 'a[href="#"]', function(e){
		e.preventDefault();
	});
	if (af_dimZeroMatches) {
		// block checkboxes/radio with 0 matches
		$('#amazzing_filter').on('click', 'input.af.checkbox, input.af.radio', function(e){
			// prop checked becomes true fon unchecked inputs, right after click
			if ($(this).prop('checked') && $(this).closest('li').hasClass('no-matches')) {
				e.preventDefault();
				// .checked and .focus classes are used in uniform()
				$(this).prop('checked', false).parent().removeClass('checked').parent().removeClass('focus');
				if ($(this).hasClass('radio')) {
					var $parent = $(this).closest('.af_filter'),
						url = $('.cf[data-group="'+$parent.data('url')+'"]').data('url');
					$parent.find('input[data-url="'+url+'"]').prop('checked', true).parent().addClass('checked').parent().addClass('focus');
				}
			}
		});
	}

	activateAmazzingSliders();
	bindSelectorEvents();

	$('#amazzing_filter').on('change', 'input, select', function(){

		var trigger = $(this).attr('id'),
			$parent = $(this).closest('.af_filter');
		if ($parent.length) {
			trigger = $parent.attr('data-trigger');
			if (!$parent.hasClass('special') && !$parent.hasClass('has-slider')){
				af_primary_filter['trigger'] = trigger;
				af_primary_filter['url'] = $parent.attr('data-url');
			}
		}

		if ($(this).attr('type') == 'checkbox' || $(this).attr('type') == 'radio') {
			$(this).closest('li').toggleClass('active', $(this).prop('checked'));
			if ($(this).attr('type') == 'radio') {
				$(this).closest('li').siblings().removeClass('active');
			}
		} else if ($(this).prop('tagName') == 'SELECT') {
			if (!$(this).closest('.selector-with-customer-filter').hasClass('hidden') &&
				$(this).find('option[value="'+$(this).val()+'"]').hasClass('customer-filter')) {
				$(this).closest('.af_filter').find('.customer-filter-label').click();
				return;
			}
		}

		if (trigger != 'af_page') {
			$('#af_page').val(1);
		}

		if (!blockAjaxRequests) {
			if ($(this).parent().hasClass('hidden_inputs')){
				if (af_viewBtn && trigger != 'af_nb_items') {
					$('#af_nb_items').val(af_nb_items_original);
				}
			} else if (af_viewBtn)  {
				$('#af_nb_items').val(0);
			}
			updateSelectedFilters();
			updateUrlAndVerifyParams();
			if (!refreshRequired) {
				loadProducts(trigger);
			} else {
				window.location.reload();
			}
		}
	});

	$('.selectedFilters').on('click', 'a', function(e){
		e.preventDefault();
		var $parentRow = $(this).parent(),
			$groupBlock = $('.af_filter[data-url="'+$parentRow.data('group')+'"]');
		if ($(this).hasClass('close')){
			if ($groupBlock.hasClass('type-1') || $groupBlock.hasClass('type-2')) {
				var $input = $groupBlock.find('input[data-url="'+$parentRow.data('url')+'"]');
				$input.prop('checked', false).change();
				if ($.fn.uniform) {
					$input.parent().removeClass('checked');
				}
			} else if ($groupBlock.hasClass('type-3')) {
				$groupBlock.find('select').val(0).change();
			} else if ($groupBlock.hasClass('has-slider')) {
				var type = $groupBlock.data('trigger');
				$('#'+type+'_from').val($('#'+type+'_min').val());
				$('#'+type+'_to').val($('#'+type+'_max').val()).change();
			}
		} else if ($(this).hasClass('all')){
			blockAjaxRequests = true;
			$('.selectedFilters').find('.cf').find('a').not(unlocked_selector).click();
			blockAjaxRequests = false;
			$('#af_orderBy').change();
		} else if ($parentRow.hasClass('customer-filter-option')) {
			var id = $groupBlock.find('.customer-filter[data-url="'+$parentRow.data('url')+'"]').attr('id');
			$('.customer-filter-label[data-id="'+id+'"]').click();
		}
	});

	$('#amazzing_filter').on('click', '.customer-filter-label', function(){
		$(this).toggleClass('inactive');
		var locked = !$(this).hasClass('inactive'),
			iconClass = locked ? locked_class : unlocked_class,
			$input = $(this).find('input[type="hidden"]');
		$(this).find('a').first().attr('class', iconClass);
		if ($input.length) {
			var name = locked ? $input.data('name') : 'nosubmit';
			$input.attr('name', name).change();
		} else { // selects
			var val = locked ? $('option[id="'+$(this).data('id')+'"]').val() : 0;
			$(this).toggleClass('hidden-name', !locked).next().toggleClass('hidden', locked).find('select').val(val).change();
		}
	});

	//pagination
	$(document).on('click','.'+pagination_class+' a', function(e){
		e.preventDefault();
		var pageLink = $.trim($(this).attr('href')).split(page_link_rewrite_text+'='),
			page = pageLink.length > 1 ? parseInt(pageLink[1]) : 1;
		$('#af_page').val(page).change();
	});

	$(document).on('click', '.loadMore', function(){
		var page = parseInt($('#af_page').val()) + 1;
		$('#af_page').val(page).change();
	});

	$(document).on('submit', '.showall', function(e){
		e.preventDefault();
		var num = $(this).find('input[name="n"]').val(),
			$nSelect = $('select[name="n"]');
		if (!$nSelect.find('option[value="'+num+'"]').length) {
			var maxNum = $nSelect.find('option').last().val();
			if (parseInt(maxNum) >= parseInt(num)) {
				num = maxNum;
			} else {
				var newOptionHTML = '<option value="'+num+'">'+num+'</option>';
				$nSelect.append(newOptionHTML);
				try{$nSelect.uniform()}catch(err){};
			}
		}
		$nSelect.val(num).change();
	});

	$('.color_attribute input').on('change', function(){
		$(this).closest('.color_attribute').toggleClass('active', $(this).prop('checked'));
	});

	updateSelectedFilters();

	function updateSelectedFilters()
	{
		var html = '';
		$('.customer-filter-label').each(function(){
			var url = $('#'+$(this).data('id')).data('url'),
				groupURL = $(this).closest('.af_filter').data('url'),
				text = (af_includeGroup ? $(this).closest('.af_filter').find('.af_subtitle').text()+': ' : '')+$(this).closest('label').find('.name').text(),
				divClass = 'customer-filter-option'+($(this).hasClass('inactive') ? ' inactive' : ''),
				iClass = $(this).hasClass('inactive') ? unlocked_class : locked_class;
			html += renderSelectedOption(url, groupURL, text, divClass, iClass);
		});
		$('.af_filter').each(function(){
			var groupURL = $(this).data('url'),
				groupText = af_includeGroup && !$(this).hasClass('special') ? $(this).find('.af_subtitle').text()+': ' : '';
				iClass = times_class+' close';
			if ($(this).hasClass('has-slider')) {
				var values = getSliderValues($(this).data('trigger'));
				if (values.from > values.min || values.to < values.max) {
					var range = values.from+'-'+values.to,
						text = groupText+$(this).find('.prefix').first().text()+' '+range+' '+$(this).find('.suffix').first().text();
					html += renderSelectedOption(range, groupURL, text, 'slider-option', iClass);
				}
			} else {
				$(this).find('input, option:not(.first, .customer-filter)').filter(':checked, :selected').each(function() {
					var text = groupText+($(this).data('text') || $(this).closest('label').find('.name').text());
					html += renderSelectedOption($(this).data('url'), groupURL, text, '', iClass);
				});
			}
		});

		$('.clearAll').nextAll().remove();
		$('.clearAll').after(html);
		$('.clearAll').toggleClass('hidden', !$('.cf').find('a').not(unlocked_selector+', .all').length);
	}

	function renderSelectedOption(url, group, text, divClass, iClass)
	{
		return '<div class="cf '+divClass+'" data-url="'+url+'" data-group="'+group+'">'+text+' <a href="#" class="'+iClass+'"></a></div>';
	}

	if ($('.customer-filter-option').length && $(af_product_list_selector).length) {
		updateUrlAndVerifyParams();
	}

	function updateUrlAndVerifyParams() {
		var urlparams = {};
		$('div.cf').each(function(){
			if (!$(this).find(unlocked_selector).length) {
				var n = $(this).data('group'),
					v = $(this).data('url');
				if (n && v) {
					if (n in urlparams) {
						urlparams[n] += ','+v;
					} else {
						urlparams[n] = v;
					}
				}
			}
		});
		if (!load_more && $('#af_page').val() > 1) {
			urlparams[page_link_rewrite_text] = $('#af_page').val();
		}
		if (!(af_primary_filter['url'] in urlparams)) {
			// first try to apply it to a filter with multiple selection
			for (var n in urlparams){
				if (n in possiblePrimaryFilters && urlparams[n].indexOf(',') > -1) {
					af_primary_filter['url'] = n;
					af_primary_filter['trigger'] = getObjKeyByValue(dynamic_url_params, n);
					break;
				}
			}
			// if it was not applied, apply to the first available filter
			if (!(af_primary_filter['url'] in urlparams)) {
				for (var n in urlparams){
					if ($.inArray(n, possiblePrimaryFilters) > -1) {
						af_primary_filter['url'] = n;
						af_primary_filter['trigger'] = getObjKeyByValue(dynamic_url_params, n);
						break;
					}
				}
			}
		}

		var splittedUrl = decodeURIComponent(window.location.href).split('?'),
			url = splittedUrl[0].split('#')[0],
			params = splittedUrl.length == 2 ? splittedUrl[1] : '';

		params = unserialize(params, true, false);
		for (var n in urlparams){
			params[n] = urlparams[n];
		}

		if (af_includeSorting) {
			delete params.orderby;
			delete params.orderway;
			delete params.order;
			var order = {by: $('#af_orderBy').val(), way: $('#af_orderWay').val()};
			if (order.by+':'+order.way != $('#af_defaultSorting').val()) {
				if (is_17) {
					params.order = 'product.'+order.by+'.'+order.way;
				} else {
					params.orderby = order.by
					params.orderway = order.way
				}
			}
		}

		params = sortParams(params, af_primary_filter['url']);
		params = decodeURIComponent($.param(params, true));

		if (params.length) {
			params = '?'+params;
		}
		url = url+params;
		window.history.pushState(null, null, url);
		popstateURL = url;
	}

	function sortParams(params, primary_param) {
		var sortedParams = {};
		if (primary_param && primary_param in params) {
			sortedParams[primary_param] = params[primary_param];
		}
		for (var n in params){
			sortedParams[n] = params[n];
		}
		return sortedParams;
	}

	function loadProducts(trigger){
		if (blockAjaxRequests) {
			return;
		}

		// af_timeStart = new Date().getTime()/1000;
		var updateList = $('#af_nb_items').val() != 0;
		if (updateList) {
			if (load_more && trigger == 'af_page') {
				$('.dynamic-loading').addClass('loading');
			} else {
				$('.af_pl_wrapper').animate({'opacity': 0.3}, 350);
			}
		}
		if (af_viewBtn) {
			$('.viewFilteredProducts').addClass('loading').toggleClass('btn-primary', !updateList);
			if (!updateList) {
				$('.viewFilteredProducts').find('.af-total-count').html('...');
			}
		}
		if (af_dimZeroMatches) {
			// make sure values from selected disabled options are submit
			$('option:selected:disabled').prop('disabled', false);
		}
		var params = $('#af_form').serialize()+'&primary_filter='+af_primary_filter['trigger'];

		$.ajax({
			type: 'POST',
			url: af_ajax_path,
			dataType : 'json',
			data: {
				params: params,
				current_url: window.location.href,
				trigger: trigger,
			},
			success: function(r) {
				// console.dir(r);
				updateContent(r, trigger);
				if (af_viewBtn) {
					$('.viewFilteredProducts').removeClass('loading');
				}
			},
			error: function(r) {
				console.warn($(r.responseText).text() || r.responseText);
			}
		});
	}

	function updateContent(jsonData, trigger) {
		if ($('#af_nb_items').val() != 0) {
			updateProductList(jsonData, trigger);
		}
		if (trigger != 'af_page') {
			$('.af-total-count').html(parseInt(jsonData.products_num));
			updateFilteringBlocks(jsonData);
		}
		// if ($('#af_autoscroll').val() == 1 && $('.af_pl_wrapper').length &&
		// 	((af_compactView && (!load_more || trigger != 'af_page')) || // after any filter action in mobile view
		//    	(!af_compactView && !load_more && trigger == 'af_page'))) { // after selecting page in desktop view
		// 	autoscrollToTopOfTheList();
		// }
		if ($('#af_autoscroll').val() == 1 && $('.af_pl_wrapper').length && (!load_more || trigger != 'af_page')) {
			autoscrollToTopOfTheList();
		}
		if (typeof updateContentAfter != 'undefined') updateContentAfter(jsonData);
		// af_timeEnd = new Date().getTime()/1000;
		// af_timeEnd = af_timeEnd - af_timeStart
		// console.dir('all elements updated: '+af_timeEnd);
	}

	function updateProductList(jsonData, trigger) {
		if (load_more && trigger == 'af_page') {
			var $result = $('<div>'+utf8_decode(jsonData.product_list_html)+'</div>'),
				additional_products_html = $result.find(af_product_list_selector).html();
			$(af_product_list_selector).append(additional_products_html);
			$('.dynamic-loading').removeClass('loading');
			if (is_17 && !$('#js-product-list-top').html()) {
				$('#js-product-list-top').replaceWith(utf8_decode(jsonData.product_list_top_html));
			}
		} else {
			$(af_product_list_selector).replaceWith(utf8_decode(jsonData.product_list_html));
			$('.'+product_count_class).remove();
			if (is_17) {
				$('#js-product-list-top').replaceWith(utf8_decode(jsonData.product_list_top_html));
				$('#js-product-list-bottom').replaceWith(utf8_decode(jsonData.product_list_bottom_html));
			} else {
				$('#'+pagination_holder_id).replaceWith(utf8_decode(jsonData.pagination_html));
				$('#'+pagination_bottom_holder_id).replaceWith(utf8_decode(jsonData.pagination_bottom_html));
			}
			if (!load_more) {
				$('.'+pagination_class).addClass('visible');
			}
		}
		if (load_more) {
			var $countContainer = is_17 ? $('.dynamic-product-count') : $('.'+product_count_class);
			$countContainer.html(utf8_decode(jsonData.product_count_text));
			$('.dynamic-loading').toggleClass('hidden', jsonData.hide_load_more_btn);
		}
		var animationTime = is_17 ? 500 : 1000;
		$('.af_pl_wrapper').animate({'opacity': 1}, animationTime);
		if (!jsonData.products_num) {
			$('#'+pagination_holder_id+', #'+pagination_bottom_holder_id+', .'+product_count_class).addClass('hidden');
		}

		try {
			// display(), blockHover() defined in global.js
			if (display instanceof Function && $.totalStorage('display') != 'grid') display($.totalStorage('display'));
			blockHover();
			// compareButtonsStatusRefresh(), totalCompareButtons() defined in product-comparison.js
			compareButtonsStatusRefresh();
			totalCompareButtons();
		}catch(err){};
	}

	function updateFilteringBlocks(jsonData) {
		//checkboxes, radioboxes
		$('input.af.checkbox, input.af.radio').each(function(){
			var id = $(this).attr('id'),
				$li = $(this).closest('li'),
				$filter_block = $li.closest('.af_filter');
			if (id in jsonData.count_data) {
				$li.removeClass('no-matches');
				if (af_showCounters) {
					$li.find('.count').first().html(jsonData.count_data[id]);
				}
			} else if (!$li.hasClass('no-matches')){
				$li.addClass('no-matches');
				if (af_showCounters) {
					$li.find('.count').first().html('0');
				};
			}
			if (!$li.next().length && !$li.parent().hasClass('child-categories')) {
				hideFilterBlockIfRequired($filter_block);
			}
		});

		$('.af_filter.foldered').each(function(){
			adjustFolderedStructure($(this));
		});

		// selects
		$('.af-select').each(function(){
			var html = '',
				currentValue = $(this).val(),
				$available_options = $(this).closest('.af_filter').find('.dynamic-select-options').children();
			$available_options.each(function(){
				var id = $(this).data('id'),
					url = $(this).data('url'),
					text = $(this).data('text'),
					val = $(this).data('value'),
					count = (id in jsonData.count_data) ? parseInt(jsonData.count_data[id]) : 0;
				if (count || val == currentValue || $(this).hasClass('customer-filter') || !af_hideZeroMatches) {
					var cls = $(this).attr('class');
					html += '<option id="'+id+'" value="'+val+'" data-url="'+url+'" data-text="'+text+'" class="'+cls+'"'+((af_dimZeroMatches && !count) ? ' disabled' : '')+'>'+text+((af_showCounters && count)? ' ('+count+')' : '')+'</option>';
				}
			});
			$(this).children().first().nextAll().remove();
			if (html) {
				$(this).append(html).val(currentValue).closest('.af_filter').removeClass('hidden');
				try{$(this).uniform()}catch(err){};
			} else if (af_hideZeroMatches){
				$(this).closest('.af_filter').addClass('hidden');
			}
		});
	}

	function autoscrollToTopOfTheList() {
		var scrollTop = $(window).scrollTop(),
			windowHeight = $(window).height(),
			wrapperOffset = $('.af_pl_wrapper').offset().top;
		if (scrollTop > wrapperOffset || (scrollTop + windowHeight) < wrapperOffset) {
			$('html, body').animate({scrollTop: wrapperOffset - 150}, 100);
		}
	}

	function bindSelectorEvents() {
		$(document).off('change', 'select[name="n"]').on('change', 'select[name="n"]', function(){
			af_nb_items_original = $(this).val();
			$('#af_nb_items').val(af_nb_items_original).change();
		});

		$(document).off('change', '.selectProductSort').on('change', '.selectProductSort', function(e){
			var splitted = $(this).val().split(':'),
				orderBy = splitted[0],
				orderWay = splitted[1];
			applySorting(orderBy, orderWay);
		});
		if (is_17) {
			$('body').off('click', '.js-search-link').on('click', '.select-list.js-search-link', function(e) {
				e.preventDefault();
				$(this).addClass('current').siblings().removeClass('current');
				// todo: consider cases when "order=" is not present in href
				var value = $(this).attr('href').split('order=')[1];
					splitted = value.split('.'),
					orderBy = splitted[1],
					orderWay = splitted[2],
					sortingName = $(this).text(),
					$title = $(this).closest('.products-sort-order').find('.select-title'),
					$htmlElementsInTitle = $title.find('*');
				applySorting(orderBy, orderWay);
				$title.html(sortingName).append($htmlElementsInTitle);
			});
		}
	}

	function applySorting(orderBy, orderWay) {
		$('#af_orderBy').val(orderBy);
		$('#af_orderWay').val(orderWay).change();
	}

	function unserialize(params, exclude_dynamic_params) {
		var unserialized = {};
		if (params.length) {
			params = params.split('&');
			for (var i in params){
				var splitted = params[i].split('=');
				if (splitted.length == 2) {
					var key = getObjKeyByValue(dynamic_url_params, splitted[0]);
					if ((exclude_dynamic_params && !key) || (!exclude_dynamic_params && key)) {
						unserialized[splitted[0]] = splitted[1];
					}
				}
			}
		}
		return unserialized;
	}

	function getObjKeyByValue(obj, val) {
		for (var i in obj) {
			if (obj[i] === val) {
				return i;
			}
		}
		return false;
	}

	/**
	 * Copy of the php function utf8_decode()
	 */
	function utf8_decode (utfstr) {
		var res = '';
		for (var i = 0; i < utfstr.length;) {
			var c = utfstr.charCodeAt(i);
			if (c < 128) {
				res += String.fromCharCode(c);
				i++;
			} else if((c > 191) && (c < 224)) {
				var c1 = utfstr.charCodeAt(i+1);
				res += String.fromCharCode(((c & 31) << 6) | (c1 & 63));
				i += 2;
			} else {
				var c1 = utfstr.charCodeAt(i+1);
				var c2 = utfstr.charCodeAt(i+2);
				res += String.fromCharCode(((c & 15) << 12) | ((c1 & 63) << 6) | (c2 & 63));
				i += 3;
			}
		}
		return res;
	}
});

/**
* popstate is used here for reloading page when user clicks back/forward in browser
* without reloading filters are not updated, because URL was updated using history.pushState
*
* NOTE:older versions of safari and chrome trigger popstate on page load
* so we use variable popstateURL to make sure page is reloaded only after url was changed
* this variable is updated when new filers are applied. See updateUrlAndVerifyParams()
**/
var popstateURL = window.location.href;
$(window).on('popstate', function() {
	if (window.location.href != popstateURL) {
		window.location.reload();
	}
});

/*
* in some cases it might be useful to have activateAmazzingSliders in global context
*/
function activateAmazzingSliders() {
	$('.af_slider').each(function(){
		activateAmazzingSlider($(this).data('type'));
	});
	$('.slider_value').on('click', function(){
		if (!$(this).hasClass('edit')) {
			var mw = $(this).width()+'px',
				mh = $(this).height()+'px';
			$(this).addClass('edit').find('.input-text').css({'max-width': mw, 'max-height': mh}).focus();
		}
	}).find('.input-text').on('focusin', function(){
		$(this).data('val', $(this).val());
	}).on('focusout', function(){
		$(this).css({'max-width': '', 'max-height': ''}).closest('.slider_value').removeClass('edit');
	}).on('change', function(e){
		var val = $(this).val(); val = val ? parseFloat(val) : 0; $(this).val(val);
		var type = $(this).closest('.af_slider').data('type'),
			values = getSliderValues(type);
		if (values.from < values.min || values.to > values.max || values.to < values.from){
			e.preventDefault();
			$(this).val($(this).data('val'));
			return false;
		}
		$('.'+type+'_slider .from_display span.value').text(values.from);
		$('.'+type+'_slider .to_display span.value').text(values.to);
		$(this).focusout();
		activateAmazzingSlider(type);
	}).on('keydown', function(e){
		var code = e.keyCode;
		// allow: delete, backspace, tab, escape, enter, end, home, left, right
		if ($.inArray(code, [46,8,9,27,13,35,36,37,39]) !== -1) {
			return;
		}
		// Stop keypress if it is not number (48-57+shift, 96-105) or dot (190+shift, 110)
		if ((e.shiftKey || ((code < 48 || code > 57) && code != 190)) && (code < 96 || code > 105) && code != 110) {
			e.preventDefault();
		}
	});
}

function getSliderValues(type)
{
	var values = {
		min : parseFloat($('#'+type+'_min').val()),
		max : parseFloat($('#'+type+'_max').val()),
		from : parseFloat($('#'+type+'_from').val()),
		to : parseFloat($('#'+type+'_to').val()),
	};
	return values;
}

function activateAmazzingSlider(type) {
	var values = getSliderValues(type);
	$('#'+type+'_slider').slider({
		range: true,
		step: 1,
		min: values.min,
		max: values.max,
		values: [values.from, values.to],
		slide: function(e, ui) {
			$('.'+type+'_slider .from_display span.value').text(ui.values[0]);
			$('.'+type+'_slider .to_display span.value').text(ui.values[1]);
			$('#'+type+'_from').val(ui.values[0]);
			$('#'+type+'_to').val(ui.values[1]);
		},
		stop: function(e, ui) {
			$('#'+type+'_max').change();
		}
	});
}
/* since 2.8.0 */
