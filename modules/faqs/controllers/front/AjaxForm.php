<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04.09.15
 * Time: 20:33
 */
require_once(dirname(__FILE__) . '/../../classes/faqsPost.php');

class faqsAjaxFormModuleFrontController extends FrontController
{

  private $_faqsCategory;

  public function initContent()
  {
    if (!$this->ajax) {
      parent::initContent();
    }
  }

  public function displayAjax()
  {
     $json = array();
    try{

      if (Tools::getValue('action') == 'send'){
        $captcha_session = Tools::strtolower(Context::getContext()->cookie->_CAPTCHA);
        $name = Tools::getValue('name');
        $email = Tools::getValue('email');
        $category = Tools::getValue('category');
        $question = Tools::getValue('question');
        $id_lang = Tools::getValue('id_lang');

        if(!$name){
          throw new Exception ( 'name_customer' );
        }
        if(!$email || !Validate::isEmail($email)){
          throw new Exception ( 'email_customer' );
        }
        if(!$question){
          throw new Exception ( 'question_customer' );
        }
        if(!$question){
          throw new Exception ( 'question_customer' );
        }

        if (Configuration::get('FAQS_ENABLE_CAPTCHA') == 1) {
          $captcha = Tools::strtolower(Tools::getValue('captcha'));

          if($captcha_session !== $captcha || !$captcha){
            throw new Exception ( 'captcha_res' );
          }
        }

        $set = $this->setQuestion($name, $email, $category, $question);
        $message = $this->addQuestion($name, $email, $category, $question, $id_lang);

        if($set && $message){
          $json['form'] = $this->notificationForm(Module::getInstanceByName('faqs')->l("Message sent successfully!"), $id_lang);
        }
        else{
          $json['form'] = $this->notificationForm(Module::getInstanceByName('faqs')->l('Some error occurred please contact us!'), $id_lang);
        }
      }

      if (Tools::getValue('action') == 'showForm'){
         $json['form'] = $this->getFreeCallForm(Tools::getValue('id_lang'), Tools::getValue('id_shop')) ;
      }

      die( json_encode($json) );
    }
    catch(Exception $e){
      $json['error'] = $e->getMessage();
      if( $e->getCode() == 10 ){
        $json['error_message'] = $e->getMessage();
      }
    }
    die( json_encode($json) );
  }

  public function notificationForm($msg, $id_lang){

    $data = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/front/notification.tpl');
    $data->assign(
      array(
        'id_lang'  => $id_lang,
        'msg'      => $msg,
      )
    );
    return $data->fetch();
  }

  public function addQuestion($name, $email, $category, $question, $id_lang){

    $email_admin = Configuration::get('FAQS_EMAILS');
    $emails = explode(',', $email_admin);

    foreach($emails as $send_to){
      $template_vars = $this->templateMail($name, $email, $category, $question, $id_lang);
      $template_vars = array('{content}' => $template_vars);
      $this->sendMessage($template_vars, trim($send_to),  $email);
    }
    return true;
  }

  public function sendMessage($template_vars, $send_to, $email){
    $mail = Mail::Send(
      Configuration::get('PS_LANG_DEFAULT'),
      'faqs',
      Module::getInstanceByName('faqs')->l('New question'),
      $template_vars,
      "$send_to",
      NULL,
      $email ? $email : NULL,
      NULL,
      NULL,
      NULL,
      dirname(__FILE__).'/../../mails/');
    return $mail;
  }

  public function templateMail($name, $email, $category, $question, $id_lang){

    $data = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/front/templateMail.tpl');
    $baseUrl = _PS_BASE_URL_SSL_.__PS_BASE_URI__;
    $logo = self::$link->getMediaLink(_PS_IMG_.Configuration::get('PS_LOGO'));
    $obj = new faqsCategory($category, $id_lang);

    $data->assign(
      array(
        'logo_url'     =>  $logo,
        'baseUrl'      => $baseUrl,
        'name'      => $name,
        'email'      => $email,
        'category'      => $obj->name,
        'question'      => $question,
        'id_lang'      => $id_lang,
      )
    );
    return $data->fetch();
  }

  public function setQuestion($name, $email, $category, $question){
    $faqsPost = new faqsPost();
    $faqsPost->active = 0;
    $faqsPost->most = 0;
    $faqsPost->as_url = 0;
    $faqsPost->association = 0;
    $faqsPost->id_gomakoil_faq_category = $category;
    $this->position = (int)$this->getLastPostPosition($category) + 1;
    $faqsPost->by_customer = 1;
    $faqsPost->name = $name;
    $faqsPost->email = $email;
    $languages = Language::getLanguages(false);
    foreach ($languages as $lang){
      $faqsPost->question[$lang['id_lang']] = $question;
      $faqsPost->link_rewrite[$lang['id_lang']] = Tools::truncate(Tools::str2url($question), 125, '');
    }
    
    return $faqsPost->save();
  }

  public function getFreeCallForm($id_lang, $id_shop){

    $data = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/front/form.tpl');
    $this->_faqsCategory = new faqsCategory();
    $faqCategories = $this->_faqsCategory->getCategoriesFaq(Context::getContext()->shop->id, Context::getContext()->language->id);

    $captcha = false;

    if (Configuration::get('FAQS_ENABLE_CAPTCHA') == 1) {
      $captcha = _PS_BASE_URL_SSL_.__PS_BASE_URI__.'modules/faqs/secpic.php';
    }

    $data->assign(
      array(
        'id_shop'           => $id_shop,
        'id_lang'           => $id_lang,
        'faqCategories'     => $faqCategories,
        'captcha_url'       => $captcha,
        'base_url'          => _PS_BASE_URL_SSL_.__PS_BASE_URI__,
      )
    );
    return $data->fetch();
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

}