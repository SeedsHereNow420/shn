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

function upgrade_module_1_0_2($object)
{
    unset($object);

    if (!Configuration::updateValue(
            'PS_ELASTICSEARCH_WEIGHT_PNAME',
            (int)Configuration::get('PS_SEARCH_WEIGHT_PNAME')
        )
        || !Configuration::updateValue(
            'PS_ELASTICSEARCH_WEIGHT_REF',
            (int)Configuration::get('PS_SEARCH_WEIGHT_REF')
        )
        || !Configuration::updateValue(
            'PS_ELASTICSEARCH_WEIGHT_SHORTDESC',
            (int)Configuration::get('PS_SEARCH_WEIGHT_SHORTDESC')
        )
        || !Configuration::updateValue(
            'PS_ELASTICSEARCH_WEIGHT_DESC',
            (int)Configuration::get('PS_SEARCH_WEIGHT_DESC')
        )
        || !Configuration::updateValue(
            'PS_ELASTICSEARCH_WEIGHT_CNAME',
            (int)Configuration::get('PS_SEARCH_WEIGHT_CNAME')
        )
        || !Configuration::updateValue(
            'PS_ELASTICSEARCH_WEIGHT_MNAME',
            (int)Configuration::get('PS_SEARCH_WEIGHT_MNAME')
        )
        || !Configuration::updateValue(
            'PS_ELASTICSEARCH_WEIGHT_TAG',
            (int)Configuration::get('PS_SEARCH_WEIGHT_TAG')
        )
        || !Configuration::updateValue(
            'PS_ELASTICSEARCH_WEIGHT_ATTRIBUTE',
            (int)Configuration::get('PS_SEARCH_WEIGHT_ATTRIBUTE')
        )
        || !Configuration::updateValue(
            'PS_ELASTICSEARCH_WEIGHT_FEATURE',
            (int)Configuration::get('PS_SEARCH_WEIGHT_FEATURE')
        )
    ) {
        return false;
    }

    return true;
}
