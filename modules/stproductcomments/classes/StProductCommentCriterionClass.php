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

class StProductCommentCriterionClass extends ObjectModel
{
	public	$id;
	public	$id_st_product_comment_criterion_type;
	public	$name;
	public	$active = true;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'st_product_comment_criterion',
		'primary' => 'id_st_product_comment_criterion',
		'multilang' => true,
		'fields' => array(
			'id_st_product_comment_criterion_type' =>	array('type' => self::TYPE_INT),
			'active' =>	 array('type' => self::TYPE_BOOL),
			// Lang fields
			'name' =>  array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 128),
		)
	);

	public function delete()
	{
		if (!parent::delete())
			return false;
		return Db::getInstance()->execute('
			DELETE FROM `'._DB_PREFIX_.'st_product_comment_grade`
			WHERE `id_st_product_comment_criterion` = '.(int)$this->id);
	}

	/**
	 * Add grade to a criterion
	 *
	 * @return boolean succeed
	 */
	public function addGrade($id_st_product_comment, $grade)
	{
		if (!Validate::isUnsignedId($id_st_product_comment))
			die(Tools::displayError());
		if ($grade < 0)
			$grade = 0;
		elseif ($grade > 10)
			$grade = 10;
		return (Db::getInstance()->execute('
		INSERT INTO `'._DB_PREFIX_.'st_product_comment_grade`
		(`id_st_product_comment`, `id_st_product_comment_criterion`, `grade`) VALUES(
		'.(int)($id_st_product_comment).',
		'.(int)$this->id.',
		'.(int)($grade).')'));
	}

	/**
	 * Get Criterions
	 *
	 * @return array Criterions
	 */
	public static function getCriterions($id_lang, $active = false, $type = false)
	{
	   $cache_id = 'ProductCommentCriterion::getCriterions_'.(int)$id_lang.'_'.(int)$type.'_'.(int)$active;
       if (!Cache::isStored($cache_id)) {
           $sql = '
    			SELECT pcc.*, pccl.`name`
    			FROM `'._DB_PREFIX_.'st_product_comment_criterion` pcc
    			JOIN `'._DB_PREFIX_.'st_product_comment_criterion_lang` pccl ON (pcc.id_st_product_comment_criterion = pccl.id_st_product_comment_criterion)
    			WHERE pccl.`id_lang` = '.(int)$id_lang.($active ? ' AND active = 1' : '').($type ? ' AND id_st_product_comment_criterion_type = '.(int)$type : '').'
    			ORDER BY pccl.`name` ASC';
    		$criterions = Db::getInstance()->executeS($sql);
            Cache::store($cache_id, $criterions);
       }
	   return Cache::retrieve($cache_id);
	}
    
    public static function getGrades($id_st_product_comment)
    {
        $id_lang = (int)Context::getContext()->language->id;
        $cache_id = 'ProductCommentCriterion::getGrades_'.(int)$id_lang.'_'.(int)$id_st_product_comment;
       if (!Cache::isStored($cache_id)) {
           $sql = '
    			SELECT pccl.`name`, pcg.`grade`
    			FROM `'._DB_PREFIX_.'st_product_comment_criterion` pcc
    			LEFT JOIN `'._DB_PREFIX_.'st_product_comment_criterion_lang` pccl 
                ON (pcc.id_st_product_comment_criterion = pccl.id_st_product_comment_criterion)
                LEFT JOIN `'._DB_PREFIX_.'st_product_comment_grade` pcg 
                ON pcc.`id_st_product_comment_criterion` = pcg.`id_st_product_comment_criterion`
    			WHERE pccl.`id_lang` = '.(int)$id_lang.'
                AND pcg.`id_st_product_comment` = '.(int)$id_st_product_comment.'
    			ORDER BY pcc.`id_st_product_comment_criterion` ASC';
    		$grades = Db::getInstance()->executeS($sql);
            Cache::store($cache_id, $grades);
       }
	   return Cache::retrieve($cache_id);
    }
    
    public static function deleteByComment($id_st_product_comment = 0)
    {
        return Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'st_product_comment_grade` WHERE `id_st_product_comment`='.(int)$id_st_product_comment);
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
}
