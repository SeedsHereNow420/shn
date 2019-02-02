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

class StBlogRelatedArticlesClass
{
	
	public static function saveRelatedArticles($id_st_blog_1,$related_artices_id)
	{
	    if(!Validate::isUnsignedId($id_st_blog_1))
            return false;
	    $res = true;
		foreach ($related_artices_id as $id_st_blog_2)
            if(Validate::isUnsignedId($id_st_blog_2))
                $res &= Db::getInstance()->insert('st_blog_related_articles', array(
    				'id_st_blog_1' => (int)$id_st_blog_1,
    				'id_st_blog_2' => (int)$id_st_blog_2,
    			));
        return $res;
	}
	public static function deleteRelatedArticles($id_st_blog)
	{
		return Db::getInstance()->delete('st_blog_related_articles', 'id_st_blog_1 = '.(int)$id_st_blog);
	}
	public static function deleteFromRelatedArticles($id_st_blog)
	{
		return Db::getInstance()->delete('st_blog_related_articles', 'id_st_blog_2 = '.(int)$id_st_blog);
	}
    public static function getRelatedArticlesLight($id_lang, $id_st_blog)
	{
		$sql = 'SELECT b.`id_st_blog`,bl.`name`,`id_st_blog_2`
				FROM `'._DB_PREFIX_.'st_blog_related_articles`
				LEFT JOIN `'._DB_PREFIX_.'st_blog` b ON (b.`id_st_blog`= `id_st_blog_2`)
				'.Shop::addSqlAssociation('st_blog', 'b').'
				LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` bl ON (
					b.`id_st_blog` = bl.`id_st_blog`
					AND bl.`id_lang` = '.(int)$id_lang.'
				)
				WHERE `id_st_blog_1` = '.(int)$id_st_blog;

		return Db::getInstance()->executeS($sql);
	}
    
    public static function getRelatedArticles($id_st_blog)
	{
		$sql = 'SELECT b.`id_st_blog`
				FROM `'._DB_PREFIX_.'st_blog_related_articles`
				LEFT JOIN `'._DB_PREFIX_.'st_blog` b ON (b.`id_st_blog`= `id_st_blog_2`)
				'.Shop::addSqlAssociation('st_blog', 'b').'
				WHERE `id_st_blog_1` = '.(int)$id_st_blog;
        $result = array();
        $data = Db::getInstance()->executeS($sql);
        if(is_array($data) && count($data))
            foreach($data as $v)
                $result[] = $v['id_st_blog'];
		return $result;
	} 
}

?>
