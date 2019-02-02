<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

function upgrade_module_1_7_1($module)
{
    (bool)$module; // Hide unused $module variable notice
    
    $result = true;

    $result &= Db::getInstance()->execute(
        "UPDATE `" . _DB_PREFIX_ . "configuration`
            SET name = REPLACE(name, 'PF_', 'MS_')
            WHERE `name` LIKE 'PF_CUSTOMNUMBER_%'"
    );
    
    Configuration::updateValue('MS_CUSTOMNUMBER_SHARE_COUNTER', 0);
    
    return $result;
}
