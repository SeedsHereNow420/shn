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
jQuery(function($){
    $('.st_delete_image').click(function(){
        var self = $(this);
        $.getJSON(currentIndex+'&token='+token+'&configure=stsocial&act=delete_image&ts='+new Date().getTime(),
            function(json){
                if(json.r)
                {
                    self.parent().parent().find('.help-block img').remove();
                    self.remove();
                }
                else
                    alert('Error');
            }
        ); 
        return false;
    });
});
function fillSocialButton()
{
    if (typeof(json_st_socials) != 'object') {
        return false;
    }
    var v = $('#item').val();
    for(var i in json_st_socials){
        if (json_st_socials[i]['id'] != v) {
            continue;
        } else {
            for(var j in json_st_socials[i]) {
                if (j == 'id' || j == 'name') {
                    continue;
                }
                if (j == 'title') {
                    $('input[name^="'+j+'_"]').val(json_st_socials[i][j]);
                }else if(j == 'icon_class'){
                    $('input[name="'+j+'"][value="'+json_st_socials[i][j]+'"]').attr('checked', true);
                    $("#btn_"+j+" i").removeClass().addClass(json_st_socials[i][j]);
                } else {
                    $('input[name="'+j+'"]').val(json_st_socials[i][j]);    
                }
            }
            break;
        }
    }
}