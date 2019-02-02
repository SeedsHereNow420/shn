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

function upgrade_module_1_1_0($module)
{
    $has_index = $module->hasDbTableIndex('product_lang', 'link_rewrite');
    if (!$has_index) {
        $module->addDbTableIndex('product_lang', 'link_rewrite');
    }

    $has_index = $module->hasDbTableIndex('category_lang', 'link_rewrite');
    if (!$has_index) {
        $module->addDbTableIndex('category_lang', 'link_rewrite');
    }

    $tab = Tab::getInstanceFromClassName('AdminFsadvancedurl', Configuration::get('PS_LANG_DEFAULT'));
    if (!$tab->module) {
        $tab = new Tab();
        $tab->id_parent = -1;
        $tab->position = 0;
        $tab->module = $module->name;
        $tab->class_name = 'AdminFsadvancedurl';
        $tab->active = 1;
        $tab->name = $module->generateMultilangualFields($module->displayName);
        $tab->save();
    }

    return (bool)$module;
}
