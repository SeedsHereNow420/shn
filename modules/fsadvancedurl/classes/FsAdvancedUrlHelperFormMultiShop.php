<?php
/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

class FsAdvancedUrlHelperFormMultiShop extends HelperForm
{
    protected $enable_multishop = false;

    protected $tab_section;

    public function __construct($module)
    {
        parent::__construct();
        $this->module = $module;
        $this->name_controller = $this->module->name;
        $this->token = Tools::getAdminTokenLite('AdminModules');
        $this->languages = $this->module->getLanguagesForForm();
        $this->currentIndex = AdminController::$currentIndex.'&configure='.$this->module->name;
        $this->default_form_language = (int)Configuration::get('PS_LANG_DEFAULT');
        $this->allow_employee_form_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        $this->show_toolbar = false;

        if (Shop::isFeatureActive()) {
            if (Shop::getContext() != Shop::CONTEXT_ALL) {
                $this->enable_multishop = true;
            }
        }
    }

    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    public function setSubmitAction($submit_action)
    {
        $this->submit_action = $submit_action;
        return $this;
    }

    public function setTabSection($tab_section)
    {
        $this->tab_section = $tab_section;
        return $this;
    }

    public function setFieldsValue($fields_value)
    {
        $this->fields_value = $fields_value;
        return $this;
    }

    public function generateForm($fields_form)
    {
        if ($this->tab_section) {
            $this->fields_value['tab_section'] = $this->tab_section;
        }

        foreach (array_keys($fields_form) as $id_fieldset) {
            //Add a save button to every panel
            $fields_form[$id_fieldset]['form']['submit'] = array('title' => $this->module->l('Save'));

            if ($this->enable_multishop) {
                $fields_form[$id_fieldset]['form']['legend']['show_multishop_header'] = true;
            }

            //If a tab added, add the hidden field
            if ($this->tab_section) {
                $fields_form[$id_fieldset]['form']['input'][] = array(
                    'type' => 'hidden',
                    'name' => 'tab_section',
                );
            }

            //Loadup width default values
            foreach ($fields_form[$id_fieldset]['form']['input'] as $input) {
                if (isset($input['default_value'])) {
                    $field_name = $input['name'];
                    $field_value = $this->fields_value[$field_name];
                    if (is_array($field_value)) {
                        foreach ($field_value as $id_lang => $value) {
                            if (!$value) {
                                $field_value[$id_lang] = $input['default_value'];
                            }
                        }
                    } else {
                        if (!$field_value) {
                            $field_value = $input['default_value'];
                        }
                    }

                    $this->fields_value[$field_name] = $field_value;
                }
            }
        }

        return parent::generateForm($fields_form);
    }

    public function generate()
    {
        foreach ($this->fields_form as &$fieldset) {
            if (isset($fieldset['form']['input'])) {
                foreach ($fieldset['form']['input'] as &$params) {
                    $label = '';
                    if (isset($params['label'])) {
                        $label = $params['label'];
                    }

                    if (isset($params['is_multishop']) && $params['is_multishop'] && $this->enable_multishop) {
                        $is_disabled = $is_invisible = false;
                        if (Shop::isFeatureActive()) {
                            if (isset($params['visibility']) && $params['visibility'] > Shop::getContext()) {
                                $is_disabled = true;
                                $is_invisible = true;
                            } elseif (Shop::getContext() != Shop::CONTEXT_ALL &&
                                !Configuration::isOverridenByCurrentContext($params['name'])) {
                                $is_disabled = true;
                            }
                        }

                        if ($is_invisible) {
                            $params['form_group_class'] = ' isInvisible';
                        }

                        $params['is_disabled'] = $is_disabled;
                        $params['disabled'] = $is_disabled;
                        $this->module->smartyAssign(array('params' => $params));
                        $params['label'] = $this->module->smartyFetch('admin/multishop_form_extension.tpl').' '.$label;

                        $params['form_group_class'] = ' conf_id_'.$params['name'];
                    }
                }
            }
        }

        return parent::generate();
    }

    public static function handleMultiShop($form_values)
    {
        if (Shop::isFeatureActive()) {
            if (Shop::getContext() != Shop::CONTEXT_ALL) {
                $multishop_override_enabled = Tools::getValue('multishop_override_enabled', array());
                $multishop_override_fields = Tools::getValue('multishop_override_fields', array());
                foreach (array_keys($form_values) as $config_key) {
                    if (in_array($config_key, $multishop_override_fields)) {
                        if (!in_array($config_key, $multishop_override_enabled)) {
                            unset($form_values[$config_key]);
                        }
                    }
                }

                if ($multishop_override_fields) {
                    foreach ($multishop_override_fields as $multishop_override_field) {
                        if (!in_array($multishop_override_field, $multishop_override_enabled)) {
                            Configuration::deleteFromContext($multishop_override_field);
                        }
                    }
                }
            }
        }

        return $form_values;
    }
}
