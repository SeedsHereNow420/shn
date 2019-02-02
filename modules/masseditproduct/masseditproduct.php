<?php
/**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    SeoSA    <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

require_once(dirname(__FILE__).'/classes/tools/config.php');

class MassEditProduct extends Module
{
    public function __construct()
    {
        $this->name = 'masseditproduct';
        $this->tab = 'front_office_features';
        $this->version = '1.9.16';
        $this->author = 'SeoSa';
        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->registerSmartyFunctions();

        $this->tabs = array(
            array(
                'tab' => 'AdminMassEditProduct',
                'parent' => 'AdminCatalog',
                'name' => array(
                    'en' => 'Mass edit product',
                    'ru' => 'Массовое редактирование товаров',
                    'es' => 'Producto de edición de masas',
                    'fr' => 'En masse produits d édition de',
                ),
            ),
            array(
                'tab' => 'AdminSeoSaExtendedFeatures',
                'parent' => 'AdminCatalog',
                'name' => array(
                    'en' => 'Extended features',
                ),
                'visible' => false,
            ),
        );
        $this->tabs = $this->formatTabs($this->tabs);

        parent::__construct();
        $this->displayName = $this->l('Mass edit product');
        $this->description = $this->l('Mass edit product');
        $this->module_key = '6f052f2d8d49a03ec1d864d012e19ad7';
    }

    /**
     * @param array $tabs
     * @return array
     */
    public function formatTabs($tabs)
    {
        if (version_compare(_PS_VERSION_, '1.7.1.0', '>=')) {
            foreach ($tabs as &$tab) {
                if (!is_array($tab['name'])) {
                    $tab['name'] = array('en' => $tab['name']);
                }

                $languages = ToolsModuleCPM::getLanguages(false);
                $name = array();
                foreach ($languages as $language) {
                    $name[$language['locale']] = (isset($tab['name'][$language['iso_code']])
                        ? $tab['name'][$language['iso_code']] :
                        $tab['name']['en']);
                }

                $tab = array(
                    'class_name' => $tab['tab'],
                    'ParentClassName' => $tab['parent'],
                    'name' => $name,
                    'visible' => (!isset($tab['visible']) ? true : $tab['visible']),
                    'icon' => (!isset($tab['icon']) ? '' : $tab['icon']),
                );
            }
        }

        return $tabs;
    }

    public function install()
    {
        if (version_compare(_PS_VERSION_, '1.7.1.0', '<')) {
            $this->createTab(
                'AdminMassEditProduct',
                'AdminCatalog',
                array(
                    'en' => 'Mass edit product',
                    'ru' => 'Массовое редактирование товаров',
                    'es' => 'Producto de edición de masas',
                    'fr' => 'En masse produits d édition de',
                )
            );

            $tab_features = new Tab();
            $name = array();
            foreach (Language::getLanguages(false) as $lang) {
                $name[$lang['id_lang']] = 'Extended features';
            }
            $tab_features->name = $name;
            $tab_features->module = $this->name;
            $tab_features->id_parent = Tab::getIdFromClassName('AdminCatalog');
            $tab_features->class_name = 'AdminSeoSaExtendedFeatures';
            $tab_features->hide_host_mode = true;
            $tab_features->active = false;
            $tab_features->save();
        }
        HelperDbCPM::loadClass('TemplateProductsMEP')->installDb();
        HelperDbCPM::loadClass('TemplateProductsProductMEP')->installDb();

        if (!parent::install()) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        $this->deleteTab('AdminMassEditProduct');
        $this->deleteTab('AdminSeoSaExtendedFeatures');
        HelperDbCPM::loadClass('TemplateProductsMEP')->uninstallDb();
        HelperDbCPM::loadClass('TemplateProductsProductMEP')->uninstallDb();
        if (!parent::uninstall()) {
            return false;
        }

        return true;
    }

    public function createTab($class_name, $parent, $name, $visible = true, $icon = false)
    {
        if (!is_array($name)) {
            $name = array('en' => $name);
        } elseif (is_array($name) && !count($name)) {
            $name = array('en' => $class_name);
        } elseif (is_array($name) && count($name) && !isset($name['en'])) {
            $name['en'] = current($name);
        }

        if (version_compare(_PS_VERSION_, '1.7.1.0', '<')) {
            $tab = new Tab();
            $tab->class_name = $class_name;
            $tab->module = $this->name;
            $tab->id_parent = Tab::getIdFromClassName($parent);
            $tab->active = true;
            foreach ($this->getLanguages() as $l) {
                $tab->name[$l['id_lang']] = (isset($name[$l['iso_code']]) ? $name[$l['iso_code']] : $name['en']);
            }
            $tab->save();
        } else {
            $tab = array(
                'class_name' => $class_name,
                'ParentClassName' => $parent,
                'name' => array(),
                'visible' => $visible,
                'icon' => $icon,
            );

            foreach ($this->getLanguages() as $l) {
                $tab['name'][$l['language_code']] = (
                isset($name[$l['iso_code']]) ? $name[$l['iso_code']] : $name['en']
                );
            }

            if (!is_array($this->tabs)) {
                $this->tabs = array();
            }
            $this->tabs[] = $tab;
        }
    }

    public function deleteTab($class_name)
    {
        $tab = Tab::getInstanceFromClassName($class_name);
        $tab->delete();
    }

    public $languages;

    public function getLanguages()
    {
        if (!is_null($this->languages)) {
            return $this->languages;
        }
        $languages = Language::getLanguages(false);
        foreach ($languages as &$l) {
            $l['is_default'] = (Configuration::get('PS_DEFAULT_LANG') == $l['id_lang']);
        }
        $this->languages = $languages;

        return $languages;
    }

    public function getImageLang($smarty)
    {
        $path = $smarty['path'];
        $module_path = 'masseditproduct/views/img/';
        $module_lang_path = $module_path.Context::getContext()->language->iso_code.'/';
        $module_lang_default_path = $module_path.'en/';
        $path_image = false;
        if (file_exists(_PS_MODULE_DIR_.$module_lang_path.$path)) {
            $path_image = _MODULE_DIR_.$module_lang_path.$path;
        } elseif (file_exists(_PS_MODULE_DIR_.$module_lang_default_path.$path)) {
            $path_image = _MODULE_DIR_.$module_lang_default_path.$path;
        }

        if ($path_image) {
            return '<img class="thumbnail" src="'.$path_image.'">';
        } else {
            return '[can not load image "'.$path.'"]';
        }
    }

    public function registerSmartyFunctions()
    {
        $smarty = Context::getContext()->smarty;

        if (!array_key_exists('get_image_lang', $smarty->registered_plugins['function'])) {
            smartyRegisterFunction($smarty, 'function', 'get_image_lang', array($this, 'getImageLang'));
        }

        if (!array_key_exists('not_filtered', $smarty->registered_plugins['modifier'])) {
            smartyRegisterFunction($smarty,'modifier', 'not_filtered', array($this, 'notFiltered'));
        }
    }

    public function notFiltered($var)
    {
        return $var;
    }

    public function getContent()
    {
        $this->registerSmartyFunctions();

        return $this->getDocumentation();
    }

    public function assignDocumentation()
    {
        $smarty = Context::getContext()->smarty;
        if (!array_key_exists('no_escape', $smarty->registered_plugins['modifier'])) {
            smartyRegisterFunction($smarty, 'modifier', 'no_escape', array(__CLASS__, 'noEscape'));
        }
        if (class_exists('TransModME')) {
            if (!array_key_exists('ld', $smarty->registered_plugins['modifier'])) {
                smartyRegisterFunction($smarty, 'modifier', 'ld', array(TransModME::getInstance(), 'ld'));
            }
        }

        $this->context->controller->addCSS($this->getLocalPath().'views/css/documentation.css');

        if (version_compare(_PS_VERSION_, '1.6.0', '<')) {
            $this->context->controller->addCSS(($this->_path).'views/css/documentation.css', 'all');
            $this->context->controller->addCSS(($this->_path).'views/css/admin-theme.css', 'all');
        }

        $documentation_folder = $this->getLocalPath().'views/templates/admin/documentation';
        $documentation_pages = self::globRecursive($documentation_folder.'/**.tpl');
        natsort($documentation_pages);

        $tree = array();
        if (is_array($documentation_pages) && count($documentation_pages)) {
            foreach ($documentation_pages as &$documentation_page) {
                $name = str_replace(array($documentation_folder.'/', '.tpl'), '', $documentation_page);
                $path = explode('/', $name);

                $tmp_tree = &$tree;
                foreach ($path as $key => $item) {
                    $part = $item;
                    if ($key == (count($path) - 1)) {
                        $tmp_tree[$part] = $name;
                    } else {
                        if (!isset($tmp_tree[$part])) {
                            $tmp_tree[$part] = array();
                        }
                    }
                    $tmp_tree = &$tmp_tree[$part];
                }
            }
        }

        $this->context->smarty->assign('tree', $this->buildTree($tree));
        $this->context->smarty->assign('documentation_pages', $documentation_pages);
        $this->context->smarty->assign('documentation_folder', $documentation_folder);
    }

    public function getDocumentation()
    {
        $this->assignDocumentation();

        return $this->context->smarty->fetch(_PS_MODULE_DIR_.$this->name.'/views/templates/admin/documentation.tpl');
    }

    public function buildTree($tree)
    {
        $tree_html = '';
        if (is_array($tree) && count($tree)) {
            foreach ($tree as $name => $tree_item) {
                preg_match('/^(\d+)\._(.*)$/', $name, $matches);
                $format_name = $matches[1].'. '.TransModME::getInstance()->ld($matches[2]);

                $tree_html .= '<li>';
                $tree_html .= '<a '.(!is_array(
                    $tree_item
                ) ? 'data-tab="'.$tree_item.'" href="#"' : '').'>'.$format_name.'</a>';
                if (is_array($tree_item) && count($tree_item)) {
                    $tree_html .= '<ul>';
                    $tree_html .= $this->buildTree($tree_item);
                    $tree_html .= '</ul>';
                }
                $tree_html .= '</li>';
            }
        }

        return $tree_html;
    }

    /**
     * @param string $pattern
     * @param int $flags
     * @return array
     */
    public static function globRecursive($pattern, $flags = 0)
    {
        $files = glob($pattern, $flags);
        if (!$files) {
            $files = array();
        }

        foreach (glob(
            dirname($pattern).'/*',
            GLOB_ONLYDIR | GLOB_NOSORT
        ) as $dir) {
            /** @noinspection SlowArrayOperationsInLoopInspection */
            $files = array_merge($files, self::globRecursive($dir.'/'.basename($pattern), $flags));
        }

        return $files;
    }

    public static function noEscape($value)
    {
        return $value;
    }

    public function getAdminLink()
    {
        return $this->context->link->getAdminLink('AdminModules', true)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
    }
}
