/**
* NOTICE OF LICENSE
*
* This source file is subject to a commercial license from BSofts.
* Use, copy, modification or distribution of this source file without written
* license agreement from the BSofts is strictly forbidden.
*
* @author    BSofts Inc.
* @copyright Copyright 2017 © BSofts Inc.
* @license   Single domain commerical license
* @package   quantitylimit
*/

$(document).ready(function() {
	if (typeof is_swal !== 'undefined' && is_swal == 1) {
		window.alert = function() {};
	}

	$( document ).ajaxComplete(function( event, xhr, settings ) {
		if (typeof xhr != 'undefined' && typeof xhr.responseText != 'undefined') {
			var errors = '';
			var response = xhr.responseText;
			var json = $.parseJSON(response);
			if (typeof json !== 'undefined' && json && typeof json.referer !== 'undefined' && json.referer && json.referer == 'quantitylimit') {

				$.each(json, function(i, v) {
					if (i == 'errors' && v != null) {
						errors += v + '\n';
					}
				});

				if (typeof errors !== 'undefined' && errors) {
					xhr.abort();
					if (typeof $.fancybox !== 'undefined') {
						$.fancybox.close();
					}
					// for ps 1.7
					setTimeout(function() {
						$('#blockcart-modal, .modal-backdrop').remove();
					}, 500);
					if (typeof is_swal !== 'undefined' && is_swal == 1) {
						// show sweet alert
						swal({title: error_label, html: errors, showCloseButton: true, type: "error"});
					} else {
						alert(errors);
					}
				}
			}
		}
	})
});
