/* jQuery(document).ajaxComplete(function(event,response,xhr){
  jQuery('.threeds_loading').hide();
  jQuery('#place_order').prop('disabled', false);

  try {
    jQuery('#paycertify_3ds_iframe').remove();
    jQuery.parseJSON( response.responseText );
  }
  catch (err) {
    var div = jQuery('<div id="paycertify_3ds_iframe" />').append(response.responseText);
    jQuery('.woocommerce-error').remove();
    jQuery('div.payment_method_paycertify').append(div);

    jQuery('#place_order').prop('disabled', true);
    jQuery('.threeds_loading').show();
  }
  
  jQuery('#exp_date').payment('cardExpiryVal');
jQuery('#cvv').payment('formatCardCVC');
}); */
//jQuery('#cardnum').payment('formatCardNumber');
// ,placeholder: "____/____/____/____"
//var result = $('#cardnum').validateCreditCard({ accept: ['visa', 'mastercard'] })

jQuery(document).ready(function(){ 
//update
if($('#paycertify_proxyForm').length){
	var pr=$('#pc_cardnum').closest('div'),pc_cls='inv';
	$('#pc_cardnum').mask('0000 0000 0000 000Z ZZZ', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});
	$('#pc_exp_date').mask('X0/00', {translation:  {'X': {pattern: /[0-1]/}},placeholder: "__/__"});
	$('#pc_cvv').mask('000Z', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});
$('#pc_cardnum').validateCreditCard(function(result){
	pc_cls='';
	if(result.card_type ){ 
        /*    + '\nLength validation: ' + result.length_valid
          + '\nLuhn validation: ' + result.luhn_valid); */
		  if(typeof result.card_type.name!== 'undefined' && result.card_type.name )
			  pc_cls=result.card_type.name;
		  if(result.valid)
			   pc_cls+=' valid';
	}
			pr.attr('class',pc_cls);
    });
	
	var validator = $('#paycertify_proxyForm').validate({
    rules: {
      pc_cardholder_name: {
        required: true
      },pc_cardnum: {
		 normalizer: function( vali ) {
        return  vali.replace(/\s+/g, '');
      }, 
        required: true,
		creditcardtypes : { param : {visa:true,mastercard:true} } 
      },  pc_exp_date: {
        required: true
      },pc_cvv: {
        required: true
      }
    },
    messages: {
	      pc_cardholder_name: {
        required: 'Please enter name on your card'
      }	,pc_cardnum: {
        required: 'Please enter card number'
      }	, pc_exp_date: {
        required: 'Please enter expiry date'
      }	,pc_cvv: {
        required: 'Please enter cvv number'
      }	,
		
	},
    errorElement : 'div',
    errorLabelContainer: '#errlbctn'
  });
}

});
