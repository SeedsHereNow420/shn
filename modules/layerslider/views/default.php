<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

ls_enqueue_style('wp-pointer', LS_VIEWS_URL.'css/wp-pointer.min.css', false, ${'this'}->module->version);
ls_enqueue_style('wp-specs', LS_VIEWS_URL.'css/wp-specs.css', false, ${'this'}->module->version);

ls_enqueue_script('jquery-ui', LS_VIEWS_URL.'js/jquery-ui.min.js', false, ${'this'}->module->version);
ls_enqueue_script('wp-pointer', LS_VIEWS_URL.'js/wp-pointer.min.js', false, ${'this'}->module->version);
ls_enqueue_script('wp-specs', LS_VIEWS_URL.'js/wp-specs.js', false, ${'this'}->module->version);

function ls_before_die()
{
    $headers = headers_list();
    foreach ($headers as $header) {
        if (strpos($header, 'Location: admin.php') === 0) {
            $location = str_replace(array(
                'admin.php?page=layerslider',
                'admin.php?page=ls-style-editor',
                'admin.php?page=ls-skin-editor',
                'admin.php?page=ls-revisions',
            ), array(
                'index.php?controller=AdminLayerSlider&token='.$GLOBALS['ls_token'],
                'index.php?controller=AdminLayerSliderStyle&token='.$GLOBALS['ls_token'],
                'index.php?controller=AdminLayerSliderSkin&token='.$GLOBALS['ls_token'],
                'index.php?controller=AdminLayerSliderRevisions&token='.$GLOBALS['ls_token'],
            ), $header);
            Tools::redirectAdmin(Tools::substr($location, 10));
        }
    }
}
register_shutdown_function('ls_before_die');

ls_magic_quotes(); // magic quotes fix

function ls_init_screen_meta()
{
    ?>
    <div id="screen-meta" class="metabox-prefs">
        <div id="contextual-help-wrap" class="hidden no-sidebar" tabindex="-1" aria-label="Contextual Help Tab">
            <div id="contextual-help-back"></div>
            <div id="contextual-help-columns">
                <div class="contextual-help-tabs"><ul></ul></div>
                <div class="contextual-help-tabs-wrap"></div>
            </div>
        </div>
    </div>
    <div id="screen-meta-links"></div>
    <?php
}
ls_add_action(ls_get_current_screen()->id, 'ls_init_screen_meta');

function init_admin_scripts()
{
    $context = Context::getContext();
    $mediamanagerurl = $context->link->getAdminLink('AdminLayerSliderMedia');
    $adminmodulesurl = $context->link->getAdminLink('AdminModules').'&configure=layerslider&module_name=layerslider';
    $ajaxurl = 'index.php?controller=AdminLayerSlider&ajax=1&token='.$GLOBALS['ls_token'];
    $lsVersion = LS_PLUGIN_VERSION;
    $userSettings = Tools::jsonEncode(array(
        'time' => time(),
        'uid' => $context->employee->id,
        'url' => __PS_BASE_URI__
    ));
    $_wpPluploadSettings = Tools::jsonEncode(array(
        'defaults' => array(
            'multipart_params' => array(
                '_wpnonce' => $GLOBALS['ls_token']
            )
        )
    ));
    echo "<script>
        mediamanagerurl = '$mediamanagerurl';
        admin_modules_link = '$adminmodulesurl';
        ajaxurl = '$ajaxurl';
        lsVersion = '$lsVersion';
        userSettings = $userSettings;
        _wpPluploadSettings = $_wpPluploadSettings;
    </script>";
}
ls_add_action('admin_enqueue_scripts', 'init_admin_scripts');

ob_start();
require_once(_PS_MODULE_DIR_.'layerslider/base/layerslider.php');

ls_do_action('init');

if (isset(${'_GET'}['ajax']) && isset($_REQUEST['action'])) {
    // handle AJAX requests
    if ($_REQUEST['action'] == 'upload-attachment') {
        // handle AJAX image upload
        if (isset($_FILES['async-upload'])) {
            $name = $_FILES['async-upload']['name'];
            $destination = _PS_IMG_DIR_.$name;
            $reldestination = _PS_IMG_.$name;
            if (move_uploaded_file($_FILES['async-upload']['tmp_name'], $destination)) {
                $res = array(
                    'data' => array('id' => '', 'sizes' => array(), 'url' => $reldestination),
                    'success' => true
                );
                die(Tools::jsonEncode($res));
            }
        }
        die(Tools::jsonEncode(array('success' => false)));
    }
    ls_do_action('wp_ajax_'.$_REQUEST['action']);
    die(ob_get_clean());
}
ls_do_action('admin_menu');
ls_do_action('admin_init');
ls_do_action('admin_enqueue_scripts');
ls_do_action('ls_enqueue_scripts');
ls_do_action('admin_notices');
ls_do_action(ls_get_current_screen()->id);

function ls_replace_url($match)
{
    $url = str_replace(array(
        'page=layerslider',
        'page=ls-skin-editor',
        'page=ls-style-editor',
        'page=ls-transition-builder',
        'page=ls-revisions',
    ), array(
        'controller=AdminLayerSlider&amp;token='.$GLOBALS['ls_token'],
        'controller=AdminLayerSliderSkin&amp;token='.$GLOBALS['ls_token'],
        'controller=AdminLayerSliderStyle&amp;token='.$GLOBALS['ls_token'],
        'controller=AdminLayerSliderTransition&amp;token='.$GLOBALS['ls_token'],
        'controller=AdminLayerSliderRevisions&amp;token='.$GLOBALS['ls_token'],
    ), $match[1]);
    return 'href="'. $url .'"';
}

$script = empty($GLOBALS['ls_local']) ? '' : "\n<script>\n".implode("\n", $GLOBALS['ls_local'])."\n</script>";
${'this'}->content = $script.preg_replace_callback('/href="(?:admin\.php)?(\?page=.*?)"/', 'ls_replace_url', ob_get_clean());
