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
class StBlogTagClass extends ObjectModel
{
	/** @var integer ID */
	public $id_st_blog_tag;

 	/** @var integer Language id */
	public $id_lang;

 	/** @var string Name */
	public $name;
    
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'st_blog_tag',
		'primary' => 'id_st_blog_tag',
		'fields' => array(
			'id_lang' => 	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
			'name' => 		array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'required' => true),
		),
	);

	public static function getMainTags($id_lang, $nb = 10)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT t.`name`, COUNT(st.`id_st_blog_tag`) AS times
		FROM `'._DB_PREFIX_.'st_blog_tag_map` st
		LEFT JOIN `'._DB_PREFIX_.'st_blog_tag` t ON (t.`id_st_blog_tag` = st.`id_st_blog_tag`)
		WHERE t.`id_lang` = '.(int)$id_lang.'
		GROUP BY t.`id_st_blog_tag`
		ORDER BY times DESC
		LIMIT 0, '.(int)$nb);
	}
}


