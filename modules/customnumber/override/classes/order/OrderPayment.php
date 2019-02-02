<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

class OrderPayment extends OrderPaymentCore
{

    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        self::$definition['fields']['order_reference']['size'] = 32;

        parent::__construct($id, $id_lang, $id_shop);
    }
}
