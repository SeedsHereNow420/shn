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

class TemplateProductsProductMEP extends ObjectModelCPM
{
    /**
     * @var int
     */
    public $id_mep_template_products;

    /**
     * @var int
     */
    public $id_product;

    public static $definition = array(
        'table' => 'mep_template_products_product',
        'primary' => 'id_mep_template_products_product',
        'fields' => array(
            'id_mep_template_products' => array(
                'type' => self::TYPE_INT,
                'validate' => ValidateTypeCPM::IS_INT
            ),
            'id_product' => array(
                'type' => self::TYPE_INT,
                'validate' => ValidateTypeCPM::IS_INT
            )
        )
    );

    public static function getIdShopSql()
    {
        return Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP
            ? (int)Context::getContext()->shop->id : 'p.id_shop_default';
    }

    public static function getAllByTemplateProducts($id_mep_template_products)
    {
        $id_lang = Context::getContext()->language->id;
        $id_shop = self::getIdShopSql();

        $result = Db::getInstance()->executeS(
            'SELECT 
                p.`id_product`,
                p.reference,
                pss.`active`,
                pss.`price`,
                pl.`name`,
                pl.`link_rewrite`,
                sa.`quantity`,
                cl.`name` as category,
                m.`name` as manufacturer,
                s.`name` as supplier,
			    (
			     SELECT i.`id_image` FROM '._DB_PREFIX_.'image i
			     WHERE i.`id_product` = p.`id_product`
			     ORDER BY i.`cover` DESC LIMIT 0,1
			    ) cover
            FROM '._DB_PREFIX_.'mep_template_products_product mtpp
            LEFT JOIN '._DB_PREFIX_.'product p ON p.`id_product` = mtpp.`id_product`
            JOIN `'._DB_PREFIX_.'product_shop` pss
             ON (p.`id_product` = pss.`id_product` AND pss.id_shop = '.pSQL($id_shop).')
            LEFT JOIN '._DB_PREFIX_.'tax_rules_group trg
             ON trg.`id_tax_rules_group` = p.`id_tax_rules_group`
            LEFT JOIN '._DB_PREFIX_.'manufacturer m ON m.`id_manufacturer` = p.`id_manufacturer`
            LEFT JOIN '._DB_PREFIX_.'supplier s ON s.`id_supplier` = p.`id_supplier`
            LEFT JOIN '._DB_PREFIX_.'tax t ON t.`id_tax` = p.`id_tax_rules_group`
            LEFT JOIN '._DB_PREFIX_.'product_lang pl ON p.`id_product` = pl.`id_product`
            AND pl.`id_lang` = '.(int)$id_lang.' AND pl.`id_shop` = '.pSQL($id_shop).'
            LEFT JOIN '._DB_PREFIX_.'category_product cp ON cp.`id_product` = p.`id_product`
            LEFT JOIN '._DB_PREFIX_.'category_lang cl
             ON cl.`id_category` = pss.`id_category_default` AND cl.`id_lang` = '.(int)$id_lang.'
            LEFT JOIN '._DB_PREFIX_.'stock_available sa
             ON (sa.`id_product` = p.`id_product` AND sa.`id_product_attribute` = 0
            '.StockAvailable::addSqlShopRestriction(null, null, 'sa').')
            WHERE mtpp.`id_mep_template_products` = '.(int)$id_mep_template_products.'
            GROUP BY p.`id_product`, cl.`name`'
        );

        if (is_array($result) && count($result)) {
            $country = new Country(Configuration::get('PS_COUNTRY_DEFAULT'));
            $address = new Address();
            $address->id_country = $country->id;
            foreach ($result as &$product) {
                $nothing = null;
                $advanced_stock_management = (bool)Db::getInstance()->getValue('
                    SELECT `advanced_stock_management`
                    FROM '._DB_PREFIX_.'product_shop
                    WHERE id_product='.(int)$product['id_product'].Shop::addSqlRestriction());

                $product['price_final'] = Product::getPriceStatic(
                    $product['id_product'],
                    true,
                    null,
                    (int)Configuration::get('PS_PRICE_DISPLAY_PRECISION'),
                    null,
                    false,
                    true,
                    1,
                    true,
                    null,
                    null,
                    null,
                    $nothing
                );

                $product['advanced_stock_management'] = (
                    (bool)StockAvailable::dependsOnStock(
                        (int)$product['id_product']
                    ) && $advanced_stock_management
                );
                $product['image'] = ImageManager::thumbnail(
                    _PS_PROD_IMG_DIR_.Image::getImgFolderStatic($product['cover']).$product['cover'].'.jpg',
                    'product_mini_'.$product['id_product'].'_'.$product['cover'].'.jpg',
                    45
                );
            }
        }

        return (is_array($result) && count($result) ? $result : array());
    }

    public static function deleteByTemplateProducts($id_mep_template_products)
    {
        return Db::getInstance()->delete(
            'mep_template_products_product',
            'id_mep_template_products = '.(int)$id_mep_template_products
        );
    }
}
