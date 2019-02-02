<?php
class AuthController extends AuthControllerCore
{
    /*
    * module: stoverride
    * date: 2017-12-03 17:34:35
    * version: 1.0.0
    */
    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();
        $breadcrumb['links'][] = [
            'title' => $this->trans('Account', array(), 'Shop.Theme.Transformer'),
            'url' => $this->context->link->getPageLink('authentication'),
        ];
        return $breadcrumb;
    }
}
