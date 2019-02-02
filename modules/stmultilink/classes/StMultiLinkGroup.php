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

class StMultiLinkGroup extends ObjectModel
{
	public $id;
    public $location;
	public $new_window;
	public $active;
	public $position;
	public $url;
	public $name;
	/** @var boolen */
	public $hide_on_mobile;
	public $nofollow;
	public $icon_class;
    public $link_align;
    public $font_size;
	public $icon_size;


	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_multi_link_group',
		'primary'   => 'id_st_multi_link_group',
		'multilang' => true,
		'fields'    => array(
			'location'       => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			'new_window'     => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			'active'         => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			'position'       => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			'hide_on_mobile' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'nofollow'       => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'icon_class'     =>	array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isGenericName'),
			'link_align'       => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'font_size'             => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'icon_size'             => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			
			// Lang fields
			'name' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isAnything'),
			'url'  => array('type' => self::TYPE_STRING, 'lang' => true,  'validate' => 'isAnything','size' => 255),
		)
	);

    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, $id_shop);
    }
    
	public static function getAll($id_lang)
	{
        Shop::addTableAssociation('st_multi_link_group', array('type' => 'shop'));
		return  Db::getInstance()->executeS('
			SELECT smlg.*,smlgl.`name`,smlgl.`url`
			FROM `'._DB_PREFIX_.'st_multi_link_group` smlg
			'.Shop::addSqlAssociation('st_multi_link_group', 'smlg').'
			LEFT JOIN `'._DB_PREFIX_.'st_multi_link_group_lang` smlgl ON (smlg.`id_st_multi_link_group` = smlgl.`id_st_multi_link_group`)
            WHERE smlgl.`id_lang` = '.(int)$id_lang
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
    public static function getLinkGroup($identify,$type=1,$id_lang)
    {
        if (!Validate::isUnsignedId($id_lang))
			die(Tools::displayError());

        $identify = (array)$identify;
        
        Shop::addTableAssociation('st_multi_link_group', array('type' => 'shop'));
        $where = '';
        if($type==1)
            $where .= ' AND smlg.`location` IN ('.implode(',',$identify).')';
        elseif($type==2)
            $where .= ' AND smlg.`id_st_multi_link_group` IN ('.implode(',',$identify).')';
        return  Db::getInstance()->executeS('
			SELECT smlg.*,smlgl.`name`,smlgl.`url`
			FROM `'._DB_PREFIX_.'st_multi_link_group` smlg
			'.Shop::addSqlAssociation('st_multi_link_group', 'smlg').'
			LEFT JOIN `'._DB_PREFIX_.'st_multi_link_group_lang` smlgl ON (smlg.`id_st_multi_link_group` = smlgl.`id_st_multi_link_group`)
			WHERE smlg.`active`=1 '.$where.' AND smlgl.`id_lang` = '.(int)$id_lang.'
            ORDER BY smlg.`position`');
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
    public static function getCustomCss()
    {
        $ret =  Db::getInstance()->executeS('
            SELECT * 
            FROM `'._DB_PREFIX_.'st_multi_link_group` 
            WHERE `active` = 1'
        );

        return $ret;
    }
}