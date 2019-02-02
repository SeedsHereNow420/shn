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
     $('.st_delete_image').click(function(){
        var self = $(this);
        var field = self.data('field');
        $.getJSON(currentIndex+'&token='+token+'&configure=stblogrelatedarticles&field='+field+'&act=delete_image&ts='+new Date().getTime(),
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
    
    if (typeof(m_token) != 'undefined') {
        $('#relatedarticles').autocomplete('index.php?controller=AdminModules&configure=stblogrelatedarticles&act=gsbra&ajax=1&token='+m_token+'&id_st_blog='+$('#id_st_blog').val(), {
            minChars: 1,
            autoFill: true,
            max:200,
            matchContains: true,
            mustMatch:true,
            scroll:true,
            cacheLength:0,
            extraParams:{ excludeIds:getBrandExcIds()},
            formatItem: function(item) {
                return item[1]+' - '+item[0];
            }
        }).result(function(event, data, formatted) {
    		if (data == null)
    			return false;
    		var id = data[1];
    		var name = data[0];        
    		$('#curr_relatedarticles').append('<li>'+name+'<a href="javascript:;" class="del_relatedarticles"><img src="../img/admin/delete.gif" /></a><input type="hidden" name="id_relatedarticles[]" value="'+id+'" /></li>');
            
            $('#relatedarticles').setOptions({
            	extraParams: {
            		excludeIds : getBrandExcIds()
            	}
    	    });
        });
        $('#curr_relatedarticles').delegate('.del_relatedarticles', 'click', function(){
            $(this).closest('li').remove();
            $('#relatedarticles').setOptions({
            	extraParams: {
            		excludeIds : getBrandExcIds()
            	}
    	    });
        });    
    }
});
var getBrandExcIds = function()
{
    var excludeIds = '';
    $(':hidden[name="id_relatedarticles[]"]').each(function(){
        excludeIds += $(this).val()+',';
    });
    return excludeIds.substr(0, excludeIds.length-1);  
}