<?php
class faqsPost extends ObjectModel
{
  public $id_gomakoil_faq;
  public $id_gomakoil_faq_category;
  public $date_add;
  public $active = 1;
  public $most = 0;
  public $association = 0;
  public $hide_faq = 0;
  public $as_url = 0;
  public $position;
  public $tags;
  public $question;
  public $answer;
  public $meta_title;
  public $meta_description;
  public $meta_keywords;
  public $link_rewrite;
  public $name = 'Admin';
  public $email = 'no';
  public $by_customer = 0;

  private $isAjax = false;

  public static $definition = array(
    'table' => 'gomakoil_faq',
    'primary' => 'id_gomakoil_faq',
    'multilang' => true,
    'fields' => array(
      //basic fields

      'date_add' =>       array('type' => self::TYPE_DATE, 'validate' => 'isString'),
      'id_gomakoil_faq_category' =>   array('type' => self::TYPE_INT, 'validate' => 'isInt'),
      'active'  =>    array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
      'most'  =>    array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
      'association'  =>     array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
      'hide_faq'  =>    array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
      'position' =>   array('type' => self::TYPE_INT,'validate' => 'isunsignedInt'),
      'as_url'  =>    array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
      'link_rewrite' =>   array('type' => self::TYPE_STRING, 'validate' => 'isLinkRewrite', 'required' => true, 'size' => 128, 'lang' => true),
      'by_customer'  =>     array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
      'name' =>   array('type' => self::TYPE_HTML, 'validate' => 'isString'),
      'email' =>  array('type' => self::TYPE_HTML, 'validate' => 'isString'),
      // Lang fields
      'question' =>   array('type' => self::TYPE_HTML, 'lang' => true, 'required' => true,  'validate' => 'isString'),
      'answer' =>   array('type' => self::TYPE_HTML, 'lang' => true,  'validate' => 'isString', 'required' => true),
      'tags' =>   array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
      'meta_title' =>       array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
      'meta_description' =>         array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
      'meta_keywords' =>        array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 128),

    )
  );

  public function __construct($id_gomakoil_faq = null, $id_lang = null, $id_shop = null)
  {
    $this->isAjax = Tools::getValue('ajax') ? true : false;

    self::$definition = array(
      'table' => 'gomakoil_faq',
      'primary' => 'id_gomakoil_faq',
      'multilang' => true,
      'fields' => array(
        //basic fields

        'date_add' =>       array('type' => self::TYPE_DATE, 'validate' => 'isString'),
        'id_gomakoil_faq_category' =>   array('type' => self::TYPE_INT, 'validate' => 'isInt'),
        'active'  =>    array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
        'most'  =>    array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
        'association'  =>     array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
        'hide_faq'  =>    array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
        'position' =>   array('type' => self::TYPE_INT,'validate' => 'isunsignedInt'),
        'as_url'  =>    array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
        'by_customer'  =>     array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
        'name' =>   array('type' => self::TYPE_HTML, 'validate' => 'isString'),
        'email' =>  array('type' => self::TYPE_HTML, 'validate' => 'isString'),
        // Lang fields
        'question' =>   array('type' => self::TYPE_HTML, 'lang' => true, 'required' => true,  'validate' => 'isString'),
        'answer' =>   array('type' => self::TYPE_HTML, 'lang' => true,  'required' => !$this->isAjax , 'validate' => 'isString'),
        'tags' =>   array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
        'link_rewrite' =>   array('type' => self::TYPE_STRING, 'validate' => 'isLinkRewrite', 'required' => true, 'size' => 128, 'lang' => true),
        'meta_title' =>       array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
        'meta_description' =>         array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
        'meta_keywords' =>        array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 128),
      )
    );

    Shop::addTableAssociation('gomakoil_faq', array('type' => 'shop'));
    parent::__construct($id_gomakoil_faq, $id_lang, $id_shop);
  }

  public function add($autodate = true, $null_values = false)
  {
    $cat = Tools::getValue('categoryBox');
    $categories = Tools::getValue('categoriesBox');
    $products = Tools::getValue('productIds');

    if(isset($cat) && $cat)
    {
      $this->id_gomakoil_faq_category = $cat;
    }
    $this->position = (int)$this->getLastPostPosition($cat) + 1;
    $res = parent::add($autodate, $null_values);

    $this->setAssociation($this->id, $categories, 'faq_association_category', 'id_category');
    $this->setAssociation($this->id, $products, 'faq_association_product', 'id_product');

    return $res;
  }

  public function setAssociation($id, $values, $table, $field){

    if($field == 'id_product'){
      $values = explode(",", $values);
    }

    Db::getInstance()->delete( $table, 'id_faq = '.(int)$id);
    if($values){
      foreach($values as $value){
        Db::getInstance()->insert( $table, array('id_faq' => (int)$id, $field => $value));
      }
    }
  }



  public function update($null_values = false)
  {
    if (Tools::getValue('statusgomakoil_faq') !== false) {
      return parent::update();
    }

    $cat = Tools::getValue('categoryBox');
    $categories = Tools::getValue('categoriesBox');
    $products = Tools::getValue('productIds');


    if($this->id_gomakoil_faq_category !== $cat && $cat){
      $this->position = (int)$this->getLastPostPosition($cat) + 1;
    }
    if($cat){
      $this->id_gomakoil_faq_category = $cat;
    }
    $rez = parent::update($null_values);

    $this->setAssociation($this->id_gomakoil_faq, $categories, 'faq_association_category', 'id_category');
    $this->setAssociation($this->id_gomakoil_faq, $products, 'faq_association_product', 'id_product');

    return $rez;
  }


  public function delete()
  {
    Db::getInstance()->delete( 'faq_association_category', 'id_faq = '.(int)$this->id_gomakoil_faq);
    Db::getInstance()->delete( 'faq_association_product', 'id_faq = '.(int)$this->id_gomakoil_faq);

    return parent::delete();
  }


  public function getLastPostPosition( $category = false)
  {
    return (int)(Db::getInstance()->getValue('
      SELECT MAX(bp.`position`)
      FROM `'._DB_PREFIX_.'gomakoil_faq` bp
      WHERE  bp.`id_gomakoil_faq_category` = '.(int)$category
      )
    );
  }


  public function getPost($id_lang = false, $id_shop = false, $id_category = false)
  {
    $where = '';

    if($id_category){
      $where = ' AND bc.id_gomakoil_faq_category = '. $id_category;
    }

    $sql = 'SELECT bpl.*, bp.*, bc.*
        FROM '._DB_PREFIX_.'gomakoil_faq_category bc
        LEFT JOIN '._DB_PREFIX_.'gomakoil_faq bp
        ON (bp.id_gomakoil_faq_category = bc.id_gomakoil_faq_category)
        LEFT JOIN '._DB_PREFIX_.'gomakoil_faq_lang bpl
        ON (bp.id_gomakoil_faq = bpl.id_gomakoil_faq)
        LEFT JOIN '._DB_PREFIX_.'gomakoil_faq_shop bps
        ON (bp.id_gomakoil_faq = bps.id_gomakoil_faq)
        LEFT JOIN '._DB_PREFIX_.'gomakoil_faq_category_lang bcl
        ON (bc.id_gomakoil_faq_category = bcl.id_gomakoil_faq_category)
        LEFT JOIN '._DB_PREFIX_.'gomakoil_faq_category_shop bcs
        ON (bc.id_gomakoil_faq_category = bcs.id_gomakoil_faq_category)
        WHERE bp.active=1
        AND bc.active=1
        AND bps.id_shop='.(int)$id_shop.'
        AND bcs.id_shop='.(int)$id_shop.'
        AND bpl.id_lang='.($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')).'
        AND bcl.id_lang='.($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'))
      .$where ;
    return Db::getInstance()->ExecuteS($sql);
  }

  public function getMostFaqs($id_shop = false, $id_lang = false )
  {
    $sql = "
			SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat
      FROM " . _DB_PREFIX_ . "gomakoil_faq gf
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfc.active = 1
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gfc.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = ".(int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gfc.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfs.id_shop = ".(int)($id_shop)."
      AND gfcs.id_shop = ".(int)($id_shop)."
      AND gfl.id_lang = ".(int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      AND gf.most = 1
      AND gf.active = 1
      ORDER BY gf.position
			";

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

  public function getFaqs($id_shop = false, $id_lang = false, $id_category = false, $id = false )
  {
    $where = '';
    if($id){
      $where = ' AND gf.id_gomakoil_faq = '.(int)$id;
    }
    $sql = "
        			SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat
      FROM " . _DB_PREFIX_ . "gomakoil_faq gf
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfc.active = 1
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gf.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = ".(int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gf.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfs.id_shop = ".(int)$id_shop."
      AND gfcs.id_shop = ".(int)$id_shop."
      AND gfl.id_lang = ".(int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      AND gf.id_gomakoil_faq_category = ".(int)$id_category."
      AND gf.active = 1

      $where
      ORDER BY gf.position
			";

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

  public function getFaqsByUrl($id_shop = false, $id_lang = false, $category, $fag = false )
  {
    $where = '';
    if($fag){
      $where = " AND gfl.link_rewrite = '".pSQL($fag)."'";
    }
    $sql = "
        			SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat
      FROM " . _DB_PREFIX_ . "gomakoil_faq gf
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfc.active = 1
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gf.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = ".(int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gf.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfs.id_shop = ".(int)$id_shop."
      AND gfcs.id_shop = ".(int)$id_shop."
      AND gfl.id_lang = ".(int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      AND gfcl.link_rewrite = '".pSQL($category)."'
      AND gf.active = 1

      $where
      ORDER BY gf.position
			";
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

  public function searchFaqs( $id_shop = false, $id_lang = false, $search = false)
  {
    $where = "";
    if( $search ){
      $where = ' AND ( MATCH (gfl.question, gfl.tags) AGAINST ("'.pSQL($search).'") OR gfl.question LIKE "%'.pSQL($search).'%" OR gfl.tags LIKE "%'.pSQL($search).'%" ) ';
    }
    $sql = '
       			SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat, MATCH (gfl.question, gfl.tags) AGAINST
      ("'.pSQL($search).'") AS score
      FROM ' . _DB_PREFIX_ . 'gomakoil_faq gf
      INNER JOIN ' . _DB_PREFIX_ . 'gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN ' . _DB_PREFIX_ . 'gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
      INNER JOIN ' . _DB_PREFIX_ . 'gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfc.active = 1
      INNER JOIN ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang as gfcl
      ON gf.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = '.(int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')).'
      INNER JOIN ' . _DB_PREFIX_ . 'gomakoil_faq_category_shop as gfcs
      ON gf.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfs.id_shop = '.(int)$id_shop.'
      AND gfcs.id_shop = '.(int)$id_shop.'
      AND gfl.id_lang = '.(int)($id_lang ? (int)$id_lang : (int)Configuration::get('PS_LANG_DEFAULT')).'
      AND gf.active = 1
      ' . $where . '
      ORDER BY score DESC
			';

  
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }


  public function getAssociationCategories( $id_faq )
  {
    $sql = '
       			SELECT ac.id_category
      FROM ' . _DB_PREFIX_ . 'faq_association_category ac
      WHERE ac.id_faq = '.(int)$id_faq.'

			';
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

  public function getAssociationProducts( $id_faq )
  {
    $sql = '
       			SELECT ac.id_product
      FROM ' . _DB_PREFIX_ . 'faq_association_product ac
      WHERE ac.id_faq = '.(int)$id_faq.'

			';
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

  public function getAssociationFaqs($ids, $id_shop, $id_lang){
    $sql = "
       			SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat
      FROM  " . _DB_PREFIX_ . "gomakoil_faq as gf

      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfc.active = 1
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gf.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = ".(int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gf.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gf.id_gomakoil_faq IN(".$ids.")
      AND gf.association = 1
      AND gfs.id_shop = ".(int)$id_shop."
      AND gfcs.id_shop = ".(int)$id_shop."
      AND gfl.id_lang = ".(int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      AND gf.active = 1

			";

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

  public function getIdFaqsByCategories($ids ){
    $sql = '
       			SELECT ac.id_faq
      FROM ' . _DB_PREFIX_ . 'faq_association_category ac
      WHERE ac.id_category IN( '.$ids.')

			';
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

  public function getIdFaqsByProduct( $id ){
    $sql = '
       			SELECT ac.id_faq
      FROM ' . _DB_PREFIX_ . 'faq_association_product ac
      WHERE ac.id_product = '.(int)$id.'

			';
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }


  public function getFeaturedFaqsFooter($id_shop = false, $id_lang = false, $limit = false )
  {

    $where = '';
    if($limit){
      $where = ' LIMIT '.(int)$limit;
    }

    $sql = "
			SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat
      FROM " . _DB_PREFIX_ . "gomakoil_faq gf
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
       INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
       ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfc.active = 1
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gfc.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = ".(int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gfc.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfs.id_shop = ".(int)$id_shop."
      AND gfcs.id_shop = ".(int)$id_shop."
      AND gfl.id_lang = ".(int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT'))."
      AND gf.most = 1
      AND gf.active = 1
      ORDER BY gf.position
      ".$where."
			";
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

}