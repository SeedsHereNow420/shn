<?php
/**
* 2007-2017 PrestaShop
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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class Product extends ProductCore
{
    public static function getPricesDrop(
        $id_lang,
        $page_number = 0,
        $nb_products = 10,
        $count = false,
        $order_by = null,
        $order_way = null,
        $beginning = false,
        $ending = false,
        Context $context = null
    ) {
        if (!$context) {
            $context = Context::getContext();
        }
        if (isset($context->filtered_result) && $context->filtered_result['controller'] == 'pricesdrop') {
            if ($count) {
                return $context->filtered_result['total'];
            }
            return $context->filtered_result['products'];
        } else {
            return parent::getPricesDrop(
                $id_lang,
                $page_number,
                $nb_products,
                $count,
                $order_by,
                $order_way,
                $beginning,
                $ending,
                $context
            );
        }
    }

    public static function getNewProducts(
        $id_lang,
        $page_number = 0,
        $nb_products = 10,
        $count = false,
        $order_by = null,
        $order_way = null,
        Context $context = null
    ) {
        if (!$context) {
            $context = Context::getContext();
        }
        if (isset($context->filtered_result) && $context->filtered_result['controller'] == 'newproducts') {
            if ($count) {
                return $context->filtered_result['total'];
            }
            return $context->filtered_result['products'];
        } else {
            return parent::getNewProducts(
                $id_lang,
                $page_number,
                $nb_products,
                $count,
                $order_by,
                $order_way,
                $context
            );
        }
    }

    /*
    * optimize filtering on search results page
    */
    public static function getProductsProperties($id_lang, $query_result)
    {
        if (!empty(Context::getContext()->properties_not_required)) {
            return $query_result;
        } else {
            return parent::getProductsProperties($id_lang, $query_result);
        }
    }
}
