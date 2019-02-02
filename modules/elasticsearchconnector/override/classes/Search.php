<?php
/**
* 2017 PrestaWach
*
* @author    PrestaWach <info@prestawach.info>
* @copyright 2017 PrestaWach
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

class Search extends SearchCore
{
    public static function find(
        $id_lang,
        $expr,
        $page_number = 1,
        $page_size = 1,
        $order_by = 'position',
        $order_way = 'desc',
        $ajax = false,
        $use_cookie = true,
        Context $context = null
    ) {
        // start use default PS search engine while elasticsearch indexation in progress
        if (Configuration::get('PS_ELASTICSEARCH_INDEXATION_STOP') == 1
            && Configuration::get('PS_ELASTICSEARCH_INDEXATION_WORKING') == 1
        ) {
            return parent::find(
                $id_lang,
                $expr,
                $page_number,
                $page_size,
                $order_by,
                $order_way,
                $ajax,
                $use_cookie,
                $context
            );
        }
        // end use default PS search engine while elasticsearch indexation in progress

        if (!$context) {
            $context = Context::getContext();
        }
        $db = Db::getInstance(_PS_USE_SQL_SLAVE_);

        $elasticsearchconnector_module = Module::getInstanceByName('elasticsearchconnector');
        $result = $elasticsearchconnector_module->find(
            $id_lang,
            $expr,
            $page_number,
            $page_size,
            $order_by,
            $order_way,
            $ajax,
            $use_cookie,
            $context
        );

        if (empty($result) || (isset($result['hits']['total']) && $result['hits']['total'] == 0)) {
            return ($ajax ? array() : array(
                'total' => 0,
                'result' => array()
            ));
        }

        $product_pool_arr = array();
        foreach ($result['hits']['hits'] as $matches_arr) {
            $product_pool_arr[] = $matches_arr['_id'];
        }
        $product_pool_str = implode(',', $product_pool_arr);
        $product_pool = (
            (strpos($product_pool_str, ',') === false) ?
            (' = '.(int)$product_pool_str.' ') :
            (' IN ('.rtrim($product_pool_str, ',').') ')
        );

        if ($ajax) {
            $sql = 'SELECT DISTINCT p.id_product, pl.name pname, cl.name cname,
                cl.link_rewrite crewrite, pl.link_rewrite prewrite, 0 AS position
                FROM '._DB_PREFIX_.'product p
                INNER JOIN `'._DB_PREFIX_.'product_lang` pl ON (
                p.`id_product` = pl.`id_product`
                AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
                )
                '.Shop::addSqlAssociation('product', 'p').'
                INNER JOIN `'._DB_PREFIX_.'category_lang` cl ON (
                product_shop.`id_category_default` = cl.`id_category`
                AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').'
                )
                WHERE p.`id_product` '.$product_pool.'
                ORDER BY FIELD(p.`id_product`,'.$product_pool_str.') LIMIT 10';
            return $db->executeS($sql);
        }

        if (strpos($order_by, '.') > 0) {
            $order_by = explode('.', $order_by);
            $order_by = pSQL($order_by[0]).'.`'.pSQL($order_by[1]).'`';
        }
        $alias = '';
        if ($order_by == 'price') {
            $alias = 'product_shop.';
        } elseif (in_array($order_by, array('date_upd', 'date_add'))) {
            $alias = 'p.';
        }

        if ($order_by == 'position') {
            $order_by = 'FIELD(p.`id_product`,'.$product_pool_str.')';
            $order_way = '';
        }

        $sql = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity,
            pl.`description_short`, pl.`available_now`, pl.`available_later`, pl.`link_rewrite`, pl.`name`,
             MAX(image_shop.`id_image`) id_image, il.`legend`, m.`name` manufacturer_name ,
            0 AS position '.(
                Combination::isFeatureActive() ? ',
                MAX(product_attribute_shop.`id_product_attribute`) id_product_attribute' :
                ''
            ).',
            DATEDIFF(
                p.`date_add`,
                DATE_SUB(
                    NOW(),
                    INTERVAL '.(
                        Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ?
                        Configuration::get('PS_NB_DAYS_NEW_PRODUCT') :
                        20
                    ).' DAY
                )
            ) > 0 new'.(
                Combination::isFeatureActive() ?
                ', MAX(product_attribute_shop.minimal_quantity) AS product_attribute_minimal_quantity' :
                ''
            ).'
            FROM '._DB_PREFIX_.'product p
            '.Shop::addSqlAssociation('product', 'p').'
            INNER JOIN `'._DB_PREFIX_.'product_lang` pl ON (
                p.`id_product` = pl.`id_product`
                AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
            )
            '.(
                Combination::isFeatureActive() ?
                'LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa    ON (p.`id_product` = pa.`id_product`)
                '.Shop::addSqlAssociation('product_attribute', 'pa', false, 'product_attribute_shop.`default_on` = 1').'
                '.Product::sqlStock('p', 'product_attribute_shop', false, $context->shop) :
                Product::sqlStock('p', 'product', false, Context::getContext()->shop)
            ).'
            LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON m.`id_manufacturer` = p.`id_manufacturer`
            LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product`)'.
                Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'
            LEFT JOIN `'._DB_PREFIX_.'image_lang` il
                ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
            WHERE p.`id_product` '.$product_pool.'
            GROUP BY product_shop.id_product
            '.($order_by ? 'ORDER BY  '.$alias.$order_by : '').($order_way ? ' '.$order_way : '').'
            LIMIT '.(($page_number - 1) * $page_size).','.(int)$page_size;
        $result = $db->executeS($sql);

        $sql = 'SELECT COUNT(*)
            FROM '._DB_PREFIX_.'product p
            '.Shop::addSqlAssociation('product', 'p').'
            INNER JOIN `'._DB_PREFIX_.'product_lang` pl ON (
                p.`id_product` = pl.`id_product`
                AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
            )
            LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON m.`id_manufacturer` = p.`id_manufacturer`
            WHERE p.`id_product` '.$product_pool;
        $total = $db->getValue($sql);

        if (!$result) {
            $result_properties = false;
        } else {
            $result_properties = Product::getProductsProperties((int)$id_lang, $result);
        }

        return array('total' => $total,'result' => $result_properties);
    }

    public static function indexation($full = false, $id_product = false)
    {
        $elasticsearch_module = Module::getInstanceByName('elasticsearchconnector');

        if ($id_product) {
            $full = false;
        }

        if ($full == true) {
            if ($elasticsearch_module->regenerateIndex()) {
                $sql = 'UPDATE `'._DB_PREFIX_.'product`
                        SET `indexed` = 1';
                Db::getInstance()->execute($sql);

                return true;
            } else {
                return false;
            }
        } elseif ($full == false && $id_product == false) {
            $sql = 'SELECT p.`id_product`
                FROM `'._DB_PREFIX_.'product` p
                LEFT JOIN `'._DB_PREFIX_.'product_shop` ps ON p.`id_product` = ps.`id_product`
                WHERE p.`indexed` = 0
                OR ps.`indexed` = 0
                GROUP BY p.`id_product`';
            $products = Db::getInstance()->executeS($sql);
            foreach ($products as $product) {
                $return = true;

                if ($elasticsearch_module->regenerateProductIndex($product['id_product'])) {
                    $sql = 'UPDATE `'._DB_PREFIX_.'product`
                            SET `indexed` = 1
                            WHERE `id_product` = '.(int)$product['id_product'];
                    Db::getInstance()->execute($sql);

                    $sql = 'UPDATE `'._DB_PREFIX_.'product_shop`
                            SET `indexed` = 1
                            WHERE `id_product` = '.(int)$product['id_product'];
                    Db::getInstance()->execute($sql);
                } else {
                    $return = false;
                }
            }

            return $return;
        } elseif ($full == false && (int)$id_product > 0) {
            if ($elasticsearch_module->regenerateProductIndex($id_product)) {
                $sql = 'UPDATE `'._DB_PREFIX_.'product`
                        SET `indexed` = 1
                        WHERE `id_product` = '.(int)$id_product;
                Db::getInstance()->execute($sql);

                $sql = 'UPDATE `'._DB_PREFIX_.'product_shop`
                        SET `indexed` = 1
                        WHERE `id_product` = '.(int)$id_product;
                Db::getInstance()->execute($sql);

                return true;
            } else {
                return false;
            }
        }

        return false;
    }
}
