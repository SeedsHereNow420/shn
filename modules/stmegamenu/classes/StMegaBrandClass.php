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

class StMegaBrandClass
{
    public static function deleteByMenu($id_st_mega_menu)
    {
    	if(!$id_st_mega_menu)
    		return false;
        return Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'st_menu_brand WHERE `id_st_mega_menu`='.(int)$id_st_mega_menu);
    }
    public static function getByMenu($id_st_mega_menu)
    {
    	if(!$id_st_mega_menu)
    		return false;
        return Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'st_menu_brand WHERE `id_st_mega_menu`='.(int)$id_st_mega_menu);
    }

    public static function changeMenuBrands($id, $menu_brands_id)
    {
        if(!$id)
            return false;
        $res = true;
        foreach ($menu_brands_id as $id_brand)
            $res &= Db::getInstance()->insert('st_menu_brand', array(
                'id_st_mega_menu' => (int)$id,
                'id_manufacturer' => (int)$id_brand
            ));
        return $res;
    }


    public static function getMenuBrandsLight($id_lang, $id_st_mega_menu)
	{
		$sql = 'SELECT m.*, ml.`description`, ml.`short_description`
			FROM `'._DB_PREFIX_.'st_menu_brand` stb
            LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON m.`id_manufacturer` = stb.`id_manufacturer` 
			LEFT JOIN `'._DB_PREFIX_.'manufacturer_lang` ml ON (
				m.`id_manufacturer` = ml.`id_manufacturer`
				AND ml.`id_lang` = '.(int)$id_lang.'
			)
			'.Shop::addSqlAssociation('manufacturer', 'm');
			$sql .= ' WHERE stb.`id_st_mega_menu` = '.$id_st_mega_menu.' AND m.`active` = 1';

		$manufacturers = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		if ($manufacturers === false)
			return false;

		return $manufacturers;
	}

    public static function getMenuBrands($id_lang, $id_st_mega_menu)
    {
    	$manufacturers = self::getMenuBrandsLight($id_lang, $id_st_mega_menu);
    	if ($manufacturers === false)
			return false;
		
		$total_manufacturers = count($manufacturers);

		for ($i = 0; $i < $total_manufacturers; $i++)
        {
            $manufacturers[$i]['url'] = Context::getContext()->link->getManufacturerLink($manufacturers[$i]['id_manufacturer']);
			$manufacturers[$i]['image'] = Context::getContext()->link->getManufacturerImageLink($manufacturers[$i]['id_manufacturer']);
        }
		return $manufacturers;
    }
}