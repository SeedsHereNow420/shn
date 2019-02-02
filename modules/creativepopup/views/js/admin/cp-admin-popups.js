/*! Creative Popup v1.6.4
* creativeslider.webshopworks.com
* Copyright 2018 WebshopWorks */

jQuery(function($) {

	var CP_GoogleFontsAPI = {

		results : 0,
		fontName : null,
		fontIndex : null,

		init : function() {

			// Prefetch fonts
			$('.cp-font-search input').focus(function() {
				CP_GoogleFontsAPI.getFonts();
			});

			// Search
			$('.cp-font-search > button').click(function(e) {
				e.preventDefault();
				var input = $(this).prev()[0];
				CP_GoogleFontsAPI.timeout = setTimeout(function() {
					CP_GoogleFontsAPI.search(input);
				}, 500);
			});

			$('.cp-font-search input').keydown(function(e) {
				if(e.which === 13) {
					e.preventDefault();
					var input = this;
					CP_GoogleFontsAPI.timeout = setTimeout(function() {
						CP_GoogleFontsAPI.search(input);
					}, 500);
				}
			});

			// Form save
			$('form.cp-google-fonts').submit(function() {
				$('ul.cp-font-list li', this).each(function(idx) {
					$('input', this).each(function() {
						$(this).attr('name', 'fontsData['+idx+']['+$(this).data('name')+']');
					});
				});

				return true;
			});

			// Select font
			$('.cp-google-fonts .fonts').on('click', 'li:not(.unselectable)', function() {
				CP_GoogleFontsAPI.showVariants(this);
			});

			// Add font event
			$('.cp-font-search').on('click', 'button.add-font', function(e) {
				e.preventDefault();
				CP_GoogleFontsAPI.addFonts(this);
			});

			// Back to results event
			$('.cp-google-fonts .variants').on('click', 'button:last', function(e) {
				e.preventDefault();
				CP_GoogleFontsAPI.showFonts(this);
			});

			// Close event
			$(document).on( 'click', '.cp-overlay', function() {

				if($(this).data('manualclose')) {
					return false;
				}

				if($('.cp-font-search .cp-pointer').length) {
					$(this).remove();
					$('.cp-font-search .cp-pointer').children('div.fonts').show().next().hide();
					$('.cp-font-search .cp-pointer').animate({ marginTop : 40, opacity : 0 }, 150, function() {
						this.style.display = 'none';
					});
				}
			});

			// Remove font
			$('.cp-font-list').on('click', 'a.remove', function(e) {
				e.preventDefault();
				$(this).parent().animate({ height : 0, opacity : 0 }, 300, function() {

					// Add notice if needed
					if($(this).siblings().length < 2) {
						$(this).parent().append(
							$('<li>', { 'class' : 'cp-notice', 'text' : CP_l10n.GFEmptyList })
						);
					}

					$(this).remove();
				});
			});

			// Add script
			$('.cp-google-fonts .footer select').change(function() {

				// Prevent adding the placeholder option tag
				if($('option:selected', this).index() !== 0) {

					// Selected item
					var item = $('option:selected', this);
					var hasDuplicate = false;

					// Prevent adding duplicates
					$('.cp-google-font-scripts input').each(function() {
						if($(this).val() === item.val()) {
							hasDuplicate = true;
							return false;
						}
					});

					// Add item
					if(!hasDuplicate) {
						var clone = $('.cp-google-font-scripts li:first').clone();
							clone.find('span').text( item.text() );
							clone.find('input').val( item.val() );
							clone.removeClass('cp-hidden').appendTo('.cp-google-font-scripts');
					}

					// Show the placeholder option tag
					$('option:first', this).prop('selected', true);
				}
			});

			// Remove script
			$('.cp-google-font-scripts').on('click', 'li a', function(event) {
				event.preventDefault();

				if($('.cp-google-font-scripts li').length > 2) {
					$(this).closest('li').remove();
				} else {
					alert(CP_l10n.GFEmptyCharset);
				}
			});
		},

		getFonts : function() {

			if(CP_GoogleFontsAPI.results == 0) {
				var API_KEY = 'AIzaSyC_iL-1h1jz_StV_vMbVtVfh3h2QjVUZ8c';
				$.getJSON('https://www.googleapis.com/webfonts/v1/webfonts?key=' + API_KEY, function(data) {
					CP_GoogleFontsAPI.results = data;
				});
			}
		},

		search : function(input) {

			// Hide overlay if any
			$('.cp-overlay').remove();

			// Get search field
			var searchValue = $(input).val().toLowerCase();

			// Wait until fonts being fetched
			if(CP_GoogleFontsAPI.results != 0 && searchValue.length > 2 ) {

				// Search
				var indexes = [];
				var found = $.grep(CP_GoogleFontsAPI.results.items, function(obj, index) {
					if(obj.family.toLowerCase().indexOf(searchValue) !== -1) {
						indexes.push(index);
						return true;
					}
				});

				// Get list
				var list = $('.cp-font-search .cp-pointer .fonts ul');

				// Remove previous contents and append new ones
				list.empty();
				if(found.length) {
					for(c = 0; c < found.length; c++) {
						list.append( $('<li>', { 'data-key' : indexes[c], 'text' : found[c]['family'] }));
					}
				} else {
					list.append($('<li>', { 'class' : 'unselectable' })
						.append( $('<h4>', { 'text' : 'No results were found' }))
					);
				}

				// Show pointer and append overlay
				$('.cp-font-search .cp-pointer').show().animate({ marginTop : 15, opacity : 1 }, 150);
				$('<div>', { 'class' : 'cp-overlay dim'}).prependTo('body');
			}
		},

		showVariants : function(li) {

			// Get selected font
			var fontName = $(li).text();
			var fontIndex = $(li).data('key');
			var fontObject = CP_GoogleFontsAPI.results.items[fontIndex]['variants'];
			CP_GoogleFontsAPI.fontName = fontName;
			CP_GoogleFontsAPI.fontIndex = fontIndex;

			// Get and empty list
			var list = $(li).closest('div').next().children('ul');
				list.empty();


			// Change header
			var title = CP_l10n.GFFontVariant.replace('%s', fontName);
			$(li).closest('.cp-box').children('.header').text(title);

			// Append variants
			for(c = 0; c < fontObject.length; c++) {
				list.append( $('<li>', { 'class' : 'unselectable' })
					.append( $('<input>', { 'type' : 'checkbox'} ))
					.append( $('<span>', { 'text' : ucFirst(fontObject[c]) }))
				);
			}

			// Init checkboxes
			list.find(':checkbox').customCheckbox();

			// Show variants
			$(li).closest('.fonts').hide().next().show();
		},

		showFonts : function(button) {
			$(button).closest('.cp-box').children('.header').text(CP_l10n.GFFontFamily);
			$(button).closest('.variants').hide().prev().show();
		},

		addFonts: function(button) {

			// Get variants
			var variants = $(button).parent().prev().find('input:checked');

			var apiUrl = [];
			var urlVariants = [];
			apiUrl.push(CP_GoogleFontsAPI.fontName.replace(/ /g, '+'));

			if(variants.length) {
				apiUrl.push(':');
				variants.each(function() {
					urlVariants.push( $(this).siblings('span').text().toLowerCase() );
				});
				apiUrl.push(urlVariants.join(','));
			}

			CP_GoogleFontsAPI.appendToFontList( apiUrl.join('') );
		},

		appendToFontList : function(url) {

			// Empty notice if any
			$('ul.cp-font-list li.cp-notice').remove();

			var index = $('ul.cp-font-list li').length - 1;

			// Append list item
			var item = $('ul.cp-font-list li.cp-hidden').clone();
				item.children('input:text').val(url);
				item.appendTo('ul.cp-font-list').attr('class', '');

			// Reset search field
			$('.cp-font-search input').val('');

			// Close pointer
			$('.cp-overlay').click();
		}
	};


	// Checkboxes
	$('.cp-global-settings :checkbox').customCheckbox();
	$('.cp-google-fonts :checkbox').customCheckbox();

	// Tabs
	$('.km-tabs').kmTabs();

	// Google Fonts API
	CP_GoogleFontsAPI.init();

	$('.cp-sliders-grid').on('click', '.slider-actions', function() {

		var $this 		= $(this),
			$item 		= $this.closest('.slider-item'),
			$wrapper 	= $item.children(),
			$sheet 		= $item.find('.slider-actions-sheet');

			$item.addClass('cp-opened');
			$sheet.removeClass('cp-hidden');
			$('.cp-hover', $item).hide();
			TweenLite.to($sheet[0], 0.3, {
				y: 0
			});
	});

	$('.cp-sliders-grid').on('mouseleave', '.slider-item', function() {

		var $this 	= $(this),
			$item 	= $this.closest('.slider-item'),
			$sheet 	= $item.find('.slider-actions-sheet');

			if( $item.hasClass('cp-opened') ) {

				$item.removeClass('cp-opened');
				$sheet.removeClass('cp-hidden');
				$('.cp-hover', $item).show();

				TweenLite.to($sheet[0], 0.4, {
					y: -150
				});
			}

	// Add sliderls-add-slider-template
	}).on('click', '#cp-add-slider-button', function(e) {
		e.preventDefault();

		var $button = $(this),
			$wrap 	= $button.closest('.slider-item-wrapper'),
			$sheet 	= $('#cp-add-slider-template');

		if( ! $sheet.length ) {
			$sheet = $( $('#tmpl-cp-add-slider-grid').text() ).appendTo( $wrap );
		}

		$sheet.find('input').focus();
		TweenLite.set( $sheet, { x: 240 });
		TweenLite.to( [ $button[0], $sheet[0] ], 0.5, {
			x: '-=240'
		});
	});


	$('.cp-sliders-list').on('click', '.slider-actions', function() {

		var $this = $(this);
		setTimeout(function() {
			var offsets = $this.position(),
				height 	= $('#cp-slider-actions-template').removeClass('cp-hidden').show().height();

			$('#cp-slider-actions-template').css({
				top : offsets.top + 15 - height / 2,
				right : 40,
				marginTop : 0,
				opacity : 1
			});

			$('#cp-slider-actions-template a:eq(0)').attr('href', $this.data('export-url') );
			$('#cp-slider-actions-template a:eq(1)').attr('href', $this.data('duplicate-url') );
			$('#cp-slider-actions-template a:eq(2)').attr('href', $this.data('revisions-url') );
			$('#cp-slider-actions-template a:eq(3)').attr('href', $this.data('remove-url') );


			setTimeout(function() {
				$('body').one('click', function() {
					$('#cp-slider-actions-template').addClass('cp-hidden');
				});
			}, 200);
		}, 100);
	});

	// Slider remove
	$('.cp-slider-list-form').on('click', 'a.remove', function(e) {
		e.preventDefault();
		if(confirm(CP_l10n.SLRemoveSlider)){
			document.location.href = $(this).attr('href');
		}
	});

	// Pagivation
	$('.pagination-links a.disabled').click(function(e) {
		e.preventDefault();
	});

	$(document).on('submit', '#cp-upload-modal-window form', function(e) {

		jQuery('.button', this).text(CP_l10n.SLUploadSlider).addClass('saving');

	});

	// Auto-update setup screen
	$('.button-activation').click(function(e) {
		e.preventDefault();

		var $wrapper 	= $(this).closest('.cp-box'),
			$guide 		= $wrapper.find('.guide'),
			$form 		= $wrapper.find('form'),
			width 		= $wrapper.outerWidth(true) + 10;

		$form.show().find('.key input').focus();

		TweenLite.set( $form, { x: width });
		TweenLite.to( [ $guide[0], $form[0] ], 0.5, {
			x: '-='+width,
			onComplete: function() {
				$guide.hide();
			}
		});
	});

	// Auto-update authorization
	$('.cp-auto-update form').submit(function(e) {

		// Prevent browser default submission
		e.preventDefault();

		var $form 	= $(this),
			$key 	= $form.find('.key input'),
			$button = $form.find('.button-save:visible');

		if( $key.val().length < 10 ) {
			alert(CP_l10n.SLEnterCode);
			return false;
		}

		// Send request and provide feedback message
		$button.data('text', $button.text() ).text(CP_l10n.working).addClass('saving');

		// Post it
		$.post( ajaxurl, $(this).serialize(), function(data) {

			// Parse response and set message
			data = $.parseJSON(data);

			// Success
			if(data && ! data.errCode ) {

				// Apply activated state to GUI
				$form.closest('.cp-box').addClass('active');

				// Display activation message
				$('p.note', $form).css('color', '#74bf48').text( data.message );

				// Make sure that features requiring activation will
				// work without refreshing the page.
				window.lsSiteActivation = true;

			// Alert message (if any)
			} else if(typeof data.message !== "undefined") {
				alert(data.message);
			}

			$button.removeClass('saving').text( $button.data('text') );
		});
	});


	// Auto-update deauthorization
	$('.cp-auto-update a.cp-deauthorize').click(function(event) {
		event.preventDefault();

		if( confirm(CP_l10n.SLDeactivate) ) {

			var $form = $(this).closest('form');

			$.get( ajaxurl, $.param({ action: 'cp_deauthorize_site'}), function(data) {

				// Parse response and set message
				var data = $.parseJSON(data);

				if( data && ! data.errCode ) {

					var $box 	= $form.closest('.cp-box'),
						$guide 	= $box.find('.guide'),
						$notice = $form.find('p.note');

					$notice.css('color', '#666').text('');

					$form.find('.key input').val('');
					$box.removeClass('active');

					$form.hide();
					$guide.css('transform', 'translateX(0px)').show();

					window.lsSiteActivation = false;
				}

				// Alert message (if any)
				if(typeof data.message !== "undefined") {
					alert(data.message);
				}
			});
		}
	});

	$('.cp-product-banner .unlock').click(function(e) {
		e.preventDefault();

		var $box 	= $('.cp-product-banner.cp-auto-update'),
			$window = $(window),
			wh 		= $window.height(),
			bt 		= $box.offset().top,
			bh 		= $box.height(),
			top 	= bt + (bh / 2) - (wh / 2);

			$('html,body').animate({ scrollTop: top }, 200, function() {
				setTimeout(function() {

					TweenMax.to( $box[0], 0.2, {
						yoyo: true,
						repeat: 3,
						ease: Quad.easeInOut,
						scale: 1.1
					});
				}, 100);
			});
	});

	// Permission form
	$('#cp-permission-form').submit(function(e) {
		e.preventDefault();
		if(confirm(CP_l10n.SLPermissions)) {
			this.submit();
		}
	});


	// Google CDN version warning
	$('#cp_use_custom_jquery').on('click', '.cp-checkbox', function(e) {
		if( $(this).hasClass('off') ) {
			if( ! confirm(CP_l10n.SLJQueryConfirm) ) {
				e.preventDefault();
				return false;

			}

			alert(CP_l10n.SLJQueryReminder);
		}
	});


	// News filters
	$('.cp-news .filters li').click(function() {

		// Highlight
		$(this).siblings().attr('class', '');
		$(this).attr('class', 'active');

		// Get stuff
		var page = $(this).data('page');
		var frame = $(this).closest('.cp-box').find('iframe');
		var baseUrl = frame.attr('src').split('#')[0];

		// Set filter
		frame.attr('src', baseUrl+'#'+page);

	});

});

var addLSOverlay = function() {

	var $overlay = jQuery('<div class="cp-overlay"></div>').prependTo('body');

	TweenLite.fromTo( $overlay[0], 0.4, {
		autoCSS: false,
		css: {
			y: -jQuery( window ).height()
		}
	},{
		autoCSS: false,
		ease: Quart.easeInOut,
		css: {
			y: 0
		}
	});

	setTimeout(function() {

		jQuery( '.cp-overlay' ).one( 'click', function() {

			// TweenLite.fromTo( this, 0.4, {
			// 	autoCSS: false,
			// 	css: {
			// 		y: 0
			// 	}
			// },{
			// 	autoCSS: false,
			// 	ease: Quart.easeInOut,
			// 	css: {
			// 		y: -jQuery( window ).height()
			// 	},
			// 	onComplete: function(){
			// 		jQuery('.cp-overlay,.cp-modal').remove();
			// 		jQuery('body').css('overflow', 'auto');
			// 	}
			// });

			jQuery('.cp-overlay,.cp-modal').remove();
			jQuery('body').css('overflow', 'auto');
		});

		jQuery( '.cp-modal b' ).one( 'click', function() {
			jQuery( '.cp-overlay' ).click();
		});

	}, 300);
};
