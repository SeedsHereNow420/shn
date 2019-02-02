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

class StEasyContentSettingClass extends ObjectModel
{
	/** @var integer reinsurance id*/
	public $id;
	
	/** @var integer */
	public $id_st_easy_content_setting;
    /** @var string */
    public $setting_k; 
    /** @var string */
    public $setting_v;
	/** @var integer */
	public $setting_type;
    
    private static $_instance;
    
    private static $_field_pre = 'st_';


	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_easy_content_setting',
		'fields'    => array(
			'id_st_easy_content_setting'    => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'setting_k'                     => array('type' => self::TYPE_STRING, 'validate' => 'isConfigName', 'required' => true),
            'setting_v'                     => array('type' => self::TYPE_HTML),
			'setting_type'                  => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
		),
	);
    
    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        
        return self::$_instance;
    }
    
    public static function getSetting($id_st_easy_content_setting, $type = 1, $merge = true, $id_lang = null)
    {
        $ret = array();
        if (!$id_st_easy_content_setting || !$type) {
            return $ret;
        }
        $result = Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'st_easy_content_setting`
        WHERE id_st_easy_content_setting = '.(int)$id_st_easy_content_setting.'
        AND setting_type = '.(int)$type.'
        ');
        $lang_default = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        if ($merge) {
            foreach($result AS $row) {
                if ((int)$id_lang && preg_match('/^.+_(\d+)$/iS', $row['setting_k'], $ma)) {
                    $key = str_replace('_'.(int)$ma[1], '', $row['setting_k']);
                    if ((int)$id_lang == (int)$ma[1]) {
                        $ret[$key] = $row['setting_v'];
                    }
                    // If no value for current lang, use default lang.
                    if ((int)$ma[1] == $lang_default->id && !isset($ret[$key])) {
                        $ret[$key] = $row['setting_v'];
                    }
                } else {
                   $ret[$row['setting_k']] = $row['setting_v']; 
                }
            }
            return $ret;
        }
        return $result;
    }
    
    public static function get($id_st_easy_content_setting, $key, $type = 1, $default = false)
    {
        static $settings;
        if (!$settings) {
            $settings = self::getSetting($id_st_easy_content_setting, $type);    
        }
        if ($key && key_exists($key, $settings)) {
            return $settings[$key];
        } else {
            return $default;
        }
    }
    
    public static function saveSetting($id_st_easy_content_setting, $value = array(), $type = 1)
    {
        if (!is_array($value)) {
            $value = (array)$value;
        }
        if (!$id_st_easy_content_setting || !$value || !$type) {
            return false;
        }
        $db = Db::getInstance();
        $result = true;
        foreach($value AS $k => $v) {
            
            if (self::has($id_st_easy_content_setting, $k, $type)) {
                $result &= Db::getInstance()->update(self::$definition['table'], array(
                    'setting_v' => pSQL($v,true)
                ), '`setting_k` = \''.pSQL($k).'\' AND setting_type='.(int)$type.' AND id_st_easy_content_setting='.(int)$id_st_easy_content_setting);
            } else {
                $data = array(
                    'id_st_easy_content_setting' => (int)$id_st_easy_content_setting,
                    'setting_k' => pSQL($k),
                    'setting_v' => pSQL($v,true),
                    'setting_type' => (int)$type
                );
                $result &= Db::getInstance()->insert(self::$definition['table'], $data, true);
            }
        }
        return $result;
    }
    
    public static function updateSetting($id, $k, $v, $type=1)
    {
        if (!$id || !$k || !(int)$type) {
            return false;
        }
        return Db::getInstance()->update(self::$definition['table'], array(
                    'setting_v' => pSQL($v,true)
                ), '`setting_k` = \''.pSQL($k).'\' AND setting_type='.(int)$type.' AND id_st_easy_content_setting='.(int)$id);
    }
    
    public static function has($id_st_easy_content_setting, $key, $type = 1)
    {
        return Db::getInstance()->getValue('SELECT COUNT(0) FROM `'._DB_PREFIX_.'st_easy_content_setting`
            WHERE `id_st_easy_content_setting` = '.(int)$id_st_easy_content_setting.'
            AND `setting_type` = '.(int)$type.'
            AND `setting_k` = \''.$key.'\'
        ');
    } 
    
    public static function deleteById($id_st_easy_content_setting, $type=1)
    {
        if ($id_st_easy_content_setting) {
            return Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_easy_content_setting`
             WHERE `id_st_easy_content_setting`='.(int)$id_st_easy_content_setting).'
             AND `setting_type`='.(int)$type;
        }
        return false;
    }
    /**
     * type: 1=column 2=element
     */
    public static function getById($id_st_easy_content_setting, $type=1)
    {
        return Db::getInstance()->executeS('
            SELECT *
            FROM `'._DB_PREFIX_.'st_easy_content_setting`
            WHERE `id_st_easy_content_setting`='.(int)$id_st_easy_content_setting.'
            `setting_type`='.(int)$type.'
            ');
    }
    
    public static function copyFromData($object, $data)
	{
		foreach ($data AS $key => $value) {
    		if (strpos($key, self::$_field_pre) === 0) {
                /* Skip file fields */
                if (isset($_FILES[$key])) {
                    continue;
                }
                
                $object->{$key} = $value;   
                // Multi language, the trail numner is id_lang
                if (preg_match('/^.+_(\d+)$/iS', $key, $ma)) {
                    $id_lang = (int)$ma[1];
                    $key = str_replace('_'.$id_lang, '', $key);
                    if (!isset($object->{$key}) || !is_array($object->{$key})) {
                        $object->{$key} = array();
                    }
                    $object->{$key}[(int)$id_lang] = $value;
                }
			}  
		}
	}
    
    public static function digPost()
    {
        $result = array();
        foreach($_POST AS $key => $value) {
            /* Skip file fields */
            if (isset($_FILES[$key])) {
                continue;
            }
            if (strpos($key, self::$_field_pre) === 0) {
                if (is_array($value)) {
                    $value = implode(',', $value);
                }
                $result[trim($key)] =  $value;
            }
        }
        return $result;
    }
    
    public static function fetchElemetnID($array = array())
    {
        $elements = array();
        foreach($array AS $value) {
            if (isset($value['elements'])) {
                foreach($value['elements'] AS $val) {
                    $elements[] = $val['id_st_easy_content_element'];
                }
            }
            if (isset($value['columns'])) {
                $elements = array_merge($elements, self::fetchElemetnID($value['columns']));
            }
        }
        return $elements;
    }
    
    public static function getGoogleFonts()
    {
        $fonts = array('header_font');
        $ret = array();
        $content = StEasyContentClass::getListContent();
        $elements = array();
        foreach($content AS $value) {
            $columns = StEasyContentColumnClass::recurseLightTree(0, 0, $value['id_st_easy_content']);
            $elements = array_merge($elements, self::fetchElemetnID($columns));
        }
        if (!$elements) {
            return $ret;
        }
        foreach($fonts AS $font) {
            $array = Db::getInstance()->executeS('
             SELECT * FROM `'._DB_PREFIX_.'st_easy_content_setting`
             WHERE (`setting_k`="'.self::$_field_pre.$font.'_select" || `setting_k` = "'.self::$_field_pre.$font.'_weight")
             AND `id_st_easy_content_setting` IN ('.implode(',', $elements).') AND `setting_type`=2
            ');
            if (!$array) {
                continue;
            }
            foreach($array AS $value) {
                $key = $value['setting_type'].'-'.$value['id_st_easy_content_setting'];
                if ($value['setting_k'] == self::$_field_pre.$font.'_select') {
                    $ret[$key]['font'] =  $value['setting_v'];
                }
                if ($value['setting_k'] == self::$_field_pre.$font.'_weight') {
                    $ret[$key]['weight'] =  $value['setting_v'];
                }
            }
        }
        $result = array();
        foreach($ret AS &$v) {
            if (!$v['font']) {
                continue;
            }
            if (isset($v['weight']) && $v['weight']) {
                $v['font'] .= ':'.$v['weight'];
            }
            $result[] = array('font_name' => $v['font']);
        }
        return $result;
    }
}