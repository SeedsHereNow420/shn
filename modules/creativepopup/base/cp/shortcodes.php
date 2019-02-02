<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

$GLOBALS['cpLoadPlugins'] = array();

class CpShortcode
{

    // List of already included popups on page.
    // Using to identify duplicates and give them
    // a unique popup ID to avoid issues with caching.
    public static $popupsOnPage = array();

    private function __construct()
    {
    }


    /**
     * Handles the shortcode workflow to display the
     * appropriate content.
     *
     * @since 5.3.3
     * @access public
     * @param array $atts Shortcode attributes
     * @return bool True on successful validation, false otherwise
     */

    public static function handleShortcode($atts = array())
    {
        if (self::validateFilters($atts)) {
            $output = '';
            $item = self::validateShortcode($atts);

            // Show error messages (if any)
            if (! empty($item['error'])) {
                // Bail out early if the visitor has no permission to see error messages
                if (! cp_current_user_can(cp_get_option('cp_custom_capability', 'manage_options'))) {
                    return '';
                }

                // Prevent showing errors for Popups
                if (!empty($atts['popup']) || !empty($item['data']['flag_popup'])) {
                    return '';
                }

                $output .= $item['error'];
            }

            if ($item['data']) {
                $output .= self::processShortcode($item['data'], $atts);
            }

            return $output;
        }
    }


    /**
     * Validates the provided shortcode filters (if any).
     *
     * @since 5.3.3
     * @access public
     * @param array $atts Shortcode attributes
     * @return bool True on successful validation, false otherwise
     */

    public static function validateFilters($atts = array())
    {
        // Bail out early and pass the validation
        // if there aren't filters provided
        if (empty($atts['filters'])) {
            return true;
        }

        return false;
    }


    /**
     * Validates the shortcode parameters and checks
     * the references popup.
     *
     * @since 5.3.3
     * @access public
     * @param array $atts Shortcode attributes
     * @return bool True on successful validation, false otherwise
     */

    public static function validateShortcode($atts = array())
    {
        $error = false;
        $popup = false;

        // Has ID attribute
        if (!empty($atts['id'])) {
            $popupID = (int) $atts['id'];

            // Attempt to retrieve the pre-generated markup
            // set via the Transients API
            if (cp_get_option('cp_use_cache', true)) {
                if ($popup = cp_get_transient('cp-popup-data-'.$popupID)) {
                    $popup['id'] = $popupID;
                    $popup['_cached'] = true;
                }
            }

            // Slider exists and isn't deleted
            if (empty($popup)) {
                $popup = CpInstances::find($popupID);
            }

            // ERROR: No popup with ID was found
            if (empty($popup)) {
                $error = self::generateErrorMarkup(
                    cp__('The popup cannot be found'),
                    null
                );
            }

        // ERROR: No popup ID was provided
        } else {
            $error = self::generateErrorMarkup();
        }

        return array(
            'error' => $error,
            'data' => $popup
        );
    }


    public static function processShortcode($popup, $embed = array())
    {

        // Slider ID
        $sID = 'cp_'.$popup['id'];

        // Check for the '_cached' key in data,
        // indicating that it's a pre-generated
        // popup markup retrieved via Transients
        if (!empty($popup['_cached'])) {
            $output = $popup;

        // No cached copy, generate new markup.
        // Make sure to include some database related
        // data, since we rely on those to display
        // notifications for admins.
        } else {
            $output = self::generatePopupMarkup($popup, $embed);

            $output['id'] = $popup['id'];
            $output['schedule_start'] = $popup['schedule_start'];
            $output['schedule_end'] = $popup['schedule_end'];
            $output['flag_hidden'] = $popup['flag_hidden'];
            $output['flag_deleted'] = $popup['flag_deleted'];

            cp_set_transient('cp-popup-data-'.$popup['id'], $output, CP_HOUR_IN_SECS * 6);
        }

        // Replace popup ID to avoid issues with enabled caching when
        // adding the same popup to a page in multiple times
        if (array_key_exists($popup['id'], self::$popupsOnPage)) {
            $popupCount = ++self::$popupsOnPage[ $popup['id'] ];
            $output['init'] = str_replace($sID, $sID.'_'.$popupCount, $output['init']);
            $output['container'] = str_replace($sID, $sID.'_'.$popupCount, $output['container']);

            $sID = $sID.'_'.$popupCount;
        } else {
            // Add current popup ID to identify duplicates later on
            // and give them a unique popup ID to avoid issues with caching.
            self::$popupsOnPage[ $popup['id'] ] = 1;
        }

        // Filter to override the printed JavaScript init code
        if (cp_has_filter('cp_popup_init')) {
            $output['init'] = cp_apply_filters('cp_popup_init', $output['init'], $popup, $sID);
        }

        // Unify the whole markup after any potential string replacement
        $output['markup'] = $output['container'].$output['markup'];

        // Filter to override the printed HTML markup
        if (cp_has_filter('cp_popup_markup')) {
            $output['markup'] = cp_apply_filters('cp_popup_markup', $output['markup'], $popup, $sID);
        }

        // Origami & Popup
        if (!empty($output['plugins'])) {
            $GLOBALS['cpLoadPlugins'] = array_merge($GLOBALS['cpLoadPlugins'], $output['plugins']);
            foreach ($output['plugins'] as $plg) {
                cp_enqueue_script('cp-'.$plg);
                cp_enqueue_style('cp-'.$plg);
            }
        }

        return $output['markup'].$output['init'];
    }


    public static function generatePopupMarkup($popup = null, $embed = array())
    {
        // Bail out early if no params received or using Popup on unactivated sites
        if (!$popup) {
            return array('init' => '', 'container' => '', 'markup' => '');
        }

        // Slider and markup data
        $id = $popup['id'];
        $popupID = 'cp_'.$id;
        $pages = $popup['data'];

        // Store generated output
        $cpInit = array();
        $cpContainer = array();
        $cpMarkup = array();
        $cpPlugins = array();

        // Include popup file
        if (is_array($pages)) {
            // Get CpQuery
            if (! defined('CP_QUERY')) {
                libxml_use_internal_errors(true);
                include CP_ROOT_PATH.'/helpers/CpQuery.php';
            }

            include CP_ROOT_PATH.'/config/defaults.php';
            include CP_ROOT_PATH.'/includes/markup_setup.php';
            include CP_ROOT_PATH.'/includes/markup_html.php';
            include CP_ROOT_PATH.'/includes/markup_init.php';

            $cpInit = implode('', $cpInit);
            $cpContainer = implode('', $cpContainer);
            $cpMarkup = implode('', $cpMarkup);
        }

        // Concatenate output
        if (cp_get_option('cp_concatenate_output', false)) {
            $cpInit = trim(preg_replace('/\s+/u', ' ', $cpInit));
            $cpContainer = trim(preg_replace('/\s+/u', ' ', $cpContainer));
            $cpMarkup = trim(preg_replace('/\s+/u', ' ', $cpMarkup));
        }

        // Bug fix in v5.4.0: Use self closing tag for <source>
        $cpMarkup = str_replace('></source>', ' />', $cpMarkup);

        // Return formatted data
        return array(
            'init' => $cpInit,
            'container' => $cpContainer,
            'markup' => $cpMarkup,
            'plugins' => array_unique($cpPlugins)
        );
    }


    public static function generateErrorMarkup($title = null, $description = null, $logo = 'dashicons-warning', $customClass = '')
    {

        if (! $title) {
            $title = cp__('Creative Popup encountered a problem while it tried to show your popup.');
        }

        if (is_null($description)) {
            $description = cp__("Please make sure that you've used the right method to insert the popup, and check if the corresponding popup exists and it wasn't deleted previously.");
        }

        if ($description) {
            $description .= '<br><br>';
        }

        $logo = $logo ? '<i class="cpps-notification-logo dashicons '.$logo.'"></i>' : '';
        $notice = cp__('Only you and other administrators can see this to take appropriate actions if necessary.');

        $classes = array('error', 'info', 'scheduled', 'dead');
        if (! empty($customClass) && ! in_array($customClass, $classes)) {
            $customClass = '';
        }


        return '<div class="clearfix cpps-notification '.$customClass.'">
                    '.$logo.'
                    <strong>'.$title.'</strong>
                    <span>'.$description.'</span>
                    <small>
                        <i class="dashicons dashicons-lock"></i>
                        '.$notice.'
                    </small>
                </div>';
    }
}
