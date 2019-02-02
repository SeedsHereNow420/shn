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

class StBlogCategory extends ObjectModel
{
	public $id;

	/** @var integer StBlogCategory ID */
	public $id_st_blog_category;

	/** @var string Name */
	public $name;

	/** @var boolean Status for display */
	public $active = 1;

	/** @var string Description */
	public $description;

	/** @var integer Parent StBlogCategory ID */
	public $id_parent;
    
    /** @var string path */
    public $path;
    
    /** @var integer nleft */
    public $nleft;
    
    /** @var integer nright */
    public $nright;
    
    /** @var boolean Default Shop Flag */
    public $is_root_category = 0;
    
    /** @var integer position */
    public $position = 0;

	/** @var integer Parents number */
	public $level_depth;

	/** @var string string used in rewrited URL */
	public $link_rewrite;

	/** @var string Meta title */
	public $meta_title;

	/** @var string Meta keywords */
	public $meta_keywords;

	/** @var string Meta description */
	public $meta_description;

	/** @var string Object creation date */
	public $date_add;

	/** @var string Object last modification date */
	public $date_upd;

	protected static $_links = array();

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'st_blog_category',
		'primary' => 'id_st_blog_category',
		'multilang' => true,
		'fields' => array(
			'active' => 			array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
			'id_parent' => 			array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'is_root_category' => 	array('type' => self::TYPE_BOOL),
			'position' => 			array('type' => self::TYPE_INT),
			'level_depth' => 		array('type' => self::TYPE_INT),
            'path' =>       		array('type' => self::TYPE_STRING),
            'nleft' =>       		array('type' => self::TYPE_INT),
            'nright' =>       		array('type' => self::TYPE_INT),
			'date_add' => 			array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
			'date_upd' => 			array('type' => self::TYPE_DATE, 'validate' => 'isDate'),

			// Lang fields
			'name' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCatalogName', 'required' => true, 'size' => 128),
			'link_rewrite' => 		array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isLinkRewrite', 'required' => true, 'size' => 128),
			'description' => 		array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),
			'meta_title' => 		array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 128),
			'meta_description' => 	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
			'meta_keywords' => 		array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
		),
	);


    public function __construct($id = null, $id_lang = null, $id_shop = null)
	{
        Shop::addTableAssociation('st_blog', array('type' => 'shop'));
        Shop::addTableAssociation('st_blog_category', array('type' => 'shop'));
		parent::__construct($id, $id_lang, $id_shop);
    }
    
	public	function add($autodate = true, $null_values = false)
	{
		$this->position = (int)StBlogCategory::getLastPosition((int)$this->id_parent);
		$this->level_depth = $this->calcLevelDepth();
		foreach ($this->name as $k => $value)
			if (preg_match('/^[1-9]\./', $value))
				$this->name[$k] = '0'.$value;
		$ret = parent::add($autodate, $null_values);
		$this->cleanPositions($this->id_parent);
        $this->updatePath();
		return $ret;
	}

	public	function update($null_values = false)
	{
		$this->level_depth = $this->calcLevelDepth();
		foreach ($this->name as $k => $value)
			if (preg_match('/^[1-9]\./', $value))
				$this->name[$k] = '0'.$value;
		$ret = parent::update($null_values);
        $this->updatePath();
        return $ret;
	}
    
    public function setDefaultCol()
    {
        if (Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP)
            $this->is_default = 0;
        return true;
    }
	public static function recurseStBlogCategory($categories, $id_selected = 0)
	{
	    $html = '';
        
        foreach($categories AS $categorie)
        {
            $html .= '<option value="'.$categorie['id_st_blog_category'].'"'.(($id_selected == $categorie['id_st_blog_category']) ? ' selected="selected"' : '').'>'
			.str_repeat('&nbsp;', ($categorie['level_depth']-1) * 5)
			.StBlogCategory::hideStBlogCategoryPosition(stripslashes($categorie['name'])).'</option>';
            if (!empty($categorie['child']))
                $html .= StBlogCategory::recurseStBlogCategory($categorie['child'], $id_selected);
        }
		return $html;
	}
    
    public function recurseLiteCategTree($max_depth = 3, $current_depth = 0, $id_lang = null, $excluded_ids_array = null)
	{
		$id_lang = is_null($id_lang) ? Context::getContext()->language->id : (int)$id_lang;

		$children = array();
		$subcats = $this->getSubCategories($id_lang, true);
		if (($max_depth == 0 || $current_depth < $max_depth) && $subcats && count($subcats))
			foreach ($subcats as &$subcat)
			{
				if (!$subcat['id_st_blog_category'])
					break;
				else if (!is_array($excluded_ids_array) || !in_array($subcat['id_st_blog_category'], $excluded_ids_array))
				{
					$categ = new StBlogCategory($subcat['id_st_blog_category'], $id_lang);
					$children[] = $categ->recurseLiteCategTree($max_depth, $current_depth + 1, $id_lang, $excluded_ids_array);
				}
			}
			
		return array(
			'id' => (int)$this->id,
			'link' => Context::getContext()->link->getModuleLink('stblog','category',array('id_st_blog_category'=>$this->id,'rewrite'=>$this->link_rewrite)),
			'name' => $this->name,
			'children' => $children
		);
	}

	/**
	  * Recursively add specified StBlogCategory childs to $id_array array
	  *
	  * @param array &$id_array Array reference where categories ID will be saved
	  * @param array $id_st_blog_category Parent StBlogCategory ID
	  */
	public function recursiveGetSubCategoryId(&$id_array, $id_st_blog_category)
	{
	 	if (!is_array($id_array) || !$id_st_blog_category)
	 		die(Tools::displayError());

		$result = Db::getInstance()->executeS('
		SELECT `id_st_blog_category`
		FROM `'._DB_PREFIX_.'st_blog_category`
		WHERE `id_parent` = '.(int)$id_st_blog_category);
		foreach ($result as $row)
		{
			$id_array[] = (int)$row['id_st_blog_category'];
			$this->recursiveGetSubCategoryId($id_array, (int)$row['id_st_blog_category']);
		}
	}

	public function delete()
	{
		$this->clearCache();

		// Get children categories
		$to_delete = array((int)$this->id);
		$this->recursiveGetSubCategoryId($to_delete, (int)$this->id);
		$to_delete = array_unique($to_delete);
        
        $deleted = array();
        foreach($to_delete AS $id)
        {
            $this->id = $id;
            if (parent::delete() && !$this->hasMultishopEntries())
                $deleted[] = $id;
        }
        
        if (empty($deleted))
            return true;
		// Delete StBlog Category and its child from database
		$list = implode(',', $deleted);
        
		$delete_rows = Db::getInstance()->execute('SELECT id_parent FROM `'._DB_PREFIX_.'st_blog_category` WHERE `id_st_blog_category` IN ('.$list.')');
        
		// Delete blog category map
        Db::getInstance()->execute('
        DELETE FROM `'._DB_PREFIX_.'st_blog_category_blog`
        WHERE id_st_blog_category IN ('.$list.')
        ');
        
        $this->clearCategoryWithoutParent();
        
        // Rebuilding position
        foreach($delete_rows AS $row)
		  StBlogCategory::cleanPositions($row['id_parent']);
		
		return true;
	}
    
    /** 
     * Clear the category without parent
     */
    public function clearCategoryWithoutParent()
    {
        $cates = Db::getInstance()->executeS('
        SELECT c.id_st_blog_category FROM '._DB_PREFIX_.'st_blog_category c
        WHERE c.id_parent NOT IN (SELECT c2.id_st_blog_category FROM '._DB_PREFIX_.'st_blog_category c2) AND c.id_parent > 0
        ');
        $to_delete = array();
        foreach($cates AS $cat)
        {
            $to_delete[] = $cat['id_st_blog_category'];
        }
        $ret = true;
        if ($to_delete)
        {
            $where = 'id_st_blog_category IN ('.implode(',', $to_delete).')';
            $ret &= (Db::getInstance()->delete('st_blog_category', $where)
             && Db::getInstance()->delete('st_blog_category_lang', $where)
             && Db::getInstance()->delete('st_blog_category_shop', $where));
        }
        return $ret;
    }

	/**
	 * Delete several categories from database
	 *
	 * return boolean Deletion result
	 */
	public function deleteSelection($categories)
	{
		$return = 1;
		foreach ($categories as $id_st_category_blog)
		{
			$category_blog = new StBlogCategory($id_st_category_blog);
			$return &= $category_blog->delete();
		}
		return $return;
	}

	/**
	  * Get the number of parent categories
	  *
	  * @return integer Level depth
	  */
	public function calcLevelDepth()
	{
		$parentBlogCategory = new StBlogCategory($this->id_parent);
		if (!$parentBlogCategory)
			die('parent Blog Category does not exist');
		return $parentBlogCategory->level_depth + 1;
	}

	/**
	  * Return available categories
	  *
	  * @param integer $id_lang Language ID
	  * @param boolean $active return only active categories
	  * @return array Categories
	  */
	public static function getCategories($id_parent = 0, $id_lang, $active = true)
	{
	 	if (!Validate::isBool($active))
	 		die(Tools::displayError('Param error'));

        Shop::addTableAssociation('st_blog_category', array('type' => 'shop'));
        
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT c.`id_st_blog_category`,c.`id_parent`,c.`is_root_category`,c.`level_depth`,cl.`name`,cl.`link_rewrite`
		FROM `'._DB_PREFIX_.'st_blog_category` c
		LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl ON (c.`id_st_blog_category` = cl.`id_st_blog_category`)
        '.Shop::addSqlAssociation(StBlogCategory::$definition['table'],'c').'
        WHERE c.`id_parent` = '.(int)$id_parent.'
        AND cl.`id_lang` = '.(int)$id_lang.
        ($active ? ' AND c.`active` = 1 ' : '').'
        ORDER BY c.`level_depth`,st_blog_category_shop.`position` ASC');

		$categories = array();
        if($result)
    		foreach ($result as $row)
            {
                $row['child'] = StBlogCategory::getCategories($row['id_st_blog_category'], $id_lang, $active);
                $categories[] = $row;
            }
		return $categories;
	}

	public static function getSimpleCategories($id_lang)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT c.`id_st_blog_category`, cl.`name`
		FROM `'._DB_PREFIX_.'st_blog_category` c
		LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl ON (c.`id_st_blog_category` = cl.`id_st_blog_category`)
		WHERE cl.`id_lang` = '.(int)$id_lang.'
		ORDER BY cl.`name`');
	}

	/**
	  * Return current StBlogCategory childs
	  *
	  * @param integer $id_lang Language ID
	  * @param boolean $active return only active categories
	  * @return array Categories
	  */
	public function getSubCategories($id_lang, $active = true)
	{
	 	if (!Validate::isBool($active))
	 		die(Tools::displayError());

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT c.*, cl.id_lang, cl.name, cl.description, cl.link_rewrite, cl.meta_title, cl.meta_keywords, cl.meta_description
		FROM `'._DB_PREFIX_.'st_blog_category` c
		LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl ON (c.`id_st_blog_category` = cl.`id_st_blog_category` AND `id_lang` = '.(int)$id_lang.')
		WHERE `id_parent` = '.(int)$this->id.'
		'.($active ? 'AND `active` = 1' : '').'
		GROUP BY c.`id_st_blog_category`
		ORDER BY `name` ASC');

		// Modify SQL result
		foreach ($result as &$row)
			$row['name'] = StBlogCategory::hideStBlogCategoryPosition($row['name']);
		return $result;
	}

	/**
	  * Hide StBlogCategory prefix used for position
	  *
	  * @param string $name StBlogCategory name
	  * @return string Name without position
	  */
	public static function hideStBlogCategoryPosition($name)
	{
		return preg_replace('/^[0-9]+\./', '', $name);
	}

	/**
	  * Return main categories
	  *
	  * @param integer $id_lang Language ID
	  * @param boolean $active return only active categories
	  * @return array categories
	  */
	public static function getHomeCategories($id_lang, $active = true)
	{
		return StBlogCategory::getChildren(1, $id_lang, $active);
	}

	public static function getChildren($id_parent, $id_lang, $id_shop, $active = true)
	{
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT *
		FROM `'._DB_PREFIX_.'st_blog_category` c
		LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl ON c.`id_st_blog_category` = cl.`id_st_blog_category`
        LEFT JOIN `'._DB_PREFIX_.'st_blog_category_shop` ci ON c.`id_st_blog_category` = ci.`id_st_blog_category`
		WHERE `id_lang` = '.(int)$id_lang.'
		AND c.`id_parent` = '.(int)$id_parent.'
        AND ci.`id_shop` = '.(int)$id_shop.'
		'.($active ? 'AND `active` = 1' : '').'
		ORDER BY `name` ASC');

		// Modify SQL result
		$results_array = array();
		foreach ($result as $row)
		{
			$row['name'] = StBlogCategory::hideStBlogCategoryPosition($row['name']);
			$results_array[] = $row;
		}
		return $results_array;
	}

	/**
	  * Check if StBlogCategory can be moved in another one
	  *
	  * @param integer $id_parent Parent candidate
	  * @return boolean Parent validity
	  */
	public static function checkBeforeMove($id_st_blog_category, $id_parent)
	{
		if ($id_st_blog_category == $id_parent) return false;
	    return true;
	}

	public static function getLinkRewrite($id_st_blog_category, $id_lang)
	{
		if (!Validate::isUnsignedId($id_st_blog_category) || !Validate::isUnsignedId($id_lang))
			return false;

		if (isset(self::$_links[$id_st_blog_category.'-'.$id_lang]))
			return self::$_links[$id_st_blog_category.'-'.$id_lang];

		$result = Db::getInstance()->getRow('
		SELECT cl.`link_rewrite`
		FROM `'._DB_PREFIX_.'st_blog_category` c
		LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl ON c.`id_st_blog_category` = cl.`id_st_blog_category`
		WHERE `id_lang` = '.(int)$id_lang.'
		AND c.`id_st_blog_category` = '.(int)$id_st_blog_category);
		self::$_links[$id_st_blog_category.'-'.$id_lang] = $result['link_rewrite'];
		return $result['link_rewrite'];
	}

	public function getLink(Link $link = null)
	{
		if (!$link) {
            $link = Context::getContext()->link;
		}
        return $link->getModuleLink('stblog', 'category', array('id_st_blog_category'=>$this->id, 'rewrite'=>$this->link_rewrite));
	}

	public function getName($id_lang = null)
	{
		$context = Context::getContext();
		if (!$id_lang)
		{
			if (isset($this->name[$context->language->id]))
				$id_lang = $context->language->id;
			else
				$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		}
		return isset($this->name[$id_lang]) ? $this->name[$id_lang] : '';
	}

	/**
	  * Light back office search for categories
	  *
	  * @param integer $id_lang Language ID
	  * @param string $query Searched string
	  * @param boolean $unrestricted allows search without lang and includes first StBlogCategory and exact match
	  * @return array Corresponding categories
	  */
	public static function searchByName($id_lang, $query, $unrestricted = false)
	{
		if ($unrestricted === true)
			return Db::getInstance()->getRow('
			SELECT c.*, cl.*
			FROM `'._DB_PREFIX_.'st_blog_category` c
			LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl ON (c.`id_st_blog_category` = cl.`id_st_blog_category`)
			WHERE `name` LIKE \''.pSQL($query).'\'');
		else
			return Db::getInstance()->executeS('
			SELECT c.*, cl.*
			FROM `'._DB_PREFIX_.'st_blog_category` c
			LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl ON (c.`id_st_blog_category` = cl.`id_st_blog_category` AND `id_lang` = '.(int)$id_lang.')
			WHERE `name` LIKE \'%'.pSQL($query).'%\' AND c.`id_st_blog_category` != 1');
	}

	/**
	  * Retrieve StBlogCategory by name and parent StBlogCategory id
	  *
	  * @param integer $id_lang Language ID
	  * @param string  $StBlogCategory_name Searched StBlogCategory name
	  * @param integer $id_parent_StBlogCategory parent StBlogCategory ID
	  * @return array Corresponding StBlogCategory
	  *	@deprecated
	  */
	public static function searchByNameAndParentStBlogCategoryId($id_lang, $blog_category_name, $id_parent_blog_category)
	{
		Tools::displayAsDeprecated();
		return Db::getInstance()->getRow('
		SELECT c.*, cl.*
	    FROM `'._DB_PREFIX_.'st_blog_category` c
	    LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl ON (c.`id_st_blog_category` = cl.`id_st_blog_category` AND `id_lang` = '.(int)$id_lang.')
	    WHERE `name`  LIKE \''.pSQL($blog_category_name).'\'
		AND c.`id_st_blog_category` != 1
		AND c.`id_parent` = '.(int)$id_parent_blog_category);
	}

	/**
	  * Get Each parent StBlogCategory of this StBlogCategory until the root StBlogCategory
	  *
	  * @param integer $id_lang Language ID
	  * @return array Corresponding categories
	  */
	public static function getParentsCategories($id_current = 1)
	{
	    $id_lang = Context::getContext()->language->id;
		$id_current = $id_current;
		while (true)
		{
			$query = '
				SELECT c.*, cl.*
				FROM `'._DB_PREFIX_.'st_blog_category` c
				LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl ON (c.`id_st_blog_category` = cl.`id_st_blog_category` AND cl.`id_lang` = '.(int)$id_lang.')
                '.Shop::addSqlAssociation(StBlogCategory::$definition['table'],'c').'
				WHERE c.`id_st_blog_category` = '.(int)$id_current.'
			';
			$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);

            if (!isset($result[0]))
            {
                $root = StBlogCategory::getTopCategory();
                $categories[] = array(
                    'id_st_blog_category'   => $root->id,
                    'id_parent'             => $root->id_parent,
                    'name'                  => $root->name,
                    'level_depth'           => $root->level_depth,
                    'active'                => $root->active
                );
            }
            else
			 $categories[] = $result[0];
			if (!$result || $result[0]['id_parent'] == 0)
				return $categories;
			$id_current = $result[0]['id_parent'];
		}
	}

	public function updatePosition($way, $position)
	{
		$res = Db::getInstance()->executeS('
			SELECT c.`id_st_blog_category`, c.`position`, c.`id_parent`
			FROM `'._DB_PREFIX_.'st_blog_category` c
			WHERE c.`id_parent` = '.(int)$this->id_parent.'
			ORDER BY c.`position` ASC'
		);
        if (!$res)
			return false;
		foreach ($res as $category)
			if ((int)$category['id_st_blog_category'] == (int)$this->id)
				$moved_category = $category;

		if (!isset($moved_category) || !isset($position))
			return false;
		// < and > statements rather than BETWEEN operator
		// since BETWEEN is treated differently according to databases
		$res = (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_blog_category`
			SET `position`= `position` '.($way ? '- 1' : '+ 1').'
			WHERE `position`
			'.($way
				? '> '.(int)$moved_category['position'].' AND `position` <= '.(int)$position
				: '< '.(int)$moved_category['position'].' AND `position` >= '.(int)$position).'
			AND `id_parent`='.(int)$moved_category['id_parent'])
		&& Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_blog_category`
			SET `position` = '.(int)$position.'
			WHERE `id_parent` = '.(int)$moved_category['id_parent'].'
			AND `id_st_blog_category`='.(int)$moved_category['id_st_blog_category']));
        
        if ($res)
        {
            $categories = Db::getInstance()->executeS('SELECT id_st_blog_category, position FROM `'._DB_PREFIX_.'st_blog_category` WHERE `id_parent` = '.(int)$moved_category['id_parent'].' ORDER BY position ASC');
            foreach($categories AS $row)
                $res &= StBlogCategory::updateShopPosition($row['id_st_blog_category'], $row['position']);
        }
        return $res;
	}

	public static function cleanPositions($id_category_parent)
	{
		$result = Db::getInstance()->executeS('
		SELECT `id_st_blog_category`
		FROM `'._DB_PREFIX_.'st_blog_category`
		WHERE `id_parent` = '.(int)$id_category_parent.'
		ORDER BY `position`');
		$sizeof = count($result);
		for ($i = 0; $i < $sizeof; ++$i)
		{
			$sql = '
			UPDATE `'._DB_PREFIX_.'st_blog_category`
			SET `position` = '.(int)$i.'
			WHERE `id_parent` = '.(int)$id_category_parent.'
			AND `id_st_blog_category` = '.(int)$result[$i]['id_st_blog_category'];
			Db::getInstance()->execute($sql);
            StBlogCategory::updateShopPosition($result[$i]['id_st_blog_category'], $i);
		}
		return true;
	}

	public static function getLastPosition($id_category_parent)
	{
		return (Db::getInstance()->getValue('SELECT MAX(position)+1 FROM `'._DB_PREFIX_.'st_blog_category` WHERE `id_parent` = '.(int)$id_category_parent));
	}

	public static function getUrlRewriteInformations($id_category)
	{
	    $sql = '
		SELECT l.`id_lang`, c.`link_rewrite`
		FROM `'._DB_PREFIX_.'st_blog_category_lang` AS c
		LEFT JOIN  `'._DB_PREFIX_.'lang` AS l ON c.`id_lang` = l.`id_lang`
		WHERE c.`id_st_blog_category` = '.(int)$id_category.'
		AND l.`active` = 1';
		$arr_return = Db::getInstance()->executeS($sql);
		return $arr_return;
	}
    
    public static function getPath($urlBase, $id_category, $path = '',$highlight='')
    {
        $category = StBlogCategory::getParentCategory($id_category);
		if (!isset($category['id_st_blog_category']))
			return '<a href="'.$urlBase.'&viewcategory&token=' . Tools::getAdminToken('AdminStBlogCategory'.(int)(Tab::getIdFromClassName('AdminStBlogCategory')).(int)Context::getContext()->employee->id).'"><img src="../img/admin/home.gif" alt="Home" /></a> ';

		$name = ($highlight != NULL) ? str_ireplace($highlight, '<span class="highlight">'.$highlight.'</span>', StBlogCategory::hideStBlogCategoryPosition($category['name'])) : StBlogCategory::hideStBlogCategoryPosition($category['name']);
		$edit = ' > <a href="'.$urlBase.'&id_st_blog_category='.$category['id_st_blog_category'].'&updatest_blog_category&token=' . Tools::getAdminToken('AdminStBlogCategory'.(int)(Tab::getIdFromClassName('AdminStBlogCategory')).(int)Context::getContext()->employee->id).'">
				<img src="../img/admin/edit.gif" alt="Modify" /></a> ';
		if (!$category['id_parent'])
        {
            $id_str = '';
            if (Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP)
                $id_str = '&id_st_blog_category='.$category['id_st_blog_category'];
            
            return '<a href="'.$urlBase.$id_str.'&viewcategory&token=' . Tools::getAdminToken('AdminStBlogCategory'.(int)(Tab::getIdFromClassName('AdminStBlogCategory')).(int)Context::getContext()->employee->id).'"><img src="../img/admin/home.gif" alt="Home" />'.(Tools::getValue('id_st_blog_category',false)?$name:'').'</a> '.$path;
        }
			
		$path = $edit.'<a href="'.$urlBase.'&id_st_blog_category='.$category['id_st_blog_category'].'&viewcategory&token=' . Tools::getAdminToken('AdminStBlogCategory'.(int)(Tab::getIdFromClassName('AdminStBlogCategory')).(int)Context::getContext()->employee->id).'">
		'.$name.'</a>'.$path;
		if (!$category['id_parent'])
			return substr($path, 0, strlen($path) - 3);
		return StBlogCategory::getPath($urlBase, $category['id_parent'], $path);
    }
    
    public static function getShopCategoryRoot($id_lang = null)
    {
		if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
            
        $sql = 'SELECT c.`id_st_blog_category`, cl.`name`
        FROM `'._DB_PREFIX_.'st_blog_category` c 
        INNER JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl
        ON c.`id_st_blog_category` = cl.`id_st_blog_category` 
        AND cl.`id_lang` = '.(int)$id_lang.'
        '.Shop::addSqlAssociation(StBlogCategory::$definition['table'],'c').' 
        WHERE c.`is_root_category` = 1';
        return Db::getInstance()->getRow($sql);
    }
    
    
    public static function getParentCategory($id_category = 0)
    {
        $sql = 'SELECT a.id_st_blog_category, a.id_parent, b.name
        FROM `'._DB_PREFIX_.'st_blog_category` a 
        INNER JOIN `'._DB_PREFIX_.'st_blog_category_lang` `b` 
        ON a.id_st_blog_category = b.id_st_blog_category 
        AND b.id_lang = '.(int)Context::getContext()->language->id.'
        '.Shop::addSqlAssociation(StBlogCategory::$definition['table'],'a').' 
        WHERE a.id_st_blog_category = '.(int)$id_category;
        
        return db::getInstance()->getRow($sql);
    }
    
    public function deleteImage($force = true)
    {
        if ($this->id && $this->image)
            return @unlink($this->image);
        return true;
    }
    
    public function deleteFile()
    {
        if ($this->id && $this->video)
            return @unlink($this->video);
        return true;
    }
    
    public static function getCategoryInfo($id_category = 0, $fields = '*')
    {
        $rs = DB::getInstance()->getRow('
        SELECT DISTINCT '.$fields.' FROM '._DB_PREFIX_.'st_blog_category c
        LEFT JOIN '._DB_PREFIX_.'st_blog_category_lang cl
        ON c.id_st_blog_category = cl.id_st_blog_category 
        WHERE cl.id_lang = '.(int)Context::getContext()->language->id.'
        AND c.id_st_blog_category='.$id_category.'
        ');
        
        if (empty($rs))
            return false;                        
        
        if ($fields != '*' && strpos($fields, ',') === false)
            return $rs[$fields];
                    
        return $rs;                            
    }
    
    public static function getCategoryMapInfo($id_st_blog= 0)
    {
        $rs = DB::getInstance()->executeS('
        SELECT DISTINCT(name) FROM '._DB_PREFIX_.'st_blog_category_blog c,
        '._DB_PREFIX_.'st_blog_category_lang cl
        WHERE c.id_st_blog_category = cl.id_st_blog_category 
        AND cl.id_lang='.(int)Context::getContext()->language->id.'
        AND c.id_st_blog='.(int)$id_st_blog.'
        ');

        $ret = array();               
        
        foreach($rs AS $v)
        {
            $ret[] = $v['name'];
        }        
        return $ret;                            
    }
    
    public static function getCategoryMapIds($id_st_blog = 0)
    {
        $rs = Db::getInstance()->executeS('
        SELECT cb.id_st_blog_category FROM '._DB_PREFIX_.'st_blog_category_blog cb
        LEFT JOIN '._DB_PREFIX_.'st_blog_category_lang cl
        ON(cb.id_st_blog_category = cl.id_st_blog_category
        AND cl.id_lang = '.Context::getContext()->language->id.')
        '.Shop::addSqlAssociation('st_blog_category_blog', 'cb').'
        WHERE cb.id_st_blog = '.(int)$id_st_blog.'
        ');
        $ret = array();
        foreach($rs AS $v)
            $ret[] = $v['id_st_blog_category'];
           
        return $ret;
    }
    
    public static function getCategoryMapArray($id_array = array())
    {
        $rs = array();
        if ($id_array)
            $rs = Db::getInstance()->executeS('
            SELECT id_st_blog_category, name FROM '._DB_PREFIX_.'st_blog_category_lang
            WHERE id_st_blog_category IN ('.implode(',', $id_array).')
            AND id_lang = '.Context::getContext()->language->id.'
            ');
        
        return $rs;
    }
    
    public static function getTopCategory($id_lang = null)
	{
		if (is_null($id_lang))
			$id_lang = Context::getContext()->language->id;
		$id_category = Db::getInstance()->getValue('
		SELECT `id_st_blog_category`
		FROM `'._DB_PREFIX_.'st_blog_category`
		WHERE `id_parent` = 0');
		return new StBlogCategory($id_category, $id_lang);
	}
    
    /**
	 * This method allow to return children categories with the number of sub children selected for a product
	 *
	 * @param int $id_parent
	 * @param int $id_product
	 * @param int $id_lang
	 * @return array
	 */
	public static function getChildrenWithNbSelectedSubCat($id_parent, $selected_cat, $id_lang, $use_shop_context = true)
	{
		$selected_cat = explode(',', str_replace(' ', '', $selected_cat));
		$sql = 'SELECT DISTINCT(c.`id_st_blog_category`) AS id_category, c.`level_depth`, cl.`name`, IF((
						SELECT COUNT(*)
						FROM `'._DB_PREFIX_.'st_blog_category` c2
						WHERE c2.`id_parent` = c.`id_st_blog_category`
					) > 0, 1, 0) AS has_children, '.($selected_cat ? '(
						SELECT count(c3.`id_st_blog_category`)
						FROM `'._DB_PREFIX_.'st_blog_category` c3
						WHERE c3.`id_st_blog_category` IN ('.implode(',', array_map('intval', $selected_cat)).')
                        AND c3.`path` like CONCAT("%", c.`id_st_blog_category`, ",%")
					)' : '0').' AS nbSelectedSubCat
				FROM `'._DB_PREFIX_.'st_blog_category` c
				LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl ON (c.`id_st_blog_category` = cl.`id_st_blog_category`)';
		$sql .= ' LEFT JOIN `'._DB_PREFIX_.'st_blog_category_shop` cs ON (c.`id_st_blog_category` = cs.`id_st_blog_category`)';
		$sql .= ' WHERE `id_lang` = '.(int)$id_lang;
        if (Shop::isFeatureActive())
            $sql .= ' AND cs.`id_shop` IN ( '.implode(',',Shop::getContextListShopID()).')';
        else
            $sql .= ' AND cs.`id_shop` = '.Context::getContext()->shop->id; 
		$sql .= ' AND c.`id_parent` = '.(int)$id_parent;
		if (!Shop::isFeatureActive() || Shop::getContext() == Shop::CONTEXT_SHOP && $use_shop_context)
			$sql .= ' ORDER BY cs.`position` ASC';

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
	}
        
	public static function isRootCategory($id_st_blog_category)
	{
	    if(!$id_st_blog_category)
            return false;
		return (bool)self::getCategoryInfo((int)$id_st_blog_category,'is_root_category');
	}
    
    
    public function getBlogs($id_lang, $p, $n, $order_by = null, $order_way = null, $get_total = false, $active = true)
	{
	   $context = Context::getContext();
                    
        if ($get_total)
		{
			$sql = 'SELECT COUNT(0) AS total
					FROM `'._DB_PREFIX_.'st_blog` b
					'.Shop::addSqlAssociation('st_blog', 'b').'
					LEFT JOIN `'._DB_PREFIX_.'st_blog_category_blog` cb ON b.`id_st_blog` = cb.`id_st_blog`
					WHERE cb.`id_st_blog_category` = '.(int)$this->id.
					($active ? ' AND st_blog_shop.`active` = 1' : '');
			return (int)Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
		}
        
             
       if (!$order_by && !$order_way)
       {
           if (empty($order_by))
    			$order_by = 'position';
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
				WHERE st_blog_shop.`id_shop` = '.(int)$context->shop->id.'
					AND cb.`id_st_blog_category` = '.(int)$this->id
					.($active ? ' AND st_blog_shop.`active` = 1' : '')
					.' GROUP BY st_blog_shop.`id_st_blog`';

		$sql .= ' ORDER BY '.(isset($order_by_prefix) ? $order_by_prefix.'.' : '').'`'.pSQL($order_by).'` '.pSQL($order_way).'
		LIMIT '.(((int)$p - 1) * (int)$n).','.(int)$n;

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        
		return StBlogClass::getBlogsDetials((int)$id_lang, $result);
	}
    
    public function updatePath()
    {
        $ppath = Db::getInstance()->getValue('
        SELECT path FROM '._DB_PREFIX_.'st_blog_category
        WHERE id_st_blog_category = '.(int)$this->id_parent.'
        ');
        
        $ppath || $ppath = ','.$this->id_parent;
        $path = $ppath.','.$this->id;    
        Db::getInstance()->execute('
        UPDATE '._DB_PREFIX_.'st_blog_category
        SET path = "'.$path.'"
        WHERE id_st_blog_category = '.$this->id.'
        ');
    }
    
	
	public static function inShopStatic($id_st_blog_category, Shop $shop = null)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('SELECT count(0) FROM `'._DB_PREFIX_.'st_blog_category_shop` WHERE id_st_blog_category = '.(int)$id_st_blog_category.' AND id_shop='.Context::getContext()->shop->id);
	}
    
    public function assocShop($id_shop = array())
    {
        if (!empty($id_shop))
        {
            $this->id_shop_list = $id_shop;
            return $this;
        }
            
        
        $shops = Db::getInstance()->executeS('
        SELECT id_shop FROM '._DB_PREFIX_.'shop
        WHERE active = 1
        ');
        
        foreach($shops AS $shop)
        {
            $this->id_shop_list[] = $shop['id_shop'];
        }
        
        return $this;
    }
    
    public static function getNestedCategories($root_category = null,
		$id_lang = false, $active = true, $sql_filter = '', $sql_sort = '',
		$sql_limit = '')
	{
        if (!$id_lang)
            $id_lang = Context::getContext()->language->id;
            
		if (!isset($root_category))
			$root_category = self::getTopCategory((int)$id_lang)->id;

		if (!Validate::isInt($root_category))
			die(Tools::displayError());

		if (!Validate::isBool($active))
			die(Tools::displayError());

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_blog_category` c
			'.Shop::addSqlAssociation('st_blog_category', 'c').'
			LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl ON c.`id_st_blog_category` = cl.`id_st_blog_category`
			WHERE 1 '.$sql_filter.' '.($id_lang ? 'AND `id_lang` = '.(int)$id_lang : '').'
			'.($active ? 'AND `active` = 1' : '').'
			'.(!$id_lang ? 'GROUP BY c.id_st_blog_category' : '').'
			'.($sql_sort != '' ? $sql_sort : 'ORDER BY c.`level_depth` ASC, st_blog_category_shop.`position` ASC').'
			'.($sql_limit != '' ? $sql_limit : '')
		);

		$categories = array();
		$buff = array();

		foreach ($result as $row)
		{
		    $row['id_category'] = $row['id_st_blog_category'];
			$current = &$buff[$row['id_category']];
			$current = $row;

			if ($row['id_category'] == $root_category)
				$categories[$row['id_category']] = &$current;
			else
				$buff[$row['id_parent']]['children'][$row['id_category']] = &$current;
		}

		return $categories;
	}
    
    public static function updateShopPosition($id_st_blog_cateogry, $position = 0, $id_shop = null)
    {
        if (!$id_shop)
            $id_shop = Shop::getCompleteListOfShopsID();
        if (!is_array($id_shop))
            $id_shop = (array)$id_shop;
        return Db::getInstance()->execute('
        UPDATE '._DB_PREFIX_.'st_blog_category_shop 
        SET position = '.(int)$position.'
        WHERE id_st_blog_category = '.(int)$id_st_blog_cateogry.'
        AND id_shop IN ('.implode(',', $id_shop).')'
        );
    }
}


