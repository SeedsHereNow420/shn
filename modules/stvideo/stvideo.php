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

require_once _PS_MODULE_DIR_.'stvideo/classes/StVideoClass.php';

class StVideo extends Module implements WidgetInterface
{
    private $templateFile;
    public  $fields_list;
    public  $fields_value;
    public  $fields_form;
	private $_html = '';
    private $_prefix_st = 'ST_VIDEO_';
    private $_prefix_stsn = 'STSN_';
    public $validation_errors = array();
    private static $location = array();
    private static $ratio = array();
    private static $video_position = array();
    private static $size_chart_position = array();
    private $spacer_size = '5';

	public function __construct()
	{
		$this->name          = 'stvideo';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap     = true;

		parent::__construct();
              
		$this->displayName   = $this->getTranSlator()->trans('Product video and size chart', array(), 'Modules.Stvideo.Admin');
		$this->description   = $this->getTranSlator()->trans('Show youtube, vimeo and size chart on your product page.', array(), 'Modules.Stvideo.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->templateFile = 'module:stvideo/views/templates/hook/stvideo.tpl';
        self::$location = array(
            0 => array(
                'id' => 'location_0',
                'value' => 0,
                'label' => $this->getTranslator()->trans('All products', array(), 'Admin.Theme.Transformer')
            ),
            1 => array(
                'id' => 'location_1',
                'value' => 1,
                'label' => $this->getTranslator()->trans('Specify products', array(), 'Admin.Theme.Transformer')
            ),
            2 => array(
                'id' => 'location_2',
                'value' => 2,
                'label' => $this->getTranslator()->trans('By category', array(), 'Admin.Theme.Transformer')
            ),
            3 => array(
                'id' => 'location_3',
                'value' => 3,
                'label' => $this->getTranslator()->trans('By manufacturer', array(), 'Admin.Theme.Transformer')
            ),
        );
        self::$ratio = array(
            1 => array(
                'id' => 1,
                'name' => $this->getTranslator()->trans('16:9', array(), 'Modules.Stvideo.Admin')
            ),
            2 => array(
                'id' => 2,
                'name' => $this->getTranslator()->trans('4:3', array(), 'Modules.Stvideo.Admin')
            ),
        );
        self::$video_position = array(
            1 => array(
                'id' => 1,
                'name' => $this->getTranslator()->trans('Top left of the main product image', array(), 'Modules.Stvideo.Admin')
            ),
            2 => array(
                'id' => 2,
                'name' => $this->getTranslator()->trans('Top center of the main product image', array(), 'Modules.Stvideo.Admin')
            ),
            3 => array(
                'id' => 3,
                'name' => $this->getTranslator()->trans('Top right of the main product image', array(), 'Modules.Stvideo.Admin')
            ),
            4 => array(
                'id' => 4,
                'name' => $this->getTranslator()->trans('Center left of the main product image', array(), 'Modules.Stvideo.Admin')
            ),
            5 => array(
                'id' => 5,
                'name' => $this->getTranslator()->trans('Center center of the main product image', array(), 'Modules.Stvideo.Admin')
            ),
            6 => array(
                'id' => 6,
                'name' => $this->getTranslator()->trans('Center right of the main product image', array(), 'Modules.Stvideo.Admin')
            ),
            7 => array(
                'id' => 7,
                'name' => $this->getTranslator()->trans('Bottom left of the main product image', array(), 'Modules.Stvideo.Admin')
            ),
            8 => array(
                'id' => 8,
                'name' => $this->getTranslator()->trans('Bottom center of the main product image', array(), 'Modules.Stvideo.Admin')
            ),
            9 => array(
                'id' => 9,
                'name' => $this->getTranslator()->trans('Bottom right of the main product image', array(), 'Modules.Stvideo.Admin')
            ),
        );  

        self::$size_chart_position = array(
            10 => array(
                'id' => 10,
                'name' => $this->getTranslator()->trans('Right side of product name', array(), 'Modules.Stvideo.Admin')
            ),
            11 => array(
                'id' => 11,
                'name' => $this->getTranslator()->trans('Right side of price', array(), 'Modules.Stvideo.Admin')
            ),
            12 => array(
                'id' => 12,
                'name' => $this->getTranslator()->trans('Right side of add to cart button', array(), 'Modules.Stvideo.Admin')
            ),
            13 => array(
                'id' => 13,
                'name' => $this->getTranslator()->trans('Product left column', array(), 'Modules.Stvideo.Admin')
            ),
            14 => array(
                'id' => 14,
                'name' => $this->getTranslator()->trans('Product center column', array(), 'Modules.Stvideo.Admin')
            ),
            15 => array(
                'id' => 15,
                'name' => $this->getTranslator()->trans('Product right column', array(), 'Modules.Stvideo.Admin')
            ),
        );  

	}
    
	public function install()
	{
		$res = parent::install() &&
			$this->installDb() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('displayProductExtraContent') &&
            $this->registerHook('displayAdminProductsExtra') &&
			$this->registerHook('actionObjectCategoryDeleteAfter') &&
            $this->registerHook('actionObjectManufacturerDeleteAfter') &&
            $this->registerHook('actionShopDataDuplication') &&       
            Configuration::updateValue($this->_prefix_st.'TEXT_COLOR', '') &&
            Configuration::updateValue($this->_prefix_st.'BG_COLOR', '') &&
            Configuration::updateValue($this->_prefix_st.'BG_OPACITY', 0.8) &&
            Configuration::updateValue($this->_prefix_st.'ICON_WIDTH', 0) &&
            Configuration::updateValue($this->_prefix_st.'ICON_HEIGHT', 0) &&
            Configuration::updateValue($this->_prefix_st.'VIDEO_WIDTH', 0) &&
            Configuration::updateValue($this->_prefix_st.'VIDEO_HEIGHT', 0);
        if ($res)
            foreach(Shop::getShops(false) as $shop)
                $res &= $this->sampleData($shop['id_shop']);
        $this->clearCache();
        return $res;
	}
	
	/**
	 * Creates tables
	 */
	public function installDb()
	{
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_video` (
				`id_st_video` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `type` tinyint(1) unsigned NOT NULL DEFAULT 0,
				`url` varchar(512) DEFAULT NULL,
                `ratio` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `location` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `id_category` int(10) unsigned NOT NULL DEFAULT 0,
                `id_manufacturer` int(10) unsigned NOT NULL DEFAULT 0,
                `id_products` varchar(512) DEFAULT NULL,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `video_position` tinyint(2) unsigned NOT NULL DEFAULT 1,
				PRIMARY KEY (`id_st_video`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_video_lang` (
				`id_st_video` int(10) UNSIGNED NOT NULL,
				`id_lang` int(10) unsigned NOT NULL ,
    			`title` varchar(255) DEFAULT NULL,
                `content` text DEFAULT NULL,
				PRIMARY KEY (`id_st_video`, `id_lang`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		$return &= (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_video_shop` (
				`id_st_video` int(10) UNSIGNED NOT NULL,
                `id_shop` int(11) NOT NULL,      
                PRIMARY KEY (`id_st_video`,`id_shop`),    
                KEY `id_shop` (`id_shop`)   
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}
    public function sampleData($id_shop)
    {
        $return = true;
        $samples = array(
            array(
                'type'              => 1,
                'location'          => 0,
                'active'            => 1,
                'video_position'    => 11,
                'title'             => 'Size chart',
                'content'           => '<h6 class="page_heading">Women\'s clothing size</h6>
                    <table class="table table-striped">
                    <thead>
                    <tr><th>Size</th><th>XS</th><th>S</th><th>M</th><th>L</th></tr>
                    </thead>
                    <tbody>
                    <tr><th scope="row">Euro</th>
                    <td>32/34</td>
                    <td>36</td>
                    <td>38</td>
                    <td>40</td>
                    </tr>
                    <tr><th scope="row">USA</th>
                    <td>0/2</td>
                    <td>4</td>
                    <td>6</td>
                    <td>8</td>
                    </tr>
                    <tr><th scope="row">Bust(in)</th>
                    <td>31-32</td>
                    <td>33</td>
                    <td>34</td>
                    <td>36</td>
                    </tr>
                    <tr><th scope="row">Bust(cm)</th>
                    <td>80.5-82.5</td>
                    <td>84.5</td>
                    <td>87</td>
                    <td>92</td>
                    </tr>
                    <tr><th scope="row">Waist(in)</th>
                    <td>24-25</td>
                    <td>26</td>
                    <td>27</td>
                    <td>29</td>
                    </tr>
                    <tr><th scope="row">Waist(cm)</th>
                    <td>62.5-64.5</td>
                    <td>66.5</td>
                    <td>69</td>
                    <td>74</td>
                    </tr>
                    <tr><th scope="row">Hips(in)</th>
                    <td>34-35</td>
                    <td>36</td>
                    <td>37</td>
                    <td>39</td>
                    </tr>
                    <tr><th scope="row">Hips(cm)</th>
                    <td>87.5-89.5</td>
                    <td>91.5</td>
                    <td>94</td>
                    <td>99</td>
                    </tr>
                    </tbody>
                    </table>
                    <div class="mar_b6 font-weight-bold">How To Measure Your Bust</div>
                    <p>With your arms relaxed at your sides, measure around the fullest part of your chest.</p>
                    <div class="mar_b6 font-weight-bold">How To Measure Your Waist</div>
                    <p>Measure around the narrowest part of your natural waist, generally around the belly button. To ensure a comfortable fit, keep one finger between the measuring tape and your body.</p>
                ',
            )
        );
        
        foreach($samples as $k=>$sample)
        {
            $module = new StVideoClass();
            foreach (Language::getLanguages(false) as $lang)
            {
                $module->title[$lang['id_lang']] = $sample['title'];
				$module->content[$lang['id_lang']] = $sample['content'];
            }
            $module->type           = $sample['type'];
            $module->location       = $sample['location'];
            $module->video_position = $sample['video_position'];
            $module->active         = $sample['active'];
            $module->id_shop_list   = array((int)$id_shop);
            $return &= $module->add();
        }
        return $return;
    }
	public function uninstall()
	{
	    $this->clearCache();
		// Delete configuration
		return $this->uninstallDb() &&
			parent::uninstall();
	}

	/**
	 * deletes tables
	 */
	public function uninstallDb()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_video`,`'._DB_PREFIX_.'st_video_lang`,`'._DB_PREFIX_.'st_video_shop`');
	}

	public function getContent()
	{        
		$this->context->controller->addJS(($this->_path).'views/js/admin.js');
        
        $id_st_video = (int)Tools::getValue('id_st_video');
        if (Tools::getValue('ajax') && Tools::getValue('act') == 'changeProductVideo' ) {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
	       if ($id_product=Tools::getValue('id_product')) {
	           $id_st_video = StVideoClass::changeProductVideo($id_product, Tools::getValue('url'), 0);
               if ((int)$id_st_video > 0) {
                    $result = array(
                        'r' => true,
                        'm' => '',
                        'd' => (int)$id_st_video,
                    );
               }
	       }
           die(json_encode($result));
	    }
	    if ((Tools::isSubmit('status'.$this->name)))
        {
            $video = new StVideoClass((int)$id_st_video);
            if($video->id && $video->toggleStatus())
            {
                $this->clearCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('an error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
		if (isset($_POST['save'.$this->name]) || isset($_POST['save'.$this->name.'AndStay']))
		{
            if ($id_st_video)
				$video = new StVideoClass((int)$id_st_video);
			else
				$video = new StVideoClass();
            
            $error = array();
            $id_products = $video->id_products;
            $video->copyFromPost();
            $video->id_category = 0;
            $video->id_manufacturer = 0;
            $video->id_products = '';
            switch($video->location) {
                case 1:
                    if ($id_product = Tools::getValue('id_product')) {
                        $id_product_arr = array();
                        foreach($id_product AS $id) {
                            if (!StVideoClass::getByIdProduct($id, 0)) {
                                $id_product_arr[] = $id;
                            }
                        }
                        if ($id_products && $id_st_video) {
                            $id_product_arr = array_merge($id_product_arr, explode(',', trim($id_products, ',')));
                        }
                        if ($id_product_arr = array_unique($id_product_arr)) {
                            $video->id_products = ','.implode(',', $id_product_arr).',';
                        }
                    }
                    break;
                case 2:
                    $video->id_category = (int)Tools::getValue('id_category');
                    break;
                case 3:
                    $video->id_manufacturer = (int)Tools::getValue('id_manufacturer');
                    break;
            }
            
			if (!count($error) && $video->validateFields(false) && $video->validateFieldsLang(false))
            {
                $shop_ids = $video->getShopIds();
                $video->clearShopIds();
                $id_shop_list = array();
                if($assos_shop = Tools::getValue('checkBoxShopAsso_st_video')) {
                    foreach ($assos_shop as $id_shop => $row) {
                        $id_shop_list[] = $id_shop;
                    }
                }
                if (!$id_shop_list) {
                    $id_shop_list = array(Context::getContext()->shop->id);
                }
                $video->id_shop_list = array_unique($id_shop_list);
                if($video->save())
                {
                    $this->clearCache();
                    if(isset($_POST['save'.$this->name.'AndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_video='.$video->id.'&conf='.($id_st_video?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));  
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else {
                    $video->restoreShopIds($shop_ids);
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during while', array(), 'Modules.Stvideo.Admin').' '.($id_st_video ? $this->gettranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
                }    
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        if (isset($_POST['savesetting'.$this->name]) || isset($_POST['savesetting'.$this->name.'AndStay']))
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
	            $this->clearCache();
                if(isset($_POST['savesetting'.$this->name.'AndStay']))
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&setting'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                else
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
        }
		if(Tools::isSubmit('add'.$this->name) || (Tools::isSubmit('update'.$this->name) && $id_st_video))
        {
            $helper = $this->initForm();
            return $this->_html.$helper->generateForm($this->fields_form);
        }
        elseif(Tools::isSubmit('setting'.$this->name))
        {
            $helper = $this->initSettingForm();
            return $this->_html.$helper->generateForm($this->fields_form);
        }
        elseif (Tools::isSubmit('delete'.$this->name) && $id_st_video)
		{
			$video = new StVideoClass($id_st_video);
            $video->delete();
            $this->clearCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else
		{
			$helper = $this->initVideoList();
			$this->_html .= $helper->generateList(StVideoClass::getAll(0), $this->fields_list);
            $helper = $this->initSizeChartList();
			return $this->_html.$helper->generateList(StVideoClass::getAll(1), $this->fields_list);
		}
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
	protected function initSettingForm()
	{
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Setting', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Icon color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'text_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Icon background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon bacground opacity:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_opacity',
                    'validation' => 'isFloat',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'icon_width',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon height:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'icon_height',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                ),
                /*array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Video width:', array(), 'Modules.Stvideo.Admin'),
                    'name' => 'video_width',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Video popup window width.', array(), 'Modules.Stvideo.Admin'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Video height:', array(), 'Modules.Stvideo.Admin'),
                    'name' => 'video_height',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Video popup window height.', array(), 'Modules.Stvideo.Admin'),
                ),*/
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
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->submit_action = 'savesetting'.$this->name;
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		
		return $helper;
	}
    
    protected function initForm()
	{
        $id_st_video = (int)Tools::getValue('id_st_video');
		$video = new StVideoClass($id_st_video);
        $type = $video->id ? $video->type : (int)Tools::getValue('type');

		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Setting', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
                    'type' => 'hidden',
                    'name' => 'type',
                    'default_value' => $type,
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Show on:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'location',
                    'default_value' => 0,
                    'values' => self::$location,
                ),
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Select a category', array(), 'Admin.Theme.Transformer'),
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
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Select a manufacturer', array(), 'Admin.Theme.Transformer'),
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
					'label' => $this->getTranslator()->trans('Specific products:', array(), 'Modules.Stvideo.Admin'),
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
                array(
                    'type' => 'radio',
                    'label' => $this->getTranSlator()->trans('Visibility:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'hide_on_mobile',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'hide_on_mobile_0',
                            'value' => 0,
                            'label' => $this->getTranSlator()->trans('Visible', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_1',
                            'value' => 1,
                            'label' => $this->getTranSlator()->trans('Hide on mobile (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_2',
                            'value' => 2,
                            'label' => $this->getTranSlator()->trans('Hide on PC (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
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
        
        if ($type == 0) {
            $array = array(
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('URL:', array(), 'Admin.Theme.Transformer'),
					'name' => 'url',
                    'required' => true,
                    'class' => 'fixed-width-xxl',
				),
                /*array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Video ratio', array(), 'Modules.Stvideo.Admin'),
					'name' => 'ratio',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => self::$ratio,
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('select ratio', array(), 'Modules.Stvideo.Admin')
						)
					),
				),*/
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
                    'name' => 'video_position',
                    'class' => 'fixed-width-xxl',
                    'validation' => 'isUnsignedInt',
                    'default_value' => 9,
                    'options' => array(
                        'query' => array_merge(self::$video_position, self::$size_chart_position),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                ),
            );
            $this->fields_form[0]['form']['input'] = array_merge($array, $this->fields_form[0]['form']['input']);
        } elseif ($type == 1) {
            $array = array(
                array(
					'type' => 'text',
                    'label' => $this->getTranslator()->trans('Title:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'title',
                    'lang' => true,
                    'class' => 'fixed-width-xxl',
                    'required' => true,
				),
                array(
					'type' => 'textarea',
					'label' => $this->getTranslator()->trans('Content:', array(), 'Admin.Theme.Transformer'),
					'lang' => true,
					'name' => 'content',
					'cols' => 40,
					'rows' => 10,
					'autoload_rte' => true,
                    'required' => true,
				),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
                    'name' => 'video_position',
                    'class' => 'fixed-width-xxl',
                    'validation' => 'isUnsignedInt',
                    'default_value' => 10,
                    'options' => array(
                        'query' => self::$size_chart_position,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                ),
            );
            $this->fields_form[0]['form']['input'] = array_merge($array, $this->fields_form[0]['form']['input']);
        }
        
        $products_html = '';
        foreach(explode(',', trim($video->id_products, ',')) AS $id_product)
        {
            if (!(int)$id_product) {
                continue;
            }
            $product = new Product((int)$id_product, false, Context::getContext()->language->id);
            $products_html .= '<li>'.$product->name.'['.$product->reference.']
            <a href="javascript:;" class="del_product"><img src="../img/admin/delete.gif" /></a>
            <input type="hidden" name="id_product[]" value="'.$id_product.'" /></li>';
        }
        
        $this->fields_form[0]['form']['input']['products']['desc'] = $this->getTranslator()->trans('Type product name to add prodcuts:', array(), 'Modules.Stvideo.Admin').'<br/>'.$this->getTranslator()->trans('Current products', array(), 'Admin.Theme.Transformer')
                .': <ul id="curr_products">'.$products_html.'</ul>';
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->id = $video->id;
        $helper->table = 'st_video';
		$helper->identifier = 'id_st_video';
		$helper->submit_action = 'save'.$this->name;
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($video,"fields_form"),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		
		return $helper;
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
                    $product = new Product((int)$id_product, $context->language->id, $context->shop->id);
                    $html .= '<li>'.$product->name.'</li>';
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
    public static function displayContent($value, $row)
    {       
        return Tools::truncateString(strip_tags(stripslashes($value)), 80);
    }
	protected function initSizeChartList()
	{
	    $type = 1;
		$this->fields_list = array(
			'id_st_video' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
            'title' => array(
				'title' => $this->getTranslator()->trans('Title', array(), 'Admin.Theme.Transformer'),
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
				'callback_object' => 'StVideo',
                'search' => false,
                'orderby' => false
			),
            'content' => array(
				'title' => $this->getTranslator()->trans('Content', array(), 'Admin.Theme.Transformer'),
				'type' => 'text',
				'callback' => 'displayContent',
				'callback_object' => 'StVideo',
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
		$helper->identifier = 'id_st_video';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&type='.$type.'&configure='.$this->name.'&add'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add size chart', array(), 'Modules.Stvideo.Admin')
		);
        /*$helper->toolbar_btn['edit'] =  array(
			'href' => AdminController::$currentIndex.'&type='.$type.'&configure='.$this->name.'&setting'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Setting', array(), 'Admin.Theme.Transformer')
		);*/
		$helper->title = $this->getTranslator()->trans('Size charts list', array(), 'Modules.Stvideo.Admin');
		$helper->table = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    protected function initVideoList()
	{
	    $type = 0;
		$this->fields_list = array(
			'id_st_video' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
            'url' => array(
				'title' => $this->getTranslator()->trans('Video url', array(), 'Modules.Stvideo.Admin'),
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
				'callback_object' => 'StVideo',
                'search' => false,
                'orderby' => false
			),
            'id_category' => array(
				'title' => $this->getTranslator()->trans('Content', array(), 'Admin.Theme.Transformer'),
				'type' => 'text',
				'callback' => 'showContent',
				'callback_object' => 'StVideo',
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
		$helper->identifier = 'id_st_video';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&type='.$type.'&configure='.$this->name.'&add'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add video', array(), 'Modules.Stvideo.Admin')
		);
        $helper->toolbar_btn['edit'] =  array(
			'href' => AdminController::$currentIndex.'&type='.$type.'&configure='.$this->name.'&setting'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Setting', array(), 'Admin.Theme.Transformer')
		);
		$helper->title = $this->getTranslator()->trans('Videos list', array(), 'Modules.Stvideo.Admin');
		$helper->table = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    public function hookDisplayHeader($params)
    {   
        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $custom_css = '';

            if($text_color = Configuration::get($this->_prefix_st.'TEXT_COLOR'))
                $custom_css .= '.st_popup_video{color:'.$text_color.';}';
            if($bg_color = Configuration::get($this->_prefix_st.'BG_COLOR'))
            {
                $bg_opacity = Configuration::get($this->_prefix_st.'BG_OPACITY');
                if($bg_opacity>1 && $bg_opacity<0)
                    $bg_opacity = 0.6;
                
                $rgb_color = self::hex2rgb($bg_color);
                if(is_array($rgb_color))
                    $css .='.st_popup_video{background:rgba('.$rgb_color[0].','.$rgb_color[1].','.$rgb_color[2].','.$bg_opacity.');}';

            }
            if($icon_width = Configuration::get($this->_prefix_st.'ICON_WIDTH'))
                $custom_css .= '.st_popup_video{with:'.$icon_width.';}';
            if($icon_height = Configuration::get($this->_prefix_st.'ICON_HEIGHT'))
                $custom_css .= '.st_popup_video{height:'.$icon_height.';line-height:'.$icon_height.'px;}';

            $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
    }
    public function hookDisplayAdminProductsExtra($params)
    {
        if (!$id_product = $params['id_product']) {
            return;
        }
        $this->smarty->assign(array(
            'video' => StVideoClass::getByIdProduct($id_product, 0),
            'id_product' => $id_product,
            'current_url' => 'index.php?controller=AdminModules&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
        ));
        return $this->display(__FILE__, 'views/templates/admin/stvideo.tpl'); 
    }
    public function hookActionObjectCategoryDeleteAfter($params)
    {
        if(!$params['object']->id)
            return ;
        return StVideoClass::deleteByIdCategory($params['object']->id);
    }
    public function hookActionObjectManufacturerDeleteAfter($params)
    {
        if(!$params['object']->id)
            return ;
        return StVideoClass::deleteByIdtManufacturer($params['object']->id);;
    }
	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'st_video_shop (id_st_video, id_shop)
		SELECT id_st_video, '.(int)$params['new_id_shop'].'
		FROM '._DB_PREFIX_.'st_video_shop
		WHERE id_shop = '.(int)$params['old_id_shop']);
        $this->clearCache();
    }
	protected function stGetCacheId($key,$type='location',$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key.'_'.$type;
	}
	private function clearCache()
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

    public function hookDisplayProductExtraContent($params){
        //to do search for a better way, data here are supposed to be in the product-tabs.tpl file
        $extraContent = new ProductExtraContent();
        
        if(!isset($params['product']))
            return $extraContent;

        $extraContent->setContent(
            array(
                'videos' => StVideoClass::getForProduct($params['product']->id, 0),
                'size_charts' => StVideoClass::getForProduct($params['product']->id, 1),
            )
        );

        return array('stvideo'=>$extraContent);
    }

    public function renderWidget($hookName = null, array $configuration = [])
    {
        /*$this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        return $this->fetch($this->templateFile);*/
        return;
    }
    
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $id_product = Tools::getValue('id_product');
        if(!$id_product)
            return false;
        return array(
            'videos' => StVideoClass::getForProduct($id_product, 0),
            'size_chart' => StVideoClass::getForProduct($id_product, 1),
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
    
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'text_color' => Configuration::get($this->_prefix_st.'TEXT_COLOR'),
            'bg_color' => Configuration::get($this->_prefix_st.'BG_COLOR'),
            'bg_opacity' => Configuration::get($this->_prefix_st.'BG_OPACITY'),
            'icon_width' => Configuration::get($this->_prefix_st.'ICON_WIDTH'),
            'icon_height' => Configuration::get($this->_prefix_st.'ICON_HEIGHT'),
            'video_width' => Configuration::get($this->_prefix_st.'VIDEO_WIDTH'),
            'video_height' => Configuration::get($this->_prefix_st.'VIDEO_HEIGHT'),
        );
        return $fields_values;        
    }
}
