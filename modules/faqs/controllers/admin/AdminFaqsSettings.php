<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.08.15
 * Time: 17:40
 */
require_once(dirname(__FILE__) . '/../../classes/faqsCategory.php');

class AdminFaqsSettingsController extends ModuleAdminController
{

  public function __construct()
  {
    $this->className = '';
    $this->table = 'gomakoil_faq_settings';
    $this->bootstrap = true;
    $this->lang = false;
    $this->edit = true;
    $this->delete = true;

    parent::__construct();

    $this->multishop_context = -1;
    $this->multishop_context_group = true;
    $this->position_identifier = 'id_gomakoil_faq_settings';
    $_GET['updategomakoil_faq_settings'] = 1;
    $_GET['id_gomakoil_faq_settings'] = 1;
    $this->submit_action = '';
  }

  public function setMedia()
  {
    parent::setMedia();

    $this->addCSS(array(
      _PS_MODULE_DIR_ . 'faqs/views/css/faq_back.css',
      _PS_MODULE_DIR_ . 'faqs/libraries/codemirror/lib/codemirror.css',
    ));

    $this->addjQueryPlugin(array(
      'select2',
    ));

    $this->addJS(array(
      _PS_MODULE_DIR_ . 'faqs/libraries/codemirror/lib/codemirror.js',
      _PS_MODULE_DIR_ . 'faqs/libraries/codemirror/mode/css/css.js',
      _PS_MODULE_DIR_ . 'faqs/views/js/faq.js',
    ));
  }

  public function displayTabSupport(){
    $data = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/front/tabSuppor.tpl');
    return $data->fetch();
  }

  public function displayTabModules(){
    $data = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/front/modules.tpl');
    return $data->fetch();
  }

  public function renderForm()
  {
    $this->fields_form = array(
      'legend' => array(
        'title' => $this->l('Settings'),
        'icon' => 'icon-AdminTools'
      ),
      'tabs' => array(
        'general' => $this->l('General'),
        'product_category_assoc_faqs' => $this->l('Product category associated FAQs'),
        'code_mirror' => $this->l('Advanced Styles (CSS)'),
        'support' => $this->l('Support'),
        'modules' => $this->l('Related Modules'),
      ),
      'input' => array(
        array(
          'type' => 'html',
          'tab' => 'support',
          'form_group_class' => 'support_tab_content',
          'name' => $this->displayTabSupport()
        ),
        array(
          'type' => 'html',
          'tab' => 'modules',
          'form_group_class' => 'support_tab_content',
          'name' => $this->displayTabModules()
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show faq categories block in left/right column'),
          'name' => 'categories',
          'is_bool' => true,
          'tab' => 'general',
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
          'label' => $this->l('Show just on faq page'),
          'name' => 'categories_faq',
          'form_group_class' => 'categories_faq',
          'is_bool' => true,
          'tab' => 'general',
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
          'type' => 'html',
          'name' => '',
          'tab' => 'general',
          'form_group_class' => 'line',
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show featured questions block in left/right column'),
          'name' => 'featured',
          'is_bool' => true,
          'tab' => 'general',
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
          'label' => $this->l('Show just on faq page'),
          'name' => 'featured_faq',
          'form_group_class' => 'featured_faq',
          'is_bool' => true,
          'tab' => 'general',
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
          'type' => 'html',
          'name' => '',
          'tab' => 'general',
          'form_group_class' => 'line',
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show button "Ask a question" in left/right column'),
          'name' => 'button',
          'is_bool' => true,
          'tab' => 'general',
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
          'label' => $this->l('Show FAQs associated to product category in left/right column'),
          'name' => 'product_category_assoc_faqs',
          'is_bool' => true,
          'tab' => 'product_category_assoc_faqs',
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
          'label' => $this->l('Number of associated to product category FAQs to display'),
          'type' => 'text',
          'name' => 'product_category_assoc_faqs_limit',
          'tab' => 'product_category_assoc_faqs',
          'form_group_class' => 'product_category_assoc_faqs_limit',
        ),

        array(
          'type' => 'switch',
          'label' => $this->l('Show just on faq page'),
          'name' => 'button_faqs',
          'form_group_class' => 'button_faqs',
          'is_bool' => true,
          'tab' => 'general',
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
          'label' => $this->l('Show button "Ask a question" on product page'),
          'name' => 'button_on_product_page',
          'is_bool' => true,
          'tab' => 'general',
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
          'type' => 'textarea',
          'label' => $this->l('Send notification for'),
          'name' => 'emails',
          'autoload_rte' => false,
          'rows' => 3,
          'cols' => 20,
          'tab' => 'general',
          'required' => true,
          'form_group_class' => 'field_width_50',
          'desc' => $this->l('Each email must be separated by a comma'),
        ),
        array(
          'type' => 'html',
          'name' => '',
          'tab' => 'general',
          'form_group_class' => 'line',
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show featured questions block in footer'),
          'name' => 'featured_footer',
          'is_bool' => true,
          'tab' => 'general',
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
          'label' => $this->l('Number featured questions in footer'),
          'type' => 'text',
          'tab' => 'general',
          'name' => 'featured_footer_count',
          'form_group_class' => 'featured_footer_count',
        ),
        array(
          'type' => 'html',
          'name' => '',
          'form_group_class' => 'line tab_content general',
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Enable captcha'),
          'name' => 'question_form_captcha',
          'is_bool' => true,
          'tab' => 'general',
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
          'type' => 'html',
          'name' => '',
          'tab' => 'general',
          'form_group_class' => 'line tab_content general',
        ),
        array(
          'label' => $this->l('Home Page URL Rewrite'),
          'type' => 'text',
          'tab' => 'general',
          'name' => 'seo_home_page',
          'form_group_class' => 'seo-home-page',
        ),
        array(
          'type' => 'textarea',
          'label' => $this->l('Advanced Styles (CSS)'),
          'name' => 'css_code',
          'class' => 'css_code',
          'form_group_class' => 'codeMirror',
          'height' => 300,
          'tab' => 'code_mirror',
        ),
      ),
      'buttons' => array(
        'save-and-stay' => array(
          'title' => $this->l('Save'),
          'name' => 'save_settings',
          'type' => 'submit',
          'class' => 'btn btn-default pull-right',
          'icon' => 'process-icon-save'
        ),
      ),
    );

    $this->tpl_form_vars['PS_ALLOW_ACCENTED_CHARS_URL'] = (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL');
    $this->fields_value['submitAddgomakoil_faq_settings'] = (int)0;
    $this->fields_value['categories'] = Configuration::get('FAQS_CATEGORIES');
    $this->fields_value['categories_faq'] = Configuration::get('FAQS_CATEGORIES_FAQ');
    $this->fields_value['featured'] = Configuration::get('FAQS_FEATURED');
    $this->fields_value['featured_faq'] = Configuration::get('FAQS_FEATURED_FAQ');
    $this->fields_value['button'] = Configuration::get('FAQS_SHOW_BUTTON');
    $this->fields_value['emails'] = Configuration::get('FAQS_EMAILS');
    $this->fields_value['button_faqs'] = Configuration::get('FAQS_SHOW_BUTTON_FAQ');
    $this->fields_value['button_on_product_page'] = Configuration::get('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE');
    $this->fields_value['question_form_captcha'] = Configuration::get('FAQS_ENABLE_CAPTCHA');
    $this->fields_value['product_category_assoc_faqs'] = Configuration::get('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ');
    $this->fields_value['product_category_assoc_faqs_limit'] = Configuration::get('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT');
    $this->fields_value['css_code'] = Configuration::get('FAQS_CSS_CODE');
    $this->fields_value['seo_home_page'] = Configuration::get('FAQS_SEO_HOME_PAGE');

    $footer = Configuration::get('FAQS_FEATURED_FOOTER');
    $footer_count = Configuration::get('FAQS_FEATURED_FOOTER_COUNT');

    if($footer){
      $this->fields_value['featured_footer'] = $footer;
    }
    else{
      $this->fields_value['featured_footer'] = 0;
    }

    if($footer_count || $footer_count == 0){
      $this->fields_value['featured_footer_count'] = $footer_count;
    }
    else{
      $this->fields_value['featured_footer_count'] = 3;
    }

    return parent::renderForm();
  }

  public function getCodemirrorCssForm()
  {
    $codemirror_css_template = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/admin/codemirror_custom.tpl');

    $css_code = Configuration::get('FAQS_CSS_CODE');

    $codemirror_css_template->assign(
      array(
        'css_code' => $css_code,
      )
    );

    return $codemirror_css_template->fetch();
  }

  public function postProcess()
  {
    if( Tools::getValue('save_settings') !== false ){

      $email_admin = Tools::getValue('emails');
      $email_admin = explode(",", $email_admin);
      $error = false;
      foreach ($email_admin as $email){
        if(!Validate::isEmail(trim($email))){
          $error = $this->l('Invalid values "Email"');
          break;
        }
      }

      if(!Validate::isInt(Tools::getValue('featured_footer_count')) || $error){

        if($error){
          $this->errors[] = $error;
        }
        else{
        $this->errors[] = $this->l('Invalid values "Number featured questions"');

        }
      } else if (!Validate::isInt(Tools::getValue('product_category_assoc_faqs_limit'))) {
        $this->errors[] = $this->l('Invalid values "Number of associated to product category FAQs to display"');
        return false;
      } else {
        Configuration::updateValue('FAQS_EMAILS', Tools::getValue('emails'));
        Configuration::updateValue('FAQS_SHOW_BUTTON', Tools::getValue('button'));
        Configuration::updateValue('FAQS_SHOW_BUTTON_FAQ', Tools::getValue('button_faqs'));
        Configuration::updateValue('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE', Tools::getValue('button_on_product_page'));
        Configuration::updateValue('FAQS_CATEGORIES', Tools::getValue('categories'));
        Configuration::updateValue('FAQS_CATEGORIES_FAQ', Tools::getValue('categories_faq'));
        Configuration::updateValue('FAQS_FEATURED', Tools::getValue('featured'));
        Configuration::updateValue('FAQS_FEATURED_FAQ', Tools::getValue('featured_faq'));
        Configuration::updateValue('FAQS_FEATURED_FOOTER', Tools::getValue('featured_footer'));
        Configuration::updateValue('FAQS_FEATURED_FOOTER_COUNT', Tools::getValue('featured_footer_count'));
        Configuration::updateValue('FAQS_ENABLE_CAPTCHA', Tools::getValue('question_form_captcha'));
        Configuration::updateValue('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ', Tools::getValue('product_category_assoc_faqs'));
        Configuration::updateValue('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT', Tools::getValue('product_category_assoc_faqs_limit'));
        Configuration::updateValue('FAQS_CSS_CODE', Tools::getValue('css_code'));
        Configuration::updateValue('FAQS_SEO_HOME_PAGE', Tools::getValue('seo_home_page'));
      }
    }
    
    $res = parent::postProcess();

    $codemirror_css = $this->getCodemirrorCssForm();
    file_put_contents(_PS_MODULE_DIR_ . 'faqs/views/css/codemirror_custom.css', $codemirror_css);

    return $res;
  }

}