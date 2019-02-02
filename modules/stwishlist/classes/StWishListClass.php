<?php
/*
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*/

class StWishListClass extends ObjectModel 
{
    /** @var integer Wishlist ID */
	public $id;

	/** @var integer Customer ID */
	public $id_customer;

	/** @var integer Token */
	public $token;

	/** @var integer Name */
	public $name;

	/** @var string Object creation date */
	public $date_add;

	/** @var string Object last modification date */
	public $date_upd;

	/** @var string Object last modification date */
	public $id_shop;

	/** @var integer default */
	public $default;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'st_wishlist',
		'primary' => 'id_st_wishlist',
		'fields' => array(
			'id_customer' =>	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
			'token' =>			array('type' => self::TYPE_STRING, 'validate' => 'isMessage', 'required' => true),
			'name' =>			array('type' => self::TYPE_STRING, 'validate' => 'isMessage', 'required' => true),
			'date_add' =>		array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
			'date_upd' =>		array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
			'id_shop' =>		array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'default' =>        array('type' => self::TYPE_BOOL, 'validate' => 'isUnsignedId'),
		)
	);
	public static function getCustomWishlist($id_customer=0)
	{
		return  Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_wishlist`
			WHERE `id_shop`='.(int)Context::getContext()->shop->id.
            ($id_customer ? ' AND `id_customer`='.(int)$id_customer:'').'
            ORDER BY `id_customer` ASC, `name` ASC'
            );
	}
    
    public static function getWishlistProducts($id_st_wishlist=0, $id_product=0)
    {
        return  Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_wishlist_product`
			WHERE `id_st_wishlist`='.(int)$id_st_wishlist.
            ($id_product ? ' AND `id_product`='.(int)$id_product : '')
            );
    }
    
    public static function getAllProducts($id_customer=0, $total=false)
    {
        return Db::getInstance()->executeS('SELECT '.($total ? 'COUNT(0)' : '*').' FROM `'._DB_PREFIX_.'st_wishlist_product` sp
            LEFT JOIN `'._DB_PREFIX_.'st_wishlist` s
            ON (s.`id_st_wishlist`=sp.`id_st_wishlist`)
            WHERE s.`id_shop`= '.(int)Context::getContext()->shop->id.'
            AND s.`id_customer`='.(int)$id_customer.'
            AND sp.`id_product` > 0
            ');
    }
    
    public function delete()
	{
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_wishlist_email` WHERE `id_st_wishlist` = '.(int)($this->id));
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_wishlist_product` WHERE `id_st_wishlist` = '.(int)($this->id));
		if ($this->default)
		{
			$result = Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'st_wishlist` WHERE `id_customer` = '.(int)$this->id_customer.' AND `id_st_wishlist` != '.(int)$this->id.' LIMIT 1');
			foreach ($result as $res)
				Db::getInstance()->update('st_wishlist', array('default' => '1'), 'id_st_wishlist = '.(int)$res['id_st_wishlist']);
		}
		if (isset($this->context->cookie->id_st_wishlist))
			unset($this->context->cookie->id_st_wishlist);

		return (parent::delete());
	}

	public static function isExistsByNameForUser($name)
	{
		$context = Context::getContext();
		return Db::getInstance()->getValue('
			SELECT COUNT(*) AS total
			FROM `'._DB_PREFIX_.'st_wishlist`
			WHERE `name` = \''.pSQL($name).'\'
				AND `id_customer` = '.(int)$context->customer->id.'
                AND  `id_shop` = '.(int)$context->shop->id
		);
	}

	/**
	 * Return true if wishlist exists else false
	 *
	 *  @return boolean exists
	 */
	public static function exists($id_st_wishlist, $id_customer)
	{
		$result = Db::getInstance()->getValue('
		SELECT COUNT(0)
        FROM `'._DB_PREFIX_.'st_wishlist`
		WHERE `id_st_wishlist` = '.(int)($id_st_wishlist).'
		AND `id_customer` = '.(int)($id_customer).'
		AND `id_shop` = '.(int)Context::getContext()->shop->id);
		return $result > 0;
	}

	/**
	 * Get ID wishlist by Token
	 *
	 * @return array Results
	 */
	public static function getByToken($token)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
		SELECT w.`id_st_wishlist`, w.`name`, w.`id_customer`, c.`firstname`, c.`lastname`
		  FROM `'._DB_PREFIX_.'st_wishlist` w
		INNER JOIN `'._DB_PREFIX_.'customer` c ON c.`id_customer` = w.`id_customer`
		WHERE `token` = \''.pSQL($token).'\'');
	}

	/**
	 * Get Wishlists by Customer ID
	 *
	 * @return array Results
	 */
	public static function getByIdCustomer($id_customer, $with_product=false, $id_st_wishlist=0)
	{
		$id_shop = (int)Context::getContext()->shop->id;
		$result = Db::getInstance()->executeS('
		SELECT *
		FROM `'._DB_PREFIX_.'st_wishlist`
		WHERE `id_customer` = '.(int)($id_customer).'
		AND `id_shop` = '.$id_shop.'
        '.($id_st_wishlist ? ' AND `id_st_wishlist`='.(int)$id_st_wishlist : '').'
		ORDER BY `name` ASC');
        if ($with_product) {
            foreach($result AS &$value) {
                $value['products'] = self::getProductsByIdWishlist($value['id_st_wishlist']);
                $value['total'] = isset($value['products']) ? count($value['products']) : 0;
            }
        }
		return $result;
	}

	/**
	 * Get Wishlists number products by Customer ID
	 *
	 * @return array Results
	 */
	public static function getInfosByIdCustomer($id_customer)
	{
		return (Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT SUM(wp.`quantity`) AS nbProducts, wp.`id_st_wishlist`
		  FROM `'._DB_PREFIX_.'st_wishlist_product` wp
		INNER JOIN `'._DB_PREFIX_.'st_wishlist` w ON (w.`id_st_wishlist` = wp.`id_st_wishlist`)
		WHERE w.`id_customer` = '.(int)($id_customer).'
		AND w.`id_shop` = '.(int)Context::getContext()->shop->id.'
		GROUP BY w.`id_st_wishlist`
		ORDER BY w.`name` ASC'));
	}
    
    /**
	 * Get Wishlists products by Customer ID
	 *
	 * @return array Results
	 */
	public static function getProductsByIdWishlist($id_st_wishlist)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT *
        FROM `'._DB_PREFIX_.'st_wishlist_product`
		WHERE `id_product` > 0
        AND `id_st_wishlist` = '.(int)$id_st_wishlist
        );
	}

	/**
	 * Add product to ID wishlist
	 *
	 * @return boolean succeed
	 */
	public static function addProduct($id_st_wishlist, $id_customer, $id_product, $id_product_attribute, $quantity)
	{
	    if (!$id_product) {
	       return false;
	    }
		$result = Db::getInstance()->getRow('
		SELECT wp.`quantity`
		  FROM `'._DB_PREFIX_.'st_wishlist_product` wp
		JOIN `'._DB_PREFIX_.'st_wishlist` w ON (w.`id_st_wishlist` = wp.`id_st_wishlist`)
		WHERE wp.`id_st_wishlist` = '.(int)($id_st_wishlist).'
		AND w.`id_customer` = '.(int)($id_customer).'
		AND wp.`id_product` = '.(int)($id_product).'
		AND wp.`id_product_attribute` = '.(int)($id_product_attribute));
		if ($result)
		{
			if (($result['quantity'] + $quantity) <= 0)
				return StWishListClass::removeProduct($id_st_wishlist, $id_product, $id_product_attribute);
			else
				return Db::getInstance()->execute('
				UPDATE `'._DB_PREFIX_.'st_wishlist_product` SET
				`quantity` = '.(int)($quantity + $result['quantity']).'
				WHERE `id_st_wishlist` = '.(int)($id_st_wishlist).'
				AND `id_product` = '.(int)($id_product).'
				AND `id_product_attribute` = '.(int)($id_product_attribute));
		}
		else
			return Db::getInstance()->execute('
			INSERT INTO `'._DB_PREFIX_.'st_wishlist_product` (`id_st_wishlist`, `id_product`, `id_product_attribute`, `quantity`) VALUES(
			'.(int)($id_st_wishlist).',
			'.(int)($id_product).',
			'.(int)($id_product_attribute).',
			'.(int)($quantity).')');

	}

	/**
	 * Update product to wishlist
	 *
	 * @return boolean succeed
	 */
	public static function updateProduct($id_st_wishlist, $id_product, $id_product_attribute, $quantity)
	{
	    $quantity = (int)$quantity;
	    if ($quantity <= 0) {
	       return self::removeProduct($id_st_wishlist, $id_product, $id_product_attribute);
	    }
		return Db::getInstance()->execute('
		UPDATE `'._DB_PREFIX_.'st_wishlist_product` SET
		`quantity` = '.(int)($quantity).'
		WHERE `id_st_wishlist` = '.(int)($id_st_wishlist).'
		AND `id_product` = '.(int)($id_product).'
		AND `id_product_attribute` = '.(int)($id_product_attribute));
	}

	/**
	 * Remove product from wishlist
	 *
	 * @return boolean succeed
	 */
	public static function removeProduct($id_st_wishlist, $id_product, $id_product_attribute)
	{
		return Db::getInstance()->execute('
		DELETE FROM `'._DB_PREFIX_.'st_wishlist_product`
		WHERE `id_st_wishlist` = '.(int)($id_st_wishlist).'
		AND `id_product` = '.(int)($id_product).'
		AND `id_product_attribute` = '.(int)($id_product_attribute)
		);
	}

	/**
	 * Add email to wishlist
	 *
	 * @return boolean succeed
	 */
	public static function addEmail($id_st_wishlist, $email)
	{
		if (!Validate::isUnsignedId($id_st_wishlist) OR empty($email) OR !Validate::isEmail($email))
			return false;
		return Db::getInstance()->execute('
		INSERT INTO `'._DB_PREFIX_.'st_wishlist_email` (`id_st_wishlist`, `email`, `date_add`) VALUES(
		'.(int)($id_st_wishlist).',
		\''.pSQL($email).'\',
		\''.pSQL(date('Y-m-d H:i:s')).'\')');
	}

	/**
	 * Get email from wishlist
	 *
	 * @return Array results
	 */
	public static function getEmail($id_st_wishlist, $id_customer)
	{
		return (Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT we.`email`, we.`date_add`
		  FROM `'._DB_PREFIX_.'st_wishlist_email` we
		INNER JOIN `'._DB_PREFIX_.'st_wishlist` w ON w.`id_st_wishlist` = we.`id_st_wishlist`
		WHERE we.`id_st_wishlist` = '.(int)($id_st_wishlist).'
		AND w.`id_customer` = '.(int)($id_customer)));
	}

	/**
	* Return if there is a default already set
	*
	* @return boolean
	*/
	public static function isDefault($id_customer)
	{
		return (Bool)Db::getInstance()->getValue('SELECT * FROM `'._DB_PREFIX_.'st_wishlist` WHERE `id_customer` = '.(int)$id_customer.' AND `default` = 1');
	}

	public static function getDefault($id_customer)
	{
		return Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'st_wishlist` WHERE `id_customer` = '.(int)$id_customer.' AND `default` = 1');
	}

	/**
	* Set current WishList as default
	*
	* @return boolean
	*/
	public function setDefault()
	{
		if ($default = $this->getDefault($this->id_customer))
			Db::getInstance()->update('st_wishlist', array('default' => '0'), 'id_st_wishlist = '.$default['id_st_wishlist']);

		return Db::getInstance()->update('st_wishlist', array('default' => '1'), 'id_st_wishlist = '.$this->id);
	}
}