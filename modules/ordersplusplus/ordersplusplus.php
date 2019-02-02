<?php
/**
*  Copyright (C) Prestalia - All Rights Reserved
*
*  Unauthorized copying of this file, via any medium is strictly prohibited
*  Proprietary and confidential
*
*  @author    Prestalia <prestalia.it>
*  @copyright 2015-2016 Prestalia
*  @license   Closed source, proprietary software
*/

class OrdersPlusPlus extends Module
{
    public function __construct()
    {
        $this->name = 'ordersplusplus';
        $this->tab = 'administration';
        $this->version = '1.6.4';
        $this->author = 'Prestalia';
        $this->module_key = 'c46d3ad1cb7d7a47344f052aea04d6d3';
        $this->need_instance = 0;

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Orders++');
        $this->description = $this->l('A better way to manage orders.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall this module ?');
    }

    public function install()
    {
        $sql_file = dirname(__FILE__).'/install/install.sql';
        if (!$this->loadSQLFile($sql_file)) {
            return false;
        }

        Configuration::updateValue('OPP_SHOW_STATISTICS', 1);
        Configuration::updateValue('OPP_SHOW_CATEGORIES_FILTER', 1);
        Configuration::updateValue('OPP_SHOW_CUSTOMER_GROUP_FILTER', 1);
        Configuration::updateValue('OPP_SHOW_PRODUCT_FILTER', 1);
        Configuration::updateValue('OPP_SHOW_BULK_CHANGE_ORDER_STATE', 1);
        Configuration::updateValue('OPP_SHOW_BULK_CHANGE_CARRIER', 1);
        Configuration::updateValue('OPP_DISABLE_LEFT_CLICK', 0);
        Configuration::updateValue('OPP_ENABLE_ORDERS_DELETION', 0);
        Configuration::updateValue('OPP_SHOW_REFERENCE', 1);
        Configuration::updateValue('OPP_SHOW_MARKETPLACE_REF', 0);
        Configuration::updateValue('OPP_SHOW_NEW_CUSTOMER', 1);
        Configuration::updateValue('OPP_SHOW_DELIVERY', 1);
        Configuration::updateValue('OPP_SHOW_SHIPPING_INFORMATIONS', 1);
        Configuration::updateValue('OPP_SHOW_CUSTOMER', 1);
        Configuration::updateValue('OPP_SHOW_DNI', 1);
        Configuration::updateValue('OPP_SHOW_DELIVERY_ADDRESS', 1);
        Configuration::updateValue('OPP_SHOW_COMPANY', 1);
        Configuration::updateValue('OPP_SHOW_VAT_NUMBER', 1);
        Configuration::updateValue('OPP_SHOW_PRODUCTS', 1);
        Configuration::updateValue('OPP_HIGHLIGHT_PRODUCTS_QTYS', 0);
        Configuration::updateValue('OPP_PRODUCT_QUANTITY_MIN_LIMIT', 10);
        Configuration::updateValue('OPP_SHOW_PRODUCTS_IMAGES', 1);
        $imageType = Db::getInstance()->getValue(
            'SELECT `id_image_type` FROM `'._DB_PREFIX_.'image_type` WHERE name = \'home_default\''
        );
        if ($imageType === false) {
            $imageType = Db::getInstance()->getValue(
                'SELECT MIN(`id_image_type`) FROM `'._DB_PREFIX_.'image_type`'
            );
        }
        Configuration::updateValue('OPP_PRODUCTS_IMAGES_TYPE', $imageType);
        Configuration::updateValue('OPP_SHOW_BOOKMARK_A', 1);
        Configuration::updateValue('OPP_BOOKMARK_A_NAME', 'A');
        Configuration::updateValue('OPP_SHOW_BOOKMARK_B', 1);
        Configuration::updateValue('OPP_BOOKMARK_B_NAME', 'B');
        Configuration::updateValue('OPP_SHOW_NOTES', 1);
        Configuration::updateValue('OPP_SHOW_NOTES_ONMOUSEOVER', 1);
        Configuration::updateValue('OPP_SHOW_TAX_ID', 1);
        Configuration::updateValue('OPP_SHOW_ORDER_TOTAL', 1);
        Configuration::updateValue('OPP_SHOW_PAYMENT_METHOD', 1);
        Configuration::updateValue('OPP_SHOW_ORDER_STATUS', 1);
        Configuration::updateValue('OPP_ORDER_STATUS_HIGHLIGHTING', 0);
        $orderStatus = Db::getInstance()->getValue(
            'SELECT MIN(`id_order_state`) FROM `'._DB_PREFIX_.'order_state`'
        );
        Configuration::updateValue('OPP_ORDER_STATUS_TO_HIGHLIGHT', $orderStatus);
        Configuration::updateValue('OPP_HIGHLIGHTING_COLOR', '#c3ff74');
        Configuration::updateValue('OPP_SHOW_ORDER_DATE', 1);
        Configuration::updateValue('OPP_SHOW_PDF_BUTTONS', 1);
        Configuration::updateValue('OPP_SHOW_INSTANT_SHIPPING', 0);

        if (!parent::install()) {
            return false;
        }

        if (!$this->installTab('AdminParentOrders', 'AdminOrdersPlusPlus', $this->displayName)) {
            return false;
        }

        if (!$this->registerHook('displayAdminOrder')) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        $sql_file = dirname(__FILE__).'/install/uninstall.sql';
        if (!$this->loadSQLFile($sql_file)) {
            return false;
        }

        Configuration::deleteByName('OPP_SHOW_STATISTICS');
        Configuration::deleteByName('OPP_SHOW_CATEGORIES_FILTER');
        Configuration::deleteByName('OPP_SHOW_CUSTOMER_GROUP_FILTER');
        Configuration::deleteByName('OPP_SHOW_PRODUCT_FILTER');
        Configuration::deleteByName('OPP_SHOW_BULK_CHANGE_ORDER_STATE');
        Configuration::deleteByName('OPP_SHOW_BULK_CHANGE_CARRIER');
        Configuration::deleteByName('OPP_DISABLE_LEFT_CLICK');
        Configuration::deleteByName('OPP_ENABLE_ORDERS_DELETION');
        Configuration::deleteByName('OPP_SHOW_REFERENCE');
        Configuration::deleteByName('OPP_SHOW_MARKETPLACE_REF');
        Configuration::deleteByName('OPP_SHOW_NEW_CUSTOMER');
        Configuration::deleteByName('OPP_SHOW_DELIVERY');
        Configuration::deleteByName('OPP_SHOW_SHIPPING_INFORMATIONS');
        Configuration::deleteByName('OPP_SHOW_CUSTOMER');
        Configuration::deleteByName('OPP_SHOW_DNI');
        Configuration::deleteByName('OPP_SHOW_DELIVERY_ADDRESS');
        Configuration::deleteByName('OPP_SHOW_COMPANY');
        Configuration::deleteByName('OPP_SHOW_VAT_NUMBER');
        Configuration::deleteByName('OPP_SHOW_PRODUCTS');
        Configuration::deleteByName('OPP_HIGHLIGHT_PRODUCTS_QTYS');
        Configuration::deleteByName('OPP_PRODUCT_QUANTITY_MIN_LIMIT');
        Configuration::deleteByName('OPP_SHOW_PRODUCTS_IMAGES');
        Configuration::deleteByName('OPP_PRODUCTS_IMAGES_TYPE');
        Configuration::deleteByName('OPP_SHOW_BOOKMARK_A');
        Configuration::deleteByName('OPP_BOOKMARK_A_NAME', 'Book A');
        Configuration::deleteByName('OPP_SHOW_BOOKMARK_B');
        Configuration::deleteByName('OPP_BOOKMARK_B_NAME', 'Book B');
        Configuration::deleteByName('OPP_SHOW_NOTES');
        Configuration::deleteByName('OPP_SHOW_NOTES_ONMOUSEOVER');
        Configuration::deleteByName('OPP_SHOW_TAX_ID');
        Configuration::deleteByName('OPP_SHOW_ORDER_TOTAL');
        Configuration::deleteByName('OPP_SHOW_PAYMENT_METHOD');
        Configuration::deleteByName('OPP_SHOW_ORDER_STATUS');
        Configuration::deleteByName('OPP_ORDER_STATUS_HIGHLIGHTING');
        Configuration::deleteByName('OPP_ORDER_STATUS_TO_HIGHLIGHT');
        Configuration::deleteByName('OPP_HIGHLIGHTING_COLOR');
        Configuration::deleteByName('OPP_SHOW_ORDER_DATE');
        Configuration::deleteByName('OPP_SHOW_PDF_BUTTONS');
        Configuration::deleteByName('OPP_SHOW_INSTANT_SHIPPING');

        if (!$this->uninstallTab('AdminOrdersPlusPlus')) {
            return false;
        }

        return parent::uninstall();
    }

    public function installTab($parent, $class_name, $name)
    {
        $tab = new Tab();
        $tab->id_parent = (int)Tab::getIdFromClassName($parent);
        $tab->name = array();

        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $name;
        }

        $tab->class_name = $class_name;
        $tab->module = $this->name;
        $tab->active = 1;

        return $tab->add();
    }

    public function uninstallTab($class_name)
    {
        $tab = new Tab((int)Tab::getIdFromClassName($class_name));

        return $tab->delete();
    }

    public function loadSQLFile($sql_file)
    {
        $sql_content = Tools::file_get_contents($sql_file);
        $sql_content = str_replace('PREFIX_', _DB_PREFIX_, $sql_content);
        $sql_requests = preg_split("/;\s*[\r\n]+/", $sql_content);
        foreach ($sql_requests as $request) {
            if (!empty($request)) {
                if (!Db::getInstance()->execute(trim($request))) {
                    $this->context->controller->errors[] = Db::getInstance()->getMsgError();
                    return false;
                }
            }
        }
        return true;
    }

    public function getContent()
    {
        $this->context->controller->addCSS($this->_path.'views/css/common.css');
        $this->context->controller->addCSS($this->_path.'views/css/prestalia_header.css');

        $output = '';

        if (Tools::isSubmit('submit' . $this->name)) {
            $output .= $this->postProcess();
        }

        $this->context->smarty->assign('module_dir', $this->_path);
        $this->context->smarty->assign('module_version', $this->version);
        $this->context->smarty->assign(array(
            'module_dir' => $this->_path,
            'module_version' => $this->version,
            'base_url' => Tools::getHttpHost(true).__PS_BASE_URI__,
            'iso' => $this->context->language->iso_code
        ));

        $output .= $this->context->smarty->fetch($this->local_path.'views/templates/admin/prestalia_header.tpl');

        return $output.$this->renderForm();
    }

    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submit'.$this->name;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).
            '&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        if (version_compare(_PS_VERSION_, '1.6', '<')) {
            $configForm = $this->getConfigForm15();
        } else {
            $configForm = $this->getConfigForm();
        }
        return $helper->generateForm(array($configForm));
    }

    protected function getConfigForm15()
    {
        $form = $this->getConfigForm();

        unset($form['form']['legend']['icon']);

        foreach ($form['form']['input'] as &$input) {
            unset($input['hint']);
            if ($input['type'] == 'switch') {
                $input['type'] = 'radio';
                $input['class'] = 't';
            }
        }
        unset($input);

        unset($form['form']['buttons']);

        return $form;
    }

    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('View settings'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Statistics'),
                        'name' => 'opp_show_statistics',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the').' '.$this->l('Statistics').' '.
                            $this->l('before the Orders table.'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_statistics_on',
                                'value' => true,
                                'label' => $this->l('Enabled')

                            ),
                            array(
                                'id' => 'opp_show_statistics_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Categories filter'),
                        'name' => 'opp_show_categories_filter',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the').' '.$this->l('Categories filter').' '.
                            $this->l('before the Orders table.'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_categories_filter_on',
                                'value' => true,
                                'label' => $this->l('Enabled')

                            ),
                            array(
                                'id' => 'opp_show_categories_filter_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Customer group filter'),
                        'name' => 'opp_show_customer_group_filter',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the').' '.$this->l('Customer group filter').' '.
                            $this->l('before the Orders table.'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_customer_group_filter_on',
                                'value' => true,
                                'label' => $this->l('Enabled')

                            ),
                            array(
                                'id' => 'opp_show_customer_group_filter_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Product filter'),
                        'name' => 'opp_show_product_filter',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the').' '.$this->l('product filter').' '.
                            $this->l('before the Orders table.'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_product_filter_on',
                                'value' => true,
                                'label' => $this->l('Enabled')

                            ),
                            array(
                                'id' => 'opp_show_product_filter_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Bulk change order state'),
                        'name' => 'opp_show_bulk_change_order_state',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the "bulk change order state" panel before the orders table'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_bulk_change_order_state_on',
                                'value' => true,
                                'label' => $this->l('Enabled')

                            ),
                            array(
                                'id' => 'opp_show_bulk_change_order_state_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Bulk change carrier and shipping weight'),
                        'name' => 'opp_show_bulk_change_carrier',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the "bulk change carrier and shipping weight" panel before the orders table'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_bulk_change_carrier_on',
                                'value' => true,
                                'label' => $this->l('Enabled')

                            ),
                            array(
                                'id' => 'opp_show_bulk_change_carrier_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Disable').' '.$this->l('left click in the orders table'),
                        'name' => 'opp_disable_left_click',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to disable the').' '.
                            $this->l('left click on orders table rows, (eg. allow to copy info from the table).'),
                        'hint' => $this->l('You can still view the order details by clicking on the View button.'),
                        'values' => array(
                            array(
                                'id' => 'opp_disable_left_click_on',
                                'value' => true,
                                'label' => $this->l('Enabled')

                            ),
                            array(
                                'id' => 'opp_disable_left_click_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Enable orders deletion'),
                        'name' => 'opp_enable_orders_deletion',
                        'is_bool' => true,
                        'desc' => $this->l('This option enables orders deletion.').' '.
                            $this->l('Be careful, deleted orders will NOT be recoverable!'),
                        'values' => array(
                            array(
                                'id' => 'opp_enable_orders_deletion_on',
                                'value' => true,
                                'label' => $this->l('Enabled')

                            ),
                            array(
                                'id' => 'opp_enable_orders_deletion_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Reference'),
                        'name' => 'opp_show_reference',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_reference_on',
                                'value' => true,
                                'label' => $this->l('Enabled')

                            ),
                            array(
                                'id' => 'opp_show_reference_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Marketplace Reference'),
                        'name' => 'opp_show_marketplace_ref',
                        'is_bool' => true,
                        'desc' => $this->l('This option shows the order reference provided by a marketplace.').' '.
                            $this->l('For more informations see the module\'s guide.').' '.
                            $this->l('(Only available if Reference field is enabled)'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_marketplace_ref_on',
                                'value' => true,
                                'label' => $this->l('Enabled')

                            ),
                            array(
                                'id' => 'opp_show_marketplace_ref_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('New Customer'),
                        'name' => 'opp_show_new_customer',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_new_customer_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_new_customer_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Delivery'),
                        'name' => 'opp_show_delivery',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_delivery_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_delivery_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Shipping informations'),
                        'name' => 'opp_show_shipping_informations',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the').' '.$this->l('Shipping informations').' '.
                            $this->l('in the Delivery field.').' '.
                            $this->l('(Only available if Delivery field is enabled)'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_shipping_informations_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_shipping_informations_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Customer'),
                        'name' => 'opp_show_customer',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_customer_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_customer_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Dni'),
                        'name' => 'opp_show_dni',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the').' '.$this->l('Dni').' '.
                            $this->l('in the Customer field.').' '.
                            $this->l('(Only available if Customer field is enabled)'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_dni_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_dni_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Company'),
                        'name' => 'opp_show_company',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the').' '.$this->l('Company').' '.
                            $this->l('in the Customer field.').' '.
                            $this->l('(Only available if Customer field is enabled)'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_company_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_company_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Vat number'),
                        'name' => 'opp_show_vat_number',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the').' '.$this->l('Vat number').' '.
                            $this->l('in the Customer field.').' '.
                            $this->l('(Only available if Customer field is enabled)'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_vat_number_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_vat_number_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Delivery Address'),
                        'name' => 'opp_show_delivery_address',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the').' '.$this->l('Delivery Address').' '.
                            $this->l('in the Customer field.').' '.
                            $this->l('(Only available if Customer field is enabled)'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_delivery_address_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_delivery_address_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Products'),
                        'name' => 'opp_show_products',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_products_on',
                                'value' => true,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'opp_show_products_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Highlight products\' quantities'),
                        'name' => 'opp_highlight_products_qtys',
                        'is_bool' => true,
                        'desc' => $this->l('Highlight products\' quantities higher or equal than the value below.').
                            ' '.$this->l('(Only available if Products field is enabled)'),
                        'values' => array(
                            array(
                                'id' => 'opp_highlight_products_qtys_on',
                                'value' => true,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'opp_highlight_products_qtys_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-arrow-circle-o-up"></i>',
                        'label' => $this->l('Minimum quantity'),
                        'name' => 'opp_product_quantity_min_limit',
                        'required' => true,
                        'col' => 2
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Products\' images'),
                        'name' => 'opp_show_products_images',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the ').' '.$this->l('Products\' images').' '.
                            $this->l('in the orders list.').' '.$this->l('(Only on mouse over)'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_products_images_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_products_images_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            )
                        )
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Products\' images type'),
                        'name' => 'opp_products_images_type',
                        'options' => array(
                            'query' => ImageType::getImagesTypes(),
                            'id' => 'id_image_type',
                            'name' => 'name'
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Bookmark A'),
                        'name' => 'opp_show_bookmark_a',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_bookmark_a_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_bookmark_a_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-edit"></i>',
                        'label' => $this->l('Bookmark A name'),
                        'name' => 'opp_bookmark_a_name',
                        'required' => true,
                        'desc' => $this->l('You can edit the name of the Bookmark A'),
                        'col' => 4
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Bookmark B'),
                        'name' => 'opp_show_bookmark_b',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_bookmark_b_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_bookmark_b_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-edit"></i>',
                        'label' => $this->l('Bookmark B name'),
                        'name' => 'opp_bookmark_b_name',
                        'required' => true,
                        'desc' => $this->l('You can edit the name of the Bookmark B'),
                        'col' => 4
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Notes'),
                        'name' => 'opp_show_notes',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_notes_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_notes_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show notes on mouse over'),
                        'name' => 'opp_show_notes_onmouseover',
                        'is_bool' => true,
                        'desc' => $this->l('(Only available if Notes field is enabled)'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_notes_onmouseover_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_notes_onmouseover_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show tax ID'),
                        'name' => 'opp_show_tax_id',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_tax_id_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_tax_id_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Order Total'),
                        'name' => 'opp_show_order_total',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_order_total_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_order_total_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Payment Method'),
                        'name' => 'opp_show_payment_method',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_payment_method_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_payment_method_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Order Status'),
                        'name' => 'opp_show_order_status',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_order_status_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_order_status_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Highlight orders'),
                        'name' => 'opp_order_status_highlighting',
                        'is_bool' => true,
                        'desc' => $this->l('Highlight orders that have the order status below in their history.').' '
                        .$this->l('(Only available if Order Status field is enabled)'),
                        'values' => array(
                            array(
                                'id' => 'opp_order_status_highlighting_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_order_status_highlighting_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Order status to search'),
                        'name' => 'opp_order_status_to_highlight',
                        'options' => array(
                            'query' => OrderState::getOrderStates((int)$this->context->language->id),
                            'id' => 'id_order_state',
                            'name' => 'name'
                        )
                    ),
                    array(
                        'type' => 'color',
                        'label' => $this->l('Color'),
                        'name' => 'opp_highlighting_color',
                        'desc' => '('.$this->l('Rows will be highlighted with this color.').')'
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Order Date'),
                        'name' => 'opp_show_order_date',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_order_date_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_order_date_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('PDF Buttons'),
                        'name' => 'opp_show_pdf_buttons',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'opp_show_pdf_buttons_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_pdf_buttons_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show').' '.$this->l('Instant shipping'),
                        'name' => 'opp_show_instant_shipping',
                        'is_bool' => true,
                        'desc' => $this->l('Choose whether to show the').' '.$this->l('Instant Shipping field').' '.
                            $this->l('(Only available if ShippingCountdown module is installed)'),
                        'values' => array(
                            array(
                                'id' => 'opp_show_instant_shipping_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'opp_show_instant_shipping_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save and stay'),
                ),
                'buttons' => array(
                    array(
                        'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
                        'title' => $this->l('Back to list'),
                        'icon' => 'process-icon-back',
                    ),
                ),
            )
        );
    }

    protected function getConfigFormValues()
    {
        return array(
            'opp_show_statistics' => Configuration::get('OPP_SHOW_STATISTICS'),
            'opp_show_categories_filter' => Configuration::get('OPP_SHOW_CATEGORIES_FILTER'),
            'opp_show_customer_group_filter' => Configuration::get('OPP_SHOW_CUSTOMER_GROUP_FILTER'),
            'opp_show_product_filter' => Configuration::get('OPP_SHOW_PRODUCT_FILTER'),
            'opp_show_bulk_change_order_state' => Configuration::get('OPP_SHOW_BULK_CHANGE_ORDER_STATE'),
            'opp_show_bulk_change_carrier' => Configuration::get('OPP_SHOW_BULK_CHANGE_CARRIER'),
            'opp_disable_left_click' => Configuration::get('OPP_DISABLE_LEFT_CLICK'),
            'opp_enable_orders_deletion' => Configuration::get('OPP_ENABLE_ORDERS_DELETION'),
            'opp_show_reference' => Configuration::get('OPP_SHOW_REFERENCE'),
            'opp_show_marketplace_ref' => Configuration::get('OPP_SHOW_MARKETPLACE_REF'),
            'opp_show_new_customer' => Configuration::get('OPP_SHOW_NEW_CUSTOMER'),
            'opp_show_delivery' => Configuration::get('OPP_SHOW_DELIVERY'),
            'opp_show_shipping_informations' => Configuration::get('OPP_SHOW_SHIPPING_INFORMATIONS'),
            'opp_show_customer' => Configuration::get('OPP_SHOW_CUSTOMER'),
            'opp_show_dni' => Configuration::get('OPP_SHOW_DNI'),
            'opp_show_delivery_address' => Configuration::get('OPP_SHOW_DELIVERY_ADDRESS'),
            'opp_show_company' => Configuration::get('OPP_SHOW_COMPANY'),
            'opp_show_vat_number' => Configuration::get('OPP_SHOW_VAT_NUMBER'),
            'opp_show_products' => Configuration::get('OPP_SHOW_PRODUCTS'),
            'opp_highlight_products_qtys' => Configuration::get('OPP_HIGHLIGHT_PRODUCTS_QTYS'),
            'opp_product_quantity_min_limit' => Configuration::get('OPP_PRODUCT_QUANTITY_MIN_LIMIT'),
            'opp_show_products_images' => Configuration::get('OPP_SHOW_PRODUCTS_IMAGES'),
            'opp_products_images_type' => Configuration::get('OPP_PRODUCTS_IMAGES_TYPE'),
            'opp_show_bookmark_a' => Configuration::get('OPP_SHOW_BOOKMARK_A'),
            'opp_bookmark_a_name' => Configuration::get('OPP_BOOKMARK_A_NAME'),
            'opp_show_bookmark_b' => Configuration::get('OPP_SHOW_BOOKMARK_B'),
            'opp_bookmark_b_name' => Configuration::get('OPP_BOOKMARK_B_NAME'),
            'opp_show_notes' => Configuration::get('OPP_SHOW_NOTES'),
            'opp_show_notes_onmouseover' => Configuration::get('OPP_SHOW_NOTES_ONMOUSEOVER'),
            'opp_show_tax_id' => Configuration::get('OPP_SHOW_TAX_ID'),
            'opp_show_order_total' => Configuration::get('OPP_SHOW_ORDER_TOTAL'),
            'opp_show_payment_method' => Configuration::get('OPP_SHOW_PAYMENT_METHOD'),
            'opp_show_order_status' => Configuration::get('OPP_SHOW_ORDER_STATUS'),
            'opp_order_status_highlighting' => Configuration::get('OPP_ORDER_STATUS_HIGHLIGHTING'),
            'opp_order_status_to_highlight' => Configuration::get('OPP_ORDER_STATUS_TO_HIGHLIGHT'),
            'opp_highlighting_color' => Configuration::get('OPP_HIGHLIGHTING_COLOR'),
            'opp_show_order_date' => Configuration::get('OPP_SHOW_ORDER_DATE'),
            'opp_show_pdf_buttons' => Configuration::get('OPP_SHOW_PDF_BUTTONS'),
            'opp_show_instant_shipping' => Configuration::get('OPP_SHOW_INSTANT_SHIPPING'),
        );
    }

    public function postProcess()
    {
        Configuration::updateValue('OPP_SHOW_STATISTICS', (int)(Tools::getValue('opp_show_statistics')));
        Configuration::updateValue('OPP_SHOW_CATEGORIES_FILTER', (int)(Tools::getValue('opp_show_categories_filter')));
        Configuration::updateValue(
            'OPP_SHOW_CUSTOMER_GROUP_FILTER',
            (int)(Tools::getValue('opp_show_customer_group_filter'))
        );
        Configuration::updateValue('OPP_SHOW_PRODUCT_FILTER', (int)(Tools::getValue('opp_show_product_filter')));
        Configuration::updateValue('OPP_SHOW_BULK_CHANGE_ORDER_STATE', (int)(Tools::getValue('opp_show_bulk_change_order_state')));
        Configuration::updateValue('OPP_SHOW_BULK_CHANGE_CARRIER', (int)(Tools::getValue('opp_show_bulk_change_carrier')));
        Configuration::updateValue('OPP_DISABLE_LEFT_CLICK', (int)(Tools::getValue('opp_disable_left_click')));
        Configuration::updateValue('OPP_ENABLE_ORDERS_DELETION', (int)(Tools::getValue('opp_enable_orders_deletion')));
        Configuration::updateValue('OPP_SHOW_REFERENCE', (int)(Tools::getValue('opp_show_reference')));
        Configuration::updateValue('OPP_SHOW_MARKETPLACE_REF', (int)(Tools::getValue('opp_show_marketplace_ref')));
        Configuration::updateValue('OPP_SHOW_NEW_CUSTOMER', (int)(Tools::getValue('opp_show_new_customer')));
        Configuration::updateValue('OPP_SHOW_DELIVERY', (int)(Tools::getValue('opp_show_delivery')));
        Configuration::updateValue(
            'OPP_SHOW_SHIPPING_INFORMATIONS',
            (int)(Tools::getValue('opp_show_shipping_informations'))
        );
        Configuration::updateValue('OPP_SHOW_CUSTOMER', (int)(Tools::getValue('opp_show_customer')));
        Configuration::updateValue('OPP_SHOW_DNI', (int)(Tools::getValue('opp_show_dni')));
        Configuration::updateValue('OPP_SHOW_DELIVERY_ADDRESS', (int)(Tools::getValue('opp_show_delivery_address')));
        Configuration::updateValue('OPP_SHOW_COMPANY', (int)(Tools::getValue('opp_show_company')));
        Configuration::updateValue('OPP_SHOW_VAT_NUMBER', (int)(Tools::getValue('opp_show_vat_number')));
        Configuration::updateValue('OPP_SHOW_PRODUCTS', (int)(Tools::getValue('opp_show_products')));
        Configuration::updateValue(
            'OPP_HIGHLIGHT_PRODUCTS_QTYS',
            (int)(Tools::getValue('opp_highlight_products_qtys'))
        );
        $quantity = (int)Tools::getValue('opp_product_quantity_min_limit');
        if ($quantity < 0) {
            $quantity = 0;
        }
        Configuration::updateValue('OPP_PRODUCT_QUANTITY_MIN_LIMIT', $quantity);
        Configuration::updateValue('OPP_SHOW_PRODUCTS_IMAGES', (int)(Tools::getValue('opp_show_products_images')));
        Configuration::updateValue('OPP_PRODUCTS_IMAGES_TYPE', (int)(Tools::getValue('opp_products_images_type')));
        Configuration::updateValue('OPP_SHOW_BOOKMARK_A', (int)(Tools::getValue('opp_show_bookmark_a')));

        $bookmarkName = Tools::getValue('opp_bookmark_a_name');
        if ($bookmarkName === false || $bookmarkName == '') {
            $bookmarkName = 'A';
        }
        Configuration::updateValue('OPP_BOOKMARK_A_NAME', pSQL($bookmarkName));

        Configuration::updateValue('OPP_SHOW_BOOKMARK_B', (int)(Tools::getValue('opp_show_bookmark_b')));

        $bookmarkName = Tools::getValue('opp_bookmark_b_name');
        if ($bookmarkName === false || $bookmarkName == '') {
            $bookmarkName = 'B';
        }
        Configuration::updateValue('OPP_BOOKMARK_B_NAME', pSQL($bookmarkName));

        Configuration::updateValue('OPP_SHOW_NOTES', (int)(Tools::getValue('opp_show_notes')));
        Configuration::updateValue('OPP_SHOW_NOTES_ONMOUSEOVER', (int)(Tools::getValue('opp_show_notes_onmouseover')));
        Configuration::updateValue('OPP_SHOW_TAX_ID', (int)(Tools::getValue('opp_show_tax_id')));
        Configuration::updateValue('OPP_SHOW_ORDER_TOTAL', (int)(Tools::getValue('opp_show_order_total')));
        Configuration::updateValue('OPP_SHOW_PAYMENT_METHOD', (int)(Tools::getValue('opp_show_payment_method')));
        Configuration::updateValue('OPP_SHOW_ORDER_STATUS', (int)(Tools::getValue('opp_show_order_status')));
        Configuration::updateValue(
            'OPP_ORDER_STATUS_HIGHLIGHTING',
            (int)(Tools::getValue('opp_order_status_highlighting'))
        );
        Configuration::updateValue(
            'OPP_ORDER_STATUS_TO_HIGHLIGHT',
            (int)(Tools::getValue('opp_order_status_to_highlight'))
        );
        Configuration::updateValue('OPP_HIGHLIGHTING_COLOR', pSQL(Tools::getValue('opp_highlighting_color')));
        Configuration::updateValue('OPP_SHOW_ORDER_DATE', (int)(Tools::getValue('opp_show_order_date')));
        Configuration::updateValue('OPP_SHOW_PDF_BUTTONS', (int)(Tools::getValue('opp_show_pdf_buttons')));

        // Check if ShippingCountdown module is installed
        $dbPrefix = _DB_PREFIX_;
        $sql = "SHOW TABLES LIKE '{$dbPrefix}shcd_order'";
        $showInstantShipping = (int)Tools::getValue('opp_show_instant_shipping');
        if (count(Db::getInstance()->executeS($sql)) > 0) {
            Configuration::updateValue('OPP_SHOW_INSTANT_SHIPPING', $showInstantShipping);
        }

        return $this->displayConfirmation($this->l('Settings updated.'));
    }

    public function hookDisplayAdminOrder($params)
    {
        $this->context->controller->addCSS($this->_path.'views/css/common.css');
        $this->context->controller->addJquery();
        $this->context->controller->addJqueryPlugin('jgrowl');
        $this->context->controller->addJS($this->_path.'views/js/updateBookmark.js');
        $this->context->controller->addJS($this->_path.'views/js/oppSaveNotes.js');

        if (array_key_exists('id_order', $params)) {
            $id_order = (int)$params['id_order'];
        } else {
            return false;
        }

        $row = Db::getInstance()->getRow(
            'SELECT * FROM `'._DB_PREFIX_.'opp_bookmarks`'."\n".
            'WHERE `id_order` = '.(int)$id_order
        );

        if ($row === false) {
            $this->context->smarty->assign(array(
                'bookmark_a_value' => 0,
                'bookmark_b_value' => 0,
                'opp_notes' => ''
            ));
        } else {
            $this->context->smarty->assign(array(
                'bookmark_a_value' => $row['bookmark_a'],
                'bookmark_b_value' => $row['bookmark_b'],
                'opp_notes' => $row['notes']
            ));
        }

        $this->context->smarty->assign(array(
            'opp_id_order' => $id_order,
            'bookmark_a_name' => Configuration::get('OPP_BOOKMARK_A_NAME'),
            'bookmark_b_name' => Configuration::get('OPP_BOOKMARK_B_NAME')
        ));

        if (version_compare(_PS_VERSION_, '1.6', '<')) {
            return $this->display(__FILE__, 'views/templates/hook/order-details-15.tpl');
        } else {
            return $this->display(__FILE__, 'views/templates/hook/order-details-16.tpl');
        }
    }
}
