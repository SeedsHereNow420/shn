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
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Core\Product\ProductExtraContent;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
require (dirname(__FILE__).'/classes/StProductCommentClass.php');
require (dirname(__FILE__).'/classes/StProductCommentCriterionClass.php');

class StProductComments extends Module implements WidgetInterface
{
    private $_html = '';
    protected static $access_rights = 0775;
    protected $secure_key;
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    private $_prefix_st = 'ST_PROD_C_';
    public $_prefix_stsn = 'STSN_PROD_C_';
    private $_hooks = array();
    public  static $text_width = array();
    public static $wide_map = array(
        array('id'=>'1', 'name'=>'1/12'),
        array('id'=>'1-2', 'name'=>'1.2/12'),
        array('id'=>'1-5', 'name'=>'1.5/12'),
        array('id'=>'2', 'name'=>'2/12'),
        array('id'=>'2-4', 'name'=>'2.4/12'),
        array('id'=>'3', 'name'=>'3/12'),
        array('id'=>'4', 'name'=>'4/12'),
        array('id'=>'5', 'name'=>'5/12'),
        array('id'=>'6', 'name'=>'6/12'),
        array('id'=>'7', 'name'=>'7/12'),
        array('id'=>'8', 'name'=>'8/12'),
        array('id'=>'9', 'name'=>'9/12'),
        array('id'=>'10', 'name'=>'10/12'),
        array('id'=>'11', 'name'=>'11/12'),
        array('id'=>'12', 'name'=>'12/12'),
    );
    public $sort_order = array();

    protected $fields_default_stsn = array(
        'pro_per_fw' => 0,
        'pro_per_xxl' => 5,
        'pro_per_xl' => 4,
        'pro_per_lg' => 4,
        'pro_per_md' => 3,
        'pro_per_sm' => 2,
        'pro_per_xs' => 1,
    );
	public function __construct()
	{
		$this->name          = 'stproductcomments';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0.2';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap	 = true;
		
		$this->secure_key = Tools::encrypt($this->name);
		parent::__construct();
		
        $this->displayName = $this->getTranslator()->trans('Product Comments', array(), 'Modules.Stproductcomments.Admin');
        $this->description = $this->getTranslator()->trans('Allows users to post comments for products after placed orders.', array(), 'Modules.Stproductcomments.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->controllers = array('list','detail');

        $this->sort_order = array(
            array('id'=>0, 'name'=>$this->getTranslator()->trans('Popularity', array(), 'Modules.Stproductcomments.Admin')),
            array('id'=>1, 'name'=>$this->getTranslator()->trans('Most helpful', array(), 'Modules.Stproductcomments.Admin')),
            array('id'=>2, 'name'=>$this->getTranslator()->trans('Newest', array(), 'Modules.Stproductcomments.Admin')),
            array('id'=>3, 'name'=>$this->getTranslator()->trans('Oldest', array(), 'Modules.Stproductcomments.Admin')),
            array('id'=>4, 'name'=>$this->getTranslator()->trans('Most commented', array(), 'Modules.Stproductcomments.Admin')),
        );
        
        self::$text_width = array(
            array('id' => 90, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 90%'),
            array('id' => 91, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 90%'),
            array('id' => 92, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 90%'),
            array('id' => 80, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 80%'),
            array('id' => 81, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 80%'),
            array('id' => 82, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 80%'),
            array('id' => 70, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 70%'),
            array('id' => 71, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 70%'),
            array('id' => 72, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 70%'),
            array('id' => 60, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 60%'),
            array('id' => 61, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 60%'),
            array('id' => 62, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 60%'),
            array('id' => 50, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 50%'),
            array('id' => 51, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 50%'),
            array('id' => 52, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 50%'),
            array('id' => 30, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 30%'),
            array('id' => 31, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 30%'),
            array('id' => 32, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 30%'),
            array('id' => 20, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 20%'),
            array('id' => 21, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 20%'),
            array('id' => 22, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 20%'),
            array('id' => 10, 'name'=> $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer').' 10%'),
            array('id' => 11, 'name'=> $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer').' 10%'),
            array('id' => 12, 'name'=> $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer').' 10%'),
        );
	}

	public function install()
	{
		if (!parent::install()
            || !$this->installDB()
            || !$this->registerHook('actionProductDelete')
            || !$this->registerHook('displayProductExtraContent')
			|| !$this->registerHook('displayHeader')
            || !$this->registerHook('displayFooter')
            || !$this->registerHook('actionStAssemble')
            || !$this->registerHook('displayCustomerAccount')
            || !$this->registerHook('displayUnderProductName')
        )
			return false;
        $result = true;
        foreach($this->getFormFieldsDefault() AS $k => $v) {
            $result &= Configuration::updateValue($this->_prefix_st.strtoupper($k), $v);
        }
        foreach($this->fields_default_stsn AS $k => $v) {
            $result &= Configuration::updateValue($this->_prefix_stsn.strtoupper($k), $v);
        }
		$result &= $this->sampleData();	
		return $result;
	}
    public function installDb()
	{
		$return = true;
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_product_comment` (
            `id_st_product_comment` int(11) unsigned NOT NULL auto_increment,
            `id_parent` int(10) unsigned NOT NULL DEFAULT 0,
            `id_order_detail` int(10) unsigned NOT NULL DEFAULT 0,
            `id_product` int(10) UNSIGNED NOT NULL DEFAULT 0,
            `id_shop` int(10) UNSIGNED NOT NULL DEFAULT 0,
            `id_customer` int(10) unsigned NOT NULL DEFAULT 0,
            `id_guest` int(10) unsigned DEFAULT NULL DEFAULT 0,
            `email` varchar(64) NULL,
            `title` varchar(64) NULL,
            `content` text NOT NULL,
            `customer_name` varchar(64) DEFAULT NULL,
            `grade` float unsigned NOT NULL,
            `validate` tinyint(1) UNSIGNED DEFAULT 0,
            `deleted` tinyint(1) UNSIGNED DEFAULT 0,
            `is_admin` tinyint(1) UNSIGNED DEFAULT 0,
            `featured` tinyint(1) UNSIGNED DEFAULT 0,
            `home_featured` tinyint(1) UNSIGNED DEFAULT 0,
            `date_add` datetime NOT NULL,
            PRIMARY KEY (`id_st_product_comment`),
            KEY `id_product` (`id_product`),
            KEY `id_customer` (`id_customer`),
            KEY `id_guest` (`id_guest`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
        
        $return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_product_comment_criterion` (
            `id_st_product_comment_criterion` int(11) unsigned NOT NULL auto_increment,
            `id_st_product_comment_criterion_type` tinyint(1) NOT NULL,
            `active` tinyint(1) NOT NULL,
            PRIMARY KEY (`id_st_product_comment_criterion`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_product_comment_criterion_lang` (
            `id_st_product_comment_criterion` int(11) UNSIGNED NOT NULL,
            `id_lang` int(11) UNSIGNED NOT NULL ,
            `name` VARCHAR(64) NOT NULL ,
            PRIMARY KEY ( `id_st_product_comment_criterion` , `id_lang` )
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
        
        $return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_product_comment_grade` (
            `id_st_product_comment` int(10) unsigned NOT NULL,
            `id_st_product_comment_criterion` int(10) unsigned NOT NULL,
            `grade` int(10) unsigned NOT NULL,
            KEY `id_st_product_comment_criterion` (`id_st_product_comment_criterion`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_product_comment_usefulness` (
            `id_st_product_comment` int(10) unsigned NOT NULL,
            `id_customer` int(10) unsigned NOT NULL,
            `usefulness` tinyint(1) unsigned NOT NULL,
            PRIMARY KEY (`id_st_product_comment`, `id_customer`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_product_comment_report` (
            `id_st_product_comment` int(10) unsigned NOT NULL,
            `id_customer` int(10) unsigned NOT NULL,
            PRIMARY KEY (`id_st_product_comment`, `id_customer`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_product_comment_tag` (
            `id_st_product_comment_tag` int(10) unsigned NOT NULL auto_increment,
            `name` VARCHAR(64) NOT NULL ,
            `id_product` int(10) unsigned NOT NULL DEFAULT 0,
            PRIMARY KEY (`id_st_product_comment_tag`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_product_comment_tag_map` (
            `id_st_product_comment` int(10) unsigned NOT NULL,
            `id_st_product_comment_tag` int(10) unsigned NOT NULL,
            PRIMARY KEY (`id_st_product_comment`, `id_st_product_comment_tag`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_product_comment_image` (
            `id_st_product_comment` int(10) unsigned NOT NULL,
            `image` varchar(64) NOT NULL
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
        
		return $return;
	}
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Product' => array(
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
                    'id' => 'displayProductLeftColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductLeftColumn', array(), 'Admin.Theme.Transformer'),
                    'in_product_page' => 1,
                ),
                array(
                    'id' => 'displayFooterProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooterProduct', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayProductExtraContent',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayProductExtraContent(Product tabs)', array(), 'Admin.Theme.Transformer'),
                ),
            ),
            'Hooks' => array(
                array(
                    'id' => 'displayFullWidthTop',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthTop', array(), 'Admin.Theme.Transformer'),
                    'full_width' => 1,
                ),
                array(
                    'id' => 'displayFullWidthTop2',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthTop2', array(), 'Admin.Theme.Transformer'),
                    'full_width' => 1,
                ),
                array(
                    'id' => 'displayHomeTop',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeTop', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHome',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHome', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeBottom',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeBottom', array(), 'Admin.Theme.Transformer'),
                    'full_width' => 1,
                ),
                array(
                    'id' => 'displayFullWidthBottom',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthBottom', array(), 'Admin.Theme.Transformer'),
                    'full_width' => 1,
                ),
                array(
                    'id' => 'displayFooterBefore',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooterBefore', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeLeft',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeLeft', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeRight',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeRight', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeFirstQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeFirstQuarter', array(), 'Admin.Theme.Transformer'),
                    'in_quarter'=>1,
                ),
                array(
                    'id' => 'displayHomeSecondQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeSecondQuarter', array(), 'Admin.Theme.Transformer'),
                    'in_quarter'=>1,
                ),
                array(
                    'id' => 'displayHomeThirdQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeThirdQuarter', array(), 'Admin.Theme.Transformer'),
                    'in_quarter'=>1,
                ),
                array(
                    'id' => 'displayHomeFourthQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeFourthQuarter', array(), 'Admin.Theme.Transformer'),
                    'in_quarter'=>1,
                ),
            ),
            'Column' => array(
                array(
                    'id' => 'displayLeftColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Left column except the produt page', array(), 'Admin.Theme.Transformer'),
                    'in_column'=>1,
                ),
                array(
                    'id' => 'displayRightColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Right column except the produt page', array(), 'Admin.Theme.Transformer'),
                    'in_column'=>1,
                ),
                array(
                    'id' => 'displayLeftColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Left column on the product page only', array(), 'Admin.Theme.Transformer'),
                    'in_column'=>1,
                ),
                array(
                    'id' => 'displayRightColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Right column on the product page only', array(), 'Admin.Theme.Transformer'),
                    'in_column'=>1,
                ),
                array(
                    'id' => 'displayProductRightColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Product right column', array(), 'Admin.Theme.Transformer'),
                    'in_column'=>1,
                ),
                array(
                    'id' => 'displayStBlogLeftColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStBlogLeftColumn', array(), 'Admin.Theme.Transformer'),
                    'in_column'=>1,
                ),
            ),
            'Footer' => array(      
                array(
                    'id' => 'displayStackedFooter1',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStackedFooter1', array(), 'Admin.Theme.Transformer'),
                    'in_footer'=>1,
                ),   
                array(
                    'id' => 'displayStackedFooter2',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStackedFooter2', array(), 'Admin.Theme.Transformer'),
                    'in_footer'=>1,
                ),   
                array(
                    'id' => 'displayStackedFooter3',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStackedFooter3', array(), 'Admin.Theme.Transformer'),
                    'in_footer'=>1,
                ),   
                array(
                    'id' => 'displayStackedFooter4',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStackedFooter4', array(), 'Admin.Theme.Transformer'),
                    'in_footer'=>1,
                ),   
                array(
                    'id' => 'displayStackedFooter5',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStackedFooter5', array(), 'Admin.Theme.Transformer'),
                    'in_footer'=>1,
                ),   
                array(
                    'id' => 'displayStackedFooter6',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayStackedFooter6', array(), 'Admin.Theme.Transformer'),
                    'in_footer'=>1,
                ),
                array(
                    'id' => 'displayFooter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooter', array(), 'Admin.Theme.Transformer'),
                    'in_footer'=>1,
                ),
                array(
                    'id' => 'displayFooterAfter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooterAfter', array(), 'Admin.Theme.Transformer'),
                    'in_footer'=>1,
                )
            )
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

	public function uninstall()
	{
		if (!parent::uninstall()
			|| !$this->uninstallDB()
        )
			return false;
		return true;
	}
    public function sampleData()
    {
        $return = true;
		$samples = array(
            array(
                'name' => 'Quality', 
            ),
			array(
                'name' => 'Fit', 
            ),
		);
		foreach($samples as $sample)
		{
			$module = new StProductCommentCriterionClass();
            foreach (Language::getLanguages(false) as $lang)
            {
				$module->name[$lang['id_lang']] = $sample['name'];
            }
			$module->id_product_comment_criterion_type = 1;
			$module->active = 1;
			$return &= $module->add();
		}
		return $return;
    }
	private function uninstallDb()
	{
        return Db::getInstance()->execute('
			DROP TABLE IF EXISTS
			`'._DB_PREFIX_.'st_product_comment`,
			`'._DB_PREFIX_.'st_product_comment_criterion`,
			`'._DB_PREFIX_.'st_product_comment_criterion_lang`,
			`'._DB_PREFIX_.'st_product_comment_grade`,
			`'._DB_PREFIX_.'st_product_comment_usefulness`,
            `'._DB_PREFIX_.'st_product_comment_report`,
            `'._DB_PREFIX_.'st_product_comment_tag`,
            `'._DB_PREFIX_.'st_product_comment_tag_map`,
			`'._DB_PREFIX_.'st_product_comment_image`');
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
    }
    public function generateThumbnails()
    {
        foreach($this->fields_form AS &$form) {
            foreach($form['form']['input'] AS &$field) {
                if ($field['type'] == 'file') {
                    if ($bg_img = Configuration::get($this->_prefix_st.strtoupper($field['name']))) {
                        $this->fetchMediaServer($bg_img);
                        $field['image'] = '<img class="st_thumb_nail" src="'.($bg_img).'" /><p>
                        <a class="btn btn-default st_delete_image" data-field="'.$field['name'].'" href="javascript:;">
                        <i class="icon-trash"></i> Delete</a></p>
                        ';
                    }
                }
            }
        }
    }
    public function fetchMediaServer(&$slider)
    {
        $slider = _THEME_PROD_PIC_DIR_.$slider;
        $slider = context::getContext()->link->protocol_content.Tools::getMediaServer($slider).$slider;
    }
    protected function AjaxDeleteImage($field = '')
    {
        $result = array(
            'r' => false,
            'm' => '',
            'd' => ''
        );
        if ($field && Configuration::updateValue($this->_prefix_st.strtoupper($field), '')) {
            $result['r'] = true;
        }
        die(json_encode($result));
    }
    public function getContent()
	{
	    if(Tools::getValue('act')=='delete_image' && $field=Tools::getValue('field'))
        {
            return $this->AjaxDeleteImage($field);
        }
	    $this->context->controller->addCSS($this->_path.'views/css/admin.css');
        $this->context->controller->addJS($this->_path.'views/js/admin.js');
        $id_st_product_comment = Tools::getValue('id_st_product_comment');
        $this->initHookArray();
        $this->_html .= $this->getConfigError() . $this->prepareNotification();
        if (Tools::isSubmit('add'.$this->name) || (Tools::isSubmit('update'.$this->name) && $id_st_product_comment))
        {
            $helper = $this->renderCommentForm();
            return $this->_html.$helper->generateForm($this->fields_form);
        } elseif (Tools::isSubmit('add'.$this->name.'criterion') || Tools::isSubmit('update'.$this->name.'criterion')) {
            return $this->_html.$this->renderCriterionForm();
        } elseif (Tools::isSubmit('set'.$this->name)) {
            $content = '';
            $tabs = array();
            $tabs = array(
                array('id'  => '0,1,5,6', 'name' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer')),
                array('id'  => '3', 'name' => $this->getTranslator()->trans('Review criteria', array(), 'Modules.Stproductcomments.Admin')),
                array('id'  => '8,7', 'name' => $this->getTranslator()->trans('Home slider', array(), 'Modules.Stproductcomments.Admin')),
                array('id'  => '9', 'name' => $this->getTranslator()->trans('Column', array(), 'Modules.Stproductcomments.Admin')),
                array('id'  => '10', 'name' => $this->getTranslator()->trans('Footer', array(), 'Modules.Stproductcomments.Admin')),
            );
            $content .= $this->renderConfigForm();
            $content .= '<div class="panel" id="fieldset_3_3">'.$this->renderCriterionList().'</div>';
            $this->smarty->assign(array(
                'current_index' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
                'bo_tabs' => $tabs,
                'bo_tab_content' => $content,
            ));
            return $this->_html.$this->display(__FILE__, 'bo_tab_layout.tpl');
        } else {
            $this->_checkImageDir();
            $this->_postProcess();
            if (Tools::isSubmit('view'.$this->name)) {
                $this->_html .= $this->getNavigate($id_st_product_comment);                
            } else {
                $setting_botton = '<p><a class="btn btn-primary" href="'.AdminController::$currentIndex.'&configure='.$this->name.
                '&set'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'">'.
                $this->getTranslator()->trans('Comment setting', array(), 'Modules.Stproductcomments.Admin').
                '</a></p>';
                $this->_html .= $setting_botton.$this->renderModerateLists();
            }
            return $this->_html.$this->renderCommentsList();
        }
	}
    private function _postProcess()
    {
        $id_st_product_comment = Tools::getValue('id_st_product_comment');
        if (isset($_POST['save'.$this->name])) {
            if ($id_st_product_comment) {
                $comment = new StProductCommentClass((int)$id_st_product_comment);
            } else {
                $comment = new StProductCommentClass();
                $parent = new StProductCommentClass(Tools::getValue('id_parent'));
                $comment->id_parent = $parent->id_parent;
                $comment->id_order_detail = $parent->id_order_detail;
                $comment->id_product = $parent->id_product;
            }
            $error = array();
            $comment->copyFromPost();
            $validate = $comment->validateFields(false, true);
            if (!count($error) && $validate === true)
            {
                if (!$comment->id_shop) {
                    $comment->id_shop = (int)$this->context->shop->id;
                }
                if($comment->save())
                {
    				if ($grade = (int)Tools::getValue('grade'))
    				{
    				    StProductCommentCriterionClass::deleteByComment($comment->id);
    				    foreach(StProductCommentCriterionClass::getCriterions($this->context->language->id)  as $id_st_product_comment_criterion) {
    				        $product_comment_criterion = new StProductCommentCriterionClass($id_st_product_comment_criterion);
        					if ($product_comment_criterion->id)
        						$product_comment_criterion->addGrade($comment->id, $grade);
    				    }
    					$comment->grade = $grade;
    					// Update Grade average of comment
    					$comment->save();
    				}
                    $old_images = StProductCommentClass::getCommentImages($comment->id, true);
                    if (count($old_images)) {
                        $image = Tools::getValue('image');
                        if (!$image || count(explode(',',$image))!=count($old_images)) {
                            StProductCommentClass::deleteImages($comment->id);
                        }
                        if($image && count(explode(',',$image))!=count($old_images)) {
                            $image_arr = explode(',',$image);
                            $pc_image_arr = array();
                            foreach ($image_arr as $img) {
                                $pc_image_arr[] = array('id_st_product_comment'=>$comment->id, 'image' => pSQL($img));
                            }
                            Db::getInstance()->insert(
                                'st_product_comment_image',
                                $pc_image_arr
                            );
                        }
                    }
                    //
                    $this->_clearCache('*');
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&id_st_product_comment='.$comment->id_parent : '').'&conf='.($id_st_product_comment?4:3).'&token='.Tools::getAdminTokenLite('AdminModules'));
                }                    
                else
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($id_st_product_comment ? '&update'.$this->name.'&id_st_product_comment='.$id_st_product_comment : '&add'.$this->name.'&id_parent='.$comment->id_parent).'&st_conf='.($id_st_product_comment?4:3).'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $url = AdminController::$currentIndex.'&configure='.$this->name.($id_st_product_comment ? '&update'.$this->name.'&id_st_product_comment='.$id_st_product_comment : '&add'.$this->name.'&id_parent='.$comment->id_parent).'&token='.Tools::getAdminTokenLite('AdminModules');
                $this->redirectWithNotification($this->displayError(str_replace('Property StProductCommentClass->', '', $validate)), $url);
        } elseif (isset($_POST['save'.$this->name.'criterion'])) {
           $id_st_product_comment_criterion = Tools::getValue('id_st_product_comment_criterion');
           $criterion = new StProductCommentCriterionClass((int)$id_st_product_comment_criterion);
           $criterion->copyFromPost();
           if ($criterion->validateFields(false) && $criterion->save()) {
                $this->_clearCache('*');
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&set'.$this->name.'&conf='.($id_st_product_comment_criterion?4:3).'&token='.Tools::getAdminTokenLite('AdminModules').'#1');
           } else {
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($id_st_product_comment_criterion ? '&update'.$this->name.'criterion&id_st_product_comment_criterion='.$id_st_product_comment_criterion : 'add'.$this->name.'criterion').'&st_conf='.($id_st_product_comment_criterion?4:3).'&token='.Tools::getAdminTokenLite('AdminModules').'#1');
           }                
        } elseif (isset($_POST['save'.$this->name.'setting'])) {
		    $this->initConfigFormFields();
            foreach($this->fields_form as $form)
                foreach($form['form']['input'] as $field)
                    if(isset($field['validation']))
                    {
                        $errors = array();       
                        $value = Tools::getValue($field['name']);
                        if (isset($field['required']) && $field['required'] && $value==false && (string)$value != '0') {
                            $label = $field['label'];
                            $errors[] = $this->getTranslator()->trans('Field "%s%" is required.', array('%s%' => $label), 'Admin.Theme.Transformer');
                        }	
                        elseif($value)
                        {
                            $field_validation = $field['validation'];
                            $label = $field['label'];
        					if (!Validate::$field_validation($value))
                                $errors[] = $this->getTranslator()->trans('Field "%s%" is invalid.', array('%s%' => $label), 'Admin.Theme.Transformer');
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
                                    $value = ($value==='' && isset($field['default_value']) ? $field['default_value'] : 0);
                                break;
                                case 'isNullOrUnsignedId':
                                    $value = $value==='0' ? '0' : '';
                                break;
                                default:
                                    $value = '';
                                break;
                            }
                            Configuration::updateValue($this->_prefix_st.''.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue($this->_prefix_st.''.strtoupper($field['name']), $value);
                    }
            if (Tools::getValue('Product_displayFooterProduct') && Tools::getValue('Product_displayProductExtraContent')) {
                unset($_POST['Product_displayFooterProduct']);
            }
            $this->saveHook();
            foreach($this->fields_form AS $form) {
                foreach($form['form']['input'] AS $field) {
                    if ($field['type'] == 'file') {
                        $res = $this->stUploadImage($field['name']);
                        if (count($res['error'])) {
                            $this->validation_errors = array_merge($this->validation_errors, $res['error']);
                        } elseif($res['image']) {
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $res['image']);
                        }
                    }
                }
            }
            $this->_clearCache('*');
            if(count($this->validation_errors)) {
                $errors = $this->displayError(implode('<br/>',$this->validation_errors));
                $url = AdminController::$currentIndex.'&configure='.$this->name.'&set'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules');
                $this->redirectWithNotification($errors, $url);
            }
            else 
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&set'.$this->name.'&conf=6&token='.Tools::getAdminTokenLite('AdminModules'));
        } elseif ((Tools::isSubmit('status'.$this->name))) {
            $comment = new StProductCommentClass((int)$id_st_product_comment);
            if($comment->id)
            {
                if ($comment->id_parent) {
                    $comment->setFieldsToUpdate(array('validate' => true));
                    $comment->validate = !(int)$comment->validate; 
                } else {
                    $comment->setFieldsToUpdate(array('home_featured' => true));
                    $comment->home_featured = !(int)$comment->home_featured;    
                }
                
                $comment->update(false);
                $this->_clearCache('*');
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&id_st_product_comment='.$comment->id_parent : '').'&conf=5&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&id_st_product_comment='.$comment->id_parent : '').'&st_conf=5&token='.Tools::getAdminTokenLite('AdminModules'));
        } elseif ((Tools::isSubmit('status'.$this->name.'criterion'))) {
            $id_st_product_comment_criterion = Tools::getValue('id_st_product_comment_criterion');
            $criterion = new StProductCommentCriterionClass((int)$id_st_product_comment_criterion);
            if($criterion->id && $criterion->toggleStatus())
            {
                $this->_clearCache('*');
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&set'.$this->name.'&conf=5&token='.Tools::getAdminTokenLite('AdminModules').'#1');
            }
            else
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&set'.$this->name.'&st_conf=5&token='.Tools::getAdminTokenLite('AdminModules').'#1');
        } elseif ((Tools::isSubmit('delete'.$this->name))) {
            $comment = new StProductCommentClass((int)$id_st_product_comment);
            if($comment->id && $comment->delete())
            {
                $this->_clearCache('*');
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&conf=1&id_st_product_comment='.$comment->id_parent : '').'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&id_st_product_comment='.$comment->id_parent : '').'&st_conf=1&token='.Tools::getAdminTokenLite('AdminModules'));
        } elseif ((Tools::isSubmit('delete'.$this->name.'criterion'))) {
            $id_st_product_comment_criterion = Tools::getValue('id_st_product_comment_criterion');
            $criterion = new StProductCommentCriterionClass((int)$id_st_product_comment_criterion);
            if($criterion->id && $criterion->delete())
            {
                $this->_clearCache('*');
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&set'.$this->name.'&conf=1&token='.Tools::getAdminTokenLite('AdminModules').'#1');
            }
            else
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&set'.$this->name.'&st_conf=1&token='.Tools::getAdminTokenLite('AdminModules').'#1');
        } elseif ($id_product_comment = (int) Tools::getValue('approveComment')) {
            $comment = new StProductCommentClass($id_product_comment);
            $comment->validate();
            $this->_clearCache('*');
		    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&id_st_product_comment='.$comment->id_parent : '').'&conf=5&token='.Tools::getAdminTokenLite('AdminModules'));
        } elseif ($id_product_comment = (int) Tools::getValue('noabuseComment')) {
            StProductCommentClass::deleteReports($id_product_comment);
            $this->_clearCache('*');
		    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&id_st_product_comment='.$comment->id_parent : '').'&token='.Tools::getAdminTokenLite('AdminModules'));
        }
    }
    protected function renderModerateLists()
    {
        $return = '';
        if (Configuration::get($this->_prefix_st.'MODERATE')) {
            $comments = StProductCommentClass::getByValidate(0);

            $fields_list = $this->getStandardFieldList();
            unset($fields_list['unapproved']);
            $helper = new HelperList();
            $helper->shopLinkType = '';
            $helper->simple_header = true;
            $helper->actions = array('approve', 'delete');
            $helper->show_toolbar = true;
            $helper->module = $this;
            $helper->listTotal = count($comments);
            $helper->identifier = 'id_st_product_comment';
            $helper->title = $this->getTranslator()->trans('Reviews waiting for approval', array(), 'Modules.Stproductcomments.Admin');
            $helper->table = $this->name;
            $helper->token = Tools::getAdminTokenLite('AdminModules');
            $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

            $return .= $helper->generateList($comments, $fields_list);
        }

        $comments = StProductCommentClass::getReportedComments();

        $fields_list = $this->getStandardFieldList();
        unset($fields_list['unapproved']);
        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = true;
        $helper->actions = array('delete', 'noabuse');
        $helper->show_toolbar = true;
        $helper->module = $this;
        $helper->listTotal = count($comments);
        $helper->identifier = 'id_st_product_comment';
        $helper->title = $this->getTranslator()->trans('Reported Reviews', array(), 'Modules.Stproductcomments.Admin');
        $helper->table = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

        $return .= $helper->generateList($comments, $fields_list);

        return $return;
    }
    protected function renderCriterionList()
    {
        $criterions = StProductCommentCriterionClass::getCriterions($this->context->language->id, false, false);

        $fields_list = array(
            'id_st_product_comment_criterion' => array(
                'title' => $this->getTranslator()->trans('ID', array(), 'Admin.Theme.Transformer'),
                'type' => 'text',
            ),
            'name' => array(
                'title' => $this->getTranslator()->trans('Name', array(), 'Admin.Theme.Transformer'),
                'type' => 'text',
            ),
            'active' => array(
                'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
                'active' => 'status',
                'type' => 'bool',
            ),
        );

        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->actions = array('edit', 'delete');
        $helper->show_toolbar = true;
        $helper->toolbar_btn['new'] = array(
            'href' => $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&module_name='.$this->name.'&addstproductcommentscriterion',
            'desc' => $this->getTranslator()->trans('Add New Criterion', array(), 'Modules.Stproductcomments.Admin'),
        );
        $helper->module = $this;
        $helper->identifier = 'id_st_product_comment_criterion';
        $helper->title = $this->getTranslator()->trans('Review Criteria', array(), 'Modules.Stproductcomments.Admin');
        $helper->table = $this->name.'criterion';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

        return $helper->generateList($criterions, $fields_list);
    }
    protected function renderCommentsList()
    {
        $id_st_product_comment = Tools::getValue('id_st_product_comment', 0);
        $nbr_comments = StProductCommentClass::getByValidate(1, $id_st_product_comment, $id_st_product_comment ? true : !Configuration::get($this->_prefix_st.'MODERATE'), true);
        $fields_list = $this->getStandardFieldList();
        
        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->show_filters = false;
        $helper->actions = array('reply','edit','delete');
        $helper->show_toolbar = true;
        $helper->module = $this;
        $helper->listTotal = $nbr_comments;
        $helper->identifier = 'id_st_product_comment';
        if (Tools::isSubmit('view'.$this->name)) {
            $helper->title = $this->getTranslator()->trans('Replies', array(), 'Modules.Stproductcomments.Admin'); 
        } else {
            $helper->title = $this->getTranslator()->trans('Approved Reviews', array(), 'Modules.Stproductcomments.Admin');    
        }
        $helper->table = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        if ($id_st_product_comment) {
            $helper->toolbar_btn['new'] =  array(
    			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'&id_parent='.$id_st_product_comment.'&token='.Tools::getAdminTokenLite('AdminModules'),
    			'desc' => $this->getTranslator()->trans('Add a reply', array(), 'Modules.Stproductcomments.Admin'),
    		);
            $parent = new StProductCommentClass($id_st_product_comment);
            $helper->toolbar_btn['back'] =  array(
                'href' => AdminController::$currentIndex.'&configure='.$this->name.($parent->id_parent ? '&id_st_product_comment='.$parent->id_parent.'&view'.$this->name : '').'&token='.Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer')
            );
            unset($fields_list['grade'], $fields_list['home_featured']);
            $fields_list['validate'] = array(
                'title' => $this->getTranslator()->trans('Approved', array(), 'Admin.Theme.Transformer'),
                'active' => 'status',
                'type' => 'bool',
                );
        } else {
            $helper->toolbar_btn['new'] =  array(
    			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'&id_parent=0&token='.Tools::getAdminTokenLite('AdminModules'),
    			'desc' => $this->getTranslator()->trans('Add new comment', array(), 'Modules.Stproductcomments.Admin'),
    		);
            $helper->toolbar_btn['edit'] =  array(
    			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&set'.$this->name.'&id_parent='.$id_st_product_comment.'&token='.Tools::getAdminTokenLite('AdminModules'),
    			'desc' => $this->getTranslator()->trans('Settings', array(), 'Admin.Theme.Transformer'),
    		);
        }
        
        /* Paginate the result */
        $page = ($page = Tools::getValue('submitFilter'.$helper->table)) ? $page : 1;
        $pagination = ($pagination = Tools::getValue($helper->table.'_pagination')) ? $pagination : 30;
        $comments = StProductCommentClass::getByValidate(1, $id_st_product_comment, $id_st_product_comment ? true : !Configuration::get($this->_prefix_st.'MODERATE'), false, $page, $pagination);
        
        ///$comments = $this->pagination($comments, $page, $pagination);

        return $helper->generateList($comments, $fields_list);
    }
    public function getStandardFieldList()
    {
        return array(
            'id_st_product_comment' => array(
                'title' => $this->trans('ID', array(), 'Admin.Theme.Transformer'), 
                'type' => 'text',
                ),
            'content' => array(
                'title' => $this->trans('Content', array(), 'Admin.Theme.Transformer'), 
                'type' => 'text',
                'callback' => 'showContent',
                'callback_object' => $this,
                ),
            'name' => array(
                'title' => $this->trans('Product', array(), 'Admin.Theme.Transformer'), 
                'type' => 'text',
                ),
            'unapproved' => array(
                'title' => $this->trans('Unapproved replies', array(), 'Admin.Theme.Transformer'), 
                'type' => 'text',
                'callback' => 'showUnapproved',
                'callback_object' => $this,
                ),
            'home_featured' => array(
                'title' => $this->getTranslator()->trans('Home featured', array(), 'Admin.Theme.Transformer'),
                'active' => 'status',
                'type' => 'bool',
                ),
            'date_add' => array(
                'title' => $this->getTranslator()->trans('Date Add', array(), 'Modules.Stproductcomments.Admin'), 
                'type' => 'date',
                ),
        );
    }
    public function showUnapproved($value, $row)
    {
        return '<label class="circle" title="'.$this->getTranslator()->trans('Unapproved replies', array(), 'Modules.Stproductcomments.Admin').'">'.$row['unapproved'].'</label>';
    }
    public function showContent($value, $row)
    {
        $html = $value.'<br>'.
            (!Tools::getValue('id_st_product_comment') ? $this->getTranslator()->trans('Rating: ', array(), 'Modules.Stproductcomments.Admin').$row['grade'].' / 5, ' : '').
            $this->getTranslator()->trans('Customer name: ', array(), 'Modules.Stproductcomments.Admin').$row['customer_name'];
        return $html;
    }
    public function displayApproveLink($token, $id, $name = null)
    {
        $this->smarty->assign(array(
            'href' => $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&module_name='.$this->name.'&approveComment='.$id,
            'action' => $this->getTranslator()->trans('Approve', array(), 'Admin.Theme.Transformer'),
        ));

        return $this->display(__FILE__, 'views/templates/admin/list_action_approve.tpl');
    }
    public function displayNoabuseLink($token, $id, $name = null)
    {
        $this->smarty->assign(array(
            'href' => $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&module_name='.$this->name.'&noabuseComment='.$id,
            'action' => $this->getTranslator()->trans('Not abusive', array(), 'Modules.Stproductcomments.Admin'),
        ));

        return $this->display(__FILE__, 'views/templates/admin/list_action_noabuse.tpl');
    }
    public function displayReplyLink($token, $id, $name = null)
    {
        $this->smarty->assign(array(
            'href' => $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&view'.$this->name.'&id_st_product_comment='.$id,
            'action' => $this->getTranslator()->trans('Reply', array(), 'Modules.Stproductcomments.Admin'),
        ));

        return $this->display(__FILE__, 'views/templates/admin/list_action_reply.tpl');
    }
    public function pagination($comments, $page = 1, $pagination = 50)
    {
        if (count($comments) > $pagination) {
            $comments = array_slice($comments, $pagination * ($page - 1), $pagination);
        }
        return $comments;
    }
    protected function initConfigFormFields()
    {
        $fields = $this->getFormFields();
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->displayName,
                'icon' => 'icon-cogs'
			),
            'description' => $this->getTranslator()->trans('Save your changes before go to another tab', array(), 'Admin.Theme.Transformer'),
            'input' => $fields['general'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
			)
		);
        
        $this->fields_form[5]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Testimonial Page', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['testimonial'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions')
            ),
        );
        
        $this->fields_form[6]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Product Page', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['product'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions')
            ),
        );
        
        $this->fields_form[1]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Hook manager', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
            'description' => $this->getTranslator()->trans('Check the hook that you would like this module to display on.', array(), 'Admin.Theme.Transformer').'<br/><a href="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" target="_blank" >'.$this->getTranslator()->trans('Click here to see hook position', array(), 'Admin.Theme.Transformer').'</a>.',
			'input' => $fields['hook'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions')
			),
		);
        
        $this->fields_form[8]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Home slider', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => $fields['home_slider'],
            'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
			),
        );
        
        $this->fields_form[7]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Advanced settings', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => $fields['setting'],
            'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
			),
        );
        
        $this->fields_form[9]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Column', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => $fields['column'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
            ),
        );
        
        $this->fields_form[10]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Footer', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => $fields['footer'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
            ),
        );
        
        $back_to_list = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.
                '&configure='.$this->name.'&token='.Tools::getValue('token').'"><i class="icon-arrow-left"></i>'.
                $this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        $this->fields_form[0]['form']['input'][] = $back_to_list;
        $this->fields_form[1]['form']['input'][] = $back_to_list;
        $this->fields_form[5]['form']['input'][] = $back_to_list;
        $this->fields_form[6]['form']['input'][] = $back_to_list;
        $this->fields_form[7]['form']['input'][] = $back_to_list;
        $this->fields_form[8]['form']['input'][] = $back_to_list;
        $this->fields_form[9]['form']['input'][] = $back_to_list;
        $this->fields_form[10]['form']['input'][] = $back_to_list;
        
    }
    protected function renderConfigForm()
	{
	    $this->initConfigFormFields();
        $this->generateThumbnails();
	    $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'save'.$this->name.'setting';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper->generateForm($this->fields_form);
	}
    public function renderCommentForm()
	{
	    $id_st_product_comment = Tools::getValue('id_st_product_comment');
        $id_parent = Tools::getValue('id_parent');
	    $comment = new StProductCommentClass($id_st_product_comment);
        $pc_images = array('str'=>array(),'data'=>array());
        if (!$comment->id) {
            $comment->id_parent = (int)$id_parent;
            $comment->is_admin = 1;
        } else {
            $images = StProductCommentClass::getCommentImages($comment->id, true);
            if($images) {
                $pc_images['str'] = implode(',', $images);
                foreach($images as $image) {
                    $pc_images['data'][] = array(
                        'name' => $image,
                        'url' => context::getContext()->link->protocol_content.Tools::getMediaServer(_THEME_PROD_PIC_DIR_.$image)._THEME_PROD_PIC_DIR_.$image,
                        );
                }
            }
        }
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->trans('Product comments', array(), 'Modules.Stproductcomments.Admin'),
				'icon' => 'icon-tags',
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->trans('Customer Name:', array(), 'Modules.Stproductcomments.Admin'),
					'name' => 'customer_name',
				),
				'id_product' => array(
					'type' => 'text',
					'label' => $this->trans('Prodcut ID:', array(), 'Modules.Stproductcomments.Admin'),
					'name' => 'id_product',
				),
                'grade' => array(
					'type' => 'text',
					'label' => $this->trans('Stars:', array(), 'Modules.Stproductcomments.Admin'),
					'name' => 'grade',
				),
                array(
					'type' => 'textarea',
                    'id'   => 'cm_content',
					'label' => $this->trans('Content:', array(), 'Admin.Theme.Transformer'),
					'name' => 'content',
                    'required' => true,
					'rows' => 8,
					'cols' => 60,
    			 ),
                 array(
    				'type' => 'switch',
    				'label' => $this->trans('Approved:', array(), 'Admin.Theme.Transformer'),
    				'name' => 'validate',
    				'required' => false,
    				'is_bool' => true,
    				'values' => array(
    					array(
    						'id' => 'validate_on',
    						'value' => 1,
    						'label' => $this->trans('Yes', array(), 'Admin.Theme.Transformer')
    					),
    					array(
    						'id' => 'validate_off',
    						'value' => 0,
    						'label' => $this->trans('No', array(), 'Admin.Theme.Transformer')
    					)
    				),
    			),
                'featured' => array(
    				'type' => 'switch',
    				'label' => $this->trans('Featured:', array(), 'Modules.Stproductcomments.Admin'),
    				'name' => 'featured',
    				'required' => false,
    				'is_bool' => true,
    				'values' => array(
    					array(
    						'id' => 'featured_on',
    						'value' => 1,
    						'label' => $this->trans('Yes', array(), 'Admin.Theme.Transformer')
    					),
    					array(
    						'id' => 'featured_off',
    						'value' => 0,
    						'label' => $this->trans('No', array(), 'Admin.Theme.Transformer')
    					)
    				),
                    'desc' => $this->trans('Featured comments can be show on comments list firstly..', array(), 'Modules.Stproductcomments.Admin')
    			),
                'home_featured' => array(
    				'type' => 'switch',
    				'label' => $this->trans('Home featured:', array(), 'Modules.Stproductcomments.Admin'),
    				'name' => 'home_featured',
    				'required' => false,
    				'is_bool' => true,
    				'values' => array(
    					array(
    						'id' => 'home_featured_on',
    						'value' => 1,
    						'label' => $this->trans('Yes', array(), 'Admin.Theme.Transformer')
    					),
    					array(
    						'id' => 'home_featured_off',
    						'value' => 0,
    						'label' => $this->trans('No', array(), 'Admin.Theme.Transformer')
    					)
    				),
                    'desc' => $this->trans('Home featured comments will show on homepage, left / right columns and page footer.', array(), 'Modules.Stproductcomments.Admin')
    			),
                array(
    				'type' => 'html',
                    'id' => 'a_cancel',
    				'label' => '',
    				'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.
                        '&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&id_st_product_comment='.$comment->id_parent : '').
                        '&token='.Tools::getValue('token').'"><i class="icon-arrow-left"></i>'.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
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
        if ($id_parent) {
            unset($this->fields_form[0]['form']['input']['id_product']);
            unset($this->fields_form[0]['form']['input']['grade']);
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_parent');
        }
        if (!$comment->id) {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'is_admin');
        }
        if ($comment->id_parent) {
            unset($this->fields_form[0]['form']['input']['id_product']);
            unset($this->fields_form[0]['form']['input']['grade']);
            unset($this->fields_form[0]['form']['input']['featured']);
            unset($this->fields_form[0]['form']['input']['home_featured']);
            $this->_html .= $this->getNavigate($comment->id ? $comment->id : $id_st_product_comment);
        }
		$helper = new HelperForm();
        $helper->module = $this;
        $helper->show_toolbar = false;
        $helper->id = $id_st_product_comment;
        $helper->table =  'st_product_comment';
        $helper->identifier = 'id_st_product_comment';
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        
        $helper->submit_action = 'save'.$this->name;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($comment),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );
        return $helper;
	}
    public function renderCriterionForm()
    {
        $id_st_product_comment_criterion = Tools::getValue('id_st_product_comment_criterion');
        $criterion = new StProductCommentCriterionClass((int)$id_st_product_comment_criterion);
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Add new criterion', array(), 'Modules.Stproductcomments.Admin'),
                'icon' => 'icon-cogs',
            ),
            'input' => array(
                array(
                    'type' => 'hidden',
                    'name' => 'id_st_product_comment_criterion',
                ),
                array(
                    'type' => 'text',
                    'lang' => true,
                    'label' => $this->getTranslator()->trans('Criterion name', array(), 'Modules.Stproductcomments.Admin'),
                    'name' => 'name',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Active', array(), 'Admin.Theme.Transformer'),
                    'name' => 'active',
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer'),
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer'),
                        ),
                    ),
                ),
                array(
    				'type' => 'html',
                    'id' => 'a_cancel',
    				'label' => '',
    				'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.
                        '&configure='.$this->name.'&set'.$this->name.'&token='.Tools::getValue('token').'#1"><i class="icon-arrow-left"></i>'.
                        $this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
    			),
            ),
        'submit' => array(
            'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
            'class' => 'btn btn-default pull-right',
            'name' => 'submitEditCriterion',
            ),
        );

        $helper = new HelperForm();
        $helper->module = $this;
        $helper->show_toolbar = false;
        $helper->table = $this->name;
        $lang = new Language((int) Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->module = $this;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'save'.$this->name.'criterion';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($criterion),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm($this->fields_form);
    }
    public function _prepareHook($ext='')
    {
        $ext = $ext ? '_'.strtoupper($ext) : '';
        
        $slideshow      = Configuration::get($this->_prefix_st.'SLIDESHOW'.$ext);
        $s_speed        = Configuration::get($this->_prefix_st.'S_SPEED'.$ext);
        $a_speed        = Configuration::get($this->_prefix_st.'A_SPEED'.$ext);
        $pause_on_hover = Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'.$ext);
        $rewind_nav     = Configuration::get($this->_prefix_st.'REWIND_NAV'.$ext);
        $lazy_load      = Configuration::get($this->_prefix_st.'LAZY'.$ext);
        $move           = Configuration::get($this->_prefix_st.'MOVE'.$ext);
        $hide_mob       = Configuration::get($this->_prefix_st.'HIDE_MOB'.$ext);
        $aw_display     = Configuration::get($this->_prefix_st.'AW_DISPLAY'.$ext);
        
        $poster = Configuration::get($this->_prefix_st.'VIDEO_POSTER');
        if($poster)
            $this->fetchMediaServer($poster);

        $this->smarty->assign(array(
            'pcomments'              => $this->getComments(trim($ext,'_')),
            'slider_slideshow'      => $slideshow,
            'slider_s_speed'        => $s_speed,
            'slider_a_speed'        => $a_speed,
            'slider_pause_on_hover' => $pause_on_hover,
            'rewind_nav'            => $rewind_nav,
            'lazy_load'             => $lazy_load,
            'slider_move'           => $move,
            'hide_mob'              => (int)$hide_mob,
            'aw_display'            => (int)$aw_display,
            'display_as_grid'       => Configuration::get($this->_prefix_st.'GRID'),
            'title_position'        => Configuration::get($this->_prefix_st.'TITLE_ALIGN'),
            'direction_nav'         => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'hide_direction_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_DIRECTION_NAV_ON_MOB'),
            'control_nav'           => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
            'hide_control_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_CONTROL_NAV_ON_MOB'),
            'spacing_between'       => Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),
            'display_pro_col'       => Configuration::get($this->_prefix_st.'DISPLAY_PRO_COL'),
            'content_width'       => Configuration::get($this->_prefix_st.'CONTENT_WIDTH'),
            

            'video_mpfour'          => Configuration::get($this->_prefix_st.'VIDEO_MPFOUR'),
            'video_webm'            => Configuration::get($this->_prefix_st.'VIDEO_WEBM'),
            'video_ogg'             => Configuration::get($this->_prefix_st.'VIDEO_OGG'),
            'video_loop'            => Configuration::get($this->_prefix_st.'VIDEO_LOOP'),
            'video_muted'           => Configuration::get($this->_prefix_st.'VIDEO_MUTED'),
            'video_poster'          => $poster,
            'video_v_offset'        => Configuration::get($this->_prefix_st.'VIDEO_V_OFFSET'),
		));
        return true;
    }
    public function renderCommentExtra($hookName, $params)
    {
        $id_product = (int)Tools::getValue('id_product');
        if (!$this->isCached('stproductcomments_reviews.tpl', $this->stGetCacheId($hookName.$id_product))) {
            $average = StProductCommentClass::getAverageGrade($id_product);
            $nbComments = (int) StProductCommentClass::getCommentNumber($id_product);
            $this->smarty->assign(array(
                'average' => $average,
                'commentNbr' => $nbComments,
            ));
        }
        return $this->fetch('module:stproductcomments/views/templates/hook/stproductcomments_reviews.tpl', $this->stGetCacheId($hookName.$id_product));
    }
    public function hookDisplayCustomerAccount($params)
	{
		return $this->display(__FILE__, 'my-account.tpl');
	}
    public function hookActionStAssemble($product)
    {
        $display_rating = Configuration::get($this->_prefix_st.'DISPLAY_RATING');
        if (!$product['id_product'] || !$display_rating) {
            return false;
        }

        $comment = StProductCommentClass::getRatings($product['id_product']);
        if(($display_rating==1 || $display_rating==3) && !$comment['total'])
            return false;
        return array(
                'display_rating' => $display_rating,
                'display_as_link' => Configuration::get($this->_prefix_st.'DISPLAY_AS_LINK'),
                'pro_posi' => Configuration::get($this->_prefix_st.'PRO_POSI'),
                'total' => $comment ? $comment['total'] : 0,
                'average' => $comment ? $comment['avg'] : 0,
            );
    }

    private function _prepare_comments($id_product){
        if(!$id_product)
            return false;

        $id_guest = (!$id_customer = (int)$this->context->cookie->id_customer) ? (int) $this->context->cookie->id_guest : false;
        // $customerComment = StProductCommentClass::getByCustomerId($id_product, (int)$this->context->cookie->id_customer, $this->context->shop->id, true, $id_guest);
        $averages = StProductCommentClass::getAveragesByProduct($id_product, $this->context->language->id);
        
        $averageTotal = 0;
        foreach ($averages as $average) {
            $averageTotal += (float)($average);
        }
        $averageTotal = count($averages) ? round($averageTotal / count($averages), 1) : 0;
        
        $criterions = StProductCommentCriterionClass::getCriterions($this->context->language->id, true);
        $criterions_arr = array();
        if($criterions){
            foreach ($criterions as $v){
                $criterions_arr[$v['id_st_product_comment_criterion']] = $v['name'];
            }
        }
        $pro_tag_nbr = (int)Configuration::get($this->_prefix_st.'PRO_TAG_NBR');
        $biaoqian = StProductCommentClass::getTagByProduct($id_product, ($pro_tag_nbr ? $pro_tag_nbr : 12));

        $nbComments = (int) StProductCommentClass::getCommentNumber($id_product);
        // $product = $this->context->controller->getProduct();
        
        $this->smarty->assign(array(
            // 'logged' => $this->context->customer->isLogged(true),
            'pcomment_link' => $this->context->link->getModuleLink('stproductcomments','list',array('id_product'=>$id_product)),
            // 'comments' => StProductCommentClass::getByProduct((int) Tools::getValue('id_product'), 1, null, $this->context->cookie->id_customer, $this->context->shop->id),
            'criterions' => $criterions_arr,
            'averages' => $averages,
            'averageTotal' => $averageTotal,
            'biaoqian' => $biaoqian,
            'can_comment' => StProductCommentClass::canComment($this->context->cookie->id_customer, $id_product),
            'g_rich_snippets' => Configuration::get($this->_prefix_st.'GOOGLE_RICH_SNIPPETS'),
            'aw_display' => Configuration::get($this->_prefix_st.'AW_DISPLAY'),
            'nbComments' => $nbComments,
       ));
    }
    public function hookDisplayFooterProduct($params){
        $id_product = Tools::getValue('id_product');
        if (!$id_product) {
            return false;
        }
        
        $this->_prepare_comments($id_product);
        $this->smarty->assign(array(
            'title_position'        => Configuration::get($this->_prefix_st.'PF_TITLE_ALIGN'),
        ));

        return $this->fetch('module:stproductcomments/views/templates/hook/pcomments_block.tpl');
    }
    public function hookDisplayProductExtraContent($params)
    {
        $extraContent = new ProductExtraContent();
        
        if(!isset($params['product'])) {
            return $extraContent;
        }
        $id_product = (int)$params['product']->id;

        $this->_prepare_comments($id_product);
        
        $nbComments = (int) StProductCommentClass::getCommentNumber($id_product);
        
        $extraContent->setTitle(
            $this->getTranslator()->trans('Reviews', array(), 'Shop.Theme.Transformer').
            ($nbComments ? '('.$nbComments.')' : '')
        )->setContent(
            $this->fetch('module:stproductcomments/views/templates/hook/stproductcomments.tpl')
        );

        return array($extraContent);
    }
    public function hookActionProductDelete($params)
    {
        $id_product = isset($params['id_product']) ? $params['id_product'] : 0;
        if ($id_product) {
            StProductCommentClass::deleteByIdProduct($id_product);
        }
    }
    public function hookDisplayHeader($params)
    {
        $this->context->controller->addCSS($this->_path.'views/css/stproductcomments.css', 'all');
        Media::addJsDef(array(
            'confirm_report_message' => $this->getTranslator()->trans('Are you sure report abuse ?', array(), 'Shop.Theme.Transformer'),
            'dictRemoveFile' => $this->getTranslator()->trans('Remove', array(), 'Shop.Theme.Transformer'),
            'st_pc_display_format' => $this->getTranslator()->trans('#left / #max Characters left.', array(), 'Shop.Theme.Transformer'),
            'st_pc_max' => Configuration::get($this->_prefix_st.'MAX_COMMENT') ? Configuration::get($this->_prefix_st.'MAX_COMMENT') : 500,
            'stproductcomments_controller_url' => $this->context->link->getModuleLink('stproductcomments','default', array('secure_key'=>$this->secure_key)),
            'st_pc_max_images' => Configuration::get($this->_prefix_st.'MAX_IMAGES') ? Configuration::get($this->_prefix_st.'MAX_IMAGES') : 6,
        ));
        if (isset($this->context->controller->module) && $this->context->controller->module->name == $this->name) {
            $this->context->controller->registerJavascript('jquery-rating-pack','modules/'.$this->name.'/views/js/jquery.rating.pack.js', ['position' => 'bottom', 'priority' => 150]);
            $this->context->controller->registerJavascript('jquery-tagmanager','modules/'.$this->name.'/views/js/tagmanager.js', ['position' => 'bottom', 'priority' => 150]);
            $this->context->controller->registerJavascript('jquery-textareacounter','modules/'.$this->name.'/views/js/jquery.textareaCounter.js', ['position' => 'bottom', 'priority' => 150]); 
        }
        $this->context->controller->registerJavascript('modules-stproductcomments', 'modules/'.$this->name.'/views/js/stproductcomments.js', ['position' => 'bottom', 'priority' => 150]);  
        if (Configuration::get($this->_prefix_st.'GOOGLE_RECAPTCHA') && isset($this->context->controller->module) && $this->context->controller->module->name == $this->name) {
            $this->context->controller->registerJavascript('google-recaptcha', 'https://www.google.com/recaptcha/api.js', ['position' => 'bottom', 'priority' => 9999, 'server' => 'remote']);    
        }
        if (Configuration::get($this->_prefix_st.'UPLOAD_IMAGE') && isset($this->context->controller->module) && $this->context->controller->module->name == $this->name) {
            $this->context->controller->registerJavascript('dropzone', 'modules/'.$this->name.'/views/js/dropzone.min.js', ['position' => 'bottom', 'priority' => 150]);    
        }  
        
        $template = 'module:stproductcomments/views/templates/hook/header.tpl';
        if (!$this->isCached($template, $this->stGetCacheId('header')))
        {
            $classname = $this->name.'_container';
            
            $custom_css = '';
    
            $spacing_between = Configuration::get($this->_prefix_st.'SPACING_BETWEEN');
            
            $group_css = '';
            if ($bg_color = Configuration::get($this->_prefix_st.'BG_COLOR'))
                $group_css .= 'background-color:'.$bg_color.';';
            if ($bg_img = Configuration::get($this->_prefix_st.'BG_IMG'))
            {
                $this->fetchMediaServer($bg_img);
                $group_css .= 'background-image: url('.$bg_img.');';
            }
            elseif ($bg_pattern = Configuration::get($this->_prefix_st.'BG_PATTERN'))
            {
                $img = _MODULE_DIR_.'stproductcomments/views/patterns/'.$bg_pattern.'.png';
                $img = $this->context->link->protocol_content.Tools::getMediaServer($img).$img;
                $group_css .= 'background-image: url('.$img.');background-repeat: repeat;';
            }
            if($group_css)
                $custom_css .= '.'.$classname.'.products_container{'.$group_css.'}';
            /*if ($bg_img_v_offset = (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET')) {
                $custom_css .= '.'.$classname.'.products_container{background-position:center -'.$bg_img_v_offset.'px;}';
            }*/
    
            if ($top_padding = (int)Configuration::get($this->_prefix_st.'TOP_PADDING'))
                $custom_css .= '.'.$classname.'.products_container  .products_section{padding-top:'.$top_padding.'px;}';
            if ($bottom_padding = (int)Configuration::get($this->_prefix_st.'BOTTOM_PADDING'))
                $custom_css .= '.'.$classname.'.products_container  .products_section{padding-bottom:'.$bottom_padding.'px;}';
    
            $top_margin = Configuration::get($this->_prefix_st.'TOP_MARGIN');
            if($top_margin || $top_margin===0 || $top_margin==='0')
                $custom_css .= '.'.$classname.'.products_container{margin-top:'.$top_margin.'px;}';
            $bottom_margin = Configuration::get($this->_prefix_st.'BOTTOM_MARGIN');
            if($bottom_margin || $bottom_margin===0 || $bottom_margin==='0')
                $custom_css .= '.'.$classname.'.products_container{margin-bottom:'.$bottom_margin.'px;}';
    
            if ($title_font_size = (int)Configuration::get($this->_prefix_st.'TITLE_FONT_SIZE'))
                 $custom_css .= '.'.$classname.'.products_container .title_block_inner{font-size:'.$title_font_size.'px;}';
    
            if ($title_color = Configuration::get($this->_prefix_st.'TITLE_COLOR'))
                $custom_css .= '.'.$classname.'.products_container .title_block_inner{color:'.$title_color.';}';
            if ($title_hover_color = Configuration::get($this->_prefix_st.'TITLE_HOVER_COLOR'))
                $custom_css .= '.'.$classname.'.products_container .title_block_inner:hover{color:'.$title_hover_color.';}';
    
    
            $heading_bottom_border = Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER');
            if($heading_bottom_border || $heading_bottom_border===0 || $heading_bottom_border==='0')
            {
                $custom_css .= '.'.$classname.'.products_container .title_style_0,.'.$classname.'.products_container .title_style_0 .title_block_inner{border-bottom-width:'.$heading_bottom_border.'px;}.'.$classname.'.products_container .title_style_0 .title_block_inner{margin-bottom:-'.$heading_bottom_border.'px;}';
                $custom_css .= '.'.$classname.'.products_container .title_style_1 .flex_child, .'.$classname.'.products_container .title_style_3 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;}';
                $custom_css .= '.'.$classname.'.products_container .title_style_2 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;border-top-width:'.$heading_bottom_border.'px;}';
            }
            
            if(Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR'))
                $custom_css .='.'.$classname.'.products_container .title_style_0, .'.$classname.'.products_container .title_style_1 .flex_child, .'.$classname.'.products_container .title_style_2 .flex_child, .'.$classname.'.products_container .title_style_3 .flex_child{border-bottom-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR').';}.'.$classname.'.products_container .title_style_2 .flex_child{border-top-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR').';}';  
            if(Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR_H'))
                $custom_css .='.'.$classname.'.products_container .title_style_0 .title_block_inner{border-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR_H').';}';  


            if ($pf_title_font_size = (int)Configuration::get($this->_prefix_st.'PF_TITLE_FONT_SIZE'))
                 $custom_css .= '.pcomments_block .title_block_inner{font-size:'.$pf_title_font_size.'px;}';
    
            if ($pf_title_color = Configuration::get($this->_prefix_st.'PF_TITLE_COLOR'))
                $custom_css .= '.pcomments_block .title_block_inner{color:'.$pf_title_color.';}';
            if ($pf_title_hover_color = Configuration::get($this->_prefix_st.'PF_TITLE_HOVER_COLOR'))
                $custom_css .= '.pcomments_block .title_block_inner:hover{color:'.$pf_title_hover_color.';}';
    
    
            $pf_heading_bottom_border = Configuration::get($this->_prefix_st.'PF_TITLE_BOTTOM_BORDER');
            if($pf_heading_bottom_border || $pf_heading_bottom_border===0 || $pf_heading_bottom_border==='0')
            {
                $custom_css .= '.pcomments_block .title_style_0,.pcomments_block .title_style_0 .title_block_inner{border-bottom-width:'.$pf_heading_bottom_border.'px;}.pcomments_block .title_style_0 .title_block_inner{margin-bottom:-'.$pf_heading_bottom_border.'px;}';
                $custom_css .= '.pcomments_block .title_style_1 .flex_child, .pcomments_block .title_style_3 .flex_child{border-bottom-width:'.$pf_heading_bottom_border.'px;}';
                $custom_css .= '.pcomments_block .title_style_2 .flex_child{border-bottom-width:'.$pf_heading_bottom_border.'px;border-top-width:'.$pf_heading_bottom_border.'px;}';
            }
            
            if(Configuration::get($this->_prefix_st.'PF_TITLE_BOTTOM_BORDER_COLOR'))
                $custom_css .='.pcomments_block .title_style_0, .pcomments_block .title_style_1 .flex_child, .pcomments_block .title_style_2 .flex_child, .pcomments_block .title_style_3 .flex_child{border-bottom-color: '.Configuration::get($this->_prefix_st.'PF_TITLE_BOTTOM_BORDER_COLOR').';}.pcomments_block .title_style_2 .flex_child{border-top-color: '.Configuration::get($this->_prefix_st.'PF_TITLE_BOTTOM_BORDER_COLOR').';}';  
            if(Configuration::get($this->_prefix_st.'PF_TITLE_BOTTOM_BORDER_COLOR_H'))
                $custom_css .='.pcomments_block .title_style_0 .title_block_inner{border-color: '.Configuration::get($this->_prefix_st.'PF_TITLE_BOTTOM_BORDER_COLOR_H').';}';
    
    
            if ($text_color = Configuration::get($this->_prefix_st.'TEXT_COLOR')) {
                $custom_css .= '.'.$classname.'.products_container .pcomments_item,.'.$classname.'.products_container .pcomments_item .s_title_block a{color:'.$text_color.';}';
            }
            if ($link_color = Configuration::get($this->_prefix_st.'LINK_COLOR')) {
                $custom_css .= '.'.$classname.'.products_container .pcomments_item .s_title_block a{color:'.$link_color.';}';
            }
            if ($link_hover_color = Configuration::get($this->_prefix_st.'LINK_HOVER_COLOR')) {
                $custom_css .= '.'.$classname.'.products_container .pcomments_item .s_title_block a:hover{color:'.$link_hover_color.';}';
            }
            if ($text_color_col = Configuration::get($this->_prefix_st.'TEXT_COLOR_COL')) {
                $custom_css .= '.'.$classname.'.products_container_column .pcomments_item,.'.$classname.'.products_container_column .pcomments_item .s_title_block a{color:'.$text_color_col.';}';
            }
            if ($link_color_col = Configuration::get($this->_prefix_st.'LINK_COLOR_COL')) {
                $custom_css .= '.'.$classname.'.products_container_column .pcomments_item .s_title_block a{color:'.$link_color_col.';}';
            }
            if ($link_hover_color_col = Configuration::get($this->_prefix_st.'LINK_HOVER_COLOR_COL')) {
                $custom_css .= '.'.$classname.'.products_container_column .pcomments_item .s_title_block a:hover{color:'.$link_hover_color_col.';}';
            }
            if ($text_color_fot = Configuration::get($this->_prefix_st.'TEXT_COLOR_FOT')) {
                $custom_css .= '.pcomment_footer .pcomments_item,.pcomment_footer .pcomments_item .s_title_block a{color:'.$text_color_fot.';}';
            }
            if ($link_color_fot = Configuration::get($this->_prefix_st.'LINK_COLOR_FOT')) {
                $custom_css .= '.pcomment_footer .pcomments_item .s_title_block a{color:'.$link_color_fot.';}';
            }
            if ($link_hover_color_fot = Configuration::get($this->_prefix_st.'LINK_HOVER_COLOR_FOT')) {
                $custom_css .= '.pcomment_footer .pcomments_item .s_title_block a:hover{color:'.$link_hover_color_fot.';}';
            }
            
    
            //.block is used to make bg take effect, .swiper-button-lr, .swiper-button-tr hui fu gai
            if ($direction_color = Configuration::get($this->_prefix_st.'DIRECTION_COLOR'))
                $custom_css .= '.'.$classname.'.block .products_section .swiper-button{color:'.$direction_color.';}';
            if ($direction_color_hover = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_HOVER'))
                $custom_css .= '.'.$classname.'.block .products_section .swiper-button:hover{color:'.$direction_color_hover.';}';
            if ($direction_color_disabled = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_DISABLED'))
                $custom_css .= '.'.$classname.'.block .products_section .swiper-button.swiper-button-disabled, .'.$classname.' .products_section .swiper-button.swiper-button-disabled:hover{color:'.$direction_color_disabled.';}';
            
            if ($direction_bg = Configuration::get($this->_prefix_st.'DIRECTION_BG'))
                $custom_css .= '.'.$classname.' .products_section .swiper-button{background-color:'.$direction_bg.';}';
            if ($direction_hover_bg = Configuration::get($this->_prefix_st.'DIRECTION_HOVER_BG'))
                $custom_css .= '.'.$classname.' .products_section .swiper-button:hover{background-color:'.$direction_hover_bg.';}';
            if ($direction_disabled_bg = Configuration::get($this->_prefix_st.'DIRECTION_DISABLED_BG'))
                $custom_css .= '.'.$classname.' .products_section .swiper-button.swiper-button-disabled, .'.$classname.' .products_section .swiper-button.swiper-button-disabled:hover{background-color:'.$direction_disabled_bg.';}';
            else
                $custom_css .= '.'.$classname.' .products_section .swiper-button.swiper-button-disabled, .'.$classname.' .products_section .swiper-button.swiper-button-disabled:hover{background-color:transplanted;}';
    
            if ($pag_nav_bg = Configuration::get($this->_prefix_st.'PAG_NAV_BG')){
                $custom_css .= '.'.$classname.' .swiper-pagination-bullet,.'.$classname.' .swiper-pagination-progress{background-color:'.$pag_nav_bg.';}';
                $custom_css .= '.'.$classname.' .swiper-pagination-st-round .swiper-pagination-bullet{background-color:transparent;border-color:'.$pag_nav_bg.';}';
                $custom_css .= '.'.$classname.' .swiper-pagination-st-round .swiper-pagination-bullet span{background-color:'.$pag_nav_bg.';}';
            }
            if ($pag_nav_bg_hover = Configuration::get($this->_prefix_st.'PAG_NAV_BG_HOVER')){
                $custom_css .= '.'.$classname.' .swiper-pagination-bullet-active, .'.$classname.' .swiper-pagination-progress .swiper-pagination-progressbar{background-color:'.$pag_nav_bg_hover.';}';
                $custom_css .= '.'.$classname.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active{background-color:'.$pag_nav_bg_hover.';border-color:'.$pag_nav_bg_hover.';}';
                $custom_css .= '.'.$classname.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active span{background-color:'.$pag_nav_bg_hover.';}';
            }

            if ($star_highlight_color = Configuration::get($this->_prefix_st.'STAR_HIGHLIGHT_COLOR')){
                $custom_css .= '.fto-star-2.icon_btn.light{color:'.$star_highlight_color.';}';
            }
            if ($star_color = Configuration::get($this->_prefix_st.'STAR_COLOR')){
                $custom_css .= '.fto-star-2.icon_btn{color:'.$star_color.';}';
            }
            if($star_icon = Configuration::get($this->_prefix_st.'STAR_ICON'))
                $custom_css .= '.fto-star-2.icon_btn:before{ content: "\\'.dechex($star_icon).'"; }';
            if ($star_size = Configuration::get($this->_prefix_st.'STAR_SIZE')){
                $custom_css .= '.fto-star-2.icon_btn{font-size:'.$star_size.'px;}';
            }
            
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->fetch($template, $this->stGetCacheId('header'));     
    }
    public function hookDisplayFullWidthTop($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params, __FUNCTION__ ,2);
    }
    public function hookDisplayFullWidthTop2($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params, __FUNCTION__ ,2);
    }
    public function hookDisplayHomeTop($params)
    {
        return $this->hookDisplayHome($params, __FUNCTION__);
    }
    //abstract public function hookDisplayHome($params);
    public function hookDisplayHomeLeft($params)
    {
        return $this->hookDisplayHome($params, __FUNCTION__);
    }
    public function hookDisplayHomeRight($params)
    {
        return $this->hookDisplayHome($params, __FUNCTION__);
    }
    public function hookDisplayHomeFirstQuarter($params)
    {
        if(Configuration::get('STSN_QUARTER_1')<=3)
        {
            $this->smarty->assign(array(
                'is_quarter' => true,
            )); 
            return $this->hookDisplayLeftColumn($params, __FUNCTION__);
        }
        else
            return $this->hookDisplayHome($params, __FUNCTION__);
    }
    public function hookDisplayHomeSecondQuarter($params)
    {
        if(Configuration::get('STSN_QUARTER_2')<=3)
        {
            $this->smarty->assign(array(
                'is_quarter' => true,
            )); 
            return $this->hookDisplayLeftColumn($params, __FUNCTION__);
        }
        else
            return $this->hookDisplayHome($params, __FUNCTION__);
    }
    public function hookDisplayHomeThirdQuarter($params)
    {
        if(Configuration::get('STSN_QUARTER_3')<=3)
        {
            $this->smarty->assign(array(
                'is_quarter' => true,
            )); 
            return $this->hookDisplayLeftColumn($params, __FUNCTION__);
        }
        else
            return $this->hookDisplayHome($params, __FUNCTION__);
    }
    public function hookDisplayHomeFourthQuarter($params)
    {
        if(Configuration::get('STSN_QUARTER_4')<=3)
        {
            $this->smarty->assign(array(
                'is_quarter' => true,
            )); 
            return $this->hookDisplayLeftColumn($params, __FUNCTION__);
        }
        else
            return $this->hookDisplayHome($params, __FUNCTION__);
    }
    public function hookDisplayHomeBottom($params)
    {
        return $this->hookDisplayHome($params, __FUNCTION__);
    }
    public function hookDisplayFullWidthBottom($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params, __FUNCTION__ ,2);
    }
    public function hookDisplayFooterBefore($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params, __FUNCTION__ ,2);
    }
    public function hookDisplayLeftColumnProduct($params)
    {
        return $this->hookDisplayLeftColumn($params, __FUNCTION__);
    }
    public function hookDisplayRightColumnProduct($params)
    {
        return $this->hookDisplayLeftColumn($params, __FUNCTION__);
    }
    
    //abstract public function hookDisplayLeftColumn($params);
    public function hookDisplayRightColumn($params)
    {
        return $this->hookDisplayLeftColumn($params, __FUNCTION__);
    }
    public function hookDisplayStackedFooter1($params, $hook_hash = '')
    {
        if (!$hook_hash) {
            $hook_hash = __FUNCTION__;
        }
        $this->smarty->assign(array(
            'is_stacked_footer' => true,
        )); 
        return $this->hookDisplayFooter($params, $hook_hash); 
    }
    public function hookDisplayStackedFooter2($params)
    {
        return $this->hookDisplayStackedFooter1($params, __FUNCTION__); 
    }
    public function hookDisplayStackedFooter3($params)
    {
        return $this->hookDisplayStackedFooter1($params, __FUNCTION__); 
    }
    public function hookDisplayStackedFooter4($params)
    {
        return $this->hookDisplayStackedFooter1($params, __FUNCTION__); 
    }
    public function hookDisplayStackedFooter5($params)
    {
        return $this->hookDisplayStackedFooter1($params, __FUNCTION__); 
    }
	public function hookDisplayStackedFooter6($params)
	{
		return $this->hookDisplayStackedFooter1($params, __FUNCTION__); 
	}
    //abstract function hookDisplayFooter($params);
    public function hookDisplayFooterAfter($params)
    {
        return $this->hookDisplayFooter($params, __FUNCTION__);        
    }
    public function getComments($ext = '')
    {
        $ext = $ext ? '_'.strtoupper($ext) : '';
        $nbr = Configuration::get($this->_prefix_st.'NBR'.$ext);
        $order_by = 'date_add';
        $order_way = 'DESC';
        $soby = (int)Configuration::get($this->_prefix_st.'SOBY'.$ext);
        switch($soby) {
            case 0:
                $order_by = 'featured';
                $order_way = 'DESC';
                break;
            case 1:
                $order_by = 'total_useful';
                $order_way = 'DESC';
                break;
            case 2:
                $order_by = 'date_add';
                $order_way = 'DESC';
                break;
            case 3:
                $order_by = 'date_add';
                $order_way = 'ASC';
                break;
            case 4:
                $order_by = 'total_advice';
                $order_way = 'DESC';
                break;
        }
        $comments = StProductCommentClass::getListComments($nbr, 1, null, null, false, $order_by, $order_way, false, 0, 0, 1);

        if ($comments) {
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
            
            foreach ($comments as &$value) {
                $value['timeago'] = Configuration::get($this->_prefix_st.'DISPLAY_DATE') ? false : StProductCommentClass::Timeago($value['date_add']);
                if ($value['id_product']) {
                    $value['product'] = $presenter->present(
                        $presentationSettings,
                        $assembler->assembleProduct(array(
                            'id_product' => $value['id_product'],
                        )),
                        $this->context->language
                    );    
                } else {
                    $value['product'] = array();
                }
            }
        }
        return $comments;
    }
    public function hookDisplayHome($params, $func = '', $flag=0)
	{
        $hook_hash = $this->getHookHash($func ? $func : __FUNCTION__);
        $template = 'module:stproductcomments/views/templates/hook/pcomments_slider.tpl';
	    if (!$this->isCached($template, $this->stGetCacheId($hook_hash)))
    	{
            $this->_prepareHook();
            $this->smarty->assign(array(
                'column_slider'    => false,
                'homeverybottom'   => ($flag==2 ? true : false),
                'hook_hash'        => $hook_hash,
                'pro_per_fw'       => (int)Configuration::get($this->_prefix_st.'PRO_PER_FW'),
                'pro_per_xxl'      => (int)Configuration::get($this->_prefix_st.'PRO_PER_XXL'),
                'pro_per_xl'       => (int)Configuration::get($this->_prefix_st.'PRO_PER_XL'),
                'pro_per_lg'       => (int)Configuration::get($this->_prefix_st.'PRO_PER_LG'),
                'pro_per_md'       => (int)Configuration::get($this->_prefix_st.'PRO_PER_MD'),
                'pro_per_sm'       => (int)Configuration::get($this->_prefix_st.'PRO_PER_SM'),
                'pro_per_xs'       => (int)Configuration::get($this->_prefix_st.'PRO_PER_XS'),

                'has_background_img'    => ((int)Configuration::get($this->_prefix_st.'BG_PATTERN') || Configuration::get($this->_prefix_st.'BG_IMG')) ? 1 : 0,
                'speed'                 => Configuration::get($this->_prefix_st.'SPEED'),
                'bg_img_v_offset'       => (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET'),
            ));
        }
		return $this->fetch($template, $this->stGetCacheId($hook_hash));
	}
    public function hookDisplayFooter($params, $func = '')
    {
        $hook_hash = $this->getHookHash($func ? $func : __FUNCTION__);
        $template = 'module:stproductcomments/views/templates/hook/pcomments_footer.tpl';
	    if (!$this->isCached($template, $this->stGetCacheId($hook_hash)))
	    {
            $this->smarty->assign(array(
                'pcomments'          => $this->getComments('fot'),
                'hide_mob'          => Configuration::get($this->_prefix_st.'HIDE_MOB_FOT'),
                'aw_display'        => Configuration::get($this->_prefix_st.'AW_DISPLAY_FOT'),
                'footer_wide'       => Configuration::get($this->_prefix_st.'FOOTER_WIDE'),
                'hook_hash'         => $hook_hash,
            ));    
	    }
		return $this->fetch($template, $this->stGetCacheId($hook_hash));
    }
	public function hookDisplayLeftColumn($params, $func = '')
	{
	    $hook_hash = $this->getHookHash($func ? $func : __FUNCTION__);
        $template = 'module:stproductcomments/views/templates/hook/pcomments_slider.tpl';
	    if (!$this->isCached($template, $this->stGetCacheId($hook_hash)))
        {
            $this->_prepareHook('col');
            
            $this->smarty->assign(array(
                'column_slider'         => true,
                'homeverybottom'        => false,
                'hook_hash'             => $hook_hash,
            ));
        }
		return $this->fetch($template, $this->stGetCacheId($hook_hash));
	}
    public function getCommentNumber($id_product,$link_rewrite=null)
    {
        if(!$id_product || !Validate::isUnsignedInt($id_product))
            return false;
        if (!StProductCommentClass::acceptComment($id_product))
            return false;
        
		$moderate = (int)Configuration::get($this->_prefix_st.'MODERATE');
        $comment_number = (int)StProductCommentClass::countComments($id_product,$this->context->shop->id,$moderate);
	    $this->smarty->assign(array(
            'comment_number'=>$comment_number,
            'id_product' => $id_product,
        ));
        if($link_rewrite)
            $this->smarty->assign('link_rewrite',$link_rewrite);
            
        return $this->display(__FILE__, 'comment_number.tpl');
    }
    private function getConfigFieldsValues()
    {
        $fields_value = array();
        foreach($this->getFormFieldsDefault() AS $k => $v) {
            $fields_value[$k] = Configuration::get($this->_prefix_st.strtoupper($k));
        }
        foreach($this->fields_default_stsn AS $k=> $v) {
            $fields_value[$k] = Configuration::get($this->_prefix_stsn.strtoupper($k));
        }
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                $fields_value[$key.'_'.$value['id']] = 0;
                if($id_hook = Hook::getIdByName($value['id']))
                    if(Hook::getModulesFromHook($id_hook, $this->id))
                        $fields_value[$key.'_'.$value['id']] = 1;
            }
        }
        return $fields_value;
    }
    public function renderWidget($hookName = null, array $configuration = [])
    {
        $this->initHookArray();
        $in_product_page = false;
        foreach ($this->_hooks as $sub_hooks) {
        foreach ($sub_hooks as $v) {
            if (Tools::strtolower($v['id'])==Tools::strtolower($hookName)) {
                $in_product_page = isset($v['in_product_page']);
                break 2;
            }
        }
        }
        if ($in_product_page) {
            return $this->renderCommentExtra($hookName, $configuration);
        } else {
            return false;
        }
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return false;
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
    protected function stGetCacheId($key,$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key;
	}
    public function getFormFields()
    {
        $form_fields = include(dirname(__FILE__).'/formFields.php');
        return $form_fields;
    }
    public function getFormFieldsDefault()
    {
        $default = array();
        foreach($this->getFormFields() AS $key => $value) {
            if ($key == 'hook') {
                continue;
            }
            foreach($value AS $k => $v) {
                if (!$k || !is_array($v)) {
                    continue;
                }
                $default[$k] = isset($v['default_value']) ? $v['default_value'] : '';
            }
        }
        return $default;
    }
    public function getPatternsArray()
    {
        $arr = array();
        for($i=1;$i<=27;$i++)
            $arr[] = array('id'=>$i,'name'=>$i); 
        return $arr;   
    }
    public function getPatterns()
    {
        $html = '';
        foreach(range(1,27) as $v)
            $html .= '<div class="parttern_wrap" style="background:url('._MODULE_DIR_.$this->name.'/views/patterns/'.$v.'.png);"><span>'.$v.'</span></div>';
        $html .= '<div>Pattern credits:<a href="http://subtlepatterns.com" target="_blank">subtlepatterns.com</a></div>';
        return $html;
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
    public function getHookHash($func='')
    {
        if (!$func)
            return '';
        return substr(md5($func), 0, 10);
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
                    $res['classes'][$icon->code] = 'fto-'.$icon->css;
                }
        }
        if (file_exists($theme_path.'font-fontello/icons.scss'))
        {
            $icons_css = Tools::file_get_contents($theme_path.'font-fontello/icons.scss');
            $res['css'] .= $icons_css;
        }

        return $res;
    }
    public function getNavigate($id_st_product_comment=0)
    {
        $navs = array();
        $navs[] = '<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'">'.$this->getTranslator()->trans('Home', array(), 'Admin.Theme.Transformer').'</a>';
        $parents = StProductCommentClass::getParents($id_st_product_comment);
        if(is_array($parents) && count($parents))
        {
            $parents = array_reverse($parents);
            $count = count($parents);
            foreach ($parents as $i => $value) {
                if ($i < $count-1)
                    $navs[] = '<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&view'.$this->name.'&id_st_product_comment='.$value['id_st_product_comment'].'">'.$value['customer_name'].'</a>';
                else
                    $navs[] = $value['customer_name'];
            }
        }
        $this->smarty->assign('navigate', $navs);
        return $this->display(__FILE__, 'bo_navigation.tpl');
    }
    
    public function redirectWithNotification($notification, $url)
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            $_SESSION['notifications'] = $notification;
        } elseif (session_status() == PHP_SESSION_NONE) {
            session_start();
            $_SESSION['notifications'] = $notification;
        } else {
            setcookie('notifications', $notification);
        }

        return call_user_func_array(array('Tools', 'redirectAdmin'), array($url));
    }
    
    protected function prepareNotification()
    {
        $notification = '';

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['notifications'])) {
            $notification = $_SESSION['notifications'];
            unset($_SESSION['notifications']);
        } elseif (isset($_COOKIE['notifications'])) {
            $notification = $_COOKIE['notifications'];
            unset($_COOKIE['notifications']);
        }
        
        return $notification;
    }
    
    public function getConfigError()
    {
        if (!$conf = Tools::getValue('st_conf')) {
            return;
        }
        $errors = array(
            1 => $this->getTranslator()->trans('An error occurred during deleting.', array(), 'Admin.Theme.Transformer'),
            1 => $this->getTranslator()->trans('An error occurred during deleting section.', array(), 'Admin.Theme.Transformer'),
            3 => $this->getTranslator()->trans('An error occurred during creation.', array(), 'Admin.Theme.Transformer'),
            4 => $this->getTranslator()->trans('An error occurred during updating.', array(), 'Admin.Theme.Transformer'),
            5 => $this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'),
            6 => $this->getTranslator()->trans('The settings updated failed.', array(), 'Admin.Theme.Transformer'),
            7 => $this->getTranslator()->trans('Invalid value for fields.', array(), 'Admin.Theme.Transformer'),
        );
        if (!key_exists($conf, $errors)) {
            return;
        }
        return $this->displayError($errors[$conf]);
    }
}
