/**
* 2017 PrestaWach
*
* @author    PrestaWach <info@prestawach.info>
* @copyright 2017 PrestaWach
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

$(document).ready( function () {
    if ($('#PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG_off').is(':checked')) {
    	$('.advanced_index_on').closest('.form-group:not(.translatable-field)').css('display', 'none');
    }
    else {
    	$('.advanced_index_off').closest('.form-group:not(.translatable-field)').css('display', 'none');
    	$('input[name=PS_ELASTICSEARCH_EXACT]').closest('.form-group:not(.translatable-field)').css('display', 'none');
    }

    $('#PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG_on').on('change', function () {    	
    	$('input[name=PS_ELASTICSEARCH_EXACT]').closest('.form-group:not(.translatable-field)').fadeOut('slow');
    	$('.advanced_index_off').closest('.form-group:not(.translatable-field)').fadeOut('slow');
    	
    	$('.advanced_index_on').closest('.form-group:not(.translatable-field)').fadeIn('slow');
    });
    $('#PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG_off').on('change', function () {
    	$('.advanced_index_on').closest('.form-group:not(.translatable-field)').fadeOut('slow');

    	$('input[name=PS_ELASTICSEARCH_EXACT]').closest('.form-group:not(.translatable-field)').fadeIn('slow');
    	$('.advanced_index_off').closest('.form-group:not(.translatable-field)').fadeIn('slow');
    });
    
    if ($('#PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG_off').is(':checked')) {
    	$('.advanced_search_on').closest('.form-group:not(.translatable-field)').css('display', 'none');
    }
    else {
    	$('.advanced_search_off').closest('.form-group:not(.translatable-field)').css('display', 'none');
    	$('input[name=PS_ELASTICSEARCH_INTELIGENT_SEARCH]').closest('.form-group:not(.translatable-field)').css('display', 'none');
    }

    $('#PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG_on').on('change', function () {
    	$('input[name=PS_ELASTICSEARCH_INTELIGENT_SEARCH]').closest('.form-group:not(.translatable-field)').fadeOut('slow');
    	$('.advanced_search_off').closest('.form-group:not(.translatable-field)').fadeOut('slow');
    	
    	$('.advanced_search_on').closest('.form-group:not(.translatable-field)').fadeIn('slow');
    });
    $('#PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG_off').on('change', function () {
    	$('.advanced_search_on').closest('.form-group:not(.translatable-field)').fadeOut('slow');
    	
    	$('input[name=PS_ELASTICSEARCH_INTELIGENT_SEARCH]').closest('.form-group:not(.translatable-field)').fadeIn('slow');
    	$('.advanced_search_off').closest('.form-group:not(.translatable-field)').fadeIn('slow');
    });
    
    $('.ajaxcall').click(function() {
		if (this.cursor == undefined)
			this.cursor = 0;

		if (this.legend == undefined)
			this.legend = $(this).html();

		if (this.legend_text == undefined)
			this.legend_text = $.trim($(this).contents().first()[0].textContent);

		if (typeof escRunning == 'undefined')
			escRunning = false;

		if (escRunning == true)
			return false;

		escRunning = true;

		if (typeof(this.restartAllowed) == 'undefined' || this.restartAllowed) {
			$(this).contents().first()[0].textContent = this.legend_text + ' ' +translations['in_progress'] + ' ';
		}

		this.restartAllowed = false;

		$.ajax({
			url: this.href+'&ajax=1&cursor='+this.cursor,
			method: 'post',
			context: this,
			dataType: 'json',
			cache: 'false',
			success: function(res) {
				escRunning = false;

				if (res.result) {
					this.cursor = 0;
					this.restartAllowed = true;
					$(this).html(this.legend);

					if (res.result == 'ok') {
						showSuccessMessage(translations['regenerate_finished']);

						$('#indexed-nb-products').text($('#total-nb-products').text());
						if (escFirstTime) {
							escFirstTime = 0;
							$('.first-time').hide();
							$('.not-first-time').show();
						}
					} 
					else {
						showErrorMessage(translations['regenerate_failed']);
					}

					return;
				}

				this.cursor = parseInt(res.cursor);
				$(this).contents().first()[0].textContent = this.legend_text + ' ' + translations['in_progress_continue'].replace('[count]', res.count) + ' ';
				$(this).click();

				return;
			},
			error: function(res) {
				escRunning = false;
				this.restartAllowed = true;
				this.cursor = 0;
				$(this).html(this.legend);	

				showErrorMessage(translations['regenerate_failed']);

				return;
			}
		});

		return false;
	});
});