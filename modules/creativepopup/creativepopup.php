<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class CreativePopup extends Module
{
    public static $instance;

    protected $init = false;
    protected $tabs = array(
        'Creative Popup' => array('class' => 'AdminParentCreativePopup', 'active' => 1, 'icon' => 'filter_none'),
        'Popups' => array('class' => 'AdminCreativePopup', 'active' => 1),
        'Media Manager' => array('class' => 'AdminCreativePopupMedia', 'active' => 0),
        'Revisions' => array('class' => 'AdminCreativePopupRevisions', 'active' => 1),
        'Transition Builder' => array('class' => 'AdminCreativePopupTransition', 'active' => 1),
        'Skin Editor' => array('class' => 'AdminCreativePopupSkin', 'active' => 1),
        'CSS Editor' => array('class' => 'AdminCreativePopupStyle', 'active' => 1),
    );
    protected $lang = array(
        'fr' => array(
            'Creative Popup' => 'Creative Popup',
            'Popups' => 'Popups',
            'Media Manager' => 'Directeur des médias',
            'Revisions' => 'Révisions',
            'Transition Builder' => 'Effets de Transition',
            'Skin Editor' => 'Éditeur de skin',
            'CSS Editor' => 'Éditeur de CSS',
        )
    );

    public function __construct()
    {
        $this->name = 'creativepopup';
        $this->tab = 'pricing_promotion';
        $this->version = '1.6.4';
        $this->author = 'WebshopWorks';
        $this->module_key = '23065bc7db8b0b549cbe2e13a83b572a';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.5.0.17', 'max' => '1.7');
        $this->bootstrap = false;
        $this->displayName = 'Creative Popup';
        $this->description = 'Multifunctional responsive popup module';
        $this->confirmUninstall = 'Are you sure you want to uninstall?';
        parent::__construct();
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        return parent::install();
    }

    protected function addTabs()
    {
        $parent = version_compare(_PS_VERSION_, '1.7.0', '<') ? 0 : (int)Tab::getIdFromClassName('CONFIGURE');
        foreach ($this->tabs as $name => $t) {
            $tab = new Tab();
            $tab->active = $t['active'];
            $tab->class_name = $t['class'];
            $tab->name = array();
            foreach (Language::getLanguages(true) as $lang) {
                $tab->name[$lang['id_lang']] = isset($this->lang[$lang['iso_code']]) ? $this->lang[$lang['iso_code']][$name] : $name;
            }
            if (isset($t['icon'])) {
                $tab->icon = $t['icon'];
            }
            $tab->module = $this->name;
            $tab->id_parent = $parent;
            $tab->add();

            if ($t['class'] == 'AdminParentCreativePopup') {
                $parent = (int)Tab::getIdFromClassName($t['class']);
            }
        }
    }

    protected function deleteTabs()
    {
        foreach ($this->tabs as $t) {
            $id_tab = (int)Tab::getIdFromClassName($t['class']);
            if ($id_tab) {
                $tab = new Tab($id_tab);
                $tab->delete();
            }
        }
    }

    public function enable($force_all = false)
    {
        if ($res = parent::enable($force_all)) {
            $this->addTabs();
            $this->registerHook('displayHeader');
            if (version_compare(_PS_VERSION_, '1.7.1', '<')) {
                $this->registerHook('displayBackOfficeHeader');
            }
        }
        return $res;
    }

    public function disable($force_all = false)
    {
        $this->deleteTabs();
        $db = Db::getInstance();
        $db->execute('DELETE FROM '._DB_PREFIX_.'tab WHERE module = "creativepopup"');
        $this->unregisterHook('displayHeader');
        $this->unregisterHook('displayBackOfficeHeader');
        return parent::disable($force_all);
    }

    public function getContent()
    {
        Tools::redirectAdmin($this->context->link->getAdminLink('AdminCreativePopup'));
    }

    public function generatePopup($id)
    {
        $display = false;
        foreach (CpPopups::$popups as $k => &$popup) {
            if ($popup['id'] == $id) {
                $display = true;
                break;
            }
        }
        return $display ? CpShortcode::handleShortcode(array('id' => $id)) : '';
    }

    protected function getPopupTpls()
    {
        $tpls = array();
        foreach (CpPopups::$index as &$index) {
            if ($tpl = $this->generatePopup($index['id'])) {
                $tpls[] = $tpl;
            }
        }
        return $tpls;
    }

    protected function ajaxDie($return)
    {
        die(json_encode($return));
    }

    protected function processAjax()
    {
        if (Tools::isSubmit('submitMessage')) {
            if (version_compare(_PS_VERSION_, '1.7', '<')) {
                require_once _PS_FRONT_CONTROLLER_DIR_.'ContactController.php';
                $ctrl = new ContactController();
                $ctrl->postProcess();
                $this->ajaxDie(array('errors' => $ctrl->errors));
            } elseif ($contactform = Module::getInstanceByName('contactform')) {
                $contactform->sendMessage();
                $ctrl = $this->context->controller;
                $this->ajaxDie(array('errors' => $ctrl->errors));
            } else {
                // TODO
            }
        }
        if (Tools::isSubmit('submitAccount')) {
            if (version_compare(_PS_VERSION_, '1.7', '<')) {
                require_once _PS_FRONT_CONTROLLER_DIR_.'AuthController.php';
                $ctrl = new AuthController();
                $ctrl->postProcess();
                $this->ajaxDie(array('errors' => $ctrl->errors));
            } else {
                // TODO
            }
        }
        if (Tools::isSubmit('submitNewsletter')) {
            if (version_compare(_PS_VERSION_, '1.7', '<')) {
                require_once _PS_MODULE_DIR_.'creativepopup/classes/CpBlocknewsletter.php';
                $newsletter = new CpBlockNewsletter();
            } else {
                require_once _PS_MODULE_DIR_.'creativepopup/classes/CpEmailSubscription.php';
                $newsletter = new CpEmailSubscription();
            }
            $this->ajaxDie($newsletter->submitNewsletter());
        }
    }

    public function hookDisplayHeader()
    {
        if (Tools::isSubmit('ajax')) {
            $this->processAjax();
        }
        require_once _PS_MODULE_DIR_.'creativepopup/helper.php';
        require_once _PS_MODULE_DIR_.'creativepopup/base/core.php';

        $tpls = $this->getPopupTpls();
        if (!empty($tpls)) {
            cp_do_action('cp_enqueue_scripts');
            return cp_get_template($tpls);
        }
    }

    public function hookDisplayBackOfficeHeader()
    {
        return $this->display(__FILE__, 'views/templates/admin/header.tpl');
    }
}
