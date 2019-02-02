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

class StNotificationClass extends ObjectModel
{
	/** @var integer*/
	public $id;
    /** @var integer*/
    public $template;
    /** @var integer*/
    public $location;
    /** @var integer*/
    public $width;
    /** @var integer*/
    public $x_offset;
    /** @var integer*/
    public $y_offset;
    /** @var integer*/
    public $more_info_link;
    /** @var integer*/
    public $x_button;
    /** @var integer*/
    public $show_box;
    /** @var integer*/
    public $delay;
    /** @var boolen */ 
    public $hide_on_mobile;
    /** @var string*/
    public $tb_padding;
    /** @var string*/
    public $lr_padding;
    /** @var string*/
    public $text_color;
    /** @var string*/
    public $link_hover_color;
    /** @var string*/
    public $text_bg;
    /** @var float*/
    public $bg_opacity;
    /** @var integer*/
    public $border_width;
    /** @var string*/
    public $border_color;
    /** @var string*/
    public $button_color;
    /** @var string*/
    public $button_hover_color;
    /** @var string*/
    public $button_bg;
    /** @var string*/
    public $button_hover_bg;
    /** @var integer*/
    public $h_shadow;
     /** @var integer*/
    public $v_shadow;
     /** @var integer*/
    public $shadow_blur;
    /** @var string*/
    public $shadow_color;
    /** @var float*/
    public $shadow_opacity;
    /** @var boolen */ 
    public $active;
    /** @var integer*/
    public $position;
    /** @var string*/
    public $bg_img;
    
     /** @var string */
    public $accept_button;
    /** @var string*/
    public $more_info;
    /** @var string*/
    public $more_info_link_custom;
    /** @var string*/
    public $content;
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_notification',
		'primary'   => 'id_st_notification',
        'multilang' => true,
		'fields'    => array(
            'template'            =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
            'location'            =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'width'               =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'x_offset'     =>   array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'y_offset'     =>   array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'more_info_link'      =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'x_button'            =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'show_box'            =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'delay'               =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'hide_on_mobile'      =>array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
            'active'              =>array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'position'            =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'tb_padding'          =>array('type' => self::TYPE_STRING, 'validate' => 'isNullOrUnsignedId'),
            'lr_padding'          =>array('type' => self::TYPE_STRING, 'validate' => 'isNullOrUnsignedId'),
            'text_color'          =>array('type' => self::TYPE_STRING, 'size' => 7),
            'link_hover_color'          =>array('type' => self::TYPE_STRING, 'size' => 7),
            'text_bg'             =>array('type' => self::TYPE_STRING, 'size' => 7),
            'bg_opacity'          =>array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
            'border_width'        =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'border_color'        =>array('type' => self::TYPE_STRING, 'size' => 7),
            'button_color'        =>array('type' => self::TYPE_STRING, 'size' => 7),
            'button_hover_color'  =>array('type' => self::TYPE_STRING, 'size' => 7),
            'button_bg'           =>array('type' => self::TYPE_STRING, 'size' => 7),
            'button_hover_bg'     =>array('type' => self::TYPE_STRING, 'size' => 7),
            'h_shadow'            =>array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'v_shadow'            =>array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'shadow_blur'         =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'shadow_color'        =>array('type' => self::TYPE_STRING, 'size' => 7),
            'shadow_opacity'      =>array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
            'bg_img'              =>array('type' => self::TYPE_STRING),
            
            // Lang fields
            'accept_button'        =>array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName'),
            'more_info'            =>array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything'),
            'more_info_link_custom'=>array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything'),
            'content'              =>array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isAnything'),
        ),
	);
    
    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, $id_shop);
    }
    
	public static function getAll($id_lang,$active=0)
	{
        Shop::addTableAssociation('st_notification', array('type' => 'shop'));
		return Db::getInstance()->executeS('
			SELECT snl.*, snll.*
			FROM `'._DB_PREFIX_.'st_notification` snl
			'.Shop::addSqlAssociation('st_notification', 'snl').'
            LEFT JOIN `'._DB_PREFIX_.'st_notification_lang` snll ON (snl.`id_st_notification` = snll.`id_st_notification`)
            WHERE snll.`id_lang` = '.(int)$id_lang.($active ? ' AND snl.`active`=1 ' : '').'
            ORDER BY snl.`location`, snl.`position`'
            );
	}
    
    public static function fetchMediaServer(&$slider)
    {
        $fields = array('bg_img');
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
    
    public static function getNotification($id_lang)
    {
        Shop::addTableAssociation('st_notification', array('type' => 'shop'));
        $where = '';
        
        $result = Db::getInstance()->executeS('
			SELECT snl.*, snll.*
			FROM `'._DB_PREFIX_.'st_notification` snl
			'.Shop::addSqlAssociation('st_notification', 'snl').'
            LEFT JOIN `'._DB_PREFIX_.'st_notification_lang` snll ON (snl.`id_st_notification` = snll.`id_st_notification`)
			WHERE snl.`active`=1 AND snll.`id_lang` = '.(int)$id_lang.$where.' 
            ORDER BY snl.`position`');
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
    
    public static function getOptions()
    {
        return Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_notification` 
		');
    }
}