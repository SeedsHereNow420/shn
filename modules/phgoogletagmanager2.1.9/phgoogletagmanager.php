<?php
/**
 * PrestaChamps
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Commercial License
 * you can't distribute, modify or sell this code
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file
 * If you need help please contact leo@prestachamps.com
 *
 * @author    PrestaChamps <leo@prestachamps.com>
 * @copyright PrestaChamps
 * @license   commercial
 * version 1.0.0 - First release
 * version 1.1.0 - GA userId view + FBuser
 *         1.1.1   - removed 2 extra unused tags, ga addtocart and onepagecheckout,
 *                  - add ecomm_
 *         1.1.1 - Google CustomerReview Badge + Optin !!!!!!! NEEDS ADDING DOCUMENTATION to PDF
 *         1.1.2 - PaypalSubmit
 *         1.1.3 - ECOMM_custom_Dimensions + Adw & Rmkt Switcher
 *         1.1.4 - added CustomerId custom_Dimension + PrestaShop1.7.1 compatible
 *         1.1.5 - all CustomDimensions configurable dropdown(from 10dimensions)
                 + added crossdomain trasking from BO (configurable) + module name Fix
 *         2.1.6 - PS1.7.1 ready
 *         2.1.7 SuperCheckout+easypay+sagepay compatibility
 *         2.1.8 paypal bugfix + Enhanced Order Refund Tag
 *         2.1.9 BugFix when productName Contains Quotes
 */

/**
 * Class PhGoogleTagManager
 */
class PhGoogleTagManager extends Module
{
    const METHOD_TAG_MANAGER = 'T';
    const PH_ID_GOOGLETAGMANAGER = 'ph_id_googletagmanager';
    const PH_ANALYTICS_UA_CODE = 'ph_analytics_ua_code';
    const PH_FBPIXEL_ACTIV = 'ph_fbpixel_activ';
    const PH_FBPIXEL_CODE = 'ph_fbpixel_code';
    const PH_HOTJAR_ACTIV = 'ph_hotjar_activ';
    const PH_HOTJAR_CODE = 'ph_hotjar_code';
    const PH_INSPECTLET_ACTIV = 'ph_inspectlet_activ';
    const PH_INSPECTLET_CODE = 'ph_inspectlet_code';
    const PH_PINTEREST_ACTIV = 'ph_pinterest_activ';
    const PH_PINTEREST_CODE = 'ph_pinterest_code';
    const PH_GCR_BADGE_ACTIV = 'ph_GCR_BADGE_activ';
    const PH_GCR_OPTIN_ACTIV = 'ph_GCR_OPTIN_activ';
    const PH_GCR_ID = 'ph_GCR_ID';
    const PH_GCR_EST_DELIVERY_DAYS = 'ph_GCR_EST_DELIVERY_DAYS';

    const PH_GTS_ACTIV = 'ph_GTS_activ';
    const PH_GTS_STORE_ID = 'ph_GTS_Store_ID';
    const PH_GTS_LOCALE = 'ph_GTS_Locale';
    const PH_GTS_SHOPPING_ID = 'ph_GTS_Shopping_ID';
    const PH_GTS_SHOPPING_ACCOUNT_ID = 'ph_GTS_Shopping_Account_ID';
    const PH_GTS_SHOPPING_COUNTRY = 'ph_GTS_Shopping_Country';
    const PH_GTS_SHOPPING_LANGUAGE = 'ph_GTS_Shopping_Language';
    const PH_CRAZYEGG_ACTIV = 'ph_crazyegg_activ';
    const PH_CRAZYEGG_CODE = 'ph_crazyegg_code';

    const PH_SHOP_NAME = 'ph_shop_name';
    const ENABLE_ADWORDS_PARAMS = 'adwords_params';
    const ENABLE_REMARKETING_PARAMS = 'remarketing_params';
    const ADWORDS_CONVERSION_ID = 'adwords_conversion_id';
    const ADWORDS_CONVERSION_LANGUAGE = 'adwords_conversion_language';
    const ADWORDS_CONVERSION_LABEL = 'adwords_conversion_label';
    const ADWORDS_CONVERSION_VALUE = 'adwords_conversion_value';
    const SUBMIT_GENERAL_SETTINGS = 'submitGeneralSettings';
    const PAGE_PRODUCT = 'product';
    const PAGE_HOME = 'index';
    const PAGE_AUTHENTICATION = 'authentication';
    const PAGE_SEARCH = 'search';
    const PAGE_CATEGORY = 'category';
    const PAGE_CART = 'order';
    const PAGE_CART_17 = 'cart';
    const PAGE_CART_OPC = 'order-opc';
    const PAGE_CART_OPC_SUPERCHECKOUT = 'supercheckout';
    const PAGE_CART_OPC_EASYPAY = 'module-easypay-easypay-order';
    const PAGE_ORDERCONFIRMATION = 'order-confirmation';
    const PAGE_ORDERCONFIRMATION_PAYPAL_MODULE = 'paypal';
    const PAGE_ORDERCONFIRMATION_PAYPAL_CONTROLLER = 'submit';
    const GOOGLE_PAGE_TYPE_HOME = 'home';
    const GOOGLE_PAGE_TYPE_SERACHRESULT = 'searchresult';
    const GOOGLE_PAGE_TYPE_CATEGORY = 'category';
    const GOOGLE_PAGE_TYPE_PRODUCT = 'product';
    const GOOGLE_PAGE_TYPE_CART = 'cart';
    const GOOGLE_PAGE_TYPE_PURCHASE = 'purchase';
    const GOOGLE_PAGE_TYPE_OTHER = 'other';
    const ENABLE_ENHANCED_ECOMMERCE = 'enhanced_ecommerce';
    const ENABLE_UID = 'track_uid';
    const PAGE_PAYMENT = 'payment';
    const MERCHANT_CENTER_ID = 'merchant_center_id';
    const PH_USER_ID_CUSTOM_DIMENSION_NR = 'ph_user_id_custom_dimension_nr';
    const PH_ECOMM_PRODID_CUSTOM_DIMENSION_NR = 'ph_ecomm_prodid_custom_dimension_nr';
    const PH_ECOMM_PAGETYPE_CUSTOM_DIMENSION_NR = 'ph_ecomm_pagetype_custom_dimension_nr';
    const PH_ECOMM_TOTALVALUE_CUSTOM_DIMENSION_NR = 'ph_ecomm_totalvalue_custom_dimension_nr';
    const PH_CUSTOMER_ID_DIMENSION_NR = 'ph_customer_id_dimension_nr';
    const PH_ALLOWLINKER = 'ph_allowLinker';
    const PH_AUTOLINKDOMAINS = 'ph_autoLinkDomains';
    const PRODUCT_ID = 'product_id';
    const PRODUCT_REFERENCE = 'product_reference';
    const PRODUCT_UPC = 'product_upc';
    const PRODUCT_EAN = 'product_ean';
    private $data = array();
    private $impressiondata = array();
    private $productdata = array();
    private $promotiondata = array();
    private $actiondata = array();
    private $adwords = array();
    private $remarketing = array();
    private static $options_0_10 = array();


    /** BEGIN1 Petyus | PrestaChamps add product_ids to purchase/order confirmation page  **/
    private $product_ids = array();
    private $product_ids_array = array();
    /** END1 Petyus | PrestaChamps add product_ids to purchase/order confirmation page  **/

    public function __construct()
    {
        if (!defined('_PS_VERSION_')) {
            exit;
        }
        $this->name = 'phgoogletagmanager';
        $this->tab = 'analytics_stats';
        $this->version = '2.1.9';
        $this->author = 'PrestaChamps';
        $this->displayName = 'Advance Google Tag Manager - PRO';
        $this->bootstrap = true;
        $this->module_key = '8188670d519fdbae88e7bac68e955734';
        $this->display = 'view';
        parent::__construct();

        $this->description = $this->l('Integrate Google Tag Manager script into your shop');
        $this->confirmUninstall = $this->l('Are you sure you want to delete your details ?');

        $this->data['conversion_id'] = $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvId"));
        $this->data['conversion_language']
         = $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwordsConversionLanguage"));
        $this->data['conversion_label']
         = $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwordsConversionLabel"));
        self::$options_0_10 = array();
        for ($i = 0; $i <= 10; $i++) {
            self::$options_0_10[] = array( 'id_option' => $i, 'name' => $i );
        }
    }

    public function hookDisplayAfterBodyOpeningTag()
    {
        $this->context->smarty->assign('gtm', $this->getConfig(Tools::strtoupper("PhGoogleTagManager_IdTgm")));
        $this->context->smarty->assign(
            'ph_analytics_uacode',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GAnalyticsUa"))
        );
        $this->context->smarty->assign(
            'ph_fbpixel_activ',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_FbPixel_Activ"))
        );
        $this->context->smarty->assign(
            'ph_fbpixel_code',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_FbPixel_Code"))
        );
        $this->context->smarty->assign(
            'ph_hotjar_activ',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Hotjar_Activ"))
        );
        $this->context->smarty->assign(
            'ph_hotjar_code',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Hotjar_Code"))
        );
        $this->context->smarty->assign(
            'ph_inspectlet_activ',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Inspectlet_Activ"))
        );
        $this->context->smarty->assign(
            'ph_inspectlet_code',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Inspectlet_Code"))
        );
        $this->context->smarty->assign(
            'ph_pinterest_activ',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Pinterest_Activ"))
        );
        $this->context->smarty->assign(
            'ph_pinterest_code',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Pinterest_Code"))
        );

        $this->context->smarty->assign(
            'ph_GCR_BADGE_activ',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_gcr_badge_Activ"))
        );
        $this->context->smarty->assign(
            'ph_GCR_OPTIN_activ',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_gcr_optin_Activ"))
        );
        $this->context->smarty->assign(
            'ph_GCR_ID',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_gcr_ID"))
        );
        $this->context->smarty->assign(
            'ph_GCR_EST_DELIVERY_DAYS',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_gcr_est_delivery_days"))
        );

        $this->context->smarty->assign(
            'ph_GTS_activ',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_gts_Activ"))
        );
        $this->context->smarty->assign(
            'ph_GTS_Store_ID',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GTS_Store_ID"))
        );
        $this->context->smarty->assign(
            'ph_GTS_Locale',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GTS_Locale"))
        );
        $this->context->smarty->assign(
            'ph_GTS_Shopping_ID',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_ID"))
        );
        $this->context->smarty->assign(
            'ph_GTS_Shopping_Account_ID',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Account_ID"))
        );
        $this->context->smarty->assign(
            'ph_GTS_Shopping_Country',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Country"))
        );
        $this->context->smarty->assign(
            'ph_GTS_Shopping_Language',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Language"))
        );
        $this->context->smarty->assign(
            'ph_crazyegg_activ',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_crazyegg_Activ"))
        );
        $this->context->smarty->assign(
            'ph_crazyegg_code',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_crazyegg_Code"))
        );

        $this->context->smarty->assign(
            'ph_shop_name',
            $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Shop_Name"))
        );

        return $this->display(__FILE__, 'views/templates/hook/ph_google_tag_manager.tpl');
    }

    public function install()
    {
        Db::getInstance()->Execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'ph_google_tag_manager`');

        if (!Db::getInstance()->Execute(
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ph_google_tag_manager` (
                `id_ph_google_tagmanager` int(11) NOT NULL AUTO_INCREMENT,
                `id_order` int(11) NOT NULL,
                `id_customer` int(10) NOT NULL,
                `id_shop` int(11) NOT NULL,
                `sent` tinyint(1) DEFAULT NULL,
                `date_add` datetime DEFAULT NULL,
                PRIMARY KEY (`id_ph_google_tagmanager`),
                KEY `id_order` (`id_order`),
                KEY `sent` (`sent`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 AUTO_INCREMENT=1'
        )
        ) {
            return $this->uninstall();
        }

        return true &&
        parent::install() &&
        $this->registerHook('displayHeader') &&

        $this->registerHook('adminOrder') &&
        $this->registerHook('displayOrderConfirmation') &&
        $this->registerHook('updateOrderStatus') &&
        $this->registerHook('actionOrderStatusPostUpdate') &&
        $this->registerHook('actionProductCancel') &&
        $this->registerHook('displayBackOfficeHeader') &&

        $this->registerHook('displayAfterBodyOpeningTag');
    }

    public function uninstall()
    {
        return true &&
        parent::uninstall() &&
        $this->unregisterHook('displayHeader') &&

        $this->unregisterHook('adminOrder') &&
        $this->unregisterHook('displayOrderConfirmation') &&
        $this->unregisterHook('updateOrderStatus') &&
        $this->unregisterHook('actionOrderStatusPostUpdate') &&
        $this->unregisterHook('actionProductCancel') &&
        $this->unregisterHook('displayBackOfficeHeader') &&


        $this->unregisterHook('displayAfterBodyOpeningTag') &&
        Db::getInstance()->Execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'ph_google_tag_manager`');
    }

    public function getContent()
    {
        $output = '';
        if (Tools::isSubmit(self::SUBMIT_GENERAL_SETTINGS)) {
            /*  google tag manager*/
            if (Tools::getValue(self::PH_ID_GOOGLETAGMANAGER, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_IdTgm"),
                    Tools::getValue(self::PH_ID_GOOGLETAGMANAGER)
                );
            }
            if (Tools::getValue(self::PH_SHOP_NAME, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_Shop_Name"),
                    Tools::getValue(self::PH_SHOP_NAME)
                );
            }

            /*  google analytics UA CODE*/
            if (Tools::getValue(self::PH_ANALYTICS_UA_CODE, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_GAnalyticsUa"),
                    Tools::getValue(self::PH_ANALYTICS_UA_CODE)
                );
            }

            /*  Facebook Pixel CODE*/
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_FbPixel_Activ"),
                Tools::getValue('checkbox_'.self::PH_FBPIXEL_ACTIV, false) ? true : false
            );
            if (Tools::getValue(self::PH_FBPIXEL_CODE, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_FbPixel_Code"),
                    Tools::getValue(self::PH_FBPIXEL_CODE)
                );
            }

            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_ParamsEE"),
                Tools::getValue('checkbox_'.self::ENABLE_ENHANCED_ECOMMERCE, false) ? true : false
            );
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_ParamsUid"),
                Tools::getValue('checkbox_'.self::ENABLE_UID, false) ? true : false
            );
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_user_id_custom_dimension_nr"),
                Tools::getValue(self::PH_USER_ID_CUSTOM_DIMENSION_NR)
            );
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_ecomm_prodid_custom_dimension_nr"),
                Tools::getValue(self::PH_ECOMM_PRODID_CUSTOM_DIMENSION_NR)
            );
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_ecomm_pagetype_custom_dimension_nr"),
                Tools::getValue(self::PH_ECOMM_PAGETYPE_CUSTOM_DIMENSION_NR)
            );
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_ecomm_totalvalue_custom_dimension_nr"),
                Tools::getValue(self::PH_ECOMM_TOTALVALUE_CUSTOM_DIMENSION_NR)
            );
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_customer_id_dimension_nr"),
                Tools::getValue(self::PH_CUSTOMER_ID_DIMENSION_NR)
            );

            /*  CrossDomain */
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_allowlinker"),
                Tools::getValue('checkbox_'.self::PH_ALLOWLINKER, false) ? true : false
            );
            if (Tools::getValue(self::PH_AUTOLINKDOMAINS, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_ph_autolinkdomains"),
                    Tools::getValue(self::PH_AUTOLINKDOMAINS)
                );
            }

            /*  HotJar Pixel CODE*/
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_Hotjar_Activ"),
                Tools::getValue('checkbox_'.self::PH_HOTJAR_ACTIV, false) ? true : false
            );
            if (Tools::getValue(self::PH_HOTJAR_CODE, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_Hotjar_Code"),
                    Tools::getValue(self::PH_HOTJAR_CODE)
                );
            }

            /*  Inspectlet Pixel CODE*/
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_Inspectlet_Activ"),
                Tools::getValue('checkbox_'.self::PH_INSPECTLET_ACTIV, false) ? true : false
            );
            if (Tools::getValue(self::PH_INSPECTLET_CODE, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_Inspectlet_Code"),
                    Tools::getValue(self::PH_INSPECTLET_CODE)
                );
            }

            /*  Pinterest Pixel CODE*/
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_Pinterest_Activ"),
                Tools::getValue('checkbox_'.self::PH_PINTEREST_ACTIV, false) ? true : false
            );
            if (Tools::getValue(self::PH_PINTEREST_CODE, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_Pinterest_Code"),
                    Tools::getValue(self::PH_PINTEREST_CODE)
                );
            }

            /*  Google CustomerReviews Badge*/
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_gcr_badge_Activ"),
                Tools::getValue('checkbox_'.self::PH_GCR_BADGE_ACTIV, false) ? true : false
            );
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_gcr_optin_Activ"),
                Tools::getValue('checkbox_'.self::PH_GCR_OPTIN_ACTIV, false) ? true : false
            );
            if (Tools::getValue(self::PH_GCR_ID, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_Gcr_ID"),
                    Tools::getValue(self::PH_GCR_ID)
                );
            }
            if (Tools::getValue(self::PH_GCR_EST_DELIVERY_DAYS, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_gcr_est_delivery_days"),
                    Tools::getValue(self::PH_GCR_EST_DELIVERY_DAYS)
                );
            }


            /*  Google Trusted Store Batch*/
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_gts_Activ"),
                Tools::getValue('checkbox_'.self::PH_GTS_ACTIV, false) ? true : false
            );
            if (Tools::getValue(self::PH_GTS_STORE_ID, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_GTS_Store_ID"),
                    Tools::getValue(self::PH_GTS_STORE_ID)
                );
            }
            if (Tools::getValue(self::PH_GTS_LOCALE, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_GTS_Locale"),
                    Tools::getValue(self::PH_GTS_LOCALE)
                );
            }
            if (Tools::getValue(self::PH_GTS_SHOPPING_ID, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_ID"),
                    Tools::getValue(self::PH_GTS_SHOPPING_ID)
                );
            }
            if (Tools::getValue(self::PH_GTS_SHOPPING_ACCOUNT_ID, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Account_ID"),
                    Tools::getValue(self::PH_GTS_SHOPPING_ACCOUNT_ID)
                );
            }
            if (Tools::getValue(self::PH_GTS_SHOPPING_COUNTRY, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Country"),
                    Tools::getValue(self::PH_GTS_SHOPPING_COUNTRY)
                );
            }
            if (Tools::getValue(self::PH_GTS_SHOPPING_LANGUAGE, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Language"),
                    Tools::getValue(self::PH_GTS_SHOPPING_LANGUAGE)
                );
            }

            /*  crazyegg TrackingCODE*/
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_crazyegg_Activ"),
                Tools::getValue('checkbox_'.self::PH_CRAZYEGG_ACTIV, false) ? true : false
            );
            if (Tools::getValue(self::PH_CRAZYEGG_CODE, false)) {
                $this->setConfig(
                    Tools::strtoupper("PhGoogleTagManager_crazyegg_Code"),
                    Tools::getValue(self::PH_CRAZYEGG_CODE)
                );
            }

            /* Adwords Settings */
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_ParamsAdw"),
                Tools::getValue('checkbox_'.self::ENABLE_ADWORDS_PARAMS, false) ? true : false
            );
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_ParamsRmkt"),
                Tools::getValue('checkbox_'.self::ENABLE_REMARKETING_PARAMS, false) ? true : false
            );
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_AdwConvId"),
                Tools::getValue(self::ADWORDS_CONVERSION_ID)
            );
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_AdwConvLg"),
                Tools::getValue(self::ADWORDS_CONVERSION_LANGUAGE)
            );
            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_AdwConvLb"),
                Tools::getValue(self::ADWORDS_CONVERSION_LABEL)
            );

            $this->setConfig(
                Tools::strtoupper("PhGoogleTagManager_McntCenter"),
                Tools::getValue(self::MERCHANT_CENTER_ID)
            );
            $output .= $this->displayConfirmation($this->l('Settings updated'));
        }

        $helpBox = $this->context->smarty->fetch(
            _PS_MODULE_DIR_.
            $this->name.DIRECTORY_SEPARATOR.
            'views'.DIRECTORY_SEPARATOR.
            'templates'.DIRECTORY_SEPARATOR.
            'admin'.DIRECTORY_SEPARATOR.
            'confighelp.tpl'
        );
        return  $output.$helpBox.$this->displayForm();
    }

    public function displayForm($message = null)
    {
        if (Tools::version_compare(_PS_VERSION_, '1.5.5.0')) {
            return $this->displayFormOldVersions();
        }

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $default_lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $default_lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get(
            'PS_BO_ALLOW_EMPLOYEE_FORM_LANG'
        ) : 0;

        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).
            '&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;

        $fields_form = array();
        if (!$message) {
            $fields_form[0]['form']['description'] = $message;
        }

        $helper->title = $this->displayName;
        $helper->show_toolbar = false;
        $helper->toolbar_scroll = true;

        $helper->fields_value[self::PH_ID_GOOGLETAGMANAGER] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_IdTgm")
        );
        $helper->fields_value[self::PH_SHOP_NAME] = $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Shop_Name"));

        $helper->fields_value['checkbox_'.self::PH_FBPIXEL_ACTIV] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_FbPixel_Activ")
        );
        $helper->fields_value[self::PH_FBPIXEL_CODE] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_FbPixel_Code")
        );

        $helper->fields_value['checkbox_'.self::PH_HOTJAR_ACTIV] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_Hotjar_Activ")
        );
        $helper->fields_value[self::PH_HOTJAR_CODE] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_Hotjar_Code")
        );

        $helper->fields_value['checkbox_'.self::PH_INSPECTLET_ACTIV] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_Inspectlet_Activ")
        );
        $helper->fields_value[self::PH_INSPECTLET_CODE] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_Inspectlet_Code")
        );

        $helper->fields_value['checkbox_'.self::PH_PINTEREST_ACTIV] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_Pinterest_Activ")
        );
        $helper->fields_value[self::PH_PINTEREST_CODE] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_Pinterest_Code")
        );

        $helper->fields_value['checkbox_'.self::PH_GCR_BADGE_ACTIV] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_gcr_BADGE_Activ")
        );
        $helper->fields_value['checkbox_'.self::PH_GCR_OPTIN_ACTIV] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_gcr_OPTIN_Activ")
        );
        $helper->fields_value[self::PH_GCR_ID] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_GCR_ID")
        );
        $helper->fields_value[self::PH_GCR_EST_DELIVERY_DAYS] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_gcr_est_delivery_days")
        );

        $helper->fields_value['checkbox_'.self::PH_GTS_ACTIV] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_gts_Activ")
        );
        $helper->fields_value[self::PH_GTS_STORE_ID] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_GTS_Store_ID")
        );
        $helper->fields_value[self::PH_GTS_LOCALE] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_GTS_Locale")
        );
        $helper->fields_value[self::PH_GTS_SHOPPING_ID] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_ID")
        );
        $helper->fields_value[self::PH_GTS_SHOPPING_ACCOUNT_ID] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Account_ID")
        );
        $helper->fields_value[self::PH_GTS_SHOPPING_COUNTRY] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Country")
        );
        $helper->fields_value[self::PH_GTS_SHOPPING_LANGUAGE] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Language")
        );

        $helper->fields_value['checkbox_'.self::PH_CRAZYEGG_ACTIV] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_crazyegg_Activ")
        );
        $helper->fields_value[self::PH_CRAZYEGG_CODE] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_crazyegg_Code")
        );


        $helper->fields_value[self::PH_ANALYTICS_UA_CODE] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_GAnalyticsUa")
        );
        $helper->fields_value['checkbox_'.self::ENABLE_ENHANCED_ECOMMERCE]=$this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_ParamsEE")
        );
        $helper->fields_value['checkbox_'.self::ENABLE_UID] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_ParamsUid")
        );
        $helper->fields_value[self::PH_USER_ID_CUSTOM_DIMENSION_NR] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_ph_user_id_custom_dimension_nr")
        );
        $helper->fields_value[self::PH_ECOMM_PRODID_CUSTOM_DIMENSION_NR] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_ph_ecomm_prodid_custom_dimension_nr")
        );
        $helper->fields_value[self::PH_ECOMM_PAGETYPE_CUSTOM_DIMENSION_NR] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_ph_ecomm_pagetype_custom_dimension_nr")
        );
        $helper->fields_value[self::PH_ECOMM_TOTALVALUE_CUSTOM_DIMENSION_NR] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_ph_ecomm_totalvalue_custom_dimension_nr")
        );
        $helper->fields_value[self::PH_CUSTOMER_ID_DIMENSION_NR ] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_ph_customer_id_dimension_nr")
        );
        /* crossdomain */
        $helper->fields_value['checkbox_'.self::PH_ALLOWLINKER] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_ph_allowlinker")
        );
        $helper->fields_value[self::PH_AUTOLINKDOMAINS] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_ph_autolinkdomains")
        );


        $helper->fields_value['checkbox_'.self::ENABLE_ADWORDS_PARAMS] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_ParamsAdw")
        );
        $helper->fields_value['checkbox_'.self::ENABLE_REMARKETING_PARAMS]=$this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_ParamsRmkt")
        );
        $helper->fields_value[self::ADWORDS_CONVERSION_ID] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_AdwConvId")
        );
        $helper->fields_value[self::ADWORDS_CONVERSION_LANGUAGE] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_AdwConvLg")
        );
        $helper->fields_value[self::ADWORDS_CONVERSION_LABEL] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_AdwConvLb")
        );

        $helper->fields_value[self::MERCHANT_CENTER_ID] = $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_McntCenter")
        );

        return $helper->generateForm($this->prepareForm());
    }

    private function displayFormOldVersions()
    {
        $this->context->smarty->assign(
            array(
                'requesturi' => $_SERVER['REQUEST_URI'],
                'ph_id_googletagmanager' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_IdTgm")),
                'ph_shop_name' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Shop_Name")),

                'ph_analytics_uacode' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GAnalyticsUa")),
                'checkbox_adwords_params' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_ParamsAdw")),
                'checkbox_remarketing_params' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_ParamsRmkt")),
                'checkbox_enhanced_ecommerce' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_ParamsEE")),

                'merchant_center_id1' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_McntCenter1")),

                'adwords_conversion_id' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvId")),
                'adwords_conversion_label' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvLg")),
                'adwords_conversion_language' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvLb")),

                'checkbox_ph_fbpixel_activ' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_FbPixel_Activ")),
                'ph_fbpixel_code' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_FbPixel_Code")),

                'checkbox_ph_hotjar_activ' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Hotjar_Activ")),
                'ph_hotjar_code' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Hotjar_Code")),

                'checkbox_ph_inspectlet_activ' => $this->getConfig(
                    Tools::strtoupper("PhGoogleTagManager_Inspectlet_Activ")
                ),
                'ph_inspectlet_code' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Inspectlet_Code")),

                'checkbox_ph_pinterest_activ' => $this->getConfig(
                    Tools::strtoupper("PhGoogleTagManager_Pinterest_Activ")
                ),
                'ph_pinterest_code' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_Pinterest_Code")),


                'checkbox_ph_GCR_BADGE_activ' => $this->getConfig(
                    Tools::strtoupper("PhGoogleTagManager_gcr_BADGE_Activ")
                ),
                'checkbox_ph_GCR_OPTIN_activ' => $this->getConfig(
                    Tools::strtoupper("PhGoogleTagManager_gcr_optin_Activ")
                ),
                'ph_GCR_ID' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GCR_ID")),
                'ph_GCR_est_delivery_days' => $this->getConfig(
                    Tools::strtoupper("PhGoogleTagManager_gcr_est_delivery_days")
                ),
                'checkbox_ph_GTS_activ' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_gts_Activ")),
                'ph_GTS_Locale' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GTS_Locale")),
                'ph_GTS_Shopping_Language' => $this->getConfig(
                    Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Language")
                ),
                'ph_GTS_Shopping_Country' => $this->getConfig(
                    Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Country")
                ),
                'ph_GTS_Shopping_ID' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_ID")),
                'ph_GTS_Store_ID' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GTS_Store_ID")),

                'checkbox_ph_crazyegg_activ' => $this->getConfig(
                    Tools::strtoupper("PhGoogleTagManager_crazyegg_Activ")
                ),
                'ph_crazyegg_code' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_crazyegg_Code")),

                'merchant_center_id' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_McntCenter")),
            )
        );

        return $this->context->smarty->fetch(
            _PS_MODULE_DIR_.
            $this->name.DIRECTORY_SEPARATOR.
            'views'.DIRECTORY_SEPARATOR.
            'templates'.DIRECTORY_SEPARATOR.
            'admin'.DIRECTORY_SEPARATOR.
            'config.tpl'
        );
    }

    private function prepareForm()
    {
        $fields_form = array();
        // Init Fields form array
        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => '<img src="'.$this->_path.'views/img/GTagManager.png" class="pull-left" style="max-height:'
                    .'24px;margin-top:3px;margin-right:5px;"> '. $this->l('Settings').' ( version:'.$this->version.')',
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('GoogleTagManager ID'),
                    'name' => self::PH_ID_GOOGLETAGMANAGER,
                    'required' => false,
                    'class' => 'fixed-width-xxl',

                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('ShopName for use in any Tracking Script'),
                    'name' => self::PH_SHOP_NAME ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                    'hint' => 'Usually this is the shop Name'
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right btn btn-default',
                'name' => self::SUBMIT_GENERAL_SETTINGS,
            )
        );
        $fields_form[1]['form'] = array(
            'legend' => array(
                'title' => '<img src="'.$this->_path.'views/img/GAnalytics.png" class="pull-left" style="max-height:'
                    .'24px;margin-top: 3px;margin-right: 5px;"> '.$this->l('Gogle Analytics settings'),
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Google Analytics UA-CODE'),
                    'name' => self::PH_ANALYTICS_UA_CODE ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
                $this->getCheckBox('Enable', 'Enhanced Ecommerce', self::ENABLE_ENHANCED_ECOMMERCE),
                $this->getCheckBox('Enable', 'Enhanced UID Tracking', self::ENABLE_UID),

                array(
                    'type' => 'select',
                    'label' => $this->l('Custom Dimension Number for UserID'),
                    'hint' => $this->l('Copy it from Google Analytics Account -> Admin -> your Property ').
                              $this->l('-> CustomDefinitions -> Custom Dimensions page'),
                    'desc' => $this->l('The ID number of your UserID custom dimension'),
                    'name' => self::PH_USER_ID_CUSTOM_DIMENSION_NR,
                    'required' => false,
                    'options' => array(
                        'query' => self::$options_0_10,
                        'id' => 'id_option',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('CustomDimension Nr. for ecomm_prodid'),
                    'hint' => $this->l('Copy it from Google Analytics Account -> Admin -> your Property ').
                              $this->l('-> CustomDefinitions -> Custom Dimensions page'),
                    'desc' => $this->l('The ID number of your ecomm_prodid custom dimension'),
                    'name' => self::PH_ECOMM_PRODID_CUSTOM_DIMENSION_NR,
                    'required' => false,
                    'options' => array(
                        'query' => self::$options_0_10,
                        'id' => 'id_option',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('CustomDimension Nr. for ecomm_pagetype'),
                    'hint' => $this->l('Copy it from Google Analytics Account -> Admin -> your Property ').
                              $this->l('-> CustomDefinitions -> Custom Dimensions page'),
                    'desc' => $this->l('The ID number of your ecomm_pagetype custom dimension'),
                    'name' => self::PH_ECOMM_PAGETYPE_CUSTOM_DIMENSION_NR,
                    'required' => false,
                    'options' => array(
                        'query' => self::$options_0_10,
                        'id' => 'id_option',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('CustomDimension Nr. for ecomm_totalvalue'),
                    'hint' => $this->l('Copy it from Google Analytics Account -> Admin -> your Property ').
                              $this->l('-> CustomDefinitions -> Custom Dimensions page'),
                    'desc' => $this->l('The ID number of your ecomm_totalvalue custom dimension'),
                    'name' => self::PH_ECOMM_TOTALVALUE_CUSTOM_DIMENSION_NR,
                    'required' => false,
                    'options' => array(
                        'query' => self::$options_0_10,
                        'id' => 'id_option',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('CustomDimension Nr. for CustomerID'),
                    'hint' => $this->l('Copy it from Google Analytics Account -> Admin -> your Property ').
                              $this->l('-> CustomDefinitions -> Custom Dimensions page'),
                    'desc' => $this->l('The ID number of your CustomerID custom dimension'),
                    'name' => self::PH_CUSTOMER_ID_DIMENSION_NR,
                    'required' => false,
                    'options' => array(
                        'query' => self::$options_0_10,
                        'id' => 'id_option',
                        'name' => 'name'
                    )
                ),
                /* crossdomain */
                $this->getCheckBox('Enable', 'Allow CrossDomain Tracking', self::PH_ALLOWLINKER),
                array(
                    'type' => 'text',
                    'label' => $this->l('Domain listing for CrossDomainTracking'),
                    'name' => self::PH_AUTOLINKDOMAINS ,
                    'hint' => $this->l('each domains separated by comma : main.com,domain1.com,domain2.com'),
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),



            ),

            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right',
                'name' => self::SUBMIT_GENERAL_SETTINGS,
            )
        );

        $fields_form[2]['form'] = array(
            'legend' => array(
                'title' => '<img src="'.$this->_path.'views/img/GAdwords.png" class="pull-left" style="max-height:'
                    .' 24px;margin-top: 3px;margin-right: 5px;"> '.$this->l('Adwords settings'),
            ),
            'input' => array(
                $this->getCheckBox('Enable', 'Adwords Parameters', self::ENABLE_ADWORDS_PARAMS),
                $this->getCheckBox('Enable', 'Remarketing Parameters', self::ENABLE_REMARKETING_PARAMS),
                array(
                    'type' => 'text',
                    'label' => $this->l('Conversion id'),
                    'name' => self::ADWORDS_CONVERSION_ID,
                    'required' => false,
                    'class' => 'fixed-width-xxl',

                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Conversion language'),
                    'name' => self::ADWORDS_CONVERSION_LANGUAGE,
                    'required' => false,
                    'class' => 'fixed-width-xxl',

                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Conversion label'),
                    'name' => self::ADWORDS_CONVERSION_LABEL,
                    'required' => false,
                    'class' => 'fixed-width-xxl',

                ),

            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right',
                'name' => self::SUBMIT_GENERAL_SETTINGS,
            )
        );

        $fields_form[3]['form'] = array(
            'legend' => array(
                'title' => '<img src="'.$this->_path.'views/img/GMerchantCenter.png" class="pull-left"'
                .' style="max-height: 24px;margin-top: 3px;margin-right: 5px;"> '.$this->l('Google Merchant Center'),
            ),
            'input' => array(
                array(
                    'type' => 'select',
                    'label' => $this->l('ID for Merchant Center'),
                    'hint' => $this->l('Correlation used for Dynamic Remarketing'),
                    'desc' => $this->l('for Remarketing'),
                    'name' => self::MERCHANT_CENTER_ID,
                    'required' => false,
                    'options' => array(
                        'query' => array(
                            array(
                                'id_option' => self::PRODUCT_ID,
                                'name' => self::PRODUCT_ID,
                            ),
                            array(
                                'id_option' => self::PRODUCT_REFERENCE,
                                'name' => self::PRODUCT_REFERENCE,
                            ),
                            array(
                                'id_option' => self::PRODUCT_UPC,
                                'name' => self::PRODUCT_UPC,
                            ),
                            array(
                                'id_option' => self::PRODUCT_EAN,
                                'name' => self::PRODUCT_EAN,
                            )
                        ),
                        'id' => 'id_option',
                        'name' => 'name'
                    )
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right',
                'name' => self::SUBMIT_GENERAL_SETTINGS,
            )
        );

        $fields_form[4]['form'] = array(
            'legend' => array(
                'title' => '<img src="'.$this->_path.'views/img/GMerchantCenter.png" class="pull-left" '
                    .'style="max-height: 24px; margin-top: 3px;margin-right: 5px;"> '
                    .$this->l('Google Customer Reviews'),
            ),
            'input' => array(
                $this->getCheckBox('Enable', 'Google Customer Reviews Badge', self::PH_GCR_BADGE_ACTIV),
                $this->getCheckBox('Enable', 'Google Customer Reviews OPT-IN  '
                    .'-> offer surveys to customers on checkout page.', self::PH_GCR_OPTIN_ACTIV),
                array(
                    'type' => 'text',
                    'label' => $this->l('Google Customer Reviews Merchant id'),
                    'name' => self::PH_GCR_ID ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('The estimated number of days before an order is delivered.'),
                    'name' => self::PH_GCR_EST_DELIVERY_DAYS ,
                    'required' => false,
                    'class' => 'fixed-width-xxl form-control',
                ),

            ),

            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right ',
                'name' => self::SUBMIT_GENERAL_SETTINGS,
            )
        );

        $fields_form[5]['form'] = array(
            'legend' => array(
                'title' => '<img src="'.$this->_path.'views/img/FBPixel.png" class="pull-left" style="max-height:'
                    .' 24px;margin-top: 3px;margin-right: 5px;"> '.$this->l('Facebook Pixel Tracking'),
            ),

            'input' => array(
                $this->getCheckBox('Enable', 'Facebook Pixel Tracking', self::PH_FBPIXEL_ACTIV),
                array(
                    'type' => 'text',
                    'label' => $this->l('Facebook Pixel Code ID'),
                    'name' => self::PH_FBPIXEL_CODE ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',

                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right ',
                'name' => self::SUBMIT_GENERAL_SETTINGS,
            )
        );

        $fields_form[6]['form'] = array(
            'legend' => array(
                'title' => '<img src="'.$this->_path.'views/img/HotJar.png" class="pull-left" style="max-height:'
                .' 24px;margin-top: 3px;margin-right: 5px;"> '.$this->l('HotJar Pixel Tracking'),
            ),
            'input' => array(
                $this->getCheckBox('Enable', 'HotJar Pixel Tracking', self::PH_HOTJAR_ACTIV),
                array(
                    'type' => 'text',
                    'label' => $this->l('HotJar Site ID'),
                    'name' => self::PH_HOTJAR_CODE ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right ',
                'name' => self::SUBMIT_GENERAL_SETTINGS,
            )
        );

        $fields_form[7]['form'] = array(
            'legend' => array(
                'title' => '<img src="'.$this->_path.'views/img/Inspectlet.png" class="pull-left" style="max-height:'
                .' 24px;margin-top: 3px;margin-right: 5px;"> '.$this->l('Inspectlet Pixel Tracking'),
            ),
            'input' => array(
                $this->getCheckBox('Enable', 'Inspectlet Pixel Tracking', self::PH_INSPECTLET_ACTIV),
                array(
                    'type' => 'text',
                    'label' => $this->l('Inspectlet ID'),
                    'name' => self::PH_INSPECTLET_CODE ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right ',
                'name' => self::SUBMIT_GENERAL_SETTINGS,
            )
        );

        $fields_form[8]['form'] = array(
            'legend' => array(
                'title' => '<img src="'.$this->_path.'views/img/Pinterest.png" class="pull-left" style="max-height:'
                .' 24px;margin-top: 3px;margin-right: 5px;"> '.$this->l('Pinterest Pixel Tracking'),
            ),
            'input' => array(
                $this->getCheckBox('Enable', 'Pinterest Pixel Tracking', self::PH_PINTEREST_ACTIV),
                array(
                    'type' => 'text',
                    'label' => $this->l('Pinterest ID'),
                    'name' => self::PH_PINTEREST_CODE ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right ',
                'name' => self::SUBMIT_GENERAL_SETTINGS,
            )
        );


        $fields_form[9]['form'] = array(
            'legend' => array(
                'title' => '<img src="'.$this->_path.'views/img/GTS.png" class="pull-left" style="max-height: 24px;'
                    .'margin-top: 3px;margin-right: 5px;"> '.$this->l('Google Trusted Store Badge'),
            ),
            'input' => array(
                $this->getCheckBox('Enable', 'Google Trusted Store Badge', self::PH_GTS_ACTIV),
                array(
                    'type' => 'text',
                    'label' => $this->l('Google Trusted Store ID'),
                    'name' => self::PH_GTS_STORE_ID ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Google Trusted Store Locale'),
                    'name' => self::PH_GTS_LOCALE ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Google Trusted Store Shopping ID'),
                    'name' => self::PH_GTS_SHOPPING_ID ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Google Trusted Store Shopping Account ID'),
                    'name' => self::PH_GTS_SHOPPING_ACCOUNT_ID ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Google Trusted Store Shopping Country'),
                    'name' => self::PH_GTS_SHOPPING_COUNTRY ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Google Trusted Store Shopping Language'),
                    'name' => self::PH_GTS_SHOPPING_LANGUAGE ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right ',
                'name' => self::SUBMIT_GENERAL_SETTINGS,
            )
        );

        $fields_form[10]['form'] = array(
            'legend' => array(
                'title' => '<img src="'.$this->_path.'views/img/CrazyEgg.png" class="pull-left" style="max-height:'
                    .' 24px;margin-top: 3px;margin-right: 5px;"> '.$this->l('CrazyEgg Tracking'),
            ),
            'input' => array(
                $this->getCheckBox('Enable', 'crazyegg Tracking', self::PH_CRAZYEGG_ACTIV),
                array(
                    'type' => 'text',
                    'label' => $this->l('Crazyegg ID'),
                    'name' => self::PH_CRAZYEGG_CODE ,
                    'required' => false,
                    'class' => 'fixed-width-xxl',
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right ',
                'name' => self::SUBMIT_GENERAL_SETTINGS,
            )
        );


        return $fields_form;
    }

    private function getCheckBox($label, $option_name, $name)
    {
        if (version_compare(_PS_VERSION_, '1.5.9', '<=')) {
            return array(
                'type' => 'checkbox',
                'label' => $this->l($label),
                'values' => array(
                    'query' => array(
                        array(
                            'id' => $name,
                            'name' => $this->l($option_name)
                        ),
                    ),
                    'id' => 'id',
                    'name' => 'name'
                ),
                'name' => 'checkbox',
            );
        }

        return array(
            'type' => 'switch',
            'label' => $this->l($label.' '.$option_name),
            'is_bool' => true,
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
            'name' => 'checkbox_'.$name,
        );
    }

    public function hookDisplayHeader()
    {
        // BEGIN Facebook visitor tracking
        $FBuser = 'false';
        $cookiePath="/";
        if (isset($_SERVER['HTTP_REFERER'])) {
            @$ref = $_SERVER['HTTP_REFERER'];
            if (strpos($ref, 'facebook.com') !== false) {
                //$this->context->cookie->CameFromFacebook = $ref;
                setcookie("CameFromFacebook", $ref, 0, $cookiePath);
                $expiredays=0;
                // ppp($expiredays);
                $this->smarty->assign('CameFromFacebook', $this->context->cookie->CameFromFacebook);
                $this->smarty->assign('CookieExpireDaysFacebook', $expiredays);
                $this->smarty->assign('FBuser', 'true');
                setcookie("FBuser", 'true', 0, $cookiePath);
                $FBuser = 'true';
                setcookie("FBuserFirstEnteredOn", date('Y-m-d_H-i-s'), time()+ (3600 * 24 * 365), $cookiePath);
            }
        }
        /*if (isset($_COOKIE["CameFromFacebook"])) {*/
        if (isset(Context::getContext()->cookie->FBuser) && Context::getContext()->cookie->FBuser!="") {
            $FBuser = 'true';
        } else {
            $FBuser = 'false';
        }
        /*} else {
            if (isset($_COOKIE["FBuser"])) {
                 $FBuser = 'true';
            } else {
                $FBuser = 'false';
                setcookie("FBuser", 'true',  time() - 3600, $cookiePath);

                $this->smarty->assign('CameFromFacebook', "");
            }
        }*/
        //ppp($this->context->cookie);
        //ppp($_COOKIE);
        // END Facebook visitor tracking
        // adwords snippet when the page is loaded
        $page = $this->context->controller->php_self;
        // dump($page);
        if (null === $page) {
            $page = Tools::getValue('controller');
        }
        $this->context->smarty->assign('ph_analytics_uacode', $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_GAnalyticsUa")
        ));
        $this->context->smarty->assign('ph_shop_name', $this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_Shop_Name")
        ));

        /** FaceBook PixelTracking **/
        $checkbox_ph_fbpixel_activ = boolval($this->getConfig(Tools::strtoupper("PhGoogleTagManager_FbPixel_Activ")));
        if ($checkbox_ph_fbpixel_activ === true) {
            $this->context->smarty->assign('ph_fbpixel_activ', 'true');
        } else {
            $this->context->smarty->assign('ph_fbpixel_activ', 'false');
        }

        if ($checkbox_ph_fbpixel_activ) {
            $this->context->smarty->assign('ph_fbpixel_code', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_FbPixel_Code")
            ));
        } else {
            $this->context->smarty->assign('ph_fbpixel_code', '');
        }

        /** HotJar PixelTracking **/
        $checkbox_ph_hotjar_activ = boolval($this->getConfig(Tools::strtoupper("PhGoogleTagManager_Hotjar_Activ")));
        if ($checkbox_ph_hotjar_activ === true) {
            $this->context->smarty->assign('ph_hotjar_activ', 'true');
        } else {
            $this->context->smarty->assign('ph_hotjar_activ', 'false');
        }
        if ($checkbox_ph_hotjar_activ) {
            $this->context->smarty->assign('ph_hotjar_code', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_Hotjar_Code")
            ));
        } else {
            $this->context->smarty->assign('ph_hotjar_code', '');
        }

        /** Inspectlet PixelTracking **/
        $checkbox_ph_inspectlet_activ = boolval($this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_Inspectlet_Activ")
        ));
        if ($checkbox_ph_inspectlet_activ === true) {
            $this->context->smarty->assign('ph_inspectlet_activ', 'true');
        } else {
            $this->context->smarty->assign('ph_inspectlet_activ', 'false');
        }
        if ($checkbox_ph_inspectlet_activ) {
            $this->context->smarty->assign('ph_inspectlet_code', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_Inspectlet_Code")
            ));
        } else {
            $this->context->smarty->assign('ph_inspectlet_code', '');
        }

        /** Pinterest PixelTracking **/
        $checkbox_ph_pinterest_activ = boolval($this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_Pinterest_Activ")
        ));
        if ($checkbox_ph_pinterest_activ === true) {
            $this->context->smarty->assign('ph_pinterest_activ', 'true');
        } else {
            $this->context->smarty->assign('ph_pinterest_activ', 'false');
        }
        if ($checkbox_ph_pinterest_activ) {
            $this->context->smarty->assign('ph_pinterest_code', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_Pinterest_Code")
            ));
        } else {
            $this->context->smarty->assign('ph_pinterest_code', '');
        }

        /** Google Customer Reviews Badge **/
        $checkbox_ph_GCR_BADGE_activ = boolval($this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_gcr_BADGE_Activ")
        ));
        if ($checkbox_ph_GCR_BADGE_activ === true) {
            $this->context->smarty->assign('ph_GCR_BADGE_activ', 'true');
        } else {
            $this->context->smarty->assign('ph_GCR_BADGE_activ', 'false');
        }

        /** Google Customer Reviews Opt-in **/
        $checkbox_ph_GCR_OPTIN_activ = boolval($this->getConfig(
            Tools::strtoupper("PhGoogleTagManager_gcr_OPTIN_Activ")
        ));
        if ($checkbox_ph_GCR_OPTIN_activ === true) {
            $this->context->smarty->assign('ph_GCR_OPTIN_activ', 'true');
        } else {
            $this->context->smarty->assign('ph_GCR_OPTIN_activ', 'false');
        }
        if ($checkbox_ph_GCR_BADGE_activ || $checkbox_ph_GCR_OPTIN_activ) {
            if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_GCR_ID"))) {
                $this->context->smarty->assign('ph_GCR_ID', $this->getConfig(
                    Tools::strtoupper("PhGoogleTagManager_GCR_ID")
                ));
            } else {
                $this->context->smarty->assign('ph_GCR_ID', '');
            }
        } else {
            $this->context->smarty->assign('ph_GCR_ID', '');
        }
        $ph_GCR_est_delivery_days = $this->getConfig(Tools::strtoupper("PhGoogleTagManager_gcr_est_delivery_days"));
        if ($checkbox_ph_GCR_OPTIN_activ && $ph_GCR_est_delivery_days) {
            $this->context->smarty->assign('ph_GCR_est_delivery_days', $ph_GCR_est_delivery_days);
            $this->context->smarty->assign('ph_GCR_est_delivery_date', date(
                'Y-m-d',
                strtotime("+".$ph_GCR_est_delivery_days." days")
            ));
        } else {
            $this->context->smarty->assign('ph_GCR_est_delivery_days', '0');
            $this->context->smarty->assign('ph_GCR_est_delivery_date', '');
        }

        /** Google Trusted Store Badge **/
        $checkbox_ph_GTS_activ = boolval($this->getConfig(Tools::strtoupper("PhGoogleTagManager_gts_Activ")));
        if ($checkbox_ph_GTS_activ === true) {
            $this->context->smarty->assign('ph_GTS_activ', 'true');
        } else {
            $this->context->smarty->assign('ph_GTS_activ', 'false');
        }
        if ($checkbox_ph_GTS_activ) {
            $this->context->smarty->assign('ph_GTS_Store_ID', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_GTS_Store_ID")
            ));
            $this->context->smarty->assign('ph_GTS_Locale', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_GTS_Locale")
            ));
            $this->context->smarty->assign('ph_GTS_Shopping_ID', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_ID")
            ));
            $this->context->smarty->assign('ph_GTS_Shopping_Account_ID', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Account_ID")
            ));
            $this->context->smarty->assign('ph_GTS_Shopping_Country', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Country")
            ));
            $this->context->smarty->assign('ph_GTS_Shopping_Language', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_GTS_Shopping_Language")
            ));
        } else {
            $this->context->smarty->assign('ph_GTS_Store_ID', '');
            $this->context->smarty->assign('ph_GTS_Locale', '');
            $this->context->smarty->assign('ph_GTS_Shopping_ID', '');
            $this->context->smarty->assign('ph_GTS_Shopping_Account_ID', '');
            $this->context->smarty->assign('ph_GTS_Shopping_Country', '');
            $this->context->smarty->assign('ph_GTS_Shopping_Language', '');
        }

        /** Crazyegg Tracking **/
        $checkbox_ph_crazyegg_activ = boolval($this->getConfig(Tools::strtoupper("PhGoogleTagManager_crazyegg_Activ")));
        if ($checkbox_ph_crazyegg_activ === true) {
            $this->context->smarty->assign('ph_crazyegg_activ', 'true');
        } else {
            $this->context->smarty->assign('ph_crazyegg_activ', 'false');
        }
        if ($checkbox_ph_crazyegg_activ) {
            $this->context->smarty->assign('ph_crazyegg_code', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_crazyegg_Code")
            ));
        } else {
            $this->context->smarty->assign('ph_crazyegg_code', '');
        }

        /* Adwords *//* Remarketing */
        $checkbox_ph_adwords_activ = boolval($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ParamsAdw")));
        $checkbox_ph_remarketing_activ = boolval($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ParamsRmkt")));
        if ($checkbox_ph_adwords_activ === true) {
            if ($checkbox_ph_remarketing_activ === true) {
                $this->context->smarty->assign('ph_adwords_activ', 'false');
                $this->context->smarty->assign('ph_remarketing_activ', 'true');
            } else {
                $this->context->smarty->assign('ph_adwords_activ', 'true');
                $this->context->smarty->assign('ph_remarketing_activ', 'false');
            }
            // $this->context->smarty->assign('ph_adwords_activ', 'true');
        } else {
            $this->context->smarty->assign('ph_adwords_activ', 'false');
            $this->context->smarty->assign('ph_remarketing_activ', 'false');
        }



        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ParamsAdw")) && ('order-confirmation' == $page)) {
            $o = new Order(Tools::getValue('id_order'));
            $this->adwords = array(
                'adwords' => true,
                'conversion_id' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvId")),
                'conversion_language' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvLg")),
                'conversion_label' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvLb")),
                'conversion_value' => sprintf("'%s'", (float)$o->total_paid),
            );
        } else {
            $this->adwords = array(
                'adwords' => true,
                'conversion_id' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvId")),
                'conversion_language' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvLg")),
                'conversion_label' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvLb")),
            );
        }

        // remarketing snippet
        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ParamsRmkt"))) {
            $this->setRemarketingParameters();
        }

        //Preparing data for enhanced ecommece
        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ParamsEE"))) {
            $this->context->smarty->assign('valuta', $this->context->currency->iso_code);
            $this->actiondata['page'] = $page;
            $this->generateEnhancedEcommerce($page);
        }

        //tracking uid
        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ParamsUid"))) {
            $this->context->smarty->assign('trackuid', true);
            if ($this->context->customer->id) {
                $this->context->smarty->assign('uid', $this->context->customer->id_guest.'-guest');
                $this->context->smarty->assign('cid', $this->context->customer->id);
            } else {
                $this->context->smarty->assign('uid', $this->context->customer->id_guest.'-guest');
                $this->context->smarty->assign('cid', '');
            }
        }
        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ph_user_id_custom_dimension_nr"))) {
            $this->context->smarty->assign('ph_user_id_custom_dimension_nr', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_user_id_custom_dimension_nr")
            ));
        }
        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ph_ecomm_prodid_custom_dimension_nr"))) {
            $this->context->smarty->assign('ph_ecomm_prodid_custom_dimension_nr', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_ecomm_prodid_custom_dimension_nr")
            ));
        }
        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ph_ecomm_pagetype_custom_dimension_nr"))) {
            $this->context->smarty->assign('ph_ecomm_pagetype_custom_dimension_nr', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_ecomm_pagetype_custom_dimension_nr")
            ));
        }
        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ph_ecomm_totalvalue_custom_dimension_nr"))) {
            $this->context->smarty->assign('ph_ecomm_totalvalue_custom_dimension_nr', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_ecomm_totalvalue_custom_dimension_nr")
            ));
        }
        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ph_customer_id_dimension_nr"))) {
            $this->context->smarty->assign('ph_customer_id_dimension_nr', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_customer_id_dimension_nr")
            ));
        }
        /* crossdomain */
        $checkbox_ph_allowlinker = boolval($this->getConfig(Tools::strtoupper("PhGoogleTagManager_ph_allowlinker")));
        if ($checkbox_ph_allowlinker === true) {
            $this->context->smarty->assign('ph_allowLinker', 'true');
        } else {
            $this->context->smarty->assign('ph_allowLinker', 'false');
        }
        if ($checkbox_ph_allowlinker) {
            $this->context->smarty->assign('ph_autoLinkDomains', $this->getConfig(
                Tools::strtoupper("PhGoogleTagManager_ph_autolinkdomains")
            ));
        } else {
            $this->context->smarty->assign('ph_autoLinkDomains', '');
        }


        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvId"))) {
            $this->smarty->assign('AdwConvId', $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvId")));
        }
        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvLg"))) {
            $this->smarty->assign('AdwConvLg', $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvLg")));
        }
        if ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvLb"))) {
            $this->smarty->assign('AdwConvLb', $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvLb")));
        }
        
        // if ($this->context->customer->firstname != '' || $this->context->customer->lastname) {
        //     $CDcustomer = $this->context->customer->firstname.' '.$this->context->customer->lastname;
        // } else {
        //     $CDcustomer='';
        // }
        $this->context->smarty->assign(
            array(
                'tgmm_v' => $this->version,
                'FBuser' => $FBuser,
                // 'CDcustomer' => $CDcustomer,
                'products' => $this->productdata,
                'impressions' => $this->impressiondata,
                'remarketing' => $this->remarketing,
                'action' => $this->actiondata,
                'adwords' => $this->adwords,
                /** BEGIN2 Petyus | PrestaChamps add product_ids to purchase/order confirmation page  **/
                'product_ids' => $this->product_ids_array,
                /** END2 Petyus | PrestaChamps add product_ids to purchase/order confirmation page  **/
            )
        );
        if (_PS_VERSION_ > 1.6) {
            $this->context->smarty->assign(
                array(
                    'meta_title' => $this->context->smarty->tpl_vars['page']->value['meta']['title']
                )
            );
        }
        return $this->display(__FILE__, 'views/templates/hook/header.tpl');
    }


    public function hookAdminOrder()
    {
        /*** Hook admin order to send transactions and refunds details*/

        // ppp($this->context->cookie->ph_tagmanager_refund);
        // echo $this->_runJs($this->context->cookie->ph_tagmanager_refund, 1);
        unset($this->context->cookie->ph_tagmanager_refund);
    }

    public function hookDisplayOrderConfirmation($params)
    {
        /** save order in DB Table **/
        
        if (isset($params['objOrder'])) {
            $order = $params['objOrder'];
        }
        if (isset($params['order'])) {
            $order = $params['order'];
        }

        if (Validate::isLoadedObject($order) && $order->getCurrentState() != (int)Configuration::get('PS_OS_ERROR')) {
            $order_already_sent_toGA = Db::getInstance()->getValue(
                'SELECT id_order FROM `'._DB_PREFIX_.'ph_google_tag_manager`'.' WHERE id_order = '.(int)$order->id
            );
            //var_dump(order_already_sent_toGA);
            if ($order_already_sent_toGA === false) {
                Db::getInstance()->Execute(
                    'INSERT INTO `'._DB_PREFIX_.'ph_google_tag_manager` (id_order, id_shop,'
                    .' sent, date_add) VALUES ('.(int)$order->id.', '.(int)$this->context->shop->id.', 1, NOW())'
                );
            }
            
            //display GoogleCustomer Reviews Opt-in code
        }
        return true;
    }
    
    public function hookActionOrderStatusPostUpdate($params)
    {
        $order_id = $params['id_order'];
        $newOrderStatus = $params['newOrderStatus']->id;
        $refund_state_id = array(
            Configuration::get('PS_OS_CANCELED'),
            Configuration::get('PS_OS_REFUND'),
            Configuration::get('PS_OS_ERROR')
        );
        //ddd($params);
        if (in_array($newOrderStatus, $refund_state_id)) {
            $order = new Order($order_id);
            $id_cart = $order->id_cart;

            $order_id_customer = $order->id_customer;
            $order_id_guest_userid = Cart::getCartByOrderId($id_cart)->id_guest;
            // var_dump($id_cart);
            // var_dump( );
            //if (self::isRefundable($order_id, $this->shop_id)) {
                $refmsg = Configuration::get('PHGOOGLETAGMANAGER_ORDERS_TO_REFUND')
                    .' refundByOrderId('.$order_id.','.$order_id_customer.','.$order_id_guest_userid.'); ';
                Configuration::updateValue('PHGOOGLETAGMANAGER_ORDERS_TO_REFUND', $refmsg, false, null, $this->shop_id);
                // ddd(Configuration::get('PHGOOGLETAGMANAGER_ORDERS_TO_REFUND'));
                //$this->addRefund($order_id, $this->shop_id);
            //}
        }
    }
    public function hookUpdateOrderStatus($params)
    {
        //ddd($params);
        // $order_id = $params['id_order'];
        // $newOrderStatus = $params['newOrderStatus']->id;
        /*$refund_state_id = [
            Configuration::get('PS_OS_CANCELED'),
            Configuration::get('PS_OS_REFUND'),
            Configuration::get('PS_OS_ERROR')
        ];*/
        /*Configuration::set('PHGOOGLETAGMANAGER_ORDERS_TO_REFUND',
        Configuration::get('PHGOOGLETAGMANAGER_ORDERS_TO_REFUND').' orderid: ' . $order_id 
        . ' statusid:'. $newOrderStatus );*/
        // if (in_array($newOrderStatus, $refund_state_id)) {
            // if (self::isRefundable($order_id, $this->shop_id)) {
                // $this->addRefund($order_id, $this->shop_id);
            // }
        // }
    }
    
    // public static function isRefundable($order_id, $shop_id, $id_product_with_attribute = null)
    // {
    //     $gtmOrderLog = self::getByOrderId($order_id, $shop_id);
    //     // no gtm log associated to the order
    //     if (!$gtmOrderLog) {
    //         //throw new CdcGtmOrderLogException('CdcGtmOrderLog for order '.$order_id.' not found');
    //         return false;
    //     }
    //     if (!$gtmOrderLog->sent) {
    //         //throw new CdcGtmOrderLogException('CdcGtmOrderLog for order '.$order_id.' not sent to GTM');
    //         return false;
    //     }
    //     // refund not set, we can refund everything
    //     if (!$gtmOrderLog->refund) {
    //         return true;
    //     }
    //     // order already refunded
    //     if ($gtmOrderLog->refund == "all") {
    //         return false;
    //     }
    //     // list of products refunded
    //     $products = explode(',', $gtmOrderLog->refund);
    //     if (in_array($id_product_with_attribute, $products)) {
    //         // product already refunded
    //         return false;
    //     } else {
    //         // product not refunded
    //         return true;
    //     }
    // }

    public static function getByOrderId($order_id, $shop_id)
    {
        $sql = "SELECT id_ph_google_tagmanager from `"._DB_PREFIX_."ph_google_tag_manager` WHERE id_order = '"
        .(int)$order_id."' and id_shop = '".(int)$shop_id."'";
        $id_ph_google_tagmanager = (int) Db::getInstance()->getValue($sql);

        if ($id_ph_google_tagmanager) {
            $order = new Order((int)Tools::getValue('id_order'));
            return $order;
        } else {
            return null;
        }
    }

    public function hookDisplayBackOfficeHeader()
    {
        // ppp($this->context->cookie);
        // ppp($this->context->cookie->ph_tagmanager_refund);
        $ph_id_googletagmanager =  $this->getConfig(Tools::strtoupper("PhGoogleTagManager_IdTgm"));
        $ph_analytics_uacode = $this->getConfig(Tools::strtoupper("PhGoogleTagManager_GAnalyticsUa"));
        $js='';
        if (!empty($ph_id_googletagmanager) && $this->active) {
            $refund_js_script = Configuration::get('PHGOOGLETAGMANAGER_ORDERS_TO_REFUND');
            if ($refund_js_script != '') {
                $this->context->smarty->assign(array(
                   'refund_js_script' => $refund_js_script,
                   'ph_id_googletagmanager' => $ph_id_googletagmanager,
                   'ph_analytics_uacode' => $ph_analytics_uacode,
                ));
                Configuration::updateValue('PHGOOGLETAGMANAGER_ORDERS_TO_REFUND', '');
            }
            if ($this->context->controller->controller_name == 'AdminOrders') {
                if (Tools::getValue('id_order')) {
                    $order = new Order((int)Tools::getValue('id_order'));
                    if (Validate::isLoadedObject($order) && strtotime('+1 day', strtotime($order->date_add)) > time()) {
                        $order_already_sent_toGA = Db::getInstance()->getValue(
                            'SELECT id_order FROM `'._DB_PREFIX_
                            .'ph_google_tag_manager` WHERE id_order = '.(int)Tools::getValue('id_order')
                        );
                        if ($order_already_sent_toGA === false) {
                            Db::getInstance()->Execute(
                                'INSERT IGNORE INTO `'._DB_PREFIX_.'ph_google_tag_manager`'
                                .' (id_order, id_shop, sent, date_add) VALUES ('.(int)Tools::getValue('id_order').', '
                                .(int)$this->context->shop->id.', 1, NOW())'
                            );
                        }
                    }
                } else {
                    /*$ga_order_records = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_
                        .'ph_google_tag_manager` WHERE sent = 0 AND id_shop = \''.(int)$this->context->shop->id
                        .'\' AND DATE_ADD(date_add, INTERVAL 30 minute) < NOW()');

                    if ($ga_order_records)
                        foreach ($ga_order_records as $row)
                        {
                            $transaction = $this->wrapOrder($row['id_order']);
                            if (!empty($transaction))
                            {
                                Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'ph_google_tag_manager`'
                                .' SET date_add = NOW(), sent = 1 WHERE id_order = '.(int)$row['id_order']
                                .' AND id_shop = \''.(int)$this->context->shop->id.'\'');
                                $transaction = Tools::jsonEncode($transaction);
                                $ph_scripts .= 'MBG.addTransaction('.$transaction.');';
                            }
                        }*/
                }
            }
            return $this->display(__FILE__, 'views/templates/admin/order_refund.tpl');
        } else {
            return $js;
        }
    }

    public function hookActionProductCancel($params)
    {
        //die('hookActionProductCancel');
        /*** Hook admin office header to add google analytics js */
        $qty_refunded = Tools::getValue('cancelQuantity');
        $ph_scripts = '';
        foreach ($qty_refunded as $orderdetail_id => $qty) {
            // Display GA refund product
            $order_detail = new OrderDetail($orderdetail_id);
            $ph_scripts .= 'console.log('.Tools::jsonEncode(
                array(
                    'id' =>
                    empty($order_detail->product_attribute_id)?$order_detail->product_id:$order_detail->product_id
                    .'-'.$order_detail->product_attribute_id, 'quantity' => $qty)
            ).');';
        }
        $this->context->cookie->ph_tagmanager_refund = $ph_scripts.'console.log(.refundByProduct('
        .Tools::jsonEncode(array('id' => $params['order']->id)).');';
    }





    private function refundOrder($order_id, /* $shop_id,*/ $product_id_with_attribute = null/*, $quantity = null*/)
    {
        // $gtmOrderLog = CdcGtmOrderLog::getByOrderId($order_id, $shop_id);
        //$o = new Order($order_id);

        // get refunds queue
        $refundsQueue = Configuration::get('PHGOOGLETAGMANAGER_ORDERS_TO_REFUND', null, null, $this->shop_id);
        if (empty($refundsQueue)) {
            $refundsQueue = array();
        } else {
            $refundsQueue = Tools::jsonDecode($refundsQueue, true);
        }

        // full refund
        if (is_null($product_id_with_attribute)) {
            //$gtmOrderLog->refund = "all";
            $refundsQueue[$order_id] = "all";
        }
        // partial refund
        /*else {
            $productsRefunded = array();
            if ($gtmOrderLog->refund && $gtmOrderLog->refund != "all") {
                $productsRefunded = explode(',', $gtmOrderLog->refund);
            }
            $productsRefunded[] = $product_id_with_attribute;
            //$gtmOrderLog->refund = implode(',', $productsRefunded);

            if (!isset($refundsQueue[$order_id])) {
                $refundsQueue[$order_id] = array();
            }
            if ($refundsQueue[$order_id] != "all") {
                $refundsQueue[$order_id][$product_id_with_attribute] = $quantity;
            }
        }*/
        //ppp($refundsQueue);
        // save
        /*Configuration::updateValue('PHGOOGLETAGMANAGER_ORDERS_TO_REFUND', Tools::jsonEncode($refundsQueue),
         false, null, $this->shop_id);*/
        // $gtmOrderLog->save();
    }


    /**
     * remarketing data
     * @param $params
     */
    private function setRemarketingParameters()
    {
        $info = array();
        $page_type = '';

        $page = $this->context->controller->php_self;
        $product_ids = array();
        switch ($page) {
            //remarketing tag
            case self::PAGE_HOME:
                $page_type = self::GOOGLE_PAGE_TYPE_HOME;
                $this->remarketing = array(
                    'remarketing' => true,
                    // 'id_product' => $id_product,
                    'page_type' => $page_type,
                    // 'total' => (float)$total,
                );
                break;
            case self::PAGE_CATEGORY:
                $page_type = self::GOOGLE_PAGE_TYPE_CATEGORY;
                if (_PS_VERSION_ > 1.6) {
                     $ecomm_category = $this->context->smarty->tpl_vars['category']->value['name'];
                } else {
                    $ecomm_category = $this->context->smarty->tpl_vars['name']->value;
                }

                $this->remarketing = array(
                    'remarketing' => true,
                    // 'id_product' => $id_product,
                    'page_type' => $page_type,
                    'ecomm_category' => $ecomm_category,
                    // 'total' => (float)$total,
                );
                break;
            case self::PAGE_CART:
            case self::PAGE_CART_17:
            case self::PAGE_CART_OPC:
            case self::PAGE_CART_OPC_SUPERCHECKOUT:
            case self::PAGE_CART_OPC_EASYPAY:
                $page_type = self::GOOGLE_PAGE_TYPE_CART;
                // $_dataProductIds = $this->compileProductIds((object)$product);
                $cart = new Cart($this->context->cart->id);
                $cartProducts = $cart->getProducts();
                if (count($cartProducts)>1) {
                    $content_type = 'product_group';
                } else {
                    $content_type = 'product';
                }
                $total_cart_value = 0 ;
                foreach ($cartProducts as $product) {
                    $_data = $this->compileProductData((object)$product);
                    // var_dump($_data);die();
                    $id_product = '';
                    switch ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_McntCenter"))) {
                        case self::PRODUCT_ID:
                            $id_product = $_data['id_product'];
                            break;
                        case self::PRODUCT_REFERENCE:
                            $id_product = (string)$_data['reference'];
                            break;
                        case self::PRODUCT_EAN:
                            $id_product = $_data['ean13'];
                            break;
                        case self::PRODUCT_UPC:
                            $id_product = $_data['upc'];
                            break;
                        default:
                            $id_product = $_data['id'];
                            break;
                    }

                    $product_ids[] = $id_product;


                    $total_cart_value += $_data['price'] * $_data['quantity'];
                }
                $this->remarketing = array(
                    'remarketing' => true,
                    'id_product_array' =>  $product_ids,
                    'id_product' =>  json_encode($product_ids) ,
                    'page_type' => $page_type,
                    'content_type' => $content_type,
                    'total' => (float)$total_cart_value,
                );
                break;
            case self::PAGE_ORDERCONFIRMATION:
                $page_type = self::GOOGLE_PAGE_TYPE_PURCHASE ;
                $cart = new Cart($this->context->cart->id);
                $cartProducts = $cart->getProducts();
                // var_dump($cart );
                if (count($cartProducts)>1) {
                    $content_type = 'product_group';
                } else {
                    $content_type = 'product';
                }
                $total_cart_value = 0 ;
                foreach ($cartProducts as $product) {
                    $_data = $this->compileProductData((object)$product);
                    
                    // $product_ids[] = (int)$_data['id_product'];
                    $id_product = '';
                    switch ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_McntCenter"))) {
                        case self::PRODUCT_ID:
                            $id_product = $_data['id_product'];
                            break;
                        case self::PRODUCT_REFERENCE:
                            $id_product = (string)$_data['reference'];
                            break;
                        case self::PRODUCT_EAN:
                            $id_product = $_data['ean13'];
                            break;
                        case self::PRODUCT_UPC:
                            $id_product = $_data['upc'];
                            break;
                        default:
                            $id_product = $_data['id'];
                            break;
                    }

                    $product_ids[] = $id_product;
                    $total_cart_value += $_data['price'] * $_data['quantity'];
                }

                $this->remarketing = array(
                    'remarketing' => true
                );
                if (isset($product_ids)) {
                    $this->remarketing['id_product'] = json_encode($product_ids);
                }
                if (isset($page_type)) {
                    $this->remarketing['page_type'] = $page_type;
                }
                if (isset($content_type)) {
                    $this->remarketing['content_type'] = $content_type;
                }
                if (isset($content_type)) {
                    $this->remarketing['total'] = (float)$total_cart_value;
                }
                    

                    
                
                break;
            case self::PAGE_PRODUCT:
                $page_type = self::GOOGLE_PAGE_TYPE_PRODUCT;

                /**
                 * @var ProductCore $p
                 */
                $p = new Product(Tools::getValue('id_product'));
                $id_product = '';
                switch ($this->getConfig(Tools::strtoupper("PhGoogleTagManager_McntCenter"))) {
                    case self::PRODUCT_ID:
                        $id_product = Tools::getValue('id_product', 0);
                        break;
                    case self::PRODUCT_REFERENCE:
                        $id_product = (string)$p->reference;
                        break;
                    case self::PRODUCT_EAN:
                        $id_product = $p->ean13;
                        break;
                    case self::PRODUCT_UPC:
                        $id_product = $p->upc;
                        break;
                    default:
                        $id_product = $p->id;
                        break;
                }
                $product_ids[] = $id_product;

                $total = $p->price;

                $info['product_name'] = Product::getProductName($p->id);
                /**
                 * @var CategoryCore $c
                 */
                $c = new Category($p->getDefaultCategory());

                $info['category_name'] = $c->getName();

                //activating the parameters
                if (!$page_type) {
                    return;
                }
                $this->remarketing = array(
                    'remarketing' => true,
                    'id_product' => '"'.$id_product.'"',
                    // 'id_product' => json_encode($product_ids),
                    'page_type' => $page_type,
                    'total' => (float)$total,
                    'product_name' => $info['product_name'],
                    'conversion_id' => $this->getConfig(Tools::strtoupper("PhGoogleTagManager_AdwConvId")),
                );

                break;
            default:
                $page_type = self::GOOGLE_PAGE_TYPE_OTHER ;
                $this->remarketing = array(
                    'remarketing' => true,
                    'page_type' => $page_type,
                );
                if (isset($total_cart_value)) {
                    $this->remarketing['total'] = (float)$total_cart_value;
                }
                break;
        }

        if (count($info) > 0) {
            $this->remarketing['info'] = $info;
        }
    }

    /**
     * generate data for EnhancedEcommerce
     */
    private function generateEnhancedEcommerce($page)
    {
        //init
        $this->actiondata['actionFieldValue'] = '';
        $this->actiondata['action'] = '';
        $controller = Tools::getValue("controller");
        $module = Tools::getValue('module');
        // if ($_SERVER['REMOTE_ADDR']) {
        // 	var_dump($page);
        // 	var_dump($module.'='.self::PAGE_ORDERCONFIRMATION_PAYPAL_MODULE);
        // 	var_dump($controller.' = '.self::PAGE_ORDERCONFIRMATION_PAYPAL_CONTROLLER);
        // }
        
        switch ($page) {
             //case self::PAGE_HOME:
             //     break;
            case self::PAGE_PRODUCT:
                $this->generateEnhancedEcommercePageProduct();
                break;
            case self::PAGE_PAYMENT:
            case self::PAGE_CART:
            case self::PAGE_CART_17:
            case self::PAGE_CART_OPC:
            case self::PAGE_CART_OPC_SUPERCHECKOUT:
            case self::PAGE_CART_OPC_EASYPAY:
                $this->generateEnhancedEcommercePageCart();
                break;
            case self::PAGE_CATEGORY:
                $this->generateEnhancedEcommercePageCategory();
                break;
             //case self::PAGE_SEARCH:
             //       return $this->generateEnhancedEcommercePageSearch($params);
             //    break;
            case self::PAGE_ORDERCONFIRMATION:
                $this->generateEnhancedEcommercePageOrderConfirmation();
                break;
        }
        // if Paypal module's Submt page
        if ($module == self::PAGE_ORDERCONFIRMATION_PAYPAL_MODULE
            && $controller == self::PAGE_ORDERCONFIRMATION_PAYPAL_CONTROLLER) {
            $this->generateEnhancedEcommercePageOrderConfirmation();
        }
    }

    private function generateEnhancedEcommercePageOrderConfirmation()
    {
        /**
         * @var OrderCore $order
         */
        // $order = new Order(Tools::getValue('id_order'));
        /*BEGIN fixing order confirmation if order ID is missing from URL on confirmation page (SAGEPAY) */
        if (!Tools::getValue('id_order')) {
            $order_id = Order::getOrderByCartId(Tools::getValue('id_cart'));
        } else {
            $order_id = Tools::getValue('id_order');
        }
        /*END fixing order confirmation if odred ID is missing from URL on confirmation page (SAGEPAY) */
        $order = new Order($order_id);
        $order_already_sent_toGA = Db::getInstance()->getValue(
            'SELECT id_order FROM `'._DB_PREFIX_.'ph_google_tag_manager`'.' WHERE id_order = '.(int)$order->id
        );
        $deliveryAddress =  new Address($order->id_address_delivery);
        $deliveryCountry = new Country($deliveryAddress->id_country);
        $customer = new Customer($order->id_customer);
        $this->actiondata['id'] = $order_id;
        $this->actiondata['email'] = $customer->email;
        $this->actiondata['delivery_country'] = $deliveryCountry->iso_code;
        if ($order_already_sent_toGA === false) {
            $this->actiondata['action'] = 'purchase';
        } else {
            $this->actiondata['action'] = 'purchase_already_sent';
        }
        $this->actiondata['revenue'] = $order->total_paid;//$order->total_products;
        $this->actiondata['tax'] = $order->total_paid_tax_incl - $order->total_paid_tax_excl;
        $this->actiondata['shipping'] = $order->total_shipping_tax_excl;

        foreach ($order->getProducts() as $product) {
            $_data = $this->compileProductData((object)$product);
            $_data['quantity'] = $product['product_quantity'];
            $_data['price'] = $product['product_price'];

            $this->productdata[] = $_data;

            $_dataProductIds = $this->compileProductIds((object)$product);
        }
        /** BEGIN3 Petyus | PrestaChamps add product_ids to purchase/order confirmation page  **/
        $this->product_ids_array =  $_dataProductIds;
        /** END3 Petyus | PrestaChamps add product_ids to purchase/order confirmation page  **/
    }

    /**
     * array of table order_detail
     */
    /** BEGIN4 Petyus | PrestaChamps add product_ids to purchase/order confirmation page  **/
    private function compileProductIds($product)
    {
        $product_ids_array = array();
        $prd = $product instanceof Product ? $product : (object)$product;
        $product_ids_array[] = $prd->product_id;
        return $product_ids_array;
    }
    /** END4 Petyus | PrestaChamps add product_ids to purchase/order confirmation page  **/
    private function compileProductData($product, $category_name = '')
    {

        $prd = $product instanceof Product ? $product : (object)$product;
        // var_dump($prd);
        $product_data = array();
        $product_data['reference'] = $prd->reference;
        $product_data['ean13'] = $prd->ean13;
        $product_data['upc'] = $prd->upc;
        if ($prd->reference) {
            $product_data['id'] = $prd->reference;
        } elseif ($prd->ean13) {
            $product_data['id'] = $prd->ean13;
        } elseif ($prd->upc) {
            $product_data['id'] = $prd->upc;
        } else {
            if (isset($prd->id)) {
                $product_data['id'] = $prd->id;
            }
            if (isset($prd->id_product)) {
                $product_data['id'] = $prd->id_product;
            }
        }
        if (isset($prd->id)) {
            $product_data['id_product'] = $prd->id;
        }
        if (isset($prd->id_product)) {
            $product_data['id_product'] = $prd->id_product;
        }
        //the name also contains all the attribute name with the reference
        if (isset($prd->product_name)) {
            if (is_array($prd->product_name)) {
                $product_data['name'] = $prd->product_name[$this->context->language->id];
            } else {
                $product_data['name'] = $prd->product_name;
            }
        } else {
            //exact name of the product without reference
            if (isset($prd->id)) {
                $product_data['name'] = Product::getProductName($prd->id, null, $this->context->language->id);
            } else {
                $product_data['name'] = Product::getProductName($prd->id_product, null, $this->context->language->id);
            }
        }

        $product_data['price'] = (float)$prd->price;
        $product_data['quantity'] = (int)$prd->quantity;

        if (!$category_name) {
            /**
             * @var CategoryCore $c
             */
            $c = new Category($prd->id_category_default);

            $product_data['category'] = $c->getName();
        } else {
            $product_data['category'] = $category_name;
        }
        /** BEGIN1 Petyus | PrestaChamps add list and position to the categorey view product listings  **/
        $product_data['list'] = 'Category Listing';
        if (isset($product->positionincategory)) {
            $product_data['position'] = $product->positionincategory;
        }
        /** END1 Petyus | PrestaChamps add list and position to the categorey view product listings  **/
        $this->actiondata['actionFieldValue'] = $product_data['category'];
        // return $product_data;
        return $product_data;
    }

    private function generateEnhancedEcommercePageProduct()
    {
        $this->productdata[] = $this->compileProductData(
            new Product(Tools::getValue('id_product'))
        );

        $this->actiondata['action'] = 'detail';
    }

    private function generateEnhancedEcommercePageCart()
    {
        $step = Tools::getValue('controller', false) == 'payment' ? 4 : Tools::getValue('step', 0);
        // for 1.7 maybe this can be used $('.checkout-step.-current.js-current-step').find('.step-number').text()
        switch ($step) {
            case '0': //Cart page
                /**
                 * @var CartCore $cart
                 */
                $cart = new Cart($this->context->cart->id);
                $this->actiondata['step'] = 1;
                $this->actiondata['action'] = 'checkout';
                $this->actiondata['option'] = 'cart sumary';
                foreach ($cart->getProducts() as $product) {
                    $_data = $this->compileProductData((object)$product);
                    $_data['quantity'] = $product['cart_quantity'];
                    $_data['price'] = $product['price'];
                    $this->productdata[] = $_data;
                }
                break;
            case '1': //address
                $this->actiondata['action'] = 'checkout';
                $this->actiondata['option'] = 'address';
                $this->actiondata['step'] = 2;

                break;
            case '2': //shipping
                $this->actiondata['action'] = 'checkout';
                $this->actiondata['step'] = 3;
                $this->actiondata['option'] = 'shipping';
                break;
            case '3': //payment
                $this->actiondata['action'] = 'checkout';
                $this->actiondata['step'] = 4;
                $this->actiondata['option'] = 'payment';
                break;
            case '4':
                if (Tools::getValue('controller') == 'payment') {
                    $this->actiondata['action'] = 'checkout';
                    $this->actiondata['step'] = 5;
                    $this->actiondata['option'] = Tools::getValue('module');
                }
                break;
            default:
                break;
        }
    }

    private function generateEnhancedEcommercePageCategory()
    {
        /**
         * @var CategoryCore $c
         */
        $c = new Category(Tools::getValue('id_category'));

        /**
         * method getProducts:
         * @param int $id_lang Language ID
         * @param int $p Page number
         * @param int $n Number of products per page
         * */
        $lang = Context::getContext()->language->id;
        $page_number = Tools::getValue('p', 1);
        $prdperpage = Configuration::get('PS_PRODUCTS_PER_PAGE');
        $products = $c->getProducts($lang, $page_number, $prdperpage);

        $this->impressiondata['list'] = 'Category Listing';

        //         foreach ($products as $id) {
        /** BEGIN2 Petyus | PrestaChamps add list and position to the categorey view product listings  **/
        foreach ($products as $key => $id) {
        /** END2 Petyus | PrestaChamps add list and position to the categorey view product listings  **/

            /**
             * @var ProductCore $p
             */
            $p = new Product($id['id_product']);
            /** BEGIN3 Petyus | PrestaChamps add list and position to the categorey view product listings  **/
            $p->positionincategory = $key + 1 ;
            /** END3 Petyus | PrestaChamps add list and position to the categorey view product listings  **/

            $this->productdata[] = $this->compileProductData($p, $c->getName());
        }
    }

    public function __call($method, $args = '')
    {
        $args = $args;
        if (preg_match('/unregisterHook/', $method)) {
            $hookname = preg_replace('/unregisterHook/', '', $method);

            return $this->unregisterHook(lcfirst($hookname));
        }
        if (preg_match('/registerHook/', $method)) {
            $hookname = preg_replace('/registerHook/', '', $method);

            return $this->registerHook(lcfirst($hookname));
        }
    }

    private function getConfig($name)
    {
        $configvalue = Configuration::get(Tools::strtoupper($name));
        return $configvalue;
    }

    private function setConfig($name, $value)
    {
        if (is_array($value)) {
            return Configuration::updateValue(Tools::strtoupper($name), Tools::jsonEncode($value));
        } else {
            return Configuration::updateValue(Tools::strtoupper($name), $value);
        }
    }

    private function deleteConfig($name)
    {
        return Configuration::deleteByName(Tools::strtoupper($name));
    }

    private function generateEnhancedEcommercePageHome()
    {
        $script = '';

        return $script;
    }
}
