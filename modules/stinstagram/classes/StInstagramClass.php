<?php
/**
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
*  @author    ST-themes
*  @copyright 2007-2016 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*/

class StInstagramClass extends ObjectModel
{
    /** @var integer id*/
    public $id;
    /** @var integer id*/
    public $id_st_instagram;
    /** @var integer id*/
    public $location;
    /** @var string */
    public $custom_hook;
    /** @var string*/
    public $user_name;
    /** @var integer */
    public $user_id;
    /** @var string */
    public $hash_tag;
    /** @var integer */
    public $grid;
    /** @var integer */
    public $count;
    /** @var integer*/
    public $image_size;
    /** @var string */
    public $padding;
    /** @var string */
    public $top_padding;
    /** @var string */
    public $bottom_padding;
    /** @var string */
    public $top_margin;
    /** @var string */
    public $bottom_margin;
    /** @var integer */
    public $title;
    /** @var integer */
    public $hide_on_mobile;
    /** @var integer */
    public $show_likes;
    /** @var string */
    public $show_comments;
    /** @var integer */
    public $show_timestamp;
    /** @var integer */
    public $time_format;
    /** @var integer */
    public $show_username;
    /** @var integer */
    public $show_caption;
    /** @var integer */
    public $lenght_of_caption;
    /** @var integer */
    public $show_media_type;
    /** @var integer */
    public $click_action;
    /** @var integer */
    public $hover_effect;
    /** @var integer */
    public $show_profile;
    /** @var integer */
    public $show_avatar;
    /** @var integer */
    public $show_counts;
    /** @var integer */
    public $show_bio;
    /** @var integer */
    public $show_website;
    /** @var integer */
    public $follow;
    /** @var integer */
    public $title_font_size;
    /** @var string */
    public $title_color;
    /** @var string */
    public $title_bg;
    /** @var integer */
    public $title_border_height;
    /** @var string */
    public $title_border_color;
    /** @var string */
    public $title_border_color_h;
    /** @var string */
    public $bg_hover_color;
    /** @var float */
    public $bg_opacity_nohover;
    /** @var float */
    public $bg_opacity;
    /** @var integer */
    public $image_border;
    /** @var string */
    public $image_border_color;
    /** @var integer */
    public $image_border_radius;
    /** @var integer */
    public $font_size;
    /** @var string */
    public $caption_color;
    /** @var string */
    public $media_info_color;
    /** @var string */
    public $media_info_bg;
    /** @var integer */
    public $shadow_effect;
    /** @var integer */
    public $h_shadow;
    /** @var integer */
    public $v_shadow;
    /** @var integer */
    public $shadow_blur;
    /** @var string */
    public $shadow_color;
    /** @var float */
    public $shadow_opacity;
    /** @var string */
    public $bg_color;
    /** @var integer */
    public $bg_pattern;
    /** @var string */
    public $bg_img;
    /** @var string */
    public $profile_text;
    /** @var string */
    public $profile_bg;
    /** @var string */
    public $follow_color;
    /** @var string */
    public $follow_bg;
    /** @var integer */
    public $slideshow;
    /** @var integer */
    public $s_speed;
    /** @var integer */
    public $a_speed;
    /** @var integer */
    public $pause_on_hover;
    /** @var integer */
    public $rewind_nav;
    /** @var integer */
    public $move;
    /** @var integer */
    public $direction_nav;
    /** @var integer */
    public $control_nav;
    /** @var string */
    public $direction_color;
    /** @var string */
    public $direction_color_hover;
    /** @var string */
    public $direction_color_disabled;
    /** @var string */
    public $direction_bg;
    /** @var string */
    public $direction_hover_bg;
    /** @var string */
    public $direction_disabled_bg;
    /** @var string */
    public $pag_nav_bg;
    /** @var string */
    public $pag_nav_bg_hover;
    /** @var integer */
    public $picture_size_col;
    /** @var integer */
    public $hide_mob_col;
    /** @var string */
    public $wide_on_footer;
    /** @var integer */
    public $load_more;
    /** @var string */
    public $load_more_color;
    /** @var string */
    public $load_more_bg;
    /** @var string */
    public $load_more_bg_hover;
    /** @var string */
    public $account_stats_color;
    /** @var string */
    public $account_stats_bg;
    /** @var integer */
    public $self_liked;
    /** @var string */
    public $popup_text_color;
    /** @var string */
    public $popup_a_color;
    /** @var string */
    public $popup_a_color_hover;
    /** @var string */
    public $profile_a_color;
    /** @var string */
    public $profile_a_color_hover;
    /** @var string */
    public $media_info_a_color;
    /** @var string */
    public $media_info_a_color_hover;
    /** @var string */
    public $cc_text_color;
    /** @var string */
    public $cc_a_color;
    /** @var string */
    public $cc_a_color_hover;
    /** @var string */
    public $cc_bg;
    /** @var string */
    public $block_title;
    /** @var string */
    public $custom_content;
    /** @var integer */
    public $position;
    /** @var integer */
    public $active;
    /** @var integer */
    public $force_square;
    /** @var integer */
    public $pro_per_fw;
    /** @var integer */
    public $pro_per_lg;
    /** @var integer */
    public $pro_per_md;
    /** @var integer */
    public $pro_per_sm;
    /** @var integer */
    public $pro_per_xs;
    /** @var integer */
    public $pro_per_xxl;
    /** @var integer */
    public $pro_per_xl;
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table'     => 'st_instagram',
        'primary'   => 'id_st_instagram',
        'multilang' => true,
        'fields'    => array(
            'location'                  => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'position'                  => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'grid'                      => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'count'                     => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'image_size'                => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'title'                     => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'hide_on_mobile'            => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'show_likes'                => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'show_comments'             => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'show_timestamp'            => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'time_format'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'show_username'             => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'show_caption'              => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'lenght_of_caption'         => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'show_media_type'           => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'click_action'              => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'hover_effect'              => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'image_border'              => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'image_border_radius'       => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'shadow_effect'             => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'shadow_blur'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'bg_pattern'                => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            's_speed'                   => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'a_speed'                   => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'move'                      => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'direction_nav'             => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'picture_size_col'          => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'pro_per_fw'                => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'pro_per_lg'                => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'pro_per_md'                => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'pro_per_sm'                => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'pro_per_xs'                => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'pro_per_xxl'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'pro_per_xl'               => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),

            'title_border_height'       => array('type' => self::TYPE_STRING, 'size' => 10),
            'title_font_size'           => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'font_size'                 => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'h_shadow'                  => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'v_shadow'                  => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),

            'bg_opacity_nohover'        => array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
            'bg_opacity'                => array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
            'shadow_opacity'            => array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),

            'active'                    => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'show_profile'              => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
            'show_avatar'               => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'),
            'show_counts'               => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'show_bio'                  => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'show_website'              => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'slideshow'                 => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'pause_on_hover'            => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'rewind_nav'                => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'control_nav'               => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'follow'                    => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'hide_mob_col'              => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'load_more'                 => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'self_liked'                => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'force_square'              => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),

            'custom_hook'               => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
            'user_name'                 => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
            'user_id'                   => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
            'hash_tag'                  => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
            'padding'                   => array('type' => self::TYPE_STRING, 'validate' => 'isNullOrUnsignedId'),
            'top_padding'               => array('type' => self::TYPE_STRING, 'validate' => 'isNullOrUnsignedId'),
            'bottom_padding'            => array('type' => self::TYPE_STRING, 'validate' => 'isNullOrUnsignedId'),
            'top_margin'                => array('type' => self::TYPE_STRING, 'validate' => 'isNullOrUnsignedId'),
            'bottom_margin'             => array('type' => self::TYPE_STRING, 'validate' => 'isNullOrUnsignedId'),
            'bg_img'                    => array('type' => self::TYPE_STRING, 'validate' => 'isAnything'),
            'wide_on_footer'            => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),


            'title_color'               => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'title_bg'                  => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'title_border_color'        => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'title_border_color_h'        => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'bg_hover_color'            => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'caption_color'             => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'media_info_color'          => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'media_info_bg'             => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'shadow_color'              => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'bg_color'                  => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'image_border_color'        => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'profile_text'              => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'profile_bg'                => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'follow_color'              => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'follow_bg'                 => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'direction_color'           => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'direction_color_hover'     => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'direction_color_disabled'  => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'direction_bg'              => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'direction_hover_bg'        => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'direction_disabled_bg'     => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'pag_nav_bg'                => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'pag_nav_bg_hover'          => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'load_more_color'           => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'load_more_bg'              => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'load_more_bg_hover'        => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'account_stats_color'       => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'account_stats_bg'          => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'popup_text_color'          => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'popup_a_color'             => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'popup_a_color_hover'       => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'profile_a_color'           => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'profile_a_color_hover'     => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'media_info_a_color'        => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'media_info_a_color_hover'  => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'cc_text_color'             => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'cc_a_color'                => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'cc_a_color_hover'          => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            'cc_bg'                     => array('type' => self::TYPE_STRING, 'validate' => 'isColor', 'size' => 7),
            // Lang fields
            'block_title'               => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName'),
            'custom_content'            => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isAnything'),
        ),
    );
    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, $id_shop);
    }
    public function delete()
    {
        if ($this->bg_img) {
            if (file_exists(_PS_ROOT_DIR_.$this->bg_img)) {
                @unlink(_PS_ROOT_DIR_.$this->bg_img);
            }
        }
        return parent::delete();
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

    public static function getAll($id_lang = null, $active = 0)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        Shop::addTableAssociation('st_instagram', array('type' => 'shop'));
        $result = Db::getInstance()->executeS('
            SELECT si.*, sil.block_title,sil.custom_content
            FROM `'._DB_PREFIX_.'st_instagram` si
            '.Shop::addSqlAssociation('st_instagram', 'si').'
            LEFT JOIN `'._DB_PREFIX_.'st_instagram_lang` sil ON (si.`id_st_instagram` = sil.`id_st_instagram`
            AND sil.`id_lang` = '.(int)$id_lang.')
            WHERE '.($active ? 'si.`active`=1 ' : '1').'
            ORDER BY si.`location`, si.`position`
            ');
        if (is_array($result) && count($result)) {
            foreach ($result as &$rs) {
                self::fetchMediaServer($rs);
            }
        }
        return $result;
    }

    public function copyFromPost()
    {
        /* Classical fields */
        foreach ($_POST as $key => $value) {
            if (key_exists($key, $this) and $key != 'id_'.$this->table && !isset($_FILES[$key])) {
                $this->{$key} = $value;
            }
        }

        /* Multilingual fields */
        if (sizeof($this->fieldsValidateLang)) {
            $languages = Language::getLanguages(false);
            foreach ($languages as $language) {
                foreach ($this->fieldsValidateLang as $field => $validation) {
                    if (tools::getIsset($field.'_'.(int)($language['id_lang'])) && !isset($_FILES[$field.'_'.(int)($language['id_lang'])])) {
                        $this->{$field}[(int)($language['id_lang'])] = Tools::getValue($field.'_'.(int)($language['id_lang']));
                    }
                }
            }
        }
    }
    public static function fetchMediaServer(&$image)
    {
        $fields = array('bg_img');
        if (is_string($image) && $image) {
            if (strpos($image, '/upload/') === false && strpos($image, '/modules/') === false) {
                $image = _THEME_PROD_PIC_DIR_.$image;
            }
            $image = context::getContext()->link->protocol_content.Tools::getMediaServer($image).$image;
            return $image;
        }
        foreach ($fields as $field) {
            if (is_array($image) && tools::getIsset($image[$field]) && $image[$field]) {
                if (strpos($image[$field], '/upload/') === false && strpos($image[$field], '/modules/') === false) {
                    $image[$field] = _THEME_PROD_PIC_DIR_.$image[$field];
                }
                $image[$field] = context::getContext()->link->protocol_content.Tools::getMediaServer($image[$field]).$image[$field];
            }
        }
    }
    public static function getInstagram($identify = 0, $type = 0)
    {
        Shop::addTableAssociation('st_instagram', array('type' => 'shop'));
        $id_lang = Context::getContext()->language->id;
        $where = '';
        if ($type == 1) {
            $where = ' AND location='.(int)$identify;
        } elseif ($type == 2) {
            $where = ' AND custom_hook="'.pSQL(Tools::strtolower($identify)).'"';
        } elseif ($type == 3) {
            $where = ' AND si.`id_st_instagram`='.(int)$identify;
        }
        return Db::getInstance()->executeS('
            SELECT si.*, sil.block_title,sil.custom_content
            FROM `'._DB_PREFIX_.'st_instagram` si
            '.Shop::addSqlAssociation('st_instagram', 'si').'
            LEFT JOIN `'._DB_PREFIX_.'st_instagram_lang` sil ON (si.`id_st_instagram` = sil.`id_st_instagram`
            AND sil.`id_lang` = '.(int)$id_lang.')
            WHERE si.`active`=1 '.$where.'
            ORDER BY si.`position`, si.`location`');
    }
}
