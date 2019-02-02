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

function upgrade_module_2_1_0($module_obj)
{
    if (!defined('_PS_VERSION_')) {
        exit;
    }
    $all_settings = $module_obj->db->executeS('SELECT * FROM '._DB_PREFIX_.'af_general_settings');
    $updated_rows = array();
    foreach ($all_settings as $settings_row) {
        $new_row = array();
        foreach ($settings_row as $name => $value) {
            if ($name == 'settings') {
                $settings = Tools::jsonDecode($settings_row['settings'], true);
                if (!isset($settings['oos_behaviour']) && !empty($settings['combinations_stock'])) {
                    $settings['oos_behaviour'] = 2;
                }
                $value = Tools::jsonEncode($settings);
            }
            $new_row[$name] = '\''.pSQL($value).'\'';
        }
        $updated_rows[] = '('.implode(', ', $new_row).')';
    }
    if ($updated_rows) {
        $module_obj->db->execute('
            REPLACE INTO '._DB_PREFIX_.'af_general_settings VALUES '.implode(', ', $updated_rows).'
        ');
    }
    return true;
}
