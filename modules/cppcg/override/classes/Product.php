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
    public static function priceCalculation($id_shop, $id_product, $id_product_attribute, $id_country, $id_state, $zipcode, $id_currency, $id_group, $quantity, $use_tax, $decimals, $only_reduc, $use_reduc, $with_ecotax, &$specific_price, $use_group_reduction, $id_customer = 0, $use_customer_price = true, $id_cart = 0, $real_quantity = 0, $id_customization = 0)
    {
        static $address = null;
        static $context = null;

        if ($address === null) {
            $address = new Address();
        }

        if ($context == null) {
            $context = Context::getContext()->cloneContext();
        }

        if ($id_shop !== null && $context->shop->id != (int)$id_shop) {
            $context->shop = new Shop((int)$id_shop);
        }

        if (!$use_customer_price) {
            $id_customer = 0;
        }

        if ($id_product_attribute === null) {
            $id_product_attribute = Product::getDefaultAttribute($id_product);
        }

        $cache_id = (int)$id_product.'-'.(int)$id_shop.'-'.(int)$id_currency.'-'.(int)$id_country.'-'.$id_state.'-'.$zipcode.'-'.(int)$id_group.
            '-'.(int)$quantity.'-'.(int)$id_product_attribute.'-'.(int)$id_customization.
            '-'.(int)$with_ecotax.'-'.(int)$id_customer.'-'.(int)$use_group_reduction.'-'.(int)$id_cart.'-'.(int)$real_quantity.
            '-'.($only_reduc?'1':'0').'-'.($use_reduc?'1':'0').'-'.($use_tax?'1':'0').'-'.(int)$decimals;

        // reference parameter is filled before any returns
        $specific_price = SpecificPrice::getSpecificPrice(
            (int)$id_product,
            $id_shop,
            $id_currency,
            $id_country,
            $id_group,
            $quantity,
            $id_product_attribute,
            $id_customer,
            $id_cart,
            $real_quantity
        );

        if (isset(self::$_prices[$cache_id])) {
            return self::$_prices[$cache_id];
        }

        // fetch price & attribute price
        $cache_id_2 = $id_product.'-'.$id_shop;
        if (!isset(self::$_pricesLevel2[$cache_id_2])) {
            $sql = new DbQuery();
            $sql->select('product_shop.`price`, product_shop.`ecotax`');
            $sql->from('product', 'p');
            $sql->innerJoin('product_shop', 'product_shop', '(product_shop.id_product=p.id_product AND product_shop.id_shop = '.(int)$id_shop.')');
            $sql->where('p.`id_product` = '.(int)$id_product);
            if (Combination::isFeatureActive()) {
                $sql->select('IFNULL(product_attribute_shop.id_product_attribute,0) id_product_attribute, product_attribute_shop.`price` AS attribute_price, product_attribute_shop.default_on');
                $sql->leftJoin('product_attribute_shop', 'product_attribute_shop', '(product_attribute_shop.id_product = p.id_product AND product_attribute_shop.id_shop = '.(int)$id_shop.')');
            } else {
                $sql->select('0 as id_product_attribute');
            }

            $res = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

            if (is_array($res) && count($res)) {
                $moduleQuery = 'SELECT * FROM `' . _DB_PREFIX_ . 'product_group_prices` WHERE id_product = '.(int)$id_product.' AND id_shop = '.(int)$id_shop.' AND id_group = '.(int)$id_group.';';
                $getRow = Db::getInstance()->getRow($moduleQuery);
                $modulePrice = $getRow['price'];
                foreach ($res as $row) {
                    if (count($modulePrice) and $modulePrice != 0) {
                        $row['price'] = $modulePrice;
                    }
                    $array_tmp = array(
                        'price' => $row['price'],
                        'ecotax' => $row['ecotax'],
                        'attribute_price' => (isset($row['attribute_price']) ? $row['attribute_price'] : null)
                    );
                    self::$_pricesLevel2[$cache_id_2][(int)$row['id_product_attribute']] = $array_tmp;

                    if (isset($row['default_on']) && $row['default_on'] == 1) {
                        self::$_pricesLevel2[$cache_id_2][0] = $array_tmp;
                    }
                }
            }
        }

        if (!isset(self::$_pricesLevel2[$cache_id_2][(int)$id_product_attribute])) {
            return;
        }

        $result = self::$_pricesLevel2[$cache_id_2][(int)$id_product_attribute];

        if (!$specific_price || $specific_price['price'] < 0) {
            $price = (float)$result['price'];
        } else {
            $price = (float)$specific_price['price'];
        }
        // convert only if the specific price is in the default currency (id_currency = 0)
        if (!$specific_price || !($specific_price['price'] >= 0 && $specific_price['id_currency'])) {
            $price = Tools::convertPrice($price, $id_currency);

            if (isset($specific_price['price']) && $specific_price['price'] >= 0) {
                $specific_price['price'] = $price;
            }
        }

        // Attribute price
        if (is_array($result) && (!$specific_price || !$specific_price['id_product_attribute'] || $specific_price['price'] < 0)) {
            $attribute_price = Tools::convertPrice($result['attribute_price'] !== null ? (float)$result['attribute_price'] : 0, $id_currency);
            // If you want the default combination, please use NULL value instead
            if ($id_product_attribute !== false) {
                $price += $attribute_price;
            }
        }

        // Customization price
        if ((int)$id_customization) {
            $price += Customization::getCustomizationPrice($id_customization);
        }

        // Tax
        $address->id_country = $id_country;
        $address->id_state = $id_state;
        $address->postcode = $zipcode;

        $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int)$id_product, $context));
        $product_tax_calculator = $tax_manager->getTaxCalculator();

        // Add Tax
        if ($use_tax) {
            $price = $product_tax_calculator->addTaxes($price);
        }

        // Eco Tax
        if (($result['ecotax'] || isset($result['attribute_ecotax'])) && $with_ecotax) {
            $ecotax = $result['ecotax'];
            if (isset($result['attribute_ecotax']) && $result['attribute_ecotax'] > 0) {
                $ecotax = $result['attribute_ecotax'];
            }

            if ($id_currency) {
                $ecotax = Tools::convertPrice($ecotax, $id_currency);
            }
            if ($use_tax) {
                static $psEcotaxTaxRulesGroupId = null;
                if ($psEcotaxTaxRulesGroupId === null) {
                    $psEcotaxTaxRulesGroupId = (int) Configuration::get('PS_ECOTAX_TAX_RULES_GROUP_ID');
                }
                // reinit the tax manager for ecotax handling
                $tax_manager = TaxManagerFactory::getManager(
                    $address,
                    $psEcotaxTaxRulesGroupId
                );
                $ecotax_tax_calculator = $tax_manager->getTaxCalculator();
                $price += $ecotax_tax_calculator->addTaxes($ecotax);
            } else {
                $price += $ecotax;
            }
        }

        // Reduction
        $specific_price_reduction = 0;
        if (($only_reduc || $use_reduc) && $specific_price) {
            if ($specific_price['reduction_type'] == 'amount') {
                $reduction_amount = $specific_price['reduction'];

                if (!$specific_price['id_currency']) {
                    $reduction_amount = Tools::convertPrice($reduction_amount, $id_currency);
                }

                $specific_price_reduction = $reduction_amount;

                    // Adjust taxes if required
                if (!$use_tax && $specific_price['reduction_tax']) {
                    $specific_price_reduction = $product_tax_calculator->removeTaxes($specific_price_reduction);
                }
                if ($use_tax && !$specific_price['reduction_tax']) {
                    $specific_price_reduction = $product_tax_calculator->addTaxes($specific_price_reduction);
                }
            } else {
                $specific_price_reduction = $price * $specific_price['reduction'];
            }
        }

        if ($use_reduc) {
            $price -= $specific_price_reduction;
        }

        // Group reduction
        if ($use_group_reduction) {
            $reduction_from_category = GroupReduction::getValueForProduct($id_product, $id_group);
            if ($reduction_from_category !== false) {
                $group_reduction = $price * (float)$reduction_from_category;
            } else { // apply group reduction if there is no group reduction for this category
                $group_reduction = (($reduc = Group::getReductionByIdGroup($id_group)) != 0) ? ($price * $reduc / 100) : 0;
            }

            $price -= $group_reduction;
        }

        if ($only_reduc) {
            return Tools::ps_round($specific_price_reduction, $decimals);
        }

        $price = Tools::ps_round($price, $decimals);

        if ($price < 0) {
            $price = 0;
        }

        self::$_prices[$cache_id] = $price;
        return self::$_prices[$cache_id];
    }
}
