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

define('BLOGTAGS_MAX_LEVEL', 3);
class StBlogTags extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
	public function __construct()
	{
		$this->name          = 'stblogtags';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;
		parent::__construct();
		
        $this->displayName = $this->getTranslator()->trans('Blog Module - Tags block', array(), 'Modules.Stblog.Admin');
        $this->description = $this->getTranslator()->trans('Adds a block containing blog tags.', array(), 'Modules.Stblog.Admin');
	}

	public function install()
	{
		if (!parent::install() 
			|| !$this->registerHook('displayStBlogLeftColumn')
			|| !$this->registerHook('displayStBlogRightColumn')
			|| !Configuration::updateValue('ST_BLOG_TAGS_NBR', 4)
        )
			return false;
		return true;
	}

    public function getContent()
	{
	    if(!Module::isInstalled('stblog'))
            $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Please, install Blog module first.', array(), 'Modules.Stblog.Admin'));
	    if(!Module::isEnabled('stblog'))
            $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Please, enable Blog module first.', array(), 'Modules.Stblog.Admin'));
            
	    $this->initFieldsForm();
		if (isset($_POST['savestblogtags']))
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
                            Configuration::updateValue('ST_BLOG_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_BLOG_'.strtoupper($field['name']), $value);
                    }
            
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
                $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Modules.Stblog.Admin'));
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
					'label' => $this->getTranslator()->trans('Tags displayed:', array(), 'Modules.Stblog.Admin'),
					'name' => 'tags_nbr',
					'desc' => $this->getTranslator()->trans('Define the number of tags you would like displayed in this block.', array(), 'Modules.Stblog.Admin'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('   Save   ', array(), 'Modules.Stblog.Admin')
			)
		);
        
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
		$helper->submit_action = 'savestblogtags';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    
	public function hookDisplayStBlogLeftColumn($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
            
        include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogTagClass.php');
        
        $nbr = Configuration::get('ST_BLOG_TAGS_NBR');
        if(!$nbr)
            $nbr = 10;
            
        $tags = StBlogTagClass::getMainTags($this->context->language->id,$nbr);
        
		if (!$tags)
			return false;
            
		$max = -1;
		$min = -1;
		foreach ($tags as $tag)
		{
			if ($tag['times'] > $max)
				$max = $tag['times'];
			if ($tag['times'] < $min || $min == -1)
				$min = $tag['times'];
		}
		
		if ($min == $max)
			$coef = $max;
		else
		{
			$coef = (BLOGTAGS_MAX_LEVEL - 1) / ($max - $min);
		}
		
		foreach ($tags AS &$tag)
			$tag['class'] = 'tag_level'.(int)(($tag['times'] - $min) * $coef + 1);
            
		$this->smarty->assign(array(
            'tags' => $tags,
        ));
        
		return $this->display(__FILE__, 'stblogtags.tpl');
	}
	public function hookDisplayStBlogRightColumn($params)
	{
        return $this->hookDisplayStBlogLeftColumn($params); 
	}
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'tags_nbr' => Configuration::get('ST_BLOG_TAGS_NBR'),
        );
        return $fields_values;
    }
}