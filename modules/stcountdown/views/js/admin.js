/*
* 2007-2014 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
var googleFontsJson = systemFontsArr = '';
jQuery(function($){
    $('#products').autocomplete('index.php?controller=AdminModules&configure=stcountdown&act=gsp&ajax=1&token='+token, {
        minChars: 1,
        autoFill: true,
        max:200,
        matchContains: true,
        mustMatch:true,
        scroll:true,
        cacheLength:0,
        extraParams:{ excludeIds:getProductExcIds()},
        formatItem: function(item) {
            return item[1]+' - '+item[0];
        }
    }).result(function(event, data, formatted) {
		if (data == null)
			return false;
		var id = data[1];
		var name = data[0];        
		$('#curr_products').append('<li>'+name+'<a href="javascript:;" class="del_product"><img src="../img/admin/delete.gif" /></a><input type="hidden" name="id_product[]" value="'+id+'" /></li>');
        
        $('#products').setOptions({
        	extraParams: {
        		excludeIds : getProductExcIds()
        	}
	    });
    });
    $('#curr_products').delegate('.del_product', 'click', function(){
        $(this).closest('li').remove();
        $('#products').setOptions({
        	extraParams: {
        		excludeIds : getProductExcIds()
        	}
	    });
    });
    if(typeof(googleFontsString)!= 'undefined' && googleFontsString && !googleFontsJson)
        googleFontsJson = $.parseJSON(googleFontsString);

    if(typeof(systemFonts)!= 'undefined' && systemFonts && !systemFontsArr)
        systemFontsArr = systemFonts.split(',');

    if(googleFontsJson && systemFontsArr)
        $('.fontOptions').each(function()
        {
            var selected_string = $(this).val();
            if(selected_string)
                handle_font_style(this);
        });
});

var handle_font_change = function(that)
{
    if(!googleFontsJson || !systemFontsArr)
        return false;

    var selected_font = $(that).val();
    var identi = $(that).attr('id');
    var font_weight = font_style = 'normal';
    var variant_dom = $('#'+identi.replace('_list','')).empty();
    if(selected_font!=0)
    {
        if($.inArray(selected_font, systemFontsArr)<0)
        {
            if(!$('#'+identi+'_link').size())
                $('head').append('<link id="'+identi+'_link" rel="stylesheet" type="text/css" href="" />');
            var cf_key = selected_font.replace(/\s/g, '_');
            var variant = '';
            var arr_default = {'700':'700', 'italic':'italic', '700italic':'700italic'};
            var arr_variants = {};            
            $.each(googleFontsJson[cf_key]['variants'], function(i,n){
                arr_variants[n] = n;
            });
            $.extend(arr_variants, arr_default);
            $.each(arr_variants, function(i,n){
                var option_dom = $('<option>', {
                    value: selected_font+':'+(n=='regular' ? '400' : n),
                    text: n
                });
                if(n=='regular')
                {
                    variant = 'regular';
                    option_dom.attr('selected','selected');
                }
                variant_dom.append(option_dom);
            });
            if(!variant)
            {
                variant = googleFontsJson[cf_key]['variants'][0];
                var font_weight_arr = variant.match(/\d+/g);
                var font_style_arr = variant.match(/[^\d]+/g);
                if(font_weight_arr)
                    font_weight = font_weight_arr[0];
                if(font_style_arr)
                    font_style = font_style_arr[0];
                if (font_style == 'regular')
                    font_style = 'normal';
            }

            $('link#'+identi+'_link').attr({href:'//fonts.googleapis.com/css?family=' + selected_font.replace(' ', '+')+':'+variant});
        }
        else
        {
            variant_dom.append($('<option>', {
                value: selected_font,
                text: 'Normal'
            })).append($('<option>', {
                value: selected_font+':700',
                text: 'Bold'
            })).append($('<option>', {
                value: selected_font+':italic',
                text: 'Italic'
            })).append($('<option>', {
                value: selected_font+':700italic',
                text: 'Bold & Italic'
            }));
        }
    }
    else
    {
        selected_font = 'inherit';
        variant_dom.append($('<option>', {
                value: selected_font,
                text: 'Normal'
            })).append($('<option>', {
                value: selected_font+':700',
                text: 'Bold'
            })).append($('<option>', {
                value: selected_font+':italic',
                text: 'Italic'
            })).append($('<option>', {
                value: selected_font+':700italic',
                text: 'Bold & Italic'
            }));
    }
    $('#'+identi+'_example').css({'font-family':selected_font,'font-weight':font_weight,'font-style':font_style});
};
var handle_font_style = function(that){
    var identi = $(that).attr('id');
    var selected_string = $(that).val();
    var selected_arr = selected_string.split(':');
    var font_weight = font_style = 'normal';
    if(selected_arr[1])
    {
        var font_weight_arr = selected_arr[1].match(/\d+/g);
        var font_style_arr = selected_arr[1].match(/[^\d]+/g);
        if(font_weight_arr)
            font_weight = font_weight_arr[0];
        if(font_style_arr)
            font_style = font_style_arr[0];
        if (font_style == 'regular')
            font_style = 'normal';
    }
    if($.inArray(selected_arr[0], systemFontsArr)<0 && selected_arr[0] != 'inherit')
    {
        if(!$('#'+identi+'_list_link').size())
            $('head').append('<link id="'+identi+'_list_link" rel="stylesheet" type="text/css" href="" />');

        $('link#'+identi+'_list_link').attr({href:'//fonts.googleapis.com/css?family=' + selected_string.replace(' ', '+')});
    }
    $('#'+identi+'_list_example').css({'font-family':selected_arr[0],'font-weight':font_weight,'font-style':font_style});
};
var getProductExcIds = function()
{
    var excludeIds = '';
    $(':hidden[name="id_product[]"]').each(function(){
        excludeIds += $(this).val()+',';
    });
    return excludeIds.substr(0, excludeIds.length-1);  
}
