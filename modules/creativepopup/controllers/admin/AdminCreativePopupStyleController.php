<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class AdminCreativePopupStyleController extends ModuleAdminController
{
    public function postProcess()
    {
        parent::postProcess();
        if (isset($this->context->cookie->cp_error)) {
            $this->errors[] = $this->context->cookie->cp_error;
            unset($this->context->cookie->cp_error);
        }
    }

    public function initPageHeaderToolbar()
    {
        // hide header toolbar
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);

        define('CP_URL_TOKEN', $this->token);
        $GLOBALS['cp_screen'] = (object) array(
          'id' => 'cp_page_style-editor',
          'base' => 'cp_page_style-editor'
        );
        // simulate page
        ${'_GET'}['page'] = 'style-editor';

        require_once _PS_MODULE_DIR_.$this->module->name.'/helper.php';
        require_once _PS_MODULE_DIR_.$this->module->name.'/views/default.php';
    }

    public function display()
    {
        $this->context->smarty->assign(array('content' => $this->content));
        $this->display_footer = false;

        parent::display();
    }
}
