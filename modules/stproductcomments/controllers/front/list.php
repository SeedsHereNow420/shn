<?php
/*
* 2007-2014 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Product\Search\Pagination;
use PrestaShop\PrestaShop\Adapter\Order\OrderPresenter;
include_once(dirname(__FILE__).'/../../classes/StProductCommentClass.php');

class StProductCommentsListModuleFrontController extends ModuleFrontController
{
    private $_prefix_st = 'ST_PROD_C_';
    public $filter_order = array();
    public $filter_star = array();


	public function __construct()
	{
		parent::__construct();
		$this->context = Context::getContext();


        $this->filter_order = array(
            0 => array(
                    'label'=> $this->trans('Popularity', array(), 'Shop.Theme.Transformer'),
                    'val' => 'popular'
                ),
            1 => array(
                    'label'=> $this->trans('Most helpful', array(), 'Shop.Theme.Transformer'),
                    'val' => 'total_useful.desc'
                ),
            2 => array(
                    'label'=> $this->trans('Newest', array(), 'Shop.Theme.Transformer'),
                    'val' => 'date_add.asc'
                ),
            3 => array(
                    'label'=> $this->trans('Oldest', array(), 'Shop.Theme.Transformer'),
                    'val' => 'date_add.desc'
                ),
            4 => array(
                    'label'=> $this->trans('Most commented', array(), 'Shop.Theme.Transformer'),
                    'val' => 'total_reply.asc'
                ),
            );
        $this->filter_star = array(
            array(
                    'label'=> $this->trans('5 stars', array(), 'Shop.Theme.Transformer'),
                    'val' => 5,
                ),
            array(
                    'label'=> $this->trans('4 stars', array(), 'Shop.Theme.Transformer'),
                    'val' => 4,
                ),
            array(
                    'label'=> $this->trans('3 stars', array(), 'Shop.Theme.Transformer'),
                    'val' => 3,
                ),
            array(
                    'label'=> $this->trans('2 stars', array(), 'Shop.Theme.Transformer'),
                    'val' => 2,
                ),
            array(
                    'label'=> $this->trans('1 stars', array(), 'Shop.Theme.Transformer'),
                    'val' => 1,
                ),
            );
	}

	public function initContent()
	{
		parent::initContent();

        if($this->ajax)
        {
            ob_end_clean();
            header('Content-Type: application/json');
            $this->ajaxDie(json_encode($this->getAjaxVariables()));
        }
        else
        {
            $variables = $this->assginAll();
    		
            $this->context->smarty->assign(array('pcomments'=>$variables));
            if($id_product = (int)Tools::getValue('id_product'))
            {
                $pc_product = array();
                $assembler = new ProductAssembler($this->context);
                $presenterFactory = new ProductPresenterFactory($this->context);
                $presentationSettings = $presenterFactory->getPresentationSettings();
                $presenter = new ProductListingPresenter(
                    new ImageRetriever(
                        $this->context->link
                    ),
                    $this->context->link,
                    new PriceFormatter(),
                    new ProductColorsRetriever(),
                    $this->context->getTranslator()
                );
                $pc_product = $presenter->present(
                    $presentationSettings,
                    $assembler->assembleProduct(array(
                        'id_product' => $id_product
                    )),
                    $this->context->language
                );
                $averages = StProductCommentClass::getAveragesByProduct($id_product, $this->context->language->id);
        
                $averageTotal = 0;
                foreach ($averages as $average) {
                    $averageTotal += (float)($average);
                }
                $averageTotal = count($averages) ? round($averageTotal / count($averages), 1) : 0;
                $criterions = StProductCommentCriterionClass::getCriterions($this->context->language->id, true);
                $criterions_arr = array();
                if($criterions){
                    foreach ($criterions as $v){
                        $criterions_arr[$v['id_st_product_comment_criterion']] = $v['name'];
                    }
                }
                $this->context->smarty->assign(array(
                    'pc_has_product' => true, 
                    'product' => $pc_product,
                    'criterions' => $criterions_arr,
                    'averages' => $averages,
                    'averageTotal' => $averageTotal,
                    'nbComments' => (int) StProductCommentClass::getCommentNumber($id_product),
                    ));
            }
    		$this->setTemplate('module:stproductcomments/views/templates/front/list.tpl');
        }
	}
    protected function getAjaxVariables()
    {
        $variables = $this->assginAll();

        $this->context->smarty->assign(array('pcomments'=>$variables));
        $pcomments_list =$this->context->smarty->fetch('module:stproductcomments/views/templates/hook/pcomments_list.tpl');
        $pcomments_filter =$this->context->smarty->fetch('module:stproductcomments/views/templates/hook/pcomments_filters.tpl');

        $data = array(
            'pcomments_list' => $pcomments_list,
            'pcomments_filter' => $pcomments_filter,
        );

        return $data;
    }
    private function assginAll()
    {
        $resultsPerPage = (int)Tools::getValue('resultsPerPage');
        $id_product = (int)Tools::getValue('id_product');
        $page = max((int)Tools::getValue('page'), 1);
        $order = Tools::getValue('order');
        $pic = Tools::getValue('pic')==1;
        $grade = (int)Tools::getValue('star', 0);

        $order_by=$order_way=null;
        if(!$order && $default_order = (int)Configuration::get($this->_prefix_st.'SORT_ORDER') && array_key_exists($default_order, $this->filter_order))
            $order=$this->filter_order[$default_order]['val'];        
        if(Tools::strpos($order, '.') !== false)
            list($order_by, $order_way) = explode('.', $order);
        if(!$order)
            $order = 'popular';

        //
        if (!$resultsPerPage) {
            $resultsPerPage= ($id_product && $this->ajax) ? Configuration::get($this->_prefix_st.'PRO_PER_PAGE') : Configuration::get($this->_prefix_st.'TESTM_PER_PAGE');
        }
        $resultsPerPage = $resultsPerPage ? $resultsPerPage : 10;
        $featured = !$id_product && Configuration::get($this->_prefix_st.'TESTIMONIAL') ? 2 : false;
        //

        $nbr_comments = StProductCommentClass::getListComments($resultsPerPage, null, $id_product, null, true, $order_by, $order_way, $pic, $grade,0,$featured); 

        $comments = StProductCommentClass::getListComments($resultsPerPage, $page, $id_product, $this->context->cookie->id_customer, false, $order_by, $order_way, $pic, $grade,0,$featured);
        $stat = StProductCommentClass::statByProduct($id_product);
        // $product = array();
        
        if ($nbr_comments) {
            /*foreach ($comments as &$value) {
                $order_detail  = new OrderDetail($value['id_order_detail']);
                $order_array = array();
                $order = new Order($order_detail->id_order);
                $value['detail'] = (new OrderPresenter())->present($order);
                if (isset($value['detail']['products'])) {
                    foreach($value['detail']['products'] AS $product) {
                        $product['link'] = $this->context->link->getPageLink($product['id_product']);
                        if ($product['id_product'] == $id_product) {
                            $product = $product;
                            break;
                        }
                    }
                }
            }    */
            foreach ($comments as &$comment) {
                $order_detail  = new OrderDetail($comment['id_order_detail']);
                $product_name = Product::getProductName($comment['id_product'], $order_detail->product_attribute_id);
                $product_name = $product_name ? $product_name : $order_detail->product_name;
                $comment['product_name_full'] = $comment['product_name'] = $product_name;
                $comment['product_attr_name'] = '';
                if(count(explode(' : ', $product_name))==2)
                    list($comment['product_name'], $comment['product_attr_name']) = explode(' : ', $product_name);
                $comment['product_link'] = $this->context->link->getProductLink($comment['id_product'],null,null,null,null,null,$order_detail->product_attribute_id);

                $comment['timeago'] = Configuration::get($this->_prefix_st.'DISPLAY_DATE') ? false : StProductCommentClass::Timeago($comment['date_add']);
            }
        }
        return array(
            // 'logged' => $this->context->customer->isLogged(true),
            'comments' => $comments,
            'id_product' => $id_product,
            'nbr_comments' => $nbr_comments,
            'stat' => $stat,
            'g_rich_snippets' => Configuration::get($this->_prefix_st.'GOOGLE_RICH_SNIPPETS'),
            'helpful' => Configuration::get($this->_prefix_st.'HELPFUL'),
            'pagination' => $this->getTemplateVarPagination($nbr_comments, $page, $resultsPerPage),
            // 'image_path' => context::getContext()->link->protocol_content.(Tools::usingSecureMode() ? Tools::getShopDomainSSL() : Tools::getShopDomain())._THEME_PROD_PIC_DIR_,
            'filter_star' => $this->getFilterLinks($this->filter_star,'star',$grade),
            'filter_order' => $this->getFilterLinks($this->filter_order,'order',$order),
            'filter_pic' => $this->updateQueryString(array('pic' => 1, 'page' => null)),
            'does_filter_by_star' => $grade,
            'does_filter_by_pic' => $pic,
            'clear_all_link' => $this->updateQueryString(array('star' => null,'sort' => null,'pic' => null, 'page' => null)),
        );
    }
    protected function getFilterLinks(array $filters, $key, $current)
    {
        return array_map(function ($filter) use ($key, $current) {
            $filter['current'] = $filter['val'] === $current;
            $filter['url'] = $this->updateQueryString(array(
                $key => $filter['val'],
                'page' => null,
            ));
            return $filter;
        }, $filters);
    }
    protected function getTemplateVarPagination($resultCount = 0, $page=1, $resultsPerPage=20)
    {
        $totalItems = (int)$resultCount;
        $page = (int)$page ? (int)$page : 1;
        $resultsPerPage = (int)$resultsPerPage ? (int)$resultsPerPage : 20;
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
    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();

        $breadcrumb['links'][] = array(
            'title' => $this->trans('Reviews', array(), 'Shop.Theme.Transformer'),
            'url' => $this->context->link->getModuleLink('stproductcomments', 'list'),
        );
        return $breadcrumb;
    }
}
