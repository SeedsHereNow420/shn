<?php
class faqsCategory extends ObjectModel
{
  public $id_category;
  public $date_add;
  public $active = 1;
  public $position;
  public $color = '#000000';
  public $name;
  public $description;
  public $meta_title;
  public $meta_description;
  public $meta_keywords;
  public $link_rewrite;

  public static $definition = array(
    'table' => 'gomakoil_faq_category',
    'primary' => 'id_gomakoil_faq_category',
    'multilang' => true,
    'fields' => array(
      //basic fields
      'date_add' => 			array('type' => self::TYPE_DATE, 'validate' => 'isString'),
      'active'  => 		array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
      'position' =>		array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
      'color' => 	array('type' => self::TYPE_HTML, 'validate' => 'isString'),

      // Lang fields
      'name' =>			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
      'description' => 	array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
      'link_rewrite' => 	array('type' => self::TYPE_STRING, 'validate' => 'isLinkRewrite', 'required' => true, 'size' => 128, 'lang' => true),
      'meta_title' => 			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 255),
      'meta_description' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 255),
      'meta_keywords' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 128),
     )
  );

  public function __construct($id_category = null, $id_lang = null, $id_shop = null)
  {
    Shop::addTableAssociation('gomakoil_faq_category', array('type' => 'shop'));
    parent::__construct($id_category, $id_lang, $id_shop);
  }

  public function add($autodate = true, $null_values = false)
  {
    $this->position = (int)$this->getLastCategoryPosition() + 1;
    $ret = parent::add($autodate, $null_values);
    return $ret;
  }

  public function update($null_values = false) {

    return parent::update($null_values);
  }


  public function getLastCategoryPosition()
  {
    return (int)(Db::getInstance()->getValue('
		SELECT MAX(c.`position`)
		FROM `'._DB_PREFIX_.'gomakoil_faq_category` c
		') );
  }

  public function getCategories($id_lang = false, $id_shop = false)
  {
    $where = 'WHERE bc.active = 1';

    if ($id_lang) {
      $where .= ' AND bcl.id_lang='.($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'));
    }

    if ($id_shop) {
      $where .= ' AND bcs.id_shop='.$id_shop;
    }

    $sql = 'SELECT bcl.*, bcs.*,bc.*, count(bp.id_gomakoil_faq_category) as count
        FROM '._DB_PREFIX_.'gomakoil_faq_category bc
        LEFT JOIN '._DB_PREFIX_.'gomakoil_faq_category_lang bcl
        ON (bc.id_gomakoil_faq_category = bcl.id_gomakoil_faq_category)
        LEFT JOIN '._DB_PREFIX_.'gomakoil_faq_category_shop bcs
        ON (bc.id_gomakoil_faq_category = bcs.id_gomakoil_faq_category)
        LEFT JOIN '._DB_PREFIX_.'gomakoil_faq bp
        ON bc.id_gomakoil_faq_category = bp.id_gomakoil_faq_category
        '.$where.'
         GROUP BY bc.id_gomakoil_faq_category
        ORDER BY bc.position'
    ;
    return Db::getInstance()->ExecuteS($sql);
  }

  public function getCategoriesFaq( $id_shop = false, $id_lang = false, $id_category = false)
  {
    $where = '';
    if($id_category){
      $where = ' AND gfc.id_gomakoil_faq_category = '.(int)$id_category;
    }
    $sql = "
			SELECT *
      FROM " . _DB_PREFIX_ . "gomakoil_faq_category gfc
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gfc.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gfc.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfcs.id_shop = ".(int)$id_shop."
      AND gfcl.id_lang = ".(int)($id_lang ? $id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      AND gfc.active = 1
      $where
      ORDER BY gfc.position
			";
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

  public function getCategoryByName( $id_shop = false, $id_lang = false, $category = false)
  {
    $where = '';
    if($category){
      $where = ' AND gfcl.link_rewrite = "'.pSQL($category).'"';
    }
    $sql = "
			SELECT *
      FROM " . _DB_PREFIX_ . "gomakoil_faq_category gfc
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gfc.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gfc.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfcs.id_shop = ".(int)$id_shop."
      AND gfcl.id_lang = ".(int)($id_lang ? $id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      AND gfc.active = 1
      $where
      ORDER BY gfc.position
			";
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }
}