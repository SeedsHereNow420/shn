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

require_once _PS_MODULE_DIR_.'stnewsletter/classes/StNewsLetterClass.php';

class StNewsLetter extends Module implements WidgetInterface
{
    private $templateFile;
    public $imgtype = array('jpg', 'gif', 'jpeg', 'png');
    protected static $access_rights = 0775;
    private $_pages = array();
    private $_html = '';
    public  $fields_list;
    public $fields_form;
    public $fields_value;
    private $validation_errors = array();
    private $_prefix_st = 'ST_NW_';

    public static $location = array(
        4 => array('id' =>4 , 'name' => 'Popup'),
        36 => array('id' =>36 , 'name' => 'Full width top', 'hook' => 'FullWidthTop', 'full_width' => 1),
        31 => array('id' =>31 , 'name' => 'Full width top 2', 'hook' => 'FullWidthTop2', 'full_width' => 1),
        16 => array('id' =>16 , 'name' => 'Homepage top', 'hook' => 'HomeTop'),
        1 => array('id' =>1 , 'name' => 'Homepage', 'hook' => 'Home'),
        17 => array('id' =>17 , 'name' => 'Homepage bottom', 'hook' => 'HomeBottom'),
        29 => array('id' =>29 , 'name' => 'Homepage left', 'hook' => 'HomeLeft'),
        30 => array('id' =>30 , 'name' => 'Homepage Right', 'hook' => 'HomeRight'),
        53 => array('id' =>53 , 'name' => 'Homepage first quarter', 'hook' => 'HomeFirstQuarter'),
        54 => array('id' =>54 , 'name' => 'Homepage second quarter', 'hook' => 'HomeSecondQuarter'),
        58 => array('id' =>58 , 'name' => 'Homepage third quarter', 'hook' => 'HomeThirdQuarter'),
        59 => array('id' =>59 , 'name' => 'Homepage fourth quarter', 'hook' => 'HomeFourthQuarter'),
        37 => array('id' =>37 , 'name' => 'Full width Bottom', 'hook' => 'FullWidthBottom', 'full_width' => 1),
        2 => array('id' =>2 , 'name' => 'Left column except the produt page', 'hook' => 'LeftColumn', 'column'=>1),
        10 => array('id' =>10 , 'name' => 'Right column except the produt page', 'hook' => 'RightColumn', 'column'=>1),
        100 => array('id' =>100 , 'name' => 'Left column on the product page only', 'hook' => 'LeftColumnProduct', 'column'=>1),
        101 => array('id' =>101 , 'name' => 'Right column on the product page only', 'hook' => 'RightColumnProduct', 'column'=>1),
        102 => array('id' =>102 , 'name' => 'Product right column', 'hook' => 'ProductRightColumn', 'column'=>1),

        13 => array('id' =>13 , 'name' => 'Stacked footer (Column 1)'  , 'hook' => 'StackedFooter1', 'is_stacked_footer'=>1),
        38 => array('id' =>38 , 'name' => 'Stacked footer (Column 2)'  , 'hook' => 'StackedFooter2', 'is_stacked_footer'=>1),
        55 => array('id' =>55 , 'name' => 'Stacked footer (Column 3)'  , 'hook' => 'StackedFooter3', 'is_stacked_footer'=>1),
        39 => array('id' =>39 , 'name' => 'Stacked footer (Column 4)'  , 'hook' => 'StackedFooter4', 'is_stacked_footer'=>1),
        40 => array('id' =>40 , 'name' => 'Stacked footer (Column 5)'  , 'hook' => 'StackedFooter5', 'is_stacked_footer'=>1),
        41 => array('id' =>41 , 'name' => 'Stacked footer (Column 6)'  , 'hook' => 'StackedFooter6', 'is_stacked_footer'=>1),

        3  => array('id' =>3 , 'name' => 'Footer (3/12 wide)', 'span' => '3', 'hook' => 'Footer'),
        43 => array('id' =>43 , 'name' => 'Footer (2/12 wide)', 'span' => '2', 'hook' => 'Footer'),
        56 => array('id' =>56 , 'name' => 'Footer (2.4/12 wide)', 'span' => '2-4', 'hook' => 'Footer'),
        44 => array('id' =>44 , 'name' => 'Footer (4/12 wide)', 'span' => '4', 'hook' => 'Footer'),
        45 => array('id' =>45 , 'name' => 'Footer (5/12 wide)', 'span' => '5', 'hook' => 'Footer'),
        46 => array('id' =>46 , 'name' => 'Footer (6/12 wide)', 'span' => '6', 'hook' => 'Footer'),
        81 => array('id' =>81 , 'name' => 'Footer (7/12 wide)', 'span' => '7', 'hook' => 'Footer'),
        82 => array('id' =>82 , 'name' => 'Footer (8/12 wide)', 'span' => '8', 'hook' => 'Footer'),
        83 => array('id' =>83 , 'name' => 'Footer (9/12 wide)', 'span' => '9', 'hook' => 'Footer'),
        84 => array('id' =>84 , 'name' => 'Footer (10/12 wide)', 'span' => '10', 'hook' => 'Footer'),
        47 => array('id' =>47 , 'name' => 'Footer (12/12 wide)', 'span' => '12', 'hook' => 'Footer'),

        12 => array('id' =>12 , 'name' => 'Footer tertiary (3/12 wide)', 'span' => '3', 'hook' => 'FooterAfter'),
        48 => array('id' =>48 , 'name' => 'Footer tertiary (2/12 wide)', 'span' => '2', 'hook' => 'FooterAfter'),
        57 => array('id' =>57 , 'name' => 'Footer tertiary (2.4/12 wide)', 'span' => '2-4', 'hook' => 'FooterAfter'),
        49 => array('id' =>49 , 'name' => 'Footer tertiary (4/12 wide)', 'span' => '4', 'hook' => 'FooterAfter'),
        50 => array('id' =>50 , 'name' => 'Footer tertiary (5/12 wide)', 'span' => '5', 'hook' => 'FooterAfter'),
        51 => array('id' =>51 , 'name' => 'Footer tertiary (6/12 wide)', 'span' => '6', 'hook' => 'FooterAfter'),
        91 => array('id' =>91 , 'name' => 'Footer tertiary (7/12 wide)', 'span' => '7', 'hook' => 'FooterAfter'),
        92 => array('id' =>92 , 'name' => 'Footer tertiary (8/12 wide)', 'span' => '8', 'hook' => 'FooterAfter'),
        93 => array('id' =>93 , 'name' => 'Footer tertiary (9/12 wide)', 'span' => '9', 'hook' => 'FooterAfter'),
        94 => array('id' =>94 , 'name' => 'Footer tertiary (10/12 wide)', 'span' => '10', 'hook' => 'FooterAfter'),
        52 => array('id' =>52 , 'name' => 'Footer tertiary (12/12 wide)', 'span' => '12', 'hook' => 'FooterAfter'),
    );
	public function __construct()
	{
		$this->name          = 'stnewsletter';
		$this->tab           = 'front_office_features';
		$this->version       = '1.4';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;

		parent::__construct();
        
        $this->displayName = $this->trans('Newsletter popup', array(), 'Modules.Stnewsletter.Admin');
        $this->description = $this->trans('Adds a block for newsletter subscription.', array(), 'Modules.Stnewsletter.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);

        $this->templateFile = 'module:stnewsletter/views/templates/hook/stnewsletter.tpl';
        
        $this->file = 'export_'.date('YmdHis').'.csv';
        $this->controllers = array('verification');        
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
                array(
                    'id' => 'order',
                    'val' => '512',
                    'name' => $this->getTranslator()->trans('Shopping cart', array(), 'Admin.Theme.Transformer')
                ),
            );
    }
    
	public function install()
	{
        $res = parent::install() &&
            $this->installDB() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('displaySideBar') &&
            $this->registerHook('actionCustomerAccountAdd') &&
            $this->registerHook('additionalCustomerFormFields') &&
            Configuration::updateValue($this->_prefix_st.'VERIFICATION_EMAIL', 0) &&
            Configuration::updateValue($this->_prefix_st.'CONFIRMATION_EMAIL', 0) &&
            Configuration::updateValue($this->_prefix_st.'VOUCHER_CODE', '') &&
            Configuration::updateValue('NW_SALT', Tools::passwdGen(16));
        
        if ($res)
            foreach(Shop::getShops(false) as $shop)
                $res &= $this->sampleData($shop['id_shop']);
        $this->prepareHooks();
        $this->clearStNewsLetterCache();
        return $res;
	}
    public function installDB()
    {
        $return = (bool)Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_news_letter` (
                `id_st_news_letter` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `location` int(10) unsigned NOT NULL DEFAULT 0, 
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `item_k` tinyint(2) unsigned NOT NULL DEFAULT 0,  
                `item_v` varchar(255) DEFAULT NULL,  
                `popup_width` int(10) unsigned NOT NULL DEFAULT 600,
                `content_text_color` varchar(7) DEFAULT NULL,
                `content_link_color` varchar(7) DEFAULT NULL,
                `content_link_hover` varchar(7) DEFAULT NULL,
                `bg_color` varchar(7) DEFAULT NULL,
                `bg_pattern` tinyint(2) unsigned NOT NULL DEFAULT 0, 
                `bg_img` varchar(255) DEFAULT NULL,
                `top_spacing` int(10) unsigned NOT NULL DEFAULT 50,
                `bottom_spacing` int(10) unsigned NOT NULL DEFAULT 50,
                `top_padding` varchar(10) DEFAULT NULL,
                `bottom_padding` varchar(10) DEFAULT NULL,
                `right_spacing` int(10) unsigned NOT NULL DEFAULT 5,
                `left_spacing` int(10) unsigned NOT NULL DEFAULT 5,
                `text_align` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `input_width` int(10) unsigned NOT NULL DEFAULT 360,
                `input_height` int(10) unsigned NOT NULL DEFAULT 35,
                `input_color` varchar(7) DEFAULT NULL,
                `input_bg` varchar(7) DEFAULT NULL,
                `input_border` varchar(7) DEFAULT NULL,
                `btn_color` varchar(7) DEFAULT NULL,
                `btn_bg` varchar(7) DEFAULT NULL,
                `btn_hover_color` varchar(7) DEFAULT NULL,
                `btn_hover_bg` varchar(7) DEFAULT NULL,
                `show_popup` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `show_newsletter` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `cookies_time` int(10) unsigned NOT NULL DEFAULT 0,
                `delay_popup` int(10) unsigned NOT NULL DEFAULT 2,
                `subscribed` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `start_time` datetime DEFAULT NULL,
                `stop_time` datetime DEFAULT NULL,
                `display_on` int(10) unsigned NOT NULL DEFAULT 0,
                `show_gender` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `title_align` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `id_gender` int(10) unsigned NOT NULL DEFAULT 0,
                `template` tinyint(3) unsigned NOT NULL DEFAULT 0,
                PRIMARY KEY (`id_st_news_letter`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
        
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_news_letter_lang` (
                `id_st_news_letter` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `id_lang` int(10) unsigned NOT NULL,
                `content` text NOT NULL,
                PRIMARY KEY (`id_st_news_letter`, `id_lang`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
        
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_news_letter_shop` (
                `id_st_news_letter` int(10) UNSIGNED NOT NULL,
                `id_shop` int(11) NOT NULL,      
                PRIMARY KEY (`id_st_news_letter`,`id_shop`),    
                KEY `id_shop` (`id_shop`)   
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'emailsubscription` (
                `id` int(6) NOT NULL AUTO_INCREMENT,
                `id_shop` INTEGER UNSIGNED NOT NULL DEFAULT \'1\',
                `id_shop_group` INTEGER UNSIGNED NOT NULL DEFAULT \'1\',
                `email` varchar(255) NOT NULL,
                `newsletter_date_add` DATETIME NULL,
                `ip_registration_newsletter` varchar(15) NOT NULL,
                `http_referer` VARCHAR(255) NULL,
                `active` TINYINT(1) NOT NULL DEFAULT \'0\',
                PRIMARY KEY(`id`)
            ) ENGINE='._MYSQL_ENGINE_.' default CHARSET=utf8;');
            
        return $return;
    }
    public function sampleData($id_shop)
    {
        $return = true;
        $samples = array(
            array(
                'location'      => 12,
                'active'        => 1,
                'hide_on_mobile'=> 0,
                'text_align'    => 1,
                'input_width'   => 258,
                'input_height'  => 35,
                'show_newsletter' => 1,
                'input_border'  => '#444444',
                'subscribed'    => 1,
                'text'          => '<p class="m-b-1">Sign up today for free and be the first to get notified on our new updates, discounts and special Offers.</p>',
            )
        );
        
        foreach($samples as $k=>$sample)
        {
            $module = new StNewsLetterClass();
            foreach (Language::getLanguages(false) as $lang)
            {
				$module->content[$lang['id_lang']] = $sample['text'];
            }
            $module->location       = $sample['location'];
            $module->active         = $sample['active'];
            $module->hide_on_mobile = $sample['hide_on_mobile'];
            $module->text_align     = $sample['text_align'];
            $module->input_width    = $sample['input_width'];
            $module->input_height   = $sample['input_height'];
            $module->show_newsletter= $sample['show_newsletter'];
            $module->subscribed     = $sample['subscribed'];
            $module->input_border   = $sample['input_border'];
            $module->position       = $k;
            $module->id_shop_list   = array((int)$id_shop);
            $return &= $module->add();
        }
        return $return;
    }

    public function uninstall()
    {
        $this->clearStNewsLetterCache();
        // Delete configuration
        return $this->uninstallDB() && parent::uninstall();
    }

    public function uninstallDB()
    {
        return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_news_letter`,`'._DB_PREFIX_.'st_news_letter_lang`,`'._DB_PREFIX_.'st_news_letter_shop`');
    }
    protected function stGetCacheId($key,$type='location',$name = null)
    {
        $cache_id = parent::getCacheId($name);
        return $cache_id.'_'.$key.'_'.$type;
    }
    private function clearStNewsLetterCache()
    {
        $this->_clearCache('*');
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
        $check_result = $this->_checkImageDir();
        $this->context->controller->addCSS(($this ->_path).'views/css/admin.css');
        $this->context->controller->addJS($this->_path. 'views/js/admin.js');
        $this->initPages();
        $id_st_news_letter = (int)Tools::getValue('id_st_news_letter');
        if ((Tools::isSubmit('statusstnewsletter')))
        {
            $news_letter = new StNewsLetterClass((int)$id_st_news_letter);
            if($news_letter->id && $news_letter->toggleStatus())
            {
                $this->clearStNewsLetterCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('The status has been updated successfully.', array(), 'Admin.Theme.Transformer'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if(Tools::getValue('act')=='delete_image' && $identi = Tools::getValue('identi'))
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $news_letter = new StNewsLetterClass((int)(int)$identi);
            if(Validate::isLoadedObject($news_letter))
            {
                $news_letter->bg_img = '';
                if($news_letter->save())
                {
                    $result['r'] = true;
                }
            }
            die(json_encode($result));
        }
        if ((Tools::isSubmit('groupdeleteimagestnewsletter')))
        {
            $news_letter = new StNewsLetterClass($id_st_news_letter);
            if($news_letter->id)
            {
                @unlink(_PS_ROOT_DIR_._THEME_PROD_PIC_DIR_.$this->name.'/'.$news_letter->bg_img);
                $news_letter->bg_img = '';
                if ($news_letter->save())
                {
                    //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('The image was deleted successfully.', array(), 'Admin.Theme.Transformer'));  
                    $this->clearStNewsLetterCache();
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=7&updatestnewsletter&id_st_news_letter='.(int)$news_letter->id.'&token='.Tools::getAdminTokenLite('AdminModules'));   
                }else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while delete image.', array(), 'Admin.Theme.Transformer'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while delete image.', array(), 'Admin.Theme.Transformer'));
        }
        if (isset($_POST['savestnewsletter']) || isset($_POST['savestnewsletterAndStay']))
        {
            if ($id_st_news_letter)
                $news_letter = new StNewsLetterClass((int)$id_st_news_letter);
            else
                $news_letter = new StNewsLetterClass();
            
            $error = array();
            $news_letter->copyFromPost();
            
            if(!$news_letter->location)
                $error[] = $this->displayError($this->getTranslator()->trans('The field "Show on" is required', array(), 'Modules.Stnewsletter.Admin'));

            if(!count($error))
            {
                if (isset($_FILES['bg_img']) && isset($_FILES['bg_img']['tmp_name']) && !empty($_FILES['bg_img']['tmp_name'])) 
                {
                    if ($vali = ImageManager::validateUpload($_FILES['bg_img'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                       $error[] = Tools::displayError($vali);
                    else 
                    {
                        $bg_image = $this->uploadCheckAndGetName($_FILES['bg_img']['name']);
                        if(!$bg_image)
                            $error[] = Tools::displayError('Image format not recognized');
                        if (!move_uploaded_file($_FILES['bg_img']['tmp_name'], _PS_UPLOAD_DIR_.$this->name.'/'.$bg_image))
                            $error[] = Tools::displayError('Error move uploaded file');
                        else
                           $news_letter->bg_img = $this->name.'/'.$bg_image;
                    }
                }
            }

            $display_on = 0;
            foreach($this->_pages as $v)
                $display_on += (int)Tools::getValue('display_on_'.$v['id']);
                
            $news_letter->display_on = $display_on;

            if (!count($error) && $news_letter->validateFields(false) && $news_letter->validateFieldsLang(false))
            {
                $shop_ids = $news_letter->getShopIds();
                $news_letter->clearShopIds();
                $id_shop_list = array();
                if($assos_shop = Tools::getValue('checkBoxShopAsso_st_news_letter')) {
                    foreach ($assos_shop as $id_shop => $row) {
                        $id_shop_list[] = $id_shop;
                    }
                }
                if (!$id_shop_list) {
                    $id_shop_list = array(Context::getContext()->shop->id);
                }
                $news_letter->id_shop_list = array_unique($id_shop_list);
                if($news_letter->save())
                {
                    $this->prepareHooks();
                    $this->clearStNewsLetterCache();
                    if(isset($_POST['savestnewsletterAndStay']) || Tools::getValue('fr') == 'view')
                    {
                        $rd_str = isset($_POST['savestnewsletterAndStay']) && Tools::getValue('fr') == 'view' ? 'fr=view&update' : (isset($_POST['savestnewsletterAndStay']) ? 'update' : 'view');
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_news_letter='.$news_letter->id.'&conf='.($id_st_news_letter?4:3).'&'.$rd_str.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
                    }    
                    else
                        $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Newsletter', array(), 'Admin.Theme.Transformer').' '.($id_st_news_letter ? $this->getTranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('added', array(), 'Admin.Theme.Transformer')));
                }                    
                else {
                    $news_letter->restoreShopIds($shop_ids);
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during newsletter', array(), 'Modules.Stnewsletter.Admin').' '.($id_st_news_letter ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
                }    
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        if (isset($_POST['savesettingstnewsletter']) || isset($_POST['savesettingstnewsletterAndStay']))
        {
            $this->initFieldsForm();
            
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
                                default:
                                    $value = '';
                                break;
                            }
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value);
                    }
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
            {
                $this->clearStNewsLetterCache();
                if(isset($_POST['savesettingstnewsletterAndStay']))
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&token='.Tools::getAdminTokenLite('AdminModules')); 
                else
                    $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Admin.Theme.Transformer'));
            }
        }
        if(Tools::isSubmit('addstnewsletter') || (Tools::isSubmit('updatestnewsletter') && $id_st_news_letter))
        {
            $helper = $this->initForm();
            return $this->_html.$helper->generateForm($this->fields_form);
        }
        else if (Tools::isSubmit('deletestnewsletter') && $id_st_news_letter)
        {
            $news_letter = new StNewsLetterClass($id_st_news_letter);
            $news_letter->delete();
            $this->prepareHooks();
            $this->clearStNewsLetterCache();
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        elseif (Tools::isSubmit('settingstnewsletter'))
		{
		    $this->initFieldsForm();
			$helper = $this->initSettingForm();
            
			return $this->_html.$helper->generateForm($this->fields_form);
		}
        else
        {
            if (Tools::isSubmit('submitExport') && $action = Tools::getValue('action'))
			     $this->export_csv();
            $helper = $this->initList();
            $this->_html .= $helper->generateList(StNewsLetterClass::getAll((int)$this->context->language->id), $this->fields_list);
            $this->initFieldsForm();
			$helper = $this->initSettingForm();
            $this->_html .= $helper->generateForm($this->fields_form);
            $this->_html .= $this->renderExportForm();
            return $this->_html;
        }
    }
    
    public function renderExportForm()
	{
		// Getting data...
		$countries = Country::getCountries($this->context->language->id);

		// ...formatting array
		$countries_list = array(array('id' => 0, 'name' => $this->getTranslator()->trans('All countries', array(), 'Modules.Stnewsletter.Admin')));
		foreach ($countries as $country)
			$countries_list[] = array('id' => $country['id_country'], 'name' => $country['name']);

		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->getTranslator()->trans('Export customers\' addresses', array(), 'Modules.Stnewsletter.Admin'),
					'icon' => 'icon-envelope'
				),
				'input' => array(
					array(
						'type' => 'select',
						'label' => $this->getTranslator()->trans('Customers\' country', array(), 'Modules.Stnewsletter.Admin'),
						'desc' => $this->getTranslator()->trans('Filter customers by country.', array(), 'Modules.Stnewsletter.Admin'),
						'name' => 'COUNTRY',
						'required' => false,
						'default_value' => (int)$this->context->country->id,
						'options' => array(
							'query' => $countries_list,
							'id' => 'id',
							'name' => 'name',
						)
					),
					array(
						'type' => 'select',
						'label' => $this->getTranslator()->trans('Newsletter subscribers', array(), 'Modules.Stnewsletter.Admin'),
						'desc' => $this->getTranslator()->trans('Filter customers who have subscribed to the newsletter or not, and who have an account or not.', array(), 'Modules.Stnewsletter.Admin'),
						'hint' => $this->getTranslator()->trans('Customers can subscribe to your newsletter when registering, or by entering their email in the newsletter popup.', array(), 'Modules.Stnewsletter.Admin'),
						'name' => 'SUSCRIBERS',
						'required' => false,
						'default_value' => (int)$this->context->country->id,
						'options' => array(
							'query' => array(
								array('id' => 0, 'name' => $this->getTranslator()->trans('All subscribers', array(), 'Modules.Stnewsletter.Admin')),
								array('id' => 1, 'name' => $this->getTranslator()->trans('Subscribers with account', array(), 'Modules.Stnewsletter.Admin')),
								array('id' => 2, 'name' => $this->getTranslator()->trans('Subscribers without account', array(), 'Modules.Stnewsletter.Admin')),
								array('id' => 3, 'name' => $this->getTranslator()->trans('Non-subscribers', array(), 'Modules.Stnewsletter.Admin'))
							),
							'id' => 'id',
							'name' => 'name',
						)
					),
					array(
						'type' => 'select',
						'label' => $this->getTranslator()->trans('Opt-in subscribers', array(), 'Modules.Stnewsletter.Admin'),
						'desc' => $this->getTranslator()->trans('Filter customers who have agreed to receive your partners\' offers or not.', array(), 'Modules.Stnewsletter.Admin'),
						'hint' => $this->getTranslator()->trans('Opt-in subscribers have agreed to receive your partners\' offers.', array(), 'Modules.Stnewsletter.Admin'),
						'name' => 'OPTIN',
						'required' => false,
						'default_value' => (int)$this->context->country->id,
						'options' => array(
							'query' => array(
								array('id' => 0, 'name' => $this->getTranslator()->trans('All customers', array(), 'Modules.Stnewsletter.Admin')),
								array('id' => 2, 'name' => $this->getTranslator()->trans('Opt-in subscribers', array(), 'Modules.Stnewsletter.Admin')),
								array('id' => 1, 'name' => $this->getTranslator()->trans('Opt-in non-subscribers', array(), 'Modules.Stnewsletter.Admin'))
							),
							'id' => 'id',
							'name' => 'name',
						)
					),
                    array(
        				'type' => 'html',
                        'id' => 'a_go',
        				'label' => '',
        				'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure=ps_emailsubscription&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-right"></i> View subscribers </a>',                  
        			),
					array(
						'type' => 'hidden',
						'name' => 'action',
					)
				),
				'submit' => array(
					'title' => $this->getTranslator()->trans('Export .CSV file', array(), 'Modules.Stnewsletter.Admin'),
					'class' => 'btn btn-default pull-right',
					'name' => 'submitExport',
				)
			),
		);

		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->id = (int)Tools::getValue('id_carrier');
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'btnSubmit';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		return $helper->generateForm(array($fields_form));
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
                $temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
                $salt = sha1(microtime());
                $c_name = Tools::encrypt($_FILES[$item]['name'].$salt);
                $c_name_thumb = $c_name.'_thumb';
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
                    $result['image'] = $this->name.'/'.$c_name.'.'.$type;
                    $result['thumb'] = $this->name.'/'.$c_name_thumb.'.'.$type;
                }
                return $result;
            }
        }
        else
            return $result;
    }
    

    public static function showApplyTo($value,$row)
    {
        return isset(self::$location[$value]) ? self::$location[$value]['name'] : '--';
    }
    protected function initList()
    {
        $this->fields_list = array(
            'id_st_news_letter' => array(
                'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
                'width' => 120,
                'type' => 'text',
                'search' => false,
                'orderby' => false
            ),
            'location' => array(
                'title' => $this->getTranslator()->trans('Show on', array(), 'Admin.Theme.Transformer'),
                'width' => 200,
                'type' => 'text',
                'callback' => 'showApplyTo',
                'callback_object' => 'StNewsLetter',
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
        $helper->identifier = 'id_st_news_letter';
        $helper->actions = array('edit', 'delete');
        $helper->show_toolbar = true;
        $helper->imageType = 'jpg';
        $helper->toolbar_btn['new'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstnewsletter&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Add a block', array(), 'Modules.Stnewsletter.Admin'),
        );
        $helper->toolbar_btn['export'] =  array(
			'href' => AdminController::$currentIndex.'&configure=ps_emailsubscription&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('View subscribers', array(), 'Modules.Stnewsletter.Admin'),
		);

        $helper->title = $this->displayName;
        $helper->table = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        return $helper;
    }

    protected function initForm()
    {        
        $location_temp = self::$location;
        unset($location_temp[4]);
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Configuration', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                'location' => array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Show on:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'location',
                    'options' => array(
                        'query' => $location_temp,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 4,
                            'label' => $this->getTranslator()->trans('Popup', array(), 'Modules.Stnewsletter.Admin'),
                        ),
                    ),
                    'required'  => true,
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Templates:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'template',
                    'default_value' => 0,
                    'validation' => 'isUnsignedInt',
                    'values' => array(
                        array(
                            'id' => 'template_0',
                            'value' => 0,
                            'label' => '<img src="'.$this->_path.'views/img/template_0.jpg" />',
                        ),
                        array(
                            'id' => 'template_1',
                            'value' => 1,
                            'label' => '<img src="'.$this->_path.'views/img/template_1.jpg" />',
                        ),
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'top_spacing',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bottom_spacing',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'top_padding',
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bottom_padding',
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Right spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'right_spacing',
                    'default_value' => 0,
                    'options' => array(
                        'query' => array(
                                array('id' => 0, 'name'=>'0%'),
                                array('id' => 5, 'name'=>'5%'),
                                array('id' => 10, 'name'=>'10%'),
                                array('id' => 20, 'name'=>'20%'),
                                array('id' => 30, 'name'=>'30%'),
                                array('id' => 40, 'name'=>'40%'),
                                array('id' => 50, 'name'=>'50%'),
                                array('id' => 60, 'name'=>'60%'),
                                array('id' => 70, 'name'=>'70%'),
                            ),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Left spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'left_spacing',
                    'default_value' => 0,
                    'options' => array(
                        'query' => array(
                                array('id' => 0, 'name'=>'0%'),
                                array('id' => 5, 'name'=>'5%'),
                                array('id' => 10, 'name'=>'10%'),
                                array('id' => 20, 'name'=>'20%'),
                                array('id' => 30, 'name'=>'30%'),
                                array('id' => 40, 'name'=>'40%'),
                                array('id' => 50, 'name'=>'50%'),
                                array('id' => 60, 'name'=>'60%'),
                                array('id' => 70, 'name'=>'70%'),
                            ),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Hide on mobile:', array(), 'Admin.Theme.Transformer'),
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
                    'desc' => $this->getTranslator()->trans('Screen width < 768px.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Title:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'title_align',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'left',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'center',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'right',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'none',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Show social title:', array(), 'Modules.Stnewsletter.Admin'),
                    'name' => 'show_gender',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'show_gender_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'show_gender_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    'desc' => $this->getTranslator()->trans('Male or female.', array(), 'Modules.Stnewsletter.Admin'),
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
                    'title'=> $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
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
                'title' => $this->getTranslator()->trans('Content', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array( 
                array(
                    'type' => 'textarea',
                    'label' => $this->getTranslator()->trans('Content:', array(), 'Admin.Theme.Transformer'),
                    'lang' => true,
                    'name' => 'content',
                    'cols' => 40,
                    'rows' => 10,
                    'autoload_rte' => true,
                    'desc' => $this->getTranslator()->trans('Format your entry with some basic HTML. Click on FLASH button above to use predefined templates.', array(), 'Modules.Stnewsletter.Admin'),
                ),
                array(
                    'type' => 'go_to_adv_editor',
                    'label' => '',
                    'name' => Context::getContext()->link->getModuleLink(
                                'stbanner', 'adveditor', array('caller_module'=>$this->name,'adveditor_target'=>'content')),
                    'name_blank' => Context::getContext()->link->getModuleLink(
                                'stbanner', 'adveditor', array('caller_module'=>$this->name,'adveditor_window'=>'blank','adveditor_target'=>'content')),
                ),

                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Content alignment:', array(), 'Modules.Stnewsletter.Admin'),
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
                    'label' => $this->getTranslator()->trans('Color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'content_text_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'content_link_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'content_link_hover',
                    'size' => 33,
                ),

                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'input_border',
                    'size' => 33,
                ),

                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Input width:', array(), 'Modules.Stnewsletter.Admin'),
                    'name' => 'input_width',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Input height:', array(), 'Modules.Stnewsletter.Admin'),
                    'name' => 'input_height',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px'
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Input text color:', array(), 'Modules.Stnewsletter.Admin'),
                    'name' => 'input_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Input background color:', array(), 'Modules.Stnewsletter.Admin'),
                    'name' => 'input_bg',
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
                    'label' => $this->getTranslator()->trans('Button background color:', array(), 'Admin.Theme.Transformer'),
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
                    'label' => $this->getTranslator()->trans('Button hover background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_hover_bg',
                    'size' => 33,
                ),

                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_pattern',
                    'options' => array(
                        'query' => $this->getPatternsArray(),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
                        ),
                    ),
                    'desc' => $this->getPatterns(),
                    'validation' => 'isUnsignedInt',
                ),
                'bg_img_field' => array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Upload your own pattern or background image:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_img',
                    'desc' => '',
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
                    'title'=> $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
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
                'title' => $this->getTranslator()->trans('Popup', array(), 'Modules.Stnewsletter.Admin'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array( 
                array(
                    'type' => 'checkbox',
                    'label' => $this->getTranslator()->trans('Display on', array(), 'Admin.Theme.Transformer'),
                    'name' => 'display_on',
                    'lang' => true,
                    'default_value' => 1,
                    'values' => array(
                        'query' => $this->_pages,
                        'id' => 'id',
                        'name' => 'name'
                    ),
                    'desc' => $this->getTranslator()->trans('This option is for Popup windows.', array(), 'Modules.Stnewsletter.Admin'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display newsletter form:', array(), 'Modules.Stnewsletter.Admin'),
                    'name' => 'show_newsletter',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'show_newsletter_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'show_newsletter_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'popup_width',
                    'default_value' => 600,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to show this popup:', array(), 'Modules.Stnewsletter.Admin'),
                    'name' => 'show_popup',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'image',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('At all time with a do not show option', array(), 'Modules.Stnewsletter.Admin')),
                        array(
                            'id' => 'hosted',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('At all time', array(), 'Modules.Stnewsletter.Admin')),
                        array(
                            'id' => 'youtube',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('First time only', array(), 'Modules.Stnewsletter.Admin')),
                    ),
                ),  

                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Do not show again time period:', array(), 'Modules.Stnewsletter.Admin'),
                    'name' => 'cookies_time',
                    'default_value' => 7,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'days',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Delay:', array(), 'Modules.Stnewsletter.Admin'),
                    'name' => 'delay_popup',
                    'default_value' => 2,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 's',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Do not show this popup if already subscribed:', array(), 'Modules.Stnewsletter.Admin'),
                    'name' => 'subscribed',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'subscribed_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'subscribed_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
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
                    'title'=> $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
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
            'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
        );
        
        $id_st_news_letter = (int)Tools::getValue('id_st_news_letter');
        $news_letter = new StNewsLetterClass($id_st_news_letter);
        
        if($news_letter->id)
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_news_letter');
            
            if ($news_letter->bg_img)
            {
                StNewsLetterClass::fetchMediaServer($news_letter->bg_img);
                $this->fields_form[1]['form']['input']['bg_img_field']['image'] = '<img width=200 src="'.($news_letter->bg_img).'" /><p><a class="btn btn-default st_delete_image" href="javascript:;" data-id-group="'.(int)$news_letter->id.'"><i class="icon-trash"></i> '.$this->getTranslator()->trans('Delete', array(), 'Modules.Stnewsletter.Admin').'</a></p>';
            }
        }
        
        
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->id = (int)$news_letter->id;
        $helper->module = $this;
        $helper->table =  'st_news_letter';
        $helper->identifier = 'id_st_news_letter';
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->submit_action = 'savestnewsletter';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($news_letter),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );
        
        $helper->title = $this->displayName; 
        if (!$news_letter->id) {
            // Show on Index page in default.
            $news_letter->display_on = 1;
        }
        foreach($this->_pages as $v)
            $helper->tpl_vars['fields_value']['display_on_'.$v['id']] = (int)$v['val']&(int)$news_letter->display_on;
        
        return $helper;
    }
    
    public function initFieldsForm()
    {
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Settings', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                array(
						'type' => 'switch',
						'label' => $this->getTranslator()->trans('Would you like to send a verification email after subscription?', array(), 'Modules.Stnewsletter.Admin'),
						'name' => 'verification_email',
						'values' => array(
							array(
								'id' => 'active_on',
								'value' => 1,
								'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
							),
							array(
								'id' => 'active_off',
								'value' => 0,
								'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
							)
						),
                        'validation' => 'isBool',
					),
					array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('Would you like to send a confirmation email after subscription?', array(), 'Modules.Stnewsletter.Admin'),
					'name' => 'confirmation_email',
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
						)
					),
                    'validation' => 'isBool',
				),
                array(
						'type' => 'text',
						'label' => $this->getTranslator()->trans('Welcome voucher code', array(), 'Modules.Stnewsletter.Admin'),
						'name' => 'voucher_code',
						'class' => 'fixed-width-md',
						'desc' => $this->getTranslator()->trans('Leave blank to disable by default.', array(), 'Admin.Theme.Transformer'),
                        'validation' => 'isString',
					),
            ),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                'stay' => true
			),
        );
    }
    
    protected function initSettingForm()
	{
	    $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savesettingstnewsletter';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'verification_email'          => Configuration::get($this->_prefix_st.'VERIFICATION_EMAIL'),
            'confirmation_email'          => Configuration::get($this->_prefix_st.'CONFIRMATION_EMAIL'),
            'voucher_code'                => Configuration::get($this->_prefix_st.'VOUCHER_CODE'),
            'COUNTRY'                     => Tools::getValue('COUNTRY'),
			'SUSCRIBERS'                  => Tools::getValue('SUSCRIBERS'),
			'OPTIN'                       => Tools::getValue('OPTIN'),
            'action'                      => 'customers',
        );
        return $fields_values;
    }

    public function getPatterns()
    {
        $html = '';
        foreach(range(1,27) as $v)
            $html .= '<div class="parttern_wrap" style="background:url('._MODULE_DIR_.'stthemeeditor/patterns/'.$v.'.png);"><span>'.$v.'</span></div>';
        $html .= '<div>Pattern credits:<a href="http://subtlepatterns.com" target="_blank">subtlepatterns.com</a></div>';
        return $html;
    }
    
    public function getPatternsArray()
    {
        $arr = array();
        for($i=1;$i<=27;$i++)
            $arr[] = array('id'=>$i,'name'=>$i); 
        return $arr;   
    }

    public function hookDisplayHeader($params)
    {
        Media::addJsDef(array(
            'wrongemailaddress_stnewsletter' => $this->getTranslator()->trans('Invalid email address', array(), 'Modules.Stnewsletter.Admin'),
        ));

        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $custom_css = '';
            $options = StNewsLetterClass::getOptions();
            if(is_array($options) && count($options))
                foreach($options as $v)    
                {
                    $classname = (isset(self::$location[$v['location']]['full_width']) ? '#st_news_letter_container_'.$v['id_st_news_letter'].' ' : '#st_news_letter_'.$v['id_st_news_letter'].' ');
                    
                    $group_css = '';
                    if ($v['bg_color'])
                        $group_css .= 'background-color:'.$v['bg_color'].';';
                    if ($v['bg_img'])
                    {
                        $img = _THEME_PROD_PIC_DIR_.$v['bg_img'];
                        $img = $this->context->link->protocol_content.Tools::getMediaServer($img).$img;
                        $group_css .= 'background-image: url('.$img.');';
                    }
                    elseif ($v['bg_pattern'])
                    {
                        $img = _MODULE_DIR_.'stthemeeditor/patterns/'.$v['bg_pattern'].'.png';
                        $img = $this->context->link->protocol_content.Tools::getMediaServer($img).$img;
                        $group_css .= 'background-image: url('.$img.');';
                    }
                    if($group_css)
                        $custom_css .= $classname.'{'.$group_css.'}';

                    if($v['location']==4)
                        $custom_css .= '#st_news_letter_popup_'.$v['id_st_news_letter'].' .modal-dialog{max-width:'.($v['popup_width']  ? (int)$v['popup_width']+50 : 650).'px;}'; //50 margin for the close button

                    if ($v['content_text_color'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].'{color:'.$v['content_text_color'].';}';
                    if ($v['content_link_color'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' a{color:'.$v['content_link_color'].';}';
                    if ($v['content_link_hover'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' a:hover{color:'.$v['content_link_hover'].';}';

                    if ($v['input_width'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_form_inner{max-width:'.$v['input_width'].'px;}';
                    if ($v['input_height'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_input{height:'.$v['input_height'].'px;}';
                    //#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_submit{height:'.$v['input_height'].'px;line-height:'.$v['input_height'].'px;}

                    if ($v['input_color'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_input{color:'.$v['input_color'].';}';
                    if ($v['input_bg'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_input{background-color:'.$v['input_bg'].';}';
                    if ($v['input_border'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .input-group-with-border{border-color:'.$v['input_border'].';}';

                    if ($v['btn_color'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_submit{color:'.$v['btn_color'].';}';
                    if ($v['btn_bg'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_submit{background-color:'.$v['btn_bg'].';}';
                    if ($v['btn_hover_color'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_submit:hover{color:'.$v['btn_hover_color'].';}';
                    if ($v['btn_hover_bg'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_submit:hover{background-color:'.$v['btn_hover_bg'].';}';
                    

                    if ($v['top_spacing'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_box{padding-top:'.$v['top_spacing'].'px;}';
                    if ($v['bottom_spacing'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_box{padding-bottom:'.$v['bottom_spacing'].'px;}';

                    if(isset($v['top_padding']) && ($v['top_padding'] || $v['top_padding']==='0'))
                        $custom_css .= $classname.'{margin-top:'.(int)$v['top_padding'].'px;}';
                    if(isset($v['bottom_padding']) && ($v['bottom_padding'] || $v['bottom_padding']==='0'))
                        $custom_css .= $classname.'{margin-bottom:'.(int)$v['bottom_padding'].'px;}';

                    if ($v['right_spacing'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_box{padding-right:'.$v['right_spacing'].'%;}';
                    if ($v['left_spacing'])
                        $custom_css .= '#st_news_letter_'.$v['id_st_news_letter'].' .st_news_letter_box{padding-left:'.$v['left_spacing'].'%;}';
                }
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
    }
    /*private function setCookie($name, $value = null, $time = null)
    {
        if (PHP_VERSION_ID <= 50200) // PHP version > 5.2.0
            return setcookie($name, $value, ($time ? time()+$time*86400 : time()+30*86400), $this->_cookie_path, $this->_cookie_domain, 0);
        else
            return setcookie($name, $value, ($time ? time()+$time*86400 : time()+30*86400), $this->_cookie_path, $this->_cookie_domain, 0, true);
    }
    */
    private function _prepareHook($identify,$type=1)
    {        
        $news_letter_array = StNewsLetterClass::getNewsLetter($this->context->language->id, $identify, $type);

        if(!is_array($news_letter_array) || !count($news_letter_array))
            $news_letter_array = array();
        $page = Dispatcher::getInstance()->getController();
        if(is_array($news_letter_array) && count($news_letter_array))
            foreach($news_letter_array as $k => &$v)
            {
                if($v['location']==4)
                {
                    $this->initPages();
                    $page_array = $this->getDisplayOn((int)$v['display_on']);
                    //to do check if 1.7 uses step
                    if (!in_array($page, $page_array) || ($page=='order' && Tools::getValue('step')))
                    {
                        unset($news_letter_array[$k]);
                        continue;
                    }
                    
                    if ($v['subscribed'] && isset($this->context->cookie->email) && Db::getInstance()->getRow('SELECT count(0) FROM `'._DB_PREFIX_.'emailsubscription` WHERE `email` = \''.$this->context->cookie->email.'\''))
                    {
                        unset($news_letter_array[$k]);
                        continue;
                    }
                    
                    if(isset($_COOKIE['st_popup_do_not_show_'.$v['id_st_news_letter']]) && $_COOKIE['st_popup_do_not_show_'.$v['id_st_news_letter']]==$v['show_popup'])
                    {
                        unset($news_letter_array[$k]);
                        continue;
                    }
                    //if($v['show_popup']==2)
                    //    $this->setCookie('st_popup_do_not_show_'.$v['id_st_news_letter'], $v['show_popup'], ($v['cookies_time'] ? (int)$v['cookies_time'] : 30));
                }
                $v['is_full_width'] = isset(self::$location[$v['location']]['full_width']) ? true : false;
                $v['is_column'] = isset(self::$location[$v['location']]['column']) ? true : false;
                $v['is_stacked_footer'] = isset(self::$location[$v['location']]['is_stacked_footer']);
                $v['span'] = isset(self::$location[$v['location']]['span']) ? self::$location[$v['location']]['span'] : 0;
            }
        $this->smarty->assign(array(
            'news_letter_array' => $news_letter_array,
            'ajax_url' => $this->context->link->getModuleLink('stnewsletter', 'ajax'),
        ));
        return true;
    }

    public function hookDisplaySideBar($params)
    {
        //if (!$this->isCached($this->templateFile, $this->stGetCacheId(4)))
            $this->_prepareHook(4);
        return $this->fetch($this->templateFile);
    }

    public function hookDisplayFullWidthTop($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;
        
        return $this->hookDisplayHome($params, 36);
    }
    public function hookDisplayFullWidthTop2($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;
        
        return $this->hookDisplayHome($params, 31);
    }
    public function hookDisplayHomeTop($params)
    {
        return $this->hookDisplayHome($params, 16);
    }
    public function hookDisplayHome($params, $location=array())
    {
        $location = $location ? $location : 1;
        $cache_id = is_array($location) ? implode('', $location) : $location;
        if (!$this->isCached($this->templateFile, $this->stGetCacheId($cache_id)))
            $this->_prepareHook($location);
        return $this->fetch($this->templateFile, $this->stGetCacheId($cache_id));
    }
    public function hookDisplayHomeLeft($params)
    {
        return $this->hookDisplayHome($params, 29);
    }
    public function hookDisplayHomeRight($params)
    {
        return $this->hookDisplayHome($params, 30);
    }
    public function hookDisplayHomeFirstQuarter($params)
    {
        return $this->hookDisplayHome($params, 53);
    }
    public function hookDisplayHomeSecondQuarter($params)
    {
        return $this->hookDisplayHome($params, 54);
    }

    public function hookDisplayHomeThirdQuarter($params)
    {
        return $this->hookDisplayHome($params, 58);
    }
    public function hookDisplayHomeFourthQuarter($params)
    {
        return $this->hookDisplayHome($params, 59);
    }
    public function hookDisplayFullWidthBottom($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;
        return $this->hookDisplayHome($params, 37);
    }
    public function hookDisplayLeftColumn($params)
    {
        return $this->hookDisplayHome($params, 2);
    }
    public function hookDisplayRightColumn($params)
    {
        return $this->hookDisplayHome($params, 10);
    }
    public function hookDisplayLeftColumnProduct($params)
    {
        return $this->hookDisplayHome($params, 100);
    }
    public function hookDisplayRightColumnProduct($params)
    {
        return $this->hookDisplayHome($params, 101);
    }
    public function hookDisplayProductRightColumn($params)
    {
        return $this->hookDisplayHome($params, 102);
    }
    public function hookDisplayStackedFooter1($params)
    {
        return $this->hookDisplayFooter($params, 13);
    }
    public function hookDisplayStackedFooter2($params)
    {
        return $this->hookDisplayFooter($params, 38);
    }
    public function hookDisplayStackedFooter3($params)
    {
        return $this->hookDisplayFooter($params, 55);
    }
    public function hookDisplayStackedFooter4($params)
    {
        return $this->hookDisplayFooter($params, 39);
    }
    public function hookDisplayStackedFooter5($params)
    {
        return $this->hookDisplayFooter($params, 40);
    }
    public function hookDisplayStackedFooter6($params)
    {
        return $this->hookDisplayFooter($params, 41);
    }

    public function hookDisplayFooter($params, $location=array())
    {
        $location = $location ? $location : array(3, 43, 44, 45, 46,81,82,83,84, 47,56);
        $cache_id = is_array($location) ? implode('', $location) : $location;
        $tpl = 'module:stnewsletter/views/templates/hook/stnewsletter-footer.tpl';
        if (!$this->isCached($tpl, $this->stGetCacheId($cache_id)))
            $this->_prepareHook($location);
        return $this->fetch($tpl, $this->stGetCacheId($cache_id));
    }

    public function hookDisplayFooterAfter($params)
    {
        return $this->hookDisplayFooter($params, array(12, 48, 49, 50, 51,91,92,93,94, 52,57));
    }

    public function hookActionShopDataDuplication($params)
    {
        return $this->sampleData($params['new_id_shop']);
    }
    
    /**
     * Deletes duplicates email in newsletter table.
     *
     * @param $params
     *
     * @return bool
     */
    public function hookActionCustomerAccountAdd($params)
    {
        //if e-mail of the created user address has already been added to the newsletter through the ps_StNewsletter module,
        //we delete it from ps_StNewsletter table to prevent duplicates
        $id_shop = $params['newCustomer']->id_shop;
        $email = $params['newCustomer']->email;
        if (Validate::isEmail($email)) {
            return (bool) Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'emailsubscription 
            WHERE email=\''.pSQL($email).'\'
            AND id_shop='.(int)$id_shop);
        }
        return true;
    }

    /**
     * Add an extra FormField to ask for newsletter registration.
     *
     * @param $params
     *
     * @return bool
     */
    public function hookAdditionalCustomerFormFields($params)
    {
        $nw_conditions = Configuration::get('NW_CONDITIONS', $this->context->language->id);
        $label = $this->trans('Sign up for our newsletter[1][2]%conditions%[/2]',
            array(
                '[1]' => '<br>',
                '[2]' => '<em>',
                '%conditions%' => $nw_conditions,
                '[/2]' => '</em>',
            ),
            'Shop.Theme.Transformer');

        return array(
            (new FormField())
                ->setName('newsletter')
                ->setType('checkbox')
                ->setLabel($label));
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
            $positions = Tools::getValue('id_st_news_letter');
            $msg = '';
            if (is_array($positions))
                foreach ($positions as $position => $value)
                {
                    $pos = explode('_', $value);

                    if ((isset($pos[2])) && ((int)$pos[2] === $id))
                    {
                        if ($object = new StNewsLetterClass((int)$pos[2]))
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
    
    public function ajaxCall()
    {
        $ret = $this->newsletterRegistration();
        return Tools::jsonEncode($ret);
    }
    
    /**
	 * Register in block newsletter
	 */
	public function newsletterRegistration()
	{
	    $error = $valid = '';
        $newsletterClass = new StNewsLetterClass();
        $action = Tools::getValue('action', 0);
        $email = Tools::getValue('email');
		if (empty($email) || !Validate::isEmail($email))
			$error = $this->getTranslator()->trans('Invalid email address.', array(), 'Shop.Theme.Transformer');
		/* Unsubscription */
		else if ($action == '1')
		{
			$register_status = $newsletterClass->isNewsletterRegistered($email);

			if ($register_status < 1)
				$error = $this->getTranslator()->trans('This email address is not registered.', array(), 'Shop.Theme.Transformer');
			elseif (!$newsletterClass->unregister($email, $register_status))
				$error = $this->getTranslator()->trans('An error occurred while attempting to unsubscribe.', array(), 'Shop.Theme.Transformer');
			else
                $valid = $this->getTranslator()->trans('Unsubscription successful.', array(), 'Shop.Theme.Transformer');
            if (!Tools::getValue('is_ajax')) {
                echo $error.$valid;
                die;
            }
		}
		/* Subscription */
		else if ($action == '0')
		{
		    $email = pSQL($email);
			$register_status = $newsletterClass->isNewsletterRegistered($email);
            if ($register_status > 0)
                $error = $this->getTranslator()->trans('This email address is already registered.', array(), 'Shop.Theme.Transformer');
            
			if (!$error && !$newsletterClass->isRegistered($register_status))
			{
				if (Configuration::get('ST_NW_VERIFICATION_EMAIL'))
				{
					// create an unactive entry in the newsletter database
					if ($register_status == StNewsLetterClass::GUEST_NOT_REGISTERED)
						$newsletterClass->registerGuest($email, false);

					if (!$token = $newsletterClass->getToken($email, $register_status)) {
					   $error = $this->getTranslator()->trans('An error occurred during the subscription process.', array(), 'Shop.Theme.Transformer');
					}
                    
                    $this->sendVerificationEmail($email, $token);

					$valid = $this->getTranslator()->trans('A verification email has been sent. Please check your inbox.', array(), 'Shop.Theme.Transformer');
				}
				else
				{
					if ($newsletterClass->register($email, $register_status))
						$valid = $this->getTranslator()->trans('You have successfully subscribed to this newsletter.', array(), 'Shop.Theme.Transformer');
					else
						$error = $this->getTranslator()->trans('An error occurred during the subscription process.', array(), 'Shop.Theme.Transformer');

                    if (!$error)
                    {
                        if ($code = Configuration::get('ST_NW_VOUCHER_CODE'))
    						$this->sendVoucher($email, $code);
    
    					if (Configuration::get('ST_NW_CONFIRMATION_EMAIL'))
    						$this->sendConfirmationEmail($email);    
                    }
				}
			}
		}
        $ret = array(
            'hasError' => $error,
            'message'  => $valid
        );
        return $ret;
	}
    
    /**
	 * Ends the registration process to the newsletter
	 *
	 * @param string $token
	 *
	 * @return string
	 */
	public function confirmEmail($token)
	{
		$activated = false;
        
        $newsletterClass = new StNewsLetterClass();
        
		if ($email = $newsletterClass->getGuestEmailByToken($token))
			$activated = $newsletterClass->activateGuest($email);
		else if ($email = $newsletterClass->getUserEmailByToken($token))
			$activated = $newsletterClass->registerUser($email);

		if (!$activated)
			return $this->getTranslator()->trans('This email is already registered and/or invalid.', array(), 'Shop.Theme.Transformer');

		if ($discount = Configuration::get('ST_NW_VOUCHER_CODE'))
			$this->sendVoucher($email, $discount);

		if (Configuration::get('NW_CONFIRMATION_EMAIL'))
			$this->sendConfirmationEmail($email);

		return $this->getTranslator()->trans('Thank you for subscribing to our newsletter.', array(), 'Shop.Theme.Transformer');
	}

	/**
	 * Send the confirmation mails to the given $email address if needed.
	 *
	 * @param string $email Email where to send the confirmation
	 *
	 * @note the email has been verified and might not yet been registered. Called by AuthController::processCustomerNewsletter
	 *
	 */
	public function confirmSubscription($email)
	{
		if ($email)
		{
			if ($discount = Configuration::get('ST_NW_VOUCHER_CODE'))
				$this->sendVoucher($email, $discount);

			if (Configuration::get('ST_NW_CONFIRMATION_EMAIL'))
				$this->sendConfirmationEmail($email);
		}
	}

	/**
	 * Send an email containing a voucher code
	 *
	 * @param $email
	 * @param $code
	 *
	 * @return bool|int
	 */
	public function sendVoucher($email, $code)
    {
        $language = new Language($this->context->language->id);
        $unsubscribe_url = Context::getContext()->link->getModuleLink(
            'stnewsletter', 'ajax', array(
                'action' => 1,
                'email' => $email
            )
        );
        return Mail::Send(
            $this->context->language->id,
            'stnewsletter_voucher',
            $this->trans(
                'Newsletter voucher',
                array(),
                'Emails.Subject',
                $language->locale
            ),
            array(
                '{discount}' => $code,
                '{unsubscribe_url}' => $unsubscribe_url,
            ),
            $email,
            null,
            null,
            null,
            null,
            null,
            dirname(__FILE__).'/mails/',
            false,
            $this->context->shop->id
        );
    }

	/**
	 * Send a confirmation email
	 *
	 * @param string $email
	 *
	 * @return bool
	 */
	public function sendConfirmationEmail($email)
    {
        $language = new Language($this->context->language->id);
        $unsubscribe_url = Context::getContext()->link->getModuleLink(
            'stnewsletter', 'ajax', array(
                'action' => 1,
                'email' => $email
            )
        );
        return Mail::Send(
            $this->context->language->id,
            'stnewsletter_conf',
            $this->trans(
                'Newsletter confirmation',
                array(),
                'Emails.Subject',
                $language->locale
            ),
            array(
                '{unsubscribe_url}' => $unsubscribe_url,
            ),
            pSQL($email),
            null,
            null,
            null,
            null,
            null,
            dirname(__FILE__).'/mails/',
            false,
            $this->context->shop->id
        );
    }

	/**
	 * Send a verification email
	 *
	 * @param string $email
	 * @param string $token
	 *
	 * @return bool
	 */
	public function sendVerificationEmail($email, $token)
    {
        $verif_url = Context::getContext()->link->getModuleLink(
            'stnewsletter', 'verification', array(
                'token' => $token,
            )
        );
        $unsubscribe_url = Context::getContext()->link->getModuleLink(
            'stnewsletter', 'ajax', array(
                'action' => 1,
                'email' => $email
            )
        );
        $language = new Language($this->context->language->id);

        return Mail::Send(
            $this->context->language->id,
            'stnewsletter_verif',
            $this->trans(
                'Email verification',
                array(),
                'Emails.Subject',
                $language->locale
            ),
            array(
                '{verif_url}' => $verif_url,
                '{unsubscribe_url}' => $unsubscribe_url,
            ),
            $email,
            null,
            null,
            null,
            null,
            null,
            dirname(__FILE__).'/mails/',
            false,
            $this->context->shop->id
        );
    }
    
    public function prepareHooks()
    {
        $location = array();
        $rows = Db::getInstance()->executeS('SELECT location FROM `'._DB_PREFIX_.'st_news_letter` l
            LEFT JOIN `'._DB_PREFIX_.'st_news_letter_shop` ls
            ON l.`id_st_news_letter` = ls.`id_st_news_letter`
            WHERE ls.`id_shop`='.(int)$this->context->shop->id);
        foreach($rows AS $value)
            if (key_exists($value['location'], self::$location) && isset(self::$location[$value['location']]['hook']))
                $location[$value['location']] = self::$location[$value['location']]['hook'];
        
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
                    $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to %hook%.', array('%hook%'=>$hook), 'Modules.Stnewsletter.Admin');
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
    
    public function getSubscribers()
    {
        $dbquery = new DbQuery();
        $dbquery->select('c.`id_customer` AS `id`, s.`name` AS `shop_name`, gl.`name` AS `gender`, c.`lastname`, c.`firstname`, c.`email`, c.`newsletter` AS `subscribed`, c.`newsletter_date_add`');
        $dbquery->from('customer', 'c');
        $dbquery->leftJoin('shop', 's', 's.id_shop = c.id_shop');
        $dbquery->leftJoin('gender', 'g', 'g.id_gender = c.id_gender');
        $dbquery->leftJoin('gender_lang', 'gl', 'g.id_gender = gl.id_gender AND gl.id_lang = '.(int) $this->context->employee->id_lang);
        $dbquery->where('c.`newsletter` = 1');
        if ($this->_searched_email) {
            $dbquery->where('c.`email` LIKE \'%'.pSQL($this->_searched_email).'%\' ');
        }

        $customers = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($dbquery->build());

        $dbquery = new DbQuery();
        $dbquery->select('CONCAT(\'N\', e.`id`) AS `id`, s.`name` AS `shop_name`, NULL AS `gender`, NULL AS `lastname`, NULL AS `firstname`, e.`email`, e.`active` AS `subscribed`, e.`newsletter_date_add`');
        $dbquery->from('emailsubscription', 'e');
        $dbquery->leftJoin('shop', 's', 's.id_shop = e.id_shop');
        $dbquery->where('e.`active` = 1');
        if ($this->_searched_email) {
            $dbquery->where('e.`email` LIKE \'%'.pSQL($this->_searched_email).'%\' ');
        }

        $non_customers = Db::getInstance()->executeS($dbquery->build());

        $subscribers = array_merge($customers, $non_customers);

        return $subscribers;
    }
    
    public function export_csv()
    {
        if (!isset($this->context)) {
            $this->context = Context::getContext();
        }

        $result = $this->getCustomers();

        if ($result) {
            if (!$nb = count($result)) {
                $this->_html .= $this->displayError($this->trans('No customers found with these filters!', array(), 'Modules.Stnewsletter.Admin'));
            } elseif ($fd = @fopen(dirname(__FILE__).'/'.strval(preg_replace('#\.{2,}#', '.', Tools::getValue('action'))).'_'.$this->file, 'w')) {
                $header = array('id', 'shop_name', 'gender', 'lastname', 'firstname', 'email', 'subscribed', 'subscribed_on');
                $array_to_export = array_merge(array($header), $result);
                foreach ($array_to_export as $tab) {
                    $this->myFputCsv($fd, $tab);
                }
                fclose($fd);
                $this->_html .= $this->displayConfirmation(
                    sprintf($this->trans('The .CSV file has been successfully exported: %d customers found.', array(), 'Modules.Stnewsletter.Admin'), $nb).'<br />
                <a href="'.$this->context->shop->getBaseURI().'modules/stnewsletter/'.Tools::safeOutput(strval(Tools::getValue('action'))).'_'.$this->file.'">
                <b>'.$this->trans('Download the file', array(), 'Modules.Stnewsletter.Admin').' '.$this->file.'</b>
                </a>
                <br />
                <ol style="margin-top: 10px;">
                    <li style="color: red;">'.
                    $this->trans('WARNING: When opening this .csv file with Excel, choose UTF-8 encoding to avoid strange characters.', array(), 'Modules.Stnewsletter.Admin').
                    '</li>
                </ol>');
            } else {
                $this->_html .= $this->displayError($this->trans('Error: Write access limited', array(), 'Modules.Stnewsletter.Admin').' '.dirname(__FILE__).'/'.strval(Tools::getValue('action')).'_'.$this->file.' !');
            }
        } else {
            $this->_html .= $this->displayError($this->trans('No result found!', array(), 'Modules.Stnewsletter.Admin'));
        }
    }

	private function getCustomers()
    {
        $id_shop = false;

        // Get the value to know with subscrib I need to take 1 with account 2 without 0 both 3 not subscrib
        $who = (int) Tools::getValue('SUSCRIBERS');

        // get optin 0 for all 1 no optin 2 with optin
        $optin = (int) Tools::getValue('OPTIN');

        $country = (int) Tools::getValue('COUNTRY');

        if (Context::getContext()->cookie->shopContext) {
            $id_shop = (int) Context::getContext()->shop->id;
        }

        $customers = array();
        if ($who == 1 || $who == 0 || $who == 3) {
            $dbquery = new DbQuery();
            $dbquery->select('c.`id_customer` AS `id`, s.`name` AS `shop_name`, gl.`name` AS `gender`, c.`lastname`, c.`firstname`, c.`email`, c.`newsletter` AS `subscribed`, c.`newsletter_date_add`');
            $dbquery->from('customer', 'c');
            $dbquery->leftJoin('shop', 's', 's.id_shop = c.id_shop');
            $dbquery->leftJoin('gender', 'g', 'g.id_gender = c.id_gender');
            $dbquery->leftJoin('gender_lang', 'gl', 'g.id_gender = gl.id_gender AND gl.id_lang = '.$this->context->employee->id_lang);
            $dbquery->where('c.`newsletter` = '.($who == 3 ? 0 : 1));
            if ($optin == 2 || $optin == 1) {
                $dbquery->where('c.`optin` = '.($optin == 1 ? 0 : 1));
            }
            if ($country) {
                $dbquery->where('(SELECT COUNT(a.`id_address`) as nb_country
                                                    FROM `'._DB_PREFIX_.'address` a
                                                    WHERE a.deleted = 0
                                                    AND a.`id_customer` = c.`id_customer`
                                                    AND a.`id_country` = '.$country.') >= 1');
            }
            if ($id_shop) {
                $dbquery->where('c.`id_shop` = '.$id_shop);
            }

            $customers = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($dbquery->build());
        }

        $non_customers = array();
        if (($who == 0 || $who == 2) && (!$optin || $optin == 2) && !$country) {
            $dbquery = new DbQuery();
            $dbquery->select('CONCAT(\'N\', e.`id`) AS `id`, s.`name` AS `shop_name`, NULL AS `gender`, NULL AS `lastname`, NULL AS `firstname`, e.`email`, e.`active` AS `subscribed`, e.`newsletter_date_add`');
            $dbquery->from('emailsubscription', 'e');
            $dbquery->leftJoin('shop', 's', 's.id_shop = e.id_shop');
            $dbquery->where('e.`active` = 1');
            if ($id_shop) {
                $dbquery->where('e.`id_shop` = '.$id_shop);
            }
            $non_customers = Db::getInstance()->executeS($dbquery->build());
        }

        $subscribers = array_merge($customers, $non_customers);

        return $subscribers;
    }

	private function myFputCsv($fd, $array)
	{
		$line = implode(';', $array);
		$line .= "\n";
		if (!fwrite($fd, $line, 4096))
			$this->post_errors[] = $this->getTranslator()->trans('Error: Write access limited', array(), 'Modules.Stnewsletter.Admin').' '.dirname(__FILE__).'/'.$this->file.' !';
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
    public function renderWidget($hookName = null, array $configuration = [])
    {
        return;
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return;
    }
}