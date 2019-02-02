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

class StPageBannerClass extends ObjectModel
{
	/** @var integer id*/
	public $id;
	/** @var integer */
	public $active;
	/** @var integer */
	public $position;
	/** @var string banner image*/
	public $image_multi_lang;
    /** @var string banner image*/
    public $image_lang_default;
	/** @var integer */
	public $width;
	/** @var integer */
	public $height;
	/** @var string banner description*/
	public $description;
	/** @var integer */
    public $text_align;
    
    public $item_k;
    public $item_v;

	/** @var boolen */
	public $hide_on_mobile;
    /** @var string */
    public $top_spacing; 
    /** @var string */
    public $bottom_spacing;
    /** @var integer */
    public $padding_top;
    /** @var integer */
    public $padding_bottom;
	/** @var string */
    public $text_color;
    /** @var string */
    public $link_color;
	/** @var string */
    public $link_hover_color;
	/** @var string */
    public $bg_color;
	/** @var string */
    public $border_color;
    /** @var integer */
    public $border_size;
    /** @var integer */
    public $border_top_size;
    /** @var integer */
    public $font_size;
    /** @var integer */
    public $hide_breadcrumb;

   
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_page_banner',
		'primary'   => 'id_st_page_banner',
		'multilang' => true,
		'fields'    => array(
			'active'              => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'position'            => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),		
            'text_align'          => array('type' => self::TYPE_INT),
			'hide_breadcrumb'     => array('type' => self::TYPE_INT),
			'item_k'              => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'item_v'              => array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isGenericName'),
            'hide_on_mobile'      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'top_spacing'         => array('type' => self::TYPE_STRING, 'size' => 10),
            'bottom_spacing'      => array('type' => self::TYPE_STRING, 'size' => 10),
            'padding_top'         => array('type' => self::TYPE_STRING, 'size' => 10),
            'padding_bottom'      => array('type' => self::TYPE_STRING, 'size' => 10),
            'font_size'           => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'text_color'          => array('type' => self::TYPE_STRING, 'size' => 7),
            'link_color'          => array('type' => self::TYPE_STRING, 'size' => 7),
			'link_hover_color'    => array('type' => self::TYPE_STRING, 'size' => 7),
			'bg_color'            => array('type' => self::TYPE_STRING, 'size' => 7),
			'border_color'        => array('type' => self::TYPE_STRING, 'size' => 7),
            'border_size'         => array('type' => self::TYPE_STRING, 'size' => 10),
            'border_top_size'     => array('type' => self::TYPE_STRING, 'size' => 10),

			// Lang fields
			'description'         => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
			'image_multi_lang'    => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
            'image_lang_default'  => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
			'width'               => array('type' => self::TYPE_INT, 'lang' => true, 'validate' => 'isunsignedInt'),	
			'height'              => array('type' => self::TYPE_INT, 'lang' => true, 'validate' => 'isunsignedInt'),	
		),
	);
    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, $id_shop);
    }
    public function delete()
    {            
        if(isset($this->image_multi_lang) && count($this->image_multi_lang))
            foreach($this->image_multi_lang as $v)
                if ($v && file_exists(_PS_ROOT_DIR_.$v))
    	           @unlink(_PS_ROOT_DIR_.$v);
                   
		$res = parent::delete();
        if ($res && !$this->hasMultishopEntries()) {
            StPageBannerFontClass::deleteBySlider($this->id);
        }
        return $res;
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
	public static function getAll($identify=0, $type=0, $id_lang, $active=0, $limit=0)
	{
	   Shop::addTableAssociation('st_page_banner', array('type' => 'shop'));
        if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
        $where = '';
        if ($identify)
            $where = ' AND sms.`item_v`="'.$identify.'"';

		$result = Db::getInstance()->executeS('
			SELECT sms.*, smsl.*
            '.($active ? ',IF(image_multi_lang<>"" && !ISNULL(image_multi_lang), image_multi_lang, image_lang_default) AS image_multi_lang' :'').'
			FROM `'._DB_PREFIX_.'st_page_banner` sms
			LEFT JOIN `'._DB_PREFIX_.'st_page_banner_lang` smsl ON (sms.`id_st_page_banner` = smsl.`id_st_page_banner`)
            '.Shop::addSqlAssociation('st_page_banner', 'sms').'
			WHERE smsl.`id_lang` = '.(int)$id_lang.
            ($active ? ' AND sms.`active`=1 ' : '').		
			($type ? ' AND sms.`item_k`='.(int)$type : '').	
			$where.
            ' ORDER BY sms.`position`
            '.($limit ? ' LIMIT '.$limit : '').'
            ');
		if(is_array($result) && count($result))
	        foreach($result AS &$rs)
	            self::fetchMediaServer($rs);
        return $result;
	}

	public function copyFromPost()
	{
		/* Classical fields */
		foreach ($_POST AS $key => $value)
			if (key_exists($key, $this) AND $key != 'id_'.$this->table && !isset($_FILES[$key]))
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
    public function checkPosition()
    {
        $check = Db::getInstance()->getValue('
			SELECT count(0)
			FROM `'._DB_PREFIX_.'st_page_banner` 
			WHERE `position`='.(int)$this->position.($this->id ? ' AND `id_st_page_banner`!='.$this->id : '')
		);
        if($check)
            return Db::getInstance()->getValue('
    			SELECT `position`+1
    			FROM `'._DB_PREFIX_.'st_page_banner` 
                ORDER BY `position` DESC'
    		);
        return $this->position;
    }
    public static function fetchMediaServer(&$banner)
    {
        $fields = array('image_multi_lang','image_lang_default');
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
    
	public static function getCustomCss()
	{
        Shop::addTableAssociation('st_page_banner', array('type' => 'shop'));
		return  Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_page_banner` sms 
            '.Shop::addSqlAssociation('st_page_banner', 'sms').'
			WHERE `active` = 1 '
        );
	}
}