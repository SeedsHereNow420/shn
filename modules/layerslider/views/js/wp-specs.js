/*! Creative Slider v6.6.5
* creativeslider.webshopworks.com
* Copyright 2018 WebshopWorks */

jQuery(document.documentElement).addClass('creativeslider');

window.lsDefaultTr = [{
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

// LISTING PAGE - SUGGESTED MODULES
if (location.search.match(/\bcontroller=AdminLayerslider\b(?!.*\baction=edit\b)/i)) {
	window.onLoadSuggestedModules = function(data) {
		if (window.localStorage) {
			localStorage.lsSuggestedModules = data;
			localStorage.lsSuggestedModulesExp = Date.now() + 3600*24*1000;
		}
		jQuery(function($) {
			var $mods = $('.ls-suggested-modules');
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

	// Update sliders per page fix
	$('#ls-screen-options-form').submit(function(e) {
		e.preventDefault();
		e.stopPropagation();
		var options = {};
		$(this).find('input').each(function() {
			if( $(this).is(':checkbox')) {
				options[$(this).attr('name')] = $(this).prop('checked');
			} else {
				options[$(this).attr('name')] = $(this).val();
			}
		});

		// Save settings
		$.post(ajaxurl, $.param({ action : 'ls_save_screen_options', options : options }), function() {
			location.href = location.href;
		});
	});

	// filtering sliders fix
	$('<input>', {name: 'token', value: token, type: 'hidden'}).prependTo('#ls-slider-filters');
	$('<input>', {name: 'controller', value: 'AdminLayerSlider', type: 'hidden'}).prependTo('#ls-slider-filters');
	// auto submit on change select
  $('#ls-slider-filters').on('change', 'select', function() { this.form.submit() });

	$('body').on('click', '#btn-connect-ps', function() {
		kmUI.modal.close();
		kmUI.overlay.close();
		setTimeout(function() {
			$('#modal_addons_connect').modal('show');
		}, 500);
	});

	// post settings
	var $basic = $('.ls-post-basic').change(function(e) {
		$adv.find('select[name=post_type]').val(0);
		$adv.find('select[name=post_categories]').val(0);
		$adv.find('select[name=post_tags]').val(0);
		$adv.find('select[name=post_offset]').val(-1);
		$adv.find('select[name=post_order]').val('DESC');
		LS_PostOptions.change( $adv.find('select[name=post_orderby]').val(e.target.value) );
	});
	var $adv = $('.ls-post-advanced').change(function() {
		$basic.find('input[name=post_basic]').attr('checked', false);
	})
	$('#ls-post-settings-adv').attr('checked', !!localStorage.lsPostSettingsAdv).customCheckbox().change(function() {
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
	var $ts = $('#ls-import-samples-button').click(function(e) {
		e.stopImmediatePropagation();
		e.preventDefault();

		if ($('#password_addons').length) {
			return kmUI.modal.open('#tmpl-template-store', { width: 500, height: 250 });
		}

		var popup = $('#ls-import-sliders-template');
		if (!popup.length) popup = $('<div id="ls-import-sliders-template">').appendTo($body);
		var top = $('#content').offset().top;
		popup.attr('style', 'position: fixed !important;').css({
			top : top,
			opacity: 0,
			width: '100%',
			height: 'calc(100vh - '+top+'px)',
			zIndex: 9999991,
			overflowY: 'scroll'
		}).show().animate({ opacity: 1 }, 300);

		popup.on('click', '.ls-import-close', function() {
			popup.hide();
			$body.css('overflow', '').off('keyup.lsimport');
		});

		$body.css('overflow', 'hidden').on('keyup.lsimport', function(e) {
			if (e.keyCode == 27) $('.ls-import-close').click();
		});

		if (!popup.children().length) {
			var domain = location.protocol+'//creativeslider.webshopworks.com';
			$.ajax({
				url: domain+'/explore-sliders',
				dataType: 'jsonp',
				success: function(data) {
					data.css.forEach(function(src) {
						$('<link type="text/css" rel="stylesheet">')
							.appendTo(document.head)
							.attr('href', src);
					});
					popup.html(data.html);
					popup.find('.filter-options').css('visibility', 'hidden'); // hide filters while loading
					popup.find('.btn__import').css('display', ''); // show import buttons
					popup.find('.href-overlay, .picture-item__like').remove(); // remove likes
					popup.find('a[target]').each(function() { // update slide links
						$(this).attr({
							target: '_blank',
							href: domain + this.attributes.href.value
						});
					});
					popup.children().css('min-height', '100%'); // css fix
					$x = $('<i class="flaticon-delete ls-import-close">').css({color: '#2f3d46', top: 10}).appendTo(popup);
					popup.scroll(function() { $x.css('top', popup.scrollTop() + 10) });
					$.ajax(data.js[0], {
						dataType: 'script',
						cache: true,
						complete: function() {
							popup.find('.filter-options').css('visibility', ''); // reveal tags
							// $.getScript(location.protocol+'//offlajn.com/index2.php?option=com_ls_import&task=request&slider=test'); // check domain
							$.post(ajaxurl, {action: 'ls_test_template_store'}, function(data) {
								data = JSON.parse(data);
								data.success ? key = data.key : lsImportError(errorMsg = data.msg);
							});
						}
					});
				},
				error: function() {
					console.log(arguments)
				}
			});
			popup.on('click', 'a[data-import]', function onImport() {
				if (!key) {
					return lsImportError(errorMsg);
				}
				var $figure = $(this).closest('figure').addClass('loading');
				$('.logoload').css({
					position: 'absolute',
					display: 'block',
					opacity: 1
				}).appendTo($figure);
				$.getScript(location.protocol+'//offlajn.com/index2.php?option=com_ls_import&task=psrequest&ver='+lsVersion+'&slider='+$(this).data('import')+'&key='+key);
			});
			var slideDur = 400;
			popup.on('click', '.ls-warning-close', function closeWarning() {
				$(this).closest('.ls-warning-cont').slideUp(slideDur, function() { $(this).remove() });
			});
			function scrollUp() {
				var scroll = { y: popup.scrollTop() };
				scroll.y && TweenLite.to(scroll, 0.3, { y: 0, onUpdate: function() { popup.scrollTop(scroll.y) } });
			}
			window.lsImportError = function(msg) {
				scrollUp();
				$('.ls-warning-close').click();
				$('figure.loading').removeClass('loading').find('.logoload').hide();
				$('<div class="ls-warning-cont"><h3 class="flaticon-warning">' +
					'<p>'+msg+'</p><i class="flaticon-delete ls-warning-close"/>')
					.insertBefore('#grid').slideUp(0).slideDown(slideDur);
			};
		}
	});

	// init addons connect
	if (~location.search.indexOf('&conf=32')) {
		history.pushState && history.pushState('', '', location.pathname + location.search.replace('&conf=32', ''));
		$ts.click();
	}
	// init edit
	if (~location.search.indexOf('&edited=1')) {
		history.pushState && history.pushState('', '', location.pathname + location.search.replace('&edited=1', ''));
	}

	var $video = $('#ls-revisions-welcome video');
	if ($video.length) $video[0].play();

	function createParamSelect(data, value, active) {
		$select = $('<select>', {name: data.name});
		if (value) {
			data.opts.forEach(function(opt) {
				if (opt.active == active) $('<option>', { value: opt[value], html: opt.option || opt.name }).appendTo($select);
			});
		} else {
			for (var key in data.opts) {
				$('<option>', { value: key, html: data.opts[key] }).appendTo($select);
			}
		}
		return $select;
	}

	function createParamTr(data, $param) {
		$tr = $('<tr>');
		$('<td>', {html: data.title}).appendTo($tr);
		$param.wrap('<td>').parent().appendTo($tr);
		$('<td>', {html: data.desc, 'class': 'desc'}).appendTo($tr);
		return $tr;
	}

	if (location.search.match(/\bcontroller=AdminLayerSlider\b/i)) {
    // replace shortcode
    $('.ls-save-shortcode span:last-child').each(function() {
      this.innerHTML = '[creative'+ this.innerHTML.slice(6);
      return false;
    });
    $('.ls-shortcode').each(function() {
      this.value = '[creative'+ this.value.slice(6);
    });

	}

	$(document.body).on('input', '.km-combo-input[data-hook]', function onChangeHook() {
		$(this).siblings('.ls-hook-update').removeClass('dashicons-yes').toggleClass('ls-visible', this.value != $(this).data('hook'));
	}).on('click', '.ls-hook-update', function onClickHookUpdate() {
		var $this = $(this);
		var $hook = $this.siblings('.km-combo-input');
		var rotate = TweenMax.to(this, 1, {
			rotation: 360,
			repeat: -1,
			ease: Linear.easeNone
		});
		var id = $this.closest('[data-id]').data('id');
		$.post(ajaxurl, {
			action: 'ls_update_hook',
			id: id,
			hook: $hook.val()
		}, function onUpdateHook(data) {
			rotate.kill();
			TweenLite.set($this[0], { rotation: 0 });
			data = JSON.parse(data);
			if (data.success) {
				$('[data-id='+id+'] [data-hook]').val(data.hook).attr('data-hook', data.hook).data('hook', data.hook);
				$this.addClass('dashicons-yes').removeClass('ls-visible');
			} else {
				alert(data.errorMsg);
			}
		});
	});

	$('.ls-slider-list-form').on('click', '.embed', function() {
		var id = $(this).data('id');
		var hook = $('[data-id='+id+'] [data-hook]').data('hook') || '';
		setTimeout(function() {
			$('.ls-modpos').attr('data-id', id).data('id', id)
				.find('.km-combo-input').val(hook).data({value: hook, hook: hook});
			// update shortcode
      $('.shortcode').each(function() {
        this.value = '[creative'+ this.value.slice(6);
      });
		}, 1);
	});

	var imgs = '/img/';

	if (window.lsSliderData) { // EDIT VIEW
		// Schedule Slide
		var datepicker = $('.ls-slide-options .ls-datepicker-input').datepicker({
			position: 'right top',
			classes: 'ls-datepicker',
			dateFormat: 'yyyy-mm-dd',
			timeFormat: 'hh:ii',
			todayButton: new Date(),
			clearButton: true,
			timepicker: true,
			keyboardNav: false,
			range: false,

			onSelect: function(formattedDate, date, inst) {
				inst.$el.trigger('change');
			}

		}).each(function() {
			var $this = $(this),
					key = $(this).data('schedule-key'),
					startDate = new Date(lsSliderData.layers[LS_activeSlideIndex].properties[ key ]);
			if (startDate.getTime()) {
				$this.data('datepicker').selectDate(startDate);
				$this.trigger('keyup');
			}

		}).attr('pattern', '\\d{4}-\\d\\d?-\\d\\d?( \\d\\d?:\\d\\d?)?|');


		// EASY MODE
		var lsForm = $('#ls-slider-form')[0];
		var $easy = $('<a class="ls-checkbox small"><span>');

		$('#ls-easy-view').on('click', function onClickEasyMode(e) {
			e.stopImmediatePropagation();
			var easyOn = $easy.hasClass('on');
			$easy.addClass(easyOn ? 'off' : 'on').removeClass(!easyOn ? 'off' : 'on');
			window.localStorage && (localStorage.lsEasyMode = easyOn ? 'off' : 'on');
			runEasyMode();
		});

		function runEasyMode() {
			var easyOn = $easy.hasClass('on') && LS_activeLayerDataSet.length == 1;
			$easy.parent().css('display', LS_activeLayerDataSet.length == 1 ? '' : 'none');
			$('.ls-adv').css('display', !easyOn ? '' : 'none');
			$('.ls-easy').css('display', easyOn ? '' : 'none');

			if (easyOn) {
				var tr = LS_activeLayerDataSet[0].transition;
				var $col = $('.ls-easy-tr > ul');
				var include = [
					tr.transitionin === false ? [] : ['delayin', 'durationin', 'fadein'],
					['startatout', 'durationout', 'fadeout'],
					['loopcount', 'loopduration'],
					['hoverdurationin', 'hovercolor', 'hoverbgcolor']
				];
				lsDefaultTr.forEach(function(def, index) {
					if (
						index == 0 && tr.transitionin === false && !tr.texttransitionin ||
						index == 1 && tr.transitionout === false ||
						'loop' in def && !tr.loop || 'hover' in def && !tr.hover
					) {
						// show close icon after transition title / hide turned off transition properties
						return $col.eq(index).parent().addClass('ls-tr-off');
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
					$ul.parent().removeClass('ls-tr-off');
					for (var prop in easyTr) {
						var $li = $(lsForm[prop]).closest('li');
						$li.clone().toggleClass('ls-easy-prop', !/fade|duration|startat|count|yoyo/.test(prop)).appendTo($ul);
						var $clone = $(lsForm[prop]).eq(0).val(easyTr[prop]);
						if ($clone.hasClass('ls-colorpicker')) {
							// init colorpicker
							$clone.parent().before($clone).remove();
							LayerSlider.addColorPicker($clone);
						} else if (~prop.indexOf('startat')) {
							// clone with modifier
							$li.next().clone().appendTo($ul);
						}
					}
					if (!index) {
						// highlight texttypein|parallaxlevel|static property if exists
						$(lsForm.texttypein).closest('.ls-easy-prop').addClass('ls-main-tr');
						if (tr.parallax) {
							$(lsForm.parallaxlevel).closest('li').clone().addClass('ls-easy-prop ls-main-tr').appendTo($ul);
						}
						if (tr.static && tr.static != 'none') {
							var staticLayer = $(lsForm.static.parentNode).prev().text();
							$li = $('<li><div>'+staticLayer+'</div></li>').addClass('ls-easy-prop ls-main-tr').appendTo($ul);
							$(lsForm.static).clone().val( $(lsForm.static).val() ).appendTo($li).wrap('<div>');
						}
					}
				});
			}
		}

		$(function initEasyMode() {
			$easy.addClass(window.localStorage && localStorage.lsEasyMode || 'on').prependTo('#ls-easy-view');

			$(LayerSlider).on('afterStartMultipleSelection', function() {
				$easy.parent().css('display', 'none');
				if (window.localStorage && localStorage.lsEasyMode != 'off') {
					$('.ls-easy').css('display', 'none');
					$('.ls-adv').css('display', '');
				}
			}).on('afterStopMultipleSelection', function() {
				$easy.removeClass('indeterminate').addClass(window.localStorage && localStorage.lsEasyMode || 'on')
					.parent().css('display', '');
			}).on('afterSelectMediaType', runEasyMode);

			$(LS_UndoManager).on('afterExecuteItem', function(e, cmd) {
				if (cmd === 'layer.transition' && $easy.hasClass('on')) {
					runEasyMode();
				}
			});
			runEasyMode();
		});

		$(document).on('click', '.ls-tr-off', function onClickAddTrType() {
			var prop = $(this).data('prop');
			$(lsForm[prop]).next().click();
			runEasyMode();

		}).on('click', '.ls-easy-tr .dashicons-no', function onClickRemoveTrType() {
			var prop = $(this).closest('.ls-easy-tr').data('prop');
			$(lsForm[prop]).next().click();
			runEasyMode();

		}).on('focus', '.ls-add-tr-prop', function onFocusTrPropList() {
			var tab = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ';
			var $ul = $(this).prev();
			var index = $(this.parentNode).index();
			var group = ([
				{ transitionin: 1, texttransitionin: !/img|media/.test(LS_activeLayerDataSet[0].media) },
				{ transitionout: 1 },
				{ loop: 1 },
				{ hover: 1 }
			])[index];
			this.innerHTML = this.children[0].outerHTML;
			for (var prop in lsDefaultTr[index]) {
				if (group[prop]) {
					var optgroup = $(lsForm[prop]).closest('header').prev().text();
					optgroup && $('<optgroup>', { label: optgroup }).appendTo(this);
				} else if (lsForm[prop].name) {
					var opt = $(lsForm[prop]).closest('li').children(':first').text();
					opt && $('<option>', { value: prop, html: tab + opt }).appendTo(this);
				}
			}
			if (!index) {
				// Other Settings
				$('<optgroup>', { label: $('#ls-layer-transitions+.ls-separator').text() }).appendTo(this);
				lsForm.parallaxlevel.name && $('<option>', {
					value: 'parallaxlevel',
					html: tab + $(lsForm.parallaxlevel.parentNode).prev().text()
				}).appendTo(this);
				lsForm.static.name && $('<option>', {
					value: 'static',
					html: tab + $(lsForm.static.parentNode).prev().text()
				}).appendTo(this);
			}

		}).on('change', '.ls-add-tr-prop', function onAddTrProp() {
			var index = $(this).closest('.ls-easy-tr').index();
			var prop = $(this).val();
			var openingTrs = {transitionin: 0, texttransitionin: 1};
			for (var tr in openingTrs) {
				if (!index && prop.startsWith('text') == openingTrs[tr] && !lsForm[tr].checked) {
					// turn on opening|text transition & insert default properties
					$(lsForm[tr]).next('.off').click();
					runEasyMode();
					if (!lsForm[prop].name) {
						// don't clone property later, it was autoincluded
						var $clone = $(lsForm[prop][0]);
					}
				}
			}
			if (!$clone) {
				var $prev, $li = $(lsForm[prop]).closest('li');
				for (var p in lsDefaultTr[index]) {
					// search for prev property
					if (p == prop) break;
					if (!lsForm[p].name) $prev = $(lsForm[p][0]).closest('li');
				}
				$li.clone().toggleClass('ls-easy-prop', !/fade|duration/.test(prop)).insertAfter($prev)
					.toggleClass('ls-main-tr', /texttypein|parallaxlevel/.test(prop));
				$clone = $(lsForm[prop][0]);
				if ($clone.hasClass('ls-colorpicker')) {
					// init colorpicker
					$clone.parent().before($clone).remove();
					LayerSlider.addColorPicker($clone);
				} else if (~prop.indexOf('startat')) {
					// insert startatoperator & startatvalue too
					$li.next().clone().insertAfter($prev.next());
				}
			}
			if (prop == 'parallaxlevel') {
				$(lsForm.parallax).next('.off').click();
			} else if (prop == 'static') {
				// create static property
				var staticLayer = $(lsForm.static.parentNode).prev().text();
				$li = $('<li><div>'+staticLayer+'</div></li>').addClass('ls-easy-prop ls-main-tr').appendTo(this.previousElementSibling);
				$(lsForm.static).val('forever').change()
					.clone().val('forever').appendTo($li).wrap('<div>');
			}
			this.selectedIndex = 0;
			this.blur();
			$clone[0].select ? $clone[0].select() : $clone[0].focus();

		}).on('click', '.ls-easy-prop', function onRemoveTrProp(e) {
			if (e.target != this) return;
			// click on ::before (x)
			var prop = $(':input[name]', this).prop('name');
			var xProp = { transitionin: 'delayin', texttransitionin: 'texttypein', parallax: 'parallaxlevel' };
			for (var p in xProp) {
				if (prop == xProp[p]) {
					// turn off opening|text|parallax transition when property is removed
					$(lsForm[p]).next('.on').click();
					return runEasyMode();
				}
			}
			var undoObj = {}, redoObj = {};
			var def = lsDefaultTr[ $(this).closest('.ls-easy-tr').index() ];
			undoObj[prop] = $(lsForm[prop][1]).val();
			redoObj[prop] = def[prop];
			if (~prop.indexOf('startat')) {
				// remove startatoperator & startatvalue too
				$(':input[name]', this.nextElementSibling).each(function() {
					undoObj[this.name] = $(lsForm[this.name][1]).val();
					redoObj[this.name] = def[this.name]
				});
			}
			if (undoObj[prop] != redoObj[prop]) {
				var updateInfo = [{
					itemIndex: LS_activeLayerIndexSet[0],
					undo: undoObj,
					redo: redoObj
				}];
				$.extend(LS_activeLayerDataSet[0].transition, redoObj);
				LS_DataSource.buildLayer();
				LS_UndoManager.add('layer.transition', LS_l10n.SBUndoPasteSettings, updateInfo);
			}
			runEasyMode();

		}).on('input', '.ls-easy :input', function onSyncAdvProp() {
			// synchronize easy property value with advanced property
			this.name && $(lsForm[this.name][1]).val( $(this).val() );

		}).on('click', '.ls-easy .ls-checkbox', function onSyncAdvCheckbox() {
			if (this.previousSibling.name) {
				$(lsForm[this.previousSibling.name][1]).next().click();
			}
		});

		$(document).on('click', '.ls-sublayer-options .ls-preset', function onClickOpenPresets() {
			kmUI.modal.open('#tmpl-ls-layer-presets', {
				width: 795,
				height: 482,
				direction: '',
				animate: 'fade',
				theme: 'blue'
			});
			var title = document.createTextNode( $(this).prev().text() );
			kmUI.modal.$window.find('.header b').before(title);

			// check selected layer(s) media type
			var noTextTr = LS_activeLayerDataSet.some(function(layer) {
				return layer.media == 'img' || layer.media == 'media';
			});

			// build accordion menu
			var $menu = kmUI.modal.$window.find('.ls-side-menu');
			var presetIndex = $(this.parentNode).index();
			var presets = ([lsOpeningPresets, lsClosingPresets, lsLoopPresets, lsHoverPresets])[presetIndex];
			presets.layers.forEach(function(slide, i) {
				if (noTextTr && slide.sublayers[0].transition.texttransitionin) return;
				var $item = $('<div class="ls-menu-wrapper"><a class="ls-menu-item">'+slide.properties.title+'</a>').appendTo($menu);
				if (slide.sublayers.length > 1) {
					$item.children().append('<i class="dashicons dashicons-arrow-right">');
					var $submenu = $('<div class="ls-submenu">').appendTo($item);
				}
				slide.sublayers.forEach(function(layer, j) {
					if (~layer.subtitle.indexOf('color') && noTextTr) return;
					layer.image = lsTrImgPath + (layer.transition.hover ? 'sample_slide_2_hover.png' : 'sample_slide_2.png');
					layer.media = noTextTr ? 'img' : 'text';
					noTextTr ? layer.styles.padding = 0 : delete layer.styles.padding;
					if (slide.sublayers.length > 1) {
						$('<div class="ls-menu-wrapper"><a class="ls-menu-item">'+layer.subtitle+'</a>').appendTo($submenu);
					}
				});
			});

			// build sample slider
			var $slider = kmUI.modal.$window.find('.ls-container');
			LayerSlider.populateSliderPreview($slider, [], presets);
			$slider.layerSlider({
				type: 'responsive',
				width: 530,
				height: 360,
				autoStart: false,
				pauseOnHover: false,
				navButtons: false,
				navStartStop: false,
				showCircleTimer: false,
				skinsPath: pluginPath + 'css/layerslider/skins/'
			}).one('pageTimelineDidStart', function() {
				$menu.find('.ls-menu-wrapper:first').click();
			});

			var ls = _layerSliders[$slider.data('lsSliderUID')];
			$menu.on('click', '>.ls-menu-wrapper', function onClickPresetMainItem() {
				var $item = $(this).addClass('active');
				var $prev = $item.siblings('.active').removeClass('active');
				if ($item[0] != $prev[0]) {
					$item.find('.ls-submenu').slideDown(300);
					$prev.find('.ls-submenu').slideUp(300);
				}
				$item.find('.ls-menu-wrapper:first').addClass('active').siblings('.active').removeClass('active');

			}).on('click', '.ls-submenu .ls-menu-wrapper', function onClickPresetSubItem(e) {
				e.stopPropagation();
				$(this).addClass('active').siblings('.active').removeClass('active');

			}).on('click', '.ls-menu-wrapper', function onClickPresetMenuItem() {
				var $parent = $(this.parentNode).closest('.ls-menu-wrapper');
				var index = $parent.length ? $parent.index() : $(this).index();
				var subindex = $parent.length ? $(this).index() : 0;
				$slider.one('slideChangeDidStart', function() {
					var $layers = ls.layers.$all.filter('[data-ls-slidein='+index+']');
					var wrapper = $layers.data()._LS.hover.enabled ? '.ls-wrapper' : '*';
					$layers.closest(wrapper).addClass('ls-hidden');
					$layers.eq($layers.length - 1 - subindex).closest(wrapper).removeClass('ls-hidden');
					ls.functions.resetSlideTimelines();
					ls.transitions.layers.timeline.create(true);
				}).layerSlider(index);
				ls.slides.current.index == index && $slider.trigger('slideChangeDidStart');
			});

			$('#ls-choose-tr').click(function onClickChoosePreset() {
				var $active = $menu.find('>.active, >.active .active');
				var index = $active.eq(0).index() - 1;
				var subindex = $active.length > 1 ? $active.eq(1).index() : 0;
				var tr = $.extend({}, lsDefaultTr[presetIndex], presets.layers[index].sublayers[subindex].transition);
				// don't override start at options except textstartatin
				delete tr.delayin, delete tr.startatout, delete tr.loopstartat;

				var updateInfo = [];
				LS_activeLayerIndexSet.forEach(function(layerIndex, i) {
					var layerData = LS_activeLayerDataSet[i];
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
					LS_DataSource.buildLayer();
				});

				LS_UndoManager.add('layer.transition', LS_l10n.SBUndoPasteSettings, updateInfo);

				$slider.layerSlider('destroy');
				kmUI.overlay.$element.click();
				runEasyMode();
			});
		});

		// load MISC options
		$.getJSON(ajaxurl, {action: 'ls_get_shop_params'}, function(params) {
			lsSliderData.properties.position = 'position' in lsSliderData.properties ? lsSliderData.properties.position : 10;
			$position = $('<input>', { name: 'position', type: 'number', value: lsSliderData.properties.position });
			createParamTr(params.position, $position).prependTo('.ls-settings-contents tbody:last');

			$tr = $('<tr>');
			$('<td>', {html: params.cats.title}).appendTo($tr);
			$td = $('<td colspan="2">').appendTo($tr);
			lsSliderData.properties.cats = typeof lsSliderData.properties.cats == 'string' ? JSON.parse(lsSliderData.properties.cats) : lsSliderData.properties.cats || ['all'];
			createParamSelect(params.cats, 'value').attr({ multiple: true, style: 'width:auto; height:250px;' }).val(lsSliderData.properties.cats).appendTo($td);
			lsSliderData.properties.pages = typeof lsSliderData.properties.pages == 'string' ? JSON.parse(lsSliderData.properties.pages) : lsSliderData.properties.pages || ['all'];
			createParamSelect(params.pages, 'value').attr({ multiple: true, style: 'width:auto; height:250px;' }).val(lsSliderData.properties.pages).appendTo($td);
			$('<br/><span style="font-size:11px; color:#898989; font-weight:400">'+params.cats.desc+'</span>').appendTo($td);
			$tr.prependTo('.ls-settings-contents tbody:last');

			lsSliderData.properties.lang = parseInt(lsSliderData.properties.lang) || 0;
			$lang = createParamSelect(params.lang, 'id_lang', 1).val(lsSliderData.properties.lang);
			createParamTr(params.lang, $lang).prependTo('.ls-settings-contents tbody:last');
			lsSliderData.properties.shop = parseInt(lsSliderData.properties.shop) || 0;
			$shop = createParamSelect(params.shop, 'id_shop', 1).val(lsSliderData.properties.shop);
			createParamTr(params.shop, $shop).prependTo('.ls-settings-contents tbody:last');
		});

		// v5.x compatibility fix: add root to image URLs, init thumbs, position fix
		var posFix = false, parallax = {};
		if (lsSliderData.properties) {
			var props = lsSliderData.properties;
			if (props.pauseonhover === true) $('select[name=pauseonhover]').val(props.pauseonhover = 'enabled');
			if (props.pauseonhover === false) $('select[name=pauseonhover]').val(props.pauseonhover = 'disabled');
			if (root && props.backgroundimage && props.backgroundimage.indexOf(imgs) == 0) {
				props.backgroundimage = root + props.backgroundimage;
			}
			props.backgroundimageThumb = props.backgroundimage;
			// slider background compatibility fixes
			if (props.background_size) props.globalBGSize = props.background_size, delete props.background_size;
			if (props.background_repeat) props.globalBGRepeat = props.background_repeat, delete props.background_repeat;
			if (props.background_position) props.globalBGPosition = props.background_position, delete props.background_position;
			if (props.background_behaviour) props.globalBGAttachment = props.background_behaviour, delete props.background_behaviour;
		}
		for (var i = 0; i < lsSliderData.layers.length; i++) {
			var slide = lsSliderData.layers[i];
			if (!slide.properties && !lsSliderData.layers[i]) {
				// last slide data is null in db
				lsSliderData.layers.pop();
				break;
			}
			if (root && slide.properties && slide.properties.background && slide.properties.background.indexOf(imgs) == 0) {
				slide.properties.background = root + slide.properties.background;
			}
			slide.properties.backgroundThumb = slide.properties.background;
			for (var j = 0; j < slide.sublayers.length; j++) {
				var layer = slide.sublayers[j];
				if (root && layer.image && layer.image.indexOf(imgs) == 0) {
					layer.image = root + layer.image;
				}
				if (posFix && layer.styles.top.indexOf('%') > 0 && layer.styles.left.indexOf('%') > 0) {
					layer.transition.position = 'fixed';
				}
				layer.imageThumb = layer.image;
			}
		}

		// wrap slideprops title to span
		$('.ls-slide-options .row-helper :input:first-child').each(function() {
			if (this.previousSibling && !this.previousElementSibling && this.previousSibling.textContent.trim()) {
				$(this.previousSibling).wrap('<span class="slideproptitle">');
			}
		});

		var $prev = $('<div class="ls-prev-slide button"><span class="dashicons dashicons-controls-skipback">');
		var $next = $('<div class="ls-next-slide button"><span class="dashicons dashicons-controls-skipforward">');
		var $preview = $('<div class="ls-preview-btn button">\
			<svg viewbox="40 40 60 60" class="ls-preview-icon" style="width:16px; height: 16px;">\
				<polygon points="50,40 100,70 100,70 50,100, 50,40" fill="#fff">\
					<animate begin="indefinite" fill="freeze" attributeName="points" dur="500ms" calcMode="spline"\
						to="45,45 95,45 95,95, 45,95 45,45" keyTimes="0; 0.22; 0.33; 0.55; 0.66; 0.88; 1"\
						keySplines="0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1" />\
					<animate begin="indefinite" fill="freeze" attributeName="points" dur="500ms" calcMode="spline"\
						to="50,40 100,70 100,70 50,100, 50,40" keyTimes="0; 0.22; 0.33; 0.55; 0.66; 0.88; 1"\
						keySplines="0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1; 0.1 0.8 0.2 1" />');
		$('<div class="ls-preview-nav">').append($prev, $preview, $next).appendTo('.ls-preview-td');
		var $animate = $preview.find('animate');

		$preview.click(function() {
			$('.ls-preview-button').click();
		});

		$prev.click(function() {
			if ($preview.hasClass('playing')) {
				$('#ls-preview-timeline .ls-nav-prev').click();
			} else {
				$('#ls-layer-tabs .active').prev().click().length || $('#ls-layer-tabs a:not(.unsortable):last').click();
			}
		});

		$next.click(function() {
			if ($preview.hasClass('playing')) {
				$('#ls-preview-timeline .ls-nav-next').click();
			} else {
				$('#ls-layer-tabs .active').next('a:not(.unsortable)').click().length || $('#ls-layer-tabs :first').click();
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
		}).observe($('.ls-preview-button')[0], {attributes: true});
	}

	// Skin/CSS Editor
	if(location.href.indexOf('controller=AdminLayerSliderSkin') != -1) {
		$('select[name="skin"]').change(function(e) {
			e.stopImmediatePropagation();
			location.href = 'index.php?controller=AdminLayerSliderSkin&token='+token+'&skin=' + $(this).children(':selected').val();
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
	var $m = jQuery('#ls-media-window');
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
		jQuery('body').prepend( jQuery('<div>', { 'id': 'ls-media-window', 'class': 'ls-modal ls-box' })
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
		jQuery('body').prepend( jQuery('<div>', { 'class' : 'ls-overlay'}).click(lsCloseMediaWindow));
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