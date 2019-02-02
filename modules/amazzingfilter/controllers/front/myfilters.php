<?php
/**
* 2007-2017 Amazzing
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
*
*  @author    Amazzing <mail@amazzing.ru>
*  @copyright 2007-2017 Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

class AmazzingFilterMyFiltersModuleFrontController extends ModuleFrontControllerCore
{
    public function init()
    {
        $this->display_column_left = false;
        $this->display_column_right = false;
        parent::init();
    }

    public function initContent()
    {
        parent::initContent();
        $this->context = Context::getContext();
        $adjustable_filters = $this->module->getAdjustableCustomerFilters();

        if (!$this->context->customer->id || !$adjustable_filters) {
            Tools::redirect('my-account');
        }

        $id_lang = $this->context->language->id;
        $all_available_filters = $this->module->getAvailableFilters(false);
        $customer_filters = $this->module->getCustomerFilters($this->context->customer->id);

        $filters = array();
        foreach ($adjustable_filters as $f) {
            if (empty($all_available_filters[$f])) {
                continue;
            }
            $filters[$f] = array(
                'name' =>  $all_available_filters[$f]['name'],
                'submit_name' =>  'filters['.$f.'][]',
            );
            $values = array();
            $resource_type = Tools::substr($f, 0, 1);
            switch ($resource_type) {
                case 'c':
                    $id_parent = Tools::substr($f, 1);
                    if (!$id_parent) {
                        $id_parent = $this->context->shop->getCategory();
                    }
                    $imploded_customer_groups = implode(',', $this->context->customer->getGroups());
                    $cats = $this->module->getSubcategories($id_lang, $id_parent, $imploded_customer_groups);
                    $grouped_cats = array();
                    foreach ($cats as $c) {
                        $c['id'] = $c['id_category'];
                        $grouped_cats[$c['id_parent']][] = $c;
                    }
                    if (!empty($grouped_cats[$id_parent])) {
                        $values = $grouped_cats;
                        $filters[$f]['id_parent'] = $id_parent;
                    }
                    break;
                case 'a':
                case 'f':
                    $id_group = Tools::substr($f, 1);
                    $get_method = $resource_type == 'a' ? 'getAttributes' : 'getFeatures';
                    $values = $this->module->$get_method($id_lang, $id_group);
                    break;
                case 'm':
                case 's':
                case 't':
                case 'q':
                    $values = $this->module->getFilteringOptions($resource_type);
                    break;
            }
            $filters[$f]['values'] = $values;
        }

        $this->context->smarty->assign(array(
            'filters' => $filters,
            'customer_filters' => $customer_filters,
            'layout_classes' => $this->general_settings['af_classes'],
        ));
        $this->setCurrentTemplate('my-filters.tpl');
    }

    public function setCurrentTemplate($tpl_name, $settings = array())
    {
        if ($this->module->is_17) {
            $this->context->smarty->assign(array(
                'html' => $this->displayTemplate($tpl_name),
            ));
            $page = 'module-'.$this->module->name.'-myfilters';
            $this->context->controller->php_self = $page;
            if (!empty($settings['display_column_left']) && !empty($settings['display_column_right'])) {
                $layout = 'both-columns';
            } elseif (!empty($settings['display_column_left'])) {
                $layout = 'left-column';
            } elseif (!empty($settings['display_column_right'])) {
                $layout = 'right-column';
            } else {
                $layout = 'full-width';
            }
            $this->context->shop->theme->setPageLayouts(array($page => 'layout-'.$layout));
            $this->setTemplate('module:amazzingfilter/views/templates/front/content-17.tpl');
        } else {
            $this->setTemplate($tpl_name);
        }
    }

    public function displayTemplate($tpl_name)
    {
        $local_path = _PS_MODULE_DIR_.$this->module->name.'/'.$this->module->name.'.php';
        return $this->module->display($local_path, 'views/templates/front/'.$tpl_name);
    }

    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();
        $breadcrumb['links'][] = $this->addMyAccountToBreadcrumb();
        $breadcrumb['links'][] = array(
            'title' => $this->module->l('Filtering preferences'),
            'url' => $this->context->link->getModuleLink($this->module->name, 'my-filters'),
        );
        return $breadcrumb;
    }

    public function setMedia()
    {
        parent::setMedia();
        $this->general_settings = $this->module->getGeneralSettings();
        $this->context->controller->addJS($this->module->media_path.'js/my-filters.js');
        $this->context->controller->addCSS($this->module->media_path.'css/my-filters.css', 'all');
        if (!empty($this->general_settings['load_icons'])) {
            $this->context->controller->addCSS($this->module->media_path.'css/icons.css', 'all');
        }
        $params = array('action' => 'SaveMyFilters');
        Media::addJsDef(array(
            'af_ajax_path' => $this->context->link->getModuleLink($this->module->name, 'ajax', $params),
            'savedTxt' => $this->module->saved_txt,
            'af_classes' => $this->general_settings['af_classes'],
        ));
    }
}
