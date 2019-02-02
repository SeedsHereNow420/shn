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
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
require_once _PS_MODULE_DIR_.'stfeaturedcategories/classes/StFeaturedCategoriesClass.php';
include_once(_PS_MODULE_DIR_.'stthemeeditor/classes/BaseSlider.php');
class StFeaturedCategories extends BaseSlider implements WidgetInterface
{
    protected static $cache_featured_categories = false;
    public $fields_list;
    private $spacer_size = '5';
    public $_prefix_st = 'ST_PRO_CATE_F_C_';
    public $_prefix_stsn = 'STSN_PRO_CATE_F_C_';
	
	public function __construct()
	{
		$this->name          = 'stfeaturedcategories';
		$this->version       = '1.1.8';
        $this->displayName   = $this->getTranslator()->trans('Featured categories', array(), 'Modules.Stfeaturedcategories.Admin');
		$this->description   = $this->getTranslator()->trans('Display featured categories on your homepage.', array(), 'Modules.Stfeaturedcategories.Admin');
		parent::__construct();
	}
    protected function initTabNames()
    {
        $this->_tabs = array(
            array('id'  => '0', 'name' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer')),
            array('id'  => '1,3', 'name' => $this->getTranslator()->trans('Slider on the homepage', array(), 'Admin.Theme.Transformer')),
            array('id'  => '2', 'name' => $this->getTranslator()->trans('Hooks', array(), 'Admin.Theme.Transformer')),
        );
    }
    protected function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
                    'id' => 'displayFullWidthTop',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthTop', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayFullWidthTop2',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthTop2', array(), 'Admin.Theme.Transformer')
                ),
                array(
        			'id' => 'displayHome',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayHome', array(), 'Admin.Theme.Transformer')
        		),
        		array(
        			'id' => 'displayHomeTop',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayHomeTop', array(), 'Admin.Theme.Transformer')
        		),
                array(
        			'id' => 'displayHomeBottom',
        			'val' => '1',
        			'name' => $this->getTranslator()->trans('displayHomeBottom', array(), 'Admin.Theme.Transformer')
        		),
                array(
                    'id' => 'displayFullWidthBottom',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthBottom', array(), 'Admin.Theme.Transformer')
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
                    'name' => $this->getTranslator()->trans('displayHomeFirstQuarter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeSecondQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeSecondQuarter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeThirdQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeThirdQuarter', array(), 'Admin.Theme.Transformer')
                ),
                array(
                    'id' => 'displayHomeFourthQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeFourthQuarter', array(), 'Admin.Theme.Transformer')
                ),
            )
        );
    }
	public function install()
	{
	    if (!$this->installDB()
            || !parent::install()
            || !$this->registerHook('actionCategoryAdd')
			|| !$this->registerHook('actionCategoryDelete')
			|| !$this->registerHook('actionCategoryUpdate')
            )
            return false;    
		$this->clearSliderCache();
		return true;
	}
	public function installDb()
	{
		$return = true;
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_featured_category` (
				`id_st_featured_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				`id_parent` int(10) NOT NULL DEFAULT 0,
                `level_depth` tinyint(3) unsigned NOT NULL DEFAULT 0,   
				`id_shop` int(10) unsigned NOT NULL,
                `id_category` int(10) unsigned NOT NULL DEFAULT 0,
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `txt_color` varchar(7) DEFAULT NULL,
                `txt_color_over` varchar(7) DEFAULT NULL,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `auto_sub` tinyint(1) unsigned NOT NULL DEFAULT 0,
    			`cover` varchar(255) DEFAULT NULL,
				PRIMARY KEY (`id_st_featured_category`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}
	public function uninstall()
	{
		if (!parent::uninstall() ||
			!$this->uninstallDB())
			return false;
        $this->clearSliderCache();
		return true;
	}
	private function uninstallDb()
	{
		$this->clearSliderCache();
        return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_featured_category`');
	}   
	public function getContent()
	{
        Media::addJsDef(array(
            'module_name' => $this->name,
        ));
        $this->context->controller->addCSS(_PS_MODULE_DIR_.'stthemeeditor/views/css/admin-slider.css');
        $this->context->controller->addJS(_PS_MODULE_DIR_.'stthemeeditor/views/js/admin.js');
    	$id_st_featured_category = (int)Tools::getValue('id_st_featured_category');
        if(Tools::getValue('act')=='delete_image' && $field=Tools::getValue('field'))
        {
            return $this->AjaxDeleteImage($field);
        }
		if (isset($_POST['savestfeaturedcategory']) || isset($_POST['savestfeaturedcategoryAndStay']))
        {
            if($id_st_featured_category)
            {
                $category = new StFeaturedCategoriesClass($id_st_featured_category);
                $id_category_old = $category->id_category;
            }
			else
				$category = new StFeaturedCategoriesClass();
            
            $error = array();
            if (!Tools::getValue('id_category'))
                 $error[] = $this->displayError($this->getTranslator()->trans('Category is required.', array(), 'Modules.Stfeaturedcategories.Admin'));
            
            $category->id_shop = (int)Shop::getContextShopID();
            
            if (!$category->id_shop)
                $error[] = $this->displayError($this->getTranslator()->trans('Action denied, please select a store.', array(), 'Modules.Stfeaturedcategories.Admin'));
            
            if (!count($error))
            {                
        		$category->copyFromPost();
        		$category->id_parent = 0;
                $category->level_depth = 0; 

                if ($category->validateFields(false) && $category->validateFieldsLang(false))
                {
                    if($category->position==0)
                        $category->position = StFeaturedCategoriesClass::getMaximumPosition(0);
                    if($category->save())
                    {
                        $category->clearPosition();
                        $this->clearSliderCache();
                        if(isset($_POST['savestfeaturedcategoryAndStay']) || Tools::getValue('fr') == 'view')
                        {
                            $rd_str = isset($_POST['savestfeaturedcategoryAndStay']) && Tools::getValue('fr') == 'view' ? 'fr=view&update' : (isset($_POST['savestfeaturedcategoryAndStay']) ? 'update' : 'view');
                            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_featured_category='.$category->id.'&conf='.($id_st_featured_category?4:3).'&'.$rd_str.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                        }    
                        else
                        {
                            $this->clearSliderCache();
                            $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Featured category', array(), 'Admin.Theme.Transformer').' '.($id_st_featured_category ? $this->getTranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('added', array(), 'Admin.Theme.Transformer')));                            
                                                    
                        }
                    }
                    else
                        $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during Featured category', array(), 'Admin.Theme.Transformer').' '.($id_st_featured_category ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
                }
            }
			else
				$this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
        if (isset($_POST['savesliderform'])) {
            $this->_checkImageDir();
            $this->saveForm();
        }
        if (Tools::isSubmit('way') && Tools::isSubmit('id_st_featured_category') && Tools::isSubmit('position'))
		{
		    $category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
            if($category->id && $category->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position')))
            {
                $this->clearSliderCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'));                
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('Failed to update the position.', array(), 'Admin.Theme.Transformer'));
		}
        if (Tools::getValue('action') == 'updatePositions')
        {
            $this->processUpdatePositions();
        }
        if (Tools::isSubmit('add'.$this->name))
		{
            $helper = $this->_displayForm(); 
            $this->_html .= $helper->generateForm($this->fields_form);
			return $this->_html;
		}
        elseif (Tools::isSubmit('addsub'.$this->name))
		{
            if(!Tools::getValue('id_parent'))
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            $helper = $this->initCategoryForm(); 
            $this->_html .= $helper->generateForm($this->fields_form);
			return $this->_html;
		}
        elseif (Tools::isSubmit('update'.$this->name))
        {
    		$category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
            if(!Validate::isLoadedObject($category) || $category->id_shop!=(int)Shop::getContextShopID())
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
               
            if($category->id_parent)
            {
                $helper = $this->initCategoryForm(); 
                $this->_html .= $helper->generateForm($this->fields_form);
            }
            elseif(!$category->id_parent)
            {
                $helper = $this->_displayForm(); 
                $this->_html .= $helper->generateForm($this->fields_form);
            }
			return $this->_html; 
        }
        else if (Tools::isSubmit('delete'.$this->name))
		{
    		$category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
            if(Validate::isLoadedObject($category))
            {                    
                $category->delete();
                $category->clearPosition();
                $this->clearSliderCache();
                
                if($category->id_parent)
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_featured_category='.$category->id_parent.'&view'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        elseif (Tools::isSubmit('status'.$this->name))
		{
            $category = new StFeaturedCategoriesClass($id_st_featured_category);
            if (Validate::isLoadedObject($category))
            {
                $category->troggleStatus();
                $this->clearSliderCache();
            }
            if($category->id_parent)
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_featured_category='.$category->id_parent.'&view'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        elseif (Tools::isSubmit('setting'.$this->name))
		{
		    $this->initHookArray();
            $this->initTabNames();  
            $this->initFieldsForm();
            $this->generateThumbnails();
            $helper = $this->initForm();
            
			$this->smarty->assign(array(
                'bo_tabs' => $this->_tabs,
                'bo_tab_content' => $helper->generateForm($this->fields_form),
            ));
    
            return $this->_html.$this->display(__FILE__, 'bo_tab_layout.tpl');
		}
        else
        {
            $helper = $this->initList();
            $list = StFeaturedCategoriesClass::getSub(0);
			return $this->_html.$helper->generateList($list, $this->fields_list);
        }    
	}
    protected function saveForm()
    {
        $this->initHookArray();
        parent::saveForm();
        if(isset($_POST['savesliderformAndStay'])) {
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&setting'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
        }          
    }
    public function getFormFields()
    {
        $fields = parent::getFormFields();
        unset($fields['column']);
        unset($fields['footer']);
        return $fields;
    }
    public function initFieldsForm()
    {
        $this->fields_form = array();
        $fields = $this->getFormFields();
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => $fields['setting'],
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
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
            'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
        );
        $image_types_arr = array();
        $imagesTypes = ImageType::getImagesTypes('categories');
        foreach ($imagesTypes as $k=>$imageType) {
            if(Tools::substr($imageType['name'],-3)=='_2x')
                continue;
            $image_types_arr[] = array('id' => $imageType['name'], 'name' => $imageType['name'].'('.$imageType['width'].'x'.$imageType['height'].')');
        }
        $fields['home_slider']['image_type']['options']['query'] = $image_types_arr;
        $fields['home_slider']['image_type']['options']['default'] = array(
            'value' => '',
            'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer'),
        );
        $option = array(
            'spacing' => (int)Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),
            'per_lg'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_LG'),
            'per_xl'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XL'),
            'per_xxl' => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXL'),
            'page'    => 'index',
        );
        $fields['home_slider']['image_type']['desc'] = $this->calcImageWidth($option);
        unset($fields['home_slider']['grid']); //the module currently does not have list view
        //$fields['home_slider']['grid']['label'] = $this->getTranslator()->trans('How to display categories:', array(), 'Admin.Theme.Transformer');
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Slider on homepage', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => $fields['home_slider'],
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );
        $this->fields_form[1]['form']['input'][] = array(
            'type' => 'html',
            'id' => 'a_cancel',
            'label' => '',
            'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
        );
        
        $this->fields_form[3]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Video background', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'description' => $this->getTranslator()->trans('Video background feature can not work on both Android and IOS devices, which is due to restrictions on autoplay and performance, so you also need to upload a video thumbnail, the thumbnail will be displayed on mobile devices.', array(), 'Admin.Theme.Transformer'),
            'input' => $fields['video'],
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
        );
        $this->fields_form[3]['form']['input'][] = array(
            'type' => 'html',
            'id' => 'a_cancel',
            'label' => '',
            'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
        );
        
        $this->fields_form[2]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Hook manager', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
            'description' => $this->getTranslator()->trans('Check the hook that you would like this module to display on.', array(), 'Admin.Theme.Transformer').'<br/><a href="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" target="_blank" >'.$this->getTranslator()->trans('Click here to see hook position', array(), 'Admin.Theme.Transformer').'</a>.',
			'input' => $fields['hook'],
			'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
            ),
		);
    }
	private function _displayForm()
    {
        $id_lang = $this->context->language->id;
        $category_arr = array();
		$this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(),true);
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Add a category', array(), 'Modules.Stfeaturedcategories.Admin'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Category:', array(), 'Admin.Theme.Transformer'),
					'name' => 'id_category',
                    'required' => true,
					'options' => array(
						'query' => $category_arr,
						'id' => 'id',
						'name' => 'name'
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
                /*array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
					'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                 
				),*/
                array(
					'type' => 'hidden',
					'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
				),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
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
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
		);
        
        $id_st_featured_category = (int)Tools::getValue('id_st_featured_category');
        if($id_st_featured_category)
            $category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
        else
            $category = new StFeaturedCategoriesClass();
        if(Validate::isLoadedObject($category))
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_featured_category');
        }
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestfeaturedcategory';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($category),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
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
		$category_arr[] = array('id'=>(int)$category->id,'name'=>(isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')');

		if (isset($children) && is_array($children) && count($children))
			foreach ($children as $child)
			{
				$this->getCategoryOption($category_arr, (int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],$recursive);
			}
	}
    protected function initList()
	{
	    // Fix table drag bug.
        Media::addJsDef(array(
            'currentIndex' => AdminController::$currentIndex.'&configure='.$this->name,
        ));
		$this->fields_list = array(
			'name' => array(
				'title' => $this->getTranslator()->trans('Category name', array(), 'Modules.Stfeaturedcategories.Admin'),
				'class' => 'fixed-width-xxl',
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'position' => array(
				'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
				'class' => 'fixed-width-xxl',
				'position' => 'position',
                'search' => false,
                'orderby' => false
			),
            'active' => array(
    			'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'), 
                'class' => 'fixed-width-xxl',
                'active' => 'status',
    			'align' => 'center',
                'type' => 'bool',
                'search' => false,
                'orderby' => false
            ),
		);

		if (Shop::isFeatureActive())
			$this->fields_list['id_shop'] = array(
                'title' => $this->getTranslator()->trans('ID Shop', array(), 'Admin.Theme.Transformer'), 
                'align' => 'center', 
                'class' => 'fixed-width-sm',
                'type' => 'int',
                'search' => false,
                'orderby' => false
            );

		$helper = new HelperList();
        $helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_featured_category';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add new', array(), 'Admin.Theme.Transformer')
		);
        $helper->toolbar_btn['edit'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&setting'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Setting', array(), 'Admin.Theme.Transformer'),
		);
		$helper->title = $this->displayName;
		$helper->table = $this->name;
        $helper->orderBy = 'position';
		$helper->orderWay = 'ASC';
        $helper->position_identifier = 'id_st_featured_category';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    public function deleteFeaturedCategories($id_category)
    {
        if ($id_category)
        {
            $cats = Db::getInstance('
            SELECT `id_st_featured_category` FROM '._DB_PREFIX_.'st_featured_category
            WHERE `id_category` = '.(int)$id_category.'
            ');
            foreach($cats AS $cat)
            {
                $obj = new StFeaturedCategoriesClass($cat['id_st_featured_category']);
                $obj->delete();
            }
        }
    }
	public function hookActionCategoryDelete($params)
	{
	    if(isset($params['category']))
	       $this->deleteFeaturedCategories($params['category']->id);
		$this->clearSliderCache();
	}
    public function hookActionCategoryAdd($params)
	{
		$this->clearSliderCache();
	}
	public function hookActionCategoryUpdate($params)
	{
		$this->clearSliderCache();
	}
    public function hookDisplayHeader($params)
    {
        if (!$this->isCached('header.tpl', $this->stGetCacheId('header')))
        {
            $custom_css = '';
            
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
                $img = _MODULE_DIR_.'stthemeeditor/patterns/'.$bg_pattern.'.png';
                $img = $this->context->link->protocol_content.Tools::getMediaServer($img).$img;
                $group_css .= 'background-image: url('.$img.');background-repeat: repeat;';
            }
            if($group_css)
                $custom_css .= '.featured_categories_container.products_container{'.$group_css.'}';
            if ($bg_img_v_offset = (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET')) {
                $custom_css .= '.featured_categories_container.products_container{background-position:center -'.$bg_img_v_offset.'px;}';
            }

            if ($top_padding = (int)Configuration::get($this->_prefix_st.'TOP_PADDING'))
                $custom_css .= '.featured_categories_container.products_container .products_slider{padding-top:'.$top_padding.'px;}';
            if ($bottom_padding = (int)Configuration::get($this->_prefix_st.'BOTTOM_PADDING'))
                $custom_css .= '.featured_categories_container.products_container .products_slider{padding-bottom:'.$bottom_padding.'px;}';

            $top_margin = Configuration::get($this->_prefix_st.'TOP_MARGIN');
            if($top_margin || $top_margin===0 || $top_margin==='0')
                $custom_css .= '.featured_categories_container.products_container{margin-top:'.$top_margin.'px;}';
            $bottom_margin = Configuration::get($this->_prefix_st.'BOTTOM_MARGIN');
            if($bottom_margin || $bottom_margin===0 || $bottom_margin==='0')
                $custom_css .= '.featured_categories_container.products_container{margin-bottom:'.$bottom_margin.'px;}';


            if ($title_font_size = (int)Configuration::get($this->_prefix_st.'TITLE_FONT_SIZE'))
                 $custom_css .= '.featured_categories_container.products_container .title_block_inner{font-size:'.$title_font_size.'px;}';

            if ($title_color = Configuration::get($this->_prefix_st.'TITLE_COLOR'))
                $custom_css .= '.featured_categories_container.products_container .title_block_inner{color:'.$title_color.';}';
            if ($title_hover_color = Configuration::get($this->_prefix_st.'TITLE_HOVER_COLOR'))
                $custom_css .= '.featured_categories_container.products_container .title_block_inner:hover{color:'.$title_hover_color.';}';


            $heading_bottom_border = Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER');
            if($heading_bottom_border || $heading_bottom_border===0 || $heading_bottom_border==='0')
            {
                $custom_css .= '.featured_categories_container.products_container .title_style_0,.featured_categories_container.products_container .title_style_0 .title_block_inner{border-bottom-width:'.$heading_bottom_border.'px;}.featured_categories_container.products_container .title_style_0 .title_block_inner{margin-bottom:'.$heading_bottom_border.'px;}';
                $custom_css .= '.featured_categories_container.products_container .title_style_1 .flex_child, .featured_categories_container.products_container .title_style_3 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;}';
                $custom_css .= '.featured_categories_container.products_container .title_style_2 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;border-top-width:'.$heading_bottom_border.'px;}';
            }
            
            if(Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR'))
                $custom_css .='.featured_categories_container.products_container .title_style_0, .featured_categories_container.products_container .title_style_1 .flex_child, .featured_categories_container.products_container .title_style_2 .flex_child, .featured_categories_container.products_container .title_style_3 .flex_child{border-bottom-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR').';}.featured_categories_container.products_container .title_style_2 .flex_child{border-top-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR').';}';  
            if(Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR_H'))
                $custom_css .='.featured_categories_container.products_container .title_style_0 .title_block_inner{border-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR_H').';}';  


            if ($text_color = Configuration::get($this->_prefix_st.'TEXT_COLOR'))
                $custom_css .= '.featured_categories_container .s_title_block a{color:'.$text_color.';}';

            if ($link_hover_color = Configuration::get($this->_prefix_st.'LINK_HOVER_COLOR'))
                $custom_css .= '.featured_categories_container .s_title_block a:hover{color:'.$link_hover_color.';}';

            if ($grid_hover_bg = Configuration::get($this->_prefix_st.'GRID_HOVER_BG'))
                $custom_css .= '.featured_categories_container .pro_outer_box:hover .pro_second_box{background-color:'.$grid_hover_bg.';}';

            if ($direction_color = Configuration::get($this->_prefix_st.'DIRECTION_COLOR'))
                $custom_css .= '.featured_categories_container .products_slider .swiper-button{color:'.$direction_color.';}';
            if ($direction_color_hover = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_HOVER'))
                $custom_css .= '.featured_categories_container .products_slider .swiper-button:hover{color:'.$direction_color_hover.';}';
            if ($direction_color_disabled = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_DISABLED'))
                $custom_css .= '.featured_categories_container .products_slider .swiper-button.swiper-button-disabled, .featured_categories_container .products_slider .swiper-button.swiper-button-disabled:hover{color:'.$direction_color_disabled.';}';
            
            if ($direction_bg = Configuration::get($this->_prefix_st.'DIRECTION_BG'))
                $custom_css .= '.featured_categories_container .products_slider .swiper-button{background-color:'.$direction_bg.';}';
            if ($direction_hover_bg = Configuration::get($this->_prefix_st.'DIRECTION_HOVER_BG'))
                $custom_css .= '.featured_categories_container .products_slider .swiper-button:hover{background-color:'.$direction_hover_bg.';}';
            if ($direction_disabled_bg = Configuration::get($this->_prefix_st.'DIRECTION_DISABLED_BG'))
                $custom_css .= '.featured_categories_container .products_slider .swiper-button.swiper-button-disabled, .featured_categories_container .products_slider .swiper-button.swiper-button-disabled:hover{background-color:'.$direction_disabled_bg.';}';
            else
                $custom_css .= '.featured_categories_container .products_slider .swiper-button.swiper-button-disabled, .featured_categories_container .products_slider .swiper-button.swiper-button-disabled:hover{background-color:transplanted;}';

            if ($pag_nav_bg = Configuration::get($this->_prefix_st.'PAG_NAV_BG')){
                $custom_css .= '.featured_categories_container .swiper-pagination-bullet,.featured_categories_container .swiper-pagination-progress{background-color:'.$pag_nav_bg.';}';
                $custom_css .= '.featured_categories_container .swiper-pagination-st-round .swiper-pagination-bullet{background-color:transparent;border-color:'.$pag_nav_bg.';}';
                $custom_css .= '.featured_categories_container .swiper-pagination-st-round .swiper-pagination-bullet span{background-color:'.$pag_nav_bg.';}';
            }
            if ($pag_nav_bg_hover = Configuration::get($this->_prefix_st.'PAG_NAV_BG_HOVER')){
                $custom_css .= '.featured_categories_container .swiper-pagination-bullet-active, .featured_categories_container .swiper-pagination-progress .swiper-pagination-progressbar{background-color:'.$pag_nav_bg_hover.';}';
                $custom_css .= '.featured_categories_container .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active{background-color:'.$pag_nav_bg_hover.';border-color:'.$pag_nav_bg_hover.';}';
                $custom_css .= '.featured_categories_container .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active span{background-color:'.$pag_nav_bg_hover.';}';
            }
            
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->display(__FILE__, 'header.tpl', $this->stGetCacheId('header'));
    }
    private function _prepareHook($location= null)
    {
        if (!empty(self::$cache_featured_categories))
            $featured_categories = self::$cache_featured_categories;
        else
        {
            $featured_categories = StFeaturedCategoriesClass::getAll();
            $featured_categories = $this->getTemplateVarCategories($featured_categories);
            self::$cache_featured_categories = $featured_categories;
        }
        $poster = Configuration::get($this->_prefix_st.'VIDEO_POSTER');
        if($poster)
            $this->fetchMediaServer($poster);
		$this->smarty->assign(array(
            'featured_categories'   => $featured_categories,
            'pro_per_fw'            => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_FW'),
            'pro_per_xxl'           => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXL'),
            'pro_per_xl'            => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XL'),
            'pro_per_lg'            => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_LG'),
            'pro_per_md'            => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_MD'),
            'pro_per_sm'            => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_SM'),
            'pro_per_xs'            => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XS'),
            
            'slider_slideshow'      => Configuration::get($this->_prefix_st.'SLIDESHOW'),
            'slider_s_speed'        => Configuration::get($this->_prefix_st.'S_SPEED'),
            'slider_a_speed'        => Configuration::get($this->_prefix_st.'A_SPEED'),
            'slider_pause_on_hover' => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'),
            'rewind_nav'            => Configuration::get($this->_prefix_st.'REWIND_NAV'),
            'lazy_load'             => Configuration::get($this->_prefix_st.'LAZY'),
            'slider_move'           => Configuration::get($this->_prefix_st.'MOVE'),
            'hide_mob'              => Configuration::get($this->_prefix_st.'HIDE_MOB'),
            'aw_display'            => Configuration::get($this->_prefix_st.'AW_DISPLAY'),
            //'display_as_grid'       => Configuration::get($this->_prefix_st.'GRID'),
            'display_as_grid'       => 0, //the module current does not have lie biao xian shi
            'title_position'        => Configuration::get($this->_prefix_st.'TITLE_ALIGN'),
            'direction_nav'         => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'hide_direction_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_DIRECTION_NAV_ON_MOB'),
            'control_nav'           => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
            'hide_control_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_CONTROL_NAV_ON_MOB'),
            'spacing_between'           => Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),

            'has_background_img' => ((int)Configuration::get($this->_prefix_st.'BG_PATTERN') || Configuration::get($this->_prefix_st.'BG_IMG')) ? 1 : 0,
            'speed' => Configuration::get($this->_prefix_st.'SPEED'),
            'bg_img_v_offset'          => (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET'),

            'video_mpfour'  => Configuration::get($this->_prefix_st.'VIDEO_MPFOUR'),
            'video_webm'    => Configuration::get($this->_prefix_st.'VIDEO_WEBM'),
            'video_ogg' => Configuration::get($this->_prefix_st.'VIDEO_OGG'),
            'video_loop'    => Configuration::get($this->_prefix_st.'VIDEO_LOOP'),
            'video_muted'   => Configuration::get($this->_prefix_st.'VIDEO_MUTED'),
            'video_poster'  => $poster,
            'video_v_offset'    => Configuration::get($this->_prefix_st.'VIDEO_V_OFFSET'),
            
            'hide_direction_nav_on_mob'             => (int)Configuration::get($this->_prefix_st.'HIDE_DIRECTION_NAV_ON_MOB'),
            'hide_control_nav_on_mob'             => (int)Configuration::get($this->_prefix_st.'HIDE_CONTROL_NAV_ON_MOB'),
        ));
        return true;
    }
    protected function getTemplateVarCategories($categories)
    {
        if(!is_array($categories) || !count($categories))
            return false;
        return array_map(function (array $category) {
            $object = new Category(
                $category['id_category'],
                $this->context->language->id
            );

            $category['image'] = $this->getImage(
                $object,
                $object->id_image
            );

            $category['url'] = $this->context->link->getCategoryLink(
                $category['id_category'],
                $category['link_rewrite']
            );

            return $category;
        }, $categories);
    }
    protected function getImage($object, $id_image)
    {
        $retriever = new ImageRetriever(
            $this->context->link
        );

        return $retriever->getImage($object, $id_image);
    }
	public function hookDisplayHome($params, $func = '',$flag=0)
	{
        $hook_hash = $this->getHookHash($func ? $func : __FUNCTION__);
	    if (!$this->isCached('stfeaturedcategories.tpl', $this->stGetCacheId($hook_hash))) {
    	    $this->_prepareHook();

            $custom_content = Hook::exec('displayModuleCustomContent', array('type'=>2,'identify'=>'stfeaturedcategories'), null, true);

            $this->smarty->assign(array(
                'hook_hash'      => $hook_hash,
                'custom_content' => $custom_content && array_key_exists('steasycontent', $custom_content) ? $custom_content['steasycontent'] : false,
                'column_slider'  => false,
                'homeverybottom' => ($flag==2 ? true : false),
                'image_type'          => Configuration::get($this->_prefix_st.'IMAGE_TYPE'),
            ));
        }
		return $this->display(__FILE__, 'stfeaturedcategories.tpl', $this->stGetCacheId($hook_hash));
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
			$positions = Tools::getValue('st_featured_category');
            $msg = '';
			if (is_array($positions))
				foreach ($positions as $position => $value)
				{
					$pos = explode('_', $value);

					if ((isset($pos[2])) && ((int)$pos[2] === $id))
					{
						if ($object = new StFeaturedCategoriesClass((int)$pos[2]))
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
    public function renderWidget($hookName = null, array $configuration = [])
    {
        return;
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return;
    }
}
