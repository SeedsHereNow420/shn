<?php
/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_2_0_0($module)
{
    $return = (bool)$module;

    if (Shop::isFeatureActive()) {
        Shop::setContext(Shop::CONTEXT_ALL);
    }

    $return = $return && $module->uninstallOverrides();

    $override_path = dirname(__FILE__).'/../override/';
    $override_version_path = dirname(__FILE__).'/../override_versions/1.6.0.5/';
    $files_to_copy = Tools::scandir($override_version_path, 'php', '', true);
    if ($files_to_copy) {
        foreach ($files_to_copy as $file) {
            Tools::copy($override_version_path.$file, $override_path.$file);
        }
    }

    if (version_compare(_PS_VERSION_, '1.6.0.11', '>=')) {
        $override_version_path = dirname(__FILE__).'/../override_versions/1.6.0.11/';
        $files_to_copy = Tools::scandir($override_version_path, 'php', '', true);
        if ($files_to_copy) {
            foreach ($files_to_copy as $file) {
                Tools::copy($override_version_path.$file, $override_path.$file);
            }
        }
    }

    if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
        $override_version_path = dirname(__FILE__).'/../override_versions/1.7.0.0/';
        $files_to_copy = Tools::scandir($override_version_path, 'php', '', true);
        if ($files_to_copy) {
            foreach ($files_to_copy as $file) {
                Tools::copy($override_version_path.$file, $override_path.$file);
            }
        }
    }

    $return = $return && $module->installOverrides();
    $return = $return && Configuration::updateValue('FSAU_REMOVE_DEFAULT_LANG', 0);
    $return = $return && Configuration::updateValue('FSAU_ENABLE_cmsr_categories', 0);
    $return = $return && Configuration::updateValue('FSAU_ENABLE_cmscr_categories', 0);
    $return = $return && Configuration::updateValue('FSAU_cms_rule_RT', 'category');
    $return = $return && Configuration::updateValue('FSAU_cms_category_rule_RT', 'parent');
    $return = $return && Configuration::updateValue('FSAU_manufacturer_rule_RT', 'parent');
    $return = $return && Configuration::updateValue('FSAU_supplier_rule_RT', 'parent');
    $return = $return && Configuration::updateValue(
        'FSAU_ENABLE_cms_category_rule',
        Configuration::get('FSAU_ENABLE_cms_rule')
    );
    $return = $return && Configuration::updateValue('FSAU_ENABLE_MULTILANG_ROUTES', 0);

    return $return;
}
