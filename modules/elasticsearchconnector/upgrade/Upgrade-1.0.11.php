<?php
/**
* 2017 PrestaWach
*
* @author    PrestaWach <info@prestawach.info>
* @copyright 2017 PrestaWach
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_1_0_11($object)
{
    unset($object);

    if (!Configuration::updateValue('PS_ELASTICSEARCH_WEIGHT_SNAME', 1)) {
        return false;
    }

    return true;
}
