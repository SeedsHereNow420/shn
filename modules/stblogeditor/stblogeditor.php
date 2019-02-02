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

include_once(_PS_MODULE_DIR_.'stthemeeditor/classes/BaseSlider.php');
include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
class StBlogEditor extends BaseSlider implements WidgetInterface
{
    protected static $cache_products = array();
    public $googleFonts;
    public $variants = array();
    public $google_font_link = '';
    public $_prefix_st = 'ST_BLOG_';
    public $_prefix_stsn = 'STSN_BLOG_';
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
    protected $fields_default_stsn = array(
        'pro_per_fw' => 0,
        'pro_per_xxl' => 5,
        'pro_per_xl' => 4,
        'pro_per_lg' => 4,
        'pro_per_md' => 3,
        'pro_per_sm' => 3,
        'pro_per_xs' => 2,
        
        'pro_per_grid_fw' => 0,
        'pro_per_grid_xxl' => 5,
        'pro_per_grid_xl' => 4,
        'pro_per_grid_lg' => 4,
        'pro_per_grid_md' => 3,
        'pro_per_grid_sm' => 3,
        'pro_per_grid_xs' => 2,
        
        'pro_per_rel_fw' => 0,
        'pro_per_rel_xxl' => 5,
        'pro_per_rel_xl' => 4,
        'pro_per_rel_lg' => 4,
        'pro_per_rel_md' => 3,
        'pro_per_rel_sm' => 3,
        'pro_per_rel_xs' => 2,
    );
    private $templateFile = array();
	function __construct()
	{
		$this->name           = 'stblogeditor';
		$this->version        = '1.0.0';
        $this->displayName    = $this->getTranslator()->trans('Blog editor', array(), 'Modules.Stblog.Admin');
		$this->description    = $this->getTranslator()->trans('Change blog layouts, colors and other settings.', array(), 'Modules.Stblog.Admin');

		parent::__construct();
        $this->templateFile = array(
            'module:stthemeeditor/views/templates/slider/header.tpl',
            'module:stthemeeditor/views/templates/slider/homepage.tpl',
            'module:stblog/views/templates/slider/footer.tpl',
            );
    }
    protected function initTabNames()
    {
        $this->_tabs = array(
            array('id'  => '0,4', 'name' => $this->getTranslator()->trans('General', array(), 'Admin.Theme.Transformer')),
            array('id'  => '7,1', 'name' => $this->getTranslator()->trans('Related products', array(), 'Admin.Theme.Transformer')),
            // array('id'  => '2', 'name' => $this->getTranslator()->trans('Slider on blog homepage', array(), 'Admin.Theme.Transformer')),
            array('id'  => '5', 'name' => $this->getTranslator()->trans('Category page', array(), 'Admin.Theme.Transformer')),
            array('id'  => '6', 'name' => $this->getTranslator()->trans('Article page', array(), 'Admin.Theme.Transformer')),
            array('id'  => '3', 'name' => $this->getTranslator()->trans('Images', array(), 'Admin.Theme.Transformer')),
        );
    }
	function install()
	{
        $res = parent::install() &&
            $this->registerHook('displayStBlogArticleFooter');
	    $this->clearSliderCache();
		return $res;
	}
    function getContent()
    {
        if (Tools::getValue('act') == 'regeneratethumb' && Tools::getValue('ajax')==1)
        {
            $this->regenerateThumbails();
            die;
        }
        $this->initTabNames();
        $this->googleFonts = include(_PS_MODULE_DIR_.'stthemeeditor/googlefonts.php');
        parent::getContent();
        Media::addJsDef(array(
            'module_name' => $this->name,
        ));
        $this->context->controller->addCSS(_PS_MODULE_DIR_.'stthemeeditor/views/css/admin-slider.css');
        $this->context->controller->addJS(_PS_MODULE_DIR_.'stthemeeditor/views/js/admin.js');
        $this->context->controller->addJS($this->_path.'views/js/admin.js');
        $this->_html .= '<script type="text/javascript">var googleFontsString=\''.Tools::jsonEncode($this->googleFonts).'\';</script>';
        $helper = $this->initForm();
        $this->smarty->assign(array(
            'bo_tabs' => $this->_tabs,
            'bo_tab_content' => $helper->generateForm($this->fields_form),
        ));
        
        return $this->_html.$this->fetch(_PS_MODULE_DIR_.'stthemeeditor/views/templates/hook/bo_tab_layout.tpl');
    }
    public function getConfigFieldsValues()
    {
        $fields_values = parent::getConfigFieldsValues();
        $languages = Language::getLanguages(false);    
		foreach ($languages as $language)
        {
            $fields_values['meta_title'][$language['id_lang']] = Configuration::get($this->_prefix_st.'META_TITLE', $language['id_lang']);
            $fields_values['meta_keywords'][$language['id_lang']] = Configuration::get($this->_prefix_st.'META_KEYWORDS', $language['id_lang']);
            $fields_values['meta_description'][$language['id_lang']] = Configuration::get($this->_prefix_st.'META_DESCRIPTION', $language['id_lang']);
            $fields_values['rount_name'][$language['id_lang']] = Configuration::get($this->_prefix_st.'ROUNT_NAME', $language['id_lang']);
        }
        $fields_values['name_font_select'] = Configuration::get($this->_prefix_st.'NAME_FONT_SELECT');
        $fields_values['name_font_weight'] = Configuration::get($this->_prefix_st.'NAME_FONT_WEIGHT');
        return $fields_values;
    }
    public function saveForm()
    {
        if (parent::saveForm()) {
            $font_name = Configuration::get($this->_prefix_st.'NAME_FONT_SELECT');
            $font_weight = Configuration::get($this->_prefix_st.'NAME_FONT_WEIGHT');
            if ($font_name && $font_weight) {
                Configuration::updateValue('STSN_FONT_MODULE_'.strtoupper($this->name), $font_name.':'.$font_weight);
            }
        }
    }
    public function initFieldsForm()
    {
        $variants_default = ['400'=>'400', '700'=>'700', 'italic'=>'italic', '700italic'=>'700italic'];
        if($name_font = Configuration::get($this->_prefix_st.'NAME_FONT_SELECT')){
            $temp = $this->googleFonts[str_replace(' ', '_', $name_font)]['variants'];
            foreach ($temp as $v) {
                $variants_default[$v] = $v;
            }
            $name_font_weight = Configuration::get($this->_prefix_st.'name_font_weight');
            $this->google_font_link .= '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.str_replace(' ', '+', $name_font).':'.$name_font_weight.'" />';
        }
        foreach($variants_default AS $value) {
            $this->variants[] = array('id'=>$value,'name'=>$value);
        }
        array_unshift($this->variants, array('id'=>'','name'=>'--'));
        $fields = $this->getFormFields();
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Settings', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => $fields['setting'],
            'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
			),
        );
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => $fields['home_slider'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
            ),
        );
        $this->fields_form[7]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Style settings', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => $fields['home_slider_setting'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
            ),
        );
        
        /*$this->fields_form[2]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Slider on blog homepage', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
			),
			'input' => $fields['slideshow'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);*/
        
        $this->fields_form[3]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Image setting', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['image'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        $this->fields_form[4]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Blog block settings', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['blog_block'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        $this->fields_form[5]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Category page', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['category'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
        $this->fields_form[6]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Article page', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'input' => $fields['article'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
            ),
        );
    }
    public function getFormFields()
    {
        $fields = parent::getFormFields();
        $form_fields = include(dirname(__FILE__).'/formFields.php');
        
        $fields['home_slider']['grid']['label'] = $this->getTranslator()->trans('How to display articles:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['nbr']['label'] = $this->getTranslator()->trans('Define the number of articles to be displayed:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['spacing_between']['label'] = $this->getTranslator()->trans('Spacing between articles:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['spacing_between']['desc'][0] = $this->getTranslator()->trans('Distance between articles.', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['link_hover_color']['label'] = $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer');
        $fields['home_slider']['soby']['default_value'] = 1;
        unset($fields['home_slider']['view_more']);
        unset($fields['setting']['aw_display']);
        
        // $form_fields['related'] = $this->addFieldsSuffix($fields['home_slider'], '_rel');
        // $form_fields['slideshow'] = $fields['home_slider'];
        // Image type widht recommended.
        $option = array(
            'spacing' => (int)Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),
            'per_lg'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_LG'),
            'per_xl'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XL'),
            'per_xxl' => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXL'),
            'page'    => 'module-stblog-article',
        );
        $fields['home_slider']['image_type']['desc'] = $this->calcImageWidth($option);
        
        $option = array(
            'spacing' => 15,
            'per_lg'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_GRID_LG'),
            'per_xl'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_GRID_XL'),
            'per_xxl' => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_GRID_XXL'),
            'page'    => 'module-stblog-category',
        );
        $form_fields['category']['blog_image_type']['desc'] = $this->calcImageWidth($option);
        
        $form_fields['home_slider'] = $fields['home_slider'];
        $form_fields['home_slider_setting'] = $fields['setting'];
        return $form_fields;
    }
    public function regenerateThumbails()
	{
	    $result = array(
            'r' => false,
            'm' => ''
        );
        
        if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP)
            $id_shop = Shop::getContextListShopID();
        else
            $id_shop = array((int)Shop::getContextShopID());
        
        $images = Db::getInstance()->executeS('
        SELECT i.* FROM '._DB_PREFIX_.'st_blog_image `i`
        INNER JOIN '._DB_PREFIX_.'st_blog_image_shop `is`
        ON `i`.`id_st_blog_image` = `is`.`id_st_blog_image`
        WHERE `id_shop` IN ('.implode(',', $id_shop).')
        ORDER BY `type`
        ');
        
        if ($images)
        {
            $path = _PS_UPLOAD_DIR_.'stblog/';
            $ext  = 'jpg';
            if (!is_dir($path) || !is_writable($path))
                $result['m'] = $path.$this->getTranslator()->trans(' is not writable', array(), 'Modules.Stblog.Admin');
            else
            {
                $max_execution_time = (int)ini_get('max_execution_time');
                set_time_limit(10*60);
                foreach($images AS $image)
                {
                    $file = $path.$image['type'].'/'.$image['id_st_blog'].'/'.$image['id_st_blog_image'].'/'.$image['id_st_blog'].$image['id_st_blog_image'].'.'.$ext;
                    if (!file_exists($file))
                    {
                        $result['m'] .= $file."\n";
                        continue;
                    }
                    $this->resizeImage($file, $image['type'], $image['id_st_blog'].$image['id_st_blog_image'], $ext); 
                }
                set_time_limit($max_execution_time);
                $result['r'] = true;
                if ($result['m'])
                    $result['m'] = $this->getTranslator()->trans('The following origin file not exists:'."\n", array(), 'Modules.Stblog.Admin').$result['m'];
            }
        }
        else
            $result['r'] = true;
		
        echo Tools::jsonEncode($result);
	}
    
    public function resizeImage($src_file, $image_type = 1, $basename = '', $ext = 'jpg')
    {
        if (!file_exists($src_file))
            return false;
        $ret = true;
        $types = StBlogImageClass::getDefImageTypes();
        if (!count($types) || !key_exists($image_type, $types))
            return false;
        foreach($types[$image_type] AS $key => $type)
        {
            if (!is_array($type) && count($type) < 2)
                continue;
                
            // Is image smaller than dest? fill it with white!
            $tmp_file_new = $src_file;
            list($src_width, $src_height) = getimagesize($src_file);
            if (!$src_width || !$src_height)
                continue;
            
            $width  = (int)$type[0];
            $height = $type[1] > 0 ? (int)$type[1] : $src_height;
            if ($src_width < $width || $src_height < $height)
            {
                $tmp_file_new = $src_file.'_new';
                ImageManager::resize($src_file, $tmp_file_new, $width, $height);
            }
                
            $options = array('jpegQuality' => Configuration::get('PS_JPEG_QUALITY') ? Configuration::get('PS_JPEG_QUALITY') : 80);
            $thumb = PhpThumbFactory::create($tmp_file_new, $options);
            if (!$type[1])
                $thumb->adaptiveResizeWidth($width);
            else
                $thumb->adaptiveResize($width, $height);
            $folder = dirname($src_file).'/';
            $thumb->save($folder.$basename.$key.'.'.$ext);
            $ret &= ImageManager::isRealImage($folder.$basename.$key.'.'.$ext);
        }
        if (file_exists($src_file.'_new'))
            @unlink($src_file.'_new');
        return $ret;
    }

    public function getPatterns($amount=27,$type='')
    {
        $html = '';
        foreach(range(1,$amount) as $v)
            $html .= '<div class="parttern_wrap '.($type=='heading_bg' ? ' repeat_x ' : '').'" style="background-image:url('._MODULE_DIR_.'stthemeeditor/patterns'.($type ? '/'.$type : '').'/'.$v.'.png);"><span>'.$v.'</span></div>';
        $html .= '<div>'.$this->getTranslator()->trans('Pattern credits', array(), 'Modules.Stblog.Admin').':<a href="http://subtlepatterns.com" target="_blank">subtlepatterns.com</a></div>';
        return $html;
    }
    public function getPatternsArray($amount=27)
    {
        $arr = array();
        for($i=1;$i<=$amount;$i++)
            $arr[] = array('id'=>$i,'name'=>$i); 
        return $arr;   
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return ;
    }
    public function renderWidget($hookName = null, array $configuration = [])
    {
        return ;
    }

    public function hookDisplayHeader($params)
    {
        // $this->context->controller->addJS(($this->_path).'views/js/jquery.fitvids.js');
        // $this->context->controller->addJS(($this->_path).'views/js/stblog.js');
        // $this->context->controller->addCSS(($this->_path).'views/css/stblog.css');
        /*$this->smarty->assign(array(
            'ss_slideshow' => (int)Configuration::get('ST_BLOG_SS_SLIDESHOW'),
            'ss_s_speed' => Configuration::get('ST_BLOG_SS_S_SPEED'),
            'ss_a_speed' => Configuration::get('ST_BLOG_SS_A_SPEED'),
            'ss_pause' => (int)Configuration::get('ST_BLOG_SS_PAUSE'),
        ));*/
        if (!$this->isCached($this->templateFile[0], $this->stGetCacheId('header')))
        {
            $css = '';

            //similar code in theme editor
            $header_bottom_spacing = Configuration::get($this->_prefix_st.'HEADER_BOTTOM_SPACING');
            if($header_bottom_spacing){
                $css .= 'body#module-stblog-default .header-container { margin-bottom: '.$header_bottom_spacing.'px; }';
                // $css .= '@media (max-width: 991px) {body#module-stblog-default .header-container { margin-bottom: 0; }}';//mobile also needs spacing //why set the height of mobile header to have spacings.//ru guo you background, setting a height to mobile header can not creates spacings
            }
            //
    
            if($post_font_size = Configuration::get($this->_prefix_st.'POST_FONT_SIZE'))
                $css .= '.blog_content, .blog_short_content{font-size:'.(round($post_font_size/12*100,2) / 100).'em;}';
            if($post_heading_size = Configuration::get($this->_prefix_st.'POST_HEADING_SIZE'))
                $css .= '.page_heading.blog_heading{font-size:'.(round($post_heading_size/12*100,2) / 100).'em;}';

            if($name_font_select = Configuration::get($this->_prefix_st.'NAME_FONT_SELECT'))
                $css .='.block_blog .s_title_block a{font-family: "'.$name_font_select.'";}';
            if($name_font_weight = Configuration::get($this->_prefix_st.'NAME_FONT_WEIGHT')){
                preg_match_all('/^(\d*)([a-z]*)$/', $name_font_weight, $nameFontArr);
                if($nameFontArr[1][0])
                    $css .='.block_blog .s_title_block a{font-weight: '.$nameFontArr[1][0].';}';
                if($nameFontArr[2][0])
                    $css .='.block_blog .s_title_block a{font-style: '.$nameFontArr[2][0].';}';
            }
            if($name_transform = (int)Configuration::get($this->_prefix_st.'NAME_TRANSFORM'))
                $css .='.block_blog .s_title_block a{text-transform: '.self::$textTransform[$name_transform]['name'].';}';
            if($name_size = (int)Configuration::get($this->_prefix_st.'NAME_SIZE'))
                $css .='.block_blog .s_title_block a{font-size: '.$name_size.'px;}';
            if($name_color = Configuration::get($this->_prefix_st.'NAME_COLOR'))
                $css .='.block_blog .s_title_block a{color: '.$name_color.';}';


            if($font_heading_size = Configuration::get($this->_prefix_st.'FONT_HEADING_SIZE'))
                $css .='.is_blog .title_block .title_block_inner{font-size: '.$font_heading_size.'px;}';
            if($font_heading_trans = Configuration::get($this->_prefix_st.'FONT_HEADING_TRANS'))
                $css .='.is_blog .title_block .title_block_inner{text-transform: '.self::$textTransform[$font_heading_trans]['name'].';}';  
            if(Configuration::get($this->_prefix_st.'BLOCK_HEADINGS_COLOR'))
                $css .='.is_blog .title_block .title_block_inner{color: '.Configuration::get($this->_prefix_st.'BLOCK_HEADINGS_COLOR').';}';

            $heading_style = (int)Configuration::get($this->_prefix_st.'HEADING_STYLE');
            $heading_bottom_border = Configuration::get($this->_prefix_st.'HEADING_BOTTOM_BORDER');

            if($heading_bottom_border || $heading_bottom_border===0 || $heading_bottom_border==='0')
            {
                if($heading_style==1){
                    $css .= '.is_blog .title_style_1 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;}';
                }elseif($heading_style==3){
                    $css .= '.is_blog .title_style_3 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;}';
                }elseif($heading_style==2){
                    $css .= '.is_blog .title_style_2 .flex_child{border-top-width:'.$heading_bottom_border.'px;border-bottom-width:'.$heading_bottom_border.'px;}';
                }else{
                    $css .= '.is_blog .title_style_0, .is_blog .title_style_0 .title_block_inner{border-bottom-width:'.$heading_bottom_border.'px;}.is_blog .title_style_0 .title_block_inner{margin-bottom:-'.$heading_bottom_border.'px;}';
                }
            }
            if(Configuration::get($this->_prefix_st.'HEADING_BOTTOM_BORDER_COLOR'))
                $css .='.is_blog .title_style_0, .is_blog .title_style_1 .flex_child, .is_blog .title_style_2 .flex_child, .is_blog .title_style_3 .flex_child{border-color: '.Configuration::get($this->_prefix_st.'HEADING_BOTTOM_BORDER_COLOR').';}';  
            if(Configuration::get($this->_prefix_st.'HEADING_BOTTOM_BORDER_COLOR_H'))
                $css .='.is_blog .title_style_0 .title_block_inner{border-color: '.Configuration::get($this->_prefix_st.'HEADING_BOTTOM_BORDER_COLOR_H').';}';  
            if(Configuration::get($this->_prefix_st.'HEADING_COLUMN_BG'))
                $css .='.is_blog #left_column .title_block,.is_blog #right_column .title_block{background-color: '.Configuration::get($this->_prefix_st.'HEADING_COLUMN_BG').';padding-left:6px;}';  

            $bg_pattern = Configuration::get($this->_prefix_st.'HEADING_BG_PATTERN');
            if ($bg_pattern && Configuration::get($this->_prefix_st.'HEADING_BG_IMAGE')=="") {
                $bg_pattern = _MODULE_DIR_.'stthemeeditor/patterns/heading_bg/'.$bg_pattern.'.png';
                $bg_pattern = $this->context->link->protocol_content.Tools::getMediaServer($bg_pattern).$bg_pattern;
            }
            $css .= '.is_blog .title_style_0 .flex_child,.is_blog .title_style_2 .flex_child,.is_blog .title_style_3 .flex_child{background-image: '.($bg_pattern ? 'url('.$bg_pattern.')' : 'none').';}';
            
            if ($bg_img = Configuration::get($this->_prefix_st.'HEADING_BG_IMAGE')) {
                $bg_img = _THEME_PROD_PIC_DIR_.$bg_img;
                $bg_img = $this->context->link->protocol_content.Tools::getMediaServer($bg_img).$bg_img;
                $css .= '.is_blog .title_style_0 .flex_child,.is_blog .title_style_2 .flex_child,.is_blog .title_style_3 .flex_child{background-image:url('.$bg_img.');}';    
            }
                
            if($blog_grid_bg=Configuration::get($this->_prefix_st.'BLOG_GRID_BG'))  
                $css .= '.products_sldier_swiper .block_blog .pro_outer_box .pro_second_box,.product_list.grid .block_blog .pro_outer_box .pro_second_box{ background-color: '.$blog_grid_bg.'; }';
            if($blog_grid_hover_bg = Configuration::get($this->_prefix_st.'BLOG_GRID_HOVER_BG'))  
                $css .= '.products_sldier_swiper .block_blog .pro_outer_box:hover .pro_second_box,.product_list.grid .block_blog .pro_outer_box:hover .pro_second_box{ background-color: '.$blog_grid_hover_bg.'; }';

            //related products
            $classname = $this->name.'_container';
            
            $custom_css = '';
    
            if(Configuration::get($this->_prefix_st.'GRID')==1)
            {
                $spacing_between = Configuration::get($this->_prefix_st.'SPACING_BETWEEN');
                $custom_css .= '.'.$classname.' .product_list.grid .product_list_item{padding-left:'.ceil($spacing_between/2).'px;padding-right:'.floor($spacing_between/2).'px;}';
                $custom_css .= '.'.$classname.' .product_list.grid{margin-left:'.ceil($spacing_between/2).'px;margin-right:'.floor($spacing_between/2).'px;}';
            }
            
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
                $custom_css .= '.'.$classname.'.products_container{'.$group_css.'}';
            /*if ($bg_img_v_offset = (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET')) {
                $custom_css .= '.'.$classname.'.products_container{background-position:center -'.$bg_img_v_offset.'px;}';
            }*/
    
            if ($top_padding = (int)Configuration::get($this->_prefix_st.'TOP_PADDING'))
                $custom_css .= '.'.$classname.'.products_container  .products_slider{padding-top:'.$top_padding.'px;}';
            if ($bottom_padding = (int)Configuration::get($this->_prefix_st.'BOTTOM_PADDING'))
                $custom_css .= '.'.$classname.'.products_container  .products_slider{padding-bottom:'.$bottom_padding.'px;}';
    
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
                $custom_css .= '.'.$classname.'.products_container .title_style_0,.'.$classname.'.products_container .title_style_0 .title_block_inner{border-bottom-width:'.$heading_bottom_border.'px;}.'.$classname.'.products_container .title_style_0 .title_block_inner{margin-bottom:'.$heading_bottom_border.'px;}';
                $custom_css .= '.'.$classname.'.products_container .title_style_1 .flex_child, .'.$classname.'.products_container .title_style_3 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;}';
                $custom_css .= '.'.$classname.'.products_container .title_style_2 .flex_child{border-bottom-width:'.$heading_bottom_border.'px;border-top-width:'.$heading_bottom_border.'px;}';
            }
            
            if(Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR'))
                $custom_css .='.'.$classname.'.products_container .title_style_0, .'.$classname.'.products_container .title_style_1 .flex_child, .'.$classname.'.products_container .title_style_2 .flex_child, .'.$classname.'.products_container .title_style_3 .flex_child{border-bottom-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR').';}.'.$classname.'.products_container .title_style_2 .flex_child{border-top-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR').';}';  
            if(Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR_H'))
                $custom_css .='.'.$classname.'.products_container .title_style_0 .title_block_inner{border-color: '.Configuration::get($this->_prefix_st.'TITLE_BOTTOM_BORDER_COLOR_H').';}';  
    
    
            if ($text_color = Configuration::get($this->_prefix_st.'TEXT_COLOR'))
                $custom_css .= '.'.$classname.' .ajax_block_product .s_title_block a,
                .'.$classname.' .ajax_block_product .old_price,
                .'.$classname.' .ajax_block_product .product_desc{color:'.$text_color.';}';
    
            if ($price_color = Configuration::get($this->_prefix_st.'PRICE_COLOR'))
                $custom_css .= '.'.$classname.' .ajax_block_product .price{color:'.$price_color.';}';
            if ($link_hover_color = Configuration::get($this->_prefix_st.'LINK_HOVER_COLOR'))
                $custom_css .= '.'.$classname.' .ajax_block_product .s_title_block a:hover{color:'.$link_hover_color.';}';
    
            if ($grid_hover_bg = Configuration::get($this->_prefix_st.'GRID_HOVER_BG'))
                $custom_css .= '.'.$classname.' .pro_outer_box:hover .pro_second_box{background-color:'.$grid_hover_bg.';}';
    
            if ($direction_color = Configuration::get($this->_prefix_st.'DIRECTION_COLOR'))
                $custom_css .= '.'.$classname.' .products_slider .swiper-button{color:'.$direction_color.';}';
            if ($direction_color_hover = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_HOVER'))
                $custom_css .= '.'.$classname.' .products_slider .swiper-button:hover{color:'.$direction_color_hover.';}';
            if ($direction_color_disabled = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_DISABLED'))
                $custom_css .= '.'.$classname.' .products_slider .swiper-button.swiper-button-disabled, .'.$classname.' .products_slider .swiper-button.swiper-button-disabled:hover{color:'.$direction_color_disabled.';}';
            
            if ($direction_bg = Configuration::get($this->_prefix_st.'DIRECTION_BG'))
                $custom_css .= '.'.$classname.' .products_slider .swiper-button{background-color:'.$direction_bg.';}';
            if ($direction_hover_bg = Configuration::get($this->_prefix_st.'DIRECTION_HOVER_BG'))
                $custom_css .= '.'.$classname.' .products_slider .swiper-button:hover{background-color:'.$direction_hover_bg.';}';
            if ($direction_disabled_bg = Configuration::get($this->_prefix_st.'DIRECTION_DISABLED_BG'))
                $custom_css .= '.'.$classname.' .products_slider .swiper-button.swiper-button-disabled, .'.$classname.' .products_slider .swiper-button.swiper-button-disabled:hover{background-color:'.$direction_disabled_bg.';}';
            else
                $custom_css .= '.'.$classname.' .products_slider .swiper-button.swiper-button-disabled, .'.$classname.' .products_slider .swiper-button.swiper-button-disabled:hover{background-color:transplanted;}';
    
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
            
            $css .= $custom_css;

            if($css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $css));
        }
        $vars = array(
            'length_of_name' => Configuration::get($this->_prefix_st.'LENGTH_OF_NAME'),
            'related_display_price' => Configuration::get('ST_BLOG_RELATED_DISPLAY_PRICE'),
            'display_viewcount' => Configuration::get($this->_prefix_st.'DISPLAY_VIEWCOUNT'),
            'display_comment_count' => Configuration::get($this->_prefix_st.'DISPLAY_COMMENT_COUNT'),
            'display_author' => Configuration::get($this->_prefix_st.'DISPLAY_AUTHOR'),
            'display_date' => Configuration::get($this->_prefix_st.'DISPLAY_DATE'),
            'display_read_more' => Configuration::get($this->_prefix_st.'DISPLAY_READ_MORE'),
            'display_sd' => Configuration::get($this->_prefix_st.'DISPLAY_SD'),
            'blog_block_align' => Configuration::get($this->_prefix_st.'BLOG_BLOCK_ALIGN'),
            'heading_style' => Configuration::get($this->_prefix_st.'HEADING_STYLE'),
            'display_short_content' => Configuration::get($this->_prefix_st.'DISPLAY_SHORT_CONTENT'),
            'blog_image_type' => Configuration::get($this->_prefix_st.'BLOG_IMAGE_TYPE'),
            );
        $this->context->smarty->assign('stblog', $vars);
        return $this->fetch($this->templateFile[0], $this->stGetCacheId('header'));
        // return $this->display(__FILE__, 'header.tpl');
    }
    public function fontOptions() {
        $google = array();
        foreach($this->googleFonts as $v)
            $google[] = array('id'=>$v['family'],'name'=>$v['family']);
        return $google;
    }
    public function hookDisplayStBlogArticleFooter($params)
    {
        $id_st_blog = (int)Tools::getValue('id_st_blog');
        if(!$id_st_blog)
            return;
        $blog = new StBlogClass($id_st_blog, $this->context->language->id, $this->context->shop->id);
        $related_products = $blog->getLinkProducts();
            
        $this->smarty->assign(array(
                'products' => $related_products,

                'slider_slideshow' => Configuration::get($this->_prefix_st.'SLIDESHOW'),
                'slider_s_speed' => Configuration::get($this->_prefix_st.'S_SPEED'),
                'slider_a_speed' => Configuration::get($this->_prefix_st.'A_SPEED'),
                'slider_pause_on_hover' => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'),
                'rewind_nav' => Configuration::get($this->_prefix_st.'REWIND_NAV'),
                'slider_loop' => Configuration::get($this->_prefix_st.'LOOP'),
                'slider_move' => Configuration::get($this->_prefix_st.'MOVE'),
                'hide_mob' => Configuration::get($this->_prefix_st.'HIDE_MOB'),
                'lazy_load'             => Configuration::get($this->_prefix_st.'LAZY'),

                'display_as_grid'       => Configuration::get($this->_prefix_st.'GRID'),
                'title_position'        => Configuration::get($this->_prefix_st.'TITLE_ALIGN'),
                'direction_nav'         => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
                'hide_direction_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_DIRECTION_NAV_ON_MOB'),
                'control_nav'           => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
                'hide_control_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_CONTROL_NAV_ON_MOB'),
                'spacing_between'       => Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),
                'display_sd'       => Configuration::get($this->_prefix_st.'DISPLAY_SD'),
                
                'has_background_img'    => ((int)Configuration::get($this->_prefix_st.'BG_PATTERN') || Configuration::get($this->_prefix_st.'BG_IMG')) ? 1 : 0,
                'speed'                 => Configuration::get($this->_prefix_st.'SPEED'),
                'bg_img_v_offset'       => (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET'),

                'video_mpfour'          => '',
                'video_webm'            => '',
                'video_ogg'             => '',
                'video_loop'            => '',
                'video_muted'           => '',
                'video_poster'          => '',
                'video_v_offset'        => '',

                'view_more'             => false,//related prducts module does not have view more
                'countdown_on' => false,//to do add this option countdown_on is in baseproductsldier 

                'module'            => $this->name,
                'title' => $this->getTranslator()->trans('Related products', array(), 'Shop.Theme.Transformer'),

                //
                'column_slider'         => false,
                'is_blog'         => true,
                'homeverybottom'   => false,
                'hook_hash'        => $this->getHookHash(__FUNCTION__),
                'pro_per_fw'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_FW'),
                'pro_per_xxl'      => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXL'),
                'pro_per_xl'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XL'),
                'pro_per_lg'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_LG'),
                'pro_per_md'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_MD'),
                'pro_per_sm'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_SM'),
                'pro_per_xs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XS'),
                'pro_per_xxs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXS'),
            ));

        return $this->fetch($this->templateFile[1]); 
    }
}