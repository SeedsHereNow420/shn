<?php
/**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

class ModuleAdminControllerCPM extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
        ToolsModuleCPM::registerSmartyFunctions();
        ToolsModuleCPM::globalAssignVar();
        ToolsModuleCPM::convertJSONRequestToPost();
    }

    public function assignModuleTabAdminLink()
    {
        $this->context->smarty->assign('link_to_documentation', ToolsModuleCPM::getModuleTabAdminLink());
    }

    public function renderList()
    {
        $this->assignModuleTabAdminLink();
        return ToolsModuleCPM::fetchTemplate('admin/documentation_row.tpl').parent::renderList();
    }

    public function renderView()
    {
        $this->assignModuleTabAdminLink();
        return ToolsModuleCPM::fetchTemplate('admin/documentation_row.tpl').parent::renderView();
    }

    public function renderForm()
    {
        $this->assignModuleTabAdminLink();
        return ToolsModuleCPM::fetchTemplate('admin/documentation_row.tpl').parent::renderForm();
    }

    public function initAngular()
    {
        ToolsModuleCPM::autoloadCSS($this->module->getPathUri().'views/css/autoload/');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/lib/angular/vendor/jquery.fileStyle.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/lib/angular/vendor/jquery.binarytransport.js');
        $this->context->controller->addJS($this->module->getPathUri().'views/js/lib/angular/vendor/angular.js');
        AngularAppCPM::getInstance($this->module->getPathUri().'views/js/lib/angular/vendor/packages/lazy-load/')->autoloadApp();
        AngularAppCPM::getInstance($this->module->getPathUri().'views/js/lib/angular/')->autoloadApp();
    }

    public $return = array();
    public function ajaxProcessApi()
    {
        ToolsModuleCPM::setErrorHandler();
        ToolsModuleCPM::createAjaxApiCall($this);
    }
}
