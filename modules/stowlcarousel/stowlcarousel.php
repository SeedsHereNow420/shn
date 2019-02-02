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

require_once _PS_MODULE_DIR_.'stowlcarousel/classes/StOwlCarouselClass.php';
require_once _PS_MODULE_DIR_.'stowlcarousel/classes/StOwlCarouselGroup.php';
require_once _PS_MODULE_DIR_.'stowlcarousel/classes/StOwlCarouselFontClass.php';

class StOwlCarousel extends Module implements WidgetInterface
{
    protected static $access_rights = 0775;
    public static $location = array();
    private $_pages = array();
    private $_location_full_width = array(21, 26, 22, 7);
    public static $transition_style = array(
        array('id' =>0 , 'name' => 'fade'),
        array('id' =>1 , 'name' => 'backSlide'),
        array('id' =>2 , 'name' => 'goDown'),
        array('id' =>3 , 'name' => 'fadeUp'),
    );
    public static $_type = array(
        1 => 'location',
        2 => 'id_category',
        4 => 'id_cms',
        5 => 'id_cms_category',
        6 => 'id_manufacturer',
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

    public static $templates = array(
        0 => array(
        ),
        1 => array(
            'child' => array(
                575,
            ),
        ),
        2 => array(     
            'child' => array(
                376,
                376,
            ),
            'banners' => true,
        ),
        3 => array(     
            'child' => array(
            ),
        ),
        /*4 => array(     
            'child' => array(
                376,
                376,
                376,
            ),
            'banners' => true,
        ),*/
    );

    public static $text_animation = array(
        0=>'',
        1=>'flash',
        2=>'shake',
        3=>'bounce',
        4=>'tada',
        5=>'swing',
        6=>'wobble',
        7=>'pulse',
        61=>'rubberBand',

        8=>'flip',
        9=>'flipInX',
        11=>'flipInY',
        13=>'fadeIn',

        14=>'fadeInUp',
        15=>'fadeInDown',
        16=>'fadeInLeft',
        17=>'fadeInRight',
        18=>'fadeInUpBig',
        19=>'fadeInDownBig',
        20=>'fadeInLeftBig',
        21=>'fadeInRightBig',

        31=>'slideInDown',
        32=>'slideInLeft',
        33=>'slideInRight',

        37=>'bounceIn',
        38=>'bounceInUp',
        39=>'bounceInDown',
        40=>'bounceInLeft',
        41=>'bounceInRight',

        47=>'rotateIn',
        48=>'rotateInUpLeft',
        49=>'rotateInDownLeft',
        50=>'rotateInUpRight',
        51=>'rotateInDownRight',
        57=>'lightSpeedIn',
        60=>'rollIn',

        62=>'zoomIn',
        63=>'zoomInDown',
        64=>'zoomInLeft',
        65=>'zoomInRight',
        66=>'zoomInUp',

        67=>'fadeUp',
    );
    public static $_width = array(
        array('id'=>1, 'name'=> '1/12'),
        array('id'=>1.2, 'name'=> '1.2/12'),
        array('id'=>1.5, 'name'=> '1.5/12'),
        array('id'=>2, 'name'=> '2/12'),
        array('id'=>2.4,'name'=> '2.4/12'),
        array('id'=>3,'name'=> '3/12'),
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


    public  $fields_list;
    public  $fields_list_slide;
    public  $fields_list_banner;
    public  $fields_value;
    public  $fields_form;
    public  $fields_form_slide;
	private $_html = '';
	private $spacer_size = '5';

    private $googleFonts;

	public function __construct()
	{
		$this->name          = 'stowlcarousel';
		$this->tab           = 'front_office_features';
		$this->version       = '2.2.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap     = true;

		parent::__construct();
        $this->initPages();
              
		$this->displayName   = $this->getTranSlator()->trans('Owl Carousel slider', array(), 'Modules.Stowlcarousel.Admin');
		$this->description   = $this->getTranSlator()->trans('Touch enabled jquery plugin that lets you create beautiful responsive carousel slider.', array(), 'Modules.Stowlcarousel.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);

        self::$location = array(
            21 => array('id' =>21 , 'name' => 'Full width top', 'hook' => 'FullWidthTop', 'full_width' => 1),
            26 => array('id' =>26 , 'name' => 'Full width top 2', 'hook' => 'FullWidthTop2', 'full_width' => 1),
            // 19 => array('id' =>19 , 'name' => 'Top column', 'hook' => 'TopColumn'),
            17 => array('id' =>17 , 'name' => 'HomepageTop', 'hook' => 'HomeTop'),
            3 => array('id' =>3 , 'name' => 'Homepage', 'hook' => 'Home'),
            18 => array('id' =>18 , 'name' => 'HomepageBottom', 'hook' => 'HomeBottom'),
            15 => array('id' =>15 , 'name' => 'Homepage right', 'hook' => 'HomeRight'),
            25 => array('id' =>25 , 'name' => 'Homepage left', 'hook' => 'HomeLeft'),
            30 => array('id' =>30 , 'name' => 'First quarter', 'hook' => 'HomeFirstQuarter'),
            31 => array('id' =>31 , 'name' => 'Second quarter', 'hook' => 'HomeSecondQuarter'),
            32 => array('id' =>32 , 'name' => 'Third quarter', 'hook' => 'HomeThirdQuarter'),
            33 => array('id' =>33 , 'name' => 'Fourth quarter', 'hook' => 'HomeFourthQuarter'),

            // 20 => array('id' =>20 , 'name' => 'Bottom column', 'hook' => 'BottomColumn'),
            22 => array('id' =>22 , 'name' => 'Full width Bottom', 'hook' => 'FullWidthBottom', 'full_width' => 1),
            2 => array('id' =>2 , 'name' => 'Left column except the produt page', 'hook' => 'LeftColumn', 'column_slider' => 1),
            5 => array('id' =>5 , 'name' => 'Right column except the produt page', 'hook' => 'RightColumn', 'column_slider' => 1),
            38 => array('id' =>38 , 'name' => 'Left column on the product page only', 'hook' => 'LeftColumnProduct', 'column_slider' => 1),
            39 => array('id' =>39 , 'name' => 'Right column on the product page only', 'hook' => 'RightColumnProduct', 'column_slider' => 1),
            34 => array('id' =>34 , 'name' => 'Product right column', 'hook' => 'ProductRightColumn', 'column_slider' => 1),
            50 => array('id' =>50 , 'name' => 'Left column on all pages', 'hook' => '',),
            51 => array('id' =>51 , 'name' => 'Right column on all pages', 'hook' => '',),
            35 => array('id' =>35 , 'name' => 'Blog homepage full width top', 'hook' => 'StBlogFullWidthTop', 'full_width' => 1, 'blog_slider' => 1),
            8 => array('id' =>8 , 'name' => 'Blog homepage top', 'hook' => 'FullWidthTop', 'blog_slider' => 1),
            6 => array('id' =>6 , 'name' => 'Blog homepage', 'hook' => 'StBlogHome', 'blog_slider' => 1),
            36 => array('id' =>36 , 'name' => 'Blog homepage full width bottom', 'hook' => 'StBlogFullWidthBottom', 'full_width' => 1, 'blog_slider' => 1),
            9 => array('id' =>9 , 'name' => 'Blog left column', 'hook' => 'StBlogLeftColumn', 'column_slider' => 1, 'blog_slider' => 1),
            10 => array('id' =>10 , 'name' => 'Blog right column', 'hook' => 'StBlogRightColumn', 'column_slider' => 1, 'blog_slider' => 1),
            11 => array('id' =>11 , 'name' => 'At bottom of product page', 'hook' => 'FooterProduct'),
            12 => array('id' =>12 , 'name' => 'At bottom of category page', 'hook' => 'CategoryFooter'),
        );
	}
    
    private function initPages()
    {
        $this->_pages = array(
                array(
                    'id' => 'index',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Index', array(), 'Admin.Theme.Transformer')
                ),
                array(
        			'id' => 'category',
        			'val' => '2',
        			'name' => $this->getTranslator()->trans('Category', array(), 'Admin.Theme.Transformer')
        		),
        		array(
        			'id' => 'product',
        			'val' => '4',
        			'name' => $this->getTranslator()->trans('Product', array(), 'Admin.Theme.Transformer')
        		),
                array(
        			'id' => 'pricesdrop',
        			'val' => '8',
        			'name' => $this->getTranslator()->trans('Prices Drop', array(), 'Admin.Theme.Transformer')
        		),
                array(
                    'id' => 'newproducts',
                    'val' => '16',
                    'name' => $this->getTranslator()->trans('New Products', array(), 'Admin.Theme.Transformer')
                ),
        		array(
        			'id' => 'manufacturer',
        			'val' => '32',
        			'name' => $this->getTranslator()->trans('Manufacturer', array(), 'Admin.Theme.Transformer')
        		),
                array(
        			'id' => 'supplier',
        			'val' => '64',
        			'name' => $this->getTranslator()->trans('Supplier', array(), 'Admin.Theme.Transformer')
        		),
                array(
        			'id' => 'bestsales',
        			'val' => '128',
        			'name' => $this->getTranslator()->trans('Best Sales', array(), 'Admin.Theme.Transformer')
        		),
                array(
        			'id' => 'cms',
        			'val' => '256',
        			'name' => $this->getTranslator()->trans('Cms', array(), 'Admin.Theme.Transformer')
        		),
            );
    }
        
	public function install()
	{
		$res = parent::install() &&
			$this->installDb() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('displayCMSExtra') &&
            $this->registerHook('displayCategoryHeader') &&
            $this->registerHook('displayManufacturerHeader') &&
			$this->registerHook('actionObjectCategoryDeleteAfter') &&
            $this->registerHook('actionObjectManufacturerDeleteAfter') &&
            $this->registerHook('actionShopDataDuplication');
		/*if ($res)
			foreach(Shop::getShops(false) as $shop)
				$res &= $this->sampleData($shop['id_shop']);*/
        $this->prepareHooks();
        $this->clearOwlCarouselCache();
        return $res;
	}
	
	/**
	 * Creates tables
	 */
	public function installDb()
	{
		/* Slides */
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_owl_carousel` (
				`id_st_owl_carousel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				`id_st_owl_carousel_group` int(10) unsigned NOT NULL,
                `new_window` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `text_position` tinyint(1) unsigned NOT NULL DEFAULT 5,
                `text_align` tinyint(1) unsigned NOT NULL DEFAULT 2,
                `text_color` varchar(7) DEFAULT NULL,
                `text_bg` varchar(7) DEFAULT NULL,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `isbanner` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `hide_text_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `text_animation` tinyint(2) unsigned NOT NULL DEFAULT 0,
                `btn_color` varchar(7) DEFAULT NULL,
                `btn_bg` varchar(7) DEFAULT NULL,
                `btn_hover_color` varchar(7) DEFAULT NULL,
                `btn_hover_bg` varchar(7) DEFAULT NULL,
                `text_width` tinyint(2) unsigned NOT NULL DEFAULT 0,
                `content_width` tinyint(2) unsigned NOT NULL DEFAULT 0,
				PRIMARY KEY (`id_st_owl_carousel`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		/* Slides lang configuration */
		$return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_owl_carousel_lang` (
				`id_st_owl_carousel` int(10) UNSIGNED NOT NULL,
				`id_lang` int(10) unsigned NOT NULL ,
    			`url` varchar(255) DEFAULT NULL,
                `description` text,
                `image_multi_lang` varchar(255) DEFAULT NULL,
                `image_lang_default` varchar(255) DEFAULT NULL,
                `title` varchar(255) DEFAULT NULL,
                `width` int(10) unsigned NOT NULL DEFAULT 0,
                `height` int(10) unsigned NOT NULL DEFAULT 0,
				PRIMARY KEY (`id_st_owl_carousel`, `id_lang`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_owl_carousel_font` (
                `id_st_owl_carousel` int(10) unsigned NOT NULL,
                `font_name` varchar(255) NOT NULL
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

		/* Slides group */
		$return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_owl_carousel_group` (
				`id_st_owl_carousel_group` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,       
                `name` varchar(255) DEFAULT NULL,
                `location` int(10) unsigned NOT NULL DEFAULT 0,
                `templates` tinyint(2) unsigned NOT NULL DEFAULT 0,
                `display_on` int(10) unsigned NOT NULL DEFAULT 0, 
                `items_huge` tinyint(2) unsigned NOT NULL DEFAULT 1, 
                `items_xxlg` tinyint(2) unsigned NOT NULL DEFAULT 1, 
                `items_xlg` tinyint(2) unsigned NOT NULL DEFAULT 1, 
                `items_lg` tinyint(2) unsigned NOT NULL DEFAULT 1, 
                `items_md` tinyint(2) unsigned NOT NULL DEFAULT 1, 
                `items_sm` tinyint(2) unsigned NOT NULL DEFAULT 1, 
                `items_xs` tinyint(2) unsigned NOT NULL DEFAULT 1, 
                `items_xxs` tinyint(2) unsigned NOT NULL DEFAULT 1, 
                `id_category` int(10) unsigned NOT NULL DEFAULT 0,
                `id_manufacturer` int(10) unsigned NOT NULL DEFAULT 0,
                `id_cms` int(10) unsigned NOT NULL DEFAULT 0,
                `id_cms_category` int(10) unsigned NOT NULL DEFAULT 0,  
                `trans_period` int(10) unsigned NOT NULL DEFAULT 1000,
                `auto_advance` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `time` int(10) unsigned NOT NULL DEFAULT 7000,
                `auto_height` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `pause` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `pag_nav` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `pag_nav_bg` varchar(7) DEFAULT NULL,
                `pag_nav_bg_active` varchar(7) DEFAULT NULL,
                `prev_next` tinyint(1) unsigned NOT NULL DEFAULT 3,
                `prev_next_color` varchar(7) DEFAULT NULL,
                `prev_next_hover` varchar(7) DEFAULT NULL,
                `prev_next_bg` varchar(7) DEFAULT NULL,
                `prev_next_bg_hover` varchar(7) DEFAULT NULL,
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `progress_bar` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `prog_bar_color` varchar(7) DEFAULT NULL,
                `prog_bar_bg` varchar(7) DEFAULT NULL, 
                `mouse_drag` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `transition_style` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `rewind_nav` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0, 
                `top_spacing` varchar(10) DEFAULT NULL,
                `bottom_spacing` varchar(10) DEFAULT NULL,
                `show_on_sub` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `two_slider_width` float(4,1) unsigned NOT NULL DEFAULT 8.0,
				PRIMARY KEY (`id_st_owl_carousel_group`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		/* Slides group shop */
		$return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_owl_carousel_group_shop` (
				`id_st_owl_carousel_group` int(10) UNSIGNED NOT NULL,
                `id_shop` int(11) NOT NULL,      
                PRIMARY KEY (`id_st_owl_carousel_group`,`id_shop`),    
                KEY `id_shop` (`id_shop`)   
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}
    
    public function sampleData($id_shop)
    {
        $return = true;
        $path = _MODULE_DIR_.$this->name;
        $samples = array(
            array('id_st_owl_carousel_group' => '', 
                'name' => 'Leftcolumn',
                'location' => 2, 
                'template' => 0, 
                'prev_next' => 2, 
                'pag_nav' => 0,
                'trans_period' => 400,
                'time' => 7000,
                'auto_advance' => 1,
                'rewind_nav' => 1,
                'child' => array(
                    array(
                        'text_position' => 5, 
                        'text_align' => 2, 
                        'text_color' => '#ffffff', 
                        'url' => '', 
                        'description' => '<h3 class="closer" style="font-family:Vollkorn;">SALE</h3><div class="line_white"> </div><h6 class="closer" style="font-family:Vollkorn;">AUTOMON LOOK</h6>', 
                        'image_multi_lang' => $path.'/views/img/sample_1.jpg', 
                        'image_lang_default' => $path.'/views/img/sample_1.jpg',
                        'width' => 270, 
                        'height' => 320, 
                    ),
                    array(
                        'text_position' => 5, 
                        'text_align' => 2, 
                        'text_color' => '#ffffff', 
                        'url' => '', 
                        'description' => '<h3 class="closer" style="font-family:Vollkorn;">NEW</h3><div class="line_white"> </div><h6 class="closer uppercase" style="font-family:Vollkorn;">New arrivals</h6>', 
                        'image_multi_lang' => $path.'/views/img/sample_2.jpg', 
                        'image_lang_default' => $path.'/views/img/sample_2.jpg',
                        'width' => 270, 
                        'height' => 320, 
                    ),
                ),
            ),
        );
        foreach($samples as $k=>&$sample)
        {
            $module = new StOwlCarouselGroup();
            $module->name = $sample['name'];
            $module->location = $sample['location'];
            $module->template = $sample['template'];
            $module->prev_next = $sample['prev_next'];
            $module->pag_nav = $sample['pag_nav'];
            $module->auto_advance = $sample['auto_advance'];
            $module->rewind_nav = $sample['rewind_nav'];
            $module->trans_period = $sample['trans_period'];
            $module->time = $sample['time'];                
            $module->active = 1;
            $module->display_on = 1;
            $module->position = $k;
            $module->id_shop_list = array((int)$id_shop);
            $return &= $module->add();
        }
        
        foreach($samples as $sp)
        {
            if(!$sp['id_st_owl_carousel_group'] || !isset($sp['child']) || !count($sp['child']))
                continue;
            foreach($sp['child'] as $k=>$v)
            {
                $module = new StOwlCarouselClass();
                $module->id_st_owl_carousel_group = $sp['id_st_owl_carousel_group'];
                $module->text_position = $v['text_position'];
                $module->text_align = $v['text_align'];
                $module->text_color = $v['text_color'];
                $module->active = 1;
                $module->position = $k;
                
                foreach (Language::getLanguages(false) as $lang)
                {
                    $module->url[$lang['id_lang']] = $v['url'];
                    $module->description[$lang['id_lang']] = $v['description'];
                    $module->image_multi_lang[$lang['id_lang']] = $v['image_multi_lang'];
                    $module->image_lang_default[$lang['id_lang']] = $v['image_lang_default'];
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
	    $this->clearOwlCarouselCache();
		// Delete configuration
		return $this->uninstallDb() &&
			parent::uninstall();
	}

	/**
	 * deletes tables
	 */
	public function uninstallDb()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_owl_carousel`,`'._DB_PREFIX_.'st_owl_carousel_lang`,`'._DB_PREFIX_.'st_owl_carousel_font`,`'._DB_PREFIX_.'st_owl_carousel_group`,`'._DB_PREFIX_.'st_owl_carousel_group_shop`');
	}

    private function _checkImageDir()
    {
        $result = '';
        if (!file_exists(_PS_UPLOAD_DIR_.$this->name))
        {
            $success = @mkdir(_PS_UPLOAD_DIR_.$this->name, self::$access_rights, true)
						|| @chmod(_PS_UPLOAD_DIR_.$this->name, self::$access_rights);
            if(!$success)
                $this->_html .= $this->displayError('"'._PS_UPLOAD_DIR_.$this->name.'" '.$this->getTranslator()->trans('an error occurred during new folder creation', array(), 'Admin.Theme.Transformer'));
        }

        if (!is_writable(_PS_UPLOAD_DIR_))
            $this->_html .= $this->displayError('"'._PS_UPLOAD_DIR_.$this->name.'" '.$this->getTranslator()->trans('directory isn\'t writable.', array(), 'Admin.Theme.Transformer'));
        
        if (!is_writable(_PS_MODULE_DIR_.$this->name.'/views/css'))
            $this->_html .= $this->displayError('"'._PS_MODULE_DIR_.$this->name.'/views/css'.'" '.$this->getTranslator()->trans('directory isn\'t writable.', array(), 'Admin.Theme.Transformer'));
            
        return $result;
    }

	public function getContent()
	{
		$this->context->controller->addCSS(($this ->_path).'views/css/admin.css');
		$this->context->controller->addJS(($this->_path).'views/js/admin.js');
        $this->googleFonts = include(_PS_MODULE_DIR_.'stthemeeditor/googlefonts.php');        
        $this->_html .= '<script type="text/javascript">var googleFontsString=\''.Tools::jsonEncode($this->googleFonts).'\';</script>';
        
        $check_result = $this->_checkImageDir();
        
        $id_st_owl_carousel_group = (int)Tools::getValue('id_st_owl_carousel_group');
        $id_st_owl_carousel = (int)Tools::getValue('id_st_owl_carousel');
        if(Tools::getValue('act')=='delete_image' && $id_st_owl_carousel)
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $id_lang = Tools::getValue('id_lang');
            $slide = new StOwlCarouselClass($id_st_owl_carousel, $id_lang);
            $slide->image_multi_lang = '';
            $result['r'] = $slide->save();
            die(json_encode($result));
        }
	    if ((Tools::isSubmit('groupstatusstowlcarousel')))
        {
            $slide_group = new StOwlCarouselGroup((int)$id_st_owl_carousel_group);
            if($slide_group->id && $slide_group->toggleStatus())
            {
                $this->clearOwlCarouselCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('the status has been updated successfully.', array(), 'Admin.Theme.Transformer'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
	    if ((Tools::isSubmit('slidestatusstowlcarousel')))
        {
            $slide = new StOwlCarouselClass((int)$id_st_owl_carousel);
            if($slide->id && $slide->toggleStatus())
            {
                //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('the status has been updated successfully.', array(), 'Admin.Theme.Transformer'));  
                $this->clearOwlCarouselCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_owl_carousel_group='.$slide->id_st_owl_carousel_group.'&viewstowlcarousel&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if (Tools::isSubmit('way') && Tools::isSubmit('id_st_owl_carousel') && (Tools::isSubmit('position')))
		{
		    $slide = new StOwlCarouselClass((int)$id_st_owl_carousel);
            if($slide->id && $slide->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position')))
            {
                //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('the status has been updated successfully.', array(), 'Admin.Theme.Transformer'));  
                $this->clearOwlCarouselCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_owl_carousel_group='.$slide->id_st_owl_carousel_group.'&viewstowlcarousel&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('failed to update the position.', array(), 'Admin.Theme.Transformer'));
		}
        if (Tools::getValue('action') == 'updatePositions')
        {
            $this->processUpdatePositions();
        }
        if (Tools::isSubmit('copystowlcarousel'))
        {
            $slide = new StOwlCarouselClass($id_st_owl_carousel);
            if($slide->id)
            {
                $slide->id = 0;
                $slide->id_st_owl_carousel = 0;
                $slide->position = $slide->checkPosition();
                $slide->add();
                $this->clearOwlCarouselCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_owl_carousel_group='.
                    $slide->id_st_owl_carousel_group.'&view'.$this->name.'&conf=19&token='.Tools::getAdminTokenLite('AdminModules'));
            }  
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred when copying.', array(), 'Admin.Theme.Transformer'));
        }
        if (Tools::isSubmit('copystowlcarouselgroup'))
        {
            if($this->processCopyOwlCarouselGroup($id_st_owl_carousel_group))
            {
                $this->clearOwlCarouselCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=19&token='.Tools::getAdminTokenLite('AdminModules'));
            }  
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('an error occUrred when copying.', array(), 'Admin.Theme.Transformer'));
        }
		if (isset($_POST['savestowlcarouselgroup']) || isset($_POST['savestowlcarouselgroupAndStay']))
		{
            if ($id_st_owl_carousel_group)
				$slide_group = new StOwlCarouselGroup((int)$id_st_owl_carousel_group);
			else
				$slide_group = new StOwlCarouselGroup();
            
            $error = array();
    		$slide_group->copyFromPost();
            
            if(!$slide_group->name)
                $error[] = $this->displayError($this->getTranslator()->trans('The field "group name" is required', array(), 'Modules.Stowlcarousel.Admin'));
            
            if($slide_group->location)
            {
                $item_arr = explode('-',$slide_group->location);
                if(count($item_arr)==2)
                {
                    foreach(self::$_type as $k=>$v)
                    {
                        if($k==$item_arr[0])
                            $slide_group->$v = (int)$item_arr[1];
                        else
                            $slide_group->$v = 0;
                    }
                }
            }
            
            $display_on = 0;
            foreach($this->_pages as $v)
                $display_on += (int)Tools::getValue('display_on_'.$v['id']);
            if (!$id_st_owl_carousel_group && !$display_on) {
                $location_full_width = array();
                foreach(self::$location AS $value) {
                    if (isset($value['full_width']) && $value['full_width']) {
                        $location_full_width[] = $value['id'];
                    }
                }
                if(in_array($slide_group->location, $location_full_width)) {
                    $display_on = 1;
                }
            }
                    
            $slide_group->display_on = $display_on;  
            
			if (!count($error) && $slide_group->validateFields(false) && $slide_group->validateFieldsLang(false))
            {
                $shop_ids = $slide_group->getShopIds();
                $slide_group->clearShopIds();
                $id_shop_list = array();
                if($assos_shop = Tools::getValue('checkBoxShopAsso_st_owl_carousel_group')) {
                    foreach ($assos_shop as $id_shop => $row) {
                        $id_shop_list[] = $id_shop;
                    }
                }
                if (!$id_shop_list) {
                    $id_shop_list = array(Context::getContext()->shop->id);
                }
                $slide_group->id_shop_list = array_unique($id_shop_list);
                if($slide_group->save())
                {
                    $this->prepareHooks();
                    $this->clearOwlCarouselCache();
                    if(isset($_POST['savestowlcarouselgroupAndStay']) || Tools::getValue('fr') == 'view')
                    {
                        $rd_str = isset($_POST['savestowlcarouselgroupAndStay']) && Tools::getValue('fr') == 'view' ? 'fr=view&update' : (isset($_POST['savestowlcarouselgroupAndStay']) ? 'update' : 'view');
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_owl_carousel_group='.$slide_group->id.'&conf='.($id_st_owl_carousel_group?4:3).'&'.$rd_str.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                    }
                        
                    else
                        $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Slideshow', array(), 'Modules.Stowlcarousel.Admin').' '.($id_st_owl_carousel_group ? $this->gettranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('added', array(), 'Admin.Theme.Transformer')));
                }                    
                else {
                    $slide_group->restoreShopIds($shop_ids);
                    $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred during slideshow', array(), 'Modules.Stowlcarousel.Admin').' '.($id_st_owl_carousel_group ? $this->gettranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
                }  
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
		if (isset($_POST['savestowlcarousel']) || isset($_POST['savestowlcarouselAndStay']))
		{
            if ($id_st_owl_carousel)
				$slide = new StOwlCarouselClass((int)$id_st_owl_carousel);
			else
				$slide = new StOwlCarouselClass();
            /**/
            
            $error = array();
            
            $languages = Language::getLanguages(false);
            $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
            if (!Tools::isSubmit('has_image_'.$default_lang) && (!isset($_FILES['image_multi_lang_'.$default_lang]) || empty($_FILES['image_multi_lang_'.$default_lang]['tmp_name'])))
			{
                $defaultLanguage = new Language($default_lang);
			    $error[] = $this->displayError($this->getTranslator()->trans('image is required at least in %1%', array('%1%'=>$defaultLanguage->name), 'Admin.Theme.Transformer'));
			}
            else
            {
			    $slide->copyFromPost();
                if(!$slide->id_st_owl_carousel_group)
                    $error[] = $this->displayError($this->getTranslator()->trans('The field "slideshow" is required', array(), 'Modules.Stowlcarousel.Admin'));
                else
                {
                    $res = $this->stUploadImage('image_multi_lang_'.$default_lang);
                    if(count($res['error']))
                        $error = array_merge($error,$res['error']);
                    elseif($res['image'])
                    {
                        $slide->image_multi_lang[$default_lang] = $res['image'];
                        $slide->image_lang_default[$default_lang] = $res['image'];
                        $slide->width[$default_lang] = $res['width'];
                        $slide->height[$default_lang] = $res['height'];
                    }
                    elseif(!Tools::isSubmit('has_image_'.$default_lang) && !$res['image'])
                    {
                        $defaultLanguage = new Language($default_lang);
                        $error[] = $this->displayError($this->getTranslator()->trans('image is required at least in ', array(), 'Modules.Stowlcarousel.Admin').$defaultLanguage->name);
                    }
                    
                    if($slide->image_multi_lang[$default_lang])
                    {
                        foreach ($languages as $lang)
                        {
                            if($lang['id_lang']==$default_lang)
                                continue;
                            $slide->image_lang_default[$lang['id_lang']] = $slide->image_multi_lang[$default_lang];
                            $slide->width[$lang['id_lang']] = $slide->width[$default_lang];
                            $slide->height[$lang['id_lang']] = $slide->height[$default_lang];
                            $res = $this->stUploadImage('image_multi_lang_'.$lang['id_lang']);
                            if(count($res['error']))
                                $error = array_merge($error,$res['error']);
                            elseif($res['image'])
                            {
                                $slide->image_multi_lang[$lang['id_lang']] = $res['image'];
                                $slide->width[$lang['id_lang']] = $res['width'];
                                $slide->height[$lang['id_lang']] = $res['height'];
                            }
                        }
                    }
                }
            }
                
			if (!count($error) && $slide->validateFields(false) && $slide->validateFieldsLang(false))
            {
                /*position*/
                $slide->position = $slide->checkPosition();
                
                if($slide->save())
                {
                    $jon = trim(Tools::getValue('google_font_name'),'¤');
                    StOwlCarouselFontClass::deleteBySlider($slide->id);
                    $jon_arr = array_unique(explode('¤', $jon));
                    if (count($jon_arr))
                        StOwlCarouselFontClass::changeSliderFont($slide->id, $jon_arr);

                    $this->clearOwlCarouselCache();
                    //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Slide', array(), 'Modules.Stowlcarousel.Admin').' '.($id_st_owl_carousel ? $this->gettranslator()->trans('updated', array(), 'Modules.Stowlcarousel.Admin') : $this->gettranslator()->trans('added', array(), 'Modules.Stowlcarousel.Admin')));
                    
                    if(isset($_POST['savestowlcarouselAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_owl_carousel='.$slide->id.'&conf='.($id_st_owl_carousel?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));  
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_owl_carousel_group='.$slide->id_st_owl_carousel_group.'&viewstowlcarousel&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred during slide', array(), 'Modules.Stowlcarousel.Admin').' '.($id_st_owl_carousel ? $this->gettranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        
		if (Tools::isSubmit('addstowlcarouselgroup') || (Tools::isSubmit('updatestowlcarousel') && $id_st_owl_carousel_group))
		{
            $helper = $this->initForm();
            return $helper->generateForm($this->fields_form);
		}
        elseif(Tools::isSubmit('addstowlcarousel') || (Tools::isSubmit('updatestowlcarousel') && $id_st_owl_carousel))
        {
            $helper = $this->initFormSlide(0);
            return $this->_html.$helper->generateForm($this->fields_form_slide);
        }
        elseif(Tools::isSubmit('addstowlcarouselbanner') || (Tools::isSubmit('updatestowlcarousel') && $id_st_owl_carousel))
        {
            $helper = $this->initFormSlide(1);
            return $this->_html.$helper->generateForm($this->fields_form_slide);
        }
        elseif(Tools::isSubmit('viewstowlcarousel'))
        {
            // Fix table drag bug.
            Media::addJsDef(array(
                'currentIndex' => AdminController::$currentIndex.'&configure='.$this->name,
            ));
			$slide_group = new StOwlCarouselGroup($id_st_owl_carousel_group);
            if(!$slide_group->isAssociatedToShop())
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
			$helper = $this->initListSlide();
            if(isset(self::$templates[$slide_group->templates]['banners']) && self::$templates[$slide_group->templates]['banners'])
                $helper_banner = $this->initListBanner();
			return $this->_html.$helper->generateList(StOwlCarouselClass::getAll($id_st_owl_carousel_group,(int)$this->context->language->id,0,0), $this->fields_list).(isset($helper_banner) ? $helper_banner->generateList(StOwlCarouselClass::getAll($id_st_owl_carousel_group,(int)$this->context->language->id,0,1), $this->fields_list_banner) : '');
        }
		else if (Tools::isSubmit('deletestowlcarousel') && $id_st_owl_carousel)
		{
			$slide = new StOwlCarouselClass($id_st_owl_carousel);
            $slide->delete();
            $this->clearOwlCarouselCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_owl_carousel_group='.$slide->id_st_owl_carousel_group.'&viewstowlcarousel&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else if (Tools::isSubmit('deletestowlcarousel') && $id_st_owl_carousel_group)
		{
			$slide_group = new StOwlCarouselGroup($id_st_owl_carousel_group);
            $slide_group->delete();
            $this->prepareHooks();
            $this->clearOwlCarouselCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else
		{
			$helper = $this->initList();
			return $this->_html.$helper->generateList(StOwlCarouselGroup::getAll(), $this->fields_list);
		}
	}
    public static function getType($row)
    {
        $type = array_flip(self::$_type);
        if($row['location'])
            return $type['location'];
        if($row['id_category'])
            return $type['id_category'];
        if($row['id_manufacturer'])
            return $type['id_manufacturer'];
        if($row['id_cms'])
            return $type['id_cms'];
        if($row['id_cms_category'])
            return $type['id_cms_category'];
        return false;
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
    public static function getApplyTo()
    {
        $module = new StOwlCarousel();
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
            $manufacturer_arr[] = array('id'=>'6-'.$manufacturer['id_manufacturer'],'name'=>$manufacturer['name']);
                
        return array(
            array('name'=>$module->getTranslator()->trans('Hook', array(), 'Admin.Theme.Transformer'),'query'=>$location),
            array('name'=>$module->getTranslator()->trans('Category', array(), 'Admin.Theme.Transformer'),'query'=>$category_arr),
            array('name'=>$module->getTranslator()->trans('CMS', array(), 'Admin.Theme.Transformer'),'query'=>$cms_arr),
            array('name'=>$module->getTranslator()->trans('Manufacturers', array(), 'Admin.Theme.Transformer'),'query'=>$manufacturer_arr),
        );
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
        
	protected function initForm()
	{        
        $id_st_owl_carousel_group = (int)Tools::getValue('id_st_owl_carousel_group');
        $slide_group = new StOwlCarouselGroup($id_st_owl_carousel_group);

		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Group configuration', array(), 'Modules.Stowlcarousel.Admin'),
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
                array(
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
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('Show on subcategories:', array(), 'Modules.Stowlcarousel.Admin'),
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
                    'desc' => $this->getTranslator()->trans('Just works for categories.', array(), 'Modules.Stowlcarousel.Admin')
				),
                'templates' => array(
                    'type' => 'html',
                    'id' => 'style',
                    'label' => $this->gettranslator()->trans('templates:', array(), 'Admin.Theme.Transformer'),
                    'name' => $this->BuildRadioUI('templates', $slide_group->templates ? $slide_group->templates : 0),
                    'desc' => '',
                ),
                array(
					'type' => 'checkbox',
					'label' => $this->getTranslator()->trans('Display on', array(), 'Admin.Theme.Transformer'),
					'name' => 'display_on',
					'lang' => true,
					'values' => array(
						'query' => $this->_pages,
						'id' => 'id',
						'name' => 'name'
					),
                    'desc' => $this->getTranslator()->trans('This setting is only for hooks starting with "Full width *" in the above "Show on" dropdown list.', array(), 'Modules.Stowlcarousel.Admin'),
				), 
                array(
                    'type' => 'html',
                    'id' => 'items',
                    'label'=> $this->getTranslator()->trans('Items', array(), 'Modules.Stowlcarousel.Admin'),
                    'name' => $this->BuildDropListGroup($slide_group->templates==3, $slide_group),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Transition style:', array(), 'Modules.Stowlcarousel.Admin'),
                    'name' => 'transition_style',
                    'options' => array(
                        'query' => self::$transition_style,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'desc' => $this->getTranslator()->trans('works only with one item on screen.', array(), 'Modules.Stowlcarousel.Admin'),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Rewind to first after the last slide:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'rewind_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'rewind_nav_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'rewind_nav_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Auto height:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'auto_height',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'auto_height_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'auto_height_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
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
                            'label' => $this->gettranslator()->trans('Visible', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_1',
                            'value' => 1,
                            'label' => $this->gettranslator()->trans('Hide on mobile (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_2',
                            'value' => 2,
                            'label' => $this->gettranslator()->trans('Hide on PC (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
					),
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->gettranslator()->trans('Screen width < 992px.', array(), 'Admin.Theme.Transformer'),
				), 
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
					'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                  
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
                'title' => $this->getTranslator()->trans('Settings for tempalte 2', array(), 'Modules.Stowlcarousel.Admin'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'select',
                    'label' => $this->gettranslator()->trans('The width of slider column:', array(), 'Modules.Stowlcarousel.Admin'),
                    'name' => 'two_slider_width',
                    'default_value' => 8,
                    'options' => array(
                        'query' => self::$_width,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isGenericName',
                    'desc' => array(
                            $this->getTranslator()->trans('The banner column would take the rest.', array(), 'Modules.Stowlcarousel.Admin'),                            
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
				'title' => $this->getTranslator()->trans('Advanced settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'top_spacing',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bottom_spacing',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Display "next" and "prev" buttons:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'prev_next',
                    'is_bool' => true,
                    'default_value' => 5,
                    'values' => array(
                        array(
                            'id' => 'direction_nav_none',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_full_height',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Full height', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_full_height_hover',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Full height, show out when mouseover', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_square',
                            'value' => 5,
                            'label' =>$this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_square_hover',
                            'value' => 3,
                            'label' =>$this->getTranslator()->trans('Square, show out when mouseover', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_circle',
                            'value' => 6,
                            'label' =>$this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_circle_hover',
                            'value' => 4,
                            'label' =>$this->getTranslator()->trans('Circle, show out when mouseover', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
					'type' => 'color',
					'label' => $this->getTranslator()->trans('prev/next buttons color:', array(), 'Admin.Theme.Transformer'),
					'name' => 'prev_next_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				array(
					'type' => 'color',
					'label' => $this->getTranslator()->trans('prev/next buttons hover color:', array(), 'Admin.Theme.Transformer'),
					'name' => 'prev_next_hover',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ), 
                array(
					'type' => 'color',
					'label' => $this->getTranslator()->trans('prev/next buttons background color:', array(), 'Admin.Theme.Transformer'),
					'name' => 'prev_next_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Show navigation:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'pag_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'pag_nav_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'pag_nav_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                ), 
                array(
					'type' => 'color',
					'label' => $this->getTranslator()->trans('Navigation color:', array(), 'Admin.Theme.Transformer'),
					'name' => 'pag_nav_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				array(
					'type' => 'color',
					'label' => $this->getTranslator()->trans('navigation active color:', array(), 'Admin.Theme.Transformer'),
					'name' => 'pag_nav_bg_active',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Autoplay:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'auto_advance',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'auto_advance_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'auto_advance_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'desc' => $this->getTranslator()->trans('automatically play animation.', array(), 'Admin.Theme.Transformer'),
                    'class' => 'fixed-width-sm'
                ), 
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Time:', array(), 'Admin.Theme.Transformer'),
					'name' => 'time',
                    'default_value' => 7000,
                    'desc' => $this->getTranslator()->trans('the period, in milliseconds, between the end of a transition effect and the start of the next one.', array(), 'Admin.Theme.Transformer'),
                    'class' => 'fixed-width-sm',
                    'validation' => 'isUnsignedInt', 
				),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Transition period:', array(), 'Admin.Theme.Transformer'),
					'name' => 'trans_period',
                    'default_value' => 400,
                    'desc' => $this->getTranslator()->trans('the period, in milliseconds, of the transition effect.', array(), 'Admin.Theme.Transformer'),
                    'class' => 'fixed-width-sm',
                    'validation' => 'isUnsignedInt', 
				),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslAtoR()->trans('Pause On Hover:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'pause',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'pause_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'pause_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Progress bar:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'progress_bar',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'none',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'top',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Top', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'bottom',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Bottom', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
					'type' => 'color',
					'label' => $this->getTranslator()->trans('Progress bar color:', array(), 'Admin.Theme.Transformer'),
					'name' => 'prog_bar_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				array(
					'type' => 'color',
					'label' => $this->getTranslator()->trans('progress bar background color:', array(), 'Admin.Theme.Transformer'),
					'name' => 'prog_bar_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Mouse drag:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'mouse_drag',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'mouse_drag_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'mouse_drag_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                ), 
                array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.
                        '&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i>'.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
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
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i>'.
                $this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        if($slide_group->id)
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_owl_carousel_group');
        }
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        /** mutishop begin **/
        $helper->id = (int)$slide_group->id;
		$helper->table =  'st_owl_carousel_group';
		$helper->identifier = 'id_st_owl_carousel_group';
        /** mutishop end **/
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->submit_action = 'savestowlcarouselgroup';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($slide_group),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
        
        if($slide_group->id)
        {
            $type  = self::getType(get_object_vars($slide_group));
            if($type && isset(self::$_type[$type]))
            {
                $field = self::$_type[$type];
                $helper->tpl_vars['fields_value']['location'] = $type.'-'.$slide_group->$field;
            }  
        }
        
        foreach($this->_pages as $v) {
            $helper->tpl_vars['fields_value']['display_on_'.$v['id']] = (int)$v['val']&(int)$slide_group->display_on;
        }
        
		return $helper;
	}
    
    public function BuildRadioUI($name, $checked_value = 0)
    {
        $html = '';
        foreach(self::$templates AS $key => $value)
        {
            $html .= '<label><input type="radio"'.($checked_value==$key ? ' checked="checked"' : '').' value="'.$key.'" id="'.$name.'_'.$key.'" name="'.$name.'">'.$key.'<img src="'.$this->_path.'views/img/'.$key.'.jpg" />'.'</label>';
            if (($key+1) % 6 == 0)
                $html .= '<br />';
        }
        return $html;
    }

    public function BuildDropListGroup($display, $slide_group)
    {
        $group = array(
            array(
                'id' => 'items_huge',
                'label' => $this->getTranslator()->trans('Extremely large devices for full screen blocks', array(), 'Admin.Theme.Transformer'),
                'tooltip' => $this->getTranslator()->trans('Desktops (>1900px)', array(), 'Admin.Theme.Transformer'),
            ),
            array(
                'id' => 'items_xxlg',
                'label' => $this->getTranslator()->trans('Extremely large devices for full screen blocks', array(), 'Admin.Theme.Transformer'),
                'tooltip' => $this->getTranslator()->trans('Desktops (>1600px)', array(), 'Admin.Theme.Transformer'),
            ),
            array(
                'id' => 'items_xlg',
                'label' => $this->getTranslator()->trans('Extra large devices', array(), 'Admin.Theme.Transformer'),
                'tooltip' => $this->getTranslator()->trans('Desktops (>1400px)', array(), 'Admin.Theme.Transformer'),
            ),
            array(
                'id' => 'items_lg',
                'label' => $this->getTranslator()->trans('Large devices', array(), 'Admin.Theme.Transformer'),
                'tooltip' => $this->getTranslator()->trans('Desktops (>1200px)', array(), 'Admin.Theme.Transformer'),
            ),
            array(
                'id' => 'items_md',
                'label' => $this->getTranslator()->trans('Medium devices', array(), 'Admin.Theme.Transformer'),
                'tooltip' => $this->getTranslator()->trans('Desktops (>992px)', array(), 'Admin.Theme.Transformer'),
            ),
            array(
                'id' => 'items_sm',
                'label' => $this->getTranslator()->trans('Small devices', array(), 'Admin.Theme.Transformer'),
                'tooltip' => $this->getTranslator()->trans('Tablets (>768px)', array(), 'Admin.Theme.Transformer'),
            ),
            array(
                'id' => 'items_xs',
                'label' => $this->getTranslator()->trans('Extra small devices', array(), 'Admin.Theme.Transformer'),
                'tooltip' => $this->getTranslator()->trans('Phones (>480px)', array(), 'Admin.Theme.Transformer'),
            ),
            array(
                'id' => 'items_xxs',
                'label' => $this->getTranslator()->trans('extremely small devices', array(), 'Admin.Theme.Transformer'),
                'tooltip' => $this->getTranslator()->trans('Phones (<480px)', array(), 'Admin.Theme.Transformer'),
            ),
        );

        $html = '<div id="items_box" '.($display ? '' : 'style="display:none;"').'>';
        $html .= '<div class="row">';
        foreach($group AS $key => $k)
        {
             if($key%3==0)
                 $html .= '</div><div class="row">';

             $html .= '<div class="col-xs-4 col-sm-3"><label '.(isset($k['tooltip']) ? ' data-html="true" data-toggle="tooltip" class="label-tooltip" data-original-title="'.$k['tooltip'].'" ':'').'>'.$k['label'].'</label>'.
             '<select name="'.$k['id'].'" 
             id="'.$k['id'].'" 
             class="'.(isset($k['class']) ? $k['class'] : 'fixed-width-md').'"'.
             (isset($k['onchange']) ? ' onchange="'.$k['onchange'].'"':'').' >';
            $item = $k['id'];
            for ($i=1; $i < 13; $i++){
                $html .= '<option value="'.$i.'" '.($slide_group->$item == $i ? ' selected="selected"':'').'>'.$i.'</option>';
            }
                                
            $html .= '</select></div>';
        }
        return $html.'</div></div>';
    }
	protected function initFormSlide($isbanner=0)
	{
        $id_st_owl_carousel = (int)Tools::getValue('id_st_owl_carousel');
        $id_st_owl_carousel_group = (int)Tools::getValue('id_st_owl_carousel_group');
		$slide = new StOwlCarouselClass($id_st_owl_carousel);

        $google_font_name_html = $google_font_name =  $google_font_link = '';
        if(Validate::isLoadedObject($slide)){
            $jon_arr = StOwlCarouselFontClass::getBySlider($slide->id);
            if(is_array($jon_arr) && count($jon_arr))
                foreach ($jon_arr as $key => $value) {
                    $google_font_name_html .= '<li id="#'.str_replace(' ', '_', strtolower($value['font_name'])).'_li" class="form-control-static"><button type="button" class="delGoogleFont btn btn-default" name="'.$value['font_name'].'"><i class="icon-remove text-danger"></i></button>&nbsp;<span style="'.$this->fontstyles($value['font_name']).'\'">style="'.$this->fontstyles($value['font_name']).'"</span></li>';

                    $google_font_name .= $value['font_name'].'¤';

                    $google_font_link .= '<link id="'.str_replace(' ', '_', strtolower($value['font_name'])).'_link" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.str_replace(' ', '+', $value['font_name']).'" />';
                }
        }

		$this->fields_form_slide[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Item', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'select',
        			'label' => $this->getTranslator()->trans('Slideshow:', array(), 'Admin.Theme.Transformer'),
        			'name' => 'id_st_owl_carousel_group',
                    'required'  => true,
                    'options' => array(
        				'query' => StOwlCarouselGroup::getAll(),
        				'id' => 'id_st_owl_carousel_group',
        				'name' => 'name',
						'default' => array(
							'value' => 0,
							'label' => $this->getTranslator()->trans('Please select', array(), 'Admin.Theme.Transformer')
						)
        			)
				),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Title:', array(), 'Admin.Theme.Transformer'),
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
                    'desc' => '<strong>'.$this->getTranslator()->trans('If this field is filled in, whole image will become clickable. But if there are any links or buttons in the Caption field, this setting will be ignored.', array(), 'Admin.Theme.Transformer').'</strong>',
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
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
					'name' => 'position',
                    'default_value' => 0, 
                    'class' => 'fixed-width-sm'                   
				),
                array(
					'type' => 'hidden',
					'name' => 'isbanner',
                    'default_value' => 0,
                    'validation' => 'isBool',                   
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
        //if(!$isbanner)
		$this->fields_form_slide[1]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('More options', array(), 'Modules.Stowlcarousel.Admin'),
                'icon' => 'icon-cogs'
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
                    'desc' => $this->getTranslator()->trans('In most case, content from the advanced editor are in white color, so you can not see them. Clicking on the Source Code btton to see them.', array(), 'Modules.Stowlcarousel.Admin'),
                ),
                array(
                    'type' => 'go_to_adv_editor',
                    'label' => '',
                    'name' => Context::getContext()->link->getModuleLink(
                                'stbanner', 'adveditor', array('caller_module'=>$this->name,'adveditor_target'=>'description')),
                    'name_blank' => Context::getContext()->link->getModuleLink(
                                'stbanner', 'adveditor', array('caller_module'=>$this->name,'adveditor_window'=>'blank','adveditor_target'=>'description')),
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
                    'desc' => '<p>'.$this->getTranslator()->trans('once a font has been added, you can use it everywhere without adding it again.', array(), 'Modules.Stowlcarousel.Admin').'</p><a id="add_google_font" class="btn btn-default btn-block fixed-width-md" href="javascript:;">Add</a><br/><p id="google_font_example" class="fontshow">Example Title</p><ul id="curr_google_font_name">'.$google_font_name_html.'</ul>'.$google_font_link,
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'google_font_name',
                    'default_value' => '',
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
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Hide caption on small screen devices:', array(), 'Modules.Stowlcarousel.Admin'),
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
                    'label' => $this->getTranslator()->trans('Alignment:', array(), 'Admin.Theme.Transformer'),
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
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Caption with:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'content_width',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'content_width_full_screen',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Full width', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'content_width_container',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Page width', array(), 'Admin.Theme.Transformer')),
                    ),
                    'desc' => $this->gettranslator()->trans('This option would be useful for full screen blocks.', array(), 'Modules.Stowlcarousel.Admin'),
                ), 
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Caption content width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_width',
                    'options' => array(
                        'query' => array(
                                array('id' => 1, 'name'=>'10%'),
                                array('id' => 2, 'name'=>'20%'),
                                array('id' => 3, 'name'=>'30%'),
                                array('id' => 4, 'name'=>'40%'),
                                array('id' => 5, 'name'=>'50%'),
                                array('id' => 6, 'name'=>'60%'),
                                array('id' => 7, 'name'=>'70%'),
                                array('id' => 8, 'name'=>'80%'),
                                array('id' => 9, 'name'=>'90%'),
                            ),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => '0',
                            'label' => $this->getTranslator()->trans('100%', array(), 'Modules.Stowlcarousel.Admin')
                        )
                    ),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Caption color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Caption background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_bg',
                    'size' => 33,
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
                array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_owl_carousel_group='.($slide->id_st_owl_carousel_group?$slide->id_st_owl_carousel_group:$id_st_owl_carousel_group).
                        '&viewstowlcarousel&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i>'.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
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
            $this->fields_form_slide[0]['form']['input']['image_multi_lang_'.$lang['id_lang']] = array(
                    'type' => 'file',
					'label' => $this->getTranslator()->trans('Image', array(), 'Admin.Theme.Transformer').' - '.$lang['name'].($default_lang == $lang['id_lang'] ? '('.$this->gettranslator()->trans('default language', array(), 'Admin.Theme.Transformer').')' : '').':',
					'name' => 'image_multi_lang_'.$lang['id_lang'],
                    'required'  => ($default_lang == $lang['id_lang']),
                    'desc' => $this->getTranslator()->trans('This module would not change image names for seo purpose, so ensure the image you are going to upload has an unique name.', array(), 'Admin.Theme.Transformer').'<br/>',
                );
        }
        $this->fields_form_slide[0]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_owl_carousel_group='.
                ($slide->id_st_owl_carousel_group?$slide->id_st_owl_carousel_group:$id_st_owl_carousel_group).'&viewstowlcarousel&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i>'.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        if(Validate::isLoadedObject($slide))
        {
            $this->fields_form_slide[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_owl_carousel');
            foreach ($languages as $lang)
                if($slide->image_multi_lang[$lang['id_lang']])
                {
                    StOwlCarouselClass::fetchMediaServer($slide->image_multi_lang[$lang['id_lang']]);
                    $this->fields_form_slide[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'has_image_'.$lang['id_lang'], 'default_value'=>1);
                    $this->fields_form_slide[0]['form']['input']['image_multi_lang_'.$lang['id_lang']]['required'] = false;
                    $this->fields_form_slide[0]['form']['input']['image_multi_lang_'.$lang['id_lang']]['desc'] .= '<img width="200" src="'.$slide->image_multi_lang[$lang['id_lang']].'"/>'.
                    ($lang['id_lang'] != $default_lang ? '<p><a class="btn btn-default st_delete_image" data-id="'.$slide->id.'" data-lang="'.(int)$lang['id_lang'].'" href="javascript:;"><i class="icon-trash"></i> '.$this->getTranslator()->trans(' Delete', array(), 'Admin.Theme.Transformer').'</a></p>' : '');
                }
        }
        elseif($id_st_owl_carousel_group)
            $slide->id_st_owl_carousel_group = $id_st_owl_carousel_group;
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestowlcarousel';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($slide,"fields_form_slide"),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
        $helper->tpl_vars['fields_value']['isbanner'] = ($isbanner || (Validate::isLoadedObject($slide) && $slide->isbanner))? 1 : 0;
        $helper->tpl_vars['fields_value']['google_font_name'] = $google_font_name;
		
		return $helper;
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
    
    public static function showApplyTo($value,$row)
    {
	    if($value)
		   $result = isset(self::$location[$value]) ? self::$location[$value]['name'] : '';
        elseif($row['id_category'])
        {
            $category = new Category($row['id_category'],(int)Context::getContext()->language->id);
            if($category->id)
            {
                $module = new StOwlCarousel();
                $result = $category->name.'('.$module->getTranslator()->trans('Category', array(), 'Admin.Theme.Transformer').')';
            }
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
                $module = new StOwlCarousel();
                $result = $cms->meta_title.'('.$module->getTranslator()->trans('CMS', array(), 'Admin.Theme.Transformer').')';
            }
        }
        else
        {
            $module = new StOwlCarousel();
            $result = $module->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer');
        }
        return $result;
    }
	protected function initList()
	{
		$this->fields_list = array(
			'id_st_owl_carousel_group' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'name' => array(
				'title' => $this->getTranslator()->trans('Name', array(), 'Admin.Theme.Transformer'),
				'width' => 200,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'location' => array(
				'title' => $this->getTranslator()->trans('Hook into', array(), 'Admin.Theme.Transformer'),
				'width' => 200,
				'type' => 'text',
				'callback' => 'showApplyTo',
				'callback_object' => 'StOwlCarousel',
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
				'width' => 25,
                'search' => false,
                'orderby' => false
            ),
		);

		$helper = new HelperList();
		$helper->shopLinkType = '';
		$helper->simple_header = false;
        $helper->module = $this;
		$helper->identifier = 'id_st_owl_carousel_group';
		$helper->actions = array('view', 'edit', 'delete','duplicate');
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstowlcarouselgroup&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add a slideshow', array(), 'Modules.Stowlcarousel.Admin'),
		);

		$helper->title = $this->displayName;
		$helper->table = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    public function displayDuplicateLink($token, $id, $name)
    {
        return '<li class="divider"></li><li><a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&copy'.$this->name.'group&id_st_owl_carousel_group='.(int)$id.'&token='.$token.'"><i class="icon-copy"></i>'.$this->getTRanslator()->trans(' Duplicate ', array(), 'Admin.Theme.Transformer').'</a></li>';
    }
    public static function showSlideGroupName($value,$row)
    {
        $slide_group = new StOwlCarouselGroup((int)$value);
        return $slide_group->id ? $slide_group->name : '-';
    }
    public static function showSlideImage($value,$row)
    {
        return '<img width="200" src="'.$value.'" />';
    }
	protected function initListSlide()
	{
		$this->fields_list = array(
			'id_st_owl_carousel' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'id_st_owl_carousel_group' => array(
				'title' => $this->getTranslator()->trans('Group name', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
				'callback' => 'showSlideGroupName',
				'callback_object' => 'StOwlCarousel',
                'search' => false,
                'orderby' => false
			),
            'image_multi_lang' => array(
				'title' => $this->getTranslator()->trans('Image', array(), 'Admin.Theme.Transformer'),
				'type' => 'text',
				'callback' => 'showSlideImage',
				'callback_object' => 'StOwlCarousel',
                'width' => 300,
                'search' => false,
                'orderby' => false
            ),
            'position' => array(
				'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
				'width' => 40,
				'position' => 'position',
				'align' => 'center',
                'search' => false,
                'orderby' => false
            ),
            'active' => array(
				'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
				'align' => 'center',
				'active' => 'slidestatus',
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
		$helper->identifier = 'id_st_owl_carousel';
		$helper->actions = array('edit', 'delete','copy');
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstowlcarousel&id_st_owl_carousel_group='.(int)Tools::getValue('id_st_owl_carousel_group').'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add an item', array(), 'Modules.Stowlcarousel.Admin')
		);
        $helper->toolbar_btn['edit'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&update'.$this->name.'&id_st_owl_carousel_group='.(int)Tools::getValue('id_st_owl_carousel_group').'&fr=view&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Edit group', array(), 'Modules.Stowlcarousel.Admin'),
		);
		$helper->toolbar_btn['back'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer')
		);

		$helper->title = $this->getTranslator()->trans('Sliders', array(), 'Admin.Theme.Transformer');
		$helper->table = $this->name;
		$helper->orderBy = 'position';
		$helper->orderWay = 'ASC';
	    $helper->position_identifier = 'id_st_owl_carousel';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    public function displayCopyLink($token, $id, $name)
    {
        return '<li class="divider"></li><li><a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&copy'.$this->name.'&id_st_owl_carousel='.(int)$id.'&token='.$token.'"><i class="icon-copy"></i>'.$this->getTRanslator()->trans(' Duplicate ', array(), 'Admin.Theme.Transformer').'</a></li>';
    }
	protected function initListBanner()
	{
		$this->fields_list_banner = array(
			'id_st_owl_carousel' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'id_st_owl_carousel_group' => array(
				'title' => $this->getTranslator()->trans('Group', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
				'callback' => 'showSlideGroupName',
				'callback_object' => 'StOwlCarousel',
                'search' => false,
                'orderby' => false
			),
            'image_multi_lang' => array(
				'title' => $this->getTranslator()->trans('Image', array(), 'Admin.Theme.Transformer'),
				'type' => 'text',
				'callback' => 'showSlideImage',
				'callback_object' => 'StOwlCarousel',
                'width' => 300,
                'search' => false,
                'orderby' => false
            ),
            'position' => array(
				'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
				'width' => 40,
				'position' => 'left',
				'align' => 'left',
                'search' => false,
                'orderby' => false
            ),
            'active' => array(
				'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
				'align' => 'center',
				'active' => 'slidestatus',
				'type' => 'bool',
				'width' => 25,
                'search' => false,
                'orderby' => false
            ),
		);

		$helper = new HelperList();
		$helper->shopLinkType = '';
        $helper->module = $this;
		$helper->simple_header = false;
		$helper->identifier = 'id_st_owl_carousel';
		$helper->actions = array('edit', 'delete', 'copy');
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstowlcarouselbanner&id_st_owl_carousel_group='.(int)Tools::getValue('id_st_owl_carousel_group').'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add a banner', array(), 'Modules.Stowlcarousel.Admin')
		);
		$helper->toolbar_btn['back'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer')
		);

		$helper->title = $this->getTranslator()->trans('Banners', array(), 'Modules.Stowlcarousel.Admin');
		$helper->table = $this->name;
		$helper->orderBy = 'position';
		$helper->orderWay = 'ASC';
	    $helper->position_identifier = 'id_st_owl_carousel';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    private function _prepareHook($identify,$type=1)
    {
        $slide_group = StOwlCarouselGroup::getSlideGroup($identify,$type);
        if(!is_array($slide_group) || !count($slide_group))
            $slide_group = array();
        
        $page = '';
        if (is_array($identify) && $identify) {
            $identify = array_shift($identify);
        }
        if ($type==1 && $slide_group && isset(self::$location[$identify]['full_width'])) {
            $page = Dispatcher::getInstance()->getController();
        }
        foreach($slide_group as $k => &$v)
        {
            if ($page && $page_array = $this->getDisplayOn((int)$v['display_on'])) {
                if (!in_array($page, $page_array)) {
                    unset($slide_group[$k]);
                    continue;
                }
            }
            $v['is_full_width'] = ($type==1 && isset(self::$location[$v['location']]['full_width'])) ? true : false;
            $slide = StOwlCarouselClass::getAll($v['id_st_owl_carousel_group'],$this->context->language->id,1,0);
            if(is_array($slide) && $slide_nbr=count($slide))
            {
               $v['slide'] = $this->doesAnyLinksExist($slide);
            }
            if(isset(self::$templates[$v['templates']]['banners']) && self::$templates[$v['templates']]['banners'])
            {
               $banners = StOwlCarouselClass::getAll($v['id_st_owl_carousel_group'],$this->context->language->id,1,1);
               if(is_array($banners) && count($banners))
               {
                   $v['banners'] = $this->doesAnyLinksExist($banners);
               }
            }
        }
	    $this->smarty->assign(array(
            'slide_group' => $slide_group,
            'transition_style' => self::$transition_style,
        ));
        return true;
    }
    public function doesAnyLinksExist($slide){
        foreach ($slide as $k=>$value) {
            $slide[$k]['description_has_links'] = false;
            if($value['description'] && (preg_match("/<a\s+.*?<\/a>/i", $value['description']) || preg_match("/<button\s+.*?<?\/(button)?>/i", $value['description'])))
                $slide[$k]['description_has_links'] = true;
        }
        return $slide;
    }
    public function hookDisplayHeader($params)
    {
        /*$data = StOwlCarouselFontClass::getAll(1);
        if(is_array($data) && count($data))
        {
            $slide_font = array();
            foreach ($data as $value) {
                $slide_font[] = $value['font_name'];
            }

            $slide_font = array_unique($slide_font); 
            $font_latin_support = Configuration::get('STSN_FONT_LATIN_SUPPORT');
            $font_cyrillic_support = Configuration::get('STSN_FONT_CYRILLIC_SUPPORT');
            $font_vietnamese = Configuration::get('STSN_FONT_VIETNAMESE');
            $font_greek_support = Configuration::get('STSN_FONT_GREEK_SUPPORT');
            $font_arabic_support = Configuration::get('STSN_FONT_ARABIC_SUPPORT');
            $font_support = ($font_latin_support || $font_cyrillic_support || $font_vietnamese || $font_greek_support || $font_arabic_support) ? '&subset=' : '';
            $font_latin_support && $font_support .= 'latin,latin-ext,';
            $font_cyrillic_support && $font_support .= 'cyrillic,cyrillic-ext,';
            $font_vietnamese && $font_support .= 'vietnamese,';
            $font_greek_support && $font_support .= 'greek,greek-ext,';
            $font_arabic_support && $font_support .= 'arabic,';
            if(is_array($slide_font) && count($slide_font))
                foreach($slide_font as $x)
                {
                    if(!$x)
                        continue;
                    $this->context->controller->addCSS($this->context->link->protocol_content."fonts.googleapis.com/css?family=".str_replace(' ', '+', $x).($font_support ? rtrim($font_support,',') : ''));
                }
        }*/    
        $this->context->controller->addJS($this->_path.'views/js/stowlcarousel.js');
        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $custom_css = '';
            $custom_css_arr = StOwlCarouselClass::getOptions();
            if (is_array($custom_css_arr) && count($custom_css_arr)) {
                foreach ($custom_css_arr as $v) {
                    $classname = '.st_owl_carousel_block_'.$v['id_st_owl_carousel'].' ';
                    $v['text_color'] && $custom_css .= $classname.'.st_image_layered_description,
                    a'.$classname.', 
                    '.$classname.'.st_image_layered_description a{color:'.$v['text_color'].';}
                    '.$classname.'.separater{border-color:'.$v['text_color'].';}';
                    if($v['text_bg'])
                        $custom_css .= $classname.'.st_image_layered_description_inner{background-color:'.$v['text_bg'].';background-color:rgba('.self::hex2rgb($v['text_bg']).',0.8);}';
                    if($v['btn_color'])
                        $custom_css .= $classname.'.st_image_layered_description .btn{color:'.$v['btn_color'].';}';
                    if($v['btn_color'] && !$v['btn_bg'])
                        $custom_css .= $classname.'.st_image_layered_description .btn{border-color:'.$v['btn_color'].';}';
                    if($v['btn_bg'])
                        $custom_css .= $classname.'.st_image_layered_description .btn{background-color:'.$v['btn_bg'].';border-color:'.$v['btn_bg'].';}';
                    if($v['btn_hover_color'])
                        $custom_css .= $classname.'.st_image_layered_description .btn:hover{color:'.$v['btn_hover_color'].';}';
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
                                $custom_css .= $classname.'.st_image_layered_description .btn:hover{-webkit-box-shadow: none; box-shadow: none;background-color: '.$v['btn_hover_bg'].';}';
                                break;
                        }
                    }
                }
            } 

            $custom_css_arr = StOwlCarouselGroup::getOptions();
            if (is_array($custom_css_arr) && count($custom_css_arr)) {
                foreach ($custom_css_arr as $v) {
                    $v['prog_bar_color'] && $custom_css .= '#st_owl_carousel-'.$v['id_st_owl_carousel_group'].' .owl_bar{background-color:'.$v['prog_bar_color'].';}';
                    $v['prog_bar_bg'] && $custom_css .= '#st_owl_carousel-'.$v['id_st_owl_carousel_group'].' .owl_progressBar{background-color:'.$v['prog_bar_bg'].';}';
                    $v['pag_nav_bg'] && $custom_css .= '#st_owl_carousel-'.$v['id_st_owl_carousel_group'].'.owl-theme .owl-controls .owl-page span{background-color:'.$v['pag_nav_bg'].';}';
                    $v['pag_nav_bg_active'] && $custom_css .= '#st_owl_carousel-'.$v['id_st_owl_carousel_group'].'.owl-theme .owl-controls .owl-page.active span{background-color:'.$v['pag_nav_bg_active'].';}';
                    $v['prev_next_color'] && $custom_css .= '#st_owl_carousel-'.$v['id_st_owl_carousel_group'].'.owl-theme.owl-navigation-lr .owl-controls .owl-buttons div{color:'.$v['prev_next_color'].';}';
                    $v['prev_next_hover'] && $custom_css .= '#st_owl_carousel-'.$v['id_st_owl_carousel_group'].'.owl-theme.owl-navigation-lr .owl-controls .owl-buttons div:hover{color:'.$v['prev_next_hover'].';}';
                    if($v['prev_next_bg'])
                        $custom_css .= '#st_owl_carousel-'.$v['id_st_owl_carousel_group'].'.owl-theme.owl-navigation-lr .owl-controls .owl-buttons div{background-color:'.$v['prev_next_bg'].';}';
                    if($v['prev_next_bg'])
                    {
                        $prev_next_bg = self::hex2rgb($v['prev_next_bg'] );
                        $custom_css .= '#st_owl_carousel-'.$v['id_st_owl_carousel_group'].'.owl-theme.owl-navigation-lr .owl-controls .owl-buttons div{background-color:rgba('.$prev_next_bg.',0.4);}#st_owl_carousel-'.$v['id_st_owl_carousel_group'].'.owl-theme.owl-navigation-lr .owl-controls .owl-buttons div:hover{background-color:rgba('.$prev_next_bg.',0.8);}';
                    }
                    /*
                    if($v['prev_next_bg_hover'])
                        $custom_css .= '#st_owl_carousel-'.$v['id_st_owl_carousel_group'].'.owl-theme.owl-navigation-lr .owl-controls .owl-buttons div:hover{background-color:'.$v['prev_next_bg_hover'].';}';
                    */
                    $classname = (isset(self::$location[$v['location']]['full_width']) ? '#owl_carousel_container_'.$v['id_st_owl_carousel_group'] : '#st_owl_carousel_'.$v['id_st_owl_carousel_group']);
                    if(isset($v['top_spacing']) && ($v['top_spacing'] || $v['top_spacing']==='0'))
                        $custom_css .= $classname.'{margin-top:'.(int)$v['top_spacing'].'px;}';
                    if(isset($v['bottom_spacing']) && ($v['bottom_spacing'] || $v['bottom_spacing']==='0'))
                        $custom_css .= $classname.'{margin-bottom:'.(int)$v['bottom_spacing'].'px;}';
                }
            }                 
            $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
    }
    	
    public function hookDisplayCategoryHeader($params)
    {
        $id_category = (int)Tools::getValue('id_category');
        if(!$id_category)
            return false;
		if (!$this->isCached('stowlcarousel.tpl', $this->stGetCacheId($id_category, 'category-header')))
            $this->_prepareHook($id_category,2);
		return $this->display(__FILE__, 'stowlcarousel.tpl', $this->stGetCacheId($id_category, 'category-header'));
    }
    public function hookDisplayCMSExtra($params)
    {
        $id_cms = (int)Tools::getValue('id_cms');
        if(!$id_cms)
            return false;
		if (!$this->isCached('stowlcarousel.tpl', $this->stGetCacheId($id_cms, 'cms')))
            $this->_prepareHook($id_cms,4);
		return $this->display(__FILE__, 'stowlcarousel.tpl', $this->stGetCacheId($id_cms, 'cms'));
    }
    public function hookDisplayManufacturerHeader($params)
    {
        $id_manufacturer = (int)Tools::getValue('id_manufacturer');
        if(!$id_manufacturer)
            return false;
		if (!$this->isCached('stowlcarousel.tpl', $this->stGetCacheId($id_manufacturer, 'manufacturer')))
            $this->_prepareHook($id_manufacturer,6);
		return $this->display(__FILE__, 'stowlcarousel.tpl', $this->stGetCacheId($id_manufacturer, 'manufacturer'));
    }
    public function displayBySlideId($identify)
    {
        if(!Validate::isUnsignedInt($identify))
            return false;
            
        $slide_group_obj = new StOwlCarouselGroup($identify);
        if(!$slide_group_obj->id || !$slide_group_obj->active)
            return false;
		if (!$this->isCached('stowlcarousel.tpl', $this->stGetCacheId($slide_group_obj->id, 'id')))
            $this->_prepareHook($identify,3);
		return $this->display(__FILE__, 'stowlcarousel.tpl', $this->stGetCacheId($slide_group_obj->id, 'id'));
    }
    public function hookActionObjectCategoryDeleteAfter($params)
    {
        if(!$params['object']->id)
            return ;
        
        $slide_group = StOwlCarouselGroup::getSlideGroup($params['object']->id,2);
        if(!is_array($slide_group) || !count($slide_group))
            return ;
        $res = true;
        foreach($slide_group as $v)
        {
            $slide_group = new StOwlCarouselGroup($v['id_st_owl_carousel_group']);
            $res &= $slide_group->delete();
        }
        
        return $res;
    }
    public function hookActionObjectManufacturerDeleteAfter($params)
    {
        if(!$params['object']->id)
            return ;
        
        $slide_group = StOwlCarouselGroup::getSlideGroup($params['object']->id,6);
        if(!is_array($slide_group) || !count($slide_group))
            return ;
        $res = true;
        foreach($slide_group as $v)
        {
            $slide_group = new StOwlCarouselGroup($v['id_st_owl_carousel_group']);
            $res &= $slide_group->delete();
        }
        
        return $res;
    }
	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'st_owl_carousel_group_shop (id_st_owl_carousel_group, id_shop)
		SELECT id_st_owl_carousel_group, '.(int)$params['new_id_shop'].'
		FROM '._DB_PREFIX_.'st_owl_carousel_group_shop
		WHERE id_shop = '.(int)$params['old_id_shop']);
        $this->clearOwlCarouselCache();
    }
	protected function stGetCacheId($key,$type='location',$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key.'_'.$type;
	}
	private function clearOwlCarouselCache()
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
       return implode(",", $rgb); // returns the rgb values separated by commas
       //return $rgb;
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
    
    public function processCopyOwlCarouselGroup($id_st_owl_carousel_group = 0)
    {
        if (!$id_st_owl_carousel_group)
            return false;
            
        $group = new StOwlCarouselGroup($id_st_owl_carousel_group);
        
        $group2 = clone $group;
        $group2->id = 0;
        $group2->id_st_owl_carousel_group = 0;
        $ret = $group2->add();
        
        foreach(Db::getInstance()->executeS('SELECT id_st_owl_carousel FROM '._DB_PREFIX_.'st_owl_carousel WHERE id_st_owl_carousel_group='.(int)$group->id) AS $row)
        {
            $slider = new StOwlCarouselClass($row['id_st_owl_carousel']);
            $slider->id = 0;
            $slider->id_st_owl_carousel = 0;
            $slider->id_st_owl_carousel_group = (int)$group2->id;
            $ret &= $slider->add();
        }
        return $ret;
    }
        
    public function processUpdatePositions()
	{
		if (Tools::getValue('action') == 'updatePositions' && Tools::getValue('ajax'))
		{
			$way = (int)(Tools::getValue('way'));
			$id = (int)(Tools::getValue('id'));
			$positions = Tools::getValue('st_owl_carousel');
            $msg = '';
			if (is_array($positions))
				foreach ($positions as $position => $value)
				{
					$pos = explode('_', $value);

					if ((isset($pos[2])) && ((int)$pos[2] === $id))
					{
						if ($object = new StOwlCarouselClass((int)$pos[2]))
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
    
    public function prepareHooks()
    {
        $location = array();
        $rows = Db::getInstance()->executeS('SELECT location FROM `'._DB_PREFIX_.'st_owl_carousel_group` g
            LEFT JOIN `'._DB_PREFIX_.'st_owl_carousel_group_shop` gs
            ON g.`id_st_owl_carousel_group` = gs.`id_st_owl_carousel_group`
            WHERE gs.`id_shop`='.(int)$this->context->shop->id);
        foreach($rows AS $value) {
            if (key_exists($value['location'], self::$location) && isset(self::$location[$value['location']]['hook']))
                $location[$value['location']] = self::$location[$value['location']]['hook'];
            // For column on all pages
            if ($value['location'] == 50) {
                $location[2] = self::$location[2]['hook'];
                $location[38] = self::$location[38]['hook'];
                unset($location[50]);
            }
            if ($value['location'] == 51) {
                $location[5] = self::$location[5]['hook'];
                $location[39] = self::$location[39]['hook'];
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
                    $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to %hook%.', array('%hook%'=>$hook), 'Modules.Stowlcarousel.Admin');
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
    public function renderWidget($hookName = null, array $configuration = [])
    {
        $hookName = Tools::strtolower($hookName);
        $identify = array();
        $column_slider = $blog_slider = 0;
        foreach (self::$location as $k=>$v) {
            if ('display'.Tools::strtolower($v['hook'])==$hookName) {
                $identify[] = $k;
                $column_slider = isset($v['column_slider']);
                $blog_slider = isset($v['blog_slider']);
                $index_slider = isset($v['full_width']);
                break;
            }
        }
        if ($hookName == 'displayleftcolumn' || $hookName == 'displayleftcolumnproduct') {
            $identify[] = 50;
        }
        if ($hookName == 'displayrightcolumn' || $hookName == 'displayrightcolumnproduct') {
            $identify[] = 51;
        }
        if(!$identify)
            return false;
        if ($index_slider && !$blog_slider && Dispatcher::getInstance()->getController()!='index') {
            return false;
        }
        if($blog_slider && (!Module::isInstalled('stblog') || !Module::isEnabled('stblog')))
            return false;
        $page_name = $this->context->controller->getPageName();
        $cache_id = $page_name.implode('-',$identify);
        if (!$this->isCached('module:stowlcarousel/views/templates/hook/stowlcarousel.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook($identify,1);
        return $this->fetch('module:stowlcarousel/views/templates/hook/stowlcarousel.tpl', $this->stGetCacheId($cache_id));
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return;
    }
    private function getDisplayOn($value = 0)
    {
        $ret = array();
        if (!$value)
            return $ret;
        foreach($this->_pages AS $v)
            if ((int)$v['val']&(int)$value)
                $ret[] = $v['id'];
        return $ret;
    }
}
