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

require_once _PS_MODULE_DIR_.'stbanner/classes/StBannerClass.php';
require_once _PS_MODULE_DIR_.'stbanner/classes/StBannerGroup.php';
require_once _PS_MODULE_DIR_.'stbanner/classes/StBannerFontClass.php';

class StBanner extends Module implements WidgetInterface
{
    protected static $access_rights = 0775;
    
    public static $location = array(
        23 => array('id' =>23 , 'name' => 'Full width top boxed', 'hook' => 'FullWidthTop', 'full_width' => 1, 'auto_height' => 1),
        26 => array('id' =>26 , 'name' => 'Full width top', 'hook' => 'FullWidthTop', 'stretched' => 1, 'full_width' => 1, 'auto_height' => 1),
        28 => array('id' =>28 , 'name' => 'Full width top 2 boxed', 'hook' => 'FullWidthTop2', 'full_width' => 1, 'auto_height' => 1),
        29 => array('id' =>29 , 'name' => 'Full width top 2', 'hook' => 'FullWidthTop2', 'stretched' => 1, 'full_width' => 1, 'auto_height' => 1),
        // 22 => array('id' =>22 , 'name' => 'Top column', 'hook' => 'TopColumn', 'auto_height' => 1),
        2 => array('id' =>2 , 'name' => 'Homepage top', 'hook' => 'HomeTop', 'auto_height' => 2),
        1 => array('id' =>1 , 'name' => 'Homepage', 'hook' => 'Home', 'auto_height' => 2),
        3 => array('id' =>3 , 'name' => 'Homepage bottom', 'hook' => 'HomeBottom', 'auto_height' => 2),
        // 4 => array('id' =>4 , 'name' => 'Homepage secondary left', 'hook' => 'HomeSecondaryLeft', 'auto_height' => 0),
        // 5 => array('id' =>5 , 'name' => 'Homepage secondary right', 'hook' => 'HomeSecondaryRight', 'auto_height' => 0),
        19 => array('id' =>19 , 'name' => 'Homepage left', 'hook' => 'HomeLeft', 'auto_height' => 0),
        20 => array('id' =>20 , 'name' => 'Homepage right', 'hook' => 'HomeRight', 'auto_height' => 0),
        30 => array('id' =>30 , 'name' => 'First quarter', 'hook' => 'HomeFirstQuarter', 'auto_height' => 0),
        31 => array('id' =>31 , 'name' => 'Second quarter', 'hook' => 'HomeSecondQuarter', 'auto_height' => 0),
        32 => array('id' =>32 , 'name' => 'Third quarter', 'hook' => 'HomeThirdQuarter', 'auto_height' => 0),
        33 => array('id' =>33 , 'name' => 'Fourth quarter', 'hook' => 'HomeFourthQuarter', 'auto_height' => 0),

        // 18 => array('id' =>18 , 'name' => 'Bottom column', 'hook' => 'BottomColumn', 'auto_height' => 1),
        24 => array('id' =>24 , 'name' => 'Full width Bottom boxed', 'hook' => 'FullWidthBottom', 'full_width' => 1, 'auto_height' => 1),
        27 => array('id' =>27 , 'name' => 'Full width Bottom', 'hook' => 'FullWidthBottom', 'stretched' => 1, 'full_width' => 1, 'auto_height' => 1),
        60 => array('id' =>60 , 'name' => 'Full width Bottom 2 boxed', 'hook' => 'FooterBefore', 'full_width' => 1, 'auto_height' => 1),
        61 => array('id' =>61 , 'name' => 'Full width Bottom 2', 'hook' => 'FooterBefore', 'stretched' => 1, 'full_width' => 1, 'auto_height' => 1),
        7 => array('id' =>7 , 'name' => 'Left column except the produt page', 'hook' => 'LeftColumn', 'auto_height' => 0, 'column'=>1),
        8 => array('id' =>8 , 'name' => 'Right column  except the produt page', 'hook' => 'RightColumn', 'auto_height' => 0, 'column'=>1),
        46 => array('id' =>46 , 'name' => 'Left column on the product page only', 'hook' => 'LeftColumnProduct', 'auto_height' => 0, 'column'=>1),
        25 => array('id' =>25 , 'name' => 'Right column on the product page only', 'hook' => 'RightColumnProduct', 'auto_height' => 0, 'column'=>1),
        35 => array('id' =>35 , 'name' => 'Product right column', 'hook' => 'ProductRightColumn', 'auto_height' => 0, 'column'=>1),
        50 => array('id' =>50 , 'name' => 'Left column on all pages', 'hook' => ''),
        51 => array('id' =>51 , 'name' => 'Right column on all pages', 'hook' => ''),
        /*
        9 => array('id' =>9 , 'name' => 'Footer'),
        10 => array('id' =>10, 'name' => 'Footer top'),
        */
        16 => array('id' =>16 , 'name' => 'At bottom of prodcut page', 'hook' => 'FooterProduct', 'auto_height' => 2),
        17 => array('id' =>17 , 'name' => 'At bottom of category page', 'hook' => 'CategoryFooter', 'auto_height' => 2),
        36 => array('id' =>36 , 'name' => 'Blog full width top', 'hook' => 'StBlogFullWidthTop', 'stretched' => 1, 'full_width' => 1, 'auto_height' => 1, 'is_blog' => 1),
        38 => array('id' =>38 , 'name' => 'Blog full width top boxed', 'hook' => 'StBlogFullWidthTop', 'full_width' => 1, 'auto_height' => 1, 'is_blog' => 1),
        12 => array('id' =>12 , 'name' => 'Blog homepage top', 'hook' => 'StBlogHomeTop', 'auto_height' => 2, 'is_blog' => 1),
        11 => array('id' =>11 , 'name' => 'Blog homepage', 'hook' => 'StBlogHome', 'auto_height' => 2, 'is_blog' => 1),
        37 => array('id' =>37 , 'name' => 'Blog full width bottom', 'hook' => 'StBlogFullWidthBottom', 'stretched' => 1, 'full_width' => 1, 'auto_height' => 1, 'is_blog' => 1),
        39 => array('id' =>39 , 'name' => 'Blog full width bottom boxed', 'hook' => 'StBlogFullWidthBottom', 'full_width' => 1, 'auto_height' => 1, 'is_blog' => 1),
        // 13 => array('id' =>13 , 'name' => 'Blog homepage bottom', 'hook' => 'StBlogHomeBottom', 'auto_height' => 2),
        14 => array('id' =>14 , 'name' => 'Blog left column', 'hook' => 'StBlogLeftColumn', 'auto_height' => 0, 'column'=>1, 'is_blog' => 1), //only left and right columns need, quarters do not need
        15 => array('id' =>15 , 'name' => 'Blog right column', 'hook' => 'StBlogRightColumn', 'auto_height' => 0, 'column'=>1, 'is_blog' => 1),
        21 => array('id' =>21 , 'name' => 'Most top of the page', 'hook' => 'Banner', 'auto_height' => 1),
    );
    public static $text_position = array(
        array('id' =>1 , 'name' => 'Top left'),
        array('id' =>2 , 'name' => 'Top center'),
        array('id' =>3 , 'name' => 'Top right'),
        array('id' =>4 , 'name' => 'Middle left'),
        array('id' =>5 , 'name' => 'Middle center'),
        array('id' =>6 , 'name' => 'Middle right'),
        array('id' =>7 , 'name' => 'Bottom left'),
        array('id' =>8 , 'name' => 'Bottom center'),
        array('id' =>9 , 'name' => 'Bottom right'),
    );
    public  $fields_list;
    public  $fields_list_group;
    public  $fields_value;
    public  $fields_form;
    public  $fields_form_banner;
    public  $fields_form_column;
	private $_html = '';
	private $spacer_size = '5';

    private $googleFonts;
        
	public function __construct()
	{
		$this->name          = 'stbanner';
		$this->tab           = 'front_office_features';
		$this->version       = '1.8.6';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap     = true;

		parent::__construct();
        
		$this->displayName   = $this->getTranslator()->trans('Advanced banner', array(), 'Modules.Stbanner.Admin');
        $this->description   = $this->getTranslator()->trans('This module is used to add banners in your shop.', array(), 'Modules.Stbanner.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
	}
            
	public function install()
	{
		$res = parent::install() &&
			$this->installDB() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('displayCMSExtra') &&
            $this->registerHook('displayCategoryHeader') &&
			$this->registerHook('actionObjectCategoryDeleteAfter') &&
            $this->registerHook('actionObjectManufacturerDeleteAfter') &&
            $this->registerHook('actionOutputHTMLBefore') &&
            $this->registerHook('actionShopDataDuplication');
		if ($res)
			foreach(Shop::getShops(false) as $shop)
				$res &= $this->sampleData($shop['id_shop']);
        $this->prepareHooks();
        $this->clearBannerCache();
        return $res;
	}
	
	/**
	 * Creates tables
	 */
	public function installDB()
	{
		/* Banners */
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_banner` (
				`id_st_banner` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				`id_st_banner_group` int(10) unsigned NOT NULL,
                `id_currency` int(10) unsigned DEFAULT 0,
                `new_window` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `description_color` varchar(7) DEFAULT NULL,
                `hide_text_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `text_position` tinyint(1) unsigned NOT NULL DEFAULT 5,
                `text_align` tinyint(1) unsigned NOT NULL DEFAULT 2,
                `bg_color` varchar(7) DEFAULT NULL,
                `btn_color` varchar(7) DEFAULT NULL,
                `btn_bg` varchar(7) DEFAULT NULL,
                `btn_hover_color` varchar(7) DEFAULT NULL,
                `btn_hover_bg` varchar(7) DEFAULT NULL,
                `text_width` tinyint(2) unsigned NOT NULL DEFAULT 0,
				PRIMARY KEY (`id_st_banner`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		/* Banners lang configuration */
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_banner_lang` (
				`id_st_banner` int(10) UNSIGNED NOT NULL,
				`id_lang` int(10) unsigned NOT NULL ,
    			`url` varchar(255) DEFAULT NULL,
                `title` varchar(255) DEFAULT NULL,
                `description` text,
                `image_multi_lang` varchar(255) DEFAULT NULL,
                `image_lang_default` varchar(255) DEFAULT NULL,
                `width` int(10) unsigned NOT NULL DEFAULT 0,
                `height` int(10) unsigned NOT NULL DEFAULT 0,
				PRIMARY KEY (`id_st_banner`, `id_lang`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_banner_font` (
                `id_st_banner` int(10) unsigned NOT NULL,
                `font_name` varchar(255) NOT NULL
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

		/* Banners group */
		$return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_banner_group` (
				`id_st_banner_group` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, 
                `id_parent` int(10) NOT NULL DEFAULT 0,     
                `name` varchar(255) DEFAULT NULL, 
                `location` int(10) unsigned NOT NULL DEFAULT 0,
                `id_category` int(10) unsigned NOT NULL DEFAULT 0,
                `id_manufacturer` int(10) unsigned NOT NULL DEFAULT 0,
                `id_cms` int(10) unsigned NOT NULL DEFAULT 0,
                `id_cms_category` int(10) unsigned NOT NULL DEFAULT 0,
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `hover_effect` tinyint(2) unsigned NOT NULL DEFAULT 1,  
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0, 
                `width` tinyint(2) unsigned NOT NULL DEFAULT 4,
                `height` int(10) unsigned NOT NULL DEFAULT 0,
                `padding` varchar(10) DEFAULT NULL,
                `top_spacing` varchar(10) DEFAULT NULL,
                `bottom_spacing` varchar(10) DEFAULT NULL,
                `left_spacing` varchar(10) DEFAULT NULL,
                `right_spacing` varchar(10) DEFAULT NULL,
                `style` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `show_on_sub` tinyint(1) unsigned NOT NULL DEFAULT 1,

                `top_padding` varchar(10) DEFAULT NULL,
                `bottom_padding` varchar(10) DEFAULT NULL,
                `bg_img` varchar(255) DEFAULT NULL,
                `bg_img_width` int(10) unsigned NOT NULL DEFAULT 0,
                `bg_img_height` int(10) unsigned NOT NULL DEFAULT 0,
                `speed` float(4,1) unsigned NOT NULL DEFAULT 0.6,
                `bg_img_v_offset` int(10) unsigned NOT NULL DEFAULT 0,
                `video_v_offset` int(10) unsigned NOT NULL DEFAULT 0,
                `video_poster` varchar(255) DEFAULT NULL,
                `mpfour` varchar(255) DEFAULT NULL,
                `webm` varchar(255) DEFAULT NULL,
                `ogg` varchar(255) DEFAULT NULL,
                `loop` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `muted` tinyint(1) unsigned NOT NULL DEFAULT 0, 
				PRIMARY KEY (`id_st_banner_group`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		/* Banners group shop */
		$return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_banner_group_shop` (
				`id_st_banner_group` int(10) UNSIGNED NOT NULL,
                `id_shop` int(11) NOT NULL,      
                PRIMARY KEY (`id_st_banner_group`,`id_shop`),    
                KEY `id_shop` (`id_shop`)   
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}
    
    public function sampleData($id_shop)
    {
        $return = true;
        $path = _MODULE_DIR_.$this->name;
		$samples = array(
			0 => array(
                'id_st_banner_group' => 0,
                'name' => 'Demo top banner',
                'id_parent' => 0,
                'style' => 0,
                'location' => 2, 
                'hide_on_mobile' => 0,
                'hover_effect' => 4,
                'width' => 0, 
                'height' => 280, 
            ),
            1 => array(
                'sample_pid' => 0,
                'id_st_banner_group' => 0,
                'name' => 'Column A',
                'id_parent' => '',
                'style' => 0,
                'location' => 0, 
                'hide_on_mobile' => 0,
                'hover_effect' => 0,
                'width' => 4, 
                'height' => 100, 
                'child' => array(
                    array(
                        'description_color' => '#ffffff',
                        'text_position' => 5,
                        'text_align' => 2,
                        'url' => '',
                        'description' => '<h4 style="font-family: \'Fjalla One\';" class="font-weight-normal">SUMBER STYLES</h4>',
                        'image_multi_lang' => $path.'/views/img/sample_l.jpg', 
                        'width' => 376,
                        'height' => 280,
                    ),
                ),
            ),
            2 => array(
                'sample_pid' => 0,
                'id_st_banner_group' => 0,
                'name' => 'Column B',
                'id_parent' => '',
                'style' => 0,
                'location' => 0, 
                'hide_on_mobile' => 0,
                'hover_effect' => 0,
                'width' => 4, 
                'height' => 100, 
                'child' => array(
                    array(
                        'description_color' => '#ffffff',
                        'text_position' => 5,
                        'text_align' => 2,
                        'url' => '',
                        'description' => '<h4 style="font-family: \'Fjalla One\';" class="font-weight-normal">SUMBER STYLES</h4>',
                        'image_multi_lang' => $path.'/views/img/sample_l.jpg', 
                        'width' => 376,
                        'height' => 280,
                    ),
                ),
            ),
            3 => array(
                'sample_pid' => 0,
                'id_st_banner_group' => 0,
                'name' => 'Column C',
                'id_parent' => '',
                'style' => 0,
                'location' => 0, 
                'hide_on_mobile' => 0,
                'hover_effect' => 0,
                'width' => 4, 
                'height' => 100, 
                'child' => array(
                    array(
                        'description_color' => '#ffffff',
                        'text_position' => 5,
                        'text_align' => 2,
                        'url' => '',
                        'description' => '<h4 style="font-family: \'Fjalla One\';" class="font-weight-normal">SUMBER STYLES</h4>',
                        'image_multi_lang' => $path.'/views/img/sample_l.jpg', 
                        'width' => 376,
                        'height' => 280,
                    ),
                ),
            ),
		);
        $parent = array();
		foreach($samples as $k=>&$sample)
		{
			$module = new StBannerGroup();
			$module->name = $sample['name'];
            if(isset($sample['sample_pid']) && key_exists($sample['sample_pid'], $parent)) {
                $id_parent = $parent[$sample['sample_pid']];
            } else {
                $id_parent = 0;
            }
            $module->id_parent = (int)$id_parent;
            $module->style = $sample['style'];
			$module->location = $sample['location'];
			$module->hide_on_mobile = $sample['hide_on_mobile'];
            $module->hover_effect = $sample['hover_effect'];
            $module->width = $sample['width'];
			$module->height = $sample['height'];
			$module->active = 1;
			$module->position = $k;
            $module->id_shop_list = array((int)$id_shop);
			$return &= $module->add();
            $parent[$k] = $module->id;
            $sample['id_st_banner_group'] = $module->id;
		}
        foreach($samples as $sp)
		{
            if(!$sp['id_st_banner_group'] || !isset($sp['child']) || !count($sp['child']))
                continue;
		    foreach($sp['child'] as $k=>$v)
    		{
    			$module = new StBannerClass();
                $module->id_st_banner_group = $sp['id_st_banner_group'];
                $module->description_color = $v['description_color'];
                $module->text_position = $v['text_position'];
    			$module->text_align = $v['text_align'];
    			$module->active = 1;
    			$module->position = $k;

    			foreach (Language::getLanguages(false) as $lang)
                {
                    $module->url[$lang['id_lang']] = $v['url'];
    				$module->description[$lang['id_lang']] = $v['description'];
                    $module->image_multi_lang[$lang['id_lang']] = $v['image_multi_lang'];
                    $module->width[$lang['id_lang']] = $v['width'];
    			    $module->height[$lang['id_lang']] = $v['height'];
                }
                
    			$return &= $module->add();
    		}
		}
		return $return;
    }
     
	public function uninstall()
	{
	    $this->clearBannerCache();
		// Delete configuration
		return $this->deleteTables() &&
			parent::uninstall();
	}

	/**
	 * deletes tables
	 */
	public function deleteTables()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_banner`,`'._DB_PREFIX_.'st_banner_lang`,`'._DB_PREFIX_.'st_banner_font`,`'._DB_PREFIX_.'st_banner_group`,`'._DB_PREFIX_.'st_banner_group_shop`');
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

	public function getContent()
	{ 
        $check_result = $this->_checkImageDir();
        $this->context->controller->addCSS(($this->_path).'views/css/admin.css');
        $this->context->controller->addJS(($this->_path).'views/js/admin.js');
        $this->googleFonts = include(_PS_MODULE_DIR_.'stthemeeditor/googlefonts.php');
        $this->_html .= '<script type="text/javascript">var googleFontsString=\''.Tools::jsonEncode($this->googleFonts).'\';</script>';
        
        $id_st_banner_group = (int)Tools::getValue('id_st_banner_group');
        $id_st_banner = (int)Tools::getValue('id_st_banner');
        
        if(Tools::getValue('act')=='delete_slider_image' && $id = Tools::getValue('st_s_id'))
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $k = Tools::getValue('st_s_k');
            
            $group = new StBannerGroup((int)$id);
            if(Validate::isLoadedObject($group))
            {
                $group->$k = '';
                if($group->save())
                {
                    $result['r'] = true;
                }
            }
            die(json_encode($result));
        }

        if(Tools::getValue('act')=='delete_image' && $id_st_banner)
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $id_lang = Tools::getValue('id_lang');
            $banner = new StBannerClass($id_st_banner, $id_lang);
            $banner->image_multi_lang = '';
            $result['r'] = $banner->save();
            die(json_encode($result));
        }
	    if ((Tools::isSubmit('groupstatusstbanner')))
        {
            $group = new StBannerGroup((int)$id_st_banner_group);
            if($group->id && $group->toggleStatus())
            {
                $this->clearBannerCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$group->id_parent.'&viewstbanner&token='.Tools::getAdminTokenLite('AdminModules'));
                //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('the status has been updated successfully.', array(), 'Admin.Theme.Transformer'));
            }
            elseif($id_st_banner)
            {
                $banner = new StBannerClass($id_st_banner);
                var_dump($banner);die;
                if ($banner->id && $banner->toggleStatus())
                {
                    $this->clearBannerCache();
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$banner->id_st_banner_group.'&viewstbanner&token='.Tools::getAdminTokenLite('AdminModules'));
                }
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
	    if ((Tools::isSubmit('bannerstatusstbanner')))
        {
            $banner = new StBannerClass((int)$id_st_banner);
            if($banner->id && $banner->toggleStatus())
            {
                //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('the status has been updated successfully.', array(), 'Admin.Theme.Transformer'));  
                $this->clearBannerCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$banner->id_st_banner_group.'&viewstbanner&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if ((Tools::isSubmit('bannerdeletestbanner')))
        {
            $banner = new StBannerClass((int)$id_st_banner);
            if($banner->id)
            {
                $id_lang = Tools::getValue('id_lang');
                foreach(Language::getLanguages(true) AS $lang)
                    if ($id_lang == $lang['id_lang'])
                    {
                        $banner->image_multi_lang[$id_lang] = '';
                        $banner->image_lang_default[$id_lang] = '';
                        $banner->width[$id_lang] = 0;
                        $banner->height[$id_lang] = 0;
                        break;
                    }
                if ($banner->save())
                {
                    //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('The image was deleted successfully.', array(), 'Admin.Theme.Transformer'));  
                    $this->clearBannerCache();
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$banner->id_st_banner_group.'&viewstbanner&conf=7&token='.Tools::getAdminTokenLite('AdminModules'));   
                }else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while delete banner.', array(), 'Admin.Theme.Transformer'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while delete banner.', array(), 'Admin.Theme.Transformer'));
        }
        if (Tools::isSubmit('way') && Tools::isSubmit('id_st_banner') && (Tools::isSubmit('position')))
		{
		    $banner = new StBannerClass((int)$id_st_banner);
            if($banner->id && $banner->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position')))
            {
                //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('the status has been updated successfully.', array(), 'Admin.Theme.Transformer'));  
                $this->clearBannerCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$banner->id_st_banner_group.'&viewstbanner&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('failed to update the position.', array(), 'Admin.Theme.Transformer'));
		}
        if (Tools::getValue('action') == 'updatePositions')
        {
            $this->processUpdatePositions();
        }
        if (Tools::isSubmit('copystbanner'))
        {
            if($this->processCopyAdvancedBannerGroup($id_st_banner_group))
            {
                $this->clearBannerCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=19&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while copy banner.', array(), 'Modules.Stbanner.Admin'));
        }
        if (isset($_POST['savestbannergroup']) || isset($_POST['savestbannergroupAndStay']))
        {
            if ($id_st_banner_group)
                $group = new StBannerGroup((int)$id_st_banner_group);
            else
                $group = new StBannerGroup();
            
            $error = array();
            $group->copyFromPost();
            
            if(!$group->name)
                $error[] = $this->displayError($this->getTranslator()->trans('The field "group name" is required', array(), 'Modules.Stbanner.Admin'));
            
            if($group->location)
            {
                $item_arr = explode('-',$group->location);
                if(count($item_arr)==2)
                {
                    $group->id_category = 0;
                    $group->location = 0;
                    $group->id_manufacturer = 0;
                    if($item_arr[0]==1)
                        $group->location = (int)$item_arr[1];
                    elseif($item_arr[0]==2)
                        $group->id_category = (int)$item_arr[1];
                    elseif($item_arr[0]==3)
                        $group->id_manufacturer = (int)$item_arr[1];
                    elseif($item_arr[0]==4)
                        $group->id_cms = (int)$item_arr[1];
                }
            }  
            
            $group->id_parent = 0;

            $res = $this->stUploadImage('bg_img');
            if(count($res['error']))
                $error = array_merge($error,$res['error']);
            elseif($res['image'])
            {
                $group->bg_img = $res['image'];
                $group->bg_img_width = $res['width'];
                $group->bg_img_height = $res['height'];
            }

            $res = $this->stUploadImage('video_poster');
            if(count($res['error']))
                $error = array_merge($error,$res['error']);
            elseif($res['image'])
            {
                $group->video_poster = $res['image'];
            }

            if (!count($error) && $group->validateFields(false))
            {
                $shop_ids = $group->getShopIds();
                $group->clearShopIds();
                $id_shop_list = array();
                if($assos_shop = Tools::getValue('checkBoxShopAsso_st_banner_group')) {
                    foreach ($assos_shop as $id_shop => $row) {
                        $id_shop_list[] = $id_shop;
                    }
                }
                if (!$id_shop_list) {
                    $id_shop_list = array(Context::getContext()->shop->id);
                }
                $group->id_shop_list = array_unique($id_shop_list);
                if($group->save())
                {
                    $this->prepareHooks();
                    $this->clearBannerCache();
                    if(isset($_POST['savestbannergroupAndStay']) || Tools::getValue('fr') == 'view')
                    {
                        $rd_str = isset($_POST['savestbannergroupAndStay']) && Tools::getValue('fr') == 'view' ? 'fr=view&update' : (isset($_POST['savestbannergroupAndStay']) ? 'update' : 'view');
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$group->id.'&conf='.($id_st_banner_group?4:3).'&'.$rd_str.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                    }      
                    else
                        $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Banner group', array(), 'Modules.Stbanner.Admin').' '.($id_st_banner_group ? $this->gettranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('added', array(), 'Admin.Theme.Transformer')));
                }                    
                else {
                    $group->restoreShopIds($shop_ids);
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during banner group', array(), 'Modules.Stbanner.Admin').' '.($id_st_banner_group ? $this->gettranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
                }  
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
            $this->clearBannerCache();
        }
		if (isset($_POST['savestbannercolumn']) || isset($_POST['savestbannercolumnAndStay']))
		{
            if ($id_st_banner_group)
				$group = new StBannerGroup((int)$id_st_banner_group);
			else
				$group = new StBannerGroup();
            
            $error = array();
    		$group->copyFromPost();
            
            if(!$group->name)
                $error[] = $this->displayError($this->getTranslator()->trans('the field "Banner group name" is required', array(), 'Modules.Stbanner.Admin'));

            if(!$group->id_parent)
                $error[] = $this->displayError($this->getTranslator()->trans('The field "Parent" is required', array(), 'Modules.Stbanner.Admin'));
            
			if (!count($error) && $group->validateFields(false))
            {
                if($group->save())
                {
                    $this->clearBannerCache();
                    if(isset($_POST['savestbannercolumnAndStay']) || Tools::getValue('fr') == 'view')
                    {
                        $rd_str = isset($_POST['savestbannercolumnAndStay']) && Tools::getValue('fr') == 'view' ? 'fr=view&update' : (isset($_POST['savestbannercolumnAndStay']) ? 'update' : 'view');
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$group->id.'&conf='.($id_st_banner_group?4:3).'&'.$rd_str.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                    }      
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$group->id_parent.'&viewstbanner&token='.Tools::getAdminTokenLite('AdminModules'));
                }                    
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during column', array(), 'Modules.Stbanner.Admin').' '.($id_st_banner_group ? $this->gettranslator()->trans('updating', array(), 'Modules.Stbanner.Admin') : $this->gettranslator()->trans('creation', array(), 'Modules.Stbanner.Admin')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
            $this->clearBannerCache();
        }
		if (isset($_POST['savestbanner']) || isset($_POST['savestbannerAndStay']))
		{
            if ($id_st_banner)
				$banner = new StBannerClass((int)$id_st_banner);
			else
				$banner = new StBannerClass();
            /**/
            
            $error = array();
            
		    $banner->copyFromPost();
            if(!$banner->id_st_banner_group)
                $error[] = $this->displayError($this->getTranslator()->trans('the field "banner group" is required', array(), 'Modules.Stbanner.Admin'));
            else
            {
                $languages = Language::getLanguages(false);
                $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
             
                $res = $this->stUploadImage('image_multi_lang_'.$default_lang);
                if(count($res['error']))
                    $error = array_merge($error,$res['error']);
                elseif($res['image'])
                {
                    $banner->image_multi_lang[$default_lang] = $res['image'];
                    $banner->image_lang_default[$default_lang] = $res['image'];
                    $banner->width[$default_lang] = $res['width'];
                    $banner->height[$default_lang] = $res['height'];
                }
                
                foreach ($languages as $lang)
                {
                    if($lang['id_lang']==$default_lang)
                        continue;
                    $banner->image_lang_default[$lang['id_lang']] = $banner->image_multi_lang[$default_lang];
                    $banner->width[$lang['id_lang']] = $banner->width[$default_lang];
                    $banner->height[$lang['id_lang']] = $banner->height[$default_lang];
                    $res = $this->stUploadImage('image_multi_lang_'.$lang['id_lang']);
                    if(count($res['error']))
                        $error = array_merge($error,$res['error']);
                    elseif($res['image'])
                    {
                        $banner->image_multi_lang[$lang['id_lang']] = $res['image'];
                        $banner->width[$lang['id_lang']] = $res['width'];
                        $banner->height[$lang['id_lang']] = $res['height'];
                    }
                }
            }
                        
			if (!count($error) && $banner->validateFields(false) && $banner->validateFieldsLang(false))
            {
                /*position*/
                $banner->position = $banner->checkPosition();
                if($banner->save())
                {
                    $jon = trim(Tools::getValue('google_font_name'),'¤');
                    StBannerFontClass::deleteBySlider($banner->id);
                    $jon_arr = array_unique(explode('¤', $jon));
                    if (count($jon_arr))
                        StBannerFontClass::changeSliderFont($banner->id, $jon_arr);

                    $this->clearBannerCache();
                    //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Banner', array(), 'Modules.Stbanner.Admin').' '.($id_st_banner ? $this->gettranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('added', array(), 'Admin.Theme.Transformer')));
			        if(isset($_POST['savestbannerAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner='.$banner->id.'&conf='.($id_st_banner?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$banner->id_st_banner_group.'&viewstbanner&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during banner', array(), 'Modules.Stbanner.Admin').' '.($id_st_banner ? $this->gettranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        
		if (Tools::isSubmit('addstbannergroup') || Tools::isSubmit('addstbannercolumn') || (Tools::isSubmit('updatestbanner') && $id_st_banner_group))
		{
            if($id_st_banner_group)
                $group = new StBannerGroup($id_st_banner_group);
            if(Tools::isSubmit('addstbannergroup') || (isset($group) && $group->id_parent==0))
            {
                $helper = $this->initForm();
                return $helper->generateForm($this->fields_form);
            }

            if(Tools::isSubmit('addstbannercolumn') || (isset($group) && $group->id_parent))
            {
                $helper = $this->initFormColumn();
                $this->_html .= $this->getNavigate($id_st_banner_group?$id_st_banner_group:Tools::getValue('id_parent'));
                return $this->_html.$helper->generateForm($this->fields_form_column);
            }
		}
        elseif(Tools::isSubmit('addstbanner') || (Tools::isSubmit('updatestbanner') && $id_st_banner))
        {
            $helper = $this->initFormBanner();
            $this->_html .= $this->getNavigate($helper->tpl_vars['fields_value']['id_st_banner_group']);
            return $this->_html.$helper->generateForm($this->fields_form_banner);
        }
        elseif(Tools::isSubmit('viewstbanner'))
        {
            $this->_html .= '<script type="text/javascript">var currentIndex="'.AdminController::$currentIndex.'&configure='.$this->name.'";</script>';
			$group = new StBannerGroup($id_st_banner_group);
            if($group->id_parent==0 && !$group->isAssociatedToShop())
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            $this->_html .= $this->getNavigate($id_st_banner_group);
            $add_column_botton = '<div class="panel"><a class="btn btn-primary" href="'.AdminController::$currentIndex.'&configure='.$this->name.
                '&addstbannercolumn&id_parent='.$id_st_banner_group.'&token='.Tools::getAdminTokenLite('AdminModules').'">'.
                $this->getTranslator()->trans('Create a new column', array(), 'Modules.Stbanner.Admin').
                '</a></div>';
            if($group->hasColumn()) {
                $helper_group = $this->initListColumn();
                $this->_html .= $add_column_botton.$helper_group->generateList(StBannerGroup::recurseTree($group->id,0,0,0), $this->fields_list_group);
            } else {
                $helper = $this->initListBanner();
                $list = StBannerClass::getAll($id_st_banner_group,(int)$this->context->language->id);
                if (count($list)) {
                    unset($helper->toolbar_btn['new']);
                    $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Each column just has one banner only.', array(), 'Modules.Stbanner.Admin'));
                } else {
                    $this->_html .= $add_column_botton;
                }
                $this->_html .= $helper->generateList($list, $this->fields_list);
            }
			return $this->_html;
        }
		else if (Tools::isSubmit('deletestbanner') && $id_st_banner)
		{
			$banner = new StBannerClass($id_st_banner);
            $banner->delete();
            $this->clearBannerCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$banner->id_st_banner_group.'&viewstbanner&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else if (Tools::isSubmit('deletestbanner') && $id_st_banner_group)
		{
			$group = new StBannerGroup($id_st_banner_group);
            $subs = $group->recurseToArray($id_st_banner_group, 0);
            if ($group->delete()) {
                if (!$group->hasMultishopEntries()) {
                    foreach($subs AS $v) {
                        $group = new StBannerGroup($v['id_st_banner_group']);
                        foreach(StBannerClass::getAll($v['id_st_banner_group'], $this->context->language->id) AS $_v) {
                            $banner = new StBannerClass($_v['id_st_banner']);
                            $banner->delete();
                        }
                        $group->delete();
                    }    
                }
            }
            $this->prepareHooks();
            $this->clearBannerCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($group->id_parent?'&viewstbanner&id_st_banner_group='.$group->id_parent:'').'&token='.Tools::getAdminTokenLite('AdminModules'));
		} elseif (Tools::isSubmit('submitBulkdeletestbanner') && ($id_array = Tools::getValue('stbannerBox'))) {
            $deleted = false;
            foreach($id_array as $id) {
                $group = new StBannerGroup($id);
                $subs = $group->recurseToArray($id, 0);
                if ($group->delete()) {
                    if (!$group->hasMultishopEntries()) {
                        foreach($subs AS $v) {
                            $group = new StBannerGroup($v['id_st_banner_group']);
                            foreach(StBannerClass::getAll($v['id_st_banner_group'], $this->context->language->id) AS $_v) {
                                $banner = new StBannerClass($_v['id_st_banner']);
                                $banner->delete();
                            }
                            $group->delete();
                        }    
                    }
                    $deleted = true;
                }
            }
            if ($deleted) {
                $this->prepareHooks();
                $this->clearBannerCache();
            }
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }
		else
		{
			$helper = $this->initList();
			return $this->_html.$helper->generateList(StBannerGroup::recurseTree(0,0,0,0), $this->fields_list);
		}
	}
    protected function stUploadImage($item)
    {
        $result = array(
            'error' => array(),
            'image' => '',
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
				$this->_checkEnv();
				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
				$salt = $name ? Tools::str2url($name) : sha1(microtime());
                $c_name = $salt;
				if ($upload_error = ImageManager::validateUpload($_FILES[$item]))
					$result['error'][] = $upload_error;
				elseif (!$temp_name || !move_uploaded_file($_FILES[$item]['tmp_name'], $temp_name))
					$result['error'][] = $this->getTranslator()->trans('An error occurred during the image upload.', array(), 'Modules.Stbanner.Admin');
				else{
				   $infos = getimagesize($temp_name);
                   if(!ImageManager::resize($temp_name, _PS_UPLOAD_DIR_.$this->name.'/'.$c_name.'.'.$type, null, null, $type))
				       $result['error'][] = $this->getTranslator()->trans('An error occurred during the image upload.', array(), 'Admin.Theme.Transformer');
				} 
				if (isset($temp_name))
					@unlink($temp_name);
                    
                if(!count($result['error']))
                {
                    $result['image'] = $this->name.'/'.$c_name.'.'.$type;
                    $result['width'] = $imagesize[0];
                    $result['height'] = $imagesize[1];
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
    public static function getApplyTo()
    {
        $module = new StBanner();
        $location = array();
        foreach(self::$location as $v)
            $location[] = array('id'=>'1-'.$v['id'],'name'=>$v['name']);
            
        $root_category = Category::getRootCategory();
        $category_arr = array();
        $module->getCategoryOption($category_arr,$root_category->id);
                    
        $cms_arr = array();
		$module->getCMSOptions($cms_arr, 0, 1);
            
        $manufacturer_arr = array();
		$manufacturers = Manufacturer::getManufacturers(false, Context::getContext()->language->id);
		foreach ($manufacturers as $manufacturer)
            $manufacturer_arr[] = array('id'=>'3-'.$manufacturer['id_manufacturer'],'name'=>$manufacturer['name']);
                
        return array(
            array('name'=>$module->getTranslator()->trans('Hook', array(), 'Admin.Theme.Transformer'),'query'=>$location),
            array('name'=>$module->getTranslator()->trans('Categories', array(), 'Admin.Theme.Transformer'),'query'=>$category_arr),
            array('name'=>$module->getTranslator()->trans('CMS', array(), 'Admin.Theme.Transformer'),'query'=>$cms_arr),
            array('name'=>$module->getTranslator()->trans('Manufacturers', array(), 'Admin.Theme.Transformer'),'query'=>$manufacturer_arr),
        );
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
            'id' => '2-'.$category->id,
            'name' => (isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')',
        );
        
		if (isset($children) && count($children))
			foreach ($children as $child)
			{
				$this->getCategoryOption($category_arr,(int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],$recursive);
			}
	}
    
    private function getCMSOptions(&$cms_arr, $parent = 0, $depth = 1, $id_lang = false)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

		//$categories = $this->getCMSCategories(false, (int)$parent, (int)$id_lang);
		$pages = $this->getCMSPages((int)$parent, false, (int)$id_lang);

		$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$depth);

		/*foreach ($categories as $category)
		{
            $cms_arr[] = array('id'=>'5-'.$category['id_cms_category'],'name'=>$spacer.$category['name']);
			$this->getCMSOptions($cms_arr, $category['id_cms_category'], (int)$depth + 1, (int)$id_lang);
		}*/

		foreach ($pages as $page)
            $cms_arr[] = array('id'=>'4-'.$page['id_cms'],'name'=>$spacer.$page['meta_title']);
	}

    private function getCMSCategories($recursive = false, $parent = 1, $id_lang = false)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
        $id_shop = (int)Context::getContext()->shop->id;

		if ($recursive === false)
        {
            if(version_compare(_PS_VERSION_, '1.6.0.12', '>='))
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
            else
                $sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
                FROM `'._DB_PREFIX_.'cms_category` bcp
                INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
                ON (bcp.`id_cms_category` = cl.`id_cms_category`)
                WHERE cl.`id_lang` = '.(int)$id_lang.'
                AND bcp.`id_parent` = '.(int)$parent;

            return Db::getInstance()->executeS($sql);
        }
        else
        {
            if(version_compare(_PS_VERSION_, '1.6.0.12', '>='))
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
            else
                $sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
                FROM `'._DB_PREFIX_.'cms_category` bcp
                INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
                ON (bcp.`id_cms_category` = cl.`id_cms_category`)
                WHERE cl.`id_lang` = '.(int)$id_lang.'
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
			WHERE '.($id_cms_category?'c.`id_cms_category` = '.(int)$id_cms_category:'1').'
            AND cs.`id_shop` = '.(int)$id_shop.
            (version_compare(_PS_VERSION_, '1.6.0.12', '>=') ? ' AND cl.`id_shop` = '.(int)$id_shop : '' ).' 
			AND cl.`id_lang` = '.(int)$id_lang.'
			AND c.`active` = 1
			ORDER BY `position`';

		return Db::getInstance()->executeS($sql);
	}
        
    protected function initForm()
    {
        $id_st_banner_group = (int)Tools::getValue('id_st_banner_group');
        $group = new StBannerGroup($id_st_banner_group);

        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Group configuration', array(), 'Modules.Stbanner.Admin'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Group name:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'name',
                    'size' => 64,
                    'required'  => true,
                ),
                'location' => array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Show on:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'location',
                    'options' => array(
                        'optiongroup' => array (
                            'query' => $this->getApplyTo(),
                            'label' => 'name'
                        ),
                        'options' => array (
                            'query' => 'query',
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    'desc' => '<div class="alert alert-info"><a href="javascript:;" onclick="$(\'#des_page_layout\').toggle();return false;">'.$this->getTranslator()->trans('click here to see hook position', array(), 'Admin.Theme.Transformer').'</a>'.
                        '<div id="des_page_layout" style="display:none;"><img src="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" /></div></div>',
                ),
				array(
					'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Type:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'style',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'style_1',
                            'value' => 1,
                            'label' => $this->getTranslatOr()->trans('Simple. Banners might be uneven on Mobile devices. All "Height" settiNgs will be ignored. the dimensions of images are important, refer to the Documenation to learn how to get the correct dimensions.', array(), 'Modules.Stbanner.Admin')
                        ),
                        array(
                            'id' => 'style_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Advanced. Images will be scaled to cover banner areas, which means some parts of image may not be visiable, the bright side is that you do not have to pay much attention to the dimensions of images.', array(), 'Modules.Stbanner.Admin')
                        ),
                    ),
                ),   
				array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('Show on subcategories:', array(), 'Modules.Stbanner.Admin'),
					'name' => 'show_on_sub',
                    'default_value' => 1,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'show_on_sub_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
						array(
							'id' => 'show_on_sub_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
					),
                    'desc' => $this->getTranslator()->trans('actually just apply to categories.', array(), 'Modules.Stbanner.Admin')
				),    
                array(                    
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Height:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'height',
                    'default_value' => 200,
                    'required' => true,
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => array(
                        $this->getTranslator()->trans('This field is required for advanced banners.', array(), 'Modules.Stbanner.Admin'),
                        $this->getTranslator()->trans('The value of this field is used to equal the height of banners.', array(), 'Modules.Stbanner.Admin'),
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Space between banners:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'padding',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'top_padding',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bottom_padding',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'top_spacing',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value 8.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bottom_spacing',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value 8.', array(), 'Admin.Theme.Transformer'),
                ),

                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Left spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'left_spacing',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Right spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'right_spacing',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Hover effect:', array(), 'Modules.Stbanner.Admin'),
                    'name' => 'hover_effect',
                    'default_value' => 4,
                    'values' => array(
                        array(
                            'id' => 'hover_effect_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('None', array(), 'Modules.Stbanner.Admin')
                        ),
                        array(
                            'id' => 'hover_effect_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Fade & scale', array(), 'Modules.Stbanner.Admin')
                        ),
                        array(
                            'id' => 'hover_effect_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('White line', array(), 'Modules.Stbanner.Admin')
                        ),
                        array(
                            'id' => 'hover_effect_3',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('White block', array(), 'Modules.Stbanner.Admin')
                        ),
                        array(
                            'id' => 'hover_effect_4',
                            'value' => 4,
                            'label' => $this->getTranslator()->trans('Fade', array(), 'Modules.Stbanner.Admin')
                        ),
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
                    'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
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

        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Parallax background image', array(), 'Modules.Stbanner.Admin'),
                'icon' => 'icon-cogs'                
            ),
            'description' => $this->getTranslator()->trans('Parallax background image feature can not work fine on mobile devices, so it will be disalbed on mobile devices, the background image you uploaded below will be displayed as a static, centered background image, no parallax effect.', array(), 'Modules.Stbanner.Admin'),
            'input' => array(
                'bg_img_field' => array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Background image:', array(), 'Modules.Stbanner.Admin'),
                    'name' => 'bg_img',
                    'desc' => array(
                            $this->getTranslator()->trans('Generally a background image should be higher that the height of this block.', array(), 'Modules.Stbanner.Admin'),
                        ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Parallax speed factor:', array(), 'Modules.Stbanner.Admin'),
                    'name' => 'speed',
                    'default_value' => 0.2,
                    'desc' => $this->getTranslator()->trans('Speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling.', array(), 'Modules.Stbanner.Admin'),
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Background image vertical offset:', array(), 'Modules.Stbanner.Admin'),
                    'name' => 'bg_img_v_offset',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px',
                    'desc' => array(
                            $this->getTranslator()->trans('Unsigned int, like 0, 110, 300.', array(), 'Modules.Stbanner.Admin'),
                            $this->getTranslator()->trans('This field is used to move the backgroumd image up.', array(), 'Modules.Stbanner.Admin')
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
        $this->fields_form[2]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Video background', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'                
            ),
            'description' => $this->getTranslator()->trans('Video background feature can not work on both Android and IOS devices, which is due to restrictions on autoplay and performance, so you also need to upload a video thumbnail, the thumbnail will be displayed on mobile devices.', array(), 'Admin.Theme.Transformer'),
            'input' => array(
                'video_poster_field' => array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Video thumbnail image(Required):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'video_poster',
                    'desc' => array(
                            $this->getTranslator()->trans('Upload a image here, it will be displayed on mobile devices, because of the video background feature can not work on mobile devices, otherwise a transparent background will be apply to this block on mobile devices.', array(), 'Admin.Theme.Transformer'),
                        ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('MP4 format(Required):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'mpfour',
                    'size' => 64,
                    'desc' => array(
                        $this->getTranslator()->trans('Example: http://www.yourdomain.com/video.mp4', array(), 'Admin.Theme.Transformer'),
                        $this->getTranslator()->trans('MP4 is supported by major browsers like Firefox, Opera, Chrome, Safari and Internet Explorer 9+. So you do not have to prepare .webm and .ogv, it is okay to leave the follow to fields empty.', array(), 'Admin.Theme.Transformer'),
                        $this->getTranslator()->trans('You can convert your videos online or using tools like "Miro Video Converter" to convert them into different formats.', array(), 'Admin.Theme.Transformer'),
                        ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('WebM format(Optional):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'webm',
                    'size' => 64,
                    'desc' => array(
                            $this->getTranslator()->trans('Example: http://www.yourdomain.com/video.webm, Firefox, Chrome and Opera prefer WebM / Ogg formats', array(), 'Admin.Theme.Transformer'),
                        ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Ogv or ogg format(Optional):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'ogg',
                    'size' => 64,
                    'desc' => array(
                        $this->getTranslator()->trans('Example: http://www.yourdomain.com/video.ogv, Firefox, Chrome and Opera prefer WebM / Ogv formats', array(), 'Admin.Theme.Transformer'),
                        ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Loop:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'loop',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'loop_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'loop_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Muted:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'muted',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'muted_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'muted_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Video vertical offset:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'video_v_offset',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => '%',
                    'desc' => array(
                            $this->getTranslator()->trans('From 0 to 100', array(), 'Admin.Theme.Transformer'),
                            $this->getTranslator()->trans('This field is used to move the video up.', array(), 'Admin.Theme.Transformer')
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
        
        if($group->id)
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_banner_group');
            if ($group->bg_img)
            {
                $image_url = $group->bg_img;
                $this->fetchMediaServer($image_url);
                $this->fields_form[1]['form']['input']['bg_img_field']['desc'][] = '<div class="image_thumb_block"><img src="'.($image_url).'" width="300" /><div><a class="btn btn-default delete_slider_image" href="javascript:;" data-s_id="'.(int)$group->id.'" data-s_k="bg_img"><i class="icon-trash"></i> '.$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer').'</a></div></div>';
            }
            if ($group->video_poster)
            {
                $image_url = $group->video_poster;
                $this->fetchMediaServer($image_url);
                $this->fields_form[2]['form']['input']['video_poster_field']['desc'][] = '<div class="image_thumb_block"><img src="'.($image_url).'" width="300" /><div><a class="btn btn-default delete_slider_image" href="javascript:;" data-s_id="'.(int)$group->id.'" data-s_k="video_poster"><i class="icon-trash"></i> '.$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer').'</a></div></div>';
            }
        }
        
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->id = (int)$group->id;
        $helper->table =  'st_banner_group';
        $helper->identifier = 'id_st_banner_group';
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->submit_action = 'savestbannergroup';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($group),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        if($group->id)
            $helper->tpl_vars['fields_value']['location'] = $group->location ? '1-'.$group->location : 
                ($group->id_category ? '2-'.$group->id_category : 
                    ($group->id_cms ? '4-'.$group->id_cms : '3-'.$group->id_manufacturer));

        return $helper;
    }
	protected function initFormColumn()
	{
        $id_st_banner_group = (int)Tools::getValue('id_st_banner_group');
		$group = new StBannerGroup($id_st_banner_group);

        if(Validate::isLoadedObject($group))
            $id_parent = $group->id_parent;

        if(!isset($id_parent))
        {
            if(Tools::getValue('id_parent'))
                $id_parent = (int)Tools::getValue('id_parent');
            else
                $id_parent = 0;
        }

		$this->fields_form_column[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Column configuration', array(), 'Modules.Stbanner.Admin'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Column name:', array(), 'Modules.Stbanner.Admin'),
					'name' => 'name',
                    'size' => 64,
                    'required'  => true,
                    'desc' => $this->getTranslator()->trans('Only as a reminder:', array(), 'Modules.Stbanner.Admin'),
				),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'width',
                    'options' => array(
                        'query' => array(
                                array('id'=>1, 'name'=> '1/12'),
                                array('id'=>2, 'name'=> '2/12'),
                                array('id'=>3, 'name'=> '3/12'),
                                array('id'=>5, 'name'=> '5/12'),
                                array('id'=>6, 'name'=> '6/12'),
                                array('id'=>7, 'name'=> '7/12'),
                                array('id'=>8, 'name'=> '8/12'),
                                array('id'=>9, 'name'=> '9/12'),
                                array('id'=>10, 'name'=> '10/12'),
                                array('id'=>11, 'name'=> '11/12'),
                                array('id'=>12, 'name'=> '12/12'),
                            ),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 4,
                            'label' => '4/12',
                        ),
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Height:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'height',
                    'options' => array(
                        'query' => array(
                                array('id'=>20, 'name'=> '20%'),
                                array('id'=>25, 'name'=> '25%'),
                                array('id'=>30, 'name'=> '30%'),
                                array('id'=>33, 'name'=> '33%'),
                                array('id'=>40, 'name'=> '40%'),
                                array('id'=>50, 'name'=> '50%'),
                                array('id'=>60, 'name'=> '60%'),
                                array('id'=>66, 'name'=> '66%'),
                                array('id'=>70, 'name'=> '70%'),
                                array('id'=>75, 'name'=> '75%'),
                                array('id'=>80, 'name'=> '80%'),
                            ),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 100,
                            'label' => '100%',
                        ),
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
                    'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
                ),
                array(
					'type' => 'hidden',
					'name' => 'id_parent',
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
        
        $this->fields_form_column[0]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
            'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$id_parent.'&viewstbanner&token='.
                Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                    
		);
        
        if($group->id)
        {
            $this->fields_form_column[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_banner_group');
        }
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->id = (int)$group->id;
		$helper->table =  'st_banner_group';
		$helper->identifier = 'id_st_banner_group';
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->submit_action = 'savestbannercolumn';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($group, "fields_form_column"),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
        $helper->tpl_vars['navigate'] = $this->getNavigate($id_st_banner_group);
        $helper->tpl_vars['fields_value']['id_parent'] = (int)$id_parent;

		return $helper;
	}
	protected function initFormBanner()
	{        
        $id_st_banner = (int)Tools::getValue('id_st_banner');
        $banner = new StBannerClass($id_st_banner);
        if(Validate::isLoadedObject($banner))
        {
            $group = new StBannerGroup($banner->id_st_banner_group);
        }
        elseif ($id_st_banner_group = (int)Tools::getValue('id_st_banner_group')) {
            $group = new StBannerGroup($id_st_banner_group);
        }

        if(!Validate::isLoadedObject($group))
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));

        $id_parent = $group->id_parent;

        $google_font_name_html = $google_font_name =  $google_font_link = '';
        if(Validate::isLoadedObject($banner)){
            $jon_arr = StBannerFontClass::getBySlider($banner->id);
            if(is_array($jon_arr) && count($jon_arr))
                foreach ($jon_arr as $key => $value) {
                    $google_font_name_html .= '<li id="#'.str_replace(' ', '_', strtolower($value['font_name'])).'_li" class="form-control-static"><button type="button" class="delGoogleFont btn btn-default" name="'.$value['font_name'].'"><i class="icon-remove text-danger"></i></button>&nbsp;<span style="'.$this->fontstyles($value['font_name']).'">style="'.$this->fontstyles($value['font_name']).'"</span></li>';

                    $google_font_name .= $value['font_name'].'¤';

                    $google_font_link .= '<link id="'.str_replace(' ', '_', strtolower($value['font_name'])).'_link" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.str_replace(' ', '+', $value['font_name']).'" />';
                }
        }

		$this->fields_form_banner[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Banner item', array(), 'Modules.Stbanner.Admin'),
                'icon' => 'icon-cogs'
			),
            
			'input' => array(
                array(
					'type' => 'text',
					'label' => $this->getTranslAtor()->trans('Title(Image alt):', array(), 'Modules.Stbanner.Admin'),
					'name' => 'title',
                    'size' => 64,
                    'lang' => true,               
				),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Link:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'url',
                    'size' => 64,
                    'lang' => true,
                    'desc' => '<strong>'.$this->getTranslator()->trans('If this field is filled in, whole image will become clickable. But if there are any links or buttons in the Caption field, this setting will be ignored.', array(), 'Modules.Stbanner.Admin').'</strong>',
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
                    'type' => 'hidden',
                    'name' => 'id_st_banner_group',
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
        $this->fields_form_banner[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Add caption', array(), 'Modules.Stbanner.Admin'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                 array(
                    'type' => 'textarea',
                    'label' => $this->getTranslator()->trans('Caption:', array(), 'Admin.Theme.Transformer'),
                    'lang' => true,
                    'name' => 'description',
                    'cols' => 40,
                    'rows' => 10,
                    'autoload_rte' => true,
                    // 'class' => 'manual_rte',
                    'desc' => $this->getTranslator()->trans('In most case, content from the advanced editor are in white color, so you can not see them. Clicking on the Source Code btton to see them.', array(), 'Modules.Stbanner.Admin'),
                ),
                array(
                    'type' => 'go_to_adv_editor',
                    'label' => '',
                    'name' => Context::getContext()->link->getModuleLink(
                                'stbanner', 'adveditor', array('adveditor_target'=>'description')),
                    'name_blank' => Context::getContext()->link->getModuleLink(
                                'stbanner', 'adveditor', array('adveditor_window'=>'blank','adveditor_target'=>'description')),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Google fonts:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'google_font_select',
                    'onchange' => 'handle_font_change(this);',
                    'class' => 'fontOptions',
                    'options' => array(
                        'query' => $this->fontOptions(),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer'),
                        ),
                    ),
                ),
                'font_text'=>array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Font weight:', array(), 'Admin.Theme.Transformer'),
                    'onchange' => 'handle_font_style(this);',
                    'class' => 'fontOptions',
                    'name' => 'google_font_weight',
                    'options' => array(
                        'query' => array(),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isAnything',
                    'desc' => '<p>'.$this->getTranslator()->trans('once a font has been added, you can use it everywhere without adding it again.', array(), 'Modules.Stbanner.Admin').'</p><a id="add_google_font" class="btn btn-default btn-block fixed-width-md" href="javascript:;">Add</a><br/><p id="google_font_example" class="fontshow">Example Title</p><ul id="curr_google_font_name">'.$google_font_name_html.'</ul>'.$google_font_link,
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'google_font_name',
                    'default_value' => '',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Caption color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'description_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->gettranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_color',
                    'size' => 33,
                    'desc' => $this->getTranslator()->trans('This setting does not work for content from Advanced editor:', array(), 'Modules.Stbanner.Admin'),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Caption width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_width',
                    'options' => array(
                        'query' => array(
                                array('id' => 11, 'name'=>'10%'),
                                array('id' => 21, 'name'=>'20%'),
                                array('id' => 31, 'name'=>'30%'),
                                array('id' => 41, 'name'=>'40%'),
                                array('id' => 51, 'name'=>'50%'),
                                array('id' => 61, 'name'=>'60%'),
                                array('id' => 71, 'name'=>'70%'),
                                array('id' => 81, 'name'=>'80%'),
                                array('id' => 91, 'name'=>'90%'),
                            ),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => '0',
                            'label' => '100%'
                        )
                    ),
                    'desc' => $this->getTranslator()->trans('This setting does not work for content from Advanced editor:', array(), 'Modules.Stbanner.Admin'),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_position',
                    'default_value' => 5,
                    'options' => array(
                        'query' => self::$text_position,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'desc' => $this->getTranslator()->trans('This setting does not work for content from Advanced editor:', array(), 'Modules.Stbanner.Admin'),
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Hide caption on small screen devices:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'hide_text_on_mobile',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'hide_text_on_mobile_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_text_on_mobile_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'desc' => $this->gettranslator()->trans('Screen width < 768px.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Text alignment:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_align',
                    'default_value' => 2,
                    'values' => array(
                        array(
                            'id' => 'text_align_left',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_center',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_right',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('button background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_bg',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_hover_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('button hover background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_hover_bg',
                    'size' => 33,
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

        $languages = Language::getLanguages(true);            
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        foreach ($languages as $lang)
        {
            $this->fields_form_banner[0]['form']['input']['image_multi_lang_'.$lang['id_lang']] = array(
                    'type' => 'file',
					'label' => $this->getTranslator()->trans('Image', array(), 'Admin.Theme.Transformer').' - '.$lang['name'].($default_lang == $lang['id_lang'] ? '('.$this->gettranslator()->trans('default language', array(), 'Admin.Theme.Transformer').')' : '').':',
					'name' => 'image_multi_lang_'.$lang['id_lang'],
                    'desc' => $this->getTranslator()->trans('please ensure the image name is unique, or it will override the same name files.', array(), 'Modules.Stbanner.Admin').'<br/>',
                );
        }
        if($banner->id)
        {
            $this->fields_form_banner[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_banner');
             foreach ($languages as $lang)
                if($banner->image_multi_lang[$lang['id_lang']])
                {
                    StBannerClass::fetchMediaServer($banner->image_multi_lang[$lang['id_lang']]);
                    $this->fields_form_banner[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'has_image_'.$lang['id_lang'], 'default_value'=>1);
                    $this->fields_form_banner[0]['form']['input']['image_multi_lang_'.$lang['id_lang']]['required'] = false;
                    $this->fields_form_banner[0]['form']['input']['image_multi_lang_'.$lang['id_lang']]['desc'] = '<img src="'.$banner->image_multi_lang[$lang['id_lang']].'" width="200"/>'.
                    ($lang['id_lang'] != $default_lang ? '<p><a class="btn btn-default st_delete_image" data-id="'.$banner->id.'" data-lang="'.(int)$lang['id_lang'].'" href="javascript:;"><i class="icon-trash"></i> '.$this->getTranslator()->trans(' Delete', array(), 'Admin.Theme.Transformer').'</a></p>' : '');
                }
        }
            
        $this->fields_form_banner[0]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel_0',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$group->id.'&viewstbanner&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a><a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.
                Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i>'.$this->getTranslator()->trans('Back to main page', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        $this->fields_form_banner[1]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel_1',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_banner_group='.$group->id.'&viewstbanner&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a><a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.
                Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i>'.$this->getTranslator()->trans('Back to main page', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestbanner';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($banner,"fields_form_banner"),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
        $helper->tpl_vars['fields_value']['id_st_banner_group'] = (int)$group->id;
        $helper->tpl_vars['fields_value']['google_font_name'] = $google_font_name;
        
		return $helper;
	}
    public static function showShortCode($value,$row)
    {
        return '<label data-html="true" data-toggle="tooltip" class="label-tooltip" data-original-title="'.
            Context::getContext()->getTranSlator()->trans('You can copy the short code to anywhere to show the banner if need.', array(), 'Admin.Theme.Transformer').
            '">[stbanner id="'.(int)$row['id_st_banner_group'].'"]</label>';
    }
    public static function showApplyTo($value,$row)
    {
        $result = '';
	    if($value)
		   $result = isset(self::$location[$value]) ? self::$location[$value]['name'] : '';
        elseif($row['id_category'])
        {
            $category = new Category($row['id_category'],(int)Context::getContext()->language->id);
            if($category->id)
                $result = $category->name;
        }
        elseif($row['id_manufacturer'])
        {
            $id_lang = (int)Context::getContext()->language->id;
            $manufacturer = Manufacturer::getNameById((int)$row['id_manufacturer']);
    		$result = (string)$manufacturer;
        }
        elseif($row['id_cms'])
        {
            $cms = new CMS((int)$row['id_cms'], (int)Context::getContext()->language->id);
            if ($cms->id)
            {
                $module = new StBanner();
                $result = $cms->meta_title.'('.$module->getTranslator()->trans('CMS', array(), 'Admin.Theme.Transformer').')';
            }
        }
        else
        {
            $module = new StBanner();
            $result = $module->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer');
        }
        return $result;
    }
    public static function showColumnWidth($value, $row)
    {
        return $value.'/12';
    }
    public static function showColumnHeight($value, $row)
    {
        return $value.'%';
    }
    protected function initList()
    {
        $this->fields_list = array(
            'id_st_banner_group' => array(
                'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
                'class' => 'fixed-width-md',
                'type' => 'text',
                'search' => false,
                'orderby' => false                
            ),
            'name' => array(
                'title' => $this->getTranslator()->trans('Name', array(), 'Admin.Theme.Transformer'),
                'class' => '',
                'type' => 'text',
                'search' => false,
                'orderby' => false 
            ),
            'location' => array(
                'title' => $this->getTranslator()->trans('Hook into', array(), 'Admin.Theme.Transformer'),
                'class' => '',
                'type' => 'text',
                'callback' => 'showApplyTo',
                'callback_object' => 'StBanner',
                'search' => false,
                'orderby' => false 
            ),
            'id_parent' => array(
				'title' => $this->getTranslator()->trans('Short code', array(), 'Admin.Theme.Transformer'),
				'width' => 200,
				'type' => 'text',
				'callback' => 'showShortCode',
				'callback_object' => 'StBanner',
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
                'active' => 'groupstatus',
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
        $helper->identifier = 'id_st_banner_group';
        $helper->actions = array('view', 'edit', 'delete','duplicate');
        $helper->show_toolbar = true;
        $helper->imageType = 'jpg';
        $helper->toolbar_btn['new'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstbannergroup&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Add a group', array(), 'Modules.Stbanner.Admin'),
        );
        $helper->bulk_actions['delete'] = array(
            'text'=>$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer'),
            'confirm'=>$this->getTranslator()->trans('Do you want to delete selected rows and their children ?', array(), 'Modules.Stbanner.Admin')
        );
        $helper->title = $this->displayName;
        $helper->table = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        return $helper;
    }
    public function displayDuplicateLink($token, $id, $name)
    {
        return '<li class="divider"></li><li><a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&copy'.$this->name.'&id_st_banner_group='.(int)$id.'&token='.$token.'"><i class="icon-copy"></i>'.$this->getTRanslator()->trans(' Duplicate ', array(), 'Admin.Theme.Transformer').'</a></li>';
    }
	protected function initListColumn()
	{
        $id_st_banner_group = (int)Tools::getValue('id_st_banner_group');
        $group = new StBannerGroup($id_st_banner_group);

        if(Validate::isLoadedObject($group))
            $id_parent = $group->id_parent;

		$this->fields_list_group = array(
			'id_st_banner_group' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'class' => 'fixed-width-md',
				'type' => 'text',
                'search' => false,
                'orderby' => false                
			),
            'name' => array(
                'title' => $this->getTranslator()->trans('Column name', array(), 'Modules.Stbanner.Admin'),
                'class' => '',
                'type' => 'text',
                'search' => false,
                'orderby' => false 
            ),
            'width' => array(
                'title' => $this->getTranslator()->trans('Width', array(), 'Admin.Theme.Transformer'),
                'class' => '',
                'type' => 'text',
                'callback' => 'showColumnWidth',
                'callback_object' => 'StBanner',
                'search' => false,
                'orderby' => false 
            ),
			'height' => array(
				'title' => $this->getTranslator()->trans('Height', array(), 'Admin.Theme.Transformer'),
				'class' => '',
				'type' => 'text',
                'callback' => 'showColumnHeight',
                'callback_object' => 'StBanner',
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
				'active' => 'groupstatus',
				'type' => 'bool',
				'class' => 'fixed-width-sm',
                'search' => false,
                'orderby' => false 
            ),
		);

		$helper = new HelperList();
        $helper->module = $this;
		$helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_banner_group';
		$helper->actions = array('view', 'edit', 'delete');
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstbannercolumn&id_parent='.$id_st_banner_group.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add a column', array(), 'Modules.Stbanner.Admin'),
		);
        $helper->toolbar_btn['back'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.( (isset($id_parent) && $id_parent) ? '&id_st_banner_group='.$id_parent.'&viewstbanner' : '').'&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer')
        );

		$helper->title = $this->getTranslator()->trans('Columns', array(), 'Modules.Stbanner.Admin');
		$helper->table = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    public static function showBannerGroupName($value,$row)
    {
        $group = new StBannerGroup((int)$value);
        return $group->id ? $group->name : '-';
    }
    public static function showBannerImage($value,$row)
    {
        return $value ? '<img src="'.$value.'" width="200" />' : '-';
    }
	protected function initListBanner()
	{
	    // Fix table drag bug.
        Media::addJsDef(array(
            'currentIndex' => AdminController::$currentIndex.'&configure='.$this->name,
        ));
        $id_st_banner_group = (int)Tools::getValue('id_st_banner_group');
        $group = new StBannerGroup($id_st_banner_group);

        if(Validate::isLoadedObject($group))
            $id_parent = $group->id_parent;

        if(!isset($id_parent))
        {
            if(Tools::getValue('id_parent'))
                $id_parent = (int)Tools::getValue('id_parent');
            else
                $id_parent = 0;
        }

		$this->fields_list = array(
			'id_st_banner' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'class' => 'fixed-width-md',
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'id_st_banner_group' => array(
				'title' => $this->getTranslator()->trans('Column name', array(), 'Modules.Stbanner.Admin'),
				'class' => 'fixed-width-xxl',
				'type' => 'text',
				'callback' => 'showBannerGroupName',
				'callback_object' => 'StBanner',
                'search' => false,
                'orderby' => false
			),
            'image_multi_lang' => array(
				'title' => $this->getTranslator()->trans('Image', array(), 'Admin.Theme.Transformer'),
				'type' => 'text',
				'callback' => 'showBannerImage',
				'callback_object' => 'StBanner',
                'class' => 'fixed-width-xxl',
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
				'active' => 'groupstatus',
				'type' => 'bool',
				'class' => 'fixed-width-sm',
                'search' => false,
                'orderby' => false 
            ),
		);

		$helper = new HelperList();
        $helper->module = $this;
		$helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_banner';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstbanner&id_st_banner_group='.(int)Tools::getValue('id_st_banner_group').'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add a banner', array(), 'Modules.Stbanner.Admin')
		);
		$helper->toolbar_btn['back'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.($id_parent ? '&id_st_banner_group='.$id_parent.'&viewstbanner' : '').'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer')
		);

        $helper->title = $this->getTranslator()->trans('Banner', array(), 'Modules.Stbanner.Admin');
		$helper->table = $this->name;
		$helper->orderBy = 'position';
		$helper->orderWay = 'ASC';
	    $helper->position_identifier = 'id_st_banner';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    private function _prepareHook($identify,$type=1)
    {
        $group = StBannerGroup::getBannerGroup($identify,$type);
        if(!is_array($group) || !count($group))
            $group = array();
        $col_sum = $row_sum = 0;
        foreach($group as $k=>$v)
        {
            /*$col_sum += $v['width'];
            $row_sum += $v['height'];

            if($col_sum>12 && $row_sum>100)
            {
                unset($group[$k]);
                continue;
            }*/
            $banners = StBannerClass::getAll($v['id_st_banner_group'], $this->context->language->id, 1);
            if(is_array($banners) && $banner_nbr=count($banners))
            {
                foreach ($banners as &$value) {
                    $value['description_has_links'] = false;
                    if($value['description_has_links'] && (preg_match("/<a\s+.*?<\/a>/i", $value['description_has_links']) || preg_match("/<button\s+.*?<?\/(button)?>/i", $value['description_has_links'])))
                        $value['description_has_links'] = true;
                }
               $group[$k]['banners'] = $banners;
            }
            $columns = StBannerGroup::recurseTree($v['id_st_banner_group'],0,0,1);
            $group[$k]['columns'] = $this->_recurseBanners($columns, $v['height'],$v['padding']);
            $group[$k]['is_full_width'] = $type==1 ? isset(self::$location[$v['location']]['full_width']) : false;
            $group[$k]['auto_height'] = $type==1 ? isset(self::$location[$v['location']]['auto_height']) : 0;
            $group[$k]['is_column'] = $type==1 ? isset(self::$location[$v['location']]['is_column']) : false;
            $group[$k]['stretched'] = $type==1 ? isset(self::$location[$v['location']]['stretched']) : 0;

            if ($group[$k]['video_poster']) {
                $group[$k]['video_poster'] = $group[$k]['video_poster'];
                $this->fetchMediaServer($group[$k]['video_poster']);
            }
        }

	    $this->smarty->assign(array(
            'groups' => $group,
        ));
        return true;
    }
    private function _recurseBanners($columns, $height, $padding)
    {
        $col_sum = $row_sum = 0;
        foreach ($columns as $k => $v)
        {
            $col_sum += $v['width'];
            $row_sum += $v['height'];

            if($col_sum>12 && $row_sum>100)
            {
                unset($columns[$k]);
                continue;
            }
        }

        $col_a = $banner_b_nbr = 0;
        foreach ($columns as &$column) {
            if($col_sum>12)
            {
                $column['banner_b'] = 1;
                $col_a +=$column['width'];
                if(($col_sum - $col_a)<12)
                {
                    $column['banner_b'] = 0;
                }else{
                    $banner_b_nbr++;
                }
            }
        }
        $padding = ($padding===0 || $padding==='0' || $padding) ? (int)$padding : 20;
        $height_column = $height - $banner_b_nbr*$padding;
        foreach ($columns as &$column) {
            $column['height_px'] = Tools::ps_round($height_column*$column['height']/100);
            $banners = StBannerClass::getAll($column['id_st_banner_group'],$this->context->language->id,1);
            if(is_array($banners) && $banner_nbr=count($banners))
            {
                foreach ($banners as &$value) {
                    $value['description_has_links'] = false;
                    if($value['description_has_links'] && (preg_match("/<a\s+.*?<\/a>/i", $value['description_has_links']) || preg_match("/<button\s+.*?<?\/(button)?>/i", $value['description_has_links'])))
                        $value['description_has_links'] = true;
                }
               $column['banners'] = $banners;
            }
            if(isset($column['columns']))
                $column['columns'] = $this->_recurseBanners($column['columns'],$column['height_px'],$padding);
        }
        return $columns;
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
    public function hookActionOutputHTMLBefore($params)
    {
        $regex = '/<p>\[stbanner\s+id=\s*[\'\"]?(\d+)[\'\"]?\s*\]<\/p>|\[stbanner\s+id=\s*[\'\"]?(\d+)[\'\"]?\s*\]/Us';
        if(!preg_match_all($regex, $params['html'], $matches)) {
            return;
        }
        if ($html = preg_replace_callback($regex, array($this, 'displayByBannerId'), $params['html'])) {
            $params['html'] = $html;
        }
    }
    public function hookDisplayHeader($params)
    {
        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $custom_css = '';
            $custom_css_arr = StBannerClass::getCustomCss();
            if (is_array($custom_css_arr) && count($custom_css_arr)) {
                foreach ($custom_css_arr as $v) {
                    $classname = '.st_banner_block_'.$v['id_st_banner'].' ';

                    $v['description_color'] && $custom_css .= $classname.'.st_image_layered_description,
                    a'.$classname.', 
                    '.$classname.'.st_image_layered_description a{color:'.$v['description_color'].';}
                    '.$classname.'.separater{border-color:'.$v['description_color'].';}';
                    if($v['bg_color']){
                        $bg_color_arr = self::hex2rgb($v['bg_color']);
                        if(is_array($bg_color_arr))
                            $custom_css .= $classname.'.st_image_layered_description_inner{background: '.$v['bg_color'].';background:rgba('.$bg_color_arr[0].','.$bg_color_arr[1].','.$bg_color_arr[2].',0.8);}';
                    }
                    
                    if($v['btn_color'])
                        $custom_css .= $classname.'.st_image_layered_description .btn{color:'.$v['btn_color'].'!important;}';
                    if($v['btn_color'] && !$v['btn_bg'])
                        $custom_css .= $classname.'.st_image_layered_description .btn{border-color:'.$v['btn_color'].';}';
                    if($v['btn_bg'])
                        $custom_css .= $classname.'.st_image_layered_description .btn{background-color:'.$v['btn_bg'].';border-color:'.$v['btn_bg'].'!important;}';
                    if($v['btn_hover_color'])
                        $custom_css .= $classname.'.st_image_layered_description .btn:hover{color:'.$v['btn_hover_color'].'!important;}';
                    if ($v['btn_hover_bg']) {
                        $custom_css .= $classname.'.st_image_layered_description .btn:hover{border-color:'.$v['btn_hover_bg'].';}';
                        $btn_fill_animation = $v['btn_bg'] ? 0 : (int)Configuration::get('STSN_BTN_FILL_ANIMATION');
                        if($btn_fill_animation)
                            $custom_css .= $classname.'.st_image_layered_description .btn{-webkit-box-shadow: inset 0 0 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset 0 0 0 0 '.$v['btn_hover_bg'].';}';
                        switch ($btn_fill_animation) {
                            case 1:
                                $custom_css .= $classname.'.st_image_layered_description .btn:hover{-webkit-box-shadow: inset 0 100px 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset 0 100px 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            case 2:
                                $custom_css .= $classname.'.st_image_layered_description .btn:hover{-webkit-box-shadow: inset 0 -100px 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset 0 -100px 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            case 3:
                                $custom_css .= $classname.'.st_image_layered_description .btn:hover{-webkit-box-shadow: inset 300px 0 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset 300px 0 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            case 4:
                                $custom_css .= $classname.'.st_image_layered_description .btn:hover{-webkit-box-shadow: inset -300px 0 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset -300px 0 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            default:
                                $custom_css .= $classname.'.st_image_layered_description .btn:hover{-webkit-box-shadow: none; box-shadow: none;background-color: '.$v['btn_hover_bg'].'!important;}';
                                break;
                        }
                    }
                }
            }

            $custom_css_arr = StBannerGroup::getCustomCss();
            if (is_array($custom_css_arr) && count($custom_css_arr)) {
                foreach ($custom_css_arr as $v) {
                    if($v['padding']===0 || $v['padding']==='0' || $v['padding'])
                    {
                        $custom_css .= '#st_banner_'.$v['id_st_banner_group'].'.st_banner_row .row{margin-left:-'.floor($v['padding']/2).'px;margin-right:-'.floor($v['padding']/2).'px;}';
                        $custom_css .= '#st_banner_'.$v['id_st_banner_group'].' .banner_col{padding-left:'.floor($v['padding']/2).'px;padding-right:'.floor($v['padding']/2).'px;}';
                        $custom_css .= '#st_banner_'.$v['id_st_banner_group'].' .banner_col.banner_b .st_banner_block{margin-bottom:'.(int)$v['padding'].'px;}';
                    }
                    
                    $classname = (isset(self::$location[$v['location']]['full_width']) ? '#banner_container_'.$v['id_st_banner_group'].' ' : '#st_banner_'.$v['id_st_banner_group']);
                    if($v['top_padding'] || $v['top_padding']==='0')
                        $custom_css .= $classname.'{padding-top:'.(int)$v['top_padding'].'px;}';
                    if($v['bottom_padding'] || $v['bottom_padding']==='0')
                        $custom_css .= $classname.'{padding-bottom:'.(int)$v['bottom_padding'].'px;}';
                    if($v['top_spacing'] || $v['top_spacing']==='0')
                        $custom_css .= $classname.'{margin-top:'.(int)$v['top_spacing'].'px;}';
                    if($v['bottom_spacing'] || $v['bottom_spacing']==='0')
                        $custom_css .= $classname.'{margin-bottom:'.(int)$v['bottom_spacing'].'px;}';
                    if(isset($v['left_spacing']) && $v['left_spacing'])
                        $custom_css .= $classname.'{margin-left:'.(int)$v['left_spacing'].'px;}';
                    if(isset($v['right_spacing']) && $v['right_spacing'])
                        $custom_css .= $classname.'{margin-right:'.(int)$v['right_spacing'].'px;}';

                    if ($v['bg_img']) {
                        $this->fetchMediaServer($v['bg_img']);
                        $custom_css .= $classname.'{background-image:url('.$v['bg_img'].');}';
                    }
                    if ($v['bg_img_v_offset']) {
                        $custom_css .= $classname.'{background-position:center -'.$v['bg_img_v_offset'].'px;}';
                    }
                }
            }
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
    }
    public function fetchMediaServer(&$image)
    {
        $image = _THEME_PROD_PIC_DIR_.$image;
        $image = context::getContext()->link->protocol_content.Tools::getMediaServer($image).$image;
    }
    public function hookDisplayCategoryHeader($params)
    {
        $id_category = (int)Tools::getValue('id_category');
        if(!$id_category)
            return false;
		if (!$this->isCached('st_banner.tpl', $this->stGetCacheId($id_category,'category_main_column','st_banner')))
            $this->_prepareHook($id_category,2,0);
		return $this->display(__FILE__, 'st_banner.tpl', $this->stGetCacheId($id_category,'category_main_column','st_banner'));
    }
    public function hookDisplayManufacturerHeader($params)
    {
        $id_manufacturer = (int)Tools::getValue('id_manufacturer');
        if(!$id_manufacturer)
            return false;
		if (!$this->isCached('st_banner.tpl', $this->stGetCacheId($id_manufacturer,'manufacturer_main_column','st_banner')))
            $this->_prepareHook($id_manufacturer,3,0);
		return $this->display(__FILE__, 'st_banner.tpl', $this->stGetCacheId($id_manufacturer,'manufacturer_main_column','st_banner'));
    }
    public function hookDisplayCMSExtra($params)
    {
        $id_cms = (int)Tools::getValue('id_cms');
        if(!$id_cms)
            return false;
		if (!$this->isCached('st_banner.tpl', $this->stGetCacheId($id_cms,'cms')))
            $this->_prepareHook($id_cms,4);
		return $this->display(__FILE__, 'st_banner.tpl', $this->stGetCacheId($id_cms,'cms'));
    }
    public function displayByBannerId($identify)
    {
        if (is_array($identify)) {
            $identify = isset($identify[2]) && $identify[2] > 0 ? (int)$identify[2] : $identify[1];
        }
        if (!$identify) {
            return;
        }
		if (!$this->isCached('st_banner.tpl', $this->stGetCacheId($identify,'id')))
            $this->_prepareHook($identify, 5);
		return $this->display(__FILE__, 'st_banner.tpl', $this->stGetCacheId($identify,'id'));
    }
    public function hookActionObjectCategoryDeleteAfter($params)
    {
        if(!$params['object']->id)
            return ;
        
        $group = StBannerGroup::getBannerGroup($params['object']->id,2);
        return $this->deletePatch($group);
    }
    public function hookActionObjectManufacturerDeleteAfter($params)
    {
        if(!$params['object']->id)
            return ;
        
        $group = StBannerGroup::getBannerGroup($params['object']->id,3);
        
        return $this->deletePatch($group);
    }
    private function deletePatch($group)
    {
        if(!is_array($group) || !count($group))
            return ;
        $res = true;
        foreach($group as $v)
        {
            $group = new StBannerGroup($v['id_st_banner_group']);
            $res &= $group->delete();
        }
        
        return $res;
    }
    public function hookDisplayCategoryFooter($params)
    {
        if(!$id_category = Tools::getValue('id_category')) {
            return false;
        }
        $cache_id = $id_category.'-17';
		if (!$this->isCached('st_banner.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook(17,2);
		return $this->display(__FILE__, 'st_banner.tpl', $this->stGetCacheId($cache_id));
    }
	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'st_banner_group_shop (id_st_banner_group, id_shop)
		SELECT id_st_banner_group, '.(int)$params['new_id_shop'].'
		FROM '._DB_PREFIX_.'st_banner_group_shop
		WHERE id_shop = '.(int)$params['old_id_shop']);
        $this->clearBannerCache();
    }
	protected function stGetCacheId($key,$type='location',$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key.'_'.$type;
	}
	private function clearBannerCache()
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
    
    public function processCopyAdvancedBannerGroup($id_st_banner_group = 0)
    {
        if (!$id_st_banner_group)
            return false;
            
        $group = new StBannerGroup($id_st_banner_group);
        // Make sure it is root node.
        if ($group->id_parent > 0)
            return false;
         
        return $this->processCopySubs($group);
    }
    
    public function processCopySubs($group, $id_parent = 0)
    {
        if (!is_object($group))
            return false;
            
        $group2 = clone $group;
        $group2->id = 0;
        $group2->id_st_banner_group = 0;
        if ($id_parent > 0)
            $group2->id_parent = $id_parent;
        $ret = $group2->add();
        
        if ($group->hasBanner())
        {
            foreach(Db::getInstance()->executeS('SELECT id_st_banner FROM '._DB_PREFIX_.'st_banner WHERE id_st_banner_group='.(int)$group->id) AS $row)
            {
                $banner = new StBannerClass($row['id_st_banner']);
                $banner->id = 0;
                $banner->id_st_banner = 0;
                $banner->id_st_banner_group = (int)$group2->id;
                $ret &= $banner->add();
            }
        }
        
        if ($group->hasColumn())
        {
            foreach(Db::getInstance()->executeS('SELECT id_st_banner_group FROM '._DB_PREFIX_.'st_banner_group WHERE id_parent='.(int)$group->id) AS $value)
            {
                $group3 = new StBannerGroup($value['id_st_banner_group']);
                $ret &= $this->processCopySubs($group3, $group2->id);
            }
        }
        return $ret;
    }
        
    public function processUpdatePositions()
	{
		if (Tools::getValue('action') == 'updatePositions' && Tools::getValue('ajax'))
		{
			$way = (int)(Tools::getValue('way'));
			$id = (int)(Tools::getValue('id'));
			$positions = Tools::getValue('st_banner');
            $msg = '';
			if (is_array($positions))
				foreach ($positions as $position => $value)
				{
					$pos = explode('_', $value);

					if ((isset($pos[2])) && ((int)$pos[2] === $id))
					{
						if ($object = new StBannerClass((int)$pos[2]))
							if (isset($position) && $object->updatePosition($way, $position))
								$msg = 'ok position '.(int)$position.' for ID '.(int)$pos[2]."\r\n";	
							else
								$msg = '{"hasError" : true, "errors" : "Can not update position"}';
						else
							$msg = '{"hasError" : true, "errors" : "This object ('.(int)$id.') can t be loaded"}';

						break;
					}
				}
                die($msg);
		}
	}

    public function fontOptions() {
        $google = array();
        foreach($this->googleFonts as $v)
            $google[] = array('id'=>$v['family'],'name'=>$v['family']);
        return $google;
    }
    
    public function fontstyles($font_name = null)
    {
        $style = '';
        if (!$font_name)
            return $style;
        
        $name = $variant = '';
        if (strpos($font_name, ':') !== false)
            list($name, $variant) = explode(':', $font_name);
        else
            $name = $font_name;
        
        $style .= 'font-family:\''.$name.'\';';
        
        if ($variant == 'regular')
        {
            //$style .= 'font-weight:400;';
        }
        elseif ($variant)
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
    
    public function prepareHooks()
    {
        $location = array();
        $rows = Db::getInstance()->executeS('SELECT location FROM `'._DB_PREFIX_.'st_banner_group` bg
            LEFT JOIN `'._DB_PREFIX_.'st_banner_group_shop` bgs
            ON bg.`id_st_banner_group` = bgs.`id_st_banner_group`
            WHERE bg.`id_parent`=0 
            AND bgs.`id_shop`='.(int)$this->context->shop->id);
        foreach($rows AS $value) {
            if (key_exists($value['location'], self::$location) && isset(self::$location[$value['location']]['hook']))
                $location[$value['location']] = self::$location[$value['location']]['hook'];
            // For column on all pages
            if ($value['location'] == 50) {
                $location[7] = self::$location[7]['hook'];
                $location[46] = self::$location[46]['hook'];
                unset($location[50]);
            }
            if ($value['location'] == 51) {
                $location[8] = self::$location[8]['hook'];
                $location[25] = self::$location[25]['hook'];
                unset($location[51]);
            }
        }
        foreach(self::$location AS $local)
        {
            if (!isset($local['hook']))
                continue;
            $hook = 'display'.ucfirst($local['hook']);
            $id_hook = Hook::getIdByName($hook);
            if (count($location) && in_array($local['hook'], $location))
            {
                if ($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                    continue;
                if (!$this->isHookableOn($hook))
                    $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to ', array(), 'Modules.Stbanner.Admin').$hook.'.';
                else
                    $this->registerHook($hook, Shop::getContextListShopID());
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
        Cache::clean('hook_module_list');
        return true;
    }
    public function getNavigate($id_st_banner_group=0)
    {
        $navs = array();
        $navs[] = '<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'">'.$this->getTranslator()->trans('Home', array(), 'Admin.Theme.Transformer').'</a>';
        $parents = StBannerGroup::getParentsGroups($id_st_banner_group);
        if(is_array($parents) && count($parents))
        {
            $parents = array_reverse($parents);
            $count = count($parents);
            foreach ($parents as $i => $value) {
                if ($i < $count-1)
                    $navs[] = '<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&viewstbanner&id_st_banner_group='.$value['id_st_banner_group'].'">'.$value['name'].'</a>';
                else
                    $navs[] = $value['name'];
            }
        }
        $this->smarty->assign('navigate', $navs);
        return $this->display(__FILE__, 'bo_navigation.tpl');
    }
    public function getIdentifyByHook($hook = '')
    {
        if (!$hook){
            return $hook;
        }
        $result = array();
        foreach(self::$location AS $value) {
            if (!isset($value['hook'])) {
                continue;
            }
            if (strtolower($hook) == strtolower($value['hook'])) {
                $result[] = $value['id'];
            }
        }
        return $result;
    }
    public function renderWidget($hookName = null, array $configuration = [])
    {
        $hookName = Tools::strtolower($hookName);
        if (strpos($hookName, 'display') === false) {
            return false;
        }
        $identify = array();
        foreach (self::$location as $k=>$v) {
            if (!isset($v['hook'])) {
                continue;
            }
            if ('display'.Tools::strtolower($v['hook'])==$hookName) {
                if (isset($v['full_width']) && $v['full_width'] && !isset($v['is_blog']) && Dispatcher::getInstance()->getController()!='index') {
                    return false;
                }
                if (isset($v['is_blog']) && (!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))) {
                    return false;
                }
                $identify = $this->getIdentifyByHook($v['hook']);
                break;
            }
        }
        if ($hookName == 'displayleftcolumn' || $hookName == 'displayleftcolumnproduct') {
            $identify[] = 50;
        }
        if ($hookName == 'displayrightcolumn' || $hookName == 'displayrightcolumnproduct') {
            $identify[] = 51;
        }
        if (!$identify) {
            return false;
        }
        $cache_id = implode('-', $identify);
        if (!$this->isCached('module:stbanner/views/templates/hook/st_banner.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook($identify,1);
        return $this->fetch('module:stbanner/views/templates/hook/st_banner.tpl', $this->stGetCacheId($cache_id));
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return;
    }
}