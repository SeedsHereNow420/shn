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
*  @author    ST-themes
*  @copyright 2007-2016 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*  
*  
*/
jQuery(function($){
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
    $('.st_delete_image').click(function(){
        var self = $(this);
        var id = self.data('id')
        $.getJSON(currentIndex+'&token='+token+'&configure=stinstagram&act=delete_image&ident='+id+'&ts='+new Date().getTime(),
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
    
    $('#st_verify_user').click(function(){
        $('#message_box').removeClass().html('');
        var self = $(this);
        var user = $('#user_name_verify').val();
        $.getJSON(currentIndex+'&token='+token+'&configure=stinstagram&act=verify_user&user='+user+'&ts='+new Date().getTime(),
            function(json){
                if(json.error) {
                    $('#message_box').addClass('alert alert-danger').html(json.message);
                }
                else {
                    $('#user_id').val(json.id);
                    $('#user_name').val(user);
                    $('#message_box').addClass('alert alert-success').html(json.message);
                }
            }
        ); 
        return false;
    });
});