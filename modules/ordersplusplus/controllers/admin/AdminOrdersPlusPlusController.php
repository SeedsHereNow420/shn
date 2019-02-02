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

class AdminOrdersPlusPlusController extends ModuleAdminController
{
    protected $oppLinkObject;
    protected $customerOrder;
    protected $higlightProdQty;
    protected $prodQtyMinLimit;
    protected $createTooltip;
    protected $oppImageType;
    protected $idOrderStateHighlight;
    protected $highlightingColor;
    protected $filterByCategories;
    protected $filterByCustomerGroup;
    protected $filterByProduct;

    public function __construct()
    {
        $this->className  = 'Order';
        $this->table      = 'order';
        $this->list_id    = $this->table;
        $this->identifier = 'id_'.$this->table;

        $this->lang = false;
        $this->explicitSelect = true;

        $this->_select = 'a.id_currency';
        $this->_join   = '';
        $this->_group  = 'GROUP BY a.`id_order`';

        $this->_use_found_rows     = true;
        $this->_pagination         = array(20, 50, 100, 300, 1000);
        $this->_default_pagination = 50;

        $this->_defaultOrderBy  = $this->identifier;
        $this->_defaultOrderWay = 'DESC';

        $this->bootstrap = true;

        $this->addRowAction('view');
        if (Configuration::get('OPP_ENABLE_ORDERS_DELETION')) {
            $this->addRowAction('delete');
        }

        $this->bulk_actions = array(
            'divider' => array(
                'text' => 'divider',
            ),
        );

        $this->deleted = false;

        $this->allow_export = false;
        $this->context = Context::getContext();

        if (Configuration::get('OPP_DISABLE_LEFT_CLICK')) {
            $this->list_no_link = true;
        }

        $this->shopLinkType = 'shop';
        $this->shopShareDatas = Shop::SHARE_ORDER;

        // Local variables to use in queries
        $dbPrefix = _DB_PREFIX_;
        $idLang   = (int)$this->context->language->id;
        $idShop   = (int)$this->context->shop->id;
        $idEmpl   = (int)$this->context->employee->id;

        parent::__construct();

        $this->oppLinkObject = new Link();

        // TODO: find a better way than doing the following
        // HACK: make sure that all the results are returned
        Db::getInstance()->execute("SET SESSION group_concat_max_len=200000;");

        $this->fields_list = array(
            'id_order' => array(
                'title' => $this->l('ID'),
                'class' => 'opp-id-col'
            )
        );

        if (Configuration::get('OPP_SHOW_REFERENCE')) {
            $this->fields_list['reference'] = array(
                'title'          => $this->l('Reference'),
                'class'          => 'opp-reference-col',
                'filter_key'     => 'a!reference',
                'remove_onclick' => true
            );

            if (Configuration::get('OPP_SHOW_MARKETPLACE_REF')) {
                $column = Db::getInstance()->executeS(
                    "SHOW COLUMNS FROM {$dbPrefix}orders LIKE 'mp_order_id'"
                );

                if (count($column) == 1) {
                    $this->_select .= ",\n a.mp_order_id";
                    $this->fields_list['reference']['callback'] = 'getMarketplaceRef';
                }
            }
        }

        if (Configuration::get('OPP_SHOW_NEW_CUSTOMER')) {
            $this->_select .= <<<EOD
,
IF((
    SELECT so.id_order FROM {$dbPrefix}orders AS so
    WHERE so.id_customer = a.id_customer AND so.id_order < a.id_order LIMIT 1
) > 0, 0, 1) AS new
EOD;

            $this->fields_list['new'] = array(
                'title'        => $this->l('New customer'),
                'type'         => 'bool',
                'class'        => 'opp-new-customer-col',
                'callback'     => 'printNewCustomer',
                'havingFilter' => true,
                'orderby'      => false
            );
        }

        /* Instant shipping works with ShippingCountdown module installed */
        // Check if ShippingCountdown module is installed
        $sql = "SHOW TABLES LIKE '{$dbPrefix}shcd_order'";
        if (count(Db::getInstance()->executeS($sql)) == 0) {
            Configuration::updateValue('OPP_SHOW_INSTANT_SHIPPING', 0);
        }

        if (Configuration::get('OPP_SHOW_INSTANT_SHIPPING')) {
            $this->_select .= ",\nIFNULL(shcd_ord.has_instant_shipping, 0) AS has_instant_shipping";
            $this->_join .= "\nLEFT JOIN {$dbPrefix}shcd_order AS shcd_ord ON shcd_ord.id_order = a.id_order";

            $this->fields_list['has_instant_shipping'] = array(
                'title'        => $this->l('Instant shipping'),
                'havingFilter' => true,
                'order_key'    => 'has_instant_shipping',
                'type'         => 'bool',
                'class'        => 'opp-new-customer-col',
                'callback'     => 'printInstantShipping',
            );
        }
        /* ***** End Instant Shipping block ***** */

        if ((Configuration::get('OPP_SHOW_DELIVERY') && Country::isCurrentlyUsed('country', true)) ||
            (Configuration::get('OPP_SHOW_CUSTOMER') &&
                (Configuration::get('OPP_SHOW_DNI') ||
                Configuration::get('OPP_SHOW_VAT_NUMBER') ||
                Configuration::get('OPP_SHOW_DELIVERY_ADDRESS')
                )
            )
            ) {
            $this->_join .= <<<EOD

LEFT JOIN {$dbPrefix}address AS address ON a.id_address_delivery = address.id_address
EOD;

            if (Configuration::get('OPP_SHOW_DELIVERY') && Country::isCurrentlyUsed('country', true)) {
                $join = Shop::addSqlAssociation('orders', 'o');
                $sql = <<<EOD
SELECT DISTINCT c.id_country, cl.name
FROM {$dbPrefix}orders o
{$join}
JOIN {$dbPrefix}address a ON a.id_address = o.id_address_delivery
JOIN {$dbPrefix}country c ON a.id_country = c.id_country
JOIN {$dbPrefix}country_lang cl ON (
    c.id_country = cl.id_country
    AND cl.id_lang = {$idLang})
ORDER BY cl.name ASC
EOD;

                $result = Db::getInstance()->executeS($sql);

                $country_array = array();
                foreach ($result as $row) {
                    $country_array[$row['id_country']] = $row['name'];
                }

                $this->_select .= ",\ncountry_lang.name AS country_name";
                $this->_join .= <<<EOD

LEFT JOIN {$dbPrefix}country AS country ON address.id_country = country.id_country
LEFT JOIN {$dbPrefix}country_lang AS country_lang ON (
    country.id_country = country_lang.id_country AND
    country_lang.id_lang = {$idLang}
)
EOD;

                $this->fields_list['country_name'] = array(
                    'title'       => $this->l('Delivery'),
                    'type'        => 'select',
                    'class'       => 'opp-delivery-col',
                    'list'        => $country_array,
                    'filter_key'  => 'country!id_country',
                    'filter_type' => 'int',
                    'order_key'   => 'country_name'
                );

                if (Configuration::get('OPP_SHOW_SHIPPING_INFORMATIONS')) {
                    $this->_select .= <<<EOD
,
ca.name AS carrier_name,
oc.weight AS shipping_weight,
oc.shipping_cost_tax_incl
EOD;

                    $this->_join .= <<<EOD

LEFT JOIN {$dbPrefix}order_carrier AS oc ON a.id_order = oc.id_order
LEFT JOIN {$dbPrefix}carrier AS ca ON oc.id_carrier = ca.id_carrier
EOD;
                    $this->fields_list['country_name']['callback'] = 'getDelivery';
                }
            }

            if (Configuration::get('OPP_SHOW_CUSTOMER')) {
                $customer = array(
                    "CONCAT(LEFT(c.firstname, 1), '. ', c.lastname)"
                );

                $this->customerOrder = array(
                    'customer'
                );

                if (Configuration::get('OPP_SHOW_COMPANY')) {
                    $customer[] = "IFNULL(c.company, '')";
                    $this->customerOrder[] = 'company';
                }

                if (Configuration::get('OPP_SHOW_DNI')) {
                    $customer[] = 'address.dni';
                    $this->customerOrder[] = 'dni';
                }

                if (Configuration::get('OPP_SHOW_VAT_NUMBER')) {
                    $customer[] = 'address.vat_number';
                    $this->customerOrder[] = 'vat_number';
                }

                // Cannot use pSQL on $customer because it adds backslashes to single quotes
                $this->_select .= ",\n".
                    "CONCAT_WS('\n', " . implode(', ', $customer) . ") AS customer";

                $this->_join .= "\nLEFT JOIN {$dbPrefix}customer AS c ON a.id_customer = c.id_customer";

                $this->fields_list['customer'] = array(
                    'title'        => $this->l('Customer'),
                    'class'        => 'opp-customer-col',
                    'callback'     => 'getCustomer',
                    'havingFilter' => true
                );

                if (Configuration::get('OPP_SHOW_DELIVERY_ADDRESS')) {
                    if (Configuration::get('OPP_SHOW_COMPANY')) {
                        $this->_select .= ",\n".
                            'address.company AS compaddress';
                    }

                    $this->_select .= <<<EOD
,
address.lastname,
address.firstname,
address.address1,
address.address2,
address.postcode,
address.city,
address.phone
EOD;
                }
            }
        }

        if (Configuration::get('OPP_SHOW_PRODUCTS')) {
            $this->higlightProdQty = Configuration::get('OPP_HIGHLIGHT_PRODUCTS_QTYS');
            $this->prodQtyMinLimit = (int)Configuration::get('OPP_PRODUCT_QUANTITY_MIN_LIMIT');
            $this->createTooltip   = Configuration::get('OPP_SHOW_PRODUCTS_IMAGES');

            if ($this->createTooltip) {
                $this->oppImageType = Db::getInstance()->getValue(
                    "SELECT name FROM {$dbPrefix}image_type WHERE id_image_type = ".
                    (int)Configuration::get('OPP_PRODUCTS_IMAGES_TYPE')
                );
            }

            $this->_select .= <<<EOD
,
GROUP_CONCAT(
    detail.product_name,
    detail.product_reference,
    detail.product_ean13
    SEPARATOR '\n'
) AS product_details
EOD;
            $this->_join .= "\n".
                "LEFT JOIN {$dbPrefix}order_detail AS detail ON (a.id_order = detail.id_order)";

            $this->fields_list['product_details'] = array(
                'title'          => $this->l('Products'),
                'class'          => 'opp-products-col',
                'callback'       => 'getProducts',
                'tmpTableFilter' => 'true',
                'orderby'        => false
            );
        }

        if (Configuration::get('OPP_SHOW_BOOKMARK_A') ||
            Configuration::get('OPP_SHOW_BOOKMARK_B') ||
            Configuration::get('OPP_SHOW_NOTES')
        ) {
            $this->_join .= "\n".
                "LEFT JOIN {$dbPrefix}opp_bookmarks AS opp ON (a.id_order = opp.id_order)";

            if (Configuration::get('OPP_SHOW_BOOKMARK_A')) {
                $this->_select .= ",\n".
                    'IFNULL(opp.bookmark_a, 0) AS bookmark_a';

                $this->fields_list['bookmark_a'] = array(
                    'title'          => Configuration::get('OPP_BOOKMARK_A_NAME'),
                    'type'           => 'bool',
                    'class'          => 'opp-bookmark-col',
                    'callback'       => 'getBookmarkA',
                    'havingFilter'   => true,
                    'remove_onclick' => true
                );
            }

            if (Configuration::get('OPP_SHOW_BOOKMARK_B')) {
                $this->_select .= ",\n".
                    'IFNULL(opp.bookmark_b, 0) AS bookmark_b';

                $this->fields_list['bookmark_b'] = array(
                    'title'          => Configuration::get('OPP_BOOKMARK_B_NAME'),
                    'type'           => 'bool',
                    'class'          => 'opp-bookmark-col',
                    'callback'       => 'getBookmarkB',
                    'havingFilter'   => true,
                    'remove_onclick' => true
                );
            }

            if (Configuration::get('OPP_SHOW_NOTES')) {
                $this->fields_list['notes'] = array(
                    'title'          => $this->l('Notes'),
                    'class'          => 'opp-notes-col',
                    'width'          => 160,
                    'filter_key'     => 'opp!notes',
                    'remove_onclick' => true
                );

                if (Configuration::get('OPP_SHOW_NOTES_ONMOUSEOVER')) {
                    $this->fields_list['notes']['callback'] = 'getNotes';
                }
            }
        }

        if (Configuration::get('OPP_SHOW_TAX_ID')) {
            if (strpos($this->_join, $dbPrefix.'address') === false) {
                $this->_join .= "\n" .
                    "LEFT JOIN {$dbPrefix}address AS address ON address.id_address = a.id_address_delivery";
            }

            $this->_select .= <<<EOD
,
CONCAT(address.dni, ' ', address.vat_number) as tax_id,
address.dni,
address.vat_number
EOD;

            $this->fields_list['tax_id'] = array(
                'title'        => $this->l('Tax ID'),
                'width'        => 135,
                'align'        => 'center',
                'callback'     =>'getTaxID',
                'filter_key'   => 'tax_id',
                'havingFilter' => true,
                'orderby'      => false
            );
        }

        if (Configuration::get('OPP_SHOW_ORDER_TOTAL')) {
            $this->_select .= ",\n" . 'IF(a.valid, 1, 0) badge_success';

            $this->fields_list['total_paid_tax_incl'] = array(
                'title'         => $this->l('Total'),
                'type'          => 'price',
                'class'         => 'opp-order-total-col',
                'currency'      => true,
                'filter_key'    => 'a!total_paid_tax_incl',
                'badge_success' => true
            );
        }

        if (Configuration::get('OPP_SHOW_PAYMENT_METHOD')) {
            $this->fields_list['payment'] = array(
                'title' => $this->l('Payment'),
                'class' => 'opp-order-payment-col'
            );
        }

        if (Configuration::get('OPP_SHOW_ORDER_STATUS')) {
            $this->_select .= <<<EOD
,
osl.name AS order_status,
os.color AS order_status_color
EOD;

            $this->_join .= <<<EOD

LEFT JOIN {$dbPrefix}order_state AS os ON a.current_state = os.id_order_state
LEFT JOIN {$dbPrefix}order_state_lang AS osl ON (
    os.id_order_state = osl.id_order_state AND
    osl.id_lang = {$idLang}
)
EOD;

            $this->order_statuses = array();
            $temp = OrderState::getOrderStates((int)$this->context->language->id);
            foreach ($temp as $t) {
                $this->order_statuses[$t['id_order_state']] = $t['name'];
            }

            $this->fields_list['order_status'] = array(
                'title'       => $this->l('Status'),
                'type'        => 'select',
                'class'       => 'opp-order-status-col',
                'color'       => 'order_status_color',
                'list'        => $this->order_statuses,
                'filter_key'  => 'os!id_order_state',
                'filter_type' => 'int',
                'order_key'   => 'order_status'
            );

            if (Configuration::get('OPP_ORDER_STATUS_HIGHLIGHTING')) {
                $this->idOrderStateHighlight = (int)Configuration::get('OPP_ORDER_STATUS_TO_HIGHLIGHT');
                $this->highlightingColor = Configuration::get('OPP_HIGHLIGHTING_COLOR');

                // highlight when the selected state is found in order's history
                /*$this->_select .= <<<EOD
,
IF((
    SELECT oh.id_order FROM {$dbPrefix}order_history AS oh
    WHERE oh.id_order_state = {$this->idOrderStateHighlight}
        AND a.id_order = oh.id_order LIMIT 1
) > 0, 1, 0) AS highlight
EOD;*/

                // highlight when the selected state is the current order's state
                $this->_select .= <<<EOD
,
IF((
    SELECT count(*) FROM {$dbPrefix}orders AS o
    WHERE o.id_order = a.id_order AND
        o.current_state = $this->idOrderStateHighlight
) > 0, 1, 0) AS highlight
EOD;

                $this->fields_list['order_status']['callback'] = 'highlightOrder';
            }
        }

        if (Configuration::get('OPP_SHOW_ORDER_DATE')) {
            $this->fields_list['date_add'] = array(
                'title'      => $this->l('Date'),
                'type'       => 'datetime',
                'class'      => 'opp-order-date-col',
                'filter_key' => 'a!date_add'
            );
        }

        if (Configuration::get('OPP_SHOW_PDF_BUTTONS')) {
            /* This block leds to something like
            *   CONCAT_WS('\n',
            *       [IF (...) | '0'],
            *       IF (...)
            *   ) AS pdf_docs
            */

            $this->_select .= ",\n" . "CONCAT_WS ('\n'," . "\n";

            if (Configuration::get('PS_INVOICE')) {
                $this->_select .= <<<EOD
    IF((
        SELECT oi.id_order FROM {$dbPrefix}order_invoice AS oi
        WHERE a.id_order = oi.id_order
        LIMIT 1
    ) > 0, 1, 0)
EOD;
            } else {
                $this->_select .= '0';
            }

            $this->_select .= <<<EOD
,
    IF((
        SELECT oi.id_order FROM {$dbPrefix}order_invoice AS oi
        WHERE a.id_order = oi.id_order AND oi.delivery_number > 0
        LIMIT 1
    ) > 0, 1, 0)
) AS pdf_docs
EOD;

            $this->_join .= "\n" . "LEFT JOIN {$dbPrefix}order_invoice AS oi ON (a.id_order = oi.id_order)";

            $this->fields_list['pdf_docs'] = array(
                'title'          => $this->l('PDF'),
                'class'          => 'opp-pdf-col',
                'callback'       => 'getPDF',
                'orderby'        => false,
                'search'         => false,
                'remove_onclick' => true
            );
        }

        if (Configuration::get('OPP_SHOW_CATEGORIES_FILTER')) {
            $categories = (int)Db::getInstance()->getValue(
                sprintf(
                    "SELECT COUNT(*) FROM %sopp_category_filter WHERE id_shop = %s AND id_employee = %s",
                    _DB_PREFIX_,
                    (int)$this->context->shop->id,
                    (int)$this->context->employee->id
                )
            );

            if ($categories > 0) {
                $this->filterByCategories = true;

                if (!Configuration::get('OPP_SHOW_PRODUCTS')) {
                    $this->_join .= "\n".
                        "LEFT JOIN {$dbPrefix}order_detail AS detail ON (a.id_order = detail.id_order)";
                }

                $this->_join .= <<<EOD

JOIN {$dbPrefix}product AS p ON (detail.product_id = p.id_product)
LEFT JOIN {$dbPrefix}category_product AS cp ON (cp.id_product = p.id_product)
JOIN {$dbPrefix}opp_category_filter AS opp_cat_filter ON (
    cp.id_category = opp_cat_filter.id_category
    AND opp_cat_filter.id_shop = {$idShop}
    AND opp_cat_filter.id_employee = {$idEmpl}
)
EOD;

                if ($this->getExcludeCategories()) {
                    if ($this->_having === null || trim($this->_having) == '') {
                        $this->_having = '1';
                    }

                    $this->_having .= <<<EOD
 AND (
    SELECT count(distinct cp.id_category) FROM {$dbPrefix}order_detail AS od
    LEFT JOIN {$dbPrefix}category_product AS cp on cp.id_product = od.product_id
    WHERE od.id_order = a.id_order
    AND cp.id_category NOT IN (
        SELECT DISTINCT cf.id_category FROM {$dbPrefix}opp_category_filter AS cf
        WHERE cf.id_shop = {$idShop} AND cf.id_employee = {$idEmpl}
    )
) = 0
EOD;
                }
            } else {
                $this->filterByCategories = false;
            }
        } else {
            $this->filterByCategories = false;
        }

        if (Configuration::get('OPP_SHOW_CUSTOMER_GROUP_FILTER')) {
            $group = Db::getInstance()->getValue(
                sprintf(
                    "SELECT id_customer_group FROM %sopp_customer_group_filter WHERE id_shop = %s AND id_employee = %s",
                    _DB_PREFIX_,
                    (int)$this->context->shop->id,
                    (int)$this->context->employee->id
                )
            );

            if ($group !== false) {
                $this->filterByCustomerGroup = true;

                if (!Configuration::get('OPP_SHOW_CUSTOMER')) {
                    $this->_join .= "\n" .
                        "LEFT JOIN {$dbPrefix}customer AS c ON (c.id_customer = a.id_customer)";
                }

                $this->_where .= 'AND c.id_default_group = ' . (int)$group;
            } else {
                $this->filterByCustomerGroup = false;
            }
        } else {
            $this->filterByCustomerGroup = false;
        }

        if (Configuration::get('OPP_SHOW_PRODUCT_FILTER')) {
            $products = Db::getInstance()->executeS(
                sprintf(
                    "SELECT id_product FROM %sopp_product_filter WHERE id_shop = %s AND id_employee = %s",
                    _DB_PREFIX_,
                    (int)$this->context->shop->id,
                    (int)$this->context->employee->id
                )
            );

            if (!Configuration::get('OPP_SHOW_PRODUCTS') &&
                (!Configuration::get('OPP_SHOW_CATEGORIES_FILTER') || $categories <= 0)
            ) {
                $this->_join .= "\n" .
                    "LEFT JOIN {$dbPrefix}order_detail AS detail ON (a.id_order = detail.id_order)";
            }

            if (is_array($products) && count($products) > 0) {
                $this->filterByProduct = true;
                $products = $this->arrayColumn($products, 'id_product');
                $this->_where .= ' AND detail.product_id IN (' . pSQL(implode(',', $products)) . ')';
            } else {
                $this->filterByProduct = false;
            }
        } else {
            $this->filterByProduct = false;
        }
    }

    public function setMedia()
    {
        parent::setMedia();
        $this->addCSS(dirname(__FILE__).'/../../views/css/common.css');
        $this->addJquery();
        $this->addJqueryPlugin('autocomplete');

        if ((Configuration::get('OPP_SHOW_PRODUCTS') && Configuration::get('OPP_SHOW_PRODUCTS_IMAGES')) ||
            (Configuration::get('OPP_SHOW_NOTES') && Configuration::get('OPP_SHOW_NOTES_ONMOUSEOVER'))
        ) {
            if (version_compare(_PS_VERSION_, '1.6', '<')) {
                $this->addJS(_PS_JS_DIR_.'jquery/ui/jquery.ui.tooltip.min.js');
            } else {
                $this->addJqueryUI('ui.tooltip');
            }
        }

        $this->addJqueryPlugin('jgrowl');

        if (Configuration::get('OPP_SHOW_BOOKMARK_A') || Configuration::get('OPP_SHOW_BOOKMARK_B')) {
            $this->addJS(dirname(__FILE__).'/../../views/js/updateBookmark.js');
        }

        if (Configuration::get('OPP_SHOW_ORDER_DATE')) {
            if (version_compare(_PS_VERSION_, '1.6', '>=')) {
                $this->addJqueryUI('ui.effect');
            }

            $this->addJqueryUI('ui.datepicker');
        }

        $this->addJS(dirname(__FILE__).'/../../views/js/controller.js');
    }

    public function initPageHeaderToolbar()
    {
        parent::initPageHeaderToolbar();

        if (empty($this->display)) {
            $this->page_header_toolbar_btn['configure_view'] = array(
                'target' => '_blank',
                'class'  => 'btn-configure-view',
                'href'   => 'index.php?controller=AdminModules&configure=ordersplusplus&tab_module=administration'.
                    '&module_name=ordersplusplus&token='.Tools::getAdminTokenLite('AdminModules'),
                'desc'   => $this->l('Configure view'),
                'icon'   => 'process-icon-cogs'
            );
            $this->page_header_toolbar_btn['new_order'] = array(
                'target' => '_blank',
                'class'  => 'btn-new-order',
                'href'   => 'index.php?controller=AdminOrders&addorder&token='.Tools::getAdminTokenLite('AdminOrders'),
                'desc'   => $this->l('Add new order'),
                'icon'   => 'process-icon-new'
            );
        }

        if ($this->display == 'add') {
            unset($this->page_header_toolbar_btn['save']);
        }

        if (Context::getContext()->shop->getContext() != Shop::CONTEXT_SHOP &&
            isset($this->page_header_toolbar_btn['new_order']) && Shop::isFeatureActive()
        ) {
            unset($this->page_header_toolbar_btn['new_order']);
        }
    }

    public function addFiltersToBreadcrumbs()
    {
        $filters = parent::addFiltersToBreadcrumbs();

        $customFilters = array();
        if ($this->filterByCategories) {
            $customFilters[] = $this->l('by categories');
        }

        if ($this->filterByCustomerGroup) {
            $customFilters[] = $this->l('by customer group');
        }

        if ($this->filterByProduct) {
            $customFilters[] = $this->l('by product');
        }

        if (count($customFilters) > 0) {
            if (is_null($filters)) {
                return $this->l('filter').' '.implode(', ', $customFilters);
            } else {
                return $filters .= ', '.implode(', ', $customFilters);
            }
        } else {
            return $filters;
        }
    }

    public function renderKpis()
    {
        if (Configuration::get('OPP_SHOW_STATISTICS')) {
            $time = time();
            $kpis = array();

            $helper = new HelperKpi();
            $helper->id       = 'opp-kpi-conversion-rate';
            $helper->icon     = 'icon-sort-by-attributes-alt';
            $helper->color    = 'color1';
            $helper->title    = $this->l('Conversion Rate');
            $helper->subtitle = $this->l('30 days');

            if (ConfigurationKPI::get('CONVERSION_RATE') !== false) {
                $helper->value = ConfigurationKPI::get('CONVERSION_RATE');
            }

            if (ConfigurationKPI::get('CONVERSION_RATE_CHART') !== false) {
                $helper->data = ConfigurationKPI::get('CONVERSION_RATE_CHART');
            }

            $helper->source = $this->context->link->getAdminLink('AdminStats').
                '&ajax=1&action=getKpi&kpi=conversion_rate';

            $helper->refresh = (bool)(ConfigurationKPI::get('CONVERSION_RATE_EXPIRE') < $time);
            $kpis[] = $helper->generate();

            $helper = new HelperKpi();
            $helper->id       = 'opp-kpi-carts';
            $helper->icon     = 'icon-shopping-cart';
            $helper->color    = 'color2';
            $helper->title    = $this->l('Abandoned Carts');
            $helper->subtitle = $this->l('Today');
            $helper->href     = $this->context->link->getAdminLink('AdminCarts').'&action=filterOnlyAbandonedCarts';

            if (ConfigurationKPI::get('ABANDONED_CARTS') !== false) {
                $helper->value = ConfigurationKPI::get('ABANDONED_CARTS');
            }

            $helper->source = $this->context->link->getAdminLink('AdminStats').
                '&ajax=1&action=getKpi&kpi=abandoned_cart';

            $helper->refresh = (bool)(ConfigurationKPI::get('ABANDONED_CARTS_EXPIRE') < $time);
            $kpis[] = $helper->generate();

            $helper = new HelperKpi();
            $helper->id       = 'opp-kpi-average-order';
            $helper->icon     = 'icon-money';
            $helper->color    = 'color3';
            $helper->title    = $this->l('Average Order Value');
            $helper->subtitle = $this->l('30 days');

            if (ConfigurationKPI::get('AVG_ORDER_VALUE') !== false) {
                $helper->value = ConfigurationKPI::get('AVG_ORDER_VALUE').' '.$this->l('tax excl.');
            }

            $helper->source = $this->context->link->getAdminLink('AdminStats').
                '&ajax=1&action=getKpi&kpi=average_order_value';

            $helper->refresh = (bool)(ConfigurationKPI::get('AVG_ORDER_VALUE_EXPIRE') < $time);
            $kpis[] = $helper->generate();

            $helper = new HelperKpi();
            $helper->id       = 'opp-kpi-net-profit-visit';
            $helper->icon     = 'icon-user';
            $helper->color    = 'color4';
            $helper->title    = $this->l('Net Profit per Visit');
            $helper->subtitle = $this->l('30 days');

            if (ConfigurationKPI::get('NETPROFIT_VISIT') !== false) {
                $helper->value = ConfigurationKPI::get('NETPROFIT_VISIT');
            }

            $helper->source = $this->context->link->getAdminLink('AdminStats').
                '&ajax=1&action=getKpi&kpi=netprofit_visit';

            $helper->refresh = (bool)(ConfigurationKPI::get('NETPROFIT_VISIT_EXPIRE') < $time);
            $kpis[] = $helper->generate();

            $helper = new HelperKpiRow();
            $helper->kpis = $kpis;
            return $helper->generate();
        }
    }

    public function renderList()
    {
        $content = '';

        if (Configuration::get('OPP_SHOW_CATEGORIES_FILTER')) {
            $temp = Db::getInstance()->executeS(
                sprintf(
                    "SELECT * FROM %sopp_category_filter WHERE id_shop = %s AND id_employee = %s",
                    _DB_PREFIX_,
                    (int)$this->context->shop->id,
                    (int)$this->context->employee->id
                )
            );

            $selectedCat = array();
            foreach ($temp as $t) {
                $selectedCat[] = (int)$t['id_category'];
            }

            $tree = new HelperTreeCategories('opp-categories-tree', $this->l('Filter by category'));
            $tree->setInputName('opp-categories');
            $tree->setSelectedCategories($selectedCat);
            $tree->setRootCategory(Configuration::get('PS_ROOT_CATEGORY'));
            $tree->setUseSearch(true);
            $tree->setUseCheckBox(true);

            // Add Save button
            $save = new TreeToolbarLink(
                $this->l('Save filter'),
                '#',
                sprintf(
                    "filterByCategories(%s, %s, '%s', '%s', '%s')",
                    $this->context->shop->id,
                    $this->context->employee->id,
                    addslashes($this->l('Category filter saved')),
                    addslashes($this->l('Wait for refresh...')),
                    addslashes($this->l('Error'))
                ),
                'icon-save'
            );
            $save->setId('opp-category-save');
            $tree->addAction($save);

            // Add exclude categories button
            $exclude = new TreeToolbarLink(
                $this->l('Exclude not checked'),
                '#!',
                "excludeCategoriesClick()",
                'icon-check-empty'
            );
            $exclude->setId('opp-category-exclude');
            $tree->addAction($exclude);

            $excludeVal = $this->getExcludeCategories();
            $content .= "<script type=\"text/javascript\">var oppExcludeCategories = {$excludeVal}</script>";

            // Add Reset button
            if ($this->filterByCategories) {
                $reset = new TreeToolbarLink(
                    $this->l('Reset filter'),
                    '#',
                    sprintf(
                        "resetFilter('%s', %s, %s, '%s', '%s', '%s')",
                        'categories',
                        $this->context->shop->id,
                        $this->context->employee->id,
                        addslashes($this->l('Filter resetted')),
                        addslashes($this->l('Wait for refresh...')),
                        addslashes($this->l('Error'))
                    ),
                    'icon-eraser'
                );
                $reset->setId('opp-category-reset');
                $tree->addAction($reset);
            }

            $content .= $tree->render();
        }

        if (Configuration::get('OPP_SHOW_CUSTOMER_GROUP_FILTER')) {
            $helper = new HelperForm();

            $groups = Group::getGroups($this->context->language->id, $this->context->shop->id);

            array_unshift($groups, array('id_group' => 0, 'name' => '-'));

            $helper->fields_value['opp-customer-group'] = (int)Db::getInstance()->getValue(
                sprintf(
                    "SELECT id_customer_group FROM %sopp_customer_group_filter WHERE id_shop = %s AND id_employee = %s",
                    _DB_PREFIX_,
                    (int)$this->context->shop->id,
                    (int)$this->context->employee->id
                )
            );

            $form = array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Filter by customer group'),
                        'icon'  => 'icon-filter'
                    ),
                    'input' => array(
                        array(
                            'type'  => 'select',
                            'label' => $this->l('Customer group'),
                            'name'  => 'opp-customer-group',
                            'options' => array(
                                'query' => $groups,
                                'id'    => 'id_group',
                                'name'  => 'name'
                            )
                        )
                    ),
                    'buttons' => array(
                        array(
                            'js' => sprintf(
                                "filterByCustomerGroup(%s, %s, '%s', '%s', '%s')",
                                $this->context->shop->id,
                                $this->context->employee->id,
                                addslashes($this->l('Customer group filter saved')),
                                addslashes($this->l('Wait for refresh...')),
                                addslashes($this->l('Error'))
                            ),
                            'class' => 'opp-save-filter',
                            'href'  => '#',
                            'title' => $this->l('Save filter'),
                            'icon'  => 'icon-save',
                        )
                    )
                )
            );

            if ($this->filterByCustomerGroup) {
                $form['form']['buttons'][] = array(
                    'js' => sprintf(
                        "resetFilter('%s', %s, %s, '%s', '%s', '%s')",
                        'customer_group',
                        $this->context->shop->id,
                        $this->context->employee->id,
                        addslashes($this->l('Filter resetted')),
                        addslashes($this->l('Wait for refresh...')),
                        addslashes($this->l('Error'))
                    ),
                    'class' => 'opp-reset-filter',
                    'href'  => '#',
                    'title' => $this->l('Reset filter'),
                    'icon'  => 'icon-eraser',
                );
            }

            $content .= $helper->generateForm(array($form));
        }

        if (Configuration::get('OPP_SHOW_PRODUCT_FILTER')) {
            $helper = new HelperForm();

            $tpl = $this->context->smarty->createTemplate(
                dirname(__FILE__).'/../../views/templates/admin/product-search.tpl'
            );

            $products = Db::getInstance()->executeS(sprintf(
                "SELECT id_product, name FROM %sopp_product_filter WHERE id_shop = %s AND id_employee = %s",
                _DB_PREFIX_,
                (int)$this->context->shop->id,
                (int)$this->context->employee->id
            ));

            $tpl->assign(array(
                'product_search_ids'   => implode('-', $this->arrayColumn($products, 'id_product')),
                'product_search_names' => implode('¤', $this->arrayColumn($products, 'name')),
            ));

            $helper->fields_value['opp-product-search'] = $tpl->fetch();

            $form = array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Filter by product(s)'),
                        'icon'  => 'icon-filter'
                    ),
                    'input' => array(
                        array(
                            'type'  => 'free',
                            'label' => $this->l('Product search'),
                            'name'  => 'opp-product-search',
                        )
                    ),
                    'buttons' => array(
                        array(
                            'js' => sprintf(
                                "filterByProduct(%s, %s, '%s', '%s', '%s')",
                                $this->context->shop->id,
                                $this->context->employee->id,
                                addslashes($this->l('Customer group filter saved')),
                                addslashes($this->l('Wait for refresh...')),
                                addslashes($this->l('Error'))
                            ),
                            'class' => 'opp-save-filter',
                            'href'  => '#',
                            'title' => $this->l('Save filter'),
                            'icon'  => 'icon-save',
                        )
                    )
                )
            );

            if ($this->filterByProduct) {
                $form['form']['buttons'][] = array(
                    'js' => sprintf(
                        "resetFilter('%s', %s, %s, '%s', '%s', '%s')",
                        'product',
                        $this->context->shop->id,
                        $this->context->employee->id,
                        addslashes($this->l('Filter resetted')),
                        addslashes($this->l('Wait for refresh...')),
                        addslashes($this->l('Error'))
                    ),
                    'class' => 'opp-reset-filter',
                    'href'  => '#',
                    'title' => $this->l('Reset filter'),
                    'icon'  => 'icon-eraser',
                );
            }

            $content .= $helper->generateForm(array($form));
        }

        /*
        * Change order state form
        */
        if (Configuration::get('OPP_SHOW_BULK_CHANGE_ORDER_STATE')) {
            $helper = new HelperForm();
            $orderStates = OrderState::getOrderStates($this->context->language->id);
            $helper->fields_value['opp-dest-order-state'] = -1;
            $form = array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Bulk change order state'),
                        'icon'  => 'icon-edit'
                    ),
                    'input' => array(
                        array(
                            'type'    => 'select',
                            'label'   => $this->l('Order state'),
                            'name'    => 'opp-dest-order-state',
                            'options' => array(
                                'query' => $orderStates,
                                'id'    => 'id_order_state',
                                'name'  => 'name'
                            )
                        )
                    ),
                    'buttons' => array(
                        array(
                            'js' => sprintf(
                                "changeOrderState(%s, %s, '%s', '%s', '%s')",
                                $this->context->shop->id,
                                $this->context->employee->id,
                                addslashes($this->l('Order state changed')),
                                addslashes($this->l('Wait for refresh...')),
                                addslashes($this->l('Error'))
                            ),
                            'class' => 'opp-save-filter',
                            'href'  => '#',
                            'title' => $this->l('Change order state'),
                            'icon'  => 'icon-save',
                        )
                    )
                )
            );
            $content .= $helper->generateForm(array($form));
        }
        /* End change order state form */

        /*
        * Change carrier and shipping price form
        */
        if (Configuration::get('OPP_SHOW_BULK_CHANGE_CARRIER')) {
            $helper = new HelperForm();
            $carriers = Carrier::getCarriers($this->context->language->id);
            $helper->fields_value['opp-dest-carrier'] = -1;
            $helper->fields_value['opp-dest-shipping-weight'] = '';
            $form = array(
                'form' => array(
                    'legend' => array(
                        'title' => $this->l('Bulk change carrier and shipping weight'),
                        'icon'  => 'icon-edit'
                    ),
                    'input' => array(
                        array(
                            'type'    => 'select',
                            'label'   => $this->l('Carrier'),
                            'name'    => 'opp-dest-carrier',
                            'options' => array(
                                'query' => $carriers,
                                'id'    => 'id_carrier',
                                'name'  => 'name'
                            )
                        ),
                        array(
                            'type' => 'text',
                            'label' => $this->l('Shipping weight'),
                            'name' => 'opp-dest-shipping-weight',
                            'col' => 1,
                        )
                    ),
                    'buttons' => array(
                        array(
                            'js' => sprintf(
                                "changeCarrier(%s, %s, '%s', '%s', '%s')",
                                $this->context->shop->id,
                                $this->context->employee->id,
                                addslashes($this->l('Carrier changed')),
                                addslashes($this->l('Wait for refresh...')),
                                addslashes($this->l('Error'))
                            ),
                            'class' => 'opp-save-filter',
                            'href'  => '#',
                            'title' => $this->l('Apply'),
                            'icon'  => 'icon-save',
                        )
                    )
                )
            );
            $content .= $helper->generateForm(array($form));
        }
        /* End change carrier and shipping price form */

        return $content . parent::renderList();
    }

    public function postProcess()
    {
        if (Tools::isSubmit('addorder')) {
            Tools::redirectAdmin(
                'index.php?controller=AdminOrders&addorder&token='.Tools::getAdminTokenLite('AdminOrders')
            );
        } elseif (Tools::isSubmit('vieworder')) {
            $id_order = Tools::getValue('id_order');

            if (is_numeric($id_order)) {
                $id_order = (int)$id_order;

                if ($id_order > 0) {
                    Tools::redirectAdmin(
                        'index.php?controller=AdminOrders&id_order='.$id_order.'&vieworder&token='.
                        Tools::getAdminTokenLite('AdminOrders')
                    );
                }
            }
        } elseif (Tools::isSubmit('deleteorder') && Configuration::get('OPP_ENABLE_ORDERS_DELETION')) {
            $id_order = Tools::getValue('id_order');

            if (is_numeric($id_order)) {
                $id_order = (int)$id_order;

                if ($id_order > 0) {
                    $this->processDelete();
                }
            }
        } else {
            parent::postProcess();
        }
    }

    public function highlightOrder($id_order, $tr)
    {
        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-order_status.tpl'
        );

        $tpl->assign(array(
            'order_status' => $tr['order_status'],
            'highlight'    => $tr['highlight'],
            'color'        => $this->highlightingColor
        ));

        return $tpl->fetch();
    }

    public function getMarketplaceRef($id_order, $tr)
    {
        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-reference.tpl'
        );

        if (array_key_exists('mp_order_id', $tr)) {
            $tpl->assign(array(
                'marketplace_ref' => $tr['mp_order_id']
            ));
        }

        $tpl->assign(array(
            'reference' => $tr['reference']
        ));

        return $tpl->fetch();
    }

    public function printNewCustomer($id_order, $tr)
    {
        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-new_customer.tpl'
        );

        $tpl->assign(array(
            'new' => $tr['new']
        ));

        return $tpl->fetch();
    }

    public function printInstantShipping($id_order, $tr)
    {
        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-instant_shipping.tpl'
        );

        $tpl->assign(array(
            'instant_shipping' => $tr['has_instant_shipping']
        ));

        return $tpl->fetch();
    }

    public function getDelivery($id_order, $tr)
    {
        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-delivery.tpl'
        );

        $tpl->assign(array(
            'country_name' => $tr['country_name'],
            'carrier_name' => $tr['carrier_name'],
            'weight'       => round($tr['shipping_weight'], 3),
            'ship_price'   => Tools::displayPrice($tr['shipping_cost_tax_incl'], (int)$tr['id_currency'])
        ));

        return $tpl->fetch();
    }

    public function getCustomer($id_order, $tr)
    {
        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-customer.tpl'
        );

        $customer = explode("\n", $tr['customer']);

        if (count($customer) == 0) {
            $tpl->assign(array('customer_name' => $tr['customer']));
        } else {
            for ($i = 0; $i < count($customer); $i++) {
                $tpl->assign(array(
                    $this->customerOrder[$i] => $customer[$i]
                ));
            }
        }

        if (array_key_exists('compaddress', $tr)) {
            $tpl->assign(array(
                'compaddress' => $tr['compaddress']
            ));
        }

        if (array_key_exists('firstname', $tr)) {
            $tpl->assign(array(
                'firstname' => $tr['firstname'],
                'lastname'  => $tr['lastname'],
                'address1'  => $tr['address1'],
                'address2'  => $tr['address2'],
                'postcode'  => $tr['postcode'],
                'city'      => $tr['city'],
                'phone'     => $tr['phone']
            ));
        }

        return $tpl->fetch();
    }

    public function getProducts($id_order, $tr)
    {
        $dbPrefix = _DB_PREFIX_;
        $tr['id_order'] = (int)$tr['id_order'];

        $sql = <<<EOD
SELECT
    product_id,
    product_attribute_id,
    product_quantity,
    product_name,
    product_ean13,
    product_reference,
    total_price_tax_incl,
    unit_price_tax_incl
FROM {$dbPrefix}order_detail WHERE id_order = {$tr['id_order']}
EOD;
        $details = Db::getInstance()->executeS($sql);

        foreach ($details as &$detail) {
            if ($this->higlightProdQty && (int)$detail['product_quantity'] >= $this->prodQtyMinLimit) {
                $detail['highlight'] = true;
            }

            if ($this->createTooltip) {
                if ($detail['product_attribute_id'] == 0) {
                    $imgId = Product::getCover($detail['product_id'], $this->context);
                } else {
                    $imgId = self::getCombinationImageById(
                        $detail['product_attribute_id'],
                        $this->context->language->id
                    );

                    if ($imgId === false) {
                        $imgId = Product::getCover($detail['product_id'], $this->context);
                    }
                }

                if ($imgId === false) {
                    $imgLink = '';
                } else {
                    $imgId   = $imgId['id_image'];
                    $imgLink = _PS_BASE_URL_.__PS_BASE_URI__.'img/p/';
                    $len     = Tools::strlen($imgId);

                    for ($i = 0; $i < $len; $i++) {
                        $imgLink .= $imgId[$i] . '/';
                    }

                    $imgLink .= $imgId.'-'.$this->oppImageType.'.jpg';
                }
                $detail['link'] = $imgLink;
            }
        }
        unset($detail);

        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-products.tpl'
        );

        $tpl->assign(array(
            'details'        => $details,
            'id_currency'    => (int)$tr['id_currency'],
            'create_tooltip' => $this->createTooltip
        ));

        return $tpl->fetch();
    }

    protected static function getCombinationImageById($id_product_attribute, $id_lang)
    {
        $id_product_attribute = (int)$id_product_attribute;
        $id_lang  = (int)$id_lang;
        $dbPrefix = _DB_PREFIX_;

        $sql = <<<EOD
SELECT pai.id_image
FROM {$dbPrefix}product_attribute_image AS pai
LEFT JOIN {$dbPrefix}image_lang AS il ON (il.id_image = pai.id_image)
LEFT JOIN {$dbPrefix}image AS i ON (i.id_image = pai.id_image)
WHERE pai.id_product_attribute = {$id_product_attribute} AND il.id_lang = {$id_lang}
ORDER by i.position
EOD;
        return Db::getInstance()->getRow($sql);
    }

    public function getBookmarkA($id_order, $tr)
    {
        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-bookmark.tpl'
        );

        $tpl->assign(array(
            'id_order'       => $tr['id_order'],
            'bookmark'       => 'a',
            'bookmark_value' => $tr['bookmark_a']
        ));

        return $tpl->fetch();
    }

    public function getBookmarkB($id_order, $tr)
    {
        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-bookmark.tpl'
        );

        $tpl->assign(array(
            'id_order'       => $tr['id_order'],
            'bookmark'       => 'b',
            'bookmark_value' => $tr['bookmark_b']
        ));

        return $tpl->fetch();
    }

    public function getNotes($id_order, $tr)
    {
        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-notes.tpl'
        );

        $tpl->assign(array(
            'id_order' => $tr['id_order'],
            'link'     => $this->oppLinkObject,
            'notes'    => $tr['notes']
        ));

        return $tpl->fetch();
    }

    public function getPDF($id_order, $tr)
    {
        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-pdf.tpl'
        );

        $pdf = explode("\n", $tr['pdf_docs']);

        $tpl->assign(array(
            'id_order' => $tr['id_order'],
            'link'     => $this->oppLinkObject,
            'invoice'  => $pdf[0],
            'delivery' => $pdf[1]
        ));

        return $tpl->fetch();
    }

    public function getTaxID($echo, $tr)
    {
        $tpl = $this->context->smarty->createTemplate(
            dirname(__FILE__).'/../../views/templates/admin/list-tax.tpl'
        );

        $tpl->assign(array(
            'opp_dni'        => mb_convert_case($tr['dni'], MB_CASE_UPPER),
            'opp_vat_number' => mb_convert_case($tr['vat_number'], MB_CASE_UPPER)
        ));

        return $tpl->fetch();
    }

    private function getExcludeCategories()
    {
        $res = Db::getInstance()->getValue(sprintf(
            'SELECT exclude FROM %sopp_exclude_categories WHERE id_shop = %s AND id_employee = %s',
            _DB_PREFIX_,
            $this->context->shop->id,
            $this->context->employee->id
        ));

        if ($res === null || (bool)$res == false) {
            return 0;
        }

        return 1;
    }

    private function arrayColumn($array, $key)
    {
        if (function_exists('array_column')) {
            return array_column($array, $key);
        }

        $out = array();
        foreach ($array as $elem) {
            if (isset($elem[$key])) {
                $out[] = $elem[$key];
            }
        }
        return $out;
    }
}
