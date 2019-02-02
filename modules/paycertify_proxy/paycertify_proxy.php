<?php


use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

if (!defined('_PS_VERSION_'))
  exit;
//_PS_VERSION_
class Paycertify_Proxy extends PaymentModule
{
  public function __construct()
  {
    $this->name = 'paycertify_proxy';
    $this->tab = 'payments_gateways';
    $this->version = '1.0';
    $this->author = 'Shijesh B';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    $this->dependencies = array();
   //    $this->controllers = array('validation');
	$this->currencies = true;
	$this->currencies_mode = 'checkbox';
	$this->bootstrap = true;
 
    parent::__construct();
 
    $this->displayName = $this->l('Paycertify Unofficial');
    $this->description = $this->l('For integrating Paycertify into payment gateways to process credit card payments.');
 
    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
 
    if (!Configuration::get('PAYCERTIFY_PROXY_NAME'))      
      $this->warning = $this->l('No name provided');
  
        if (!count(Currency::checkPaymentCurrencies($this->id))) {
            $this->warning = $this->l('No currency has been set for this module.');
        }
  }
  
public function install(){
if (!parent::install()  || !Configuration::updateValue('PAYCERTIFY_PROXY_NAME', 'PAYCERTIFY') || !$this->registerHook('paymentOptions')  || !$this->registerHook('paymentReturn') ) {
return false;
}

return true;
}

public function uninstall(){
if (!parent::uninstall() ||   !Configuration::deleteByName('PAYCERTIFY_PROXY_NAME') ||   !Configuration::deleteByName('PAYCERTIFY_API_KEY') ) {
    return false;
  }
 
  return true;
}

/* 
public function hookDisplayLeftColumn($params)
{
  $this->context->smarty->assign(
      array(
          'paycertify_module_name' => Configuration::get('PAYCERTIFY_PROXY_NAME'),
          'paycertify_module_link' => $this->context->link->getModuleLink('paycertify_proxy', 'display')
      )
  );
  return $this->display(__FILE__, 'paycertify_proxy.tpl');
}
   
public function hookDisplayRightColumn($params)
{
  return $this->hookDisplayLeftColumn($params);
}
   
public function hookDisplayHeader()
{
  $this->context->controller->addCSS($this->_path.'css/paycertify_proxy.css', 'all');
}    
 */
public function hookHeader()
{
  $this->context->controller->addCSS($this->_path.'views/css/paycertifyform.css', 'all');
  $this->context->controller->addJS($this->_path.'views/js/jquery.creditCardValidator.js', 'all');
  $this->context->controller->addJS($this->_path.'views/js/paycertifygeneral9.js', 'all');
  $this->context->controller->addJS($this->_path.'views/js/jquery.mask.min.js', 'all');
  $this->context->controller->addJS($this->_path.'views/js/jquery.validate.min.js', 'all');
  $this->context->controller->addJS($this->_path.'views/js/additional-methods.min.js', 'all');
}  
public function getContent()
{
	$html = '';
	if (Tools::isSubmit('submitConfigPaycertify'))
	{		
        $api_key = strval(Tools::getValue('paycertify_api_key'));
        if ( empty($api_key) || !$api_key   || !Validate::isGenericName($api_key)) 	
            $html .= $this->displayError($this->l('Invalid Api key'));
        else
        {
            Configuration::updateValue('PAYCERTIFY_API_KEY', $api_key);
            $html .= $this->displayConfirmation($this->l('Configuration Saved'));
        }
	}
	$this->context->smarty->assign(array(			
			'module_dir' => $this->_path,						                    
			'PAYCERTIFY_API_KEY' => Configuration::get('PAYCERTIFY_API_KEY'),
	));

	return $html.$this->context->smarty->fetch(dirname(__FILE__).'/views/templates/admin/configuration.tpl');
}


/* public function hookdisplayPayment($params)
{
		echo "I am happening";
	echo "<h1>I am happening</h1>";
	die();
	exit();
} */
public function hookPaymentOptions($params)
//public function hookPaymentOptions()
{
/* 	echo "I am happening";
	echo "<h1>I am happening</h1>";
	die();
	exit(); */
/* 	if (!$this->active) {
		return;
	}
 */
	if (!$this->checkCurrency($params['cart'])) {
		return;
	}
	if( !Configuration::get('PAYCERTIFY_API_KEY')){
		return; 
	}	
/*     $newOption = new PaymentOption();
   // $paymentForm = $this->fetch('module:paycertify_proxy/views/templates/front/payment_infos.tpl');
    $newOption->setCallToActionText($this->trans('Pay with Credit Card - powered by PayCertify', array(), 'Modules.paycertify_proxy.Shop'))
        ->setForm($this->getForm())
        ->setLogo(_MODULE_DIR_.$this->name.'/logo.png')
        ->setAdditionalInformation('your additional Information')
        ->setAction($this->context->link->getModuleLink($this->name, 'payment'));
    return [$newOption];
	 */


	$paymentOptions = [];
	
	$option = new PaymentOption();
	$option->setCallToActionText($this->l('Pay with Visa/MasterCard'))
			->setForm($this->getForm())
			->setAdditionalInformation($this->context->smarty->fetch('module:paycertify_proxy/views/templates/front/payment_infos.tpl'))
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

    protected function getForm()
    {
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[] = sprintf("%02d", $i);
        }

        $years = [];
        for ($i = 0; $i <= 10; $i++) {
            $years[] = date('Y', strtotime('+'.$i.' years'));
        }

        $this->context->smarty->assign([
            'action' => $this->context->link->getModuleLink($this->name, 'validation', array(), true),
            'months' => $months,
            'years' => $years,
        ]);

        return $this->context->smarty->fetch('module:paycertify_proxy/views/templates/front/payment_form.tpl');
    }

}
?>