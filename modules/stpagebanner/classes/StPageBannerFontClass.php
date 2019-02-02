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

class StPageBannerFontClass
{
    public static function deleteBySlider($id_st_page_banner)
    {
    	if(!$id_st_page_banner)
    		return false;
        return Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'st_page_banner_font WHERE `id_st_page_banner`='.(int)$id_st_page_banner);
    }
    public static function getBySlider($id_st_page_banner)
    {
    	if(!$id_st_page_banner)
    		return false;
        return Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'st_page_banner_font WHERE `id_st_page_banner`='.(int)$id_st_page_banner);
    }

    public static function changeSliderFont($id, $fonts)
    {
        if(!$id)
            return false;
        $res = true;
        foreach ($fonts as $font)
            if($font)
                $res &= Db::getInstance()->insert('st_page_banner_font', array(
                    'id_st_page_banner' => (int)$id,
                    'font_name' => $font
                ));
        self::cacheFonts();
        return $res;
    }

    public static function getAll($identify=0, $type=0, $active=0)
    {
        $id_lang = Context::getContext()->language->id;
        $group = StPageBannerClass::getAll($identify, $type, $id_lang, $active);
        $group_ids = array();
        if(!is_array($group) || !count($group))
            return false;

        foreach ($group as $value) {
            $group_ids[] = $value['id_st_page_banner'];
        }

        return Db::getInstance()->executeS('
            SELECT f.*
            FROM `'._DB_PREFIX_.'st_page_banner_font` f
            LEFT JOIN `'._DB_PREFIX_.'st_page_banner` b ON (f.`id_st_page_banner` = b.`id_st_page_banner`)
            WHERE b.`id_st_page_banner` IN ('.implode(',',$group_ids).') 
            '.($active ? ' AND b.`active`=1 ' : '')
        );
    }
    
    public static function cacheFonts()
    {
        $fonts = self::getAll(1);
        $content = '';
        if (is_array($fonts) && count($fonts)) {
            $array = array();
            foreach($fonts AS $font) {
                if ($font['font_name']) {
                    $array[] = $font['font_name'];    
                }
            }
            if ($array) {
                $array = array_unique($array);
                $content = implode('|', $array);
            }
        }
        $module = 'STPAGEBANNER';
        Configuration::updateValue('STSN_FONT_MODULE_'.$module, $content);
    }
}