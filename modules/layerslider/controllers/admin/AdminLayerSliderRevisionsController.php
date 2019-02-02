<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class AdminLayerSliderRevisionsController extends ModuleAdminController
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
          'id' => 'layerslider_page_ls-revisions',
          'base' => 'layerslider_page_ls-revisions'
        );
        // simulate wp page
        ${'_GET'}['page'] = 'ls-revisions';

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
