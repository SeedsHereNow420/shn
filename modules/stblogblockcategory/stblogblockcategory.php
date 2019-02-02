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

class StBlogBlockCategory extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
	public function __construct()
	{
		$this->name          = 'stblogblockcategory';
		$this->tab           = 'front_office_features';
		$this->version       = '1.2.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;
		parent::__construct();
		
        $this->displayName = $this->getTranslator()->trans('Blog Module - Category block', array(), 'Modules.Stblog.Admin');
        $this->description = $this->getTranslator()->trans('Adds a block featuring blog categories.', array(), 'Modules.Stblog.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
	}

	public function install()
	{
		if (!parent::install()
			|| !$this->registerHook('displayStBlogLeftColumn')
			|| !Configuration::updateValue('ST_B_CATEG_MAX_DEPTH', 3)
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
		if (isset($_POST['savestblogblockcategory']))
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
                            Configuration::updateValue('ST_B_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_B_'.strtoupper($field['name']), $value);
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
					'label' => $this->getTranslator()->trans('Maximum depth:', array(), 'Modules.Stblog.Admin'),
					'name' => 'categ_max_depth',
                    'desc' => $this->getTranslator()->trans('Set the maximum depth of sublevels displayed in this block (0 = infinite)', array(), 'Modules.Stblog.Admin'),
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
		$helper->submit_action = 'savestblogblockcategory';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}

	public function hookDisplayLeftColumn($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
        include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogCategory.php');
            
        $root_categroy = StBlogCategory::getShopCategoryRoot($this->context->language->id);    
        if(!is_array($root_categroy) || !isset($root_categroy['id_st_blog_category']) || !$root_categroy['id_st_blog_category'])
            return false;
        $categories = StBlogCategory::getCategories($root_categroy['id_st_blog_category'],$this->context->language->id);  
         
        if(!is_array($categories) || !count($categories))
            return false;
            
		$id_st_blog_category = (int)Tools::getValue('id_st_blog_category');
		$id_st_blog = (int)Tools::getValue('id_st_blog');
		
		if ($id_st_blog_category)
		{
			$this->smarty->assign('currentCategoryId', $id_st_blog_category);
			$this->context->cookie->last_visited_category_blog = $id_st_blog_category;
		}
		if ($id_st_blog)
		{
			$blog = new StBlogClass($id_st_blog,(int)$this->context->language->id);
            
			if (!isset($this->context->cookie->last_visited_category_blog)
					|| !StBlogClass::idIsOnCategoryId($id_st_blog, array('0' => array('id_category' => $this->context->cookie->last_visited_category_blog)))
					|| !StBlogCategory::inShopStatic($this->context->cookie->last_visited_category_blog, $this->context->shop))
            {
			     if (isset($blog) && Validate::isLoadedObject($blog))
					$this->context->cookie->last_visited_category_blog = (int)$blog->id_st_blog_category_default;
			}
            
			if (isset($blog) && Validate::isLoadedObject($blog))
			     $this->smarty->assign('currentCategoryId', (int)$blog->id_st_blog_category_default);
		}
        
        $maxdepth = Configuration::get('ST_B_CATEG_MAX_DEPTH');
        if(!$maxdepth || !Validate::isUnsignedInt($maxdepth))
            $maxdepth = 3;
		$this->smarty->assign(array(
            'maxdepth' => $maxdepth,
            'categories' => $categories,
        ));
               
		return $this->display(__FILE__, 'stblogblockcategory.tpl');
	}
	public function hookDisplayRightColumn($params)
	{
        return $this->hookDisplayLeftColumn($params); 
	}
	public function hookDisplayStBlogRightColumn($params)
	{
        return $this->hookDisplayLeftColumn($params); 
	}
	public function hookDisplayStBlogLeftColumn($params)
	{
        return $this->hookDisplayLeftColumn($params); 
	}
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'categ_max_depth' => Configuration::get('ST_B_CATEG_MAX_DEPTH'),
        );
        return $fields_values;
    }
}