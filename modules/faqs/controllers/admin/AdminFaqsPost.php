<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.08.15
 * Time: 17:40
 */
require_once(dirname(__FILE__) . '/../../classes/faqsPost.php');
require_once(dirname(__FILE__) . '/../../classes/faqsCategory.php');

class AdminFaqsPostController extends ModuleAdminController
{
  protected $available_tabs_lang = array();

  protected $position_identifier = 'id_gomakoil_faq';

  protected $tab_display;

  protected $available_tabs = array();

  protected $submitted_tabs;

  protected $id_current_category;

  public function __construct()
  {
    $this->className = 'faqsPost';
    $this->table = 'gomakoil_faq';
    $this->bootstrap = true;
    $this->lang = true;
    $this->edit = true;
    $this->delete = true;

    Shop::addTableAssociation('gomakoil_faq', array('type' => 'shop'));

    parent::__construct();

    $this->position_identifier = 'id_gomakoil_faq';
    if (Tools::getValue('id_category')){
      $this->_defaultOrderBy = 'a!position';
    }
    else{
      $this->_defaultOrderBy = 'a!date_add';
    }

    $this->orderBy = 'position';
    $this->id_current_category = 1;

    $this->bulk_actions = array(
      'delete' => array(
        'text' => $this->l('Delete selected'),
        'icon' => 'icon-trash',
        'confirm' => $this->l('Delete selected items?')
      )
    );

    $this->fields_list = array();

    $this->fields_list['id_gomakoil_faq'] = array(
      'title' => $this->l('ID'),
      'align' => 'right',
      'width' => 50,
      'search' => true,
      'filter_key' => 'a!id_gomakoil_faq',
    );

    $this->fields_list['question'] = array(
      'title' => $this->l('Question'),
      'align' => 'right',
      'filter_key' => 'b!question',
      'search' => true,
      'callback' => 'getQuestionStrip',
    );

    $this->fields_list['id_gomakoil_faq_category'] = array(
      'title' => $this->l('Category'),
      'align' => 'center',
      'width' => 100,
      'search' => false,
      'callback' => 'getNameCategory',
    );



    $this->fields_list['by_customer'] = array(
      'title' => $this->l('By Customer'),
      'active' => 'by_customer',
      'align' => 'center',
      'type' => 'bool',
      'width' => 70,
    );

    $this->fields_list['name'] = array(
      'title' => $this->l('Customer name'),
      'align' => 'right',
      'filter_key' => 'a!name',
      'search' => true,
      'width' => 70,
    );

    $this->fields_list['email'] = array(
      'title' => $this->l('Customer email'),
      'align' => 'right',
      'filter_key' => 'a!email',
      'search' => true,
      'width' => 70,
    );


    $this->fields_list['date_add'] = array(
      'title' => $this->l('Creation date'),
      'maxlength' => 190,
      'width' =>100
    );

    $this->fields_list['active'] = array(
      'title' => $this->l('Displayed'),
      'active' => 'status',
      'align' => 'center',
      'type' => 'bool',
      'width' => 70,
      'orderby' => false
    );

    if (Tools::getValue('id_category'))
      $this->fields_list['position'] = array(
        'title' => $this->l('Position'),
        'width' => 40,
        'filter_key' => 'a!position',
        'align' => 'center',
        'position' => 'position'
      );
  }

  public function init()
  {
    parent::init();

    $id_category = Tools::getValue('id_category');
    if(isset($id_category) && $id_category){
      $this->_where = ' AND a.`id_gomakoil_faq_category` = '.(int)$id_category;
    }
  }

  public function initPageHeaderToolbar(){
    if ($this->display == 'view' || $this->display == 'edit')
    {
      $rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');
      $baseUrl = _PS_BASE_URL_SSL_.__PS_BASE_URI__;

      $pageQuestion = new faqsPost( Tools::getValue('id_gomakoil_faq'), Context::getContext()->language->id );
      $pageCategory = new faqsCategory( $pageQuestion->id_gomakoil_faq_category, Context::getContext()->language->id );

      if(!$rewrite_settings){
        $faqUrl = $baseUrl.'index.php?fc=module&module=faqs&controller=display&category='.$pageCategory->link_rewrite . '&question=' . $pageQuestion->link_rewrite;
      }
      else{
        $home_page_id = Configuration::get('FAQS_SEO_HOME_PAGE') ? Configuration::get('FAQS_SEO_HOME_PAGE') : 'faqs';
        $faqUrl = $baseUrl.$home_page_id.'/' . $pageCategory->link_rewrite . '/' . $pageQuestion->link_rewrite . '.html';
      }


      $this->page_header_toolbar_btn['preview'] = array(
        'href' => $faqUrl,
        'desc' => $this->l('Preview', null, null, false),
        'short' => $this->l('Preview', null, null, false),
        'target' => true,
      );
    }

    parent::initPageHeaderToolbar();
  }

  public function initContent()
  {
    $id_lang = $this->context->language->id;
    $id_shop = $this->context->shop->id;
    $objCategory = new faqsCategory();
    $post = $objCategory->getCategories($id_lang,$id_shop);

    $rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');
    if(!$rewrite_settings){
      $urlFaqs = _PS_BASE_URL_SSL_.__PS_BASE_URI__.'index.php?fc=module&module=faqs&controller=display';
    }
    else{
      $home_page_id = Configuration::get('FAQS_SEO_HOME_PAGE') ? Configuration::get('FAQS_SEO_HOME_PAGE') : 'faqs';
      $urlFaqs = _PS_BASE_URL_SSL_.__PS_BASE_URI__.$home_page_id;
    }



    if(Tools::getValue('by_customergomakoil_faq') !== false && Tools::getValue('id_gomakoil_faq')){

      $obj = new faqsPost(Tools::getValue('id_gomakoil_faq'));
      $by_customer = $obj->by_customer;

      if($by_customer){
        $obj->by_customer = 0;
      }
      else{
        $obj->by_customer = 1;
      }

   
      $obj->update();

    }


    $this->tpl_list_vars['urlFaqs'] = $urlFaqs;
    $this->tpl_list_vars['category_tree'] = $post;
    $this->tpl_list_vars['id_category'] = Tools::getValue('id_category');
    $this->tpl_list_vars['base_url'] = preg_replace('#&id_category=[0-9]*#', '', self::$currentIndex).'&token='.$this->token;

    parent::initContent();
  }

  public function initProcess(){
    parent::initProcess();
  }

  protected function updateAssoShop($id_object)
  {
    return true;
  }

  public function setMedia()
  {
    parent::setMedia();

    $this->context->controller->addCss(__PS_BASE_URI__.'modules/faqs/views/css/faq_back.css', 'all');
    $this->context->controller->addJs(__PS_BASE_URI__.'modules/faqs/views/js/faq.js', 'all');

    $this->addJqueryUi('ui.widget');
    $this->addjQueryPlugin(array(
      'select2',
    ));
    $this->addJqueryPlugin('tagify');
    $this->addJS(array(
      _PS_JS_DIR_.'tiny_mce/tiny_mce.js',
      _PS_JS_DIR_.'admin/tinymce.inc.js',
    ));
  }

  public function renderForm()
  {
    $class = '';
    $id_lang = $this->context->language->id;
    $id_shop = Shop::getContext() !== 4 ? $this->context->shop->id : null;
    $objCate = new faqsCategory();
    $categories = $objCate->getCategories($id_lang,$id_shop);
    $obj = new faqsPost(Tools::getValue('id_gomakoil_faq'));

    if(!$obj->association){
      $class = ' hide_form_settings';
    }

    $selected_categories = $obj->getAssociationCategories( Tools::getValue('id_gomakoil_faq') );
    $selected = array();

    $selected_products = $obj->getAssociationProducts( Tools::getValue('id_gomakoil_faq') );
    $selected_prod = array();


    if(isset($selected_products[0]['id_product']) && $selected_products[0]['id_product']){
      foreach($selected_products as $val){
        $selected_prod[] = $val['id_product'];
      }
    }
    else{
      $selected_prod = array();
    }


    if(isset($selected_categories[0]['id_category']) && $selected_categories[0]['id_category']){
      foreach($selected_categories as $val){
        $selected[] = $val['id_category'];
      }
    }
    else{
      $selected = array();
    }

    $this->fields_form = array(
      'tinymce' => true,
      'legend' => array(
        'title' => $this->l('Faqs'),
        'icon' => 'icon-plus-sign-alt'
      ),
      'input' => array(
        array(
          'type' => 'switch',
          'label' => $this->l('Active'),
          'name' => 'active',
          'is_bool' => true,
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Featured:'),
          'name' => 'most',
          'required' => false,
          'values' => array(
            array(
              'id' => 'most_on',
              'value' => 1,
              'label' => $this->l('Enabled')
            ),
            array(
              'id' => 'most_off',
              'value' => 0,
              'label' => $this->l('Disabled')
            )
          )
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Open as a url:'),
          'name' => 'as_url',
          'required' => false,
          'values' => array(
            array(
              'id' => 'as_url_on',
              'value' => 1,
              'label' => $this->l('Enabled')
            ),
            array(
              'id' => 'as_url_off',
              'value' => 0,
              'label' => $this->l('Disabled')
            )
          )
        ),


        array(
          'type' => 'switch',
          'label' => $this->l('Category/Product association'),
          'name' => 'association',
          'required' => false,
          'values' => array(
            array(
              'id' => 'association_on',
              'value' => 1,
              'label' => $this->l('Enabled')
            ),
            array(
              'id' => 'association_off',
              'value' => 0,
              'label' => $this->l('Disabled')
            )
          )
        ),

        array(
          'type' => 'html',
          'name' => 'html_data',
          'form_group_class'=> 'block_line_after_form block_more_settings'.$class,
          'html_content' => '<div class="line_after_form"></div>',
        ),

        array(
          'type' => 'switch',
          'label' => $this->l('Hide question in faq page'),
          'name' => 'hide_faq',
          'form_group_class'=> 'block_more_settings'.$class,
          'required' => false,
          'values' => array(
            array(
              'id' => 'hide_faq_on',
              'value' => 1,
              'label' => $this->l('Enabled')
            ),
            array(
              'id' => 'hide_faq_off',
              'value' => 0,
              'label' => $this->l('Disabled')
            )
          )
        ),



        array(
          'type' => 'categories',
          'label' => $this->l('Category association'),
          'name' => 'categoriesBox',
          'form_group_class'=> 'block_more_settings'.$class,
          'tree' => array(
            'use_search' => false,
            'id' => 'categoriesBox',
            'use_checkbox' => true,
            'selected_categories' => $selected,
          ),
          'values' => array(
            'trads' => array(
              'Root' => Category::getTopCategory(),
              'selected' => $this->l('Selected'),
              'Collapse All' => $this->l('Collapse All'),
              'Expand All' => $this->l('Expand All'),
              'Check All' => $this->l('Check All'),
              'Uncheck All' => $this->l('Uncheck All')
            ),
            'selected_cat' => $selected,
            'input_name' => 'categoryBox[]',
            'use_radio' => false,
            'use_search' => false,
            'disabled_categories' => array(),
            'top_category' => Category::getTopCategory(),
            'use_context' => true,
          )
        ),

        array(
          'type' => 'html',
          'label' => $this->l('Product association'),
          'name' => 'html_data',
          'form_group_class'=> 'block_select_products block_more_settings'.$class,
          'html_content' => $this->getBlockSearchProduct($selected_prod),
        ),


        array(
          'type' => 'html',
          'name' => 'html_data',
          'form_group_class'=> 'block_line_after_form block_more_settings'.$class,
          'html_content' => '<div class="line_after_form"></div>',
        ),
        array(
          'type' => 'select',
          'label' => $this->l('Category:'),
          'name' => 'categoryBox',
          'class' => 'chosen',
          'default_value' => (int)$obj->id_gomakoil_faq_category,
          'options' => array(
            'query' =>$categories,
            'id' => 'id_gomakoil_faq_category',
            'name' => 'name',
            'class' => 'name',
            'value' => 'id_gomakoil_faq_category'
          )
        ),
        array(
          'type' => 'textarea',
          'label' => $this->l('Question:'),
          'name' => 'question',
          'form_group_class'=> 'textarea_block',
          'lang' => true,
          'required' => true,
          'autoload_rte' => true,
          'rows' => 10,
          'cols' => 100,
          'hint' => $this->l('Invalid characters:').' <>;=#{}'
        ),
        array(
          'type' => 'textarea',
          'label' => $this->l('Answer:'),
          'name' => 'answer',
          'form_group_class'=> 'textarea_block',
          'autoload_rte' => true,
          'required' => true,
          'lang' => true,
          'rows' => 10,
          'cols' => 100,
          'hint' => $this->l('Invalid characters:').' <>;=#{}'
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Meta title'),
          'name' => 'meta_title',
          'lang' => true,
          'class' => 'meta_title',
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Meta description'),
          'name' => 'meta_description',
          'lang' => true,
          'class' => 'meta_description',
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Meta keywords'),
          'name' => 'meta_keywords',
          'lang' => true,
          'class' => 'meta_keywords',
        ),
        array(
          'type' => 'tags',
          'label' => $this->l('Tags:'),
          'name' => 'tags',
          'lang' => true,
          'size' => 48
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Friendly URL:'),
          'name' => 'link_rewrite',
          'lang' => true,
          'required' => true,
          'hint' => $this->l('Only letters and the minus (-) character are allowed.')
        ),
        array(
          'type' => 'hidden',
          'name' => 'token_faq',
        ),
        array(
          'type' => 'hidden',
          'name' => 'idLang',
        ),
        array(
          'type' => 'hidden',
          'name' => 'idShop',
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('By customer'),
          'name' => 'by_customer',
          'is_bool' => true,
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Customer name'),
          'name' => 'name',
          'form_group_class'=> 'input_disabled_faqs',
          'class' => 'name',

        ),
        array(
          'type' => 'text',
          'label' => $this->l('Customer email'),
          'name' => 'email',
          'class' => 'email',
          'form_group_class'=> 'input_disabled_faqs',
        ),

      ),
      'buttons' => array(
        'save-and-stay' => array(
          'title' => $this->l('Save and stay'),
          'name' => 'submitAdd'.$this->table.'AndStay',
          'type' => 'submit',
          'class' => 'btn btn-default pull-right',
          'icon' => 'process-icon-save'
        )
      ),
      'submit' => array(
        'title' => $this->l('Save'),
      )
    );

    $this->tpl_form_vars['PS_ALLOW_ACCENTED_CHARS_URL'] = (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL');
    $this->fields_value['token_faq'] = Tools::getAdminTokenLite('AdminFaqsPost');
    $this->fields_value['idLang'] =  Context::getContext()->language->id;
    $this->fields_value['idShop'] = Context::getContext()->shop->id;

    return parent::renderForm();
  }


  public function getBlockSearchProduct($selected_prod){
    $data = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/admin/block-search.tpl');

    $ids = implode(",", $selected_prod);


    $list = $this->getProductList($ids, Context::getContext()->language->id, Context::getContext()->shop->id);

    $data->assign(
      array(
        'ids' => $ids,
        'list' => $list,
      )
    );

    return $data->fetch();
  }


  public function renderList()
  {
    $this->addRowAction('edit');
    $this->addRowAction('delete');
    return parent::renderList();
  }


  public function displayAjax()
  {
    $json = array();
    try{


      if (Tools::getValue('action') == 'addProduct') {
        $products = Tools::getValue('products');

        if($products){
          $products = implode(",", $products);
        }

        $list = $this->getProductList($products, Tools::getValue('idLang'), Tools::getValue('idShop'));

        if(!$list){
          $json['list'] = ' ';
          $json['products'] = ' ';
        }
        else{
          $json['list'] = $list;
          $json['products'] = $products;
        }

      }

      die( Tools::jsonEncode($json) );
    }
    catch(Exception $e){
      $json['error'] = $e->getMessage();
      if( $e->getCode() == 10 ){
        $json['error_message'] = $e->getMessage();
      }
    }
    die( Tools::jsonEncode($json) );
  }


  public function getProductList($ids, $idLang, $idShop){

    $data = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/admin/productList.tpl');


    if($ids){
      $items = $this->getProductsByIds($idLang, $idShop, $ids);
      $type_img = ImageType::getImagesTypes('products');
      foreach( $type_img as $key => $val){
        $pos = strpos($val['name'], 'cart_def');
        if($pos !== false){
          $type_i = $val['name'];
        }
      }
      foreach($items as $key => $item){
        $items[$key]['image'] = str_replace('http://', Tools::getShopProtocol(), Context::getContext()->link->getImageLink($item['link_rewrite'], $item['id_image'], $type_i));
      }
    }
    else{
      $items = false;
    }



    $data->assign(
      array(
        'id_shop' => $idShop,
        'id_lang' => $idLang,
        'items'   => $items,
      )
    );

    return $data->fetch();
  }


  public function ajaxProcessUpdatePositions()
  {
    $gomakoil_faq_post = Tools::getValue('gomakoil_faq');
    foreach($gomakoil_faq_post as $key => $value){
      $value = explode('_', $value);
      Db::getInstance()->update('gomakoil_faq', array('position' => (int)$key), 'id_gomakoil_faq='.(int)$value[2]);
    }
  }

  public static function getNameCategory($id_category)
  {
    $cat = new faqsCategory($id_category, Context::getContext()->language->id, Context::getContext()->shop->id);
    return $cat->name;
  }

  public function getQuestionStrip($question)
  {
    return $this->truncate($question, 30);
  }

  public function truncate($string, $limit, $pad="...")
  {
    $string = strip_tags($string);
    if(mb_strlen($string) <= $limit){
      return $string;
    }
    mb_internal_encoding("UTF-8");
    $string = mb_substr($string, 0, $limit) . $pad;
    return $string;
  }


  public function ajaxProcessSearchProduct(){
    $search = Tools::getValue('q');
    $limit = 50;
    $idLang = $this->context->language->id;
    $idShop = $this->context->shop->id;
    $where = "";
    $limit_p = '';
    if( $search ){
      $where = " AND (pl.name LIKE '%$search%' OR pl.id_product LIKE '%$search%')";
    }
    if($limit){
      $limit_p = ' LIMIT '.(int)$limit;
    }
    $sql = '
			SELECT pl.name, pl.id_product as id, i.id_image, pl.link_rewrite, p.reference as ref
      FROM ' . _DB_PREFIX_ . 'product_lang as pl
      LEFT JOIN ' . _DB_PREFIX_ . 'image as i
      ON i.id_product = pl.id_product AND i.cover=1
      INNER JOIN ' . _DB_PREFIX_ . 'product as p
      ON p.id_product = pl.id_product
      WHERE pl.id_lang = ' . (int)$idLang . '
      AND pl.id_shop = ' . (int)$idShop . '
      ' . $where . $limit_p. '
			';

    $items = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    foreach($items as $key => $item){
      $items[$key]['image'] = str_replace('http://', Tools::getShopProtocol(), $this->context->link->getImageLink($item['link_rewrite'], $item['id_image'], ''));
    }

    die(Tools::jsonEncode($items));
  }


  public function getProductsByIds($id_lang, $id_shop, $productsIds){
    $sql = '
			SELECT pl.name, p.*, i.id_image, pl.link_rewrite, p.reference
      FROM ' . _DB_PREFIX_ . 'product_lang as pl
      LEFT JOIN ' . _DB_PREFIX_ . 'image as i
      ON i.id_product = pl.id_product AND i.cover=1
      INNER JOIN ' . _DB_PREFIX_ . 'product as p
      ON p.id_product = pl.id_product
      WHERE pl.id_lang = ' . (int)$id_lang . '
      AND pl.id_shop = ' . (int)$id_shop . '
      AND p.id_product IN ('.pSQL($productsIds).')
			';

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

}