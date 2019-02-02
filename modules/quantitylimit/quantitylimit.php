<?php
/**
* NOTICE OF LICENSE
*
* This source file is subject to a commercial license from BSofts.
* Use, copy, modification or distribution of this source file without written
* license agreement from the BSofts is strictly forbidden.
*
* @author    BSofts Inc.
* @copyright Copyright 2017 © BSofts Inc.
* @license   Single domain commerical license
* @package   quantitylimit
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

include_once(dirname(__FILE__).'/models/Limit.php');
class Quantitylimit extends Module
{
    protected $form_fields;
    private $id_shop = null;
    private $id_shop_group = null;
    public $errors = array();
    protected $module_hooks = array(
        'displayHeader',
        'backOfficeHeader',
        'actionProductDelete',
        'actionProductUpdate',
        'deleteProductAttribute',
        'displayAdminProductsExtra',
    );
    public function __construct()
    {
        $this->name = 'quantitylimit';
        $this->tab = 'front_office_features';
        $this->version = '1.2.0';
        $this->author = 'BSofts Inc';
        $this->need_instance = 0;
        $this->module_key = 'ea553ba080c84ccb147205a763e16d30';

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Quantity Limit');
        $this->description = $this->l('Limit product quantity to order');

        $this->form_fields = array('status', 'min_qty', 'max_qty', 'date_to', 'id_group', 'id_shop');
        $this->errors = array(
            'min_limit_error' => $this->l('You must add %d minimum quantity'),
            'max_limit_error' => $this->l('You cannot add more than %d quantity'),
            'limit_exceed_error' => $this->l('Order limit exceed: Your cannot order product "%s".')
            );
        if ($this->id_shop === null || !Shop::isFeatureActive()) {
            $this->id_shop = Shop::getContextShopID(true);
        } else {
            $this->id_shop = $this->context->shop->id;
        }
        if ($this->id_shop_group === null || !Shop::isFeatureActive()) {
            $this->id_shop_group = Shop::getContextShopGroupID(true);
        } else {
            $this->id_shop_group = $this->context->shop->id_shop_group;
        }
    }

    public function install()
    {
        include(dirname(__FILE__).'/sql/install.php');
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        $this->installConfiguration();
        if (parent::install()) {
            foreach ($this->module_hooks as $hook) {
                if (!$this->registerHook($hook)) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    public function uninstall()
    {
        include(dirname(__FILE__).'/sql/uninstall.php');
        $this->uninstallConfiguration();
        if (parent::uninstall()) {
            foreach ($this->module_hooks as $hook) {
                if (!$this->unregisterHook($hook)) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    private function installConfiguration()
    {
        $languages = Language::getLanguages();
        Configuration::updateValue('SWEET_QUANTITY_LIMIT_ALERT', 1);
        foreach ($languages as $lang) {
            Configuration::updateValue('MINIMUM_QUANTITY_LIMIT_MSG', array($lang['id_lang'] => ''), true, $this->id_shop_group, $this->id_shop);
            Configuration::updateValue('MAXIMUM_QUANTITY_LIMIT_MSG', array($lang['id_lang'] => ''), true, $this->id_shop_group, $this->id_shop);
        }
        return true;
    }

    private function uninstallConfiguration()
    {
        Configuration::deleteByName('SWEET_QUANTITY_LIMIT_ALERT');
        Configuration::deleteByName('MINIMUM_QUANTITY_LIMIT_MSG');
        Configuration::deleteByName('MAXIMUM_QUANTITY_LIMIT_MSG');
        return true;
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        $output = '';
        if (((bool)Tools::isSubmit('submitQuantitylimitModule')) == true) {
            $this->postProcess();
            $output .= $this->displayConfirmation($this->l('Settings Successfully updated'));
        } elseif (((bool)Tools::getValue('action')) == 'updateQuantityLimit') {
            $id_product = (int)Tools::getValue('id_product');
            $id_attribute_product = (int)Tools::getValue('id_attribute_product');
            $field = (string)Tools::getValue('field');
            $field_value = Tools::getValue('value');
            if (!Validate::isLoadedObject($product = new Product($id_product))) {
                die(json_encode(array(
                        'hasError' => true,
                        'error' => $this->l('Product does not exists.'),
                        'success' => false
                    )));
            } else {
                if (!isset($field) || !in_array($field, $this->form_fields)) {
                    die(json_encode(array(
                        'hasError' => true,
                        'error' => $this->l('Field does not exists.'),
                        'success' => false
                    )));
                } else {
                    if (Limit::isExist($product->id, $id_attribute_product)) {
                        $data = array(
                            'id_product' => $product->id,
                            'id_attribute_product' => $id_attribute_product,
                            $field => $field_value
                        );
                        if (!Limit::updateLimit($data)) {
                            die(json_encode(array(
                                'hasError' => true,
                                'error' => $this->l('Error unsuccessful update.'),
                                'success' => false
                            )));
                        } else {
                            die(json_encode(array(
                                'hasError' => false,
                                'msg' => $this->l('Update successful.'),
                                'success' => true
                            )));
                        }
                    } else {
                        $data = array(
                            'id_product' => $product->id,
                            'id_attribute_product' => $id_attribute_product,
                            $field => $field_value
                        );
                        if (!Limit::addLimit($data)) {
                            die(json_encode(array(
                                'hasError' => true,
                                'error' => $this->l('Error unsuccessful update.'),
                                'success' => false
                            )));
                        } else {
                            die(json_encode(array(
                                'hasError' => false,
                                'msg' => $this->l('Update successful.'),
                                'success' => true
                            )));
                        }
                    }
                }
            }
            die();
        }
        $tpl = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');
        return $output.$this->renderForm().$tpl;
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitQuantitylimitModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );
        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        $radio = (Tools::version_compare(_PS_VERSION_, '1.6.0.0', '<')? 'radio' : 'switch');
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                'lang' => true
                ),
                'input' => array(
                    array(
                        'type' => $radio,
                        'label' => $this->l('Enable Sweet Alert'),
                        'name' => 'SWEET_QUANTITY_LIMIT_ALERT',
                        'is_bool' => true,
                        'class' => 't',
                        'desc' => $this->l('Use sweet alert to show alerts.'),
                        'values' => array(
                            array(
                                'id' => 'SWEET_QUANTITY_LIMIT_ALERT_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'SWEET_QUANTITY_LIMIT_ALERT_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'col' => 7,
                        'type' => 'text',
                        'lang' => true,
                        'name' => 'MINIMUM_QUANTITY_LIMIT_MSG',
                        'label' => $this->l('Minimum alert message'),
                        'desc' => $this->l('set empty to use default message.'),
                    ),
                    array(
                        'col' => 7,
                        'type' => 'text',
                        'lang' => true,
                        'name' => 'MAXIMUM_QUANTITY_LIMIT_MSG',
                        'label' => $this->l('Maximum alert message'),
                        'desc' => $this->l('set empty to use default message.'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        $return = array();
        $return['SWEET_QUANTITY_LIMIT_ALERT'] = Configuration::get('SWEET_QUANTITY_LIMIT_ALERT', null, $this->id_shop_group, $this->id_shop);
        $languages = Language::getLanguages(false);
        foreach ($languages as $lang) {
            $return['MAXIMUM_QUANTITY_LIMIT_MSG'][(int)$lang['id_lang']] = Tools::getValue('MAXIMUM_QUANTITY_LIMIT_MSG_'.(int)$lang['id_lang'], Configuration::get('MAXIMUM_QUANTITY_LIMIT_MSG', (int)$lang['id_lang']), $this->id_shop_group, $this->id_shop);
        }
        foreach ($languages as $lang) {
            $return['MINIMUM_QUANTITY_LIMIT_MSG'][(int)$lang['id_lang']] = Tools::getValue('MINIMUM_QUANTITY_LIMIT_MSG_'.(int)$lang['id_lang'], Configuration::get('MINIMUM_QUANTITY_LIMIT_MSG', (int)$lang['id_lang']), $this->id_shop_group, $this->id_shop);
        }
        return $return;
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        Configuration::updateValue('SWEET_QUANTITY_LIMIT_ALERT', Tools::getValue('SWEET_QUANTITY_LIMIT_ALERT', 1), $this->id_shop_group, $this->id_shop);
        $message = array('maximum' => array(), 'minimum' => array());
        foreach ($_POST as $key => $value) {
            if (preg_match('/MAXIMUM_QUANTITY_LIMIT_MSG_/i', $key)) {
                $id_lang = preg_split('/MAXIMUM_QUANTITY_LIMIT_MSG_/i', $key);
                $message['maximum'][(int)$id_lang[1]] = $value;
            } elseif (preg_match('/MINIMUM_QUANTITY_LIMIT_MSG_/i', $key)) {
                $id_lang = preg_split('/MINIMUM_QUANTITY_LIMIT_MSG_/i', $key);
                $message['minimum'][(int)$id_lang[1]] = $value;
            }
        }
        Configuration::updateValue('MAXIMUM_QUANTITY_LIMIT_MSG', $message['maximum'], true, $this->id_shop_group, $this->id_shop);
        Configuration::updateValue('MINIMUM_QUANTITY_LIMIT_MSG', $message['minimum'], true, $this->id_shop_group, $this->id_shop);
    }

    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookBackOfficeHeader()
    {
        if ($this->context->controller->controller_name == 'AdminProducts') {
            $this->context->controller->addjQueryPlugin(array('date'));
            $this->context->controller->addCSS(_PS_JS_DIR_.'jquery/plugins/timepicker/jquery-ui-timepicker-addon.css');
        }

        if (Tools::isSubmit('update_limited_qty') && Tools::getIsset('id_product') && Tools::getIsset('ipa') && Validate::isLoadedObject($product = new Product((int)Tools::getValue('id_product')))) {
            $data = array(
                'id_product' => (int)$product->id,
                'id_attribute_product' => (int)Tools::getValue('ipa'),
                );
            if (!Limit::isExist($data['id_product'], $data['id_attribute_product'])) {
                if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') === true) {
                    Tools::redirectAdmin($_SERVER['HTTP_REFERER'].'&limit_error=1#hooks');
                } else {
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminProducts').'&id_product='.(int)Tools::getValue('id_product').'&updateproduct&key_tab=ModuleQuantitylimit&limit_error=1');
                }
            }
            if (Limit::updateStatus($data)) {
                if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') === true) {
                    Tools::redirectAdmin($_SERVER['HTTP_REFERER'].'&conf=5#hooks');
                } else {
                    Tools::redirectAdmin($this->context->link->getAdminLink('AdminProducts').'&id_product='.(int)Tools::getValue('id_product').'&updateproduct&key_tab=ModuleQuantitylimit&conf=5');
                }
            }
        }
    }

    public function hookDisplayAdminProductsExtra($params)
    {
        $id_product = (isset($params) && isset($params['id_product']))? (int)$params['id_product'] : (int)Tools::getValue('id_product');
        if (Validate::isLoadedObject($product = new Product($id_product))) {
            // for simple products
            $product_limit = Limit::getProductLimit($id_product);
            $attributes = $product->getAttributesResume($this->context->language->id);
            if ($product->hasAttributes()) {
                if (isset($attributes) && is_array($attributes)) {
                    foreach ($attributes as &$attribute) {
                        if (Limit::isExist($id_product, $attribute['id_product_attribute'])) {
                            $attribute = $attribute + Limit::getProductLimit($id_product, $attribute['id_product_attribute']);
                        }
                    }
                }
            }
            $module_index = $this->context->link->getAdminLink('AdminModules', false);
            $module_token = Tools::getAdminTokenLite('AdminModules');
            $ajax_url = $module_index.'&configure='.$this->name.'&token='.$module_token.'&tab_module='.$this->tab.'&module_name='.$this->name;
            $this->context->smarty->assign(array(
                'ps_version' => _PS_VERSION_,
                'product' => $product,
                'id_product' => $id_product,
                'shops' => Shop::getShops(),
                'attributes' => $attributes,
                'product_limit' => $product_limit,
                'multishop' => Shop::isFeatureActive(),
                'simpleProduct' => $product->hasAttributes(),
                'groups' => Group::getGroups($this->context->language->id),
                'admin_one_shop' => count($this->context->employee->getAssociatedShops()) == 1,
                'ajax_url' => $ajax_url,
            ));
            return $this->display(__FILE__, 'views/templates/admin/product_tab/quantity_limit_products.tpl');
        } else {
            return $this->displayWarning($this->l('You must save this product before setting quantity limit.'));
        }
    }

    public function hookDeleteProductAttribute($params)
    {
        if (isset($params) && isset($params['id_product']) && isset($params['id_product_attribute'])) {
            Limit::deleteLimitByProduct($params['id_product'], $params['id_product_attribute']);
        }
    }

    public function hookActionProductDelete($params)
    {
        if (isset($params) && isset($params['id_product'])) {
            Limit::deleteLimitByProduct($params['id_product']);
        }
    }

    public function hookDisplayHeader()
    {
        $current_page = 'product';
        if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
            $current_page = $this->context->controller->getPageName();
            $this->context->controller->registerStylesheet('sweetalert2-css', 'modules/'.$this->name.'/views/css/sweetalert2.css', array('priority' => 500, 'media' => 'all'));

            $this->context->controller->registerJavascript('sweetalert2-js', 'modules/'.$this->name.'/views/js/sweetalert2.js', array('position' => 'bottom', 'priority' => 1000));
            $this->context->controller->registerJavascript('quantity_limit-js', 'modules/'.$this->name.'/views/js/quantity_limit.js', array('position' => 'bottom', 'priority' => 1001));
        } else {
            $current_page = $this->context->controller->php_self;
            $this->context->controller->addJS($this->_path.'/views/js/sweetalert2.js');
            $this->context->controller->addJS($this->_path.'/views/js/quantity_limit.js');
            $this->context->controller->addCSS($this->_path.'/views/css/sweetalert2.css');
        }

        $this->context->smarty->assign('current_page', $current_page);
        $this->context->smarty->assign('is_swal', (int)Configuration::get('SWEET_QUANTITY_LIMIT_ALERT', null, $this->id_shop_group, $this->id_shop));
        return $this->display($this->_path, 'views/templates/hook/header.tpl');
    }
}
