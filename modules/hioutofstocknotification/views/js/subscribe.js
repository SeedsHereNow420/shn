/**
* 2013 - 2017 HiPresta
*
* MODULE Out Of Stock Notification
*
* @version   1.2.2
* @author    HiPresta <suren.mikaelyan@gmail.com>
* @link      http://www.hipresta.com
* @copyright HiPresta 2015
* @license   Addons PrestaShop license limitation
*
* NOTICE OF LICENSE
*
* Don't use this module on several shops. The license provided by PrestaShop Addons 
* for all its modules is valid only once for a single shop.
*/

$(document).ready(function(){
	$('.delete_subscribe_product').click(function(){
		var id = $(this).parent().parent().find("[name=id_subscribe]").val();
		$.ajax({
			type:'POST',
			url:oosn_front_controller_url,
			data:{
				action: "delete_subscribe",
				id: id,
				secure_key: oosn_secure_key,
				ajax: true
			},
			success: function(response){
				$(".subscribe_item_"+id).remove();
			}
		});
		return false;
	});
});