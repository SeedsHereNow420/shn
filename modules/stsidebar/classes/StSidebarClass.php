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

class StSidebarClass extends ObjectModel
{
	/** @var integer*/
	public $id;
    /** @var integer*/
    public $location;
    /** @var integer*/
    public $direction;
    /** @var boolen */ 
    public $hide_on_mobile;
    /** @var boolen */ 
    public $active;
    /** @var integer*/
    public $position;

    /** @var integer*/
    public $native_modules;

    /** @var string*/
    public $btn_color;
    /** @var string*/
    public $btn_bg;
    /** @var string*/
    public $btn_hover_color;
    /** @var string*/
    public $btn_hover_bg;

    /** @var string*/
    public $icon_class;
    /** @var string*/
    public $content;
    /** @var string*/
    public $title;


	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_sidebar',
		'primary'   => 'id_st_sidebar',
        'multilang' => true,
		'fields'    => array(
            'location'            =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'direction'            =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'hide_on_mobile'      =>array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
            'active'              =>array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'position'            =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),

            'native_modules'      =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            
            'btn_color'           =>array('type' => self::TYPE_STRING, 'size' => 7),
            'btn_bg'              =>array('type' => self::TYPE_STRING, 'size' => 7),
            'btn_hover_color'     =>array('type' => self::TYPE_STRING, 'size' => 7),
            'btn_hover_bg'        =>array('type' => self::TYPE_STRING, 'size' => 7),

            'icon_class'          => array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isGenericName'),
            
            // Lang fields
            'title'               => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
            'content'             =>   array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isAnything'),
        ),
	);
    
    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, $id_shop);
    }
    
	public static function getAll($id_lang,$active=0,$location=null)
	{
        Shop::addTableAssociation('st_sidebar', array('type' => 'shop'));

        $where = '';
        if($location!=null)
        {
            if (!is_array($location)) {
                $location = (array)$location;
            }
            $where .= ' AND snl.`location` IN ('.implode(',',$location).')';
        }
		return Db::getInstance()->executeS('
			SELECT snl.*, snll.`title`, snll.`content`
			FROM `'._DB_PREFIX_.'st_sidebar` snl
			'.Shop::addSqlAssociation('st_sidebar', 'snl').'
            LEFT JOIN `'._DB_PREFIX_.'st_sidebar_lang` snll ON (snl.`id_st_sidebar` = snll.`id_st_sidebar`)
            WHERE snll.`id_lang` = '.(int)$id_lang.$where.($active ? ' AND snl.`active`=1 ' : '').'
            ORDER BY snl.`location`, snl.`position`'
            );
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
    
    public static function getSidebar($id_lang, $identify, $type=1)
    {
        $identify = (array)$identify;
        Shop::addTableAssociation('st_sidebar', array('type' => 'shop'));
        $where = '';
        if($type==1)
            $where .= ' AND snl.`location` IN ('.implode(',',$identify).')';

        if(!$where)
            return false;
        $result = Db::getInstance()->executeS('
			SELECT snl.*, snll.`content`
			FROM `'._DB_PREFIX_.'st_sidebar` snl
			'.Shop::addSqlAssociation('st_sidebar', 'snl').'
            LEFT JOIN `'._DB_PREFIX_.'st_sidebar_lang` snll ON (snl.`id_st_sidebar` = snll.`id_st_sidebar`)
			WHERE snl.`active`=1 AND snll.`id_lang` = '.(int)$id_lang.$where.' 
            ORDER BY snl.`position`');
        foreach($result AS &$rs)
            self::fetchMediaServer($rs);
        return $result;
    }
    
    public static function getOptions()
    {
        return Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_sidebar` 
		');
    }
    
    public static function fetchMediaServer(&$slider)
    {
        $fields = array('bg_img','bg_pattern');
        if (is_string($slider) && $slider)
        {
            if(strpos($slider, '/modules/') === false)
                $slider = _THEME_PROD_PIC_DIR_.$slider;
            $slider = context::getContext()->link->protocol_content.Tools::getMediaServer($slider).$slider;
        }
        foreach($fields AS $field)
        {
            if (is_array($slider) && isset($slider[$field]) && $slider[$field])
            {
                if(strpos($slider[$field], '/modules/') === false)
                    $slider[$field] = _THEME_PROD_PIC_DIR_.$slider[$field];
                $slider[$field] = context::getContext()->link->protocol_content.Tools::getMediaServer($slider[$field]).$slider[$field];
            }
        }
    }
}