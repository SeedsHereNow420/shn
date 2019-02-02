<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class LsExportUtil
{

    /**
     * The managed ZipArchieve instance.
     */
    private $zip;

    /**
     * A temporary file in /wp-content/uploads/ to manipulate
     * ZIPs on the fly without permanently saving to file system.
     */
    private $file;


    /**
     * Holds used image URLs in slider to be exported
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
            $upload_dir = ls_upload_dir();
            $tmp_dir = $upload_dir['basedir'];

            // Prepare ZIP to work with
            $this->file = tempnam($tmp_dir, "zip");
            $this->zip = new ZipArchive;
            $this->zip->open($this->file, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
        }
    }


    /**
     * Adds slider settings .json file to ZIP
     *
     * @since 5.0.3
     * @access public
     * @param string $data Slider settings JSON
     * @return void
     */
    public function addSettings($data, $folder = '')
    {
        $folder = !empty($folder) ? $folder.'/' : '';
        $this->zip->addFromString($folder.'settings.json', $data);
    }


    /**
     * Adds slider images to ZIP
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
                    $folder.ls_sanitize_file_name(basename($file))
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
        header('Content-Disposition: attachment; filename="CreativeSlider_Export_'.date('Y-m-d').'_at_'.date('H.i.s').'.zip"');
        header("Content-length: " . filesize($this->file));
        header('Pragma: no-cache');
        header('Expires: 0');
        readfile($this->file);

        // Remove temporary file
        unlink($this->file);
        die();
    }


    public function getImagesForSlider($data)
    {

        // Array to hold image URLs
        $this->imageList = array();

        // Slider Preview
        if (! empty($data['meta'])) {
            $this->_addImageToList($data['meta'], 'previewId', 'preview');
        }

        $this->_addImageToList($data['properties'], 'backgroundimageId', 'backgroundimage');
        $this->_addImageToList($data['properties'], 'yourlogoId', 'yourlogo');


        // Slides
        if (!empty($data['layers']) && is_array($data['layers'])) {
            foreach ($data['layers'] as $slide) {
                $this->_addImageToList($slide['properties'], 'backgroundId', 'background');
                $this->_addImageToList($slide['properties'], 'thumbnailId', 'thumbnail');


                // Layers
                if (!empty($slide['sublayers']) && is_array($slide['sublayers'])) {
                    foreach ($slide['sublayers'] as $layer) {
                        $this->_addImageToList($layer, 'imageId', 'image');
                        $this->_addImageToList($layer, 'posterId', 'poster');
                    }
                }
            }
        }

        return $this->imageList;
    }



    public function fontsForSlider($data)
    {

        $ret = array();
        $usedFonts = array();
        $googleFonts = ls_get_option('ls-google-fonts', array());

        if (!empty($data['layers']) && is_array($data['layers'])) {
            foreach ($data['layers'] as $slide) {
                if (!empty($slide['sublayers']) && is_array($data['layers'])) {
                    foreach ($slide['sublayers'] as $layer) {
                        if (!empty($layer['styles'])) {
                            $layer['styles'] = Tools::stripslashes($layer['styles']);

                            $styles = !empty($layer['styles']) ? Tools::jsonDecode(_ss($layer['styles']), true) : new stdClass;

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
            $upload     = ls_upload_dir();
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
                $filePath = $upload['basedir'] . $urlPath;
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

        if (! empty($data[ $idKey ])) {
            if ($result = ls_get_attachment_image_url($data[ $idKey ], 'full')) {
                $src = $result;
            }
        }

        if (! empty($src)) {
            $this->imageList[] = $src;
        }
    }
}
