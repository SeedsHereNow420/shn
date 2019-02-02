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
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
class StBlogClass extends ObjectModel
{
	public $id;

	/** @var integer StBlog ID */
	public $id_st_blog;

	/** @var boolean Status for display */
	public $active = 1;

	/** @var integer Blog Cagegory ID */
	public $id_st_blog_category_default;
    
    /** @var integer Row Position */
    public $position;
    
    /** @var integer type: standared gallery video */
    public $type;
    
    /** @var integer Status */
    public $status;
    
    /** @var integer Commnets Status */
    public $comments_status;

	/** @var string string used in rewrited URL */
	public $link_rewrite;

	/** @var string Meta title */
	public $meta_title;

	/** @var string Meta keywords */
	public $meta_keywords;

	/** @var string Meta description */
	public $meta_description;
    
    /** @var string Blog Name */
    public $name;
    
    /** @var string Blog Content */
    public $content;
    
    /** @var string Blog Short Contet */
    public $content_short;
        
    /** @var string Blog Video */
    public $video;
    
    /** @var integer counter */
    public $counter;

	/** @var string Object creation date */
	public $date_add;

	/** @var string Object last modification date */
	public $date_upd;
        
    /** @var boolean accept comment */
	public $accept_comment;
    
    /** @var integer author name */
	public $author;
    

	protected static $_links = array();

	protected static $blogDetailsCache = array();
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'st_blog',
		'primary' => 'id_st_blog',
		'multilang' => true,
		'fields' => array(
            'status' => 		    array('type' => self::TYPE_BOOL),
			'position' => 			array('type' => self::TYPE_INT),
            'type' => 		    	array('type' => self::TYPE_INT),
			'comments_status' =>	array('type' => self::TYPE_INT),
            'accept_comment'  =>	array('type' => self::TYPE_INT),
			'date_add' => 			array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
			'date_upd' => 			array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            
			/* Shop fields */
			'active' => 			array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isBool', 'required' => true),
			'id_st_blog_category_default' =>array('type' => self::TYPE_INT, 'shop' => true),
            'counter' =>            array('type' => self::TYPE_INT, 'shop' => true),
            
			// Lang fields
			'link_rewrite' => 		array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isLinkRewrite', 'size' => 255),
			'meta_title' => 		array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 128),
			'meta_description' => 	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
			'meta_keywords' => 		array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
            'name' => 	        	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255, 'required' => true),
            'author' => 		    array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 64),
            'content' => 		    array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
            'content_short' => 		array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
            'video' => 		        array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
		),
	);

    public function __construct($id = null, $id_lang = null, $id_shop = null)
	{
        Shop::addTableAssociation('st_blog', array('type' => 'shop'));
        Shop::addTableAssociation('st_blog_category', array('type' => 'shop'));
		parent::__construct($id, $id_lang, $id_shop);
    }

	public	function add($autodate = false, $null_values = false)
	{
	    $this->position = $this->getLastPosition();
        $this->id_author = Context::getContext()->employee->id;
		$ret = parent::add($autodate, $null_values);
		return $ret;
	}

	public	function update($null_values = false)
	{
		return parent::update($null_values);
	}

	public function delete()
	{
		$this->clearCache();

		$to_delete = array((int)$this->id);
		$to_delete = array_unique($to_delete);

		$list = count($to_delete) > 1 ? implode(',', $to_delete) : (int)$this->id;
        
        $to_delete_rows = Db::getInstance()->executeS('
        SELECT * FROM `'._DB_PREFIX_.'st_blog_lang`
        WHERE id_st_blog IN ('.$list.')
        ');
        
		if (parent::delete())
        {
            $exist = Db::getInstance()->getValue('
            SELECT COUNT(0) FROM `'._DB_PREFIX_.'st_blog`
            WHERE id_st_blog IN ('.$list.')
            ');
            if ($this->hasMultishopEntries() && $exist)
                return true;
                
            // Delete asscoited asset
            foreach($to_delete_rows AS $delete)
            {
                if (!empty($delete['video']))
                  @unlink(_PS_ROOT_DIR_.$delete['video']);
            }
                
            // Delete product link
    		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_blog_product_link` WHERE `id_st_blog` IN ('.$list.')');
            
            $images = Db::getInstance()->executeS('
            SELECT * FROM `'._DB_PREFIX_.'st_blog_image`
            WHERE `id_st_blog` IN ('.$list.')
            ');
            
            foreach($images AS $img)
            {
                $image = new StBlogImageClass('2', $img['id_st_blog_image']);
                $image->setShopList($image->getAssociatedShops())->delete();
                $image = new StBlogImageClass('1', $img['id_st_blog_image']);
                $image->setShopList($image->getAssociatedShops())->delete();
            }
            
            // Delete tags
            Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_blog_tag_map` WHERE `id_st_blog` IN ('.$list.')');
            Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_blog_tag` WHERE `id_st_blog_tag` NOT IN (SELECT id_st_blog_tag FROM `'._DB_PREFIX_.'st_blog_tag_map`)');
            
            // Delete category map
            $cats = Db::getInstance()->executeS('
            SELECT id_st_blog_category FROM `'._DB_PREFIX_.'st_blog_category_blog` WHERE `id_st_blog` IN ('.$list.')');
            Db::getInstance()->execute('
            DELETE FROM `'._DB_PREFIX_.'st_blog_category_blog` WHERE `id_st_blog` IN ('.$list.')
            ');
            foreach($cats AS $cat)
                StBlogClass::cleanPositions($cat['id_st_blog_category']);
                
            // Delete comments
            Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_blog_comment` WHERE `id_st_blog` IN ('.$list.')');
        }
		
		return true;
	}

	/**
	 * Delete several blogs from database
	 *
	 * return boolean Deletion result
	 */
	public function deleteSelection($blogs)
	{
		$return = 1;
		foreach ($blogs as $id_st_blog)
		{
			$blog = new StBlogClass($id_st_blog);
			$return &= $blog->delete();
		}
		return $return;
	}

	/**
	  * Hide StBlog prefix used for position
	  *
	  * @param string $name StBlog name
	  * @return string Name without position
	  */
	public static function hideStBlogPosition($name)
	{
		return preg_replace('/^[0-9]+\./', '', $name);
	}

	public static function getLinkRewrite($id_st_blog, $id_lang)
	{
		if (!Validate::isUnsignedId($id_st_blog) || !Validate::isUnsignedId($id_lang))
			return false;

		if (isset(self::$_links[$id_st_blog.'-'.$id_lang]))
			return self::$_links[$id_st_blog.'-'.$id_lang];

		$result = Db::getInstance()->getRow('
		SELECT cl.`link_rewrite`
		FROM `'._DB_PREFIX_.'st_blog` c
		LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` cl ON c.`id_st_blog` = cl.`id_st_blog`
		WHERE `id_lang` = '.(int)$id_lang.'
		AND c.`id_st_blog` = '.(int)$id_st_blog);
		self::$_links[$id_st_blog.'-'.$id_lang] = $result['link_rewrite'];
		return $result['link_rewrite'];
	}
    
	/**
	  * Light back office search for blogs
	  *
	  * @param integer $id_lang Language ID
	  * @param string $query Searched string
	  * @param boolean $unrestricted allows search without lang and includes first StBlog and exact match
	  * @return array Corresponding blogs
	  */
	public static function searchByName($id_lang, $query, $unrestricted = false)
	{
		if ($unrestricted === true)
			return Db::getInstance()->getRow('
			SELECT c.*, cl.*
			FROM `'._DB_PREFIX_.'st_blog` c
			LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` cl ON (c.`id_st_blog` = cl.`id_st_blog`)
			WHERE `name` LIKE \''.pSQL($query).'\'');
		else
			return Db::getInstance()->executeS('
			SELECT c.*, cl.*
			FROM `'._DB_PREFIX_.'st_blog` c
			LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` cl ON (c.`id_st_blog` = cl.`id_st_blog` AND `id_lang` = '.(int)$id_lang.')
			WHERE `name` LIKE \'%'.pSQL($query).'%\' AND c.`id_st_blog` != 1');
	}

	/**
	  * Retrieve StBlog by name and parent StBlog id
	  *
	  * @param integer $id_lang Language ID
	  * @param string  $StBlog_name Searched StBlog name
	  * @param integer $id_parent_StBlog parent StBlog ID
	  * @return array Corresponding StBlog
	  *	@deprecated
	  */
	public static function searchByNameAndParentStBlogId($id_lang, $blog_category_name, $id_parent_blog_category)
	{
		Tools::displayAsDeprecated();
		return Db::getInstance()->getRow('
		SELECT c.*, cl.*
	    FROM `'._DB_PREFIX_.'st_blog` c
	    LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` cl ON (c.`id_st_blog` = cl.`id_st_blog` AND `id_lang` = '.(int)$id_lang.')
	    WHERE `name`  LIKE \''.pSQL($blog_category_name).'\'
		AND c.`id_st_blog` != 1
		AND c.`id_parent` = '.(int)$id_parent_blog_category);
	}

	public function getLastPosition()
	{
		return Db::getInstance()->getValue('SELECT MAX(position)+1 FROM `'._DB_PREFIX_.'st_blog`');
	}

	public static function getUrlRewriteInformations($id_st_blog)
	{
	    $sql = '
		SELECT l.`id_lang`, c.`link_rewrite`
		FROM `'._DB_PREFIX_.'st_blog_lang` AS c
		LEFT JOIN  `'._DB_PREFIX_.'lang` AS l ON c.`id_lang` = l.`id_lang`
		WHERE c.`id_st_blog` = '.(int)$id_st_blog.'
		AND l.`active` = 1';
		$arr_return = Db::getInstance()->executeS($sql);
		return $arr_return;
	}
    
    public function getGallery($id_st_blog = 0)
    {
        $result = Db::getInstance()->executeS('
        SELECT DISTINCT(i.id_st_blog_image) FROM '._DB_PREFIX_.'st_blog_image i
        LEFT JOIN '._DB_PREFIX_.'st_blog_image_lang il
        ON(i.id_st_blog_image = il.id_st_blog_image
        AND il.id_lang = '.(int)Context::getContext()->language->id.')
        WHERE i.id_st_blog = '.(int)$id_st_blog.'
        AND `type` = 2
        ORDER BY `position`
        ');
        
        $ids = array();
        $rs  = array();
        foreach($result AS $v)
        {
            $ids[] = $v['id_st_blog_image'];
        }
        foreach($ids AS $k => $v)
        {
            $image = new StBlogImageClass('2', $v);
            $rs[] = array(
                'image' => $image->getImageUrl('thumb'),
                'id_image' => $image->id,
                'position' => $image->position
            );
        }
        
        return $rs;
    }    
    
    public function getCoverUrl($type = 'thumb')
    {
        if (!$this->id)
            return false;
            
        $id_image = Db::getInstance()->getValue('
        SELECT bi.id_st_blog_image FROM '._DB_PREFIX_.'st_blog_image bi
        LEFT JOIN '._DB_PREFIX_.'st_blog_image_shop bis
        ON bi.id_st_blog_image = bis.id_st_blog_image
        WHERE type = 1 AND id_st_blog = '.(int)$this->id.'
        ');
        if ($id_image)
        {
            $img = new StBlogImageClass('1', $id_image);
            return $img->getImageUrl($type);
        }
        return false;
    }
    
    public function getLinkProducts(Context $context=null)
	{
	    $products = array();
	    if (!$context) {
	       $context = Context::getContext();   
	    }
        if (!is_object($context->customer)) {
            $context->customer = new Customer;
        }
		if (!$this->id)
			return $products;
        
        $products = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT id_product 
            FROM `'._DB_PREFIX_.'st_blog_product_link`
            WHERE id_st_blog = '.(int)$this->id.'
            AND id_shop = '.(int)$context->shop->id.'
        ');
        
		if (count($products)) {
			$assembler = new ProductAssembler($context);

            $presenterFactory = new ProductPresenterFactory($context);
            $presentationSettings = $presenterFactory->getPresentationSettings();
            $presenter = new ProductListingPresenter(
                new ImageRetriever(
                    $context->link
                ),
                $context->link,
                new PriceFormatter(),
                new ProductColorsRetriever(),
                $context->getTranslator()
            );
            
            foreach ($products as &$product) {
                $prod = new Product((int)$product['id_product']);
                if (!$prod->id) {
                    continue;
                }
                $product = $presenter->present(
                    $presentationSettings,
                    $assembler->assembleProduct(array('id_product' => $product['id_product'])),
                    $context->language
                );
            }
        }
        return $products;
	}
    
    public function saveProductLink($id_products)
    {
        if (!$this->id)
            return false;
        
        if (!is_array($id_products))
            $id_products = (array)$id_products;
        
        foreach($id_products AS $k => $v)
            if (empty($v))
                unset($id_products[$k]);
        $id_shop = Shop::getContextShopID();
        Db::getInstance()->execute('
        DELETE FROM '._DB_PREFIX_.'st_blog_product_link WHERE `id_st_blog` = '.(int)$this->id
        .(count($id_products)>0?' AND `id_product` NOT IN('.implode(',',$id_products).')':'').'
        AND `id_shop` = '.(int)$id_shop.'
        ');
        $ret = true;
        foreach($id_products AS $k => $id_product)
        {
            if(!$id_product)
                continue;
            $exist = Db::getInstance()->getValue('
            SELECT COUNT(0) FROM '._DB_PREFIX_.'st_blog_product_link
            WHERE `id_st_blog` = '.$this->id.'
            AND `id_product` = '.(int)$id_product.'
            AND `id_shop` = '.(int)$id_shop.'
            ');
           if (!$exist)
           {
                $ret &= Db::getInstance()->execute('
                        INSERT INTO '._DB_PREFIX_.'st_blog_product_link(
                        `id_st_blog`, `id_product`, `id_shop`, `position`)
                        VALUES('.(int)$this->id.','.(int)$id_product.','.(int)$id_shop.','.(int)$k.')
                    '); 
           }
                
        }
            
        return $ret;
    }
    
    public function deleteProductLink()
    {
        if (!$this->id)
            return false;
        Db::getInstance()->execute('
        DELETE FROM '._DB_PREFIX_.'st_blog_product_link WHERE id_st_blog
        = '.(int)$this->id.'
        ');
        return true;
    }
    
    
    public function saveTag($tags)
    {
        if (!$this->id)
            return false;
            
        if (!is_array($tags))
            $tags = (array)$tags;
        
        // Clear All the map about the blog.    
        Db::getInstance()->execute('
        DELETE FROM '._DB_PREFIX_.'st_blog_tag_map
        WHERE id_st_blog = '.$this->id.'
        ');
        $ret = true;
        foreach($tags AS $id_lang => $tag)
        {
            if (empty($tag))
                continue;
            foreach(explode(',',$tag) AS $v)
            {
                $v = trim($v);
                $id_st_blog_Tag = Db::getInstance()->getValue('
                SELECT id_st_blog_tag FROM '._DB_PREFIX_.'st_blog_tag
                WHERE name = "'.$v.'" && id_lang = '.(int)$id_lang.'
                ');
                
                if (!$id_st_blog_Tag)
                {
                    Db::getInstance()->execute('
                    INSERT INTO '._DB_PREFIX_.'st_blog_tag(id_lang, name)
                    VALUES ('.(int)$id_lang.', "'.$v.'")
                    ');
                    
                    $id_st_blog_Tag = Db::getInstance()->Insert_ID();
                    if (!$id_st_blog_Tag)
                        continue;
                }
                $ret &= Db::getInstance()->execute('
                INSERT INTO '._DB_PREFIX_.'st_blog_tag_map(
                id_st_blog_tag, id_st_blog)
                VALUES ('.(int)$id_st_blog_Tag.', "'.$this->id.'")
                ');
            }
        }
        return $ret;
    }
    
    public function getBlogTags($id_lang = null)
    {
		if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
                
        $result = array();
        if (!$this->id)
            return $result;
        $rs = Db::getInstance()->executeS('
        SELECT t.`name` FROM '._DB_PREFIX_.'st_blog_tag t
        LEFT JOIN '._DB_PREFIX_.'st_blog_tag_map tm
        ON t.`id_st_blog_tag` = tm.`id_st_blog_tag`
        WHERE t.`id_lang` = '.(int)$id_lang.'
        AND tm.`id_st_blog` = '.$this->id.'
        ');

        foreach($rs AS $v)
            $result[] = $v['name'];
        
        return $result;
    }
    
    public function getBlogTagsAll()
    {
                
        $result = array();
        foreach (Language::getLanguages(false) as $lang)
            $result[$lang['id_lang']] = '';
        if (!$this->id)
            return $result;
        $rs = Db::getInstance()->executeS('
        SELECT t.`id_lang`,t.`name` FROM '._DB_PREFIX_.'st_blog_tag t
        LEFT JOIN '._DB_PREFIX_.'st_blog_tag_map tm
        ON t.`id_st_blog_tag` = tm.`id_st_blog_tag`
        WHERE tm.`id_st_blog` = '.(int)$this->id.'
        ');

        foreach($rs AS $v)
            $result[$v['id_lang']] = !isset($result[$v['id_lang']]) || !$result[$v['id_lang']]? $v['name'] : $result[$v['id_lang']].','.$v['name'];
        
        return $result;
    }
    
    public function deleteFile($type='video')
    {
        if (!$this->id)
            return true;
        $files = Db::getInstance()->executeS('
        SELECT '.$type.' FROM '._DB_PREFIX_.'st_blog_lang
        WHERE id_st_blog IN('.$this->id.')
        ');
         
         foreach($files AS $flie)       
            @unlink(_PS_ROOT_DIR_.$file[$type]);
         return true;
    }

    public function isAssociatedToGalleryShop($id_image, $id_shop)
    {
        if (!$id_image || !$id_shop)
            return false;
        return Db::getInstance()->getValue('
        SELECT COUNT(0) FROM '._DB_PREFIX_.'st_blog_image_shop
        WHERE id_st_blog_image = '.$id_image.' && id_shop = '.$id_shop.'
        ');
    }
    
    public function getAssociatedToGalleryShop($id_image)
    {
        if (empty($id_image))
            return array();
            
        return Db::getInstance()->executeS('
        SELECT id_shop FROM  '._DB_PREFIX_.'st_blog_gallery_shop
        WHERE id_image = '.$id_image.'
        ');
    }
    
    public function saveCategoryMap($cats = array())
    {
        if (!$this->id)
            return false;
        Db::getInstance()->execute('
        DELETE FROM '._DB_PREFIX_.'st_blog_category_blog
        WHERE id_st_blog = '.$this->id.'
        AND id_st_blog_category NOT IN('.implode(',', $cats).')
        ');
        $ret = true;
        foreach($cats AS $i => $cat)
        {
            StBlogClass::cleanPositions($cat);
            $exists = Db::getInstance()->getValue('
            SELECT COUNT(0) FROM '._DB_PREFIX_.'st_blog_category_blog
            WHERE id_st_blog = '.$this->id.'
            AND id_st_blog_category = '.(int)$cat.'
            ');
            if($exists)
                continue;
            $pos = (int)$this->getCategoryPosition($cat);
            $ret &= Db::getInstance()->execute('
            INSERT INTO '._DB_PREFIX_.'st_blog_category_blog(
            id_st_blog_category, id_st_blog, position)
            VALUES('.(int)$cat.', '.$this->id.', '.($pos+1).')
            ');
        }
        return $ret;
    }
    public static function getBlogs($p, $n, $order_by = null, $order_way = null, $get_total = false)
	{
	   $id_lang = Context::getContext()->language->id;
                    
        if ($get_total)
		{
			$sql = 'SELECT COUNT(0) AS total
					FROM `'._DB_PREFIX_.'st_blog` b
					'.Shop::addSqlAssociation('st_blog', 'b').'
					WHERE  st_blog_shop.`active` = 1';
			return (int)Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
		}
        
             
       if (!$order_by && !$order_way)
       {
           if (empty($order_by))
    			$order_by = 'id_st_blog';
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
        elseif ($order_by == 'name')
			$order_by_prefix = 'bl';            
		
		$sql = 'SELECT b.*, st_blog_shop.*, bl.*
				FROM `'._DB_PREFIX_.'st_blog` b
				'.Shop::addSqlAssociation('st_blog', 'b').'
				LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` bl
				ON (b.`id_st_blog` = bl.`id_st_blog`
				AND bl.`id_lang` = '.(int)$id_lang.')
			    WHERE st_blog_shop.`active` = 1';

		$sql .= ' ORDER BY '.(isset($order_by_prefix) ? $order_by_prefix.'.' : '').'`'.pSQL($order_by).'` '.pSQL($order_way).'
		LIMIT '.(((int)$p - 1) * (int)$n).','.(int)$n;

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        
		return self::getBlogsDetials((int)$id_lang, $result);
	}
    public static function getRecentArticles($nbr_blogs = 10, $order_by = null, $order_way = null)
    {
        Shop::addTableAssociation('st_blog', array('type' => 'shop'));
        
		$context = Context::getContext();

		$sql = new DbQuery();
		$sql->select(
			'b.*, st_blog_shop.*, bl.*'
		);

		$sql->from('st_blog', 'b');
		$sql->join(Shop::addSqlAssociation('st_blog', 'b'));
		$sql->leftJoin('st_blog_lang', 'bl', '
			b.`id_st_blog` = bl.`id_st_blog`
			AND bl.`id_lang` = '.(int)$context->language->id
		);
		$sql->where('st_blog_shop.`active` = 1');

		$sql->groupBy('st_blog_shop.`id_st_blog`');

		$sql->orderBy($order_by && $order_way ? 'b.'.$order_by.' '.$order_way : 'b.`date_add` DESC');
		$sql->limit($nbr_blogs);
        
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

		if (!$result)
			return false;

		return StBlogClass::getBlogsDetials((int)$context->language->id, $result);
    }
    
    public static function getBlogsDetials($id_lang, $query_result)
	{
		$results_array = array();

		if (is_array($query_result))
			foreach ($query_result as $row)
				if ($row2 = StBlogClass::getBlogDetials($id_lang, $row))
					$results_array[] = $row2;

		return $results_array;
	}
    
    public static function Timeago($datetime, $full = false) {
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
    public static function getBlogDetials($id_lang, $row, Context $context = null)
    {
        if (!$row['id_st_blog'] || !Validate::isUnsignedInt($row['id_st_blog']))
			return false;
        $id_st_blog = $row['id_st_blog'];
        
		if ($context == null)
			$context = Context::getContext();
		
		$cache_key = $id_st_blog.'-'.$id_lang;

		if (isset(self::$blogDetailsCache[$cache_key]))
			return array_merge($row, self::$blogDetailsCache[$cache_key]);

		// Datas
		// $row['categories'] = StBlogClass::getBlogCategories($id_st_blog, (int)$id_lang);
        $row['link'] = $context->link->getModuleLink('stblog', 'article',array('id_st_blog'=>$id_st_blog,'rewrite'=>$row['link_rewrite']));
		$row['timeago'] = StBlogClass::Timeago($row['date_add']);
        if($row['accept_comment'] && Module::isInstalled('stblogcomments') && Module::isEnabled('stblogcomments'))
            $row['comment_counter'] = StBlogCommentClass::countComments($id_st_blog,$context->shop->id);
        if($row['type']==1)
        {
            $cover = StBlogImageClass::getCoverImage($id_st_blog,$id_lang,1);
            $row['covered'] = is_array($cover) && count($cover);
            $row['cover'] = StBlogImageClass::getImageLinks($cover,1);
        }
        if($row['type']==2)
        {
            $cover = StBlogImageClass::getCoverImage($id_st_blog,$id_lang,1);
            if(is_array($cover) && count($cover))
            {
                $row['covered'] = true;
                $row['cover'] = StBlogImageClass::getImageLinks($cover,1);
            }
            else
            {
                $cover = StBlogImageClass::getCoverImage($id_st_blog,$id_lang,2);
                $row['covered'] = is_array($cover) && count($cover);
                $row['cover'] = StBlogImageClass::getImageLinks($cover,2);
            }
            
            $galleries = StBlogImageClass::getGalleries($id_st_blog,$id_lang);
            if($galleries)
            {
                foreach($galleries as &$v)
                    $v = StBlogImageClass::getImageLinks($v,2);
                $row['galleries'] = $galleries;
            }
                    
        }
        if($row['type']==3)
        {
            $cover = StBlogImageClass::getCoverImage($id_st_blog,$id_lang,1);
            $row['covered'] = is_array($cover) && count($cover);
            $row['cover'] = StBlogImageClass::getImageLinks($cover,1);
        }
        
		self::$blogDetailsCache[$cache_key] = $row;
		return self::$blogDetailsCache[$cache_key];
    }
    
    public static function getBlogInfo($id_st_blog, $field='*', $where=1, $id_lang = false, $id_shop = false)
    {
        if (!$id_lang)
            $id_lang = Context::getContext()->language->id;
        if (!$id_shop)
            $id_shop = (int)Shop::getContextShopID();
        return Db::getInstance()->getRow('
        SELECT '.$field.'
        FROM '._DB_PREFIX_.'st_blog b
        INNER JOIN '._DB_PREFIX_.'st_blog_lang bl
        ON(b.`id_st_blog`=bl.`id_st_blog`)
        INNER JOIN '._DB_PREFIX_.'st_blog_shop bs
        ON(b.`id_st_blog`=bs.`id_st_blog`)
        WHERE b.`id_st_blog` = '.(int)$id_st_blog.'
        AND bl.`id_lang`='.(int)$id_lang.'
        AND bs.`id_shop`='.(int)$id_shop.'
        AND b.`active`=1
        '.($where?' AND '.$where:''));
    }
    
    public static function getCategoryBlogs($id_st_blog_category, $where=1, $id_lang=false, $id_shop=false,$orderby=false, $active=true)
    {
        $id_shop = $id_shop ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

		$sql = 'SELECT *
			FROM `'._DB_PREFIX_.'st_blog` b
			INNER JOIN `'._DB_PREFIX_.'st_blog_lang` bl
			ON (b.`id_st_blog` = bl.`id_st_blog`)
            INNER JOIN `'._DB_PREFIX_.'st_blog_shop` bs
			ON (b.`id_st_blog` = bs.`id_st_blog`)
			WHERE '.($where ? $where : '1').'
            AND bs.`id_st_blog_category_default` = '.(int)$id_st_blog_category.'
			AND bs.`id_shop` = '.(int)$id_shop.'
			AND bl.`id_lang` = '.(int)$id_lang.'
			'.($active ? 'AND b.`active` = 1' : '').'
			ORDER BY '.($orderby ? $orderby : '`position`');

		return Db::getInstance()->executeS($sql);
    }
    
	/**
	 * getCategories return an array of categories which this blog belongs to
	 *
	 * @return array of categories
	 */
	public function getCategories($id_lang)
	{
		return StBlogClass::getBlogCategories($this->id, $id_lang);
	}
    public static function getBlogCategories($id_st_blog, $id_lang, $active = true)
    {
		$ret = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.`id_st_blog_category`, cl.`name`, cl.`link_rewrite` 
            FROM `'._DB_PREFIX_.'st_blog_category_blog` cb
			LEFT JOIN `'._DB_PREFIX_.'st_blog_category` c
				ON c.`id_st_blog_category` = cb.`id_st_blog_category`
            LEFT JOIN `'._DB_PREFIX_.'st_blog_category_lang` cl
				ON (cl.`id_st_blog_category` = cb.`id_st_blog_category` AND cl.`id_lang` = '.(int)$id_lang.')
			WHERE cb.`id_st_blog` = '.(int)$id_st_blog.' AND c.`is_root_category` = 0'.
            ($active ? ' AND c.`active` = 1' : '')
		);

		return $ret;
    }

   	/**
	 * Reorder product position in category $id_category.
	 * Call it after deleting a product from a category.
	 *
	 * @param int $id_st_blog_category
	 */
	public static function cleanPositions($id_st_blog_category)
	{
		$return = true;

		$result = Db::getInstance()->executeS('
			SELECT `id_st_blog`
			FROM `'._DB_PREFIX_.'st_blog_category_blog`
			WHERE `id_st_blog_category` = '.(int)$id_st_blog_category.'
			ORDER BY `position`
		');
		$total = count($result);

		for ($i = 0; $i < $total; $i++)
			$return &= Db::getInstance()->update('st_blog_category_blog', array(
				'position' => $i,
			), '`id_st_blog_category` = '.(int)$id_st_blog_category.' AND `id_st_blog` = '.(int)$result[$i]['id_st_blog']);

		return $return;
	}
    
    public function getCategoryPosition($id_cate)
    {
        if (!$id_cate)
            return false;
        return Db::getInstance()->getValue('
        SELECT MAX(position) FROM '._DB_PREFIX_.'st_blog_category_blog
        WHERE id_st_blog_category = '.(int)$id_cate.'
        ');
    }
    
    public function getDefaultCategory()
    {
        if (!$this->id)
            return false;
        return Db::getInstance()->getValue('
        SELECT st_blog_shop.`id_st_blog_category_default`
		FROM `'._DB_PREFIX_.'st_blog` b
		'.Shop::addSqlAssociation('st_blog', 'b').'
		WHERE b.`id_st_blog` = '.(int)$this->id .'
        ');
    }
    
	public static function idIsOnCategoryId($id_st_blog, $categories)
	{
		if (!((int)$id_st_blog > 0) || !is_array($categories) || empty($categories))
			return false;
		$sql = 'SELECT count(0) FROM `'._DB_PREFIX_.'st_blog_category_blog` WHERE `id_st_blog` = '.(int)$id_st_blog.' AND `id_st_blog_category` IN (';
		foreach ($categories as $category)
			$sql .= (int)$category['id_category'].',';
		$sql = rtrim($sql, ',').')';

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
	}
	/**
	* Webservice getter : get virtual field position in category
	*
	* @return int
	*/
	public function getPositionInCategory($id_cateogry=0)
	{
		$result = Db::getInstance()->executeS('SELECT `position`
			FROM `'._DB_PREFIX_.'st_blog_category_blog`
			WHERE `id_st_blog_category` = '.(int)$id_cateogry.'
			AND `id_st_blog` = '.(int)$this->id);
		if (count($result) > 0)
			return $result[0]['position'];
		return '';
	}
   
    public static function getBlogRss($base_url, $limit = 15, $id_st_blog = '')
    {
        if (Shop::isFeatureActive())
            Shop::addTableAssociation('st_blog', array('type' => 'shop'));
        $rs = Db::getInstance()->executeS(
        'SELECT b.*, bl.`content_short`, bl.`link_rewrite`, bl.`name`, bl.`video` 
        FROM '._DB_PREFIX_.'st_blog b
        LEFT JOIN '._DB_PREFIX_.'st_blog_lang bl
        ON(b.id_st_blog = bl.id_st_blog
        AND bl.id_lang = '.(int)Context::getContext()->language->id.')
        '.Shop::addSqlAssociation('st_blog', 'b').'
        WHERE b.`active` = 1'.($id_st_blog ? ' AND b.`id_st_blog` IN('.$id_st_blog.')' : '').'
        ORDER BY date_add DESC
        LIMIT '.$limit.'
        ');
        $ret = array();
        foreach($rs AS $v)
        {
            $id_image = StBlogImageClass::getImageIdByType($v['id_st_blog']);
            if ($id_image)
            {
                $image = new StBlogImageClass(1, $id_image[0]);
                $imgUrl = $image->getImageUrl('medium');
            }
            else
                $imgUrl = '';
            
            $desc = $v['content_short'];
            if ($imgUrl)
                $desc = '<img src="'.$base_url.$imgUrl.'" /><br />'.$desc;
            
            $ret[] = array(
                'title' => $v['name'],
                'desc'  => $desc,
                'link'  => Tools::safeOutput(context::getContext()->link->getModuleLink('stblog','article',array('id_st_blog'=>$v['id_st_blog'],'rewrite'=>$v['link_rewrite']))),
                'pub'   => $v['date_upd']
            );
        }
        return $ret;
    }
    
    /**
	 * Move a product inside its category
	 * @param boolean $way Up (1)  or Down (0)
	 * @param integer $position
	 * return boolean Update result
	 */
	public function updatePosition($way, $position)
	{
		if (!$res = Db::getInstance()->executeS('
			SELECT cp.`id_st_blog`, cp.`position`, cp.`id_st_blog_category`
			FROM `'._DB_PREFIX_.'st_blog_category_blog` cp
			WHERE cp.`id_st_blog_category` = '.(int)Tools::getValue('id_category', 1).'
			ORDER BY cp.`position` ASC'
		))
			return false;

		foreach ($res as $blog)
			if ((int)$blog['id_st_blog'] == (int)$this->id)
				$moved_blog = $blog;

		if (!isset($moved_blog) || !isset($position))
			return false;

		// < and > statements rather than BETWEEN operator
		// since BETWEEN is treated differently according to databases
		return (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_blog_category_blog`
			SET `position`= `position` '.($way ? '- 1' : '+ 1').'
			WHERE `position`
			'.($way
				? '> '.(int)$moved_blog['position'].' AND `position` <= '.(int)$position
				: '< '.(int)$moved_blog['position'].' AND `position` >= '.(int)$position).'
			AND `id_st_blog_category`='.(int)$moved_blog['id_st_blog_category'])
		&& Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_blog_category_blog`
			SET `position` = '.(int)$position.'
			WHERE `id_st_blog` = '.(int)$moved_blog['id_st_blog'].'
			AND `id_st_blog_category`='.(int)$moved_blog['id_st_blog_category']));
	}
    public static function setPageViewed($id_st_blog,$id_shop=null)
	{
	    if($id_shop==null)
            $id_shop = Context::getContext()->shop->id;

		// Try to increment the visits counter
		$sql = 'UPDATE `'._DB_PREFIX_.'st_blog_shop`
				SET `counter` = `counter` + 1
				WHERE `id_st_blog` = '.(int)$id_st_blog.'
					AND `id_shop` = '.(int)$id_shop;
		return Db::getInstance()->execute($sql);
	}
}


