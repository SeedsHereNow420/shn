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
if (!class_exists('PhpThumbFactory'))
    require_once(dirname(__FILE__).'/phpthumb/ThumbLib.inc.php');

define('_PS_ST_BLOG_IMG_DIR_', _PS_UPLOAD_DIR_.'stblog/');
define('_PS_CURRENT_MODULE_IMG_DIR', _MODULE_DIR_.'stblog/views/img/');

class StBlogImageClass extends ObjectModel
{
	public $id;

	/** @var integer Image ID */
	public $id_st_blog_image;

	/** @var integer Blog ID */
	public $id_st_blog;
    
    /** @var integer Image Type: 1 = cover, 2 = gallery */
	public $type;

	/** @var integer Position used to order images of the same blog */
	public $position;

	/** @var string image extension */
	public $image_format = 'jpg';

	/** @var string path to index.php file to be copied to new image folders */
	public $source_index;

	/** @var string image folder */
	protected $folder;

	/** @var string image path without extension */
	protected $existing_path;
    
    /** @var string image type */
	protected $image_type = '1';

	/** @var int access rights of created folders (octal) */
	protected static $access_rights = 0775;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'st_blog_image',
		'primary' => 'id_st_blog_image',
		'multilang' => true,
		'fields' => array(
			'id_st_blog' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
            'type'      => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
			'position' => 	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt')
		),
	);

	protected static $_cacheGetSize = array();
    
    public static $imageTypeDef = array();
    
    public static $imageTypeDefault = array(
        '1'  => array(
            'large'     => 'views/img/large-default.jpg',
            'medium'    => 'views/img/medium-default.jpg',
            'small'     => 'views/img/small-default.jpg',
            'thumb'    => 'views/img/thumb-default.jpg',
        ),
        '2'  => array(
            'large'     => 'views/img/large-default.jpg',
            'medium'    => 'views/img/medium-default.jpg',
            'small'     => 'views/img/small-default.jpg',
            'thumb'    => 'views/img/thumb-default.jpg',
        )
    );

	public function __construct($type = null, $id = null, $id_lang = null)
	{
		parent::__construct($id, $id_lang);
		$this->image_dir = _PS_ST_BLOG_IMG_DIR_;
		$this->source_index = _PS_PROD_IMG_DIR_.'index.php';
        
        if ($type && key_exists($type, self::getDefImageTypes()))
            $this->image_type = (int)$type;
            
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
	}

	public function add($autodate = true, $null_values = false)
	{
		if ($this->position <= 0)
			$this->position = $this->getHighestPosition($this->id_st_blog) + 1;

		return parent::add($autodate, $null_values);
	}

	public function delete()
	{
		if (!parent::delete())
			return false;

		if ($this->hasMultishopEntries())
			return true;

		if (!$this->deleteImage())
			return false;

		// update positions
		$result = Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_blog_image`
			WHERE `id_st_blog` = '.(int)$this->id_st_blog.'
			ORDER BY `position`
		');
		$i = 1;
		if ($result)
			foreach ($result as $row)
			{
				$row['position'] = $i++;
				Db::getInstance()->update($this->def['table'], $row, '`id_st_blog_image` = '.(int)$row['id_st_blog_image'], 1);
			}

		return true;
	}
    
    /**
     * Return image type
     * @return integer Image Type Id
     */
    public function getImageTypeId()
    {
        return $this->image_type;
    }

	/**
	 * Return available images for a blog
	 *
	 * @param integer $id_lang Language ID
	 * @param integer $id_st_blog Blog ID
	 * @return array Images
	 */
	public function getImages($id_lang, $id_st_blog)
	{
		return Db::getInstance()->executeS('
		SELECT *
		FROM `'._DB_PREFIX_.'st_blog_image` i
		LEFT JOIN `'._DB_PREFIX_.'st_blog_image_lang` il 
        ON (i.`id_st_blog_image` = il.`id_st_blog_image`)
		WHERE i.`id_st_blog` = '.(int)$id_st_blog.' AND il.`id_lang` = '.(int)$id_lang.'
        AND i.type = '.(int)$this->getImageTypeId().'
		ORDER BY i.`position` ASC');
	}
    
    public static function getDefImageTypes()
    {
        if (!count(self::$imageTypeDef))
            self::$imageTypeDef = array(
                '1'  => array(
                    'large'     => array(
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_LG_W'), 
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_LG_H')
                    ),
                    'big'     => array(
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_BG_W'), 
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_BG_H')
                    ),
                    'medium'    => array(
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_MD_W'), 
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_MD_H')
                    ),
                    'small'     => array(
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_SM_W'), 
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_SM_H')
                    ),
                    'thumb'     => array(
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_XS_W'), 
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_XS_H')
                    ),
                ),
                '2'  => array(
                    'large'     => array(
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_LG_W'), 
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_LG_H')
                    ),
                    'big'     => array(
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_BG_W'), 
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_BG_H')
                    ),
                    'medium'    => array(
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_MD_W'), 
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_MD_H')
                    ),
                    'small'     => array(
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_SM_W'), 
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_SM_H')
                    ),
                    'thumb'     => array(
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_XS_W'), 
                        (int)Configuration::get('ST_BLOG_IMG_GALLERY_XS_H')
                    ),
                )
            );
        
        return self::$imageTypeDef;
    }

    public static function getCoverImage($id_st_blog, $id_lang, $type=1)
    {        
        $row = Db::getInstance()->getRow('
		SELECT bi.`id_st_blog_image`,bi.`id_st_blog`,bi.`type`
		FROM `'._DB_PREFIX_.'st_blog_image` bi
		LEFT JOIN `'._DB_PREFIX_.'st_blog_image_lang` bil 
        ON (bi.`id_st_blog_image` = bil.`id_st_blog_image`)
		WHERE bi.`id_st_blog` = '.(int)$id_st_blog.' AND bil.`id_lang` = '.(int)$id_lang.'
        AND bi.type = '.$type.'
		ORDER BY bi.`position` ASC');
        if(!$row && $type==2)
            $row = self::getCoverImage($id_st_blog, $id_lang, 1);
            
        return $row;
    }
    
    public static function getGalleries($id_st_blog, $id_lang)
    {        
        $gallery = Db::getInstance()->executeS('
		SELECT bi.`id_st_blog_image`,bi.`id_st_blog`,bi.`type`
		FROM `'._DB_PREFIX_.'st_blog_image` bi
		LEFT JOIN `'._DB_PREFIX_.'st_blog_image_lang` bil 
        ON (bi.`id_st_blog_image` = bil.`id_st_blog_image`)
		WHERE bi.`id_st_blog` = '.(int)$id_st_blog.' AND bil.`id_lang` = '.(int)$id_lang.'
        AND bi.type = 2
		ORDER BY bi.`position` ASC');
        return $gallery;
    }

	/**
	 * Return number of images for a blog
	 *
	 * @param integer $id_st_blog Blog ID
	 * @return integer number of images
	 */
	public function getImagesTotal($id_st_blog)
	{
		$result = Db::getInstance()->getValue('
		SELECT COUNT(`id_st_blog_image`) AS total
		FROM `'._DB_PREFIX_.'st_blog_image`
		WHERE `id_st_blog` = '.(int)$id_st_blog).'
        AND `type` = '.(int)$this->getImageTypeId();
		return $result;
	}

	/**
	 * Return highest position of images for a blog
	 *
	 * @param integer $id_st_blog Blog ID
	 * @return integer highest position of images
	 */
	public function getHighestPosition()
	{
		$result = Db::getInstance()->getRow('
		SELECT MAX(`position`) AS max
		FROM `'._DB_PREFIX_.'st_blog_image`
		WHERE `id_st_blog` = '.(int)$this->id_st_blog.'
        AND `type` = '.(int)$this->getImageTypeId());
		return $result['max'];
	}

	/**
	 * Change an image position and update relative positions
	 *
	 * @param int $way position is moved up if 0, moved down if 1
	 * @param int $position new position of the moved image
	 * @return int success
	 */
	public function updatePosition($way, $position)
	{
		if (!isset($this->id) || !$position)
			return false;

		$result = (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_blog_image`
			SET `position`= `position` '.($way ? '- 1' : '+ 1').'
			WHERE `position`
			'.($way
				? '> '.(int)$this->position.' AND `position` <= '.(int)$position
				: '< '.(int)$this->position.' AND `position` >= '.(int)$position).'
			AND `id_st_blog`='.(int)$this->id_st_blog)
		&& Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'st_blog_image`
			SET `position` = '.(int)$position.'
			WHERE `id_st_blog_image` = '.(int)$this->id_st_blog_image));

		return $result;
	}

	public function getSize($type)
	{
	    $types = self::getDefImageTypes();
        return $types[$this->image_type][$type];
	}

	/**
	 * Delete the product image from disk and remove the containing folder if empty
	 * Handles both legacy and new image filesystems
	 */
	public function deleteImage($force = true)
	{
		if (!$this->id)
			return false;

		// Can we delete the image folder?
		if (is_dir($this->image_dir.$this->getImgFolder()))
		{
			$delete_folder = true;
			foreach (scandir($this->image_dir.$this->getImgFolder()) as $file)
            {
                if (($file != '.' && $file != '..'))
                    @unlink($this->image_dir.$this->getImgFolder().$file);
            }	
			
            // Is deleted all?	
            foreach (scandir($this->image_dir.$this->getImgFolder()) as $file)
			if (($file != '.' && $file != '..'))
            {
				$delete_folder = false;
				break;
			}
		}
		if (isset($delete_folder) && $delete_folder)
			@rmdir($this->image_dir.$this->getImgFolder());

		return true;
	}

	/**
	 * Recursively deletes all product images in the given folder tree and removes empty folders.
	 *
	 * @param string $path folder containing the product images to delete
	 * @param string $format image format
	 * @return bool success
	 */
	public static function deleteAllImages($path, $format = 'jpg')
	{
		if (!$path || !$format || !is_dir($path))
			return false;
		foreach (scandir($path) as $file)
		{
			if (preg_match('/^[0-9]+(\-(.*))?\.'.$format.'$/', $file))
				unlink($path.$file);
			else if (is_dir($path.$file) && (preg_match('/^[0-9]$/', $file)))
				StBlogImageClass::deleteAllImages($path.$file.'/', $format);
		}

		// Can we remove the image folder?
		if (is_numeric(basename($path)))
		{
			$remove_folder = true;
			foreach (scandir($path) as $file)
				if (($file != '.' && $file != '..' && $file != 'index.php'))
				{
					$remove_folder = false;
					break;
				}

			if ($remove_folder)
			{
				// we're only removing index.php if it's a folder we want to delete
				if (file_exists($path.'index.php'))
					@unlink ($path.'index.php');
				@rmdir($path);
			}
		}

		return true;
	}

	/**
	 * Returns the path to the folder containing the image in the new filesystem
	 *
	 * @return string path to folder
	 */
	public function getImgFolder()
	{
		if (!$this->id)
			return false;

		if (!$this->folder)
			$this->folder = $this->getImageTypeId().'/'.$this->id_st_blog.'/'.$this->id.'/';

		return $this->folder;
	}

	/**
	 * Create parent folders for the image in the new filesystem
	 *
	 * @return bool success
	 */
	public function createImgFolder()
	{
		if (!$this->id)
			return false;

		if (!is_dir(_PS_ST_BLOG_IMG_DIR_.$this->getImgFolder()))
			return $this->createFolder(_PS_ST_BLOG_IMG_DIR_.$this->getImgFolder());
		return true;
	}
    
    /**
	 * Create folder in the new filesystem
	 *
	 * @return bool success
	 */
     public function createFolder($forder = '')
     {
        if (!$forder)
            $forder = _PS_ST_BLOG_IMG_DIR_;
        if (!is_dir($forder))
		{
			// Apparently sometimes mkdir cannot set the rights, and sometimes chmod can't. Trying both.
			$success = @mkdir($forder, self::$access_rights, true);
			$chmod = @chmod($forder, self::$access_rights);

			// Create an index.php file in the new folder
			if (($success || $chmod)
				&& !file_exists($forder.'index.php')
				&& file_exists($this->source_index))
				    return @copy($this->source_index, $forder.'index.php');
		}
        return true;
     }

	/**
	 * Returns the path where a blog image should be created (without file format)
	 *
	 * @return string path
	 */
	public function getPathForCreation()
	{
		if (!$this->id)
			return false;

		$path = $this->getImgFolder();
		$this->createImgFolder();
		
		return _PS_ST_BLOG_IMG_DIR_.$path;
	}
    
    /**
	 * Returns the image types for auto resizing.
	 *
	 * @return array
	 */
    public function getImageTypes()
    {
        $ret = array();
        $types = self::getDefImageTypes();
        if (key_exists($this->image_type, $types))
        {
            $ret = $types[$this->image_type];
        }
        return $ret;
    }
    
    /**
	 * Returns the image name without extension.
	 *
	 * @return string
	 */
    public function getImageName()
    {
        if (!$this->id)
            return false;
        return $this->id_st_blog.$this->id;
    }
    
    /**
	 * Upload image and auto resizing.
     * Return true when uploading successful
	 *
	 * @return boolen
	 */ 
    public function uploadImage($name)
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
				return Tools::displayError('Due to memory limit restrictions, this image cannot be loaded. Please increase your memory_limit value via your server\'s configuration settings. ');

            $ext = $this->image_format;
            $file = $this->getPathForCreation().$this->getImageName().'.'.$ext;
			if (!ImageManager::resize($tmp_name, $file, null, null, $ext))
				return Tools::displayError('An error occurred while uploading the image.');
            
            if (!$this->cropImages($tmp_name));
			     return false;
            
            @unlink($tmp_name);
            
			return true;
		}
		return false;
	}
    
    /**
	 * Resize image.
	 *
	 * @return boolean
	 */ 
    public function resizeImages($tmp_file)
    {
        if (!is_file($tmp_file))
            return false;
        
        $ext = $this->image_format;
        
        $folder = $this->getPathForCreation();
        $file   = $this->getImageName();
        
        $ret    = true;
        foreach($this->getImageTypes() AS $key => $type)
        {
            if (!is_array($type) && count($type) < 2)
                continue;
            $ret &= ImageManager::resize($tmp_file, $folder.$file.$key.'.'.$ext, (int)$type[0], (int)$type[1], $ext);
        }
        return $ret;
    }
    
    /**
     * Crop image
     * @return boolean
     */
    public function cropImages($tmp_file)
    {
       if (!is_file($tmp_file))
            return false;
        
        $ext = $this->image_format;
        
        $folder = $this->getPathForCreation();
        $file   = $this->getImageName();
        
        $ret    = true;
        foreach($this->getImageTypes() AS $key => $type)
        {
            if (!is_array($type) && count($type) < 2)
                continue;
                
            // Is image smaller than dest? fill it with white!
            $tmp_file_new = $tmp_file;
            list($src_width, $src_height) = getimagesize($tmp_file);
            if (!$src_width || !$src_height)
                continue;
            
            $width  = (int)$type[0];
            $height = $type[1] > 0 ? (int)$type[1] : $src_height;
            if ($src_width < $width || $src_height < $height)
            {
                $tmp_file_new = $tmp_file.'_new';
                ImageManager::resize($tmp_file, $tmp_file_new, $width, $height);
            }
                
            $options = array('jpegQuality' => Configuration::get('PS_JPEG_QUALITY') ? Configuration::get('PS_JPEG_QUALITY') : 80);
            $thumb = PhpThumbFactory::create($tmp_file_new, $options);
            if (!$type[1])
                $thumb->adaptiveResizeWidth($width);
            else
                $thumb->adaptiveResize($width, $height);
            $thumb->save($folder.$file.$key.'.'.$ext);
            $ret &= ImageManager::isRealImage($folder.$file.$key.'.'.$ext);
        }
        
        if (file_exists($tmp_file.'_new'))
            @unlink($tmp_file.'_new');
        
        return $ret; 
    }
    
    /**
	 * Prepare post data.
	 *
	 * @return boolean
	 */ 
    public function preparePost()
    {
        if (!Tools::getValue('id_st_blog'))
            return false;
        $this->id_st_blog = Tools::getValue('id_st_blog');
        $this->type = (int)$this->getImageTypeId();
        
        return true;
    }
    
    /**
     * Set ID Shop
     */
     public function setShopList($id_shop = array())
     {
        if (!is_array($id_shop))
            $id_shop = (array)$id_shop;
            
        $this->id_shop_list = $id_shop;
        return $this;
     }
     
     /** 
      * Save data and image
      */
     public function save($name = '', $hxr = false)
     {
        if (!$name && !$hxr)
            return false;
            
        if (!is_dir(_PS_ST_BLOG_IMG_DIR_))
            $this->createFolder();
            
        if (!is_writable(_PS_ST_BLOG_IMG_DIR_))
            return '-1';
        
        if ($this->id && !$this->delete())
            return false;
        
        if (!$this->preparePost() || !$this->add())
            return false;
        
        if ($hxr)
            return $this->ajaxUpload();
        
        return $this->uploadImage($name);
     }
     
     /** 
      * Build and return image url
      */
     public function getImageUrl($type = '')
     {
        $image = $this->image_dir.$this->getImgFolder().$this->getImageName().$type.'.'.$this->image_format;
        if (file_exists($image))
            return rtrim(__PS_BASE_URI__,'/').str_replace(_PS_ROOT_DIR_, '', $image);
         
        // Is the image in current module?
        return _PS_CURRENT_MODULE_IMG_DIR.$type.'-default.jpg';
     }
    public static function getImageLinks($image,$type=null)
	{
        //do not use default image, posts can be iamge free
        if(!is_array($image) || !count($image))
            return false;
	    if($type==null && $image)
            $type = $image['type'];
        $types = self::getDefImageTypes();
        if(!$type || !array_key_exists($type, $types))
            $type = 1;
            
	    $upload_folder = _THEME_PROD_PIC_DIR_.'stblog/';
	    $st_blog_folder = _MODULE_DIR_.'stblog/';
        
        //$use_default = !is_array($image) || !count($image);
        $use_default = false;
        
	    foreach($types[$type] as $k=>$v)
        {
            if($use_default)
                $uri_path = $st_blog_folder.'views/img/'.$k.'-default.jpg';
            else
            {
                $file = $type.'/'.$image['id_st_blog'].'/'.$image['id_st_blog_image'].'/'.$image['id_st_blog'].$image['id_st_blog_image'].$k.'.jpg';
                $uri_path = $upload_folder.$file;
            }
           
            if (!$use_default && !file_exists(_PS_ROOT_DIR_ . str_replace(__PS_BASE_URI__,'/',$uri_path)))
                $uri_path = _PS_CURRENT_MODULE_IMG_DIR.$file;
                
            $image['links'][$k]['image'] = context::getContext()->link->protocol_content.Tools::getMediaServer($uri_path).$uri_path;
            $image['links'][$k]['width'] = $v[0];
            $image['links'][$k]['height'] = $v[1];
        }
        return $image;
	}
    /** 
      * Upload image with ajax
      */ 
    public function ajaxUpload()
	{
	    $path = $this->getPathForCreation().$this->getImageName().'.'.$this->image_format;
		$input = fopen('php://input', 'r');
		$target = fopen($path, 'w');

		$realSize = stream_copy_to_stream($input, $target);
		if ($realSize != (int)$_SERVER['CONTENT_LENGTH'])
			return false;

		fclose($input);
		fclose($target);
        
        return $this->cropImages($path);
	}
    
    /** 
      * Return image id by type
      */
    public static function getImageIdByType($id_st_blog = 0, $type = '1')
    {
        $ret = array();
        if (!$id_st_blog || !$type)
            return $ret;
        $id_lang = Context::getContext()->language->id;
        
        $types = self::getDefImageTypes();
        
        if (!key_exists($type, $types))
            return $ret;
        
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
            
        $rs = Db::getInstance()->executeS('
        SELECT DISTINCT(i.id_st_blog_image) FROM '._DB_PREFIX_.'st_blog_image i
        LEFT JOIN '._DB_PREFIX_.'st_blog_image_lang il
        ON(i.id_st_blog_image = il.id_st_blog_image
        AND il.id_lang = '.(int)$id_lang.')
        '.Shop::addSqlAssociation('st_blog_image', 'i').'
        WHERE i.id_st_blog = '.(int)$id_st_blog.'
        AND `type` = '.(int)$type.'
        ORDER BY `position`
        ');
        
        $ret = array();
        foreach($rs AS $v)
        {
            $ret[] = $v['id_st_blog_image'];
        }
        return $ret;
    }
    public function refreshPositions()
    {
        if (!$this->id || !$this->image_type)
            return false;
        $rs = Db::getInstance()->executeS('
        SELECT id_st_blog_image FROM '._DB_PREFIX_.'st_blog_image
        WHERE id_st_blog = '.(int)$this->id_st_blog.'
        AND type = '.(int)$this->image_type.'
        ');
        foreach($rs AS $k => $v)
            Db::getInstance()->execute('
            UPDATE '._DB_PREFIX_.'st_blog_image
            SET position = '.($k+1).'
            WHERE id_st_blog_image = '.(int)$v['id_st_blog_image'].'
            ');
    }
}
