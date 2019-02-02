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

use PrestaShop\PrestaShop\Adapter\Cart\CartPresenter;
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

require_once _PS_MODULE_DIR_.'stsidebar/classes/StSidebarClass.php';

class StSidebar extends Module implements WidgetInterface
{
    protected static $cache_items;
    public $imgtype = array('jpg', 'gif', 'jpeg', 'png');
    protected static $access_rights = 0775;
    private $_pages = array();
    private $_html = '';
    public  $fields_list;
    public $fields_form;
    public $fields_value;
    private $validation_errors = array();
    private $_prefix_st = 'ST_SB_';
    private $_sidebar_position = array();
    private $_location = array();
    private $_direciton = array();
    private $_native_modules = array();
    private $templateFile = array();

	public function __construct()
	{
		$this->name          = 'stsidebar';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);

		parent::__construct();
        
        $this->displayName = $this->getTranslator()->trans('Sidebar and mobile header bar', array(), 'Modules.Stsidebar.Admin');
        $this->description = $this->getTranslator()->trans('Manage items in the sidebar.', array(), 'Modules.Stsidebar.Admin');  
        $this->templateFile = array(
            'module:stthemeeditor/views/templates/slider/header.tpl',
            'module:stsidebar/views/templates/hook/rightbar.tpl',
            'module:stsidebar/views/templates/hook/mobilebar.tpl',
            'module:stsidebar/views/templates/hook/stsidebar.tpl'
            );      
        $this->initNativeModules();        
        $this->initLocation();        
        $this->initDirection();        
	}
    private function initDirection()
    {
        $this->_direciton = array(
                        array(
                            'id' => 'direction_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Default', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'direction_1',
                            'value' => 1,
                            'label' => $this->getTranslatOr()->trans('Right side', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'direction_2',
                            'value' => 2,
                            'label' => $this->getTranslatOr()->trans('Left side', array(), 'Admin.Theme.Transformer')
                        ),
                    );
    }
    private function initLocation()
    {
        $this->_location = array(
                        0=>array(
                            'id' => 'location_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Right side', array(), 'Admin.Theme.Transformer'),
                            'direction' => 1,
                        ),
                        1=>array(
                            'id' => 'location_1',
                            'value' => 1,
                            'label' => $this->getTranslatOr()->trans('Left side', array(), 'Admin.Theme.Transformer'),
                            'direction' => 2,
                        ),
                        2=>array(
                            'id' => 'location_2',
                            'value' => 2,
                            'label' => $this->getTranslatOr()->trans('Mobile bar right', array(), 'Admin.Theme.Transformer'),
                            'direction' => 1,
                        ),
                        3=>array(
                            'id' => 'location_3',
                            'value' => 3,
                            'label' => $this->getTranslatOr()->trans('Mobile bar center', array(), 'Admin.Theme.Transformer'),
                            'direction' => 1,
                        ),
                        4=>array(
                            'id' => 'location_4',
                            'value' => 4,
                            'label' => $this->getTranslatOr()->trans('Mobile bar left', array(), 'Admin.Theme.Transformer'),
                            'direction' => 2,
                        ),
                        5=>array(
                            'id' => 'location_5',
                            'value' => 5,
                            'label' => $this->getTranslatOr()->trans('Mobile bar bottom - items have even width', array(), 'Admin.Theme.Transformer'),
                            'direction' => 1,
                        ),
                    );
    }
    private function initSidebarPosition()
    {
        $this->_sidebar_position = array(
            array('id' => '1_0', 'name' => $this->getTranslator()->trans('At bottom of screen', array(), 'Admin.Theme.Transformer')),
            array('id' => '1_10', 'name' => $this->getTranslator()->trans('Bottom', array(), 'Admin.Theme.Transformer').' 10%'),
            array('id' => '1_20', 'name' => $this->getTranslator()->trans('Bottom', array(), 'Admin.Theme.Transformer').' 20%'),
            array('id' => '1_30', 'name' => $this->getTranslator()->trans('Bottom', array(), 'Admin.Theme.Transformer').' 30%'),
            array('id' => '1_40', 'name' => $this->getTranslator()->trans('Bottom', array(), 'Admin.Theme.Transformer').' 40%'),
            array('id' => '1_50', 'name' => $this->getTranslator()->trans('Bottom', array(), 'Admin.Theme.Transformer').' 50%'),
            array('id' => '2_0', 'name' => $this->getTranslator()->trans('At top of screen', array(), 'Admin.Theme.Transformer')),
            array('id' => '2_10', 'name' => $this->getTranslator()->trans('Top', array(), 'Admin.Theme.Transformer').' 10%'),
            array('id' => '2_20', 'name' => $this->getTranslator()->trans('Top', array(), 'Admin.Theme.Transformer').' 20%'),
            array('id' => '2_30', 'name' => $this->getTranslator()->trans('Top', array(), 'Admin.Theme.Transformer').' 30%'),
            array('id' => '2_40', 'name' => $this->getTranslator()->trans('Top', array(), 'Admin.Theme.Transformer').' 40%'),
            array('id' => '2_50', 'name' => $this->getTranslator()->trans('Top', array(), 'Admin.Theme.Transformer').' 50%'),
        );
    }
    private function initNativeModules()
    {
        $this->_native_modules = array(
            0 => array('name' => $this->getTranslator()->trans('Custom item', array(), 'Modules.Stsidebar.Admin')),
            1 => array('name' => $this->getTranslator()->trans('Shopping cart mod', array(), 'Modules.Stsidebar.Admin'), 'module' => 'stshoppingcart'),
            // 2 => array('name' => $this->getTranslator()->trans('Compare feature', array(), 'Modules.Stsidebar.Admin'), 'module' => ''),
            3 => array('name' => $this->getTranslator()->trans('Viewed products module', array(), 'Modules.Stsidebar.Admin'), 'module' => ''),
            4 => array('name' => $this->getTranslator()->trans('QR code module', array(), 'Modules.Stsidebar.Admin'), 'module' => 'stqrcode'),
            5 => array('name' => $this->getTranslator()->trans('Back to top button', array(), 'Modules.Stsidebar.Admin')),
            6 => array('name' => $this->getTranslator()->trans('Megamenu module', array(), 'Modules.Stsidebar.Admin'), 'module' => ''),
            7 => array('name' => $this->getTranslator()->trans('Mobile nav - User center(My account infomation, language switcher and search box)', array(), 'Modules.Stsidebar.Admin'), 'module' => ''),
            8 => array('name' => $this->getTranslator()->trans('Search bar mod', array(), 'Modules.Stsidebar.Admin'), 'module' => 'stsearchbar'),
            9 => array('name' => $this->getTranslator()->trans('Social share', array(), 'Modules.Stsidebar.Admin'), 'module' => 'stsocial'),
            10 => array('name' => $this->getTranslator()->trans('Loved products', array(), 'Modules.Stsidebar.Admin'), 'module' => 'stlovedproduct'),

            11 => array('name' => $this->getTranslator()->trans('Left column(Used to change colors of the opening left colum button on the mobile version)', array(), 'Modules.Stsidebar.Admin')),
            12 => array('name' => $this->getTranslator()->trans('Right column(Used to change colors of the opening right colum button on the mobile version)', array(), 'Modules.Stsidebar.Admin')),
        );
    }
	public function install()
	{
        $res = parent::install() &&
            $this->installDB() &&
            $this->registerHook('displayRightBar') &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('displaySideBar') &&
            $this->registerHook('displayMobileBar') &&
            $this->registerHook('displayMobileBarCenter') &&
            $this->registerHook('displayMobileBarLeft') &&
            $this->registerHook('displayMobileBarBottom') &&
            // Configuration::updateValue($this->_prefix_st.'SHOW', 1) &&
            Configuration::updateValue($this->_prefix_st.'SIDEBAR_TRANSITION', 0) &&
            Configuration::updateValue($this->_prefix_st.'WIDTH', 0) &&
            // Configuration::updateValue($this->_prefix_st.'SHOW_ON_DESKTOP', 1) &&
            Configuration::updateValue($this->_prefix_st.'POSITION_LEFT', '1_0') &&
            Configuration::updateValue($this->_prefix_st.'POSITION_RIGHT', '1_0');

        if ($res)
			foreach(Shop::getShops(false) as $shop)
				$res &= $this->sampleData($shop['id_shop']);

        $this->clearStSidebarCache();
        return $res;
	}
    public function installDB()
    {
        $return = (bool)Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_sidebar` (
                `id_st_sidebar` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `location` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `direction` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0,
 
                `native_modules` tinyint(2) unsigned NOT NULL DEFAULT 0, 

                `btn_color` varchar(7) DEFAULT NULL,
                `btn_bg` varchar(7) DEFAULT NULL,
                `btn_hover_color` varchar(7) DEFAULT NULL,
                `btn_hover_bg` varchar(7) DEFAULT NULL,

                `icon_class` varchar(255) DEFAULT NULL,   

                PRIMARY KEY (`id_st_sidebar`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
        
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_sidebar_lang` (
                `id_st_sidebar` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `id_lang` int(10) unsigned NOT NULL,
                `content` text NOT NULL,
                `title` varchar(255) DEFAULT NULL,
                PRIMARY KEY (`id_st_sidebar`, `id_lang`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
        
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_sidebar_shop` (
                `id_st_sidebar` int(10) UNSIGNED NOT NULL,
                `id_shop` int(11) NOT NULL,      
                PRIMARY KEY (`id_st_sidebar`,`id_shop`),    
                KEY `id_shop` (`id_shop`)   
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        return $return;
    }

    public function uninstall()
    {
        $this->clearStSidebarCache();
        // Delete configuration
        return $this->uninstallDB() && parent::uninstall();
    }

    public function uninstallDB()
    {
        return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_sidebar`,`'._DB_PREFIX_.'st_sidebar_lang`,`'._DB_PREFIX_.'st_sidebar_shop`');
    }

    public function sampleData($id_shop)
    {
        $return = true;
        $samples = array(
            array(
                'native_modules' => 1,
                'location' => 0,
            ),
            array(
                'native_modules' => 10,
                'location' => 0,
            ),
            array(
                'native_modules' => 5,
                'location' => 0,
            ),
            array(
                'native_modules' => 6,
                'location' => 4,
            ),
            array(
                'native_modules' => 7,
                'location' => 2,
            ),
        );
        foreach($samples as $i => $sample)
        {
            $module = new StSidebarClass();
            $module->native_modules = $sample['native_modules'];
            $module->location = $sample['location'];               
            $module->active = 1;
            $module->position = (int)$i;
            $module->id_shop_list = array((int)$id_shop);
            $return &= $module->add();
        }
        return $return;
    }
    
    protected function stGetCacheId($key,$type='location',$name = null)
    {
        $cache_id = parent::getCacheId($name);
        return $cache_id.'_'.$key.'_'.$type;
    }
    private function clearStSidebarCache()
    {
        $this->_clearCache('*');
    }

    public function getContent()
    {
        $this->context->controller->addCSS(($this ->_path).'views/css/admin.css');        
        $id_st_sidebar = (int)Tools::getValue('id_st_sidebar');
        $this->initSidebarPosition();        
        if ((Tools::isSubmit('statusstsidebar')))
        {
            $sidebar = new StSidebarClass((int)$id_st_sidebar);
            if($sidebar->id && $sidebar->toggleStatus())
            {
                $this->clearStSidebarCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                //$this->_html .= $this->displayConfirmation($this->getTranslator()->trans('the status has been updated successfully.', array(), 'Admin.Theme.Transformer'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if (isset($_POST['savestsidebar']) || isset($_POST['savestsidebarAndStay']))
        {
            if ($id_st_sidebar)
                $sidebar = new StSidebarClass((int)$id_st_sidebar);
            else
                $sidebar = new StSidebarClass();
            
            $error = array();
            $sidebar->copyFromPost();
            
            if (!count($error) && $sidebar->validateFields(false) && $sidebar->validateFieldsLang(false))
            {
                $shop_ids = $sidebar->getShopIds();
                $sidebar->clearShopIds();
                $id_shop_list = array();
                if($assos_shop = Tools::getValue('checkBoxShopAsso_st_sidebar')) {
                    foreach ($assos_shop as $id_shop => $row) {
                        $id_shop_list[] = $id_shop;
                    }
                }
                if (!$id_shop_list) {
                    $id_shop_list = array(Context::getContext()->shop->id);
                }
                $sidebar->id_shop_list = array_unique($id_shop_list);
                if($sidebar->save())
                {
                    $this->prepareHooks();
                    $this->clearStSidebarCache();
                    if(isset($_POST['savestsidebarAndStay']) || Tools::getValue('fr') == 'view')
                    {
                        $rd_str = isset($_POST['savestsidebarAndStay']) && Tools::getValue('fr') == 'view' ? 'fr=view&update' : (isset($_POST['savestsidebarAndStay']) ? 'update' : 'view');
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_sidebar='.$sidebar->id.'&conf='.($id_st_sidebar?4:3).'&'.$rd_str.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
                    }    
                    else
                        $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Sidebar', array(), 'Modules.Stsidebar.Admin').' '.($id_st_sidebar ? $this->gettranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('added', array(), 'Admin.Theme.Transformer')));
                }                    
                else {
                    $sidebar->restoreShopIds($shop_ids);
                    $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred during sidebar', array(), 'Modules.Stsidebar.Admin').' '.($id_st_sidebar ? $this->gettranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
                }     
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        if (isset($_POST['savesettingstsidebar']) || isset($_POST['savesettingstsidebarAndStay']))
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
                $this->clearStSidebarCache();
                if(isset($_POST['savesettingstsidebarAndStay']))
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&token='.Tools::getAdminTokenLite('AdminModules')); 
                else
                    $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Admin.Theme.Transformer'));
            }
        }
        if(Tools::isSubmit('addstsidebar') || (Tools::isSubmit('updatestsidebar') && $id_st_sidebar))
        {
            $helper = $this->initForm();
            return $this->_html.$helper->generateForm($this->fields_form);
        }
        else if (Tools::isSubmit('deletestsidebar') && $id_st_sidebar)
        {
            $sidebar = new StSidebarClass($id_st_sidebar);
            $sidebar->delete();
            $this->prepareHooks();
            $this->clearStSidebarCache();
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        elseif (Tools::isSubmit('settingstsidebar'))
		{
		    $this->initFieldsForm();
			$helper = $this->initSettingForm();
            
			return $this->_html.$helper->generateForm($this->fields_form);
		}
        else
        {
            $helper = $this->initList();
            $this->_html .= $helper->generateList(StSidebarClass::getAll((int)$this->context->language->id), $this->fields_list);
            $this->initFieldsForm();
			$helper = $this->initSettingForm();
            $this->_html .= $helper->generateForm($this->fields_form);
            return $this->_html;
        }
    }

    public static function showNativeModuleName($value,$row)
    {
        $sidebar = new StSidebar();
        $result = '';
        foreach ($sidebar->_native_modules as $k => $v)
            if($value==$k)
            {
                $result = $v['name'];
                break;
            }
        return $result;
    }
    public static function showLocation($value,$row)
    {
        $sidebar = new StSidebar();
        return isset($sidebar->_location[$value]) ? $sidebar->_location[$value]['label'] : '-';
    }
    public static function showDirection($value,$row)
    {
        $sidebar = new StSidebar();
        return $value ? $sidebar->_direciton[$value]['label'] :$sidebar->_direciton[$sidebar->_location[$row['location']]['direction']]['label'];
    }
    protected function initList()
    {
        $this->fields_list = array(
            'id_st_sidebar' => array(
                'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
                'width' => 120,
                'type' => 'text',
                'search' => false,
                'orderby' => false,
            ),
            'title' => array(
                'title' => $this->getTranslator()->trans('Title', array(), 'Admin.Theme.Transformer'),
                'width' => 140,
                'type' => 'text',
                'search' => false,
                'orderby' => false,
            ),
            'native_modules' => array(
                'title' => $this->getTranslator()->trans('Type', array(), 'Admin.Theme.Transformer'),
                'width' => 200,
                'type' => 'text',
                'callback' => 'showNativeModuleName',
                'callback_object' => 'StSidebar',
                'search' => false,
                'orderby' => false,
            ),
            'location' => array(
                'title' => $this->getTranslator()->trans('Location', array(), 'Admin.Theme.Transformer'),
                'width' => 200,
                'type' => 'text',
                'callback' => 'showLocation',
                'callback_object' => 'StSidebar',
                'search' => false,
                'orderby' => false,
            ),
            'direction' => array(
                'title' => $this->getTranslator()->trans('Open from', array(), 'Admin.Theme.Transformer'),
                'width' => 200,
                'type' => 'text',
                'callback' => 'showDirection',
                'callback_object' => 'StSidebar',
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
                'active' => 'status',
                'type' => 'bool',
                'width' => 25,
                'search' => false,
                'orderby' => false,
            ),
        );

        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->identifier = 'id_st_sidebar';
        $helper->actions = array('edit', 'delete');
        $helper->show_toolbar = true;
        $helper->imageType = 'jpg';
        $helper->toolbar_btn['new'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstsidebar&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Add a sidebar item', array(), 'Modules.Stsidebar.Admin'),
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
                'title' => $this->getTranslator()->trans('Settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                'native_modules'=>array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Type:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'native_modules',
                    'default_value' => 0,
                    'values' => array(
                    ),
                    'desc' => array(
                        $this->gettranslator()->trans('You can create as many custom items as you want.', array(), 'Modules.Stsidebar.Admin'),
                        $this->gettranslator()->trans('For the reset native modules, let me use Shopping cart mod as an exmaple, if you create two shopping cart mod items, only one of them would be shown out.', array(), 'Modules.Stsidebar.Admin'),
                        $this->gettranslator()->trans('If you added a native moudle, but it was not shown up, then please check if the module is installed or enabled.', array(), 'Modules.Stsidebar.Admin'),
                    ),
                ),
                array(
                    'type' => 'fontello',
                    'label' => $this->getTranslator()->trans('Icon:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'icon_class',
                    'values' => $this->get_fontello(),
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Title:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'title',
                    'lang' => true,
                    'size' => 64,
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->getTranslator()->trans('Content:', array(), 'Admin.Theme.Transformer'),
                    'lang' => true,
                    'name' => 'content',
                    'cols' => 40,
                    'rows' => 10,
                    'autoload_rte' => true,
                    'desc' => $this->gettranslator()->trans('For custom sidebar only', array(), 'Modules.Stsidebar.Admin'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Display on:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'location',
                    'default_value' => 0,
                    'values' => $this->_location,
                    'desc' => $this->gettranslator()->trans('This does not work for left column and right column, they can only be on the bottom', array(), 'Modules.Stsidebar.Admin'),
                ),   
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Open the sidebar from left or right side:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'direction',
                    'default_value' => 0,
                    'values' => $this->_direciton,
                    'desc' => $this->gettranslator()->trans('This does not work for left column and right column', array(), 'Modules.Stsidebar.Admin'),
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
                'title' => $this->getTranslator()->trans('Advanced settings', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array( 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Icon color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Icon background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_bg',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Icon hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_hover_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Icon hover background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'btn_hover_bg',
                    'size' => 33,
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
            'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
        );


        //
        foreach ($this->_native_modules as $k=>$v) {
            $this->fields_form[0]['form']['input']['native_modules']['values'][$k] = array(
                'id' => 'native_modules_'.$k,
                'value' => $k,
                'label' => $v['name'],
            );
        }
        
        $id_st_sidebar = (int)Tools::getValue('id_st_sidebar');
        $sidebar = new StSidebarClass($id_st_sidebar);
        
        if($sidebar->id)
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_sidebar');
        }
        
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->id = (int)$sidebar->id;
        $helper->module = $this;
        $helper->table =  'st_sidebar';
        $helper->identifier = 'id_st_sidebar';
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->submit_action = 'savestsidebar';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($sidebar),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );
        
        $helper->title = $this->displayName; 

        foreach($this->_pages as $v)
            $helper->tpl_vars['fields_value']['display_on_'.$v['id']] = (int)$v['val']&(int)$sidebar->display_on;
        
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
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Sidebar transition:', array(), 'Modules.Stsidebar.Admin'),
                    'name' => 'sidebar_transition',
                    'values' => array(
                        array(
                            'id' => 'sidebar_transition_reveal',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Reveal, default', array(), 'Modules.Stsidebar.Admin')),
                        array(
                            'id' => 'sidebar_transition_slide',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Slide in on top', array(), 'Modules.Stsidebar.Admin')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
				/*array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('Enable sidebar', array(), 'Modules.Stsidebar.Admin'),
					'name' => 'show',
					'values' => array(
						array(
							'id' => 'show_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
						),
						array(
							'id' => 'show_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
						)
					),
                    'validation' => 'isBool',
				),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display sidebar on desktop', array(), 'Modules.Stsidebar.Admin'),
                    'name' => 'show_on_desktop',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'show_on_desktop_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'show_on_desktop_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    'validation' => 'isUnsignedInt',
                ),*/
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Set the position of right side bar on the screen:', array(), 'Modules.Stsidebar.Admin'),
                    'name' => 'position_right',
                    'options' => array(
                        'query' => $this->_sidebar_position,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isGenericName',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Set the position of left side bar on the screen:', array(), 'Modules.Stsidebar.Admin'),
                    'name' => 'position_left',
                    'options' => array(
                        'query' => $this->_sidebar_position,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isGenericName',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Sidebar width:', array(), 'Modules.Stsidebar.Admin'),
                    'name' => 'width',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'default_value' => 0,
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default width', array(), 'Admin.Theme.Transformer'),
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
		$helper->submit_action = 'savesettingstsidebar';
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
            'sidebar_transition'                => Configuration::get($this->_prefix_st.'SIDEBAR_TRANSITION'),
            // 'show'          => Configuration::get($this->_prefix_st.'SHOW'),
            // 'show_on_desktop'          => Configuration::get($this->_prefix_st.'SHOW_ON_DESKTOP'),
            'position_left'                => Configuration::get($this->_prefix_st.'POSITION_LEFT'),
            'position_right'                => Configuration::get($this->_prefix_st.'POSITION_RIGHT'),
            'width'                => Configuration::get($this->_prefix_st.'WIDTH'),
        );
        return $fields_values;
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
    public function hookDisplayHeader($params)
    {        
        if (!$this->isCached($this->templateFile[0], $this->getCacheId()))
        {   
            $custom_css = '';

            if ($width = Configuration::get($this->_prefix_st.'WIDTH'))
            {
                $custom_css .= '.st-menu{width:'.$width.'px;}.open_bar_right #rightbar{right: '.$width.'px;}.open_bar_left #leftbar{left: '.$width.'px;}.is_rtl .open_bar_right #rightbar{right: auto;left: '.$width.'px;}.is_rtl .open_bar_left #leftbar{left:auto;right: '.$width.'px;}';
                $custom_css .= '.st-effect-0.open_bar_right .st-pusher {-webkit-transform: translate3d(-'.$width.'px, 0, 0); transform: translate3d(-'.$width.'px, 0, 0); } .st-effect-0.open_bar_left .st-pusher {-webkit-transform: translate3d('.$width.'px, 0, 0); transform: translate3d('.$width.'px, 0, 0); } .is_rtl .st-effect-0.open_bar_right .st-pusher {-webkit-transform: translate3d('.$width.'px, 0, 0); transform: translate3d('.$width.'px, 0, 0); } .is_rtl .st-effect-0.open_bar_left .st-pusher {-webkit-transform: translate3d(-'.$width.'px, 0, 0); transform: translate3d(-'.$width.'px, 0, 0); }';
            }

            if (!isset(StSidebar::$cache_items))
                StSidebar::$cache_items = StSidebarClass::getAll((int)$this->context->language->id,1);
            $sidebar_left_count = $sidebar_right_count = 0;

            $sidebar_transition = (int)Configuration::get($this->_prefix_st.'SIDEBAR_TRANSITION');

            $sidebar_items = $this->applyDefaultDirection(StSidebar::$cache_items);

            foreach ($sidebar_items as $v) {
                /*if($v['hide_on_mobile']==1)
                    continue;*/
                if($v['location']==1 && $v['hide_on_mobile']!=1)
                    $sidebar_left_count++;
                if($v['location']==0 && $v['hide_on_mobile']!=1)
                    $sidebar_right_count++;

                $classname = '#rightbar_'.$v['id_st_sidebar'];
                if($v['native_modules']==11)
                    $classname = '#switch_left_column_wrap';
                elseif($v['native_modules']==12)
                    $classname = '#switch_right_column_wrap';

                if($v['location']>1)
                {
                    if($v['btn_color'])
                        $custom_css .= $classname.'.mobile_bar_item{color:'.$v['btn_color'].'}';
                    if($v['btn_bg'])
                        $custom_css .= $classname.'.mobile_bar_item{background-color:'.$v['btn_bg'].'}';
                    if($v['btn_hover_color'])
                        $custom_css .= $classname.'.mobile_bar_item:hover, '.$classname.'.mobile_bar_item.active{color:'.$v['btn_hover_color'].'}';
                    if($v['btn_hover_bg'])
                        $custom_css .= $classname.'.mobile_bar_item:hover, '.$classname.'.mobile_bar_item.active{background-color:'.$v['btn_hover_bg'].'}';
                }
                else
                {
                    if($v['btn_color'])
                        $custom_css .= $classname.' .icon_wrap{color:'.$v['btn_color'].'}';
                    if($v['btn_bg'])
                        $custom_css .= $classname.' .icon_wrap{background-color:'.$v['btn_bg'].'}';
                    if($v['btn_hover_color'])
                        $custom_css .= $classname.' .icon_wrap:hover, '.$classname.' .icon_wrap.active{color:'.$v['btn_hover_color'].'}';
                    if($v['btn_hover_bg'])
                        $custom_css .= $classname.' .icon_wrap:hover, '.$classname.' .icon_wrap.active{background-color:'.$v['btn_hover_bg'].'}';
                }
                    $native_modules = '';
                    switch ($v['native_modules']) {
                        case 1:
                            $native_modules = '#side_products_cart';
                            break;
                        case 2:
                            $native_modules = '#side_products_compared';
                            break;
                        case 3:
                            $native_modules = '#side_viewed';
                            break;
                        case 4:
                            $native_modules = '#side_qrcode';
                            break;
                        case 5:
                            break;
                        case 6:
                            $native_modules = '#side_stmobilemenu';
                            break;
                        case 7:
                            $native_modules = '#side_mobile_nav';
                            break;
                        case 8:
                            $native_modules = '#side_search';
                            break;
                        case 9:
                            $native_modules = '#side_share';
                            break;
                        case 10:
                            $native_modules = '#side_loved';
                            break;
                        case 11:
                        case 12:
                            break;
                        default:
                            $native_modules = '#side_custom_sidebar_'.$v['id_st_sidebar'];
                            break;
                    }
                    //unable to add st-menu-left lei dao every st-menu, so got to use css, side_stmobilemenu is special, it is on the left side by default.
                    if($native_modules)
                    {
                        $temp = '';
                        if($v['direction']==2)
                        {
                            $temp .= $native_modules.'{right: auto; left: 0; border-left-width: 0;border-right-width: 4px;}';
                            $temp .= '.is_rtl '.$native_modules.'{left: auto; right: 0;border-left-width:4px;border-right-width: 0;}';
                            $temp .= $native_modules.' .st-menu-header .close_right_side{left: auto; right: 4px;}';
                            $temp .= '.is_rtl '.$native_modules.' .st-menu-header .close_right_side{left: 4px; right: auto;}';
                            if($sidebar_transition)
                            {
                                $temp .= '.st-effect-1 '.$native_modules.'{-webkit-transform: translate3d(-100%, 0, 0);transform: translate3d(-100%, 0, 0);}';
                                $temp .= '.is_rtl .st-effect-1 '.$native_modules.'{-webkit-transform: translate3d(100%, 0, 0);transform: translate3d(100%, 0, 0);}';
                            }
                        }elseif($v['direction']==1){
                            $temp .= $native_modules.'{right: 0; left: auto; border-left-width: 4px;border-right-width: 0;}';
                            $temp .= '.is_rtl '.$native_modules.'{left: 0; right: auto;border-left-width:0;border-right-width: 4px;}';
                            $temp .= $native_modules.' .st-menu-header .close_right_side{left: 4px; right: auto;}';
                            $temp .= '.is_rtl '.$native_modules.' .st-menu-header .close_right_side{left: auto; right: 4px;}';
                            if($sidebar_transition)
                            {
                                $temp .= '.st-effect-1 '.$native_modules.'{-webkit-transform: translate3d(100%, 0, 0);transform: translate3d(100%, 0, 0);}';
                                $temp .= '.is_rtl .st-effect-1 '.$native_modules.'{-webkit-transform: translate3d(-100%, 0, 0);transform: translate3d(-100%, 0, 0);}';
                            }
                        }
                        $custom_css .= $temp;
                        /*to do the same open form different directions, mobile bar can also show on desktop
                        if($v['hide_on_mobile']==1)
                            $custom_css .= '@media only screen and (min-width: 992px) {'.$temp.'}';
                        elseif($v['hide_on_mobile']==2)
                            $custom_css .= '@media only screen and (max-width: 991px) {'.$temp.'}';
                        else
                            $custom_css .= $temp;*/
                        
                    }
            }
            $custom_css .= '#rightbar{-webkit-flex-grow: '.$sidebar_right_count.'; -moz-flex-grow: '.$sidebar_right_count.'; flex-grow: '.$sidebar_right_count.'; -ms-flex-positive: '.$sidebar_right_count.';}#leftbar{-webkit-flex-grow: '.$sidebar_left_count.'; -moz-flex-grow: '.$sidebar_left_count.'; flex-grow: '.$sidebar_left_count.'; -ms-flex-positive: '.$sidebar_left_count.';}';

            
            if(!$sidebar_right_count && !$sidebar_right_count)
            {
                $custom_css .= '.st-menu{bottom:0;}#body_wrapper{padding-bottom: 0;}.mobile_device.use_mobile_header .st-menu{bottom:0;}.mobile_device.use_mobile_header #body_wrapper{padding-bottom: 0;}';//50px zai responsive.scss he .use_mobile_header ye you tong yang de zhi 

                // $custom_css .= '.mobile_device.use_mobile_header .st-menu{bottom:0;}.mobile_device.use_mobile_header #body_wrapper{padding-bottom: 0;}.mobile_device.use_mobile_header.layout-left-column.slide_lr_column .st-menu,.mobile_device.use_mobile_header.layout-right-column.slide_lr_column .st-menu,.mobile_device.use_mobile_header.layout-both-columns.slide_lr_column .st-menu{bottom:50px;}.mobile_device.use_mobile_header.layout-left-column.slide_lr_column #body_wrapper,.mobile_device.use_mobile_header.layout-right-column.slide_lr_column #body_wrapper,.mobile_device.use_mobile_header.layout-both-columns.slide_lr_column #body_wrapper{padding-bottom: 50px;}';//50px zai responsive.scss he .use_mobile_header ye you tong yang de zhi 
                $custom_css .= '@media only screen and (max-width: 991px) {.layout-left-column.slide_lr_column .st-menu,.layout-right-column.slide_lr_column .st-menu,.layout-both-columns.slide_lr_column .st-menu{bottom:50px;}.layout-left-column.slide_lr_column #body_wrapper,.layout-right-column.slide_lr_column #body_wrapper,.layout-both-columns.slide_lr_column #body_wrapper{padding-bottom: 50px;}}';
                $custom_css .= '@media only screen and (max-width: 991px) {.mobile_device.use_mobile_header.layout-left-column.slide_lr_column .st-menu,.mobile_device.use_mobile_header.layout-right-column.slide_lr_column .st-menu,.mobile_device.use_mobile_header.layout-both-columns.slide_lr_column .st-menu{bottom:50px;}.mobile_device.use_mobile_header.layout-left-column.slide_lr_column #body_wrapper,.mobile_device.use_mobile_header.layout-right-column.slide_lr_column #body_wrapper,.mobile_device.use_mobile_header.layout-both-columns.slide_lr_column #body_wrapper{padding-bottom: 50px;}}';
            }
                
            if($percent_of_screen = Configuration::get($this->_prefix_st.'POSITION_RIGHT'))
            {
                $percent_of_screen_arr = explode('_',$percent_of_screen);
                $custom_css .='#rightbar{top:'.($percent_of_screen_arr[0]==2 ? $percent_of_screen_arr[1].'%' : 'auto').'; bottom:'.($percent_of_screen_arr[0]==1 ? $percent_of_screen_arr[1].'%' : 'auto').';}';
            }
            if($percent_of_screen = Configuration::get($this->_prefix_st.'POSITION_LEFT'))
            {
                $percent_of_screen_arr = explode('_',$percent_of_screen);
                $custom_css .='#leftbar{top:'.($percent_of_screen_arr[0]==2 ? $percent_of_screen_arr[1].'%' : 'auto').'; bottom:'.($percent_of_screen_arr[0]==1 ? $percent_of_screen_arr[1].'%' : 'auto').';}';
            }
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }

        return $this->fetch($this->templateFile[0], $this->getCacheId());
    }
    public function hookDisplayRightBar($params)
    {
        if (!isset(StSidebar::$cache_items))
            StSidebar::$cache_items = StSidebarClass::getAll((int)$this->context->language->id,1);

        $sidebar_items_right = $sidebar_items_left = array();

        $sidebar_items = $this->validateNativeModules(StSidebar::$cache_items);
        $sidebar_items = $this->applyDefaultDirection($sidebar_items);
        foreach ($sidebar_items as $k=>$v) {
            if($v['native_modules'] && (in_array($v['native_modules'], $sidebar_items_right) || in_array($v['native_modules'], $sidebar_items_left)))
                continue;
            if($v['location']==1)
                $sidebar_items_left[$v['native_modules']] = $v;
            elseif($v['location']==0)
                $sidebar_items_right[$v['native_modules']] = $v;
        }
        $this->_prepare_bar($sidebar_items_right+$sidebar_items_left);

        $this->smarty->assign(array(
            'sidebar_items_left' => $sidebar_items_left,
            'sidebar_items_right' => $sidebar_items_right,
        ));

        return $this->fetch($this->templateFile[1]);
    }

    public function _prepare_bar($bar){
        if(array_key_exists('1', $bar))
        {
            $this->smarty->assign(array(
                'cart' => (new CartPresenter)->present(isset($params['cart']) ? $params['cart'] : $this->context->cart),
                'block_cart_style' => (int)Configuration::get('ST_BLOCK_CART_STYLE'),
            ));
        }
        if(array_key_exists('3', $bar))
        {
            $viewdProductIds = $this->getViewedProductIds();

            $this->smarty->assign(array(
                'products_viewed_nbr' => is_array($viewdProductIds) ? count($viewdProductIds) : 0,
            ));
        }
        if(array_key_exists('8', $bar) && $quick_search_mobile = Configuration::get('ST_QUICK_SEARCH_MOBILE'))
        {
            $widgetVariables = array(
                'search_controller_url' => $this->context->link->getPageLink('search', null, null, null, false, null, true),
                'quick_search_as_results' => Configuration::get('ST_QUICK_SEARCH_AS_RESULTS'),
                'quick_search_mobile' => $quick_search_mobile,
                'quick_search_simple' => Configuration::get('ST_QUICK_SEARCH_SIMPLE'),
            );

            if (!array_key_exists('search_string', $this->context->smarty->getTemplateVars())) {
                $widgetVariables['search_string'] = '';
            }
            $this->smarty->assign($widgetVariables);
        }
        return true;
    }
    public function hookDisplayMobileBar($params, $location=2)
    {
        if (!isset(StSidebar::$cache_items))
            StSidebar::$cache_items = StSidebarClass::getAll((int)$this->context->language->id,1);

        $mobilebar = array();
        $sidebar_items = $this->validateNativeModules(StSidebar::$cache_items);
        foreach ($sidebar_items as $k=>$v) {
            if($v['native_modules'] && in_array($v['native_modules'], $mobilebar))
                continue;
            if($v['location']==$location)
                $mobilebar[$v['native_modules']] = $v;
        }
        $this->_prepare_bar($mobilebar);
        $mobilebar = $this->applyDefaultDirection($mobilebar);
        $this->smarty->assign(array(
            'mobilebar' => $mobilebar,
        ));

        return $this->fetch($this->templateFile[2]);
    }
    public function hookDisplayMobileBarLeft($params){
        return $this->hookDisplayMobileBar($params, 4);
    }
    public function hookDisplayMobileBarCenter($params){
        return $this->hookDisplayMobileBar($params, 3);
    }
    public function hookDisplayMobileBarBottom($params){
        return $this->hookDisplayMobileBar($params, 5);
    }


    //this function copied from stviewedproducts
    protected function getViewedProductIds()
    {
        if(!isset($this->context->cookie->viewed))
            return false;
        $arr = array_reverse(explode(',', $this->context->cookie->viewed));

        $max_nbr = Configuration::get('ST_VIEWED_VIEWED_MAX_NBR');
            $max_nbr || $max_nbr = 10;

        return array_slice($arr, 0, (int) ($max_nbr - 1));
    }
    public function hookDisplaySideBar($params)
    {
        $sidebar_items = StSidebarClass::getAll((int)$this->context->language->id,1);
        foreach ($sidebar_items as $k=>$v) {
            if($v['native_modules'] && $v['native_modules']!=7)
                unset($sidebar_items[$k]);
        }
        $this->smarty->assign(array(
            'sidebar_items' => $sidebar_items,
        ));
        return $this->fetch($this->templateFile[3]);
    }

    public function validateNativeModules($module)
    {
        foreach ($module as $k=>$v) {
            if($v['native_modules']==1 && Configuration::isCatalogMode()){
                unset($module[$k]);
                continue;
            }
            if(isset($this->_native_modules[$v['native_modules']]['module']) && $this->_native_modules[$v['native_modules']]['module'] && (!Module::isInstalled($this->_native_modules[$v['native_modules']]['module']) || !Module::isEnabled($this->_native_modules[$v['native_modules']]['module'])))
            {
                unset($module[$k]);
                continue;
            }
        }
        return $module;
    }
    public function applyDefaultDirection($sidebar)
    {
        foreach ($sidebar as $k=>$v) {
            if((int)$v['direction']==0)
                $sidebar[$k]['direction'] = $this->_location[$v['location']]['direction'];
        }
        
        return $sidebar;
    }

    public function hookActionShopDataDuplication($params)
    {
        Db::getInstance()->execute('
        INSERT IGNORE INTO '._DB_PREFIX_.'st_sidebar_shop (id_st_s, id_shop)
        SELECT id_st_sidebar, '.(int)$params['new_id_shop'].'
        FROM '._DB_PREFIX_.'st_sidebar_shop
        WHERE id_shop = '.(int)$params['old_id_shop']);
        $this->clearStSidebarCache();
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
            $positions = Tools::getValue('id_st_sidebar');
            $msg = '';
            if (is_array($positions))
                foreach ($positions as $position => $value)
                {
                    $pos = explode('_', $value);

                    if ((isset($pos[2])) && ((int)$pos[2] === $id))
                    {
                        if ($object = new StSidebarClass((int)$pos[2]))
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
    public function prepareHooks()
    {
        $modules = array();
        $rows = Db::getInstance()->executeS('SELECT native_modules FROM `'._DB_PREFIX_.'st_sidebar` s
            LEFT JOIN `'._DB_PREFIX_.'st_sidebar_shop` ss
            ON s.`id_st_sidebar` = ss.`id_st_sidebar`
            WHERE ss.`id_shop`='.(int)$this->context->shop->id);
        foreach($rows AS $value) {
            if (key_exists($value['native_modules'], $this->_native_modules) && 
                isset($this->_native_modules[$value['native_modules']]['module']) &&
                $this->_native_modules[$value['native_modules']]['module']
                )
                $modules[] = $this->_native_modules[$value['native_modules']]['module'];
                $modules = array_unique($modules);
        }
        foreach($this->_native_modules AS $value)
        {
            if (!isset($value['module']) || !$value['module']) {
                continue;    
            }
            $hook = 'displaysidebar';
            $id_hook = Hook::getIdByName($hook);
            if (count($modules) && in_array($value['module'], $modules))
            {
                $module = Module::getInstanceByName($value['module']);
                if (!isset($module->id) || !$module->id) {
                    continue;
                }
                if ($id_hook && Hook::getModulesFromHook($id_hook, $module->id))
                    continue;
                if (!$module->isHookableOn($hook))
                    $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to ', array(), 'Admin.Theme.Transformer').$hook;
                else
                    $module->registerHook($hook, Shop::getContextListShopID());
            }
            else
            {
                $module = Module::getInstanceByName($value['module']);
                if (!isset($module->id) || !$module->id) {
                    continue;
                }
                if($id_hook && Hook::getModulesFromHook($id_hook, $module->id))
                {
                    $module->unregisterHook($id_hook, Shop::getContextListShopID());
                    $module->unregisterExceptions($id_hook, Shop::getContextListShopID());
                } 
            }
        }
        Cache::clean('hook_module_list');
        return true;
    }
    public function get_prefix()
    {
        if (isset($this->_prefix_st) && $this->_prefix_st)
            return $this->_prefix_st;
        return false;
    }
}