/*! Creative Slider v6.6.5
* creativeslider.webshopworks.com
* Copyright 2017 WebshopWorks */

(function($){

	window._layerSlider.plugins.timeline = function( ls, $slider, sliderUID, userSettings ){

		var tl = this;

		tl.pluginData = {
			name: 'Timeline Plugin for CreativeSlider',
			version: '1.0.3',
			requiredLSVersion: '6.1.0',
			authorName: 'Kreatura',
			releaseDate: '2016. 12. 07.'
		};

		tl.pluginDefaults = {

			eventNamespace: 'LSTL',
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
			this.$strechedElement = $( '<div>' ).addClass( 'ls-timeline-streched' ).appendTo( this.$timelineElement );
			this.$infoElement = $( '<div>' ).addClass( 'ls-timeline-layer-info' ).appendTo( this.$timelineElement );
			this.$layerTweensWrapper = $( '<div>' ).addClass( 'ls-layer-tweens-wrapper' ).appendTo( this.$strechedElement );
			this.$timingsWrapper = $( '<div>' ).addClass( 'ls-timings-wrapper' ).appendTo( this.$strechedElement );

			this.$timelineElement.addClass( 'ls-slide-timeline ' + ( this.settings.showLayersInfo ? 'ls-show-layer-info' : '' ) );
			this.$strechedElement.append( $( '<div data-slidebar-for="' + sliderUID + '"></div>') );

			if( this.settings.showCurrentTime ){
 				this.$currentTimeElement = $( '<div>' ).addClass( 'ls-current-time' );
			}

			this.$legendWrapper = $( '<div class="ls-timeline-legend"><span class="ls-tl-leg">legend</span><span class="ls-tl-leg-delay">delay</span><span class="ls-tl-leg-in">in</span><span class="ls-tl-leg-out">out</span><span class="ls-tl-leg-textin">text in</span><span class="ls-tl-leg-textout">text out</span><span class="ls-tl-leg-loop">loop / middle</span><span class="ls-tl-leg-static">static</span></div>' ).appendTo( this.$timelineElement );
		};

		tl.round = function( value, decimal ){

			decimal = decimal ? decimal *= 10 : 1000;
			return Math.round( value * decimal ) / decimal;
		};

		tl.createEvents = function(){

			$slider.on( 'sliderDidLoad', function( event, data ){

				if( tl.settings.showCurrentTime ){
					tl.$strechedElement.find( '.ls-slidebar-slider' ).append( tl.$currentTimeElement );
				}
			}).on( 'slideTimelineDidCreate', function( event, data ){

				tl.slideTimelineDuration = data.slideTimelineDuration;
				tl.slideTimelineDurationRatio = data.slideTimeline.duration() < data.slideTimelineDuration ? 1 : tl.slideTimelineDuration / data.slideTimeline.duration();

				var	layersOnSlideTimeline = data.layersOnSlideTimeline.filter( ':not( .ls-bg )' ),
					layersCount = layersOnSlideTimeline.length,
					percent = tl.slideTimelineDuration / 100,
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

				for( var s=0; s<Math.floor(tl.slideTimelineDuration)+1; s++ ){
					secPercent = s * ( 100 / tl.slideTimelineDuration );
					secPercent = secPercent > 100 ? 100 : secPercent;
					className = secPercent >= 99 ? ' ls-timeline-seconds-last' : '';
					$( '<div class="ls-timeline-seconds' + className + '"><div class="ls-timeline-sec">' + s + 's</div></div>').css({
						left: secPercent + '%'
					}).appendTo( tl.$timingsWrapper );
					if( secPercent >= 100 ){
						break;
					}
				}

				for( var ds=1; ds<tl.slideTimelineDuration * 10; ds++ ){
					secPercent = ds * ( 100 / ( tl.slideTimelineDuration * 10 ) );
					secPercent = secPercent > 100 ? 100 : secPercent;
					if( ds%10 !== 0 ){
						$( '<div class="ls-timeline-dsecond"></div>').css({
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

					$layer = layersOnSlideTimeline.eq(l);

					layerData = $layer.data( ls.defaults.init.dataKey );

					// Creating markup
					$layerTweens = $( '<div>' ).addClass( 'ls-layer-tweens' ).data( 'lsTweensOfLayer', $layer ).prependTo( tl.$layerTweensWrapper );
					$layerTweensInner = $( '<div>' ).addClass( 'ls-layer-tweens-inner' ).appendTo( $layerTweens );

					if( tl.settings.showLayersInfo ){

						$layerInfo = $( '<div>' ).data( 'ls', {
							$layer: $layer,
							layerData: layerData,
							$outerWrapper: layerData.elements.$outerWrapper
						}).addClass( 'ls-layer-info' ).prependTo( tl.$infoElement ).on( 'mouseenter.' + tl.settings.eventNamespace, function(){

							$(this).data( 'ls' ).$outerWrapper.attr( 'id', 'ls-wrapper-highlighted' );

						}).on( 'mouseleave.' + tl.settings.eventNamespace, function(){

							$(this).data( 'ls' ).$outerWrapper.removeAttr( 'id' );
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
							hoverElHTML += '<tr><td>Original data-ls</td><td>' + layerData.original.dataLS.replace( /:/g, ': ' ).replace( /;/g, '; ' ) + '</td></tr>';

							if( $layer[0].src ){
								hoverElHTML += '<tr><td>Image URL</td><td>' + $layer[0].src + '</td></tr>';
							}
							$hoverEl = '<div class="ls-layer-properties"><table><thead><tr><th colspan="2">Layer Properties</th></tr></thead><tbody>' + hoverElHTML + '</tbody></table></div>';
 						}

						$layerInfo.append( '<h1>' + ( $hoverEl ? $hoverEl : '' ) + $layer[0].tagName + '<span>' + innerText + '</span></h1> ' );
					}


					// Transition in
					if( !layerData.is.static || ls.slides.next.index === layerData.settings.slideIn ){
						$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'ls-layer-tween ls-layer-transition-in' ).css({
							left: tl.round( layerData.timeline.transitioninstart ) / percent + '%',
							width: tl.round( layerData.timeline.transitioninend - layerData.timeline.transitioninstart ) / percent + '%'
						});
						if( layerData.timeline.transitioninstart > 0 ){
							$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'ls-layer-tween ls-layer-delay-in' ).css({
								left: 0,
								width: tl.round( layerData.timeline.transitioninstart ) / percent + '%'
							});
						}
					}

					// Text transition in
					$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'ls-layer-tween ls-layer-text-in' ).css({
						left: tl.round( layerData.timeline.textinstart ) / percent + '%',
						width: tl.round( layerData.timeline.textinend - layerData.timeline.textinstart ) / percent + '%'
					});

					// Loop transition
					loopEnd = layerData.loop.count === -1 ? tl.slideTimelineDuration : layerData.timeline.loopend;

					$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'ls-layer-tween ls-layer-loop' ).css({
						left: tl.round( layerData.timeline.loopstart ) / percent + '%',
						width: tl.round( loopEnd - layerData.timeline.loopstart ) / percent + '%'
					});

					// Text transition out
					$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'ls-layer-tween ls-layer-text-out' ).css({
						left: tl.round( layerData.timeline.textoutstart * 1000 ) / 1000 / percent + '%',
						width: tl.round( ( layerData.timeline.textoutend - layerData.timeline.textoutstart ) * 1000 ) / 1000 / percent + '%'
					});

					// Transition out
					if( ls.slides.next.index === layerData.settings.slideOut ){
						$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'ls-layer-tween ls-layer-transition-out' ).css({
							left: tl.round( layerData.timeline.transitionoutstart ) / percent + '%',
							width: tl.round( layerData.timeline.transitionoutend - layerData.timeline.transitionoutstart ) / percent + '%'
						});
					}

					// Static layer
					if( layerData.is.static ){
						if( ls.slides.next.index === layerData.settings.slideOut ){

							var staticClass = layerData.out.startAt === 'slidechangeonly' ? 'static' : 'showuntil';

							$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'ls-layer-tween ls-layer-' + staticClass ).css({
								left: 0,
								width: layerData.timeline.staticto === '100%' ?  layerData.timeline.staticto : tl.round( layerData.timeline.transitionoutstart ) / percent + '%'
							});
						}else{
							$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'ls-layer-tween ls-layer-static' ).css({
								left: tl.round( layerData.timeline.staticfrom ) / percent + '%',
								width: '100%'
							});
						}
					}else{
						$( '<div>' ).appendTo( $layerTweensInner ).addClass( 'ls-layer-tween ls-layer-showuntil' ).css({
							left: tl.round( layerData.timeline.transitioninend ) / percent + '%',
							width: tl.round( layerData.timeline.transitionoutstart - layerData.timeline.transitioninend ) / percent + '%'
						});
					}
				}

				// IF: no layers on slide
				if( layersCount === 0 ){
					$( '<div class="ls-layer-info no-layers"><h1>No layers found</h1></div>' ).prependTo( tl.$infoElement );
				}

			}).on( 'slideTimelineDidUpdate', function( event, data ){

				var currentTime;

				if( tl.settings.showCurrentTime ){

					currentTime = ( parseInt( tl.slideTimelineDuration / tl.slideTimelineDurationRatio * data.progress() * 1000 ) / 1000 );
					if( currentTime !== currentTime ){ currentTime = 0; }
					tl.$currentTimeElement.text( currentTime.toFixed(3) );
				}
			}).on( 'sliderDidDestroy', function(){

				tl.api.destroy();
			});
		};

		tl.api = {

			destroy: function(){
				// CLEAR: events
				$( window ).add( 'body' ).add( $slider ).add( $slider.find( '*') ).add( tl.$timelineElement ).add( tl.$timelineElement.find( '*' ) ).off( '.' + tl.settings.eventNamespace );
				if( this.removeElement ){
					// REMOVE: timeline element from DOM
					tl.$timelineElement.remove();
				}else{
					tl.$timelineElement.empty();
				}
			}
		};
	};

})(jQuery, undefined);
