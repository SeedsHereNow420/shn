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

class StMultiLinkClass extends ObjectModel
{
	public $id;
	public $new_window;
	public $nofollow;
	public $id_st_multi_link_group;
    public $id_category;
	public $id_cms;
	public $id_cms_category;
    public $id_st_blog_category;
	public $id_supplier;
	public $id_manufacturer;
	public $pagename;
    public $active;
	public $position;
	public $name;
	public $url;
	public $icon_class;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_multi_link',
		'primary'   => 'id_st_multi_link',
		'multilang' => true,
		'fields'    => array(
			'id_st_multi_link_group' => array('type' => self::TYPE_INT, 'validate' => 'isInt','required' => true),
            'id_category'            => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_cms'                 => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_cms_category'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'id_st_blog_category'    => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_supplier'            => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'id_manufacturer'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'pagename'               => array('type' => self::TYPE_STRING, 'validate' => 'isControllerName'),
			'active'                 => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
			'position'               => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			'new_window'             => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
			'nofollow'               => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
			'icon_class'             =>	array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isGenericName'),
			
			// Lang fields
			'name'                   => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isAnything'),
			'url'                    => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
		)
	);

    public static function getAll($id_st_multi_link_group, $id_lang,$active=0)
	{
	   if (!Validate::isUnsignedId($id_lang))
			die(Tools::displayError());

		return  Db::getInstance()->executeS('
			SELECT sml.*, smll.`name`, smll.`url`
			FROM `'._DB_PREFIX_.'st_multi_link` sml
			LEFT JOIN `'._DB_PREFIX_.'st_multi_link_lang` smll ON (sml.`id_st_multi_link` = smll.`id_st_multi_link`)
			WHERE smll.`id_lang` = '.(int)$id_lang.' AND sml.`id_st_multi_link_group`='.(int)$id_st_multi_link_group.($active ? ' AND sml.`active`=1 ' : '').'
            ORDER BY sml.`position`
            ');
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
			SELECT `id_st_multi_link`, `position`, `id_st_multi_link_group`
			FROM `'._DB_PREFIX_.'st_multi_link`
			WHERE `id_st_multi_link_group` = '.(int)$this->id_st_multi_link_group.'
			ORDER BY `position` ASC'
		))
			return false;

		foreach ($res as $link)
			if ((int)$link['id_st_multi_link'] == (int)$this->id)
				$moved_link = $link;

		if (!isset($moved_link) || !isset($position))
			return false;

		return (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_multi_link`
			SET `position`= `position` '.($way ? '- 1' : '+ 1').'
			WHERE `position`
			'.($way
				? '> '.(int)$moved_link['position'].' AND `position` <= '.(int)$position
				: '< '.(int)$moved_link['position'].' AND `position` >= '.(int)$position).'
			AND `id_st_multi_link_group`='.(int)$moved_link['id_st_multi_link_group'])
		&& Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_multi_link`
			SET `position` = '.(int)$position.'
			WHERE `id_st_multi_link` = '.(int)$moved_link['id_st_multi_link']));
	}
    public function checkPostion()
    {
        $check = Db::getInstance()->getValue('
			SELECT count(0)
			FROM `'._DB_PREFIX_.'st_multi_link` 
			WHERE `id_st_multi_link_group` = '.(int)$this->id_st_multi_link_group.' AND `position`='.$this->position.($this->id ? ' AND `id_st_multi_link`!='.$this->id : '')
		);
        if($check)
            return Db::getInstance()->getValue('
    			SELECT `position`+1
    			FROM `'._DB_PREFIX_.'st_multi_link` 
    			WHERE `id_st_multi_link_group` = '.(int)$this->id_st_multi_link_group.'
                ORDER BY `position` DESC'
    		);
        return $this->position;
    }
    
    public static function deleteBySupplierId($id)
    {
        if(!$id)
            return false;
        return Db::getInstance()->execute('
            DELETE 
            FROM `'._DB_PREFIX_.'st_multi_link`
            WHERE `id_supplier` ='.(int)$id
        );
    }
    public static function deleteByManufacturerId($id)
    {
        if(!$id)
            return false;
        return Db::getInstance()->execute('
            DELETE 
            FROM `'._DB_PREFIX_.'st_multi_link`
            WHERE `id_manufacturer` ='.(int)$id
        );
    }
    public static function deleteByCmsId($id)
    {
        if(!$id)
            return false;
        return Db::getInstance()->execute('
            DELETE 
            FROM `'._DB_PREFIX_.'st_multi_link`
            WHERE `id_cms` ='.(int)$id
        );
    }
    
    public static function deleteByCategoryId($id)
    {
        if(!$id)
            return false;
        return Db::getInstance()->execute('
            DELETE 
            FROM `'._DB_PREFIX_.'st_multi_link`
            WHERE `id_category` ='.(int)$id
        );
    }
}