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

function upgrade_module_2_6_0($module_obj)
{
    if (!defined('_PS_VERSION_')) {
        exit;
    }

    // update hooks
    $module_obj->registerHook('actionProductAdd');
    $module_obj->registerHook('actionProductUpdate');
    $module_obj->unregisterHook('actionProductSave');

    // add condition to index
    $sorted = array();
    $rows = $module_obj->db->executeS('
        SELECT id_product, id_shop, `condition`
        FROM '._DB_PREFIX_.'product_shop
    ');
    foreach ($rows as $row) {
        $sorted[$row['id_shop']][$row['id_product']] = $row['condition'];
    }
    $index_files = glob($module_obj->csv_dir.'*.csv');
    foreach ($index_files as $file_path) {
        $name = basename($file_path);
        $name = explode('_', $name);
        $id_shop = $name[1];
        $lines = file($file_path);
        $updated_lines = array();
        foreach ($lines as $line) {
            $line = trim($line);
            if (!$line) {
                continue;
            }
            $id_product = current(explode('|', $line));
            $line .= '|'.(isset($sorted[$id_shop][$id_product]) ? $sorted[$id_shop][$id_product] : 'new');
            $updated_lines[] = $line;
        }
        $updated_lines = implode("\n", $updated_lines);
        file_put_contents($file_path, $updated_lines);
    }

    // remove unrequired override files
    $override_dir = _PS_MODULE_DIR_.$module_obj->name.'/override/';
    $subdirs = array('classes/', 'controllers/admin/', 'constollers/front/');
    foreach ($subdirs as $subdir) {
        $files = glob($override_dir.$subdir.'*.php');
        foreach ($files as $file) {
            if (basename($file) != 'index.php') {
                unlink($file);
            }
        }
    }

    if (!$module_obj->is_17) {
        $module_obj->processOverride('removeOverride', 'controllers/front/ProductController.php', false);
        $module_obj->processOverride('addOverride', 'controllers/front/ProductController.php', false);
    }

    return true;
}
