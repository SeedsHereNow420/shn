<?php

class AuthController extends AuthControllerCore
{
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

