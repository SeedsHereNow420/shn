<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

define('CP_CONTENT_DIR', _PS_ROOT_DIR_);
define('CP_VIEWS_URL', _MODULE_DIR_.'creativepopup/views/');
define('CP_SCRIPTS_PRIORITY', (int) cp_get_option('cp_scripts_priority', 50));
define('CP_LOAD_UNPACKED', (int) cp_get_option('cp_load_unpacked', 0));

function cp_current_user_can($capability)
{
    return Context::getContext()->employee ? true : false;
}

function cp_plugins_url($path = '', $plugin = '')
{
    return rtrim(_MODULE_DIR_.'creativepopup/base/'.$path, '/');
}

function cp_content_url($path = '')
{
    return rtrim(_MODULE_DIR_.'creativepopup/base/'.$path, '/');
}

function cp_get_posts($params = null)
{
    $context = Context::getContext();
    $id_lang = $context->language->id;
    if (!empty($params['post_type'])) {
        foreach ($params['post_type'] as &$id_manufacturer) {
            $id_manufacturer = (int)$id_manufacturer;
        }
    }
    $manufacturers = !empty($params['post_type']) ? implode(', ', $params['post_type']) : '';
    $categories = !empty($params['category__in']) ? implode(', ', $params['category__in']) : '';
    $tags = !empty($params['tag__in']) ? implode(', ', $params['tag__in']) : '';
    $order_by = !empty($params['orderby']) ? $params['orderby'] : 'date_add';
    // compatibility fix
    if ($order_by == 'date') {
        $order_by = 'date_add';
    }
    $order_way = !empty($params['order']) ? $params['order'] : 'DESC';
    $limit = !empty($params['limit']) ? (int)$params['limit'] : 100;
    $offset = !empty($params['offset']) ? (int)$params['offset'] : 0;

    if (!Validate::isOrderBy($order_by) || !Validate::isOrderWay($order_way)) {
        die(Tools::displayError());
    }
    if ($order_by == 'date_add' || $order_by == 'date_upd' || $order_by == 'price') {
        $order_by_prefix = 'p';
    } elseif ($order_by == 'name') {
        $order_by_prefix = 'pl';
    } elseif ($order_by == 'position') {
        $order_by_prefix = 'c';
        $order_way = $order_way == 'ASC' ? 'DESC' : 'ASC';
    } elseif ($order_by == 'quantity') {
        $order_by_prefix = 'ps';
    } elseif ($order_by == 'reduction') {
        $order_by_prefix = 'sp';
    } elseif ($order_by == 'rand') {
        $order_by = 'RAND()';
    }

    if (strpos($order_by, '.') > 0) {
        $order_by = explode('.', $order_by);
        $order_by_prefix = $order_by[0];
        $order_by = $order_by[1];
    }

    $sql = 'SELECT DISTINCT p.id_product, p.date_add, p.date_upd, pl.name, pl.link_rewrite, pl.description, pl.description_short, m.name AS manufacturer
        FROM `'._DB_PREFIX_.'product` p'.Shop::addSqlAssociation('product', 'p').'
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (p.`id_product` = pl.`id_product` '.Shop::addSqlRestrictionOnLang('pl').')
        LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON (m.`id_manufacturer` = p.`id_manufacturer`)
        LEFT JOIN `'._DB_PREFIX_.'category_product` c ON (c.`id_product` = p.`id_product`)
        LEFT JOIN `'._DB_PREFIX_.'product_tag` pt ON (pt.`id_product` = p.`id_product`)'.
        ($order_by == 'quantity' ? ' LEFT JOIN `'._DB_PREFIX_.'product_sale` ps ON ps.id_product = p.id_product' : '').
        ($order_by == 'reduction' ? ' INNER JOIN `'._DB_PREFIX_.'specific_price` sp ON sp.id_product = p.id_product' : '').'
        WHERE pl.`id_lang` = '.(int)$id_lang.
            ' AND product_shop.`active` = 1'.
            ' AND product_shop.`visibility` IN ("both", "catalog")'.
            ($manufacturers ? ' AND m.`id_manufacturer` IN ('.$manufacturers.')' : '').
            ($categories ? ' AND c.`id_category` IN ('.$categories.')' : '').
            ($tags ? ' AND pt.`id_tag` IN ('.$tags.')' : '').
            ($order_by == 'reduction' ? ' AND sp.from <= NOW() AND (sp.to >= NOW() OR sp.to = "0000-00-00 00:00:00")' : '').'
        ORDER BY '.(isset($order_by_prefix) ? pSQL($order_by_prefix).'.' : '').pSQL($order_by).' '.pSQL($order_way).
            ($limit > 0 ? " LIMIT $offset, $limit" : '');

    $res = Db::getInstance()->executeS($sql);
    return $res;
}

function cp_get_post_type_object($post_type)
{
    return (object) array(
        'labels' => (object) array('name' => $post_type['name'])
    );
}

class CpManufacturerArray extends ArrayObject
{
    public function __toString()
    {
        return isset($this['slug']) ? (string)$this['slug'] : '';
    }
}

function cp_get_post_types()
{
    $mans = Manufacturer::getManufacturers();
    foreach ($mans as &$man) {
        $man = new CpManufacturerArray($man);
        $man['slug'] = $man['id_manufacturer'];
    }
    array_unshift($mans, new CpManufacturerArray(array(
        'name' => cp__("Don't filter manufacturers"),
        'slug' => 0,
    )));
    return $mans;
}
function cp_get_categories()
{
    require_once _PS_MODULE_DIR_.'creativepopup/classes/CpHelper.php';
    return CpHelper::getCategoryList();
}
function cp_get_tags()
{
    require_once _PS_MODULE_DIR_.'creativepopup/classes/CpHelper.php';
    $tags = CpHelper::getTagList();
    foreach ($tags as &$tag) {
        $tag = (object) $tag;
    }
    return $tags;
}
function cp_get_taxonomies()
{
    return array();
}

function cp_get_attachment_image($attachment_id, $size = 'thumbnail', $icon = false, $attr = '')
{
    $attrs = array(
        'src' => $attachment_id,
        'alt' => 'Background'
    );
    if (is_array($attr)) {
        $attrs = array_merge($attrs, $attr);
    }
    $img = '<img';
    foreach ($attrs as $key => &$value) {
        $img .= ' '.$key.'="'.$value.'"';
    }
    $img .= '>';
    return $img;
}

$GLOBALS['cp_action'] = array();

function cp_add_action($tag, $func)
{
    if (!isset($GLOBALS['cp_action'][$tag])) {
        $GLOBALS['cp_action'][$tag] = array();
    }
    $GLOBALS['cp_action'][$tag][] = $func;
}

function cp_do_action($tag, $arg = array())
{
    if (isset($GLOBALS['cp_action'][$tag])) {
        foreach ($GLOBALS['cp_action'][$tag] as $func) {
            call_user_func_array($func, $arg);
        }
    }
}

function cp_has_action($tag, $func_to_check = '')
{
    return isset($GLOBALS['cp_action'][$tag]);
}

$GLOBALS['cp_filter'] = array();

function cp_add_filter($tag, $func)
{
    if (!isset($GLOBALS['cp_filter'][$tag])) {
        $GLOBALS['cp_filter'][$tag] = array();
    }
    $GLOBALS['cp_filter'][$tag][] = $func;
}

function cp_apply_filters($tag, $value, $var = null)
{
    if (isset($GLOBALS['cp_filter'][$tag])) {
        foreach ($GLOBALS['cp_filter'][$tag] as $func) {
            if ($var === null) {
                $value = is_string($func) ? call_user_func($func, $value) : $func[0]->{$func[1]}($value);
            } else {
                $value = is_string($func) ? call_user_func($func, $value, $var) : $func[0]->{$func[1]}($value, $var);
            }
        }
    }
    return $value;
}

function cp_has_filter($tag, $func_to_check = '')
{
    return isset($GLOBALS['cp_filter'][$tag]);
}

require_once _PS_MODULE_DIR_.'creativepopup/classes/CpDb.php';

function cp_esc_sql($data)
{
    return CpDb::getInstance()->escape($data);
}

function cp_dbDelta($sql)
{
    $db = Db::getInstance();
    $sql = preg_replace('~CREATE\s+TABLE(?!\s+IF\s+NOT\s+EXISTS)~i', 'CREATE TABLE IF NOT EXISTS', $sql);
    $res = $db->execute($sql);

    return $res;
}

function cp_get_userdata($userid)
{
    $user = Context::getContext()->employee;
    $user->user_nicename = $user->firstname.' '.$user->lastname;
    return $user;
}

function cp_get_avatar_url($id_or_email, $args = null)
{
    $emp = Context::getContext()->employee;
    return method_exists($emp, 'getImage') ? $emp->getImage() : 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
}

function cp_add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function)
{
    $screen_id = $parent_slug . '_page_' . $menu_slug;
    cp_add_action($screen_id, $function);
    return $screen_id;
}

function cp_is_ssl()
{
    return strpos(_PS_BASE_URL_SSL_, 'https') === 0;
}

define('CP_MINUTE_IN_SECS', 60);
define('CP_HOUR_IN_SECS', 60 * CP_MINUTE_IN_SECS);
define('CP_DAY_IN_SECS', 24 * CP_HOUR_IN_SECS);
define('CP_WEEK_IN_SECS', 7 * CP_DAY_IN_SECS);
define('CP_MONTH_IN_SECS', 30 * CP_DAY_IN_SECS);
define('CP_YEAR_IN_SECS', 365 * CP_DAY_IN_SECS);

function cp_human_time_diff($from, $to = '')
{
    if (empty($to)) {
        $to = time();
    }

    $diff = (int) abs($to - $from);

    if ($diff < CP_HOUR_IN_SECS) {
        $mins = round($diff / CP_MINUTE_IN_SECS);
        if ($mins <= 1) {
            $mins = 1;
        }
        $since = sprintf(cp_n('%s min', '%s mins', $mins), $mins);
    } elseif ($diff < CP_DAY_IN_SECS && $diff >= CP_HOUR_IN_SECS) {
        $hours = round($diff / CP_HOUR_IN_SECS);
        if ($hours <= 1) {
            $hours = 1;
        }
        $since = sprintf(cp_n('%s hour', '%s hours', $hours), $hours);
    } elseif ($diff < CP_WEEK_IN_SECS && $diff >= CP_DAY_IN_SECS) {
        $days = round($diff / CP_DAY_IN_SECS);
        if ($days <= 1) {
            $days = 1;
        }
        $since = sprintf(cp_n('%s day', '%s days', $days), $days);
    } elseif ($diff < CP_MONTH_IN_SECS && $diff >= CP_WEEK_IN_SECS) {
        $weeks = round($diff / CP_WEEK_IN_SECS);
        if ($weeks <= 1) {
            $weeks = 1;
        }
        $since = sprintf(cp_n('%s week', '%s weeks', $weeks), $weeks);
    } elseif ($diff < CP_YEAR_IN_SECS && $diff >= CP_MONTH_IN_SECS) {
        $months = round($diff / CP_MONTH_IN_SECS);
        if ($months <= 1) {
            $months = 1;
        }
        $since = sprintf(cp_n('%s month', '%s months', $months), $months);
    } elseif ($diff >= CP_YEAR_IN_SECS) {
        $years = round($diff / CP_YEAR_IN_SECS);
        if ($years <= 1) {
            $years = 1;
        }
        $since = sprintf(cp_n('%s year', '%s years', $years), $years);
    }

    return cp_apply_filters('cp_human_time_diff', $since, $diff, $from, $to);
}

function cp_add_user_meta($user_id, $key, $value, $unique = false)
{
    return cp_add_option('u'.(int)$user_id.'_'.$key, $value);
}

function cp_get_user_meta($user_id, $key = '', $single = false)
{
    return cp_get_option('u'.(int)$user_id.'_'.$key);
}

function cp_update_user_meta($user_id, $key, $value, $prev_value = '')
{
    return cp_update_option('u'.(int)$user_id.'_'.$key, $value);
}

function cp_remote_retrieve_body($response)
{
    return $response['body'];
}

function cp_remote_get($url, $args = array())
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return array('body' => $resp);
}

function cp_get_current_screen()
{
    return isset($GLOBALS['cp_screen']) ? $GLOBALS['cp_screen'] : (object) array('id' => '', 'base' => '');
}

function cp_die($message = '', $title = '', $args = array())
{
    die($title ? "$title \n$message" : $message);
}

function cp__($text, $domain = 'default')
{
    return cp_ss(Translate::getModuleTranslation('creativepopup', $text, '', null, true));
}

function cp_e($text, $domain = 'default')
{
    echo cp_ss(Translate::getModuleTranslation('creativepopup', $text, '', null, true));
}

function cp_x($text, $context, $domain = 'default')
{
    // TODO
    return cp_ss(Translate::getModuleTranslation('creativepopup', $text, '', null, true));
}

function cp_ex($text, $context, $domain = 'default')
{
    // TODO
    echo cp_ss(Translate::getModuleTranslation('creativepopup', $text, '', null, true));
}

function cp_n($single, $plural, $number, $domain = 'default')
{
    return cp_ss(Translate::getModuleTranslation('creativepopup', $number > 1 ? $plural : $single, '', null, true));
}

function cp_get_allowed_mime_types()
{
    return cp_apply_filters('allowed_mime_types', array(
    // Image formats
    'jpg|jpeg|jpe'                 => 'image/jpeg',
    'gif'                          => 'image/gif',
    'png'                          => 'image/png',
    'bmp'                          => 'image/bmp',
    'tif|tiff'                     => 'image/tiff',
    'ico'                          => 'image/x-icon',

    // Video formats
    'asf|asx'                      => 'video/x-ms-asf',
    'wmv'                          => 'video/x-ms-wmv',
    'wmx'                          => 'video/x-ms-wmx',
    'wm'                           => 'video/x-ms-wm',
    'avi'                          => 'video/avi',
    'divx'                         => 'video/divx',
    'flv'                          => 'video/x-flv',
    'mov|qt'                       => 'video/quicktime',
    'mpeg|mpg|mpe'                 => 'video/mpeg',
    'mp4|m4v'                      => 'video/mp4',
    'ogv'                          => 'video/ogg',
    'webm'                         => 'video/webm',
    'mkv'                          => 'video/x-matroska',

    // Text formats
    'txt|asc|c|cc|h'               => 'text/plain',
    'csv'                          => 'text/csv',
    'tsv'                          => 'text/tab-separated-values',
    'ics'                          => 'text/calendar',
    'rtx'                          => 'text/richtext',
    'css'                          => 'text/css',
    'htm|html'                     => 'text/html',

    // Audio formats
    'mp3|m4a|m4b'                  => 'audio/mpeg',
    'ra|ram'                       => 'audio/x-realaudio',
    'wav'                          => 'audio/wav',
    'ogg|oga'                      => 'audio/ogg',
    'mid|midi'                     => 'audio/midi',
    'wma'                          => 'audio/x-ms-wma',
    'wax'                          => 'audio/x-ms-wax',
    'mka'                          => 'audio/x-matroska',

    // Misc application formats
    'rtf'                          => 'application/rtf',
    'js'                           => 'application/javascript',
    'pdf'                          => 'application/pdf',
    'swf'                          => 'application/x-shockwave-flash',
    'class'                        => 'application/java',
    'tar'                          => 'application/x-tar',
    'zip'                          => 'application/zip',
    'gz|gzip'                      => 'application/x-gzip',
    'rar'                          => 'application/rar',
    '7z'                           => 'application/x-7z-compressed',
    'exe'                          => 'application/x-msdownload',

    // MS Office formats
    'doc'                          => 'application/msword',
    'pot|pps|ppt'                  => 'application/vnd.ms-powerpoint',
    'wri'                          => 'application/vnd.ms-write',
    'xla|xls|xlt|xlw'              => 'application/vnd.ms-excel',
    'mdb'                          => 'application/vnd.ms-access',
    'mpp'                          => 'application/vnd.ms-project',
    'docx'                         => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'docm'                         => 'application/vnd.ms-word.document.macroEnabled.12',
    'dotx'                         => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
    'dotm'                         => 'application/vnd.ms-word.template.macroEnabled.12',
    'xlsx'                         => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'xlsm'                         => 'application/vnd.ms-excel.sheet.macroEnabled.12',
    'xlsb'                         => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
    'xltx'                         => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
    'xltm'                         => 'application/vnd.ms-excel.template.macroEnabled.12',
    'xlam'                         => 'application/vnd.ms-excel.addin.macroEnabled.12',
    'pptx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
    'pptm'                         => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
    'ppsx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
    'ppsm'                         => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
    'potx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.template',
    'potm'                         => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
    'ppam'                         => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
    'sldx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.slide',
    'sldm'                         => 'application/vnd.ms-powerpoint.slide.macroEnabled.12',
    'onetoc|onetoc2|onetmp|onepkg' => 'application/onenote',

    // OpenOffice formats
    'odt'                          => 'application/vnd.oasis.opendocument.text',
    'odp'                          => 'application/vnd.oasis.opendocument.presentation',
    'ods'                          => 'application/vnd.oasis.opendocument.spreadsheet',
    'odg'                          => 'application/vnd.oasis.opendocument.graphics',
    'odc'                          => 'application/vnd.oasis.opendocument.chart',
    'odb'                          => 'application/vnd.oasis.opendocument.database',
    'odf'                          => 'application/vnd.oasis.opendocument.formula',

    // WordPerfect formats
    'wp|wpd'                       => 'application/wordperfect',

    // iWork formats
    'key'                          => 'application/vnd.apple.keynote',
    'numbers'                      => 'application/vnd.apple.numbers',
    'pages'                        => 'application/vnd.apple.pages',
    ));
}

function cp_get_mime_types()
{
    return cp_apply_filters('mime_types', array(
    // Image formats.
    'jpg|jpeg|jpe' => 'image/jpeg',
    'gif' => 'image/gif',
    'png' => 'image/png',
    'bmp' => 'image/bmp',
    'tiff|tif' => 'image/tiff',
    'ico' => 'image/x-icon',
    // Video formats.
    'asf|asx' => 'video/x-ms-asf',
    'wmv' => 'video/x-ms-wmv',
    'wmx' => 'video/x-ms-wmx',
    'wm' => 'video/x-ms-wm',
    'avi' => 'video/avi',
    'divx' => 'video/divx',
    'flv' => 'video/x-flv',
    'mov|qt' => 'video/quicktime',
    'mpeg|mpg|mpe' => 'video/mpeg',
    'mp4|m4v' => 'video/mp4',
    'ogv' => 'video/ogg',
    'webm' => 'video/webm',
    'mkv' => 'video/x-matroska',
    '3gp|3gpp' => 'video/3gpp', // Can also be audio
    '3g2|3gp2' => 'video/3gpp2', // Can also be audio
    // Text formats.
    'txt|asc|c|cc|h|srt' => 'text/plain',
    'csv' => 'text/csv',
    'tsv' => 'text/tab-separated-values',
    'ics' => 'text/calendar',
    'rtx' => 'text/richtext',
    'css' => 'text/css',
    'htm|html' => 'text/html',
    'vtt' => 'text/vtt',
    'dfxp' => 'application/ttaf+xml',
    // Audio formats.
    'mp3|m4a|m4b' => 'audio/mpeg',
    'ra|ram' => 'audio/x-realaudio',
    'wav' => 'audio/wav',
    'ogg|oga' => 'audio/ogg',
    'mid|midi' => 'audio/midi',
    'wma' => 'audio/x-ms-wma',
    'wax' => 'audio/x-ms-wax',
    'mka' => 'audio/x-matroska',
    // Misc application formats.
    'rtf' => 'application/rtf',
    'js' => 'application/javascript',
    'pdf' => 'application/pdf',
    'swf' => 'application/x-shockwave-flash',
    'class' => 'application/java',
    'tar' => 'application/x-tar',
    'zip' => 'application/zip',
    'gz|gzip' => 'application/x-gzip',
    'rar' => 'application/rar',
    '7z' => 'application/x-7z-compressed',
    'exe' => 'application/x-msdownload',
    'psd' => 'application/octet-stream',
    'xcf' => 'application/octet-stream',
    // MS Office formats.
    'doc' => 'application/msword',
    'pot|pps|ppt' => 'application/vnd.ms-powerpoint',
    'wri' => 'application/vnd.ms-write',
    'xla|xls|xlt|xlw' => 'application/vnd.ms-excel',
    'mdb' => 'application/vnd.ms-access',
    'mpp' => 'application/vnd.ms-project',
    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'docm' => 'application/vnd.ms-word.document.macroEnabled.12',
    'dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
    'dotm' => 'application/vnd.ms-word.template.macroEnabled.12',
    'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'xlsm' => 'application/vnd.ms-excel.sheet.macroEnabled.12',
    'xlsb' => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
    'xltx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
    'xltm' => 'application/vnd.ms-excel.template.macroEnabled.12',
    'xlam' => 'application/vnd.ms-excel.addin.macroEnabled.12',
    'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
    'pptm' => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
    'ppsx' => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
    'ppsm' => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
    'potx' => 'application/vnd.openxmlformats-officedocument.presentationml.template',
    'potm' => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
    'ppam' => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
    'sldx' => 'application/vnd.openxmlformats-officedocument.presentationml.slide',
    'sldm' => 'application/vnd.ms-powerpoint.slide.macroEnabled.12',
    'onetoc|onetoc2|onetmp|onepkg' => 'application/onenote',
    'oxps' => 'application/oxps',
    'xps' => 'application/vnd.ms-xpsdocument',
    // OpenOffice formats.
    'odt' => 'application/vnd.oasis.opendocument.text',
    'odp' => 'application/vnd.oasis.opendocument.presentation',
    'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    'odg' => 'application/vnd.oasis.opendocument.graphics',
    'odc' => 'application/vnd.oasis.opendocument.chart',
    'odb' => 'application/vnd.oasis.opendocument.database',
    'odf' => 'application/vnd.oasis.opendocument.formula',
    // WordPerfect formats.
    'wp|wpd' => 'application/wordperfect',
    // iWork formats.
    'key' => 'application/vnd.apple.keynote',
    'numbers' => 'application/vnd.apple.numbers',
    'pages' => 'application/vnd.apple.pages',
    ));
}

function cp_check_filetype($filename, $mimes = null)
{
    if (empty($mimes)) {
        $mimes = cp_get_allowed_mime_types();
    }
    $type = false;
    $ext = false;

    foreach ($mimes as $ext_preg => $mime_match) {
        $ext_preg = '!\.(' . $ext_preg . ')$!i';
        if (preg_match($ext_preg, $filename, $ext_matches)) {
            $type = $mime_match;
            $ext = $ext_matches[1];
            break;
        }
    }

    return compact('ext', 'type');
}

function cp_sanitize_file_name($filename)
{
    $filename_raw = $filename;
    $special_chars = array("?", "[", "]", "/", "\\", "=", "<", ">", ":", ";", ",", "'", "\"", "&", "$", "#", "*", "(", ")", "|", "~", "`", "!", "{", "}", "%", "+", chr(0));
    $special_chars = cp_apply_filters('cp_sanitize_file_name_chars', $special_chars, $filename_raw);
    $filename = preg_replace("#\x{00a0}#siu", ' ', $filename);
    $filename = str_replace($special_chars, '', $filename);
    $filename = str_replace(array('%20', '+'), '-', $filename);
    $filename = preg_replace('/[\r\n\t -]+/', '-', $filename);
    $filename = trim($filename, '.-_');

    if (false === strpos($filename, '.')) {
        $mime_types = cp_get_mime_types();
        $filetype = cp_check_filetype('test.' . $filename, $mime_types);
        if ($filetype['ext'] === $filename) {
            $filename = 'unnamed-file.' . $filetype['ext'];
        }
    }

    // Split the filename into a base and extension[s]
    $parts = explode('.', $filename);

    // Return if only one extension
    if (count($parts) <= 2) {
        return cp_apply_filters('cp_sanitize_file_name', $filename, $filename_raw);
    }

    // Process multiple extensions
    $filename = array_shift($parts);
    $extension = array_pop($parts);
    $mimes = cp_get_allowed_mime_types();

    // Loop over any intermediate extensions. Postfix them with a trailing underscore
    // if they are a 2 - 5 character long alpha string not in the extension whitelist.
    foreach ((array) $parts as $part) {
        $filename .= '.' . $part;

        if (preg_match("/^[a-zA-Z]{2,5}\d?$/", $part)) {
            $allowed = false;
            foreach ($mimes as $ext_preg => $mime_match) {
                $ext_preg = '!^(' . $ext_preg . ')$!i';
                if (preg_match($ext_preg, $part)) {
                    $allowed = true;
                    break;
                }
            }
            if (!$allowed) {
                $filename .= '_';
            }
        }
    }
    $filename .= '.' . $extension;
    return cp_apply_filters('cp_sanitize_file_name', $filename, $filename_raw);
}

// MAGIC QUOTES
function cp_map_deep($value, $callback)
{
    if (is_array($value)) {
        foreach ($value as $index => $item) {
            $value[ $index ] = cp_map_deep($item, $callback);
        }
    } elseif (is_object($value)) {
        $object_vars = get_object_vars($value);
        foreach ($object_vars as $property_name => $property_value) {
            $value->$property_name = cp_map_deep($property_value, $callback);
        }
    } else {
        $value = call_user_func($callback, $value);
    }

    return $value;
}

function cp_ss($value)
{
    return call_user_func('strip'.'slashes', $value);
}
function cp_ss_from_strings_only($value)
{
    return is_string($value) ? cp_ss($value) : $value;
}
function cp_ss_deep($value)
{
    return cp_map_deep($value, 'cp_ss_from_strings_only');
}

function cp_add_magic_quotes($array)
{
    foreach ((array) $array as $k => $v) {
        if (is_array($v)) {
            $array[$k] = cp_add_magic_quotes($v);
        } else {
            $array[$k] = addslashes($v);
        }
    }
    return $array;
}
function cp_magic_quotes()
{
    // If already slashed, strip.
    if (get_magic_quotes_gpc()) {
        ${'_GET'}    = cp_ss_deep(${'_GET'});
        ${'_POST'}   = cp_ss_deep(${'_POST'});
        $_COOKIE = cp_ss_deep($_COOKIE);
    }

    // Escape with CpDb.
    ${'_GET'} = cp_add_magic_quotes(${'_GET'});
    ${'_POST'} = cp_add_magic_quotes(${'_POST'});
    $_COOKIE = cp_add_magic_quotes($_COOKIE);
    $_SERVER = cp_add_magic_quotes($_SERVER);

    // Force REQUEST to be GET + POST.
    $_REQUEST = array_merge(${'_GET'}, ${'_POST'});
}

function cp_is_admin()
{
    $ct = Context::getContext()->controller->controller_type;
    return $ct == 'moduleadmin' || $ct == 'admin';
}

function cp_get_current_user_id()
{
    $context = Context::getContext();
    return $context->employee ? $context->employee->id : 0;
}

function cp_get_option_key($option)
{
    if (version_compare(_PS_VERSION_, '1.6', '<') && Tools::strlen($option) > 32) {
        // option key must have max 32 chars on PS v1.5.x
        return Tools::strtoupper(md5($option));
    }
    return Tools::strtoupper(str_replace('-', '_', $option));
}

function cp_get_option($option, $default = false)
{
    if ('timezone_string' == $option) {
        return date_default_timezone_get();
    }
    $res = Configuration::get(cp_get_option_key($option));
    return $res === false ? $default : Tools::jsonDecode($res, true);
}

function cp_add_option($option, $value)
{
    Configuration::updateValue(cp_get_option_key($option), Tools::jsonEncode($value));
    return $value;
}

function cp_update_option($option, $value)
{
    Configuration::updateValue(cp_get_option_key($option), Tools::jsonEncode($value));
    return $value;
}

function cp_delete_option($option)
{
    return Configuration::deleteByName(cp_get_option_key($option));
}

$GLOBALS['cp_style'] = array();

function cp_enqueue_style($handle, $src = false, $deps = array(), $ver = false, $media = 'all')
{
    if ($src) {
        $css = array('src' => $src, 'ver' => $ver, 'media' => $media);
        $GLOBALS['cp_style'][$handle] = $css;
    } elseif (isset($GLOBALS['cp_style'][$handle])) {
        $css = $GLOBALS['cp_style'][$handle];
    }
    if (isset($css)) {
        $ctrl = Context::getContext()->controller;
        $v = $css['ver'] ? '?v='.$css['ver'] : '';

        if (method_exists($ctrl, 'registerStylesheet')) {
            if (Configuration::get('PS_CSS_THEME_CACHE') && strpos($css['src'], '://') === false) {
                $src = Tools::substr($css['src'], Tools::strlen(__PS_BASE_URI__));
            } else {
                $css['server'] = 'remote';
                $src = $css['src'].$v;
            }
            $ctrl->registerStylesheet($handle, $src, $css);
        } else {
            $ctrl->css_files[ $css['src'].$v ] = $css['media'];
        }
    }
}

function cp_register_style($handle, $src, $deps = array(), $ver = false, $media = 'all')
{
    $GLOBALS['cp_style'][$handle] = array('src' => $src, 'ver' => $ver, 'media' => $media);
}

$GLOBALS['cp_script'] = array();

function cp_enqueue_script($handle, $src = false, $deps = array(), $ver = false, $in_footer = false)
{
    if ($src) {
        $js = array('src' => $src, 'ver' => $ver, 'priority' => CP_SCRIPTS_PRIORITY);
        $GLOBALS['cp_script'][$handle] = $js;
    } elseif (isset($GLOBALS['cp_script'][$handle])) {
        $js = $GLOBALS['cp_script'][$handle];
    }
    if (isset($js) && empty($js['added'])) {
        $GLOBALS['cp_script'][$handle]['added'] = true;
        $ctrl = Context::getContext()->controller;
        $v = $js['ver'] ? '?v='.$js['ver'] : '';

        if (method_exists($ctrl, 'registerJavascript')) {
            if (CP_LOAD_UNPACKED && strpos($js['src'], '/js/core/') && basename($js['src']) != 'greensock.js') {
                $js['src'] = preg_replace('~\.js$~', '.unpacked.js', $js['src']);
            }
            if (Configuration::get('PS_JS_THEME_CACHE')) {
                $src = Tools::substr($js['src'], Tools::strlen(__PS_BASE_URI__));
            } else {
                $js['server'] = 'remote';
                $src = $js['src'].$v;
            }
            $ctrl->registerJavascript($handle, $src, $js);
        } else {
            if (!cp_is_admin() && preg_match('~/(\w+\.)?((?:\w+\.)+js)$~', $js['src'], $match)) {
                foreach ($ctrl->js_files as $jsFile) {
                    if (strpos($jsFile, $match[2]) !== false) {
                        return;
                    }
                }
            }
            if (CP_LOAD_UNPACKED && strpos($js['src'], '/js/core/') && basename($js['src']) != 'greensock.js') {
                $js['src'] = preg_replace('~\.js$~', '.unpacked.js', $js['src']);
            }
            $ctrl->js_files[] = $js['src'] . $v;
        }
    }
}

function cp_register_script($handle, $src, $deps = array(), $ver = false, $in_footer = false)
{
    $GLOBALS['cp_script'][$handle] = array('src' => $src, 'ver' => $ver, 'priority' => CP_SCRIPTS_PRIORITY);
}

$GLOBALS['ls_local'] = array();

function cp_localize_script($handle, $name, $data)
{
    if (version_compare(_PS_VERSION_, '1.6.0.11', '>=')) {
        Media::addJsDef(array($name => $data));
    } else {
        $GLOBALS['ls_local'][] = "var $name = ".Tools::jsonEncode($data).';';
    }
}

function cp_add_url_token($path)
{
    return preg_replace_callback('/controller=([^&]+)/', 'cp_add_url_token_helper', $path);
}
function cp_add_url_token_helper($match)
{
    return parse_url(Context::getContext()->link->getAdminLink($match[1]), PHP_URL_QUERY);
}
function cp_admin_url($path = '', $js = false)
{
    $path = cp_add_url_token($path);
    return $js ? $path : htmlentities($path, ENT_COMPAT | ENT_HTML401, 'UTF-8');
}
function cp_redirect($location, $status = 302)
{
    Tools::redirectAdmin(cp_add_url_token($location));
}

function cp_parse_str($string, &$array)
{
    parse_str($string, $array);
    if (get_magic_quotes_gpc()) {
        $array = cp_ss_deep($array);
    }

    $array = cp_apply_filters('cp_parse_str', $array);
}

function cp_urlencode_deep($value)
{
    $value = is_array($value) ? array_map('cp_urlencode_deep', $value) : urlencode($value);
    return $value;
}

function cp_add_query_arg()
{
    $args = func_get_args();
    if (is_array($args[0])) {
        if (count($args) < 2 || false === $args[1]) {
            $uri = $_SERVER['REQUEST_URI'];
        } else {
            $uri = $args[1];
        }
    } else {
        if (count($args) < 3 || false === $args[2]) {
            $uri = $_SERVER['REQUEST_URI'];
        } else {
            $uri = $args[2];
        }
    }

    if ($frag = strstr($uri, '#')) {
        $uri = Tools::substr($uri, 0, -Tools::strlen($frag));
    } else {
        $frag = '';
    }

    if (0 === stripos($uri, 'http://')) {
        $protocol = 'http://';
        $uri = Tools::substr($uri, 7);
    } elseif (0 === stripos($uri, 'https://')) {
        $protocol = 'https://';
        $uri = Tools::substr($uri, 8);
    } else {
        $protocol = '';
    }

    if (strpos($uri, '?') !== false) {
        list($base, $query) = explode('?', $uri, 2);
        $base .= '?';
    } elseif ($protocol || strpos($uri, '=') === false) {
        $base = $uri . '?';
        $query = '';
    } else {
        $base = '';
        $query = $uri;
    }

    $qs = array();
    cp_parse_str($query, $qs);
    $qs = cp_urlencode_deep($qs); // this re-URL-encodes things that were already in the query string
    if (is_array($args[0])) {
        $kayvees = $args[0];
        $qs = array_merge($qs, $kayvees);
    } else {
        $qs[ $args[0] ] = $args[1];
    }

    foreach ($qs as $k => $v) {
        if ($v === false) {
            unset($qs[$k]);
        }
    }

    $ret = cp_build_query($qs);
    $ret = trim($ret, '?');
    $ret = preg_replace('#=(&|$)#', '$1', $ret);
    $ret = $protocol . $base . $ret . $frag;
    $ret = rtrim($ret, '?');
    return $ret;
}

function cp_http_build_query($data, $prefix = null, $sep = null, $key = '', $urlencode = true)
{
    $ret = array();

    foreach ((array) $data as $k => $v) {
        if ($urlencode) {
            $k = urlencode($k);
        }
        if (is_int($k) && $prefix != null) {
            $k = $prefix.$k;
        }
        if (!empty($key)) {
            $k = $key . '%5B' . $k . '%5D';
        }
        if ($v === null) {
            continue;
        } elseif ($v === false) {
            $v = '0';
        }

        if (is_array($v) || is_object($v)) {
            array_push($ret, cp_http_build_query($v, '', $sep, $k, $urlencode));
        } elseif ($urlencode) {
            array_push($ret, $k.'='.urlencode($v));
        } else {
            array_push($ret, $k.'='.$v);
        }
    }

    if (null === $sep) {
        $sep = '&';
    }

    return implode($sep, $ret);
}

function cp_build_query($data)
{
    return cp_http_build_query($data, null, '&', '', false);
}

function cp_set_transient($transient, $value, $expiration = 0)
{
    $value = cp_apply_filters('pre_cp_set_transient_' . $transient, $value);
    $expiration = (int) $expiration;
    try {
        $result = Cache::getInstance()->set($transient, $value, $expiration);
    } catch (Exception $ex) {
        $result = false;
    }
    if ($result) {
        cp_do_action('cp_set_transient_' . $transient, $value, $expiration);
        cp_do_action('setted_transient', $transient, $value, $expiration);
    }
    return $result;
}

function cp_get_transient($transient)
{
    $pre = cp_apply_filters('pre_transient_' . $transient, false);
    if (false !== $pre) {
        return $pre;
    }
    try {
        $value = Cache::getInstance()->get($transient);
        return cp_apply_filters('transient_' . $transient, $value);
    } catch (Exception $ex) {
        return false;
    }
}

function cp_delete_transient($transient)
{
    cp_do_action('cp_delete_transient_' . $transient, $transient);
    try {
        $result = Cache::getInstance()->delete($transient);
    } catch (Exception $ex) {
        $result = false;
    }
    if ($result) {
        cp_do_action('deleted_transient', $transient);
    }
    return $result;
}

function cp_upload_dir()
{
    return array(
        'basedir' => _PS_IMG_DIR_,
        'baseurl' => _PS_IMG_
    );
}

function cp_get_options($arr, $key, $val = 'name', $all = 0)
{
    $options = array();
    if ($all !== false) {
        $options[$all] = cp__('- All -');
    }
    foreach ($arr as &$opt) {
        $options[$opt[$key]] = $opt[$val];
    }
    return $options;
}

function cp_get_pages(&$cats, &$pages)
{
    $arr = array();

    foreach (array('cats', 'pages') as $key) {
        $var = &$$key;
        if (in_array('all', $var)) {
            $arr[$key == 'cats' ? 'cat' : 'cms'] = 'all';
        } else {
            foreach ($var as &$val) {
                $v = explode('-', $val);
                if (count($v) > 1) {
                    if (empty($arr[ $v[0] ])) {
                        $arr[ $v[0] ] = array();
                    }
                    $arr[ $v[0] ][] = (int) $v[1];
                } elseif ($val) {
                    $arr[$val] = 1;
                }
            }
        }
    }
    return $arr;
}

/* ADD ACTIONS / FILTERS */

function cp_test_popupstore()
{
    $context = Context::getContext();
    if (empty($context->cookie->username_addons) || empty($context->cookie->password_addons)) {
        $msg = cp__('Please first connect your shop to PrestaShop Addons');
        $btn = ' <a href="'.$context->link->getAdminLink('AdminModules').'" style="float:none; display:inline-block">'.cp__('HERE').'</a>';
        die(Tools::jsonEncode(array('msg' => $msg.$btn, 'success' => 0)));
    }
    $postData = http_build_query(array(
        'version' => _PS_VERSION_,
        'iso_lang' => $context->language->iso_code,
        'iso_code' => Tools::strtolower(Country::getIsoById(Configuration::get('PS_COUNTRY_DEFAULT'))),
        'shop_url' => Tools::getShopDomain(),
        'mail' => Configuration::get('email'),
        'method' => 'listing',
        'action' => 'customer',
        'username' => urlencode(trim($context->cookie->username_addons)),
        'password' => urlencode(trim($context->cookie->password_addons)),
    ));
    $streamContext = stream_context_create(array(
        'http' => array(
            'method'=> 'POST',
            'content' => $postData,
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'timeout' => 30,
        )
    ));
    $res = Tools::file_get_contents('https://api.addons.prestashop.com', false, $streamContext);
    if ($res) {
        $xml = simplexml_load_string($res);
        foreach ($xml->module as $mod) {
            if ($mod->name == 'creativepopup') {
                die(Tools::jsonEncode(array('key' => md5((string)$mod->id), 'success' => 1)));
            }
        }
    }
    $msg = cp__('Please purchase the product to get the popup templates');
    $btn = ' <a href="https://addons.prestashop.com/pop-up/39348-creative-popup.html" target="_blank" style="float:none; display:inline-block">'.cp__('HERE').'</a>';
    die(Tools::jsonEncode(array('msg' => $msg.$btn, 'success' => 0)));
}
cp_add_action('ajax_cp_test_popupstore', 'cp_test_popupstore');

function cp_download_popup()
{
    $context = Context::getContext();
    $id = Tools::getValue('id');
    $source = 'https://creativepopup.webshopworks.com/?downloadPopup&id='.$id;
    $destination = _PS_UPLOAD_DIR_.'cpimport.zip';
    $data = Tools::file_get_contents($source, false, null, 300);

    if ($data) {
        if (file_put_contents($destination, $data)) {
            // import file
            require_once _PS_MODULE_DIR_.'creativepopup/base/core.php';
            require_once _PS_MODULE_DIR_.'creativepopup/base/classes/ImportUtil.php';
            $import = new CpImportUtil($destination);
            try {
                method_exists('Tools', 'deleteFile') ? Tools::deleteFile($destination) : unlink($destination);
            } catch (Exception $ex) {
                // TODO
            }
            // rename imported popup
            $title = !empty(${'_COOKIE'}['cpNewTitle']) ? ${'_COOKIE'}['cpNewTitle'] : 'Unnamed';
            setcookie('cpNewTitle', '', time());
            Db::getInstance()->update('creativepopup', array('name' => $title), 'id = '.$import->lastImportId);
            // redirect after import
            Tools::redirectAdmin($context->link->getAdminLink('AdminCreativePopup').'&action=edit&id='.$import->lastImportId.'#appearance');
        } else {
            $context->cookie->ls_error = cp__('Unable to write file: ').$destination;
        }
    } else {
        $context->cookie->ls_error = cp__('Tools::file_get_contents returned without data!');
    }
    Tools::redirectAdmin($context->link->getAdminLink('AdminCreativePopup'));
}

if (Tools::getValue('action') == 'download_popup') {
    cp_download_popup();
}

function cp_get_modules()
{
    $modules = array();
    $dirs = glob(_PS_MODULE_DIR_.'*', GLOB_ONLYDIR);
    foreach ($dirs as $dir) {
        $modules[basename($dir)] = 1;
    }
    return $modules;
}

function cp_pre_parse_defaults($data)
{
    $link = Context::getContext()->link;
    if (!empty($data['properties']['backgroundimage']) && $data['properties']['backgroundimage'][0] == '/') {
        $data['properties']['backgroundimage'] = $link->getMediaLink($data['properties']['backgroundimage']);
    }
    foreach ($data['layers'] as &$page) {
        if (!empty($page['properties']['background']) && $page['properties']['background'][0] == '/') {
            $page['properties']['background'] = $link->getMediaLink($page['properties']['background']);
        }
        if (!empty($page['properties']['thumbnail']) && $page['properties']['thumbnail'][0] == '/') {
            $page['properties']['thumbnail'] = $link->getMediaLink($page['properties']['thumbnail']);
        }
        if (!empty($page['sublayers'])) {
            foreach ($page['sublayers'] as &$layer) {
                if (!empty($layer['image']) && $layer['image'][0] == '/') {
                    $layer['image'] = $link->getMediaLink($layer['image']);
                }
                if (!empty($layer['poster']) && $layer['poster'][0] == '/') {
                    $layer['poster'] = $link->getMediaLink($layer['poster']);
                }
            }
        }
    }
    return $data;
}
cp_add_filter('cp_pre_parse_defaults', 'cp_pre_parse_defaults');
