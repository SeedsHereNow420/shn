<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

if (!class_exists('MotionSeedModule')) {
    include_once(dirname(__FILE__) . '/helpers/motionseed-module/MotionSeedModule.php');
}

class CustomNumber extends MotionSeedModule
{
    
    public function __construct()
    {
        $this->name = 'customnumber';
        $this->tab = 'administration';
        $this->version = '1.8.6';
        $this->author = 'motionSeed';
        $this->need_instance = 0;
        $this->ps_versions_compliancy['min'] = '1.6.0.0';

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Custom Number');
        $this->description = $this->l('Set custom number of orders, invoices, delivery slips and credit slips.');

        $this->error = false;
        $this->secure_key = Tools::encrypt($this->name);
        $this->module_key = 'fc87214ab965b1982a77a26b1554c6db';

        $this->configurations = array(
            array(
                'name' => 'MS_CUSTOMNUMBER_ORDER',
                'label' => 'Orders',
                'default' => '0||||1||1||5||',
                'keep' => true
            ),
            array(
                'name' => 'MS_CUSTOMNUMBER_INVOICE',
                'label' => 'Invoices',
                'default' => '0||||1||1||5||',
                'keep' => true
            ),
            array(
                'name' => 'MS_CUSTOMNUMBER_DELIVERY',
                'label' => 'Delivery Slips',
                'default' => '0||||1||1||5||',
                'keep' => true
            ),
            array(
                'name' => 'MS_CUSTOMNUMBER_CREDIT_SLIP',
                'label' => 'Credit Slips',
                'default' => '0||||1||1||5||',
                'keep' => true
            ),
            array(
                'name' => 'MS_CUSTOMNUMBER_INIT_TS',
                'label' => '',
                'default' => time(),
                'keep' => true
            ),
            array(
                'name' => 'MS_CUSTOMNUMBER_INIT_NR_TS',
                'label' => '',
                'default' => time(),
                'keep' => true
            ),
            array(
                'name' => 'MS_CUSTOMNUMBER_USE_ORDER_DATE',
                'label' => '',
                'default' => 0,
                'keep' => true
            ),
            array(
                'name' => 'MS_CUSTOMNUMBER_SHARE_COUNTER',
                'label' => '',
                'default' => 0,
                'keep' => true
            ),
            array(
                'name' => 'MS_CUSTOMNUMBER_NEW_NUMBER_SHIFT',
                'label' => '',
                'default' => false,
                'keep' => true
            ),
            array(
                'name' => 'MS_CUSTOMNUMBER_EDIT_NUMBER',
                'label' => '',
                'default' => false,
                'keep' => true
            )
        );
    }
    
    public function registerHooks()
    {
        return parent::registerHooks()
            && $this->registerHook('actionAdminOrdersControllerBefore')
            && $this->registerHook('actionObjectOrderAddAfter')
            && $this->registerHook('actionObjectAmazonOrderAddAfter')
            && $this->registerHook('actionObjectCDiscountOrderAddAfter')
            && $this->registerHook('actionObjectOrderSlipAddAfter')
            && $this->registerHook('displayAdminOrder');
    }
    
    public function hookActionAdminOrdersControllerBefore($params)
    {
        if (Tools::getIsset('edit_number')) {            
            $types = array(
                'order' => CustomNumberHelper::ORDER,
                'invoice' => CustomNumberHelper::INVOICE,
                'orderslip' => CustomNumberHelper::CREDIT_SLIP,
                'delivery' => CustomNumberHelper::DELIVERY
            );
            
            list($type, $id) = explode('_', Tools::getValue('document'));
            
            if (!isset($types[$type]) && !$id) {
                return;
            }
            
            $number = CustomNumberHelper::$number_maps[$types[$type]];
            
            if (Tools::getIsset('delete_document')) {
                Db::getInstance()->execute(
                    'UPDATE `' . _DB_PREFIX_ . bqSQL($number['table']) .'`
                        SET ' . bqSQL($number['column']) . ' = 0
                        WHERE ' . bqSQL($number['identifier']) . ' = ' . (int) $id
                );
                
                if ($type === 'invoice' || $type === 'delivery') {
                    Db::getInstance()->execute(
                        'UPDATE `' . _DB_PREFIX_ .'orders`
                            SET ' . bqSQL($type) . '_number = 0
                            WHERE id_order = ' . (int) Tools::getValue('id_order')
                    );
                }
            } elseif ($type === 'order') {
                Db::getInstance()->execute(
                    'UPDATE `' . _DB_PREFIX_ . bqSQL($number['table']) .'`
                        SET ' . bqSQL($number['column']) . ' = "' . pSQL(Tools::getValue('value')) . '"
                        WHERE ' . bqSQL($number['identifier']) . ' = ' . (int) $id
                );
            } else {
                $value = Tools::getValue('value');
                $date_add = $this->formatDate($value['date_add']);
                
                Db::getInstance()->execute(
                    'REPLACE INTO `' . _DB_PREFIX_ .'customnumber_document`
                        SET id_document = ' . (int) $id . ',
                            type = "' . pSQL($types[$type]) . '",
                            number = "' . pSQL($value['number']) . '"'
                );
                
                if ($date_add) {
                    Db::getInstance()->execute(
                        'UPDATE `' . _DB_PREFIX_ . bqSQL($number['table']) .'`
                            SET date_add = CONCAT("' . pSQL($date_add) . '", " ", TIME(date_add))
                            WHERE ' . bqSQL($number['identifier']) . ' = ' . (int) $id
                    );
                }
            }
            
            echo Tools::jsonEncode(array('success' => true));
            exit();
        }
    }

    public function hookActionObjectOrderAddAfter($params)
    {
        $order = $params['object'];

        CustomNumberHelper::setNumber(CustomNumberHelper::ORDER, $order->id, $order);
    }

    public function hookActionObjectAmazonOrderAddAfter($params)
    {
        $this->hookActionObjectOrderAddAfter($params);
    }
    
    public function hookActionObjectCDiscountOrderAddAfter($params)
    {
        $this->hookActionObjectOrderAddAfter($params);
    }

    public function hookActionObjectOrderSlipAddAfter($params)
    {
        $order_slip = $params['object'];

        CustomNumberHelper::setNumber(CustomNumberHelper::CREDIT_SLIP, $order_slip->id, $order_slip);
    }
    
    public function hookDisplayAdminOrder()
    {
        if (!Configuration::get('MS_CUSTOMNUMBER_EDIT_NUMBER')) {
            return;
        }
        
        $order = new Order(Tools::getValue('id_order'));

        if (!Validate::isLoadedObject($order)) {
            return;
        }
        
        $this->context->controller->addCSS($this->_path . 'views/css/bootstrap-editable.css');
        $this->context->controller->addJS($this->_path . 'views/js/bootstrap-editable.min.js');
        $this->context->controller->addJS($this->_path . 'views/js/bootstrap-editable-document.js');
        
        $params = array(
            'tab' => 'AdminOrders',
            'action' => 'EditProductOnOrder',
            'ajax' => 1,
            'edit_number' => 1,
            'id_order' => (int) Tools::getValue('id_order')
        );
        
        $this->smarty->assign(array(
            'url' => $this->context->link->getAdminLink('AdminOrders') . '&' . http_build_query($params),
            'date_format' => $this->formatDateJS(),
            'order' => $order
        ));
        
        return $this->display(__FILE__, 'number-edit.tpl');
    }

    protected function postValidation()
    {
        $this->_errors = array();

        $id_number = (int) Tools::getValue('id_number');

        if (Tools::isSubmit('savecustomnumber')
            || Tools::isSubmit('updatecustomnumber')
            || Tools::isSubmit('statuscustomnumber')) {
            if (isset($this->configurations[$id_number])) {
                $this->_configuration = $this->configurations[$id_number];
                $this->_params = explode('||', Configuration::get($this->configurations[$id_number]['name']));

                if (Tools::isSubmit('savecustomnumber') && !Tools::getValue('f_01')) {
                    if (Tools::getValue('f_1') == '') {
                        $this->_errors[] = $this->l('Format is empty');
                    }

                    if (!Validate::isUnsignedInt(Tools::getValue('f_2'))) {
                        $this->_errors[] = $this->l('Start value must be a positive value (default value : 0)');
                    }

                    if (!Validate::isUnsignedInt(Tools::getValue('f_3'))) {
                        $this->_errors[] = $this->l('Step must be a positive value (default value : 1)');
                    }

                    if (!Validate::isUnsignedInt(Tools::getValue('f_4'))) {
                        $this->_errors[] = $this->l('Length must be a positive value (default value : 5)');
                    }

                    if (Tools::getValue('f_5') == 'V' && !Validate::isUnsignedInt(Tools::getValue('f_5_V'))) {
                        $this->_errors[] = $this->l('Reset value must be a positive value');
                    }

                    if (Tools::getValue('f_5') == 'D') {
                        $d = array(
                            Tools::getValue('years') != 0 ? (int) Tools::getValue('years') : date('Y'),
                            Tools::getValue('months') != 0 ? (int) Tools::getValue('months') : date('m'),
                            Tools::getValue('days') != 0 ? (int) Tools::getValue('days') : date('d')
                        );

                        if (!Validate::isDate(implode('-', $d))) {
                            $this->_errors[] = $this->l('Invalid reset date');
                        }
                    }
                }
            } else {
                $this->_errors[] = $this->l('Invalid id_number');
            }
        } elseif (Tools::isSubmit('savecustomnumberadvanced')) {
            $d = array(
                (int)Tools::getValue('years'),
                (int)Tools::getValue('months'),
                (int)Tools::getValue('days')
            );

            if (!Validate::isDate(implode('-', $d))) {
                $this->_errors[] = $this->l('Invalid start date');
            }
        }

        if (count($this->_errors)) {
            $this->html .= $this->displayError($this->_errors);

            return false;
        }

        return true;
    }

    public function getContent()
    {
        $valid = $this->postValidation();
        
        // Next Number
        if (Tools::isSubmit('nextnumber')) {
            $number = $valid ? $this->nextNumberTesting() : 0;
            
            die(Tools::jsonEncode(array('hasError' => !$valid, 'number' => $number)));
        }

        if ($valid) {
            if (Tools::isSubmit('savecustomnumber')) {
                $params = array(
                    (bool) Tools::getValue('f_0'),
                    str_replace('||', '|', Tools::getValue('f_1')),
                    Tools::getValue('f_2'),
                    Tools::getValue('f_3'),
                    Tools::getValue('f_4')
                );

                switch (Tools::getValue('f_5')) {
                    case 'V':
                        $params[] = sprintf('V:%s', Tools::getValue('f_5_V'));
                        break;
                    case 'D':
                        $d = array(
                            Tools::getValue('years') != 0 ? (int) Tools::getValue('years') : 'YYYY',
                            Tools::getValue('months') != 0 ? (int) Tools::getValue('months') : 'MM',
                            Tools::getValue('days') != 0 ? (int) Tools::getValue('days') : 'DD'
                        );

                        $params[] = sprintf('D:%s', implode('-', $d));
                        break;
                    default:
                        $params[] = '';
                }
                
                if (Tools::getValue('f_01') && Tools::getValue('f_0')) {
                    $params = $this->_params;
                    
                    $params[0] = 2;
                }

                Configuration::updateValue($this->_configuration['name'], implode('||', $params));

                $this->html .= $this->displayConfirmation($this->l('Configuration successfully saved'));
            }

            if (Tools::isSubmit('statuscustomnumber')) {
                $this->_params[0] = (bool) !$this->_params[0];

                Configuration::updateValue($this->_configuration['name'], implode('||', $this->_params));
            }
            
            if (Tools::isSubmit('savecustomnumberadvanced')) {
                Configuration::updateValue('MS_CUSTOMNUMBER_INIT_NR_TS', mktime(
                    0,
                    0,
                    0,
                    (int)Tools::getValue('months'),
                    (int)Tools::getValue('days'),
                    (int)Tools::getValue('years')
                ));
                
                Configuration::updateValue('MS_CUSTOMNUMBER_USE_ORDER_DATE', (bool)Tools::getValue('use_order_date'));
                Configuration::updateValue('MS_CUSTOMNUMBER_SHARE_COUNTER', (bool)Tools::getValue('share_counter'));
                Configuration::updateValue('MS_CUSTOMNUMBER_EDIT_NUMBER', (bool)Tools::getValue('edit_number'));
                
                $this->html .= $this->displayConfirmation($this->l('Configuration successfully saved'));
            }
        }

        if ((Tools::isSubmit('savecustomnumber') && !$valid) || Tools::isSubmit('updatecustomnumber')) {
            $helper = $this->initForm();

            // id_number field
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_number');

            $helper->fields_value = array(
                'id_number' => (int) Tools::getValue('id_number'),
                'f_01' => (int) Tools::getValue('f_01', $this->_params[0] == 2),
                'days' => Tools::getValue('days', 0),
                'months' => Tools::getValue('months', 0),
                'years' => Tools::getValue('years', 0),
                'f_5' => Tools::getValue('f_5', ''),
                'f_5_V' => Tools::getValue('f_5_V', '')
            );

            // Populate data
            $count = count($this->_params);
            for ($i = 0; $i < $count; $i++) {
                $helper->fields_value['f_' . $i] = Tools::getValue('f_' . $i, $this->_params[$i]);

                if ($i == 5 && !Tools::getIsset('f_5')) {
                    // Reset data
                    $reset = explode(':', $this->_params[5]);

                    if (count($reset) > 0) {
                        switch ($reset[0]) {
                            case 'V':
                                $helper->fields_value['f_5'] = 'V';
                                $helper->fields_value['f_5_V'] = $reset[1];
                                break;
                            case 'D':
                                $helper->fields_value['f_5'] = 'D';

                                $d = explode('-', $reset[1]);

                                if (count($d) === 3) {
                                    $helper->fields_value['years'] = (int) $d[0];
                                    $helper->fields_value['months'] = (int) $d[1];
                                    $helper->fields_value['days'] = (int) $d[2];
                                }

                                break;
                            default:
                                $helper->fields_value['f_5'] = '';
                        }
                    }
                }
            }
            
            $helper->fields_value['f_0'] = (int) Tools::getValue('f_0', $this->_params[0] > 0);

            return $this->html . $helper->generateForm($this->fields_form);
        } else {
            $helper = $this->initList();
            
            $this->html .= $helper->generateList(
                $this->getListContent(),
                $this->fields_list
            );
            
            // Advanced form
            $helper_form_advanced = $this->initFormAdvanced();
            
            $time = Configuration::get('MS_CUSTOMNUMBER_INIT_NR_TS');
            
            $is_save_context = Tools::isSubmit('savecustomnumber');
            
            $helper_form_advanced->fields_value = array(
                'days' => ($is_save_context ? date('d', $time) : Tools::getValue('days', date('d', $time))),
                'months' => ($is_save_context ? date('m', $time) : Tools::getValue('months', date('m', $time))),
                'years' => ($is_save_context ? date('Y', $time) : Tools::getValue('years', date('Y', $time)))
            );
            
            $helper_form_advanced->fields_value['use_order_date'] = (int) Tools::getValue(
                'use_order_date',
                Configuration::get('MS_CUSTOMNUMBER_USE_ORDER_DATE')
            );
            
            $helper_form_advanced->fields_value['share_counter'] = (int) Tools::getValue(
                'share_counter',
                Configuration::get('MS_CUSTOMNUMBER_SHARE_COUNTER')
            );
            
            $helper_form_advanced->fields_value['edit_number'] = (int) Tools::getValue(
                'edit_number',
                Configuration::get('MS_CUSTOMNUMBER_EDIT_NUMBER')
            );
            
            $this->html .= $helper_form_advanced->generateForm($this->fields_form);
            
            return $this->html;
        }
    }

    protected function getListContent()
    {
        $result = array();

        foreach ($this->configurations as $index => $configuration) {
            if ($configuration['label'] == '') {
                continue;
            }
            
            $params = explode('||', Configuration::get($configuration['name']));

            $result[] = array(
                'id_number' => $index,
                'type' => $this->l($configuration['label']),
                'format' => $params[0] == 2 ? $this->l('Provisioning') : $params[1],
                'active' => (bool) $params[0]
            );
        }

        return $result;
    }

    protected function initForm()
    {
        $this->context->controller->addJqueryPlugin('tablednd');
        $this->context->controller->addJS(_PS_JS_DIR_ . 'admin-dnd.js');
        $this->context->controller->addJS($this->_path . 'views/js/admin/config.js');

        $years = CustomNumberHelper::dateYears();
        $months = Tools::dateMonths();
        $days = Tools::dateDays();

        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Configuration'),
                'image' => _PS_ADMIN_IMG_ . 'information.png'
            ),
            'input' => array(
                array(
                    'type' => 'switch',
                    'label' => $this->l('Provisioning'),
                    'name' => 'f_01',
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'provisioning_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'provisioning_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'desc' => $this->l('The numbering will be provide by an external service or by a connector.')
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Status'),
                    'name' => 'f_0',
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'enable_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'enable_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    )
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Format'),
                    'name' => 'f_1',
                    'class' => 'fixed-width-xxl',
                    'suffix' => $this->display(__FILE__, 'tags.tpl'),
                    'desc' => $this->display(__FILE__, 'format.tpl')
                )
            )
        );

        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->l('Counter Configuration'),
                'image' => $this->_path . 'views/img/counter.png'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Start value'),
                    'name' => 'f_2',
                    'class' => 'fixed-width-md'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Step'),
                    'name' => 'f_3',
                    'class' => 'fixed-width-md',
                    'desc' => $this->l('{COUNTER} increases by Step.')
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Length'),
                    'name' => 'f_4',
                    'class' => 'fixed-width-md',
                    'desc' => $this->l('{COUNTER} will pad with leading zeroes to get length.')
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Reset'),
                    'name' => 'f_5',
                    'class' => 'col-lg-3',
                    'values' => array(
                        array(
                            'id' => 'f_5_V',
                            'label' => '<img src="' . _PS_ADMIN_IMG_ . 'enabled.gif" /> ' . $this->l('when value is'),
                            'value' => 'V'
                        ),
                        array(
                            'id' => 'f_5_D',
                            'label' => '<img src="' . _PS_ADMIN_IMG_ . 'enabled.gif" /> ' . $this->l('when date is'),
                            'value' => 'D'
                        ),
                        array(
                            'id' => 'f_5_None',
                            'label' => '<img src="' . _PS_ADMIN_IMG_ . 'disabled.gif" /> ' . $this->l('None'),
                            'value' => ''
                        )
                    )
                ),
                array(
                    'type' => 'text',
                    'name' => 'f_5_V',
                    'class' => 'f_5_V fixed-width-md',
                    'desc' => $this->l('After reaching this value, {COUNTER} resets to start value.')
                ),
                array(
                    'type' => 'birthday',
                    'name' => 'f_5_D',
                    'class' => 'f_5_D',
                    'options' => array(
                        'days' => $days,
                        'months' => $months,
                        'years' => $years
                    ),
                    'desc' => $this->l('After reaching this date, {COUNTER} resets to start value.')
                )
            ),
            'submit' => array(
                'name' => 'submitCustomNumber',
                'title' => $this->l('Save')
            )
        );

        $helper = new HelperForm();
        $helper->module = $this;
        $helper->name_controller = 'customnumber';
        $helper->identifier = 'id_number';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
        $helper->toolbar_scroll = true;
        $helper->title = array(
            $this->displayName,
            $this->l($this->configurations[Tools::getValue('id_number')]['label'])
        );
        $helper->submit_action = 'savecustomnumber';
        $helper->show_cancel_button = true;
        $helper->back_url = AdminController::$currentIndex . '&configure=' . $this->name
            . '&token=' . Tools::getAdminTokenLite('AdminModules');
        $helper->toolbar_btn = array(
            'cancel' =>
            array(
                'href' => AdminController::$currentIndex . '&amp;configure=' . $this->name
                . '&token=' . Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->l('Cancel')
            )
        );
        
        Hook::exec(
            'actionCustomNumberConfigureForm',
            array(
                'module' => $this,
                'helper' => $helper
            )
        );
        
        return $helper;
    }

    protected function initFormAdvanced()
    {
        $years = CustomNumberHelper::dateYears(10, 60, false);
        $months = Tools::dateMonths();
        $days = Tools::dateDays();

        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Advanced Configuration'),
                'icon' => 'icon-gears'
            ),
            'input' => array(
                array(
                    'type' => 'birthday',
                    'label' => $this->l('Start numbering'),
                    'name' => 'init_nr',
                    'options' => array(
                        'days' => $days,
                        'months' => $months,
                        'years' => $years
                    ),
                    'desc' => $this->l('The numbering managed by the module will start from this date.')
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Use order date'),
                    'name' => 'use_order_date',
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'use_order_date_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'use_order_date_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'desc' => $this->l(
                        'For all counters, use the order date instead '
                        . 'of type date (invoice, credit slip or delivery slip).'
                    )
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Enable number editing'),
                    'name' => 'edit_number',
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'edit_number_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'edit_number_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    )
                )
            ),
            'submit' => array(
                'name' => 'submitCustomNumberAdvanced',
                'title' => $this->l('Save')
            )
        );
        
        if (Shop::isFeatureActive()) {
            $this->fields_form[0]['form']['input'][] = array(
                'type' => 'switch',
                'label' => $this->l('Share counter'),
                'name' => 'share_counter',
                'class' => 't',
                'is_bool' => true,
                'values' => array(
                    array(
                        'id' => 'share_counter_on',
                        'value' => 1,
                        'label' => $this->l('Yes')),
                    array(
                        'id' => 'share_counter_off',
                        'value' => 0,
                        'label' => $this->l('No')),
                ),
                'desc' => $this->l(
                    'Your shops will share the same counter for each type (invoice, order, ...).'
                )
            );
        }

        $helper = new HelperForm();
        $helper->module = $this;
        $helper->name_controller = 'customnumber';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
        $helper->toolbar_scroll = true;
        $helper->title = array(
            $this->displayName,
            $this->l($this->configurations[Tools::getValue('id_number')]['label'])
        );
        $helper->submit_action = 'savecustomnumberadvanced';
        $helper->show_cancel_button = true;
        $helper->back_url = AdminController::$currentIndex . '&configure=' . $this->name
            . '&token=' . Tools::getAdminTokenLite('AdminModules');
        $helper->toolbar_btn = array(
            'cancel' =>
            array(
                'href' => AdminController::$currentIndex . '&amp;configure=' . $this->name
                . '&token=' . Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->l('Cancel')
            )
        );
        
        Hook::exec(
            'actionCustomNumberConfigureFormAdvanced',
            array(
                'module' => $this,
                'helper' => $helper
            )
        );
        
        return $helper;
    }

    protected function initList()
    {
        $this->fields_list = array(
            'type' => array(
                'title' => $this->l('Type'),
                'width' => 140,
                'type' => 'text'
            ),
            'format' => array(
                'title' => $this->l('Format'),
                'width' => 140,
                'type' => 'text'
            ),
            'active' => array(
                'title' => $this->l('Status'),
                'width' => 140,
                'align' => 'center',
                'active' => 'status'
            )
        );

        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = true;
        $helper->identifier = 'id_number';
        $helper->actions = array('edit');
        $helper->show_toolbar = true;
        $helper->imageType = 'jpg';

        $helper->title = $this->displayName;
        $helper->table = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
        
        Hook::exec(
            'actionCustomNumberConfigureList',
            array(
                'module' => $this,
                'helper' => $helper
            )
        );
        
        return $helper;
    }
    
    public function nextNumberTesting()
    {
        $configuration = $this->configurations[(int) Tools::getValue('id_number')];
        $context = str_replace('MS_CUSTOMNUMBER_', '', $configuration['name']);
        $object = new stdClass;

        $object->date_add = date("Y-m-d H:i:s");
        
        $params = array(
            1,
            str_replace('||', '|', Tools::getValue('f_1')),
            Tools::getValue('f_2'),
            Tools::getValue('f_3'),
            Tools::getValue('f_4')
        );

        switch (Tools::getValue('f_5')) {
            case 'V':
                $params[] = sprintf('V:%s', Tools::getValue('f_5_V'));
                break;
            case 'D':
                $d = array(
                    Tools::getValue('years') != 0 ? (int) Tools::getValue('years') : 'YYYY',
                    Tools::getValue('months') != 0 ? (int) Tools::getValue('months') : 'MM',
                    Tools::getValue('days') != 0 ? (int) Tools::getValue('days') : 'DD'
                );

                $params[] = sprintf('D:%s', implode('-', $d));
                break;
            default:
                $params[] = '';
        }

        $number = (int)CustomNumberHelper::setNumber($context, 0, $object, $params);
        
        $object->number = $number;
        $object->reference = $number;
        $object->delivery_number = $number;
        $object->id_order = Db::getInstance()->getValue('SELECT MAX(id_order) + 1 FROM ' . _DB_PREFIX_ . 'orders');
        $object->id = $object->id_order;
        
        return CustomNumberHelper::format($context, 0, 1, $object, $params);
    }
    
    public function formatDate($date, $localized = false, $format_dst = 'Y-m-d')
    {
        $format_src = $this->context->language->date_format_lite;

        if ($localized) {
            $this->swapVariables($format_src, $format_dst);
        }

        return date_format(
            date_create_from_format($format_src, $date),
            $format_dst
        );
    }
    
    public function formatDateJS()
    {
        return str_replace(
            array('d', 'm', 'y'),
            array('dd', 'mm', 'yy'),
            Tools::strtolower($this->context->language->date_format_lite)
        );
    }
}
