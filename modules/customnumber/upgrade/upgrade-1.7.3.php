<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

function upgrade_module_1_7_3($module)
{
    (bool)$module; // Hide unused $module variable notice
    
    Configuration::updateValue('MS_CUSTOMNUMBER_NEW_NUMBER_SHIFT', true);
    
    return true;
}
