<?php
use PrestaShop\PrestaShop\Core\Addon\Theme\ThemeManagerBuilder;
class BaseSlider extends Module
{
    protected $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    public $_prefix_st = '';
    public $_prefix_stsn = '';
    public $imgtype = array('jpg', 'gif', 'jpeg', 'png');
    protected static $access_rights = 0775;
    protected $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Date add: Desc', 'orderBy'=>'date_add', 'orderWay'=>'DESC'),
        2 => array('id' =>2 , 'name' => 'Date add: Asc', 'orderBy'=>'date_add', 'orderWay'=>'ASC'),
        3 => array('id' =>3 , 'name' => 'Date update: Desc', 'orderBy'=>'date_upd', 'orderWay'=>'DESC'),
        4 => array('id' =>4 , 'name' => 'Date update: Asc', 'orderBy'=>'date_upd', 'orderWay'=>'ASC'),
        5 => array('id' =>5 , 'name' => 'Product Name: A to Z', 'orderBy'=>'name', 'orderWay'=>'DESC'),
        6 => array('id' =>6 , 'name' => 'Product Name: Z to A', 'orderBy'=>'name', 'orderWay'=>'ASC'),
        7 => array('id' =>7 , 'name' => 'Price: Lowest first', 'orderBy'=>'price', 'orderWay'=>'DESC'),
        8 => array('id' =>8 , 'name' => 'Price: Highest first', 'orderBy'=>'price', 'orderWay'=>'ASC'),
        9 => array('id' =>9 , 'name' => 'Product ID: Asc', 'orderBy'=>'id_product', 'orderWay'=>'DESC'),
        10 => array('id' =>10 , 'name' => 'Product ID: Desc', 'orderBy'=>'id_product', 'orderWay'=>'ASC'),
        11 => array('id' =>11 , 'name' => 'Position: Desc', 'orderBy'=>'position', 'orderWay'=>'DESC'),
        12 => array('id' =>12 , 'name' => 'Position: Asc', 'orderBy'=>'position', 'orderWay'=>'ASC'),
    );
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
    protected $fields_default_stsn = array(
        'pro_per_fw' => 0,
        'pro_per_xxl' => 5,
        'pro_per_xl' => 4,
        'pro_per_lg' => 4,
        'pro_per_md' => 3,
        'pro_per_sm' => 2,
        'pro_per_xs' => 1,
    );
    public static $textTransform = array(
        array('id' => 0, 'name' => 'none'),
        array('id' => 1, 'name' => 'uppercase'),
        array('id' => 2, 'name' => 'lowercase'),
        array('id' => 3, 'name' => 'capitalize'),
    );
    protected $_hooks = array();
    protected $_tabs = array();
	function __construct()
	{
        if (!$this->name || !$this->displayName) {
            die($this->getTranslator()->trans('Module name and displayName are requried!', array(), 'Admin.Theme.Transformer'));
        }
        if (!$this->_prefix_st || !$this->_prefix_stsn) {
            die($this->getTranslator()->trans('Field prefix is requried!', array(), 'Admin.Theme.Transformer'));
        }
        
        $this->tab            = 'front_office_features';
		$this->author         = 'SUNNYTOO.COM';
		$this->need_instance  = 0;
        $this->bootstrap      = true;
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        
        parent::__construct();
    }
    protected function saveHook()
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
                    if (!$this->isHookableOn($value['id'])) {
                        $id = $value['id'];
                        $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to %id%.', array('%id%'=>$id), 'Admin.Theme.Transformer');
                    } 
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
	function install()
	{
        $result = parent::install() 
            && $this->registerHook('displayHeader');
		if ($result) {
            foreach($this->getFormFieldsDefault() AS $k => $v) {
                $result &= Configuration::updateValue($this->_prefix_st.strtoupper($k), $v);
            }
            foreach($this->fields_default_stsn AS $k => $v) {
                $result &= Configuration::updateValue($this->_prefix_stsn.strtoupper($k), $v);
            }
		}
		return $result;
	}
    public function uninstall()
	{
	    $this->clearSliderCache();
		return parent::uninstall();
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
    protected function saveForm()
    {
        if (isset($_POST['savesliderform'])) {
            if (method_exists($this, 'initFieldsForm')) {
                $this->initFieldsForm();
            }
            foreach($this->fields_form as $form) {
                foreach($form['form']['input'] as $field) {
                    if(isset($field['validation'])) {
                        $errors = array();       
                        $value = Tools::getValue($field['name']);
                        if (isset($field['required']) && $field['required'] && $value==false && (string)$value != '0')
        						$errors[] = sprintf('Field "%s" is required.', $field['label']);
                        elseif($value)
                        {
                            $field_validation = $field['validation'];
        					if (!Validate::$field_validation($value))
        						$errors[] = sprintf('Field "%s" is invalid.', $field['label']);
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
                                    $value = ($value==='' && isset($field['default_value']) ? $field['default_value'] : 0);
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
                    } elseif (isset($field['lang']) && $field['lang']) {
                        // Save langugae, no "validation" in the field.
                        $languages = Language::getLanguages(false);
                        $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));
                        $lang_field =array();
                        foreach ($languages as $language) {
                            $lang_field[$language['id_lang']] = Tools::getValue($field['name'].'_'.$language['id_lang']) ? Tools::getValue($field['name'].'_'.$language['id_lang']) : Tools::getValue($field['name'].'_'.$defaultLanguage->id);
                		}
                        Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $lang_field);
                    }       
                }
            }       
            foreach($this->fields_form AS $form) {
                if (isset($form['form']['input']['dropdownlistgroup'])) {
                    $name = $form['form']['input']['dropdownlistgroup']['name'];
                    foreach ($form['form']['input']['dropdownlistgroup']['values']['medias'] as $v)
                    {
                        $t_v = (int)Tools::getValue($name.'_'.$v);
                        if(Configuration::get($this->_prefix_st.'GRID')==1 && in_array($t_v, array(7,9,11)))
                            $t_v--;
                        Configuration::updateValue($this->_prefix_stsn.strtoupper($name.'_'.$v), $t_v);
                    }
                }
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
            
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
            {
	            $this->clearSliderCache();
                $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Admin.Theme.Transformer'));  
            }  
        }
    } 
    public function getContent()
	{
	    if(Tools::getValue('act')=='delete_image' && $field=Tools::getValue('field'))
        {
            return $this->AjaxDeleteImage($field);
        }
        $check_result = $this->_checkImageDir();
        if (method_exists($this, 'saveForm')) {
            $this->saveForm();
        }
        // To override some variables.
        if (method_exists($this, 'beforeInitFieldsForm')) {
            $this->beforeInitFieldsForm();
        }
        // Init form fields.
        if (method_exists($this, 'initFieldsForm')) {
            $this->initFieldsForm();
        }
        $this->generateThumbnails();
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
    public function getFormFields()
    {
        $form_fields = array();
        $form_fields['setting'] = array(
            'direction_nav' => array(
                'type' => 'radio',
                'label' => $this->getTranslator()->trans('Display "next" and "prev" buttons:', array(), 'Admin.Theme.Transformer'),
                'name' => 'direction_nav',
                'default_value' => 1,
                'values' => array(
                    array(
                        'id' => 'direction_nav_none',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'direction_nav_top-right',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Top right-hand side', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'direction_nav_full_height',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Full height', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'direction_nav_full_height_hover',
                        'value' => 3,
                        'label' => $this->getTranslator()->trans('Full height, show out when mouseover', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'direction_nav_square',
                        'value' => 4,
                        'label' =>$this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'direction_nav_square_hover',
                        'value' => 5,
                        'label' =>$this->getTranslator()->trans('Square, show out when mouseover', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'direction_nav_circle',
                        'value' => 6,
                        'label' =>$this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'direction_nav_circle_hover',
                        'value' => 7,
                        'label' =>$this->getTranslator()->trans('Circle, show out when mouseover', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'direction_nav_arrow',
                        'value' => 8,
                        'label' =>$this->getTranslator()->trans('Arrow', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'direction_nav_arrow_hover',
                        'value' => 9,
                        'label' =>$this->getTranslator()->trans('Arrow, show out when mouseover', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isUnsignedInt',
            ),
            'hide_direction_nav_on_mob' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Hide "next" and "prev" buttons on small screen devices:', array(), 'Admin.Theme.Transformer'),
                'name' => 'hide_direction_nav_on_mob',
                'default_value' => 1,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'hide_direction_nav_on_mob_on',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'hide_direction_nav_on_mob_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'desc' => $this->gettranslator()->trans('Screen width < 992px.', array(), 'Admin.Theme.Transformer'),
                'validation' => 'isBool',
            ),
            'control_nav' => array(
                'type' => 'radio',
                'label' => $this->getTranslator()->trans('Show navigation:', array(), 'Admin.Theme.Transformer'),
                'name' => 'control_nav',
                'default_value' => 0,
                'values' => array(
                    array(
                        'id' => 'control_nav_1',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Bullets', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'control_nav_4',
                        'value' => 4,
                        'label' => $this->getTranslator()->trans('Round', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'control_nav_2',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Number', array(), 'Admin.Theme.Transformer')),
                    /*array(
                        'id' => 'control_nav_3',
                        'value' => 3,
                        'label' => $this->getTranslator()->trans('Progress', array(), 'Admin.Theme.Transformer')),*/
                    array(
                        'id' => 'control_nav_0',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isUnsignedInt',
            ),
            'hide_control_nav_on_mob' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Hide navigation on small screen devices:', array(), 'Admin.Theme.Transformer'),
                'name' => 'hide_control_nav_on_mob',
                'default_value' => 0,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'hide_control_nav_on_mob_on',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'hide_control_nav_on_mob_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'desc' => $this->gettranslator()->trans('Screen width < 992px.', array(), 'Admin.Theme.Transformer'),
                'validation' => 'isBool',
            ),
            'direction_color' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Prev/next color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'direction_color',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'direction_color_hover' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Prev/next hover color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'direction_color_hover',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'direction_color_disabled' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Prev/next disabled color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'direction_color_disabled',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'direction_bg' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Prev/next background:', array(), 'Admin.Theme.Transformer'),
                'name' => 'direction_bg',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'direction_hover_bg' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Prev/next hover background:', array(), 'Admin.Theme.Transformer'),
                'name' => 'direction_hover_bg',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'direction_disabled_bg' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Prev/next disabled background:', array(), 'Admin.Theme.Transformer'),
                'name' => 'direction_disabled_bg',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'pag_nav_bg' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Navigation color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'pag_nav_bg',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),  
             'pag_nav_bg_hover' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Navigation active color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'pag_nav_bg_hover',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
            'aw_display' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Always display this block:', array(), 'Admin.Theme.Transformer'),
                'name' => 'aw_display',
                'default_value' => 1,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'aw_display_on',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'aw_display_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isBool',
            ),
            'title_align' => array(
                'type' => 'radio',
                'label' => $this->getTranslator()->trans('Block title:', array(), 'Admin.Theme.Transformer'),
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
            'title_font_size' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Title size:', array(), 'Admin.Theme.Transformer'),
                'name' => 'title_font_size',
                'prefix' => 'px',
                'class' => 'fixed-width-lg',
                'validation' => 'isUnsignedInt',
                'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
            ), 
            'title_color' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'title_color',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'title_hover_color' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Heading hover color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'title_hover_color',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
            'title_bottom_border' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Title bottom border height:', array(), 'Admin.Theme.Transformer'),
                'name' => 'title_bottom_border',
                'validation' => 'isNullOrUnsignedId',
                'prefix' => 'px',
                'class' => 'fixed-width-lg',
                'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
            ),
            'title_bottom_border_color' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Title border color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'title_bottom_border_color',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'title_bottom_border_color_h' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Title border highlight color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'title_bottom_border_color_h',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
        );
        $image_types_arr = array();
        $imagesTypes = ImageType::getImagesTypes('products');
        foreach ($imagesTypes as $k=>$imageType) {
            if(Tools::substr($imageType['name'],-3)=='_2x')
                continue;
            $image_types_arr[] = array('id' => $imageType['name'], 'name' => $imageType['name'].'('.$imageType['width'].'x'.$imageType['height'].')');
        }
        $form_fields['home_slider'] = array(
            'grid' => array(
                'type' => 'radio',
                'label' => $this->getTranslator()->trans('How to display products:', array(), 'Admin.Theme.Transformer'),
                'name' => 'grid',
                'default_value' => 0,
                'values' => array(
                    array(
                        'id' => 'grid_slider',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('Slider', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'grid_grid',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Grid view', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'grid_xiao',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Simple layout', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isUnsignedInt',
            ), 
            'nbr' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Define the number of products to be displayed:', array(), 'Admin.Theme.Transformer'),
                'name' => 'nbr',
                'default_value' => 8,
                // 'required' => true,
                'validation' => 'isUnsignedInt',
                'class' => 'fixed-width-sm'
            ),
            'soby' => array(
                'type' => 'select',
                'label' => $this->getTranslator()->trans('Sort by:', array(), 'Admin.Theme.Transformer'),
                'name' => 'soby',
                'options' => array(
                    'query' => $this->sort_by,
                    'id' => 'id',
                    'name' => 'name',
                ),
                'validation' => 'isUnsignedInt',
            ), 
            'dropdownlistgroup' => array(
                'type' => 'dropdownlistgroup',
                'label' => $this->getTranslator()->trans('The number of columns:', array(), 'Admin.Theme.Transformer'),
                'name' => 'pro_per',
                'values' => array(
                        'maximum' => 12,
                        'medias' => array('fw','xxl','xl','lg','md','sm','xs'),
                    ),
                'desc' => $this->getTranslator()->trans('7, 9 and 11 can not be used in grid view, they will be automatically decreased to 6, 8 and 10. Set a value for the "Full width" drop down list to make this module fullwidth in the fullwidth* hooks, but the value of "Full width" drop down menu would not take effect in grid view.', array(), 'Admin.Theme.Transformer'),
            ), 
            'spacing_between' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Spacing between products:', array(), 'Admin.Theme.Transformer'),
                'name' => 'spacing_between',
                'validation' => 'isNullOrUnsignedId',
                'prefix' => 'px',
                'default_value' => 16,
                'class' => 'fixed-width-lg',
                'desc' => array(                            
                        $this->getTranslator()->trans('Distance between products.', array(), 'Admin.Theme.Transformer'),                          
                    ),
            ),
            'image_type'=>array(
    			'type' => 'select',
    			'label' => $this->getTranslator()->trans('Image type for products in Grid view and Slider:', array(), 'Admin.Theme.Transformer'),
    			'name' => 'image_type',
    			'default_value' => 'home_default',
    			'options' => array(
    				'query' => $image_types_arr,
    				'id' => 'id',
    				'name' => 'name',
                    'default' => array(
                        'value' => '',
                        'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer'),
                    ),
    			),
    			'validation' => 'isGenericName',
    		),
            'slideshow' => array(
                'type' => 'radio',
                'label' => $this->getTranslator()->trans('Autoplay:', array(), 'Admin.Theme.Transformer'),
                'name' => 'slideshow',
                'default_value' => 0,
                'values' => array(
                    array(
                        'id' => 'slideshow_1',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'slideshow_2',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Once, has no effect in loop mode', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'slideshow_0',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isUnsignedInt',
            ), 
            's_speed' => array(
				'type' => 'text',
				'label' => $this->getTranslator()->trans('Time:', array(), 'Admin.Theme.Transformer'),
				'name' => 's_speed',
                'default_value' => 7000,
                'desc' => $this->getTranslator()->trans('The period, in milliseconds, between the end of a transition effect and the start of the next one.', array(), 'Admin.Theme.Transformer'),
                'validation' => 'isUnsignedInt',
                'class' => 'fixed-width-sm'
			),
            'a_speed' => array(
				'type' => 'text',
				'label' => $this->getTranslator()->trans('Transition period:', array(), 'Admin.Theme.Transformer'),
				'name' => 'a_speed',
                'default_value' => 400,
                'desc' => $this->getTranslator()->trans('The period, in milliseconds, of the transition effect.', array(), 'Admin.Theme.Transformer'),
                'validation' => 'isUnsignedInt',
                'class' => 'fixed-width-sm'
			),
            'pause_on_hover' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Stop autoplay after interaction:', array(), 'Admin.Theme.Transformer'),
                'name' => 'pause_on_hover',
                'default_value' => 0,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'pause_on_hover_on',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'pause_on_hover_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isBool',
                'desc' => $this->getTranslator()->trans('Autoplay will not be disabled after user interactions (swipes). Turn this option off, this slider will be restarted every time after interaction', array(), 'Admin.Theme.Transformer'),
            ),
            'rewind_nav' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Loop:', array(), 'Admin.Theme.Transformer'),
                'name' => 'rewind_nav',
                'default_value' => 0,
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
                'validation' => 'isBool',
            ),
            'lazy' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Lazy load:', array(), 'Admin.Theme.Transformer'),
                'name' => 'lazy',
                'default_value' => 1,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'lazy_on',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'lazy_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isBool',
                'desc' => $this->getTranslator()->trans('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.', array(), 'Admin.Theme.Transformer'),
            ),
            'move' => array(
				'type' => 'radio',
				'label' => $this->getTranslator()->trans('Scroll:', array(), 'Admin.Theme.Transformer'),
				'name' => 'move',
                'default_value' => 1,
				'values' => array(
					array(
						'id' => 'move_on',
						'value' => 1,
						'label' => $this->getTranslator()->trans('Scroll per page', array(), 'Admin.Theme.Transformer')),
					array(
						'id' => 'move_off',
						'value' => 0,
						'label' => $this->getTranslator()->trans('Scroll per item', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'move_free',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Free mode', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isUnsignedInt',
			),
            'hide_mob' => array(
                'type' => 'radio',
                'label' => $this->getTranslator()->trans('Hide on small screen devices:', array(), 'Admin.Theme.Transformer'),
                'name' => 'hide_mob',
                'default_value' => 0,
                'values' => array(
                    array(
                        'id' => 'hide_mob_0',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('Visible', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'hide_mob_1',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Hide on mobile (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'hide_mob_2',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Hide on PC (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                ),
                'desc' => $this->gettranslator()->trans('Screen width < 992px.', array(), 'Admin.Theme.Transformer'),
                'validation' => 'isUnsignedInt',
            ),
            'display_sd' => array(
                'type' => 'radio',
                'label' => $this->getTranslator()->trans('Display product short description:', array(), 'Admin.Theme.Transformer'),
                'name' => 'display_sd',
                'default_value' => 0,
                'values' => array(
                    array(
                        'id' => 'display_sd_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_sd_on',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes, 220 characters', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_sd_full',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Yes, full short description', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isUnsignedInt',
            ), 
            'top_padding' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                'name' => 'top_padding',
                'validation' => 'isNullOrUnsignedId',
                'prefix' => 'px',
                'class' => 'fixed-width-lg',
                'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
            ),
            'bottom_padding' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                'name' => 'bottom_padding',
                'validation' => 'isNullOrUnsignedId',
                'prefix' => 'px',
                'class' => 'fixed-width-lg',
                'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
            ),
            'top_margin' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Top spacing:', array(), 'Admin.Theme.Transformer'),
                'name' => 'top_margin',
                'validation' => 'isNullOrUnsignedId',
                'prefix' => 'px',
                'class' => 'fixed-width-lg',
                'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
            ),
            'bottom_margin' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Bottom spacing:', array(), 'Admin.Theme.Transformer'),
                'name' => 'bottom_margin',
                'validation' => 'isNullOrUnsignedId',
                'prefix' => 'px',
                'class' => 'fixed-width-lg',
                'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
            ),
            'bg_color' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'bg_color',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
            'bg_pattern' => array(
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
            'bg_img' => array(
                'type' => 'file',
                'label' => $this->getTranslator()->trans('Upload your own pattern or background image:', array(), 'Admin.Theme.Transformer'),
                'name' => 'bg_img',
                'desc' => '',
            ),
            'speed' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Parallax speed factor:', array(), 'Admin.Theme.Transformer'),
                'name' => 'speed',
                'default_value' => 0.6,
                'desc' => array(
                        $this->getTranslator()->trans('Speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling.', array(), 'Admin.Theme.Transformer'),
                        $this->getTranslator()->trans('Set it to 0 to disable the parallax effect.', array(), 'Admin.Theme.Transformer'),
                    ),
                'validation' => 'isFloat',
                'class' => 'fixed-width-sm',
            ),
            'bg_img_v_offset' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Background image vertical offset:', array(), 'Admin.Theme.Transformer'),
                'name' => 'bg_img_v_offset',
                'default_value' => 0,
                'class' => 'fixed-width-sm',  
                'suffix' => 'px',
                'desc' => array(
                        $this->getTranslator()->trans('For parallax effect.', array(), 'Admin.Theme.Transformer'),
                        $this->getTranslator()->trans('Unsigned int, like 0, 27, 100', array(), 'Admin.Theme.Transformer'),
                        $this->getTranslator()->trans('Move the background image down or up.', array(), 'Admin.Theme.Transformer')
                    ),
            ),
            'text_color' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'text_color',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'price_color' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Price color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'price_color',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'link_hover_color' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Product name hover color:', array(), 'Admin.Theme.Transformer'),
                'name' => 'link_hover_color',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'grid_bg' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Grid background:', array(), 'Admin.Theme.Transformer'),
                'name' => 'grid_bg',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'grid_hover_bg' => array(
                'type' => 'color',
                'label' => $this->getTranslator()->trans('Grid hover background:', array(), 'Admin.Theme.Transformer'),
                'name' => 'grid_hover_bg',
                'class' => 'color',
                'size' => 20,
                'validation' => 'isColor',
             ),
             'view_more' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Show "View more" button:', array(), 'Admin.Theme.Transformer'),
                'name' => 'view_more',
                'default_value' => 0,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'view_moreon',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'view_more_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isBool',
            ),
		);
        $form_fields['column'] = array(
            'display_pro_col' => array(
                'type' => 'radio',
                'label' => $this->getTranslator()->trans('How to display products:', array(), 'Admin.Theme.Transformer'),
                'name' => 'display_pro_col',
                'default_value' => 0,
                'values' => array(
                    array(
                        'id' => 'display_pro_col_0',
                        'value' => 0,
                        'label' => '<img src="'._MODULE_DIR_.'stthemeeditor/img/column_product_slider_0.jpg" />'.$this->getTranslator()->trans('Compact slider, several items per view', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_pro_col_1',
                        'value' => 1,
                        'label' => '<img src="'._MODULE_DIR_.'stthemeeditor/img/column_product_slider_1.jpg" />'.$this->getTranslator()->trans('Slider, only one item per view', array(), 'Admin.Theme.Transformer')),
                    /*array(
                        'id' => 'display_pro_col_2',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('List', array(), 'Admin.Theme.Transformer')),*/
                ),
                'validation' => 'isUnsignedInt',
            ),
            'nbr_col' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Define the number of products to be displayed:', array(), 'Admin.Theme.Transformer'),
                'name' => 'nbr_col',
                'default_value' => 8,
                //'required' => true,
                'validation' => 'isUnsignedInt',
                'class' => 'fixed-width-sm'
            ),
            'items_col' => array(
				'type' => 'text',
				'label' => $this->getTranslator()->trans('How many products per view on compact slider:', array(), 'Admin.Theme.Transformer'),
				'name' => 'items_col',
                'default_value' => 4,
                'validation' => 'isUnsignedInt',
                'class' => 'fixed-width-sm'
			),
            'soby_col' => array(
				'type' => 'select',
    			'label' => $this->getTranslator()->trans('Sort by:', array(), 'Admin.Theme.Transformer'),
    			'name' => 'soby_col',
                'options' => array(
    				'query' => $this->sort_by,
    				'id' => 'id',
    				'name' => 'name',
    			),
                'validation' => 'isUnsignedInt',
			), 
            'slideshow_col' => array(
                'type' => 'radio',
                'label' => $this->getTranslator()->trans('Autoplay:', array(), 'Admin.Theme.Transformer'),
                'name' => 'slideshow_col',
                'default_value' => 0,
                'values' => array(
                    array(
                        'id' => 'slideshow_col_1',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'slideshow_col_2',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Once, has no effect in loop mode', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'slideshow_col_0',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isUnsignedInt',
            ),
            'pause_on_hover_col' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Stop autoplay after interaction:', array(), 'Admin.Theme.Transformer'),
                'name' => 'pause_on_hover_col',
                'default_value' => 0,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'pause_col_on',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'pause_col_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isBool',
                'desc' => $this->getTranslator()->trans('Autoplay will not be disabled after user interactions (swipes). Turn this option off, this slider will be restarted every time after interaction', array(), 'Admin.Theme.Transformer'),
            ),
            'rewind_nav_col' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Loop:', array(), 'Admin.Theme.Transformer'),
                'name' => 'rewind_nav_col',
                'default_value' => 0,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'rewind_nav_col_on',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'rewind_nav_col_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isBool',
            ),
            's_speed_col' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Time:', array(), 'Admin.Theme.Transformer'),
                'name' => 's_speed_col',
                'default_value' => 7000,
                'desc' => $this->getTranslator()->trans('The period, in milliseconds, between the end of a transition effect and the start of the next one.', array(), 'Admin.Theme.Transformer'),
                'validation' => 'isUnsignedInt',
                'class' => 'fixed-width-sm'
            ),
            'a_speed_col' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Transition period:', array(), 'Admin.Theme.Transformer'),
                'name' => 'a_speed_col',
                'default_value' => 400,
                'desc' => $this->getTranslator()->trans('The period, in milliseconds, of the transition effect.', array(), 'Admin.Theme.Transformer'),
                'validation' => 'isUnsignedInt',
                'class' => 'fixed-width-sm'
            ),
            'lazy_col' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Lazy load:', array(), 'Admin.Theme.Transformer'),
                'name' => 'lazy_col',
                'default_value' => 1,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'lazy_col_on',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'lazy_col_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isBool',
                'desc' => $this->getTranslator()->trans('Delays loading of images. Images outside of viewport will not be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.', array(), 'Admin.Theme.Transformer'),
            ),
            'hide_mob_col' => array(
                'type' => 'radio',
                'label' => $this->getTranslator()->trans('Hide on small screen devices:', array(), 'Admin.Theme.Transformer'),
                'name' => 'hide_mob_col',
                'default_value' => 0,
                'values' => array(
                    array(
                        'id' => 'hide_mob_col_0',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('Visible', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'hide_mob_col_1',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Hide on mobile (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'hide_mob_col_2',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Hide on PC (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                ),
                'desc' => $this->gettranslator()->trans('Screen width < 992px.', array(), 'Admin.Theme.Transformer'),
                'validation' => 'isUnsignedInt',
            ),
            'aw_display_col' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Always display this block:', array(), 'Admin.Theme.Transformer'),
                'name' => 'aw_display_col',
                'default_value' => 1,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'aw_display_col_on',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'aw_display_col_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isBool',
            ),
		);
        $form_fields['footer'] = array(
            'nbr_fot' => array(
				'type' => 'text',
				'label' => $this->getTranslator()->trans('Define the number of products to be displayed:', array(), 'Admin.Theme.Transformer'),
				'name' => 'nbr_fot',
                'default_value' => 4,
                //'required' => true,
                'validation' => 'isUnsignedInt',
                'class' => 'fixed-width-sm'
			),
            'soby_fot' => array(
				'type' => 'select',
    			'label' => $this->getTranslator()->trans('Sort by:', array(), 'Admin.Theme.Transformer'),
    			'name' => 'soby_fot',
                'options' => array(
    				'query' => $this->sort_by,
    				'id' => 'id',
    				'name' => 'name',
    			),
                'validation' => 'isUnsignedInt',
			), 
            'aw_display_fot' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Always display this block:', array(), 'Admin.Theme.Transformer'),
                'name' => 'aw_display_fot',
                'default_value' => 1,
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'aw_display_fot_on',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'aw_display_fot_off',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                ),
                'validation' => 'isBool',
            ),
            'footer_wide' => array(
                'type' => 'select',
                'label' => $this->getTranslator()->trans('Wide on footer:', array(), 'Admin.Theme.Transformer'),
                'name' => 'footer_wide',
                'default_value' => 3,
                'options' => array(
                    'query' => self::$wide_map,
                    'id' => 'id',
                    'name' => 'name',
                ),
                'validation' => 'isGenericName',
            ),  
            'hide_mob_fot' => array(
                'type' => 'radio',
                'label' => $this->getTranslator()->trans('Hide on small screen devices:', array(), 'Admin.Theme.Transformer'),
                'name' => 'hide_mob_fot',
                'default_value' => 0,
                'values' => array(
                    array(
                        'id' => 'hide_mob_fot_0',
                        'value' => 0,
                        'label' => $this->getTranslator()->trans('Visible', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'hide_mob_fot_1',
                        'value' => 1,
                        'label' => $this->getTranslator()->trans('Hide on mobile (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'hide_mob_fot_2',
                        'value' => 2,
                        'label' => $this->getTranslator()->trans('Hide on PC (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                ),
                'desc' => $this->gettranslator()->trans('Screen width < 992px.', array(), 'Admin.Theme.Transformer'),
                'validation' => 'isUnsignedInt',
            ),
		);
        $form_fields['video'] = array(
            'video_poster' => array(
                'type' => 'file',
                'label' => $this->getTranslator()->trans('Video thumbnail image(Required):', array(), 'Admin.Theme.Transformer'),
                'name' => 'video_poster',
                'desc' => array(
                        $this->getTranslator()->trans('Upload a image here, it will be displayed on mobile devices, because of the video background feature can not work on mobile devices, otherwise a transparent background will be apply to this block on mobile devices.', array(), 'Admin.Theme.Transformer'),
                    ),
            ),
            'video_mpfour' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('MP4 format(Required):', array(), 'Admin.Theme.Transformer'),
                'name' => 'video_mpfour',
                'size' => 64,
                'desc' => array(
                    $this->getTranslator()->trans('Example: http://www.yourdomain.com/video.mp4', array(), 'Admin.Theme.Transformer'),
                    $this->getTranslator()->trans('MP4 is supported by major browsers like Firefox, Opera, Chrome, Safari and Internet Explorer 9+. So you do not have to prepare .webm and .ogv, it is okay to leave the follow to fields empty.', array(), 'Admin.Theme.Transformer'),
                    $this->getTranslator()->trans('You can convert your videos online or using tools like "Miro Video Converter" to convert them into different formats.', array(), 'Admin.Theme.Transformer'),
                    ),
                'validation' => 'isUrlOrEmpty',
            ),
            'video_webm' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('WebM format(Optional):', array(), 'Admin.Theme.Transformer'),
                'name' => 'video_webm',
                'size' => 64,
                'desc' => array(
                        $this->getTranslator()->trans('Example: http://www.yourdomain.com/video.webm, Firefox, Chrome and Opera prefer WebM / Ogg formats', array(), 'Admin.Theme.Transformer'),
                    ),
                'validation' => 'isUrlOrEmpty',
            ),
            'video_ogg' => array(
                'type' => 'text',
                'label' => $this->getTranslator()->trans('Ogv or ogg format(Optional):', array(), 'Admin.Theme.Transformer'),
                'name' => 'video_ogg',
                'size' => 64,
                'desc' => array(
                    $this->getTranslator()->trans('Example: http://www.yourdomain.com/video.ogv, Firefox, Chrome and Opera prefer WebM / Ogv formats', array(), 'Admin.Theme.Transformer'),
                    ),
                'validation' => 'isUrlOrEmpty',
            ),
            'video_loop' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Loop:', array(), 'Admin.Theme.Transformer'),
                'name' => 'video_loop',
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
                'validation' => 'isUnsignedInt',
            ),
            'video_muted' => array(
                'type' => 'switch',
                'label' => $this->getTranslator()->trans('Muted:', array(), 'Admin.Theme.Transformer'),
                'name' => 'video_muted',
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
                'validation' => 'isUnsignedInt',
            ),
            'video_v_offset' => array(
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
                'validation' => 'isUnsignedInt',
            ),
        );
        
        $form_fields['hook'] = array();
        foreach($this->_hooks AS $key => $values)
        {
            if (!is_array($values) || !count($values))
                continue;
            $form_fields['hook'][] = array(
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
        
        return $form_fields;          
    }
    public function calcImageWidth($option = array())
    {
        $spacing = 16;
        $page_width = 1200;
        $per_xxl = 5;
        $per_xl = 4;
        $per_lg = 4;
        $per_count = $per_xl;
        $left_width = $right_width = 0;
        $page = 'index';
        if (isset($option['spacing']) && $option['spacing']) {
            $spacing = (int)$option['spacing'];
        }
        if (isset($option['per_xxl']) && (int)$option['per_xxl'] > 1) {
            $per_xxl = (int)$option['per_xxl'];
        }
        if (isset($option['per_xl']) && (int)$option['per_xl'] > 1) {
            $per_xl = (int)$option['per_xl'];
        }
        if (isset($option['per_lg']) && (int)$option['per_lg'] > 1) {
            $per_lg = (int)$option['per_lg'];
        }
        if (isset($option['page']) && $option['page']) {
            $page = $option['page'];
        }
        switch((int)Configuration::get('STSN_RESPONSIVE_MAX'))
        {
            case 0:
                $page_width = 980;
                $per_count = $per_lg;
                $left_width = (int)Configuration::get('STSN_LEFT_COLUMN_SIZE_MD');
                $right_width = (int)Configuration::get('STSN_RIGHT_COLUMN_SIZE_MD');
                break;
            case 1:
                $page_width = 1200;
                $per_count = $per_xl;
                $left_width = (int)Configuration::get('STSN_LEFT_COLUMN_SIZE_LG');
                $right_width = (int)Configuration::get('STSN_RIGHT_COLUMN_SIZE_LG');
                break;
            case 2:
                $page_width = 1440;
                $per_count = $per_xxl;
                $left_width = (int)Configuration::get('STSN_LEFT_COLUMN_SIZE_LG');
                $right_width = (int)Configuration::get('STSN_RIGHT_COLUMN_SIZE_LG');
                break;
            default:
                break;
        }
        
        $theme_repository = (new ThemeManagerBuilder($this->context, Db::getInstance()))->buildRepository();
        $theme = $theme_repository->getInstanceByName($this->context->shop->theme->getName());
        $colum_width = 0;
        if ($theme->get('theme_settings.layouts.'.$page) == 'layout-left-column') {
            $colum_width = round($page_width * $left_width / 12, 2);
        } elseif ($theme->get('theme_settings.layouts.'.$page) == 'layout-right-column') {
            $colum_width = round($page_width * $right_width / 12, 2);
        } elseif ($theme->get('theme_settings.layouts.'.$page) == 'layout-both-columns') {
            $colum_width = round($page_width * $left_width / 12, 2) + round($page_width * $right_width / 12, 2);
        }
        
        $per_width = floor(($page_width - 2 * 15 - ($per_count - 1) * $spacing - $colum_width)/$per_count);
        return $this->getTranslator()->trans('Save your changes first. Recommended width for the current image type is %s% px', array('%s%'=>'<strong>'.$per_width.'</strong>'), 'Admin.Theme.Transformer');
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
    protected function initForm()
	{
	    $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savesliderform';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
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
    public function hookDisplayOrderConfirmation2($params)
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
    public function hookDisplayLeftColumnProduct($params)
    {
        return $this->hookDisplayLeftColumn($params, __FUNCTION__);
    }
    public function hookDisplayRightColumnProduct($params)
    {
        return $this->hookDisplayLeftColumn($params, __FUNCTION__);
    }
    public function hookDisplayProductLeftColumn($params)
	{
        return $this->hookDisplayLeftColumn($params, __FUNCTION__);
	}
    public function hookDisplayProductCenterColumn($params)
	{
        return $this->hookDisplayLeftColumn($params, __FUNCTION__);
	}
	public function hookDisplayProductRightColumn($params)
	{
        return $this->hookDisplayLeftColumn($params, __FUNCTION__);
	}
    public function hookDisplayFooterProduct($params)
	{
        return $this->hookDisplayHome($params, __FUNCTION__);
	}
    //abstract public function hookDisplayLeftColumn($params);
    public function hookDisplayRightColumn($params)
    {
        return $this->hookDisplayLeftColumn($params, __FUNCTION__);
    }

    public function hookDisplayStBlogFullWidthTop($params)
    {
        if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;

        return $this->hookDisplayStBlogHome($params, __FUNCTION__ ,2);
    }
    public function hookDisplayStBlogFullWidthBottom($params)
    {
        if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;

        return $this->hookDisplayStBlogHome($params, __FUNCTION__ ,2);
    }
    public function hookDisplayStBlogHomeTop($params)
    {
        if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
        return $this->hookDisplayStBlogHome($params, __FUNCTION__);
    }
	public function hookDisplayStBlogLeftColumn($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;

        $this->smarty->assign(array(
            'is_blog' => true,
        )); 
        return $this->hookDisplayLeftColumn($params, __FUNCTION__);
	}
	public function hookDisplayStBlogRightColumn($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
        $this->smarty->assign(array(
            'is_blog' => true,
        )); 
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
	public function clearSliderCache()
	{
		$this->_clearCache('*');
    }
	protected function stGetCacheId($key,$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key;
	}
    public function getConfigFieldsValues()
    {
        $fields_values = array();
        foreach($this->getFormFieldsDefault() AS $k => $v) {
            $fields_values[$k] = Configuration::get($this->_prefix_st.strtoupper($k));
        }
        foreach($this->fields_default_stsn AS $k=> $v) {
            $fields_values[$k] = Configuration::get($this->_prefix_stsn.strtoupper($k));
        }
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
    public function addFieldsSuffix($fields = array(), $suffix='')
    {
        if (!is_array($fields) || !$fields || !$suffix) {
            return $fields;
        }
        $result = array();
        foreach($fields AS $key => $value) {
            if ($key && isset($value['name'])) {
                if ($key == $value['name']) {
                    $key .= $suffix;
                }
                $value['name'] .= $suffix;
                $result[$key] = $value;
            }
        }
        return $result;
    }
    public function getHookHash($func='')
    {
        if (!$func)
            return '';
        return substr(md5($func), 0, 10);
    }
    public function get_prefix()
    {
        if (isset($this->_prefix_st) && $this->_prefix_st)
            return $this->_prefix_st;
        return false;
    }
}