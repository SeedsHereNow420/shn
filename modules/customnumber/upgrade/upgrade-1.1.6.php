<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 *  @version   1.1.6
 */

function upgrade_module_1_1_6($module)
{
    $result = true;

    // Replace Order.php override
    $result &= $module->upgradeOverride('Order', '1.1.6');

    return $result;
}
