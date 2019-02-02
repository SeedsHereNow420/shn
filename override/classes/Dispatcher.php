<?php
/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */
class Dispatcher extends DispatcherCore
{
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
    public function getRoutes()
    {
        return $this->routes;
    }
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
    public function getRequestUri()
    {
        return $this->request_uri;
    }
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
    protected function loadRoutes($id_shop = null)
    {
        parent::loadRoutes($id_shop);
        if (Module::isEnabled('fsadvancedurl')) {
            $fsau = Module::getInstanceByName('fsadvancedurl');
            $this->routes = $fsau->dispatcherLoadRoutes($this->routes, $this);
        }
    }
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
    protected function setRequestUri()
    {
        parent::setRequestUri();
        $remove_enabled = Configuration::get('FSAU_REMOVE_DEFAULT_LANG');
        $current_iso_lang = Tools::getValue('isolang');
        if ($this->use_routes && Language::isMultiLanguageActivated() && !$current_iso_lang && $remove_enabled) {
            $_GET['isolang'] = Language::getIsoById(Configuration::get('PS_LANG_DEFAULT'));
        }
    }
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
    public function getController($id_shop = null)
    {
        if (defined('_PS_ADMIN_DIR_')) {
            $_GET['controllerUri'] = Tools::getvalue('controller');
        }
        if ($this->controller) {
            $_GET['controller'] = $this->controller;
            return $this->controller;
        }
        if (isset(Context::getContext()->shop) && $id_shop === null) {
            $id_shop = (int)Context::getContext()->shop->id;
        }
        $id_lang = Context::getContext()->language->id;
        $controller = Tools::getValue('controller');
        if (isset($controller) && is_string($controller) &&
            preg_match('/^([0-9a-z_-]+)\?(.*)=(.*)$/Ui', $controller, $m)) {
            $controller = $m[1];
            if (isset($_GET['controller'])) {
                $_GET[$m[2]] = $m[3];
            } elseif (isset($_POST['controller'])) {
                $_POST[$m[2]] = $m[3];
            }
        }
        if (!Validate::isControllerName($controller)) {
            $controller = false;
        }
        if ($this->use_routes && !$controller && !defined('_PS_ADMIN_DIR_')) {
            if (!$this->request_uri) {
                return Tools::strtolower($this->controller_not_found);
            }
            $controller = $this->controller_not_found;
            $test_request_uri = preg_replace('/(=http:\/\/)/', '=', $this->request_uri);
            if (!preg_match('/\.(gif|jpe?g|png|css|js|ico)$/i', parse_url($test_request_uri, PHP_URL_PATH))) {
                if ($this->empty_route) {
                    $this->addRoute(
                        $this->empty_route['routeID'],
                        $this->empty_route['rule'],
                        $this->empty_route['controller'],
                        $id_lang,
                        array(),
                        array(),
                        $id_shop
                    );
                }
                list($uri) = explode('?', $this->request_uri);
                if (Tools::file_exists_cache(_PS_ROOT_DIR_.$uri)) {
                    return $controller;
                }
                if (isset($this->routes[$id_shop][$id_lang])) {
                    $maybe_matched = array();
                    $last_checked_route = array();
                    foreach ($this->routes[$id_shop][$id_lang] as $route_id => $route) {
                        if (preg_match($route['regexp'], $uri, $m)) {
                            if (Module::isEnabled('fsadvancedurl')) {
                                $fsau = Module::getInstanceByName('fsadvancedurl');
                                if ($fsau->isHandleRoute($route_id)) {
                                    $m = $fsau->fixRegexResult($m);
                                    $debug_data = array('m' => $m, 'route' => $route);
                                    $pre_dispatcher = $fsau->getRoutePreDispatcher($route_id);
                                    if ($pre_dispatcher &&
                                        Tools::isCallable(array(
                                            $pre_dispatcher['module'],
                                            $pre_dispatcher['function']
                                        ))) {
                                        $info_module_pre_dispatcher = call_user_func(array(
                                            $pre_dispatcher['module'],
                                            $pre_dispatcher['function']
                                        ), $uri, $route_id, $route, $m, $id_lang, $id_shop);
                                        $info = $fsau->getPreDispatcherDefaultResponse();
                                        if (is_array($info_module_pre_dispatcher)) {
                                            $info = array_merge($info, $info_module_pre_dispatcher);
                                        }
                                        $debug_data['pre_dispatch_info'] = $info;
                                        $debug_data['pre_dispatcher'] = get_class($pre_dispatcher['module']).'::';
                                        $debug_data['pre_dispatcher'] .= $pre_dispatcher['function'];
                                    } else {
                                        $info = $fsau->preDispatch($uri, $route_id, $route, $m, $id_lang, $id_shop);
                                        $debug_data['pre_dispatch_info'] = $info;
                                    }
                                    $fsau->debug_data['checked_routes'][$route_id] = $debug_data;
                                    $last_checked_route = array(
                                        'route_name' => $route_id,
                                        'm' => $m,
                                        'route' => $route,
                                        'use_when_maybe' => $info['use_when_maybe']
                                    );
                                    if ($info['is_matched_controller']) {
                                        if ($info['id'] && $info['property']) {
                                            $_GET[$info['property']] = $info['id'];
                                        }
                                    } else {
                                        if ($info['maybe_matched_controller']) {
                                            $maybe_matched[$route_id] = array(
                                                'm' => $m,
                                                'route' => $route,
                                                'use_when_maybe' => $info['use_when_maybe']
                                            );
                                        }
                                        continue;
                                    }
                                }
                            }
                            $maybe_matched = array();
                            $last_checked_route = array();
                            foreach ($m as $k => $v) {
                                if (!is_numeric($k)) {
                                    $_GET[$k] = $v;
                                }
                            }
                            $controller = $route['controller'] ? $route['controller'] : $_GET['controller'];
                            if (!empty($route['params'])) {
                                foreach ($route['params'] as $k => $v) {
                                    $_GET[$k] = $v;
                                }
                            }
                            if (preg_match('#module-([a-z0-9_-]+)-([a-z0-9_]+)$#i', $controller, $m)) {
                                $_GET['module'] = $m[1];
                                $_GET['fc'] = 'module';
                                $controller = $m[2];
                            }
                            if (isset($_GET['fc']) && $_GET['fc'] == 'module') {
                                $this->front_controller = self::FC_MODULE;
                            }
                            break;
                        }
                    }
                    if (!$maybe_matched && $last_checked_route) {
                        $maybe_matched[$last_checked_route['route_name']] = array(
                            'm' => $last_checked_route['m'],
                            'route' => $last_checked_route['route'],
                            'use_when_maybe' => $last_checked_route['use_when_maybe']
                        );
                    }
                    if ($maybe_matched) {
                        foreach ($maybe_matched as $route_data) {
                            $m = $route_data['m'];
                            $route = $route_data['route'];
                            if ($route_data['use_when_maybe']) {
                                foreach ($m as $k => $v) {
                                    if (!is_numeric($k)) {
                                        $_GET[$k] = $v;
                                    }
                                }
                                $controller = $route['controller'] ? $route['controller'] : $_GET['controller'];
                                if (!empty($route['params'])) {
                                    foreach ($route['params'] as $k => $v) {
                                        $_GET[$k] = $v;
                                    }
                                }
                                if (preg_match('#module-([a-z0-9_-]+)-([a-z0-9_]+)$#i', $controller, $m)) {
                                    $_GET['module'] = $m[1];
                                    $_GET['fc'] = 'module';
                                    $controller = $m[2];
                                }
                                if (isset($_GET['fc']) && $_GET['fc'] == 'module') {
                                    $this->front_controller = self::FC_MODULE;
                                }
                                break;
                            }
                        }
                    }
                }
            }
            if ($controller == 'index' || preg_match('/^\/index.php(?:\?.*)?$/', $this->request_uri)) {
                $controller = $this->useDefaultController();
            }
        }
        $this->controller = str_replace('-', '', $controller);
        $_GET['controller'] = $this->controller;
        return $this->controller;
    }
}
