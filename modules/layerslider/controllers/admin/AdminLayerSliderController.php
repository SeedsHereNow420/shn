<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class AdminLayerSliderController extends ModuleAdminController
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
          'id' => 'toplevel_page_layerslider',
          'base' => 'toplevel_page_layerslider'
        );
        // simulate wp page
        ${'_GET'}['page'] = 'layerslider';

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
        if (isset(${'_COOKIE'}['ls-login'])) {
            $this->content = '<script>
                var doc = window.parent.document, $ = window.parent.jQuery;
                doc.cookie = "ls-login=; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
                $(".ls-publish button").click();
                $(doc.getElementById("wpwrap")).css({ opacity: "", pointerEvents: "" });
                $(doc.getElementById("ls-login")).remove();
            </script>';
        } else {
            require_once _PS_MODULE_DIR_.'layerslider/views/default.php';
        }
    }

    public function display()
    {
        $tmpl = '<script type="text/html" id="tmpl-template-store">
            <div id="ls-importing-modal-window">
                <header>
                    <h1>'.ls__('Template Store', 'LayerSlider').'</h1>
                    <b class="dashicons dashicons-no"></b>
                </header>
                <div class="km-ui-modal-scrollable">
                    <p>
                        '.ls__('Premium templates are only available after you connected your site with PrestaShop\'s marketplace.', 'LayerSlider').'
                        <a href="https://www.youtube.com/watch?v=SLFFWyY2NYM" target="_blank" style="font-size:13px">'.ls__('Check this video for more details.').'</a>
                    </p>
                    <button class="button button-primary button-hero" id="btn-connect-ps">'.ls__('Connect to PrestaShop Addons', 'LayerSlider').'</button>
                </div>
            </div>
        </script>';
        $this->context->smarty->assign(array('content' => $tmpl.$this->content));
        $this->display_footer = false;

        parent::display();
    }
}
