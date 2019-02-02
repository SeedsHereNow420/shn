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

class StMegaMenuClass extends ObjectModel
{
	/** @var integer banner id*/
    public $id;
	public $location;
    public $id_parent;
	public $id_st_mega_column;
	public $id_shop;
    public $level_depth;
    public $item_k;
    public $item_v;
	public $subtype;
	public $new_window;
	public $position;
	public $active;
    public $txt_color;
	public $link_color;
	public $txt_color_over;
	public $bg_color;
	public $bg_color_over;
	public $tab_content_bg;
	public $html;
	public $title;
	public $link;
	public $auto_sub;
	public $hide_on_mobile;
	public $alignment;
    public $nofollow;
    public $width;
    public $is_mega;
    public $icon_class;
    public $sub_levels;
    public $sub_limit;
    public $item_limit;
    public $items_md;
    public $item_t;
    public $cate_label;
    public $cate_label_color;
    public $cate_label_bg;
    public $show_cate_img;
    public $bg_image;
    public $bg_repeat;
    public $bg_position;
    public $bg_margin_bottom;
    public $granditem;
	
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_mega_menu',
		'primary'   => 'id_st_mega_menu',
		'multilang' => true,
		'fields' => array(
            'location'       => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_st_mega_column'       => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_parent'       => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'id_shop'         => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
			'level_depth'     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'item_k'     => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'item_v'                   => array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isGenericName'),
			'subtype'           => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'new_window'      => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
			'position'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'active'          => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'auto_sub'        => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
			'hide_on_mobile'  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'alignment'       => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'nofollow'        => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
            'txt_color'       => array('type' => self::TYPE_STRING, 'size' => 7),
			'link_color'       => array('type' => self::TYPE_STRING, 'size' => 7),
			'txt_color_over'  => array('type' => self::TYPE_STRING, 'size' => 7),
			'bg_color'        => array('type' => self::TYPE_STRING, 'size' => 7),
            'bg_color_over'   => array('type' => self::TYPE_STRING, 'size' => 7),
            'tab_content_bg'  => array('type' => self::TYPE_STRING, 'size' => 7),
            'width'       => array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
            'is_mega'  => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
            'icon_class'                   => array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isGenericName'),
            'sub_levels'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'sub_limit'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'item_limit'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'items_md'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'item_t'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'cate_label_color'  => array('type' => self::TYPE_STRING, 'size' => 7),
            'cate_label_bg'  => array('type' => self::TYPE_STRING, 'size' => 7),
            'show_cate_img'  => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
            'bg_image'      => array('type' => self::TYPE_STRING, 'validate' => 'isAnything', 'size' => 255),
            'bg_repeat'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'bg_position'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'bg_margin_bottom'        => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'granditem'  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),

			// Lang fields
			'html'            => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isAnything'),
            'title'           => array('type' => self::TYPE_STRING, 'lang' => true,  'size' => 255, 'validate' => 'isGenericName'),
			'cate_label'           => array('type' => self::TYPE_STRING, 'lang' => true,  'size' => 255, 'validate' => 'isGenericName'),
			'link'            => array('type' => self::TYPE_STRING, 'lang' => true, 'size' => 255, 'validate' => 'isAnything'),
		)
	);

    public function delete()
    {
        $sub = self::recurseTree($this->id,2,$this->level_depth,0);
        if($sub && count($sub))
		  $this->deleteRec($sub);

		if($res = parent::delete())
            $this->clearExtraItems($this->id);
        
        return $res;
    }

    public function deleteRec($sub)
    {
        foreach($sub as $v)
        {
            if(isset($v['children']) && $v['children'] && count($v['children']))
                $this->deleteRec($v['children']);
            Db::getInstance()->execute('
			DELETE FROM `'._DB_PREFIX_.'st_mega_menu`
			WHERE `id_st_mega_menu`='.(int)$v['id_st_mega_menu']);
            Db::getInstance()->execute('
			DELETE FROM `'._DB_PREFIX_.'st_mega_menu_lang`
			WHERE `id_st_mega_menu`='.(int)$v['id_st_mega_menu']);
            
            $this->clearExtraItems($v['id_st_mega_menu']);
        }
        
    }
    
    public function clearExtraItems($id_mega_menu = 0)
    {
        if ($id_mega_menu > 0)
        {
            StMegaColumnClass::deleteByMenu((int)$id_mega_menu);
            StMegaProductClass::deleteMenuProducts((int)$id_mega_menu);
            StMegaBrandClass::deleteByMenu((int)$id_mega_menu);
        }
    }

    public static function justifyTree(&$tree, &$n)
	{
		$left = $n++;
		foreach ($tree as $v)
		{
            if(isset($v['children']) && is_array($v['children']) && count($v['children']))
                self::justifyTree($v['children'], $n);
            
            $right = (int)$n++;
    		Db::getInstance()->execute('
    			UPDATE '._DB_PREFIX_.'st_mega_menu
    			SET nleft = '.(int)$left.', nright = '.(int)$right.'
    			WHERE id_st_mega_menu = '.(int)$v['id_st_mega_menu']);
	    }
	}
    
    public static function getById($id_st_mega_menu,$id_lang)
    {
        return Db::getInstance()->getRow('
            SELECT smm.*,smml.`html`,smml.`title`,smml.`link`,smml.`cate_label`
            FROM `'._DB_PREFIX_.'st_mega_menu` smm
            LEFT JOIN `'._DB_PREFIX_.'st_mega_menu_lang` smml ON smm.`id_st_mega_menu`=smml.`id_st_mega_menu`
            WHERE smml.`id_lang`='.(int)$id_lang.
            ' AND smm.`id_st_mega_menu`='.(int)$id_st_mega_menu.
            ' '.Shop::addSqlRestrictionOnLang('smm')
        );
    }
	
    public static function getSub($id_parent,$active=0,$id_lang,$item_t)
    {
        return Db::getInstance()->executeS('
            SELECT smm.*,smml.`html`,smml.`title`,smml.`link`,smml.`cate_label`
            FROM `'._DB_PREFIX_.'st_mega_menu` smm
            LEFT JOIN `'._DB_PREFIX_.'st_mega_menu_lang` smml ON smm.`id_st_mega_menu`=smml.`id_st_mega_menu`
            WHERE smml.`id_lang`='.(int)$id_lang.
            ' AND smm.`id_parent`='.(int)$id_parent.
            ' AND smm.`item_t`='.(int)$item_t.
            ($active ? ' AND smm.`active`=1 ' : '').
            ' AND smm.`id_shop`=1
            ORDER BY smm.`location`, smm.`position`');
    }

    public static function getByColumnId($id_st_mega_column, $id_lang, $active=0,$item_t=0,$id_parent=0)
    {
        $res = Db::getInstance()->executeS('
            SELECT smm.*,smml.`html`,smml.`title`,smml.`link`,smml.`cate_label`
            FROM `'._DB_PREFIX_.'st_mega_menu` smm
            LEFT JOIN `'._DB_PREFIX_.'st_mega_menu_lang` smml ON smm.`id_st_mega_menu`=smml.`id_st_mega_menu`
            WHERE smml.`id_lang`='.(int)$id_lang.
            ' AND smm.`id_st_mega_column`='.(int)$id_st_mega_column.
            ' AND smm.`id_parent`='.($id_parent).
            ($item_t ? ' AND smm.`item_t`='.$item_t : ' AND smm.`item_t`>0').
            ($active ? ' AND smm.`active`=1 ' : '').
            ' AND smm.`id_shop`=1
            ORDER BY smm.`position`');
        return $res;
    }
    public static function recurseTree($id_parent,$max_depth=2,$current_depth=0,$active=0,$id_lang = null,$item_t=0)
    {
        $id_lang = is_null($id_lang) ? Context::getContext()->language->id : (int)$id_lang;

		if (!(int)$id_lang)
			$id_lang = _USER_ID_LANG_;
        $tree = self::getSub($id_parent,$active,$id_lang,$item_t);
        if ( ( $max_depth==0 || ($current_depth+1 < $max_depth) ) && $tree && count($tree))
            foreach($tree as &$v)
            {
                $jon = self::recurseTree($v['id_st_mega_menu'],$max_depth,$current_depth+1,$active,$id_lang,$item_t);
                if(is_array($jon) && count($jon))
                    $v['children'] = $jon;
            }

        return $tree;
    }
    public static function getTypes()
    {
        $module = new StMegaMenu();
		return array(
			1 => $module->getTranslator()->trans('Category', array(), 'Admin.Theme.Panda'),
			2 => $module->getTranslator()->trans('Product', array(), 'Admin.Theme.Panda'),
			3 => $module->getTranslator()->trans('CMS', array(), 'Admin.Theme.Panda'),
			4 => $module->getTranslator()->trans('Manufacturer', array(), 'Admin.Theme.Panda'),
			5 => $module->getTranslator()->trans('Supplier', array(), 'Admin.Theme.Panda'),
			6 => $module->getTranslator()->trans('Shop', array(), 'Admin.Theme.Panda'),
			7 => $module->getTranslator()->trans('Link', array(), 'Admin.Theme.Panda'),
			8 => $module->getTranslator()->trans('CMS category', array(), 'Admin.Theme.Panda'),
			9 => $module->getTranslator()->trans('ICON', array(), 'Admin.Theme.Panda'),
			10 => $module->getTranslator()->trans('Blog category', array(), 'Admin.Theme.Panda'),
			11 => $module->getTranslator()->trans('Blog', array(), 'Admin.Theme.Panda'),
			12 => $module->getTranslator()->trans('Permanent link', array(), 'Admin.Theme.Panda'),
		);
    }
    public static function getTopParent($id_st_mega_menu)
    {
        $menu = new StMegaMenuClass($id_st_mega_menu);
        if($menu->id_parent)
            return StMegaMenuClass::getTopParent($menu->id_parent);
        else
            return $id_st_mega_menu;
    }
    public static function getSecondaryParent($id_st_mega_menu)
    {
        $menu = new StMegaMenuClass($id_st_mega_menu);
        if($menu->level_depth > 0)
            return StMegaMenuClass::getSecondaryParent($menu->id_parent);
        else
            return $id_st_mega_menu;
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
        return Db::getInstance()->executeS('
            SELECT *
            FROM `'._DB_PREFIX_.'st_mega_menu`
            WHERE (`txt_color`!="" || `link_color`!="" || `txt_color_over`!="" || `bg_color`!="" || `bg_color_over`!="" || `tab_content_bg`!="" || `bg_image`!="" || `bg_margin_bottom`!="" || `cate_label_color`!="" || `cate_label_bg`!="")
            AND `active`=1');
    }
    public static function deleteByColumn($id_st_mega_column=0)
    {
        if (!$id_st_mega_column)
            return false;
        $res = Db::getInstance()->executeS('
            SELECT `id_st_mega_menu`
            FROM `'._DB_PREFIX_.'st_mega_menu`
            WHERE `id_st_mega_column` = '.(int)$id_st_mega_column.'
        ');
        $ret = true;
        foreach($res AS $value)
        {
            $menu = new StMegaMenuClass($value['id_st_mega_menu']);
            $ret &= $menu->delete();
        }
        return $ret;
    }
}