<?php
if (!defined('_PS_VERSION_'))
	exit;

class PrestaShippingEasy extends Module
{
	public $limited_countries = array('us');

	public function __construct()
	{
		$this->name = 'prestashippingeasy';
		$this->tab = 'shipping_logistics';
		$this->version = '1.4.6';
		$this->author = 'Shipping Easy';
		$this->need_instance = 0;
		$this->bootstrap = true;
		$this->display = 'view';
		$this->meta_title = $this->l('ShippingEasy');

		parent::__construct();

		$this->displayName = $this->l('ShippingEasy');
		$this->description = $this->l('Cloud based shipping software for online retailers. Integrates directly with your stores, nothing to download.');

	}

	public function install()
	{
		return parent::install() && Configuration::updateValue('SHIPPINGEASY_CANCEL',Configuration::get('PS_OS_CANCELED')) && Configuration::updateValue('SHIPPINGEASY_MODE', 1) && $this->registerHook('adminOrder') && $this->registerHook('BackOfficeHeader') && $this->registerHook('actionOrderStatusPostUpdate');
	}

	public function uninstall()
	{
		return Configuration::deleteByName('SHIPPINGEASY_MODE') && Configuration::deleteByName('SHIPPINGEASY_APIKEY') && Configuration::deleteByName('SHIPPINGEASY_APISECRET')
		&& Configuration::deleteByName('SHIPPINGEASY_STORE') && Configuration::deleteByName('SHIPPINGEASY_ORDER') && Configuration::deleteByName('SHIPPINGEASY_CANCEL')
		&& parent::uninstall();
	}

	public function getContent()
	{
		/* Loading CSS and JS files */
		$this->context->controller->addCSS(array($this->_path.'/css/prestashippingeasy.css'));

		$output = '';
		// This snippet (and some of the curl code) due to the Facebook SDK.
		if (!function_exists('curl_init')) {
		  $output .= $this->displayError($this->l('ShippingEasy needs the CURL PHP extension.'));
		}
		if (!function_exists('json_decode')) {
		  $output .= $this->displayError($this->l('ShippingEasy needs the JSON PHP extension.'));
		}
		if (!function_exists('mb_detect_encoding')) {
		  $output .= $this->displayError($this->l('ShippingEasy needs the Multibyte String PHP extension.'));
		}


		if (Tools::isSubmit('submitShippingEasy'))
		{
			if (!Tools::getValue('SHIPPINGEASY_APIKEY') || !Tools::getValue('SHIPPINGEASY_APISECRET') || !Tools::getValue('SHIPPINGEASY_STORE') 
				|| !Tools::getValue('SHIPPINGEASY_ORDER') || !Tools::getValue('SHIPPINGEASY_CANCEL'))
				$output .= $this->displayError($this->l('Please fill the required fields to update your configuration.'));
			elseif (Configuration::updateValue('SHIPPINGEASY_APIKEY', Tools::getValue('SHIPPINGEASY_APIKEY'))
			&& Configuration::updateValue('SHIPPINGEASY_APISECRET', Tools::getValue('SHIPPINGEASY_APISECRET'))
			&& Configuration::updateValue('SHIPPINGEASY_MODE', Tools::getValue('SHIPPINGEASY_MODE'))
			&& Configuration::updateValue('SHIPPINGEASY_STORE', Tools::getValue('SHIPPINGEASY_STORE'))
			&& Configuration::updateValue('SHIPPINGEASY_ORDER', Tools::getValue('SHIPPINGEASY_ORDER'))
			&& Configuration::updateValue('SHIPPINGEASY_CANCEL', Tools::getValue('SHIPPINGEASY_CANCEL')))
					$output .= $this->displayConfirmation($this->l('Congratulations, your configuration was updated successfully'));
		}

		$this->smarty->assign(array('admin_lang' => Context::getContext()->language->iso_code,
		'callback_url' => $this->context->link->getModuleLink('prestashippingeasy', 'callback', array(), false)));

		return $this->display(__FILE__, 'views/templates/admin/configuration.tpl').$output.$this->renderForm();
	}

	public function renderForm()
	{
		$options = array();
		foreach (OrderState::getOrderStates((int)Context::getContext()->language->id) as $state)
		{
		  $options[] = array(
		    "id" => (int)$state['id_order_state'],
		    "name" => $state['name']
		  );
		}

		$fields_form = array(
		'form' => array(
			'legend' => array(
				'title' => $this->l('Configuration'),
				'icon' => 'icon-cogs'
			),
			'input' => array(
				array(
					'type' => 'radio',
					'label' => $this->l('Live mode'),
					'name' => 'SHIPPINGEASY_MODE',
					'is_bool' => true,
					'desc' => $this->l('Production mode should be used only if your store is live'),
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Production')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Test')
						)
					)
				),
				array(
					'type' => 'text',
					'label' => $this->l('API KEY'),
					'name' => 'SHIPPINGEASY_APIKEY',
					'required' => true,
					'class' => 'fixed-width-xxl',
					'desc' => $this->l('Your ShippingEasy API Key'),
				),
				array(
					'type' => 'text',
					'label' => $this->l('API SECRET'),
					'name' => 'SHIPPINGEASY_APISECRET',
					'required' => true,
					'class' => 'fixed-width-xxl',
					'desc' => $this->l('Your ShippingEasy API Secret'),
				),
				array(
					'type' => 'text',
					'label' => $this->l('Store API Key'),
					'name' => 'SHIPPINGEASY_STORE',
					'required' => true,
					'class' => 'fixed-width-xxl',
					'desc' => $this->l('Your ShippingEasy Store API Key'),
				),
				array(
					'type' => 'select',
					'label' => $this->l('Send to ShippingEasy'),
					'name' => 'SHIPPINGEASY_ORDER',
					'required' => true,
					'options' => array(
						'query' => $options,
						'id' => 'id',
						'name' => 'name'
					),
					'class' => 'fixed-width-xxl',
					'desc' => $this->l('Orders with this Status will be sent to ShippingEasy'),
				),
				array(
					'type' => 'select',
					'label' => $this->l('Cancel status'),
					'name' => 'SHIPPINGEASY_CANCEL',
					'required' => true,
					'options' => array(
						'query' => $options,
						'id' => 'id',
						'name' => 'name'
					),
					'class' => 'fixed-width-xxl',
					'desc' => $this->l('Set this Status to cancel the order in ShippingEasy'),
				),
			),
			'submit' => array(
				'title' => $this->l('Save settings'),
				'class' => 'btn btn-default pull-right')
			)
		);

		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitShippingEasy';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
		.'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => Configuration::getMultiple(array('SHIPPINGEASY_MODE','SHIPPINGEASY_APIKEY', 'SHIPPINGEASY_APISECRET', 'SHIPPINGEASY_STORE', 'SHIPPINGEASY_ORDER', 'SHIPPINGEASY_CANCEL')),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		return $helper->generateForm(array($fields_form));
	}
	
	public function hookAdminOrder($params) {
		$this->context->smarty->assign(array('ship_order'=>(int)Tools::getValue('id_order')));
		return $this->display(__FILE__, 'views/templates/admin/admin-order.tpl');
	}

	public function hookBackOfficeHeader()
	{
		if (Tools::isSubmit('process_send') && Tools::getValue('ship_order')) {
			$order=new Order((int)Tools::getValue('ship_order'));
			if (!$order->isVirtual()) {
				$this->_setupLibrary();
				$this->_processSendOrder((int)Tools::getValue('ship_order'),$order);
			}
		}
	}
	public function hookActionOrderStatusPostUpdate($params)
	{
		if ($params['newOrderStatus']->id==Configuration::get('SHIPPINGEASY_ORDER') || $params['newOrderStatus']->id==Configuration::get('SHIPPINGEASY_CANCEL')) {
			$order_id=$params['id_order'];
			$order=new Order($order_id);
			if (!$order->isVirtual()) {
				$this->_setupLibrary();
			    if ($params['newOrderStatus']->id==Configuration::get('SHIPPINGEASY_ORDER')) {
			    	$this->_processSendOrder($order_id,$order);
			    }
				if ($params['newOrderStatus']->id==Configuration::get('SHIPPINGEASY_CANCEL')) {
		            try {
		                $cancellation = new ShippingEasy_Cancellation(Configuration::get('SHIPPINGEASY_STORE'), $order->id);
		                $cancellation->create();
		            	$msg = new Message();
						$msg->message = 'ShippingEasy Successfully cancelled order';
						$msg->id_order = (int)($order->id);
						$msg->private = 1;
						$msg->add();
		            } catch (Exception $e) {
						$msg = new Message();
						$msg->message = Tools::substr($e->getMessage(),0,1600);
						$msg->id_order = (int)($order->id);
						$msg->private = 1;
						$msg->add();
		            }
	           	}
			}
		}
		return true;

	}
	private function _shipping_order_detail($order) {
	    $temp = array();
	    foreach ($order->getProducts() as $item) {
			if ($item['product_attribute_id']!=0)
			{
				$product=new Product($item['product_id']);
				$att=$product->getAttributeCombinationsById($item['product_attribute_id'],1);
				$item['weight']=$item['weight']+$att[0]['weight'];
			}

			if (Tools::strtolower(Configuration::get('PS_WEIGHT_UNIT'))=='lb' || Tools::strtolower(Configuration::get('PS_WEIGHT_UNIT'))=='lbs') {
				$item['weight']=$item['weight']*16;
			}

	        if ($item['is_virtual'] == '0') {
	            $temp[] = array(
	                "item_name" => $item['product_name'],
	                "sku" => $item['product_reference'],
	                "bin_picking_number" => "N/A",
	                "unit_price" => $item['product_price'],
	                "total_excluding_tax" => $item['unit_price_tax_excl']*$item['product_quantity'],
	                "weight_in_ounces" => $item['weight'],
	                "quantity" => $item['product_quantity']
	            );
	        }
	    }
	    $temp_count = count($temp);
	    for ($i = 0; $i < $temp_count; $i++) {
	        if ($temp[$i]['weight_in_ounces'] == 0) {
	            unset($temp[$i]['weight_in_ounces']);
	        }
	    }
	    return $temp;
	}
	private function _setupLibrary() {
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/ShippingEasy.php');

		// Errors
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/Error.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/ApiError.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/ApiConnectionError.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/AuthenticationError.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/InvalidRequestError.php');

		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/ApiRequestor.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/Authenticator.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/Object.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/Order.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/Signature.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/SignedUrl.php');
		require(_PS_ROOT_DIR_.'/modules/'. $this->name . '/lib/Cancellation.php');		

    	ShippingEasy::setApiKey(Configuration::get('SHIPPINGEASY_APIKEY'));
    	ShippingEasy::setApiSecret(Configuration::get('SHIPPINGEASY_APISECRET'));
    	if (!Configuration::get('SHIPPINGEASY_MODE'))
    		ShippingEasy::setApiBase('https://staging.shippingeasy.com');	
	}

	private function _processSendOrder($order_id,$order) {
    	$address_delivery=new Address((int)$order->id_address_delivery);
    	$address_billing=new Address((int)$order->id_address_invoice);

		if ($address_billing->phone_mobile!="")
			$billing_phone=$address_billing->phone_mobile;
		else
			$billing_phone=$address_billing->phone;

		if ($address_delivery->phone_mobile!="")
			$delivery_phone=$address_delivery->phone_mobile;
		else
			$delivery_phone=$address_billing->phone;

		$billing_state= new State($address_billing->id_state);
		$delivery_state=new State($address_delivery->id_state);
		$billing_country=new Country($address_billing->id_country);
		$delivery_country=new Country($address_delivery->id_country);
		$zone=new Zone($delivery_country->id_zone);

		$customer=new Customer($order->id_customer);
		$carrier=new Carrier($order->id_carrier);

		$orderdet=$this->_shipping_order_detail($order);
		if (!$message=Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
			SELECT `message`
			FROM `'._DB_PREFIX_.'message`
			WHERE `id_order` = '.(int)$order_id.'
			AND `id_customer` !=0 
			ORDER BY `id_message`
		'))
			$message="";
		//Creating order array.
        $values = array(
            "external_order_identifier" => $order_id,
            "ordered_at" => gmdate('Y-m-d H:i:s',strtotime($order->date_add)),
            "order_status" => "awaiting_shipment",
            "subtotal_including_tax" => $order->total_paid_tax_incl,
            "total_including_tax" => $order->total_paid_tax_incl,
            "total_excluding_tax" => $order->total_paid_tax_excl,
            "discount_amount" => $order->total_discounts,
            "subtotal_excluding_tax" => $order->total_paid_tax_excl,
            "subtotal_tax" => $order->total_paid_tax_incl-$order->total_paid_tax_excl,
            "total_tax" => $order->total_paid_tax_incl-$order->total_paid_tax_excl,
            "base_shipping_cost" => $order->total_shipping,
            "shipping_cost_including_tax" => $order->total_shipping_tax_incl,
            "shipping_cost_excluding_tax" => $order->total_shipping_tax_excl,
            "shipping_cost_tax" => $order->total_shipping_tax_incl-$order->total_shipping_tax_excl,
            "base_handling_cost" => "0.00",
            "handling_cost_excluding_tax" => "0.00",
            "handling_cost_including_tax" => "0.00",
            "handling_cost_tax" => "0.00",
            "base_wrapping_cost" => $order->total_wrapping,
            "wrapping_cost_excluding_tax" => $order->total_wrapping_tax_excl,
            "wrapping_cost_including_tax" => $order->total_wrapping_tax_incl,
            "wrapping_cost_tax" => $order->total_wrapping_tax_incl-$order->total_wrapping_tax_excl,
            "notes" => $message,
            "billing_company" => $address_billing->company,
            "billing_first_name" => $address_billing->firstname,
            "billing_last_name" => $address_billing->lastname,
            "billing_address" => $address_billing->address1,
            "billing_address2" => $address_billing->address2,
            "billing_city" => $address_billing->city,
            "billing_state" => $billing_state->iso_code,
            "billing_postal_code" => $address_billing->postcode,
            "billing_country" => $billing_country->iso_code,
            "billing_phone_number" => $billing_phone,
            "billing_email" => $customer->email,
            "recipients" => array(
                array(
                    "first_name" => $address_delivery->firstname,
                    "last_name" => $address_delivery->lastname,
                    "company" => $address_delivery->company,
                    "email" => $customer->email,
                    "phone_number" => $delivery_phone,
                    "residential" => "true",
                    "address" => $address_delivery->address1,
                    "address2" => $address_delivery->address2,
                    "province" => "",
                    "state" => $delivery_state->iso_code,
                    "city" => $address_delivery->city,
                    "postal_code" => $address_delivery->postcode,
                    "postal_code_plus_4" => "",
                    "country" => $delivery_country->iso_code,
                    "shipping_method" => $carrier->name,
                    "base_cost" => $order->total_shipping,
                    "cost_excluding_tax" => $order->total_shipping_tax_excl,
                    "cost_tax" => $order->total_shipping_tax_excl,
                    "base_handling_cost" => "0.00",
                    "handling_cost_excluding_tax" => "0.00",
                    "handling_cost_including_tax" => "0.00",
                    "handling_cost_tax" => "0.00",
                    "shipping_zone_id" => $delivery_country->id_zone,
                    "shipping_zone_name" => $zone->name,
                    "items_total" => count($orderdet),
                    "items_shipped" => "0",
                    "line_items" => $orderdet
                )
            )
        );
        try {
            $s_order = new ShippingEasy_Order(Configuration::get('SHIPPINGEASY_STORE'), $values);
            $s_order->create();
			$msg = new Message();
			$msg->message = 'ShippingEasy Successfully created order';
			$msg->id_order = (int)($order->id);
			$msg->private = 1;
			$msg->add();
        } catch (Exception $e) {
			$msg = new Message();
			$msg->message = Tools::substr($e->getMessage(),0,1600);
			$msg->id_order = (int)($order->id);
			$msg->private = 1;
			$msg->add();
        }
	}

}
