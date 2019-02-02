<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class AdminLayerSliderTransitionController extends ModuleAdminController
{
    public function postProcess()
    {
        parent::postProcess();
        if (isset($this->context->cookie->ls_error)) {
            $this->errors[] = $this->context->cookie->ls_error;
            unset($this->context->cookie->ls_error);
        }
    }

    public function initPageHeaderToolbar()
    {
        // hide header toolbar
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);

        $GLOBALS['ls_token'] = $this->token;
        $GLOBALS['ls_screen'] = (object) array(
          'id' => 'layerslider_page_ls-transition-builder',
          'base' => 'layerslider_page_ls-transition-builder'
        );
        // simulate wp page
        ${'_GET'}['page'] = 'ls-transition-builder';

        if (version_compare(_PS_VERSION_, '1.6', '<')) {
            // CreativeSlider admin requires at least jQuery v1.10.2
            foreach ($this->context->controller->js_files as &$js) {
                if (preg_match('/jquery-\d\.\d\.\d(\.min)?\.js$/i', $js)) {
                    $js = __PS_BASE_URI__.'modules/layerslider/views/js/jquery-migrate.min.js';
                    break;
                }
            }
            array_unshift($this->context->controller->js_files, __PS_BASE_URI__.'modules/layerslider/views/js/jquery.min.js');
        }

        require_once _PS_MODULE_DIR_.$this->module->name.'/helper.php';
        require_once _PS_MODULE_DIR_.'layerslider/views/default.php';
    }

    public function display()
    {
        $this->context->smarty->assign(array('content' => $this->content));
        $this->display_footer = false;

        parent::display();
    }
}
