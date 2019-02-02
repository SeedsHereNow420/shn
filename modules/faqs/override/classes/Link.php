<?php
class Link extends LinkCore
{


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
}