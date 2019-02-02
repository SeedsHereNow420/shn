var rf_cl_btn=1;
jQuery(document).ready(function(){ 
$(document).on('click','.refund-btn',function(){
	var di=$(this),pr=$('#refnd-bdrop'),order_id=di.attr('data-id-order'),order_amnt=di.attr('data-amnt-order');
	rf_cl_btn=di;
	$('#rfnd-amnt').attr('max',order_amnt);
	$('#rfn-b-v').html(order_amnt);
	$('body').css('overflow','hidden');
	$('.act-rfnd').attr('data-id-order',order_id);
	$('#refnd-bdrop').slideDown();
});
$(document).on('click','.rfnd-cls',function(){
var di=$(this),pr=$('#refnd-bdrop');	
$('#rfnd-amnt').attr('max','');
$('#rfn-b-v').html('');
$('.act-rfnd').removeAttr('data-id-order');
$('body').css('overflow','initial');
	$('#refnd-bdrop').slideUp();
});
$(document).on('click','input[name=fl-refnd]',function(){
	var di=$(this),order_id=di.attr('data-id-order');
	if(confirm('Are you sure you want to refund this order?')){	
	$.post(baseDir+ 'module/prismpay/ajax.html',{ajaction:'refund_order',type:'full',order_id:order_id},function(dat){
		if(dat.success==1){
		alert(dat.msg);
		$('.rfnd-cls').trigger('click');
		rf_cl_btn.closest('.status-ord-acts').find('select').val(7).trigger('change');
		rf_cl_btn.slideUp(function(){ $(this).remove(); });
		}else{
		alert(dat.error);
		}
	},'json');
	}
});
$(document).on('click','input[name=pr-refnd]',function(){
	alert('Partial refund will be soon available');
	return;
	var di=$(this),order_id=di.attr('data-id-order'),minn=$('#rfnd-amnt').attr('min'),maxx=$('#rfnd-amnt').attr('max'),amnt=$('#rfnd-amnt').val();
	if(amnt && parseFloat(amnt)>=parseFloat(minn) &&  parseFloat(amnt)<=parseFloat(maxx) ){
	if(confirm('Are you sure you want to refund this order partially?')){	
	$.post(baseDir+ 'module/prismpay/ajax.html',{ajaction:'refund_order',type:'partial',amount:parseFloat(amnt),order_id:order_id},function(dat){
		if(dat.success==1){
		alert(dat.msg);
		$('.rfnd-cls').trigger('click');
		rf_cl_btn.closest('.status-ord-acts').find('select').val(7).trigger('change');
		rf_cl_btn.slideUp(function(){ $(this).remove(); });
		}else{
		alert(dat.error);
		}
	},'json');
	}
	}else{
		alert('Amount entered is invalid');
	}
});

});
