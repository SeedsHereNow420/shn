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
class StBlogArchivesClass extends ObjectModel
{
    public static $definition = array(
		'table' => 'st_blog',
		'primary' => 'id_st_blog',
		'multilang' => true,
	);
    public static function getArchives($id_lang = null, $active = true)
	{
	 	if (!Validate::isBool($active))
	 		die(Tools::displayError('Param error'));
            
        if (!$id_lang)
            $id_lang = Context::getContext()->language->id;

        Shop::addTableAssociation('st_blog', array('type' => 'shop'));
        
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT b.`id_st_blog`, DATE_FORMAT(b.`date_add`,"%Y-%m-%M") date_add
		FROM `'._DB_PREFIX_.'st_blog` b
		LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` bl ON (b.`id_st_blog` = bl.`id_st_blog`)
        '.Shop::addSqlAssociation('st_blog','b').'
        WHERE bl.`id_lang` = '.(int)$id_lang.
        ($active ? ' AND b.`active` = 1 ' : '').'
        GROUP BY DATE_FORMAT(b.`date_add`, "%Y%m")
        ORDER BY b.`date_add` DESC');

		$archives = array();
        if($result)
    		foreach ($result as $row)
            {
                if (empty($row['date_add']))
                    continue;
                
                list($Y, $m, $M) =  explode('-', $row['date_add']);
                
                $archives[$Y]['child'][] = array(
                    'Y'     => $Y, 
                    'm'     => $m, 
                    'M'     => $M,
                    'Ym'    => $Y.$m,
                    'Y-m'   => $Y.'-'.$m
                    );
                $archives[$Y]['Y'] = $Y;
                $archives[$Y]['m'] = $m;
                $archives[$Y]['M'] = $M;
                
            }
		return $archives;
	}
    
    public function getBlogs($m ,$id_lang, $p, $n, $order_by = null, $order_way = null, $get_total = false, $active = true)
	{
	   $context = Context::getContext();
       
       if (!$m)
        return false;    
        
        $year = substr($m, 0, 4);
        $month = substr($m, 4, 2);
        if (strlen($year) == 4 && strlen($month) == 2)
        {
            $format = '%Y%m';
            $m = $year.$month;
        }elseif(strlen($year) == 4)
        {
            $format = '%Y';
            $m = $year;
        }else
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
					WHERE DATE_FORMAT(b.`date_add`, "'.$format.'") = "'.pSQL($m).'"'.
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
            
        $soby = (int)Configuration::get('ST_BLOG_CATE_SORT_BY');
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
                    .' AND DATE_FORMAT(b.`date_add`, "'.$format.'") = "'.pSQL($m).'"'
					.($active ? ' AND st_blog_shop.`active` = 1' : '')
					.' GROUP BY st_blog_shop.`id_st_blog`';

		$sql .= ' ORDER BY '.(isset($order_by_prefix) ? $order_by_prefix.'.' : '').'`'.pSQL($order_by).'` '.pSQL($order_way).'
		LIMIT '.(((int)$p - 1) * (int)$n).','.(int)$n;

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        
		return StBlogClass::getBlogsDetials((int)$id_lang, $result);
	}
}