<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 *  @version   1.1.9
 */

function upgrade_module_1_1_9($module)
{
    (bool)$module; // Hide unused $module variable notice
    
    $result = true;

    // Replace Order.php override
    Configuration::updateValue('PF_CUSTOMNUMBER_INIT_NR_TS', 1);

    return $result;
}
