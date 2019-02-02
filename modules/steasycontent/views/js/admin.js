/*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
var googleFontsJson = '';
var googleAutocomplete;
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
    
    $('#google_font_select').each(function(){
        handle_font_change($(this));
        return false;
    })
    
    $('.show_on_type input[name=type]:checked').each(function(){
        checkEasyContetTypeInto($(this).val());
    });
    $('.show_on_type input[name=type]').click(function(){
        checkEasyContetTypeInto($(this).val());
    });
    $('#go_to_advanced').click(function(){
        return confirm(go_to_advanced_confirm);
    });
    $('.st_show_help').click(function(){
        $(this).closest('.st_help_block').toggleClass("open");
        return false;
    });
    
    if(typeof(googlemap_url)!= 'undefined' && googlemap_url) {
        createScript(window,document,'script',googlemap_url,'gm');   
    }
    
    // Google map address
    /*$('#st_gmap_address').focus(function(){
        geolocate();
    });*/
    
    $('.st_delete_image').click(function(){
        var self = $(this);
        var s_id = self.data('s_id'),
            s_t = self.data('s_t'), //0 main 1 column 2 element
            s_k = self.data('s_k'); //
        
        $.getJSON(currentIndex+'&token='+token+'&configure=steasycontent&act=delete_image&st_s_id='+(s_id ? s_id : 0)+'&st_s_t='+(s_t ? s_t : 0)+'&st_s_k='+(s_k ? s_k : 0)+'&ts='+new Date().getTime(),
            function(json){
                if(json.r)
                {
                    self.closest('.image_thumb_block').empty();
                }
                else
                    alert('Error');
            }
        ); 
        return false;
    });

    /*$('.easy_pre_style_list li').click(function(){
        $('.easy_pre_style_list li').removeClass('easy_selected');
        $(this).addClass('easy_selected').closest('form')[0].reset();
        var default_variant = '';
        $.each($(this).data() , function($k, $v){
            if($k=='default_variant'){
                default_variant = $v;
                return true;
            }
            $('input[name="'+$k+'"], select[name="'+$k+'"]').val($v);
        });
        handle_font_change($('.st_google_font_select'), default_variant);
    });*/
    $('.st_sidebar a').click(function(){
        $(this).parent().addClass('active').siblings().removeClass('active');
        var fieldset_arr = $(this).attr('data-fieldset').split(',');
        var fieldset_dom = $('form.defaultForm .panel');
        fieldset_dom.removeClass('selected');
        $.each(fieldset_arr,function(i,n){
            $('.panel[id^="fieldset_'+n+'"]').each(function(){
                var id = $(this).attr('id').replace('fieldset_', '');
                if(parseInt(id) == n)
                    $(this).addClass('selected');
            });
        });
    });
    $('.st_sidebar a:first').trigger('click');
    $('#ac_products').autocomplete('ajax_products_list.php?disableCombination=true', {
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
		$('#curr_products').append('<li>'+name+'<a href="javascript:;" class="del_product"><img src="../img/admin/delete.gif" /></a><input type="hidden" name="st_id_product[]" value="'+id+'" /></li>');
        
        $('#ac_products').setOptions({
        	extraParams: {
        		excludeIds : getProductExcIds()
        	}
	    });
    });
    $('#curr_products').delegate('.del_product', 'click', function(){
        $(this).closest('li').remove();
        $('#ac_products').setOptions({
        	extraParams: {
        		excludeIds : getProductExcIds()
        	}
	    });
    });
});
var getProductExcIds = function()
{
    var excludeIds = '';
    $(':hidden[name="st_id_product[]"]').each(function(){
        excludeIds += $(this).val()+',';
    });
    return excludeIds.substr(0, excludeIds.length-1);  
};

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
    if (selected_font != 0) {
        $('link#google_font_link').attr({href:'//fonts.googleapis.com/css?family=' + selected_font.replace(' ', '+')+':'+selected_weight});    
    }
    $('#google_font_example').css({'font-family':selected_font,'font-weight':font_weight,'font-style':font_style});
};

function checkEasyContetTypeInto(type)
{
    type = parseInt(type);
    var items = {
        'location' : [1], 
        'module' : [2], 
        'id_cms' : [3], 
        'id_category' : [4,5],
        'id_category_brand' : [6,7,8,9,10],
        'id_manufacturer' : [15,16],
        'id_st_blog' : [20]
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

function initAutocomplete()
{
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  googleAutocomplete = new google.maps.places.Autocomplete(
      document.getElementById('st_gmap_address'),
      {types: ['geocode']});
  googleAutocomplete.addListener('place_changed', fillInLatLng);
}

function fillInLatLng()
{
  // Get the place details from the autocomplete object.
  $('.st_map_not_found').hide();
  var place = googleAutocomplete.getPlace();
  if (place.geometry.location) {
    $('#st_gmap_lat').val(place.geometry.location.lat());
    $('#st_gmap_lng').val(place.geometry.location.lng());
  } else {
    $('.st_map_not_found').show();
  }
}

function geolocate()
{
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      googleAutocomplete.setBounds(circle.getBounds());
    });
  }
}

function createScript(i,s,o,g,r,a,m)
{
    i['GoogleMapObject']=r;
    i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();
    a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];
    a.async=1;
    a.src=g;
    m.parentNode.insertBefore(a,m);
}

function handle_apply_to(that,txt_a,txt_b,txt_c)
{
    var val = $(that).val();
    if (val == "PRODUCT")
	{
		val = prompt(txt_a);
		if (val == null || val == "" || isNaN(val))
			return;
		$(that).find("option[value='PRODUCT']").val('1_'+val).text(txt_b+" "+val);
	}
    else if(val=="")
    {
        $(that).find("option[value^='1']").val("PRODUCT").text(txt_c);
    }
    else
    {
        $(that).find("option[value^='1']").val("PRODUCT").text(txt_c);
    } 
}