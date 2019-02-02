<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2017 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

function upgrade_module_1_8_1($module)
{
    $module->upgradeVersion('1.8.1');
    
    $result = true;
    
    // Upgrade database
    $result &= $module->upgradeDB();
    
    // Register hook : actionAdminOrdersControllerBefore
    $result &= $module->registerHook('actionAdminOrdersControllerBefore');
    
    // Register hook : displayAdminOrder
    $result &= $module->registerHook('displayAdminOrder');
    
    Configuration::updateValue('MS_CUSTOMNUMBER_EDIT_NUMBER', 0);

    return $result;
}
