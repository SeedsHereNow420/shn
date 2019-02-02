<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 *  @version   1.0.3
 */

class Order extends OrderCore
{

    public static function setLastInvoiceNumber($order_invoice_id, $id_shop)
    {
        if (!$order_invoice_id) {
            return false;
        }

        require_once _PS_MODULE_DIR_ . 'customnumber/helpers/CustomNumberHelper.php';

        if (CustomNumberHelper::setNumber(CustomNumberHelper::INVOICE, $order_invoice_id, $id_shop)) {
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

        if (CustomNumberHelper::setNumber(CustomNumberHelper::DELIVERY, $order_invoice_id, $id_shop)) {
            return true;
        } else {
            return parent::setLastInvoiceNumber($order_invoice_id, $id_shop);
        }
    }
}
