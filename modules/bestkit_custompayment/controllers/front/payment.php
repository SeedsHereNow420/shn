<?php

class bestkit_custompaymentpaymentModuleFrontController extends
    ModuleFrontController
{
	public $ssl = true;
	public $display_column_left = false;
	public $display_column_right = false;
	
	protected $customPaymentObj;
	
    public function setMedia()
    {
        parent::setMedia();
        $this->addCSS(array(
            _MODULE_DIR_ . 'bestkit_custompayment/views/css/style.css' => 'all',
        ));
    }

    public function init()
    {
		parent::init();
		
		$this->customPaymentObj = new BestkitCustomPayment(Tools::getValue('id'), $this->context->language->id);
		if (!$this->customPaymentObj->id)
			Tools::redirect('index.php?controller=order');
    }

    public function postProcess()
    {
        if (Tools::isSubmit('submit_payment')) {
            $cart = $this->context->cart;
			
            if ($cart->id_customer == 0 || $cart->id_address_delivery == 0 || $cart->id_address_invoice == 0 || !$this->module->active)
                Tools::redirect('index.php?controller=order&step=1');

            // Check that this payment option is still available in case the customer changed his address just before the end of the checkout process
            $authorized = false;
            foreach (Module::getPaymentModules() as $module)
                if ($module['name'] == 'bestkit_custompayment')
                {
                    $authorized = true;
                    break;
                }

            if (!$authorized)
                die(Tools::displayError('This payment method is not available.'));

            $customer = new Customer($cart->id_customer);
            if (!Validate::isLoadedObject($customer))
                Tools::redirect('index.php?controller=order&step=1');
	
            $total = (float)$cart->getOrderTotal(true, Cart::BOTH);
			$custom_payment_fee = $this->customPaymentObj->getFee($cart);
            $currency = $this->context->currency;
			
			//insert into `bestkit_custompayment_order`
			Db::getInstance()->execute('
				INSERT INTO `'._DB_PREFIX_.'bestkit_custompayment_order` (`id_bestkit_custompayment`, `id_cart`, `total`, `fee`)
				VALUES ('.(int)$this->customPaymentObj->id.', '.(int)$cart->id.', '.(float)$total.', '.(float)$custom_payment_fee.')
			');
			
			//create order, this function is in bestkit_custompayment  
            $this->module->validateOrder((int)$cart->id, $this->customPaymentObj->id_order_state, ($total + $custom_payment_fee), $this->customPaymentObj->name, NULL, array(), (int)$currency->id, false, $customer->secure_key);

            Tools::redirect('index.php?controller=order-confirmation&id_cart='.(int)$cart->id.'&id_module='.(int)$this->module->id.'&id_order='.$this->module->currentOrder.'&key='.$customer->secure_key);
        }
    }

    public function initContent()
	{
		$this->display_column_left = FALSE;
		$this->display_column_right = FALSE;
	
		parent::initContent();

		$cart = $this->context->cart;

		$this->context->smarty->assign(array(
			'customPaymentObj' => $this->customPaymentObj,
			'nbProducts' => $cart->nbProducts(),
			'total' => $cart->getOrderTotal(true, Cart::BOTH),
			'custom_payment_fee' => $this->customPaymentObj->getFee($cart),
		));

		//$this->setTemplate('payment_execution.tpl');
		$this->setTemplate('module:bestkit_custompayment/views/templates/front/payment_execution.tpl');
	}
}

?>