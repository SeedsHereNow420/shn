<?php

use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once _PS_MODULE_DIR_ . 'bestkit_custompayment/includer.php';

class bestkit_custompayment extends PaymentModule
{
    const PREFIX = 'bestkit_cpay_';
    const DEBUG_MODE = false;

    protected $_hooks = array(
		//'payment',
        //'displayPaymentEU',
		'paymentOptions',
		'header',
		'orderConfirmation',
		'displayOrderDetail',
		'displayAdminOrder',
		'displayPDFInvoice',
		'displayPDFDeliverySlip',
		'actionEmailAddAfterContent',
    );

    protected $_moduleParams = array();
    protected $_moduleParamsLang = array();

    protected $_tabs = array(
        array(
            'class_name' => 'AdminBestkitCustomPayment',
            'parent' => 'AdminParentOrderPreferences',
            'name' => 'Custom payments'
        ),
    );

    public function __construct()
    {
        $this->name = 'bestkit_custompayment';
        $this->tab = 'payments_gateways';
        $this->version = '1.7.2';
        $this->author = 'best-kit';
        $this->need_instance = 0;
        $this->module_key = 'fc20c017a0ba145f4205ab11638fb6e0';
        $this->bootstrap = TRUE;
		
        $this->displayName = $this->l('Custom payments');
        $this->description = $this->l('Ability to create as many custom payment methods as you need.');

        parent::__construct();

/*foreach ($this->_hooks as $hook) {
    if (!$this->registerHook($hook)) {
        return FALSE;
    }
}*/

        $this->images_dir = _PS_IMG_DIR_ . 'bestkit_custompayment/';
        $this->images_url = __PS_BASE_URI__ . 'img/bestkit_custompayment/';
    }
	
    public function getDir($file = '')
    {
        return _PS_MODULE_DIR_ . $this->name . DIRECTORY_SEPARATOR . $file;
    }

    public function install()
    {
        if (parent::install()) {
            $sql = array();
            include ($this->getDir('sql/install.php'));
            foreach ($sql as $_sql) {
                Db::getInstance()->Execute($_sql);
            }

            //make a new dir "bestkit_icons"
            if (!file_exists($this->images_dir)) {
                mkdir($this->images_dir, 0777);
                chmod($this->images_dir, 0777);
            }

            foreach ($this->_hooks as $hook) {
                if (!$this->registerHook($hook)) {
                    return FALSE;
                }
            }

            $languages = Language::getLanguages();
            foreach ($this->_tabs as $tab) {
                $_tab = new Tab();
                $_tab->class_name = $tab['class_name'];
                $_tab->id_parent = Tab::getIdFromClassName($tab['parent']);
                if (empty($_tab->id_parent)) {
                    $_tab->id_parent = 0;
                }

                $_tab->module = $this->name;
                foreach ($languages as $language) {
                    $_tab->name[$language['id_lang']] = $this->l($tab['name']);
                }

                $_tab->add();
            }

            if (!$this->installConfiguration()) {
                return FALSE;
            }

            return TRUE;
        }

        return FALSE;
    }

    public function uninstall()
    {
        if ($return = parent::uninstall()) {
            $sql = array();
            //include ($this->getDir('sql/uninstall.php'));
            foreach ($sql as $_sql) {
                Db::getInstance()->Execute($_sql);
            }

            foreach ($this->_tabs as $tab) {
                $_tab_id = Tab::getIdFromClassName($tab['class_name']);
                $_tab = new Tab($_tab_id);
                $_tab->delete();
            }
        }

        return $return;
    }

    public function installConfiguration()
    {
        foreach ($this->_moduleParams as $param => $value) {
            if (!$this->setConfig($param, $value)) {
                return FALSE;
            }
        }

        foreach ($this->_moduleParamsLang as $param => $value) {
            $values = array();
            foreach (Language::getLanguages(FALSE) as $lang) {
                $values[$lang['id_lang']] = $value;
            }

            if (!$this->setConfig($param, $values)) {
                return FALSE;
            }
        }

        return TRUE;
    }

    public function getConfig($name)
    {
        if (array_key_exists($name, $this->_moduleParamsLang)) {
            $values = array();
            foreach (Language::getLanguages(FALSE) as $lang) {
                $values[$lang['id_lang']] = Configuration::get(self::PREFIX . $name, $lang['id_lang']);
            }

            return $values;
        } else {
            return Configuration::get(self::PREFIX . $name);
        }
    }

    public function setConfig($name, $value)
    {
        return Configuration::updateValue(self::PREFIX . $name, $value, TRUE);
    }

    public function getContent() {
        $redirect = $this->context->link->getAdminLink('AdminBestkitCustomPayment');
        Tools::redirectAdmin($redirect);
    }
	
	public function hookHeader()
	{
		if (!$this->active)
			return;

		if (!in_array($this->context->controller->php_self, array('order-opc', 'order')))
			return;

		$this->context->controller->addCSS($this->_path.'views/css/style.css', 'all');
	}
	
	public function hookOrderConfirmation($params)
	{
		if (!$this->active)
			return;

		if ($params['order']->module != $this->name)
			return;
		
		$cart = new Cart($params['order']->id_cart);
		$bestkit_custompayment = BestkitCustomPayment::isUsed($cart->id);
		if (isset($bestkit_custompayment['id_bestkit_custompayment']) && $bestkit_custompayment['id_bestkit_custompayment']) {
			$customPaymentObj = new BestkitCustomPayment($bestkit_custompayment['id_bestkit_custompayment'], $this->context->language->id);
			
			$this->context->smarty->assign(array(	
				'total' => $bestkit_custompayment['total'],
				'custom_payment_fee' => $bestkit_custompayment['fee'],
				'order_confirmation_text' => $customPaymentObj->confirmation_text,
			));

			return $this->display(__FILE__, 'order_confirmation.tpl');
		}
	}

    public function hookDisplayOrderDetail($params)
    {
        $data = BestkitCustomPayment::isUsed($params['order']->id_cart);
        if ($data) {
			$customPaymentObj = new BestkitCustomPayment($data['id_bestkit_custompayment'], $this->context->language->id);
			
			$this->context->smarty->assign(array(	
				'total' => $data['total'],
				'custom_payment_fee' => $data['fee'],
				'order_confirmation_text' => $customPaymentObj->confirmation_text,
			));

			return $this->display(__FILE__, 'order_details.tpl');
		}
	}

    public function hookActionEmailAddAfterContent($params)
    {
        if ($params['template'] == 'order_conf') {
            $pfee_str = '';
            $data = BestkitCustomPayment::isUsed($this->context->cart->id);
            if (isset($data['id_bestkit_custompayment_order'])) {
                $cart = new Cart($data['id_cart']);
                $order_currency = new Currency($cart->id_currency);
                $pfee_str .= '<br><small>' . sprintf($this->l('(additional fee/discount: %s incl.)'), Tools::displayPrice($data['fee'], $order_currency)) . '<small>';
            }
			
            $params['template_html'] = str_replace("{total_products}", "{total_products}" . $pfee_str, $params['template_html']);
        }
    }

    public function hookDisplayAdminOrder()
    {
		$orderObj = new Order(Tools::getValue('id_order'));
	
        $data = BestkitCustomPayment::isUsed($orderObj->id_cart);
        $this->context->smarty->assign('cpayment_data', $data);

        return $this->display(__file__, 'admin_order.tpl');
    }

    public function hookDisplayPDFInvoice($params)
    {
		$orderObj = new Order(Tools::getValue('id_order'));
		
        $data = BestkitCustomPayment::isUsed($orderObj->id_cart);
        if (isset($data['id_bestkit_custompayment_order']))
			$this->context->smarty->assign('cpayment_data', $data);

        return $this->display(__file__, 'admin_pdf.tpl');
    }

    public function hookDisplayPDFDeliverySlip($params)
    {
		$orderObj = new Order(Tools::getValue('id_order'));
		
        $data = BestkitCustomPayment::isUsed($orderObj->id_cart);
        if (isset($data['id_bestkit_custompayment_order']))
			$this->context->smarty->assign('cpayment_data', $data);

        return $this->display(__file__, 'admin_pdf.tpl');
    }





    private function _getImageSrc($images_dir, $images_url, $id, $ext)
    {
        $image_filename = $images_dir . $id . '.' . $ext;
        if (file_exists($image_filename) && is_file($image_filename)) {
            return $images_url . $id . '.' . $ext;
        }
    }

    public function enrichPayments(&$payment)
    {
        $payment['src'] = $this->_getImageSrc($this->images_dir, $this->images_url, $payment['id_bestkit_custompayment'], $payment['ext']);
        $payment['link'] = $this->context->link->getModuleLink('bestkit_custompayment', 'payment', array('id' => $payment['id_bestkit_custompayment']));
        if ($payment['commision_percent'] != 0)
            $payment['commision_percent'] = $payment['commision_percent'] * 100 - 100;
        $payment['commision_currency_human'] = $payment['commision_currency'] == 0 ? $this->context->currency : new Currency($payment['commision_currency']); //, $this->context->language->id

        //since 1.6.3
        if ($payment['max_commision_amount'] > 0) {
            $payment['max_commision_amount'] = Tools::convertPriceFull($payment['max_commision_amount'], null, $this->context->currency);

            if ($this->context->cart->getOrderTotal() >= $payment['max_commision_amount']) {
                $payment['commision_percent'] = 0;
                $payment['commision_amount'] = 0;
            }
        }
    }

    public function hookDisplayPaymentEU()
    {
        return $this->hookPayment();
    }

    public function hookPayment()
    {
        if (!$this->active)
            return;

        $payments = BestkitCustomPayment::getAvailablePayments();
        foreach ($payments as &$payment) {
            $this->enrichPayments($payment);
        }

        $this->context->smarty->assign(array(
            'bestkit_custompayments' => $payments,
        ));

//print_r($payments); die;
        return $this->display(__FILE__, 'payment_execution.tpl');
    }

    public function hookPaymentOptions($params)
    {
        if (!$this->active)
            return;

        $payments = BestkitCustomPayment::getAvailablePayments();
        foreach ($payments as &$payment) {
            $this->enrichPayments($payment);
        }
        unset($payment);

        $this->context->smarty->assign(array(
            'bestkit_custompayments' => $payments,
        ));

        $newOptions = [];
        foreach ($payments as $payment) {
            $this->context->smarty->assign(array(
                'bestkit_custompayment' => $payment,
            ));

            $payment_execution_html = $this->fetch('module:bestkit_custompayment/views/templates/hook/payment_execution.tpl');

//print_r($payment_execution_html); die;
//print_r($payment); die;
            $paymentOption = new PaymentOption();
            $paymentOption->setModuleName($this->name . '_' . $payment['id_bestkit_custompayment'])
                ->setCallToActionText($payment['description_short'])
                ->setLogo($payment['src'])
                ->setAction($payment['link'])
                ->setAdditionalInformation($payment_execution_html);

            $newOptions[] = $paymentOption;
        }
        unset($payment);

        return $newOptions;
    }
}
