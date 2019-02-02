<?php
/**
* NOTICE OF LICENSE
*
* This source file is subject to a commercial license from BSofts.
* Use, copy, modification or distribution of this source file without written
* license agreement from the BSofts is strictly forbidden.
*
* @author    BSofts Inc.
* @copyright Copyright 2017 © BSofts Inc.
* @license   Single domain commerical license
* @package   quantitylimit
*/

class Limit extends ObjectModel
{
    public static $definition = array(
        'table' => 'quantitylimit',
        'primary' => 'id_quantitylimit',
        'multilang' => false,
        'multilang_shop' => false,
        'fields' => array(
            /* Classic fields */
            'id_product'            => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_attribute_product'  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'status'                => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'min_qty'               => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'max_qty'               => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'date_to'               => array('type' => self::TYPE_STRING, 'validate' => 'isDate'),
            'id_group'              => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_shop'               => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            )
        );

    public static function addLimit($data)
    {
        if (!$data) {
            return false;
        } else {
            return (bool)Db::getInstance()->insert(self::$definition['table'], $data);
        }
    }

    public static function updateLimit($data)
    {
        if (!$data) {
            return false;
        } else {
            $where = 'id_product = '.(int)$data['id_product'];
            if ($data['id_attribute_product']) {
                $where .= ' AND id_attribute_product = '.(int)$data['id_attribute_product'];
            }
            return (bool)Db::getInstance()->update(self::$definition['table'], $data, $where);
        }
    }

    public static function updateStatus($data)
    {
        if (!$data) {
            return false;
        } else {
            $where = 'id_product = '.(int)$data['id_product'];
            if ($data['id_attribute_product']) {
                $where .= ' AND id_attribute_product = '.(int)$data['id_attribute_product'];
            }
            return (bool)Db::getInstance()->Execute('UPDATE `'._DB_PREFIX_.self::$definition['table'].'`
                SET status = !status WHERE 1 AND '.pSQL($where));
        }
    }

    public static function isExist($id_product, $id_attribute_product = 0, $active = false, $check_date = false, $id_group = 0, $id_shop = 0)
    {
        if (!$id_product) {
            return false;
        } else {
            $query = 'SELECT * FROM `'._DB_PREFIX_.'quantitylimit` WHERE `id_product` = '.(int)$id_product;
            if ($id_attribute_product) {
                $query .= ' AND `id_attribute_product` = '.(int)$id_attribute_product;
            }
            if ($active) {
                $query .= ' AND `status` = 1';
            }
            if ($check_date) {
                $now = date('Y-m-d');
                $query .= ' AND (`date_to` = \'\' OR `date_to` = \'0000-00-00\' OR \''.pSQL($now).'\' <= `date_to`)';
            }
            if ($id_group) {
                $query .= ' AND `id_group` '.self::formatIntInQuery(0, $id_group);
            }
            if ($id_shop) {
                $query .= ' AND `id_shop` '.self::formatIntInQuery(0, $id_shop);
            }
            if (Db::getInstance()->ExecuteS($query)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function getProductLimit($id_product, $id_attribute_product = 0, $active = false, $check_date = false, $id_group = 0, $id_shop = 0)
    {
        if (!$id_product) {
            return false;
        } else {
            $query = 'SELECT * FROM `'._DB_PREFIX_.'quantitylimit` WHERE `id_product` = '.(int)$id_product;
            if ($id_attribute_product) {
                $query .= ' AND `id_attribute_product` = '.(int)$id_attribute_product;
            }
            if ($active) {
                $query .= ' AND `status` = 1';
            }
            if ($check_date) {
                $now = date('Y-m-d');
                $query .= ' AND (`date_to` = \'\' OR `date_to` = \'0000-00-00\' OR \''.pSQL($now).'\' <= `date_to`)';
            }
            if ($id_group) {
                $query .= ' AND `id_group` '.self::formatIntInQuery(0, $id_group);
            }
            if ($id_shop) {
                $query .= ' AND `id_shop` '.self::formatIntInQuery(0, $id_shop);
            }

            return Db::getInstance()->getRow($query);
        }
    }

    private static function formatIntInQuery($first_value, $second_value)
    {
        $first_value = (int)$first_value;
        $second_value = (int)$second_value;
        if ($first_value != $second_value) {
            return 'IN ('.pSQL($first_value).', '.pSQL($second_value).')';
        } else {
            return ' = '.pSQL($first_value);
        }
    }

    public static function deleteLimitByProduct($id_product, $id_attribute_product = 0)
    {
        if (!$id_product) {
            return false;
        }

        $sql = 'DELETE FROM `'._DB_PREFIX_.self::$definition['table'].'` WHERE id_product = '.(int)$id_product;
        if ($id_attribute_product) {
            $sql .= ' AND `id_attribute_product` = '.(int)$id_attribute_product;
        }
        return (bool)Db::getInstance()->Execute($sql);
    }

    public static function getIdProductAttributesByIdAttributes($id_product, $id_attributes)
    {
        if (!is_array($id_attributes)) {
            return 0;
        }

        return Db::getInstance()->getValue('SELECT pac.`id_product_attribute`
            FROM `'._DB_PREFIX_.'product_attribute_combination` pac
            INNER JOIN `'._DB_PREFIX_.'product_attribute` pa ON pa.id_product_attribute = pac.id_product_attribute
            WHERE id_product = '.(int)$id_product.' AND id_attribute IN ('.implode(',', $id_attributes).')
            GROUP BY id_product_attribute HAVING COUNT(id_product) = '.count($id_attributes));
    }
}
