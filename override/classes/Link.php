<?php
class Link extends LinkCore
{
  /*
    * module: faqs
    * date: 2017-12-04 14:06:00
    * version: 2.9.0
    */
    public function getModuleLink($module,
                                $controller = 'default',
                                array $params = array(),
                                $ssl = null,
                                $idLang = null,
                                $idShop = null,
                                $relativeProtocol = false
  ) {
    if (!$idLang) {
      $idLang = Context::getContext()->language->id;
    }
    $url = $this->getBaseLink($idShop, $ssl, $relativeProtocol).$this->getLangLink($idLang, null, $idShop);
    $params['module'] = $module;
    $params['controller'] = $controller ? $controller : 'default';
    
    if($module == 'faqs'){
      if (isset($params['question']) && isset($params['category'])) {
        $category = $params['category'];
        $question = $params['question'];
        $id = $this->getFaqName($category, $question);
        $new_cat = $this->getLinkFaq($id,$idLang);
        $params['category'] = $new_cat['link_rewrite_cat'];
        $params['question'] = $new_cat['link_rewrite'];
        return  $this->getPageLink('display-faq-question', $ssl, $idLang, 'category='.$params['category'].'&question=' . $params['question']);
      } else if (!isset($params['question']) && isset($params['category'])) {
        $category = $params['category'];
        $id = $this->getCategoryByName($category);
        $new_cat = $this->getLinkFaqCat($id,$idLang);
        $params['category'] = $new_cat;
        return  $this->getPageLink('display-faq-cat', $ssl, $idLang, 'category='.$new_cat);
      } else {
        return  $this->getPageLink('display-faq-home', $ssl, $idLang);
      }
    }
    
    if (Dispatcher::getInstance()->hasRoute('module-'.$module.'-'.$controller, $idLang, $idShop)) {
      return $this->getPageLink('module-'.$module.'-'.$controller, $ssl, $idLang, $params);
    } else {
      return $url.Dispatcher::getInstance()->createUrl('module', $idLang, $params, $this->allow, '', $idShop);
    }
  }
  /*
    * module: faqs
    * date: 2017-12-04 14:06:00
    * version: 2.9.0
    */
    public function getCategoryByName( $category = false)
  {
    $sql = "
			SELECT gfc.id_gomakoil_faq_category
      FROM " . _DB_PREFIX_ . "gomakoil_faq_category gfc
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gfc.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category
      WHERE  gfc.active = 1
      AND gfcl.link_rewrite = '".pSQL($category)."'
      ORDER BY gfc.position
			";
    $res = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    if(isset($res[0]['id_gomakoil_faq_category']) && $res[0]['id_gomakoil_faq_category']){
      return $res[0]['id_gomakoil_faq_category'];
    }
    return false;
  }
  /*
    * module: faqs
    * date: 2017-12-04 14:06:00
    * version: 2.9.0
    */
    public function getFaqName($category, $question)
  {
    $sql = "
			SELECT gf.id_gomakoil_faq
      FROM " . _DB_PREFIX_ . "gomakoil_faq gf
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gfc.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category
      WHERE  gfc.active = 1
      AND gfcl.link_rewrite = '".pSQL($category)."'
      AND gfl.link_rewrite = '".pSQL($question)."'
      ORDER BY gfc.position
			";
    $res = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    if(isset($res[0]['id_gomakoil_faq']) && $res[0]['id_gomakoil_faq']){
      return $res[0]['id_gomakoil_faq'];
    }
    return false;
  }
  /*
    * module: faqs
    * date: 2017-12-04 14:06:00
    * version: 2.9.0
    */
    public function getLinkFaqCat($id, $idLang)
  {
    $sql = "
			SELECT gfcl.link_rewrite
      FROM " . _DB_PREFIX_ . "gomakoil_faq_category gfc
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gfc.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category
      WHERE  gfc.active = 1
      AND gfc.id_gomakoil_faq_category = ".(int)$id."
      AND gfcl.id_lang = ".(int)$idLang."
      ORDER BY gfc.position
			";
    $res = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    if(isset($res[0]['link_rewrite']) && $res[0]['link_rewrite']){
      return $res[0]['link_rewrite'];
    }
    return false;
  }
  /*
    * module: faqs
    * date: 2017-12-04 14:06:00
    * version: 2.9.0
    */
    public function getLinkFaq($id, $idLang)
  {
    $sql = "
			SELECT gfl.link_rewrite, gfcl.link_rewrite as link_rewrite_cat
      FROM " . _DB_PREFIX_ . "gomakoil_faq gf
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gfc.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category
      WHERE  gfc.active = 1
      AND gf.id_gomakoil_faq = ".(int)$id."
      AND gfl.id_lang = ".(int)$idLang."
      AND gfcl.id_lang = ".(int)$idLang."
      ORDER BY gfc.position
			";
    $res = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    if(isset($res[0]['link_rewrite']) && $res[0]['link_rewrite']){
      return array('link_rewrite' => $res[0]['link_rewrite'], 'link_rewrite_cat' => $res[0]['link_rewrite_cat'] );
    }
    return false;
  }
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
    protected function getLangLink($id_lang = null, Context $context = null, $id_shop = null)
    {
        if (Configuration::get('FSAU_REMOVE_DEFAULT_LANG', null, null, $id_shop) &&
            Language::isMultiLanguageActivated()) {
            if (!$id_lang) {
                if (is_null($context)) {
                    $context = Context::getContext();
                }
                $id_lang = $context->language->id;
            }
            if ($id_lang == Configuration::get('PS_LANG_DEFAULT', null, null, $id_shop)) {
                return '';
            }
        }
        return parent::getLangLink($id_lang, $context, $id_shop);
    }
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
    public function getCategoryLink(
        $category,
        $alias = null,
        $id_lang = null,
        $selected_filters = null,
        $id_shop = null,
        $relative_protocol = false
    ) {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        $url = $this->getBaseLink($id_shop, null, $relative_protocol).$this->getLangLink($id_lang, null, $id_shop);
        if (!is_object($category)) {
            if (is_array($category) && isset($category['id_category'])) {
                $category = new Category($category['id_category'], $id_lang);
            } elseif ((int)$category) {
                $category = new Category((int)$category, $id_lang);
            } else {
                return '';
            }
        }
        $params = array();
        $params['id'] = $category->id;
        $params['rewrite'] = (!$alias) ? $category->getFieldByLang('link_rewrite') : $alias;
        $params['meta_keywords'] = Tools::str2url($category->getFieldByLang('meta_keywords'));
        $params['meta_title'] = Tools::str2url($category->getFieldByLang('meta_title'));
        $dispatcher = Dispatcher::getInstance();
        if ($dispatcher->hasKeyword('category_rule', $id_lang, 'categories', $id_shop)) {
            $cats = array();
            foreach ($category->getParentsCategories($id_lang) as $cat) {
                if (!in_array($cat['id_category'], Link::$category_disable_rewrite)) {
                    $cats[] = $cat['link_rewrite'];
                }
            }
            $cats = array_reverse($cats);
            array_pop($cats);
            $params['categories'] = implode('/', $cats);
        }
        $selected_filters = is_null($selected_filters) ? '' : $selected_filters;
        if (empty($selected_filters)) {
            $rule = 'category_rule';
        } else {
            $rule = 'layered_rule';
            $params['selected_filters'] = $selected_filters;
        }
        return $url.Dispatcher::getInstance()->createUrl($rule, $id_lang, $params, $this->allow, '', $id_shop);
    }
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
    public function getProductLink(
        $product,
        $alias = null,
        $category = null,
        $ean13 = null,
        $idLang = null,
        $idShop = null,
        $ipa = 0,
        $force_routes = false,
        $relativeProtocol = false,
        $addAnchor = false,
        $extraParams = array()
    ) {
        $remove_anchor = false;
        if (Module::isEnabled('fsadvancedurl')) {
            $fsau = Module::getInstanceByName('fsadvancedurl');
            $remove_anchor = $fsau->isRemoveAnchor($product, $ipa);
        }
        if ($remove_anchor) {
            $ipa = 0;
        }
        return parent::getProductLink(
            $product,
            $alias,
            $category,
            $ean13,
            $idLang,
            $idShop,
            $ipa,
            $force_routes,
            $relativeProtocol,
            $addAnchor,
            $extraParams
        );
    }
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
    public function getCMSCategoryLink(
        $cms_category,
        $alias = null,
        $id_lang = null,
        $id_shop = null,
        $relative_protocol = false
    ) {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        $url = $this->getBaseLink($id_shop, null, $relative_protocol).$this->getLangLink($id_lang, null, $id_shop);
        $dispatcher = Dispatcher::getInstance();
        if (!is_object($cms_category)) {
            $cms_category = new CMSCategory((int)$cms_category, $id_lang);
        }
        $params = array();
        $params['id'] = $cms_category->id;
        $params['rewrite'] = $cms_category->link_rewrite;
        if (is_array($params['rewrite']) && isset($params['rewrite'][(int)$id_lang])) {
            $params['rewrite'] = $params['rewrite'][(int)$id_lang];
        }
        if ($alias) {
            $params['rewrite'] = $alias;
        }
        $params['meta_keywords'] = $cms_category->meta_keywords;
        if (is_array($params['meta_keywords']) && isset($params['meta_keywords'][(int)$id_lang])) {
            $params['meta_keywords'] = Tools::str2url($params['meta_keywords'][(int)$id_lang]);
        }
        $params['meta_title'] = $cms_category->meta_title;
        if (is_array($params['meta_title']) && isset($params['meta_title'][(int)$id_lang])) {
            $params['meta_title'] = Tools::str2url($params['meta_title'][(int)$id_lang]);
        }
        if ($dispatcher->hasKeyword('cms_category_rule', $id_lang, 'categories', $id_shop)) {
            $cats = array();
            if (Module::isEnabled('fsadvancedurl')) {
                $fsau = Module::getInstanceByName('fsadvancedurl');
                $categories = $fsau->getCMSCategoryParentCategories($cms_category->id, $id_lang);
                if ($categories) {
                    foreach ($categories as $cat) {
                        $cats[] = $cat['link_rewrite'];
                    }
                    $cats = array_reverse($cats);
                    array_pop($cats);
                }
            }
            $params['categories'] = implode('/', $cats);
        }
        return $url.$dispatcher->createUrl('cms_category_rule', $id_lang, $params, $this->allow, '', $id_shop);
    }
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
    public function getCMSLink(
        $cms,
        $alias = null,
        $ssl = null,
        $id_lang = null,
        $id_shop = null,
        $relative_protocol = false
    ) {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        $url = $this->getBaseLink($id_shop, $ssl, $relative_protocol).$this->getLangLink($id_lang, null, $id_shop);
        $dispatcher = Dispatcher::getInstance();
        if (!is_object($cms)) {
            $cms = new CMS((int)$cms, $id_lang);
        }
        $params = array();
        $params['id'] = $cms->id;
        $params['rewrite'] = $cms->link_rewrite;
        if (is_array($params['rewrite']) && isset($params['rewrite'][(int)$id_lang])) {
            $params['rewrite'] = $params['rewrite'][(int)$id_lang];
        }
        if ($alias) {
            $params['rewrite'] = $alias;
        }
        $params['meta_keywords'] = $cms->meta_keywords;
        if (is_array($params['meta_keywords']) && isset($params['meta_keywords'][(int)$id_lang])) {
            $params['meta_keywords'] = Tools::str2url($params['meta_keywords'][(int)$id_lang]);
        }
        $params['meta_title'] = $cms->meta_title;
        if (is_array($params['meta_title']) && isset($params['meta_title'][(int)$id_lang])) {
            $params['meta_title'] = Tools::str2url($params['meta_title'][(int)$id_lang]);
        }
        if ($dispatcher->hasKeyword('cms_rule', $id_lang, 'categories', $id_shop)) {
            $cats = array();
            $cms_category = new CMSCategory($cms->id_cms_category, $id_lang);
            if (Validate::isLoadedObject($cms_category)) {
                if (Module::isEnabled('fsadvancedurl')) {
                    $fsau = Module::getInstanceByName('fsadvancedurl');
                    $categories = $fsau->getCMSCategoryParentCategories($cms_category->id, $id_lang);
                    if ($categories) {
                        foreach ($categories as $cat) {
                            $cats[] = $cat['link_rewrite'];
                        }
                        $cats = array_reverse($cats);
                    }
                }
            }
            $params['categories'] = implode('/', $cats);
        }
        return $url.$dispatcher->createUrl('cms_rule', $id_lang, $params, $this->allow, '', $id_shop);
    }
}
