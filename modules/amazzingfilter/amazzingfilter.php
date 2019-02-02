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

class AmazzingFilter extends Module
{
    public $errors = array();
    public $generated_links = array();

    public function __construct()
    {
        if (!defined('_PS_VERSION_')) {
            exit;
        }
        $this->name = 'amazzingfilter';
        $this->tab = 'front_office_features';
        $this->version = '2.8.0';
        $this->author = 'Amazzing';
        $this->need_instance = 0;
        $this->module_key = '702061a17e404432e6b85a85ad14afb0';
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Amazzing filter');
        $this->description = $this->l('Advanced layered navigation');

        $this->definePublicVariables();
    }

    public function definePublicVariables()
    {
        $this->csv_dir = $this->local_path.'indexes/';
        $this->db = Db::getInstance();
        $this->filtered_products = array();
        $this->media_path = $this->_path.'views/';
        $this->saved_txt = $this->l('Saved');
        $this->error_txt = $this->l('Error');
        $this->product_list_class = 'af-product-list';
        $this->is_17 = Tools::substr(_PS_VERSION_, 0, 3) === '1.7';
        $this->page_link_rewrite_text = $this->is_17 ? 'page' : 'p';
        $this->shop_ids = Shop::getContextListShopID();
        $this->custom_overrides_dir = $this->local_path.'override_files/';
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        if (!parent::install()
            || !$this->registerHook('displayLeftColumn')
            || !$this->registerHook('displayHeader')
            // || !$this->registerHook('displayHome')
            || !$this->registerHook('displayBackOfficeHeader')
            || !$this->registerHook('actionProductAdd')
            || !$this->registerHook('actionProductUpdate')
            || !$this->registerHook('actionIndexProduct')
            || !$this->registerHook('actionObjectCombinationAddAfter')
            || !$this->registerHook('actionAdminTagsControllerSaveAfter')
            || !$this->registerHook('actionAdminTagsControllerDeleteBefore')
            || !$this->registerHook('actionAdminTagsControllerDeleteAfter')
            || !$this->registerHook('actionProductDelete')
            || !$this->registerHook('actionProductListOverride')
            || !$this->registerHook('productSearchProvider')
            || !$this->registerHook('displayCustomerAccount')
            || !$this->prepareDatabaseTables()
            || !$this->installDemoData()) {
            $this->uninstall();
            return false;
        }
        $this->updatePosition(Hook::getIdByName('displayLeftColumn'), 0, 1);
        $this->processAvailableOverrides('add');
        // In some cases overrides are not reset automatically
        unlink(_PS_CACHE_DIR_.'class_index.php');
        return true;
    }

    public function prepareDatabaseTables()
    {
        $sql = array();

        $sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'af_templates (
                id_template int(10) unsigned NOT NULL AUTO_INCREMENT,
                id_shop int(10) NOT NULL,
                template_controller varchar(128) NOT NULL,
                active tinyint(1) NOT NULL DEFAULT 1,
                template_name text NOT NULL,
                template_filters text NOT NULL,
                PRIMARY KEY (id_template, id_shop),
                KEY template_controller (template_controller),
                KEY active (active)
                ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8';

        $sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'af_templates_lang (
                id_template int(10) unsigned NOT NULL,
                id_shop int(10) NOT NULL,
                id_lang int(10) NOT NULL,
                data text NOT NULL,
                PRIMARY KEY (id_template, id_shop, id_lang)
                ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8';

        $sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'af_category_templates (
                id_category int(10) unsigned NOT NULL,
                id_template int(10) NOT NULL,
                id_shop int(10) NOT NULL,
                PRIMARY KEY (id_category, id_template, id_shop)
                ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8';

        $sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'af_general_settings (
                id_shop int(10) unsigned NOT NULL,
                settings text NOT NULL,
                PRIMARY KEY (id_shop)
                ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8';

        $sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'af_customer_filters (
                id_customer int(10) unsigned NOT NULL,
                filters text NOT NULL,
                PRIMARY KEY (id_customer)
                ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8';

        return $this->runSql($sql);
    }

    public function installDemoData()
    {
        $installed = true;
        $controllers = $this->getAvailableControllers(true);
        foreach ($controllers as $controller => $controller_name) {
            $id_template = $this->getNewTemplateId();
            $template_name = sprintf($this->l('Template for %s'), $controller_name);
            $installed &= (bool)$this->saveTemplate($id_template, $controller, $template_name);
        }
        return $installed;
    }

    public function getAvailableControllers($include_category_controller = false)
    {
        $controllers = array(
            'category' => $this->l('Category pages'),
            'index' => $this->l('Home page'),
            'pricesdrop' => $this->l('Specials page'),
            'newproducts' => $this->l('New products page'),
            'bestsales' => $this->l('Best sales page'),
            'manufacturer' => $this->l('Mnufacturer pages'),
            'supplier' => $this->l('Supplier pages'),
            'search' => $this->l('Search results'),
        );
        if (!$include_category_controller) {
            unset($controllers['category']);
        }
        return $controllers;
    }

    public function uninstall()
    {
        $sql = array();
        $sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'af_templates';
        $sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'af_templates_lang';
        $sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'af_category_templates';
        $sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'af_general_settings';
        $sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'af_customer_filters';
        if (!parent::uninstall() || !$this->runSql($sql)) {
            return false;
        }
        $this->processAvailableOverrides('remove');
        return true;
    }

    public function runSql($sql)
    {
        foreach ($sql as $s) {
            if (!$this->db->Execute($s)) {
                return false;
            }
        }
        return true;
    }

    public function processAvailableOverrides($action)
    {
        $action .= 'Override';
        $overrides_data = $this->getOverridesData();
        foreach ($overrides_data as $data) {
            $this->processOverride($action, $data['path'], false);
        }
    }

    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('controller') == 'AdminProducts') {
            // reindexProduct after mass combinations generation
            if ($this->is_17) {
                $this->context->controller->addJquery();
                $js_path = $this->_path.'views/js/attribute-indexer.js?v='.$this->version;
                $this->context->controller->js_files[] = $js_path;
                $ajax_path = 'index.php?controller=AdminModules&configure='.$this->name.
                '&token='.Tools::getAdminTokenLite('AdminModules').'&ajax=1';
                $js = '
                    <script type="text/javascript">
                        var af_ajax_action_path = \''.$ajax_path.'\';
                    </script>
                ';
                return $js;
            } elseif (!empty($this->context->cookie->af_index_product)) {
                $this->indexProduct($this->context->cookie->af_index_product);
                $this->context->cookie->__unset('af_index_product');
            }
            return;
        } elseif (Tools::getValue('configure') != $this->name) {
            return;
        }
        if ($this->active) {
            $other_modules = array('blocklayered', 'ps_facetedsearch');
            foreach ($other_modules as $module_name) {
                if (Module::isEnabled($module_name)) {
                    $txt = $this->l('Please, disable module %s in order to avoid possible interference');
                    $this->context->controller->warnings[] = sprintf($txt, $module_name);
                }
            }
        }

        $this->context->controller->addJquery();
        $this->context->controller->addJqueryUI('ui.tooltip');
        $this->context->controller->addJqueryUI('ui.sortable');
        $this->context->controller->css_files[$this->_path.'views/css/back.css?v='.$this->version] = 'all';
        if ($this->is_17) {
            $this->context->controller->css_files[$this->_path.'views/css/back-17.css?'.$this->version] = 'all';
        }
        $this->context->controller->js_files[] = $this->_path.'views/js/back.js?v='.$this->version;
        $js_def = array(
            'indexingTxt' => $this->l('Indexation is in progress... Please do not close this tab'),
            'indexingSuccessTxt' => $this->l('Ready!'),
            'savedTxt' => $this->saved_txt,
            'errorTxt' => $this->error_txt,
            'deletedTxt' => $this->l('Deleted'),
            'areYouSureTxt' => $this->l('Are you sure?'),
        );
        // plain js for retro-compatibility
        $js = '<script type="text/javascript">';
        foreach ($js_def as $name => $value) {
            $js .= "\nvar $name = '".$this->escapeApostrophe($value)."';";
        }
        $js .= "\n</script>";

        return $js;
    }

    public function ajaxAction($action)
    {
        $ret = array();
        switch ($action) {
            case 'CallTemplateForm':
                $id_template = Tools::getValue('id_template');
                $ret = $this->callTemplateForm($id_template);
                break;
            case 'SaveTemplate':
            case 'DuplicateTemplate':
            case 'DeleteTemplate':
            case 'SaveSettings':
            case 'RunProductIndexer':
            case 'EraseIndex':
            case 'UpdateHook':
                $method = 'ajax'.$action;
                $this->$method();
                break;
            case 'ToggleActiveStatus':
                $id_template = Tools::getValue('id_template');
                $active = Tools::getValue('active');
                $ret = array('success' => $this->toggleActiveStatus($id_template, $active));
                break;
            case 'ShowAvailableFilters':
                $available_filters = $this->getAvailableFiltersSorted();
                $this->context->smarty->assign(array('available_filters' => $available_filters));
                $html = $this->display(__FILE__, 'views/templates/admin/available-filters.tpl');
                $ret['content'] = utf8_encode($html);
                $ret['title'] = $this->l('Available filtering criteria');
                break;
            case 'RenderFilterElements':
                $keys = explode(',', Tools::getValue('keys'));
                $html = '';
                $this->assignLanguageVariables();
                foreach ($keys as $key) {
                    $this->context->smarty->assign(array('filter' => $this->getFilterData($key)));
                    $html .= $this->display(__FILE__, 'views/templates/admin/filter-form.tpl');
                }
                $ret['html'] = utf8_encode($html);
                break;
            case 'SaveAvailableCustomerFilters':
                $filters = Tools::getValue('customer_filters');
                $filters = $filters ? Tools::jsonEncode($filters) : '';
                $ret = array('success' => Configuration::updateValue('AF_SAVED_CUSTOMER_FILTERS', $filters));
                break;
            case 'UpdateModulePosition':
            case 'DisableModule':
            case 'UnhookModule':
            case 'UninstallModule':
            case 'EnableModule':
                $id_module = Tools::getValue('id_module');
                $hook_name = Tools::getValue('hook_name');
                $id_hook = Hook::getIdByName($hook_name);
                $module = Module::getInstanceById($id_module);
                if (Validate::isLoadedObject($module)) {
                    if ($action == 'UpdateModulePosition') {
                        $new_position = Tools::getValue('new_position');
                        $way = Tools::getValue('way');
                        $ret['saved'] = $module->updatePosition($id_hook, $way, $new_position);
                    } elseif ($action == 'DisableModule') {
                        $module->disable();
                        $ret['saved'] = !$module->isEnabledForShopContext();
                    } elseif ($action == 'UnhookModule') {
                        $ret['saved'] = $module->unregisterHook($id_hook, $this->shop_ids);
                    } elseif ($action == 'UninstallModule') {
                        if ($id_module != $this->id) {
                            $ret['saved'] = $module->uninstall();
                        }
                    } elseif ($action == 'EnableModule') {
                        $ret['saved'] = $module->enable();
                    }
                }
                break;
            case 'IndexProduct':
                $ret['indexed'] = $this->indexProduct(Tools::getValue('id_product'));
                break;
            case 'addOverride':
            case 'removeOverride':
                $override = Tools::getValue('override');
                $ret['processed'] = $this->processOverride($action, $override);
                break;
        }
        exit(Tools::jsonEncode($ret));
    }

    public function getAvailableFiltersSorted()
    {
        $filters = $this->getAvailableFilters();
        $sorted = array();
        foreach ($filters as $key => $f) {
            if ($key == 'c') {
                $f['name'] = $this->l('Subcategories of current page');
            }
            $sorted[$f['prefix']][$key] = $f;
        }
        return $sorted;
    }

    public function processOverride($action, $override, $throw_error = true)
    {
        $processed = false;
        switch ($action) {
            case 'addOverride':
            case 'removeOverride':
                $file_path = $this->custom_overrides_dir.$override;
                $tmp_path = $this->local_path.'override/'.$override;
                if (file_exists($file_path)) {
                    if (is_writable(dirname($tmp_path))) {
                        try {
                            // temporarily copy file to /override/ folder for processing it natively
                            Tools::copy($file_path, $tmp_path);
                            $class_name = basename($override, '.php');
                            $processed = $this->$action($class_name);
                            unlink($tmp_path);
                        } catch (Exception $e) {
                            unlink($tmp_path);
                            if ($throw_error) {
                                $this->throwError($e->getMessage());
                            }
                        }
                    } elseif ($throw_error) {
                        $dir_name = str_replace(_PS_ROOT_DIR_, '', dirname($tmp_path)).'/';
                        $txt = $this->l('Make sure the following directory is writable: %s');
                        $this->throwError(sprintf($txt, $dir_name));
                    }
                }
                break;
        }
        return $processed;
    }

    public function getImplodedContextShopIds()
    {
        $shop_ids = Shop::getContextListShopID();
        return implode(', ', $shop_ids);
    }

    public function getContent()
    {
        if (Tools::isSubmit('ajax') && $action = Tools::getValue('action')) {
            $this->ajaxAction($action);
        }

        $id_shop_current = $this->context->shop->id;
        $imploded_shop_ids = $this->getImplodedContextShopIds();
        $available_templates_multishop = $this->db->executeS('
            SELECT *
            FROM '._DB_PREFIX_.'af_templates
            WHERE id_shop IN ('.pSQL($imploded_shop_ids).')
        ');

        $available_templates = array();
        foreach ($available_templates_multishop as $t) {
            if (!isset($available_templates[$t['id_template']]) || $t['id_shop'] == $id_shop_current) {
                $available_templates[$t['id_template']] = $t;
            }
        }

        $available_customer_filters = $this->getAvailableFilters(false);
        $to_unset = array_merge(array('p', 'w'), array_keys($this->getSpecialFilters()));
        foreach ($to_unset as $k) {
            unset($available_customer_filters[$k]);
        }

        $saved_customer_filters = $this->getAdjustableCustomerFilters();
        $general_settings_fields = $this->getGeneralSettingsFields();
        $this->context->smarty->assign(array(
            'controller_options' => $this->getAvailableControllers(true),
            'indexation_data' => $this->getIndexationData(true),
            'indexation_required' => !empty($this->indexation_required),
            'available_templates' => $available_templates,
            'available_hooks' => $this->getAvailableHooks(),
            'general_settings_fields' => $general_settings_fields,
            'layout_classes' => $this->getLayoutClasses(),
            'layout_ids' => $this->getLayoutIds(),
            'available_customer_filters' => $available_customer_filters,
            'saved_customer_filters' => $saved_customer_filters,
            'overrides_data' => $this->getOverridesData(),
            'this' => $this,
            'changelog_link' => $this->_path.'Readme.md?v='.$this->version,
            'documentation_link' => $this->_path.'readme_en.pdf?v='.$this->version,
            'contact_us_link' => 'https://addons.prestashop.com/en/write-to-developper?id_product=18575',
            'other_modules_link' => 'http://addons.prestashop.com/en/2_community-developer?contributor=64815',
            'files_update_warnings' => $this->getFilesUpdadeWarnings(),
        ));
        $html = $this->display(__FILE__, 'views/templates/admin/configure.tpl');
        return $html;
    }

    public function getOverridesData()
    {
        $data_fetching_txt = $this->l('Required to avoid double data fetching on %s');
        $notes = array(
            'Product'      => sprintf($data_fetching_txt, $this->l('prices drop and new products pages')),
            'ProductSale'  => sprintf($data_fetching_txt, $this->l('bestsellers page')),
            'Search'       => sprintf($data_fetching_txt, $this->l('search results page')),
            'Manufacturer' => sprintf($data_fetching_txt, $this->l('manufacturer pages')),
            'Supplier'     => sprintf($data_fetching_txt, $this->l('supplier pages')),
            'AdminProductsController' => $this->l('Required for proper indexation on saving the product'),
        );
        if ($this->is_17) {
            $notes['Product'] = $this->l('Required for improved performance on Search results page');
        }

        $autoload = PrestaShopAutoload::getInstance();
        $overrides = array();
        foreach (Tools::scandir($this->custom_overrides_dir, 'php', '', true) as $file) {
            $class_name = basename($file, '.php');
            if ($class_name != 'index' && (!$this->is_17 || $class_name == 'Product')) {
                $path = $autoload->getClassPath($class_name.'Core');
                $overrides[$class_name] = array(
                    'note' => isset($notes[$class_name]) ? $notes[$class_name] : '',
                    'path' => $path,
                    'installed' => $this->isOverrideInstalled($path),
                );
            }
        }
        return $overrides;
    }

    public function isOverrideInstalled($path)
    {
        $shop_override_path = _PS_OVERRIDE_DIR_.$path;
        $module_override_path = $this->custom_overrides_dir.$path;
        $methods_to_override = $already_overriden = array();
        if (file_exists($module_override_path)) {
            $lines = file($module_override_path);
            foreach ($lines as $line) {
                // note: this check is available only for public functions
                if (Tools::substr(trim($line), 0, 6) == 'public') {
                    $key = trim(current(explode('(', $line)));
                    $methods_to_override[$key] = 0;
                }
            }
        }
        $name_length = Tools::strlen($this->name);
        if (file_exists($shop_override_path)) {
            $lines = file($shop_override_path);
            foreach ($lines as $i => $line) {
                if (Tools::substr(trim($line), 0, 6) == 'public') {
                    $key = trim(current(explode('(', $line)));
                    if (isset($methods_to_override[$key])) {
                        unset($methods_to_override[$key]);
                        // if there is no comment about installed override
                        if (!isset($lines[$i - 4]) ||
                            Tools::substr(trim($lines[$i - 4]), - $name_length) !== $this->name) {
                            $key = explode('function ', $key);
                            if (isset($key[1])) {
                                $already_overriden[] = $key[1].'()';
                            }
                        }
                    }
                }
            }
        }
        $installed = (bool)!$methods_to_override;
        if ($already_overriden) {
            $installed = implode(', ', $already_overriden);
        }
        return $installed;
    }

    public function getFilesUpdadeWarnings()
    {
        $warnings = $customizable_layout_files = array();
        $locations = array(
            '/css/' => 'css',
            '/js/'  => 'js',
            '/templates/admin/' => 'tpl',
            '/templates/hook/' => 'tpl',
            '/templates/front/' => 'tpl',
        );
        foreach ($locations as $loc => $ext) {
            $loc = 'views'.$loc;
            $files = glob($this->local_path.$loc.'*.'.$ext);
            foreach ($files as $file) {
                $customizable_layout_files[] = '/'.$loc.basename($file);
            }
        }
        foreach ($customizable_layout_files as $file) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if ($file == '/views/css/custom.css' || $file == '/views/js/custom.js') {
                continue;
            }
            if ($this->is_17) {
                $customized_file_path = _PS_THEME_DIR_.'modules/'.$this->name.$file;
            } else {
                $customized_file_path = _PS_THEME_DIR_.($ext != 'tpl' ? $ext.'/' : '').'modules/'.$this->name.$file;
            }
            if (file_exists($customized_file_path)) {
                $original_file_path = $this->local_path.$file;
                $original_rows = file($original_file_path);
                $original_identifier = trim(array_pop($original_rows));
                $customized_rows = file($customized_file_path);
                $customized_identifier = trim(array_pop($customized_rows));
                if ($original_identifier != $customized_identifier) {
                    $warnings[$file] = $original_identifier;
                }
            }
        }
        return $warnings;
    }

    public function getGeneralSettingsFields($fill_values = true)
    {
        $layout_classes = $this->getLayoutClasses();
        $layout_ids = $this->getLayoutIds();
        $fields = array(
            'reload_action' => array(
                'display_name'  => $this->l('Reload product list'),
                'value' => 1,
                'type'  => 'select',
                'options' => array(
                    1 => $this->l('Instantly'),
                    2 => $this->l('On button click'),
                ),
            ),
            'p_type' =>  array(
                'display_name'  => $this->l('Pagination type'),
                'value' => 1,
                'type'  => 'select',
                'options' => array(
                    1 => $this->l('Regular'),
                    2 => $this->l('Load more button'),
                    3 => $this->l('Infinite scroll'),
                ),
            ),
            'subcat_products' => array(
                'display_name'  => $this->l('Include all products from subcategories'),
                'tooltip'  => $this->l('Even if they are not directly associated to current category'),
                'value' => 1,
                'type'  => 'switcher',
            ),
            'autoscroll' =>  array(
                'display_name'  => $this->l('Autoscroll to top after filtration'),
                'tooltip'  => $this->l('After applying filters, switching pages, changing sorting, etc...'),
                'value' => 0,
                'type'  => 'switcher',
            ),
            'count_data' =>  array(
                'display_name'  => $this->l('Show numbers of matches'),
                'value' => 1,
                'type'  => 'switcher',
            ),
            'hide_zero_matches' =>  array(
                'display_name'  => $this->l('Hide options with zero matches'),
                'value' => 1,
                'type'  => 'switcher',
            ),
            'dim_zero_matches' =>  array(
                'display_name'  => $this->l('Dim options with zero matches'),
                'value' => 1,
                'type'  => 'switcher',
            ),
            'include_group' => array(
                'display_name'  => $this->l('Include group name in selected filters'),
                'tooltip'  => $this->l('Shown above filter block'),
                'value' => 0,
                'type' => 'switcher',
            ),
            'include_sorting' => array(
                'display_name'  => $this->l('Include sorting parameter in URL'),
                'value' => 1,
                'type' => 'switcher',
            ),
            'load_icons' =>  array(
                'display_name'  => $this->l('Load icon font'),
                'tooltip' => $this->l('Use this option if your theme does not support icon-xx classes'),
                'value' => $this->is_17 ? 1 : 0,
                'type'  => 'switcher',
            ),
            'dec_sep' => array(
                'display_name'  => $this->l('Decimal separator'),
                'tooltip'  => $this->l('Used in sorting by numbers and numeric sliders'),
                'type' => 'text',
                'value' => '.',
            ),
            'tho_sep' => array(
                'display_name'  => $this->l('Thousand separator'),
                'tooltip'  => $this->l('Used in sorting by numbers and numeric sliders'),
                'type' => 'text',
                'value' => '',
            ),
            'oos_behaviour' =>  array(
                'display_name'  => $this->l('Out of stock behaviour'),
                'value' => 0,
                'type'  => 'select',
                'options' => array(
                    0 => $this->l('Do nothing'),
                    1 => $this->l('Move out of stock products to the end of the list'),
                    2 => $this->l('Exclude products that are out of stock'),
                ),
            ),
            'combinations_stock' =>  array(
                'display_name'  => $this->l('Count stock for combinations'),
                'tooltip'  => $this->l('Count stock basing on selected attributes'),
                'value' => 0,
                'type'  => 'switcher',
                'warning' => $this->l('Slightly increases filtering time'),
            ),
            'combinations_existence' =>  array(
                'display_name'  => $this->l('Check combinations existence'),
                'tooltip'  => $this->l('Exclude products that do not have combinations with selected attributes'),
                'value' => 0,
                'type'  => 'switcher',
                'warning' => $this->l('Slightly increases filtering time'),
            ),
            'combination_results' => array(
                'display_name'  => $this->l('Display combination prices/images'),
                'tooltip'  => $this->l('Display prices/images basing on selected attributes'),
                'value' => 0,
                'type'  => 'switcher',
                'warning' => $this->l('Slightly increases filtering time'),
            ),
            'compact_view' => array(
                'display_name'  => $this->l('Compact view on mobile devices'),
                'value' => 1,
                'type'  => 'switcher',
            ),
            'af_classes' => array(
                'display_name'  => $this->l('Layout classes'),
                'type' => 'special',
                'multiple_values' => $layout_classes,
                'value' => array_combine(array_keys($layout_classes), array_keys($layout_classes)),
            ),
            'af_ids' => array(
                'display_name'  => $this->l('Layout IDs'),
                'type' => 'special',
                'multiple_values' => $layout_ids,
                'value' => array_combine(array_keys($layout_ids), array_keys($layout_ids)),
            ),
        );
        if ($fill_values) {
            $saved_settings = $this->db->getValue('
                SELECT settings FROM '._DB_PREFIX_.'af_general_settings
                WHERE id_shop = '.(int)$this->context->shop->id.'
            ');
            $saved_settings = $saved_settings ? Tools::jsonDecode($saved_settings, true) : array();
            foreach ($fields as $name => &$f) {
                if (isset($saved_settings[$name])) {
                    $f['value'] = $saved_settings[$name];
                }
            }
        }
        if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {
            $warning_txt = $this->l('Not compatible with advanced stock management');
            foreach (array('oos_behaviour', 'combinations_stock') as $name) {
                $fields[$name]['warning'] = $warning_txt;
            }
        }
        return $fields;
    }

    public function saveSettings($submitted_settings = array())
    {
        $settings_to_save = $settings_rows = array();
        $required_settings = $this->getGeneralSettingsFields(false);
        foreach ($required_settings as $name => $field) {
            $value = isset($submitted_settings[$name]) ? $submitted_settings[$name] : $field['value'];
            $settings_to_save[$name] = $value;
        }
        $settings_to_save = Tools::jsonEncode($settings_to_save);
        $shop_ids = Shop::getContextListShopID();
        foreach ($shop_ids as $id_shop) {
            $settings_rows[] = '('.(int)$id_shop.', \''.pSQL($settings_to_save).'\')';
        }
        $update_query = '
            INSERT INTO '._DB_PREFIX_.'af_general_settings
            VALUES '.implode(', ', $settings_rows).'
            ON DUPLICATE KEY UPDATE
            settings=VALUES(settings)
        ';
        return $this->db->execute($update_query);
    }

    public function ajaxSaveSettings()
    {
        $submitted_settings = $this->unserialize('settings_form');
        $ret = array('success' => $this->saveSettings($submitted_settings));
        exit(Tools::jsonEncode($ret));
    }

    public function getGeneralSettings()
    {
        $settings = $this->getGeneralSettingsFields(true);
        foreach ($settings as &$field) {
            $field = $field['value'];
        }
        return $settings;
    }


    public function getIndexationData($count = false, $shop_ids = array())
    {
        // all available shops
        $shop_ids = $shop_ids ? $shop_ids : Shop::getContextListShopID();
        $indexed_data = array();
        foreach ($shop_ids as $id_shop) {
            $indexed_data[$id_shop] = array();
            $id_lang = $this->db->getValue('
                SELECT l.id_lang FROM '._DB_PREFIX_.'lang l
                INNER JOIN '._DB_PREFIX_.'lang_shop ls
                    ON ls.id_lang = l.id_lang AND ls.id_shop = '.(int)$id_shop.'
                WHERE l.active = 1
            ');
            $id_currency = $this->db->getValue('
                SELECT c.id_currency FROM '._DB_PREFIX_.'currency c
                INNER JOIN '._DB_PREFIX_.'currency_shop cs
                    ON cs.id_currency = c.id_currency AND cs.id_shop = '.(int)$id_shop.'
                WHERE c.deleted = 0 AND c.active = 1
            ');
            $path = $this->csv_dir.'index_'.$id_shop.'_'.$id_lang.'_'.$id_currency.'.csv';
            if (file_exists($path)) {
                $indexed_lines = file($this->csv_dir.'index_'.$id_shop.'_'.$id_lang.'_'.$id_currency.'.csv');
                foreach ($indexed_lines as $l) {
                    $id_product = current(explode('|', $l));
                    $indexed_data[$id_shop][$id_product] = $id_product;
                }
            }
        }
        $imploded_shop_ids = implode(', ', $shop_ids);
        $products_data = $this->db->executeS('
            SELECT p.id_product, ps.id_shop
            FROM '._DB_PREFIX_.'product p
            INNER JOIN '._DB_PREFIX_.'product_shop ps
                ON ps.id_product = p.id_product AND ps.id_shop IN('.pSQL($imploded_shop_ids).')
                AND ps.id_product > 0 AND ps.active = 1 AND ps.visibility <> "none"
        ');
        $sorted_data = array();
        foreach ($products_data as $pd) {
            $id_product = $pd['id_product'];
            $id_shop = $pd['id_shop'];
            if (!empty($indexed_data[$id_shop][$id_product])) {
                $sorted_data[$id_shop]['indexed'][$id_product] = $id_product;
            } else {
                $sorted_data[$id_shop]['missing'][$id_product] = $id_product;
                $this->indexation_required = 1;
            }
        }
        foreach (array_keys($indexed_data) as $id_shop) {
            foreach (array('indexed', 'missing') as $key) {
                if (!isset($sorted_data[$id_shop][$key])) {
                    $sorted_data[$id_shop][$key] = array();
                }
            }
        }
        if ($count) {
            foreach ($sorted_data as $id_shop => &$data) {
                $data['indexed'] = !empty($data['indexed']) ? count($data['indexed']) : 0;
                $data['missing'] = !empty($data['missing']) ? count($data['missing']) : 0;
                $data['shop_name'] = $this->db->getValue('
                    SELECT name FROM '._DB_PREFIX_.'shop
                    WHERE id_shop = '.(int)$id_shop.'
                ');
            }
        }
        return $sorted_data;
    }

    public function getAvailableHooks($return_current = false)
    {
        $methods = get_class_methods(__CLASS__);
        $methods_to_exclude = array(
            'hookDisplayBackOfficeHeader',
            'hookDisplayHeader',
            'hookDisplayCustomerAccount',
            'hookDisplayHome'
        );
        $available_hooks = array();
        $hook_found = false;
        foreach ($methods as $m) {
            if (Tools::substr($m, 0, 11) === 'hookDisplay' && !in_array($m, $methods_to_exclude)) {
                $hook_name = str_replace('hookDisplay', 'display', $m);
                $selected = 0;
                if (!$hook_found && $this->isRegisteredInHook($hook_name)) {
                    $hook_found = $selected = 1;
                    if ($return_current) {
                        return $hook_name;
                    }
                }
                $available_hooks[$hook_name] = $selected;
            }
        }
        ksort($available_hooks);
        return $available_hooks;
    }

    public function getLayoutClasses()
    {
        $classes = array(
            'icon-lock' => $this->l('Locked filters icon'),
            'icon-unlock-alt' => $this->l('Unlocked filters icon'),
            'icon-times' => $this->l('Remove one filter icon'),
            'icon-eraser' => $this->l('Remove all filters icon'),
            'icon-refresh icon-spin' => $this->l('Loading indicator icon'),
            'icon-filter' => $this->l('Filter icon'),
            'icon-minus' => $this->l('Minus icon'),
            'icon-plus' => $this->l('Plus icon'),
            'icon-check' => $this->l('Checked icon'),
            'icon-save' => $this->l('Save icon'),
            'pagination' => $this->l('Pagination container'),
            'product-count' => $this->l('Product count countainer'),
        );
        return $classes;
    }

    public function getLayoutIds()
    {
        $ids = array(
            'pagination' => $this->l('Top pagination holder'),
            'pagination_bottom' => $this->l('Bottom pagination holder'),
        );
        return $ids;
    }

    public function verifyMethod($method_name)
    {
        if (!method_exists($this, $method_name)) {
            $this->throwError($this->l('Unknown method:').' '.$method_name);
        }
    }

    public function callTemplateForm($id_template, $full = true)
    {
        if (!$id_template) {
            $new_id = $this->getNewTemplateId();
            $template_controller = Tools::getValue('template_controller');
            $template_name = $this->l('Template').' - '.date('Y-m-d H:i:s');
            $id_template = $this->saveTemplate($new_id, $template_controller, $template_name);
        }
        $template_data_multishop = $this->db->executeS('
            SELECT * FROM '._DB_PREFIX_.'af_templates
            WHERE id_template = '.(int)$id_template.'
        ');
        $template_data = false;
        foreach ($template_data_multishop as $data) {
            if (!$template_data || $data['id_shop'] == $this->context->shop->id) {
                $template_data = $data;
            }
        }
        $this->context->smarty->assign(array(
            'controller_options' => $this->getAvailableControllers(true),
            't' => $template_data,
        ));
        if ($full) {
            //categories
            $cats = $this->db->ExecuteS('
                SELECT DISTINCT id_category
                FROM '._DB_PREFIX_.'af_category_templates
                WHERE id_template = '.(int)$id_template.'
                AND id_shop = '.(int)$template_data['id_shop'].'
            ');
            $saved_cats = array();
            foreach ($cats as $cat) {
                $saved_cats[$cat['id_category']] = $cat['id_category'];
            }
            $id_parent = Configuration::get('PS_ROOT_CATEGORY');
            $categories = $this->getSubcategories($this->context->language->id, $id_parent);
            $tree_categories = array();
            foreach ($categories as $cat) {
                $cat['checked'] = isset($saved_cats[$cat['id_category']]);
                $tree_categories[$cat['id_parent']][$cat['id_category']] = $cat;
            }
            $template_filters = Tools::jsonDecode($template_data['template_filters'], true);
            $template_filters_lang = $this->db->executeS('
                SELECT id_lang, data FROM '._DB_PREFIX_.'af_templates_lang
                WHERE id_template = '.(int)$template_data['id_template'].'
                AND id_shop = '.(int)$template_data['id_shop'].'
            ');
            foreach ($template_filters_lang as $multilang_data) {
                $id_lang = $multilang_data['id_lang'];
                $data = Tools::jsonDecode($multilang_data['data'], true);
                foreach ($data as $filter_key => $values) {
                    foreach ($values as $name => $value) {
                        $template_filters[$filter_key][$name][$id_lang] = $value;
                    }
                }
            }
            foreach ($template_filters as $key => $saved_values) {
                $template_filters[$key] = $this->getFilterData($key, $saved_values);
            }
            $this->context->smarty->assign(array(
                'template_settings' => $this->getTemplateSettingsFields($template_data),
                'template_filters' => $template_filters,
                // cat-tree variables
                'id_parent' => $id_parent,
                'tree_categories' => $tree_categories,
            ));
        }
        $this->assignLanguageVariables();
        $ret = array(
            'form_html' => utf8_encode($this->display(__FILE__, 'views/templates/admin/template-form.tpl')),
            'id_template' => $id_template,
        );
        return $ret;
    }

    public function assignLanguageVariables()
    {
        $this->context->smarty->assign(array(
            'available_languages' => $this->getAvailableLanguages(),
            'id_lang_current' => $this->context->language->id,
        ));
    }

    public function getAvailableLanguages($only_ids = false)
    {
        $available_languages = array();
        foreach (Language::getLanguages(false) as $lang) {
            $available_languages[$lang['id_lang']] = $lang['iso_code'];
        }
        return $only_ids ? array_keys($available_languages) : $available_languages;
    }

    public function getTemplateSettingsFields($saved_values)
    {
        $fields = array(
            'cat_ids' => array(
                'display_name'  => $this->l('Selected categories'),
                'value' => '',
                'type'  => 'cat_tree',
                'class' => 'controller-option category',
            ),
            // 'man_ids' => array(
            //   'display_name'  => $this->l('Selected manufacturers'),
            //     'value' => '',
            //     'type'  => 'special',
            //     'class' => 'controller-option manufacturer',
            // ),
        );
        foreach ($fields as $name => &$f) {
            $f['value'] = isset($saved_values[$name]) ? $saved_values[$name] : $f['value'];
        }
        return $fields;
    }

    public function getFilterData($key, $saved_values = array())
    {
        if (!isset($this->available_filters)) {
            $this->available_filters = $this->getAvailableFilters();
        }
        if (isset($this->available_filters[$key])) {
            $filter_data = $this->available_filters[$key];
            $filter_data['key'] = $key;
            if ($key == 'c') {
                $filter_data['prefix'] = $this->l('Subcategories of current page');
            }
            $filter_data['name_original'] = $filter_data['name'];
            $filter_data['settings'] = $this->getFilterFields($key, $saved_values);
            $custom_name = $filter_data['settings']['custom_name']['value'];
            if (is_array($custom_name) && !empty($custom_name[$this->context->language->id])) {
                $filter_data['name'] = $custom_name[$this->context->language->id];
            }
        } else {
            $filter_data = array();
        }
        return $filter_data;
    }

    public function getFilterFields($key, $saved_values = array())
    {
        $name = Tools::strtolower($name);
        $fields = array(
            'custom_name' => array(
                'display_name'  => $this->l('Custom name'),
                'value' => '',
                'type'  => 'text',
                'multilang' => 1,
                'class' => 'custom-name',
            ),
            'slider_prefix' => array(
                'display_name'  => $this->l('Slider prefix'),
                'value' => '',
                'type'  => 'text',
                'multilang' => 1,
                'class' => 'type-exc not-for-1 not-for-2 not-for-3',
            ),
            'slider_suffix' => array(
                'display_name'  => $this->l('Slider suffix'),
                'value' => '',
                'type'  => 'text',
                'multilang' => 1,
                'class' => 'type-exc not-for-1 not-for-2 not-for-3',
            ),
            // 'slider_min' => array(
            //     'display_name' => $this->l('Slider min value'),
            //     'value' => 0,
            //     'type'  => 'select',
            //     'options' => array(
            //         0 => '0',
            //         1 => $this->l('Real minimum'),
            //     ),
            //     'class' => 'type-exc not-for-1 not-for-2 not-for-3',
            // ),
            'nesting_lvl' => array(
                'display_name'  => $this->l('Nesting level'),
                'value' => 0,
                'type'  => 'select',
                'options' => array(0 => $this->l('All'), 1 => 1, 2 => 2),
            ),
            'foldered' => array(
                'display_name'  => $this->l('Structure'),
                'value' => 1,
                'type'  => 'select',
                'options' => array(
                    0 => $this->l('Regular'),
                    1 => $this->l('Foldered'),
                ),
                'class' => 'type-exc not-for-3',
                'quick' => 1,
            ),
            'range_step' => array(
                'display_name'  => $this->l('Range step'),
                'value' => 100,
                'type'  => 'text',
                'class' => 'type-exc not-for-4',
                'quick' => 1,
            ),
            'sort_by' => array(
                'display_name'  => $this->l('Sort by'),
                'value' => 0,
                'type'  => 'select',
                'options' => array(
                    '0' => $this->l('Name'),
                    'numbers_in_name' => $this->l('Numbers in name'),
                    'id' => $this->l('ID'),
                    'position' => $this->l('Position'),
                ),
                'class' => 'type-exc not-for-4',
                'input_class' => 'sort-by',
                'quick' => 1,
            ),
            'type' => array(
                'display_name'  => $this->l('Type'),
                'value' => 1,
                'type'  => 'select',
                'options' => array(
                    1 => $this->l('Checkbox'),
                    2 => $this->l('Radio button'),
                    3 => $this->l('Select'),
                    4 => $this->l('Slider'),
                ),
                'quick' => 1,
                'input_class' => 'f-type',
            ),
            'minimized' => array(
                'display_name'  => $this->l('Minimized'),
                'value' => 0,
                'type'  => 'checkbox',
                'quick' => 1,
            ),
        );
        if (!isset($saved_values['slider_prefix']) && !isset($saved_values['slider_suffix'])) {
            if ($slider_extensions = $this->getSliderExtensions($key)) {
                $fields['slider_prefix']['value'] = $slider_extensions['prefix'];
                $fields['slider_suffix']['value'] = $slider_extensions['suffix'];
            }
        }
        $this->removeSpecificOptions($key, $fields);
        foreach ($fields as $name => &$f) {
            $f['input_name'] = 'filters['.$key.']['.$name.']';
            $f['value'] = isset($saved_values[$name]) ? $saved_values[$name] : $f['value'];
            if (!empty($f['multilang'])) {
                $f['input_name'] = str_replace('filters', 'filters[multilang]', $f['input_name']);
            }
        }
        return $fields;
    }

    public function getSliderExtensions($key)
    {
        $extensions = array();
        $first_char = Tools::substr($key, 0, 1);
        switch ($first_char) {
            case 'a': // possible numeric sliders
            case 'f':
                $id_group = Tools::substr($key, 1);
                $method = $first_char == 'a' ? 'getAttributes' : 'getFeatures';
                foreach ($this->getAvailableLanguages(true) as $id_lang) {
                    $values = $this->$method($id_lang, $id_group);
                    foreach ($values as $i => $val) {
                        $name = $val['name'];
                        if ($number = $this->extractNumberFromString($name)) {
                            $name = explode($number, $name);
                            $extensions['prefix'][$id_lang] = trim($name[0]);
                            $extensions['suffix'][$id_lang] = isset($name[1]) ? trim($name[1]) : '';
                            break;
                        }
                        if ($i > 3) { // don't spend many resourses on defining extensions
                            break;
                        }
                    }
                }
                break;
            case 'w': // weight
                foreach ($this->getAvailableLanguages(true) as $id_lang) {
                    $extensions['prefix'][$id_lang] = '';
                    $extensions['suffix'][$id_lang] = Configuration::get('PS_WEIGHT_UNIT');
                }
                break;
        }
        return $extensions;
    }

    public function removeSpecificOptions($key, &$fields)
    {
        $special_filters = array_keys($this->getSpecialFilters());
        $slider_filters = array('p', 'w');
        $numeric_slider_filters = array('a', 'f');
        $first_char = Tools::substr($key, 0, 1);
        if ($first_char != 'c') {
            unset($fields['foldered']);
            unset($fields['nesting_lvl']);
        }
        if ($first_char != 'a') {
            unset($fields['sort_by']['options']['position']);
        }
        if (!in_array($key, $slider_filters)) {
            unset($fields['range_step']);
            if (!in_array($first_char, $numeric_slider_filters)) {
                unset($fields['slider_prefix']);
                unset($fields['slider_suffix']);
                unset($fields['type']['options'][4]);
            }
        } else {
            if ($key == 'p') { // prefix-suffux for price is based on selected currency
                unset($fields['slider_prefix']);
                unset($fields['slider_suffix']);
            }
            $fields['type']['value'] = 4;
        }
        if ($first_char == 'c' || in_array($key, $special_filters) || in_array($key, $slider_filters)) {
            unset($fields['sort_by']);
        }
        if (in_array($key, $special_filters)) {
            unset($fields['type']['options'][2]);
            unset($fields['type']['options'][3]);
            unset($fields['type']['options'][4]);
        }
    }

    public function getParentCategories($id_lang, $id_shop)
    {
        $parents_data = $this->db->executeS('
            SELECT DISTINCT(cl.id_category) AS id, cl.name AS name, c.position
            FROM '._DB_PREFIX_.'category c
            INNER JOIN '._DB_PREFIX_.'category_lang cl
                ON cl.id_category = c.id_parent
                AND cl.id_lang = '.(int)$id_lang.'
                AND cl.id_shop = '.(int)$id_shop.'
            WHERE c.level_depth > 2
            ORDER BY cl.name ASC
        ');
        $parent_categories = array();
        foreach ($parents_data as $data) {
            $parent_categories['c'.$data['id']] = $data;
        }
        return $parent_categories;
    }

    public function getSpecialFilters()
    {
        return array(
            'newproducts' => $this->l('New products'),
            'bestsales' => $this->l('Best sales'),
            'pricesdrop' => $this->l('Prices drop'),
            'in_stock' => $this->l('In stock'),
        );
    }

    public function getStandardFilters()
    {
        return array(
            'p' => $this->l('Price'),
            'w' => $this->l('Weight'),
            'm' => $this->l('Manufacturers'),
            's' => $this->l('Suppliers'),
            't' => $this->l('Tags'),
            'q' => $this->l('Condition'),
        );
    }

    public function getAvailableFilters($include_parents = true)
    {
        $id_lang = $this->context->language->id;
        $id_shop = $this->context->shop->id;
        $available_filters = array();
        // cats
        $categories = array(
            'c' => array(
                'id' => 0,
                'name' => $this->l('Categories'),
                'position' => -1,
            ),
        );
        if ($include_parents) {
            $categories += $this->getParentCategories($id_lang, $id_shop);
        }
        foreach ($categories as $key => $c) {
            $c['prefix'] = $this->l('Subcategories');
            $available_filters[$key] = $c;
        }
        // atts
        $attribute_groups = AttributeGroup::getAttributesGroups($id_lang);
        $attribute_groups = $this->sortByKey($attribute_groups, 'position');
        foreach ($attribute_groups as $group) {
            $name = $group['public_name'].($group['name'] != $group['public_name'] ? ' ('.$group['name'].')' : '');
            $available_filters['a'.$group['id_attribute_group']] = array(
                'id' => $group['id_attribute_group'],
                'name' => $name,
                'position' => $group['position'],
                'prefix' => $this->l('Attribute'),
            );
        }
        // feats
        $features = Feature::getFeatures($id_lang);  // sorted by position initially
        foreach ($features as $f) {
            $available_filters['f'.$f['id_feature']] = array(
                'id' => $f['id_feature'],
                'name' => $f['name'],
                'position' => $f['position'],
                'prefix' => $this->l('Feature'),
            );
        }
        foreach ($this->getStandardFilters() as $key => $name) {
            $available_filters[$key] = array(
                'id' => 0,
                'position' => 0,
                'name' => $name,
                'prefix' => $this->l('Standard parameter'),
            );
        }
        foreach ($this->getSpecialFilters() as $key => $name) {
            $available_filters[$key] = array(
                'id' => 0,
                'position' => 0,
                'name' => $name,
                'prefix' => $this->l('Special filter'),
            );
        }
        return $available_filters;
    }

    public function toggleActiveStatus($id_template, $active)
    {
        $imploded_shop_ids = $this->getImplodedContextShopIds();

        if ($active) {
            $current_hook = $this->getAvailableHooks(true);
            $controller_name = $this->getTemplateControllerById($id_template);
            if (!$this->isHookAvailableOnControllerPage($current_hook, $controller_name)) {
                // only left/right column hooks are checked
                $col_txt = ($current_hook == 'displayLeftColumn') ? $this->l('Left') : $this->l('Right');
                $error_txt = sprintf($this->l('%s column is not activated on selected page'), $col_txt);
                $error_txt .= '. '.$this->howToActivateColumnTxt();
                $this->throwError($error_txt);
            }
        }

        $update_query = '
            UPDATE '._DB_PREFIX_.'af_templates
            SET active = '.(int)$active.'
            WHERE id_template = '.(int)$id_template.' AND id_shop IN ('.pSQL($imploded_shop_ids).')
        ';
        return $this->db->execute($update_query);
    }

    public function getTemplateControllerById($id_template)
    {
        $controller = $this->db->getValue('
            SELECT template_controller FROM '._DB_PREFIX_.'af_templates
            WHERE id_template = '.(int)$id_template.'
        ');
        return $controller;
    }

    /*
    * Check if column hook is available on selected page
    */
    public function isHookAvailableOnControllerPage($hook_name, $controller_name)
    {
        $available = true;
        $columns = array('left', 'right');
        foreach ($columns as $col) {
            if (Tools::strtolower($hook_name) == 'display'.$col.'column') {
                $page_names = array(
                    'bestsales' => 'best-sales',
                    'pricesdrop' => 'prices-drop',
                    'newproducts' => 'new-products',
                );
                $page = isset($page_names[$controller_name]) ? $page_names[$controller_name] : $controller_name;
                if ($this->is_17) {
                    $layout = $this->context->shop->theme->getLayoutNameForPage($page);
                    $available = $layout == 'layout-both-columns' || $layout == 'layout-'.$col.'-column'
                    || $layout == 'layout-'.$col.'-side-column';
                } else {
                    $method_name = 'has'.Tools::ucfirst($col).'Column';
                    $available = $this->context->theme->$method_name($page);
                }
            }
        }
        return $available;
    }

    public function ajaxDuplicateTemplate()
    {
        $original_id = Tools::getValue('id_template');
        if ($new_id = $this->duplciateTemplate($original_id)) {
            $ret = $this->callTemplateForm($new_id, false);
            exit(Tools::jsonEncode($ret));
        } else {
            $this->throwError('Error');
        }
    }

    public function duplciateTemplate($id_template_original)
    {
        $tables = array('af_templates', 'af_templates_lang', 'af_category_templates');
        $id_template_new = $this->getNewTemplateId();
        $sql = array();
        foreach ($tables as $table_name) {
            $data = $this->db->executeS('
                SELECT * FROM '._DB_PREFIX_.pSQL($table_name).' WHERE id_template = '.(int)$id_template_original.'
            ');
            $new_rows = array();
            foreach ($data as $row) {
                $row['id_template'] = $id_template_new;
                if (isset($row['template_name'])) {
                    $row['template_name'] .= ' '.$this->l('copy');
                }
                $row = array_map('pSQL', $row); // note: all possible HTML is stripped here!!!
                $new_rows[] = '(\''.implode('\', \'', $row).'\')';
            }
            $sql[$table_name] = 'REPLACE INTO '._DB_PREFIX_.pSQL($table_name).' VALUES '.implode(', ', $new_rows);
        }
        return $this->runSql($sql) ? $id_template_new : false;
    }

    public function ajaxDeleteTemplate()
    {
        $id_template = Tools::getValue('id_template');
        $result = array (
            'success' => $this->deleteTemplate($id_template),
        );
        exit(Tools::jsonEncode($result));
    }

    public function deleteTemplate($id_template)
    {
        $controller = $this->db->getValue('
            SELECT template_controller FROM '._DB_PREFIX_.'af_templates WHERE id_template = '.(int)$id_template.'
        ');

        if ($controller != 'category') {
            return false;
        }

        $imploded_shop_ids = $this->getImplodedContextShopIds();

        $template_categories_delete_query = '
            DELETE FROM '._DB_PREFIX_.'af_category_templates
            WHERE id_template = '.(int)$id_template.'
            AND id_shop IN ('.pSQL($imploded_shop_ids).')
        ';

        $template_delete_query = '
            DELETE FROM '._DB_PREFIX_.'af_templates
            WHERE id_template = '.(int)$id_template.'
            AND id_shop IN ('.pSQL($imploded_shop_ids).')
        ';

        $success = $this->db->execute($template_categories_delete_query) && $this->db->execute($template_delete_query);
        return $success;
    }

    public function ajaxSaveTemplate()
    {
        $id_template = Tools::getValue('id_template');
        $template_controller = Tools::getValue('template_controller');
        $template_name = Tools::getValue('template_name');
        $filters_data = Tools::getValue('filters');
        $cat_ids = Tools::getValue('cat_ids');

        // validation
        if (!$filters_data) {
            $this->errors[] = $this->l('Please select at least one filter.');
        }
        if ($template_name == '') {
            $this->errors[] = $this->l('Please add a template name');
        }
        if ($this->errors) {
            $this->throwError($this->errors);
        }
        if (!$this->saveTemplate($id_template, $template_controller, $template_name, $filters_data, $cat_ids)) {
            $this->throwError($this->l('Template not saved'));
        }
        $ret = array (
            'hasError' => false,
            'responseText' => $this->saved_txt,
        );
        die(Tools::jsonEncode($ret));
    }

    public function ajaxUpdateHook()
    {
        $hook_name = Tools::getValue('hook_name');
        $available_hooks = array_keys($this->getAvailableHooks());
        foreach ($available_hooks as $hook) {
            $this->unregisterHook($hook, $this->shop_ids);
        }
        $this->registerHook($hook_name, $this->shop_ids);
        $this->updatePosition(Hook::getIdByName($hook_name), 0, 1);
        $ret = array (
            'hasError' => false,
            'positions_form_html' => utf8_encode($this->renderHookPositionsForm($hook_name)),
            'responseText' => $this->saved_txt,
        );

        // warning if some pages do not have selected hook
        $pages_without_this_hook = array();
        $active_templates = $this->db->executeS('
            SELECT * FROM '._DB_PREFIX_.'af_templates WHERE active = 1
        ');
        foreach ($active_templates as $t) {
            if (!$this->isHookAvailableOnControllerPage($hook_name, $t['template_controller'])) {
                $pages_without_this_hook[$t['template_controller']] = $t['template_controller'];
            }
        }
        if ($pages_without_this_hook) {
            $warning = sprintf($this->l('Module was succesfully hooked to %s'), $hook_name).', ';
            $warning .= $this->l('but this column is not activated for the following pages').':<br>';
            ksort($pages_without_this_hook);
            foreach ($pages_without_this_hook as $controller_name) {
                $warning .= '- '.$controller_name.'<br>';
            }
            $warning .= $this->howToActivateColumnTxt();
            $ret['warning'] = utf8_encode($warning);
        }

        exit(Tools::jsonEncode($ret));
    }

    public function howToActivateColumnTxt()
    {
        $txt = $this->l('You can activate it in %s');
        if ($this->is_17) {
            $sprintf = $this->l('Design > Theme & Logo > Choose layouts');
        } else {
            $sprintf = $this->l('Preferences > Themes > Advanced settings');
        }
        return sprintf($txt, $sprintf);
    }

    public function renderHookPositionsForm($hook_name)
    {
        $this->context->smarty->assign(array(
            'hook_modules' => $this->getHookModulesInfos($hook_name),
            'hook_name' => $hook_name,
        ));
        return $this->display($this->local_path, 'views/templates/admin/hook-positions-form.tpl');
    }

    public function getHookModulesInfos($hook_name)
    {
        $hook_modules = Hook::getModulesFromHook(Hook::getIdByName($hook_name));
        $sorted = array();
        foreach ($hook_modules as $m) {
            if ($instance = Module::getInstanceByName($m['name'])) {
                $logo_src = false;
                if (file_exists(_PS_MODULE_DIR_.$instance->name.'/logo.png')) {
                    $logo_src = _MODULE_DIR_.$instance->name.'/logo.png';
                }
                $sorted[$m['id_module']] = array(
                    'name' => $instance->name,
                    'position' => $m['m.position'],
                    'enabled' => $instance->isEnabledForShopContext(),
                    'display_name' => $instance->displayName,
                    'description' => $instance->description,
                    'logo_src' => $logo_src,
                );
                if ($m['id_module'] == $this->id) {
                    $sorted[$m['id_module']]['current'] = 1;
                }
            }
        }
        return $sorted;
    }

    public function getDefaultFiltersData()
    {
        $filters_data = array (
            'c' => array('type' => 1, 'nesting_lvl' => 0, 'foldered' => 1),
            'p' => array('type' => 4),
            'm' => array('type' => 3),
            'multilang' => array(),
        );
        return $filters_data;
    }

    public function prepareMultilangData($data)
    {
        $sorted_data = array();
        foreach ($data as $filter_key => $multilang_values) {
            foreach ($multilang_values as $name => $values) {
                foreach ($values as $id_lang => $value) {
                    $sorted_data[$id_lang][$filter_key][$name] = $value;
                }
            }
        }
        return $sorted_data;
    }

    public function saveTemplate(
        $id_template,
        $template_controller,
        $template_name,
        $filters_data = array(),
        $cat_ids = array()
    ) {
        if (!$filters_data) {
            $filters_data = $this->getDefaultFiltersData();
        }
        $multilang_data = $this->prepareMultilangData($filters_data['multilang']);
        unset($filters_data['multilang']);

        if ($template_controller == 'manufacturer' && isset($filters_data['m'])) {
            unset($filters_data['m']);
        }
        if ($template_controller == 'supplier' && isset($filters_data['s'])) {
            unset($filters_data['s']);
        }
        foreach (array('p', 'w') as $identifier) {
            if (isset($filters_data[$identifier]['range_step'])) {
                $step = trim(preg_replace('/[^0-9,minmax-]/', '', $filters_data[$identifier]['range_step']), ',');
                $filters_data[$identifier]['range_step'] = $step;
            }
        }

        $current_hook = $this->getAvailableHooks(true);
        // active status is inserted only first time. After that it is updated using toggleActiveStatus
        $active = $this->isHookAvailableOnControllerPage($current_hook, $template_controller);

        $shop_ids = Shop::getContextListShopID();
        $encoded_filters_data = Tools::jsonEncode($filters_data);
        $template_rows = $template_lang_rows = $template_cat_rows = array();
        foreach ($shop_ids as $id_shop) {
            $template_rows[] = '(
                '.(int)$id_template.',
                '.(int)$id_shop.',
                \''.pSQL($template_controller).'\',
                '.(int)$active.',
                \''.pSQL($template_name).'\',
                \''.pSQL($encoded_filters_data).'\'
            )';
            if ($template_controller == 'category') {
                $cat_ids = $cat_ids ? $cat_ids : array(0);
                foreach ($cat_ids as $id_cat) {
                    $row = (int)$id_cat.', '.(int)$id_template.', '.(int)$id_shop;
                    $template_cat_rows[$id_cat.'_'.$id_shop] = '('.$row.')';
                }
            }
            foreach ($multilang_data as $id_lang => $data) {
                $encoded_lang_data = Tools::jsonEncode($data);
                $row = (int)$id_template.', '.(int)$id_shop.', '.(int)$id_lang.', \''.pSQL($encoded_lang_data).'\'';
                $template_lang_rows[] = '('.$row.')';
            }
        }

        $sql = array();

        if ($template_rows) {
            $sql['template_data'] = '
                INSERT INTO '._DB_PREFIX_.'af_templates
                VALUES '.implode(', ', $template_rows).'
                ON DUPLICATE KEY UPDATE
                template_name=VALUES(template_name),
                template_controller=VALUES(template_controller),
                template_filters=VALUES(template_filters)
            ';
        }

        if ($template_lang_rows) {
            $sql['template_lang_data'] = '
                INSERT INTO '._DB_PREFIX_.'af_templates_lang
                VALUES '.implode(', ', $template_lang_rows).'
                ON DUPLICATE KEY UPDATE
                data=VALUES(data)
            ';
        }

        if ($template_cat_rows) {
            $imploded_shop_ids = implode(',', $shop_ids);
            $sql['template_categories_delete'] = '
                DELETE FROM '._DB_PREFIX_.'af_category_templates
                WHERE id_template = '.(int)$id_template.'
                AND id_shop IN ('.pSQL($imploded_shop_ids).')
            ';

            $sql['template_categories_insert'] = '
                INSERT INTO '._DB_PREFIX_.'af_category_templates
                VALUES '.implode(', ', $template_cat_rows).'
                ON DUPLICATE KEY UPDATE
                id_category=VALUES(id_category)
            ';
        }
        foreach ($sql as $s) {
            if (!$this->db->execute($s)) {
                $this->errors[] = $this->l('Template not saved');
            }
        }

        if ($this->errors) {
            return false;
        }

        return $id_template;
    }

    public function unserialize($form_name)
    {
        $data = Tools::getValue($form_name);
        return $this->parseStr($data);
    }

    public function parseStr($str)
    {
        $params = array();
        parse_str($str, $params);
        return $params;
    }

    /**
    * af_templates table has a composite KEY that cannot be autoincremented
    **/
    public function getNewTemplateId()
    {
        $max_id = $this->db->getValue('SELECT MAX(id_template) FROM '._DB_PREFIX_.'af_templates');
        return (int)$max_id + 1;
    }

    public function addJS($file_name, $custom_path = '')
    {
        $path = ($custom_path ? $custom_path : 'modules/'.$this->name.'/views/js/').$file_name;
        if ($this->is_17) {
            // priority should be more than 90 in order to be loaded after jqueryUI
            $params = array('server' => $custom_path ? 'remote' : 'local', 'priority' => 100);
            $this->context->controller->registerJavascript(sha1($path), $path, $params);
        } else {
            $path = $custom_path ? $path : __PS_BASE_URI__.$path;
            $this->context->controller->addJS($path);
            // $this->context->controller->js_files[] = $path.'?'.microtime(true); // debug
        }
    }

    public function addCSS($file_name, $custom_path = '', $media = 'all')
    {
        $path = ($custom_path ? $custom_path : 'modules/'.$this->name.'/views/css/').$file_name;
        if ($this->is_17) {
            $params = array('media' => $media, 'server' => $custom_path ? 'remote' : 'local');
            $this->context->controller->registerStylesheet(sha1($path), $path, $params);
        } else {
            $path = $custom_path ? $path : __PS_BASE_URI__.$path;
            $this->context->controller->addCSS($path, $media);
            // $this->context->controller->css_files[$path.'?'.microtime(true)] = $media; // debug
        }
    }

    public function isMobilePhone()
    {
        return $this->context->getDevice() == Context::DEVICE_MOBILE;
    }

    public function isTablet()
    {
        return $this->context->getDevice() == Context::DEVICE_TABLET;
    }

    public function isCompact()
    {
        if (!isset($this->is_compact)) {
            $this->is_compact = !empty($this->general_settings['compact_view']) && $this->isMobilePhone();
        }
        return $this->is_compact;
    }

    public function hookDisplayHeader()
    {
        $ret = '';
        if ($this->defineFilterParams()) {
            $this->context->controller->addJQueryUI('ui.slider');
            $this->addJS('front.js');
            $this->addJS('custom.js');
            if ($this->current_controller == 'index') {
                $this->addJS('main-page.js');
            }
            if ($this->isMobilePhone() || $this->isTablet()) {
                $this->addJS('jquery.ui.touch-punch.min.js');
                if ($this->context->getMobileDetect()->isIphone()) { // avoid zooming on focusing input on iPhone
                    $ret .= '<style type="text/css">.slider_value .input-text {font-size: 16px}</style>';
                }
            }
            $this->addCSS('front.css');
            $this->addCSS('custom.css');
            if (!empty($this->general_settings['load_icons'])) {
                $this->addCSS('icons.css');
            }
            if ($this->is_17) {
                $this->addCSS('front-17.css');
            }

            $tpl_vars = $this->context->smarty->tpl_vars;
            $max_items = $this->is_17 ? '' : $tpl_vars['comparator_max_item']->value;
            $load_more = $this->general_settings['p_type'] > 1;
            $min_items_txt = $this->l('Please select at least one product');
            $max_items_txt = $this->l('You cannot add more than %d product(s) to the product comparison');
            Media::addJsDef(array(
                'af_ajax_path' => $this->context->link->getModuleLink($this->name, 'ajax'),
                'af_id_cat' => (int)$this->id_cat_current,
                'current_controller' => Tools::getValue('controller'),
                // comparator variables
                'comparator_max_item' => $max_items,
                'comparedProductsIds' => $this->is_17 ? '' : $tpl_vars['compared_products']->value,
                'min_item' => $this->escapeApostrophe($min_items_txt),
                'max_item' => sprintf($this->escapeApostrophe($max_items_txt), $max_items),
                'load_more' => $load_more,
                'af_product_count_text' => $this->products_data['product_count_text'],
                'show_load_more_btn' => !$this->products_data['hide_load_more_btn'],
                'af_product_list_class' => $this->product_list_class,
                'page_link_rewrite_text' => $this->page_link_rewrite_text,
                'af_classes' => $this->general_settings['af_classes'],
                'af_ids' => $this->general_settings['af_ids'],
                'is_17' => (int)$this->is_17,
            ));

            if ($load_more) {
                // hide pagination if load more is used
                $pagination_class = $this->general_settings['af_classes']['pagination'];
                $ret .= '<style type="text/css">.'.$pagination_class.':not(.visible){display: none;}</style>';
            }
        } elseif (Tools::getValue('controller') == 'myaccount') {
            // additional styling on my account page
            $this->general_settings = $this->getGeneralSettings();
            if (!empty($this->general_settings['load_icons'])) {
                $this->addCSS('icons.css');
            }
            if ($this->is_17) {
                $this->addCSS('front-17.css');
            }
        }
        return $ret;
    }

    public function escapeApostrophe($string)
    {
        return str_replace("'", "\'", $string);
    }

    public function getSubmittedParams()
    {
        if (is_callable(array('Tools', 'getAllValues'))) {
            $params = Tools::getAllValues();
        } else { // retro compatibility
            $params = $_POST + $_GET;
        }
        return $params;
    }

    public function getInitialFiltersByGroup($filter_group)
    {
        $values = Tools::getValue($filter_group);
        $values = $values ? explode(',', $values) : array();
        return $values;
    }

    public function getSubcategories($id_lang, $id_parent, $imploded_customer_groups = false, $nesting_lvl = 0)
    {
        $id_parent = $id_parent ? $id_parent : $this->context->shop->getCategory();
        $current_category_data = $this->db->getRow('
            SELECT * FROM '._DB_PREFIX_.'category
            WHERE id_category = '.(int)$id_parent.'
        ');
        $max_depth = $nesting_lvl ? $current_category_data['level_depth'] + $nesting_lvl : 0;
        $nleft = $current_category_data['nleft'];
        $nright = $current_category_data['nright'];
        $categories = $this->db->executeS('
            SELECT c.id_category, c.id_parent, cl.name, cl.link_rewrite
            FROM '._DB_PREFIX_.'category c
            '.Shop::addSqlAssociation('category', 'c').'
            LEFT JOIN '._DB_PREFIX_.'category_lang cl
                ON c.id_category = cl.id_category
            '.($imploded_customer_groups ? 'INNER JOIN '._DB_PREFIX_.'category_group cg
                 ON cg.id_category = c.id_category
                 AND cg.id_group IN ('.pSQL($imploded_customer_groups).')' : '').'
            WHERE id_lang = '.(int)$id_lang.'
            AND c.active = 1
            AND c.nright < '.(int)$nright.'
            AND c.nleft > '.(int)$nleft.'
            '.($max_depth ? 'AND c.level_depth <= '.(int)$max_depth : '').'
            AND cl.id_shop = '.(int)$this->context->shop->id.'
            GROUP BY c.id_category
            ORDER BY category_shop.position ASC
        ');
        return $categories;
    }

    public function getName($resource_type, $id, $id_lang = false, $id_shop = false)
    {
        if (!$id_shop) {
            $id_shop = $this->context->shop->id;
        }
        if (!$id_lang) {
            $id_lang = $this->context->language->id;
        }
        $name = $this->db->getValue('
            SELECT name FROM `'._DB_PREFIX_.bqSQL($resource_type).'_lang`
            WHERE `id_'.bqSQL($resource_type).'` = '.(int)$id.'
            AND `id_shop` = '.(int)$id_shop.' AND `id_lang` = '.(int)$id_lang.'
        ');
        return $name;
    }

    public function prepareTplVariables($current_filters)
    {
        $id_lang = $this->context->language->id;
        $customer_filters = $this->getCustomerFilters($this->context->customer->id);
        $filters = $initial_params = $initial_filters = $applied_customer_filters = $possible_primary_filters = array();
        $group_urls = array('a' => array(), 'f' => array());
        $imploded_customer_groups = implode(',', $this->context->customer->getGroups());

        // Categories
        foreach ($current_filters as $key => $f) {
            $first_char = Tools::substr($key, 0, 1);
            if ($first_char == 'c') {
                $top_level_parent = Tools::substr($key, 1);
                if (!$top_level_parent) {
                    $top_level_parent = $this->id_cat_current;
                    $group_name = !empty($f['custom_name']) ? $f['custom_name'] : $this->l('Categories');
                } else {
                    $group_name = !empty($f['custom_name']) ?
                    $f['custom_name'] : $this->getName('category', $top_level_parent);
                }
                $group_url = $this->generateLink($group_name, $key);
                $filters[$key]['type'] = $f['type'];
                $filters[$key]['id_parent'] = $top_level_parent;
                $filters[$key]['name'] = $group_name;
                $filters[$key]['link'] = $group_url;
                $filters[$key]['submit_name'] = 'c['.$top_level_parent.'][]';
                $filters[$key]['foldered'] = !empty($f['foldered']);

                $initial_filters[$group_url] = $this->getInitialFiltersByGroup($group_url);

                $categories = $this->getSubcategories(
                    $id_lang,
                    $top_level_parent,
                    $imploded_customer_groups,
                    $f['nesting_lvl']
                );
                $cat_links = array();
                foreach ($categories as $k => $cat) {
                    $id_cat = $cat['id_category'];
                    $id_parent = $cat['id_parent'];
                    // avoid possible duplicates
                    $link_rewrite = $cat['link_rewrite'];
                    if (isset($cat_links[$link_rewrite])) {
                        $link_rewrite = $id_cat.'-'.$link_rewrite;
                    } else {
                        $cat_links[$link_rewrite] = 1;
                    }
                    $cat = array(
                        'id' => $id_cat,
                        'name' => $cat['name'],
                        'link' => $link_rewrite,
                        'id_parent' => $id_parent,
                    );

                    // note: customer filters are available only for "c", not for "c5", "c20" etc...
                    if (!empty($customer_filters['c'][$id_cat])) {
                        $initial_filters[$group_url][] = $cat['link'];
                        $applied_customer_filters[$key][$id_cat] = $cat['name']; // name can be used in select-s
                    }

                    if (in_array($cat['link'], $initial_filters[$group_url])) {
                        $cat['selected'] = 1;
                        $initial_params['c'][$top_level_parent][] = $id_cat;
                    }
                    $filters[$key]['values'][$id_cat] = $cat;
                    $initial_params['available_options'][$key][$id_cat] = $id_cat;
                }
                $possible_primary_filters[$group_url] = $key;
            }
        }

        // Attributes & Features
        $initial_params['numeric_slider_values'] = array();
        foreach (array('a' => 'getAttributes', 'f' => 'getFeatures') as $k => $method) {
            $items = $this->$method($id_lang);
            foreach ($items as $i) {
                $id_group = $i['id_group'];
                $group_name = $i['group_name'];
                $key = $k.$id_group;
                $name = $i['name'];
                if (isset($current_filters[$key])) {
                    $id = $i['id'];
                    $item_url = $this->generateLink($name, $id);
                    if (empty($group_urls[$k][$id_group])) {
                        if (!empty($current_filters[$key]['custom_name'])) {
                            $group_name = $current_filters[$key]['custom_name'];
                        }
                        $group_urls[$k][$id_group] = $this->generateLink($group_name, $key);
                        $filters[$key]['link'] = $group_urls[$k][$id_group];
                        $filters[$key]['type'] = $current_filters[$key]['type'];
                        $filters[$key]['name'] = $group_name;
                        $filters[$key]['submit_name'] = $k.'['.$id_group.'][]';
                    }
                    $group_url = $filters[$key]['link'];
                    if (!isset($initial_filters[$group_url])) {
                        $initial_filters[$group_url] = $this->getInitialFiltersByGroup($group_url);
                    }
                    if ($filters[$key]['type'] == 4) {
                        $possible_range = explode('-', $name);
                        $number = $this->extractNumberFromString($possible_range[0]);
                        if (!empty($possible_range[1])) {
                            $number .= '-'.$this->extractNumberFromString($possible_range[1]);
                        }
                        // if (!$number && str_replace($number, '', $name) === $name) {
                        //     continue; // no any numbers in name
                        // }
                        // NOTE: keep 'numeric_slider_values' synchronized with 'available_options'
                        $initial_params['numeric_slider_values'][$key][$id] = $number;
                    } elseif (!empty($customer_filters[$key][$id])) { // no customer filters in numeric sliders
                        $applied_customer_filters[$key][$id] = $name;
                        $initial_filters[$group_url][] = $item_url;
                    }
                    $initial_params['available_options'][$key][$id] = $id;
                    if (in_array($item_url, $initial_filters[$group_url])) {
                        $filters[$key]['values'][$id]['selected'] = 1;
                        $initial_params[$k][$id_group][] = $id;
                    }
                    $filters[$key]['values'][$id]['id'] = $id;
                    $filters[$key]['values'][$id]['name'] = $name;
                    $filters[$key]['values'][$id]['link'] = $item_url;
                    if (!empty($i['is_color_group'])) {
                        $filters[$key]['is_color_group'] = 1;
                        $filters[$key]['values'][$id]['class'] = 'color_attribute';
                        $style = '';
                        if ($i['color']) {
                            $style = 'background-color:'.$i['color'];
                        }
                        if (file_exists(_PS_COL_IMG_DIR_.$id.'.jpg')) {
                            $style = 'background: url('._THEME_COL_DIR_.$id.'.jpg) 50% 50% no-repeat;';
                        }
                        $filters[$key]['values'][$id]['style'] = $style;
                    }
                    if (isset($i['position'])) {
                        $filters[$key]['values'][$id]['position'] = $i['position'];
                    }
                    $possible_primary_filters[$group_url] = $key;
                }
            }
        }

        // numeric sliders
        foreach ($initial_params['numeric_slider_values'] as $key => $numbers) {
            $filters[$key]['prefix'] = $current_filters[$key]['slider_prefix'];
            $filters[$key]['suffix'] = $current_filters[$key]['slider_suffix'];
            $group_url = $filters[$key]['link'];
            $values = array();
            if (isset($initial_filters[$group_url][0])) {
                $range = $this->explodeRangeValue($initial_filters[$group_url][0]);
                $values['from'] = $range[0];
                $values['to'] = $range[1];
            }
            $filters[$key]['values'] = $initial_params['sliders'][$key] = $values;
            unset($possible_primary_filters[$group_url]);
        }

        $additional_filters = array(
            'm' => $this->l('Manufacturers'),
            's' => $this->l('Suppliers'),
            't' => $this->l('Tags'),
            'q' => $this->l('Condition'),
        );
        foreach ($additional_filters as $key => $group_name) {
            if (isset($current_filters[$key])) {
                if (!empty($current_filters[$key]['custom_name'])) {
                    $group_name = $current_filters[$key]['custom_name'];
                }
                $group_url = $this->generateLink($group_name, $key);
                $filter = array(
                    'type' => $current_filters[$key]['type'],
                    'name' => $group_name,
                    'link' => $group_url,
                    'submit_name' => $key.'[]',
                    'values' => array(),
                );
                $initial_filters[$group_url] = $this->getInitialFiltersByGroup($group_url);
                $options = $this->getFilteringOptions($key);
                foreach ($options as $o) {
                    $id = $o['id'];
                    $o['link'] = $this->generateLink($o['name'], $id);
                    if (!empty($customer_filters[$key][$id])) {
                        $initial_filters[$group_url][] = $o['link'];
                        $applied_customer_filters[$key][$id] = $o['name'];
                    }
                    if (in_array($o['link'], $initial_filters[$group_url])) {
                        $o['selected'] = 1;
                        $initial_params[$key][] = $id;
                    }
                    $filter['values'][$id] = $o;
                    $initial_params['available_options'][$key][] = $id;
                }
                $filters[$key] = $filter;
                $possible_primary_filters[$group_url] = $key;
            }
        }

        // Special filters
        foreach ($this->getSpecialFilters() as $key => $group_name) {
            if (isset($current_filters[$key])) {
                if (!empty($current_filters[$key]['custom_name'])) {
                    $group_name = $current_filters[$key]['custom_name'];
                }
                $group_url = $this->generateLink($group_name, $key);
                $item_url = $item_id = 1;
                $filters[$key]['type'] = 1;
                $filters[$key]['special'] = 1;
                $filters[$key]['name'] = $group_name;
                $filters[$key]['link'] = $group_url;
                $filters[$key]['submit_name'] = $key;
                $filters[$key]['values'][$item_id] = array(
                    'name' => $group_name,
                    'id' => $item_id,
                    'link' => $item_url,
                );
                $initial_filters[$group_url] = $this->getInitialFiltersByGroup($group_url);
                if (in_array($item_url, $initial_filters[$group_url])) {
                    $filters[$key]['values'][$item_id]['selected'] = 1;
                    $initial_params[$key][] = $item_id;
                }
                $initial_params['available_options'][$key][] = $item_id;
            }
        }

        // Price & Weight
        $array_p_w = array('p' => $this->l('Price'), 'w' => $this->l('Weight'));
        foreach ($array_p_w as $key => $group_name) {
            if (isset($current_filters[$key])) {
                if (!empty($current_filters[$key]['custom_name'])) {
                    $group_name = $current_filters[$key]['custom_name'];
                }
                $group_url = $this->generateLink($group_name, $key);
                $filter = array(
                    'type' => $current_filters[$key]['type'],
                    'name' => $group_name,
                    'link' => $group_url,
                    'submit_name' => $key.'[]',
                    'values' => array(),
                );
                if ($filter['type'] == 4) {
                    $initial_params['sliders'][$key] = $filter['values'];
                } elseif (isset($current_filters[$key]['range_step'])) {
                    $initial_params[$key.'_range_step'] = $current_filters[$key]['range_step'];
                }
                $suffix = $prefix = '';
                if ($key == 'p') {
                    $currency = $this->context->currency;
                    if ($this->is_17) {
                        if (Tools::substr($currency->format, 0, 1) === '¤') {
                            $currency->prefix = $currency->sign;
                        } else {
                            $currency->suffix = $currency->sign;
                        }
                    }
                    $prefix = $currency->prefix;
                    $suffix = $currency->suffix;
                } elseif ($key == 'w') {
                    $suffix = $current_filters[$key]['slider_suffix'];
                    $prefix = $current_filters[$key]['slider_prefix'];
                }
                $filter['prefix'] = $prefix;
                $filter['suffix'] = $suffix;

                $initial_filters[$group_url] = $this->getInitialFiltersByGroup($group_url);
                if (!empty($initial_filters[$group_url])) {
                    $range_values = $initial_filters[$group_url];
                    $initial_params[$key] = $range_values;
                    if ($filter['type'] == 4 && isset($range_values[0])) {
                        $range = explode('-', $range_values[0]);
                        if (count($range) == 2) {
                            $filter['values']['from'] = $initial_params['sliders'][$key]['from'] = $range[0];
                            $filter['values']['to'] = $initial_params['sliders'][$key]['to'] = $range[1];
                        }
                    }
                }
                $initial_params['available_options'][$key] = array();
                $filters[$key] = $filter;
                // slider filters can not be primary
                if ($filter['type'] != 4) {
                    $possible_primary_filters[$group_url] = $key;
                }
            }
        }

        // set primary filter basing on first relevant param in query string
        foreach (array_keys($this->getSubmittedParams()) as $possible_group_url) {
            if (isset($possible_primary_filters[$possible_group_url])) {
                $initial_params['primary_filter'] = $possible_primary_filters[$possible_group_url];
                break;
            }
        }

        $filters_ordered = array();
        foreach ($current_filters as $k => $settings) {
            if (isset($filters[$k])) {
                // force checkbox if more than one filters in group are selected
                if (!empty($customer_filters[$k]) && count($customer_filters[$k]) > 1) {
                    $filters[$k]['type'] = 1;
                }
                $filters_ordered[$k] = $settings + $filters[$k];
            }
        }

        // TODO: set primary filter as in front.js: 345
        // if (empty($params['primary_filter']))

        $nb_items = Configuration::get('PS_PRODUCTS_PER_PAGE');
        if (!empty($this->context->cookie->nb_item_per_page)) {
            $nb_items = $this->context->cookie->nb_item_per_page;
        }
        if ($forced_nb_items = Tools::getValue('n')) {
            $nb_items = $forced_nb_items;
        }

        $pb_id = $this->general_settings['af_ids']['pagination_bottom'];
        $pb_suffix = str_replace($this->general_settings['af_ids']['pagination'].'_', '', $pb_id);
        $product_sorting = $this->getProductSorting($this->current_controller);
        $hidden_inputs = array(
            'id_manufacturer' => (int)Tools::getValue('id_manufacturer'),
            'id_supplier' => (int)Tools::getValue('id_supplier'),
            'page' => Tools::getValue($this->page_link_rewrite_text, 1),
            'nb_items' => $nb_items,
            'nb_days_new' => Configuration::get('PS_NB_DAYS_NEW_PRODUCT'),
            'controller_product_ids' => implode(',', $this->controller_product_ids),
            'current_controller' => $this->current_controller,
            'page_name' => $this->is_17 ? '' : $this->context->smarty->tpl_vars['page_name']->value,
            'id_parent_cat' => $this->id_cat_current,
            'orderBy' => $product_sorting['by'],
            'orderWay' => $product_sorting['way'],
            'defaultSorting' => Tools::getProductsOrder('by').':'.Tools::getProductsOrder('way'),
            'pagination_bottom_suffix' => $pb_suffix,
            'customer_groups' => $imploded_customer_groups,
        );
        if (!$this->is_17) {
            $hidden_inputs['hide_right_column'] = !$this->context->controller->display_column_right;
            $hidden_inputs['hide_left_column'] = !$this->context->controller->display_column_left;
        }

        $hidden_inputs += $this->general_settings;
        unset($hidden_inputs['af_classes']);
        unset($hidden_inputs['af_ids']);
        $params = $hidden_inputs + $initial_params;
        $this->products_data = $this->getFilteredProducts($params);

        /*
        if (!$this->products_data['products']) {
        // try to load products with less filters
            $parsed_url = parse_url($_SERVER['REQUEST_URI']);
            if (!empty($parsed_url['query'])) {
                parse_str($parsed_url['query'], $parsed_url['query']);
                foreach ($parsed_url['query'] as $k => $q) {
                    if (!empty($initial_filters[trim($k, '*')])) {
                        unset($parsed_url['query'][$k]);
                        unset($parsed_url['query'][$k.'*']);
                        $parsed_url['query'] = urldecode(http_build_query($parsed_url['query']));
                        $url = Tools::getShopProtocol().$_SERVER['HTTP_HOST'];
                        $url .= $parsed_url['path'].'?'.$parsed_url['query'];
                        Tools::redirect($url);
                    }
                }
            }
        }
        */

        // prepare range data basing on current min/max values
        foreach ($this->products_data['ranges'] as $k => $r) {
            if (empty($r['max'])) {
                unset($filters_ordered[$k]);
            }
            if (!empty($filters_ordered[$k])) {
                $filter = $filters_ordered[$k];
                if (!empty($r['is_slider'])) {
                    $filter['values'] = $this->fillSliderValues($r);
                } elseif (isset($r['available_range_options'])) {
                    $initial_params['available_options'][$k] = $r['available_range_options'];
                    $submitted_ranges = isset($initial_params[$k]) ? $initial_params[$k] : array();
                    foreach ($r['available_range_options'] as $range) {
                        $filter['values'][] = array(
                            'name' => $filter['prefix'].$range.$filter['suffix'],
                            'id' => $range,
                            'link' => $range,
                            'selected' => in_array($range, $submitted_ranges),
                        );
                    }
                }
                $filters_ordered[$k] = $filter;
            }
        }

        // prepare filters for final display in tpl
        foreach ($filters_ordered as $k => $f) {
            if ($f['type'] == 4) {
                continue;
            }
            $custom_class = $this->general_settings['hide_zero_matches'] ? 'hidden' : '';
            $first_char = Tools::substr($k, 0, 1);
            $remove_unused_options = $first_char == 'a' || $first_char == 'f' || $first_char == 'c';
            if (!isset($f['values'])) {
                $f['values'] = array();
            }
            foreach ($f['values'] as $i => $v) {
                $id = $v['id'];
                $identifier = $first_char.'-'.$id;
                if ($remove_unused_options && !isset($this->products_data['all_matches'][$identifier])) {
                    unset($f['values'][$i]);
                    unset($initial_params['available_options'][$k][$i]);
                }
                if ($custom_class && !empty($this->products_data['count_data'][$identifier])) {
                    $custom_class = '';
                    if (!$remove_unused_options) {
                        break;
                    }
                }
            }
            if (empty($f['values'])) {
                unset($filters_ordered[$k]);
                unset($initial_params['available_options'][$k]);
                continue;
            } elseif ($first_char == 'c') {
                $f['values'] = $this->prepareTreeValues($f['values']);
            } elseif (!empty($f['sort_by'])) {
                $f['values'] = $this->sortByKey($f['values'], $f['sort_by']);
            }
            $f['class'] = $custom_class;
            $filters_ordered[$k] = $f;
        }

        // prepare data for numeric sliders, basing on available matches; remove sliders without matches
        foreach ($initial_params['numeric_slider_values'] as $k => $numbers) {
            $first_char = Tools::substr($k, 0, 1);
            foreach (array_keys($numbers) as $id) {
                $identifier = $first_char.'-'.$id;
                if (!isset($this->products_data['all_matches'][$identifier])) {
                    unset($numbers[$id]);
                    unset($initial_params['available_options'][$k][$id]);
                    unset($initial_params['numeric_slider_values'][$k][$id]);
                }
            }
            if (!$numbers) {
                unset($filters_ordered[$k]);
                continue;
            }
            $number_values = explode('-', implode('-', $numbers));
            $filters_ordered[$k]['values']['min'] = floor(min($number_values));
            $filters_ordered[$k]['values']['max'] = ceil(max($number_values));
            $filters_ordered[$k]['values'] = $this->fillSliderValues($filters_ordered[$k]['values']);
        }

        $this->context->smarty->assign(array(
            'filters' => $filters_ordered,
            'available_options' => $initial_params['available_options'],
            'numeric_slider_values' => $initial_params['numeric_slider_values'],
            'customer_filters' => $customer_filters,
            'hidden_inputs' => $hidden_inputs,
            'count_data' => $this->products_data['count_data'],
            // class used in product-list.tpl
            'class' => $this->product_list_class,
            'applied_customer_filters' => $applied_customer_filters,
            'af_classes' => $this->general_settings['af_classes'],
            'af_ids' => $this->general_settings['af_ids'],
            'current_controller' => $this->current_controller,
            'total_products' => $this->products_data['filtered_ids_count'],
            'is_17' => $this->is_17,
            'is_compact' => $this->isCompact(),
        ));

        if ($this->context->customer->id && $this->getAdjustableCustomerFilters(false)) {
            $this->context->smarty->assign(array(
                'my_filters_link' => $this->context->link->getModuleLink($this->name, 'my-filters'),
            ));
        }

        $this->context->filtered_result = array(
            'products' => $this->products_data['products'],
            'total' =>  $this->products_data['filtered_ids_count'],
            'controller' => Tools::getValue('controller'),
            'sorting' => $this->products_data['params']['orderBy'].'.'.$this->products_data['params']['orderWay'],
        );
    }

    public function prepareTreeValues($values)
    {
        $tree_values = array();
        foreach ($values as $v) {
            $tree_values[$v['id_parent']][$v['id']] = $v;
        }
        return $tree_values;
    }

    public function fillSliderValues($slider_data)
    {
        if (isset($slider_data['values'][0][0]) && isset($slider_data['values'][0][1])) {
            $slider_data['from'] = $slider_data['values'][0][0];
            $slider_data['to'] = $slider_data['values'][0][1];
        }
        $min = isset($slider_data['min']) ? floor($slider_data['min']) : 0;
        $max = isset($slider_data['max']) ? ceil($slider_data['max']) : 10000000000;
        $from = isset($slider_data['from']) && $slider_data['from'] > $min ? $slider_data['from'] : $min;
        $to = isset($slider_data['to']) && $slider_data['to'] < $max ? $slider_data['to'] : $max;
        return array('min' => $min, 'max' => $max, 'from' => $from, 'to' => $to);
    }

    public function getProductSorting($controller)
    {
        $submitted_sorting = array('by' => Tools::getValue('orderby'),'way' => Tools::getValue('orderway'));
        if ($this->is_17) {
            $order = explode('.', Tools::getValue('order'));
            if (count($order) == 3) {
                $submitted_sorting = array('by' => $order[1], 'way' => $order[2]);
            }
        }
        $specific_sorting = array(
            'newproducts' => array('by' => 'date_add', 'way' => 'desc'),
            'search' => array('by' => 'position', 'way' => 'desc'),
        );
        if (!$submitted_sorting['by'] && isset($specific_sorting[$controller])) {
            $product_sorting = $specific_sorting[$controller];
        } else {
            $product_sorting = array(
                'by' => Tools::getProductsOrder('by', $submitted_sorting['by']),
                'way' => Tools::getProductsOrder('way', $submitted_sorting['way']),
            );
        }
        $this->context->forced_sorting = $product_sorting;
        return $product_sorting;
    }

    public function getFilteringOptions($key)
    {
        $options = array();
        switch ($key) {
            case 'm':
            case 's':
                $resource = $key == 'm' ? 'manufacturer' : 'supplier';
                $options = $this->db->executeS('
                    SELECT '.pSQL($key).'.id_'.pSQL($resource).' as id, name
                    FROM '._DB_PREFIX_.pSQL($resource).' '.pSQL($key).'
                    '.Shop::addSqlAssociation($resource, $key).'
                    WHERE active = 1 ORDER BY name ASC
                ');
                break;
            case 't':
                $options = $this->db->executeS('
                    SELECT id_tag as id, name FROM '._DB_PREFIX_.'tag
                    WHERE id_lang = '.(int)$this->context->language->id.'
                    ORDER BY name ASC
                ');
                break;
            case 'q':
                $options = array(
                    'new' => array('id' => 'new', 'name' => $this->l('New')),
                    'used' => array('id' => 'used', 'name' => $this->l('Used')),
                    'refurbished' => array('id' => 'refurbished', 'name' => $this->l('Refurbished')),
                );
                break;
        }
        return $options;
    }

    public function displayHook($hook_name)
    {
        if (empty($this->general_settings)) {
            return;
        }
        $this->context->smarty->assign(array(
            'hook_name' => $hook_name,
        ));
        $html = $this->display(__FILE__, 'amazzingfilter.tpl');
        if ($this->general_settings['p_type'] > 1 && $hook_name != 'displayHome') {
            $html .= $this->display(__FILE__, 'dynamic-loading.tpl');
        }
        return $html;
    }

    public function sortByKey($array, $key)
    {
        $method_name = 'sortBy'.Tools::ucfirst($key);
        if (method_exists($this, $method_name)) {
            usort($array, array($this, $method_name));
        } elseif ($key == 'numbers_in_name') {
            foreach ($array as &$el) {
                $el['number'] = $this->extractNumberFromString($el['name']);
            }
            $array = $this->sortByKey($array, 'number');
        }
        return $array;
    }

    public function extractNumberFromString($string)
    {
        if ($replacements = $this->getNumReplacements()) {
            $string = str_replace(array_keys($replacements), $replacements, $string);
        }
        return (float)preg_replace('/[^0-9.]/', '', $string);
    }

    public function getNumReplacements()
    {
        if (!isset($this->num_replacements)) {
            $this->num_replacements = array();
            $standard_values = array('tho_sep' => '', 'dec_sep' => '.'); // tho before dec!
            foreach ($standard_values as $key => $standard_value) {
                if (!empty($this->general_settings[$key]) && $this->general_settings[$key] != $standard_value) {
                    $this->num_replacements[$this->general_settings[$key]] = $standard_value;
                }
            }
        }
        return $this->num_replacements;
    }


    public function sortByPosition($a, $b)
    {
        return $a['position'] - $b['position'];
    }

    public function sortById($a, $b)
    {
        return $a['id'] - $b['id'];
    }

    public function sortByNumber($a, $b)
    {
        return $a['number'] - $b['number'];
    }

    public function sortByName($a, $b)
    {
        return strcmp($a['name'], $b['name']);
    }

    public function defineFilterParams()
    {
        if (isset($this->params_defined)) {
            return $this->params_defined;
        }
        $this->params_defined = false;
        $controller = Tools::getValue('controller');
        if (Tools::getValue('controller') == 'jolisearch' && class_exists('AmbSearch')) {
            $controller = 'search';
            $this->use_jolisearch = 1;
        }
        $available_controllers = $this->getAvailableControllers(true);

        if (!isset($available_controllers[$controller])) {
            return false;
        }

        $this->id_cat_current = Tools::getValue('id_category', (int)$this->context->shop->getCategory());
        $this->controller_product_ids = array();
        if ($controller == 'category') {
            $current_filters = $this->db->getRow('
                SELECT t.template_filters as data, tl.data as lang, t.id_template
                FROM '._DB_PREFIX_.'af_templates t
                LEFT JOIN '._DB_PREFIX_.'af_templates_lang tl
                    ON tl.id_template = t.id_template
                    AND tl.id_shop = t.id_shop
                    AND tl.id_lang = '.(int)$this->context->language->id.'
                INNER JOIN '._DB_PREFIX_.'af_category_templates ct
                    ON ct.id_template = t.id_template
                    AND ct.id_shop = t.id_shop
                    AND (ct.id_category = '.(int)$this->id_cat_current.' OR ct.id_category = 0)
                WHERE t.active = 1
                AND t.template_controller = \''.pSQL($controller).'\'
                AND t.id_shop = '.(int)$this->context->shop->id.'
                ORDER BY ct.id_category DESC, t.id_template DESC
            ');
        } else {
            $current_filters = $this->db->getRow('
                SELECT t.template_filters as data, tl.data as lang, t.id_template
                FROM '._DB_PREFIX_.'af_templates t
                LEFT JOIN '._DB_PREFIX_.'af_templates_lang tl
                    ON tl.id_template = t.id_template
                    AND tl.id_shop = t.id_shop
                    AND tl.id_lang = '.(int)$this->context->language->id.'
                WHERE active = 1
                AND t.template_controller = \''.pSQL($controller).'\'
                AND t.id_shop = '.(int)$this->context->shop->id.'
            ');
        }
        if (empty($current_filters['data'])) {
            return false;
        } elseif ($controller != 'category') {
            switch ($controller) {
                case 'pricesdrop':
                case 'bestsales':
                case 'newproducts':
                    $this->controller_product_ids = $this->getSpecialControllerIds($controller);
                    break;
                case 'search':
                    $q_name = $this->is_17 ? 's' : 'search_query';
                    if ($query = Tools::getValue($q_name, Tools::getValue('ref'))) {
                        $query = Tools::replaceAccentedChars(urldecode($query));
                        if (isset($this->use_jolisearch)) {
                            $abjolisearchmodule = Module::getInstanceByName('ambjolisearch');
                            $searcher = new AmbSearch(true, $this->context, $abjolisearchmodule);
                            $searcher->search($this->context->language->id, $query, 1, -1, 'position', 'desc');
                            $ids = $searcher->getResultIds();
                            foreach ($ids as $id) {
                                $this->controller_product_ids[] = $id;
                            }
                        } else {
                            $this->context->properties_not_required = 1;
                            $search = Search::find($this->context->language->id, $query, 1, 100000);
                            $this->context->properties_not_required = 0;
                            foreach ($search['result'] as $product) {
                                $this->controller_product_ids[] = $product['id_product'];
                            }
                        }
                    } elseif ($tag = Tools::getValue('tag')) {
                        $products = $this->db->executeS('
                            SELECT pt.id_product
                            FROM '._DB_PREFIX_.'tag t
                            INNER JOIN '._DB_PREFIX_.'product_tag pt
                                ON pt.id_tag = t.id_tag
                            '.Shop::addSqlAssociation('product', 'pt').'
                            WHERE t.name LIKE \'%'.pSQL($tag).'%\'
                            AND t.id_lang = '.(int)$this->context->language->id.'
                            AND product_shop.active = 1
                        ');
                        foreach ($products as $product) {
                            $this->controller_product_ids[] = $product['id_product'];
                        }
                    }
                    break;
                case 'manufacturer':
                case 'supplier':
                    if (!Tools::getValue('id_'.$controller)) {
                        return false;
                    }
                    break;
                case 'index':
                    if (!$this->is_17) {
                        $this->addCSS('product_list.css', _THEME_CSS_DIR_);
                    }
                    break;
            }
        }
        $data = Tools::jsonDecode($current_filters['data'], true);
        $data_lang = $current_filters['lang'] ? Tools::jsonDecode($current_filters['lang'], true) : array();
        $current_filters = array_merge_recursive($data, $data_lang);
        $this->current_controller = $controller;
        $this->general_settings = $this->getGeneralSettings();
        if ($controller != 'category') {
            $this->general_settings['subcat_products'] = 1;
        }
        $this->prepareTplVariables($current_filters);
        $this->params_defined = true;
        return true;
    }

    public function getSpecialControllerIds($controller)
    {
        $ids = $items = array();

        switch ($controller) {
            case 'newproducts':
                $now = date('Y-m-d H:i:s');
                $nb_days_new = Configuration::get('PS_NB_DAYS_NEW_PRODUCT');
                $items = $this->db->executeS('
                    SELECT id_product
                    FROM '._DB_PREFIX_.'product_shop
                    WHERE id_shop = '.(int)$this->context->shop->id.'
                    AND active = 1
                    AND DATEDIFF(\''.pSQL($now).'\', date_add) < '.(int)$nb_days_new.'
                ');
                break;
            case 'bestsales':
                $items = $this->db->executeS('
                    SELECT ps.id_product
                    FROM '._DB_PREFIX_.'product_sale ps
                    '.Shop::addSqlAssociation('product', 'ps').'
                    WHERE product_shop.active = 1
                    ORDER BY ps.quantity DESC
                ');
                break;
            case 'pricesdrop':
                $groups = $this->context->customer->getGroups();
                $imploded_groups = implode(', ', $groups);
                $items = $this->db->executeS('
                    SELECT sp.id_product
                    FROM '._DB_PREFIX_.'specific_price sp
                    '.Shop::addSqlAssociation('product', 'sp').'
                    WHERE product_shop.active = 1
                    AND from_quantity < 2
                    AND id_customer IN (0, '.(int)$this->context->customer->id.')
                    AND id_group IN (0, '.pSQL($imploded_groups).')
                    AND id_currency IN (0, '.(int)$this->context->cart->id_currency.')
                    AND (sp.from = "0000-00-00 00:00:00" OR sp.from < "'.date('Y-m-d G:i:s').'")
                    AND (sp.to = "0000-00-00 00:00:00" OR sp.to > "'.date('Y-m-d G:i:s').'")
                ');
                break;
        }
        foreach ($items as $i) {
            $ids[$i['id_product']] = $i['id_product'];
        }
        return $ids;
    }

    public function hookDisplayLeftColumn()
    {
        return $this->displayHook('displayLeftColumn');
    }

    public function hookDisplayRightColumn()
    {
        return $this->displayHook('displayRightColumn');
    }

    public function hookDisplayTopColumn()
    {
        return $this->displayHook('displayTopColumn');
    }

    public function hookDisplayAmazzingFilter()
    {
        return $this->displayHook('displayAmazzingFilter');
    }

    public function hookDisplayHome()
    {
        return $this->displayHook('displayHome');
    }

    /**
    * index Product when customer clicks save in 1.6
    * actionIndexProduct is defined in override/controllers/admin/AdminProductController.php
    */
    public function hookActionIndexProduct($params)
    {
        if (!empty($params['product'])) {
            $id_product = is_object($params['product']) ? $params['product']->id : $params['product'];
            // index products only in context shops if not defined otherwise
            $shop_ids = isset($params['shop_ids']) ? $params['shop_ids'] : Shop::getContextListShopID();
            $this->indexProduct((int)$id_product, false, $shop_ids);
        }
    }

    public function hookActionProductAdd($params)
    {
        return $this->hookActionProductUpdate($params);
    }

    public function hookActionProductUpdate($params)
    {
        // do not index product in 1.6 when regular product form is submitted. See comment for hookActionIndexProduct
        if (($this->is_17 || !Tools::isSubmit('submitted_tabs')) && !empty($params['id_product'])) {
            // this hook can be called anywhere, so make sure product is indexed for all shops if not defined otherwise
            $shop_ids = isset($params['shop_ids']) ? $params['shop_ids'] : Shop::getShops(false, null, true);
            $this->indexProduct((int)$params['id_product'], false, $shop_ids);
        }
    }

    public function hookActionObjectCombinationAddAfter($params)
    {
        // save this value for reindexing product after mass combinations generation in 1.6
        if (!$this->is_17 && empty($this->context->cookie->af_index_product)) {
            $this->context->cookie->__set('af_index_product', $params['object']->id_product);
        }
    }

    public function hookActionAdminTagsControllerSaveAfter()
    {
        $id_lang = Tools::getValue('id_lang');
        $id_tag = Tools::getValue('id_tag');
        $product_ids = Tools::getValue('products');
        $this->updateTagInIndex($id_lang, $id_tag, $product_ids);
    }

    public function hookActionAdminTagsControllerDeleteBefore($params)
    {
        // catch tag language before it is deleted and then update only index files with that language
        $id_tag = Tools::getValue('id_tag');
        $id_lang = (int)$this->db->getValue('
            SELECT id_lang FROM '._DB_PREFIX_.'tag
            WHERE id_tag = '.(int)$id_tag.'
        ');
        $this->context->tag_to_delete = array(
            'id_tag' => $id_tag,
            'id_lang' => $id_lang,
        );
    }

    public function hookActionAdminTagsControllerDeleteAfter($params)
    {
        if (!empty($this->context->tag_to_delete)) {
            $id_lang = $this->context->tag_to_delete['id_lang'];
            $id_tag = $this->context->tag_to_delete['id_tag'];
            $this->updateTagInIndex($id_lang, $id_tag);
        }
    }

    public function updateTagInIndex($id_lang, $id_tag, $product_ids = array())
    {
        // checking by isset is faster than in_array
        $product_ids = array_combine($product_ids, $product_ids);
        $index_files = glob($this->csv_dir.'*.csv');
        foreach ($index_files as $i_file) {
            $exploded_name = explode('_', basename($i_file));
            if ($exploded_name[2] != $id_lang) {
                continue;
            }
            $lines = file($i_file);
            $updated_lines = array();
            foreach ($lines as $line) {
                $line = trim($line);
                if (!$line) {
                    continue;
                }
                $line = explode('|', $line);
                $id = $line[0];
                $tags = explode(',', $line[15]);
                $tags = array_combine($tags, $tags);
                if (isset($product_ids[$id])) {
                    $tags[$id_tag] = $id_tag;
                } else {
                    unset($tags[$id_tag]);
                }
                $line[15] = implode(',', $tags);
                $updated_lines[$id] = implode('|', $line);
            }
            ksort($updated_lines);
            $updated_lines = implode("\n", $updated_lines);
            file_put_contents($i_file, $updated_lines);
        }
    }

    public function hookActionProductDelete($params)
    {
        if (!empty($params['product']->id)) {
            $id_product = $params['product']->id;
            $this->unindexProduct($id_product);
        }
    }

    public function hookActionProductListOverride($params)
    {
        if (!isset($this->products_data)) {
            return;
        }
        $params['hookExecuted'] = true;
        $params['catProducts'] = $this->products_data['products'];
        $params['nbProducts'] = $this->products_data['filtered_ids_count'];
    }

    public function getFeatures($id_lang, $id_group = false)
    {
        $f = $this->db->executeS('
            SELECT
            v.id_feature_value AS id,
            fl.name AS group_name,
            v.id_feature AS id_group,
            vl.value AS name
            FROM '._DB_PREFIX_.'feature_value v
            INNER JOIN '._DB_PREFIX_.'feature_value_lang vl
                ON (v.id_feature_value = vl.id_feature_value AND vl.id_lang = '.(int)$id_lang.')
            INNER JOIN '._DB_PREFIX_.'feature f
                ON f.id_feature = v.id_feature
            INNER JOIN '._DB_PREFIX_.'feature_lang fl
                ON (fl.id_feature = v.id_feature AND fl.id_lang = '.(int)$id_lang.')
            '.($id_group ? ' AND v.id_feature = '.(int)$id_group : '').'
            ORDER BY vl.value
        ');
        return $f;
    }

    public function getAttributes($id_lang, $id_group = false)
    {
        $a = $this->db->executeS('
            SELECT
            DISTINCT a.id_attribute AS id,
            a.position,
            al.name,
            a.color,
            ag.id_attribute_group AS id_group,
            agl.public_name AS group_name,
            ag.is_color_group
            FROM '._DB_PREFIX_.'attribute_group ag
            INNER JOIN '._DB_PREFIX_.'attribute_group_lang agl
                ON (ag.id_attribute_group = agl.id_attribute_group AND agl.id_lang = '.(int)$id_lang.')
            INNER JOIN '._DB_PREFIX_.'attribute a
                ON a.id_attribute_group = ag.id_attribute_group
            INNER JOIN '._DB_PREFIX_.'attribute_lang al
                ON (a.id_attribute = al.id_attribute AND al.id_lang = '.(int)$id_lang.')
            '.Shop::addSqlAssociation('attribute_group', 'ag').'
            '.Shop::addSqlAssociation('attribute', 'a').'
            WHERE a.id_attribute IS NOT NULL AND al.name IS NOT NULL AND agl.id_attribute_group IS NOT NULL
            '.($id_group ? ' AND ag.id_attribute_group = '.(int)$id_group : '').'
            ORDER BY al.name
        ');
        return $a;
    }

    public function generateLink($string, $identifier = '')
    {
        if (!isset($this->generated_links[$string])) {
            $link = Tools::str2url($string);
            $this->generated_links[$string] = $link;
            if (!$link && $identifier) {
                $link = $identifier;
            }
        } else {
            $link = $this->generated_links[$string];
            // add identifier in order to avoid possible duplicates
            if ($identifier) {
                $link = $identifier.($link ? '-'.$link : '');
            }
        }
        return $link;
        // $string = Tools::str2url($string);
        // $string = mb_strtolower(preg_replace('/[ \/\:\,\#\!\@]+/', '-', trim($string)));
        // $string = preg_replace('/[^\p{L}\p{N}\_]/u', '', $string);
        // return $string;
    }

    public function ajaxEraseIndex()
    {
        $id_shop = Tools::getValue('id_shop');
        $deleted = $this->eraseIndexationData($id_shop);
        $indexation_data = $this->getIndexationData(true);
        $missing = isset($indexation_data[$id_shop]['missing']) ? $indexation_data[$id_shop]['missing']: 0;
        $ret = array(
            'deleted' => $deleted,
            'missing' => $missing,
        );
        exit(Tools::jsonEncode($ret));
    }

    public function eraseIndexationData($id_shop)
    {
        $deleted = true;
        $index_files = glob($this->csv_dir.'*.csv');
        foreach ($index_files as $file) {
            $name = basename($file);
            $name = explode('_', $name);
            if ($name[1] == $id_shop) {
                $deleted &= unlink($file);
            }
        }
        return $deleted;
    }

    public function ajaxRunProductIndexer()
    {
        $indexation_data = $this->getIndexationData();
        foreach ($indexation_data as $id_shop => $data) {
            if (!empty($data['missing'])) {
                $product_ids = array_slice($data['missing'], 0, 50);
                foreach ($product_ids as $id_product) {
                    $this->indexProduct($id_product, true, array($id_shop));
                }
                break;
            }
        }
        $ret = array(
            'indexation_data' => $this->getIndexationData(true)
        );
        exit(Tools::jsonEncode($ret));
    }

    public function indexProduct($id, $file_append = false, $shop_ids = array())
    {
        if (empty($this->context->currency)) {
            $this->context->currency = new Currency(Configuration::get('PS_CURRENCY_DEFAULT'));
        }
        if (empty($this->context->employee) && empty($this->context->cart)) {
            $this->context->cart = new Cart();
        }
        $original_shop_context = Shop::getContext();
        $original_shop_context_id = null;
        if ($original_shop_context == Shop::CONTEXT_GROUP) {
            $original_shop_context_id = $this->context->shop->id_shop_group;
        } elseif ($original_shop_context == Shop::CONTEXT_SHOP) {
            $original_shop_context_id = $this->context->shop->id;
        }
        $original_currency_id = $this->context->currency->id;

        $shop_ids = $shop_ids ? $shop_ids : Shop::getContextListShopID();
        if (!$shop_ids) {
            $shop_ids = array($this->context->shop->id);
        }
        foreach ($shop_ids as $id_shop) {
            Shop::setContext(Shop::CONTEXT_SHOP, $id_shop);
            $product = new Product($id, false, false, $id_shop);
            if (!$product->active || $product->visibility == 'none') {
                $this->unindexProduct($id, $id_shop);
                continue;
            }

            // prepare categories
            $cat_ids = $not_checked_parents = array();
            $product_categories = $this->db->executeS('
                SELECT id_category FROM '._DB_PREFIX_.'category_product
                WHERE id_product = '.(int)$id.' AND id_category > 0
            ');
            foreach ($product_categories as $c) {
                $id_cat = $c['id_category'];
                $cat_ids[$id_cat] = $id_cat;
                $category_obj = new Category($id_cat);
                $parents = $category_obj->getParentsCategories();
                foreach ($parents as $parent) {
                    $id_parent = $parent['id_category'];
                    if (!isset($cat_ids[$id_parent])) {
                        $not_checked_parents[$id_parent] = $id_parent;
                    }
                }
            }

            $groups_having_access = array();
            if ($cat_ids) {
                $imploded_cat_ids = implode(', ', $cat_ids);
                $groups_db = $this->db->executeS('
                    SELECT id_group FROM '._DB_PREFIX_.'category_group
                    WHERE id_category IN ('.pSQL($imploded_cat_ids).')
                ');
                foreach ($groups_db as $g) {
                    $groups_having_access[$g['id_group']] = $g['id_group'];
                }
            }

            // prepare attributes
            $atts = $this->db->executeS('
                SELECT pac.id_attribute
                FROM '._DB_PREFIX_.'product_attribute_combination pac
                INNER JOIN '._DB_PREFIX_.'product_attribute pa
                    ON pa.id_product_attribute = pac.id_product_attribute
                INNER JOIN '._DB_PREFIX_.'product_attribute_shop pas
                    ON pas.id_product_attribute = pa.id_product_attribute AND pas.id_shop = '.(int)$id_shop.'
                WHERE pa.id_product = '.(int)$product->id.'
                GROUP BY id_attribute
            ');
            $all_att_ids = array();
            foreach ($atts as $att) {
                $all_att_ids[$att['id_attribute']] = $att['id_attribute'];
            }
            // in some cases cache_default_attribute is out of date, so we force update
            Product::updateDefaultAttribute($product->id);

            // prepare features
            $feats = $this->db->executeS('
                SELECT id_feature_value
                FROM '._DB_PREFIX_.'feature_product
                WHERE id_product = '.(int)$product->id.'
            ');
            $all_feat_ids = array();
            foreach ($feats as $feat) {
                $all_feat_ids[$feat['id_feature_value']] = $feat['id_feature_value'];
            }

            // prepare suppliers // no need to consider id_shop here
            $suppliers = $this->db->executeS('
                SELECT id_supplier
                FROM '._DB_PREFIX_.'product_supplier
                WHERE id_product = '.(int)$product->id.'
            ');
            $all_supp_ids = array();
            foreach ($suppliers as $supp) {
                $all_supp_ids[$supp['id_supplier']] = $supp['id_supplier'];
            }

            // prepare prices
            $available_customer_groups = Group::getGroups($this->context->language->id);
            $currency_list = Currency::getCurrencies(false, 1, new Shop($id_shop));
            foreach ($currency_list as $currency) {
                $id_currency = $currency['id_currency'];
                $this->context->currency = new Currency($id_currency);

                // complex prices for different customer groups
                $customer_id = $this->db->getValue('
                    SELECT id_customer FROM '._DB_PREFIX_.'customer WHERE deleted = 0
                ');
                $this->context->customer = new Customer($customer_id);
                $prices = array();
                $initial_customer_group = $this->context->customer->id_default_group;
                foreach ($available_customer_groups as $g) {
                    $this->context->customer->id_default_group = $g['id_group'];
                    $use_tax = !$g['price_display_method'];
                    $precision = defined('_PS_PRICE_COMPUTE_PRECISION_') ? (int)_PS_PRICE_COMPUTE_PRECISION_ : 2;
                    $prices[$g['id_group']] = Tools::ps_round($product->getPrice($use_tax), $precision);
                }
                $this->context->customer->id_default_group = $initial_customer_group;

                $languages = Language::getLanguages(false, $id_shop);
                foreach ($languages as $lang) {
                    $image = $product->getCover($id);
                    $name = Tools::substr($this->generateLink($product->name[$lang['id_lang']]), 0, 50);
                    $reference = Tools::substr($this->generateLink($product->reference), 0, 50);
                    $weight = $this->getProductWeight($id, $id_shop);
                    // prepare tags for current language
                    $tags = $this->db->executeS('
                        SELECT t.id_tag FROM '._DB_PREFIX_.'tag t
                        INNER JOIN '._DB_PREFIX_.'product_tag pt
                            ON (pt.id_tag = t.id_tag AND pt.id_product = '.(int)$id.')
                        WHERE t.id_lang = '.(int)$lang['id_lang'].'
                    ');
                    $all_tag_ids = array();
                    foreach ($tags as $t) {
                        $all_tag_ids[] = $t['id_tag'];
                    }
                    $product_line = $name.'|'.
                                    $reference.'|'.
                                    implode(',', $cat_ids).'|'.
                                    implode(',', $not_checked_parents).'|'.
                                    implode(',', $all_att_ids).'|'.
                                    $product->id_manufacturer.'|'.
                                    implode(',', $all_supp_ids).'|'.
                                    $weight.'|'.
                                    $image['id_image'].'|'.
                                    implode(',', $all_feat_ids).'|'.
                                    Tools::jsonEncode($prices).'|'.
                                    $product->date_add.'|'.
                                    $product->date_upd.'|'.
                                    implode(',', $groups_having_access).'|'.
                                    $product->visibility.'|'.
                                    implode(',', $all_tag_ids).'|'.
                                    $product->condition;
                                    // d(explode('|', $product_line));
                    $csvpath = 'index_'.$id_shop.'_'.$lang['id_lang'].'_'.$id_currency.'.csv';
                    if (!$file_append) {
                        $this->updateIndexFile($this->csv_dir.$csvpath, $id, $product_line);
                    } else {
                        file_put_contents($this->csv_dir.$csvpath, $id.'|'.$product_line."\n", FILE_APPEND);
                    }
                }
            }
        }

        // changing context values back to initial state
        Shop::setContext($original_shop_context, $original_shop_context_id);
        $this->context->currency = new Currency($original_currency_id);

        return $id;
    }

    public function getProductWeight($id_product, $id_shop)
    {
        if ($ipa = Product::getDefaultAttribute($id_product)) {
            $weight = $this->db->getValue('
                SELECT SUM(p.weight + pas.weight)
                FROM '._DB_PREFIX_.'product p
                LEFT JOIN  '._DB_PREFIX_.'product_attribute pa
                    ON (pa.id_product = p.id_product AND pa.id_product_attribute = '.(int)$ipa.')
                LEFT JOIN '._DB_PREFIX_.'product_attribute_shop pas
                    ON (pas.id_product_attribute = pa.id_product_attribute AND pas.id_shop = '.(int)$id_shop.')
                WHERE p.id_product = '.(int)$id_product.'
            ');
        } else {
            $weight = $this->db->getValue('
                SELECT weight FROM '._DB_PREFIX_.'product WHERE id_product = '.(int)$id_product.'
            ');
        }
        return (float)$weight;
    }

    public function updateIndexFile($csvpath, $id_product, $product_line = false)
    {
        $lines = array();
        if (file_exists($csvpath)) {
            foreach (file($csvpath) as $line) {
                $lines[current(explode('|', $line))] = $line;
            }
        }
        if ($product_line) {
            $lines[$id_product] = $id_product.'|'.$product_line."\n";
        } else {
            unset($lines[$id_product]);
        }
        ksort($lines);
        return file_put_contents($csvpath, implode('', $lines));
    }

    public function unindexProduct($id_product, $id_product_shop = false)
    {
        if ($id_product_shop) {
            $shops = array($id_product_shop);
        } else {
            $shops = Shop::getShops(false, null, true);
        }
        foreach ($shops as $id_shop) {
            foreach (Currency::getCurrencies(false, 1, new Shop($id_shop)) as $currency) {
                foreach (Language::getLanguages(false, $id_shop) as $lang) {
                    $csvpath = 'index_'.$id_shop.'_'.$lang['id_lang'].'_'.$currency['id_currency'].'.csv';
                    $this->updateIndexFile($this->csv_dir.$csvpath, $id_product, false);
                }
            }
        }
    }

    public function assignSmartyVariablesForPagination($page, $products_num, $products_per_page, $pages_nb)
    {
        $siblings = 2; // 2 pages before and after active page in pagination
        $this->context->smarty->assign(array(
            'current_url' => '',
            'p'           => $page,
            'start'       => ($page - $siblings > 1) ? $page-$siblings : 1,
            'stop'        => ($page + $siblings < $pages_nb) ? $page+$siblings : $pages_nb,
            'pages_nb'    => $pages_nb,
            'nb_products' => $products_num,
            'n'           => $products_per_page,
            'products_per_page' => $products_per_page,
        ));
    }

    public function ajaxGetFilteredProducts($params)
    {
        $this->current_controller = $params['current_controller'];
        $products_data = $this->getFilteredProducts($params);
        // add colorlist
        $this->context->controller->addColorsToProductList($products_data['products']);
        $this->context->smarty->assign(array(
            'products' => $products_data['products'],
            'class' => $this->product_list_class,
            'page_name' => $params['page_name'],
            'link' => $this->context->link,
        ));
        if (!$this->is_17) {
            $this->context->smarty->assign(array(
                'hide_left_column' => $params['hide_left_column'],
                'hide_right_column' => $params['hide_right_column'],
            ));
        }

        // assign smarty variables for pagination
        $page = $products_data['page'];
        $products_num = $products_data['filtered_ids_count'];
        $products_per_page = $products_data['products_per_page'];
        $pages_nb = $products_per_page ? ceil($products_num/$products_per_page) : 0;

        $ret = array(
            'product_count_text' => utf8_encode($products_data['product_count_text']),
            'count_data' => $products_data['count_data'],
            'ranges' => $products_data['ranges'],
            'products_num' => $products_num,
            'params' => $params,
            'time' => $products_data['time'],
            'hide_load_more_btn' => $products_data['hide_load_more_btn'],
        );

        if ($this->is_17) {
            Hook::exec('actionProductSearchAfter', array('products' => $products_data['products']));
            $current_url = Tools::getValue('current_url');
            $current_sorting_option = 'product.'.$params['orderBy'].'.'.$params['orderWay'];
            $options = $this->getSortingOptions($current_sorting_option);
            $current_label = isset($options[$current_sorting_option]['label']) ?
            $options[$current_sorting_option]['label'] : '';
            $this->context->smarty->assign(array(
                'listing' => array(
                    'products' => $products_data['products'],
                    'pagination' => $this->getPaginationVariables(
                        $page,
                        $products_num,
                        $products_per_page,
                        $pages_nb,
                        $current_url
                    ),
                    'sort_orders' => $options,
                    'sort_selected' => $current_label,
                    'static_token' => Tools::getToken(false),
                    'urls' => array(
                        'pages'=>array(
                            'cart' => $this->context->link->getPageLink('cart', $this->context->controller->ssl)
                        ),
                    ),
                ),
            ));
            $tpl_path = _PS_THEME_DIR_.'templates/catalog/_partials/';
            $product_list_html = $this->context->smarty->fetch($tpl_path.'products.tpl');
            $product_list_top_html = $this->context->smarty->fetch($tpl_path.'products-top.tpl');
            $product_list_bottom_html = $this->context->smarty->fetch($tpl_path.'products-bottom.tpl');
            $ret['product_list_top_html'] = utf8_encode($product_list_top_html);
            $ret['product_list_bottom_html'] = utf8_encode($product_list_bottom_html);
        } else {
            $product_list_html = $this->context->smarty->fetch(_PS_THEME_DIR_.'product-list.tpl');
            $this->assignSmartyVariablesForPagination($page, $products_num, $products_per_page, $pages_nb);
            $pagination_html = $this->context->smarty->fetch(_PS_THEME_DIR_.'pagination.tpl');
            $this->context->smarty->assign('paginationId', $params['pagination_bottom_suffix']);
            $pagination_bottom_html = $this->context->smarty->fetch(_PS_THEME_DIR_.'pagination.tpl');
            $ret['pagination_html'] = utf8_encode($pagination_html);
            $ret['pagination_bottom_html'] = utf8_encode($pagination_bottom_html);
        }
        if (!$products_num) {
            $product_list_html = $this->display(__FILE__, 'views/templates/front/no-products.tpl');
        }
        $ret['product_list_html'] = utf8_encode($product_list_html);
        exit(Tools::jsonEncode($ret));
    }

    public function addStockShopAssociaton($id_shop, $id_shop_group, $prefix = 'sa')
    {
        $shared_stock = $this->db->getValue('
            SELECT share_stock FROM '._DB_PREFIX_.'shop_group
            WHERE id_shop_group = '.(int)$id_shop_group.'
        ');
        if ($shared_stock) {
            $assoc = pSQL($prefix).'.id_shop_group = '.(int)$id_shop_group;
        } else {
            $assoc = pSQL($prefix).'.id_shop = '.(int)$id_shop;
        }
        return $assoc;
    }

    public function sliderIsTriggered($slider)
    {
        $slider = $this->fillSliderValues($slider);
        return $slider['from'] > $slider['min'] || $slider['to'] < $slider['max'];
    }

    public function getFilteredProducts($params)
    {
        $start_time = microtime(true);
        $id_lang = $this->context->language->id;
        $id_shop = $this->context->shop->id;
        $id_shop_group = $this->context->shop->id_shop_group;
        $id_currency = $this->context->currency->id;
        $trigger = Tools::getValue('trigger', 'af_page');
        $to_count_additionally = array();
        $filter_identifiers = array('c', 'a', 'f', 'm', 's', 't', 'q', 'p', 'w');

        // define "or" params basing on primary_filter
        if (!empty($params['primary_filter'])) {
            $primary_filter = $params['primary_filter'];
            $first_char = Tools::substr($primary_filter, 0, 1);
            $or_id = Tools::substr($params['primary_filter'], 1);
            if (in_array($first_char, $filter_identifiers)) {
                if (!empty($params[$first_char][$or_id])) {
                    $params['or-'.$first_char][$or_id] = $params[$first_char][$or_id];
                    unset($params[$first_char][$or_id]);
                } elseif (!empty($params[$primary_filter])) {
                    $params['or-'.$primary_filter] = $params[$primary_filter];
                    unset($params[$primary_filter]);
                }
                $key_for_additional_params = $first_char;
                if ((int)$or_id > 0) {
                    $key_for_additional_params .= (int)$or_id;
                }
                if (!empty($params['available_options'][$key_for_additional_params])) {
                    $to_count_additionally = $params['available_options'][$key_for_additional_params];
                    if (!is_array($to_count_additionally)) {
                        $to_count_additionally = explode(',', $to_count_additionally);
                    }
                    $to_count_additionally = array_flip($to_count_additionally);
                }
            }
        }

        if (!empty($params['numeric_slider_values'])) {
            foreach ($params['numeric_slider_values'] as $identifier => $values) {
                if (!isset($params['sliders'][$identifier])) {
                    continue;
                }
                $slider = $params['sliders'][$identifier];
                if ($this->sliderIsTriggered($slider)) {
                    $values = is_array($values) ? $values : explode(',', $values);
                    $ids = $params['available_options'][$identifier];
                    $ids = is_array($ids) ? $ids : explode(',', $ids);
                    $numeric_values = array_combine($ids, $values);
                    $first_char = Tools::substr($identifier, 0, 1);
                    $id_group = Tools::substr($identifier, 1);
                    foreach ($numeric_values as $id => $number) {
                        $possible_range = $this->explodeRangeValue($number);
                        if ($possible_range[1] >= $slider['from'] && $possible_range[0] <= $slider['to']) {
                            $params[$first_char][$id_group][] = $id;
                        }
                    }
                    if (empty($params[$first_char][$id_group])) {
                        $params[$first_char][$id_group][] = 'none'; // no available options within selected range
                    }
                }
            }
        }

        // remove 0 options obtained from selects
        foreach (array('', 'or-') as $prefix) {
            foreach ($filter_identifiers as $i) {
                $i = $prefix.$i;
                if (!empty($params[$i])) {
                    if (isset($params[$i][0])) {
                        if (!$params[$i][0]) {
                            unset($params[$i]);
                        }
                    } else {
                        foreach (array_keys($params[$i]) as $id_group) {
                            if (!$params[$i][$id_group][0]) {
                                unset($params[$i][$id_group]);
                            }
                        }
                    }
                    if (empty($params[$i])) {
                        unset($params[$i]);
                    }
                }
            }
        }

        $selected_atts = isset($params['a']) ? $params['a'] : array();
        if (isset($params['or-a'])) {
            $selected_atts += $params['or-a'];
        }
        foreach ($selected_atts as $id_group => $atts) {
            $selected_atts[$id_group] = array_combine($atts, $atts);
        }
        ksort($selected_atts);
        $check_stock = !empty($params['combinations_stock']);
        $check_existence = !empty($params['combinations_existence']) && $selected_atts;
        if ($selected_atts && !empty($params['combination_results'])) {
            $this->selected_combinations = array();
        }

        //sorting data
        $order_by = $params['orderBy'];
        $order_way = $params['orderWay'];
        if (!in_array($order_way, array('asc', 'desc'))) {
            $order_way = 'asc';
        }

        // Default sorting in 1.6 is displayed as '-' but submitted as order_by.order_way for all controllers
        // it has to be treated in a special way for some selected controllers
        if (!$this->is_17 && $order_by.':'.$order_way == $params['defaultSorting']) {
            if ($params['current_controller'] == 'search') {
                $order_by = 'position';
                $order_way = 'desc';
            } elseif ($params['current_controller'] == 'newproducts') {
                $order_by = 'date_add';
                $order_way = 'desc';
            } elseif ($params['current_controller'] == 'pricesdrop') {
                $order_by = 'price';
                $order_way = 'asc';
            }
        }

        // sorting by position is reverse in search results
        if ($params['current_controller'] == 'search' && $order_by == 'position') {
            $order_way = $order_way == 'asc' ? 'desc' : 'asc';
        }

        if (!$params['controller_product_ids']) {
            $cpids = array();
        } else {
            $cpids = explode(',', $params['controller_product_ids']);
        }

        if ($order_by == 'position') {
            $all_positions = array();
            if (!empty($cpids)) {
                foreach ($cpids as $k => $id) {
                    $all_positions[$id] = $k + 1;
                }
            } else {
                $position_id_cat = $params['id_parent_cat'];
                // if only 1 category is checked, sort by positions in that category
                // TODO: add compatibility with top level category blocks (e.g. c31)
                foreach (array('or-c', 'c') as $k) {
                    if (!empty($params[$k])) {
                        foreach ($params[$k] as $categories) {
                            if (count($categories) == 1) {
                                $position_id_cat = current($categories);
                                break;
                            }
                        }
                    }
                }
                $raw_data = $this->db->executeS('
                    SELECT * FROM '._DB_PREFIX_.'category_product
                    WHERE id_category = '.(int)$position_id_cat.'
                ');
                foreach ($raw_data as $d) {
                    $all_positions[$d['id_product']] = $d['position'];
                }
            }
        } elseif ($order_by == 'manufacturer_name') {
            $raw_data = $this->db->executeS('
                SELECT id_manufacturer, name FROM '._DB_PREFIX_.'manufacturer WHERE active = 1
            ');
            $manufacturer_names = array();
            foreach ($raw_data as $d) {
                $manufacturer_names[$d['id_manufacturer']] = $d['name'];
            }
        }

        $params['controller_product_ids'] = array_combine($cpids, $cpids);

        // ranges
        $ranges = array('p' => array(), 'w' => array());
        $non_slider_ranges = array();
        foreach ($ranges as $identifier => $range) {
            $range['values'] = array();
            if ($range['is_slider'] = isset($params['sliders'][$identifier])) { // sliders
                $slider = $params['sliders'][$identifier];
                if ($this->sliderIsTriggered($slider)) {
                    $range['values'] = array(array($slider['from'], $slider['to']));
                }
            } elseif (isset($params['available_options'][$identifier])) { // range values
                if (isset($params[$identifier])) {
                    $range['values'] = $params[$identifier];
                } elseif (isset($params['or-'.$identifier])) {
                    $range['values'] = $params['or-'.$identifier];
                }
                foreach ($range['values'] as &$val) {
                    $val = $this->explodeRangeValue($val);
                }
                $range['step'] = isset($params[$identifier.'_range_step']) ? $params[$identifier.'_range_step'] : '';
                $non_slider_ranges[] = $identifier;
            } else {
                unset($ranges[$identifier]);
                continue;
            }
            $range['calculate_min_max'] = Tools::getValue('controller') != 'ajax';
            $ranges[$identifier] = $range;
        }

        if (!empty($params['in_stock'])) {
            $params['oos_behaviour'] = 2;
        }

        $index_path = $this->csv_dir.'index_'.$id_shop.'_'.$id_lang.'_'.$id_currency.'.csv';
        $products = file_exists($index_path) ? file($index_path): array();
        $filtered_ids = $move_to_the_end = $count_data = $all_matches = array();
        $sorted_products = $sorted_combinations = $sorted_qties = array();

        if ($check_stock || $check_existence) {
            $raw_data = $this->db->executeS('
                SELECT
                sa.id_product_attribute as id_comb,
                sa.quantity as qty,
                pac.id_attribute as id_att,
                sa.id_product,
                a.id_attribute_group as id_group
                FROM '._DB_PREFIX_.'stock_available sa
                INNER JOIN '._DB_PREFIX_.'product_shop ps
                    ON ps.id_product = sa.id_product AND ps.active = 1
                    AND ps.id_shop = '.(int)$id_shop.'
                LEFT JOIN '._DB_PREFIX_.'product_attribute_combination pac
                    ON pac.id_product_attribute = sa.id_product_attribute
                LEFT JOIN '._DB_PREFIX_.'attribute a
                    ON a.id_attribute = pac.id_attribute
                WHERE '.pSQL($this->addStockShopAssociaton($id_shop, $id_shop_group)).'
                '.($check_stock && $params['oos_behaviour'] > 1 ? ' AND sa.quantity > 0' : '').'
                ORDER BY pac.id_attribute ASC
            ');

            foreach ($raw_data as $d) {
                $sorted_qties[$d['id_product']][$d['id_comb']] = $d['qty'];
                if ($d['id_comb']) {
                    $sorted_combinations[$d['id_product']][$d['id_comb']][$d['id_group']] = $d['id_att'];
                }
            }
        }

        $special_ids = array();
        foreach (array_keys($this->getSpecialFilters()) as $s) {
            if ($s != 'in_stock' && !empty($params['available_options'][$s])) {
                $special_ids[$s] = $this->getSpecialControllerIds($s);
            }
        }

        $customer_groups = explode(',', $params['customer_groups']);
        $accepted_visibility = $params['current_controller'] == 'search' ? 'search' : 'catalog';
        $grouped_parameters = array('c', 'a', 'f');
        $ungrouped_parameters = array('m', 's', 't', 'q');
        $merged_parameters = array_merge($grouped_parameters, $ungrouped_parameters);

        foreach ($products as $k => $product_line) {
            $data = explode('|', trim($product_line));

            $visibility = $data[15];
            if ($visibility != 'both' && $visibility != $accepted_visibility) {
                continue; // visibility 'none' is excluded during indexation
            }

            $price = Tools::jsonDecode($data[11], true);
            if (is_array($price)) {
                $price = isset($price[$this->context->customer->id_default_group]) ?
                $price[$this->context->customer->id_default_group] : current($price);
            }

            $id = $data[0];
            $cats = $data[3];
            if ($params['subcat_products'] && !empty($data[4])) {
                $cats .= ','.$data[4];
            }
            $p = array(
                'id' => $id,
                'name' => $data[1],
                'reference' => $data[2],
                'c' => $cats ? explode(',', $cats) : array(), // cats
                'a' => $data[5] ? explode(',', $data[5]) : array(), // atts
                'm' => $data[6] ? explode(',', $data[6]) : array(), // same format for manufacturer
                's' => $data[7] ? explode(',', $data[7]) : array(), // suppliers
                'w' => $data[8], // weight
                'image' => $data[9],
                'f' => $data[10] ? explode(',', $data[10]) : array(), // feats
                'p' => (float)$price,
                'date_add' => $data[12],
                'date_upd' => $data[13],
                't' => $data[16] ? explode(',', $data[16]) : array(), // tags
                'q' => $data[17] ? explode(',', $data[17]) : array(), // same format for condition
            );

            if (!empty($data[14])) {
                $groups_having_access = explode(',', $data[14]);
                if (!array_intersect($groups_having_access, $customer_groups)) {
                    continue;
                }
            }

            // select only products that belong to parent category
            if (!in_array($params['id_parent_cat'], $p['c']) || !$this->checkControllerCompliance($params, $p)) {
                continue;
            }

            // special ids, for new product/bestsales etc
            foreach ($special_ids as $k => $ids) {
                if (!empty($params[$k]) && !isset($ids[$id])) {
                    continue 2;
                }
            }

            foreach ($grouped_parameters as $key) {
                // todo:: unset all_matches[c-...] if product was excluded because of OOS and no filters are selected
                foreach ($p[$key] as $param_id) {
                    $all_matches[$key.'-'.$param_id] = 1;
                }
                if (isset($params[$key])) {
                    foreach ($params[$key] as $options_in_group) {
                        if (!array_intersect($p[$key], $options_in_group)) {
                            continue 3;
                        }
                    }
                }
            }

            foreach ($ungrouped_parameters as $key) {
                if (isset($params[$key]) && !array_intersect($p[$key], $params[$key])) {
                    continue 2;
                }
            }

            // ----- exclude non-existant/out-of-stock combinations
            if ($check_stock || $check_existence) {
                $product_combinations = isset($sorted_combinations[$id]) ? $sorted_combinations[$id] : array();
                $p['qty'] = isset($sorted_qties[$id][0]) ? $sorted_qties[$id][0] : 0;
                $product_included = !$product_combinations && !$selected_atts &&
                ($params['oos_behaviour'] < 2 || $p['qty'] > 0);
                if ($check_stock && $product_combinations) {
                    $p['qty'] = 0;
                }
                $p['a'] = array();
                foreach ($product_combinations as $id_comb => $atts) {
                    foreach ($atts as $id_group => $id_att) {
                        foreach ($selected_atts as $id_group_selected => $att_ids_selected) {
                            if ($id_group_selected != $id_group && !array_intersect($att_ids_selected, $atts)) {
                                continue 2;
                            }
                        }
                        $p['a'][$id_att] = $id_att;
                        if (!$selected_atts || isset($selected_atts[$id_group][$id_att])) {
                            // other atts are already matching
                            $product_included = true;
                            if ($check_stock && isset($sorted_qties[$id][$id_comb])) {
                                $p['qty'] += $sorted_qties[$id][$id_comb];
                            }
                            foreach ($atts as $id_att) {
                                $p['a'][$id_att] = $id_att;
                            }
                            if (isset($this->selected_combinations) && !isset($this->selected_combinations[$id])) {
                                $this->selected_combinations[$id] = $id_comb;
                            }
                            // $p['id_product_attribute'] = $id_comb;
                            // $p['qty_current_combination'] = $sorted_qties[$id][$id_comb];
                            continue 2;
                        }
                    }
                }
                if ($p['qty'] < 1 && $params['oos_behaviour'] == 1) {
                    $move_to_the_end[$id] = $id;
                }
                if (!$product_included) {
                    continue;
                }
            }

            if (!$check_stock && ($params['oos_behaviour'] ||
                !empty($params['available_options']['in_stock']))) {
                $p['qty'] = $this->getProductQty($id, $id_shop, $id_shop_group);
                if ($p['qty'] < 1) {
                    if ($params['oos_behaviour'] == 2) {
                        continue;
                    } elseif ($params['oos_behaviour'] == 1) {
                        $move_to_the_end[$id] = $id;
                    }
                }
            }

            foreach ($ranges as $identifier => &$range) {
                if ($range['calculate_min_max']) {
                    if (!isset($range['max']) || $p[$identifier] > $range['max']) {
                        $range['max'] = $p[$identifier];
                    }
                    if (!isset($range['min']) || $p[$identifier] < $range['min']) {
                        $range['min'] = $p[$identifier];
                    }
                }
                if ($range['values']) {
                    $within_range = false;
                    foreach ($range['values'] as $from_to) {
                        if ($p[$identifier] >= $from_to[0] && $p[$identifier] <= $from_to[1]) {
                            $within_range = true;
                            break;
                        }
                    }
                    if (isset($params['or-'.$identifier])) {
                        $count_data[$identifier][$p[$identifier].''][$id] = $id;
                    }
                    if (!$within_range) {
                        continue 2;
                    }
                }
            }

            // additional matches for triggered criteria
            foreach ($grouped_parameters as $key) {
                if (isset($params['or-'.$key])) {
                    foreach ($p[$key] as $param_id) {
                        if (isset($to_count_additionally[$param_id])) {
                            $count_data[$key.'-'.$param_id][$id] = $id;
                        }
                    }
                    foreach ($params['or-'.$key] as $options_in_group) {
                        if (!array_intersect($p[$key], $options_in_group)) {
                            continue 3;
                        }
                    }
                    break; // only one 'or-...' is possible
                }
            }

            foreach ($ungrouped_parameters as $key) {
                if (isset($params['or-'.$key])) {
                    foreach ($p[$key] as $param_id) {
                        if (isset($to_count_additionally[$param_id])) {
                            $count_data[$key.'-'.$param_id][$id] = $id;
                        }
                    }
                    if (!array_intersect($p[$key], $params['or-'.$key])) {
                        continue 2;
                    }
                    break;
                }
            }

            foreach ($merged_parameters as $key) {
                foreach ($p[$key] as $param_id) {
                    $count_data[$key.'-'.$param_id][$id] = $id;
                }
            }
            foreach ($special_ids as $k => $ids) {
                if (isset($ids[$id])) {
                    $count_data[$k][$id] = $id;
                }
            }
            if (!empty($params['available_options']['in_stock']) && $p['qty'] > 0) {
                $count_data['in_stock'][$id] = $id;
            }
            foreach ($non_slider_ranges as $identifier) {
                $count_data[$identifier][$p[$identifier].''][$id] = $id;
            }

            $sorted_products[$id] = $p;
            $filtered_ids[$id] = $id;

            switch ($order_by) {
                case 'name':
                case 'date_add':
                case 'date_upd':
                case 'reference':
                    $filtered_ids[$id] = $p[$order_by];
                    break;
                case 'price':
                    $filtered_ids[$id] = $p['p'];
                    break;
                case 'quantity':
                    $filtered_ids[$id] = isset($p['qty']) ? $p['qty'] :
                    $this->getProductQty($id, $id_shop, $id_shop_group);
                    break;
                case 'position':
                    $filtered_ids[$id] = isset($all_positions[$id]) ? $all_positions[$id] : 'n';
                    break;
                case 'manufacturer_name':
                    $filtered_ids[$id] = isset($manufacturer_names[$p['m']]) ? $manufacturer_names[$p['m']] : '';
                    break;
            }
        }

        //sorting
        if ($order_way == 'asc') {
            asort($filtered_ids);
        } else {
            arsort($filtered_ids);
        }

        $filtered_ids = array_keys($filtered_ids);

        // instockfirst
        if ($params['oos_behaviour'] == 1 && $order_by != 'quantity') {
            $oos_ids = array();
            foreach ($filtered_ids as $pos => $id) {
                if (!empty($move_to_the_end[$id])) {
                    $oos_ids[] = $id;
                    unset($filtered_ids[$pos]);
                }
            }
            if (is_array($filtered_ids)) {
                $filtered_ids = array_merge($filtered_ids, $oos_ids);
            } else {
                $filtered_ids = $oos_ids;
            }
        }


        //pagination data
        $page_keepers = array('af_page', 'p_type');
        if (!empty($params['page']) && in_array($trigger, $page_keepers)) {
            $page = (int)$params['page'];
        } else {
            $page = 1;
        }

        $products_per_page = $params['nb_items'];
        $offset = ($page - 1) * $products_per_page;
        $length = $products_per_page;
        $ids = array_slice($filtered_ids, $offset, $length);
        if (isset($this->selected_combinations) && !$check_stock && !$check_existence) {
            $this->selected_combinations = $this->getSelectedCombinations($ids, $selected_atts);
        }
        $products_infos = $this->getProductsInfos($ids, $id_lang, $id_shop);

        // prepare data for ranged filters (price/weight)
        foreach ($ranges as $identifier => $r) {
            if (isset($r['step'])) {
                if ($range_options = $params['available_options'][$identifier]) {
                    $range_options = explode(',', $range_options);
                } else {
                    // available_options may be empty on first page load, because min/max were not known yet
                    // so we prepare range options here, basing on current min/max values
                    $range_options = $ranges[$identifier]['available_range_options'] = $this->getRangeOptions($r);
                }
                $exploded_range_options = array();
                foreach ($range_options as $range_option) {
                    $exploded_range_options[$identifier.'-'.$range_option] = explode('-', $range_option);
                }
                if (!empty($count_data[$identifier])) {
                    foreach ($count_data[$identifier] as $value => $ids) {
                        foreach ($exploded_range_options as $key => $opt) {
                            if ($value <= $opt[1] && $value >= $opt[0]) {
                                $count_data[$key] = (isset($count_data[$key]) ? $count_data[$key] : array()) + $ids;
                                break;
                            }
                        }
                    }
                    unset($count_data[$identifier]);
                }
            }
        }

        // count
        $count_data_numbers = array();
        foreach ($count_data as $k => $cd) {
            if ($cd) {
                $count_data_numbers[$k] = count($cd);
            }
        }

        $filtered_ids_count = count($filtered_ids);
        $product_count_text = '';
        if ($params['p_type'] > 1) {
            // load more btn
            $product_count_text = $this->l('Showing 1 - %1$d of %2$d items');
            $shown_products = $page * $products_per_page;
            if ($filtered_ids_count < $shown_products) {
                $shown_products = $filtered_ids_count;
            }
            $product_count_text = sprintf($product_count_text, $shown_products, $filtered_ids_count);
        }

        $ret = array (
            'filtered_ids_count' => $filtered_ids_count,
            'page' => $page,
            'products_per_page' => $products_per_page,
            'count_data' => $count_data_numbers,
            'count_data_full' => $count_data, // this variable may be required in overrides
            'all_matches' => $all_matches,
            'ranges' => $ranges,
            'trigger' => $trigger,
            'params' => $params,
            'time' => microtime(true) - $start_time,
            'products' => $products_infos,
            'hide_load_more_btn' => ($params['p_type'] > 1) && ($offset + $length >= $filtered_ids_count),
            'product_count_text' => $product_count_text,
        );
        // d(microtime(true) - $start_time);
        return $ret;
    }

    public function getRangeOptions($range_data)
    {
        $range_options = array();
        $min = isset($range_data['min']) ? floor($range_data['min']) : 0;
        $max = isset($range_data['max']) ? ceil($range_data['max']) : 0;
        $step = $range_data['step'];
        if (Tools::strpos($step, ',') !== false) {
            $step = str_replace(array('min', 'max'), array($min, $max), $step);
            $custom_options = explode(',', $step);
            foreach ($custom_options as $option) {
                $range_options[] = implode('-', $this->explodeRangeValue($option));
            }
        } else {
            $step = (int)$step ? (int)$step : 100;
            for ($i = 0; $i < $max; $i += $step) {
                $to = $i + $step;
                if ($to < $min) {
                    continue;
                }
                if ($to > $max) {
                    $to = $max;
                }
                $from = count($range_options) ? $i : $min;
                $range_options[$i] = $from.'-'.$to;
            }
        }
        return $range_options;
    }

    public function explodeRangeValue($value)
    {
        $value = explode('-', $value);
        $from = (float)$value[0];
        $to = isset($value[1]) ? (float)$value[1] : $from;
        return array($from, $to);
    }

    public function getProductQty($id, $id_shop, $id_shop_group)
    {
        if (!isset($this->qty_data)) {
            $this->qty_data = array();
            $raw_data = $this->db->executeS('
                SELECT
                sa.id_product,
                sa.quantity as qty
                FROM '._DB_PREFIX_.'stock_available sa
                INNER JOIN '._DB_PREFIX_.'product_shop ps
                    ON ps.id_product = sa.id_product AND ps.active = 1
                    AND ps.id_shop = '.(int)$id_shop.'
                WHERE sa.id_product_attribute = 0
                AND '.$this->addStockShopAssociaton($id_shop, $id_shop_group).'
            ');
            foreach ($raw_data as $d) {
                $this->qty_data[$d['id_product']] = $d['qty'];
            }
        }
        $qty = isset($this->qty_data[$id]) ? $this->qty_data[$id] : Product::getRealQuantity($id);
        return $qty;
    }

    public function getSelectedCombinations($product_ids, $selected_atts)
    {
        $selected_combinations = $att_ids = $sorted_combinations = array();
        if (!$product_ids || !$selected_atts) {
            return $selected_combinations;
        }
        $selected_groups_count = count($selected_atts);
        foreach ($selected_atts as $atts) {
            $att_ids += $atts;
        }
        $imploded_att_ids = implode(', ', $att_ids);
        $imploded_product_ids = implode(', ', $product_ids);
        $raw_data = $this->db->executeS('
            SELECT pac.id_attribute, pac.id_product_attribute as id_comb, pa.id_product
            FROM '._DB_PREFIX_.'product_attribute_combination pac
            LEFT JOIN '._DB_PREFIX_.'product_attribute pa
                ON pa.id_product_attribute = pac.id_product_attribute
            WHERE pa.id_product IN ('.pSQL($imploded_product_ids).')
            AND pac.id_attribute IN ('.pSQL($imploded_att_ids).')
        ');
        foreach ($raw_data as $d) {
            $sorted_combinations[$d['id_product']][$d['id_comb']][$d['id_attribute']] = $d['id_attribute'];
        }
        foreach ($sorted_combinations as $id_product => $combinations) {
            foreach ($combinations as $id_comb => $atts) {
                if (!isset($selected_combinations[$id_product]) && count($atts) == $selected_groups_count) {
                    $selected_combinations[$id_product] = $id_comb;
                }
            }
        }
        return $selected_combinations;
    }

    public function getProductsInfos($ids, $id_lang, $id_shop)
    {
        if (!$ids) {
            return array();
        }
        $products_infos = array();
        $now = date('Y-m-d H:i:s');
        $nb_days_new = Configuration::get('PS_NB_DAYS_NEW_PRODUCT');
        $imploded_ids = implode(', ', $ids);
        $products_data = $this->db->executeS('
            SELECT p.*, product_shop.*, pl.*, image.id_image, il.legend, m.name AS manufacturer_name,
            DATEDIFF(\''.pSQL($now).'\', p.date_add) < '.(int)$nb_days_new.' AS new
            FROM '._DB_PREFIX_.'product p
            '.Shop::addSqlAssociation('product', 'p').'
            INNER JOIN '._DB_PREFIX_.'product_lang pl
                ON (pl.id_product = p.id_product'.Shop::addSqlRestrictionOnLang('pl').'
                AND pl.id_lang = '.(int)$id_lang.')
            LEFT JOIN '._DB_PREFIX_.'image image
                ON (image.id_product = p.id_product AND image.cover = 1)
            LEFT JOIN '._DB_PREFIX_.'image_lang il
                ON (il.id_image = image.id_image AND il.id_lang = '.(int)$id_lang.')
            LEFT JOIN '._DB_PREFIX_.'manufacturer m
                ON m.id_manufacturer = p.id_manufacturer
            WHERE p.id_product IN ('.pSQL($imploded_ids).')
        ');
        $positions = array_flip($ids);
        if ($this->is_17) {
            $factory = new ProductPresenterFactory($this->context, new TaxConfiguration());
            $factory_presenter = $factory->getPresenter();
            $factory_settings = $factory->getPresentationSettings();
            $lang_obj = new Language($id_lang);
        }
        if (!empty($this->selected_combinations)) {
            $imploded_combination_ids = implode(', ', $this->selected_combinations);
            $combination_images = $this->db->executeS('
                SELECT i.id_product, i.id_image, il.legend
                FROM '._DB_PREFIX_.'image i
                INNER JOIN '._DB_PREFIX_.'product_attribute_image pai
                    ON (pai.id_image = i.id_image
                    AND pai.id_product_attribute IN ('.pSQL($imploded_combination_ids).'))
                LEFT JOIN '._DB_PREFIX_.'image_lang il
                    ON (il.id_image = i.id_image AND il.id_lang = '.(int)$id_lang.')
                WHERE i.id_product IN ('.pSQL($imploded_ids).')
            ');
            $updated_images = array();
            foreach ($combination_images as $c) {
                $updated_images[$c['id_product']] = array($c['id_image'], $c['legend']);
            }
        }
        foreach ($products_data as $pd) {
            $id_product = $pd['id_product'];

            // oos data is kept updated in stock_available table
            // joining this table in query significantly increases time if there are many $ids
            $pd['out_of_stock'] = StockAvailable::outOfStock($pd['id_product'], $id_shop);
            // cache_default_attribute is kept up to date in indexProduct()
            $pd['id_product_attribute'] = $pd['cache_default_attribute'];

            if (!empty($this->selected_combinations[$id_product])) {
                $pd['id_product_attribute'] = $this->selected_combinations[$id_product];
                if (!empty($updated_images[$id_product])) {
                    $pd['id_image'] = $updated_images[$id_product][0];
                    $pd['legend'] = $updated_images[$id_product][1];
                }
            }

            $pd = Product::getProductProperties($id_lang, $pd);
            if ($this->is_17 && Tools::getValue('controller') == 'ajax') {
                $pd = $factory_presenter->present($factory_settings, $pd, $lang_obj);
            }

            if ($pd['id_product_attribute'] != $pd['cache_default_attribute']) {
                $pd['link'] .= $this->addAnchor((int)$id_product, (int)$pd['id_product_attribute'], true);
            }

            $products_infos[$positions[$id_product]] = $pd;
        }
        ksort($products_infos);
        return $products_infos;
    }

    /*
    * Based on $product->getAnchor()
    */
    public function addAnchor($id_product, $id_product_attribute, $with_id = false)
    {
        $attributes = Product::getAttributesParams($id_product, $id_product_attribute);
        $anchor = '#';
        $sep = Configuration::get('PS_ATTRIBUTE_ANCHOR_SEPARATOR');
        foreach ($attributes as &$a) {
            foreach ($a as &$b) {
                $b = str_replace($sep, '_', Tools::link_rewrite($b));
            }
            $id = ($with_id && !empty($a['id_attribute']) ? (int)$a['id_attribute'].$sep : '');
            $anchor .= '/'.$id.$a['group'].$sep.$a['name'];
        }
        return $anchor;
    }

    public function getCustomerFilters($id_customer)
    {
        if (!$this->getAdjustableCustomerFilters(false)) {
            return false;
        }
        $customer_filters = $this->db->getValue('
            SELECT filters FROM '._DB_PREFIX_.'af_customer_filters
            WHERE id_customer = '.(int)$id_customer.'
        ');
        if ($customer_filters) {
            $customer_filters = Tools::jsonDecode($customer_filters, true);
        }
        return $customer_filters;
    }

    public function ajaxSaveCustomerFilters()
    {
        if (!$this->context->customer->id) {
            exit();
        }
        $submitted_filters = Tools::getValue('filters');
        $available_filters = $this->getAvailableFilters();
        $data_to_save = array();
        foreach (array_keys($available_filters) as $f) {
            if (!empty($submitted_filters[$f])) {
                foreach ($submitted_filters[$f] as $id) {
                    $data_to_save[$f][$id] = $id;
                }
            }
        }
        $data_to_save = Tools::jsonEncode($data_to_save);
        $query = '
            REPLACE INTO '._DB_PREFIX_.'af_customer_filters
            VALUES ('.(int)$this->context->customer->id.', \''.pSQL($data_to_save).'\')
        ';
        $ret = array('success' => $this->db->execute($query));
        exit(Tools::jsonEncode($ret));
    }

    public function ajaxPrepareLayout()
    {
        $general_settings = $this->getGeneralSettings();
        $this->context->smarty->assign(array(
            'product_list_class' => $this->product_list_class,
            'af_ids' => $general_settings['af_ids'],
        ));
        $tpl = $this->is_17 ? 'basic-layout-17' : 'basic-layout';
        $layout = $this->display(__FILE__, 'views/templates/front/'.$tpl.'.tpl');
        $ret = array('layout' => utf8_encode($layout));
        exit(Tools::jsonEncode($ret));
    }

    public function getPositionInCategory($id_product, $id_category)
    {
        $position = $this->db->getValue('
            SELECT position FROM '._DB_PREFIX_.'category_product
            WHERE id_category = '.(int)$id_category.' AND id_product = '.(int)$id_product.'
        ');
        if (!$position) {
            $position = 'n';
        }
        return $position;
    }

    public function getPossibleCombinations(
        $data,
        &$all = array(),
        $group = array(),
        $val = null,
        $id_group = null,
        $i = 0
    ) {
        if (!empty($val) && !empty($id_group)) {
            $group[$id_group] = $val;
        }
        if ($i >= count($data)) {
            $all[] = $group;
        } else {
            $keys = array_keys($data);
            $id_group = $keys[$i];
            foreach ($data[$id_group] as $val) {
                $this->getPossibleCombinations($data, $all, $group, $val, $id_group, $i + 1);
            }
        }
        return $all;
    }

    public function checkControllerCompliance($params, $product_data)
    {
        $complies = true;
        if ($params['current_controller'] != 'category' && $params['current_controller'] != 'index') {
            if ($params['current_controller'] == 'manufacturer') {
                $complies = in_array($params['id_manufacturer'], $product_data['m']);
            } elseif ($params['current_controller'] == 'supplier') {
                $complies = in_array($params['id_supplier'], $product_data['s']);
            } elseif (!isset($params['controller_product_ids'][$product_data['id']])) {
                $complies = false;
            }
        }
        return $complies;
    }

    public function getAdjustableCustomerFilters($decode = true)
    {
        $adjustable_fitlers = Configuration::get('AF_SAVED_CUSTOMER_FILTERS');
        if ($decode) {
            $adjustable_fitlers = $adjustable_fitlers ? Tools::jsonDecode($adjustable_fitlers, true) : array();
        }
        return $adjustable_fitlers;
    }

    public function hookDisplayCustomerAccount()
    {
        if ($this->getAdjustableCustomerFilters(false)) {
            $general_settings = $this->getGeneralSettings();
            $this->context->smarty->assign(array(
                'href' => $this->context->link->getModuleLink($this->name, 'my-filters'),
                'layout_classes' => $general_settings['af_classes'],
                'is_17' => $this->is_17,
            ));
            return $this->display(__FILE__, 'views/templates/hook/my-filters-tab.tpl');
        }
    }

    public function getCronToken()
    {
        return Tools::encrypt($this->name);
    }

    public function getCronURL($id_shop, $params = array())
    {
        $required_params = array(
            'token' => $this->getCronToken(),
            'id_shop' => $id_shop,
        );
        foreach ($params as $name => $value) {
            $required_params[$name] = $value;
        }
        return $this->context->link->getModuleLink($this->name, 'cron', $required_params, null, null, $id_shop);
    }

    public function throwError($errors, $render_html = true)
    {
        if (!is_array($errors)) {
            $errors = array($errors);
        }
        if ($render_html) {
            $html = '<div class="thrown-errors">'.$this->displayError(implode('<br>', $errors)).'</div>';
            if (!Tools::isSubmit('ajax')) {
                return $html;
            } else {
                $errors = utf8_encode($html);
            }
        }
        die(Tools::jsonEncode(array('errors' => $errors)));
    }

    /*
    * new methods, since 1.7
    */
    public function getPaginationVariables($page, $products_num, $products_per_page, $pages_nb, $current_url)
    {
        require_once('src/AmazzingFilterProductSearchProvider.php');
        $provider = new AmazzingFilterProductSearchProvider($this);
        return $provider->getPaginationVariables($page, $products_num, $products_per_page, $pages_nb, $current_url);
    }

    public function updateQueryString($url, $new_params = array())
    {
        $url = explode('?', $url);
        $updated_params = !empty($url[1]) ? $this->parseStr($url[1]) : array();
        foreach ($new_params as $name => $value) {
            $updated_params[$name] = $value;
            if ($name == $this->page_link_rewrite_text && $value == 1) {
                unset($updated_params[$name]);
            }
        }
        $replacements = array('%2F' => '/', '%2A' => '*');
        $updated_params = str_replace(array_keys($replacements), $replacements, http_build_query($updated_params));
        $updated_url = $url[0].(!empty($updated_params) ? '?'.$updated_params : '');
        return $updated_url;
    }

    public function getSortingOptions($current_option)
    {
        $options = $this->getAvailableSortingOptions();
        $processed_options = array();
        foreach ($options as $k => $opt_name) {
            $k_exploded = explode('.', $k);
            $processed_options[$k] = array(
                'entity' => $k_exploded[0],
                'field' => $k_exploded[1],
                'direction' => $k_exploded[2],
                'label' => $opt_name,
                'urlParameter' => '',
                'url' => 'order='.$k,
                'current' => ($k == $current_option),
            );
        }
        return $processed_options;
        // this is simplified version of ProductListingFrontController::getTemplateVarSortOrders()
        // standard options can be obtained like that:
        // use PrestaShop\PrestaShop\Core\Product\Search\SortOrderFactory; at the top
        // $options = (new SortOrderFactory($this->getTranslator()))->getDefaultSortOrders();
    }

    public function getAvailableSortingOptions()
    {
        $options = array(
            'product.position.asc' => $this->l('Relevance'),
            'product.date_add.desc' => $this->l('New products first'),
            'product.name.asc' => $this->l('Name, A to Z'),
            'product.name.desc' => $this->l('Name, Z to A'),
            'product.price.asc' => $this->l('Price, low to high'),
            'product.price.desc' => $this->l('Price, high to low'),
            'product.quantity.desc' => $this->l('In stock'),
        );
        // options, that can be defined in Product settigns
        $extra_options = array(
            'product.position.desc' => $this->l('Relevance, reverse'),
            'product.date_add.asc' => $this->l('Old products first'),
            'product.date_upd.desc' => $this->l('Last updated first'),
            'product.date_upd.asc' => $this->l('Last updated last'),
            'product.quantity.asc' => $this->l('Stock, reverse'),
            'product.reference.asc' => $this->l('Reference, A to Z'),
            'product.reference.desc' => $this->l('Reference, reverse'),
            'product.manufacturer_name.asc' => $this->l('Brand, A to Z'),
            'product.manufacturer_name.desc' => $this->l('Brand, reverse'),
        );

        $order_way = Tools::getProductsOrder('way', Tools::getValue('orderway'));
        $order_by = Tools::getProductsOrder('by', Tools::getValue('order_by'));
        $key = 'product.'.$order_by.'.'.$order_way;

        if (isset($extra_options[$key])) {
            $options = array($key => $extra_options[$key]) + $options;
        }

        if ($this->current_controller == 'search') {
            // sorting by position is reverse in search results
            $options = array('product.position.desc' => $options['product.position.asc']) + $options;
            unset($options['product.position.asc']);
        }

        return $options;
    }

    public function hookProductSearchProvider($params)
    {
        if ($this->defineFilterParams()) {
            require_once('src/AmazzingFilterProductSearchProvider.php');
            return new AmazzingFilterProductSearchProvider($this);
        } else {
            return false;
        }
    }
}
