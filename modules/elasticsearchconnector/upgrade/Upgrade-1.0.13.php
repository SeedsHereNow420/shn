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

function upgrade_module_1_0_13($object)
{
    unset($object);

    if (!Configuration::updateValue('PS_ELASTICSEARCH_EAN13', 0)) {
        return false;
    }
    if (!Configuration::updateValue('PS_ELASTICSEARCH_WEIGHT_EAN13', 1)) {
        return false;
    }

    return true;
}
