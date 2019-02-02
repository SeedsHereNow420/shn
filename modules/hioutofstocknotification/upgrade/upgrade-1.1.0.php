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

function upgrade_module_1_1_0($object)
{
    Configuration::updateValue('HI_OOSN_STATISTIC_ON', true);

    $sql_sent_email = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'hioutofstocksentemail` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `id_shop` INT (100) NOT NULL,
        `id_product` INT (100) NOT NULL,
        `id_customer` INT (100) NOT NULL,
        `id_combination` INT (100) NOT NULL,
        `email` VARCHAR( 100 ) NOT NULL,
        `date` DATE NOT NULL,
        `status` VARCHAR( 100 ) NOT NULL,
            PRIMARY KEY ( `id` )
        ) ENGINE = MYISAM DEFAULT CHARSET=utf8;';
    Db::getInstance()->Execute(trim($sql_sent_email));

    $sql_statistic = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'hioutofstockemailstatistic` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `opened` INT (100) NOT NULL,
        `buy_now` INT (100) NOT NULL,
        `view` INT (100) NOT NULL,
        `email` VARCHAR( 100 ) NOT NULL,
            PRIMARY KEY ( `id` )
        ) ENGINE = MYISAM DEFAULT CHARSET=utf8;';
    Db::getInstance()->Execute(trim($sql_statistic));
    return true;
}
