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

class EmailStatistic extends ObjectModel
{
    public $id;
    public $opened;
    public $buy_now;
    public $view;
    public $email;

    public static $definition = array(
        'table' => 'hioutofstockemailstatistic',
        'primary' => 'id',
        'fields' => array(
            'opened' => array(
                'type' => self::TYPE_INT, 'validate' => 'isInt'),
            'buy_now' => array(
                'type' => self::TYPE_INT, 'validate' => 'isInt'),
            'view' => array(
                'type' => self::TYPE_INT, 'validate' => 'isInt'),
            'email' => array(
                'type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 100
            ),
        ),
    );
    public function add($autodate = true, $null_values = false)
    {
        if (!parent::add($autodate, $null_values)) {
            return false;
        }
        return true;
    }

    public static function getStatisticSentEmailCount()
    {
        $query = new DbQuery();
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow(
            $query
                ->select('COUNT(*)')
                ->from('hioutofstockemailstatistic', 'hist')
                ->build()
        );
    }
    public static function getStatisticClickCount($type)
    {
        $query = new DbQuery();
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow(
            $query
                ->select('COUNT('.$type.')')
                ->from('hioutofstockemailstatistic', 'hist')
                ->where(''.$type.' = 1')
                ->build()
        );
    }
}
