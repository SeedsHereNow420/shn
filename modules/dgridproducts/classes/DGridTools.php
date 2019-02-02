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

class DGridTools
{
    /**
     * Get all attributes for a given language / group
     *
     * @param int $id_lang Language id
     * @param bool $id_attribute_group Attribute group id
     * @return array Attributes
     */
    public static function getAttributes($id_lang, $id_attribute_group)
    {
        if (!Combination::isFeatureActive()) {
            return array();
        }

        return Db::getInstance()->executeS('
            SELECT *
            FROM `'._DB_PREFIX_.'attribute` a
            '.Shop::addSqlAssociation('attribute', 'a').'
            LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al
                ON (a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = '.(int)$id_lang.')
            WHERE a.`id_attribute_group` = '.(int)$id_attribute_group.'
            GROUP BY a.`id_attribute`
            ORDER BY `position` ASC
        ');
    }

    public static function getFieldList()
    {
        return array(
            'id_product' => array(
                //'title' => $this->l('ID'),
                'title' => '',
                'width' => 20,
                'remove_onclick' => true,
            ),
            'image' => array(
                'title' => 'Photo',
                'align' => 'center',
                'image' => 'p',
                'orderby' => false,
                'filter' => false,
                'search' => false,
                'remove_onclick' => true,
            ),
            'name' => array('title' => 'Name',
                'search' => true,
                'filter_key' => 'b!name',
                'type' => 'text',
                'remove_onclick' => true,

                'need_edit' => true,
                'table' => 'product_lang',
                'field' => 'name',
                'lang' => true,
                'validate' => 'string',
                'width' => 150,
                'shop' => true,
            ),
            'short_description' => array(
                'title' => 'Short desc',
                'remove_onclick' => true,
                'type' => 'short_description',
                'need_edit' => false,
                'orderby' => false,
                'search' => false
            ),
            'description' => array(
                'title' => 'Desc',
                'remove_onclick' => true,
                'type' => 'description',
                'need_edit' => false,
                'orderby' => false,
                'search' => false
            ),
            'name_category' => array(
                'title' => 'Cat',
                'type' => 'text',
                'search' => false,
                'filter_key' => 'cl!name',
                'remove_onclick' => true,

                'need_edit' => true,
                'table' => 'category_product',
                'field' => 'id_category',
                'lang' => false,
                'validate' => 'category'
            ),
            'reference' => array(
                'title' => 'Ref',
                'align' => 'left',
                'remove_onclick' => true,

                'need_edit' => true,
                'table' => 'product',
                'field' => 'reference',
                'lang' => false,
                'validate' => 'string',
            ),
            'ean13' => array(
                'title' => 'Ean13',
                'align' => 'left',
                'remove_onclick' => true,

                'need_edit' => true,
                'table' => 'product',
                'field' => 'ean13',
                'lang' => false,
                'validate' => 'ean13',
                'maxlength' => 13
            ),
            'upc' => array(
                'title' => 'Upc',
                'align' => 'left',
                'remove_onclick' => true,

                'need_edit' => true,
                'table' => 'product',
                'field' => 'upc',
                'lang' => false,
                'validate' => 'upc',
            ),
            'wholesale_price' => array(
                'title' => 'Wholesale price',
                'type' => 'price',
                'align' => 'text-right',
                'filter_key' => 'sa!price',
                'remove_onclick' => true,

                'need_edit' => true,
                'table' => (!Shop::isFeatureActive() ? 'product,product_shop' : 'product_shop'),
                'field' => 'wholesale_price',
                'lang' => false,
                'validate' => 'price',
                'shop' => true
            ),
            'price' => array(
                'title' => 'Base price',
                'type' => 'price',
                'align' => 'text-right',
                'filter_key' => 'sa!price',
                'remove_onclick' => true,

                'need_edit' => true,
                'table' => (!Shop::isFeatureActive() ? 'product,product_shop' : 'product_shop'),
                'field' => 'price',
                'lang' => false,
                'validate' => 'price',
                'shop' => true
            ),
            'price_final' => array(
                'title' => 'Final price',
                'type' => 'price',
                'orderby' => false,
                'align' => 'text-right',
                'filter_key' => 'price_final',
                'remove_onclick' => true,

                'need_edit' => true,
                'table' => (!Shop::isFeatureActive() ? 'product,product_shop' : 'product_shop'),
                'field' => 'price_final',
                'lang' => false,
                'validate' => 'price',
                'shop' => true,
                'search' => false
            ),
            'combinations' => array(
                //$this->l('Combinations')
                'title' => '<i class="icon-list"></i>',
                'remove_onclick' => true,
                'type' => 'combinations',
                'need_edit' => false,
                'orderby' => false,
                'search' => false
            ),
            'features' => array(
                'title' => 'Fe-s',
                'remove_onclick' => true,
                'type' => 'features',
                'need_edit' => false,
                'orderby' => false,
                'search' => false
            ),
            'meta_tags' => array(
                'title' => 'Meta',
                'remove_onclick' => true,
                'type' => 'meta_tags',
                'need_edit' => false,
                'orderby' => false,
                'search' => false
            ),
            'specific_price' => array(
                'title' => '%',
                'remove_onclick' => true,
                'type' => 'specific_price',
                'need_edit' => false,
                'orderby' => false,
                'search' => false
            ),
            'additional_setting_product' => array(
                'title' => 'More',
                'remove_onclick' => true,
                'type' => 'additional_setting_product',
                'need_edit' => false,
                'orderby' => false,
                'search' => false
            ),
            'sav_quantity' => array(
                'title' => 'Qty',
                'type' => 'int',
                'align' => 'text-right',
                'filter_key' => 'sav!quantity',
                'orderby' => true,
                'remove_onclick' => true,

                'need_edit' => true,
                'table' => 'stock_available',
                'field' => 'quantity',
                'lang' => false,
                'validate' => 'integer',
                'shop' => true
            ),
            'total_price' => array(
                'title' => 'Total price',
                'need_edit' => false,
                'type' => 'price',
                'remove_onclick' => true,
                'orderby' => false,
                'search' => false
            ),
            'active' => array(
                'title' => '<i class="icon-lightbulb"></i>',
                'active' => 'status',
                //'filter_key' => $alias.'!active',
                'align' => 'text-center',
                'type' => 'bool',
                'class' => 'fixed-width-sm',
                'orderby' => false,
                'remove_onclick' => true,
                'shop' => true
            )
        );
    }

    public static function getVisibleColumnList()
    {
        $config = Tools::jsonDecode(Configuration::get('SEOSA_DGRID_COLUMN'));
        $visible = array();
        foreach (self::getFieldList() as $key => $column) {
            if ((is_object($config) && property_exists($config, $key) && $config->{$key})
                || in_array($key, self::getDefaultColumns())) {
                $visible[$key] = $column;
            }
        }

        return $visible;
    }

    public static function getVisibleColumnForm()
    {
        $visible = array();
        foreach (self::getFieldList() as $key => $column) {
            if (!in_array($key, self::getDefaultColumns())) {
                $visible[$key] = $column;
            }
        }

        return $visible;
    }

    public static function getDefaultColumns()
    {
        return array(
            'id_product',
            'name'
        );
    }

    public static function fixColumnLabel($field_list, $name)
    {
        $bad = array(
            'combinations' => 'Combinations',
            'active' => 'Product activity'
        );

        return key_exists($name, $bad) ? $bad[$name] : $field_list[$name]['title'];
    }

    public static function getHintForField($name)
    {
        $hints = array(
            'image' => 'Show "Image" column',
            'name_category' => 'Show "Category" column',
            'short_description' => 'Show short descrption column',
            'description' => 'Show descrption column',
            'reference' => 'Show "Reference" column',
            'ean13' => 'Show "Ean13" column',
            'upc' => 'Show "Upc" column',
            'wholesale_price' => 'The wholesale price is the price you paid for the product. Do not include the tax.',
            'price' => 'Show "Base price" column',
            'price_final' => 'Show "Final price" column',
            'combinations' => 'Show "Combinations" column',
            'features' => 'Show "Features" column',
            'meta_tags' => 'Show "Meta tags" column',
            'specific_price' => 'Show "Specific price" column',
            'additional_setting_product' => 'Show "Additional setting product" column',
            'sav_quantity' => 'Show "Quantity" column',
            'total_price' => 'Show "Total price" column',
            'active' => 'Show "Product activity" column',
        );
        return $hints[$name];
    }
}
