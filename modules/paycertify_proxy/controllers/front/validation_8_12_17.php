<?php
/*
* paycertify_proxy
*/

class Paycertify_proxyValidationModuleFrontController extends ModuleFrontController
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
$message=$red_url=""; 
$paycertify = Module::getInstanceByName('paycertify_proxy');
$error=$paycertify->displayError($this->l("There was error processing payment: Invalid Response.\n You can return to Checkout page and make another try"));
        $context = $this->context;
        $cart = $context->cart;
        if ($cart->id_customer == 0 || $cart->id_address_delivery == 0 || $cart->id_address_invoice == 0 || !$this->module->active) {
            Tools::redirect('index.php?controller=order&step=1');
        }
        // Check that this payment option is still available in case the customer changed his address just before the end of the checkout process
        $authorized = false;
        foreach (Module::getPaymentModules() as $module) {
            if ($module['name'] == 'paycertify_proxy') {
                $authorized = true;
                break;
            }
        }

        if (!$authorized) {
            die($this->module->l('This payment method is not available.', 'validation'));
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
        $country = new Country((int) $address->id_country);
        $data = array_merge($data, array(            
            'address_1' => $address->address1,
            'address_2' => $address->address2,
            'city' => $address->city,
            'zip' => $address->postcode,
            'state' => $state ? $state->name : "",
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
            'shipping_country' => $country->iso_code            
        ));
        
        $total = $cart->getOrderTotal(true, Cart::BOTH);
        $data = array_merge($data, array(
            'order_number' => $cart->id,
            'description' => 'Order '.$cart->id,
            'amount' => $total,
            'currency' => $context->currency->iso_code,
            'callback_url' => $this->context->link->getModuleLink("paycertify_proxy", 'callback', array(), true),
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
		$data['card_expiry']=str_replace('/','',$data['card_expiry']);
		$data['card_number']=str_replace(' ','',$data['card_number']);
/* 		echo $data['card_number'];
		echo "<br>";
		echo $data['card_expiry'];
		echo "<br>";
		echo $data['card_code'];
		echo "<br>";
		exit(); */
	$extra=array();
	$nvp_req=array('Amount'=>$data['amount'],'Currency'=>$data['currency'],'CardNum'=>$data['card_number'],'NameOnCard'=>$data['card_name'],'CVNum'=>$data['card_code'],'ExpDate'=>$data['card_expiry'],'InvNum'=>$data['order_number'],'PNRef'=>$data['order_number'],'Street'=>$data['address_1'],'City'=>$data['city'],'State'=>$data['state'],'Zip'=>$data['zip'],'Country'=>$data['country'],'ShippingStreet'=>$data['shipping_address_1'],'ShippingCity'=>$data['shipping_city'],'ShippingState'=>$data['shipping_state'],'ShippingZip'=>$data['shipping_zip'],'ShippingCountry'=>$data['shipping_country'],'MobilePhone'=>$data['telephone'],'Email'=>$data['email'],'Description'=>$data['description'],'CustomerID'=>$customer->id,'ServerID'=>"seedbankers.com",'TransType'=>'Sale');
	$demo=false;
	
	if($demo==true){
		$nvp_req['ApiToken']='7E35FC46-C951-2D2F-FB42-7795F3D24C60';
		//$nvp_req['ApiToken']=Configuration::get('PAYCERTIFY_API_KEY');
		$cURL="https://demo.paycertify.net/ws/encgateway2.asmx";
/* 		$cURL="https://demo.paycertify.net/ws/cardsafe.asmx";
		$cURL="https://prod.paycertify.net/gateway.php?gwMode=transact&op=ProcessCreditCard"; */
	}else{
		$nvp_req['ApiToken']=Configuration::get('PAYCERTIFY_API_KEY');
		$cURL="https://gateway.paycertify.net/ws/encgateway2.asmx";
		//$cURL="https://prod.paycertify.net/gateway.php?gwMode=transact&op=ProcessCreditCard";
	}
/* 	echo "<pre>";
	print_r($nvp_req);
	echo "</pre>"; */
	//$nvp_qry=http_build_query($nvp_req);
	$hdr=array('Content-Type: application/x-www-form-urlencoded');
	$endpoint="/ProcessCreditCard";
	$ch = curl_init(); 
	//curl_setopt($ch, CURLOPT_URL, $cURL);
	curl_setopt($ch, CURLOPT_URL, $cURL.$endpoint);
	//curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvp_req);
	//curl_setopt($ch, CURLOPT_HTTPHEADER,$hdr);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($ch, CURLOPT_CAINFO, _PS_ROOT_DIR_.'/cacert/cacert.pem');
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	$res = curl_exec($ch);
	$curl_err=curl_error($ch);
	curl_close($ch);
	}
	/* print_r($res);
	exit();  */
/* 	$response_xml=new SimpleXMLElement($res);
	echo "<pre>";
print_r($response_xml);
echo "</pre>"; */
if($card_filled===false){
 $error=$paycertify->displayError($this->l('Please Fill up Essential Details in the credit card and try again'));
}else if($res===false){
// $error=$paycertify->displayError($this->l($curl_err));	
 $error=$paycertify->displayError($this->l('Couldn\'t connect to payment gateway.Please Try again Later'));	
}
 elseif($this->isvalidresponse($res)){
//$response_xml=simplexml_load_string($res);
$response_xml=new SimpleXMLElement($res);
/* echo "<pre>";
print_r($response_xml);
echo "</pre>";
exit(); */
if(!empty($response_xml->RespMSG) ||!empty($response_xml->respmsg) ){
	$respmsg=!empty($response_xml->RespMSG)?$response_xml->RespMSG:$response_xml->respmsg;
	$msg_txt=!empty($response_xml->Message)?$response_xml->Message:$response_xml->message;
	$txn_id=!empty($response_xml->PNRef)?$response_xml->PNRef:$response_xml->pnref;
	$respmsg=strtolower($respmsg);
	if($respmsg=='approved'){
		$status=1;
		$message= $paycertify->displayConfirmation($this->l('Thank you! Your payment was processed successfully'));
		   $extra = array(
                    'transaction_id' => $txn_id
                );
	$paycertify->validateOrder($cart->id, Configuration::get('PS_OS_PAYMENT'), $total, 'Visa/MasterCard', null, $extra, (int)$context->currency->id, false, $customer->secure_key);
	if($paycertify->currentOrder)
	$red_url="/index.php?controller=order-detail&id_order=".$paycertify->currentOrder; 
	}else if ($respmsg=='decline'){
	 $status=2;
	 $error=$paycertify->displayError($this->l("There was an error processing payment: Transaction Declined "));
      /*   $paycertify->validateOrder($cart->id, Configuration::get('PS_OS_CANCELED'), $total, 'Paycertify', 
                    null, $extra, (int)$context->currency->id, false, $customer->secure_key);	 */	
	}else {
	 $status=3;
	 $message=$paycertify->displayError($this->l($msg_txt));
/*         $paycertify->validateOrder($cart->id, Configuration::get('PS_OS_CANCELED'), $total, 'Paycertify', 
                    null, $extra, (int)$context->currency->id, false, $customer->secure_key);	 */	
	}
		
}
else{
}

 } 
         $this->context->smarty->assign([
            'status' => $status,
            'error' => $error,
            'message' => $message,
		 'red_url' => $red_url
        ]); 
        
        $this->setTemplate('module:paycertify_proxy/views/templates/front/payment_return.tpl'); 
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
}
