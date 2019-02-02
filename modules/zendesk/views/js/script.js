/**
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*  @author    Presta-Module
*  @author    202 ecommerce
*  @copyright 2009-2016 Presta-Module
*  @copyright 2017-2018 202 ecommerce
*  @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
*/
$(document).ready(function() {
  // switch between Features / FAQs on the start page
  $('ul.switcher.nav').on('click', 'a', function(e) {
    e.preventDefault();

    var i = $(this).parent().index();
    $('div.switcher_content')
      .hide()
      .eq(i).fadeIn();

    $(this).parent().siblings('.active').removeClass('active').contents().wrapAll('<a href="#"/>');
    $(this).parent().addClass('active');
    $(this).contents().unwrap();
  });

  // set the number of agents on the registration page
  $('li#num-seats-row select').on('change', function() {
    $('span#select-agents').text($(this).val());
  });

  // set the account language on the registration page
  $('select#language').on('change', function() {
    $('span#selected-lang a').text($(this).find('option:selected').text());
  });

  $('#btn-submitSubDomainExist').on('click', function(e) {
    e.preventDefault();

    $('label.error').addClass('hide');
    $('.domain.error').removeClass('error');
    $('#module-zendesk-configuration').addClass('loading');

    subdomain = $('#subdomain').val();

    if (subdomain.length > 0) {
      $('.domain').addClass('error');
      $('label.suggested').css('display', 'block');
      $.ajax( {
          type : 'GET',
          url : window.location + '&action=verifySubdomainAvailability' + '&subdomain=' + subdomain, 
          success : function(data) {
              json = $.parseJSON(data);
              if (json.success) { // If success, it's that it's available. Need to create it.
                showErrorLabel($('#subdomain'), '<span></span>' + json.msg);
                $('label.suggested').hide();
              } else {
                $('#submitSubDomainExist').submit();
              }
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
              showErrorLabel($('#subdomain'), textStatus);
              $('label.suggested').hide();
          }
      });
    } else {
      showErrorLabel($('#subdomain'));
    }
  });

  $('#btnCreateTrial').on('click', function(e)
  {
    e.preventDefault();

    var doContinue = true;

    $('label.error').addClass('hide');
    $('.domain.error').removeClass('error');

    var owner_name = $('#name').val();
    var company_name = $('#company').val();
    var subdomain = $('#subdomain').val();
    var help_desk_size = $('#expected_num_seats option:selected').val();
    var language = $('#language option:selected').val();
    var address_phone = $('#shop_phone').val();
    var owner_email = $('#owner_email').val();

    if (owner_name.length <= 0) {
      showErrorLabel($('#name'));
      $('#name').parent().addClass('error');
      doContinue = false;
    }

    if (company_name.length <= 0) {
      showErrorLabel($('#company'));
      $('#company').parent().addClass('error');
      doContinue = false;
    }

    if (subdomain.length <= 0) {
      showErrorLabel($('#subdomain'));
      $('#subdomain').parent().addClass('error');
      doContinue = false;
    }

    if (address_phone.length <= 0) {
      showErrorLabel($('#shop_phone'));
      $('#shop_phone').parent().addClass('error');
      doContinue = false;
    }

    if (owner_email.length <= 0) {
      showErrorLabel($('#owner_email'));
      $('#owner_email').parent().addClass('error');
      doContinue = false;
    }

    if (help_desk_size == '-') {
      showErrorLabel($('#expected_num_seats'));
      $('#expected_num_seats').parent().addClass('error');
      doContinue = false;
    }

    if (doContinue) {
      $('#module-zendesk-configuration').addClass('loading');

      $('.domain').addClass('error');
      $('label.suggested').css('display', 'block');
      $.ajax( {
          type : 'GET',
          url : window.location + '&action=verifySubdomainAvailability' + '&subdomain=' + subdomain, 
          success : function(data) {
              json = $.parseJSON(data);
              if (json.success) {
                $.ajax( {
                    type : 'GET',
                    url : window.location + '&action=createTrialAccount' + '&subdomain=' + subdomain + '&owner_name=' + owner_name + '&owner_email=' + owner_email + '&address_phone=' + address_phone + '&company_name=' + company_name + '&help_desk_size=' + help_desk_size + '&language=' + language, 
                    success : function(data) {
                        json = $.parseJSON(data);
                        if (json.success) {
                          location.href = $('#btnCreateTrial').attr('href');
                        } else {                  
                          showErrorLabel($('#subdomain'), '<span></span>' + json.msg);
                          $('label.suggested').hide();
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                      showErrorLabel($('#subdomain'), '<span></span>' + textStatus);
                      $('label.suggested').hide();
                    }
                });
              } else {
                showErrorLabel($('#subdomain'), '<span></span>' + json.msg);
                $('label.suggested').hide();
              }
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            showErrorLabel($('#subdomain'), '<span></span>' + textStatus);
            $('label.suggested').hide();
          }
      });
    }
  });

  function showErrorLabel(input, textReplacement)
  {
    var element = input.parent().find("label.error");
    var g = "1" === element.css("opacity") ? false : true;
    if (typeof(textReplacement) !== undefined) {
      element.html(textReplacement);
    }
    element.css({
      display : "block",
      width : "100%",
      opacity : g === false ? 1 : 0,
      "margin-top" : "-48px"
    }).animate({
      opacity : 1,
      "margin-top" : "-5px"
    }, 300);
    input.removeClass("set");
    input.parent().addClass("error");

    element.removeClass('hide');

    $('#module-zendesk-configuration').removeClass('loading');
  }
});