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
        var id_lang = self.data('lang');
        var id = self.data('id');
        $.getJSON(currentIndex+'&token='+token+'&configure=ststickers&id_st_sticker='+id+'&id_lang='+id_lang+'&act=delete_image&ts='+new Date().getTime(),
            function(json){
                if(json.r) {
                    self.parent().siblings('.help-block').find('img').remove();
                    self.parent().remove();
                }
                else
                    alert('Error');
            }
        ); 
        return false;
    });
    
    $('input[name=location]:checked').each(function(){
        checkLocationInto($(this).val());
    });
    $('input[name=location]').click(function(){
        checkLocationInto($(this).val());
    });
    
    $('#products').autocomplete('ajax_products_list.php?disableCombination=true', {
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
		$('#curr_products').append('<li>'+name+'<a href="javascript:;" class="del_product"><img src="../img/admin/delete.gif" /></a><input type="hidden" name="id_product[]" value="'+id+'" /></li>');
        
        $('#products').setOptions({
        	extraParams: {
        		excludeIds : getProductExcIds()
        	}
	    });
    });
    $('#curr_products').delegate('.del_product', 'click', function(){
        $(this).closest('li').remove();
        $('#products').setOptions({
        	extraParams: {
        		excludeIds : getProductExcIds()
        	}
	    });
    });
});

var getProductExcIds = function()
{
    var excludeIds = '';
    $(':hidden[name="id_product[]"]').each(function(){
        excludeIds += $(this).val()+',';
    });
    return excludeIds.substr(0, excludeIds.length-1);  
}

function checkLocationInto(type)
{
    type = parseInt(type);
    var items = {
        'products' : [1], 
        'id_category' : [2], 
        'id_manufacturer' : [3]
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
