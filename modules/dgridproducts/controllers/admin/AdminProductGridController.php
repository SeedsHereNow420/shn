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

if (!class_exists('TransModDGP')) {
    require_once(_PS_MODULE_DIR_.'dgridproducts/classes/TransModDGP.php');
}
if (!class_exists('DGridTools')) {
    require_once(_PS_MODULE_DIR_.'dgridproducts/classes/DGridTools.php');
}

if (version_compare(_PS_VERSION_, '1.6', '<')) {
    require_once(_PS_MODULE_DIR_ . 'dgridproducts/classes/CustomizationField.php');
}

class AdminProductGridController extends ModuleAdminController
{
    public $id_current_category;

    protected $ids_category;
    protected $search_query;
    protected $type_search = 0;
    protected $product_name_type_search = 'exact_match';
    protected $search_manufacturers;
    protected $search_suppliers;
    protected $active = 0;
    protected $disable = 0;
    protected $qty_from;
    protected $qty_to;
    protected $price_from;
    protected $price_to;
    protected $_default_pagination = 50;

    public function __construct()
    {
        $this->table = 'product';
        $this->identifier = 'id_product';
        $this->className = 'Product';
        $this->lang = true;
        $this->bootstrap = true;
        $this->display = 'list';

        parent::__construct();

        if (!Tools::getValue('id_product')) {
            $this->multishop_context_group = false;
        }

        $reset_filter_category = false;
        $reset_filter_category = Tools::getValue('reset_filter_category');

        $quick_product = false;
        if (Tools::isSubmit('quick_product')) {
            $quick_product = (int)Tools::getValue('quick_product');
            $reset_filter_category = true;
            $this->filter = true;
            ${'_POST'}['productFilter_id_product'] = $quick_product;
            ${'_POST'}['submitFilter'] = true;
        }

        $this->id_current_category = false;

        if ($reset_filter_category) {
            $this->context->cookie->id_category_products_filter = false;
        }

        if (Shop::isFeatureActive() && $this->context->cookie->id_category_products_filter) {
            $category = new Category((int)$this->context->cookie->id_category_products_filter);
            if (!$category->inShop()) {
                $this->context->cookie->id_category_products_filter = false;
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminProducts'));
            }
        }

        /* Join categories table */
        if ($id_category = (int)Tools::getValue('productFilter_cl!name')) {
            $this->_category = new Category((int)$id_category);

            $_POST['productFilter_cl!name'] = $this->_category->name[$this->context->language->id];
        } else {
            if ($id_category = (int)Tools::getValue('id_category')) {
                $this->id_current_category = $id_category;
                $this->context->cookie->id_category_products_filter = $id_category;
            }

            if ($this->id_current_category) {
                $this->_category = new Category((int)$this->id_current_category);
            } else {
                $this->_category = new Category();
            }
        }

        $join_category = false;
        if (Validate::isLoadedObject($this->_category) && empty($this->_filter)) {
            $join_category = true;
        }

        $id_shop = Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP
            ? (int)$this->context->shop->id : 'a.id_shop_default';
        $this->_join .= '
        LEFT JOIN `'._DB_PREFIX_.'stock_available` sav ON (sav.`id_product` = a.`id_product` 
            AND sav.`id_product_attribute` = 0
            '.StockAvailable::addSqlShopRestriction(null, null, 'sav').')
        JOIN `'._DB_PREFIX_.'product_shop` sa ON (a.`id_product` = sa.`id_product` AND sa.id_shop = a.id_shop_default)
        LEFT JOIN `'._DB_PREFIX_.'category_lang` cl
         ON (sa.`id_category_default` = cl.`id_category` AND b.`id_lang` = cl.`id_lang` 
            AND cl.id_shop = a.id_shop_default)
        LEFT JOIN `'._DB_PREFIX_.'shop` shop ON (shop.id_shop = a.id_shop_default)
        '.(version_compare(_PS_VERSION_, '1.6.1.0', '>=') ?
                'LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
         ON (image_shop.`id_product` = a.`id_product` AND image_shop.`cover` = 1 
            AND image_shop.id_shop = a.id_shop_default)' : ''
            ).'
        LEFT JOIN `'._DB_PREFIX_.'image` i ON '.(version_compare(_PS_VERSION_, '1.6.1.0', '>=') ?
                '(i.`id_image` = image_shop.`id_image`)' : '(i.`id_product` = a.`id_product`)').' 
        '.(version_compare(_PS_VERSION_, '1.6.1.0', '<') ?
                'LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
           ON (image_shop.`id_image` = i.`id_image` AND image_shop.`cover` = 1 
            AND image_shop.id_shop = '.pSQL($id_shop).')' : '').'
        LEFT JOIN `'._DB_PREFIX_.'product_download` pd ON (pd.`id_product` = a.`id_product`)';

        $this->_select .= '`reference`, sa.`active` AS `active`, shop.`name` AS `shopname`, a.`id_product` as `id`,
        '.(version_compare(_PS_VERSION_, '1.6.1.0', '>=') ? 'image_shop.`id_image`' : 'MAX(image_shop.`id_image`)').' AS `id_image`,
         cl.`name` AS `name_category`, sa.`price`, 0 AS `price_final`, 
        pd.`nb_downloadable`, sav.`quantity` AS `sav_quantity`, sa.`active`,
        IF(sav.`quantity`<=0, 1, 0) AS `badge_danger`';

        if (version_compare(_PS_VERSION_, '1.6.1.0', '<')) {
            $this->_group = 'GROUP BY sa.`id_product`';
        }

        if ($join_category) {
            $this->_join .= '
            INNER JOIN `'._DB_PREFIX_.'category_product` cp ON (cp.`id_product` = a.`id_product` 
            AND cp.`id_category` = '.(int)$this->_category->id.')';
        }

        if (Tools::getValue('refilters')) {
            $this->processResetFilters();
            $this->_default_pagination = (int)Tools::getValue('how_many_show');
            $this->_pagination = array(20, 50, 100, 300);
        }

        if ($this->ids_category = Tools::getValue('categories')) {
//            d(Tools::getValue('search_default_categories'));
            if (Tools::getValue('search_default_categories')) {
                $this->_where .= ' AND a.`id_category_default` IN('.pSQL($this->ids_category).')';
            } else {
                $this->_join .= '
                INNER JOIN `' . _DB_PREFIX_ . 'category_product` cp
                ON (cp.`id_product` = a.`id_product` AND cp.`id_category` IN('.pSQL($this->ids_category).'))';
            }
            $this->_group = ' GROUP BY a.`id_product`';
        }

        if (Tools::getValue('search_query')) {
            $this->search_query = Tools::getValue('search_query');
            $this->type_search = Tools::getValue('type_search');
            $this->product_name_type_search = Tools::getValue('product_name_type_search');
            switch ($this->type_search) {
                case 0:
                    $column = 'b.`name`';
                    break;
                case 1:
                    $column = 'a.`id_product`';
                    break;
                case 2:
                    $column = 'a.`reference`';
                    break;
                case 3:
                    $column = 'a.`ean13`';
                    break;
                case 4:
                    $column = 'a.`upc`';
                    break;
                case 5:
                    $column = 'b.`description`';
                    break;
                case 6:
                    $column = 'b.`description_short`';
                    break;
                default:
                    $column = 'b.`name`';
            }

            if ($this->product_name_type_search == 'exact_match') {
                $this->_where .= ' AND '.$column.' = "'.pSQL($this->search_query).'"';
            } else {
                $this->_where .= ' AND '.$column.' LIKE "%'.pSQL($this->search_query).'%"';
            }
        }

        if (Tools::getValue('manufacturers')) {
            $this->search_manufacturers = Tools::getValue('manufacturers');
            if (Tools::strrpos($this->search_manufacturers, ',', 1)) {
                $this->_where .= ' AND a.`id_manufacturer` IN ('.pSQL($this->search_manufacturers).')';
            } else {
                $this->_where .= ' AND a.`id_manufacturer` = '.(int)$this->search_manufacturers;
            }
        }

        if (Tools::getValue('suppliers')) {
            $this->search_suppliers = Tools::getValue('suppliers');
            if (Tools::strrpos($this->search_suppliers, ',', 1)) {
                $this->_where .= ' AND a.`id_supplier` IN ('.pSQL($this->search_suppliers).')';
            } else {
                $this->_where .= ' AND a.`id_supplier` = '.(int)$this->search_suppliers;
            }
        }

        if (Tools::getValue('qty_from')) {
            $this->qty_from = Tools::getValue('qty_from');
            $this->_where .= ' AND sav.`quantity` >= '.(int)$this->qty_from;
        }

        if ($qty_to = Tools::getValue('qty_to')) {
            $this->qty_to = $qty_to = Tools::getValue('qty_to');
            $this->_where .= ' AND sav.`quantity` <= '.(int)$qty_to;
        }

        if (Tools::getValue('price_from')) {
            $this->price_from = Tools::getValue('price_from');
            $this->_where .= ' AND a.`price` >= '.(int)$this->price_from;
        }

        if ($price_to = Tools::getValue('price_to')) {
            $this->price_to = $price_to = Tools::getValue('price_to');
            $this->_where .= ' AND a.`price` <= '.(int)$price_to;
        }

        if (Tools::getValue('active') == 1 && Tools::getValue('disable') == 0) {
            $this->active = 1;
            $this->_where .= ' AND sa.`active` = 1';
        }

        if (Tools::getValue('active') == 0 && Tools::getValue('disable') == 1) {
            $this->disable = 1;
            $this->_where .= ' AND sa.`active` = 0';
        }

        $order_by = Tools::getValue('order_by');
        $order_way = Tools::getValue('order_way');
        if ($order_by && $order_way) {
            switch ($order_by) {
                case 'id_product':
                    $this->_orderBy = 'a.id_product';
                    break;
                case 'name':
                    $this->_orderBy = 'b.name';
                    break;
                case 'name_category':
                    $this->_orderBy = 'cl.id_category';
                    break;
                case 'reference':
                    $this->_orderBy = 'a.reference';
                    break;
                case 'ean13':
                    $this->_orderBy = 'a.ean13';
                    break;
                case 'upc':
                    $this->_orderBy = 'a.upc';
                    break;
                case 'price':
                    $this->_orderBy = 'sa.price';
                    break;
                case 'sav_quantity':
                    $this->_orderBy = 'sav.quantity';
                    break;
            }

            $this->_orderWay = $order_way;
        }

        $this->fields_list = DGridTools::getVisibleColumnList();

        $this->addRowAction('delete');
        $this->addRowAction('duplicate');

        $this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'),
            'confirm' => $this->l('Would you like to delete the selected items?')));
        $this->registerSmartyFunctions();
    }

    public function initProcess()
    {
        if (Tools::isSubmit('statusproduct')) {
            $product = new Product(Tools::getValue('id_product'));
            $this->updateObjectField('Product', 'active', $product->id, ($product->active ? false : true));
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminProductGrid', true));
        }

        if (Tools::isSubmit('duplicateproduct')) {
            $controller = new AdminProductsController();
            $controller->processDuplicate();
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminProductGrid', true));
        }

        return parent::initProcess();
    }

    public function getList(
        $id_lang,
        $order_by = null,
        $order_way = null,
        $start = 0,
        $limit = null,
        $id_lang_shop = false
    ) {
        unset($id_lang_shop);
        parent::getList($id_lang, $order_by, $order_way, $start, $limit, $this->context->shop->id);
        $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
        $address = new Address();
        $address->id_country = $country->id;

        foreach ($this->_list as &$item) {
            $tax_manager = TaxManagerFactory::getManager(
                $address,
                Product::getIdTaxRulesGroupByIdProduct((int)$item['id_product'], $this->context)
            );
            $product_tax_calculator = $tax_manager->getTaxCalculator();
            $item['price_final'] = $product_tax_calculator->addTaxes($item['price']);
            $item['price_no_format'] = $item['price'];
            $item['price_final_no_format'] = $item['price_final'];
            $item['rate'] = $tax_manager->getTaxCalculator()->getTotalRate();
            $item['depends_on_stock'] = StockAvailable::dependsOnStock((int)$item['id_product']);

            $specific_price = SpecificPrice::getIdsByProductId($item['id_product']);

            $specific_price_group = SpecificPrice::getSpecificPrice(
                $item['id_product'],
                $this->context->shop->id,
                0,
                0,
                0,
                1
            );

            $item['has_specific_price'] = ($specific_price ? true : false);
            $item['count_specific_price'] = count($specific_price);
            $item['has_group_specific_price'] = ($specific_price_group && !$specific_price ? true : false);
            $item['total_price'] = Product::getPriceStatic($item['id_product'], true, 0);

            foreach ($item as $key => $field) {
                //Fix for validation prestashop
                unset($field);
                $field2 = '';
                print $field2;
                if (isset($this->fields_list[$key])
                    && isset($this->fields_list[$key]['lang']) && $this->fields_list[$key]['lang']) {
                    $result = Db::getInstance()->executeS(
                        'SELECT `'.$this->fields_list[$key]['field'].'`, `id_lang` FROM '.
                        _DB_PREFIX_.$this->fields_list[$key]['table']
                        .' WHERE id_product = '.(int)$item['id_product']
                        .' AND id_shop = '.(int)$this->context->shop->id
                    );
                    foreach ($result as $lang_item) {
                        $item[$key.'_lang'][$lang_item['id_lang']] = $lang_item[$this->fields_list[$key]['field']];
                    }
                }
            }
        }
    }

    public function renderList()
    {
        $this->context->controller->addJqueryUI('ui.widget');
        $this->context->controller->addJqueryPlugin('typewatch');
        $this->context->controller->addJqueryPlugin('tagify');
        $this->context->controller->addJqueryPlugin('chosen');
        $this->context->controller->addJqueryPlugin('autocomplete');
        $this->context->controller->addJqueryPlugin('tablednd');
        $this->context->controller->addCSS(_MODULE_DIR_.'dgridproducts/views/css/style.css');
        $this->context->controller->addCSS(_MODULE_DIR_.'dgridproducts/views/css/drag_option.css');
        $this->context->controller->addCSS(_MODULE_DIR_.'dgridproducts/views/css/admin.css');
        $this->context->controller->addCSS(_MODULE_DIR_.'dgridproducts/views/css/select2.min.css');
        $this->context->controller->addJS(_MODULE_DIR_.'dgridproducts/views/js/drag_option.js');
        $this->context->controller->addJS(_MODULE_DIR_.'dgridproducts/views/js/images.js');
        $this->context->controller->addJS(_MODULE_DIR_.'dgridproducts/views/js/dgridproducts.js');
        $this->context->controller->addJS(_MODULE_DIR_.'dgridproducts/views/js/tree_custom.js');
        $this->context->controller->addJS(_MODULE_DIR_.'dgridproducts/views/js/vendor/select2.min.js');
        if (version_compare(_PS_VERSION_, '1.6', '<')) {
            $this->context->controller->addJS(_MODULE_DIR_.'dgridproducts/views/js/bootstrap-dropdown.js');
            $this->context->controller->addJS(_MODULE_DIR_.'dgridproducts/views/js/fix_confirm_link15.js');
        }
        $this->context->controller->addJS(_MODULE_DIR_.'dgridproducts/views/js/typeahead.min.js');
        $this->context->controller->addJS(_MODULE_DIR_.'dgridproducts/views/js/admin.js');

        $this->context->controller->addJS(_PS_JS_DIR_.'price.js');
        $this->context->controller->addJS(_PS_JS_DIR_.'tiny_mce/tiny_mce.js');
        $this->context->controller->addJS(_PS_JS_DIR_.'tinymce.inc.js');
        $this->context->controller->addJS(_PS_JS_DIR_.'admin/tinymce.inc.js');
        $this->context->controller->addJS(_PS_JS_DIR_.'admin/dnd.js');

        if ((float)_PS_VERSION_ < 1.6) {
            $this->context->controller->addJqueryUI('ui.datepicker');
            $this->context->controller->addJS(_PS_JS_DIR_.'jquery/plugins/timepicker/jquery-ui-timepicker-addon.js');
            $this->context->controller->addCSS(_PS_JS_DIR_.'jquery/plugins/timepicker/jquery-ui-timepicker-addon.css');

            $this->context->controller->addCSS(_MODULE_DIR_.'dgridproducts/views/css/admin-theme.css');
            $this->context->controller->addCSS(_MODULE_DIR_.'dgridproducts/views/css/admin-theme2.css');
            $this->context->controller->addCSS(_MODULE_DIR_.'dgridproducts/views/css/font-awesome.min.css');
            $this->context->controller->addJS(_MODULE_DIR_.'dgridproducts/views/js/tree.js');
            $this->context->controller->addJS(_MODULE_DIR_.'dgridproducts/views/js/typeahead.min.js');
        }

        if (_PS_VERSION_ < 1.6) {
            $search_link = 'searchcron.php?full=0&token='.Tools::substr(_COOKIE_KEY_, 34, 8).'&redirect=1';
        } else {
            $search_link = 'searchcron.php?full=0&token='.Tools::substr(_COOKIE_KEY_, 34, 8).'&redirect=1'
                .(Shop::getContext() == Shop::CONTEXT_SHOP
                    ? '&id_shop='.(int)Context::getContext()->shop->id : '');
        }

        $input_product_name_type_search = array(
            'name' => 'product_name_type_search',
            'values' => array(
                array(
                    'id' => 'exact_match',
                    'text' => $this->l('Exact match')
                ),
                array(
                    'id' => 'occurrence',
                    'text' => $this->l('Search for occurrence')
                )
            ),
            'default_id' => $this->product_name_type_search,

        );

        $config = Tools::jsonDecode(Configuration::get('SEOSA_DGRID_COLUMN'));

        $this->context->smarty->assign(array(
            'how_many_show' => $this->_default_pagination,
            'qty_to' => $this->qty_to,
            'qty_from' => $this->qty_from,
            'price_to' => $this->price_to,
            'price_from' => $this->price_from,
            'active' => $this->active,
            'disable' => $this->disable,
            'type_search' => $this->type_search,
            'search_query' => $this->search_query,
            'selected_categories' => explode(',', $this->ids_category),
            'input_product_name_type_search' => $input_product_name_type_search,
            'manufacturers' => Manufacturer::getManufacturers(false, 0, false),
            'search_manufacturers' => explode(',', $this->search_manufacturers),
            'suppliers' => Supplier::getSuppliers(false, 0, false),
            'search_suppliers' => explode(',', $this->search_suppliers),
            'default_lang' => $this->context->language,
            'languages' => Language::getLanguages(),
            'currencySign' => $this->context->currency->sign,
            'currencyRate' => $this->context->currency->conversion_rate,
            'currencyFormat' => (version_compare(_PS_VERSION_, '1.7.0.0', '<')
                ? $this->context->currency->format : 2),
            'currencyBlank' => $this->context->currency->blank,
            'ps_v' => _PS_VERSION_,
            'shop_active' => Shop::isFeatureActive(),
            'search_link' => $search_link,
            'ad' => __PS_BASE_URI__.basename(_PS_ADMIN_DIR_),
            'lenght_short_desc' => $config->lenght_short_desc,
            'lenght_desc' => $config->lenght_desc
        ));

        if (_PS_VERSION_ > 1.6) {
            $this->context->controller->addCSS($this->module->getPathURI().'views/css/admin-theme1_7.css');
        }

        $this->tpl['link_on_tab_module'] = $this->module->getDocumentationLinks();
        return $this->module->getDocumentationLinks().parent::renderList();
    }

    public function renderForm()
    {
        $product = new Product();
        foreach ($this->getLanguages() as $l) {
            $product->name[$l['id_lang']] = $this->l('Name product');
            $product->link_rewrite[$l['id_lang']] = md5(time());
        }
        $product->price = 0;
        $product->save();
        Tools::redirectAdmin($this->context->link->getAdminLink('AdminProductGrid')
            .'&quick_product='.$product->id);
    }

    public function displayErrors()
    {
    }

    public function ajaxProcessSaveField()
    {
        $table = Tools::getValue('table');
        if (strpos($table, ',')) {
            $table = explode(',', $table);
        }
        $id = Tools::getValue('id');
        $name = Tools::getValue('name');
        $lang = Tools::getValue('lang');
        $id_lang = Tools::getValue('id_lang');
        $value = Tools::getValue('value');
        $criterion = Tools::getValue('criterion');
        $shop = (int)Tools::getValue('shop');

        if ($criterion == 'id_specific_price') {
            $this->updateObjectField('SpecificPrice', $name, $id, $value);
            $specific_price = new SpecificPrice($id);
            die(Tools::jsonEncode(array(
                'hasError' => false,
                'product_final_price' => Product::getPriceStatic($specific_price->id_product, true, null)
            )));
        }

        $id_product = null;
        if ($criterion == 'id_product_attribute') {
            $id_product = Db::getInstance()->getValue(
                'SELECT id_product FROM '._DB_PREFIX_.'product_attribute WHERE id_product_attribute = '.(int)$id
            );
        }

        if (!in_array($criterion, array('id_product', 'id_product_attribute'))) {
            $criterion = 'id_product';
        }

        if ($name == 'price_final' && $criterion == 'id_product') {
            $rate = 0;
            if ((int)Configuration::get('PS_TAX')) {
                $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
                $address = new Address();
                $address->id_country = $country->id;
                $tax_manager = TaxManagerFactory::getManager(
                    $address,
                    Product::getIdTaxRulesGroupByIdProduct((int)$id, $this->context)
                );
                $rate = $tax_manager->getTaxCalculator()->getTotalRate();
            }
            $name = 'price';
            $value = ($value / (100 + $rate) * 100);
        }

        if ($name == 'price_final' && $criterion == 'id_product_attribute') {
            $rate = 0;
            $id_product = Db::getInstance()->getValue(
                'SELECT id_product FROM '._DB_PREFIX_.'product_attribute WHERE id_product_attribute = '.(int)$id
            );
            if ((int)Configuration::get('PS_TAX') && $id_product) {
                $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
                $address = new Address();
                $address->id_country = $country->id;
                $tax_manager = TaxManagerFactory::getManager(
                    $address,
                    Product::getIdTaxRulesGroupByIdProduct((int)$id_product, $this->context)
                );
                $rate = $tax_manager->getTaxCalculator()->getTotalRate();
            }
            $name = 'price';
            $value = ($value / (100 + $rate) * 100);
        }

        if ($name == 'desired' && $criterion == 'id_product_attribute') {
            $combination = new Combination($id);
            $product = new Product($combination->id_product);
            $tax_rate = Tax::getProductTaxRate($product->id);
            $name = 'price';
            $price_final = ($value - $product->price * (1 + $tax_rate/100));

            $value = ($price_final *100) / (100 + $tax_rate);
        }

        if (method_exists($this, 'saveField'.Tools::toCamelCase($name))) {
            return call_user_func(
                array($this, 'saveField'.Tools::toCamelCase($name)),
                array(
                    'table' => $table,
                    'id' => $id,
                    'name' => $name,
                    'lang' => $lang,
                    'id_lang' => $id_lang,
                    'value' => $value,
                    'criterion' => $criterion,
                    'shop' => $shop
                )
            );
        }

        $id_shop = (int)$this->context->shop->id;

        if ($name == 'default_on' && $criterion == 'id_product_attribute') {
            $id_product = Db::getInstance()->getValue('SELECT paC.`id_product`
                FROM '._DB_PREFIX_.'product_attribute paC
                WHERE paC.`id_product_attribute` = '.(int)$id);

            Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'product_attribute pa
            INNER JOIN '._DB_PREFIX_.'product_attribute_shop pas
             ON pas.`id_product_attribute` = pa.`id_product_attribute`
             AND pas.`id_shop` = '
                .(int)$this->context->shop->id.'
            SET '.(Shop::isFeatureActive() && $shop && $this->context->shop->getContext() !== Shop::CONTEXT_ALL
                    ? '' : 'pa.`default_on` = NULL,')
                .' pas.`default_on` = NULL
            WHERE pa.`id_product` = '.(int)$id_product);
        }

        if (!is_array($table)) {
            Db::getInstance()->update($table, array(
                $name => pSQL($value)
            ), ' '.$criterion.' = '.(int)$id.((int)$lang ? ' AND id_lang  = '.(int)$id_lang : '')
                .(Shop::isFeatureActive() && $shop && $this->context->shop->getContext() !== Shop::CONTEXT_ALL
                    ? ' AND id_shop = '.(int)$id_shop : ''));
        } else {
            foreach ($table as $t) {
                Db::getInstance()->update(
                    $t,
                    array(
                        $name => pSQL($value)
                    ),
                    ' '.$criterion.' = '.(int)$id.((int)$lang ? ' AND id_lang  = '.(int)$id_lang : '')
                    .(Shop::isFeatureActive() && $shop && $this->context->shop->getContext() !== Shop::CONTEXT_ALL
                    ? ' AND id_shop = '.(int)$id_shop : '')
                );
            }
        }

        if ($criterion == 'id_product') {
            $this->updateObjectField('Product', 'date_upd', $id, date('Y-m-d H:i:s'));
            Search::indexation(false, $id);
        }

        if ($criterion == 'id_product_attribute') {
            Search::indexation(false, $id_product);
        }

        if (Configuration::get('PS_TAX')) {
            $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
            $address = new Address();
            $address->id_country = $country->id;
            $tax_manager = TaxManagerFactory::getManager(
                $address,
                Product::getIdTaxRulesGroupByIdProduct((int)$id_product, $this->context)
            );
            //$product_rate = $tax_manager->getTaxCalculator()->getTotalRate();
        }

        if (!$id_product) {
            $id_product = Db::getInstance()->getValue('SELECT id_product FROM '
                ._DB_PREFIX_.'product_attribute WHERE id_product_attribute = '.(int)$id);
        }

        die(Tools::jsonEncode(array(
            'hasError' => false,
            'product_final_price' => Product::getPriceStatic($id_product, true, $id)
        )));
    }


    public function saveFieldQuantity($params)
    {
        if ($params['criterion'] == 'id_product_attribute') {
            $id_product = Db::getInstance()->getValue('SELECT paC.`id_product`
                FROM '._DB_PREFIX_.'product_attribute paC
                WHERE paC.`id_product_attribute` = '.(int)$params['id']);
            StockAvailable::setQuantity($id_product, (int)$params['id'], (int)$params['value']);
            Search::indexation(false, $id_product);
        } else {
            StockAvailable::setQuantity((int)$params['id'], 0, (int)$params['value']);
            Search::indexation(false, (int)$params['id']);
        }

        if ($params['criterion'] == 'id_product') {
            $this->updateObjectField('Product', 'date_upd', $params['id'], date('Y-m-d H:i:s'));
        }
    }

    public function ajaxProcessSaveCategories()
    {
        $category_box = Tools::getValue('categoryBox');
        $id_category_default = Tools::getValue('id_category_default');
        $id_product = Tools::getValue('id_product');
        $product = new Product($id_product);

        if (!$id_category_default) {
            die(Tools::jsonEncode(array(
                'hasError' => true,
                'error' => $this->l('Default category not selected')
            )));
        }

        if (Validate::isLoadedObject($product)) {
            $product->updateCategories($category_box);
            $this->updateObjectField('Product', 'id_category_default', $product->id, (int)$id_category_default);
            Search::indexation(false, $product->id);
            die(Tools::jsonEncode(array(
                'hasError' => false
            )));
        }
    }

    public function ajaxProcessGetCombinations()
    {
        $id_product = Tools::getValue('id_product');
        if (!$id_product) {
            die(Tools::jsonEncode(array(
                'hasError' => true
            )));
        }

        $data = $this->getHtmlCombinationsAndImagesByProduct($id_product);

        $product_rate = 0;

        if (Configuration::get('PS_TAX')) {
            $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
            $address = new Address();
            $address->id_country = $country->id;
            $tax_manager = TaxManagerFactory::getManager(
                $address,
                Product::getIdTaxRulesGroupByIdProduct((int)$id_product, $this->context)
            );
            $product_rate = $tax_manager->getTaxCalculator()->getTotalRate();
        }

        die(Tools::jsonEncode(array(
            'hasError' => false,
            'images' => $data['images'],
            'content' => $data['content'],
            'product_price' => Product::getPriceStatic($id_product, true, null, 6, null, false, false),
            'product_rate' => $product_rate
        )));
    }

    public function getHtmlCombinationsAndImagesByProduct($id_product)
    {
        $ids_shop = Shop::getContextListShopID();
        $product = new Product($id_product, false, $this->context->language->id);
        $combinations = Db::getInstance()->executeS('SELECT pa.`id_product_attribute`,
        pa.`id_product`, pa.`reference`, pa.`ean13`, pa.`upc`,
         pas.`wholesale_price`, pas.`price`, pas.`weight`, sa.`quantity`, pas.`default_on`,
        pas.`available_date`
        FROM '._DB_PREFIX_.'product_attribute pa
        INNER JOIN '._DB_PREFIX_.'product_attribute_shop pas
        ON pa.`id_product_attribute` = pas.`id_product_attribute` AND pas.`id_shop` IN('.(
            count($ids_shop) ?
            implode(',', array_map('intval', $ids_shop)) :
                'NULL'
        ).') 
        LEFT JOIN '._DB_PREFIX_.'stock_available sa
        ON sa.`id_product_attribute` = pa.`id_product_attribute`
        '.StockAvailable::addSqlShopRestriction(null, null, 'sa').'
        WHERE pa.`id_product` = '.(int)$id_product.' GROUP BY pa.`id_product_attribute`');

        $rate = 0;
        if ((int)Configuration::get('PS_TAX')) {
            $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
            $address = new Address();
            $address->id_country = $country->id;
            $tax_manager = TaxManagerFactory::getManager(
                $address,
                Product::getIdTaxRulesGroupByIdProduct((int)$id_product, $this->context)
            );
            $rate = $tax_manager->getTaxCalculator()->getTotalRate();
        }

        foreach ($combinations as &$pa) {
            $attributes = Product::getAttributesParams($pa['id_product'], $pa['id_product_attribute']);
            $name_attributes = array();
            foreach ($attributes as $a) {
                $name_attributes[] = $a['group'].' : '.$a['name'];
            }
            $pa['attributes'] = implode(', ', $name_attributes);
            $pa['price_final'] = $pa['price'] + ($pa['price'] * $rate / 100);

            $pa['price_no_format'] = $pa['price'];
            $pa['price_final_no_format'] = $pa['price_final'];
            $pa['depends_on_stock'] = (int)StockAvailable::dependsOnStock($pa['id_product']);
        }

        $helper_list = new HelperList();
        $helper_list->override_folder = 'edit_combination/';
        $helper_list->module = $this->module;
        $helper_list->show_toolbar = true;
        $helper_list->simple_header = true;
        $helper_list->shopLinkType = false;
        $helper_list->identifier = 'id_product_attribute';
        $helper_list->token = Tools::getAdminTokenLite('AdminProductGrid');
        $helper_list->title = $this->l('Combinations').': '.$product->name;
        $helper_list->currentIndex = self::$currentIndex;
        $helper_list->actions = array('delete');
        $helper_list->tpl_vars['ps_v'] = _PS_VERSION_;
        $helper_list->tpl_vars['rate'] = $rate;
        $helper_list->tpl_vars['shop_active'] = Shop::isFeatureActive();
        $helper_list->tpl_vars['product_price'] = $product->price * (1 + Tax::getProductTaxRate($product->id)/100);
        $fields = array(
                'id_product_attribute' => array(
                    'title' => $this->l('ID'),
                    'remove_onclick' => true,
                    'orderby' => false,
                    'search' => false
                ),
                'image' => array(
                    'title' => $this->l('Photo'),
                    'align' => 'center',
                    'image_c' => 'p',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,
                ),
                'attributes' => array(
                    'title' => $this->l('Attributes'),
                    'remove_onclick' => true,
                    'orderby' => false,
                    'search' => false,
                    'type' => 'edit_attributes'
                ),
                'reference' => array(
                    'title' => $this->l('Reference'),
                    'remove_onclick' => true,
                    'orderby' => false,
                    'search' => false,

                    'need_edit' => true,
                    'table' => 'product_attribute',
                    'field' => 'reference',
                    'lang' => false,
                    'validate' => 'string',
                    'align' => 'text-center',
                ),
                'ean13' => array(
                    'title' => $this->l('Ean 13'),
                    'remove_onclick' => true,
                    'orderby' => false,
                    'search' => false,

                    'need_edit' => true,
                    'table' => 'product_attribute',
                    'field' => 'ean13',
                    'lang' => false,
                    'validate' => 'ean13',
                    'align' => 'text-center',
                ),
                'upc' => array(
                    'title' => $this->l('Upc'),
                    'remove_onclick' => true,
                    'orderby' => false,
                    'search' => false,

                    'need_edit' => true,
                    'table' => 'product_attribute',
                    'field' => 'upc',
                    'lang' => false,
                    'validate' => 'upc',
                    'align' => 'text-center',
                ),
                'attribute_wholesale_price' => array(
                    'title' => $this->l('Wholesale price'),
                    'remove_onclick' => true,
                    'type' => 'price',
                    'field' => 'wholesale_price',
                    'table' => (!Shop::isFeatureActive()
                        ? 'product_attribute,product_attribute_shop' : 'product_attribute_shop'),
                    'class' => 'attribute_wholesale_price',
                    'validate' => 'price',
                    'lang' => false,
                    'need_edit' => true
                ),
                'price' => array(
                    'title' => $this->l('Impact tax excl'),
                    'remove_onclick' => true,
                    'orderby' => false,
                    'search' => false,
                    'type' => 'price',

                    'need_edit' => true,
                    'table' => (!Shop::isFeatureActive()
                        ? 'product_attribute,product_attribute_shop' : 'product_attribute_shop'),
                    'field' => 'price',
                    'lang' => false,
                    'validate' => 'price',
                    'align' => 'text-center',
                    'help' => $this->l('Impact on the price. Can be specified as a negative, so a positive number'),
                    'shop' => true
                ),
                'price_final' => array(
                    'title' => $this->l('Impact tax incl'),
                    'remove_onclick' => true,
                    'orderby' => false,
                    'search' => false,
                    'type' => 'price',
                    'need_edit' => true,
                    'table' => (!Shop::isFeatureActive()
                        ? 'product_attribute,product_attribute_shop' : 'product_attribute_shop'),
                    'field' => 'price_final',
                    'lang' => false,
                    'validate' => 'price',
                    'align' => 'text-center',
                    'help' => $this->l('Impact on the price. Can be specified as a negative, so a positive number'),
                    'shop' => true
                ),
                'weight' => array(
                    'title' => $this->l('Impact on the weight'),
                    'remove_onclick' => true,
                    'orderby' => false,
                    'search' => false,

                    'need_edit' => true,
                    'table' => (!Shop::isFeatureActive()
                        ? 'product_attribute,product_attribute_shop' : 'product_attribute_shop'),
                    'field' => 'weight',
                    'lang' => false,
                    'validate' => 'float',
                    'align' => 'text-center',
                    'help' => $this->l('Impact on the weight. Can be specified as a negative, so a positive number'),
                    'shop' => true
                ),
                'desired' => array(
                    'title' => $this->l('Final price'),
                    'remove_onclick' => true,
                    'type' => 'price',

                    'need_edit' => true,
                    'validate' => 'float',
                    'lang' => false,
                    'field' => 'desired',
                    'table' => (!Shop::isFeatureActive()
                        ? 'product_attribute,product_attribute_shop' : 'product_attribute_shop'),
                ),
                'product_final_price' => array(
                    'title' => $this->l('Product final price'),
                    'remove_onclick' => true,
                    'type' => 'price',
                    'class' => 'product_final_price',
                    'need_edit' => false
                ),
                'available_date' => array(
                    'title' => $this->l('Available date'),
                    'remove_onclick' => true,
                    'type' => 'date',
                    'orderby' => false,
                    'search' => false,

                    'need_edit' => true,
                    'table' => (!Shop::isFeatureActive()
                        ? 'product_attribute,product_attribute_shop' : 'product_attribute'),
                    'field' => 'available_date',
                    'lang' => false,
                    'validate' => 'date',
                    'align' => 'text-center',
                    'shop' => true
                ),
                'quantity' => array(
                    'title' => $this->l('Quantity'),
                    'remove_onclick' => true,
                    'orderby' => false,
                    'search' => false,

                    'need_edit' => true,
                    'table' => (!Shop::isFeatureActive()
                        ? 'product_attribute,stock_available' : 'stock_available'),
                    'field' => 'quantity',
                    'lang' => false,
                    'validate' => 'integer',
                    'align' => 'text-center',
                    'shop' => true
                ),
                'default_on' => array(
                    'title' => $this->l('Default'),
                    'remove_onclick' => true,
                    'orderby' => false,
                    'search' => false,
                    'type' => 'bool',
                    'icon' => array(
                            0 => 'disabled.gif',
                            1 => 'enabled.gif',
                            'default' => 'disabled.gif'
                    ),

                    'table' => (!Shop::isFeatureActive()
                        ? 'product_attribute,product_attribute_shop' : 'product_attribute_shop'),
                    'field' => 'default_on',
                    'lang' => false,
                    'validate' => 'bool',
                    'align' => 'text-center',
                    'shop' => true
                ),
            'additional_setting_combination' => array(
                'title' => $this->l('More'),
                'remove_onclick' => true,
                'key' => 'additional_setting_combination',
                'need_edit' => false,
                'orderby' => false,
                'search' => false
            ),
        );

        $conf_visible = Tools::jsonDecode(Configuration::get('SEOSA_DGRID_COLUMN_COMB'));

        foreach ($fields as $key => &$f) {
            $param = 'comb_'.$key;
            if (isset($conf_visible->{$param}) && $conf_visible->{$param} == 0) {
                unset($fields[$key]);
            }
        }

        foreach ($combinations as &$combination) {
            $id_image = false;
            $image = Image::getCover($combination['id_product']);
            if (is_array($image) && count($image)) {
                $id_image = $image['id_image'];
            }

            if ($id_image) {
                $combination['image'] = ImageManager::thumbnail(
                    _PS_PROD_IMG_DIR_
                    .Image::getImgFolderStatic($id_image).$id_image.'.jpg',
                    'dgp_'.$id_image.'.jpg',
                    50,
                    'jpg',
                    true,
                    true
                );
            } else {
                $combination['image'] = '';
            }

            $combination['product_final_price'] = Product::getPriceStatic(
                $combination['id_product'],
                true,
                $combination['id_product_attribute']
            );

            if (!$combination['default_on']) {
                $combination['default_on'] = '0';
            }

            $combination['desired'] = ($product->price + $combination['price']) * (1 + $rate/100);
            $combination['attribute_wholesale_price'] = $combination['wholesale_price'];
        }

        $images = $product->getImages($this->context->language->id);
        foreach ($images as &$image) {
            $image['tmp_image'] = ImageManager::thumbnail(
                _PS_PROD_IMG_DIR_.Image::getImgFolderStatic($image['id_image']).$image['id_image'].'.jpg',
                'dgp_'.$image['id_image'].'.jpg',
                50
            );
        }

        return array(
            'images' => $images,
            'content' => $helper_list->generateList($combinations, $fields),
        );
    }


    public function ajaxProcessGetImages()
    {
        $id_product = Tools::getValue('id_product');
        $id_product_attribute = Tools::getValue('id_product_attribute');
        $images = Image::getImages($this->context->language->id, $id_product);
        foreach ($images as &$image) {
            $image['mini'] = ImageManager::thumbnail(
                _PS_PROD_IMG_DIR_.Image::getImgFolderStatic($image['id_image'])
                .$image['id_image'].'.jpg',
                'dgp_'.$image['id_image'].'.jpg',
                100,
                'jpg',
                true,
                true
            );
            $obj_image = new Image($image['id_image']);
            if (property_exists($obj_image, 'legend')) {
                $image['legend'] = $obj_image->legend;
            }
        }

        $this->context->smarty->assign(array(
            'languages' => $this->getLanguages(),
            'images' => $images,
            'id_product' => $id_product
        ));

        if ($id_product_attribute) {
            $pa_images = Product::_getAttributeImageAssociations($id_product_attribute);
            $this->context->smarty->assign(array(
                'pa_images' => $pa_images,
                'id_product_attribute' => $id_product_attribute
            ));
        }

        $content = $this->context->smarty->fetch(
            _PS_MODULE_DIR_.'dgridproducts/views/templates/admin/ajax/images.tpl'
        );

        die(Tools::jsonEncode(array(
            'hasError' => false,
            'content' => $content
        )));
    }

    public function ajaxProcessDeleteImage()
    {
        $id_image = Tools::getValue('id_image');
        $image = new Image($id_image);
        if (Validate::isLoadedObject($image)) {
            if ($image->cover) {
                die(Tools::jsonEncode(array(
                    'hasError' => true,
                    'message' => $this->l('Can not delete image with cover')
                )));
            }

            $image->delete();
            if (file_exists(_PS_TMP_IMG_DIR_.'dgp_'.(int)$image->id.'.jpg')) {
                unlink(_PS_TMP_IMG_DIR_.'dgp_'.(int)$image->id.'.jpg');
            }

            die(Tools::jsonEncode(array(
                'hasError' => false
            )));
        } else {
            die(Tools::jsonEncode(array(
                'hasError' => true,
                'message' => $this->l('Can not delete image')
            )));
        }
    }

    public function ajaxProcessSetCover()
    {
        $id_image = Tools::getValue('id_image');
        $image = new Image($id_image);
        if (Validate::isLoadedObject($image)) {
            Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'image i
            LEFT JOIN '._DB_PREFIX_.'image_shop ims ON i.`id_image` = ims.`id_image`
             AND ims.`id_shop` = '.$this->context->shop->id.'
            SET i.`cover` = NULL, ims.`cover` = NULL WHERE i.`id_product` = '.(int)$image->id_product);
            Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'image i
            LEFT JOIN '._DB_PREFIX_.'image_shop ims
             ON i.`id_image` = ims.`id_image` AND ims.`id_shop` = '.$this->context->shop->id.'
            SET i.`cover` = 1, ims.`cover` = 1 WHERE i.`id_product` = '.(int)$image->id_product.'
             AND i.`id_image` = '.(int)$image->id);
            @unlink(_PS_TMP_IMG_DIR_.'product_'.(int)$image->id_product.'.jpg');
            @unlink(_PS_TMP_IMG_DIR_.'product_mini_'.(int)$image->id_product.'_'.$this->context->shop->id.'.jpg');
        }
    }

    public function ajaxProcessUploadImage()
    {
        $error_message = '';
        $id_product = (int)Tools::getValue('id_product');
        $id_product_attribute = Tools::getValue('id_product_attribute');
        if (version_compare(_PS_VERSION_, '1.6', '<')) {
            $file_image = $this->fileAttachment('image');
        } else {
            $file_image = Tools::fileAttachment('image');
        }

        $check_image = true;
        if (function_exists('exif_imagetype')) {
            $check_image = false;
            if (in_array(
                exif_imagetype($file_image['tmp_name']),
                array(IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_PNG)
            )) {
                $check_image = true;
            }
        }

        if (array_key_exists('tmp_name', $file_image) && $file_image['tmp_name']
        && $check_image) {
            $tmp_filename = $file_image['tmp_name'];
            $images = Image::getImages($this->context->language->id, (int)$id_product);
            $image = new Image();
            $image->id_product = $id_product;
            $image->cover = (is_array($images) && count($images) ? 0 : 1);
            if ($image->save()) {
                if (!file_exists(_PS_PROD_IMG_DIR_.$image->getImgFolder())) {
                    $image->createImgFolder();
                }

                ImageManager::resize($tmp_filename, _PS_PROD_IMG_DIR_.$image->getImgFolder().$image->id.'.jpg');
                if (file_exists(_PS_PROD_IMG_DIR_.$image->getImgFolder().$image->id.'.jpg')) {
                    $types = ImageType::getImagesTypes('products');
                    foreach ($types as $type) {
                        if (file_exists(_PS_PROD_IMG_DIR_.$image->getImgFolder().$image->id.'-'.$type['name'].'.jpg')) {
                            unlink(_PS_PROD_IMG_DIR_.$image->getImgFolder().$image->id.'-'.$type['name'].'.jpg');
                        }
                        ImageManager::resize(
                            _PS_PROD_IMG_DIR_.$image->getImgFolder().$image->id.'.jpg',
                            _PS_PROD_IMG_DIR_.$image->getImgFolder().$image->id.'-'.$type['name'].'.jpg',
                            $type['width'],
                            $type['height']
                        );
                    }

                    if (version_compare(_PS_VERSION_, '1.5.0.5', '<')) {
                        Hook::exec('watermark', array('id_image' => $image->id, 'id_product' => $id_product));
                    } else {
                        Hook::exec('actionWatermark', array('id_image' => $image->id, 'id_product' => $id_product));
                    }

                    if ($id_product_attribute) {
                        $this->context->smarty->assign('id_product_attribute', $id_product_attribute);
                        Db::getInstance()->insert('product_attribute_image', array(
                            array('id_product_attribute' => $id_product_attribute, 'id_image' => $image->id)
                        ));
                    }

                    $this->context->smarty->assign(array(
                        'image' => $image,
                        'languages' => $this->getLanguages(),
                        'mini' => ImageManager::thumbnail(
                            _PS_PROD_IMG_DIR_.$image->getImgFolder().$image->id.'.jpg',
                            'dgp_'.$image->id.'.jpg',
                            100,
                            'jpg',
                            true,
                            true
                        )
                    ));

                    $content = $this->context->smarty->fetch(
                        _PS_MODULE_DIR_.'dgridproducts/views/templates/admin/ajax/single_image.tpl'
                    );

                    die(Tools::jsonEncode(array(
                        'hasError' => false,
                        'content' => $content
                    )));
                } else {
                    $image->delete();
                    $error_message = $this->l('Can not upload image');
                }
            } else {
                $error_message = $this->l('Can not create image');
            }
        } else {
            $error_message = $this->l('File type invalid!');
        }

        die(Tools::jsonEncode(array(
            'hasError' => true,
            'message' => $error_message
        )));
    }

    /**
     * Returns an array containing information about
     * HTTP file upload variable ($_FILES)
     *
     * @param string $input          File upload field name
     * @param bool   $return_content If true, returns uploaded file contents
     *
     * @return array|null
     */
    private function fileAttachment($input = 'fileUpload', $return_content = true)
    {
        $file_attachment = null;
        if (isset($_FILES[$input]['name']) && !empty($_FILES[$input]['name']) && !empty($_FILES[$input]['tmp_name'])) {
            $file_attachment['rename'] = uniqid().Tools::strtolower(substr($_FILES[$input]['name'], -5));
            if ($return_content) {
                $file_attachment['content'] = file_get_contents($_FILES[$input]['tmp_name']);
            }
            $file_attachment['tmp_name'] = $_FILES[$input]['tmp_name'];
            $file_attachment['name']     = $_FILES[$input]['name'];
            $file_attachment['mime']     = $_FILES[$input]['type'];
            $file_attachment['error']    = $_FILES[$input]['error'];
            $file_attachment['size']     = $_FILES[$input]['size'];
        }

        return $file_attachment;
    }

    public function ajaxProcessSetCombinationImage()
    {
        $change = Tools::getValue('change');
        $id_image = Tools::getValue('id_image');
        $id_product_attribute = Tools::getValue('id_product_attribute');
        if ($change == 1) {
            Db::getInstance()->insert('product_attribute_image', array(
                array('id_product_attribute' => (int)$id_product_attribute, 'id_image' => (int)$id_image)
            ));
        } elseif ($change == -1) {
            Db::getInstance()->delete(
                'product_attribute_image',
                ' id_product_attribute = '.(int)$id_product_attribute.' AND id_image = '.(int)$id_image
            );
        }
    }

    public function ajaxProcessGetFeatures()
    {
        if (!Module::isEnabled('seosaextendedfeatures')) {
            $id_product = Tools::getValue('id_product');
            $product = new Product($id_product, true, $this->context->language->id);
            $features = Feature::getFeatures(
                $this->context->language->id,
                (Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP)
            );

            foreach ($features as $k => $tab_features) {
                $features[$k]['current_item'] = false;
                $features[$k]['val'] = array();

                $custom = true;
                foreach ($product->getFeatures() as $tab_products) {
                    if ($tab_products['id_feature'] == $tab_features['id_feature']) {
                        $features[$k]['current_item'] = $tab_products['id_feature_value'];
                    }
                }

                $features[$k]['featureValues'] = FeatureValue::getFeatureValuesWithLang(
                    $this->context->language->id,
                    (int)$tab_features['id_feature']
                );

                if (count($features[$k]['featureValues'])) {
                    foreach ($features[$k]['featureValues'] as $value) {
                        if ($features[$k]['current_item'] == $value['id_feature_value']) {
                            $custom = false;
                        }
                    }
                }

                if ($custom) {
                    $features[$k]['val'] = FeatureValue::getFeatureValueLang($features[$k]['current_item']);
                }
            }

            $this->context->smarty->assign('available_features', $features);
            $this->context->smarty->assign('product', $product);
            $this->context->smarty->assign('languages', $this->getLanguages());
            $this->context->smarty->assign('link', $this->context->link);
            $this->context->smarty->assign('default_form_language', Configuration::get('PS_LANG_DEFAULT'));
            $this->context->smarty->assign('ps_version', (float)_PS_VERSION_);
            die(Tools::jsonEncode(array(
                'hasError' => false,
                'content' => $this->context->smarty->fetch(
                    _PS_MODULE_DIR_.'dgridproducts/views/templates/admin/ajax/features.tpl'
                )
            )));
        } else {
            $id_product = Tools::getValue('id_product');
            die(Tools::jsonEncode(array(
                'hasError' => false,
                'content' => '<script> $(\'iframe\').parent().addClass(\'loading\'); </script><iframe
                    onload="$(this).parent().removeClass(\'loading\')"
                    src="'.$this->context->link->getAdminLink('AdminSeoSaExtendedFeatures')
                    .'&id_product='.(int)$id_product.'"></iframe>'
            )));
        }
    }

    public function ajaxProcessSaveFeatures()
    {
        if (!Feature::isFeatureActive()) {
            die(Tools::jsonEncode(array(
                'hasError' => true,
                'error' => $this->l('Features disabled')
            )));
        }

        if (Validate::isLoadedObject($product = new Product((int)Tools::getValue('id_product')))) {
            // delete all objects
            $product->deleteFeatures();

            // add new objects
            $languages = Language::getLanguages(false);
            foreach ($_POST as $key => $val) {
                if (preg_match('/^feature_([0-9]+)_value/i', $key, $match)) {
                    if ($val) {
                        $product->addFeaturesToDB($match[1], $val);
                    } else {
                        if ($default_value = $this->checkFeatures($languages, $match[1])) {
                            $id_value = $product->addFeaturesToDB($match[1], 0, 1);
                            foreach ($languages as $language) {
                                if ($cust = Tools::getValue('custom_'.$match[1].'_'.(int)$language['id_lang'])) {
                                    $product->addFeaturesCustomToDB($id_value, (int)$language['id_lang'], $cust);
                                } else {
                                    $product->addFeaturesCustomToDB(
                                        $id_value,
                                        (int)$language['id_lang'],
                                        $default_value
                                    );
                                }
                            }
                        }
                    }
                }
            }

            Search::indexation(false, $product->id);

            die(Tools::jsonEncode(array(
                'hasError' => false,
            )));
        } else {
            die(Tools::jsonEncode(array(
                'hasError' => true,
                'error' => $this->l('A product must be created before adding features.')
            )));
        }
    }

    public function ajaxProcessGetMetaTags()
    {
        $id_product = Tools::getValue('id_product');
        $product = new Product($id_product);
        $this->context->smarty->assign(array(
            'product' => $product,
            'default_form_language' => Configuration::get('PS_LANG_DEFAULT'),
            'languages' => $this->getLanguages(),
            'curent_shop_url' => $this->context->shop->getBaseURL(),
            'back_tpl_dir' => _PS_BO_ALL_THEMES_DIR_.'default/template/',
            'iso' => $this->context->language->iso_code,
            'id_lang' => $this->context->language->id,
            'default_language' => Configuration::get('PS_LANG_DEFAULT'),
            'ps_version' => (float)_PS_VERSION_
        ));
        die(Tools::jsonEncode(array(
            'hasError' => false,
            'content' => $this->context->smarty->fetch(
                _PS_MODULE_DIR_.'dgridproducts/views/templates/admin/ajax/seo.tpl'
            )
        )));
    }

    public function ajaxProcessSaveSeo()
    {
        $errors = array();
        $id_product = Tools::getValue('id_product');
        $product = new Product($id_product);
        $size_meta_title = Product::$definition['fields']['meta_title']['size'];
        $size_meta_description = Product::$definition['fields']['meta_description']['size'];
        $size_meta_keywords = Product::$definition['fields']['meta_keywords']['size'];
        $size_link_rewrite = Product::$definition['fields']['link_rewrite']['size'];
        foreach ($this->getLanguages() as $l) {
            $product->meta_title[$l['id_lang']] = Tools::getValue('meta_title_'.$l['id_lang']);
            if (Tools::strlen($product->meta_title[$l['id_lang']]) > $size_meta_title) {
                $errors[] = sprintf(
                    $this->l('For language %s meta_title max length %s symbols'),
                    $l['name'],
                    $size_meta_title
                );
            }

            $product->meta_description[$l['id_lang']] = Tools::getValue('meta_description_'.$l['id_lang']);
            if (Tools::strlen($product->meta_description[$l['id_lang']]) > $size_meta_description) {
                $errors[] = sprintf(
                    $this->l('For language %s meta_description max length %s symbols'),
                    $l['name'],
                    $size_meta_description
                );
            }

            $product->meta_keywords[$l['id_lang']] = Tools::getValue('meta_keywords_'.$l['id_lang']);
            if (Tools::strlen($product->meta_keywords[$l['id_lang']]) > $size_meta_keywords) {
                $errors[] = sprintf(
                    $this->l('For language %s meta_keywords max length %s symbols'),
                    $l['name'],
                    $size_meta_keywords
                );
            }

            $product->link_rewrite[$l['id_lang']] = Tools::getValue('link_rewrite_'.$l['id_lang']);
            if (Tools::strlen($product->link_rewrite[$l['id_lang']]) > $size_link_rewrite) {
                $errors[] = sprintf(
                    $this->l('For language %s link rewrite max length %s symbols'),
                    $l['name'],
                    $size_link_rewrite
                );
            }
        }

        if (count($errors)) {
            die(Tools::jsonEncode(array(
                'hasError' => true,
                'errors' => $errors
            )));
        }

        $this->updateObjectField('Product', 'meta_title', $product->id, $product->meta_title);
        $this->updateObjectField('Product', 'meta_description', $product->id, $product->meta_description);
        $this->updateObjectField('Product', 'meta_keywords', $product->id, $product->meta_keywords);
        $this->updateObjectField('Product', 'link_rewrite', $product->id, $product->link_rewrite);
        Search::indexation(false, $product->id);
        die(Tools::jsonEncode(array(
            'hasError' => false
        )));
    }

    public function ajaxProcessGetCategories()
    {
        $id_product = Tools::getValue('id_product');
        $categories = Product::getProductCategories($id_product);
        $selected_categories = Product::getProductCategoriesFull($id_product, $this->context->language->id);
        $this->context->smarty->assign(array(
            'product' => new Product($id_product, false, $this->context->language->id),
            'selected_categories' => $selected_categories,
            'product_category' => $categories,
            'categories' => Category::getCategories($this->context->language->id, false)
        ));
        die(Tools::jsonEncode(array(
            'hasError' => false,
            'content' => $this->context->smarty->fetch(
                _PS_MODULE_DIR_.'dgridproducts/views/templates/admin/ajax/categories.tpl'
            )
        )));
    }
    public function ajaxProcessSetActive()
    {
        $id_product = Tools::getValue('id_product');
        $product = new Product($id_product);
        if (Validate::isLoadedObject($product)) {
            $this->updateObjectField('Product', 'active', $product->id, ($product->active ? 0 : 1));
            Search::indexation(false, $product->id);
        }
    }

    public function ajaxProcessGetMore()
    {
        $id_product = Tools::getValue('id_product');
        /**
         * @var $product ProductCore
         */
        $product = new Product($id_product, true);
        if (Validate::isLoadedObject($product)) {
            $unit_price = 0;
            if ($product->unit_price_ratio > 0) {
                $unit_price = $product->getPrice(false) / $product->unit_price_ratio;
            }

            $selected_carriers = $product->getCarriers();
            $tmp_selected_carriers = array();

            if (count($selected_carriers)) {
                foreach ($selected_carriers as $selected_carrier) {
                    $tmp_selected_carriers[] = (int)$selected_carrier['id_reference'];
                }
                $selected_carriers = $tmp_selected_carriers;
            }

            $product_suppliers = ProductSupplier::getSupplierCollection($product->id);
            $product_suppliers = $product_suppliers->getResults();
            $ids_product_suppliers = array();
            if (is_array($product_suppliers) && count($product_suppliers)) {
                /**
                 * @var $product_supplier ProductSupplierCore
                 */
                foreach ($product_suppliers as $product_supplier) {
                    $ids_product_suppliers[] = $product_supplier->id_supplier;
                }
            }

            if ($product->uploadable_files || $product->text_fields) {
                Configuration::updateGlobalValue('PS_CUSTOMIZATION_FEATURE_ACTIVE', '1');
            }

            if (Configuration::get('PS_CUSTOMIZATION_FEATURE_ACTIVE')) {
                $file_fields = array();
                $text_fields = array();
                $fields = $product->getCustomizationFieldIds();

                if (is_array($fields) && count($fields)) {
                    foreach ($fields as $field) {
                        switch ($field['type']) {
                            case Product::CUSTOMIZE_FILE:
                                $file_fields[] = new CustomizationFieldCore((int)$field['id_customization_field']);
                                break;
                            case Product::CUSTOMIZE_TEXTFIELD:
                                $text_fields[] = new CustomizationFieldCore((int)$field['id_customization_field']);
                                break;
                        }
                    }
                }

                $count_file_fields = count($file_fields);
                $count_text_fields = count($text_fields);
                if ($count_file_fields < $product->uploadable_files) {
                    for ($i = 1; $i <= ($product->uploadable_files - $count_file_fields); $i++) {
                        $file_fields[] = new CustomizationFieldCore();
                    }
                }

                if ($count_text_fields < $product->text_fields) {
                    for ($i = 1; $i <= ($product->text_fields - $count_text_fields); $i++) {
                        $text_fields[] = new CustomizationFieldCore();
                    }
                }

                if ($count_file_fields > $product->uploadable_files) {
                    $need_deleted = array_splice($file_fields, $product->uploadable_files);
                    if (is_array($need_deleted) && count($need_deleted)) {
                        foreach ($need_deleted as $item) {
                            $item->delete();
                        }
                    }
                }

                if ($count_text_fields > $product->text_fields) {
                    $need_deleted = array_splice($text_fields, $product->text_fields);
                    if (is_array($need_deleted) && count($need_deleted)) {
                        foreach ($need_deleted as $item) {
                            $item->delete();
                        }
                    }
                }

                $this->context->smarty->assign(array(
                    'file_fields' => $file_fields,
                    'text_fields' => $text_fields
                ));
            }

            $address = new Address();
            $address->id_country = (int)$this->context->country->id;
            $tax_rules_groups = TaxRulesGroup::getTaxRulesGroups(true);

            $associated_suppliers = ProductSupplier::getSupplierCollection($product->id);
            $product_supplier_collection = ProductSupplier::getSupplierCollection($product->id, false);
            $attributes = $product->getAttributesResume($this->context->language->id);
            if (empty($attributes)) {
                $attributes[] = array(
                    'id_product' => $product->id,
                    'id_product_attribute' => 0,
                    'attribute_designation' => ''
                );
            }
            $product_designation = array();

            foreach ($attributes as $attribute) {
                $product_designation[$attribute['id_product_attribute']] = rtrim(
                    $product->name[$this->context->language->id].' - '.$attribute['attribute_designation'],
                    ' - '
                );
            }

            $suppliers = Supplier::getSuppliers();
            $default_supplier = 0;
            foreach ($suppliers as &$supplier) {
                $supplier['is_selected'] = false;
                $supplier['is_default'] = false;

                foreach ($associated_suppliers as $associated_supplier) {
                    /** @var ProductSupplier $associated_supplier */
                    if ($associated_supplier->id_supplier == $supplier['id_supplier']) {
                        $associated_supplier->name = $supplier['name'];
                        $supplier['is_selected'] = true;

                        if ($product->id_supplier == $supplier['id_supplier']) {
                            $supplier['is_default'] = true;
                            $default_supplier = $supplier['id_supplier'];
                        }
                    }
                }
            }

            $this->context->smarty->assign(array(
                'js_dir' => _PS_JS_DIR_,
                'iso' => $this->context->language->iso_code,
                'iso_tiny_mce' => $this->context->language->iso_code,
                'product' => $product,
                'has_attribute' => $product->hasAttributes(),
                'id_lang' => $this->context->language->id,
                'ps_stock_management' => Configuration::get('PS_STOCK_MANAGEMENT'),
                'back_tpl_dir' => _PS_BO_ALL_THEMES_DIR_.'default/template/',
                'defaultFormLanguage' => (int)$this->context->language->id,
                'languages' => $this->getLanguages(),
                'allowEmployeeFormLang' => '0',
                'vat_number' => false,
                'accessories' => Product::getAccessoriesLight($this->context->language->id, $id_product),
                'link' => $this->context->link,
                'id_product' => $id_product,
                'ps_version' => (float)_PS_VERSION_,
                'PS_PRODUCT_SHORT_DESC_LIMIT' => Configuration::get('PS_PRODUCT_SHORT_DESC_LIMIT'),
                'ad' => __PS_BASE_URI__.basename(_PS_ADMIN_DIR_),
                'tax_rate' => $product->getTaxesRate(),
                'currency' => $this->context->currency,
                'unit_price_with_tax' => ($unit_price + ($unit_price / 100 * $product->getTaxesRate())),
                'ps_tax' => Configuration::get('PS_TAX'),
                'carriers' => Carrier::getCarriers(
                    $this->context->language->id,
                    false,
                    false,
                    false,
                    null,
                    Carrier::ALL_CARRIERS
                ),
                'selected_carriers' => $selected_carriers,
                'suppliers' => $suppliers,
                'ids_product_suppliers' => $ids_product_suppliers,
                'tax_rules_groups' => $tax_rules_groups,
                'tax_exclude_taxe_option' => Tax::excludeTaxeOption(),
                'weight' => Configuration::get('PS_WEIGHT_UNIT'),
                'short_distance' => Configuration::get('PS_DIMENSION_UNIT'),
                'default_language' => $this->context->language->id,
                'country_display_tax_label' => $this->context->country->display_tax_label,
                'associated_suppliers' => $associated_suppliers,
                'attributes' => $attributes,
                'id_default_currency' => Configuration::get('PS_CURRENCY_DEFAULT'),
                'product_designation' => $product_designation,
                'associated_suppliers_collection' => $product_supplier_collection,
                'currencies' => Currency::getCurrencies(),
            ));

            if (Combination::isFeatureActive()) {
                $this->context->smarty->assign(
                    'countAttributes',
                    (int)Db::getInstance()->getValue('SELECT COUNT(id_product)
                    FROM '._DB_PREFIX_.'product_attribute WHERE id_product = '.(int)$product->id)
                );
            } else {
                $this->context->smarty->assign('countAttributes', false);
            }

            die(Tools::jsonEncode(array(
                'hasError' => false,
                'content' => $this->context->smarty->fetch(
                    _PS_MODULE_DIR_.'dgridproducts/views/templates/admin/ajax/more.tpl'
                )
            )));
        }
    }

    public function ajaxProcessGetDescription()
    {
        $id_product = Tools::getValue('id_product');
        $short = (bool)Tools::getValue('short');
        $name_description = $short ? $this->l('Short Description') : $this->l('Description');
        $input_name = $short ? 'description_short' : 'description';
        /**
         * @var $product ProductCore
         */
        $product = new Product($id_product, true);
        if (Validate::isLoadedObject($product)) {
            $this->context->smarty->assign(array(
                'name_description' => $name_description,
                'input_name' => $input_name,
                'short' => $short,
                'js_dir' => _PS_JS_DIR_,
                'iso' => $this->context->language->iso_code,
                'iso_tiny_mce' => $this->context->language->iso_code,
                'product' => $product,
                'id_lang' => $this->context->language->id,
                'back_tpl_dir' => _PS_BO_ALL_THEMES_DIR_.'default/template/',
                'defaultFormLanguage' => (int)$this->context->language->id,
                'languages' => $this->getLanguages(),
                'id_product' => $id_product,
                'ps_version' => (float)_PS_VERSION_,
                'PS_PRODUCT_SHORT_DESC_LIMIT' => Configuration::get('PS_PRODUCT_SHORT_DESC_LIMIT'),
                'default_language' => $this->context->language->id,
            ));
            die(Tools::jsonEncode(array(
                'hasError' => false,
                'content' => $this->context->smarty->fetch(
                    _PS_MODULE_DIR_.'dgridproducts/views/templates/admin/ajax/description.tpl'
                )
            )));
        }
    }

    /**
     * @param int $customize_type
     * @param int $id_product
     * @return bool|void
     */
    public function saveCustomizationFields($customize_type, $id_product, $limit)
    {
        if (!in_array($customize_type, array(Product::CUSTOMIZE_TEXTFIELD, Product::CUSTOMIZE_FILE))) {
            return false;
        }
        $customize = Product::CUSTOMIZE_TEXTFIELD;
        switch ($customize_type) {
            case Product::CUSTOMIZE_TEXTFIELD:
                $customize = 'text';
                break;
            case Product::CUSTOMIZE_FILE:
                $customize = 'file';
                break;
        }

        $fields_arr = Tools::getValue($customize.'_fields_arr', array());
        if (is_array($fields_arr) && count($fields_arr)) {
            $i = 0;
            foreach ($fields_arr as $id) {
                $id = (int)$id;
                $id_entity = Tools::getValue($customize.'_field_id_'.$id);
                $type = (int)Tools::getValue($customize.'_field_type_'.$id);
                $required = (int)Tools::getValue($customize.'_field_required_'.$id);
                $name = array();
                foreach ($this->getLanguages() as $l) {
                    $post_name = Tools::getValue($customize.'_field_name_'.$id.'_'.$l['id_lang']);
                    $name[$l['id_lang']] = ($post_name ? $post_name : 'Field label');
                }

                $customization_field = new CustomizationFieldCore($id_entity);
                $customization_field->type = (in_array(
                    $type,
                    array(Product::CUSTOMIZE_FILE, Product::CUSTOMIZE_TEXTFIELD)
                )
                ? $type : Product::CUSTOMIZE_TEXTFIELD);
                $customization_field->required = $required;
                $customization_field->id_product = (int)$id_product;
                $customization_field->name = $name;

                if ($i != $limit) {
                    $customization_field->save();
                    $i++;
                } else {
                    $customization_field->delete();
                }
            }
        }

        $count_fields_arr = count($fields_arr);
        if (is_array($fields_arr) && $count_fields_arr < $limit) {
            for ($it = 0; $it < ($limit - $count_fields_arr); $it++) {
                $c = new CustomizationFieldCore();
                $c->id_product = $id_product;
                $c->type = $customize_type;
                foreach ($this->getLanguages() as $l) {
                    $c->name[$l['id_lang']] = 'Field label';
                }
                $c->required = 1;
                $c->save();
            }
        }
    }

    public function ajaxProcessSaveDescription()
    {
        $errors = array();
        $id_product = Tools::getValue('id_product');

        $description = array();

        foreach ($this->getLanguages() as $l) {
            if (!isset($name)) {
                $name = Tools::getValue('description_short_'.$l['id_lang']) ? 'description_short' : 'description';
            }

            if (!call_user_func(
                array('Validate', Product::$definition['fields'][$name]['validate']),
                Tools::getValue($name.'_'.$l['id_lang'])
            )) {
                $errors[] = sprintf($this->l('Description short for lang %s wrong'), $l['name']);
            }

            $description[$l['id_lang']] = Tools::getValue($name.'_'.$l['id_lang']);
        }

        if (!count($errors)) {
            $product = new Product($id_product);
            if (Validate::isLoadedObject($product)) {
                $product->{$name} = $description;

                $this->updateObjectField('Product', $name, $product->id, $product->{$name});

                Search::indexation(false, $product->id);
            } else {
                $errors[] = $this->l('Product not exists');
            }
        }

        if (count($errors)) {
            die(Tools::jsonEncode(array(
                'hasError' => true,
                'errors' => $errors
            )));
        } else {
            die(Tools::jsonEncode(
                array(
                    'hasError' => false,
                    'id_product' => $id_product,
                )
            ));
        }
    }

    public function ajaxProcessSaveMore()
    {
        $errors = array();
        $rate = 0;
        $ps_stock_management = Configuration::get('PS_STOCK_MANAGEMENT');
        $id_product = Tools::getValue('id_product');
        $available_for_order = Tools::getValue('available_for_order');
        $show_price = Tools::getValue('show_price');
        $online_only = Tools::getValue('online_only');
        $condition = Tools::getValue('condition');
        $minimal_quantity = Tools::getValue('minimal_quantity');
        $available_date = Tools::getValue('available_date');
        $unit_price = (float)Tools::getValue('unit_price');
        $unity = Tools::getValue('unity');
        $on_sale = (int)Tools::getValue('on_sale');
        $wholesale_price = (float)Tools::getValue('wholesale_price');
        $carriers = array_unique(Tools::getValue('carriers', array()));
        $uploadable_files = (int)Tools::getValue('uploadable_files');
        $text_fields = (int)Tools::getValue('text_fields');
        $id_tax_rules_group = (int)Tools::getValue('id_tax_rules_group');
        $width = (float)Tools::getValue('width');
        $height = (float)Tools::getValue('height');
        $depth = (float)Tools::getValue('depth');
        $weight = (float)Tools::getValue('weight');
        $additional_shipping_cost = Tools::getValue('additional_shipping_cost');

        if ($ps_stock_management) {
            if (Combination::isFeatureActive()) {
                $count_attributes = (int)Db::getInstance()->getValue(
                    'SELECT COUNT(id_product) FROM '._DB_PREFIX_.'product_attribute
                     WHERE id_product = '.(int)$id_product
                );
            } else {
                $count_attributes = false;
            }

            if ($count_attributes) {
                $available_date = '0000-00-00';
            }
        }

        $description_short = array();
        $tags = array();
        $description = array();
        $available_now = array();
        $available_later = array();
        $input_accessories = Tools::getValue('inputAccessories');
        $id_manufacturer = Tools::getValue('id_manufacturer');
        foreach ($this->getLanguages() as $l) {
            if (!call_user_func(
                array('Validate', Product::$definition['fields']['description_short']['validate']),
                Tools::getValue('description_short_'.$l['id_lang'])
            )) {
                $errors[] = sprintf($this->l('Description short for lang %s wrong'), $l['name']);
            }

            if (!call_user_func(
                array('Validate', Product::$definition['fields']['description']['validate']),
                Tools::getValue('description_'.$l['id_lang']),
                true
            )) {
                $errors[] = sprintf($this->l('Description for lang %s wrong'), $l['name']);
            }

            $description_short[$l['id_lang']] = Tools::getValue('description_short_'.$l['id_lang']);
            $description[$l['id_lang']] = Tools::getValue('description_'.$l['id_lang']);
            $tags[$l['id_lang']] = Tools::getValue('tags_'.$l['id_lang']);
            $available_now[$l['id_lang']] = Tools::getValue('available_now_'.$l['id_lang']);
            $available_later[$l['id_lang']] = Tools::getValue('available_later_'.$l['id_lang']);
        }

        if (!call_user_func(
            array('Validate', Product::$definition['fields']['available_for_order']['validate']),
            $available_for_order
        )) {
            $errors[] = $this->l('Available for order wrong');
        }

        if (!call_user_func(
            array('Validate', Product::$definition['fields']['show_price']['validate']),
            $show_price
        )) {
            $errors[] = $this->l('Show price wrong');
        }

        if (!call_user_func(
            array('Validate', Product::$definition['fields']['online_only']['validate']),
            $online_only
        )) {
            $errors[] = $this->l('Online only wrong');
        }

        if (!call_user_func(
            array('Validate', Product::$definition['fields']['condition']['validate']),
            $condition
        )) {
            $errors[] = $this->l('Condition only wrong');
        }

        if ($ps_stock_management && !call_user_func(
            array('Validate', Product::$definition['fields']['available_date']['validate']),
            $available_date
        )) {
            $errors[] = $this->l('Available date only wrong');
        }

        if (!call_user_func(
            array('Validate', Product::$definition['fields']['wholesale_price']['validate']),
            $wholesale_price
        )) {
            $errors[] = $this->l('Wholesale price wrong');
        }

        if (!count($errors)) {
            $product = new Product($id_product);
            if (Validate::isLoadedObject($product)) {
                $product->available_for_order = $available_for_order;
                if (!$available_for_order) {
                    $product->show_price = $show_price;
                } else {
                    $product->show_price = 1;
                }
                $product->online_only = $online_only;

                if ($ps_stock_management) {
                    $product->available_now = $available_now;
                    $product->available_later = $available_later;
                    $product->available_date = $available_date;
                }

                $product->minimal_quantity = ($minimal_quantity ? (int)$minimal_quantity : 1);
                $product->condition = $condition;
                $product->description = $description;
                $product->description_short = $description_short;
                $product->id_manufacturer = $id_manufacturer;
                $product->on_sale = $on_sale;
                $product->wholesale_price = (float)$wholesale_price;
                $product->uploadable_files = (float)$uploadable_files;
                $product->text_fields = (float)$text_fields;
                $product->id_tax_rules_group = (float)$id_tax_rules_group;
                $product->width  = $width;
                $product->height = $height;
                $product->depth = $depth;
                $product->weight = $weight;
                $product->additional_shipping_cost = $additional_shipping_cost;

//				if (_PS_VERSION_ < 1.6)
//					$unit_price = $product->price / $unit_price;

                $product->unit_price = $unit_price;
                $product->unity = $unity;
                $product->setCarriers($carriers);

                $this->updateObjectField(
                    'Product',
                    'available_for_order',
                    $product->id,
                    $product->available_for_order
                );
                $this->updateObjectField('Product', 'show_price', $product->id, $product->show_price);
                $this->updateObjectField('Product', 'online_only', $product->id, $product->online_only);
                $this->updateObjectField('Product', 'on_sale', $product->id, $product->on_sale);
                $this->updateObjectField('Product', 'id_tax_rules_group', $product->id, $product->id_tax_rules_group);

                if ($ps_stock_management) {
                    $this->updateObjectField('Product', 'available_now', $product->id, $product->available_now);
                    $this->updateObjectField('Product', 'available_later', $product->id, $product->available_later);
                    $this->updateObjectField('Product', 'available_date', $product->id, $product->available_date);
                }

                $this->updateObjectField('Product', 'minimal_quantity', $product->id, $product->minimal_quantity);
                $this->updateObjectField('Product', 'wholesale_price', $product->id, $product->wholesale_price);
                $this->updateObjectField('Product', 'condition', $product->id, $product->condition);
                $this->updateObjectField('Product', 'description', $product->id, $product->description);
                $this->updateObjectField('Product', 'description_short', $product->id, $product->description_short);
                $this->updateObjectField('Product', 'id_manufacturer', $product->id, $product->id_manufacturer);
                $this->updateObjectField(
                    'Product',
                    'unit_price_ratio',
                    $product->id,
                    (float)$product->unit_price > 0 ? $product->price / $product->unit_price : 0
                );
                $this->updateObjectField('Product', 'unity', $product->id, $product->unity);
                if ($product->uploadable_files || $product->text_fields) {
                    Configuration::updateGlobalValue('PS_CUSTOMIZATION_FEATURE_ACTIVE', '1');
                }
                $this->updateObjectField('Product', 'uploadable_files', $product->id, $product->uploadable_files);
                $this->updateObjectField('Product', 'text_fields', $product->id, $product->text_fields);
                $this->updateObjectField('Product', 'width', $product->id, $product->width);
                $this->updateObjectField('Product', 'height', $product->id, $product->height);
                $this->updateObjectField('Product', 'depth', $product->id, $product->depth);
                $this->updateObjectField('Product', 'weight', $product->id, $product->weight);
                $this->updateObjectField(
                    'Product',
                    'additional_shipping_cost',
                    $product->id,
                    $product->additional_shipping_cost
                );

                $this->updateTags($tags, $id_product, $errors);
                $this->updateAccessories($product, $input_accessories);

                $suppliers_to_associate = array();
                $suppliers = Supplier::getSuppliers();
                $associated_suppliers = ProductSupplier::getSupplierCollection($product->id);
                $new_default_supplier = 0;

                if (Configuration::get('PS_CUSTOMIZATION_FEATURE_ACTIVE')) {
                    $this->saveCustomizationFields(Product::CUSTOMIZE_TEXTFIELD, $product->id, $product->text_fields);
                    $this->saveCustomizationFields(Product::CUSTOMIZE_FILE, $product->id, $product->uploadable_files);
                }

                if (Tools::isSubmit('default_supplier')) {
                    $new_default_supplier = (int)Tools::getValue('default_supplier');
                }

                foreach ($suppliers as $supplier) {
                    if (Tools::isSubmit('check_supplier_'.$supplier['id_supplier'])) {
                        $suppliers_to_associate[] = $supplier['id_supplier'];
                    }
                }

                foreach ($associated_suppliers as $key => $associated_supplier) {
                    /** @var ProductSupplier $associated_supplier */
                    if (!in_array($associated_supplier->id_supplier, $suppliers_to_associate)) {
                        $associated_supplier->delete();
                        unset($associated_suppliers[$key]);
                    }
                }

                foreach ($suppliers_to_associate as $id) {
                    $to_add = true;
                    foreach ($associated_suppliers->getResults() as $as) {
                        /** @var ProductSupplierCore $as */
                        if ((int)$id == (int)$as->id_supplier) {
                            $to_add = false;
                        }
                    }

                    if ($to_add) {
                        $product_supplier = new ProductSupplier();
                        $product_supplier->id_product = $product->id;
                        $product_supplier->id_product_attribute = 0;
                        $product_supplier->id_supplier = $id;
                        if ($this->context->currency->id) {
                            $product_supplier->id_currency = (int)$this->context->currency->id;
                        } else {
                            $product_supplier->id_currency = (int)Configuration::get('PS_CURRENCY_DEFAULT');
                        }
                        $product_supplier->save();
                    }
                }

                if ($new_default_supplier != $product->id_supplier) {
                    $this->updateObjectField('Product', 'id_supplier', $product->id, $new_default_supplier);
                }

                if ((int)Configuration::get('PS_TAX')) {
                    $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
                    $address = new Address();
                    $address->id_country = $country->id;
                    $tax_manager = TaxManagerFactory::getManager(
                        $address,
                        Product::getIdTaxRulesGroupByIdProduct((int)$id_product, $this->context)
                    );
                    $rate = $tax_manager->getTaxCalculator()->getTotalRate();
                }

                $this->updateSuppliers($product);

                Search::indexation(false, $product->id);
            } else {
                $errors[] = $this->l('Product not exists');
            }
        }

        if (count($errors)) {
            die(Tools::jsonEncode(array(
                'hasError' => true,
                'errors' => $errors
            )));
        } else {
            die(Tools::jsonEncode(
                array(
                'hasError' => false,
                'rate' => $rate,
                'id_product' => $id_product,
                'final_price' => Product::getPriceStatic($id_product, true, null, 6, null, false, false)
                )
            ));
        }
    }

    public function updateSuppliers(Product $product)
    {
        if (!Validate::isLoadedObject($product)) {
            return;
        }

        $attributes = $product->getAttributesResume($this->context->language->id);
        if (empty($attributes)) {
            $attributes[] = array(
                'id_product_attribute' => 0,
                'attribute_designation' => ''
            );
        }

        $suppliers = Supplier::getSuppliers();

        $associated_suppliers = ProductSupplier::getSupplierCollection($product->id);

        $suppliers_to_associate = array();
        $new_default_supplier = 0;

        if (Tools::isSubmit('default_supplier')) {
            $new_default_supplier = (int)Tools::getValue('default_supplier');
        }

        foreach ($suppliers as $supplier) {
            if (Tools::isSubmit('check_supplier_'.$supplier['id_supplier'])) {
                $suppliers_to_associate[] = $supplier['id_supplier'];
            }
        }

        foreach ($associated_suppliers as $key => $associated_supplier) {
            if (!in_array($associated_supplier->id_supplier, $suppliers_to_associate)) {
                $associated_supplier->delete();
                unset($associated_suppliers[$key]);
            }
        }

        foreach ($suppliers_to_associate as $id) {
            $to_add = true;
            foreach ($associated_suppliers as $as) {
                if ($id == $as->id_supplier) {
                    $to_add = false;
                }
            }

            if ($to_add) {
                $product_supplier = new ProductSupplier();
                $product_supplier->id_product = $product->id;
                $product_supplier->id_product_attribute = 0;
                $product_supplier->id_supplier = $id;
                if ($this->context->currency->id) {
                    $product_supplier->id_currency = (int)$this->context->currency->id;
                } else {
                    $product_supplier->id_currency = (int)Configuration::get('PS_CURRENCY_DEFAULT');
                }
                $product_supplier->save();

                $associated_suppliers[] = $product_supplier;
                foreach ($attributes as $attribute) {
                    if ((int)$attribute['id_product_attribute'] > 0) {
                        $product_supplier = new ProductSupplier();
                        $product_supplier->id_product = $product->id;
                        $product_supplier->id_product_attribute = (int)$attribute['id_product_attribute'];
                        $product_supplier->id_supplier = $id;
                        $product_supplier->save();
                    }
                }
            }
        }

        foreach ($attributes as $attribute) {
            foreach ($associated_suppliers as $supplier) {
                if (Tools::isSubmit('supplier_reference_'.$product->id.'_'.$attribute['id_product_attribute'].'_'.$supplier->id_supplier) ||
                    (Tools::isSubmit('product_price_'.$product->id.'_'.$attribute['id_product_attribute'].'_'.$supplier->id_supplier) &&
                        Tools::isSubmit('product_price_currency_'.$product->id.'_'.$attribute['id_product_attribute'].'_'.$supplier->id_supplier))) {
                    $reference = pSQL(
                        Tools::getValue(
                            'supplier_reference_'.$product->id.'_'.$attribute['id_product_attribute'].'_'.$supplier->id_supplier,
                            ''
                        )
                    );

                    $price = (float)str_replace(
                        array(' ', ','),
                        array('', '.'),
                        Tools::getValue(
                            'product_price_'.$product->id.'_'.$attribute['id_product_attribute'].'_'.$supplier->id_supplier,
                            0
                        )
                    );

                    $price = Tools::ps_round($price, 6);

                    $id_currency = (int)Tools::getValue(
                        'product_price_currency_'.$product->id.'_'.$attribute['id_product_attribute'].'_'.$supplier->id_supplier,
                        0
                    );

                    if ($id_currency <= 0 || (!($result = Currency::getCurrency($id_currency)) || empty($result))) {
                        $this->errors[] = Tools::displayError('The selected currency is not valid');
                    }

                    $product_supplier_id = (int)ProductSupplier::getIdByProductAndSupplier($product->id, $attribute['id_product_attribute'], $supplier->id_supplier);

                    if (!$product_supplier_id) {
                        $product->addSupplierReference($supplier->id_supplier, (int)$attribute['id_product_attribute'], $reference, (float)$price, (int)$id_currency);
                        if ($product->id_supplier == $supplier->id_supplier) {
                            if ((int)$attribute['id_product_attribute'] > 0) {
                                $data = array(
                                    'supplier_reference' => pSQL($reference),
                                    'wholesale_price' => (float)Tools::convertPrice($price, $id_currency)
                                );
                                $where = '
                                    a.id_product = '.(int)$product->id.'
                                    AND a.id_product_attribute = '.(int)$attribute['id_product_attribute'];
                                ObjectModel::updateMultishopTable('Combination', $data, $where);
                            } else {
                                $product->wholesale_price = (float)Tools::convertPrice($price, $id_currency); //converted in the default currency
                                $product->supplier_reference = pSQL($reference);
                                $product->update();
                            }
                        }
                    } else {
                        $product_supplier = new ProductSupplier($product_supplier_id);
                        $product_supplier->id_currency = (int)$id_currency;
                        $product_supplier->product_supplier_price_te = (float)$price;
                        $product_supplier->product_supplier_reference = pSQL($reference);
                        $product_supplier->update();
                    }
                } elseif (Tools::isSubmit('supplier_reference_'.$product->id.'_'.$attribute['id_product_attribute'].'_'.$supplier->id_supplier)) {
                    if ((int)$attribute['id_product_attribute'] > 0) {
                        $product_supplier = new ProductSupplier();
                        $product_supplier->id_product = $product->id;
                        $product_supplier->id_product_attribute = (int)$attribute['id_product_attribute'];
                        $product_supplier->id_supplier = $supplier->id_supplier;
                        $product_supplier->save();
                    }
                }
            }
        }

        if ($new_default_supplier != $product->id_supplier) {
            $this->object->id_supplier = $new_default_supplier;
            $this->object->update();
        }
    }

    public function displayDeleteSpecificPriceLink($token, $id, $name)
    {
        $link = $this->context->link->getAdminLink('AdminProductGrid', true);

        $specific_price = new SpecificPrice($id);
        $rule = new SpecificPriceRule((int)$specific_price->id_specific_price_rule);
        $this->context->smarty->assign(array(
            'can_delete_specific_prices' => true,
            'admin_link' => $link,
            'specific_price' => $specific_price,
            'rule' => $rule
        ));
        return $this->context->smarty->fetch(
            _PS_MODULE_DIR_.$this->module->name
            .'/views/templates/admin/edit_specific_price/helpers/list/list_action_delete.tpl'
        );
    }

    public function ajaxProcessGetSpecificPrice()
    {
        $id_product = (int)Tools::getValue('id_product');
        $product = new Product($id_product, false, $this->context->language->id);
        if (Validate::isLoadedObject($product)) {
            $specific_prices_html = '';
            $specific_prices = SpecificPrice::getByProductId((int)$product->id);
            $shops = Shop::getShops();
            $currencies = Currency::getCurrencies();
            $countries = Country::getCountries($this->context->language->id);
            $groups = Group::getGroups($this->context->language->id);
            $tmp = array();
            foreach ($shops as $shop) {
                $tmp[$shop['id_shop']] = $shop;
            }

            $shops = $tmp;
            $tmp = array();

            foreach ($currencies as $currency) {
                $tmp[$currency['id_currency']] = $currency;
            }
            $currencies = $tmp;

            $tmp = array();
            foreach ($countries as $country) {
                $tmp[$country['id_country']] = $country;
            }
            $countries = $tmp;
            $tmp = array();
            foreach ($groups as $group) {
                $tmp[$group['id_group']] = $group;
            }
            $groups = $tmp;

            $default_currency = $this->context->currency;

            if (is_array($specific_prices)) {
                foreach ($specific_prices as &$specific_price) {
                    if ($specific_price['id_product_attribute']) {
                        $combination = new Combination((int)$specific_price['id_product_attribute']);
                        $attributes = $combination->getAttributesName((int)$this->context->language->id);
                        $attributes_name = '';
                        foreach ($attributes as $attribute) {
                            $attributes_name .= $attribute['name'].' - ';
                        }
                        $attributes_name = rtrim($attributes_name, ' - ');
                    } else {
                        $attributes_name = $this->l('All combinations');
                    }

                    $rule = new SpecificPriceRule((int)$specific_price['id_specific_price_rule']);
                    $rule_name = ($rule->id ? $rule->name : '--');

                    if ($specific_price['id_customer']) {
                        $customer = new Customer((int)$specific_price['id_customer']);
                        if (Validate::isLoadedObject($customer)) {
                            $customer_full_name = $customer->firstname.' '.$customer->lastname;
                        }
                        unset($customer);
                    }

                    if (!$specific_price['id_shop']
                        || in_array($specific_price['id_shop'], Shop::getContextListShopID())) {
                        $specific_price['rule_name'] = $rule_name;
                        $specific_price['combination'] = $attributes_name;
                        if (Shop::isFeatureActive()) {
                            $id_shop_sp = $specific_price['id_shop'];
                            $specific_price['shop'] = ($id_shop_sp
                                ? $shops[$id_shop_sp]['name'] : $this->l('All shops'));
                        }
                        $specific_price['currency'] = ($specific_price['id_currency']
                            ? $currencies[$specific_price['id_currency']]['name'] : $this->l('All currencies'));
                        $specific_price['country'] = ($specific_price['id_country']
                            ? $countries[$specific_price['id_country']]['name'] : $this->l('All countries'));
                        $specific_price['group'] = ($specific_price['id_group']
                            ? $groups[$specific_price['id_group']]['name'] : $this->l('All groups'));
                        $specific_price['customer'] = (isset($customer_full_name)
                            ? $customer_full_name : $this->l('All customers'));
                    }
                    $specific_price['id_product'] = $product->id;
                }
            } else {
                $specific_prices = array();
            }

            $attributes = $product->getAttributesGroups((int)$this->context->language->id);
            $combinations = array();

            $combination_prices = array();
            foreach ($attributes as $attribute) {
                $combinations[$attribute['id_product_attribute']]['id_product_attribute']
                    = $attribute['id_product_attribute'];
                if (!isset($combinations[$attribute['id_product_attribute']]['attributes'])) {
                    $combinations[$attribute['id_product_attribute']]['attributes'] = '';
                }
                $combinations[$attribute['id_product_attribute']]['attributes'] .= $attribute['attribute_name'].' - ';

                $combinations[$attribute['id_product_attribute']]['price'] = Tools::displayPrice(
                    Tools::convertPrice(
                        Product::getPriceStatic(
                            (int)$product->id,
                            false,
                            $attribute['id_product_attribute']
                        ),
                        $this->context->currency
                    ),
                    $this->context->currency
                );
                $combination_prices[$attribute['id_product_attribute']] = Tools::convertPrice(
                    Product::getPriceStatic((int)$product->id, true, $attribute['id_product_attribute']),
                    $this->context->currency
                );
            }

            foreach ($combinations as &$combination) {
                $combination['attributes'] = rtrim($combination['attributes'], ' - ');
            }

            $helper_list = new HelperList();
            $helper_list->override_folder = 'edit_specific_price/';
            $helper_list->module = $this->module;
            $helper_list->show_toolbar = true;
            $helper_list->simple_header = true;
            $helper_list->shopLinkType = false;
            $helper_list->identifier = 'id_specific_price';
            $helper_list->token = Tools::getAdminTokenLite('AdminProductGrid');
            $helper_list->title = $this->l('Specific prices').': '.$product->name;
            $helper_list->currentIndex = self::$currentIndex;
            $helper_list->actions = array('deleteSpecificPrice');
            $helper_list->tpl_vars['ps_v'] = _PS_VERSION_;
            $helper_list->tpl_vars['rate'] = 0;
            $helper_list->tpl_vars['shop_active'] = Shop::isFeatureActive();

            $fields = array(
                'id_specific_price' => array(
                    'title' => $this->l('ID'),
                    'remove_onclick' => true,
                    'orderby' => false,
                    'search' => false
                ),
                'rule_name' => array(
                    'title' => $this->l('Rule'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true
                ),
                'combination' => array(
                    'title' => $this->l('Combination'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'id_product_attribute',
                    'lang' => false,
                    'validate' => 'select',
                    'query' => array(
                        'options' => array_merge(array(
                            array('id_product_attribute' => 0, 'attributes' => $this->l('All combinations'))
                        ), $combinations),
                        'id' => 'id_product_attribute',
                        'name' => 'attributes',
                        'editable_value' => 'id_product_attribute'
                    )
                ),
                'currency' => array(
                    'title' => $this->l('Currency'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'id_currency',
                    'lang' => false,
                    'validate' => 'select',
                    'query' => array(
                        'options' => array_merge(array(
                            array('id_currency' => 0, 'name' => $this->l('All currencies'))
                        ), $currencies),
                        'id' => 'id_currency',
                        'name' => 'name',
                        'editable_value' => 'id_currency'
                    )
                ),
                'country' => array(
                    'title' => $this->l('Country'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'id_country',
                    'lang' => false,
                    'validate' => 'select',
                    'query' => array(
                        'options' => array_merge(array(
                            array('id_country' => 0, 'name' => $this->l('All countries'))
                        ), $countries),
                        'id' => 'id_country',
                        'name' => 'name',
                        'editable_value' => 'id_country'
                    )
                ),
                'group' => array(
                    'title' => $this->l('Group'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'id_group',
                    'lang' => false,
                    'validate' => 'select',
                    'query' => array(
                        'options' => array_merge(array(
                            array('id_group' => 0, 'name' => $this->l('All groups'))
                        ), $groups),
                        'id' => 'id_group',
                        'name' => 'name',
                        'editable_value' => 'id_group'
                    )
                ),
                'customer' => array(
                    'title' => $this->l('Customer'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'id_customer',
                    'lang' => false,
                    'validate' => 'select',
                    'query' => array(
                        'options' => array(
                            array('id_customer' => 0, 'name' => $this->l('All customers'))
                        ),
                        'id' => 'id_customer',
                        'name' => 'name',
                        'editable_value' => 'id_customer',
                        'ajax_select2' => 'get_customers'
                    )
                ),
                'price' => array(
                    'title' => $this->l('Fixed price'),
                    'type' => 'price',
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'price',
                    'lang' => false,
                    'validate' => 'specific_price'
                ),
                'reduction_tax' => array(
                    'title' => $this->l('Reduction tax'),
                    'type' => 'bool',
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,
                    'icon' => array(
                        0 => 'disabled.gif',
                        1 => 'enabled.gif',
                        'default' => 'disabled.gif'
                    ),

                    'table' => 'specific_price',
                    'field' => 'reduction_tax',
                    'lang' => false,
                    'validate' => 'bool'
                ),
                'reduction' => array(
                    'title' => $this->l('Reduction'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'reduction',
                    'lang' => false,
                    'validate' => 'string'
                ),
                'reduction_type' => array(
                    'title' => $this->l('Reduction type'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'reduction_type',
                    'lang' => false,
                    'validate' => 'select',
                    'query' => array(
                        'options' => array(
                            array('id' => 'amount', 'name' => 'amount'),
                            array('id' => 'percentage', 'name' => 'percentage'),
                        ),
                        'id' => 'id',
                        'name' => 'name',
                        'editable_value' => 'reduction_type'
                    )
                ),
                'from_quantity' => array(
                    'title' => $this->l('From quantity'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'from_quantity',
                    'lang' => false,
                    'validate' => 'string'
                ),
                'from' => array(
                    'title' => $this->l('From'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'from',
                    'lang' => false,
                    'type' => 'datepicker'
                ),
                'to' => array(
                    'title' => $this->l('To'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'to',
                    'lang' => false,
                    'type' => 'datepicker'
                )
            );

            if (Shop::isFeatureActive()) {
                $fields['shop'] = array(
                    'title' => $this->l('Shop'),
                    'align' => 'center',
                    'orderby' => false,
                    'filter' => false,
                    'search' => false,
                    'remove_onclick' => true,

                    'need_edit' => true,
                    'table' => 'specific_price',
                    'field' => 'id_shop',
                    'lang' => false,
                    'validate' => 'select',
                    'query' => array(
                        'options' => array_merge(array(
                            array('id_shop' => 0, 'name' => $this->l('All shops'))
                        ), $shops),
                        'id' => 'id_shop',
                        'name' => 'name',
                        'editable_value' => 'id_shop'
                    )
                );
            }

            $this->context->smarty->assign(array(
                'ps_version' => (float)_PS_VERSION_,
                'multi_shop' => Shop::isFeatureActive(),
                'shops' => $shops,
                'admin_one_shop' => count($this->context->employee->getAssociatedShops()) == 1,
                'currencies' => $currencies,
                'countries' => $countries,
                'groups' => $groups,
                'specific_prices_html' => $specific_prices_html,
                'country_display_tax_label' => $this->context->country->display_tax_label,
                'currency' => $this->context->currency,
                'product' => $product,
                'combinations' => $combinations,
                'defaultCurrency' => $default_currency,
                'js_mod_dir' => _MODULE_DIR_.'dgridproducts/views/js/',
                'display_multishop_checkboxes' => (Shop::isFeatureActive()
                    && Shop::getContext() != Shop::CONTEXT_SHOP),
                'link' => $this->context->link,
                'combination_prices' => $combination_prices,
                'product_price' => Tools::convertPrice(
                    Product::getPriceStatic((int)$product->id, true, 0, 6, null, false, false),
                    $this->context->currency
                ),
                'table' => $helper_list->generateList($specific_prices, $fields)
            ));

            die(Tools::jsonEncode(array(
                'hasError' => false,
                'content' => $this->context->smarty->fetch(
                    _PS_MODULE_DIR_.'dgridproducts/views/templates/admin/ajax/specific_price.tpl'
                )
            )));
        }
    }

    public function ajaxProcessDeleteSpecificPrice()
    {
        $id_specific_price = (int)Tools::getValue('id_specific_price');
        if (!$id_specific_price || !Validate::isUnsignedId($id_specific_price)) {
            $error = Tools::displayError('The specific price ID is invalid.');
        } else {
            $specific_price = new SpecificPrice((int)$id_specific_price);
            if (!$specific_price->delete()) {
                $error = Tools::displayError('An error occurred while attempting to delete the specific price.');
            }
        }

        if (isset($error)) {
            $json = array(
                'status' => 'error',
                'message'=> $error
            );
        } else {
            $json = array(
                'status' => 'ok',
                'message'=> $this->_conf[1]
            );
        }

        die(Tools::jsonEncode($json));
    }

    public function ajaxProcessAddSpecificPrice()
    {
        $errors = array();

        $id_product = (int)Tools::getValue('id_product');
        $id_product_attribute = Tools::getValue('sp_id_product_attribute');
        $id_shop = Tools::getValue('sp_id_shop');
        $id_currency = Tools::getValue('sp_id_currency');
        $id_country = Tools::getValue('sp_id_country');
        $id_group = Tools::getValue('sp_id_group');
        $id_customer = Tools::getValue('sp_id_customer');
        $price = Tools::getValue('leave_bprice') ? '-1' : Tools::getValue('sp_price');
        $from_quantity = Tools::getValue('sp_from_quantity');
        $reduction = (float)Tools::getValue('sp_reduction');
        $reduction_type = !$reduction ? 'amount' : Tools::getValue('sp_reduction_type');
        $product = new Product($id_product);
        $from = Tools::getValue('sp_from');
        if (!$from) {
            $from = '0000-00-00 00:00:00';
        }

        $to = Tools::getValue('sp_to');
        if (!$to) {
            $to = '0000-00-00 00:00:00';
        }

        if ($reduction_type == 'percentage' && ((float)$reduction <= 0 || (float)$reduction > 100)) {
            $errors[] = $this->l('Submitted reduction value (0-100) is out-of-range');
        } elseif ($this->validateSpecificPrice(
            $product,
            $id_shop,
            $id_currency,
            $id_country,
            $id_group,
            $id_customer,
            $price,
            $from_quantity,
            $reduction,
            $reduction_type,
            $from,
            $to,
            $id_product_attribute,
            $errors
        )) {
            $specific_price = new SpecificPrice();
            $specific_price->id_product = (int)$id_product;
            $specific_price->id_product_attribute = (int)$id_product_attribute;
            $specific_price->id_shop = (int)$id_shop;
            $specific_price->id_currency = (int)$id_currency;
            $specific_price->id_country = (int)$id_country;
            $specific_price->id_group = (int)$id_group;
            $specific_price->id_customer = (int)$id_customer;
            $specific_price->price = (float)$price;
            $specific_price->from_quantity = (int)$from_quantity;
            $sp_reduction = $reduction_type == 'percentage' ? $reduction / 100 : $reduction;
            $specific_price->reduction = (float)$sp_reduction;
            $specific_price->reduction_type = $reduction_type;
            $specific_price->from = $from;
            $specific_price->to = $to;
            if (!$specific_price->add()) {
                $errors[] = $this->l('An error occurred while updating the specific price.');
            }
        }

        if (count($errors)) {
            die(Tools::jsonEncode(array(
                'hasError' => true,
                'errors' => $errors
            )));
        } else {
            die(Tools::jsonEncode(array(
                'hasError' => false
            )));
        }
    }

    public function ajaxProcessSaveLegendImage()
    {
        $id_image = Tools::getValue('id_image');
        $legend = Tools::getValue('legend');
        $image = new Image($id_image);
        if (Validate::isLoadedObject($image)) {
            $image->legend = $legend;
            $image->save();
            die(Tools::jsonEncode(array(
                'hasError' => false,
                'message' => $this->l('Save legend image successfully')
            )));
        } else {
            die(Tools::jsonEncode(array(
                'hasError' => true
            )));
        }
    }

    public function ajaxProcessAddCombination()
    {
        $errors = array();
        $id_product = Tools::getValue('id_product');
        $product = new Product($id_product);
        $array_checks = array(
            'reference' => 'isReference',
            'supplier_reference' => 'isReference',
            'location' => 'isReference',
            'ean13' => 'isEan13',
            'upc' => 'isUpc',
            'wholesale_price' => 'isPrice',
            'price' => 'isPrice',
            'ecotax' => 'isPrice',
            'quantity' => 'isInt',
            'weight' => 'isUnsignedFloat',
            'unit_price_impact' => 'isPrice',
            'default_on' => 'isBool',
            'minimal_quantity' => 'isUnsignedInt',
            'available_date' => 'isDateFormat'
        );
        if (!Validate::isLoadedObject($product)) {
            $errors[] = $this->module->l('Product not exists');
        }

        foreach ($array_checks as $property => $check) {
            if (Tools::getValue('attribute_'.$property) !== false
                && !call_user_func(array('Validate', $check), Tools::getValue('attribute_'.$property))) {
                $errors[] = sprintf($this->module->l('Field %s is not valid'), $property);
            }
        }

        if (!count($errors)) {
            if ($product->productAttributeExists(Tools::getValue('attribute_combination_list'))) {
                $errors[] = $this->module->l('This combination already exists.');
            } else {
                $id_product_attribute = $product->addCombinationEntity(
                    Tools::getValue('attribute_wholesale_price'),
                    Tools::getValue('attribute_price') * Tools::getValue('attribute_price_impact'),
                    Tools::getValue('attribute_weight') * Tools::getValue('attribute_weight_impact'),
                    Tools::getValue('attribute_unity') * Tools::getValue('attribute_unit_impact'),
                    Tools::getValue('attribute_ecotax'),
                    0,
                    Tools::getValue('id_image_attr'),
                    Tools::getValue('attribute_reference'),
                    null,
                    Tools::getValue('attribute_ean13'),
                    Tools::getValue('attribute_default'),
                    Tools::getValue('attribute_location'),
                    Tools::getValue('attribute_upc'),
                    Tools::getValue('attribute_minimal_quantity'),
                    array(),
                    Tools::getValue('available_date_attribute')
                );

                StockAvailable::setProductDependsOnStock(
                    (int)$product->id,
                    $product->depends_on_stock,
                    null,
                    (int)$id_product_attribute
                );
                StockAvailable::setProductOutOfStock(
                    (int)$product->id,
                    $product->out_of_stock,
                    null,
                    (int)$id_product_attribute
                );

                $combination = new Combination((int)$id_product_attribute);
                $combination->setAttributes(Tools::getValue('attribute_combination_list'));

                // images could be deleted before
                $id_images = Tools::getValue('id_image_attr');
                if (!empty($id_images)) {
                    $combination->setImages($id_images);
                }

                $product->checkDefaultAttributes();
                if (Tools::getValue('attribute_default')) {
                    Product::updateDefaultAttribute((int)$product->id);
                    if (isset($id_product_attribute)) {
                        $product->cache_default_attribute = (int)$id_product_attribute;
                    }
                    if ($available_date = Tools::getValue('available_date_attribute')) {
                        $product->setAvailableDate($available_date);
                    }
                }

                $data = $this->getHtmlCombinationsAndImagesByProduct($id_product);

                $product_rate = 0;

                if (Configuration::get('PS_TAX')) {
                    $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
                    $address = new Address();
                    $address->id_country = $country->id;
                    $tax_manager = TaxManagerFactory::getManager(
                        $address,
                        Product::getIdTaxRulesGroupByIdProduct((int)$id_product, $this->context)
                    );
                    $product_rate = $tax_manager->getTaxCalculator()->getTotalRate();
                }

                Search::indexation(false, $product->id);
                die(Tools::jsonEncode(array(
                    'hasError' => false,
                    'images' => $data['images'],
                    'content' => $data['content'],
                    'product_price' => Product::getPriceStatic($id_product, true, null, 6, null, false, false),
                    'product_rate' => $product_rate
                )));
            }
        }

        if (count($errors)) {
            die(Tools::jsonEncode(array(
                'hasError' => true,
                'errors' => $errors
            )));
        }
    }

    public function ajaxProcessDeleteCombination()
    {
        $id_product_attribute = Tools::getValue('id_product_attribute');
        $product_attribute = new Combination($id_product_attribute);
        if (Validate::isLoadedObject($product_attribute)) {
            $product_attribute->delete();
            Search::indexation(false, $product_attribute->id_product);
            die(Tools::jsonEncode(array(
                'hasError' => false
            )));
        } else {
            die(Tools::jsonEncode(array(
                'hasError' => true
            )));
        }
    }

    public function ajaxProcessEditAttributes()
    {
        $id_product_attribute = (int)Tools::getValue('id_product_attribute');
        $attribute_groups = AttributeGroup::getAttributesGroups($this->context->language->id);
        foreach ($attribute_groups as &$attribute_group) {
            $attribute_group['attributes'] = DGridTools::getAttributes(
                $this->context->language->id,
                $attribute_group['id_attribute_group']
            );
        }

        if (version_compare(_PS_VERSION_, '1.6.0.11', '=')) {
            $id_lang = null;
        } else {
            $id_lang = $this->context->language->id;
        }

        $combination = new Combination($id_product_attribute, $id_lang);

        $selected_attributes = $this->getAttributesParams($combination->id_product, $combination->id);
        Search::indexation(false, $combination->id_product);
        $this->context->smarty->assign(array(
            'attribute_groups' => $attribute_groups,
            'combination' => $combination,
            'selected_attributes' => $selected_attributes
        ));

        die(Tools::jsonEncode(array(
            'hasError' => false,
            'content' => $this->context->smarty->fetch(
                _PS_MODULE_DIR_.'dgridproducts/views/templates/admin/ajax/edit_attributes.tpl'
            )
        )));
    }

    public function ajaxProcessMoreSettingCombination()
    {
        $id_product_attribute = (int)Tools::getValue('id_product_attribute');
        $combination = new Combination($id_product_attribute, $this->context->language->id);
        $attribute_unit_impact = array();
        $attribute_unit_impact['selected'] = 0;
        if ($combination->unit_price_impact < 0) {
            $attribute_unit_impact['selected'] = -1;
        } elseif ($combination->unit_price_impact > 0) {
            $attribute_unit_impact['selected'] = 1;
        }

        $this->context->smarty->assign(array(
            'id_product_attribute' => $id_product_attribute,
            'currency' => $this->context->currency,
            'combination' => $combination,
            'attribute_unit_impact' => $attribute_unit_impact
        ));

        die(Tools::jsonEncode(array(
            'hasError' => false,
            'content' => $this->context->smarty->fetch(
                _PS_MODULE_DIR_.'dgridproducts/views/templates/admin/ajax/more_combination.tpl'
            )
        )));
    }

    public function getAttributesParams($id_product, $id_product_attribute)
    {
        $result = Db::getInstance()->executeS('
            SELECT al.`id_attribute`, al.`name`, agl.`id_attribute_group`, agl.`name` as `group`
            FROM `'._DB_PREFIX_.'attribute` a
            LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al
                ON (al.`id_attribute` = a.`id_attribute` AND al.`id_lang` = '.(int)$this->context->language->id.')
            LEFT JOIN `'._DB_PREFIX_.'product_attribute_combination` pac
                ON (pac.`id_attribute` = a.`id_attribute`)
            LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa
                ON (pa.`id_product_attribute` = pac.`id_product_attribute`)
            '.Shop::addSqlAssociation('product_attribute', 'pa').'
            LEFT JOIN `'._DB_PREFIX_.'attribute_group_lang` agl
                ON (a.`id_attribute_group` = agl.`id_attribute_group`
                 AND agl.`id_lang` = '.(int)$this->context->language->id.')
            WHERE pa.`id_product` = '.(int)$id_product.'
                AND pac.`id_product_attribute` = '.(int)$id_product_attribute.'
                AND agl.`id_lang` = '.(int)$this->context->language->id);

        return $result;
    }

    public function ajaxProcessSaveEditAttributes()
    {
        $attributes_name = array();
        $id_product_attribute = (int)Tools::getValue('id_product_attribute');
        $combination = new Combination($id_product_attribute);
        $errors = array();
        if (Validate::isLoadedObject($combination)) {
            $product = new Product($combination->id_product);
            if ($product->productAttributeExists(Tools::getValue('attribute_combination_list'), $combination->id)) {
                $errors[] = $this->module->l('This combination already exists.');
            } else {
                $combination->setAttributes(Tools::getValue('attribute_combination_list'));

                $selected_attributes = Product::getAttributesParams($combination->id_product, $combination->id);

                foreach ($selected_attributes as $selected_attribute) {
                    $attributes_name[] = $selected_attribute['group'].' : '.$selected_attribute['name'];
                }
                Search::indexation(false, $combination->id_product);
            }
        } else {
            $errors[] = $this->module->l('Combination not exists!');
        }

        die(Tools::jsonEncode(
            array(
                'hasError' => (count($errors) ? true : false),
                'errors' => $errors,
                'attributes_name' => implode(', ', $attributes_name)
            )
        ));
    }

    public function ajaxProcessSaveMoreCombination()
    {
        $errors = array();
        $id_product_attribute = (int)Tools::getValue('id_product_attribute');
        $combination = new Combination($id_product_attribute);

        if (Validate::isLoadedObject($combination)) {
            $product = new Product($combination->id_product);
            $wholesale_price = (float)Tools::getValue('attribute_wholesale_price');
            $unit = (float)Tools::getValue('attribute_unity') * (int)Tools::getValue('attribute_unit_impact');
            $minimal_quantity = (int)Tools::getValue('attribute_minimal_quantity');
            $reference = $combination->reference;
            $ean13 = $combination->ean13;
            $location = $combination->location;
            $upc = $combination->upc;
            $available_date = $combination->available_date;
            $id_shop_list = is_array($combination->id_shop_list) ? $combination->id_shop_list : array();

            if (!$product->updateAttribute(
                $id_product_attribute,
                $wholesale_price,
                null,
                null,
                $unit,
                null,
                null,
                $reference,
                $ean13,
                null,
                $location,
                $upc,
                $minimal_quantity,
                $available_date,
                true,
                $id_shop_list
            )) {
                $errors[] = $this->module->l('Unknown error!');
            }
        } else {
            $errors[] = $this->module->l('Combination not exists!');
        }

        die(
            Tools::jsonEncode(
                array(
                    'hasError' => (count($errors) ? true : false),
                    'errors' => $errors
                )
            )
        );
    }

    public function validateSpecificPrice(
        Product $product,
        $id_shop,
        $id_currency,
        $id_country,
        $id_group,
        $id_customer,
        $price,
        $from_quantity,
        $reduction,
        $reduction_type,
        $from,
        $to,
        $id_combination,
        &$errors
    ) {
        if (!Validate::isUnsignedId($id_shop)
            || !Validate::isUnsignedId($id_currency)
            || !Validate::isUnsignedId($id_country)
            || !Validate::isUnsignedId($id_group)
            || !Validate::isUnsignedId($id_customer)) {
            $errors[] = $this->l('Wrong IDs');
        } elseif ((!isset($price)
                && !isset($reduction))
            || (isset($price)
                && !Validate::isNegativePrice($price))
            || (isset($reduction) && !Validate::isPrice($reduction))) {
            $errors[] = $this->l('Invalid price/discount amount');
        } elseif (!Validate::isUnsignedInt($from_quantity)) {
            $errors[] = $this->l('Invalid quantity');
        } elseif ($reduction && !Validate::isReductionType($reduction_type)) {
            $errors[] = $this->l('Please select a discount type (amount or percentage).');
        } elseif ($from && $to && (!Validate::isDateFormat($from) || !Validate::isDateFormat($to))) {
            $errors[] = $this->l('The from/to date is invalid.');
        } elseif (SpecificPrice::exists(
            (int)$product->id,
            $id_combination,
            $id_shop,
            $id_group,
            $id_country,
            $id_currency,
            $id_customer,
            $from_quantity,
            $from,
            $to,
            false
        )) {
            $errors[] = $this->l('A specific price already exists for these parameters.');
        } else {
            return true;
        }
        return false;
    }

    public function updateTags($tags, $id_product, &$errors)
    {
        $tag_success = true;
        if (!Tag::deleteTagsForProduct((int)$id_product)) {
            $errors[] = $this->l('An error occurred while attempting to delete previous tags.');
        }

        foreach ($this->getLanguages() as $l) {
            if ($value = $tags[$l['id_lang']]) {
                $tag_success &= Tag::addTags($l['id_lang'], (int)$id_product, $value);
            }
        }

        Search::indexation(false, $id_product);
        if (!$tag_success) {
            $errors[] = $this->l('An error occurred while adding tags.');
        }
        return $tag_success;
    }

    public function updateAccessories($product, $accessories = array())
    {
        $product->deleteAccessories();
        if ($accessories) {
            $accessories_id = array_unique(explode('-', $accessories));
            if (count($accessories_id)) {
                array_pop($accessories_id);
                $product->changeAccessories($accessories_id);
            }
        }
    }

    public function initContent()
    {
        if ($this->display != 'edit' && $this->display != 'add') {
            if ($id_category = (int)$this->id_current_category) {
                self::$currentIndex .= '&id_category='.(int)$this->id_current_category;
            }

            // If products from all categories are displayed, we don't want to use sorting by position
            if (!$id_category) {
                $default_order_by = '_defaultOrderBy';
                $this->{$default_order_by} = $this->identifier;
                if ($this->context->cookie->{$this->table.'Orderby'} == 'position') {
                    unset($this->context->cookie->{$this->table.'Orderby'});
                    unset($this->context->cookie->{$this->table.'Orderway'});
                }
            }

            if (!$id_category) {
                $id_category = 1;
            }
            $this->tpl_list_vars['is_category_filter'] = (bool)$this->id_current_category;
            $this->context->smarty->assign(array(
                'categories' => Category::getCategories($this->context->language->id, false),
                'id_category' => Configuration::get('PS_ROOT_CATEGORY'),
                'selected_categories' => array((int)$id_category),
                'root' => true,
                'class_tree' => 'block_category_tree',
                'view_header' => false,
                'multiple' => false
            ));
            $this->tpl_list_vars['category_tree'] = $this->context->smarty->fetch(
                _PS_MODULE_DIR_.'dgridproducts/views/templates/admin/ajax/tree.tpl'
            );
            $this->tpl_list_vars['base_url'] = preg_replace('#&id_category=[0-9]*#', '', self::$currentIndex)
                .'&token='.$this->token;
        }
        return parent::initContent(); // TODO: Change the autogenerated stub
    }
    protected function checkFeatures($languages, $feature_id)
    {
        $rules = call_user_func(array('FeatureValue', 'getValidationRules'), 'FeatureValue');
        $feature = Feature::getFeature((int)Configuration::get('PS_LANG_DEFAULT'), $feature_id);
        $val = 0;
        foreach ($languages as $language) {
            if ($val = Tools::getValue('custom_'.$feature_id.'_'.$language['id_lang'])) {
                $current_language = new Language($language['id_lang']);
                if (Tools::strlen($val) > $rules['sizeLang']['value']) {
                    $this->errors[] = sprintf(
                        $this->l('The name for feature %1$s is too long in %2$s.'),
                        ' <b>'.$feature['name'].'</b>',
                        $current_language->name
                    );
                } elseif (!call_user_func(array('Validate', $rules['validateLang']['value']), $val)) {
                    $this->errors[] = sprintf(
                        $this->l('A valid name required for feature. %1$s in %2$s.'),
                        ' <b>'.$feature['name'].'</b>',
                        $current_language->name
                    );
                }

                if (count($this->errors)) {
                    return 0;
                }
                // Getting default language
                if ($language['id_lang'] == Configuration::get('PS_LANG_DEFAULT')) {
                    return $val;
                }
            }
        }
        return 0;
    }
    public $languages;
    public function getLanguages()
    {
        if (!is_null($this->languages)) {
            return $this->languages;
        }
        $languages = Language::getLanguages(false);
        foreach ($languages as &$l) {
            $l['is_default'] = (Configuration::get('PS_LANG_DEFAULT') == $l['id_lang']);
        }
        $this->languages = $languages;
        return $languages;
    }

    public function ajaxProcessAdvancedStockManagement()
    {
        $id_product = (int)Tools::getValue('id_product');
        $id_product_attribute = (Tools::getValue('id_product_attribute')
            ? (int)Tools::getValue('id_product_attribute') : 0);

        $warehouses = Warehouse::getWarehouses();
        $warehouse_locations = WarehouseProductLocation::getCollection($id_product);

        $manager = new StockManager();

        $ids_warehouses = array();
        $quantity_locations = array();
        foreach ($warehouse_locations as $warehouse_location) {
            $ids_warehouses[] = $warehouse_location->id_warehouse;
            $quantity_locations[$warehouse_location->id_warehouse] = $manager->getProductRealQuantities(
                $id_product,
                $id_product_attribute,
                $warehouse_location->id_warehouse
            );
        }

        $this->context->smarty->assign(
            array(
                'warehouses' => $warehouses,
                'locations' => $ids_warehouses,
                'quantity_locations' => $quantity_locations,
                'id_product' => $id_product,
                'id_product_attribute' => $id_product_attribute
            )
        );

        die(Tools::jsonEncode(array(
            'content' => $this->context->smarty->fetch(
                _PS_MODULE_DIR_.$this->module->name.'/views/templates/admin/ajax/advanced_stock_management.tpl'
            )
        )));
    }

    public function ajaxProcessSaveAdvancedStockManagement()
    {
        $locations = Tools::getValue('locations');
        $manager = new StockManager();

        if (is_array($locations) && count($locations)) {
            foreach ($locations as $location) {
                if (array_key_exists('location', $location) && (int)$location['location']) {
                    if (!WarehouseProductLocation::getIdByProductAndWarehouse(
                        (int)$location['id_product'],
                        (int)$location['id_product_attribute'],
                        (int)$location['id_warehouse']
                    )) {
                        Warehouse::setProductLocation(
                            (int)$location['id_product'],
                            (int)$location['id_product_attribute'],
                            (int)$location['id_warehouse'],
                            ''
                        );
                    }

                    $qty = (int)$location['quantity'];
                    $warehouse = new Warehouse($location['id_warehouse']);
                    if ($location['action'] == -1) {
                        $qty = min(
                            $manager->getProductRealQuantities(
                                (int)$location['id_product'],
                                (int)$location['id_product_attribute'],
                                $warehouse->id
                            ),
                            $qty
                        );
                    }

                    if ($location['action'] == 1) {
                        $manager->addProduct(
                            (int)$location['id_product'],
                            (int)$location['id_product_attribute'],
                            $warehouse,
                            $qty,
                            0,
                            Product::getPriceStatic(
                                (int)$location['id_product'],
                                false,
                                0,
                                6,
                                null,
                                false,
                                false
                            )
                        );
                    } elseif ($location['action'] == -1) {
                        $manager->removeProduct(
                            (int)$location['id_product'],
                            (int)$location['id_product_attribute'],
                            $warehouse,
                            $qty,
                            0
                        );
                    }

                    StockAvailable::synchronize((int)$location['id_product']);
                } else {
                    if (WarehouseProductLocation::getIdByProductAndWarehouse(
                        (int)$location['id_product'],
                        (int)$location['id_product_attribute'],
                        (int)$location['id_warehouse']
                    )) {
                        Db::getInstance()->execute('
                            DELETE FROM `'._DB_PREFIX_.'warehouse_product_location`
                            WHERE `id_warehouse` = '.(int)$location['id_warehouse']
                            .' AND `id_product` = '.(int)$location['id_product']
                            .' AND `id_product_attribute` = '.(int)$location['id_product_attribute']);
                    }
                }
            }
        }

        die(Tools::jsonEncode(array(
            'hasError' => false
        )));
    }

    public function updateObjectField($class_name, $field, $id, $value)
    {
        $definition = ObjectModel::getDefinition($class_name);
        $definition_field = ObjectModel::getDefinition($class_name, $field);
        $ids_shop = Shop::getContextListShopID();
        $multi_shop_active = (int)Configuration::get('PS_MULTISHOP_FEATURE_ACTIVE');

        $lang = (array_key_exists('lang', $definition_field) && $definition_field['lang'] ? true : false);
        $shop = (array_key_exists('shop', $definition_field) && $definition_field['shop'] ? true : false);
        $multi_lang_shop = (array_key_exists('multilang_shop', $definition)
        && $definition['multilang_shop'] ? true : false);

        if (!$multi_shop_active || ($lang && $multi_lang_shop) || Shop::getContext() == Shop::CONTEXT_ALL) {
            $sql = 'UPDATE '._DB_PREFIX_.$definition['table'].($lang ? '_lang' : '');

            if ($lang && is_array($value)) {
                $languages = Language::getLanguages(false);
                $sql .= ' SET `'.pSQL($field).'` = CASE '.PHP_EOL;
                foreach ($languages as $l) {
                    if (array_key_exists($l['id_lang'], $value)) {
                        $sql .= 'WHEN `id_lang` = '.(int)$l['id_lang'].' THEN "'
                            .ObjectModel::formatValue($value[$l['id_lang']], $definition_field['type']).'" '.PHP_EOL;
                    }
                }

                $sql .= 'END ';
            } else {
                $sql .= ' SET `'.pSQL($field).'` = "'.ObjectModel::formatValue($value, $definition_field['type']).'"';
            }

            $sql .= ' WHERE `'.$definition['primary'].'` = '.(int)$id;

            if ($multi_shop_active && $lang && $multi_lang_shop) {
                $sql .= ' AND `id_shop` IN('.(count($ids_shop) ?
                        implode(',', array_map('intval', $ids_shop)) : 'NULL').')';
            }

            Db::getInstance()->execute($sql);
        }

        if (!$lang && $shop) {
            $sql_shop = 'UPDATE '._DB_PREFIX_.$definition['table'].'_shop';
            $sql_shop .= ' SET `'.pSQL($field).'` = "'.ObjectModel::formatValue($value, $definition_field['type']).'"';
            $sql_shop .= ' WHERE `'.$definition['primary'].'` = '.(int)$id;
            if ($multi_shop_active) {
                $sql_shop .= ' AND `id_shop` IN('.(count($ids_shop) ? implode(',', array_map('intval', $ids_shop))
                        : 'NULL').')';
            }
            Db::getInstance()->execute($sql_shop);
        }
    }

    public function registerSmartyFunctions()
    {
        $smarty = $this->context->smarty;
        if (!array_key_exists('get_image_lang', $smarty->registered_plugins['function'])) {
            smartyRegisterFunction($smarty, 'function', 'get_image_lang', array($this, 'getImageLang'));
        }
        if (!array_key_exists('no_escape', $smarty->registered_plugins['modifier'])) {
            smartyRegisterFunction($smarty, 'modifier', 'no_escape', array(__CLASS__, 'noEscape'));
        }
    }

    public static function noEscape($value)
    {
        return $value;
    }

    public function getImageLang($smarty)
    {
        $path = $smarty['path'];
        $module_path = $this->module->name.'/views/img/';
        $module_lang_path = $module_path.Context::getContext()->language->iso_code.'/';
        $module_lang_default_path = $module_path.'en/';
        $path_image = false;
        if (file_exists(_PS_MODULE_DIR_.$module_lang_path.$path)) {
            $path_image = _MODULE_DIR_.$module_lang_path.$path;
        } elseif (file_exists(_PS_MODULE_DIR_.$module_lang_default_path.$path)) {
            $path_image = _MODULE_DIR_.$module_lang_default_path.$path;
        }

        if ($path_image) {
            return '<img src="'.$path_image.'">';
        } else {
            return '[can not load image "'.$path.'"]';
        }
    }

    public function ajaxProcessUpdateImagePosition()
    {
        $res = false;
        if ($json = Tools::getValue('json')) {
            $res = true;
            $json = Tools::stripslashes($json);
            $images = Tools::jsonDecode($json, true);
            foreach ($images as $id => $position) {
                $img = new Image((int)$id);
                $img->position = (int)$position;
                $res &= $img->update();
            }
        }

        if ($res) {
            $this->jsonConfirmation($this->_conf[25]);
        } else {
            $this->jsonError(Tools::displayError('An error occurred while attempting to move this picture.'));
        }
    }

    public function ajaxProcessGetCustomers()
    {
        $query = Tools::getValue('guery');
        $customers = Db::getInstance()->executeS('SELECT id_customer as id, CONCAT(firstname, " ", lastname) as text
            FROM '._DB_PREFIX_.'customer
            WHERE CONCAT(id_customer, " ", firstname, " ", lastname) LIKE "%'.pSQL($query).'%"');

        die(Tools::jsonEncode(array(
            'items' => array_merge(array(
                array('id' => 0, 'text' => $this->l('All customers'))
            ), $customers)
        )));
    }
}
