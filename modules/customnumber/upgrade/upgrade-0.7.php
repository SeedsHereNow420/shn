<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 *  @version   1.0.3
 */

function upgrade_module_0_7($module)
{
    $result = true;

    // Register PF_CUSTOMNUMBER_INIT_TS Configuration
    if (!Configuration::get('PF_CUSTOMNUMBER_INIT_TS')) {
        Configuration::updateValue('PF_CUSTOMNUMBER_INIT_TS', 0);
    }

    // Register Compatibility mode
    Configuration::updateValue('PF_CUSTOMNUMBER_COMPATIBILITY', true);

    // Replace CustomNumberHelper for Compatibility
    if (file_exists($module->getLocalPath() . 'helpers/CustomNumberHelperCompatibility.php')) {
        rename(
            $module->getLocalPath() . 'helpers/CustomNumberHelper.php',
            $module->getLocalPath() . 'helpers/CustomNumberHelper.backup.php'
        );
        
        rename(
            $module->getLocalPath() . 'helpers/CustomNumberHelperCompatibility.php',
            $module->getLocalPath() . 'helpers/CustomNumberHelper.php'
        );
    }

    // Replace Order.php override
    $result &= $module->upgradeOverride('Order', '0.7');

    return $result;
}
