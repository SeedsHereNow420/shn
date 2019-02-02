/*! Creative Popup v1.6.4
* creativeslider.webshopworks.com
* Copyright 2018 WebshopWorks */

(function($) {

	window.lsTransitionWindowIsOpen = false;
	window.lsTransitionGalleryTimeout = null;

	window.lsStartTransitionPreview = function( el, options ){

		// Parse settings
		var settings = $.extend( true, {}, {
			width: 300,
			height: 150,
			delay: 100,
			imgPath: '../assets/img/',
			skinPath: '../core/skins/',
			transitionType: '2d',
			transitionObject: null,
			showCircleTimer: false,
			pauseOnHover: false,
			skin: 'noskin',
			autoStart: true,
			slidedelay: 100
		}, options );

		settings.slideTransition = {
			type: settings.transitionType,
			obj: settings.transitionObject
		};

		// Add slider HTML markup
		$('<div class="transitionpreview" style="width: '+settings.width+'px; height: '+settings.height+'px;"> \
				<div class="cp-slide" data-cp="slidedelay: '+settings.delay+';"> \
					<img src="'+settings.imgPath+'sample_slide_1.png" class="cp-bg"> \
				</div> \
				<div class="cp-slide" data-cp="slidedelay: '+settings.delay+';"> \
					<img src="'+settings.imgPath+'sample_slide_2.png" class="cp-bg"> \
				</div> \
			</div>').appendTo(el);



		// Initialize the slider
		$(el).find('.transitionpreview').creativePopup(settings);
	};

	window.lsShowTransition = function( el ) {

		var $el = $( el ),

		// Create popup
		popup = $('<div class="km-ui-popup"> \
			<div class="inner cp-transition-preview"></div> \
		</div>').prependTo('body'),

		// Get transition index
		index = parseInt( $el.data('key') ) - 1,

		// Get viewport dimensions
		v_w = $(window).width(),

		// Get element dimensions
		e_w = $el.width(),

		// Get element position
		e_l = $el.offset().left,
		e_t = $el.offset().top,

		// Get toolip dimensions
		t_w = popup.outerWidth(),
		t_h = popup.outerHeight();

		// Position tooltip
		popup.css({ top: e_t - t_h - 14, left: e_l - (t_w - e_w) / 2  });

		// Fix top
		if(popup.offset().top - $(window).scrollTop() < 20) { // !!! slide preview position fix
			popup.css('top', e_t + 26);
		}

		// Fix left
		if(popup.offset().left < 20) {
			popup.css('left', 20);
		}

		// Get transition class
		var trclass = $el.closest('section').data('tr-type'),
			trtype, trObj;

		// Built-in 3D
		if(trclass == '3d_transitions') {
			trtype = '3d';
			trObj = lsTransitions['t'+trtype+''][index];

		// Built-in 2D
		} else if(trclass == '2d_transitions') {
			trtype = '2d';
			trObj = lsTransitions['t'+trtype+''][index];

		// Custom 3D
		} else if(trclass == 'custom_3d_transitions') {
			trtype = '3d';
			trObj = cpCustomTransitions['t'+trtype+''][index];

		// Custom 3D
		} else if(trclass == 'custom_2d_transitions') {
			trtype = '2d';
			trObj = cpCustomTransitions['t'+trtype+''][index];
		}

		// Init transition
		lsStartTransitionPreview( popup.find('.inner'), {
			transitionType: trtype,
			transitionObject: trObj,
			imgPath: lsTrImgPath,
			skinsPath: pluginPath+'css/core/skins/',
			delay: 100
		});
	};


	window.lsHideTransition = function( $parent ) {

		if( ! $parent || ! $parent.length ) {
			$parent = $('.km-ui-popup');
		}

		// Stop transition
		var $target = $('.cp-transition-preview', $parent);
		if( $target.length ) {
			$target.find('.transitionpreview').creativePopup( 'destroy', true );
			$target.parent().remove();
		}
	};

})(jQuery);