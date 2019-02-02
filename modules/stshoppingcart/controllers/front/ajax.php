<?php
/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

use PrestaShop\PrestaShop\Adapter\Cart\CartPresenter;

class StShoppingcartAjaxModuleFrontController extends ModuleFrontController
{
    public $ssl = true;

    /**
    * @see FrontController::initContent()
    */
    public function initContent()
    {
        $modal = $flying_image = null;

        if (Tools::getValue('action') === 'add-to-cart') {
            if((int)Configuration::get('ST_ADDTOCART_ANIMATION'))
                $flying_image = $this->module->renderFlyImage(
                    $this->context->cart,
                    Tools::getValue('id_product'),
                    Tools::getValue('id_product_attribute')
                );
            else
                $modal = $this->module->renderModal(
                    $this->context->cart,
                    Tools::getValue('id_product'),
                    Tools::getValue('id_product_attribute')
                );
        }
        //
        $cart = (new CartPresenter)->present($this->context->cart);
        ob_end_clean();
        header('Content-Type: application/json');
        die(json_encode([
            'preview' => $this->module->renderProductList(null, ['cart' => $this->context->cart]),
            'modal'   => $modal,
            'flying_image'   => $flying_image,
            'products_count' => $cart['products_count'],
            'total_value' => $cart['totals']['total']['value'],
        ]));
    }
}
