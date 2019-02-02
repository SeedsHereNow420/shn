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

require_once(dirname(__FILE__).'/../../classes/tools/config.php');

class AdminMassEditProductController extends ModuleAdminController
{
    public $ids_shop = null;
    public $sql_shop = null;

    public function __construct()
    {
        $this->context = Context::getContext();
        $this->table = 'configuration';
        $this->identifier = 'id_configuration';
        $this->className = 'Configuration';
        $this->bootstrap = true;
        $this->display = 'edit';
        parent::__construct();
        $this->ids_shop = MassEditTools::getShopIds();
        $this->sql_shop = MassEditTools::getSqlShop();
    }

    public function setMedia()
    {
        parent::setMedia();
        ToolsModuleCPM::autoloadCSS($this->module->getPathUri().'views/css/autoload/');
        $this->context->controller->addJqueryUI('ui.widget');
        $this->context->controller->addJqueryPlugin('tagify');

        if (_PS_VERSION_ < 1.6) {
            $this->context->controller->addJqueryUI('ui.slider');
            $this->context->controller->addJqueryUI('ui.datepicker');
            $this->context->controller->addCSS($this->module->getPathUri().'views/css/jquery-ui-timepicker-addon.css');
            $this->context->controller->addJS($this->module->getPathUri().'views/js/jquery-ui-timepicker-addon.js');
        } else {
            $this->context->controller->addJqueryPlugin('timepicker');
        }

        $this->context->controller->addJS($this->module->getPathUri().'views/js/jquery.insertAtCaret.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/redactor/redactor.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/redactor/plugins/table.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/redactor/plugins/video.js');

        $this->context->controller->addJS($this->module->getPathUri().'views/js/tree_custom.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/jquery.finderSelect.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/search_product.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/selector_container.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/vendor/select2.min.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/langField.jquery.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/admin.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/bootstrap-dropdown.js');
        $this->context->controller->addJS(
            'https://seosaps.com/ru/module/seosamanager/manager?ajax=1&action=script&iso_code='
            .Context::getContext()->language->iso_code
        );
    }

    public function renderFormCreateProducts()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => '',
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Name'),
                        'hint' => $this->l('Invalid characters:').' &lt;&gt;;=#{}',
                        'name' => 'name',
                        'lang' => true,
                        'required' => true,
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Attribute for name suffix'),
                        'hint' => $this->l('The name of the attribute will be added to the title'),
                        'name' => 'attribute',
                        'options' => array(
                            'default' => array('value' => 0, 'label' => '--'),
                            'query' => AttributeGroup::getAttributesGroups($this->context->language->id),
                            'id' => 'id_attribute_group',
                            'name' => 'name',
                        ),
                    ),
                ),
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = $this->context->controller->allow_employee_form_lang;
        $this->fields_form = array();

        $helper->tpl_vars = array(
            'fields_value' => array('name' => array(1 => '', 2 => ''), 'attribute' => ''),
            'languages' => $this->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($fields_form));
    }

    public function renderForm()
    {
        $features = MassEditTools::getFeatures($this->context->language->id);

        $input_product_name_type_search = array(
            'name' => 'product_name_type_search',
            'values' => array(
                array(
                    'id' => 'exact_match',
                    'text' => $this->l('Exact match'),
                ),
                array(
                    'id' => 'occurrence',
                    'text' => $this->l('Search for occurrence'),
                ),
            ),
            'default_id' => 'exact_match',
        );

        foreach ($features as &$feature) {
            $feature['values'] = FeatureValue::getFeatureValuesWithLang(
                $this->context->language->id,
                $feature['id_feature']
            );
        }

        $attribute_groups = AttributeGroup::getAttributesGroups($this->context->language->id);
        if (is_array($attribute_groups) && count($attribute_groups)) {
            foreach ($attribute_groups as &$attribute_group) {
                $attribute_group['attributes'] = AttributeGroup::getAttributes(
                    $this->context->language->id,
                    (int)$attribute_group['id_attribute_group']
                );
            }
        }

        $address = new Address();
        $address->id_country = (int)$this->context->country->id;
        $tax_rules_groups = TaxRulesGroup::getTaxRulesGroups(true);

        $variable_features = Feature::getFeatures($this->context->language->id);
        foreach ($variable_features as &$variable_feature) {
            $variable_feature['values'] = FeatureValue::getFeatureValuesWithLang(
                $this->context->language->id,
                (int)$variable_feature['id_feature']
            );
        }

        if (_PS_VERSION_ < 1.6) {
            $search_link = 'searchcron.php?full=1&token='.Tools::substr(_COOKIE_KEY_, 34, 8).'&redirect=1';
        } else {
            $search_link = 'searchcron.php?full=1&amp;token='.Tools::substr(_COOKIE_KEY_, 34, 8).'&redirect=1'
                .(Shop::getContext() == Shop::CONTEXT_SHOP ? '&id_shop='.(int)Context::getContext()->shop->id : '');
        }

        $id_lang = $this->context->language->id;
        $attribures_groups = Db::getInstance()->executeS(
            'SELECT agl.`name`, agl.`id_attribute_group` 
                FROM `'._DB_PREFIX_.'attribute_group` ag
                LEFT JOIN `'._DB_PREFIX_.'attribute_group_lang` agl
                ON (ag.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = '.(int)$id_lang.')
                LEFT JOIN `'._DB_PREFIX_.'attribute` a
                ON a.`id_attribute_group` = ag.`id_attribute_group`
                LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al
                ON (a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = '.(int)$id_lang.')
                '.Shop::addSqlAssociation('attribute_group', 'ag').'
            '.Shop::addSqlAssociation('attribute', 'a').'
            WHERE a.`id_attribute` IS NOT NULL AND al.`name` IS NOT NULL AND agl.`id_attribute_group` IS NOT NULL
            GROUP BY agl.`id_attribute_group`
            ORDER BY agl.`name` ASC, a.`position` ASC
        '
        );

        $this->context->smarty->assign(
            array(
                'link' => $this->context->link,
                'feature_tab_html' => Module::isEnabled('seosaextendedfeatures'),
            )
        );

        $tpl_vars = array(
            'categories' => Category::getCategories($this->context->language->id, false),
            'simple_categories' => Category::getSimpleCategories($this->context->language->id),
            'manufacturers' => Manufacturer::getManufacturers(false, 0, false, false, false, false, true),
            'suppliers' => Supplier::getSuppliers(false, 0, false),
            'currencies' => Currency::getCurrencies(false, true),
            'id_default_currency' => Configuration::get('PS_CURRENCY_DEFAULT'),
            'countries' => Country::getCountries($this->context->language->id, true),
            'groups' => Group::getGroups($this->context->language->id),
            'features' => $features,
            'languages' => $this->getLanguages(),
            'default_form_language' => $this->context->language->id,
            'input_product_name_type_search' => $input_product_name_type_search,
            'carriers' => Carrier::getCarriers(
                $this->context->language->id,
                false,
                false,
                false,
                null,
                Carrier::ALL_CARRIERS
            ),
            'upload_file_dir' => _MODULE_DIR_.$this->module->name.'/lib/redactor/file_upload.php',
            'upload_image_dir' => _MODULE_DIR_.$this->module->name.'/lib/redactor/image_upload.php',
            'advanced_stock_management' => (int)Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'),
            'warehouses' => Warehouse::getWarehouses(),
            'attribute_groups' => $attribute_groups,
            'total_features' => MassEditTools::getTotalFeatures(),
            'count_feature_view' => MassEditTools::LIMIT_FEATURES,
            'attachments' => Attachment::getAttachments($this->context->language->id, 0, false),
            'tax_rules_groups' => $tax_rules_groups,
            'tax_exclude_taxe_option' => Tax::excludeTaxeOption(),
            'variables' => array(
                'static' => array(
                    '{name}' => $this->l('name product'),
                    '{price}' => $this->l('price final'),
                    '{manufacturer}' => $this->l('manufacturer'),
                    '{category}' => $this->l('default category'),
                ),
                'features' => $variable_features,
            ),
            'static_for_name' => array(
                '{title}' => $this->l('title'),
                '{price}' => $this->l('price final'),
                '{manufacturer}' => $this->l('manufacturer'),
                '{category}' => $this->l('default category'),
            ),
            'link_on_tab_module' => $this->module->getAdminLink(),
            'search_link' => $search_link,
            'pack_stock_type' => Configuration::get('PS_PACK_STOCK_TYPE'),
            'token_preferences' => Tools::getAdminTokenLite('AdminPPreferences'),
            'attribures_groups' => $attribures_groups,
            'form_create_products' => $this->renderFormCreateProducts(),
            'currency2' => $this->context->currency,
            'templates_products' => TemplateProductsMEP::getAll(true),
        );

        $this->tpl_form_vars = array_merge($this->tpl_form_vars, $tpl_vars);
        $this->fields_form = array(
            'legend' => array(
                'title' => 'tree_custom.tpl',
            ),
        );

        if (version_compare(_PS_VERSION_, '1.6.0', '<')) {
            $this->context->controller->addCSS($this->module->getPathURI().'views/css/admin-theme.css');
        }

        if (_PS_VERSION_ > 1.6) {
            $this->context->controller->addCSS($this->module->getPathURI().'views/css/admin-theme1_7.css');
        }

        return parent::renderForm();
    }

    public function postProcess()
    {
        parent::postProcess();

        if (Tools::getValue('action') == 'getMaxPositionForImageCaption') {
            $in = '';
            if (is_array(Tools::getValue('products'))) {
                foreach (Tools::getValue('products') as $product) {
                    $in .= $product['id'].', ';
                }
            }
            $in = rtrim($in, ', ');

            $count = $in ? (int)Db::getInstance()->getValue(
                'SELECT MAX(position) FROM `'._DB_PREFIX_.'image` WHERE `id_product` IN('.pSQL($in).')'
            ) : 0;

            $string = $this->l('Position');

            $option = '';
            for ($i = 1; $i <= $count; $i++) {
                $option .= '<option value="'.$i.'">'.$string.' '.$i.'</option>';
            }

            die(Tools::jsonEncode(array('option' => $option)));
        }
    }

    const SEARCH_TYPE_NAME = 0;
    const SEARCH_TYPE_ID = 1;
    const SEARCH_TYPE_REFERENCE = 2;
    const SEARCH_TYPE_EAN13 = 3;
    const SEARCH_TYPE_UPC = 4;
    const SEARCH_TYPE_DESCRIPTION = 5;
    const SEARCH_TYPE_DESCRIPTION_SHORT = 6;
    protected static $search_type_fields = array(
        self::SEARCH_TYPE_NAME => 'pl.`name`',
        self::SEARCH_TYPE_ID => 'p.`id_product`',
        self::SEARCH_TYPE_REFERENCE => 'p.`reference`',
        self::SEARCH_TYPE_EAN13 => 'p.`ean13`',
        self::SEARCH_TYPE_UPC => 'p.`upc`',
        self::SEARCH_TYPE_DESCRIPTION => 'pl.`description`',
        self::SEARCH_TYPE_DESCRIPTION_SHORT => 'pl.`description_short`',
    );

    public function getIdShopSql()
    {
        return Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP
            ? (int)$this->context->shop->id : 'p.id_shop_default';
    }

    const PRODUCT_NAME_TYPE_SEARCH_OCCURRENCE = 'occurrence';
    const PRODUCT_NAME_TYPE_SEARCH_EXACT_MATCH = 'exact_match';

    public function ajaxProcessSearchProducts()
    {
        $categories = Tools::getValue('categories');
        $search_only_default_category = Tools::getValue('search_only_default_category');
        $search_query = Tools::getValue('search_query');
        $type_search = (int)Tools::getValue('type_search', 0);
        $manufacturers = Tools::getValue('manufacturers');
        $suppliers = Tools::getValue('suppliers');
        $features = Tools::getValue('features');
        $no_feature_value = Tools::getValue('no_feature_value');
        $how_many_show = (int)Tools::getValue('how_many_show', 20);
        $active = (int)Tools::getValue('active', 0);
        $disable = (int)Tools::getValue('disable', 0);
        $page = (int)Tools::getValue('page', 1);
        $exclude_ids = Tools::getValue('exclude_ids', array());
        $product_name_type_search = Tools::getValue('product_name_type_search');
        $qty_from = Tools::getValue('qty_from');
        $qty_to = Tools::getValue('qty_to');
        $price_from = Tools::getValue('price_from');
        $price_to = Tools::getValue('price_to');
        $orderby = Tools::getValue('orderby');
        $orderway = Tools::getValue('orderway');
        $this->intValueRequestVar($exclude_ids);
        $hash = array();

        $sql_category = false;
        if (is_array($categories) && count($categories)) {
            $ids_categories = array();
            foreach ($categories as $category) {
                $ids_categories[] = (int)$category['id'];
            }
            $sql_category = implode(',', $ids_categories);
            $hash[] = 'categories-'.implode('_', $ids_categories);
        }

        $qty_query = array();

        if ($qty_from != '') {
            $qty_query[] = 'sa.`quantity` >= '.(int)$qty_from;
            $hash[] = 'qty_from-'.(int)$qty_from;
        }

        if ($qty_to != '') {
            $qty_query[] = 'sa.`quantity` <= '.(int)$qty_to;
            $hash[] = 'qty_to-'.(int)$qty_to;
        }

        $price_query = array();

        if ($price_from != '') {
            $price_query[] = 'pss.`price` >= '.(float)$price_from;
            $hash[] = 'price_from-'.str_replace('.', '_', (string)$price_from);
        }

        if ($price_to != '') {
            $price_query[] = 'pss.`price` <= '.(float)$price_to;
            $hash[] = 'price_to-'.str_replace('.', '_', (string)$price_to);
        }

        $sql_manufactures = false;
        if (is_array($manufacturers) && count($manufacturers)) {
            $this->intValueRequestVar($manufacturers);
            $sql_manufactures = implode(',', $manufacturers);
            $hash[] = 'manufacturers-'.implode('_', $manufacturers);
        }

        $sql_suppliers = false;
        if (is_array($suppliers) && count($suppliers)) {
            $this->intValueRequestVar($suppliers);
            $sql_suppliers = implode(',', $suppliers);
            $hash[] = 'suppliers-'.implode('_', $suppliers);
        }

        $sql_search_query = false;
        if ($search_query) {
            switch ($type_search) {
                case self::SEARCH_TYPE_ID:
                    $ids = explode(' ', $search_query);
                    $this->intValueRequestVar($ids);
                    $sql_search_query = '('.implode(',', $ids).')';
                    $sql_type_search = 'p.`id_product` IN';
                    $hash[] = 'type_search-1';
                    break;
                case self::SEARCH_TYPE_NAME:
                case self::SEARCH_TYPE_REFERENCE:
                case self::SEARCH_TYPE_EAN13:
                case self::SEARCH_TYPE_UPC:
                case self::SEARCH_TYPE_DESCRIPTION:
                case self::SEARCH_TYPE_DESCRIPTION_SHORT:
                    if ($product_name_type_search == self::PRODUCT_NAME_TYPE_SEARCH_EXACT_MATCH) {
                        $sql_search_query = '"'.pSQL($search_query).'"';
                    } elseif ($product_name_type_search == self::PRODUCT_NAME_TYPE_SEARCH_OCCURRENCE) {
                        $sql_search_query = '"%'.pSQL($search_query).'%"';
                    }
                    $sql_type_search = self::$search_type_fields[$type_search].' LIKE ';
                    $hash[] = 'type_search-'.$type_search;
                    break;
                default:
                    throw new LogicException('Unknown search type');
            }
            $hash[] = 'search_query-'.urlencode($search_query);
        }

        $hash[] = 'product_name_type_search-'.$product_name_type_search;

        if ($active) {
            $hash[] = 'active-1';
        }
        if ($disable) {
            $hash[] = 'disable-1';
        }

        if ($page > 1) {
            $hash[] = 'page-'.$page;
        }

        if ($how_many_show > 20) {
            $hash[] = 'how_many_show-'.$how_many_show;
        }
        $id_shop = $this->getIdShopSql();
        $nb_products = Db::getInstance()->getValue(
            'SELECT COUNT(DISTINCT p.`id_product`)
		FROM '._DB_PREFIX_.'product p
		JOIN `'._DB_PREFIX_.'product_shop` pss ON (p.`id_product` = pss.`id_product` AND pss.id_shop = '.pSQL($id_shop).')
		LEFT JOIN '._DB_PREFIX_.'product_lang pl ON p.`id_product` = pl.`id_product` AND pl.`id_lang` = '.(int)$this->context->language->id.'
		LEFT JOIN '._DB_PREFIX_.'category_product cp ON cp.`id_product` = p.`id_product`
		AND pl.`id_shop` = '.pSQL($id_shop).'
		WHERE 1
		'.($sql_search_query ? 'AND '.$sql_type_search.' '.$sql_search_query.' ' : '').'
		'.($sql_category ? ('AND '.($search_only_default_category ? 'p.`id_category_default`' : 'cp.`id_category`').' IN('.pSQL($sql_category).')') : '').'
		'.($sql_manufactures !== false ? 'AND p.`id_manufacturer` IN('.pSQL($sql_manufactures).')' : '').'
		'.($sql_suppliers !== false ? 'AND p.`id_supplier` IN('.pSQL($sql_suppliers).')' : '').'
		'.($active && !$disable ? ' AND pss.`active` = 1 ' : '').'
		'.($disable && !$active ? ' AND pss.`active` = 0 ' : '').'
		'.(is_array($features) && count($features) ?
                'AND (SELECT COUNT(fp.`id_feature`)
			FROM '._DB_PREFIX_.'feature_product fp WHERE fp.`id_product` = p.`id_product`
			AND fp.`id_feature_value` IN ('.implode(',', array_map('intval', $features)).')) ' : '').'
		'.(is_array($no_feature_value) && count($no_feature_value) ?
                'AND (SELECT COUNT(p2.`id_product`)
        FROM '._DB_PREFIX_.'product p2 LEFT JOIN '._DB_PREFIX_.'feature_product fp2 ON p2.`id_product`=fp2.`id_product` WHERE p.`id_product` NOT IN (
        SELECT fp3.id_product FROM '._DB_PREFIX_.'feature_product fp3 WHERE fp3.id_feature IN('.implode(',', array_map('intval', $no_feature_value)).'))) ' : '').'
		'.(is_array($exclude_ids) && count($exclude_ids) ? ' AND pss.`id_product` NOT IN('.pSQL(implode(',', $exclude_ids)).')' : '')
        );

        $order_by = $orderby && $orderway ? ' ORDER BY '.$orderby.' '.$orderway : '';

        $result = Db::getInstance()->executeS(
            'SELECT p.`id_product`, p.reference, pss.`active`,
			pss.`price`,
			pl.`name`, pl.`link_rewrite`,
			sa.`quantity`,
			cl.`name` as category,
			m.`name` as manufacturer,
			s.`name` as supplier,
			(SELECT i.`id_image` FROM '._DB_PREFIX_.'image i WHERE i.`id_product` = p.`id_product` ORDER BY i.`cover` DESC LIMIT 0,1) cover
		FROM '._DB_PREFIX_.'product p
		JOIN `'._DB_PREFIX_.'product_shop` pss ON (p.`id_product` = pss.`id_product` AND pss.id_shop = '.pSQL($id_shop).')
		LEFT JOIN '._DB_PREFIX_.'tax_rules_group trg ON trg.`id_tax_rules_group` = p.`id_tax_rules_group`
		LEFT JOIN '._DB_PREFIX_.'manufacturer m ON m.`id_manufacturer` = p.`id_manufacturer`
		LEFT JOIN '._DB_PREFIX_.'supplier s ON s.`id_supplier` = p.`id_supplier`
		LEFT JOIN '._DB_PREFIX_.'tax t ON t.`id_tax` = p.`id_tax_rules_group`
		LEFT JOIN '._DB_PREFIX_.'product_lang pl ON p.`id_product` = pl.`id_product`
		AND pl.`id_lang` = '.(int)$this->context->language->id.' AND pl.`id_shop` = '.pSQL($id_shop).'
		LEFT JOIN '._DB_PREFIX_.'category_product cp ON cp.`id_product` = p.`id_product`
		LEFT JOIN '._DB_PREFIX_.'category_lang cl ON cl.`id_category` = pss.`id_category_default` AND cl.`id_lang` = '.(int)$this->context->language->id.'
		LEFT JOIN '._DB_PREFIX_.'stock_available sa ON (sa.`id_product` = p.`id_product` AND sa.`id_product_attribute` = 0
		'.StockAvailable::addSqlShopRestriction(null, null, 'sa').')
		WHERE 1
		'.($sql_search_query ? 'AND '.$sql_type_search.' '.$sql_search_query.' ' : '').'
		'.($sql_category ? ('AND '.($search_only_default_category ? 'p.`id_category_default`' : 'cp.`id_category`').' IN('.pSQL($sql_category).')') : '').'
		'.($sql_manufactures !== false ? 'AND p.`id_manufacturer` IN('.pSQL($sql_manufactures).')' : '').'
		'.($sql_suppliers !== false ? 'AND p.`id_supplier` IN('.pSQL($sql_suppliers).')' : '').'
		'.($active && !$disable ? ' AND pss.`active` = 1 ' : '').'
		'.($disable && !$active ? ' AND pss.`active` = 0 ' : '').'
		'.(is_array($features) && count($features) ?
                'AND (SELECT COUNT(fp.`id_feature`)
			FROM '._DB_PREFIX_.'feature_product fp WHERE fp.`id_product` = p.`id_product`
			AND fp.`id_feature_value` IN ('.implode(',', array_map('intval', $features)).')) ' : '').'
        '.(is_array($no_feature_value) && count($no_feature_value) ?
                'AND (SELECT COUNT(p2.`id_product`)
        FROM '._DB_PREFIX_.'product p2 LEFT JOIN '._DB_PREFIX_.'feature_product fp2 ON p2.`id_product`=fp2.`id_product` WHERE p.`id_product` NOT IN (
        SELECT fp3.id_product FROM '._DB_PREFIX_.'feature_product fp3 WHERE fp3.id_feature IN('.implode(',', array_map('intval', $no_feature_value)).'))) ' : '').'
		'.(count($qty_query) ? ' AND '.implode(' AND ', $qty_query) : '').'
		'.(count($price_query) ? ' AND '.implode(' AND ', $price_query) : '').'
		'.(is_array($exclude_ids) && count($exclude_ids) ? ' AND pss.`id_product` NOT IN('.pSQL(implode(',', $exclude_ids)).')' : '').'
		GROUP BY p.`id_product`, cl.`name`'.$order_by.' LIMIT '.(((int)$page - 1) * (int)$how_many_show).','.(int)$how_many_show
        );

        $count_result = Db::getInstance()->executeS(
            'SELECT COUNT(*)
		FROM '._DB_PREFIX_.'product p
		JOIN `'._DB_PREFIX_.'product_shop` pss ON (p.`id_product` = pss.`id_product` AND pss.id_shop = '.pSQL($id_shop).')
		LEFT JOIN '._DB_PREFIX_.'tax_rules_group trg ON trg.`id_tax_rules_group` = p.`id_tax_rules_group`
		LEFT JOIN '._DB_PREFIX_.'manufacturer m ON m.`id_manufacturer` = p.`id_manufacturer`
		LEFT JOIN '._DB_PREFIX_.'supplier s ON s.`id_supplier` = p.`id_supplier`
		LEFT JOIN '._DB_PREFIX_.'tax t ON t.`id_tax` = p.`id_tax_rules_group`
		LEFT JOIN '._DB_PREFIX_.'product_lang pl ON p.`id_product` = pl.`id_product`
		AND pl.`id_lang` = '.(int)$this->context->language->id.' AND pl.`id_shop` = '.pSQL($id_shop).'
		LEFT JOIN '._DB_PREFIX_.'category_product cp ON cp.`id_product` = p.`id_product`
		LEFT JOIN '._DB_PREFIX_.'category_lang cl ON cl.`id_category` = pss.`id_category_default` AND cl.`id_lang` = '.(int)$this->context->language->id.'
		LEFT JOIN '._DB_PREFIX_.'stock_available sa ON (sa.`id_product` = p.`id_product` AND sa.`id_product_attribute` = 0
		'.StockAvailable::addSqlShopRestriction(null, null, 'sa').')
		WHERE 1
		'.($sql_search_query ? 'AND '.$sql_type_search.' '.$sql_search_query.' ' : '').'
		'.($sql_category ? ('AND '.($search_only_default_category ? 'p.`id_category_default`' : 'cp.`id_category`').' IN('.pSQL($sql_category).')') : '').'
		'.($sql_manufactures !== false ? 'AND p.`id_manufacturer` IN('.pSQL($sql_manufactures).')' : '').'
		'.($sql_suppliers !== false ? 'AND p.`id_supplier` IN('.pSQL($sql_suppliers).')' : '').'
		'.($active && !$disable ? ' AND pss.`active` = 1 ' : '').'
		'.($disable && !$active ? ' AND pss.`active` = 0 ' : '').'
		'.(is_array($features) && count($features) ?
                'AND (SELECT COUNT(fp.`id_feature`)
			FROM '._DB_PREFIX_.'feature_product fp WHERE fp.`id_product` = p.`id_product`
			AND fp.`id_feature_value` IN ('.implode(',', array_map('intval', $features)).')) ' : '').'
		'.(is_array($no_feature_value) && count($no_feature_value) ?
                'AND (SELECT COUNT(p2.`id_product`)
        FROM '._DB_PREFIX_.'product p2 LEFT JOIN '._DB_PREFIX_.'feature_product fp2 ON p2.`id_product`=fp2.`id_product` WHERE p.`id_product` NOT IN (
        SELECT fp3.id_product FROM '._DB_PREFIX_.'feature_product fp3 WHERE fp3.id_feature IN('.implode(',', array_map('intval', $no_feature_value)).'))) ' : '').'
		'.(count($qty_query) ? ' AND '.implode(' AND ', $qty_query) : '').'
		'.(count($price_query) ? ' AND '.implode(' AND ', $price_query) : '').'
		'.(is_array($exclude_ids) && count($exclude_ids) ? ' AND pss.`id_product` NOT IN('.pSQL(implode(',', $exclude_ids)).')' : '').'
		GROUP BY p.`id_product`, cl.`name`'
        );

        $count_result = is_array($count_result) ? count($count_result) : 0;

        $pages_nb = ceil($nb_products / $how_many_show);
        $range = 5;
        $start = ($page - $range);
        if ($start < 1) {
            $start = 1;
        }
        $stop = ($page + $range);
        if ($stop > $pages_nb) {
            $stop = (int)$pages_nb;
        }
        $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
        $address = new Address();
        $address->id_country = $country->id;
        foreach ($result as &$product) {
            $nothing = null;
            $advanced_stock_management = (bool)Db::getInstance()->getValue(
                '
					SELECT `advanced_stock_management`
					FROM '._DB_PREFIX_.'product_shop
					WHERE id_product='.(int)$product['id_product'].Shop::addSqlRestriction()
            );

            $product['price_final'] = Product::getPriceStatic(
                $product['id_product'],
                true,
                null,
                (int)Configuration::get('PS_PRICE_DISPLAY_PRECISION'),
                null,
                false,
                true,
                1,
                true,
                null,
                null,
                null,
                $nothing
            );

            $product['advanced_stock_management'] = ((bool)StockAvailable::dependsOnStock(
                (int)$product['id_product']
            ) && $advanced_stock_management);
            $product['image'] = ImageManager::thumbnail(
                _PS_PROD_IMG_DIR_.Image::getImgFolderStatic($product['cover']).$product['cover'].'.jpg',
                'product_mini_'.$product['id_product'].'_'.$product['cover'].'.jpg',
                45
            );
        }
        $products = array();
        foreach ($result as $prod) {
            $products[$prod['id_product']] = $prod;
        }

        $currency = Currency::getCurrency(Configuration::get('PS_CURRENCY_DEFAULT'));
        $currency = $currency['id_currency'];

        $id_lang = $this->context->language->id;
        $attribures_groups = Db::getInstance()->executeS(
            'SELECT agl.`name`, agl.`id_attribute_group` 
				FROM `'._DB_PREFIX_.'attribute_group` ag
				LEFT JOIN `'._DB_PREFIX_.'attribute_group_lang` agl
				ON (ag.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = '.(int)$id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'attribute` a
				ON a.`id_attribute_group` = ag.`id_attribute_group`
				LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al
				ON (a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = '.(int)$id_lang.')
				'.Shop::addSqlAssociation('attribute_group', 'ag').'
			'.Shop::addSqlAssociation('attribute', 'a').'
			WHERE a.`id_attribute` IS NOT NULL AND al.`name` IS NOT NULL AND agl.`id_attribute_group` IS NOT NULL
			GROUP BY agl.`id_attribute_group`
			ORDER BY agl.`name` ASC, a.`position` ASC
		'
        );

        $this->context->smarty->assign(
            array(
                'currency' => $currency,
                'products' => $products,
                'link' => $this->context->link,
                'nb_products' => $nb_products,
                'products_per_page' => $pages_nb,
                'pages_nb' => $pages_nb,
                'p' => $page,
                'n' => $pages_nb,
                'range' => $range,
                'start' => $start,
                'stop' => $stop,
                'attribures_groups' => $attribures_groups,
            )
        );
        die(
            Tools::jsonEncode(
                array(
                    'products' => $this->context->smarty->fetch(
                        _PS_MODULE_DIR_.'masseditproduct/views/templates/admin/mass_edit_product/helpers/form/products.tpl'
                    ),
                    'hash' => implode('&', $hash),
                    'count_result' => $count_result,
                )
            )
        );
    }

    public $trigger_update_date_upd = false;

    public function updateDateUpdProducts($ids, $date_upd = null)
    {
        if (!Tools::getValue('change_date_upd')) {
            return false;
        }
        if ($this->trigger_update_date_upd) {
            return false;
        }

        if (is_null($date_upd)) {
            $date_upd = date('Y-m-d H:i:s');
        }

        Db::getInstance()->update(
            'product',
            array('date_upd' => $date_upd),
            ' id_product IN('.pSQL(implode(',', array_map('intval', $ids))).')'
        );

        Db::getInstance()->update(
            'product_shop',
            array(
                'date_upd' => $date_upd,
            ),
            ' id_product IN('.pSQL(implode(',', array_map('intval', $ids))).')'
            .(Shop::isFeatureActive() && $this->sql_shop ? ' AND id_shop '.pSQL($this->sql_shop) : '')
        );
        $this->trigger_update_date_upd = true;
    }

    public function updateDateUpdProduct($id, $date_upd = null)
    {
        if (!Tools::getValue('change_date_upd')) {
            return false;
        }
        if (is_null($date_upd)) {
            $date_upd = date('Y-m-d H:i:s');
        }
        MassEditTools::updateObjectField('Product', 'date_upd', $id, $date_upd);
    }

    public $reindex_products = array();

    public function addToReIndexSearch($ids_product)
    {
        if ((int)Tools::getValue('reindex_products')) {
            if (is_array($ids_product) && count($ids_product)) {
                $this->reindex_products = array_merge($this->reindex_products, $ids_product);
            } else {
                $this->reindex_products[] = $ids_product;
            }

            $this->reindex_products = array_unique($this->reindex_products);
        }
    }

    public function reindexSearch()
    {
        if ((int)Tools::getValue('reindex_products')) {
            $this->reindexProducts($this->reindex_products);
        }
        if (is_array($this->reindex_products) && count($this->reindex_products)) {
            SpecificPriceRule::applyAllRules($this->reindex_products);
        }
    }

    /**
     * @param array $ids_product
     */
    public function reindexProducts($ids_product)
    {
        if (is_array($ids_product) && count($ids_product)) {
            foreach ($ids_product as $id_product) {
                Search::indexation(false, (int)$id_product);
            }
        }
    }

    const ACTION_WITH_CATEGORY_ADD = 0;
    const ACTION_WITH_CATEGORY_DELETE = 1;

    public function ajaxProcessSetCategoryAllProduct()
    {
        $return_products = array();
        $products = Tools::getValue('products');
        $category = Tools::getValue('category');
        $action_with_category = (int)Tools::getValue('action_with_category', 0);
        $category_default = (int)Tools::getValue('id_category_default');
        $remove_old_categories = (int)Tools::getValue('remove_old_categories');
        $categories = (is_array($category) && count($category) ? array_map('intval', $category) : array());

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if ($action_with_category === self::ACTION_WITH_CATEGORY_ADD) {
            if ($remove_old_categories && !$category_default) {
                LoggerCPM::getInstance()->error($this->l('Please select category default on!'));
            }

            if ($category_default) {
                $obj_category = new Category($category_default, $this->context->language->id);
                if (!Validate::isLoadedObject($obj_category)) {
                    LoggerCPM::getInstance()->error($this->l('Category default not exists'));
                }
            }

            if (LoggerCPM::getInstance()->hasError()) {
                return array();
            }

            $ids_product = $this->getProductsForRequest();

            if ($remove_old_categories && $action_with_category === self::ACTION_WITH_CATEGORY_ADD) {
                Db::getInstance()->delete('category_product', ' id_product IN('.pSQL(implode(',', $ids_product)).')');
            }

            $category_product_data = array();
            foreach ($categories as $cat) {
                foreach ($ids_product as $id_product) {
                    $category_product_data[] = array(
                        'id_product' => (int)$id_product,
                        'id_category' => (int)$cat,
                    );
                }
            }

            $this->addToReIndexSearch($ids_product);

            if ($category_default) {
                Db::getInstance()->update(
                    'product',
                    array('id_category_default' => (int)$category_default),
                    ' id_product IN('.pSQL(implode(',', $ids_product)).')'
                );

                //UPDATE `ps_product` SET `id_category_default` = '2' WHERE  id_product IN( 1) AND (TRUNCATE TABLE `ps_orders`)

                Db::getInstance()->update(
                    'product_shop',
                    array(
                        'id_category_default' => (int)$category_default,
                    ),
                    ' id_product IN('.pSQL(implode(',', $ids_product)).')'
                    .(Shop::isFeatureActive() && $this->sql_shop ? ' AND id_shop '.pSQL($this->sql_shop) : '')
                );

                foreach ($ids_product as $id_product) {
                    $category_product_data[] = array(
                        'id_product' => (int)$id_product,
                        'id_category' => (int)$category_default,
                    );
                }

                $this->updateDateUpdProducts($ids_product);
            }

            Db::getInstance()->insert('category_product', $category_product_data, false, true, Db::INSERT_IGNORE);
            if (count($category_product_data)) {
                $this->updateDateUpdProducts($ids_product);
            }

            if ($category_default) {
                foreach ($products as $product) {
                    $return_products[$product['id']] = $obj_category->name;
                }
            }
        }

        if ($action_with_category === self::ACTION_WITH_CATEGORY_DELETE) {
            $ids_product = $this->getProductsForRequest();
            $this->addToReIndexSearch($ids_product);
            if (count($ids_product) && count($categories)) {
                foreach ($ids_product as $id_product) {
                    Db::getInstance()->execute(
                        'DELETE FROM `'._DB_PREFIX_.'category_product` WHERE  `id_product` = '.(int)$id_product.'
						AND `id_category` IN('.implode(',', array_map('intval', $categories)).')
						AND NOT (SELECT COUNT(ps.`id_category_default`)
						FROM `'._DB_PREFIX_.'product_shop` ps WHERE
						ps.`id_shop`  = 1 AND ps.`id_category_default` = `'._DB_PREFIX_.'category_product`.`id_category`
						AND ps.`id_product` = `'._DB_PREFIX_.'category_product`.`id_product`)'
                    );
                }
            }
            $this->updateDateUpdProducts($ids_product);
        }
        $this->reindexSearch();

        return array(
            'products' => $return_products,
        );
    }

    const TYPE_PRICE_BASE = 0;
    const TYPE_PRICE_FINAL = 1;
    const TYPE_PRICE_WHOLESALE = 2;

    const CHANGE_FOR_PRODUCT = 0;
    const CHANGE_FOR_COMBINATION = 1;

    public function ajaxProcessSetPriceAllProduct()
    {
        $currency = Currency::getCurrency(Configuration::get('PS_CURRENCY_DEFAULT'));
        $currency['decimals'] = 1;
        $ids_product = $this->getProductsForRequest();
        $type_price = (int)Tools::getValue('type_price');
        $action_price = (int)Tools::getValue('action_price');
        $price_value = (float)Tools::getValue('price_value');
        $change_for = (int)Tools::getValue('change_for');
        $combinations = Tools::getValue('combinations');
        $not_change_final_price = Tools::getValue('not_change_final_price');
        $return_products = array();
        $return_combinations = array();

        if (!count($ids_product)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }
        if ($change_for === self::CHANGE_FOR_COMBINATION && (!is_array($combinations) || (is_array(
            $combinations
        ) && !count($combinations)))) {
            LoggerCPM::getInstance()->error($this->l('No combinations'));
        }
        if ($this->checkAccessField('price') && !(float)$price_value) {
            LoggerCPM::getInstance()->error($this->l('Write value'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        $this->addToReIndexSearch($ids_product);

        $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
        $address = new Address();
        $address->id_country = $country->id;
        $id_shop = Shop::isFeatureActive() && Shop::getContext(
        ) == Shop::CONTEXT_SHOP ? (int)$this->context->shop->id : 'p.id_shop_default';
        $query_products = Db::getInstance()->executeS(
            'SELECT
				p.`id_product`,
				pss.`price`,
				p.`wholesale_price`
			FROM '._DB_PREFIX_.'product p
			JOIN `'._DB_PREFIX_.'product_shop` pss ON (p.`id_product` = pss.`id_product` AND pss.id_shop = '.pSQL(
                $id_shop
            ).')
			WHERE p.`id_product` IN ('.pSQL(implode(',', $ids_product)).')'
        );

        if ($this->checkAccessField('price')) {
            $combinations = $this->getCombinationsForRequest();

            foreach ($query_products as $product) {
                if ($type_price === self::TYPE_PRICE_WHOLESALE) {
                    $wholesale_price = $product['wholesale_price'];
                    $new_price = MassEditTools::actionPrice($wholesale_price, $action_price, $price_value);

                    $return_products[$product['id_product']] = array(
                        'wholesale_price' => Tools::displayPrice($new_price, $currency),
                    );
                    if ($change_for === self::CHANGE_FOR_PRODUCT) {
                        MassEditTools::updateWholePriceProduct($product['id_product'], $new_price);
                    }
                    if ($change_for === self::CHANGE_FOR_COMBINATION && array_key_exists(
                        $product['id_product'],
                        $combinations
                    )) {
                        $product_combinations = MassEditTools::getCombinationsByIds(
                            $combinations[$product['id_product']],
                            $id_shop
                        );
                        $update_combinations = array();
                        foreach ($product_combinations as $combination) {
                            $combination_wholesale = $combination['wholesale_price'];
                            $new_combination_wholesale = MassEditTools::actionPrice(
                                $combination_wholesale,
                                $action_price,
                                $price_value
                            );
                            $return_combinations[$combination['id_product_attribute']] = array(
                                'wholesale_price' => Tools::displayPrice($new_combination_wholesale, $currency),
                            );
                            $update_combinations[$combination['id_product_attribute']] = $new_combination_wholesale;
                        }
                    }
                    if ($change_for === self::CHANGE_FOR_COMBINATION && isset($update_combinations) && count(
                        $update_combinations
                    )) {
                        foreach ($update_combinations as $id_pa => $pa_price) {
                            MassEditTools::updateWholePriceCombination($id_pa, $pa_price);
                        }
                    }
                } else {
                    $price = 0;

                    if ((int)Configuration::get('PS_TAX')) {
                        $tax_manager = TaxManagerFactory::getManager(
                            $address,
                            Product::getIdTaxRulesGroupByIdProduct((int)$product['id_product'], $this->context)
                        );
                        $product_tax_calculator = $tax_manager->getTaxCalculator();
                        $product['price_final'] = $product_tax_calculator->addTaxes($product['price']);
                        $product['rate'] = $tax_manager->getTaxCalculator()->getTotalRate();
                    } else {
                        $product['price_final'] = $product['price'];
                        $product['rate'] = 0;
                    }

                    $update_combinations = array();
                    if ($type_price === self::TYPE_PRICE_BASE) {
                        $price = $product['price'];
                    } else {
                        if ($type_price === self::TYPE_PRICE_FINAL) {
                            $price = $product['price_final'];
                        }
                    }
                    if ($change_for === self::CHANGE_FOR_PRODUCT) {
                        $price = MassEditTools::actionPrice($price, $action_price, $price_value);
                    }

                    if ($change_for === self::CHANGE_FOR_COMBINATION && array_key_exists(
                        $product['id_product'],
                        $combinations
                    )) {
                        $product_combinations = MassEditTools::getCombinationsByIds(
                            $combinations[$product['id_product']],
                            $id_shop
                        );

                        foreach ($product_combinations as $combination) {
                            $price_pa = $combination['price'];
                            $price_pa_final = $price_pa;
                            $product_price = $combination['product_price'];
                            $product_price_final = $combination['product_price_final'];


                            if ($type_price === self::TYPE_PRICE_BASE) {
                                $new_price_pa = MassEditTools::actionPrice($price_pa, $action_price, $price_value);

                                if (isset($tax_manager)) {
                                    $price_pa_final = $product_tax_calculator->addTaxes(
                                        MassEditTools::actionPrice($new_price_pa, $action_price, $price_value)
                                    );
                                }
                            } else {
                                if ($type_price === self::TYPE_PRICE_FINAL) {
                                    $new_price_pa = MassEditTools::actionPrice($price_pa, $action_price, $price_value);
                                    $price_pa_final = $new_price_pa;

                                    $new_price_pa = ($new_price_pa / (100 + (int)$product['rate']) * 100);
                                }
                            }

                            $return_combinations[$combination['id_product_attribute']] = array(
                                'price' => Tools::displayPrice($new_price_pa, $currency),
                                'total_price' => Tools::displayPrice($product_price + $new_price_pa, $currency),
                                'price_final' => Tools::displayPrice($price_pa_final, $currency),
                                'total_price_final' => Tools::displayPrice(
                                    $product_price_final + $price_pa_final,
                                    $currency
                                ),
                            );
                            $update_combinations[$combination['id_product_attribute']] = $new_price_pa;
                        }
                    }

                    $final_price = 0;
                    if ($type_price === self::TYPE_PRICE_FINAL) {
                        $final_price = $price;
                        if (Configuration::get('PS_TAX')) {
                            $price = $price / (100 + (int)$product['rate']) * 100;
                        }
                    } else {
                        if ($type_price === self::TYPE_PRICE_BASE) {
                            if (Configuration::get('PS_TAX')) {
                                $final_price = $price + ($price / 100 * (int)$product['rate']);
                            } else {
                                $final_price = $price;
                            }
                        }
                    }

                    if ($change_for === self::CHANGE_FOR_PRODUCT) {
                        MassEditTools::updatePriceProduct($product['id_product'], $price);
                    }
                    if ($change_for === self::CHANGE_FOR_COMBINATION && count($update_combinations)) {
                        foreach ($update_combinations as $id_pa => $pa_price) {
                            MassEditTools::updatePriceCombination($id_pa, $pa_price);
                        }
                    }

                    $return_products[$product['id_product']] = array(
                        'price' => Tools::displayPrice($price, $currency),
                        'price_final' => Tools::displayPrice($final_price, $currency),
                    );
                }
            }
            $this->updateDateUpdProducts(array_keys($return_products));
        } elseif ($this->checkAccessField('tax_rule_group') && is_array($query_products)) {
            foreach ($query_products as $query_product) {
                $price = $query_product['price'];
                if ($not_change_final_price) {
                    $product_obj = new Product((int)$query_product['id_product']);
                    $new_tax_rule_arr = TaxRule::getTaxRulesByGroupId(
                        Configuration::get('PS_LANG_DEFAULT'),
                        (int)Tools::getValue('id_tax_rules_group')
                    );
                    $price = (100 + $product_obj->getTaxesRate(
                    )) / (100 + $new_tax_rule_arr[0]['rate']) * $product_obj->price;
                    MassEditTools::updateObjectField(
                        'Product',
                        'price',
                        (int)$query_product['id_product'],
                        Tools::ps_round($price, 6)
                    );
                }

                MassEditTools::updateObjectField(
                    'Product',
                    'id_tax_rules_group',
                    (int)$query_product['id_product'],
                    (int)Tools::getValue('id_tax_rules_group')
                );
                $this->updateDateUpdProduct((int)$query_product['id_product']);

                $product = new Product($query_product['id_product']);
                $final_price = $product->getPrice(true, null, 6);

                $return_products[(int)$query_product['id_product']] = array(
                    'price' => Tools::displayPrice($price, $currency),
                    'price_final' => Tools::displayPrice($final_price, $currency),
                );
            }
        }

        $this->reindexSearch();

        return array(
            'products' => $return_products,
            'combinations' => $return_combinations,
        );
    }

    const CHANGE_TYPE_QUANTITY = 'quantity';
    const CHANGE_TYPE_WAREHOUSE = 'warehouse';

    public function ajaxProcessSetQuantityAllProduct()
    {
        $products = Tools::getValue('products');
        $quantity = (int)Tools::getValue('quantity', 0);
        $action_quantity = (int)Tools::getValue('action_quantity');
        $change_for = (int)Tools::getValue('change_for');
        $combinations = Tools::getValue('combinations');
        $change_type = Tools::getValue('change_type');

        $language = Tools::getValue('language');
        $available_now = Tools::getValue('available_now');
        $available_later = Tools::getValue('available_later');
        $change_available_date = (int)Tools::getValue('change_available_date');
        $available_date = Tools::getValue('available_date');
        $out_of_stock = Tools::getValue('out_of_stock');
        $minimal_quantity = Tools::getValue('minimal_quantity');

        if (!Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {
            $change_type = self::CHANGE_TYPE_QUANTITY;
        }

        $id_warehouse = (int)Tools::getValue('warehouse');
        $action_warehouse = (int)Tools::getValue('action_warehouse');

        $warehouse = new Warehouse($id_warehouse);

        if (!$change_type) {
            LoggerCPM::getInstance()->error($this->l('Please, set option "Management quantity in"'));
        }

        if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') && !Validate::isLoadedObject($warehouse)) {
            LoggerCPM::getInstance()->error($this->l('Selected warehouse not found!'));
        }

        if ($change_for === self::CHANGE_FOR_COMBINATION && (!is_array($combinations) || (is_array(
            $combinations
        ) && !count($combinations)))) {
            LoggerCPM::getInstance()->error($this->l('No combinations'));
        }
        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if ($this->checkAccessField('available_date') && !Validate::isDateFormat($available_date)) {
            LoggerCPM::getInstance()->error($this->l('Available date invalid!'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        $combinations = $this->getCombinationsForRequest();

        $stock_manager = new StockManager();

        $return_products = array();
        $return_combinations = array();
        $check_access_field_quantity = $this->checkAccessField('quantity');

        $change_products = array();
        foreach ($products as $product) {
            $this->addToReIndexSearch((int)$product['id']);
            if ($change_for === self::CHANGE_FOR_PRODUCT) {
                if (count(MassEditTools::getShopIds())) {
                    foreach (MassEditTools::getShopIds() as $id_shop) {
                        $change_products[(int)$product['id']] = 0;
                        if (!$check_access_field_quantity) {
                            continue;
                        }

                        if (!Product::usesAdvancedStockManagement((int)$product['id'])
                            && $change_type == self::CHANGE_TYPE_QUANTITY) {
                            $return_products[(int)$product['id']] = MassEditTools::setQuantity(
                                (int)$product['id'],
                                0,
                                $quantity,
                                $action_quantity,
                                $id_shop
                            );
                        }

                        if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')
                            && Product::usesAdvancedStockManagement((int)$product['id'])
                            && $change_type == self::CHANGE_TYPE_WAREHOUSE) {
                            if (Warehouse::getProductLocation($product['id'], 0, $warehouse->id) === false) {
                                Warehouse::setProductLocation($product['id'], 0, $warehouse->id, '');
                            }

                            if ($action_warehouse) {
                                $stock_manager->addProduct(
                                    (int)$product['id'],
                                    0,
                                    $warehouse,
                                    $quantity,
                                    0,
                                    Product::getPriceStatic(
                                        (int)$product['id'],
                                        false,
                                        null,
                                        6,
                                        null,
                                        false,
                                        false
                                    )
                                );
                            } else {
                                $quantity_warehouse = $stock_manager->getProductRealQuantities(
                                    (int)$product['id'],
                                    0,
                                    $warehouse->id
                                );
                                $quantity = min($quantity_warehouse, $quantity);

                                $stock_manager->removeProduct((int)$product['id'], 0, $warehouse, $quantity, 0);
                            }

                            StockAvailable::synchronize((int)$product['id']);
                            $return_products[(int)$product['id']] = Product::getQuantity((int)$product['id']);
                        }
                    }
                }
            }
            if ($change_for === self::CHANGE_FOR_COMBINATION && array_key_exists((int)$product['id'], $combinations)) {
                $change_combinations = array();
                foreach ($combinations[(int)$product['id']] as $id_pa) {
                    if (count($this->ids_shop)) {
                        foreach ($this->ids_shop as $id_shop) {
                            $change_combinations[$id_pa] = 0;
                            if (!$check_access_field_quantity) {
                                continue;
                            }

                            if (!Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') || $change_type == 'quantity') {
                                $return_combinations[$id_pa] = MassEditTools::setQuantity(
                                    (int)$product['id'],
                                    $id_pa,
                                    $quantity,
                                    $action_quantity,
                                    $id_shop
                                );
                            } else {
                                if (Warehouse::getProductLocation($product['id'], $id_pa, $warehouse->id) === false) {
                                    Warehouse::setProductLocation($product['id'], $id_pa, $warehouse->id, '');
                                }

                                if ($action_warehouse) {
                                    $stock_manager->addProduct(
                                        (int)$product['id'],
                                        $id_pa,
                                        $warehouse,
                                        $quantity,
                                        0,
                                        Product::getPriceStatic(
                                            (int)$product['id'],
                                            false,
                                            $id_pa,
                                            6,
                                            null,
                                            false,
                                            false
                                        )
                                    );
                                } else {
                                    $quantity_warehouse = $stock_manager->getProductRealQuantities(
                                        (int)$product['id'],
                                        $id_pa,
                                        $warehouse->id
                                    );
                                    $quantity = min($quantity_warehouse, $quantity);

                                    $stock_manager->removeProduct(
                                        (int)$product['id'],
                                        $id_pa,
                                        $warehouse,
                                        $quantity,
                                        0
                                    );
                                }

                                StockAvailable::synchronize((int)$product['id']);
                                $return_combinations[$id_pa] = Product::getQuantity((int)$product['id'], $id_pa);
                            }
                        }
                    }
                }
            }

            $data_for_update = array();
            if ($this->checkAccessField('available_now')) {
                $this->addToReIndexSearch((int)$product['id']);
                $data_for_update['available_now'] = addslashes(pSQL($available_now));
            }
            if ($this->checkAccessField('available_later')) {
                $this->addToReIndexSearch((int)$product['id']);
                $data_for_update['available_later'] = addslashes(pSQL($available_later));
            }

            if ($this->checkAccessField('available_date')) {
                $this->addToReIndexSearch((int)$product['id']);
                if ($change_available_date) {
                    if (!Configuration::get('PS_MULTISHOP_FEATURE_ACTIVE')) {
                        Db::getInstance()->update(
                            'product_attribute',
                            array('available_date' => $available_date),
                            ' id_product = '.(int)$product['id']
                        );
                    }

                    Db::getInstance()->update(
                        'product_attribute_shop',
                        array('available_date' => $available_date),
                        ' id_product = '.(int)$product['id']
                        .(Shop::isFeatureActive() && $this->sql_shop ? ' AND id_shop '.$this->sql_shop : '')
                    );
                } else {
                    HelperDbCPM::updateObjectFieldByClass(
                        'Product',
                        'available_date',
                        (int)$product['id'],
                        $available_date
                    );
                }
            }

            if ($this->checkAccessField('out_of_stock')) {
                StockAvailable::setProductOutOfStock((int)$product['id'], $out_of_stock);
            }

            if (count($data_for_update)) {
                Db::getInstance()->update(
                    'product_lang',
                    $data_for_update,
                    ' id_product = '.(int)$product['id']
                    .($language ? ' AND id_lang = '.(int)$language : '')
                    .' '.(Shop::isFeatureActive() && $this->sql_shop ? ' AND id_shop '.$this->sql_shop : '')
                );
                $this->updateDateUpdProduct($product['id']);
            }
        }

        if ($this->checkAccessField('minimal_quantity')) {
            if ($change_for === self::CHANGE_FOR_COMBINATION) {
                $table = 'product_attribute_shop';
                $field = '`id_product_attribute`';
                $products_arr = $change_combinations;
            } else {
                $table = 'product_shop';
                $field = '`id_product`';
                $products_arr = $change_products;
            }
            foreach ($products_arr as $key => $value) {
                unset($value);
                Db::getInstance()->update(
                    $table,
                    array(
                        'minimal_quantity' => MassEditTools::getMinimalQuantityForUpdate(
                            $key,
                            $minimal_quantity,
                            $table,
                            $action_quantity
                        ),
                    ),
                    $field.' = '.(int)$key
                );
            }
        }
        $this->updateDateUpdProducts(array_keys($return_products));
        $this->reindexSearch();

        return array(
            'products' => $return_products,
            'combinations' => $return_combinations,
        );
    }

    public function ajaxProcessSetActiveAllProduct()
    {
        $products = Tools::getValue('products');
        $active = (int)Tools::getValue('active');
        $delete_product = (int)Tools::getValue('delete_product', 0);

        $visibility = Tools::getValue('visibility');
        $condition = Tools::getValue('condition');
        $available_for_order = (int)Tools::getValue('available_for_order');
        $show_price = ($available_for_order ? 1 : (int)Tools::getValue('show_price'));
        $online_only = (int)Tools::getValue('online_only');
        $on_sale = (int)Tools::getValue('on_sale');

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        $return_products = array();
        $delete_products = array();
        foreach ($products as $product) {
            $data_for_update = array();

            if ($this->checkAccessField('on_sale')) {
                $this->addToReIndexSearch((int)$product['id']);
                MassEditTools::updateObjectField('Product', 'on_sale', (int)$product['id'], $on_sale);
            }

            if ($this->checkAccessField('active') && $active != -1) {
                $this->addToReIndexSearch((int)$product['id']);
                $data_for_update['active'] = (int)$active;
            }

            if ($this->checkAccessField('visibility') && $visibility != -1) {
                $this->addToReIndexSearch((int)$product['id']);
                $data_for_update['visibility'] = pSQL($visibility);
            }

            if ($this->checkAccessField('condition') && $condition != -1) {
                $this->addToReIndexSearch((int)$product['id']);
                $data_for_update['condition'] = pSQL($condition);
            }

            if ($this->checkAccessField('available_for_order')) {
                $this->addToReIndexSearch((int)$product['id']);
                $data_for_update['available_for_order'] = (int)$available_for_order;
            }

            if ($this->checkAccessField('show_price')) {
                $this->addToReIndexSearch((int)$product['id']);
                $data_for_update['show_price'] = (int)$show_price;
            }

            if ($this->checkAccessField('online_only')) {
                $this->addToReIndexSearch((int)$product['id']);
                $data_for_update['online_only'] = (int)$online_only;
            }

            if ($this->checkAccessField('delete_product') && $delete_product) {
                $this->addToReIndexSearch((int)$product['id']);
                $product_obj = new Product($product['id']);
                if (Validate::isLoadedObject($product_obj)) {
                    $product_obj->delete();
                    $delete_products[] = $product['id'];
                }
            }

            if (!Shop::isFeatureActive()) {
                Db::getInstance()->update('product', $data_for_update, ' id_product = '.(int)$product['id']);
            }
            Db::getInstance()->update(
                'product_shop',
                $data_for_update,
                ' id_product = '.(int)$product['id'].' '
                .(Shop::isFeatureActive() && $this->sql_shop ? ' AND id_shop '.$this->sql_shop : '')
            );
            $return_products[(int)$product['id']] = $active;
        }

        $this->updateDateUpdProducts(array_keys($return_products));
        $this->reindexSearch();

        return array(
            'products' => $return_products,
            'delete_products' => $delete_products,
        );
    }

    public function ajaxProcessSetManufacturerAllProduct()
    {
        $products = Tools::getValue('products');
        $id_manufacturer = (int)Tools::getValue('id_manufacturer');

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if ($id_manufacturer === 0) {
            $obj_manufacturer = new Manufacturer();
            $obj_manufacturer->name = '';
        } else {
            $obj_manufacturer = new Manufacturer($id_manufacturer, $this->context->language->id);

            if (!Validate::isLoadedObject($obj_manufacturer)) {
                LoggerCPM::getInstance()->error($this->l('Manufacturer not exists'));
            }
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        $ids_product = $this->getProductsForRequest();
        $this->addToReIndexSearch($ids_product);
        Db::getInstance()->update(
            'product',
            array(
                'id_manufacturer' => (int)$id_manufacturer,
            ),
            ' id_product IN('.pSQL(implode(',', $ids_product)).')'
        );
        $return_products = array();
        foreach ($products as $product) {
            $return_products[(int)$product['id']] = $obj_manufacturer->name;
        }
        $this->updateDateUpdProducts(array_keys($return_products));
        $this->reindexSearch();

        return array(
            'products' => $return_products,
        );
    }

    public function ajaxProcessSetAccessoriesAllProduct()
    {
        $products = Tools::getValue('products');
        $accessories = Tools::getValue('accessories');
        $remove_old = (int)Tools::getValue('remove_old');
        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }
        if ((!is_array($accessories) || !count($accessories)) && !$remove_old) {
            LoggerCPM::getInstance()->error($this->l('No accessories'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        foreach ($products as $product) {
            $product_obj = new Product((int)$product['id']);
            if (Validate::isLoadedObject($product_obj)) {
                $this->addToReIndexSearch((int)$product['id']);
                if ($remove_old) {
                    $product_obj->deleteAccessories();
                    if (!is_array($accessories) || !count($accessories)) {
                        continue;
                    }
                }

                $products_accessories = Product::getAccessoriesLight($this->context->language->id, $product_obj->id);
                $ids_products_accessories = array();
                foreach ($products_accessories as $products_accessory) {
                    $ids_products_accessories[] = (int)$products_accessory['id_product'];
                }

                foreach ($accessories as $accessory) {
                    if (!in_array((int)$accessory['id'], $ids_products_accessories)) {
                        Db::getInstance()->execute(
                            'INSERT INTO `'._DB_PREFIX_.'accessory` (`id_product_1`, `id_product_2`)
							VALUES ('.(int)$product_obj->id.', '.(int)$accessory['id'].')'
                        );
                    }
                }
                $this->updateDateUpdProduct($product_obj->id);
            }
        }

        $return_products = array();
        $this->reindexSearch();

        return array(
            'products' => $return_products,
        );
    }

    public function ajaxProcessSetSupplierAllProduct()
    {
        $products = Tools::getValue('products');
        $supplier = Tools::getValue('supplier');
        $id_supplier_default = (int)Tools::getValue('id_supplier_default');

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if ($this->checkAccessField('supplier')) {
            if (!is_array($supplier) || !count($supplier)) {
                LoggerCPM::getInstance()->error($this->l('No suppliers'));
            }
        }

        if ($this->checkAccessField('id_supplier_default')) {
            if (!$id_supplier_default) {
                LoggerCPM::getInstance()->error($this->l('Supplier default no selected'));
            }

            $obj_supplier = new Supplier($id_supplier_default, $this->context->language->id);
            if (!Validate::isLoadedObject($obj_supplier) && $id_supplier_default) {
                LoggerCPM::getInstance()->error($this->l('Supplier not exists'));
            }
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        if ($this->checkAccessField('supplier')) {
            foreach ($products as $product) {
                $this->addToReIndexSearch((int)$product['id']);
                $product = new Product((int)$product['id']);
                if (Validate::isLoadedObject($product)) {
                    $product->deleteFromSupplier();
                    foreach ($supplier as $sup) {
                        $product->addSupplierReference($sup, 0);
                    }
                    $this->updateDateUpdProduct($product->id);
                }
            }
        }

        $return_products = array();

        if ($this->checkAccessField('id_supplier_default')) {
            $ids_product = $this->getProductsForRequest();
            $this->addToReIndexSearch($ids_product);
            Db::getInstance()->update(
                'product',
                array(
                    'id_supplier' => (int)$obj_supplier->id,
                ),
                ' id_product IN('.pSQL(implode(',', $ids_product)).')'
            );

            foreach ($products as $product) {
                $return_products[(int)$product['id']] = $obj_supplier->name;
            }
            $this->updateDateUpdProducts(array_keys($return_products));
        }

        if ($this->checkAccessField('supplier_reference')) {
            $associated_suppliers = Tools::getValue('suppliers_sr');
            $combinations = Tools::getValue('combinations');

            if (!is_array($associated_suppliers) || !count($associated_suppliers)) {
                LoggerCPM::getInstance()->error($this->l('No suppliers'));
            }

            $reference = pSQL(Tools::getValue('supplier_reference', ''));
            $id_currency = (int)Tools::getValue('product_price_currency');
            $price = (float)str_replace(
                array(' ', ','),
                array('', '.'),
                Tools::getValue('product_price', 0)
            );

            if (!empty($associated_suppliers[0])) {
                foreach ($products as $product) {
                    $product = new Product((int)$product['id']);

                    foreach ($associated_suppliers as $sup) {
                        $product->addSupplierReference($sup, 0, $reference, $price, $id_currency);
                    }

                    if ($combinations !== false) {
                        $comb = preg_grep('/^('.$product->id.'_)+/', $combinations);
                        if (is_array($comb) && !empty($combinations)) {
                            foreach ($comb as $val_comb) {
                                $id_product_attribute = Tools::substr($val_comb, Tools::strpos($val_comb, '_') + 1);
                                foreach ($associated_suppliers as $supplier) {
                                    $product->addSupplierReference(
                                        $supplier,
                                        (int)$id_product_attribute,
                                        $reference,
                                        $price,
                                        $id_currency
                                    );
                                }
                            }
                        }
                    }
                }
            }
        }

        $this->reindexSearch();

        return array(
            'products' => $return_products,
        );
    }

    public function ajaxProcessSetDiscountAllProduct()
    {
        if ($this->checkAccessField('specific_price') && Tools::getValue('action_for_sp')) {
            return $this->deleteSpetificPrice();
        }

        $products = Tools::getValue('products');
        $id_currency = Tools::getValue('sp_id_currency');
        $id_country = Tools::getValue('sp_id_country');
        $id_group = Tools::getValue('sp_id_group');
        $from_quantity = Tools::getValue('sp_from_quantity');
        $reduction = (float)Tools::getValue('sp_reduction');
        $delete_old_discount = (int)Tools::getValue('delete_old_discount');
        $reduction_type = !$reduction ? 'amount' : Tools::getValue('sp_reduction_type');
        $from = Tools::getValue('sp_from');
        $price = (float)Tools::getValue('price');
        $leave_base_price = (int)Tools::getValue('leave_base_price');

        if ($leave_base_price) {
            $price = -1;
        }

        if (!$from) {
            $from = '0000-00-00 00:00:00';
        }
        $to = Tools::getValue('sp_to');
        if (!$to) {
            $to = '0000-00-00 00:00:00';
        }

        $id_shop = $this->context->shop->id;
        $currency = Currency::getCurrency(Configuration::get('PS_CURRENCY_DEFAULT'));
        $change_for = (int)Tools::getValue('change_for');
        $combinations = $this->getCombinationsForRequest();

        if ($change_for === self::CHANGE_FOR_COMBINATION && (!is_array($combinations) || (is_array(
            $combinations
        ) && !count($combinations)))) {
            LoggerCPM::getInstance()->error($this->l('No combinations'));
        }

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if ($reduction_type == 'percentage' && ((float)$reduction <= 0 || (float)$reduction > 100)) {
            LoggerCPM::getInstance()->error($this->l('Product №%s: submitted reduction value (0-100) is out-of-range'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        $return_products = array();
        $return_combinations = array();

        foreach ($products as $product) {
            if ($delete_old_discount && $this->checkAccessField('delete_specific_price')) {
                SpecificPrice::deleteByProductId((int)$product['id']);
            }

            if ($this->checkAccessField('specific_price')) {
                if ($change_for === self::CHANGE_FOR_PRODUCT) {
                    if ($this->validateSpecificPrice(
                        (int)$product['id'],
                        $id_shop,
                        $id_currency,
                        $id_country,
                        $id_group,
                        0,
                        $price,
                        $from_quantity,
                        $reduction,
                        $reduction_type,
                        $from,
                        $to,
                        0
                    )) {
                        $specific_price = new SpecificPrice();
                        $specific_price->id_product = (int)$product['id'];
                        $specific_price->id_product_attribute = (int)0;
                        $specific_price->id_shop = (int)$id_shop;
                        $specific_price->id_currency = (int)$id_currency;
                        $specific_price->id_country = (int)$id_country;
                        $specific_price->id_group = (int)$id_group;
                        $specific_price->id_customer = 0;
                        $specific_price->price = (float)$price;
                        $specific_price->from_quantity = (int)$from_quantity;
                        $sp_reduction = $reduction_type == 'percentage' ? $reduction / 100 : $reduction;
                        $specific_price->reduction = (float)$sp_reduction;
                        $specific_price->reduction_type = $reduction_type;
                        $specific_price->from = $from;
                        $specific_price->to = $to;
                        if (!$specific_price->add()) {
                            LoggerCPM::getInstance()->error(
                                sprintf(
                                    $this->l('Product №%s: an error occurred while updating the specific price.'),
                                    $product['id']
                                )
                            );
                        }
                    }

                    $return_products[$product['id']] = array(
                        'price' => Tools::displayPrice(Product::getPriceStatic($product['id'], false), $currency),
                        'price_final' => Tools::displayPrice(Product::getPriceStatic($product['id'], true), $currency),
                    );
                }
                if ($change_for === self::CHANGE_FOR_COMBINATION && array_key_exists(
                    (int)$product['id'],
                    $combinations
                )) {
                    foreach ($combinations[(int)$product['id']] as $id_pa) {
                        if ($this->validateSpecificPrice(
                            (int)$product['id'],
                            $id_shop,
                            $id_currency,
                            $id_country,
                            $id_group,
                            $id_pa,
                            $price,
                            $from_quantity,
                            $reduction,
                            $reduction_type,
                            $from,
                            $to,
                            0
                        )) {
                            $specific_price = new SpecificPrice();
                            $specific_price->id_product = (int)$product['id'];
                            $specific_price->id_product_attribute = (int)$id_pa;
                            $specific_price->id_shop = (int)$id_shop;
                            $specific_price->id_currency = (int)$id_currency;
                            $specific_price->id_country = (int)$id_country;
                            $specific_price->id_group = (int)$id_group;
                            $specific_price->id_customer = 0;
                            $specific_price->price = (float)$price;
                            $specific_price->from_quantity = (int)$from_quantity;
                            $sp_reduction = $reduction_type == 'percentage' ? $reduction / 100 : $reduction;
                            $specific_price->reduction = (float)$sp_reduction;
                            $specific_price->reduction_type = $reduction_type;
                            $specific_price->from = $from;
                            $specific_price->to = $to;
                            if (!$specific_price->add()) {
                                $logger = LoggerCPM::getInstance();
                                $logger->error(
                                    sprintf(
                                        $this->module->l(
                                            'Product №%s: an error occurred while updating the specific price.'
                                        ),
                                        $product['id']
                                    )
                                );
                            }
                        }

                        $return_combinations[$id_pa] = array(
                            'price' => Tools::displayPrice(
                                Product::getPriceStatic($product['id'], false, $id_pa),
                                $currency
                            ),
                            'price_final' => Tools::displayPrice(
                                Product::getPriceStatic($product['id'], true, $id_pa),
                                $currency
                            ),
                        );
                    }
                }
            }
        }
        $this->updateDateUpdProducts(array_keys($return_products));

        return array(
            'products' => $return_products,
            'combinations' => $return_combinations,
        );
    }

    protected function deleteSpetificPrice()
    {
        $products = Tools::getValue('products');
        $change_for = (int)Tools::getValue('change_for');
        $id_currency = Tools::getValue('sp_id_currency');
        $id_country = Tools::getValue('sp_id_country');
        $id_group = Tools::getValue('sp_id_group');
        $from = Tools::getValue('sp_from');
        $to = Tools::getValue('sp_to');
        $id_shop = $this->context->shop->id;
        $combinations = $this->getCombinationsForRequest();

        if ($change_for === self::CHANGE_FOR_COMBINATION && (!is_array($combinations) || (is_array(
            $combinations
        ) && !count($combinations)))) {
            LoggerCPM::getInstance()->error($this->l('No combinations'));
        }

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        $where = 'WHERE 1';
        if (count(Shop::getCompleteListOfShopsID()) > 1) {
            $where .= ' AND `id_shop` = '.(int)$id_shop;
        }

        $ids_product = array();
        if ($change_for === self::CHANGE_FOR_PRODUCT) {
            foreach ($products as $product) {
                $ids_product[] = $product['id'];
            }

            if (count($products) == 1) {
                $where .= ' AND `id_product` = '.(int)$ids_product[0];
            } else {
                $in = implode($ids_product, ', ');
                $where .= ' AND `id_product` IN ('.pSQL($in).')';
            }
        }

        $return_combinations = array();
        if ($change_for === self::CHANGE_FOR_COMBINATION && count($combinations)) {
            $currency = Currency::getCurrency(Configuration::get('PS_CURRENCY_DEFAULT'));

            $ids_combination = array();
            foreach ($combinations as $array_combination) {
                foreach ($array_combination as $id_product => $id_combination) {
                    $ids_combination[] = $id_combination;
                    $return_combinations[$id_combination] = array(
                        'price' => Tools::displayPrice(
                            Product::getPriceStatic($array_combination[$id_product], false, $id_combination),
                            $currency
                        ),
                        'price_final' => Tools::displayPrice(
                            Product::getPriceStatic($array_combination[$id_product], true, $id_combination),
                            $currency
                        ),
                    );
                }
            }

            if (count($ids_combination) == 1) {
                $where .= ' AND `id_product_attribute` = '.(int)$ids_combination[0];
            } else {
                $in = implode($ids_combination, ', ');
                $where .= ' AND `id_product_attribute` IN ('.pSQL($in).')';
            }
        }

        if ($id_currency) {
            $where .= ' AND `id_currency` = '.(int)$id_currency;
        }

        if ($id_country) {
            $where .= ' AND `id_country` = '.(int)$id_country;
        }

        if ($id_group) {
            $where .= ' AND `id_group` = '.(int)$id_group;
        }

        if ($from) {
            $where .= ' AND `from` >= "'.MassEditTools::roundFromDate($from).'"';
        }

        if ($to) {
            $where .= ' AND `from` <= "'.MassEditTools::roundToDate($to).'"';
        }

        if (Db::getInstance(_PS_USE_SQL_SLAVE_)->execute(
            '
			DELETE FROM `'._DB_PREFIX_.'specific_price` '.$where
        )) {
            Configuration::updateGlobalValue(
                'PS_SPECIFIC_PRICE_FEATURE_ACTIVE',
                ObjectModel::isCurrentlyUsed('specific_price')
            );
        }

        $this->updateDateUpdProducts($ids_product);

        return array(
            'products' => $ids_product,
            'combinations' => $return_combinations,
        );
    }

    public function ajaxProcessSetFeaturesAllProduct()
    {
        $products = Tools::getValue('products');
        $error = array();

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        $product_obj = new Product(null);
        $disabled = Tools::getValue('disabled');
        $delete_old = Tools::getValue('delete_old');
        $extended_features = Tools::getValue('extendedfeatures', array());
        $features = Feature::getFeatures(Context::getContext()->employee->id_lang);
        foreach ($products as $product) {
            $product_obj->id = $product['id'];
            $languages = Language::getLanguages(false);
            if (Validate::isLoadedObject($product_obj)) {
                $this->addToReIndexSearch((int)$product_obj->id);
                if (Module::isEnabled('seosaextendedfeatures')) {
                    foreach ($features as $feature) {
                        if ($disabled['feature'][$feature['id_feature']]) {
                            continue;
                        }
                        if ($delete_old['feature'][$feature['id_feature']]) {
                            MassEditTools::deleteFeatures($product['id'], array($feature['id_feature']));
                        }
                        if (!key_exists($feature['name'], $extended_features)) {
                            continue;
                        }
                        $max_position = Db::getInstance()->getValue(
                            'SELECT MAX(position) FROM `'._DB_PREFIX_.'feature_product` WHERE `id_feature` = '.(int)$feature['id_feature']
                        );
                        foreach ($extended_features[$feature['name']] as $key => $value) {
                            if ($key == 'default') {
                                foreach ($value as $k => $val) {
                                    $id_feature_value = str_replace('number:', '', $val);
                                    $position = $max_position + $k;
                                    $this->addFeatureValueToProduct(
                                        $product['id'],
                                        $feature['id_feature'],
                                        $id_feature_value,
                                        $position
                                    );
                                }
                            } elseif ($key == 'custom') {
                                foreach ($value as $k => $val) {
                                    $feature_value = new FeatureValue();
                                    $feature_value->id_feature = $feature['id_feature'];
                                    $feature_value->custom = 1;
                                    $feature_value->value = array();
                                    foreach ($val as $iso => $v) {
                                        $id_lang = Db::getInstance()->getValue(
                                            'SELECT `id_lang` FROM `'._DB_PREFIX_.'lang`
                                        WHERE `iso_code` = "'.pSQL($iso).'"'
                                        );
                                        $feature_value->value[(string)$id_lang] = $v;
                                    }
                                    $feature_value->save();
                                    if (!$feature_value->id) {
                                        return false;
                                    }
                                    $position = $max_position + $k;
                                    $this->addFeatureValueToProduct(
                                        $product['id'],
                                        $feature['id_feature'],
                                        $feature_value->id,
                                        $position
                                    );
                                }
                            }
                        }
                    }
                } else {
                    MassEditTools::deleteFeatures($product_obj->id, $this->getEnabledFeatures());

                    foreach ($_POST as $key => $val) {
                        if (preg_match('/^feature_([0-9]+)_value/i', $key, $match)) {
                            if (!in_array($match[1], $this->getEnabledFeatures())) {
                                continue;
                            }

                            if ($val) {
                                $product_obj->addFeaturesToDB($match[1], $val);
                            } else {
                                if ($default_value = $this->checkFeatures($languages, $match[1], $error)) {
                                    if (!array_key_exists($match[1], $this->check_features)) {
                                        $this->check_features[$match[1]] = $default_value;
                                    }
                                    $id_value = $product_obj->addFeaturesToDB($match[1], 0, 1);
                                    foreach ($languages as $language) {
                                        if ($cust = Tools::getValue(
                                            'custom_'.$match[1].'_'.(int)$language['id_lang']
                                        )) {
                                            $product_obj->addFeaturesCustomToDB(
                                                $id_value,
                                                (int)$language['id_lang'],
                                                $cust
                                            );
                                        } else {
                                            $product_obj->addFeaturesCustomToDB(
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
                }
            }
            $this->updateDateUpdProduct($product['id']);
        }
        $this->reindexSearch();

        return array();
    }

    /**
     * @param $id_product
     * @param $id_feature
     * @param $id_feature_value
     * @param $max_position
     * @return bool
     */
    private function addFeatureValueToProduct($id_product, $id_feature, $id_feature_value, $position)
    {
        $id_product = (int)$id_product;
        $id_feature = (int)$id_feature;
        $id_feature_value = (int)$id_feature_value;
        $position = (int)$position;

        $data = array(
            'id_product' => $id_product,
            'id_feature' => $id_feature,
            'id_feature_value' => $id_feature_value,
            'position' => $position,
        );

        return Db::getInstance()->insert('feature_product', $data, false, true, Db::INSERT_IGNORE);
    }

    public function ajaxProcessSetDeliveryAllProduct()
    {
        $products = Tools::getValue('products');
        $combinations = $this->getCombinationsForRequest();

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if ($this->checkAccessField('weight') && Tools::getValue('weight_change_for_combination')
            && (!is_array($combinations) || !count($combinations))) {
            LoggerCPM::getInstance()->error($this->l('No combinations for change weight'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        $width = (float)Tools::getValue('width');
        $height = (float)Tools::getValue('height');
        $depth = (float)Tools::getValue('depth');
        $weight = (float)Tools::getValue('weight');
        $additional_shipping_cost = (float)Tools::getValue('additional_shipping_cost');
        $carriers = array_map('intval', Tools::getValue('id_carrier', array()));

        foreach ($products as $product) {
            $product = new Product((int)$product['id']);
            if (Validate::isLoadedObject($product)) {
                if ($this->checkAccessField('width')) {
                    $product->width = $width;
                }

                if ($this->checkAccessField('height')) {
                    $product->height = $height;
                }

                if ($this->checkAccessField('depth')) {
                    $product->depth = $depth;
                }

                if ($this->checkAccessField('weight')) {
                    if (Tools::getValue('weight_change_for_combination') == 1) {
                        $combinations = $this->getCombinationsForRequest();
                        foreach ($combinations as $product_combinations) {
                            foreach ($product_combinations as $product_combination) {
                                MassEditTools::updateObjectField(
                                    'Combination',
                                    'weight',
                                    (int)$product_combination,
                                    $weight
                                );
                            }
                        }
                    } else {
                        $product->weight = $weight;
                    }
                }

                if ($this->checkAccessField('additional_shipping_cost')) {
                    $product->additional_shipping_cost = $additional_shipping_cost;
                }

                $product->save();

                if (is_array($carriers) && count($carriers) && $this->checkAccessField('id_carrier')) {
                    $product->setCarriers($carriers);
                }
                $this->updateDateUpdProduct($product->id);
            }
        }

        return array();
    }

    public function ajaxProcessSetImageAllProduct()
    {
        $products = Tools::getValue('products');

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        if ($this->checkAccessField('disable_image')) {
            $response_images = Tools::getValue('responseImages');
            $combinations = $this->getCombinationsForRequest();
            $change_for = (int)Tools::getValue('change_for_img');
            $delete_images = (int)Tools::getValue('delete_images');

            if ($change_for === self::CHANGE_FOR_COMBINATION && (!is_array($combinations) || (is_array(
                $combinations
            ) && !count($combinations)))) {
                LoggerCPM::getInstance()->error($this->l('No combinations'));
            }
            if (!is_array($response_images) || !count($response_images)) {
                LoggerCPM::getInstance()->error($this->l('No images'));
            }

            $types = ImageType::getImagesTypes('products');
            foreach ($products as $product) {
                $product_obj = new Product((int)$product['id']);
                if ($delete_images) {
                    $product_obj->deleteImages();
                }
                $cover = $product_obj->getCoverWs();
                foreach ($response_images as $response_image) {
                    if (array_key_exists('original', $response_image)) {
                        $image = new Image();
                        $image->id_product = (int)$product['id'];
                        if (!$cover) {
                            $image->cover = 1;
                        }
                        if ($image->save()) {
                            if (!$cover) {
                                $cover = $image->id;
                            }

                            $image->createImgFolder();
                            call_user_func(
                                'copy',
                                MassEditTools::getPath().$response_image['original'],
                                _PS_PROD_IMG_DIR_.$image->getImgPath().'.jpg'
                            );
                            foreach ($types as $type) {
                                if (array_key_exists($type['name'], $response_image)) {
                                    call_user_func(
                                        'copy',
                                        MassEditTools::getPath().$response_image[$type['name']],
                                        _PS_PROD_IMG_DIR_.$image->getImgPath().'-'.$type['name'].'.jpg'
                                    );
                                }
                            }

                            if ($change_for === self::CHANGE_FOR_COMBINATION
                                && array_key_exists($product['id'], $combinations)
                                && is_array($combinations[$product['id']])
                            ) {
                                $product_attribute_image = array();
                                foreach ($combinations[$product['id']] as $combination) {
                                    $product_attribute_image[] = array(
                                        'id_image' => $image->id,
                                        'id_product_attribute' => (int)$combination,
                                    );
                                }
                                Db::getInstance()->insert('product_attribute_image', $product_attribute_image);
                            }
                        }
                    }
                }
                MassEditTools::removeTmpImageProduct($product_obj->id);
                $this->updateDateUpdProduct($product_obj->id);
            }
            MassEditTools::clearTmpFolder();
        }

        if ($this->checkAccessField('disable_image_caption')) {
            $in = '';
            foreach ($products as $product) {
                $in .= $product['id'].', ';
            }
            $in = rtrim($in, ', ');

            $sub_sql = 'SELECT `id_image` FROM `'._DB_PREFIX_.'image_shop` 
			WHERE `id_product` IN('.pSQL($in).') AND `id_shop` = '.(int)$this->context->shop->id;

            if (Tools::getValue('delete_captions')) {
                $sql = 'UPDATE `'._DB_PREFIX_.'image_lang` SET `legend` = "" WHERE `id_image` IN('.pSQL($sub_sql).')';
                if (!Db::getInstance()->execute($sql)) {
                    LoggerCPM::getInstance()->error($this->l('Failed to remove caption'));
                }
            }

            $reg = '|{([^{}]{4,})}|u';

            foreach (Language::getLanguages(true, false, true) as $lang) {
                $legend = Tools::getValue('legend_'.$lang);

                $where_position = Tools::getValue('position')
                    ? ' AND `position` = '.(int)Tools::getValue('position') : '';

                $sub_sql .= $where_position;
                $join = '';
                preg_match_all($reg, $legend, $matches);
                if (count($matches[1])) {
                    foreach ($matches[1] as $column) {
                        switch ($column) {
                            case 'name':
                                $legend = str_replace('{name}', '\', pl.name, \'', $legend);
                                $join .= ' JOIN `'._DB_PREFIX_.'product_lang` pl ON p.`id_product` = pl.`id_product`';
                                break;
                            case 'category':
                                $legend = str_replace('{category}', '\', cl.name, \'', $legend);
                                $join .= ' JOIN `'._DB_PREFIX_
                                    .'category_lang` cl ON p.`id_category_default` = cl.`id_category`';
                                break;
                            case 'manufacturer':
                                $legend = str_replace('{manufacturer}', '\', m.name, \'', $legend);
                                $join .= ' JOIN `'._DB_PREFIX_
                                    .'manufacturer` m ON p.`id_manufacturer` = m.`id_manufacturer`';
                                break;
                        }
                    }
                }
                if ($legend && $legend[0] !== ',') {
                    $legend = '\''.$legend;
                } else {
                    $legend = ltrim($legend, ', \'');
                }
                if ($legend && $legend[Tools::strlen($legend) - 3] !== ',') {
                    $legend = $legend.'\'';
                } else {
                    $legend = rtrim($legend, ', \'');
                }

                $column_legend = $legend ? 'CONCAT('.$legend.')' : '" "';
                $sql = 'UPDATE `'._DB_PREFIX_.'image_lang` il, 
						   (SELECT i.`id_image`, '.$column_legend.' as legend 
							 FROM `'._DB_PREFIX_.'product` p JOIN `'._DB_PREFIX_.'image` i ON p.`id_product` = i.`id_product`
							 '.$join.'
							 WHERE p.`id_product` IN('.pSQL($in).')'.$where_position.') temp
						  SET il.`legend` = temp.`legend`
						  WHERE il.`id_image` = temp.`id_image` AND il.`id_lang` = '.$lang;

                if (!Db::getInstance()->execute($sql)) {
                    LoggerCPM::getInstance()->error($this->l('Failed to change caption'));
                }
            }
        }

        return array();
    }

    public function ajaxProcessSetDescriptionAllProduct()
    {
        $products = Tools::getValue('products');
        $description = Tools::getValue('description');
        $description_short = Tools::getValue('description_short');
        $language = (int)Tools::getValue('language');
        $product_name = Tools::getValue('product_name');

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        foreach ($products as $product) {
            if (!$language) {
                $languages = Language::getLanguages(true);
            } else {
                $languages = array(array('id_lang' => $language));
            }

            foreach ($languages as $lang) {
                $data_for_update = array();

                if ($this->checkAccessField('description')) {
                    $this->addToReIndexSearch((int)$product['id']);
                    $description_update = MassEditTools::renderMetaTag(
                        $description,
                        (int)$product['id'],
                        $lang['id_lang']
                    );
                    $data_for_update['description'] = $description_update;
                }
                if ($this->checkAccessField('description_short')) {
                    $this->addToReIndexSearch((int)$product['id']);
                    $description_short_update = MassEditTools::renderMetaTag(
                        $description_short,
                        (int)$product['id'],
                        $lang['id_lang']
                    );
                    $data_for_update['description_short'] = $description_short_update;
                }

                if ($this->checkAccessField('product_name')) {
                    $this->addToReIndexSearch((int)$product['id']);
                    $product_name_update = MassEditTools::renderMetaTag(
                        $product_name,
                        (int)$product['id'],
                        $lang['id_lang']
                    );
                    $data_for_update['name'] = $product_name_update;
                }

                if (count($data_for_update)) {
                    Db::getInstance()->update(
                        'product_lang',
                        $data_for_update,
                        ' id_product = '.(int)$product['id']
                        .($lang['id_lang'] ? ' AND id_lang = '.(int)$lang['id_lang'] : '')
                        .' '.(Shop::isFeatureActive() && $this->sql_shop ? ' AND id_shop '.$this->sql_shop : '')
                    );
                    $this->updateDateUpdProduct($product['id']);
                }
            }
        }

        $this->reindexSearch();

        return array();
    }

    public function ajaxProcessSetRuleCombinationAllProduct()
    {
        $products = Tools::getValue('products');
        $exact_match = (int)Tools::getValue('exact_match');
        $delete_attribute = (int)Tools::getValue('delete_attribute');
        $add_attribute = (int)Tools::getValue('add_attribute');
        $force_delete_attribute = (int)Tools::getValue('force_delete_attribute');
        $selected_attributes = (is_array(Tools::getValue('selected_attributes')) ?
            array_map('intval', Tools::getValue('selected_attributes'))
            : array());

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if ($this->checkAccessField('selected_attributes') && !count($selected_attributes)) {
            LoggerCPM::getInstance()->error($this->l('No selected attributes'));
        }

        $ids_product = array();
        $ids_product_attributes = array();
        if ($this->checkAccessField('selected_attributes')
            || $this->checkAccessField('delete_attribute')
            || $this->checkAccessField('add_attribute')) {
            foreach ($products as $product) {
                $ids_product[] = (int)$product['id'];
            }
            $this->addToReIndexSearch($ids_product);
        }

        if ($this->checkAccessField('selected_attributes')) {
            foreach ($selected_attributes as $selected_attribute) {
                $result = Db::getInstance()->executeS(
                    'SELECT pac.`id_product_attribute`
				FROM '._DB_PREFIX_.'product_attribute_combination pac
				LEFT JOIN '._DB_PREFIX_.'product_attribute_shop pas ON pas.`id_product_attribute` = pac.`id_product_attribute`
				LEFT JOIN '._DB_PREFIX_.'product p ON p.`id_product` = pas.`id_product`
				WHERE pac.`id_attribute` = '.(int)$selected_attribute.' AND pas.`id_shop` IN('.implode(
                        ',',
                        array_map('intval', $this->ids_shop)
                    ).')
				AND p.`id_product` IN('.implode(',', array_map('intval', $ids_product)).')'
                    .(count($ids_product_attributes) ?
                        ' AND pac.`id_product_attribute` IN('.implode(
                            ',',
                            array_map('intval', $ids_product_attributes)
                        ).') ' : '')
                );

                if (is_array($result)) {
                    $ids_product_attributes = array();

                    foreach ($result as $item) {
                        $ids_product_attributes[] = (int)$item['id_product_attribute'];
                    }
                    $ids_product_attributes = array_unique($ids_product_attributes);
                }
            }

            if (count($ids_product_attributes)) {
                foreach ($ids_product_attributes as $ids_product_attribute) {
                    $combination = new Combination($ids_product_attribute);
                    $attributes = $combination->getAttributesName($this->context->language->id);
                    if (count($selected_attributes) == count($attributes) || !$exact_match) {
                        $combination->delete();
                    }
                }
            }
        }

        if ($this->checkAccessField('delete_attribute')) {
            $result = Db::getInstance()->executeS(
                'SELECT pac.`id_product_attribute`, p.`id_product`
				FROM '._DB_PREFIX_.'product_attribute_combination pac
				LEFT JOIN '._DB_PREFIX_.'product_attribute_shop pas ON pas.`id_product_attribute` = pac.`id_product_attribute`
				LEFT JOIN '._DB_PREFIX_.'product p ON p.`id_product` = pas.`id_product`
				WHERE pac.`id_attribute` = '.(int)$delete_attribute.' AND pas.`id_shop` IN('.implode(
                    ',',
                    array_map('intval', $this->ids_shop)
                ).')
				AND p.`id_product` IN('.implode(',', array_map('intval', $ids_product)).')'
            );

            $product_attributes = array();
            if (is_array($result)) {
                foreach ($result as $item) {
                    $product_attributes[(int)$item['id_product_attribute']] = $item;
                }
            }

            if (count($product_attributes)) {
                foreach ($product_attributes as $product_attribute) {
                    if ($force_delete_attribute
                        || !($choice_pa = MassEditTools::checkProductOnChoiceAttributes(
                            $product_attribute['id_product'],
                            $product_attribute['id_product_attribute'],
                            $delete_attribute
                        ))) {
                        Db::getInstance()->delete(
                            'product_attribute_combination',
                            ' `id_attribute` = '.(int)$delete_attribute
                            .' AND `id_product_attribute` = '.(int)$product_attribute['id_product_attribute']
                        );
                    } else {
                        LoggerCPM::getInstance()->error(
                            sprintf(
                                $this->l('For product with id %s found choice combination with id %s'),
                                $product_attribute['id_product'],
                                $choice_pa
                            )
                        );
                    }
                }
            }
        }

        if ($this->checkAccessField('add_attribute')) {
            $result = Db::getInstance()->executeS(
                'SELECT pac.`id_product_attribute`, p.`id_product`
				FROM '._DB_PREFIX_.'product_attribute_combination pac
				LEFT JOIN '._DB_PREFIX_.'product_attribute_shop pas
				 ON pas.`id_product_attribute` = pac.`id_product_attribute`
				LEFT JOIN '._DB_PREFIX_.'product p
				 ON p.`id_product` = pas.`id_product`
				WHERE pac.`id_attribute`
				 AND pas.`id_shop` IN('.implode(',', array_map('intval', $this->ids_shop)).')
				AND p.`id_product` IN('.implode(',', array_map('intval', $ids_product)).')'
            );

            $product_attributes = array();
            if (is_array($result)) {
                foreach ($result as $item) {
                    $product_attributes[(int)$item['id_product_attribute']] = $item;
                }
            }

            if (count($product_attributes)) {
                foreach ($product_attributes as $product_attribute) {
                    if (!MassEditTools::checkProductOnChoiceAttributesReverse(
                        $product_attribute['id_product'],
                        $product_attribute['id_product_attribute'],
                        $add_attribute
                    )) {
                        Db::getInstance()->insert(
                            'product_attribute_combination',
                            array(
                                'id_attribute' => (int)$add_attribute,
                                'id_product_attribute' => (int)$product_attribute['id_product_attribute'],
                            )
                        );
                    }
                }
            }
        }

        if ($this->checkAccessField('selected_attributes')
            || $this->checkAccessField('delete_attribute')) {
            $this->updateDateUpdProducts($ids_product);
        }

        $this->reindexSearch();

        return array();
    }

    public function ajaxProcessSetAttachmentAllProduct()
    {
        $products = Tools::getValue('products');
        $attachments = Tools::getValue('attachments');
        $this->intValueRequestVar($attachments);
        $old_attachment = (int)Tools::getValue('old_attachment');

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if (!is_array($attachments) || !count($attachments)) {
            LoggerCPM::getInstance()->error($this->l('No attachments'));
        }

        if (!LoggerCPM::getInstance()->hasError()) {
            foreach ($products as $product) {
                MassEditTools::attachToProduct((int)$product['id'], $attachments, $old_attachment);
                $this->updateDateUpdProduct($product['id']);
            }
        }

        return array();
    }

    public function ajaxProcessSetReferenceAllProduct()
    {
        $change_for_property = (int)Tools::getValue('change_for_property');
        $ids_product = $this->getProductsForRequest();
        $product_combinations = $this->getCombinationsForRequest();

        if (!$ids_product) {
            LoggerCPM::getInstance()->error($this->l('No products'));

            return array();
        }

        if ($change_for_property) {
            if ($product_combinations) {
                $ids_combinations = call_user_func_array(
                    'array_merge',
                    $product_combinations
                );
                $ids_combinations = array_unique($ids_combinations);
            } else {
                LoggerCPM::getInstance()->error($this->l('No combinations'));

                return array();
            }
        }
        $assignment = array();

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        if ($this->checkAccessField('selected_reference')) {
            $reference = Tools::getValue('reference');
            $assignment[] = '`reference` = \''.pSQL($reference).'\'';
        }

        if ($this->checkAccessField('selected_ean13')) {
            $assignment[] = '`ean13` = \''.pSQL(Tools::getValue('ean13')).'\'';
        }

        if ($this->checkAccessField('selected_upc')) {
            $assignment[] = '`upc` = \''.pSQL(Tools::getValue('upc')).'\'';
        }

        if (isset($assignment)) {
            $set = 'SET '.implode(', ', $assignment);
        } else {
            LoggerCPM::getInstance()->error($this->l('Not selected field'));

            return array();
        }

        if (!$change_for_property) {
            $sql = 'UPDATE `'._DB_PREFIX_.'product` '
                .$set
                .' WHERE `id_product` IN (\''.implode('\', \'', $ids_product).'\')';
        } else {
            $sql = 'UPDATE `'._DB_PREFIX_.'product_attribute` '
                .$set
                .' WHERE `id_product_attribute` IN (\''.implode('\', \'', $ids_combinations).'\')';
        }

        $this->addToReIndexSearch($ids_product);
        if (!Db::getInstance()->execute($sql)) {
            LoggerCPM::getInstance()->error($this->l('Error writing to database'));

            return array();
        }

        $this->reindexSearch();

        return array(
            'ids_product' => $ids_product,
            'reference' => $reference,
        );
    }

    public function ajaxProcessSetAdvancedStockManagementAllProduct()
    {
        $products = Tools::getValue('products');
        $advanced_stock_management = Tools::getValue('advanced_stock_management', false);
        $depends_on_stock = Tools::getValue('depends_on_stock', false);

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        $return_products = array();

        foreach ($products as $product) {
            if ($advanced_stock_management === false) {
                LoggerCPM::getInstance()->error($this->l('Undefined value'));
            }
            if ((int)$advanced_stock_management != 1 && (int)$advanced_stock_management != 0) {
                LoggerCPM::getInstance()->error($this->l('Incorrect value'));
            }
            if (!Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') && (int)$advanced_stock_management == 1) {
                LoggerCPM::getInstance()->error($this->l('Not possible if advanced stock management is disabled. '));
            }
            $product_obj = new Product((int)$product['id']);
            $product_obj->setAdvancedStockManagement((int)$advanced_stock_management);
            if (StockAvailable::dependsOnStock($product_obj->id) == 1 && (int)$advanced_stock_management == 0) {
                StockAvailable::setProductDependsOnStock($product_obj->id, 0);
            }

            if ($depends_on_stock === false) {
                {
                    LoggerCPM::getInstance()->error($this->l('Undefined value'));
                }
            }
            if ((int)$depends_on_stock != 0 && (int)$depends_on_stock != 1) {
                LoggerCPM::getInstance()->error($this->l('Incorrect value'));
            }
            if (!$product_obj->advanced_stock_management && (int)$depends_on_stock == 1) {
                LoggerCPM::getInstance()->error($this->l('Not possible if advanced stock management is disabled. '));
            }
            if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')
                && (int)$depends_on_stock == 1
                && (Pack::isPack($product_obj->id)
                    && !Pack::allUsesAdvancedStockManagement($product_obj->id)
                    && ($product_obj->pack_stock_type == 2 || $product_obj->pack_stock_type == 1 ||
                        ($product_obj->pack_stock_type == 3
                            && (Configuration::get('PS_PACK_STOCK_TYPE') == 1
                                || Configuration::get('PS_PACK_STOCK_TYPE') == 2))))) {
                LoggerCPM::getInstance()->error(
                    $this->l(
                        'You cannot use advanced stock management for this 
                      pack because<br />
                      - advanced stock management is not enabled for these products<br />
                      - you have chosen to decrement products quantities.'
                    )
                );
            }

            StockAvailable::setProductDependsOnStock($product_obj->id, (int)$depends_on_stock);

            $return_products[(int)$product['id']] = (bool)$advanced_stock_management;
        }
        $this->updateDateUpdProducts(array_keys($return_products));

        return array(
            'products' => $return_products,
        );
    }

    public function ajaxProcessSetAdvancedStockManagementAllProductOld()
    {
        $products = Tools::getValue('products');
        $stock_management = Tools::getValue('stock_management', false);

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));
        }

        if (LoggerCPM::getInstance()->hasError()) {
            return array();
        }

        $return_products = array();

        foreach ($products as $product) {
            StockAvailable::setProductDependsOnStock((int)$product['id'], (bool)$stock_management);

            if (Context::getContext()->shop->getContext() == Shop::CONTEXT_GROUP
                && Context::getContext()->shop->getContextShopGroup()->share_stock == 1) {
                Db::getInstance()->execute(
                    '
				UPDATE `'._DB_PREFIX_.'product_shop`
				SET `advanced_stock_management`='.(int)$stock_management.'
				WHERE id_product='.(int)$product['id'].Shop::addSqlRestriction()
                );
            } else {
                MassEditTools::updateObjectField(
                    'Product',
                    'advanced_stock_management',
                    (int)$product['id'],
                    (bool)$stock_management
                );
            }

            $return_products[(int)$product['id']] = (bool)$stock_management;
        }
        $this->updateDateUpdProducts(array_keys($return_products));

        return array(
            'products' => $return_products,
        );
    }

    public function ajaxProcessSetMetaAllProduct()
    {
        $products = Tools::getValue('products');
        ${'_POST'}['products'] = false;
        $meta_title = Tools::getValue('meta_title');
        $meta_description = Tools::getValue('meta_description');
        $meta_keywords = Tools::getValue('meta_keywords');
        $tags = trim(Tools::getValue('tags'));
        $language = (int)Tools::getValue('language');
        $edit_tags = (int)Tools::getValue('edit_tags');

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));

            return array();
        }

        if ($this->checkAccessField('tags') && $edit_tags == 2) {
            if (strpbrk($tags, '!<;>;?=+#"°{}_$%')) {
                LoggerCPM::getInstance()->error($this->l('Invalid characters for tag'));

                return array();
            }

            if ($tags) {
                $sql = 'SELECT * FROM `'._DB_PREFIX_.'tag` WHERE `name` REGEXP "'.pSQL(
                    str_replace(',', '|', $tags)
                ).'"';
                $res = Db::getInstance()->executeS($sql);
            }

            $product_in = '';
            foreach ($products as $product) {
                $product_in .= $product['id'].', ';
            }
            $product_in = rtrim($product_in, ', ');

            if (strpos($product_in, ',')) {
                $where = 'id_product IN ('.pSQL($product_in).')';
            } else {
                $where = 'id_product="'.(int)$product_in.'"';
            }

            $tag_list = array();

            if (isset($res) && is_array($res)) {
                $in = '';
                foreach ($res as $tag) {
                    $in .= $tag['id_tag'].', ';
                }
                $in = rtrim($in, ', ');

                if (strpos($in, ',')) {
                    $where .= ' AND id_tag IN ('.pSQL($in).')';
                } else {
                    $where .= ' AND id_tag="'.(int)$in.'"';
                }

                foreach ($res as $tag_removed) {
                    $tag_list[] = $tag_removed['id_tag'];
                }
            } else {
                $tags_removed = Db::getInstance()->executeS(
                    'SELECT id_tag FROM '._DB_PREFIX_.'product_tag WHERE '.pSQL($where)
                );
                $tag_list = array();
                foreach ($tags_removed as $tag_removed) {
                    $tag_list[] = $tag_removed['id_tag'];
                }
            }

            Db::getInstance()->delete('product_tag', $where);
            Db::getInstance()->delete(
                'tag',
                'NOT EXISTS (SELECT 1 FROM '._DB_PREFIX_.'product_tag
													WHERE '._DB_PREFIX_.'product_tag.id_tag = '._DB_PREFIX_.'tag.id_tag)'
            );

            if ($tag_list != array()) {
                Tag::updateTagCount($tag_list);
            }
        }

        if ($this->checkAccessField('tags') && $tags && $edit_tags == 0) {
            $where = strpos($tags, ',') ? ' WHERE `name` IN ('.$tags.')' : ' WHERE `name`="'.$tags.'"';
            $matching_tags = Db::getInstance()->executeS(
                'SELECT * FROM `'._DB_PREFIX_.'tag` p
			JOIN `'._DB_PREFIX_.'product_tag` pt ON p.`id_tag`=pt.`id_tag`'.$where
            );
        }

        foreach ($products as $product) {
            $data_for_update = array();

            if ($this->checkAccessField('meta_title')) {
                $this->addToReIndexSearch((int)$product['id']);
                $meta_title_result = MassEditTools::renderMetaTag($meta_title, (int)$product['id'], $language);
                $data_for_update['meta_title'] = $meta_title_result;
            }

            if ($this->checkAccessField('meta_description')) {
                $this->addToReIndexSearch((int)$product['id']);
                $meta_description_result = MassEditTools::renderMetaTag(
                    $meta_description,
                    (int)$product['id'],
                    $language
                );
                $data_for_update['meta_description'] = $meta_description_result;
            }

            if ($this->checkAccessField('meta_keywords')) {
                $this->addToReIndexSearch((int)$product['id']);
                $meta_keywords_result = MassEditTools::renderMetaTag($meta_keywords, (int)$product['id'], $language);
                $data_for_update['meta_keywords'] = $meta_keywords_result;
            }

            if ($this->checkAccessField('tags') && $edit_tags != 2) {
                if (strpbrk($tags, '!<;>;?=+#"°{}_$%')) {
                    LoggerCPM::getInstance()->error($this->l('Invalid characters for tag'));

                    return array();
                }

                $this->addToReIndexSearch((int)$product['id']);

                if ($edit_tags == 0 || $edit_tags == 1) {
                    if ($edit_tags == 1) {
                        Tag::deleteTagsForProduct((int)$product['id']);
                    }

                    if ($edit_tags == 0) {
                        if ($matching_tags) {
                            $temp_tags = trim(Tools::getValue('tags'));
                            foreach ($matching_tags as $mt) {
                                if ($mt['id_product'] == $product['id']) {
                                    $temp_tags = preg_replace('/,?'.$mt['name'].'/i', '', $temp_tags);
                                }
                            }
                            $tags = trim($temp_tags, ',');
                        }
                    }

                    if ($language && $tags) {
                        Tag::addTags((int)$language, (int)$product['id'], $tags);
                    } else {
                        if ($tags) {
                            foreach (Language::getLanguages(false) as $lang) {
                                Tag::addTags((int)$lang['id_lang'], (int)$product['id'], $tags);
                            }
                        }
                    }
                }
            }

            if (count($data_for_update)) {
                Db::getInstance()->update(
                    'product_lang',
                    $data_for_update,
                    ' id_product = '.(int)$product['id']
                    .($language ? ' AND id_lang = '.(int)$language : '')
                    .' '.(Shop::isFeatureActive() && $this->sql_shop ? ' AND id_shop '.$this->sql_shop : '')
                );
                $this->updateDateUpdProduct($product['id']);
            }
        }

        $this->reindexSearch();

        return array();
    }

    public function ajaxProcessSetCreateProductsAllProduct()
    {
        $name_lang_default = pSQL(Tools::getValue('name_'.$this->context->language->id));
        if (!$name_lang_default) {
            $name_lang_default = pSQL(Tools::getValue('name_'.Configuration::get('PS_LANG_DEFAULT')));
        }

        if (!$name_lang_default) {
            foreach (${'_POST'} as $key => $post) {
                if (Tools::substr($key, 0, 5) == 'name_' && !empty($post)) {
                    $name_lang_default = $post;
                }
            }
        }

        if (empty($name_lang_default)) {
            die('Empty product name.');
        }

        $id_attribute_group = (int)Tools::getValue('attribute');
        $attributes = Db::getInstance()->executeS(
            'SELECT * FROM `'._DB_PREFIX_.'attribute` 
		WHERE `id_attribute_group` ='.(int)$id_attribute_group
        );

        if (!$attributes) {
            $attributes = array(array());
        }

        foreach ($attributes as $attribute) {
            $product = new Product();
            $name = array();
            $languages = Language::getLanguages(false);
            $language_ids = array();
            foreach ($languages as $language) {
                $language_ids[] = (int)$language['id_lang'];
            }

            foreach ($language_ids as $id_lang) {
                if (count($attribute)) {
                    $attribute_group = new AttributeGroup($id_attribute_group, $id_lang);
                    $attribute_obj = new Attribute($attribute['id_attribute']);
                }

                $post_name_lang = Tools::getValue('name_'.$id_lang);
                $name_lang = empty($post_name_lang)
                    ? $name_lang_default : pSQL(Tools::getValue('name_'.$id_lang));
                $name[$id_lang] = $name_lang.
                    (count($attribute) ? '-'.$attribute_group->name.': '.$attribute_obj->name[$id_lang] : '');
            }

            $product->name = $name;
            foreach ($product->name as $id_lang => $name_lang) {
                $product->link_rewrite[$id_lang] = Tools::link_rewrite($name_lang);
            }

            if (Tools::getIsset('unit_price') != null) {
                $product->unit_price = str_replace(',', '.', Tools::getValue('unit_price'));
            }
            $product->id_category_default = (int)Tools::getValue('id_category_default');

            if (!$product->add()) {
                die('An error occurred while creating an object.');
            }
            $product->addToCategories(Tools::getValue('categoryBox'));
        }
        $this->reindexSearch();

        return array();
    }

    public function ajaxProcessSetCustomizationAllProduct()
    {
        $products = Tools::getValue('products');

        if (!is_array($products) || !count($products)) {
            LoggerCPM::getInstance()->error($this->l('No products'));

            return array();
        }

        $labels = Tools::getValue('label');
        if (!is_array($labels) || !count($labels)) {
            LoggerCPM::getInstance()->error($this->l('Not labels'));

            return array();
        }

        $file_fields = (array_key_exists(Product::CUSTOMIZE_FILE, $labels)
        && is_array($labels[Product::CUSTOMIZE_FILE]) ? $labels[Product::CUSTOMIZE_FILE] : array());

        $text_fields = (array_key_exists(Product::CUSTOMIZE_TEXTFIELD, $labels)
        && is_array($labels[Product::CUSTOMIZE_TEXTFIELD]) ? $labels[Product::CUSTOMIZE_TEXTFIELD] : array());

        $ids_product = $this->getProductsForRequest();

        if ($this->checkAccessField('delete_customization_fields') && Tools::getValue('delete_customization_fields')) {
            Db::getInstance()->execute(
                'DELETE cf, cfl 
            FROM `'._DB_PREFIX_.'customization_field` cf
            LEFT JOIN `'._DB_PREFIX_.'customization_field_lang` cfl
            ON cf.`id_customization_field` = cfl.`id_customization_field`
            WHERE cf.`id_product` IN('.implode(',', array_map('intval', $ids_product)).')'
            );

            Db::getInstance()->execute(
                'UPDATE '._DB_PREFIX_.'product p, '._DB_PREFIX_.'product_shop ps
                SET p.`uploadable_files` = 0,
                    p.`text_fields` = 0,
                    ps.`uploadable_files` = 0,
                    ps.`text_fields` = 0
                WHERE p.`id_product` = ps.`id_product`
                AND p.`id_product` IN('.implode(',', array_map('intval', $ids_product)).')'
            );
        }

        $fields = array(
            'uploadable_files' => 0,
            'text_fields' => 0,
        );

        if ($this->checkAccessField('customization_file_labels')) {
            $fields['uploadable_files'] = count($file_fields);
        }

        if ($this->checkAccessField('customization_text_labels')) {
            $fields['text_fields'] = count($text_fields);
        }

        Db::getInstance()->execute(
            'UPDATE '._DB_PREFIX_.'product p, '._DB_PREFIX_.'product_shop ps
            SET p.`uploadable_files` = ('.$fields['uploadable_files'].' + p.`uploadable_files`),
                p.`text_fields` =('.$fields['text_fields'].' + p.`text_fields`),
                ps.`uploadable_files` = ('.$fields['uploadable_files'].' + ps.`uploadable_files`),
                ps.`text_fields` =('.$fields['text_fields'].' + ps.`text_fields`)
            WHERE p.`id_product` = ps.`id_product`
            AND p.`id_product` IN('.implode(',', array_map('intval', $ids_product)).')'
        );

        foreach ($ids_product as $id_product) {
            $has_required_fields = 0;

            if ($this->checkAccessField('customization_file_labels')) {
                foreach ($file_fields as $file_field) {
                    $customization_field = new CustomizationField();
                    $customization_field->id_product = $id_product;
                    $customization_field->type = Product::CUSTOMIZE_FILE;
                    if (array_key_exists('required', $file_field)) {
                        $customization_field->required = (int)$file_field['required'];
                    } else {
                        $customization_field->required = false;
                    }
                    $has_required_fields |= $customization_field->required;
                    $customization_field->name = $file_field['name'];
                    $customization_field->save();
                }
            }

            if ($this->checkAccessField('customization_text_labels')) {
                foreach ($text_fields as $text_field) {
                    $customization_field = new CustomizationField();
                    $customization_field->id_product = $id_product;
                    $customization_field->type = Product::CUSTOMIZE_TEXTFIELD;
                    if (array_key_exists('required', $text_field)) {
                        $customization_field->required = (int)$text_field['required'];
                    } else {
                        $customization_field->required = false;
                    }
                    $has_required_fields |= $customization_field->required;
                    $customization_field->name = $text_field['name'];
                    $customization_field->save();
                }
            }

            if ($has_required_fields) {
                ObjectModel::updateMultishopTable(
                    'product',
                    array('customizable' => 2),
                    'a.id_product = '.(int)$id_product
                );
            }
            Configuration::updateGlobalValue(
                'PS_CUSTOMIZATION_FEATURE_ACTIVE',
                Customization::isCurrentlyUsed()
            );
        }

        return array();
    }

    public $return = array();

    public function ajaxProcessApi()
    {
        ToolsModuleCPM::setErrorHandler();
        ToolsModuleCPM::createAjaxApiCall($this);
    }

    public function ajaxProcessCopyFieldDescription()
    {
        $id_product = Tools::getValue('id_product');
        $id_lang = Tools::getValue('id_lang');
        $iso_code = Language::getIsoById($id_lang);
        if (!$iso_code) {
            $id_lang = $this->context->language->id;
        }

        $product = new Product($id_product, false, $id_lang);
        $description = false;
        if (Validate::isLoadedObject($product)) {
            $description = $product->description;
        }
        die(
            Tools::jsonEncode(
                array(
                    'response' => $description,
                )
            )
        );
    }

    public function ajaxProcessCopyFieldDescriptionShort()
    {
        $id_product = Tools::getValue('id_product');
        $id_lang = Tools::getValue('id_lang');
        $iso_code = Language::getIsoById($id_lang);
        if (!$iso_code) {
            $id_lang = $this->context->language->id;
        }

        $product = new Product($id_product, false, $id_lang);
        $description = false;
        if (Validate::isLoadedObject($product)) {
            $description = $product->description_short;
        }
        die(Tools::jsonEncode(array('response' => $description)));
    }

    public function ajaxProcessRowCopySearchProduct()
    {
        $query = Tools::getValue('query');
        $rows = Db::getInstance()->executeS(
            'SELECT p.`id_product`, CONCAT(p.`id_product`, " - ", pl.`name`) as name FROM '._DB_PREFIX_.'product p
		LEFT JOIN '._DB_PREFIX_.'product_lang pl ON p.`id_product` = pl.`id_product` AND pl.`id_lang` = '.(int)$this->context->language->id.'
		WHERE '.MassEditTools::buildSQLSearchWhereFromQuery($query, false, 'CONCAT(p.`id_product`, " - ", pl.`name`)')
        );
        die(Tools::jsonEncode((is_array($rows) && count($rows) ? $rows : array())));
    }

    public function ajaxProcessDownloadAttachment()
    {
        if ($this->tabAccess['edit'] === '0') {
            //Return if no access
            return die(Tools::jsonEncode(array('error' => $this->l('You do not have the right permission'))));
        }

        $filename = array();
        $description = array();
        foreach ($this->getLanguages(false) as $lang) {
            $filename_lang = Tools::getValue('filename_'.$lang['id_lang']);
            $description_lang = Tools::getValue('description_'.$lang['id_lang']);
            $filename[$lang['id_lang']] = ($filename_lang ? $filename_lang : Tools::getValue(
                'filename_'.$this->context->language->id
            ));
            $description[$lang['id_lang']] = ($description_lang ? $description_lang : Tools::getValue(
                'description_'.$this->context->language->id
            ));
        }

        $file = $_FILES['file'];

        if (isset($file)) {
            if ((int)$file['error'] === 1) {
                $file['error'] = array();

                $max_upload = (int)ini_get('upload_max_filesize');
                $max_post = (int)ini_get('post_max_size');
                $upload_mb = min($max_upload, $max_post);
                $file['error'][] = sprintf(
                    $this->l('File %1$s exceeds the size allowed by the server. The limit is set to %2$d MB.'),
                    '<b>'.$file['name'].'</b> ',
                    '<b>'.$upload_mb.'</b>'
                );
            }

            $file['error'] = array();

            $is_attachment_name_valid = false;

            if (array_key_exists($this->context->language->id, $filename) && $filename[$this->context->language->id]) {
                $is_attachment_name_valid = true;
            }

            if (!$is_attachment_name_valid) {
                $file['error'][] = $this->l('An attachment name is required.');
            }

            if (empty($file['error'])) {
                if (is_uploaded_file($file['tmp_name'])) {
                    if ($file['size'] > (Configuration::get('PS_ATTACHMENT_MAXIMUM_SIZE') * 1024 * 1024)) {
                        $file['error'][] = sprintf(
                            $this->l(
                                'The file is too large. Maximum size allowed is: %1$d kB. The file you are trying to upload is %2$d kB.'
                            ),
                            (Configuration::get('PS_ATTACHMENT_MAXIMUM_SIZE') * 1024),
                            number_format(($file['size'] / 1024), 2, '.', '')
                        );
                    } else {
                        do {
                            $uniqid = sha1(microtime());
                        } while (file_exists(_PS_DOWNLOAD_DIR_.$uniqid));
                        if (!copy($file['tmp_name'], _PS_DOWNLOAD_DIR_.$uniqid)) {
                            $file['error'][] = $this->l('File copy failed');
                        }

                        @unlink($file['tmp_name']);
                    }
                } else {
                    $file['error'][] = $this->l('The file is missing.');
                }

                if (empty($file['error']) && isset($uniqid)) {
                    $attachment = new Attachment();

                    $attachment->name = $filename;
                    $attachment->description = $description;

                    $attachment->file = $uniqid;
                    $attachment->mime = $file['type'];
                    $attachment->file_name = $file['name'];

                    if (empty($attachment->mime) || Tools::strlen($attachment->mime) > 128) {
                        $file['error'][] = $this->l('Invalid file extension');
                    }

                    if (!Validate::isGenericName($attachment->file_name)) {
                        $file['error'][] = $this->l('Invalid file name');
                    }

                    if (Tools::strlen($attachment->file_name) > 128) {
                        $file['error'][] = $this->l('The file name is too long.');
                    }

                    if (empty($this->errors)) {
                        $res = $attachment->add();
                        if (!$res) {
                            $file['error'][] = $this->l('This attachment was unable to be loaded into the database.');
                        } else {
                            $file['id_attachment'] = $attachment->id;
                            $file['filename'] = $attachment->name[$this->context->employee->id_lang];
                            if (!$res) {
                                $file['error'][] = $this->l(
                                    'We were unable to associate this attachment to a product.'
                                );
                            }
                        }
                    } else {
                        $file['error'][] = $this->l('Invalid file');
                    }
                }
            }

            die(Tools::jsonEncode($file));
        }
    }

    public function ajaxProcessLoadFeatures()
    {
        $p = (int)Tools::getValue('p', 1);

        $features = MassEditTools::getFeatures($this->context->language->id, true, $p);

        foreach ($features as &$feature) {
            $feature['values'] = FeatureValue::getFeatureValuesWithLang(
                $this->context->language->id,
                $feature['id_feature']
            );
        }
        $features_list = '';

        foreach ($features as $f) {
            $this->context->smarty->assign(
                array(
                    'languages' => $this->getLanguages(),
                    'feature' => $f,
                )
            );
            $features_list .= $this->context->smarty->fetch(
                _PS_MODULE_DIR_.$this->module->name
                .'/views/templates/admin/mass_edit_product/helpers/form/row_feature.tpl'
            );
        }

        die(
            Tools::jsonEncode(
                array(
                    'hasError' => false,
                    'features_list' => $features_list,
                )
            )
        );
    }

    public function ajaxProcessUploadImages()
    {
        MassEditTools::clearTmpFolder();
        $images = MassEditTools::getImages('image');
        $response_images = array();
        if (is_array($images) && count($images)) {
            foreach ($images as $key => $image) {
                if (MassEditTools::checkImage('image', $key)) {
                    $response_images[$key] = array();
                    $this->uploadImageProduct($image, MassEditTools::getPath().$key.'_original.jpg');
                    $response_images[$key]['original'] = $key.'_original.jpg';
                    $types = ImageType::getImagesTypes('products');
                    foreach ($types as $type) {
                        $this->uploadImageProduct(
                            $image,
                            MassEditTools::getPath().$key.'_original_'.$type['name'].'.jpg',
                            $type['width'],
                            $type['height']
                        );
                        $response_images[$key][$type['name']] = $key.'_original_'.$type['name'].'.jpg';
                    }
                }
            }
        }
        die(
            Tools::jsonEncode(
                array(
                    'responseImages' => $response_images,
                )
            )
        );
    }

    public function ajaxProcessGetProducts()
    {
        $query = Tools::getValue('query');
        $select_products = Tools::getValue('select_products');
        $search_by = Tools::getValue('search_by');
        if (!is_array($select_products) || !count($select_products)) {
            $select_products = array();
        }

        $search_by_query = 'pl.`name`';
        if ($search_by == 'reference') {
            $search_by_query = 'ps.`reference`';
        }

        $this->intValueRequestVar($select_products);
        $result = Db::getInstance()->executeS(
            'SELECT pl.`id_product`, CONCAT(pl.`id_product`, " - ", pl.`name`) as `name` FROM '._DB_PREFIX_.'product_shop p
		LEFT JOIN '._DB_PREFIX_.'product ps ON ps.`id_product` = p.`id_product`
		LEFT JOIN '._DB_PREFIX_.'product_lang pl ON p.`id_product` = pl.`id_product` AND pl.`id_lang` = '.(int)$this->context->language->id.
            ' WHERE '.$search_by_query.' LIKE "%'.pSQL($query).'%" AND p.`id_shop` = '.(int)$this->context->shop->id
            .' AND pl.`id_shop` = '.(int)$this->context->shop->id.
            (count($select_products) ?
                ' AND p.id_product NOT IN('.pSQL(implode(',', $select_products)).') '
                : '')
        );

        if (!$result) {
            $result = array();
        }
        die(Tools::jsonEncode($result));
    }

    public function ajaxProcessGetCombinationsByAttributes()
    {
        $attributes = array();
        foreach ((array)Tools::getValue('data') as $data) {
            $attributes[] = $data['value'];
        }
        $combinations = Db::getInstance()->executeS(
            'SELECT * FROM `'._DB_PREFIX_.'product_attribute_combination`
		WHERE `id_attribute` IN ('.(count($attributes) ? implode($attributes, ', ') : '0').')'
        );


        die(
            Tools::jsonEncode(
                array(
                    'hasError' => $combinations ? false : true,
                    'error' => $this->module->l('No combinations with these attributes'),
                    'data' => $combinations,
                )
            )
        );
    }

    public function ajaxProcessGetAttributesByGroup()
    {
        $attributes = Db::getInstance()->executeS(
            'SELECT a.`id_attribute`, al.`name` FROM `'._DB_PREFIX_.'attribute` a
		LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al ON a.`id_attribute` = al.`id_attribute`
		WHERE a.`id_attribute_group` = '.(int)Tools::getValue('group').'
		AND al.`id_lang` = '.(int)$this->context->language->id
        );

        die(
            Tools::jsonEncode(
                array(
                    'hasError' => $attributes ? false : true,
                    'error' => $this->module->l('No combinations with these attributes'),
                    'data' => $attributes,
                )
            )
        );
    }

    public function ajaxProcessRenderFeatureValues()
    {
        $id_feature = Tools::getValue('id_feature');
        die(
            Tools::jsonEncode(
                array(
                    'html' => ToolsModuleCPM::fetchTemplate(
                        'admin/feature_values.tpl',
                        array(
                            'values' => FeatureValue::getFeatureValuesWithLang(
                                $this->context->language->id,
                                (int)$id_feature
                            ),
                            'id_feature' => $id_feature,
                        )
                    ),
                )
            )
        );
    }

    public function ajaxProcessLoadCombinations()
    {
        $id_product = (int)Tools::getValue('id_product');

        $attributes = Db::getInstance()->executeS(
            'SELECT
                pa.`id_product`,
                pa.`id_product_attribute`,
                sa.`quantity`,
                pas.`price`,
                pss.`price` as product_price,
                (pas.`price` + pss.`price`) as total_price,
                agl.`name` as group_name,
                al.`name`
            FROM '._DB_PREFIX_.'product_attribute pa
            LEFT JOIN '._DB_PREFIX_.'product p ON p.`id_product` = pa.`id_product`
            LEFT JOIN `'._DB_PREFIX_.'product_shop` pss
             ON (pa.`id_product` = pss.`id_product` AND pss.id_shop = '.pSQL($this->getIdShopSql()).')
            LEFT JOIN '._DB_PREFIX_.'tax_rules_group trg
             ON trg.`id_tax_rules_group` = pss.`id_tax_rules_group`
            LEFT JOIN '._DB_PREFIX_.'tax t ON t.`id_tax` = pss.`id_tax_rules_group`
            LEFT JOIN '._DB_PREFIX_.'product_attribute_shop pas
             ON pas.`id_product_attribute` = pa.`id_product_attribute`
            LEFT JOIN '._DB_PREFIX_.'stock_available sa
             ON sa.`id_product_attribute` = pa.`id_product_attribute`
              AND sa.`id_shop` = '.pSQL($this->getIdShopSql()).'
            LEFT JOIN '._DB_PREFIX_.'product_attribute_combination pac
             ON pac.`id_product_attribute` = pa.`id_product_attribute`
            LEFT JOIN '._DB_PREFIX_.'attribute a
             ON a.`id_attribute` = pac.`id_attribute`
            LEFT JOIN '._DB_PREFIX_.'attribute_lang al
             ON al.`id_attribute` = a.`id_attribute`
              AND al.`id_lang` = '.(int)$this->context->language->id.'
            LEFT JOIN '._DB_PREFIX_.'attribute_group_lang agl
             ON agl.`id_attribute_group` = a.`id_attribute_group`
            AND agl.`id_lang` = '.(int)$this->context->language->id.'
            WHERE pa.`id_product` = '.(int)$id_product.' AND pas.`id_shop` = '.pSQL($this->getIdShopSql())
        );

        $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
        $address = new Address();
        $address->id_country = $country->id;
        $combinations = array();

        $product = array();
        foreach ($attributes as $attribute) {
            $tax_manager = TaxManagerFactory::getManager(
                $address,
                Product::getIdTaxRulesGroupByIdProduct(
                    (int)$attribute['id_product'],
                    $this->context
                )
            );
            $product_tax_calculator = $tax_manager->getTaxCalculator();

            if (!array_key_exists(
                $attribute['id_product_attribute'],
                $combinations
            )) {
                // Fixme: $product['product_price'] is undefined key!!!
                if (!array_key_exists('product_price', $attribute)) {
                    $product['product_price'] = 0;
                }

                $combinations[$attribute['id_product_attribute']] = array(
                    'id_product' => $attribute['id_product'],
                    'price' => $attribute['price'],
                    'price_final' => ((int)Configuration::get('PS_TAX')
                        ? $product_tax_calculator->addTaxes($attribute['price']) : $attribute['price']),
                    'total_price' => $attribute['total_price'],
                    'total_price_final' =>
                        ((int)Configuration::get('PS_TAX') ?
                            $product_tax_calculator->addTaxes($attribute['price'] + $attribute['product_price']) :
                            $attribute['price'] + $attribute['product_price']),
                    'quantity' => $attribute['quantity'],
                    'attributes' => $attribute['group_name'].': '.$attribute['name'],
                );
            } else {
                $combinations[$attribute['id_product_attribute']]['attributes']
                    .= ', '.$attribute['group_name'].': '.$attribute['name'];
            }
        }

        $currency = Currency::getCurrency(Configuration::get('PS_CURRENCY_DEFAULT'));
        $currency = $currency['id_currency'];

        die(
            Tools::jsonEncode(
                array(
                    'combinations' => ToolsModuleCPM::fetchTemplate(
                        'admin/mass_edit_product/helpers/form/product_combinations.tpl',
                        array(
                            'combinations' => $combinations,
                            'currency' => $currency,
                            'id_product' => $id_product,
                        )
                    ),
                )
            )
        );
    }

    /**
     * instead ajaxProcessLoadCombinations() for one ajax request
     */
    public function ajaxProcessLoadCombinationsOneRequest()
    {
        $ids_product = Tools::getValue('ids_product');

        $json = array();
        foreach ($ids_product as $id_product) {
            $attributes = Db::getInstance()->executeS(
                'SELECT
                pa.`id_product`,
                pa.`id_product_attribute`,
                sa.`quantity`,
                pas.`price`,
                pss.`price` as product_price,
                (pas.`price` + pss.`price`) as total_price,
                agl.`name` as group_name,
                al.`name`
            FROM '._DB_PREFIX_.'product_attribute pa
            LEFT JOIN '._DB_PREFIX_.'product p ON p.`id_product` = pa.`id_product`
            LEFT JOIN `'._DB_PREFIX_.'product_shop` pss
             ON (pa.`id_product` = pss.`id_product` AND pss.id_shop = '.pSQL($this->getIdShopSql()).')
            LEFT JOIN '._DB_PREFIX_.'tax_rules_group trg
             ON trg.`id_tax_rules_group` = pss.`id_tax_rules_group`
            LEFT JOIN '._DB_PREFIX_.'tax t ON t.`id_tax` = pss.`id_tax_rules_group`
            LEFT JOIN '._DB_PREFIX_.'product_attribute_shop pas
             ON pas.`id_product_attribute` = pa.`id_product_attribute`
            LEFT JOIN '._DB_PREFIX_.'stock_available sa
             ON sa.`id_product_attribute` = pa.`id_product_attribute`
              AND sa.`id_shop` = '.pSQL($this->getIdShopSql()).'
            LEFT JOIN '._DB_PREFIX_.'product_attribute_combination pac
             ON pac.`id_product_attribute` = pa.`id_product_attribute`
            LEFT JOIN '._DB_PREFIX_.'attribute a
             ON a.`id_attribute` = pac.`id_attribute`
            LEFT JOIN '._DB_PREFIX_.'attribute_lang al
             ON al.`id_attribute` = a.`id_attribute`
              AND al.`id_lang` = '.(int)$this->context->language->id.'
            LEFT JOIN '._DB_PREFIX_.'attribute_group_lang agl
             ON agl.`id_attribute_group` = a.`id_attribute_group`
            AND agl.`id_lang` = '.(int)$this->context->language->id.'
            WHERE pa.`id_product` = '.(int)$id_product.' AND pas.`id_shop` = '.pSQL($this->getIdShopSql())
            );

            $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
            $address = new Address();
            $address->id_country = $country->id;
            $combinations = array();

            $product = array();
            foreach ($attributes as $attribute) {
                $tax_manager = TaxManagerFactory::getManager(
                    $address,
                    Product::getIdTaxRulesGroupByIdProduct(
                        (int)$attribute['id_product'],
                        $this->context
                    )
                );
                $product_tax_calculator = $tax_manager->getTaxCalculator();

                if (!array_key_exists(
                    $attribute['id_product_attribute'],
                    $combinations
                )) {
                    // Fixme: $product['product_price'] is undefined key!!!
                    if (!array_key_exists('product_price', $attribute)) {
                        $product['product_price'] = 0;
                    }

                    $combinations[$attribute['id_product_attribute']] = array(
                        'id_product' => $attribute['id_product'],
                        'price' => $attribute['price'],
                        'price_final' => ((int)Configuration::get('PS_TAX')
                            ? $product_tax_calculator->addTaxes($attribute['price']) : $attribute['price']),
                        'total_price' => $attribute['total_price'],
                        'total_price_final' =>
                            ((int)Configuration::get('PS_TAX') ?
                                $product_tax_calculator->addTaxes($attribute['price'] + $attribute['product_price']) :
                                $attribute['price'] + $attribute['product_price']),
                        'quantity' => $attribute['quantity'],
                        'attributes' => $attribute['group_name'].': '.$attribute['name'],
                    );
                } else {
                    $combinations[$attribute['id_product_attribute']]['attributes']
                        .= ', '.$attribute['group_name'].': '.$attribute['name'];
                }
            }

            $currency = Currency::getCurrency(Configuration::get('PS_CURRENCY_DEFAULT'));
            $currency = $currency['id_currency'];

            $json[$id_product] = ToolsModuleCPM::fetchTemplate(
                'admin/mass_edit_product/helpers/form/product_combinations.tpl',
                array(
                    'combinations' => $combinations,
                    'currency' => $currency,
                    'id_product' => $id_product,
                )
            );
        }
        die(Tools::jsonEncode($json));
    }

    public function ajaxProcessAddCustomizationField()
    {
        $type = Tools::getValue('type');
        $counter = Tools::getValue('counter');
        $languages = ToolsModuleCPM::getLanguages(false);

        die(
            Tools::jsonEncode(
                array(
                    'html' => ToolsModuleCPM::fetchTemplate(
                        'admin/mass_edit_product/helpers/form/customization_field.tpl',
                        array(
                            'type' => $type,
                            'counter' => $counter,
                            'languages' => $languages,
                        )
                    ),
                )
            )
        );
    }

    public function ajaxProcessSaveTemplateProduct()
    {
        $products = Tools::getValue('products');
        $name = Tools::getValue('name');

        if (!is_array($products) || !count($products)) {
            $this->errors[] = $this->l('Not products!');
        }
        if (!$name) {
            $this->errors[] = $this->l('Name empty');
        }

        if (!count($this->errors)) {
            $template_products = new TemplateProductsMEP();
            $template_products->name = $name;
            foreach ($products as $product) {
                $template_products->products[] = array(
                    'id_product' => $product['id'],
                );
            }

            if (!$template_products->save()) {
                $this->errors[] = $this->l('Template save successfuly!');
            }
        }

        die(
            Tools::jsonEncode(
                array(
                    'hasError' => (count($this->errors) ? true : false),
                    'errors' => $this->errors,
                    'templates_products' => TemplateProductsMEP::getAll(true),
                )
            )
        );
    }

    public function ajaxProcessDeleteTemplateProduct()
    {
        $id = Tools::getValue('id');
        $template_products = new TemplateProductsMEP($id);

        if (Validate::isLoadedObject($template_products)) {
            $template_products->delete();
        }

        die(Tools::jsonEncode(array()));
    }

    public function ajaxProcessGetTemplateProduct()
    {
        $id = Tools::getValue('id');
        $template_products = new TemplateProductsMEP($id);

        $currency = Currency::getCurrency(Configuration::get('PS_CURRENCY_DEFAULT'));
        $currency = $currency['id_currency'];

        $popup_list = '';
        $list = '';
        $products = array();
        foreach ($template_products->products as $product) {
            $popup_list .= ToolsModuleCPM::fetchTemplate(
                'admin/mass_edit_product/helpers/form/popup_product_line.tpl',
                array(
                    'product' => $product,
                )
            );
            $list .= ToolsModuleCPM::fetchTemplate(
                'admin/mass_edit_product/helpers/form/product_line.tpl',
                array(
                    'product' => $product,
                    'currency' => $currency,
                )
            );
            $products[$product['id_product']] = array(
                'id' => $product['id_product'],
                'name' => $product['name'],
            );
        }

        die(
            Tools::jsonEncode(
                array(
                    'popup_list' => $popup_list,
                    'list' => $list,
                    'products' => $products,
                )
            )
        );
    }

    public function uploadImageProduct($tmp_image, $image_to, $width = null, $height = null)
    {
        ImageManager::resize($tmp_image, $image_to, $width, $height);
    }

    protected $check_features = array();

    protected function checkFeatures($languages, $feature_id, &$errors)
    {
        if (array_key_exists($feature_id, $this->check_features)) {
            return $this->check_features[$feature_id];
        }
        $rules = call_user_func(array('FeatureValue', 'getValidationRules'), 'FeatureValue');
        $feature = Feature::getFeature((int)Configuration::get('PS_LANG_DEFAULT'), $feature_id);
        $val = 0;
        foreach ($languages as $language) {
            if ($val = Tools::getValue('custom_'.$feature_id.'_'.$language['id_lang'])) {
                $current_language = new Language($language['id_lang']);
                if (Tools::strlen($val) > $rules['sizeLang']['value']) {
                    $errors[] = sprintf(
                        $this->l('The name for feature %1$s is too long in %2$s.'),
                        ' <b>'.$feature['name'].'</b>',
                        $current_language->name
                    );
                } elseif (!call_user_func(array('Validate', $rules['validateLang']['value']), $val)) {
                    $errors[] = sprintf(
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

    public function validateSpecificPrice(
        $id_product,
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
        $id_combination = 0
    ) {
        if (!Validate::isUnsignedId($id_shop)
            || !Validate::isUnsignedId($id_currency)
            || !Validate::isUnsignedId($id_country) || !Validate::isUnsignedId($id_group) || !Validate::isUnsignedId(
                $id_customer
            )) {
            LoggerCPM::getInstance()->error(sprintf($this->module->l('Product №%s: wrong IDs'), $id_product));
        } elseif ((!isset($price)
                && !isset($reduction))
            || (isset($price)
                && !Validate::isNegativePrice($price))
            || (isset($reduction) && !Validate::isPrice($reduction))) {
            LoggerCPM::getInstance()->error(
                sprintf($this->module->l('Product №%s: invalid price/discount amount'), $id_product)
            );
        } elseif (!Validate::isUnsignedInt($from_quantity)) {
            LoggerCPM::getInstance()->error(sprintf($this->module->l('Product №%s: invalid quantity'), $id_product));
        } elseif ($reduction && !Validate::isReductionType($reduction_type)) {
            LoggerCPM::getInstance()->error(
                sprintf(
                    $this->module->l('Product №%s: please select a discount type (amount or percentage).'),
                    $id_product
                )
            );
        } elseif ($from && $to && (!Validate::isDateFormat($from) || !Validate::isDateFormat($to))) {
            LoggerCPM::getInstance()->error(
                sprintf($this->module->l('Product №%s: the from/to date is invalid.'), $id_product)
            );
        } elseif (SpecificPrice::exists(
            (int)$id_product,
            $id_combination,
            $id_shop,
            $id_group,
            $id_country,
            $id_currency,
            0,
            $from_quantity,
            $from,
            $to,
            false
        )) {
            LoggerCPM::getInstance()->error(
                sprintf($this->module->l('Product №%s: speicifc price already exists.'), $id_product)
            );

            return false;
        } else {
            return true;
        }

        return false;
    }

    public function intValueRequestVar(&$var)
    {
        if (!is_array($var)) {
            return false;
        }
        foreach ($var as &$item) {
            $item = (int)$item;
        }
    }

    public function stringValueRequestVar(&$var)
    {
        if (!is_array($var)) {
            return false;
        }
        foreach ($var as &$item) {
            $item = pSQL($item);
        }
    }

    public function getProductsForRequest()
    {
        $products = Tools::getValue('products');
        $ids_product = array();
        if (is_array($products) && count($products)) {
            foreach ($products as $product) {
                $ids_product[] = (int)$product['id'];
            }
        }

        return $ids_product;
    }

    public function getCombinationsForRequest()
    {
        $combinations = Tools::getValue('combinations');
        $tmp_combinations = array();
        if (is_array($combinations) && count($combinations)) {
            foreach ($combinations as $combination) {
                $combination = explode('_', $combination);
                if (!array_key_exists((int)$combination[0], $tmp_combinations)) {
                    $tmp_combinations[(int)$combination[0]] = array();
                }
                $tmp_combinations[(int)$combination[0]][] = (int)$combination[1];
            }
        }
        $combinations = $tmp_combinations;

        return $combinations;
    }

    public static $disabled = null;

    public function cacheDisabled()
    {
        if (is_null(self::$disabled)) {
            $disabled = Tools::getValue('disabled');
            self::$disabled = (is_array($disabled) && count($disabled) ? $disabled : array());
        }
    }

    public function checkAccessField($field)
    {
        $this->cacheDisabled();

        if (in_array($field, self::$disabled)) {
            return false;
        }

        return true;
    }

    /**
     * @return array
     */
    public function getEnabledFeatures()
    {
        $this->cacheDisabled();

        return self::$disabled['feature'];
    }
}
