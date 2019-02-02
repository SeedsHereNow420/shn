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

class StStickersClass extends ObjectModel
{
	/** @var integer id*/
	public $id;
	/** @var integer */
    public $type;
	/** @var string */
    public $text_color;
	/** @var string */
    public $bg_color;
    /** @var string */
    public $border_color;
    /** @var integer */
    public $border_width;
    /** @var integer */
    public $border_radius;
    /** @var float */
    public $bg_opacity;
     /** @var integer */
    public $text_width;
     /** @var integer */
    public $text_height;
	/** @var integer */
    public $font_size;
    /** @var integer */
    public $sticker_position;
	/** @var integer */
	public $active;
    /** @var string*/
	public $name;
	/** @var string*/
	public $text;
	/** @var string banner image*/
	public $image_multi_lang;
	/** @var string banner thumb*/
	public $image_lang_default;
	/** @var integer */
	public $width;
	/** @var integer */
	public $height;
    /** @var boolen */
    public $hide_on_mobile;
	/** @var integer */
	public $is_flag;
    /** @var integer */
    public $offset_x;
    /** @var integer */
    public $offset_y;
    /** @var string */
    public $text_font;
    /** @var string */
    public $text_font_weight;
    /** @var integer */
    public $position;
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_sticker',
		'primary'   => 'id_st_sticker',
		'multilang' => true,
		'fields'    => array(
			'type'                 =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'text_color'           =>   array('type' => self::TYPE_STRING, 'size' => 7),
			'bg_color'             =>   array('type' => self::TYPE_STRING, 'size' => 7),
            'border_color'         =>   array('type' => self::TYPE_STRING, 'size' => 7),
            'border_width'         =>   array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'border_radius'        =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'bg_opacity'           =>	array('type' => self::TYPE_FLOAT, 'validate' => 'isfloat'),
            'text_width'           =>   array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'text_height'          =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'font_size'            =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'sticker_position'     =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'active'               =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),		
            'hide_on_mobile'       =>   array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'is_flag'              =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'offset_x'             =>   array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'offset_y'             =>   array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'text_font'            =>   array('type' => self::TYPE_STRING, 'size' => 255),
            'text_font_weight'     =>   array('type' => self::TYPE_STRING, 'size' => 255),
            'position'             =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            
			// Lang fields
            'name'                 =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
			'text'                 =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
			'image_multi_lang'     =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
			'image_lang_default'   =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
			'width'                =>   array('type' => self::TYPE_INT, 'lang' => true, 'validate' => 'isunsignedInt'),	
			'height'               =>   array('type' => self::TYPE_INT, 'lang' => true, 'validate' => 'isunsignedInt'),	
		)
	);
    
    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, $id_shop);
    }
    
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
        $id = $this->id;                              
		if($res = parent::delete()) {
            Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_sticker_map` where `id_st_sticker`='.(int)$id);
		}
        return $res;
    }
    
	public static function getAll($id_lang=0, $active=0, $type=null, $id_string='')
	{
	    if (!$id_lang) {
	       $id_lang = Context::getContext()->language->id;
	    }
        $where = '';
        if ($type !== null) {
            if(!is_array($type))
                $type = (array)$type;
            $where .= ' AND s.`type` IN ('.implode(',',$type).')';
        }

		$result = Db::getInstance()->executeS('
			SELECT s.*, sl.*
            '.($active ? ',IF(image_multi_lang<>"" && !ISNULL(image_multi_lang), image_multi_lang, image_lang_default) AS image_multi_lang' :'').'
			FROM `'._DB_PREFIX_.'st_sticker` s
			LEFT JOIN `'._DB_PREFIX_.'st_sticker_lang` sl ON (s.`id_st_sticker` = sl.`id_st_sticker` AND sl.`id_lang` = '.(int)$id_lang.')
            LEFT JOIN `'._DB_PREFIX_.'st_sticker_shop` ss ON (s.`id_st_sticker` = ss.`id_st_sticker`)
			WHERE ss.`id_shop` = '.(int)Context::getContext()->shop->id.
            ($active ? ' AND s.`active`=1 ' : '').
            $where.
            (trim($id_string) ? ' AND s.`id_st_sticker` IN ('.$id_string.')' : '').'
            ORDER BY s.`position` ASC, s.`id_st_sticker`
            ');
        foreach($result AS &$rs)
            self::fetchMediaServer($rs);
        return $result;
	}
    
    public function clearShopIds()
    {
        if ($this->id) {
            return Db::getInstance()->delete($this->table.'_shop', '`'.bqSQL($this->identifier).'` = '.(int)$this->id);
        }
    }
    
    public function getShopIds()
    {
        $result =array();
        if ($this->id) {
            $result = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.$this->table.'_shop WHERE `'.bqSQL($this->identifier).'` = '.(int)$this->id);
        }
        return $result;
    }
    
    public function restoreShopIds($data = array())
    {
        if ($data && count($data) > 0 && $this->id) {
            Db::getInstance()->insert($this->table.'_shop', $data);
        }
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
    
    public static function getOptions()
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        return Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_sticker` s
            '.Shop::addSqlAssociation('st_sticker', 's').' 
			WHERE `active` = 1
            ORDER BY `position`
		');
        
    }
    
    public static function fetchMediaServer(&$slider)
    {
        $fields = array('image_multi_lang','image_lang_default');
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
    
    public static function deleteByIdCategory($id_category=0) 
    {
        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_sticker_map` WHERE `id_category`='.(int)$id_category);
    }
    
    public static function deleteByIdtManufacturer($id_manufacturer=0) 
    {
        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_sticker_map` WHERE `id_manufacturer`='.(int)$id_manufacturer);
    }
    
    public function cacheFonts()
    {
        $fonts = self::getAll(null, 1);
        $content = '';
        if (is_array($fonts) && count($fonts)) {
            $array = array();
            foreach($fonts AS $font) {
                if ($font['text_font']) {
                    $array[] = $font['text_font'];    
                }
            }
            if ($array) {
                $array = array_unique($array);
                $content = implode('|', $array);
            }
        }
        $module = 'STSTICKERS';
        Configuration::updateValue('STSN_FONT_MODULE_'.$module, $content);
    }
}