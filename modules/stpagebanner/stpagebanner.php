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

require_once _PS_MODULE_DIR_.'stpagebanner/classes/StPageBannerClass.php';
require_once _PS_MODULE_DIR_.'stpagebanner/classes/StPageBannerFontClass.php';

class StPageBanner extends Module implements WidgetInterface
{
    protected static $access_rights = 0775;
    public static $_type = array(
        1 => 'Category',
        //2 => 'Product',
        3 => 'CMS page',
        4 => 'Manufacturer',
        5 => 'Supplier',
        6 => 'Cms category',
        //7 => 'Icon',
        8 => 'Blog category',
        //9 => 'Blog article',
        10 => 'Page',
        11 => 'All',
        // 12 => 'Product',
    );

    public static $text_position = array(
        array('id' =>'center' , 'name' => 'Middle'),
        array('id' =>'bottom' , 'name' => 'Bottom'),
        array('id' =>'top' , 'name' => 'Top'),
    );
    public  $fields_list;
    public  $fields_value;
    public  $fields_form;
    public  $fields_form_banner;
	private $_html = '';
	private $spacer_size = '5';
    public $stblog_status = true;
    private $_prefix_st = 'ST_PAGEBANNER_';

    private $googleFonts;
        
	public function __construct()
	{
		$this->name          = 'stpagebanner';
		$this->tab           = 'front_office_features';
		$this->version       = '1.6.9';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap     = true;

		parent::__construct();
        
		$this->displayName   = $this->getTranslator()->trans('Breadcrumbs', array(), 'Modules.Stpagebanner.Admin');
		$this->description   = $this->getTranslator()->trans('This module alllows you different backgrounds to breadcrumbs on different pages.', array(), 'Modules.Stpagebanner.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);

        if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            $this->stblog_status = false;
        if($this->stblog_status)
        {
            require_once (_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');
            require_once (_PS_MODULE_DIR_.'stblog/classes/StBlogCategory.php');
        }
	}
            
	public function install()
	{
		$res = parent::install() &&
			$this->installDB() &&
            $this->registerHook('displayHeader') &&
			$this->registerHook('displayBreadcrumb') &&
            $this->registerHook('actionObjectCategoryDeleteAfter') &&
            $this->registerHook('actionObjectCmsDeleteAfter') &&
            $this->registerHook('actionObjectSupplierDeleteAfter') &&
            $this->registerHook('actionObjectManufacturerDeleteAfter') &&
            $this->registerHook('actionShopDataDuplication');
        if ($res) {
            foreach(Shop::getShops(false) as $shop) {
                $res &= $this->sampleData($shop['id_shop']);
            }    
        }      
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
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_page_banner` (
				`id_st_page_banner` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `text_align` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `hide_breadcrumb` tinyint(1) unsigned NOT NULL DEFAULT 0,  
                `item_k` tinyint(2) unsigned NOT NULL DEFAULT 0,  
                `item_v` varchar(255) DEFAULT NULL,  
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0,  
                `top_spacing` varchar(10) DEFAULT NULL,
                `bottom_spacing` varchar(10) DEFAULT NULL,
                `padding_top` varchar(10) DEFAULT NULL,
                `padding_bottom` varchar(10) DEFAULT NULL,
                `text_color` varchar(7) DEFAULT NULL,
                `font_size` int(10) unsigned NOT NULL DEFAULT 0,
                `link_color` varchar(7) DEFAULT NULL,
                `link_hover_color` varchar(7) DEFAULT NULL,
                `bg_color` varchar(7) DEFAULT NULL,
                `border_color` varchar(7) DEFAULT NULL,
                `border_size` varchar(10) DEFAULT NULL,
                `border_top_size` varchar(10) DEFAULT NULL,
				PRIMARY KEY (`id_st_page_banner`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;');
		
		/* Banners lang configuration */
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_page_banner_lang` (
				`id_st_page_banner` int(10) UNSIGNED NOT NULL,
				`id_lang` int(10) unsigned NOT NULL ,
                `description` text,
                `image_multi_lang` varchar(255) DEFAULT NULL,
                `image_lang_default` varchar(255) DEFAULT NULL,
                `width` int(10) unsigned NOT NULL DEFAULT 0,
                `height` int(10) unsigned NOT NULL DEFAULT 0,
				PRIMARY KEY (`id_st_page_banner`, `id_lang`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;');
        
        $return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_page_banner_shop` (
				`id_st_page_banner` int(10) UNSIGNED NOT NULL,
                `id_shop` int(11) NOT NULL,      
                PRIMARY KEY (`id_st_page_banner`,`id_shop`),    
                KEY `id_shop` (`id_shop`)   
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;');
         
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_page_banner_font` (
                `id_st_page_banner` int(10) unsigned NOT NULL,
                `font_name` varchar(255) NOT NULL
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;');

		return $return;
	}
    
	public function uninstall()
	{
	    $this->clearBannerCache();
		// Delete configuration
		return $this->deleteTables() &&
			parent::uninstall();
	}
    
    public function sampleData($id_shop)
    {
        //to do add breadcumb for all and login page, generally the breadcrumb on login page is different.
        $return = true;
        $samples = array(
            array(
                'item_k'        => 11,
                'item_v'        => 1,
                'active'        => 1,
                'text_align'    => 1,
                'top_spacing'   => 5,
                'bottom_spacing'=> 20,
                'text_color'    => '#bbbbbb',
                'link_color'    => '#bbbbbb',
                'link_hover_color' => '#06a161',
                'bg_color'      => '#F9F9F9',
                'border_color'  => '#F3F3F3',
                'border_size'   => 1,
                'border_top_size' => 1,
                'padding_top'   => 11,
                'padding_bottom'=> 11,
                'description'   => '',
            )
        );
        
        foreach($samples as $k=>$sample)
        {
            $module = new StPageBannerClass();
            foreach (Language::getLanguages(false) as $lang)
            {
				$module->description[$lang['id_lang']] = $sample['description'];
            }
            $module->item_k         = $sample['item_k'];
            $module->item_v         = $sample['item_v'];
            $module->active         = $sample['active'];
            $module->text_align     = $sample['text_align'];
            $module->top_spacing    = $sample['top_spacing'];
            $module->bottom_spacing    = $sample['bottom_spacing'];
            $module->padding_top    = $sample['padding_top'];
            $module->padding_bottom = $sample['padding_bottom'];
            $module->text_color     = $sample['text_color'];
            $module->link_color         = $sample['link_color'];
            $module->link_hover_color   = $sample['link_hover_color'];
            $module->bg_color           = $sample['bg_color'];
            $module->border_color       = $sample['border_color'];
            $module->border_size        = $sample['border_size'];
            $module->border_top_size    = $sample['border_top_size'];
            $module->position           = $k;
            $module->id_shop_list       = array((int)$id_shop);
            $return &= $module->add();
        }
        return $return;
    }

	/**
	 * deletes tables
	 */
	public function deleteTables()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_page_banner`,`'._DB_PREFIX_.'st_page_banner_lang`,`'._DB_PREFIX_.'st_page_banner_font`');
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
        
        $id_st_page_banner = (int)Tools::getValue('id_st_page_banner');

        if(Tools::getValue('act')=='delete_image' && $id_st_page_banner)
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $id_lang = Tools::getValue('id_lang');
            $banner = new StPageBannerClass($id_st_page_banner, $id_lang);
            $banner->image_multi_lang = '';
            $result['r'] = $banner->save();
            die(json_encode($result));
        }
        if (isset($_POST['savesettingstpagebanner']) || isset($_POST['savesettingstpagebannerAndStay']))
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
            
            
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
            {
                $this->clearBannerCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&token='.Tools::getAdminTokenLite('AdminModules'));
            }
        }
	    
	    if ((Tools::isSubmit('bannerstatusstpagebanner')))
        {
            $banner = new StPageBannerClass((int)$id_st_page_banner);
            if($banner->id && $banner->toggleStatus())
            {
                $this->clearBannerCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
		if (isset($_POST['savestpagebanner']) || isset($_POST['savestpagebannerAndStay']))
		{
            if ($id_st_page_banner)
				$banner = new StPageBannerClass((int)$id_st_page_banner);
			else
				$banner = new StPageBannerClass();
            
            $error = array();

            $item = Tools::getValue('links');
            if($item)
            {
                $item_arr = explode('_',$item);
                if(count($item_arr)!=2)
                {
                    $this->_html .= $this->displayError($this->getTranslator()->trans('"Pages" error', array(), 'Modules.Stpagebanner.Admin'));
                     return;
                }
                $banner->item_k = $item_arr[0];
                if ($banner->item_k == 12)
                    $banner->item_v = Tools::getValue('filter','0');
                else
                    $banner->item_v = $item_arr[1];
            }
            else
            {
                $error[] = $this->displayError($this->getTranslator()->trans('The field "Pages" is required', array(), 'Modules.Stpagebanner.Admin'));
            }
            
            $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
            /*if (!Tools::isSubmit('has_image_'.$default_lang) && (!isset($_FILES['image_multi_lang_'.$default_lang]) || empty($_FILES['image_multi_lang_'.$default_lang]['tmp_name'])))
			{
                $defaultLanguage = new Language($default_lang);
			    $error[] = $this->displayError($this->getTranslator()->trans('Image is required at least in ', array(), 'Modules.Stpagebanner.Admin').$defaultLanguage->name);
			}*/
			    $banner->copyFromPost();

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
                      
			if (!count($error) && $banner->validateFields(false) && $banner->validateFieldsLang(false))
            {
                /*position*/
                $banner->position = $banner->checkPosition();
                $shop_ids = $banner->getShopIds();
                $banner->clearShopIds();
                $id_shop_list = array();
                if($assos_shop = Tools::getValue('checkBoxShopAsso_st_page_banner')) {
                    foreach ($assos_shop as $id_shop => $row) {
                        $id_shop_list[] = $id_shop;
                    }
                }
                if (!$id_shop_list) {
                    $id_shop_list = array(Context::getContext()->shop->id);
                }
                $banner->id_shop_list = array_unique($id_shop_list);
                if($banner->save())
                {
                    $jon = trim(Tools::getValue('google_font_name'),'¤');
                    StPageBannerFontClass::deleteBySlider($banner->id);
                    $jon_arr = array_unique(explode('¤', $jon));
                    if (count($jon_arr))
                        StPageBannerFontClass::changeSliderFont($banner->id, $jon_arr);

                    $this->clearBannerCache();
                    
			        if(isset($_POST['savestpagebannerAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_page_banner='.$banner->id.'&conf='.($id_st_page_banner?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf='.($id_st_page_banner?4:3).'&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else {
                    $banner->restoreShopIds($shop_ids);
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during banner', array(), 'Admin.Theme.Transformer').' '.($id_st_page_banner ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
                }   
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        if(Tools::isSubmit('addstpagebanner') || (Tools::isSubmit('updatestpagebanner') && $id_st_page_banner))
        {
            $helper = $this->initForm();
            return $this->_html.$helper->generateForm($this->fields_form_banner);
        }
		else if (Tools::isSubmit('deletestpagebanner') && $id_st_page_banner)
		{
			$banner = new StPageBannerClass($id_st_page_banner);
            $banner->delete();
            $this->clearBannerCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else
		{
            $helper = $this->initList();
            $this->_html .= $helper->generateList(StPageBannerClass::getAll(0, 0, (int)$this->context->language->id, 0), $this->fields_list);
            $helper = $this->initSettingForm();
            return $this->_html.$helper->generateForm($this->fields_form);
		}
	}

    protected function initSettingForm()
    {
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Breadcrumb width:', array(), 'Modules.Stpagebanner.Admin'),
                    'name' => 'breadcrumb_width',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'breadcrumb_width_fullwidth',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Full width', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'breadcrumb_width_normal',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Boxed', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
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
        
        
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table =  $this->table;
        $helper->module = $this;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->submit_action = 'savesettingstpagebanner';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper;
    }

    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'breadcrumb_width' => Configuration::get($this->_prefix_st.'BREADCRUMB_WIDTH'),
        );
        return $fields_values;        
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
					$result['error'][] = $this->getTranslator()->trans('An error occurred during the image upload.', array(), 'Admin.Theme.Transformer');
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
            $this->getBlogCategoryOption($blog_category_arr, StBlogCategory::getTopCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(), true);
        }
        
        $links = array(
            // array('name'=>$this->getTranslator()->trans('Product', array(), 'Admin.Theme.Transformer'),'query'=>array(array('id'=>'12_0','name'=>$this->getTranslator()->trans('Product page', array(), 'Admin.Theme.Transformer')))),
            array('name'=>$this->getTranslator()->trans('Category', array(), 'Admin.Theme.Transformer'),'query'=>$category_arr),
            array('name'=>$this->getTranslator()->trans('CMS', array(), 'Admin.Theme.Transformer'),'query'=>$cms_arr),
            array('name'=>$this->getTranslator()->trans('Informations', array(), 'Admin.Theme.Transformer'),'query'=>$this->getInformationLinks()),
            array('name'=>$this->getTranslator()->trans('My account', array(), 'Admin.Theme.Transformer'),'query'=>$this->getMyAccountLinks()),
            array('name'=>$this->getTranslator()->trans('Supplier', array(), 'Admin.Theme.Transformer'),'query'=>$supplier_arr),
            array('name'=>$this->getTranslator()->trans('Manufacturer', array(), 'Admin.Theme.Transformer'),'query'=>$manufacturer_arr),
            array('name'=>$this->getTranslator()->trans('Blog', array(), 'Admin.Theme.Transformer'),'query'=>$blog_category_arr),
        );
        return $links;
    }
    
    public function createSubLinks()
    {
        $id_lang = $this->context->language->id;
        $category_arr = array();
        $this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(),true);
            
        $manufacturer_arr = array();
        $manufacturers = Manufacturer::getManufacturers(false, $id_lang);
        foreach ($manufacturers as $manufacturer)
            $manufacturer_arr[] = array('id'=>'4_'.$manufacturer['id_manufacturer'],'name'=>$manufacturer['name']);
  
        $cms_arr = array();
        $this->getCMSOptions($cms_arr, 0, 1, $id_lang);
        
        $links = array(
            array('name'=>$this->getTranslator()->trans('Category', array(), 'Admin.Theme.Transformer'),'query'=>$category_arr),
            array('name'=>$this->getTranslator()->trans('Manufacturer', array(), 'Admin.Theme.Transformer'),'query'=>$manufacturer_arr),
        );
        return $links;
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
		$category_arr[] = array('id'=>'8_'.(int)$category->id,'name'=>(isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')');

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
        $category_arr[] = array('id'=>'1_'.(int)$category->id,'name'=>(isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')');

        if (isset($children) && is_array($children) && count($children))
            foreach ($children as $child)
            {
                $this->getCategoryOption($category_arr, (int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],$recursive);
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
            WHERE c.`id_cms_category` = '.(int)$id_cms_category.'
            AND cs.`id_shop` = '.(int)$id_shop.
            (version_compare(_PS_VERSION_, '1.6.0.12', '>=') ? ' AND cl.`id_shop` = '.(int)$id_shop : '' ).' 
            AND cl.`id_lang` = '.(int)$id_lang.'
            AND c.`active` = 1
            ORDER BY `position`';

        return Db::getInstance()->executeS($sql);
    }

	protected function initForm()
	{        
        $id_st_page_banner = (int)Tools::getValue('id_st_page_banner');
        $banner = new StPageBannerClass($id_st_page_banner);
        
        $google_font_name_html = $google_font_name =  $google_font_link = '';
        if(Validate::isLoadedObject($banner)){
            $jon_arr = StPageBannerFontClass::getBySlider($banner->id);
            if(is_array($jon_arr) && count($jon_arr))
                foreach ($jon_arr as $key => $value) {
                    $google_font_name_html .= '<li id="#'.str_replace(' ', '_', strtolower($value['font_name'])).'_li" class="form-control-static"><button type="button" class="delGoogleFont btn btn-default" name="'.$value['font_name'].'"><i class="icon-remove text-danger"></i></button>&nbsp;<span style="'.$this->fontstyles($value['font_name']).'">style="'.$this->fontstyles($value['font_name']).'"</span></li>';

                    $google_font_name .= $value['font_name'].'¤';

                    $google_font_link .= '<link id="'.str_replace(' ', '_', strtolower($value['font_name'])).'_link" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.str_replace(' ', '+', $value['font_name']).'" />';
                }
        }

		$this->fields_form_banner[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Breadcrumbs', array(), 'Modules.Stpagebanner.Admin'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                'links' => array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Page:', array(), 'Admin.Theme.Transformer'),
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
                            'value' => '11_1',
                            'label' => $this->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer'),
                        ),
                    )
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'padding_top',
                    'default_value' => '',
                    'suffix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value 8.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'padding_bottom',
                    'default_value' => '',
                    'suffix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value 8.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'top_spacing',
                    'default_value' => '',
                    'suffix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bottom_spacing',
                    'default_value' => '',
                    'suffix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value 12.', array(), 'Admin.Theme.Transformer'),
                ),
                /*
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
                ), */
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
                    'title'=> $this->getTranslator()->trans(' Save ', array(), 'Admin.Actions'),
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
                'title' => $this->getTranslator()->trans('Add caption', array(), 'Modules.Stpagebanner.Admin'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
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
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Text color:', array(), 'Modules.Stpagebanner.Admin'),
                    'name' => 'text_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link color:', array(), 'Modules.Stpagebanner.Admin'),
                    'name' => 'link_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Modules.Stpagebanner.Admin'),
                    'name' => 'link_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background:', array(), 'Modules.Stpagebanner.Admin'),
                    'name' => 'bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Border color:', array(), 'Modules.Stpagebanner.Admin'),
                    'name' => 'border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top border height:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'border_top_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom border height:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'border_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value 1.', array(), 'Admin.Theme.Transformer'),
                ),

                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Alignment:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_align',
                    'default_value' => 1,
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
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Do not show breadcrumb:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'hide_breadcrumb',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'hide_breadcrumb_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('YES', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'hide_breadcrumb_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                 array(
                    'type' => 'textarea',
                    'label' => $this->getTranslator()->trans('Caption:', array(), 'Admin.Theme.Transformer'),
                    'lang' => true,
                    'name' => 'description',
                    'cols' => 40,
                    'rows' => 10,
                    'autoload_rte' => true,
                    'desc' => array(
                            $this->getTranslator()->trans('Format your entry with some basic HTML. Click on Flash/Bolt button to use predefined templates.', array(), 'Modules.Stpagebanner.Admin'),
                            '<div class="alert alert-info"><a href="javascript:;" onclick="$(\'#how_to_use_gf\').toggle();return false;">'.$this->getTranslator()->trans('How to use google fonts? Click here.', array(), 'Modules.Stpagebanner.Admin').'</a><div id="how_to_use_gf" style="display:none;"><img src="'.$this->_path.'views/img/how_to_use_gf.jpg" /></div></div>',
                        ),
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
                    'desc' => '<p>'.$this->getTranslator()->trans('Once a font has been added, you can use it everywhere without adding it again.', array(), 'Modules.Stpagebanner.Admin').'</p><a id="add_google_font" class="btn btn-default btn-block fixed-width-md" href="javascript:;">Add</a><br/><p id="google_font_example" class="fontshow">Example Title</p><ul id="curr_google_font_name">'.$google_font_name_html.'</ul>'.$google_font_link,
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'google_font_name',
                    'default_value' => '',
                ),

            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans(' Save ', array(), 'Admin.Actions'),
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
            $this->fields_form_banner[1]['form']['input'][] = array(
                'type' => 'shop',
                'label' => $this->getTranslator()->trans('Shop association:', array(), 'Admin.Theme.Transformer'),
                'name' => 'checkBoxShopAsso',
            );
        }

        $languages = Language::getLanguages(true);            
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        foreach ($languages as $lang)
        {
            $this->fields_form_banner[0]['form']['input']['image_multi_lang_'.$lang['id_lang']] = array(
                    'type' => 'file',
					'label' => $this->getTranslator()->trans('Image', array(), 'Admin.Theme.Transformer').' - '.$lang['name'].($default_lang == $lang['id_lang'] ? '('.$this->getTranslator()->trans('default language', array(), 'Admin.Theme.Transformer').')' : ''),
					'name' => 'image_multi_lang_'.$lang['id_lang'],
                    'required'  => false,
                    'desc' => $this->getTranslator()->trans('please ensure the image name is unique, or it will override the same name files.', array(), 'Modules.Stpagebanner.Admin').'<br/>',
                );
        }
        if($banner->id)
        {
            $this->fields_form_banner[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_page_banner');
             foreach ($languages as $lang)
                if($banner->image_multi_lang[$lang['id_lang']])
                {
                    StPageBannerClass::fetchMediaServer($banner->image_multi_lang[$lang['id_lang']]);
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
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
		);
        
        $this->fields_form_banner[1]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel_1',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
		);
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->id = (int)$banner->id;
        $helper->module = $this;
		$helper->table =  'st_page_banner';
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = 'id_st_page_banner';
		$helper->submit_action = 'savestpagebanner';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($banner,"fields_form_banner"),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);        

        $helper->tpl_vars['fields_value']['google_font_name'] = $google_font_name;
        if(Validate::isLoadedObject($banner))
        {
            if ($banner->item_k == 12)
            {
                $helper->tpl_vars['fields_value']['links'] = $banner->item_k.'_0';
                $helper->tpl_vars['fields_value']['filter'] = $banner->item_v;
            }
            else
                $helper->tpl_vars['fields_value']['links'] = $banner->item_k.'_'.$banner->item_v;
        }

		return $helper;
	}

    public function getMyAccountLinks()
    {
        return array(
            'authentication' => array('id'=>'10_authentication', 'name'=>$this->getTranslator()->trans('Login', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Login', array(), 'Admin.Theme.Transformer')),
            'my-account' => array('id'=>'10_my-account', 'name'=>$this->getTranslator()->trans('My account', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Manage my customer account', array(), 'Modules.Stpagebanner.Admin')),
            'order-follow' => array('id'=>'10_history', 'name'=>$this->getTranslator()->trans('My orders', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My orders', array(), 'Admin.Theme.Transformer')),
            'order-follow' => array('id'=>'10_order-follow', 'name'=>$this->getTranslator()->trans('My merchandise returns', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My returns', array(), 'Modules.Stpagebanner.Admin')),
            'order-slip' => array('id'=>'10_order-slip', 'name'=>$this->getTranslator()->trans('My credit slips', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My credit slips', array(), 'Admin.Theme.Transformer')),
            'addresses' => array('id'=>'10_addresses', 'name'=>$this->getTranslator()->trans('My addresses', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('My addresses', array(), 'Admin.Theme.Transformer')),
            'identity' => array('id'=>'10_identity', 'name'=>$this->getTranslator()->trans('My personal info', array(), 'Admin.Theme.Transformer'), 'title'=>$this->getTranslator()->trans('Manage my personal information', array(), 'Modules.Stpagebanner.Admin')),
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

    public static function showBannerImage($value,$row)
    {
        return $value ? '<img src="'.$value.'" width="200" />' : '-';
    }


    public static function displayType($value, $row)
    {
        return self::$_type[$value];
    }


    public static function displayTitle($value, $row)
    {
        $id_lang = (int)Context::getContext()->language->id;
        $id_shop = (int)Shop::getContextShopID();
        
        switch($row['item_k'])
        {
            case 0:
                $module = new StPageBanner(); 
                return $module->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer');
            break;
            case 1:
                $category = new Category((int)$row['item_v'],$id_lang);
                if(Validate::isLoadedObject($category))
                    return $category->name;
            break;
            case 3:
                $cms = CMS::getLinks((int)$id_lang, array((int)$row['item_v']));
                if (count($cms))
                    return $cms[0]['meta_title'];
            break;
            case 4:
                $manufacturer = new Manufacturer((int)$row['item_v'], (int)$id_lang);
                if ($manufacturer->id)
                    return $manufacturer->name;
            break;
            case 5:
                $supplier = new Supplier((int)$row['item_v'], (int)$id_lang);
                if ($supplier->id)
                    return $supplier->name;
            break;
            case 6:
                $category = new CMSCategory((int)$row['item_v'], (int)$id_lang);
                if ($category->id)
                    return $category->name;
            break;
            case 8:
                if(Module::isInstalled('stblog') && Module::isEnabled('stblog'))
                {
                    $category = new StBlogCategory((int)$row['item_v'],$id_lang);
                    if(Validate::isLoadedObject($category))
                        if ($category->is_root_category)
                        {
                            $module = new StPageBanner();
                            return $module->getTranslator()->trans('Blog', array(), 'Admin.Theme.Transformer');
                        }
                        else
                            return $category->name;
                }
            break;
            case 9:
                if(Module::isInstalled('stblog') && Module::isEnabled('stblog'))
                {
                    $rs = StBlogClass::getBlogInfo((int)$row['item_v'], 'name');
                    return $rs['name'];
                }          
            break;
            case 10:
                $module = new StPageBanner(); 
                $information = $module->getInformationLinks();
                $myAccount = $module->getMyAccountLinks();  
                
                if(array_key_exists($row['item_v'],$information))
                    return $information[$row['item_v']]['name'];
                if(array_key_exists($row['item_v'],$myAccount))
                    return $myAccount[$row['item_v']]['name'];
            break;
            case 12:
                $module = new StPageBanner();
                if (strpos($row['item_v'],'_'))
                {
                    list($type, $id) = explode('_', $row['item_v']);
                    if ($type && $id)
                    {
                        if ($type == 1)
                        {
                            $category = new Category((int)$id,$id_lang);
                            if(Validate::isLoadedObject($category))
                                return $category->name.'('.$module->getTranslator()->trans('Category', array(), 'Admin.Theme.Transformer').')';
                        }
                        if ($type == 4)
                        {
                            $manufacturer = new Manufacturer((int)$id, (int)$id_lang);
                            if ($manufacturer->id)
                                return $manufacturer->name.'('.$module->getTranslator()->trans('Manufacturer', array(), 'Admin.Theme.Transformer').')';
                        }
                    }    
                }
                return $module->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer');
            break;
        }
        return false;
    }

	protected function initList()
	{
	    // Fix table drag bug.
        Media::addJsDef(array(
            'currentIndex' => AdminController::$currentIndex.'&configure='.$this->name,
        ));
		$this->fields_list = array(
			'id_st_page_banner' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'class' => 'fixed-width-md',
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
            'item_k' => array(
                'title' => $this->getTranslator()->trans('Type', array(), 'Admin.Theme.Transformer'),
                'type' => 'text',
                'callback' => 'displayType',
                'callback_object' => 'StPageBanner',
                'search' => false,
                'orderby' => false,
                'class' => 'fixed-width-xl',
            ),
            'item_v' => array(
                'title' => $this->getTranslator()->trans('Page', array(), 'Admin.Theme.Transformer'),
                'type' => 'text',
                'callback' => 'displayTitle',
                'callback_object' => 'StPageBanner',
                'search' => false,
                'orderby' => false,
                'class' => 'fixed-width-xl',
            ),
            'image_multi_lang' => array(
				'title' => $this->getTranslator()->trans('Image', array(), 'Admin.Theme.Transformer'),
				'type' => 'text',
				'callback' => 'showBannerImage',
				'callback_object' => 'StPageBanner',
                'class' => 'fixed-width-xxl',
                'search' => false,
                'orderby' => false
            ),
            'active' => array(
                'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
                'align' => 'center',
                'active' => 'bannerstatus',
                'type' => 'bool',
                'class' => 'fixed-width-xl',
                'search' => false,
                'orderby' => false 
            ),
		);

		$helper = new HelperList();
		$helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_page_banner';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstpagebanner&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add', array(), 'Modules.Stpagebanner.Admin')
		);


        $helper->title = $this->getTranslator()->trans('Breadcrumbs', array(), 'Modules.Stpagebanner.Admin');
		$helper->table = $this->name;
		$helper->orderBy = 'position';
		$helper->orderWay = 'ASC';
	    $helper->position_identifier = 'id_st_page_banner';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    private function _prepareHook($identify,$type=1)
    {
        $banners = StPageBannerClass::getAll($identify, $type, $this->context->language->id, 1,1);
        if((!is_array($banners) || !count($banners)) && $type!=11)
            $banners = StPageBannerClass::getAll(1, 11, $this->context->language->id, 1,1);

	    $this->smarty->assign(array(
            'banner' => is_array($banners) && count($banners)==1 ? $banners[0] : false,
            'breadcrumb_width' => Configuration::get($this->_prefix_st.'BREADCRUMB_WIDTH'),
        ));
        return true;
    }
    public function hookDisplayHeader($params)
    { 
        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $custom_css_arr = StPageBannerClass::getCustomCss();

            if (is_array($custom_css_arr) && count($custom_css_arr)) {
                $custom_css = '';
                foreach ($custom_css_arr as $v) {
                    $prefix = '';
                    switch ($v['item_k']) {
                        case '1':
                            $prefix = 'body.category-id-'.$v['item_v'];
                            break;
                        case '3':
                            $prefix = 'body.cms-id-'.$v['item_v'];
                            break;
                        case '4':
                            $prefix = 'body.manufacturer-id-'.$v['item_v'];
                            break;
                        case '5':
                            $prefix = 'body.supplier-id-'.$v['item_v'];
                            break;
                        case '6':
                            $prefix = 'body.cms-category-id-'.$v['item_v'];
                            break;
                        case '8':
                            $prefix = '';
                            break;
                        case '9':
                            $prefix = '';
                            break;
                        case '10':
                            $prefix = 'body.'.$v['item_v'];
                            break;
                        default:
                            break;
                    }
                    if($v['bottom_spacing'] || $v['bottom_spacing']==='0' || $v['bottom_spacing']===0)
                    {
                        //$custom_css .= $prefix.'{margin-bottom:'.(int)$v['bottom_spacing'].'px;}';
                        $custom_css .= $prefix.' .breadcrumb_spacing{height:'.(int)$v['bottom_spacing'].'px;}';
                    }

                    $prefix .= ' #page_banner_container_'.$v['id_st_page_banner'].' ';


                    if($v['font_size'])
                    {
                        $custom_css .=$prefix.'.breadcrumb_nav{font-size: '.$v['font_size'].'px;}';
                        $custom_css .=$prefix.'.style_content{font-size: '.$v['font_size'].'px;}';
                    }
                    if($v['text_color'])
                    {
                        $custom_css .=$prefix.'.breadcrumb_nav, '.$prefix.'.breadcrumb_nav a{color: '.$v['text_color'].';}';
                        $custom_css .=$prefix.'.style_content, '.$prefix.'.style_content a{color: '.$v['text_color'].';}';
                    }
                    if($v['link_color'])
                    {
                        $custom_css .= $prefix.'.breadcrumb_nav a{color: '.$v['link_color'].';}';
                        $custom_css .= $prefix.'.style_content a{color: '.$v['link_color'].';}';
                    }
                    if($v['link_hover_color'])
                    {
                        $custom_css .= $prefix.'.breadcrumb_nav a:hover{color: '.$v['link_hover_color'].';}';
                        $custom_css .= $prefix.'.style_content a:hover{color: '.$v['link_hover_color'].';}';
                    }
                    if($v['bg_color'])
                        $custom_css .= $prefix.'{background-color: '.$v['bg_color'].';}';
                    if($v['border_color'])
                        $custom_css .= $prefix.'{border-color: '.$v['border_color'].';}';
                    if($v['border_top_size'] || $v['border_top_size']==='0' || $v['border_top_size']===0)
                        $custom_css .= $prefix.'{border-top-width: '.$v['border_top_size'].'px;}';
                    if($v['border_size'] || $v['border_size']==='0' || $v['border_size']===0)
                        $custom_css .= $prefix.'{border-bottom-width: '.$v['border_size'].'px;}';


                    if($v['padding_top'] || $v['padding_top']==='0' || $v['padding_top']===0)
                        $custom_css .= $prefix.'{padding-top: '.$v['padding_top'].'px;}';
                    if($v['padding_bottom'] || $v['padding_bottom']==='0' || $v['padding_bottom']===0)
                        $custom_css .= $prefix.'{padding-bottom: '.$v['padding_bottom'].'px;}';

                    if($v['top_spacing'] || $v['top_spacing']==='0' || $v['top_spacing']===0)
                        $custom_css .= $prefix.'{margin-top:'.(int)$v['top_spacing'].'px;}';

                }
                if($custom_css)
                    $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
            }
        }
        return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
    }
    public function hookDisplayBreadcrumb($params)
    {
        $page_name = $params['page_name'];

        $information = $this->getInformationLinks();
        $myAccount = $this->getMyAccountLinks();  

        $res = '';
        $id = 0;
        if($page_name =='product' )
        {
            $id = (int)Tools::getValue('id_product');
            /*if($id = (int)Tools::getValue('id_product'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,12)) || $this->_prepareHook($id,12))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,12));
            }*/
            if (!empty($params['product']) && isset($params['product']['id_category_default'])) {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($params['product']['id_category_default'],1)) || $this->_prepareHook($params['product']['id_category_default'],1))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($params['product']['id_category_default'],1));
            }
        }
        elseif($page_name =='category' )
        {
            if($id = (int)Tools::getValue('id_category'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,1)) || $this->_prepareHook($id,1))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,1));
            }
        }
        elseif($page_name=='manufacturer')
        {
            if($id = (int)Tools::getValue('id_manufacturer'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,4)) || $this->_prepareHook($id,4))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,4));
            }
        }
        elseif($page_name=='supplier')
        {
            if($id = (int)Tools::getValue('id_supplier'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,5)) || $this->_prepareHook($id,5))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,5));
            }
        }
        elseif($page_name=='cms')
        {
            if ($id = (int)Tools::getValue('id_cms'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,3)) || $this->_prepareHook($id,3))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,3));
            }
            else if ($id = (int)Tools::getValue('id_cms_category'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,6)) || $this->_prepareHook($id,6))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,6));
            }
        }
        elseif($page_name=='module-stblog-category')
        {
            if($id = (int)Tools::getValue('id_st_blog_category'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,8)) || $this->_prepareHook($id,8))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,8));
            }
        }
        elseif($page_name=='module-stblog-article')
        {
            $id = (int)Tools::getValue('id_st_blog');
            /*if($id = (int)Tools::getValue('id_st_blog'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,9)) || $this->_prepareHook($id,9))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,9));
            }*/
        }
        elseif($page_name=='module-stblogarchives-default')
        {
            $id = (int)Tools::getValue('m');
        }
        elseif(array_key_exists($page_name,$information) || array_key_exists($page_name,$myAccount))
        {
            if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($page_name,10)) || $this->_prepareHook($page_name,10))
                $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($page_name,10));
        }
        
        if(!$res && $page_name != 'index' && $page_name != 'pagenotfound' && $page_name != 'module-stblog-default')
        {
            if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($page_name, $id)) || $this->_prepareHook(1, 11))
                $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($page_name, $id));
        }
        return $res ? $res : '';
    }
    public function hookActionObjectCategoryDeleteAfter($params)
    {
        $this->clearBannerCache();
    }
    
    public function hookActionObjectCmsDeleteAfter($params)
    {
        $this->clearBannerCache();
    }
    
    public function hookActionObjectSupplierDeleteAfter($params)
    {
        $this->clearBannerCache();
    }   

    public function hookActionObjectManufacturerDeleteAfter($params)
    {
        $this->clearBannerCache();
    }
    
	public function hookActionShopDataDuplication($params)
	{
        Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'st_page_banner_shop(id_st_page_banner, id_shop)
		SELECT id_st_page_banner, '.(int)$params['new_id_shop'].'
		FROM '._DB_PREFIX_.'st_page_banner_shop
		WHERE id_shop = '.(int)$params['old_id_shop']);
        $this->clearBannerCache();
    }

	protected function stGetCacheId($key,$type,$name = null)
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

    public function renderWidget($hookName = null, array $configuration = [])
    {
        return;   
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return;
    }
    
}