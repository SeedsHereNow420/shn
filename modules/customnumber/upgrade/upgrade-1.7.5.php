<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

function upgrade_module_1_7_5($module)
{
    $module->upgradeVersion('1.7.5');
    
    $result = true;
    
    // Upgrade database
    $result &= $module->upgradeDB();

    return $result;
}
