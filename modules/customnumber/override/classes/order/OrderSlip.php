<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

class OrderSlip extends OrderSlipCore
{

    public $number;

    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        self::$definition['fields']['number'] = array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId');

        parent::__construct($id, $id_lang, $id_shop);
    }

    public function getSlipNumberFormatted($id_lang, $id_shop = null, $type = 'CREDIT_SLIP')
    {
        require_once _PS_MODULE_DIR_ . 'customnumber/helpers/CustomNumberHelper.php';

        return CustomNumberHelper::format($type, $id_lang, $id_shop, $this);
    }
}
