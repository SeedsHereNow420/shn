{**
* PrestaChamps
*
* NOTICE OF LICENSE
*
* This source file is subject to the Commercial License
* you can"t distribute, modify or sell this code
*
* DISCLAIMER
*
* Do not edit or add to this file
* If you need help please contact leo@prestachamps.com
*
* @author     PrestaChamps <leo@prestachamps.com>
* @copyright  PrestaChamps
*}
{if isset($refund_js_script)}
	<script>
	var ph_no_track_backoffice = true;
	var ph_gtm_id = "{$ph_id_googletagmanager|escape:'htmlall':'UTF-8'}";
	var ph_analytics_uacode = "{$ph_analytics_uacode|escape:'htmlall':'UTF-8'}";
	{literal}
	  function init_ph_googleTagManger(){
	    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer',ph_gtm_id);
	  }
	  function refundByOrderId (OrderId,order_id_customer,order_id_guest_userid) {
	      dataLayer = [];
	      dataLayer.push({
	        "UID_Cookie": order_id_guest_userid,
	        "CID_Cookie": order_id_customer
	      });
	      dataLayer.push({
	        'ecommerce': {
	          'refund': {
	            'actionField': {'id': OrderId}         // Transaction ID. Required for purchases and refunds.
	          }
	        }
	      });
	      //alert(dataLayer);
	      //console.log(dataLayer);
	      init_ph_googleTagManger();
	      //console.log('send, event, Ecommerce, refundByOrderId '+OrderId)
	  }
	  function refundByProduct (OrderId) {
	      dataLayer = [];
	      dataLayer.push({
	        'ecommerce': {
	          'refund': {
	            'actionField': {'id': OrderId}         // Transaction ID. Required for purchases and refunds.
	          }
	        }
	      });
	      init_ph_googleTagManger();
	  }
	{/literal}

	// console.log("|BEGIN|$refund_js_script:{$refund_js_script|escape:'htmlall':'UTF-8'}|END|");
	{$refund_js_script|escape:'htmlall':'UTF-8'}
	// Refund an entire transaction by providing the transaction ID. This example assumes the details
	// of the completed refund are available when the page loads:
	{literal}
	{/literal}{if isset($uid)}{literal}
		dataLayer.push({
			"UID_Cookie": "{/literal}{$uid|escape:'quotes':'UTF-8'}{literal}"
		});
	{/literal}{/if}{literal}	
	dataLayer.push({
	  'ecommerce': {
	    'refund': {
	      'actionField': {'id': "{/literal}{$refund_js_script|escape:'htmlall':'UTF-8'}{literal}"}         // Transaction ID. Required for purchases and refunds.
	    }
	  }
	});
	{/literal}
	</script>
{/if}