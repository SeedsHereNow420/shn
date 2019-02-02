/*! Creative Popup v1.6.4
* creativeslider.webshopworks.com
* Copyright 2018 WebshopWorks */

// Stores the database ID of
// currently editing slider.
var CP_sliderID = 0,


// Store the indexes of currently
// selected items on the interface.
CP_activeSlideIndex = 0,
CP_activeLayerIndexSet = [0],
CP_activeLayerPageIndex = 0,
CP_activeLayerTransitionTab = 0,
CP_activeScreenType = 'desktop',

CP_lastSelectedLayerIndex = 0,

// Stores all preview items using an object
// to easily add and modify items.
//
// NOTE: it's not a jQuery collection, but a
// collection of jQuery-enabled elements.
CP_previewItems = [],


// Object references, pointing to the currently selected
// slide/layer data. These are not working copies, any
// change made will affect the main data object. This makes
// possible to avoid issues caused by inconsistent data.
CP_activeSlideData = {},
CP_activeLayerDataSet = [],
CP_activeStaticLayersDataSet = [],


// These objects will be filled with the default slide/layer
// properties when needed. They purpose as a caching mechanism
// for bulk slide/layer creation.
CP_defaultSliderData = {},
CP_defaultSlideData = {},
CP_defaultLayerData = {},


// Stores all previous editing sessions
// to cache results and speed up operations.
CP_editorSessions = [],

// Flag for unsaved changes on site.
// We use this to display a warning
// for the user when leaving the page.
CP_editorIsDirty = false,


// Flag for transformed layers due to
// combo box preview, which needs to
// be updated after closing the combo box.
CP_comboBoxIsDirty = false,


// Flag for dragging operations to better
// handle layer selection in a group-select
// scenario.
CP_layerWasDragged = false,


// Stores default UI settings of
// editing sessions.
CP_defaultEditorSession = {
	slideIndex: CP_activeSlideIndex,
	layerIndex: CP_activeLayerIndexSet,
	zoomSlider: 100,
	zoomAutoFit: true
},


// Stores temporary data for all
// copy & pate operations.
CP_clipboard = {},


// Stores the main UI elements
CP_previewZoom = 1,
CP_previewArea,
CP_previewHolder,
CP_previewWrapper,


CP_transformStyles = [
	'rotation',
	'rotationX',
	'rotationY',
	'scaleX',
	'scaleY',
	'skewX',
	'skewY'
];

var $lasso = jQuery();

// Utility functions to perform
// commonly used tasks.
var CP_Utils = {

	convertDateToUTC: function(date) {
		return new Date(
				date.getUTCFullYear(),
				date.getUTCMonth(),
				date.getUTCDate(),
				date.getUTCHours(),
				date.getUTCMinutes(),
				date.getUTCSeconds()
		);
	},

	dataURItoBlob: function(dataURI) {
		var binary = atob(dataURI.split(',')[1]);
		var array = [];
		for(var i = 0; i < binary.length; i++) {
			array.push(binary.charCodeAt(i));
		}
		return new Blob([new Uint8Array(array)], {type: 'image/png'});
	},

	moveArrayItem: function(array, from, to) {
		if( to === from ) return;

		var target = array[from];
		var increment = to < from ? -1 : 1;

		for(var k = from; k != to; k += increment){
			array[k] = array[k + increment];
		}
		array[to] = target;
	},


	toAbsoluteURL: function(url) {
		// Handle absolute URLs (with protocol-relative prefix)
		// Example: //domain.com/file.png
		if (url.search(/^\/\//) != -1) {
			return window.location.protocol + url;
		}

		// Handle absolute URLs (with explicit origin)
		// Example: http://domain.com/file.png
		if (url.search(/:\/\//) != -1) {
			return url;
		}

		// Handle absolute URLs (without explicit origin)
		// Example: /file.png
		if (url.search(/^\//) != -1) {
			return window.location.origin + url;
		}

		// Handle relative URLs
		// Example: file.png
		var base = window.location.href.match(/(.*\/)/)[0];
		return base + url;
	},

	// credits: http://phpjs.org/functions/strip_tags/
	stripTags: function(input, allowed) {

		allowed = (((allowed || '') + '')
			.toLowerCase()
			.match(/<[a-z][a-z0-9]*>/g) || [])
			.join('');
		var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
			commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
		return input.replace(commentsAndPhpTags, '')
			.replace(tags, function($0, $1) {
				return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
			});
	},

	// credits: http://phpjs.org/functions/nl2br/
	nl2br: function(str, is_xhtml) {
		var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br ' + '/>' : '<br>'; // Adjust comment to avoid issue on phpjs.org display
		return (str + '')
			.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
	},

	// credits: http://stackoverflow.com/questions/3169786/clear-text-selection-with-javascript
	removeTextSelection: function() {
		var selection = window.getSelection ? window.getSelection() : document.selection ? document.selection : null;
		if(!!selection) selection.empty ? selection.empty() : selection.removeAllRanges();
	},

	// credits: http://locutus.io/php/stripslashes/
	stripslashes: function(str) {
	  return (str + '')
		.replace(/\\(.?)/g, function (s, n1) {
		switch (n1) {
			case '\\':
			  return '\\'
			case '0':
			  return '\u0000'
			case '':
			  return ''
			default:
			  return n1
		  }
		});
	},


	// credits: http://locutus.io/php/parse_url/
	parse_url: function(str, component) {
		var query;

		var mode = (typeof require !== 'undefined' ? require('../info/ini_get')('locutus.parse_url.mode') : undefined) || 'php';

		var key = [
			'source',
			'scheme',
			'authority',
			'userInfo',
			'user',
			'pass',
			'host',
			'port',
			'relative',
			'path',
			'directory',
			'file',
			'query',
			'fragment'
		];

		// For loose we added one optional slash to post-scheme to catch file:/// (should restrict this)
		var parser = {
			php: new RegExp([
				'(?:([^:\\/?#]+):)?',
				'(?:\\/\\/()(?:(?:()(?:([^:@\\/]*):?([^:@\\/]*))?@)?([^:\\/?#]*)(?::(\\d*))?))?',
				'()',
				'(?:(()(?:(?:[^?#\\/]*\\/)*)()(?:[^?#]*))(?:\\?([^#]*))?(?:#(.*))?)'
			].join('')),
			strict: new RegExp([
				'(?:([^:\\/?#]+):)?',
				'(?:\\/\\/((?:(([^:@\\/]*):?([^:@\\/]*))?@)?([^:\\/?#]*)(?::(\\d*))?))?',
				'((((?:[^?#\\/]*\\/)*)([^?#]*))(?:\\?([^#]*))?(?:#(.*))?)'
			].join('')),
			loose: new RegExp([
				'(?:(?![^:@]+:[^:@\\/]*@)([^:\\/?#.]+):)?',
				'(?:\\/\\/\\/?)?',
				'((?:(([^:@\\/]*):?([^:@\\/]*))?@)?([^:\\/?#]*)(?::(\\d*))?)',
				'(((\\/(?:[^?#](?![^?#\\/]*\\.[^?#\\/.]+(?:[?#]|$)))*\\/?)?([^?#\\/]*))',
				'(?:\\?([^#]*))?(?:#(.*))?)'
			].join(''))
		};

		var m = parser[mode].exec(str);
		var uri = {};
		var i = 14;

		while (i--) {
			if (m[i]) {
				uri[key[i]] = m[i];
			}
		}

		if (component) {
			return uri[component.replace('PHP_URL_', '').toLowerCase()];
		}

		if (mode !== 'php') {
			var name = (typeof require !== 'undefined' ? require('../info/ini_get')('locutus.parse_url.queryKey') : undefined) || 'queryKey';
			parser = /(?:^|&)([^&=]*)=?([^&]*)/g;
			uri[name] = {};
			query = uri[key[12]] || '';
			query.replace(parser, function ($0, $1, $2) {
				if ($1) {
					uri[name][$1] = $2;
				}
			});
		}

		delete uri.source;
		return uri;
	}
};


var CP_GUI = {

	updateImagePicker: function( $picker, image, updateProperties ) {

		updateProperties = updateProperties || {};

		if( typeof $picker === 'string' ) {
			$picker = jQuery('input[name="'+$picker+'"]').next();
		}

		if( image === 'useCurrent' ) {
			image = $picker.find('img').attr('src');
		}

		if( image && image.indexOf('blank.gif') !== -1 ) {
			if( ! updateProperties.fromPost ) {
				image = false;
			}
		}

		$picker
			.removeClass('has-image not-set')
			.addClass( image ? 'has-image' : 'not-set' )
			.find('img').attr('src', image ||  lsTrImgPath+'/blank.gif' );
	},


	updateLinkPicker: function( $input, data ) {
		return;

		var $holder = $input.closest('.cp-slide-link'),
			postId, postName, postType, l10nKey;

		if( ! data ) {

			postId 		= $holder.find('input[name="linkId"]').val();
			postName 	= $holder.find('input[name="linkName"]').val();
			postType 	= $holder.find('input[name="linkType"]').val();
		}

		if( ( postId && '[url]' === postId ) || '[url]' === $input.val() ) {
			$holder.addClass('has-link');
			$input.val( CP_l10n.SBLinkPostDynURL ).prop('disabled', true);
			$holder.find('input[name="linkId"]').val('[url]');

		} else if( postId && postName && postType ) {

			l10nKey = 'SBLinkText'+ucFirst( postType );

			$holder.addClass('has-link');
			$input.val( CP_l10n[l10nKey].replace('%s', postName) ).prop('disabled', true);
		}

		$holder.find('input').trigger('input');
	},

	deeplinkSection: function() {
		var hash 		= document.location.hash.replace('#', ''),
			$target 	= jQuery('[data-deeplink="'+hash+'"]');

		if( $target.length ) {
			$target.click();
		}
	}
};



// Slide specific undo & redo operations.
// Uses callbacks to run any code stored by
// other methods. Supports custom parameters.
var CP_UndoManager = {

	index: -1,
	stack: [],
	limit: 50,

	add: function(cmd, name, updateInfo) {

		// Invalidate items higher on the stack when
		// called from an undo-ed position
		this.stack.splice(this.index + 1, this.stack.length - this.index);
		this.index = this.stack.length - 1;

		// Maintain stack limit
		if(this.stack.length > this.limit) {
			this.stack.shift();
		}

		// Verify 'history' object in slide
		if(!CP_activeSlideData.hasOwnProperty('history')) {
			CP_activeSlideData.history = [];
		}

		// Prepare updateInfo
		this.prepareUpdateInfo( updateInfo );

		// Add item
		this.stack.push({
			cmd: cmd,
			name: name,
			updateInfo: updateInfo
		});

		// Maintain buttons and stack index
		this.index = this.stack.length - 1;
		this.maintainButtons();

		// Mark unsaved changes on page
		CP_editorIsDirty = true;
	},


	// Replace this.stack when switching slides
	// to support slide-specific history.
	update: function() {

		// Verify 'history' object in slide
		if(!CP_activeSlideData.hasOwnProperty('history')) {
			CP_activeSlideData.history = [];
		}

		this.stack = CP_activeSlideData.history;
		this.index = this.stack.length - 1;

		if( CP_activeSlideData.meta && CP_activeSlideData.meta.undoStackIndex ) {
			this.index = CP_activeSlideData.meta.undoStackIndex;
		}

		this.maintainButtons();
	},


	// Merges new changes into the last item in
	// the UndoManager stack.
	merge: function( cmd, name, updateInfo ) {
		var lastItem = this.stack[ this.stack.length - 1 ];
		this.prepareUpdateInfo( updateInfo );
		jQuery.extend(true, lastItem.updateInfo, updateInfo);
	},


	// Empties the current slide's history and reset
	// every UndoManager-related properties
	empty: function() {
		CP_activeSlideData.history = [];

		if( CP_activeSlideData.meta && CP_activeSlideData.meta.undoStackIndex ) {
			CP_activeSlideData.meta.undoStackIndex = -1;
		}

		this.update();
	},


	undo: function() {
		if(this.stack[this.index]) {
			this.execute('undo', this.stack[this.index], this.stack[this.index-1]);
			this.index--;
			this.maintainButtons();
		}
	},


	redo: function() {
		if(this.stack[this.index+1]) {
			this.index++;
			this.execute('redo', this.stack[this.index], this.stack[this.index+1]);
			this.maintainButtons();
		}
	},


	prepareUpdateInfo: function( updateInfo ) {

		if( updateInfo && typeof updateInfo === 'object') {
			jQuery.each(updateInfo, function(key, val) {

				if( typeof val === 'object') {
					CP_UndoManager.prepareUpdateInfo( val );
					return true;
				}

				if( val === null || typeof val === 'undefined') {
					updateInfo[key] = '';
				}
			});
		}
	},

	maintainButtons: function(itemIndex) {

		var undoButton = jQuery('.cp-editor-undo'),
			redoButton = jQuery('.cp-editor-redo');

		CP_activeSlideData.meta.undoStackIndex = this.index;

		if(this.index !== -1) { undoButton.removeClass('disabled'); }
			else { undoButton.addClass('disabled'); }

		if(this.index < this.stack.length-1) { redoButton.removeClass('disabled'); }
			else { redoButton.addClass('disabled'); }
	},

	execute: function(action, item, followingItem) {

		var layerIndexSet = [];

		// Convert object to array to easily
		// handle multi-action steps.
		if( jQuery.type(item.updateInfo) === 'object' ) {
			item.updateInfo = [item.updateInfo];
		}

		// Iterate through actions in step.
		for(var c = 0; c < item.updateInfo.length; c++) {

			this.executeItem(
				item.cmd,
				item.updateInfo[c].itemIndex,
				item.updateInfo[c][action],
				item.updateInfo[c]
			);

			layerIndexSet.push( item.updateInfo[c].itemIndex );
		}

		this.restoreSelection( action, layerIndexSet, followingItem );
	},


	restoreSelection: function(action, layerIndexSet, followingItem) {

		if( followingItem && action === 'undo'  ) {

			var followingIndexSet = [];

			if( jQuery.type(followingItem.updateInfo) === 'object' ) {
				followingItem.updateInfo = [followingItem.updateInfo];
			}

			for(var c = 0; c < followingItem.updateInfo.length; c++) {
				followingIndexSet.push( followingItem.updateInfo[c].itemIndex );
			}
		}


		// Re-select affected layers if the selection has changed
		if( JSON.stringify( followingIndexSet || layerIndexSet) !== JSON.stringify(CP_activeLayerIndexSet)  ) {
			if( CP_activeSlideData.sublayers.length-1 < Math.max.apply(Math, followingIndexSet || layerIndexSet) ) {
				CreativePopup.selectLayer( [ CP_activeSlideData.sublayers.length-1] );
			} else {
				CreativePopup.selectLayer( followingIndexSet || layerIndexSet );
			}
		}
	},


	executeItem: function(command, itemIndex, updateInfo, item) {

		switch(command) {

			case 'slide.general':
				this.updateOptions(CP_activeSlideData.properties, itemIndex, updateInfo, 'slide');
				CreativePopup.updateSlideInterfaceItems();
				CreativePopup.generatePreview();
				break;


			case 'slide.layers':
				if(jQuery.isEmptyObject(updateInfo.data)) {
					CreativePopup.removeLayer(itemIndex, { histroyEvent: true, requireConfirmation: false });
				} else {
					CreativePopup.addLayer(updateInfo.data, itemIndex, { histroyEvent: true });
					CreativePopup.selectLayer( item.selectIndex );
				}
				CP_DataSource.buildLayersList();
				CreativePopup.generatePreview();
				break;


			case 'layer.order':
				CP_Utils.moveArrayItem(CP_activeSlideData.sublayers, updateInfo.from, updateInfo.to);
				CP_DataSource.buildLayersList();
				CreativePopup.generatePreview();
				break;


			case 'layer.general':
				this.updateOptions(CP_activeSlideData.sublayers[itemIndex], itemIndex, updateInfo);
				CreativePopup.updateLayerInterfaceItems(itemIndex);
				CreativePopup.generatePreviewItem(itemIndex);
				CreativePopup.updatePreviewSelection();
				break;


			case 'layer.transition':
				this.updateOptions(CP_activeSlideData.sublayers[itemIndex].transition, itemIndex, updateInfo);
				CreativePopup.generatePreviewItem(itemIndex);
				break;


			case 'layer.style':
				this.updateOptions(CP_activeSlideData.sublayers[itemIndex].styles, itemIndex, updateInfo);
				CreativePopup.generatePreviewItem(itemIndex);
				CreativePopup.updatePreviewSelection();
				break;
		}
		jQuery(CP_UndoManager).trigger('afterExecuteItem', arguments);
	},


	// Iterates over the updateInfo object,
	// overrides the keys in the provided
	// data object.
	updateOptions: function( data, index, updateInfo, area ) {

		area = area || 'layers';
		var parent = (area === 'slide') ? '.cp-slide-options' : '.cp-layers-table';

		jQuery.each(updateInfo, function(key, val) {

			//if( data.hasOwnProperty(key) ) {

				if( typeof val === 'object' ) {
					CP_UndoManager.updateOptions( data[key], index, updateInfo[key], area);
					return true;
				}

				// Update data
				data[key] = val;

				// Handle UI if it's the active layer
				if( area === 'slide' || (CP_activeLayerIndexSet.length == 1 && index == CP_activeLayerIndexSet[0]) ) {

					var $target = jQuery(parent+' '+'[name="'+key+'"]'),
						eventType = 'input';

					if( ! $target.is(':checkbox') ) {
						$target.val(val).trigger('input').trigger('keyup');
					}

					if($target.is(':checkbox')) {
						if(val) {
							$target.prop('checked', true);
							$target.next().addClass('on').removeClass('off');
						} else {
							$target.prop('checked', false);
							$target.next().addClass('off').removeClass('on');
						}
						return;

					} else if($target.is('select')) {
						eventType = 'change';
					}
					var jqEvent = jQuery.Event(eventType, { target: $target[0], UndoManagerAction: true });
					jQuery('#cp-layers').triggerHandler(jqEvent);
				}

			//}
		});
	},


	saveOriginalInputValues: function( $input ) {

		var prevVals 	= [],
			type 		= null,
			optionName 	= $input.attr('name'),
			optionValue = $input.is(':checkbox') ? ! $input.prop('checked') : $input.val();

		// Save input value as a generic solution
		$input.data('prevVal', optionValue );

		// Override saved data if it's a layer option
		if( $input.closest('.cp-sublayer-pages').length ) {

			if( $input.hasClass('sublayerprop') ) { type = 'transition'; }
				else if( $input.hasClass('auto') ) { type = 'styles'; }

			jQuery.each(CP_activeLayerDataSet, function(item, layerData) {
				var area = layerData;
				if( type ) { area = area[type]; }

				prevVals.push( area[optionName] );
			});

			$input.data('prevVal', prevVals );
		}
	},


	trackInputs: function( event, element ) {

		event = event || { type: 'change' };

		if( event.UndoManagerAction ) { return false; }

		var $input = jQuery(element),
			cmd, name, index;

		if( event.type.toLowerCase() == 'click' && $input.is('input,textarea') ) {
			return;
		}

		if( event.type.toLowerCase() !== 'change' ) {
			this.saveOriginalInputValues( $input );
			return;
		} else if( event.type.toLowerCase() === 'change' && $input.is(':checkbox') ) {
			this.saveOriginalInputValues( $input );
		}

		// Skip colorpickers, as they rapidly send change events
		if( $input.hasClass('cp-colorpicker') ) {
			return;
		}

		if( $input.closest('.cp-sublayer-pages').length ) {
			cmd = 'layer.general';
			name = CP_l10n.SBUndoLayer;
			index = CP_activeLayerIndexSet[0];

			if($input.hasClass('sublayerprop')) { cmd = 'layer.transition'; }
				else if($input.hasClass('auto')) { cmd = 'layer.style'; }

		} else if( $input.closest('.cp-slide-options').length ) {
			cmd = 'slide.general';
			name = CP_l10n.SBUndoSlide;
			index = CP_activeSlideIndex;

		} else {
			return true;
		}

		var updateInfo 	= [],
			optionName 	= $input.attr('name'),
			optionValue = $input.is(':checkbox') ? $input.prop('checked') : $input.val(),
			prevValue 	= $input.data('prevVal'),
			action 		= $input.hasClass('undomanager-merge') ? 'merge': 'add';

		if( ! optionName ) {
			return false;
		}

		// Layer option change, handle multiple
		// selection (if any).
		if( typeof prevValue === 'object' ) {

			jQuery.each(CP_activeLayerIndexSet, function( index, layerIndex ) {
				var undo = {}, redo = {};
					undo[ optionName ] = prevValue[ index ];
					redo[ optionName ] = optionValue;

				if( prevValue[ index ] !== optionValue ) {
					updateInfo.push({
						itemIndex: layerIndex,
						undo: undo,
						redo: redo
					});
				}
			});

		// Slide option change
		} else {

			if( prevValue !== optionValue ) {

				var undo = {}, redo = {};
					undo[ optionName ] = prevValue;
					redo[ optionName ] = optionValue;

				updateInfo.push({
					itemIndex: index,
					undo: undo,
					redo: redo
				});
			}
		}

		CP_UndoManager[action](cmd, name, updateInfo);
	}
};


var CreativePopup = {

	uploadInput: null,
	dragIndex: 0,
	timeout: 0,
	mediaCheckTimeout: 0,
	isSlidePreviewActive: false,
	isLayerPreviewActive: false,
	selectableTimeout: 0,

	getSliderSize: function() {

		var sliderProps = window.lsSliderData.properties, width, height;

		if( sliderProps.type = 'popup' ) {
			width 	= sliderProps.popupWidth  || 640;
			height 	= sliderProps.popupHeight || 360;
		} else {
			width 	= parseInt(sliderProps.sublayercontainer) || sliderProps.width || 1280;
			height 	= sliderProps.height || 720;
		}

		return {
			width: parseInt(width),
			height: parseInt(height)
		};
	},

	sliderIsEmpty: function( length ) {

		var isEmpty = true;

		jQuery.each(window.lsSliderData.layers, function(slideKey, slide) {

			if( jQuery.trim( slide.properties.background ) ) {
				isEmpty = false; return false;
			}

			jQuery.each(slide.sublayers, function(layerKey, layer) {

				// Has image
				if( layer.media === 'img' ) {
					if( layer.image ) {
						isEmpty = false; return false;
					}

				// Has textual content
				} else if( layer.html ) {
					isEmpty = false; return false;

				// Has visual content
				} else if( layer.styles.width || layer.styles.height ) {

					if( layer.html || layer.styles.background ) {
						isEmpty = false; return false;

					} else if( layer.styles['border-top'] || layer.styles['border-right'] || layer.styles['border-bottom'] || layer.styles['border-left'] ) {
						isEmpty = false; return false;
					}
				}
			});

			if( length && length === slideKey+1 ) {
				return false;
			}
		});

		return isEmpty;
	},


	selectMainTab: function(el) {

		var $tab = jQuery(el);

		// Select new tab
		$tab.addClass('active').siblings().removeClass('active');

		// Show new tab contents
		jQuery('#cp-pages .cp-page').removeClass('active');
		jQuery('#cp-pages .cp-page').eq( $tab.index() ).addClass('active');

		// Make sure to properly resize the transition options
		if( $tab.hasClass('layers') ) {
			kmUI.smartResize.set();
		}
	},


	selectSettingsTab: function(li) {
		var index = jQuery(li).index();
		jQuery(li).addClass('active').siblings().removeClass('active');
		jQuery('div.cp-settings-contents > table > tbody.active').removeClass('active');
		jQuery('div.cp-settings-contents > table > tbody').eq(index).addClass('active');

		// Make sure that the Slider Settings section is selected
		jQuery('#cp-main-nav-bar .settings').click();

		// Update hash for deeplinking
		document.location.hash = jQuery(li).data('deeplink');

		// Init CodeMirror
		if(location.hash == '#callbacks') {
			if(jQuery('.cp-callback .CodeMirror-code').length === 0) {
				CP_CodeMirror.init({ mode: 'javascript', autofocus : false, styleActiveLine : false });
				jQuery(window).scrollTop(0);
			}
		}
	},


	addSlide: function() {
		// Get default data objects for slides and layers
		var newSlideData = jQuery.extend(true, {}, CP_DataSource.getDefaultSlideData());

		// Add new slide data to data source
		window.lsSliderData.layers.push({
			properties: newSlideData,
			sublayers: []
		});

		// Add new slide tab
		var newIndex 	= window.lsSliderData.layers.length + 1,
			title 		= CP_l10n.SBSlideTitle.replace('%d', newIndex),
			tab 		= jQuery('<a href="#"><span>'+title+'</span><img src="'+(pluginPath+'img/admin/blank.gif')+'"><span class="dashicons dashicons-dismiss"></span>').insertBefore('#cp-add-layer');

		// Name new slide properly
		CreativePopup.reindexSlides();
		CreativePopup.addSlideSortables();
		CP_activeLayerPageIndex = 0;

		// Show new slide, re-initialize
		// interactive features
		tab.click();
		CreativePopup.addLayerSortables();
	},


	removeSlide: function(el) {

		if(confirm(CP_l10n.SBRemoveSlide)) {

			// Get tab and menu item index
			var index = CP_activeSlideIndex;
			var $tab = jQuery(el).parent();
			var $newTab = null;

			// Open next or prev layer
			if($tab.next(':not(.unsortable)').length > 0) {
				$newTab = $tab.next();

			} else if($tab.prev().length > 0) {
				$newTab = $tab.prev();
			}

			// Remove tab and slide data
			window.lsSliderData.layers.splice(index, 1);
			$tab.remove();

			// Create a new slide if the last one
			// was removed
			if(window.lsSliderData.layers < 1) {
				CreativePopup.addSlide();
				return true;
			}

			// Select new slide. The .click() event will
			// maintain the active slide index and data.
			CreativePopup.reindexSlides();
			$newTab.click();
		}
	},


	selectSlide: function(slideIndex, selectProperties) {

		// Set selectProperties to an empty object by default
		selectProperties = selectProperties || {};

		// Bail out early if it's the currently active layer
		if( !selectProperties.forceSelect && CP_activeSlideIndex === slideIndex) { return false; }

		// Set active slide, highlight new tab
		jQuery('#cp-layer-tabs a')
			.eq(slideIndex)
			.addClass('active')
			.attr('data-help-disabled', '1')

			.siblings()
			.removeClass('active')
			.removeAttr('data-help-disabled');

		// Stop live preview
		CreativePopup.stopSlidePreview();
		CreativePopup.stopLayerPreview();

		// Set new slide index & data
		CP_activeSlideIndex = slideIndex;
		CP_activeSlideData = window.lsSliderData.layers[ slideIndex ];

		// Create the 'meta' object if not set
		if(!CP_activeSlideData.meta) {
			CP_activeSlideData.meta = {};
		}

		// Make sure to include new Page Options in all cases
		var defaults = jQuery.extend( true, {}, CP_DataSource.getDefaultSlideData() );
		CP_activeSlideData.properties = jQuery.extend( true, defaults, CP_activeSlideData.properties );

		// Set active layer index set
		CP_activeLayerIndexSet = CP_activeSlideData.meta.activeLayers || [0];
		CP_lastSelectedLayerIndex = CP_activeLayerIndexSet[0];

		// Add static layers
		CP_activeStaticLayersDataSet = CreativePopup.staticLayersForSlide( slideIndex );

		// Build slide
		CP_DataSource.buildSlide();
		CreativePopup.generatePreview();
		CreativePopup.selectLayer(CP_activeLayerIndexSet);
		CreativePopup.updatePreviewSelection();
		CP_UndoManager.update();
	},


	renameSlide: function(el) {

		if(~location.href.indexOf('AdminCreativePopupRevisions')) {
			return;
		}

		var $el = jQuery(el);
		var name = jQuery('span:first-child', el).text();

		if($el.hasClass('editing')) { return false; }

		// Add input
		$el.addClass('editing');
		$input = jQuery('<input type="text">').appendTo($el).val(name);
		$input.focus().select();

		// Save changes on Enter
		$input.on('keydown', function(e) {
			if(e.which == 13) { CreativePopup.renameSlideEnd(el); }
		});

		// Save changes by clicking away
		jQuery('body').one('click', ':not(#cp-layer-tabs a input)', function() {
			CreativePopup.renameSlideEnd(el);
		});
	},


	renameSlideEnd: function(el) {

		var $el 	= jQuery(el),
			$input 	= jQuery('input', el),
			index 	= $el.index();

		if($el.hasClass('editing')) {

			window.lsSliderData.layers[ index ].properties.title = $input.val();
			jQuery('span', $el).first().text( $input.val());
			$input.remove();
			$el.removeClass('editing');
		}
	},


	duplicateSlide: function(el) {


		// Duplicate slide by using jQuery.extend()
		// to make sure it's a copy instead of an
		// object reference.
		var newSlideData = jQuery.extend(true, {}, CP_activeSlideData);

		// Assign new UUID
		newSlideData.properties.uuid = CP_DataSource.generateUUID();

		// Rename slide
		if(!!newSlideData.properties.title) {
			newSlideData.properties.title += ' copy';
		} else {
			newSlideData.properties.title = CP_l10n.SBSlideCopyTitle.replace('%d', CP_activeSlideIndex+1);
		}

		// Duplicate slide by using jQuery.extend()
		// to make sure it's a copy instead of an
		// object reference.
		window.lsSliderData.layers.splice(
			CP_activeSlideIndex + 1, 0, newSlideData
		);

		// Insert the duplicate slide tab after the original
		var tab = jQuery('<a href="#"><span>'+newSlideData.properties.title+'</span><span class="dashicons dashicons-dismiss"></span></a>').insertAfter('#cp-layer-tabs a.active');
		CreativePopup.reindexSlides();
		CreativePopup.reindexStaticLayers();

		// Select new slide
		tab.click();
	},

	toggleAdvancedSlideOptions: function( el ) {

		var $el 	= jQuery(el),
			$target = jQuery('.cp-slide-options tr.cp-advanced');

		if( $el.hasClass('cp-opened') ) {
			$el.removeClass('cp-opened');
			$target.addClass('cp-hidden');
		} else {
			$el.addClass('cp-opened');
			$target.removeClass('cp-hidden');
		}
	},


	setPreviewZoom: function( value ) {

		CP_previewZoom = value;

		jQuery('.cp-editor-slider-val').text(''+Math.round(value * 100)+'%');

		jQuery( '.cp-preview-transform' ).css({
			transform: 'scale('+value+')'
		}).parent().trigger('zoom');

		var sliderSize = CreativePopup.getSliderSize();

		jQuery( '.cp-preview-size' ).css({
			width: sliderSize.width * value,
			height: sliderSize.height * value
		});

		CreativePopup.updatePreviewSelection();
	},


	addPreviewSlider: function(target, value) {

		jQuery(target).slider({
			value: value, min: 0.5, max: 1.5, step: 0.01,
			range: 'min', orientation: 'horizontal',
			slide: function(event, ui) {

				// Disable auto-fit when resizing manually
				if( jQuery('#zoom-fit').prop('checked') ){
					jQuery('#zoom-fit').next().click();
				}

				CreativePopup.setPreviewZoom(ui.value);

				// Restart previews (if any)
				if( CreativePopup.isSlidePreviewActive ) {
					CreativePopup.stopSlidePreview( );
				}

				if( CreativePopup.isLayerPreviewActive ) {
					CreativePopup.stopLayerPreview( true );
				}
			},

			change: function(event, ui) {
				CP_previewZoom = ui.value;
				CreativePopup.updatePreviewSelection();
			}
		});


		// Resize preview on page load
		if( jQuery('#zoom-fit').prop('checked') ) {
			CreativePopup.autoFitPreview(target);

		// Slide value on page load
		} else if(typeof value != "undefined" && value != 1 ) {
			jQuery(target).slider('value', parseInt(value));
			CreativePopup.setPreviewZoom(value);
		}

		jQuery(document).on('click','#zoom-fit',function(){

			if( jQuery(this).prop('checked') ){
				CreativePopup.autoFitPreview(target, 0.75);
			}
		});

		jQuery(window).resize(function( event ){
			if( event.target === window ) {
				CreativePopup.autoFitPreview(target);
			}
		});


		jQuery('#collapse-menu').click(function() {
			CreativePopup.autoFitPreview(target);
		});
	},


	autoFitPreview: function(target, duration){

		if( jQuery('#zoom-fit').prop('checked') ){

			var sliderSize 	= CreativePopup.getSliderSize(),
				width 		= sliderSize.width,
				height 		= sliderSize.height,
				// 905(px) is the minimum width to keep the slider settings table organized
				smallestRatio = 916 / width > 0.5 ? 916 / width : 0.5,
				padding = ~location.href.indexOf('AdminCreativePopupRevisions') ? 0 : 32,
				ratio = ( jQuery('.wrap').eq(0).outerWidth() - padding ) / width;


			if( ratio < smallestRatio ){
				ratio = smallestRatio;
			} else if( ratio > 1 ){
				ratio = 1;
			}

			jQuery(target).slider('value', ratio );
			CreativePopup.setPreviewZoom( ratio );

			// jQuery('.cp-editor-slider-val').text(ratio+'%');

			// if( duration ){
			// 	TweenLite.to(
			// 		jQuery('#cp-preview-layers')[0],
			// 		duration,
			// 		{
			// 			parseTransform: true,
			// 			scale: ratio/100,
			// 			ease: 'Quint.easeInOut',
			// 			onUpdate: function() {
			// 				jQuery('.cp-preview-td').trigger('zoom');
			// 				CreativePopup.updatePreviewSelection();
			// 			}
			// 		}
			// 	);

			// 	TweenLite.to(
			// 		[CP_previewHolder, CP_previewWrapper],
			// 		duration,
			// 		{
			// 			width: width * ratio / 100,
			// 			height: height * ratio / 100,
			// 			ease: 'Quint.easeInOut'
			// 		}
			// 	);
			// }else{
				// CreativePopup.setPreviewZoom( ratio );
			// }
		}
	},


	addLayer: function(layerDataSet, atIndexSet, addProperties) {

		var c, len, selectIndexSet = [], updateInfo = [], emptyData, emptyIndex;

		// Set removeProperties to an empty object by default
		addProperties = addProperties || { selectLayer: true };

		// Get default layer data if not provided
		emptyData 	 = !layerDataSet;
		layerDataSet = layerDataSet || jQuery.extend(true, {}, CP_DataSource.getDefaultLayerData() );
		layerDataSet = jQuery.makeArray( layerDataSet );

		c = layerDataSet.length;

		// Add layer to the top if
		// not specified otherwise.
		emptyIndex = ! atIndexSet;
		atIndexSet = ! emptyIndex ? atIndexSet : [].fill(0, c);
		atIndexSet = jQuery.makeArray( atIndexSet );

		// Iterate backwards to keep indexes consistent throughout
		// the sequence. Don't use .revert() on data sets reference,
		// as it will change the original set as well.
		while(c--) {

			// Add new layer data to data source
			CP_activeSlideData.sublayers.splice(atIndexSet[c], 0, layerDataSet[c]);

			// Offsetting indexes to follow data storage
			// changes in case of multiple additions.
			selectIndexSet.push( atIndexSet[c] + c );

			// UndoManager
			updateInfo.push({
				itemIndex: atIndexSet[c],
				selectIndex: selectIndexSet[c],
				undo: { data: {} },
				redo: { data: layerDataSet[c] }
			});
		}

		// Maintain undoManager
		if( ! addProperties.histroyEvent) {
			CP_UndoManager.add(
				'slide.layers',
				updateInfo.length > 1 ? CP_l10n.SBUndoNewLayers : CP_l10n.SBUndoNewLayer,
				updateInfo
			);
		}

		// Update layers list and preview
		CP_DataSource.buildLayersList();
		CreativePopup.generatePreview();

		// Select new layers
		if( addProperties.selectLayer ) {

			if( addProperties.hasOwnProperty('selectPage') ) {
				CP_activeLayerPageIndex = addProperties.selectPage;
			}

			CreativePopup.selectLayer( selectIndexSet );

			if( emptyData && updateInfo.length === 1 ) {
				jQuery('.cp-sublayers  li.active .cp-sublayer-title').focus().select();
			}
		}
	},


	selectLayer: function(layerIndexSet, selectProperties) {

		// Bail out early if the current slide has no layers
		if( ! CP_activeSlideData.sublayers.length ) {
			jQuery('.cp-timeline-switch, .cp-sublayer-nav').hide();
			jQuery('.cp-sublayer-pages').empty();
			return false;

		} else {
			jQuery('.cp-timeline-switch, .cp-sublayer-nav').show();
		}

		// Bail out early if there's no active layer selection
		if( ! layerIndexSet || ! layerIndexSet.length ) { return false; }

		// Bail out if the new selection exceeds array range
		if( CP_activeSlideData.sublayers.length-1 < Math.max.apply(Math, layerIndexSet) ) {
			return;
		}

		// Bail out early if the current selection is the same
		// if( layerIndexSet.length == CP_activeLayerIndexSet.length ) {
		// 	if( layerIndexSet.every(function(v,i) { return v === CP_activeLayerIndexSet[i];}) ) {
		// 		return false;
		// 	}
		// }

		// Set removeProperties to an empty object by default
		selectProperties = selectProperties || {};

		// Bail out early if it's already a selected layer
		// if( !selectProperties.forceSelect &&
		// 	CP_activeLayerIndexSet.indexOf(layerIndex) !== -1 ) {
		// 	return false;
		// }

		var $layersList 	= jQuery('.cp-sublayers li'),
			$layerOptions 	= jQuery('.cp-sublayer-pages-wrapper');

		// Stop layer preview session (if any)
		CreativePopup.stopLayerPreview();

		// Update stored data & preview based on
		// the passed selection index set.
		CP_activeLayerIndexSet = [];
		CP_activeLayerDataSet = [];
		$layersList.removeClass('active');
		jQuery('#cp-preview-layers > *').removeClass('ui-selected');
		jQuery.each(layerIndexSet, function(idx, layerIndex) {
			if (!CP_previewItems[layerIndex]) layerIndex = 0;
			CP_activeLayerIndexSet.push(layerIndex);
			CP_activeLayerDataSet.push(
				CP_activeSlideData.sublayers[layerIndex]
			);
			CP_previewItems[layerIndex].addClass('ui-selected');
			$layersList.eq(layerIndex).addClass('active');
		});

		jQuery.each(CP_activeLayerDataSet, function(index, layerData) {
			if( ! layerData.meta) {
				layerData.meta = {};
			}
		});

		// Show/Hide layer options depending on
		// the number of selected layers
		if(CP_activeLayerIndexSet.length > 1) {
			CreativePopup.startMultipleSelection();
		} else {
			CreativePopup.stopMultipleSelection();
		}

		// Build new layer ...
		if(CP_activeLayerIndexSet.length === 1) {
			CP_DataSource.buildLayer();
			CP_lastSelectedLayerIndex = CP_activeLayerIndexSet[0];
		}

		// Store selection
		CP_Utils.removeTextSelection();
		CreativePopup.updatePreviewSelection();
		CP_activeSlideData.meta.activeLayers = CP_activeLayerIndexSet;
		jQuery('.cp-timeline-switch, .cp-sublayer-nav').show();

		// Create layer transition preview animations
		layerTransitionPreview.create();
	},


	startMultipleSelection: function() {

		var $layerOptions 	= jQuery('.cp-sublayer-pages-wrapper'),
			$layerNav 		= jQuery('.cp-sublayer-nav'),
			$contentTab 	= $layerNav.children().eq(0);

		// Hide 'Content' and select the 'Transitions'
		// layer tab if needed.
		$contentTab.hide();
		if( $contentTab.hasClass('active') ) {
			$contentTab.next().click();
		}


		jQuery('#cp-layers-settings-popout').addClass('cp-multiple-selection');

		// Reset input field
		jQuery('input,textarea', $layerOptions).filter('.sublayerprop,.auto').val('');
		jQuery('.cp-sublayer-pages .minicolors-swatch-color').css('background', 'transparent');


		// Prepend empty option to select fields
		jQuery('select:not(.cp-multi-selected)', $layerOptions)
			.filter('.sublayerprop,.auto')
			.add('.cp-slide-link select')
			.addClass('cp-multi-selected')
			.prepend('<option></option>');

		// Select the empty option in select fields
		jQuery('select', $layerOptions)
			.filter('.sublayerprop,.auto')
			.add('.cp-slide-link select')
			.children().prop('selected', false)
			.eq(0).prop('selected', true);

		// Reset checkboxes
		jQuery('.cp-checkbox', $layerOptions)
			.removeClass('on off')
			.addClass('indeterminate');

		// Reset transition selection
		jQuery('#cp-transition-selector-table .active').removeClass('active');
		jQuery('#cp-layer-transitions .cp-h-button .cp-checkbox').removeClass('on');

		// Reset custom attributes field
		jQuery('.cp-sublayer-custom-attributes tr:not(:last-child)').remove();

		jQuery(CreativePopup).trigger('afterStartMultipleSelection');
	},


	stopMultipleSelection: function() {

		var $layerOptions 	= jQuery('.cp-sublayer-pages-wrapper'),
			$layerNav 		= jQuery('.cp-sublayer-nav');

		// Show the Content layer tab
		$layerNav.children().eq(0).show();

		jQuery('#cp-layers-settings-popout').removeClass('cp-multiple-selection');

		jQuery(CreativePopup).trigger('afterStopMultipleSelection');
	},


	selectLayerPage: function(pageIndex) {

		// Select new tab
		jQuery('.cp-sublayer-nav a').removeClass('active')
			.eq(pageIndex).addClass('active');

		// Show the corresponding page
		jQuery('#cp-layers .cp-sublayer-page').removeClass('active')
			.eq( pageIndex ).addClass('active');

		// Store lastly selected layer page
		CP_activeLayerPageIndex = pageIndex;

		// SET: styles
		kmUI.smartResize.set();
	},


	selectTransitionPage: function( td ) {

		var $td = jQuery(td),
			index = ($td.index() - 1)  / 2,
			$target = jQuery('#cp-layer-transitions').children().eq(index);

		$target.addClass('active').siblings().removeClass('active');
		$td.addClass('selected').siblings().removeClass('selected');

		jQuery( '#cp-transition-selector' ).val( index );

		CP_activeLayerTransitionTab = index;

		$target.removeClass('disabled');
		if( ! $target.find('.cp-h-button input').prop('checked') ) {
			$target.addClass('disabled');
		}
	},

	enableTransitionPage: function( input ) {

		CreativePopup.reorderTransitionProperties(
			jQuery( input ).closest('section').index()
		);

		CreativePopup.checkForOpeningTransition();

 	},


 	checkForOpeningTransition: function() {

 		// Don't show the warning in multi-select
 		if( CP_activeLayerIndexSet.length === 1 ) {

	 		$table 			= jQuery('#cp-transition-selector-table');
	 		$transitions 	= jQuery('.cp-opening-transition.active', $table);
	 		$warning 		= jQuery('#cp-transition-warning');

			$warning[ $transitions.length ? 'removeClass' : 'addClass' ]('visible');
		}
 	},


 	reorderTransitionProperties: function( sectionIndex ) {

 		// if( CP_activeLayerIndexSet.length > 1) {
 		// 	return;
 		// }

 		var media 		= CP_activeLayerDataSet[0].media || '',
 			index,
 			$sections 	= jQuery('#cp-layer-transitions').children(),
 			$section,
 			$input,
 			$td;

 		if( typeof sectionIndex !== 'undefined' ) {
 			$sections = $sections.eq( sectionIndex );
 		}


 		$sections.each(function() {

 			$section 	= jQuery(this);
 			index 		= $section.index();
 			$input 		= $section.find('input.toggle').eq(0);
 			$td 		= jQuery('#cp-transition-selector-table td:not(.cp-padding)').eq( index );

 			// Disabled
 			if( ! $input.prop('checked') ) {
 				$td.removeClass('active');
 				$section.addClass('disabled');
 				$section.find(':input').each(function() {
					var $this 	= jQuery(this),
						name 	= $this.attr('name'),
						value 	= $this.is(':checkbox') ? $this.prop('checked') : $this.val();

					if( name && ! $this.is('.toggle') ) {
						$this.data('value', value );
						delete CP_activeLayerDataSet[0].transition[ name ];
					}
				});

 			// Active
 			} else {
 				$td.addClass('active');
 				$section.removeClass('disabled');
 				$section.find(':input').each(function() {
					var $this 	= jQuery(this),
						name 	= $this.attr('name'),
						value 	= $this.data('value');

					if( name && ! $this.is('.toggle') ) {
						CP_activeLayerDataSet[0].transition[ name ] = value;
					}
				});
 			}
 		});

 	},


	removeLayer: function(layerIndexSet, removeProperties) {

		// Set removeProperties to an empty object by default
		removeProperties = removeProperties || { requireConfirmation: true };

		// Require confirmation from user
		// if it's not a history event.
		if( removeProperties.requireConfirmation ) {
			if( !confirm( CP_l10n.SBRemoveLayer ) ) {
				return false;
			}
		}

		// Get active layers if no index was provided
		if( ! layerIndexSet  && layerIndexSet !== 0 ) {
			layerIndexSet = CP_activeLayerIndexSet;

		// Convert a single index to an index set
		} else if( typeof layerIndexSet === 'number') {
			layerIndexSet = [layerIndexSet];
		}

		// Get layer(s)
		var c = layerIndexSet.length, $layers = jQuery('.cp-sublayers li'),
			updateInfo = [], $layer, $newLayer, layerIndex, layerData;

		// Iterate backwards to keep indexes consistent throughout the sequence.
		// Don't use .revert() on a CP_activeLayerIndexSet reference, as it will
		// change the original set as well.
		while(c--) {
			layerIndex 	= layerIndexSet[c];
			$layer 		= $layers.eq(layerIndex);
			layerData 	= jQuery.extend(true, {}, CP_activeSlideData.sublayers[layerIndex]);

			// Get the next or prev layer
			if($layer.next().length > 0) { $newLayer = $layer.next(); }
				else if($layer.prev().length > 0) { $newLayer = $layer.prev(); }

			// Setup UndoManager updateInfo object
			updateInfo.push({
				itemIndex: layerIndex,
				undo: { data: layerData },
				redo: { data: {} }
			});

			// Remove layer from data source and UI
			CP_activeSlideData.sublayers.splice(layerIndex, 1);
			$layer.remove();
		}

		// Empty slide, hide UI items
		if( ! CP_activeSlideData.sublayers.length ) {
			jQuery('.cp-timeline-switch, .cp-sublayer-nav').hide();
			jQuery('.cp-sublayer-pages').empty();

		// Update UI otherwise
		// Select new layer. The .click() event will
		// maintain the active layer index and data.
		} else if( $newLayer ) {
			CreativePopup.selectLayer( [ $newLayer.index() ] );
			CreativePopup.reindexLayers();
		}


		// Update preview
		CreativePopup.generatePreview();
		CreativePopup.updatePreviewSelection();

		// Maintain undoManager only if
		// it wasn't a history action
		if( !removeProperties.histroyEvent && updateInfo.length) {
			CP_UndoManager.add('slide.layers', CP_l10n.SBUndoRemoveLayer, updateInfo);
		}
	},


	hideLayer: function(el) {

		// Get layer index
		var layerIndex = jQuery(el).closest('li').index();
		var layerData = CP_activeSlideData.sublayers[layerIndex];

		// Maintain history
		CP_UndoManager.add('layer.general', CP_l10n.SBUndoHideLayer, {
			itemIndex: layerIndex,
			undo: { skip: !!layerData.skip },
			redo: { skip: !layerData.skip }
		});

		// Hide/show layer
		layerData.skip = !layerData.skip;
		if(layerData.skip) { jQuery(el).addClass('disabled'); }
			else { jQuery(el).removeClass('disabled'); }

		// Update preview
		CreativePopup.generatePreviewItem(layerIndex);
	},


	lockLayer: function(el) {

		// Get layer index
		var layerIndex 	= jQuery(el).closest('li').index(),
			layerData 	= CP_activeSlideData.sublayers[layerIndex],
			$previewItem = CreativePopup.previewItemAtIndex(layerIndex);

		// Maintain history
		CP_UndoManager.add('layer.general', CP_l10n.SBUndoLockLayer, {
			itemIndex: layerIndex,
			undo: { locked: !!layerData.locked },
			redo: { locked: !layerData.locked }
		});

		// Lock layer
		layerData.locked = !layerData.locked;
		if(layerData.locked) {
			jQuery(el).removeClass('disabled');
			$previewItem.addClass('disabled');
			$lasso.hide();

		// Unlock layer
		} else {

			jQuery(el).addClass('disabled');
			$previewItem.removeClass('disabled');
		}
	},


	setLayerMedia: function(mediaType, $mediaEl, layerData) {

		switch(mediaType) {
			case 'img':

			var src = layerData.imageThumb || pluginPath+'img/admin/blank.gif',
				classes = layerData.imageThumb ? '' : ' dashicons dashicons-format-image';

				$mediaEl.attr('class', 'cp-sublayer-thumb'+classes).html('<img src="'+(layerData.imageThumb || pluginPath+'img/admin/blank.gif')+'">');
				break;

			case 'html':
				$mediaEl.addClass('dashicons dashicons-editor-code');
				break;

			case 'media':
				$mediaEl.addClass('dashicons dashicons-video-alt3');
				break;

			case 'post':
				$mediaEl.addClass('dashicons dashicons-admin-post');
				break;

			default:
				$mediaEl.addClass('dashicons dashicons-editor-textcolor');
				break;
		}
	},


	setLayerAttributes: function( event, element ) {

		if( event.type === 'change' && ! jQuery(element).is(':checkbox') ) {
			return;
		}

		var $tr = jQuery(element).closest('tr'),
			$inputs = jQuery('input', $tr );

		if( ! $inputs.eq(0).val() && ! $inputs.eq(1).val() ) {
			$tr.remove();
		}

		jQuery.each(CP_activeLayerDataSet, function(index, layerData) {

			var innerAttrs = layerData.innerAttributes = {},
				outerAttrs = layerData.outerAttributes = {};

			jQuery('.cp-sublayer-custom-attributes tr:not(:last-child)').each(function() {

				var $key = jQuery('td.first input', this),
					$val = jQuery('td.second input', this),
					$chb = jQuery('td.third input', this),
					key  = $key.val(),
					val  = $val.val();

				if( key && /^[a-zA-Z]([a-zA-Z0-9_-]+)$/.test( key ) ) {
					$key.removeClass('error');

					if( $chb.prop('checked') ) {

						outerAttrs[ key ] = val;
					} else {
						innerAttrs[ key ] = val;
					}

				} else {
					$key.addClass('error');
				}
			});
		});
	},


	updateLayerAttributes: function( layerData ) {

		// Make sure to have objects for data
		layerData.innerAttributes = layerData.innerAttributes || {};
		layerData.outerAttributes = layerData.outerAttributes || {};

		var customAttrs = jQuery.extend( {}, layerData.innerAttributes, layerData.outerAttributes),
			$customAttributes = jQuery('.cp-sublayer-custom-attributes');

		// Sort keys
		Object.keys(customAttrs).sort().forEach(function(key) {
			var value = customAttrs[key];
			delete customAttrs[key];
			customAttrs[key] = value;
		});

		jQuery.each(customAttrs, function(key, val) {
			jQuery('tr:last-child input:eq(2)', $customAttributes).prop('checked', key in layerData.outerAttributes );
			jQuery('tr:last-child input:eq(1)', $customAttributes).val( val );
			jQuery('tr:last-child input:eq(0)', $customAttributes).val( key ).trigger('keyup');
		});
	},

	updateLayerBorderPadding: function(el) {

		var $input 	= jQuery(el),
			value 	= parseInt( $input.val() ),
			type 	= ($input.parent().index() === 1) ? 'border' : 'padding',
			edge 	= $input.closest('tr').data('edge');
			sel 	= '.cp-'+type+'-'+edge+'-value';

		jQuery(sel).text( value || '–' );
	},

	// Iterate through all slides and their layers to
	// find the ones appearing on the target slide.
	staticLayersForSlide: function( targetSlideIndex ) {

		var staticLayers = [];

		jQuery.each(window.lsSliderData.layers, function(slideIndex, slideData) {
			jQuery.each(slideData.sublayers, function(layerIndex, layerData) {

				if( layerData.transition.static ) {
					var staticOut = layerData.transition.static;
					if( ( staticOut > targetSlideIndex || staticOut === 'forever' ) && slideIndex < targetSlideIndex ) {

						staticLayers.push({
							slideIndex: slideIndex,
							slideData: 	slideData,
							layerIndex: layerIndex,
							layerData: 	layerData
						});
					}
				}
			});
		});

		return staticLayers;
	},


	reindexStaticLayers: function() {

		jQuery.each(window.lsSliderData.layers, function(slideIndex, slideData) {
			jQuery.each(slideData.sublayers, function(layerIndex, layerData) {

				if( layerData.transition.staticUUID ) {
					var staticOut = CP_DataSource.slideForUUID( layerData.transition.staticUUID );
					if( staticOut ) {
						layerData.transition.static = staticOut + 1;
					}
				}
			});
		});
	},

	setupStaticLayersChooser: function( select ) {

		var $select = jQuery(select);

			// Remove previously added options
			$select.children(':gt(1)').remove();

			// Gather slide data
			var sliderData 	= window.lsSliderData,
				slideCount 	= sliderData.layers ? sliderData.layers.length : 0,
				markup 		= '<option value="-2" disabled>–</option>',
				slideName;

			// Generate markup
			for( var s = 0; s < slideCount; s++) {
				slideName 	= sliderData.layers[s].properties.title;
				slideName 	= slideName ? ' ('+slideName+')' : '';
				markup += '<option value="'+(s+1)+'">'+CP_l10n.SBStaticUntil.replace('%d', (s+1))+' '+slideName+'</option>';
			}

			// Append select options
			$select.append(markup);

			var staticVal = parseInt( CP_activeLayerDataSet[0].transition.static );
			if( staticVal ) {
				$select.children('[value="'+staticVal+'"]').prop('selected', true)
					.siblings().prop('selected', false);
			}

	},


	revealStaticLayer: function( el ) {

		var $target = jQuery(el).closest('li'),
			index 	= $target.index(),
			data 	= CP_activeStaticLayersDataSet[ index ];

		CreativePopup.selectSlide( data.slideIndex );
		CreativePopup.selectLayer( [data.layerIndex] );
	},


	addColorPicker: function(el) {
		jQuery(el).minicolors({
			opacity: true,
			changeDelay: 100,
			position: 'bottom right',
			change: function(hex, opacity) {
				//CreativePopup.willGeneratePreview();
			}
		}).blur(function( event ) {
			event.stopImmediatePropagation();

			jQuery(this)
				.removeClass('cp-colorpicker')
				.trigger('change')
				.addClass('cp-colorpicker');

		});
	},


	duplicateLayer: function() {
		this.pasteLayer( this.copyLayer(false).layers );
	},


	copyLayer: function(useStorage, layerDataSet, layerIndexSet, copyProperties) {

		// Defaults
		useStorage 		= useStorage 	|| true;
		layerDataSet 	= layerDataSet 	|| CP_activeLayerDataSet;
		layerIndexSet 	= layerIndexSet || CP_activeLayerIndexSet;
		copyProperties 	= copyProperties || { shiftLayers: true };

		// Iterate over the data set, clone objects and
		// make some visual adjustments on items
		var clipboardData = [];
		jQuery.each(layerDataSet, function(key, item) {

			// Copy layer data object
			var copy = jQuery.extend(true, {}, item);
			copy.subtitle += ' copy';

			if( copyProperties.shiftLayers ) {
				// copy.styles.top = (copy.styles.top.indexOf('%') == -1) ? parseInt(copy.styles.top) + 10 + 'px' : parseInt(copy.styles.top) + 1 + '%';
				// copy.styles.left = (copy.styles.left.indexOf('%') == -1) ? parseInt(copy.styles.left) + 10 + 'px' : parseInt(copy.styles.left) + 1 + '%';
			}

			// Add copy to the new set
			clipboardData.push(copy);
		});

		// Build clipboard data
		clipboardData = {
			layers: clipboardData,
			sliderID: copyProperties.sliderID || CP_sliderID,
			slideIndex: copyProperties.slideIndex || CP_activeSlideIndex,
			layerIndexSet: layerIndexSet
		};

		// Save to storage and return copies
		useStorage && localStorage.setObject('cp-layer-clipboard', clipboardData);
		return clipboardData;
	},


	pasteLayer: function(layerDataSet, layerIndexSet, pasteProperties) {

		// Check for provided data, fetch from clipboard if not
		var isDataProvided 	= layerDataSet ? true : false,
			clipboardData 	= localStorage.getObject('cp-layer-clipboard'),
			addIndexSet;

		if( ! clipboardData ) {
			alert(CP_l10n.SBPasteLayerError);
			return;
		}

		layerDataSet 		= layerDataSet 	|| clipboardData.layers;
		layerIndexSet 		= layerIndexSet || clipboardData.layerIndexSet;

		// Warn users when there's nothing on the clipboard
		// and halt execution.
		if( ! layerDataSet ) {
			alert(CP_l10n.SBPasteLayerError);
			return;
		}

		// Set pasteProperties to an empty object by default
		pasteProperties = pasteProperties || {};

		// If the layer is from the same slide, then
		// find the uppermost selected layer index
		// and insert everything into that position.
		// Otherwise insert at the beginning of the layers list.
		// -
		// Trying to insert layers before their parents
		// individually is complex, and it will fragment
		// dupe selection.
		if(clipboardData.sliderID !== CP_sliderID || clipboardData.slideIndex !== CP_activeSlideIndex) {
			addIndexSet = [].fill( 0, layerIndexSet.length);
		} else {
			addIndexSet = [].fill( Math.min.apply(Math, layerIndexSet), layerIndexSet.length);
		}


		// Generate UUIDs for the new layers
		jQuery.each( layerDataSet, function( index, layerData ) {
			layerData.uuid = CP_DataSource.generateUUID();
		});

		// Insert new layers
		CreativePopup.addLayer(layerDataSet, addIndexSet, { selectLayer: true } );

		// Copy pasted layer to make a new reference
		// and update settings like position and name
		if( ! isDataProvided) {
			this.copyLayer(true, layerDataSet, layerIndexSet, {
				sliderID: clipboardData.sliderID,
				slideIndex: clipboardData.slideIndex
			});
		}
	},


	selectMediaType: function(el, layerIndex) {

		// Gather layer data
		layerIndex = layerIndex ? layerIndex : CP_activeLayerIndexSet;
		layerIndex = (typeof layerIndex === 'object') ? layerIndex[0] : layerIndex;
		var layerData  	= CP_activeSlideData.sublayers[layerIndex],
			layer 		= jQuery(el).closest('.cp-sublayer-page'),
			$layerItem 	= jQuery('.cp-sublayers li').eq(layerIndex),
			section 	= jQuery(el).data('section'),
			placeholder = jQuery(el).data('placeholder'),
			sections 	= jQuery('.cp-layer-sections', layer).children();

		// Set active class
		jQuery(el).attr('class', 'active').siblings().removeAttr('class');

		// Store selection
		if( section ) {
			layerData.media = section;
		}

		// Show the corresponding sections
		sections.hide().removeClass('cp-hidden');
		jQuery('.cp-sublayer-element', layer).hide().removeClass('cp-hidden');
		jQuery('.cp-html-code .cp-options, .cp-html-code .cp-insert-media', layer).addClass('cp-hidden');

		switch(section) {
			case 'img':
				sections.eq(0).show();
				var src 	= layerData.imageThumb || pluginPath+'img/admin/blank.gif',
					classes = layerData.imageThumb ? '' : ' dashicons dashicons-format-image';

				jQuery('.cp-sublayer-thumb', $layerItem).attr('class', 'cp-sublayer-thumb'+classes).html('<img src="'+(layerData.imageThumb || pluginPath+'img/admin/blank.gif')+'">');
				break;

			case 'text':
				sections.eq(1).show();
				layer.find('.cp-sublayer-element').show();
				jQuery('.cp-html-code textarea').attr('placeholder', placeholder );
				jQuery('.cp-sublayer-thumb', $layerItem).attr('class', 'cp-sublayer-thumb dashicons dashicons-editor-textcolor').html('');
				break;

			case 'html':
				sections.eq(1).show();
				jQuery('.cp-html-code .cp-options, .cp-html-code .cp-insert-media', layer).addClass('cp-hidden');
				jQuery('.cp-html-code textarea').attr('placeholder', placeholder );
				jQuery('.cp-sublayer-thumb', $layerItem).attr('class', 'cp-sublayer-thumb dashicons dashicons-editor-code').html('');
				break;

			case 'media':
				sections.eq(1).show();
				jQuery('.cp-html-code .cp-options, .cp-html-code .cp-insert-media', layer).removeClass('cp-hidden');
				jQuery('.cp-html-code textarea').attr('placeholder', placeholder );
				jQuery('.cp-sublayer-thumb', $layerItem).attr('class', 'cp-sublayer-thumb dashicons dashicons-video-alt3').html('');
				break;

			case 'post':
				sections.eq(1).show();
				sections.eq(2).show();
				jQuery('.cp-html-code textarea').attr('placeholder', placeholder );
				jQuery('.cp-sublayer-thumb', $layerItem).attr('class', 'cp-sublayer-thumb dashicons dashicons-admin-post').html('');
				break;
		}

		if( section === 'img' || section === 'media' ) {
			jQuery('#cp-layer-transitions .cp-text-transition .cp-checkbox.toggle.on').click();
		}

		jQuery('.cp-sublayer-pages-wrapper').attr('class', 'cp-sublayer-pages-wrapper cp-layer-type-' + layerData.media);

		jQuery(CreativePopup).trigger('afterSelectMediaType');
	},


	selectElementType: function(el, layerIndex) {

		// Layer and properties
		layerIndex = layerIndex ? layerIndex : CP_activeLayerIndexSet;
		layerIndex = (typeof layerIndex === 'object') ? layerIndex[0] : layerIndex;

		var layerData  = CP_activeSlideData.sublayers[layerIndex],
			layer = jQuery(el).closest('.cp-sublayer-page'),
			element = jQuery(el).data('element');

		// Set active class
		jQuery(el).siblings().removeClass('active');
		jQuery(el).addClass('active');

		// Store selection
		if( element ) {
			layerData.type = element;
		}

	},


	copyLayerSettings: function(el) {

		var $el 		= jQuery(el),
			$wrapper 	= $el.closest('[data-storage]'),
			storage 	= $wrapper.attr('data-storage'),
			data 		= { styles: {}, transition: {} };

		// Iterate over options, store values
		$wrapper.find(':input').each(function() {
			if(this.name) {
				var $item 	= jQuery(this),
					area 	= $item.hasClass('sublayerprop') ? 'transition' : 'styles';

				data[area][this.name] = $item.is(':checkbox') ? $item.prop('checked') : $item.val();
			}
		});

		// Add data to clipboard
		var CP_clipboard = localStorage.getObject('cp-options-clipboard') || {};
		CP_clipboard[ storage ] = {
			timestamp: Math.floor(Date.now() / 1000),
			data: data
		};
		localStorage.setObject('cp-options-clipboard', CP_clipboard);

		// Send feedback to users
		$el.css('color', '#fcd116');
		setTimeout(function() {
			$el.css('color', '#00a0d2');
		}, 1000);
	},


	pasteLayerSettings: function(el) {

		var $el 		= jQuery(el),
			$wrapper 	= $el.closest('[data-storage]'),
			storage 	= $wrapper.attr('data-storage'),
			updateInfo 	= [];



		// Don't allow pasting options when the corresponding
		// transition sections is disabled
		if( $wrapper.closest('#cp-layer-transitions').length ) {
			if( ! $wrapper.find('.cp-h-button input').prop('checked') ) {
				$wrapper.find('.overlay').click();
				return;
			}
		}

		// Get clipboard data
		var CP_clipboard = localStorage.getObject('cp-options-clipboard') || {},
			clipboard = CP_clipboard[storage],
			timestamp = Math.floor(Date.now() / 1000);

		// Validate clipboard data
		if( ! clipboard || jQuery.isEmptyObject(clipboard.data) || clipboard.timestamp < timestamp - 60 * 60 * 3 ) {
			alert(CP_l10n.SBPasteError);
			return false;
		}

		// Iterate over all selected layers
		jQuery.each(CP_activeLayerIndexSet, function(index, layerIndex) {

			var layerData 	= CP_activeLayerDataSet[ index ],
				undoObj 	= {},
				redoObj 	= {};

			// Iterate over options, set new values
			$wrapper.find(':input').each(function() {
				if(this.name && this.name != 'top' && this.name != 'left') { // !!! don't paste left & top style

					var $this 	= jQuery(this),
						area 	= $this.hasClass('sublayerprop') ? 'transition' : 'styles',
						data 	= layerData[area];
						curVal 	= layerData[area][this.name],
						newVal 	= clipboard.data[area][this.name];

					if( this.name === 'style' ) { curVal = layerData[this.name]; }

					if( curVal != newVal ) {

						if( ! undoObj[ area ] ) { undoObj[ area ] = {}; }
						if( ! redoObj[ area ] ) { redoObj[ area ] = {}; }

						undoObj[ area ][ this.name ] = curVal;
						redoObj[ area ][ this.name ] = newVal;
					}

					// Handle custom CSS field separately
					if( this.name === 'style' ) { layerData.style = newVal; }
						else { data[this.name] = newVal; }
				}
			});

			updateInfo.push({
				itemIndex: layerIndex,
				undo: undoObj,
				redo: redoObj
			});

			CP_DataSource.buildLayer();

			// Update affected layer in preview
			// in case of style changes
			if( storage === 'cp-styles' ) {
				CreativePopup.generatePreviewItem( layerIndex );
			}
		});

		// Add UndoManager action
		CP_UndoManager.add('layer.general', CP_l10n.SBUndoPasteSettings, updateInfo);


		$el.css('color', '#90ca77');
		setTimeout(function() { $el.css('color', '#00a0d2'); }, 1000);

	},


	updateSlideInterfaceItems: function() {

		var slideData 	= CP_activeSlideData.properties,
			imgSrc 		= slideData.backgroundThumb ? slideData.backgroundThumb : slideData.background;

		CP_GUI.updateImagePicker( 'background', imgSrc );
	},

	updateLayerInterfaceItems: function(layerIndex) {

		var $layer = jQuery('.cp-sublayer-pages'),
			$layerItem = jQuery('.cp-sublayers li').eq(layerIndex),
			layerData = CP_activeSlideData.sublayers[layerIndex];

		if( ! layerData ) { return; }

		// Image layer preview
		var imgSrc = layerData.imageThumb ? layerData.imageThumb : layerData.image;
		CP_GUI.updateImagePicker( 'image', imgSrc );

		// Video poster preview
		imgSrc = layerData.posterThumb ? layerData.posterThumb : layerData.poster;
		CP_GUI.updateImagePicker( 'poster', imgSrc );

		// Select layer and media type
		if(typeof layerData.media == 'undefined') {
			switch(layerData.type) {
				case 'img': layerData.media = 'img'; break;
				case 'div': layerData.media = 'html'; break;
				default: layerData.media = 'text';
			}
		}

		CreativePopup.selectMediaType( $layer.find('.cp-layer-kind li[data-section="'+layerData.media+'"]'), layerIndex );
		CreativePopup.selectElementType( $layer.find('.cp-sublayer-element > li[data-element="'+layerData.type+'"]'), layerIndex );

		// Skip
		if(layerData.skip) { jQuery('.cp-icon-eye', $layerItem).addClass('disabled'); }
			else { jQuery('.cp-icon-eye', $layerItem).removeClass('disabled'); }

		if(layerData.locked) { jQuery('.cp-icon-lock', $layerItem).removeClass('disabled'); }
			else { jQuery('.cp-icon-lock', $layerItem).addClass('disabled'); }
	},

	changeLayerScreenType: function( $button, updateLayer  ) {


		jQuery('.cp-set-screen-types button').each(function() {

			var layerData 	= CP_activeLayerDataSet[0],
				$item 		= jQuery(this),
				type 		= $item.data('type');

			if( $button && $button.is( $item ) ) {
				layerData['hide_on_'+type] = ! layerData['hide_on_'+type];
			}

			$item[ layerData['hide_on_'+type] ? 'removeClass' : 'addClass' ]('playing');
		});


		if( updateLayer ) {
			CreativePopup.generatePreviewItem( CP_activeLayerIndexSet[0] );
			setTimeout(function() {
				CP_DataSource.buildLayersListItem( CP_activeLayerIndexSet[0] );
			}, 200);
		}
	},

	changeVideoType: function( event ) {

		var $input 			= jQuery('.cp-sublayer-basic input.bgvideo'),
			$options 		= jQuery('.cp-sublayer-basic .cp-media-options');
			$notification 	= jQuery('.cp-sublayer-basic .cp-bgvideo-options');

		if( $input.prop('checked') ) {
			$options.find('td').hide().filter('.volume,.overlay').show();
			$notification.show();

		} else {
			$options.find('td').show().filter('.overlay').hide();
			$notification.hide();
		}


		if( event && event.type === 'change' ) {
			CP_activeLayerDataSet[0].locked = $input.prop('checked') ? true : false;
			CP_DataSource.buildLayersListItem( CP_activeLayerIndexSet[0] );
		}
	},



	validateCustomCSS: function( $textarea ) {

		var keys = ['mix-blend-mode', 'filter'];

		for(var c = 0; c < keys.length; c++) {

			if( $textarea.val().indexOf(keys[c]) !== -1 ) {

				$textarea.val( $textarea.val().replace( new RegExp(keys[c], 'gi'), '') );

				TweenMax.to( jQuery('.cp-sublayer-style :input[name="'+keys[c]+'"]')[0], 0.15, {
					yoyo: true,
					repeat: 3,
					ease: Quad.easeInOut,
					scale: 1.2,
					backgroundColor: 'rgba(255, 0, 0, 0.2)'
				});
			}
		}
	},


	willGeneratePreview: function() {
		clearTimeout(CreativePopup.timeout);
		CreativePopup.timeout = setTimeout(function() {
				CreativePopup.generatePreview();
		}, 1000);
	},


	generatePreview: function() {

		// –––––––––––––––––––––––––––––––––––––––––––––
		// READ-ONLY BLOCK
		//
		// Group DOM read/access operations together,
		// so the browser can cache and apply them in a
		// in a single pass, triggering only one reflow.
		// ———————————————————————————––––––––––––––––––

		// Slider data sets
	var sliderProps = window.lsSliderData.properties,
		sliderSize 	= CreativePopup.getSliderSize(),
		slideIndex 	= CP_activeSlideIndex,
		slideData 	= CP_activeSlideData,
		slideProps 	= slideData.properties,
		layers 		= slideData.sublayers,
		$settings 	= jQuery('.cp-settings'),


		// Preview data
		width 		= sliderSize.width,
		height 		= sliderSize.height,
		bgColor 	= sliderProps.backgroundcolor,
		bgImage 	= sliderProps.backgroundimage,
		posts 		= window.lsPostsJSON || [],
		postOffset 	= slideProps.post_offset,
		slideBG 	= slideProps.background,
		slideBGSize = slideProps.bgsize,
		slideBGPos 	= slideProps.bgposition,
		post;



		// --- Adjust default values ---
		height 		= (height.toString().indexOf('%') !== -1) ? 400 : parseInt(height);
		postOffset 	= (postOffset == -1) ? slideIndex : postOffset;
		post 		= posts[ postOffset ] || {};




		// –––––––––––––––––––––––––––––––––––––––––––––
		// WRITE-ONLY BLOCK
		//
		// Use only DOM write operations after this comment,
		// so the browser can cache and apply them in a
		// in a single pass, triggering only one reflow.
		// ———————————————————————————––––––––––––––––––


		// --- Set preview canvas size ---
		CP_previewArea.css({
			width : width,
			height : height
		}).empty();

		jQuery('.cp-preview-size').css({
			width : width * CP_previewZoom,
			height : height * CP_previewZoom
		});

		// Make sure to follow preview area size changes
		jQuery('.cp-ruler').trigger('resize');
		CreativePopup.autoFitPreview();


		// --- Set global background ---
		CP_previewHolder.css({
			backgroundColor : bgColor || 'transparent',
			backgroundImage : bgImage ? 'url('+bgImage+')' : 'none',
			backgroundRepeat: sliderProps.globalBGRepeat,
			backgroundAttachment: sliderProps.globalBGAttachment,
			backgroundPosition: sliderProps.globalBGPosition,
			backgroundSize: sliderProps.globalBGSize
		});

		// Empty preview items list, so we don't include beyond
		// array bounds objects from previous slide in case of
		// slide change.
		CP_previewItems = [];

		// Handle post content
		if(slideBG == '[image-url]') {
			slideBG = post['image-url'];
			CP_GUI.updateImagePicker( 'background', post['image-url'], { fromPost: true });
		}

		// -- Set slide background && empty previous content ---
		if( ! slideBGSize || slideBGSize === 'inherit') {
			slideBGSize = sliderProps.slideBGSize;
		}

		if( ! slideBGPos || slideBGPos === 'inherit') {
			slideBGPos = sliderProps.slideBGPosition;
		}

		CP_previewArea.css({
			backgroundImage: slideBG ? 'url('+slideBG+')' : 'none',
			backgroundSize: slideBGSize || 'auto',
			backgroundPosition: slideBGPos || 'center center',
			backgroundColor: slideProps.bgcolor || 'transparent',
			backgroundRepeat: 'no-repeat'
		});

		if( sliderProps.sliderclass ) {
			CP_previewArea.addClass( sliderProps.sliderclass );
		}

		// -- Set background on slide tab
		slideBG = slideBG || pluginPath+'img/admin/blank.gif';
		jQuery('#cp-layer-tabs a').eq(slideIndex).data('help', "<img src='"+slideBG+"'>");

		// --- Setup layers ---
		for(var c = 0, len = layers.length; c < len; c++) {
			CreativePopup.generatePreviewItem( c, post);
		}

		// --- Setup static layers ---
		CreativePopup.generateStaticPreview();
	},


	generateStaticPreview: function() {

		CP_previewArea.children('.cp-static-layer').remove();

		jQuery.each(CP_activeStaticLayersDataSet, function(idx, data) {
			CreativePopup.generatePreviewItem( idx, false, {
				$targetArea: CP_previewArea,
				$layerItem: CP_previewArea.children('.cp-static-layer').eq(idx),
				layerData: data.layerData,
				isStatic: true
			});
		});
	},


	willGeneratePreviewItem: function(layerIndex) {
		clearTimeout(CreativePopup.timeout);
		CreativePopup.timeout = setTimeout(function() {
				CreativePopup.generatePreviewItem(layerIndex);
		}, 150);
	},


	generateSelectedPreviewItems: function() {
		jQuery.each(CP_activeLayerIndexSet, function(index, layerIndex) {
			CreativePopup.generatePreviewItem( layerIndex );
		});
	},


	generatePreviewItem: function(layerIndex, post, generateProperties) {

		if( jQuery.type( layerIndex ) === 'array' ) {
			layerIndex = layerIndex[0];
		}

		generateProperties = generateProperties || {};
		generateProperties = jQuery.extend({}, {
			$targetArea: CP_previewArea,
			$layerItem: CP_previewItems[layerIndex],
			layerData: CP_activeSlideData.sublayers[layerIndex],
			isStatic: false

		}, generateProperties);

		// Don't update the editor while live previews are active
		if( CreativePopup.isLayerPreviewActive ) { return false; }

		// Remove affected item to replace with an updated one
		if( generateProperties.$layerItem ) {
			generateProperties.$layerItem.remove();
		}


		// Get layer data sets
		var layerData = generateProperties.layerData,
			layerCount 	= CP_activeSlideData.sublayers ? CP_activeSlideData.sublayers.length : 0,

			// Get layer attributes
			item,
			type 	= layerData.type,
			html 	= layerData.html,
			id 		= layerData.id,

			// Get style settings
			top 	= layerData.styles.top,
			left 	= layerData.styles.left,

			innerAttrs = layerData.innerAttributes || {},
			outerAttrs = layerData.outerAttributes || {};

		if( generateProperties.isStatic ) {
			layerIndex = layerCount + layerIndex;
		}

		switch( layerData.media ) {
			case 'img': type = 'img'; break;
			case 'media':
			case 'html':
				type = 'div'; break;
			case 'post': type = 'post'; break;
		}

		// Get post content if not passed
		if( ! post ) {
			var posts = window.lsPostsJSON || [],
				postOffset = CP_activeSlideData.properties.post_offset;

			if( postOffset == -1 ) {
				postOffset = CP_activeSlideIndex;
			}

			post = posts[postOffset] || {};
		}

		// Hidden layer
		if(layerData.skip || layerData['hide_on_'+CP_activeScreenType] ) {

			item = jQuery('<div class="cp-l">').appendToWithIndex(generateProperties.$targetArea, layerIndex).hide();
			if( ! generateProperties.isStatic ) {
				CP_previewItems[layerIndex] = item;
			}

			return true;
		}



		// Append element
		if(type == 'img') {
			var url = layerData.image;

			if(url == '[image-url]') {
				url = post['image-url'] || '';
				CP_GUI.updateImagePicker( 'image', post['image-url'], { fromPost: true } );
			}

			var tmpContent = url ? '<img src="'+url+'">' : '<div>';
			item = jQuery(tmpContent).hide().appendToWithIndex(generateProperties.$targetArea, layerIndex);

		} else if(type == 'post') {

			var textlength = layerData.post_text_length;
			for(var key in post) {
				if(html && html.indexOf('['+key+']') !== -1) {
					var postVal = post[key];
					if( (key == 'title' || key == 'content' || key == 'excerpt') && textlength > 0) {
						postVal = CP_Utils.stripTags(postVal).substr(0, textlength);
						postVal = CP_Utils.nl2br(postVal);
					}
					html = html.replace('['+key+']', postVal);
				}
			}

			// Test for html wrapper
			html = jQuery.trim(html);

			var first = html.substr(0, 1),
				last = html.substr(html.length-1, 1);
			if(first == '<' && last == '>') {
				html = html.replace(/(\r\n|\n|\r)/gm,"");
				item = jQuery(html).appendToWithIndex(generateProperties.$targetArea, layerIndex);
			} else {
				item = jQuery('<div>').html(html).appendToWithIndex(generateProperties.$targetArea, layerIndex);
			}

		} else {
			item = jQuery('<'+type+'>').appendToWithIndex(generateProperties.$targetArea, layerIndex);
			if(html !== '') { item.html(html); }
		}

		// Sublayer properties
		var transforms = {}, trKey, trVal, defVal;
		for( trKey in layerData.transition) {
			if( CP_transformStyles.indexOf( trKey ) !== -1) {

				trVal = layerData.transition[trKey];

				if( ! trVal && trVal !== 0 ) { continue; }

				trVal = trVal.toString();

				defVal 	= ( trKey.indexOf('scale') !== -1 ) ? 1 : 0;
				if( parseInt(trVal) !== defVal ) {
					transforms[ trKey ] = parseFloat( trVal );
				}
			}
		}

		// Styles
		var styles = { 'z-index': (100 + layerCount) - layerIndex };
		for(var sKey in layerData.styles) {
			var cssVal = layerData.styles[sKey];

			if( ! cssVal && cssVal !== 0 ) { continue; }

			cssVal = cssVal.toString();
			if( cssVal.slice(-1) == ';' ) { cssVal = cssVal.substring(0, cssVal.length - 1); }

			styles[sKey] = isNumber(cssVal) ? cssVal + 'px' : cssVal;

			if( ['z-index', 'font-weight', 'opacity'].indexOf( sKey )  !== -1 ) {
				styles[sKey] = cssVal;
			}
		}

		// Locked layer
		layerData.hasTransforms = ! jQuery.isEmptyObject( transforms );



		// Apply style settings and attributes
		item.attr( jQuery.extend({}, innerAttrs, outerAttrs) ).attr({
			id: id,
			style: layerData.style,
		}).css(styles).css({
			whiteSpace: !layerData.styles.wordwrap ? 'nowrap' : 'normal',
		}).addClass(layerData['class']);

		// Restore selection
		if( ! generateProperties.isStatic ) {
			CP_previewItems[layerIndex] = item;
			if(CP_activeLayerIndexSet.indexOf(layerIndex) !== -1) {
				item.addClass('ui-selected');
			} else {
				item.removeClass('ui-selected');
			}
		}

		// Add cp-l or static layer classes
		item.addClass( generateProperties.isStatic ? 'disabled cp-static-layer' : 'cp-l' );

		if( layerData.locked ) { item.addClass('disabled'); }
		if( layerData.hasTransforms ) { item.addClass('transformed'); }
		if(~location.href.indexOf('AdminCreativePopupRevisions')) {
			item.addClass('disabled');
		}

		// Iframes & media embeds
		var $iframe = item.children('iframe,video').eq(0);
		if( $iframe.length ) {

			if( layerData.transition.backgroundvideo ) {

				item.addClass('disabled bgvideo').css({
					pointerEvents: 'none'
				});

				if( layerData.transition.overlay ) {
					if( layerData.transition.overlayer !== 'disabled' ) {
						jQuery('<div>', {
							'class': 'video-overlay',
							'style': 'background-image: url('+layerData.transition.overlay+')'
						}).appendTo( item );
					}
				}

				// Exit script
				CreativePopup.updatePreviewSelection();
				return;

			} else {

				var width 	= parseInt( $iframe.attr('width') ) || $iframe.width(),
					height 	= parseInt( $iframe.attr('height') ) || $iframe.height();

				if( ! layerData.styles.width ) {
					item.width( width );
				}

				if( ! layerData.styles.height ) {
					item.height( height );
				}
			}
		}

		// Make sure to override controls for media elements if set by media settings.
		if( layerData.media === 'media' && item.children('audio,video').length ) {
			if( layerData.transition.controls === 'enabled' ) {
				item.children('audio,video').prop('controls', true);
			} else if( layerData.transition.controls === 'disabled' ) {
				item.children('audio,video').prop('controls', false);
			}
		}

		if( item.is('img') ) {

			item.on( 'load', function(){
				CreativePopup.setPositions(item, top, left);
				CreativePopup.updatePreviewSelection();
				clearTimeout(CreativePopup.selectableTimeout);
				CreativePopup.selectableTimeout = setTimeout(function() {
					CreativePopup.updatePreviewSelection();
				}, 100);
			}).attr('src',item.attr('src') );
		}else{
			CreativePopup.setPositions(item, top, left);
			CreativePopup.updatePreviewSelection();
		}

		// DO TRANSFORMS
		transforms.transformPerspective = 500;
		transforms.transformOrigin = layerData.transition.transformoriginin || '50% 50% 0';

		if( transforms.transformOrigin.indexOf( 'slider') !== -1 ){

			var sliderSize = CreativePopup.getSliderSize(),
				sliderWidth = sliderSize.width,
				sliderHeight = sliderSize.height,
				itemLeft = parseFloat( item[0].style.left ),
				itemTop = parseFloat( item[0].style.top ),
				itemWidth = item.outerWidth(),
				itemHeight = item.outerHeight();

			transforms.transformOrigin = transforms.transformOrigin
				.replace( 'popupleft', -itemLeft + 'px' )
				.replace( 'popupright', sliderWidth - itemLeft + 'px' )
				.replace( 'popupcenter', sliderWidth / 2 - itemLeft + 'px' )
				.replace( 'popupmiddle', sliderHeight / 2 - itemTop + 'px' )
				.replace( 'popuptop', -itemTop + 'px' )
				.replace( 'popupbottom', sliderHeight - itemTop + 'px' );
		}

		TweenMax.set( item[0], transforms );

		// Add draggable
		CreativePopup.addDraggable();
	},

	setPositions: function(item, top, left, returnOnly) {

		item.show();

		var cssTop 	= top ? parseInt(top) : 0,
			cssLeft = left ? parseInt(left) : 0,
			style = item[0].style,
			marginLeft = parseInt( style.marginLeft ) || 0,
			marginTop = parseInt( style.marginTop ) || 0;

		// Position the element
		if( top && top.indexOf('%') !== -1 ) {

			if( cssTop === 0 ) {
				cssTop = 0 + marginTop;
			} else if( cssTop === 100 ) {
				cssTop = CP_previewArea.height() - item.outerHeight() + marginTop;
			} else {
				cssTop = CP_previewArea.height() / 100 * cssTop - item.outerHeight() / 2 + marginTop;
			}
		} else if( CP_activeLayerIndexSet.length === 1 ) {
			cssLeft += marginLeft;
		}

		if( left && left.indexOf('%') !== -1 ) {

			if( cssLeft === 0 ) {
				cssLeft =  0 + marginLeft;
			} else if( cssLeft === 100 ) {
				cssLeft = CP_previewArea.width() - item.outerWidth() + marginLeft;
			} else {
				cssLeft = CP_previewArea.width() / 100 * cssLeft - item.outerWidth() / 2 + marginLeft;
			}
		} else if( CP_activeLayerIndexSet.length === 1 ) {
			cssTop += marginTop;
		}

		if( returnOnly ) {
			return {
				top: cssTop,
				left: cssLeft
			};
		}

		item.css({ top: cssTop, left: cssLeft });
	},



	previewItemAtIndex: function(index) {
		return CP_previewArea.children('.cp-l').eq(index);
	},


	updatePreviewSelection: function() {

		// Hide lasso and stop execution
		// if there's no selected layers
		if( ! CP_activeLayerIndexSet.length ||
			! CP_activeSlideData.sublayers.length ||
			jQuery('.cp-editing').length) {
			$lasso.hide();
			return;
		}

		if( CP_activeLayerIndexSet.length === 1 ) {
			var layerData = CP_activeLayerDataSet[0];
			if ( layerData && ( layerData.hasTransforms || layerData.locked ) ) {
				$lasso.hide();
				return;
			}
		}

		var a = { left: Infinity, top: Infinity },
			b = { left: -Infinity, top: -Infinity };

		jQuery.each(CP_activeLayerIndexSet, function(idx, layerIndex) {
			var $item = CP_previewItems[layerIndex];
			if($item) {
				var p = $item.position(),
					q = {
						top: p.top + $item.outerHeight() * CP_previewZoom,
						left: p.left + $item.outerWidth() * CP_previewZoom
					};

				if( p.left < a.left ){ a.left = p.left; }
				if( p.top < a.top ){ a.top = p.top; }
				if( q.left > b.left ){ b.left = q.left; }
				if( q.top > b.top ){ b.top = q.top; }
			}
		});

		a.width = b.left - a.left;
		a.height = b.top - a.top;
		$lasso.css(a).show();

		if( ! $lasso.hasClass('cp-resizable-disabled') ) {
			$lasso.removeClass('ui-resizable-disabled').css(a).show();
		}

		// Mark the position of 0x0 px selection
		if( ! a.width || ! a.height ) {
			$lasso.addClass('ui-resizable-disabled');
		}
	},


	hidePreviewSelection: function() {
		jQuery('.cp-preview-wrapper').addClass('hide-selection');
	},


	showPreviewSelection: function() {
		jQuery('.cp-preview-wrapper').removeClass('hide-selection');
	},

	openMediaLibrary: function() {

		jQuery(document).on('click', '.cp-upload', function(e) {
			e.preventDefault();

			uploadInput = this;

			// Get library type
			var type = jQuery(this).hasClass('cp-insert-media') ? 'video,audio' : 'image';
			var multiple = jQuery(this).hasClass('cp-bulk-upload');

			// Media Library params
			var frame = wp.media({
				title : CP_l10n.SBMediaLibraryImage,
				multiple : multiple,
				library : { type : type },
				button : { text : 'Insert' }
			});

			// Runs on select
			frame.on('select',function() {

				// Get attachment(s) data
				var attachment 	= frame.state().get('selection').first().toJSON(),
					attachments = frame.state().get('selection').toJSON(),
					updateInfo 	= [],
					previewImg, newLayerData;



				// Page image upload
				// -------------------------------------
				if(jQuery(uploadInput).hasClass('cp-slide-image') ) {

					// Set image chooser preview
					previewImg = !typeof attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.sizes.full.url;
					CP_GUI.updateImagePicker( jQuery(uploadInput),  previewImg);

					// Add action to UndoManager
					CP_UndoManager.add('slide.general', CP_l10n.SBUndoSlideImage, {
						itemIndex: CP_activeSlideIndex,
						undo: {
							background: CP_activeSlideData.properties.background,
							backgroundId: CP_activeSlideData.properties.backgroundId,
							backgroundThumb: CP_activeSlideData.properties.backgroundThumb
						},
						redo: {
							background: attachment.url,
							backgroundId: attachment.id,
							backgroundThumb: previewImg
						}
					});

					// Set current layer image
					CP_activeSlideData.properties.background = attachment.url;
					CP_activeSlideData.properties.backgroundId = attachment.id;
					CP_activeSlideData.properties.backgroundThumb = previewImg;


					// Set other images
					for(c = 1; c < attachments.length; c++) {

						// Get preview image url
						previewImg = !typeof attachments[c].sizes.thumbnail ? attachments[c].sizes.thumbnail.url : attachments[c].sizes.full.url;

						// Build new slide
						var newSlideData = jQuery.extend(true, {}, CP_DataSource.getDefaultSlideData());
							newSlideData.background = attachments[c].url;
							newSlideData.backgroundId = attachments[c].id;
							newSlideData.backgroundThumb = previewImg;

						// Add a layer
						newLayerData = jQuery.extend(true, {}, CP_DataSource.getDefaultLayerData());
						newLayerData.subtitle = CP_l10n.SBLayerTitle.replace('%d', '1');

						// Add new layer
						window.lsSliderData.layers.push({
							properties: newSlideData,
							sublayers: [newLayerData]
						});

						// Add new slide tab
						var newIndex 	= window.lsSliderData.layers.length + 1,
							title 		= CP_l10n.SBSlideTitle.replace('%d', newIndex),
							tab 		= jQuery('<a href="#"><span>'+title+'</span><img src="'+previewImg+'" ><span class="dashicons dashicons-dismiss"></span>').insertBefore('#cp-add-layer');
					}


				// Name new slide properly
				CreativePopup.reindexSlides();


				// Page thumbnail upload
				// -------------------------------------
				} else if(jQuery(uploadInput).hasClass('cp-slide-thumbnail') ) {

					// Set image chooser preview
					previewImg = !typeof attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.sizes.full.url;
					CP_GUI.updateImagePicker( jQuery(uploadInput),  previewImg);

					// Set current layer image
					CP_activeSlideData.properties.thumbnail = attachment.url;
					CP_activeSlideData.properties.thumbnailId = attachment.id;
					CP_activeSlideData.properties.thumbnailThumb = previewImg;


				// Layer image upload
				// -------------------------------------
				} else if(jQuery(uploadInput).hasClass('cp-layer-image') ) {

					// Set image chooser preview
					previewImg = !typeof attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.sizes.full.url;
					CP_GUI.updateImagePicker( jQuery(uploadInput),  previewImg);

					// Add action to UndoManager
					CP_UndoManager.add('layer.general', CP_l10n.SBUndoLayerImage, {
						itemIndex: CP_activeLayerIndexSet[0],
						undo: {
							image: CP_activeLayerDataSet[0].image,
							imageId: CP_activeLayerDataSet[0].imageId,
							imageThumb: CP_activeLayerDataSet[0].imageThumb
						},
						redo: {
							image: attachment.url,
							imageId: attachment.id,
							imageThumb: previewImg
						}
					});

					// Set current layer image
					CP_activeLayerDataSet[0].image = attachment.url;
					CP_activeLayerDataSet[0].imageId = attachment.id;
					CP_activeLayerDataSet[0].imageThumb = previewImg;

					// Set other images
					for(c = 1; c < attachments.length; c++) {

						// Get preview image url
						previewImg = !typeof attachments[c].sizes.thumbnail ? attachments[c].sizes.thumbnail.url : attachments[c].sizes.full.url;

						// Build new layer
						newLayerData = jQuery.extend(true, {}, CP_DataSource.getDefaultLayerData());
						newLayerData.image = attachments[c].url;
						newLayerData.imageId = attachments[c].id;
						newLayerData.imageThumb = previewImg;
						newLayerData.styles.top = (10*c)+'px';
						newLayerData.styles.left = (10*c)+'px';

						// Add new layer
						CP_activeSlideData.sublayers.unshift(newLayerData);
						updateInfo.push({
							itemIndex: 0,
							undo: { data: {} },
							redo: { data: newLayerData }
						});
					}

					// Rebuild layers list
					CP_DataSource.buildLayersList();

					// Maintain UndoManager
					if(updateInfo.length) {
						CP_UndoManager.add('slide.layers', CP_l10n.SBUndoNewLayers, updateInfo);
					}


				// Media (video/audio) image upload
				// -------------------------------------
				} else if( jQuery(uploadInput).hasClass('cp-media-image') ) {

					// Set image chooser preview
					previewImg = !typeof attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.sizes.full.url;
					CP_GUI.updateImagePicker( jQuery(uploadInput),  previewImg);

					// Add action to UndoManager
					CP_UndoManager.add('layer.general', CP_l10n.SBUndoVideoPoster, {
						itemIndex: CP_activeLayerIndexSet[0],
						undo: {
							poster: CP_activeLayerDataSet[0].poster,
							posterId: CP_activeLayerDataSet[0].posterId,
							posterThumb: CP_activeLayerDataSet[0].posterThumb
						},
						redo: {
							poster: attachment.url,
							posterId: attachment.id,
							posterThumb: previewImg
						}
					});

					// Set current layer poster
					CP_activeLayerDataSet[0].poster = attachment.url;
					CP_activeLayerDataSet[0].posterId = attachment.id;
					CP_activeLayerDataSet[0].posterThumb = previewImg;


				// Global slider background
				// -------------------------------------
				} else if( jQuery(uploadInput).hasClass('cp-global-background') ) {

					// Set image chooser preview
					previewImg = !typeof attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.sizes.full.url;
					CP_GUI.updateImagePicker( jQuery(uploadInput),  previewImg);

					// Store changes and update the preview
					window.lsSliderData.properties.backgroundimage = attachment.url;
					window.lsSliderData.properties.backgroundimageId = attachment.id;


				// Slider Preview
				// -------------------------------------
				} else if( jQuery(uploadInput).hasClass('cp-slider-preview') ) {

					// Set image chooser preview
					previewImg = !typeof attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.sizes.full.url;
					CP_GUI.updateImagePicker( jQuery(uploadInput),  previewImg);

					// Make sure that the meta object exits
					if( ! window.lsSliderData.meta ) {
						window.lsSliderData.meta = {};
					}

					// Store changes and update the preview
					window.lsSliderData.meta.preview = attachment.url;
					window.lsSliderData.meta.previewId = attachment.id;


				// Multimedia HTML
				} else if( jQuery(uploadInput).hasClass('cp-insert-media')) {

					var hasVideo 	= false,
						hasAudio 	= false,

						videos 		= [],
						audios 		= [],

						url 		= '',
						mediaHTML 	= '';

					// Iterate over selected items
					for(c = 0; c < attachments.length; c++) {
						url = '/' + attachments[c].url.split('/').slice(3).join('/');
						if(attachments[c].type === 'video') {
							hasVideo = true;
							videos.push({ url: url, mime: attachment.mime });

						} else if(attachments[c].type === 'audio') {
							hasAudio = true;
							audios.push({ url: url, mime: attachment.mime });
						}
					}

					// Insert multimedia
					if(hasVideo) {
						mediaHTML += '<video width="640" height="360" preload="metadata" controls>\r\n';
						for(c = 0; c < videos.length; c++) {
							mediaHTML += '\t<source src="'+videos[c].url+'" type="'+videos[c].mime+'">\r\n';
						}
						mediaHTML += '</video>';
					}

					if(hasAudio) {

						if(hasVideo) { mediaHTML += '\r\n\r\n'; }

						mediaHTML += '<audio preload="metadata" nocontrols>\r\n';
						for(c = 0; c < audios.length; c++) {
							mediaHTML += '\t<source src="'+audios[c].url+'" type="'+audios[c].mime+'">\r\n';
						}
						mediaHTML += '</audio>';
					}

					CP_activeLayerDataSet[0].html = mediaHTML;
					jQuery(uploadInput).prev().val(mediaHTML);

				// Image with input field
				} else {
					jQuery(uploadInput).val( attachment.url );
					if(jQuery(uploadInput).is('input[name="image"]')) {
						jQuery(uploadInput).prev().attr('src', attachment.url);
					}
				}

				// Generate preview
				CreativePopup.generatePreview();
			});

			// Open ML
			frame.open();
		});
	},


	handleDroppedImages: function(event) {

		var oe 	= event.originalEvent,
			files = oe.dataTransfer.files,
			p = CP_previewArea.offset(),
			x = (jQuery(window).scrollLeft() + oe.clientX - p.left) / CP_previewZoom,
			y = (jQuery(window).scrollTop() + oe.clientY - p.top) / CP_previewZoom,
			updateInfo = [],
			layerDataSet = [],
			layerIndexSet = [],
			counter = 1;

		// Iterate over the dropped files
		jQuery.each(files, function(index, file) {
			CreativePopup.uploadImageToMediaLibrary(file, function(data) {

				// Build new layer
				var layerData = jQuery.extend(true, {}, CP_DataSource.getDefaultLayerData());
				layerData.image = data.url;
				layerData.imageId = data.id;
				layerData.imageThumb = data.sizes.thumbnail ? data.sizes.thumbnail.url : data.url;
				layerData.subtitle = file.name;
				layerData.styles.left = x+'px';
				layerData.styles.top = y+'px';

				layerIndexSet.push(0);
				layerDataSet.push(layerData);

				// Increase next layer offsets
				x += 20;
				y += 20;

				// Add new layers when every image
				// has been uploaded
				if(counter++ === files.length) {
					CreativePopup.addLayer( layerDataSet, layerIndexSet );
				}
			});
		});
	},


	uploadImageToMediaLibrary: function(file, callback) {
		if(file.type.indexOf('image') === 0) {

			// Build FormData object
			var formData = new FormData();
			formData.append('action', 'upload-attachment');
			formData.append('async-upload', file, file.name);
			formData.append('name', file.name);

			jQuery.ajax({
				url: ajaxurl.replace('admin-ajax', 'async-upload'),
				method: 'POST',
				data: formData,
				dataType: 'json',
				processData: false,
				contentType: false,
				error: function(jqXHR, textStatus, errorThrown) {
					alert( CP_l10n.SBUploadErrorMessage.replace('%s', errorThrown) );
				},
				success: function(resp) {

					if(!resp || !resp.success) {
						alert(CP_l10n.SBUploadError);
						return;
					}

					if(typeof callback != "undefined") {
						callback(resp.data);
					}
				}
			});
		}
	},

	addLayerSortables: function() {

		// Bind sortable function
		jQuery('.cp-sublayer-sortable').sortable({

			handle : 'span.cp-sublayer-sortable-handle',
			containment : 'parent',
			tolerance : 'pointer',
			axis : 'y',

			start: function() {
				CreativePopup.dragIndex = jQuery('.ui-sortable-placeholder').index() - 1;
			},

			change: function() {
				jQuery('.ui-sortable-helper').addClass('moving');
			},

			stop: function(event, ui) {

				// Get indexes
				var oldIndex = CreativePopup.dragIndex;
				var index = jQuery('.moving').removeClass('moving').index();

				CP_UndoManager.add('layer.order', CP_l10n.SBUndoSortLayers, {
					itemIndex: null,
					undo: { from: index, to: oldIndex },
					redo: { from: oldIndex, to: index }
				});

				if( index > -1 ){
					CP_Utils.moveArrayItem(CP_activeSlideData.sublayers, oldIndex, index);
				}

				// Update active layer index
				CP_activeLayerIndexSet = [];
				jQuery('.cp-sublayers li.active').each(function() {
					CP_activeLayerIndexSet.push( jQuery(this).index() );
				});

				// Reindex layers
				CreativePopup.reindexLayers();
				CreativePopup.generatePreview();
			}
		});
	},


	addSlideSortables: function() {

		jQuery('#cp-layer-tabs').sortable({

			containment: 'parent',
			tolerance: 'pointer',
			items: 'a:not(.unsortable)',

			start: function() {
				CreativePopup.dragIndex = jQuery('.ui-sortable-placeholder').index() - 1;
			},

			change: function() {
				jQuery('.ui-sortable-helper').addClass('moving');
			},

			stop: function(event, ui) {

				// Get indexes
				var oldIndex = CreativePopup.dragIndex,
					index = jQuery('.moving').removeClass('moving').index();

				if( index > -1 ){
					CP_Utils.moveArrayItem(window.lsSliderData.layers, oldIndex, index);
				}

				// Update active slide index
				CP_activeSlideIndex = jQuery('#cp-layer-tabs a.active').index();

				// Add static layers
				CP_activeStaticLayersDataSet = CreativePopup.staticLayersForSlide( CP_activeSlideIndex );

				// Reindex slides
				CreativePopup.reindexSlides();
				CreativePopup.reindexStaticLayers();
				CreativePopup.generateStaticPreview();
				CP_DataSource.buildLayersList();
			}
		});
	},


	addDraggable: function() {

		// Add dragables and update settings
		// while and after dragging
		CP_previewArea.children('.cp-l').draggable({
			snap: true,
			snapTolerance: 10,
			cancel: '.disabled,.transformed',
			start: function(e, ui) {

				// Fix for deselect
				if( !ui.helper.hasClass('ui-selected') ){
					ui.helper.addClass('ui-selected').trigger('selectablestop.ls');
				}

				// Store selected layers & lasso originalPosition
				$lasso.data('originalPosition', $lasso.position());
				jQuery('.cp-preview .ui-selected').each(function() {
					var pos = jQuery(this).position();
					jQuery(this).data('originalPosition', {
						'top': pos.top / CP_previewZoom,
						'left': pos.left / CP_previewZoom,
					});
				});
			},

			drag: function(event, ui) {
				CreativePopup.dragging(ui);
			},

			stop: function(event, ui) {

				var updateInfo = [];
				CreativePopup.dragging(ui);

				jQuery('.cp-preview .ui-selected').each(function() {

					var $layer 			= jQuery(this),
						index 			= $layer.index(),
						position 		= $layer.position(),
						newTop 			= Math.round( position.top / CP_previewZoom ) +'px',
						newLeft 		= Math.round( position.left / CP_previewZoom ) +'px',
						origPosition 	= $layer.data('originalPosition');


					// Maintain changes in data source
					CP_activeSlideData.sublayers[index].styles.top  = newTop;
					CP_activeSlideData.sublayers[index].styles.left = newLeft;

					// Gather changes for undoing
					updateInfo.push({
						itemIndex: index,
						undo: { left: origPosition.left+'px', top: origPosition.top+'px' },
						redo: { left: newLeft, top: newTop }
					});
				});

				// Add changes to undoManager
				CP_UndoManager.add('layer.style', CP_l10n.SBUndoLayerPosition, updateInfo.reverse());
			}
		});
	},


	dragging: function(ui) {

		// Fix positions when zoomed
		ui.position.top = Math.round(ui.position.top  / CP_previewZoom );
		ui.position.left = Math.round(ui.position.left / CP_previewZoom );

		var index 	= ui.helper.index(),
			top 	= Math.round( ui.position.top ),
			left 	= Math.round( ui.position.left );

		// Update input field values if it's visible
		if(CP_activeLayerIndexSet.length === 1) {

			// Update input fields
			jQuery('.cp-sublayer-style input[name="top"]').val( ui.helper.position().top / CP_previewZoom + 'px');
			jQuery('.cp-sublayer-style input[name="left"]').val( ui.helper.position().left / CP_previewZoom + 'px');
		}
	},


	resizing: function(e, ui) {

		var rh = ui.size.height / ui.originalSize.height,
			rw = ui.size.width / ui.originalSize.width,
			uiRatio = ui.originalSize.width / ui.originalSize.height,
			tagNames = [], layer, $layer, layerIndex, layerData, width,
			height, op, os, r;

			if( !$lasso.data( 'dragDirection') ){
				$lasso.data( 'dragDirection', rh === 1 ? 'horizontal' : 'vertical' );
			}

		// Update layer data
		jQuery('.cp-preview .ui-selected').each(function() {

			layer 		= this;
			$layer 		= jQuery(this);
			layerIndex 	= $layer.index();
			layerData 	= CP_activeSlideData.sublayers[layerIndex];

			tagNames.push( layer.tagName.toLowerCase() );

			op = $layer.data('originalPosition');
			os = $layer.data('originalSize');

			layerData.styles.top 	= layer.style.top 	= Math.round( (op.top - Math.round( ui.originalPosition.top / CP_previewZoom ) ) * rh + Math.round( ui.position.top / CP_previewZoom ) ) + 'px';
			layerData.styles.left 	= layer.style.left 	= Math.round( (op.left - Math.round( ui.originalPosition.left / CP_previewZoom ) ) * rw + Math.round( ui.position.left / CP_previewZoom ) ) + 'px';

			width = Math.round(os.width * rw) + 'px';
			height = Math.round(os.height * rh) + 'px';

			if( layerData.styles.width || $layer.is('img,div') ) {
				layerData.styles.width 	= width;
			}

			if( layerData.styles.height || $layer.is('img,div') ) {
				layerData.styles.height = height;
			}

			$layer.outerWidth(width);
			$layer.outerHeight(height);


			// Font-size only
			if( ! $layer.is( 'img, iframe, video, audio' ) ) {
				r = ui.size.width / ui.originalSize.width;
				layerData.styles['font-size'] 	= layer.style.fontSize 	= Math.round( r * os.fontSize ) +'px';

				if( os.lineHeight ) {
					layerData.styles['line-height'] = layer.style.lineHeight = Math.round( r * os.lineHeight ) +'px';
				}
			}

			if(CP_activeLayerIndexSet.length === 1) {

				if( layerData.styles.width || $layer.is('img,div') ) {
					jQuery('.cp-sublayer-style input[name="width"]').val( layer.style.width);
				}

				if( layerData.styles.height || $layer.is('img,div') ) {
					jQuery('.cp-sublayer-style input[name="height"]').val( layer.style.height);
				}

				jQuery('.cp-sublayer-style input[name="top"]').val( layer.style.top);
				jQuery('.cp-sublayer-style input[name="left"]').val( layer.style.left);
				jQuery('.cp-sublayer-style input[name="font-size"]').val(layerData.styles['font-size']);
				if( os.lineHeight ) {
					jQuery('.cp-sublayer-style input[name="line-height"]').val( layerData.styles['line-height']+'px' );
				}
			}
		});

		if( tagNames.indexOf('img') === -1 && tagNames.indexOf('div') === -1 ) {
			switch( $lasso.data( 'dragDirection') ){
				case 'horizontal':
					ui.size.height = ui.size.width / uiRatio;
				break;
				case 'vertical':
					ui.size.width = ui.size.height * uiRatio;
				break;
			}
		}

		// Update lasso size info
		$lasso.attr({
			'data-info-0': 'w: ' + Math.round(ui.size.width) + 'px',
			'data-info-1': 'h: ' + Math.round(ui.size.height) + 'px'
		});
	},


	listPreviewItems: function(e) {

		// Bail out if preview is active or when using Revisions
		if( CreativePopup.isSlidePreviewActive || CreativePopup.isLayerPreviewActive || ~location.href.indexOf('AdminCreativePopupRevisions') ) {
			return;
		}

		// Vars to hold overlapping elements
		// and mouse position
		var items 	= [],
			mt 		= e.pageY;
			ml 		= e.pageX;

		// Loop through layers list
		CP_previewArea.children('.cp-l').each(function(layerIndex) {

			// Get layer item and data
			var $layer 		= jQuery(this),
				layerData 	= CP_activeSlideData.sublayers[ $layer.index() ],

				// Get layer positions and dimensions
				t = CP_previewArea.offset().top + $layer.position().top,
				l = CP_previewArea.offset().left + $layer.position().left,
				w = $layer.outerWidth() * CP_previewZoom,
				h = $layer.outerHeight() * CP_previewZoom;

			if( (mt > t && mt < t+h) && (ml > l && ml < l+w) ) {
				items.push({ index: layerIndex, data: layerData });
			}
		});

		// Create list holder
		if(items.length > 1) {

			// Remove previous list (if any)
			jQuery('.cp-preview-item-list').remove();

			// Create list
			var $list = jQuery('<ul class="cp-preview-item-list">').prependTo('body');
				$list.hide().css({ top: mt, left: ml }).fadeIn(100);

			// Close event
			jQuery('body').one('click', function() {
				jQuery('.cp-preview-item-list').animate({ opacity: 0 }, 200, function() {
					jQuery(this).remove();
				});
			});

			// Loop through intersecting elements (if any)
			jQuery.each(items, function(idx, data) {

				var layerIndex = data.index,
					layerData = data.data,

					$li = jQuery('<li><div></div><span>'+layerData.subtitle+'</span></li>').appendTo($list);
					$li.data('layerIndex', layerIndex);

				CreativePopup.setLayerMedia( layerData.media,  jQuery('div', $li), layerData );
			});
		}
	},


	highlightPreviewItem: function(el) {

		// Get layer related data
		var layerIndex = jQuery(el).data('layerIndex');
		var $previewItem = CP_previewArea.children('.cp-l').eq(layerIndex);


		// Highlight item
		$previewItem.addClass('highlighted').siblings().addClass('lowlighted');

	},


	selectPreviewItem: function( layerIndex, event ) {

		// Remove layer highlights (if any)
		CP_previewArea.children().removeClass('highlighted lowlighted');

		if( ! event.ctrlKey && ! event.metaKey ) {
			if( JSON.stringify(CP_activeLayerIndexSet) !== '['+layerIndex+']' ) {
				return CreativePopup.selectLayer( [ layerIndex ] );
			}

		} else {

			// Get layer
			var $previewItem = CP_previewArea.children().eq( layerIndex );

			// Select layer
			CP_previewHolder.triggerHandler(
				jQuery.Event('mousedown.ls', {
					target: $previewItem[0],
					which: 1,
					shiftKey: event.shiftKey,
					ctrlKey: event.ctrlKey,
					metaKey: event.metaKey
				})
			);
		}
	},


	editLayerToggle: function() {
		if(CP_activeLayerIndexSet.length === 1) {
			var $editing 	= jQuery('.cp-editing'),
				$layer 		= CP_previewItems[ CP_activeLayerIndexSet[0] ];

			if(!$editing.length) {
				this.editLayerStart($layer);
			} else {
				this.editLayerEnd($editing);
			}
		}
	},


	editLayerStart: function( $layer ) {

		// Bail out earily if it's an image layer
		if( $layer.is('img') ) { return false; }

		CreativePopup.selectLayer( [$layer.index() ] );

		// Get layer data
		var layerData = CP_activeLayerDataSet[0];

		// Bail out early if it's a locked layer
		if( $layer.hasClass('disabled') || layerData.locked) { return false; }

		// Enable editing
		$layer.addClass('disabled cp-editing')
			.prop('contenteditable', true)
			.focus();

		// Hide selectable/resizable
		$lasso.addClass('ui-resizable-disabled').hide();

		// Save current value for undoManager
		jQuery('.cp-html-code textarea').data('prevVal',layerData.html);

		// Select all text
		document.execCommand('selectAll');

		// End editing when clicking away
		jQuery(document).on('click.cp-editing', function(event) {
			if(!jQuery(event.target).hasClass('cp-editing')) {
				CreativePopup.editLayerEnd( jQuery('.cp-editing') );
			}
		});
	},

	editLayer: function(e) {
		if((e.metaKey || e.ctrlKey || e.altKey) && e.which === 13) {
			e.preventDefault();
			document.execCommand('insertHTML', false, '\r\n&nbsp;');
		}
	},

	editLayerUpdate: function(layer) {
		var content 	= layer.textContent,
			$textarea 	= jQuery('.cp-html-code textarea'),
			styles 		= CP_activeLayerDataSet[0].styles;

		$textarea.val(content);
		CP_activeLayerDataSet[0].html = content;

		CreativePopup.setPositions( jQuery(layer), styles.top, styles.left);
	},

	editLayerPaste: function(event) {
		event.preventDefault();
		document.execCommand('insertHTML', false,
			event.originalEvent.clipboardData.getData('text/plain')
		);
	},

	editLayerEnd: function($layer) {
		jQuery(document).off('click.cp-editing');
		$layer.prop('contenteditable', false).removeClass('disabled cp-editing');
		jQuery('.cp-html-code textarea').trigger('change');
		CreativePopup.updatePreviewSelection();
	},

	reindexLayers: function(el) {

		var layerCount = CP_activeSlideData.sublayers.length;
			layerCount = layerCount ? layerCount : 0;

		// Reindex default layers' title
		jQuery('#cp-layers .cp-sublayers > li').each(function(index) {
			var layerTitle 	= jQuery(this).find('.cp-sublayer-title').val(),
				pattern 	= CP_l10n.SBLayerTitle.substring(0, CP_l10n.SBLayerTitle.length-2);

			if( layerTitle.indexOf(pattern) != -1 && layerTitle.indexOf('copy') == -1) {
				jQuery(this).find('.cp-sublayer-title').val( CP_l10n.SBLayerTitle.replace('%d', (layerCount-index) ) );
			}
		});
	},


	reindexSlides: function() {

		jQuery('#cp-layer-tabs a:not(.unsortable)').each(function(index) {

			var title 		= jQuery('span:first-child', this).text(),
				slideData 	= window.lsSliderData.layers[ index ],
				src 		= slideData.properties.backgroundThumb || pluginPath+'img/admin/blank.gif';

			if( title.indexOf('copy') < 0 && ~ title.indexOf('Page #') ) {
				title = 'Page #' + (index + 1);
			}

			jQuery(this)
				.attr({
					'data-help': "<div style='background-image: url("+src+");'></div>",
					'data-help-class': 'cp-slide-preview-tooltip popover-light',
					'data-help-delay': 1,
					'data-help-transition': false
				}).html('<span>'+title+'</span><span class="dashicons dashicons-dismiss"></span>');
		});
	},


	rebuildSlides: function() {

		// Remove tabs
		jQuery('#cp-layer-tabs a:not(.unsortable)').remove();

		jQuery.each(window.lsSliderData.layers, function(slideKey, slideData) {

			var title 	= slideData.properties.title || CP_l10n.SBSlideTitle.replace('%d', slideKey+1),
				src 	= slideData.properties.backgroundThumb || pluginPath+'img/admin/blank.gif';

			if( title.indexOf('copy') < 0 && ~ title.indexOf('Page #') ) {
				title = 'Page #' + (slideKey + 1);
			}

			$tab = jQuery('<a></a>').insertBefore('#cp-layer-tabs .unsortable:first');

			$tab.attr({
				'href': '#',
				'data-help': "<div style='background-image: url("+src+");'></div>",
				'data-help-class': 'cp-slide-preview-tooltip popover-light',
				'data-help-delay': 1,
				'data-help-transition': false
			}).html('<span>'+title+'</span><span class="dashicons dashicons-dismiss"></span>');
		});


		jQuery('#cp-layer-tabs a').eq( CP_activeSlideIndex ).addClass('active');
	},

	checkMediaAutoPlay: function( $textarea, prop, val ) {

		clearTimeout(CreativePopup.mediaCheckTimeout);
		CreativePopup.mediaCheckTimeout = setTimeout(function() {

			if( val.indexOf('autoplay') !== -1 ) {

				var $media = jQuery(val).filter('iframe'),
					autoplayDetected = false;

				 if( $media.is('iframe') ) {

					var URL = $media.attr('src').split('?'),
						targetIndex = -1;

					if( URL[1] ) {
						params = URL[1].split('&');
						jQuery.each(params, function(index, item) {
							if( item.indexOf('autoplay') !== -1 ) {
								autoplayDetected = true;
								targetIndex = index;
							}
						});

						if( targetIndex > -1 ) {
							params.splice(targetIndex, 1);
						}
					}

					if( typeof params !== 'undefined' ) {
						$media.attr('src', URL[0]+'?'+params.join('&') );
					}

				 } else if( $media.is('video') || $media.is('audio') ) {
					autoplayDetected = true;
					$media.removeAttr('autoplay');
				 }


				 if( autoplayDetected ) {

					$textarea.val( $media[0].outerHTML );
					$autoplay = jQuery('select[name="autoplay"]');

					jQuery('option', $autoplay)
						.prop('selected', false)
						.eq(1).prop('selected', true);

					TweenLite.to($autoplay[0], 0.2, {
						css: { scale: 1.3 },
						onComplete: function() {
							TweenLite.to($autoplay[0], 0.2, {
								css: { scale: 1 }
							});
						}
					});
				}
			}
		}, 100, $textarea, prop, val);
	},

	startSlidePreview: function( sliderOptions ) {

		// Stop **layer** preview if it's currently running
		// to prevent simultaneous instances
		this.stopLayerPreview(true);

		// Stop slide preview if it's currently running
		if(this.isSlidePreviewActive) {
			CreativePopup.stopSlidePreview();
			return true;
		}

		this.isSlidePreviewActive = true;

		sliderOptions = sliderOptions || {};

		// Get slider settings and preview container
		var sliderProps = window.lsSliderData.properties,
			sliderSize 	= CreativePopup.getSliderSize(),
			plugins 	= [];

		// Switch between preview and editor
		var $slider  = jQuery('#cp-layers .cp-real-time-preview').show();
			$slider  = jQuery('<div id="cp-preview-timeline" class="cp-ps-container">').appendTo( $slider );

		if( sliderProps.sliderclass ) {
			$slider.addClass( sliderProps.sliderclass );
		}

		jQuery('#cp-layers .cp-preview').hide();
		jQuery('#cp-layers .cp-preview-button').html('Stop').addClass('playing');

		CreativePopup.hidePreviewSelection();

		// Empty the preview area to avoid ID collisions
		CP_previewArea.empty();

		// Append slides & layers
		this.populateSliderPreview( $slider, plugins );

		// Handle plugins
		if( sliderOptions && sliderOptions.plugins ) {
			sliderOptions.plugins = jQuery.merge(sliderOptions.plugins, plugins);
		}

		// Init creativePopup
		$slider.creativePopup( jQuery.extend( true, {
			type: 'responsive',
			width: sliderSize.width,
			height: sliderSize.height,
			skin: 'noskin',
			skinsPath: pluginPath + 'css/core/skins/',
			firstSlide: CP_activeSlideIndex + 1,
			autoStart: sliderProps.autostart,
			keybNav: true,
			pauseOnHover: false,
			autoPlayVideos: sliderProps.autoplayvideos ? true : false,
			slideBGSize: sliderProps.slideBGSize,
			slideBGPosition: sliderProps.slideBGPosition,
			globalBGColor: sliderProps.backgroundcolor,
			globalBGImage: sliderProps.backgroundimage,
			globalBGAttachment: sliderProps.globalBGAttachment,
			globalBGRepeat: sliderProps.globalBGRepeat,
			globalBGPosition: sliderProps.globalBGPosition,
			globalBGSize: sliderProps.globalBGSize,
			parallaxScrollReverse: sliderProps.parallaxScrollReverse,
			navButtons: false,
			navStartStop: false,
			allowRestartOnResize: sliderProps.allowRestartOnResize ? true : false,
			preferBlendMode: sliderProps.preferBlendMode,
			plugins: plugins

		}, sliderOptions )).on( 'pageTimelineDidCreate', function(){
			jQuery( '.cp-slidebar-slider' ).attr({
				'data-help': CP_l10n.SBDragMe,
				'data-km-ui-popover-once': 'true',
				'data-km-ui-popover-theme': 'red',
				'data-km-ui-popover-autoclose': 3,
				'data-km-ui-popover-distance': 20
			}).trigger( 'mouseenter' );
		});
	},



	stopSlidePreview: function() {

		if( this.isSlidePreviewActive ) {
			this.isSlidePreviewActive = false;

			// Show the editor
			jQuery('#cp-layers .cp-preview').show();

			// Stop CreativePopup and empty the preview contents
			var $cps = jQuery('#cp-layers .cp-real-time-preview');
			$cps.find('.cp-container').creativePopup( 'destroy', true ).remove();
			$cps.hide();

			// Rewrote the Preview button text
			var btnText = ~location.href.indexOf('AdminCreativePopupRevisions') ? CP_l10n.SBPreviewSlide : CP_l10n.slideNoun;
			jQuery('#cp-layers .cp-preview-button').text( btnText ).removeClass('playing');

			CreativePopup.generatePreview();
			CreativePopup.showPreviewSelection();
			CreativePopup.updatePreviewSelection();

			// Remove timeline
			jQuery('.cp-timeline-switch li:first-child').click();

			// SET: layer editor size
			kmUI.smartResize.set();
		}
	},


	startPopupPreview: function( sliderOptions, button ) {

		// Stop both layer & slide preview if they are active
		this.stopLayerPreview(true);
		this.stopSlidePreview();

		sliderOptions = sliderOptions || {};

		// Prevent pressing the Preview button multiple times
		jQuery(button).prop('disabled', true);
		setTimeout(function() {
			jQuery(button).prop('disabled', false);
		}, 1000);

		// Get slider settings and preview container
		var sliderProps = window.lsSliderData.properties,
			width 		= parseInt(sliderProps.popupWidth),
			height 		= parseInt(sliderProps.popupHeight),
			sliderCSS 	= sliderProps.sliderstyle,
			circleTimer = sliderProps.circletimer ? true : false,
			plugins 	= ['popup'];

		// Append live preview element
		var $slider  = jQuery('<div id="cp-popup-preview" class="cp-ps-container">').appendTo('body');

		if( sliderCSS ) {
			$slider.attr('style', sliderCSS);
		}

		if( sliderProps.sliderclass ) {
			$slider.addClass( sliderProps.sliderclass );
		}


		// Get popup init options
		jQuery('.cp-settings-popup .popup-prop').each(function() {
			if( this.name ) { sliderOptions[ this.name ] = window.lsSliderData.properties[ this.name ]; }
		});

		// Append slides & layers
		if( CreativePopup.sliderIsEmpty( 1 ) ) {
			$slider.html( jQuery('#tmpl-popup-example-slider').text() );
			width = 700;
			height = 500;
			circleTimer = false;
			sliderOptions.popupCloseButtonStyle = 'top: 20px; left: 40px;';
			sliderOptions.popupPositionHorizontal = 'center';
			sliderOptions.popupPositionVertical = 'middle';
			sliderOptions.popupFitWidth = false;
			sliderOptions.popupFitHeight = false;
		} else {
			this.populateSliderPreview( $slider, plugins );
		}



		// Handle plugins
		if( sliderOptions && sliderOptions.plugins ) {
			sliderOptions.plugins = jQuery.merge(sliderOptions.plugins, plugins);
		}
		if (sliderProps.popupDisableOverlay) {
			sliderOptions.popupOverlayBackground = 'rgba(0,0,0,0)';
		}
		sliderOptions.popupShowOnce = true;
		jQuery('.cp-popup-preview-button').attr('disabled', true);

		// Init creativePopup
		$slider.one('popupDidClose', function() {
			jQuery('body > .cp-popup, body > .cp-popup-overlay').remove();
			jQuery('.cp-popup-preview-button').removeAttr('disabled');
		}).creativePopup( jQuery.extend( true, {
			type: 'popup',
			width: width,
			height: height,
			popupWidth: width,
			popupHeight: height,
			skin: sliderProps.skin,
			skinsPath: pluginPath + 'css/core/skins/',
			autoStart: sliderProps.autostart ? true : false,
			pauseOnHover: sliderProps.pauseonhover,
			firstSlide: sliderProps.firstlayer,
			shuffleSlideshow: sliderProps.randomslideshow ? true : false,
			navPrevNext: sliderProps.navprevnext ? true : false,
			hoverPrevNext: sliderProps.hoverprevnext ? true : false,
			navStartStop: sliderProps.navstartstop ? true : false,
			navButtons: sliderProps.navbuttons ? true : false,
			hoverBottomNav: sliderProps.hoverbottomnav ? true : false,
			showBarTimer: sliderProps.bartimer ? true : false,
			showCircleTimer: circleTimer,
			thumbnailNavigation: sliderProps.thumb_nav,
			tnContainerWidth: sliderProps.thumb_container_width,
			tnWidth: sliderProps.thumb_width,
			tnHeight: sliderProps.thumb_height,
			tnActiveOpacity: sliderProps.thumb_active_opacity,
			tnInactiveOpacity: sliderProps.thumb_inactive_opacity,
			autoPlayVideos: sliderProps.autoplayvideos ? true : false,
			slideBGSize: sliderProps.slideBGSize,
			slideBGPosition: sliderProps.slideBGPosition,
			globalBGColor: sliderProps.backgroundcolor,
			globalBGImage: sliderProps.backgroundimage,
			globalBGAttachment: sliderProps.globalBGAttachment,
			globalBGRepeat: sliderProps.globalBGRepeat,
			globalBGPosition: sliderProps.globalBGPosition,
			globalBGSize: sliderProps.globalBGSize,
			parallaxScrollReverse: sliderProps.parallaxScrollReverse,
			allowRestartOnResize: sliderProps.allowRestartOnResize ? true : false,
			preferBlendMode: sliderProps.preferBlendMode,
			plugins: plugins,

			// Popup Settings
			popupShowOnTimeout: 0.01,
			popupDisableOverlay: false,
			popupOverlayClickToClose: true,

			// missing settings
			autoPauseSlideshow: sliderProps.autopauseslideshow,
			clipSlideTransition: sliderProps.clipSlideTransition,
			forceLayersOutDuration: sliderProps.forceLayersOutDuration,
			loops: sliderProps.loops,
			forceCycles: sliderProps.forceloopnum,
			maxRatio: sliderProps.maxRatio,
			parallaxCenterDegree: sliderProps.parallaxCenterDegree,
			parallaxCenterLayers: sliderProps.parallaxCenterLayers,
			parallaxSensitivity: sliderProps.parallaxSensitivity,
			sliderFadeInDuration: sliderProps.sliderfadeinduration,
			sliderStyle: sliderProps.sliderstyle
		}, sliderOptions ));
	},


	populateSliderPreview: function( $slider, plugins, sliderData ) {
		sliderData = sliderData || window.lsSliderData;
		var sliderProps = sliderData.properties,
			callbacks 	= sliderData.callbacks,
			posts 		= window.lsPostsJSON || [];

		// Iterate over the slides
		jQuery.each(sliderData.layers, function(slideIndex, slideData) {

			// Slide data
			var slideProps = slideData.properties,
				layers = slideData.sublayers.reverse();

			// Get post content if any
			var postOffset = slideProps.post_offset;
			if(postOffset == -1) { postOffset = slideIndex; }
			var post = posts[postOffset];

			// Slide attributes
			var properties = '', sKey, sVal;
			for( sKey in slideProps) {
				sVal = slideProps[ sKey ];
				if( sVal !== '' && sVal !== 'null' ) {

					// Slide BG inheritance
					if( sKey === 'bgsize' && sVal === 'inherit' ) {
						sVal = sliderProps.slideBGSize;

					} else if( sKey === 'bgposition' && sVal === 'inherit' ) {
						sVal = sliderProps.slideBGPosition;
					}

					if( sKey === 'transitionorigami' && sVal ) {
						if(plugins.indexOf('origami') === -1) {
							plugins.push('origami');
						}
					}

					properties += sKey+':'+sVal+';';
				}
			}

			// Build the Slide
			var layer = jQuery('<div class="cp-slide">')
							.attr('data-cp', properties)
							.appendTo( $slider );

			// Get background
			var background = slideProps.background;
			if(background === '[image-url]') {
				background = post['image-url'];
			}

			// Add background
			if(background) {
				jQuery('<img src="'+background+'" class="cp-bg">').appendTo(layer);
			}

			// Get selected transitions
			var tr2d = slideProps['2d_transitions'],
				tr3d = slideProps['3d_transitions'],
				tr2dcustom = slideProps.custom_2d_transitions,
				tr3dcustom = slideProps.custom_3d_transitions;

			// Apply transitions
			if(tr2d) layer.attr('data-cp', layer.attr('data-cp') + ' transition2d: '+tr2d+'; ');
			if(tr3d) layer.attr('data-cp', layer.attr('data-cp') + ' transition3d: '+tr3d+'; ');
			if(tr2dcustom) layer.attr('data-cp', layer.attr('data-cp') + ' customtransition2d: '+tr2dcustom+'; ');
			if(tr3dcustom) layer.attr('data-cp', layer.attr('data-cp') + ' customtransition3d: '+tr3dcustom+'; ');


			// Iterate over layers
			jQuery.each(layers, function(layerKey, layerData) {
				CreativePopup.appendLivePreviewItem(layerKey, layerData, layer, post);
			});

			// Revert back to original layer order, as the reversed
			// layers list is only a visual thing on the admin UI.
			slideData.sublayers.reverse();
		});

		// Callbacks
		if( callbacks ) {
			for( var key in callbacks ) {

				var callback 	= callbacks[ key ],
					startIndex 	= callback.indexOf('{') + 1,
					endIndex 	= callback.length - 1;

					body 	= callback.substring(startIndex, endIndex);

				$slider.on(key, new Function('event', 'slider', body));
			}
		}
	},


	startLayerPreview: function(button, forceStop) {

		// Stop **slide** preview if it's currently running
		// to prevent simultaneous instances
		this.stopSlidePreview();

		// Stop or restart current preview session (if any)
		if(this.isLayerPreviewActive){
			CreativePopup.stopLayerPreview(forceStop);

			if( !!forceStop ){
				return;
			}
		}


		// Check for Multi-Select
		if( CP_activeLayerDataSet.length > 1 ) {
			alert(CP_l10n.SBLayerPreviewMultiSelect);
			return;
		}

		// Change preview state
		this.isLayerPreviewActive = true;
		jQuery(button).addClass('playing').text( CP_l10n.stop );

		// Hide other layers
		CreativePopup.hidePreviewSelection();
		CP_previewArea.children().addClass('cp-transparent');

		// Create container element
		var $wrapper = jQuery('<div>').addClass('cp-layer-preview-wrapper').appendTo('.cp-preview-wrapper');

		// Slide properties
		var slideProps = CP_activeSlideData.properties,
			postOffset = slideProps.post_offset;

		if(postOffset == -1) { postOffset = CP_activeSlideIndex; }
		var posts 	= window.lsPostsJSON || [];
		var post 	= posts[postOffset];

		// Slide attributes
		var properties = '', sKey, sVal;
		for( sKey in slideProps) {
			sVal = slideProps[ sKey ];

			// Don't allow empty values & force auto slide duration
			if( sVal !== '' && sVal !== 'null' && sKey !== 'slidedelay' ) {
				properties += sKey+':'+sVal+';';
			}
		}

		// Add slide
		$s1 = jQuery('<div>').attr({
			'class': 'cp-slide',
			'data-cp': properties
		}).appendTo($wrapper);

		// Get layer data
		var item = CP_activeLayerDataSet[0],
			layerData = jQuery.extend(true, {}, item);
			layerData.transition.delayin = 100;


		CreativePopup.appendLivePreviewItem(0, layerData, $s1, post);

		item.skip = true;
		CP_previewItems[ CP_activeLayerIndexSet[0] ].addClass('cp-invisible');

		var sliderSize = CreativePopup.getSliderSize();

		// Initialize slider
		$wrapper.creativePopup({
			type: 'responsive',
			width: sliderSize.width,
			height: sliderSize.height,
			skin: 'noskin',
			skinsPath: pluginPath + 'css/core/skins/',
			pauseOnHover: false,
			autoPlayVideos: false,
			keybNav: false,
			navButtons: false,
			navStartStop: false,
			navPrevNext: false
		}).on('pageTimelineDidComplete', function( event, slider ) {
			if( jQuery('.cp-timeline-switch li').eq(0).hasClass('active') ) {
				slider.api('replay');
				return false;
			}
		});

	},


	stopLayerPreview: function(forceStop){

		if(this.isLayerPreviewActive) {

			// Change preview state
			this.isLayerPreviewActive = false;
			CreativePopup.showPreviewSelection();
			jQuery('.cp-layer-preview-button').removeClass('playing').text( CP_l10n.layer );

			jQuery.each(CP_activeLayerDataSet, function(index, item) {
				item.skip = false;
			});

			// Restore editing area
			// CP_activeLayerDataSet.skip = false;
			if( forceStop ) {
				CreativePopup.generateSelectedPreviewItems();
			}

			jQuery('.cp-layer-preview-wrapper').creativePopup( 'destroy', true ).remove();
			CP_previewArea.children().removeClass('cp-transparent');
		}
	},


	appendLivePreviewItem: function(layerKey, layerData, $slide, post) {

		// Skip sublayer?
		if( !!layerData.skip || layerData['hide_on_'+CP_activeScreenType] ) {
			return true;
		}

		// Gather sublayer data
		var type = layerData.type;
		switch( layerData.media ) {
			case 'img':
				type = 'img';
				break;
			case 'html':
			case 'media':
				type = 'div';
				break;
			case 'post':
				type = 'post';
				break;
		}

		var image = layerData.image,
			html = layerData.html,
			style = layerData.style,
			top = layerData.styles.top,
			left = layerData.styles.left,
			skip = layerData.hasOwnProperty('skip'),
			url = layerData.url,
			id = layerData.id,
			classes = layerData['class'],

			innerAttrs = layerData.innerAttributes || {},
			outerAttrs = layerData.outerAttributes || {};

		// Sublayer properties
		var sublayerprops = '', trKey, trVal;
		for( trKey in layerData.transition) {

			trVal = layerData.transition[ trKey ];

			if( trKey.indexOf('perspective') !== -1 &&  trVal.toString() === '500') {
				continue;

			}

			if( trKey === 'backgroundvideo' && ! trVal ) {
				continue;
			}

			if( trVal !== '' && trVal !== null && trVal !== 'null' && trVal !== 'inherit' ) {
				sublayerprops += trKey+':'+trVal+';';
			}
		}


		// Styles
		var styles = {}, cssProp, cssVal;
		for( cssProp in layerData.styles ) {
			cssVal = layerData.styles[cssProp];

			if( ! cssVal && cssVal !== 0 ) { continue; }
			cssVal = cssVal.toString();

			if(cssVal.slice(-1) == ';' ) {
				cssVal = cssVal.substring(0, cssVal.length - 1);
			}
			if (cssVal) { // !! fix for unused styles don't override Custom CSS
				styles[cssProp] = isNumber(cssVal) ? cssVal + 'px' : cssVal;

				if( ['z-index', 'font-weight', 'opacity'].indexOf( cssProp )  !== -1 ) {
					styles[cssProp] = cssVal;
				}
			}
		}

		// Build the sublayer
		var sublayer;
		if(type == 'img') {
			if(!image) { return true; }
			if(image == '[image-url]') { image = post['image-url']; }

			sublayer = jQuery('<img src="'+image+'" class="cp-l">').appendTo($slide);

		} else if(type == 'post') {

			// Parse post placeholders
			var textlength = layerData.post_text_length;
			for(var key in post) {
				if(html.indexOf('['+key+']') !== -1) {
					if( (key == 'title' || key == 'content' || key == 'excerpt') && textlength > 0) {
						post[key] = post[key].substr(0, textlength);
					}
					html = html.replace('['+key+']', post[key]);
				}
			}

			// Test html
			html = jQuery.trim(html);
			var first = html.substr(0, 1);
			var last = html.substr(html.length-1, 1);
			if(first == '<' && last == '>') {
				html = html.replace(/(\r\n|\n|\r)/gm,"");
				sublayer = jQuery(html).appendTo($slide).addClass('cp-l');
			} else {
				sublayer = jQuery('<div>').appendTo($slide).html(html).addClass('cp-l');
			}

		} else {
			sublayer = jQuery('<'+type+'>').appendTo($slide).html(html).addClass('cp-l');

			// Rewrite Youtube/Vimeo iframe src to data-src
			var $video = sublayer.find('iframe[src*="youtube-nocookie.com"], iframe[src*="youtube.com"], iframe[src*="youtu.be"], iframe[src*="player.vimeo"]');
			if( $video.length ) {
				$video.attr('data-src', $video.attr('src') ).removeAttr('src');
			}
		}

		// Apply styles
		sublayer
			.attr({ 'id': id, 'style': style })
			.css(styles)
			.css('white-space', !layerData.styles.wordwrap ? 'nowrap' : 'normal')
			.addClass(classes);

		// Apply attributes
		for( var iaKey in innerAttrs ) {
			if( iaKey.toLowerCase() === 'class' ) {
				sublayer.addClass( innerAttrs[iaKey] );
				continue;
			}

			sublayer[0].setAttribute(iaKey, innerAttrs[iaKey]);
		}

		// Position the element
		if(top.indexOf('%') != -1) { sublayer.css({ top : top });
			} else { sublayer.css({ top : parseInt(top) }); }

		if(left.indexOf('%') != -1) { sublayer.css({ left : left });
			} else { sublayer.css({ left : parseInt(left) }); }

		if( url ) {
			var anchor = jQuery('<a href="'+url+'" target="_blank"></a>');
				anchor.attr( outerAttrs );

			sublayer.wrap( anchor );
		} else {

			// Apply attributes
			for( var oaKey in outerAttrs ) {
				if( oaKey.toLowerCase() === 'class' ) {
					sublayer.addClass( outerAttrs[oaKey] );
					continue;
				}

				sublayer[0].setAttribute(oaKey, outerAttrs[oaKey]);
			}
		}

		sublayer.attr('data-cp', sublayerprops);
	},


	updatePopupNotifications: function() {
		var $wrapper 	= jQuery('#cp-popup-notifications'),
			sliderProps = window.lsSliderData.properties,
			triggerCond = jQuery.trim(sliderProps.popupShowOnTimeout) || jQuery.trim(sliderProps.popupShowOnIdle) || jQuery.trim(sliderProps.popupShowOnScroll) || sliderProps.popupShowOnLeave || jQuery.trim(sliderProps.popupShowOnClick);

		$wrapper[ triggerCond ? 'slideUp' : 'slideDown' ](300).removeClass('cp-hidden');
	},


	updatePopupPositionGrid: function() {

		var vPos = window.lsSliderData.properties.popupPositionVertical,
			hPos = window.lsSliderData.properties.popupPositionHorizontal;

		jQuery('.cp-popup-position td[data-move="'+vPos+' '+hPos+'"]').click();
	},


	updatePopupPreview: function() {

		var fitWidth 	= window.lsSliderData.properties.popupFitWidth,
			fitHeight 	= window.lsSliderData.properties.popupFitHeight,
			vPos 		= window.lsSliderData.properties.popupPositionVertical,
			hPos 		= window.lsSliderData.properties.popupPositionHorizontal,
			$preview 	= jQuery('.cp-settings-popup .cp-popup-layout-preview .cp-popup-layout-inner');

			$preview.attr('class', 'cp-popup-layout-inner cp-popup-'+vPos+' cp-popup-'+hPos);

			if( fitWidth ) { $preview.addClass('cp-popup-fitwidth'); }
			if( fitHeight ) { $preview.addClass('cp-popup-fitheight'); }
	},


	updateLayerPreview: function() {

		var $slider = jQuery('.cp-real-time-preview .cp-container'),
			$layer 	= jQuery('.cp-layer', $slider);



		$slider.creativePopup( 'updateLayerData', $layer, 'scalein: 2; rotatein: 360; scaleout: 2; rotateout: 360; rotate: -45;' );
	},



	openTransitionGallery: function() {

		kmUI.modal.open( '#tmpl-cp-transition-modal', { width: 900, height: 1500 } );

		// Append transitions
		CreativePopup.appendTransition(0, '', '2d_transitions', lsTransitions.t2d);
		CreativePopup.appendTransition(1, '', '3d_transitions', lsTransitions.t3d);

		// Append custom transitions
		if(typeof cpCustomTransitions != "undefined") {
			if(cpCustomTransitions.t2d.length) {
				CreativePopup.appendTransition(2, '', 'custom_2d_transitions', cpCustomTransitions.t2d);
			}
			if(cpCustomTransitions.t3d.length) {
				CreativePopup.appendTransition(3, '', 'custom_3d_transitions', cpCustomTransitions.t3d);
			}
		}

		jQuery('#cp-transition-window .cp-select-special-transition').each(function() {
			var $this 	= jQuery(this),
				name 	= $this.data('name');


			$this.addClass( CP_activeSlideData.properties[ name ] ? 'on' : 'off' );
		});

		// Select proper tab
		jQuery('#cp-transition-window .filters li.active').click();
	},


	appendTransition: function(index, title, tbodyclass, transitions) {

		// Append new section
		var section = jQuery( '#cp-transitions-list section:eq('+index+') div' ).empty();

		// Get checked transitions
		var checked = CP_activeSlideData.properties[tbodyclass];
			checked = checked ? checked.split(',') : [];

		if( transitions && transitions.length ) {
			for( c = 0; c < transitions.length; c++ ){
				var addClass = '';
				if(checked.indexOf(''+(c+1)+'') != -1 || checked == 'all') {
					addClass = 'added';
				}
				section.append( jQuery( '<div class="tr-item '+addClass+'"data-key="' + ( c + 1 ) + '"><span><i>' + ( c + 1 ) + '</i><i class="dashicons dashicons-yes"></i></span><span>' + transitions[c].name + '</span></div>' ) );
			}
		}
	},


	selectAllTransition: function(index, check) {

		// Get checkbox and transition type
		var checkbox = jQuery('#cp-transition-window header i:last'),
			type = jQuery('#cp-transitions-list section').eq(index).data('tr-type');

		if(check) {

			jQuery( '#cp-transitions-list section:eq('+index+')' ).find('.tr-item').addClass('added');
			checkbox.attr('class', 'on').text( CP_l10n.deselectAll );
			CP_activeSlideData.properties[ type ] = 'all';

		} else {

			jQuery( '#cp-transitions-list section:eq('+index+')' ).find('.tr-item').removeClass('added');
			checkbox.attr('class', 'off').text( CP_l10n.selectAll);
			CP_activeSlideData.properties[ type ] = '';
		}
	},

	toggleTransition: function(el) {

		var $item 		= jQuery(el),
			$section 	= $item.closest('section'),
			$trs 		= $section.find('.tr-item'),
			type 		= $section.data('tr-type');

		// Toggle addded class
		$item.toggleClass('added');

		// All selected
		if($trs.filter('.added').length == $trs.length) {

			CreativePopup.selectAllTransition( $section.index(), true );
			return;

		// Uncheck select all
		} else {

			// Check the checkbox
			jQuery('#cp-transition-window header i:last').attr('class', 'off').text( CP_l10n.selectAll );
		}

		// Gather checked selected transitions
		var checked = [];
		$trs.filter('.added').each(function() {
			checked.push( jQuery(this).data('key') );
		});

		// Set data
		CP_activeSlideData.properties[ type ] = checked.join(',');
	},


	save: function( saveProperties ) {

		saveProperties = saveProperties || {};

		// Bring all layers back in,
		// as it can mess with saving.
		this.stopLayerPreview(true);

		// Get the slider data
		var sliderData = jQuery.extend(true, {}, window.lsSliderData);

		// Temporary disable submit button
		jQuery('.cp-publish').addClass('saving').find('button').text( CP_l10n.saving ).attr('disabled', true);

		// Serialize slider settings to prevent jQuery form converting form data
		sliderData.properties = JSON.stringify(sliderData.properties);

		// 1. Iterate over the slides and encode them
		//    to workaround PHP's array size limitation.
		//
		// 2. Iterate over the styles object of layers
		//    to remove empty values added mistakenly.
		//
		// 3. Also check whether they use dynamic content.
		//
		// 4. Generate UUIDs on save for every layer for WPML
		//    and other purposes that requires a persistent ID.
		jQuery.each(sliderData.layers, function(slideIndex, slideData) {
			slideData.properties.post_content = false;
			jQuery.each(slideData.sublayers, function(layerIndex, layerData) {

				if( layerData.styles ) {
					jQuery.each(layerData.styles, function(cssIndex, cssVal) {
						if( cssVal === '' ) {
							delete layerData.styles[cssIndex];
						}
					});
				}

				layerData.transition 	= JSON.stringify(layerData.transition);
				layerData.styles 		= JSON.stringify(layerData.styles);

				if(slideData.properties.post_content === false && layerData.media == 'post') {
					slideData.properties.post_content = true;
				}

				var uuid = CP_DataSource.uuidForLayer( layerIndex, slideIndex);
				sliderData.layers[ slideIndex ].sublayers[ layerIndex ].uuid = uuid;
			});

			// Reverse the list of layers, as it is only
			// a visual thing on the admin UI.
			slideData.sublayers.reverse();
			sliderData.layers[slideIndex] = JSON.stringify(slideData);
		});


		// Save slider
		jQuery.ajax({
			type: 'POST', url: ajaxurl, dataType: 'text',
			data: {
				_wpnonce: jQuery('#cp-slider-form input[name="_wpnonce"]').val(),
				_wp_http_referer: jQuery('#cp-slider-form input[name="_wp_http_referer"]').val(),
				action: 'cp_save_popup',
				id: CP_sliderID,
				sliderData: sliderData
			},
			error: function(jqXHR, textStatus, errorThrown) {
				jQuery('.cp-publish').removeClass('saving').addClass('failed').find('button').text( CP_l10n.error );
				setTimeout(function() {
					alert( CP_l10n.SBSaveError.replace('%s', errorThrown ) );
				}, 100);
			},
			success: function(jqXHR, textStatus) {
				try {
					var res = JSON.parse(jqXHR);
				} catch (ex) {
					jQuery('.cp-publish').removeClass('saving').addClass('failed').find('button').text( CP_l10n.error );
					if (~jqXHR.indexOf('name="submitLogin"')) {
						alert('Your session has expired, please login to continue!');
						jQuery('#wpwrap').css({ opacity: 0.3, pointerEvents: 'none' });
						document.cookie = 'cp-login=1';
						var win = jQuery('<iframe id="cp-login">').css({
							position: 'fixed',
							top: 'calc(50vh - 310px)',
							left: 'calc(50vw - 240px)',
							width: 480,
							height: 620,
							background: '#fff',
							border: '1px solid #dfe2e5',
							boxShadow: '0 3px 16px rgba(0,0,0,0.2)',
							zIndex: 9999
						}).appendTo(document.body)[0].contentWindow;
						win.document.write(jqXHR);
						win.history.pushState('', '', location.origin+location.pathname+'?controller=AdminLogin&redirect=AdminLayerSlider');
					}
				}
				if (res && res.status == 'ok') {
					// Consider the editor as "clean", do not show
					// unsaved changes warning when leaving the page.
					CP_editorIsDirty = false;

					// Button feedback
					jQuery('.cp-publish').removeClass('saving').addClass('saved').find('button').text( CP_l10n.saved );

					// Display on screen notification when save
					// was initiated by a keyboard shortcut.
					if( saveProperties.usedShortcut && typeof lsScreenOptions !== 'undefined' && lsScreenOptions.useNotifyOSD === 'true' ) {
						kmUI.notify.show({
							icon: 'dashicons-yes',
							iconColor: '#7eb917',
							text: CP_l10n.notifyPopupSaved
						});
					}
				}
			},
			complete: function(data) {

				setTimeout(function() {
					jQuery('.cp-publish').removeClass('saved failed').find('button').text( CP_l10n.save ).attr('disabled', false);
					kmUI.notify.hide();
				}, 2000);
			}
		});
	},
};



var CP_PostOptions = {

	init: function() {

		jQuery('#cp-layers').on('click', '.cp-configure-posts', function(e) {
			e.preventDefault(); CP_PostOptions.open(this);
		});

		jQuery('.cp-configure-posts-modal .header a').click(function(e) {
			e.preventDefault(); CP_PostOptions.close();
		});

		jQuery('#cp-post-options select:not(.cp-post-taxonomy, .post_offset)').change(function() {
			window.lsSliderData.properties[ jQuery(this).attr('name') ] = jQuery(this).val();
			CP_PostOptions.change(this);
		});

		jQuery('#cp-post-options select.offset').change(function() {
			CP_activeSlideData.properties.post_offset = jQuery(this).val();
			CreativePopup.willGeneratePreview();
		});

		jQuery('#cp-post-options select.cp-post-taxonomy').change(function() {
			window.lsSliderData.properties.post_taxonomy = jQuery(this).val();
			CP_PostOptions.getTaxonoies(this);
		});

		jQuery('#cp-layers').on('click', '.cp-post-placeholders li', function() {
			CP_PostOptions.insertPlaceholder(this);
		});
	},


	open: function(el) {

		// Create overlay
		jQuery('body').prepend(jQuery('<div>', { 'class' : 'cp-overlay'}));

		// Get slide's post offset
		var offset = parseInt(CP_activeSlideData.properties.post_offset) + 1;

		// Show modal window
		var modal = jQuery('#cp-post-options').show();
			modal.find('select.offset option').prop('selected', false).eq(offset).prop('selected', true);

		// Close event
		jQuery(document).one('click', '.cp-overlay', function() {
			CP_PostOptions.close();
		});

		// First open?
		if(modal.find('.cp-post-previews ul').children().length === 0) {
			CP_PostOptions.change( modal.find('select')[0] );
		}
	},


	getTaxonoies: function(select) {

		var target = jQuery(select).next().empty();

		if(jQuery(select).val() == 0) {
			CP_PostOptions.change(select);

		} else {

			jQuery.post(ajaxurl, jQuery.param({ action : 'cp_get_taxonomies', taxonomy : jQuery(select).val() }), function(data) {
				data = jQuery.parseJSON(data);
				for(c = 0; c < data.length; c++) {
					target.append( jQuery('<option>', { 'value' : data[c].term_id, 'text' : data[c].name }));
				}
			});
		}
	},


	change: function(el) {

		// Get options
		var items = {};
		jQuery('#cp-post-options').find('select').each(function() {
			items[ jQuery(this).data('param') ] = jQuery(this).val();
		});

		jQuery.post(ajaxurl, jQuery.param({ action: 'cp_get_post_details', params : items }), function(data) {

			// Handle data
			var parsed = jQuery.parseJSON(data);
			window.lsPostsJSON = parsed;

			// Update preview
			CreativePopup.willGeneratePreview();
			CP_PostOptions.update(el, parsed );
		});
	},


	update: function(el, data) {

		var preview = jQuery('#cp-post-options').find('.cp-post-previews ul').empty();

		if(data.length === 0) {
			preview.append( jQuery('<li>')
				.append( jQuery('<h4>', { 'text' : CP_l10n.SBPostFilterWarning }) )
			);

		} else {
			for(c = 0; c < data.length; c++) {
				preview.append( jQuery('<li>')
					.append( jQuery('<span>', { 'class' : 'counter', 'text' : ''+(c+1)+'. ' }))
					.append( jQuery('<img>', { 'src' : data[c].thumbnail } ))
					.append( jQuery('<h3>', { 'html' : data[c].title } ))
					.append( jQuery('<p>', { 'html' : data[c].content } ))
					.append( jQuery('<span>', { 'class' : 'author', 'text' : data[c]['date-published']+' by '+data[c].author } ))
				);
			}
		}
	},


	close: function() {
		jQuery('#cp-post-options').hide();
		jQuery('.cp-overlay').remove();
	},


	insertPlaceholder: function(el) {

		var element = jQuery(el).closest('.cp-sublayer-page').find('textarea[name="html"]')[0];
		var text = (typeof jQuery(el).data('placeholder') != "undefined") ? jQuery(el).data('placeholder') : jQuery(el).children().text();

		if (document.selection) {
			element.focus();
			var sel = document.selection.createRange();
			sel.text = text;
			element.focus();
		} else if (element.selectionStart || element.selectionStart === 0) {
			var startPos = element.selectionStart;
			var endPos = element.selectionEnd;
			var scrollTop = element.scrollTop;
			element.value = element.value.substring(0, startPos) + text + element.value.substring(endPos, element.value.length);
			element.focus();
			element.selectionStart = startPos + text.length;
			element.selectionEnd = startPos + text.length;
			element.scrollTop = scrollTop;
		} else {
			element.value += text;
			element.focus();
		}

		jQuery('#cp-layers').triggerHandler(jQuery.Event('input', {
			target: element
		}));

		jQuery(element).keyup();
	}
};




var CP_PostChooser = {

	timeout: null,
	data: null,
	opened: null,

	init: function() {

		jQuery('#cp-layers').on('click', '.cp-slide-link a.post', function(e) {
			e.preventDefault();

			CP_PostChooser.opener = this;
			CP_PostChooser.open();
		});

		jQuery(document).on('click', '#cp-post-chooser-modal-window li', function(e) {
			e.preventDefault();
			CP_PostChooser.select( jQuery(this) );
		});

		jQuery(document).on('keyup', '#cp-post-chooser-modal-window input', function(e) {
			CP_PostChooser.search();

		}).on('change', '#cp-post-chooser-modal-window select', function(e) {
			CP_PostChooser.search(1);

		}).on('submit', '#cp-post-chooser-modal-window form', function(e) {
			e.preventDefault();
			CP_PostChooser.search(1);
		});
	},

	open: function() {
		kmUI.modal.open( '#tmpl-post-chooser', { width: 850, height: 900, clip: false } );
		this.search();
	},

	search: function( timeout ) {

		timeout = timeout || 300;

		clearTimeout( CP_PostChooser.timeout );
		CP_PostChooser.timeout = setTimeout(function() {
			var $form = jQuery('#cp-post-chooser-modal-window form');
			jQuery.getJSON( ajaxurl, $form.serialize(), function( data ) {

				CP_PostChooser.data = data;

				jQuery('#cp-post-chooser-modal-window .cp-post-previews ul').empty();
				jQuery.each( data, function( index, item ) {

					jQuery('<li>\
						<img src="'+item['image-url']+'">\
						<h3>'+item.title+'</h3>\
						<div>'+item.content.substr(0, 200)+'</div>\
						<span class="author">'+item['date-published']+' by '+item.author+'</span>\
					</li>').appendTo('#cp-post-chooser-modal-window .cp-post-previews ul');
				});
			});
		}, timeout);
	},

	select: function( $li ) {

		var item 	= CP_PostChooser.data[ $li.index() ],
			l10nKey = 'SBLinkText'+ucFirst(item['post-type']),
			$holder = jQuery(CP_PostChooser.opener).closest('.cp-slide-link'),
			$input 	= jQuery('input.url', $holder);

		$holder.addClass('has-link');

		$input.val( CP_l10n[l10nKey].replace('%s', item.title) )
			.trigger( 'input' )
			.trigger( 'change' )
			.prop('disabled', true)

		.next()
			.val( item['post-id'] )

		.next()
			.val( item.title )

		.next()
			.val( item['post-type'] );

		kmUI.modal.close();
		kmUI.overlay.close();
	}
};



var CP_DataSource = {

	buildSlide: function() {

		var $slide = jQuery('#cp-layers .cp-layer-box');
		var $slideOptions = $slide.find('.cp-slide-options');

		// Reset checkboxes
		$slideOptions.find('.cp-checkbox').remove();
		$slideOptions.find('input:checkbox').prop('checked', false);

		// Get default Page Options
		var defaults = CP_DataSource.getDefaultSlideData();

		// Loop through slide option form items
		var $formItems = jQuery($slideOptions.find('input,textarea,select'));
		CP_DataSource.setFormItemValues($formItems, CP_activeSlideData.properties, defaults);

		// Set checboxes and color picker
		$slideOptions.find('input:checkbox').customCheckbox();
		CreativePopup.addColorPicker( $slideOptions.find('.cp-colorpicker') );

		// Set image placeholders
		CP_GUI.updateImagePicker( 'background', CP_activeSlideData.properties.backgroundThumb );
		CP_GUI.updateImagePicker( 'thumbnail', CP_activeSlideData.properties.thumbnailThumb );

		this.buildLayersList();
	},


	buildLayersList: function( buildProperties ) {

		buildProperties = buildProperties || { updateLayer: true };

		// Get the layer list and empty it (if any)
		var $layersList = jQuery('#cp-layers .cp-sublayers').empty();

		// Build layers
		var numOfLayers = !CP_activeSlideData.sublayers ? 0 : CP_activeSlideData.sublayers.length;
		var $template = jQuery(jQuery('#cp-layer-item-template').html());

		for(var c = 0; c < numOfLayers; c++) {

			var layerData = CP_activeSlideData.sublayers[c];
			var $layer = $template.clone();
			$layer.find('.cp-sublayer-number').text(c+1);
			$layer.find('.cp-sublayer-title').val(layerData.subtitle);

			// Hidden layer
			if(layerData.skip) { $layer.find('.cp-icon-eye').addClass('disabled'); }

			// Locked layer
			if(layerData.locked) { $layer.find('.cp-icon-lock').removeClass('disabled'); }

			// Not visible on current screen type
			$layer[ layerData['hide_on_'+CP_activeScreenType] ? 'addClass' : 'removeClass' ]('dim');

			CreativePopup.setLayerMedia( layerData.media,  jQuery('.cp-sublayer-thumb', $layer), layerData );
			$layersList.append($layer);
		}


		// Reset static layers
		jQuery('.cp-layers-list .subheader').hide();
		jQuery('.cp-static-sublayers').empty();

		// Add static layers (if any)
		if( CP_activeStaticLayersDataSet.length ) {

			jQuery('.cp-layers-list .subheader').show();

			$template = jQuery( jQuery('#cp-static-layer-item-template').html() );
			jQuery.each(CP_activeStaticLayersDataSet, function(idx, data) {

				var layerData = data.layerData,
					$layer = $template.clone();

					$layer.find('.cp-sublayer-number').text(idx+1);
					$layer.find('.cp-sublayer-title').text(layerData.subtitle);


				CreativePopup.setLayerMedia( layerData.media,  jQuery('.cp-sublayer-thumb', $layer), layerData );
				$layer.appendTo('.cp-static-sublayers');
			});
		}

		// Select first layer
		jQuery.each(CP_activeLayerIndexSet, function(index, layerIndex) {
			$layersList.children().eq( layerIndex ).addClass('active');
		});

		if( buildProperties.updateLayer ) {
			this.buildLayer();
		}
	},


	buildLayersListItem: function( layerIndex ) {

		var layerData 	= CP_activeSlideData.sublayers[ layerIndex ],
			$template 	= jQuery(jQuery('#cp-layer-item-template').html()),
			$target 	= jQuery('#cp-layers .cp-sublayers li').eq( layerIndex );
			$layer 		= $template.clone();


		$layer.find('.cp-sublayer-number').text(layerIndex+1);
		$layer.find('.cp-sublayer-title').val(layerData.subtitle);

		// Hidden layer
		if(layerData.skip) { $layer.find('.cp-icon-eye').addClass('disabled'); }

		// Locked layer
		if(layerData.locked) { $layer.find('.cp-icon-lock').removeClass('disabled'); }

		// Not visible on current screen type
		$layer[ layerData['hide_on_'+CP_activeScreenType] ? 'addClass' : 'removeClass' ]('dim');

		// Active?
		if( CP_activeLayerIndexSet[0] === $target.index() ) {
			$layer.addClass('active');
		}

		CreativePopup.setLayerMedia( layerData.media,  jQuery('.cp-sublayer-thumb', $layer), layerData );
		$target.replaceWith( $layer );
	},


	buildLayer: function() {

		// Bail out early if there's no layers on slide
		if( !CP_activeLayerDataSet.length ||
			!CP_activeSlideData.sublayers.length) {
				return false;
		}

		// Find active layer
		var $layerItem 	= jQuery('#cp-layers .cp-sublayers li.active'),
			$layer 		= jQuery('.cp-sublayer-pages'),
			layerIndex 	= CP_activeLayerIndexSet[0],
			layerData 	= CP_activeLayerDataSet[0];

		// Empty earlier layers and add new
		jQuery('.cp-sublayer-pages').empty();
		jQuery('.cp-sublayer-pages').html( jQuery('#cp-layer-template').html() );

		CreativePopup.updateLayerInterfaceItems(layerIndex);

		// Reset checkboxes
		// $layer.find('.cp-checkbox').remove();
		// $layer.find('input:checkbox:not(.noreset)').prop('checked', false);

		var $formItems = jQuery('input,textarea,select', $layer).filter(':not(.auto,.sublayerprop)'),
			$styleItems = jQuery('input,textarea,select', $layer).filter('.auto'),
			$transitionItems = jQuery('input,textarea,select', $layer).filter('.sublayerprop');

		CP_DataSource.setFormItemValues($formItems, layerData);
		CP_DataSource.setFormItemValues($styleItems, layerData.styles);
		jQuery('.cp-border-padding input').each(function() {
			CreativePopup.updateLayerBorderPadding( this );
		});

		// Backwards compatibility: put transitions settings into
		// the 'transition' object within the layer data
		if( ! layerData.transition || jQuery.isEmptyObject(layerData.transition) ) {
			this.restoreOldTransitionSettings( $transitionItems );
		}

		CP_DataSource.setFormItemValues($transitionItems, layerData.transition);
		CreativePopup.updateLayerAttributes( layerData );


		// Set image placeholder
		CP_GUI.updateImagePicker('image', layerData.imageThumb );
		CP_GUI.updateImagePicker('poster', layerData.posterThumb );

		// Set static layer chooser
		CreativePopup.setupStaticLayersChooser( $layer.find('.cp-sublayer-options select[name="static"]')[0] );


		// Init custom interface plugins
		$layer.find(':checkbox:not(.noreplace)').customCheckbox();
		CreativePopup.addColorPicker( $layer.find('.cp-colorpicker') );
		CreativePopup.changeLayerScreenType();
		CreativePopup.changeVideoType();

		jQuery('#cp-layer-transitions section .cp-h-button input').each(function() {
			var $input 		= jQuery(this),
				$section 	= $input.closest('section'),
				index 		= $section.index(),
				$target 	= jQuery('#cp-transition-selector-table td:not(.cp-padding)');

			if( $input.prop('checked') && layerData.transition[ $input.attr('name') ] !== false ) {
				$target.eq( index ).addClass('active');

			} else if( $input.prop('checked') ) {
				$input.prop('checked', false);
				$input.next().removeClass('on');
			}
		});
		jQuery('#cp-transition-selector-table td:not(.cp-padding)').eq(CP_activeLayerTransitionTab).click();
		CreativePopup.checkForOpeningTransition();

		// Select lastly viewed subpage
		CreativePopup.selectLayerPage(CP_activeLayerPageIndex);

		if( CP_activeLayerIndexSet.length > 1 ) {
			CreativePopup.startMultipleSelection();
		}
	},

	setFormItemValues: function($items, values, defaults) {

		// Bail out early if no value was specified
		if( ! $items || ! values || jQuery.isEmptyObject( values ) ) { return false; }

		// Iterate over items
		for(var itemIndex = 0; itemIndex < $items.length; itemIndex++) {

			var $item = jQuery($items[itemIndex]),
				value = values[ $item.attr('name') ];

			if( ! $item.attr('name') ) { continue; }

			if( ! value && value !== false ) {
				if( typeof defaults == 'undefined' ) {
					continue;
				}

				value = defaults[$item.attr('name')];
			}

			// Checkboxes
			if($item.is(':checkbox')) {
				$item.prop('checked', Boolean(value)).data('value', Boolean(value));

			// Input, textarea
			} else if($item.is('input,textarea')) {
				$item.val(value).data('value', value);

			// Select
			} else if($item.is('select')) {
				$item.children().prop('selected', false);
				$item.children('[value="'+value+'"]').prop('selected', true);
				$item.data('value', value);
			}
		}
	},


	readSliderSettings: function() {

		// Return previously stored data whenever it's possible
		if( !jQuery.isEmptyObject(CP_defaultSliderData) ) {
			return CP_defaultSliderData;
		}

		var settings = {};
		jQuery('.cp-slider-settings').find('input,textarea,select').each(function() {

			var item = jQuery(this),
				prop = item.attr('name'),
				 val = item.is(':checkbox') ? item.prop('checked') : item.val();

			if(prop && val !== false) { settings[ prop ] = val; }
		});

		return settings;
	},


	parseSliderSetting: function() {

		var settings = window.lsSliderData.properties,
			key,
			val;

		for( key in settings ) {

			switch( settings[key] ) {
				case 'on':
				case 'true':
					settings[key] = true;
					break;

				case 'off':
				case 'false':
					settings[key] = false;
					break;
			}
		}
	},


	getDefaultSlideData: function() {

		// Return previously stored data whenever it's possible
		if( ! jQuery.isEmptyObject(CP_defaultSlideData)) {
			return CP_defaultSlideData;
		}

		// Get slide template
		var $template = jQuery( jQuery('#cp-slide-template').text() );

		// Iterate over form items and add their values to CP_defaultSlideData
		jQuery('.cp-slide-options', $template).find('input, textarea, select').each(function() {

			var item = jQuery(this),
				prop = item.attr('name'),
				val  = item.is(':checkbox') ? item.prop('checked') : item.val();

			if( prop ) { CP_defaultSlideData[ prop ] = val; }
		});

		return CP_defaultSlideData;
	},


	getDefaultLayerData: function() {

		// Build the default data object if there's no
		// stored copy yet
		if( jQuery.isEmptyObject( CP_defaultLayerData ) ) {

			var $template 	= jQuery( jQuery('#cp-layer-template').text() ),
				$inputs 	= jQuery();

			// Transition and style options will be stored in a sub-object
			CP_defaultLayerData.transition = {};
			CP_defaultLayerData.styles = {};

			$template.each(function() {

				var $this = jQuery(this);

				if( $this.hasClass('cp-sublayer-options') ) {
					jQuery('section .toggle', this).filter(':checkbox:checked').each(function() {
						$inputs = $inputs.add( jQuery('input, textarea, select', jQuery(this).closest('section') ) );
					});
				} else {
					 $inputs =  $inputs.add( jQuery('input, textarea, select', $this) );
				}
			});

			// Iterate over form items and add their values to CP_defaultLayerData
			$inputs.each(function() {

				var item 	= jQuery(this),
					prop 	= item.attr('name'),
					val 	= item.is(':checkbox') ? item.prop('checked') : item.val();

				if( prop ) {

					if( item.hasClass('sublayerprop') ) {
						CP_defaultLayerData.transition[prop] = val;

					} else if( item.hasClass('auto') ) {
						if( val !== '' ) {
							CP_defaultLayerData.styles[prop] = val;
						}

					} else {
						CP_defaultLayerData[prop] = val;
					}
				}
			});
		}

		// Make sure to always override the layer title in the stored copy
		// to avoid name collisions and weird behaviors.
		var layerCount 	= CP_activeSlideData.sublayers ? CP_activeSlideData.sublayers.length : 0,
			layerName 	= CP_l10n.SBLayerTitle.replace('%d', layerCount+1);

		CP_defaultLayerData.subtitle = layerName;

		return CP_defaultLayerData;
	},


	uuidForSlide: function( slideIndex ) {

		slideIndex = slideIndex || CP_activeSlideIndex;
		return this.uuidForObject(
			window.lsSliderData.layers[slideIndex].properties
		);
	},


	slideForUUID: function( uuid ) {

		var slideIndex;

		jQuery.each(window.lsSliderData.layers, function(index, slide) {
			if( slide.properties.uuid && slide.properties.uuid == uuid ) {
				slideIndex = index;
				return false;
			}
		});

		return slideIndex;
	},


	uuidForLayer: function( layerIndex, slideIndex ) {

		if( typeof layerIndex === 'undefined' ) {
			layerIndex = CP_activeLayerIndexSet[0];
		}

		if( typeof slideIndex === 'undefined' ) {
			slideIndex = CP_activeSlideIndex;
		}


		var slideData = window.lsSliderData.layers[ slideIndex ];

		return this.uuidForObject( slideData.sublayers[ layerIndex ] );
	},


	layerForUUID: function( uuid ) {

	},


	uuidForObject: function( data ) {

		if( ! data.uuid || ! data.uuid.length ) {
			data.uuid = this.generateUUID();
		}

		return data.uuid;
	},


	generateUUID: function() {
		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
			return v.toString(16);
		});
	},


	// Backwards compatibility: put transitions settings into
	// the 'transition' object within the layer data
	restoreOldTransitionSettings: function($inputs) {

		// Get transition option names
		var options = [];
		for(var i=0;typeof($inputs[i])!='undefined';options.push($inputs[i++].getAttribute('name')));

		jQuery.each(window.lsSliderData.layers, function(slideKey, slideData) {
			jQuery.each(slideData.sublayers, function(layerKey, layerData) {
				for(var l = 0; l < options.length; l++) {
					if(layerData[ options[l] ]) {
						layerData.transition[ options[l] ] = layerData[ options[l] ];
						delete layerData[ options[l] ];
					}
				}
			});
		});
	}
};


var initSliderBuilder = function() {

	jQuery('.km-tabs').kmTabs();

	// Set the DB ID of currently editing slider
	if( ! CP_sliderID ) {
		CP_sliderID = jQuery('#cp-slider-form input[name="popup_id"]').val();
	}

	CP_previewArea 		= jQuery('#cp-preview-layers');
	CP_previewHolder 	= CP_previewArea.parent();
	CP_previewWrapper 	= CP_previewHolder.parent();


	// Set a small delay to prevent unintentional
	// dragging operations when a user clicks on
	// tabs or Preview items
	jQuery.ui.draggable.prototype.options.distance = 3;
	jQuery.ui.sortable.prototype.options.distance = 3;


	// Add default slide data to data source if it's a new slider
	if(window.lsSliderData.properties.new) {
		window.lsSliderData.properties = CP_DataSource.readSliderSettings();
		window.lsSliderData.properties.createdWith = jQuery('input[name="popupVersion"]').val();
		window.lsSliderData.layers = [{
			properties: jQuery.extend(true, {}, CP_DataSource.getDefaultSlideData()),
			sublayers: []
		}];

	// Extend existing slider data with defaults,
	// so we can guarantee that new options added in
	// future updates will always be present in the
	// data source object.
	} else {
		window.lsSliderData.properties = jQuery.extend( {},
			CP_DataSource.readSliderSettings(),
			window.lsSliderData.properties
		);
	}

	// Set callbacks
	var callbacks = window.lsSliderData.callbacks;
	jQuery('.cp-callback-box textarea:not([readonly])').each(function() {

		var $textarea 	= jQuery(this),
			name 		= $textarea.attr('name'),
			useData 	= $textarea.data('event-data');

		if( callbacks && callbacks[name] ) {
			$textarea.val( CP_Utils.stripslashes( callbacks[name] ) );
		}
	});

	CP_GUI.updateImagePicker( 'backgroundimage', 'useCurrent' );
	CP_GUI.updateImagePicker( 'preview', 'useCurrent' );
	CreativePopup.selectSlide(CP_activeSlideIndex, { forceSelect: true });


	// URL rewrite after creating slider
	if( history.replaceState ) {
		if(document.location.href.indexOf('&showsettings=1') != -1) {
			var url = document.location.href.replace('&showsettings=1', '');
			history.replaceState(null, document.title, url);
		}
	}


	// Show "unsaved changes" warning
	jQuery( window ).on('beforeunload', function(e) {

		if( CP_editorIsDirty ) {
			var dialogText = CP_l10n.SBUnsavedChanges;
			e.returnValue = dialogText;
			return dialogText;
		}
	});


	// Main tab bar page select
	jQuery('#cp-main-nav-bar a:not(.unselectable)').click(function(e) {

		CreativePopup.selectMainTab( this );

		if( jQuery(this).hasClass('layers') ) {
			$ruler.trigger('resize.lsRuler');
			CreativePopup.generatePreview();
			CreativePopup.updatePreviewSelection();
		}
	});

	// Settings sidebar
	jQuery('ul.cp-settings-sidebar > li').click(function() {
		CreativePopup.selectSettingsTab(this);
	});

	// Deeplink Slider Settings
	if( document.location.hash ) { CP_GUI.deeplinkSection(); }
	jQuery(window).on('hashchange', function() {
		CP_GUI.deeplinkSection();
	});

	// Settings: checkboxes
	jQuery('.cp-settings :checkbox, .cp-layer-box :checkbox:not(.noreplace)').customCheckbox();

	// Settings: datepicker
	var datePickerInterval = 0,
		datepicker = jQuery('.cp-settings .cp-datepicker-input').datepicker({
		position: 'top left',
		classes: 'cp-datepicker',
		dateFormat: 'dd/mm/yyyy',
		timeFormat: 'hh:ii',
		todayButton: new Date(),
		clearButton: true,
		timepicker: true,
		keyboardNav: false,
		range: false,

		onSelect: function(formattedDate, date, inst) {
			inst.$el.trigger('input');
		}

	}).each(function() {

		var $this 	= jQuery(this),
			key 	= jQuery(this).data('schedule-key');

		if( parseInt(window.lsSliderData.properties[ key ]) ) {
			startDate = new Date( window.lsSliderData.properties[ key ] * 1000 );
			$this.data('datepicker').selectDate( startDate );
			$this.trigger('keyup');
		}

	}).attr('pattern', '\\d\\d?/\\d\\d?/\\d{4}( \\d\\d?:\\d\\d?)?|');

	// Settings: Popup Preview
	jQuery(document).on('click', '.cp-popup-preview-button', function(e) {
		e.preventDefault();
		CreativePopup.startPopupPreview({}, this);
	});

	// Settings: Popup Presets
	jQuery('.cp-settings-popup').on('click', '#tmpl-popup-presets-button', function(e) {
		e.preventDefault();
		kmUI.modal.open( '#tmpl-popup-presets-window', { width: 850, height: 900 } );

	// Settings: Popup Position
	}).on('click', '.cp-popup-position td', function(e) {

		var $td 	= jQuery(this),
			$table 	= $td.closest('table'),
			moves 	= $td.data('move').split(' ');

		// Update UI
		$table.find('td').removeClass('active');
		$td.addClass('active');

		// Update settings
		jQuery('input[name="popupPositionVertical"]').val( moves[0] );
		jQuery('input[name="popupPositionHorizontal"]').val( moves[1] );
		window.lsSliderData.properties.popupPositionVertical = moves[0];
		window.lsSliderData.properties.popupPositionHorizontal = moves[1];

		// Update preview
		CreativePopup.updatePopupPreview();

	}).on('click', '.cp-popup-fit-width, .cp-popup-fit-height', function() {
		setTimeout(function() {
			CreativePopup.updatePopupPreview();
		}, 100);

	}).on('input change', '.cp-popup-triggers :input', function() {
		setTimeout(function() {
			CreativePopup.updatePopupNotifications();
		}, 100);
	});

	CreativePopup.updatePopupPositionGrid();
	CreativePopup.updatePopupPreview();


	// Settings: Popup presets
	jQuery(document).on('click', '#cp-popup-presets-modal-window .cp-layout-illustration-grid', function() {
		var $item 		= jQuery(this),
			$options 	= jQuery('.cp-settings-popup :input'),
			data 		= $item.data('options');


		if( typeof data === 'string' ) {
			data = JSON.parse( data );
		}

		for( var key in data ) {
			window.lsSliderData.properties[ key ] = data[key];
			var $input = $options.filter('[name="'+key+'"]');

			// Handle checkboxes
			if( typeof data[key] === 'boolean' ) {
				if( data[key] != $input.prop('checked') ) {
					$input.next().click();
				}
			} else {
				$input.val( data[key] );
			}
		}

		// Update settings
		CreativePopup.updatePopupPositionGrid();
		CreativePopup.updatePopupPreview();

		// Close modal
		kmUI.modal.close();
		kmUI.overlay.close();
	});

	// Uploads
	CreativePopup.openMediaLibrary();

	// Clear uploaded image button
	jQuery(document).on({
		mouseenter: function() {
			if( jQuery(this).hasClass('has-image') ) {
				jQuery(this).addClass('hover');
			}
		},
		mouseleave: function() {
			jQuery(this).removeClass('hover');
		}
	}, '.cp-image');


	jQuery(document).on('click', '.cp-image a.aviary', function(e) {

		e.preventDefault();
		e.stopPropagation();

		// Set ID on the currently editing image
		var $parent = jQuery(this).parent(),
			$image 	= $parent.find('img').attr('id', 'cc-current-image'),
			imageURL;

		// Prevent popover to become visible after opening the editor
		jQuery('body').addClass('hidepopover');

		// Find image URL
		if( $parent.hasClass('cp-slide-image') ) {
			imageURL = CP_activeSlideData.properties.background;
		} else if( $parent.hasClass('cp-slide-thumbnail') ) {
			imageURL = CP_activeSlideData.properties.thumbnail;
		} else if( $parent.hasClass('cp-layer-image') ) {
			imageURL = CP_activeLayerDataSet[0].image;
		} else if( $parent.hasClass('cp-media-image') ) {
			imageURL = CP_activeLayerDataSet[0].poster;
		}

		// Load editor
		featherEditor.launch({
			image: 'cc-current-image',
			url: CP_Utils.toAbsoluteURL( imageURL )
		});
	});

	// Clear uploads
	jQuery(document).on('click', '.cp-image .dashicons-dismiss', function(e) {
		e.preventDefault();
		e.stopPropagation();

		var $parent = jQuery(this).parent();

		$parent.removeClass('hover');
		$parent.prev().val('').prev().val('');
		CP_GUI.updateImagePicker( $parent, '' );

		// Global background
		if($parent.hasClass('cp-global-background')) {
			window.lsSliderData.properties.backgroundimage = '';
			window.lsSliderData.properties.backgroundimageId = '';
			window.lsSliderData.properties.backgroundimageThumb = '';

		} else if($parent.hasClass('cp-slider-preview')) {

			window.lsSliderData.meta.preview = '';
			window.lsSliderData.meta.previewId = '';

		} else if($parent.hasClass('cp-slide-image')) {

			CP_UndoManager.add('slide.general', CP_l10n.SBUndoRemoveSlideImage, {
				itemIndex: CP_activeSlideIndex,
				undo: {
					background: CP_activeSlideData.properties.background,
					backgroundId: CP_activeSlideData.properties.backgroundId,
					backgroundThumb: CP_activeSlideData.properties.backgroundThumb
				},
				redo: {
					background: '',
					backgroundId: '',
					backgroundThumb: ''
				}
			});

			CP_activeSlideData.properties.background = '';
			CP_activeSlideData.properties.backgroundId = '';
			CP_activeSlideData.properties.backgroundThumb = '';


		} else if($parent.hasClass('cp-slide-thumbnail')) {
			CP_activeSlideData.properties.thumbnail = '';
			CP_activeSlideData.properties.thumbnailId = '';
			CP_activeSlideData.properties.thumbnailThumb = '';

		} else if($parent.hasClass('cp-layer-image')) {

			CP_UndoManager.add('layer.general', CP_l10n.SBUndoRemoveLayerImage, {
				itemIndex: CP_activeLayerIndexSet[0],
				undo: {
					image: CP_activeLayerDataSet[0].image,
					imageId: CP_activeLayerDataSet[0].imageId,
					imageThumb: CP_activeLayerDataSet[0].imageThumb
				},
				redo: {
					image: '',
					imageId: '',
					imageThumb: ''
				}
			});

			CP_activeLayerDataSet[0].image = '';
			CP_activeLayerDataSet[0].imageId = '';
			CP_activeLayerDataSet[0].imageThumb = '';
			jQuery('.cp-sublayers li').eq(CP_activeLayerIndexSet[0])
				.find('.cp-sublayer-thumb').addClass('dashicons dashicons-format-image')
				.find('img').remove();


		} else if($parent.hasClass('cp-media-image')) {

			CP_UndoManager.add('layer.general', CP_l10n.SBUndoRemoveVideoPoster, {
				itemIndex: CP_activeLayerIndexSet[0],
				undo: {
					poster: CP_activeLayerDataSet[0].poster,
					posterId: CP_activeLayerDataSet[0].posterId,
					posterThumb: CP_activeLayerDataSet[0].posterThumb
				},
				redo: {
					poster: '',
					posterId: '',
					posterThumb: ''
				}
			});

			CP_activeLayerDataSet[0].poster = '';
			CP_activeLayerDataSet[0].posterId = '';
			CP_activeLayerDataSet[0].posterThumb = '';
		}


		CreativePopup.generatePreview();

	}).on('click', '.cp-timeline-switch li', function(e) {
		e.preventDefault();

		// Bail out early if it's the active menu item
		if( jQuery(this).hasClass('active') ) { return false; }

		var $item = jQuery(this),
			$layerList = jQuery('.cp-sublayers');

		// Toogle switch
		$item.addClass('active').siblings().removeClass('active');

		if( $item.index() == 1 ){
			jQuery('.cp-layers-table').hide().next().show();
			jQuery('.cp-add-sublayer').hide();

			CreativePopup.startSlidePreview({
				autoStart: false,
				pauseLayers: true,
				plugins: [{
					namespace: 'timeline',
					js: 'timeline/cp.timeline.js',
					css: 'timeline/cp.timeline.css',
					settings: {
						showLayersInfo: true
					}
				}]
			});


		} else {
			jQuery('.cp-layers-table').show().next().hide();
			jQuery('.cp-add-sublayer').show();

			CreativePopup.stopSlidePreview();
		}
	});


	// Settings: store any form element change in  data source
	jQuery('.cp-slider-settings').on('input change click', 'input,textarea,select', function(event) {

		// Bail out early if there was a click event
		// fired on a non-checkbox form item
		if(event.type === 'click') {
			if( !jQuery(this).is(':checkbox') ) {
				return false;
			}
		}

		// Get option data
		var item = jQuery(this),
			prop = item.attr('name'),
			val  = item.is(':checkbox') ? item.prop('checked') : item.val();

		if( prop === 'width' || prop === 'height' ) {

			if( val && ! val.toString().match(/^\d+$/) ) {
				val = parseInt(val) || '';
				item.val( val );
			}
		}

		// Set new setting
		window.lsSliderData.properties[ prop ] = val;

		// Mark unsaved changes on page
		CP_editorIsDirty = true;

		// Update preview
		if(item.is('select, :checkbox')) {
			CreativePopup.generatePreview();
		} else {
			CreativePopup.willGeneratePreview();
		}
	});

	// Settings: update slider height for full-screen
	jQuery('#container-height').on('change', function() {
		jQuery('#slider-height').val(this.value).change();
	});

	// Settings: reset button
	jQuery(document).on('click', '.cp-reset', function() {

		// Empty field
		jQuery(this).prev().val('');

		// Generate preview
		CreativePopup.generatePreview();
	});


	// Callbacks: store any form element change in  data source
	jQuery('.cp-callback').on('updated.ls', 'textarea:not([readonly])', function( event, cm ) {

		if( typeof window.lsSliderData.callbacks !== 'object' ) {
			window.lsSliderData.callbacks = {};
		}


		var key 	= jQuery(this).attr('name'),
			val 	= jQuery(this).val(),
			test 	= val.match(/\{([\s\S]*)\}/m)[1].replace(/(\r\n|\n|\r)/gm, '');

		if( jQuery.trim( test ).length ) {
			window.lsSliderData.callbacks[ key ] = val;
		} else {
			delete window.lsSliderData.callbacks[ key ];
		}
	});


	// Add slide
	jQuery('#cp-add-layer').click(function(e) {
		e.preventDefault(); CreativePopup.addSlide();
	});

	// Select slide
	jQuery('#cp-layer-tabs').on('click', 'a:not(.unsortable)', function(e) {
		e.preventDefault();
		if( ! jQuery(this).hasClass('active ') ) {
			CreativePopup.selectSlide( jQuery(this).index(), { forceSelect: true } );
		}

	// Rename slide
	}).on('dblclick', 'a:not(.unsortable)', function(e) {
		e.preventDefault(); CreativePopup.renameSlide(this);
	});

	// Duplicate slide
	jQuery('#cp-layers').on('click', 'button.cp-layer-duplicate', function(e){
		e.preventDefault(); e.stopPropagation();
		CreativePopup.duplicateSlide(this);
	});

	// Initialize floating layout
	jQuery( document ).on( 'click', '#menu-set-float', function( e ){

		e.preventDefault();

		jQuery( '#cp-layers-settings-popout' ).removeClass( 'cp-layers-settings-normal' ).addClass( 'cp-layers-settings-floating' ).draggable({
			handle: '#cp-layers-settings-popout-handler',
			containment: '#cp-slider-form',
			scroll: false
		}).resizable({
			minHeight: 450,
			minWidth: 350,
			maxWidth: 1500,
			create: function(){
				kmUI.smartResize.set();
			},
			resize: function(){
				kmUI.smartResize.set();
			}
		});

		jQuery( '#cp-layers-settings-popout-handler' ).trigger( 'mouseenter' );
		jQuery( '.cp-preview-wrapper' ).addClass( 'cp-forceto-left' );

	}).on( 'click', '#menu-set-putback', function( e ){

		e.preventDefault();

		jQuery( '#cp-layers-settings-popout' )
			.addClass( 'cp-layers-settings-normal' )
			.removeClass( 'cp-layers-settings-floating' )
			.draggable( 'destroy' )
			.resizable( 'destroy' );

		jQuery( '.cp-preview-wrapper' ).removeClass( 'cp-forceto-left' );

		kmUI.smartResize.set();
	});

	// Enter URL
	jQuery('#cp-layers').on('click', '.cp-url-prompt', function(e){
		e.preventDefault();

		var $el 	= jQuery(this),
			$target = $el.parent().prev();

		var url = prompt( CP_l10n.SBEnterImageURL, $target.prev().val() );
		if( ! url ) { return false; }

		// Page image
		if($target.hasClass('cp-slide-image')) {
			CP_activeSlideData.properties.background = url;
			CP_activeSlideData.properties.backgroundId = '';
			CP_activeSlideData.properties.backgroundThumb = url;

		// Page thumbnail
		} else if($target.hasClass('cp-slide-thumbnail')) {
			CP_activeSlideData.properties.thumbnail = url;
			CP_activeSlideData.properties.thumbnailId = '';
			CP_activeSlideData.properties.thumbnailThumb = url;

		// Image layer
		} else if($target.hasClass('cp-layer-image')) {
			CP_activeLayerDataSet[0].image = url;
			CP_activeLayerDataSet[0].imageId = '';
			CP_activeLayerDataSet[0].imageThumb = url;

		// Media image
		} else if($target.hasClass('cp-media-image')) {
			CP_activeLayerDataSet[0].poster = url;
			CP_activeLayerDataSet[0].posterId = '';
			CP_activeLayerDataSet[0].posterThumb = url;
		}

		CP_GUI.updateImagePicker( $target, url );
		CreativePopup.generatePreview();
	}).on('click', '.cp-capture-page', function( event ) {
		event.preventDefault();

		if( typeof lsScreenOptions !== 'undefined' && lsScreenOptions.useNotifyOSD === 'true' ) {

			kmUI.notify.show({
				icon: 'dashicons-camera',
				iconColor: '#f9a241',
				text: CP_l10n.notifyCaptureSlide
			});
		}

		// Hide preview selection and live slide UI elements
		CreativePopup.hidePreviewSelection();
		jQuery('.cp-gui-element:visible').addClass('cp-hidden');

		// html2canvas freezes the browser completely,
		// not even animations will occur. Using setTimeout
		// to first render user feedback, then start the capture.
		setTimeout(function() {

			var $target = CreativePopup.isSlidePreviewActive ? jQuery('.cp-real-time-preview') : jQuery('#cp-preview-layers');

			html2canvas( $target[0], {
				// backgroundColor: null,
				scale: 0.5

			}).then(function( canvas ) {

				// Restore preview selection and slider UI elements
				CreativePopup.showPreviewSelection();
				jQuery('.cp-gui-element.cp-hidden').removeClass('cp-hidden');

				var imgName = 'cp-'+CP_sliderID+'-page-'+(CP_activeSlideIndex+1)+'.jpg',
					imgData = canvas.toDataURL( 'image/jpeg', 0.92 ),
					imgBlob = CP_Utils.dataURItoBlob( imgData, 'image/jpeg' );
					imgBlob.lastModifiedDate = new Date();
					imgBlob.name = imgName;
					imgBlob.filename = imgName;

				CreativePopup.uploadImageToMediaLibrary(imgBlob, function(data) {

					// Save to data store
					CP_activeSlideData.properties.thumbnail = data.url;
					CP_activeSlideData.properties.thumbnailId = data.id;
					CP_activeSlideData.properties.thumbnailThumb = data.url;

					// Update UI
					CP_GUI.updateImagePicker( 'thumbnail',  data.url );

					kmUI.notify.hide();
				});
			});

		}, 1000);
	});

	// Page Options: input, textarea, select
	jQuery('#cp-layers').on('keyup change click', '.cp-slide-options input, .cp-slide-options textarea, .cp-slide-options select', function(event) {

		// Bail out early if there was a click event
		// fired on a non-checkbox form item
		if(event.type === 'click') {
			if( !jQuery(this).is(':checkbox') ) {
				return false;
			}
		}

		var item = jQuery(this),
			prop = item.attr('name'),
			val  = item.is(':checkbox') ? item.prop('checked') : item.val();

		CP_activeSlideData.properties[prop] = val;

		// Update preview when setting properties
		// related to the background image
		var updateKeys = [
			'bgsize', 'bgposition', 'bgcolor'
		];

		if( updateKeys.indexOf(prop) !== -1 ) {
			CreativePopup.generatePreview();
		}
	});

	// Open Transition gallery
	jQuery('#cp-layers').on('click', '.cp-select-transitions', function(e) {
		e.preventDefault();
		CreativePopup.openTransitionGallery();
	});

	// Enable/disable special effects
	jQuery(document).on('click', '#cp-transition-window .cp-select-special-transition', function(e) {

		var $item = jQuery(this),
			checked;

		// Turn off
		if( $item.hasClass('on') ) {
			$item.removeClass('on').addClass('off');
			checked = false;

		// Turn on
		} else {
			$item.removeClass('off').addClass('on');
			checked = true;
		}

		CP_activeSlideData.properties[ $item.data('name') ] = checked;

	// Add/Remove layer transitions
	}).on('click', '#cp-transitions-list section .tr-item', function(e) {
		e.preventDefault();
		CreativePopup.toggleTransition(this);

	// Select/Deselect all transitions
	}).on('click', '#cp-transition-window header i:last', function(e) {
		var check = jQuery(this).hasClass('off') ? true : false;
		jQuery('#cp-transitions-list section.active').each(function() {
			CreativePopup.selectAllTransition( jQuery(this).index(), check );
		});

	// Apply on others
	}).on('click', '#cp-transition-window header i:not(:last)', function(e) {

		// Confirmation
		if( ! confirm( CP_l10n.SBTransitionApplyOthers ) ) {
			return false;
		}

		// Dim color briefly
		var button = jQuery(this);
		button.css('opacity', '.5');
		setTimeout(function() {
			button.css('opacity', '1');
		}, 2000);

		// Apply to other slides
		jQuery.each(window.lsSliderData.layers, function(slideIndex, slideData) {
			slideData.properties['3d_transitions'] 		= CP_activeSlideData.properties['3d_transitions'];
			slideData.properties['2d_transitions'] 		= CP_activeSlideData.properties['2d_transitions'];
			slideData.properties.custom_3d_transitions 	= CP_activeSlideData.properties.custom_3d_transitions;
			slideData.properties.custom_2d_transitions 	= CP_activeSlideData.properties.custom_2d_transitions;
			slideData.properties.transitionorigami 		= CP_activeSlideData.properties.transitionorigami;
		});

	}).on('click', '#cp-more-slide-options', function() {
		CreativePopup.toggleAdvancedSlideOptions( this );

	// Show/Hide transition
	}).on('mouseenter', '#cp-transitions-list section .tr-item', function() {
		lsShowTransition( this );

	}).on('mouseleave', '#cp-transitions-list section .tr-item', function() {
		lsHideTransition( this );
	});



	// Remove layer
	jQuery('#cp-layer-tabs').on('click', 'a span:last-child', function(e) {
		e.preventDefault();
		e.stopPropagation();
		CreativePopup.removeSlide(this);
	});

	// Add layer
	jQuery('#cp-layers').on('click', '.cp-add-sublayer', function(e) {
		e.preventDefault();
		CreativePopup.addLayer(null, null, {
			selectLayer: true,
			selectPage: 0
		});

	// Select layer
	}).on('click', '.cp-sublayers li', function( event ) {

		// Range Select
		if( event.shiftKey && CP_activeLayerDataSet.length === 1 ) {

			var val1 	= CP_lastSelectedLayerIndex || CP_activeLayerIndexSet[0],
				val2 	= jQuery(this).index(),

				start 	= Math.min(val1, val2),
				end 	= Math.max(val1, val2),

				indexes = [];

			for(var i = start; i <= end; i++) {
				indexes.push(i);
			}

			CreativePopup.selectLayer( indexes );

		// Manual select
		} else {
			CreativePopup.selectPreviewItem( jQuery(this).index(), event );
		}


	}).on('keyup', 'input[name="subtitle"]', function() {
		var index = jQuery(this).closest('li').index();
		CP_activeSlideData.sublayers[index].subtitle = jQuery(this).val();

	// Layer pages
	}).on('click', '.cp-sublayer-nav a', function(e) {
		e.preventDefault(); CreativePopup.selectLayerPage( jQuery(this).index() );

	// Remove layer
	}).on('click', '.cp-sublayers a.remove', function(e) {
		e.preventDefault(); e.stopPropagation();
		CreativePopup.removeLayer( jQuery(this).closest('li').index() );

	// Duplicate layer
	}).on('click', '.cp-sublayers a.duplicate', function(e) {
		e.preventDefault(); e.stopPropagation();
		CreativePopup.duplicateLayer();

	}).on('click', '.cp-set-screen-types button', function(e) {
		e.preventDefault();
		CreativePopup.changeLayerScreenType( jQuery(this), true );

	// Layer media type
	}).on('click', '.cp-layer-kind li', function(e) {
		e.preventDefault();
		var $item = jQuery(this);

		if( !$item.hasClass('active') ) {

			CP_UndoManager.add('layer.general', CP_l10n.SBUndoLayerMedia, {
				itemIndex: CP_activeLayerIndexSet[0],
				undo: { media: CP_activeLayerDataSet[0].media },
				redo: { media: $item.data('section') }
			});

			CreativePopup.selectMediaType(this);
			CreativePopup.generatePreviewItem( CP_activeLayerIndexSet[0] );
		}

	// Layer element type
	}).on('click', '.cp-sublayer-element > li', function(e) {
		e.preventDefault();
		var $item = jQuery(this);

		CP_UndoManager.add('layer.general', CP_l10n.SBUndoLayerType, {
			itemIndex: CP_activeLayerIndexSet[0],
			undo: { type: CP_activeLayerDataSet[0].type },
			redo: { type: $item.data('element') }
		});

		CreativePopup.selectElementType(this);
		CreativePopup.generatePreviewItem( CP_activeLayerIndexSet[0] );

	// Layer options: input, textarea, select
	}).on('input change click', '.cp-sublayer-pages input, .cp-sublayer-pages textarea, .cp-sublayer-pages select', function(event) {

		// Ignore events triggered by UndoManager
		if(event.UndoManagerAction) { return false; }

		// Bail out early if there was a click event
		// fired on a non-checkbox form item
		if(event.type === 'click' && ! jQuery(this).is(':checkbox')) {
			return false;
		}

		// Prevent triggering the change event
		// on non-select form items
		if(event.type === 'change' && ! jQuery(this).is('select')) {
			return false;
		}

		var $item 	= jQuery(this),
			prop 	= $item.attr('name'),
			val  	= $item.is(':checkbox') ? $item.prop('checked') : $item.val();

		// Boolean conversion
		if( val === 'true' ) { val = true; }
		if( val === 'false' ) { val = false; }

		jQuery.each(CP_activeLayerDataSet, function(index, layerData) {

			var layerIndex 	= CP_activeLayerIndexSet[ index ],
				area 		= layerData;

			if($item.hasClass('sublayerprop') ) { area = area.transition; }
				else if($item.hasClass('auto') ) { area = area.styles; }

			// Null values indicate empty option.
			// We should remove them entirely from data source.
			if( val === null || val === 'null' || val === '' ) {
				delete area[ prop ];
			} else {
				area[ prop ] = val;
			}

			CreativePopup.generatePreviewItem( layerIndex );
		});



		if( $item.closest('.cp-sublayer-style').length ) {
			CreativePopup.updatePreviewSelection();
		}

		if( CP_activeLayerDataSet.length === 1 ) {

			// Check if media embed code contains autoplay setting
			if( prop === 'html' &&  CP_activeLayerDataSet[0].media === 'media' ) {
				CreativePopup.checkMediaAutoPlay( $item, prop, val );
			}

			// Restart layer preview
			if( CreativePopup.isLayerPreviewActive  ){
				CreativePopup.startLayerPreview( jQuery('.cp-layer-preview-button') );
			}
		}

		// startAt
		var $li = $item.closest('.start-at-wrapper'),
			$ul = $li.parent();

		if( $li.length && ! $item.is('.start-at-calc') ) {

			var timing 	= jQuery('.start-at-timing', $ul).val(),
				operator 	= jQuery('.start-at-operator', $ul).val(),
				value 		= jQuery('.start-at-value', $ul).val(),
				$calcInput 	= jQuery('.start-at-calc', $ul);

			$calcInput.data('prevVal', $calcInput.val() );
			setTimeout(function() {
				$calcInput.val( timing +' '+ operator +' '+ value).trigger('input');
				CP_UndoManager.trackInputs( null, $calcInput );
			}, 100);
		}

	}).on('change', '.cp-sublayer-basic input.bgvideo', function( event ) {
		CreativePopup.changeVideoType( event );

	}).on('input', '.cp-sublayer-style textarea.style', function() {
		CreativePopup.validateCustomCSS( jQuery(this) );

	// Active transition sections
	}).on('click', '#cp-transition-selector-table td:not(.cp-padding)', function(event) {
		CreativePopup.selectTransitionPage( this );

	}).on('change', '#cp-transition-selector', function(event) {
		jQuery( '#cp-transition-selector-table td:not(.cp-padding)' ).eq( jQuery(this).val() ).click();

	}).on('change', '#cp-layer-transitions .cp-h-button input', function(event) {
		CreativePopup.enableTransitionPage( this );

	}).on('click', '#cp-layer-transitions .overlay', function(event) {
		var $this 		= jQuery(this),
			$section 	= $this.closest('section'),
			$checkbox 	= $section.find('.cp-h-button .cp-checkbox.toggle');

			if( $checkbox.hasClass('off') ) {

				if( $checkbox.data( 'tl' ) ){
					$checkbox.data( 'tl' ).progress(1).kill();
				}

				var tl = new TimelineMax();

				tl.to( $checkbox[0], 0.12, {
					yoyo: true,
					repeat: 3,
					ease: Quad.easeInOut,
					scale: 1.5,
					backgroundColor: '#ff1d1d'
				});

				$checkbox.data( 'tl', tl );
			}

	// Copy transition settings
	}).on('click', '.cp-h-actions .copy', function(event) {
		event.preventDefault();
		event.stopPropagation();
		CreativePopup.copyLayerSettings(this);

	// Paste transition settings
	}).on('click', '.cp-h-actions .paste', function(event) {
		event.preventDefault();
		event.stopPropagation();
		CreativePopup.pasteLayerSettings(this);
		jQuery('.cp-border-padding input').each(function() {
			CreativePopup.updateLayerBorderPadding( this );
		});

	// Static select
	}).on('mouseenter', '.cp-sublayer-options select[name="static"]', function() {
		CreativePopup.setupStaticLayersChooser( this );

	}).on('keyup', '.cp-sublayer-custom-attributes tr:last-child input', function() {

		if( jQuery(this).val() ) {
			var $tr = jQuery(this).closest('tr').removeClass('cp-hidden');
			$tr.clone().insertAfter( $tr ).find('input').val('');
		}

	}).on('keyup change', '.cp-sublayer-custom-attributes tr:not(:last-child) input', function( event ) {
		CreativePopup.setLayerAttributes(event, this);

	}).on('input', '.cp-border-padding input', function() {
		CreativePopup.updateLayerBorderPadding( this );




	// Pick static layer
	}).on('change', '.cp-sublayer-options select[name="static"]', function() {

		var $select = jQuery(this),
			value 	= $select.val(),
			index 	= parseInt( jQuery(this).val() ),
			uuid;

		if( value === 'null' || value === null || index === 0  ) {
			delete CP_activeLayerDataSet[0].transition.static;
			delete CP_activeLayerDataSet[0].transition.staticUUID;
			return;
		}

		if(index && index > 0) {
			uuid = CP_DataSource.uuidForSlide( index - 1 );
			CP_activeLayerDataSet[0].transition.staticUUID = uuid;
		}



	// Pick transformOrigin
	}).on('click', '.cp-sublayer-options .dashicons-search:not(.active)', function(event) {
		event.stopPropagation();

		var $this = jQuery(this).addClass('active'),
			$origin = $this.next(),
			$picker = jQuery('<div>').addClass('cp-origin-picker').appendTo('.cp-preview-wrapper');

		$picker.on('click', function(e) {

			var o = $picker.offset();
				x = e.pageX - o.left,
				y = e.pageY - o.top,
				$layer = CP_previewItems[ CP_activeLayerIndexSet[0] ],
				p = $layer.position(),
				ox = (x - p.left) / ( $layer.outerWidth() * CP_previewZoom ),
				oy = (y - p.top) / ( $layer.outerHeight() * CP_previewZoom ),

			$origin.val([
				Math.round(ox * 1000) / 10 + '%',
				Math.round(oy * 1000) / 10 + '%',
				$origin.val().split(/\s+/)[2] || ''
			].join(' ').trim());

			$origin.trigger('input');
		});

		jQuery(document).one('click', function() {
			jQuery('.cp-origin-picker').remove();
			jQuery('.dashicons-search.active').removeClass('active');
		});

		var origin = $origin.attr('name');
		jQuery.each(CP_previewItems, function(i, $sl) {

			var layerTransition = CP_activeSlideData.sublayers[i].transition;

			if( layerTransition && layerTransition[origin] ) {

				var o = layerTransition[origin].split(/\s+/),
					$layer = CP_previewItems[ CP_activeLayerIndexSet[0] ];

				if( o.length > 1 ) {

					var x = o[0] == 'left' ? '0' : (o[0] == 'right' ? '100%' : o[0]),
						y = o[1] == 'top' ? '0' : (o[1] == 'bottom' ? '100%' : o[1]),
						p = $sl.position();

					x = x.indexOf('%') < 0 ? parseInt(x) : parseFloat(x) / 100 * $sl.outerWidth();
					y = y.indexOf('%') < 0 ? parseInt(y) : parseFloat(y) / 100 * $sl.outerHeight();

					if ( ! isNaN( x ) && ! isNaN( y ) ) {
						jQuery('<div>')
							.addClass('cp-origin-point' + ($sl.is( $layer ) ? ' cp-origin-active' : ''))
							.css({
								left: p.left + (x * CP_previewZoom),
								top: p.top + (y * CP_previewZoom)
							}).appendTo($picker);
					}
				}
			}
		});
	});



	if( typeof Aviary !== 'undefined' ){
		var featherEditor = new Aviary.Feather({
			apiKey: '5cf23f4b299d4953bd257b881c8f37d7',
			maxSize: 3000,
			tools: ['enhance', 'effects', 'frames', 'overlays', 'orientation', 'crop', 'resize', 'lighting', 'color', 'sharpness', 'focus', 'vignette', 'blemish', 'whiten', 'redeye', 'draw', 'colorsplash', 'text'],
			fileFormat: 'png',

			onClose: function( isDirty ) {
				jQuery('#cc-current-image').removeAttr('id');
			},

			onSaveButtonClicked: function( imageID ) {
				featherEditor.showWaitIndicator();

				var $image 	= jQuery('#'+imageID).removeAttr('id');
					$parent = $image.closest('.cp-image'),

					imgName = 'aviary_'+Date.now()+'.png',
					imgData = jQuery('#avpw_canvas_element')[0].toDataURL(),
					imgBlob = CP_Utils.dataURItoBlob(imgData);
					imgBlob.lastModifiedDate = new Date();
					imgBlob.name = imgName;
					imgBlob.filename = imgName;

				CreativePopup.uploadImageToMediaLibrary(imgBlob, function(data) {
					$image.attr('src', data.url);

					if( $parent.hasClass('cp-slide-image') ) {

						// Add action to UndoManager
						CP_UndoManager.add('slide.general', CP_l10n.SBUndoSlideImage, {
							itemIndex: CP_activeSlideIndex,
							undo: {
								background: CP_activeSlideData.properties.background,
								backgroundId: CP_activeSlideData.properties.backgroundId,
								backgroundThumb: CP_activeSlideData.properties.backgroundThumb
							},
							redo: {
								background: data.url,
								backgroundId: data.id,
								backgroundThumb: data.url
							}
						});

						CP_activeSlideData.properties.background = data.url;
						CP_activeSlideData.properties.backgroundId = data.id;
						CP_activeSlideData.properties.backgroundThumb = data.url;

						CreativePopup.generatePreview();

					} else if( $parent.hasClass('cp-slide-thumbnail') ) {

						CP_activeSlideData.properties.thumbnail = data.url;
						CP_activeSlideData.properties.thumbnailId = data.id;
						CP_activeSlideData.properties.thumbnailThumb = data.url;


					} else if( $parent.hasClass('cp-layer-image') ) {

						// Add action to UndoManager
						CP_UndoManager.add('layer.general', CP_l10n.SBUndoLayerImage, {
							itemIndex: CP_activeLayerIndexSet[0],
							undo: {
								image: CP_activeLayerDataSet[0].image,
								imageId: CP_activeLayerDataSet[0].imageId,
								imageThumb: CP_activeLayerDataSet[0].imageThumb
							},
							redo: {
								image: data.url,
								imageId: data.id,
								imageThumb: data.url
							}
						});

						CP_activeLayerDataSet[0].image = data.url;
						CP_activeLayerDataSet[0].imageId = data.id;
						CP_activeLayerDataSet[0].imageThumb = data.url;

						CreativePopup.generatePreviewItem( CP_activeLayerIndexSet[0] );


					} else if( $parent.hasClass('cp-media-image') ) {

						// Add action to UndoManager
						CP_UndoManager.add('layer.general', CP_l10n.SBUndoVideoPoster, {
							itemIndex: CP_activeLayerIndexSet[0],
							undo: {
								poster: CP_activeLayerDataSet[0].poster,
								posterId: CP_activeLayerDataSet[0].posterId,
								posterThumb: CP_activeLayerDataSet[0].posterThumb
							},
							redo: {
								poster: data.url,
								posterId: data.id,
								posterThumb: data.url
							}
						});

						CP_activeLayerDataSet[0].poster = data.url;
						CP_activeLayerDataSet[0].posterId = data.id;
						CP_activeLayerDataSet[0].posterThumb = data.url;
					}

					featherEditor.hideWaitIndicator();
					featherEditor.close();
				});

				return false;
			}
		});
	}

	// Sublayer: sortables, draggable, etc
	CreativePopup.addSlideSortables();
	CreativePopup.addLayerSortables();
	CreativePopup.addDraggable();


	// Slide(r) Preview
	jQuery('#cp-layers').on('click', '.cp-preview-button', function(e) {
		e.preventDefault();
		CreativePopup.startSlidePreview();
	});

	// Animate Layer
	jQuery('#cp-layers').on('click', '.cp-layer-preview-button', function(e) {
		e.preventDefault(); CreativePopup.startLayerPreview(this, true);
	});


	// List intersecting preview items when right clicking on them
	CP_previewWrapper.on('contextmenu',function(e) {
		e.preventDefault(); CreativePopup.listPreviewItems(e);
	});

	// Don't drag locked layers
	CP_previewArea.on('dragstart', '.disabled,.transformed', function(e) {
		e.preventDefault();

	}).on('dblclick', ':not(.disabled,:input)', function() {
		CreativePopup.editLayerStart( jQuery(this) );


	}).on('keydown', '.cp-editing', function(event) {
		CreativePopup.editLayer(event);


	}).on('keyup', '.cp-editing', function() {
		CreativePopup.editLayerUpdate(this);


	}).on('paste', '.cp-editing', function(event) {
		CreativePopup.editLayerPaste(event);

	});

	// Highlight preview item when hovering the intersecting layers list
	jQuery(document).on({
		mouseenter: function() { CreativePopup.highlightPreviewItem(this); },
		mouseleave: function() { CP_previewArea.children().removeClass('highlighted lowlighted'); },
		}, '.cp-preview-item-list li'
	);

	// Select layer from intersecting layers list
	jQuery(document).on('click', '.cp-preview-item-list li', function(event) {
		var layerIndex = jQuery(this).data('layerIndex');
		CreativePopup.selectPreviewItem( layerIndex, event );
	});


	// Highlight dropable zone
	jQuery(document).on('dragover.ls', '.cp-preview-wrapper', function(e) {
		e.preventDefault();
		jQuery(this).addClass('cp-dragover');
	}).on('dragleave.ls drop.ls', '.cp-preview-wrapper', function(e) {
		e.preventDefault();
		jQuery(this).removeClass('cp-dragover');
	});

	// Handle dropped images
	jQuery('#cp-pages').on('drop.ls', '.cp-preview', function(event) {
		CreativePopup.handleDroppedImages(event);
	});


	// Handle alignment buttons
	jQuery('#slider-editor-toolbar').on('click', '#cp-layer-alignment td', function(event) {

		var $selection 	= jQuery('.ui-selected-helper'),
			moves 		= jQuery(this).data('move').split(' '),
			selTop 		= $selection.position().top,
			selLeft 	= $selection.position().left,
			selWidth 	= $selection.width(),
			selHeight 	= $selection.height(),
			areaWidth 	= CP_previewArea.width() * CP_previewZoom,
			areaHeight 	= CP_previewArea.height() * CP_previewZoom,
			updateInfo 	= [],
			diffTop, diffLeft, x, xp, y, yp;

			// Reposition, calc diff
			for(var c = 0; c < moves.length; c++) {
				switch(moves[c]) {
					case 'left': 	x = 0; xp = '0%'; break;
					case 'center': 	x = areaWidth / 2 - selWidth / 2; xp = '50%'; break;
					case 'right': 	x = areaWidth - selWidth; xp = '100%'; break;

					case 'top': 	y = 0; yp = '0%'; break;
					case 'middle': 	y = areaHeight / 2 - selHeight / 2; yp = '50%'; break;
					case 'bottom': 	y = areaHeight - selHeight; yp = '100%'; break;
				}
			}

		diffTop 	= selTop  - y;
		diffLeft 	= selLeft - x;


		jQuery.each(CP_activeLayerIndexSet, function(idx, layerIndex) {

			// Get layer data
			var layerData = CP_activeSlideData.sublayers[layerIndex];

			// Bail out early if it's a locked layer
			if( layerData.locked ) { return false; }

			// Get preview item, current position & direction
			var $previewItem = CP_previewItems[layerIndex],
				position = $previewItem.position(),
				left = Math.round( (position.left - diffLeft) / CP_previewZoom ).toString(),
				top = Math.round( (position.top - diffTop) / CP_previewZoom ).toString();

			// Use percents when only one layer is selected
			if( CP_activeLayerIndexSet.length === 1 ) {
				left = xp;
				top = yp;
			}


			// Maintain history
			updateInfo.push({
				itemIndex: layerIndex,
				undo: { left: layerData.styles.left, top: layerData.styles.top },
				redo: { left: left, top: top }
			});

			// Set new value
			layerData.styles.left = left;
			layerData.styles.top = top;
			jQuery('.cp-sublayer-pages input[name=left]').val(left);
			jQuery('.cp-sublayer-pages input[name=top]').val(top);

			CreativePopup.generatePreviewItem(layerIndex);
		});

		// Maintain history
		CreativePopup.updatePreviewSelection();
		CP_UndoManager.add('layer.style', CP_l10n.SBUndoAlignLayer, updateInfo);

	}).on('click', '.cp-editor-layouts button', function(e) {
		e.preventDefault();

		CP_activeScreenType = jQuery(this).data('type');
		jQuery(this).addClass('playing').siblings().removeClass('playing');

		CP_DataSource.buildLayersList();

		if( CreativePopup.isLayerPreviewActive ) {
			CreativePopup.stopLayerPreview( true );
		}

		if( CreativePopup.isSlidePreviewActive ) {
			CreativePopup.stopSlidePreview();
			CreativePopup.startSlidePreview();
		}

		CreativePopup.generatePreview();
	});



	// GLOBAL SHORTCUTS
	var keyTimeout = null, oldX = {}, oldY = {},
		slidesItem = jQuery('#cp-main-nav-bar .layers');

	jQuery(document).on('keydown', function(e) {

		if( typeof lsScreenOptions !== 'undefined' && lsScreenOptions.useKeyboardShortcuts === 'false' ) {
			return;
		}

		if(~location.href.indexOf('AdminCreativePopupRevisions')) {
			return;
		}

		// Save slider when pressing Ctrl/Cmd + S
		if( (e.metaKey || e.ctrlKey) && e.which == 83 ) {
			if( ! e.altKey ) {
				e.preventDefault();
				CreativePopup.save({ usedShortcut: true });
				return;
			}
		}

		// Disable keyboard shortcuts while the
		// main builder interface is not visible.
		if( ! slidesItem.length || ! slidesItem.hasClass('active') ) {
			return true;
		}

		var $target = jQuery(e.target);

		if(e.which == 13) {

			// Blur input fields when pressing enter
			if($target.is(':input:not(textarea)')) {
				e.preventDefault();
				e.target.blur();
				return;

			// Toggle layer editing
			} else if( !$target.is(':input') && !e.metaKey && !e.ctrlKey && !e.altKey ) {
				e.preventDefault();
				CreativePopup.editLayerToggle();
				return;
			}
		}

		// Disable keyboard shortcuts while editing
		// a layer with the 'contenteditable' attribute.
		if(jQuery('.cp-editing').length) {
			return;
		}


		// Toggle layer preview with Shift/Alt + space bar
		if( (e.shiftKey || e.altKey) && e.which == 32 && !jQuery(e.target).is(':input') ) {
			e.preventDefault();
			return jQuery('.cp-layer-preview-button').click();
		}

		// Toggle popup preview with Ctrl + space bar
		if( e.ctrlKey && e.which == 32 && !jQuery(e.target).is(':input') ) {
			e.preventDefault();
			return jQuery('.cp-popup-overlay').click().length || jQuery('.cp-popup-preview-button:last').click();
		}

		// Esc from popup preview
		if( e.which == 27 ) {
			e.preventDefault();
			return jQuery('.cp-popup-overlay').click();
		}

		// Toggle slide preview with the space bar
		if(e.which == 32 && !jQuery(e.target).is(':input')) {
			e.preventDefault();
			return jQuery('.cp-preview-button').click();
		}

		// Disable the other keyboard shortcuts while in preview mode
		if( CreativePopup.isSlidePreviewActive || CreativePopup.isLayerPreviewActive ) {
			return;
		}


		// Redo on Ctrl/Cmd + Shift + Z
		// or Ctrl/Cmd + Y
		if( ((e.metaKey || e.ctrlKey) && e.shiftKey && e.which == 90) ||
			((e.metaKey || e.ctrlKey) && e.which == 89) ) {
			if( !jQuery(e.target).is(':input') ) {
				e.preventDefault();
				return CP_UndoManager.redo();
			}
		}


		// Undo on Ctrl/Cmd + Z
		if( (e.metaKey || e.ctrlKey) && e.which == 90 ) {
			if( !jQuery(e.target).is(':input') ) {
				e.preventDefault();
				return CP_UndoManager.undo();
			}
		}


		// Remove selected layer when pressing del/backspace
		if(e.which == 8 || e.which == 46) {
			if( !jQuery(e.target).is(':input') ) {
				e.preventDefault();
				CreativePopup.removeLayer();
				return;
			}
		}

		// Duplicate layer when pressing Ctrl/Cmd + D
		if( (e.metaKey || e.ctrlKey) && e.which == 68 ) {
			e.preventDefault();
			CreativePopup.duplicateLayer();
			return;
		}

		// Cut layer when pressing Ctrl/Cmd + X
		if( (e.metaKey || e.ctrlKey) && e.which == 88 ) {
			if( !jQuery(e.target).is(':input') ) {
				e.preventDefault();
				CreativePopup.copyLayer(true, CP_activeLayerDataSet, CP_activeLayerIndexSet, { shiftLayers: false });
				CreativePopup.removeLayer(null, { requireConfirmation: false });
				return;
			}
		}

		// Copy layer when pressing Ctrl/Cmd + C
		if( (e.metaKey || e.ctrlKey) && e.which == 67 ) {

			// Copy only if there's no text selection
			if( ! document.getSelection().toString() ) {
				if( ! jQuery(e.target).is(':input') ) {
					e.preventDefault();
					CreativePopup.copyLayer(true);
					return;
				}

			// Remove selection after copying text on page,
			// so future copy events on layers will be uninterrupted.
			} else {
				setTimeout(function() {
					CP_Utils.removeTextSelection();
				}, 300);
			}
		}

		// Paste layer when pressing Ctrl/Cmd + V
		if( (e.metaKey || e.ctrlKey) && e.which == 86 ) {
			if( !jQuery(e.target).is(':input') ) {
				e.preventDefault();
				CreativePopup.pasteLayer();
				return;
			}
		}


		// Move layers in preview with arrow buttons
		if( [37,38,39,40].indexOf(e.which) !== -1 ) {
			if( ! jQuery(e.target).is(':input') ) {
				e.preventDefault();

				var updateInfo = [];

				jQuery.each(CP_activeLayerIndexSet, function(idx, layerIndex) {
					var layerData 	= CP_activeSlideData.sublayers[layerIndex],
						previewItem = CP_previewItems[layerIndex];

					if(layerData.locked ) { return true; }

					var x = Math.round( parseInt(layerData.styles.left) ),
						y = Math.round( parseInt(layerData.styles.top) );

					if( layerData.styles.left.indexOf('%') !== -1 || layerData.styles.top.indexOf('%') !== -1 ) {
						var positions = CreativePopup.setPositions(previewItem, layerData.styles.top, layerData.styles.left, true);
						x = positions.left;
						y = positions.top;
					}

					if( ! oldX[layerIndex] ) { oldX[layerIndex] = x; }
					if( ! oldY[layerIndex] ) { oldY[layerIndex] = y; }

					var left = 0, top = 0;
					switch(e.which) {
						case 37: left--; break; // left
						case 38: top--;  break; // up
						case 39: left++;  break; // right
						case 40: top++;  break; // down
					}

					// Move horizontally
					if(left) {
						e.preventDefault();
						x += (e.shiftKey || e.altKey) ? left*10 : left;

						layerData.styles.left = x+'px';
						previewItem.css('left', x+'px');
						jQuery('.cp-sublayer-pages input[name=left]').val(x + 'px');
					}

					// Move vertically
					if(top) {
						e.preventDefault();
						y += (e.shiftKey || e.altKey) ? top*10 : top;

						layerData.styles.top = y+'px';
						previewItem.css('top', y+'px');
						jQuery('.cp-sublayer-pages input[name=top]').val(y + 'px');
					}

					updateInfo.push({
						itemIndex: layerIndex,
						undo: { left: oldX[layerIndex]+'px', top: oldY[layerIndex]+'px'},
						redo: { left: x+'px', top: y+'px'},
					});
				});

				clearTimeout(keyTimeout);
				keyTimeout = setTimeout(function() {
					CP_UndoManager.add('layer.style', CP_l10n.SBUndoLayerPosition, updateInfo.reverse());
					oldX = {}; oldY = {};
				}, 1000);

				CreativePopup.updatePreviewSelection();
			}
		}
	});


	// Save changes
	jQuery('#cp-slider-form').submit(function(e) {
		e.preventDefault();
		CreativePopup.save(this);
	});

	// Add color picker
	CreativePopup.addColorPicker( jQuery('.cp-slider-settings input.cp-colorpicker') );


	// Show color picker on focus
	jQuery('.color').focus(function() {
		jQuery(this).next().slideDown();

	// Hide color picker on blur
	}).blur(function() {
		jQuery(this).next().slideUp();
	});

	// Jump to original layer
	jQuery('.cp-static-sublayers').on('click', '.cp-icon-jump', function(e) {
		e.preventDefault();
		e.stopPropagation();
		CreativePopup.revealStaticLayer( this );
	});


	// Eye icon for layers
	jQuery('.cp-sublayers').on('click', '.cp-icon-eye', function(e) {
		e.stopPropagation();
		CreativePopup.hideLayer(this);


	// Lock icon for layers
	}).on('click', '.cp-icon-lock', function(e) {
		e.stopPropagation();
		CreativePopup.lockLayer(this);


	// Collapse layer before sorting
	}).on('mousedown', '.cp-sublayer-sortable-handle', function(){
		jQuery(this).closest('.cp-sublayers').addClass('dragging');


	// Expand layer after sorting
	}).on('mouseup', '.cp-sublayer-sortable-handle', function(){
		jQuery('#cp-layers .cp-layer-box.active .cp-sublayer-sortable').removeClass('dragging');
	});

	CP_PostOptions.init();
	CP_PostChooser.init();

	// Transitions gallery
	jQuery(document).on('click', '#transitionmenu ul li', function() {

		// Update navigation
		jQuery(this).siblings().removeClass('active');
		jQuery(this).addClass('active');

		// Update view
		jQuery('#cp-transitions-list section').removeClass('active');
		jQuery('#cp-transitions-list section').eq( jQuery(this).index() ).addClass('active');

		// Show the select all / deselect all button
		jQuery('#transitionmenu i:last-child').show();

		// Custom transitions
		if(jQuery(this).index() == 2) {
			jQuery('#cp-transitions-list section').eq(3).addClass('active');

		// Special effects
		} else if(jQuery(this).index() == 3) {
			jQuery('#cp-transitions-list section').eq(3).removeClass('active');
			jQuery('#cp-transitions-list section').eq(4).addClass('active');
			jQuery('#transitionmenu i:last-child').hide();
		}

		// Update 'Select all' button
		var trs = jQuery('#cp-transitions-list section.active').find('.tr-item');

		if(trs.filter('.added').length == trs.length) {
			jQuery('#cp-transition-window header i:last').attr('class', 'on').text( CP_l10n.deselectAll );
		} else {
			jQuery('#cp-transition-window header i:last').attr('class', 'off').text( CP_l10n.selectAll );
		}
	});

	// Link slide to post url
	jQuery('#cp-layers').on('click', '.cp-slide-link a.dyn', function(e) {
		e.preventDefault();

		var $holder = jQuery(this).closest('.cp-slide-link'),
			$input 	= jQuery('input.url', $holder);

		$input
			.val('[url]')
			.trigger('input')
			.trigger('change');

		// !!!!!!!! TODO: LATER

		// Add action to UndoManager
		// CP_UndoManager.add('slide.general', CP_l10n.SBUndoSlideImage, {
		// 	itemIndex: CP_activeSlideIndex,
		// 	undo: {
		// 		background: CP_activeSlideData.properties.background,
		// 		backgroundId: CP_activeSlideData.properties.backgroundId,
		// 		backgroundThumb: CP_activeSlideData.properties.backgroundThumb
		// 	},
		// 	redo: {
		// 		background: attachment.url,
		// 		backgroundId: attachment.id,
		// 		backgroundThumb: previewImg
		// 	}
		// });


		CP_GUI.updateLinkPicker( $input );


	// Empty linking field
	}).on('click', '.cp-slide-link a.change', function(e) {
		e.preventDefault();
		var $parent = jQuery(this).closest('.cp-slide-link');

		$parent.removeClass('has-link');

		$parent
			.find('input[type="text"]')
			.val('')
			.prop('disabled', false)
			.trigger('input')
			.trigger('change');

		$parent
			.find('input[type="hidden"]')
			.val('');
	});


	// Use post image as slide background
	jQuery('#cp-layers').on('click', '.slide-image .cp-post-image', function(e) {
		e.preventDefault();

		var imageHolder = jQuery(this).closest('.slide-image').find('.cp-image');

		// Page image
		if( imageHolder.hasClass('cp-slide-image') ) {
			CP_activeSlideData.properties.background = '[image-url]';
			CP_activeSlideData.properties.backgroundId = '';
			CP_activeSlideData.properties.backgroundThumb = '';

			// Reset image field, generatePreview() will populate them
			// with the actual content (if any)
			CP_GUI.updateImagePicker( 'background', false );

		// Layer image
		} else if( imageHolder.hasClass('cp-layer-image') ) {
			CP_activeLayerDataSet[0].image = '[image-url]';
			CP_activeLayerDataSet[0].imageId = '';
			CP_activeLayerDataSet[0].imageThumb = '';

			// Reset image field, generatePreview() will populate them
			// with the actual content (if any)
			CP_GUI.updateImagePicker( 'image', false );
			jQuery('.cp-sublayers li').eq(CP_activeLayerIndexSet[0])
				.find('.cp-sublayer-thumb').addClass('dashicons dashicons-format-image')
				.find('img').remove();
		}

		CreativePopup.generatePreview();
	});


	CP_DataSource.buildSlide();
	CreativePopup.addPreviewSlider( jQuery('#cp-layers .cp-editor-slider'), 1 );
	CreativePopup.generatePreview();

	var $ruler = jQuery('.cp-preview-td').lsRuler();

	// Undo
	jQuery('#cp-layers').on('click', '.cp-editor-undo:not(.disabled)', function() {
		CP_UndoManager.undo();

	// Redo
	}).on('click', '.cp-editor-redo:not(.disabled)', function() {
		CP_UndoManager.redo();

	// UndoManager track options
	}).on('click focus change', 'select, input, textarea', function(event) {
		CP_UndoManager.trackInputs( event, this );

	});

	$lasso = jQuery('<div>').resizable({
		handles: 'all'

	// keep aspect ratio when resize layer at corner
	}).on('mousedown.ls', '.ui-resizable-handle', function(e){
		if( e.which == 1 ){
			$lasso.data('ui-resizable')._aspectRatio = !!this.className.match(/-se|-sw|-ne|-nw/);
		}


	// store selected layers size & position
	}).on('resizestart.ls', function( event, ui ){

		var uiPos = ui.helper.position();

		ui.originalPosition.top = uiPos.top;
		ui.originalPosition.left = uiPos.left;

		jQuery('.cp-preview .ui-selected').each(function() {
			var $layer 	= jQuery(this),
				pos 	= $layer.position();

			$layer.data('originalPosition', {
				top: pos.top / CP_previewZoom,
				left: pos.left / CP_previewZoom
			}).data('originalSize', {
				width: $layer.outerWidth(),
				height: $layer.outerHeight(),
				fontSize: parseInt($layer.css('fontSize')),
				lineHeight: $layer.css('lineHeight').indexOf('px') !== -1 ? parseInt( $layer.css('lineHeight') ) : false
			});
		});


	// update selected layers size & position
	}).on('resize.ls', function(e, ui){
		CreativePopup.resizing(e, ui);

	}).on('resizestop.ls', function(e, ui) {

		var updateInfo 	= [];
		CreativePopup.resizing(e, ui);

		// Remove directio data from $lasso
		$lasso.removeData( 'dragDirection');

		jQuery('.cp-preview .ui-selected').each(function() {
			var $layer 		= jQuery(this),
				index 		= $layer.index(),
				layerData 	= CP_activeSlideData.sublayers[index],
				position 	= $layer.position(),
				size 		= { width: $layer.width(), height: $layer.height() },
				fontSize 	= parseInt($layer.css('font-size')),
				lineHeight 	= parseInt($layer.css('line-height')),
				origPos 	= $layer.data('originalPosition'),
				origSize 	= $layer.data('originalSize');

			var undoObj = {
				itemIndex: index,
				undo: {
					top: origPos.top+'px',
					left: origPos.left+'px',
					width: origSize.width+'px',
					height: origSize.height+'px',
					'font-size': origSize.fontSize+'px',
					'line-height': origSize.lineHeight+'px',
				},
				redo: {
					top: Math.round(position.top / CP_previewZoom)+'px',
					left: Math.round(position.left / CP_previewZoom)+'px',
					width: Math.round(size.width)+'px',
					height: Math.round(size.height)+'px',
					'font-size': Math.round(fontSize)+'px',
					'line-height': Math.round(lineHeight)+'px'
				}
			};


			if( ! layerData.styles.width && ! $layer.is('img,div') ) {
				$layer.width('auto');
				delete undoObj.undo.width;
				delete undoObj.redo.width;
			}

			if( ! layerData.styles.height && ! $layer.is('img,div') ) {
				$layer.height('auto');
				delete undoObj.undo.height;
				delete undoObj.redo.height;
			}


			updateInfo.push(undoObj);
		});

		CP_UndoManager.add('layer.style', CP_l10n.SBUndoLayerResize, updateInfo);
		CreativePopup.updatePreviewSelection();

	}).addClass('ui-selected-helper').appendTo( CP_previewHolder );


	CP_previewHolder.on('mouseup.ls', function(e) {

		var $helper = jQuery('.ui-selectable-helper');
		if( $helper.length ) {

			var pos 		= $helper.position(),
				selTop 		= pos.top,
				selLeft 	= pos.left,
				selWidth  	= $helper.outerWidth(),
				selHeight 	= $helper.outerHeight(),
				items = [];

			// Loop through layers list
			CP_previewArea.children('.cp-l').each(function(layerIndex) {

				var $layer 	= jQuery(this),
					t = CP_previewArea.offset().top + $layer.position().top,
					l = CP_previewArea.offset().left + $layer.position().left,
					w = $layer.outerWidth() * CP_previewZoom,
					h = $layer.outerHeight() * CP_previewZoom;

				if(
					(t > selTop  &&  t+h < selTop+selHeight) &&
					(l > selLeft  &&  l+w < selLeft+selWidth)
				) {
					items.push(layerIndex);
				}
			});

			if(items.length) {
				CreativePopup.selectLayer( items );
			}
		}


	}).selectable({
		tolerance: 'fit',
		filter: '.ui-draggable:not(.disabled,.transformed)',
		cancel: '.disabled,.transformed'

	// removeFrom | addTo selected layers

	}).on('mouseup.ls', '.ui-draggable', function(e) {

		// Allow selecting a single layer, even if it's
		// already part of the selection if it wasn't dragged
		if( e.which !== 3 && ! CP_layerWasDragged ) {
			if( ! e.ctrlKey && ! e.metaKey ) {

				var $layer 		=  jQuery(this),
					layerIndex 	= $layer.index(),
					layerData 	= CP_activeSlideData.sublayers[ layerIndex ];

				// Prevent locked layers to be selected
				if( ! layerData || layerData.locked ) { return false; }

				CreativePopup.selectLayer( [ jQuery(this).index() ] );
				return;
			}
		}

	}).on('mousedown.ls', '.ui-draggable', function(e){

		CP_layerWasDragged = false;

		if( e.which == 1 ) {

			var $layer 		= jQuery(this),
				layerIndex 	= $layer.index(),
				layerData 	= CP_activeSlideData.sublayers[ layerIndex ];

			// Prevent locked layers to be selected
			if( ! layerData || layerData.locked ) { return false; }

			if( $layer.hasClass('ui-selected') ){
				if( e.ctrlKey || e.metaKey ){
					$layer.removeClass('ui-selected').trigger('selectablestop.ls');
				}
			} else {
				if( !e.ctrlKey && !e.metaKey ){
					$layer.siblings('.ui-selected').removeClass('ui-selected');
				}
				$layer.addClass('ui-selected').trigger('selectablestop.ls');
			}

		}

	// store selected layers, compute lasso position & size
	}).on('selectablestop.ls', function(e, ui){

		var layerIndexSet = [];
		jQuery('.cp-preview-td .ui-selected').each(function() {
			layerIndexSet.push( jQuery(this).index() );

		});

		if( ! layerIndexSet.length ) {
			layerIndexSet = CP_activeLayerIndexSet;
		}

		CreativePopup.selectLayer(layerIndexSet);


	}).on( 'dragstart.ls', function(u, ui){

		CP_layerWasDragged = true;

		var snapEl = ui.helper.data('ui-draggable').snapElements,
			snapElLength = snapEl.length,
			$item, width, height;

		for( var s=0; s<snapElLength; s++ ) {

			$item = jQuery( snapEl[s].item );

			snapEl[s].width = $item.width() * CP_previewZoom;
			snapEl[s].height = $item.height() * CP_previewZoom;
		}

			ui.helper.data({
				originalWidth: ui.helper[0].style.width,
				originalHeight: ui.helper[0].style.height
			});

	}).on('dragstop.ls', function(e, ui) {

		ui.helper[0].style.width = ui.helper.data('originalWidth') || 'auto';
		ui.helper[0].style.height = ui.helper.data('originalHeight') || 'auto';

	}).on('drag.ls', function(e, ui){

		jQuery.data( ui.helper[0], 'ui-draggable' ).helperProportions = {
			width: ui.helper.width() * CP_previewZoom,
			height: ui.helper.height() * CP_previewZoom
		};

		var dy = ( ui.position.top - ui.originalPosition.top ) / CP_previewZoom,
			dx = ( ui.position.left - ui.originalPosition.left ) / CP_previewZoom;

		// Move only horizontally/vertically while pressing shift
		if( e.shiftKey ){
			if( Math.abs(dx) >= Math.abs(dy) ){
				dy = 0; ui.position.top = ui.originalPosition.top;
			}else{
				dx = 0; ui.position.left = ui.originalPosition.left;
			}
			ui.helper.css(ui.position);
		}

		// Disable snapTo while pressing ctrl/cmd key
		if( ui.helper.draggable('option', 'snap')){
			var d = ui.helper.data('ui-draggable');
			if( (e.ctrlKey || e.metaKey) && d.snapElements.length ){
				d._snapElements = d.snapElements; d.snapElements = [];
			}
			if( !(e.ctrlKey || e.metaKey) && !d.snapElements.length ){
				d.snapElements = d._snapElements;
			}
		}

		// Update selected layers position
		jQuery.each(CP_activeLayerIndexSet, function(idx, layerIndex) {
			var $item = CP_previewItems[layerIndex];
			var op = $item.data('originalPosition');
			$item[0].style.top = ( op.top + dy ) + 'px';
			$item[0].style.left = ( op.left + dx ) + 'px';
		});

		// Update lasso position & position info
		var op = $lasso.data('originalPosition');
		$lasso.css({
			top:  op.top + dy * CP_previewZoom + 'px',
			left: op.left + dx * CP_previewZoom + 'px'
		}).attr({
			'data-info-0': 'x: ' + $lasso.css('left'),
			'data-info-1': 'y: ' + $lasso.css('top')
		});

	});

	// km-ui smartResize init
	kmUI.smartResize.init( '#cp-layers-settings-popout' );


	CreativePopup.updatePreviewSelection();
};

jQuery(document).ready(function() {

	// Initialize the interface only if the
	// lsSliderData variable is set.
	if( window.lsSliderData ) {
		initSliderBuilder();
		CreativePopup.updatePopupNotifications();
	}
});


(function( $ ) {

	$.fn.lsRuler = function(unit) {
		unit = unit || 50;

		var $this = this.addClass('cp-ruler'),
			$preview = CP_previewWrapper;

		var offsetX = 0, offsetY = 0;
		var $info = $('<div class="cp-ruler-info">').appendTo(document.body);

		var onDragRulerLineX = function(e) {

			var y = parseFloat( $preview.data('lsRulerPos').y );
			$info.css({
				display: y > 0 ? 'block' : 'none',
				left: e.pageX + 15,
				top: e.pageY - 35,
			}).html('Y: '+ Math.round(y / CP_previewZoom) +' px');
		};

		var onDragRulerLineY = function(e) {
			var x = parseFloat( $preview.data('lsRulerPos').x );
			$info.css({
				display: x > 0 ? 'block' : 'none',
				left: e.pageX + 20,
				top: e.pageY - 40,
			}).html('X: '+ Math.round(x / CP_previewZoom) +' px');
		};


		var $x = $('<div class="cp-ruler-x">').draggable({
			axis: 'y',
			cursorAt: {top: 0},
			helper: function() {
				return $('<div class="cp-ruler-line-x">').appendTo(CP_previewWrapper);
			},
			drag: onDragRulerLineX,
			stop: function(e, ui) {
				$info.css('display', '');
				if (ui.position.top < 0) return;
				var $clone = ui.helper.clone().removeClass('ui-draggable-dragging');
					$clone.draggable({
						axis: 'y',
						start: function(e, ui) {
							offsetY = ui.offset.top - e.pageY;
						},
						drag: onDragRulerLineX,
						stop: function(e, ui) {
							offsetY = 0;
							$info.css('display', '');
							ui.position.top < 0 && ui.helper.remove();
						}
					}).data({
						originalTop: ui.position.top / CP_previewZoom,
						originalLeft: ui.position.left / CP_previewZoom
					}).appendTo($preview);
			}
		}).appendTo(CP_previewWrapper);

		var $y = $('<div class="cp-ruler-y">').draggable({
			axis: 'x',
			cursorAt: {left: 0},
			helper: function() {
				return $('<div class="cp-ruler-line-y">').appendTo(CP_previewWrapper);
			},
			drag: onDragRulerLineY,
			stop: function(e, ui) {
				$info.css('display', '');
				if (ui.position.left < 0) return;
				var $clone = ui.helper.clone().removeClass('ui-draggable-dragging');
					$clone.draggable({
						axis: 'x',
						start: function(e, ui) {
							offsetX = ui.offset.left - e.pageX;
						},
						drag: onDragRulerLineY,
						stop: function(e, ui) {
							offsetX = 0;
							$info.css('display', '');
							ui.position.left < 0 && ui.helper.remove();
						}
					}).data({
						originalTop: ui.position.top / CP_previewZoom,
						originalLeft: ui.position.left / CP_previewZoom
					}).appendTo($preview);
			}
		}).appendTo(CP_previewWrapper);

		var $xw = $('<div class="cp-ruler-wrapper">').appendTo($x),
			$yw = $('<div class="cp-ruler-wrapper">').appendTo($y),
			$xt = $('<div class="cp-ruler-tracker">').appendTo($x),
			$yt = $('<div class="cp-ruler-tracker">').appendTo($y);

		$this.on('zoom.lsRuler', function() {

			// Lower the number of ticks when zoomed out
			$this.toggleClass('disable-5px', CP_previewZoom < 0.75);

			// Resize ruler ticks
			$x.add($y).css({ fontSize: CP_previewZoom * unit });

			// Resize guide lines
			jQuery('.cp-ruler-line-x, .cp-ruler-line-y').each(function() {
				var top 	= jQuery(this).data('originalTop') * CP_previewZoom,
					left 	= jQuery(this).data('originalLeft') * CP_previewZoom;

				jQuery(this).css({ top: top, left: left });
			});

		}).on('resize.lsRuler', function() {

			$this.trigger('zoom.lsRuler');
			var xu = Math.ceil($preview.width() / CP_previewZoom / unit);
			var yu = Math.ceil($preview.height() / CP_previewZoom / unit);
			for (var i = $xw.children().length; i < xu; i++)
				$xw.append('<div class="cp-ruler-unit"><div class="cp-ruler-num">'+ i * unit);
			for (var j = $yw.children().length; j < yu; j++)
				$yw.append('<div class="cp-ruler-unit"><div class="cp-ruler-num">'+ j * unit);
		}).trigger('resize.lsRuler');

		$preview.on('mousemove.lsRuler', function(e) {
			var pos = {
				x: e.pageX + offsetX - Math.round($x.offset().left),
				y: e.pageY + offsetY - Math.round($y.offset().top)
			};
			$preview.data('lsRulerPos', pos);
			$xt.css('left', pos.x);
			$yt.css('top', pos.y);
		}).on('mouseleave.lsRuler', function() {
			$xt.css('left', '');
			$yt.css('top', '');
		});

		return $this;
	};

}( jQuery ));

var layerTransitionPreview = {

	create: function(){

		jQuery( '#cp-layers' ).on( 'mouseenter', '#cp-transition-selector-table .cp-tpreview-wrapper', function(){

			var _tl = new TimelineMax(),
				$el = jQuery(this);

			if( $el.data( 'cp-tpreview' ) ){
				$el.data( 'cp-tpreview' ).clear().kill();
				$el.removeData( 'cp-tpreview' );
			}

			switch( $el.attr('id').split( 'cp-tpreview-')[1] ){

				case 'in':
					_tl.fromTo( $el.find( '.cp-preview-layer' )[0], 1.5, {
						opacity: 1,
						x: -90
					},{
						ease: Quart.easeInOut,
						x: 0
					}).to( $el.find( '.cp-preview-layer' )[0], 0.25, {
						opacity: 0,
						onComplete: function(){
							_tl.progress( 0 );
						}
					});
				break;

				case 'out':
					_tl.to( $el.find( '.cp-preview-layer' )[0], 1.5, {
						ease: Quart.easeInOut,
						x: 90
					}).fromTo( $el.find( '.cp-preview-layer' )[0], 0.25, {
						immediateRender: false,
						x: 0,
						opacity: 0
					},{
						opacity: 1,
						onComplete: function(){
							_tl.progress( 0 );
						}
					});
				break;

				case 'textin':
					_tl.staggerFromTo( $el.find( '.cp-preview-layer_t' ).get(), 1, {
						opacity: 1,
						x: -100,
						rotation: -90
					},{
						ease: Quart.easeOut,
						x: 0,
						rotation: 0
					}, 0.15, null, function(){
						_tl.staggerTo( $el.find( '.cp-preview-layer_t' ).get(), 0.25, {
							opacity: 0
						}, 0, null, function(){
							_tl.progress( 0 );
						});
					});
				break;

				case 'textout':
					_tl.staggerTo( $el.find( '.cp-preview-layer_t' ).get(), 1, {
						x: 100,
						rotation: 90,
						ease: Quart.easeIn,
					}, 0.15, null, function(){
						_tl.staggerFromTo( $el.find( '.cp-preview-layer_t' ).get(), 0.25, {
							immediateRender: false,
							x: 0,
							opacity: 0,
							rotation: 0
						},{
							opacity: 1
						}, 0, null, function(){
							_tl.progress( 0 );
						});
					});
				break;

				case 'loop':
					_tl.to( $el.find( '.cp-preview-layer' )[0], 1.5, {
						rotation: 360,
						repeat: -1,
						ease: Linear.easeNone
					});
				break;

				case 'hover':
					_tl.to( $el.find( '.cp-preview-layer' )[0], .75, {
						scale: 1.5,
						repeat: -1,
						yoyo: true,
						ease: Quad.easeInOut
					});
				break;

				case 'parallax':
					_tl.to( $el.find( '.cp-preview-layer' )[0], 1, {
						x: -10,
						repeat: -1,
						yoyo: true,
						ease: Quad.easeInOut
					}, 0 );
					_tl.to( $el.find( '.cp-preview-layer_b' )[0], 1, {
						x: -15,
						repeat: -1,
						yoyo: true,
						ease: Quad.easeInOut
					}, 0 );
				break;
			}

			jQuery(this).data( 'cp-tpreview', _tl );
		});

		jQuery( '#cp-layers' ).on( 'mouseleave', '#cp-transition-selector-table .cp-tpreview-wrapper', function(){

			if( jQuery(this).data( 'cp-tpreview' ) ){
				jQuery(this).data( 'cp-tpreview' ).clear().kill();
				jQuery(this).removeData( 'cp-tpreview' );
				TweenMax.set( jQuery(this).find( '.cp-preview-layer, .cp-preview-layer_t' ).get(), {
					opacity: 1,
					rotation: 0,
					scale: 1,
					x: 0,
				});
			}
		});
	}
};


var prepTemplateForRelease = function() {

	var sliderData 	= window.lsSliderData,
		sliderProps = sliderData.properties;

	// Global BG
	if( sliderProps.backgroundimage ) { sliderProps.backgroundimage = CP_Utils.parse_url( sliderProps.backgroundimage, 'PHP_URL_PATH'); }
	if( sliderProps.preview ) { sliderProps.preview = CP_Utils.parse_url( sliderProps.preview, 'PHP_URL_PATH'); }
	if( sliderData.meta && sliderData.meta.preview ) { sliderData.meta.preview = CP_Utils.parse_url( sliderData.meta.preview, 'PHP_URL_PATH'); }


	// Slides
	jQuery.each(window.lsSliderData.layers, function(slideIndex, slideData) {

		var slideProps = slideData.properties;

		slideData.history = [];

		if( slideData.meta && slideData.meta.undoStackIndex ) {
			slideData.meta.undoStackIndex = -1;
		}

		if( slideProps.background ) { slideProps.background = CP_Utils.parse_url( slideProps.background, 'PHP_URL_PATH'); }
		if( slideProps.backgroundThumb ) { slideProps.backgroundThumb = CP_Utils.parse_url( slideProps.backgroundThumb, 'PHP_URL_PATH'); }

		if( slideProps.thumbnail ) { slideProps.thumbnail = CP_Utils.parse_url( slideProps.thumbnail, 'PHP_URL_PATH'); }
		if( slideProps.thumbnailThumb ) { slideProps.thumbnailThumb = CP_Utils.parse_url( slideProps.thumbnailThumb, 'PHP_URL_PATH'); }

		// Layers
		jQuery.each(slideData.sublayers, function(layerIndex, layerData) {

			if( layerData.image ) { layerData.image = CP_Utils.parse_url( layerData.image, 'PHP_URL_PATH'); }
			if( layerData.imageThumb ) { layerData.imageThumb = CP_Utils.parse_url( layerData.imageThumb, 'PHP_URL_PATH'); }

			if( layerData.poster ) { layerData.poster = CP_Utils.parse_url( layerData.poster, 'PHP_URL_PATH'); }
			if( layerData.posterThumb ) { layerData.posterThumb = CP_Utils.parse_url( layerData.posterThumb, 'PHP_URL_PATH'); }
		});
	});

	CP_UndoManager.update();

	alert("All Done. Performed tasks:\r\n\r\n– Converted URLs to relative format\r\n– Emptied pages history\r\n\r\nManual save required.");
};