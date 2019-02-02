/*! Creative Popup v1.6.4
* creativeslider.webshopworks.com
* Copyright 2018 WebshopWorks */

(function($){

	window._creativePopup.plugins.timeline = function( ls, $slider, sliderUID, userSettings ){

		var tl = this;

		tl.pluginData = {
			version: '1.4',
			requiredLSVersion: '1.6.1'
		};

		tl.pluginDefaults = {

			eventNamespace: 'TL',
			showCurrentTime: true,
			showLayersInfo: true,
			showLayersProperties: false
		};

		tl.init = function(){

			this.applySettings();
			this.createMarkup();
			this.createEvents();
		};

		tl.applySettings = function(){

			this.settings = $.extend( true, {}, this.pluginDefaults, userSettings );
		};

		tl.createMarkup = function(){

			var	$isTimelineElement = $( '[data-timeline-for="' + $slider.attr( 'id' ) + '"]' );

			this.removeElement = $isTimelineElement.length ? false : true;
			this.$timelineElement = $isTimelineElement.length ? $isTimelineElement : $( '<div>').css({ maxWidth: $slider.css( 'max-width' ) }).insertAfter( $slider );
			this.$strechedElement = $( '<div>' ).addClass( 'cp-timeline-streched' ).appendTo( this.$timelineElement );
			this.$infoElement = $( '<div>' ).addClass( 'cp-timeline-layer-info' ).appendTo( this.$timelineElement );
			this.$layerTweensWrapper = $( '<div>' ).addClass( 'cp-layer-tweens-wrapper' ).appendTo( this.$strechedElement );
			this.$timingsWrapper = $( '<div>' ).addClass( 'cp-timings-wrapper' ).appendTo( this.$strechedElement );

			this.$timelineElement.addClass( 'cp-slide-timeline ' + ( this.settings.showLayersInfo ? 'cp-show-layer-info' : '' ) );
			this.$strechedElement.append( $( '<div data-slidebar-for="' + sliderUID + '"></div>') );

			if( this.settings.showCurrentTime ){
 				this.$currentTimeElement = $( '<div>' ).addClass( 'cp-current-time' );
			}

			this.$legendWrapper = $( '<div class="cp-timeline-legend"><span class="cp-tl-leg">legend</span><span class="cp-tl-leg-delay">delay</span><span class="cp-tl-leg-in">in</span><span class="cp-tl-leg-out">out</span><span class="cp-tl-leg-textin">text in</span><span class="cp-tl-leg-textout">text out</span><span class="cp-tl-leg-loop">loop / middle</span><span class="cp-tl-leg-static">static</span></div>' ).appendTo( this.$timelineElement );
		};

		tl.round = function( value, decimal ){

			decimal = decimal ? decimal *= 10 : 1000;
			return Math.round( value * decimal ) / decimal;
		};

		tl.createEvents = function(){

			$slider.on( 'popupDidLoad', function( event, data ){

				if( tl.settings.showCurrentTime ){
					tl.$strechedElement.find( '.cp-slidebar-slider' ).append( tl.$currentTimeElement );
				}
			}).on( 'pageTimelineDidCreate', function( event, data ){

				tl.pageTimelineDuration = data.pageTimelineDuration;
				tl.pageTimelineDurationRatio = data.pageTimeline.duration() < data.pageTimelineDuration ? 1 : tl.pageTimelineDuration / data.pageTimeline.duration();

				var	layersOnPageTimeline = data.layersOnPageTimeline.filter( ':not( .cp-bg )' ),
					layersCount = layersOnPageTimeline.length,
					percent = tl.pageTimelineDuration / 100,
					secPercent,
					$layer,
					layerData,
					layerTweens = [],
					$layerTweens,
					$layerTweensInner,
					$layerInfo,
					staticLeft,
					loopEnd,
					className;

				tl.$layerTweensWrapper.empty();
				tl.$timingsWrapper.empty();
				tl.$infoElement.empty();

				for( var s=0; s<Math.floor(tl.pageTimelineDuration)+1; s++ ){
					secPercent = s * ( 100 / tl.pageTimelineDuration );
					secPercent = secPercent > 100 ? 100 : secPercent;
					className = secPercent >= 99 ? ' cp-timeline-seconds-last' : '';
					$( '<div class="cp-timeline-seconds' + className + '"><div class="cp-timeline-sec">' + s + 's</div></div>').css({
						left: secPercent + '%'
					}).appendTo( tl.$timingsWrapper );
					if( secPercent >= 100 ){
						break;
					}
				}

				for( var ds=1; ds<tl.pageTimelineDuration * 10; ds++ ){
					secPercent = ds * ( 100 / ( tl.pageTimelineDuration * 10 ) );
					secPercent = secPercent > 100 ? 100 : secPercent;
					if( ds%10 !== 0 ){
						$( '<div class="cp-timeline-dsecond"></div>').css({
							left: secPercent + '%'
						}).appendTo( tl.$timingsWrapper );
					}
					if( secPercent >= 100 ){
						break;
					}
				}

				for( var l=0; l<layersCount; l++ ){

					var	$hoverEl,
						hoverElHTML = '',
						innerText;

					$layer = layersOnPageTimeline.eq(l);

					layerData = $layer.data( ls.defaults.init.dataKey );

					// Creating markup
					$layerTweens = $( '<div>' ).addClass( 'cp-layer-tweens' ).data( 'lsTweensOfLayer', $layer ).prependTo( tl.$layerTweensWrapper );
					$layerTweensInner = $( '<div>' ).addClass( 'cp-layer-tweens-inner' ).appendTo( $layerTweens );

					if( tl.settings.showLayersInfo ){

						$layerInfo = $( '<div>' ).data( 'cp', {
							$layer: $layer,
							layerData: layerData,
							$outerWrapper: layerData.elements.$outerWrapper
						}).addClass( 'cp-layer-info' ).prependTo( tl.$infoElement ).on( 'mouseenter.' + tl.settings.eventNamespace + sliderUID, function(){

							$(this).data( 'cp' ).$outerWrapper.attr( 'id', 'cp-wrapper-highlighted' );

						}).on( 'mouseleave.' + tl.settings.eventNamespace + sliderUID, function(){

							$(this).data( 'cp' ).$outerWrapper.removeAttr( 'id' );
						});

						if( $layer.is( 'img') ){
							$layerInfo.append( $('<div><a href="' + $layer.attr( 'src' ) + '" target="_blank"></a></div>').css({
								backgroundImage: 'url(' + $layer.attr( 'src' ) + ')'
							}) );
						}

 						if( $layer.children().first().length && $layer.children().first().is( 'iframe, video, audio' ) ){
							innerText = 'MEDIA LAYER';
 						}else{
 							innerText = $layer[0].innerText;
 						}

 						if( tl.settings.showLayersProperties ){
							hoverElHTML += '<tr><td>Type & Content</td><td>' + $layer[0].tagName + ( innerText ? ' | ' + innerText : '' ) + '</td></tr>';
							hoverElHTML += '<tr><td>Original styles</td><td>' + layerData.original.styles.replace( /:/g, ': ' ).replace( /;/g, '; ' ) + '</td></tr>';
							hoverElHTML += '<tr><td>Original data-cp</td><td>' + layerData.original.dataLS.replace( /:/g, ': ' ).replace( /;/g, '; ' ) + '</td></tr>';

							if( $layer[0].src ){
								hoverElHTML += '<tr><td>Image URL</td><td>' + $layer[0].src + '</td></tr>';
							}
							$hoverEl = '<div class="cp-layer-properties"><table><thead><tr><th colspan="2">Layer Properties</th></tr></thead><tbody>' + hoverElHTML + '</tbody></table></div>';
 						}

						$layerInfo.append( '<h1>' + ( $hoverEl ? $hoverEl : '' ) + $layer[0].tagName + '<span>' + innerText + '</span></h1> ' );
					}


					// Transition in
					if( !layerData.is.static || ls.slides.next.index === layerData.settings.slideIn ){
						$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'cp-layer-tween cp-layer-transition-in' ).css({
							left: tl.round( layerData.timeline.transitioninstart ) / percent + '%',
							width: tl.round( layerData.timeline.transitioninend - layerData.timeline.transitioninstart ) / percent + '%'
						});
						if( layerData.timeline.transitioninstart > 0 ){
							$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'cp-layer-tween cp-layer-delay-in' ).css({
								left: 0,
								width: tl.round( layerData.timeline.transitioninstart ) / percent + '%'
							});
						}
					}

					// Text transition in
					$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'cp-layer-tween cp-layer-text-in' ).css({
						left: tl.round( layerData.timeline.textinstart ) / percent + '%',
						width: tl.round( layerData.timeline.textinend - layerData.timeline.textinstart ) / percent + '%'
					});

					// Loop transition
					loopEnd = layerData.loop.count === -1 ? tl.pageTimelineDuration : layerData.timeline.loopend;

					$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'cp-layer-tween cp-layer-loop' ).css({
						left: tl.round( layerData.timeline.loopstart ) / percent + '%',
						width: tl.round( loopEnd - layerData.timeline.loopstart ) / percent + '%'
					});

					// Text transition out
					$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'cp-layer-tween cp-layer-text-out' ).css({
						left: tl.round( layerData.timeline.textoutstart * 1000 ) / 1000 / percent + '%',
						width: tl.round( ( layerData.timeline.textoutend - layerData.timeline.textoutstart ) * 1000 ) / 1000 / percent + '%'
					});

					// Transition out
					if( ls.slides.next.index === layerData.settings.slideOut ){
						$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'cp-layer-tween cp-layer-transition-out' ).css({
							left: tl.round( layerData.timeline.transitionoutstart ) / percent + '%',
							width: tl.round( layerData.timeline.transitionoutend - layerData.timeline.transitionoutstart ) / percent + '%'
						});
					}

					// Static layer
					if( layerData.is.static ){
						if( ls.slides.next.index === layerData.settings.slideOut ){

							var staticClass = layerData.out.startAt === 'slidechangeonly' ? 'static' : 'showuntil';

							$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'cp-layer-tween cp-layer-' + staticClass ).css({
								left: 0,
								width: layerData.timeline.staticto === '100%' ?  layerData.timeline.staticto : tl.round( layerData.timeline.transitionoutstart ) / percent + '%'
							});
						}else{
							$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'cp-layer-tween cp-layer-static' ).css({
								left: tl.round( layerData.timeline.staticfrom ) / percent + '%',
								width: '100%'
							});
						}
					}else{
						$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'cp-layer-tween cp-layer-showuntil' ).css({
							left: tl.round( layerData.timeline.transitioninend ) / percent + '%',
							width: tl.round( layerData.timeline.transitionoutstart - layerData.timeline.transitioninend ) / percent + '%'
						});
					}
				}

				// IF: no layers on slide
				if( layersCount === 0 ){
					$( '<div class="cp-layer-info no-layers"><h1>No layers found</h1></div>' ).prependTo( tl.$infoElement );
				}

			}).on( 'pageTimelineDidUpdate', function( event, data ){

				var currentTime;

				if( tl.settings.showCurrentTime ){

					currentTime = ( parseInt( tl.pageTimelineDuration / tl.pageTimelineDurationRatio * data.progress() * 1000 ) / 1000 );
					if( currentTime !== currentTime ){ currentTime = 0; }
					tl.$currentTimeElement.text( currentTime.toFixed(3) );
				}
			}).on( 'popupDidDestroy', function(){

				tl.api.destroy();
			});
		};

		tl.api = {

			destroy: function(){
				// CLEAR: events
				$( window ).add( 'body' ).add( $slider ).add( $slider.find( '*') ).add( tl.$timelineElement ).add( tl.$timelineElement.find( '*' ) ).off( '.' + tl.settings.eventNamespace + sliderUID );
				if( this.removeElement ){
					// REMOVE: timeline element from DOM
					tl.$timelineElement.remove();
				}else{
					tl.$timelineElement.empty();
				}
			}
		};
	};

})(jQuery);