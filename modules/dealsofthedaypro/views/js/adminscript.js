/*
 *
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the following license: REGULAR LICENSE
 * that is bundled with this package in the file LICENSE.txt.
 *
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future.
 *
 *  @author VaSibi
 *  @license    REGULAR LICENSE
 *
 */

function UpdateHidden(getEl, hidentoUpdate) {
  var ids = [];
  //$(getEl+' > li').each(function() {
  $(getEl).find('li').each(function() {
    ids.push($(this).attr('data-id-product'));
  });
  //console.log(ids);
  //update hidden with selected and unique
  $this.find(hidentoUpdate).val(ids.join(","));
}

function scrollTo(divid) {
  //$('' + divid + '').animate({
  $('html,body').animate({
    scrollTop: $('' + divid + '').offset().top - 140
  });
}

function chekvalidatorstate(div) {
  var objnonvalid = $(div).find("[data-bv-result='INVALID']");
  //console.log('validator fails =' + objnonvalid.length);
  return objnonvalid.length;
}


function addNewCustomFieldPopup(modal) {
  $('#modal_edit_form_' + modal).modal({
    'show': true,
    'backdrop': 'static'
  });
}

function closeModalPopup(modal) {
  $('#' + modal + '_load').hide();
  $('#' + modal).modal('hide');
  $('#' + modal + '_progress').hide();
}


$(document).ready(function() {
  //console.log('admin script loaded');
  //var ajax_url = {$ajax_url|escape:'quotes':'UTF-8'};
  //console.log('ajax url is ' + ajax_url);
  //hide editable fields
  $('.form-fields').hide();

  //edit button
  $(document).on('click', '.list-edit', function(e) {
    var slider = $(this).parents('tr').attr("sid");
    //console.log(slider);
    $('tr.slider' + slider).each(function() {
      $(this).find('.form-fields').slideToggle(700);
      $(this).find('.display-only').hide();
    });

    $('#slider' + slider).bootstrapValidator({
        feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          maincolor: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color1: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color2: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color3: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color4: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color5: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color6: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color7: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color8: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          margin: {
            validators: {
              integer: {},
              notEmpty: {},
              between: {
                min: '10',
                max: '100',
              }
            }
          }
        }
      })
      .on('success.form.bv', function(e) {});
    //$('#slider' + slider).bootstrapValidator('removeField', 'color1');

    var btntextArray = $('#slider' + slider).find('input.edit-btntext');
    var btntextNames = ["0"];
    $.each(btntextArray, function(index, value) {
      btntextNames[index] = btntextArray[index]['name'];
    });

    var maintextArray = $('#slider' + slider).find('input.edit-maintext');
    var maintextNames = ["0"];
    $.each(maintextArray, function(index, value) {
      maintextNames[index] = maintextArray[index]['name'];
    });

    var btnlinkArray = $('#slider' + slider).find('input.edit-btnlink');
    var btnlinkNames = ["0"];
    $.each(btnlinkArray, function(index, value) {
      btnlinkNames[index] = btnlinkArray[index]['name'];
    });

    $.each(btntextNames, function(index, value) {
      $('#slider' + slider).bootstrapValidator('addField', btntextNames[index], {
        validators: {
          stringLength: {
            max: 20,
          }
        }
      });

      $('#slider' + slider).bootstrapValidator('addField', maintextNames[index], {
        validators: {
          stringLength: {
            max: 20,
          }
        }
      });

      $('#slider' + slider).bootstrapValidator('addField', btnlinkNames[index], {
        validators: {
          /*uri: {
            allowlocal: true,
          }*/
          regexp: {
            message: 'Please enter a valid URL',
            regexp: '[^\s]+[a-zA-Z ]*[^\s]+',
          }
        }
      });
    });
    //console.log('edit completed');
    return false;
  });



  //cancel edit
  $(document).on('click', '.list-edit-cancel', function() {
    var slider = $(this).parents('tr').attr("sid");
    $('tr.slider' + slider).each(function() {
      $(this).find('.form-fields').hide();
      $(this).find('.display-only').show();
    });
  });


  function reloadList() {
    $('#loader-spin').show();
    $.ajax({
      url: ajax_url,
      data: {
        ajax: true,
        action: 'getList'
      },
      method: 'post',
      success: function(html) {
        $('#slider_form_with_list').replaceWith(html);
        $('.form-fields').hide();
        $('#loader-spin').hide();
      }
    });
  }

  //remove slider
  $(document).on('click', '.remove-slider', function() {
    var slider = $(this).parents('tr').attr("sid");
    //console.log('remove slider ' + slider);
    // before ajax
    $('#loader-spin').show();
    var data = {
      ajax: true,
      action: 'Remove',
      id_slider: slider,
    };

    $.ajax({
      url: ajax_url,
      data: data,
      method: 'post',
      success: function() {
        reloadList();
        //console.log('success remove ajax');
        scrollTo('#slider_form_with_list');
      }
    });
  });

  //Submit on save edited slider
  $(document).on('click', '.list-edit-submit', function() {
    var slider = $(this).parents('tr').attr("sid");
    $this = $("#slider" + slider);
    //console.log('save slider ' + slider);
    var validatorerrorscount = chekvalidatorstate("#slider" + slider);
    if (validatorerrorscount > 0) {
      $('#no_valid_slide').show(300);
      scrollTo('#no_valid_slide');
      return false;
    }

    var d_categories = $("#d_categories_" + slider + '_hidden').val();
    var id_sections = $this.find('.id_sections').val();
    var date = $this.find('.datetimepicker').val();
    var status = +$this.find('.edit_status').is(':checked');

    //var nodesearch = $('tr.slider' + slider).eq(2);
    var maincolor = $this.find('.edit_maincolor').val();
    var color1 = $this.find('.edit_color1').val();
    var color2 = $this.find('.edit_color2').val();
    var color3 = $this.find('.edit_color3').val();
    var color4 = $this.find('.edit_color4').val();
    var extra_info = +$this.find('.edit_extra_info').find(":selected").val();
    var blurb = +$this.find('.edit_description').is(':checked');
    //console.log(nodesearch);

    //var colorsearch = $('tr.slider' + slider).eq(3);
    var color5 = $this.find('.edit_color5').val();
    var color6 = $this.find('.edit_color6').val();
    var color7 = $this.find('.edit_color7').val();
    var color8 = $this.find('.edit_color8').val();
    var slideshow = +$this.find('.edit_slideshow').is(':checked');
    var offslider = $this.find('.edit_offslider').find(":selected").val();
    var margin = $this.find('.edit_margin').val();
    var rounded = +$this.find('.edit_rounded').is(':checked');
    //console.log($this.find('.edit_rounded'));

    // build ajax data
    var data = {
      ajax: true,
      action: 'Update',
      id_sections: id_sections,
      d_categories: d_categories,
      date: date,
      status: status,
      maincolor: maincolor,
      color1: color1,
      color2: color2,
      color3: color3,
      color4: color4,
      color5: color5,
      color6: color6,
      color7: color7,
      color8: color8,
      extra_info: extra_info,
      blurb: blurb,
      rounded: rounded,
      slideshow: slideshow,
      offslider: offslider,
      margin: margin,
      id_slider: slider,
    };
    //console.log('d_categories' + d_categories);
    $(this).parents('tr').find('.edit-btntext').each(function() {
      data[$(this).attr('name')] = $(this).val();
    });

    $(this).parents('tr').find('.edit-maintext').each(function() {
      data[$(this).attr('name')] = $(this).val();
    });

    $(this).parents('tr').find('.edit-btnlink').each(function() {
      data[$(this).attr('name')] = $(this).val();
    });

    //console.log(data);

    // before ajax
    $('#loader-spin').show();
    $.ajax({
      url: ajax_url,
      data: data,
      method: 'post',
      success: function() {
        reloadList();
        //console.log('success ajax');
        scrollTo('#slider_form_with_list');
      }
    });
    return false;
  });





  // SUBMIT NEW slider
  $(document).on('click', '#submit_slider', {}, function() {
    //console.log('add started');
    //$(this)
    $('.no-category-alert').hide();

    var validatorerrorscount = chekvalidatorstate("#new_slider_form");
    if (validatorerrorscount > 0) {
      $('#no_valid').show(300);
      scrollTo('#slider_form_with_list');
      return false;
    }

    var products = [];
    $('#ajax_products_list > li').each(function() {
      products.push($(this).data('id-product'));
    });
    var ids_categories = [];
    var $tree = $('#get-categories-tree');
    $tree.find('[name="categoryBox[]"]').each(function() {
      if ($(this).is(':checked')) {
        ids_categories.push($(this).val());
      }
    });
    //ids_categories.toString();
    var date = $('#add_date').val();

    // show "no selected" error
    if (!products.length) {
      $('#no_products_selected').show(300);
      //console.log('err0');
      scrollTo('#slider_form_with_list');
      return false;
    }
    if (!ids_categories.length) {
      $('#no_categories_selected').show(300);
      //console.log('err1');
      scrollTo('#slider_form_with_list');
      return false;
    }
    var status_new = +$('#status_new').is(':checked');
    var maincolor_new = $('#maincolor_new').val();
    var color1_new = $('#color1_new').val();
    var color2_new = $('#color2_new').val();
    var color3_new = $('#color3_new').val();
    var color4_new = $('#color4_new').val();
    var color5_new = $('#color5_new').val();
    var color6_new = $('#color6_new').val();
    var color7_new = $('#color7_new').val();
    var color8_new = $('#color8_new').val();
    var blurb_new = +$('#blurb_new').is(':checked');
    var rounded_new = +$('#rounded_new').is(':checked');
    var offslider_new = +$('#offslider_new').find(":selected").val();
    var extra_info_new = +$('#extra_info_new').find(":selected").val();
    var slideshow_new = +$('#slideshow_new').is(':checked');
    var margin_new = $('#margin_new').val();

    // adding "multilang" to data
    /*$('.add_btntext_new').each(function() {
      data[$(this).attr('name')] = $(this).val();
    });*/


    // build ajax data
    var data = {
      ajax: true,
      action: 'Add',
      ids_categories: ids_categories.toString(),
      products: products.toString(),
      date: date,
      status: status_new,
      maincolor: maincolor_new,
      color1: color1_new,
      color2: color2_new,
      color3: color3_new,
      color4: color4_new,
      color5: color5_new,
      color6: color6_new,
      color7: color7_new,
      color8: color8_new,
      extra_info: extra_info_new,
      blurb: blurb_new,
      rounded: rounded_new,
      slideshow: slideshow_new,
      offslider: offslider_new,
      margin: margin_new,
    };

    $('#slider_form_with_list').find('.add_btntext_new').each(function() {
      data[$(this).attr('name')] = $(this).val();
    });

    $('#slider_form_with_list').find('.add_maintext_new').each(function() {
      data[$(this).attr('name')] = $(this).val();
    });

    $('#slider_form_with_list').find('.add_btnlink_new').each(function() {
      data[$(this).attr('name')] = $(this).val();
    });

    //console.log(data);
    // before ajax
    $('#loader-spin').show();

    $.ajax({
      url: ajax_url,
      data: data,
      method: 'post',
      success: function() {
        // reset inputs
        //console.log('add ajax success');
        $('#add_date').val('');
        $('#get-categories-tree .tree-selected').removeClass('tree-selected');
        $('#get-categories-tree').find('[name="categoryBox[]"]').prop('checked', false);
        reloadList();
        scrollTo('#slider_form_with_list');
      }
    });

    return false;
  });


  //rebind fields
  $(document).on("focus", ".datetimepicker:not(.hasDatepicker)", function(event) {
    $(this).datetimepicker({
      //dateFormat: "mm/dd/yy"
    });
  });

  //Products autocomplete search and rebind new slider form
  $(document).on('focus', '.ajax_products:not(.ac_input)', function(e) {
    $(this).autocomplete(ajax_url + '&ajax=1&action=getProducts', {
      minChars: 1,
      autoFill: true,
      max: 20,
      matchContains: true,
      mustMatch: false,
      scroll: false,
      cacheLength: 0,
      formatItem: function(item) {
        return item[1] + ' - ' + item[0];
      }
    }).result(prepareProductsData);
  });

  // format received products search result
  prepareProductsData = function(event, data, formatted) {
    if (data == null)
      return false;
    //console.log(event);
    //console.log(data);
    var productId = data[1];
    var productName = data[0];
    if (event.currentTarget.id == 'ajax_products') {
      $('#ajax_products').val('');
      $('#ajax_products_list').append('<li data-id-product="' + productId + '"><button type="button" class="remove_ajax_products btn btn-default" data-id-product="' + productId + '" data-slider="0"><i class="icon-remove text-danger"></i></button> ' + productName + '</li>')
      /*var ids = [];
      $('#ajax_products_list > li').each(function() {
        ids.push($(this).data('id-product'));
      });
      */
      $('#ajax_products').val('');
    }
  };

  // Remove products
  $(document).on('click', '.remove_ajax_products', function() {
    var $this = $(this);
    var li = $(this).parents('li');
    var ident = $(this).attr("data-slider");
    //console.log(ident);
    $(this).parents('li').fadeOut(300, function() {
      var id_product = $this.data('id-product');
      li.remove();
    });
  });





  $(document).on('focus', '.ajax_input:not(.id_sections)', function(e) {
    $(this).autocomplete(ajax_url + '&ajax=1&action=getCategories', {
      minChars: 1,
      autoFill: true,
      max: 20,
      matchContains: true,
      mustMatch: false,
      scroll: false,
      cacheLength: 0,
      formatItem: function(item) {
        return item[1] + ' - ' + item[0];
      }
    }).result(prepareAjaxData);
  });

  $(document).on('focus', '.ajax_input:not(.d_categories)', function(e) {
    $(this).autocomplete(ajax_url + '&ajax=1&action=getProducts', {
      minChars: 1,
      autoFill: true,
      max: 20,
      matchContains: true,
      mustMatch: false,
      scroll: false,
      cacheLength: 0,
      formatItem: function(item) {
        return item[1] + ' - ' + item[0];
      }
    }).result(prepareAjaxData);
  });


  prepareAjaxData = function(event, data, formatted) {
    if (data == null)
      return false;
    var productId = data[1];
    var productName = data[0];

    if (event.currentTarget.id) {
      //console.log(event.currentTarget.id);
      $this = $("#" + event.currentTarget.id + '_ajax');
      var dataslider = event.currentTarget.id + '_ajax'; //$this.attr("data-slider");
      //clean ajax input
      $this.find('.ajax_input').val('');
      //save current data to hidden value
      currnetids = $this.find('.ajax_hidden').val();
      currnetidsarray = currnetids.split(',');
      updated = currnetids + ',' + productId;
      unarr = $.unique(updated.split(','));
      //reset list
      $this.find('.ajax_list').html('');
      var i;
      for (i = 0; i < unarr.length; ++i) {
        $this.find('.ajax_list').append('<li data-id-product="' + unarr[i] + '"><button type="button" class="remove_ajax btn btn-default" data-id-product="' + unarr[i] + '" data-slider="' + dataslider + '"><i class="icon-remove text-danger"></i></button> ' + unarr[i] + '</li>');
      }
      //update hidden with selected and unique
      $this.find('.ajax_hidden').val(unarr.join(","));
    }
  };

  // Remove autocomplete added list item
  $(document).on('click', '.remove_ajax', function() {
    var $this = $(this);
    var li = $(this).parents('li');
    var ident = $(this).attr("data-slider");
    //console.log(ident);
    $(this).parents('li').fadeOut(300, function() {
      var id_product = $this.data('id-product');
      li.remove();
      getEl = $('#' + ident).find('.ajax_list'); //'#ajax_list_'+ident;
      //console.log(getEl);
      hidentoUpdate = $('#' + ident).find('input:hidden'); //'#d_categories_'+ident+'_hidden'
      UpdateHidden(getEl, hidentoUpdate);
    });
  });









  //END autocomplete

  //close new slider form
  $(document).on('click', '.close_new_slider_form', function() {
    $('.new_slider_form').hide();
    $('#show-form-new').show();
    scrollTo('#slider_form_with_list');
    return false;
  });

  //new slider button and form
  $(document).on('click', '#show-form-new', function() {
    $('.new_slider_form').show();

    //form validator
    $('#slider_form_with_list').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          maincolor_new: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color1_new: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color2_new: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color3_new: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color4_new: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color5_new: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color6_new: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color7_new: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          color8_new: {
            validators: {
              hexColor: {},
              notEmpty: {}
            }
          },
          margin_new: {
            validators: {
              numeric: {},
              notEmpty: {}
            }
          }
        }
      })
      .on('success.form.bv', function(e) {

      });
    var btntextArray = $('#slider_form_with_list').find('input.add_btntext_new');
    var btntextNames = ["0"];
    $.each(btntextArray, function(index, value) {
      btntextNames[index] = btntextArray[index]['name'];
    });

    var maintextArray = $('#slider_form_with_list').find('input.add_maintext_new');
    var maintextNames = ["0"];
    $.each(maintextArray, function(index, value) {
      maintextNames[index] = maintextArray[index]['name'];
    });
    var btnlinkArray = $('#slider_form_with_list').find('input.add_btnlink_new');
    var btnlinkNames = ["0"];
    $.each(btnlinkArray, function(index, value) {
      btnlinkNames[index] = btnlinkArray[index]['name'];
    });

    $.each(btntextNames, function(index, value) {
      $('#slider_form_with_list').bootstrapValidator('addField', btntextNames[index], {
        validators: {
          stringLength: {
            max: 20,
          }
        }
      });

      $('#slider_form_with_list').bootstrapValidator('addField', maintextNames[index], {
        validators: {
          stringLength: {
            max: 20,
          }
        }
      });

      $('#slider_form_with_list').bootstrapValidator('addField', btnlinkNames[index], {
        validators: {
          regexp: {
            message: 'Please enter a valid URL',
            regexp: '[^\s]+[a-zA-Z ]*[^\s]+',
            //'^((http(s){0,1}\:\/\/){0,1}([a-z|A-Z|0-9|\.|\-|_]){4,255}(\:\d{1,5}){0,1}){0,1}((\/([a-z|A-Z|0-9|\.|\-|_]|\%[A-F|a-f|0-9]{2}){1,255}){1,255}\/{0,1}){0,1}(|\/{0,1}\?[a-z|A-Z|0-9|\.|\-|_]{1,255}\=([a-z|A-Z|0-9|\.|\-|_|\+|\:]|\%[A-F|a-f|0-9]{2}|\&[a-z|A-Z]{2,12}\;){0,255}){0,1}((\&[a-z|A-Z|0-9|\.|\-|_]{1,255}\=([a-z|A-Z|0-9|\.|\-|_|\+|\:]|\%[A-F|a-f|0-9]{2}|\&[a-z|A-Z]{2,12}\;){0,255}){0,255})(\/{0,1}|\#([a-z|A-Z|0-9|\.|\-|_|\+|\:]|\%[A-F|a-f|0-9]{2}|\&[a-z|A-Z]{2,12}\;){0,255})$'
          }
        }
      });

    });
    //form validator end
    $('#show-form-new').hide();

  });





});