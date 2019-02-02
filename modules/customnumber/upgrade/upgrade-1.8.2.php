<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2017 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

function upgrade_module_1_8_2($module)
{    
    Configuration::updateValue('MS_CUSTOMNUMBER_SHIFT_NR_TS', 1);

    return true;
}
