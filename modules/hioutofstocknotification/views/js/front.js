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
	if (psv >= 1.7) {
		prestashop.on('updatedProduct', function (event) {
			$("[name=product_combination_id]").val(event.id_product_attribute);
			 $.ajax({
				type: "POST",
				dataType: "json",
				url:oosn_front_controller_url,
				data:{
					action : "get_product_combination_quantity",
					ajax : true,
					secure_key : oosn_secure_key,
					id_product : id_product,
					combination_id : event.id_product_attribute,
				},
				success: function(response){
					$(".hi-oosn-success").addClass("hide");
					if(response.quantity <= 0){
						$(".oosn-popup, #hi-oosn-block").removeClass("hide");
					} else {
						$(".oosn-popup, #hi-oosn-block").addClass("hide");
					}
				}
			});
		});
	} else {
		if(quantity <= 0){
			$(".oosn-popup, #hi-oosn-block").removeClass("hide");
		}
		if(typeof combinations != 'undefined' && oosn_stock_managment){
			function hi_findCombination(){
				setTimeout(function(){
					var choice = [];
					var radio_inputs = parseInt($('#attributes .checked > input[type=radio]').length);
					if (radio_inputs) {
						radio_inputs = '#attributes .checked > input[type=radio]';
					} else {
						radio_inputs = '#attributes input[type=radio]:checked';
					}
					$('#attributes select, #attributes input[type=hidden], ' + radio_inputs).each(function(){
						choice.push($(this).val());
					});
					for (var combination = 0; combination < combinations.length; ++combination){
						var combinationMatchForm = true;
						$.each(combinations[combination]['idsAttributes'], function(key, value){
							if (!in_array(value, choice)) {
								combinationMatchForm = false;
							}
						});
						if (combinationMatchForm){
							if (combinations[combination]['quantity'] <= 0) {
								$(".hi-oosn-success").addClass("hide");
								$(".oosn-popup, #hi-oosn-block").removeClass("hide");
								$("[name=product_combination_id]").val(combinations[combination]['idCombination']);
							} else {
								$(".oosn-popup, #hi-oosn-block").addClass("hide");
							}
						}
					}
				}, 100);
			}
			hi_findCombination();
			$(".color_pick, .attribute_radio").click(function(){
				hi_findCombination();
				$(".hi-oosn-success").addClass("hide");
				$(".hi-oosn-invalid-email").addClass("hide");
			});
			$('#attributes select, #attributes input[type=hidden]').change(function(){
				hi_findCombination();
				$(".hi-oosn-success").addClass("hide");
				$(".hi-oosn-invalid-email").addClass("hide");
			});
		}
	}

	$(document).on('click', '#submit_subscribe', function(){
		$.ajax({
			type: "POST",
			url:oosn_front_controller_url,
			dataType: "json",
			data:{
				action : "oosn_email",
				ajax: true,
				email : $("[name=hi_stock_email]").val(),
				secure_key : oosn_secure_key,
				combination_id : $("[name=product_combination_id]").val(),
				id_product : id_product,
			},
			beforeSend: function(){
				$(".oosn-button span").addClass('hide');
				$(".oosn-button img").removeClass('hide');
			},
			success: function(response){
				$(".oosn-button span").removeClass('hide');
				$(".oosn-button img").addClass('hide');
				if(response.hasError){
					if(response.error){
						$(".hi-oosn-invalid-email").removeClass("hide");
						$(".hi-oosn-invalid-email span").html(response.error);
					}else
						$(".hi-oosn-invalid-email").addClass("hide");
				}else{
					$(".hi-oosn-success").removeClass("hide");
					$(".oosn-popup, #hi-oosn-block").addClass("hide");
					if (oosn_position == 'popup') {
						setTimeout(function(){
							$.fancybox.close();
						}, 2000);
					}
					
				}
			}
		});
		return false;
	});
	$("[name=hi_stock_email], .hi-oosn-invalid-email").click(function(){
		$(".hi-oosn-invalid-email").addClass('hide');
	});

	$(".oosn-popup").fancybox({
		width: 350,
		height: 150,
		closeBtn: false,
		maxHeight : 600,
		fitToView : true,
		autoSize : false,
		closeClick : false,
		autoscale : true,
		padding: 0
	});
});