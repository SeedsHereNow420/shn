<?php
/**
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*  @author    Presta-Module
*  @author    202 ecommerce
*  @copyright 2009-2016 Presta-Module
*  @copyright 2017-2018 202 ecommerce
*  @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
*/

class ZendeskCustomersModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        // Authorization
        $this->checkAuthorization();

        // Email
        $email = Tools::getValue('email');

        if (!Validate::isEmail($email)) {
            $this->showError('Email is not valid');
        }

        // Customers
        $customer = new Customer();
        $customer = $customer->getByEmail($email);

        if (!Validate::isLoadedObject($customer)) {
            $this->showError('Customer does not exist');
        }

        $orders = Order::getCustomerOrders((int)$customer->id);
        $orders = array_slice($orders, 0, 20); // Only take the 20 first orders

        foreach ($orders as $k => $order) {
            // Date Add
            $orders[$k]['date_add'] = Tools::displayDate($order['date_add'], null, true);

            // Shop
            $shop = new Shop((int)$order['id_shop']);
            $orders[$k]['shop_name'] = $shop->name;

            // State
            $order_state = new OrderState((int)$order['id_order_state'], Context::getContext()->language->id);
            $orders[$k]['state_name'] = $order_state->name;
            $orders[$k]['state_color'] = $order_state->color;

            // Total
            $orders[$k]['total_paid'] = Tools::convertPriceFull($order['total_paid']);

            // Addresses
            $orders[$k]['address_delivery'] = new Address((int)$order['id_address_delivery']);
            $orders[$k]['address_invoice'] = new Address((int)$order['id_address_invoice']);

            // Carrier
            $carrier = new Carrier((int)$order['id_carrier']);
            $orders[$k]['carrier'] = $carrier->name;

            // Products
            $order_obj = new Order((int)$order['id_order']);
            $orders[$k]['products'] = $order_obj->getProductsDetail();

            /*
            foreach ($orders[$k]['products'] as $p => $product) {
                $product_obj = new Product((int)$product['product_id'], false, Context::getContext()->language->id);
                $attribute_obj = new Attribute((int)$product['product_attribute_id'], Context::getContext()->language->id);
                $attribute_group_obj = new AttributeGroup((int)$attribute_obj->id_attribute_group, Context::getContext()->language->id);
                $orders[$k]['products'][$p]['product_name'] = $product_obj->name;
                $orders[$k]['products'][$p]['attribute_name'] = $attribute_obj->name;
                $orders[$k]['products'][$p]['attribute_group_name'] = $attribute_group_obj->name;
            }
            */
        }

        $json = array(
            'guest' => false,
            'id' => (int)$customer->id,
            'name' => $customer->firstname.' '.$customer->lastname,
            'email' => $customer->email,
            'active' => (bool)$customer->active,
            'admin_url' => Context::getContext()->link->getAdminLink('AdminCustomers', false),
            'created' => $customer->date_add,
            'orders' => $orders,
            'success' => true
        );

        $json['success'] = true;

        die(Tools::jsonEncode($json));
    }

    private function showError($error = '')
    {
        $json = array('success' => false, 'message' => $error);

        die(Tools::jsonEncode($json));
    }

    private function checkAuthorization()
    {
        // Authorization
        $token_string = false;

        if (!$token_string && isset($_SERVER['Authorization'])) {
            $token_string = $_SERVER['Authorization'];
        }

        if (!$token_string && isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $token_string = $_SERVER['HTTP_AUTHORIZATION'];
        }

        if (!$token_string && isset($_SERVER['HTTP_X_TOTAUTH'])) {
            $token_string = $_SERVER['HTTP_X_TOTAUTH'];
        }
        
        if (!$token_string && function_exists('apache_request_headers')) {
            $headers = apache_request_headers();
            if (isset($headers['Authorization'])) {
                $token_string = $headers['Authorization'];
            }
        }

        if (!$token_string || empty($token_string)) {
            $this->showError('Unable to extract authorization header from request');
        }

        $token_string = Tools::stripslashes($token_string);

        $secure_key = null;
        $matches = array();
        if (preg_match('/Token token="([A-Z0-9]+)"/', $token_string, $matches)) {
            $secure_key = $matches[1];
        }

        if (empty($secure_key) || $secure_key !== Configuration::get('ZENDESK_CONNECTOR_KEY')) {
            $this->showError('Secure key is not valid');
        }
    }
}
