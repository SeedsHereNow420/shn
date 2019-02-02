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

require_once _PS_MODULE_DIR_.'stmultilink/classes/StMultiLinkGroup.php';
require_once _PS_MODULE_DIR_.'stmultilink/classes/StMultiLinkClass.php';
require_once _PS_MODULE_DIR_.'stblog/classes/StBlogCategory.php';
class StMultiLink extends Module implements WidgetInterface
{
	/* @var boolean error */
	protected $error = false;
    public static $location = array(
        1 => array('id' =>1 , 'name' => 'Top bar right(displayNav2)'     , 'hook' => 'nav2'),
        40 => array('id' =>40 , 'name' => 'Top bar center(displayNav3)'  , 'hook' => 'nav3'),
        9 => array('id' =>9 , 'name' => 'Top bar left(displayNav1)'  , 'hook' => 'nav1'),
        2 => array('id' =>2 , 'name' => 'Left column except the produt page', 'column'=>1      , 'hook' => 'LeftColumn'),
        4 => array('id' =>4 , 'name' => 'Right column except the produt page', 'column'=>1     , 'hook' => 'RightColumn'),
        41 => array('id' =>41 , 'name' => 'Left column on the product page only', 'column'=>1      , 'hook' => 'LeftColumnProduct'),
        42 => array('id' =>42 , 'name' => 'Right column on the product page only', 'column'=>1     , 'hook' => 'RightColumnProduct'),
        43 => array('id' =>43 , 'name' => 'Product right column', 'column'=>1     , 'hook' => 'ProductRightColumn'),
        24 => array('id' =>24 , 'name' => 'Homepage first quarter'      , 'hook' => 'HomeFirstQuarter'),
        25 => array('id' =>25 , 'name' => 'Homepage second quarter'     , 'hook' => 'HomeSecondQuarter'),
        29 => array('id' =>29 , 'name' => 'Homepage third quarter'      , 'hook' => 'HomeThirdQuarter'),
        30 => array('id' =>30 , 'name' => 'Homepage fourth quarter'     , 'hook' => 'HomeFourthQuarter'),
        7 => array('id' =>7 , 'name' => 'Blog left column', 'column'=>1 , 'hook' => 'StBlogLeftColumn'),
        8 => array('id' =>8 , 'name' => 'Blog right column', 'column'=>1, 'hook' => 'StBlogRightColumn'),

        6 => array('id' =>6 , 'name' => 'Stacked footer (Column 1)'    , 'hook' => 'stackedFooter1', 'is_stacked_footer'=>1),
        10 => array('id' =>10 , 'name' => 'Stacked footer (Column 2)'  , 'hook' => 'stackedFooter2', 'is_stacked_footer'=>1),
        26 => array('id' =>26 , 'name' => 'Stacked footer (Column 3)'  , 'hook' => 'stackedFooter3', 'is_stacked_footer'=>1),
        11 => array('id' =>11 , 'name' => 'Stacked footer (Column 4)'  , 'hook' => 'stackedFooter4', 'is_stacked_footer'=>1),
        12 => array('id' =>12 , 'name' => 'Stacked footer (Column 5)'  , 'hook' => 'stackedFooter5', 'is_stacked_footer'=>1),
        13 => array('id' =>13 , 'name' => 'Stacked footer (Column 6)'  , 'hook' => 'stackedFooter6', 'is_stacked_footer'=>1),

        3  => array('id' =>3 , 'name' => 'Footer (3/12 wide)' , 'hook' => 'Footer'),
        14 => array('id' =>14 , 'name' => 'Footer (2/12 wide)', 'hook' => 'Footer'),
        27 => array('id' =>27 , 'name' => 'Footer (2.4/12 wide)', 'hook' => 'Footer'),
        15 => array('id' =>15 , 'name' => 'Footer (4/12 wide)', 'hook' => 'Footer'),
        16 => array('id' =>16 , 'name' => 'Footer (5/12 wide)', 'hook' => 'Footer'),
        17 => array('id' =>17 , 'name' => 'Footer (6/12 wide)', 'hook' => 'Footer'),

        5 => array('id' =>5 , 'name' => 'Footer after (3/12 wide)'   , 'hook' => 'FooterAfter'),
        18 => array('id' =>18 , 'name' => 'Footer after (2/12 wide)' , 'hook' => 'FooterAfter'),
        28 => array('id' =>28 , 'name' => 'Footer after (2.4/12 wide)', 'hook' => 'FooterAfter'),
        19 => array('id' =>19 , 'name' => 'Footer after (4/12 wide)' , 'hook' => 'FooterAfter'),
        20 => array('id' =>20 , 'name' => 'Footer after (5/12 wide)' , 'hook' => 'FooterAfter'),
        21 => array('id' =>21 , 'name' => 'Footer after (6/12 wide)' , 'hook' => 'FooterAfter'),

        22 => array('id' =>22 , 'name' => 'Footer bottom (Align right)' , 'hook' => 'FooterBottomRight'),
        23 => array('id' =>23 , 'name' => 'Footer bottom (Align left)'  , 'hook' => 'FooterBottomLeft'),

        31 => array('id' =>31 , 'name' => 'Header top'          , 'hook' => 'Top'),
        32 => array('id' =>32 , 'name' => 'Header left'         , 'hook' => 'HeaderLeft'),
        33 => array('id' =>33 , 'name' => 'Header top bottom'   , 'hook' => 'HeaderBottom'),
        34 => array('id' =>34 , 'name' => 'Checkout page header'   , 'hook' => 'CheckoutHeader', 'alias' => 'CheckoutMobileNav'),
    );

    public static $span_map = array(
        6  => '3',
        10 => '2',
        26 => '2-4',
        11 => '4',
        12 => '5',
        13 => '6',
        
        3  => '3',
        14 => '2',
        27 => '2-4',
        15 => '4',
        16 => '5',
        17 => '6',
        
        5  => '3',
        18 => '2',
        28 => '2-4',
        19 => '4',
        20 => '5',
        21 => '6',
    );

    public  $fields_list;
    public  $fields_list_link;
    public  $fields_value;
    public  $fields_value_link;
    public  $fields_form;
    public  $fields_form_link;
	private $_html = '';
	private $spacer_size = '5';
	private $pattern = '/^(\d+)\_(\d+)$/';
    
	public function __construct()
	{
		$this->name          = 'stmultilink';
		$this->tab           = 'front_office_features';
		$this->version       = '1.9.4';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap     = true;
        
	 	parent::__construct();

		$this->displayName   = $this->getTranslaTor()->trans('Custom Links', array(), 'Modules.Stmultilink.Admin');
		$this->description   = $this->getTranslator()->trans('This module is used to manage and display collections of links to your shop.', array(), 'Modules.Stmultilink.Admin');
	}
	
	public function install()
	{
		$res = parent::install() &&
			$this->installDB() &&
            $this->registerHook('displayMobileNav') &&
			$this->registerHook('displayHeader') &&
			$this->registerHook('actionObjectCmsUpdateAfter') &&
			$this->registerHook('actionObjectCmsDeleteAfter') &&
			$this->registerHook('actionObjectSupplierUpdateAfter') &&
			$this->registerHook('actionObjectSupplierDeleteAfter') &&
			$this->registerHook('actionObjectManufacturerUpdateAfter') &&
			$this->registerHook('actionObjectManufacturerDeleteAfter') &&
            $this->registerHook('actionObjectCategoryUpdateAfter') &&
			$this->registerHook('actionObjectCategoryDeleteAfter') &&
			$this->registerHook('actionShopDataDuplication');
		if ($res)
			foreach(Shop::getShops(false) as $shop)
				$res &= $this->sampleData($shop['id_shop']);
        $this->prepareHooks();
        $this->clearMultiLinkCache();
        return $res;
	}
    
    private function installDB()
	{
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_multi_link` (                  
              `id_st_multi_link` int(10) NOT NULL AUTO_INCREMENT,
              `id_category` int(10) unsigned NOT NULL DEFAULT 0,   
              `id_cms` int(10) unsigned NOT NULL DEFAULT 0,
              `id_cms_category` int(10) unsigned NOT NULL DEFAULT 0,
              `id_st_blog_category` int(10) unsigned NOT NULL DEFAULT 0,
              `id_supplier` int(10) unsigned NOT NULL DEFAULT 0,
              `id_manufacturer` int(10) unsigned NOT NULL DEFAULT 0,       
              `pagename` varchar(255) DEFAULT NULL,                       
              `new_window` tinyint(1) NOT NULL DEFAULT 0,                      
              `nofollow` tinyint(1) NOT NULL DEFAULT 1,                      
              `id_st_multi_link_group` int(10) NOT NULL,    
              `active` tinyint(1) unsigned NOT NULL,                
              `position` int(10) unsigned NOT NULL DEFAULT 0,  
              `icon_class` varchar(255) DEFAULT NULL,    
              PRIMARY KEY (`id_st_multi_link`)     
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_multi_link_lang` (
               `id_st_multi_link` int(10) NOT NULL,    
               `id_lang` int(10) NOT NULL,            
               `name` text DEFAULT NULL,    
               `url` varchar(255) DEFAULT NULL,            
               PRIMARY KEY (`id_st_multi_link`,`id_lang`)             
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_multi_link_group` (                        
                `id_st_multi_link_group` int(10) NOT NULL AUTO_INCREMENT,  
                `location` int(10) unsigned NOT NULL DEFAULT 0,                
                `new_window` tinyint(1) unsigned NOT NULL DEFAULT 0,       
                `nofollow` tinyint(1) unsigned NOT NULL DEFAULT 1,       
                `active` tinyint(1) unsigned NOT NULL,    
                `position` int(10) unsigned NOT NULL DEFAULT 0,      
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0,  
                `icon_class` varchar(255) DEFAULT NULL,    
                `font_size` int(10) unsigned NOT NULL DEFAULT 0,
                `icon_size` int(10) unsigned NOT NULL DEFAULT 0,
                `link_align` tinyint(1) unsigned NOT NULL DEFAULT 0,
                PRIMARY KEY (`id_st_multi_link_group`)             
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_multi_link_group_lang` (     
                 `id_st_multi_link_group` int(10) NOT NULL,    
                 `id_lang` int(10) NOT NULL,        
                 `name` text DEFAULT NULL,  
                 `url` varchar(255) DEFAULT NULL,                                 
                 PRIMARY KEY (`id_st_multi_link_group`,`id_lang`)    
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
                      
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_multi_link_group_shop` (
                 `id_st_multi_link_group` int(10) NOT NULL,  
                 `id_shop` int(11) NOT NULL,                   
                PRIMARY KEY (`id_st_multi_link_group`,`id_shop`),    
                KEY `id_shop` (`id_shop`)       
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}
    public function sampleData($id_shop)
    {
        $return = true;
		$samples = array(
			array('id_st_multi_link_group' => '', 
                'location' => 1, 
                'name' => 'Help',
                'url' => '', 
                'active' => 1,
                'hide_on_mobile' => 0,
                'child' => array(
        			array('id_cms' => 0, 'pagename' => 'contact'),
        			array('id_cms' => 1, 'pagename' => ''),
        		),
            ),
            array('id_st_multi_link_group' => '', 
                'location' => 5, 
                'name' => 'Support',
                'url' => '', 
                'active' => 1,
                'hide_on_mobile' => 0,
                'child' => array(
                    array('id_cms' => 0, 'pagename' => 'stores'),
                    array('id_cms' => 0, 'pagename' => 'contact'),
                    array('id_cms' => 0, 'pagename' => 'sitemap'),
                ),
            ),
			array('id_st_multi_link_group' => '', 
                'location' => 5, 
                'name' => 'Catalog',
                'url' => '', 
                'active' => 1,
                'hide_on_mobile' => 0,
                'child' => array(
        			array('id_cms' => 0, 'pagename' => 'prices-drop'),
        			array('id_cms' => 0, 'pagename' => 'new-products'),
        			array('id_cms' => 0, 'pagename' => 'best-sales'),
        		),
            ),
			/*array('id_st_multi_link_group' => '', 
                'location' => 28, 
                'name' => 'My Account',
                'url' => '', 
                'active' => 1,
                'hide_on_mobile' => 0,
                'child' => array(
        			array('id_cms' => 0, 'pagename' => 'my-account'),
        			array('id_cms' => 0, 'pagename' => 'history'),
        			array('id_cms' => 0, 'pagename' => 'addresses'),
        		),
            ),*/
            array('id_st_multi_link_group' => '', 
                'location' => 34, 
                'name' => 'Help',
                'url' => '', 
                'active' => 1,
                'hide_on_mobile' => 0,
                'child' => array(
        			array('id_cms' => 0, 'pagename' => 'contact', 'icon_class' => 'fto-angle-right'),
        			array('id_cms' => 0, 'pagename' => '', 'icon_class' => 'fto-angle-right', 'name'=>'Common payment issues'),
        			array('id_cms' => 0, 'pagename' => '', 'icon_class' => 'fto-phone', 'name'=>'1234-5678'),
        		),
            ),
		);
		foreach($samples as $k=>&$sample)
		{
            $id_st_multi_link_group = 0;
			$module = new StMultiLinkGroup();
			$module->location = (int)$sample['location'];
			$module->active = (int)$sample['active'];
			$module->hide_on_mobile = (int)$sample['hide_on_mobile'];
			$module->position = $k;
            $module->id_shop_list = array((int)$id_shop);
			foreach (Language::getLanguages(false) as $lang)
            {
				$module->name[$lang['id_lang']] = $sample['name'];
				$module->url[$lang['id_lang']] = $sample['url'];
            }
            $return &= $module->add();
            $id_st_multi_link_group = $module->id;
            foreach($sample['child'] as $_k=>$v)
    		{
    			$module = new StMultiLinkClass();
    			$module->id_st_multi_link_group = $id_st_multi_link_group;
    			$module->id_cms = $v['id_cms'];
    			$module->pagename = $v['pagename'];
                if (isset($v['icon_class'])) {
                    $module->icon_class = $v['icon_class'];
                }
                if (isset($v['name']) && $v['name']) {
                    foreach (Language::getLanguages(false) as $lang)
                    {
        				$module->name[$lang['id_lang']] = $v['name'];
                    }
                }
    			$module->active = 1;
    			$module->position = $_k;
    			$return &= $module->add();
    		}
		}
		return $return;
    }
	private function uninstallDB()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_multi_link`,`'._DB_PREFIX_.'st_multi_link_lang`,`'._DB_PREFIX_.'st_multi_link_group`,`'._DB_PREFIX_.'st_multi_link_group_lang`,`'._DB_PREFIX_.'st_multi_link_group_shop`');
	}
	
	public function uninstall()
	{
		if (!parent::uninstall() ||
			!$this->uninstallDB())
			return false;
        $this->clearMultiLinkCache();
		return true;
	}

    private function _prepareHook($identify,$type=1)
    {
        $link_groups = StMultiLinkGroup::getLinkGroup($identify,$type,$this->context->language->id);
        foreach($link_groups as &$v)
        {
            $links = StMultiLinkClass::getAll($v['id_st_multi_link_group'],$this->context->language->id,1);  
            $v['links'] = $this->_prepareLinks($links);

            $v['is_stacked_footer'] = isset(self::$location[$v['location']]['is_stacked_footer']);
            $v['span'] = array_key_exists($v['location'], self::$span_map) ? self::$span_map[$v['location']] : 0;
        }
        $this->smarty->assign(array(
			'link_groups' => $link_groups,
            'is_column' => ($type!=1 || is_array($identify)) ? false : isset(self::$location[$identify]['column']),
		));
        return true;
    }
    private function _prepareLinks($links)
    {
        $result = array();
        foreach($links as $m)
        {
            if($info = self::getLinkInfo($m))
                $result[] = $info;
        }
        return $result;
    }
    
    public static function getLinkInfo($m)
    {
        $id_lang = (int)Context::getContext()->language->id;
		$theLink = new Link;

        $result = array();
        if($m['pagename'])
        {
            $catalog_mod = (bool)Configuration::isCatalogMode() || !(bool)Group::getCurrent()->show_prices;
            $catalog_mod = !(bool)Group::getCurrent()->show_prices;
            
			$voucherAllowed = CartRule::isFeatureActive();
			$returnAllowed = (int)(Configuration::get('PS_ORDER_RETURN'));
            
            if($m['pagename'] == 'prices-drop' && !$catalog_mod)
                $link = $theLink->getPageLink($m['pagename']);                
            if($m['pagename'] == 'new-products')
                $link = $theLink->getPageLink($m['pagename']);
            if($m['pagename'] == 'best-sales' && !$catalog_mod)
                $link = $theLink->getPageLink($m['pagename']);
            if($m['pagename'] == 'stores')
                $link = $theLink->getPageLink($m['pagename']);
            if($m['pagename'] == 'contact')
                $link = $theLink->getPageLink($m['pagename'], true);
            if($m['pagename'] == 'sitemap')
                $link = $theLink->getPageLink($m['pagename']);
                
            if($m['pagename'] == 'my-account')
                $link = $theLink->getPageLink($m['pagename'], true);
            if($m['pagename'] == 'history')
                $link = $theLink->getPageLink($m['pagename'], true);
            if($m['pagename'] == 'order-follow' && $returnAllowed)
                $link = $theLink->getPageLink($m['pagename'], true);
            if($m['pagename'] == 'order-slip')
                $link = $theLink->getPageLink($m['pagename'], true);
            if($m['pagename'] == 'addresses')
                $link = $theLink->getPageLink($m['pagename'], true);
            if($m['pagename'] == 'identity')
                $link = $theLink->getPageLink($m['pagename'], true);
            if($m['pagename'] == 'discount' && $voucherAllowed)
                $link = $theLink->getPageLink($m['pagename'], true);
            if($m['pagename'] == 'module-stblog-rss')
                $link = $theLink->getModuleLink('stblog','rss');
            if($m['pagename'] == 'module-stblog-default')
                $link = $theLink->getModuleLink('stblog','default');
            if($m['pagename'] == 'module-stproductcomments-list')
                $link = $theLink->getModuleLink('stproductcomments','list');
            //
            if(!isset($link)) 
                return false;
            //
            $module = new StMultiLink(); 
            
            $information = $module->getInformationLinks();
            foreach($information as $v)
                if($v['id']==$m['pagename'])
                    $result = array(
                        'url' => $link,
                        'title' => $v['title'],
                        'label' => $v['name'],
                    );
            $myAccount = $module->getMyAccountLinks();    
            foreach($myAccount as $v)
                if($v['id']==$m['pagename'])
                    $result = array(
                        'url' => $link,
                        'title' => $v['title'],
                        'label' => $v['name'],
                    ); 
            $blog = $module->getBlogLinks();    
            foreach($blog as $v)
                if($v['id']==$m['pagename'])
                    $result = array(
                        'url' => $link,
                        'title' => $v['title'],
                        'label' => $v['name'],
                    ); 
            $pcomments = $module->getPcommentsLinks();    
            foreach($pcomments as $v)
                if($v['id']==$m['pagename'])
                    $result = array(
                        'url' => $link,
                        'title' => $v['title'],
                        'label' => $v['name'],
                    ); 
        }
        elseif($m['id_supplier'])
        {
            $supplier = new Supplier((int)$m['id_supplier'], (int)$id_lang);
			if (Validate::isLoadedObject($supplier))
            {
                $result = array(
                    'url' => $theLink->getSupplierLink((int)$supplier->id, $supplier->link_rewrite),
                    'title' => $supplier->name,
                    'label' => $supplier->name,
                ); 
            }
        }
        elseif($m['id_manufacturer'])
        {
            $manufacturer = new Manufacturer((int)$m['id_manufacturer'], (int)$id_lang);
			if (Validate::isLoadedObject($manufacturer))
            {
                if (intval(Configuration::get('PS_REWRITING_SETTINGS')))
					$manufacturer->link_rewrite = Tools::link_rewrite($manufacturer->name, null);
				else
					$manufacturer->link_rewrite = 0;
                
                $result = array(
                    'url' => $theLink->getManufacturerLink((int)$manufacturer->id, $manufacturer->link_rewrite),
                    'title' => $manufacturer->name,
                    'label' => $manufacturer->name,
                ); 
            }
        }
        elseif($m['id_cms'])
        {
            $cms = CMS::getLinks((int)$id_lang, array((int)$m['id_cms']));
			if (count($cms))
                $result = array(
                    'url' => $cms[0]['link'],
                    'title' => $cms[0]['meta_title'],
                    'label' => $cms[0]['meta_title'],
                ); 
        }
        elseif($m['id_cms_category'])
        {
			$category = new CMSCategory((int)$m['id_cms_category'], (int)$id_lang);
			if (Validate::isLoadedObject($category))
                $result = array(
                    'url' => $category->getLink(),
                    'title' => $category->name,
                    'label' => $category->name,
                ); 
        }
        elseif($m['id_category'])
        {
			$category = new Category((int)$m['id_category'], (int)$id_lang);
			if (Validate::isLoadedObject($category))
                $result = array(
                    'url' => $category->getLink(),
                    'title' => $category->name,
                    'label' => $category->name,
                ); 
        }
        elseif ($m['id_st_blog_category'])
        {
            $category = new StBlogCategory((int)$m['id_st_blog_category'], (int)$id_lang);
			if (Validate::isLoadedObject($category))
                $result = array(
                    'url' => $category->getLink(),
                    'title' => $category->name,
                    'label' => $category->name,
                );
        }
        elseif($m['name'] || $m['icon_class'])//when icon is filled, name is not, means display icon not as a list arrow
        {
            $result = array(
                'url' => $m['url'],
                'title' => $m['name'],
                'label' => $m['name'],
            ); 
        }

        if(count($result))
        {
            // $m['name'] && $result['label'] = strlen($m['name']) > 120 ? Tools::truncateString($m['name']) : $m['name'];

            $result['new_window'] = $m['new_window'];
            $result['nofollow'] = $m['nofollow'];
            $result['icon_class'] = $m['icon_class'];
            return $result;
        }
        return false;
    }

    public function hookDisplayHeader($params)
    {
        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $custom_css_arr = StMultiLinkGroup::getCustomCss();
            if (is_array($custom_css_arr) && count($custom_css_arr)) {
                $custom_css = '';
                foreach ($custom_css_arr as $v) {
                    $classname = '#multilink_'.$v['id_st_multi_link_group'];

                    if ($v['font_size'])
                        $custom_css .= $classname.' .custom_links_list{font-size:'.$v['font_size'].'px;}';
                    if ($v['icon_size'])
                        $custom_css .= $classname.' .st_custom_link_icon {font-size:'.$v['icon_size'].'px;}';

                }
                if($custom_css)
                    $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
            }
        }
        
        return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
    }

    public function hookDisplayNav2($params)
    {
        return $this->hookDisplayTop($params, 1);
    }
    public function hookDisplayNav1($params, $location='')
    {
        return $this->hookDisplayTop($params, 9);
    }
    public function hookDisplayNav3($params)
    {
        return $this->hookDisplayTop($params, 40);
    }
    
    public function hookDisplayTop($params, $location='')
    {
        $location = $location ? $location : 31;
        if (!$this->isCached('stmultilink-top.tpl', $this->stGetCacheId($location)))
            $this->_prepareHook($location, 1);
        return $this->display(__FILE__, 'stmultilink-top.tpl', $this->stGetCacheId($location));
    }
    public function hookDisplayHeaderLeft($params)
    {
        return $this->hookDisplayTop($params, 32);
    }
    public function hookDisplayHeaderBottom($params)
    {
        return $this->hookDisplayTop($params, 33);
    }
    public function hookDisplayCheckoutHeader($params)
    {
        return $this->hookDisplayTop($params, 34);
    }
    public function hookDisplayCheckoutMobileNav($params)
    {
        if (!$this->isCached('stmultilink-mobile.tpl', $this->stGetCacheId(34)))
            $this->_prepareHook(34,1);
        return $this->display(__FILE__, 'stmultilink-mobile.tpl', $this->stGetCacheId(34));
    }
    public function hookDisplayMobileNav($params)
    {
        if (!$this->isCached('stmultilink-mobile.tpl', $this->stGetCacheId(0)))
            $this->_prepareHook(array(1,9,31,32,33),1);
        return $this->display(__FILE__, 'stmultilink-mobile.tpl', $this->stGetCacheId(0));
    }

	public function hookDisplayLeftColumn($params, $location='')
	{
	    $location = $location ? $location : 2;
		if (!$this->isCached('stmultilink.tpl', $this->stGetCacheId($location)))
            $this->_prepareHook($location, 1);
		return $this->display(__FILE__, 'stmultilink.tpl', $this->stGetCacheId($location));
	}
	public function hookDisplayRightColumn($params)
	{
		return $this->hookDisplayLeftColumn($params, 4);
	}
    public function hookDisplayLeftColumnProduct($params)
	{
		return $this->hookDisplayLeftColumn($params, 41);
	}
    public function hookDisplayRightColumnProduct($params)
	{
		return $this->hookDisplayLeftColumn($params, 42);
	}
    public function hookDisplayProductRightColumn($params)
	{
		return $this->hookDisplayLeftColumn($params, 43);
	}
    public function hookDisplayHomeFirstQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params, 24);
    }
    public function hookDisplayHomeSecondQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params, 25);
    }

    public function hookDisplayHomeThirdQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params, 26);
    }
    public function hookDisplayHomeFourthQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params, 30);
    }
    public function hookDisplayStackedFooter1($params)
    {
        return $this->hookDisplayFooter($params, 6);
    }
    public function hookDisplayStackedFooter2($params)
    {
        return $this->hookDisplayFooter($params, 10);
    }
    public function hookDisplayStackedFooter3($params)
    {
        return $this->hookDisplayFooter($params, 26);
    }
    public function hookDisplayStackedFooter4($params)
    {
        return $this->hookDisplayFooter($params, 11);
    }
    public function hookDisplayStackedFooter5($params)
    {
        return $this->hookDisplayFooter($params, 12);
    }
	public function hookDisplayStackedFooter6($params)
	{
		return $this->hookDisplayFooter($params, 13);
	}
	public function hookDisplayFooter($params, $location=array())
	{
	    $location = $location ? $location : array(3, 14, 15, 16, 17,27);
        $cache_id = is_array($location) ? implode('', $location) : $location;
		if (!$this->isCached('stmultilink-footer.tpl', $this->stGetCacheId($cache_id)))
            $this->_prepareHook($location, 1);
		return $this->display(__FILE__, 'stmultilink-footer.tpl', $this->stGetCacheId($cache_id));
	}
    public function hookDisplayFooterAfter($params)
    {
        return $this->hookDisplayFooter($params, array(5, 18, 19, 20, 21,28));
    }
    public function hookDisplayFooterBottomRight($params, $location='')
    {
        $location = $location ? $location : 22;
        if (!$this->isCached('stmultilink-footer-bottom.tpl', $this->stGetCacheId($location)))
            $this->_prepareHook($location, 1);
        return $this->display(__FILE__, 'stmultilink-footer-bottom.tpl', $this->stGetCacheId($location));
    }
	public function hookDisplayFooterBottomLeft($params)
	{
		return $this->hookDisplayFooterBottomRight($params, 23);
	}
	public function hookDisplayStBlogLeftColumn($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
		return $this->hookDisplayLeftColumn($params, 7);
	}
	public function hookDisplayStBlogRightColumn($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
		return $this->hookDisplayLeftColumn($params, 8);
	}
    
	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'st_multi_link_group_shop (id_st_multi_link_group, id_shop)
		SELECT id_st_multi_link_group, '.(int)$params['new_id_shop'].'
		FROM '._DB_PREFIX_.'st_multi_link_group_shop
		WHERE id_shop = '.(int)$params['old_id_shop']);
        $this->clearMultiLinkCache();
    }
    
	protected function stGetCacheId($key,$type='location',$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key.'_'.$type;
	}
	private function clearMultiLinkCache()
	{
		$this->_clearCache('*');
	}
    
	public function getContent()
	{
		$this->context->controller->addJS(($this->_path).'views/js/admin.js');
        $this->context->controller->addCSS(($this->_path).'views/css/admin.css');
        $id_st_multi_link_group = (int)Tools::getValue('id_st_multi_link_group');
        $id_st_multi_link = (int)Tools::getValue('id_st_multi_link');
	    if ((Tools::isSubmit('groupstatusstmultilink')))
        {
            $link_group = new StMultiLinkGroup((int)$id_st_multi_link_group);
            if($link_group->id && $link_group->toggleStatus())
            {
                $this->clearMultiLinkCache();
                //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('the status has been updated successfully.', array(), 'Admin.Theme.Transformer'));
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
	    if ((Tools::isSubmit('linkstatusstmultilink')))
        {
            $link = new StMultiLinkClass((int)$id_st_multi_link);
            if($link->id && $link->toggleStatus())
            {
                //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('the status has been updated successfully.', array(), 'Admin.Theme.Transformer'));  
                $this->clearMultiLinkCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_multi_link_group='.$link->id_st_multi_link_group.'&viewstmultilink&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if (Tools::isSubmit('way') && Tools::isSubmit('id_st_multi_link') && Tools::isSubmit('position'))
		{
		    $link = new StMultiLinkClass((int)$id_st_multi_link);
            if($link->id && $link->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position')))
            {
                //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('the status has been updated successfully.', array(), 'Admin.Theme.Transformer'));  
                $this->clearMultiLinkCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_multi_link_group='.$link->id_st_multi_link_group.'&viewstmultilink&token='.Tools::getAdminTokenLite('AdminModules'));                
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('failed to update the position.', array(), 'Admin.Theme.Transformer'));
		}
        if (Tools::getValue('action') == 'updatePositions')
        {
            $this->processUpdatePositions();
        }
		if (isset($_POST['savestmultilinkgroup']) || isset($_POST['savestmultilinkgroupAndStay']))
		{
            if ($id_st_multi_link_group)
				$link_group = new StMultiLinkGroup((int)$id_st_multi_link_group);
			else
				$link_group = new StMultiLinkGroup();
            
    		$link_group->copyFromPost();
            
            $error = array();
            /*$defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));
            if(!$link_group->name[$defaultLanguage->id])
                $error[] = $this->displayError($this->getTranslator()->trans('The field "Link group name" is required at least in ', array('$s$'=>$defaultLanguage->name), 'Admin.Theme.Transformer'));*/

			if (!count($error) && $link_group->validateFields(false) && $link_group->validateFieldsLang(false))
            {
                $shop_ids = $link_group->getShopIds();
                $link_group->clearShopIds();
                $id_shop_list = array();
                if($assos_shop = Tools::getValue('checkBoxShopAsso_st_multi_link_group')) {
                    foreach ($assos_shop as $id_shop => $row) {
                        $id_shop_list[] = $id_shop;
                    }
                }
                if (!$id_shop_list) {
                    $id_shop_list = array(Context::getContext()->shop->id);
                }
                $link_group->id_shop_list = array_unique($id_shop_list);
                if($link_group->save())
                {
                    $this->prepareHooks();
                    $this->clearMultiLinkCache();
                    if(isset($_POST['savestmultilinkgroupAndStay']) || Tools::getValue('fr') == 'view')
                    {
                        $rd_str = isset($_POST['savestmultilinkgroupAndStay']) && Tools::getValue('fr') == 'view' ? 'fr=view&update' : (isset($_POST['savestmultilinkgroupAndStay']) ? 'update' : 'view');
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_multi_link_group='.$link_group->id.'&conf='.($id_st_multi_link_group?4:3).'&'.$rd_str.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
                    }    
                    else
                        $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Link group', array(), 'Modules.Stmultilink.Admin').' '.($id_st_multi_link_group ? $this->gettranslator()->trans('updated', array(), 'Modules.Stmultilink.Admin') : $this->gettranslator()->trans('added', array(), 'Modules.Stmultilink.Admin')));
                }
                else {
                    $link_group->restoreShopIds($shop_ids);
                    $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred during link group', array(), 'Modules.Stmultilink.Admin').' '.($id_st_multi_link_group ? $this->gettranslator()->trans('updating', array(), 'Modules.Stmultilink.Admin') : $this->gettranslator()->trans('creation', array(), 'Modules.Stmultilink.Admin')));
                }   
            }
			else
				$this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
		if (isset($_POST['savestmultilink']) || isset($_POST['savestmultilinkAndStay']))
		{
            if ($id_st_multi_link)
				$link = new StMultiLinkClass((int)$id_st_multi_link);
			else
				$link = new StMultiLinkClass();
            /**/
            
            $link->copyFromPost();
            
            $error = array();
            if(!$link->id_st_multi_link_group)
                $error[] = $this->displayError($this->getTranslator()->trans('The field "link group" is required', array(), 'Modules.Stmultilink.Admin'));
            
            $link->id_category = $link->id_cms = $link->id_cms_category = $link->id_supplier = $link->id_manufacturer = 0;
            $link->pagename = '';
            if($links = Tools::getValue('links'))
            {
			     preg_match($this->pattern, $links, $values);
                 if(count($values))
                 {
                    switch($values[1])
                    {
                        case 1:
                            $link->id_cms_category = (int)$values[2];
                        break;
                        case 2:
                            $link->id_cms = (int)$values[2];
                        break;
                        case 3:
                            $link->id_supplier = (int)$values[2];
                        break;
                        case 4:
                            $link->id_manufacturer = (int)$values[2];
                        break;
                        case 5:
                            $link->id_category = (int)$values[2];
                        case 6:
                            $link->id_st_blog_category = (int)$values[2];
                        break;
                    }
                 }
                 else
                    $link->pagename = $links;
                 
                 $languages = Language::getLanguages(false);
                 foreach ($languages as $lang)
                 {
                    $link->url[(int)$lang['id_lang']] = '';
                 }                 
            }
			if (!count($error) && $link->validateFields(false) && $link->validateFieldsLang(false))
            {
                /*position*/
                $link->position = $link->checkPostion();
                if($link->save())
                {
                    $this->clearMultiLinkCache();
                    //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Link', array(), 'Admin.Theme.Transformer').' '.($id_st_multi_link ? $this->gettranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('added', array(), 'Admin.Theme.Transformer')));
                    if(isset($_POST['savestmultilinkAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_multi_link='.$link->id.'&conf='.($id_st_multi_link?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_multi_link_group='.$link->id_st_multi_link_group.'&viewstmultilink&token='.Tools::getAdminTokenLite('AdminModules')); 
                    
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred during link', array(), 'Modules.Stmultilink.Admin').' '.($id_st_multi_link ? $this->gettranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
			else
				$this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        
		if (Tools::isSubmit('addstmultilinkgroup') || (Tools::isSubmit('updatestmultilink') && $id_st_multi_link_group))
		{
            $helper = $this->initForm();
            return $helper->generateForm($this->fields_form);
		}
        elseif(Tools::isSubmit('addstmultilink') || (Tools::isSubmit('updatestmultilink') && $id_st_multi_link))
        {
            $helper = $this->initFormLink();
            $this->_html .= $this->getNavigate($helper->tpl_vars['fields_value']['id_st_multi_link_group']); 
            return $this->_html.$helper->generateForm($this->fields_form_link);
        }
        elseif(Tools::isSubmit('viewstmultilink'))
        {
            $this->_html .= '<script type="text/javascript">var currentIndex="'.AdminController::$currentIndex.'&configure='.$this->name.'";</script>';
			$link_group = new StMultiLinkGroup($id_st_multi_link_group);
            if(!$link_group->isAssociatedToShop())
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            $this->_html .= $this->getNavigate($id_st_multi_link_group);    
			$helper = $this->initListLink();
			return $this->_html.$helper->generateList(StMultiLinkClass::getAll($id_st_multi_link_group,(int)$this->context->language->id), $this->fields_list);
        }
		else if (Tools::isSubmit('deletestmultilink') && $id_st_multi_link)
		{
			$link = new StMultiLinkClass($id_st_multi_link);
            $id_st_multi_link_group = $link->id_st_multi_link_group;
            $link->delete();
            
            $this->clearMultiLinkCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_multi_link_group='.$id_st_multi_link_group.'&viewstmultilink&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else if (Tools::isSubmit('deletestmultilink') && $id_st_multi_link_group)
		{
			$link_group = new StMultiLinkGroup($id_st_multi_link_group);
            $link_group->delete();
            
            $this->prepareHooks();
            $this->clearMultiLinkCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else
		{
			$helper = $this->initList();
			return $this->_html.$helper->generateList(StMultiLinkGroup::getAll($this->context->language->id), $this->fields_list);
		}
	}

    public static function showApplyTo($value,$row)
    {
	    if(isset(self::$location[$value]))
		   $result = self::$location[$value]['name'];
        else
        {
            $result = Context::getContext()->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer');
        }
        return $result;
    }
    
	protected function initList()
	{
		$this->fields_list = array(
			'id_st_multi_link_group' => array(
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
                'callback' => 'purifyName',
				'callback_object' => 'StMultiLink',
                'search' => false,
                'orderby' => false
			),
			'location' => array(
				'title' => $this->getTranslator()->trans('Display on', array(), 'Admin.Theme.Transformer'),
				'width' => 200,
				'type' => 'text',
				'callback' => 'showApplyTo',
				'callback_object' => 'StMultiLink',
                'search' => false,
                'orderby' => false
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
		$helper->identifier = 'id_st_multi_link_group';
		$helper->actions = array('view', 'edit', 'delete');
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstmultilinkgroup&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add new group', array(), 'Modules.Stmultilink.Admin'),
		);

		$helper->title = $this->displayName;
		$helper->table = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    
	protected function initForm()
	{        
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTransLator()->trans('Link Group', array(), 'Modules.Stmultilink.Admin'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'textarea',
					'label' => $this->getTranslator()->trans('Link group name:', array(), 'Modules.Stmultilink.Admin'),
					'name' => 'name',
                    'lang' => true,
                    'cols' => 60,
					'rows' => 2,
                    'desc' => $this->getTranslator()->trans('Text and HTML are accept.', array(), 'Modules.Stmultilink.Admin')
				),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Link:', array(), 'Admin.Theme.Transformer'),
					'name' => 'url',
                    'size' => 64,
                    'lang' => true,
                    
				),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Display on:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'location',
                    'options' => array(
                        'query' => self::$location,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    'desc' => '<div class="alert alert-info"><a href="javascript:;" onclick="$(\'#des_page_layout\').toggle();return false;">'.$this->getTranslator()->trans('click here to see hook position', array(), 'Admin.Theme.Transformer').'</a>'.
                        '<div id="des_page_layout" style="display:none;"><img src="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" /></div></div>',
                ),
                array(
                    'type' => 'fontello',
                    'label' => $this->getTranslator()->trans('Icon:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'icon_class',
                    'values' => $this->get_fontello(),
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Font size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'font_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'icon_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Sub-links alignment:', array(), 'Modules.Stmultilink.Admin'),
                    'name' => 'link_align',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'link_align_left',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'link_align_center',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
                    ),
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
                    'label' => $this->getTranslator()->trans('No follow:', array(), 'Modules.Stmultilink.Admin'),
                    'name' => 'nofollow',
                    'is_bool' => true,
                    'default_value' => 1,
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
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('hide on mobile devices:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'hide_on_mobile',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'hide_on_mobile_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_off',
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
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        $id_st_multi_link_group = (int)Tools::getValue('id_st_multi_link_group');
		$link_group = new StMultiLinkGroup($id_st_multi_link_group);
        if($link_group->id)
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_multi_link_group');
        }
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->id = (int)$id_st_multi_link_group;
        $helper->module = $this;
		$helper->table =  'st_multi_link_group';
		$helper->identifier = 'id_st_multi_link_group';
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->submit_action = 'savestmultilinkgroup';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($link_group),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    
    public static function showLinkGroupName($value,$row)
    {
        $link_group = new StMultiLinkGroup((int)$value,Context::getContext()->language->id);
        return $link_group->id ? $link_group->name : '-';
    }
    
    public static function showLinkName($value,$row)
    {
        $info = self::getLinkInfo($row);
        return $info ? $info['label'] : '-';
    }
    
    public static function showLinkUrl($value,$row)
    {
        $info = self::getLinkInfo($row);
        return $info ? $info['url'] : '-';
    }
    
	protected function initListLink()
	{
	    // Fix table drag bug.
        Media::addJsDef(array(
            'currentIndex' => AdminController::$currentIndex.'&configure='.$this->name,
        ));
		$this->fields_list = array(
			'id_st_multi_link' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false,
			),
			'name' => array(
				'title' => $this->gettranslator()->trans('name', array(), 'Admin.Theme.Transformer'),
				'width' => 200,
				'type' => 'text',
				'callback' => 'showLinkName',
				'callback_object' => 'StMultiLink',
                'search' => false,
                'orderby' => false
			),
            'url' => array(
                'title' => $this->gettranslator()->trans('url', array(), 'Admin.Theme.Transformer'),
                'width' => 200,
                'type' => 'text',
                'callback' => 'showLinkUrl',
                'callback_object' => 'StMultiLink',
                'search' => false,
                'orderby' => false
            ),
            'icon_class' => array(
                'title' => $this->gettranslator()->trans('Icon class name', array(), 'Modules.Stmultilink.Admin'),
                'width' => 120,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
			'id_st_multi_link_group' => array(
				'title' => $this->getTranslator()->trans('Link group', array(), 'Modules.Stmultilink.Admin'),
				'width' => 120,
				'type' => 'text',
				'callback' => 'showLinkGroupName',
				'callback_object' => 'StMultiLink',
                'search' => false,
                'orderby' => false
			),
            'position' => array(
				'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
				'width' => 40,
				'position' => 'position',
				'align' => 'left',
                'search' => false,
                'orderby' => false
            ),
            'active' => array(
				'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
				'align' => 'center',
				'active' => 'linkstatus',
				'type' => 'bool',
				'width' => 25,
                'search' => false,
                'orderby' => false
            ),
		);

		$helper = new HelperList();
		$helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_multi_link';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstmultilink&id_st_multi_link_group='.(int)Tools::getValue('id_st_multi_link_group').'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add new link', array(), 'Modules.Stmultilink.Admin')
		);
        $helper->toolbar_btn['edit'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&update'.$this->name.'&id_st_multi_link_group='.(int)Tools::getValue('id_st_multi_link_group').'&fr=view&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Edit group', array(), 'Modules.Stmultilink.Admin'),
		);
		$helper->toolbar_btn['back'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer')
		);

		$helper->title = $this->displayName;
		$helper->table = $this->name;
		$helper->orderBy = 'position';
		$helper->orderWay = 'ASC';
	    $helper->position_identifier = 'id_st_multi_link';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    public function getMyAccountLinks()
    {
        return array(
            array('id'=>'my-account', 'name'=>$this->getTranslator()->trans('My account', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('manage my customer account', array(), 'Shop.Theme.Transformer')),
            array('id'=>'history', 'name'=>$this->getTranslator()->trans('My orders', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My orders', array(), 'Shop.Theme.Transformer')),
            array('id'=>'order-follow', 'name'=>$this->getTranslator()->trans('my merchandise returns', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My returns', array(), 'Shop.Theme.Transformer')),
            array('id'=>'order-slip', 'name'=>$this->getTranslator()->trans('My credit slips', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My credit slips', array(), 'Shop.Theme.Transformer')),
            array('id'=>'addresses', 'name'=>$this->getTranslator()->trans('My addresses', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My addresses', array(), 'Shop.Theme.Transformer')),
            array('id'=>'identity', 'name'=>$this->getTranslator()->trans('My personal info', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('manage my personal information', array(), 'Shop.Theme.Transformer')),
            array('id'=>'discount', 'name'=>$this->getTranslator()->trans('My vouchers', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My vouchers', array(), 'Shop.Theme.Transformer')),
        );
    }
    public function getInformationLinks()
    {
        return array(
            array('id'=>'prices-drop', 'name'=>$this->getTranslator()->trans('Specials', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Specials', array(), 'Shop.Theme.Transformer')),
            array('id'=>'new-products', 'name'=>$this->getTranslator()->trans('New products', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('New products', array(), 'Shop.Theme.Transformer')),
            array('id'=>'best-sales', 'name'=>$this->getTranslator()->trans('Top sellers', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Top sellers', array(), 'Shop.Theme.Transformer')),
            array('id'=>'stores', 'name'=>$this->getTranslator()->trans('Our stores', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Our stores', array(), 'Shop.Theme.Transformer')),
            array('id'=>'contact', 'name'=>$this->getTranslator()->trans('Contact us', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Contact us', array(), 'Shop.Theme.Transformer')),
            array('id'=>'sitemap', 'name'=>$this->getTranslator()->trans('Sitemap', array(), 'Shop.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Sitemap', array(), 'Shop.Theme.Transformer')),
        );
    }
    public function getBlogLinks()
    {
        if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return array();
            
        return array(
            array('id'=>'module-stblog-default', 'name'=>$this->getTranslator()->trans('Blog', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Blog', array(), 'Modules.Stmultilink.Admin')),
            array('id'=>'module-stblog-rss', 'name'=>$this->getTRAnslator()->trans('RSS feeds for posts', array(), 'Modules.Stmultilink.Admin'), 'title'=>$this->getTRAnslator()->trans('RSS feeds for posts', array(), 'Modules.Stmultilink.Admin')),
        );
    }
    public function getPcommentsLinks()
    {
        if(!Module::isInstalled('stproductcomments') || !Module::isEnabled('stproductcomments'))
            return array();
            
        return array(
            array('id'=>'module-stproductcomments-list', 'name'=>$this->getTranslator()->trans('Testimonial', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Testimonial', array(), 'Modules.Stmultilink.Admin')),
        );
    }
    public function createLinks()
    {
        $id_lang = $this->context->language->id;
        $category_arr = array();
		$this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(), true);
        
        $supplier_arr = array();
		$suppliers = Supplier::getSuppliers(false, $id_lang);
		foreach ($suppliers as $supplier)
            $supplier_arr[] = array('id'=>'3_'.$supplier['id_supplier'],'name'=>$supplier['name']);
            
        $manufacturer_arr = array();
		$manufacturers = Manufacturer::getManufacturers(false, $id_lang);
		foreach ($manufacturers as $manufacturer)
            $manufacturer_arr[] = array('id'=>'4_'.$manufacturer['id_manufacturer'],'name'=>$manufacturer['name']);
  
        $cms_arr = array();
		$this->getCMSOptions($cms_arr, 0, 1, $id_lang);
        
        $blog_category_arr = array();
        $this->getBlogCategoryOption($blog_category_arr, StBlogCategory::getTopCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(), true);
        
        return array(
            array('name'=>$this->getTranslator()->trans('Information', array(), 'Admin.Theme.Transformer'),'query'=>$this->getInformationLinks()),
            array('name'=>$this->getTranslator()->trans('My account', array(), 'Admin.Theme.Transformer'),'query'=>$this->getMyAccountLinks()),
            array('name'=>$this->getTranslator()->trans('Supplier', array(), 'Admin.Theme.Transformer'),'query'=>$supplier_arr),
            array('name'=>$this->getTranslator()->trans('Manufacturer', array(), 'Admin.Theme.Transformer'),'query'=>$manufacturer_arr),
            array('name'=>$this->getTRAnslator()->trans('CMS', array(), 'Admin.Theme.Transformer'),'query'=>$cms_arr),
            array('name'=>$this->getTranslator()->trans('Category', array(), 'Admin.Theme.Transformer'),'query'=>$category_arr),
            array('name'=>$this->getTranslator()->trans('Reviews', array(), 'Admin.Theme.Transformer'),'query'=>$this->getPcommentsLinks()),
            array('name'=>$this->getTranslator()->trans('Blog', array(), 'Admin.Theme.Transformer'),'query'=>$this->getBlogLinks()),
            array('name'=>$this->getTranslator()->trans('Blog category', array(), 'Admin.Theme.Transformer'),'query'=>$blog_category_arr),
        );
    }
    private function getBlogCategoryOption(&$category_arr, $id_st_blog_category = 1, $id_lang = false, $id_shop = false, $recursive = true)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$category = new StBlogCategory((int)$id_st_blog_category, (int)$id_lang, (int)$id_shop);

		if (is_null($category->id))
			return;

		if ($recursive)
		{
			$children = StBlogCategory::getChildren((int)$id_st_blog_category, (int)$id_lang, (int)$id_shop, true);
			$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$category->level_depth);
		}

		$shop = (object) Shop::getShop($id_shop);
		$category_arr[] = array('id'=>'6_'.(int)$category->id,'name'=>(isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')');

		if (isset($children) && is_array($children) && count($children))
			foreach ($children as $child)
			{
				$this->getBlogCategoryOption($category_arr, (int)$child['id_st_blog_category'], (int)$id_lang, (int)$child['id_shop'], $recursive);
			}
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
		$category_arr[] = array('id'=>'5_'.(int)$category->id,'name'=>(isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')');

		if (isset($children) && is_array($children) && count($children))
			foreach ($children as $child)
			{
				$this->getCategoryOption($category_arr, (int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],$recursive);
			}
	}
	private function getCMSOptions(&$cms_arr, $parent = 0, $depth = 1, $id_lang = false)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

		$categories = $this->getCMSCategories(false, (int)$parent, (int)$id_lang);
		$pages = $this->getCMSPages((int)$parent, false, (int)$id_lang);

		$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$depth);

		foreach ($categories as $category)
		{
            $cms_arr[] = array('id'=>'1_'.$category['id_cms_category'],'name'=>$spacer.$category['name']);
			$this->getCMSOptions($cms_arr, $category['id_cms_category'], (int)$depth + 1, (int)$id_lang);
		}

		foreach ($pages as $page)
            $cms_arr[] = array('id'=>'2_'.$page['id_cms'],'name'=>$spacer.$page['meta_title']);
	}
	
	private function getCMSCategories($recursive = false, $parent = 1, $id_lang = false)
	{
        $id_shop = (int)Context::getContext()->shop->id;
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
            AND cs.`id_shop` = '.(int)$id_shop.
            (version_compare(_PS_VERSION_, '1.6.0.12', '>=') ? ' AND cl.`id_shop` = '.(int)$id_shop : '' ).' 
			AND cl.`id_lang` = '.(int)$id_lang.'
			AND c.`active` = 1
			ORDER BY `position`';

		return Db::getInstance()->executeS($sql);
	}
	protected function initFormLink()
	{
        $id_st_multi_link = (int)Tools::getValue('id_st_multi_link');
        $id_st_multi_link_group = (int)Tools::getValue('id_st_multi_link_group');
		$link = new StMultiLinkClass($id_st_multi_link);
        $groups = StMultiLinkGroup::getAll($this->context->language->id);
        foreach ($groups as &$v) {
            $v['name'] .= '(ID='.$v['id_st_multi_link_group'].')';
        }
		$this->fields_form_link[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Link item', array(), 'Modules.Stmultilink.Admin'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'select',
        			'label' => $this->getTranslator()->trans('Link group:', array(), 'Modules.Stmultilink.Admin'),
        			'name' => 'id_st_multi_link_group',
                    'required' => true,
                    'autocomplete' => false,
                    'options' => array(
        				'query' => $groups,
        				'id' => 'id_st_multi_link_group',
        				'name' => 'name',
						'default' => array(
							'value' => 0,
							'label' => $this->getTranslator()->trans('Please select', array(), 'Modules.Stmultilink.Admin')
						)
        			)
				),
                'links' => array(
					'type' => 'select',
        			'label' => $this->getTranslator()->trans('Links:', array(), 'Admin.Theme.Transformer'),
        			'name' => 'links',
                    'autocomplete' => false,
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
							'label' => $this->getTranslator()->trans('Select an option here or fill in the name field', array(), 'Modules.Stmultilink.Admin'),
						),
        			)
				),
                array(
					'type' => 'textarea',
					'label' => $this->getTranslatOr()->trans('Label / Overwrite name:', array(), 'Modules.Stmultilink.Admin'),
					'name' => 'name',
                    'lang' => true,
                    'cols' => 60,
					'rows' => 2,
                    'desc' => array(
                        $this->getTranslator()->trans('Text and HTML are accept.', array(),  'Admin.Theme.Transformer'),
                        $this->getTranslator()->trans('This filed is required if you don not choose a link from the above "Links" drop down list.', array(), 'Modules.Stmultilink.Admin'),
                        $this->getTranslator()->trans('If you have chosen a link above, you can also fill in this field to overwrite the link\'s name.', array(), 'Modules.Stmultilink.Admin'),
                        ),
				),
                'url' => array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Link:', array(), 'Admin.Theme.Transformer'),
					'name' => 'url',
                    'size' => 64,
                    'lang' => true,
                    'autocomplete' => false,
				),
                array(
                    'type' => 'fontello',
                    'label' => $this->getTranslator()->trans('Icon:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'icon_class',
                    'default_value' => 'fto-angle-right',
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
							'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stmultilink.Admin')),
						array(
							'id' => 'new_window_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
					),
				), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('No follow:', array(), 'Modules.Stmultilink.Admin'),
                    'name' => 'nofollow',
                    'is_bool' => true,
                    'default_value' => 1,
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
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&id_st_multi_link_group='.$link->id_st_multi_link_group.'&viewstmultilink&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
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
        
        if($link->id)
        {
            $this->fields_form_link[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_multi_link');
            $isDisabled = $link->pagename || $link->id_cms_category || $link->id_cms || $link->id_supplier || $link->id_manufacturer || $link->id_category;
            $this->fields_form_link[0]['form']['input']['url']['disabled'] = $isDisabled;
        }
        elseif($id_st_multi_link_group)
            $link->id_st_multi_link_group = $id_st_multi_link_group;
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestmultilink';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($link,"fields_form_link"),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
        if($link->id)
        {
            if($link->pagename)
                $helper->tpl_vars['fields_value']['links'] = $link->pagename;
            elseif($link->id_cms_category)
                $helper->tpl_vars['fields_value']['links'] = '1_'.$link->id_cms_category;
            elseif($link->id_cms)
                $helper->tpl_vars['fields_value']['links'] = '2_'.$link->id_cms;
            elseif($link->id_supplier)
                $helper->tpl_vars['fields_value']['links'] = '3_'.$link->id_supplier;
            elseif($link->id_manufacturer)
                $helper->tpl_vars['fields_value']['links'] = '4_'.$link->id_manufacturer;
            elseif($link->id_category)
                $helper->tpl_vars['fields_value']['links'] = '5_'.$link->id_category;
            elseif($link->id_st_blog_category)
                $helper->tpl_vars['fields_value']['links'] = '6_'.$link->id_st_blog_category;
        }
		return $helper;
	}
    
	
	public function hookActionObjectCmsUpdateAfter($params)
	{
		$this->clearMultiLinkCache();
	}
	
	public function hookActionObjectCmsDeleteAfter($params)
	{
		$this->clearMultiLinkCache();
        if(!$params['object']->id)
            return ;
        StMultiLinkClass::deleteByCmsId((int)$params['object']->id);
	}
	
	public function hookActionObjectCategoryUpdateAfter($params)
	{
		$this->clearMultiLinkCache();
	}
    
    public function hookActionObjectCategoryDeleteAfter($params)
	{
		$this->clearMultiLinkCache();
        if(!$params['object']->id)
            return ;
        StMultiLinkClass::deleteByCategoryId((int)$params['object']->id);
	}
	
	public function hookActionObjectSupplierUpdateAfter($params)
	{
		$this->clearMultiLinkCache();
	}
	
	public function hookActionObjectSupplierDeleteAfter($params)
	{
		$this->clearMultiLinkCache();
        if(!$params['object']->id)
            return ;
        StMultiLinkClass::deleteBySupplierId((int)$params['object']->id);
	}	

	public function hookActionObjectManufacturerUpdateAfter($params)
	{
		$this->clearMultiLinkCache();
	}
	
	public function hookActionObjectManufacturerDeleteAfter($params)
	{
		$this->clearMultiLinkCache();
        if(!$params['object']->id)
            return ;
        StMultiLinkClass::deleteByManufacturerId((int)$params['object']->id);
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
    
    public function processUpdatePositions()
	{
		if (Tools::getValue('action') == 'updatePositions' && Tools::getValue('ajax'))
		{
			$way = (int)(Tools::getValue('way'));
			$id = (int)(Tools::getValue('id'));
			$positions = Tools::getValue('st_multi_link');
            $msg = '';
			if (is_array($positions))
				foreach ($positions as $position => $value)
				{
					$pos = explode('_', $value);

					if ((isset($pos[2])) && ((int)$pos[2] === $id))
					{
						if ($object = new StMultiLinkClass((int)$pos[2]))
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
    
    public function prepareHooks()
    {
        $location = array();
        $rows = Db::getInstance()->executeS('SELECT location FROM `'._DB_PREFIX_.'st_multi_link_group` g
            LEFT JOIN `'._DB_PREFIX_.'st_multi_link_group_shop` gs
            ON g.`id_st_multi_link_group` = gs.`id_st_multi_link_group`
            WHERE gs.`id_shop`='.(int)$this->context->shop->id);
        foreach($rows AS $value)
            if (key_exists($value['location'], self::$location) && isset(self::$location[$value['location']]['hook']))
            {
                $location[] = self::$location[$value['location']]['hook'];
                if(isset(self::$location[$value['location']]['alias']))
                    $location[] = self::$location[$value['location']]['alias'];
            }
        
        foreach(self::$location AS $local)
        {
            if (!isset($local['hook']))
                continue;
            
            $this->_processHook('display'.ucfirst($local['hook']), count($location) && in_array($local['hook'], $location));
            if(isset($local['alias']))
                $this->_processHook('display'.ucfirst($local['alias']), count($location) && in_array($local['alias'], $location));
        }
        Cache::clean('hook_module_list');
        return true;
    }
    private function _processHook($hook='', $value=1)
    {
        if (!$hook)
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

    public function getNavigate($id_st_multi_link_group=0)
    {
        $navs = array();
        $navs[] = '<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'">'.$this->getTranslator()->trans('Home', array(), 'Admin.Theme.Transformer').'</a>';
        $link_group = new StMultiLinkGroup((int)$id_st_multi_link_group, $this->context->language->id);
        $navs[] = $link_group->name;
        $this->smarty->assign('navigate', $navs);
        return $this->display(__FILE__, 'bo_navigation.tpl');
    }
    public function renderWidget($hookName = null, array $configuration = [])
    {
        return;
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return;
    }
    public static function purifyName($value, $row)
    {
        if (strlen($value) > 120) {
            return Tools::truncateString($value);
        }
        return $value;
    }
}
