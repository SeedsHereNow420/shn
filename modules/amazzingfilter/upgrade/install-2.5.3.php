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

function upgrade_module_2_5_3($module_obj)
{
    if (!defined('_PS_VERSION_')) {
        exit;
    }
    $index_files = glob($module_obj->csv_dir.'*.csv');
    foreach ($index_files as $file_path) {
        $lines = file($file_path);
        $updated_lines = array();
        foreach ($lines as $line) {
            $line = trim($line);
            if (!$line) {
                continue;
            }
            $line = explode('|', $line);
            array_splice($line, 3, 0, '');
            $updated_lines[] = implode('|', $line);
        }
        $updated_lines = implode("\n", $updated_lines);
        file_put_contents($file_path, $updated_lines);
    }
    return true;
}
