<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class AdminCreativePopupController extends ModuleAdminController
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
          'id' => 'cp_page_popups',
          'base' => 'cp_page_popups'
        );
        // simulate page
        ${'_GET'}['page'] = 'popups';

        if (version_compare(_PS_VERSION_, '1.6', '<')) {
            // CreativePopup admin requires at least jQuery v1.10.2
            foreach ($this->context->controller->js_files as &$js) {
                if (preg_match('/jquery-\d\.\d\.\d(\.min)?\.js$/i', $js)) {
                    $js = __PS_BASE_URI__."modules/{$this->module->name}/views/js/jquery.min.js";
                    break;
                }
            }
        }

        require_once _PS_MODULE_DIR_.$this->module->name.'/helper.php';
        if (isset(${'_COOKIE'}['cp-login'])) {
            $this->content = '<script>
                var doc = window.parent.document, $ = window.parent.jQuery;
                doc.cookie = "cp-login=; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
                $(".cp-publish button").click();
                $(doc.getElementById("wpwrap")).css({ opacity: "", pointerEvents: "" });
                $(doc.getElementById("cp-login")).remove();
            </script>';
        } else {
            require_once _PS_MODULE_DIR_.$this->module->name.'/views/default.php';
        }
    }

    public function display()
    {
        $this->context->smarty->assign(array('content' => $this->content));
        $this->display_footer = false;

        parent::display();
    }
}
