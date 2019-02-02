<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/addons/log')) {
            // admin_addons_login
            if ($pathinfo === '/addons/login') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_admin_addons_login;
                }

                return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AddonsController::loginAction',  '_route' => 'admin_addons_login',);
            }
            not_admin_addons_login:

            // admin_addons_logout
            if ($pathinfo === '/addons/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_addons_logout;
                }

                return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AddonsController::logoutAction',  '_route' => 'admin_addons_logout',);
            }
            not_admin_addons_logout:

        }

        if (0 === strpos($pathinfo, '/product')) {
            if (0 === strpos($pathinfo, '/product/catalog')) {
                // admin_product_catalog
                if (preg_match('#^/product/catalog(?:/(?P<offset>last|\\d+)(?:/(?P<limit>_limit|last|\\d+)(?:/(?P<orderBy>last|id_product|name|reference|name_category|price|sav_quantity|position|active|position_ordering)(?:/(?P<sortOrder>last|asc|desc))?)?)?)?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_admin_product_catalog;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_catalog')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::catalogAction',  '_legacy_controller' => 'AdminProducts',  'limit' => 'last',  'offset' => 0,  'orderBy' => 'last',  'sortOrder' => 'desc',));
                }
                not_admin_product_catalog:

                // admin_product_catalog_filters
                if (0 === strpos($pathinfo, '/product/catalog_filters') && preg_match('#^/product/catalog_filters(?:/(?P<quantity>none|<=\\d+|<\\d+|>\\d+|>=\\d+)(?:/(?P<active>none|1|0))?)?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_product_catalog_filters;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_catalog_filters')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::catalogFiltersAction',  '_legacy_controller' => 'AdminProducts',  'quantity' => 'none',  'active' => 'none',));
                }
                not_admin_product_catalog_filters:

            }

            // admin_product_list
            if (0 === strpos($pathinfo, '/product/list') && preg_match('#^/product/list(?:/(?P<offset>last|\\d+)(?:/(?P<limit>_limit|last|\\d+)(?:/(?P<orderBy>last|id_product|name|reference|name_category|price|sav_quantity|position|active|position_ordering)(?:/(?P<sortOrder>last|asc|desc)(?:/(?P<view>full|quicknav))?)?)?)?)?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_product_list;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_list')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::listAction',  'limit' => 'last',  'offset' => 0,  'orderBy' => 'last',  'sortOrder' => 'last',  'view' => 'full',));
            }
            not_admin_product_list:

            // admin_product_new
            if ($pathinfo === '/product/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_product_new;
                }

                return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::newAction',  '_route' => 'admin_product_new',);
            }
            not_admin_product_new:

            // admin_product_form
            if (0 === strpos($pathinfo, '/product/form') && preg_match('#^/product/form/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_admin_product_form;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_form')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::formAction',  '_legacy_controller' => 'AdminProducts',  '_legacy_param_mapper_class' => 'PrestaShop\\PrestaShop\\Adapter\\Product\\AdminProductDataProvider',  '_legacy_param_mapper_method' => 'mapLegacyParametersProductForm',));
            }
            not_admin_product_form:

            // admin_product_use_legacy_setter
            if (0 === strpos($pathinfo, '/product/uselegacy') && preg_match('#^/product/uselegacy/(?P<use>0|1)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_admin_product_use_legacy_setter;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_use_legacy_setter')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::shouldUseLegacyPagesAction',));
            }
            not_admin_product_use_legacy_setter:

            // admin_product_bulk_action
            if (0 === strpos($pathinfo, '/product/bulk') && preg_match('#^/product/bulk/(?P<action>activate_all|deactivate_all|delete_all|duplicate_all)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_admin_product_bulk_action;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_bulk_action')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::bulkAction',));
            }
            not_admin_product_bulk_action:

            // admin_product_unit_action
            if (0 === strpos($pathinfo, '/product/unit') && preg_match('#^/product/unit/(?P<action>delete|duplicate|activate|deactivate)/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('POST', 'GET', 'HEAD'));
                    goto not_admin_product_unit_action;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_unit_action')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::unitAction',));
            }
            not_admin_product_unit_action:

            // admin_product_mass_edit_action
            if (0 === strpos($pathinfo, '/product/massedit') && preg_match('#^/product/massedit/(?P<action>sort)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_admin_product_mass_edit_action;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_mass_edit_action')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::massEditAction',));
            }
            not_admin_product_mass_edit_action:

            // admin_product_export_action
            if (0 === strpos($pathinfo, '/product/export') && preg_match('#^/product/export(?:\\.(?P<_format>csv))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_product_export_action;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_export_action')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::exportAction',  '_format' => 'csv',));
            }
            not_admin_product_export_action:

            if (0 === strpos($pathinfo, '/product/product')) {
                if (0 === strpos($pathinfo, '/product/product/virtual')) {
                    // admin_product_virtual_save_action
                    if (0 === strpos($pathinfo, '/product/product/virtual/form/save') && preg_match('#^/product/product/virtual/form/save(?:/(?P<idProduct>\\d+))?$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_admin_product_virtual_save_action;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_virtual_save_action')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\VirtualProductController::saveAction',  'idProduct' => 0,));
                    }
                    not_admin_product_virtual_save_action:

                    if (0 === strpos($pathinfo, '/product/product/virtual/remove')) {
                        // admin_product_virtual_remove_file_action
                        if (0 === strpos($pathinfo, '/product/product/virtual/remove/file') && preg_match('#^/product/product/virtual/remove/file(?:/(?P<idProduct>\\d+))?$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_virtual_remove_file_action')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\VirtualProductController::removeFileAction',  'idProduct' => 0,));
                        }

                        // admin_product_virtual_remove_action
                        if (preg_match('#^/product/product/virtual/remove(?:/(?P<idProduct>\\d+))?$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_virtual_remove_action')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\VirtualProductController::removeAction',  'idProduct' => 0,));
                        }

                    }

                }

                // admin_product_attachement_add_action
                if (0 === strpos($pathinfo, '/product/product/attachment/form/add') && preg_match('#^/product/product/attachment/form/add(?:/(?P<idProduct>\\d+))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_product_attachement_add_action;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_attachement_add_action')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttachementProductController::addAction',  'idProduct' => 0,));
                }
                not_admin_product_attachement_add_action:

                if (0 === strpos($pathinfo, '/product/product/image')) {
                    // admin_product_image_upload
                    if (0 === strpos($pathinfo, '/product/product/image/upload') && preg_match('#^/product/product/image/upload(?:/(?P<idProduct>\\d+))?$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_admin_product_image_upload;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_image_upload')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductImageController::uploadImageAction',  'idProduct' => 0,));
                    }
                    not_admin_product_image_upload:

                    // admin_product_image_positions
                    if ($pathinfo === '/product/product/image/positions') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_admin_product_image_positions;
                        }

                        return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductImageController::updateImagePositionAction',  '_route' => 'admin_product_image_positions',);
                    }
                    not_admin_product_image_positions:

                    // admin_product_image_form
                    if (0 === strpos($pathinfo, '/product/product/image/form') && preg_match('#^/product/product/image/form(?:/(?P<idImage>\\d+))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_image_form')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductImageController::formAction',  'idImage' => 0,));
                    }

                    // admin_product_image_delete
                    if (0 === strpos($pathinfo, '/product/product/image/delete') && preg_match('#^/product/product/image/delete(?:/(?P<idImage>\\d+))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_product_image_delete')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductImageController::deleteAction',  'idImage' => 0,));
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/c')) {
            if (0 === strpos($pathinfo, '/combination')) {
                // admin_combination_generate_form
                if (preg_match('#^/combination(?:/(?P<combinationIds>[^/]++))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_combination_generate_form;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_combination_generate_form')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CombinationController::generateCombinationFormAction',  'combinationIds' => 0,));
                }
                not_admin_combination_generate_form:

                // admin_get_product_combinations
                if (0 === strpos($pathinfo, '/combination/product-combinations') && preg_match('#^/combination/product\\-combinations(?:/(?P<idProduct>\\d+))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_get_product_combinations;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_get_product_combinations')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CombinationController::getProductCombinationsAction',  '_format' => 'json',  'idProduct' => 0,));
                }
                not_admin_get_product_combinations:

            }

            if (0 === strpos($pathinfo, '/category')) {
                // admin_category_simple_add_form
                if ($pathinfo === '/category/form/add/simple') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_category_simple_add_form;
                    }

                    return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CategoryController::addSimpleCategoryFormAction',  '_route' => 'admin_category_simple_add_form',);
                }
                not_admin_category_simple_add_form:

                // admin_get_ajax_categories
                if (0 === strpos($pathinfo, '/category/getList') && preg_match('#^/category/getList(?:/(?P<limit>\\d+))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_get_ajax_categories;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_get_ajax_categories')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CategoryController::getAjaxCategoriesAction',  '_format' => 'json',  'limit' => 20,));
                }
                not_admin_get_ajax_categories:

            }

        }

        // admin_feature_get_feature_values
        if (0 === strpos($pathinfo, '/feature/get-feature-values') && preg_match('#^/feature/get\\-feature\\-values(?:/(?P<idFeature>\\d+))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_admin_feature_get_feature_values;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_feature_get_feature_values')), array (  'idFeature' => 0,  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\FeatureController::getFeatureValuesAction',));
        }
        not_admin_feature_get_feature_values:

        if (0 === strpos($pathinfo, '/module')) {
            if (0 === strpos($pathinfo, '/module/ca')) {
                // admin_module_cart
                if (0 === strpos($pathinfo, '/module/cart') && preg_match('#^/module/cart/(?P<moduleId>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_module_cart;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_module_cart')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ModuleController::getModuleCartAction',));
                }
                not_admin_module_cart:

                if (0 === strpos($pathinfo, '/module/catalog')) {
                    // admin_module_catalog
                    if ($pathinfo === '/module/catalog') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_admin_module_catalog;
                        }

                        return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ModuleController::catalogAction',  '_legacy_controller' => 'AdminModules',  '_route' => 'admin_module_catalog',);
                    }
                    not_admin_module_catalog:

                    if (0 === strpos($pathinfo, '/module/catalog/re')) {
                        // admin_module_catalog_refresh
                        if (0 === strpos($pathinfo, '/module/catalog/refresh') && preg_match('#^/module/catalog/refresh(?:/(?P<category>[^/]++)(?:/(?P<keyword>[^/]++))?)?$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_admin_module_catalog_refresh;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_module_catalog_refresh')), array (  'category' => NULL,  'keyword' => NULL,  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ModuleController::refreshCatalogAction',  '_legacy_controller' => 'AdminModules',));
                        }
                        not_admin_module_catalog_refresh:

                        // admin_module_catalog_post
                        if ($pathinfo === '/module/catalog/recommended') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_admin_module_catalog_post;
                            }

                            return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ModuleController::getPreferredModulesAction',  '_legacy_controller' => 'AdminModules',  '_route' => 'admin_module_catalog_post',);
                        }
                        not_admin_module_catalog_post:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/module/manage')) {
                // admin_module_manage
                if (preg_match('#^/module/manage(?:/(?P<category>[^/]++)(?:/(?P<keyword>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_module_manage;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_module_manage')), array (  'category' => NULL,  'keyword' => NULL,  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ModuleController::manageAction',  '_legacy_controller' => 'AdminModules',));
                }
                not_admin_module_manage:

                if (0 === strpos($pathinfo, '/module/manage/action')) {
                    // admin_module_manage_action
                    if (preg_match('#^/module/manage/action/(?P<action>install|uninstall|enable|disable|enable_mobile|disable_mobile|reset|upgrade)/(?P<module_name>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_admin_module_manage_action;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_module_manage_action')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ModuleController::moduleAction',));
                    }
                    not_admin_module_manage_action:

                    // admin_module_configure_action
                    if (0 === strpos($pathinfo, '/module/manage/action/configure') && preg_match('#^/module/manage/action/configure/(?P<module_name>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_admin_module_configure_action;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_module_configure_action')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ModuleController::configureModuleAction',  '_legacy_controller' => 'AdminModules',));
                    }
                    not_admin_module_configure_action:

                }

                // admin_module_manage_action_bulk
                if (0 === strpos($pathinfo, '/module/manage/bulk') && preg_match('#^/module/manage/bulk/(?P<action>install|uninstall|configure|enable|disable|reset|upgrade)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_module_manage_action_bulk;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_module_manage_action_bulk')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ModuleController::moduleAction',));
                }
                not_admin_module_manage_action_bulk:

                // admin_module_manage_update_all
                if ($pathinfo === '/module/manage/update/all') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_module_manage_update_all;
                    }

                    return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ModuleController::moduleAction',  '_route' => 'admin_module_manage_update_all',);
                }
                not_admin_module_manage_update_all:

            }

            // admin_module_import
            if ($pathinfo === '/module/import') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_admin_module_import;
                }

                return array (  'module_name' => NULL,  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ModuleController::importModuleAction',  '_route' => 'admin_module_import',);
            }
            not_admin_module_import:

            // admin_module_notification
            if ($pathinfo === '/module/notifications') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_module_notification;
                }

                return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ModuleController::notificationAction',  '_legacy_controller' => 'AdminModules',  '_route' => 'admin_module_notification',);
            }
            not_admin_module_notification:

        }

        if (0 === strpos($pathinfo, '/attribute')) {
            if (0 === strpos($pathinfo, '/attribute/ge')) {
                // admin_attribute_get_all
                if ($pathinfo === '/attribute/get-all') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_attribute_get_all;
                    }

                    return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttributeController::getAllAttributesAction',  '_format' => 'json',  '_route' => 'admin_attribute_get_all',);
                }
                not_admin_attribute_get_all:

                // admin_attribute_generator
                if ($pathinfo === '/attribute/generator') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_attribute_generator;
                    }

                    return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttributeController::attributesGeneratorAction',  '_route' => 'admin_attribute_generator',);
                }
                not_admin_attribute_generator:

            }

            // admin_delete_attribute
            if (preg_match('#^/attribute/(?P<idProduct>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_admin_delete_attribute;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_attribute')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttributeController::deleteAttributeAction',));
            }
            not_admin_delete_attribute:

            // admin_delete_all_attributes
            if (0 === strpos($pathinfo, '/attribute/delete-all') && preg_match('#^/attribute/delete\\-all(?:/(?P<idProduct>\\d+))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_delete_all_attributes;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_all_attributes')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttributeController::deleteAllAttributeAction',  'idProduct' => 0,));
            }
            not_admin_delete_all_attributes:

            // admin_get_form_images_combination
            if (0 === strpos($pathinfo, '/attribute/product-form-images') && preg_match('#^/attribute/product\\-form\\-images(?:/(?P<idProduct>\\d+))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_get_form_images_combination;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_get_form_images_combination')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttributeController::getFormImagesAction',  '_format' => 'json',  'idProduct' => 0,));
            }
            not_admin_get_form_images_combination:

        }

        if (0 === strpos($pathinfo, '/s')) {
            if (0 === strpos($pathinfo, '/specific-price')) {
                // admin_specific_price_list
                if (0 === strpos($pathinfo, '/specific-price/list') && preg_match('#^/specific\\-price/list(?:/(?P<idProduct>\\d+))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_specific_price_list;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_specific_price_list')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SpecificPriceController::listAction',  '_format' => 'json',  'idProduct' => 0,));
                }
                not_admin_specific_price_list:

                // admin_specific_price_add
                if ($pathinfo === '/specific-price/add') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_specific_price_add;
                    }

                    return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SpecificPriceController::addAction',  '_route' => 'admin_specific_price_add',);
                }
                not_admin_specific_price_add:

                // admin_delete_specific_price
                if (0 === strpos($pathinfo, '/specific-price/delete') && preg_match('#^/specific\\-price/delete(?:/(?P<idSpecificPrice>\\d+))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_delete_specific_price;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_specific_price')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SpecificPriceController::deleteAction',  'idSpecificPrice' => 0,));
                }
                not_admin_delete_specific_price:

            }

            // admin_supplier_refresh_product_supplier_combination_form
            if (0 === strpos($pathinfo, '/supplier/refresh-product-supplier-combination-form') && preg_match('#^/supplier/refresh\\-product\\-supplier\\-combination\\-form(?:/(?P<idProduct>\\d+)(?:/(?P<supplierIds>[^/]++))?)?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_supplier_refresh_product_supplier_combination_form;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_supplier_refresh_product_supplier_combination_form')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SupplierController::refreshProductSupplierCombinationFormAction',  'supplierIds' => 0,  'idProduct' => 0,));
            }
            not_admin_supplier_refresh_product_supplier_combination_form:

        }

        // admin_warehouse_refresh_product_warehouse_combination_form
        if (0 === strpos($pathinfo, '/warehouse/refresh-product-warehouse-combination-form') && preg_match('#^/warehouse/refresh\\-product\\-warehouse\\-combination\\-form(?:/(?P<idProduct>\\d+))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_admin_warehouse_refresh_product_warehouse_combination_form;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_warehouse_refresh_product_warehouse_combination_form')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\WarehouseController::refreshProductWarehouseCombinationFormAction',  'idProduct' => 0,));
        }
        not_admin_warehouse_refresh_product_warehouse_combination_form:

        if (0 === strpos($pathinfo, '/international/translations')) {
            // admin_international_translation_overview
            if ($pathinfo === '/international/translations') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_international_translation_overview;
                }

                return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::overviewAction',  '_route' => 'admin_international_translation_overview',);
            }
            not_admin_international_translation_overview:

            // admin_international_translations_list
            if ($pathinfo === '/international/translations/list') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_admin_international_translations_list;
                }

                return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::listAction',  '_legacy_controller' => 'AdminTranslations',  '_route' => 'admin_international_translations_list',);
            }
            not_admin_international_translations_list:

            // admin_international_translations_module
            if ($pathinfo === '/international/translations/module') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_admin_international_translations_module;
                }

                return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::moduleAction',  '_route' => 'admin_international_translations_module',);
            }
            not_admin_international_translations_module:

            // admin_international_translations_export_theme
            if ($pathinfo === '/international/translations/export') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_admin_international_translations_export_theme;
                }

                return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::exportThemeAction',  '_legacy_controller' => 'AdminTranslations',  '_route' => 'admin_international_translations_export_theme',);
            }
            not_admin_international_translations_export_theme:

        }

        if (0 === strpos($pathinfo, '/s')) {
            // admin_security_compromised
            if ($pathinfo === '/security/compromised') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_security_compromised;
                }

                return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SecurityController::compromisedAccessAction',  '_route' => 'admin_security_compromised',);
            }
            not_admin_security_compromised:

            if (0 === strpos($pathinfo, '/stock')) {
                // admin_stock_overview
                if (rtrim($pathinfo, '/') === '/stock') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_stock_overview;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_stock_overview');
                    }

                    return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\StockController::overviewAction',  '_route' => 'admin_stock_overview',);
                }
                not_admin_stock_overview:

                // admin_stock_movements_overview
                if ($pathinfo === '/stock/movements') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_admin_stock_movements_overview;
                    }

                    return array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\StockController::overviewAction',  '_route' => 'admin_stock_movements_overview',);
                }
                not_admin_stock_movements_overview:

            }

        }

        if (0 === strpos($pathinfo, '/common')) {
            // admin_common_pagination
            if (0 === strpos($pathinfo, '/common/pagination') && preg_match('#^/common/pagination(?:/(?P<offset>\\d+)(?:/(?P<limit>\\d+)(?:/(?P<total>\\d+)(?:/(?P<view>full|quicknav))?)?)?)?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_common_pagination;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_common_pagination')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::paginationAction',  'offset' => 0,  'limit' => 20,  'total' => 0,  'view' => 'full',));
            }
            not_admin_common_pagination:

            // admin_common_recommended_modules
            if (0 === strpos($pathinfo, '/common/recommended_modules') && preg_match('#^/common/recommended_modules/(?P<domain>[^/]++)(?:/(?P<limit>\\d+)(?:/(?P<randomize>0|1))?)?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_common_recommended_modules;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_common_recommended_modules')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::recommendedModulesAction',  'limit' => 0,  'randomize' => 0,));
            }
            not_admin_common_recommended_modules:

            // admin_common_sidebar
            if (0 === strpos($pathinfo, '/common/sidebar') && preg_match('#^/common/sidebar/(?P<url>[^/]++)(?:/(?P<title>[^/]++)(?:/(?P<footer>[^/]++))?)?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admin_common_sidebar;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_common_sidebar')), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::renderSidebarAction',  'title' => '',  'footer' => '',));
            }
            not_admin_common_sidebar:

        }

        if (0 === strpos($pathinfo, '/api')) {
            if (0 === strpos($pathinfo, '/api/stock')) {
                // api_stock_list_products
                if ($pathinfo === '/api/stock') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_stock_list_products;
                    }

                    return array (  '_controller' => 'prestashop.core.api.stock.controller:listProductsAction',  '_route' => 'api_stock_list_products',);
                }
                not_api_stock_list_products:

                // api_stock_list_product_combinations
                if (preg_match('#^/api/stock/(?P<productId>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_stock_list_product_combinations;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_stock_list_product_combinations')), array (  '_controller' => 'prestashop.core.api.stock.controller:listProductsAction',));
                }
                not_api_stock_list_product_combinations:

                if (0 === strpos($pathinfo, '/api/stock/product')) {
                    // api_stock_edit_product
                    if (preg_match('#^/api/stock/product/(?P<productId>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_stock_edit_product;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_stock_edit_product')), array (  '_controller' => 'prestashop.core.api.stock.controller:editProductAction',));
                    }
                    not_api_stock_edit_product:

                    // api_stock_edit_product_combination
                    if (preg_match('#^/api/stock/product/(?P<productId>\\d+)/combination/(?P<combinationId>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_stock_edit_product_combination;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_stock_edit_product_combination')), array (  '_controller' => 'prestashop.core.api.stock.controller:editProductAction',));
                    }
                    not_api_stock_edit_product_combination:

                    // api_stock_bulk_edit_products
                    if ($pathinfo === '/api/stock/products') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_stock_bulk_edit_products;
                        }

                        return array (  '_controller' => 'prestashop.core.api.stock.controller:bulkEditProductsAction',  '_route' => 'api_stock_bulk_edit_products',);
                    }
                    not_api_stock_bulk_edit_products:

                }

            }

            if (0 === strpos($pathinfo, '/api/movements')) {
                // api_stock_list_movements
                if ($pathinfo === '/api/movements') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_stock_list_movements;
                    }

                    return array (  '_controller' => 'prestashop.core.api.stockMovement.controller:listMovementsAction',  '_route' => 'api_stock_list_movements',);
                }
                not_api_stock_list_movements:

                // api_stock_product_list_movements
                if (0 === strpos($pathinfo, '/api/movements/product') && preg_match('#^/api/movements/product/(?P<productId>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_stock_product_list_movements;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_stock_product_list_movements')), array (  '_controller' => 'prestashop.core.api.stockMovement.controller:listMovementsAction',));
                }
                not_api_stock_product_list_movements:

                // api_stock_list_movements_employees
                if ($pathinfo === '/api/movements/employees') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_stock_list_movements_employees;
                    }

                    return array (  '_controller' => 'prestashop.core.api.stockMovement.controller:listMovementsEmployeesAction',  '_route' => 'api_stock_list_movements_employees',);
                }
                not_api_stock_list_movements_employees:

                // api_stock_list_movements_types
                if ($pathinfo === '/api/movements/types') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_stock_list_movements_types;
                    }

                    return array (  '_controller' => 'prestashop.core.api.stockMovement.controller:listMovementsTypesAction',  '_route' => 'api_stock_list_movements_types',);
                }
                not_api_stock_list_movements_types:

            }

            // api_stock_list_suppliers
            if ($pathinfo === '/api/suppliers') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_stock_list_suppliers;
                }

                return array (  '_controller' => 'prestashop.core.api.supplier.controller:listSuppliersAction',  '_route' => 'api_stock_list_suppliers',);
            }
            not_api_stock_list_suppliers:

            // api_stock_list_manufacturers
            if ($pathinfo === '/api/manufacturers') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_stock_list_manufacturers;
                }

                return array (  '_controller' => 'prestashop.core.api.manufacturer.controller:listManufacturersAction',  '_route' => 'api_stock_list_manufacturers',);
            }
            not_api_stock_list_manufacturers:

            // api_stock_list_categories
            if ($pathinfo === '/api/categories') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_stock_list_categories;
                }

                return array (  '_controller' => 'prestashop.core.api.category.controller:listCategoriesAction',  '_route' => 'api_stock_list_categories',);
            }
            not_api_stock_list_categories:

            // api_stock_list_attributes
            if ($pathinfo === '/api/attributes') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_stock_list_attributes;
                }

                return array (  '_controller' => 'prestashop.core.api.attribute.controller:listAttributesAction',  '_route' => 'api_stock_list_attributes',);
            }
            not_api_stock_list_attributes:

            // api_stock_list_features
            if ($pathinfo === '/api/features') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_stock_list_features;
                }

                return array (  '_controller' => 'prestashop.core.api.feature.controller:listFeaturesAction',  '_route' => 'api_stock_list_features',);
            }
            not_api_stock_list_features:

            // api_i18n_translations_list
            if (0 === strpos($pathinfo, '/api/i18n') && preg_match('#^/api/i18n/(?P<page>\\w+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_i18n_translations_list;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_i18n_translations_list')), array (  '_controller' => 'prestashop.core.api.i18n.controller:listTranslationAction',));
            }
            not_api_i18n_translations_list:

            if (0 === strpos($pathinfo, '/api/translation')) {
                // api_translation_domains_tree
                if (0 === strpos($pathinfo, '/api/translation/tree') && preg_match('#^/api/translation/tree/(?P<lang>[^/]++)/(?P<type>[^/]++)(?:/(?P<selected>[^/]++))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_translation_domains_tree;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_translation_domains_tree')), array (  '_controller' => 'prestashop.core.api.translation.controller:listTreeAction',  'selected' => NULL,));
                }
                not_api_translation_domains_tree:

                // api_translation_domain_catalog
                if (preg_match('#^/api/translation/(?P<locale>[^/]++)/(?P<domain>[^/]++)(?:/(?P<theme>[^/]++))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_translation_domain_catalog;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_translation_domain_catalog')), array (  '_controller' => 'prestashop.core.api.translation.controller:listDomainTranslationAction',  'theme' => NULL,));
                }
                not_api_translation_domain_catalog:

                // api_translation_value_edit
                if ($pathinfo === '/api/translation/edit') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_translation_value_edit;
                    }

                    return array (  '_controller' => 'prestashop.core.api.translation.controller:translationEditAction',  '_route' => 'api_translation_value_edit',);
                }
                not_api_translation_value_edit:

                // api_translation_value_reset
                if ($pathinfo === '/api/translation/reset') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_translation_value_reset;
                    }

                    return array (  '_controller' => 'prestashop.core.api.translation.controller:translationResetAction',  '_route' => 'api_translation_value_reset',);
                }
                not_api_translation_value_reset:

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
