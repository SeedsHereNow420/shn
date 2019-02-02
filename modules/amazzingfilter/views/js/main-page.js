/**
*  2007-2017 PrestaShop
*
*  @author    Amazzing
*  @copyright Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

$(document).ready(function(){
	$('.selectedFilters, .manage-permanent-filters').addClass('hidden');
	$('.af.dynamic-loading').addClass('force-hidden');
	$('#amazzing_filter').on('click', '.viewFilteredProducts.no-layout', function(e){
		e.preventDefault();
		$btn = $(this);
		$.ajax({
			type: 'POST',
			url: af_ajax_path,
			dataType : 'json',
			data: {
				action: 'prepareLayout',
			},
			success: function(r) {
				if ('layout' in r) {
					var $container = is_17 ? $('#main') : $('#center_column');
					$container.html(utf8_decode(r.layout));
					$('.af.dynamic-loading').removeClass('force-hidden').insertAfter('.af_pl_wrapper');
					if (!af_compactView && $('#af_reload_action').val() == 1) {
						$('#af_nb_items').val(af_nb_items_original);
						$btn.remove();
						af_viewBtn = false;
					} else {
						$btn.removeClass('no-layout');
					}
					refreshRequired = false;
					$('#af_orderBy').change();
					$('.manage-permanent-filters, .selectedFilters').removeClass('hidden');
				}
			},
			error: function(r) {
				console.warn($(r.responseText).text() || r.responseText);
			}
		});
	});

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

/*
// this code may be used in upcoming versions
$(document).on('click', '.submitFilter', function(e){
	e.preventDefault();
	var $catSelector = $(this).closest('form').find('[name="c[]"]')
	var id_category = $catSelector.val();
	if (!id_category) {
		alert('Please, select a category');
	}
	var link_params = {'id_category': id_category};
	$catSelector.closest('.af_filter').siblings().each(function(){
		var group_url = $(this).data('url'),
			option_url = $(this).find('option:selected').data('url');
		link_params[group_url] = option_url;
	});
	$.ajax({
		type: 'POST',
		url: af_ajax_path,
		dataType : 'json',
		data: {
			link_params: link_params,
			action: 'getRedirectLink',
		},
		success: function(r)
		{
			console.dir(r);
			if ('url' in r) {
				window.location.href = r.url;
			}
		},
		error: function(r)
		{
			console.warn(r.responseText);
		}
	});
});
*/
/* since 2.7.0 */
