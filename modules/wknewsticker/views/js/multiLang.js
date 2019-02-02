/**
 * 2010-2017 Webkul.
 *
 * NOTICE OF LICENSE
 *
 * All right is reserved,
 * Please go through this link for complete license : https://store.webkul.com/license.html
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
 *
 *  @author    Webkul IN <support@webkul.com>
 *  @copyright 2010-2017 Webkul IN
 *  @license   https://store.webkul.com/license.html
 */

$(window).bind("load", function() {
    $('.mColorPickerTrigger').html("<img src='" + baseDir + "img/admin/color.png' style='border:0;margin:0 0 0 3px' align='absmiddle'>");
    $('#mColorPickerImg').css({
        'background-image': "url('" + baseDir + "img/admin/colorpicker.png')"
    });
    $('#mColorPickerImgGray').css({
        'background-image': "url('" + baseDir + "img/admin/graybar.jpg')"
    });
    $('#mColorPickerFooter').css({
        'background-image': "url('" + baseDir + "img/admin/grid.gif')"
    });
});

function showNewsTickerLangField(lang_iso_code, id_lang) {
    $('#wk_msg_btn').html(lang_iso_code + ' <span class="caret"></span>');
    $('#wk_url_btn').html(lang_iso_code + ' <span class="caret"></span>');

    $('.wk_msg_div_all').hide();
    $('#wk_msg_div_' + id_lang).show();
    $('.wk_url_div_all').hide();
    $('#wk_url_div_' + id_lang).show();
}
