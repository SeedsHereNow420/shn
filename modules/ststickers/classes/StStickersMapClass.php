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

class StStickersMapClass extends ObjectModel
{
	/** @var integer id*/
	public $id;
    /** @var integer*/
    public $id_st_sticker;
    /** @var integer */
    public $location;
    /** @var integer */
    public $id_category;
    /** @var integer */
    public $id_manufacturer;
    /** @var string */
    public $id_products;
    /** @var integer */
	public $active;
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_sticker_map',
		'primary'   => 'id_st_sticker_map',
		'fields'    => array(
			'id_st_sticker'        =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
            'location'             =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'id_category'          =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_manufacturer'      =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_products'          =>   array('type' => self::TYPE_STRING, 'size' => 512),
            'active'               =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
		)
	);
    
	public static function getAll($id_lang=0, $active=0)
	{
	    if (!$id_lang) {
	       $id_lang = Context::getContext()->language->id;
	    }
		$result = Db::getInstance()->executeS('
			SELECT s.*,sm.*, sl.*
            '.($active ? ',IF(image_multi_lang<>"" && !ISNULL(image_multi_lang), image_multi_lang, image_lang_default) AS image_multi_lang' :'').'
			FROM `'._DB_PREFIX_.'st_sticker_map` sm
            LEFT JOIN `'._DB_PREFIX_.'st_sticker` s ON (sm.`id_st_sticker` = s.`id_st_sticker`)
			LEFT JOIN `'._DB_PREFIX_.'st_sticker_lang` sl ON (s.`id_st_sticker` = sl.`id_st_sticker` AND sl.`id_lang` = '.(int)$id_lang.')
            LEFT JOIN `'._DB_PREFIX_.'st_sticker_shop` ss ON (s.`id_st_sticker` = ss.`id_st_sticker`)
			WHERE ss.`id_shop` = '.(int)Context::getContext()->shop->id.
            ($active ? ' AND s.`active`=1 ' : '').'
            ORDER BY sm.`id_st_sticker`
            ');
        return $result;
	}
    
    public static function getByProductId($id_product = 0, $id_st_sticker = 0) {
        if (!$id_product || !$id_st_sticker) {
            return false;
        }
        return Db::getInstance()->getRow('SELECT * from `'._DB_PREFIX_.'st_sticker_map`
        WHERE location=1 AND id_products LIKE "%,'.(int)$id_product.',%" AND id_st_sticker='.(int)$id_st_sticker);
    }
    
    public static function changeProductSticker($id_st_sticker = 0, $id_product = 0, $id_st_sticker_map = 0)
    {
        if (!$id_st_sticker || !$id_product) {
            return false;
        }
        
        // Remove product ID.
        if ($id_st_sticker_map) {
            $sticker = new StStickersMapClass((int)$id_st_sticker_map);
            $sticker->id_products = str_replace(','.$id_product, '', $sticker->id_products);
            if (!trim($sticker->id_products, ',')) {
                $sticker->delete();
            } else {
                $sticker->save();    
            }
            return 0;
        }
        
        // Add Product ID.
        if (!$row = self::getByProductId($id_product, $id_st_sticker)) {
            
            $row = Db::getInstance()->getRow('SELECT * from `'._DB_PREFIX_.'st_sticker_map`
                WHERE location=1 AND id_st_sticker='.(int)$id_st_sticker);
            if ($row) {
                $id_products = trim($row['id_products'], ',');
                $sticker = new StStickersMapClass($row['id_st_sticker_map']);
                $sticker->id_products = ','.$id_products.','.$id_product.',';
                $sticker->save();
                return $sticker->id;
            } else {
                $sticker = new StStickersMapClass;
                $sticker->id_st_sticker = (int)$id_st_sticker;
                $sticker->location = 1;
                $sticker->id_products = ','.(int)$id_product.',';
                $sticker->save();
                return $sticker->id;    
            }
        } 
        return $row['id_st_sticker_map'];
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
    
    public static function getForProduct($id_product=0)
    {
        if (!$id_product) {
            return false;
        }

        $where = 'location = 0';
        $product = new Product($id_product);
        if ($product->id_manufacturer)
            $where .= ' OR (location = 3 AND (id_manufacturer = 0 OR id_manufacturer='.(int)$product->id_manufacturer.'))';
        if($cates = $product->getCategories())
            $where .= ' OR (location = 2 AND (id_category = 0 OR id_category IN('.implode(',', $cates).')))';
        if ($product->id)
            $where .= ' OR (location = 1 AND (id_products LIKE "%,'.(int)$product->id.',%"))';
        $result = Db::getInstance()->executeS('SELECT id_st_sticker FROM `'._DB_PREFIX_.'st_sticker_map`
            WHERE '.$where.'
        '); 
        $id_st_sticker = array();
        foreach($result AS $value) {
            $id_st_sticker[$value['id_st_sticker']] = $value['id_st_sticker'];
        }
        return count($id_st_sticker) ? StStickersClass::getAll(0, 1, 0, implode(',',$id_st_sticker)) : false;
    }
}