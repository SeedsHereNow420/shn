<?php
/**
* Creative Popup v1.6.4 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

cp_enqueue_script('jquery-ui', CP_VIEWS_URL.'js/jquery-ui.min.js', false, ${'this'}->module->version);
cp_enqueue_script('cp-specs', CP_VIEWS_URL.'js/cp-specs.js', false, ${'this'}->module->version);
cp_enqueue_style('cp-specs', CP_VIEWS_URL.'css/cp-specs.css', false, ${'this'}->module->version);

cp_magic_quotes(); // magic quotes fix

function cp_init_screen_meta()
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
cp_add_action(cp_get_current_screen()->id, 'cp_init_screen_meta');

function cp_init_admin_scripts()
{
    $context = Context::getContext();
    $mediamanagerurl = $context->link->getAdminLink('AdminCreativePopupMedia');
    $adminmodulesurl = $context->link->getAdminLink('AdminModules').'&configure=creativepopup&module_name=creativepopup';
    $ajaxurl = 'index.php?controller=AdminCreativePopup&ajax=1&token='.CP_URL_TOKEN;
    $cpVersion = CP_PLUGIN_VERSION;
    $userSettings = Tools::jsonEncode(array(
        'time' => time(),
        'uid' => $context->employee->id,
        'url' => __PS_BASE_URI__
    ));
    echo "<script>
        mediamanagerurl = '$mediamanagerurl';
        admin_modules_link = '$adminmodulesurl';
        popupstore_url = 'https://creativepopup.webshopworks.com/';
        ajaxurl = '$ajaxurl';
        lsVersion = '$cpVersion';
        userSettings = $userSettings;
    </script>";
}
cp_add_action('admin_enqueue_scripts', 'cp_init_admin_scripts');

ob_start();
require_once(_PS_MODULE_DIR_.${'this'}->module->name.'/base/core.php');

cp_do_action('init');

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
    cp_do_action('ajax_'.$_REQUEST['action']);
    die(ob_get_clean());
}
cp_do_action('admin_menu');
cp_do_action('admin_init');
cp_do_action('admin_enqueue_scripts');
cp_do_action('cp_enqueue_scripts');
cp_do_action('admin_notices');
cp_do_action(cp_get_current_screen()->id);

$script = empty($GLOBALS['ls_local']) ? '' : "\n<script>\n".implode("\n", $GLOBALS['ls_local'])."\n</script>";
${'this'}->content = $script.ob_get_clean();
