<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class CpPopups
{
    public static $index;
    public static $popups;
    public static $frontPage;

    public static $optionKey = 'cp-popup-index';


    /**
     * Private constructor to prevent instantiate static class
     *
     * @access private
     * @return void
     */
    private function __construct()
    {
    }


    public static function init()
    {
        // Init Popups data
        self::$index = cp_get_option(self::$optionKey, array());
        self::$popups = array();

        // Make sure that the Popup Index is an array
        if (!is_array(self::$index)) {
            self::$index = array();
        }
    }


    public static function setup()
    {
        self::$frontPage = !cp_is_admin();

        self::autoinclude();
        self::display();
    }


    public static function addIndex($ids, &$props = null)
    {
        if (empty($ids)) {
            return false;
        }
        if (!is_array($ids)) {
            $ids = array($ids);
        }
        if (empty($props)) {
            $popups = CpInstances::find($ids);
        }
        if (!is_array(self::$index)) {
            self::$index = array();
        }
        $tz = date_default_timezone_get();
        date_default_timezone_set(cp_get_option('timezone_string'));

        foreach ($ids as $i => $id) {
            if (isset($popups)) {
                $props = &$popups[$i]['data']['properties'];
            }
            if (!empty($props['schedule_start']) && !is_numeric($props['schedule_start'])) {
                $props['schedule_start'] = (int) strtotime(str_replace('/', '-', $props['schedule_start']));
            }
            if (!empty($props['schedule_end']) && !is_numeric($props['schedule_end'])) {
                $props['schedule_end'] = (int) strtotime(str_replace('/', '-', $props['schedule_end']));
            }
            if (!isset($props['cats']) || !isset($props['pages'])) {
                $props['cats'] = array('all');
                $props['pages'] = array('all');
            }
            self::$index[$id] = array(
                'id' => (int) $id,
                'shop' => isset($props['shop']) ? (int)$props['shop'] : 0,
                'lang' => isset($props['lang']) ? (int)$props['lang'] : 0,
                'schedule_start' => isset($props['schedule_start']) ? (int)$props['schedule_start'] : 0,
                'schedule_end' => isset($props['schedule_end']) ? (int)$props['schedule_end'] : 0,
                'first_time_visitor' => ! empty($props['popup_first_time_visitor']),
                'repeat' => ! empty($props['popup_repeat']),
                'repeat_days' => isset($props['popup_repeat_days']) ? $props['popup_repeat_days'] : '',
                'roles' => isset($props['popup_roles']) ? $props['popup_roles'] : array(0),
                'disable' => (int)!empty($props['disableondesktop']) + (int)!empty($props['disableontablet'])*2 + (int)!empty($props['disableonmobile'])*4,
                'pages' => cp_get_pages($props['cats'], $props['pages'])
            );
        }

        date_default_timezone_set($tz);
        cp_update_option(self::$optionKey, self::$index);
    }


    public static function removeIndex($ids)
    {
        if (!is_array(self::$index)) {
            self::$index = array();
        }
        if (empty($ids)) {
            return false;
        }
        if (!is_array($ids)) {
            $ids = array($ids);
        }
        foreach ($ids as $id) {
            unset(self::$index[ $id ]);
        }
        cp_update_option(self::$optionKey, self::$index);
        return true;
    }

    protected static function autoinclude()
    {
        if (is_array(self::$index) && !empty(self::$index)) {
            $context = Context::getContext();
            $groups = empty($context->customer) ? array() : $context->customer->getGroups();
            $time = time();

            if (method_exists($context, 'getMobileDetect')) {
                $context->getMobileDetect();
            } elseif (!$context->mobile_detect) {
                require_once(_PS_TOOL_DIR_.'mobile_Detect/Mobile_Detect.php');
                $context->mobile_detect = new Mobile_Detect();
            }
            $device = $context->mobile_detect->isTablet() ? 2 : ($context->mobile_detect->isMobile() ? 4 : 1);

            foreach (self::$index as &$popup) {
                // Shop, Language, Schedule, First time visitor
                if (!empty($popup['shop']) && $popup['shop'] != $context->shop->id ||
                    !empty($popup['lang']) && $popup['lang'] != $context->language->id ||
                    !empty($popup['schedule_start']) && $time < $popup['schedule_start'] ||
                    !empty($popup['schedule_end']) && $time > $popup['schedule_end'] ||
                    !empty($popup['disable']) && $popup['disable'] & $device ||
                    $popup['first_time_visitor'] && !empty(${'_COOKIE'}['cp-popup-last-displayed'])) {
                    continue;
                }

                // Repeat control
                if (!$popup['repeat'] && !empty(${'_COOKIE'}['cp-popup-'.$popup['id']])) {
                    continue;
                } elseif ($popup['repeat'] && $popup['repeat_days'] !== '') {
                    if (0 === (int)$popup['repeat_days']) {
                        if (!empty(${'_COOKIE'}['cp-popup-last-displayed'])) {
                            continue;
                        }
                    } elseif (!empty(${'_COOKIE'}['cp-popup-'.$popup['id']]) && ${'_COOKIE'}['cp-popup-'.$popup['id']] > $time - 86400 * (int)$popup['repeat_days']) {
                        continue;
                    }
                }

                // User roles, Pages
                if (!in_array('0', $popup['roles']) && !count(array_intersect($groups, $popup['roles'])) ||
                    !empty($popup['pages']) && !self::checkPages($popup['pages'])) {
                    continue;
                }

                // Passed every test, include the Popup
                self::$popups[] = $popup;
            }
        }
    }


    protected static function checkPages($pages)
    {
        // init properties
        foreach (array('cat', 'prod', 'cms', 'page') as $key) {
            if (empty($pages[$key])) {
                $pages[$key] = array();
            }
        }
        $controller = Context::getContext()->controller;
        $class = str_replace('controller', '', Tools::strtolower(get_class($controller)));
        switch ($class) {
            case 'index':
                if ($pages['cat'] === 'all') {
                    return true;
                }
                return isset($pages['index']);
            case 'category':
                if ($pages['cat'] === 'all') {
                    return true;
                }
                $id = Tools::getValue('id_category');
                return in_array($id, $pages['cat']);
            case 'product':
                if ($pages['cat'] === 'all') {
                    return true;
                }
                $id = Tools::getValue('id_product');
                return in_array($id, $pages['prod']);
            case 'cms':
                if ($pages['cms'] === 'all') {
                    return true;
                }
                if (isset($controller->cms->id)) {
                    return in_array($controller->cms->id, $pages['page']);
                }
                if (isset($controller->cms_category->id)) {
                    return in_array($controller->cms_category->id, $pages['cms']);
                }
                return false;
            case 'manufacturer':
                if ($pages['cms'] === 'all') {
                    return true;
                }
                if (isset($pages['manufacturer'])) {
                    $id = Tools::getValue('id_manufacturer', 0);
                    return in_array($id, $pages['manufacturer']);
                }
                return false;
            case 'psblogpostsmodulefront':
                return isset($pages[$class]) && !$controller->id_post;
            case 'prestablogblogmodulefront':
                if ($pages['cms'] === 'all') {
                    return true;
                }
                if ($id = Tools::getValue('id', 0)) {
                    return isset($pages['bn']) && in_array($id, $pages['bn']);
                }
                $c = Tools::getValue('c', 0);
                return isset($pages['bc']) && in_array($c, $pages['bc']);
            default:
                if ($pages['cms'] === 'all') {
                    return true;
                }
                return isset($pages[$class]);
        }
    }


    protected static function display()
    {
        if (!empty(self::$popups) && is_array(self::$popups)) {
            // Update the date of last displayed popup
            setcookie('cp-popup-last-displayed', time(), time()+60*60*24*30*24, '/');

            foreach (self::$popups as $popup) {
                // Update the last opened date of this particular Popup
                // for the purpose of serving a repeat control.
                $expires = ((int)$popup['repeat_days'] === 0) ? 0 : time() + 60*60*24*365;
                setcookie('cp-popup-'.$popup['id'], time(), $expires);
            }
        }
    }


    public static function render($popup)
    {
        if (!empty(self::$popups) && is_array(self::$popups)) {
            foreach (self::$popups as $popup) {
                echo CpShortcode::handleShortcode(array('id' => $popup['id'], 'filters' => '', 'popup' => true));
            }
        }
    }
}
