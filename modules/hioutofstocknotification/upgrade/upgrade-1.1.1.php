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

function upgrade_module_1_1_1($object)
{
    Configuration::updateValue('HI_OOSN_ORDER_TYPE', false);
    Configuration::updateValue('HI_OOSN_EMAIL_SENT', false);
    Configuration::updateValue('HI_OOSN_HOOKS', 'none');

    return true;
}
