<?php
class FrontController extends FrontControllerCore
{
    /*
    * module: stoverride
    * date: 2017-12-03 17:34:34
    * version: 1.0.0
    */
    public function initContent()
    {
        parent::initContent();
        
        $this->context->smarty->assign(array(
            'HOOK_HEADER_LEFT' => Hook::exec('displayHeaderLeft'),
            'HOOK_HEADER_CENTER' => Hook::exec('displayHeaderCenter'),
            'HOOK_HEADER_BOTTOM' => Hook::exec('displayHeaderBottom'),
            'HOOK_STACKED_FOOTER_1' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_1') ? Hook::exec('displayStackedFooter1') : ''),
            'HOOK_STACKED_FOOTER_2' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_2') ? Hook::exec('displayStackedFooter2') : ''),
            'HOOK_STACKED_FOOTER_3' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_3') ? Hook::exec('displayStackedFooter3') : ''),
            'HOOK_STACKED_FOOTER_4' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_4') ? Hook::exec('displayStackedFooter4') : ''),
            'HOOK_STACKED_FOOTER_5' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_5') ? Hook::exec('displayStackedFooter5') : ''),
            'HOOK_STACKED_FOOTER_6' => (Configuration::get('STSN_STACKED_FOOTER_COLUMN_6') ? Hook::exec('displayStackedFooter6') : ''),
        ));
    }
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
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
    /*
    * module: fsadvancedurl
    * date: 2019-01-06 09:06:05
    * version: 2.1.2
    */
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