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

class SentEmail extends ObjectModel
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
        'table' => 'hioutofstocksentemail',
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

    public static function getStockSendEmail()
    {
        $query = new DbQuery();
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            $query
                ->select('stoe.*')
                ->from('hioutofstocksentemail', 'stoe')
                ->where('stoe.`id_shop` = '.Context::getContext()->shop->id)
                ->build()
        );
    }

    public static function getStockSendEmailByStatus($ststus, $oder_by)
    {
        $query = new DbQuery();
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS(
            $query
                ->select('stoe.*')
                ->from('hioutofstocksentemail', 'stoe')
                ->where('stoe.`id_shop` = '.Context::getContext()->shop->id)
                ->where('stoe.`status` = '.$ststus)
                ->orderBy($oder_by)
                ->build()
        );
    }
}
