<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class CpSources
{
    // handle => path
    public static $skins = array();
    public static $transitions = array();

    private function __construct()
    {
    }

    /**
     * Adds the skins from the directory provided, so
     * users can select them in the popup settings.
     *
     * @since 5.3.0
     * @access public
     * @param string $path Path to directory that holds your skins. It's assumed to be a direct skin folder if it contains a skin.css file.
     * @return void
     */
    public static function addSkins($path)
    {

        $skinsPath = $skins = array();
        $path = rtrim($path, '/\\');

        // It's a direct skin folder
        if (file_exists($path.'/skin.css')) {
            $skinsPath = array($path);
        } else { // Get all children if it's a parent directory
            $skinsPath = glob($path.'/*', GLOB_ONLYDIR);
        }

        // Iterate over the skins
        foreach ($skinsPath as $key => $path) {
            // Exclude non-valid skins
            if (!file_exists($path.'/skin.css')) {
                continue;
            }

            // Gather skin data
            $handle = Tools::strtolower(basename($path));
            $skins[$handle] = array(
                'name' => $handle,
                'handle' => $handle,
                'dir' => $path,
                'file' => $path.DIRECTORY_SEPARATOR.'skin.css'
            );

            // Get skin info (if any)
            if (file_exists($path.'/info.json')) {
                $skins[$handle]['info'] = Tools::jsonDecode(Tools::file_get_contents($path.'/info.json'), true);
                $skins[$handle]['name'] = $skins[$handle]['info']['name'];
            }
        }

        self::$skins = array_merge(self::$skins, $skins);
        ksort(self::$skins);
    }


    /**
     * Removes a previously added skin by its folder name as being $handle.
     *
     * @since 5.3.0
     * @access public
     * @param string $skin The name of the skin/folder
     * @return void
     */
    public static function removeSkin($handle)
    {
        unset(self::$skins[ Tools::strtolower($handle) ]);
    }


    /**
     * Returns skin information by its folder name as being $handle.
     *
     * @since 5.3.0
     * @access public
     * @param string $skin The name of the skin/folder
     * @return array Skin details
     */
    public static function getSkin($handle)
    {
        return self::$skins[ Tools::strtolower($handle) ];
    }


    /**
     * Returns all skins.
     *
     * @since 5.3.0
     * @access public
     * @return array Array of all skins
     */
    public static function getSkins()
    {
        return self::$skins;
    }


    /**
     * Returns the directory path of a skin by its folder name as being $handle
     *
     * @since 5.3.0
     * @access public
     * @param string $skin The name of the skin/folder
     * @return string Path for the skin's directory
     */
    public static function pathForSkin($handle)
    {
        return self::$skins[ Tools::strtolower($handle) ]['dir'] . DIRECTORY_SEPARATOR;
    }


    /**
     * Returns the directory path of a skin by its folder name as being $handle
     *
     * @since 5.3.0
     * @access public
     * @param string $skin The name of the skin/folder
     * @return string URL for the skin's directory
     */
    public static function urlForSkin($handle)
    {
        $path = self::$skins[ Tools::strtolower($handle) ]['dir'];
        $url = cp_content_url() . str_replace(realpath(CP_CONTENT_DIR), '', realpath($path)).'/';
        return str_replace('\\', '/', $url);
    }
}
