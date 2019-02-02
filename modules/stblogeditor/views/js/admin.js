var googleFontsJson = '';
jQuery(function($){
    $('#btn_regenerate_thumbs').die().live('click', function(e)
    {
        e.preventDefault();
        if (typeof(c_msg)!= 'undefined')
            c_msg = 'Are you sure ?';
        if (!confirm(c_msg))
            return false;
            
        var $_this = $(this);
        
        $('#progress-warning').show();
        $_this.attr('disabled', true);
        $.getJSON(currentIndex+'&configure='+module_name+'&act=regeneratethumb&token='+token+'&ajax=1&ts='+new Date().getTime(),
            function(json){
                if(json.r) {
                    $('#progress-warning').hide();
                    $('#ajax-message-ok').show();
                    if (json.m)
                        $('#ajax-message-ko').find('.message').html(json.m.replace('\n','<br>')).addBack().show();
               } else {
                    $('#progress-warning').hide();
                    $('#ajax-message-ko').find('.message').html(json.m.replace('\n','<br>')).addBack().show();
               }
               $_this.attr('disabled', false);
            }
        ); 
    });
    
    if(typeof(googleFontsString)!= 'undefined' && googleFontsString && !googleFontsJson)
        googleFontsJson = $.parseJSON(googleFontsString);
});

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