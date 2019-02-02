<?php
/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

class FrontController extends FrontControllerCore
{
    protected function canonicalRedirection($canonical_url = '')
    {
        $fsau_params = array();
        if (Module::isEnabled('fsadvancedurl')) {
            $fsau = Module::getInstanceByName('fsadvancedurl');
            $info = $fsau->overrideCanonicalUrl($canonical_url);
            $canonical_url = $info['canonical_url'];
            if (isset($info['params']) && is_array($info['params']) && $info['params']) {
                $fsau_params = $info['params'];
            }
        }

        parent::canonicalRedirection($canonical_url);

        if ($fsau_params) {
            $_GET = array_merge($_GET, $fsau_params);
        }
    }

    protected function updateQueryString(array $extraParams = null)
    {
        $uriWithoutParams = explode('?', $_SERVER['REQUEST_URI']);
        if (isset($uriWithoutParams[0])) {
            $uriWithoutParams = $uriWithoutParams[0];
        }

        $url = Tools::getCurrentUrlProtocolPrefix().$_SERVER['HTTP_HOST'].$uriWithoutParams;

        if (Module::isEnabled('fsadvancedurl')) {
            $fsau = Module::getInstanceByName('fsadvancedurl');
            $url = $fsau->overrideUpdateQueryStringBaseUrl($url, $extraParams);
        }

        $params = array();
        parse_str($_SERVER['QUERY_STRING'], $params);

        if (null !== $extraParams) {
            foreach ($extraParams as $key => $value) {
                if (null === $value) {
                    unset($params[$key]);
                } else {
                    $params[$key] = $value;
                }
            }
        }

        ksort($params);

        if (null !== $extraParams) {
            foreach ($params as $key => $param) {
                if (null === $param || '' === $param) {
                    unset($params[$key]);
                }
            }
        } else {
            $params = array();
        }

        $queryString = str_replace('%2F', '/', http_build_query($params));

        return $url.($queryString ? "?$queryString" : '');
    }
}
