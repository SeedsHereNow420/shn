<?php
/*
* 2007-2014 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class StFeaturedCategoriesClass extends ObjectModel
{
	/** @var integer banner id*/
	public $id;
	public $id_parent;
	public $id_shop;
	public $level_depth;
	public $id_category;
	public $position;
	public $active;
	public $txt_color;
	public $txt_color_over;
	public $auto_sub;
	public $cover;
    
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_featured_category',
		'primary'   => 'id_st_featured_category',
		'fields' => array(
			'id_parent'       => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'id_shop'         => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
			'level_depth'     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
			'id_category'     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'position'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'active'          => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'txt_color_over'  => array('type' => self::TYPE_STRING, 'size' => 7),
			'txt_color'       => array('type' => self::TYPE_STRING, 'size' => 7),
			'auto_sub'        => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
			'cover'           => array('type' => self::TYPE_STRING, 'size' => 255),
		)
	);

    public function delete()
    {
        $subs = self::getSub($this->id);
        if($subs && count($subs))
            foreach($subs AS $sub)
            {
                $cat = new StFeaturedCategoriesClass($sub['id_st_featured_category']);
                $cat->delete();    
            }
        
		return parent::delete();
    }

    public static function getById($id_st_featured_category, $id_shop = null)
    {            
        if (!$id_shop)
            $id_shop = (int)Shop::getContextShopID();
        
        return Db::getInstance()->getRow('
            SELECT *
            FROM `'._DB_PREFIX_.'st_featured_category`
            WHERE `id_st_featured_category`='.(int)$id_st_featured_category.
            ($id_shop?' AND `id_shop`='.(int)$id_shop:'')
        );
    }
	
    public static function getSub($id_parent,$active = 0,$id_shop = null, $id_lang =  null)
    {
        if (!$id_shop)
            $id_shop = (int)Shop::getContextShopID();
        if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
        return Db::getInstance()->executeS('
            SELECT DISTINCT(fc.`id_st_featured_category`), fc.*, cl.`name`, cl.`link_rewrite`
            FROM `'._DB_PREFIX_.'st_featured_category` fc
            LEFT JOIN `'._DB_PREFIX_.'category` c ON (fc.`id_category` = c.`id_category`)
			LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON (fc.`id_category` = cl.`id_category` AND cl.`id_lang`='.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').')
            WHERE fc.`id_parent`='.(int)$id_parent.
            ($id_shop ?' AND fc.`id_shop`='.(int)$id_shop:'').
            ($active ? ' AND fc.`active`=1 ' : '').'
            ORDER BY fc.`position`');
    }
    
    private static function buildingCateLink(&$array, $withImage = 0)
    {
        if (!$array)
            return false;
        $context = Context::getContext();
        $category = Category::getCategoryInformations((array)$array['id_category']);
        $array['link'] = $context->link->getCategoryLink((int)$array['id_category'], $category[(int)$array['id_category']]['link_rewrite']);
        $array['name'] = $category[(int)$array['id_category']]['name'];
        
        if ($withImage)
        {
            $imageSize = Image::getSize(ImageType::getFormattedName('category'));
            $array['image'] = '<img src="'.$context->link->getCatImageLink($category[(int)$array['id_category']]['link_rewrite'], $id_image, 'category_default').'" alt="'.$array['name'].'" width="'.$imageSize['width'].'" height="'.$imageSize['height'].'" />';           
        }
    }
    
    public static function getTopParent($id_st_featured_category)
    {
        $category = new StFeaturedCategoriesClass($id_st_featured_category);
        if($category->id_parent)
            return StFeaturedCategoriesClass::getTopParent($category->id_parent);
        else
            return $id_st_featured_category;
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
    
    public function troggleStatus()
    {
        if (!$this->id)
            return false;
        return  Db::getInstance()->execute('
        UPDATE '._DB_PREFIX_.'st_featured_category
        SET `active` = !`active`
        WHERE `id_st_featured_category` = '.(int)$this->id.'
        ');
    }
    
    public static function getAll($active=1,$id_shop=null)
    {
        return self::getSub(0, $active, $id_shop);
    }
    public static function getMaximumPosition($id_parent)
    {
        $maximum = Db::getInstance()->getValue('
            SELECT `position`
            FROM `'._DB_PREFIX_.'st_featured_category`
            WHERE `id_parent` = '.$id_parent.'
            AND `id_shop` = '.(int)Shop::getContextShopID().'
            ORDER BY position DESC');
         return (int)$maximum + 1;
    }
    public function updatePosition($way, $position)
	{
		if (!$res = Db::getInstance()->executeS('
			SELECT `id_st_featured_category`, `position`, `id_parent`
			FROM `'._DB_PREFIX_.'st_featured_category`
			WHERE `id_parent` = '.(int)$this->id_parent.'
            AND `id_shop` = '.(int)Shop::getContextShopID().'
			ORDER BY `position` ASC'
		))
			return false;

		foreach ($res as $cate)
			if ((int)$cate['id_st_featured_category'] == (int)$this->id)
				$moved_cate = $cate;

		if (!isset($moved_cate) || !isset($position))
			return false;

		return (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_featured_category`
			SET `position`= `position` '.($way ? '- 1' : '+ 1').'
			WHERE `position`
			'.($way
				? '> '.(int)$moved_cate['position'].' AND `position` <= '.(int)$position
				: '< '.(int)$moved_cate['position'].' AND `position` >= '.(int)$position).'
            AND `id_shop` = '.(int)Shop::getContextShopID().'
			AND `id_parent`='.(int)$moved_cate['id_parent'])
		&& Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_featured_category`
			SET `position` = '.(int)$position.'
			WHERE `id_st_featured_category` = '.(int)$moved_cate['id_st_featured_category']));
	}
    
    public function clearPosition()
    {
        $res = Db::getInstance()->executeS('
        SELECT `id_st_featured_category` FROM `'._DB_PREFIX_.'st_featured_category`
        WHERE `id_parent` = '.(int)$this->id_parent.'
        AND `id_shop` = '.(int)Shop::getContextShopID().'
        ORDER BY `position` ASC
        ');
        foreach($res AS $key => $value)
            Db::getInstance()->execute('
            UPDATE `'._DB_PREFIX_.'st_featured_category`
			SET `position`= '.(int)$key.'
			WHERE `id_st_featured_category` = '.(int)$value['id_st_featured_category'].'
            ');
    }
}