<?php


class prestashippingeasycallbackModuleFrontController extends ModuleFrontController
{
	private $shippingeasy;

	public function initContent()
	{
		parent::initContent();
		$this->shippingeasy = new PrestaShippingEasy();

		// Load library now
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/ShippingEasy.php');

		// Errors
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/Error.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/ApiError.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/ApiConnectionError.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/AuthenticationError.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/InvalidRequestError.php');

		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/ApiRequestor.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/Authenticator.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/Object.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/Order.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/Signature.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/SignedUrl.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->shippingeasy->name . '/lib/Cancellation.php');

		ShippingEasy::setApiKey(Configuration::get('SHIPPINGEASY_APIKEY'));
        ShippingEasy::setApiSecret(Configuration::get('SHIPPINGEASY_APISECRET'));
        if (!Configuration::get('SHIPPINGEASY_MODE'))
                ShippingEasy::setApiBase('https://staging.shippingeasy.com');

		$values = Tools::file_get_contents('php://input');
		$output = Tools::jsonDecode($values, true);
		$context=Context::getContext();
		$url=parse_url($context->link->getModuleLink('prestashippingeasy', 'callback', array(), false));

		$api_signature=Tools::getValue('api_signature');
		if (strpos($api_signature, "?"))
			$api_signature=substr($api_signature, 0, strpos($api_signature, "?"));

		$authenticator = new ShippingEasy_Authenticator('POST', $url['path'], array("api_signature"=>$api_signature), $values);

		if ($authenticator->isAuthenticated())
      	{
	      	$order_id = $output['shipment']['orders'][0]['external_order_identifier'];
	        $tracking_number = $output['shipment']['tracking_number'];
	        $carrier_key = $output['shipment']['carrier_key'];
	        $carrier_service_key = $output['shipment']['carrier_service_key'];
	        $shipment_cost_cents = $output['shipment']['shipment_cost'];
	        $shipment_cost = ($shipment_cost_cents / 100);

	        if ($order_id && $tracking_number)
	        {
		        $order=new Order((int)$order_id);
		        if (Validate::isLoadedObject($order)) {
		        	$order->setCurrentState(Configuration::get('PS_OS_SHIPPING'));
			        $comment_update = 'Shipping Tracking Number: ' . $tracking_number . ' Carrier Key: ' . $carrier_key . ' Carrier Service Key: ' . $carrier_service_key . ' Cost: ' . $shipment_cost;

					$msg = new Message();
					$msg->message = Tools::substr($comment_update,0,1600);
					$msg->id_order = (int)($order_id);
					$msg->private = 1;
					$msg->add();

		        	if (Validate::isTrackingNumber($tracking_number)) {
						$order->shipping_number = $tracking_number;
						$order->update();

						$order_carrier = new OrderCarrier($order->getIdOrderCarrier());
						if (Validate::isLoadedObject($order_carrier)) {
							$order_carrier->tracking_number = $tracking_number;
							$order_carrier->update();
						}
					}
				}
			}
		}
 		die();
	}
}
