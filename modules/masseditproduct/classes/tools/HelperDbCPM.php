<?php
/**
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
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

class HelperDbCPM
{
    const _VERSION_ = '1.1.0';
    private $class;
    private $instance;
    private $definition;

    public function __construct($class_name)
    {
        $this->class = $class_name;
        $this->instance = new $class_name();
        $this->definition = $this->getDefinition($class_name);

        if (isset($this->definition['multilang_shop']) && $this->definition['multilang_shop']
            || $this->existsLangShopField()) {
            $this->definition['fields']['id_shop'] = array(
                'type' => ObjectModel::TYPE_INT,
                'validate' => 'isUnsignedInt',
                'lang' => true);
        }

        return $this;
    }

    public function getDefinition($class_name)
    {
        $class = new ReflectionClass($class_name);
        return $class->getStaticPropertyValue('definition');
    }

    public function installDb()
    {
        $sql = array();
        $exists_fields_shop = false;
        $exists_fields_lang = false;

        $sql['default'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.bqSQL($this->definition['table']).'`
            (%fields%) ENGINE='._MYSQL_ENGINE_.'  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;';
        $sql['lang'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.bqSQL($this->definition['table']).'_lang`
            (%fields%) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';
        $sql['shop'] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.bqSQL($this->definition['table']).'_shop`
            (%fields%) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';
        $fields = array(
            'default' => array(
                $this->definition['primary'] => '`'.bqSQL($this->definition['primary']).'` int(10) signed NOT NULL AUTO_INCREMENT'
            ),
            'lang' => array(
                $this->definition['primary'] => '`'.bqSQL($this->definition['primary']).'` int(10) signed NOT NULL',
                '`id_lang` int(10) signed NOT NULL'
            ),
            'shop' => array(
                $this->definition['primary'] => '`'.bqSQL($this->definition['primary']).'` int(10) signed NOT NULL',
                '`id_shop` int(11) signed NOT NULL'
            )
        );
        //if (isset($this->definition['multilang_shop']) && $this->definition['multilang_shop'])
        //	$fields['lang'][] = '`id_shop` int(11) unsigned NOT NULL';
        foreach ($this->definition['fields'] as $key => $field) {
            $field_sql = $this->definitionFieldToSQL($key, $field);

            if (isset($field['lang']) && $field['lang']) {
                $fields['lang'][] = $field_sql;
                $exists_fields_lang = true;
            }
            if (isset($field['shop']) && $field['shop']) {
                $fields['shop'][] = $field_sql;
                $exists_fields_shop = true;
            }
            if (!isset($field['lang']) || (isset($field['lang']) && !$field['lang'])) {
                $fields['default'][] = $field_sql;
            }
        }
        $fields['default'][] = 'PRIMARY KEY (`'.bqSQL($this->definition['primary']).'`)';
        foreach ($sql as $type => $s) {
            if ($type == 'lang' && !$exists_fields_lang || $type == 'shop' && !$exists_fields_shop) {
                continue;
            }
            $this->execute($s, $fields[$type]);
        }
    }

    /**
     * @param string $field_name
     * @param string $definition
     *
     * @return string
     */
    public function definitionFieldToSQL($field_name, $definition)
    {
        $sql_type = $this->getSQLType($definition['type'], (isset($definition['size']) ? $definition['size'] : null));
        return '`'.bqSQL($field_name).'` '.$sql_type
           .' '.($sql_type != 'text' ? $this->getSQLDefaultVal(
               $field_name,
               (isset($definition['validate']) ? $definition['validate'] : 'isAnything'),
               (isset($definition['required']) && $definition['required'])
           ) : '');
    }

    /**
     * @param $definition
     *
     * @return string
     */
    public function getSQLTypeByDefinition($definition)
    {
        return $this->getSQLType($definition['type'], (isset($definition['size']) ? $definition['size'] : null));
    }

    public function uninstallDb()
    {
        $sql = array();
        $exists_fields_shop = false;
        $exists_fields_lang = false;
        foreach ($this->definition['fields'] as $field) {
            if (isset($field['lang']) && $field['lang']) {
                $exists_fields_lang = true;
            }
            if (isset($field['shop']) && $field['shop']) {
                $exists_fields_shop = true;
            }
        }
        $sql['default'] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.bqSQL($this->definition['table']).'`';
        if ($exists_fields_lang) {
            $sql['lang'] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.bqSQL($this->definition['table']).'_lang`';
        }
        if ($exists_fields_shop) {
            $sql['shop'] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.bqSQL($this->definition['table']).'_shop`';
        }
        foreach ($sql as $s) {
            Db::getInstance()->execute($s);
        }
    }

    /**
     * @param $field_type
     * @param null|array|int $size
     *
     * @return string
     */
    public function getSQLType($field_type, $size = null)
    {
        if ($field_type == ObjectModel::TYPE_STRING || $field_type == ObjectModel::TYPE_HTML || $field_type == ObjectModel::TYPE_NOTHING) {
            if (is_null($size)) {
                return 'text';
            } else {
                return 'varchar('.(int)$size.')';
            }
        } elseif ($field_type == ObjectModel::TYPE_FLOAT) {
            if (is_string($size) && strpos($size, ',') !== false) {
                $size = array_map('intval', explode(',', $size));
                if (count($size) !== 2) {
                    $size = array(20, 6);
                }
            } elseif (is_array($size) && count($size) !== 2) {
                $size = array(20, 6);
            } elseif (is_int($size)) {
                $size = array($size, 6);
            } else {
                $size = array(20, 6);
            }

            return 'decimal('.bqSQL($size[0]).','.bqSQL($size[1]).')';
        } elseif ($field_type == ObjectModel::TYPE_INT) {
            return 'int('.(is_null($size) ? 10 : (int)$size).') signed';
        } elseif ($field_type == ObjectModel::TYPE_DATE) {
            return 'datetime';
        } elseif ($field_type == ObjectModel::TYPE_BOOL) {
            return 'tinyint(1)';
        }
        return 'text';
    }

    public function getSQLDefaultVal($field, $validate, $required = false)
    {
        $default_val = ($required ? 'NOT NULL' : '');
        switch ($validate) {
            case 'isPrice':
                return pSQL($default_val).' DEFAULT "0.000000"';
            case 'isBool':
                return pSQL($default_val).' DEFAULT "'.(isset($this->instance->{$field}) && $this->instance->{$field} ? pSQL($this->instance->{$field}) : '0').'"';
            case 'isDateFormat':
                return pSQL($default_val).' DEFAULT "'
                   .(isset($this->instance->{$field}) && $this->instance->{$field} ? pSQL($this->instance->{$field}) : '0000-00-00 00:00:00').'"';
            default:
                return ($required ?
                    $default_val.(isset($this->instance->{$field}) && $this->instance->{$field} ? ' DEFAULT "'.pSQL($this->instance->{$field}).'"' : '')
                    : (isset($this->instance->{$field}) && $this->instance->{$field} ? ' DEFAULT "'.pSQL($this->instance->{$field}).'"' : 'DEFAULT NULL'));
        }
    }

    /**
     * @param string $table_name
     * @param bool $auto_increment
     *
     * @return string
     */
    public function getTemplateTableSql($table_name, $auto_increment = false)
    {
        return 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.bqSQL($table_name).'`
            (%fields%) ENGINE='._MYSQL_ENGINE_.'  DEFAULT CHARSET=utf8 '.($auto_increment ? 'AUTO_INCREMENT=1;' : '');
    }

    public function execute($sql, $fields)
    {
        $sql = str_replace('%fields%', implode(',', $fields), $sql);
        Db::getInstance()->execute($sql);
    }

    public function getAll()
    {
        if (!$this->existsLangField()) {
            return Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.bqSQL($this->definition['table']).'`');
        } else {
            return $this->getAllLang();
        }
    }

    private function getAllLang()
    {
        return Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.bqSQL($this->definition['table']).'` a
        LEFT JOIN `'._DB_PREFIX_.bqSQL($this->definition['table']).'_lang` b
        ON b.`'.bqSQL($this->definition['primary']).'` = a.`'.bqSQL($this->definition['primary']).'` AND b.`id_lang` = 
        '.(int)Context::getContext()->language->id);
    }

    /**
     * @return bool
     */
    public function existsLangField()
    {
        $exists_fields_lang = false;
        foreach ($this->definition['fields'] as $field) {
            if (isset($field['lang']) && $field['lang']) {
                $exists_fields_lang = true;
            }
        }
        return $exists_fields_lang;
    }

    /**
     * @return bool
     */
    public function existsShopField()
    {
        $exists_fields_shop = false;
        foreach ($this->definition['fields'] as $field) {
            if (isset($field['shop']) && $field['shop']) {
                $exists_fields_shop = true;
            }
        }
        return $exists_fields_shop;
    }

    /**
     * @return bool
     */
    public function existsLangShopField()
    {
        $exists_fields_lang_shop = false;
        foreach ($this->definition['fields'] as $field) {
            if (isset($field['shop']) && $field['shop'] && isset($field['lang']) && $field['lang']) {
                $exists_fields_lang_shop = true;
            }
        }
        return $exists_fields_lang_shop;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getById($id)
    {
        return Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.bqSQL($this->definition['table'])
           .'` WHERE `'.bqSQL($this->definition['primary']).'` = '.(int)$id);
    }

    /**
     * @param $field
     * @param $value
     *
     * @return mixed
     */
    public function getByFieldAndValue($field, $value)
    {
        return Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.bqSQL($this->definition['table']).'` WHERE `'.pSQL($field).'` = "'.pSQL($value).'"');
    }

    /**
     * @return $this
     */
    public static function loadClass($class_name)
    {
        return new self($class_name);
    }

    /**
     * @param string $field
     * @param int $id
     * @param string $value
     *
     * @return $this
     */
    public function updateObjectField($field, $id, $value)
    {
        $class_name = $this->class;
        $definition = ObjectModel::getDefinition($class_name);
        $definition_field = ObjectModel::getDefinition($class_name, $field);
        $ids_shop = Shop::getContextListShopID();
        $multi_shop_active = (int)Configuration::get('PS_MULTISHOP_FEATURE_ACTIVE');

        $lang = (array_key_exists('lang', $definition_field) && $definition_field['lang'] ? true : false);
        $shop = (array_key_exists('shop', $definition_field) && $definition_field['shop'] ? true : false);
        $multi_lang_shop = (array_key_exists('multilang_shop', $definition) && $definition['multilang_shop'] ? true : false);

        if (!$multi_shop_active || ($lang && $multi_lang_shop) || Shop::getContext() == Shop::CONTEXT_ALL) {
            $sql = 'UPDATE '._DB_PREFIX_.bqSQL($definition['table']).($lang ? '_lang' : '');

            if ($lang && is_array($value)) {
                $languages = Language::getLanguages(false);
                $sql .= ' SET `'.pSQL($field).'` = CASE '.PHP_EOL;
                foreach ($languages as $l) {
                    if (array_key_exists($l['id_lang'], $value)) {
                        $sql .= 'WHEN `id_lang` = '.(int)$l['id_lang']
                           .' THEN "'.ObjectModel::formatValue($value[$l['id_lang']], $definition_field['type']).'" '.PHP_EOL;
                    }
                }
                $sql .= 'END ';
            } else {
                $sql .= ' SET `'.pSQL($field).'` = "'.ObjectModel::formatValue($value, $definition_field['type']).'"';
            }

            $sql .= ' WHERE `'.bqSQL($definition['primary']).'` = '.(int)$id;

            if ($multi_shop_active && $lang && $multi_lang_shop) {
                $sql .= ' AND `id_shop` IN('.(count($ids_shop) ? implode(',', array_map('intval', $ids_shop)) : 'NULL').')';
            }

            Db::getInstance()->execute($sql);
        }

        if (!$lang && $shop) {
            $sql_shop = 'UPDATE '._DB_PREFIX_.bqSQL($definition['table']).'_shop';
            $sql_shop .= ' SET `'.pSQL($field).'` = "'.ObjectModel::formatValue($value, $definition_field['type']).'"';
            $sql_shop .= ' WHERE `'.bqSQL($definition['primary']).'` = '.(int)$id;
            if ($multi_shop_active) {
                $sql_shop .= ' AND `id_shop` IN('.(count($ids_shop) ? implode(',', array_map('intval', $ids_shop)) : 'NULL').')';
            }
            Db::getInstance()->execute($sql_shop);
        }

        return $this;
    }

    /**
     * @param string|ObjectModel $entity
     * @param array $definition_fields
     */
    public function installManyToOne($entity, $definition_fields = array())
    {
        $fields = array();

        $fields[$this->definition['primary']] = array('type' => ObjectModel::TYPE_INT, 'validate' => 'isUnsignedInt');
        if ($entity instanceof ObjectModel) {
            $def = $this->getDefinition(get_class($entity));
            $fields[$def['primary']] = array('type' => ObjectModel::TYPE_INT, 'validate' => 'isUnsignedInt');

            $table_name = bqSQL($this->definition['table']).'_'.bqSQL($def['table']);
        } else {
            $table_name = bqSQL($this->definition['table']).'_'.bqSQL($entity);
        }

        $fields = array_merge($fields, $definition_fields);
        $sql = array();

        foreach ($fields as $field_name => $field) {
            $sql[] = $this->definitionFieldToSQL($field_name, $field);
        }
        $this->execute($this->getTemplateTableSql($table_name), $sql);
    }

    public function upgradeManyToOne($entity, $definition_fields = array())
    {
        if ($entity instanceof ObjectModel) {
            $def = $this->getDefinition(get_class($entity));
            $table_name = bqSQL($this->definition['table']).'_'.bqSQL($def['table']);
        } else {
            $table_name = bqSQL($this->definition['table']).'_'.bqSQL($entity);
        }

        $list_fields = $this->getFieldsFromDatabase($table_name);
        $this->dropNotExistsColumns($table_name, $list_fields, $definition_fields);
        $this->upgradeColumnsTable($table_name, $definition_fields, $list_fields);
    }

    public function upgrade()
    {
        $tables = array(
            $this->definition['table'] => array(
                'fields' => $this->getFieldsFromDatabase($this->definition['table']),
                'type' => 'default',
                'excl_columns' => array($this->definition['primary'])
            ),
            $this->definition['table'].'_lang' => array(
                'fields' => $this->getLangFieldsFromDatabase($this->definition['table']),
                'type' => 'lang',
                'excl_columns' => array($this->definition['primary'], 'id_lang')
            ),
            $this->definition['table'].'_shop' => array(
                'fields' => $this->getShopFieldsFromDatabase($this->definition['table']),
                'type' => 'shop',
                'excl_columns' => array($this->definition['primary'], 'id_shop')
            )
        );

        $trigger_install = false;
        foreach ($tables as $table => $list_fields) {
            if (!count($list_fields['fields']) && !$trigger_install) {
                $this->installDb();
                $trigger_install = true;
                continue;
            }

            $this->dropNotExistsColumns($table, $list_fields['fields'], $this->definition['fields'], $list_fields['excl_columns'], $list_fields['type']);
        }

        foreach ($tables as $table => $list_fields) {
            if (!count($list_fields['fields'])) {
                continue;
            }

            $this->upgradeColumnsTable($table, $this->definition['fields'], $list_fields['fields'], $list_fields['type']);
        }
    }

    public function dropNotExistsColumns($table, $list_fields, $definition_fields, $excl_columns = array(), $type_table = null)
    {
        foreach ($list_fields as $list_field) {
            if (in_array($list_field['Field'], $excl_columns)) {
                continue;
            }

            if (!array_key_exists($list_field['Field'], $definition_fields)) {
                $this->dropColumnTable($table, $list_field['Field']);
            } elseif (!is_null($type_table)) {
                $definition_field = $definition_fields[$list_field['Field']];
                if (!$this->checkFieldByTypeTable($type_table, $definition_field)) {
                    $this->dropColumnTable($table, $list_field['Field']);
                }
            }
        }
    }

    public function checkFieldByTypeTable($type_table, $definition_field)
    {
        if ($type_table == 'default') {
            if (isset($definition_field['lang']) && $definition_field['lang']) {
                return false;
            }
        }
        if ($type_table == 'lang') {
            if (!isset($definition_field['lang']) || !$definition_field['lang']) {
                return false;
            }
        }

        if ($type_table == 'shop') {
            if (!isset($definition_field['shop']) || !$definition_field['shop']
                || (isset($definition_field['lang']) && $definition_field['lang'])) {
                return false;
            }
        }

        return true;
    }

    public function upgradeColumnsTable($table, $definition_fields, $list_fields, $type_table = null)
    {
        $database_fields = array();
        foreach ($list_fields as $field) {
            $database_fields[$field['Field']] = $field;
        }

        foreach ($definition_fields as $field_name => $definition) {
            if (!is_null($type_table)) {
                if (!$this->checkFieldByTypeTable($type_table, $definition)) {
                    continue;
                }
            }

            if (!array_key_exists($field_name, $database_fields)) {
                $this->createColumnTable($table, $field_name, $definition);
            } else {
                $database_field = $database_fields[$field_name];
                $type = $this->getSQLTypeByDefinition($definition);

                if ($type != $database_field['Type']) {
                    $this->changeColumnTable($table, $field_name, $definition);
                }
            }
        }
    }

    /**
     * @param string $table
     * @param string $field_name
     *
     * @return mixed
     */
    protected function dropColumnTable($table, $field_name)
    {
        return Db::getInstance()->execute('ALTER TABLE `'._DB_PREFIX_.bqSQL($table).'` DROP `'.bqSQL($field_name).'`;');
    }

    protected function createColumnTable($table, $field_name, $definition)
    {
        return Db::getInstance()->execute('ALTER TABLE  `'._DB_PREFIX_.bqSQL($table).'`
        ADD  '.$this->definitionFieldToSQL($field_name, $definition));
    }

    protected function changeColumnTable($table, $field_name, $definition)
    {
        return Db::getInstance()->execute('ALTER TABLE  `'._DB_PREFIX_.bqSQL($table).'`
        CHANGE `'.bqSQL($field_name).'` '.$this->definitionFieldToSQL($field_name, $definition));
    }

    public function checkExistsTable($table)
    {
        $result = Db::getInstance()->executeS('SELECT * 
            FROM information_schema.tables
            WHERE table_schema = \''._DB_NAME_.'\' 
                AND table_name = \''._DB_PREFIX_.bqSQL($table).'\'
            LIMIT 1;');

        return (is_array($result) && count($result) ? true : false);
    }

    /**
     * @return array
     */
    public function getFieldsFromDatabase($table)
    {
        if (!$this->checkExistsTable($table)) {
            return array();
        }

        $result = Db::getInstance()->executeS('SHOW FIELDS FROM `'._DB_PREFIX_.bqSQL($table).'`');
        return (is_array($result) ? $result : array());
    }

    /**
     * @return array
     */
    public function getLangFieldsFromDatabase($table)
    {
        if (!$this->checkExistsTable($table.'_lang')) {
            return array();
        }

        $result = Db::getInstance()->executeS('SHOW FIELDS FROM `'._DB_PREFIX_.bqSQL($table).'_lang`');
        return (is_array($result) ? $result : array());
    }

    /**
     * @return array
     */
    public function getShopFieldsFromDatabase($table)
    {
        if (!$this->checkExistsTable($table.'_shop')) {
            return array();
        }

        $result = Db::getInstance()->executeS('SHOW FIELDS FROM `'._DB_PREFIX_.bqSQL($table).'_shop`');
        return (is_array($result) ? $result : array());
    }

    /**
     * @param string $class_name
     * @param string $field
     * @param int $id
     * @param string $value
     *
     * @return $this
     */
    public static function updateObjectFieldByClass($class_name, $field, $id, $value)
    {
        return self::loadClass($class_name)->updateObjectField($field, $id, $value);
    }
}
