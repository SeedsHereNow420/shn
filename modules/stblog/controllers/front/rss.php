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

require_once dirname(__FILE__).'../../../classes/StBlogLoader.php';
StBlogLoader::load(array('Class','Comment','RssClass','ImageClass'));
class StblogRssModuleFrontController extends ModuleFrontController
{
	public function initContent()
	{
        $this->_gernerate();
	}
    
    private function _gernerate()
    {
        $smarty     = $this->context->smarty;
        $meta       = Meta::getMetaTags($this->context->language->id, 'index');
        $logo       = $smarty->getTemplateVars('favicon_url');
        $lang_iso   = $smarty->getTemplateVars('lang_iso');
        $base_url   = Tools::getHttpHost(true);
        
        $rss = new StBlogRSS($meta['meta_title'], $base_url ,$meta['meta_description'],$base_url.$logo);
        
        $rss->config('language', $lang_iso);
        $blogs = StBlogClass::getBlogRss($base_url);
        
        foreach($blogs AS $blog)
            $rss->addItem($blog['title'], $blog['link'], $blog['desc'], $blog['pub']);
      
        $rss->display();
            
    }
}