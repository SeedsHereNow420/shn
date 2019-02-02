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
(function (factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(['jquery'], factory);
  } else if (typeof module === 'object' && typeof module.exports === 'object') {
    factory(require('jquery'));
  } else {
    // Browser globals
    factory(jQuery);
  }
}(function ($) {
    var functions = {
        update_source_code: function(adv_source_code, that){
            adv_source_code.val($((typeof(adv_content_only)!=='undefined' && adv_content_only ? '.layered_content' : '.st_banner_block'), that).html().replace(/<img[^>]*>/g, "").replace(/(?:\r\n|\r|\n)/g, "").replace(/\t/g, ""));
        },
        text_val: function(element, that){
            var text_val = element.val();
            var target = $(element.data('target'), that);
            $(element.data('target'), that).html(text_val);
            if(text_val)
              target.removeClass('hidden');
            else
              target.addClass('hidden');
        },
        button_val: function(element, that){
            if(element.val())
                $(element.data('target'), that).removeClass('hidden-xs-up').html(element.val()).parent('a').attr('title', element.val());
            else
                $(element.data('target'), that).addClass('hidden-xs-up');
        },
        button_url_val: function(element, that, banner_url_val){
            var target = $(element.data('target'), that);
            var url = element.val();
            if(banner_url_val.val() || !url)
            {
                if(target.parent('a').length)
                    target.unwrap();
            }
            else
            {
                if(target.parent('a').length)
                    target.parent('a').attr('href', url);
                else
                    target.wrap( '<a href="'+url+'" title="'+element.closest('.col-9').find('.adveditor_button').val()+'" rel="nofollow" class="style_button_wrap"></a>');
            }
        },
        banner_url_val: function(element, that, adv_content, button_url_val){
            var url = element.val();
            if(url){
                if(that.find('.style_button').parent('a').length)
                    that.find('.style_button').unwrap();

                if(adv_content.parent('a').length)
                    adv_content.parent('a').attr('href', url);
                else
                    adv_content.wrap( '<a href="'+url+'" title="'+element.closest('.col-9').find('.adveditor_banner_url_title').val()+'" rel="nofollow"  class="style_a_wrap"></a>');
            }
            else{
                if(adv_content.parent('a').length)
                    adv_content.unwrap();
                //
                $.each(button_url_val,function(){
                    var url = $(this).val();
                    if(url){
                        var target = $($(this).data('target'), that);
                        if(target.parent('a').length)
                            target.parent('a').attr('href', url);
                        else
                            target.wrap( '<a href="'+url+'" title="'+$(this).closest('.col-9').find('.adveditor_button').val()+'" rel="nofollow"  class="style_button_wrap"></a>');
                    }
                    else{
                        //useless
                        var target = $($(this).data('target'), that);
                        if(target.parent('a').length)
                            target.unwrap();
                    }
                });
            }
        },
        banner_url_title_val: function(element, that){
            $('.style_a_wrap', that).attr('title', element.val());
        },
        color_val: function(element, that){
            $(element.data('target'), that).css(element.data("property"), element.val());
        },
        size_val: function(element, that){
            var _val = element.val();
            var property = element.data("property");

            if(property == 'font-size' && element.data("unit")=='em')
              _val = Math.round(_val/12*100) / 100;

            $.each(property.split(' '),function(index, value){
              if(element.data(' ') && _val===0)
                $(element.data('target'), that).css(value, '0'+element.data("unit"));
              else if(_val)
                $(element.data('target'), that).css(value, _val+element.data("unit"));
              else
                $(element.data('target'), that).css(value, '');
            });
            if(property == 'height' && element.data("line-height"))
              $(element.data('target'), that).css('line-height', (_val-parseInt(element.data("line-height")))+element.data("unit"));
        },
        width_val: function(element, that){
            var _val = parseInt(element.val());
            $(element.data('target'), that).removeClass('width_100 width_90 width_80 width_70 width_60 width_50 width_40 width_30 width_20 width_10 width_91 width_81 width_71 width_61 width_51 width_41 width_31 width_21 width_11 width_92 width_82 width_72 width_62 width_52 width_42 width_32 width_22 width_12').addClass('width_'+_val);
        },
        font_val: function(element, that, googleFontsJson){
            var identi = element.attr('id');
            var selected_font = element.val();
            var font_weight = font_style = 'normal';
            var variant_dom = $('#'+identi+'_weight').empty();

            if(selected_font)
            {
              if(!$('#'+identi+'_link').size())
                  $('head').append('<link id="'+identi+'_link" rel="stylesheet" type="text/css" href="" />');
              var cf_key = selected_font.replace(/\s/g, '_');
              var variant = '';

              $.each(googleFontsJson[cf_key]['variants'], function(i,n){
                  var option_dom = $('<option>', {
                      value: n,
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
            $(element.data('target'), that).css({'font-family': selected_font, 'font-weight':font_weight,'font-style':font_style});
        },
        font_weight_val: function(element, that){
            var identi = element.attr('id').replace('_weight','');
            var selected_font = $('#'+identi).val();
            var selected_weight = element.val();
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
            
            if(!$('#'+identi+'_link').size())
                $('head').append('<link id="'+identi+'_link" rel="stylesheet" type="text/css" href="" />');

            $('link#'+identi+'_link').attr({href:'//fonts.googleapis.com/css?family=' + selected_font.replace(' ', '+')+':'+selected_weight});

            $(element.data('target'), that).css({'font-family':selected_font,'font-weight':font_weight,'font-style':font_style});
        },
        h_align: function(element, h_align, adv_content){
            h_align.each(function(){
                adv_content.removeClass($(this).val());
            });
            adv_content.addClass(element.val());
        },
        v_align: function(element, v_align, adv_content){
            v_align.each(function(){
                adv_content.removeClass($(this).val());
            });
            adv_content.addClass(element.val());
        },
        t_align: function(element, t_align, adv_content){
            t_align.each(function(){
                adv_content.removeClass($(this).val());
            });
            adv_content.addClass(element.val());
        },
        btn_val: function(element, btn_val, that){
            var target = $(element.data('target'), that);
            btn_val.each(function(){
                target.removeClass($(this).attr('class').replace('adveditor_btn btn',''));
            });
            target.addClass(element.attr('class').replace('adveditor_btn btn',''));
        }
    };
    $.fn.adveditor = function(options) {
        var options = $.extend({ 
                googleFontsJson: ''
            }, 
            options);
        $('.adveditor_close').click(function(){
            window.top.$('#modal_adv_editor').modal('hide');
        });
    this.each(function() {
      var that = $(this),
      adv_content = $('.adveditor_content', that),
      adv_insert = $('.adveditor_insert', that),
      adv_code = $('.adveditor_code', that),
      adv_copy = $('.adveditor_copy', that),
      adv_btn_hide = $('.adveditor_btn_hide', that),
      adv_btn_show = $('.adveditor_btn_show', that),
      adv_transform = $('.adveditor_transform', that),
      adv_help_link = $('.adveditor_help_link', that),
      adv_source_code_block = $('.adveditor_source_code_block', that),
      adv_source_code = $('.adveditor_source_code', that),

      text_val = $('.adveditor_text_val', that),
      color_val = $('.mColorPickerInput', that),
      size_val = $('.adveditor_size', that),
      font_val = $('.adveditor_font', that),
      width_val = $('.adveditor_width', that),
      font_weight_val = $('.adveditor_font_weight', that),
      banner_url_val = $('.adveditor_banner_url', that),
      banner_url_title_val = $('.adveditor_banner_url_title', that),
      button_val = $('.adveditor_button', that),
      button_url_val = $('.adveditor_button_url', that),
      btn_val = $('.adveditor_btn', that),
      h_align = $('.h_align', that),
      v_align = $('.v_align', that);
      t_align = $('.t_align', that);


      if(window.top!=window.self){
            adv_insert.on('click', function(e){
                window.top.tinyMCE.get((typeof(adveditor_target)!=='undefined' ? adveditor_target : 'description')+'_'+window.top.id_language).setContent(adv_source_code.val());
                window.top.tinyMCE.triggerSave();
                //
                var google_font_name = '';
                $.each(font_val, function(){
                    if($(this).val())
                        google_font_name += $(this).val()+':'+$('#'+$(this).attr('id')+'_weight').val()+'¤';
                });
                if(google_font_name)
                {
                    var google_font_field = window.top.$('#google_font_name');
                    google_font_field.val(google_font_field.val()+google_font_name);
                }
                var timerId = null;
                var alter_message =  $(this).closest('.col-9').find('.alert-success').removeClass('hidden-xs-up');
                function hideAlertSuccess()
                {
                    alter_message.addClass('hidden-xs-up');
                    clearTimeout(timerId);
                }
                timerId = setTimeout(hideAlertSuccess, 3000);
            });
      }
      adv_btn_hide.on('click',function(e){
        $($(this).data('target'), that).addClass('hidden-xs-up');
        functions.update_source_code(adv_source_code, that);
      });
      adv_btn_show.on('click',function(e){
        $($(this).data('target'), that).removeClass('hidden-xs-up');
        functions.update_source_code(adv_source_code, that);
      });
      adv_transform.on('click',function(e){
        $($(this).data('target'), that).removeClass('text-capitalize text-uppercase text-lowercase').addClass($(this).data('transform'));
        functions.update_source_code(adv_source_code, that);
      });
      adv_code.on('click',function(e){
        adv_source_code_block.toggleClass('display_none');
      });
      adv_help_link.on('click',function(e){
        $(this).find('img').toggle();
        return false;
      });
      adv_copy.on('click',function(e){
        functions.update_source_code(adv_source_code, that);
        adv_source_code.select();
        document.execCommand("copy");
        var timerId = null;
        var alter_message =  $(this).closest('.col-9').find('.alert-success').removeClass('hidden-xs-up');
        function hideAlertSuccess()
        {
            alter_message.addClass('hidden-xs-up');
            clearTimeout(timerId);
        }
        timerId = setTimeout(hideAlertSuccess, 3000);
      });

      text_val.each(function(){
        $(this).on('change',function(){
            functions.text_val($(this), that);
            functions.update_source_code(adv_source_code, that);
        });
        functions.text_val($(this), that);
      });

      button_val.each(function(){
        $(this).on('change',function(){
            functions.button_val($(this), that);
            functions.update_source_code(adv_source_code, that);
        });
        // functions.button_val($(this), that);
      });
      button_url_val.each(function(){
        $(this).on('change',function(){
            functions.button_url_val($(this), that, banner_url_val);
            functions.update_source_code(adv_source_code, that);
        });
        // functions.button_url_val($(this), that, banner_url_val);
      });

      banner_url_val.each(function(){
        $(this).on('change',function(){
            functions.banner_url_val($(this), that, adv_content, button_url_val);
            functions.update_source_code(adv_source_code, that);
        });
        // empty by default.
      });
      banner_url_title_val.each(function(){
        $(this).on('change',function(){
            functions.banner_url_title_val($(this), that, adv_content);
            functions.update_source_code(adv_source_code, that);
        });
        // empty by default.
      });

      color_val.each(function(){
        $(this).on('change',function(){
            functions.color_val($(this), that);
            functions.update_source_code(adv_source_code, that);
        });
        functions.color_val($(this), that);
      });

      size_val.each(function(){
        $(this).on('change',function(){
            functions.size_val($(this), that);
            functions.update_source_code(adv_source_code, that);
        });
        functions.size_val($(this), that);
      });
      font_val.each(function(){
        $(this).on('change',function(){
            functions.font_val($(this), that, options.googleFontsJson);
            functions.update_source_code(adv_source_code, that);
        });
        functions.font_val($(this), that, options.googleFontsJson);
      });
      font_weight_val.each(function(){
        $(this).on('change',function(){
            functions.font_weight_val($(this), that);
            functions.update_source_code(adv_source_code, that);
        });
        functions.font_weight_val($(this), that);
      });

      width_val.each(function(){
        $(this).on('change',function(){
            functions.width_val($(this), that);
            functions.update_source_code(adv_source_code, that);
        });
        functions.width_val($(this), that);
      });

      h_align.on('change',function(){
        functions.h_align($(this), h_align, adv_content);
        functions.update_source_code(adv_source_code, that);
      });
      functions.h_align(h_align.filter(':checked'), h_align, adv_content);

      v_align.on('change',function(){
        functions.v_align($(this), v_align, adv_content);
        functions.update_source_code(adv_source_code, that);
      });
      functions.v_align(v_align.filter(':checked'), v_align, adv_content);

      t_align.on('change',function(){
        functions.t_align($(this), t_align, adv_content);
        functions.update_source_code(adv_source_code, that);
      });
      functions.t_align(t_align.filter(':checked'), t_align, adv_content);

      btn_val.on('click',function(){
        functions.btn_val($(this), btn_val, that);
        functions.update_source_code(adv_source_code, that);
      });

      //
      functions.update_source_code(adv_source_code, that);
    });
    return this;
  };
}));
