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

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class StLanguageselector extends Module implements WidgetInterface
{
    private $templateFile = array();
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    private $_hooks = array();
    
	public function __construct()
	{
		$this->name          = 'stlanguageselector';
		$this->tab           = 'front_office_features';
		$this->version       = '1.3.4';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap     = true;

		parent::__construct();
        
		$this->displayName = $this->getTranslator()->trans('Language selector block mod', array(), 'Modules.Stlanguageselector.Admin');
		$this->description = $this->getTranslator()->trans('Adds a language switcher to your site.', array(), 'Modules.Stlanguageselector.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->templateFile = array(
            'module:stlanguageselector/views/templates/hook/stlanguageselector.tpl',
            'module:stlanguageselector/views/templates/hook/stlanguageselector-mobile.tpl'
            );
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
                    'id' => 'displayNav3',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Topbar center (displayNav3)', array(), 'Admin.Theme.Transformer'),
                ),
        		array(
        			'id' => 'displayNav2',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Topbar right (displayNav2)', array(), 'Admin.Theme.Transformer')
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
        			'id' => 'displayFooterBottomLeft',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Footer bottom left', array(), 'Admin.Theme.Transformer')
        		),
        		array(
        			'id' => 'displayFooterBottomRight',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Footer bottom right', array(), 'Admin.Theme.Transformer')
        		),*/
                array(
                    'id' => 'displayCheckoutHeader',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Checkout page header', array(), 'Admin.Theme.Transformer'),
                    'ref' => 'displayCheckoutMobileNav',
                ),
                array(
                    'id' => 'displayMobileNav',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Mobile Nav', array(), 'Admin.Theme.Transformer'),
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
            && $this->registerHook('displayNav1')
            && $this->registerHook('displayMobileNav')
			&& Configuration::updateValue('ST_LANGUAGES_FLAGS', 0)
            && Configuration::updateValue('ST_LANGUAGES_STYLE', 0)
		);
	}

    public function getContent()
	{
	    $this->initHookArray();
	    $this->initFieldsForm();
		if (isset($_POST['savestlanguageselector']))
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
                $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Modules.Stlanguageselector.Admin'));
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
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Language label:', array(), 'Modules.Stlanguageselector.Admin'),
                    'name' => 'languages_flags',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'languages_flags_both',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Flag + name', array(), 'Modules.Stlanguageselector.Admin')),
                        array(
                            'id' => 'languages_flags_name',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Name', array(), 'Modules.Stlanguageselector.Admin')),
                        array(
                            'id' => 'languages_flags_flag',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Flag', array(), 'Modules.Stlanguageselector.Admin')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to display:', array(), 'Modules.Stlanguageselector.Admin'),
                    'name' => 'languages_style',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'languages_style_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('A drop-down list', array(), 'Modules.Stlanguageselector.Admin')),
                        array(
                            'id' => 'languages_style_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Buttons', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
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
            'description' => $this->getTranslator()->trans('Check the hook that you would like this module to display on.', array(), 'Admin.Theme.Transformer').'<br/><a href="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" target="_blank" >'.$this->getTranslator()->trans('Click here to see hook position', array(), 'Admin.Theme.Transformer').'</a>.',
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
		$helper->submit_action = 'savestlanguageselector';
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
            'languages_flags' => Configuration::get('ST_LANGUAGES_FLAGS'),
            'languages_style' => Configuration::get('ST_LANGUAGES_STYLE'),
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
    
    public function renderWidget($hookName = null, array $configuration = [])
    {
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));

        return $this->fetch($hookName=='displayMobileNav' || $hookName=='displayCheckoutMobileNav' ? $this->templateFile[1] : $this->templateFile[0]);
    }

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $languages = Language::getLanguages(true, $this->context->shop->id);

        foreach ($languages as &$lang) {
            $lang['name_simple'] = $this->getNameSimple($lang['name']);
        }

        return array(
            'languages' => $languages,
            'current_language' => array(
                'id_lang' => $this->context->language->id,
                'name' => $this->context->language->name,
                'iso_code' => $this->context->language->iso_code,
                'name_simple' => $this->getNameSimple($this->context->language->name)
            ),
            'display_flags' => Configuration::get('ST_LANGUAGES_FLAGS'),
            'languages_style' => ($hookName=='displayFooterBottomLeft' || $hookName=='displayFooterBottomRight') ? 1 : Configuration::get('ST_LANGUAGES_STYLE'),//display as links when in footer bottom
        );
    }

    private function getNameSimple($name)
    {
        return preg_replace('/\s\(.*\)$/', '', $name);
    }

}


