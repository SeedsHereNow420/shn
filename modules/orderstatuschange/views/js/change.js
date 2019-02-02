$(document).ready(function(){
	$(document).on('change', '.changeorderstatus', function(){
		$this = $(this);
		var id_order = $(this).attr('ps_id_order');
		var id_current_selected = $(this).attr('ps_current_state');
		var new_status = $("option:selected", this).val();
		if (id_current_selected != new_status) {
			$.ajax({
				type : 'POST',
				async : false,
				url : adminorder,
				data : {
					id_order : id_order,
					new_status : new_status,
					ajax: true,
					action: 'changeOrderStatus',
				},
				success : function(data){
					data = JSON.parse(data);
					if (data.msg == 'ok') {
						$this.css({
							'background-color' : data.color,
							'border-color' : data.color
						});
						showSuccessMessage(success);
					} else if (data == 2) {
						showErrorMessage(invalid);
					} else if (data == 3) {
						showErrorMessage(error);
					} else if (data == 4) {
						showErrorMessage(already);
					} else if (data == 5) {
						showErrorMessage(noPermission);
					}
				}
			});
		}
	});
});