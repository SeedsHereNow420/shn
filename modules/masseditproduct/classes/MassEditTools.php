<?php
/**
 * 2007-2016 PrestaShop
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
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

class MassEditTools
{
    public static function getTotalFeatures()
    {
        return Db::getInstance()->getValue('SELECT COUNT(f.id_feature) FROM `'._DB_PREFIX_.'feature` f');
    }

    const ACTION_QUANTITY_INCREASE = 1;
    const ACTION_QUANTITY_REDUCE = 2;
    const ACTION_QUANTITY_REWRITE = 3;

    const LIMIT_FEATURES = 30;

    /**
     * @param $id_lang
     * @param bool $with_shop
     * @param $p
     *
     * @return mixed
     */
    public static function getFeatures($id_lang, $with_shop = true, $p = 1)
    {
        return Db::getInstance()->executeS('
        SELECT DISTINCT f.id_feature, f.*, fl.*
        FROM `'._DB_PREFIX_.'feature` f
        '.($with_shop ? Shop::addSqlAssociation('feature', 'f') : '').'
        LEFT JOIN `'._DB_PREFIX_.'feature_lang` fl ON (f.`id_feature` = fl.`id_feature` AND fl.`id_lang` = '.(int)$id_lang.')
        ORDER BY f.`position` ASC LIMIT '.(($p - 1) * self::LIMIT_FEATURES).', '.(int)self::LIMIT_FEATURES);
    }

    public static function setQuantity($id_product, $id_product_attribute, $quantity, $action_quantity, $id_shop = null)
    {
        if (!Validate::isUnsignedId($id_product)) {
            return false;
        }

        $context = Context::getContext();

        // if there is no $id_shop, gets the context one
        if ($id_shop === null && Shop::getContext() != Shop::CONTEXT_GROUP) {
            $id_shop = (int)$context->shop->id;
        }

        $depends_on_stock = StockAvailable::dependsOnStock($id_product);

        //Try to set available quantity if product does not depend on physical stock
        if (!$depends_on_stock) {
            $id_stock_available = (int)StockAvailable::getStockAvailableIdByProductId($id_product, $id_product_attribute, $id_shop);
            if ($id_stock_available) {
                $stock_available = new StockAvailable($id_stock_available);
                if ($action_quantity === self::ACTION_QUANTITY_INCREASE) {
                    $quantity = $stock_available->quantity + (int)$quantity;
                } elseif ($action_quantity === self::ACTION_QUANTITY_REDUCE) {
                    $quantity = $stock_available->quantity - (int)$quantity;
                }

                $stock_available->quantity = (int)$quantity;

                $stock_available->update();
            } else {
                $out_of_stock = StockAvailable::outOfStock($id_product, $id_shop);
                $stock_available = new StockAvailable();
                $stock_available->out_of_stock = (int)$out_of_stock;
                $stock_available->id_product = (int)$id_product;
                $stock_available->id_product_attribute = (int)$id_product_attribute;

                if ($action_quantity === self::ACTION_QUANTITY_INCREASE) {
                    $quantity = $stock_available->quantity + (int)$quantity;
                } elseif ($action_quantity === self::ACTION_QUANTITY_REDUCE) {
                    $quantity = $stock_available->quantity - (int)$quantity;
                }

                $stock_available->quantity = (int)$quantity;

                if ($id_shop === null) {
                    $shop_group = Shop::getContextShopGroup();
                } else {
                    $shop_group = new ShopGroup((int)Shop::getGroupFromShop((int)$id_shop));
                }

                // if quantities are shared between shops of the group
                if ($shop_group->share_stock) {
                    $stock_available->id_shop = 0;
                    $stock_available->id_shop_group = (int)$shop_group->id;
                } else {
                    $stock_available->id_shop = (int)$id_shop;
                    $stock_available->id_shop_group = 0;
                }
                $stock_available->add();
            }
            Hook::exec(
                'actionUpdateQuantity',
                array(
                    'id_product' => $id_product,
                    'id_product_attribute' => $id_product_attribute,
                    'quantity' => $stock_available->quantity
                )
            );
        }
        Cache::clean('StockAvailable::getQuantityAvailableByProduct_'.(int)$id_product.'*');
        return $quantity;
    }

    public static function updatePriceProduct($id_product, $price)
    {
        if (!Shop::isFeatureActive()) {
            Db::getInstance()->update('product', array(
                'price' => ($price < 0 ? 0 : (float)$price)
            ), ' id_product = '.(int)$id_product);
        }
        Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'product_shop` ps
        LEFT JOIN `'._DB_PREFIX_.'product` p ON ps.`id_product` = p.`id_product`
        SET ps.`price` = '.($price < 0 ? 0 : (float)$price).'
        WHERE ps.`id_product` = '.(int)$id_product.'
        '.(Shop::isFeatureActive() && self::getSqlShop() ? ' AND ps.`id_shop` '.self::getSqlShop() : ''));
    }

    public static function updateWholePriceProduct($id_product, $price)
    {
        if (!Shop::isFeatureActive()) {
            Db::getInstance()->update('product', array(
                'wholesale_price' => ($price < 0 ? 0 : (float)$price)
            ), ' id_product = '.(int)$id_product);
        }
        Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'product_shop` ps
        LEFT JOIN `'._DB_PREFIX_.'product` p ON ps.`id_product` = p.`id_product`
        SET ps.`wholesale_price` = '.($price < 0 ? 0 : (float)$price).'
        WHERE ps.`id_product` = '.(int)$id_product.'
        '.(Shop::isFeatureActive() && self::getSqlShop() ? ' AND ps.`id_shop` '.self::getSqlShop() : ''));
    }

    public static function updatePriceCombination($id_product_attribute, $price)
    {
        if (!Shop::isFeatureActive()) {
            Db::getInstance()->update('product_attribute', array(
                'price' => ($price < 0 ? 0 : (float)$price)
            ), ' id_product_attribute = '.(int)$id_product_attribute);
        }
        Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'product_attribute_shop` pas
        LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa ON pas.`id_product_attribute` = pa.`id_product_attribute`
        LEFT JOIN `'._DB_PREFIX_.'product` p ON p.`id_product` = pa.`id_product`
        SET pas.`price` = '.($price < 0 ? 0 : (float)$price).'
        WHERE pas.`id_product_attribute` = '.(int)$id_product_attribute
           .(Shop::isFeatureActive() && self::getSqlShop() ? ' AND pas.`id_shop` '.self::getSqlShop() : ''));
    }

    public static function updateWholePriceCombination($id_product_attribute, $price)
    {
        if (!Shop::isFeatureActive()) {
            Db::getInstance()->update('product_attribute', array(
                'wholesale_price' => ($price < 0 ? 0 : (float)$price)
            ), ' id_product_attribute = '.(int)$id_product_attribute);
        }
        Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'product_attribute_shop` pas
        LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa ON pas.`id_product_attribute` = pa.`id_product_attribute`
        LEFT JOIN `'._DB_PREFIX_.'product` p ON p.`id_product` = pa.`id_product`
        SET pas.`wholesale_price` = '.($price < 0 ? 0 : (float)$price).'
        WHERE pas.`id_product_attribute` = '.(int)$id_product_attribute
           .(Shop::isFeatureActive() && self::getSqlShop() ? ' AND pas.`id_shop` '.self::getSqlShop() : ''));
    }

    public static function getCombinationsByIds($ids_combinations, $id_shop)
    {
        if (!is_array($ids_combinations) || (is_array($ids_combinations) && !count($ids_combinations))) {
            return array();
        }
        $combinations = Db::getInstance()->executeS('SELECT
        pa.`id_product`,
        pa.`id_product_attribute`,
        pa.`wholesale_price`,
        sa.`quantity`,
        pss.`price` as `product_price`,
        pas.`price`,
        (pas.`price` + pss.`price`) as total_price
        FROM '._DB_PREFIX_.'product_attribute pa
        LEFT JOIN '._DB_PREFIX_.'product p ON p.`id_product` = pa.`id_product`
        LEFT JOIN `'._DB_PREFIX_.'product_shop` pss ON (pa.`id_product` = pss.`id_product` AND pss.id_shop = '.pSQL($id_shop).')
        LEFT JOIN '._DB_PREFIX_.'tax_rules_group trg ON trg.`id_tax_rules_group` = pss.`id_tax_rules_group`
        LEFT JOIN '._DB_PREFIX_.'tax t ON t.`id_tax` = pss.`id_tax_rules_group`
        LEFT JOIN '._DB_PREFIX_.'product_attribute_shop pas ON pas.`id_product_attribute` = pa.`id_product_attribute`
        LEFT JOIN '._DB_PREFIX_.'stock_available sa ON sa.`id_product_attribute` = pa.`id_product_attribute` AND sa.`id_shop` = '.pSQL($id_shop).'
        WHERE pa.`id_product_attribute` IN ('.pSQL(implode(',', array_map('intval', $ids_combinations))).') AND pas.`id_shop` = '.pSQL($id_shop).'
        GROUP BY pa.`id_product_attribute`');
        $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
        $address = new Address();
        $address->id_country = $country->id;
        foreach ($combinations as &$combination) {
            if ((int)Configuration::get('PS_TAX')) {
                $tax_manager = TaxManagerFactory::getManager(
                    $address,
                    Product::getIdTaxRulesGroupByIdProduct(
                        (int)$combination['id_product'],
                        Context::getContext()
                    )
                );
                $product_tax_calculator = $tax_manager->getTaxCalculator();
                $combination['product_price_final'] = $product_tax_calculator->addTaxes($combination['product_price']);
                $combination['price_final'] = $product_tax_calculator->addTaxes($combination['price']);
                $combination['total_price_final'] = $product_tax_calculator->addTaxes($combination['price'] + $combination['product_price']);
                $combination['rate'] = $tax_manager->getTaxCalculator()->getTotalRate();
            } else {
                $combination['product_price_final'] = $combination['product_price'];
                $combination['price_final'] = $combination['price'];
                $combination['total_price_final'] = $combination['price'] + $combination['product_price'];
                $combination['rate'] = 0;
            }
        }
        return $combinations;
    }

    const ACTION_PRICE_INCREASE_PERCENT = 1;
    const ACTION_PRICE_INCREASE = 2;
    const ACTION_PRICE_REDUCE_PERCENT = 3;
    const ACTION_PRICE_REDUCE = 4;
    const ACTION_PRICE_REWRITE = 5;

    public static function actionPrice($price, $action_price, $price_value)
    {
        switch ($action_price) {
            case self::ACTION_PRICE_INCREASE_PERCENT:
                $price += ($price * ($price_value / 100));
                break;
            case self::ACTION_PRICE_INCREASE:
                $price += $price_value;
                break;
            case self::ACTION_PRICE_REDUCE_PERCENT:
                $price -= ($price * ($price_value / 100));
                break;
            case self::ACTION_PRICE_REDUCE:
                $price -= $price_value;
                break;
            case self::ACTION_PRICE_REWRITE:
                $price = $price_value;
                break;
        }
        return $price;
    }

    public static function updateObjectField($class_name, $field, $id, $value)
    {
        $definition = ObjectModel::getDefinition($class_name);
        $definition_field = ObjectModel::getDefinition($class_name, $field);
        $ids_shop = Shop::getContextListShopID();
        $multi_shop_active = (int)Configuration::get('PS_MULTISHOP_FEATURE_ACTIVE');

        $lang = (array_key_exists('lang', $definition_field) && $definition_field['lang'] ? true : false);
        $shop = (array_key_exists('shop', $definition_field) && $definition_field['shop'] ? true : false);
        $multi_lang_shop = (array_key_exists('multilang_shop', $definition) && $definition['multilang_shop'] ? true : false);

        if (!$multi_shop_active || ($lang && $multi_lang_shop) || Shop::getContext() == Shop::CONTEXT_ALL) {
            $sql = 'UPDATE '._DB_PREFIX_.$definition['table'].($lang ? '_lang' : '');

            if ($lang && is_array($value)) {
                $languages = Language::getLanguages(false);
                $sql .= ' SET `'.pSQL($field).'` = CASE '.PHP_EOL;
                foreach ($languages as $l) {
                    if (array_key_exists($l['id_lang'], $value)) {
                        $sql .= 'WHEN `id_lang` = '.(int)$l['id_lang'].' THEN "'.ObjectModel::formatValue(
                            $value[$l['id_lang']],
                            $definition_field['type']
                        ).'" '.PHP_EOL;
                    }
                }
                $sql .= 'END ';
            } else {
                $sql .= ' SET `'.pSQL($field).'` = "'.ObjectModel::formatValue($value, $definition_field['type']).'"';
            }

            $sql .= ' WHERE `'.$definition['primary'].'` = '.(int)$id;

            if ($multi_shop_active && $lang && $multi_lang_shop) {
                $sql .= ' AND `id_shop` IN('.(count($ids_shop) ? implode(',', array_map('intval', $ids_shop)) : 'NULL').')';
            }

            Db::getInstance()->execute($sql);
        }

        if (!$lang && $shop) {
            $sql_shop = 'UPDATE '._DB_PREFIX_.$definition['table'].'_shop';
            $sql_shop .= ' SET `'.pSQL($field).'` = "'.ObjectModel::formatValue($value, $definition_field['type']).'"';
            $sql_shop .= ' WHERE `'.$definition['primary'].'` = '.(int)$id;
            if ($multi_shop_active) {
                $sql_shop .= ' AND `id_shop` IN('.(count($ids_shop) ? implode(',', array_map('intval', $ids_shop)) : 'NULL').')';
            }

            Db::getInstance()->execute($sql_shop);
        }
    }

    public static function getFrontFeaturesStatic($id_lang, $id_product)
    {
        if (!Feature::isFeatureActive()) {
            return array();
        }

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
                SELECT name, value, pf.id_feature, pf.id_feature_value
                FROM '._DB_PREFIX_.'feature_product pf
                LEFT JOIN '._DB_PREFIX_.'feature_lang fl ON (fl.id_feature = pf.id_feature AND fl.id_lang = '.(int)$id_lang.')
                LEFT JOIN '._DB_PREFIX_.'feature_value_lang fvl ON (fvl.id_feature_value = pf.id_feature_value AND fvl.id_lang = '.(int)$id_lang.')
                LEFT JOIN '._DB_PREFIX_.'feature f ON (f.id_feature = pf.id_feature AND fl.id_lang = '.(int)$id_lang.')
                '.Shop::addSqlAssociation('feature', 'f').'
                WHERE pf.id_product = '.(int)$id_product.'
                ORDER BY f.position ASC');
    }

    public static function renderMetaTag($meta, $id_product, $id_lang)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }

        $product = new Product($id_product, true, $id_lang);
        $replace = array();

        $category = new Category($product->id_category_default, $id_lang);
        $replace['{category}'] = $category->name;
        $manufacturer = Manufacturer::getNameById((int)$product->id_manufacturer);
        $replace['{manufacturer}'] = $manufacturer;
        $replace['{price}'] = Tools::displayPrice($product->getPrice());
        $replace['{name}'] = $product->name;
        $replace['{title}'] = $product->meta_title;

        preg_match_all('/\{feature\_[0-9]+\_[0-9]+\}/', $meta, $matches);
        $feature_matches = (isset($matches[0]) && is_array($matches[0]) ? $matches[0] : array());
        foreach ($feature_matches as $fm) {
            $replace[$fm] = '';
        }

        $product_features = self::getFrontFeaturesStatic($id_lang, $product->id);

        foreach ($product_features as $product_feature) {
            $feature_match = '{feature_'.(int)$product_feature['id_feature'].'_'.(int)$product_feature['id_feature_value'].'}';
            if (in_array($feature_match, $feature_matches)) {
                $replace[$feature_match] = $product_feature['name'].': '.$product_feature['value'];
            }
        }

        $meta = str_replace(array_keys($replace), array_values($replace), $meta);
        return addslashes($meta);
    }

    public static function buildSQLSearchWhereFromQuery($query, $detailed_search, $field)
    {
        if (!$query || !$field) {
            return '1';
        }

        if ((int)$detailed_search) {
            return $field.' LIKE "%'.pSQL($query).'%"';
        } else {
            $sql_where = array();
            $words = explode(' ', $query);
            foreach ($words as $word) {
                $sql_where[] = $field.' LIKE "%'.pSQL($word).'%"';
            }
            return implode(' AND ', $sql_where);
        }
    }

    public static function removeTmpImageProduct($id_product)
    {
        if (file_exists(_PS_TMP_IMG_DIR_.'product_mini_'.(int)$id_product.'_1.jpg')) {
            unlink(_PS_TMP_IMG_DIR_.'product_mini_'.(int)$id_product.'_1.jpg');
        }
    }

    public static function deleteFeatures($id_product, $ids_feature = array())
    {
        // List products features
        $features = Db::getInstance()->executeS('
        SELECT p.*, f.*
        FROM `'._DB_PREFIX_.'feature_product` as p
        LEFT JOIN `'._DB_PREFIX_.'feature_value` as f ON (f.`id_feature_value` = p.`id_feature_value`)
        WHERE `id_product` = '.(int)$id_product.(count($ids_feature) ?
                ' AND p.`id_feature` IN('.implode(',', array_map('intval', $ids_feature)).')' : ''));
        foreach ($features as $tab) {
            // Delete product custom features
            if ($tab['custom']) {
                Db::getInstance()->execute('
                DELETE FROM `'._DB_PREFIX_.'feature_value`
                WHERE `id_feature_value` = '.(int)$tab['id_feature_value']);
                Db::getInstance()->execute('
                DELETE FROM `'._DB_PREFIX_.'feature_value_lang`
                WHERE `id_feature_value` = '.(int)$tab['id_feature_value']);
            }
        }
        // Delete product features
        $result = Db::getInstance()->execute('
        DELETE FROM `'._DB_PREFIX_.'feature_product`
        WHERE `id_product` = '.(int)$id_product.(count($ids_feature) ?
                ' AND `id_feature` IN('.implode(',', array_map('intval', $ids_feature)).')' : ''));

        SpecificPriceRule::applyAllRules(array((int)$id_product));
        return ($result);
    }

    public static function clearTmpFolder()
    {
        $files = glob(self::getPath().'*.jpg');
        if (is_array($files) && count($files)) {
            foreach ($files as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }
    }

    public static function getPath()
    {
        return _PS_MODULE_DIR_.'masseditproduct/tmp/';
    }

    public static function checkImage($image, $key)
    {
        $image_item = $_FILES[$image]['tmp_name'][$key];
        if (function_exists('exif_imagetype')) {
            $check_image = in_array(exif_imagetype($image_item), array(IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_PNG));
        } elseif (function_exists('finfo_open')) {
            $check_image = false;
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $file_info = finfo_file($finfo, $image_item);
            foreach (array('image/jpeg', 'image/gif', 'image/png') as $type) {
                if (strpos($file_info, $type)) {
                    $check_image = true;
                    break;
                }
            }
        } else {
            $check_image = true;
        }
        if (array_key_exists($image, $_FILES)
            && !empty($_FILES[$image]['tmp_name'][$key])
            && $check_image) {
            return true;
        } else {
            return false;
        }
    }

    public static function attachToProduct($id_product, $array, $remove_old = false)
    {
        if ($remove_old) {
            $result1 = Attachment::deleteProductAttachments($id_product);
        } else {
            $attachments = Attachment::getAttachments(Context::getContext()->language->id, $id_product, true);

            if (is_array($attachments)) {
                foreach ($attachments as $attachment) {
                    $key = array_search($attachment['id_attachment'], $array);
                    if ($key !== false) {
                        unset($array[$key]);
                    }
                }
            }

            $result1 = true;
        }

        if (is_array($array)) {
            $ids = array();
            foreach ($array as $id_attachment) {
                if ((int)$id_attachment > 0) {
                    $ids[] = array('id_product' => (int)$id_product, 'id_attachment' => (int)$id_attachment);
                }
            }

            if (!empty($ids)) {
                $result2 = Db::getInstance()->insert('product_attachment', $ids);
            }
        }

        Product::updateCacheAttachment((int)$id_product);
        if (is_array($array)) {
            return ($result1 && (!isset($result2) || $result2));
        }

        return $result1;
    }

    public static function getImages($image)
    {
        if (!array_key_exists($image, $_FILES) || empty($_FILES[$image]['tmp_name'])) {
            return array();
        }
        return $_FILES[$image]['tmp_name'];
    }

    public static function getSqlShop()
    {
        $context = Context::getContext();
        switch ($context->shop->getContext()) {
            case Shop::CONTEXT_SHOP:
                return ' = '.(int)$context->shop->id;
            case Shop::CONTEXT_GROUP:
                $ids_shop = Shop::getContextListShopID();
                return ' IN('.(count($ids_shop) ? implode(',', $ids_shop) : 'NULL').')';
            case Shop::CONTEXT_ALL:
                return false;
        }
        return false;
    }

    public static function getShopIds()
    {
        return Shop::getContextListShopID();
    }

    private static $options_number_characters = array(4 => '', 7 => '', 10 => '', 13 => '', 16 => '', 19 => '');

    /**
     * @param string "0000-00-00 00:00:00"
     * @param int 10 - 0000-00-00
     *
     * @return string "0000-00-00 00:00:00"
     */
    public static function roundFromDate($date, $number_characters = 10)
    {
        if (key_exists($number_characters, self::$options_number_characters)) {
            $date = mb_strimwidth($date, 0, $number_characters, '', 'UTF-8');
        }
        return pSQL($date);
    }

    /**
     * @param string "0000-00-00 00:00:00"
     * @param int 10 - 0000-00-00
     *
     * @return string "0000-00-00 23:59:59"
     */
    public static function roundToDate($date, $number_characters = 10)
    {
        if (key_exists($number_characters, self::$options_number_characters)) {
            $date = mb_strimwidth($date, 0, $number_characters, '', 'UTF-8');
            $trimmarker = mb_strimwidth('9999-12-31 23:59:59', $number_characters, 15, '', 'UTF-8');
            $date = $date.$trimmarker;
        }
        return pSQL($date);
    }

    public static function checkProductOnChoiceAttributes($id_product, $id_product_attribute, $delete_attribute)
    {
        $attributes = Product::getAttributesParams((int)$id_product, (int)$id_product_attribute);
        $ids_attributes = array();
        foreach ($attributes as $attribute) {
            if ($attribute['id_attribute'] != $delete_attribute) {
                $ids_attributes[] = (int)$attribute['id_attribute'];
            }
        }
        $product = new Product();
        $product->id = $id_product;
        return $product->productAttributeExists($ids_attributes, false, null, true, true);
    }

    public static function checkProductOnChoiceAttributesReverse($id_product, $id_product_attribute, $add_attribute)
    {
        $attribute_obj = new AttributeCore($add_attribute);
        $attributes = Product::getAttributesParams((int)$id_product, (int)$id_product_attribute);
        $ids_attributes = array();
        foreach ($attributes as $attribute) {
            if ($attribute_obj->id_attribute_group == (int)$attribute['id_attribute_group']) {
                return true;
            }
            $ids_attributes[] = (int)$attribute['id_attribute'];
        }
        $ids_attributes[] = $add_attribute;
        $product = new Product();
        $product->id = $id_product;
        return $product->productAttributeExists($ids_attributes, false, null, true);
    }

    public static function getMinimalQuantityForUpdate($id_product, $quantity, $table, $action_quantity)
    {
        if ($action_quantity == 3 && $quantity >= 1) {
            return $quantity;
        }

        $field = ($table == 'product_shop') ? 'id_product' : 'id_product_attribute';

        $quantity_old = Db::getInstance()->getValue(
            'SELECT `minimal_quantity` FROM `'._DB_PREFIX_.$table.'` WHERE '.pSQL($field).' = '.(int)$id_product
        );

        if ($action_quantity == 1) {
            return $quantity_old + $quantity;
        } elseif ($action_quantity == 2 && ($quantity_old - $quantity) >= 1) {
            return $quantity_old - $quantity;
        } else {
            return 1;
        }
    }
}
