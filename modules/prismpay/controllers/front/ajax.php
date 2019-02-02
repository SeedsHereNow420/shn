<?php
/*
* prismpay
*/

class PrismpayAjaxModuleFrontController extends ModuleFrontController
{
public function initContent()
{
    $response = array('status' => false,'success'=>0);

  //  require_once _PS_MODULE_DIR_.'prismpay/ajax.php';

    $module = Module::getInstanceByName('prismpay');

    if (Tools::isSubmit('ajaction')) {
        $context = Context::getContext();

        $cart = $context->cart;

        switch (Tools::getValue('ajaction')) {

            case 'refund_order':
			$order_id=Tools::getValue('order_id');
			$type=Tools::getValue('type');
			
			$order = new Order((int)$order_id);
			
               // $response = array('status' => true,'id'=>$order_id);
			 $orderpayments=  $order->getOrderPayments();
	/* 		 echo "<pre>";
			 print_r($orderpayments);
			  echo "</pre>";
			 exit(); */
			/*  echo "<pre>";
			 print_r($order);
			  echo "</pre>";
			 exit(); */
			$tx_id=$orderpayments[0]->transaction_id;
			if($type=='partial')
			$amount_paid=(float)Tools::getValue('amount');
			else
			$amount_paid=$order->total_paid;
		/* echo $tx_id;
		exit(); */
	$demo=false;
	
	if($demo==true){
		$wsdl="https://test.prismpay.com/api/api.asmx?WSDL";
		$p_login="SeedsHereNowTestUser";
		$p_pass="yg%A7hDwg*aE";
		$p_s_username="SeedsHereNowTestSvcUser";
		$p_s_pass="TKg#UnLQam39";
		$mcs_account_id=300167;
	}else{
		$wsdl="https://prod.affipay.com/api/api.asmx?WSDL";
		$p_login='SeedsHereNowUser';
		$p_pass='iv*GUz4Hw^ft';
		$p_s_username='SeedsHereNowSvcUser';
		$p_s_pass='xD2b$ymI9nI0';		
		$mcs_account_id=805693;
	}			   
			   try {
	$ns= "https://MyCardStorage.com/";
    $client = new SoapClient($wsdl, array(
					'soap_version '          => SOAP_1_1,
					'login'          => $p_login,
					 'password'       => $p_pass,
					 "trace" => 1));
					 
$header_cred=array("UserName"=>$p_login,"Password"=>$p_pass);
$soap_header=new SOAPHeader($ns,"AuthHeader",$header_cred);
 $client->__setSoapHeaders($soap_header); 

$service_security=array('ServiceUserName'=>$p_s_username,
'ServicePassword'=>$p_s_pass,
'MCSAccountID'=>$mcs_account_id,
'SessionID'=>'',
);
$token_data=array(
'ExpirationMonth'=>0,
'ExpirationYear'=>0,
'Token'=>'',
'TokenType'=>0,
'Last4'=>'',
'CardType'=>0,
'NickName'=>'',
'FirstName'=>'',
'LastName'=>'',
'StreetAddress'=>'',
'City'=>'',
'ZipCode'=>'',
'EmailAddress'=>'',
'Phone'=>'',
'DateOfBirth'=>'',
'State'=>'',
'Country'=>'',
);

$transaction_data=array(
'MCSTransactionID'=>$tx_id,
'Amount'=>$amount_paid,
'PurchaseCardTaxAmount'=>0,
'ReferenceNumber'=>'',
'TicketNumber'=>'',
'TransactionID'=>'',
'GatewayID'=>21,
);
$result = $client->CreditCredit_Soap(array('creditCardCredit'=>array('ServiceSecurity'=>$service_security,'TokenData'=>$token_data,'TransactionData'=>$transaction_data)) );

if($result==false){
	$response=array('success'=>0,'error' =>"Couldn\'t connect to payment gateway.Please Try again Later");
}
else{
	$result_arr=json_decode(json_encode($result),true)  ;
	$res_code=$result_arr['CreditCredit_SoapResult']['Result']['ResultCode'];
	$res_detail_orig=$res_detail=$result_arr['CreditCredit_SoapResult']['Result']['ResultDetail'];
	$res_detail=strtolower($res_detail);
	preg_match("~^(\d+)~", $res_detail, $m);
	$result_dtl_code=$m[1];
	if(strpos($res_detail,'error')!==false){
	$response=array('success'=>0,'error' =>"Operation failed.Please try again Later");		
	}
	elseif(strpos($res_detail,'approved')!==false){
	$response=array('success'=>1,'msg' =>"Refunded Successfully");			
	}else{
	$response=array('success'=>0,'error' =>"Operation failed due to unidentified reason.Try again Later");		
	}
}
 // print_r($result_arr);
// echo ("<textarea readonly style='border:none;width: 500px;min-height: 500px;' >".$client->__getLastRequest()."</textarea><br><br>");
// echo ("<textarea readonly style='border:none;width: 500px;min-height: 500px;' >".$client->__getLastRequestHeaders()."</textarea><br><br>");
 // print_r($result_arr);
 // exit();
// echo ("<textarea readonly style='border:none;width: 500px;min-height: 500px;' >".$result_arr."</textarea>");
} catch (SoapFault $fault) {
	$response=array('success'=>0,'error' =>"SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})");
   // trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
}
                break;

            default:
                break;

        }
    }
    // Classic json response
    $json = Tools::jsonEncode($response);
    $this->ajaxDie($json);
    // For displaying like any other use this method to assign and display your template placed in modules/modulename/views/template/front/...
    // $this->context->smarty->assign(array('var1'=>'value1'));
    // $this->setTemplate('template.tpl');
    // For sending a template in ajax use this method
    // $this->context->smarty->fetch('template.tpl');
}
}