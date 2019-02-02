<?php

class SearchController extends SearchControllerCore
{
    protected function doProductSearch($template, $params = array(), $locale = null)
    {
        if ($this->ajax) {
            ob_end_clean();
            header('Content-Type: application/json');
            $variables = $this->getAjaxProductSearchVariables();
            if(Tools::getValue('is_ajax_search'))
            {
                $products = array();
                foreach ($variables['products'] as $v) {
                    $products[] = array(
                            'link' => $v['link'],
                            'name' => $v['name'],
                            'has_discount' => $v['has_discount'],
                            'regular_price' => $v['regular_price'],
                            'price' => $v['price'],
                            'cover' => array(
                                'bySize' => array(
                                    'small_default' => $v['cover']['bySize']['small_default'],
                                    ),
                                ),
                        );
                }
                $variables = array(
                    'products' => $products,
                    );
            }
            $this->ajaxDie(json_encode($variables));
        } else {
            $variables = $this->getProductSearchVariables();
            $this->context->smarty->assign(array(
                'listing' => $variables,
            ));
            $this->setTemplate($template, $params, $locale);
        }
    }
}

