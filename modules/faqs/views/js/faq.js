$(document).ready(function () {

    var CodeMirrorActive = false;

    $(document).on('click', '#gomakoil_faq_settings_form .nav-tabs li a', function (e) {
        if ($(this).attr('href') == '#code_mirror' && !CodeMirrorActive) {
            var editor = CodeMirror.fromTextArea(document.getElementById("css_code"), {
                mode: "css",
                lineNumbers: "true",
                readOnly: false,
            });
            CodeMirrorActive = true;
        }
    });

    $(document).on('click', '.new_question_header span.close, .overlay_fags', function () {
        closeNewQuestionModal();
    });


    $(document).on('click', '.button-ask-question', function () {
        showForm();
    });
    $(document).on('click', '.button-new-question', function () {
        sendQuestion();
    });

    $(document).on('change', '#gomakoil_faq_settings_form input[name=button]', function () {
        if ($(this).val() == 1) {
            $('#gomakoil_faq_settings_form .button_faqs').show();
        }
        else {
            $('#gomakoil_faq_settings_form .button_faqs').hide();
        }
    });

    if ($('#gomakoil_faq_settings_form input[name=button]:checked').val() == 1) {
        $('#gomakoil_faq_settings_form .button_faqs').show();
    } else {
        $('#gomakoil_faq_settings_form .button_faqs').hide();
    }


    $(document).on('change', 'input[name=association]', function () {
        var checked = $("input[name='association']:checked").val();
        if (checked == 1) {
            $('.block_more_settings').removeClass('hide_form_settings');
        }
        else {
            $('.block_more_settings').addClass('hide_form_settings');
        }
    });

    $(document).on('click', '#add_products_item', function () {
        addProductItem();
    });

    $(document).on('click', '.table_list_delete a', function () {
        removeProductItem($(this).attr('data-id-product'));
    });

    if ($('#productIds').length > 0) {
        select2Include();
    }

    $('.search_fag_input').keyup(function (event) {
        if (event.keyCode == 13) {
            $(this).next().click();
        }
    });

    window.onload = function () {
        if (typeof tinymce != 'undefined' && $('#question_' + id_language).length > 0) {
            PS_ALLOW_ACCENTED_CHARS_URL = 0;
           setTimeout(function () {
              tinymce.get('question_'+ id_language).on('keyup', function (e) {
                $('#gomakoil_faq_form input[name=link_rewrite_'+ id_language+']').val(str2url($(this.getContent()).text(), 'UTF-8'));
              });
            },500)
        }

        if (window.addEventListener) {
            window.addEventListener("DOMMouseScroll", mouse_wheel, false);
        }
        window.onmousewheel = document.onmousewheel = mouse_wheel;
    }

    if ($('#gomakoil_faq_category_form').length > 0) {
        $('#gomakoil_faq_category_form #name_' + id_language).live('keyup', function (event) {
            PS_ALLOW_ACCENTED_CHARS_URL = 0;
            $('#gomakoil_faq_category_form input[name=link_rewrite_' + id_language + ']').val(str2url($(this).val(), 'UTF-8'));
        })
    }

    $(".gomakoil_faq_page a.questions").click(function (e) {
        e.preventDefault();
        if ($(this).hasClass('as_url')) {
            location.href = $(this).next().attr('href');
            return false;
        }
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).next().fadeOut();
        }
        else {
            $(this).addClass('active');
            $(this).next().fadeIn();
        }
        $(this).next().next().next().slideToggle("slow");
    });

    $(document).on('change', '#gomakoil_faq_settings_form input[name=categories]', function () {
        if ($(this).val() == 1) {
            $('#gomakoil_faq_settings_form .categories_faq').show();
        }
        else {
            $('#gomakoil_faq_settings_form .categories_faq').hide();
        }
    });

    $(document).on('change', '#gomakoil_faq_settings_form input[name=featured]', function () {
        if ($(this).val() == 1) {
            $('#gomakoil_faq_settings_form .featured_faq').show();
        }
        else {
            $('#gomakoil_faq_settings_form .featured_faq').hide();
        }
    });

    if ($('#gomakoil_faq_settings_form input[name=featured]:checked').val() == 1) {
        $('#gomakoil_faq_settings_form .featured_faq').show();
    }

    if ($('#gomakoil_faq_settings_form input[name=categories]:checked').val() == 1) {
        $('#gomakoil_faq_settings_form .categories_faq').show();
    }


    var display = 0;

    var mouse_wheel = function (event) {
        if (false == !!event) event = window.event;
        direction = ((event.wheelDelta) ? event.wheelDelta / 120 : event.detail / -3) || false;
    }

    $(document).scroll(function () {
        if ($('.form_new_question').length > 0) {
            scrollForm($('.form_new_question'), 0);
        }
    });

})

function scrollForm(el, show) {
    $(el.css('margin-top', '0px'));
    var top = $(document).scrollTop();
    var height_window = $(window).outerHeight();
    var height_form = el.outerHeight();
    var margin = (height_window - height_form) / 2;
    var form_offset = el.offset().top;

    if (show && margin < 11) {
        margin = 11;
    }

    if (margin > 10) {
        var margin_top = margin + top;
        el.css('top', margin_top + 'px');
    }
    else {
        if (direction >= 0) {

            if (top < form_offset) {
                el.css({top: (top + 10)});
            }
        }
        if (direction < 0) {
            if (top > (height_form + 10 - height_window)) {
                el.css({top: (top - (height_form - height_window + 10))});
            }
        }
    }
}

function sendQuestion() {

    var basePath = $('input[name="basePath"]').val();

    $.ajax({
        type: "POST",
        url: basePath + 'index.php?rand=' + new Date().getTime(),
        dataType: 'json',
        async: true,
        cache: false,
        data: {
            ajax: true,
            token: "",
            controller: 'AjaxForm',
            fc: 'module',
            module: 'faqs',
            action: 'send',
            id_shop: $('input[name="id_shop"]').val(),
            id_lang: $('input[name="id_lang"]').val(),
            name: $('input[name="name_customer"]').val(),
            email: $('input[name="email_customer"]').val(),
            captcha: $('input[name="captcha_res"]').val(),
            category: $('select[name="category_question"]').val(),
            question: $('textarea[name="question_customer"]').val(),
        },
        success: function (json) {
            if (json['error']) {
                fieldError(json['error']);
            }
            if (json['form']) {
                $(".form_new_question").replaceWith(json['form']);
                scrollForm($('.form_new_question'), 1);
            }
        }
    });
}

function fieldError(field) {
    $('.new_question_content .' + field).css('background-color', '#F33D3D');
    $('.new_question_content .' + field).focus();
    setTimeout(function () {
        $('.new_question_content .' + field).css('background-color', '#ffffff');
    }, 300)
}

function showForm() {

    var basePath = $('input[name="basePath"]').val();

    $.ajax({
        type: "POST",
        url: basePath + 'index.php?rand=' + new Date().getTime(),
        dataType: 'json',
        async: true,
        cache: false,
        data: {
            ajax: true,
            token: "",
            controller: 'AjaxForm',
            fc: 'module',
            module: 'faqs',
            action: 'showForm',
            id_shop: $('input[name="id_shop"]').val(),
            id_lang: $('input[name="id_lang"]').val(),
        },
        success: function (json) {
            if (json['form']) {
                $("body").prepend(json['form']);
                scrollForm($('.form_new_question'), 1);
            }
        }
    });
}

function checkDelBoxesMenu(pForm, boxName, parent) {
    for (i = 0; i < pForm.elements.length; i++)
        if (pForm.elements[i].name == boxName) {
            pForm.elements[i].checked = parent;
            $('#idCheckDelBoxesMenu').prop('checked');
        }
}
function searchFags(val, url) {
    if (val.length > 0) {
        location = url + val;
    }
}

function select2Include() {

    $('.attendee').select2({
        placeholder: "Search for a repository",
        minimumInputLength: 1,
        width: '345px',
        dropdownCssClass: "bootstrap",
        ajax: {
            url: 'index.php',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params,
                    ajax: true,
                    token: $('input[name=token_faq]').val(),
                    controller: 'AdminFaqsPost',
                    action: 'searchProduct'
                };
            },
            results: function (data) {
                if (data) {
                    return {results: data};
                }
                else {
                    return {
                        results: []
                    }
                }
            }
        },
        formatResult: productFormatResult,
        formatSelection: productFormatSelection,
    })
}

function productFormatResult(item) {
    itemTemplate = "<div class='media'>";
    itemTemplate += "<div class='pull-left'>";
    itemTemplate += "<img class='media-object' width='40' src='" + item.image + "' alt='" + item.name + "'>";
    itemTemplate += "</div>";
    itemTemplate += "<div class='media-body'>";
    itemTemplate += "<h4 class='media-heading'>" + item.name + "</h4>";
    itemTemplate += "<span>REF: " + item.ref + "</span>";
    itemTemplate += "</div>";
    itemTemplate += "</div>";
    return itemTemplate;
}

function productFormatSelection(item) {
    return item.name;
}

function removeProductItem(id) {
    var products = $('#productIds').val();
    if (products) {
        var new_products = products.split(',');
        var index = $.inArray(id, new_products);
        new_products.splice(index, 1);

        $('#productIds').val(new_products);
        $('.row_' + id).remove();
    }
}

function addProductItem() {
    var id = $('#attendee').val();
    var products = $('#productIds').val();
    if (!products) {
        var new_products = [id];
    }
    else {
        var new_products = products.split(',');
        var index = $.inArray(id, new_products);
        if (index < 0) {
            new_products.push(id);
        }
    }

    $.ajax({
        type: "POST",
        url: 'index.php?rand=' + new Date().getTime(),
        dataType: 'json',
        async: true,
        cache: false,
        data: {
            ajax: true,
            token: $('input[name=token_faq]').val(),
            controller: 'AdminFaqsPost',
            fc: 'module',
            module: 'faqs',
            action: 'addProduct',
            idLang: $("input[name='idLang']").val(),
            idShop: $("input[name='idShop']").val(),
            products: new_products,
        },
        success: function (json) {
            if (json['list']) {
                $('#productIds').val(json['products']);
                $('.added_products_list').replaceWith(json['list']);
            }
        }
    });
}

function showSuccessMessage(msg) {
    $.growl.notice({title: "", message: msg});
}

function showErrorMessage(msg) {
    $.growl.error({title: "", message: msg});
}

function showNoticeMessage(msg) {
    $.growl.notice({title: "", message: msg});
}

function closeNewQuestionModal() {
    $('.overlay_fags').remove();
    $('.form_new_question').remove();
}
