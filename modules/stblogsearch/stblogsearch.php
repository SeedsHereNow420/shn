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

class StBlogSearch extends Module
{
    private $_html = '';
    private $validation_errors = array();
    public static $moduleRoutes = array();
    
    public static $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Date add: Desc'),
        2 => array('id' =>2 , 'name' => 'Date add: Asc'),
        3 => array('id' =>3 , 'name' => 'Date update: Desc'),
        4 => array('id' =>4 , 'name' => 'Date update: Asc'),
        5 => array('id' =>5 , 'name' => 'Blog Name: A to Z'),
        6 => array('id' =>6 , 'name' => 'Blog Name: Z to A'),
        7 => array('id' =>7 , 'name' => 'Blog ID: Desc'),
        8 => array('id' =>8 , 'name' => 'Blog ID: Asc'),
    );
    
    public $selection_search = array();
    
	public function __construct()
	{
		$this->name          = 'stblogsearch';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;
		parent::__construct();
        
        $this->displayName = $this->getTranslator()->trans('Blog Module - Search', array(), 'Modules.Stblog.Admin');
        $this->description = $this->getTranslator()->trans('Blog search.', array(), 'Modules.Stblog.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->controllers = array('default');
        
        $route = Configuration::get('ST_BLOG_ROUNT_NAME', $this->context->language->id);
        if (!$route) $route = 'blog';
        self::$moduleRoutes = array(
            'module-stblogsearch-default' => array(
                'controller' =>  'default',
                'rule' =>        $route.'/search',
                'keywords' => array(
                ),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'stblogsearch',
                )
            ),
        );
        
        $this->selection_search = array(
    		array(
    			'id' => 'name',
    			'val' => '1',
    			'name' => $this->getTranslator()->trans('Title', array(), 'Modules.Stblog.Admin')
    		),
    		array(
    			'id' => 'tag',
    			'val' => '1',
    			'name' => $this->getTranslator()->trans('Tag', array(), 'Modules.Stblog.Admin')
    		),
    		array(
    			'id' => 'category',
    			'val' => '1',
    			'name' => $this->getTranslator()->trans('Category name', array(), 'Modules.Stblog.Admin')
    		),
    		array(
    			'id' => 'short_content',
    			'val' => '1',
    			'name' => $this->getTranslator()->trans('Short content', array(), 'Modules.Stblog.Admin')
    		),
    		array(
    			'id' => 'content',
    			'val' => '1',
    			'name' => $this->getTranslator()->trans('Content', array(), 'Modules.Stblog.Admin')
    		),
            array(
    			'id' => 'author',
    			'val' => '1',
    			'name' => $this->getTranslator()->trans('Author', array(), 'Modules.Stblog.Admin')
    		),
    	);
	}

	public function install()
	{
		if (!parent::install()
            || !$this->registerHook('displayStBlogRightColumn')
            || !$this->registerHook('displayStBlogLeftColumn')
            || !$this->registerHook('moduleRoutes')
            || !Configuration::updateValue('ST_BS_SEARCH_MINWORDLEN', 3)
            || !Configuration::updateValue('ST_BS_SEARCH_NAME', 1)
            || !Configuration::updateValue('ST_BS_SEARCH_TAG', 1)
            || !Configuration::updateValue('ST_BS_SEARCH_CATEGORY', 1)
            || !Configuration::updateValue('ST_BS_SEARCH_SHORT_CONTENT', 0)
            || !Configuration::updateValue('ST_BS_SEARCH_CONTENT', 0)
            || !Configuration::updateValue('ST_BS_SEARCH_AUTHOR', 0)
            || !Configuration::updateValue('ST_BS_SEARCH_SORT_BY', 1)
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
		if (isset($_POST['savestblogsearch']))
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
                            Configuration::updateValue('ST_BS_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_BS_'.strtoupper($field['name']), $value);
                    }
             
            foreach($this->selection_search AS $item)
            {
                $key = 'search_'.$item['id'];
                $value = (int)Tools::getValue($key);
                if ($value)
                    Configuration::updateValue('ST_BS_'.strtoupper($key), $value);
                else
                    Configuration::updateValue('ST_BS_'.strtoupper($key), 0);
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
					'label' => $this->getTranslator()->trans('Minimum word length (in characters):', array(), 'Modules.Stblog.Admin'),
					'name' => 'search_minwordlen',
                    'default_value' => 3,
                    'required' => true,
                    'desc' => $this->getTranslator()->trans('Only words this size or larger will be searched. (default: 3).', array(), 'Modules.Stblog.Admin'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'checkbox',
					'label' => $this->getTranslator()->trans('Content to search', array(), 'Modules.Stblog.Admin'),
					'name' => 'search',
					'lang' => true,
					'values' => array(
						'query' => $this->selection_search,
						'id' => 'id',
						'name' => 'name'
					)
				),
                array(
					'type' => 'select',
        			'label' => $this->getTranslator()->trans('Sort by:', array(), 'Modules.Stblog.Admin'),
        			'name' => 'search_sort_by',
                    'options' => array(
        				'query' => self::$sort_by,
        				'id' => 'id',
        				'name' => 'name',
        			),
                    'validation' => 'isUnsignedInt',
				),
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('   Save   ', array(), 'Admin.Actions')
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
		$helper->submit_action = 'savestblogsearch';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    
	public function hookDisplayStBlogRightColumn($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
            
         $this->smarty->assign(array(
                'search_query' => Tools::getValue('stb_search_query'),
            ));
            
	    return $this->display(__FILE__, 'stblogsearch.tpl');
	}
    
	public function hookDisplayStBlogLeftColumn($params)
	{
        return $this->hookDisplayStBlogRightColumn($params);
	}
    
	public function hookModuleRoutes($params)
    {
        return self::$moduleRoutes;
    }
    
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'search_minwordlen' => Configuration::get('ST_BS_SEARCH_MINWORDLEN'),
            'search_sort_by' => Configuration::get('ST_BS_SEARCH_SORT_BY'),
        );
        foreach($this->selection_search AS $value)
            $fields_values['search_'.$value['id']] = Configuration::get('ST_BS_SEARCH_'.strtoupper($value['id']));
        
        return $fields_values;
    }
}