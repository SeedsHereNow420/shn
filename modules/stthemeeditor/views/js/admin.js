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
var googleFontsJson = systemFontsArr = '';
jQuery(function($){
    $('.st_sidebar a').click(function(){
        $(this).parent().addClass('active').siblings().removeClass('active');
        var fieldset_arr = $(this).attr('data-fieldset').split(',');
        var fieldset_dom = $('form.defaultForm .panel');
        fieldset_dom.removeClass('selected');
        $.each(fieldset_arr,function(i,n){
            $('.panel[id^="fieldset_'+n+'"]').each(function(){
                var id = $(this).attr('id').replace('fieldset_', '');
                if(parseInt(id) == n) {
                    $(this).addClass('selected');
                    $('input[name="id_tab_index"]').val(n);
                }  
            });
        });
    });
    if (typeof(id_tab_index) == 'undefined' || !id_tab_index) {
        $('.st_sidebar a:first').trigger('click');
    } else {
        if ($('.st_sidebar a[data-fieldset="'+id_tab_index+'"]').length > 0) {
            $('.st_sidebar a[data-fieldset="'+id_tab_index+'"]').trigger('click');
        } else {
            $('.st_sidebar a[data-fieldset$=",'+id_tab_index+'"]').trigger('click');
        }   
    }
    /*if (typeof(stthemeeditor_refer) != 'undefined') {
        $('.st_sidebar a').each(function(){
            var fieldset_arr = $(this).attr('data-fieldset').split(',');
            if($.inArray(stthemeeditor_refer, fieldset_arr) > -1)
            {
                $(this).trigger('click');
                return false;
            }
        });    
    } else {
        $('.st_sidebar a:first').trigger('click');
    }*/
    
    $('#import_export').click(function(){
        $('#content.bootstrap .st_toolbtn').toggle();
    });
        
    $('.st_delete_image').click(function(){
        var self = $(this);
        var field = self.data('field');
        $.getJSON(currentIndex+'&token='+token+'&configure='+module_name+'&act=delete_image&field='+field+'&ts='+new Date().getTime(),
            function(json){
                if(json.r)
                {
                    self.closest('.form-group').remove();
                }
                else
                    alert('Error');
            }
        ); 
        return false;
    });
    
    $('#xml_config_file_field-selectbutton').click(function(e) {
			$('#xml_config_file_field').trigger('click');
	});

	$('#xml_config_file_field-name').click(function(e) {
		$('#xml_config_file_field').trigger('click');
	});

	$('#xml_config_file_field-name').on('dragenter', function(e) {
		e.stopPropagation();
		e.preventDefault();
	});

	$('#xml_config_file_field-name').on('dragover', function(e) {
		e.stopPropagation();
		e.preventDefault();
	});

	$('#xml_config_file_field-name').on('drop', function(e) {
		e.preventDefault();
		var files = e.originalEvent.dataTransfer.files;
		$('#xml_config_file_field')[0].files = files;
		$(this).val(files[0].name);
	});

	$('#xml_config_file_field').change(function(e) {
		if ($(this)[0].files !== undefined)
		{
			var files = $(this)[0].files;
			var name  = '';

			$.each(files, function(index, value) {
				name += value.name+', ';
			});

			$('#xml_config_file_field-name').val(name.slice(0, -2));
		}
		else // Internet Explorer 9 Compatibility
		{
			var name = $(this).val().split(/[\\/]/);
			$('#xml_config_file_field-name').val(name[name.length-1]);
		}
	});
    
    $('.st_toolbtn .defaultForm').submit(function(){
        if (!confirm($('#uploadconfig').attr('data')))
            return false;        
        return true;
    })

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
    
    $('#add_cate_sortby').click(function(){
        var sortby = $('#cate_sortby_name').val();
        var inputSortby = $('#cate_sortby');
        var divSortby = $('#curr_cate_sortby');

        var nameCut = inputSortby.val().split('¤');
        if ($.inArray(sortby, nameCut)==-1)
            inputSortby.val(inputSortby.val() + sortby + '¤');

        var identi = sortby.toLowerCase();
        if(identi && !$('#'+identi+'_li').size())
            divSortby.append('<li id="'+identi+'_li" class="form-control-static"><button type="button" class="delSortby btn btn-default" name="' + sortby + '"><i class="icon-remove text-danger"></i></button>&nbsp;<span>'+$('#cate_sortby_name option[value="'+sortby+'"]').text()+'</span></li>');
    });

    $('#curr_cate_sortby').delegate('.delSortby', 'click', function(){
        delSortby($(this).attr('name'));
    });
});
var delSortby = function(id)
{
    var div = $('#curr_cate_sortby');
    var name = $('#cate_sortby');

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
            div.append('<li id="'+nameCut[i]+'_li" class="form-control-static"><button type="button" class="delSortby btn btn-default" name="' + nameCut[i] + '"><i class="icon-remove text-danger"></i></button>&nbsp;<span>'+$('#cate_sortby_name option[value="'+nameCut[i]+'"]').text()+'</span></li>');
        }
    }
    return false;
};
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
        var arr_variants = [];
        var cf_key = selected_arr[0].replace(/\s/g, '_');
        $.each(googleFontsJson[cf_key]['variants'], function(i,n){
            arr_variants.push(n);
        });
        if ($.inArray(selected_arr[1], arr_variants)<0)
            selected_string = selected_arr[0];
        
        if(!$('#'+identi+'_list_link').size())
            $('head').append('<link id="'+identi+'_list_link" rel="stylesheet" type="text/css" href="" />');

        $('link#'+identi+'_list_link').attr({href:'//fonts.googleapis.com/css?family=' + selected_string.replace(' ', '+')});
    }
    $('#'+identi+'_list_example').css({'font-family':selected_arr[0],'font-weight':font_weight,'font-style':font_style});
};