<?php
/*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class StEasyContentClass extends ObjectModel
{
	/** @var integer reinsurance id*/
	public $id;
    /** @var integer */
	public $type;
	/** @var integer */
	public $location;
	/** @var bool*/
	public $hide_on_mobile;
	/** @var bool*/
	public $active;
	/** @var integer */
	public $position;
	/** @var string banner title*/
	public $title;
	/** @var string banner url*/
	public $url;
	/** @var string reinsurance text*/
	public $text;
    /** @var integer */
	public $id_category;
    /** @var integer */
	public $id_manufacturer;
    /** @var integer */
	public $id_cms;
    /** @var integer */
	public $id_product;
    /** @var integer */
	public $id_st_blog;
    /** @var string */
    public $module;
    /** @var string */
    public $module_align;
	/** @var string */
    public $text_color;
	/** @var string */
    public $link_color;
	/** @var string */
    public $link_hover;
	/** @var string */
    public $text_bg;
    /** @var integer */
    public $text_align;
	/** @var integer */
    public $mobile_text_align;
    /** @var integer */
	public $margin_top;
    /** @var integer */
	public $margin_bottom;
    /** @var integer */
	public $width;
	/** @var string */
    public $btn_color;
	/** @var string */
    public $btn_bg;
	/** @var string */
    public $btn_hover_color;
	/** @var string */
    public $btn_hover_bg;
    /** @var string */
    public $top_spacing; 
    /** @var string */
    public $bottom_spacing;
    /** @var integer */
    public $display_on; 
    /** @var integer*/
    public $bg_pattern;
	/** @var string */
    public $bg_img;
	/** @var string */
    public $video_poster;
    /** @var integer */
    public $bg_img_width;
    /** @var integer */
    public $bg_img_height;
    /** @var integer */
    public $speed;
    /** @var integer */
    public $bg_img_v_offset;
    /** @var integer */
    public $video_v_offset;
    /** @var string */
    public $mpfour;
    /** @var string */
    public $webm;
    /** @var string */
    public $ogg;
    /** @var boolen */  
    public $loop;
    /** @var boolen */
    public $muted;
    /** @var integer */
    public $title_align;
    /** @var integer */
    public $title_font_size;
    /** @var string */
    public $title_color;
    /** @var string */
    public $title_bottom_border;
    /** @var string */
    public $title_bottom_border_color;
    /** @var string */
    public $title_bottom_border_color_h;
    /** @var integer */
    public $full_screen;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_easy_content',
		'primary'   => 'id_st_easy_content',
		//'multilang_shop' => true,
		'multilang' => true,
		'fields'    => array(
            'type'            => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'location'        => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'hide_on_mobile'  => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'active'          => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'position'        => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'id_category'     => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_product'      => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'id_manufacturer' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_cms'          => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_st_blog'      => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'module'          => array('type' => self::TYPE_STRING, 'size' => 64),
            'module_align'    => array('type' => self::TYPE_STRING, 'size' => 32),
            'display_on'      => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'text_color'      => array('type' => self::TYPE_STRING, 'size' => 7),
			'link_color'      => array('type' => self::TYPE_STRING, 'size' => 7),
			'link_hover'      => array('type' => self::TYPE_STRING, 'size' => 7),
			'text_bg'         => array('type' => self::TYPE_STRING, 'size' => 7),
            'text_align'      => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'mobile_text_align'      => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'margin_top'      => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'margin_bottom'   => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'width'           => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'btn_color'       => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_bg'          => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_hover_color' => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_hover_bg'    => array('type' => self::TYPE_STRING, 'size' => 7),
            'top_spacing'     => array('type' => self::TYPE_STRING, 'size' => 10),
            'bottom_spacing'  => array('type' => self::TYPE_STRING, 'size' => 10),
            'bg_pattern'          =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'bg_img'            => array('type' => self::TYPE_STRING, 'validate' => 'isAnything', 'size' => 255),
            'video_poster'      => array('type' => self::TYPE_STRING, 'validate' => 'isAnything', 'size' => 255),
			'bg_img_width'      => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'bg_img_height'     => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'speed'             => array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
			'bg_img_v_offset'   => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'video_v_offset'    => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'mpfour'            => array('type' => self::TYPE_STRING, 'size' => 255),
            'webm'              => array('type' => self::TYPE_STRING, 'size' => 255),
            'ogg'               => array('type' => self::TYPE_STRING, 'size' => 255),
            'loop'              => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'muted'             => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'title_align'             => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'title_font_size'             => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'title_color'             => array('type' => self::TYPE_STRING, 'size' => 7),
            'title_bottom_border_color'             => array('type' => self::TYPE_STRING, 'size' => 7),
            'title_bottom_border_color_h'             => array('type' => self::TYPE_STRING, 'size' => 7),
            'title_bottom_border'     => array('type' => self::TYPE_STRING, 'size' => 10),
            'full_screen'             => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
    
			// Lang fields
			'url'             => array('type' => self::TYPE_STRING, 'lang' => true,'validate' => 'isGenericName',  'size' => 255),
			'text'            => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isAnything'),
			'title'           => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
		)
	);
    
    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, $id_shop);
    }
    
	public static function getListContent($identify=0, $type=0, $active=0)
	{
	    $id_lang = Context::getContext()->language->id;
        Shop::addTableAssociation('st_easy_content', array('type' => 'shop'));
        $where = $type  && $type != 100 ? ' AND sec.`type`='.(int)$type : ''; 
        $limit = 0;
        switch($type) {
            case 1:
                if (!is_array($identify)) {
                    $identify = (array)$identify;
                }
                $where .= ' AND sec.`location` IN ('.implode(',',$identify).')';
                break;
            case 2:
                if (is_array($identify))
                {
                    if(isset($identify['identify']))
                        $where .= ' AND sec.`module` = "'.$identify['identify'].'"';
                }
                else
                    $where .= ' AND sec.`module` = "'.$identify.'"';
                    
                if (is_array($identify) && isset($identify['module_align']))
                {
                    switch ($identify['module_align']) {
                        case 1:
                            $where .= ' AND sec.`module_align` = 1';
                            break;
                        case 2:
                            $where .= ' AND sec.`module_align` = 2';
                            break;
                        case 10:
                            $where .= ' AND (sec.`module_align` >10 AND sec.`module_align` <23)';
                            $limit = 1;
                            break;
                        case 30:
                            $where .= ' AND (sec.`module_align` >30 AND sec.`module_align` <43)';
                            $limit = 1;
                            break;
                    }
                }
                break;
            case 3:
                $where .= ' AND sec.`id_cms` = '.(int)Tools::getValue('id_cms');
                break;
            case 4:
            case 5:
                $where .= ' AND (sec.id_category = 0 OR (sec.id_category > 0 AND sec.id_category = '.(int)Tools::getValue('id_category').'))';
                break;
            case 6:
            case 7:
            case 8:
            case 9:
            case 10:
	            $product = new Product((int)Tools::getValue('id_product'));
	            if ($product->id_manufacturer)
                    $where .= ' AND (sec.id_manufacturer = 0 OR (sec.id_manufacturer > 0 AND sec.id_manufacturer='.(int)$product->id_manufacturer.'))';
                $context = Context::getContext();
                if (isset($context->cookie->last_visited_category) && (int)$context->cookie->last_visited_category)
                    $id_category = $context->cookie->last_visited_category;
                else
                    $id_category = $product->id_category_default;
	            if($cates = $product->getCategories()) {
	                $categories = array();
	                foreach($cates AS $id_cate)
                    {
                        $category = new Category($id_cate);
                        if (!$category->active || !$category->id)
                            continue;
                        if($category->id)
                        {
                            $id_array = array();
                            $category_parents = $category->getParentsCategories();
                            if(is_array($category_parents) && count($category_parents))
                                foreach($category_parents as $v)
                                    $id_array[] = $v['id_category'];
                            if (in_array($id_category, $id_array))
                                $categories = array_merge($categories, $id_array);
                        }    
                    }
                    $categories = array_unique($categories);
	                $where .= ' AND (sec.id_category = 0 OR (sec.id_category > 0 AND sec.id_category IN('.implode(',', $categories).')))';
	            }
                if ($product->id)
                    $where .= ' AND (sec.id_product = 0 OR (sec.id_product > 0 AND sec.id_product ='.(int)$product->id.'))';
                break;
            case 15:
            case 16:
                $where .= ' AND (sec.id_manufacturer = 0 OR (sec.id_manufacturer > 0 AND sec.id_manufacturer='.(int)Tools::getValue('id_manufacturer').'))';
                break;
            case 20:
                $where .= ' AND sec.`id_st_blog` = '.(int)Tools::getValue('id_st_blog');
                break;
            case 100:
                if (is_array($identify)) {
                    $identify = implode(',', $identify);
                }
                $where .= ' AND sec.`st_easy_content` IN ('.$identify.')';
                break;
            default:;
        }
        
		return Db::getInstance()->executeS('
			SELECT sec.*, secl.`title`, secl.`url`, secl.`text`, st_easy_content_shop.`id_shop`
			FROM `'._DB_PREFIX_.'st_easy_content` sec
			'.Shop::addSqlAssociation('st_easy_content', 'sec').'
			LEFT JOIN `'._DB_PREFIX_.'st_easy_content_lang` secl ON (sec.`id_st_easy_content` = secl.`id_st_easy_content`)
			WHERE secl.`id_lang` = '.(int)$id_lang.
            ($active ? ' AND sec.`active`=1 ' : '').
            $where.'
            ORDER BY sec.`type`, sec.`id_cms`, sec.`position`'.
            ($limit ? ' LIMIT '.$limit : ''));
	}
	public static function getById($id_lang,$id=0)
	{
        Shop::addTableAssociation('st_easy_content', array('type' => 'shop'));
		return  Db::getInstance()->executeS('
			SELECT sec.*, secl.`title`, secl.`url`, secl.`text`
			FROM `'._DB_PREFIX_.'st_easy_content` sec
			'.Shop::addSqlAssociation('st_easy_content', 'sec').'
			LEFT JOIN `'._DB_PREFIX_.'st_easy_content_lang` secl ON (sec.`id_st_easy_content` = secl.`id_st_easy_content`)
			WHERE sec.`id_st_easy_content`='.(int)$id.' AND secl.`id_lang` = '.(int)$id_lang
        );
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
	public static function getCustomCss()
	{
		$ret =  Db::getInstance()->executeS('
			SELECT * 
			FROM `'._DB_PREFIX_.'st_easy_content` 
			WHERE `active` = 1'
        );
        foreach($ret AS $k => $v) {
            $ret[$k]['columns'] = StEasyContentColumnClass::recurseLightTree(0, 1, (int)$v['id_st_easy_content']);
        }

        return $ret;
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
}