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

include(dirname(__FILE__).'/../../../config/config.inc.php');
include(dirname(__FILE__).'/../../../init.php');
include(dirname(__FILE__).'/../hioutofstocknotification.php');

$stock_notification  = new HIOutOfstockNotification();
if (Tools::getValue('cron_secret_key') == ''
    || Tools::getValue('cron_secret_key') != $stock_notification->cron_pass) {
    echo $stock_notification->l('Hack attempt!');
} else {
    $result = Db::getInstance()->ExecuteS('SELECT * FROM '._DB_PREFIX_.'hioutofstock');
    if (!empty($result)) {
        foreach ($result as $res) {
            if (StockAvailable::outOfStock($res['id_product']) == 1) {
                $outofstock = Db::getInstance()->ExecuteS('
                    SELECT * FROM '._DB_PREFIX_.'hioutofstock
                    WHERE id_product='.(int)$res['id_product']);
                $stock_notification->getStockMailContent($outofstock);
            }
            $pr_quantity = StockAvailable::getQuantityAvailableByProduct($res['id_product'], $res['id_combination']);
            if ($pr_quantity > 0 && $pr_quantity >= $stock_notification->oosn_product_quantity) {
                $arrt_quantity = Db::getInstance()->ExecuteS('
                    SELECT * FROM '._DB_PREFIX_.'hioutofstock
                    WHERE id_combination='.(int)$res['id_combination'].'
                    AND id_product='.(int)$res['id_product']);
                $stock_notification->getStockMailContent($arrt_quantity);
            }
        }
    }
}
