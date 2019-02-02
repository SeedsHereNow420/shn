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

class StVideoClass extends ObjectModel
{
	/** @var integer id*/
	public $id;
    /** @var integer */
    public $type;
	/** @var string */
    public $url;
	/** @var integer */
    public $ratio;
     /** @var integer */
    public $location;
	/** @var integer */
    public $id_category;
    /** @var integer */
    public $id_manufacturer;
	/** @var integer */
	public $active;
	/** @var string */
	public $id_products;
	/** @var boolen */
	public $hide_on_mobile;
    /** @var string */
	public $title;
    /** @var string */
	public $content;
    /** @var integer */
    public $video_position;
    
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_video',
		'primary'   => 'id_st_video',
        'multilang' => true,
		'fields'    => array(
			'url'                  =>	array('type' => self::TYPE_STRING, 'validate' => 'isAnything', 'size' => 512),
			'ratio'                =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'type'                 =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'location'             =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_category'          =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_manufacturer'      =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_products'          =>	array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
			'active'               =>	array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),		
            'hide_on_mobile'       =>   array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'video_position'       =>	array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            
            'title'                => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName'),
            'content'              => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isAnything'),
		)
	);
    
    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, $id_shop);
    }
    
    public static function getAll($type = 0, $id_lang=null, $active=0)
	{
        Shop::addTableAssociation('st_video', array('type' => 'shop'));
        $id_lang || $id_lang = Context::getContext()->language->id;
		return  Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_video` v
            LEFT JOIN `'._DB_PREFIX_.'st_video_lang` vl
            ON (v.`id_st_video`=vl.`id_st_video` AND vl.`id_lang`='.(int)$id_lang.')
			'.Shop::addSqlAssociation('st_video', 'v').
            'WHERE `type`='.(int)$type.
            ($active ? ' AND v.`active`=1':'')
            );
	}
    
    public static function getByIdProduct($id_product = 0, $type=0, $active = 0)
    {
        return Db::getInstance()->getRow('SELECT v.*
            FROM `'._DB_PREFIX_.'st_video` v
            LEFT JOIN `'._DB_PREFIX_.'st_video_shop` vs ON (v.`id_st_video` = vs.`id_st_video`)
			WHERE v.`type`='.(int)$type.'
            AND vs.`id_shop` = '.(int)Context::getContext()->shop->id.
            ($active ? ' AND v.`active`=1 ' : '').'
            AND v.id_products LIKE "%,'.(int)$id_product.',%"
        ');
    }
    
    public static function changeProductVideo($id_product = 0, $url='', $type=0)
    {
        if (!$id_product) {
            return false;
        }
        $url = trim($url);
        if ($row = self::getByIdProduct($id_product, (int)$type)) {
            $id_products = str_replace(','.$id_product, '', $row['id_products']);
            $video = new StVideoClass($row['id_st_video']);
            if (!trim($id_products,',')) {
                if (!$url) {
                    $video->delete();
                    return 0;
                } else {
                    $video->url = pSQL($url);
                    $video->id_products = ','.(int)$id_product.',';
                    $video->save();
                    return $video->id;
                }
            } elseif (trim($id_products,',')) {
                // Else modify data.
                $video->id_products = $id_products;
                $video->save();
                return $video->id;
            }
            if ($url) {
                $video = new StVideoClass;
                $video->url = pSQL($url);
                $video->ratio = 1;
                $video->type = (int)$type;
                $video->location = 1;
                $video->id_products = ','.(int)$id_product.',';
                $video->active = 1;
                $video->save();
                return $video->id;
            }
        } elseif ($url) {
            $video = new StVideoClass;
            $video->url = pSQL($url);
            $video->type = (int)$type;
            $video->ratio = 1;
            $video->location = 1;
            $video->id_products = ','.(int)$id_product.',';
            $video->active = 1;
            $video->save();
            return $video->id;
        }
    }
    
    public static function getForProduct($id_product=0, $type=0, $id_lang=null)
    {
        if (!$id_product) {
            return false;
        }
        Shop::addTableAssociation('st_video', array('type' => 'shop'));
        $id_lang || $id_lang = Context::getContext()->language->id;
        $where = '';
        $product = new Product($id_product);
        if ($product->id_manufacturer)
            $where .= ' OR (v.`location` = 3 AND (v.`id_manufacturer` = 0 OR v.`id_manufacturer`='.(int)$product->id_manufacturer.'))';
        if($cates = $product->getCategories())
            $where .= ' OR (v.`location` = 2 AND (v.`id_category` = 0 OR v.`id_category` IN('.implode(',', $cates).')))';
        if ($product->id)
            $where .= ' OR (v.`location` = 1 AND (v.`id_products` LIKE "%,'.(int)$product->id.',%"))';
        
        $result = Db::getInstance()->executeS('SELECT v.*,vl.*
            FROM `'._DB_PREFIX_.'st_video` v
            LEFT JOIN `'._DB_PREFIX_.'st_video_lang` vl
            ON (v.`id_st_video`=vl.`id_st_video` AND vl.`id_lang`='.(int)$id_lang.')
            '.Shop::addSqlAssociation('st_video', 'v').'
			WHERE v.`type` = '.(int)$type.'
            AND v.`active`=1 
            AND (v.`location` = 0 '.$where.')
        ');
        return $result;
    }
    
    public static function deleteByIdCategory($id_category=0) 
    {
        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_video` WHERE `id_category`='.(int)$id_category);
    }
    
    public static function deleteByIdtManufacturer($id_manufacturer=0) 
    {
        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_video` WHERE `id_manufacturer`='.(int)$id_manufacturer);
    }
    
    public function clearShopIds()
    {
        if ($this->id) {
            return Db::getInstance()->delete($this->table.'_shop', '`'.bqSQL($this->identifier).'` = '.(int)$this->id);
        }
    }
    
    public function getShopIds()
    {
        $result =array();
        if ($this->id) {
            $result = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.$this->table.'_shop WHERE `'.bqSQL($this->identifier).'` = '.(int)$this->id);
        }
        return $result;
    }
    
    public function restoreShopIds($data = array())
    {
        if ($data && count($data) > 0 && $this->id) {
            Db::getInstance()->insert($this->table.'_shop', $data);
        }
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
}