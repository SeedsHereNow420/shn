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
use PrestaShop\PrestaShop\Core\Product\Search\Pagination;
use PrestaShop\PrestaShop\Adapter\Order\OrderPresenter;
include_once(dirname(__FILE__).'/../../classes/StProductCommentClass.php');
include_once(dirname(__FILE__).'/../../classes/StProductCommentCriterionClass.php');
class StProductCommentsMyCommentsModuleFrontController extends ModuleFrontController
{
    public $auth = true;
    private $secure_key;
    private $_prefix_st = 'ST_PROD_C_';
	public function __construct()
	{
		parent::__construct();
        $this->secure_key = Tools::encrypt(get_class($this));
		$this->context = Context::getContext();
	}
    public function postProcess()
    {
        if (Tools::getValue('SaveComment')) {
            $id_customer = $this->context->customer->id;
            $id_product = (int)Tools::getValue('id_product');
            $id_order_detail = (int)Tools::getValue('id_order_detail');
    		if (!Validate::isInt($id_product) || !Validate::isInt($id_order_detail) || Tools::getValue('secure_key') != $this->secure_key)
    			$this->errors[] = $this->trans('Invalid parameters', array(), 'Shop.Theme.Transformer');
    		if (!Tools::getValue('content') || !Validate::isMessage(Tools::getValue('content')))
    			$this->errors[] = $this->trans('Your comment is too short. Please try again', array(), 'Shop.Theme.Transformer');
    		if (!$this->context->customer->id)
    			$this->errors[] = $this->trans('Please login to post a comment', array(), 'Shop.Theme.Transformer');
    
    		$product = new Product(Tools::getValue('id_product'));
    		if (!$product->id)
    			$this->errors[] = $this->trans('Product not found', array(), 'Shop.Theme.Transformer');
    
    		if (!count($this->errors)) {
    			$comment = new StProductCommentClass();
    			$comment->content = strip_tags(Tools::getValue('content'));
    			$comment->id_product = (int)$id_product;
    			$comment->id_parent = 0;
                $comment->id_order_detail = (int)$id_order_detail;
    			$comment->id_customer = (int)$id_customer;
   				$comment->customer_name = pSQL($this->context->customer->firstname.' '.$this->context->customer->lastname);
    			$comment->id_shop = $this->context->shop->id;
                $comment->validate = 0;
    			$comment->save();
                
                $grade_sum = 0;
    			foreach(Tools::getValue('criterion') as $id_st_product_comment_criterion => $grade)
    			{
    				$grade_sum += $grade;
    				$product_comment_criterion = new StProductCommentCriterionClass($id_st_product_comment_criterion);
    				if ($product_comment_criterion->id)
    					$product_comment_criterion->addGrade($comment->id, $grade);
    			}
    
    			if (count(Tools::getValue('criterion')) >= 1)
    			{
    				$comment->grade = round($grade_sum / count(Tools::getValue('criterion')), 2);
    				// Update Grade average of comment
    				$comment->save();
    			}
                
                if ($st_prodcut_comment_tags = Tools::getValue('st_prodcut_comment_tags')) {
                    StProductCommentClass::addTags($st_prodcut_comment_tags, $comment->id_product, $comment->id);
                }
                
                if ($image = Tools::getValue('image')) {
                    $image_arr = explode(',',$image);
                    $st_pc_max_images = Configuration::get($this->_prefix_st.'MAX_IMAGES') ? Configuration::get($this->_prefix_st.'MAX_IMAGES') : 6;
                    if(count($image_arr)>$st_pc_max_images)
                        $image_arr = array_slice($image_arr,0,$st_pc_max_images);
                    $pc_image_arr = array();
                    foreach ($image_arr as $img) {
                        $pc_image_arr[] = array('id_st_product_comment'=>$comment->id, 'image' => pSQL($img));
                    }
                    Db::getInstance()->insert(
                        'st_product_comment_image',
                        $pc_image_arr
                    );
                }
                $this->success[] = $this->trans('Thank you for your comment.', array(), 'Shop.Theme.Transformer');
                if (Configuration::get($this->_prefix_st.'MODERATE')) {
                    $this->success[] = $this->trans('Your comment may be awaiting moderation before being published.', array(), 'Shop.Theme.Transformer');    
                }
                $this->redirectWithNotifications($this->context->link->getModuleLink('stproductcomments','mycomments', array(
                    'secure_key'=>$this->secure_key)
                    )
                );
            }
            $this->redirectWithNotifications($this->context->link->getModuleLink('stproductcomments','mycomments', array(
                'id_product'=>$id_product, 'id_order'=>Tools::getValue('id_order'), 'add_comment'=>1,'secure_key'=>$this->secure_key))
            );
        } elseif (($id_st_product_comment = Tools::getValue('id_st_product_comment')) && Tools::getValue('delete_comment')) {
            $comment = new StProductCommentClass($id_st_product_comment);
            if ($comment->id && $comment->delete()) {
                $this->success[] = $this->trans('Comment was deleted.', array(), 'Shop.Theme.Transformer');
            } else {
                $this->errors[] = $this->trans('Error occurred when deleting comment.', array(), 'Shop.Theme.Transformer'); 
            }
            $this->redirectWithNotifications($this->context->link->getModuleLink('stproductcomments','mycomments'));
        }
    }
	public function initContent()
	{
		parent::initContent();
        if (($id_order = Tools::getValue('id_order')) && ($id_order_detail = Tools::getValue('id_order_detail'))) {
            if (Tools::getValue('secure_key') != $this->secure_key) {
                echo $this->trans('Invalid secure key', array(), 'Shop.Theme.Transformer');
                exit;
            }
            
            $id_product = 0;
            $order_array = array();
            $order = new Order($id_order);
            $order_array = get_object_vars($order);
            $order_array['detail'] = (new OrderPresenter())->present($order);
            if (isset($order_array['detail']['products'])) {
                foreach($order_array['detail']['products'] AS $product) {
                    if ($product['id_order_detail'] == $id_order_detail) {
                        $order_array['product'] = $product;
                        $id_product = $product['product_id'];
                        unset($order_array['detail']);
                        break;
                    }
                }
            }
            if (!isset($order_array['product'])) {
                Tools::redirect($this->context->link->getModuleLink('stproductcomments','mycomments'));
            }
            $comment = StProductCommentClass::getByOrderProduct($this->context->customer->id, $order_array['product']['id_order_detail'], $id_product, 0);
            $moderate = (int)Configuration::get($this->_prefix_st.'MODERATE');
            
            $this->context->smarty->assign(array(
                'secure_key' => $this->secure_key,
                'order' => $order_array,
                'comment' => $comment,
                'moderate' => $moderate,
                'id_order' => $id_order,
                'id_product' => $id_product,
            ));
            if (Tools::getValue('add_comment')) {
                Media::addJsDef(array(
                    'st_product_comment_tag_prefilled' => implode(',', StProductCommentClass::getTag($id_product)),
                    'stproductcomments_url' => $this->context->link->getModuleLink('stproductcomments','mycomments', 
                        array('id_order'=>$id_order, 'id_product'=>$id_product, 'secure_key'=>$this->secure_key)
                    ),
                ));
                $this->context->smarty->assign(array(
                    //'is_commented' => StProductCommentClass::isCommented($this->context->customer->id, $order_array['product']['id_order_detail'], $id_product),
                    'criterions' => StProductCommentCriterionClass::getCriterions($this->context->language->id, true),
                    'upload_image' => Configuration::get($this->_prefix_st.'UPLOAD_IMAGE'),
                    'g_recaptcha' => Configuration::get($this->_prefix_st.'GOOGLE_RECAPTCHA'),
                    'g_recaptcha_key' => Configuration::get($this->_prefix_st.'RECAPTCHA_SITE_KEY'),
                ));
                $this->setTemplate('module:stproductcomments/views/templates/front/addcomment.tpl');    
            } else {
                $resultsPerPage = (int)Tools::getValue('resultsPerPage');
                $page = max((int)Tools::getValue('page'), 1);
                $resultsPerPage = $resultsPerPage ? $resultsPerPage : 10;
                $replies_total = StProductCommentClass::getReplies($comment['id_st_product_comment'], $moderate, null, null, true);
                $replies = StProductCommentClass::getReplies($comment['id_st_product_comment'], $moderate, $page, $resultsPerPage);
                $this->context->smarty->assign(array(
                    'replies' => $replies,
                    'pagination' => $this->getTemplateVarPagination($replies_total, $page, $resultsPerPage),
                ));
                
                $this->setTemplate('module:stproductcomments/views/templates/front/mycomments.tpl');
            }
            
        } else {
            $cusomer_orders = Order::getCustomerOrders($this->context->customer->id);
            $order_presenter = new OrderPresenter();
            foreach($cusomer_orders AS &$customer_order) {
                $order = new Order((int)$customer_order['id_order']);
                $customer_order['detail'] = $order_presenter->present($order);
                if (isset($customer_order['detail']['products'])) {
                    foreach($customer_order['detail']['products'] AS $k => $v) {
                        $customer_order['detail']['products'][$k]['st_product_comment'] = StProductCommentClass::getByOrderProduct(
                            $this->context->customer->id,
                            $v['id_order_detail'],
                            $v['id_product']
                        );
                        $customer_order['detail']['products'][$k]['order_approved'] = StProductCommentClass::getOrderInfo(
                            $this->context->customer->id,
                            $v['id_product'],
                            true,
                            $v['id_order_detail']
                        );
                    }
                }
            }
            $this->context->smarty->assign(array(
                'logged' => $this->context->customer->isLogged(true),
                'secure_key' => $this->secure_key,
                'orders' => $cusomer_orders,
            ));
    		$this->setTemplate('module:stproductcomments/views/templates/front/mycomments.tpl');
        }
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
            'title' => $this->trans('Product comments', array(), 'Shop.Theme.Transformer'),
            'url' => $this->context->link->getModuleLink('stproductcomments', 'list'),
        );
        return $breadcrumb;
    }
}
