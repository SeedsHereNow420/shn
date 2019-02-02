<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

class Order extends OrderCore
{

    public static function setLastInvoiceNumber($order_invoice_id, $id_shop)
    {
        if (!$order_invoice_id) {
            return false;
        }

        require_once _PS_MODULE_DIR_ . 'customnumber/helpers/CustomNumberHelper.php';
        
        $object = new OrderInvoice($order_invoice_id);

        if (CustomNumberHelper::setNumber(CustomNumberHelper::INVOICE, $order_invoice_id, $object)) {
            return true;
        } else {
            return parent::setLastInvoiceNumber($order_invoice_id, $id_shop);
        }
    }

    public function setDeliveryNumber($order_invoice_id, $id_shop)
    {
        if (!$order_invoice_id) {
            return false;
        }

        require_once _PS_MODULE_DIR_ . 'customnumber/helpers/CustomNumberHelper.php';
        
        $object = new OrderInvoice($order_invoice_id);

        if (CustomNumberHelper::setNumber(CustomNumberHelper::DELIVERY, $order_invoice_id, $object)) {
            return true;
        } else {
            return parent::setDeliveryNumber($order_invoice_id, $id_shop);
        }
    }

    public function getInvoiceNumber($order_invoice_id)
    {
        // For backward compatibility
        if (!$order_invoice_id) {
            return false;
        }

        return Db::getInstance()->getValue(
            'SELECT `id_order_invoice`
			FROM `' . _DB_PREFIX_ . 'order_invoice`
			WHERE `id_order_invoice` = ' . (int) $order_invoice_id
        );
    }
}
