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

class StEasyContentFontClass
{
    public static function deleteByContent($id_st_easy_content)
    {
    	if(!$id_st_easy_content)
    		return false;
        return Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'st_easy_content_font WHERE `id_st_easy_content`='.(int)$id_st_easy_content);
    }
    public static function getByContent($id_st_easy_content)
    {
    	if(!$id_st_easy_content)
    		return false;
        return Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'st_easy_content_font WHERE `id_st_easy_content`='.(int)$id_st_easy_content);
    }

    public static function changeContentFont($id, $fonts)
    {
        if(!$id)
            return false;
        $res = true;
        foreach ($fonts as $font)
            if($font)
                $res &= Db::getInstance()->insert('st_easy_content_font', array(
                    'id_st_easy_content' => (int)$id,
                    'font_name' => $font
                ));
        self::cacheFonts();
        return $res;
    }

    public static function getAll($active=0)
    {
        return Db::getInstance()->executeS('
            SELECT f.*
            FROM `'._DB_PREFIX_.'st_easy_content_font` f
            LEFT JOIN `'._DB_PREFIX_.'st_easy_content` ec ON (f.`id_st_easy_content` = ec.`id_st_easy_content`)
            LEFT JOIN `'._DB_PREFIX_.'st_easy_content_shop` ecs ON (ec.`id_st_easy_content`=ecs.`id_st_easy_content`)
            WHERE ecs.`id_shop` = '.(int)Context::getContext()->shop->id.'
            '.($active ? ' AND ec.`active`=1 ' : '')
        );
    }
    
    public static function cacheFonts()
    {
        $fonts_in_settings = StEasyContentSettingClass::getGoogleFonts();
        $fonts = self::getAll(1);
        $content = '';
        if ($fonts_in_settings) {
            $fonts = array_merge($fonts, $fonts_in_settings);
        }
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
        $module = 'STEASYCONTENT';
        Configuration::updateValue('STSN_FONT_MODULE_'.$module, $content);
    }
}