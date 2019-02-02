<?php
/**
* 2013 - 2017 HiPresta
*
* MODULE Out Of Stock Notification
*
* @version   1.2.2
* @author    HiPresta <suren.mikaelyan@gmail.com>
* @link      http://www.hipresta.com
* @copyright HiPresta 2015
* @license   Addons PrestaShop license limitation
*
* NOTICE OF LICENSE
*
* Don't use this module on several shops. The license provided by PrestaShop Addons 
* for all its modules is valid only once for a single shop.
*/

class HTMLTemplateOOSN extends HTMLTemplate
{
    public function __construct($object, $smarty)
    {
        $this->smarty = $smarty;
        $this->title = HTMLTemplateOOSN::l('Out of stock notification');
        $this->shop = new Shop(Context::getContext()->shop->id);
    }

    public function getHeader()
    {
        $shop_name = Configuration::get('PS_SHOP_NAME');
        $path_logo = $this->getLogo();
        $width = 10;
        $height = 10;
        if (!empty($path_logo)) {
            list($width, $height) = getimagesize($path_logo);
        }
        $this->smarty->assign(array(
            'logo_path' => $path_logo,
            'img_ps_dir' => 'http://'.Tools::getMediaServer(_PS_IMG_)._PS_IMG_,
            'img_update_time' => Configuration::get('PS_IMG_UPDATE_TIME'),
            'title' => $this->title,
            'date' => $this->date,
            'shop_name' => $shop_name,
            'width_logo' => $width,
            'height_logo' => $height
        ));
        return $this->smarty->fetch($this->getTemplate('header'));
    }

    public function getContent()
    {
        $select = '';
        if (Configuration::get('HI_OOSN_EXPORT_ID')) {
            $select .= 'id';
        }
        if (Configuration::get('HI_OOSN_EXPORT_ID_SHOP')) {
            $select .= ',id_shop';
        }
        if (Configuration::get('HI_OOSN_EXPORT_ID_PRODUCT')) {
            $select .= ',id_product';
        }
        if (Configuration::get('HI_OOSN_EXPORT_CUSTID')) {
            $select .= ',`id_customer`';
        }
        if (Configuration::get('HI_OOSN_EXPORT_COMBID')) {
            $select .= ',id_combination';
        }
        if (Configuration::get('HI_OOSN_EXPORT_EMAIL')) {
            $select .= ',email';
        }
        if (Configuration::get('HI_OOSN_EXPORT_STATUS')) {
            $select .= ',status';
        }
        if (Configuration::get('HI_OOSN_EXPORT_DATE')) {
            $select .= ',date';
        }

        $filter_status = Configuration::get('HI_OOSN_FILTER_EXPORT_STATUS');
        if ($filter_status == '') {
            $requests_sql = '
            SELECT '.trim($select, ',').'
            FROM '._DB_PREFIX_.'hioutofstock 
            UNION ALL SELECT '.trim($select, ',').'
            FROM '._DB_PREFIX_.'hioutofstocksentemail';
        } elseif ($filter_status == 1) {
            $requests_sql = '
            SELECT '.trim($select, ',').'
            FROM '._DB_PREFIX_.'hioutofstock 
            WHERE id_shop = '.Shop::getContextShopID();
        } elseif ($filter_status == 2) {
            $requests_sql = '
            SELECT '.trim($select, ',').'
            FROM '._DB_PREFIX_.'hioutofstocksentemail
            WHERE id_shop = '.Shop::getContextShopID();
        }
        $requests = Db::getInstance()->ExecuteS($requests_sql);
        $this->smarty->assign(array(
            'requests' => $requests,
            'id' => Configuration::get('HI_OOSN_EXPORT_ID'),
            'id_shop' => Configuration::get('HI_OOSN_EXPORT_ID_SHOP'),
            'id_product' => Configuration::get('HI_OOSN_EXPORT_ID_PRODUCT'),
            'id_customer' => Configuration::get('HI_OOSN_EXPORT_CUSTID'),
            'id_combination' => Configuration::get('HI_OOSN_EXPORT_COMBID'),
            'email' => Configuration::get('HI_OOSN_EXPORT_EMAIL'),
            'status' => Configuration::get('HI_OOSN_EXPORT_STATUS'),
            'date' => Configuration::get('HI_OOSN_EXPORT_DATE'),
        ));
        return $this->smarty->fetch(
            _PS_MODULE_DIR_.'hioutofstocknotification/views/templates/admin/pdf/requests_content.tpl'
        );
    }

    public function getFooter()
    {
        return '';
    }

    public function getFilename()
    {
        return 'oosn_subscribers.pdf';
    }

    public function getBulkFilename()
    {
        return 'oosn_subscribers.pdf';
    }
}
