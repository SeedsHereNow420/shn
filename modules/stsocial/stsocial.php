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

require_once(dirname(__FILE__).'/classes/StSocialClass.php');

class StSocial extends Module implements WidgetInterface
{
    private $templateFile = array();

    public  $fields_list;
    public  $fields_value;
    public  $fields_form;
	private $_html = '';
    public $validation_errors = array();
    private $_prefix_st = 'ST_SOCIAL_';
    private $_prefix_stsn = 'STSN_';
    private $social_buttons = array();
    public $imgtype = array('jpg', 'gif', 'jpeg', 'png');
    protected static $access_rights = 0775;
    private $_hooks = array();
        
	public function __construct()
	{
		$this->name          = 'stsocial';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0.1';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap     = true;

		parent::__construct();
        
		$this->displayName   = $this->getTranslator()->trans('Social share buttons', array(), 'Modules.Stsocial.Admin');
		$this->description   = $this->getTranslator()->trans('Dispaly Social sharing buttons on your store.', array(), 'Modules.Stsocial.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->templateFile = array(
            'module:stsocial/views/templates/hook/stsocial.tpl',
            'module:stsocial/views/templates/hook/stsocial-drop.tpl',
            'module:stsocial/views/templates/hook/stsocial-nav.tpl',
            );
	}
    
    private function initButtons()
    {
        $this->social_buttons = array(
            array(
                'id' =>'facebook', 
                'name' => $this->getTranslator()->trans('Facebook', array(), 'Modules.Stsocial.Admin'),
                'title' => $this->getTranslator()->trans('Share on Facebook', array(), 'Modules.Stsocial.Admin'),
                'icon_class' => 'fto-facebook',
                'url' => '//www.facebook.com/sharer.php',
                'url_key' => 'u',
                'name_key' => '',
                'image_key' => '',
                'btn_color' => '#fff',
                'btn_hover_color' => '#fff',
                'btn_bg' => '#3B5998',
                'btn_hover_bg' => '#2E4674',
            ),
            array(
                'id' =>'twitter', 
                'name' => $this->getTranslator()->trans('Twitter', array(), 'Modules.Stsocial.Admin'),
                'title' => $this->getTranslator()->trans('Share on Twitter', array(), 'Modules.Stsocial.Admin'),
                'icon_class' => 'fto-twitter',
                'url' => '//twitter.com/share',
                'url_key' => 'url',
                'name_key' => 'text',
                'image_key' => '',
                'btn_color' => '#fff',
                'btn_hover_color' => '#fff',
                'btn_bg' => '#55ACEE',
                'btn_hover_bg' => '#407EAF',
            ),
            array(
                'id' =>'google',
                'name' => $this->getTranslator()->trans('Google+', array(), 'Modules.Stsocial.Admin'),
                'title' => $this->getTranslator()->trans('Share on Google+', array(), 'Modules.Stsocial.Admin'),
                'icon_class' => 'fto-gplus',
                'url' => '//plus.google.com/share',
                'url_key' => 'url',
                'name_key' => '',
                'image_key' => '',
                'btn_color' => '#fff',
                'btn_hover_color' => '#fff',
                'btn_bg' => '#DD4D40',
                'btn_hover_bg' => '#B23E36',
            ),
            array(
                'id' =>'pinterest', 
                'name' => $this->getTranslator()->trans('Pinterest', array(), 'Modules.Stsocial.Admin'),
                'title' => $this->getTranslator()->trans('Share on Pinterest', array(), 'Modules.Stsocial.Admin'),
                'icon_class' => 'fto-pinterest',
                'url' => '//pinterest.com/pin/create/button/',
                'url_key' => 'url',
                'name_key' => 'description',
                'image_key' => 'media',
                'btn_color' => '#fff',
                'btn_hover_color' => '#fff',
                'btn_bg' => '#BD081C',
                'btn_hover_bg' => '#8B0815',
            ),
            array(
                'id' =>'linkedin', 
                'name' => $this->getTranslator()->trans('Linkedin', array(), 'Modules.Stsocial.Admin'),
                'title' => $this->getTranslator()->trans('Share on Linkedin', array(), 'Modules.Stsocial.Admin'),
                'icon_class' => 'fto-linkedin',
                'url' => '//www.linkedin.com/shareArticle',
                'url_key' => 'url',
                'name_key' => 'title',
                'image_key' => 'source',
                'btn_color' => '#fff',
                'btn_hover_color' => '#fff',
                'btn_bg' => '#BD081C',
                'btn_hover_bg' => '#8B0815',
            ),
            array(
                'id' =>'tumblr', 
                'name' => $this->getTranslator()->trans('Tumblr', array(), 'Modules.Stsocial.Admin'),
                'title' => $this->getTranslator()->trans('Share on Tumblr', array(), 'Modules.Stsocial.Admin'),
                'icon_class' => 'fto-tumblr',
                'url' => '//www.tumblr.com/share',
                'url_key' => 'u',
                'name_key' => 't',
                'image_key' => '',
                'btn_color' => '#fff',
                'btn_hover_color' => '#fff',
                'btn_bg' => '#529ecc',
                'btn_hover_bg' => '#347ab5',
            ),
            array(
                'id' =>'blogger', 
                'name' => $this->getTranslator()->trans('Blogger', array(), 'Modules.Stsocial.Admin'),
                'title' => $this->getTranslator()->trans('Share on Blogger', array(), 'Modules.Stsocial.Admin'),
                'icon_class' => 'fto-blogger',
                'url' => '//www.blogger.com/blog-this.g',
                'url_key' => 'u',
                'name_key' => '',
                'image_key' => '',
                'btn_color' => '#fff',
                'btn_hover_color' => '#fff',
                'btn_bg' => '#f4923f',
                'btn_hover_bg' => '#ee6924',
            ),
            array(
                'id' =>'skype', 
                'name' => $this->getTranslator()->trans('Skype', array(), 'Modules.Stsocial.Admin'),
                'title' => $this->getTranslator()->trans('Share on Skype', array(), 'Modules.Stsocial.Admin'),
                'icon_class' => 'fto-skype',
                'url' => '//web.skype.com/share',
                'url_key' => 'url',
                'name_key' => '',
                'image_key' => '',
                'btn_color' => '#fff',
                'btn_hover_color' => '#fff',
                'btn_bg' => '#00aff0',
                'btn_hover_bg' => '#077db4',
            ),
            array(
                'id' =>'digg', 
                'name' => $this->getTranslator()->trans('Digg', array(), 'Modules.Stsocial.Admin'),
                'title' => $this->getTranslator()->trans('Share on Digg', array(), 'Modules.Stsocial.Admin'),
                'icon_class' => 'fto-digg',
                'url' => '//digg.com/submit',
                'url_key' => 'url',
                'name_key' => 'title',
                'image_key' => '',
                'btn_color' => '#fff',
                'btn_hover_color' => '#fff',
                'btn_bg' => '#000000',
                'btn_hover_bg' => '#222222',
            ),
            array(
                'id' =>'telegram', 
                'name' => $this->getTranslator()->trans('Telegram', array(), 'Modules.Stsocial.Admin'),
                'title' => $this->getTranslator()->trans('Share on Telegram', array(), 'Modules.Stsocial.Admin'),
                'icon_class' => 'fto-telegram',
                'url' => '//telegram.me/share/url',
                'url_key' => 'url',
                'name_key' => 'text',
                'image_key' => '',
                'btn_color' => '#fff',
                'btn_hover_color' => '#fff',
                'btn_bg' => '#0d86d7',
                'btn_hover_bg' => '#046fb7',
            ),
            array(
                'id' =>'whatsapp', 
                'name' => $this->getTranslator()->trans('WhatsApp', array(), 'Modules.Stsocial.Admin'),
                'title' => $this->getTranslator()->trans('Share on WhatsApp', array(), 'Modules.Stsocial.Admin'),
                'icon_class' => 'fto-whatsapp',
                'url' => 'whatsapp://send',
                'url_key' => 'text',
                'name_key' => '',
                'image_key' => '',
                'btn_color' => '#fff',
                'btn_hover_color' => '#fff',
                'btn_bg' => '#1EBEA5',
                'btn_hover_bg' => '#1A9D89',
            ),
        );
    }
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
                    'id' => 'displayNav1',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Topbar left - displayNav1', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayNav2',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Topbar right - displayNav2', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayNav3',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Topbar center - displayNav3', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayTop',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayTop', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHeaderCenter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHeaderCenter', array(), 'Admin.Theme.Transformer')
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
                array(
                    'id' => 'displayStBlogArticleFooter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStBlogArticleFooter', array(), 'Admin.Theme.Transformer')
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
		$res = parent::install() &&
			$this->installDB() &&
            $this->registerHook('displaySideBar') &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('actionProductSearchAfter') &&
            $this->registerHook('displayProductCartRight') &&
            Configuration::updateValue($this->_prefix_st.'LINKS_SIZE', 1) &&
            Configuration::updateValue($this->_prefix_st.'LABEL', 1) &&
            Configuration::updateValue($this->_prefix_st.'AS_DROP_DOWN', 1);
        if ($res)
            foreach(Shop::getShops(false) as $shop)
                $res &= $this->sampleData($shop['id_shop']);
        $this->clearCache();
        return $res;
	}
	
	/**
	 * Creates tables
	 */
	public function installDB()
	{
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_social` (
				`id_st_social` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                `item` varchar(255) DEFAULT NULL,  
                `icon_class` varchar(255) DEFAULT NULL, 
                `url` varchar(255) DEFAULT NULL,
                `url_key` varchar(32) DEFAULT NULL,
                `name_key` varchar(32) DEFAULT NULL,
                `image_key` varchar(32) DEFAULT NULL,
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0,  
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `btn_color` varchar(7) DEFAULT NULL,
                `btn_bg` varchar(7) DEFAULT NULL,
                `btn_hover_color` varchar(7) DEFAULT NULL,
                `btn_hover_bg` varchar(7) DEFAULT NULL,
                `bg_opacity` float(4,2)  NOT NULL DEFAULT 0.8, 
                `sidebar` tinyint(1) unsigned NOT NULL DEFAULT 1, 
				PRIMARY KEY (`id_st_social`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_social_lang` (
				`id_st_social` int(10) UNSIGNED NOT NULL,
				`id_lang` int(10) unsigned NOT NULL ,
    			`title` varchar(255) DEFAULT NULL,
				PRIMARY KEY (`id_st_social`, `id_lang`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_social_shop` (
				`id_st_social` int(10) UNSIGNED NOT NULL,
                `id_shop` int(11) NOT NULL,      
                PRIMARY KEY (`id_st_social`,`id_shop`),    
                KEY `id_shop` (`id_shop`)   
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}
    
    public function sampleData($id_shop)
    {
        $return = true;
        $samples = array(
            array(
                'item'              => 'twitter',  
                'icon_class'        => 'fto-twitter', 
                'url'               => '//twitter.com/share',
                'url_key'           => 'url',
                'name_key'          => 'text',
                'image_key'         => '',
                'hide_on_mobile'    => 0,  
                'active'            => 1, 
                'btn_color'         => '#ffffff',
                'btn_bg'            => '#55ACEE',
                'btn_hover_color'   => '#ffffff',
                'btn_hover_bg'      => '#407EAF',
                'bg_opacity'        => '0.8', 
                'sidebar'           => '1',
                'title'             => 'Share on Twitter',
            ),
            array(
                'item'              => 'facebook',  
                'icon_class'        => 'fto-facebook', 
                'url'               => '//www.facebook.com/sharer.php',
                'url_key'           => 'u',
                'name_key'          => '',
                'image_key'         => '',
                'hide_on_mobile'    => 0,  
                'active'            => 1, 
                'btn_color'         => '#ffffff',
                'btn_bg'            => '#3b5998',
                'btn_hover_color'   => '#ffffff',
                'btn_hover_bg'      => '#2E4674',
                'bg_opacity'        => '0.8', 
                'sidebar'           => '1',
                'title'             => 'Share on Facebook',
            ),
            array(
                'item'              => 'google',  
                'icon_class'        => 'fto-gplus', 
                'url'               => '//plus.google.com/share',
                'url_key'           => 'url',
                'name_key'          => '',
                'image_key'         => '',
                'hide_on_mobile'    => 0,  
                'active'            => 1, 
                'btn_color'         => '#ffffff',
                'btn_bg'            => '#DD4D40',
                'btn_hover_color'   => '#ffffff',
                'btn_hover_bg'      => '#2E4674',
                'bg_opacity'        => '0.8', 
                'sidebar'           => '1',
                'title'             => 'Share on Google+',
            ),
            array(
                'item'              => 'pinterest',  
                'icon_class'        => 'fto-pinterest', 
                'url'               => '//pinterest.com/pin/create/button/',
                'url_key'           => 'url',
                'name_key'          => 'description',
                'image_key'         => 'media',
                'hide_on_mobile'    => 0,  
                'active'            => 1, 
                'btn_color'         => '#ffffff',
                'btn_bg'            => '#BD081C',
                'btn_hover_color'   => '#ffffff',
                'btn_hover_bg'      => '#8B0815',
                'bg_opacity'        => '0.8', 
                'sidebar'           => '1',
                'title'             => 'Share on Pinterest',
            ),
        );
        
        foreach($samples as $k=>$sample)
        {
            $module = new StSocialClass();
            foreach (Language::getLanguages(false) as $lang)
            {
				$module->title[$lang['id_lang']] = $sample['title'];
            }
            $module->item           = $sample['item'];
            $module->icon_class     = $sample['icon_class'];
            $module->url            = $sample['url'];
            $module->url_key        = $sample['url_key'];
            $module->name_key       = $sample['name_key'];
            $module->image_key      = $sample['image_key'];
            $module->btn_color      = $sample['btn_color'];
            $module->btn_bg         =$sample['btn_bg'];
            $module->btn_hover_color= $sample['btn_hover_color'];
            $module->btn_hover_bg   = $sample['btn_hover_bg'];
            $module->bg_opacity     = $sample['bg_opacity'];
            $module->sidebar        = $sample['sidebar'];
            $module->active         = $sample['active'];
            $module->hide_on_mobile = $sample['hide_on_mobile'];
            $module->position       = $k;
            $module->id_shop_list   = array((int)$id_shop);
            $return &= $module->add();
        }
        return $return;
    }
    
	public function uninstall()
	{
	    $this->clearCache();
		// Delete configuration
		return $this->deleteTables() &&
			parent::uninstall();
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
        
        return $result;
    }

	/**
	 * deletes tables
	 */
	public function deleteTables()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_social`');
	}

	public function getContent()
	{
	    $check_result = $this->_checkImageDir();
	    $this->context->controller->addJS($this->_path. 'views/js/admin.js');
        $this->context->controller->addCSS(($this->_path).'views/css/admin.css');
        $id_st_social = (int)Tools::getValue('id_st_social');
        $this->initHookArray();
        $this->initButtons();
        if(Tools::getValue('act')=='delete_image')
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $img = Configuration::get($this->_prefix_st.'LOGO_IMG');
            if(Configuration::updateValue($this->_prefix_st.'LOGO_IMG', '')) {
                $result['r'] = true;
                @unlink(_PS_UPLOAD_DIR_.$img);
            } 
            die(json_encode($result));
        }
		if (isset($_POST['savestsocial']) || isset($_POST['savestsocialAndStay']))
		{
            if ($id_st_social)
				$social = new StSocialClass((int)$id_st_social);
			else
				$social = new StSocialClass();
            
		    $social->copyFromPost();  
			if ($social->validateFields(false) && $social->validateFieldsLang(false))
            {
                $shop_ids = $social->getShopIds();
                $social->clearShopIds();
                $id_shop_list = array();
                if($assos_shop = Tools::getValue('checkBoxShopAsso_st_social')) {
                    foreach ($assos_shop as $id_shop => $row) {
                        $id_shop_list[] = $id_shop;
                    }
                }
                if (!$id_shop_list) {
                    $id_shop_list = array(Context::getContext()->shop->id);
                }
                $social->id_shop_list = array_unique($id_shop_list);
                if($social->save())
                {
                    $this->clearCache();
			        if(isset($_POST['savestsocialAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_social='.$social->id.'&conf='.($id_st_social?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else {
                    $social->restoreShopIds($shop_ids);
                    $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred during social button ', array(), 'Modules.Stsocial.Admin').' '.($id_st_social ? $this->gettranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
                }   
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        
        if (isset($_POST['savesettingstsocial']) || isset($_POST['savesettingstsocialAndStay']))
        {
            $this->initSettingForm();
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
            if(!count($this->validation_errors))
            {
                if (isset($_FILES['logo_img']) && isset($_FILES['logo_img']['tmp_name']) && !empty($_FILES['logo_img']['tmp_name'])) 
                {
                    if ($vali = ImageManager::validateUpload($_FILES['logo_img'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                       $this->validation_errors[] = Tools::displayError($vali);
                    else 
                    {
                        $logo_image = $this->uploadCheckAndGetName($_FILES['logo_img']['name']);
                        if(!$logo_image)
                            $this->validation_errors[] = Tools::displayError('Image format not recognized');
                        if (!move_uploaded_file($_FILES['logo_img']['tmp_name'], _PS_UPLOAD_DIR_.$this->name.'/'.$logo_image))
                            $this->validation_errors[] = Tools::displayError('Error move uploaded file');
                        else
                            Configuration::updateValue($this->_prefix_st.'LOGO_IMG', $this->name.'/'.$logo_image);
                    }
                }
            }
            
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
            {
	            $this->clearCache();
                if(isset($_POST['savesettingstsocialAndStay']))
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&setting'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                else
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&token='.Tools::getAdminTokenLite('AdminModules'));
            }
        }
        
        if ((Tools::isSubmit('statusstsocial')))
        {
            $social = new StSocialClass((int)$id_st_social);
            if($social->id && $social->toggleStatus())
            {
                $this->clearCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if(Tools::isSubmit('addstsocial') || (Tools::isSubmit('updatestsocial') && $id_st_social))
        {
            $helper = $this->initForm();
            $this->_html .= '<script type="text/javascript">var json_st_socials='.json_encode($this->social_buttons).';</script>';
            return $this->_html.$helper->generateForm($this->fields_form);
        }
		elseif (Tools::isSubmit('deletestsocial') && $id_st_social)
		{
			$social = new StSocialClass($id_st_social);
            $social->delete();
            $this->clearCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        elseif(Tools::isSubmit('settingstsocial'))
        {
            $helper = $this->initSettingForm();
            return $this->_html.$helper->generateForm($this->fields_form);
        }
		else
		{
			$helper = $this->initList();
            $this->_html .= $helper->generateList(StSocialClass::getAll($this->context->language->id, 1), $this->fields_list);
            $helper = $this->initSettingForm();
            return $this->_html.$helper->generateForm($this->fields_form);
		}
	}
    protected function initForm()
    {
        $id_st_social = (int)Tools::getValue('id_st_social');
        $social = new StSocialClass($id_st_social);

        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Setting', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Predefined share links:', array(), 'Modules.Stsocial.Admin'),
                    'name' => 'item',
                    'onchange' => 'fillSocialButton()',
                    'options' => array(
						'query' => $this->social_buttons,
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer')
						)
					),
                    'desc' => array(
                        $this->getTranslator()->trans('You can select a predefined share link or add your own ones.', array(), 'Modules.Stsocial.Admin'),
                        $this->getTranslator()->trans('Let me use pinterest a share link as an example to explain how to add new share links.', array(), 'Modules.Stsocial.Admin'),
                        '<span style="color:#0275D8;font-size:16px;font-weight:bold;">//pinterest.com/pin/create/button/</span>?<span style="color:#5CB85C;font-size:16px;font-weight:bold;">url</span>=http://example.com&<span style="color:#F0AD4E;font-size:16px;font-weight:bold;">description</span>=productname&<span style="color:#D9534F;font-size:16px;font-weight:bold;">media</span>=http://example.com',
                        $this->getTranslator()->trans('All you have to do is to find out at least the first two parts(marked in blue and green) on the api page of the socail media which you want to add.', array(), 'Modules.Stsocial.Admin'),
                        '<a href="https://www.pinterest.com/pin/create/button/?url=https%3A%2F%2Ftransformer.sunnytoo.com%2Fen%2Ffashion%2F8-hot-new-women-s-thicken-warm-winter-coat-hood-parka-overcoat-long-jacket-outwear-1234567890123.html&media=http%3A%2F%2Fw-static2.sunnytoo.net%2F13-thickbox_default%2Fhot-new-women-s-thicken-warm-winter-coat-hood-parka-overcoat-long-jacket-outwear.jpg&description=hot%20new%20women%27s%20thicken%20warm%20winter%20coat%20hood%20parka%20overcoat%20long%20jacket%20outwear" target="_blank">Click here to see how the above link works.</a>',
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Title:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'title',
                    'lang' => true,
                    'desc' => $this->getTranslator()->trans('This will show out when mouse over.', array(), 'Modules.Stsocial.Admin'),
                ),
                array(
                    'type' => 'fontello',
                    'label' => $this->getTranslator()->trans('Icon(Rquired):', array(), 'Modules.Stsocial.Admin'),
                    'name' => 'icon_class',
                    'required' => true,
                    'values' => $this->get_fontello(),
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Sharing link(Rquired):', array(), 'Modules.Stsocial.Admin'),
                    'name' => 'url',
                    'required' => true,
                    'desc' => $this->getTranslator()->trans('This is the blue part of that sample link.', array(), 'Modules.Stsocial.Admin'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Url parameter(Rquired):', array(), 'Modules.Stsocial.Admin'),
                    'name' => 'url_key',
                    'required' => true,
                    'desc' => $this->getTranslator()->trans('This is the green part.', array(), 'Modules.Stsocial.Admin'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Description parameter:', array(), 'Modules.Stsocial.Admin'),
                    'name' => 'name_key',
                    'desc' => $this->getTranslator()->trans('This is the yellow part. Generally we use product name as description.', array(), 'Modules.Stsocial.Admin')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Image parameter:', array(), 'Modules.Stsocial.Admin'),
                    'name' => 'image_key',
                    'desc' => $this->getTranslator()->trans('This is the red part.', array(), 'Modules.Stsocial.Admin'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display this link on the sidebar:', array(), 'Modules.Stsocial.Admin'),
                    'name' => 'sidebar',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'sidebar_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'sidebar_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    'desc' => $this->getTranslator()->trans('Make sure this module has added to the sidebar in the "Sidebar" module, otherwise links would not show out.', array(), 'Modules.Stsocial.Admin'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_color',
                    'class' => 'color',
                    'size' => 20,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_bg',
                    'class' => 'color',
                    'size' => 20,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_hover_color',
                    'class' => 'color',
                    'size' => 20,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button hover background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Background opacity:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_opacity',
                    'default_value' => 0.8,
                    'validation' => 'isFloat',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
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
        
        $this->fields_form[0]['form']['input'][] = array(
            'type' => 'html',
            'id' => 'a_cancel',
            'label' => '',
            'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i>'.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
        );
        
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->id = (int)$social->id;
        $helper->table =  'st_social';
        $helper->module = $this;
        $helper->identifier = 'id_st_social';
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->submit_action = 'savestsocial';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($social),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        return $helper;
    }
    protected function initList()
    {
        $this->fields_list = array(
            'id_st_social' => array(
                'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
                'class' => 'fixed-width-md',
                'type' => 'text',
                'search' => false,
                'orderby' => false                
            ),
            'title' => array(
                'title' => $this->getTranslator()->trans('Title', array(), 'Admin.Theme.Transformer'),
                'class' => '',
                'type' => 'text',
                'search' => false,
                'orderby' => false 
            ),
            'url' => array(
                'title' => $this->getTranslator()->trans('URL', array(), 'Admin.Theme.Transformer'),
                'class' => '',
                'type' => 'text',
                'search' => false,
                'orderby' => false 
            ),
            'position' => array(
                'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
                'align' => 'center',
                'class'=>'fixed-width-xl',
                'type' => 'text',
                'search' => false,
                'orderby' => false,
            ),
            'active' => array(
                'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
                'align' => 'center',
                'active' => 'status',
                'type' => 'bool',
                'class' => 'fixed-width-sm',
                'search' => false,
                'orderby' => false 
            ),
        );

        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->module = $this;
        $helper->identifier = 'id_st_social';
        $helper->actions = array('edit', 'delete');
        $helper->show_toolbar = true;
        $helper->toolbar_btn['new'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstsocial&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Add new button', array(), 'Modules.Stsocial.Admin'),
        );
        /*$helper->toolbar_btn['edit'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&settingstsocial&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Setting', array(), 'Admin.Theme.Transformer'),
        );*/
        $helper->title = $this->displayName;
        $helper->table = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        return $helper;
    }
    
    protected function initSettingForm()
    {
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                'logo_img_field' => array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Open Grap Image:', array(), 'Modules.Stsocial.Admin'),
                    'name' => 'logo_img',
                    'desc' => $this->getTranslator()->trans('The minimum size is 200px x 200px. This image will be shown when someone shares your homepage and some other pages like new products page, searching page.', array(), 'Modules.Stsocial.Admin'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display share links in a drop down menu:', array(), 'Modules.Stsocial.Admin'),
                    'name' => 'as_drop_down',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'as_drop_down_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'as_drop_down_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Does not work for links in hover fly buttons and sidebar.', array(), 'Modules.Stsocial.Admin'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Drop down menu title:', array(), 'Modules.Stsocial.Admin'),
                    'name' => 'label',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'label_both',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Share icon + Text', array(), 'Modules.Stsocial.Admin')),
                        array(
                            'id' => 'label_name',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Text', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'label_flag',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Share icon', array(), 'Modules.Stsocial.Admin')),
                    ),
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Does not work for links in hover fly buttons and sidebar.', array(), 'Modules.Stsocial.Admin'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'links_size',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'links_size_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Samll', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'links_size_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Medium', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'links_size_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Large', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Does not work for links in hover fly buttons and sidebar.', array(), 'Modules.Stsocial.Admin'),
                ),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Facebook app ID (optional)', array(), 'Modules.Stsocial.Admin'),
					'name' => 'fb_id',
					'class' => 'fixed-width-xxl',
					'desc' => $this->getTranslator()->trans('How to get Facebook app ID: %1%.', array('%1%' => '<a href="https://developers.facebook.com/docs/apps/register" target="_blank">https://developers.facebook.com/docs/apps/register</a>'), 'Modules.Stsocial.Admin'),
                    'validation' => 'isString',
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
        
        /*$this->fields_form[0]['form']['input'][] = array(
            'type' => 'html',
            'id' => 'a_cancel',
            'label' => '',
            'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i>'.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
        );*/
        
        if ($logo_img = Configuration::get($this->_prefix_st.'LOGO_IMG'))
        {
            $this->fetchMediaServer($logo_img);
            $this->fields_form[0]['form']['input']['logo_img_field']['desc'] .= '<img width=200 src="'.($logo_img).'" /><p><a class="btn btn-default st_delete_image" href="javascript:;"><i class="icon-trash"></i> '.$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer').'</a></p>';
        }
        
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table =  $this->table;
        $helper->module = $this;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->submit_action = 'savesettingstsocial';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper;
    }
	
    public function hookDisplayHeader($params)
    {
        $result = $this->getWidgetVariables();
        $this->context->smarty->assign($result);//global must be at first place
        $has_facebook = false;
        if($result && $result['stsocial'])
        {
            $custom_css = '';
            foreach ($result['stsocial'] as $v) {
                if (strpos($v['url'], 'facebook.com') !== false) {
                    $has_facebook = true;
                }
                $prefix = '.social_share_'.$v['id_st_social'];
                if($v['btn_color'])
                    $custom_css .= $prefix.'{color:'.$v['btn_color'].'!important;}';
                if($v['btn_bg'])
                    $custom_css .= $prefix.'{background-color:'.$v['btn_bg'].'!important;}';
                if($v['btn_hover_color'])
                    $custom_css .= $prefix.':hover{color:'.$v['btn_hover_color'].'!important;}';
                if($v['btn_hover_bg'])
                    $custom_css .= $prefix.':hover{background-color:'.$v['btn_hover_bg'].'!important;}';
            }
            $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        if (!$has_facebook) {
            return;
        }
        $id_lang = Context::getContext()->language->id;
        $page_name = Dispatcher::getInstance()->getController();
        if ($page_name == 'category' && $id_category = Tools::getValue('id_category'))
        {
            $category= new Category($id_category, $id_lang);
            $image_link = $this->context->link->getCatImageLink($category->link_rewrite, $category->id_image, 'category_default');
            $this->smarty->assign(array('image_link'=>$image_link));
        }
        if($page_name == 'article' && Tools::getValue('module') == 'stblog' && $id_st_blog = Tools::getValue('id_st_blog'))
        {
            $blog = new StBlogClass($id_st_blog, $id_lang);
            $cover = StBlogImageClass::getCoverImage($id_st_blog, $id_lang, 1);
            if ($cover)
                $cover = StBlogImageClass::getImageLinks($cover,1);
            if ($blog->type == 2 && !$cover)
            {
                $galleris = StBlogImageClass::getGalleries($id_st_blog, $id_lang);
                foreach($galleris AS $gallery)
                {
                    $cover = StBlogImageClass::getImageLinks($gallery, 2);
                    break;
                }  
            }
            $this->smarty->assign(array(
                    'url' => $this->context->link->getModuleLink('stblog', 'article',array('id_st_blog'=>$blog->id,'rewrite'=>$blog->link_rewrite)),
                    'blog_image_link'=>$cover['links']['large']['image'], 
                    'meta_title'=> $blog->name,
                    'meta_description' => $blog->meta_description
                ));
        }
        if ($logo_image = Configuration::get($this->_prefix_st.'LOGO_IMG'))
        {
            $this->smarty->assign(array('logo_image_link' => _PS_BASE_URL_._THEME_PROD_PIC_DIR_.$logo_image));
        }
        global $smarty;
        $smarty->assign(array('fb_app_id' => Configuration::get($this->_prefix_st.'FB_ID')));
        return $this->display(__FILE__, 'header.tpl');
    }
    
	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'st_social_shop(id_st_social, id_shop)
		SELECT id_st_social, '.(int)$params['new_id_shop'].'
		FROM '._DB_PREFIX_.'st_social
		WHERE id_shop = '.(int)$params['old_id_shop']);
        $this->clearCache();
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
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'links_size' => Configuration::get($this->_prefix_st.'LINKS_SIZE'),
            'label' => Configuration::get($this->_prefix_st.'LABEL'),
            'as_drop_down' => Configuration::get($this->_prefix_st.'AS_DROP_DOWN'),
            'fb_id' => Configuration::get($this->_prefix_st.'FB_ID'),
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
    public function fetchMediaServer(&$image)
    {
        $image = _THEME_PROD_PIC_DIR_.$image;
        $image = context::getContext()->link->protocol_content.Tools::getMediaServer($image).$image;
    }
    public function uploadCheckAndGetName($name)
    {
        $type = strtolower(substr(strrchr($name, '.'), 1));
        if(!in_array($type, $this->imgtype))
            return false;
        $filename = Tools::encrypt($name.sha1(microtime()));
        while (file_exists(_PS_UPLOAD_DIR_.$filename.'.'.$type)) {
            $filename .= rand(10, 99);
        } 
        return $filename.'.'.$type;
    }

    public function renderWidget($hookName = null, array $configuration = [])
    {
        $this->smarty->assign($this->getWidgetVariables());

        $template = $this->templateFile[0];
        if($hookName=='displayNav1' || $hookName=='displayNav2' || $hookName=='displayNav3')
            $template = $this->templateFile[2];
        elseif(Configuration::get($this->_prefix_st.'AS_DROP_DOWN') && $hookName!='displayStBlogArticleFooter')
            $template = $this->templateFile[1];
        return $this->fetch($template);
    }
    
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $social = StSocialClass::getAll($this->context->language->id, 1);
        if(!$social)
            return false;
        return array(
            'stsocial' => $social,
            'social_links_size' => Configuration::get($this->_prefix_st.'LINKS_SIZE'),
            'social_label' => Configuration::get($this->_prefix_st.'LABEL'),
            );
    }
    /*public function bulidApi($socials=array())
    {
        $url = $product['link'];
        $image = $product['image'];
        $name = $product['name'];
        foreach($socials AS &$social) {
            $api = rtrim(trim($social['url']),'?').'?';
            $api .= trim($social['url_key']).'='.$url;
            if ($name_key = trim($social['name_key'])) {
                $api .= $name_key.'='.$name;
            }
            if ($image_key = trim($social['image_key'])) {
                $api .= $image_key.'='.$image;
            }
            $social['api_url'] = $api;
        }
    }
    public function hookDisplayRightBar($params){
        return $this->fetch('module:stsocial/views/templates/hook/stsocial-rightbar.tpl');
    }
    */
    
    public function hookDisplaySideBar($params)
    {
        return $this->fetch('module:stsocial/views/templates/hook/stsocial-side.tpl');
    }

    public function hookActionProductSearchAfter($params){
        $this->context->smarty->assign($this->getWidgetVariables());
        return ;
    }
    public function get_prefix()
    {
        if (isset($this->_prefix_st) && $this->_prefix_st)
            return $this->_prefix_st;
        return false;
    }
}