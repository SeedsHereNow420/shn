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
use PrestaShop\PrestaShop\Core\Product\ProductExtraContent;


require_once _PS_MODULE_DIR_.'ststickers/classes/StStickersClass.php';
require_once _PS_MODULE_DIR_.'ststickers/classes/StStickersMapClass.php';

class StStickers extends Module implements WidgetInterface
{
    private $templateFile;
    protected static $access_rights = 0775;

    public  $fields_list;
    public  $fields_value;
    public  $fields_form;
    public $googleFonts;
	private $_html = '';
    private static $type = array();
    private static $location = array();
    private static $position = array();
    private $spacer_size = '5';

	public function __construct()
	{
		$this->name          = 'ststickers';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap     = true;

		parent::__construct();
                      
		$this->displayName   = $this->getTranSlator()->trans('Stickers block', array(), 'Modules.Ststickers.Admin');
		$this->description   = $this->getTranSlator()->trans('Show sticker icon or label on product images.', array(), 'Modules.Ststickers.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->templateFile = 'module:ststickers/views/templates/hook/ststickers.tpl';

        self::$type = array(
            0 => array(
                'id' => 'type_0',
                'value' => 0,
                'label' => $this->getTranslator()->trans('Custom', array(), 'Modules.Ststickers.Admin'),
                'class' => '',
            ),
            1 => array(
                'id' => 'type_1',
                'value' => 1,
                'label' => $this->getTranslator()->trans('New(Native)', array(), 'Modules.Ststickers.Admin'),
                'class' => 'new',
            ),
            2 => array(
                'id' => 'type_2',
                'value' => 2,
                'label' => $this->getTranslator()->trans('On sale(Native)', array(), 'Modules.Ststickers.Admin'),
                'class' => 'on-sale',
            ),
            3 => array(
                'id' => 'type_3',
                'value' => 3,
                'label' => $this->getTranslator()->trans('Reduced price(Native)', array(), 'Modules.Ststickers.Admin'),
                'class' => 'discount',
            ),
            4 => array(
                'id' => 'type_4',
                'value' => 4,
                'label' => $this->getTranslator()->trans('Sold out(Native)', array(), 'Modules.Ststickers.Admin'),
                'class' => 'sold-out',
            ),
            7 => array(
                'id' => 'type_7',
                'value' => 7,
                'label' => $this->getTranslator()->trans('In stock(Native)', array(), 'Modules.Ststickers.Admin'),
                'class' => 'in-stock',
            ),
            5 => array(
                'id' => 'type_5',
                'value' => 5,
                'label' => $this->getTranslator()->trans('Online only(Native)', array(), 'Modules.Ststickers.Admin'),
                'class' => 'online-only',
            ),
            6 => array(
                'id' => 'type_6',
                'value' => 6,
                'label' => $this->getTranslator()->trans('Pack(Native)', array(), 'Modules.Ststickers.Admin'),
                'class' => 'pack',
            ),
        );
        self::$location = array(
            0 => array(
                'id' => 'location_0',
                'value' => 0,
                'label' => $this->getTranslator()->trans('All products', array(), 'Modules.Ststickers.Admin')
            ),
            1 => array(
                'id' => 'location_1',
                'value' => 1,
                'label' => $this->getTranslator()->trans('Specify some products', array(), 'Modules.Ststickers.Admin')
            ),
            2 => array(
                'id' => 'location_2',
                'value' => 2,
                'label' => $this->getTranslator()->trans('By category', array(), 'Modules.Ststickers.Admin')
            ),
            3 => array(
                'id' => 'location_3',
                'value' => 3,
                'label' => $this->getTranslator()->trans('By manufacturer', array(), 'Modules.Ststickers.Admin')
            ),
        );
        self::$position = array(
            10 => array(
                'id' => 10,
                'name' => $this->getTranslator()->trans('Under product image', array(), 'Modules.Ststickers.Admin'),
            ),
            11 => array(
                'id' => 11,
                'name' => $this->getTranslator()->trans('At the very bottom of product block', array(), 'Modules.Ststickers.Admin'),
            ),
            1 => array(
                'id' => 1,
                'name' => $this->getTranslator()->trans('Top left corner of product image', array(), 'Modules.Ststickers.Admin'),
            ),
            2 => array(
                'id' => 2,
                'name' => $this->getTranslator()->trans('Top center of product image', array(), 'Modules.Ststickers.Admin'),
            ),
            3 => array(
                'id' => 3,
                'name' => $this->getTranslator()->trans('Top right corner of product image', array(), 'Modules.Ststickers.Admin'),
            ),
            4 => array(
                'id' => 4,
                'name' => $this->getTranslator()->trans('Center left of product image', array(), 'Modules.Ststickers.Admin'),
            ),
            5 => array(
                'id' => 5,
                'name' => $this->getTranslator()->trans('Center center of product image', array(), 'Modules.Ststickers.Admin'),
            ),
            12 => array(
                'id' => 12,
                'name' => $this->getTranslator()->trans('Center center of product image(100% width)', array(), 'Modules.Ststickers.Admin'),
            ),
            6 => array(
                'id' => 6,
                'name' => $this->getTranslator()->trans('Center right of product image', array(), 'Modules.Ststickers.Admin'),
            ),
            7 => array(
                'id' => 7,
                'name' => $this->getTranslator()->trans('Bottom left corner of product image', array(), 'Modules.Ststickers.Admin'),
            ),
            8 => array(
                'id' => 8,
                'name' => $this->getTranslator()->trans('Bottom center of product image', array(), 'Modules.Ststickers.Admin')
            ),
            9 => array(
                'id' => 9,
                'name' => $this->getTranslator()->trans('Bottom right corner of product image', array(), 'Modules.Ststickers.Admin')
            ),
        );               
	}
    
	public function install()
	{
		$res = parent::install() &&
			$this->installDb() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('actionStAssemble') &&
            $this->registerHook('actionProductSearchAfter') &&
            $this->registerHook('displayProductExtraContent') &&
            $this->registerHook('displayAdminProductsExtra') &&
			$this->registerHook('actionObjectCategoryDeleteAfter') &&
            $this->registerHook('actionObjectManufacturerDeleteAfter') &&
            $this->registerHook('actionShopDataDuplication');
		if ($res) {
            // Truncate table before insert data.
            Db::getInstance()->execute('TRUNCATE TABLE `'._DB_PREFIX_.'st_sticker`');
            Db::getInstance()->execute('TRUNCATE TABLE `'._DB_PREFIX_.'st_sticker_lang`');
            Db::getInstance()->execute('TRUNCATE TABLE `'._DB_PREFIX_.'st_sticker_shop`');
            Db::getInstance()->execute('TRUNCATE TABLE `'._DB_PREFIX_.'st_sticker_map`');
			foreach(Shop::getShops(false) as $shop)
				$res &= $this->sampleData($shop['id_shop']);
		}
		
        $this->clearStickersCache();
        return $res;
	}
	
	/**
	 * Creates tables
	 */
	public function installDb()
	{
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_sticker` (
				`id_st_sticker` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`type` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `text_color` varchar(7) DEFAULT NULL,
                `bg_color` varchar(7) DEFAULT NULL,
                `border_color` varchar(7) DEFAULT NULL,
                `border_width` smallint(6) unsigned DEFAULT 0,
                `border_radius` smallint(6) unsigned DEFAULT 0,
                `bg_opacity` float(4,2)  NOT NULL DEFAULT 1,
                `text_width` smallint(6) unsigned unsigned DEFAULT 0,
                `text_height` smallint(6) unsigned unsigned DEFAULT 0,
                `sticker_position` tinyint(3) unsigned NOT NULL DEFAULT 3,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `is_flag` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `offset_x` smallint(6) signed DEFAULT 0,
                `offset_y` smallint(6) signed DEFAULT 0,
                `font_size` smallint(6) unsigned DEFAULT NULL,
                `text_font` varchar(255) DEFAULT NULL,
                `text_font_weight` varchar(255) DEFAULT NULL,
                `position` int(10) unsigned NOT NULL DEFAULT 0,
				PRIMARY KEY (`id_st_sticker`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		$return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_sticker_lang` (
				`id_st_sticker` int(10) UNSIGNED NOT NULL,
				`id_lang` int(10) unsigned NOT NULL,
                `name` varchar(255) DEFAULT NULL,
    			`text` varchar(255) DEFAULT NULL,
                `image_multi_lang` varchar(255) DEFAULT NULL,
                `image_lang_default` varchar(255) DEFAULT NULL,
                `width` int(10) unsigned NOT NULL DEFAULT 0,
                `height` int(10) unsigned NOT NULL DEFAULT 0,
				PRIMARY KEY (`id_st_sticker`, `id_lang`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		$return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_sticker_shop` (
				`id_st_sticker` int(10) UNSIGNED NOT NULL,
                `id_shop` int(11) NOT NULL,      
                PRIMARY KEY (`id_st_sticker`,`id_shop`),    
                KEY `id_shop` (`id_shop`)   
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
        
        $return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_sticker_map` (
				`id_st_sticker_map` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `id_st_sticker` int(11) NOT NULL DEFAULT 0,
                `location` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `id_category` int(10) unsigned NOT NULL DEFAULT 0,
                `id_manufacturer` int(10) unsigned NOT NULL DEFAULT 0,
                `id_products` varchar(512) DEFAULT NULL,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1,     
                PRIMARY KEY (`id_st_sticker_map`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;');
		
		return $return;
	}
    
    public function sampleData($id_shop)
    {
        $return = true;
        // Type: 1=New 2=Sale 3=Price drop 4=sold out
        $samples = array(
            array(
                'name' => 'New sticker',
                'text' => 'NEW',
                'type' => 1,
                'sticker_position' => 1,
                'active' => 1,
                'border_color' => '',
                'border_width' => 0,
                'text_color' => '#ffffff',
                'bg_color' => '#06a161',
                'bg_opacity' => 1,
                'is_flag' => 2,
                'text_height' => 20,
                'offset_7' => 20,
            ),
            array(
                'name' => 'On sale sticker',
                'text' => 'SALE',
                'type' => 2,
                'sticker_position' => 3,
                'active' => 1,
                'border_color' => '',
                'border_width' => 0,
                'text_color' => '#ffffff',
                'bg_color' => '#FF8A00',
                'bg_opacity' => 1,
                'is_flag' => 1,
                'text_height' => 20,
                'offset_7' => 20,
            ),
            array(
                'name' => 'Reduced price sticker',
                'text' => 'Reduced price',
                'type' => 3,
                'sticker_position' => 7, 
                'active' => 0,
                'border_color' => '#999999',
                'border_width' => 2,
                'text_color' => '',
                'bg_color' => '',
                'bg_opacity' => 1,
                'is_flag' => 0,
                'text_height' => 0,
                'offset_7' => 0,
            ),
            array(
                'name' => 'Sold out sticker',
                'text' => 'Sold out',
                'type' => 4,
                'sticker_position' => 10, 
                'active' => 1,
                'border_color' => '#999999',
                'border_width' => 2,
                'text_color' => '',
                'bg_color' => '',
                'bg_opacity' => 1,
                'is_flag' => 0,
                'text_height' => 0,
                'offset_7' => 0,
            ),
            array(
                'name' => 'Online only sticker',
                'text' => 'Online only',
                'type' => 5,
                'sticker_position' => 11, 
                'active' => 0,
                'border_color' => '#999999',
                'border_width' => 2,
                'text_color' => '',
                'bg_color' => '',
                'bg_opacity' => 1,
                'is_flag' => 0,
                'text_height' => 0,
                'offset_7' => 0,
            ),
            array(
                'name' => 'Pack sticker',
                'text' => 'Pack',
                'type' => 6,
                'sticker_position' => 5, 
                'active' => 0,
                'border_color' => '#999999',
                'border_width' => 2,
                'text_color' => '',
                'bg_color' => '',
                'bg_opacity' => 1,
                'is_flag' => 0,
                'text_height' => 0,
                'offset_7' => 0,
            ),

        );
        foreach($samples as $sample)
        {
            $module = new StStickersClass();
            $module->type = $sample['type'];
            $module->sticker_position = $sample['sticker_position'];               
            $module->active = $sample['active'];
            $module->border_color = $sample['border_color'];
            $module->border_width = $sample['border_width'];
            $module->text_color = $sample['text_color'];
            $module->bg_color = $sample['bg_color'];
            $module->bg_opacity = $sample['bg_opacity'];
            $module->is_flag = $sample['is_flag'];
            $module->text_height = $sample['text_height'];
            $module->offset_7 = $sample['offset_7'];
            $module->id_shop_list = array($id_shop);
            foreach (Language::getLanguages(false) as $lang)
            {
                $module->name[$lang['id_lang']] = $sample['name'];
				$module->text[$lang['id_lang']] = $sample['text'];
            }
            $return &= $module->add();
        }
        return $return;
    }
     
	public function uninstall()
	{
	    $this->clearStickersCache();
		// Delete configuration
		return $this->uninstallDb() &&
			parent::uninstall();
	}

	/**
	 * deletes tables
	 */
	public function uninstallDb()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_sticker`,`'._DB_PREFIX_.'st_sticker_lang`,`'._DB_PREFIX_.'st_sticker_shop`,`'._DB_PREFIX_.'st_sticker_map`');
	}

    private function _checkImageDir()
    {
        $result = true;
        if (!file_exists(_PS_UPLOAD_DIR_.$this->name))
        {
            $success = @mkdir(_PS_UPLOAD_DIR_.$this->name, self::$access_rights, true)
						|| @chmod(_PS_UPLOAD_DIR_.$this->name, self::$access_rights);
            if(!$success) {
                $result = false;
                $this->_html .= $this->displayError('"'._PS_UPLOAD_DIR_.$this->name.'" '.$this->getTranslator()->trans('An error occurred during new folder creation', array(), 'Admin.Theme.Transformer'));
            }
        }
        
        return $result;
    }

	public function getContent()
	{
		$this->context->controller->addJS(($this->_path).'views/js/admin.js');
        $this->context->controller->addCss($this->_path.'views/css/admin.css');
        $this->googleFonts = include(_PS_MODULE_DIR_.'stthemeeditor/googlefonts.php');
        $this->_html .= '<script type="text/javascript">var googleFontsString=\''.Tools::jsonEncode($this->googleFonts).'\';var go_to_advanced_confirm="'.$this->getTranslator()->trans('Did you save all changes you just made? Unsaved changes will lose.', array(), 'Modules.Ststickers.Admin').'"</script>';
        $check_result = $this->_checkImageDir();
        
        $id_st_sticker = (int)Tools::getValue('id_st_sticker');
        $id_st_sticker_map = (int)Tools::getValue('id_st_sticker_map');
        if (Tools::getValue('ajax') && Tools::getValue('act') == 'changeProductSticker' ) {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
	       if ($id_product=Tools::getValue('id_product')) {
	           $id_st_sticker_map = StStickersMapClass::changeProductSticker($id_st_sticker, $id_product, $id_st_sticker_map);
               if ((int)$id_st_sticker_map > 0) {
                    $result = array(
                        'r' => true,
                        'm' => '',
                        'd' => (int)$id_st_sticker_map,
                    );
               }
	       }
           die(json_encode($result));
	    }
        if(Tools::getValue('act')=='delete_image' && $id_st_sticker)
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $id_lang = Tools::getValue('id_lang');
            $sticker = new StStickersClass($id_st_sticker, $id_lang);
            $sticker->image_multi_lang = '';
            $result['r'] = $sticker->save();
            die(json_encode($result));
        }
	    if ((Tools::isSubmit('status'.$this->name)))
        {
            $sticker = new StStickersClass((int)$id_st_sticker);
            if($sticker->id && $sticker->toggleStatus())
            {
                $this->clearStickersCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if ((Tools::isSubmit('statusmap'.$this->name)))
        {
            $map = new StStickersMapClass((int)$id_st_sticker_map);
            if($map->id && $map->toggleStatus())
            {
                $this->clearStickersCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
		if (isset($_POST['save'.$this->name]) || isset($_POST['save'.$this->name.'AndStay']))
		{
            if ($id_st_sticker)
				$sticker = new StStickersClass((int)$id_st_sticker);
			else
				$sticker = new StStickersClass();
            
            $error = array();
            
            $sticker->copyFromPost();
            if ($text_font = Tools::getValue('text_font_select')) {
                $sticker->text_font = $text_font;
            }
            
            if (!$sticker->type) {
                $sticker->type = 0;
            }
            
            $languages = Language::getLanguages(false);
            $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
            $default_image = array();
            foreach ($languages as $lang) {
                $res = $this->stUploadImage('image_multi_lang_'.$lang['id_lang']);
                if(count($res['error']))
                    $error = array_merge($error,$res['error']);
                elseif($res['image'])
                {
                    $sticker->image_multi_lang[$lang['id_lang']] = $res['image'];
                    $sticker->width[$lang['id_lang']] = $res['width'];
                    $sticker->height[$lang['id_lang']] = $res['height'];
                    $default_image || $default_image = $res;
                }
            }
            
            // Check uploded icon.
            if ($default_image) {
                foreach ($languages as $lang) {
                    if (!$sticker->image_multi_lang[$lang['id_lang']]) {
                        $sticker->image_lang_default[$lang['id_lang']] = $default_image['image'];
                        $sticker->width[$lang['id_lang']] = $default_image['width'];
                        $sticker->height[$lang['id_lang']] = $default_image['height'];
                    }
                }
            }
            
			if (!count($error) && $sticker->validateFields(false) && $sticker->validateFieldsLang(false))
            {
                $shop_ids = $sticker->getShopIds();
                $sticker->clearShopIds();
                $id_shop_list = array();
                if($assos_shop = Tools::getValue('checkBoxShopAsso_st_sticker')) {
                    foreach ($assos_shop as $id_shop => $row) {
                        $id_shop_list[] = $id_shop;
                    }
                }
                if (!$id_shop_list) {
                    $id_shop_list = array(Context::getContext()->shop->id);
                }
                $sticker->id_shop_list = array_unique($id_shop_list);
                if($sticker->save())
                {
                    $sticker->cacheFonts();
                    $this->clearStickersCache();
                    if(isset($_POST['save'.$this->name.'AndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_sticker='.$sticker->id.'&conf='.($id_st_sticker?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));  
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf='.($id_st_sticker?4:3).'&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else {
                    $sticker->restoreShopIds($shop_ids);
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during sticker', array(), 'Modules.Ststickers.Admin').' '.($id_st_sticker ? $this->gettranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
                }      
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        
        if (isset($_POST['savemap'.$this->name]) || isset($_POST['savemap'.$this->name.'AndStay']))
		{
            if ($id_st_sticker_map)
				$sticker = new StStickersMapClass((int)$id_st_sticker_map);
			else
				$sticker = new StStickersMapClass();
            
            $error = array();
            $id_products = $sticker->id_products;
            $sticker->copyFromPost();
            $sticker->id_category = 0;
            $sticker->id_manufacturer = 0;
            $sticker->id_products = '';
            switch($sticker->location) {
                case 1:
                    if ($id_product = Tools::getValue('id_product')) {
                        $id_product_arr = array();
                        foreach($id_product AS $id) {
                            /*if (!StStickersMapClass::getByProductId($id, $sticker->id_st_sticker)) {
                                $id_product_arr[] = $id;
                            }*/
                            $product = new Product((int)$id);
                            if ($product->id) {
                                $id_product_arr[] = (int)$id;
                            }
                        }
                        /*if ($id_products && $id_st_sticker_map) {
                            $id_product_arr = array_merge($id_product_arr, explode(',', trim($id_products, ',')));
                        }*/
                        if ($id_product_arr = array_unique($id_product_arr)) {
                            $sticker->id_products = ','.implode(',', $id_product_arr).',';
                        }
                    }
                    break;
                case 2:
                    $sticker->id_category = (int)Tools::getValue('id_category');
                    break;
                case 3:
                    $sticker->id_manufacturer = (int)Tools::getValue('id_manufacturer');
                    break;
            }
            
            if (!$sticker->id_st_sticker) {
                $error[] = $this->displayError($this->getTranslator()->trans('"Sticker" is required.', array(), 'Modules.Ststickers.Admin'));
            }
            
			if (!count($error) && $sticker->validateFields(false) && $sticker->validateFieldsLang(false))
            {                
                if($sticker->save())
                {
                    $this->clearStickersCache();
                    if(isset($_POST['savemap'.$this->name.'AndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_sticker_map='.$sticker->id.'&conf='.($id_st_sticker_map?4:3).'&updatemap'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));  
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf='.($id_st_sticker_map?4:3).'&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during sticker', array(), 'Modules.Ststickers.Admin').' '.($id_st_sticker ? $this->gettranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        
		if(Tools::isSubmit('add'.$this->name) || (Tools::isSubmit('update'.$this->name) && $id_st_sticker))
        {
            $helper = $this->initForm();
            return $this->_html.$helper->generateForm($this->fields_form);
        }
        elseif (Tools::isSubmit('delete'.$this->name) && $id_st_sticker)
		{
			$sticker = new StStickersClass($id_st_sticker);
            $sticker->delete();
            $this->clearStickersCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        if(Tools::isSubmit('addmap'.$this->name) || (Tools::isSubmit('updatemap'.$this->name) && $id_st_sticker_map))
        {
            $helper = $this->initMapForm();
            return $this->_html.$helper->generateForm($this->fields_form);
        }
        elseif (Tools::isSubmit('deletemap'.$this->name) && $id_st_sticker_map)
		{
			$sticker = new StStickersMapClass($id_st_sticker_map);
            $sticker->delete();
            $this->clearStickersCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else
		{
		    $stickers = StStickersClass::getAll();
			$helper = $this->initList($stickers);
			$this->_html .= $helper->generateList($stickers, $this->fields_list);
            $helper = $this->initMapList();
            return $this->_html.$helper->generateList(StStickersMapClass::getAll(), $this->fields_list);
		}
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
            $name = str_replace(strrchr($_FILES[$item]['name'], '.'), '', $_FILES[$item]['name']);
			$imagesize = array();
			$imagesize = @getimagesize($_FILES[$item]['tmp_name']);
			if (!empty($imagesize) &&
				in_array(strtolower(substr(strrchr($imagesize['mime'], '/'), 1)), array('jpg', 'gif', 'jpeg', 'png')) &&
				in_array($type, array('jpg', 'gif', 'jpeg', 'png')))
			{
				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
				$salt = $name ? Tools::str2url($name) : sha1(microtime());
                $c_name = $salt;
                $c_name_thumb = $c_name.'-thumb';
				if ($upload_error = ImageManager::validateUpload($_FILES[$item]))
					$result['error'][] = $upload_error;
				elseif (!$temp_name || !move_uploaded_file($_FILES[$item]['tmp_name'], $temp_name))
					$result['error'][] = $this->displayError($this->getTranslator()->trans('An error occurred during the image upload.', array(), 'Admin.Theme.Transformer'));
				else{
				   $infos = getimagesize($temp_name);
                   $ratio_y = 72;
    			   $ratio_x = $infos[0] / ($infos[1] / $ratio_y);
                   if(!ImageManager::resize($temp_name, _PS_UPLOAD_DIR_.$this->name.'/'.$c_name.'.'.$type, null, null, $type) || !ImageManager::resize($temp_name, _PS_UPLOAD_DIR_.$this->name.'/'.$c_name_thumb.'.'.$type, $ratio_x, $ratio_y, $type))
				       $result['error'][] = $this->displayError($this->getTranslator()->trans('an error occurred during the image upload.', array(), 'Admin.Theme.Transformer'));
				} 
				if (isset($temp_name))
					@unlink($temp_name);
                    
                if(!count($result['error']))
                {
                    $result['image'] = $this->name.'/'.$c_name.'.'.$type;
                    $result['thumb'] = $this->name.'/'.$c_name_thumb.'.'.$type;
                    $result['width'] = $imagesize[0];
                    $result['height'] = $imagesize[1];
                }
                return $result;
			}
        }
        else
            return $result;
    }
    private function getCategoryOption(&$category_arr,$id_category = 1, $id_lang = false, $id_shop = false, $recursive = true)
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
		$category_arr[$category->id] = array(
            'id' => $category->id,
            'name' => (isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')',
        );
        
		if (isset($children) && count($children))
			foreach ($children as $child)
			{
				$this->getCategoryOption($category_arr,(int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],$recursive);
			}
	}
    
	protected function initForm()
	{
        $id_st_sticker = (int)Tools::getValue('id_st_sticker');
		$sticker = new StStickersClass($id_st_sticker);
        
        $variants = array();
        $variants_default = ['400'=>'400', '700'=>'700', 'italic'=>'italic', '700italic'=>'700italic'];
        $google_font_link = '';
        if($sticker->id && $sticker->text_font){
            $temp = $this->googleFonts[str_replace(' ', '_', $sticker->text_font)]['variants'];
            foreach ($temp as $v) {
                $variants_default[$v] = $v;
            }
            //this can be improved by moving it to the head of BO
            $google_font_link .= '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.str_replace(' ', '+', $sticker->text_font).':'.$sticker->text_font_weight.'" />';
            $sticker->text_font_select = $sticker->text_font;
        }
        foreach($variants_default AS $value) {
            $variants[] = array('id'=>$value,'name'=>$value);
        }
        array_unshift($variants, array('id'=>'','name'=>'--'));
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Settings for ', array(), 'Modules.Ststickers.Admin').self::$type[(int)$sticker->type]['label'],
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Name(Reminder):', array(), 'Modules.Ststickers.Admin'),
					'name' => 'name',
                    'size' => 64,
                    'lang' => true,
                    'desc' => $this->getTranslator()->trans('This is used as a reminder, it would not show on the front offce.', array(), 'Modules.Ststickers.Admin'),
				),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Sticker:', array(), 'Modules.Ststickers.Admin'),
                    'name' => 'type',
                    'default_value' => 0,
                    'values' => self::$type,
                ), 
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Text:', array(), 'Admin.Theme.Transformer'),
					'name' => 'text',
                    'size' => 64,
                    'lang' => true,
				),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'sticker_position',
                    'default_value' => 3,
                    'options' => array(
                        'query' => self::$position,
                        'id' => 'id',
                        'name' => 'name',
                        ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Offset X:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'offset_x',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Accept positive and negative numbers ', array(), 'Admin.Theme.Transformer'),
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Offset Y:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'offset_y',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Accept positive and negative numbers ', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Google fonts:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_font_select',
                    'onchange' => 'handle_font_change(this);',
                    'options' => array(
                        'query' => $this->fontOptions(),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer'),
                        ),
                    ),
                    'default_value' => '',
                    'validation' => 'isGenericName',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Font weight:', array(), 'Admin.Theme.Transformer'),
                    'onchange' => 'handle_font_style(this);',
                    'name' => 'text_font_weight',
                    'options' => array(
                        'query' => $variants,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'default_value' => '',
                    'validation' => 'isAnything',
                    'desc' => '<p id="google_font_example" class="fontshow">Example Title</p>'.$google_font_link,
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Font size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'font_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Background opacity:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_opacity',
                    'validation' => 'isFloat',
                    'default_value' => 1,
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Border width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'border_width',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'border_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Border radius:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'border_radius',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Set a large value for this field to make it be round.', array(), 'Modules.Ststickers.Admin'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_width',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Setting a width to stickers can center them.', array(), 'Modules.Ststickers.Admin'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Height:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_height',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Is this a flag shaped sticker:', array(), 'Modules.Ststickers.Admin'),
                    'name' => 'is_flag',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'is_flag_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'is_flag_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Flag tail on the right side', array(), 'Modules.Ststickers.Admin')),
                        array(
                            'id' => 'is_flag_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Flag tail on the left side', array(), 'Modules.Ststickers.Admin')),
                    ),
                    'validation' => 'isUnsignedInt',
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
                            'label' => $this->getTranslator()->trans('Visible', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Hide on mobile (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Hide on PC (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'position',
                    'default_value' => 0,
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
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),
		);
        
        if (Shop::isFeatureActive())
        {
            $this->fields_form[0]['form']['input'][] = array(
                'type' => 'shop',
                'label' => $this->getTranslator()->trans('Shop association:', array(), 'Admin.Theme.Transformer'),
                'name' => 'checkBoxShopAsso',
            );
        }
                    
        $languages = Language::getLanguages(true);
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		foreach ($languages as $lang)
        {
            $this->fields_form[0]['form']['input']['image_multi_lang_'.$lang['id_lang']] = array(
                    'type' => 'file',
					'label' => $this->getTranslator()->trans('Image', array(), 'Admin.Theme.Transformer').' - '.$lang['name'].($default_lang == $lang['id_lang'] ? '('.$this->gettranslator()->trans('default language', array(), 'Admin.Theme.Transformer').')' : '').':',
					'name' => 'image_multi_lang_'.$lang['id_lang'],
                    //'required'  => ($default_lang == $lang['id_lang']),
                    'desc' => $this->getTranslator()->trans('Text would not show out, if you upload an image here. This module would not change image names for seo purpose, so ensure the image you are going to upload has an unique name.', array(), 'Modules.Ststickers.Admin').'<br/>',
                );
        }
        $this->fields_form[0]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i>'.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        if(Validate::isLoadedObject($sticker))
        {
            foreach ($languages as $lang)
                if($sticker->image_multi_lang[$lang['id_lang']])
                {
                    StStickersClass::fetchMediaServer($sticker->image_multi_lang[$lang['id_lang']]);
                    $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'has_image_'.$lang['id_lang'], 'default_value'=>1);
                    $this->fields_form[0]['form']['input']['image_multi_lang_'.$lang['id_lang']]['required'] = false;
                    $this->fields_form[0]['form']['input']['image_multi_lang_'.$lang['id_lang']]['desc'] .= '<img style="max-width:200px;" src="'.$sticker->image_multi_lang[$lang['id_lang']].'"/>'.
                    ($lang['id_lang'] != $default_lang ? '<p><a class="btn btn-default st_delete_image" data-id="'.$sticker->id.'" data-lang="'.(int)$lang['id_lang'].'" href="javascript:;"><i class="icon-trash"></i> '.$this->getTranslator()->trans(' Delete', array(), 'Admin.Theme.Transformer').'</a></p>' : '');
                }
        }
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->id = $sticker->id;
        $helper->table = 'st_sticker';
		$helper->identifier = 'id_st_sticker';
		$helper->submit_action = 'save'.$this->name;
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($sticker,"fields_form"),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		
		return $helper;
	}
    
    public function fontOptions() {
        $google = array();
        foreach($this->googleFonts as $v)
            $google[] = array('id'=>$v['family'],'name'=>$v['family']);
        return $google;
    }
    
    protected function initMapForm()
	{
        $id_st_sticker_map = (int)Tools::getValue('id_st_sticker_map');
		$sticker = new StStickersMapClass($id_st_sticker_map);

		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Setting', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Sticker:', array(), 'Modules.Ststickers.Admin'),
                    'name' => 'id_st_sticker',
                    'required' => true,
                    'options' => array(
                        'query' => $this->getStickeryArray(),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('Select a sticker', array(), 'Modules.Ststickers.Admin')
						)
                    ),
                ),
                'location' => array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Show on:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'location',
                    'default_value' => 0,
                    'values' => self::$location,
                ),
                'category' => array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Select a category', array(), 'Modules.Ststickers.Admin'),
					'name' => 'id_category',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => $this->getApplyCategory(),
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer')
						)
					),
				),
                'manufacturer' => array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Select a manufacturer', array(), 'Modules.Ststickers.Admin'),
					'name' => 'id_manufacturer',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => $this->getApplyManufacturer(),
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer')
						)
					),
				),
                'products' => array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Specific products:', array(), 'Modules.Ststickers.Admin'),
					'name' => 'products',
                    'autocomplete' => false,
                    'class' => 'fixed-width-xxl',
                    'desc' => '',
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
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),
		);
        $this->fields_form[0]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i>'.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        $products_html = '';
        foreach(explode(',', trim($sticker->id_products, ',')) AS $id_product)
        {
            if (!(int)$id_product) {
                continue;
            }
            $product = new Product((int)$id_product, false, Context::getContext()->language->id);
            $products_html .= '<li>'.$product->name.'['.$product->reference.']
            <a href="javascript:;" class="del_product"><img src="../img/admin/delete.gif" /></a>
            <input type="hidden" name="id_product[]" value="'.$id_product.'" /></li>';
        }
        
        $this->fields_form[0]['form']['input']['products']['desc'] = $this->getTranslator()->trans('Type product name to add prodcuts:', array(), 'Modules.Ststickers.Admin').'<br/>'.$this->getTranslator()->trans('Current products', array(), 'Admin.Theme.Transformer')
                .': <ul id="curr_products">'.$products_html.'</ul>';
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->id = $sticker->id;
        $helper->table = 'st_sticker_map';
		$helper->identifier = 'id_st_sticker_map';
		$helper->submit_action = 'savemap'.$this->name;
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($sticker,"fields_form"),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		
		return $helper;
	}

    public static function showApplyTo($value,$row)
    {
	    if($value)
		   $result = isset(self::$location[$value]) ? self::$location[$value]['name'] : '';
        elseif($row['id_category'])
        {
            $category = new Category($row['id_category'],(int)Context::getContext()->language->id);
            if($category->id)
            {
                $module = new StStickers();
                $result = $category->name.'('.$module->getTranslator()->trans('Category', array(), 'Admin.Theme.Transformer').')';
            }
        }
        elseif($row['id_manufacturer'])
        {
            $id_lang = (int)Context::getContext()->language->id;
            $manufacturer = Manufacturer::getNameById((int)$row['id_manufacturer']);
    		$result = (string)$manufacturer;
        }
        else
        {
            $module = new StStickers();
            $result = $module->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer');
        }
        return $result;
    }
    public static function showImage($value,$row)
    {
        if ($value || $row['text']) {
            return ($row['text'] ? $row['text'] : '').'<img style="max-width:200px;" src="'.$value.'" />';    
        } else {
            return '-';
        }
    }
    public static function showTypeName($value,$row)
    {
        return self::$type[$value]['label'].'<br/>'.self::$position[$row['sticker_position']]['name'];
    }
    public static function showLocationName($value,$row)
    {
        return self::$location[$value]['label'];
    }
    public static function showContent($value,$row)
    {
        $ret = '';
        $context = Context::getContext();
        switch($row['location']) {
            case 0:
                return '--';
            case 1:
                $html = '<ul>';
                foreach(explode(',', trim($row['id_products'],',')) AS $id_product) {
                    if (!$id_product) {
                        continue;
                    }
                    $product = new Product((int)$id_product, false, $context->language->id, $context->shop->id);
                    $html .= '<li>'.$product->name.'['.$product->reference.']</li>';
                }
                $html .= '</ul>';
                return $html;
                break;
            case 2:
                $category = new Category((int)$row['id_category'], $context->language->id, $context->shop->id);
                return $category->name;
            case 3:
                return Manufacturer::getNameById((int)$row['id_manufacturer']);
        }
        return $ret;
    }
	protected function initList($list = array())
	{
		$this->fields_list = array(
			'id_st_sticker' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
            'name' => array(
				'title' => $this->getTranslator()->trans('Name', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'type' => array(
				'title' => $this->getTranslator()->trans('Sticker type / position', array(), 'Modules.Ststickers.Admin'),
				'width' => 120,
				'type' => 'text',
				'callback' => 'showTypeName',
				'callback_object' => 'StStickers',
                'search' => false,
                'orderby' => false
			),
            'image_multi_lang' => array(
				'title' => $this->getTranslator()->trans('Sticker icon / text', array(), 'Modules.Ststickers.Admin'),
				'type' => 'text',
				'callback' => 'showImage',
				'callback_object' => 'StStickers',
                'width' => 300,
                'search' => false,
                'orderby' => false
            ),
            'active' => array(
				'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
				'align' => 'center',
				'active' => 'status',
				'type' => 'bool',
				'width' => 25,
                'search' => false,
                'orderby' => false
            ),
		);

		$helper = new HelperList();
		$helper->shopLinkType = '';
		$helper->simple_header = false;
        $helper->module = $this;
		$helper->identifier = 'id_st_sticker';
		$helper->actions = array('edit', 'delete');
        $helper->list_skip_actions = array();
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add sticker', array(), 'Modules.Ststickers.Admin')
		);
		$helper->title = $this->getTranslator()->trans('Stickers', array(), 'Modules.Ststickers.Admin');
		$helper->table = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        /*foreach($list AS $value) {
            if ($value['type'] > 0) {
                $helper->list_skip_actions['delete'][] = $value['id_st_sticker'];
            }
        }*/
        
		return $helper;
	}
    protected function initMapList()
	{
		$this->fields_list = array(
			'id_st_sticker_map' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'name' => array(
				'title' => $this->getTranslator()->trans('Sticker name', array(), 'Modules.Ststickers.Admin'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
            'location' => array(
				'title' => $this->getTranslator()->trans('Show on', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
				'callback' => 'showLocationName',
				'callback_object' => 'StStickers',
                'search' => false,
                'orderby' => false
			),
            'id_category' => array(
				'title' => $this->getTranslator()->trans('Content', array(), 'Admin.Theme.Transformer'),
				'type' => 'text',
				'callback' => 'showContent',
				'callback_object' => 'StStickers',
                'width' => 300,
                'search' => false,
                'orderby' => false
            ),
            'active' => array(
				'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
				'align' => 'center',
				'active' => 'status',
				'type' => 'bool',
				'width' => 25,
                'search' => false,
                'orderby' => false
            ),
		);

		$helper = new HelperList();
		$helper->shopLinkType = '';
		$helper->simple_header = false;
        $helper->module = $this;
		$helper->identifier = 'id_st_sticker_map';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addmap'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add new', array(), 'Admin.Theme.Transformer')
		);

		$helper->title = $this->getTranslator()->trans('Association list', array(), 'Modules.Ststickers.Admin');
		$helper->table = 'map'.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    public function hookDisplayHeader($params)
    {   
        $this->context->smarty->assign($this->getWidgetVariables());//global

        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $custom_css = '';
            $custom_css_arr = StStickersClass::getOptions();
            foreach ($custom_css_arr as $v) {
                $prefix = '.st_sticker_'.$v['id_st_sticker'];

                if($v['text_color'])
                    $custom_css .= $prefix.'{color:'.$v['text_color'].';}';
                if($v['bg_color'] && Validate::isColor($v['bg_color'])){
                    $v['bg_opacity'] = (float)$v['bg_opacity'];
                    $bg_opacity = ($v['bg_opacity']>1 || $v['bg_opacity']<0) ? 1 : $v['bg_opacity'];

                    $rgb_color = self::hex2rgb($v['bg_color']);
                    if(is_array($rgb_color))
                        $custom_css .= $prefix.'{background:rgba('.$rgb_color[0].','.$rgb_color[1].','.$rgb_color[2].','.$bg_opacity.');}';
                    
                    $custom_css .= $prefix.'{background:rgba('.$rgb_color[0].','.$rgb_color[1].','.$rgb_color[2].','.$bg_opacity.');}';
                    $custom_css .= '.pro_first_box '.$prefix.'.flag_1:before, .pro_first_box '.$prefix.'.flag_2:before{border-top-color:'.$v['bg_color'].';border-bottom-color:'.$v['bg_color'].';}';
                }
                if($v['border_color'])
                {
                    $custom_css .= $prefix.'{border-color:'.$v['border_color'].';}';
                }

                $custom_css .= $prefix.'{border-width:'.(int)$v['border_width'].'px;}';

                if($v['border_radius'])
                    $custom_css .= $prefix.'{-webkit-border-radius: '.$v['border_radius'].'px;-moz-border-radius: '.$v['border_radius'].'px;border-radius: '.$v['border_radius'].'px;}';
                if($v['text_width'])
                    $custom_css .= $prefix.'{width:'.$v['text_width'].'px;}';
                if($v['text_height'])
                {
                    $custom_css .= $prefix.'{height:'.$v['text_height'].'px;line-height:'.((int)$v['text_height']-2*(int)$v['border_width']).'px;}';
                    $custom_css .= '.pro_first_box '.$prefix.'.flag_1:before, .pro_first_box '.$prefix.'.flag_2:before{height:'.$v['text_height'].'px;width:'.floor($v['text_height']/2).'px;border-width:'.floor($v['text_height']/2).'px;}';
                }
                $custom_css .= '.pro_first_box '.$prefix.'.flag_1:before, .pro_first_box '.$prefix.'.flag_2:before{top:-'.(int)$v['border_width'].'px;}';
                $custom_css .= '.pro_first_box '.$prefix.'.flag_1:before{right:-'.(floor(($v['text_height'] ? $v['text_height'] : 22)/2)+(int)$v['border_width']).'px;}';
                $custom_css .= '.pro_first_box '.$prefix.'.flag_2:before{left:-'.(floor(($v['text_height'] ? $v['text_height'] : 22)/2)+(int)$v['border_width']).'px;}';

                if($v['font_size'])
                    $custom_css .= $prefix.'{font-size:'.$v['font_size'].'px;}';
                if($v['text_font'])
                    $custom_css .= $prefix.'{font-family: '.$v['text_font'].';}';
                if($v['text_font_weight'])
                    $custom_css .= $prefix.'{'.$this->fontWeight($v['text_font_weight']).'}';

                if($v['sticker_position'])
                {
                    switch ($v['sticker_position']) {
                        case 1:
                            $custom_css .= $prefix.'{left:'.$v['offset_x'].'px;}';
                            $custom_css .= $prefix.'{top:'.$v['offset_y'].'px;}';
                            break;
                        case 2:
                            $custom_css .= $prefix.'{left:50%;margin-left:'.($v['offset_x']-$v['text_width']/2).'px;}';
                            $custom_css .= $prefix.'{top:'.$v['offset_y'].'px;}';
                            break;
                        case 3:
                            $custom_css .= $prefix.'{right:'.$v['offset_x'].'px;}';
                            $custom_css .= $prefix.'{top:'.$v['offset_y'].'px;}';
                            break;
                        case 4:
                            $custom_css .= $prefix.'{left:'.$v['offset_x'].'px;}';
                            $custom_css .= $prefix.'{top:50%;margin-top:'.($v['offset_y']-$v['text_height']/2).'px;}';
                            break;
                        case 5:
                            $custom_css .= $prefix.'{left:50%;margin-left:'.($v['offset_x']-$v['text_width']/2).'px;}';
                            $custom_css .= $prefix.'{top:50%;margin-top:'.($v['offset_y']-$v['text_height']/2).'px;}';
                            break;
                        case 12:
                            $custom_css .= $prefix.'{left:'.$v['offset_x'].'px;right:'.$v['offset_x'].'px;margin-left: auto;margin-right:auto;}';
                            $custom_css .= $prefix.'{top:50%;margin-top:'.($v['offset_y']-$v['text_height']/2).'px;}';
                            break;
                        case 6:
                            $custom_css .= $prefix.'{right:'.$v['offset_x'].'px;}';
                            $custom_css .= $prefix.'{top:50%;margin-top:'.($v['offset_y']-$v['text_height']/2).'px;}';
                            break;
                        case 7:
                            $custom_css .= $prefix.'{left:'.$v['offset_x'].'px;}';
                            $custom_css .= $prefix.'{bottom:'.$v['offset_y'].'px;}';
                            break;
                        case 8:
                            $custom_css .= $prefix.'{left:50%;margin-left:'.($v['offset_x']-$v['text_width']/2).'px;}';
                            $custom_css .= $prefix.'{bottom:'.$v['offset_y'].'px;}';
                            break;
                        case 9:
                            $custom_css .= $prefix.'{right:'.$v['offset_x'].'px;}';
                            $custom_css .= $prefix.'{bottom:'.$v['offset_y'].'px;}';
                            break;
                    }
                }

            }   
            $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
    }
    public function fontWeight($variant)
    {
        $style = '';
        if ($variant == 'regular')
        {
            $style .= 'font-weight:normal;';
        }
        elseif($variant)
        {
            if (preg_match('/(\d+)/iS', $variant, $math))
            {
                if (!isset($math[1]))
                    $math[1] = '400';
                $style .= 'font-weight:'.$math[1].';';
            }
            if (preg_match('/([^\d]+)/iS', $variant, $math))
            {
                if (!isset($math[1]))
                    $math[1] = 'normal';
                $style .= 'font-style:'.$math[1].';';
            }
        }
        return $style;
    }
    public function hookDisplayAdminProductsExtra($params)
    {
        if (!$id_product = $params['id_product']) {
            return;
        }
        $id_lang = $this->context->language->id;
        $stickers  = StStickersClass::getAll(0, 0, 0);
        foreach($stickers AS &$sticker) {
            if ($row =  StStickersMapClass::getByProductId($id_product, $sticker['id_st_sticker'])) {
                $sticker['id_st_sticker_map'] = $row['id_st_sticker_map'];
            } else {
                $sticker['id_st_sticker_map'] = 0;
            }
        }
        
        $this->smarty->assign(array(
            'stickers' => $stickers,
            'id_product' => $id_product,
            'current_url' => 'index.php?controller=AdminModules&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
        ));
        return $this->display(__FILE__, 'views/templates/admin/ststickers.tpl'); 
    }
	
    public function hookActionObjectCategoryDeleteAfter($params)
    {
        if(!$params['object']->id)
            return ;
        
        return StStickersClass::deleteByIdCategory($params['object']->id);
    }
    public function hookActionObjectManufacturerDeleteAfter($params)
    {
        if(!$params['object']->id)
            return ;
        
        return StStickersClass::deleteByIdtManufacturer($params['object']->id);;
    }
	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'st_sticker_shop (id_st_sticker, id_shop)
		SELECT id_st_sticker, '.(int)$params['new_id_shop'].'
		FROM '._DB_PREFIX_.'st_sticker_shop
		WHERE id_shop = '.(int)$params['old_id_shop']);
        $this->clearStickersCache();
    }
	protected function stGetCacheId($key,$type='location',$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key.'_'.$type;
	}
	private function clearStickersCache()
	{
        $this->_clearCache('*');
	}
    public static function hex2rgb($hex) {
       $hex = str_replace("#", "", $hex);
    
       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgb = array($r, $g, $b);
       return $rgb;
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
    
    
    public function renderWidget($hookName = null, array $configuration = [])
    {
        return;
    }
    
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return array(
            'ststickers' => StStickersClass::getAll(0, 1, array(1,2,3,4,5,6)),
            );
    }
    
    public function getApplyCategory()
    {
        $category_arr = array();
		$this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$this->context->language->id, (int)Shop::getContextShopID(), true);
        return $category_arr;
    }
    
    public function getApplyManufacturer()
    {
        $manufacturer_arr = array();
		$manufacturers = Manufacturer::getManufacturers(false, $this->context->language->id);
		foreach ($manufacturers as $manufacturer)
            $manufacturer_arr[] = array('id'=>$manufacturer['id_manufacturer'],'name'=>$manufacturer['name']);
        return $manufacturer_arr;
    }
    
    public function getStickeryArray()
    {
        $array = array();
        foreach(StStickersClass::getAll() AS $value) {
            $array[$value['id_st_sticker']] = array('id'=>$value['id_st_sticker'], 'name'=>($value['name'] ? $value['name'] : 'ID:'.$value['id_st_sticker']));
        }
        return $array;
    }

    public function hookActionStAssemble($product)
    {
        return StStickersMapClass::getForProduct($product['id_product']);
    }

    public function hookDisplayProductExtraContent($params){
        //to do search for a better way, data here are supposed to be in the product-tabs.tpl file
        $extraContent = new ProductExtraContent();
        
        if(!isset($params['product']))
            return $extraContent;

        $extraContent->setContent(StStickersMapClass::getForProduct($params['product']->id));

        return array('ststickers'=>$extraContent);
    }


    public function hookActionProductSearchAfter($params){
        $this->context->smarty->assign($this->getWidgetVariables());//global
        return;
    }
    
}
