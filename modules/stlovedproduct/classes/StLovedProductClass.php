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

class StLovedProductClass extends ObjectModel 
{
    /** @var integer Wishlist ID */
	public $id;
    
    /** @var integer Type */
	public $type;
    
	/** @var integer Customer ID */
	public $id_customer;
    
    /** @var integer Source ID */
	public $id_source;
    
    /** @var string Object last modification date */
	public $id_shop;
    
    /** @var integer Loved count */
    public $loved_count;
    
    /** @var string Object creation date */
	public $date_upd;

	/** @var string Object creation date */
	public $date_add;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'st_loved_product',
		'primary' => 'id_st_loved_product',
		'fields' => array(
            'type' =>           array('type' => self::TYPE_BOOL, 'validate' => 'isUnsignedId'),
			'id_customer' =>	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'id_source' =>     array('type' => self::TYPE_BOOL, 'validate' => 'isUnsignedId'),
			'id_shop' =>		array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'loved_count' =>	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'date_upd' =>		array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
			'date_add' =>		array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
		)
	);
    
    public static function getLovedProducts($id_source=0, $type=1)
    {
        return  Db::getInstance()->executeS('
			SELECT *,SUM(loved_count) total
			FROM `'._DB_PREFIX_.'st_loved_product`
			WHERE `type`='.(int)$type.'
            AND `id_shop`='.(int)Context::getContext()->shop->id.'
            '.($id_source ? ' AND `id_source`='.(int)$id_source : '').'
            GROUP BY `id_source`
            ORDER BY total DESC'
            );
    }
    
    /** 
     * Update count on backoffice.
    */
    public static function updateCount($id_source=0, $count=0, $id_shop=0, $id_customer=0, $type=1)
    {
        if (!$id_shop) {
            $id_shop = (int)Context::getContext()->shop->id;
        }
        $custom_count = Db::getInstance()->getValue('SELECT SUM(loved_count)
            FROM `'._DB_PREFIX_.'st_loved_product`
            WHERE `type`='.(int)$type.'
            AND `id_source` = '.(int)$id_source.'
            AND `id_customer` > 0
            AND `id_shop` = '.(int)$id_shop.' 
            ');
        if ($custom_count > 0) {
            $count = (int)$count-(int)$custom_count;
        }
        if ($count <= 0) {
            $count = 0;
        }
        if (self::exists($id_source, $id_customer, $type)) {
            return Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'st_loved_product`
                SET `loved_count` = '.(int)$count.', `date_upd` = \''.pSQL(date('Y-m-d H:i:s')).'\'
                WHERE `type`='.(int)$type.'
                AND `id_source` = '.(int)$id_source.'
                AND `id_customer` = '.(int)$id_customer.'
                AND `id_shop` = '.(int)$id_shop.'
                ');
        }
        return Db::getInstance()->execute('
    		INSERT INTO `'._DB_PREFIX_.'st_loved_product`(`type`,`id_customer`, `id_source`, `id_shop`, `loved_count`, `date_upd`, `date_add`) VALUES(
    		'.(int)$type.',
            '.(int)$id_customer.',
    		'.(int)$id_source.',
            '.(int)$id_shop.',
            '.(int)$count.',
            \''.pSQL(date('Y-m-d H:i:s')).'\',
    		\''.pSQL(date('Y-m-d H:i:s')).'\')');
    }
    
    public static function getMyLoved($id_customer=0, $nbr = 6, $type=1)
    {
        return  Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_loved_product`
			WHERE `type`='.(int)$type.'
            AND `id_shop`='.(int)Context::getContext()->shop->id.'
            AND `id_customer`='.(int)$id_customer.'
            ORDER BY date_add DESC
            '.($nbr ? ' LIMIT '.(int)$nbr : '')
            );
    }

	public static function getTotal($id_source=0, $type=1)
	{
		return Db::getInstance()->getValue('
			SELECT SUM(loved_count) AS total
			FROM `'._DB_PREFIX_.'st_loved_product`
			WHERE `type`='.(int)$type.'
            AND `id_source` = '.(int)$id_source.'
            AND `id_shop` = '.(int)Context::getContext()->shop->id
		);
	}
    
    public static function getOne($id_source, $id_customer, $type=1)
    {
        return Db::getInstance()->getRow('
    		SELECT *
            FROM `'._DB_PREFIX_.'st_loved_product`
    		WHERE `type`='.(int)$type.'
            AND `id_source` = '.(int)$id_source.'
    		AND `id_customer` = '.(int)$id_customer.'
    		AND `id_shop` = '.(int)Context::getContext()->shop->id);
    }

	/**
	 * Return true if wishlist exists else false
	 *
	 *  @return boolean exists
	 */
	public static function exists($id_source, $id_customer, $type=1)
	{
		$result = Db::getInstance()->getValue('
    		SELECT COUNT(0)
            FROM `'._DB_PREFIX_.'st_loved_product`
    		WHERE `type`='.(int)$type.'
            AND `id_source` = '.(int)$id_source.'
    		AND `id_customer` = '.(int)$id_customer.'
    		AND `id_shop` = '.(int)Context::getContext()->shop->id);
		return $result > 0;
	}
    
    /**
	* Update product liked
	*
	* @return boolean
	*/
    public static function updateProduct($id_source, $id_customer, $type=1)
    {
        return Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'st_loved_product`
            SET `loved_count` = `loved_count`+1, `date_upd` = \''.pSQL(date('Y-m-d H:i:s')).'\'
            WHERE `type`='.(int)$type.'
            AND `id_source` = '.(int)$id_source.'
            AND `id_customer` = '.(int)$id_customer.'
            AND `id_shop` = '.(int)Context::getContext()->shop->id.'
            ');
    }
    
    /**
	* Add product liked
	*
	* @return boolean
	*/
    public static function AddProduct($id_source, $id_customer, $unloveable=0, $type=1)
    {
        if (self::exists($id_source, $id_customer, $type)) {
            if ($unloveable) {
                return self::DeleteProduct($id_source, $id_customer, $type);
            } else {
                return true;
            }
        }
        return Db::getInstance()->execute('
    		INSERT INTO `'._DB_PREFIX_.'st_loved_product`(`type`,`id_customer`, `id_source`, `id_shop`, `date_upd`, `date_add`) VALUES(
    		'.(int)$type.',
            '.(int)$id_customer.',
    		'.(int)$id_source.',
            '.(int)Context::getContext()->shop->id.',
            \''.pSQL(date('Y-m-d H:i:s')).'\',
    		\''.pSQL(date('Y-m-d H:i:s')).'\')');
    }
    
    /**
	* Add product liked
	*
	* @return boolean
	*/
    public static function DeleteProduct($id_source, $id_customer, $type=1)
    {
        if (!self::exists($id_source, $id_customer, $type)) {
            return true;
        }
        return Db::getInstance()->execute('
    		DELETE FROM `'._DB_PREFIX_.'st_loved_product`
            WHERE `type`='.(int)$type.'
            AND `id_customer`='.(int)$id_customer.'
    		AND `id_source`='.(int)$id_source.'
            AND `id_shop`='.(int)Context::getContext()->shop->id);
    }
}