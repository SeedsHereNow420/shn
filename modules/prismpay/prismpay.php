<?php


use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

if (!defined('_PS_VERSION_'))
  exit;
//_PS_VERSION_
class PrismPay extends PaymentModule
{
  public function __construct()
  {
    $this->name = 'prismpay';
    $this->tab = 'payments_gateways';
    $this->version = '1.0';
    $this->author = 'Shijesh B';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    $this->dependencies = array();
   $this->controllers = array('validation');
	$this->currencies = true;
	$this->currencies_mode = 'checkbox';
	$this->bootstrap = true;

    parent::__construct();

    $this->displayName = $this->l('Prismpay Payment Processor');
    $this->description = $this->l('For accepting Card payments ');

    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

    if (!Configuration::get('PRISMPAY_NAME'))
      $this->warning = $this->l('No name provided');

        if (!count(Currency::checkPaymentCurrencies($this->id))) {
            $this->warning = $this->l('No currency has been set for this module.');
        }
  }

public function install(){
if (!parent::install()  || !Configuration::updateValue('PRISMPAY_NAME', 'Prism Pay') || !$this->registerHook('paymentOptions')  || !$this->registerHook('paymentReturn')  || !$this->registerHook('actionChangeOrderStatus') || $this->registerHook('displayBackOfficeHeader')   ) {
return false;
}

return true;
}

public function uninstall(){
if (!parent::uninstall() ||   !Configuration::deleteByName('PRISMPAY_NAME') ||   !Configuration::deleteByName('P_P_CLIENT_ID') ||   !Configuration::deleteByName('P_P_PASSWORD')  ) {
    return false;
  }
  return true;
}

public function hookHeader()
{
	  $this->context->controller->addCSS($this->_path.'views/css/prismpay.css', 'all');
  $this->context->controller->addJS($this->_path.'views/js/jquery.creditCardValidator.js', 'all');
  $this->context->controller->addJS($this->_path.'views/js/prispaygen.js', 'all');
  $this->context->controller->addJS($this->_path.'views/js/jquery.mask.min.js', 'all');
  $this->context->controller->addJS($this->_path.'views/js/jquery.validate.min.js', 'all');
  $this->context->controller->addJS($this->_path.'views/js/additional-methods.min.js', 'all');

}

 public function hookActionAdminControllerSetMedia()

{

			  $this->context->controller->addCSS($this->_path.'views/css/prismpayadmin.css', 'all');
        $this->context->controller->addJS($this->_path.'views/js/prismpayadmin.js');

}
public function hookDisplayBackOfficeHeader()
    {
		//	  $this->context->controller->addCSS($this->_path.'views/css/prismpayadmin.css', 'all');
        //$this->context->controller->addJS($this->_path.'views/js/prismpayadmin.js');
    }
public function getContent()
{
	// P_P_CLIENT_ID P_P_PASSWORD
	$html = '';
	if (Tools::isSubmit('submitConfigPrsm'))
	{
        $ge_client_id = strval(Tools::getValue('p_p_client_id'));
        $ge_pass= strval(Tools::getValue('p_p_password'));
        if ( empty($ge_client_id) || !$ge_client_id   || !$this->is_digit($ge_client_id))
            $html .= $this->displayError($this->l('Invalid Client ID'));
        else  if ( empty($ge_pass) || !$ge_pass  )
            $html .= $this->displayError($this->l('Invalid Password'));
        else  if ( strlen($ge_pass)<6   )
            $html .= $this->displayError($this->l('Password should be atleast 6 characters'));
        else
        {
            Configuration::updateValue('P_P_CLIENT_ID', $ge_client_id);
            Configuration::updateValue('P_P_PASSWORD', $ge_pass);
            $html .= $this->displayConfirmation($this->l('Configuration Saved'));
        }
	}
	$this->context->smarty->assign(array(
			'module_dir' => $this->_path,
			'P_P_CLIENT_ID' => Configuration::get('P_P_CLIENT_ID'),
			'P_P_PASSWORD' => Configuration::get('P_P_PASSWORD'),
	));
/* 	echo $this->context->link->getModuleLink($this->name, 'PrismpayAjaxModuleFrontController');
	die(); */

	return $html.$this->context->smarty->fetch(dirname(__FILE__).'/views/templates/admin/configuration.tpl');
}


/* public function hookdisplayPayment($params)
{
		echo "I am happening";
	echo "<h1>I am happening</h1>";
	die();
	exit();
} */

    public function hookPayment($params)
    {
        if (!$this->active || !$this->checkCurrency($params['cart'])) {
            return;
        }
       /*  if (!$this->active  ) {
            return;
        } */

        $this->smarty->assign(array(
            'path' => $this->getPathUri()
        ));

        return $this->display(__FILE__, 'payment.tpl');
    }
public function hookPaymentOptions($params)
//public function hookPaymentOptions()
{
	if (!$this->checkCurrency($params['cart'])) {
		return;
	}
/* 	if( !Configuration::get('P_P_CLIENT_ID')){
		return;
	}
	if( !Configuration::get('P_P_PASSWORD')){
		return;
	}	 */

	$paymentOptions = [];

	$option = new PaymentOption();
	$option->setCallToActionText($this->l('Pay by CREDIT/DEBIT CARD'))
			->setForm($this->getForm())
			->setAdditionalInformation($this->context->smarty->fetch('module:prismpay/views/templates/front/payment_infos.tpl'))
			->setLogo(Media::getMediaPath(_PS_MODULE_DIR_.$this->name.'/logo.png'));
	$paymentOptions[] = $option;

	return $paymentOptions;
}


public function checkCurrency($cart)
{
$currency_order = new Currency($cart->id_currency);
$currencies_module = $this->getCurrency($cart->id_currency);

if (is_array($currencies_module)) {
	foreach ($currencies_module as $currency_module) {
		if ($currency_order->id == $currency_module['id_currency']) {
			return true;
		}
	}
}
return false;
}
public function is_digit($digit) {
		if(is_int($digit)) {
			return true;
		} elseif(is_string($digit)) {
			return ctype_digit($digit);
		} else {
			// booleans, floats and others
			return false;
		}
	}


    protected function getForm()
    {

        $this->context->smarty->assign([
            'action' => $this->context->link->getModuleLink($this->name, 'validation', array(), true),
        ]);

        return $this->context->smarty->fetch('module:prismpay/views/templates/front/payment_form.tpl');
    }
/*
	public function hookActionChangeOrderStatus($params) {
		$id_order = $params['params']['id_order'];
		$id_lang = $this->context->language->id;
		$order = new Order((int) $id_order);
		$idCurrentState = $order->getCurrentState();
		$obj_order_state = new OrderState((int) $idCurrentState, $id_lang);
		$statuses = OrderState::getOrderStates((int) $id_lang);
		Media::addJsDefL('adminorder', $this->context->link->getAdminLink('AdminChangeOrderStatus'));
		$this->context->smarty->assign(array(
			'statuses' => $statuses,
			'obj_order_state' => $obj_order_state,
			'modules_dir' => _MODULE_DIR_,
			'idCurrentState' => $idCurrentState,
			'id_order' => $id_order,
		)
		);
		unset($order);

		return $this->display(__FILE__, 'changestatus.tpl');
	} */

}
?>