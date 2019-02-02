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

class StSocialClass extends ObjectModel
{
    /** @var integer*/
    public $id;
    /** @var integer*/
    public $item;
	/** @var string*/
	public $title;
    /** @var string*/
	public $icon_class;
    /** @var string*/
	public $url;
    /** @var string*/
	public $url_key;
    /** @var string*/
	public $name_key;
    /** @var string*/
	public $image_key;
	/** @var boolen */
	public $hide_on_mobile;
	/** @var integer */
	public $active;
    /** @var integer */
    public $position; 
    /** @var string*/
	public $btn_color;
    /** @var string*/
	public $btn_bg;
    /** @var string*/
	public $btn_hover_color;
    /** @var string*/
	public $btn_hover_bg;
    /** @var float */
    public $bg_opacity;
    /** @var boolen */
    public $sidebar;
                
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_social',
		'primary'   => 'id_st_social',
        'multilang' => true,
		'fields'    => array(
            'url'             => array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isAnything', 'required' => true),
            'icon_class'      => array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isGenericName', 'required' => true),
            'url_key'         => array('type' => self::TYPE_STRING, 'size' => 32, 'validate' => 'isGenericName', 'required' => true),
            'name_key'        => array('type' => self::TYPE_STRING, 'size' => 32, 'validate' => 'isGenericName'),
            'image_key'       => array('type' => self::TYPE_STRING, 'size' => 32, 'validate' => 'isGenericName'),
            'hide_on_mobile'  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'item'            => array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isGenericName'),
            'active'          => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'position'        => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'btn_color'       => array('type' => self::TYPE_STRING, 'size' => 7),
            'btn_bg'          => array('type' => self::TYPE_STRING, 'size' => 7),
            'btn_hover_color' => array('type' => self::TYPE_STRING, 'size' => 7),
            'btn_hover_bg'    => array('type' => self::TYPE_STRING, 'size' => 7),
            'bg_opacity'      => array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
            'sidebar'        => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            
            'title'           => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName'),
        ),
	);
    
    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, $id_shop);
    }
    
	public static function getAll($id_lang=null, $active=0)
	{
        Shop::addTableAssociation('st_social', array('type' => 'shop'));
        $id_lang || $id_lang = Context::getContext()->language->id;
		return  Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_social` s
            LEFT JOIN `'._DB_PREFIX_.'st_social_lang` sl
            ON (s.`id_st_social`=sl.`id_st_social` AND sl.`id_lang`='.(int)$id_lang.')
			'.Shop::addSqlAssociation('st_social', 's').
            ($active ? ' WHERE s.`active`=1':'').
            ' ORDER BY s.`position`, s.`id_st_social`'
            );
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
}