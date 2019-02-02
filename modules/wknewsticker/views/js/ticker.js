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
$(document).ready(function() {
    var textWidth = $('#wk_news_ticker_text').width();
    var blockWidth = $('#wk_news_ticker_block').width();
    var lastWidth = blockWidth + textWidth;
    if (direction == 1) {
        $('#wk_news_ticker_text').css({
            'width': textWidth,
            'right': -textWidth,
        });
    } else {
        $('#wk_news_ticker_text').css({
            'width': textWidth,
            'left': -textWidth,
        });
    }
    textMarquee(direction, speed, lastWidth);
    if (hover == 1) {
        $('#wk_news_ticker_text').hover(function() {
                $(this).stop();
            },
            function() {
                var $this = $(this);
                if (direction == 1) {
                    var cur = parseInt($this.css('margin-right'));
                    var cssMargin = { 'margin-right': 0 };
                    var data = { "margin-right": lastWidth };
                } else {
                    var cur = parseInt($this.css('margin-left'));
                    var cssMargin = { 'margin-left': 0 };
                    var data = { "margin-left": lastWidth };
                }
                $this.animate(data, speed * ((lastWidth - cur) / lastWidth), 'linear', function() {
                    $('#wk_news_ticker_text').css(cssMargin);
                    textMarquee(direction, speed, lastWidth);
                });
            }
        );
    }

    function textMarquee(direction, speed, lastWidth) {
        if (direction == 1) {
            var data = { 'margin-right': lastWidth };
            var cssMargin = { 'margin-right': 0 };
        } else {
            var data = { 'margin-left': lastWidth };
            var cssMargin = { 'margin-left': 0 };
        }
        $('#wk_news_ticker_text').animate(
            data,
            parseInt(speed),
            'linear',
            function() {
                $('#wk_news_ticker_text').css(cssMargin);
                textMarquee(direction, speed, lastWidth);
            }
        );
    }
});