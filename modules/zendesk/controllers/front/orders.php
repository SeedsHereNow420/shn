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

class ZendeskOrdersModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        // Authorization
        $this->checkAuthorization();

        // Order ref.
        $order_reference = Tools::getValue('reference', 0);

        if (!Validate::isReference($order_reference)) {
            $this->showError('Order reference is not valid');
        }

        // Order
        $orders = Order::getByReference(pSQL($order_reference));

        if (!$order = $orders->getFirst()) {
            $this->showError('Order does not exist');
        }

        $json = $this->getOrderDetail($order);

        $json['success'] = true;

        die(Tools::jsonEncode($json));
    }

    private function showError($error = '')
    {
        $json = array('success' => false, 'message' => $error);

        die(Tools::jsonEncode($json));
    }

    private function getOrderDetail($order)
    {
        $context = Context::getContext();

        $order_state = new OrderState($order->getCurrentState(), (int)$context->language->id);
        $customer = new Customer((int)$order->id_customer);
        $carrier = new Carrier((int)$order->id_carrier);
        $currency = new Currency((int)$order->id_currency, (int)$context->language->id);

        $order_details = array(
            'id' => (int)$order->id,
            'reference' => $order->reference,
            'state_color' => $order_state->color,
            'status' => $order_state->name,
            'created' => $order->date_add,
            'updated' => $order->date_upd,
            'customer' => array(
                'name' => $customer->firstname.' '.$customer->lastname,
                'email' => $customer->email,
                'guest' => (bool)$customer->is_guest,
            ),
            'carrier' => $carrier->name,
            'total' => Tools::ps_round(Tools::convertPrice($order->total_paid_tax_incl, (int)$order->id_currency, false), 2) . ' ' . $currency->getSign(),
            'products' => $order->getProducts(),
            'admin_url' => Context::getContext()->link->getAdminLink('AdminOrders', false),
            'address_invoice' => new Address((int)$order->id_address_invoice),
            'address_delivery' => new Address((int)$order->id_address_delivery),
        );

        // Shop
        $shop = new Shop((int)$order->id_shop);
        $order_details['shop_name'] = $shop->name;

        // State
        $order_details['state_name'] = $order_state->name;

        return $order_details;
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
