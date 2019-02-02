/*! Creative Popup v1.6.4
* creativeslider.webshopworks.com
* Copyright 2018 WebshopWorks */

jQuery(document.documentElement).addClass('creativepopup skin-light');

window.cpDefaultTr = [{
	transitionin: true,
	delayin: 0,
	durationin: 1000,
	easingin: "easeInOutQuint",
	fadein: true,
	offsetxin: 0,
	offsetyin: 0,
	rotatein: 0,
	rotatexin: 0,
	rotateyin: 0,
	scalexin: 1,
	scaleyin: 1,
	skewxin: 0,
	skewyin: 0,
	transformoriginin: "50% 50% 0",
	transformperspectivein: 500,
	clipin: "",
	widthin: "",
	heightin: "",
	radiusin: "",
	colorin: "",
	bgcolorin: "",
	filterin: "",
	texttransitionin: false,
	texttypein: "", // "chars_asc",
	textstartatin: "transitioninend",
	textdurationin: "", // 1000,
	texteasingin: "easeInOutQuint",
	textfadein: "true",
	textshiftin: 50,
	textoffsetxin: 0,
	textoffsetyin: 0,
	textrotatein: 0,
	textrotatexin: 0,
	textrotateyin: 0,
	textscalexin: 1,
	textscaleyin: 1,
	textskewxin: 0,
	textskewyin: 0,
	texttransformoriginin: "50% 50% 0",
	texttransformperspectivein: 500,
	static: "none"
}, {
	transitionout: true,
	startatout: "slidechangeonly + 0",
	durationout: 1000,
	easingout: "easeInOutQuint",
	fadeout: true,
	offsetxout: 0,
	offsetyout: 0,
	rotateout: 0,
	rotatexout: 0,
	rotateyout: 0,
	scalexout: 1,
	scaleyout: 1,
	skewxout: 0,
	skewyout: 0,
	transformoriginout: "50% 50% 0",
	transformperspectiveout: 500,
	clipout: "",
	widthout: "",
	heightout: "",
	radiusout: "",
	colorout: "",
	bgcolorout: "",
	filterout: ""
}, {
	loop: false,
	loopcount: 1,
	loopstartat: "allinend + 0",
	looprepeatdelay: 0,
	loopduration: 1000,
	loopeasing: "linear",
	loopopacity: 1,
	loopoffsetx: 0,
	loopoffsety: 0,
	looprotate: 0,
	looprotatex: 0,
	looprotatey: 0,
	loopscalex: 1,
	loopscaley: 1,
	loopskewx: 0,
	loopskewy: 0,
	looptransformorigin: "50% 50% 0",
	looptransformperspective: 500,
	loopclip: "",
	loopfilter: "",
	loopyoyo: false
}, {
	hover: false,
	hoverdurationin: 500,
	hovereasingin: "easeInOutQuint",
	hoverdurationout: "",
	hovereasingout: "",
	hovercolor: "",
	hoverbgcolor: "",
	hoverborderradius: "",
	hoveroffsetx: 0,
	hoveroffsety: 0,
	hoveropacity: "",
	hoverrotate: 0,
	hoverrotatex: 0,
	hoverrotatey: 0,
	hoverscalex: 1,
	hoverscaley: 1,
	hoverskewx: 0,
	hoverskewy: 0,
	hovertransformorigin: "50% 50% 0",
	hovertransformperspective: 500,
	hoveralwaysontop: true
}];
window.prepSliderForPreset = function() {
	var d = { properties: { width: 530, height: 360, type: 'responsive' }, layers: [] };
	lsSliderData.layers.forEach(function(layer) {
		var l = { properties: { title: layer.properties.title }, sublayers: [] };
		layer.sublayers.forEach(function(sublayer) {
			var sl = { subtitle: sublayer.subtitle, html: sublayer.html, type: sublayer.type };
			var tr = sublayer.transition;
			sl.styles = jQuery.extend({}, sublayer.styles);
			sl.transition = {};
			cpDefaultTr.forEach(function(def) {
				for (var prop in tr) {
					if (prop in def && def[prop] !== (typeof def[prop] === 'number' ? Number(tr[prop]) : tr[prop])) {
						sl.transition[prop] = tr[prop];
					}
				}
			});
			l.sublayers.push(sl);
		});
		d.layers.push(l);
	});
	return JSON.stringify(d);
};

// LISTING PAGE - SUGGESTED MODULES
if (location.search.match(/\bcontroller=AdminCreativePopup\b(?!.*\baction=edit\b)/i)) {
	window.onLoadSuggestedModules = function(data) {
		if (window.localStorage) {
			localStorage.lsSuggestedModules = data;
			localStorage.lsSuggestedModulesExp = Date.now() + 3600*24*1000;
		}
		jQuery(function($) {
			var $mods = $('.cp-suggested-modules');
			var $chld = $mods.children().remove();
			$(data).each(function() {
				if (!PS_Modules[this.id]) $mods.append(this);
			});
			$mods.children().length || $mods.append($chld.css('display', ''));

			var tw, twDur = 0.5, autoDur = 8000;
			$mods.prev().on('click.ls', '.dashicons-arrow-left, .dashicons-arrow-right', function() {
				if (tw && tw.ratio != 1) return;
				var dir = $(this).hasClass('dashicons-arrow-left') ? 1 : -1;
				var $old = $mods.children('.active');
				var $new = $($mods[0].children[ ($old.index() + dir + $mods[0].children.length) % $mods[0].children.length ]);
				if (!$old[0] || $old[0] == $new[0]) return;
				TweenLite.to($old[0], twDur, {
					xPercent: 100 * dir,
					onComplete: function() {
						$new.addClass('active');
						$old.removeClass('active');
					}
				});
				tw = TweenLite.fromTo($new[0], twDur, {xPercent: -100 * dir}, {xPercent: 0});
			});

			var autoplay = function() {
				$mods.prev().find('.dashicons-arrow-right').trigger('click.ls');
			};
			var interval = setInterval(autoplay, autoDur);
			$mods.parent().on('mouseenter.ls', function() {
				clearInterval(interval);
			}).on('mouseleave.ls', function() {
				interval = setInterval(autoplay, autoDur);
			});
		});
	};
	if (window.localStorage && localStorage.lsSuggestedModulesExp > Date.now()) {
		onLoadSuggestedModules(localStorage.lsSuggestedModules);
	} else {
		$.ajax('https://creativeslider.webshopworks.com/suggestion.php', {cache: true, dataType: "script"});
	}
}

['html', 'text'].forEach(function(plg) {
	// unwrap CDATA in case of <script type="text/html">
  jQuery.fn[plg] = (function(parent) {
  	return function() {
  		var res = parent.apply(this, arguments);
  		if (!arguments.length && this.is('script[type="text/html"]')) {
  			res = res.replace(/^\/\*<!\[CDATA\[\*\//i, '', res);
  			res = res.replace(/\/\*\]\]>\*\/$/, '', res);
  		}
  		return res;
  	};
  })(jQuery.fn[plg]);
});

jQuery(function($) {

	var $document = $(document),
			$window = $(window),
			$body = $(document.body);

	var root = location.pathname.split('/');
	root.length -= 2;
	root = root.join('/');
	var token = (location.search.match(/[?&]token=([^&]+)/) || [,''])[1];

	// put admin inside a div#wpwrap
	var $wpwrap = $('<div id="wpwrap">').appendTo($body);
	$wpwrap.siblings().appendTo($wpwrap);

	// remove message param from URL
	var message = location.href.match(/&message=[^&]*/);
	if (message && history.pushState) {
		history.pushState('', '', location.pathname + location.search.replace(message[0], ''));
	}

	$('#cp-import-button').click(function onClickImport(e) {
		e.preventDefault();
		kmUI.modal.open('#tmpl-upload-sliders', { width: 700, height: 350 });
	});

	// handle close buttons
	$body.on('click', '.cp-close', function() {
		$('.km-ui-overlay').click();
	});

	$body.on('click', '#cp-add-slider-button', function onClickAddNew(e) {
		e.preventDefault();

		var popup = $('#cp-add-slider-template-list').length ?
			$('#cp-add-slider-template-list') :
			$( $('#tmpl-cp-add-slider-list').html() ).prependTo('body');

		popup.css({
			marginTop: -popup.outerHeight() / 2,
			marginLeft: -popup.outerWidth() / 2
		}).on('submit close', function onClose() {
			TweenLite.to(popup, 0.3, { scale: 0.8, autoAlpha: 0 });
		});

		TweenLite.fromTo(popup, 0.3, { scale: 0.8, autoAlpha: 0 }, {
			delay: 0.2,
			css: { scale: 1, autoAlpha: 1 },
			onComplete: function() {
				popup.find('.inner input').focus();
			}
		});

		kmUI.overlay.open({ direction: 0 });
		kmUI.overlay.$element.on('click.cp', function onClickOverlay() {
			popup.trigger('close');
		});
	});

	$body.on('submit', '#cp-add-slider-template-list', function onSubmitTitle(e) {
		e.preventDefault();
		document.cookie = 'cpNewTitle=' + document.addNew.title.value;

		if ($('#password_addons').length) {
			// addons isn't connected
			var popup = $('#cp-addons-connect').length ?
				$('#cp-addons-connect') :
				$( $('#tmpl-cp-addons-connect').html() ).prependTo('body');

			popup.css({
				marginTop: -popup.outerHeight() / 2,
				marginLeft: -popup.outerWidth() / 2
			}).on('close', function onClose() {
				TweenLite.to(popup, 0.3, { scale: 0.8, autoAlpha: 0 });
			});

			TweenLite.fromTo(popup, 0.3, { scale: 0.8, autoAlpha: 0 }, {
				delay: 0.2,
				css: { scale: 1, autoAlpha: 1 },
				onComplete: function() {
					popup.find('.inner input').focus();
				}
			});

			kmUI.overlay.$element.off('click.cp');
			kmUI.overlay.$element.on('click.cp', function onClickOverlay() {
				popup.trigger('close');
			});
		} else {
			// addons connected
			openTemplateModal();
		}
	});

	$body.on('click', '.cp-add-empty', function onClickAddEmpty() {
		$(this).css('pointer-events', 'none');
		$(document.addNew).submit(function(e) {
			e.stopPropagation();
		}).find(':submit')[0].click();
	});

	$body.on('click', '#btn-connect-ps', function onClickConnectAddons() {
		$('.km-ui-overlay').click();
		$('#modal_addons_connect').modal('show');
	});

	// filtering popups fix
  var $filters = $('#cp-slider-filters');
	$('<input>', {name: 'token', value: token, type: 'hidden'}).prependTo($filters);
	$('<input>', {name: 'controller', value: 'AdminCreativePopup', type: 'hidden'}).prependTo($filters);

	$('.cp-sliders-list .header').on('click', 'td[data-orderby]', function() {
		$filters[0].order.value = $(this).data('orderby');
		$filters.submit();
	});

	$('#showAllSlider').change(function() {
		$filters[0].filter.value = $(this).is(':checked') ? 'all' : '';
		$filters.submit();
	});

	// post settings
	var $basic = $('.cp-post-basic').change(function(e) {
		$adv.find('select[name=post_type]').val(0);
		$adv.find('select[name=post_categories]').val(0);
		$adv.find('select[name=post_tags]').val(0);
		$adv.find('select[name=post_offset]').val(-1);
		$adv.find('select[name=post_order]').val('DESC');
		CP_PostOptions.change( $adv.find('select[name=post_orderby]').val(e.target.value) );
	});
	var $adv = $('.cp-post-advanced').change(function() {
		$basic.find('input[name=post_basic]').attr('checked', false);
	})
	$('#cp-post-settings-adv').attr('checked', !!localStorage.lsPostSettingsAdv).customCheckbox().change(function() {
		if (this.checked) {
			localStorage.lsPostSettingsAdv = 1;
			$basic.slideUp();
			$adv.slideDown();
		} else {
			localStorage.lsPostSettingsAdv = '';
			$basic.slideDown();
			$adv.slideUp();
		}
	}).change();

	// Import sample sliders
	var key = '', errorMsg = '';
	function openTemplateModal() {
		var popup = $('#cp-choose-template');
		if (!popup.length) popup = $( $('#tmpl-cp-choose-template').html() ).appendTo($body);

		popup.css({
			display: 'block',
			width: 'auto',
			top: 20,
			right: 20,
			bottom: 20,
			left: 20
		}).on('close', function onClose() {
			TweenLite.to(popup, 0.3, {
				css: { opacity: 0 },
				onComplete: function() {
					popup.css('display', 'none');
				}
			});
		});

		var $inner = popup.children('#popupgrid');
		if (!$inner.length) {
			$.get(popupstore_url+'?popupgrid', function(grid) {
				$('<link type="text/css" rel="stylesheet">').appendTo(document.head)
					.attr('href', popupstore_url+'modules/popupstore/views/css/popupgrid.min.css');
				$inner = $(grid).appendTo(popup).css({
					position: 'absolute',
					overflowY: 'scroll',
					width: '100%',
					top: 60,
					bottom: 0
				});
				var $empty = $(
					'<figure class="picture-item cp-add-empty" data-label="Create empty popup">'+
						'<img src="'+userSettings.url+'modules/creativepopup/views/img/admin/empty-popup.png" style="width:100%">'
				).prependTo('#grid');
				popup.find('.filter-options').css('visibility', 'hidden'); // hide filters while loading
				popup.find('.btn__import').css('display', ''); // show import buttons
				popup.find('.href-overlay, .picture-item__like').remove(); // remove likes
				popup.find('a[target]').each(function() { // update popup links
					$(this).attr({
						target: '_blank',
						href: popupstore_url + this.attributes.href.value
					});
				});

				$.ajax(popupstore_url+'modules/popupstore/views/js/shuffle.min.js', {
					dataType: 'script',
					cache: true,
					complete: function() {
						popup.find('.filter-options').css('visibility', ''); // reveal tags
						$.post(ajaxurl, {action: 'cp_test_popupstore'}, function(data) {
							data = JSON.parse(data);
							data.success ? key = data.key : lsImportError(errorMsg = data.msg);
						});
					}
				});
			});

			popup.on('click', 'a[data-import]', function onImport() {
				if (!key) {
					return lsImportError(errorMsg);
				}
				var v = _creativePopup.currentScript.src.split('?v=')[1] || '';
				var $figure = $(this).closest('figure').addClass('loading');
				// $('.logoload').css({
				// 	position: 'absolute',
				// 	display: 'block',
				// 	opacity: 1
				// }).appendTo($figure);
				$.getScript(popupstore_url+'?importPopup='+$(this).data('import')+'&key='+key+'&ver='+v);
			});

			var slideDur = 400;
			popup.on('click', '.cp-warning-close', function closeWarning() {
				$(this).closest('.cp-warning-cont').slideUp(slideDur, function() { $(this).remove() });
			});

			function scrollUp() {
				var scroll = { y: $inner.scrollTop() };
				scroll.y && TweenLite.to(scroll, 0.3, { y: 0, onUpdate: function() { $inner.scrollTop(scroll.y) } });
			}
			window.lsImportError = function(msg) {
				scrollUp();
				$('.cp-warning-close').click();
				$('figure.loading').removeClass('loading').find('.logoload').hide();
				$('<div class="cp-warning-cont"><h3 class="flaticon-warning">' +
					'<p>'+msg+'</p><i class="flaticon-delete cp-warning-close"/>')
					.insertBefore('#grid').slideUp(0).slideDown(slideDur);
			};
		}

		kmUI.overlay.$element.off('click.cp');
		kmUI.overlay.$element.on('click.cp', function onClickOverlay() {
			popup.trigger('close');
		});

		TweenLite.fromTo(popup, 0.3, { opacity: 0 }, {
			delay: 0.2,
			css: { opacity: 1 }
		});
		return popup;
	}

	// init addons connect
	if (~location.search.indexOf('&conf=32')) {
		history.pushState && history.pushState('', '', location.pathname + location.search.replace('&conf=32', ''));
		$(function() {
			kmUI.overlay.open({ direction: 0 });
			openTemplateModal();
		});
	}

	// init edit
	if (~location.search.indexOf('&edited=1')) {
		history.pushState && history.pushState('', '', location.pathname + location.search.replace('&edited=1', ''));
	}

	// start revisions video fix
	var $video = $('#cp-revisions-welcome video');
	if ($video.length) $video[0].play();

	$('.cp-publish-checkbox.larger').customCheckbox().on('change', function() {
		lsSliderData.properties.status = $(this).is(':checked');
	});

	// Listing view
	if (location.search.match(/\bcontroller=AdminCreativePopup\b/i) && !window.lsSliderData) {
		$('.cp-publish-checkbox').customCheckbox();
		$body.on('change', 'input.cp-publish-checkbox', function() {
			var $this = $(this);
			var id = $this.closest('[data-id]').data('id');
			var checked = $this.is(':checked') ? 1 : 0;
			var $update = $('<i class="dashicons dashicons-update">').appendTo(this.parentNode);
			$this.attr('disabled', true);
			TweenMax.to($update[0], 1, {
				rotation: 360,
				position: 'absolute',
				repeat: -1,
				ease: Linear.easeNone
			});
			$.get(ajaxurl, {action: 'cp_change_status', id: id, published: checked}, function(resp) {
				if (resp.match(/\bOK$/)) {
					$update.remove();
					$this.removeAttr('disabled')
						.closest('.slider-item').toggleClass('published', checked);
				}
			});
		});

		$('.cp-add-slider-button').click(function() {
			$('#cp-add-slider-button').click();
		});
	}

	// EDIT VIEW
	if (window.lsSliderData) {
		// EASY MODE
		var cpForm = $('#cp-slider-form')[0];
		var $easy = $('<a class="cp-checkbox small"><span>');

		$('#cp-easy-view').on('click', function onClickEasyMode(e) {
			e.stopImmediatePropagation();
			var easyOn = $easy.hasClass('on');
			$easy.addClass(easyOn ? 'off' : 'on').removeClass(!easyOn ? 'off' : 'on');
			window.localStorage && (localStorage.cpEasyMode = easyOn ? 'off' : 'on');
			runEasyMode();
		});

		function runEasyMode() {
			var easyOn = $easy.hasClass('on') && CP_activeLayerDataSet.length == 1;
			$easy.parent().css('display', CP_activeLayerDataSet.length == 1 ? '' : 'none');
			$('.cp-adv').css('display', !easyOn ? '' : 'none');
			$('.cp-easy').css('display', easyOn ? '' : 'none');

			if (easyOn) {
				var tr = CP_activeLayerDataSet[0].transition;
				var $col = $('.cp-easy-tr > ul');
				var include = [
					tr.transitionin === false ? [] : ['delayin', 'durationin', 'fadein'],
					['startatout', 'durationout', 'fadeout'],
					['loopcount', 'loopduration'],
					['hoverdurationin', 'hovercolor', 'hoverbgcolor']
				];
				cpDefaultTr.forEach(function(def, index) {
					if (
						index == 0 && tr.transitionin === false && !tr.texttransitionin ||
						index == 1 && tr.transitionout === false ||
						'loop' in def && !tr.loop || 'hover' in def && !tr.hover
					) {
						// show close icon after transition title / hide turned off transition properties
						return $col.eq(index).parent().addClass('cp-tr-off');
					}
					var easyTr = {};
					include[index].forEach(function(prop) {
						easyTr[prop] = prop in tr ? tr[prop] : def[prop];
					});
					for (var prop in def) {
						if (prop in tr && def[prop] !== (typeof def[prop] === 'number' ? Number(tr[prop]) : tr[prop])) {
							easyTr[prop] = tr[prop];
						}
						// leave cycle when text transition is turned off
						if (prop == 'texttransitionin' && !tr[prop]) break;
					}
					var $ul = $col.eq(index).html('');
					$ul.parent().removeClass('cp-tr-off');
					for (var prop in easyTr) {
						var $li = $(cpForm[prop]).closest('li');
						$li.clone().toggleClass('cp-easy-prop', !/fade|duration|startat|count|yoyo/.test(prop)).appendTo($ul);
						var $clone = $(cpForm[prop]).eq(0).val(easyTr[prop]);
						if ($clone.hasClass('cp-colorpicker')) {
							// init colorpicker
							$clone.parent().before($clone).remove();
							CreativePopup.addColorPicker($clone);
						} else if (~prop.indexOf('startat')) {
							// clone with modifier
							$li.next().clone().appendTo($ul);
						}
					}
					if (!index) {
						// highlight texttypein|parallaxlevel|static property if exists
						$(cpForm.texttypein).closest('.cp-easy-prop').addClass('cp-main-tr');
						if (tr.parallax) {
							$(cpForm.parallaxlevel).closest('li').clone().addClass('cp-easy-prop cp-main-tr').appendTo($ul);
						}
						if (tr.static && tr.static != 'none') {
							var staticLayer = $(cpForm.static.parentNode).prev().text();
							$li = $('<li><div>'+staticLayer+'</div></li>').addClass('cp-easy-prop cp-main-tr').appendTo($ul);
							$(cpForm.static).clone().val( $(cpForm.static).val() ).appendTo($li).wrap('<div>');
						}
					}
				});
			}
		}

		$(function initEasyMode() {
			$easy.addClass(window.localStorage && localStorage.cpEasyMode || 'on').prependTo('#cp-easy-view');

			$(CreativePopup).on('afterStartMultipleSelection', function() {
				$easy.parent().css('display', 'none');
				if (window.localStorage && localStorage.cpEasyMode != 'off') {
					$('.cp-easy').css('display', 'none');
					$('.cp-adv').css('display', '');
				}
			}).on('afterStopMultipleSelection', function() {
				$easy.removeClass('indeterminate').addClass(window.localStorage && localStorage.cpEasyMode || 'on')
					.parent().css('display', '');
			}).on('afterSelectMediaType', runEasyMode);

			$(CP_UndoManager).on('afterExecuteItem', function(e, cmd) {
				if (cmd === 'layer.transition' && $easy.hasClass('on')) {
					runEasyMode();
				}
			});
			runEasyMode();
		});

		$(document).on('click', '.cp-tr-off', function onClickAddTrType() {
			var prop = $(this).data('prop');
			$(cpForm[prop]).next().click();
			runEasyMode();

		}).on('click', '.cp-easy-tr .dashicons-no', function onClickRemoveTrType() {
			var prop = $(this).closest('.cp-easy-tr').data('prop');
			$(cpForm[prop]).next().click();
			runEasyMode();

		}).on('focus', '.cp-add-tr-prop', function onFocusTrPropList() {
			var tab = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ';
			var $ul = $(this).prev();
			var index = $(this.parentNode).index();
			var group = ([
				{ transitionin: 1, texttransitionin: !/img|media/.test(CP_activeLayerDataSet[0].media) },
				{ transitionout: 1 },
				{ loop: 1 },
				{ hover: 1 }
			])[index];
			this.innerHTML = this.children[0].outerHTML;
			for (var prop in cpDefaultTr[index]) {
				if (group[prop]) {
					var optgroup = $(cpForm[prop]).closest('header').prev().text();
					optgroup && $('<optgroup>', { label: optgroup }).appendTo(this);
				} else if (cpForm[prop].name) {
					var opt = $(cpForm[prop]).closest('li').children(':first').text();
					opt && $('<option>', { value: prop, html: tab + opt }).appendTo(this);
				}
			}
			if (!index) {
				// Other Settings
				$('<optgroup>', { label: $('#cp-layer-transitions+.cp-separator').text() }).appendTo(this);
				cpForm.parallaxlevel.name && $('<option>', {
					value: 'parallaxlevel',
					html: tab + $(cpForm.parallaxlevel.parentNode).prev().text()
				}).appendTo(this);
				cpForm.static.name && $('<option>', {
					value: 'static',
					html: tab + $(cpForm.static.parentNode).prev().text()
				}).appendTo(this);
			}

		}).on('change', '.cp-add-tr-prop', function onAddTrProp() {
			var index = $(this).closest('.cp-easy-tr').index();
			var prop = $(this).val();
			var openingTrs = {transitionin: 0, texttransitionin: 1};
			for (var tr in openingTrs) {
				if (!index && prop.startsWith('text') == openingTrs[tr] && !cpForm[tr].checked) {
					// turn on opening|text transition & insert default properties
					$(cpForm[tr]).next('.off').click();
					runEasyMode();
					if (!cpForm[prop].name) {
						// don't clone property later, it was autoincluded
						var $clone = $(cpForm[prop][0]);
					}
				}
			}
			if (!$clone) {
				var $prev, $li = $(cpForm[prop]).closest('li');
				for (var p in cpDefaultTr[index]) {
					// search for prev property
					if (p == prop) break;
					if (!cpForm[p].name) $prev = $(cpForm[p][0]).closest('li');
				}
				$li.clone().toggleClass('cp-easy-prop', !/fade|duration/.test(prop)).insertAfter($prev)
					.toggleClass('cp-main-tr', /texttypein|parallaxlevel/.test(prop));
				$clone = $(cpForm[prop][0]);
				if ($clone.hasClass('cp-colorpicker')) {
					// init colorpicker
					$clone.parent().before($clone).remove();
					CreativePopup.addColorPicker($clone);
				} else if (~prop.indexOf('startat')) {
					// insert startatoperator & startatvalue too
					$li.next().clone().insertAfter($prev.next());
				}
			}
			if (prop == 'parallaxlevel') {
				$(cpForm.parallax).next('.off').click();
			} else if (prop == 'static') {
				// create static property
				var staticLayer = $(cpForm.static.parentNode).prev().text();
				$li = $('<li><div>'+staticLayer+'</div></li>').addClass('cp-easy-prop cp-main-tr').appendTo(this.previousElementSibling);
				$(cpForm.static).val('forever').change()
					.clone().val('forever').appendTo($li).wrap('<div>');
			}
			this.selectedIndex = 0;
			this.blur();
			$clone[0].select ? $clone[0].select() : $clone[0].focus();

		}).on('click', '.cp-easy-prop', function onRemoveTrProp(e) {
			if (e.target != this) return;
			// click on ::before (x)
			var prop = $(':input[name]', this).prop('name');
			var xProp = { transitionin: 'delayin', texttransitionin: 'texttypein', parallax: 'parallaxlevel' };
			for (var p in xProp) {
				if (prop == xProp[p]) {
					// turn off opening|text|parallax transition when property is removed
					$(cpForm[p]).next('.on').click();
					return runEasyMode();
				}
			}
			var undoObj = {}, redoObj = {};
			var def = cpDefaultTr[ $(this).closest('.cp-easy-tr').index() ];
			undoObj[prop] = $(cpForm[prop][1]).val();
			redoObj[prop] = def[prop];
			if (~prop.indexOf('startat')) {
				// remove startatoperator & startatvalue too
				$(':input[name]', this.nextElementSibling).each(function() {
					undoObj[this.name] = $(cpForm[this.name][1]).val();
					redoObj[this.name] = def[this.name]
				});
			}
			if (undoObj[prop] != redoObj[prop]) {
				var updateInfo = [{
					itemIndex: CP_activeLayerIndexSet[0],
					undo: undoObj,
					redo: redoObj
				}];
				$.extend(CP_activeLayerDataSet[0].transition, redoObj);
				CP_DataSource.buildLayer();
				CP_UndoManager.add('layer.transition', CP_l10n.SBUndoPasteSettings, updateInfo);
			}
			runEasyMode();

		}).on('input', '.cp-easy :input', function onSyncAdvProp() {
			// synchronize easy property value with advanced property
			this.name && $(cpForm[this.name][1]).val( $(this).val() );

		}).on('click', '.cp-easy .cp-checkbox', function onSyncAdvCheckbox() {
			if (this.previousSibling.name) {
				$(cpForm[this.previousSibling.name][1]).next().click();
			}
		});

		$(document).on('click', '.cp-sublayer-options .cp-preset', function onClickOpenPresets() {
			kmUI.modal.open('#tmpl-cp-layer-presets', {
				width: 795,
				height: 482,
				direction: '',
				animate: 'fade',
				theme: 'blue'
			});
			var title = document.createTextNode( $(this).prev().text() );
			kmUI.modal.$window.find('.header b').before(title);

			// check selected layer(s) media type
			var noTextTr = CP_activeLayerDataSet.some(function(layer) {
				return layer.media == 'img' || layer.media == 'media';
			});

			// build accordion menu
			var $menu = kmUI.modal.$window.find('.cp-side-menu');
			var presetIndex = $(this.parentNode).index();
			var presets = ([cpOpeningPresets, cpClosingPresets, cpLoopPresets, cpHoverPresets])[presetIndex];
			presets.layers.forEach(function(slide, i) {
				if (noTextTr && slide.sublayers[0].transition.texttransitionin) return;
				var $item = $('<div class="cp-menu-wrapper"><a class="cp-menu-item">'+slide.properties.title+'</a>').appendTo($menu);
				if (slide.sublayers.length > 1) {
					$item.children().append('<i class="dashicons dashicons-arrow-right">');
					var $submenu = $('<div class="cp-submenu">').appendTo($item);
				}
				slide.sublayers.forEach(function(layer, j) {
					if (~layer.subtitle.indexOf('color') && noTextTr) return;
					layer.image = lsTrImgPath + (layer.transition.hover ? 'sample_slide_2_hover.png' : 'sample_slide_2.png');
					layer.media = noTextTr ? 'img' : 'text';
					noTextTr ? layer.styles.padding = 0 : delete layer.styles.padding;
					if (slide.sublayers.length > 1) {
						$('<div class="cp-menu-wrapper"><a class="cp-menu-item">'+layer.subtitle+'</a>').appendTo($submenu);
					}
				});
			});

			// build sample slider
			var $slider = kmUI.modal.$window.find('.cp-container');
			CreativePopup.populateSliderPreview($slider, [], presets);
			$slider.creativePopup({
				type: 'responsive',
				width: 530,
				height: 360,
				autoStart: false,
				pauseOnHover: false,
				navButtons: false,
				navStartStop: false,
				showCircleTimer: false,
				skinsPath: pluginPath + 'css/core/skins/'
			}).one('pageTimelineDidStart', function() {
				$menu.find('.cp-menu-wrapper:first').click();
			});

			var cp = _creativePopups[$slider.data('cpUID')];
			$menu.on('click', '>.cp-menu-wrapper', function onClickPresetMainItem() {
				var $item = $(this).addClass('active');
				var $prev = $item.siblings('.active').removeClass('active');
				if ($item[0] != $prev[0]) {
					$item.find('.cp-submenu').slideDown(300);
					$prev.find('.cp-submenu').slideUp(300);
				}
				$item.find('.cp-menu-wrapper:first').addClass('active').siblings('.active').removeClass('active');

			}).on('click', '.cp-submenu .cp-menu-wrapper', function onClickPresetSubItem(e) {
				e.stopPropagation();
				$(this).addClass('active').siblings('.active').removeClass('active');

			}).on('click', '.cp-menu-wrapper', function onClickPresetMenuItem() {
				var $parent = $(this.parentNode).closest('.cp-menu-wrapper');
				var index = $parent.length ? $parent.index() : $(this).index();
				var subindex = $parent.length ? $(this).index() : 0;
				$slider.one('pageChangeDidStart', function() {
					var $layers = cp.layers.$all.filter('[data-cp-slidein='+index+']');
					var wrapper = $layers.data()._LS.hover.enabled ? '.cp-wrapper' : '*';
					$layers.closest(wrapper).addClass('cp-hidden');
					$layers.eq($layers.length - 1 - subindex).closest(wrapper).removeClass('cp-hidden');
					cp.functions.resetSlideTimelines();
					cp.transitions.layers.timeline.create(true);
				}).creativePopup(index);
				cp.slides.current.index == index && $slider.trigger('pageChangeDidStart');
			});

			$('#cp-choose-tr').click(function onClickChoosePreset() {
				var $active = $menu.find('>.active, >.active .active');
				var index = $active.eq(0).index() - 1;
				var subindex = $active.length > 1 ? $active.eq(1).index() : 0;
				var tr = $.extend({}, cpDefaultTr[presetIndex], presets.layers[index].sublayers[subindex].transition);
				// don't override start at options except textstartatin
				delete tr.delayin, delete tr.startatout, delete tr.loopstartat;

				var updateInfo = [];
				CP_activeLayerIndexSet.forEach(function(layerIndex, i) {
					var layerData = CP_activeLayerDataSet[i];
					var undoObj = {};
					var redoObj = $.extend({}, tr);
					for (var prop in redoObj) {
						undoObj[prop] = layerData.transition[prop];
					}

					updateInfo.push({
						itemIndex: layerIndex,
						undo: undoObj,
						redo: redoObj
					});

					$.extend(layerData.transition, redoObj);
					CP_DataSource.buildLayer();
				});

				CP_UndoManager.add('layer.transition', CP_l10n.SBUndoPasteSettings, updateInfo);

				$slider.creativePopup('destroy');
				kmUI.overlay.$element.click();
				runEasyMode();
			});
		});

		// wrap slideprops title to span
		$('.cp-slide-options .row-helper :input:first-child').each(function() {
			if (this.previousSibling && !this.previousElementSibling && this.previousSibling.textContent.trim()) {
				$(this.previousSibling).wrap('<span class="slideproptitle">');
			}
		});

		var $prev = $('<div class="cp-prev-slide button"><span class="dashicons dashicons-controls-skipback">');
		var $next = $('<div class="cp-next-slide button"><span class="dashicons dashicons-controls-skipforward">');
		var $preview = $('<div class="cp-preview-btn button">\
			<svg viewbox="40 40 60 60" class="cp-preview-icon" style="width:16px; height: 16px;">\
				<polygon points="50,40 100,70 100,70 50,100, 50,40" fill="#fff">\
					<animate begin="indefinite" fill="freeze" attributeName="points" dur="500ms" calcMode="spline"\
						to="45,45 95,45 95,95, 45,95 45,45" keyTimes="0; 0.22; 0.33; 0.55; 0.66; 0.88; 1"\
						keySplines="0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1" />\
					<animate begin="indefinite" fill="freeze" attributeName="points" dur="500ms" calcMode="spline"\
						to="50,40 100,70 100,70 50,100, 50,40" keyTimes="0; 0.22; 0.33; 0.55; 0.66; 0.88; 1"\
						keySplines="0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1" />');
		$('<div class="cp-preview-nav">').append($prev, $preview, $next).appendTo('.cp-preview-td');
		var $animate = $preview.find('animate');

		$preview.click(function() {
			$('.cp-preview-button').click();
		});

		$prev.click(function() {
			if ($preview.hasClass('playing')) {
				$('#cp-preview-timeline').creativePopup('prev');
			} else {
				$('#cp-layer-tabs .active').prev().click().length || $('#cp-layer-tabs a:not(.unsortable):last').click();
			}
		});

		$next.click(function() {
			if ($preview.hasClass('playing')) {
				$('#cp-preview-timeline').creativePopup('next');
			} else {
				$('#cp-layer-tabs .active').next('a:not(.unsortable)').click().length || $('#cp-layer-tabs :first').click();
			}
		});

		new MutationObserver(function(mutations) {
			mutations.forEach(function(mutation) {
				if (mutation.attributeName == 'class') {
					var playing = $preview.hasClass('playing') ? 1 : 0;
					setTimeout(function() {
						$animate[playing].beginElement();
						TweenLite.fromTo($preview[0].children[0], 0.3, {rotation: -90 * playing}, {rotation: '+=90'});
					}, 100 * playing + 1);
					$preview.toggleClass('playing');
				}
			});
		}).observe($('.cp-preview-button')[0], {attributes: true});

		$('#cp-preview-layers').on('click', ':input', function(e) {
			// don't save popup when selecting submit button
			e.preventDefault();
			this.blur();
		});
	}

	/**
	 * Screen Options tab
	 */
	screenMeta = {
		element: null, // #screen-meta
		toggles: null, // .screen-meta-toggle
		page:    null, // #wpcontent

		init: function() {
			this.element = $('#screen-meta');
			this.toggles = $( '#screen-meta-links' ).find( '.show-settings' );
			this.page    = $('#wpcontent');

			this.toggles.click( this.toggleEvent );
		},

		toggleEvent: function() {
			var panel = $( '#' + $( this ).attr( 'aria-controls' ) );

			if ( !panel.length )
				return;

			if ( panel.is(':visible') )
				screenMeta.close( panel, $(this) );
			else
				screenMeta.open( panel, $(this) );
		},

		open: function( panel, button ) {

			$( '#screen-meta-links' ).find( '.screen-meta-toggle' ).not( button.parent() ).css( 'visibility', 'hidden' );

			panel.parent().show();
			panel.slideDown( 'fast', function() {
				panel.focus();
				button.addClass( 'screen-meta-active' ).attr( 'aria-expanded', true );
			});

			$document.trigger( 'screen:options:open' );
		},

		close: function( panel, button ) {
			panel.slideUp( 'fast', function() {
				button.removeClass( 'screen-meta-active' ).attr( 'aria-expanded', false );
				$('.screen-meta-toggle').css('visibility', '');
				panel.parent().hide();
			});

			$document.trigger( 'screen:options:close' );
		}
	};

	$(function() { screenMeta.init() });

	/**
	 * Help tabs.
	 */
	$('.contextual-help-tabs').delegate('a', 'click', function(e) {
		var link = $(this),
			panel;

		e.preventDefault();

		// Don't do anything if the click is for the tab already showing.
		if ( link.is('.active a') )
			return false;

		// Links
		$('.contextual-help-tabs .active').removeClass('active');
		link.parent('li').addClass('active');

		panel = $( link.attr('href') );

		// Panels
		$('.help-tab-content').not( panel ).removeClass('active').hide();
		panel.addClass('active').show();
	});

});

function lsCloseMediaWindow() {
	var $m = jQuery('#cp-media-window');
	$m.prev().remove();
	$m.remove();
}

/**
 * Fake object to simulate WP's media manager
 */

imgpath= '';

function lsInsertImage(src) {
	wpMediaFrame._state.selection.data = [{
		id: '',
		url: src,
		sizes: {
			full: { url: src }
		}
	}];

	var folder = src.match(/\/images\/(.*\/|)/);
	if (folder) imgpath = folder[1];

	wpMediaFrame.trigger('select');
	lsCloseMediaWindow();
}

wpMediaFrame = {
	open: function() {
		$imgInput = jQuery(this).prev();
		$imgNode = jQuery(this).children().children();
		// Create window
		jQuery('body').prepend( jQuery('<div>', { 'id': 'cp-media-window', 'class': 'cp-modal cp-box' })
			.append( jQuery('<h1>', { 'class': 'header', 'text': 'Image Manager' })
				.append( jQuery('<a>', { 'class': 'dashicons dashicons-no', 'style': 'margin-top:4px;' }).click(lsCloseMediaWindow))
			)
			.append( jQuery('<div>')
				.css('overflow', 'hidden')
				.append( jQuery('<iframe>').attr({
					width: '100%',
					height: '531',
					src: mediamanagerurl
				}).css('border', 'none'))
			)
		);

		// Create overlay
		jQuery('body').prepend( jQuery('<div>', { 'class' : 'cp-overlay'}).click(lsCloseMediaWindow));
	},
	on: function(event, handler) {
		this['on'+event] = handler;
	},
	trigger: function(event) {
		this['on'+event]();
	},
	state: function() {
		return this._state;
	},
	_state: {
		get: function(name) {
			return this[name];
		},
		selection: {
			first: function() {
				this._first = true;
				return this;
			},
			toJSON: function() {
				var first = this._first;
				this._first = false;
				return first ? this.data[0] : this.data;
			},
			data: []
		}
	}
};

wp = {
	media: function() {
		return wpMediaFrame;
	}
};
