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
include_once(_PS_MODULE_DIR_.'stthemeeditor/classes/BaseSlider.php');
include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogSliderClass.php');
include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogCategory.php');
class StBlogFeaturedArticles extends BaseSlider
{
    protected static $cache_array = array();
    public  $fields_list;
    public $_prefix_st = 'ST_B_FEATURED_';
    public $_prefix_stsn = 'STSN_B_FEATURED_';
	public $spacer_size = '5';
    protected $fields_default_stsn = array();
    protected $type = 1;
    public $dropdownlistgroup_default = array(
        'pro_per_fw' => 0,
        'pro_per_xxl' => 5,
        'pro_per_xl' => 4,
        'pro_per_lg' => 4,
        'pro_per_md' => 3,
        'pro_per_sm' => 3,
        'pro_per_xs' => 2,
    );
    protected $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Date add: Desc', 'orderBy'=>'date_add', 'orderWay'=>'DESC'),
        2 => array('id' =>2 , 'name' => 'Date add: Asc', 'orderBy'=>'date_add', 'orderWay'=>'ASC'),
        3 => array('id' =>3 , 'name' => 'Date update: Desc', 'orderBy'=>'date_upd', 'orderWay'=>'DESC'),
        4 => array('id' =>4 , 'name' => 'Date update: Asc', 'orderBy'=>'date_upd', 'orderWay'=>'ASC'),
        5 => array('id' =>5 , 'name' => 'Blog ID: Desc', 'orderBy'=>'id_st_blog', 'orderWay'=>'DESC'),
        6 => array('id' =>6 , 'name' => 'Blog ID: Asc', 'orderBy'=>'id_st_blog', 'orderWay'=>'ASC'),
        7 => array('id' =>7 , 'name' => 'Position: Desc', 'orderBy'=>'position', 'orderWay'=>'DESC'),
        8 => array('id' =>8 , 'name' => 'Position: Asc', 'orderBy'=>'position', 'orderWay'=>'ASC'),
    );  
    public static $items = array(
		array('id' => 2, 'name' => '2'),
		array('id' => 3, 'name' => '3'),
		array('id' => 4, 'name' => '4'),
		array('id' => 5, 'name' => '5'),
		array('id' => 6, 'name' => '6'),
    );
    public static $location = array(
        24   => array('id' =>24 , 'name' => 'Blog homepage full width top' , 'hook' => 'StBlogFullWidthTop', 'is_blog' => 1),
        26   => array('id' =>26 , 'name' => 'Blog homepage top'         , 'hook' => 'StBlogHomeTop', 'is_blog' => 1),
        25   => array('id' =>25 , 'name' => 'Blog homepage'             , 'hook' => 'StBlogHome', 'is_blog' => 1),
        // 27   => array('id' =>27 , 'name' => 'Blog homepage bottom'      , 'hook' => 'StBlogHomeBottom', 'is_blog' => 1),
        28   => array('id' =>28 , 'name' => 'Blog homepage full width bottom' , 'hook' => 'StBlogFullWidthBottom', 'is_blog' => 1),
        29   => array('id' =>29 , 'name' => 'Blog left column'          , 'hook' => 'StBlogLeftColumn', 'column'=>1, 'is_blog' => 1),
        30   => array('id' =>30 , 'name' => 'Blog right column'         , 'hook' => 'StBlogRightColumn', 'column'=>1, 'is_blog' => 1),

        1   => array('id' =>1 , 'name' => 'Full width top'          , 'hook' => 'FullWidthTop', 'full_width' => 1, 'index_slider' => 1),
        2   => array('id' =>2 , 'name' => 'Full width top 2'        , 'hook' => 'FullWidthTop2', 'full_width' => 1, 'index_slider' => 1),
        3   => array('id' =>3 , 'name' => 'Homepage top'            , 'hook' => 'HomeTop'),
        4   => array('id' =>4 , 'name' => 'Homepage'                , 'hook' => 'Home'),
        5   => array('id' =>5 , 'name' => 'Homepage bottom'         , 'hook' => 'HomeBottom'),
        6   => array('id' =>6 , 'name' => 'Homepage left'           , 'hook' => 'HomeLeft'),
        7   => array('id' =>7 , 'name' => 'Homepage Right'          , 'hook' => 'HomeRight'),
        8   => array('id' =>8 , 'name' => 'Homepage first quarter'  , 'hook' => 'HomeFirstQuarter'),
        9   => array('id' =>9 , 'name' => 'Homepage second quarter' , 'hook' => 'HomeSecondQuarter'),
        10  => array('id' =>10 , 'name' => 'Homepage third quarter'  , 'hook' => 'HomeThirdQuarter'),
        11  => array('id' =>11 , 'name' => 'Homepage fourth quarter' , 'hook' => 'HomeFourthQuarter'),
        12  => array('id' =>12 , 'name' => 'Full width Bottom'       , 'hook' => 'FullWidthBottom', 'full_width' => 1, 'index_slider' => 1),
        13  => array('id' =>13   , 'name' => 'Left column'           , 'hook' => 'LeftColumn', 'column'=>1),
        14  => array('id' =>14 , 'name' => 'Right column'            , 'hook' => 'RightColumn', 'column'=>1),
        35  => array('id' =>35 , 'name' => 'Product left column'    , 'hook' => 'LeftColumnProduct', 'column'=>1),
        15  => array('id' =>15 , 'name' => 'Product right column'    , 'hook' => 'RightColumnProduct', 'column'=>1),
        
        16   => array('id' =>16 , 'name' => 'Stacked footer (Column 1)'  , 'hook' => 'StackedFooter1', 'is_stacked_footer'=>1),
        17   => array('id' =>17 , 'name' => 'Stacked footer (Column 2)'  , 'hook' => 'StackedFooter2', 'is_stacked_footer'=>1),
        18   => array('id' =>18 , 'name' => 'Stacked footer (Column 3)'  , 'hook' => 'StackedFooter3', 'is_stacked_footer'=>1),
        19   => array('id' =>19 , 'name' => 'Stacked footer (Column 4)'  , 'hook' => 'StackedFooter4', 'is_stacked_footer'=>1),
        20   => array('id' =>20 , 'name' => 'Stacked footer (Column 5)'  , 'hook' => 'StackedFooter5', 'is_stacked_footer'=>1),
        21   => array('id' =>21 , 'name' => 'Stacked footer (Column 6)'  , 'hook' => 'StackedFooter6', 'is_stacked_footer'=>1),
        
        22   => array('id' =>22 , 'name' => 'Footer'                     , 'hook' => 'Footer'),        
        23   => array('id' =>23 , 'name' => 'Footer after'               , 'hook' => 'FooterAfter'),
    );
    private $templateFile = array();
	function __construct()
	{
	    if (!$this->name) {
    	    $this->name           = 'stblogfeaturedarticles';
    		$this->version        = '1.0.1';
            $this->displayName = $this->getTranslator()->trans('Blog Module - Article Slider', array(), 'Modules.Stblog.Admin');
    		$this->description = $this->getTranslator()->trans('Display articles from different categories.', array(), 'Modules.Stblog.Admin');   
	    }
		parent::__construct();
        $this->templateFile = array(
            'module:stthemeeditor/views/templates/slider/header.tpl',
            'module:stblogfeaturedarticles/views/templates/hook/home.tpl',
            'module:stblogfeaturedarticles/views/templates/hook/footer.tpl',
            'module:stblogfeaturedarticles/views/templates/hook/tab.tpl',
            );
    }
	function install()
	{
		if (!parent::install())
			return false;
        $res = true;
		foreach(Shop::getShops(false) as $shop)
			$res &= $this->sampleData($shop['id_shop']);
        $this->prepareHooks();
        $this->clearSliderCache();
		return $res;
	}
	public function uninstall()
	{
        $this->clearSliderCache();
		// Delete configuration
		return parent::uninstall();
	}
    function sampleData($id_shop)
    {
        $ret = true;
        $samples = array(
            array(
                'type'                      => 1,
                'display_on'                => 5,
                'id_st_blog_category'       => 2,
                'id_shop'                   => (int)$id_shop,
                'direction_nav'             => 1,
                'hide_direction_nav_on_mob' => 1,
                'aw_display'                => 1,
                'nbr'                       => 8,
                'pro_per_xxl'               => 5,
                'pro_per_xl'                => 4,
                'pro_per_lg'                => 4,
                'pro_per_md'                => 3,
                'pro_per_sm'                => 2,
                'pro_per_xs'                => 1,
                'spacing_between'           => 16,
                's_speed'                   => 7000,
                'a_speed'                   => 400,
                'lazy'                      => 1,
                'speed'                     => 0.6,
            ),
        );
        foreach($samples AS $sample) {
            if (Db::getInstance()->getValue('SELECT COUNT(0) FROM `'._DB_PREFIX_.'st_blog_slider` 
                WHERE `type`='.(int)$sample['type'].' 
                AND `display_on`='.(int)$sample['display_on'].'
                AND `id_st_blog_category`='.(int)$sample['id_st_blog_category'].'
                AND `id_shop`='.(int)$sample['id_shop'])) {
                continue;
            }
            $module = new StBlogSliderClass;
            $module->type = $sample['type'];
            $module->display_on = $sample['display_on'];
            $module->id_st_blog_category = $sample['id_st_blog_category']; 
            $module->id_shop = $sample['id_shop'];
            $module->active = 1;
            $module->direction_nav = $sample['direction_nav'];
            $module->hide_direction_nav_on_mob = $sample['hide_direction_nav_on_mob'];
            $module->aw_display = $sample['aw_display'];
            $module->nbr = $sample['nbr'];
            $module->pro_per_xxl = $sample['pro_per_xxl'];
            $module->pro_per_xl = $sample['pro_per_xl'];
            $module->pro_per_lg = $sample['pro_per_lg'];
            $module->pro_per_md = $sample['pro_per_md'];
            $module->pro_per_sm = $sample['pro_per_sm'];
            $module->pro_per_xs = $sample['pro_per_xs'];
            $module->spacing_between = $sample['spacing_between'];
            $module->s_speed = $sample['s_speed'];
            $module->a_speed = $sample['a_speed'];
            $module->lazy = $sample['lazy'];
            $module->speed = $sample['speed'];
            $ret &= $module->add(); 
        }
        return $ret;
    }
    public function getContent()
	{
        $check_result = $this->_checkImageDir();
        $this->context->controller->addCSS($this->_path.'views/css/admin.css');
        $this->context->controller->addJS($this->_path.'views/js/admin.js');
		$id_st_blog_slider = (int)Tools::getValue('id_st_blog_slider');

        if(Tools::getValue('act')=='delete_slider_image' && $id = Tools::getValue('st_s_id'))
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            $k = Tools::getValue('st_s_k');
            
            $blog_slider = new StBlogSliderClass((int)$id);
            if(Validate::isLoadedObject($blog_slider))
            {
                $blog_slider->$k = '';
                if($blog_slider->save())
                {
                    $result['r'] = true;
                }
            }
            die(json_encode($result));
        }
        if(Tools::getValue('act')=='delete_image' && $field=Tools::getValue('field'))
        {
            return $this->AjaxDeleteImage($field);
        }
		if (isset($_POST['save'.$this->name]) || isset($_POST['saves'.$this->name.'AndStay']))
		{
            $error = array();
            
			if ($id_st_blog_slider)
				$blog_slider = new StBlogSliderClass((int)$id_st_blog_slider);
			else
				$blog_slider = new StBlogSliderClass();
                
			$blog_slider->copyFromPost();
            if ($this->type == 1 && !Tools::getValue('id_st_blog_category')) {
                $error[] = $this->displayError($this->getTranslator()->trans('The field "Category" is required', array(), 'Modules.Stblog.Admin'));
            }
            $blog_slider->type=$this->type;
            $blog_slider->id_shop = (int)Shop::getContextShopID();

            if(Configuration::get($this->_prefix_st.'GRID')==1)
            {
                if(in_array($blog_slider->pro_per_fw, array(7,9,11)))
                    $blog_slider->pro_per_fw--;
                if(in_array($blog_slider->pro_per_xxl, array(7,9,11)))
                    $blog_slider->pro_per_xxl--;
                if(in_array($blog_slider->pro_per_xl, array(7,9,11)))
                    $blog_slider->pro_per_xl--;
                if(in_array($blog_slider->pro_per_lg, array(7,9,11)))
                    $blog_slider->pro_per_lg--;
                if(in_array($blog_slider->pro_per_md, array(7,9,11)))
                    $blog_slider->pro_per_md--;
                if(in_array($blog_slider->pro_per_sm, array(7,9,11)))
                    $blog_slider->pro_per_sm--;
                if(in_array($blog_slider->pro_per_xs, array(7,9,11)))
                    $blog_slider->pro_per_xs--;
            }
            
            $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));

			if (!count($error) && $blog_slider->validateFields(false) && $blog_slider->validateFieldsLang(false))
            {
                /*position*/
                $blog_slider->position = $blog_slider->checkPostion($this->type);
                
                $res = $this->stUploadImage('bg_img');
                if(count($res['error']))
                    $error = array_merge($error,$res['error']);
                elseif($res['image'])
                {
                    $blog_slider->bg_img = $res['image'];
                }

                $res = $this->stUploadImage('video_poster');
                if(count($res['error']))
                    $error = array_merge($error,$res['error']);
                elseif($res['image'])
                {
                    $blog_slider->video_poster = $res['image'];
                }
                
                if($blog_slider->save())
                {
                    $this->prepareHooks();
                    $this->clearSliderCache();
                    if(isset($_POST['save'.$this->name.'AndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_blog_slider='.$blog_slider->id.'&conf='.($id_st_blog_slider?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Setting', array(), 'Admin.Theme.Transformer').' '.($id_st_blog_slider ? $this->getTranslator()->trans('updated', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('added', array(), 'Admin.Theme.Transformer')));
                        
                }
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during ', array(), 'Modules.Stblog.Admin').' '.($id_st_blog_slider ? $this->getTranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->getTranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
			else
				$this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('Invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
		}
	    if (Tools::isSubmit('status'.$this->name))
        {
            $blog_slider = new StBlogSliderClass((int)$id_st_blog_slider);
            if($blog_slider->id && $blog_slider->toggleStatus())
            {
                $this->clearSliderCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if (Tools::isSubmit('way') && Tools::isSubmit('id_st_blog_slider') && (Tools::isSubmit('position')))
		{
		    $prduct_categories = new StBlogSliderClass((int)$id_st_blog_slider);
            if($prduct_categories->id && $prduct_categories->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position'), $this->type))
            {
                $this->clearSliderCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('Failed to update the position.', array(), 'Admin.Theme.Transformer'));
		}
        if (Tools::getValue('action') == 'updatePositions')
        {
            $this->processUpdatePositions();
        }
		if (Tools::isSubmit('update'.$this->name) || Tools::isSubmit('add'.$this->name))
		{
            $helper = $this->initForm();
            $this->_tabs = array(
                '0' => array('id'  => '0', 'name' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer')),
                '1,5' => array('id'  => '1,5', 'name' => $this->getTranslator()->trans('Other settings', array(), 'Admin.Theme.Transformer')),
                '2' => array('id'  => '2', 'name' => $this->getTranslator()->trans('Homepage', array(), 'Admin.Theme.Transformer')),
                '3' => array('id'  => '3', 'name' => $this->getTranslator()->trans('Left or right column', array(), 'Admin.Theme.Transformer')),
                '4' => array('id'  => '4', 'name' => $this->getTranslator()->trans('Footer', array(), 'Admin.Theme.Transformer')),
            );
            $this->smarty->assign(array(
                'bo_tabs' => $this->_tabs,
                'bo_tab_content' => $helper->generateForm($this->fields_form),
            ));
    
            return $this->_html.$this->fetch(_PS_MODULE_DIR_.'stblogfeaturedarticles/views/templates/hook/bo_tab_layout.tpl');
		}
		elseif (Tools::isSubmit('delete'.$this->name))
		{
			$blog_slider = new StBlogSliderClass((int)$id_st_blog_slider);
			if ($blog_slider->id)
                $blog_slider->delete();
            $this->prepareHooks();
            $this->clearSliderCache();
                
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else
		{
			$helper = $this->initList();
            $this->_html .= '<script type="text/javascript">var currentIndex="'.AdminController::$currentIndex.'&configure='.$this->name.'";</script>';
			return $this->_html.$helper->generateList(StBlogSliderClass::getListContent($this->type), $this->fields_list);
		}
	}
    // Override parent method.
    public function getFormFieldsDefault()
    {
        return array();
    }
    public static function getCategories()
    {
        $module = new StBlogFeaturedArticles();
        $root_category = StBlogCategory::getTopCategory();
        $category_arr = array();
        $module->getCategoryOption($category_arr,$root_category->id);
        return $category_arr;
    }
    private function getCategoryOption(&$category_arr,$id_st_blog_category = 1, $id_lang = false, $id_shop = false, $recursive = true,$selected_id_st_blog_category=0)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
        $id_shop = $id_shop ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$category = new StBlogCategory((int)$id_st_blog_category, (int)$id_lang, (int)$id_shop);

		if (is_null($category->id))
			return;

		if ($recursive)
		{
			$children = StBlogCategory::getChildren((int)$id_st_blog_category, (int)$id_lang, (int)$id_shop, false);
			$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$category->level_depth);
		}

		$shop = (object) Shop::getShop((int)$id_shop);
		$category_arr[] = array(
            'id' => $category->id,
            'name' => (isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')',
        );
        
		if (isset($children) && count($children))
			foreach ($children as $child)
			{
				$this->getCategoryOption($category_arr,(int)$child['id_st_blog_category'], (int)$id_lang, (int)$id_shop,$recursive,$selected_id_st_blog_category);
			}
	}
    public function createLinks()
    {
        return $this->getCategories();
    }
	protected function initForm()
	{
	    $id_st_blog_slider = (int)Tools::getValue('id_st_blog_slider');
		$blog_slider = new StBlogSliderClass($id_st_blog_slider);
	    $this->fields_form = array();
        $fields = $this->getFormFields();
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Blog article sldier', array(), 'Modules.Stblog.Admin'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                'category' => array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Blog category:', array(), 'Modules.Stblog.Admin'),
					'name' => 'id_st_blog_category',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => $this->createLinks(),
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => '',
							'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer')
						)
					),
				),
				'show_on' => array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Display on:', array(), 'Admin.Theme.Transformer'),
					'name' => 'display_on',
                    'class' => 'fixed-width-xxl',
					'options' => array(
						'query' => self::$location,
        				'id' => 'id',
        				'name' => 'name',
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
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
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
        
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Other settings', array(), 'Admin.Theme.Transformer'),
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
        
        $image_types_arr = array();
        $imagesTypes = StBlogImageClass::getDefImageTypes();
        foreach ($imagesTypes[1] as $k => $imageType) {
            if (!isset($imageType[0]) || !$imageType[0] || !isset($imageType[1]) || !$imageType[1]) {
                continue;
            }
            $image_types_arr[$k] = array('id' => $k, 'name' => $k.'('.$imageType[0].' x '.$imageType[1].')');
        }
        if ($blog_slider->id) {        
            $option = array(
                'spacing' => (int)$blog_slider->spacing_between,
                'per_lg'  => (int)$blog_slider->pro_per_lg,
                'per_xl'  => (int)$blog_slider->pro_per_xl,
                'per_xxl' => (int)$blog_slider->pro_per_xxl,
                'page'    => in_array($blog_slider->display_on, array(24,25,26,28,29,30)) ? 'module-stblog-article' : 'index',
            );
            $fields['home_slider']['image_type']['desc'] = $this->calcImageWidth($option);
        }
        $fields['home_slider']['image_type']['options']['query'] = $image_types_arr;
        $fields['home_slider']['image_type']['options']['default_value'] = 'medium';
        $fields['home_slider']['image_type']['options']['default'] = array(
            'value' => '',
            'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer'),
        );
        
        $fields['home_slider']['grid']['label'] = $this->getTranslator()->trans('How to display articles:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['grid']['values'] = array_merge($fields['home_slider']['grid']['values'], array(
            array(
                'id' => 'grid_liebiao',
                'value' => 3,
                'label' => $this->getTranslator()->trans('List', array(), 'Admin.Theme.Transformer')),
            array(
                'id' => 'grid_zuoyou',
                'value' => 4,
                'label' => $this->getTranslator()->trans('Meida image', array(), 'Admin.Theme.Transformer')),
            )
        );
        
        $fields['home_slider']['nbr']['label'] = $this->getTranslator()->trans('Define the number of articles to be displayed:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['spacing_between']['label'] = $this->getTranslator()->trans('Spacing between articles:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['display_sd']['label'] = $this->getTranslator()->trans('Display article short description:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['spacing_between']['desc'][0] = $this->getTranslator()->trans('Distance between articles.', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['link_hover_color']['label'] = $this->getTranslator()->trans('Article name hover color:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['display_sd']['values'] = array_merge($fields['home_slider']['display_sd']['values'],
                array(
                    array(
                        'id' => 'display_sd_short',
                        'value' => 3,
                        'label' => $this->getTranslator()->trans('Yes, 120 characters', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_sd_4',
                        'value' => 4,
                        'label' => $this->getTranslator()->trans('Content, 120 characters', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_sd_5',
                        'value' => 5,
                        'label' => $this->getTranslator()->trans('Content, 220 characters', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_sd_6',
                        'value' => 6,
                        'label' => $this->getTranslator()->trans('Content, about 5 lines', array(), 'Admin.Theme.Transformer')),
                    array(
                        'id' => 'display_sd_7',
                        'value' => 7,
                        'label' => $this->getTranslator()->trans('Content, about 10 lines', array(), 'Admin.Theme.Transformer'))
                    )
                ); 

        unset($fields['home_slider']['price_color']);
        
        $this->fields_form[2]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Slider on homepage', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
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
        $this->fields_form[2]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
		);
        
        $fields['column']['display_pro_col']['label'] = $this->getTranslator()->trans('How to display articles:', array(), 'Admin.Theme.Transformer');
        $fields['column']['nbr_col']['label'] = $this->getTranslator()->trans('Define the number of articles to be displayed:', array(), 'Admin.Theme.Transformer');
        $fields['column']['items_col']['label'] = $this->getTranslator()->trans('How many articles per view on compact slider:', array(), 'Admin.Theme.Transformer');
        unset($fields['column']['aw_display_col']);
		$this->fields_form[3]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Slide on the left column/right column/X quarter', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => $fields['column'],
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
        
        
        $fields['footer']['nbr_fot']['label'] = $this->getTranslator()->trans('Define the number of articles to be displayed:', array(), 'Admin.Theme.Transformer');
        //unset($fields['footer']['aw_display_fot']);
        $this->fields_form[4]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Footer', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => $fields['footer'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);
        $this->fields_form[4]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
		);
        
        $this->fields_form[5]['form'] = array(
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
        $this->fields_form[5]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
		);
        
        if($blog_slider->id)
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_blog_slider');

            if ($blog_slider->bg_img)
            {
                StBlogSliderClass::fetchMediaServer($blog_slider->bg_img);
                $this->fields_form[2]['form']['input']['bg_img']['desc'][] = '<div class="image_thumb_block"><img src="'.($blog_slider->bg_img).'" class="st_thumb_nail" /><div><a class="btn btn-default delete_slider_image" href="javascript:;" data-s_id="'.(int)$blog_slider->id.'" data-s_k="bg_img"><i class="icon-trash"></i>'.$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer').'</a></div></div>';
            }
            if ($blog_slider->video_poster)
            {
                StBlogSliderClass::fetchMediaServer($blog_slider->video_poster);
                $this->fields_form[5]['form']['input']['video_poster']['desc'][] = '<div class="image_thumb_block"><img src="'.($blog_slider->video_poster).'" class="st_thumb_nail" /><div><a class="btn btn-default delete_slider_image" href="javascript:;" data-s_id="'.(int)$blog_slider->id.'" data-s_k="video_poster"><i class="icon-trash"></i> '.$this->getTranslator()->trans('Delete', array(), 'Admin.Theme.Transformer').'</a></div></div>';
            }
        }

        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'save'.$this->name;
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($blog_slider),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);       
        $name = $this->fields_form[2]['form']['input']['dropdownlistgroup']['name'];
        foreach ($this->fields_form[2]['form']['input']['dropdownlistgroup']['values']['medias'] as $v)
        {
            $dropdownlistgroup_key = $name.'_'.$v;
            $helper->tpl_vars['fields_value'][$dropdownlistgroup_key] = $blog_slider->id ? $blog_slider->$dropdownlistgroup_key : $this->dropdownlistgroup_default[$dropdownlistgroup_key];
        }

		return $helper;
	}
    public static function displayCategory($value, $row)
	{
        if(!$value)
            return '--';
        $id_lang = (int)Context::getContext()->language->id;
        $category = new StBlogCategory((int)$value,$id_lang);
        if($category->id)
            return $category->name;
		return '';
	}
    public static function displayShowOn($value, $row)
    {
        if (key_exists((int)$value, self::$location)) {
            return self::$location[$value]['name'];
        }
        return '--';
    }
	protected function initList()
	{
	    // Fix table drag bug.
        Media::addJsDef(array(
            'currentIndex' => AdminController::$currentIndex.'&configure='.$this->name,
        ));
		$this->fields_list = array(
			'id_st_blog_slider' => array(
				'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'id_st_blog_category' => array(
				'title' => $this->getTranslator()->trans('Blog category', array(), 'Admin.Theme.Transformer'),
				'width' => 140,
				'type' => 'text',
				'callback' => 'displayCategory',
				'callback_object' => get_class($this),
                'search' => false,
                'orderby' => false
			),
            'display_on' => array(
				'title' => $this->getTranslator()->trans('Show on', array(), 'Admin.Theme.Transformer'),
				'width' => 140,
				'type' => 'text',
				'callback' => 'displayShowOn',
				'callback_object' => get_class($this),
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
				'active' => 'status',
				'type' => 'bool',
				'width' => 25,
                'search' => false,
                'orderby' => false
            ),
		);

		if (Shop::isFeatureActive())
			$this->fields_list['id_shop'] = array(
                'title' => $this->getTranslator()->trans('ID Shop', array(), 'Admin.Theme.Transformer'), 
                'align' => 'center', 
                'width' => 25, 
                'type' => 'int',
                'search' => false,
                'orderby' => false
                );

		$helper = new HelperList();
		$helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_blog_slider';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->getTranslator()->trans('Add new', array(), 'Admin.Theme.Transformer')
		);
		$helper->title = $this->displayName;
		$helper->table = $this->name;
		//$helper->orderBy = 'position';
		//$helper->orderWay = 'ASC';
	    //$helper->position_identifier = 'id_st_blog_slider';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
	public function hookDisplayHome($params, $func=0, $flag=0)
	{
	    $display_on = $this->getDisplayOn($func ? $func : __FUNCTION__);
        if (!$display_on) {
            return false;
        }
        if(!$this->isCached($this->templateFile[1], $this->stGetCacheId($display_on)))
        {
            $this->_prepareHook('', $display_on);
            $this->smarty->assign(array(
                'column_slider'         => false,
                'homeverybottom'         => ($flag==2 ? true : false),
            ));
        }
        return $this->fetch($this->templateFile[1], $this->stGetCacheId($display_on));
	}    

    public function hookDisplayStBlogHome($params, $func=0, $flag=0)
    {
        $display_on = $this->getDisplayOn($func ? $func : __FUNCTION__);
        
        if (!$display_on) {
            return false;
        }
        if(!$this->isCached($this->templateFile[1], $this->stGetCacheId($display_on)))
        {
            $this->_prepareHook('', $display_on);
            $this->smarty->assign(array(
                'column_slider'         => false,
                'is_blog'         => true,
                'homeverybottom'         => ($flag==2 ? true : false),
            ));
        }
        return $this->fetch($this->templateFile[1], $this->stGetCacheId($display_on));
    }  

	public function hookDisplayLeftColumn($params, $func=0)
	{
	    $display_on = $this->getDisplayOn($func ? $func : __FUNCTION__);
        if (!$display_on) {
            return false;
        }
	    if (!$this->isCached($this->templateFile[1], $this->stGetCacheId($display_on)))
    	{
            $this->_prepareHook('col',$display_on);
            $this->smarty->assign(array(
                'column_slider'         => true,
            ));
        }
		return $this->fetch($this->templateFile[1], $this->stGetCacheId($display_on));
	}
    private function _prepareHook($ext='',$display_on=0)
    {        
        $ext = $ext ? '_'.strtolower($ext) : '';
        if (!$display_on) {
            return false;
        }
        $key = $this->type.'-'.$display_on;
        if (isset(self::$cache_array[$key]) && self::$cache_array[$key])
            $result = self::$cache_array[$key];
        else
        {
            $result = StBlogSliderClass::getListContent($this->type, 1, $display_on);
            
            if(!is_array($result) || !count($result))     
                $result = array();
            include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');
            include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogImageClass.php');
            foreach($result as $k=>&$v)
            {
                $order_by = isset($this->sort_by[$v['soby'.$ext]]) ? $this->sort_by[$v['soby'.$ext]]['orderBy'] : 'position';
                $order_way = isset($this->sort_by[$v['soby'.$ext]]) ? $this->sort_by[$v['soby'.$ext]]['orderWay'] : 'ASC';
                
                if ($this->type == 2) {
                    $v['link'] = '';
                    $v['name' ] = $this->getTranslator()->trans('Recent articles', array(), 'Shop.Theme.Transformer');
                    // $v['description' ] = '';
                    $v['blogs'] = StBlogClass::getRecentArticles((int)$v['nbr'.$ext], $order_by, $order_way);
                } else {
                    $category = new StBlogCategory((int)$v['id_st_blog_category'], (int)$this->context->language->id);
                    if(!$category->active)
                    {
                        unset($result[$k]);
                        continue;
                    }
                    $v['link'] = $category->getLink();
                    $v['is_root_category'] = $category->is_root_category;
                    $v['name' ] = $category->name;
                    // $v['description' ] = $category->description;
                    $v['blogs'] = $category->getBlogs((int)$this->context->language->id, 1, (int)$v['nbr'.$ext], $order_by, $order_way);
                }
                if ($v['video_poster']) {
                    $v['video_poster'] = $v['video_poster'];
                    $this->fetchMediaServer($v['video_poster']);
                }
                //basesldier did this job
                // $v['is_full_width'] = isset(self::$location[$v['location']]['full_width']);//the same code in displayHeader function
                // $v['is_stacked_footer'] = isset(self::$location[$v['location']]['is_stacked_footer']);
            }
            self::$cache_array[$key] = $result;
        }
        $this->smarty->assign(array(
            'blog_categories'      => $result,
            'title_align'          => Configuration::get($this->_prefix_st.'TITLE_ALIGN'),
            'hook_hash'            => $display_on,
            'blog_slider_type'            => $this->type,
        ));
        return true;
    }
    
    public function hookDisplayHeader($params)
    {
        if (!$this->isCached($this->templateFile[0], $this->getCacheId()))
        {
            $custom_css = '';
            $custom_css_arr = StBlogSliderClass::getOptions($this->type);
            if (is_array($custom_css_arr) && count($custom_css_arr)) {
                foreach ($custom_css_arr as $v) {
                    
                    $prefix = '#category_blogs_container_'.$v['id_st_blog_slider'];

                    if($v['grid']==1)
                    {
                        $custom_css .= $prefix.' .product_list.grid .product_list_item{padding-left:'.ceil($v['spacing_between']/2).'px;padding-right:'.floor($v['spacing_between']/2).'px;}';
                        $custom_css .= $prefix.' .product_list.grid{margin-left:-'.ceil($v['spacing_between']/2).'px;margin-right:-'.floor($v['spacing_between']/2).'px;}';
                    }
                    
                    $group_css = '';
                    if ($v['bg_color'])
                        $group_css .= 'background-color:'.$v['bg_color'].';';
                    if ($v['bg_img'])
                    {
                        $this->fetchMediaServer($v['bg_img']);
                        $group_css .= 'background-image: url('.$v['bg_img'].');';
                    }
                    elseif ($v['bg_pattern'])
                    {
                        $img = _MODULE_DIR_.'stthemeeditor/patterns/'.$v['bg_pattern'].'.png';
                        $img = $this->context->link->protocol_content.Tools::getMediaServer($img).$img;
                        $group_css .= 'background-image: url('.$img.');background-repeat: repeat;';
                    }
                    if ($v['bg_img_v_offset']) {
                        $custom_css .= $prefix.'.products_container{background-position:center -'.$v['bg_img_v_offset'].'px;}';
                    }
                    if($group_css)
                        $custom_css .= $prefix.'.products_container{'.$group_css.'}';
        
                    if ($v['top_padding'])
                        $custom_css .= $prefix.'.products_container{padding-top:'.$v['top_padding'].'px;}';
                    if ($v['bottom_padding'])
                        $custom_css .= $prefix.'.products_container{padding-bottom:'.$v['bottom_padding'].'px;}';
        
                    if($v['top_margin'] || $v['top_margin']===0 || $v['top_margin']==='0')
                        $custom_css .= $prefix.'.products_container{margin-top:'.$v['top_margin'].'px;}';
                    if($v['bottom_margin'] || $v['bottom_margin']===0 || $v['bottom_margin']==='0')
                        $custom_css .= $prefix.'.products_container{margin-bottom:'.$v['bottom_margin'].'px;}';
        
                    if ($v['title_font_size'])
                         $custom_css .= $prefix.'.products_container .title_block_inner{font-size:'.$v['title_font_size'].'px;}';
        
                    if ($v['title_color'])
                        $custom_css .= $prefix.'.products_container .title_block_inner{color:'.$v['title_color'].';}';
                    if ($v['title_hover_color'])
                        $custom_css .= $prefix.'.products_container .title_block_inner:hover{color:'.$v['title_hover_color'].';}';
        
        
                    if($v['title_bottom_border'] || $v['title_bottom_border']===0 || $v['title_bottom_border']==='0')
                    {
                        $custom_css .= $prefix.'.products_container .title_style_0,'.$prefix.'.products_container .title_style_0 .title_block_inner{border-bottom-width:'.$v['title_bottom_border'].'px;}'.$prefix.'.products_container .title_style_0 .title_block_inner{margin-bottom:'.$v['title_bottom_border'].'px;}';
                        $custom_css .= $prefix.'.products_container .title_style_1 .flex_child, '.$prefix.'.products_container .title_style_3 .flex_child{border-bottom-width:'.$v['title_bottom_border'].'px;}';
                        $custom_css .= $prefix.'.products_container .title_style_2 .flex_child{border-bottom-width:'.$v['title_bottom_border'].'px;border-top-width:'.$v['title_bottom_border'].'px;}';
                    }
                    
                    if($v['title_bottom_border_color'])
                        $custom_css .=$prefix.'.products_container .title_style_0, '.$prefix.'.products_container .title_style_1 .flex_child, '.$prefix.'.products_container .title_style_2 .flex_child, '.$prefix.'.products_container .title_style_3 .flex_child{border-bottom-color: '.$v['title_bottom_border_color'].';}'.$prefix.'.products_container .title_style_2 .flex_child{border-top-color: '.$v['title_bottom_border_color'].';}';  
                    if($v['title_bottom_border_color_h'])
                        $custom_css .=$prefix.'.products_container .title_style_0 .title_block_inner{border-color: '.$v['title_bottom_border_color_h'].';}';
        
                    
                    if ($v['text_color'])
                        $custom_css .= $prefix.' .block_blog .s_title_block a,
                        '.$prefix.' .block_blog .blog_info,
                        '.$prefix.' .block_blog .blok_blog_short_content{color:'.$v['text_color'].';}';
        
                    if ($v['link_hover_color'])
                        $custom_css .= $prefix.' .block_blog .s_title_block a:hover{color:'.$v['link_hover_color'].';}';
        
                    if ($v['grid_bg'])
                        $custom_css .= $prefix.' .block_blog .pro_outer_box .pro_second_box{background-color:'.$v['grid_bg'].';}';
                    if ($v['grid_hover_bg'])
                        $custom_css .= $prefix.' .block_blog .pro_outer_box:hover .pro_second_box{background-color:'.$v['grid_hover_bg'].';}';
        
                    if ($v['direction_color'])
                        $custom_css .= $prefix.' .products_slider .swiper-button{color:'.$v['direction_color'].';}';
                    if ($v['direction_color_hover'])
                        $custom_css .= $prefix.' .products_slider .swiper-button:hover{color:'.$v['direction_color_hover'].';}';
                    if ($v['direction_color_disabled'])
                        $custom_css .= $prefix.' .products_slider .swiper-button.swiper-button-disabled, '.$prefix.' .products_slider .swiper-button.swiper-button-disabled:hover{color:'.$v['direction_color_disabled'].';}';
                    
                    if ($v['direction_bg'])
                        $custom_css .= $prefix.' .products_slider .swiper-button{background-color:'.$v['direction_bg'].';}';
                    if ($v['direction_hover_bg'])
                        $custom_css .= $prefix.' .products_slider .swiper-button:hover{background-color:'.$v['direction_hover_bg'].';}';
                    if ($v['direction_disabled_bg'])
                        $custom_css .= $prefix.' .products_slider .swiper-button.swiper-button-disabled, '.$prefix.' .products_slider .swiper-button.swiper-button-disabled:hover{background-color:'.$v['direction_disabled_bg'].';}';
                    else
                        $custom_css .= $prefix.' .products_slider .swiper-button.swiper-button-disabled, '.$prefix.' .products_slider .swiper-button.swiper-button-disabled:hover{background-color:transplanted;}';
        
                    if($v['pag_nav_bg'])
                    {
                        $custom_css .= $prefix.' .swiper-pagination-bullet, '.$prefix.' .swiper-pagination-progress{background-color:'.$v['pag_nav_bg'].';}';
                        $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet{background-color:transparent;border-color:'.$v['pag_nav_bg'].';}';
                        $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet span{background-color:'.$v['pag_nav_bg'].';}';
                    }
                    if($v['pag_nav_bg_hover'])
                    {
                        $custom_css .= $prefix.' .swiper-pagination-bullet-active, '.$prefix.' .swiper-pagination-progress .swiper-pagination-progressbar{background-color:'.$v['pag_nav_bg_hover'].';}';
                        $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active{background-color:'.$v['pag_nav_bg_hover'].';border-color:'.$v['pag_nav_bg_hover'].';}';
                        $custom_css .= $prefix.' .swiper-pagination-st-round .swiper-pagination-bullet.swiper-pagination-bullet-active span{background-color:'.$v['pag_nav_bg_hover'].';}';
                    }

                }
            }
            
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        
        return $this->fetch($this->templateFile[0], $this->getCacheId());
    }
    public function hookDisplayFooter($params, $func=0)
    {
        $display_on = $this->getDisplayOn($func ? $func : __FUNCTION__);
        if (!$display_on) {
            return false;
        }
	    if (!$this->isCached($this->templateFile[2], $this->stGetCacheId($display_on)))
	    {
	        $this->_prepareHook('fot',$display_on);
            $this->smarty->assign(array(
                'is_footer' => true,
    		));
	    }
		return $this->fetch($this->templateFile[2], $this->stGetCacheId($display_on));
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
    
    private function getDisplayOn($func = '')
    {
        $ret = 0;
        if (!$func)
            return $ret;
        foreach(self::$location AS $value)
            if ('hookdisplay'.strtolower($value['hook']) == strtolower($func))
                return (int)$value['id'];
        return $ret;
    }
    
    public function processUpdatePositions()
	{
		if (Tools::getValue('action') == 'updatePositions' && Tools::getValue('ajax'))
		{
			$way = (int)(Tools::getValue('way'));
			$id = (int)(Tools::getValue('id'));
			$positions = Tools::getValue('st_blog_slider');
            $msg = '';
			if (is_array($positions))
				foreach ($positions as $position => $value)
				{
					$pos = explode('_', $value);

					if ((isset($pos[2])) && ((int)$pos[2] === $id))
					{
						if ($object = new StBlogSliderClass((int)$pos[2]))
							if (isset($position) && $object->updatePosition($way, $position, $this->type))
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
        $rows = Db::getInstance()->executeS('SELECT display_on FROM `'._DB_PREFIX_.'st_blog_slider` 
            WHERE `type`='.$this->type.' 
            AND `id_shop`='.(int)$this->context->shop->id.' GROUP BY display_on'
        );
        foreach($rows AS $value) {
            if (key_exists($value['display_on'], self::$location) && isset(self::$location[$value['display_on']]['hook']))
                $location[$value['display_on']] = self::$location[$value['display_on']]['hook']; 
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
                    $this->validation_errors[] = $this->getTranslator()->trans('This module cannot be transplanted to ', array(), 'Modules.Stbanner.Admin').$hook.'.';
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
}