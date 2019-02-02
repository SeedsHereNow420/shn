/*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*/
;(function($){
    $.fn.ststaticbanner = function(banner_height) {
        if(typeof(st_responsive)=='undefined' || !st_responsive)
            return false;

        var max_page_width = (typeof(st_responsive_max)=='undefined' || !st_responsive_max) ? 970 : 1170
        var ratio = banner_height / max_page_width;

        var that = $(this);
        var columns = that.children('.row').children('.banner_col');  
        function banner_auto_height(){  
            var container_height = Math.round((that.width()) * ratio);
            columns.each(function(){
                var row_height = Math.round((container_height-20*(that.children('.row').children('.banner_b').size())) * $(this).data('height')/100)
                var rows = $(this).children('.row').children('.banner_col');
                if(!rows.size())
                    $(this).find('.st_banner_block').height(row_height);
                else
                {
                    var rows_size = rows.size();
                    rows.each(function(index) {
                        $(this).find('.st_banner_block').height(Math.round((row_height-20*(rows_size-1)) * $(this).data('height')/100));
                    });
                }
            });
        }       

        var banner_rs;
        $(window).resize(function(){
            clearTimeout(banner_rs);
            var rand_s = parseInt(Math.random()*200 + 300);
            banner_rs = setTimeout(function() {
                banner_auto_height();
            }, rand_s);
        });
        banner_auto_height();
    };
})(jQuery);