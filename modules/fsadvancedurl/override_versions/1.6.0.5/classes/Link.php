<?php
/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

class Link extends LinkCore
{
    protected function getLangLink($id_lang = null, Context $context = null, $id_shop = null)
    {
        if (Configuration::get('FSAU_REMOVE_DEFAULT_LANG', null, null, $id_shop) &&
            Language::isMultiLanguageActivated()) {
            if (!$id_lang) {
                if (is_null($context)) {
                    $context = Context::getContext();
                }

                $id_lang = $context->language->id;
            }

            if ($id_lang == Configuration::get('PS_LANG_DEFAULT', null, null, $id_shop)) {
                return '';
            }
        }

        return parent::getLangLink($id_lang, $context, $id_shop);
    }

    public function getCategoryLink(
        $category,
        $alias = null,
        $id_lang = null,
        $selected_filters = null,
        $id_shop = null
    ) {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }

        $url = $this->getBaseLink($id_shop).$this->getLangLink($id_lang, null, $id_shop);

        if (!is_object($category)) {
            if (is_array($category) && isset($category['id_category'])) {
                $category = new Category($category['id_category'], $id_lang);
            } elseif ((int)$category) {
                $category = new Category((int)$category, $id_lang);
            } else {
                return '';
            }
        }

        $params = array();
        $params['id'] = $category->id;
        $params['rewrite'] = (!$alias) ? $category->getFieldByLang('link_rewrite') : $alias;
        $params['meta_keywords'] = Tools::str2url($category->getFieldByLang('meta_keywords'));
        $params['meta_title'] = Tools::str2url($category->getFieldByLang('meta_title'));

        $dispatcher = Dispatcher::getInstance();
        if ($dispatcher->hasKeyword('category_rule', $id_lang, 'categories', $id_shop)) {
            $cats = array();
            foreach ($category->getParentsCategories($id_lang) as $cat) {
                if (!in_array($cat['id_category'], Link::$category_disable_rewrite)) {
                    $cats[] = $cat['link_rewrite'];
                }
            }
            $cats = array_reverse($cats);
            array_pop($cats);
            $params['categories'] = implode('/', $cats);
        }

        $selected_filters = is_null($selected_filters) ? '' : $selected_filters;
        if (empty($selected_filters)) {
            $rule = 'category_rule';
        } else {
            $rule = 'layered_rule';
            $params['selected_filters'] = $selected_filters;
        }

        return $url.Dispatcher::getInstance()->createUrl($rule, $id_lang, $params, $this->allow, '', $id_shop);
    }

    public function getCMSCategoryLink(
        $cms_category,
        $alias = null,
        $id_lang = null,
        $id_shop = null
    ) {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }

        $url = $this->getBaseLink($id_shop).$this->getLangLink($id_lang, null, $id_shop);

        $dispatcher = Dispatcher::getInstance();
        if (!is_object($cms_category)) {
            $cms_category = new CMSCategory((int)$cms_category, $id_lang);
        }

        // Set available keywords
        $params = array();
        $params['id'] = $cms_category->id;

        $params['rewrite'] = $cms_category->link_rewrite;
        if (is_array($params['rewrite']) && isset($params['rewrite'][(int)$id_lang])) {
            $params['rewrite'] = $params['rewrite'][(int)$id_lang];
        }
        if ($alias) {
            $params['rewrite'] = $alias;
        }

        $params['meta_keywords'] = $cms_category->meta_keywords;
        if (is_array($params['meta_keywords']) && isset($params['meta_keywords'][(int)$id_lang])) {
            $params['meta_keywords'] = Tools::str2url($params['meta_keywords'][(int)$id_lang]);
        }

        $params['meta_title'] = $cms_category->meta_title;
        if (is_array($params['meta_title']) && isset($params['meta_title'][(int)$id_lang])) {
            $params['meta_title'] = Tools::str2url($params['meta_title'][(int)$id_lang]);
        }

        if ($dispatcher->hasKeyword('cms_category_rule', $id_lang, 'categories', $id_shop)) {
            $cats = array();
            if (Module::isEnabled('fsadvancedurl')) {
                $fsau = Module::getInstanceByName('fsadvancedurl');
                $categories = $fsau->getCMSCategoryParentCategories($cms_category->id, $id_lang);
                if ($categories) {
                    foreach ($categories as $cat) {
                        $cats[] = $cat['link_rewrite'];
                    }
                    $cats = array_reverse($cats);
                    array_pop($cats);
                }
            }
            $params['categories'] = implode('/', $cats);
        }

        return $url.$dispatcher->createUrl('cms_category_rule', $id_lang, $params, $this->allow, '', $id_shop);
    }

    public function getCMSLink(
        $cms,
        $alias = null,
        $ssl = null,
        $id_lang = null,
        $id_shop = null
    ) {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }

        $url = $this->getBaseLink($id_shop, $ssl).$this->getLangLink($id_lang, null, $id_shop);

        $dispatcher = Dispatcher::getInstance();
        if (!is_object($cms)) {
            $cms = new CMS((int)$cms, $id_lang);
        }

        // Set available keywords
        $params = array();
        $params['id'] = $cms->id;

        $params['rewrite'] = $cms->link_rewrite;
        if (is_array($params['rewrite']) && isset($params['rewrite'][(int)$id_lang])) {
            $params['rewrite'] = $params['rewrite'][(int)$id_lang];
        }
        if ($alias) {
            $params['rewrite'] = $alias;
        }

        $params['meta_keywords'] = $cms->meta_keywords;
        if (is_array($params['meta_keywords']) && isset($params['meta_keywords'][(int)$id_lang])) {
            $params['meta_keywords'] = Tools::str2url($params['meta_keywords'][(int)$id_lang]);
        }

        $params['meta_title'] = $cms->meta_title;
        if (is_array($params['meta_title']) && isset($params['meta_title'][(int)$id_lang])) {
            $params['meta_title'] = Tools::str2url($params['meta_title'][(int)$id_lang]);
        }

        if ($dispatcher->hasKeyword('cms_rule', $id_lang, 'categories', $id_shop)) {
            $cats = array();
            $cms_category = new CMSCategory($cms->id_cms_category, $id_lang);
            if (Validate::isLoadedObject($cms_category)) {
                if (Module::isEnabled('fsadvancedurl')) {
                    $fsau = Module::getInstanceByName('fsadvancedurl');
                    $categories = $fsau->getCMSCategoryParentCategories($cms_category->id, $id_lang);
                    if ($categories) {
                        foreach ($categories as $cat) {
                            $cats[] = $cat['link_rewrite'];
                        }
                        $cats = array_reverse($cats);
                    }
                }
            }
            $params['categories'] = implode('/', $cats);
        }

        return $url.$dispatcher->createUrl('cms_rule', $id_lang, $params, $this->allow, '', $id_shop);
    }
}
