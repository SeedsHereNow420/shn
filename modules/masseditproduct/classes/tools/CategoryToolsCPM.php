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

class CategoryToolsCPM
{
    public static $category_field_map = array(
        'id_category',
        'id_parent',
        'name',
        'description',
        'link_rewrite',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'id_lang',
        'position',
        'active'
    );

    protected static function generateSelectFields()
    {
        $category_definition = self::getCategoryDefinition();
        $select = array();
        foreach (self::$category_field_map as $field) {
            if (array_key_exists($field, $category_definition)) {
                if ($field == 'position') {
                    $select[] = 'cs.`'.$field.'`';
                } elseif (array_key_exists('lang', $category_definition[$field]) && $category_definition[$field]['lang']) {
                    $select[] = 'cl.`'.$field.'`';
                } else {
                    $select[] = 'c.`'.$field.'`';
                }
            }
        }
        return $select;
    }

    protected static function fillLangArrayElement(&$element, $item)
    {
        $category_definition = self::getCategoryDefinition();
        foreach (self::$category_field_map as $field) {
            if (array_key_exists($field, $category_definition) && array_key_exists($field, $item)) {
                if (array_key_exists('lang', $category_definition[$field]) && $category_definition[$field]['lang']) {
                    if (!array_key_exists($field, $element)) {
                        $element[$field] = array();
                    }
                    $element[$field][$item['id_lang']] = $item[$field];
                } else {
                    if (!array_key_exists($field, $element)) {
                        $element[$field] = $item[$field];
                    }
                }
            }
        }
    }

    protected static function rebuildIndexCategories(&$categories)
    {
        foreach ($categories as &$category) {
            $tmp = array();
            if (count($category)) {
                foreach ($category as $c) {
                    $tmp[] = $c;
                }
            }
            $category = $tmp;
        }
    }

    public static function getCategories()
    {
        $query = new DbQuery();
        $id_shop = Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP ?
            (int)Context::getContext()->shop->id : 'c.id_shop_default';
        $query->select(implode(', ', self::generateSelectFields()));
        $query->from('category', 'c');
        $query->leftJoin('category_lang', 'cl', 'c.`id_category` = cl.`id_category`');
        $query->leftJoin('category_shop', 'cs', 'c.`id_category` = cs.`id_category` AND cs.`id_shop` = c.`id_shop_default`');
        $query->where('c.`id_shop_default` = '.$id_shop);
        $query->orderBy('cs.`position` ASC');

        $result = Db::getInstance()->executeS($query->build());

        $ids_category = array();
        if (is_array($result) && count($result)) {
            foreach ($result as $item) {
                $ids_category[] = $item['id_category'];
            }
        }
        $categories_groups = array();
        if (count($ids_category)) {
            $result2 = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'category_group
            WHERE id_category IN('.implode(',', $ids_category).')');
            if (is_array($result2) && count($result2)) {
                foreach ($result2 as $item2) {
                    if (!array_key_exists($item2['id_category'], $categories_groups)) {
                        $categories_groups[$item2['id_category']] = array();
                    }
                    $categories_groups[$item2['id_category']][] = $item2['id_group'];
                }
            }
        }

        $categories = array();
        if (is_array($result) && count($result)) {
            foreach ($result as $item) {
                if (file_exists(_PS_CAT_IMG_DIR_.$item['id_category'].'.jpg')) {
                    $item['image'] = _PS_IMG_.'c/'.$item['id_category'].'.jpg';
                } else {
                    $item['image'] = null;
                }
            }

            if (!array_key_exists($item['id_category'], $categories)) {
                $categories[$item['id_category']] = array();
            }
            if (!array_key_exists($item['id_parent'], $categories)) {
                $categories[$item['id_parent']] = array();
            }

            $index = count($categories[$item['id_parent']]);
            if (count($categories[$item['id_parent']])) {
                foreach ($categories[$item['id_parent']] as $index_category => $category) {
                    if ($category['id_category'] == $item['id_category']) {
                        $index = $index_category;
                    }
                }
            }

            if (!array_key_exists($index, $categories[$item['id_parent']])) {
                $categories[$item['id_parent']][$index] = array();
            }

            self::fillLangArrayElement($categories[$item['id_parent']][$index], $item);

            $categories[$item['id_parent']][$index]['image'] = $item['image'];

            if (array_key_exists($item['id_category'], $categories_groups)) {
                $categories[$item['id_parent']][$index]['groups'] = $categories_groups[$item['id_category']];
            } else {
                $categories[$item['id_parent']][$index]['groups'] = array();
            }
        }

        //self::rebuildIndexCategories($categories);
        return $categories;
    }

    public static function getRootCategoryId()
    {
        $id_root_category = Db::getInstance()->getValue('SELECT c.`id_category` FROM '._DB_PREFIX_.'category c
        WHERE c.`is_root_category` = 1');
        return $id_root_category;
    }

    protected static $category_definition = null;

    protected static function getCategoryDefinition()
    {
        if (!is_null(self::$category_definition)) {
            return self::$category_definition;
        }

        self::$category_definition = Category::$definition['fields'];

        //Fix definition
        self::$category_definition['id_category'] = array();
        self::$category_definition['id_lang'] = array('lang' => true);
        return self::$category_definition;
    }

    public static function cleanPosition($id_parent)
    {
        $id_shop = Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP ?
            (int)Context::getContext()->shop->id : 'c.id_shop_default';
        $categories = Db::getInstance()->executeS('SELECT cs.`id_category`, cs.`id_shop` FROM '._DB_PREFIX_.'category c
        LEFT JOIN '._DB_PREFIX_.'category_shop cs ON cs.`id_category` = c.`id_category` AND cs.`id_shop` = '.$id_shop.'
        WHERE c.`id_parent` = '.(int)$id_parent.'
        ORDER BY cs.`position` ASC');
        if (is_array($categories) && count($categories)) {
            foreach ($categories as $key => $category) {
                Db::getInstance()->update('category_shop', array(
                    'position' => $key
                ), 'id_category = '.(int)$category['id_category'].' AND id_shop = '.(int)$category['id_shop']);
            }
        }
    }

    public static function updatePosition($id_category, $position, $id_parent, $way)
    {
        $id_shop = Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP ?
            (int)Context::getContext()->shop->id : 'c.id_shop_default';

        $category = Db::getInstance()->getRow('SELECT cs.`id_category`, cs.`position` FROM '._DB_PREFIX_.'category c
        LEFT JOIN '._DB_PREFIX_.'category_shop cs ON cs.`id_category` = c.`id_category` AND cs.`id_shop` = '.$id_shop.'
        WHERE c.`id_category` = '.(int)$id_category);

        if (!is_array($category) || !count($category)) {
            return false;
        }

        $old_position = (int)$category['position'];

        Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'category c
        LEFT JOIN '._DB_PREFIX_.'category_shop cs ON c.`id_category` = cs.`id_category` AND cs.`id_shop` = '.$id_shop.'
        SET c.`position` = c.`position` '.($way ? '- 1' : '+ 1').',
        cs.`position` = cs.`position` '.($way ? '- 1' : '+ 1').'
        WHERE cs.`position`'.($way ? '> '.(int)$old_position.' AND cs.`position` <= '.(int)$position
                : '< '.(int)$old_position.' AND cs.`position` >= '.(int)$position).'
        AND c.`id_parent` = '.(int)$id_parent);

        Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'category c
        LEFT JOIN '._DB_PREFIX_.'category_shop cs ON cs.`id_category` = c.`id_category` AND cs.`id_shop` = '.$id_shop.'
        SET c.`position` = '.(int)$position.' , cs.`position` = '.(int)$position.' WHERE c.`id_category` = '.(int)$id_category);
    }

    public static function moveCategory($id_category, $id_parent, $position)
    {
        $category = new Category($id_category);
        $category->id_parent = $id_parent;
        $category->save();

        $id_shop = Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP ?
            (int)Context::getContext()->shop->id : 'c.id_shop_default';

        $category = Db::getInstance()->getRow('SELECT cs.`id_category`, cs.`position` FROM '._DB_PREFIX_.'category c
        LEFT JOIN '._DB_PREFIX_.'category_shop cs ON cs.`id_category` = c.`id_category` AND cs.`id_shop` = '.$id_shop.'
        WHERE c.`id_category` = '.(int)$id_category);
        if (!is_array($category) || !count($category)) {
            return false;
        }
        $old_position = (int)$category['position'];
        $way = ($position > $old_position ? 1 : 0);
        return $way;
    }
}
