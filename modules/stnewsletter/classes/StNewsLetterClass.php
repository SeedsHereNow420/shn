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

class StNewsLetterClass extends ObjectModel
{
    const GUEST_NOT_REGISTERED = -1;
	const CUSTOMER_NOT_REGISTERED = 0;
	const GUEST_REGISTERED = 1;
	const CUSTOMER_REGISTERED = 2;
    
    const LEGAL_PRIVACY = 'LEGAL_PRIVACY';
	/** @var integer*/
	public $id;
    /** @var integer*/
    public $location;
    /** @var boolen */ 
    public $hide_on_mobile;
    /** @var boolen */ 
    public $active;
    /** @var integer*/
    public $position;
    /** @var integer*/
    public $item_k;
    /** @var integer*/
    public $item_v;

    /** @var integer*/
    public $popup_width;

    /** @var string*/
    public $content_text_color;
    /** @var string*/
    public $content_link_color;
    /** @var string*/
    public $content_link_hover;

    /** @var string*/
    public $bg_color;
    /** @var integer*/
    public $bg_pattern;
    /** @var string*/
    public $bg_img;
    /** @var integer*/
    public $top_spacing;
    /** @var integer*/
    public $bottom_spacing;
    /** @var string */
    public $top_padding; 
    /** @var string */
    public $bottom_padding; 
    /** @var integer*/
    public $right_spacing;
    /** @var integer*/
    public $left_spacing;
    /** @var integer*/
    public $text_align;

    /** @var integer*/
    public $input_width;
    /** @var integer*/
    public $input_height;
    /** @var string*/
    public $input_color;
    /** @var string*/
    public $input_bg;
    /** @var string*/
    public $input_border;

    /** @var string*/
    public $btn_color;
    /** @var string*/
    public $btn_bg;
    /** @var string*/
    public $btn_hover_color;
    /** @var string*/
    public $btn_hover_bg;

    /** @var integer*/
    public $show_popup;
    /** @var boolen */ 
    public $show_newsletter;
    /** @var integer*/
    public $cookies_time;
    /** @var integer*/
    public $delay_popup;
    /** @var boolen */ 
    public $subscribed;
    /** @var string*/
    public $start_time;
    /** @var string*/
    public $stop_time;

    /** @var string*/
    public $content;
    /** @var integer */
    public $display_on;
    /** @var integer */
    public $show_gender; 
    /** @var integer */
    public $template;
    /** @var integer */ 
    public $title_align;
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_news_letter',
		'primary'   => 'id_st_news_letter',
        'multilang' => true,
		'fields'    => array(
            'location'            =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
            'hide_on_mobile'      =>array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'active'              =>array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'position'            =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'item_k'              =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'item_v'              =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            
            'popup_width'         =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            
            'content_text_color'  =>array('type' => self::TYPE_STRING, 'size' => 7),
            'content_link_color'  =>array('type' => self::TYPE_STRING, 'size' => 7),
            'content_link_hover'  =>array('type' => self::TYPE_STRING, 'size' => 7),
            
            'bg_color'            =>array('type' => self::TYPE_STRING, 'size' => 7),
            'bg_pattern'          =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'bg_img'              =>array('type' => self::TYPE_STRING, 'validate' => 'isAnything', 'size' => 255),
            'top_spacing'         =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'bottom_spacing'      =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'top_padding'         =>array('type' => self::TYPE_STRING, 'size' => 10),
            'bottom_padding'      =>array('type' => self::TYPE_STRING, 'size' => 10),
            'right_spacing'       =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'left_spacing'        =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'text_align'          =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'input_width'         =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'input_height'        =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            
            'input_color'         =>array('type' => self::TYPE_STRING, 'size' => 7),
            'input_bg'            =>array('type' => self::TYPE_STRING, 'size' => 7),
            'input_border'        =>array('type' => self::TYPE_STRING, 'size' => 7),
            
            'btn_color'           =>array('type' => self::TYPE_STRING, 'size' => 7),
            'btn_bg'              =>array('type' => self::TYPE_STRING, 'size' => 7),
            'btn_hover_color'     =>array('type' => self::TYPE_STRING, 'size' => 7),
            'btn_hover_bg'        =>array('type' => self::TYPE_STRING, 'size' => 7),
            
            'show_popup'          =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'show_newsletter'     =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'cookies_time'        =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'delay_popup'         =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'subscribed'          =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'show_gender'         =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            
            'template'            =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),

            'start_time'          =>array('type' => self::TYPE_DATE),
            'stop_time'           =>array('type' => self::TYPE_DATE),
            'title_align'        =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'display_on'         =>array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            // Lang fields
            'content'            =>array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isAnything'),
        ),
	);
    
    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, $id_shop);
    }
    
	public static function getAll($id_lang,$active=0)
	{
        Shop::addTableAssociation('st_news_letter', array('type' => 'shop'));
		return Db::getInstance()->executeS('
			SELECT snl.*, snll.`content`
			FROM `'._DB_PREFIX_.'st_news_letter` snl
			'.Shop::addSqlAssociation('st_news_letter', 'snl').'
            LEFT JOIN `'._DB_PREFIX_.'st_news_letter_lang` snll ON (snl.`id_st_news_letter` = snll.`id_st_news_letter`)
            WHERE snll.`id_lang` = '.(int)$id_lang.($active ? ' AND snl.`active`=1 ' : '').'
            ORDER BY snl.`location`, snl.`position`'
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
    
    public static function getNewsLetter($id_lang, $identify, $type=1)
    {
        $identify = (array)$identify;
        Shop::addTableAssociation('st_news_letter', array('type' => 'shop'));
        $where = '';
        if($type==1)
            $where .= ' AND snl.`location` IN ('.implode(',',$identify).')';

        if(!$where)
            return false;
        $result = Db::getInstance()->executeS('
			SELECT snl.*, snll.`content`
			FROM `'._DB_PREFIX_.'st_news_letter` snl
			'.Shop::addSqlAssociation('st_news_letter', 'snl').'
            LEFT JOIN `'._DB_PREFIX_.'st_news_letter_lang` snll ON (snl.`id_st_news_letter` = snll.`id_st_news_letter`)
			WHERE snl.`active`=1 AND snll.`id_lang` = '.(int)$id_lang.$where.' 
            ORDER BY snl.`position`');
        foreach($result AS &$rs)
            self::fetchMediaServer($rs);
        return $result;
    }
    public static function getOptions()
    {
        return Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'st_news_letter` 
		');
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
    
    public static function fetchMediaServer(&$slider)
    {
        $fields = array('bg_img','bg_pattern');
        if (is_string($slider) && $slider)
        {
            if(strpos($slider, '/modules/') === false)
                $slider = _THEME_PROD_PIC_DIR_.$slider;
            $slider = context::getContext()->link->protocol_content.Tools::getMediaServer($slider).$slider;
        }
        foreach($fields AS $field)
        {
            if (is_array($slider) && isset($slider[$field]) && $slider[$field])
            {
                if(strpos($slider[$field], '/modules/') === false)
                    $slider[$field] = _THEME_PROD_PIC_DIR_.$slider[$field];
                $slider[$field] = context::getContext()->link->protocol_content.Tools::getMediaServer($slider[$field]).$slider[$field];
            }
        }
    }
    
    /**
	 * Check if this mail is registered for newsletters
	 *
	 * @param string $customer_email
	 *
	 * @return int -1 = not a customer and not registered
	 *                0 = customer not registered
	 *                1 = registered in block
	 *                2 = registered in customer
	 */
	public function isNewsletterRegistered($customer_email)
    {
        $sql = 'SELECT `email`
                FROM '._DB_PREFIX_.'emailsubscription
                WHERE `email` = \''.pSQL($customer_email).'\'
                AND id_shop = '.Context::getContext()->shop->id;

        if (Db::getInstance()->getRow($sql)) {
            return self::GUEST_REGISTERED;
        }

        $sql = 'SELECT `newsletter`
                FROM '._DB_PREFIX_.'customer
                WHERE `email` = \''.pSQL($customer_email).'\'
                AND id_shop = '.Context::getContext()->shop->id;

        if (!$registered = Db::getInstance()->getRow($sql)) {
            return self::GUEST_NOT_REGISTERED;
        }

        if ($registered['newsletter'] == '1') {
            return self::CUSTOMER_REGISTERED;
        }

        return self::CUSTOMER_NOT_REGISTERED;
    }

	/**
	 * Return true if the registered status correspond to a registered user
	 *
	 * @param int $register_status
	 *
	 * @return bool
	 */
	public function isRegistered($register_status)
    {
        return in_array(
            $register_status,
            array(self::GUEST_REGISTERED, self::CUSTOMER_REGISTERED)
        );
    }

	/**
	 * Subscribe an email to the newsletter. It will create an entry in the newsletter table
	 * or update the customer table depending of the register status
	 *
	 * @param string $email
	 * @param int    $register_status
	 */
	public function register($email, $register_status)
    {
        if ($register_status == self::GUEST_NOT_REGISTERED) {
            return $this->registerGuest($email);
        }

        if ($register_status == self::CUSTOMER_NOT_REGISTERED) {
            return $this->registerUser($email);
        }

        return false;
    }

	public function unregister($email, $register_status)
    {
        if (!$email) {
            return false;
        }
        if ($register_status == self::GUEST_REGISTERED) {
            $sql = 'DELETE FROM '._DB_PREFIX_.'emailsubscription WHERE `email` = \''.pSQL($email).'\' AND id_shop = '.Context::getContext()->shop->id;
        } elseif ($register_status == self::CUSTOMER_REGISTERED) {
            $sql = 'UPDATE '._DB_PREFIX_.'customer SET `newsletter` = 0 WHERE `email` = \''.pSQL($email).'\' AND id_shop = '.Context::getContext()->shop->id;
        }

        if (!isset($sql) || !Db::getInstance()->execute($sql)) {
            return false;
        }

        return true;
    }

	/**
	 * Subscribe a customer to the newsletter
	 *
	 * @param string $email
	 *
	 * @return bool
	 */
	public function registerUser($email)
    {
        $sql = 'UPDATE '._DB_PREFIX_.'customer
                SET `newsletter` = 1, newsletter_date_add = NOW(), `ip_registration_newsletter` = \''.pSQL(Tools::getRemoteAddr()).'\'
                WHERE `email` = \''.pSQL($email).'\'
                AND id_shop = '.Context::getContext()->shop->id;

        return Db::getInstance()->execute($sql);
    }

	/**
	 * Subscribe a guest to the newsletter
	 *
	 * @param string $email
	 * @param bool   $active
	 *
	 * @return bool
	 */
	public function registerGuest($email, $active = true)
    {
        $sql = 'INSERT INTO '._DB_PREFIX_.'emailsubscription (id_shop, id_shop_group, email, newsletter_date_add, ip_registration_newsletter, http_referer, active)
                VALUES
                ('.Context::getContext()->shop->id.',
                '.Context::getContext()->shop->id_shop_group.',
                \''.pSQL($email).'\',
                NOW(),
                \''.pSQL(Tools::getRemoteAddr()).'\',
                (
                    SELECT c.http_referer
                    FROM '._DB_PREFIX_.'connections c
                    WHERE c.id_guest = '.(int) Context::getContext()->customer->id.'
                    ORDER BY c.date_add DESC LIMIT 1
                ),
                '.(int) $active.'
                )';

        return Db::getInstance()->execute($sql);
    }

	public function activateGuest($email)
    {
        return Db::getInstance()->execute(
            'UPDATE `'._DB_PREFIX_.'emailsubscription`
                        SET `active` = 1
                        WHERE `email` = \''.pSQL($email).'\''
        );
    }

	/**
	 * Returns a guest email by token
	 *
	 * @param string $token
	 *
	 * @return string email
	 */
	public function getGuestEmailByToken($token)
    {
        $sql = 'SELECT `email`
                FROM `'._DB_PREFIX_.'emailsubscription`
                WHERE MD5(CONCAT( `email` , `newsletter_date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\')) = \''.pSQL($token).'\'
                AND `active` = 0';

        return Db::getInstance()->getValue($sql);
    }

	/**
	 * Returns a customer email by token
	 *
	 * @param string $token
	 *
	 * @return string email
	 */
	public function getUserEmailByToken($token)
    {
        $sql = 'SELECT `email`
                FROM `'._DB_PREFIX_.'customer`
                WHERE MD5(CONCAT( `email` , `date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\')) = \''.pSQL($token).'\'
                AND `newsletter` = 0';

        return Db::getInstance()->getValue($sql);
    }

	/**
	 * Return a token associated to an user
	 *
	 * @param string $email
	 * @param string $register_status
	 */
	public function getToken($email, $register_status)
    {
        if (in_array($register_status, array(self::GUEST_NOT_REGISTERED, self::GUEST_REGISTERED))) {
            $sql = 'SELECT MD5(CONCAT( `email` , `newsletter_date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\')) as token
                    FROM `'._DB_PREFIX_.'emailsubscription`
                    WHERE `active` = 0
                    AND `email` = \''.pSQL($email).'\'';
        } elseif ($register_status == self::CUSTOMER_NOT_REGISTERED) {
            $sql = 'SELECT MD5(CONCAT( `email` , `date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\' )) as token
                    FROM `'._DB_PREFIX_.'customer`
                    WHERE `newsletter` = 0
                    AND `email` = \''.pSQL($email).'\'';
        }

        return Db::getInstance()->getValue($sql);
    }
}