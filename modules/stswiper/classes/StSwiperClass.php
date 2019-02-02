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

class StSwiperClass extends ObjectModel
{
	/** @var integer id*/
	public $id;
	/** @var integer group id*/
	public $id_st_swiper_group;
	/** @var boolen open in a new window */
	public $new_window;
	/** @var integer */
    public $text_position;
	/** @var integer */
    public $text_align;
	/** @var string */
    public $text_color;
	/** @var string */
    public $text_bg;
	/** @var integer */
	public $active;
	/** @var integer */
	public $position;
	/** @var string banner url*/
	public $url;
	/** @var string banner description*/
	public $description;
	/** @var string banner image*/
	public $image_multi_lang;
	/** @var string banner thumb*/
	public $image_lang_default;
	/** @var string */
	public $title;
	/** @var integer */
	public $width;
	/** @var integer */
	public $height;
	/** @var boolen */
	public $isbanner;
	/** @var boolen */
	public $hide_text_on_mobile;
	/** @var integer */
	public $text_animation;
	/** @var string */
    public $btn_color;
	/** @var string */
    public $btn_bg;
	/** @var string */
    public $btn_hover_color;
	/** @var string */
    public $btn_hover_bg;
    /** @var integer */
    public $text_width;
	/** @var integer */
    public $content_width;
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_swiper',
		'primary'   => 'id_st_swiper',
		'multilang' => true,
		'fields'    => array(
			'id_st_swiper_group'         =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'new_window'                 =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'text_position'              =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'text_align'                 =>	array('type' => self::TYPE_INT),
			'text_color'                 => array('type' => self::TYPE_STRING, 'size' => 7),
			'text_bg'                    => array('type' => self::TYPE_STRING, 'size' => 7),
			'active'                     =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'position'                   =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),	
			'isbanner'                   =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),	
			'hide_text_on_mobile'        =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),	
			'text_animation'             =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),	
			'btn_color'                  => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_bg'                     => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_hover_color'            => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_hover_bg'               => array('type' => self::TYPE_STRING, 'size' => 7),
            'text_width'                 => array('type' => self::TYPE_INT),
			'content_width'          	  	 => array('type' => self::TYPE_INT),
			// Lang fields
			'url'                        =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
			'description'                => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
			'image_multi_lang'           =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
			'image_lang_default'         =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
			'title'                      =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
			'width'                      => array('type' => self::TYPE_INT, 'lang' => true, 'validate' => 'isunsignedInt'),	
			'height'                     => array('type' => self::TYPE_INT, 'lang' => true, 'validate' => 'isunsignedInt'),	
		)
	);
    public function delete()
    {
        if ($this->image && file_exists(_PS_ROOT_DIR_.$this->image))
	        @unlink(_PS_ROOT_DIR_.$this->image);
        if ($this->thumb && file_exists(_PS_ROOT_DIR_.$this->thumb))
	        @unlink(_PS_ROOT_DIR_.$this->thumb);
            
        if(isset($this->image_multi_lang) && count($this->image_multi_lang))
            foreach($this->image_multi_lang as $v)
                if ($v && file_exists(_PS_ROOT_DIR_.$v))
    	           @unlink(_PS_ROOT_DIR_.$v);
                                      
        if(isset($this->image_lang_default) && count($this->image_lang_default))
            foreach($this->image_lang_default as $v)
                if ($v && file_exists(_PS_ROOT_DIR_.$v))
    	           @unlink(_PS_ROOT_DIR_.$v);
                                      
		$res = parent::delete();
        if ($res)
            StSwiperFontClass::deleteBySlider($this->id);
        return $res;
    }
    
	public static function getAll($id_st_swiper_group, $id_lang, $active=0, $isbanner=0)
	{
	   if (!Validate::isUnsignedId($id_lang))
			die(Tools::displayError());

		$result = Db::getInstance()->executeS('
			SELECT sms.*, smsl.*
            '.($active ? ',IF(image_multi_lang<>"" && !ISNULL(image_multi_lang), image_multi_lang, image_lang_default) AS image_multi_lang' :'').'
			FROM `'._DB_PREFIX_.'st_swiper` sms
			LEFT JOIN `'._DB_PREFIX_.'st_swiper_lang` smsl ON (sms.`id_st_swiper` = smsl.`id_st_swiper`)
			WHERE smsl.`id_lang` = '.(int)$id_lang.' AND sms.`id_st_swiper_group`='.(int)$id_st_swiper_group.' AND sms.`isbanner`='.($isbanner ? 1 : 0).($active ? ' AND sms.`active`=1 ' : '').'
            ORDER BY sms.`position`
            ');
        foreach($result AS &$rs)
            self::fetchMediaServer($rs);
        return $result;
	}

	public function copyFromPost()
	{
		/* Classical fields */
		foreach ($_POST AS $key => $value)
			if (key_exists($key, $this) && $key != 'id_'.$this->table && !isset($_FILES[$key]))
				$this->{$key} = $value;

		/* Multilingual fields */
		if (sizeof($this->fieldsValidateLang))
		{
			$languages = Language::getLanguages(false);
			foreach ($languages AS $language)
				foreach ($this->fieldsValidateLang AS $field => $validation)
					if (isset($_POST[$field.'_'.(int)($language['id_lang'])]) && !isset($_FILES[$field.'_'.(int)($language['id_lang'])]))
						$this->{$field}[(int)($language['id_lang'])] = $_POST[$field.'_'.(int)($language['id_lang'])];
		}
	}
    public function updatePosition($way, $position)
	{
		if (!$res = Db::getInstance()->executeS('
			SELECT `id_st_swiper`, `position`, `id_st_swiper_group`
			FROM `'._DB_PREFIX_.'st_swiper` 
			WHERE `id_st_swiper_group` = '.(int)$this->id_st_swiper_group.'
			ORDER BY `position` ASC'
		))
			return false;

		foreach ($res as $slide)
			if ((int)$slide['id_st_swiper'] == (int)$this->id)
				$moved_slide = $slide;

		if (!isset($moved_slide) || !isset($position))
			return false;

		return (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_swiper`
			SET `position`= `position` '.($way ? '- 1' : '+ 1').'
			WHERE `position`
			'.($way
				? '> '.(int)$moved_slide['position'].' AND `position` <= '.(int)$position
				: '< '.(int)$moved_slide['position'].' AND `position` >= '.(int)$position).'
			AND `id_st_swiper_group`='.(int)$moved_slide['id_st_swiper_group'])
		&& Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_swiper`
			SET `position` = '.(int)$position.'
			WHERE `id_st_swiper` = '.(int)$moved_slide['id_st_swiper']));
	}
    public function checkPosition()
    {
        $check = Db::getInstance()->getValue('
			SELECT count(0)
			FROM `'._DB_PREFIX_.'st_swiper` 
			WHERE `id_st_swiper_group` = '.(int)$this->id_st_swiper_group.' AND `position`='.(int)$this->position.($this->id ? ' AND `id_st_swiper`!='.$this->id : '')
		);
        if($check)
            return Db::getInstance()->getValue('
    			SELECT `position`+1
    			FROM `'._DB_PREFIX_.'st_swiper` 
    			WHERE `id_st_swiper_group` = '.(int)$this->id_st_swiper_group.'
                ORDER BY `position` DESC'
    		);
        return $this->position;
    }
    public static function getOptions()
    {
        return Db::getInstance()->executeS('
			SELECT `id_st_swiper`, `text_color`, `text_bg`, `btn_color`, `btn_bg`, `btn_hover_color`, `btn_hover_bg`
			FROM `'._DB_PREFIX_.'st_swiper` 
			WHERE `active` = 1 and (`text_color`!="" or `text_bg`!="" or `btn_color`!="" or `btn_bg`!="" or `btn_hover_color`!="" or `btn_hover_bg`!="")
		');
    }
    public static function fetchMediaServer(&$slider)
    {
        $fields = array('image','thumb','image_multi_lang','image_lang_default');
        if (is_string($slider) && $slider)
        {
            if (strpos($slider, '/upload/') === false && strpos($slider, '/modules/') === false)
                $slider = _THEME_PROD_PIC_DIR_.$slider;
            $slider = context::getContext()->link->protocol_content.Tools::getMediaServer($slider).$slider;
        }
        foreach($fields AS $field)
        {
            if (is_array($slider) && isset($slider[$field]) && $slider[$field])
            {
                if (strpos($slider[$field], '/upload/') === false && strpos($slider[$field], '/modules/') === false )
                    $slider[$field] = _THEME_PROD_PIC_DIR_.$slider[$field];
                $slider[$field] = context::getContext()->link->protocol_content.Tools::getMediaServer($slider[$field]).$slider[$field];
            }
        }
    }
}