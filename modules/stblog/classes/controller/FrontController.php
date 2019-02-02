<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

use PrestaShop\PrestaShop\Core\Product\Search\Pagination;
include_once(dirname(__FILE__).'/../../stblog.php');
include_once(dirname(__FILE__).'/../StBlogClass.php');
include_once(dirname(__FILE__).'/../StBlogCategory.php');
include_once(dirname(__FILE__).'/../StBlogImageClass.php');

class StblogModuleFrontController extends ModuleFrontController
{
	protected $page = 1;
    protected $resultsPerPage = 10;
    public function getMetaTags($id_lang,$page_name)
    {
        $ret = array(
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
        );
    	if ($page_name == 'category' && ($id_st_blog_category = Tools::getValue('id_st_blog_category')))
        {
            $sql = 'SELECT `name`,`meta_title`, `meta_description`, `meta_keywords`
				FROM `'._DB_PREFIX_.'st_blog_category_lang`
				WHERE `id_lang` = '.(int)$id_lang.'
					AND `id_st_blog_category` = '.(int)$id_st_blog_category;
    		if ($row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql))
    		{
    			$ret['meta_title'] = ($row['meta_title'] ? $row['meta_title'] : $row['name']).' - '.Configuration::get('ST_BLOG_META_TITLE',$this->context->language->id);
                $ret['meta_description'] = $row['meta_description'];
                $ret['meta_keywords'] = $row['meta_keywords'];
    		}
        }
		elseif ($page_name == 'article' && ($id_st_blog = Tools::getValue('id_st_blog')))
        {
            $sql = 'SELECT `name`,`meta_title`, `meta_description`, `meta_keywords`
				FROM `'._DB_PREFIX_.'st_blog_lang`
				WHERE `id_lang` = '.(int)$id_lang.'
					AND `id_st_blog` = '.(int)$id_st_blog;
    		if ($row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql))
    		{
    			$ret['meta_title'] = ($row['meta_title'] ? $row['meta_title'] : $row['name']).' - '.Configuration::get('ST_BLOG_META_TITLE',$this->context->language->id);
                $ret['meta_description'] = $row['meta_description'];
                $ret['meta_keywords'] = $row['meta_keywords'];
    		}
        }
        
        $ret['meta_title'] =='' && $ret['meta_title'] = Configuration::get('ST_BLOG_META_TITLE', $this->context->language->id);
        $ret['meta_description'] =='' && $ret['meta_description'] = Configuration::get('ST_BLOG_META_DESCRIPTION', $this->context->language->id);
        $ret['meta_keywords'] =='' && $ret['meta_keywords'] = Configuration::get('ST_BLOG_META_KEYWORDS', $this->context->language->id);
        
        return $ret;
    }    
    public function init()
    {
        parent::init();
        // For Pagination
        $resultsPerPage = (int)Tools::getValue('resultsPerPage');
        if ($resultsPerPage <= 0 || $resultsPerPage > 36) {
            $resultsPerPage = (int)Configuration::get('ST_BLOG_PER_PAGE');
        }
        $this->resultsPerPage = $resultsPerPage;
        $this->page = max((int)Tools::getValue('page'), 1);
        if (!$this->resultsPerPage) {
            $this->resultsPerPage = 10;
        }
        
        $param = array();
        $page_name = Dispatcher::getInstance()->getController();
        switch($page_name)
        {
            case 'article':
                if (!$this->blog) {
                    $this->blog = new StBlogClass((int)Tools::getValue('id_st_blog'), $this->context->language->id, $this->context->shop->id);
                }
                $param = array('id_st_blog'=>$this->blog->id,'rewrite'=>$this->blog->link_rewrite);   
            break;
            case 'category':
                if (!$this->category) {
                    $this->category = new StBlogCategory((int)Tools::getValue('id_st_blog_category'), $this->context->language->id);
                }
                $param = array('id_st_blog_category'=>$this->category->id,'rewrite'=>$this->category->link_rewrite);
            break;
        }
        
        if ($param)
        {
            $canonical_url = $this->context->link->getModuleLink('stblog',$page_name, $param);
            $this->stCanonicalRedirection($canonical_url);
        }
    }
    protected function getTemplateVarPagination($resultCount = 0)
    {
        $totalItems = (int)$resultCount;
        $page = (int)$this->page;
        $resultsPerPage = $this->resultsPerPage ? (int)$this->resultsPerPage : 10;
        $pagination = new Pagination();
        $pagination
            ->setPage($page)
            ->setPagesCount(
                ceil((int)$totalItems / $resultsPerPage)
            )
        ;
        $itemsShownFrom = ($resultsPerPage * ($page - 1)) + 1;
        $itemsShownTo = $resultsPerPage * $page;

        return array(
            'total_items' => $totalItems,
            'items_shown_from' => $itemsShownFrom,
            'items_shown_to' => ($itemsShownTo <= $totalItems) ? $itemsShownTo : $totalItems,
            'pages' => array_map(function ($link) {
                $link['url'] = $this->updateQueryString(array(
                    'page' => $link['page'],
                ));

                return $link;
            }, $pagination->buildLinks()),
        );
    }  
    protected function stCanonicalRedirection($canonical_url = '')
	{
		if (!$canonical_url || !Configuration::get('PS_CANONICAL_REDIRECT') || strtoupper($_SERVER['REQUEST_METHOD']) != 'GET' || Tools::getValue('live_edit'))
			return;

		$match_url = (Configuration::get('PS_SSL_ENABLED') && ($this->ssl || Configuration::get('PS_SSL_ENABLED_EVERYWHERE')) ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$match_url = rawurldecode($match_url);
		if (!preg_match('/^'.Tools::pRegexp(rawurldecode($canonical_url), '/').'([&?].*)?$/', $match_url))
		{
			$params = array();
			$str_params = '';
			$url_details = parse_url($canonical_url);

			if (!empty($url_details['query']))
			{
				parse_str($url_details['query'], $query);
				foreach ($query as $key => $value)
					$params[Tools::safeOutput($key)] = Tools::safeOutput($value);
			}
			$excluded_key = array('isolang', 'id_lang', 'controller', 'id_st_blog_category', 'id_st_blog', 'fc', 'module');
			foreach ($_GET as $key => $value)
				if (!in_array($key, $excluded_key) && Validate::isUrl($key) && Validate::isUrl($value))
					$params[Tools::safeOutput($key)] = Tools::safeOutput($value);

			$str_params = http_build_query($params, '', '&');
			if (!empty($str_params))
				$final_url = preg_replace('/^([^?]*)?.*$/', '$1', $canonical_url).'?'.$str_params;
			else
				$final_url = preg_replace('/^([^?]*)?.*$/', '$1', $canonical_url);

			// Don't send any cookie
			Context::getContext()->cookie->disallowWriting();

			if (defined('_PS_MODE_DEV_') && _PS_MODE_DEV_ && $_SERVER['REQUEST_URI'] != __PS_BASE_URI__)
				die('[Debug] This page has moved<br />Please use the following URL instead: <a href="'.$final_url.'">'.$final_url.'</a>');

			header('HTTP/1.0 301 Moved');
			header('Cache-Control: no-cache');
			Tools::redirectLink($final_url);
		}
	}
}
