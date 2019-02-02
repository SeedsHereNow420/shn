<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 *  @version   1.0.3
 */

function upgrade_module_0_8($module)
{
    $result = true;

    // Replace Order.php override
    $result &= $module->upgradeOverride('OrderPayment', '0.8');

    return $result;
}
