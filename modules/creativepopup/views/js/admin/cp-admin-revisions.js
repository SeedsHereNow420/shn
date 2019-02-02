/*! Creative Popup v1.6.4
* creativeslider.webshopworks.com
* Copyright 2018 WebshopWorks */

jQuery(function($) {

	var $selectedRevision 	= $('#cp-revisions-selected'),
		$revisionId 		= $('#revision-id');


	$('#cp-revisions-range').on('input', function() {

		// Update data source
		window.selectedRevision = window.lsRevisions[ ($(this).val()-1) ];
		window.lsSliderData = window.selectedRevision.data;

		if( (CP_activeSlideIndex+1) > window.lsSliderData.layers.length ) {
			CP_activeSlideIndex = window.lsSliderData.layers.length - 1;
		}

		window.CP_activeSlideData = window.lsSliderData.layers[ CP_activeSlideIndex ];
		window.CP_activeLayerIndexSet = [0];

		// Update revision details
		$('img', $selectedRevision).attr('src', window.selectedRevision.avatar);
		$('.author', $selectedRevision).text( window.selectedRevision.nickname );
		$('.time-diff', $selectedRevision).text( window.selectedRevision.time_diff );
		$('.date', $selectedRevision).text( window.selectedRevision.created );

		// Update revision ID
		$revisionId.val( window.selectedRevision.id );

		// Update UI
		CreativePopup.rebuildSlides();
		CreativePopup.stopSlidePreview();
		CreativePopup.generatePreview();
	});

	$('.cp-revisions-options').click(function(e) {
		e.preventDefault();
		kmUI.modal.open('#tmpl-revisions-options', { width: 700, height: 560 });
		$('#cp-revisions-modal-window input:checkbox').customCheckbox();

		$('#cp-revisions-modal-window .cp-checkbox').click(function(e) {

			if( ! $(this).hasClass('off') ) {
				if( ! confirm( $(this).data('warning') ) ) {
					e.preventDefault();
					return false;
				}
			}
		});
	});
});