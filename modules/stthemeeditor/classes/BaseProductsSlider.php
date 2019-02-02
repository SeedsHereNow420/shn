<?php
require_once(dirname(__FILE__).'/BaseSlider.php');
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
class BaseProductsSlider extends BaseSlider implements WidgetInterface
{
    public $title;
    public $url_entity;
	function __construct()
	{
        parent::__construct();
    }
    protected function initTabNames()
    {
        $this->_tabs = array(
            array('id'  => '0,4', 'name' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer')),
            array('id'  => '1,5', 'name' => $this->getTranslator()->trans('Homepage', array(), 'Admin.Theme.Transformer')),
            array('id'  => '2', 'name' => $this->getTranslator()->trans('Left or right column', array(), 'Admin.Theme.Transformer')),
            array('id'  => '3', 'name' => $this->getTranslator()->trans('Footer', array(), 'Admin.Theme.Transformer')),
        );
    }
    protected function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
                    'id' => 'displayFullWidthTop',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthTop', array(), 'Admin.Theme.Transformer'),
                    'is_full_width' => 1,
                ),
                array(
                    'id' => 'displayFullWidthTop2',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthTop2', array(), 'Admin.Theme.Transformer'),
                    'is_full_width' => 1,
                ),
                array(
                    'id' => 'displayHomeTop',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeTop', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayHome',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHome', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayHomeLeft',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeLeft', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayHomeRight',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeRight', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayHomeFirstQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeFirstQuarter', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayHomeSecondQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeSecondQuarter', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayHomeThirdQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeThirdQuarter', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayHomeFourthQuarter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeFourthQuarter', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayHomeBottom',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayHomeBottom', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayFullWidthBottom',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthBottom', array(), 'Admin.Theme.Transformer'),
                    'is_full_width' => 1,
                ),
                array(
                    'id' => 'displayFooterBefore',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFullWidthBottom2(Footer before)', array(), 'Admin.Theme.Transformer'),
                    'is_full_width' => 1,
                ),
                array(
                    'id' => 'displayOrderConfirmation2',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayOrderConfirmation2', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'id' => 'displayFooterProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooterProduct', array(), 'Admin.Theme.Transformer')
                ),
            ),
            'Column' => array(
                array(
                    'id' => 'displayLeftColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Left column except the produt page', array(), 'Admin.Theme.Transformer'),
                    'is_column'=>1,
                ),
                array(
                    'id' => 'displayRightColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Right column except the produt page', array(), 'Admin.Theme.Transformer'),
                    'is_column'=>1,
                ),
                array(
                    'id' => 'displayLeftColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Left column on the product page only', array(), 'Admin.Theme.Transformer'),
                    'is_column'=>1,
                ),
                array(
                    'id' => 'displayRightColumnProduct',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Right column on the product page only', array(), 'Admin.Theme.Transformer'),
                    'is_column'=>1,
                ),
                array(
                    'id' => 'displayStBlogLeftColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Blog left column', array(), 'Admin.Theme.Transformer'),
                    'is_column'=>1,
                    'is_blog'=>1,
                ),
                array(
                    'id' => 'displayStBlogRightColumn',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Blog right column', array(), 'Admin.Theme.Transformer'),
                    'is_column'=>1,
                    'is_blog'=>1,
                )
            ),
            'Footer' => array(
                array(
                    'id' => 'displayStackedFooter1',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 1', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                    'is_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter2',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 2', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                    'is_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter3',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 3', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                    'is_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter4',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 4', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                    'is_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter5',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 5', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                    'is_footer'=>1,
                ),
                array(
                    'id' => 'displayStackedFooter6',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('Stacked footer 6', array(), 'Admin.Theme.Transformer'),
                    'is_stacked_footer'=>1,
                    'is_footer'=>1,
                ),        
                array(
                    'id' => 'displayFooter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooter', array(), 'Admin.Theme.Transformer'),
                    'is_footer'=>1,
                ),
                array(
                    'id' => 'displayFooterAfter',
                    'val' => '1',
                    'name' => $this->getTranslator()->trans('displayFooterAfter', array(), 'Admin.Theme.Transformer'),
                    'is_footer'=>1,
                )
            )
        );
    }
	function install()
	{
        return parent::install()
    		&& $this->registerHook('addproduct')
    		&& $this->registerHook('updateproduct')
    		&& $this->registerHook('deleteproduct')
            && $this->registerHook('categoryUpdate')
            && Configuration::updateValue($this->_prefix_st.'COUNTDOWN_ON', 1)
            && Configuration::updateValue($this->_prefix_st.'COUNTDOWN_ON_COL', 1);
	}
    public function initFieldsForm()
    {
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
                'title' => $this->getTranslator()->trans('Slider on homepage', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                'countdown_on' => array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display countdown timers:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'countdown_on',
                    'is_bool' => true,
                    'default_value' => 1,
                    'desc' => $this->getTranslator()->trans('Make sure the Coundown module is installed & enabled.', array(), 'Admin.Theme.Transformer'),
                    'values' => array(
                        array(
                            'id' => 'countdown_on_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'countdown_on_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ),
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer'),
			),
		);
        $option = array(
            'spacing' => (int)Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),
            'per_lg'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_LG'),
            'per_xl'  => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XL'),
            'per_xxl' => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXL'),
            'page'    => 'index',
        );
        $fields['home_slider']['image_type']['desc'] = $this->calcImageWidth($option);
        $this->fields_form[1]['form']['input'] = $fields['home_slider']+$this->fields_form[1]['form']['input'];
        
        $this->fields_form[2]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Slider on left column/right column/X quarters', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'hidden',
					'name' => 'move_col',
                    'default_value' => 1,
                    'validation' => 'isBool',
				),
                'countdown_on_col' => array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Display countdown timers:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'countdown_on_col',
                    'is_bool' => true,
                    'default_value' => 1,
                    'desc' => $this->getTranslator()->trans('Make sure the Coundown module is installed & enabled.', array(), 'Admin.Theme.Transformer'),
                    'values' => array(
                        array(
                            'id' => 'countdown_on_col_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'countdown_on_col_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ),
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);
        $this->fields_form[2]['form']['input'] = $fields['column']+$this->fields_form[2]['form']['input'];
        
        $this->fields_form[3]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Footer', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
			'input' => $fields['footer'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);
        
        $this->fields_form[4]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Hook manager', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
            'description' => $this->getTranslator()->trans('Check the hook that you would like this module to display on.', array(), 'Admin.Theme.Transformer').
            '<br/><a href="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" target="_blank" >'.$this->getTranslator()->trans('Click here to see hook position', array(), 'Admin.Theme.Transformer').'</a>.',
			'input' => $fields['hook'],
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save all', array(), 'Admin.Theme.Transformer')
			),
		);
        $this->fields_form[5]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Video background', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
            ),
            'description' => $this->getTranslator()->trans('Video background feature can not work on both Android and IOS devices, which is due to restrictions on autoplay and performance, so you also need to upload a video thumbnail, the thumbnail will be displayed on mobile devices.', array(), 'Admin.Theme.Transformer'),
            'input' => $fields['video'],
            'submit' => array(
                'title' => $this->getTranslator()->trans('   Save all   ', array(), 'Admin.Theme.Transformer')
            ),
        );            
    }
    public function hookDisplayHeader($params)
    {
        $template = 'module:stthemeeditor/views/templates/slider/header.tpl';
        if (!$this->isCached($template, $this->stGetCacheId('header')))
        {
            $classname = $this->name.'_container';
            
            $custom_css = '';
    
            $spacing_between = Configuration::get($this->_prefix_st.'SPACING_BETWEEN');
            if(Configuration::get($this->_prefix_st.'GRID')==1 && ($spacing_between || $spacing_between===0 || $spacing_between==='0'))
            {
                $custom_css .= '.'.$classname.' .product_list.grid .product_list_item{padding-left:'.ceil($spacing_between/2).'px;padding-right:'.floor($spacing_between/2).'px;}';
                $custom_css .= '.'.$classname.' .product_list.grid{margin-left:-'.ceil($spacing_between/2).'px;margin-right:-'.floor($spacing_between/2).'px;}';
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
                $custom_css .= '.'.$classname.'.products_container .title_style_0,.'.$classname.'.products_container .title_style_0 .title_block_inner{border-bottom-width:'.$heading_bottom_border.'px;}.'.$classname.'.products_container .title_style_0 .title_block_inner{margin-bottom:-'.$heading_bottom_border.'px;}';
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
    
            if ($grid_bg = Configuration::get($this->_prefix_st.'GRID_BG'))
                $custom_css .= '.'.$classname.' .pro_outer_box .pro_second_box{background-color:'.$grid_bg.';}';
            if ($grid_hover_bg = Configuration::get($this->_prefix_st.'GRID_HOVER_BG'))
                $custom_css .= '.'.$classname.' .pro_outer_box:hover .pro_second_box{background-color:'.$grid_hover_bg.';}';
    
            //.block is used to make bg take effect, .swiper-button-lr, .swiper-button-tr hui fu gai
            if ($direction_color = Configuration::get($this->_prefix_st.'DIRECTION_COLOR'))
                $custom_css .= '.'.$classname.'.block .products_slider .swiper-button{color:'.$direction_color.';}';
            if ($direction_color_hover = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_HOVER'))
                $custom_css .= '.'.$classname.'.block .products_slider .swiper-button:hover{color:'.$direction_color_hover.';}';
            if ($direction_color_disabled = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_DISABLED'))
                $custom_css .= '.'.$classname.'.block .products_slider .swiper-button.swiper-button-disabled, .'.$classname.' .products_slider .swiper-button.swiper-button-disabled:hover{color:'.$direction_color_disabled.';}';
            
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
            
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->fetch($template, $this->stGetCacheId('header'));
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
        $items          = Configuration::get($this->_prefix_st.'ITEMS_COL');
        $hide_mob       = Configuration::get($this->_prefix_st.'HIDE_MOB'.$ext);
        $aw_display     = Configuration::get($this->_prefix_st.'AW_DISPLAY'.$ext);
        $display_sd     = Configuration::get($this->_prefix_st.'DISPLAY_SD');
        
        $poster = Configuration::get($this->_prefix_st.'VIDEO_POSTER');
        if($poster)
            $this->fetchMediaServer($poster);

        $this->smarty->assign(array(
            'products'              => $this->getProducts($ext),
            'add_prod_display'      => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
            'slider_slideshow'      => $slideshow,
            'slider_s_speed'        => $s_speed,
            'slider_a_speed'        => $a_speed,
            'slider_pause_on_hover' => $pause_on_hover,
            'rewind_nav'            => $rewind_nav,
            'lazy_load'             => $lazy_load,
            'slider_move'           => $move,
            'slider_items'          => $items ? $items : 4,
            'hide_mob'              => (int)$hide_mob,
            'display_sd'            => (int)$display_sd,
            'aw_display'            => (int)$aw_display,
            'display_as_grid'       => Configuration::get($this->_prefix_st.'GRID'),
            'title_position'        => Configuration::get($this->_prefix_st.'TITLE_ALIGN'),
            'direction_nav'         => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'hide_direction_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_DIRECTION_NAV_ON_MOB'),
            'control_nav'           => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
            'hide_control_nav_on_mob' => Configuration::get($this->_prefix_st.'HIDE_CONTROL_NAV_ON_MOB'),
            'spacing_between'       => Configuration::get($this->_prefix_st.'SPACING_BETWEEN'),
            'countdown_on'          => Configuration::get($this->_prefix_st.'COUNTDOWN_ON'.$ext),
            'display_pro_col'       => Configuration::get($this->_prefix_st.'DISPLAY_PRO_COL'),
            
            'has_background_img'    => ((int)Configuration::get($this->_prefix_st.'BG_PATTERN') || Configuration::get($this->_prefix_st.'BG_IMG')) ? 1 : 0,
            'speed'                 => Configuration::get($this->_prefix_st.'SPEED'),
            'bg_img_v_offset'       => (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET'),

            'video_mpfour'          => Configuration::get($this->_prefix_st.'VIDEO_MPFOUR'),
            'video_webm'            => Configuration::get($this->_prefix_st.'VIDEO_WEBM'),
            'video_ogg'             => Configuration::get($this->_prefix_st.'VIDEO_OGG'),
            'video_loop'            => Configuration::get($this->_prefix_st.'VIDEO_LOOP'),
            'video_muted'           => Configuration::get($this->_prefix_st.'VIDEO_MUTED'),
            'video_poster'          => $poster,
            'video_v_offset'        => Configuration::get($this->_prefix_st.'VIDEO_V_OFFSET'),

            'view_more'             => (int)Configuration::get($this->_prefix_st.'VIEW_MORE'),
		));
        return true;
    }
    function getContent()
    {
        $this->initHookArray();
        $this->initTabNames();
        parent::getContent();
        Media::addJsDef(array(
            'module_name' => $this->name,
        ));
        $this->context->controller->addCSS(_PS_MODULE_DIR_.'stthemeeditor/views/css/admin-slider.css');
        $this->context->controller->addJS(_PS_MODULE_DIR_.'stthemeeditor/views/js/admin.js');
        $helper = $this->initForm();
        $this->smarty->assign(array(
            'bo_tabs' => $this->_tabs,
            'bo_tab_content' => $helper->generateForm($this->fields_form),
        ));
        
        return $this->_html.$this->fetch(_PS_MODULE_DIR_.'stthemeeditor/views/templates/hook/bo_tab_layout.tpl');
    }
	public function hookDisplayHome($params, $func = '', $flag=0)
	{
        $hook_hash = $this->getHookHash($func ? $func : __FUNCTION__);
        $template = 'module:stthemeeditor/views/templates/slider/homepage.tpl';
	    if ($func === false || !$this->isCached($template, $this->stGetCacheId($hook_hash)))
    	{
            $this->_prepareHook();

            $custom_content = Hook::exec('displayModuleCustomContent', array('type'=>2,'identify'=>$this->name), null, true);

            $this->smarty->assign(array(
                'column_slider'    => false,
                'homeverybottom'   => ($flag==2 ? true : false),
                'hook_hash'        => $hook_hash,
                'module'           => $this->name,
                'title'            => $this->title,
                'url_entity'       => $this->url_entity,
                'pro_per_fw'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_FW'),
                'pro_per_xxl'      => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XXL'),
                'pro_per_xl'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XL'),
                'pro_per_lg'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_LG'),
                'pro_per_md'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_MD'),
                'pro_per_sm'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_SM'),
                'pro_per_xs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_PER_XS'),

                'has_background_img'       => ((int)Configuration::get($this->_prefix_st.'BG_PATTERN') || Configuration::get($this->_prefix_st.'BG_IMG')) ? 1 : 0,
                'speed'                    => Configuration::get($this->_prefix_st.'SPEED'),
                'bg_img_v_offset'          => (int)Configuration::get($this->_prefix_st.'BG_IMG_V_OFFSET'),
                
                'image_type'          => Configuration::get($this->_prefix_st.'IMAGE_TYPE'),

                'custom_content' => $custom_content && array_key_exists('steasycontent', $custom_content) ? $custom_content['steasycontent'] : false,
            ));
        }
		return $this->fetch($template, $func === false ? null : $this->stGetCacheId($hook_hash));
	}
    public function hookDisplayFooter($params, $func = '')
    {
        $hook_hash = $this->getHookHash($func ? $func : __FUNCTION__);
        $template = 'module:stthemeeditor/views/templates/slider/footer.tpl';
	    if ($func === false || !$this->isCached($template, $this->stGetCacheId($hook_hash)))
	    {
            $this->smarty->assign(array(
                'products' => $this->getProducts('fot'),
                'add_prod_display'  => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
                'hide_mob'          => Configuration::get($this->_prefix_st.'HIDE_MOB_FOT'),
                'aw_display'        => Configuration::get($this->_prefix_st.'AW_DISPLAY_FOT'),
                'footer_wide'       => Configuration::get($this->_prefix_st.'FOOTER_WIDE'),
                'module'            => $this->name,
                'title'             => $this->title,
                'url_entity'        => $this->url_entity,
                'hook_hash'         => $hook_hash
            ));    
	    }
		return $this->fetch($template, $func === false ? null : $this->stGetCacheId($hook_hash));
    }
	public function hookDisplayLeftColumn($params, $func = '')
	{
	    $hook_hash = $this->getHookHash($func ? $func : __FUNCTION__);
        $template = 'module:stthemeeditor/views/templates/slider/homepage.tpl';
	    if ($func === false || !$this->isCached($template, $this->stGetCacheId($hook_hash)))
        {
            $this->_prepareHook('col');
            
            $this->smarty->assign(array(
                'column_slider'         => true,
                'homeverybottom'        => false,
                'hook_hash'             => $hook_hash,
                'title'                 => $this->title,
                'url_entity'            => $this->url_entity,
                'module'                => $this->name,
            ));
        }
		return $this->fetch($template, $func === false ? null : $this->stGetCacheId($hook_hash));
	}
    public function hookAddProduct($params)
	{
	   $this->clearSliderCache();
	}
	public function hookUpdateProduct($params)
	{
	   $this->clearSliderCache();
	}
	public function hookDeleteProduct($params)
	{
	   $this->clearSliderCache();
	}
    public function hookCategoryUpdate($params)
    {
        $this->clearSliderCache();
    }
    public function getConfigFieldsValues()
    {
        $fields_values = parent::getConfigFieldsValues();
        $fields_values['countdown_on'] = Configuration::get($this->_prefix_st.'COUNTDOWN_ON');
        $fields_values['countdown_on_col'] = Configuration::get($this->_prefix_st.'COUNTDOWN_ON_COL');
        $fields_values['move_col'] = 1;
        return $fields_values;
    }
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        return ;
    }
    public function renderWidget($hookName = null, array $configuration = [])
    {
        if (strpos($hookName, 'display') !== false) {
            return $this->hookDisplayHome($configuration, $this->getHookHash($hookName));
        }
        return ;
    }
}