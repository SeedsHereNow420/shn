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

function upgrade_module_1_0_3($object)
{
    // start get exact
    $psElasticsearchExact = 0;
    if (Configuration::get('PS_ELASTICSEARCH_END') == 1 && Configuration::get('PS_ELASTICSEARCH_START') == 0) {
        $psElasticsearchExact = 1;
    }
    // end get exact

    // start get blacklist
    $blacklistArr = array();
    $languages = Language::getLanguages();
    foreach ($languages as $language) {
        $blacklistArr[$language['id_lang']] = Configuration::get('PS_SEARCH_BLACKLIST', $language['id_lang']);
    }
    // end get blacklist

    // start get advanced index
    $advancedIndex = array();
    $languages = Language::getLanguages();
    foreach ($languages as $language) {
        $advancedIndex[$language['id_lang']] = Configuration::get('PS_ELASTICSEARCH_ADVANCED', $language['id_lang']);
    }
    // end get advanced index

    if (!Configuration::updateValue('PS_ELASTICSEARCH_EXACT', (int)$psElasticsearchExact)
        || !Configuration::updateValue('PS_ELASTICSEARCH_BLACKLIST', $blacklistArr)
        || !Configuration::updateValue(
            'PS_ELASTICSEARCH_MINWORDLEN',
            (int)Configuration::get('PS_SEARCH_MINWORDLEN')
        )
        || !Configuration::updateValue('PS_ELASTICSEARCH_MAXWORDLEN', 255)
        || !Configuration::deleteByName('PS_ELASTICSEARCH_END')
        || !Configuration::deleteByName('PS_ELASTICSEARCH_START')
        || !Configuration::deleteByName('PS_ELASTICSEARCH_ADVANCED')
        || !Configuration::updateValue('PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG', 0)
        || !Configuration::updateValue('PS_ELASTICSEARCH_ADVANCED_INDEX', $advancedIndex)
        || !Configuration::updateValue('PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG', 0)
        || !Configuration::updateValue('PS_ELASTICSEARCH_INTELIGENT_SEARCH', 1)
    ) {
        return false;
    }

    // start set advanced search
    $advancedSearch = $object->buildSearchConfiguration();

    if (!Configuration::updateValue('PS_ELASTICSEARCH_ADVANCED_SEARCH', $advancedSearch)) {
        return false;
    }
    // end set advanced search

    return true;
}
