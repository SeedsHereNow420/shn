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
var googleFontsJson = '';
jQuery(function($){
    $('#add_google_font').click(function(){
        var font_name = $('#google_font_select').val();
        var inputGoogleFontName = $('#google_font_name');
        var divGoogleFontName = $('#curr_google_font_name');
        var variant = $('#google_font_weight').val();
        var style = font_weight = font_style = '';
        
        if (!variant)
            variant = 'regular';
        if (font_name == 0)
            font_name = 'inherit';

        var nameCut = inputGoogleFontName.val().split('¤');
        if ($.inArray(font_name+':'+variant, nameCut)==-1)
            inputGoogleFontName.val(inputGoogleFontName.val() + font_name + ':' + variant + '¤');
        
        var font_weight_arr = variant.match(/\d+/g);
        var font_style_arr = variant.match(/[^\d]+/g);
        if(font_weight_arr)
            font_weight = font_weight_arr[0];
        if(font_style_arr)
            font_style = font_style_arr[0];
            
        style = 'font-family:\''+font_name+'\';';
        if (variant == 'regular')
        {
            //Cause 400 is the default value.
            // style += 'font-weight:400;';
        }
        else
        {
            if (font_weight)
                style += 'font-weight:'+font_weight+';';
            if (font_style)
                style += 'font-style:'+font_style+';';    
        }

        var identi = font_name.toLowerCase().replace(/\W/g,'_');
        if(!$('#'+identi+'_li').size())
            divGoogleFontName.append('<li id="#'+identi+'_li" class="form-control-static"><button type="button" class="delGoogleFont btn btn-default" name="' + font_name + '"><i class="icon-remove text-danger"></i></button>&nbsp;<span style="'+style+'"> style="'+style+'"</span></li>');
        if(!$('#'+identi+'_link').size())
            $('head').append('<link id="'+identi+'_link" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + font_name.replace(' ', '+') + ':' + variant + '" />');
    });

    $('#curr_google_font_name').delegate('.delGoogleFont', 'click', function(){
        delGoogleFont($(this).attr('name'));
    });
    
    if(typeof(googleFontsString)!= 'undefined' && googleFontsString && !googleFontsJson)
        googleFontsJson = $.parseJSON(googleFontsString);
    $('#links').change(function(){checkPagebBannerInto($(this).val());});
    
    $('#google_font_select').each(function(){
        handle_font_change($(this));
        return false;
    });
    
    checkPagebBannerInto($('#links').val());
    
    $('.st_delete_image').click(function(){
        var self = $(this);
        var id_lang = self.data('lang');
        var id = self.data('id');
        $.getJSON(currentIndex+'&token='+token+'&configure=stpagebanner&id_st_page_banner='+id+'&id_lang='+id_lang+'&act=delete_image&ts='+new Date().getTime(),
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
});

var delGoogleFont = function(id)
{
    var div = $('#curr_google_font_name');
    var name = $('#google_font_name');

    // Cut hidden fields in array
    var nameCut = name.val().split('¤');

    // Reset all hidden fields
    name.val('');
    div.empty();
    for (i in nameCut)
    {
        // If empty, error, next
        if (!nameCut[i])
            continue ;

        // Add to hidden fields no selected products OR add to select field selected product
        if (nameCut[i] != id)
        {
            name.val(name.val()+nameCut[i]+'¤');
            var selected_arr = nameCut[i].split(':');
            var style = font_weight = font_style = '';
            if(selected_arr[1])
            {
                var font_weight_arr = selected_arr[1].match(/\d+/g);
                var font_style_arr = selected_arr[1].match(/[^\d]+/g);
                if(font_weight_arr)
                    font_weight = font_weight_arr[0];
                if(font_style_arr)
                    font_style = font_style_arr[0];
                
                style = 'font-family:\''+selected_arr[0]+'\';';
                if (selected_arr[1] == 'regular')
                {
                    //Cause 400 is the default value.
                    // style += 'font-weight:400;';
                }
                else
                {
                    if (font_weight)
                        style += 'font-weight:'+font_weight+';';
                    if (font_style)
                        style += 'font-style:'+font_style+';';    
                }
            }
            div.append('<li class="form-control-static"><button type="button" class="delGoogleFont btn btn-default" name="' + nameCut[i] + '"><i class="icon-remove text-danger"></i></button>&nbsp;<span style="'+style+'"> style="'+style+'"</span></li>');
        }
    }
    return false;
};

var handle_font_change = function(that)
{
    var selected_font = $(that).val();
    var identi = $(that).attr('id');
    var font_weight = font_style = 'normal';
    var variant_dom = $('#'+identi.replace('_select','_weight')).empty();
    var default_variant = 'regular';
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
function checkPagebBannerInto(hookinto)
{
    if(hookinto == '12_0')
        $('#filter').parents('.form-group').show();
    else
        $('#filter').parents('.form-group').hide();
}