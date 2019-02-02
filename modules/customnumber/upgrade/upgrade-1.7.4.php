<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

function upgrade_module_1_7_4($module)
{
    (bool)$module; // Hide unused $module variable notice
    
    $tpl_path = _PS_THEME_DIR_ . 'order-confirmation.tpl';
    
    if (Tools::file_exists_cache($tpl_path)) {
        $content = $module->templateReplace(
            '{$id_order_formatted}',
            '{$reference_order}',
            Tools::file_get_contents($tpl_path)
        );
        
        file_put_contents($tpl_path, $content);
    }
    
    return true;
}
