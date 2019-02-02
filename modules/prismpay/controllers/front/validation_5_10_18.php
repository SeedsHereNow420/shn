<?php
/*
* prismpay
*/

class PrismpayValidationModuleFrontController extends ModuleFrontController
{
    /**
     * @see FrontController::postProcess()
     */
    public function postProcess()
    {	
/* echo __PS_BASE_URI__;
echo "<br>";	
echo _PS_ROOT_DIR_;	
exit(); */
$debug=false;
$status=0;
$stock_error=false;
$message=$red_url=""; 
$prismpay = Module::getInstanceByName('prismpay');
$error=$prismpay->displayError($this->l("There was error processing payment: Invalid Response.\n You can return to Checkout page and make another try"));
        $context = $this->context;
        $cart = $context->cart;
        if ($cart->id_customer == 0 || $cart->id_address_delivery == 0 || $cart->id_address_invoice == 0 || !$this->module->active) {
            Tools::redirect('index.php?controller=order&step=1');
        }
        // Check that this payment option is still available in case the customer changed his address just before the end of the checkout process
        $authorized = false;
        foreach (Module::getPaymentModules() as $module) {
            if ($module['name'] == 'prismpay') {
                $authorized = true;
                break;
            }
        }

        if (!$authorized) {
            die($this->module->l('This payment method is not available.', 'validation'));
        }
    $cart_products = $cart->getProducts();
    if (!empty($cart_products)) {
        foreach ($cart_products as $key => $cart_product) {
            $avlbl_quantity = StockAvailable::getQuantityAvailableByProduct($cart_product['id_product'], $cart_product['id_product_attribute']);
          //  if ( (int) $avlbl_quantity < (int) $cart_product['quantity'] ) {
            if ( (int) $avlbl_quantity < (int) $cart_product['cart_quantity'] ) {
				$stock_error=true;
				break;
            }
        }
    }

  
        $customer = $context->customer;
        $data = array(            
            'firstname' => $customer->firstname,
            'lastname' => $customer->lastname,
            'email' => $customer->email
        );
        //Billing        
        $idAddress = (int) $cart->id_address_invoice;
        if (($idAddress == 0) && ($customer)) {
            $idAddress = Address::getFirstCustomerAddressId($customer->id);
        }
        $address = new Address($idAddress);        
        $state = '';
        if ($address->id_state) {
            $state = new State((int) $address->id_state);
        }    
/* print_r($state)		;
exit(); */
        $country = new Country((int) $address->id_country);
        $data = array_merge($data, array(            
            'address_1' => $address->address1,
            'address_2' => $address->address2,
            'city' => $address->city,
            'zip' => $address->postcode,
            'state' => $state ? $state->name : "",
            'state_code' => $state ? $state->iso_code : "",
            'country' => $country->iso_code,
            'telephone' => $address->phone
        ));
        //Shipping        
        $idAddress = (int) $cart->id_address_delivery;
        if (($idAddress == 0) && ($customer)) {
            $idAddress = Address::getFirstCustomerAddressId($customer->id);
        }
        $address = new Address($idAddress);        
        $state = '';
        if ($address->id_state) {
            $state = new State((int) $address->id_state);
        }        
        $country = new Country((int) $address->id_country);
        $data = array_merge($data, array(            
            'shipping_address_1' => $address->address1,
            'shipping_address_2' => $address->address2,
            'shipping_city' => $address->city,
            'shipping_zip' => $address->postcode,
            'shipping_state' => $state ? $state->name : "",
            'shipping_state_code' => $state ? $state->iso_code : "",
            'shipping_country' => $country->iso_code            
        ));
        
        $total = $cart->getOrderTotal(true, Cart::BOTH);
        $data = array_merge($data, array(
            'order_number' => $cart->id,
            'description' => 'Order '.$cart->id,
            'amount' => $total,
            'currency' => $context->currency->iso_code,
            'callback_url' => $this->context->link->getModuleLink("prismpay", 'callback', array(), true),
            'ip_addr' => Tools::getRemoteAddr()
        ));
 $card_filled=false;
if(Tools::getValue('pc_cardholder_name') && Tools::getValue('pc_cardnum')&& Tools::getValue('pc_exp_date')&& Tools::getValue('pc_cvv')  ){ 
$card_filled=true;
        $data = array_merge($data, array(
            'card_name' =>strval(Tools::getValue('pc_cardholder_name')), 
            'card_number' =>strval(Tools::getValue('pc_cardnum')),  
            'card_expiry' => strval(Tools::getValue('pc_exp_date')),  
            'card_code' =>strval(Tools::getValue('pc_cvv'))
        ));
	$carrd_type=strval(Tools::getValue('pc_card_type'));
	$card_type_array=array('mastercard'=>3,'visa'=>4,'diners_club_international'=>6,'amex'=>1,'discover'=>2,'diners_club_carte_blanche'=>5);
if(array_key_exists($carrd_type,$card_type_array)){
	$data['card_type']=$card_type_array[$carrd_type];
}else{
	$data['card_type']=3;
}
		
		//$data['card_expiry']=str_replace('/','',$data['card_expiry']);
		$exp_date = explode("/", $data['card_expiry']);
		$exp_month = str_replace(' ', '', $exp_date[0]);
		$exp_year = str_replace(' ', '', $exp_date[1]);

		/* if (strlen($exp_year) == 2) {
		$exp_year += 2000;
		} */
		$data['card_number']=str_replace(array(' ', '-','/'),'',$data['card_number']);
/* 		echo $data['card_number'];
		echo "<br>";
		echo $data['card_expiry'];
		echo "<br>";
		echo $data['card_code'];
		echo "<br>";
		exit(); */
	$extra=array();

$state_code=($data['country']=='US')?$data['shipping_state_code']:'';
$ship_state_code=($data['shipping_country']=='US')?$data['shipping_state_code']:'';
/* 
$state_code='';
$ship_state_code=''; */
$phone_to_process=str_replace(array('(',')','{','}','[',']',' ','-'),'',$data['telephone']);
$phn_mtch_res=preg_match("/^\+[1-9]\d{1,14}$/",$phone_to_process,$phn_match);
if($phn_mtch_res===1)
	$phn=$phone_to_process;
else{
	$one_pos = strpos($phone_to_process, "1");
	$phone_to_process2=($one_pos===0)?"+".$phone_to_process:"+1".$phone_to_process;
	$phn_mtch_res=preg_match("/^\+[1-9]\d{1,14}$/",$phone_to_process2,$phn_match);
	$phn=$phn_mtch_res===1?$phone_to_process2:'';
}

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
				/* 	'uri'          => "https://MyCardStorage.com/", */
					'soap_version '          => SOAP_1_1,
					'login'          => $p_login,
					 'password'       => $p_pass,
					 "trace" => 1));
}catch (SoapFault $fault) {
	$soap_fault=true;
	//echo  "SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})";
	//exit();
   // trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
}

$header_cred=array("UserName"=>$p_login,"Password"=> $p_pass);
$soap_header=new SOAPHeader($ns,"AuthHeader",$header_cred);
 $client->__setSoapHeaders($soap_header); 

$service_security=array('ServiceUserName'=>$p_s_username,
'ServicePassword'=>$p_s_pass,
'MCSAccountID'=>$mcs_account_id
);
/* 	$nvp_req=array('Amount'=>$data['amount'],'Currency'=>$data['currency'],'CardNum'=>$data['card_number'],'NameOnCard'=>$data['card_name'],'CVNum'=>$data['card_code'],'ExpDate'=>$data['card_expiry'],'InvNum'=>$data['order_number'],'PNRef'=>$data['order_number'],'Street'=>$data['address_1'],'City'=>$data['city'],'State'=>$data['state'],'Zip'=>$data['zip'],'Country'=>$data['country'],'ShippingStreet'=>$data['shipping_address_1'],'ShippingCity'=>$data['shipping_city'],'ShippingState'=>$data['shipping_state'],'ShippingZip'=>$data['shipping_zip'],'ShippingCountry'=>$data['shipping_country'],'MobilePhone'=>$data['telephone'],'Email'=>$data['email'],'Description'=>$data['description'],'CustomerID'=>$customer->id,'ServerID'=>"seedbankers.com",'TransType'=>'Sale'); */
/* 	$nvp_req=array('amount'=>$data['amount'],'card_number'=>$data['card_number'],'card_cvv'=>$data['card_code'],'card_expiry_month'=>$exp_month,'card_expiry_year'=>$exp_year,'merchant_transaction_id'=>$data['order_number'],'first_name'=>$data['firstname'],'last_name'=>$data['lastname'],'street_address_1'=>$data['address_1'],'street_address_2'=>$data['address_2'],'city'=>$data['city'],'state'=>$state_code,'zip'=>$data['zip'],'country'=>$data['country'],'shipping_street_address_1'=>$data['shipping_address_1'],'shipping_street_address_2'=>$data['shipping_address_2'],'shipping_city'=>$data['shipping_city'],'shipping_state'=>$ship_state_code,'shipping_zip'=>$data['shipping_zip'],'shipping_country'=>$data['shipping_country'],'mobile_phone'=>$phn,'email'=>$data['email'],'dynamic_descripton'=>$data['description']); */
$token_data=array('TokenType'=>0,
'CardNumber'=>$data['card_number'],
'CardType'=>$data['card_type'],
'ExpirationMonth'=>$exp_month,
'ExpirationYear'=>$exp_year,
'StreetAddress'=>$data['address_1'],
'ZipCode'=>$data['zip'],
'CVV'=>$data['card_code'],
'FirstName'=>$data['firstname'],
'LastName'=>$data['lastname'],
);
/* 'MCSTransactionID'=>0,
'CountryCode'=>"US", */ 
/* $transaction_data=array('Amount'=>$data['amount'],
'MCSTransactionID'=>0,
'GatewayID'=>21,
'CountryCode'=>$data['country'],
'CurrencyCode'=>840,
'PurchaseCardTaxAmount'=>0,
); */
$transaction_data=array('Amount'=>$data['amount'],
'MCSTransactionID'=>0,
'GatewayID'=>21,
'CountryCode'=>$data['country'],
'CurrencyCode'=>840,
'PurchaseCardTaxAmount'=>0,
);
$result = $client->CreditSale_Soap(array('creditCardSale'=>array('ServiceSecurity'=>$service_security,'TokenData'=>$token_data,'TransactionData'=>$transaction_data)) );
  

/* $result=json_decode(json_encode($result),true)  ;
	echo "<pre>";
	print_r($result);
	echo "</pre>";
	exit(); 	 */
	
	}

/* 	$response_xml=new SimpleXMLElement($result);
	echo "<pre>";
print_r($response_xml);
echo "</pre>"; */
if($stock_error===true){
 $error=$prismpay->displayError($this->l('Some items in your cart are not available.Please Delete them or reduce quantity as applicable and try again.').'Go to <a href="/cart?action=show">Cart</a>');
}
elseif($card_filled===false){
 $error=$prismpay->displayError($this->l('Please Fill up Essential Details in the credit card and try again'));
}else if(!empty($soap_fault)){
 $error=$prismpay->displayError($this->l('Payment Process encountered a Network Connection fault'));	
}else if($result==false){
 $error=$prismpay->displayError($this->l('Couldn\'t connect to payment gateway.Please Try again Later'));	
}
 elseif($this->isvalidObjectResponse($result)){
//$response_xml=simplexml_load_string($result);
$result=json_decode(json_encode($result),true)  ;
/* 	echo "<pre>";
	print_r($result);
	echo "</pre>";
	 echo ("<textarea readonly style='border:none;width: 500px;min-height: 500px;' >".$client->__getLastRequest()."</textarea><br><br>");
	exit(); 	 */
	
	$res_code=$result['CreditSale_SoapResult']['Result']['ResultCode'];
	$res_detail_orig=$res_detail=$result['CreditSale_SoapResult']['Result']['ResultDetail'];

	/* $respmsg=!empty($response_xml->RespMSG)?$response_xml->RespMSG:$response_xml->respmsg;
	$msg_txt=!empty($response_xml->Message)?$response_xml->Message:$response_xml->message;
	$txn_id=!empty($response_xml->PNRef)?$response_xml->PNRef:$response_xml->pnref;
	$respmsg=strtolower($respmsg); */
	$res_detail=strtolower($res_detail);
	preg_match("~^(\d+)~", $res_detail, $m);
	$result_dtl_code=$m[1];
	if(strpos($res_detail,'error')!==false){
		$status=3;
		$er_msg="";
		if($result_dtl_code==1 || $result_dtl_code==2){
			$er_msg="Transaction Blocked by card issuer";
		}
		if($result_dtl_code==5 ){
			$er_msg="Decline do not honour";
		}
		if($result_dtl_code==30 || $result_dtl_code==31){
			$er_msg="Invalid Card or card not active";
		}
		if($result_dtl_code==30 || $result_dtl_code==31){
			$er_msg="Invalid Card or card not active";
		}
		if($result_dtl_code==50){
			$er_msg="Card Declined";
		}
		if($result_dtl_code==51){
			$er_msg="Declined Insufficient funds";
		}
		if($result_dtl_code==54){
			$er_msg="Declined Card Expired";
		}
		if($result_dtl_code==59){
			$er_msg="Declined Restricted Card";
		}
		if($result_dtl_code==61){
			$er_msg="Declined Exceeded Withdrawal Limit";
		}
		if($result_dtl_code==105){
			$er_msg="Declined Card Type not supported";
		}
		if($result_dtl_code==82 || $result_dtl_code==95){
			$er_msg="Declined Exceeded Usage Limit";
		}
		if($result_dtl_code==210 || $result_dtl_code==211){
			$er_msg="Declined wrong CVV";
		}
		if($result_dtl_code==96 ){
			$er_msg="Payment Gateway System malfunction";
		}
		$error=$prismpay->displayError($this->l("There was an error processing payment :".$er_msg));		
	}
	elseif(strpos($res_detail,'approved')!==false){
		$status=1;
		$tx_id= $result['CreditSale_SoapResult']['MCSTransactionID'];
		$p_tx_id= $result['CreditSale_SoapResult']['ProcessorTransactionID'];
		$p_app_code= $result['CreditSale_SoapResult']['ProcessorApprovalCode'];
		$message= $prismpay->displayConfirmation($this->l('Thank you! Your payment was processed successfully'));
		//echo " TX ID : $tx_id, Processor TX ID : $p_tx_id , Proc Approval code: $p_app_code ,Result detail : $res_detail_orig ";
		//exit();
	/* 	$message= $prismpay->displayConfirmation($this->l('Thank you! Your payment was processed successfully')." TX ID : $tx_id, Processor TX ID : $p_tx_id , Proc Approval code: $p_app_code ,Result detail : $res_detail_orig "); */ 
		   $extra = array(
                    'transaction_id' =>$tx_id
                );
//$prismpay->validateOrder($cart->id, Configuration::get('PS_OS_PAYMENT'), $total, 'Visa/MasterCard', null, $extra, (int)$context->currency->id, false, $customer->secure_key);
	$prismpay->validateOrder($cart->id, Configuration::get('PS_OS_PAYMENT'), $total, 'Visa/MasterCard', null, $extra, (int)$context->currency->id, false, $customer->secure_key);
			/* 			echo " TX ID : $tx_id, Processor TX ID : $p_tx_id , Proc Approval code: $p_app_code ,Result detail : $res_detail_orig ";
		exit(); */
	$order_id=(int)$prismpay->currentOrder;
	$order = new Order((int)$prismpay->currentOrder);
	// $payments = $order->getOrderPaymentCollection();
/* 	 echo "<pre>";
	 echo "<h2>Order Array Below</h2>";
	 print_r($order);
	 echo "<h2>Order ID Below</h2>";
	 echo "$order_id";
	 echo "</pre>";
	exit(); */
	/* $payments[0]->transaction_id = $tx_id;
	$payments[0]->update(); */
	
	$q = 'SELECT `reference` FROM ' . _DB_PREFIX_ . 'orders WHERE `id_order` = ' . (int) $order_id;
        if ($r = Db::getInstance()->getRow($q)) {
          Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'order_payment`
                                                  SET `transaction_id` = \'' . pSQL($tx_id) . '\'
                                                WHERE `order_reference` = \'' . pSQL($r['reference']) . '\'');
        }
	// exit();
	
	if($prismpay->currentOrder)
//	$red_url="/index.php?controller=order-detail&id_order=".$prismpay->currentOrder; 
	$red_url='/index.php?controller=order-confirmation&id_order='.$prismpay->currentOrder.'&id_cart='.$cart->id . '&id_module=' . $this->module->id . '&key=' . $customer->secure_key ; 
	}else {
	 $status=3;
	 $message=$prismpay->displayError($this->l("There was an error processing payment: Unknown Reason"));
/*         $prismpay->validateOrder($cart->id, Configuration::get('PS_OS_CANCELED'), $total, 'Prismpay', 
                    null, $extra, (int)$context->currency->id, false, $customer->secure_key);	 */	
	}
		

 } 
         $this->context->smarty->assign([
            'status' => $status,
            'error' => $error,
            'message' => $message,
		 'red_url' => $red_url
        ]); 
        
        $this->setTemplate('module:prismpay/views/templates/front/payment_return.tpl'); 
    }
	
public  function isvalidresponse($res) {
    $prev = libxml_use_internal_errors(true);
    $ret = true;
    try {
      new SimpleXMLElement($res);
    } catch(Exception $e) {
      $ret = false;
    }
    if(count(libxml_get_errors()) > 0) {
      // There has been XML errors
      $ret = false;
    }
    // Tidy up.
    libxml_clear_errors();
    libxml_use_internal_errors($prev);
    return $ret;
  }
public  function isvalidJsonResponse($res) {
$resu = json_decode($res);
return (json_last_error() === JSON_ERROR_NONE? true:false);
  }
public  function isvalidObjectResponse($res) {
return is_object ( $res);
  }
}
