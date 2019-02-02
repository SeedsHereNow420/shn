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
jQuery(function($){
    $('.st_sidebar a').click(function(){
        $(this).parent().addClass('active').siblings().removeClass('active');
        var fieldset_arr = $(this).attr('data-fieldset').split(',');
        var fieldset_dom = $('#st_tab .panel');
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
});
