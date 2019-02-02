/**
*  @author    Amazzing
*  @copyright Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)*
*/

var ajax_action_path = window.location.href.split('#')[0]+'&ajax=1',
	productIds = [],
	productIdsTotal = 0;

$(document).ready(function() {

	$('ul.nav.nav-pills').prepend('<li class="li-docs"></li>');
	$('#module-documentation').prependTo('.li-docs').removeClass('hidden');

	$(document).on('click', 'a[href="#"], .list-group-item', function(e){
		e.preventDefault();
	}).on('click', '.resetFields', function(){
		$parent = $(this).parent();
		$parent.find('input[data-original]').each(function(){
			$(this).val($(this).data('original'));
		});
		$parent.siblings('.panel-footer').find('.saveSettings').click();
	});

	$('.menu-panel').find('.list-group-item').on('click', function(){
		$(this).addClass('active').siblings().removeClass('active');
		$($(this).attr('href')).addClass('active').siblings().removeClass('active');
	});

	$('.hookSelector').on('change', function(){
		var hookName = $(this).val(),
			params_string = 'action=UpdateHook&hook_name='+hookName;
		$('.special-hook-note').toggleClass('hidden', hookName != 'displayAmazzingFilter');
		$('#hook-settings').find('.ajax-warning').html('').addClass('hidden');
		$.ajax({
			type: 'POST',
			url: ajax_action_path+'&'+params_string,
			dataType : 'json',
			success: function(r) {
				console.dir(r);
				if ('warning' in r) {
					$('#hook-settings').find('.ajax-warning').html(utf8_decode(r.warning)).removeClass('hidden');
				}
				if ('positions_form_html' in r) {
					$('.dynamic-positions').html(utf8_decode(r.positions_form_html));
					$.growl.notice({ title: '', message: savedTxt});
				}
			},
			error: function(r) {
				console.warn($(r.responseText).text() || r.responseText);
			}
		});
	});

	$('#indexProducts').on('click', function(){
		var $parent = $(this).closest('.indexation-buttons');
		$parent.toggleClass('running');
		if (!$parent.hasClass('running')) {
			$('.shop-indexation-data').removeClass('running');
			return;
		}
		$('.shop-indexation-data').addClass('running');
		runAjaxProductIndexer();
	});

	$('.eraseIndex').on('click', function(){
		if (!confirm(areYouSureTxt)) {
			return;
		}
		var $indexationBox = $(this).closest('.shop-indexation-data'),
			id_shop = $indexationBox.data('shop');
		$.ajax({
			type: 'POST',
			url: ajax_action_path+'&action=EraseIndex&id_shop='+id_shop,
			dataType : 'json',
			success: function(r){
				// console.dir(r);
				if(r.deleted) {
					$.growl.notice({ title: '', message: deletedTxt});
					$indexationBox.removeClass('complete').find('.count.indexed').html('0').siblings('.count.missing').html(r.missing);
					$('.indexation-warning').removeClass('hidden');
					$indexationBox.find('.progress-bar.indexation').css('width', '0%').attr('aria-valuenow', '0');
				} else {
					$.growl.error({ title: '', message: errorTxt});
				}
			},
			error: function(r){
				console.warn($(r.responseText).text() || r.responseText);
			}
		});
	});

	$('.af').on('click', '.editTemplate, .addTemplate', function(e){
		e.preventDefault();
		$('.scrollUp').click();
		var id = 0;
		var template_controller = 'category';
		if ($(this).hasClass('editTemplate')){
			id = $(this).closest('.af_template').attr('data-id');
			template_controller = $(this).closest('.af_template').attr('data-controller');
		}
		var params_string = 'action=CallTemplateForm&template_controller='+template_controller+'&id_template='+id;
		$.ajax({
			type: 'POST',
			url: ajax_action_path+'&'+params_string,
			dataType : 'json',
			success: function(r) {
				if (!id) {
					$('.template-list.categories').append(utf8_decode(r.form_html));
				} else {
					$('.af_template[data-id="'+id+'"]').replaceWith(utf8_decode(r.form_html));
				}
				var $template = $('.af_template[data-id="'+r.id_template+'"]');
				prepareTemplate($template);
				$template.find('.template_settings').slideDown();
			},
			error: function(r) {
				console.warn($(r.responseText).text() || r.responseText);
			}
		});
	});

	function prepareTemplate($template) {
		$template.on('click', '.removeFilter', function(){
			$(this).closest('.filter').remove();
		}).on('click', '.toggleFilterSettings', function(){
			$(this).closest('.filter').toggleClass('show-settings').siblings().removeClass('show-settings');
		}).on('change', '.f-type', function(){
			var $excOptions = $(this).closest('.filter').find('.type-exc');
			$excOptions.removeClass('hidden').filter('.not-for-'+$(this).val()).addClass('hidden');
		}).on('click', '.addNewFilter', function(){
			var params = 'action=ShowAvailableFilters',
				response = function(r) {
					$('#dynamic-popup').find('.dynamic-content').html(utf8_decode(r.content));
					$('#dynamic-popup').find('.modal-title').html(utf8_decode(r.title));
				};
			ajaxRequest(params, response);
		}).on('change', '[name="template_controller"]', function(){
			var controller = $(this).val();
			$template.find('.controller-option').addClass('hidden').filter('.'+controller).removeClass('hidden');
		}).tooltip({selector: '.label-tooltip'});

		$template.find('[name="template_controller"]').change();
		prepareFilters($template.find('.f-list'));
		activateSortable();
	}


	function prepareFilters($filtersList) {
		$filtersList.find('.form-group.custom-name').find('.lang-'+id_language).find('input')
		.off('keyup').on('keyup', function(){
			var $nameHolder = $(this).closest('.filter').find('.name'),
				customName = $.trim($(this).val()) || $nameHolder.data('name');
			$nameHolder.html(customName);
		});
		$filtersList.find('.f-type').change();
	}

	$('#dynamic-popup').on('click', '.close', function(){
		$('.dynamic-content, .dynamic-header-txt').html('');
	});
	$(document).on('click', '.addSelectedFilters', function(){
		if ($(this).hasClass('btn-blocked')) {
			return;
		}
		var keys = [];
		$('.filter-group-item.selected').not('.hidden, .blocked').each(function(){
			keys.push($(this).data('key'));
		});
		var params = 'action=RenderFilterElements&keys='+keys.join(','),
			response = function(r) {
				var $list = $('.af_template.open').first().find('.f-list');
				$list.append(utf8_decode(r.html));
				prepareFilters($list);
				$('#dynamic-popup').find('.close').click();
			};
		ajaxRequest(params, response);
	});
	$(document).on('click', '.selectLanguage', function(){
		var idLang = $(this).data('lang');
		$(this).closest('form').find('.multilang').addClass('hidden').filter('.lang-'+idLang).removeClass('hidden');
	})

	function ajaxRequest(params, response){
		$.ajax({
			type: 'POST',
			url: ajax_action_path,
			data: params,
			dataType : 'json',
			success: function(r) {
				console.dir(r);
				response(r);
			},
			error: function(r) {
				console.warn($(r.responseText).text() || r.responseText);
			}
		});
	}

	function activateSortable() {
		$('.f-list.sortable').sortable({
			placeholder: 'sortable-filter-placeholder',
		});
	}

	$('.af').on('click', '.template-action', function(){
		var action = $(this).data('action'),
			$parent = $(this).closest('.af_template'),
			idTemplate = $parent.data('id');
		if (action == 'Delete' && !confirm(areYouSureTxt)) {
			return;
		}
		var params = 'action='+action+'Template&id_template='+idTemplate,
			response = function(r) {
				if (action == 'Delete' && r.success) {
					$parent.fadeOut(function(){$(this).remove()});
				} else if (action == 'Duplicate' && 'form_html' in r ) {
					$.growl.notice({ title: '', message: savedTxt});
					$('.template-list.categories').append(utf8_decode(r.form_html));
				}
			};
		ajaxRequest(params, response);
	});

	$(document).on('click', '.saveSettings', function(){
		var settings_form = $(this).closest('form').serialize();
		$.ajax({
			type: 'POST',
			url: ajax_action_path+'&action=SaveSettings',
			data: {
				settings_form: settings_form
			},
			dataType : 'json',
			success: function(r) {
				if (r.success) {
					$.growl.notice({ title: '', message: savedTxt});
				}
			},
			error: function(r) {
				console.warn($(r.responseText).text() || r.responseText);
			}
		});
	});

	$('.af').on('click', '.scrollUp', function(){
		var $tPanel = $(this).closest('.af_template');
		$tPanel.find('.template_settings').slideUp(function(){
			$tPanel.removeClass('open');
			$(this).html('');
		});
	});

	$('.template-list').on('click', '.saveTemplate', function(){
		$('.thrown-errors').remove();
		var $parent = $(this).closest('.af_template'),
			data = $(this).closest('.template-form').serialize();
		$.ajax({
			type: 'POST',
			url: ajax_action_path+'&action=SaveTemplate',
			data: data,
			dataType : 'json',
			success: function(r) {
				if ('errors' in r) {
					$parent.prepend(utf8_decode(r.errors));
					$('html, body').animate({scrollTop: $parent.offset().top - 150}, 300);
				} else {
					$parent.find('.scrollUp').click();
					var templateName = $('<div>'+$parent.find('input[name="template_name"]').val()+'</div>').text(); // extract only text
					$parent.find('.template-name').find('h4').html(templateName);
					$.growl.notice({ title: '', message: savedTxt});
				}
			},
			error: function(r) {
				console.warn($(r.responseText).text() || r.responseText);
			}
		});
	});

	$('.af').on('click', '.saveAvailableCustomerFilters', function(){
		var data = $(this).closest('form').serialize();
		$.ajax({
			type: 'POST',
			url: ajax_action_path+'&action=SaveAvailableCustomerFilters',
			data: data,
			dataType : 'json',
			success: function(r) {
				console.dir(r);
				if (r.success) {
					$.growl.notice({ title: '', message: savedTxt});
				}
			},
			error: function(r) {
				console.warn($(r.responseText).text() || r.responseText);
			}
		});
	});

	$(document).on('click', '.activateTemplate', function(e){
		e.preventDefault();
		$('.thrown-errors').remove();
		var id_template = $(this).closest('.af_template').attr('data-id'),
			active = $(this).hasClass('action-enabled') ? 0 : 1,
			$button = $(this);
		$.ajax({
			type: 'POST',
			url: ajax_action_path+'&action=ToggleActiveStatus',
			dataType : 'json',
			data: {
				id_template: id_template,
				active: active,
			},
			success: function(r) {
				if ('errors' in r) {
					$button.closest('.af_template').before(utf8_decode(r.errors));
				} else if(r.success) {
					$button.toggleClass('action-enabled action-disabled');
					$button.find('input[name="active"]').val(active)
				}
			},
			error: function(r) {
				console.warn($(r.responseText).text() || r.responseText);
			}
		});

	});

	$('.toggle-cron').on('click', function(){
		$(this).closest('.shop-indexation-data').toggleClass('show-cron')
		.closest('.grid-item').siblings().find('.shop-indexation-data').removeClass('show-cron');
	});

	$('.close-cron').on('click', function(){
		$(this).closest('.shop-indexation-data').removeClass('show-cron');
	});

	$('.install-override, .uninstall-override').on('click', function(){
		var $parent = $(this).closest('.override-item'),
			action = $(this).hasClass('install-override') ? 'addOverride' : 'removeOverride',
			override = $(this).data('override');
		$parent.find('.thrown-errors').remove();
		$.ajax({
			type: 'POST',
			url: ajax_action_path+'&action='+action+'&override='+override,
			dataType : 'json',
			success: function(r) {
				// console.dir(r);
				if ('errors' in r) {
					$parent.prepend(utf8_decode(r.errors));
				} else if (r.processed) {
					$.growl.notice({ title: '', message: savedTxt});
					$parent.toggleClass('installed not-installed');
				} else {
					$.growl.error({ title: '', message: errorTxt});
				}
			},
			error: function(r) {
				console.warn($(r.responseText).text() || r.responseText);
			}
		});
	});
});

function runAjaxProductIndexer() {
	$('.indexer-ajax-status').removeClass('hidden');
	$.ajax({
		type: 'POST',
		url: ajax_action_path+'&action=RunProductIndexer',
		dataType : 'json',
		success: function(r) {
			// console.dir(r);
			var totalMissing = 0;
			if ('indexation_data' in r) {
				for (var id_shop in r.indexation_data) {
					var indexed = r.indexation_data[id_shop]['indexed'],
						missing = r.indexation_data[id_shop]['missing'],
						$indexationBox = $('.shop-indexation-data[data-shop="'+id_shop+'"]');
					$indexationBox.find('.count.indexed').html(indexed).siblings('.count.missing').html(missing);
					if (!missing) {
						$indexationBox.addClass('complete');
					} else {
						totalMissing += missing;
					}
					var w = Math.round(100 - (missing/(missing + indexed)) * 100);
					$indexationBox.find('.progress-bar.indexation').css('width', w+'%').attr('aria-valuenow', w);
				}
				if (totalMissing && $('.indexation-buttons').hasClass('running')) {
					runAjaxProductIndexer();
				} else {
					$('.indexation-warning').addClass('hidden');
					$('#indexation').find('.running').removeClass('running');
				}
			}
		},
		error: function(r) {
			$('#indexation').find('.running').removeClass('running');
			console.warn($(r.responseText).text() || r.responseText);
		}
	});
}

function utf8_decode(utfstr) {
	var res = '';
	for (var i = 0; i < utfstr.length;) {
		var c = utfstr.charCodeAt(i);
		if (c < 128) {
			res += String.fromCharCode(c);
			i++;
		} else if ((c > 191) && (c < 224)) {
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
/* since 2.8.0 */
