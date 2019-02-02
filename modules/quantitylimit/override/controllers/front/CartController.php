<?php
/**
* NOTICE OF LICENSE
*
* This source file is subject to a commercial license from BSofts.
* Use, copy, modification or distribution of this source file without written
* license agreement from the BSofts is strictly forbidden.
*
* @author    BSofts Inc.
* @copyright Copyright 2017 © BSofts Inc.
* @license   Single domain commerical license
* @package   quantitylimit
*/

class CartController extends CartControllerCore
{
    /**
     * Initialize cart controller
     * @see FrontController::init()
     */
    public function init()
    {
        parent::init();
        header('X-Robots-Tag: noindex, nofollow', true);
        if (Tools::getValue('add') || Tools::getValue('op') == 'up') {
            $this->checkQuantityLimit();
        }
    }

    protected function checkQuantityLimit()
    {
        if (Module::isInstalled('quantitylimit') && Module::isEnabled('quantitylimit')) {
            include_once(_PS_MODULE_DIR_.'quantitylimit/models/Limit.php');
            $group = Group::getCurrent();
            $shop = $this->context->shop;
            if (!$this->id_product_attribute && Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') === true) {
                $this->id_product_attribute = (int)Product::getIdProductAttributesByIdAttributes($this->id_product, Tools::getValue('group', ''));
            }
            if (Limit::isExist($this->id_product, $this->id_product_attribute, true, true, $group->id, $shop->id) && !Tools::getIsset('delete')) {
                $op = (string)Tools::getValue('op', 'up');
                $product_limit = Limit::getProductLimit($this->id_product, $this->id_product_attribute, true, true, $group->id, $shop->id);
                $cart_qty = ($this->context->cart->containsProduct($this->id_product, $this->id_product_attribute))? $this->context->cart->containsProduct($this->id_product, $this->id_product_attribute)['quantity'] : 0;
                $qty_chk = ($op == 'up')? $cart_qty + $this->qty : $cart_qty - $this->qty;
                if (isset($product_limit) && $product_limit) {
                    if (isset($product_limit['min_qty']) && ($product_limit['min_qty'] > 0) && ($product_limit['min_qty'] > $qty_chk)) {
                        $error_message = (Configuration::get('MINIMUM_QUANTITY_LIMIT_MSG', $this->context->cookie->id_lang, $shop->id_shop_group, $shop->id))? array(Configuration::get('MINIMUM_QUANTITY_LIMIT_MSG', $this->context->cookie->id_lang, $shop->id_shop_group, $shop->id)) : array(sprintf(Module::getInstanceByName('quantitylimit')->errors['min_limit_error'], $product_limit['min_qty']));
                        die(json_encode(array(
                            'hasError' => true,
                            'errors' => $error_message,
                            'quantity' => $product_limit['min_qty'],
                            'referer' => 'quantitylimit'
                            )));
                    } elseif (isset($product_limit['max_qty']) && ($product_limit['max_qty'] > 0) && ($qty_chk > $product_limit['max_qty'])) {
                        $error_message = (Configuration::get('MAXIMUM_QUANTITY_LIMIT_MSG', $this->context->cookie->id_lang, $shop->id_shop_group, $shop->id))? array(Configuration::get('MAXIMUM_QUANTITY_LIMIT_MSG', $this->context->cookie->id_lang, $shop->id_shop_group, $shop->id)) : array(sprintf(Module::getInstanceByName('quantitylimit')->errors['max_limit_error'], $product_limit['max_qty']));
                        die(json_encode(array(
                            'hasError' => true,
                            'errors' => $error_message,
                            'quantity' => $product_limit['max_qty'],
                            'referer' => 'quantitylimit'
                            )));
                    }
                }
            }
        }
    }
}
