<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class CpImportUtil
{
    // Counts the number of popups imported.
    public $popupCount = 0;

    // Database ID of the lastly imported popup.
    public $lastImportId;

    // The managed ZipArchieve instance.
    private $zip;

    // Target folders
    private $uploadsDir;
    private $targetDir;
    private $targetURL;
    private $tmpDir;

    // Imported images
    private $imported = array();


    // Accepts $_FILES
    public function __construct($archive, $name = null)
    {

        // Attempt to workaround memory limit & execution time issues
        @ini_set('max_execution_time', 0);
        @ini_set('memory_limit', '256M');

        if (empty($name)) {
            $name = $archive;
        }

        // TODO: check file extension to support old import method
        $type = cp_check_filetype(basename($name), array(
            'zip' => 'application/zip',
            'json' => 'application/json'
        ));

        // Check for ZIP
        if (!empty($type['ext']) && $type['ext'] == 'zip') {
            if (class_exists('ZipArchive')) {
                // Remove previous uploads (if any)
                $this->cleanup();

                // Extract ZIP
                $this->zip = new ZipArchive;
                if ($this->zip->open($archive)) {
                    if ($this->unpack($archive)) {
                        // Uploaded folders
                        foreach (glob($this->tmpDir.'/*', GLOB_ONLYDIR) as $key => $dir) {
                            $this->imported = array();

                            if (!isset(${'_POST'}['skip_images'])) {
                                $this->uploadMedia($dir);
                            }

                            if (file_exists($dir.'/settings.json')) {
                                $this->lastImportId = $this->addPopup($dir.'/settings.json');
                            }
                        }

                        // Finishing up
                        $this->cleanup();
                        return true;
                    }

                    // Close ZIP
                    $this->zip->close();
                }
            } else {
                cp_redirect('index.php?controller=AdminCreativePopup&error=1&message=exportZipError');
            }


        // Check for JSON
        } elseif (!empty($type['ext']) && $type['ext'] == 'json') {
            // Get decoded file data
            $data = Tools::file_get_contents($archive);
            if ($decoded = call_user_func('base'.'64_decode', $data, true)) {
                if (!$parsed = Tools::jsonDecode($decoded, true)) {
                    $parsed = unserialize($decoded);
                }

            // Since v5.1.1
            } else {
                $parsed = array(Tools::jsonDecode($data, true));
            }

            // Iterate over imported popups
            if (is_array($parsed)) {
                // Import popups
                foreach ($parsed as $item) {
                    // Increment the popup counter
                    $this->popupCount++;

                    // Fix for export issue in v4.6.4
                    if (is_string($item)) {
                        $item = Tools::jsonDecode($item, true);
                    }

                    $this->lastImportId = CpInstances::add($item['properties']['title'], $item);
                }
            }
        }

        // Return false otherwise
        return false;
    }



    public function unpack($archive)
    {

        // Get uploads folder
        $uploads = cp_upload_dir();

        // Check if /uploads dir is writable
        if (is_writable($uploads['basedir'])) {
            // Get target folders
            $this->uploadsDir     = $uploads['basedir'];
            $this->targetDir     = $targetDir = $uploads['basedir'].'/creativepopup';
            $this->targetURL     = $uploads['baseurl'].'creativepopup';
            $this->tmpDir         = $tmpDir = $uploads['basedir'].'/creativepopup/tmp';

            // Create necessary folders under /uploads
            if (! file_exists($targetDir)) {
                mkdir($targetDir, 0755);
            }
            if (! file_exists($targetDir)) {
                mkdir($targetDir, 0755);
            }

            // Unpack archive
            if ($this->zip->extractTo($tmpDir)) {
                return true;
            }
        }

        return false;
    }




    public function uploadMedia($dir = null)
    {

        // Check provided data
        if (empty($dir) || !is_string($dir) || !file_exists($dir.'/uploads')) {
            return false;
        }

        // Create folder if it isn't exists already
        $targetDir = $this->targetDir . '/' . basename($dir);
        if (! file_exists($targetDir)) {
            mkdir($targetDir, 0755);
        }

        // Iterate through directory
        foreach (glob($dir.'/uploads/*') as $filePath) {
            $fileName     = cp_sanitize_file_name(basename($filePath));
            $targetFile = $targetDir.'/'.$fileName;
            $targetURL     = $this->targetURL.'/'.basename($dir).'/'.$fileName;

            // Validate media
            $filetype = cp_check_filetype($fileName, null);
            if (!empty($filetype['ext']) && $filetype['ext'] != 'php') {
                // New upload
                if (! $attach_id = $this->attachIDForURL($targetURL, $targetFile)) {
                    // Move item to place
                    rename($filePath, $targetFile);

                    // Upload to media library
                    $attachment = array(
                        'guid' => $targetFile,
                        'post_mime_type' => $filetype['type'],
                        'post_title' => preg_replace('/\.[^.]+$/', '', $fileName),
                        'post_content' => '',
                        'post_status' => 'inherit'
                    );

                    $this->imported[$fileName] = array(
                        'id' => 0,
                        'url' => $this->targetURL.'/'.basename($dir).'/'.$fileName
                    );

                // Already uploaded
                } else {
                    $this->imported[$fileName] = array(
                        'id' => $attach_id,
                        'url' => $targetURL
                    );
                }
            }
        }

        return true;
    }



    public function deleteDir($dir)
    {
        if (!file_exists($dir)) {
            return true;
        }
        if (!is_dir($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!$this->deleteDir($dir.DIRECTORY_SEPARATOR.$item)) {
                return false;
            }
        }
        return rmdir($dir);
    }




    public function addPopup($file)
    {
        // Increment the popup counter
        $this->popupCount++;

        // Get popup data and title
        $data = Tools::jsonDecode(call_user_func('file'.'_get_contents', $file), true);
        $title = $data['properties']['title'];

        // Import Google Fonts used in popup
        if (isset($data['googlefonts'])) {
            $this->addGoogleFonts($data);
            unset($data['googlefonts']);
        }

        // Popup Preview
        if (! empty($data['meta']) && ! empty($data['meta']['preview'])) {
            $data['meta']['previewId'] = $this->attachIDForImage($data['meta']['preview']);
            $data['meta']['preview'] = $this->attachURLForImage($data['meta']['preview']);
        }

        // Popup settings
        if (!empty($data['properties']['backgroundimage'])) {
            $data['properties']['backgroundimageId'] = $this->attachIDForImage($data['properties']['backgroundimage']);
            $data['properties']['backgroundimage'] = $this->attachURLForImage($data['properties']['backgroundimage']);
        }

        // Pages
        if (!empty($data['layers']) && is_array($data['layers'])) {
            foreach ($data['layers'] as &$page) {
                if (!empty($page['properties']['background'])) {
                    $page['properties']['backgroundId'] = $this->attachIDForImage($page['properties']['background']);
                    $page['properties']['background'] = $this->attachURLForImage($page['properties']['background']);
                    $page['properties']['backgroundThumb'] = $page['properties']['background'];
                }

                if (!empty($page['properties']['thumbnail'])) {
                    $page['properties']['thumbnailId'] = $this->attachIDForImage($page['properties']['thumbnail']);
                    $page['properties']['thumbnail'] = $this->attachURLForImage($page['properties']['thumbnail']);
                    $page['properties']['thumbnailThumb'] = $page['properties']['thumbnail'];
                }

                // Layers
                if (!empty($page['sublayers']) && is_array($page['sublayers'])) {
                    foreach ($page['sublayers'] as &$layer) {
                        if (! empty($layer['image'])) {
                            $layer['imageId'] = $this->attachIDForImage($layer['image']);
                            $layer['image'] = $this->attachURLForImage($layer['image']);
                            $layer['imageThumb'] = $layer['image'];
                        }

                        if (! empty($layer['poster'])) {
                            $layer['posterId'] = $this->attachIDForImage($layer['poster']);
                            $layer['poster'] = $this->attachURLForImage($layer['poster']);
                            $layer['posterThumb'] = $layer['poster'];
                        }
                    }
                }
            }
        }

        // Add popup
        return CpInstances::add($title, $data);
    }



    public function addGoogleFonts($data)
    {

        // Get current Google Fonts
        $googleFonts = cp_get_option('cp-google-fonts', array());
        $fontNames = array();


        // Gather used font names
        foreach ($googleFonts as $item) {
            $font = explode(':', $item['param']);
            $fontNames[ $font[0] ] = $item;
        }

        // Merge google fonts
        foreach ($data['googlefonts'] as $font) {
            // If no font-weight is specified, default to regular 400
            // since Google Fonts do exactly this as well.
            if (Tools::substr(trim($font['param']), ':') === false) {
                $font['param'] .= ':regular';
            }

            list($family, $weights) = explode(':', $font['param']);

            // New font, just add
            if (! isset($fontNames[$family])) {
                $fontNames[$family] = $font;

            // Existing font, merge variants
            } else {
                $w = array();

                foreach (explode(',', $weights) as $weight) {
                    $w[$weight] = true;
                }

                // If no font-weight is specified, default to regular 400
                // since Google Fonts do exactly this as well.
                if (Tools::substr(trim($fontNames[ $family ]['param']), ':') === false) {
                    $fontNames[ $family ]['param'] .= ':regular';
                }

                list($family, $weights) = explode(':', $fontNames[ $family ]['param']);
                foreach (explode(',', $weights) as $weight) {
                    $w[$weight] = true;
                }

                $fontNames[ $family ] = $font;
                $fontNames[ $family ]['param'] = $family .':'. implode(',', array_keys($w));
            }
        }

        // Update Google Fonts
        $googleFonts = array();
        foreach ($fontNames as $font) {
            $googleFonts[] = $font;
        }

        cp_update_option('cp-google-fonts', $googleFonts);
    }



    public function attachURLForImage($file = '')
    {

        if (isset($this->imported[ basename($file) ])) {
            return $this->imported[ basename($file) ]['url'];
        }

        return $file;
    }


    public function attachIDForImage($file = '')
    {

        if (isset($this->imported[ basename($file) ])) {
            return $this->imported[ basename($file) ]['id'];
        }

        return '';
    }

    public function attachIDForURL($url, $path)
    {
        $cpdb = CpDb::getInstance();

        if (empty($this->uploadsDir)) {
            $uploads = cp_upload_dir();
            $this->uploadsDir = $uploads['basedir']; // trailingslashit($uploads['basedir']);
        }

        $imgPath  = explode(parse_url($this->uploadsDir, PHP_URL_PATH), $path);
        $attachs = $cpdb->getCol($cpdb->prepare("SELECT ID FROM {$cpdb->prefix}posts WHERE guid RLIKE %s;", $imgPath[1]));


        return ! empty($attachs[0]) ? $attachs[0] : 0;
    }

    public function cleanup()
    {
        $this->deleteDir($this->tmpDir);
    }
}
