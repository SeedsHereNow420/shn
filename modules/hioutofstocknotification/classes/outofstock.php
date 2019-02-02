<?php
/**
* 2013 - 2017 HiPresta
*
* MODULE Out Of Stock Notification
*
* @version   1.2.2
* @author    HiPresta <suren.mikaelyan@gmail.com>
* @link      http://www.hipresta.com
* @copyright HiPresta 2015
* @license   Addons PrestaShop license limitation
*
* NOTICE OF LICENSE
*
* Don't use this module on several shops. The license provided by PrestaShop Addons 
* for all its modules is valid only once for a single shop.
*/

class OutOfStock extends ObjectModel
{
    public $id;
    public $id_shop;
    public $id_product;
    public $id_customer;
    public $id_combination;
    public $email;
    public $status;
    public $date;

    public static $definition = array(
        'table' => 'hioutofstock',
        'primary' => 'id',
        'fields' => array(
            'id_shop' => array(
                'type' => self::TYPE_INT, 'validate' => 'isInt'),
            'id_product' => array(
                'type' => self::TYPE_INT, 'validate' => 'isInt'),
            'id_customer' => array(
                'type' => self::TYPE_INT, 'validate' => 'isInt'),
            'id_combination' => array(
                'type' => self::TYPE_INT, 'validate' => 'isInt'),
            'email' => array(
                'type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 100),
            'status' => array(
                'type' => self::TYPE_INT, 'validate' => 'isInt'),
            'date' => array(
                'type' => self::TYPE_DATE, 'validate' => 'isDate'),
        ),
    );

    public function add($autodate = true, $null_values = false)
    {
        if (!parent::add($autodate, $null_values)) {
            return false;
        }
        return true;
    }

    public static function getStockSubscribeProducts()
    {
        $query = new DbQuery();
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            $query
                ->select('sto.*')
                ->from('hioutofstock', 'sto')
                ->where('sto.`id_shop` = '.Context::getContext()->shop->id)
                ->build()
        );
    }

    public static function getStockSubscribeProductByStatus($ststus, $oder_by = '')
    {
        $query = new DbQuery();
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            $query
                ->select('sto.*')
                ->from('hioutofstock', 'sto')
                ->where('sto.`id_shop` = '.Context::getContext()->shop->id)
                ->where('sto.`status` = '.$ststus)
                ->orderBy($oder_by)
                ->build()
        );
    }

    public static function getStockByCombinationId($id_product, $id_combination)
    {
        $query = new DbQuery();
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            $query
                ->select('sto.*')
                ->from('hioutofstock', 'sto')
                ->where('sto.`id_shop` = '.Context::getContext()->shop->id)
                ->where('sto.`id_combination` = '.(int)$id_combination)
                ->where('sto.`id_product` = '.(int)$id_product)
                ->build()
        );
    }

    public static function getStockByProductId($id_product)
    {
        $query = new DbQuery();
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            $query
                ->select('sto.*')
                ->from('hioutofstock', 'sto')
                ->where('sto.`id_shop` = '.Context::getContext()->shop->id)
                ->where('sto.`id_product` = '.(int)$id_product)
                ->build()
        );
    }

    public static function getStockEmail($id_product, $id_combination, $ststus)
    {
        $query = new DbQuery();
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            $query
                ->select('sto.email')
                ->from('hioutofstock', 'sto')
                ->where('sto.`id_shop` = '.Context::getContext()->shop->id)
                ->where('sto.`status` = '.(int)$ststus)
                ->where('sto.`id_combination` = '.(int)$id_combination)
                ->where('sto.`id_product` = '.(int)$id_product)
                ->build()
        );
    }

    public static function getStockSubscribeProductByInterval($last_day_count, $ststus, $groupBy = '')
    {
        $query = new DbQuery();
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            $query
                ->select('id, count(id_product), id_shop, id_product, id_customer, id_combination, email, date, status')
                ->from('hioutofstock', 'sto')
                ->where('sto.`id_shop` = '.Context::getContext()->shop->id)
                ->where('sto.`status` = '.$ststus)
                ->where('date >= NOW() - INTERVAL '.(int)$last_day_count.' DAY')
                ->groupBy($groupBy)
                ->build()
        );
    }

    public static function getStockSubscribeProductByEmail($email, $id_product, $id_combination, $ststus, $groupBy = '')
    {
        $query = new DbQuery();
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            $query
                ->select('sto.*')
                ->from('hioutofstock', 'sto')
                ->where('sto.`id_shop` = '.Context::getContext()->shop->id)
                ->where('sto.`status` = '.$ststus)
                ->where('sto.`email` = \''.pSQL($email).'\'')
                ->where('sto.`id_product` = '.(int)$id_product)
                ->where('sto.`id_combination` = '.(int)$id_combination)
                ->groupBy($groupBy)
                ->build()
        );
    }
}
