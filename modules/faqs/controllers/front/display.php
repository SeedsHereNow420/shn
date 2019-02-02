<?php

class FaqsDisplayModuleFrontController extends ModuleFrontControllerCore
{
  private $_objCategory;
  private $_objPost;
  private $_objFaqs;
  private $_shopId;
  private $_langId;

  public function __construct()
  {
    require_once(_PS_MODULE_DIR_.'faqs/classes/faqsCategory.php');
    require_once(_PS_MODULE_DIR_.'faqs/classes/faqsPost.php');
    require_once(_PS_MODULE_DIR_.'faqs/faqs.php');

    $this->_objFaqs = new Faqs();
    $this->_objCategory = new faqsCategory();
    $this->_objPost = new faqsPost();
    $this->_shopId = Context::getContext()->shop->id;
    $this->_langId = Context::getContext()->language->id;

    $this->php_self = 'module-faqs-display';

    $this->display_column_right = false;
    $this->display_column_left = false;
    if( Tools::getValue('content_only')){
      $this->display_header = false;
      $this->display_footer = false;
    }

    parent::__construct();
  }

  public function init()
  {
    parent::init();

    if (Tools::getValue('category')) {
      $faqCategoryId = Tools::getValue("category");
      $faqId = Tools::getValue("question");
      $cat = $this->_objCategory->getCategoryByName($this->_shopId, $this->_langId, $faqCategoryId);
      $faq = $this->_objPost->getFaqsByUrl($this->_shopId, $this->_langId, $faqCategoryId, $faqId);
      if (empty($cat) || empty($faq)) {
        Controller::getController('PageNotFoundController')->run();
        return false;
      }
    }
  }

  public function canonicalRedirection($canonical_url = '')
  {
      return false;
  }

  public function getTemplateVarPage()
  {
      $page = parent::getTemplateVarPage();
      $meta_title = $this->_objFaqs->l('FAQs', 'display');
      $meta_description = $this->_objFaqs->l('FAQs', 'display');
      $meta_keywords = $this->_objFaqs->l('FAQs', 'display');
      $faqCategoryId = Tools::getValue("category");
      $faqId = Tools::getValue("question");
      $search = trim(Tools::getValue("search"));

      if( !$faqCategoryId ){
          $faqCategoryId = false;
      }

      if( $faqCategoryId !== false ){

          $cat =  $this->_objCategory->getCategoryByName($this->_shopId, $this->_langId, $faqCategoryId);
          if($cat){
              if($cat[0]['meta_title']){
                  $meta_title = $cat[0]['meta_title'];
              }
              else{
                  $meta_title = $cat[0]['name'];
              }
              if($cat[0]['meta_description']){
                  $meta_description = $cat[0]['meta_description'];
              }
              if($cat[0]['meta_keywords']){
                  $meta_keywords = $cat[0]['meta_keywords'];
              }
          }

          if( $faqId !== false ){
              $faq = $this->_objPost->getFaqsByUrl($this->_shopId, $this->_langId, $faqCategoryId, $faqId);
              if(isset($faq[0]['meta_title']) && $faq[0]['meta_title']){
                  $meta_title = $faq[0]['meta_title'];
              }
              else{
                  $meta_title = strip_tags($faq[0]['question']);
              }
              if($faq[0]['meta_description']){
                  $meta_description = $faq[0]['meta_description'];
              }
              if($faq[0]['meta_keywords']){
                  $meta_keywords = $faq[0]['meta_keywords'];
              }
          }
      }

      if($search){
          $meta_title = $this->_objFaqs->l('Search:', 'display').' '.$search;
          $meta_description = $this->_objFaqs->l('Search:', 'display').' '.$search;
          $meta_keywords = $this->_objFaqs->l('Search:', 'display').' '.$search;
      }

      $page['meta'] = array(
          'title' => $meta_title,
          'description' => $meta_description,
          'keywords' => $meta_keywords,
          'robots' => 'index',
      );

    return $page;
  }

  public function getBreadcrumbLinks()
  {
      $question = false;
      $category = false;
      $search_br = false;
      $breadcrumb = parent::getBreadcrumbLinks();
      $rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');
      $baseUrl = $this->_objFaqs->getBaseUrl($rewrite_settings);

      $home =  array(
          'title' => $this->_objFaqs->l('FAQs', 'display'),
          'url' => $baseUrl,
      );

      $faqCategoryId = Tools::getValue("category");
      $faqId = Tools::getValue("question");
      $search = trim(Tools::getValue("search"));

      if( !$faqCategoryId ){
          $faqCategoryId = false;
      }

      if( $faqCategoryId !== false ){
          $cat =  $this->_objCategory->getCategoryByName($this->_shopId, $this->_langId, $faqCategoryId);

          if(!empty($cat) && isset($cat[0]['name'])){
              if(!$rewrite_settings){
                  $url = $baseUrl.'&category='.$cat[0]['link_rewrite'];
              }
              else{
                 $url = $baseUrl.$cat[0]['link_rewrite'].'.html';
              }
              $category =  array(
                  'title' => $cat[0]['name'],
                  'url' => $url,
              );
          }

          if( $faqId !== false ){
              $faq = $this->_objPost->getFaqsByUrl($this->_shopId, $this->_langId, $faqCategoryId, $faqId);
              if($faq[0]['question']){
                  $question =  array(
                      'title' => strip_tags($faq[0]['question']),
                      'url' => '',
                  );
              }
          }
      }

      if($search){
          $search_br =  array(
              'title' => $this->_objFaqs->l('Search', 'display').' "'.$search.'"',
              'url' => '',
          );
      }

      $breadcrumb['links'][] = $home;

      if($category){
          $breadcrumb['links'][] = $category;
      }

      if($question){
          $breadcrumb['links'][] = $question;
      }

      if($search_br){
          $breadcrumb['links'][] = $search_br;
      }

    return $breadcrumb;
  }

  public function initContent()
  {

    parent::initContent();

    $mostFaq = $this->_objPost->getMostFaqs($this->_shopId, $this->_langId);
    $faqCategories = $this->_objCategory->getCategoriesFaq($this->_shopId, $this->_langId);

    if(!$faqCategories){
      $faqCategories = array();
    }

    foreach($faqCategories as $key=>$category){
      $categories = $this->_objPost->getFaqs($this->_shopId, $this->_langId, $category['id_gomakoil_faq_category']);
      $faqCategories[$key]['count'] = count($categories);
      $faqCategories[$key]['faqs'] = ($categories);
    }

    $faqCategoryId = Tools::getValue("category");
    if( !$faqCategoryId ){
      $faqCategoryId = false;
    }
    $faqId = Tools::getValue("question");
    $search = trim(Tools::getValue("search"));
    $search_val = '';

    $rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');
    $baseUrl = $this->_objFaqs->getBaseUrl($rewrite_settings);

    $faq = false;
    $questions = false;

    if( $faqCategoryId !== false ){

      Context::getContext()->shop->theme->setPageLayouts(array("module-faqs-display" => "layout-left-column"));

      $questions['content'] =  $this->_objPost->getFaqsByUrl($this->_shopId, $this->_langId, $faqCategoryId);
      $cat =  $this->_objCategory->getCategoryByName($this->_shopId, $this->_langId, $faqCategoryId);

      if (!empty($questions) && !empty($cat)) {
        $questions['name'] = $cat[0]['name'];
        $questions['color'] = $cat[0]['color'];

        if( $faqId !== false ){
          $faq = $this->_objPost->getFaqsByUrl($this->_shopId, $this->_langId, $faqCategoryId, $faqId);
          $faq = $faq[0];
          $questions = false;
        }
      }
    }

    if($search){
      Context::getContext()->shop->theme->setPageLayouts(array("module-faqs-display" => "layout-left-column"));
       $search_val = $search;
       $search =  $this->_objPost->searchFaqs($this->_shopId, $this->_langId, $search);
    }


    $this->context->smarty->assign(array(
      'faqCategories'     => $faqCategories,
      'faq'               => $faq,
      'mostFaq'           => $mostFaq,
      'questions'         => $questions,
      'faqUrl'            => $baseUrl,
      'search'            => $search,
      'search_val'        => $search_val,
    ));

    if(!$rewrite_settings){
      $this->setTemplate('module:faqs/views/templates/front/displayNoRewrite.tpl');
    }
    else{
      $this->setTemplate('module:faqs/views/templates/front/display.tpl');
    }
  }

}
