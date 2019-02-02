<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
if (!defined('_PS_VERSION_'))
	exit;

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
class StQrCode extends Module implements WidgetInterface
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    private $validation_errors = array();
    private $qr_api_url = '//chart.googleapis.com/chart?';
    private $_hooks = array();
	public function __construct()
	{
		$this->name          = 'stqrcode';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
        
		parent::__construct();
        
        $this->initHookArray();
        
        $this->displayName = $this->getTranslator()->trans('QR code', array(), 'Modules.Stqrcode.Admin');
        $this->description = $this->getTranslator()->trans('Add QR code to your site.', array(), 'Modules.Stqrcode.Admin');
        
	}
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
                    'id' => 'displayNav1',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Topbar left (displayNav1)', array(), 'Admin.Theme.Transformer')
                ),
                array(
        			'id' => 'displayNav2',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Topbar right (displayNav2)', array(), 'Admin.Theme.Transformer')
        		),
        		array(
        			'id' => 'displayNav3',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Topbar center (displayNav3)', array(), 'Admin.Theme.Transformer')
        		),
                array(
        			'id' => 'displayTop',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Header right(Header top)', array(), 'Admin.Theme.Transformer')
        		),
                array(
                    'id' => 'displayHeaderCenter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Header center', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHeaderLeft',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Header left', array(), 'Admin.Theme.Transformer')
                ),
        		array(
        			'id' => 'displayHeaderBottom',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Header bottom', array(), 'Admin.Theme.Transformer')
        		),

                array(
                    'id' => 'displayProductNameRight',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductNameRight', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayProductPriceRight',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductPriceRight', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayProductCartRight',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductCartRight', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayLeftColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayLeftColumnProduct', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayProductLeftColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductLeftColumn', array(), 'Admin.Theme.Transformer')
                ),
        		array(
        			'id' => 'displayProductCenterColumn',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayProductCenterColumn', array(), 'Admin.Theme.Transformer')
        		),
        		array(
        			'id' => 'displayProductRightColumn',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayProductRightColumn', array(), 'Admin.Theme.Transformer')
        		),
                array(
        			'id' => 'displayRightColumnProduct',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayRightColumnProduct', array(), 'Admin.Theme.Transformer')
        		),
            ),
        );
    }
    
    private function saveHook()
    {
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                $id_hook = Hook::getIdByName($value['id']);
                
                if (Tools::getValue($key.'_'.$value['id']))
                {
                    if ($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                        continue;
                    if (!$this->isHookableOn($value['id']))
                        $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to ', array(), 'Admin.Theme.Transformer').$value['id'];
                    else
                        $rs = $this->registerHook($value['id'], Shop::getContextListShopID());
                }
                else
                {
                    if($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                    {
                        $this->unregisterHook($id_hook, Shop::getContextListShopID());
                        $this->unregisterExceptions($id_hook, Shop::getContextListShopID());
                    } 
                }
            }
        }
        // clear module cache to apply new data.
        Cache::clean('hook_module_list');
    }

	public function install()
	{
		if (!parent::install()
            || !$this->registerHook('displayHeader')
            || !$this->registerHook('displayProductCartRight')
            || !$this->registerHook('displaySideBar')
            || !Configuration::updateValue('ST_QR_SIZE', 150)
            || !Configuration::updateValue('ST_QR_MARGIN', 2)
            || !Configuration::updateValue('ST_QR_LOAD', 1)
            || !Configuration::updateValue('ST_QR_LABEL', 0)
        )
			return false;
		return true;
	}
    
    public function getContent()
	{
	    $this->initFieldsForm();
		if (isset($_POST['savestqrcode']))
		{
            foreach($this->fields_form as $form)
                foreach($form['form']['input'] as $field)
                    if(isset($field['validation']))
                    {
                        $errors = array();       
                        $value = Tools::getValue($field['name']);
                        if (isset($field['required']) && $field['required'] && $value==false && (string)$value != '0')
        						$errors[] = sprintf(Tools::displayError('Field "%s" is required.'), $field['label']);
                        elseif($value)
                        {
                            $field_validation = $field['validation'];
        					if (!Validate::$field_validation($value))
        						$errors[] = sprintf(Tools::displayError('Field "%s" is invalid.'), $field['label']);
                        }
        				// Set default value
        				if ($value === false && isset($field['default_value']))
        					$value = $field['default_value'];
                        
                        if(count($errors))
                        {
                            $this->validation_errors = array_merge($this->validation_errors, $errors);
                        }
                        elseif($value==false)
                        {
                            switch($field['validation'])
                            {
                                case 'isUnsignedId':
                                case 'isUnsignedInt':
                                case 'isInt':
                                case 'isBool':
                                    $value = 0;
                                break;
                                default:
                                    $value = '';
                                break;
                            }
                            Configuration::updateValue('ST_QR_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_QR_'.strtoupper($field['name']), $value);
                    }
                    
            $this->saveHook();                                   
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
                $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Admin.Theme.Transformer'));
        }

		$helper = $this->initForm();
        
		return $this->_html.$helper->generateForm($this->fields_form);
	}
    protected function initFieldsForm()
    {
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->displayName,
                'icon' => 'icon-cogs'
			),
            'input' => array(
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('QR image size:', array(), 'Modules.Stqrcode.Admin'),
					'name' => 'size',
                    'default_value' => 150,
                    'required' => true,
                    'desc' => $this->getTranslator()->trans('The size of QR image, default is 150.', array(), 'Modules.Stqrcode.Admin'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Margin:', array(), 'Admin.Theme.Transformer'),
					'name' => 'margin',
                    'default_value' => 2,
                    'required' => true,
                    'desc' => $this->getTranslator()->trans('The width of the white border around the data portion of the code, the range is 0-40 ,default is 2.', array(), 'Modules.Stqrcode.Admin'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('Dynamically load QR code:', array(), 'Modules.Stqrcode.Admin'),
					'name' => 'load',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'load_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'load_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
					),
                    'validation' => 'isBool',
				),

                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to display:', array(), 'Modules.Stqrcode.Admin'),
                    'name' => 'label',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'label_both',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('QR code icon + Text', array(), 'Modules.Stqrcode.Admin')),
                        array(
                            'id' => 'label_name',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Text', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'label_flag',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('QR code icon', array(), 'Modules.Stqrcode.Admin')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('   Save   ', array(), 'Admin.Actions')
			)
		);
        
        $this->fields_form[1]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Hook manager', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
            'description' => $this->getTranslator()->trans('Check the hook that you would like this module to display on.', array(), 'Admin.Theme.Transformer').'<br/><a href="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" target="_blank" >'.$this->getTranslator()->trans('Click here to see hook position', array(), 'Admin.Theme.Transformer').'</a>.',
			'input' => array(
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);
        
        foreach($this->_hooks AS $key => $values)
        {
            if (!is_array($values) || !count($values))
                continue;
            $this->fields_form[1]['form']['input'][] = array(
					'type' => 'checkbox',
					'label' => $key,
					'name' => $key,
					'lang' => true,
					'values' => array(
						'query' => $values,
						'id' => 'id',
						'name' => 'name'
					)
				);
        }
        
    }
    protected function initForm()
	{
	    $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
        $helper->module = $this;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestqrcode';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    
    private function _generateQR()
    {
        $chs = Configuration::get('ST_QR_SIZE') ? Configuration::get('ST_QR_SIZE') : 150;
        $margin = (int)Configuration::get('ST_QR_MARGIN');
        $load = (int)Configuration::get('ST_QR_LOAD');
        $page_name = Dispatcher::getInstance()->getController();
        if ($page_name == 'product') {
            $url = $this->context->link->getProductLink(Tools::getValue('id_product'));
        } else {
            $url = $this->context->link->getBaseLink();
        }
        $image_link = $this->qr_api_url.'chs='.$chs.'x'.$chs.'&cht=qr&chld=L|'.$margin.'&chl='.urlencode($url); 
        
        $this->smarty->assign(array(
            'qr_load' => $load,
            'qr_size' => $chs,
            'qr_image_link' => $image_link,
            'qr_label' => (int)Configuration::get('ST_QR_LABEL'),
        ));
        return true;        
    }
    
    public function hookDisplayHeader($params)
    {
        $this->context->controller->addJS(($this->_path).'views/js/stqrcode.js');
    }
    
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'size' => Configuration::get('ST_QR_SIZE'),
            'margin' => Configuration::get('ST_QR_MARGIN'),
            'load' => Configuration::get('ST_QR_LOAD'),
            'label' => Configuration::get('ST_QR_LABEL'),
        );
        
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                $fields_values[$key.'_'.$value['id']] = 0;
                if($id_hook = Hook::getIdByName($value['id']))
                    if(Hook::getModulesFromHook($id_hook, $this->id))
                        $fields_values[$key.'_'.$value['id']] = 1;
            }
        }
        
        return $fields_values;
    }

    /*public function hookDisplayRightBar($params)
    {
        return $this->display(__FILE__, 'stqrcode.tpl');
    }*/
    
    public function hookDisplaySideBar($params)
    {
        $this->_generateQR();
        return $this->display(__FILE__, 'stqrcode-side.tpl');
    }
    protected function stGetCacheId($key,$name = null)
    {
        $cache_id = parent::getCacheId($name);
        return $cache_id.'_'.$key;
    }
    public function renderWidget($hookName = null, array $configuration = [])
    {
        if (strpos($hookName, 'display') === false) {
            return;
        }
        if($id_product = (int)Tools::getValue('id_product'))
        {
            $cache_id = 'product-'.$id_product;
            if (!$this->isCached('module:stqrcode/views/templates/hook/stqrcode-nav.tpl', $this->stGetCacheId($cache_id)))
                $this->_generateQR();
            return $this->fetch('module:stqrcode/views/templates/hook/stqrcode-nav.tpl', $this->stGetCacheId($cache_id));
        }
        else
        {
            $this->_generateQR();
            return $this->fetch('module:stqrcode/views/templates/hook/stqrcode-nav.tpl');
        }
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return;
    }
}