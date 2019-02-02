<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 *  @version   1.1.2
 */

function upgrade_module_1_1_2($module)
{
    (bool)$module;
    
    $result = true;
    
    // Update order_invoice columns
    $result &= Db::getInstance()->execute(
        'ALTER TABLE `' . _DB_PREFIX_ . 'order_invoice` 
            MODIFY `number` VARCHAR(32),
            MODIFY `delivery_number` VARCHAR(32);'
    );
    
    // Update order_slip columns
    $result &= Db::getInstance()->execute(
        'ALTER TABLE `' . _DB_PREFIX_ . 'order_slip` 
            MODIFY `number` VARCHAR(32);'
    );

    return $result;
}
