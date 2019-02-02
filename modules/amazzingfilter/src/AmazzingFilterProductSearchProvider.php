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

use PrestaShop\PrestaShop\Core\Product\Search\Pagination;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchProviderInterface;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchResult;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

class AmazzingFilterProductSearchProvider implements ProductSearchProviderInterface
{
    public function __construct($module)
    {
        $this->module = $module;
        $this->context = Context::getContext();
    }

    private function getAvailableSortOrders()
    {
        $sorted_options = array();
        $current_option = 'product.'.$this->context->filtered_result['sorting'];
        $options = $this->module->getSortingOptions($current_option);
        foreach ($options as $opt) {
            $sorted_options[] = (new SortOrder($opt['entity'], $opt['field'], $opt['direction']))
            ->setLabel($opt['label']);
        }
        return $sorted_options;
    }

    public function runQuery(
        ProductSearchContext $context,
        ProductSearchQuery $query
    ) {
        $products = $this->context->filtered_result['products'];
        $total = $this->context->filtered_result['total'];
        $sorting_options = $this->getAvailableSortOrders();
        $result = new ProductSearchResult();
        $result->setProducts($products)->setTotalProductsCount($total)->setAvailableSortOrders($sorting_options);
        if (!empty($this->context->forced_sorting)) {
            $so = new SortOrder('product', $this->context->forced_sorting['by'], $this->context->forced_sorting['way']);
            $query->setSortOrder($so);
        }
        // $query
        //     ->setQueryType('products')
        //     ->setSortOrder(new SortOrder('product', 'date_add', 'desc'))
        // ;
        return $result;
    }

    public function getPaginationVariables($page, $products_num, $products_per_page, $pages_nb, $current_url)
    {
        $pagination = new Pagination();
        $pagination->setPage($page)->setPagesCount($pages_nb);
        $from = ($products_per_page * ($page - 1)) + 1;
        $to = $products_per_page * $page;
        $pages = $pagination->buildLinks();
        $page_txt = $this->module->page_link_rewrite_text;
        foreach ($pages as &$p) {
            $p['url'] = $this->module->updateQueryString($current_url, array($page_txt => $p['page']));
        }
        return array(
            'total_items' => $products_num,
            'items_shown_from' => $from,
            'items_shown_to' => ($to <= $products_num) ? $to : $products_num,
            'pages' => $pages,
            // Compare to 3 because there are the next and previous links
            'should_be_displayed' => (count($pages) > 3),
        );
    }
}
