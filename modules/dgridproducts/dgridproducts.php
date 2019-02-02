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
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_CORE_DIR_')) {
    define('_PS_CORE_DIR_', _PS_ROOT_DIR_);
}
if (!class_exists('TransModDGP')) {
    require_once(_PS_MODULE_DIR_.'dgridproducts/classes/TransModDGP.php');
}
if (!class_exists('DGridTools')) {
    require_once(_PS_MODULE_DIR_.'dgridproducts/classes/DGridTools.php');
}

class DGridProducts extends Module
{
    public function __construct()
    {
        $this->name = 'dgridproducts';
        $this->tab = 'front_office_features';
        $this->version = '2.9.6';
        $this->bootstrap = 1;
        $this->author = 'SeoSA';
        $this->need_instance = '0';
        parent::__construct();
        $this->displayName = $this->l('Quick edit products');
        $this->description = $this->l('Edit information about products');
        $this->module_key = '8b66a93d04fa5f3b47d6e9df6709c156';
    }

    public function install()
    {
        $this->installTab();
        return parent::install() && $this->registerHook('displayBackOfficeHeader');
    }

    public function uninstall()
    {
        $this->uninstallTab();
        return parent::uninstall();
    }

    public function installTab()
    {
        $languages = Language::getLanguages(false);
        $tab = new Tab();
        $name = array();
        foreach ($languages as $lang) {
            $name[$lang['id_lang']] = $this->l('Grid Products');
        }
        $tab->name = $name;
        $tab->module = $this->name;
        $tab->id_parent = Tab::getIdFromClassName('AdminCatalog');
        $tab->class_name = 'AdminProductGrid';
        $tab->save();

        $tab_features = new Tab();
        $name = array();
        foreach ($languages as $lang) {
            $name[$lang['id_lang']] = $this->l('Grid Products');
        }
        $tab_features->name = $name;
        $tab_features->module = $this->name;
        $tab_features->id_parent = Tab::getIdFromClassName('AdminCatalog');
        $tab_features->class_name = 'AdminSeoSaExtendedFeatures';
        $tab_features->hide_host_mode = true;
        $tab_features->active = false;
        $tab_features->save();
    }

    public function uninstallTab()
    {
        $tab = Tab::getInstanceFromClassName('AdminProductGrid');
        $tab->delete();
        $tab_features = Tab::getInstanceFromClassName('AdminSeoSaExtendedFeatures');
        $tab_features->delete();
    }

    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('controller') == 'AdminProductGrid'
            || Tools::getValue('controller') == 'adminproductgrid') {
            $attribute_groups = AttributeGroup::getAttributesGroups($this->context->language->id);
            foreach ($attribute_groups as &$attribute_group) {
                $attribute_group['attributes'] = DGridTools::getAttributes(
                    $this->context->language->id,
                    $attribute_group['id_attribute_group']
                );
            }
            $this->context->smarty->assign(array(
                'attribute_groups' => $attribute_groups
            ));
            return $this->display(__FILE__, 'backoffice_header.tpl');
        }
    }

    public function registerSmartyFunctions()
    {
        $smarty = $this->context->smarty;

        if (!array_key_exists('get_image_lang', $smarty->registered_plugins['function'])) {
            smartyRegisterFunction($smarty, 'function', 'get_image_lang', array($this, 'getImageLang'));
        }
    }

    public function getImageLang($smarty)
    {
        $cookie = $this->context->cookie;
        $path = $smarty['path'];
        $module_path = 'dgridproducts/views/img/';
        $current_language = new Language($cookie->id_lang);
        $module_lang_path = $module_path.$current_language->iso_code.'/';
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

    public function getContent()
    {
        if (Tools::isSubmit('saveShowColumnSettings')) {
            $params = array();
            foreach ($_POST as $key => $name) {
                $params[$key] = Tools::getValue($key);
            }

            unset($name);

            Configuration::updateValue('SEOSA_DGRID_COLUMN', Tools::jsonEncode($params));
        }

        if (Tools::isSubmit('saveShowColumnSettingsComb')) {
            $params = array();
            foreach ($_POST as $key => $name) {
                $params[$key] = Tools::getValue($key);
            }

            unset($name);

            Configuration::updateValue('SEOSA_DGRID_COLUMN_COMB', Tools::jsonEncode($params));
        }

        $this->registerSmartyFunctions();
        $this->context->smarty->assign(array(
            'content' => $this->adminFormShowColumn(),
            'content_comb' => $this->adminFormShowColumnComb(),
            'documentation' => $this->getDocumentation()
        ));
        return $this->context->smarty->fetch(_PS_MODULE_DIR_.$this->name.'/views/templates/admin/content.tpl');
    }

    public function adminFormShowColumn()
    {
        $fields_list = DGridTools::getVisibleColumnForm();
        $config = Tools::jsonDecode(Configuration::get('SEOSA_DGRID_COLUMN'));

        $fields_form = array();
        $fields_value = array();

        foreach ($fields_list as $name => $column) {
            $fields_form[] = array(
                'label' => $this->l(DGridTools::fixColumnLabel($fields_list, $name)),
                'type' => version_compare(_PS_VERSION_, '1.6', '>=') ? 'switch' : 'radio',
                'hint' => $this->l(DGridTools::getHintForField($name)),
                'name' => $name,
                'class'   => 't',
                'values' => array(
                    array(
                        'id' => 'active_on',
                        'value' => 1,
                        'label' => $this->l('Enabled')
                    ),
                    array(
                        'id' => 'active_off',
                        'value' => 0,
                        'label' => $this->l('Disabled')
                    )
                ),
            );
            $fields_value[$name] = isset($config->{$name}) ? $config->{$name} : 0;
        }

        $fields_value['lenght_short_desc'] = (isset($config->lenght_short_desc)
            ? $config->lenght_short_desc : '');
        $fields_value['lenght_desc'] = (isset($config->lenght_desc)
            ? $config->lenght_desc : '');

        unset($column);

        $fields = array(
            'setting_fields' => array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Active columns')
                    ),
                    'input' => $fields_form,
                    'submit' => array(
                        'title' => $this->l('Save'),
                        'name' => 'saveShowColumnSettings',
                        'class' => 'button btn btn-default pull-right',
                        'desc' => ''
                    )
                )
            )
        );

        $helper_form = new HelperForm();
        $helper_form->module = $this;
        $helper_form->fields_value = $fields_value;
        $helper_form->token = Tools::getValue('token');
        if(version_compare(_PS_VERSION_, '1.6', '<')) {
            $helper_form->submit_action = 'edit';
        }
        $helper_form->currentIndex = 'index.php?controller=AdminModules&configure='.$this->name
            .'&tab_module=front_office_features&module_name='.$this->name;

        return $helper_form->generateForm($fields);
    }

    public function adminFormShowColumnComb()
    {
        $prefix = 'comb_';
        $fields_form = array(
            array(
                'label' => $this->l('Reference'),
                'name' => $prefix.'reference'
            ),
            array(
                'label' => $this->l('ean13'),
                'name' => $prefix.'ean13'
            ),
            array(
                'label' => $this->l('ups'),
                'name' => $prefix.'upc'
            ),
            array(
                'label' => $this->l('Wholesale price'),
                'name' => $prefix.'attribute_wholesale_price'
            ),
            array(
                'label' => $this->l('Price'),
                'name' => $prefix.'price'
            ),
            array(
                'label' => $this->l('Final price'),
                'name' => $prefix.'price_final'
            ),
            array(
                'label' => $this->l('Weight'),
                'name' => $prefix.'weight'
            ),
            array(
                'label' => $this->l('Desired'),
                'name' => $prefix.'desired'
            ),
            array(
                'label' => $this->l('Product final price'),
                'name' => $prefix.'product_final_price'
            ),
            array(
                'label' => $this->l('Available date'),
                'name' => $prefix.'available_date'
            ),
            array(
                'label' => $this->l('Quantity'),
                'name' => $prefix.'quantity'
            ),
            array(
                'label' => $this->l('Default on'),
                'name' => $prefix.'default_on'
            )
        );

        $config = Tools::jsonDecode(Configuration::get('SEOSA_DGRID_COLUMN_COMB'));

        $fields_value = array();
        foreach ($fields_form as &$column) {
            $column['type'] = version_compare(_PS_VERSION_, '1.6', '>=') ? 'switch' : 'radio';
            $column['hint'] = $this->l('Show "'.$column['label'].'" column');
            $column['class'] = 't';
            $column['values'] = array(
                    array(
                        'id' => 'active_on',
                        'value' => 1,
                        'label' => $this->l('Enabled')
                    ),
                    array(
                        'id' => 'active_off',
                        'value' => 0,
                        'label' => $this->l('Disabled')
                    )
                );
            $fields_value[$column['name']] = isset($config->{$column['name']}) ? $config->{$column['name']} : 0;
        }

        unset($column);

        $fields = array(
            'setting_fields' => array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Active columns')
                    ),
                    'input' => $fields_form,
                    'submit' => array(
                        'title' => $this->l('Save'),
                        'name' => 'saveShowColumnSettingsComb',
                        'class' => 'button btn btn-default pull-right',
                        'desc' => ''
                    )
                )
            )
        );

        $helper_form = new HelperForm();
        $helper_form->fields_value = $fields_value;
        $helper_form->token = Tools::getValue('token');
        if(version_compare(_PS_VERSION_, '1.6', '<')) {
            $helper_form->submit_action = 'edit';
        }
        $helper_form->currentIndex = 'index.php?controller=AdminModules&configure='.$this->name
            .'&tab_module=front_office_features&module_name='.$this->name;

        return $helper_form->generateForm($fields);
    }

    public function assignDocumentation()
    {
        $smarty = Context::getContext()->smarty;
        if (!array_key_exists('no_escape', $smarty->registered_plugins['modifier'])) {
            smartyRegisterFunction($smarty, 'modifier', 'no_escape', array(__CLASS__, 'noEscape'));
        }

        if (class_exists('TransModDGP')) {
            if (!array_key_exists('ld', $smarty->registered_plugins['modifier'])) {
                smartyRegisterFunction($smarty, 'modifier', 'ld', array(TransModDGP::getInstance(), 'ld'));
            }
        }

        $this->context->controller->addCSS($this->getLocalPath().'views/css/documentation.css');

        if (version_compare(_PS_VERSION_, '1.6.0', '<')) {
            $this->context->controller->addCSS(($this->_path).'views/css/documentation.css', 'all');
            $this->context->controller->addCSS(($this->_path).'views/css/admin-theme2.css', 'all');
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
                $format_name = $matches[1].'. '.TransModDGP::getInstance()->ld($matches[2]);

                $tree_html .= '<li>';
                $tree_html .= '<a '.(!is_array($tree_item)
                        ? 'data-tab="'.$tree_item.'" href="#"' : '').'>'.$format_name.'</a>';
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

        foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
            /** @noinspection SlowArrayOperationsInLoopInspection */
            $files = array_merge($files, self::globRecursive($dir.'/'.basename($pattern), $flags));
        }

        return $files;
    }

    public static function noEscape($value)
    {
        return $value;
    }

    public function getDocumentationLinks()
    {
        $this->context->smarty->assign('link_on_tab_module', $this->getAdminLink());
        return $this->context->smarty->fetch(
            _PS_MODULE_DIR_.$this->name.'/views/templates/admin/documentation_links.tpl'
        );
    }

    public function getAdminLink()
    {
        return $this->context->link->getAdminLink('AdminModules', true)
        .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
    }

    public function displayDeleteSpecificPriceLink($token, $id, $name)
    {
        unset($token);
        unset($name);
        $specific_price = new SpecificPrice($id);
        $rule = new SpecificPriceRule((int)$specific_price->id_specific_price_rule);
        $can_delete_specific_prices = true;

        if (Shop::isFeatureActive()) {
            $id_shop_sp = $specific_price->id_shop;
            $can_delete_specific_prices = (count($this->context->employee->getAssociatedShops()) > 1
                    && !$id_shop_sp) || $id_shop_sp;
        }

        $this->context->smarty->assign(array(
            'rule' => $rule,
            'can_delete_specific_prices' => $can_delete_specific_prices,
            'specific_price' => $specific_price,
            'admin_link' => $this->context->link->getAdminLink('AdminProductGrid', true)
        ));

        return $this->context->smarty->fetch(_PS_MODULE_DIR_.$this->name
            .'/views/templates/admin/edit_specific_price/helpers/list/list_action_delete.tpl');
    }
}
