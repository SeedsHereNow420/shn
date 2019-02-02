<?php
/**
 * NOTICE OF LICENSE.
 *
 * This source file is subject to the following license: REGULAR LICENSE
 * that is bundled with this package in the file LICENSE.txt.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future.
 *
 * @author    VaSibi
 * @copyright VaSibi
 * @license   REGULAR LICENSE
 */

require dirname(__FILE__).'/dealsofthedayprotool.class.php';

class DealsoftheDayPro extends Module
{
    /* protected var */
    protected $menu = array();
    protected $user_groups;
    protected $pattern = '/^([A-Z_]*)[0-9]+/';
    protected $page_name = '';
    protected $spacer_size = '5';
    protected $config_form = false;


    public function __construct()
    {
        $this->author = 'VaSibi';
        $this->name = 'dealsofthedaypro';
        $this->tab = 'advertising_marketing';
        $this->version = '1.0.2';
        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->module_key = '0bb8ad0dfc687a0f8558b2b418c69827';
        parent::__construct();

        $this->displayName = $this->l('Deals of the Day Pro');
        $this->description = $this->l('Adds a Deals sliders to your website.');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
        $this->ps_versions_compliancy = array('min' => '1.7.0', 'max' => '1.7.9');
    }

    public function install($delete_params = true)
    {
        if (!parent::install()
            || !$this->registerHook('displayTopColumn') //1.6
            || !$this->registerHook('displayHomeTop')
            || !$this->registerHook('displayContentWrapperTop')
            || !$this->registerHook('displayWrapperTop')
            || !$this->registerHook('displayDealsOftheDayPro') //custom {hook h="displayDealsOftheDayPro"}
            || !$this->registerHook('header')
            || !$this->registerHook('actionFrontControllerSetMedia')
            || !$this->registerHook('DisplayBackOfficeHeader')
            || !$this->registerHook('actionObjectCategoryUpdateAfter')
            || !$this->registerHook('actionObjectCategoryDeleteAfter')
            || !$this->registerHook('actionObjectSupplierUpdateAfter')
            || !$this->registerHook('actionObjectSupplierDeleteAfter')
            || !$this->registerHook('actionObjectManufacturerUpdateAfter')
            || !$this->registerHook('actionObjectManufacturerDeleteAfter')
            || !$this->registerHook('actionObjectManufacturerAddAfter')
            || !$this->registerHook('actionObjectProductUpdateAfter')
            || !$this->registerHook('actionObjectProductDeleteAfter')
            || !$this->registerHook('actionShopDataDuplication')
        ) {
            return false;
        }

        //set homeposition
        $moduleInstance = Module::getInstanceByName($this->name);
        if (_PS_VERSION_ < '1.7') {
            $hookID = (int)Hook::get('displayTopColumn');
        } else { //16
            $hookID = (int)Hook::getIdByName('displayHomeTop');
        }
        $moduleInfo = Hook::getModulesFromHook($hookID, $moduleInstance->id);
        $moduleInstance->updatePosition($hookID, 0, 1);

        // clean cached tpl and globally smarty cache
        $this->clearMenuCache();
        Tools::clearSmartyCache();

        // all settings set on installation
        if ($delete_params) {
            if (!$this->installDb()
                || !Configuration::updateGlobalValue('dealsofthedaypro_hookposition', 'top')
            ) {
                return false;
            }
        }

        return true;
    }

    public function installDb()
    {
        //prepare demo
        $btnlink = $btnlink2 = $btntext = $btntext2 = $maintext = $maintext2 = array();
        $shop_id = (int) $this->context->shop->id;
        $id_lang = (int) Context::getContext()->language->id;
        $languages = $this->context->controller->getLanguages();
        $root = Category::getRootCategory(); //home
        $root_id = (int)$root->id;
        foreach ($languages as $key => $val) {
            $btnlink[$val[ 'id_lang' ]] = 'https://www.google.co.uk';
            $btntext[$val[ 'id_lang' ]] =  'View Price drop';
            $maintext[$val[ 'id_lang' ]] =  'Large text';
            $btnlink2[$val[ 'id_lang' ]] = 'https://www.bing.com';
            $btntext2[$val[ 'id_lang' ]] =  'Another button';
            $maintext2[$val[ 'id_lang' ]] =  'Short banner text';
        }
        //add tables for slides
        return Db::getInstance()->execute(
            '
		CREATE TABLE IF NOT EXISTS `' ._DB_PREFIX_.'displaydealsofthedaypro_sliders` (
			`id_displaydealsofthedaypro_sliders` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`id_shop` INT(11) UNSIGNED NOT NULL,
      `status` TINYINT( 1 ) NOT NULL,
      `sections` TEXT NOT NULL,
      `showcase` varchar(128) NOT NULL,
      `homeonly` TINYINT( 1 ) NOT NULL,
      `date` datetime NOT NULL,
      `underslider` TINYINT( 1 ) NOT NULL,
      `hookposition` varchar(128) NOT NULL,
      `maincolor` varchar(128) NOT NULL,
      `color1` varchar(128) NOT NULL,
      `color2` varchar(128) NOT NULL,
      `color3` varchar(128) NOT NULL,
      `color4` varchar(128) NOT NULL,
      `color5` varchar(128) NOT NULL,
      `color6` varchar(128) NOT NULL,
      `color7` varchar(128) NOT NULL,
      `color8` varchar(128) NOT NULL,
      `description` TINYINT( 1 ) NOT NULL,
      `slideshow` TINYINT( 1 ) NOT NULL,
      `offslider` TINYINT( 1 ) NOT NULL,
      `rounded` TINYINT( 1 ) NOT NULL,
      `margin` INT(11),
      `sortorder` INT(11),
      `d_categories` TEXT NOT NULL,
      `d_manufacturers` TEXT NOT NULL,
      `d_products` TEXT NOT NULL,
      `d_other` TEXT NOT NULL,
			INDEX (`id_shop`)
		) ENGINE = ' ._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;'
        ) && Db::getInstance()->execute(
            '
			 CREATE TABLE IF NOT EXISTS `' ._DB_PREFIX_.'displaydealsofthedaypro_sliders_lang` (
      `id_uniq` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`id_displaydealsofthedaypro_sliders` INT(11) UNSIGNED NOT NULL,
			`id_lang` INT(11) UNSIGNED NOT NULL,
			`id_shop` INT(11) UNSIGNED NOT NULL,
			`maintext` VARCHAR( 255 ) NOT NULL ,
      `btntext` VARCHAR( 255 ) NOT NULL ,
			`btnlink` VARCHAR( 255 ) NOT NULL ,
      `lang_image` VARCHAR( 255 ) NOT NULL ,
			INDEX ( `id_displaydealsofthedaypro_sliders` , `id_lang`, `id_shop`)
		) ENGINE = ' ._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;'
        ) && DealsoftheDayProTool::add(1, $btnlink, $btntext, $maintext, '12,5,4,6,9,1', '2', 0, '2019-02-10 06:17:00', 0, 'top', '#ffefef', '#2874f0', '#fff', '#000000', '#ffffff', '#212121', '#388e3c', '#798096', '#72727f', 1, 1, 0, 1, '5', (int) $shop_id, (int)$root_id)
        && DealsoftheDayProTool::add(0, $btnlink2, $btntext2, $maintext2, '1,2,3,4,5', '3', 0, '2019-08-10 06:17:00', 0, 'top', '#ffefef', '#2874f0', '#fff', '#000000', '#dadada', '#212121', '#388e3c', '#798096', '#72727f', 1, 1, 0, 0, '6', (int) $shop_id, '2,6,8');
    }

    protected function uninstallDb()
    {
        // remove module tables.
        Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'displaydealsofthedaypro_sliders`');
        Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'displaydealsofthedaypro_sliders_lang`');
        return true;
    }

    public function uninstall($delete_params = true)
    {
        if (!parent::uninstall()) {
            return false;
        }

        $this->clearMenuCache();
        Tools::clearSmartyCache();

        if ($delete_params) {
            if (!$this->uninstallDB()
                || !Configuration::deleteByName('dealsofthedaypro_hookposition')
            ) {
                return false;
            }
        }

        return true;
    }


    public function reset()
    {
        if (!$this->uninstall(false)) {
            return false;
        }
        if (!$this->install(false)) {
            return false;
        }

        return true;
    }

    public function hexToRgb($hex, $alpha = false)
    {
        $hex = str_replace('#', '', $hex);

        if (Tools::strlen($hex) == 3) {
            $r = hexdec(Tools::substr($hex, 0, 1).Tools::substr($hex, 0, 1));
            $g = hexdec(Tools::substr($hex, 1, 1).Tools::substr($hex, 1, 1));
            $b = hexdec(Tools::substr($hex, 2, 1).Tools::substr($hex, 2, 1));
        } else {
            $r = hexdec(Tools::substr($hex, 0, 2));
            $g = hexdec(Tools::substr($hex, 2, 2));
            $b = hexdec(Tools::substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        $str = implode(", ", $rgb);
        return $str;
    }

    public function getContent()
    {
        $m_text = $updated = "";
        $id_lang = (int) Context::getContext()->language->id;
        $languages = $this->context->controller->getLanguages();
        $default_language = (int) Configuration::get('PS_LANG_DEFAULT');
        $update_cache = false;

        if (Tools::isSubmit('submitdealsofthedaypro')) {
            $languages = Language::getLanguages(false);
            $errors_update_shops = array();
            $shops = Shop::getContextListShopID();
            $id_shop = (int) Shop::getContextShopID();

            foreach ($shops as $shop_id) {
                $shop_group_id = Shop::getGroupFromShop($shop_id);
                $updated = true;
                if (version_compare(_PS_VERSION_, '1.6.1', '<')) {
                    Configuration::updateValue('dealsofthedaypro_hookposition', (int)(Tools::getValue('dealsofthedaypro_hookposition')));
                } else {
                    $updated &= Configuration::updateValue('dealsofthedaypro_hookposition', Tools::getValue('dealsofthedaypro_hookposition'), false, (int) $shop_group_id, (int) $shop_id);
                }

                if (!$updated) {
                    $shop = new Shop($shop_id);
                    $errors_update_shops[ ] = $shop->name;
                }
            }

            if (!count($errors_update_shops)) {
                $m_text .= $this->displayConfirmation($this->l('Settings have been updated.'));
                Tools::clearSmartyCache();
            } else {
                $m_text .= $this->displayError(sprintf($this->l('Unable to update settings for the following shop(s): %s'), implode(', ', $errors_update_shops)));
            }

            $update_cache = true;
        }

        if ($update_cache) {
            $this->clearMenuCache();
        }

        $shops = Shop::getContextListShopID();
        if (Shop::isFeatureActive()) {
            $m_text .= $this->getCurrentShopInfoMsg();
        }

        $m_text .= $this->renderForm();
        $m_text .= $this->renderFormWithList().$this->renderHowto();
        return $m_text;
    }

    protected function renderFormWithList()
    {
        $shops = Shop::getContextListShopID();
        $id_lang = (int) $this->context->language->id;
        $sliders = array();
        foreach ($shops as $shop_id) {
            $sliders = array_merge($sliders, DealsoftheDayProTool::gets((int) $id_lang, null, (int) $shop_id));
        }

        $root = Category::getRootCategory();
        if (class_exists('HelperTreeCategories')) {
            $tree = new HelperTreeCategories('get-categories-tree', $this->l('Categories'));
            $tree->setRootCategory((int)$root->id)
                ->setUseCheckBox(true)
                ->setUseSearch(true);
            $tree_html = $tree->render();
        } else {
            $helper = new Helper();
            $tree_html = $helper->renderCategoryTree((int)$root->id, array(), 'categoryBox', false, true);
        }

        $this->context->smarty->assign(
            array(
            'sliders' => $sliders,
            'tpl_path' => _PS_MODULE_DIR_.$this->name.'/views/templates/admin/',
            'languages' => Language::getLanguages(),
            'category_tree' => $tree_html,
            'slider_multilang_btntext' => DealsoftheDayProTool::getmultilangdata('btntext'),
            'slider_multilang_maintext' => DealsoftheDayProTool::getmultilangdata('maintext'),
            'slider_multilang_btnlink' => DealsoftheDayProTool::getmultilangdata('btnlink'),
            'DealsoftheDayProTool' => new DealsoftheDayProTool(),
            'default_currency' => $this->context->currency,
            'tax_enabled' => Configuration::get('PS_TAX'),
            )
        );
        return $this->context->smarty->fetch($this->local_path . 'views/templates/admin/form_incl_all_list.tpl');
    }

    protected function getCurrentShopInfoMsg()
    {
        $shop_info = null;
        if (Shop::getContext() == Shop::CONTEXT_SHOP) {
            $shop_info = sprintf($this->l('Changes will be applied to the shop: %s'), $this->context->shop->name);
        } else {
            if (Shop::getContext() == Shop::CONTEXT_GROUP) {
                $shop_info = sprintf($this->l('Changes will be applied to this group: %s'), Shop::getContextShopGroup()->name);
            } else {
                $shop_info = $this->l('Changes will be applied to all shops');
            }
        }
        return $shop_info;
    }

    // SELECT
    protected function generateProductsOption($categories, $items_to_skip = null)
    {
        $generateProductsOptionResult = array();
        foreach ($categories as $key => $product) {
            if (isset($items_to_skip)) {
                $shop = (object) Shop::getShop((int) $product[ 'id_shop' ]);
                $generateProductsOptionResult[$key] = array('id_product' => (int) $product[ 'id_product' ], 'name' => $product[ 'name' ], 'shopname' => $shop->name);
            }
        }

        return $generateProductsOptionResult;
    }


    // to storefront
    protected function generateProductData($pr_id)
    {
        /*Get more selected products data*/
        $shop_id = (int) $this->context->shop->id;
        $shop_group_id = Shop::getGroupFromShop($shop_id);
        //load Product Class and get more data
        $product = new Product((int)$pr_id, true, (int)$this->context->language->id);
        $linkp = new Link();
        $link = $linkp->getProductLink($product);
        $proddata = (array)$product;
        $proddata['productPrice'] = $product->getPrice(false, null, 6);
        $proddata['productPriceWithoutReduction'] = $product->getPriceWithoutReduct(true, null);
        //$proddata['specificPriceData'] = $product->specificPrice();
        $proddata['plink'] = $link;
        $proddata['id_product'] = (int)$pr_id;
        $proddata['id_image'] = Product::getCover((int)$pr_id)['id_image'];

        if (isset($product->id_category_default) && $product->id_category_default > 1) {
            $defaultcategory = array();
            $defaultcategory = new Category((int)$product->id_category_default);
            if (Validate::isLoadedObject($defaultcategory) || $defaultcategory->active) {
                $proddata['categorydefault'] = $defaultcategory->name['1'];
            }
        }
        return $proddata;
    }

    public function ajaxProcessUpdate()
    {
        $status = Tools::getValue('status');
        $date = Tools::getValue('date');
        $sections = Tools::getValue('id_sections');
        $d_categories = Tools::getValue('d_categories');
        $maincolor = Tools::getValue('maincolor');
        $color1 = Tools::getValue('color1');
        $color2 = Tools::getValue('color2');
        $color3 = Tools::getValue('color3');
        $color4 = Tools::getValue('color4');
        $color5 = Tools::getValue('color5');
        $color6 = Tools::getValue('color6');
        $color7 = Tools::getValue('color7');
        $color8 = Tools::getValue('color8');
        $showcase = Tools::getValue('extra_info');
        $description = Tools::getValue('blurb');
        $slideshow = Tools::getValue('slideshow');
        $offslider = Tools::getValue('offslider');
        $rounded = Tools::getValue('rounded');
        $margin = Tools::getValue('margin');
        $shop_id = (int) $this->context->shop->id;
        $id_slider = Tools::getValue('id_slider');
        $btnlink = $btntext = $maintext = array();
        $languages = Language::getLanguages(false); //$this->context->controller->getLanguages();
        foreach ($languages as $key => $val) {
            $btnlink[$val[ 'id_lang' ]] = Tools::getValue('edit_btnlink_'.(int)$val[ 'id_lang' ]);
            $btntext[$val[ 'id_lang' ]] =  Tools::getValue('edit_btntext_'.(int)$val[ 'id_lang' ]);
            $maintext[$val[ 'id_lang' ]] =  Tools::getValue('edit_maintext_'.(int)$val[ 'id_lang' ]);
            //$logger->logDebug('lang id is '.(int)$val[ 'id_lang' ]);
            //$logger->logDebug(Tools::getValue('edit_btntext_'.(int)$val[ 'id_lang' ]));
        }

        DealsoftheDayProTool::update($status, $btnlink, $btntext, $maintext, $sections, $showcase, 0, $date, 0, 'top', $maincolor, $color1, $color2, $color3, $color4, $color5, $color6, $color7, $color8, $description, $slideshow, $offslider, $rounded, $margin, (int) $shop_id, (int) $id_slider, $d_categories);

        $this->_clearCache('/views/templates/front/dealsofthedaypro.tpl');
    }


    public function ajaxProcessAdd()
    {
        $status = Tools::getValue('status');
        $date = Tools::getValue('date');
        $sections = Tools::getValue('products');
        $maincolor = Tools::getValue('maincolor');
        $color1 = Tools::getValue('color1');
        $color2 = Tools::getValue('color2');
        $color3 = Tools::getValue('color3');
        $color4 = Tools::getValue('color4');
        $color5 = Tools::getValue('color5');
        $color6 = Tools::getValue('color6');
        $color7 = Tools::getValue('color7');
        $color8 = Tools::getValue('color8');
        $showcase = Tools::getValue('extra_info');
        $description = Tools::getValue('blurb');
        $slideshow = Tools::getValue('slideshow');
        $offslider = Tools::getValue('offslider');
        $rounded = Tools::getValue('rounded');
        $margin = Tools::getValue('margin');
        $shop_id = (int) $this->context->shop->id;
        //$id_slider = Tools::getValue('id_slider');
        $d_categories = Tools::getValue('ids_categories');
        $btnlink = $btntext = $maintext = array();
        $languages = Language::getLanguages(false); //$this->context->controller->getLanguages();
        foreach ($languages as $key => $val) {
            $btnlink[$val[ 'id_lang' ]] = Tools::getValue('btnlink_new_'.(int)$val[ 'id_lang' ]);
            $btntext[$val[ 'id_lang' ]] =  Tools::getValue('btntext_new_'.(int)$val[ 'id_lang' ]);
            $maintext[$val[ 'id_lang' ]] =  Tools::getValue('maintext_new_'.(int)$val[ 'id_lang' ]);
            //$logger->logDebug('lang id is '.(int)$val[ 'id_lang' ]);
            //$logger->logDebug(Tools::getValue('btnlink_new_'.(int)$val[ 'id_lang' ]));
        }

        DealsoftheDayProTool::add($status, $btnlink, $btntext, $maintext, $sections, $showcase, 0, $date, 0, 'top', $maincolor, $color1, $color2, $color3, $color4, $color5, $color6, $color7, $color8, $description, $slideshow, $offslider, $rounded, $margin, (int) $shop_id, $d_categories);
        $this->_clearCache('/views/templates/front/dealsofthedaypro.tpl');
    }

    public function ajaxProcessRemove()
    {
        $shop_id = (int) $this->context->shop->id;
        $id_slider = Tools::getValue('id_slider');
        DealsoftheDayProTool::remove((int) $id_slider, (int) $shop_id);
        $this->_clearCache('/views/templates/front/dealsofthedaypro.tpl');
    }


    //products autocomplete search
    public function ajaxProcessGetProducts()
    {
        //administration/ajax_products_list_list.php
        $query = Tools::getValue('q', false);
        if (!$query or $query == '' or Tools::strlen($query) < 1) {
            die();
        }

        if ($pos = strpos($query, ' (ref:')) {
            $query = Tools::substr($query, 0, $pos);
        }

        $excludeIds = Tools::getValue('excludeIds', false);
        if ($excludeIds && $excludeIds != 'NaN') {
            $excludeIds = implode(',', array_map('intval', explode(',', $excludeIds)));
        } else {
            $excludeIds = '';
        }

        $excludeVirtuals = (bool)Tools::getValue('excludeVirtuals', true);
        $exclude_packs = (bool)Tools::getValue('exclude_packs', true);

        $context = Context::getContext();

        $sql =
            'SELECT p.`id_product`, pl.`link_rewrite`, p.`reference`, pl.`name`, p.`cache_default_attribute`
		     FROM `'._DB_PREFIX_.'product` p
             '.Shop::addSqlAssociation('product', 'p').'
		     LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON
		      (pl.id_product = p.id_product
              AND pl.id_lang = '.(int)$context->language->id.Shop::addSqlRestrictionOnLang('pl').')
		     WHERE (pl.name LIKE \'%'.pSQL($query).'%\' OR p.reference LIKE \'%'.pSQL($query).'%\'
		      OR p.`id_product` = '.(int)$query.')'.
            (!empty($excludeIds) ? ' AND p.id_product NOT IN ('.$excludeIds.') ' : ' ').
            ($excludeVirtuals ? 'AND NOT EXISTS
              (SELECT 1 FROM `'._DB_PREFIX_.'product_download` pd WHERE (pd.id_product = p.id_product))' : '').
            ($exclude_packs ? 'AND (p.cache_is_pack IS NULL OR p.cache_is_pack = 0)' : '').
            ' GROUP BY p.id_product';

        $items = Db::getInstance()->executeS($sql);

        if ($items) {
            foreach ($items as $item) {
                echo trim($item['name']).(!empty($item['reference']) ? ' (ref: '.$item['reference'].')' : '').
                    '|'.(int)($item['id_product'])."\n";
            }
        } else {
            //prepare format
            Tools::jsonEncode(new stdClass);
        }
    }


    //category autocomplete search
    public function ajaxProcessGetCategories()
    {
        $query = Tools::getValue('q', false);
        if (!$query or $query == '' or Tools::strlen($query) < 1) {
            die();
        }

        if ($pos = strpos($query, ' (ref:')) {
            $query = Tools::substr($query, 0, $pos);
        }

        $excludeIds = Tools::getValue('excludeIds', false);
        if ($excludeIds && $excludeIds != 'NaN') {
            $excludeIds = implode(',', array_map('intval', explode(',', $excludeIds)));
        } else {
            $excludeIds = '';
        }

        $context = Context::getContext();

        $items = Db::getInstance()->executeS(
            'SELECT c.`id_category`, cl.`name`
    		FROM `'._DB_PREFIX_.'category` c
    		LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON (c.`id_category` = cl.`id_category`'.Shop::addSqlRestrictionOnLang('cl').' AND cl.`id_lang` = '.(int)$context->language->id.')
    		WHERE  cl.`name` LIKE \'%'.pSQL($query).'%\'
    		ORDER BY c.id_category
    		LIMIT 10'
        );

        /*$logger = new FileLogger(0); //0 == debug level, logDebug() won’t work without this.
        $logger->setFilename(_PS_ROOT_DIR_."/log/debug.log");
        $tre = json_encode($items);
        $logger->logDebug($tre);
        $logger->logDebug($textsql);*/

        if ($items) {
            foreach ($items as $item) {
                echo trim($item['name']).'|'.(int)$item['id_category']."\n";
            }
        } else {
            //prepare format
            Tools::jsonEncode(new stdClass);
        }
    }

    public function ajaxProcessGetList()
    {
        die($this->renderFormWithList());
    }

    public function hookDisplayBackOfficeHeader($params)
    {
        $token = Tools::getAdminTokenLite('AdminModules');
        $ajax_url = 'index.php?tab=AdminModules&configure=' . $this->name . '&token=' . $token;
        Media::addJsDef(array('ajax_url' => $ajax_url));
        if (Tools::getValue('configure') == $this->name) {
            $this->context->controller->addJquery();
            //$this->context->controller->addJqueryPlugin('chosen');
            //$this->context->controller->addJqueryPlugin('ui.datepicker');
            $this->context->controller->addJqueryPlugin('colorpicker');
            $this->context->controller->addJS(array($this->_path . 'views/js/adminscript.js'));
            //bootstrapvalidator.min.js older version under MIT
            $this->context->controller->addJS(array($this->_path . 'views/js/bootstrapvalidator.min.js'));
        }
        $this->context->controller->addCSS($this->_path.'views/css/admin.css');
    }

    public function hookActionFrontControllerSetMedia($params)
    {
        //load common style
        $this->context->controller->addCSS($this->_path.'views/css/dealsofthedaypro.css');
        //  if ('index' == $this->context->controller->php_self) {}
        //Media::addJsDef(array('var1' => $is_slideshow_off));
        $this->context->controller->addJqueryPlugin(array('bxslider'));
    }

    protected function getCacheId($name = null, $custom_hook_id_slider = null)
    {
        return parent::getCacheId().'|'.$this->page_name.($this->page_name != 'index' ? '|'.(int)Tools::getValue('id_'.$this->page_name) : '').'|'.$custom_hook_id_slider !== null ? $custom_hook_id_slider : '';
    }

    public function getDisplayrun($params)
    {
        /*TODO custom slider
        $id_products = null;
        if (isset($params['id_products'])) {
            $id_products = $params['id_products'];
            $sliderproducts = explode(',', $id_products);
        }*/
        /*if ('index' != $this->context->controller->php_self and Configuration::get('dealsofthedaypro_homeonly')) {
            return false;
        }*/
        $id_slider = null;
        if (isset($params['id_slider']) && $params['id_slider'] > 0) {
            $custom_hook_id_slider = (int)$params['id_slider'];
        }

        //end custom hook slider
        $current_category = new Category((int)Tools::getValue('id_category'));
        if (!$current_category->is_root_category && !$current_category->getSubCategories($current_category->id, true)) {
            $current_category = new Category((int)$current_category->id_parent, (int)$this->context->language->id);
        }
        $current_category_id = (int)$current_category->id;

        $this->user_groups = ($this->context->customer->isLogged() ? $this->context->customer->getGroups() : array(
          Configuration::get('PS_UNIDENTIFIED_GROUP'),
        ));

        $this->page_name = Dispatcher::getInstance()->getController();
        if (!$this->isCached('/views/templates/front/dealsofthedaypro.tpl', $this->getCacheId())) {
            $shops = Shop::getContextListShopID();
            $id_lang = (int) $this->context->language->id;
            $sliders = array();
            foreach ($shops as $shop_id) {
                $sliders = array_merge($sliders, DealsoftheDayProTool::gets((int) $id_lang, null, (int) $shop_id));
            }
            if (count((array)$sliders)) {
                $root = Category::getRootCategory(); //home
                $root_id = (int)$root->id;
                foreach ($sliders as $key => $slider) {
                    if (isset($custom_hook_id_slider) and $slider['id_displaydealsofthedaypro_sliders'] == $custom_hook_id_slider) {
                        $sliders[$key]['display_custom_hook'] = '1';
                    }
                    $sliders[$key]['maincolor_rgb'] = $this->hexToRgb($slider['maincolor']);
                    $sliderproducts = explode(',', $slider['sections']);
                    $sliders[$key]['display_cat'] = explode(',', $slider['d_categories']);
                    if (in_array($root_id, explode(',', $slider['d_categories']))) {
                        $sliders[$key]['home_visible'] = '1';
                    }
                    foreach ($sliderproducts as $pkey => $product_id) {
                        $product = $this->generateProductData((int)$product_id);
                        $sliders[$key]['products'][] = $product;
                    }
                    $expired = '';
                    $old_date_timestamp = strtotime($slider['date']); //30-03-2017 04:06:00
                    $expiry_date =  $slider['date'];
                    $nowdate = new DateTime(date("Y-m-d H:i:s"));
                    $expiry_date_f = date('F d, Y H:i:s', $old_date_timestamp); // formated for js 31 March 17 21:43:00
                    if (strtotime($expiry_date) < strtotime($nowdate->format('Y-m-d H:i:s'))) {
                        $expired = 1;
                    }
                    $sliders[$key]['exp_date'] = $expiry_date_f;
                    $sliders[$key]['expired'] = $expired;
                }
            }
            $this->smarty->assign('sliders', $sliders);
            $id_lang = $this->context->cart->id_lang;
            $id_category = (int) Tools::getValue('id_category');
            $this->category = new Category(
                $id_category,
                $this->context->language->id
            );
            //assign config to smarty vars
            $this->smarty->assign(
                array(
                  'category' => $this->category,
                  'id_category' => (int)$this->category->id,
                  'id_category_parent' => (int)$this->category->id_parent,
                  'dealsofthedaypro_hookposition' => Configuration::get('dealsofthedaypro_hookposition'),
                  'currency' => $this->context->currency,
                )
            );
            //assign imagesize
            $this->smarty->assign(
                array(
                      //'new_products' => BlockNewProducts::$cache_new_products,
                      'mediumSize' => Image::getSize(ImageType::getFormatedName('medium')),
                      'homeSize' => Image::getSize(ImageType::getFormatedName('home'))
                )
            );
            //$this->smarty->assign('this_category', (int) Tools::getValue('id_product'));
            $this->smarty->assign('this_path', $this->_path);
        }
        //fetch template
        $tmplate = $this->display(__FILE__, '/views/templates/front/dealsofthedaypro.tpl', $this->getCacheId());
        return $tmplate;
    }

    public function hookdisplayDealsOftheDayPro($params)
    {
        // custom add {hook h="displayDealsOftheDayPro"} into your theme tpl files
        // for example line 28 in /themes/classic/templates/catalog/listing/category.tpl */
        //if (Configuration::get('dealsofthedaypro_hookposition') == 'custom') {
            return $this->getDisplayrun($params);
        //}
    }

    //home for 1.6.20
    public function hookDisplayTopColumn($params)
    {
        if (Configuration::get('dealsofthedaypro_hookposition') == 'top'  and 'index' == $this->context->controller->php_self) {
            return $this->getDisplayrun($params);
        }
    }

    //home for 1.7
    public function hookDisplayHomeTop($params)
    {
        if (Configuration::get('dealsofthedaypro_hookposition') == 'top' and 'index' == $this->context->controller->php_self) {
            return $this->getDisplayrun($params);
        }
    }

    /*public function hookDisplayTop($params)
    {
        if (Configuration::get('dealsofthedaypro_hookposition') == 'top' and 'index' != $this->context->controller->php_self) {
            return $this->getDisplayrun($params);
        }
    }*/

    public function hookDisplayWrapperTop($params)
    {
        if (Configuration::get('dealsofthedaypro_hookposition') == 'top' and 'index' != $this->context->controller->php_self) {
            return $this->getDisplayrun($params);
        }
    }

    public function hookDisplayContentWrapperTop($params)
    {
        if (Configuration::get('dealsofthedaypro_hookposition') == 'contenttop') {
            return $this->getDisplayrun($params);
        }
    }

    protected function clearMenuCache()
    {
        $this->_clearCache('/views/templates/front/dealsofthedaypro.tpl');
        //Tools::clearCache();
        //Tools::clearSmartyCache();
    }

    //clean module cache if some data changed in store
    public function hookActionObjectCategoryUpdateAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectCategoryDeleteAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectSupplierUpdateAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectSupplierDeleteAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectManufacturerUpdateAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectManufacturerDeleteAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectManufacturerAddAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectProductUpdateAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectProductDeleteAfter($params)
    {
        $this->clearMenuCache();
    }
    //end clean cache functions
    protected function renderHowto()
    {
        /*$this->context->smarty->assign(array('somedata' => $this->getSomeData()));*/
        return $this->context->smarty->fetch($this->local_path . 'views/templates/admin/howto.tpl');
    }



    public function renderForm()
    {
        $shops = Shop::getContextListShopID();
        $shop_id = (int) Shop::getContextShopID(); //(int) $shops[ 0 ];
        $positions_link = 'index.php?tab=AdminModulesPositions&token='.Tools::getAdminTokenLite('AdminModulesPositions').'&show_modules='.(int)$this->id;

        $fields_form = array(
          'form' => array(
            'legend' => array(
              'title' => $this->l('Display to Hook'),
              'icon' => 'icon-link',
            ),
            'input' => array(
              array(
                'col' => 3,
                'type' => 'select',
                'prefix' => '<i class="icon icon-tag"></i>',
                'name' => 'dealsofthedaypro_hookposition',
                'label' => $this->l('Hook Position'),
                'desc' => $this->l('Select hook to display. DisplayTop is recommended!'),
                'hint'  => $this->l("Insert anywhere manually with {hook h='displayDealsOftheDayPro' id_slider=X} "),
                'options' => array(
                  'query' => array(
                    array(
                      'id_dealsofthedaypro_hookposition' => 'contenttop',
                      'name' => $this->l('CenterColumn')
                    ),
                    array(
                      'id_dealsofthedaypro_hookposition' => 'top',
                      'name' => $this->l('DisplayTop')
                    )
                  ),
                  'id' => 'id_dealsofthedaypro_hookposition',
                  'name' => 'name'
                )
              ),
            ),
            'submit' => array(
              'name' => 'submitdealsofthedaypro',
              'title' => $this->l('Save'),
            ),
          ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int) Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG')
        ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();
        $helper->module = $this;
        $helper->identifier = $this->identifier;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
          'fields_value' => $this->getConfigFieldsValues(),
          'languages' => $this->context->controller->getLanguages(),
          'id_language' => $this->context->language->id,
          'color' => true,
        );

        return $helper->generateForm(
            array(
            $fields_form,
            )
        );
    }

    public function getConfigFieldsValues()
    {
        $shops = Shop::getContextListShopID();
        $languages = Language::getLanguages(false);// true to use disabled languages
        $fields = array();

        return array(
          'dealsofthedaypro_hookposition' => Tools::getValue('dealsofthedaypro_hookposition', Configuration::get('dealsofthedaypro_hookposition')),
        );
    }
}
