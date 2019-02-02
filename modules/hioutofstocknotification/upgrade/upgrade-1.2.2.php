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

function upgrade_module_1_2_2($module)
{
    Configuration::updateValue('HI_MU_CR_GEN_PASS', Tools::passwdGen());
    Configuration::updateValue('HI_OOSN_MULTI_EMAIL', '');
    Configuration::updateValue('HI_OOSN_LAST_DAY_COUNT', 7);
    Configuration::updateValue('HI_OOSN_SUBSCRIBE_EMAIL_SENT', false);
    $module->removeDirAndFile(_PS_MODULE_DIR_.$module->name.'/views/css/front1.6.css');
    $module->removeDirAndFile(_PS_MODULE_DIR_.$module->name.'/views/css/front1.5.css');
    return true;
}
