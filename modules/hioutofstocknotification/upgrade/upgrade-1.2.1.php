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

function upgrade_module_1_2_1($module)
{
    $module->createTabs('AdminOosn', 'AdminOosn', 'CONTROLLER_TABS_OOSN', 0);
    $module->removeDirAndFile(_PS_MODULE_DIR_.$module->name.'/ajax');
    return true;
}
