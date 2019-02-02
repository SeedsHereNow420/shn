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
	var prefix = $("[name=oosn_prefix]").val();
	var psv = $("[name='psv']").val();
	if (psv >= 1.6) {
		var block_name = '.help-block';
	} else {
		var block_name = '.preference_description';
	}
	if ($("[name = 'hooks']").val() == 'custom') {
		$("[name = 'hooks']").parent().find(block_name).show();
	} else {
		$("[name = 'hooks']").parent().find(block_name).hide();
	}
	
	$("[name = 'hooks']").change(function(){
		if ($(this).val() == 'custom')
			$(this).parent().find(block_name).show();
		else
			$(this).parent().find(block_name).hide();
	});

	$("[name=delete_sub_product]").click(function()
		{
			var id_row = $(this).parent().parent().find("[name=hidden_id]").val();
			$.ajax({
				type: "POST",
				url: module_controller_dir+"&ajax=1",
				data:{
					action: "delete_"+prefix,
					id_row: id_row,
					secure_key: secure_key
				},
				success: function(response){
					window.location.reload();
				}
			});
			return false;
		}
	);
	$("[name=delete_sub_emails]").click(function()
		{
			var id_product = $(this).parent().parent().find("[name=hidden_id_product]").val();
			var id_product_attribute = $(this).parent().parent().find("[name=hidden_id_product_attribute]").val();
			if (id_product_attribute != 'undefined') {
				var id_attr = id_product_attribute;
			} else {
				var id_attr = '';
			}
			$.ajax({
				type: "POST",
				url: module_controller_dir+"&ajax=1",
				data:{
					action: "delete_emails",
					id_product: id_product,
					id_attr: id_attr,
					secure_key: secure_key,
				},
				success: function(response){
					window.location.reload();
				}
			});
			return false;
		}
	);

	$("[name=sub_hi_send]").click(function()
		{
			var id_row = $(this).parent().parent().find("[name=hidden_id]").val();
			$.ajax({
				type: "POST",
				url: module_controller_dir+"&ajax=1",
				data:{
					action: "send_email",
					id_row: id_row,
					secure_key: secure_key
				},
				success: function(response){
					window.location.reload();
				}
			});
			return false;
		}
	);

	/*work in Ps 15*/
	$(".email-count").click(function(){
		var index = $(this).attr('data-attr-index');
		$("#email-popup-container-"+index).removeClass("hide");
		$(".email-count").fancybox({
			width: 350,
			height: 'auto',
			closeBtn: true,
			fitToView : true,
			autoSize : false,
			closeClick : false,
			autoscale : true,
			padding: 10
		});
	});
});