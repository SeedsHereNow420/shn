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
     $('#product_name').autocomplete('ajax_products_list.php?excludeIds=', {
        minChars: 1,
        autoFill: true,
        max:20,
        matchContains: true,
        mustMatch:true,
        scroll:false,
        cacheLength:0,
        extraParams:{ excludeIds:getMenuProductsIds()},
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
		var productId = data[1];
		var productName = data[0];
        var inputIdProduct = $('#inputMenuProducts');
        var divProductName = $('#curr_product_name');
        var intProductName = $('#nameMenuProducts');
        divProductName.append('<li class="form-control-static"><button type="button" class="delMenuProduct btn btn-default" name="' + productId + '"><i class="icon-remove text-danger"></i></button>&nbsp;'+ productName +'</li>');
		inputIdProduct.val(inputIdProduct.val() + productId + '-');
        intProductName.val(intProductName.val() + productName + '¤');

        $('#product_name').val('');
        $('#product_name').setOptions({
            extraParams: {excludeIds : getMenuProductsIds()}
        });
    }); 

    $('#curr_product_name').delegate('.delMenuProduct', 'click', function(){
        delMenuProduct($(this).attr('name'));
    });
    
    $('.st_delete_image').click(function(){
        var self = $(this);
        $.getJSON(self.attr('href')+'&act=delete_image&ts='+new Date().getTime(),
            function(json){
                if(json.r)
                {
                    self.closest('.form-group').remove();
                }
            }
        ); 
        return false;
    });
    $('#manufacturers').autocomplete('index.php?controller=AdminModules&configure=stmegamenu&act=gsmm&ajax=1&token='+token, {
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
        
		$('#curr_manufacturers').append('<li>'+name+'<a href="javascript:;" class="del_manufacturer"><img src="../img/admin/delete.gif" /></a><input type="hidden" name="id_manufacturer[]" value="'+id+'" /></li>');
        
        $('#manufacturers').setOptions({
        	extraParams: {
        		excludeIds : getBrandExcIds()
        	}
	    });
        
    });
    $('#curr_manufacturers').delegate('.del_manufacturer', 'click', function(){
        $(this).closest('li').remove();
        $('#manufacturers').setOptions({
        	extraParams: {
        		excludeIds : getBrandExcIds()
        	}
	    });
    });
    
     $('select[name="links"]').change(function(){
        manageLinksStatus();
    });
    
    if ($('select[name="links"]').val())
        $('input[name^="link_"]').val('').attr("disabled",true);
});

var getBrandExcIds = function()
{
    var excludeIds = '';
    $(':hidden[name="id_manufacturer[]"]').each(function(){
        excludeIds += $(this).val()+',';
    });
    return excludeIds.substr(0, excludeIds.length-1);  
}

var getMenuProductsIds = function()
{
    if (!$('#inputMenuProducts').val())
        return '-1';
    return $('#inputMenuProducts').val().replace(/\-/g,',');
}


var delMenuProduct = function(id)
{
    var div = $('#curr_product_name');
    var input = $('#inputMenuProducts');
    var name = $('#nameMenuProducts');

    // Cut hidden fields in array
    var inputCut = input.val().split('-');
    var nameCut = name.val().split('¤');

    if (inputCut.length != nameCut.length)
        return jAlert('Bad size');

    // Reset all hidden fields
    input.val('');
    name.val('');
    div.empty();
    for (i in inputCut)
    {
        // If empty, error, next
        if (!inputCut[i] || !nameCut[i])
            continue ;

        // Add to hidden fields no selected products OR add to select field selected product
        if (inputCut[i] != id)
        {
            input.val(input.val()+inputCut[i]+'-');
            name.val(name.val()+nameCut[i]+'¤');
            div.append('<li class="form-control-static"><button type="button" class="delMenuProduct btn btn-default" name="' + inputCut[i] +'"><i class="icon-remove text-danger"></i></button>&nbsp;' + nameCut[i] + '</li>');
        }
    }

    $('#product_name').setOptions({
        extraParams: {excludeIds : getMenuProductsIds()}
    });
};

var manageLinksStatus = function()
{
    var value = $('select[name="links"]').val();
                        
    if(value=='')
    {
        $('input[name^="link_"]').val('').attr("disabled",false); 
        $('select[name="links"]').find("option[value^='2_']").val('2_0').text('Choose ID product');
    }
    else if(value.substr(0,2) == "2_")
    {
        var id_product = prompt('Set ID product');
		if (id_product == null || id_product == "" || isNaN(id_product))
			return;
		$('select[name="links"]').find("option[value^='2_']").val('2_'+id_product).text('Product ID '+id_product);
        $('input[name^="link_"]').val('').attr("disabled",true); 
    }
    else
    {
        $('input[name^="link_"]').val('').attr("disabled",true); 
        $('select[name="links"]').find("option[value^='2_']").val('2_0').text('Choose ID product');
    }
}
