<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2017 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

function upgrade_module_1_7_10($module)
{
    $result = true;
    
    $result &= $module->registerHook('actionObjectAmazonOrderAddAfter');
    $result &= $module->registerHook('actionObjectCDiscountOrderAddAfter');

    return $result;
}
