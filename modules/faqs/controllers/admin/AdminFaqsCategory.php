<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.08.15
 * Time: 17:40
 */
require_once(dirname(__FILE__) . '/../../classes/faqsCategory.php');

class AdminFaqsCategoryController extends ModuleAdminControllerCore
{

  public function __construct()
  {
    $this->className = 'faqsCategory';
    $this->table = 'gomakoil_faq_category';
    $this->bootstrap = true;
    $this->lang = true;
    $this->edit = true;
    $this->delete = true;
    $this->multishop_context = -1;

    Shop::addTableAssociation('gomakoil_faq_category', array('type' => 'shop'));

    parent::__construct();


    $this->position_identifier = 'id_gomakoil_faq_category';
    $this->_defaultOrderBy = 'a!position';
    $this->orderBy = 'position';

    $this->bulk_actions = array(
      'delete' => array(
        'text' => $this->l('Delete selected'),
        'icon' => 'icon-trash',
        'confirm' => $this->l('Delete selected items?')
      )
    );

    $this->fields_list = array(
      'id_gomakoil_faq_category' => array(
        'title' => $this->l('ID'),
        'filter_key' => 'a!id_gomakoil_faq_category',
        'width' => 20
      ),
      'name' => array(
        'title' => $this->l('Title'),
        'width' =>100,
        'filter_key' => 'b!name',
        'orderby' => true
      ),
      'active' => array(
        'title' => $this->l('Displayed'),
        'active' => 'status',
        'type' => 'bool',
        'width' => 70,
        'orderby' => true
      ),
      'position' => array(
        'title' => $this->l('Position'),
        'width' => 40,
        'filter_key' => 'a!position',
        'align' => 'left',
        'position' => 'position'
      ),
      'date_add' => array(
        'title' => $this->l('Creation date'),
        'maxlength' => 190,
        'width' =>100
      ),
    );
  }


  public function setMedia()
  {
    parent::setMedia();

    $this->context->controller->addCss(__PS_BASE_URI__.'modules/faqs/views/css/faq_back.css', 'all');
    $this->context->controller->addJs(__PS_BASE_URI__.'modules/faqs/views/js/faq.js', 'all');

    $this->addjQueryPlugin(array(
      'select2',
    ));
  }

  public function init()
  {
    parent::init();
  }

  public function initContent()
  {
    $rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');
    if(!$rewrite_settings){
      $urlFaqs = _PS_BASE_URL_SSL_.__PS_BASE_URI__.'index.php?fc=module&module=faqs&controller=display';
    }
    else{
      $home_page_id = Configuration::get('FAQS_SEO_HOME_PAGE') ? Configuration::get('FAQS_SEO_HOME_PAGE') : 'faqs';
      $urlFaqs = _PS_BASE_URL_SSL_.__PS_BASE_URI__.$home_page_id;
    }

    $this->tpl_list_vars['urlFaqs'] = $urlFaqs;

    parent::initContent();
  }

  public function initProcess(){
    parent::initProcess();
  }

  protected function updateAssoShop($id_object)
  {
    return true;
  }

  public function initPageHeaderToolbar(){
    if ($this->display == 'view' || $this->display == 'edit')
    {
      $rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');
      $baseUrl = _PS_BASE_URL_SSL_.__PS_BASE_URI__;

      $page = new faqsCategory( Tools::getValue('id_gomakoil_faq_category'), Context::getContext()->language->id );

      if(!$rewrite_settings){
        $faqUrl = $baseUrl.'index.php?fc=module&module=faqs&controller=display&category='.$page->link_rewrite;
      }
      else{
        $home_page_id = Configuration::get('FAQS_SEO_HOME_PAGE') ? Configuration::get('FAQS_SEO_HOME_PAGE') : 'faqs';
        $faqUrl = $baseUrl.$home_page_id.'/' . $page->link_rewrite . '.html';
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


  public function renderForm()
  {
    $this->fields_form = array(
      'legend' => array(
        'title' => $this->l('Category'),
        'icon' => 'icon-plus-sign-alt'
      ),
      'input' => array(
        array(
          'type' => 'text',
          'label' => $this->l('Title'),
          'name' => 'name',
          'lang' => true,
          'required' => true,
          'class' => 'name',
        ),
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
          'type' => 'color',
          'label' => $this->l('Title color'),
          'name' => 'color',
          'hint' => $this->l('Choose a color with the color picker, or enter an HTML color (e.g. "lightblue", "#CC6600").')
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
          'type' => 'text',
          'label' => $this->l('Friendly URL:'),
          'name' => 'link_rewrite',
          'lang' => true,
          'required' => true,
          'hint' => $this->l('Only letters and the minus (-) character are allowed.')
        ),
        array(
          'type' => 'hidden',
          'name' => 'PS_ALLOW_ACCENTED_CHARS_URL',
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

    $this->fields_value['PS_ALLOW_ACCENTED_CHARS_URL'] = (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL');

    return parent::renderForm();
  }

  public function renderList()
  {
    $this->addRowAction('edit');
    $this->addRowAction('delete');
    return parent::renderList();
  }

  public function ajaxProcessUpdatePositions()
  {
    $category = Tools::getValue('gomakoil_faq_category');
    foreach($category as $key => $value){
      $value = explode('_', $value);
      Db::getInstance()->update('gomakoil_faq_category', array('position' => (int)$key), 'id_gomakoil_faq_category='.(int)$value[2]);
    }
  }

}