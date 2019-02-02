<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
class StBlogSearchClass extends ObjectModel
{
    public static $definition = array(
		'table' => 'st_blog',
		'primary' => 'id_st_blog',
		'multilang' => true,
	);
    public function prepareSearch($expr, $id_lang = null, $id_shop = null)
	{            
        if (!$id_lang)
            $id_lang = Context::getContext()->language->id;
            
        if (!$id_shop)
            $id_shop = Context::getContext()->shop->id;
            
        if (!$expr)
            return false;
        
        $id_array = array();
        
        $words = explode(' ', Search::sanitize($expr, $id_lang, false, Context::getContext()->language->iso_code));
        foreach ($words as $key => $search)
        {
            if (empty($search) || strlen($search) < (int)Configuration::get('ST_BS_SEARCH_MINWORDLEN'))
                continue;
            $search_extra = '';
            if (Configuration::get('ST_BS_SEARCH_NAME'))
                $search_extra .= ' OR bl.name LIKE "%'.$search.'%"';
            if (Configuration::get('ST_BS_SEARCH_AUTHOR'))
                $search_extra .= ' OR bl.author LIKE "%'.$search.'%"';
            if (Configuration::get('ST_BS_SEARCH_CATEGORY'))
                $search_extra .= ' OR bcl.name LIKE "%'.$search.'%"';
            if (Configuration::get('ST_BS_SEARCH_SHORT_CONTENT'))
                $search_extra .= ' OR bl.content_short LIKE "%'.$search.'%"';
            if (Configuration::get('ST_BS_SEARCH_CONTENT'))
                $search_extra .= ' OR bl.content LIKE "%'.$search.'%"';
            
            if (!$search_extra)
                return false;
            
            // Search in blog lang and category lang.
            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
            SELECT bl.id_st_blog FROM `'._DB_PREFIX_.'st_blog_lang` bl 
            INNER JOIN `'._DB_PREFIX_.'st_blog_shop` bs ON (bs.id_st_blog=bl.id_st_blog)
            LEFT JOIN `'._DB_PREFIX_.'st_blog_category_blog` bcb ON (bl.id_st_blog=bcb.id_st_blog)
            LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` bcl ON (bcb.id_st_blog_category=bcl.id_st_blog_category
            AND bcl.`id_lang` = '.$id_lang.')
            WHERE bl.`id_lang` ='.$id_lang.'
            AND bs.`id_shop` = '.$id_shop.'
            AND ('.trim($search_extra, ' OR ').')
            ');
        
            if($result)
        		foreach ($result as $row)
                    $id_array[] = $row['id_st_blog'];
            
            if (Configuration::get('ST_BS_SEARCH_TAG'))
            {
                // Search in blog tag.
                $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
                SELECT id_st_blog FROM `'._DB_PREFIX_.'st_blog_tag` t 
                INNER JOIN `'._DB_PREFIX_.'st_blog_tag_map` tm 
                ON (t.id_st_blog_tag=tm.id_st_blog_tag)
                WHERE id_lang = '.$id_lang.'
                AND name like "%'.$search.'%"
                ');
                if($result)
            		foreach ($result as $row)
                        $id_array[] = $row['id_st_blog'];    
            }
      }
        
		return array_unique($id_array);
	}
    
    public function getBlogs($id_array ,$id_lang, $p, $n, $order_by = null, $order_way = null, $get_total = false, $active = true)
	{
	   $context = Context::getContext();
       
       if (!$id_array)
        return false;    
            
        Shop::addTableAssociation('st_blog', array('type' => 'shop'));
                    
        if ($get_total)
		{
			$sql = 'SELECT COUNT(DISTINCT b.id_st_blog) AS total
					FROM `'._DB_PREFIX_.'st_blog` b
                    LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` bl
					ON (b.`id_st_blog` = bl.`id_st_blog`
					AND bl.`id_lang` = '.(int)$id_lang.')
					'.Shop::addSqlAssociation('st_blog', 'b').'
					LEFT JOIN `'._DB_PREFIX_.'st_blog_category_blog` cb ON b.`id_st_blog` = cb.`id_st_blog`
					WHERE b.id_st_blog IN('.implode(',', $id_array).')'.
                    ' AND st_blog_shop.`id_shop` = '.(int)$context->shop->id.
					($active ? ' AND st_blog_shop.`active` = 1' : '');
			return (int)Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
		}
        
        if (empty($order_by))
			$order_by = 'date_add';
		else
			$order_by = strtolower($order_by);

		if (empty($order_way))
			$order_way = 'DESC';
            
        $soby = (int)Configuration::get('ST_BS_SEARCH_SORT_BY');
        switch($soby)
        {
            case 1:
                $order_by = 'date_add';
                $order_way = 'DESC';
            break;
            case 2:
                $order_by = 'date_add';
                $order_way = 'ASC';
            break;
            case 3:
                $order_by = 'date_upd';
                $order_way = 'DESC';
            break;
            case 4:
                $order_by = 'date_upd';
                $order_way = 'ASC';
            break;
            case 5:
                $order_by = 'name';
                $order_way = 'ASC';
            break;
            case 6:
                $order_by = 'name';
                $order_way = 'DESC';
            break;
            case 7:
                $order_by = 'id_st_blog';
                $order_way = 'DESC';
            break;
            case 8:
                $order_by = 'id_st_blog';
                $order_way = 'ASC';
            break;
            default:
            break;
        }
          
		if ($order_by == 'id_st_blog' || $order_by == 'date_add' || $order_by == 'date_upd')
			$order_by_prefix = 'b';
		elseif ($order_by == 'position')
			$order_by_prefix = 'cb';
        elseif ($order_by == 'name')
			$order_by_prefix = 'bl';
        
		$sql = 'SELECT b.*, st_blog_shop.*, bl.*,
					cl.`name` AS category_default
				FROM `'._DB_PREFIX_.'st_blog_category_blog` cb
				LEFT JOIN `'._DB_PREFIX_.'st_blog` b
					ON cb.`id_st_blog` = b.`id_st_blog`
				'.Shop::addSqlAssociation('st_blog', 'b').'
				LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl
					ON (st_blog_shop.`id_st_blog_category_default` = cl.`id_st_blog_category`
					AND cl.`id_lang` = '.(int)$id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` bl
					ON (b.`id_st_blog` = bl.`id_st_blog`
					AND bl.`id_lang` = '.(int)$id_lang.')
				WHERE st_blog_shop.`id_shop` = '.(int)$context->shop->id
                    .' AND b.id_st_blog IN('.implode(',', $id_array).')'
					.($active ? ' AND st_blog_shop.`active` = 1' : '')
					.' GROUP BY st_blog_shop.`id_st_blog`';

		$sql .= ' ORDER BY '.(isset($order_by_prefix) ? $order_by_prefix.'.' : '').'`'.pSQL($order_by).'` '.pSQL($order_way).'
		LIMIT '.(((int)$p - 1) * (int)$n).','.(int)$n;

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        
		return StBlogClass::getBlogsDetials((int)$id_lang, $result);
	}
}