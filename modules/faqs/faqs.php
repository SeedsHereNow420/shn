<?php

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class faqs extends Module implements WidgetInterface
{

  private $_currentIndex;

  public function __construct()
  {
    require_once(dirname(__FILE__) . '/classes/faqsPost.php');
    require_once(dirname(__FILE__) . '/classes/faqsCategory.php');

    $this->_currentIndex = 'index.php?controller=AdminModules';
    $this->name = 'faqs';
    $this->tab = 'front_office_features';
    $this->version = '2.9.0';
    $this->author = 'MyPrestaModules';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    $this->bootstrap = true;
    $this->module_key = "0eaaa558691f09287322895c8abd26f4";

    parent::__construct();

    $this->displayName = $this->l('Frequently Asked Questions(FAQs) Page');
    $this->description = $this->l('Create a FAQs page for your PrestaShop website and answer all the popular questions your users ask. Make necessary information accessible.');
    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

    $this->seo_home_page_id = Configuration::get('FAQS_SEO_HOME_PAGE') != false ? Configuration::get('FAQS_SEO_HOME_PAGE') : 'faqs';
  }

  public function install()
  {
    if (!parent::install()
      || !$this->registerHook('displayHeader')
      || !$this->registerHook('moduleRoutes')
      || !$this->registerHook('displayProductExtraContent')
      || !$this->registerHook('displayLeftColumn')
      || !$this->registerHook('displayRightColumn')
      || !$this->registerHook('footer')
    ) {
      return false;
    }


    if (!$this->existsTab('AdminFaqs')) {
      if (!$this->addTab('Faqs', 'AdminFaqs', $this->getIdTabFromClassName('CONFIGURE'), 0)) {
        return false;
      } else {
        $id_tab = (int)$this->getIdTabFromClassName('AdminFaqs');
        Db::getInstance(_PS_USE_SQL_SLAVE_)->update("tab", array('icon' => 'description'), "id_tab = $id_tab");
      }
    }


    if (!$this->existsTab('AdminFaqsCategory')) {
      if (!$this->addTab('Categories', 'AdminFaqsCategory', $this->getIdTabFromClassName('AdminFaqs'))) {
        return false;
      } else {
        $id_tab = (int)$this->getIdTabFromClassName('AdminFaqsCategory');
        Db::getInstance(_PS_USE_SQL_SLAVE_)->update("tab", array('icon' => 'description'), "id_tab = $id_tab");
      }
    }


    if (!$this->existsTab('AdminFaqsPost')) {
      if (!$this->addTab('Questions/Answers', 'AdminFaqsPost', $this->getIdTabFromClassName('AdminFaqs'))) {
        return false;
      } else {
        $id_tab = (int)$this->getIdTabFromClassName('AdminFaqsPost');
        Db::getInstance(_PS_USE_SQL_SLAVE_)->update("tab", array('icon' => 'description'), "id_tab = $id_tab");
      }
    }


    if (!$this->existsTab('AdminFaqsSettings')) {
      if (!$this->addTab('Settings', 'AdminFaqsSettings', $this->getIdTabFromClassName('AdminFaqs'))) {
        return false;
      } else {
        $id_tab = (int)$this->getIdTabFromClassName('AdminFaqsPost');
        Db::getInstance(_PS_USE_SQL_SLAVE_)->update("tab", array('icon' => 'description'), "id_tab = $id_tab");
      }
    }

    $this->installDb();


    $meta = new Meta();
    $pages = $meta->getPages();

    if (!isset($pages['faqs - display']) || !$pages['faqs - display']) {
      $meta->page = 'module-faqs-display';
      $meta->configurable = 1;
      $meta->save();
    }


    Configuration::updateValue('FAQS_SHOW_BUTTON', 1);
    Configuration::updateValue('FAQS_SHOW_BUTTON_FAQ', 0);
    Configuration::updateValue('FAQS_EMAILS', 'demo@demo.com');
    Configuration::updateValue('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE', 1);
    Configuration::updateValue('FAQS_ENABLE_CAPTCHA', 1);
    Configuration::updateValue('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ', 1);
    Configuration::updateValue('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT', 5);
    Configuration::updateValue('FAQS_SEO_HOME_PAGE', '');

    Configuration::updateValue('FAQS_CSS_CODE', '');

    return true;
  }

  public function testUpgrade()
  {
    $versions = array('2.6.0');
    foreach ($versions as $ver) {
      include(dirname(__FILE__) . '/upgrade/install-' . $ver . '.php');
      $upgrade_func = 'upgrade_module_' . str_replace('.', '_', $ver);
      if (!$upgrade_func($this)) return false;
    }
  }

  public function uninstall()
  {
    $this->removeTab('AdminFaqs');
    $this->removeTab('AdminFaqsCategory');
    $this->removeTab('AdminFaqsPost');
    $this->removeTab('AdminFaqsSettings');

    Configuration::deleteByName('FAQS_EMAILS');
    Configuration::deleteByName('FAQS_SHOW_BUTTON');
    Configuration::deleteByName('FAQS_SHOW_BUTTON_FAQ');
    Configuration::deleteByName('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE');
    Configuration::deleteByName('FAQS_CATEGORIES');
    Configuration::deleteByName('FAQS_CATEGORIES_FAQ');
    Configuration::deleteByName('FAQS_FEATURED');
    Configuration::deleteByName('FAQS_FEATURED_FAQ');
    Configuration::deleteByName('FAQS_FEATURED_FOOTER');
    Configuration::deleteByName('FAQS_FEATURED_FOOTER_COUNT');
    Configuration::deleteByName('FAQS_ENABLE_CAPTCHA');
    Configuration::deleteByName('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ');
    Configuration::deleteByName('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT');
    Configuration::deleteByName('FAQS_CSS_CODE');
    Configuration::deleteByName('FAQS_SEO_HOME_PAGE');
    
    if (!parent::uninstall() || !$this->uninstallDb()) {
      return false;
    }

    return true;
  }

  public function hookDisplayProductExtraContent()
  {
    $array = array();

    $tpl = $this->fagsLink();

    if ($tpl !== false) {
      $array[] = (new PrestaShop\PrestaShop\Core\Product\ProductExtraContent())
        ->setTitle($this->l('Questions(FAQs)'))
        ->setContent($tpl);
    }

    return $array;
  }

  public function getBaseUrl($rewrite_settings)
  {
    if (!$rewrite_settings) {
      if (Language::isMultiLanguageActivated()) {
        $baseUrl = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . 'index.php?fc=module&module=faqs&controller=display&id_lang=' . Context::getContext()->language->id;
      } else {
        $baseUrl = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . 'index.php?fc=module&module=faqs&controller=display';
      }
    } else {
      if (Language::isMultiLanguageActivated()) {
        $baseUrl = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . Context::getContext()->language->iso_code . '/'.$this->seo_home_page_id.'/';
      } else {
        $baseUrl = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . $this->seo_home_page_id.'/';
      }
    }

    return $baseUrl;
  }

  public function fagsLink()
  {
    $id_product = ToolsCore::getValue('id_product');
    $obj = new Product($id_product);
    $id_category = implode(",", $obj->getCategories());
    $faqs = array();
    $ids_cat = array();
    $ids_prod = array();
    $post = new faqsPost();
    $id_by_prod = $post->getIdFaqsByProduct($id_product);
    $id_by_cat = $post->getIdFaqsByCategories($id_category);

    foreach ($id_by_prod as $val) {
      $ids_prod[] = $val['id_faq'];
    }

    foreach ($id_by_cat as $val) {
      $ids_cat[] = $val['id_faq'];
    }

    $result = array_unique(array_merge($ids_cat, $ids_prod));

    if ($result) {
      $faqs = $post->getAssociationFaqs(implode(",", $result), Context::getContext()->shop->id, Context::getContext()->language->id);
    }

    $rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');
    $button_on_product_page = false;

    if (Configuration::get('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE') == 1) {
      $button_on_product_page = true;
    }

    $this->context->smarty->assign(array(
      'faqs' => $faqs,
      'faqUrl' => $this->getBaseUrl($rewrite_settings),
      'basePath' => _PS_BASE_URL_SSL_ . __PS_BASE_URI__,
      'id_shop' => Context::getContext()->shop->id,
      'id_lang' => Context::getContext()->language->id,
      'button_on_product_page' => $button_on_product_page
    ));


    if ($button_on_product_page == false && $faqs == false) {
      return false;
    } else if ($rewrite_settings) {
      return $this->display(__FILE__, 'views/templates/front/tab.tpl');
    } else {
      return $this->display(__FILE__, 'views/templates/front/tab-no-rewrite.tpl');
    }

  }

  public function hookModuleRoutes($params)
  {
    return array(
      'display-faq-cat' => array(
        'controller' => 'display',
        'rule' => $this->seo_home_page_id.'{/:category}.html',
        'keywords' => array(
          'category' => array(
            'regexp' => '[_a-zA-Z0-9-\pL]*',
            'param' => 'category',
          ),
          'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
          'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
        ),
        'params' => array(
          'fc' => 'module',
          'module' => 'faqs'
        )
      ),
      'display-faq-question' => array(
        'controller' => 'display',
        'rule' => $this->seo_home_page_id.'{/:category}{/:question}.html',
        'keywords' => array(
          'category' => array(
            'regexp' => '[_a-zA-Z0-9-\pL]*',
            'param' => 'category',
          ),
          'question' => array(
            'regexp' => '[_a-zA-Z0-9-\pL]*',
            'param' => 'question',
          ),
          'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
          'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
        ),
        'params' => array(
          'fc' => 'module',
          'module' => 'faqs'
        )
      ),
      'display-faq-search' => array(
        'controller' => 'display',
        'rule' => $this->seo_home_page_id.'/search{/:search}',
        'keywords' => array(
          'search' => array(
            'regexp' => '.*',
            'param' => 'search',
          ),
          'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
          'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
        ),
        'params' => array(
          'fc' => 'module',
          'module' => 'faqs'
        )
      ),
      'display-faq-home' => array(
        'controller' => 'display',
        'rule' => $this->seo_home_page_id.'/',
        'keywords' => array(
          'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
          'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
        ),
        'params' => array(
          'fc' => 'module',
          'module' => 'faqs'
        )
      ),
      'display-faq-home2' => array(
        'controller' => 'display',
        'rule' => $this->seo_home_page_id,
        'keywords' => array(
          'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
          'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
        ),
        'params' => array(
          'fc' => 'module',
          'module' => 'faqs'
        )
      ),
    );
  }

  public function existsTab($tabClass)
  {
    $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
		SELECT id_tab AS id
		FROM `' . _DB_PREFIX_ . 'tab` t
		WHERE LOWER(t.`class_name`) = \'' . pSQL($tabClass) . '\'');
    if (count($result) == 0)
      return false;

    return true;
  }

  public function addTab($tabName, $tabClass, $id_parent)
  {
    $tab = new Tab();
    $langs = Language::getLanguages();
    foreach ($langs as $lang) {
      $tab->name[$lang['id_lang']] = $tabName;
    }
    $tab->class_name = $tabClass;
    $tab->module = $this->name;
    $tab->id_parent = $id_parent;
    if (!$tab->save())
      return false;

    return true;
  }

  public function removeTab($tabClass)
  {
    $idTab = Tab::getIdFromClassName($tabClass);
    if ($idTab != 0) {
      $tab = new Tab($idTab);
      $tab->delete();
      return true;
    }
    return false;
  }

  public function getIdTabFromClassName($tabName)
  {
    $sql = 'SELECT id_tab FROM ' . _DB_PREFIX_ . 'tab WHERE class_name="' . $tabName . '"';
    $tab = Db::getInstance()->getRow($sql);
    return (int)$tab['id_tab'];
  }

  public function installDb()
  {

    // Table category
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category(
				id_gomakoil_faq_category int(11) NOT NULL AUTO_INCREMENT,
				active boolean NULL,
        `position` INT(11)  NOT NULL,
        date_add datetime NULL,
        `color` TEXT  NOT NULL,
				PRIMARY KEY (`id_gomakoil_faq_category`)
				)';
    Db::getInstance()->execute($sql);

    // Table category_lang
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang(
				id_gomakoil_faq_category int(11) NOT NULL AUTO_INCREMENT,
				id_lang int(11) NOT NULL,
				`name` nvarchar(500) NOT NULL,
				description nvarchar(2000) NULL,
				link_rewrite nvarchar(1000) NOT NULL,
				meta_title nvarchar(500) NULL,
				meta_description nvarchar(1000) NULL,
				meta_keywords nvarchar(1000) NULL,
				PRIMARY KEY(id_gomakoil_faq_category, id_lang)
				)
				CHARACTER SET utf8 COLLATE utf8_general_ci';
    Db::getInstance()->execute($sql);

    // Table category_shop
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category_shop';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category_shop(
				id_gomakoil_faq_category int(11) NOT NULL AUTO_INCREMENT,
				`id_shop` INT(11) NOT NULL,
				PRIMARY KEY(id_gomakoil_faq_category, id_shop)
				)
				CHARACTER SET utf8 COLLATE utf8_general_ci';
    Db::getInstance()->execute($sql);


    // Table post
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq(
				id_gomakoil_faq int(11) NOT NULL AUTO_INCREMENT,
				id_gomakoil_faq_category int(11) NOT NULL,
				`most` INT(11)  NOT NULL,
				`association` INT(11)  NOT NULL,
				`hide_faq` INT(11)  NOT NULL,
				name nvarchar(500) NULL,
				email nvarchar(500) NULL,
				by_customer boolean NULL,
				position int(11) NULL,
				active boolean NULL,
				date_add datetime NULL,
				as_url int(1) NULL,
				PRIMARY KEY(id_gomakoil_faq)
				)';
    Db::getInstance()->execute($sql);


    // Table post_lang
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_lang';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_lang(
				id_gomakoil_faq int(11) NOT NULL AUTO_INCREMENT,
				id_lang int(11) NOT NULL,
				question text NULL,
				answer text NULL,
				link_rewrite nvarchar(1000) NOT NULL,
				meta_title nvarchar(500) NULL,
				meta_description nvarchar(1000) NULL,
				meta_keywords nvarchar(1000) NULL,
				tags nvarchar(2000) NULL,

				PRIMARY KEY(id_gomakoil_faq,id_lang),
				FULLTEXT INDEX `search` (`question` ASC, `tags` ASC))
				CHARACTER SET utf8 COLLATE utf8_general_ci
				ENGINE = MyISAM
				';
    Db::getInstance()->execute($sql);

    // Table post_shop
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_shop';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_shop(
				id_gomakoil_faq int(11) NOT NULL AUTO_INCREMENT,
				`id_shop` INT(11) NOT NULL,
				PRIMARY KEY(id_gomakoil_faq, id_shop)
				)
				CHARACTER SET utf8 COLLATE utf8_general_ci';

    Db::getInstance()->execute($sql);

    //Association tables
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'faq_association_product';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'faq_association_product(
				id_faq_association_product int(11) NOT NULL AUTO_INCREMENT,
				id_faq int(11) NOT NULL,
				id_product int(11) NOT NULL,
				PRIMARY KEY(id_faq_association_product)
				)';
    Db::getInstance()->execute($sql);

    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'faq_association_category';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'faq_association_category(
				id_faq_association_category int(11) NOT NULL AUTO_INCREMENT,
				id_faq int(11) NOT NULL,
				id_category int(11) NOT NULL,
				PRIMARY KEY(id_faq_association_category)
				)';
    Db::getInstance()->execute($sql);

    return true;
  }

  public function uninstallDb()
  {
    $tables_to_drop = array('gomakoil_faq_category',
                            'gomakoil_faq_category_lang',
                            'gomakoil_faq_category_shop',
                            'gomakoil_faq',
                            'gomakoil_faq_lang',
                            'gomakoil_faq_shop',
                            'faq_association_product',
                            'faq_association_category'
    );

    foreach ($tables_to_drop as $table_name) {
      $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . $table_name;

      if (!Db::getInstance()->execute($sql)) {
        return false;
      }
    }

    return true;
  }

  public function uninstallOldDb()
  {
    //     delete table category
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category';
    Db::getInstance()->execute($sql);

    //     delete table post
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq';
    Db::getInstance()->execute($sql);

    return true;
  }

  /**
   * @param array $old_faqs
   * @param string $type
   * @return array|bool
   */
  private function getFaqShopTablesFromLangTables(array $old_faqs, $type)
  {
    if ($type == 'faq') {
      $id_key = 'id_gomakoil_faq';
    } elseif ($type == 'category') {
      $id_key = 'id_gomakoil_faq_category';
    } else {
      return false;
    }

    if (empty($old_faqs) || !$old_faqs) {
      return array('shop' => '', 'lang' => '');
    }

    $faq_shop_tmp = array();
    $faq_lang_tmp = array();

    $faq_shop_table = array();
    $faq_lang_table = $old_faqs;

    foreach ($old_faqs as $key => $oldFaq) {
      $id_faq = $oldFaq[$id_key];
      $id_shop = $oldFaq['id_shop'];
      $id_lang = $oldFaq['id_lang'];

      if (!in_array(($id_faq . ':' . $id_shop), $faq_shop_tmp)) {
        array_push($faq_shop_tmp, ($id_faq . ':' . $id_shop));
      }

      if (in_array(($id_faq . ':' . $id_lang), $faq_lang_tmp)) {
        unset($faq_lang_table[$key]);
      } else {
        array_push($faq_lang_tmp, ($id_faq . ':' . $id_lang));
      }

      unset($faq_lang_table[$key]['id_shop']);
    }

    foreach ($faq_shop_tmp as $faq_shop_row) {
      $id_faq = (int) explode(':', $faq_shop_row)[0];
      $id_shop = (int) explode(':', $faq_shop_row)[1];

      if (is_int($id_faq) && is_int($id_shop)) {
        array_push($faq_shop_table, array($id_key => $id_faq, 'id_shop' => $id_shop));
      }
    }

    if (empty($faq_shop_table) && empty($faq_lang_table)) {
      return false;
    }

    return array('shop' => $faq_shop_table, 'lang' => $faq_lang_table);
  }

  /**
   * @return bool
   */
  public function upgradeFaqs2_9_0()
  {
    $old_faqs = Db::getInstance()->executeS('SELECT * FROM ' ._DB_PREFIX_ . 'gomakoil_faq_lang');
    $old_categories = Db::getInstance()->executeS('SELECT * FROM ' ._DB_PREFIX_ . 'gomakoil_faq_category_lang');
    $new_faq_tables = $this->getFaqShopTablesFromLangTables($old_faqs, 'faq');
    $new_faq_category_tables = $this->getFaqShopTablesFromLangTables($old_categories, 'category');

    $create_gomakoil_faq_shop_query = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_shop(
				`id_gomakoil_faq` int(11) NOT NULL,
				`id_shop` int(11) NOT NULL,
				PRIMARY KEY (`id_gomakoil_faq`, `id_shop`)
				)';

    $create_gomakoil_faq_category_shop_query = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category_shop(
				`id_gomakoil_faq_category` int(11) NOT NULL,
				`id_shop` int(11) NOT NULL,
				PRIMARY KEY (`id_gomakoil_faq_category`, `id_shop`)
				)';

    $truncate_gomakoil_faq_lang_query = 'TRUNCATE TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_lang';
    $truncate_gomakoil_faq_category_lang_query = 'TRUNCATE TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang';
    $drop_shop_column_faq = 'ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_lang DROP COLUMN `id_shop`';
    $drop_shop_column_faq_category = 'ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang DROP COLUMN `id_shop`';

    $execute_queries = array($create_gomakoil_faq_shop_query,
      $create_gomakoil_faq_category_shop_query,
      $truncate_gomakoil_faq_lang_query,
      $truncate_gomakoil_faq_category_lang_query,
      $drop_shop_column_faq,
      $drop_shop_column_faq_category
    );

    foreach ($execute_queries as $query) {
      if (!Db::getInstance()->execute($query)) {
        return false;
      }
    }

    if (!Db::getInstance()->insert('gomakoil_faq_shop', $new_faq_tables['shop']) ||
      !Db::getInstance()->insert('gomakoil_faq_lang', $new_faq_tables['lang']) ||
      !Db::getInstance()->insert('gomakoil_faq_category_shop', $new_faq_category_tables['shop']) ||
      !Db::getInstance()->insert('gomakoil_faq_category_lang', $new_faq_category_tables['lang'])
    ) {
      return false;
    }

    return true;
  }

  public function upgradeFaqs()
  {

    $this->registerHook('ActionAdminControllerSetMedia');

    if (!$this->existsTab('AdminFaqs')) {
      if (!$this->addTab('Faqs', 'AdminFaqs', 0))
        return false;
    }
    if (!$this->existsTab('AdminFaqsCategory')) {
      if (!$this->addTab('Faqs Category', 'AdminFaqsCategory', $this->getIdTabFromClassName('AdminFaqs')))
        return false;
    }
    if (!$this->existsTab('AdminFaqsPost')) {
      if (!$this->addTab('Faqs Post', 'AdminFaqsPost', $this->getIdTabFromClassName('AdminFaqs')))
        return false;
    }

    return $this->copyBdData();
  }

  public function upgradeFaqs2_8_7()
  {
    Configuration::updateValue('FAQS_CSS_CODE', '');

    return true;
  }

  public function upgradeFaqs2_8_6()
  {
    Configuration::updateValue('PS_ALLOW_ACCENTED_CHARS_URL', 1);

    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '"._DB_PREFIX_."gomakoil_faq_lang'
       AND table_schema = '"._DB_NAME_."'
       AND column_name = 'link_rewrite'
    ";

    if(!Db::getInstance()->executeS($sql)){
      $sql = '
      ALTER TABLE '._DB_PREFIX_.'gomakoil_faq_lang
      ADD COLUMN `link_rewrite` VARCHAR(1000) AFTER `tags`;
    ';
      Db::getInstance()->execute($sql);
    }

    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '"._DB_PREFIX_."gomakoil_faq_category_lang'
       AND table_schema = '"._DB_NAME_."'
       AND column_name = 'link_rewrite'
    ";

    if(!Db::getInstance()->executeS($sql)){
      $sql = '
      ALTER TABLE '._DB_PREFIX_.'gomakoil_faq_category_lang
      ADD COLUMN `link_rewrite` VARCHAR(1000) AFTER `name`;
    ';
      Db::getInstance()->execute($sql);
    }

    $oldCategories = $this->getOldCategories();

    foreach($oldCategories as $value){
      $link_rewrite_cat = array();

      foreach(Language::getLanguages() as $language){
        $link_rewrite_cat[$language['id_lang']] = $value['link_rewrite'];
      }

      $obj_faq_cat = new faqsCategory($value['id_gomakoil_faq_category']);
      $obj_faq_cat->link_rewrite = $link_rewrite_cat;

      if (!empty($obj_faq_cat->name)) {
        $obj_faq_cat->save();
      }
    }


    $oldFaqs = $this->getOldFaqs();

    foreach($oldFaqs as $value){
      $link_rewrite = array();

      foreach(Language::getLanguages() as $language){
        $link_rewrite[$language['id_lang']] = $value['link_rewrite'];
      }

      $obj_faq = new faqsPost($value['id_gomakoil_faq']);

      $products = $obj_faq->getAssociationProducts($value['id_gomakoil_faq']);

      $product_categories_result = $obj_faq->getAssociationCategories($value['id_gomakoil_faq']);

      $obj_faq->link_rewrite = $link_rewrite;
      $obj_faq->save();

      if (!empty($products)) {
        if (is_array($products[0])) {
          $products_string = implode(',', array_map(function($product) {
            return array_pop($product);
          }, $products));
        } else {
          $products_string = implode($products);
        }

        $obj_faq->setAssociation($value['id_gomakoil_faq'], $products_string, 'faq_association_product', 'id_product');
      }

      if (!empty($product_categories_result)) {
        $product_categories = array_map(function($category) {
          return array_pop($category);
        },  $product_categories_result);

        $obj_faq->setAssociation($value['id_gomakoil_faq'], $product_categories, 'faq_association_category', 'id_category');
      }
    }


    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '"._DB_PREFIX_."gomakoil_faq'
       AND table_schema = '"._DB_NAME_."'
       AND column_name = 'link_rewrite'
    ";

    $check = Db::getInstance()->executeS($sql);
    if( $check ){
      $sql = '
      ALTER TABLE '._DB_PREFIX_.'gomakoil_faq
      DROP COLUMN `link_rewrite`;

    ';
      Db::getInstance()->execute($sql);
    }


    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '"._DB_PREFIX_."gomakoil_faq_category'
       AND table_schema = '"._DB_NAME_."'
       AND column_name = 'link_rewrite'
    ";

    $check = Db::getInstance()->executeS($sql);
    if( $check ){
      $sql = '
      ALTER TABLE '._DB_PREFIX_.'gomakoil_faq_category
      DROP COLUMN `link_rewrite`;

    ';
      Db::getInstance()->execute($sql);
    }

    return true;
  }

  public function upgradeFaqs2_8_3()
  {
    Configuration::updateValue('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE', 1);
    Configuration::updateValue('FAQS_ENABLE_CAPTCHA', 1);
    Configuration::updateValue('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ', 1);
    Configuration::updateValue('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT', 5);

    return true;
  }

  public function upgradeFaqs2_8_0()
  {
    Configuration::updateValue('FAQS_SHOW_BUTTON', 1);
    Configuration::updateValue('FAQS_SHOW_BUTTON_FAQ', 0);
    Configuration::updateValue('FAQS_EMAILS', 'demo@demo.com');

    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
       AND table_schema = '" . _DB_NAME_ . "'
       AND column_name = 'name'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
      ADD COLUMN `name` VARCHAR(500) AFTER `date_add`;

    ';
      Db::getInstance()->execute($sql);
    }

    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
       AND table_schema = '" . _DB_NAME_ . "'
       AND column_name = 'email'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
      ADD COLUMN `email` VARCHAR(500) AFTER `date_add`;

    ';
      Db::getInstance()->execute($sql);
    }

    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
       AND table_schema = '" . _DB_NAME_ . "'
       AND column_name = 'by_customer'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
      ADD COLUMN `by_customer` INT DEFAULT 0 AFTER `date_add`;

    ';
      Db::getInstance()->execute($sql);
    }

    return true;
  }

  public function upgradeFaqs2_6_0()
  {
    $this->registerHook('displayLeftColumn');
    $this->registerHook('moduleRoutes');
    Configuration::updateValue('FAQS_CATEGORIES', 1);
    Configuration::updateValue('FAQS_CATEGORIES_FAQ', 1);
    Configuration::updateValue('FAQS_FEATURED', 1);
    Configuration::updateValue('FAQS_FEATURED_FAQ', 1);

    if (!$this->existsTab('AdminFaqsSettings')) {
      if (!$this->addTab('Settings', 'AdminFaqsSettings', $this->getIdTabFromClassName('AdminFaqs')))
        return false;
    }

    $sql = "
         SELECT NULL
         FROM INFORMATION_SCHEMA.COLUMNS
         WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
         AND table_schema = '" . _DB_NAME_ . "'
         AND column_name = 'as_url'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
          ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
          ADD COLUMN `as_url` INT(1) NULL AFTER `date_add`;

    ';
      return Db::getInstance()->execute($sql);
    }
    return true;
  }

  public function upgradeFaqs2_6_2()
  {
    $sql = "
      ALTER TABLE `" . _DB_PREFIX_ . "gomakoil_faq_lang` 
      ADD FULLTEXT INDEX `search` (`question` ASC, `tags` ASC)
    ";
    Db::getInstance()->execute($sql);

    return true;
  }

  public function upgradeFaqs2_7_4()
  {
    $this->registerHook('footer');
    return true;
  }

  public function upgradeFaqs2_6_5()
  {
    $this->registerHook('productFooter');
    $sql = "
   SELECT NULL
            FROM INFORMATION_SCHEMA.COLUMNS
           WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
             AND table_schema = '" . _DB_NAME_ . "'
             AND column_name = 'association'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
      ADD COLUMN `association` INT(1) NULL AFTER `as_url`;

    ';
      Db::getInstance()->execute($sql);
    }

    $sql = "
   SELECT NULL
            FROM INFORMATION_SCHEMA.COLUMNS
           WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
             AND table_schema = '" . _DB_NAME_ . "'
             AND column_name = 'hide_faq'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
      ADD COLUMN `hide_faq` INT(1) NULL AFTER `association`;

    ';
      Db::getInstance()->execute($sql);
    }

    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'faq_association_product';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'faq_association_product(
				id_faq_association_product int(11) NOT NULL AUTO_INCREMENT,
				id_faq int(11) NOT NULL,
				id_product int(11) NOT NULL,
				PRIMARY KEY(id_faq_association_product)
				)';
    Db::getInstance()->execute($sql);

    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'faq_association_category';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'faq_association_category(
				id_faq_association_category int(11) NOT NULL AUTO_INCREMENT,
				id_faq int(11) NOT NULL,
				id_category int(11) NOT NULL,
				PRIMARY KEY(id_faq_association_category)
				)';
    Db::getInstance()->execute($sql);

    return true;
  }

  public function copyBdData()
  {

    $oldCategories = $this->getOldCategories();
    $oldFaqs = $this->getOldFaqs();
    $res = $this->uninstallOldDb();
    $res = $this->installDb();

    foreach ($oldCategories as $value) {
      $name = array();
      $meta_title = array();
      $meta_description = array();
      foreach (Language::getLanguages() as $language) {
        $name[$language['id_lang']] = $value['name'];
        $meta_title[$language['id_lang']] = $value['meta_title'];
        $meta_description[$language['id_lang']] = $value['meta_description'];

      }

      $obj_cat = new faqsCategory();
      $obj_cat->name = $name;
      $obj_cat->meta_title = $meta_title;
      $obj_cat->meta_description = $meta_description;
      $obj_cat->color = $value['color'];
      $obj_cat->position = $value['position'];
      $obj_cat->link_rewrite = $value['friendly_url'];
      $obj_cat->active = 1;
      $obj_cat->save();
    }

    foreach ($oldFaqs as $value) {
      $question = array();
      $answer = array();
      $tags = array();
      $meta_title = array();
      $meta_description = array();
      foreach (Language::getLanguages() as $language) {
        $question[$language['id_lang']] = $value['question'];
        $answer[$language['id_lang']] = $value['answer'];
        $tags[$language['id_lang']] = $value['tags_faq'];
        $meta_title[$language['id_lang']] = $value['meta_title_faq'];
        $meta_description[$language['id_lang']] = $value['meta_description_faq'];
      }

      $obj_faq = new faqsPost();
      $obj_faq->id_gomakoil_faq_category = (int)$value['id_category'];
      $obj_faq->question = $question;
      $obj_faq->answer = $answer;
      $obj_faq->meta_title = $meta_title;
      $obj_faq->meta_description = $meta_description;
      $obj_faq->color = $value['color'];
      $obj_faq->most = $value['most'];
      $obj_faq->position = $value['position_faq'];
      $obj_faq->link_rewrite = $value['friendly_url_question'];
      $obj_faq->active = 1;
      $obj_faq->tags = $tags;
      $obj_faq->save();
    }

    return $res;
  }

  public function getOldCategories()
  {
    $sql = 'SELECT *
        FROM ' . _DB_PREFIX_ . 'gomakoil_faq_category bc';
    return Db::getInstance()->ExecuteS($sql);
  }

  public function getOldFaqs()
  {
    $sql = 'SELECT *
        FROM ' . _DB_PREFIX_ . 'gomakoil_faq bc';
    return Db::getInstance()->ExecuteS($sql);
  }

  public function hookHeader()
  {

    $this->context->controller->registerStylesheet('faqs_footer', 'modules/faqs/views/css/footer.css', array('media' => 'all', 'priority' => 150));
    $this->context->controller->registerStylesheet('faqs2', 'modules/faqs/views/css/faq.css', array('media' => 'all', 'priority' => 150));
    $this->context->controller->registerStylesheet('faqs3', 'modules/faqs/views/css/codemirror_custom.css', array('media' => 'all', 'priority' => 150));
    $this->context->controller->registerJavascript('faqs2', 'modules/faqs/views/js/faq.js', array('media' => 'all', 'position' => 'bottom', 'priority' => 150));
  }

  public function hookDisplayLeftColumn()
  {
    $rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');
    $this->smarty->assign($this->getWidgetVariables('displayLeftColumn'));

    if ($rewrite_settings) {
      return $this->display(__FILE__, 'views/templates/front/left-column.tpl');
    }
    return $this->display(__FILE__, 'views/templates/front/left-column-no-rewrite.tpl');
  }

  public function hookDisplayRightColumn()
  {
    return $this->hookDisplayLeftColumn();
  }

  public function renderWidget($hookName = null, array $configuration = array())
  {
    if (Context::getContext()->controller->php_self !== 'module-faqs-display') {
      return false;
    }

    $rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');
    $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));

    if ($rewrite_settings) {
      return $this->display(__FILE__, 'views/templates/front/left-column.tpl');
    }

    return $this->display(__FILE__, 'views/templates/front/left-column-no-rewrite.tpl');
  }

  public function getWidgetVariables($hookName = null, array $configuration = array())
  {
    if ($hookName == null && isset($configuration['hook'])) {
      $hookName = $configuration['hook'];
    }

    $faqCategories = array();
    $mostFaq = array();
    $button = false;

    $post = new faqsPost();

    if (Tools::getValue('id_category') && Configuration::get('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ') == 1) {
      $product_category_id = Tools::getValue('id_category');

      $product_category_assoc_faqs_limit = Configuration::get('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT');
      $product_category_assoc_faqs_ids = $post->getIdFaqsByCategories($product_category_id);
      $product_category_assoc_faqs_ids = array_slice($product_category_assoc_faqs_ids, 0, $product_category_assoc_faqs_limit);

      $product_category_assoc_faqs = implode(',', array_map(function ($item) {
        return array_pop($item);
      }, $product_category_assoc_faqs_ids));

      if (Tools::strlen($product_category_assoc_faqs) < 1 || empty($product_category_assoc_faqs)) {
        $product_category_assoc_faqs = false;
      } else {
        $product_category_assoc_faqs = $post->getAssociationFaqs($product_category_assoc_faqs, Context::getContext()->shop->id, Context::getContext()->language->id);
      }
    } else {
      $product_category_assoc_faqs = false;
    }

    if (Configuration::get('FAQS_SHOW_BUTTON')) {
      if (!Configuration::get('FAQS_SHOW_BUTTON_FAQ') || Context::getContext()->controller->php_self == 'module-faqs-display') {
        $button = true;
        if (Context::getContext()->controller->php_self == 'product') {
          $button = false;
        }
      }
    }

    if (Configuration::get('FAQS_CATEGORIES')) {
      if (!Configuration::get('FAQS_CATEGORIES_FAQ') || Context::getContext()->controller->php_self == 'module-faqs-display') {
        $category = new faqsCategory();
        $faqCategories = $category->getCategoriesFaq(Context::getContext()->shop->id, Context::getContext()->language->id);
      }
    }

    if (Configuration::get('FAQS_FEATURED')) {
      if (!Configuration::get('FAQS_FEATURED_FAQ') || Context::getContext()->controller->php_self == 'module-faqs-display') {
        $post = new faqsPost();
        $mostFaq = $post->getMostFaqs(Context::getContext()->shop->id, Context::getContext()->language->id);
      }
    }

    $rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');

    $infos = array(
      'faqCategories' => $faqCategories,
      'mostFaq' => $mostFaq,
      'faqUrl' => $this->getBaseUrl($rewrite_settings),
      'hookName' => $hookName,
      'button' => $button,
    );

    return array(
      'infos' => $infos,
      'basePath' => _PS_BASE_URL_SSL_ . __PS_BASE_URI__,
      'id_shop' => Context::getContext()->shop->id,
      'id_lang' => Context::getContext()->language->id,
      'product_category_assoc_faqs' => $product_category_assoc_faqs,
    );
  }

  public function hookFooter($params)
  {
    $rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');
    $active = Configuration::get('FAQS_FEATURED_FOOTER');
    $count = Configuration::get('FAQS_FEATURED_FOOTER_COUNT');

    if (!$active) {
      return false;
    }

    $link = new Link();
    $baseUrl = $link->getPageLink('display-faq-home', true);
    $post = new faqsPost();
    $faqs = $post->getFeaturedFaqsFooter(Context::getContext()->shop->id, Context::getContext()->language->id, $count);

    $this->context->smarty->assign(array(
      'faqs' => $faqs,
      'blogUrl' => $baseUrl,
    ));

    if ($rewrite_settings) {
      return $this->display(__FILE__, 'views/templates/front/footer.tpl');
    }

    return $this->display(__FILE__, 'views/templates/front/footerNoRewrite.tpl');
  }

}

