<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 *  @version   1.1.5
 */

function upgrade_module_1_1_5($module)
{
    $result = true;

    // Replace Mail.php override for PS >= 1.6.1.0
    if (Tools::version_compare(_PS_VERSION_, '1.6.1.0', '>=') == true) {
        $result &= $module->upgradeOverride('Mail', '1.1.5');
    }

    return $result;
}
