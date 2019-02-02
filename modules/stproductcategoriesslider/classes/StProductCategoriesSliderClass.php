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

class StProductCategoriesSliderClass extends ObjectModel
{
	/** @var integer reinsurance id*/
	public $id;
	
    /** @var integer */
	public $type;
    
	/** @var integer */
	public $id_shop;
    
	/** @var integer */
	public $id_category;
    
    /** @var integer */
    public $id_manufacturer;
    
	/** @var integer */
	public $nbr;
    
	/** @var integer */
	public $soby;
    
	/** @var integer*/
	public $active;
	
	/** @var integer */
	public $position;
    
	/** @var integer */
	public $display_on;
    /** @var string */
    public $top_margin; 
    /** @var string */
    public $bottom_margin; 

  	public $top_padding;
  	public $bottom_padding;
  	public $bg_pattern;
  	public $bg_img;
  	public $bg_color;
    public $speed;
  	public $bg_img_v_offset;
  	public $title_color;
  	public $title_hover_color;
  	public $text_color;
  	public $price_color;
  	public $grid_bg;
    public $grid_hover_bg;
  	public $link_hover_color;
  	public $direction_color;
  	public $direction_color_hover;
  	public $direction_color_disabled;
  	public $direction_bg;
  	public $direction_hover_bg;
  	public $direction_disabled_bg;
  	public $title_align;
  	public $title_font_size;
  	public $direction_nav;
    public $hide_direction_nav_on_mob;
  	public $control_nav;
    public $hide_control_nav_on_mob;
  	public $control_bg;
  	public $control_bg_hover;
    public $pag_nav_bg;
    public $pag_nav_bg_hover;
    public $title_bottom_border;
    public $title_bottom_border_color;
    public $title_bottom_border_color_h;
    
    public $grid;
    public $random; 
    public $spacing_between;
    public $image_type;
    public $slideshow;
    public $s_speed;
    public $a_speed;
    public $pause_on_hover;
    public $rewind_nav;
    public $lazy;
    public $move;
    public $hide_mob;
    public $display_sd;
    public $countdown_on;
    public $aw_display;
    
    public $display_pro_col;
    public $nbr_col;
    public $items_col;
    public $soby_col;
    public $slideshow_col;
    public $s_speed_col;
    public $a_speed_col;
    public $pause_on_hover_col;
    public $rewind_nav_col;
    public $lazy_col;
    public $move_col;
    public $hide_mob_col;
    public $countdown_on_col;
    public $aw_display_col;
    
    public $nbr_fot;
    public $soby_fot;
    public $aw_display_fot;
    public $hide_mob_fot;
    public $footer_wide;
    
  	public $pro_per_fw;
  	public $pro_per_xxl;
  	public $pro_per_xl;
  	public $pro_per_lg;
  	public $pro_per_md;
  	public $pro_per_sm;
  	public $pro_per_xs;

    /** @var string */
    public $video_poster;
    /** @var integer */
    public $video_v_offset;
    /** @var string */
    public $video_mpfour;
    /** @var string */
    public $video_webm;
    /** @var string */
    public $video_ogg;
    /** @var boolen */  
    public $video_loop;
    /** @var boolen */
    public $video_muted;
    /** @var boolen */
    public $view_more;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_product_categories_slider',
		'primary'   => 'id_st_product_categories_slider',
		'fields'    => array(
			'id_shop'                  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
            'type'                     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_category'              => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'id_manufacturer'          => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt',),
			'nbr'                      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'soby'                     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'active'                   => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
			'position'                 => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'display_on'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'top_margin'               => array('type' => self::TYPE_STRING, 'size' => 10),
			'bottom_margin'            => array('type' => self::TYPE_STRING, 'size' => 10),
			'top_padding'              => array('type' => self::TYPE_STRING, 'size' => 10),
			'bottom_padding'           => array('type' => self::TYPE_STRING, 'size' => 10),
			'bg_pattern'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'bg_img'                   => array('type' => self::TYPE_STRING, 'size' => 255),
			'bg_color'                 => array('type' => self::TYPE_STRING, 'size' => 7),
			'speed'                    => array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
            'bg_img_v_offset'          => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'title_color'              => array('type' => self::TYPE_STRING, 'size' => 7),
			'title_hover_color'        => array('type' => self::TYPE_STRING, 'size' => 7),
			'text_color'               => array('type' => self::TYPE_STRING, 'size' => 7),
			'price_color'              => array('type' => self::TYPE_STRING, 'size' => 7),
			'grid_bg'                  => array('type' => self::TYPE_STRING, 'size' => 7),
            'grid_hover_bg'            => array('type' => self::TYPE_STRING, 'size' => 7),
			'link_hover_color'         => array('type' => self::TYPE_STRING, 'size' => 7),
			'direction_color'          => array('type' => self::TYPE_STRING, 'size' => 7),
			'direction_color_hover'    => array('type' => self::TYPE_STRING, 'size' => 7),
			'direction_color_disabled' => array('type' => self::TYPE_STRING, 'size' => 7),
			'direction_bg'             => array('type' => self::TYPE_STRING, 'size' => 7),
			'direction_hover_bg'       => array('type' => self::TYPE_STRING, 'size' => 7),
            'direction_disabled_bg'    => array('type' => self::TYPE_STRING, 'size' => 7),
			'title_align'              => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'title_font_size'          => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'direction_nav'            => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'hide_direction_nav_on_mob'=> array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'control_nav'              => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'hide_control_nav_on_mob'  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'control_bg'               => array('type' => self::TYPE_STRING, 'size' => 7),
			'control_bg_hover'         => array('type' => self::TYPE_STRING, 'size' => 7),
            'pag_nav_bg'               => array('type' => self::TYPE_STRING, 'size' => 7),
			'pag_nav_bg_hover'         => array('type' => self::TYPE_STRING, 'size' => 7),
            'title_bottom_border'      => array('type' => self::TYPE_STRING, 'size' => 10),
            'title_bottom_border_color'    => array('type' => self::TYPE_STRING, 'size' => 7),
            'title_bottom_border_color_h'  => array('type' => self::TYPE_STRING, 'size' => 7),
            
            'grid'                          => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'random'                        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'spacing_between'               => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'image_type'                    => array('type' => self::TYPE_STRING),
            'slideshow'                     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            's_speed'                       => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'a_speed'                       => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'pause_on_hover'                => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'rewind_nav'                    => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'lazy'                          => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'move'                          => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'hide_mob'                      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'display_sd'                    => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'countdown_on'                  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'aw_display'                    => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            
            'display_pro_col'               => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'nbr_col'                       => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'items_col'                     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'soby_col'                      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'slideshow_col'                 => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            's_speed_col'                   => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'a_speed_col'                   => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'pause_on_hover_col'            => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'rewind_nav_col'                => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'lazy_col'                      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'move_col'                      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'hide_mob_col'                  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'countdown_on_col'              => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'aw_display_col'                => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            
            'nbr_fot'                       => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'soby_fot'                      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'aw_display_fot'                => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'hide_mob_fot'                  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'footer_wide'                   => array('type' => self::TYPE_STRING, 'size' => 3),
            
			'pro_per_fw'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_xxl'              => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_xl'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_lg'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_md'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_sm'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'pro_per_xs'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),

            'video_poster'             => array('type' => self::TYPE_STRING, 'validate' => 'isAnything', 'size' => 255),
            'video_v_offset'           => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'video_mpfour'             => array('type' => self::TYPE_STRING, 'size' => 255),
            'video_webm'               => array('type' => self::TYPE_STRING, 'size' => 255),
            'video_ogg'                => array('type' => self::TYPE_STRING, 'size' => 255),
            'video_loop'               => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'video_muted'              => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'view_more'                => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
		)
	);
    
	public static function getListContent($active=0,$display_on=0)
	{
		return  Db::getInstance()->executeS('
			SELECT spcs.*
			FROM `'._DB_PREFIX_.'st_product_categories_slider` spcs
			WHERE 1 '.Shop::addSqlRestrictionOnLang('spcs').($active ? ' AND spcs.`active`=1 ' : '').($display_on ? ' AND spcs.`display_on`&'.(int)$display_on : '').'
            ORDER BY spcs.`position`');
	}
    public static function deleteByCategoryId($id_category)
    {
        if(!$id_category)
            return false;
        return Db::getInstance()->execute('
            DELETE 
            FROM `'._DB_PREFIX_.'st_product_categories_slider`
            WHERE `id_category` ='.(int)$id_category.Shop::addSqlRestrictionOnLang()
        );
    }
	public function copyFromPost()
	{
		/* Classical fields */
		foreach ($_POST AS $key => $value)
			if (key_exists($key, $this) AND $key != 'id_'.$this->table && !isset($_FILES[$key]))
				$this->{$key} = $value;
	}
    
    public function updatePosition($way, $position)
	{
		if (!$res = Db::getInstance()->executeS('
			SELECT `id_st_product_categories_slider`, `position`
			FROM `'._DB_PREFIX_.'st_product_categories_slider`
			ORDER BY `position` ASC'
		))
			return false;

		foreach ($res as $item)
			if ((int)$item['id_st_product_categories_slider'] == (int)$this->id)
				$moved_item = $item;

		if (!isset($moved_item) || !isset($position))
			return false;

		return (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_product_categories_slider`
			SET `position`= `position` '.($way ? '- 1' : '+ 1').'
			WHERE `position`
			'.($way
				? '> '.(int)$moved_item['position'].' AND `position` <= '.(int)$position
				: '< '.(int)$moved_item['position'].' AND `position` >= '.(int)$position))
		&& Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_product_categories_slider`
			SET `position` = '.(int)$position.'
			WHERE `id_st_product_categories_slider` = '.(int)$moved_item['id_st_product_categories_slider']));
	}
    
    public function checkPostion()
    {
        $check = Db::getInstance()->getValue('
			SELECT count(0)
			FROM `'._DB_PREFIX_.'st_product_categories_slider` 
			WHERE `position`='.$this->position.($this->id ? ' AND `id_st_product_categories_slider`!='.$this->id : '')
		);
        if($check)
            return Db::getInstance()->getValue('
    			SELECT `position`+1
    			FROM `'._DB_PREFIX_.'st_product_categories_slider` 
                ORDER BY `position` DESC'
    		);
        return $this->position;
    }
    public static function getOptions()
    {
        return Db::getInstance()->executeS('
            SELECT * 
            FROM `'._DB_PREFIX_.'st_product_categories_slider` 
            WHERE `active` = 1 
        ');
    }
    public static function fetchMediaServer(&$banner)
    {
        $fields = array('image_multi_lang');
        if (is_string($banner) && $banner)
        {
            if (strpos($banner, '/upload/') === false && strpos($banner, '/modules/') === false)
                $banner = _THEME_PROD_PIC_DIR_.$banner;
            $banner = context::getContext()->link->protocol_content.Tools::getMediaServer($banner).$banner;
            return $banner;
        }
        foreach($fields AS $field)
        {
            if (is_array($banner) && isset($banner[$field]) && $banner[$field])
            {
                if (strpos($banner[$field], '/upload/') === false && strpos($banner[$field], '/modules/') === false )
                    $banner[$field] = _THEME_PROD_PIC_DIR_.$banner[$field];
                $banner[$field] = context::getContext()->link->protocol_content.Tools::getMediaServer($banner[$field]).$banner[$field];
            }
        }
    }
}