<?php
/**
 *  Please read the terms of the CLUF license attached to this module(cf "licences" folder)
 *
 * @author    Línea Gráfica E.C.E. S.L.
 * @copyright Lineagrafica.es - Línea Gráfica E.C.E. S.L. all rights reserved.
 * @license   https://www.lineagrafica.es/licenses/license_en.pdf
 *            https://www.lineagrafica.es/licenses/license_es.pdf
 *            https://www.lineagrafica.es/licenses/license_fr.pdf
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class LGDetailedorder extends Module
{
    protected $config_form = false;
    public $bootstrap;

    public function __construct()
    {
        $this->name = 'lgdetailedorder';
        $this->tab = 'quick_bulk_update';
        $this->version = '1.1.12';
        $this->author = 'Línea Gráfica';
        $this->need_instance = 0;
        $this->module_key = 'd779e8fd353b896f74905a93cf9bfeca';

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        if (substr_count(_PS_VERSION_, '1.6') > 0) {
            $this->bootstrap = true;
        } else {
            $this->bootstrap = false;
        }

        parent::__construct();

        $this->displayName = $this->l('Fast Access to the Order Details');
        $this->description =
        $this->l('Access easily to the details of orders. Go to your Orders page and use the green icon.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall this module?');

        if (version_compare(_PS_VERSION_, '1.6.0', '<')) {
            $ajax = (bool)Tools::getValue('ajax');
            $controller = Tools::getValue('controller');
            $configure = Tools::getValue('configure');
            $module_name = Tools::getValue('module_name');
            $action = Tools::getValue('action');

            if ($ajax &&
                $controller == 'AdminModules' &&
                $configure == 'lgdetailedorder' &&
                $module_name == 'lgdetailedorder' &&
                $action == 'getOrderDetails'
            ) {
                $this->ajaxProcessGetOrderDetails();
            }
        }
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        return parent::install()
        && $this->registerHook('backOfficeHeader');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookBackOfficeHeader()
    {
        if ($this->context->controller instanceof AdminOrdersController && (!Tools::getValue('id_order'))) {
            $this->context->controller->addJQuery();

            if (version_compare(_PS_VERSION_, '1.6.0', '>')) {
                $this->context->controller->addCSS($this->_path.'views/css/admin16.css');
                $this->context->controller->addJS(
                    _PS_MODULE_DIR_.$this->name
                    .DIRECTORY_SEPARATOR.'views'
                    .DIRECTORY_SEPARATOR.'js'
                    .DIRECTORY_SEPARATOR.'lgdetailedorder.js'
                );
            } else {
                $this->context->controller->addCSS($this->_path.'views/css/admin15.css');
                $this->context->controller->addJS(
                    $this->context->shop->getBaseURI().'modules/' . $this->name . '/views/js/lgdetailedorder.js'
                );
            }

            $this->context->smarty->assign(
                array(
                    'lgdetailedorder_token' => Tools::getAdminTokenLite('AdminModules'),
                )
            );
            return $this->context->smarty->fetch(
                _PS_MODULE_DIR_.$this->name
                .DIRECTORY_SEPARATOR.'views'
                .DIRECTORY_SEPARATOR.'templates'
                .DIRECTORY_SEPARATOR.'admin'
                .DIRECTORY_SEPARATOR.'hooks'
                .DIRECTORY_SEPARATOR.'backofficeHeader.tpl'
            );
        }
    }

//    /**
//     * For retrocompatibility with 1.5
//     */
//    public function getContent()
//    {
//        if (version_compare(_PS_VERSION_, '1.6.0', '<')) {
//            $ajax = (bool)Tools::getValue('ajax');
//            $controller = Tools::getValue('controller');
//            $configure = Tools::getValue('configure');
//            $module_name = Tools::getValue('module_name');
//            $action = Tools::getValue('action');
//
//            if ($ajax &&
//                $controller == 'AdminModules' &&
//                $configure == 'lgdetailedorder' &&
//                $module_name == 'lgdetailedorder' &&
//                $action == 'getOrderDetails'
//            ) {
//                $this->ajaxProcessGetOrderDetails();
//            }
//        }
//    }

    public function ajaxProcessGetOrderDetails()
    {
        if (Tools::getValue('id_order')) {
            $id_order = Tools::getValue('id_order');

            /** order */
            $order = Db::getInstance()->getRow(
                'SELECT * FROM '._DB_PREFIX_.'orders WHERE id_order = '.(int)$id_order
            );

            /** order_state */
            $order_state = Db::getInstance()->getValue(
                'SELECT osl.name '.
                'FROM '._DB_PREFIX_.'orders o '.
                'LEFT JOIN '._DB_PREFIX_.'order_state_lang osl ON o.current_state = osl.id_order_state '.
                'WHERE o.id_order = '.(int)$id_order.
                '  AND osl.id_lang = '.(int)$this->context->language->id
            );

            /** products */
            $products = Db::getInstance()->ExecuteS(
                'SELECT * '.
                'FROM '._DB_PREFIX_.'order_detail '.
                'WHERE id_order = '.(int)$id_order
            );

            /** id cart */
            $id_cart = Db::getInstance()->getValue(
                'SELECT id_cart '.
                'FROM '._DB_PREFIX_.'orders '.
                'WHERE id_order = '.(int)$id_order
            );

            /** customization */
            $custom = Db::getInstance()->ExecuteS(
                'SELECT * '.
                'FROM '._DB_PREFIX_.'customized_data cd '.
                'LEFT JOIN '._DB_PREFIX_.'customization cu ON cd.id_customization = cu.id_customization '.
                'WHERE cu.id_cart = '.(int)$id_cart.
                '  AND cd.type = 1'
            );

            /** currency */
            $currObj = new Currency((int)$order['id_currency']);
            $currency = $currObj->getSign();

            /** carrier */
            $carrier = Db::getInstance()->getRow(
                'SELECT c.name, cl.delay '.
                'FROM '._DB_PREFIX_.'carrier c '.
                'LEFT JOIN '._DB_PREFIX_.'carrier_lang cl ON c.id_carrier = cl.id_carrier '.
                'WHERE c.id_carrier = '.(int)$order['id_carrier'].
                '  AND cl.id_lang = '.(int)$this->context->language->id.
                '  AND cl.id_shop = '.(int)$this->context->shop->id
            );

            /** shipping_address */
            $shipping_address = Db::getInstance()->getRow(
                'SELECT * '.
                'FROM '._DB_PREFIX_.'address '.
                'WHERE id_address = '.(int)$order['id_address_delivery']
            );

            /** shipping state */
            $shipping_state = Db::getInstance()->getValue(
                'SELECT name '.
                'FROM '._DB_PREFIX_.'state '.
                'WHERE id_state = '.(int)$shipping_address['id_state']
            );

            /** shipping country */
            $shipping_country = Db::getInstance()->getValue(
                'SELECT name '.
                'FROM '._DB_PREFIX_.'country_lang '.
                'WHERE id_country = '.(int)$shipping_address['id_country'].
                '  AND id_lang = '.(int)$this->context->language->id
            );

            /** billing_address */
            $billing_address = Db::getInstance()->getRow(
                'SELECT * '.
                'FROM '._DB_PREFIX_.'address '.
                'WHERE id_address = '.(int)$order['id_address_invoice']
            );

            /** billing_address state */
            $billing_state = Db::getInstance()->getValue(
                'SELECT name '.
                'FROM '._DB_PREFIX_.'state '.
                'WHERE id_state = '.(int)$billing_address['id_state']
            );

            /** billing country */
            $billing_country = Db::getInstance()->getValue(
                'SELECT name '.
                'FROM '._DB_PREFIX_.'country_lang '.
                'WHERE id_country = '.(int)$billing_address['id_country'].
                '  AND id_lang = '.(int)$this->context->language->id
            );

            /** customer message */
            $customer_thread = Db::getInstance()->getValue(
                'SELECT id_customer_thread '.
                'FROM '._DB_PREFIX_.'customer_thread '.
                'WHERE id_order = '.(int)$id_order
            );

            $customer_message = Db::getInstance()->getValue(
                'SELECT message '.
                'FROM '._DB_PREFIX_.'customer_message '.
                'WHERE id_customer_thread = '.(int)$customer_thread
            );

            /** customer info */
            $customer = Db::getInstance()->getRow(
                'SELECT * '.
                'FROM '._DB_PREFIX_.'customer '.
                'WHERE id_customer = '.(int)$order['id_customer']
            );

            /** id employee */
            $id_employee = Db::getInstance()->getValue(
                'SELECT id_employee '.
                'FROM '._DB_PREFIX_.'order_history oh '.
                'LEFT JOIN '._DB_PREFIX_.'order_state os ON oh.id_order_state = os.id_order_state '.
                'WHERE oh.id_order = '.(int)$id_order.
                ' AND os.logable = 1'
            );

            /** name employee */
            $name_employee = Db::getInstance()->getRow(
                'SELECT * '.
                'FROM '._DB_PREFIX_.'employee '.
                'WHERE id_employee = '.(int)$id_employee
            );

            $name1_employee = $name_employee['firstname'];
            $name2_employee = Tools::substr($name_employee['lastname'], 0, 1);

            /** gift option */
            $gift_price = Configuration::get('PS_GIFT_WRAPPING_PRICE');
            $gift_tax = Configuration::get('PS_GIFT_WRAPPING_TAX_RULES_GROUP');
            if ($gift_tax > 0) {
                $gift_tax2 = Db::getInstance()->getValue(
                    'SELECT t.rate '.
                    'FROM '._DB_PREFIX_.'tax t '.
                    'LEFT JOIN '._DB_PREFIX_.'tax_rule tr ON t.id_tax = tr.id_tax'.
                    ' WHERE tr.id_country = '.(int)$shipping_address['id_country'].
                    ' AND tr.id_tax_rules_group = '.(int)$gift_tax
                );
                $gift_cost = $gift_price + ($gift_price*$gift_tax2/100);
            } else {
                $gift_cost = $gift_price;
            }

            /** obtain the thumbnail url for each product */
            foreach ($products as &$product) {
                $product['thumbnail'] =
                    $this->getProductThumbnail($product['product_id'], $product['product_attribute_id']);
                $product['unit_price_tax_incl_cur'] = Tools::displayPrice(
                    $product['unit_price_tax_incl'],
                    (int)$order['id_currency']
                );
                $product['total_price_tax_incl_cur'] = Tools::displayPrice(
                    $product['total_price_tax_incl'],
                    (int)$order['id_currency']
                );
            }

            /** info screen */
            $datos = array(
                'id_order'         => $id_order,
                'reference'        => $order['reference'],
                'id_shop'          => $order['id_shop'],
                'date_add'         => $order['date_add'],
                'payment'          => $order['payment'],
                'discount'         => $order['total_discounts'],
                'discount_cur'     => Tools::displayPrice($order['total_discounts'], (int)$order['id_currency']),
                'shipping'         => $order['total_shipping'],
                'shipping_cur'     => Tools::displayPrice($order['total_shipping'], (int)$order['id_currency']),
                'total'            => $order['total_paid'],
                'total_cur'        => Tools::displayPrice($order['total_paid'], (int)$order['id_currency']),
                'gift'             => $order['gift'],
                'gift_message'     => $order['gift_message'],
                'recyclable'       => $order['recyclable'],
                'shipping_number'  => $order['shipping_number'],
                'gift_cost'        => $gift_cost,
                'gift_cost_cur'    => Tools::displayPrice($gift_cost, (int)$order['id_currency']),
                'order_state'      => $order_state,
                'products'         => $products,
                'custom'           => $custom,
                'carrier'          => $carrier,
                'shipping_address' => $shipping_address,
                'shipping_state'   => $shipping_state,
                'shipping_country' => $shipping_country,
                'billing_address'  => $billing_address,
                'billing_state'    => $billing_state,
                'billing_country'  => $billing_country,
                'customer'         => $customer,
                'random'           => date('dmYHis'),
                'currency'         => $currency,
                'customer_message' => $customer_message,
                'id_employee'      => $id_employee,
                'name1_employee'   => $name1_employee,
                'name2_employee'   => $name2_employee,
                'currency_id'      => $currObj->id,
            );

            $this->context->smarty->assign(
                array(
                    'datos' => $datos,
                )
            );
            $this->context->controller->addJS(
                $this->_path.'views'
                .DIRECTORY_SEPARATOR.'js'
                .DIRECTORY_SEPARATOR.'lgdetailedorder.js'
            );

            $response = array();
            $response['html'] = $this->context->smarty->fetch(
                _PS_MODULE_DIR_.$this->name
                .DIRECTORY_SEPARATOR.'views'
                .DIRECTORY_SEPARATOR.'templates'
                .DIRECTORY_SEPARATOR.'admin'
                .DIRECTORY_SEPARATOR.'hooks'
                .DIRECTORY_SEPARATOR.'orderDetails.tpl'
            );
            die(Tools::jsonEncode($response));
        }
    }

    /**
     * Gets the correct temporal thumbnail for a specific product combination.
     *
     * @param $id_product
     * @param $id_product_attribute
     * @return bool|string
     */
    protected function getProductThumbnail($id_product, $id_product_attribute)
    {
        $name = 'product_mini_' . (int)$id_product .
            (($id_product_attribute) ? '_' . (int)$id_product_attribute : '') . '.jpg';

        if (file_exists(_PS_TMP_IMG_DIR_.$name)) {
            return '../img/tmp/' . $name;
        } else {
            $id_lang = $this->context->language->id;
            $id_shop = $this->context->shop->id;
            $product_image = $this->getBestProductImage($id_lang, $id_shop, $id_product, $id_product_attribute);

            if (isset($product_image['id_image'])) {
                $image = new Image($product_image['id_image']);

                // generate temporal thumbnail
                ImageManager::thumbnail(
                    _PS_IMG_DIR_ . 'p/' . $image->getExistingImgPath() . '.jpg',
                    $name,
                    45,
                    'jpg'
                );

                if (file_exists(_PS_TMP_IMG_DIR_ . $name)) {
                    return '../img/tmp/' . $name;
                }
            }
        }
        return false;
    }


    protected function getBestProductImage($id_lang, $id_shop, $id_product, $id_product_attribute)
    {
        $product_image = array();

        if (version_compare(_PS_VERSION_, '1.6.1', '>=')) {
            $product_image = Image::getBestImageAttribute(
                $id_shop,
                $id_lang,
                (int)$id_product,
                (int)$id_product_attribute
            );
        } else {
            $product_images = Image::getImages(
                $id_lang,
                (int)$id_product,
                (int)$id_product_attribute
            );

            if ($product_images) {
                $product_image = $product_images[0];
            }
        }
        return $product_image;
    }
}
