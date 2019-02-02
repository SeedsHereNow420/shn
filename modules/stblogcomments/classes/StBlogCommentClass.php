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

class StBlogCommentClass extends ObjectModel
{
	public $id;
    
    	/** @var string Name */
	public $name;

	/** @var boolean Status for display */
	public $active = 1;

	/** @var integer Customer ID */
	public $id_customer;

	/** @var integer Guest's id */
	public $id_guest;

	/** @var integer Blog ID */
	public $id_st_blog;
    
	/** @var integer Shop ID */
	public $id_shop;

	/** @var integer Parent ID */
	public $id_parent;

	/** @var string Customer Name */
	public $customer_name;

	/** @var string Customer Email */
	public $customer_email;
    
    /** @var string Customer Comment */
	public $content;
    
    /** @var string Customer Comment */
	public $customer_website;

	/** @var string Object creation date */
	public $date_add;
    
    /** Image format*/
    const IMAGE_FORMAT = 'jpg';
    
    /** avatar default path */
    const AVATAR_PATH = '/upload/stblog/avatar/';
    
    /** avatar default image */
    const AVATAR_DEFAULT = 'modules/stblogcomments/views/img/avatar/';

    /** @var string avatar image thumbnail type */
    public static $avatarDef = array(
        'small' => array(56, 56),
        'large' => array(120, 120)
    );

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'st_blog_comment',
		'primary' => 'id_st_blog_comment',
		'fields' => array(
			'active' => 			array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
			'id_parent' => 			array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_st_blog' => 		array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_shop' => 		    array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'id_customer' => 		array('type' => self::TYPE_INT),
            'id_guest' =>           array('type' => self::TYPE_INT),
			'date_add' => 			array('type' => self::TYPE_DATE, 'validate' => 'isDate'),


			'customer_name' => 		array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'required' => true, 'size' => 64),
			'customer_email' => 	array('type' => self::TYPE_STRING, 'validate' => 'isEmail', 'size' => 64),
			'content' =>   array('type' => self::TYPE_STRING, 'validate' => 'isMessage', 'size' => 65535, 'required' => true),
			'customer_website' => 	array('type' => self::TYPE_STRING, 'validate' => 'isUrl', 'size' => 128),
		)
           
	);
    public static function getAll($id_parent=0, $active=false)
    {
        return Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'st_blog_comment
        WHERE `id_parent`='.(int)$id_parent.'
        AND `id_shop` = '.(int)Context::getContext()->shop->id.'
        '.($active ? ' AND `active`=1' : '').'            
        ');
    }
    public function copyFromPost()
	{
		/* Classical fields */
		foreach ($_POST AS $key => $value)
			if (key_exists($key, $this) && $key != 'id_'.$this->table && !isset($_FILES[$key]))
				$this->{$key} = $value;
	}
    public static function countComments($id_st_blog,$id_shop=0,$active=true)
    {
        if (!$id_st_blog || !Validate::isUnsignedInt($id_st_blog) || !Validate::isUnsignedInt($id_shop))
            return 0;
            
        $where = '`id_st_blog` = '.$id_st_blog;
        $id_shop && $where .= ' AND `id_shop` = '.$id_shop;
        $active && $where .= ' AND `active` = 1';
        
        return Db::getInstance()->getValue('
        SELECT COUNT(0) FROM '._DB_PREFIX_.'st_blog_comment
        WHERE '.$where
        );
    }
    public static function getCommentsRss($base_url, $limit = 15)
    {
        if (Shop::isFeatureActive())
            Shop::addTableAssociation('st_blog', array('type' => 'shop'));
        $rs = Db::getInstance()->executeS('
        SELECT c.*,bl.* FROM '._DB_PREFIX_.'st_blog_comment c
        LEFT JOIN '._DB_PREFIX_.'st_blog_lang bl
        ON(c.id_st_blog = bl.id_st_blog
        AND bl.id_lang = '.Context::getContext()->language->id.')
        '.Shop::addSqlAssociation('st_blog_comment', 'c').'
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
                $imgUrl = $image->getImageUrl('small');    
            }
            else
                $imgUrl = '';
            
            $desc = $v['content'];
            if ($imgUrl)
                $desc = '<img src="'.$base_url.$imgUrl.'" />'.$desc;
            
            $ret[] = array(
                'title' => $v['name'],
                'desc'  => $desc,
                'link'  => Tools::safeOutput($this->context->link->getModuleLink('stblog','stblog',array('id_st_blog'=>$v['id_st_blog'],'rewrite'=>$v['link_rewrite']))),
                'pub'   => date('Y-m-d H:i:s')
            );
        }
        return $ret;
    }
    
	/**
	 * Return customer's comment
	 *
	 * @return arrayComments
	 */
	public static function getByCustomer($id_customer, $p = 1, $n = 0, $id_lang, $id_shop, $get_total = false)
	{
		if (!Validate::isUnsignedId($id_customer) || !Validate::isUnsignedId($id_lang) || !Validate::isUnsignedId($id_shop))
			die(Tools::displayError('Param error'));
            
		$active = Configuration::get('ST_BLOG_C_MODERATE');
		$p = (int)$p;
		$n = (int)$n;
		if ($p <= 1)
			$p = 1;
            
        if ($get_total)
		{
			$sql = 'SELECT COUNT(0)
					FROM `'._DB_PREFIX_.'st_blog_comment`
					WHERE `id_shop` = '.$id_shop.'
                    AND `id_customer`='.$id_customer.
					($active ? ' AND `active` = 1' : '');
			return (int)Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
		}

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT bc.`id_st_blog_comment`,bc.`id_st_blog`,bc.`id_customer`,bc.`id_guest`,IF(c.`id_customer`, CONCAT(c.`firstname`, \' \',  c.`lastname`), bc.customer_name) customer_name,IF(c.`id_customer`, c.`email`, bc.customer_email) customer_email, bc.`content`, bc.`date_add`,bl.`name`,bl.`link_rewrite`
        FROM `'._DB_PREFIX_.'st_blog_comment` bc
		LEFT JOIN `'._DB_PREFIX_.'customer` c ON c.`id_customer` = bc.`id_customer`
        LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` bl ON bl.`id_st_blog` = bc.`id_st_blog`   
		WHERE bc.`id_customer` = '.(int)$id_customer.'
        AND bl.`id_lang` = '.(int)$id_lang.'
        AND bc.`id_shop` = '.(int)$id_shop.
        ($active == '1' ? ' AND bc.`active` = 1' : '').'
		ORDER BY bc.`date_add` DESC
		'.($n ? 'LIMIT '.(int)(($p - 1) * $n).', '.(int)($n) : ''));
	}
    public static function getBlogLatestCommentByCustomer($id_st_blog, $id_customer, $id_guest = false)
    {
        $results = Db::getInstance()->getRow('
			SELECT *
			FROM `'._DB_PREFIX_.'st_blog_comment` bc
			WHERE bc.`id_st_blog` = '.(int)$id_st_blog.'
			AND '.(!$id_guest ? 'bc.`id_customer` = '.(int)$id_customer : 'bc.`id_guest` = '.(int)$id_guest).'
			ORDER BY bc.`date_add` DESC'
		);

		return $results;
    }
	/**
	 * Get comments by ID
	 *
	 * @return array Comments
	 */
	public static function getByBlog($id_st_blog, $p = 1, $n = 0, $id_shop = null)
	{
		if (!Validate::isUnsignedId($id_st_blog))
			die(Tools::displayError('Param error'));
            
        if($id_shop==null)
            $id_shop = (int)Context::getContext()->shop->id;
            
		$active = Configuration::get('ST_BLOG_C_MODERATE');
		$p = (int)$p;
		$n = (int)$n;
		if ($p <= 1)
			$p = 1;

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT bc.`id_st_blog_comment`,bc.`id_st_blog`,bc.`id_customer`,bc.`id_guest`,IF(c.`id_customer`, CONCAT(c.`firstname`, \' \',  c.`lastname`), bc.customer_name) customer_name,IF(c.`id_customer`, c.`email`, bc.customer_email) customer_email, bc.`content`, bc.`date_add`
		FROM `'._DB_PREFIX_.'st_blog_comment` bc
		LEFT JOIN `'._DB_PREFIX_.'customer` c ON c.`id_customer` = bc.`id_customer`
		WHERE bc.`id_st_blog` = '.(int)($id_st_blog).
        ' AND bc.`id_shop` = '.(int)$id_shop.
        ($active == '1' ? ' AND bc.`active` = 1' : '').'
		ORDER BY bc.`date_add` DESC
		'.($n ? 'LIMIT '.(int)(($p - 1) * $n).', '.(int)($n) : ''));
	}
    
	/**
	 * Get comments by ID
	 *
	 * @return array Comments
	 */
	public static function getByBlogRec($id_st_blog, $id_parent = 0, $id_shop = null)
	{
		if (!Validate::isUnsignedId($id_st_blog))
			die(Tools::displayError('Param error'));
            
        if($id_shop==null)
            $id_shop = (int)Context::getContext()->shop->id;
            
		$active = Configuration::get('ST_BLOG_C_MODERATE');
		$comments = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT bc.`id_st_blog_comment`,bc.`id_st_blog`,bc.`id_customer`,bc.`id_guest`,IF(c.`id_customer`, CONCAT(c.`firstname`, \' \',  c.`lastname`), bc.customer_name) customer_name,IF(c.`id_customer`, c.`email`, bc.customer_email) customer_email, bc.`content`, bc.`date_add`
		FROM `'._DB_PREFIX_.'st_blog_comment` bc
		LEFT JOIN `'._DB_PREFIX_.'customer` c ON c.`id_customer` = bc.`id_customer`
		WHERE bc.`id_st_blog` = '.(int)($id_st_blog).
        ' AND bc.`id_parent` = '.(int)$id_parent.
        ' AND bc.`id_shop` = '.(int)$id_shop.
        ($active == '1' ? ' AND bc.`active` = 1' : '').'
		ORDER BY bc.`date_add` DESC');
        if(is_array($comments) && count($comments))
            foreach($comments as &$comment)
            {
                $comment['avatar'] = StBlogCommentClass::getAvatar($comment['id_customer']);
                $comment['child'] = StBlogCommentClass::getByBlogRec($id_st_blog,$comment['id_st_blog_comment'],$id_shop);
            }
                
        return $comments;
	}
    
    public static function getLatestComments($nbr, $id_lang, $id_shop = null)
    {
        if(!$nbr || !validate::isUnsignedInt($nbr))
            $nbr = 4;
		$active = Configuration::get('ST_BLOG_C_MODERATE');
        $comments = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT bc.`id_st_blog_comment`,bc.`id_st_blog`,bc.`id_customer`,bc.`id_guest`,IF(c.`id_customer`, CONCAT(c.`firstname`, \' \',  c.`lastname`), bc.customer_name) customer_name,IF(c.`id_customer`, c.`email`, bc.customer_email) customer_email, bc.`content`, bc.`date_add`,bl.`name`,bl.`link_rewrite`
		FROM `'._DB_PREFIX_.'st_blog_comment` bc
		LEFT JOIN `'._DB_PREFIX_.'customer` c ON c.`id_customer` = bc.`id_customer`
        LEFT JOIN `'._DB_PREFIX_.'st_blog` b ON b.`id_st_blog` = bc.`id_st_blog` 
        LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` bl ON bl.`id_st_blog` = bc.`id_st_blog`      
		WHERE bl.`id_lang` = '.(int)$id_lang.($id_shop ? ' AND bc.`id_shop` = '.(int)$id_shop : '').
        ($active == '1' ? ' AND bc.`active` = 1' : '').'
        AND b.`accept_comment` > 0
		ORDER BY bc.`date_add` DESC
        Limit '.$nbr);
        
        if(is_array($comments) && count($comments))
            foreach($comments as &$comment)
                $comment['avatar'] = StBlogCommentClass::getAvatar($comment['id_customer']);
        return $comments;
    }
    
    public static function getParentsComments($id_current = 1)
	{
	    $id_lang = Context::getContext()->language->id;
		$id_current = $id_current;
		while (true)
		{
			$query = '
				SELECT c.*
				FROM `'._DB_PREFIX_.'st_blog_comment` c
				WHERE c.`id_st_blog_comment` = '.(int)$id_current.'
			';
			$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);

            if (!isset($result[0]))
            {
                $categories[] = array(
                    'id_st_blog_comment'    => 0,
                    'id_parent'             => 0,
                    'title'                 => '',
                    'level_depth'           => 0,
                    'active'                => 1
                );
            }
            else
			 $categories[] = $result[0];
			if (!$result || $result[0]['id_parent'] == 0)
				return $categories;
			$id_current = $result[0]['id_parent'];
		}
	}
    
    public static function getAvatarPath()
    {
        return self::AVATAR_PATH.self::getCustomerId().'/';
    }
    
    public static function getAvatarPathForCreation($force = true)
    {
        $path = rtrim(_PS_ROOT_DIR_, '/').self::getAvatarPath();
        if (!is_dir($path) && $force)
        {
            //Be carefully, the mod is Octal numbers instead of string!!
       	    @mkdir($path, 0755, true);
            @chmod($path, 0755);
        }
        
        if (is_dir($path))
            return $path;
        
        return false;
    }
    
    public static function getAvatar($customer_id = 0, $type = 'small')
    {
        $rd = '?rd='.rand(0,100000);
        $file = $customer_id.$type.'.'.self::IMAGE_FORMAT;
        if (file_exists(rtrim(_PS_ROOT_DIR_, '/').self::AVATAR_PATH.$customer_id.'/'.$file))
            return rtrim(__PS_BASE_URI__,'/').self::AVATAR_PATH.$customer_id.'/'.$file.$rd;
        if ($avatar = self::getAvatarDefault($type))
            return $avatar.$rd;
        
        return __PS_BASE_URI__.self::AVATAR_DEFAULT.$type.'.'.self::IMAGE_FORMAT.$rd;
    }
    
    public static function getAvatarDefault($type = 'small')
    {
        $id = self::getDefaultId();
        $image = self::AVATAR_PATH.$id.'/'.$id.$type.'.'.self::IMAGE_FORMAT;
        if (file_exists(rtrim(_PS_ROOT_DIR_,'/').$image))
            return rtrim(__PS_BASE_URI__,'/').$image;
            
        return false;
    }
    
    public function uploadAvatar($name)
    {
        if (isset($_FILES[$name]['tmp_name']) && !empty($_FILES[$name]['tmp_name']))
		{
			// Check image validity
			$max_size  = (int)Configuration::get('PS_PRODUCT_PICTURE_MAX_SIZE');
			if ($error = ImageManager::validateUpload($_FILES[$name], Tools::getMaxUploadSize($max_size)))
				return $error;

			$tmp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
			if (!$tmp_name)
				return false;

			if (!move_uploaded_file($_FILES[$name]['tmp_name'], $tmp_name))
				return false;

			// Evaluate the memory required to resize the image: if it's too much, you can't resize it.
			if (!ImageManager::checkImageMemoryLimit($tmp_name))
				return -1;

            $ext    = self::IMAGE_FORMAT;
            $name   = self::getCustomerId();
            $folder = self::getAvatarPathForCreation();
            $file   = $folder.$name.'.'.$ext;
            
            if (!$folder || !is_writable($folder))
                return -2;
            
            // Delete exists image
            $this->deleteImage($folder, false);
            
			if (!ImageManager::resize($tmp_name, $file, null, null, $ext))
				return false;
        
            if (!class_exists('PhpThumbFactory'))
                require_once _PS_MODULE_DIR_.'stblog/classes/StBlogImageClass.php';
            $ret = true;
            foreach(self::$avatarDef AS $key => $type)
            {
                if (!is_array($type) && count($type) < 2)
                    continue;
                $thumb = PhpThumbFactory::create($tmp_name);
                $thumb->adaptiveResize((int)$type[0], (int)$type[1]);
                $thumb->save($folder.$name.$key.'.'.$ext, $ext);
                $ret &= ImageManager::isRealImage($folder.$name.$key.'.'.$ext);
            }
            
            @unlink($tmp_name);
            
			return true;
		}
		return false;
    }
    
    public static function getCustomerId()
    {
        if (defined('_PS_ADMIN_DIR_'))
            return self::getDefaultId();
        
        return (int)Context::getContext()->customer->id;
    }
    
    public static function getDefaultId()
    {  
        return '_default_';
    }
    
    public function deleteImage($path = '', $delete_fold = true)
    {
        if (!is_dir($path))
            return false;
           
        if (preg_match('/stblogcomments/', $path))
            return false;
        
        foreach (scandir($path) as $file)
        {
            if (($file != '.' && $file != '..'))
                @unlink($path.$file);
        }
        // Check deleted or not
        $deleted_all = true;
        
        foreach (scandir($path) as $file)
        {
            if (($file != '.' && $file != '..'))
            {
                $deleted_all = false;
                break;
            }            
        }
        
        if ($delete_fold && $deleted_all)
            @rmdir($path);
        
        return $deleted_all;
    }
    
    public function delete()
    {
        $to_delete = array((int)$this->id);
        $this->recursiveDelete($to_delete, (int)$this->id);
		$to_delete = array_unique($to_delete);
        $where = 'id_st_blog_comment IN ('.implode(',', $to_delete).')';
        return Db::getInstance()->delete('st_blog_comment', $where);
    }
    
    protected function recursiveDelete(&$to_delete, $id_st_blog_comment)
	{
	 	if (!is_array($to_delete) || !$id_st_blog_comment)
	 		die(Tools::displayError());

		$result = Db::getInstance()->executeS('
		SELECT `id_st_blog_comment`
		FROM `'._DB_PREFIX_.'st_blog_comment`
		WHERE `id_parent` = '.(int)$id_st_blog_comment);
		foreach ($result as $row)
		{
			$to_delete[] = (int)$row['id_st_blog_comment'];
			$this->recursiveDelete($to_delete, (int)$row['id_st_blog_comment']);
		}
	}
    
    public static function countChild(&$count, $id_parent = 0)
    {
        if (!isset($count['all']))
            $count['all'] = 0;
            
        if (!isset($count['accept']))
            $count['accept'] = 0;
            
        $rs = Db::getInstance()->executeS('
        SELECT id_st_blog_comment, active
        FROM '._DB_PREFIX_.'st_blog_comment
        WHERE id_parent = '.$id_parent.'
        ');
        
        if (!$rs)
            return '';
        foreach($rs AS $v)
        {
            $count['all']++;
            if ($v['active'])
                $count['accept']++;
            self::countChild($count, $v['id_st_blog_comment']);
        }
    }
    
    public static function blogAcceptComment($id_st_blog)
    {
        if (!$id_st_blog)
            return false;
        return Db::getInstance()->getValue('
        SELECT accept_comment FROM `'._DB_PREFIX_.'st_blog`
        WHERE id_st_blog = '.(int)$id_st_blog.'
        ') > 0;
    }
}



