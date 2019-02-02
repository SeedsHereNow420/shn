<?php
/*
* 2007-2017 PrestaShop
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*/

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

if (!defined('_PS_VERSION_')) {
    exit;
}

class StCustomerSignIn extends Module implements WidgetInterface
{
    private $templateFile = array();
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    private $_hooks = array();

	public function __construct()
	{
		$this->name = 'stcustomersignin';
		$this->tab = 'front_office_features';
		$this->version = '0.3.4';
		$this->author = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap     = true;

		parent::__construct();

		$this->displayName = $this->getTranslator()->trans('Customer "Sign in" link mod', array(), 'Modules.Stcustomersignin.Admin');
		$this->description = $this->getTranslator()->trans('Adds a block that displays information about the customer.', array(), 'Modules.Stcustomersignin.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);

        $this->templateFile = array(
            'module:stcustomersignin/views/templates/hook/stcustomersignin.tpl',
            'module:stcustomersignin/views/templates/hook/stcustomersignin-mobile.tpl',
            'module:stcustomersignin/views/templates/hook/mobilebar.tpl'
            );
	}
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
        			'id' => 'displayNav1',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Topbar left(displayNav1)', array(), 'Admin.Theme.Transformer')
        		),
                array(
                    'id' => 'displayNav3',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Topbar center(displayNav3)', array(), 'Admin.Theme.Transformer'),
                ),
        		array(
        			'id' => 'displayNav2',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Topbar right(displayNav2)', array(), 'Admin.Theme.Transformer')
        		),
                array(
                    'id' => 'displayHeaderLeft',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Header left', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHeaderCenter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Header center', array(), 'Admin.Theme.Transformer')
                ),
        		array(
        			'id' => 'displayTop',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Header right(Header top)', array(), 'Admin.Theme.Transformer')
        		),
                array(
                    'id' => 'displayHeaderBottom',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Header bottom', array(), 'Admin.Theme.Transformer')
                ),

                /*array(
                    'id' => 'displayMobileBar',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Mobile Bar', array(), 'Admin.Theme.Transformer').$this->getTranslator()->trans(' - User center(My account infomation, language switcher and search box)', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayMobileBarLeft',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Mobile Bar left', array(), 'Admin.Theme.Transformer').$this->getTranslator()->trans(' - User center(My account infomation, language switcher and search box)', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayMobileBarCenter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Mobile Bar center', array(), 'Admin.Theme.Transformer').$this->getTranslator()->trans(' - User center(My account infomation, language switcher and search box)', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayMobileBarBottom',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Mobile Bar bottom', array(), 'Admin.Theme.Transformer').$this->getTranslator()->trans(' - User center(My account infomation, language switcher and search box)', array(), 'Admin.Theme.Transformer'),
                ),*/

                array(
                    'id' => 'displayMobileNav',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayMobileNav', array(), 'Admin.Theme.Transformer')
                ),
                array(
        			'id' => 'displayCheckoutHeader',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Checkout page header', array(), 'Admin.Theme.Transformer'),
                    'ref' => 'displayCheckoutMobileNav',
        		),
            )
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
                $val = (int)Tools::getValue($key.'_'.$value['id']);
                $this->_processHook($key, $value['id'], $val);
                if (isset($value['ref']) && $value['ref'])
                    $this->_processHook($key, $value['ref'], $val);
            }
        }
        // clear module cache to apply new data.
        Cache::clean('hook_module_list');
    }
    
    private function _processHook($key='', $hook='', $value=1)
    {
        if (!$key || !$hook)
            return false;
        $rs = true;
        $id_hook = Hook::getIdByName($hook);
        if ($value)
        {
            if ($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                return $rs;
            if (!$this->isHookableOn($hook))
                $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to ', array(), 'Admin.Theme.Transformer').$hook;
            else
                $rs = $this->registerHook($hook, Shop::getContextListShopID());
        }
        else
        {
            if($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
            {
                $rs = $this->unregisterHook($id_hook, Shop::getContextListShopID());
                $rs &= $this->unregisterExceptions($id_hook, Shop::getContextListShopID());
            } 
        }
        return $rs;
    }

	public function install()
	{
		return (parent::install() 
            && $this->registerHook('displayNav2')
            && $this->registerHook('displayMobileNav')
            && $this->registerHook('displayCheckoutHeader')
			&& $this->registerHook('displayCheckoutMobileNav')
            && Configuration::updateValue('ST_USERINFO_DROPDOWN', 1)
            && Configuration::updateValue('ST_USERINFO_LOGIN', 0)
			&& Configuration::updateValue('ST_USERINFO_REDIRECT', 1)
			&& Configuration::updateValue('ST_SHOW_WELCOME_MSG', 0)
            && Configuration::updateValue('ST_SHOW_USER_INFO_ICONS', 0)
            && Configuration::updateValue('ST_SHOW_WISHLIST', 1)
			&& Configuration::updateValue('ST_SHOW_LOVE', 1)
		);
	}
	public function getContent()
	{
	    $this->initHookArray();
	    $this->initFieldsForm();
		if (isset($_POST['savestcustomersignin']))
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
                        
                        if($field['name']=='limit' && $value>20)
                             $value=20;
                        
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
                            Configuration::updateValue('ST_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_'.strtoupper($field['name']), $value);
                    }
            
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else
            {
                $this->saveHook();
                $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Admin.Theme.Transformer'));
            }  
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
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display links in a drop down menu after login:', array(), 'Modules.Stcustomersignin.Admin'),
                    'name' => 'userinfo_dropdown',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'userinfo_dropdown_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'userinfo_dropdown_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ), 
                /*array(
					'type' => 'switch',
					'label' => $this->getTransLator()->trans('show welcome Message on mobile:', array(), 'Modules.Stcustomersignin.Admin'),
					'name' => 'show_welcome_msg',
                    'default_value' => 0,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'show_welcome_msg_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'show_welcome_msg_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
					),
                    'validation' => 'isBool',
                    'desc' => $this->gettranslator()->trans('Screen width < 992px.', array(), 'Admin.Theme.Transformer'),
				),*/
                array(
                    'type' => 'switch',
                    'label' => $this->getTransLator()->trans('Quick login:', array(), 'Modules.Stcustomersignin.Admin'),
                    'name' => 'userinfo_login',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'userinfo_login_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'userinfo_login_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    'desc' => $this->gettranslator()->trans('It is recommended to enable SSL when you enable this option.', array(), 'Modules.Stcustomersignin.Admin'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Redirect after logging in:', array(), 'Modules.Stcustomersignin.Admin'),
                    'name' => 'userinfo_redirect',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'userinfo_redirect_current',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Current page', array(), 'Modules.Stcustomersignin.Admin')),
                        array(
                            'id' => 'userinfo_redirect_my_account',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('My account', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'userinfo_redirect_index',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Index', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to display:', array(), 'Modules.Stcustomersignin.Admin'),
                    'name' => 'show_user_info_icons',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'show_user_info_icons_text',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Text', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'show_user_info_icons_both',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Icon + Text', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'show_user_info_icons_icon',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Icon', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->gettranslator()->trans('Go the the theme editor module to set icon.', array(), 'Modules.Stcustomersignin.Admin'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display "Wishlist" link in the drop down menu:', array(), 'Modules.Stcustomersignin.Admin'),
                    'name' => 'show_wishlist',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'show_wishlist_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'show_wishlist_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display "Loved item" link in the drop down menu:', array(), 'Modules.Stcustomersignin.Admin'),
                    'name' => 'show_love',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'show_love_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'show_love_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ), 

			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
			)
		);
        
        $this->fields_form[1]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Hook manager', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
            'description' => $this->getTranslator()->trans('check the hook that you would like this module to display on.', array(), 'Admin.Theme.Transformer').'<br/><a href="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" target="_blank" >'.$this->getTranslator()->trans('click here to see hook position', array(), 'Admin.Theme.Transformer').'</a>.',
			'input' => array(
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
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
		$helper->submit_action = 'savestcustomersignin';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}

    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'userinfo_dropdown' => Configuration::get('ST_USERINFO_DROPDOWN'),
            'userinfo_login' => Configuration::get('ST_USERINFO_LOGIN'),
            'userinfo_redirect' => Configuration::get('ST_USERINFO_REDIRECT'),
            // 'show_welcome_msg' => Configuration::get('ST_SHOW_WELCOME_MSG'),
            'show_user_info_icons' => Configuration::get('ST_SHOW_USER_INFO_ICONS'),
            'show_wishlist' => Configuration::get('ST_SHOW_WISHLIST'),
            'show_love' => Configuration::get('ST_SHOW_LOVE'),
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

    public function getWidgetVariables($hookName, array $configuration)
    {
        $logged = $this->context->customer->isLogged();
        if ($logged) {
            $customerName = $this->getTranslator()->trans(
                '%firstname% %lastname%',
                array(
                    '%firstname%' => $this->context->customer->firstname,
                    '%lastname%' => $this->context->customer->lastname,
                ),
                'Modules.Stcustomersignin.Admin'
            );
        } else {
            $customerName = '';
        }

        $link = $this->context->link;

        $userinfo_dropdown = Configuration::get('ST_USERINFO_DROPDOWN');
        $variables = array(
            'logged'            => $logged,
            'customerName'        => $customerName,
            'logout_url'        => $link->getPageLink('index', true, null, 'mylogout'),
            'my_account_url'    => $link->getPageLink('my-account', true),
            'authentication_url'    => $link->getPageLink('authentication'),
            'userinfo_dropdown'    => $userinfo_dropdown,
            'show_user_info_icons'    => Configuration::get('ST_SHOW_USER_INFO_ICONS'),
            'welcome_logged'    => Configuration::get('STSN_WELCOME_LOGGED', $this->context->language->id),
            'welcome_link'    => Configuration::get('STSN_WELCOME_LINK', $this->context->language->id),
            'welcome'    => Configuration::get('STSN_WELCOME', $this->context->language->id),
            'userinfo_login'    => Configuration::get('ST_USERINFO_LOGIN'),
            'show_wishlist'    => $userinfo_dropdown && Configuration::get('ST_SHOW_WISHLIST') && Module::isInstalled('stwishlist') && Module::isEnabled('stwishlist'),
            'show_love'    => $userinfo_dropdown && Configuration::get('ST_SHOW_LOVE') && Module::isInstalled('stlovedproduct') && Module::isEnabled('stlovedproduct'),
        );
        if(Configuration::get('ST_USERINFO_LOGIN'))
        {
            $formatter = new CustomerLoginFormatter($this->getTranslator());
            $formFields = $formatter->getFormat();

            $variables['formFields'] = array_map(
                function (FormField $field) {
                    return $field->toArray();
                },
                $formFields
            );
            $userinfo_redirect = Configuration::get('ST_USERINFO_REDIRECT');
            $variables['formFields']['back']['value'] = ($userinfo_redirect==1 ? 'my-account' : ($userinfo_redirect==2 ? 'index' : $this->context->shop->getBaseURL(true, false).$_SERVER['REQUEST_URI']));
            $variables['formFields']['back']['value'] = 'my-account';
        }

        return $variables;
    }

    public function renderWidget($hookName, array $configuration)
    {
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));

        /*if($hookName=='displayNavLeft' || $hookName=='displayHeaderLeft')
            $this->smarty->assign(array('userinfo_navleft' => true));*/
        if($hookName=='displayCheckoutHeader')//do not display quick login on the checkout page
            $this->smarty->assign(array('userinfo_login' => 0));

        return $this->fetch($hookName=='displayMobileNav' || $hookName=='displayCheckoutMobileNav' ? $this->templateFile[1] : $this->templateFile[0]);
    }
}