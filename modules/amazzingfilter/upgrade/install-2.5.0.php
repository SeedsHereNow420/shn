<?php
/**
* 2007-2017 Amazzing
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
*
*  @author    Amazzing <mail@amazzing.ru>
*  @copyright 2007-2017 Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

function upgrade_module_2_5_0($module_obj)
{
    if (!defined('_PS_VERSION_')) {
        exit;
    }
    $module_obj->registerHook('productSearchProvider');
    $active_templates = $module_obj->db->executeS('
        SELECT * FROM '._DB_PREFIX_.'af_templates WHERE active = 1
    ');
    $current_hook = $module_obj->getAvailableHooks(true);
    $rows = array();
    foreach ($active_templates as $t) {
        if (!$module_obj->isHookAvailableOnControllerPage($current_hook, $t['template_controller'])) {
            $rows[] = '('.(int)$t['id_template'].', '.(int)$t['id_shop'].', 0)';
        }
    }
    if ($rows) {
        $module_obj->db->execute('
            INSERT INTO '._DB_PREFIX_.'af_templates (id_template, id_shop, active)
            VALUES '.implode(', ', $rows).'
            ON DUPLICATE KEY UPDATE active = VALUES(active)
        ');
    }
    return true;
}
