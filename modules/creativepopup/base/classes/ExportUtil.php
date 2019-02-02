<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class CpExportUtil
{

    /**
     * The managed ZipArchieve instance.
     */
    private $zip;

    /**
     * A temporary file to manipulate
     * ZIPs on the fly without permanently saving to file system.
     */
    private $file;


    /**
     * Holds used image URLs in popup to be exported
     */
    private $imageList;


    /**
     * Prepares a ZipArchieve instance and the file system
     * to work with the class.
     *
     * @since 5.0.3
     * @access public
     * @return void
     */
    public function __construct()
    {

        // Check for ZipArchieve
        if (class_exists('ZipArchive')) {
            // Temporary directory for file operations
            $upload_dir = cp_upload_dir();
            $tmp_dir = $upload_dir['basedir'];

            // Prepare ZIP to work with
            $this->file = tempnam($tmp_dir, "zip");
            $this->zip = new ZipArchive;
            $this->zip->open($this->file, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
        }
    }


    /**
     * Adds popup settings .json file to ZIP
     *
     * @since 5.0.3
     * @access public
     * @param string $data popup settings JSON
     * @return void
     */
    public function addSettings($data, $folder = '')
    {
        $folder = !empty($folder) ? $folder.'/' : '';
        $this->zip->addFromString($folder.'settings.json', $data);
    }


    /**
     * Adds popup images to ZIP
     *
     * @since 5.0.3
     * @access public
     * @param string $path Image path to add
     * @return void
     */
    public function addImage($files, $folder = '')
    {

        // Check file
        if (empty($files)) {
            return false;
        }

        // Check file type
        if (!is_array($files)) {
            $files = array($files);
        }

        // Check folder
        $folder = is_string($folder) ? $folder.'/uploads/' : 'uploads/';

        // Add contents to ZIP
        foreach ($files as $file) {
            if (!empty($file) && is_string($file)) {
                $this->zip->addFile(
                    $file,
                    $folder.cp_sanitize_file_name(basename($file))
                );
            }
        }
    }


    /**
     * Closes all pending operations and downloads the ZIP file.
     *
     * @since 5.0.3
     * @access public
     * @return void
     */
    public function download()
    {

        // Close ZIP operations
        $this->zip->close();

        // Set headers and to user
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="CreativePopup_Export_'.date('Y-m-d').'_at_'.date('H.i.s').'.zip"');
        header("Content-length: " . filesize($this->file));
        header('Pragma: no-cache');
        header('Expires: 0');
        readfile($this->file);

        // Remove temporary file
        unlink($this->file);
        die();
    }


    public function getImagesForPopup($data)
    {

        // Array to hold image URLs
        $this->imageList = array();

        // Popup Preview
        if (! empty($data['meta'])) {
            $this->_addImageToList($data['meta'], 'previewId', 'preview');
        }

        $this->_addImageToList($data['properties'], 'backgroundimageId', 'backgroundimage');

        // Pages
        if (!empty($data['layers']) && is_array($data['layers'])) {
            foreach ($data['layers'] as $page) {
                $this->_addImageToList($page['properties'], 'backgroundId', 'background');
                $this->_addImageToList($page['properties'], 'thumbnailId', 'thumbnail');


                // Layers
                if (!empty($page['sublayers']) && is_array($page['sublayers'])) {
                    foreach ($page['sublayers'] as $layer) {
                        $this->_addImageToList($layer, 'imageId', 'image');
                        $this->_addImageToList($layer, 'posterId', 'poster');
                    }
                }
            }
        }

        return $this->imageList;
    }



    public function fontsForPopup($data)
    {

        $ret = array();
        $usedFonts = array();
        $googleFonts = cp_get_option('cp-google-fonts', array());

        if (!empty($data['layers']) && is_array($data['layers'])) {
            foreach ($data['layers'] as $page) {
                if (!empty($page['sublayers']) && is_array($data['layers'])) {
                    foreach ($page['sublayers'] as $layer) {
                        if (!empty($layer['styles'])) {
                            $layer['styles'] = Tools::stripslashes($layer['styles']);

                            $styles = !empty($layer['styles']) ? Tools::jsonDecode(cp_ss($layer['styles']), true) : new stdClass;

                            if (!empty($styles['font-family'])) {
                                $families = explode(',', $styles['font-family']);
                                foreach ($families as $family) {
                                    $family = trim($family, " \"'\t\n\r\0\x0B");

                                    if (!empty($family)) {
                                        $usedFonts[] = Tools::strtolower($family);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        foreach ($googleFonts as $font) {
            list($family, $weights) = explode(':', $font['param']);
            $family = Tools::strtolower(str_replace('+', ' ', $family));

            if (array_search($family, $usedFonts) !== false) {
                $font['admin'] = false;
                $ret[] = $font;
            }
        }

        return $ret;
    }


    public function getFSPaths($urls)
    {

        if (!empty($urls) && is_array($urls)) {
            $paths         = array();
            $upload     = cp_upload_dir();
            $uploadDir     = basename($upload['basedir']);


            foreach ($urls as $url) {
                // Get URL relative to the uploads folder
                $urlPath = parse_url($url, PHP_URL_PATH);
                $urlPath = explode("/$uploadDir/", $urlPath);

                if (empty($urlPath[1])) {
                    continue;
                }

                $urlPath = $urlPath[1];

                // Get file path
                $filePath = $upload['basedir'].$urlPath;
                $filePath = realpath($filePath);

                // Add to array
                if (file_exists($filePath) && is_file($filePath)) {
                    $paths[] = $filePath;
                }
            }

            return $paths;
        }

        return array();
    }

    protected function _addImageToList($data, $idKey = '', $urlKey = '')
    {
        if (! empty($data[ $urlKey ])) {
            $src = $data[ $urlKey ];
        }

        if (! empty($src)) {
            $this->imageList[] = $src;
        }
    }
}
