<?php
/**
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* @author    InnovaDeluxe SL
* @copyright 2016 InnovaDeluxe SL

* @license   INNOVADELUXE
*/

if (!defined('_PS_VERSION_')) {
}

class IdxCustomRef extends Module
{

    public $dlx_reference;
    public $dlx_old_reference;
    public $order_prefix = '';
    public $es15;
    
    public function __construct()
    {
        $this->name = 'idxcustomref';
        $this->tab = 'administration';
        $this->version = '1.2.3';
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->author = 'innovadeluxe';
        $this->bootstrap = true;
        $this->es15 = version_compare(_PS_VERSION_, '1.6.0.0', '<');
        $this->module_key = '640febc7616aca361bb384330da6097a';
        $this->dlx_reference = 1;
        parent::__construct();

        $this->displayName = $this->l('Custom Order Reference');
        $this->description = $this->l('With this module you can use a numeric value as reference and set a prefix.');
    }

    public function install()
    {
        Configuration::updateGlobalValue(Tools::strtoupper($this->name) . '_IS_CUSTOM_REF', 0);
        Configuration::updateGlobalValue(Tools::strtoupper($this->name) . '_LONG_ORDER_REF', 9);
        Configuration::updateGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR', 1);
        Configuration::updateGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR_INCREASE', 1);
        Configuration::updateGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR_MIN_INCREASE', 1);
        Configuration::updateGlobalValue(Tools::strtoupper($this->name) . '_IS_CUSTOM_RANDOM_REF', 0);
        Configuration::updateGlobalValue(Tools::strtoupper($this->name) . '_PREFIX', 'INT');
        
        return parent::install() &&
        $this->registerHook('actionValidateOrder') &&
        $this->registerHook('displayBackOfficeHeader');
    }

    public function uninstall()
    {
        Configuration::deleteByName(Tools::strtoupper($this->name) . '_IS_CUSTOM_REF');
        Configuration::deleteByName(Tools::strtoupper($this->name) . '_LONG_ORDER_REF');
        Configuration::deleteByName(Tools::strtoupper($this->name) . '_NUM_REFR');
        Configuration::deleteByName(Tools::strtoupper($this->name) . '_NUM_REFR_INCREASE');
        Configuration::deleteByName(Tools::strtoupper($this->name) . '_NUM_REFR_MIN_INCREASE');
        Configuration::deleteByName(Tools::strtoupper($this->name) . '_IS_CUSTOM_RANDOM_REF');
        Configuration::deleteByName(Tools::strtoupper($this->name) . '_PREFIX');
        return parent::uninstall();
    }
    
    public function hookDisplayBackOfficeHeader($params)
    {
        if (Tools::getValue('configure') == $this->name) {
            return $this->display(__FILE__, 'views/templates/admin/'.$this->name.'.tpl');
        }
    }
    
    public function hookActionValidateOrder($params)
    {
        
        if ($this->active) {
            if (Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_IS_CUSTOM_REF')) {
                $order = $params['order'];
                if (Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_PREFIX')) {
                    $this->order_prefix = Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_PREFIX');
                }
                
                if ($this->dlx_old_reference == $order->reference) {
                    $numeroDeReferencia = $this->dlx_reference;
                    $order->reference = $numeroDeReferencia;
                    $order->update();
                    Db::getInstance()->update(
                        'order_payment',
                        array('order_reference' => $numeroDeReferencia),
                        'order_reference = '.$this->dlx_old_reference
                    );
                } else {
                    $this->dlx_old_reference = $order->reference;
                    $numeroDeReferencia = $this->order_prefix . $this->orderReferenceCreator();
                    $this->dlx_reference = $numeroDeReferencia;
                    $order->reference = $numeroDeReferencia;
                    $order->update();
                    Db::getInstance()->update(
                        'order_payment',
                        array('order_reference' => $numeroDeReferencia),
                        '`order_reference` = \''.$this->dlx_old_reference.'\''
                    );
    
                    if (Configuration::get(Tools::strtoupper($this->name) . '_IS_CUSTOM_RANDOM_REF')) {
                        $incrementar_ref = mt_rand(
                            Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR_MIN_INCREASE'),
                            Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR_INCREASE')
                        );
                    } else {
                        $incrementar_ref = Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR_INCREASE');
                    }
    
                    Configuration::updateGlobalValue(
                        Tools::strtoupper($this->name) . '_NUM_REFR',
                        Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR') + $incrementar_ref
                    );
                }
            }
        }
    }
    
    
    public function getContent()
    {
        $output = $this->innovaTitle();
        $output .= $this->postProcess() . $this->renderForm();
        return $output;
    }

    
    public function postProcess()
    {
        if (Tools::isSubmit('submitUpdateConfig')) {
            if (!Configuration::getGlobalValue(Tools::strtoupper($this->name).'_GLOBAL_REF')) {
                Configuration::updateGlobalValue(Tools::strtoupper($this->name).'_GLOBAL_REF', 1);
            }
            
            
            if (Tools::getValue(Tools::strtoupper($this->name) . '_NUM_REFR') < Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR')) {
                return $this->displayError($this->l('Reference number can not be lower than previous reference.'));
            } elseif (Tools::getValue(Tools::strtoupper($this->name) . '_NUM_REFR_MIN_INCREASE') > Tools::getValue(Tools::strtoupper($this->name) . '_NUM_REFR_INCREASE')) {
                return $this->displayError($this->l('Minimum number allowed can not be higher than maximum value.'));
            }
            
            $refNumLength = Tools::strlen(Tools::getValue(Tools::strtoupper($this->name) . '_NUM_REFR'));
            $prefixLength = Tools::strlen(Tools::getValue(Tools::strtoupper($this->name) . '_PREFIX'));
            $totalLength = (int)$refNumLength + (int)$prefixLength;
            
            if ($totalLength > 9) {
                return $this->displayError(
                    $this->l('New order reference can not be higher than 9 characters. Prefix and number reference sum can not exceed in 9 characters.')
                );
            }
            
            Configuration::updateGlobalValue(
                Tools::strtoupper($this->name) . '_LONG_ORDER_REF',
                Tools::getValue(Tools::strtoupper($this->name) . '_LONG_ORDER_REF')
            );
            Configuration::updateGlobalValue(
                Tools::strtoupper($this->name) . '_IS_CUSTOM_REF',
                Tools::getValue(Tools::strtoupper($this->name) . '_IS_CUSTOM_REF')
            );
            Configuration::updateGlobalValue(
                Tools::strtoupper($this->name) . '_NUM_REFR',
                Tools::getValue(Tools::strtoupper($this->name) . '_NUM_REFR')
            );
            Configuration::updateGlobalValue(
                Tools::strtoupper($this->name) . '_NUM_REFR_INCREASE',
                Tools::getValue(Tools::strtoupper($this->name) . '_NUM_REFR_INCREASE')
            );
            Configuration::updateGlobalValue(
                Tools::strtoupper($this->name) . '_NUM_REFR_MIN_INCREASE',
                Tools::getValue(Tools::strtoupper($this->name) . '_NUM_REFR_MIN_INCREASE')
            );
            Configuration::updateGlobalValue(
                Tools::strtoupper($this->name) . '_IS_CUSTOM_RANDOM_REF',
                Tools::getValue(Tools::strtoupper($this->name) . '_IS_CUSTOM_RANDOM_REF')
            );
            Configuration::updateGlobalValue(
                Tools::strtoupper($this->name) . '_PREFIX',
                Tools::getValue(Tools::strtoupper($this->name) . '_PREFIX')
            );
            return $this->displayConfirmation($this->l('The settings have been updated'));
        }
    }

    public function renderForm()
    {
          
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                ),
                'input' => array(
                    array(
                        'type' => $this->es15?'radio':'switch',
                        'class' => 't',
                        'label' => $this->l('Do you want use custom order reference?'),
                        'name' => Tools::strtoupper($this->name) . '_IS_CUSTOM_REF',
                        'desc' => $this->l('You can change order reference. E.g 000001 or INT000001.'),
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
                            ),
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Reference length'),
                        'name' => Tools::strtoupper($this->name) . '_LONG_ORDER_REF',
                        'size' => 5,
                        'desc' => 'Set the length of reference, max length 9',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Set prefix to use in the new order reference'),
                        'name' => Tools::strtoupper($this->name) . '_PREFIX',
                        'size' => 5,
                        'desc' => $this->l('Length for this value will determine total length for order reference number. Total order reference length should not exceed to 9 characteres.'),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Next reference number'),
                        'name' => Tools::strtoupper($this->name) . '_NUM_REFR',
                        'size' => 5,
                        'desc' => $this->l('Number used for your next orders.'),
                        'placeholder' => '',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Number increase'),
                        'name' => Tools::strtoupper($this->name) . '_NUM_REFR_INCREASE',
                        'size' => 5,
                        'desc' => $this->l('This is the number to increase for each order. If you use random option , this will act as maximum step'),
                    ),
                    array(
                        'type' => $this->es15?'radio':'switch',
                        'class' => 't',
                        'label' => $this->l('Do you want use random to increase order reference?'),
                        'name' => Tools::strtoupper($this->name) . '_IS_CUSTOM_RANDOM_REF',
                        'is_bool' => true,
                        'desc' => $this->l('Actual order number will be the maximmum value'),
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
                            ),
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Number minimum to increase'),
                        'name' => Tools::strtoupper($this->name) . '_NUM_REFR_MIN_INCREASE',
                        'size' => 5,
                        'desc' => $this->l('The minimum number order to increase for each order, only if you are using random option'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            )
        );

        return $this->helperCreator('submitUpdateConfig', $fields_form);
    }

    
    private function helperCreator($submitActions, $fields_form)
    {
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get(
            'PS_BO_ALLOW_EMPLOYEE_FORM_LANG'
        ) ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();
        $helper->identifier = $this->identifier;
        $helper->submit_action = $submitActions;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        return $helper->generateForm(array($fields_form));
    }
    
    public function getConfigFieldsValues()
    {
        return array(
            Tools::strtoupper($this->name) . '_IS_CUSTOM_REF' => Tools::getValue(
                Tools::strtoupper($this->name) . '_IS_CUSTOM_REF',
                Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_IS_CUSTOM_REF')
            ),
            Tools::strtoupper($this->name) . '_LONG_ORDER_REF' => Tools::getValue(
                Tools::strtoupper($this->name) . '_LONG_ORDER_REF',
                Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_LONG_ORDER_REF')
            ),
            Tools::strtoupper($this->name) . '_NUM_REFR' => Tools::getValue(
                Tools::strtoupper($this->name) . '_NUM_REFR',
                Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR')
            ),
            Tools::strtoupper($this->name) . '_NUM_REFR_INCREASE' => Tools::getValue(
                Tools::strtoupper($this->name) . '_NUM_REFR_INCREASE',
                Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR_INCREASE')
            ),
            Tools::strtoupper($this->name) . '_NUM_REFR_MIN_INCREASE' => Tools::getValue(
                Tools::strtoupper($this->name) . '_NUM_REFR_MIN_INCREASE',
                Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR_MIN_INCREASE')
            ),
            Tools::strtoupper($this->name) . '_IS_CUSTOM_RANDOM_REF' => Tools::getValue(
                Tools::strtoupper($this->name) . '_IS_CUSTOM_RANDOM_REF',
                Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_IS_CUSTOM_RANDOM_REF')
            ),
            Tools::strtoupper($this->name) . '_PREFIX' => Tools::getValue(
                Tools::strtoupper($this->name) . '_PREFIX',
                Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_PREFIX')
            ),
        );
    }

    public function innovaTitle()
    {
        $suggested_modules = array(
            'en' => array(
                'texto_soporte' => 'support',
                'texto_ayuda' => 'help',
                'texto_opinion' => 'opinion',
                'texto_modulos_interesar' => 'More modules could be interesting for you to improve your shop',
                'texto_todos_modulos' => 'Review all our modules',
                'nombre_modulo1' => 'EU Cookies Law warning',
                'nombre_modulo2' => 'Product query module with protection data law',
                'nombre_modulo3' => 'Adullt content warning',
            ),
            'es' => array(
                'texto_soporte' => 'soporte',
                'texto_ayuda' => 'ayuda',
                'texto_opinion' => 'opinion',
                'texto_modulos_interesar' => 'Más módulos que te pueden interesar para potenciar tu tienda',
                'texto_todos_modulos' => 'consulta todos nuestros módulos',
                'nombre_modulo1' => 'Aviso cumplimiento de la ley de Cookies',
                'nombre_modulo2' => 'Consulta desde Ficha de Producto (con LOPD)',
                'nombre_modulo3' => 'Aviso normativa contenido para adultos',
            ),
            'de' => array(
                'texto_soporte' => 'Support',
                'texto_ayuda' => 'Helfen',
                'texto_opinion' => 'Kommentar',
                'texto_modulos_interesar' => 'Weitere Module, die von Interesse sein könnte, Ihr Geschäft zu verbessern',
                'texto_todos_modulos' => 'Alle unsere Module',
                'nombre_modulo1' => 'Hinweise zur Erfüllung der Cookie-Richtlinien',
                'nombre_modulo2' => 'Anfragen ab der Produktseite (Datenschutzbestimmungen)',
                'nombre_modulo3' => 'Warnhinweis für jugendgefährdende Inhalte',
            ),
            'fr' => array(
                'texto_soporte' => 'Soutien',
                'texto_ayuda' => 'Aider',
                'texto_opinion' => 'Commentaire',
                'texto_modulos_interesar' => 'Plus de modules qui pourraient être d\'intérêt pour améliorer votre magasin',
                'texto_todos_modulos' => 'Voir tous nos modules',
                'nombre_modulo1' => 'Avertissement Légal de Cookies',
                'nombre_modulo2' => 'Demande de renseignements à partir de la page produit',
                'nombre_modulo3' => 'Avertissement de la norme de contenus pour adultes',
            ),
            'it' => array(
                'texto_soporte' => 'Asistenza',
                'texto_ayuda' => 'Aiutare',
                'texto_opinion' => 'Commento',
                'texto_modulos_interesar' => 'Altri moduli che possono essere di interesse per migliorare il vostro negozio',
                'texto_todos_modulos' => 'Vedi tutti i nostri moduli',
                'nombre_modulo1' => 'Avviso sul rispetto della Legge dei Cookies Europea',
                'nombre_modulo2' => 'Richiedere informazioni dalla pagina del prodotto',
                'nombre_modulo3' => 'Avviso normativa sui contenuti per adulti',
            ),
            'id_modulo_actual' => '8123',
            'id_modulo1' => '8296',
            'id_modulo2' => '17399',
            'id_modulo3' => '18008'
        );

        $iso_code_selected = '';
        $shop_iso_code_lang = $this->context->language->iso_code;
        switch ($shop_iso_code_lang) {
            case 'en':
            case 'es':
            case 'de':
            case 'fr':
            case 'it':
                $iso_code_selected = $shop_iso_code_lang;
                break;

            default:
                $iso_code_selected = 'en';
                break;
        }

        $this->smarty->assign(array(
            'module_dir' => $this->_path,
            'module_name' => $this->displayName,
            'module_description' => $this->description,
            'link_iso' => $iso_code_selected,
            'suggested_modules' => $suggested_modules,
        ));

        $this->context->controller->addCSS(($this->_path).'views/css/backinnova.css', 'all');
        return $this->display(__FILE__, 'views/templates/admin/banner/banner.tpl') .
                $this->display(__FILE__, 'views/templates/admin/innova-title.tpl');
    }
    
    public function orderReferenceCreator()
    {
        $numeroDeReferencia = Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_NUM_REFR');
        $longitudNumeroReferencia = Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_LONG_ORDER_REF') - (int)Tools::strlen(Configuration::getGlobalValue(Tools::strtoupper($this->name) . '_PREFIX'));
        return sprintf('%0'.$longitudNumeroReferencia.'d', $numeroDeReferencia);
    }
}
