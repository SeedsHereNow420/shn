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

if (!defined('_PS_VERSION_'))
    exit;

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
require_once(dirname(__FILE__).'/classes/StLovedProductClass.php');
class StLovedProduct extends Module implements WidgetInterface
{
    private $templateFile = array();

    public  $fields_list;
    public  $fields_value;
    public  $fields_form;
    public static $position=array();
	private $_html = '';
    public $_prefix_st = 'ST_LOVED_';
    public $validation_errors = array();
    private $_id_source = '';
    private $_hooks = array();
    protected $_tabs = array();    
	public function __construct()
	{
		$this->name          = 'stlovedproduct';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap     = true;

		parent::__construct();
		$this->displayName   = $this->getTranslator()->trans('Love buttons', array(), 'Modules.Stlovedproduct.Admin');
		$this->description   = $this->getTranslator()->trans('Display love buttons on your store.', array(), 'Modules.Stlovedproduct.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->controllers = array('myloved');

        $this->templateFile = array(
            'module:stlovedproduct/views/templates/hook/link.tpl',
            'module:stlovedproduct/views/templates/hook/fly.tpl'
            );
        
        self::$position = array(
            10 => array(
                'id' => 'pos_10',
                'value' => 10,
                'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer'),
            ),
            0 => array(
                'id' => 'pos_0',
                'value' => 0,
                'label' => $this->getTranslator()->trans('In flyout', array(), 'Admin.Theme.Transformer'),
            ),
            1 => array(
                'id' => 'pos_1',
                'value' => 1,
                'label' => $this->getTranslator()->trans('Top left corner of the product image', array(), 'Admin.Theme.Transformer'),
            ),
            2 => array(
                'id' => 'pos_2',
                'value' => 2,
                'label' => $this->getTranslator()->trans('Top center of the product image', array(), 'Admin.Theme.Transformer'),
            ),
            3 => array(
                'id' => 'pos_3',
                'value' => 3,
                'label' => $this->getTranslator()->trans('Top right corner of the product image', array(), 'Admin.Theme.Transformer'),
            ),
            4 => array(
                'id' => 'pos_4',
                'value' => 4,
                'label' => $this->getTranslator()->trans('Center left of the product image', array(), 'Admin.Theme.Transformer'),
            ),
            5 => array(
                'id' => 'pos_5',
                'value' => 5,
                'label' => $this->getTranslator()->trans('Center center of the product image', array(), 'Admin.Theme.Transformer'),
            ),
            6 => array(
                'id' => 'pos_6',
                'value' => 6,
                'label' => $this->getTranslator()->trans('Center right of the product image', array(), 'Admin.Theme.Transformer'),
            ),
            7 => array(
                'id' => 'pos_7',
                'value' => 7,
                'label' => $this->getTranslator()->trans('Bottom left corner of the product image', array(), 'Admin.Theme.Transformer'),
            ),
            8 => array(
                'id' => 'pos_8',
                'value' => 8,
                'label' => $this->getTranslator()->trans('Bottom center of the product image', array(), 'Admin.Theme.Transformer')
            ),
            9 => array(
                'id' => 'pos_9',
                'value' => 9,
                'label' => $this->getTranslator()->trans('Bottom right corner of the product image', array(), 'Admin.Theme.Transformer')
            ),
        ); 

        $this->initHookArray();
	}
    
    protected function initTabNames()
    {
        $this->_tabs = array(
            array('id'  => '0,1,5', 'name' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer')),
            array('id'  => '2', 'name' => $this->getTranslator()->trans('Loved products', array(), 'Modules.Stlovedproduct.Admin')),
            array('id'  => '3', 'name' => $this->getTranslator()->trans('Loved articles', array(), 'Modules.Stlovedproduct.Admin')),
            array('id'  => '4', 'name' => $this->getTranslator()->trans('Loved count itialization', array(), 'Modules.Stlovedproduct.Admin')),
        );
    }
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Header' => array(
                array(
                    'id' => 'displayNav1',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Topbar left - displayNav1', array(), 'Admin.Theme.Transformer'),
                    'in_header' => 1,
                ),
                array(
                    'id' => 'displayNav2',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Topbar right - displayNav2', array(), 'Admin.Theme.Transformer'),
                    'in_header' => 1,
                ),
                array(
                    'id' => 'displayNav3',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Topbar center - displayNav3', array(), 'Admin.Theme.Transformer'),
                    'in_header' => 1,
                ),
                array(
                    'id' => 'displayTop',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayTop', array(), 'Admin.Theme.Transformer'),
                    'in_header' => 1,
                ),
                array(
                    'id' => 'displayHeaderCenter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHeaderCenter', array(), 'Admin.Theme.Transformer'),
                    'in_header' => 1,
                ),
                array(
                    'id' => 'displayHeaderLeft',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHeaderLeft', array(), 'Admin.Theme.Transformer'),
                    'in_header' => 1,
                ),
                array(
                    'id' => 'displayHeaderBottom',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHeaderBottom', array(), 'Admin.Theme.Transformer'),
                    'in_header' => 1,
                ),
            ),
            'Product page' => array(
                array(
                    'id' => 'displayProductNameRight',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductNameRight', array(), 'Admin.Theme.Transformer'),
                    'in_product_page' => 1,
                ),
                array(
                    'id' => 'displayUnderProductName',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayUnderProductName', array(), 'Admin.Theme.Transformer'),
                    'in_product_page' => 1,
                ),
                array(
                    'id' => 'displayProductPriceRight',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductPriceRight', array(), 'Admin.Theme.Transformer'),
                    'in_product_page' => 1,
                ),
                array(
                    'id' => 'displayProductCartRight',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductCartRight', array(), 'Admin.Theme.Transformer'),
                    'in_product_page' => 1,
                ),
                array(
                    'id' => 'displayLeftColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayLeftColumnProduct', array(), 'Admin.Theme.Transformer'),
                    'in_product_page' => 1,
                ),
                array(
                    'id' => 'displayProductLeftColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductLeftColumn', array(), 'Admin.Theme.Transformer'),
                    'in_product_page' => 1,
                ),
                array(
                    'id' => 'displayProductCenterColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductCenterColumn', array(), 'Admin.Theme.Transformer'),
                    'in_product_page' => 1,
                ),
                array(
                    'id' => 'displayProductRightColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductRightColumn', array(), 'Admin.Theme.Transformer'),
                    'in_product_page' => 1,
                ),
                array(
                    'id' => 'displayRightColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayRightColumnProduct', array(), 'Admin.Theme.Transformer'),
                    'in_product_page' => 1,
                ),
            ),
            'Blog page' => array(
                array(
                    'id' => 'displayStBlogArticleInfo',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStBlogArticleInfo', array(), 'Admin.Theme.Transformer'),
                    'is_blog' => 1,
                ),
                array(
                    'id' => 'displayStBlogArticleFooter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStBlogArticleFooter', array(), 'Admin.Theme.Transformer'),
                    'is_blog' => 1,
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
                $key = str_replace(' ','_', $key);
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
		$res = parent::install()
	        && $this->installDB()
            && $this->registerHook('displayHeader')
            && $this->registerHook('customerAccount')
            && $this->registerHook('displayBeforeBodyClosingTag')
            && $this->registerHook('actionProductSearchAfter')
            && $this->registerHook('displayProductCenterColumn')
            && $this->registerHook('displayStBlogArticleInfo')
            && $this->registerHook('displaySideBar')
            && Configuration::updateValue($this->_prefix_st.'POSITION', 0)
            && Configuration::updateValue($this->_prefix_st.'OFFSET_X', 0)
            && Configuration::updateValue($this->_prefix_st.'OFFSET_Y', 0)
            && Configuration::updateValue($this->_prefix_st.'SAME_POSITION', 0)
            /*&& Configuration::updateValue($this->_prefix_st.'POSITION_PRO', 0)
            && Configuration::updateValue($this->_prefix_st.'OFFSET_X_PRO', 0)
            && Configuration::updateValue($this->_prefix_st.'OFFSET_Y_PRO', 0)*/
            && Configuration::updateValue($this->_prefix_st.'FONT_SIZE', 0)
            && Configuration::updateValue($this->_prefix_st.'TEXT_COLOR', '')
            && Configuration::updateValue($this->_prefix_st.'TEXT_HOVER_COLOR', '')
            && Configuration::updateValue($this->_prefix_st.'ICON_BG_COLOR', '')
            && Configuration::updateValue($this->_prefix_st.'ICON_PADDING', 0)
            && Configuration::updateValue($this->_prefix_st.'FONT_SIZE_PRO', 0)
            && Configuration::updateValue($this->_prefix_st.'TEXT_COLOR_PRO', '')
            && Configuration::updateValue($this->_prefix_st.'TEXT_HOVER_COLOR_PRO', '')
            && Configuration::updateValue($this->_prefix_st.'BG_COLOR', '')
            && Configuration::updateValue($this->_prefix_st.'BG_HOVER_COLOR', '')
            && Configuration::updateValue($this->_prefix_st.'NUMBER_BG_COLOR', '')
            && Configuration::updateValue($this->_prefix_st.'NUMBER_COLOR', '')
            && Configuration::updateValue($this->_prefix_st.'HEADER_STYLE', 0)
            && Configuration::updateValue($this->_prefix_st.'WITH_NUMBER', 1)
            && Configuration::updateValue($this->_prefix_st.'PRODUCT_STYLE', 0)
            && Configuration::updateValue($this->_prefix_st.'MINIMAL_TIME', 10)
            && Configuration::updateValue($this->_prefix_st.'NBR_SIDEBAR', 6);
        $this->clearCache();
        return $res;
	}
	
	/**
	 * Creates tables
	 */
	public function installDB()
	{
        $return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_loved_product` (
               `id_st_loved_product` int(10) unsigned NOT NULL AUTO_INCREMENT,
               `type` tinyint(1) unsigned NOT NULL DEFAULT 1,
			   `id_customer` int(10) unsigned NOT NULL,
               `id_source` int(10) unsigned NOT NULL,
               `id_shop` int(10) unsigned DEFAULT 1,
               `loved_count` int(10) unsigned DEFAULT 1,
               `date_upd` datetime NOT NULL,
               `date_add` datetime NOT NULL,
               PRIMARY KEY (`id_st_loved_product`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}
    
	public function uninstall()
	{
	    $this->clearCache();
		// Delete configuration
		return $this->deleteTables() &&
			parent::uninstall();
	}
	/**
	 * deletes tables
	 */
	public function deleteTables()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_loved_product`');
	}

	public function getContent()
	{
	    $this->context->controller->addCSS($this->_path.'views/css/admin.css');
        $this->context->controller->addJS($this->_path.'views/js/admin.js');
        if(Tools::getValue('act')=='update_count' && $id_source = Tools::getValue('id_source'))
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $count = (int)Tools::getValue('count');
            $type = Tools::getValue('type', 1);
            if (StLovedProductClass::updateCount($id_source, $count, (int)$this->context->shop->id, 0, $type)) {
                $result['r'] = true;
            }
            die(json_encode($result));
        }
	    if (Tools::isSubmit('searchProduct')) {
            $this->_id_source = (int)Tools::getValue('id_source');
        }
        if (Tools::isSubmit('initproductcount')) {
            $ids = trim(Tools::getValue('id_sources'));
            $min = (int)Tools::getValue('min');
            $max = (int)Tools::getValue('max');
            $type= (int)Tools::getValue('type', 1);
            if ($ids) {
                $id_sources = explode(',', $ids);
            }
            elseif ($type == 1) {
                
                $id_sources = Db::getInstance()->executeS('SELECT id_product AS id_source FROM '._DB_PREFIX_.'product_shop
                WHERE id_shop='.(int)$this->context->shop->id);
            } elseif ($type == 2) {
                $id_sources = Db::getInstance()->executeS('SELECT id_st_blog AS id_source FROM '._DB_PREFIX_.'st_blog_shop
                WHERE id_shop='.(int)$this->context->shop->id);
            } else {
                $id_sources = arrray();
            }
            if (count($id_sources)) {
                $min || $min = 0;
                $max || $max = 100;
                foreach($id_sources AS $value) {
                    if (is_array($value)) {
                        $id_source = (int)$value['id_source'];
                    } else {
                        $id_source = (int)$value;
                    }
                    if (!$id_source) {
                        continue;
                    }
                    $count = rand($min, $max);
                    StLovedProductClass::updateCount((int)$id_source, $count, (int)$this->context->shop->id, 0, $type);
                }
            }
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        $this->initTabNames();
        if (Tools::isSubmit('savestlovedproduct')) {
            $this->initForm();
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
                                case 'isNullOrUnsignedId':
                                    $value = $value==='0' ? '0' : '';
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
            $this->saveHook();
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        $helper = $this->initForm();
        $this->smarty->assign(array(
            'bo_tabs' => $this->_tabs,
            'bo_tab_content' => $helper->generateForm($this->fields_form).
                '<div class="panel" id="fieldset_2_2">'.$this->renderSearchForm().$this->renderList(1).'</div>'.
                '<div class="panel" id="fieldset_3_3">'.$this->renderList(2).'</div>'.
                '<div class="panel" id="fieldset_4_4">'.$this->renderInitDataForm().'</div>',
        ));

        return $this->_html.$this->display(__FILE__, 'bo_tab_layout.tpl');
	}
    public function renderSearchForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->trans('Search for product ID', array(), 'Modules.Stlovedproduct.Admin'),
                    'icon' => 'icon-search',
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Product ID:', array(), 'Modules.Stlovedproduct.Admin'),
                        'name' => 'id_source',
                        'class' => 'fixed-width-xxl',
                    ),
                ),
                'submit' => array(
                    'title' => $this->trans('Search', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-refresh',
                ),
            ),
        );

        $helper = new HelperForm();
        $helper->table = $this->table;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'searchProduct';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => array('id_source' => $this->_id_source),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($fields_form));
    }
    public function renderInitDataForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->trans('Initialize product loved count', array(), 'Modules.Stlovedproduct.Admin'),
                    'icon' => 'icon-search',
                    'desc' => $this->trans('To add initialized count for products by random.', array(), 'Modules.Stlovedproduct.Admin')
                ),
                'input' => array(
                    array(
                        'type' => 'radio',
                        'label' => $this->getTranslator()->trans('Type:', array(), 'Modules.Stlovedproduct.Admin'),
                        'name' => 'type',
                        'default_value' => 1,
                        'values' => array(
                            array(
                                'id' => 'type_1',
                                'value' => 1,
                                'label' => $this->getTranslator()->trans('Product', array(), 'Admin.Theme.Transformer')),
                            array(
                                'id' => 'type_2',
                                'value' => 2,
                                'label' => $this->getTranslator()->trans('Blog', array(), 'Admin.Theme.Transformer')),
                        ),
                        'validation' => 'isUnsignedInt',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Product / Article ID:', array(), 'Modules.Stlovedproduct.Admin'),
                        'name' => 'id_sources',
                        'class' => 'fixed-width-xxl',
                        'desc' => 'Product / article ID, separated by commas (e.g. 1,2,3,4,5,6 etc.), leave empty will add loved count for all products.',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Minimum random:', array(), 'Modules.Stlovedproduct.Admin'),
                        'name' => 'min',
                        'class' => 'fixed-width-xxl',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Maximum random:', array(), 'Modules.Stlovedproduct.Admin'),
                        'name' => 'max',
                        'class' => 'fixed-width-xxl',
                    ),
                ),
                'submit' => array(
                    'title' => $this->trans('Do it', array(), 'Modules.Stlovedproduct.Admin'),
                    'icon' => 'process-icon-refresh',
                ),
            ),
        );

        $helper = new HelperForm();
        $helper->table = $this->table;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'initproductcount';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => array(
                'id_sources' => '',
                'min' => 0,
                'max' => 100,
                'type' => 1,
            ),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($fields_form));
    }
    protected function initForm()
    {
        $this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to display the Love button:', array(), 'Modules.Stlovedproduct.Admin'),
                    'name' => 'position',
                    'default_value' => 0,
                    'values' => self::$position,
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Offset X:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'offset_x',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Accept positive and negative numbers ', array(), 'Admin.Theme.Transformer'),
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Offset Y:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'offset_y',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Accept positive and negative numbers ', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'font_size',
                    'prefix' => 'px',
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_hover_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'icon_bg_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon block size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'icon_padding',
                    'prefix' => 'px',
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-lg',
                ),
                /*array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Minimum time between 2 times click from the same user:', array(), 'Modules.Stlovedproduct.Admin'),
                    'name' => 'minimal_time',
                    'prefix' => $this->getTranslator()->trans('Seconds', array(), 'Admin.Theme.Transformer'),
                    'default_value' => 10,
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),*/

                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to display link on the header:', array(), 'Modules.Stlovedproduct.Admin'),
                    'name' => 'header_style',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'header_style_both',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Icon + Text', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'header_style_name',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Text', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'header_style_flag',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Icon', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('How many products show on sidebar', array(), 'Modules.Stlovedproduct.Admin'),
                    'name' => 'nbr_sidebar',
                    'default_value' => 6,
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
		);
        
        $this->fields_form[5]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Product page', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to display love link on the product page:', array(), 'Modules.Stlovedproduct.Admin'),
                    'name' => 'product_style',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'product_style_both',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Icon + Text', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'product_style_name',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Text', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'product_style_flag',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Icon', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTransLator()->trans('Display the number of loved products:', array(), 'Modules.Stlovedproduct.Admin'),
                    'name' => 'with_number',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'with_number_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'with_number_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    'desc' => $this->getTranslator()->trans('For cacheing reason the number of loved products can only be display on the product page.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'font_size_pro',
                    'prefix' => 'px',
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Icon color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_color_pro',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Icon hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_hover_color_pro',
                    'size' => 33,
                    'validation' => 'isColor',
                ),

                /*array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Total number color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'number_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Total number background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'number_bg_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),*/
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
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
				'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions')
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
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table =  $this->table;
        $helper->module = $this;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->submit_action = 'savestlovedproduct';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper;
    }
    public function renderList($type=1)
    {
        $fields_list = array(
            'id_st_loved_product' => array(
                'title' => $this->trans('ID', array(), 'Admin.Theme.Transformer'),
                'class' => 'fixed-width-sm',
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'id_source' => array(
                'title' => $type == 1 ? $this->trans('Products', array(), 'Admin.Theme.Transformer') : $this->trans('Articles', array(), 'Admin.Theme.Transformer'),
                'class' => 'fixed-width-xxl',
                'type' => 'text',
                'callback' => 'displaySource',
                'callback_object' => 'StLovedProduct',
                'search' => false,
                'orderby' => false
            ),
            'total' => array(
                'title' => $this->trans('Loved', array(), 'Admin.Theme.Transformer'),
                'class' => 'fixed-width-xxl',
                'type' => 'text',
                'callback' => 'displayLovedForm',
                'callback_object' => 'StLovedProduct',
                'search' => false,
                'orderby' => false
            ),
        );

        $helper_list = new HelperList();
        $helper_list->module = $this;
        $helper_list->title = $this->trans('Loved products', array(), 'Modules.Stlovedproduct.Admin');
        $helper_list->shopLinkType = '';
        $helper_list->no_link = true;
        $helper_list->show_toolbar = true;
        $helper_list->simple_header = false;
        $helper_list->identifier = 'id';
        $helper_list->table = 'merged';
        $helper_list->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name;
        $helper_list->token = Tools::getAdminTokenLite('AdminModules');
        $helper_list->actions = array();

        /* Retrieve list data */
        $loved = StLovedProductClass::getLovedProducts($this->_id_source, $type);
        $helper_list->listTotal = count($loved);

        /* Paginate the result */
        $page = ($page = Tools::getValue('submitFilter'.$helper_list->table)) ? $page : 1;
        $pagination = ($pagination = Tools::getValue($helper_list->table.'_pagination')) ? $pagination : 30;
        $loved = $this->paginateloved($loved, $page, $pagination);

        return $helper_list->generateList($loved, $fields_list);
    }
    public function paginateloved($loved, $page = 1, $pagination = 50)
    {
        if (count($loved) > $pagination) {
            $loved = array_slice($loved, $pagination * ($page - 1), $pagination);
        }
        return $loved;
    }
    public static function displaySource($value, $tr)
    {
        $html = '--';
        $context = Context::getContext();
        if ($tr['type'] == 1) {
            $product = new Product((int)$value, false, (int)$context->language->id);
            if ($product->id) {
                $html = '<a href="'.$context->link->getAdminLink('AdminProducts', true, array('id_product' => $product->id, 'updateproduct' => '1')).'" target="_blank">'.$product->name.'['.$product->reference.']</a>';
            }    
        } elseif ($tr['type'] == 2) {
            $blog = new StBlogClass((int)$value, (int)$context->language->id);
            if ($blog->id) {
                $html = '<a href="'.$context->link->getAdminLink('AdminStBlog', true, array('id_st_blog' => $blog->id, 'updatestblog' => '1')).'" target="_blank">'.$blog->name.'</a>';
            }  
        }
        return $html;
    }
    public static function displayLovedForm($value, $tr)
    {
        return '<input name="loved_'.(int)$tr['id_source'].'_'.(int)$tr['type'].'" value="'.(int)$value.'" size="6" />
            <input type="button" class="btn btn-default btn_save_loved" data-id_source="'.(int)$tr['id_source'].'"
            data-type="'.(int)$tr['type'].'"
            data-label="'.Context::getContext()->getTranslator()->trans('Save', array(), 'Admin.Theme.Transformer').'"
            data-doing="'.Context::getContext()->getTranslator()->trans('Saving', array(), 'Admin.Theme.Transformer').'"  
            value="'.Context::getContext()->getTranslator()->trans('Save', array(), 'Admin.Theme.Transformer').'" />';
    }
    public function hookDisplayHeader($params)
    {
        Media::addJsDef(array(
            'st_myloved_url' => $this->context->link->getModuleLink('stlovedproduct', 'myloved'),
        ));
        $this->context->smarty->assign($this->getWidgetVariables());

        $this->context->controller->addJS(_MODULE_DIR_.'stlovedproduct/views/js/myloved.js');

        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $postion = Configuration::get($this->_prefix_st.'POSITION');
            $prefix = '.add_to_love.layer_btn';

            $custom_css = '';
            if($postion>0 && $postion<10)
            {
                $offset_x = Configuration::get($this->_prefix_st.'OFFSET_X');
                $offset_y = Configuration::get($this->_prefix_st.'OFFSET_Y');
                switch ($postion) {
                    case 1:
                        $custom_css .= $prefix.'{left:'.$offset_x.'px;}';
                        $custom_css .= $prefix.'{top:'.$offset_y.'px;}';
                        break;
                    case 2:
                        $custom_css .= $prefix.'{left:50%;margin-left:'.$offset_x.'px;}';
                        $custom_css .= $prefix.'{top:'.$offset_y.'px;}';
                        break;
                    case 3:
                        $custom_css .= $prefix.'{right:'.$offset_x.'px;}';
                        $custom_css .= $prefix.'{top:'.$offset_y.'px;}';
                        break;
                    case 4:
                        $custom_css .= $prefix.'{left:'.$offset_x.'px;}';
                        $custom_css .= $prefix.'{top:50%;margin-top:'.$offset_y.'px;}';
                        break;
                    case 5:
                        $custom_css .= $prefix.'{left:50%;margin-left:'.$offset_x.'px;}';
                        $custom_css .= $prefix.'{top:50%;margin-top:'.$offset_y.'px;}';
                        break;
                    case 6:
                        $custom_css .= $prefix.'{right:'.$offset_x.'px;}';
                        $custom_css .= $prefix.'{top:50%;margin-top:'.$offset_y.'px;}';
                        break;
                    case 7:
                        $custom_css .= $prefix.'{left:'.$offset_x.'px;}';
                        $custom_css .= $prefix.'{bottom:'.$offset_y.'px;}';
                        break;
                    case 8:
                        $custom_css .= $prefix.'{left:50%;margin-left:'.$offset_x.'px;}';
                        $custom_css .= $prefix.'{bottom:'.$offset_y.'px;}';
                        break;
                    case 9:
                        $custom_css .= $prefix.'{right:'.$offset_x.'px;}';
                        $custom_css .= $prefix.'{bottom:'.$offset_y.'px;}';
                        break;
                }
            }
            if($font_size = Configuration::get($this->_prefix_st.'FONT_SIZE'))
                $custom_css .= $prefix.'{font-size:'.$font_size.'px;}';
            if($text_color = Configuration::get($this->_prefix_st.'TEXT_COLOR'))
                $custom_css .= $prefix.'{color:'.$text_color.';}';
            if($text_hover_color = Configuration::get($this->_prefix_st.'TEXT_HOVER_COLOR'))
                $custom_css .= $prefix.':hover, '.$prefix.'.st_added{color:'.$text_hover_color.';}';
            if($icon_bg_color = Configuration::get($this->_prefix_st.'ICON_BG_COLOR'))
                $custom_css .= $prefix.'{background:'.$icon_bg_color.';}';
            if($icon_padding = (int)Configuration::get($this->_prefix_st.'ICON_PADDING'))
                $custom_css .= $prefix.'{width:'.$icon_padding.'px;height:'.$icon_padding.'px;line-height:'.$icon_padding.'px;border-radius:100%;}';

            $product_style        = Configuration::get($this->_prefix_st.'PRODUCT_STYLE');
            if($product_style==1){
                $custom_css .= '.love_product i{display:none;}';
            }elseif($product_style==2){
                $custom_css .= '.love_product .btn_text{display:none;}';
            }elseif(Configuration::get($this->_prefix_st.'WITH_NUMBER')){
                $custom_css .= '.love_product .btn_text{margin-right:4px;}';
            }
            if($font_size_pro = Configuration::get($this->_prefix_st.'FONT_SIZE_PRO')){
                $custom_css .= '.love_product i{font-size:'.$font_size_pro.'px;}';
            }
            if($text_color_pro = Configuration::get($this->_prefix_st.'TEXT_COLOR_PRO')){
                $custom_css .= '.love_product i{color:'.$text_color_pro.';}';
            }
            if($text_hover_color_pro = Configuration::get($this->_prefix_st.'TEXT_HOVER_COLOR_PRO')){
                $custom_css .= '.love_product:hover i, .love_product.st_added i{color:'.$text_hover_color_pro.';}';
            }
            /*if($number_color = Configuration::get($this->_prefix_st.'NUMBER_COLOR'))
                $custom_css .= '.love_product .amount_inline{color:'.$number_color.';}';
            if($number_bg_color = Configuration::get($this->_prefix_st.'NUMBER_BG_COLOR'))
                $custom_css .= '.love_product .amount_inline{background:'.$number_bg_color.';}';*/

            $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
    }
	protected function stGetCacheId($key,$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key;
	}
	private function clearCache()
	{
        $this->_clearCache('*');
	}
    public function renderWidget($hookName = null, array $configuration = [])
    {
        if (strpos(strtolower($hookName), 'display') === false) {
            return;
        }
        $type = 1;
        // $this->smarty->assign($this->getWidgetVariables());
        $in_header = $in_product_page = $is_blog = false;
        foreach ($this->_hooks as $sub_hooks) {
        foreach ($sub_hooks as $v) {
            if (Tools::strtolower($v['id'])==Tools::strtolower($hookName)) {
                $in_header = isset($v['in_header']);
                $in_product_page = isset($v['in_product_page']);
                $is_blog = isset($v['is_blog']);
                break 2;
            }
        }
        }

        if($in_product_page || $is_blog)
        {
            if ($is_blog) {
                $type = 2;
            }
            $id_source = 0;
            if($in_product_page)
                $id_source=(int)Tools::getValue('id_product');
            elseif ($is_blog) {
                $id_source=(int)Tools::getValue('id_st_blog');
            }
            $vars = array(
                'id_source' => $id_source,
                'love_blog' => $is_blog
                );

            if($id_source)
            {
                $loved_with_number = Configuration::get($this->_prefix_st.'WITH_NUMBER');

                $vars['classname'] = 'btn_inline love_item '.($in_product_page ? 'love_product' : '').' '.($this->context->customer->isLogged() && StLovedProductClass::exists($id_source, $this->context->customer->id, $type) ? ' st_added ' : '');
                $vars['loved_with_number'] = $loved_with_number;

                if($loved_with_number)
                    $vars['loved_total'] = StLovedProductClass::getTotal($id_source, $type);
            }
            $this->smarty->assign($vars);
        }

        return $this->fetch($in_header ? $this->templateFile[0] : $this->templateFile[1]);
    }
    
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return array(
            'st_myloved_url'           => $this->context->link->getModuleLink('stlovedproduct', 'myloved'),
            'loved_header_style'     => Configuration::get($this->_prefix_st.'HEADER_STYLE'),
            // 'loved_with_number'      => Configuration::get($this->_prefix_st.'WITH_NUMBER'),
            'loved_product_style'    => Configuration::get($this->_prefix_st.'PRODUCT_STYLE'),
            'loved_position'         => Configuration::get($this->_prefix_st.'POSITION'),
            //to do get number of loved products here
        );        
    }
    public function hookDisplayBeforeBodyClosingTag($params)
    {
        return $this->fetch('module:stlovedproduct/views/templates/hook/go_login.tpl');
    }

    public function hookDisplaySideBar($params)
    {
        $nbr = Configuration::get($this->_prefix_st.'NBR_SIDEBAR');
        $nbr || $nbr = 6;
        
        $products = $blogs = array();    
        
        $my_loved = StLovedProductClass::getMyLoved($this->context->customer->id, $nbr, 2);
        if($my_loved && count($my_loved))
            foreach($my_loved AS $blog) {
                $blog = new StBlogClass($blog['id_source'], $this->context->language->id);
                $blogs[] = StBlogClass::getBlogDetials($this->context->language->id, get_object_vars($blog));
            }

        $my_loved = StLovedProductClass::getMyLoved($this->context->customer->id, $nbr, 1);
        if($my_loved && count($my_loved))
        {    
                $assembler = new ProductAssembler($this->context);
                $presenterFactory = new ProductPresenterFactory($this->context);
                $presentationSettings = $presenterFactory->getPresentationSettings();
                $presenter = new ProductListingPresenter(
                    new ImageRetriever(
                        $this->context->link
                    ),
                    $this->context->link,
                    new PriceFormatter(),
                    new ProductColorsRetriever(),
                    $this->context->getTranslator()
                );
    
                if (is_array($my_loved)) {
                    foreach ($my_loved as $value) {
                        $prod = new Product((int)$value['id_source']);
                        if (!$prod->id) {
                            continue;
                        }
                        $products[] = $presenter->present(
                            $presentationSettings,
                            $assembler->assembleProduct(array('id_product' => $value['id_source'])),
                            $this->context->language
                        );
                    }
                }    
        }
        $this->smarty->assign(array(
            'products' => $products,
            'blogs' => $blogs,
        ));
        return $this->fetch('module:stlovedproduct/views/templates/hook/side.tpl');
    }
    
    public function hookDisplayCustomerAccount($params)
	{
		return $this->display(__FILE__, 'my-account.tpl');
	}
    /*public function hookDisplayMobileBar($params)
    {
        return $this->fetch('module:stlovedproduct/views/templates/hook/mobilebar.tpl');
    }    
    public function hookDisplayMobileBarLeft($params){
        return $this->hookDisplayMobileBar($params);
    }
    public function hookDisplayMobileBarCenter($params){
        return $this->hookDisplayMobileBar($params);
    }
    public function hookDisplayMobileBarBottom($params){
        return $this->hookDisplayMobileBar($params);
    }*/
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'position'          => Configuration::get($this->_prefix_st.'POSITION'),
            'offset_x'          => Configuration::get($this->_prefix_st.'OFFSET_X'),
            'offset_y'          => Configuration::get($this->_prefix_st.'OFFSET_Y'),
            'same_position'          => Configuration::get($this->_prefix_st.'SAME_POSITION'),
            /*'position_pro'      => Configuration::get($this->_prefix_st.'POSITION_PRO'),
            'offset_x_pro'      => Configuration::get($this->_prefix_st.'OFFSET_X_PRO'),
            'offset_y_pro'      => Configuration::get($this->_prefix_st.'OFFSET_Y_PRO'),*/
            'font_size'         => Configuration::get($this->_prefix_st.'FONT_SIZE'),
            'text_color'        => Configuration::get($this->_prefix_st.'TEXT_COLOR'),
            'text_hover_color'  => Configuration::get($this->_prefix_st.'TEXT_HOVER_COLOR'),
            'icon_bg_color'  => Configuration::get($this->_prefix_st.'ICON_BG_COLOR'),
            'icon_padding'  => Configuration::get($this->_prefix_st.'ICON_PADDING'),
            'font_size_pro'         => Configuration::get($this->_prefix_st.'FONT_SIZE_PRO'),
            'text_color_pro'        => Configuration::get($this->_prefix_st.'TEXT_COLOR_PRO'),
            'text_hover_color_pro'  => Configuration::get($this->_prefix_st.'TEXT_HOVER_COLOR_PRO'),
            'number_color'      => Configuration::get($this->_prefix_st.'NUMBER_COLOR'),
            'number_bg_color'   => Configuration::get($this->_prefix_st.'NUMBER_BG_COLOR'),
            'header_style'      => Configuration::get($this->_prefix_st.'HEADER_STYLE'),
            'with_number'       => Configuration::get($this->_prefix_st.'WITH_NUMBER'),
            'product_style'     => Configuration::get($this->_prefix_st.'PRODUCT_STYLE'),
            'minimal_time'      => Configuration::get($this->_prefix_st.'MINIMAL_TIME'),
            'nbr_sidebar'       => Configuration::get($this->_prefix_st.'NBR_SIDEBAR'),
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
    public function hookActionProductSearchAfter($params){
        $this->context->smarty->assign($this->getWidgetVariables());
        return ;
    }
}