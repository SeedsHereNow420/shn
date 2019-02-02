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

require_once _PS_MODULE_DIR_.'stnotification/classes/StNotificationClass.php';

class StNotification extends Module implements WidgetInterface
{
    private $templateFile;
    protected static $access_rights = 0775;
    private $_html = '';
    public  $fields_list;
    public $fields_form;
    public $fields_value;
    private $validation_errors = array();
    private $_prefix_st = 'ST_NF_';
    public static $location = array();
    
	public function __construct()
	{
		$this->name          = 'stnotification';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;

		parent::__construct();
        
        $this->displayName = $this->getTranslator()->trans('Notification', array(), 'Modules.Stnotification.Admin');
        $this->description = $this->getTranslator()->trans('Display a responsive and custom warning notification on your site.', array(), 'Modules.Stnotification.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);

        $this->templateFile = 'module:stnotification/views/templates/hook/stnotification.tpl';
        
        self::$location = array(
            array('id' => 0, 'name'=>$this->getTranslator()->trans('Bottom center', array(), 'Admin.Theme.Transformer')),
            array('id' => 1, 'name'=>$this->getTranslator()->trans('Bottom right', array(), 'Admin.Theme.Transformer')),
            array('id' => 2, 'name'=>$this->getTranslator()->trans('Bottom left', array(), 'Admin.Theme.Transformer')),
            array('id' => 3, 'name'=>$this->getTranslator()->trans('Center center', array(), 'Admin.Theme.Transformer')),
            array('id' => 4, 'name'=>$this->getTranslator()->trans('Center right', array(), 'Admin.Theme.Transformer')),
            array('id' => 5, 'name'=>$this->getTranslator()->trans('Center left', array(), 'Admin.Theme.Transformer')),
            array('id' => 6, 'name'=>$this->getTranslator()->trans('Top center', array(), 'Admin.Theme.Transformer')),
            array('id' => 7, 'name'=>$this->getTranslator()->trans('Top right', array(), 'Admin.Theme.Transformer')),
            array('id' => 8, 'name'=>$this->getTranslator()->trans('Top left', array(), 'Admin.Theme.Transformer')),
            array('id' => 9, 'name'=>$this->getTranslator()->trans('Top full screen static', array(), 'Admin.Theme.Transformer')),
        );
	}

	public function install()
	{
        $res = parent::install() &&
            $this->installDB() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('displayBeforeBodyClosingTag') &&
            $this->registerHook('displayBanner');
        
        if ($res)
            foreach(Shop::getShops(false) as $shop)
                $res &= $this->sampleData($shop['id_shop']);
        $this->clearStNotificationCache();
        return $res;
	}
    public function installDB()
    {
        $return = (bool)Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_notification` (
                `id_st_notification` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `template` tinyint(3) unsigned NOT NULL DEFAULT 0,
                `location` tinyint(3) unsigned NOT NULL DEFAULT 0,
                `width` int(10) unsigned NOT NULL DEFAULT 0,
                `x_offset` smallint(6) signed DEFAULT 0,
                `y_offset` smallint(6) signed DEFAULT 0,
                `more_info_link` int(10) unsigned NOT NULL DEFAULT 0, 
                `x_button` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `show_box` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `delay` tinyint(3) unsigned NOT NULL DEFAULT 2,
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0, 
                `tb_padding` varchar(4) DEFAULT NULL,
                `lr_padding` varchar(4) DEFAULT NULL,
                `text_color` varchar(7) DEFAULT NULL,
                `link_hover_color` varchar(7) DEFAULT NULL,
                `text_bg` varchar(7) DEFAULT NULL,
                `bg_opacity` float(4,2) unsigned NOT NULL DEFAULT 0.8,
                `border_width` tinyint(3) unsigned NOT NULL DEFAULT 0,
                `border_color` varchar(7) DEFAULT NULL,
                `button_color` varchar(7) DEFAULT NULL,
                `button_hover_color` varchar(7) DEFAULT NULL,
                `button_bg` varchar(7) DEFAULT NULL,
                `button_hover_bg` varchar(7) DEFAULT NULL,
                `h_shadow` tinyint(3) signed NOT NULL DEFAULT 0,
                `v_shadow` tinyint(3) signed NOT NULL DEFAULT 0,
                `shadow_blur` tinyint(3) unsigned NOT NULL DEFAULT 0,
                `shadow_color` varchar(7) DEFAULT NULL,
                `shadow_opacity` float(4,2) unsigned NOT NULL DEFAULT 0.8,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `bg_img` varchar(255) DEFAULT NULL,
                PRIMARY KEY (`id_st_notification`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
        
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_notification_lang` (
                `id_st_notification` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `id_lang` int(10) unsigned NOT NULL,
                `accept_button` varchar(256) DEFAULT NULL,
                `more_info` varchar(256) DEFAULT NULL,
                `more_info_link_custom` varchar(512) DEFAULT NULL,
                `content` text,
                PRIMARY KEY (`id_st_notification`, `id_lang`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
        
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_notification_shop` (
                `id_st_notification` int(10) UNSIGNED NOT NULL,
                `id_shop` int(11) NOT NULL,      
                PRIMARY KEY (`id_st_notification`,`id_shop`),    
                KEY `id_shop` (`id_shop`)   
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
        
        return $return;
    }
    public function sampleData($id_shop)
    {
        $return = true;
        $samples = array(
            array(
                'template'      => 2,
                'location'      => 2,
                'active'        => 1,
                'accept_button' => 'Got it',
                'more_info'     => 'READ MORE',
                'width'         => 320,
                'show_box'      => 0,
                'delay'         => 2,
                'hide_on_mobile'=> 0,
                'content'       => '<h5 class="color_444 font-weight-normal" style="font-family: \'Fjalla One\';">This Website Uses Cookies?</h5>
<p class="mb-3">This message would not show out anymore if you click on the GOT IT or closing button.</p>',
                'tb_padding'    => 50,
                'lr_padding'    => 20,
                'shadow_color'  => '#000000',
                'bg_img'        => _MODULE_DIR_.$this->name.'/views/img/demo1cookiesbg.jpg',
                'bg_opacity'    => 1,
                'x_button'      => 1,
            )
        );
        
        foreach($samples as $k=>$sample)
        {
            $module = new StNotificationClass();
            foreach (Language::getLanguages(false) as $lang)
            {
                $module->accept_button[$lang['id_lang']] = $sample['accept_button'];
                $module->more_info[$lang['id_lang']] = $sample['more_info'];
				$module->content[$lang['id_lang']] = $sample['content'];
            }
            $module->template       = $sample['template'];
            $module->location       = $sample['location'];
            $module->active         = $sample['active'];
            $module->width          = $sample['width'];
            $module->show_box       = $sample['show_box'];
            $module->delay          = $sample['delay'];
            $module->hide_on_mobile = $sample['hide_on_mobile'];
            $module->tb_padding     = $sample['tb_padding'];
            $module->lr_padding     = $sample['lr_padding'];
            $module->shadow_color   = $sample['shadow_color'];
            $module->bg_img         = $sample['bg_img'];
            $module->bg_opacity     = $sample['bg_opacity'];
            $module->x_button       = $sample['x_button'];
            $module->position       = $k;
            $module->id_shop_list   = array((int)$id_shop);
            $return &= $module->add();
        }
        return $return;
    }

    public function uninstall()
    {
        $this->clearStNotificationCache();
        // Delete configuration
        return $this->uninstallDB() && parent::uninstall();
    }

    public function uninstallDB()
    {
        return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_notification`,`'._DB_PREFIX_.'st_notification_lang`,`'._DB_PREFIX_.'st_notification_shop`');
    }
    protected function stGetCacheId($key,$type='location',$name = null)
    {
        $cache_id = parent::getCacheId($name);
        return $cache_id.'_'.$key.'_'.$type;
    }
    private function clearStNotificationCache()
    {
        $this->_clearCache('*');
    }

    public function getContent()
    {
        $check_result = $this->_checkImageDir();
        $this->context->controller->addJS(($this->_path).'views/js/admin.js');
        $this->context->controller->addCSS($this->_path.'views/css/admin.css');
        $id_st_notification = (int)Tools::getValue('id_st_notification');
        if(Tools::getValue('act')=='delete_image' && $id_st_notification)
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $notification = new StNotificationClass($id_st_notification);
            $notification->bg_img = '';
            $result['r'] = $notification->save();
            die(json_encode($result));
        }
        if ((Tools::isSubmit('statusstnotification')))
        {
            $notification = new StNotificationClass((int)$id_st_notification);
            if($notification->id && $notification->toggleStatus())
            {
                $this->clearStNotificationCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if (isset($_POST['savestnotification']) || isset($_POST['savestnotificationAndStay']))
        {
            if ($id_st_notification)
                $notification = new StNotificationClass((int)$id_st_notification);
            else
                $notification = new StNotificationClass();
            
            $error = array();
            $notification->copyFromPost();
            
            $res = $this->stUploadImage('bg_img');
            if (count($res['error'])) {
                $error = array_merge($error, $res['error']);
            } elseif($res['image']) {
                $notification->bg_img = $res['image'];
            }            
            if (!count($error) && $notification->validateFields(false) && $notification->validateFieldsLang(false))
            {
                $shop_ids = $notification->getShopIds();
                $notification->clearShopIds();
                $id_shop_list = array();
                if($assos_shop = Tools::getValue('checkBoxShopAsso_st_notification')) {
                    foreach ($assos_shop as $id_shop => $row) {
                        $id_shop_list[] = $id_shop;
                    }
                }
                if (!$id_shop_list) {
                    $id_shop_list = array(Context::getContext()->shop->id);
                }
                $notification->id_shop_list = array_unique($id_shop_list);
                
                if($notification->save())
                {
                    $this->clearStNotificationCache();
                    if(isset($_POST['savestnotificationAndStay']))
                    {
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_notification='.$notification->id.'&conf='.($id_st_notification?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
                    }    
                    else
                        $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Settings', array(), 'Admin.Theme.Transformer').' '.($id_st_notification ? $this->getTranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('added', array(), 'Admin.Theme.Transformer')));
                }                    
                else {
                    $notification->restoreShopIds($shop_ids);
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during settings', array(), 'Admin.Theme.Transformer').' '.($id_st_notification ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
                }    
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        if (isset($_POST['savesettingstnotification']) || isset($_POST['savesettingstnotificationAndStay']))
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
                $this->clearStNotificationCache();
                if(isset($_POST['savesettingstnotificationAndStay']))
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&token='.Tools::getAdminTokenLite('AdminModules')); 
                else
                    $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Admin.Theme.Transformer'));
            }
        }
        if(Tools::isSubmit('addstnotification') || (Tools::isSubmit('updatestnotification') && $id_st_notification))
        {
            $helper = $this->initForm();
            return $this->_html.$helper->generateForm($this->fields_form);
        }
        else if (Tools::isSubmit('deletestnotification') && $id_st_notification)
        {
            $notification = new StNotificationClass($id_st_notification);
            $notification->delete();
            $this->clearStNotificationCache();
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        elseif (Tools::isSubmit('settingstnotification'))
		{
		    $this->initFieldsForm();
			$helper = $this->initSettingForm();
            
			return $this->_html.$helper->generateForm($this->fields_form);
		}
        else
        {
            $helper = $this->initList();
            return $this->_html.$helper->generateList(StNotificationClass::getAll((int)$this->context->language->id), $this->fields_list);
        }
    }
    
    public static function showApplyTo($value,$row)
    {
        return isset(self::$location[$value]) ? self::$location[$value]['name'] : '--';
    }
    
    protected function initList()
    {
        $this->fields_list = array(
            'id_st_notification' => array(
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
                'callback_object' => 'StNotification',
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
        $helper->identifier = 'id_st_notification';
        $helper->actions = array('edit', 'delete');
        $helper->show_toolbar = true;
        $helper->toolbar_btn['new'] =  array(
            'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstnotification&token='.Tools::getAdminTokenLite('AdminModules'),
            'desc' => $this->getTranslator()->trans('Add a block', array(), 'Modules.Stnotification.Admin'),
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
                'title' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
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
                        array(
                            'id' => 'template_2',
                            'value' => 2,
                            'label' => '<img src="'.$this->_path.'views/img/template_2.jpg" />',
                        ),
                    ),
                ),
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Display on:', array(), 'Admin.Theme.Transformer'),
					'name' => 'location',
					'options' => array(
						'query' => self::$location,
        				'id' => 'id',
        				'name' => 'name'
					),
                    'validation' => 'isUnsignedInt',
				),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'width',
                    'validation' => 'isUnsignedId',
                    'default_value' => 0,
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Set the value to 0 to make this block be full width.', array(), 'Modules.Stnotification.Admin'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('X offset:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'x_offset',
                    'validation' => 'isInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => array(
                        $this->getTranslator()->trans('Do not work for full width notifications.', array(), 'Modules.Stnotification.Admin'),
                        $this->getTranslator()->trans('Accept positive and negative numbers.', array(), 'Admin.Theme.Transformer'),
                        )
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Y offset:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'y_offset',
                    'validation' => 'isInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Accept positive and negative numbers.', array(), 'Admin.Theme.Transformer'),
                ),   
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('"Got it" button text:', array(), 'Modules.Stnotification.Admin'),
					'name' => 'accept_button',
					'lang' => true,
					'size' => 64,
                    // 'default_value' => $this->getTranslator()->trans('Got it', array(), 'Modules.Stnotification.Admin'), the default value would be save if the field is empty
                    'validation' => 'isGenericName',
                    'desc' => array(
                        $this->getTranslator()->trans('Clicking on the button would close the notification.', array(), 'Modules.Stnotification.Admin'),
                        $this->getTranslator()->trans('If you do not fill in this filed, the "Got it" button would not show out.', array(), 'Modules.Stnotification.Admin'),
                        ),
				),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Read more button text:', array(), 'Modules.Stnotification.Admin'),
					'name' => 'more_info',
					'lang' => true,
					'size' => 64,
                    // 'default_value' => $this->getTranslator()->trans('Read more', array(), 'Modules.Stnotification.Admin'),
                    'validation' => 'isGenericName',
                    'desc' => $this->getTranslator()->trans('If you do not fill in this filed or link fields below, the more info button would not show out.', array(), 'Modules.Stnotification.Admin'),
				),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('More info link:', array(), 'Modules.Stnotification.Admin'),
                    'name' => 'more_info_link',
                    'options' => array(
                        'query' => $this->getCMSOptions(),
                        'id' => 'id',
                        'name' => 'name',
                        'default_value' => 0,
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer'),
                        ),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Custom more info link:', array(), 'Modules.Stnotification.Admin'),
                    'name' => 'more_info_link_custom',
                    'lang' => true,
                    'size' => 64,
                    'validation' => 'isAnything',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display a X close button on the top right corner:', array(), 'Modules.Stnotification.Admin'),
                    'name' => 'x_button',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'x_button_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'x_button_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to show this notification:', array(), 'Modules.Stnotification.Admin'),
                    'name' => 'show_box',
                    'default_value' => 0,
                    'is_bool' => true,
                    'validation' => 'isUnsignedInt',
                    'values' => array(
                        array(
                            'id' => 'show_box_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('At all time, do not show again if customers close it by clicking on the close buttons.', array(), 'Modules.Stnotification.Admin')),
                        array(
                            'id' => 'show_box_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('At all time', array(), 'Modules.Stnotification.Admin')),
                        array(
                            'id' => 'show_box_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('First time only', array(), 'Modules.Stnotification.Admin')),
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Delay:', array(), 'Modules.Stnotification.Admin'),
                    'name' => 'delay',
                    'default_value' => 2,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 's',
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->getTranslator()->trans('Content:', array(), 'Admin.Theme.Transformer'),
                    'lang' => true,
                    'name' => 'content',
                    'cols' => 40,
                    'rows' => 10,
                    'autoload_rte' => true,
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Visibility:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'hide_on_mobile',
                    'default_value' => 0,
                    'validation' => 'isUnsignedInt',
                    'values' => array(
                        array(
                            'id' => 'hide_on_mobile_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
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
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
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

        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Other settings', array(), 'Modules.Stnotification.Admin'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top and bottom paddings:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'tb_padding',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer').' 10px',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Left and right paddings:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'lr_padding',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer').' 10px',
                ),   
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'link_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ), 
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Background opacity:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_opacity',
                    'validation' => 'isFloat',
                    'default_value' => 1,
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('From 0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
                ),
                'bg_img' => array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Upload background image:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_img',
                    'desc' => '',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Border size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'border_width',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'default_value' => 0,
                    'class' => 'fixed-width-lg',
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Broder color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),  

                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button text color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'button_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button text hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'button_hover_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'button_bg',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button background hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'button_hover_bg',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Shadow color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'shadow_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('H-shadow:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'h_shadow',
                    'validation' => 'isInt',
                    'default_value' => 0,
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('The position of the horizontal shadow. Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('V-shadow:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'v_shadow',
                    'default_value' => 0,
                    'validation' => 'isInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('The position of the vertical shadow. Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('The blur distance of shadow:', array(), 'Modules.Stnotification.Admin'),
                    'name' => 'shadow_blur',
                    'validation' => 'isUnsignedInt',
                    'default_value' => 4,
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Shadow opacity:', array(), 'Modules.Stnotification.Admin'),
                    'name' => 'shadow_opacity',
                    'validation' => 'isFloat',
                    'default_value' => '0.8',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
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
            $this->fields_form[1]['form']['input'][] = array(
                'type' => 'shop',
                'label' => $this->getTranslator()->trans('Shop association:', array(), 'Admin.Theme.Transformer'),
                'name' => 'checkBoxShopAsso',
            );
        }
        $this->fields_form[0]['form']['input'][] =
        $this->fields_form[1]['form']['input'][] = array(
            'type' => 'html',
            'id' => 'a_cancel',
            'label' => '',
            'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
        );
        
        $id_st_notification = (int)Tools::getValue('id_st_notification');
        $notification = new StNotificationClass($id_st_notification);
        
        if ($notification->id && $notification->bg_img) {
            StNotificationClass::fetchMediaServer($notification->bg_img);
            $this->fields_form[1]['form']['input']['bg_img']['image'] = '<img class="st_thumb_nail" src="'.$notification->bg_img.'" /><p>
            <a class="btn btn-default st_delete_image" data-id='.$notification->id.' href="javascript:;">
            <i class="icon-trash"></i> Delete</a></p>
            ';
        }
        
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->id = (int)$notification->id;
        $helper->module = $this;
        $helper->table =  'st_notification';
        $helper->identifier = 'id_st_notification';
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

        $helper->submit_action = 'savestnotification';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($notification),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );
        
        $helper->title = $this->displayName;
        
        return $helper;
    }
    
    private function getCMSOptions()
	{
	   $cms_arr = array();
	   foreach ($this->getCMSPages() as $page)
            $cms_arr[] = array('id'=>$page['id_cms'],'name'=>$page['meta_title']);
        return $cms_arr;
	}

	private function getCMSPages()
	{
		$id_shop = (int)Context::getContext()->shop->id;
		$id_lang = (int)Context::getContext()->language->id;

		$sql = 'SELECT c.`id_cms`, cl.`meta_title`, cl.`link_rewrite`
			FROM `'._DB_PREFIX_.'cms` c
			INNER JOIN `'._DB_PREFIX_.'cms_shop` cs
			ON (c.`id_cms` = cs.`id_cms`)
			INNER JOIN `'._DB_PREFIX_.'cms_lang` cl
			ON (c.`id_cms` = cl.`id_cms`)
			WHERE cs.`id_shop` = '.(int)$id_shop.'
            AND cl.`id_shop` = '.(int)$id_shop.' 
			AND cl.`id_lang` = '.(int)$id_lang.'
			AND c.`active` = 1
			ORDER BY `position`';

		return Db::getInstance()->executeS($sql);
	}
    
    public function hookDisplayHeader($params)
    {
        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $custom_css = '';
            $options = StNotificationClass::getOptions();
            if(is_array($options) && count($options))
                foreach($options as $v)    
                {
                    $prefix = '#st_notification_'.$v['id_st_notification'];
                    if($v['width'])
                    {
                        $custom_css .= $prefix.'{max-width:'.$v['width'].'px;}';
                        switch ($v['location']) {
                            case 0:
                            case 3:
                            case 6:
                                $custom_css .= $prefix.'{margin-left:-'.Tools::ps_round($v['width']/2).'px;}';
                                if($v['x_offset']!=0)
                                    $custom_css .= $prefix.'{margin-left:'.($v['x_offset']-Tools::ps_round($v['width']/2)).'px;}';
                                break;
                            case 1:
                            case 4:
                            case 7:
                                if($v['x_offset'])
                                    $custom_css .= $prefix.'{right:'.$v['x_offset'].'px;}';
                                break;
                            case 2:
                            case 5:
                            case 8:
                                if($v['x_offset'])
                                    $custom_css .= $prefix.'{left:'.$v['x_offset'].'px;}';
                                break;
                        }
                    }
                    if($v['y_offset']!=0)
                    {
                        switch ($v['location']) {
                            case 0:
                            case 1:
                            case 2:
                                $custom_css .= $prefix.'{bottom:'.$v['y_offset'].'px;}';
                                break;
                            case 3:
                            case 4:
                            case 5:
                                $custom_css .= $prefix.'{margin-top:'.$v['y_offset'].'px;}';
                                break;
                            case 6:
                            case 7:
                            case 8:
                                $custom_css .= $prefix.'{top:'.$v['y_offset'].'px;}';
                                break;
                        }
                        
                    }
                    if($v['tb_padding'] || $v['tb_padding']==='0' || $v['tb_padding']===0)
                        $custom_css .= $prefix.' {padding-top:'.$v['tb_padding'].'px;padding-bottom:'.$v['tb_padding'].'px;}';
                    if($v['lr_padding'] || $v['lr_padding']==='0' || $v['lr_padding']===0)
                        $custom_css .= $prefix.' {padding-left:'.$v['lr_padding'].'px;padding-right:'.$v['lr_padding'].'px;}';
                    if($v['text_color'])
                    {
                        $custom_css .= $prefix.' .style_content, '.$prefix.' .style_content a{color:'.$v['text_color'].';}';
                        $custom_css .= $prefix.' .st_notification_close_inline{color:'.$v['text_color'].';}';
                    }
                    if($v['link_hover_color'])
                        $custom_css .= $prefix.' .style_content a:hover{color:'.$v['link_hover_color'].';}';
                    if($v['text_bg'] && Validate::isColor($v['text_bg'])){
                        $v['bg_opacity'] = (float)$v['bg_opacity'];
                        $bg_opacity = ($v['bg_opacity']>1 || $v['bg_opacity']<0) ? 1 : $v['bg_opacity'];
                        $rgb_color = self::hex2rgb($v['text_bg']);
                        if(is_array($rgb_color))
                            $custom_css .= $prefix.' {background:rgba('.$rgb_color[0].','.$rgb_color[1].','.$rgb_color[2].','.$bg_opacity.');}';
                    }
                    if($v['bg_img']){
                            StNotificationClass::fetchMediaServer($v['bg_img']);
                            $custom_css .= $prefix.' {background-image:url('.$v['bg_img'].');background-repeat: no-repeat; background-size: cover; background-position: center top;}';
                    }
                    if($v['border_width'])
                        $custom_css .= $prefix.' {border-width:'.(int)$v['border_width'].'px;border-style: solid;}';
                    if($v['border_color'])
                        $custom_css .= $prefix.' {border-color:'.$v['border_color'].';}';

                    if($v['button_color'])
                        $custom_css .= $prefix.' .style_content .notification_buttons .btn{color:'.$v['button_color'].';}';
                    if($v['button_color'] && !$v['button_bg'])
                        $custom_css .= $prefix.' .style_content .notification_buttons .btn{border-color:'.$v['button_color'].';}';
                    if($v['button_bg'])
                        $custom_css .= $prefix.' .style_content .notification_buttons .btn{background-color:'.$v['button_bg'].';border-color:'.$v['button_bg'].';}';
                    if($v['button_hover_color'])
                        $custom_css .= $prefix.' .style_content .notification_buttons .btn:hover{color:'.$v['button_hover_color'].';}';
                    if ($v['button_hover_bg']) {
                        $custom_css .= $prefix.' .style_content .notification_buttons .btn:hover{border-color:'.$v['button_hover_bg'].';}';
                        $btn_fill_animation = $v['button_bg'] ? 0 : (int)Configuration::get('STSN_BTN_FILL_ANIMATION');
                        if($btn_fill_animation)
                            $custom_css .= $prefix.' .style_content .notification_buttons .btn{-webkit-box-shadow: inset 0 0 0 0 '.$v['button_hover_bg'].'; box-shadow: inset 0 0 0 0 '.$v['button_hover_bg'].';}';
                        switch ($btn_fill_animation) {
                            case 1:
                                $custom_css .= $prefix.' .style_content .notification_buttons .btn:hover{-webkit-box-shadow: inset 0 100px 0 0 '.$v['button_hover_bg'].'; box-shadow: inset 0 100px 0 0 '.$v['button_hover_bg'].';background-color:transparent;}';
                                break;
                            case 2:
                                $custom_css .= $prefix.' .style_content .notification_buttons .btn:hover{-webkit-box-shadow: inset 0 -100px 0 0 '.$v['button_hover_bg'].'; box-shadow: inset 0 -100px 0 0 '.$v['button_hover_bg'].';background-color:transparent;}';
                                break;
                            case 3:
                                $custom_css .= $prefix.' .style_content .notification_buttons .btn:hover{-webkit-box-shadow: inset 300px 0 0 0 '.$v['button_hover_bg'].'; box-shadow: inset 300px 0 0 0 '.$v['button_hover_bg'].';background-color:transparent;}';
                                break;
                            case 4:
                                $custom_css .= $prefix.' .style_content .notification_buttons .btn:hover{-webkit-box-shadow: inset -300px 0 0 0 '.$v['button_hover_bg'].'; box-shadow: inset -300px 0 0 0 '.$v['button_hover_bg'].';background-color:transparent;}';
                                break;
                            default:
                                $custom_css .= $prefix.' .style_content .notification_buttons .btn:hover{-webkit-box-shadow: none; box-shadow: none;background-color: '.$v['button_hover_bg'].';}';
                                break;
                        }
                    }

                    if($v['shadow_color'] && Validate::isColor($v['shadow_color']))
                    {
                        $shadow_color_arr = self::hex2rgb($v['shadow_color']);
                        if(is_array($shadow_color_arr))
                        {
                            if($v['shadow_opacity']<0 || $v['shadow_opacity']>1)
                                $v['shadow_opacity'] = 1;

                            $pro_shadow_css = (int)$v['h_shadow'].'px '.(int)$v['v_shadow'].'px '.(int)$v['shadow_blur'].'px rgba('.$shadow_color_arr[0].','.$shadow_color_arr[1].','.$shadow_color_arr[2].','.$v['shadow_opacity'].')';
                            $custom_css .= $prefix.'{-webkit-box-shadow: '.$pro_shadow_css .'; -moz-box-shadow: '.$pro_shadow_css .'; box-shadow: '.$pro_shadow_css .'; }';
                        }
                    }
                }
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
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
    
    public function hookActionShopDataDuplication($params)
    {
        return $this->sampleData($params['new_id_shop']);
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
            $positions = Tools::getValue('id_st_notification');
            $msg = '';
            if (is_array($positions))
                foreach ($positions as $position => $value)
                {
                    $pos = explode('_', $value);

                    if ((isset($pos[2])) && ((int)$pos[2] === $id))
                    {
                        if ($object = new StNotificationClass((int)$pos[2]))
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
    
    protected function _checkImageDir()
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

        if (!is_writable(_PS_UPLOAD_DIR_)) {
            $result = false;
            $this->_html .= $this->displayError('"'._PS_UPLOAD_DIR_.$this->name.'" '.$this->getTranslator()->trans('directory isn\'t writable.', array(), 'Admin.Theme.Transformer'));
        }
        return $result;
    }
    
    public function renderWidget($hookName = null, array $configuration = [])
    {
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));

        return $this->fetch($this->templateFile);
    }
    
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $notification_array = StNotificationClass::getNotification($this->context->language->id);

        if(!is_array($notification_array) || !count($notification_array))
            $notification_array = array();

        foreach($notification_array as $k => &$v)
        {
            if(Tools::strtolower($hookName) == 'displaybanner' && $v['location']!=9)
                unset($notification_array[$k]);
            if(Tools::strtolower($hookName) != 'displaybanner' && $v['location']==9)
                unset($notification_array[$k]);

            if(isset($_COOKIE['st_notification_'.$v['id_st_notification']]) && $_COOKIE['st_notification_'.$v['id_st_notification']] == $v['show_box'])
            {
                unset($notification_array[$k]);
                continue;
            }
            if($v['more_info_link'])
            {
                $cms = new CMS((int)$v['more_info_link']);
                if(Validate::isLoadedObject( $cms))
                    $v['more_info_link'] = $this->context->link->getCMSLink($cms);
            }
        }
        return array(
            'notification_array' => $notification_array
        );
    }
}