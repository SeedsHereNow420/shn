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
    /*
    * module: customnumber
    * date: 2017-12-19 10:31:40
    * version: 1.8.6
    */
    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        self::$definition['fields']['order_reference']['size'] = 32;
        parent::__construct($id, $id_lang, $id_shop);
    }
}
