<?php
/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

class FsAdvancedUrlTools
{
    public static function baseUrl()
    {
        $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://');
        $base_url .= $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
        $base_url = str_replace('\\', '/', $base_url);
        if (Tools::substr($base_url, -1) != '/') {
            $base_url .= '/';
        }

        return $base_url;
    }

    public static function redirectBack($default_back_url = null)
    {
        $base_url = self::baseUrl();

        if (!empty($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $base_url) == 0) {
            $url_back = $_SERVER['HTTP_REFERER'];
        } elseif ($default_back_url) {
            $url_back = $default_back_url;
        } else {
            $url_back = $base_url;
        }

        Tools::redirectLink($url_back);
        exit;
    }

    public static function redirect($url, $headers = null)
    {
        $base_url = Tools::getShopDomainSsl(true).Context::getContext()->shop->getBaseURI();

        if (!Validate::isAbsoluteUrl($url)) {
            if (Tools::strlen($url) > 0 && Tools::substr($url, 0, 1) == '/') {
                $url = Tools::substr($url, 1);
            }
            $url = $base_url.$url;
        }
        Tools::redirect($url, __PS_BASE_URI__, null, $headers);
    }

    public static function getRequestUri()
    {
        $base_uri = Context::getContext()->shop->getBaseURI();
        $uri = $_SERVER['REQUEST_URI'];
        if ($base_uri != '/') {
            $uri = str_replace($base_uri, '', $_SERVER['REQUEST_URI']);
        }
        if (!$uri) {
            return '/';
        }
        if (Tools::strlen($uri) > 0 && Tools::substr($uri, 0, 1) != '/') {
            return '/'.$uri;
        }
        return $uri;
    }

    public static function getCurrentUrl()
    {
        return Tools::getShopDomainSsl(true).$_SERVER['REQUEST_URI'];
    }

    public static function getValue($key, $default_value, $from)
    {
        if (isset($from[$key])) {
            return $from[$key];
        }

        return $default_value;
    }

    public static function startsWith($haystack, $needle)
    {
        return !strncmp($haystack, $needle, Tools::strlen($needle));
    }

    public static function endsWith($haystack, $needle)
    {
        return $needle === '' || strpos(
            $haystack,
            $needle,
            Tools::strlen($haystack) - Tools::strlen($needle)
        ) !== false;
    }

    public static function contains($haystack, $needle)
    {
        if (strpos($haystack, $needle) !== false) {
            return true;
        }
        return false;
    }

    public static function pr($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

    public static function removeForm($html)
    {
        $matches = array();
        preg_match('#<form(.+?)>#ims', $html, $matches);
        return str_replace(array($matches[0], '</form>'), array('', ''), $html);
    }

    public static function rnd($length = 10)
    {
        $salt = 'abchefghjkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        srand((double)microtime() * 1000000);
        $i = 0;
        $pass = '';
        while ($i <= $length) {
            $num = rand() % 59;
            $tmp = Tools::substr($salt, $num, 1);
            $pass = $pass.$tmp;
            $i++;
        }
        return $pass;
    }

    public static function unescapeSmarty($escaped)
    {
        return str_replace(
            array('&amp;', '&quot;', '&#039;', '&lt;', '&gt;'),
            array('&', '"', '\'', '<', '>'),
            $escaped
        );
    }

    public static function minifyCss($params, $css)
    {
        $mode = 'default';
        if (isset($params['mode'])) {
            $mode = $params['mode'];
        }

        if ($mode == 'default') {
            $css = str_replace(': ', ':', $css);
            $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
        }

        return $css;
    }

    public static function isSubmitMultilang($submit)
    {
        $return = true;
        $languages = Language::getLanguages(false);
        foreach ($languages as $language) {
            $return = $return && (bool)Tools::isSubmit($submit.'_'.$language['id_lang']);
        }

        return $return;
    }
}
