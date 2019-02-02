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

class StProductCommentClass extends ObjectModel
{
	public $id;
    
    	/** @var string Name */
	public $name;

	/** @var boolean Status for display */
	public $validate = 1;

	/** @var integer Customer ID */
	public $id_customer;

	/** @var integer Guest's id */
	public $id_guest;

	/** @var integer ID */
	public $id_product;
    
    /** @var integer ID */
    public $id_order_detail;
    
	/** @var integer Shop ID */
	public $id_shop;

	/** @var integer Parent ID */
	public $id_parent;

	/** @var string Customer Name */
	public $customer_name;

	/** @var string Customer Email */
	public $title;
    
    /** @var string Customer Email */
	public $email;
    
    /** @var string Customer Comment */
	public $content;
    
    /** @var string */
	public $image;
    
    /** @var integer Grade */
	public $grade;
    
    /** @var integer */
	public $deleted = 0;
    
    /** @var integer */
	public $is_admin = 0;
    
    /** @var integer */
	public $featured;
    
    /** @var integer */
	public $home_featured;

	/** @var string Object creation date */
	public $date_add;
    
    /** Image format*/
    const IMAGE_FORMAT = 'jpg';
    
    /** avatar default path */
    const AVATAR_PATH = '/upload/stproductcomments/avatar/';
    
    /** avatar default image */
    const AVATAR_DEFAULT = 'modules/stproductcomments/views/img/avatar/';

    /** @var string avatar image thumbnail type */
    public static $avatarDef = array(
        'small' => array(56, 56),
        'large' => array(120, 120)
    );

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'st_product_comment',
		'primary' => 'id_st_product_comment',
		'fields' => array(
			'validate' => 			array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'id_parent' => 			array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'id_order_detail' => 	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_product' => 		array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_shop' => 		    array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_customer' => 		array('type' => self::TYPE_INT),
            'id_guest' =>           array('type' => self::TYPE_INT),
            'featured' =>           array('type' => self::TYPE_INT),
            'home_featured' =>      array('type' => self::TYPE_INT),
			'deleted' =>		    array('type' => self::TYPE_BOOL),
            'is_admin' =>		    array('type' => self::TYPE_BOOL),
			'date_add' =>		    array('type' => self::TYPE_DATE),

			'customer_name' => 		array('type' => self::TYPE_STRING),
			'title' => 	            array('type' => self::TYPE_STRING),
            'email' => 	            array('type' => self::TYPE_STRING),
			'content' =>            array('type' => self::TYPE_STRING, 'validate' => 'isMessage', 'size' => 65535, 'required' => true),
			'grade' =>			    array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
		)
           
	);
    
    public static function isCommented($id_customer, $id_order_detail, $id_product)
	{
		$result = Db::getInstance()->getValue('
			SELECT COUNT(0)
			FROM `'._DB_PREFIX_.'st_product_comment` pc
			WHERE pc.`id_parent` = 0
            AND pc.`id_product` = '.(int)$id_product.'
			AND pc.`id_customer` = '.(int)$id_customer.'
            AND pc.`id_shop` = '.(int)Context::getContext()->shop->id.'
			AND pc.`id_order_detail` = '.(int)$id_order_detail
		);
		return $result;
	}
    
    public static function getListComments(
        $n, 
        $p, 
        $id_product = null, 
        $id_customer = null, 
        $get_total = false, 
        $order_by = null, 
        $order_way = null, 
        $image_only =  false, 
        $grade = 0,
        $id_st_product_comment = 0,
        $featured = false
    )
    {
        $p = (int)$p;
		$n = (int)$n;
		if ($p <= 1)
			$p = 1;
		if ($n != null && $n <= 0)
			$n = 20;
        $id_shop = Context::getContext()->shop->id;
        $validate = Configuration::get('ST_PROD_C_MODERATE');
        if ($get_total) {
            return Db::getInstance()->getValue('
                SELECT COUNT(0) FROM `'._DB_PREFIX_.'st_product_comment` pc
                '.($image_only ? 'LEFT JOIN `'._DB_PREFIX_.'st_product_comment_image` pci
                ON pc.`id_st_product_comment` = pci.`id_st_product_comment`' : '').'
                WHERE pc.`id_shop` = '.(int)$id_shop.
                ($validate == '1' ? ' AND pc.`validate` = 1' : '').
                ($id_product ? ' AND pc.`id_product` = '.(int)$id_product : '').
                ($image_only ? ' AND pci.`id_st_product_comment` > 0' : '').
                ($grade > 0 ? ' AND pc.`grade` >='.(int)$grade.' AND pc.`grade` < '.((int)$grade+1) : '').'
                AND pc.`id_parent` = 0   
            ');
        }
        if (!$order_by) {
            $order_by = 'pc.`featured`, `date_add`';
        }
        if ($order_way) {
            $order_way = 'DESC';
        }
		$validate = Configuration::get('ST_PROD_C_MODERATE');
        $comments = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
    		SELECT pc.*,
            (SELECT count(*) FROM `'._DB_PREFIX_.'st_product_comment_usefulness` pcu WHERE pcu.`id_st_product_comment` = pc.`id_st_product_comment` AND pcu.`usefulness` = 1) as total_useful,
			(SELECT count(*) FROM `'._DB_PREFIX_.'st_product_comment_usefulness` pcu WHERE pcu.`id_st_product_comment` = pc.`id_st_product_comment`) as total_advice, 
            (SELECT count(*) FROM `'._DB_PREFIX_.'st_product_comment` pcs WHERE pcs.`id_parent` = pc.`id_st_product_comment`'.($validate == '1' ? ' AND pcs.`validate` = 1' : '').') as total_reply,'.
			((int)$id_customer ? '(SELECT count(*) FROM `'._DB_PREFIX_.'st_product_comment_usefulness` pcuc WHERE pcuc.`id_st_product_comment` = pc.`id_st_product_comment` AND pcuc.id_customer = '.(int)$id_customer.') as customer_advice, ' : '').
			((int)$id_customer ? '(SELECT count(*) FROM `'._DB_PREFIX_.'st_product_comment_report` pcrc WHERE pcrc.`id_st_product_comment` = pc.`id_st_product_comment` AND pcrc.id_customer = '.(int)$id_customer.') as customer_report, ' : '').'
    		IF(c.`id_customer`, CONCAT(c.`firstname`, \' \',  c.`lastname`), pc.customer_name) customer_name
            FROM `'._DB_PREFIX_.'st_product_comment` pc
    		LEFT JOIN `'._DB_PREFIX_.'customer` c ON c.`id_customer` = pc.`id_customer`'.
            ($image_only ? 'LEFT JOIN `'._DB_PREFIX_.'st_product_comment_image` pci
            ON pc.`id_st_product_comment` = pci.`id_st_product_comment`' : '').'      
    		WHERE pc.`id_shop` = '.(int)$id_shop.
            ($validate == '1' ? ' AND pc.`validate` = 1' : '').
            ($id_product ? ' AND pc.`id_product` = '.(int)$id_product : '').
            ($image_only ? ' AND pci.`id_st_product_comment` > 0' : '').
            ($grade > 0 ? ' AND pc.`grade` >='.(int)$grade.' AND pc.`grade` < '.((int)$grade+1) : '').
            ($id_st_product_comment > 0 ? ' AND pc.`id_st_product_comment` = '.(int)$id_st_product_comment : '').
            ($featured==2 ? ' AND pc.`featured` = 1' : ($featured ? ' AND pc.`home_featured` = 1' : '')).'
            AND pc.`id_parent` = 0
    		ORDER BY '.$order_by.' '.$order_way.'
            Limit '.(int)(($p - 1) * $n).', '.(int)($n)
        );
        foreach($comments AS &$comment) {
            $comment['images'] = self::getCommentImages($comment['id_st_product_comment']);
            $comment['grades'] = StProductCommentCriterionClass::getGrades($comment['id_st_product_comment']);
            $comment['tags'] = self::getTagByComment($comment['id_product'], $comment['id_st_product_comment']);
        }
        return $comments;
    }
    
    public static function statByProduct($id_product = 0)
    {
        $id_shop = Context::getContext()->shop->id;
        $validate = Configuration::get('ST_PROD_C_MODERATE');
        $result = Db::getInstance()->getRow('
            SELECT COUNT(IF(grade > 0 AND grade <=5, TRUE, NULL)) AS total,
            COUNT(IF(grade > 0 AND grade < 2, TRUE, NULL)) "1",
            COUNT(IF(grade >= 2 AND grade < 3, TRUE, NULL)) "2",
            COUNT(IF(grade >= 3 AND grade < 4, TRUE, NULL)) "3",
            COUNT(IF(grade >= 4 AND grade < 5, TRUE, NULL)) "4",
            COUNT(IF(grade = 5, TRUE, NULL)) "5" 
            FROM `'._DB_PREFIX_.'st_product_comment` pc
            WHERE pc.`id_shop` = '.(int)$id_shop.
            ($validate == '1' ? ' AND pc.`validate` = 1' : '').
            ($id_product ? ' AND pc.`id_product` = '.(int)$id_product : '').'
            AND pc.`id_parent` = 0   
        ');
        $result['image_total'] = Db::getInstance()->getValue('
            SELECT COUNT(0)
            FROM `'._DB_PREFIX_.'st_product_comment_image` pci
            LEFT JOIN `'._DB_PREFIX_.'st_product_comment` pc
            ON pci.id_st_product_comment = pc.id_st_product_comment
            WHERE pc.`id_shop` = '.(int)$id_shop.
            ($validate == '1' ? ' AND pc.`validate` = 1' : '').
            ($id_product ? ' AND pc.`id_product` = '.(int)$id_product : '').'
            AND pc.`id_parent` = 0  
        ');
        return $result;
    }

	/**
	 * Get Grade By product
	 *
	 * @return array Grades
	 */
	public static function getGradeByProduct($id_product, $id_lang)
	{
		if (!Validate::isUnsignedId($id_product) ||
			!Validate::isUnsignedId($id_lang))
			return false;
		$validate = Configuration::get('ST_PROD_C_MODERATE');


		return (Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT pc.`id_st_product_comment`, pcg.`grade`, pccl.`name`, pcc.`id_st_product_comment_criterion`
		FROM `'._DB_PREFIX_.'st_product_comment` pc
		LEFT JOIN `'._DB_PREFIX_.'st_product_comment_grade` pcg ON (pcg.`id_st_product_comment` = pc.`id_st_product_comment`)
		LEFT JOIN `'._DB_PREFIX_.'st_product_comment_criterion` pcc ON (pcc.`id_st_product_comment_criterion` = pcg.`id_st_product_comment_criterion`)
		LEFT JOIN `'._DB_PREFIX_.'st_product_comment_criterion_lang` pccl ON (pccl.`id_st_product_comment_criterion` = pcg.`id_st_product_comment_criterion`)
		WHERE pc.`id_product` = '.(int)$id_product.'
        AND pc.`id_parent` = 0
        AND pc.`id_shop` = '.(int)Context::getContext()->shop->id.'
		AND pccl.`id_lang` = '.(int)$id_lang.
		($validate == '1' ? ' AND pc.`validate` = 1' : '')));
	}
    
    public static function getTag($id_product)
    {
        $result = array();
        if ($rs = Db::getInstance()->executeS('SELECT * 
        FROM `'._DB_PREFIX_.'st_product_comment_tag`
        WHERE id_product='.(int)$id_product)) {
            foreach($rs AS $value) {
                $result[$value['id_st_product_comment_tag']] = $value['name'];
            }
            
        }
        return $result;
    }
    
    public static function getCommentIdByTag($name, $id_product)
    {
        $result = array();
        $res = Db::getInstance()->executeS('
            SELECT pctm.`id_st_product_comment` FROM `'._DB_PREFIX_.'st_product_comment_tag_map` pctm
            LEFT JOIN `'._DB_PREFIX_.'st_product_comment_tag` pct
            ON pctm.`id_st_product_comment_tag` = pct.`id_st_product_comment_tag`
            WHERE pct.`name` = "'.pSQL($name).'"
            AND pct.`id_product` = '.(int)$id_product.'
        ');
        if ($res) {
            foreach($res AS $val) {
                $result[] = $val['id_st_product_comment'];
            }
        }
        return $result;
    }
    
    public static function getTagByProduct($id_product, $limit=0)
    {
        return Db::getInstance()->executeS('
            SELECT pct.`name`, COUNT(0) total FROM
            `'._DB_PREFIX_.'st_product_comment_tag_map` pctm
            LEFT JOIN `'._DB_PREFIX_.'st_product_comment_tag` pct
            ON pct.`id_st_product_comment_tag` = pctm.`id_st_product_comment_tag`
            WHERE pct.`id_product` = '.(int)$id_product.'
            GROUP BY pct.`name`
            ORDER BY total desc
            '.($limit ? ' LIMIT '.$limit : '').'
        ');
    }
    
    public static function getTagByComment($id_product, $id_st_product_comment)
    {
        return Db::getInstance()->executeS('
            SELECT pct.*, COUNT(0) total FROM
            `'._DB_PREFIX_.'st_product_comment_tag_map` pctm
            LEFT JOIN `'._DB_PREFIX_.'st_product_comment_tag` pct
            ON pct.`id_st_product_comment_tag` = pctm.`id_st_product_comment_tag`
            WHERE pct.`id_product` = '.(int)$id_product.'
            AND pctm.`id_st_product_comment` = '.(int)$id_st_product_comment.'
            GROUP BY pct.`name`
        ');
    }
    
    public static function addTags($name = '', $id_product = 0, $id_st_product_comment = 0)
    {
        if (!$name || !$id_product || !$id_st_product_comment) {
            return false;
        }
        $db = Db::getInstance();
        foreach(explode(',', $name) AS $tag) {
            if ($id_st_product_comment_tag = $db->getValue('SELECT id_st_product_comment_tag 
            FROM `'._DB_PREFIX_.'st_product_comment_tag`
            WHERE id_product='.(int)$id_product.' AND name="'.pSQL($tag).'"')) {
                $db->insert('st_product_comment_tag_map', array('id_st_product_comment_tag'=>$id_st_product_comment_tag, 'id_st_product_comment'=>$id_st_product_comment));
            } else {
                $db->insert('st_product_comment_tag', array('name'=>pSQL($tag), 'id_product'=>(int)$id_product));
                $insert_id = $db->Insert_ID();
                $db->insert('st_product_comment_tag_map', array('id_st_product_comment_tag'=>$insert_id, 'id_st_product_comment'=>$id_st_product_comment));
            }
        }
    }

	public static function getRatings($id_product)
	{
		$validate = Configuration::get('ST_PROD_C_MODERATE');

		$sql = 'SELECT COUNT(0) as total,
                (SUM(pc.`grade`) / COUNT(pc.`grade`)) AS avg,
				MIN(pc.`grade`) AS min,
				MAX(pc.`grade`) AS max
			FROM `'._DB_PREFIX_.'st_product_comment` pc
			WHERE pc.`id_product` = '.(int)$id_product.'
            AND pc.`id_parent` = 0
            AND pc.`id_shop`='.(int)Context::getContext()->shop->id.
			($validate == '1' ? ' AND pc.`validate` = 1' : '');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);
	}

	public static function getAverageGrade($id_product)
	{
		$validate = Configuration::get('ST_PROD_C_MODERATE');

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
		SELECT (SUM(pc.`grade`) / COUNT(pc.`grade`)) AS grade
		FROM `'._DB_PREFIX_.'st_product_comment` pc
		WHERE pc.`id_product` = '.(int)$id_product.'
        AND pc.`id_shop`='.(int)Context::getContext()->shop->id.'
        AND pc.`id_parent` = 0'.
		($validate == '1' ? ' AND pc.`validate` = 1' : ''));
	}

	public static function getAveragesByProduct($id_product, $id_lang)
	{
		/* Get all grades */
		$grades = StProductCommentClass::getGradeByProduct((int)$id_product, (int)$id_lang);
		$total = StProductCommentClass::getGradedCommentNumber((int)$id_product);

		if (!count($grades) || (!$total))
			return array();

		/* Addition grades for each criterion */
		$criterionsGradeTotal = array();
		$count_grades = count($grades);
		for ($i = 0; $i < $count_grades; ++$i)
			if (array_key_exists($grades[$i]['id_st_product_comment_criterion'], $criterionsGradeTotal) === false)
				$criterionsGradeTotal[$grades[$i]['id_st_product_comment_criterion']] = (int)($grades[$i]['grade']);
			else
				$criterionsGradeTotal[$grades[$i]['id_st_product_comment_criterion']] += (int)($grades[$i]['grade']);

		/* Finally compute the averages */
		$averages = array();
		foreach ($criterionsGradeTotal as $key => $criterionGradeTotal)
			$averages[(int)($key)] = (int)($total) ? round((int)($criterionGradeTotal) / (int)($total), 1) : 0;

		return $averages;
	}

	/**
	 * Return number of comments and average grade by products
	 *
	 * @return array Info
	 */
	public static function getCommentNumber($id_product)
	{
		if (!Validate::isUnsignedId($id_product))
			return false;
		$validate = (int)Configuration::get('ST_PROD_C_MODERATE');
		$cache_id = 'ProductComment::getCommentNumber_'.(int)$id_product.'-'.$validate;
		if (!Cache::isStored($cache_id))
		{
			$result = (int)Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
			SELECT COUNT(`id_st_product_comment`) AS "nbr"
			FROM `'._DB_PREFIX_.'st_product_comment` pc
			WHERE pc.`id_parent` = 0
            AND pc.`id_product` = '.(int)($id_product).'
            AND pc.`id_shop`='.(int)Context::getContext()->shop->id.
            ($validate == '1' ? ' AND `validate` = 1' : ''));
			Cache::store($cache_id, $result);
		}
		return Cache::retrieve($cache_id);
	}

	/**
	 * Return number of comments and average grade by products
	 *
	 * @return array Info
	 */
	public static function getGradedCommentNumber($id_product)
	{
		if (!Validate::isUnsignedId($id_product))
			return false;
		$validate = (int)Configuration::get('ST_PROD_C_MODERATE');

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
		SELECT COUNT(pc.`id_product`) AS nbr
		FROM `'._DB_PREFIX_.'st_product_comment` pc
		WHERE pc.`id_parent` = 0
        AND pc.`id_product` = '.(int)($id_product).'
        AND pc.`id_shop`='.(int)Context::getContext()->shop->id.
        ($validate == '1' ? ' AND `validate` = 1' : '').'
		AND `grade` > 0');
		return (int)($result['nbr']);
	}

	/**
	 * Get comments by Validation
	 *
	 * @return array Comments
	 */
	public static function getByValidate(
        $validate = '0', 
        $id_parent = 0, 
        $all = false, 
        $get_total = false, 
        $p = null, 
        $n = null
    )
	{
	    if ($get_total) {
            return Db::getInstance()->getValue('
                SELECT COUNT(0) FROM `'._DB_PREFIX_.'st_product_comment` pc
                WHERE pc.`id_shop` = '.(int)Context::getContext()->shop->id.'
                AND pc.`id_parent`='.(int)$id_parent.
                (!$all ? ' AND pc.`validate` = '.(int)$validate : '')
           );
	    }
		$sql  = '
			SELECT pc.`id_st_product_comment`, pc.`id_product`, IF(c.id_customer, CONCAT(c.`firstname`, \' \',  c.`lastname`), pc.customer_name) customer_name, 
            pc.`title`, pc.`content`, pc.`grade`, pc.`home_featured`,pc.`validate`, pc.`date_add`, pl.`name`
			FROM `'._DB_PREFIX_.'st_product_comment` pc
			LEFT JOIN `'._DB_PREFIX_.'customer` c ON (c.`id_customer` = pc.`id_customer`)
			LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.`id_product` = pc.`id_product` AND pl.`id_lang` = '.(int)Context::getContext()->language->id.Shop::addSqlRestrictionOnLang('pl').')
			WHERE pc.`id_shop` = '.(int)Context::getContext()->shop->id.'
            AND pc.`id_parent`='.(int)$id_parent.
            (!$all ? ' AND pc.`validate` = '.(int)$validate : '');

		$sql .= ' ORDER BY pc.`date_add` DESC';
        
        if ((int)$p && (int)$n) {
            $p = (int)$p;
            $n = (int)$n;
            $sql .= ' LIMIT '.($p-1)*$n. ', '.$n;
        }

		$result = Db::getInstance()->executeS($sql);
        
        if ($result && $validate && $p && $n) {
            foreach($result AS &$val) {
                $val['unapproved'] = 0;
                $subs = self::getSubs($val['id_st_product_comment'], 0);
                foreach($subs AS $sub) {
                    if (!$sub['validate']) {
                        $val['unapproved']++;
                    }
                }
            }
        }
        
        return $result;
	}
    
    public static function getByOrderProduct($id_customer, $id_order_detail = 0, $id_product=0, $validate = 0)
    {
        $result = Db::getInstance()->getRow('
            SELECT pc.`id_st_product_comment`, pc.`id_product`, IF(c.id_customer, CONCAT(c.`firstname`, \' \',  c.`lastname`), pc.customer_name) customer_name, pc.`title`, pc.`content`, pc.`grade`, pc.`is_admin`, pc.`date_add`
			FROM `'._DB_PREFIX_.'st_product_comment` pc
            LEFT JOIN `'._DB_PREFIX_.'customer` c ON (c.`id_customer` = pc.`id_customer`)
            WHERE pc.`id_parent`= 0
            AND pc.`id_customer`='.(int)$id_customer.'
            AND pc.`id_order_detail`='.(int)$id_order_detail.'
            AND pc.`id_product`='.(int)$id_product.'
            AND pc.`id_shop` = '.(int)Context::getContext()->shop->id.'
            '.($validate ? ' AND pc.`validate`=1' : '').'
        ');
        if ($result) {
            $result['images'] = self::getCommentImages($result['id_st_product_comment']);
        }
        return $result;
    }
    
    public static function getReplies($id_parent = 0, $validate = 0, $p = null, $n = null, $get_total = false)
    {
        $result = array();
        if ($get_total) {
            return Db::getInstance()->getValue('
                SELECT COUNT(0) FROM `'._DB_PREFIX_.'st_product_comment` pc
                WHERE pc.`id_parent`= '.(int)$id_parent.
                ($validate ? ' AND pc.`validate` = '.(int)$validate : '')
            );
        }
        $sql  = '
			SELECT pc.`id_st_product_comment`, pc.`id_product`, IF(c.id_customer, CONCAT(c.`firstname`, \' \',  c.`lastname`), pc.customer_name) customer_name, pc.`title`, pc.`content`, pc.`grade`, pc.`is_admin`, pc.`date_add`
			FROM `'._DB_PREFIX_.'st_product_comment` pc
			LEFT JOIN `'._DB_PREFIX_.'customer` c ON (c.`id_customer` = pc.`id_customer`)
			WHERE pc.`id_parent`='.(int)$id_parent.
            ($validate ? ' AND pc.`validate` = '.(int)$validate : '');
		$sql .= ' ORDER BY pc.`date_add` DESC';
        if ($n && $p) {
            $sql .= ' Limit '.(int)(($p - 1) * $n).', '.(int)($n);
        }
        if ($rs = Db::getInstance()->executeS($sql)) {
            $display_date = Configuration::get('ST_PROD_C_DISPLAY_DATE');
            foreach($rs AS $v) {
                $v['timeago'] = $display_date ? false : self::Timeago($v['date_add']); 
                $v['child'] = self::getReplies($v['id_st_product_comment'], $validate);
                $result[] = $v;
            }
        }
        return $result;
    }
    
    public static function getCommentImages($id_st_product_comment, $raw=false)
    {
        $ret = array();
        if ($res = Db::getInstance()->executeS('
            SELECT image FROM `'._DB_PREFIX_.'st_product_comment_image`
            WHERE id_st_product_comment = '.(int)$id_st_product_comment)
        ) {
            foreach ($res as $value) {
                $image = _THEME_PROD_PIC_DIR_.$value['image'];
                $ret[] = $raw ? $value['image'] : context::getContext()->link->protocol_content.Tools::getMediaServer($image).$image;
            }
        }
        return $ret;
    }
    
    public static function getOrderInfo($id_customer, $id_product, $validated = false, $id_order_detail = null)
    {
        if ($validated) {
            return Db::getInstance()->executeS('
                SELECT od.*
                FROM '._DB_PREFIX_.'orders o
                LEFT JOIN '._DB_PREFIX_.'order_detail od
                ON o.id_order = od.id_order
                LEFT JOIN '._DB_PREFIX_.'order_history oh
                ON oh.`id_order` = o.`id_order`
                LEFT JOIN '._DB_PREFIX_.'order_state os
                ON oh.`id_order_state` = os.`id_order_state`
                WHERE o.id_customer = '.(int)$id_customer.'
                AND od.product_id = '.(int)$id_product.'
                '.($id_order_detail ? 'AND od.`id_order_detail`='.(int)$id_order_detail : '').'
                AND os.`logable` = 1
                ORDER BY o.date_add DESC
            ');   
        }
        return Db::getInstance()->executeS('
            SELECT *
            FROM '._DB_PREFIX_.'orders o
            LEFT JOIN '._DB_PREFIX_.'order_detail od
            ON o.id_order = od.id_order
            WHERE o.id_customer = '.(int)$id_customer.'
            AND od.product_id = '.(int)$id_product.'
            '.($id_order_detail ? 'AND od.`id_order_detail`='.(int)$id_order_detail : '').'
            ORDER BY o.date_add DESC
        ');
    }
    
    public static function canComment($id_customer, $id_product)
    {
        if ($orders = self::getOrderInfo($id_customer, $id_product, true)) {
            foreach($orders AS $order) {
                if (!self::isCommented($id_customer, $order['id_order_detail'], $id_product)) {
                    return true;
                }
            }
        }
        return false;
    }
    

	/**
	 * Validate a comment
	 *
	 * @return boolean succeed
	 */
	public function validate($validate = '1')
	{
		if (!Validate::isUnsignedId($this->id))
			return false;

		$success = (Db::getInstance()->execute('
		UPDATE `'._DB_PREFIX_.'st_product_comment` SET
		`validate` = '.(int)$validate.'
		WHERE `id_st_product_comment` = '.(int)$this->id));
		return $success;
	}

	/**
	 * Delete Grades
	 *
	 * @return boolean succeed
	 */
	public static function deleteGrades($id_st_product_comment)
	{
		if (!Validate::isUnsignedId($id_st_product_comment))
			return false;
		return (Db::getInstance()->execute('
		DELETE FROM `'._DB_PREFIX_.'st_product_comment_grade`
		WHERE `id_st_product_comment` = '.(int)$id_st_product_comment));
	}

	/**
	 * Delete Reports
	 *
	 * @return boolean succeed
	 */
	public static function deleteReports($id_st_product_comment)
	{
		if (!Validate::isUnsignedId($id_st_product_comment))
			return false;
		return (Db::getInstance()->execute('
		DELETE FROM `'._DB_PREFIX_.'st_product_comment_report`
		WHERE `id_st_product_comment` = '.(int)$id_st_product_comment));
	}

	/**
	 * Delete usefulness
	 *
	 * @return boolean succeed
	 */
	public static function deleteUsefulness($id_st_product_comment)
	{
		if (!Validate::isUnsignedId($id_st_product_comment))
			return false;

		return (Db::getInstance()->execute('
		DELETE FROM `'._DB_PREFIX_.'st_product_comment_usefulness`
		WHERE `id_st_product_comment` = '.(int)$id_st_product_comment));
	}

	/**
	 * Report comment
	 *
	 * @return boolean
	 */
	public static function reportComment($id_st_product_comment, $id_customer)
	{
		return (Db::getInstance()->execute('
			INSERT INTO `'._DB_PREFIX_.'st_product_comment_report` (`id_st_product_comment`, `id_customer`)
			VALUES ('.(int)$id_st_product_comment.', '.(int)$id_customer.')'));
	}

	/**
	 * Comment already report
	 *
	 * @return boolean
	 */
	public static function isAlreadyReport($id_st_product_comment, $id_customer)
	{
		return (bool)Db::getInstance()->getValue('
			SELECT COUNT(*)
			FROM `'._DB_PREFIX_.'st_product_comment_report`
			WHERE `id_customer` = '.(int)$id_customer.'
			AND `id_st_product_comment` = '.(int)$id_st_product_comment);
	}

	/**
	 * Set comment usefulness
	 *
	 * @return boolean
	 */
	public static function setCommentUsefulness($id_st_product_comment, $usefulness, $id_customer)
	{
		return (Db::getInstance()->execute('
			INSERT INTO `'._DB_PREFIX_.'st_product_comment_usefulness` (`id_st_product_comment`, `usefulness`, `id_customer`)
			VALUES ('.(int)$id_st_product_comment.', '.(int)$usefulness.', '.(int)$id_customer.')'));
	}

    /**
     * Usefulness already set
     *
     * @return boolean
     */
    public static function isAlreadyUsefulness($id_st_product_comment, $id_customer)
    {
        return (bool)Db::getInstance()->getValue('
            SELECT COUNT(*)
            FROM `'._DB_PREFIX_.'st_product_comment_usefulness`
            WHERE `id_customer` = '.(int)$id_customer.'
            AND `id_st_product_comment` = '.(int)$id_st_product_comment);
    }

    /**
     * Usefulness already set
     *
     * @return boolean
     */
    public static function countUsefulness($id_st_product_comment, $usefulness)
    {
        return (int)Db::getInstance()->getValue('
            SELECT COUNT(*)
            FROM `'._DB_PREFIX_.'st_product_comment_usefulness`
            WHERE `usefulness` = '.(int)$usefulness.'
            AND `id_st_product_comment` = '.(int)$id_st_product_comment);
    }
    
    public static function getParents($id_st_product_comment)
    {
        $parents = array();

        while (true)
        {
            $sql = '
            SELECT pc.`id_st_product_comment`, pc.`id_parent`,IF(c.id_customer, CONCAT(c.`firstname`, \' \',  c.`lastname`), pc.customer_name) customer_name
			FROM `'._DB_PREFIX_.'st_product_comment` pc
			LEFT JOIN `'._DB_PREFIX_.'customer` c ON (c.`id_customer` = pc.`id_customer`)
            WHERE pc.`id_st_product_comment` = '.(int)$id_st_product_comment;

            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);

            if ($result)
                $parents[] = $result;
            if (!$result || $result['id_parent'] == 0)
                return $parents;
            $id_st_product_comment = $result['id_parent'];
        }
    }

	/**
	 * Get reported comments
	 *
	 * @return array Comments
	 */
	public static function getReportedComments()
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT(pc.`id_st_product_comment`), pc.`id_product`, IF(c.id_customer, CONCAT(c.`firstname`, \' \',  c.`lastname`), pc.customer_name) customer_name, pc.`content`, pc.`grade`, pc.`date_add`, pc.`title`, pc.`featured`, pc.`home_featured`
		FROM `'._DB_PREFIX_.'st_product_comment_report` pcr
		LEFT JOIN `'._DB_PREFIX_.'st_product_comment` pc
		ON pcr.id_st_product_comment = pc.id_st_product_comment
		LEFT JOIN `'._DB_PREFIX_.'customer` c ON (c.`id_customer` = pc.`id_customer`)
        WHERE pc.`id_parent` = 0
        AND pc.`id_shop`='.(int)Context::getContext()->shop->id.'
		ORDER BY pc.`date_add` DESC');
	}
    
    public function copyFromPost()
	{
		/* Classical fields */
		foreach ($_POST AS $key => $value)
			if (key_exists($key, $this) && $key != 'id_'.$this->table && !isset($_FILES[$key]))
				$this->{$key} = $value;

		/* Multilingual fields */
		if (sizeof($this->fieldsValidateLang))
		{
			$languages = Language::getLanguages(false);
			foreach ($languages AS $language)
				foreach ($this->fieldsValidateLang AS $field => $validation)
					if (isset($_POST[$field.'_'.(int)($language['id_lang'])]) && !isset($_FILES[$field.'_'.(int)($language['id_lang'])]))
						$this->{$field}[(int)($language['id_lang'])] = $_POST[$field.'_'.(int)($language['id_lang'])];
		}
	}
    
    public function delete()
    {
        $to_delete = array((int)$this->id);
        $this->recursiveDelete($to_delete, (int)$this->id);
		$to_delete = array_unique($to_delete);
        $where = 'id_st_product_comment IN ('.implode(',', $to_delete).')';
        self::deleteGrades($this->id);
		self::deleteReports($this->id);
		self::deleteUsefulness($this->id);
        self::deleteImages($this->id);
        self::deleteTags($this->id);
        return Db::getInstance()->delete('st_product_comment', $where);
    }
    
    public static function deleteByIdProduct($id_product)
    {
        $ret = true;
        $comments = Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'st_product_comment` WHERE `id_product`='.(int)$id_product);
        foreach($comments as $comment) {
            $comment = new StProductCommentClass($comment['id_st_product_comment']);
            $ret &= $comment->delete();
        }
        return $ret;
    }
    
    protected function recursiveDelete(&$to_delete, $id_st_product_comment)
	{
		$result = Db::getInstance()->executeS('
		SELECT `id_st_product_comment`
		FROM `'._DB_PREFIX_.'st_product_comment`
		WHERE `id_parent` = '.(int)$id_st_product_comment);
		foreach ($result as $row)
		{
			$to_delete[] = (int)$row['id_st_product_comment'];
			$this->recursiveDelete($to_delete, (int)$row['id_st_product_comment']);
		}
	}
    
    public static function deleteTags($id_st_product_comment)
	{
		if (!Validate::isUnsignedId($id_st_product_comment))
			return false;
		return (Db::getInstance()->execute('
		DELETE FROM `'._DB_PREFIX_.'st_product_comment_tag_map`
		WHERE `id_st_product_comment` = '.(int)$id_st_product_comment)) &&
            (Db::getInstance()->execute('
		DELETE FROM `'._DB_PREFIX_.'st_product_comment_tag`
		WHERE `id_st_product_comment_tag` NOT IN (SELECT
        `id_st_product_comment_tag` FROM `'._DB_PREFIX_.'st_product_comment_tag_map`)'));
	}
    
    public static function deleteImages($id_st_product_comment)
	{
		if (!Validate::isUnsignedId($id_st_product_comment))
			return false;
		return (Db::getInstance()->execute('
		DELETE FROM `'._DB_PREFIX_.'st_product_comment_image`
		WHERE `id_st_product_comment` = '.(int)$id_st_product_comment));
	}
    
    public static function Timeago($datetime, $full = false) {
        if (!$datetime) {
            return false;
        }
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        /*$string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );*/
        $string = array(
            'y' => 0,
            'm' => 0,
            'w' => 0,
            'd' => 0,
            'h' => 0,
            'i' => 0,
            // 's' => 0,
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k;
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        // return $string ? implode(', ', $string) . ' ago' : 'just now';
        return $string;
    }
    
    public static function getSubs($id_parent, $validate = 0, $all = true)
    {
        $result = array();
        $id_shop = Context::getContext()->shop->id;
        $rs = Db::getInstance()->executeS('
            SELECT * FROM `'._DB_PREFIX_.'st_product_comment` pc
            WHERE pc.`id_shop` = '.(int)$id_shop.
            ($validate == '1' ? ' AND pc.`validate` = 1' : '').'
            AND pc.`id_parent` = '.(int)$id_parent
        );
        $result = $rs;
        if ($all && $rs) {
            foreach($rs AS $value) {
                $result = array_merge($result, self::getSubs($value['id_st_product_comment'], $validate, $all));
            }
        }
        return $result;
    }
}



