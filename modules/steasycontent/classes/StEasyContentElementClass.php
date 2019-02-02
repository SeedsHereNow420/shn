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

class StEasyContentElementClass extends ObjectModel
{
    /** @var Identify for settings. */
    public $type = 2;
    /** @var integer reinsurance id*/
	public $id;
	
	/** @var integer */
	public $id_st_easy_content_element;
    /** @var integer */
    public $id_st_easy_content_column; 
    /** @var integer */
    public $active;
	/** @var integer */
	public $position;
    
 
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_easy_content_element',
		'primary'   => 'id_st_easy_content_element',
		'fields'    => array(
			'id_st_easy_content_element'    => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_st_easy_content_column'     => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'active'                        => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'position'                      => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
		),
	);
    
    public static function getByColumnId($id_st_easy_content_column, $active=0)
    {
        return Db::getInstance()->executeS('
            SELECT *
            FROM `'._DB_PREFIX_.'st_easy_content_element`
            WHERE `id_st_easy_content_column`='.(int)$id_st_easy_content_column.
            ($active ? ' AND `active`=1 ' : '').'
            ORDER BY `position` ASC'
            );
    }
    
    public static function deleteByColumnId($id_st_easy_content_column)
    {
        $rs = true;
        if ($id_st_easy_content_column) {
            $elements = self::getByColumnId($id_st_easy_content_column);
            if ($elements) {
                foreach($elements AS $element) {
                    $rs &= self::deleteById($element['id_st_easy_content_element']); 
                } 
            }
            return $rs;
        }
        return false;
    }
    
    public static function deleteById($id_st_easy_content_element)
    {
        $rs = false;
        if ($id_st_easy_content_element) {
            $rs = Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_easy_content_element`
             WHERE `id_st_easy_content_element`='.(int)$id_st_easy_content_element);
            if ($rs) {
                StEasyContentSettingClass::deleteById($id_st_easy_content_element, 2);
            }
        }
        return $rs;
    }
    
    public static function getElement($id_st_easy_content_element)
    {
        return Db::getInstance()->getValue('
        SELECT element FROM `'._DB_PREFIX_.'st_easy_content_column` c
        LEFT JOIN `'._DB_PREFIX_.'st_easy_content_element` e
        ON (c.id_st_easy_content_column=e.id_st_easy_content_column)
        WHERE e.`id_st_easy_content_element`='.(int)$id_st_easy_content_element
        );
    }
    
    public function copyFromPost()
	{
		/* Classical fields */
		foreach ($_POST AS $key => $value) {
            /* Skip file fields */
            if (isset($_FILES[$key])) {
                continue;
            }
    		if (key_exists($key, $this) && $key != 'id_'.$this->table && !isset($_FILES[$key])) {
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
}