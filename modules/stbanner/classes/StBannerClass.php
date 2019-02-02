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

class StBannerClass extends ObjectModel
{
	/** @var integer id*/
	public $id;
	/** @var integer group id*/
	public $id_st_banner_group;
	/** @var integer currency id*/
	public $id_currency;
	/** @var boolen open in a new window */
	public $new_window;
	/** @var integer */
	public $active;
	/** @var integer */
	public $position;
	/** @var string banner url*/
	public $url;
	/** @var string banner title*/
	public $title;
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
	/** @var string */
    public $description_color;
	/** @var integer */
    public $text_position;
	/** @var integer */
    public $text_align;
	/** @var integer */
    public $hide_text_on_mobile;
	/** @var string */
    public $bg_color;
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
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_banner',
		'primary'   => 'id_st_banner',
		'multilang' => true,
		'fields'    => array(
			'id_st_banner_group'  => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'id_currency'         => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'new_window'          => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'active'              => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'position'            => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),		
			'description_color'   => array('type' => self::TYPE_STRING, 'size' => 7),	
			'text_position'       => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'text_align'          => array('type' => self::TYPE_INT),
			'hide_text_on_mobile' => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
			'bg_color'            => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_color'           => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_bg'              => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_hover_color'     => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_hover_bg'        => array('type' => self::TYPE_STRING, 'size' => 7),
			'text_width'          => array('type' => self::TYPE_INT),
			// Lang fields
			'url'                 => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
			'title'               => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName'),
			'description'         => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
			'image_multi_lang'    => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
            'image_lang_default'  => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
			'width'               => array('type' => self::TYPE_INT, 'lang' => true, 'validate' => 'isunsignedInt'),	
			'height'              => array('type' => self::TYPE_INT, 'lang' => true, 'validate' => 'isunsignedInt'),	
		),
	);
    public function delete()
    {            
        if(isset($this->image_multi_lang) && count($this->image_multi_lang))
            foreach($this->image_multi_lang as $v)
                if ($v && file_exists(_PS_ROOT_DIR_.$v))
    	           @unlink(_PS_ROOT_DIR_.$v);
                   
		$res = parent::delete();
        if ($res)
            StBannerFontClass::deleteBySlider($this->id);
        return $res;
    }
    
	public static function getAll($id_st_banner_group, $id_lang, $active=0)
	{
	   if (!Validate::isUnsignedId($id_lang))
			die(Tools::displayError());

		$result = Db::getInstance()->executeS('
			SELECT sms.*, smsl.*
            '.($active ? ',IF(image_multi_lang<>"" && !ISNULL(image_multi_lang), image_multi_lang, image_lang_default) AS image_multi_lang' :'').'
			FROM `'._DB_PREFIX_.'st_banner` sms
			LEFT JOIN `'._DB_PREFIX_.'st_banner_lang` smsl ON (sms.`id_st_banner` = smsl.`id_st_banner`)
			WHERE smsl.`id_lang` = '.(int)$id_lang.' AND sms.`id_st_banner_group`='.(int)$id_st_banner_group.($active ? ' AND sms.`active`=1 ' : '').'
            ORDER BY sms.`position`
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
			SELECT `id_st_banner`, `position`, `id_st_banner_group`
			FROM `'._DB_PREFIX_.'st_banner` 
			WHERE `id_st_banner_group` = '.(int)$this->id_st_banner_group.'
			ORDER BY `position` ASC'
		))
			return false;

		foreach ($res as $banner)
			if ((int)$banner['id_st_banner'] == (int)$this->id)
				$moved_banner = $banner;

		if (!isset($moved_banner) || !isset($position))
			return false;

		return (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_banner`
			SET `position`= `position` '.($way ? '- 1' : '+ 1').'
			WHERE `position`
			'.($way
				? '> '.(int)$moved_banner['position'].' AND `position` <= '.(int)$position
				: '< '.(int)$moved_banner['position'].' AND `position` >= '.(int)$position).'
			AND `id_st_banner_group`='.(int)$moved_banner['id_st_banner_group'])
		&& Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_banner`
			SET `position` = '.(int)$position.'
			WHERE `id_st_banner` = '.(int)$moved_banner['id_st_banner']));
	}
    public function checkPosition()
    {
        $check = Db::getInstance()->getValue('
			SELECT count(0)
			FROM `'._DB_PREFIX_.'st_banner` 
			WHERE `id_st_banner_group` = '.(int)$this->id_st_banner_group.' AND `position`='.(int)$this->position.($this->id ? ' AND `id_st_banner`!='.$this->id : '')
		);
        if($check)
            return Db::getInstance()->getValue('
    			SELECT `position`+1
    			FROM `'._DB_PREFIX_.'st_banner` 
    			WHERE `id_st_banner_group` = '.(int)$this->id_st_banner_group.'
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
    
    public static function deleteBannersByGroupId($id_st_banner_group)
    {
        $res = true;
        $banners = Db::getInstance()->executeS('
            SELECT `id_st_banner`
            FROM `'._DB_PREFIX_.'st_banner`
            WHERE `id_st_banner_group`='.(int)$id_st_banner_group
        );
        $banner_ids = array();
        if(count($banners))
            foreach($banners as $v)
                $banner_ids[] = $v['id_st_banner'];
        if(count($banner_ids))
        {
            $res &= Db::getInstance()->execute('
    			DELETE FROM `'._DB_PREFIX_.'st_banner`
    			WHERE `id_st_banner` in ('.implode(',',$banner_ids).')');
            $res &= Db::getInstance()->execute('
    			DELETE FROM `'._DB_PREFIX_.'st_banner_lang`
    			WHERE `id_st_banner` in ('.implode(',',$banner_ids).')');
        }
        return $res;
    }
	public static function getCustomCss()
	{
		return  Db::getInstance()->executeS('
			SELECT `id_st_banner`, `description_color`, `bg_color`, `btn_color`, `btn_bg`, `btn_hover_color`, `btn_hover_bg`
			FROM `'._DB_PREFIX_.'st_banner` 
			WHERE `active` = 1 and (`description_color`!="" or `bg_color`!="" or `btn_color`!="" or `btn_bg`!="" or `btn_hover_color`!="" or `btn_hover_bg`!="")'
        );
	}
}