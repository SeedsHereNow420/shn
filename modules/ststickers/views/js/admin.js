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
var googleFontsJson = '';
jQuery(function($){    
    $('.st_delete_image').click(function(){
        var self = $(this);
        var id_lang = self.data('lang');
        var id = self.data('id');
        $.getJSON(currentIndex+'&token='+token+'&configure=ststickers&id_st_sticker='+id+'&id_lang='+id_lang+'&act=delete_image&ts='+new Date().getTime(),
            function(json){
                if(json.r) {
                    self.parent().siblings('.help-block').find('img').remove();
                    self.parent().remove();
                }
                else
                    alert('Error');
            }
        ); 
        return false;
    });
    
    if(typeof(googleFontsString)!= 'undefined' && googleFontsString && !googleFontsJson)
        googleFontsJson = $.parseJSON(googleFontsString);
    
    $('#text_font_select').each(function(){
        handle_font_change($(this));
        return false;
    });
    
    $('input[name=location]:checked').each(function(){
        checkLocationInto($(this).val());
    });
    $('input[name=location]').click(function(){
        checkLocationInto($(this).val());
    });
    
    $('#products').autocomplete('ajax_products_list.php?disableCombination=true', {
        minChars: 1,
        autoFill: true,
        max:200,
        matchContains: true,
        mustMatch:true,
        scroll:true,
        cacheLength:0,
        extraParams:{ excludeIds:getProductExcIds()},
        formatItem: function(item) {
            if (item.length == 2) {
              return item[1]+' - '+item[0];  
            } else {
                return '--';
            }
        }
    }).result(function(event, data, formatted) {
		if (data == null || data.length != 2)
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
});

var getProductExcIds = function()
{
    var excludeIds = '';
    $(':hidden[name="id_product[]"]').each(function(){
        excludeIds += $(this).val()+',';
    });
    return excludeIds.substr(0, excludeIds.length-1);  
}

function checkLocationInto(type)
{
    type = parseInt(type);
    var items = {
        'products' : [1], 
        'id_category' : [2], 
        'id_manufacturer' : [3]
    };
    for(var i in items) {
        if ($.inArray(type, items[i]) != -1) {
            troggleForm(i, true);
            $('#'+i).attr('disabled',false);    
        } else {
            troggleForm(i, false);
            $('#'+i).attr('disabled',true);    
        }
    }
}

function troggleForm(id, flag)
{
    if (flag) {
        $('#'+id).parents('.form-group').show();
    } else  {
        $('#'+id).parents('.form-group').hide();
    }
}

var handle_font_change = function(that, default_variant)
{
    var selected_font = $(that).val();
    var identi = $(that).attr('id');
    var font_weight = font_style = 'normal';
    var variant_dom = $('#'+identi.replace('_select','_weight')).empty();
    //this can be imporved to manage cases like 700italic
    if(typeof(default_variant)==='undefined' || !default_variant)
        default_variant = 'regular';
    var arr_default = {'700':'700', 'italic':'italic', '700italic':'700italic'};
    if(selected_font!=0)
    {
        if(!$('#google_font_link').size())
                $('head').append('<link id="google_font_link" rel="stylesheet" type="text/css" href="" />');
            var cf_key = selected_font.replace(/\s/g, '_');
            var variant = '';
            var arr_variants = {};            
            $.each(googleFontsJson[cf_key]['variants'], function(i,n){
                arr_variants[n] = n;
            });
            $.extend(arr_variants, arr_default);
            $.each(arr_variants, function(i,n){
                var option_dom = $('<option>', {
                    value: n,
                    text: n
                });
                if(n==default_variant)
                {
                    variant = default_variant;
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
                if (font_style == default_variant)
                    font_style = 'normal';
            }
        $('link#google_font_link').attr({href:'//fonts.googleapis.com/css?family=' + selected_font.replace(' ', '+')+':'+variant});
        $('#google_font_example').css({'font-family':selected_font,'font-weight':font_weight,'font-style':font_style});
    } else {
        var regular = {default_variant:default_variant};
        $.extend(arr_default, regular);
        $.each(arr_default, function(i,n){
            var option_dom = $('<option>', {
                value: n,
                text: n
            });
            if(n==default_variant)
            {
                variant = default_variant;
                option_dom.attr('selected','selected');
            }
            variant_dom.append(option_dom);
        });
    }
};

var handle_font_style = function(that){
    var identi = $(that).attr('id');
    var selected_font = $('#'+identi.replace('_weight','_select')).val();
    var selected_weight = $(that).val();
    var font_weight = font_style = 'normal';
    if(selected_weight)
    {
        var font_weight_arr = selected_weight.match(/\d+/g);
        var font_style_arr = selected_weight.match(/[^\d]+/g);
        if(font_weight_arr)
            font_weight = font_weight_arr[0];
        if(font_style_arr)
            font_style = font_style_arr[0];
        if (font_style == 'regular')
            font_style = 'normal';
    }
    else
        return false;
    
    if(!$('#google_font_link').size())
        $('head').append('<link id="google_font_link" rel="stylesheet" type="text/css" href="" />');
    if (selected_font != 0)
        $('link#google_font_link').attr({href:'//fonts.googleapis.com/css?family=' + selected_font.replace(' ', '+')+':'+selected_weight});
    $('#google_font_example').css({'font-family':selected_font,'font-weight':font_weight,'font-style':font_style});
};
