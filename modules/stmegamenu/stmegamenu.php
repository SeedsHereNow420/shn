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
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

require_once _PS_MODULE_DIR_.'stmegamenu/classes/StMegaMenuClass.php';
require_once _PS_MODULE_DIR_.'stmegamenu/classes/StMegaColumnClass.php';
require_once _PS_MODULE_DIR_.'stmegamenu/classes/StMegaProductClass.php';
require_once _PS_MODULE_DIR_.'stmegamenu/classes/StMegaBrandClass.php';

class StMegaMenu extends Module implements WidgetInterface
{
    protected static $cache_stmegamenu;
    protected static $access_rights = 0775;
	private $_html = '';
    public $fields_list;
    public $fields_form;
    private $_baseUrl;
	private $spacer_size = '5';
    private $_hooks = array();
    public static $_type = array(
        0 => 'Custom link',
        1 => 'Category',
        2 => 'Product',
        3 => 'CMS page',
        4 => 'Manufacturer',
        5 => 'Supplier',
        6 => 'Cms category',
        7 => 'Icon',
        8 => 'Blog category',
        9 => 'Blog',
        10 => 'Page',
    );
    public static $_item_type = array(
        1 => 'Category',
        2 => 'Product',
        3 => 'Brand',
        4 => 'Custom link',
        5 => 'Custom content',
    );
    public static $_bootstrap_a = array(
        array('id'=>1, 'name'=> '1/12'),
        array('id'=>2, 'name'=> '2/12'),
        array('id'=>2.4, 'name'=> '2.4/12'),
        array('id'=>3, 'name'=> '3/12'),
        array('id'=>4, 'name'=> '4/12'),
        array('id'=>5, 'name'=> '5/12'),
        array('id'=>6, 'name'=> '6/12'),
        array('id'=>7, 'name'=> '7/12'),
        array('id'=>8, 'name'=> '8/12'),
        array('id'=>9, 'name'=> '9/12'),
        array('id'=>10, 'name'=> '10/12'),
        array('id'=>11, 'name'=> '11/12'),
    );
    public static $_bootstrap_b = array(
        array('id'=>1, 'name'=> '1/12'),
        array('id'=>2, 'name'=> '2/12'),
        array('id'=>2.4, 'name'=> '2.4/12'),
        array('id'=>4, 'name'=> '4/12'),
        array('id'=>5, 'name'=> '5/12'),
        array('id'=>6, 'name'=> '6/12'),
        array('id'=>7, 'name'=> '7/12'),
        array('id'=>8, 'name'=> '8/12'),
        array('id'=>9, 'name'=> '9/12'),
        array('id'=>10, 'name'=> '10/12'),
        array('id'=>11, 'name'=> '11/12'),
        array('id'=>12, 'name'=> '12/12'),
    );
    public $stblog_status = true;
    public $_align = array();
    public $_location = array();
	public function __construct()
	{
		$this->name          = 'stmegamenu';
		$this->tab           = 'front_office_features';
		$this->version       = '2.0.8';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;

        $this->bootstrap = true;
		parent::__construct();
		$this->displayName   = $this->getTranslator()->trans('Megamenu', array(), 'Modules.Stmegamenu.Admin');
		$this->description   = $this->getTranslator()->trans('Add a menu on top of your shop.', array(), 'Modules.Stmegamenu.Admin');
        
        
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            $this->stblog_status = false;
        if($this->stblog_status)
        {
            require_once (_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');
            require_once (_PS_MODULE_DIR_.'stblog/classes/StBlogCategory.php');
        }
            
        $this->_align =  array(
                array(
                    'id' => 'alignment_0',
                    'value' => 0,
                    'label' => '<img src="'.$this->_path.'views/img/a_0.jpg" />'),
                array(
                    'id' => 'alignment_1',
                    'value' => 1,
                    'label' => '<img src="'.$this->_path.'views/img/a_1.jpg" />'),
                array(
                    'id' => 'alignment_2',
                    'value' => 2,
                    'label' => '<img src="'.$this->_path.'views/img/a_2.jpg" />'),
                array(
                    'id' => 'alignment_3',
                    'value' => 3,
                    'label' => '<img src="'.$this->_path.'views/img/a_3.jpg" />'),
            );
        $this->_location =  array(
                array(
                    'id' => 'location_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Main horizontal menu', array(), 'Modules.Stmegamenu.Admin')
                ),
                array(
                    'id' => 'location_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Left/right column menu', array(), 'Modules.Stmegamenu.Admin')
                ),
                array(
                    'id' => 'location_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Dropdown vertical menu', array(), 'Modules.Stmegamenu.Admin')
                ),
			);
	}
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
                    'id' => 'displayMainMenu',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayMainMenu', array(), 'Admin.Theme.Transformer')
                ),
                /*array(
        			'id' => 'displayLeftColumn',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayLeftColumn', array(), 'Admin.Theme.Transformer')
        		),
        		array(
        			'id' => 'displayRightColumn',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayRightColumn', array(), 'Admin.Theme.Transformer')
        		),*/
                array(
        			'id' => 'displayTop',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayTop(displayHeaderRight)', array(), 'Admin.Theme.Transformer')
        		),
        		array(
        			'id' => 'displayHeaderLeft',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayHeaderLeft', array(), 'Admin.Theme.Transformer')
        		),
        		array(
        			'id' => 'displayHeaderBottom',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayHeaderBottom', array(), 'Admin.Theme.Transformer')
        		),
        		array(
        			'id' => 'displayHeaderCenter',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayHeaderCenter', array(), 'Admin.Theme.Transformer')
        		),
        		/*array(
        			'id' => 'displayLeftBar',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayLeftBar', array(), 'Admin.Theme.Transformer')
        		),
        		array(
        			'id' => 'displayRightBar',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayRightBar', array(), 'Admin.Theme.Transformer')
        		),*/
                array(
        			'id' => 'displayMobileNav',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayMobileNav', array(), 'Admin.Theme.Transformer')
        		),
                /*array(
        			'id' => 'displayMobileBar',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayMobileBar', array(), 'Admin.Theme.Transformer')
        		),
                array(
        			'id' => 'displayMobileBarLeft',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayMobileBarLeft', array(), 'Admin.Theme.Transformer')
        		),
                array(
        			'id' => 'displayMobileBarCenter',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayMobileBarCenter', array(), 'Admin.Theme.Transformer')
        		),
                array(
        			'id' => 'displayMobileBarBottom',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayMobileBarBottom', array(), 'Admin.Theme.Transformer')
        		),*/
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
	    $res = $this->installDB() &&
            parent::install() &&
			$this->registerHook('displayHeader') &&
            $this->registerHook('displayMainMenu') &&
            $this->registerHook('displayLeftColumn') &&
			$this->registerHook('actionObjectCategoryUpdateAfter') &&
			$this->registerHook('actionObjectCategoryDeleteAfter') &&
			$this->registerHook('actionObjectCmsUpdateAfter') &&
			$this->registerHook('actionObjectCmsDeleteAfter') &&
			$this->registerHook('actionObjectSupplierUpdateAfter') &&
			$this->registerHook('actionObjectSupplierDeleteAfter') &&
			$this->registerHook('actionObjectManufacturerUpdateAfter') &&
			$this->registerHook('actionObjectManufacturerDeleteAfter') &&
			$this->registerHook('actionObjectProductUpdateAfter') &&
			$this->registerHook('hookActionObjectProductDeleteAfter') &&
			$this->registerHook('categoryUpdate') &&
			$this->registerHook('actionCategoryAdd') &&
			$this->registerHook('actionCategoryDelete') &&
			$this->registerHook('actionCategoryUpdate') &&
			$this->registerHook('actionProductDelete') &&
			$this->registerHook('actionProductAdd') &&
			$this->registerHook('actionProductUpdate') &&
            $this->registerHook('actionShopDataDuplication') &&
            $this->registerHook('displaySideBar');
            // &&
            // $this->registerHook('displayMobileBarLeft')
		if ($res)
			foreach(Shop::getShops(false) as $shop)
				$res &= $this->sampleData($shop['id_shop']);
        $this->clearStMegamenuCache();
		return $res;
	}
    
    
    public function sampleData($id_shop)
    {
        $return = true;
        $path = _MODULE_DIR_.$this->name;
		$samples = array(
            0 => array(
                'sample_pid' => 0,
                'sample_cid' => 0,
                'id_st_mega_menu' => '', 
                'id_st_mega_column' => 0, 
                'id_parent' => 0, 
                'level_depth' => 0, 
                'item_k' => 7, 
                'item_v' => 1, 
                'is_mega' => 0, 
                'item_t' => 0, 
                'title' => '', 
                'html' => '', 
            ),
            1 => array(
                'sample_pid' => 0,
                'sample_cid' => 0,
                'id_st_mega_menu' => '', 
                'id_st_mega_column' => 0, 
                'id_parent' => 0, 
                'level_depth' => 0, 
                'item_k' => 0, 
                'item_v' => '', 
                'is_mega' => 1, 
                'item_t' => 0, 
                'title' => 'Custom block', 
                'html' => '', 
                'columns' => array(
                    0 => array('id_st_mega_column' => 0, 'width' => 4, ),
                    1 => array('id_st_mega_column' => 0, 'width' => 4, ),
                    2 => array('id_st_mega_column' => 0, 'width' => 4, ),
                ),
            ),
            2 => array(
                'sample_pid' => 1,
                'sample_cid' => 0,
                'id_st_mega_menu' => '', 
                'id_st_mega_column' => '', 
                'id_parent' => 0, 
                'level_depth' => 1, 
                'item_k' => 0, 
                'item_v' => '', 
                'is_mega' => 0, 
                'item_t' => 5, 
                'title' => '', 
                'html' => '<h6 class="uppercase color_444" style="font-family:Vollkorn;">Welcome to transformer theme</h6><p>Transformer theme is a modern, clean and professional Prestashop theme, it comes with a lot of useful features. Transformer theme is fully responsive, it looks stunning on all types of screens and devices.</p><ul class="desc"><li>Fully Customizable Design</li><li>Sidebar Shopping Cart</li></ul><p><a class="go" title="Buy this theme" href="#" target="_blank">BUY THIS THEME</a></p>', 
            ),
            3 => array(
                'sample_pid' => 1,
                'sample_cid' => 1,
                'id_st_mega_menu' => '', 
                'id_st_mega_column' => '', 
                'id_parent' => 0, 
                'level_depth' => 1, 
                'item_k' => 0, 
                'item_v' => '', 
                'is_mega' => 0, 
                'item_t' => 5, 
                'title' => '', 
                'html' => '<p><a href="#" title="Transformer theme" rel="nofollow"><img src="/modules/stmegamenu/views/img/sample_1.jpg" alt="Transformer theme"/></a><p><p>Transformer theme is a modern, clean and professional Prestashop theme, it comes with a lot of useful features. Transformer theme is fully responsive, it looks stunning on all types of screens and devices.</p>', 
            ),
            4 => array(
                'sample_pid' => 1,
                'sample_cid' => 2,
                'id_st_mega_menu' => '', 
                'id_st_mega_column' => '', 
                'id_parent' => 0, 
                'level_depth' => 1, 
                'item_k' => 0, 
                'item_v' => '', 
                'is_mega' => 0, 
                'item_t' => 5, 
                'title' => '', 
                'html' => '<p><a href="#" title="Transformer theme" rel="nofollow"><img src="/modules/stmegamenu/views/img/sample_2.jpg" alt="Transformer theme"/></a><p><p>Transformer theme is a modern, clean and professional Prestashop theme, it comes with a lot of useful features. Transformer theme is fully responsive, it looks stunning on all types of screens and devices.</p>', 
            ),
		);		
		foreach($samples as $k=>&$sample)
		{
			$module = new StMegaMenuClass();
            if($sample['id_st_mega_column']===0 || $sample['id_st_mega_column']==='0')
                $id_st_mega_column = 0;
            else
                $id_st_mega_column = $samples[$sample['sample_pid']]['columns'][$sample['sample_cid']]['id_st_mega_column'];

            $module->id_st_mega_column = (int)$id_st_mega_column;
			$module->id_parent = $sample['id_parent'];
			$module->level_depth = $sample['level_depth'];
            $module->item_k = $sample['item_k'];
            $module->item_v = $sample['item_v'];
            $module->is_mega = $sample['is_mega'];
            $module->item_t = $sample['item_t'];
            foreach (Language::getLanguages(false) as $lang)
            {
                $module->title[$lang['id_lang']] = $sample['title'];
                $module->html[$lang['id_lang']] = $sample['html'];
            }
			$module->active = 1;
			$module->position = $k*10;
			$module->id_shop = (int)$id_shop;
			$return &= $module->add();
            if($return)
            {
                $sample['id_st_mega_menu'] = $module->id;
                if(isset($sample['columns']) && count($sample['columns']))
                    foreach ($sample['columns'] as $ck => $column) {
                        $col = new StMegaColumnClass();
                        $col->id_st_mega_menu = $module->id;
                        $col->width = $column['width'];
                        $col->active = 1;
                        $col->position = $ck;
                        $return &= $col->add();
                        if($return)
                            $sample['columns'][$ck]['id_st_mega_column'] = $col->id;
                    }
            }
		}
		return $return;
    }

	public function installDb()
	{
		$return = true;
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_mega_menu` (
                `id_st_mega_menu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                `location` tinyint(1) unsigned NOT NULL DEFAULT 0,
				`id_st_mega_column` int(10) UNSIGNED NOT NULL DEFAULT 0,
				`id_parent` int(10) NOT NULL DEFAULT 0,
                `level_depth` tinyint(3) unsigned NOT NULL DEFAULT 0,   
                `id_shop` int(10) unsigned NOT NULL,      
                `item_k` tinyint(2) unsigned NOT NULL DEFAULT 0,  
				`item_v` varchar(255) DEFAULT NULL,    
                `subtype` tinyint(1) unsigned NOT NULL DEFAULT 0,  
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1,
    			`new_window` TINYINT( 1 ) NOT NULL DEFAULT 0,
                `txt_color` varchar(7) DEFAULT NULL,
                `link_color` varchar(7) DEFAULT NULL,
                `bg_color` varchar(7) DEFAULT NULL,
                `txt_color_over` varchar(7) DEFAULT NULL,
                `bg_color_over` varchar(7) DEFAULT NULL,
                `tab_content_bg` varchar(7) DEFAULT NULL,
                `auto_sub` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `nofollow` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `alignment` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `width` float(3,1) unsigned NOT NULL DEFAULT 0,
                `is_mega` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `sub_levels` int(10) unsigned NOT NULL DEFAULT 2,
                `sub_limit` int(10) unsigned NOT NULL DEFAULT 0,
                `item_limit` int(10) unsigned NOT NULL DEFAULT 0,
                `items_md` tinyint(2) unsigned NOT NULL DEFAULT 4,
                `icon_class` varchar(255) DEFAULT NULL,
                `item_t` tinyint(2) unsigned NOT NULL DEFAULT 0,
                `cate_label_color` varchar(7) DEFAULT NULL,
                `cate_label_bg` varchar(7) DEFAULT NULL,
                `show_cate_img` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `bg_image` varchar(255) DEFAULT NULL,
                `bg_repeat` tinyint(1) unsigned DEFAULT 3,
                `bg_position` tinyint(1) unsigned DEFAULT 0,
                `bg_margin_bottom` int(10) unsigned DEFAULT 0,
                `granditem` tinyint(1) NOT NULL DEFAULT 0,
				PRIMARY KEY (`id_st_mega_menu`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_mega_menu_lang` (
                `id_st_mega_menu` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `id_lang` int(10) unsigned NOT NULL ,
                `title` varchar(255) DEFAULT NULL,
                `link` varchar(255) DEFAULT NULL,
                `html` text,
                `cate_label` varchar(255) DEFAULT NULL,
                PRIMARY KEY (`id_st_mega_menu`, `id_lang`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_mega_column` (
                `id_st_mega_column` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `id_st_mega_menu` int(10) unsigned NOT NULL,
                `width` float(3,1) unsigned NOT NULL DEFAULT 4,
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `title` varchar(255) DEFAULT NULL,
                PRIMARY KEY (`id_st_mega_column`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_menu_product` (
                `id_st_mega_menu` int(10) unsigned NOT NULL,
                `id_product` int(10) unsigned NOT NULL,
                KEY `menu_product` (`id_st_mega_menu`,`id_product`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_menu_brand` (
                `id_st_mega_menu` int(10) unsigned NOT NULL,
                `id_manufacturer` int(10) unsigned NOT NULL,
                KEY `menu_brand` (`id_st_mega_menu`,`id_manufacturer`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}

	public function uninstall()
	{
		if (!parent::uninstall() ||
			!$this->uninstallDB())
			return false;
        $this->clearStMegamenuCache();
		return true;
	}

	private function uninstallDb()
	{
        return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_mega_menu`,`'._DB_PREFIX_.'st_mega_menu_lang`,`'._DB_PREFIX_.'st_mega_column`,`'._DB_PREFIX_.'st_menu_brand`,`'._DB_PREFIX_.'st_menu_product`');
	}
    
    private function _checkImageDir()
    {
        $result = '';
        if (!file_exists(_PS_UPLOAD_DIR_.$this->name))
        {
            $success = @mkdir(_PS_UPLOAD_DIR_.$this->name, self::$access_rights, true)
						|| @chmod(_PS_UPLOAD_DIR_.$this->name, self::$access_rights);
            if(!$success)
                $this->_html .= $this->displayError('"'._PS_UPLOAD_DIR_.$this->name.'" '.$this->getTranslator()->trans('An error occurred during new folder creation', array(), 'Admin.Theme.Transformer'));
        }

        if (!is_writable(_PS_UPLOAD_DIR_))
            $this->_html .= $this->displayError('"'._PS_UPLOAD_DIR_.$this->name.'" '.$this->getTranslator()->trans('directory isn\'t writable.', array(), 'Admin.Theme.Transformer'));
        
        if (!is_writable(_PS_MODULE_DIR_.$this->name.'/views/css'))
            $this->_html .= $this->displayError('"'._PS_MODULE_DIR_.$this->name.'/views/css'.'" '.$this->getTranslator()->trans('directory isn\'t writable.', array(), 'Admin.Theme.Transformer'));
            
        return $result;
    }
        
	public function getContent()
	{
		$this->context->controller->addCSS($this->_path. 'views/css/admin.css');
		$this->context->controller->addJS($this->_path. 'views/js/admin.js');
    	$id_st_mega_menu = (int)Tools::getValue('id_st_mega_menu');
        $check_result = $this->_checkImageDir();
        if (Tools::getValue('act') == 'gsmm' && Tools::getValue('ajax')==1)
        {
            if(!$q = Tools::getValue('q'))
                die;
            $excludeIds = Tools::getValue('excludeIds');
            $result = Db::getInstance()->executeS('
			SELECT m.`id_manufacturer`,m.`name`
			FROM `'._DB_PREFIX_.'manufacturer` m
            LEFT JOIN `'._DB_PREFIX_.'manufacturer_shop` ms
            ON m.`id_manufacturer` = ms.`id_manufacturer`
			WHERE `name` LIKE \'%'.pSQL($q).'%\'
            AND id_shop = '.(int)Shop::getContextShopID().'
            AND `active` = 1
            '.($excludeIds ? 'AND m.`id_manufacturer` NOT IN('.$excludeIds.')' : '').'
    		');
            foreach ($result AS $value)
		      echo trim($value['name']).'|'.(int)($value['id_manufacturer'])."\n";
            die;
        }
        $this->initHookArray();
        if (Tools::isSubmit('copystmegamenu'))
        {
            if($this->processCopyMegaMenu($id_st_mega_menu))
            {
                $this->clearStMegamenuCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=19&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while copy menu.', array(), 'Modules.Stmegamenu.Admin'));
        }
        if (isset($_POST['savestmegamenuhook']))
        {
            $this->saveHook();
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }
		if (isset($_POST['savestmegamenu']) || isset($_POST['savestmegamenuAndStay']))
        {
            if($id_st_mega_menu)
				$menu = new StMegaMenuClass($id_st_mega_menu);
			else
				$menu = new StMegaMenuClass();
                
            $error = array();
            
    		$menu->copyFromPost();
    		$menu->id_parent = 0;
            $menu->level_depth = 0;
            
            $item = Tools::getValue('links');
            if($item)
            {
                $item_arr = explode('_',$item);
                if(count($item_arr)!=2)
                {
                    $this->_html .= $this->displayError($this->getTranslator()->trans('"Menu item" error', array(), 'Modules.Stmegamenu.Admin'));
    			     return;
                }
                $menu->item_k = $item_arr[0];
                $menu->item_v = $item_arr[1];
            }
            else
            {
                $menu->item_k = 0;
                $menu->item_v = '';
            }

            // Check default language
            $default_lang_id = (int)(Configuration::get('PS_LANG_DEFAULT'));
            $defaultLanguage = new Language($default_lang_id);

            if(!$id_st_mega_menu)
            {
                $languages = Language::getLanguages(false);
        		foreach ($languages as $language)
                    if(!$menu->title[$language['id_lang']])
        			     $menu->title[$language['id_lang']] = $menu->title[$defaultLanguage->id];
            }

            /*if (!$menu->item_k && !$menu->title[$defaultLanguage->id])
                $error[] = $this->displayError($this->getTranslator()->trans('Please select an option from "Main menu" drop down list or fill out "Menu name" field.', array(), 'Modules.Stmegamenu.Admin'));*/
                

            $menu->id_shop = (int)Shop::getContextShopID();

            if(!count($error))
            {
                $res = $this->stUploadImage('bg_image_field');
                    
                if(count($res['error']))
                    $error = array_merge($error,$res['error']);
                elseif($res['image'])
                    $menu->bg_image = $res['image'];
            }

            if (!count($error) && $menu->validateFields(false) && $menu->validateFieldsLang(false))
            {
                if($menu->save())
                {
                    $this->clearStMegamenuCache();
                    if(isset($_POST['savestmegamenuAndStay']) || Tools::getValue('fr') == 'view')
                    {
                        $rd_str = isset($_POST['savestmegamenuAndStay']) && Tools::getValue('fr') == 'view' ? 'fr=view&update' : (isset($_POST['savestmegamenuAndStay']) ? 'update' : 'view');
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$menu->id.'&conf='.($id_st_mega_menu?4:3).'&'.$rd_str.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
                    }   
                    else
                        $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Main menu', array(), 'Admin.Theme.Transformer').' '.($id_st_mega_menu ? $this->getTranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('added', array(), 'Admin.Theme.Transformer')));
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during main menu', array(), 'Admin.Theme.Transformer').' '.($id_st_mega_menu ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
			else
				$this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Modules.Stmegamenu.Admin'));
        }

        if (isset($_POST['savecolumnstmegamenu']) || isset($_POST['savecolumnstmegamenuAndStay']))
		{
            $id_st_mega_column = (int)Tools::getValue('id_st_mega_column');
            if($id_st_mega_column)
                $column = new StMegaColumnClass($id_st_mega_column);
            else
                $column = new StMegaColumnClass();

            $error = array();
            $column->copyFromPost();

            if (!count($error) && $column->validateFields(false) && $column->validateFieldsLang(false))
            {
                if($column->save())
                {
                    $this->clearStMegamenuCache();
                    if(isset($_POST['savecolumnstmegamenuAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$column->id.'&conf='.($id_st_mega_column?4:3).'&updatestmegacolumn&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$column->id_st_mega_menu.'&view'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during menu', array(), 'Admin.Theme.Transformer').' '.($id_st_mega_column ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));

        }
        if (isset($_POST['savecustomlinkstmegamenu']) || isset($_POST['savecustomlinkstmegamenuAndStay']))
        {
            if($id_st_mega_menu)
				$menu = new StMegaMenuClass($id_st_mega_menu);
			else
				$menu = new StMegaMenuClass();
                
            $error = array();
            
    		$menu->copyFromPost();

            $menu_parent = new StMegaMenuClass($menu->id_parent);
            $menu->level_depth = $menu_parent->level_depth+1;
            
            $item = Tools::getValue('links');
            if($item)
            {
                $item_arr = explode('_',$item);
                if(count($item_arr)!=2)
                {
                    $this->_html .= $this->displayError($this->getTranslator()->trans('"Menu item" error', array(), 'Modules.Stmegamenu.Admin'));
                     return;
                }
                $menu->item_k = $item_arr[0];
                $menu->item_v = $item_arr[1];
            }

            // Check default language
            $default_lang_id = (int)(Configuration::get('PS_LANG_DEFAULT'));
            $defaultLanguage = new Language($default_lang_id);

            if(!$id_st_mega_menu)
            {
                $languages = Language::getLanguages(false);
                foreach ($languages as $language)
                    if(!$menu->title[$language['id_lang']])
                         $menu->title[$language['id_lang']] = $menu->title[$defaultLanguage->id];
            }

            if (!$menu->item_k && !$menu->title[$defaultLanguage->id])
                $error[] = $this->displayError($this->getTranslator()->trans('Please select an option from "Menu" drop down list or fill out "Menu name" field.', array(), 'Modules.Stmegamenu.Admin'));

            $menu->id_shop = (int)Shop::getContextShopID();
            if (!count($error) && $menu->validateFields(false) && $menu->validateFieldsLang(false))
            {
                if($menu->save())
                {
                    $this->clearStMegamenuCache();
                    if(isset($_POST['savecustomlinkstmegamenuAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$menu->id.'&conf='.($id_st_mega_menu?4:3).'&update'.$this->name.'&id_parent='.$menu->id_st_mega_column.'&ct=4&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$menu->id_st_mega_column.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during menu', array(), 'Admin.Theme.Transformer').' '.($id_st_mega_menu ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
			else
				$this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
		if (isset($_POST['savecustomcontentstmegamenu']) || isset($_POST['savecustomcontentstmegamenuAndStay']))
        {
            if($id_st_mega_menu)
				$menu = new StMegaMenuClass($id_st_mega_menu);
			else
				$menu = new StMegaMenuClass();
                
            $error = array();
    		$menu->copyFromPost();

            // Check default language
            $default_lang_id = (int)(Configuration::get('PS_LANG_DEFAULT'));
            $defaultLanguage = new Language($default_lang_id);
    		if (!$menu->html[$defaultLanguage->id])
                $error[] = $this->displayError($this->getTranslator()->trans('The field "Custom content" is required at least in ', array(), 'Modules.Stmegamenu.Admin').$defaultLanguage->name);

            $menu_parent = new StMegaMenuClass($menu->id_parent);
            $menu->level_depth = $menu_parent->level_depth+1;

            $menu->id_shop = (int)Shop::getContextShopID();
            $menu->active = 1;

            if (!count($error) && $menu->validateFields(false) && $menu->validateFieldsLang(false))
            {
                if($menu->save())
                {
                    $this->clearStMegamenuCache();
                    if(isset($_POST['savecustomcontentstmegamenuAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$menu->id.'&conf='.($id_st_mega_menu?4:3).'&update'.$this->name.'&id_parent='.$menu->id_st_mega_column.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$menu->id_st_mega_column.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during custom content', array(), 'Admin.Theme.Transformer').' '.($id_st_mega_menu ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
			else
				$this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        if (isset($_POST['savecategorystmegamenu']) || isset($_POST['savecategorystmegamenuAndStay']))
        {
            if($id_st_mega_menu)
                $menu = new StMegaMenuClass($id_st_mega_menu);
            else
                $menu = new StMegaMenuClass();
                
            $error = array();
            
            $menu->copyFromPost();
            $menu->id_parent = 0;
            $menu->level_depth = 0;
            
            $item = Tools::getValue('links');
            if($item)
            {
                $item_arr = explode('_',$item);
                if(count($item_arr)!=2)
                {
                    $this->_html .= $this->displayError($this->getTranslator()->trans('"Menu item" error', array(), 'Modules.Stmegamenu.Admin'));
                     return;
                }
                $menu->item_k = $item_arr[0];
                $menu->item_v = $item_arr[1];
            }
            else
                $error[] = $this->displayError($this->getTranslator()->trans('Please select an option from "Category" drop down list.', array(), 'Modules.Stmegamenu.Admin'));
            
            if(!$menu->id_st_mega_column)
                $error[] = $this->displayError($this->getTranslator()->trans('An error occurred.', array(), 'Admin.Theme.Transformer'));

            $menu->id_shop = (int)Shop::getContextShopID();
            if (!count($error) && $menu->validateFields(false) && $menu->validateFieldsLang(false))
            {
                if($menu->save())
                {
                    $this->clearStMegamenuCache();
                    if(isset($_POST['savecategorystmegamenuAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$menu->id.'&conf='.($id_st_mega_menu?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$menu->id_st_mega_column.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during menu item', array(), 'Admin.Theme.Transformer').' '.($id_st_mega_menu ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        if (isset($_POST['saveproductstmegamenu']) || isset($_POST['saveproductstmegamenuAndStay']))
        {
            if($id_st_mega_menu)
                $menu = new StMegaMenuClass($id_st_mega_menu);
            else
                $menu = new StMegaMenuClass();
                
            $error = array();
            
            $menu->copyFromPost();
            $menu->id_parent = 0;
            $menu->level_depth = 0;
            
            $products = trim(Tools::getValue('inputMenuProducts'),'-');
            if(!$products)
                $error[] = $this->displayError($this->getTranslator()->trans('The field "Product name" is required.', array(), 'Modules.Stmegamenu.Admin'));

            if(!$menu->id_st_mega_column)
                $error[] = $this->displayError($this->getTranslator()->trans('An error occurred.', array(), 'Admin.Theme.Transformer'));

            $menu->id_shop = (int)Shop::getContextShopID();
            if (!count($error) && $menu->validateFields(false) && $menu->validateFieldsLang(false))
            {
                if($menu->save())
                {
                    StMegaProductClass::deleteMenuProducts($menu->id);
                    $products_id = array_unique(explode('-', $products));
                    if (count($products_id))
                        StMegaProductClass::changeMenuProducts($menu->id, $products_id);

                    $this->clearStMegamenuCache();
                    if(isset($_POST['saveproductstmegamenuAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$menu->id.'&conf='.($id_st_mega_menu?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$menu->id_st_mega_column.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during menu item', array(), 'Admin.Theme.Transformer').' '.($id_st_mega_menu ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }

        if (isset($_POST['savebrandstmegamenu']) || isset($_POST['savebrandstmegamenuAndStay']))
        {
            if($id_st_mega_menu)
                $menu = new StMegaMenuClass($id_st_mega_menu);
            else
                $menu = new StMegaMenuClass();
                
            $error = array();
            
            $menu->copyFromPost();
            $menu->id_parent = 0;
            $menu->level_depth = 0;
            
            if(!$menu->id_st_mega_column)
                $error[] = $this->displayError($this->getTranslator()->trans('An error occurred.', array(), 'Admin.Theme.Transformer'));

            $menu->id_shop = (int)Shop::getContextShopID();
            if (!count($error) && $menu->validateFields(false) && $menu->validateFieldsLang(false))
            {
                if($menu->save())
                {
                    StMegaBrandClass::deleteByMenu($menu->id);
                    $res = true;
                    if($id_manufacturer = Tools::getValue('id_manufacturer'))
                    foreach($id_manufacturer AS $value)
                    $res &= Db::getInstance()->insert('st_menu_brand', array(
        					'id_manufacturer' => (int)$value,
        					'id_st_mega_menu' => (int)$menu->id
        				));

                    $this->clearStMegamenuCache();
                    if(isset($_POST['savebrandstmegamenuAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$menu->id.'&conf='.($id_st_mega_menu?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$menu->id_st_mega_column.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during menu item', array(), 'Admin.Theme.Transformer').' '.($id_st_mega_menu ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        if(Tools::getValue('act')=='delete_image' && $identi = Tools::getValue('id_st_mega_menu'))
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $menu = new StMegaMenuClass((int)$identi);
            if(Validate::isLoadedObject($menu))
            {   
                @unlink(_PS_UPLOAD_DIR_.$this->name.'/'.$menu->bg_image);
                @unlink(_PS_UPLOAD_DIR_.$this->name.'/thumb'.$menu->bg_image);
                $menu->bg_image = '';
                if($menu->save())
                {
                    $result['r'] = true;
                }
            }
            die(json_encode($result));
        }
	    if ((Tools::isSubmit('activestmegamenu')))
        {
    		$menu = new StMegaMenuClass((int)$id_st_mega_menu);
            if(Validate::isLoadedObject($menu) && $menu->toggleStatus())
            {
                $this->clearStMegamenuCache();
                
                if($menu->id_st_mega_column)
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$menu->id_st_mega_column.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules'));
                else
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            } 
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        
        if ((Tools::isSubmit('activestmegacolumn')))
        {
            $id_st_mega_column = (int)Tools::getValue('id_st_mega_column');
    		$column = new StMegaColumnClass($id_st_mega_column);
            if(Validate::isLoadedObject($column) && $column->toggleStatus())
            {
                $this->clearStMegamenuCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$column->id_st_mega_menu.'&view'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            } 
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
		
        
        if (Tools::isSubmit('addstmegamenu'))
		{
            $helper = $this->initForm(); 
            $this->_html .= $helper->generateForm($this->fields_form);
			return $this->_html;
		}
        elseif (Tools::isSubmit('addmenustmegamenu'))
		{
            if(!Tools::getValue('id_parent'))
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));

            $ct = Tools::getValue('ct');
            switch ($ct) {
                case 1:
                    $helper = $this->initCategoryForm(); 
                    break;
                case 2:
                    $helper = $this->initProductForm(); 
                    break;
                case 3:
                    $helper = $this->initBrandForm(); 
                    break;
                case 4:
                    $helper = $this->initCustomLinkForm(); 
                    break;
                case 5:
                    $helper = $this->initCustomContentForm(); 
                    break;
                default:
                    break;
            }

            $this->_html .= $helper->generateForm($this->fields_form);

            return $this->_html;
		}
        elseif (Tools::isSubmit('updatestmegamenu'))
        {
    		$menu = new StMegaMenuClass((int)$id_st_mega_menu);
            if(!Validate::isLoadedObject($menu) || $menu->id_shop!=(int)Shop::getContextShopID())
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));

            if($menu->item_t)
            {
                switch ($menu->item_t) {
                    case 1:
                        $helper = $this->initCategoryForm(); 
                        break;
                    case 2:
                        $helper = $this->initProductForm(); 
                        break;
                    case 3:
                        $helper = $this->initBrandForm(); 
                        break;
                    case 4:
                        $helper = $this->initCustomLinkForm(); 
                        break;
                    case 5:
                        $helper = $this->initCustomContentForm(); 
                        break;
                    default:
                        break;
                }
            }
            else
            {
                $helper = $this->initForm(); 
            }
            $this->_html .= $helper->generateForm($this->fields_form);
            return $this->_html; 
        }
        elseif (Tools::isSubmit('updatestmegacolumn'))
        {
            $id_st_mega_column = (int)Tools::getValue('id_st_mega_column');
            $column = new StMegaColumnClass((int)$id_st_mega_column);
            if(!Validate::isLoadedObject($column))
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));

            $helper = $this->initColumnForm();
            $this->_html .= $helper->generateForm($this->fields_form);

            return $this->_html; 
        }
        else if (Tools::isSubmit('deletestmegamenu'))
		{
    		$menu = new StMegaMenuClass((int)$id_st_mega_menu);
            if(Validate::isLoadedObject($menu))
            {
                if($menu->id_parent)
                    $menu_secondary_id = StMegaMenuClass::getSecondaryParent((int)$menu->id);
                    
                $menu->delete();
                $this->clearStMegamenuCache();
                
                if($menu->id_st_mega_column)
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$menu->id_st_mega_column.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        else if (Tools::isSubmit('deletestmegacolumn'))
		{
            $id_st_mega_column = (int)Tools::getValue('id_st_mega_column');
    		$column = new StMegaColumnClass($id_st_mega_column);
            if(Validate::isLoadedObject($column))
            {
                $column->delete();
                $this->clearStMegamenuCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$column->id_st_mega_menu.'&view'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        elseif(Tools::isSubmit('viewstmegamenu'))
        {
            $menu = new StMegaMenuClass((int)$id_st_mega_menu);
            if(!Validate::isLoadedObject($menu))
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
              
            $helper = $this->initColumnList();
            $all = StMegaColumnClass::getAll($menu->id, 0);
            $this->_html .= $helper->generateList($all, $this->fields_list);
            
            return $this->_html;
        }
        elseif(Tools::isSubmit('viewstmegacolumn'))
        {
            $id_st_mega_column = (int)Tools::getValue('id_st_mega_column');
    		$column = new StMegaColumnClass((int)$id_st_mega_column);
            if(!Validate::isLoadedObject($column))
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
              
            $helper = $this->initMenuList();
            $jon = StMegaMenuClass::getByColumnId($column->id, $this->context->language->id, 0, 0, 0);
            $all = array();
            foreach ($jon  as $k) {
                $all[] = $k;
                if($k['item_t']==4)
                {
                    $li = StMegaMenuClass::recurseTree($k['id_st_mega_menu'],0,0,0,$this->context->language->id, 4);
                    if(is_array($li) && count($li))
                    {
                        $this->getCustomLinkContent($li);

                        $res = array();
                        $this->_toFlat($res, $li); 
                        foreach ($res as $l) {
                            $all[] = $l;
                        }
                    }
                    $cs = StMegaMenuClass::recurseTree($k['id_st_mega_menu'],1,0,0,$this->context->language->id, 5);
                    if(is_array($cs) && count($cs))
                    {
                        $res = array();
                        $this->_toFlat($res, $cs);
                        foreach ($res as $c) {
                            $all[] = $c;
                        }
                    }
                }
            }
            $this->_html .= $helper->generateList($all, $this->fields_list);
            
			return $this->_html;
        }
        elseif (Tools::isSubmit('addcolumnstmegamenu')) {
            $id_parent = (int)Tools::getValue('id_parent');
            if(!$id_parent)
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            $menu = new StMegaMenuClass($id_parent);
            if(!Validate::isLoadedObject($menu))
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));


            $helper = $this->initColumnForm();
            $this->_html .= $helper->generateForm($this->fields_form);

            return $this->_html;
        }
        else
        {
            $helper = $this->initList();
            $all = StMegaMenuClass::recurseTree(0,1,0,0,$this->context->language->id,0);
            $this->_html .= $helper->generateList($all, $this->fields_list);
            return $this->_html.$this->initHookForm()->generateForm($this->fields_form);
        }
            
	}
    public function getCustomLinkContent(&$li)
    {
        //
        if(is_array($li) && count($li)) 
            foreach($li as &$v)
            {
                if(isset($v['children']) && is_array($v['children']) && count($v['children'])) 
                    $this->getCustomLinkContent($v['children']);

                $cc = StMegaMenuClass::recurseTree($v['id_st_mega_menu'],1,0,0,$this->context->language->id, 5);
                if(is_array($cc) && count($cc))
                {
                    if(!isset($v['children']))
                        $v['children'] = array();

                    $v['children'] += $cc;
                }
            }
        return true;
    }
    private function _toFlat(&$res, $arr, $cid=0)
    {
        if(is_array($arr) && count($arr)) 
            foreach($arr as $v)
            {
                if($cid && $v['id_st_mega_menu']==$cid)
                    continue;
                $tmp=$v;
                unset($tmp['children']);
                $res[] = $tmp;
                if(isset($v['children']) && is_array($v['children']) && count($v['children'])) 
                    $this->_toFlat($res, $v['children'], $cid);
            }
        return true;
    }

    public function getMyAccountLinks()
    {
        return array(
            'my-account' => array('id'=>'10_my-account', 'name'=>$this->getTranslator()->trans('My account', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Manage my customer account', array(), 'Admin.Theme.Transformer')),
            'order-follow' => array('id'=>'10_history', 'name'=>$this->getTranslator()->trans('My orders', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My orders', array(), 'Admin.Theme.Transformer')),
            'order-follow' => array('id'=>'10_order-follow', 'name'=>$this->getTranslator()->trans('My merchandise returns', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My returns', array(), 'Admin.Theme.Transformer')),
            'order-slip' => array('id'=>'10_order-slip', 'name'=>$this->getTranslator()->trans('My credit slips', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My credit slips', array(), 'Admin.Theme.Transformer')),
            'addresses' => array('id'=>'10_addresses', 'name'=>$this->getTranslator()->trans('My addresses', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My addresses', array(), 'Admin.Theme.Transformer')),
            'identity' => array('id'=>'10_identity', 'name'=>$this->getTranslator()->trans('My personal info', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Manage my personal information', array(), 'Admin.Theme.Transformer')),
            'discount' => array('id'=>'10_discount', 'name'=>$this->getTranslator()->trans('My vouchers', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My vouchers', array(), 'Admin.Theme.Transformer')),
        );
    }
    
    public function getInformationLinks()
    {
        return array(
            'prices-drop' => array('id'=>'10_prices-drop', 'name'=>$this->getTranslator()->trans('Specials', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Specials', array(), 'Admin.Theme.Transformer')),
            'new-products' => array('id'=>'10_new-products', 'name'=>$this->getTranslator()->trans('New products', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('New products', array(), 'Admin.Theme.Transformer')),
            'best-sales' => array('id'=>'10_best-sales', 'name'=>$this->getTranslator()->trans('Top sellers', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Top sellers', array(), 'Admin.Theme.Transformer')),
            'stores' => array('id'=>'10_stores', 'name'=>$this->getTranslator()->trans('Our stores', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Our stores', array(), 'Admin.Theme.Transformer')),
            'contact' => array('id'=>'10_contact', 'name'=>$this->getTranslator()->trans('Contact us', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Contact us', array(), 'Admin.Theme.Transformer')),
            'sitemap' => array('id'=>'10_sitemap', 'name'=>$this->getTranslator()->trans('Sitemap', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Sitemap', array(), 'Admin.Theme.Transformer')),
            'manufacturer' => array('id'=>'10_manufacturer', 'name'=>$this->getTranslator()->trans('Manufacturers', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Manufacturers', array(), 'Admin.Theme.Transformer')),
            'supplier' => array('id'=>'10_supplier', 'name'=>$this->getTranslator()->trans('Suppliers', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Suppliers', array(), 'Admin.Theme.Transformer')),
        );
    }

    public function createCategoryLinks()
    {
        $id_lang = $this->context->language->id;
        $category_arr = array();
        $this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(),true);
        return $category_arr;
    }
    
    public function createLinks($icon=true)
    {
        $id_lang = $this->context->language->id;
        $category_arr = array();
		$this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(),true);
        
        $supplier_arr = array();
		$suppliers = Supplier::getSuppliers(false, $id_lang);
		foreach ($suppliers as $supplier)
            $supplier_arr[] = array('id'=>'5_'.$supplier['id_supplier'],'name'=>$supplier['name']);
            
        $manufacturer_arr = array();
		$manufacturers = Manufacturer::getManufacturers(false, $id_lang);
		foreach ($manufacturers as $manufacturer)
            $manufacturer_arr[] = array('id'=>'4_'.$manufacturer['id_manufacturer'],'name'=>$manufacturer['name']);
  
        $cms_arr = array();
		$this->getCMSOptions($cms_arr, 0, 1, $id_lang);
        
        $blog_category_arr = array();
        if($this->stblog_status)
		{
            $blog_categories = StBlogCategory::getCategories(0,$id_lang,true);
            $this->getBlogCategoryOption($blog_category_arr,$blog_categories);
        }
        
        $links = array(
            array('name'=>$this->getTranslator()->trans('Category', array(), 'Admin.Theme.Transformer'),'query'=>$category_arr),
            array('name'=>$this->getTranslator()->trans('Informations', array(), 'Admin.Theme.Transformer'),'query'=>$this->getInformationLinks()),
            array('name'=>$this->getTranslator()->trans('My account', array(), 'Admin.Theme.Transformer'),'query'=>$this->getMyAccountLinks()),
            array('name'=>$this->getTranslator()->trans('CMS', array(), 'Admin.Theme.Transformer'),'query'=>$cms_arr),
            array('name'=>$this->getTranslator()->trans('Supplier', array(), 'Admin.Theme.Transformer'),'query'=>$supplier_arr),
            array('name'=>$this->getTranslator()->trans('Manufacturer', array(), 'Admin.Theme.Transformer'),'query'=>$manufacturer_arr),
            array('name'=>$this->getTranslator()->trans('Blog', array(), 'Admin.Theme.Transformer'),'query'=>$blog_category_arr),
            /*array('name'=>$this->getTranslator()->trans('Products', array(), 'Admin.Theme.Transformer'),'query'=>array(
                array('id'=>'2_0', 'name'=>$this->getTranslator()->trans('Choose ID product', array(), 'Admin.Theme.Transformer')),
            )),*/
        );
        if($icon)
            array_unshift($links,array('name'=>$this->getTranslator()->trans('Icon', array(), 'Admin.Theme.Transformer'),'query'=>array(
                array('id'=>'7_1', 'name'=>$this->getTranslator()->trans('Home icon', array(), 'Admin.Theme.Transformer')),
            )));
        return $links;
    }
    
    private function initHookForm()
    {
        $this->fields_form[0]['form'] = array(
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
            $this->fields_form[0]['form']['input'][] = array(
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
        
        $fields_values = array();
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
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
        $helper->module = $this;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'save'.$this->name.'hook';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $fields_values,
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
    }

	private function initForm()
    {
    	$id_st_mega_menu = (int)Tools::getValue('id_st_mega_menu');
        if($id_st_mega_menu)
            $menu = new StMegaMenuClass((int)$id_st_mega_menu);
        else
            $menu = new StMegaMenuClass();
        
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('General Settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                'links' => array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Main menu:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'links',
                    'class' => 'fixed-width-xxl',
                    'required' => true,
                    'options' => array(
                        'optiongroup' => array (
                            'query' => $this->createLinks(),
                            'label' => 'name'
                        ),
                        'options' => array (
                            'query' => 'query',
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'default' => array(
                            'value' => '',
                            'label' => $this->getTranslator()->trans('Select an option or fill out Menu name field', array(), 'Modules.Stmegamenu.Admin')
                        ),
                    )
                ),
                'title' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Menu name / Overwrite name:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'title',
                    'size' => 64,
                    'lang' => true,
                    'required' => true,
                ),
                'link' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Link:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'link',
                    'size' => 64,
                    'lang' => true,
                ),
                array(
                    'type' => 'html',
                    'id'   => 'location',
                    'label' => $this->getTranslator()->trans('Display on:', array(), 'Admin.Theme.Transformer'),
                    'name' => $this->BuildRadioUI($this->_location, 'location', (int)$menu->location),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Submenu type:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'is_mega',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'is_mega_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Mega', array(), 'Modules.Stmegamenu.Admin')
                        ),
                        array(
                            'id' => 'is_mega_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Multi level', array(), 'Modules.Stmegamenu.Admin')
                        )
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Submenu width:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'width',
                    'options' => array(
                        'query' => self::$_bootstrap_a,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 12,
                            'label' => '12/12',
                        ),
                    ),
                ),
                array(
                    'type' => 'html',
                    'id'   => 'alignment',
                    'label' => $this->getTranslator()->trans('Submenu alignment:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => $this->BuildRadioUI($this->_align, 'alignment', (int)$menu->alignment),
                    'desc' => $this->getTranslator()->trans('Actually only for Mega menu.', array(), 'Modules.Stmegamenu.Admin'),
                ),
                array(
                    'type' => 'fontello',
                    'label' => $this->getTranslator()->trans('Icon:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'icon_class',
                    'values' => $this->get_fontello(),
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Open in a new window:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'new_window',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'new_window_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'new_window_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('No follow:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'nofollow',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'nofollow_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'nofollow_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'desc' => $this->getTranslator()->trans('The "nofollow" option controls whether a nofollow attribute is placed on links, which affects the way search engines interact with those links.', array(), 'Modules.Stmegamenu.Admin'),
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Status:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'active',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'radio',
					'label' => $this->getTranslator()->trans('Visibility:', array(), 'Admin.Theme.Transformer'),
					'name' => 'hide_on_mobile',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'hide_on_mobile_0',
							'value' => 0,
							'label' => $this->getTranslator()->trans('Visible on all devices', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'hide_on_mobile_1',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Visible on large devices (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
							'id' => 'hide_on_mobile_2',
							'value' => 2,
							'label' => $this->getTranslator()->trans('Visible on small devices (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
					),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                    
                ),
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );

        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Advanced Settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'txt_color',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'txt_color_over',
                    'class' => 'color',
                    'size' => 20,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_color',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link hover background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_color_over',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Submenu background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'tab_content_bg',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Label:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cate_label',
                    'size' => 64,
                    'lang' => true,
                    'desc' => $this->getTranslator()->trans('E.g. "Hot", "New"', array(), 'Modules.Stmegamenu.Admin'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Lable color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cate_label_color',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Lable background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cate_label_bg',
                    'class' => 'color',
                    'size' => 20,
                ), 

                'bg_image_field' => array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Background image:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_image_field',
                    'desc' => '',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_repeat',
                    'default_value' => 3,
                    'values' => array(
                        array(
                            'id' => 'bg_repeat_no',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bg_repeat_xy',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bg_repeat_x',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bg_repeat_y',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_position',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'bg_position_rb',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('right bottom', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bg_position_rt',
                            'value' => 4,
                            'label' => $this->getTranslator()->trans('right top', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bg_position_rc',
                            'value' => 5,
                            'label' => $this->getTranslator()->trans('right center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bg_position_lt',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('left top', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bg_position_lc',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('left center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bg_position_lb',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('left bottom', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bg_position_ct',
                            'value' => 6,
                            'label' => $this->getTranslator()->trans('center top', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bg_position_cc',
                            'value' => 7,
                            'label' => $this->getTranslator()->trans('center center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bg_position_cb',
                            'value' => 8,
                            'label' => $this->getTranslator()->trans('center bottom', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                 array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_margin_bottom',
                    'suffix' => 'px',
                    'validation' => 'isUnsignedInt',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'  
                 ),
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );
        if(Validate::isLoadedObject($menu))
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_mega_menu');
            if ($menu->bg_image)
                $this->fields_form[1]['form']['input']['bg_image_field']['image'] = '<img src="'._THEME_PROD_PIC_DIR_.$this->name.'/thumb'.$menu->bg_image.'" class="img_preview">
                    <p><a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$menu->id.'&token='.Tools::getAdminTokenLite('AdminModules').'" class="btn btn-default st_delete_image"><i class="icon-trash"></i> '.$this->getTranslator()->trans('Delete', array(), 'Modules.Stmegamenu.Admin').'</a></p>';
        }
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestmegamenu';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($menu),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);         

        if(Validate::isLoadedObject($menu))
        {
            $helper->tpl_vars['fields_value']['links'] = $menu->item_k.'_'.$menu->item_v;
        }

		return $helper;
    }
    public function getParentList($id_st_mega_column, $cid)
    {
        $result = array();
        $parents = StMegaMenuClass::getByColumnId($id_st_mega_column, $this->context->language->id, 0, 4, 0);
        if(is_array($parents) && count($parents))
        {
            foreach($parents as &$v)
            {
                $jon = StMegaMenuClass::recurseTree($v['id_st_mega_menu'],0,0,$active=0,$this->context->language->id, 4);
                if(is_array($jon) && count($jon))
                    $v['children'] = $jon;
            }

            $res = array();
            if($parents)
                $this->_toFlat($res, $parents, $cid);    

            foreach ($res as $value)
            {
                $spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$value['level_depth']);
                $result[] = array(
                    'id' => $value['id_st_mega_menu'],
                    'name' => $spacer.$this->displayTitle($value['title'],$value),
                );
            }
        }
        
        return $result;
    }

    public function recurseParents($v, $parents)
    {
        foreach($parents as $value)
        {
            if($v['id_st_mega_menu'] == $value['id_parent'])
            {
                $value = $this->recurseParents($value, $parents);
                $v['children'][$value['id_st_mega_menu']] = $value;
            }
        }
        return $v;
    }
    public function initCategoryForm()
    {
        $id_st_mega_menu = (int)Tools::getValue('id_st_mega_menu');
        if($id_st_mega_menu)
        {
            $menu = new StMegaMenuClass((int)$id_st_mega_menu);
            $id_parent = $menu->id_st_mega_column;
        }
        else
            $menu = new StMegaMenuClass();

        if(!isset($id_parent) && Tools::getValue('id_parent'))
            $id_parent = (int)Tools::getValue('id_parent');

        
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Category', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                'links' => array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Categories:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'links',
                    'required' => true,
                    'options' => array(
                        'query' => $this->createCategoryLinks(),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => '',
                            'label' => $this->getTranslator()->trans('Select category', array(), 'Admin.Theme.Transformer'),
                        ),
                    )
                ),
                'title' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Overwrite name:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'title',
                    'size' => 64,
                    'lang' => true,
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Show category image:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'show_cate_img',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'show_cate_img_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'show_cate_img_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Menu item:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'subtype',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'subtype_categories',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Sub-categories', array(), 'Modules.Stmegamenu.Admin')
                        ),
                        array(
                            'id' => 'subtype_self_categories',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Self + Sub-categories', array(), 'Modules.Stmegamenu.Admin')
                        ),
                        array(
                            'id' => 'subtype_products',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Products', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'subtype_products',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('Self only', array(), 'Modules.Stmegamenu.Admin')
                        ),
                    ),
                ),
                array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->getTranslator()->trans('Items per row:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'items',
                    'values' => array(
                            'maximum' => 6,
                            'medias' => array('md'),
                        ),
                    'desc' => $this->getTranslator()->trans('Actually only for Mega menu.', array(), 'Modules.Stmegamenu.Admin'),
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Levels:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'sub_levels',
                    'default_value' => 2,
                    'class' => 'fixed-width-sm',
                    'desc' => $this->getTranslator()->trans('0 for no limits.', array(), 'Modules.Stmegamenu.Admin'),                           
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Item limit:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'item_limit',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',     
                    'desc' => $this->getTranslator()->trans('0 for no limits. You have to fill this field if you have set "Menu item" to "Products".', array(), 'Modules.Stmegamenu.Admin'),               
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Sub-item limit:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'sub_limit',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',     
                    'desc' => $this->getTranslator()->trans('0 for no limits.', array(), 'Modules.Stmegamenu.Admin'),                 
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to display 4th level + menu items:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'granditem',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'granditem_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Display them under their parent menu items', array(), 'Modules.Stmegamenu.Admin')
                        ),
                        array(
                            'id' => 'granditem_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Display them when mouse over their parent menu items.', array(), 'Modules.Stmegamenu.Admin')
                        )
                    ),
                    'desc' => $this->getTranslator()->trans('Only for Mega menu.', array(), 'Modules.Stmegamenu.Admin'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Open in a new window:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'new_window',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'new_window_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'new_window_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('No follow:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'nofollow',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'nofollow_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'nofollow_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'desc' => $this->getTranslator()->trans('The "nofollow" option controls whether a nofollow attribute is placed on links, which affects the way search engines interact with those links.', array(), 'Modules.Stmegamenu.Admin'),
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Status:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'active',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'radio',
					'label' => $this->getTranslator()->trans('Visibility:', array(), 'Admin.Theme.Transformer'),
					'name' => 'hide_on_mobile',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'hide_on_mobile_0',
							'value' => 0,
							'label' => $this->getTranslator()->trans('Visible on all devices', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'hide_on_mobile_1',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Visible on large devices (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
							'id' => 'hide_on_mobile_2',
							'value' => 2,
							'label' => $this->getTranslator()->trans('Visible on small devices (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
					),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                    
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'id_st_mega_column',
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'item_t',
                    'default_value' => 1,
                ),
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$id_parent.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a><a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to home page</a>',                  
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );

        
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Advanced settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'txt_color',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'txt_color_over',
                    'class' => 'color',
                    'size' => 20,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Label:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cate_label',
                    'size' => 64,
                    'lang' => true,
                    'desc' => $this->getTranslator()->trans('E.g. "Hot", "New"', array(), 'Modules.Stmegamenu.Admin'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Lable color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cate_label_color',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Lable background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cate_label_bg',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$id_parent.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a><a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to home page</a>',                  
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );
        if(Validate::isLoadedObject($menu))
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_mega_menu');
        }
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->module = $this;
        $helper->table =  $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'savecategorystmegamenu';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($menu),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );   

        if(Validate::isLoadedObject($menu))
        {
            $helper->tpl_vars['fields_value']['links'] = $menu->item_k.'_'.$menu->item_v;
        }
        $helper->tpl_vars['fields_value']['id_st_mega_column'] = $id_parent;
        $helper->tpl_vars['fields_value']['items_md'] = (int)$menu->items_md;

        return $helper;
    }
    public function initProductForm()
    {
        $id_st_mega_menu = (int)Tools::getValue('id_st_mega_menu');
        if($id_st_mega_menu){
            $menu = new StMegaMenuClass((int)$id_st_mega_menu);
            $id_parent = $menu->id_st_mega_column;
        }
        else
            $menu = new StMegaMenuClass();

        if(!isset($id_parent) && Tools::getValue('id_parent'))
            $id_parent = (int)Tools::getValue('id_parent');


        $menuProducts = StMegaProductClass::getMenuProductsLight($this->context->language->id, $menu->id);

        $product_div = '';
        $product_ids = '';
        $product_name = '';
        if(is_array($menuProducts) && count($menuProducts))
            foreach ($menuProducts as $v) {
                $product_div .= '<div class="form-control-static">
                    <button type="button" class="btn btn-default delMenuProduct" name="'.$v['id_product'].'">
                        <i class="icon-remove text-danger"></i>
                    </button>
                    '.$v['name'].' ('.$this->getTranslator()->trans('ref', array(), 'Modules.Stmegamenu.Admin').': '.$v['reference'].')
                </div>';
                $product_ids .= $v['id_product'].'-';
                $product_name .= $v['name'].'¤';
            }
        

        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Product', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                'product_name' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Product name:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'product_name',
                    'autocomplete' => false,
                    'desc' => $this->getTranslator()->trans('Current product', array(), 'Admin.Theme.Transformer').': <ul id="curr_product_name">'.$product_div.'</ul>',
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'inputMenuProducts',
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'nameMenuProducts',
                ),
                array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->getTranslator()->trans('Items per row:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'items',
                    'values' => array(
                            'maximum' => 6,
                            'medias' => array('md'),
                        ),
                    'desc' => $this->getTranslator()->trans('Only for Mega menu.', array(), 'Modules.Stmegamenu.Admin'),
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Status:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'active',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'radio',
					'label' => $this->getTranslator()->trans('Visibility:', array(), 'Admin.Theme.Transformer'),
					'name' => 'hide_on_mobile',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'hide_on_mobile_0',
							'value' => 0,
							'label' => $this->getTranslator()->trans('Visible on all devices', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'hide_on_mobile_1',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Visible on large devices (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
							'id' => 'hide_on_mobile_2',
							'value' => 2,
							'label' => $this->getTranslator()->trans('Visible on small devices (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
					),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                    
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'id_st_mega_column',
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'item_t',
                    'default_value' => 2,
                ),
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$id_parent.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a><a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to home page</a>',                  
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );

        if(Validate::isLoadedObject($menu))
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_mega_menu');
        }
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->module = $this;
        $helper->table =  $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'saveproductstmegamenu';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($menu),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );   

        $helper->tpl_vars['fields_value']['id_st_mega_column'] = $id_parent;
        $helper->tpl_vars['fields_value']['inputMenuProducts'] = $product_ids;
        $helper->tpl_vars['fields_value']['nameMenuProducts'] = $product_name;
        $helper->tpl_vars['fields_value']['items_md'] = (int)$menu->items_md;

        return $helper;
    }
    public function initBrandForm()
    {

        $id_st_mega_menu = (int)Tools::getValue('id_st_mega_menu');
        if($id_st_mega_menu){
            $menu = new StMegaMenuClass((int)$id_st_mega_menu);
            $id_parent = $menu->id_st_mega_column;
        }
        else
            $menu = new StMegaMenuClass();

        if(!isset($id_parent) && Tools::getValue('id_parent'))
            $id_parent = (int)Tools::getValue('id_parent');

        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Product', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Show all Brands:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'item_k',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'brands_item_k_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'brands_item_k_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer'))
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                'manufacturers' => array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Specific Brands:', array(), 'Modules.Stmegamenu.Admin'),
					'name' => 'manufacturers',
                    'autocomplete' => false,
                    'class' => 'fixed-width-xxl',
                    'desc' => '',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Type:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'subtype',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'subtype_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Image', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'subtype_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('List', array(), 'Admin.Theme.Transformer'))
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->getTranslator()->trans('Items per row:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'items',
                    'values' => array(
                            'maximum' => 6,
                            'medias' => array('md'),
                        ),
                    'desc' => $this->getTranslator()->trans('Actually only for Mega menu.', array(), 'Modules.Stmegamenu.Admin'),
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Status:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'active',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'radio',
					'label' => $this->getTranslator()->trans('Visibility:', array(), 'Admin.Theme.Transformer'),
					'name' => 'hide_on_mobile',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'hide_on_mobile_0',
							'value' => 0,
							'label' => $this->getTranslator()->trans('Visible on all devices', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'hide_on_mobile_1',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Visible on large devices (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
							'id' => 'hide_on_mobile_2',
							'value' => 2,
							'label' => $this->getTranslator()->trans('Visible on small devices (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
					),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                    
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'id_st_mega_column',
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'item_t',
                    'default_value' => 3,
                ),
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$id_parent.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a><a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to home page</a>',                  
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );

        if(Validate::isLoadedObject($menu))
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_mega_menu');
        }
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->module = $this;
        $helper->table =  $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'savebrandstmegamenu';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($menu),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );   

        $helper->tpl_vars['fields_value']['id_st_mega_column'] = $id_parent;
        $helper->tpl_vars['fields_value']['items_md'] = (int)$menu->items_md;

        $manufacturers_html = '';
        if ($res = StMegaBrandClass::getByMenu((int)$menu->id))
            foreach($res AS $value)
            {
                $manufacturers_html .= '<li>'.Manufacturer::getNameById($value['id_manufacturer']).'
                <a href="javascript:;" class="del_manufacturer"><img src="../img/admin/delete.gif" /></a>
                <input type="hidden" name="id_manufacturer[]" value="'.$value['id_manufacturer'].'" /></li>';
            }
        
        $this->fields_form[0]['form']['input']['manufacturers']['desc'] = $this->getTranslator()->trans('Actually only for "Show all Brands" is set to "No".', array(), 'Modules.Stmegamenu.Admin').'<br/>'.$this->getTranslator()->trans('Current manufacturers', array(), 'Modules.Stmegamenu.Admin')
                .': <ul id="curr_manufacturers">'.$manufacturers_html.'</ul>'; 

        return $helper;
    }
    public function initCustomLinkForm()
    {
        $id_st_mega_menu = (int)Tools::getValue('id_st_mega_menu');
        if($id_st_mega_menu)
        {
            $menu = new StMegaMenuClass($id_st_mega_menu);
            $id_parent = $menu->id_st_mega_column;
        }
        else
        {
            $menu = new StMegaMenuClass();
        }
        if(!isset($id_parent) && Tools::getValue('id_parent'))
            $id_parent = (int)Tools::getValue('id_parent');
           

        $cid=0;
        if(Validate::isLoadedObject($menu))
            $cid = $menu->id;
        $parents_arr = $this->getParentList($id_parent, $cid);
        
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Custom link', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Parent:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'id_parent',
                    'options' => array(
                        'query' => $parents_arr,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Please select', array(), 'Admin.Theme.Transformer')
                        )
                    )
                ),
                'links' => array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Menu item:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'links',
                    'class' => 'fixed-width-xxl',
                    'required' => true,
                    'options' => array(
                        'optiongroup' => array (
                            'query' => $this->createLinks(),
                            'label' => 'name'
                        ),
                        'options' => array (
                            'query' => 'query',
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'default' => array(
                            'value' => '',
                            'label' => $this->getTranslator()->trans('Select an option or fill out Menu name field', array(), 'Modules.Stmegamenu.Admin')
                        ),
                    )
                ),
                'title' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Menu name:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'title',
                    'size' => 64,
                    'lang' => true,
                    'required' => true,
                ),
                'link' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Link:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'link',
                    'size' => 64,
                    'lang' => true,
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to display it\'s sub menu items:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'granditem',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'granditem_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Display it\'s sub menu items under it', array(), 'Modules.Stmegamenu.Admin')
                        ),
                        array(
                            'id' => 'granditem_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Display it\'s sub menu items when mouse over it.', array(), 'Modules.Stmegamenu.Admin')
                        )
                    ),
                    'desc' => $this->getTranslator()->trans('Only for Mega menu and level 4+ menu items.', array(), 'Modules.Stmegamenu.Admin'),
                ),
                array(
                    'type' => 'fontello',
                    'label' => $this->getTranslator()->trans('Icon:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'icon_class',
                    'values' => $this->get_fontello(),
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Open in a new window:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'new_window',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'new_window_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'new_window_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('No follow:', array(), 'Modules.Stmegamenu.Admin'),
                    'name' => 'nofollow',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'nofollow_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'nofollow_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'desc' => $this->getTranslator()->trans('The "nofollow" option controls whether a nofollow attribute is placed on links, which affects the way search engines interact with those links.', array(), 'Modules.Stmegamenu.Admin'),
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Status:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'active',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'radio',
					'label' => $this->getTranslator()->trans('Visibility:', array(), 'Admin.Theme.Transformer'),
					'name' => 'hide_on_mobile',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'hide_on_mobile_0',
							'value' => 0,
							'label' => $this->getTranslator()->trans('Visible on all devices', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'hide_on_mobile_1',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Visible on large devices (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
							'id' => 'hide_on_mobile_2',
							'value' => 2,
							'label' => $this->getTranslator()->trans('Visible on small devices (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
					),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                    
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'id_st_mega_column',
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'item_t',
                    'default_value' => 4,
                ),
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$id_parent.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a><a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to home page</a>',                  
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );

        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Advanced settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'txt_color',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'txt_color_over',
                    'class' => 'color',
                    'size' => 20,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Label:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cate_label',
                    'size' => 64,
                    'lang' => true,
                    'desc' => $this->getTranslator()->trans('E.g. "Hot", "New"', array(), 'Modules.Stmegamenu.Admin'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Lable color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cate_label_color',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Lable background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'cate_label_bg',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$id_parent.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a><a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to home page</a>',                  
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );
        if(Validate::isLoadedObject($menu))
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_mega_menu');
        }
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->module = $this;
        $helper->table =  $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'savecustomlinkstmegamenu';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($menu),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );   

        $helper->tpl_vars['fields_value']['id_st_mega_column'] = $id_parent;

        if(Validate::isLoadedObject($menu))
        {
            $helper->tpl_vars['fields_value']['links'] = $menu->item_k.'_'.$menu->item_v;
        }

        return $helper;

    }
    public function initCustomContentForm()
    {

        $id_st_mega_menu = (int)Tools::getValue('id_st_mega_menu');
        if($id_st_mega_menu){
            $menu = new StMegaMenuClass((int)$id_st_mega_menu);
            $id_parent = $menu->id_st_mega_column;
        }
        else
            $menu = new StMegaMenuClass();

        if(!isset($id_parent) && Tools::getValue('id_parent'))
            $id_parent = (int)Tools::getValue('id_parent');

        $cid=0;
        if(Validate::isLoadedObject($menu))
            $cid = $menu->id;
        $parents_arr = $this->getParentList($id_parent, $cid);

        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Custom content', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Parent:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'id_parent',
                    'options' => array(
                        'query' => $parents_arr,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Please select', array(), 'Admin.Theme.Transformer')
                        )
                    )
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->getTranslator()->trans('Content:', array(), 'Admin.Theme.Transformer'),
                    'lang' => true,
                    'name' => 'html',
                    'cols' => 40,
                    'rows' => 10,
                    'autoload_rte' => true,
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Status:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'active',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'radio',
					'label' => $this->getTranslator()->trans('Visibility:', array(), 'Admin.Theme.Transformer'),
					'name' => 'hide_on_mobile',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'hide_on_mobile_0',
							'value' => 0,
							'label' => $this->getTranslator()->trans('Visible on all devices', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'hide_on_mobile_1',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Visible on large devices (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
							'id' => 'hide_on_mobile_2',
							'value' => 2,
							'label' => $this->getTranslator()->trans('Visible on small devices (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
					),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                    
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'id_st_mega_column',
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'item_t',
                    'default_value' => 5,
                ),
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_column='.$id_parent.'&viewstmegacolumn&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a><a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to home page</a>',                  
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );

        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Advanced settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'txt_color',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'link_color',
                    'class' => 'color',
                    'size' => 20,
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'txt_color_over',
                    'class' => 'color',
                    'size' => 20,
                ),
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_advanced_column='.$id_parent.'&viewstadvancedcolumn&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a><a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to home page</a>',                  
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );

        if(Validate::isLoadedObject($menu))
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_mega_menu');
        }
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->module = $this;
        $helper->table =  $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'savecustomcontentstmegamenu';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($menu),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );   
        $helper->tpl_vars['fields_value']['id_st_mega_column'] = $id_parent;

        return $helper;
    }

    private function getCategoryOption(&$category_arr, $id_category = 1, $id_lang = false, $id_shop = false, $recursive = true)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$category = new Category((int)$id_category, (int)$id_lang, (int)$id_shop);

		if (is_null($category->id))
			return;

		if ($recursive)
		{
			$children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);
			$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$category->level_depth);
		}

		$shop = (object) Shop::getShop((int)$category->getShopID());
		$category_arr[] = array('id'=>'1_'.(int)$category->id,'name'=>(isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')');

		if (isset($children) && is_array($children) && count($children))
			foreach ($children as $child)
			{
				$this->getCategoryOption($category_arr, (int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],$recursive);
			}
	}
    private function getBlogCategoryOption(&$blog_category_arr, $blog_categories)
    {
        $module = new StMegaMenu();
        foreach($blog_categories as $category)
        {
            $spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$category['level_depth']);
            if($category['id_parent']==0 && $category['is_root_category'])
		        $name = $module->getTranslator()->trans('Blog', array(), 'Admin.Theme.Transformer');
            else
                $name = $category['name'].$module->getTranslator()->trans(' (Category)', array(), 'Admin.Theme.Transformer');
                            
            $blog_category_arr[] = array('id'=>'8_'.(int)$category['id_st_blog_category'],'name'=>(isset($spacer) ? $spacer : '').$name);
            
            foreach($this->getBlogPage((int)$category['id_st_blog_category']) AS $blog)
            {
                $blog_category_arr[] = array('id'=>'9_'.(int)$blog['id_st_blog'],'name'=>(isset($spacer) ? $spacer.str_repeat('&nbsp;', $this->spacer_size) : '').$blog['name']);
            }
            
            if(isset($category['child']) && is_array($category['child']) && count($category['child']))
            {
                $this->getBlogCategoryOption($blog_category_arr, $category['child']);
            }
        }
    }
    private function getBlogPage($id_st_blog_category=0, $id_shop=false, $id_lang=false)
    {
        return StBlogClass::getCategoryBlogs($id_st_blog_category);
    }
	private function getCMSOptions(&$cms_arr, $parent = 0, $depth = 1, $id_lang = false)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

		$categories = $this->getCMSCategories(false, (int)$parent, (int)$id_lang);
		$pages = $this->getCMSPages((int)$parent, false, (int)$id_lang);

		$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$depth);

		foreach ($categories as $category)
		{
            $cms_arr[] = array('id'=>'6_'.$category['id_cms_category'],'name'=>$spacer.$category['name']);
			$this->getCMSOptions($cms_arr, $category['id_cms_category'], (int)$depth + 1, (int)$id_lang);
		}

		foreach ($pages as $page)
            $cms_arr[] = array('id'=>'3_'.$page['id_cms'],'name'=>$spacer.$page['meta_title']);
	}

    private function getCMSCategories($recursive = false, $parent = 1, $id_lang = false, $id_shop = false)
	{
        $id_shop = ($id_shop !== false) ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

		if ($recursive === false)
        {
            $sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
            FROM `'._DB_PREFIX_.'cms_category` bcp
            INNER JOIN `'._DB_PREFIX_.'cms_category_shop` cs
            ON (bcp.`id_cms_category` = cs.`id_cms_category`)
            INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
            ON (bcp.`id_cms_category` = cl.`id_cms_category`)
            WHERE cl.`id_lang` = '.(int)$id_lang.'
            AND cs.`id_shop` = '.(int)$id_shop.'
            AND cl.`id_shop` = '.(int)$id_shop.'
            AND bcp.`id_parent` = '.(int)$parent;

            return Db::getInstance()->executeS($sql);
        }
        else
        {
            $sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
            FROM `'._DB_PREFIX_.'cms_category` bcp
            INNER JOIN `'._DB_PREFIX_.'cms_category_shop` cs
            ON (bcp.`id_cms_category` = cs.`id_cms_category`)
            INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
            ON (bcp.`id_cms_category` = cl.`id_cms_category`)
            WHERE cl.`id_lang` = '.(int)$id_lang.'
            AND cs.`id_shop` = '.(int)$id_shop.'
            AND cl.`id_shop` = '.(int)$id_shop.'
            AND bcp.`id_parent` = '.(int)$parent;

			$results = Db::getInstance()->executeS($sql);
			foreach ($results as $result)
			{
				$sub_categories = $this->getCMSCategories(true, $result['id_cms_category'], (int)$id_lang);
				if ($sub_categories && count($sub_categories) > 0)
					$result['sub_categories'] = $sub_categories;
				$categories[] = $result;
			}

			return isset($categories) ? $categories : false;
		}

	}

	private function getCMSPages($id_cms_category, $id_shop = false, $id_lang = false)
	{
		$id_shop = ($id_shop !== false) ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

		$sql = 'SELECT c.`id_cms`, cl.`meta_title`, cl.`link_rewrite`
			FROM `'._DB_PREFIX_.'cms` c
			INNER JOIN `'._DB_PREFIX_.'cms_shop` cs
			ON (c.`id_cms` = cs.`id_cms`)
			INNER JOIN `'._DB_PREFIX_.'cms_lang` cl
			ON (c.`id_cms` = cl.`id_cms`)
			WHERE c.`id_cms_category` = '.(int)$id_cms_category.'
            AND cs.`id_shop` = '.(int)$id_shop.'
            AND cl.`id_shop` = '.(int)$id_shop.' 
			AND cl.`id_lang` = '.(int)$id_lang.'
			AND c.`active` = 1
			ORDER BY `position`';

		return Db::getInstance()->executeS($sql);
	}


    public static function displayTitle($value, $row)
	{
        $id_lang = (int)Context::getContext()->language->id;
		$id_shop = (int)Shop::getContextShopID();
        $spacer = str_repeat('&nbsp;', 5 * (int)$row['level_depth']);
        $name = '';
        switch($row['item_k'])
        {
            case 0:
                $name = $value;
            break;
            case 1:
                $category = new Category((int)$row['item_v'],$id_lang);
                if(Validate::isLoadedObject($category))
                    $name = $category->name;
            break;
            case 2:
                $product = new Product((int)$row['item_v'], false, (int)$id_lang);
                if ($product->id)
                    $name = $product->name;
            break;
            case 3:
                $cms = CMS::getLinks((int)$id_lang, array((int)$row['item_v']));
				if (count($cms))
					$name = $cms[0]['meta_title'];
            break;
            case 4:
                $manufacturer = new Manufacturer((int)$row['item_v'], (int)$id_lang);
				if ($manufacturer->id)
				    $name = $manufacturer->name;
            break;
            case 5:
                $supplier = new Supplier((int)$row['item_v'], (int)$id_lang);
				if ($supplier->id)
				    $name = $supplier->name;
            break;
			case 6:
				$category = new CMSCategory((int)$row['item_v'], (int)$id_lang);
				if ($category->id)
					$name = $category->name;
			break;
			case 7:
                $module = new StMegaMenu();
				return $module->getTranslator()->trans('Home icon', array(), 'Admin.Theme.Transformer');
			break;
			case 8:
	            if(Module::isInstalled('stblog') && Module::isEnabled('stblog'))
				{
    				$category = new StBlogCategory((int)$row['item_v'],$id_lang);
                    if(Validate::isLoadedObject($category))
                        if ($category->is_root_category)
         			    {
                            $module = new StMegaMenu();
         			        $name = $module->getTranslator()->trans('Blog', array(), 'Admin.Theme.Transformer');
         			    }
                		else
                            $name = $category->name;
                }
			break;
			case 9:
                if(Module::isInstalled('stblog') && Module::isEnabled('stblog'))
				{
                    $rs = StBlogClass::getBlogInfo((int)$row['item_v'], 'name');
                    $name = $rs['name'];
				}          
			break;
			case 10:
                $module = new StMegaMenu(); 
                $information = $module->getInformationLinks();
                $myAccount = $module->getMyAccountLinks();  
                
                if(array_key_exists($row['item_v'],$information))
                    $name = $information[$row['item_v']]['name'];
                if(array_key_exists($row['item_v'],$myAccount))
                    $name = $myAccount[$row['item_v']]['name'];
			break;
        }
        return $row['title'] ? $row['title'] : $name;
	}

    public static function displayType($value, $row)
    {
        return self::$_type[$value];
    }

    public static function displayLocation($value, $row)
    {
        $location = '';
        $menu = Module::getInstanceByName('stmegamenu');
        foreach ($menu->_location as $v) {
            if($v['value']==$value)
            {
                $location = $v['label'];
                break;
            }
        }
        return $location;
    }

    public static function displayItemType($value, $row)
	{
		return self::$_item_type[$value];
	}

    protected function initList()
	{
		$this->fields_list = array(            
            'id_st_mega_menu' => array(
                'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
                'width' => 120,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
			'title' => array(
				'title' => $this->getTranslator()->trans('Title', array(), 'Admin.Theme.Transformer'),
				'width' => 140,
				'type' => 'text',
				'callback' => 'displayTitle',
				'callback_object' => 'StMegaMenu',
                'search' => false,
                'orderby' => false,
			),
            'item_k' => array(
                'title' => $this->getTranslator()->trans('Type', array(), 'Admin.Theme.Transformer'),
                'width' => 140,
                'type' => 'text',
                'callback' => 'displayType',
                'callback_object' => 'StMegaMenu',
                'search' => false,
                'orderby' => false,
            ),
            'location' => array(
                'title' => $this->getTranslator()->trans('Display on', array(), 'Admin.Theme.Transformer'),
                'width' => 140,
                'type' => 'text',
                'callback' => 'displayLocation',
                'callback_object' => 'StMegaMenu',
                'search' => false,
                'orderby' => false,
            ),
			'position' => array(
				'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
				'width' => 140,
				'type' => 'text',
                'search' => false,
                'orderby' => false,
			),
            'active' => array(
				'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
				'align' => 'center',
				'active' => 'active',
				'type' => 'bool',
				'orderby' => false,
				'width' => 25,
                'search' => false,
                'orderby' => false,
            ),
		);

		if (Shop::isFeatureActive())
			$this->fields_list['id_shop'] = array(
                'title' => $this->getTranslator()->trans('ID Shop', array(), 'Admin.Theme.Transformer'), 
                'align' => 'center', 
                'width' => 25, 
                'type' => 'int',
                'search' => false,
                'orderby' => false,
                );

		$helper = new HelperList();
		$helper->shopLinkType = '';
		$helper->simple_header = false;
        $helper->module = $this;
		$helper->identifier = 'id_st_mega_menu';
		$helper->actions = array('view', 'edit', 'delete','duplicate');
		$helper->show_toolbar = true;
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add main menu', array(), 'Modules.Stmegamenu.Admin')
		);
		$helper->title = $this->displayName;
		$helper->table = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    
    public function displayDuplicateLink($token, $id, $name)
    {
        return '<li class="divider"></li><li><a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&copy'.$this->name.'&id_st_mega_menu='.(int)$id.'&token='.$token.'"><i class="icon-copy"></i>'.$this->getTranslator()->trans(' Duplicate ', array(), 'Admin.Theme.Transformer').'</a></li>';
    }

    public static function displayWidth($value, $row)
    {
        return ($value*10/10).'/12';
    }

    public function initColumnList()
    {
        $this->fields_list = array(
            'title' => array(
                'title' => $this->getTranslator()->trans('Title', array(), 'Admin.Theme.Transformer'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false,
            ),
            'width' => array(
                'title' => $this->getTranslator()->trans('Width', array(), 'Admin.Theme.Transformer'),
                'type' => 'text',
                'search' => false,
                'orderby' => false,
                'class'=>'fixed-width-xxl',
                'callback' => 'displayWidth',
                'callback_object' => 'StMegaMenu',
            ),
            'position' => array(
                'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
                'class'=>'fixed-width-xxl',
                'type' => 'text',
                'search' => false,
                'orderby' => false,
            ),
            'active' => array(
                'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
                'align' => 'center',
                'active' => 'active',
                'type' => 'bool',
                'orderby' => false,
                'class'=>'fixed-width-sm',
                'search' => false,
                'orderby' => false,
            ),
        );

        $id_st_mega_menu = (int)Tools::getValue('id_st_mega_menu');
        $menu = new StMegaMenuClass((int)$id_st_mega_menu, $this->context->language->id);
        if(!$menu->is_mega)
            unset($this->fields_list['width']);

        $helper = new HelperList();
        $helper->module = $this;
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->identifier = 'id_st_mega_column';
        $helper->actions = array('view', 'edit', 'delete');
        $helper->show_toolbar = true;
        $helper->toolbar_btn['new'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addcolumn'.$this->name.'&id_parent='.(int)Tools::getValue('id_st_mega_menu').'&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Add column', array(), 'Modules.Stmegamenu.Admin')
        );
        $helper->toolbar_btn['back'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Back', array(), 'Modules.Stmegamenu.Admin')
        );
        $helper->tpl_vars['navigate'] = array(
            '<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'">'.$this->getTranslator()->trans("Home", array(), 'Admin.Theme.Transformer').'</a>',
            self::displayTitle($menu->title, get_object_vars($menu))
        );
        
        $helper->title = $this->getTranslator()->trans('Columns', array(), 'Modules.Stmegamenu.Admin');
        $helper->table = 'stmegacolumn';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        return $helper;
    }
    

    private function initColumnForm()
    {
        $id_st_mega_column = (int)Tools::getValue('id_st_mega_column');
        if($id_st_mega_column)
        {
            $column = new StMegaColumnClass((int)$id_st_mega_column);
            $id_parent = $column->id_st_mega_menu;
        }
        else
            $column = new StMegaColumnClass();

        if(!isset($id_parent) && Tools::getValue('id_parent'))
            $id_parent = (int)Tools::getValue('id_parent');
        
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Column', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                'column_width' => array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'width',
                    'required' => true,
                    'options' => array(
                        'query' => self::$_bootstrap_b,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 3,
                            'label' => '3/12',
                        ),
                    )
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Title:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'title',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('This title would not show on the front office, only as a reminde.', array(), 'Modules.Stmegamenu.Admin'),
                ),
                array(
                    'type' => 'radio',
					'label' => $this->getTranslator()->trans('Visibility:', array(), 'Admin.Theme.Transformer'),
					'name' => 'hide_on_mobile',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'hide_on_mobile_0',
							'value' => 0,
							'label' => $this->getTranslator()->trans('Visible on all devices', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'hide_on_mobile_1',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Visible on large devices (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
							'id' => 'hide_on_mobile_2',
							'value' => 2,
							'label' => $this->getTranslator()->trans('Visible on small devices (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
					),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Status:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'active',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                    
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'id_st_mega_menu',
                ),
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$id_parent.'&view'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a><a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to home page</a>',    
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );

        if(Validate::isLoadedObject($column))
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_mega_column');
        }

        $parent = new StMegaMenuClass($id_parent);
        if(!$parent->is_mega)
            unset($this->fields_form[0]['form']['input']['column_width']);

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table =  $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'savecolumnstmegamenu';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($column),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );   

        $helper->tpl_vars['fields_value']['id_st_mega_menu'] = $id_parent;

        return $helper;
    }
    public static function displayContent($value, $row)
    {
        if($value)
            return StMegaMenu::displayTitle($value, $row);
        else
        {
            $module = new StMegaMenu();
            return $module->getTranslator()->trans('Custom content', array(), 'Admin.Theme.Transformer');
        }
    }

    public static function displayItemTitle($value, $row)
    {
        $context = Context::getContext();
        $res = '-';
        switch ($row['item_t']) {
            case 1:
            case 4:
                $res = str_repeat('&nbsp;', 5 * (int)$row['level_depth']).self::displayTitle($value, $row);
                break;
            case 2:
                $menuProducts = StMegaProductClass::getMenuProductsLight($context->language->id, $row['id_st_mega_menu']);
                if(is_array($menuProducts) && count($menuProducts))
                {
                    $res = '<ul class="item_list_in_td">';
                    foreach ($menuProducts as $v)
                        $res .= '<li>'.$v['name'].'</li>';
                    $res .= '</ul>';
                }
                break;
            case 3:
                if ($row['item_k'] == 1)
                {
                    $module = new StMegaMenu();
                    $res = $module->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer');
                }
                else
                {
                    $menuBrands = StMegaBrandClass::getMenuBrandsLight($context->language->id, $row['id_st_mega_menu']);
                    
                    if(is_array($menuBrands) && count($menuBrands))
                    {
                        $res = '<ul class="item_list_in_td">';
                        foreach ($menuBrands as $v)
                            $res .= '<li>'.$v['name'].'</li>';
                        $res .= '</ul>';
                    }    
                }
                break;
            case 5:
                $res = str_repeat('&nbsp;', 5 * (int)$row['level_depth']).Tools::truncateString(strip_tags(stripslashes($row['html'])), 80);
                break;
            default:
                break;
        }
        return $res;
    }

    public function initMenuList()
    {
        $id_parent = (int)Tools::getValue('id_st_mega_column');
        $column = new StMegaColumnClass($id_parent);
        if(!Validate::isLoadedObject($column))
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));

        $this->fields_list = array(
			'item_t' => array(
				'title' => $this->getTranslator()->trans('Type', array(), 'Admin.Theme.Transformer'),
				'width' => 140,
				'type' => 'text',
				'callback' => 'displayItemType',
				'callback_object' => 'StMegaMenu',
                'search' => false,
                'orderby' => false,
			),
            'title' => array(
                'title' => $this->getTranslator()->trans('Content', array(), 'Admin.Theme.Transformer'),
                'width' => 140,
                'type' => 'text',
                'callback' => 'displayItemTitle',
                'callback_object' => 'StMegaMenu',
                'search' => false,
                'orderby' => false,
            ),
            'link' => array(
                'title' => $this->getTranslator()->trans('Link', array(), 'Admin.Theme.Transformer'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false,
            ),
			'position' => array(
				'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
				'width' => 140,
				'type' => 'text',
                'search' => false,
                'orderby' => false,
			),
            'active' => array(
				'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
				'align' => 'center',
				'active' => 'active',
				'type' => 'bool',
				'orderby' => false,
				'width' => 25,
                'search' => false,
                'orderby' => false,
            ),
		);

		if (Shop::isFeatureActive())
			$this->fields_list['id_shop'] = array(
                'title' => $this->getTranslator()->trans('ID Shop', array(), 'Admin.Theme.Transformer'), 
                'align' => 'center', 
                'width' => 25, 
                'type' => 'int',
                'search' => false,
                'orderby' => false,
                );

        $leval0 = new StMegaMenuClass($column->id_st_mega_menu, $this->context->language->id);
        
		$helper = new HelperList();
        $helper->module = $this;
		$helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_mega_menu';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->toolbar_btn['new_category'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addmenu'.$this->name.'&id_parent='.$id_parent.'&ct=1&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Add category block', array(), 'Modules.Stmegamenu.Admin'),
            'class' => 'process-icon-new',
        );
        if($leval0->is_mega)
        {
            $helper->toolbar_btn['new_product'] =  array(
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addmenu'.$this->name.'&id_parent='.$id_parent.'&ct=2&token='.Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->getTranslator()->trans('Add product block', array(), 'Modules.Stmegamenu.Admin'),
                'class' => 'process-icon-new',
            );
            $helper->toolbar_btn['new_brand'] =  array(
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addmenu'.$this->name.'&id_parent='.$id_parent.'&ct=3&token='.Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->getTranslator()->trans('Add brand block', array(), 'Modules.Stmegamenu.Admin'),
                'class' => 'process-icon-new',
            );
        }
        $helper->toolbar_btn['new_custom_link'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addmenu'.$this->name.'&id_parent='.$id_parent.'&ct=4&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Add custom link', array(), 'Modules.Stmegamenu.Admin'),
            'class' => 'process-icon-new',
        );
        $helper->toolbar_btn['new_custom_content'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addmenu'.$this->name.'&id_parent='.$id_parent.'&ct=5&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Add custom content', array(), 'Modules.Stmegamenu.Admin'),
            'class' => 'process-icon-new',
        );
		$helper->toolbar_btn['back'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&id_st_mega_menu='.$column->id_st_mega_menu.'&view'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Back', array(), 'Modules.Stmegamenu.Admin')
		);
        $helper->tpl_vars['navigate'] = array(
            '<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'">'.$this->getTranslator()->trans("Home", array(), 'Admin.Theme.Transformer').'</a>',
            '<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&id_st_mega_menu='.$leval0->id.'&view'.$this->name.'">'.self::displayTitle($leval0->title, get_object_vars($leval0)).'</a>',
            ($column->title ? $column->title : $this->getTranslator()->trans('Column', array(), 'Modules.Stmegamenu.Admin'))
        );

        $helper->title = $this->getTranslator()->trans('Blocks', array(), 'Modules.Stmegamenu.Admin');
		$helper->table = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
    }

    public function hookDisplayHeader()
    {
        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $custom_css = '';
            $data = StMegaMenuClass::getCustomCss();
            if(is_array($data) && count($data))
                foreach($data as $v)
                {
                    if($v['txt_color'])
                    {
                        $custom_css .= '#st_mega_menu_wrap #st_ma_'.$v['id_st_mega_menu'].',#st_mega_menu_column_block #st_ma_'.$v['id_st_mega_menu'].',#st_mega_menu_wrap #st_menu_block_'.$v['id_st_mega_menu'].',#st_mega_menu_wrap #st_menu_block_'.$v['id_st_mega_menu'].' a,#st_mega_menu_column_block #st_menu_block_'.$v['id_st_mega_menu'].',#st_mega_menu_column_block #st_menu_block_'.$v['id_st_mega_menu'].' a{color:'.$v['txt_color'].';}';
                        $v['item_t']==1 && $custom_css .= '#st_mega_menu_wrap #st_menu_block_'.$v['id_st_mega_menu'].' .ma_level_1,#st_mega_menu_column_block #st_menu_block_'.$v['id_st_mega_menu'].' .ma_level_1{color:'.$v['txt_color'].';}';
                    }
                    if($v['link_color'])
                        $custom_css .= '#st_mega_menu_wrap #st_menu_block_'.$v['id_st_mega_menu'].' a,#st_mega_menu_column_block #st_menu_block_'.$v['id_st_mega_menu'].' a{color:'.$v['link_color'].';}';
                    if($v['txt_color_over'])
                    {
                        $custom_css .= '#st_mega_menu_wrap #st_ma_'.$v['id_st_mega_menu'].':hover, #st_mega_menu_wrap #st_menu_'.$v['id_st_mega_menu'].'.current .ma_level_0,#st_mega_menu_column_block #st_ma_'.$v['id_st_mega_menu'].':hover, #st_mega_menu_column_block #st_menu_'.$v['id_st_mega_menu'].'.current .ma_level_0,#st_mega_menu_wrap #st_menu_block_'.$v['id_st_mega_menu'].' a:hover,#st_mega_menu_column_block #st_menu_block_'.$v['id_st_mega_menu'].' a:hover{color:'.$v['txt_color_over'].';}';
                        $v['item_t']==1 && $custom_css .= '#st_mega_menu_wrap #st_menu_block_'.$v['id_st_mega_menu'].' .ma_level_1:hover,#st_mega_menu_column_block #st_menu_block_'.$v['id_st_mega_menu'].' .ma_level_1:hover{color:'.$v['txt_color_over'].';}';
                    }    

                    if($v['bg_color'])
                        $custom_css .= '#st_mega_menu_wrap #st_ma_'.$v['id_st_mega_menu'].',#st_mega_menu_column_block #st_ma_'.$v['id_st_mega_menu'].'{background-color:'.$v['bg_color'].';}';
                    if($v['bg_color_over'])
                        $custom_css .= '#st_mega_menu_wrap #st_ma_'.$v['id_st_mega_menu'].':hover, #st_mega_menu_wrap #st_menu_'.$v['id_st_mega_menu'].'.current .ma_level_0,#st_mega_menu_column_block #st_ma_'.$v['id_st_mega_menu'].':hover, #st_mega_menu_column_block #st_menu_'.$v['id_st_mega_menu'].'.current .ma_level_0{background-color:'.$v['bg_color_over'].';}';
                    if($v['tab_content_bg'])
                        $custom_css .= '#st_mega_menu_wrap #st_menu_'.$v['id_st_mega_menu'].' .stmenu_sub, #st_mega_menu_wrap #st_menu_'.$v['id_st_mega_menu'].' .stmenu_multi_level ul, #st_mega_menu_wrap #st_menu_'.$v['id_st_mega_menu'].' .mu_level_2 ul,#st_mega_menu_column_block #st_menu_'.$v['id_st_mega_menu'].' .stmenu_sub, #st_mega_menu_column_block #st_menu_'.$v['id_st_mega_menu'].' .stmenu_multi_level ul, #st_mega_menu_column_block #st_menu_'.$v['id_st_mega_menu'].' .mu_level_2 ul,#st_mega_menu_wrap #st_menu_'.$v['id_st_mega_menu'].' .stmenu_vs{background-color:'.$v['tab_content_bg'].';}';
                    if($v['bg_image'])
                    {
                        $bg_img = _THEME_PROD_PIC_DIR_.$this->name.'/'.$v['bg_image'];
                        $bg_img = context::getContext()->link->protocol_content.Tools::getMediaServer($bg_img).$bg_img;
                        $custom_css .= '#st_menu_'.$v['id_st_mega_menu'].' .stmenu_sub,#st_menu_'.$v['id_st_mega_menu'].' .stmenu_vs{background-image:url('.$bg_img.');';
                        switch($v['bg_repeat']) {
                            case 1 :
                                $repeat_option = 'repeat-x';
                                break;
                            case 2 :
                                $repeat_option = 'repeat-y';
                                break;
                            case 3 :
                                $repeat_option = 'no-repeat';
                                break;
                            default :
                                $repeat_option = 'repeat';
                        }
                        $custom_css .= 'background-repeat:'.$repeat_option.';';
                        switch($v['bg_position']) {
                            case 1 :
                                $position_option = 'left top';
                                break;
                            case 2 :
                                $position_option = 'left center';
                                break;
                            case 3 :
                                $position_option = 'left bottom';
                                break;
                            case 4 :
                                $position_option = 'right top';
                                break;
                            case 5 :
                                $position_option = 'right center';
                                break;
                            case 6 :
                                $position_option = 'center top';
                                break;
                            case 7 :
                                $position_option = 'center center';
                                break;
                            case 8 :
                                $position_option = 'center bottom';
                                break;
                            default :
                                $position_option = 'right bottom';
                        }
                        $custom_css .= 'background-position: '.$position_option.';}';
                    }
                    if($v['bg_margin_bottom'])
                        $custom_css .= '#st_mega_menu_wrap #st_menu_'.$v['id_st_mega_menu'].' .stmenu_sub,#st_mega_menu_wrap #st_menu_'.$v['id_st_mega_menu'].' .stmenu_vs{padding-bottom:'.($v['bg_margin_bottom']+20).'px;}';

                    if($v['cate_label_color'])
                        $custom_css .= '#st_ma_'.$v['id_st_mega_menu'].' .cate_label,#st_mo_ma_'.$v['id_st_mega_menu'].' .cate_label{color:'.$v['cate_label_color'].';}';
                    if($v['cate_label_bg'])
                        $custom_css .= '#st_ma_'.$v['id_st_mega_menu'].' .cate_label,#st_mo_ma_'.$v['id_st_mega_menu'].' .cate_label{background-color:'.$v['cate_label_bg'].';}';   
                }
            $this->smarty->assign('megamenu_custom_css', $custom_css);
        }
		return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
    }

    public static function getTWidth($column)
    {
        $t_width = $temp = 0;

        foreach ($column as $key => $value) {
            if($temp+$value['width']<=12)
                $temp += $value['width'];
            else
                $temp = $value['width'];

            if($temp>$t_width)
                $t_width = $temp;
        }
        return $t_width;
    }
    public function _prepareHook()
    {
        $all = StMegaMenuClass::recurseTree(0,1,0,1,$this->context->language->id,0);
        
        if(is_array($all) && count($all))
        {
            foreach($all as &$v)
            {
                $columns = StMegaColumnClass::getAll($v['id_st_mega_menu'], 1);
                if($v['is_mega'])
                    $v['t_width'] = self::getTWidth($columns);

                if(!$this->getLink($v))
                    continue;

                foreach ($columns as $col) 
                {
                    $jon = StMegaMenuClass::getByColumnId($col['id_st_mega_column'], $this->context->language->id, 1, 0, 0);

                    foreach ($jon  as $k)
                    {
                        switch ($k['item_t']) {
                            case '1':
                                if($k['subtype']==2)
                                {
                                    //products
                                    $category = new Category($k['item_v'], $this->context->language->id);

                                    $sub_categories = $category->recurseLiteCategTree(1,0);
                                    if ($k['title'])
                                        $sub_categories['name'] = $k['title'];
                                    $sub_categories['id_image'] = file_exists(_PS_CAT_IMG_DIR_.$sub_categories['id'].'.jpg') ? (int)$sub_categories['id'] : Language::getIsoById(Context::getContext()->language->id).'-default';
                                    $sub_categories['link_rewrite'] = Category::getLinkRewrite($sub_categories['id'], $this->context->language->id);
                                    $sub_categories['children'] = $category->getProducts($this->context->language->id, 0, $k['item_limit']);
                                    $k['children'] = $sub_categories;
                                }
                                else
                                {
                                    //categories
                                    $category = new Category($k['item_v'], $this->context->language->id);
                                    $sub_categories = $category->recurseLiteCategTree($k['sub_levels'],0);
                                    if ($k['title'])
                                        $sub_categories['name'] = $k['title'];
                                    $this->handle_sub_categories($sub_categories, $k['item_limit'], $k['sub_limit']);
                                    $k['children'] = $sub_categories;
                                }
                                break;
                            case '2':
                                $menuProducts = StMegaProductClass::getMenuProducts($this->context->language->id, $k['id_st_mega_menu']);
                                $listProducts = array();
                                if ($menuProducts)
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
                                    $products_for_template = array();
                                    if (is_array($menuProducts)) {
                                        foreach ($menuProducts as $product) {
                                            if (!(int)$product['id_product']) {
                                                continue;
                                            }
                                            $prod = new Product((int)$product['id_product']);
                                            if (!$prod->id) {
                                                continue;
                                            }
                                            $product['id_product_attribute'] = Product::getDefaultAttribute($product['id_product']);
                                            $products_for_template[] = $presenter->present(
                                                $presentationSettings,
                                                $assembler->assembleProduct($product),
                                                $this->context->language
                                            );
                                        }
                                    }
                                    $k['children'] = $products_for_template;
                                }
                                break;
                            case '3':
                                if ($k['item_k'] == 1)
                                {
                                    $menuBrands = Manufacturer::getManufacturers();
                                    if($menuBrands)
                                    {
                                        foreach ($menuBrands as $b_k => $b_v)
                                        {
                                            $menuBrands[$b_k]['url'] = Context::getContext()->link->getManufacturerLink($b_v['id_manufacturer']);
                                            $menuBrands[$b_k]['image'] = Context::getContext()->link->getManufacturerImageLink($b_v['id_manufacturer']);
                                        }
                                    }
                                }
                                else
                                    $menuBrands = StMegaBrandClass::getMenuBrands($this->context->language->id, $k['id_st_mega_menu']);
                                $k['children'] = $menuBrands;
                                break;
                            case '4':
                                $cs_children = array();
                                $li = StMegaMenuClass::recurseTree($k['id_st_mega_menu'],0,0,1,$this->context->language->id, 4);
                                if(is_array($li) && count($li))
                                {
                                    $this->getCustomLinkContent($li);
                                    $cs_children = array_merge($cs_children, $li);
                                }
                                $li = StMegaMenuClass::recurseTree($k['id_st_mega_menu'],1,0,1,$this->context->language->id, 5);
                                if(is_array($li) && count($li))
                                {
                                     $cs_children = array_merge($cs_children, $li);
                                }
                                if(count($cs_children))
                                    $k['children'] = $cs_children;
                                $k = $this->recurseLink($k);
                                break;
                            case '5':
                            default:
                                break;
                        }
                        if($k)
                            $col['children'][] = $k;
                    }
                    $v['column'][] = $col;
                }
            }
        }
        return $all;
    }
    public function handle_sub_categories(&$sub_categories, $item_limit=0, $sub_limit=0)
    {
        $sub_categories['id_image'] = file_exists(_PS_CAT_IMG_DIR_.$sub_categories['id'].'.jpg') ? (int)$sub_categories['id'] : Language::getIsoById(Context::getContext()->language->id).'-default';
        $sub_categories['link_rewrite'] = Category::getLinkRewrite($sub_categories['id'], $this->context->language->id);

        if(is_array($sub_categories['children']) && count($sub_categories['children']))
            foreach ($sub_categories['children'] as $k => &$sub_cate) {
                if($item_limit && $k>=$item_limit)
                    unset($sub_categories['children'][$k]);
                else
                    $this->handle_sub_categories($sub_cate, $sub_limit, $sub_limit);
            }
    }
    public function hookDisplayMainMenu($param,$header_bottom = false)
    {
        if (!$this->isCached('stmegamenu.tpl', $this->stGetCacheId('stmegamenu')))
        {
            if (!isset(StMegaMenu::$cache_stmegamenu))
                StMegaMenu::$cache_stmegamenu = $this->_prepareHook();

            if (StMegaMenu::$cache_stmegamenu === false)
                StMegaMenu::$cache_stmegamenu = array();

            $menu = $vertical = array();

            foreach (StMegaMenu::$cache_stmegamenu as $v) {
                if(!$v['location'])
                    $menu[] =$v;
                elseif ($v['location']==2) {
                    $vertical[] =$v;
                }
            }

            $this->smarty->assign(array(
                'stmenu' => $menu,
                'stvertical' => $vertical,
                'new_sticker' => Configuration::get('STSN_NEW_STYLE'),
                'sale_sticker' => Configuration::get('STSN_SALE_STYLE'),
                'menu_title' => Configuration::get('STSN_MENU_TITLE'),
                'manufacturerSize' => Image::getSize(ImageType::getFormattedName('brand')),
                'homeSize' => Image::getSize(ImageType::getFormattedName('home')),
                'mediumSize'=>Image::getSize(ImageType::getFormattedName('medium')),
                'categorySize'=>Image::getSize(ImageType::getFormattedName('category')),
                'header_bottom' => $header_bottom,
            ));
        }
        return $this->display(__FILE__, 'stmegamenu.tpl', $this->stGetCacheId('stmegamenu'));
    }
    public function hookDisplayLeftColumn($param)
    {
        $this->setLastVisitedCategory();
        if (!$this->isCached('stmegamenu-column.tpl', $this->stGetCacheId('column')))
        {
            if (!isset(StMegaMenu::$cache_stmegamenu))
                StMegaMenu::$cache_stmegamenu = $this->_prepareHook();

            if (StMegaMenu::$cache_stmegamenu === false)
                StMegaMenu::$cache_stmegamenu = array();

            $menu = array();
            foreach (StMegaMenu::$cache_stmegamenu as $v) {
                if($v['location']==1)
                    $menu[] =$v;
            }

            $this->smarty->assign(array(
                'stmenu' => $menu,
                'new_sticker' => Configuration::get('STSN_NEW_STYLE'),
                'sale_sticker' => Configuration::get('STSN_SALE_STYLE'),
                'menu_title' => Configuration::get('STSN_MENU_TITLE'),
                'manufacturerSize' => Image::getSize(ImageType::getFormattedName('brand')),
                'homeSize' => Image::getSize(ImageType::getFormattedName('home')),
                'mediumSize'=>Image::getSize(ImageType::getFormattedName('medium')),
                'categorySize'=>Image::getSize(ImageType::getFormattedName('category')),
            ));
        }
        return $this->display(__FILE__, 'stmegamenu-column.tpl', $this->stGetCacheId('column'));
    }
    public function hookDisplayRightColumn($param)
    {
        return $this->hookDisplayLeftColumn($param);
    }
    public function hookDisplayLeftColumnProduct($param)
    {
        return $this->hookDisplayLeftColumn($param);
    }
    public function hookdisplayRightColumnProduct($param)
    {
        return $this->hookDisplayLeftColumn($param);
    }
    public function setLastVisitedCategory()
    {
        $cache_id = 'stmegamenu::setLastVisitedCategory';
        if (!Cache::isStored($cache_id))
        {
            if (method_exists($this->context->controller, 'getCategory') && ($category = $this->context->controller->getCategory()))
                $this->context->cookie->last_visited_category = $category->id;
            elseif (method_exists($this->context->controller, 'getProduct') && ($product = $this->context->controller->getProduct()))
                if (!isset($this->context->cookie->last_visited_category)
                    || !Product::idIsOnCategoryId($product->id, array(array('id_category' => $this->context->cookie->last_visited_category)))
                    || !Category::inShopStatic($this->context->cookie->last_visited_category, $this->context->shop))
                        $this->context->cookie->last_visited_category = (int)$product->id_category_default;
            Cache::store($cache_id, $this->context->cookie->last_visited_category);
        }
        return Cache::retrieve($cache_id);
    }
    public function hookDisplayHeaderBottom($param)
    {
         return $this->hookDisplayMainMenu($param, true);
    }
    public function hookDisplayTop($param)
    {
         return $this->hookDisplayMainMenu($param, true);
    }
    public function hookDisplayHeaderCenter($param)
    {
         return $this->hookDisplayMainMenu($param, true);
    }
    public function hookDisplayHeaderLeft($param)
    {
         return $this->hookDisplayMainMenu($param, true);
    }
    public function hookDisplayRightBar($params)
    {
        return $this->display(__FILE__, 'stmobilerightbar.tpl');
    }
    public function hookDisplayLeftBar($params)
    {
        return $this->display(__FILE__, 'stmobilerightbar.tpl');
    }
    /*public function hookDisplayMobileBarLeft($params){
        return $this->display(__FILE__, 'stmobilebar.tpl');
    }
    public function hookDisplayMobileBar($params)
    {
        return $this->hookDisplayMobileBarLeft($params);
    }
    public function hookDisplayMobileBarCenter($params)
    {
        return $this->hookDisplayMobileBarLeft($params);
    }
    public function hookDisplayMobileBarBottom($params)
    {
        return $this->hookDisplayMobileBarLeft($params);
    }*/
    public function hookDisplaySideBar($param)
    {
        if (!$this->isCached('stmobilemenu.tpl', $this->getCacheId()))
        {
            if (!isset(StMegaMenu::$cache_stmegamenu))
                StMegaMenu::$cache_stmegamenu = $this->_prepareHook();

            if (StMegaMenu::$cache_stmegamenu === false)
                StMegaMenu::$cache_stmegamenu = array();
            
            $this->smarty->assign(array(
                'stmenu' => StMegaMenu::$cache_stmegamenu,
                'new_sticker' => Configuration::get('STSN_NEW_STYLE'),
                'sale_sticker' => Configuration::get('STSN_SALE_STYLE'),
                'menu_title' => Configuration::get('STSN_MENU_TITLE'),
                'manufacturerSize' => Image::getSize(ImageType::getFormattedName('brand')),
                'homeSize' => Image::getSize(ImageType::getFormattedName('home')),
                'mediumSize'=>Image::getSize(ImageType::getFormattedName('medium')),
                'categorySize'=>Image::getSize(ImageType::getFormattedName('category')),
            ));
        }
        return $this->display(__FILE__, 'stmobilemenu.tpl', $this->getCacheId());
    }
    public function hookDisplayMobileNav($param)
    {
        if (!$this->isCached('stmobilemenu-ul.tpl', $this->getCacheId()))
        {
            if (!isset(StMegaMenu::$cache_stmegamenu))
                StMegaMenu::$cache_stmegamenu = $this->_prepareHook();

            if (StMegaMenu::$cache_stmegamenu === false)
                StMegaMenu::$cache_stmegamenu = array();
            
            $this->smarty->assign(array(
                'stmenu' => StMegaMenu::$cache_stmegamenu,
                'new_sticker' => Configuration::get('STSN_NEW_STYLE'),
                'sale_sticker' => Configuration::get('STSN_SALE_STYLE'),
                'menu_title' => Configuration::get('STSN_MENU_TITLE'),
                'manufacturerSize' => Image::getSize(ImageType::getFormattedName('brand')),
                'homeSize' => Image::getSize(ImageType::getFormattedName('home')),
                'mediumSize'=>Image::getSize(ImageType::getFormattedName('medium')),
                'categorySize'=>Image::getSize(ImageType::getFormattedName('category')),
            ));
        }
        return $this->display(__FILE__, 'stmobilemenu-ul.tpl', $this->getCacheId());
    }
    
    public function recurseLink($row)
    {
        if(!$this->getLink($row))
            return false;
        if(isset($row['children']) && is_array($row['children']) && count($row['children'])) 
            foreach($row['children'] as &$v)
            {
                $temp_v = $this->recurseLink($v);
                if(!$temp_v)
                    continue;
                $v = $temp_v;
            }
        return $row;
    }
    public function getLink(&$row)
	{
	    $context = Context::getContext();
	    $user_groups =  ($context->customer->isLogged() ? $context->customer->getGroups() : array(Configuration::get('PS_UNIDENTIFIED_GROUP'))); 
        $id_lang = (int)$context->language->id;
		$id_shop = (int)Shop::getContextShopID();
        $link=$name=$icon=$title='';
        switch($row['item_k'])
        {
            case 0:
                $link = $row['link'];
                $name = $row['title'];
            break;
            case 1:           
                $category = new Category((int)$row['item_v'],$id_lang);
                if(Validate::isLoadedObject($category))
                {
                    $is_intersected = array_intersect($category->getGroups(), $user_groups);
                    if(!empty($is_intersected))
                    {
                        if ($category->level_depth > 1)
                			$link = $category->getLink();
                		else
                			$link = Context::getContext()->link->getPageLink('index');
                        $name = $category->name;
                    }
                }
            break;
            case 2:
                $product = new Product((int)$row['item_v'], true, (int)$id_lang);
                if (Validate::isLoadedObject($product))
                {
                    $link = $product->getLink();
                    $name = $product->name;
                }
            break;
            case 3:
                $cms = CMS::getLinks((int)$id_lang, array((int)$row['item_v']));
				if (count($cms))
                {
                    $link = $cms[0]['link'];
                    $name = $cms[0]['meta_title'];
                }
            break;
            case 4:
                $manufacturer = new Manufacturer((int)$row['item_v'], (int)$id_lang);
				if (Validate::isLoadedObject($manufacturer))
                {
                    if (intval(Configuration::get('PS_REWRITING_SETTINGS')))
						$manufacturer->link_rewrite = Tools::link_rewrite($manufacturer->name);
					else
						$manufacturer->link_rewrite = 0;
					$theLink = new Link;
                    $link = $theLink->getManufacturerLink((int)$manufacturer->id, $manufacturer->link_rewrite);
					$name = $manufacturer->name;
                }
            break;
            case 5:
                $supplier = new Supplier((int)$row['item_v'], (int)$id_lang);
				if (Validate::isLoadedObject($supplier))
                {
                    $theLink = new Link;
					$link = $theLink->getSupplierLink((int)$supplier->id, $supplier->link_rewrite);
                    $name = $supplier->name;
                }
            break;
			case 6:
				$category = new CMSCategory((int)$row['item_v'], (int)$id_lang);
				if (Validate::isLoadedObject($category))
                {
                    $link = $category->getLink();
                    $name = $category->name;
                }
			break;
			case 7:
                if(Configuration::get('PS_SSL_ENABLED') && Configuration::get('PS_SSL_ENABLED_EVERYWHERE'))
                {
                    $protocol_link = (Configuration::get('PS_SSL_ENABLED') || Tools::usingSecureMode()) ? 'https://' : 'http://';
                    $link = $protocol_link.Tools::getShopDomainSsl().__PS_BASE_URI__;
                }
                else
                    $link = _PS_BASE_URL_.__PS_BASE_URI__;
                $name = '';
                $icon = '<i class="fto-home"></i>';
			break;
			case 8:
	            if(Module::isInstalled('stblog') && Module::isEnabled('stblog'))
				{
				    $category = new StBlogCategory((int)$row['item_v'],$id_lang);
                    if(Validate::isLoadedObject($category))
                    {
                        if ($category->is_root_category)
             			{
             			    $link = Context::getContext()->link->getModuleLink('stblog','default');
                            $module = new StMegaMenu();
         			        $name = $module->getTranslator()->trans('Blog', array(), 'Admin.Theme.Transformer');
             			}
                		else
                        {
                            $link = Context::getContext()->link->getModuleLink('stblog','category',array('id_st_blog_category'=>$category->id,'rewrite'=>$category->link_rewrite));
                            $name = $category->name;
                		}
                    }
				}
			break;
			case 9:
                if(Module::isInstalled('stblog') && Module::isEnabled('stblog'))
				{
                    $rs = StBlogClass::getBlogInfo((int)$row['item_v'],'bl.`name`, bl.`link_rewrite`');
                    $link = Context::getContext()->link->getModuleLink('stblog','article',array('id_st_blog'=>(int)$row['item_v'],'rewrite'=>$rs['link_rewrite']));
                    $name = $rs['name'];
				}
			break;
            case 10:
		        $theLink = new Link;
                
                $catalog_mod = (bool)Configuration::get('PS_CATALOG_MODE') || !(bool)Group::getCurrent()->show_prices;
                
    			$voucherAllowed = CartRule::isFeatureActive();
    			$returnAllowed = (int)(Configuration::get('PS_ORDER_RETURN'));
                
                $module = new StMegaMenu(); 
                $information = $module->getInformationLinks();
                $myAccount = $module->getMyAccountLinks();  
                
                if($row['item_v'] == 'prices-drop' && !$catalog_mod)
                    $link = $theLink->getPageLink($row['item_v']); 
                if($row['item_v'] == 'new-products')
                    $link = $theLink->getPageLink($row['item_v']);
                if($row['item_v'] == 'best-sales' && !$catalog_mod)
                    $link = $theLink->getPageLink($row['item_v']);
                if($row['item_v'] == 'stores')
                    $link = $theLink->getPageLink($row['item_v']);
                if($row['item_v'] == 'contact')
                    $link = $theLink->getPageLink($row['item_v'], true);
                if($row['item_v'] == 'sitemap')
                    $link = $theLink->getPageLink($row['item_v']);
                if($row['item_v'] == 'manufacturer')
                    $link = $theLink->getPageLink($row['item_v']);
                if($row['item_v'] == 'supplier')
                    $link = $theLink->getPageLink($row['item_v']);
                    
                if($row['item_v'] == 'my-account')
                    $link = $theLink->getPageLink($row['item_v'], true);
                if($row['item_v'] == 'history')
                    $link = $theLink->getPageLink($row['item_v'], true);
                if($row['item_v'] == 'order-follow' && $returnAllowed)
                    $link = $theLink->getPageLink($row['item_v'], true);
                if($row['item_v'] == 'order-slip')
                    $link = $theLink->getPageLink($row['item_v'], true);
                if($row['item_v'] == 'addresses')
                    $link = $theLink->getPageLink($row['item_v'], true);
                if($row['item_v'] == 'identity')
                    $link = $theLink->getPageLink($row['item_v'], true);
                if($row['item_v'] == 'discount' && $voucherAllowed)
                    $link = $theLink->getPageLink($row['item_v'], true);
                
                if($link)
                {
                    if(array_key_exists($row['item_v'],$information))
                    {
                        $name = $information[$row['item_v']]['name'];
                        $title = $information[$row['item_v']]['title'];
                    }
                    if(array_key_exists($row['item_v'],$myAccount))
                    {
                        $name = $myAccount[$row['item_v']]['name'];
                        $title = $myAccount[$row['item_v']]['title'];
                    }
                }
            break;
        }
        if(!$name && !$icon)
            return false;

        $row['m_link'] = $link;
        $row['m_name'] = $row['title'] ? $row['title'] : $name;
        $row['m_icon'] = $icon;
        $row['m_title'] = $title ? $title : $name;
        return true;
	}
    
	public function hookActionCategoryAdd($params)
	{
		$this->clearStMegamenuCache();
	}
	public function hookActionCategoryDelete($params)
	{
		$this->clearStMegamenuCache();
	}
	public function hookActionCategoryUpdate($params)
	{
		$this->clearStMegamenuCache();
	}
	public function hookActionObjectProductDelete($params)
	{
		$this->clearStMegamenuCache();
	}
	public function hookActionProductAdd($params)
	{
		$this->clearStMegamenuCache();
	}
	public function hookActionProductUpdate($params)
	{
		$this->clearStMegamenuCache();
	}
	public function hookActionObjectCategoryUpdateAfter($params)
	{
		$this->clearStMegamenuCache();
	}
	
	public function hookActionObjectCategoryDeleteAfter($params)
	{
		$this->clearStMegamenuCache();
	}
	
	public function hookActionObjectCmsUpdateAfter($params)
	{
		$this->clearStMegamenuCache();
	}
	
	public function hookActionObjectCmsDeleteAfter($params)
	{
		$this->clearStMegamenuCache();
	}
	
	public function hookActionObjectSupplierUpdateAfter($params)
	{
		$this->clearStMegamenuCache();
	}
	
	public function hookActionObjectSupplierDeleteAfter($params)
	{
		$this->clearStMegamenuCache();
	}	

	public function hookActionObjectManufacturerUpdateAfter($params)
	{
		$this->clearStMegamenuCache();
	}
	
	public function hookActionObjectManufacturerDeleteAfter($params)
	{
		$this->clearStMegamenuCache();
	}
	
	public function hookActionObjectProductUpdateAfter($params)
	{
		$this->hookActionObjectProductDeleteAfter($params);
	}
	
	public function hookActionObjectProductDeleteAfter($params)
	{
	    $rs = Db::getInstance()->getValue('SELECT COUNT(0) FROM '._DB_PREFIX_.'st_menu_product 
            WHERE id_st_mega_menu = (SELECT id_st_mega_menu FROM '._DB_PREFIX_.'st_menu_product 
            WHERE id_product='.(int)$params['object']->id.') AND id_product != '.(int)$params['object']->id);
        if (!$rs)
        {
           $rs = Db::getInstance()->executeS('SELECT id_st_mega_menu 
           FROM '._DB_PREFIX_.'st_menu_product
           WHERE id_product = '.(int)$params['object']->id);
           foreach($rs AS $value)
            {
                $menu = new StMegaMenuClass($value['id_st_mega_menu']);
                $menu->delete();
            }
        } 
        
	    StMegaProductClass::deleteByIdProduct($params['object']->id);
		$this->clearStMegamenuCache();
	}
	
	public function hookCategoryUpdate($params)
	{
		$this->clearStMegamenuCache();
	}
    
	public function hookActionShopDataDuplication($params)
	{
		return $this->sampleData($params['new_id_shop']);
    }
    
    private function clearStMegamenuCache()
    {
		$this->_clearCache('*');
    }

	/**
	 * Return the list of fields value
	 *
	 * @param object $obj Object
	 * @return array
	 */
	public function getFieldsValueSt($obj,$fields_form="fields_form")
	{
		foreach ($this->$fields_form as $fieldset)
			if (isset($fieldset['form']['input']))
				foreach ($fieldset['form']['input'] as $input)
					if (!isset($this->fields_value[$input['name']]))
						if (isset($input['type']) && $input['type'] == 'shop')
						{
							if ($obj->id)
							{
								$result = Shop::getShopById((int)$obj->id, $this->identifier, $this->table);
								foreach ($result as $row)
									$this->fields_value['shop'][$row['id_'.$input['type']]][] = $row['id_shop'];
							}
						}
						elseif (isset($input['lang']) && $input['lang'])
							foreach (Language::getLanguages(false) as $language)
							{
								$fieldValue = $this->getFieldValueSt($obj, $input['name'], $language['id_lang']);
								if (empty($fieldValue))
								{
									if (isset($input['default_value']) && is_array($input['default_value']) && isset($input['default_value'][$language['id_lang']]))
										$fieldValue = $input['default_value'][$language['id_lang']];
									elseif (isset($input['default_value']))
										$fieldValue = $input['default_value'];
								}
								$this->fields_value[$input['name']][$language['id_lang']] = $fieldValue;
							}
						else
						{
							$fieldValue = $this->getFieldValueSt($obj, $input['name']);
							if ($fieldValue===false && isset($input['default_value']))
								$fieldValue = $input['default_value'];
							$this->fields_value[$input['name']] = $fieldValue;
						}

		return $this->fields_value;
	}
    
	/**
	 * Return field value if possible (both classical and multilingual fields)
	 *
	 * Case 1 : Return value if present in $_POST / $_GET
	 * Case 2 : Return object value
	 *
	 * @param object $obj Object
	 * @param string $key Field name
	 * @param integer $id_lang Language id (optional)
	 * @return string
	 */
	public function getFieldValueSt($obj, $key, $id_lang = null)
	{
		if ($id_lang)
			$default_value = ($obj->id && isset($obj->{$key}[$id_lang])) ? $obj->{$key}[$id_lang] : false;
		else
			$default_value = isset($obj->{$key}) ? $obj->{$key} : false;

		return Tools::getValue($key.($id_lang ? '_'.$id_lang : ''), $default_value);
	}
    
    public function BuildRadioUI($array, $name, $checked_value = 0)
    {
        $html = '';
        foreach($array AS $key => $value)
        {
            $html .= '<label><input type="radio"'.($checked_value==$value['value'] ? ' checked="checked"' : '').' value="'.$value['value'].'" id="'.(isset($value['id']) ? $value['id'] : $name.'_'.$value['value']).'" name="'.$name.'">'.(isset($value['label'])?$value['label']:'').'</label>';
            if (($key+1) % 8 == 0)
                $html .= '<br />';
        }
        return $html;
    }

    public function get_fontello()
    {
        $res= array(
            'css' => '',
            'theme_name' => '',
            'module_name' => $this->_path,
            'classes' => array(),
        );

        $theme_path = _PS_THEME_DIR_;

        $theme_name = Context::getContext()->shop->theme->getName();
        $res['theme_name'] = $theme_name;

        if (_THEME_NAME_ != $theme_name)
            $theme_path = _PS_ROOT_DIR_.'/themes/'.$theme_name.'/';

        if (file_exists($theme_path.'font-fontello/config.json'))
        {
            $icons = Tools::jsonDecode(Tools::file_get_contents($theme_path.'font-fontello/config.json'));
            if($icons && is_array($icons->glyphs))
                foreach ($icons->glyphs as $icon) {
                    $res['classes'][] = 'fto-'.$icon->css;
                }
        }
        if (file_exists($theme_path.'font-fontello/icons.scss'))
        {
            $icons_css = Tools::file_get_contents($theme_path.'font-fontello/icons.scss');
            $res['css'] .= $icons_css;
        }

        return $res;
    }
    
    protected function stUploadImage($item)
    {
        $result = array(
            'error' => array(),
            'image' => '',
            'thumb' => '',
        );
        if (isset($_FILES[$item]) && isset($_FILES[$item]['tmp_name']) && !empty($_FILES[$item]['tmp_name']))
		{
			$type = strtolower(substr(strrchr($_FILES[$item]['name'], '.'), 1));
			$imagesize = array();
			$imagesize = @getimagesize($_FILES[$item]['tmp_name']);
			if (!empty($imagesize) &&
				in_array(strtolower(substr(strrchr($imagesize['mime'], '/'), 1)), array('jpg', 'gif', 'jpeg', 'png')) &&
				in_array($type, array('jpg', 'gif', 'jpeg', 'png')))
			{
                $this->_checkEnv();
				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
				$salt = sha1(microtime());
                $c_name = Tools::encrypt($_FILES[$item]['name'].$salt);
                $c_name_thumb = 'thumb'.$c_name;
				if ($upload_error = ImageManager::validateUpload($_FILES[$item]))
					$result['error'][] = $upload_error;
				elseif (!$temp_name || !move_uploaded_file($_FILES[$item]['tmp_name'], $temp_name))
					$result['error'][] = $this->displayError($this->getTranslator()->trans('An error occurred during the image upload.', array(), 'Admin.Theme.Transformer'));
				else{
				   $infos = getimagesize($temp_name);
                   $ratio_y = 72;
    			   $ratio_x = $infos[0] / ($infos[1] / $ratio_y);
                   if(!ImageManager::resize($temp_name, _PS_UPLOAD_DIR_.$this->name.'/'.$c_name.'.'.$type, null, null, $type) || !ImageManager::resize($temp_name, _PS_UPLOAD_DIR_.$this->name.'/'.$c_name_thumb.'.'.$type, $ratio_x, $ratio_y, $type))
				       $result['error'][] = $this->displayError($this->getTranslator()->trans('An error occurred during the image upload.', array(), 'Admin.Theme.Transformer'));
				} 
				if (isset($temp_name))
					@unlink($temp_name);
                    
                if(!count($result['error']))
                {
                    $result['image'] = $c_name.'.'.$type;
                }
                return $result;
			}
        }
        else
            return $result;
    }
    
    private function _checkEnv()
    {
        $file = _PS_UPLOAD_DIR_.'.htaccess';
        $file_tpl = _PS_MODULE_DIR_.'stthemeeditor/config/upload_htaccess.tpl';
        if (!file_exists($file) || !file_exists($file_tpl))
            return true;
        if (!is_writeable($file) || !is_readable($file_tpl))
            return false;
        
        return @file_put_contents($file, @file_get_contents($file_tpl));
    }
    
    public function processCopyMegaMenu($id_st_mega_menu = 0)
    {
        if (!$id_st_mega_menu)
            return false;
            
        $root = new StMegaMenuClass($id_st_mega_menu);
        
        $id_shop = (int)Context::getContext()->shop->id;
        
        // Copy main menu
        $root2 = clone $root;
        $root2->id = 0;
        $root2->id_st_mega_menu = 0;
        $root2->id_shop = $id_shop;
        $ret = $root2->add();
        
        // Copy menu column
        foreach(Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'st_mega_column WHERE id_st_mega_menu='.(int)$id_st_mega_menu) AS $row)
        {
            $column = new StMegaColumnClass((int)$row['id_st_mega_column']);
            $column->id_st_mega_menu = (int)$root2->id;
            $column->id=0;
            $column->id_st_mega_column = 0;
            $ret &= $column->add();
            
            $ret &= $this->processCopySubMenus($row['id_st_mega_column'], $column->id, $id_shop);
        }
        return $ret;
    }
    
    public function processCopySubMenus($id_menu_column_old = 0, $id_menu_column_new = 0, $id_shop = 0, $id_parent_old = 0, $id_parent_new=0)
    {
        if (!$id_menu_column_old || !$id_menu_column_new)
        {
            $this->_html .= $this->displayError($this->getTranslator()->trans('Id menu column error:', array(), 'Modules.Stmegamenu.Admin'));
            return false;   
        }        
    
        $ret = true;
        $old = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'st_mega_menu WHERE id_st_mega_column='.(int)$id_menu_column_old.' AND id_parent='.$id_parent_old.' ORDER BY id_parent ASC');
        foreach($old AS $row)
        {
            $menu = new StMegaMenuClass($row['id_st_mega_menu']);
                
            $menu->id_shop = $id_shop;
            $menu->id = 0;
            $menu->id_st_mega_menu = 0;
            $menu->id_st_mega_column = $id_menu_column_new;
            $menu->id_parent = $id_parent_new;
            $ret &= $menu->add();
            
            $ret &= $this->processCopyBrands($row['id_st_mega_menu'], $menu->id);
            $ret &= $this->processCopyProducts($row['id_st_mega_menu'], $menu->id);
            $child = Db::getInstance()->getValue('SELECT COUNT(0) FROM '._DB_PREFIX_.'st_mega_menu WHERE id_parent='.(int)$row['id_st_mega_menu'].' AND id_st_mega_column='.(int)$id_menu_column_old);
            if ($child > 0)
                $ret &= $this->processCopySubMenus($id_menu_column_old, $id_menu_column_new, $id_shop, $row['id_st_mega_menu'], $menu->id);
        }
        return $ret;
    }
    
    public function processCopyBrands($id_menu_old = 0, $id_mene_new = 0)
    {
        $ret = true;
        $old = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'st_menu_brand WHERE id_st_mega_menu='.(int)$id_menu_old);
        foreach($old AS $row)
            $ret &= Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'st_menu_brand values('.(int)$id_mene_new.', '.(int)$row['id_manufacturer'].')');
        return $ret;
    }
    
    public function processCopyProducts($id_menu_old = 0, $id_mene_new = 0)
    {
        $ret = true;
        $old = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'st_menu_product WHERE id_st_mega_menu='.(int)$id_menu_old);
        foreach($old AS $row)
            $ret &= Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'st_menu_product values('.(int)$id_mene_new.', '.(int)$row['id_product'].')');
        return $ret;
    }

    public function renderWidget($hookName = null, array $configuration = [])
    {
        return;
    }
    
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return;
    }
    
    protected function stGetCacheId($key,$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key;
	}
}
