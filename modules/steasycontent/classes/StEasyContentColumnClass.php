<?php
/*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class StEasyContentColumnClass extends ObjectModel
{
    /** @var Identify for settings. */
    public $type = 1;
	/** @var integer reinsurance id*/
	public $id;
	
	/** @var integer */
	public $id_st_easy_content;
	/** @var string*/
	public $name;
	/** @var integer*/
	public $id_parent;
    /** @var float */
    public $width; 
    /** @var string */
    public $margin_top; 
    /** @var string */
    public $margin_bottom;
	/** @var boolen */
	public $hide_on_mobile;
	/** @var integer */
	public $element;
	/** @var bool*/
	public $active;
	/** @var integer */
	public $position;
    /** @var string*/
	public $bg_image;
    /** @var string*/
	public $bg_color;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_easy_content_column',
		'primary'   => 'id_st_easy_content_column',
		'fields'    => array(
			'id_st_easy_content'        => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'id_parent'                 => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'name'                      => array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isGenericName'),
            'width'                     => array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
            'margin_top'                => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'margin_bottom'             => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'hide_on_mobile'            => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'element'                   => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'active'                    => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'position'                  => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'bg_image'                  => array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isFileName'),
            'bg_color'                  => array('type' => self::TYPE_STRING, 'size' => 7),
		),
	);
    
	public static function getListContent($id_lang,$location=0,$active=0)
	{
        $where = ''; 

		return Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_easy_content_column` sece
            ORDER BY sece.`position`');
	}
    public static function hasColumn($id_st_easy_content)
    {
        if(!$id_st_easy_content)
            return false;

        return Db::getInstance()->getValue('
            SELECT count(0) 
            FROM `'._DB_PREFIX_.'st_easy_content_column`
            WHERE id_st_easy_content='.$id_st_easy_content
        );
    }
    public function hasElementSelected()
    {
        return $this->element;
    }
    public function hasElement()
    {
        return Db::getInstance()->getValue('
            SELECT count(0) 
            FROM `'._DB_PREFIX_.'st_easy_content_element`
            WHERE id_st_easy_content_column='.$this->id
        );
    }
    public static function getTopColumns($id_st_easy_content,$active=0)
    {
        return Db::getInstance()->executeS('
            SELECT secc.*
            FROM `'._DB_PREFIX_.'st_easy_content_column` secc
             WHERE secc.`id_st_easy_content`='.(int)$id_st_easy_content.
             ' AND secc.`id_parent`=0'.
            ($active ? ' AND secc.`active`=1 ' : '').
            ' ORDER BY secc.`position`');
    }
    public static function getSub($id_parent,$active=0,$id_st_easy_content=0, $row = false)
    {
        return Db::getInstance()->executeS('
            SELECT secc.*
            FROM `'._DB_PREFIX_.'st_easy_content_column` secc
             WHERE secc.`id_parent`='.(int)$id_parent.
            ($active ? ' AND secc.`active`=1 ' : '').
            ($id_st_easy_content ? ' AND secc.`id_st_easy_content`='.(int)$id_st_easy_content : '').
            ($row ? ' AND secc.`width`=0' : '').
            ' ORDER BY secc.`position`');
    }
    public static function recurseTree($id_st_easy_content_column,$max_depth=2,$current_depth=0,$active=0, $merge=false)
    {
        $tree = self::getSub($id_st_easy_content_column,$active);
        if ( ( $max_depth==0 || ($current_depth < $max_depth) ) && $tree && count($tree))
            foreach($tree as $k => $v)
            {
                $jon = self::recurseTree($v['id_st_easy_content_column'],$max_depth,$current_depth+1,$active, $merge);
                if(is_array($jon) && count($jon)) {
                    if ($merge) {
                        $tree = array_merge($tree, $jon);
                    } else {
                        $tree[$k]['columns'] = $jon;
                    }
                }   
            }

        return $tree;
    }
    public static function recurseLightTree($id_st_easy_content_column, $active=1, $id_st_easy_content=0)
    {
        $tree = self::getSub($id_st_easy_content_column, $active, $id_st_easy_content);
        $id_lang = Context::getContext()->language->id;
        if ($tree && count($tree))
            foreach($tree as $k => $v)
            {
                $jon = self::recurseLightTree($v['id_st_easy_content_column'], $active, $id_st_easy_content);
                if(is_array($jon) && count($jon)) {
                    $tree[$k]['columns'] = $jon;
                } else {
                    // Load column settings.
                    $tree[$k] = array_merge($v, StEasyContentSettingClass::getSetting($v['id_st_easy_content_column'], 1, true, $id_lang));
                    // Load Elements.
                    
                        $elements = StEasyContentElementClass::getByColumnId($v['id_st_easy_content_column'], $active);
                        foreach($elements AS $_k => $_v) {
                            $elements[$_k] = array_merge($_v, StEasyContentSettingClass::getSetting($_v['id_st_easy_content_element'], 2, true, $id_lang));
                        }
                        if ($elements) {
                            $tree[$k]['elements'] = $elements;
                        }
                }
            }

        return $tree;
    }
    public static function deleteById($id_st_easy_content_column)
    {
        $rs = false;
        if ($id_st_easy_content_column) {
            $rs = Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_easy_content_column`
             WHERE `id_st_easy_content_column`='.(int)$id_st_easy_content_column);
            if ($rs) {
                // Delete elements.
                StEasyContentElementClass::deleteByColumnId($id_st_easy_content_column);
                // Delete setings.
                StEasyContentSettingClass::deleteById($id_st_easy_content_column, 1);
            }
        }
        return $rs;
    }
    public static function updateElement($id_st_easy_content_column, $element = 0)
    {
        return Db::getInstance()->execute('
         UPDATE `'._DB_PREFIX_.'st_easy_content_column`
         SET `element` = '.(int)$element.'
         WHERE `id_st_easy_content_column` = '.(int)$id_st_easy_content_column.'
        ');
    }
    public static function getParents($id_st_easy_content_column = 0)
    {
        $ret = array();
        $result = Db::getInstance()->getRow('
            SELECT *
            FROM `'._DB_PREFIX_.'st_easy_content_column`
            WHERE `id_st_easy_content_column`='.(int)$id_st_easy_content_column
            );
        if ($result) {
            $ret[] = $result;
            if ($result['id_parent']) {
               $ret = array_merge($ret, self::getParents($result['id_parent'])); 
            }
        }
        return $ret;
    }
    public function copyFromPost()
	{
		/* Classical fields */
		foreach ($_POST AS $key => $value) {
            /* Skip file fields */
            if (isset($_FILES[$key])) {
                continue;
            }
            if (key_exists($key, $this) && $key != 'id_'.$this->table && !isset($_FILES[$key])){
                $this->{$key} = $value;
            }
		}
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
    public function getMaximumPosition($id_parent=0)
    {
        $maximum = Db::getInstance()->getValue('
            SELECT `position`
            FROM `'._DB_PREFIX_.'st_easy_content_column`
            WHERE `id_parent` = '.$id_parent.'
            ORDER BY position DESC');
         return (int)$maximum + 1;
    }
    public function updatePosition($way, $position)
	{
		if (!$res = Db::getInstance()->executeS('
			SELECT `id_st_easy_content_column`, `position`, `id_parent`
			FROM `'._DB_PREFIX_.'st_easy_content_column`
			WHERE `id_parent` = '.(int)$this->id_parent.'
			ORDER BY `position` ASC'
		))
			return false;

		foreach ($res as $col)
			if ((int)$col['id_st_easy_content_column'] == (int)$this->id)
				$moved_col = $col;

		if (!isset($moved_col) || !isset($position))
			return false;

		return (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_easy_content_column`
			SET `position`= `position` '.($way ? '- 1' : '+ 1').'
			WHERE `position`
			'.($way
				? '> '.(int)$moved_col['position'].' AND `position` <= '.(int)$position
				: '< '.(int)$moved_col['position'].' AND `position` >= '.(int)$position).'
			AND `id_parent`='.(int)$moved_col['id_parent'])
		&& Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_easy_content_column`
			SET `position` = '.(int)$position.'
			WHERE `id_st_easy_content_column` = '.(int)$moved_col['id_st_easy_content_column']));
	}
    public function clearPosition()
    {
        $res = Db::getInstance()->executeS('
        SELECT `id_st_easy_content_column` FROM `'._DB_PREFIX_.'st_easy_content_column`
        WHERE `id_parent` = '.(int)$this->id_parent.'
        ORDER BY `position` ASC
        ');
        foreach($res AS $key => $value)
            Db::getInstance()->execute('
            UPDATE `'._DB_PREFIX_.'st_easy_content_column`
			SET `position`= '.(int)$key.'
			WHERE `id_st_easy_content_column` = '.(int)$value['id_st_easy_content_column'].'
            ');
    }
}