<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 *  @version   1.0.3
 */

function upgrade_module_1_0_3($module)
{
    $result = true;

    // Replace PDF.php override
    $result &= $module->upgradeOverride('PDF', '1.0.3');

    return $result;
}
