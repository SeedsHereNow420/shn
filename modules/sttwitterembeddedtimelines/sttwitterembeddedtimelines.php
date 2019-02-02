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

class StTwitterEmbeddedTimelines extends Module implements WidgetInterface
{
    private $_html = '';
    private $_prefix_st = 'ST_TW_';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    private $templateFile = array();
    public static $wide_map = array(
        array('id'=>'1', 'name'=>'1/12'),
        array('id'=>'1-2', 'name'=>'1.2/12'),
        array('id'=>'1-5', 'name'=>'1.5/12'),
        array('id'=>'2', 'name'=>'2/12'),
        array('id'=>'2-4', 'name'=>'2.4/12'),
        array('id'=>'4', 'name'=>'4/12'),
        array('id'=>'5', 'name'=>'5/12'),
        array('id'=>'6', 'name'=>'6/12'),
        array('id'=>'7', 'name'=>'7/12'),
        array('id'=>'8', 'name'=>'8/12'),
        array('id'=>'9', 'name'=>'9/12'),
        array('id'=>'10', 'name'=>'10/12'),
        array('id'=>'11', 'name'=>'11/12'),
        array('id'=>'12', 'name'=>'12/12'),
    );
    private $_hooks = array();
	public function __construct()
	{
		$this->name          = 'sttwitterembeddedtimelines';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap     = true;
		
		parent::__construct();
		
        $this->displayName = $this->getTranslator()->trans('Twitter Embedded Timelines', array(), 'Modules.Sttwitterembeddedtimelines.Admin');
        $this->description = $this->getTranslator()->trans('Display the recent tweets of a twitter user', array(), 'Modules.Sttwitterembeddedtimelines.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->templateFile = array(
            'module:sttwitterembeddedtimelines/views/templates/hook/sttwitterembeddedtimelines.tpl',
            'module:sttwitterembeddedtimelines/views/templates/hook/sttwitterembeddedtimelines-footer.tpl'
            );


        $this->initHookArray();//render uses it, so it got to be here
	}

	public function install()
	{
		if (!parent::install() 
			//|| !$this->registerHook('displayFooter')
            || !Configuration::updateValue($this->_prefix_st.'NAME', '')
            || !Configuration::updateValue($this->_prefix_st.'WIDGET_ID', '')
            || !Configuration::updateValue($this->_prefix_st.'HEIGHT', 0)
            || !Configuration::updateValue($this->_prefix_st.'LINK_COLOR', '#00A161')
            || !Configuration::updateValue($this->_prefix_st.'THEME', 'light')
            || !Configuration::updateValue($this->_prefix_st.'NOHEADER', 1)
            || !Configuration::updateValue($this->_prefix_st.'NOFOOTER', 1)
            || !Configuration::updateValue($this->_prefix_st.'NOBORDERS', 1)
            || !Configuration::updateValue($this->_prefix_st.'NOSCROLLBAR', 1)
            || !Configuration::updateValue($this->_prefix_st.'TRANSPARENT', 1)
            || !Configuration::updateValue($this->_prefix_st.'BORDER_COLOR', '')
            || !Configuration::updateValue($this->_prefix_st.'LANGUAGE', '')
            || !Configuration::updateValue($this->_prefix_st.'LIMIT', 2)
            || !Configuration::updateValue($this->_prefix_st.'LANGUAGE', '')
            || !Configuration::updateValue($this->_prefix_st.'SCREEN_NAME', '')
            || !Configuration::updateValue($this->_prefix_st.'SHOW_REPLIES', 0)
            || !Configuration::updateValue($this->_prefix_st.'WIDE_ON_FOOTER', 3)

        )
			return false;
		return true;
	}
    
    private function initHookArray()
    {
        $this->_hooks = array(
           'Column' => array(
        		array(
        			'id' => 'displayLeftColumn',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Left column except the produt page', array(), 'Admin.Theme.Transformer')
        		),
                array(
                    'id' => 'displayRightColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Right column except the produt page', array(), 'Admin.Theme.Transformer')
                ),
                array(
        			'id' => 'displayLeftColumnProduct',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('Left column on the product page only', array(), 'Admin.Theme.Transformer')
        		),
                array(
                    'id' => 'displayRightColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Right column on the product page only', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeFirstQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeFirstQuarter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeSecondQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeSecondQuarter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeThirdQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeThirdQuarter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeFourthQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeFourthQuarter', array(), 'Admin.Theme.Transformer')
                ),
            ),
            'Footer' => array(
                array(
                    'id' => 'displayStackedFooter1',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 1', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter2',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 2', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter3',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 3', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter4',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 4', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter5',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 5', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter6',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 6', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                ),        
                array(
                    'id' => 'displayFooter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayFooterAfter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooterAfter', array(), 'Admin.Theme.Transformer')
                )
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

    public function getContent()
	{
	    $this->initFieldsForm();
		if (isset($_POST['savesttwitterembeddedtimelines']))
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
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value);
                    }
            
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else {
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
            'description' => '<a href="https://dev.twitter.com/docs/embedded-timelines#customization" target="_blank">'.$this->getTranslator()->trans('The customisation documentation.', array(), 'Modules.Sttwitterembeddedtimelines.Admin').'</a>', 
			'input' => array(
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Twitter user name:', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
					'name' => 'name',
                    'size' => 64,
                    'validation' => 'isGenericName',
				),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Widget ID:', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
					'name' => 'widget_id',
                    'size' => 64,
                    'desc' => '<a href="https://twitter.com/settings/widgets" target="_blank">'.$this->getTranslator()->trans('Create your own embedded timeline.', array(), 'Modules.Sttwitterembeddedtimelines.Admin').'</a>',
                    'validation' => 'isAnything',
				),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Height:', array(), 'Admin.Theme.Transformer'),
					'name' => 'height',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg'
				),
				 array(
					'type' => 'color',
					'label' => $this->getTranslator()->trans('Link color:', array(), 'Admin.Theme.Transformer'),
					'name' => 'link_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                 array(
					'type' => 'select',
        			'label' => $this->getTranslator()->trans('Theme:', array(), 'Admin.Theme.Transformer'),
        			'name' => 'theme',
                    'options' => array(
        				'query' => array(
                            array('id' => 'dark', 'name' => 'dark'),
		                    array('id' => 'light', 'name' => 'light'),
                        ),
        				'id' => 'id',
        				'name' => 'name',
        			),
                    'validation' => 'isGenericName',
				),
                array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('No header:', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
					'name' => 'noheader',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'noheader_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'noheader_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('No Footer:', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
					'name' => 'nofooter',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'nofooter_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'nofooter_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('No Borders:', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
					'name' => 'noborders',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'noborders_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'noborders_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
					),
                    'validation' => 'isBool',
				), 
				 array(
					'type' => 'color',
					'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
					'name' => 'border_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('No scrollbar:', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
					'name' => 'noscrollbar',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'noscrollbar_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'noscrollbar_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('Transparent:', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
					'name' => 'transparent',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'transparent_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'transparent_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Tweet limit:', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
					'name' => 'limit',
                    'default_value' => 2,
                    'required' => true,
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('The height setting above will be disregard, if this vaule is larger than 0', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
				), 
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Language:', array(), 'Admin.Theme.Transformer'),
					'name' => 'language',
                    'size' => 64,
                    'desc' => '<a href="http://en.wikipedia.org/wiki/List_of_ISO_639-1_codes" target="_blank">ISO_639-1</a> eg. EN,FR',
                    'validation' => 'isLanguageIsoCode',
				),  
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Screen name:', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
					'name' => 'screen_name',
                    'size' => 64,
                    'desc' => $this->getTranslator()->trans('Whose timeline you want to display.', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
                    'validation' => 'isGenericName',
				),
                array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('Show replies:', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
					'name' => 'show_replies',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'show_replies_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'show_replies_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
					),
                    'validation' => 'isBool',
                    'desc' => $this->getTranslator()->trans('You have to fill the screen name for the show replies attribute to take effect', array(), 'Modules.Sttwitterembeddedtimelines.Admin'),
				), 
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Wide on footer:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'wide_on_footer',
                    'options' => array(
                        'query' => self::$wide_map,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 3,
                            'label' => '3/12',
                        ),
                    ),
                    'validation' => 'isGenericName',
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
				'title' => $this->getTranslator()->trans('   Save all  ', array(), 'Admin.Theme.Transformer')
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
		$helper->submit_action = 'savesttwitterembeddedtimelines';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    
    public function renderWidget($hookName = null, array $configuration = [])
    {
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        $is_footer_hook = $is_stacked_footer = false;
        foreach($this->_hooks['Footer'] AS $hook)
        {
            if(Tools::strtolower($hook['id']) == Tools::strtolower($hookName))
            {
                $is_footer_hook = true;
                $is_stacked_footer = isset($hook['is_stacked_footer']);
                break;
            }
        }
        $this->smarty->assign(array(
            'is_stacked_footer' => $is_stacked_footer,
        ));
        return $this->fetch($is_footer_hook ? $this->templateFile[1] : $this->templateFile[0]);
    }

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        if(!Configuration::get($this->_prefix_st.'NAME') || !Configuration::get($this->_prefix_st.'WIDGET_ID'))
            return false;
        return array(
            'name' => Configuration::get($this->_prefix_st.'NAME'),
            'widget_id' => Configuration::get($this->_prefix_st.'WIDGET_ID'),
            'height' => (int)Configuration::get($this->_prefix_st.'HEIGHT'),
            'link_color' => Configuration::get($this->_prefix_st.'LINK_COLOR'),
            'theme' => Configuration::get($this->_prefix_st.'THEME'),
            'noheader' => (int)Configuration::get($this->_prefix_st.'NOHEADER'),
            'nofooter' => (int)Configuration::get($this->_prefix_st.'NOFOOTER'),
            'noborders' => (int)Configuration::get($this->_prefix_st.'NOBORDERS'),
            'noscrollbar' => (int)Configuration::get($this->_prefix_st.'NOSCROLLBAR'),
            'transparent' => (int)Configuration::get($this->_prefix_st.'TRANSPARENT'),
            'border_color' => Configuration::get($this->_prefix_st.'BORDER_COLOR'),
            'limit' => (int)Configuration::get($this->_prefix_st.'LIMIT'),
            'language' => Configuration::get($this->_prefix_st.'LANGUAGE'),
            'screen_name' => Configuration::get($this->_prefix_st.'SCREEN_NAME'),
            'show_replies' => (int)Configuration::get($this->_prefix_st.'SHOW_REPLIES'),
            'wide_on_footer' => Configuration::get($this->_prefix_st.'WIDE_ON_FOOTER'),
        );
    }
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'name' => Configuration::get($this->_prefix_st.'NAME'),
            'widget_id' => Configuration::get($this->_prefix_st.'WIDGET_ID'),
            'height' => (int)Configuration::get($this->_prefix_st.'HEIGHT'),
            'link_color' => Configuration::get($this->_prefix_st.'LINK_COLOR'),
            'theme' => Configuration::get($this->_prefix_st.'THEME'),
            'noheader' => (int)Configuration::get($this->_prefix_st.'NOHEADER'),
            'nofooter' => (int)Configuration::get($this->_prefix_st.'NOFOOTER'),
            'noborders' => (int)Configuration::get($this->_prefix_st.'NOBORDERS'),
            'noscrollbar' => (int)Configuration::get($this->_prefix_st.'NOSCROLLBAR'),
            'transparent' => (int)Configuration::get($this->_prefix_st.'TRANSPARENT'),
            'border_color' => Configuration::get($this->_prefix_st.'BORDER_COLOR'),
            'limit' => (int)Configuration::get($this->_prefix_st.'LIMIT'),
            'language' => Configuration::get($this->_prefix_st.'LANGUAGE'),
            'screen_name' => Configuration::get($this->_prefix_st.'SCREEN_NAME'),
            'show_replies' => (int)Configuration::get($this->_prefix_st.'SHOW_REPLIES'),
            'wide_on_footer' => Configuration::get($this->_prefix_st.'WIDE_ON_FOOTER'),
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
    public function get_prefix()
    {
        if (isset($this->_prefix_st) && $this->_prefix_st)
            return $this->_prefix_st;
        return false;
    }
}