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
jQuery(function($){
    $('.st_delete_image').click(function(){
        var self = $(this);
        $.getJSON(currentIndex+'&token='+token+'&configure=stnewsletter&act=delete_image&identi='+self.attr('data-id-group')+'&ts='+new Date().getTime(),
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
    $('select#location').change(function(){
        delLocation();
    }); 
    delLocation();   
});

var delLocation = function(){
    $('.panel[id^="fieldset_2"]').hide();
    if($('select#location').val()==4)
        $('.panel[id^="fieldset_2"]').fadeIn();
    return true;
};
