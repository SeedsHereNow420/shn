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

$class_path = dirname(__FILE__).'/classes/';
require_once($class_path.'FsAdvancedUrlDataTransfer.php');
require_once($class_path.'FsAdvancedUrlHelperFormMultiShop.php');
require_once($class_path.'FsAdvancedUrlHelperList.php');
require_once($class_path.'FsAdvancedUrlMessenger.php');
require_once($class_path.'FsAdvancedUrlModule.php');
require_once($class_path.'FsAdvancedUrlProduct.php');
require_once($class_path.'FsAdvancedUrlTools.php');

class Fsadvancedurl extends FsAdvancedUrlModule
{
    const DUPLICATE_CHECK_ON_ONLY_ACTIVE_LANGUAGE = true;
    protected $handled_routes = array();
    protected $multilang_routes = array();
    protected $pre_dispatchers = array();
    protected $duplicate_urls_count = 0;
    public $debug_data = array('checked_routes' => array());

    public function __construct()
    {
        $this->name = 'fsadvancedurl';
        $this->tab = 'seo';
        $this->version = '2.1.2';
        $this->author = 'ModuleFactory';
        $this->need_instance = 0;
        $this->ps_versions_compliancy['min'] = '1.6.0.5';
        $this->module_key = 'a5ff8f76a03ec7aa94b27bba0241ff4d';
        $this->displayName = $this->l('Advanced SEO Friendly URLs');
        $this->description = $this->l('Removes ID from URLs for better SEO');

        $this->register_hooks = array(
            'actionDispatcher',
            'moduleRoutes',
            'actionObjectProductAddAfter',
            'actionObjectProductUpdateAfter',
            'actionObjectCategoryAddAfter',
            'actionObjectCategoryUpdateAfter',
            'actionObjectManufacturerAddAfter',
            'actionObjectManufacturerUpdateAfter',
            'actionObjectSupplierAddAfter',
            'actionObjectSupplierUpdateAfter',
            'actionObjectCMSAddAfter',
            'actionObjectCMSUpdateAfter',
            'displayBackOfficeHeader',
            'displayHeader'
        );

        $this->default_config = array(
            'FSAU_ENABLE_pr' => 1,
            'FSAU_ENABLE_pr_categories' => 1,
            'FSAU_ENABLE_pr_category' => 0,
            'FSAU_ENABLE_pr_anchor_remove' => 0,
            'FSAU_product_rule_RT' => 'category',
            'FSAU_ENABLE_cr' => 1,
            'FSAU_ENABLE_cr_categories' => 1,
            'FSAU_category_rule_RT' => 'parent',
            'FSAU_ENABLE_manufacturer_rule' => 1,
            'FSAU_ENABLE_supplier_rule' => 1,
            'FSAU_ENABLE_cms_rule' => 1,
            'FSAU_MODULE_ROUTE_END' => 0,
            'FSAU_LINK_REWRITE_MODE' => 'regenerate_all',
            'FSAU_LINK_REWRITE_SCHEMA' => $this->generateMultilangualFields('{product_name}'),
            'FSAU_DISABLE_old_rules' => 0,
            'FSAU_ROUTE_FRONT' => '',
            'FSAU_REMOVE_DEFAULT_LANG' => 0,
            'FSAU_cms_rule_RT' => 'category',
            'FSAU_cms_category_rule_RT' => 'parent',
            'FSAU_ENABLE_cms_category_rule' => 1,
            'FSAU_ENABLE_cmsr_categories' => 0,
            'FSAU_ENABLE_cmscr_categories' => 0,
            'FSAU_manufacturer_rule_RT' => 'parent',
            'FSAU_supplier_rule_RT' => 'parent',
            'FSAU_DEBUG_MODE' => 0,
            'FSAU_DISABLE_DUPLICATE_CHECK' => 0,

            //Multi Language Routes
            'FSAU_ENABLE_MULTILANG_ROUTES' => 0,
            'FSAU_ROUTE_product_rule' => $this->generateMultilangualFields(''),
            'FSAU_ROUTE_category_rule' => $this->generateMultilangualFields(''),
            'FSAU_ROUTE_layered_rule' => $this->generateMultilangualFields(''),
            'FSAU_ROUTE_supplier_rule' => $this->generateMultilangualFields(''),
            'FSAU_ROUTE_manufacturer_rule' => $this->generateMultilangualFields(''),
            'FSAU_ROUTE_cms_rule' => $this->generateMultilangualFields(''),
            'FSAU_ROUTE_cms_category_rule' => $this->generateMultilangualFields(''),
            'FSAU_ROUTE_module' => $this->generateMultilangualFields(''),
        );

        $this->multilang_routes = array(
            'product_rule',
            'category_rule',
            'layered_rule',
            'supplier_rule',
            'manufacturer_rule',
            'cms_rule',
            'cms_category_rule',
            'module'
        );

        parent::__construct();

        //1.6.0.11 Breaking changes
        $this->pagenotfound_name = version_compare(_PS_VERSION_, '1.6.0.11', '>=') ? 'pagenotfound' : '404';

        $default_tab = (Tools::getValue('conf', 0) == 12)?'fsau_help_tab':'fsau_product_url_tab';
        $this->tab_section = Tools::getValue('tab_section', $default_tab);
    }

    public function preInstall()
    {
        $return = true;

        if (!Tools::isSubmit('reset')) {
            $dispatcher = Dispatcher::getInstance();
            $default_routes = $dispatcher->default_routes;
            $configuration_prefix = 'PS_ROUTE_';

            if (Shop::isFeatureActive()) {
                Shop::setContext(Shop::CONTEXT_ALL);
            }

            foreach (array_keys($default_routes) as $rule) {
                $custom_rule = Configuration::get($configuration_prefix.$rule);
                if ($custom_rule) {
                    $default_routes[$rule]['rule'] = $custom_rule;
                }
            }
            $return = $return && Configuration::updateValue(
                'FSAU_OLD_REWRITE_RULES',
                $this->jsonEncode($default_routes)
            );

            //Delete old rules
            foreach (array_keys($default_routes) as $rule) {
                Configuration::deleteByName($configuration_prefix.$rule);
            }

            $override_path = dirname(__FILE__).'/override/';
            $override_version_path = dirname(__FILE__).'/override_versions/1.6.0.5/';
            $files_to_copy = Tools::scandir($override_version_path, 'php', '', true);
            if ($files_to_copy) {
                foreach ($files_to_copy as $file) {
                    Tools::copy($override_version_path.$file, $override_path.$file);
                }
            }

            if (version_compare(_PS_VERSION_, '1.6.0.11', '>=')) {
                $override_version_path = dirname(__FILE__).'/override_versions/1.6.0.11/';
                $files_to_copy = Tools::scandir($override_version_path, 'php', '', true);
                if ($files_to_copy) {
                    foreach ($files_to_copy as $file) {
                        Tools::copy($override_version_path.$file, $override_path.$file);
                    }
                }
            }

            if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
                $override_version_path = dirname(__FILE__).'/override_versions/1.7.0.0/';
                $files_to_copy = Tools::scandir($override_version_path, 'php', '', true);
                if ($files_to_copy) {
                    foreach ($files_to_copy as $file) {
                        Tools::copy($override_version_path.$file, $override_path.$file);
                    }
                }
            }
        }

        return $return;
    }

    public function install()
    {
        $return = true;
        $return = $return && $this->preInstall();
        $return = $return && parent::install();

        $has_index = $this->hasDbTableIndex('product_lang', 'link_rewrite');
        if (!$has_index) {
            $this->addDbTableIndex('product_lang', 'link_rewrite');
        }

        $has_index = $this->hasDbTableIndex('category_lang', 'link_rewrite');
        if (!$has_index) {
            $this->addDbTableIndex('category_lang', 'link_rewrite');
        }

        $tab = Tab::getInstanceFromClassName('AdminFsadvancedurl', Configuration::get('PS_LANG_DEFAULT'));
        if (!Validate::isLoadedObject($tab)) {
            $tab->delete();
        }

        $tab = new Tab();
        $tab->id_parent = -1;
        if ($this->isPsMin17()) {
            $tab->id_parent = 0;
        }
        $tab->position = 0;
        $tab->module = $this->name;
        $tab->class_name = 'AdminFsadvancedurl';
        $tab->active = 1;
        $tab->name = $this->generateMultilangualFields($this->displayName);
        $tab->save();

        return $return;
    }

    #################### ADMIN ####################

    public function getContent()
    {
        $context = Context::getContext();
        $context->controller->addCSS($this->getPath().'views/css/admin.css', 'all');
        $context->controller->addCSS($this->getPath().'views/css/sweetalert.css', 'all');
        if ($this->isPs15()) {
            $context->controller->addCSS($this->getPath().'views/css/bootstrap-progress-bar.css', 'all');
        }
        $context->controller->addJS($this->getPath().'views/js/admin_config.js');
        $context->controller->addJS($this->getPath().'views/js/sweetalert.min.js');


        $error_string = $this->l('Please enable the "%s" option in "%s" -> "%s" -> "%s" panel!');
        $menu_1 = $this->l('Preferences');
        $menu_2 = $this->l('SEO & URLs');
        $panel = $this->l('Set Up URLs');

        $dispatcher = Dispatcher::getInstance();
        $default_routes = $dispatcher->default_routes;

        $html = $this->getCssAndJs();
        if (!Configuration::get('PS_REWRITING_SETTINGS')) {
            $html .= $this->displayError(sprintf(
                $error_string,
                $this->l('Friendly URL'),
                $menu_1,
                $menu_2,
                $panel
            ));
        }

        if (!Configuration::get('PS_CANONICAL_REDIRECT')) {
            $html .= $this->displayError(sprintf(
                $error_string,
                $this->l('Redirect to the canonical URL'),
                $menu_1,
                $menu_2,
                $panel
            ));
        }

        $error_string = $this->l('Please turn off "%s" option in "%s" -> "%s" -> "%s" panel!');
        $menu_1 = $this->l('Advanced Parameters');
        $menu_2 = $this->l('Performance');
        $panel = $this->l('Debug Mode');

        if (Configuration::get('PS_DISABLE_NON_NATIVE_MODULE')) {
            $html .= $this->displayError(sprintf(
                $error_string,
                'Disable non PrestaShop modules',
                $menu_1,
                $menu_2,
                $panel
            ));
        }

        if (Configuration::get('PS_DISABLE_OVERRIDES')) {
            $html .= $this->displayError(sprintf(
                $error_string,
                'Disable all overrides',
                $menu_1,
                $menu_2,
                $panel
            ));
        }

        $html .= FsAdvancedUrlMessenger::getMessagesHtml();

        if (Tools::isSubmit('save_'.$this->name)) {
            $valid = true;
            $form_values = array();
            foreach ($this->getConfigKeys() as $config_key) {
                if (Tools::isSubmit($config_key)) {
                    $form_values[$config_key] = Tools::getValue($config_key, Configuration::get($config_key));
                }
            }

            if ($this->getMultilangualConfigKeys()) {
                foreach ($this->getMultilangualConfigKeys() as $multilang_config_key) {
                    if (FsAdvancedUrlTools::isSubmitMultilang($multilang_config_key)) {
                        $form_values[$multilang_config_key] = $this->getMultilangualValue($multilang_config_key);
                    }
                }
            }

            //If MultiShop enabled and not in the All Context we check that the field approved for save
            $form_values = FsAdvancedUrlHelperFormMultiShop::handleMultiShop($form_values);

            //Don't save default values routes
            $lang_ids = $this->getLanguageIDs(false);
            foreach ($this->multilang_routes as $route_id) {
                $route_config_name = 'FSAU_ROUTE_'.$route_id;
                if (isset($form_values[$route_config_name])) {
                    //Clear if equals to default
                    foreach ($lang_ids as $id_lang) {
                        if (isset($form_values[$route_config_name][$id_lang])) {
                            if ($form_values[$route_config_name][$id_lang] == $default_routes[$route_id]['rule']) {
                                $form_values[$route_config_name][$id_lang] = false;
                            }
                        }
                    }

                    //If all fields empty delete from the context
                    $delete = true;
                    foreach ($lang_ids as $id_lang) {
                        if (isset($form_values[$route_config_name][$id_lang]) &&
                            $form_values[$route_config_name][$id_lang]) {
                            $delete = false;
                        }
                    }

                    if ($delete) {
                        unset($form_values[$route_config_name]);
                        if (Shop::getContext() == Shop::CONTEXT_ALL) {
                            Configuration::deleteByName($route_config_name);
                        } else {
                            Configuration::deleteFromContext($route_config_name);
                        }
                    }

                    foreach ($lang_ids as $id_lang) {
                        if (isset($form_values[$route_config_name][$id_lang])) {
                            if ($form_values[$route_config_name][$id_lang]) {
                                $ret = $this->validateRule(
                                    $route_id,
                                    $id_lang,
                                    $form_values[$route_config_name][$id_lang]
                                );
                                if (!$ret) {
                                    $valid = false;
                                }
                            }
                        }
                    }
                }
            }

            if (Tools::isSubmit('FSAU_DELETE_TRASH_TRANSLATIONS') &&
                Tools::getValue('FSAU_DELETE_TRASH_TRANSLATIONS')) {
                $deleted_language_ids = $this->getDeletedLanguageIDs();
                if ($deleted_language_ids) {
                    foreach ($deleted_language_ids as $id_lang) {
                        $this->deleteTrashTranslationsByIdLang($id_lang);
                    }
                }
            }

            if (Tools::isSubmit('FSAU_ENABLE_pr')) {
                if (Tools::getValue('FSAU_ENABLE_pr_categories') && Tools::getValue('FSAU_ENABLE_pr_category')) {
                    $valid = false;
                    FsAdvancedUrlMessenger::addErrorMessage($this->l(implode(' ', array(
                        'You can not enable both parent categories and default category.',
                        'Please enable only which you want to use.'
                    ))));
                }
            }

            if ($valid) {
                foreach ($form_values as $option_key => $form_value) {
                    Configuration::updateValue($option_key, $form_value, true);
                }

                FsAdvancedUrlMessenger::addSuccessMessage($this->l('Update successful'));
            } else {
                FsAdvancedUrlDataTransfer::setData($form_values);
            }

            FsAdvancedUrlTools::redirect($this->url().'&tab_section='.$this->tab_section);
        } elseif (Tools::isSubmit('save_'.$this->name.'_link_rewrite_generator_config')) {
            Configuration::updateValue(
                'FSAU_LINK_REWRITE_SCHEMA',
                self::getMultilangualValue('FSAU_LINK_REWRITE_SCHEMA'),
                true
            );
            Configuration::updateValue(
                'FSAU_LINK_REWRITE_MODE',
                Tools::getValue('FSAU_LINK_REWRITE_MODE', 'regenerate_all'),
                true
            );

            FsAdvancedUrlMessenger::addSuccessMessage($this->l('Update successful'));
            FsAdvancedUrlTools::redirect($this->url().'&tab_section='.$this->tab_section);
        } else {
            $tab_content = array();
            $forms_fields_value = Configuration::getMultiple($this->getConfigKeys());
            if ($this->getMultilangualConfigKeys()) {
                foreach ($this->getMultilangualConfigKeys() as $multilang_config_key) {
                    $forms_fields_value[$multilang_config_key] =
                        $this->getMultilangualConfiguration($multilang_config_key);
                }
            }

            if ($data_transfer = FsAdvancedUrlDataTransfer::getData()) {
                $forms_fields_value = array_merge($forms_fields_value, $data_transfer);
            }

            if (Configuration::get('FSAU_ENABLE_MULTILANG_ROUTES')) {
                foreach ($this->multilang_routes as $multilang_route) {
                    $lang_routes = array();
                    foreach ($this->getLanguagesForForm() as $lang) {
                        $route_schema_lang = Configuration::get('FSAU_ROUTE_'.$multilang_route, $lang['id_lang']);
                        if (!$route_schema_lang) {
                            $route_schema_lang = $default_routes[$multilang_route]['rule'];
                        }

                        $lang_routes[] = Tools::strtoupper($lang['iso_code']).': '.$route_schema_lang;
                    }

                    $forms_fields_value['FSAU_'.$multilang_route] =
                        '<div class="fsau-schema-url">'.implode('<br />', $lang_routes).'</div>';
                }
            } else {
                foreach ($this->multilang_routes as $multilang_route) {
                    $route_schema = Configuration::get('PS_ROUTE_'.$multilang_route);
                    if (!$route_schema) {
                        $route_schema = $default_routes[$multilang_route]['rule'];
                    }
                    $forms_fields_value['FSAU_'.$multilang_route] =
                        '<div class="fsau-schema-url">'.$route_schema.'</div>';
                }
            }

            /*$tab_content_general = $this->renderGeneralSettingsForm($forms_fields_value);
            $tab_content[] = array(
                'id' => 'fsau_general_tab',
                'title' => $this->l('General Settings'),
                'content' => $tab_content_general
            );*/

            $tab_content_product_url = $this->renderProductUrlSettingsForm($forms_fields_value);
            $tab_content[] = array(
                'id' => 'fsau_product_url_tab',
                'title' => $this->l('Product URL Settings'),
                'content' => $tab_content_product_url
            );

            $tab_content_category_url = $this->renderCategoryUrlSettingsForm($forms_fields_value);
            $tab_content[] = array(
                'id' => 'fsau_category_url_tab',
                'title' => $this->l('Category URL Settings'),
                'content' => $tab_content_category_url
            );

            $tab_content_manufacturer_url = $this->renderManufacturerUrlSettingsForm($forms_fields_value);
            $tab_content[] = array(
                'id' => 'fsau_manufacturer_url_tab',
                'title' => $this->l('Manufacturer URL Settings'),
                'content' => $tab_content_manufacturer_url
            );

            $tab_content_supplier_url = $this->renderSupplierUrlSettingsForm($forms_fields_value);
            $tab_content[] = array(
                'id' => 'fsau_supplier_url_tab',
                'title' => $this->l('Supplier URL Settings'),
                'content' => $tab_content_supplier_url
            );

            $tab_content_cms_url = $this->renderCmsUrlSettingsForm($forms_fields_value);
            $tab_content[] = array(
                'id' => 'fsau_cms_url_tab',
                'title' => $this->l('CMS & CMS Category URL Settings'),
                'content' => $tab_content_cms_url
            );

            $tab_content_schema = $this->renderSchemaOfUrlsSettingsForm($forms_fields_value);
            $tab_content[] = array(
                'id' => 'fsau_schema_tab',
                'title' => $this->l('Schema of URLs'),
                'content' => $tab_content_schema
            );

            $tab_content_duplicate = $this->renderDuplicateList();
            $tab_content_duplicate .= $this->renderProductLinkRewriteGeneratorForm($forms_fields_value);
            $tab_content[] = array(
                'id' => 'fsau_duplicate_tab',
                'title' => (($this->duplicate_urls_count)?'<span class="fsau-duplicate-alert">( !! )</span> ':'').
                    $this->l('Duplicated URLs'),
                'content' => $tab_content_duplicate
            );

            $tab_content_advanced = $this->renderAdvancedSettingsForm($forms_fields_value);
            $tab_content[] = array(
                'id' => 'fsau_advanced_tab',
                'title' => $this->l('Advanced Settings'),
                'content' => $tab_content_advanced
            );

            $this->smartyAssign(array(
                'fsau_performance_url' => $this->context->link->getAdminLink('AdminPerformance'),
                'fsau_seo_url' => $this->context->link->getAdminLink('AdminMeta'),
            ));

            $tab_content_help = $this->smartyFetch('admin/help.tpl');
            $tab_content[] = array(
                'id' => 'fsau_help_tab',
                'title' => $this->l('Help'),
                'content' => $tab_content_help
            );

            $html .= $this->renderTabLayout($tab_content, $this->tab_section);
        }

        return $html;
    }

    public function renderGeneralSettingsForm($fields_value)
    {
        $fields_form = array();

        $input_fields = array();

        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('General Settings')
            ),
            'input' => $input_fields
        );

        $helper = new FsAdvancedUrlHelperFormMultiShop($this);
        $helper->setIdentifier('fsau_general_settings');
        $helper->setSubmitAction('save_'.$this->name);
        $helper->setTabSection('fsau_general_tab');
        $helper->setFieldsValue($fields_value);
        return $helper->generateForm($fields_form);
    }

    public function renderProductUrlSettingsForm($fields_value)
    {
        $fields_form = array();
        $help_string = $this->l('You can edit scheme in "%s" -> "%s" -> "%s" panel!');
        $menu_1 = $this->l('Preferences');
        $menu_2 = $this->l('SEO & URLs');
        $panel = $this->l('Schema of URLs');

        $help_category_url = 'http://domain.com/default-cat/product-rewrite.html';
        $help_categories_url = 'http://domain.com/parent-cat/child-cat/product-rewrite.html';

        $input_fields = array();
        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable advanced URL:'),
            'name' => 'FSAU_ENABLE_pr',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_pr_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_pr_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('Select yes to remove ID from product URLs'),
        );

        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable default category in URL:'),
            'name' => 'FSAU_ENABLE_pr_category',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_pr_category_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_pr_category_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('URLs going to looks like:').' '.$help_category_url,
        );

        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable parent categories in URL:'),
            'name' => 'FSAU_ENABLE_pr_categories',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_pr_categories_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_pr_categories_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('URLs going to looks like:').' '.$help_categories_url,
        );

        if ($this->isPsMin17()) {
            $help_anchor = implode('', array(
                $this->l('Removes default combination parameter from the URL, which is after the hash mark'),
                '<br />',
                $help_categories_url,
                '<span class="fsau-line-through fsau-bold">',
                '#/1-size-s/8-color-white',
                '</span>'
            ));

            $input_fields[] = array(
                'type' => ($this->isPs15())?'radio':'switch',
                'label' => $this->l('Remove anchor from URL:'),
                'name' => 'FSAU_ENABLE_pr_anchor_remove',
                'class' => 't',
                'is_bool' => true,
                'is_multishop' => true,
                'values' => array(
                    array(
                        'id' => 'FSAU_ENABLE_pr_anchor_remove_on',
                        'value' => 1,
                        'label' => $this->l('Yes')
                    ),
                    array(
                        'id' => 'FSAU_ENABLE_pr_anchor_remove_off',
                        'value' => 0,
                        'label' => $this->l('No')
                    ),
                ),
                'desc' => $help_anchor,
            );
        }

        $input_fields[] = array(
            'type' => 'select',
            'label' => $this->l('Product not found redirect type:'),
            'name' => 'FSAU_product_rule_RT',
            'is_multishop' => true,
            'options' => array(
                'query' => array(
                    array('id' => 'default', 'name' =>  $this->l('No Redirect')),
                    array('id' => 'category', 'name' =>  $this->l('Try to redirect to category (Recommended)')),
                    array('id' => '404', 'name' =>  $this->l('Redirect to page not found page')),
                ),
                'id' => 'id',
                'name' => 'name',
            ),
        );

        $input_fields[] = array(
            'type' => 'free',
            'label' => $this->l('Current schema of URL:'),
            'name' => 'FSAU_product_rule',
            'desc' => sprintf($help_string, $menu_1, $menu_2, $panel),
        );

        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Advanced URLs To Products')
            ),
            'input' => $input_fields
        );

        $helper = new FsAdvancedUrlHelperFormMultiShop($this);
        $helper->setIdentifier('fsau_product_url_settings');
        $helper->setSubmitAction('save_'.$this->name);
        $helper->setTabSection('fsau_product_url_tab');
        $helper->setFieldsValue($fields_value);
        return $helper->generateForm($fields_form);
    }

    public function renderCategoryUrlSettingsForm($fields_value)
    {
        $fields_form = array();
        $help_string = $this->l('You can edit scheme in "%s" -> "%s" -> "%s" panel!');
        $menu_1 = $this->l('Preferences');
        $menu_2 = $this->l('SEO & URLs');
        $panel = $this->l('Schema of URLs');

        $help_categories_url = 'http://domain.com/parent-cat/child-cat/category-rewrite.html';

        $input_fields = array();
        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable advanced URL:'),
            'name' => 'FSAU_ENABLE_cr',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_cr_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_cr_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('Select yes to remove ID from category URLs'),
        );

        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable parent categories in URL:'),
            'name' => 'FSAU_ENABLE_cr_categories',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_cr_categories_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_cr_categories_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('URLs going to looks like:').' '.$help_categories_url,
        );

        $input_fields[] = array(
            'type' => 'select',
            'label' => $this->l('Category not found redirect type:'),
            'name' => 'FSAU_category_rule_RT',
            'is_multishop' => true,
            'options' => array(
                'query' => array(
                    array('id' => 'default', 'name' =>  $this->l('No Redirect')),
                    array(
                        'id' => 'best',
                        'name' =>  $this->l('Display best matched category (For special layered rule)')
                    ),
                    array(
                        'id' => 'parent',
                        'name' =>  $this->l('Try to redirect to parent category (Recommended)')
                    ),
                    array('id' => '404', 'name' =>  $this->l('Redirect to page not found page')),
                ),
                'id' => 'id',
                'name' => 'name',
            ),
        );

        $input_fields[] = array(
            'type' => 'free',
            'label' => $this->l('Current schema of URL:'),
            'name' => 'FSAU_category_rule',
            'desc' => sprintf($help_string, $menu_1, $menu_2, $panel),
        );

        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Advanced URLs To Categories')
            ),
            'input' => $input_fields
        );

        $helper = new FsAdvancedUrlHelperFormMultiShop($this);
        $helper->setIdentifier('fsau_category_url_settings');
        $helper->setSubmitAction('save_'.$this->name);
        $helper->setTabSection('fsau_category_url_tab');
        $helper->setFieldsValue($fields_value);
        return $helper->generateForm($fields_form);
    }

    public function renderManufacturerUrlSettingsForm($fields_value)
    {
        $fields_form = array();
        $help_string = $this->l('You can edit scheme in "%s" -> "%s" -> "%s" panel!');
        $menu_1 = $this->l('Preferences');
        $menu_2 = $this->l('SEO & URLs');
        $panel = $this->l('Schema of URLs');

        $input_fields = array();
        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable advanced URL:'),
            'name' => 'FSAU_ENABLE_manufacturer_rule',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_manufacturer_rule_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_manufacturer_rule_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('Select yes to remove ID from manufacturer URLs'),
        );

        $input_fields[] = array(
            'type' => 'select',
            'label' => $this->l('Manufacturer not found redirect type:'),
            'name' => 'FSAU_manufacturer_rule_RT',
            'is_multishop' => true,
            'options' => array(
                'query' => array(
                    array('id' => 'default', 'name' =>  $this->l('No Redirect')),
                    array(
                        'id' => 'parent',
                        'name' =>  $this->l('Redirect to manufacturer list page (Recommended)')
                    ),
                    array('id' => '404', 'name' =>  $this->l('Redirect to page not found page')),
                ),
                'id' => 'id',
                'name' => 'name',
            ),
        );

        $input_fields[] = array(
            'type' => 'free',
            'label' => $this->l('Current schema of URL:'),
            'name' => 'FSAU_manufacturer_rule',
            'desc' => sprintf($help_string, $menu_1, $menu_2, $panel),
        );

        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Advanced URLs To Manufacturers')
            ),
            'input' => $input_fields
        );

        $helper = new FsAdvancedUrlHelperFormMultiShop($this);
        $helper->setIdentifier('fsau_manufacturer_url_settings');
        $helper->setSubmitAction('save_'.$this->name);
        $helper->setTabSection('fsau_manufacturer_url_tab');
        $helper->setFieldsValue($fields_value);
        return $helper->generateForm($fields_form);
    }

    public function renderSupplierUrlSettingsForm($fields_value)
    {
        $fields_form = array();
        $help_string = $this->l('You can edit scheme in "%s" -> "%s" -> "%s" panel!');
        $menu_1 = $this->l('Preferences');
        $menu_2 = $this->l('SEO & URLs');
        $panel = $this->l('Schema of URLs');

        $input_fields = array();
        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable advanced URL:'),
            'name' => 'FSAU_ENABLE_supplier_rule',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_supplier_rule_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_supplier_rule_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('Select yes to remove ID from supplier URLs'),
        );

        $input_fields[] = array(
            'type' => 'select',
            'label' => $this->l('Supplier not found redirect type:'),
            'name' => 'FSAU_supplier_rule_RT',
            'is_multishop' => true,
            'options' => array(
                'query' => array(
                    array('id' => 'default', 'name' =>  $this->l('No Redirect')),
                    array(
                        'id' => 'parent',
                        'name' =>  $this->l('Redirect to supplier list page (Recommended)')
                    ),
                    array('id' => '404', 'name' =>  $this->l('Redirect to page not found page')),
                ),
                'id' => 'id',
                'name' => 'name',
            ),
        );

        $input_fields[] = array(
            'type' => 'free',
            'label' => $this->l('Current schema of URL:'),
            'name' => 'FSAU_supplier_rule',
            'desc' => sprintf($help_string, $menu_1, $menu_2, $panel),
        );

        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Advanced URLs To Suppliers')
            ),
            'input' => $input_fields
        );

        $helper = new FsAdvancedUrlHelperFormMultiShop($this);
        $helper->setIdentifier('fsau_supplier_url_settings');
        $helper->setSubmitAction('save_'.$this->name);
        $helper->setTabSection('fsau_supplier_url_tab');
        $helper->setFieldsValue($fields_value);
        return $helper->generateForm($fields_form);
    }

    public function renderCmsUrlSettingsForm($fields_value)
    {
        $fields_form = array();
        $help_string = $this->l('You can edit scheme in "%s" -> "%s" -> "%s" panel!');
        $menu_1 = $this->l('Preferences');
        $menu_2 = $this->l('SEO & URLs');
        $panel = $this->l('Schema of URLs');

        $help_c_categories_url = 'http://domain.com/content/parent-cat/child-cat/cms-rewrite.html';
        $help_cc_categories_url = 'http://domain.com/content/parent-cat/child-cat/';

        //CMS Form
        $input_fields = array();
        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable advanced URL:'),
            'name' => 'FSAU_ENABLE_cms_rule',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_cms_rule_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_cms_rule_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('Select yes to remove ID from cms URLs'),
        );

        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable parent categories in URL:'),
            'name' => 'FSAU_ENABLE_cmsr_categories',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_cmsr_categories_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_cmsr_categories_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('URLs going to looks like:').' '.$help_c_categories_url,
        );

        $input_fields[] = array(
            'type' => 'select',
            'label' => $this->l('CMS not found redirect type:'),
            'name' => 'FSAU_cms_rule_RT',
            'is_multishop' => true,
            'options' => array(
                'query' => array(
                    array('id' => 'default', 'name' =>  $this->l('No Redirect')),
                    array('id' => 'category', 'name' =>  $this->l('Try to redirect to category (Recommended)')),
                    array('id' => '404', 'name' =>  $this->l('Redirect to page not found page')),
                ),
                'id' => 'id',
                'name' => 'name',
            ),
        );

        $input_fields[] = array(
            'type' => 'free',
            'label' => $this->l('Current schema of CMS URL:'),
            'name' => 'FSAU_cms_rule',
            'desc' => sprintf($help_string, $menu_1, $menu_2, $panel),
        );

        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Advanced URLs To CMS')
            ),
            'input' => $input_fields
        );

        //CMS Category Form
        $input_fields = array();
        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable advanced URL:'),
            'name' => 'FSAU_ENABLE_cms_category_rule',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_cms_category_rule_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_cms_category_rule_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('Select yes to remove ID from cms category URLs'),
        );

        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable parent categories in URL:'),
            'name' => 'FSAU_ENABLE_cmscr_categories',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_cmscr_categories_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_cmscr_categories_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('URLs going to looks like:').' '.$help_cc_categories_url,
        );

        $input_fields[] = array(
            'type' => 'select',
            'label' => $this->l('CMS Category not found redirect type:'),
            'name' => 'FSAU_cms_category_rule_RT',
            'is_multishop' => true,
            'options' => array(
                'query' => array(
                    array('id' => 'default', 'name' =>  $this->l('No Redirect')),
                    array(
                        'id' => 'parent',
                        'name' =>  $this->l('Try to redirect to parent category (Recommended)')
                    ),
                    array('id' => '404', 'name' =>  $this->l('Redirect to page not found page')),
                ),
                'id' => 'id',
                'name' => 'name',
            ),
        );

        $input_fields[] = array(
            'type' => 'free',
            'label' => $this->l('Current schema of CMS Category URL:'),
            'name' => 'FSAU_cms_category_rule',
            'desc' => sprintf($help_string, $menu_1, $menu_2, $panel),
        );

        $fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->l('Advanced URLs To CMS Category')
            ),
            'input' => $input_fields
        );

        $helper = new FsAdvancedUrlHelperFormMultiShop($this);
        $helper->setIdentifier('fsau_cms_url_settings');
        $helper->setSubmitAction('save_'.$this->name);
        $helper->setTabSection('fsau_cms_url_tab');
        $helper->setFieldsValue($fields_value);
        return $helper->generateForm($fields_form);
    }

    public function renderSchemaOfUrlsSettingsForm($fields_value)
    {
        $fields_form = array();
        $input_fields = array();
        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Remove default language sign from URLs:'),
            'name' => 'FSAU_REMOVE_DEFAULT_LANG',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_REMOVE_DEFAULT_LANG_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_REMOVE_DEFAULT_LANG_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('If you select yes, from default language urls the language indicator will be removed.'),
        );

        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Enable multi language routes:'),
            'name' => 'FSAU_ENABLE_MULTILANG_ROUTES',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_ENABLE_MULTILANG_ROUTES_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_ENABLE_MULTILANG_ROUTES_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('For more information, please see the Help tab Multi Language Routes section.')
        );

        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Multi Language URLs'),
            ),
            'input' => $input_fields
        );

        if (Configuration::get('FSAU_ENABLE_MULTILANG_ROUTES')) {
            $schema_desc = $this->l('This section enables you to change the default pattern of your links. In order to use this functionality, PrestaShop\'s "Friendly URL" option must be enabled, and Apache\'s URL rewriting module (mod_rewrite) must be activated on your web server.');
            $schema_desc .= '<br />'.$this->l('There are several available keywords for each route listed below; note that keywords with * are required!');
            $schema_desc .= '<br />'.$this->l('To add a keyword in your URL, use the {keyword} syntax. If the keyword is not empty, you can add text before or after the keyword with syntax {prepend:keyword:append}. For example {-hey-:meta_title} will add "-hey-my-title" in the URL if the meta title is set.');

            $input_fields = array();
            $input_fields[] = $this->generateRouteField('product_rule', $this->l('Route to products:'));
            $input_fields[] = $this->generateRouteField('category_rule', $this->l('Route to category:'));
            $input_fields[] = $this->generateRouteField('layered_rule', $this->l('Route to category which has the "selected_filter" attribute for the "Layered Navigation" module:'));
            $input_fields[] = $this->generateRouteField('supplier_rule', $this->l('Route to supplier:'));
            $input_fields[] = $this->generateRouteField('manufacturer_rule', $this->l('Route to brand:'));
            $input_fields[] = $this->generateRouteField('cms_rule', $this->l('Route to page:'));
            $input_fields[] = $this->generateRouteField('cms_category_rule', $this->l('Route to page category:'));
            $input_fields[] = $this->generateRouteField('module', $this->l('Route to modules:'));

            $fields_form[1]['form'] = array(
                'legend' => array(
                    'title' => $this->l('Schema of URLs')
                ),
                'description' => $schema_desc,
                'input' => $input_fields,
            );
        }

        $helper = new FsAdvancedUrlHelperFormMultiShop($this);
        $helper->setIdentifier('fsau_schema_settings');
        $helper->setSubmitAction('save_'.$this->name);
        $helper->setTabSection('fsau_schema_tab');
        $helper->setFieldsValue($fields_value);
        return $helper->generateForm($fields_form);
    }

    public function generateRouteField($route_id, $label)
    {
        $keywords = array();
        foreach (Dispatcher::getInstance()->default_routes[$route_id]['keywords'] as $keyword => $data) {
            $keywords[] = ((isset($data['param'])) ? '<span class="red">'.$keyword.'*</span>' : $keyword);
        }

        return array(
            'type' => 'text',
            'label' => $label,
            'lang' => true,
            'name' => 'FSAU_ROUTE_'.$route_id,
            'desc' => sprintf($this->l('Keywords: %s'), implode(', ', $keywords)),
            'is_multishop' => true,
            'default_value' => Dispatcher::getInstance()->default_routes[$route_id]['rule'],
        );
    }

    public function renderDuplicateList()
    {
        $context = Context::getContext();
        $duplicate_fields_list = array();

        if (Shop::isFeatureActive()) {
            $duplicate_fields_list['shop'] = array(
                'title' => $this->l('Shop'),
            );
        }

        $duplicate_fields_list['type'] = array(
            'title' => $this->l('URL type'),
        );

        $duplicate_fields_list['id_object'] = array(
            'title' => $this->l('ID'),
        );

        $duplicate_fields_list['name'] = array(
            'title' => $this->l('Name'),
        );

        $duplicate_fields_list['lang'] = array(
            'title' => $this->l('Lang'),
        );

        $duplicate_fields_list['link_rewrite'] = array(
            'title' => $this->l('Friendly URL'),
        );

        $helper = new FsAdvancedUrlHelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = true;
        $helper->no_link = true;
        $helper->identifier = 'id';
        $helper->actions = array('editobject');
        $helper->show_toolbar = false;
        $helper->imageType = 'jpg';
        $helper->title[] = $this->l('Duplicate URLs');
        $helper->table = $this->name;
        $helper->module = $this;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = $context->link->getAdminLink('AdminModules', false).'&configure='.$this->name;

        $duplicate_urls = array();
        if (Configuration::get('FSAU_ENABLE_pr')) {
            $duplicate_urls = array_merge($duplicate_urls, $this->getProductDuplicate());
        }

        if (Configuration::get('FSAU_ENABLE_cr')) {
            $duplicate_urls = array_merge($duplicate_urls, $this->getCategoryDuplicate());
        }

        if (Configuration::get('FSAU_ENABLE_manufacturer_rule')) {
            $duplicate_urls = array_merge($duplicate_urls, $this->getManufacturerDuplicate());
        }

        if (Configuration::get('FSAU_ENABLE_supplier_rule')) {
            $duplicate_urls = array_merge($duplicate_urls, $this->getSupplierDuplicate());
        }

        if (Configuration::get('FSAU_ENABLE_cms_rule')) {
            $duplicate_urls = array_merge($duplicate_urls, $this->getCMSDuplicate());
            $duplicate_urls = array_merge($duplicate_urls, $this->getCMSCategoryDuplicate());
        }

        $this->duplicate_urls_count = count($duplicate_urls);

        $this->smartyAssign(array(
            'list_title_15' => $this->l('Duplicate URLs'),
            'generated_list' => $helper->generateList($duplicate_urls, $duplicate_fields_list)
        ));

        return $this->smartyFetch('admin/list_wrapper.tpl');
    }

    public function renderProductLinkRewriteGeneratorForm($fields_values)
    {
        $fields_form = array();
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        $id_lang = $this->context->language->id;

        $generator_keywords_product_features = array();
        $features = Feature::getFeatures($id_lang);
        foreach ($features as $feature) {
            $f = new Feature($feature['id_feature'], $id_lang);
            $generator_keywords_product_features[] = 'feature_'.str_replace('-', '_', Tools::str2url($f->name));
        }

        $link_rewrite_keywords = array(
            'product_name',
            'product_meta_title',
            'product_meta_keywords',
            'product_ean13',
            'product_upc',
            'product_reference',
            'product_price',
            'product_tags',
            'default_category_name',
            'default_category_meta_title',
            'default_category_link_rewrite',
            'manufacturer_name',
            'manufacturer_meta_title',
            'supplier_name',
            'supplier_meta_title'
        );

        $link_rewrite_keywords = array_merge($link_rewrite_keywords, $generator_keywords_product_features);

        $link_rewrite_desc = $this->generateAvailableKeywordsMultilang(
            $link_rewrite_keywords,
            'FSAU_LINK_REWRITE_SCHEMA_'.$default_lang
        );

        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Product Friendly URL Generator')
            ),
            'input' => array(
                array(
                    'type' => 'hidden',
                    'name' => 'tab_section',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Regeneration Type:'),
                    'name' => 'FSAU_LINK_REWRITE_MODE',
                    'options' => array(
                        'query' => array(
                            array('id' => 'regenerate_all', 'name' =>  $this->l('Regenerate All Product URLs')),
                            array(
                                'id' => 'regenerate_duplicate',
                                'name' =>  $this->l('Regenerate Only Duplicated Product URLs')
                            ),
                            array(
                                'id' => 'append_duplicate',
                                'name' =>  $this->l('Append Extra Information To Duplicated Product URLs')
                            ),
                        ),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Friendly URL Schema:'),
                    'lang' => true,
                    'name' => 'FSAU_LINK_REWRITE_SCHEMA',
                    'size' => 70,
                    'required' => true,
                    'desc' => $link_rewrite_desc
                ),
                array(
                    'type' => 'free',
                    'label' => $this->l('Status:'),
                    'lang' => false,
                    'name' => 'product_link_rewrite_progress_bar',
                    'required' => false
                )
            )
        );

        $helper = new HelperForm();
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->identifier = $this->identifier;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        foreach (Language::getLanguages(false) as $lang) {
            $helper->languages[] = array(
                'id_lang' => $lang['id_lang'],
                'iso_code' => $lang['iso_code'],
                'name' => $lang['name'],
                'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0)
            );
        }
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;
        $helper->show_toolbar = true;
        $helper->submit_action = 'save_'.$this->name.'_link_rewrite_generator_config';
        $helper->toolbar_scroll = false;
        $helper->title[] = $this->l('Product Friendly URL Generator');
        $helper->toolbar_btn = array(
            'save' =>
                array(
                    'desc' => $this->l('Save'),
                    'href' => $this->url().'&save_'.$this->name.'_link_rewrite_generator_config',
                ),
        );


        $helper->fields_value = $fields_values;
        $helper->fields_value['tab_section'] = 'fsau_duplicate_tab';
        $helper->fields_value['product_link_rewrite_progress_bar'] =  $this->smartyFetch('admin/progress_bar.tpl');

        $fields_form[0]['form']['submit'] = array('title' => $this->l('Save'));
        if ($this->isPs15()) {
            $fields_form[0]['form']['submit']['class'] = 'button';
        }

        $fields_form[0]['form']['buttons'][] = array(
            'title' => '<i class="process-icon-update"></i>'.$this->l('Generate'),
            'href' => 'javascript:;',
            'icon' => 'update',
            'js' => 'FSAU.generateProductLinkRewrite();'
        );

        $generated_form = $helper->generateForm($fields_form);

        if ($this->isPs15()) {
            $generated_form .= $this->smartyFetch('admin/product_link_rewrite_generator_form_15.tpl');
        }

        return $generated_form;
    }

    public function renderAdvancedSettingsForm($fields_value)
    {
        $fields_form = array();
        $input_fields = array();
        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Module Route to end'),
            'name' => 'FSAU_MODULE_ROUTE_END',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_MODULE_ROUTE_END_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_MODULE_ROUTE_END_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => implode(' ', array(
                $this->l('If you use a module route like this').' {module}{/:controller}.',
                $this->l('Enable this.')
            ))
        );

        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Disable old routes'),
            'name' => 'FSAU_DISABLE_old_rules',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_DISABLE_old_rules_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_DISABLE_old_rules_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => implode(' ', array(
                $this->l('Occasionally the old rules conflicts with the new ones.'),
                $this->l('If you experience malfunction, enable this and try again.')
            ))
        );

        $input_fields[] = array(
            'type' => 'select',
            'label' => $this->l('Selected Route to front:'),
            'name' => 'FSAU_ROUTE_FRONT',
            'is_multishop' => true,
            'options' => array(
                'query' => $this->getRoutesForSelector(),
                'id' => 'id',
                'name' => 'name',
            ),
        );

        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Debug mode'),
            'name' => 'FSAU_DEBUG_MODE',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_DEBUG_MODE_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_DEBUG_MODE_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => $this->l('When the module redirects, displays redirect info.')
        );

        if ($this->getDeletedLanguageIDs()) {
            $fields_value['FSAU_DELETE_TRASH_TRANSLATIONS'] = 0;
            $input_fields[] = array(
                'type' => ($this->isPs15())?'radio':'switch',
                'label' => $this->l('Delete trash translations'),
                'name' => 'FSAU_DELETE_TRASH_TRANSLATIONS',
                'class' => 't',
                'is_bool' => true,
                'is_multishop' => true,
                'values' => array(
                    array(
                        'id' => 'FSAU_DELETE_TRASH_TRANSLATIONS_on',
                        'value' => 1,
                        'label' => $this->l('Yes')
                    ),
                    array(
                        'id' => 'FSAU_DELETE_TRASH_TRANSLATIONS_off',
                        'value' => 0,
                        'label' => $this->l('No')
                    ),
                ),
                'desc' => $this->l('When you delete a language its translations not deleted from the database.').' '.
                    $this->l('If you select yes and click save the trash translations will be deleted.')
            );
        }

        $input_fields[] = array(
            'type' => ($this->isPs15())?'radio':'switch',
            'label' => $this->l('Disable Duplicate URL check'),
            'name' => 'FSAU_DISABLE_DUPLICATE_CHECK',
            'class' => 't',
            'is_bool' => true,
            'is_multishop' => true,
            'values' => array(
                array(
                    'id' => 'FSAU_DISABLE_DUPLICATE_CHECK_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ),
                array(
                    'id' => 'FSAU_DISABLE_DUPLICATE_CHECK_off',
                    'value' => 0,
                    'label' => $this->l('No')
                ),
            ),
            'desc' => implode(' ', array(
                $this->l('If you select yes, then when you save a content, duplicate URL will not be checked.')
            ))
        );


        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Advanced Settings'),
            ),
            'input' => $input_fields
        );

        $helper = new FsAdvancedUrlHelperFormMultiShop($this);
        $helper->setIdentifier('fsau_advanced_settings');
        $helper->setSubmitAction('save_'.$this->name);
        $helper->setTabSection('fsau_advanced_tab');
        $helper->setFieldsValue($fields_value);
        return $helper->generateForm($fields_form);
    }

    public function renderTabLayout($layout, $active_tab)
    {
        $this->smartyAssign(array(
            'fsau_tab_layout' => $layout,
            'fsau_active_tab' => $active_tab
        ));

        if ($this->isPs15()) {
            return $this->smartyFetch('admin/tab_layout_15.tpl');
        }

        return $this->smartyFetch('admin/tab_layout.tpl');
    }

    #################### HOOKS ####################

    public function hookModuleRoutes($params)
    {
        $context = Context::getContext();
        $context->smarty->assign('params_hash', sha1($this->jsonEncode($params)));
        $id_shop = $context->shop->id;

        //Add an extra home page route
        $rules = array();
        $rules['index_rule'] = array('controller' => 'index', 'rule' => '', 'keywords' => array(), 'params' => array());

        if (Configuration::get('FSAU_ENABLE_manufacturer_rule')) {
            $this->addHandleRoute('manufacturer_rule');
            $rules['manufacturer_rule'] = array(
                'controller' => 'manufacturer',
                'rule' => 'manufacturer/{rewrite}.html',
                'keywords' => array(
                    'id' => array('regexp' => '[0-9]+'),
                    'rewrite' => array(
                        'regexp' => '[_a-zA-Z0-9\pL\pS-]*',
                        'param' => 'fsau_rewrite_manufacturer'
                    ),
                    'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                ),
                'params' => array(
                    'fc' => 'controller'
                )
            );
        }

        if (Configuration::get('FSAU_ENABLE_supplier_rule')) {
            $this->addHandleRoute('supplier_rule');
            $rules['supplier_rule'] = array(
                'controller' => 'supplier',
                'rule' => 'supplier/{rewrite}.html',
                'keywords' => array(
                    'id' => array('regexp' => '[0-9]+'),
                    'rewrite' => array('regexp' => '[_a-zA-Z0-9\pL\pS-]*', 'param' => 'fsau_rewrite_supplier'),
                    'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                ),
                'params' => array(
                    'fc' => 'controller'
                )
            );
        }

        if (Configuration::get('FSAU_ENABLE_cms_category_rule')) {
            $this->addHandleRoute('cms_category_rule');
            $rules['cms_category_rule'] = array(
                'controller' => 'cms',
                'rule' => 'content/{categories:/}{rewrite}/',
                'keywords' => array(
                    'id' => array('regexp' => '[0-9]+'),
                    'rewrite' => array(
                        'regexp' => '[_a-zA-Z0-9\pL\pS-]*',
                        'param' => 'fsau_rewrite_cms_category'
                    ),
                    'categories' => array(
                        'regexp' => '[/_a-zA-Z0-9-\pL]*',
                        'param' => 'fsau_rewrite_cms_categories'
                    ),
                    'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                ),
                'params' => array(
                    'fc' => 'controller'
                )
            );

            if (!Configuration::get('FSAU_ENABLE_cmscr_categories')) {
                $rules['cms_category_rule']['rule'] = 'content/{rewrite}/';
                unset($rules['cms_category_rule']['keywords']['categories']['param']);
            }
        }

        if (Configuration::get('FSAU_ENABLE_cms_rule')) {
            $this->addHandleRoute('cms_rule');
            $rules['cms_rule'] = array(
                'controller' => 'cms',
                'rule' => 'content/{categories:/}{rewrite}.html',
                'keywords' => array(
                    'id' => array('regexp' => '[0-9]+'),
                    'rewrite' => array('regexp' => '[_a-zA-Z0-9\pL\pS-]*', 'param' => 'fsau_rewrite_cms'),
                    'categories' => array(
                        'regexp' => '[/_a-zA-Z0-9-\pL]*',
                        'param' => 'fsau_rewrite_cms_categories'
                    ),
                    'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                ),
                'params' => array(
                    'fc' => 'controller'
                )
            );

            if (!Configuration::get('FSAU_ENABLE_cmsr_categories')) {
                $rules['cms_rule']['rule'] = 'content/{rewrite}.html';
                unset($rules['cms_rule']['keywords']['categories']['param']);
            }
        }

        if (Configuration::get('FSAU_ENABLE_cr')) {
            $this->addHandleRoute('category_rule');
            $rules['category_rule'] = array(
                'controller' => 'category',
                'rule' => '{categories:/}{rewrite}/',
                'keywords' => array(
                    'id' => array('regexp' => '[0-9]+'),
                    'rewrite' => array('regexp' => '[_a-zA-Z0-9\pL\pS-]*', 'param' => 'fsau_rewrite_category'),
                    'categories' => array(
                        'regexp' => '[/_a-zA-Z0-9-\pL]*',
                        'param' => 'fsau_rewrite_categories'
                    ),
                    'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                ),
                'params' => array(
                    'fc' => 'controller'
                )
            );

            if (!Configuration::get('FSAU_ENABLE_cr_categories')) {
                $rules['category_rule']['rule'] = '{rewrite}/';
                unset($rules['category_rule']['keywords']['categories']['param']);
            }

            $this->addHandleRoute('layered_rule');
            $rules['layered_rule'] = array(
                'controller' => 'category',
                'rule' => '{categories:/}{rewrite}/{/:selected_filters}/',
                'keywords' => array(
                    'id' => array('regexp' => '[0-9]+'),
                    'selected_filters' => array('regexp' => '.*', 'param' => 'selected_filters'),
                    'rewrite' => array(
                        'regexp' => '[_a-zA-Z0-9\pL\pS-]*',
                        'param' => 'fsau_rewrite_category'
                    ),
                    'categories' => array(
                        'regexp' => '[/_a-zA-Z0-9-\pL]*',
                        'param' =>  'fsau_rewrite_categories'
                    ),
                    'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                ),
                'params' => array(
                    'fc' => 'controller'
                )
            );

            if (!Configuration::get('FSAU_ENABLE_cr_categories')) {
                $rules['layered_rule']['rule'] = '{rewrite}{/:selected_filters}';
                unset($rules['layered_rule']['keywords']['categories']['param']);
            }
        }

        if (Configuration::get('FSAU_ENABLE_pr')) {
            $this->addHandleRoute('product_rule');
            $rules['product_rule'] = array(
                'controller' => 'product',
                'rule' => '{categories:/}{rewrite}.html',
                'keywords' => array(
                    'id' => array('regexp' => '[0-9]+'),
                    'rewrite' => array('regexp' => '[_a-zA-Z0-9\pL\pS-]*', 'param' => 'fsau_rewrite_product'),
                    'ean13' => array('regexp' => '[0-9\pL]*'),
                    'category' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'categories' => array('regexp' => '[/_a-zA-Z0-9-\pL]*'),
                    'reference' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'manufacturer' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'supplier' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
                    'price' => array('regexp' => '[0-9\.,]*'),
                    'tags' => array('regexp' => '[a-zA-Z0-9-\pL]*'),
                ),
                'params' => array(
                    'fc' => 'controller',
                    //'fsau_pre_dispatcher_module' => 'fsadvancedurl',
                    //'fsau_pre_dispatcher_function' => 'preDispatch',
                    //'fsau_multilang_route' => true
                )
            );

            $force_id_product_attribute = false;
            if ((Tools::getValue('action', 'none') == 'productrefresh')
                && Tools::getValue('ajax', false)
                && Tools::getValue('id_product', false)
                && Tools::getValue('qty', false)
                && Tools::isSubmit('group')) {
                $force_id_product_attribute = true;
            }

            if ($this->isPsMin17() && !$force_id_product_attribute) {
                $rules['product_rule']['keywords']['id_product_attribute'] = array(
                    'regexp' => '[0-9]+'
                );
            }

            if (Configuration::get('FSAU_ENABLE_pr_category')) {
                $rules['product_rule']['rule'] = '{category:/}{rewrite}.html';
                $rules['product_rule']['keywords']['category'] = array(
                    'regexp' => '[/_a-zA-Z0-9-\pL]*',
                    'param' => 'fsau_rewrite_category'
                );
            }

            if (Configuration::get('FSAU_ENABLE_pr_categories')) {
                $rules['product_rule']['rule'] = '{categories:/}{rewrite}.html';
                $rules['product_rule']['keywords']['categories'] = array(
                    'regexp' => '[/_a-zA-Z0-9-\pL]*',
                    'param' => 'fsau_rewrite_categories'
                );
            }
        }

        $old_rewrite_rules = Configuration::get('FSAU_OLD_REWRITE_RULES');
        $disable_old_rules = Configuration::get('FSAU_DISABLE_old_rules');
        if (Shop::isFeatureActive()) {
            $old_rewrite_rules = Configuration::get('FSAU_OLD_REWRITE_RULES', false, null, $id_shop);
            $disable_old_rules = Configuration::get('FSAU_DISABLE_old_rules', false, null, $id_shop);
        }

        if ($old_rewrite_rules && !$disable_old_rules) {
            $old_rewrite_rules = $this->jsonDecode($old_rewrite_rules, true);
            if (is_array($old_rewrite_rules) && (bool)$old_rewrite_rules) {
                foreach ($old_rewrite_rules as $rule => $route) {
                    $rules['old_'.$rule] = $route;
                    $rules['old_'.$rule]['params'] = array();
                }
            }
        }

        return $rules;
    }

    public function hookActionDispatcher($params)
    {
        if ($params['controller_type'] == 1) {
            $context = Context::getContext();
            $id_lang = $context->cookie->id_lang;
            $id_shop = $context->shop->id;
            $dispatcher = Dispatcher::getInstance();
            if (!Tools::isCallable(array($dispatcher, 'getRoutes')) ||
                !Tools::isCallable(array($dispatcher, 'getRequestUri'))) {
                return false;
            }

            $this->debug_data = array_merge(array(
                'context' => Context::getContext(),
                'controller' => $params['controller_class']
            ), $this->debug_data);

            switch ($params['controller_class']) {
                case 'ProductController':
                    if (Tools::getValue('fsau_rewrite_product')) {
                        $id_product = Tools::getValue('id_product');
                        if (!$id_product) {
                            $redirect_type = Configuration::get('FSAU_product_rule_RT');
                            if ($redirect_type == 'category') {
                                $id_category = $this->getLastIdCategoryFromCategoriesRewrite(
                                    Tools::getValue('fsau_rewrite_categories'),
                                    $context->shop->id_category,
                                    $id_lang,
                                    $id_shop
                                );

                                $id_category = $this->getIdCategoryFromCategoryRewrite(
                                    Tools::getValue('fsau_rewrite_category'),
                                    $id_category,
                                    $id_lang,
                                    $id_shop
                                );

                                if ($id_category != $context->shop->id_category) {
                                    $redirect_url = $context->link->getCategoryLink($id_category);
                                    $this->redirect($redirect_url, 'HTTP/1.1 301 Moved Permanently');
                                }

                                $this->redirect(
                                    $context->link->getPageLink('index'),
                                    'HTTP/1.1 301 Moved Permanently'
                                );
                            } else {
                                $this->redirect(
                                    $context->link->getPageLink($this->pagenotfound_name),
                                    'HTTP/1.1 404 Not Found'
                                );
                            }
                        }

                        $_GET['id_product'] = $id_product;
                        if ($this->getIsset('fsau_rewrite_product')) {
                            $_GET['rewrite'] = Tools::getValue('fsau_rewrite_product');
                            unset($_GET['fsau_rewrite_product']);
                        }
                        if ($this->getIsset('fsau_rewrite_categories')) {
                            unset($_GET['fsau_rewrite_categories']);
                        }
                        if ($this->getIsset('fc')) {
                            unset($_GET['fc']);
                        }
                    }
                    break;

                case 'CategoryController':
                    if (Tools::getValue('fsau_rewrite_category')) {
                        $id_category = Tools::getValue('id_category');
                        if (!$id_category) {
                            $redirect_type = Configuration::get('FSAU_category_rule_RT');
                            if ($redirect_type == 'parent') {
                                $id_parent = $this->getLastIdCategoryFromCategoriesRewrite(
                                    Tools::getValue('fsau_rewrite_categories'),
                                    $context->shop->id_category,
                                    $id_lang,
                                    $id_shop
                                );

                                if ($id_parent != $context->shop->id_category) {
                                    $redirect_url = $context->link->getCategoryLink($id_parent);
                                    $this->redirect($redirect_url, 'HTTP/1.1 301 Moved Permanently');
                                }

                                $this->redirect(
                                    $context->link->getPageLink('index'),
                                    'HTTP/1.1 301 Moved Permanently'
                                );
                            } elseif ($redirect_type == '404') {
                                $this->redirect(
                                    $context->link->getPageLink($this->pagenotfound_name),
                                    'HTTP/1.1 404 Not Found'
                                );
                            }

                            $this->redirect(
                                $context->link->getPageLink($this->pagenotfound_name),
                                'HTTP/1.0 404 Not Found'
                            );
                        }

                        if (Tools::getValue('selected_filters_maybe')) {
                            $_GET['selected_filters'] = Tools::getValue('selected_filters_maybe');
                            unset($_GET['selected_filters_maybe']);
                        }

                        if ($this->isPsMin17() && Tools::getValue('selected_filters')) {
                            $_GET['q'] = Tools::getValue('selected_filters');
                        }

                        $_GET['id_category'] = $id_category;
                        if ($this->getIsset('fsau_rewrite_category')) {
                            unset($_GET['fsau_rewrite_category']);
                        }
                        if ($this->getIsset('fsau_rewrite_categories')) {
                            unset($_GET['fsau_rewrite_categories']);
                        }
                        if ($this->getIsset('fc')) {
                            unset($_GET['fc']);
                        }
                    }
                    break;

                case 'ManufacturerController':
                    if (Tools::getValue('fsau_rewrite_manufacturer')) {
                        $id_manufacturer = Tools::getValue('id_manufacturer');
                        if (!$id_manufacturer) {
                            $redirect_type = Configuration::get('FSAU_manufacturer_rule_RT');
                            if ($redirect_type == 'parent') {
                                $this->redirect(
                                    $context->link->getPageLink('manufacturer'),
                                    'HTTP/1.1 301 Moved Permanently'
                                );
                            }

                            $this->redirect(
                                $context->link->getPageLink($this->pagenotfound_name),
                                'HTTP/1.1 404 Not Found'
                            );
                        }

                        $_GET['id_manufacturer'] = $id_manufacturer;
                        if ($this->getIsset('fsau_rewrite_manufacturer')) {
                            unset($_GET['fsau_rewrite_manufacturer']);
                        }
                        if ($this->getIsset('fc')) {
                            unset($_GET['fc']);
                        }
                    }
                    break;

                case 'SupplierController':
                    if (Tools::getValue('fsau_rewrite_supplier')) {
                        $id_supplier = Tools::getValue('id_supplier');
                        if (!$id_supplier) {
                            $redirect_type = Configuration::get('FSAU_supplier_rule_RT');
                            if ($redirect_type == 'parent') {
                                $this->redirect(
                                    $context->link->getPageLink('supplier'),
                                    'HTTP/1.1 301 Moved Permanently'
                                );
                            }

                            $this->redirect(
                                $context->link->getPageLink($this->pagenotfound_name),
                                'HTTP/1.1 404 Not Found'
                            );
                        }

                        $_GET['id_supplier'] = $id_supplier;
                        if ($this->getIsset('fsau_rewrite_supplier')) {
                            unset($_GET['fsau_rewrite_supplier']);
                        }
                        if ($this->getIsset('fc')) {
                            unset($_GET['fc']);
                        }
                    }
                    break;

                case 'CmsController':
                    if (Tools::getValue('fsau_rewrite_cms')) {
                        $id_cms = Tools::getValue('id_cms');

                        if (!$id_cms) {
                            $redirect_type = Configuration::get('FSAU_cms_rule_RT');
                            if ($redirect_type == 'category') {
                                $id_parent = $this->getLastIdCMSCategoryFromCMSCategoriesRewrite(
                                    Tools::getValue('fsau_rewrite_cms_categories'),
                                    $id_lang,
                                    $id_shop
                                );

                                if ($id_parent > 1) {
                                    $redirect_url = $context->link->getCMSCategoryLink($id_parent);
                                    $this->redirect($redirect_url, 'HTTP/1.1 301 Moved Permanently');
                                }
                            }

                            $this->redirect(
                                $context->link->getPageLink($this->pagenotfound_name),
                                'HTTP/1.1 404 Not Found'
                            );
                        }

                        $_GET['id_cms'] = $id_cms;
                        if ($this->getIsset('fsau_rewrite_cms')) {
                            unset($_GET['fsau_rewrite_cms']);
                        }
                        if ($this->getIsset('fsau_rewrite_cms_categories')) {
                            unset($_GET['fsau_rewrite_cms_categories']);
                        }
                        if ($this->getIsset('fc')) {
                            unset($_GET['fc']);
                        }
                    } elseif (Tools::getValue('fsau_rewrite_cms_category')) {
                        $id_cms_category = Tools::getValue('id_cms_category');

                        if (!$id_cms_category) {
                            $redirect_type = Configuration::get('FSAU_cms_category_rule_RT');
                            if ($redirect_type == 'parent') {
                                $id_parent = $this->getLastIdCMSCategoryFromCMSCategoriesRewrite(
                                    Tools::getValue('fsau_rewrite_cms_categories'),
                                    $id_lang,
                                    $id_shop
                                );

                                if ($id_parent > 1) {
                                    $redirect_url = $context->link->getCMSCategoryLink($id_parent);
                                    $this->redirect($redirect_url, 'HTTP/1.1 301 Moved Permanently');
                                }
                            }

                            $this->redirect(
                                $context->link->getPageLink($this->pagenotfound_name),
                                'HTTP/1.1 404 Not Found'
                            );
                        }

                        $_GET['id_cms_category'] = $id_cms_category;
                        if ($this->getIsset('fsau_rewrite_cms_category')) {
                            unset($_GET['fsau_rewrite_cms_category']);
                        }
                        if ($this->getIsset('fsau_rewrite_cms_categories')) {
                            unset($_GET['fsau_rewrite_cms_categories']);
                        }
                        if ($this->getIsset('fc')) {
                            unset($_GET['fc']);
                        }
                    }
                    break;

                case 'PageNotFoundController':
                    $current_url = FsAdvancedUrlTools::getCurrentUrl();
                    $not_found_url = $context->link->getPageLink($this->pagenotfound_name);

                    //If the 404 not in friendly format we redirect to it.
                    if (FsAdvancedUrlTools::contains($current_url, 'index.php?controller=404')) {
                        if (str_replace('https://', 'http://', $current_url) !=
                            str_replace('https://', 'http://', $not_found_url)) {
                            $this->redirect(
                                $not_found_url,
                                'HTTP/1.1 404 Not Found'
                            );
                        }
                    }

                    //If the URL contains an /index.php, remove it and redirect to it.
                    if (FsAdvancedUrlTools::contains($current_url, '/index.php')) {
                        $redirect_url = str_replace('/index.php', '', $current_url);
                        $this->redirect(
                            $redirect_url,
                            'HTTP/1.1 301 Moved Permanently'
                        );
                    }
                    break;
            }
        }
    }

    public function hookDisplayHeader($param)
    {
        /*if (Configuration::get('FSAU_DEBUG_MODE')) {
            $this->debug_data['query'] = $_GET;
            if ($this->isPsMin17()) {
                dump($this->debug_data);
            }
        }*/

        if ($this->isPsMin17() && isset($this->context->controller->php_self)
            && in_array($this->context->controller->php_self, array('product'))) {
            $product = $this->context->controller->getProduct();
            if (Validate::isLoadedObject($product)) {
                $attribute_ids = Product::getProductAttributesIds($product->id);
                if ($attribute_ids) {
                    $product_base_url = $this->context->link->getProductLink($product);
                    $product_base_url = explode('#', $product_base_url);
                    $product_base_url = $product_base_url[0];
                    $query_param = '?';
                    if (FsAdvancedUrlTools::contains($product_base_url, '?')) {
                        $query_param = '&';
                    }

                    $pa_urls = array();
                    foreach ($attribute_ids as $id_product_attribute) {
                        $anchor = $product->getAnchor(
                            $id_product_attribute['id_product_attribute'],
                            true
                        );

                        $pa_urls[$anchor] = $product_base_url.$query_param.'id_product_attribute=';
                        $pa_urls[$anchor] .= $id_product_attribute['id_product_attribute'];
                        $pa_urls[$anchor] .= $anchor;
                    }

                    $this->addJS('front.js');
                    $this->smartyAssign(array(
                        'fsau_product_urls' => $pa_urls,
                        'fsau_params_hash' => sha1($this->jsonEncode($param)),
                    ));
                    return $this->smartyFetch('front/css_js.tpl', true);
                }
            }
        }
        return '';
    }

    #################### ADMIN HOOKS ####################

    public function hookActionObjectProductAddAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        if (Configuration::get('FSAU_ENABLE_pr')) {
            $p = $params['object'];
            $id_product = $p->id;
            $context = Context::getContext();

            $shops = Shop::getShops();
            $languages = Language::getLanguages(self::DUPLICATE_CHECK_ON_ONLY_ACTIVE_LANGUAGE);
            foreach ($shops as $shop) {
                $id_shop = $shop['id_shop'];
                foreach ($languages as $language) {
                    $id_lang = $language['id_lang'];
                    $iso_lang = $language['iso_code'];
                    $link_rewrite = '';
                    if (isset($p->link_rewrite[$id_lang])) {
                        $link_rewrite = $p->link_rewrite[$id_lang];
                    }

                    $sql = 'SELECT pl.`id_product`, pl.`name` FROM `'._DB_PREFIX_.'product_lang` pl LEFT JOIN `';
                    $sql .= _DB_PREFIX_.'product` p ON pl.`id_product` = p.`id_product`';
                    $sql .= ' WHERE pl.`id_shop` = \''.pSQL($id_shop).'\' AND pl.`link_rewrite` = \'';
                    $sql .= pSQL($link_rewrite).'\' AND pl.`id_lang` = \''.pSQL($id_lang).'\'';
                    $sql .= ' AND pl.`id_product` != \''.pSQL($id_product).'\'';

                    if (Configuration::get('FSAU_ENABLE_pr_categories') ||
                        Configuration::get('FSAU_ENABLE_pr_category')) {
                        $sql .= ' AND p.id_category_default = \''.pSQL($p->id_category_default).'\'';
                    }

                    if ($this->isPsMin17()) {
                        $sql .= ' AND p.`state` = 1';
                    }

                    $result = Db::getInstance()->getRow($sql);
                    if ($result) {
                        $msg = $this->l('Duplicate Friendly URL').': "'.$link_rewrite.'"';
                        $msg .= ' - '.$this->l('Lang').': "'.$iso_lang.'" - '.
                            $this->l('Conflicts with').': "'.$result['name'].'"';
                        $msg .= ' - '.$this->l('ID').': "'.$result['id_product'].'"';
                        $msg .= ' - '.$this->l('Type').': "'.$this->l('Product').'"';
                        $context->controller->errors[] = $msg;
                    }

                    $current_rule = 'product_rule';
                    $same_rules = $this->getSameRuleRoutes($current_rule, $id_lang, $id_shop);
                    if (isset($same_rules[$current_rule])) {
                        unset($same_rules[$current_rule]);
                        foreach (array_keys($same_rules) as $route_id) {
                            $info = $this->getDuplicates($route_id, $link_rewrite, $id_lang, $id_shop);
                            if ($info['items']) {
                                foreach ($info['items'] as $item) {
                                    $msg = $this->l('Duplicate Friendly URL').': "'.$link_rewrite.'"';
                                    $msg .= ' - '.$this->l('Lang').': "'.$iso_lang.'" - '.
                                        $this->l('Conflicts with').': "'.$item['name'].'"';
                                    $msg .= ' - '.$this->l('ID').': "'.$item['id'].'"';
                                    $msg .= ' - '.$this->l('Type').': "'.$info['type'].'"';
                                    $context->controller->errors[] = $msg;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function hookActionObjectProductUpdateAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        $this->hookActionObjectProductAddAfter($params);

        if ($this->isPsMin17()) {
            $context = Context::getContext();
            if (count($context->controller->errors)) {
                header("HTTP/1.1 400 Bad Request");
                die($this->jsonEncode(array('step5_link_rewrite' => $context->controller->errors)));
            }
        }
    }

    public function hookActionObjectCategoryAddAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        if (Configuration::get('FSAU_ENABLE_cr')) {
            $c = $params['object'];
            $id_category = $c->id;
            $context = Context::getContext();

            $shops = Shop::getShops();
            if (Tools::isSubmit('checkBoxShopAsso_category')) {
                $asso_shops = Tools::getValue('checkBoxShopAsso_category');
                if ($asso_shops) {
                    $shops = array();
                    foreach ($asso_shops as $id_shop_asso) {
                        $shops[] = array(
                            'id_shop' => $id_shop_asso
                        );
                    }
                }
            }

            $languages = Language::getLanguages(self::DUPLICATE_CHECK_ON_ONLY_ACTIVE_LANGUAGE);
            foreach ($shops as $shop) {
                $id_shop = $shop['id_shop'];
                foreach ($languages as $language) {
                    $id_lang = $language['id_lang'];
                    $iso_lang = $language['iso_code'];
                    $link_rewrite = '';
                    if (isset($c->link_rewrite[$id_lang])) {
                        $link_rewrite = $c->link_rewrite[$id_lang];
                    }

                    $sql = 'SELECT cl.`id_category`, cl.`name` FROM `'._DB_PREFIX_.'category_lang` cl LEFT JOIN `';
                    $sql .= _DB_PREFIX_.'category` c ON cl.`id_category` = c.`id_category`';
                    $sql .= ' LEFT JOIN `'._DB_PREFIX_.'category_shop` cs';
                    $sql .= ' ON cl.id_shop = cs.id_shop AND cs.id_category = c.id_category';
                    $sql .= ' WHERE cl.`id_shop` = \''.pSQL($id_shop).'\'';
                    $sql .= ' AND cs.`id_shop` IS NOT NULL';
                    $sql .= ' AND cl.`link_rewrite` = \''.pSQL($link_rewrite).'\'';
                    $sql .= ' AND cl.`id_lang` = \''.pSQL($id_lang).'\'';
                    $sql .= ' AND cl.`id_category` != \''.pSQL($id_category).'\'';

                    if (Configuration::get('FSAU_ENABLE_cr_categories')) {
                        $sql .= ' AND c.id_parent = \''.pSQL($c->id_parent).'\'';
                    }

                    $result = Db::getInstance()->getRow($sql);
                    if ($result) {
                        $msg = $this->l('Duplicate Friendly URL').': "'.$link_rewrite.'"';
                        $msg .= ' - '.$this->l('Lang').': "'.$iso_lang.'" - '.
                            $this->l('Conflicts with').': "'.$result['name'].'"';
                        $msg .= ' - '.$this->l('ID').': "'.$result['id_category'].'"';
                        $msg .= ' - '.$this->l('Type').': "'.$this->l('Category').'"';
                        $context->controller->errors[] = $msg;
                    }

                    $current_rule = 'category_rule';
                    $same_rules = $this->getSameRuleRoutes($current_rule, $id_lang, $id_shop);
                    if (isset($same_rules[$current_rule])) {
                        unset($same_rules[$current_rule]);
                        foreach (array_keys($same_rules) as $route_id) {
                            $info = $this->getDuplicates($route_id, $link_rewrite, $id_lang, $id_shop);
                            if ($info['items']) {
                                foreach ($info['items'] as $item) {
                                    $msg = $this->l('Duplicate Friendly URL').': "'.$link_rewrite.'"';
                                    $msg .= ' - '.$this->l('Lang').': "'.$iso_lang.'" - '.
                                        $this->l('Conflicts with').': "'.$item['name'].'"';
                                    $msg .= ' - '.$this->l('ID').': "'.$item['id'].'"';
                                    $msg .= ' - '.$this->l('Type').': "'.$info['type'].'"';
                                    $context->controller->errors[] = $msg;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function hookActionObjectCategoryUpdateAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        $this->hookActionObjectCategoryAddAfter($params);
    }

    public function hookActionObjectManufacturerAddAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        if (Configuration::get('FSAU_ENABLE_manufacturer_rule')) {
            $m = $params['object'];
            $id_manufacturer = $m->id;
            $context = Context::getContext();

            $shops = Shop::getShops();
            $languages = Language::getLanguages(self::DUPLICATE_CHECK_ON_ONLY_ACTIVE_LANGUAGE);
            foreach ($shops as $shop) {
                $id_shop = $shop['id_shop'];
                $name = '';
                if (isset($m->name)) {
                    $name = $m->name;
                }

                $sql = 'SELECT m.`id_manufacturer`, m.`name` FROM `'._DB_PREFIX_;
                $sql .= 'manufacturer` m LEFT JOIN `'._DB_PREFIX_.'manufacturer_shop` ms';
                $sql .= ' ON m.`id_manufacturer` = ms.`id_manufacturer` WHERE ms.`id_shop` = \''.pSQL($id_shop).'\'';
                $sql .= ' AND m.`name` = \''.pSQL($name).'\' AND m.`id_manufacturer` != \''.pSQL($id_manufacturer).'\'';

                $result = Db::getInstance()->getRow($sql);
                if ($result) {
                    $msg = $this->l('Duplicate Name').': "'.$name.'"';
                    $msg .= ' - '.$this->l('Conflicts with').': "'.$result['name'].'"';
                    $msg .= ' - '.$this->l('ID').': "'.$result['id_manufacturer'].'"';
                    $context->controller->errors[] = $msg;
                }

                $current_rule = 'manufacturer_rule';
                foreach ($languages as $language) {
                    $id_lang = $language['id_lang'];
                    $iso_lang = $language['iso_code'];
                    $link_rewrite = Tools::str2url($name);

                    $same_rules = $this->getSameRuleRoutes($current_rule, $id_lang, $id_shop);
                    if (isset($same_rules[$current_rule])) {
                        unset($same_rules[$current_rule]);
                        foreach (array_keys($same_rules) as $route_id) {
                            $info = $this->getDuplicates($route_id, $link_rewrite, $id_lang, $id_shop);
                            if ($info['items']) {
                                foreach ($info['items'] as $item) {
                                    $msg = $this->l('Duplicate Friendly URL').': "'.$link_rewrite.'"';
                                    $msg .= ' - '.$this->l('Lang').': "'.$iso_lang.'" - '.
                                        $this->l('Conflicts with').': "'.$result['name'].'"';
                                    $msg .= ' - '.$this->l('ID').': "'.$item['id'].'"';
                                    $msg .= ' - '.$this->l('Type').': "'.$info['type'].'"';
                                    $context->controller->errors[] = $msg;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function hookActionObjectManufacturerUpdateAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        $this->hookActionObjectManufacturerAddAfter($params);
    }

    public function hookActionObjectSupplierAddAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        if (Configuration::get('FSAU_ENABLE_supplier_rule')) {
            $s = $params['object'];
            $id_supplier = $s->id;
            $context = Context::getContext();

            $shops = Shop::getShops();
            $languages = Language::getLanguages(self::DUPLICATE_CHECK_ON_ONLY_ACTIVE_LANGUAGE);
            foreach ($shops as $shop) {
                $id_shop = $shop['id_shop'];
                $name = '';
                if (isset($s->name)) {
                    $name = $s->name;
                }

                $sql = 'SELECT s.`id_supplier`, s.`name` FROM `'._DB_PREFIX_.'supplier` s LEFT JOIN `';
                $sql .= _DB_PREFIX_.'supplier_shop` ss ON s.`id_supplier` = ss.`id_supplier`';
                $sql .= ' WHERE ss.`id_shop` = \''.pSQL($id_shop).'\' AND s.`name` = \''.pSQL($name).'\'';
                $sql .= ' AND s.`id_supplier` != \''.pSQL($id_supplier).'\'';

                $result = Db::getInstance()->getRow($sql);
                if ($result) {
                    $msg = $this->l('Duplicate Name').': "'.$name.'"';
                    $msg .= ' - '.$this->l('Conflicts with').': "'.$result['name'].'"';
                    $msg .= ' - '.$this->l('ID').': "'.$result['id_supplier'].'"';
                    $context->controller->errors[] = $msg;
                }

                $current_rule = 'supplier_rule';
                foreach ($languages as $language) {
                    $id_lang = $language['id_lang'];
                    $iso_lang = $language['iso_code'];
                    $link_rewrite = Tools::str2url($name);

                    $same_rules = $this->getSameRuleRoutes($current_rule, $id_lang, $id_shop);
                    if (isset($same_rules[$current_rule])) {
                        unset($same_rules[$current_rule]);
                        foreach (array_keys($same_rules) as $route_id) {
                            $info = $this->getDuplicates($route_id, $link_rewrite, $id_lang, $id_shop);
                            if ($info['items']) {
                                foreach ($info['items'] as $item) {
                                    $msg = $this->l('Duplicate Friendly URL').': "'.$link_rewrite.'"';
                                    $msg .= ' - '.$this->l('Lang').': "'.$iso_lang.'" - '.
                                        $this->l('Conflicts with').': "'.$result['name'].'"';
                                    $msg .= ' - '.$this->l('ID').': "'.$item['id'].'"';
                                    $msg .= ' - '.$this->l('Type').': "'.$info['type'].'"';
                                    $context->controller->errors[] = $msg;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function hookActionObjectSupplierUpdateAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        $this->hookActionObjectSupplierAddAfter($params);
    }

    public function hookActionObjectCMSAddAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        if (Configuration::get('FSAU_ENABLE_cms_rule')) {
            $c = $params['object'];
            $id_cms = $c->id;
            $context = Context::getContext();

            $shops = Shop::getShops();
            $languages = Language::getLanguages(self::DUPLICATE_CHECK_ON_ONLY_ACTIVE_LANGUAGE);
            foreach ($shops as $shop) {
                $id_shop = $shop['id_shop'];
                foreach ($languages as $language) {
                    $id_lang = $language['id_lang'];
                    $iso_lang = $language['iso_code'];
                    $link_rewrite = '';
                    if (isset($c->link_rewrite[$id_lang])) {
                        $link_rewrite = $c->link_rewrite[$id_lang];
                    }

                    $sql = 'SELECT cl.`id_cms`, cl.`meta_title` FROM `'._DB_PREFIX_.'cms_lang` cl LEFT JOIN `';
                    $sql .= _DB_PREFIX_.'cms` c ON cl.`id_cms` = c.`id_cms` LEFT JOIN `'._DB_PREFIX_.'cms_shop` cs';
                    $sql .= ' ON cl.`id_cms` = cs.`id_cms` WHERE cs.`id_shop` = \''.pSQL($id_shop).'\'';
                    $sql .= ' AND cl.`link_rewrite` = \''.pSQL($link_rewrite).'\'';
                    $sql .= ' AND cl.`id_lang` = \''.pSQL($id_lang).'\' AND cl.`id_cms` != \''.pSQL($id_cms).'\'';

                    $result = Db::getInstance()->getRow($sql);
                    if ($result) {
                        $msg = $this->l('Duplicate Friendly URL').': "'.$link_rewrite.'"';
                        $msg .= ' - '.$this->l('Lang').': "'.$iso_lang.'" - '.
                            $this->l('Conflicts with').': "'.$result['meta_title'].'"';
                        $msg .= ' - '.$this->l('ID').': "'.$result['id_cms'].'"';
                        $context->controller->errors[] = $msg;
                    }

                    $current_rule = 'cms_rule';
                    $same_rules = $this->getSameRuleRoutes($current_rule, $id_lang, $id_shop);
                    if (isset($same_rules[$current_rule])) {
                        unset($same_rules[$current_rule]);
                        foreach (array_keys($same_rules) as $route_id) {
                            $info = $this->getDuplicates($route_id, $link_rewrite, $id_lang, $id_shop);
                            if ($info['items']) {
                                foreach ($info['items'] as $item) {
                                    $msg = $this->l('Duplicate Friendly URL').': "'.$link_rewrite.'"';
                                    $msg .= ' - '.$this->l('Lang').': "'.$iso_lang.'" - '.
                                        $this->l('Conflicts with').': "'.$item['name'].'"';
                                    $msg .= ' - '.$this->l('ID').': "'.$item['id'].'"';
                                    $msg .= ' - '.$this->l('Type').': "'.$info['type'].'"';
                                    $context->controller->errors[] = $msg;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function hookActionObjectCMSUpdateAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        $this->hookActionObjectCMSAddAfter($params);
    }

    public function hookActionObjectCMSCategoryAddAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        if (Configuration::get('FSAU_ENABLE_cms_rule')) {
            $cc = $params['object'];
            $id_cms_category = $cc->id;
            $context = Context::getContext();

            $languages = Language::getLanguages(self::DUPLICATE_CHECK_ON_ONLY_ACTIVE_LANGUAGE);
            foreach ($languages as $language) {
                $id_lang = $language['id_lang'];
                $iso_lang = $language['iso_code'];
                $link_rewrite = '';
                if (isset($cc->link_rewrite[$id_lang])) {
                    $link_rewrite = $cc->link_rewrite[$id_lang];
                }

                $sql = 'SELECT ccl.`id_cms_category`, ccl.`name` FROM `'._DB_PREFIX_;
                $sql .= 'cms_category_lang` ccl LEFT JOIN `'._DB_PREFIX_.'cms_category` cc';
                $sql .= ' ON ccl.`id_cms_category` = cc.`id_cms_category`';
                $sql .= ' WHERE ccl.`link_rewrite` = \''.pSQL($link_rewrite).'\'';
                $sql .= ' AND ccl.`id_lang` = \''.pSQL($id_lang).'\'';
                $sql .= ' AND ccl.`id_cms_category` != \''.pSQL($id_cms_category).'\'';

                $result = Db::getInstance()->getRow($sql);
                if ($result) {
                    $msg = $this->l('Duplicate Friendly URL').': "'.$link_rewrite.'"';
                    $msg .= ' - '.$this->l('Lang').': "'.$iso_lang.'" - '.
                        $this->l('Conflicts with').': "'.$result['name'].'"';
                    $msg .= ' - '.$this->l('ID').': "'.$result['id_cms_category'].'"';
                    $context->controller->errors[] = $msg;
                }

                $current_rule = 'cms_category_rule';
                $same_rules = $this->getSameRuleRoutes($current_rule, $id_lang, $this->context->shop->id);
                if (isset($same_rules[$current_rule])) {
                    unset($same_rules[$current_rule]);
                    foreach (array_keys($same_rules) as $route_id) {
                        $info = $this->getDuplicates($route_id, $link_rewrite, $id_lang);
                        if ($info['items']) {
                            foreach ($info['items'] as $item) {
                                $msg = $this->l('Duplicate Friendly URL').': "'.$link_rewrite.'"';
                                $msg .= ' - '.$this->l('Lang').': "'.$iso_lang.'" - '.
                                    $this->l('Conflicts with').': "'.$item['name'].'"';
                                $msg .= ' - '.$this->l('ID').': "'.$item['id'].'"';
                                $msg .= ' - '.$this->l('Type').': "'.$info['type'].'"';
                                $context->controller->errors[] = $msg;
                            }
                        }
                    }
                }
            }
        }
    }

    public function hookActionObjectCMSCategoryUpdateAfter($params)
    {
        if (Configuration::get('FSAU_DISABLE_DUPLICATE_CHECK')) {
            return;
        }

        $this->hookActionObjectCMSCategoryAddAfter($params);
    }

    public function hookDisplayBackOfficeHeader($params)
    {
        $config = array(
            'menu_button_text' => $this->l('Duplicated URLs'),
            'menu_button_url' => $this->url().'&tab_section=fsau_duplicate_tab',
            'params_hash' => sha1($this->jsonEncode($params)),
            'module_path' => $this->getPath()
        );

        $this->smartyAssign(array('fsau_admin_css_js' => $config));
        return $this->smartyFetch('admin/css_js.tpl');
    }

    public function getDuplicates($route_id, $link_rewrite, $id_lang = null, $id_shop = null)
    {
        $return = array('items' => array(), 'type' => '');

        if (!$id_lang) {
            $id_lang = $this->context->language->id;
        }

        if (!$id_shop) {
            $id_shop = $this->context->shop->id;
        }

        switch ($route_id) {
            case 'product_rule':
                $return['type'] = $this->l('Product');
                $sql = 'SELECT `id_product` as `id`, `name` FROM `'._DB_PREFIX_.'product_lang`';
                $sql .= ' WHERE `id_shop` = \''.pSQL($id_shop).'\' AND `link_rewrite` = \'';
                $sql .= pSQL($link_rewrite).'\' AND `id_lang` = \''.pSQL($id_lang).'\'';
                $return['items'] = Db::getInstance()->executeS($sql);
                break;
            case 'category_rule':
                $return['type'] = $this->l('Category');
                $sql = 'SELECT `id_category` as `id`, `name` FROM `'._DB_PREFIX_.'category_lang`';
                $sql .= ' WHERE `id_shop` = \''.pSQL($id_shop).'\' AND `link_rewrite` = \'';
                $sql .= pSQL($link_rewrite).'\' AND `id_lang` = \''.pSQL($id_lang).'\'';
                $return['items'] = Db::getInstance()->executeS($sql);
                break;
            case 'manufacturer_rule':
                $return['type'] = $this->l('Manufacturer');
                $manufacturers = Db::getInstance()->executeS(
                    'SELECT m.`id_manufacturer` as `id`, m.`name` FROM `'._DB_PREFIX_.'manufacturer` m
                    LEFT JOIN `'._DB_PREFIX_.'manufacturer_shop` ms ON m.id_manufacturer = ms.id_manufacturer
                    WHERE ms.`id_shop` = \''.pSQL($id_shop).'\''
                );
                $items = array();
                if ($manufacturers) {
                    foreach ($manufacturers as $manufacturer) {
                        if ($link_rewrite == Tools::str2url($manufacturer['name'])) {
                            $items[] = array(
                                'id' => $manufacturer['id'],
                                'name' => $manufacturer['name']
                            );
                        }
                    }
                    $return['items'] = $items;
                }
                break;
            case 'supplier_rule':
                $return['type'] = $this->l('Supplier');
                $suppliers = Db::getInstance()->executeS(
                    'SELECT s.`id_supplier` as `id`, s.`name` FROM `'._DB_PREFIX_.'supplier` s
                    LEFT JOIN `'._DB_PREFIX_.'supplier_shop` ss ON s.id_supplier = ss.id_supplier
                    WHERE ss.`id_shop` = \''.pSQL($id_shop).'\''
                );
                $items = array();
                if ($suppliers) {
                    foreach ($suppliers as $supplier) {
                        if ($link_rewrite == Tools::str2url($supplier['name'])) {
                            $items[] = array(
                                'id' => $supplier['id'],
                                'name' => $supplier['name']
                            );
                        }
                    }
                    $return['items'] = $items;
                }
                break;
            case 'cms_rule':
                $return['type'] = $this->l('CMS Page');
                $sql = 'SELECT `id_cms` as `id`, `meta_title` as `name` FROM `'._DB_PREFIX_.'cms_lang`';
                $sql .= ' WHERE `id_lang` = \''.pSQL($id_lang).'\' AND `link_rewrite` = \''.pSQL($link_rewrite).'\'';
                if ($this->isPsMin17()) {
                    $sql .= ' AND `id_shop` = \''.pSQL($id_shop).'\'';
                }
                $return['items'] = Db::getInstance()->executeS($sql);
                break;
            case 'cms_category_rule':
                $return['type'] = $this->l('CMS Category');
                $sql = 'SELECT `id_cms_category` as `id`, `name` FROM `'._DB_PREFIX_.'cms_category_lang`';
                $sql .= ' WHERE `link_rewrite` = \''.pSQL($link_rewrite).'\' AND `id_lang` = \''.pSQL($id_lang).'\'';
                $return['items'] = Db::getInstance()->executeS($sql);
                break;
        }

        return $return;
    }

    #################### FUNCTIONS ####################

    public function redirect($redirect_url, $headers)
    {
        if (Configuration::get('FSAU_DEBUG_MODE') && $_SERVER['REQUEST_URI'] != __PS_BASE_URI__) {
            /*$data = array_merge(array(
                'headers' => $headers,
            ), $this->debug_data);*/

            $debug_str = '[Debug] This page has moved<br />Please use the following URL instead: ';
            $debug_str .= '<a href="'.$redirect_url.'">'.$redirect_url.'</a>';
            echo $debug_str;

            /*if ($this->isPsMin17()) {
                dump($data);
            }*/
            exit;
        }

        FsAdvancedUrlTools::redirect($redirect_url, $headers);
    }

    public function getCssAndJs()
    {
        $fsau_js = array(
            'generate_link_rewrite_url' => $this->getAdminAjaxUrl(
                'AdminFsadvancedurl',
                array('ajax' => '1', 'action' => 'generatelinkrewrite')
            ),
            'redirect_url' => $this->url().'&tab_section=fsau_duplicate_tab'
        );

        $this->smartyAssign(array(
            'fsau_js' => $fsau_js,
        ));

        return $this->smartyFetch('admin/css_js_config.tpl');
    }

    public function generateAvailableKeywordsMultilang($keywords, $input_id)
    {
        $js_function = 'FSAU.addKeywordToInput';
        if (count(Language::getLanguages(false)) > 1) {
            $js_function = 'FSAU.addKeywordToInputMultilang';
        }

        $this->smartyAssign(array(
            'fsau_keywords' => $keywords,
            'fsau_input_id' => $input_id,
            'fsau_js_function' => $js_function
        ));

        return $this->smartyFetch('admin/available_keywords.tpl');
    }

    public function getProductDuplicate()
    {
        $check_lang_ids = $this->getLanguageIDs(self::DUPLICATE_CHECK_ON_ONLY_ACTIVE_LANGUAGE);
        $return = array();
        $limit = ' LIMIT 5';

        $sql = 'SELECT pl.`id_product`, pl.`link_rewrite`, pl.`id_shop`, pl.`id_lang`, p.`id_category_default`,';
        $sql .= ' COUNT(pl.`id_product`) as count FROM `'._DB_PREFIX_.'product_lang` pl LEFT JOIN `';
        $sql .= _DB_PREFIX_.'product` p ON pl.`id_product` = p.`id_product`';
        $sql .= ' WHERE pl.`id_lang` IN ('.implode(',', $check_lang_ids).')';
        if ($this->isPsMin17()) {
            $sql .= ' AND p.`state` = 1';
        }
        $sql .= ' GROUP BY pl.`id_shop`, pl.`id_lang`, pl.`link_rewrite`';
        if (Configuration::get('FSAU_ENABLE_pr_categories') || Configuration::get('FSAU_ENABLE_pr_category')) {
            $sql .= ', p.`id_category_default`';
        }
        $sql .= ' HAVING count(pl.`link_rewrite`) > 1 ORDER BY pl.`id_shop` ASC';
        $sql .= $limit;
        $duplicates = Db::getInstance()->executeS($sql);

        if ($duplicates) {
            foreach ($duplicates as $duplicate) {
                $sql_more = 'SELECT pl.`id_product`, pl.`link_rewrite`, pl.`id_shop`, pl.`id_lang`,';
                $sql_more .= ' p.`id_category_default`, pl.`name` FROM `'._DB_PREFIX_.'product_lang` pl LEFT JOIN `';
                $sql_more .= _DB_PREFIX_.'product` p ON pl.`id_product` = p.`id_product`';
                $sql_more .= ' WHERE pl.`id_shop` = \''.pSQL($duplicate['id_shop']).'\'';
                $sql_more .= ' AND pl.`link_rewrite` = \''.pSQL($duplicate['link_rewrite']).'\'';
                $sql_more .= ' AND pl.`id_lang` = \''.pSQL($duplicate['id_lang']).'\'';
                if (Configuration::get('FSAU_ENABLE_pr_categories') || Configuration::get('FSAU_ENABLE_pr_category')) {
                    $sql_more .= ' AND p.`id_category_default` = \''.pSQL($duplicate['id_category_default']).'\'';
                }
                if ($this->isPsMin17()) {
                    $sql .= ' AND p.`state` = 1';
                }
                $sql_more .= ' GROUP BY pl.`id_product` ORDER BY pl.`id_product` ASC'.$limit;

                $more_infos = Db::getInstance()->executeS($sql_more);
                foreach ($more_infos as $more_info) {
                    $row = array();
                    $row['id'] = 'product_'.$more_info['id_product'];
                    $row['id_object'] = $more_info['id_product'];
                    $row['id_type'] = 'product';
                    $row['type'] = 'Product';
                    $row['name'] = $more_info['name'];
                    $row['link_rewrite'] = $more_info['link_rewrite'];
                    $row['id_lang'] = $more_info['id_lang'];
                    $row['lang'] = $this->getIsoByIdForDuplicates($more_info['id_lang']);
                    $row['shop'] = '';
                    $shop = Shop::getShop($more_info['id_shop']);
                    if ($shop) {
                        $row['shop'] = $shop['name'];
                    }

                    $return[] = $row;
                }
            }
        }

        return $return;
    }

    public function getCategoryDuplicate()
    {
        $check_lang_ids = $this->getLanguageIDs(self::DUPLICATE_CHECK_ON_ONLY_ACTIVE_LANGUAGE);
        $return = array();
        $limit = ' LIMIT 5';

        $sql = 'SELECT cl.`id_category`, cl.`link_rewrite`, cl.`id_shop`, cl.`id_lang`, c.`id_parent` FROM';
        $sql .= ' `'._DB_PREFIX_.'category_lang` cl LEFT JOIN `';
        $sql .= _DB_PREFIX_.'category` c ON cl.`id_category` = c.`id_category`';
        $sql .= ' LEFT JOIN `'._DB_PREFIX_.'category_shop` cs';
        $sql .= ' ON cl.id_shop = cs.id_shop AND cs.id_category = c.id_category';
        $sql .= ' WHERE cl.`id_lang` IN ('.implode(',', $check_lang_ids).')';
        $sql .= ' AND cs.`id_shop` IS NOT NULL';
        $sql .= ' GROUP BY cl.`id_shop`, cl.`id_lang`, cl.`link_rewrite`';
        if (Configuration::get('FSAU_ENABLE_cr_categories')) {
            $sql .= ', c.`id_parent`';
        }
        $sql .= ' HAVING count(cl.`link_rewrite`) > 1 ORDER BY cl.`id_shop` ASC';
        $sql .= $limit;
        $duplicates = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        if ($duplicates) {
            foreach ($duplicates as $duplicate) {
                $sql_more = 'SELECT cl.`id_category`, cl.`link_rewrite`, cl.`id_shop`, cl.`id_lang`,';
                $sql_more .= ' c.`id_parent`, cl.`name` FROM `'._DB_PREFIX_.'category_lang` cl LEFT JOIN `';
                $sql_more .= _DB_PREFIX_.'category` c ON cl.`id_category` = c.`id_category`';
                $sql_more .= ' LEFT JOIN `'._DB_PREFIX_.'category_shop` cs';
                $sql_more .= ' ON cl.id_shop = cs.id_shop AND cs.id_category = c.id_category';
                $sql_more .= ' WHERE cl.`id_shop` = \''.pSQL($duplicate['id_shop']).'\'';
                $sql_more .= ' AND cs.`id_shop` IS NOT NULL';
                $sql_more .= ' AND cl.`link_rewrite` = \''.pSQL($duplicate['link_rewrite']).'\'';
                $sql_more .= ' AND cl.`id_lang` = \''.pSQL($duplicate['id_lang']).'\'';
                if (Configuration::get('FSAU_ENABLE_cr_categories')) {
                    $sql_more .= ' AND c.`id_parent` = \''.pSQL($duplicate['id_parent']).'\'';
                }
                $sql_more .= ' GROUP BY cl.`id_category`'.$limit;

                $more_infos = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql_more);
                foreach ($more_infos as $more_info) {
                    $row = array();
                    $row['id'] = 'category_'.$more_info['id_category'];
                    $row['id_object'] = $more_info['id_category'];
                    $row['id_type'] = 'category';
                    $row['type'] = 'Category';
                    $row['name'] = $more_info['name'];
                    $row['link_rewrite'] = $more_info['link_rewrite'];
                    $row['id_lang'] = $more_info['id_lang'];
                    $row['lang'] = $this->getIsoByIdForDuplicates($more_info['id_lang']);
                    $row['shop'] = '';
                    $shop = Shop::getShop($more_info['id_shop']);
                    if ($shop) {
                        $row['shop'] = $shop['name'];
                    }

                    $return[] = $row;
                }
            }
        }

        return $return;
    }

    public function getManufacturerDuplicate()
    {
        $return = array();
        $limit = ' LIMIT 5';

        $sql = 'SELECT m.`id_manufacturer`, ms.`id_shop`, m.`name` FROM `'._DB_PREFIX_.'manufacturer` m LEFT JOIN';
        $sql .= ' `'._DB_PREFIX_.'manufacturer_shop` ms ON m.`id_manufacturer` = ms.`id_manufacturer`';
        $sql .= ' GROUP BY ms.`id_shop`, m.`name`';
        $sql .= ' HAVING count(m.`name`) > 1 ORDER BY ms.`id_shop` ASC';
        $sql .= $limit;
        $duplicates = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

        if ($duplicates) {
            foreach ($duplicates as $duplicate) {
                $sql_more = 'SELECT m.`id_manufacturer`, ms.`id_shop`, m.`name` FROM `';
                $sql_more .= _DB_PREFIX_.'manufacturer` m LEFT JOIN';
                $sql_more .= ' `'._DB_PREFIX_.'manufacturer_shop` ms ON m.`id_manufacturer` = ms.`id_manufacturer`';
                $sql_more .= ' WHERE ms.`id_shop` = \''.pSQL($duplicate['id_shop']).'\'';
                $sql_more .= ' AND m.`name` = \''.pSQL($duplicate['name']).'\'';
                $sql_more .= ' GROUP BY m.`id_manufacturer`'.$limit;

                $more_infos = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql_more);
                foreach ($more_infos as $more_info) {
                    $row = array();
                    $row['id'] = 'manufacturer_'.$more_info['id_manufacturer'];
                    $row['id_object'] = $more_info['id_manufacturer'];
                    $row['id_type'] = 'manufacturer';
                    $row['type'] = 'Manufacturer';
                    $row['name'] = $more_info['name'];
                    $row['shop'] = '';
                    $shop = Shop::getShop($more_info['id_shop']);
                    if ($shop) {
                        $row['shop'] = $shop['name'];
                    }

                    $return[] = $row;
                }
            }
        }

        return $return;
    }

    public function getSupplierDuplicate()
    {
        $return = array();
        $limit = ' LIMIT 5';

        $sql = 'SELECT s.`id_supplier`, ss.`id_shop`, s.`name` FROM `'._DB_PREFIX_.'supplier` s LEFT JOIN';
        $sql .= ' `'._DB_PREFIX_.'supplier_shop` ss ON s.`id_supplier` = ss.`id_supplier`';
        $sql .= ' GROUP BY ss.`id_shop`, s.`name`';
        $sql .= ' HAVING count(s.`name`) > 1 ORDER BY ss.`id_shop` ASC';
        $sql .= $limit;
        $duplicates = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

        if ($duplicates) {
            foreach ($duplicates as $duplicate) {
                $sql_more = 'SELECT s.`id_supplier`, ss.`id_shop`, s.`name` FROM `'._DB_PREFIX_.'supplier` s LEFT JOIN';
                $sql_more .= ' `'._DB_PREFIX_.'supplier_shop` ss ON s.`id_supplier` = ss.`id_supplier`';
                $sql_more .= ' WHERE ss.`id_shop` = \''.pSQL($duplicate['id_shop']).'\'';
                $sql_more .= ' AND s.`name` = \''.pSQL($duplicate['name']).'\'';
                $sql_more .= ' GROUP BY s.`id_supplier`'.$limit;

                $more_infos = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql_more);
                foreach ($more_infos as $more_info) {
                    $row = array();
                    $row['id'] = 'supplier_'.$more_info['id_supplier'];
                    $row['id_object'] = $more_info['id_supplier'];
                    $row['id_type'] = 'supplier';
                    $row['type'] = 'Supplier';
                    $row['name'] = $more_info['name'];
                    $row['shop'] = '';
                    $shop = Shop::getShop($more_info['id_shop']);
                    if ($shop) {
                        $row['shop'] = $shop['name'];
                    }

                    $return[] = $row;
                }
            }
        }

        return $return;
    }

    public function getCMSDuplicate()
    {
        $check_lang_ids = $this->getLanguageIDs(self::DUPLICATE_CHECK_ON_ONLY_ACTIVE_LANGUAGE);
        $return = array();
        $limit = ' LIMIT 5';

        $sql = 'SELECT cl.`id_cms`, cl.`link_rewrite`, cs.`id_shop`, cl.`id_lang` FROM `'._DB_PREFIX_.'cms_lang` cl';
        $sql .= ' LEFT JOIN `'._DB_PREFIX_.'cms` c ON cl.`id_cms` = c.`id_cms`';
        $sql .= ' LEFT JOIN `'._DB_PREFIX_.'cms_shop` cs ON cl.`id_cms` = cs.`id_cms`';
        $sql .= ' WHERE cl.`id_lang` IN ('.implode(',', $check_lang_ids).')';
        $sql .= ' GROUP BY cs.`id_shop`, cl.`id_lang`, cl.`link_rewrite`';
        if (Configuration::get('FSAU_ENABLE_cmsr_categories')) {
            $sql .= ', c.`id_cms_category`';
        }
        $sql .= ' HAVING count(cl.`link_rewrite`) > 1 ORDER BY cs.`id_shop` ASC';
        $sql .= $limit;
        $duplicates = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        if ($duplicates) {
            foreach ($duplicates as $duplicate) {
                $sql_more = 'SELECT cl.`id_cms`, cl.`link_rewrite`, cs.`id_shop`, cl.`id_lang`, cl.`meta_title` FROM `';
                $sql_more .= _DB_PREFIX_.'cms_lang` cl';
                $sql_more .= ' LEFT JOIN `'._DB_PREFIX_.'cms` c ON cl.`id_cms` = c.`id_cms`';
                $sql_more .= ' LEFT JOIN `'._DB_PREFIX_.'cms_shop` cs ON cl.`id_cms` = cs.`id_cms`';
                $sql_more .= ' WHERE cs.`id_shop` = \''.pSQL($duplicate['id_shop']).'\'';
                $sql_more .= ' AND cl.`link_rewrite` = \''.pSQL($duplicate['link_rewrite']).'\'';
                $sql_more .= ' AND cl.`id_lang` = \''.pSQL($duplicate['id_lang']).'\'';
                if (Configuration::get('FSAU_ENABLE_cmsr_categories')) {
                    $sql_more .= ' AND c.`id_cms_category` = \''.pSQL($duplicate['id_cms_category']).'\'';
                }
                $sql_more .= ' GROUP BY cl.`id_cms`'.$limit;

                $more_infos = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql_more);
                foreach ($more_infos as $more_info) {
                    $row = array();
                    $row['id'] = 'cms_'.$more_info['id_cms'];
                    $row['id_object'] = $more_info['id_cms'];
                    $row['id_type'] = 'cms';
                    $row['type'] = 'CMS';
                    $row['name'] = $more_info['meta_title'];
                    $row['link_rewrite'] = $more_info['link_rewrite'];
                    $row['id_lang'] = $more_info['id_lang'];
                    $row['lang'] = $this->getIsoByIdForDuplicates($more_info['id_lang']);
                    $row['shop'] = '';
                    $shop = Shop::getShop($more_info['id_shop']);
                    if ($shop) {
                        $row['shop'] = $shop['name'];
                    }

                    $return[] = $row;
                }
            }
        }

        return $return;
    }

    public function getCMSCategoryDuplicate()
    {
        $check_lang_ids = $this->getLanguageIDs(self::DUPLICATE_CHECK_ON_ONLY_ACTIVE_LANGUAGE);
        $return = array();
        $limit = ' LIMIT 5';

        $sql = 'SELECT ccl.`id_cms_category`, ccl.`link_rewrite`, ccl.`id_lang` FROM `';
        $sql .= _DB_PREFIX_.'cms_category_lang` ccl';
        $sql .= ' LEFT JOIN `'._DB_PREFIX_.'cms_category` cc ON ccl.`id_cms_category` = cc.`id_cms_category`';
        $sql .= ' WHERE ccl.`id_lang` IN ('.implode(',', $check_lang_ids).')';
        $sql .= ' GROUP BY ccl.`id_lang`, ccl.`link_rewrite`';
        if (Configuration::get('FSAU_ENABLE_cmscr_categories')) {
            $sql .= ', cc.`id_parent`';
        }
        $sql .= ' HAVING count(ccl.`link_rewrite`) > 1';
        $sql .= $limit;
        $duplicates = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        if ($duplicates) {
            foreach ($duplicates as $duplicate) {
                $sql_more = 'SELECT ccl.`id_cms_category`, ccl.`link_rewrite`, ccl.`id_lang`, ccl.`name` FROM `';
                $sql_more .= _DB_PREFIX_.'cms_category_lang` ccl LEFT JOIN `'._DB_PREFIX_.'cms_category`';
                $sql_more .= ' cc ON ccl.`id_cms_category` = cc.`id_cms_category`';
                $sql_more .= ' WHERE ccl.`link_rewrite` = \''.pSQL($duplicate['link_rewrite']).'\'';
                $sql_more .= ' AND ccl.`id_lang` = \''.pSQL($duplicate['id_lang']).'\'';
                if (Configuration::get('FSAU_ENABLE_cmscr_categories')) {
                    $sql_more .= ' AND cc.`id_parent` = \''.pSQL($duplicate['id_parent']).'\'';
                }
                $sql_more .= ' GROUP BY ccl.`id_cms_category`'.$limit;

                $more_infos = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql_more);
                foreach ($more_infos as $more_info) {
                    $row = array();
                    $row['id'] = 'cmscategory_'.$more_info['id_cms_category'];
                    $row['id_object'] = $more_info['id_cms_category'];
                    $row['id_type'] = 'cms_category';
                    $row['type'] = 'CMS Category';
                    $row['name'] = $more_info['name'];
                    $row['link_rewrite'] = $more_info['link_rewrite'];
                    $row['id_lang'] = $more_info['id_lang'];
                    $row['lang'] = $this->getIsoByIdForDuplicates($more_info['id_lang']);

                    $return[] = $row;
                }
            }
        }

        return $return;
    }

    public function getRoutesForSelector()
    {
        $options = array(
            array('id' => '', 'name' => $this->l('- no move route -'))
        );

        $dispatcher = Dispatcher::getInstance();
        if (!Tools::isCallable(array($dispatcher, 'getRoutes')) ||
            !Tools::isCallable(array($dispatcher, 'getRequestUri'))) {
            return false;
        }
        $routes = $dispatcher->getRoutes();

        if (version_compare(_PS_VERSION_, '1.5.5.0', '>=')) {
            $id_shop = (int)$this->context->shop->id;
            $routes = $routes[$id_shop];
        }

        $id_lang = (int)$this->context->language->id;
        $routes = $routes[$id_lang];

        foreach (array_keys($routes) as $route_name) {
            $options[] = array(
                'id' => $route_name,
                'name' => $route_name
            );
        }

        return $options;
    }

    public function getLongestMatchingSubstring($str1, $str2)
    {
        $len_1 = Tools::strlen($str1);
        $longest = '';
        for ($i = 0; $i < $len_1; $i++) {
            for ($j = $len_1 - $i; $j > 0; $j--) {
                $sub = Tools::substr($str1, $i, $j);
                if (Tools::strpos($str2, $sub) !== false && Tools::strlen($sub) > Tools::strlen($longest)) {
                    $longest = $sub;
                    break;
                }
            }
        }
        return $longest;
    }

    public function getIsoByIdForDuplicates($id_lang)
    {
        $iso = Language::getIsoById($id_lang);
        if ($iso) {
            return $iso;
        }

        return $this->l('Deleted - ID:').' '.$id_lang;
    }

    public function getDeletedLanguageIDs()
    {
        $unique_ids = array();
        $sql = 'SELECT pl.`id_lang` FROM `'._DB_PREFIX_.'product_lang` pl GROUP BY pl.`id_lang`';
        $result = Db::getInstance()->executeS($sql);
        if ($result) {
            foreach ($result as $row) {
                $unique_ids[] = $row['id_lang'];
            }
        }

        $sql = 'SELECT cl.`id_lang` FROM `'._DB_PREFIX_.'category_lang` cl GROUP BY cl.`id_lang`';
        $result = Db::getInstance()->executeS($sql);
        if ($result) {
            foreach ($result as $row) {
                $unique_ids[] = $row['id_lang'];
            }
        }

        $unique_ids = array_unique($unique_ids);
        $deleted_ids = array();
        foreach ($unique_ids as $id_lang) {
            if (!Language::getIsoById($id_lang)) {
                $deleted_ids[] = $id_lang;
            }
        }

        return $deleted_ids;
    }

    public function deleteTrashTranslationsByIdLang($id_lang)
    {
        $sql = 'DELETE FROM `'._DB_PREFIX_.'product_lang` WHERE `id_lang` = '.pSQL($id_lang);
        Db::getInstance()->execute($sql);

        $sql = 'DELETE FROM `'._DB_PREFIX_.'category_lang` WHERE `id_lang` = '.pSQL($id_lang);
        Db::getInstance()->execute($sql);

        $sql = 'DELETE FROM `'._DB_PREFIX_.'cms_lang` WHERE `id_lang` = '.pSQL($id_lang);
        Db::getInstance()->execute($sql);

        $sql = 'DELETE FROM `'._DB_PREFIX_.'cms_category_lang` WHERE `id_lang` = '.pSQL($id_lang);
        Db::getInstance()->execute($sql);
    }

    public function getLanguageIDs($active = true, $id_shop = false)
    {
        $languages = Language::getLanguages($active, $id_shop);
        $ids = array();
        if ($languages) {
            foreach ($languages as $language) {
                $ids[] = $language['id_lang'];
            }
        }
        return $ids;
    }

    public function getIsset($param)
    {
        $value = Tools::getValue($param, null);
        if (!is_null($value)) {
            return true;
        }
        return false;
    }

    #################### DISPATCHER ####################

    public function addMultilangRoute($route_id)
    {
        if (!in_array($route_id, $this->multilang_routes)) {
            $this->multilang_routes[] = $route_id;
        }
    }

    public function addHandleRoute($route_id)
    {
        if (!in_array($route_id, $this->handled_routes)) {
            $this->handled_routes[] = $route_id;
        }
    }

    public function isHandleRoute($route_id)
    {
        return in_array($route_id, $this->handled_routes);
    }

    public function addPreDispatcher($route_id, $module, $function)
    {
        $this->pre_dispatchers[$route_id] = array(
            'module' => $module,
            'function' => $function
        );
    }

    public function getRoutePreDispatcher($route_id)
    {
        if (isset($this->pre_dispatchers[$route_id])) {
            $module = null;
            if (isset($this->pre_dispatchers[$route_id]['module']) &&
                $this->pre_dispatchers[$route_id]['module']) {
                $module = Module::getInstanceByName($this->pre_dispatchers[$route_id]['module']);
            }

            $function = null;
            if (isset($this->pre_dispatchers[$route_id]['function']) &&
                $this->pre_dispatchers[$route_id]['function']) {
                $function = $this->pre_dispatchers[$route_id]['function'];
            }

            if ($module && $function) {
                return array('module' => $module, 'function' => $function);
            }
        }

        return false;
    }

    public function fixRegexResult($m)
    {
        if (isset($m['fsau_rewrite_categories']) && $m['fsau_rewrite_categories']) {
            if (isset($m['fsau_rewrite_category']) && !$m['fsau_rewrite_category']) {
                $categories = explode('/', $m['fsau_rewrite_categories']);
                $m['fsau_rewrite_category'] = array_pop($categories);
                $m['fsau_rewrite_categories'] = implode('/', $categories);
            }

            if (isset($m['fsau_rewrite_product']) && !$m['fsau_rewrite_product']) {
                $categories = explode('/', $m['fsau_rewrite_categories']);
                $m['fsau_rewrite_product'] = array_pop($categories);
                $m['fsau_rewrite_categories'] = implode('/', $categories);
            }
        }

        if (isset($m['fsau_rewrite_category']) && $m['fsau_rewrite_category']) {
            if (isset($m['fsau_rewrite_product']) && !$m['fsau_rewrite_product']) {
                $m['fsau_rewrite_product'] = $m['fsau_rewrite_category'];
                $m['fsau_rewrite_category'] = '';
            }
        }

        if (isset($m['fsau_rewrite_cms_categories']) && $m['fsau_rewrite_cms_categories']) {
            if (isset($m['fsau_rewrite_cms_category']) && !$m['fsau_rewrite_cms_category']) {
                $categories = explode('/', $m['fsau_rewrite_cms_categories']);
                $m['fsau_rewrite_cms_category'] = array_pop($categories);
                $m['fsau_rewrite_cms_categories'] = implode('/', $categories);
            }

            if (isset($m['fsau_rewrite_cms']) && !$m['fsau_rewrite_cms']) {
                $categories = explode('/', $m['fsau_rewrite_cms_categories']);
                $m['fsau_rewrite_cms'] = array_pop($categories);
                $m['fsau_rewrite_cms_categories'] = implode('/', $categories);
            }
        }

        return $m;
    }

    public function getFromParamsCategories($m)
    {
        if (isset($m['fsau_rewrite_categories'])) {
            return $m['fsau_rewrite_categories'];
        }
        return '';
    }

    public function getFromParamsCMSCategories($m)
    {
        if (isset($m['fsau_rewrite_cms_categories'])) {
            return $m['fsau_rewrite_cms_categories'];
        }
        return '';
    }

    public function getFromParamsCategory($m)
    {
        if (isset($m['fsau_rewrite_category'])) {
            return $m['fsau_rewrite_category'];
        }
        return '';
    }

    public function preDispatch($uri, $route_id, $route, $m, $id_lang, $id_shop)
    {
        $return = $this->getPreDispatcherDefaultResponse();
        $context = Context::getContext();
        $dispatcher = Dispatcher::getInstance();
        if (!Tools::isCallable(array($dispatcher, 'getRoutes')) ||
            !Tools::isCallable(array($dispatcher, 'getRequestUri'))) {
            return $return;
        }
        $routes = $dispatcher->getRoutes();

        $rewrite = '';
        switch ($route_id) {
            case 'product_rule':
            case 'product_rule_2':
                if (isset($m['fsau_rewrite_product'])) {
                    $rewrite = $m['fsau_rewrite_product'];
                }

                $sql = 'SELECT ps.`id_product` FROM `'._DB_PREFIX_.'product_lang` pl';
                $sql .= ' LEFT JOIN `'._DB_PREFIX_.'product_shop` ps';
                $sql .= ' ON pl.`id_product` = ps.`id_product` AND pl.`id_shop` = ps.`id_shop`';
                if ($this->isPsMin17()) {
                    $sql .= ' LEFT JOIN `'._DB_PREFIX_.'product` p ON p.`id_product` = ps.`id_product`';
                }
                $sql .= ' WHERE ps.`id_shop` = \''.pSQL($id_shop).'\'';
                $sql .= ' AND pl.`link_rewrite` = \''.pSQL($rewrite).'\'';
                if ($this->isPsMin17()) {
                    $sql .= ' AND p.`state` = 1';
                }
                $result = Db::getInstance()->executeS($sql.' AND pl.`id_lang` = \''.pSQL($id_lang).'\' LIMIT 2');

                $id_product = null;
                if ($result) {
                    $return['is_matched_controller'] = true;

                    /*if (count($result) === 1) {
                        if (isset($result[0]['id_product'])) {
                            $id_product = $result[0]['id_product'];
                        }
                    }*/

                    if (!$id_product) {
                        $id_parent = $this->getLastIdCategoryFromCategoriesRewrite(
                            $this->getFromParamsCategories($m),
                            $context->shop->id_category,
                            $id_lang,
                            $id_shop
                        );

                        $id_parent = $this->getIdCategoryFromCategoryRewrite(
                            $this->getFromParamsCategory($m),
                            $id_parent,
                            $id_lang,
                            $id_shop
                        );

                        $sql = 'SELECT ps.`id_product` FROM `'._DB_PREFIX_.'product_lang` pl';
                        $sql .= ' LEFT JOIN `'._DB_PREFIX_.'product_shop` ps';
                        $sql .= ' ON pl.`id_product` = ps.`id_product` AND pl.`id_shop` = ps.`id_shop`';
                        if ($this->isPsMin17()) {
                            $sql .= ' LEFT JOIN `'._DB_PREFIX_.'product` p ON p.`id_product` = ps.`id_product`';
                        }
                        $sql .= ' WHERE ps.`id_shop` = \''.pSQL($id_shop).'\'';
                        $sql .= ' AND pl.`link_rewrite` = \''.pSQL($rewrite).'\'';
                        if ($this->isPsMin17()) {
                            $sql .= ' AND p.`state` = 1';
                        }
                        if (Configuration::get('FSAU_ENABLE_pr_categories') ||
                            Configuration::get('FSAU_ENABLE_pr_category')) {
                            $sql .= ' AND ps.`id_category_default` = \''.pSQL($id_parent).'\'';
                        }

                        $id_product = Db::getInstance()->getValue(
                            $sql.' AND pl.`id_lang` = \''.pSQL($id_lang).'\''
                        );

                        if (!$id_product) {
                            $id_product = Db::getInstance()->getValue($sql);
                        }
                    }

                    if (!$id_product) {
                        if (isset($routes[$id_shop][$id_lang]['old_product_rule'])) {
                            if (preg_match(
                                $routes[$id_shop][$id_lang]['old_product_rule']['regexp'],
                                $dispatcher->getRequestUri(),
                                $m_sub
                            )) {
                                if (isset($m_sub['id_product'])) {
                                    $id_product = $m_sub['id_product'];
                                }
                            }
                        }
                    }

                    if ($id_product) {
                        $p = new Product($id_product);
                        if (!$p->active) {
                            if ($p->redirect_type != '301' && $p->redirect_type != '302') {
                                if (Tools::getValue('adtoken', false)) {
                                    $gt = Tools::getAdminToken(
                                        'AdminProducts'.(int)Tab::getIdFromClassName('AdminProducts').
                                        (int)Tools::getValue('id_employee')
                                    );
                                    if (Tools::getValue('adtoken') != $gt) {
                                        $id_product = 0;
                                    }
                                } else {
                                    $id_product = 0;
                                }
                            }
                        }
                    }

                    if ($id_product) {
                        $return['id'] = $id_product;
                        $return['property'] = 'id_product';
                    } else {
                        $return['is_matched_controller'] = false;
                    }
                }

                if (!$id_product) {
                    $id_category = $this->getLastIdCategoryFromCategoriesRewrite(
                        $this->getFromParamsCategories($m),
                        $context->shop->id_category,
                        $id_lang,
                        $id_shop
                    );

                    $id_category = $this->getIdCategoryFromCategoryRewrite(
                        $this->getFromParamsCategory($m),
                        $id_category,
                        $id_lang,
                        $id_shop
                    );

                    if ($id_category && $id_category != $context->shop->id_category) {
                        $return['maybe_matched_controller'] = true;

                        $type = Configuration::get('FSAU_product_rule_RT', null, null, $id_shop);
                        if (!$type || $type == 'default') {
                            $return['use_when_maybe'] = false;
                        }
                    }
                }
                break;

            case 'category_rule':
            case 'category_rule_2':
            case 'layered_rule':
            case 'layered_rule_2':
                if (isset($m['fsau_rewrite_category'])) {
                    $rewrite = $m['fsau_rewrite_category'];
                }

                $sql = 'SELECT cl.`id_category` FROM `'._DB_PREFIX_.'category_lang` cl';
                $sql .= ' LEFT JOIN `'._DB_PREFIX_.'category` c ON cl.id_category = c.id_category';
                $sql .= ' LEFT JOIN `'._DB_PREFIX_.'category_shop` cs';
                $sql .= ' ON cl.id_shop = cs.id_shop AND cs.id_category = c.id_category';
                $sql .= ' WHERE cl.`id_shop` = \''.pSQL($id_shop).'\'';
                $sql .= ' AND cs.`id_shop` IS NOT NULL';
                $sql .= ' AND cl.`link_rewrite` = \''.pSQL($rewrite).'\'';
                $result = Db::getInstance()->executeS($sql.' AND cl.`id_lang` = \''.pSQL($id_lang).'\' LIMIT 2');

                $id_category = null;
                if ($result) {
                    $return['is_matched_controller'] = true;

                    if (count($result) === 1) {
                        if (isset($result[0]['id_category'])) {
                            if ($result[0]['id_category'] == $context->shop->id_category) {
                                $id_category = $result[0]['id_category'];
                            }
                        }
                    }

                    if (!$id_category) {
                        $sql = 'SELECT cl.`id_category` FROM `'._DB_PREFIX_.'category_lang` cl';
                        $sql .= ' LEFT JOIN `'._DB_PREFIX_.'category` c ON cl.id_category = c.id_category';
                        $sql .= ' LEFT JOIN `'._DB_PREFIX_.'category_shop` cs';
                        $sql .= ' ON cl.id_shop = cs.id_shop AND cs.id_category = c.id_category';
                        $sql .= ' WHERE cl.`id_shop` = \''.pSQL($id_shop).'\'';
                        $sql .= ' AND cs.`id_shop` IS NOT NULL';
                        $sql .= ' AND cl.`link_rewrite` = \''.pSQL($rewrite).'\'';
                        if (Configuration::get('FSAU_ENABLE_cr_categories')) {
                            $id_parent = $this->getLastIdCategoryFromCategoriesRewrite(
                                $this->getFromParamsCategories($m),
                                $context->shop->id_category,
                                $id_lang,
                                $id_shop
                            );

                            $sql .= ' AND c.id_parent = \''.pSQL($id_parent).'\'';
                        }

                        $id_category = Db::getInstance()->getValue(
                            $sql.' AND cl.`id_lang` = \''.pSQL($id_lang).'\''
                        );

                        if (!$id_category) {
                            $id_category = Db::getInstance()->getValue($sql);
                        }
                    }

                    if (!$id_category) {
                        if (isset($routes[$id_shop][$id_lang]['old_category_rule'])) {
                            $request_uri = $dispatcher->getRequestUri();
                            if (Tools::substr($request_uri, -1) == '/') {
                                $request_uri = Tools::substr($dispatcher->getRequestUri(), 0, -1);
                            }

                            if (preg_match(
                                $routes[$id_shop][$id_lang]['old_category_rule']['regexp'],
                                $request_uri,
                                $m_sub
                            )) {
                                if (isset($m_sub['id_category'])) {
                                    $id_category = $m_sub['id_category'];
                                }
                            }
                        }
                    }

                    if ($id_category) {
                        $c = new Category($id_category);
                        if (!$c->active) {
                            $id_category = 0;
                        }
                    }

                    if ($id_category) {
                        $return['id'] = $id_category;
                        $return['property'] = 'id_category';
                    } else {
                        $return['is_matched_controller'] = false;
                    }
                }

                if (!$id_category) {
                    $id_category = $this->getLastIdCategoryFromCategoriesRewrite(
                        $this->getFromParamsCategories($m),
                        $context->shop->id_category,
                        $id_lang,
                        $id_shop
                    );

                    $type = Configuration::get('FSAU_category_rule_RT', null, null, $id_shop);
                    if (!$type || $type == 'default') {
                        $return['use_when_maybe'] = false;
                    }

                    if ($id_category && $id_category != $context->shop->id_category) {
                        $return['maybe_matched_controller'] = true;

                        if (($route_id == 'layered_rule' || $route_id == 'layered_rule_2') && $type == 'best') {
                            $selected_filters = $this->getLayeredParamFromUri($uri, $id_category);
                            if ($selected_filters) {
                                $_GET['selected_filters_maybe'] = $selected_filters;
                            }

                            $return['id'] = $id_category;
                            $return['property'] = 'id_category';
                            $return['is_matched_controller'] = true;
                        }
                    }
                } else {
                    $type = Configuration::get('FSAU_category_rule_RT', null, null, $id_shop);
                    if (($route_id == 'layered_rule' || $route_id == 'layered_rule_2') && $type == 'best') {
                        $selected_filters = $this->getLayeredParamFromUri($uri, $id_category);
                        if ($selected_filters) {
                            $_GET['selected_filters_maybe'] = $selected_filters;
                        }
                    }
                }
                break;

            case 'manufacturer_rule':
            case 'manufacturer_rule_2':
                if (isset($m['fsau_rewrite_manufacturer'])) {
                    $rewrite = $m['fsau_rewrite_manufacturer'];
                }

                $id_manufacturer = Db::getInstance()->getValue(
                    'SELECT m.`id_manufacturer` FROM `'._DB_PREFIX_.'manufacturer` m LEFT JOIN `'._DB_PREFIX_.
                    'manufacturer_shop` ms ON m.id_manufacturer = ms.id_manufacturer WHERE ms.`id_shop` = \''.
                    pSQL($id_shop).'\' AND REPLACE(LOWER(m.`name`), \' \', \'-\') = \''.pSQL($rewrite).'\''
                );

                if (!$id_manufacturer) {
                    $manufacturers = Db::getInstance()->executeS(
                        'SELECT m.`id_manufacturer`, m.`name` FROM `'._DB_PREFIX_.'manufacturer` m LEFT JOIN `'.
                        _DB_PREFIX_.'manufacturer_shop` ms ON m.id_manufacturer = ms.id_manufacturer
                        WHERE ms.`id_shop` = \''.pSQL($id_shop).'\''
                    );

                    if ($manufacturers) {
                        foreach ($manufacturers as $manufacturer) {
                            if ($rewrite == Tools::str2url($manufacturer['name'])) {
                                $id_manufacturer = $manufacturer['id_manufacturer'];
                                break;
                            }
                        }
                    }
                }

                if ($id_manufacturer) {
                    $return['is_matched_controller'] = true;
                    $return['id'] = $id_manufacturer;
                    $return['property'] = 'id_manufacturer';
                } else {
                    if (!FsAdvancedUrlTools::startsWith(trim($route['rule']), '{')) {
                        $return['maybe_matched_controller'] = true;

                        $type = Configuration::get('FSAU_manufacturer_rule_RT', null, null, $id_shop);
                        if (!$type || $type == 'default') {
                            $return['use_when_maybe'] = false;
                        }
                    }
                }
                break;

            case 'supplier_rule':
            case 'supplier_rule_2':
                if (isset($m['fsau_rewrite_supplier'])) {
                    $rewrite = $m['fsau_rewrite_supplier'];
                }

                $id_supplier = Db::getInstance()->getValue(
                    'SELECT s.`id_supplier` FROM `'._DB_PREFIX_.'supplier` s LEFT JOIN `'.
                    _DB_PREFIX_.'supplier_shop` ss ON s.id_supplier = ss.id_supplier WHERE ss.`id_shop` = \''.
                    pSQL($id_shop).'\' AND REPLACE(LOWER(s.`name`), \' \', \'-\') = \''.pSQL($rewrite).'\''
                );

                if (!$id_supplier) {
                    $suppliers = Db::getInstance()->executeS(
                        'SELECT s.`id_supplier`, s.`name` FROM `'._DB_PREFIX_.'supplier` s LEFT JOIN `'.
                        _DB_PREFIX_.'supplier_shop` ss ON s.id_supplier = ss.id_supplier
                                WHERE ss.`id_shop` = \''.pSQL($id_shop).'\''
                    );

                    if ($suppliers) {
                        foreach ($suppliers as $supplier) {
                            if ($rewrite == Tools::str2url($supplier['name'])) {
                                $id_supplier = $supplier['id_supplier'];
                                break;
                            }
                        }
                    }
                }

                if ($id_supplier) {
                    $return['is_matched_controller'] = true;
                    $return['id'] = $id_supplier;
                    $return['property'] = 'id_supplier';
                } else {
                    if (!FsAdvancedUrlTools::startsWith(trim($route['rule']), '{')) {
                        $return['maybe_matched_controller'] = true;

                        $type = Configuration::get('FSAU_supplier_rule_RT', null, null, $id_shop);
                        if (!$type || $type == 'default') {
                            $return['use_when_maybe'] = false;
                        }
                    }
                }
                break;

            case 'cms_rule':
            case 'cms_rule_2':
                if (isset($m['fsau_rewrite_cms'])) {
                    $rewrite = $m['fsau_rewrite_cms'];
                }

                $sql = 'SELECT cl.`id_cms` FROM `'._DB_PREFIX_.'cms_lang` cl';
                $sql .= ' LEFT JOIN `'._DB_PREFIX_.'cms` c ON cl.`id_cms` = c.`id_cms`';
                $sql .= ' WHERE cl.`link_rewrite` = \''.pSQL($rewrite).'\'';
                $sql .= ' AND cl.`id_lang` = \''.pSQL($id_lang).'\'';
                if ($this->isPsMin17()) {
                    $sql .= ' AND cl.`id_shop` = \''.pSQL($id_shop).'\'';
                }
                $result = Db::getInstance()->executeS($sql.' LIMIT 2');

                $id_cms = null;
                if ($result) {
                    $return['is_matched_controller'] = true;

                    /*if (count($result) === 1) {
                        if (isset($result[0]['id_cms'])) {
                            $id_cms = $result[0]['id_cms'];
                        }
                    }*/

                    if (!$id_cms) {
                        $id_cms_category = $this->getLastIdCMSCategoryFromCMSCategoriesRewrite(
                            $this->getFromParamsCMSCategories($m),
                            $id_lang,
                            $id_shop
                        );

                        $sql = 'SELECT cl.`id_cms` FROM `'._DB_PREFIX_.'cms_lang` cl LEFT JOIN';
                        $sql .= ' `'._DB_PREFIX_.'cms` c ON cl.`id_cms` = c.`id_cms`';
                        $sql .= ' WHERE cl.`link_rewrite` = \''.pSQL($rewrite).'\'';

                        if (Configuration::get('FSAU_ENABLE_cmsr_categories')) {
                            $sql .= ' AND c.id_cms_category = \''.pSQL($id_cms_category).'\'';
                        }

                        $id_cms = Db::getInstance()->getValue(
                            $sql.' AND cl.`id_lang` = \''.pSQL($id_lang).'\''
                        );

                        if (!$id_cms) {
                            $id_cms = Db::getInstance()->getValue($sql);
                        }
                    }

                    if ($id_cms) {
                        $return['id'] = $id_cms;
                        $return['property'] = 'id_cms';
                    } else {
                        $return['is_matched_controller'] = false;
                    }
                }

                if (!$id_cms) {
                    $id_cms_category = $this->getLastIdCMSCategoryFromCMSCategoriesRewrite(
                        $this->getFromParamsCMSCategories($m),
                        $id_lang,
                        $id_shop
                    );

                    if ($id_cms_category > 1) {
                        $return['maybe_matched_controller'] = true;

                        $type = Configuration::get('FSAU_cms_rule_RT', null, null, $id_shop);
                        if (!$type || $type == 'default') {
                            $return['use_when_maybe'] = false;
                        }
                    }
                }
                break;

            case 'cms_category_rule':
            case 'cms_category_rule_2':
                if (isset($m['fsau_rewrite_cms_category'])) {
                    $rewrite = $m['fsau_rewrite_cms_category'];
                }

                $sql = 'SELECT ccl.`id_cms_category` FROM `'._DB_PREFIX_.'cms_category_lang` ccl LEFT JOIN';
                $sql .= ' `'._DB_PREFIX_.'cms_category` cc ON ccl.`id_cms_category` = cc.`id_cms_category`';
                $sql .= ' WHERE ccl.`link_rewrite` = \''.pSQL($rewrite).'\'';
                $sql .= ' AND ccl.`id_lang` = \''.pSQL($id_lang).'\'';
                $result = Db::getInstance()->executeS($sql.' LIMIT 2');

                $id_cms_category = null;
                if ($result) {
                    $return['is_matched_controller'] = true;

                    /*if (count($result) === 1) {
                        if (isset($result[0]['id_cms_category'])) {
                            $id_cms_category = $result[0]['id_cms_category'];
                        }
                    }*/

                    if (!$id_cms_category) {
                        $id_parent = $this->getLastIdCMSCategoryFromCMSCategoriesRewrite(
                            $this->getFromParamsCMSCategories($m),
                            $id_lang,
                            $id_shop
                        );

                        $sql = 'SELECT ccl.`id_cms_category` FROM `'._DB_PREFIX_.'cms_category_lang` ccl LEFT JOIN';
                        $sql .= ' `'._DB_PREFIX_.'cms_category` cc ON ccl.`id_cms_category` = cc.`id_cms_category`';
                        $sql .= ' WHERE ccl.`link_rewrite` = \''.pSQL($rewrite).'\'';
                        if (Configuration::get('FSAU_ENABLE_cmscr_categories')) {
                            $sql .= ' AND cc.id_parent = \''.pSQL($id_parent).'\'';
                        }

                        $id_cms_category = Db::getInstance()->getValue(
                            $sql.' AND ccl.`id_lang` = \''.pSQL($id_lang).'\''
                        );

                        if (!$id_cms_category) {
                            $id_cms_category = Db::getInstance()->getValue($sql);
                        }
                    }

                    if ($id_cms_category) {
                        $return['id'] = $id_cms_category;
                        $return['property'] = 'id_cms_category';
                    } else {
                        $return['is_matched_controller'] = false;
                    }
                }

                if (!$id_cms_category) {
                    $id_cms_category = $this->getLastIdCMSCategoryFromCMSCategoriesRewrite(
                        $this->getFromParamsCMSCategories($m),
                        $id_lang,
                        $id_shop
                    );

                    if ($id_cms_category > 1) {
                        $return['maybe_matched_controller'] = true;

                        $type = Configuration::get('FSAU_cms_category_rule_RT', null, null, $id_shop);
                        if (!$type || $type == 'default') {
                            $return['use_when_maybe'] = false;
                        }
                    }
                }

                break;
        }

        return $return;
    }

    public function getPreDispatcherDefaultResponse()
    {
        return array(
            'is_matched_controller' => false,
            'maybe_matched_controller' => false,
            'use_when_maybe' => true,
            'id' => null,
            'property' => null
        );
    }

    public function getSameRuleRoutes($route_id, $id_lang, $id_shop)
    {
        $dispatcher = Dispatcher::getInstance();
        $routes = $dispatcher->getRoutes();

        $return = array();

        if (isset($routes[$id_shop][$id_lang])) {
            $rule = '';
            if (isset($routes[$id_shop][$id_lang][$route_id])) {
                $rule = $routes[$id_shop][$id_lang][$route_id]['rule'];
            }

            foreach ($routes[$id_shop][$id_lang] as $route_name_item => $route) {
                if ($rule == $route['rule']) {
                    $keyword = 'categories';
                    if (!preg_match('#\{([^{}]*:)?'.$keyword.'(:[^{}]*)?\}#', $rule)) {
                        $return[$route_name_item] = $rule;
                    }
                }
            }
        }

        return $return;
    }

    public function getLastIdCategoryFromCategoriesRewrite($rewrite_categories, $id_parent, $id_lang, $id_shop)
    {
        if ($rewrite_categories) {
            $rewrite_categories_array = explode('/', $rewrite_categories);
            foreach ($rewrite_categories_array as $rewrite_category) {
                $sql = 'SELECT cl.`id_category` FROM `'._DB_PREFIX_.'category_lang` cl';
                $sql .= ' LEFT JOIN `'._DB_PREFIX_.'category` c ON cl.id_category = c.id_category';
                $sql .= ' LEFT JOIN `'._DB_PREFIX_.'category_shop` cs';
                $sql .= ' ON cl.id_shop = cs.id_shop AND cs.id_category = c.id_category';
                $sql .= ' WHERE cl.`id_shop` = \''.pSQL($id_shop).'\'';
                $sql .= ' AND cs.`id_shop` IS NOT NULL';
                $sql .= ' AND cl.`link_rewrite` = \''.pSQL($rewrite_category).'\'';
                $sql .= ' AND c.id_parent = \''.pSQL($id_parent).'\'';
                $result = Db::getInstance()->getValue(
                    $sql.' AND cl.`id_lang` = \''.pSQL($id_lang).'\''
                );

                if ($result) {
                    $id_parent = $result;
                }

                if (!$id_parent) {
                    $result = Db::getInstance()->getValue($sql);
                    if ($result) {
                        $id_parent = $result;
                    }
                }
            }
        }

        return $id_parent;
    }

    public function getIdCategoryFromCategoryRewrite($rewrite_category, $id_category, $id_lang, $id_shop)
    {
        if ($rewrite_category) {
            $sql = 'SELECT cl.`id_category` FROM `'._DB_PREFIX_.'category_lang` cl';
            $sql .= ' LEFT JOIN `'._DB_PREFIX_.'category` c ON cl.id_category = c.id_category';
            $sql .= ' WHERE cl.`id_shop` = \''.pSQL($id_shop).'\'';
            $sql .= ' AND cl.`link_rewrite` = \''.pSQL($rewrite_category).'\'';
            $result = Db::getInstance()->getValue(
                $sql.' AND cl.`id_lang` = \''.pSQL($id_lang).'\''
            );

            if ($result) {
                $id_category = $result;
            }

            if (!$id_category) {
                $result = Db::getInstance()->getValue($sql);
                if ($result) {
                    $id_category = $result;
                }
            }
        }

        return $id_category;
    }

    public function getCMSCategoryParentCategories($id_cms_category, $id_lang = null)
    {
        if (is_null($id_lang)) {
            $id_lang = Context::getContext()->language->id;
        }

        $categories = array();
        $id_current = $id_cms_category;
        while (true) {
            $sql = 'SELECT c.*, cl.* FROM `'._DB_PREFIX_.'cms_category` c';
            $sql .= ' LEFT JOIN `'._DB_PREFIX_.'cms_category_lang` cl ON (c.`id_cms_category` = cl.`id_cms_category`';
            $sql .= ' AND `id_lang` = '.(int)$id_lang.')';
            $sql .= ' WHERE c.`id_cms_category` = '.(int)$id_current.' AND c.`id_parent` != 0';
            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

            if (isset($result[0])) {
                $categories[] = $result[0];
                if (!$result || $result[0]['id_parent'] == 1) {
                    return $categories;
                }
                $id_current = $result[0]['id_parent'];
            } else {
                return $categories;
            }
        }
    }

    public function getLastIdCMSCategoryFromCMSCategoriesRewrite($rewrite_categories, $id_lang, $id_shop)
    {
        $id_cms_category = 1;
        if ($rewrite_categories) {
            $rewrite_categories_array = explode('/', $rewrite_categories);
            foreach ($rewrite_categories_array as $rewrite_category) {
                $sql = 'SELECT ccl.`id_cms_category` FROM `'._DB_PREFIX_.'cms_category_lang` ccl';
                $sql .= ' LEFT JOIN `'._DB_PREFIX_.'cms_category` cc ON ccl.id_cms_category = cc.id_cms_category';
                $sql .= ' WHERE ccl.`link_rewrite` = \''.pSQL($rewrite_category).'\'';
                //$sql .= ' AND ccl.`id_shop` = \''.pSQL($id_shop).'\'';
                $sql .= ' AND cc.id_parent = \''.pSQL($id_cms_category).'\'';
                $result = Db::getInstance()->getValue(
                    $sql.' AND ccl.`id_lang` = \''.pSQL($id_lang).'\''
                );

                if ($result) {
                    $id_cms_category = $result;
                }

                if (!$id_cms_category) {
                    $result = Db::getInstance()->getValue($sql);
                    if ($result) {
                        $id_cms_category = $result;
                    }
                }
            }
            $this->doNothing($id_shop);
        }

        return $id_cms_category;
    }

    public function dispatcherLoadRoutes($routes, $dispatcher = null)
    {
        $context = Context::getContext();

        $language_ids = $this->getLanguageIDs(false);
        if (isset($context->language) && !in_array($context->language->id, $language_ids)) {
            $language_ids[] = (int)$context->language->id;
        }

        if (Tools::isCallable(array($dispatcher, 'getRoutes'))) {
            //Check all the routes for 3rd party module pre-dispatchers and add to handled routes
            foreach ($routes as $id_shop => $shop_routes) {
                foreach ($shop_routes as $id_lang => $lang_routes) {
                    foreach ($lang_routes as $route_id => $one_lang_routes) {
                        $module = null;
                        if (isset($one_lang_routes['params']['fsau_pre_dispatcher_module']) &&
                            $one_lang_routes['params']['fsau_pre_dispatcher_module']) {
                            $module = $one_lang_routes['params']['fsau_pre_dispatcher_module'];
                        }

                        $function = null;
                        if (isset($one_lang_routes['params']['fsau_pre_dispatcher_function']) &&
                            $one_lang_routes['params']['fsau_pre_dispatcher_function']) {
                            $function = $one_lang_routes['params']['fsau_pre_dispatcher_function'];
                        }

                        if ($module && $function) {
                            $this->addPreDispatcher($route_id, $module, $function);
                            $this->addHandleRoute($route_id);
                        }

                        //Check for 3rd party module multilang routes
                        if (isset($one_lang_routes['params']['fsau_multilang_route']) &&
                            $one_lang_routes['params']['fsau_multilang_route']) {
                            $this->addMultilangRoute($route_id);
                        }
                    }
                }
            }

            //Load the multi language routes
            $routes = $dispatcher->getRoutes();
            foreach ($routes as $id_shop => $shop_routes) {
                if (Configuration::get('FSAU_ENABLE_MULTILANG_ROUTES', null, null, $id_shop)) {
                    foreach ($shop_routes as $id_lang => $lang_routes) {
                        foreach ($lang_routes as $route_id => $one_lang_routes) {
                            if (in_array($route_id, $this->multilang_routes)) {
                                $route_data = $dispatcher->default_routes[$route_id];
                                $multilang_rule = Configuration::get('FSAU_ROUTE_'.$route_id, $id_lang, null, $id_shop);
                                if (!$multilang_rule) {
                                    $multilang_rule = $route_data['rule'];
                                }

                                $dispatcher->addRoute(
                                    $route_id,
                                    $multilang_rule,
                                    $route_data['controller'],
                                    $id_lang,
                                    $route_data['keywords'],
                                    isset($route_data['params']) ? $route_data['params'] : array(),
                                    $id_shop
                                );
                            }
                        }
                    }
                }
            }

            //Re-Assign the routes
            $routes = $dispatcher->getRoutes();
            $handled_routes = $this->handled_routes;
            foreach ($routes as $id_shop => $shop_routes) {
                foreach ($shop_routes as $id_lang => $lang_routes) {
                    foreach ($lang_routes as $route_name => $one_lang_routes) {
                        //When the schema contains an ending slash we add the route without it
                        if (in_array($route_name, $handled_routes) && isset($dispatcher->default_routes[$route_name])) {
                            $route_data = $dispatcher->default_routes[$route_name];
                            $route_data['rule'] = $one_lang_routes['rule'];

                            if (FsAdvancedUrlTools::endsWith(trim($route_data['rule']), '/')) {
                                $route_data['rule'] = Tools::substr($route_data['rule'], 0, -1);
                                $dispatcher->addRoute(
                                    $route_name.'_2',
                                    $route_data['rule'],
                                    $route_data['controller'],
                                    $id_lang,
                                    $route_data['keywords'],
                                    isset($route_data['params']) ? $route_data['params'] : array(),
                                    $id_shop
                                );
                                $this->addHandleRoute($route_name.'_2');
                                if ($pre_dispatcher = $this->getRoutePreDispatcher($route_name)) {
                                    $this->addPreDispatcher(
                                        $route_name.'_2',
                                        $pre_dispatcher['module']->name,
                                        $pre_dispatcher['function']
                                    );
                                }
                            }
                        }

                        //If the schema not ends with a slash add the other version to work both
                        //Other routes is not necessary because the fixRegexResult solve that
                        if (in_array($route_name, $handled_routes) && isset($dispatcher->default_routes[$route_name])) {
                            $route_data = $dispatcher->default_routes[$route_name];
                            $route_data['rule'] = $one_lang_routes['rule'];

                            if (FsAdvancedUrlTools::endsWith(trim($route_data['rule']), '}') ||
                                (!FsAdvancedUrlTools::contains(trim($route_data['rule']), '}')
                                    && !FsAdvancedUrlTools::endsWith(trim($route_data['rule']), '/'))) {
                                if (!$dispatcher->hasKeyword($route_name, $id_lang, 'categories', $id_shop)) {
                                    $route_data['rule'] = $route_data['rule'].'/';
                                    $dispatcher->addRoute(
                                        $route_name.'_2',
                                        $route_data['rule'],
                                        $route_data['controller'],
                                        $id_lang,
                                        $route_data['keywords'],
                                        isset($route_data['params']) ? $route_data['params'] : array(),
                                        $id_shop
                                    );
                                    $this->addHandleRoute($route_name.'_2');
                                    if ($pre_dispatcher = $this->getRoutePreDispatcher($route_name)) {
                                        $this->addPreDispatcher(
                                            $route_name.'_2',
                                            $pre_dispatcher['module']->name,
                                            $pre_dispatcher['function']
                                        );
                                    }
                                }
                            }
                        }
                    }
                }
            }

            //Re-Assign the routes
            $routes = $dispatcher->getRoutes();
        }

        //Clean up routes
        foreach ($routes as $id_shop => $shop_routes) {
            foreach ($shop_routes as $id_lang => $lang_routes) {
                foreach ($lang_routes as $route_id => $one_lang_routes) {
                    if (isset($one_lang_routes['params']['fsau_pre_dispatcher_module'])) {
                        unset($routes[$id_shop][$id_lang][$route_id]['params']['fsau_pre_dispatcher_module']);
                    }

                    if (isset($one_lang_routes['params']['fsau_pre_dispatcher_function'])) {
                        unset($routes[$id_shop][$id_lang][$route_id]['params']['fsau_pre_dispatcher_function']);
                    }

                    if (isset($one_lang_routes['params']['fsau_multilang_route'])) {
                        unset($routes[$id_shop][$id_lang][$route_id]['params']['fsau_multilang_route']);
                    }
                }
            }
        }

        $id_shop = (int)$context->shop->id;
        foreach ($language_ids as $id_lang) {
            $tmp = array();
            if ($route_name = Configuration::get('FSAU_ROUTE_FRONT')) {
                if (isset($routes[$id_shop][$id_lang][$route_name])) {
                    $tmp[$route_name] = $routes[$id_shop][$id_lang][$route_name];
                    unset($routes[$id_shop][$id_lang][$route_name]);
                }
            }

            if (isset($routes[$id_shop][$id_lang]) && is_array($routes[$id_shop][$id_lang])) {
                foreach ($routes[$id_shop][$id_lang] as $route_name => $route) {
                    if (!FsAdvancedUrlTools::startsWith(trim($route['rule']), '{')) {
                        $tmp[$route_name] = $route;
                        unset($routes[$id_shop][$id_lang][$route_name]);
                    }
                }

                $routes[$id_shop][$id_lang] = $tmp + $routes[$id_shop][$id_lang];
            }

            if (Configuration::get('FSAU_MODULE_ROUTE_END')) {
                if (isset($routes[$id_shop][$id_lang]['module'])) {
                    $route = $routes[$id_shop][$id_lang]['module'];
                    unset($routes[$id_shop][$id_lang]['module']);
                    $routes[$id_shop][$id_lang]['module'] = $route;
                }
            }
        }

        return $routes;
    }

    public function getLayeredParamFromUri($uri, $id_category)
    {
        $common_part = $this->getLongestMatchingSubstring(
            $this->context->link->getCategoryLink($id_category),
            $uri
        );

        $selected_filters = '';
        if ($common_part) {
            $selected_filters = str_replace($common_part, '', $uri);
        }

        if ($selected_filters) {
            if (FsAdvancedUrlTools::endsWith(trim($selected_filters), '/')) {
                $selected_filters = Tools::substr($selected_filters, 0, -1);
            }
            if (FsAdvancedUrlTools::startsWith(trim($selected_filters), '/')) {
                $selected_filters = Tools::substr($selected_filters, 1);
            }

            $filter_helper = array();
            $selected_filters_array = explode('/', $selected_filters);
            foreach ($selected_filters_array as $selected_filter) {
                if (FsAdvancedUrlTools::contains($selected_filter, '-')) {
                    $filter_helper[] = $selected_filter;
                }
            }

            if ($filter_helper) {
                $selected_filters = implode('/', $filter_helper);
            }
        }

        return $selected_filters;
    }

    public function validateLayeredParams($selected_filters, $id_lang, $id_shop)
    {
        //Find the way to able to validate the params and use it in the preDispatcher
        return false && $selected_filters && $id_lang && $id_shop;
    }

    public function validateRule($route_id, $id_lang, $rule)
    {
        $dispatcher = Dispatcher::getInstance();

        $errors = array();
        if (!isset($dispatcher->default_routes[$route_id])) {
            return false;
        }

        foreach ($dispatcher->default_routes[$route_id]['keywords'] as $keyword => $data) {
            if (isset($data['param']) && !preg_match('#\{([^{}]*:)?'.$keyword.'(:[^{}]*)?\}#', $rule)) {
                $errors[] = $keyword;
            }
        }

        if ($errors) {
            foreach ($errors as $error) {
                FsAdvancedUrlMessenger::addErrorMessage(sprintf(
                    'Keyword "{%1$s}" required for route "%2$s" (rule: "%3$s") - Lang: %4$s',
                    $error,
                    $route_id,
                    htmlspecialchars($rule),
                    Language::getIsoById($id_lang)
                ));
            }

            return false;
        }

        return true;
    }

    #################### LINK ####################

    public function isRemoveAnchor($product, $ipa)
    {
        if ((bool)Configuration::get('FSAU_ENABLE_pr_anchor_remove')) {
            if (!is_object($product)) {
                if (is_array($product) && isset($product['id_product'])) {
                    $id_product = $product['id_product'];
                } elseif ((int)$product) {
                    $id_product = $product;
                } else {
                    throw new PrestaShopException('Invalid product vars');
                }
            } else {
                $id_product = $product->id;
            }

            $ipa_default = Product::getDefaultAttribute($id_product);
            if ((int)$ipa_default == (int)$ipa) {
                return true;
            }
        }

        return false;
    }

    #################### FRONT CONTROLLER ####################

    public function overrideCanonicalUrl($canonical_url)
    {
        $return = array('canonical_url' => $canonical_url, 'params' => array());

        if (isset($this->context->controller->php_self)
            && in_array($this->context->controller->php_self, array('category'))) {
            if ($selected_filters = Tools::getValue('selected_filters')) {
                if ($id_category = Tools::getValue('id_category')) {
                    $return['canonical_url'] = $this->context->link->getCategoryLink(
                        $id_category,
                        null,
                        null,
                        $selected_filters
                    );

                    if (Tools::isSubmit('selected_filters')) {
                        $return['params']['selected_filters'] = Tools::getValue('selected_filters');
                        unset($_GET['selected_filters']);
                    }

                    if (Tools::isSubmit('q')) {
                        $return['params']['q'] = Tools::getValue('q');
                        unset($_GET['q']);
                    }
                }
            }
        }

        if (isset($this->context->controller->php_self)
            && in_array($this->context->controller->php_self, array('cms'))) {
            if (Tools::isSubmit('id_cms_category')) {
                $return['params']['id_cms_category'] = Tools::getValue('id_cms_category');
                unset($_GET['id_cms_category']);
            }
        }

        $this->debug_data['canonical_url'] = $return;
        return $return;
    }

    public function overrideUpdateQueryStringBaseUrl($url, &$extraParams)
    {
        if (Tools::isCallable(array($this->context->controller, 'getCategory'))) {
            if (isset($extraParams['q'])) {
                $url = $this->context->link->getCategoryLink(
                    $this->context->controller->getCategory(),
                    null,
                    null,
                    $extraParams['q']
                );
                unset($extraParams['q']);
            } elseif (Tools::getValue('q') && (isset($extraParams['page']) || isset($extraParams['order']))) {
                $url = $this->context->link->getCategoryLink(
                    $this->context->controller->getCategory(),
                    null,
                    null,
                    Tools::getValue('q')
                );
            } else {
                $url = $this->context->link->getCategoryLink(
                    $this->context->controller->getCategory()
                );
            }
        }

        return $url;
    }
}
