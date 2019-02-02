/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

var FSAU = FSAU || {};
FSAU.isProcessing = false;
FSAU.showRedirectAlert = true;

FSAU.editButtonClick = function() {
    setTimeout(function(){
        $(window).focus(function(){
            if (FSAU.showRedirectAlert) {
                swal({
                    title: 'Please reload the page!',
                    text: 'By clicking OK, the page will reload!',
                    type: 'info',
                    confirmButtonText: FSAU.translateOk
                },
                function(is_confirm) {
                    if (is_confirm) {
                        window.location.href = FSAU.redirectUrl;
                    } else {
                        FSAU.showRedirectAlert = false;
                    }
                });
            }
        });
    }, 1000)
};

FSAU.addKeywordToInput = function(keyword, id_input) {
    $('#'+id_input).insertAtCaret('{' + keyword + '}');
};

FSAU.addKeywordToInputMultilang = function(keyword, id_input) {
    var visible_input = null;
    if (FSAU.isPs15) {
        visible_input = $('#'+id_input).parent().parent().find('div:visible:first input');
    }
    else {
        visible_input = $('#'+id_input).parent().parent().parent().find('div:visible:first input');
    }

    visible_input.insertAtCaret('{' + keyword + '}');
};

FSAU.toggleDescription = function(id_panel) {
    $('#'+id_panel).toggle();
};

FSAU.generateProductLinkRewrite = function() {
    var pbid = 'fsau_product_link_rewrite_progress_bar';
    $('#'+pbid).css('width', 0 + '%').attr('aria-valuenow', 0);
    $('#'+pbid).html('Preparing...');

    FSAU.generateMeta('product_link_rewrite', 0);
};

FSAU.generateMeta = function(type, offset) {
    if (!FSAU.isProcessing) {
        FSAU.isProcessing = true;

        $.ajax({
            url: FSAU.generateLinkRewriteUrl,
            type: 'GET',
            data: {
                json: true,
                fsau_offset: offset
            },
            async: true,
            dataType: 'json',
            cache: false,
            success: function(data) {
                if (data.error.length > 0)
                {
                    var errors = data.error.join('\n\n');
                    swal({
                        title: 'Oops...',
                        text: errors,
                        type: 'error',
                        confirmButtonText: FSAU.translateOk
                    },
                    function(is_confirm) {
                        window.location.href = FSAU.redirectUrl;
                    });
                }
                else {
                    if (data.content) {
                        var pbid = 'fsau_'+type+'_progress_bar';
                        $('#'+pbid).css('width', data.content.progress_bar_percent + '%').attr('aria-valuenow', data.content.progress_bar_percent);
                        $('#'+pbid).html(data.content.progress_bar_percent + '%');

                        if (data.content.has_more) {
                            FSAU.isProcessing = false;
                            FSAU.generateMeta(type, data.content.processed_count);
                        }
                        else {
                            $('#'+pbid).addClass('progress-bar-success');
                            $('#'+pbid).html(data.content.progress_bar_message);

                            FSAU.isProcessing = false;

                            var messages = data.confirmations.join('\n\n');
                            swal({
                                title: data.content.alert_title,
                                text: messages,
                                type: 'success',
                                confirmButtonText: FSAU.translateOk
                            },
                            function(is_confirm) {
                                window.location.href = FSAU.redirectUrl;
                            });
                        }
                    }
                }
            }
        });
    }
};

FSAU.toggleMultishopDefaultValue = function(obj, key) {
    if (!$(obj).prop('checked') || $('.'+key).hasClass('isInvisible'))
    {
        $('.conf_id_'+key+' input, .conf_id_'+key+' textarea, .conf_id_'+key+' select, .conf_id_'+key+' button').attr('disabled', true);
        $('.conf_id_'+key+' label.conf_title').addClass('isDisabled');
    }
    else
    {
        $('.conf_id_'+key+' input, .conf_id_'+key+' textarea, .conf_id_'+key+' select, .conf_id_'+key+' button').attr('disabled', false);
        $('.conf_id_'+key+' label.conf_title').removeClass('isDisabled');
    }
    $('.conf_id_'+key+' input[name^=\'multishop_override_enabled\']').attr('disabled', false);
    $('.conf_id_'+key+' input[name^=\'multishop_override_fields\']').attr('disabled', false);
};


$(document).ready(function(){

    $('#fsau_tabs a').click(function(){
        $('#fsau_tabs a').removeClass('active');
        $(this).addClass('active');
    });

    $('#fsau_tabs_15 a').click(function(){
        $('#fsau_tabs_15 a').removeClass('selected');
        $(this).addClass('selected');
        $('#fsau_tabs_content_15 .product-tab-content').removeClass('active');
        $('#'+$(this).attr('id')+'_content').addClass('active');
    });

    $('.fsau-help-title').click(function(){
        $(this).next().toggleClass('fsau-hide');
    });

});

$.fn.extend({
    insertAtCaret: function(insert_value){
        var obj;
        if( typeof this[0].name !='undefined' ) obj = this[0];
        else obj = this;

        if ($.browser.msie) {
            obj.focus();
            sel = document.selection.createRange();
            sel.text = insert_value;
            obj.focus();
        }
        else if ($.browser.mozilla || $.browser.webkit) {
            var startPos = obj.selectionStart;
            var endPos = obj.selectionEnd;
            var scrollTop = obj.scrollTop;
            obj.value = obj.value.substring(0, startPos) + insert_value + obj.value.substring(endPos,obj.value.length);
            obj.focus();
            obj.selectionStart = startPos + insert_value.length;
            obj.selectionEnd = startPos + insert_value.length;
            obj.scrollTop = scrollTop;
        }
        else {
            obj.value += insert_value;
            obj.focus();
        }
    }
});