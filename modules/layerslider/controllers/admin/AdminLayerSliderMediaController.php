<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class AdminLayerSliderMediaController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
        define('LS_MEDIA_PATH', __PS_BASE_URI__."modules/{$this->module->name}/mediamanager/");
        define('LS_MEDIA_DIR', _PS_MODULE_DIR_.$this->module->name.'/mediamanager/');
        include LS_MEDIA_DIR.'php/functions.php';
    }

    public function postProcess()
    {
        parent::postProcess();
        if (isset($this->context->cookie->ls_error)) {
            $this->errors[] = $this->context->cookie->ls_error;
            unset($this->context->cookie->ls_error);
        }
        $action = Tools::getValue('action', '');
        if ($action) {
            $this->{'action'.$action}();
        }
    }

    public function actionListImages()
    {
        $dir = preg_replace('/\.+/', '.', Tools::getValue('d'));
        $imagepath = _PS_IMG_DIR_.$dir;

        $del = Tools::getValue('del');
        if ($del) {
            $delimagepath = $imagepath.urldecode($del);

            if (file_exists($delimagepath)) {
                unlink($delimagepath);
            }
        }

        if (is_dir($imagepath)) {
            $files = scandir($imagepath);
        }

        // $array_count = 0;
        $files_array = array();

        if ($imagepath != _PS_IMG_DIR_) {
            $files_array[] = '..';
        }

        foreach ($files as $file_name) {
            $file_path = $imagepath.$file_name;
            if (is_dir($file_path) && $file_name[0] !== '.') {
                $files_array[] = $file_name;
            }
        }
        $pattern = '/\.(jpg|jpe|jpeg|png|gif|bmp)$/';
        // $mediatype = Tools::getValue('type', 'image');
        foreach ($files as $file_name) {
            $file_path = $imagepath.$file_name;
            if (is_file($file_path) && $file_name[0] !== '.' && preg_match($pattern, $file_name)) {
                $files_array[] = $file_name;
            }
        }

        $nofiles = count($files_array);
        $resultspp = 4096;
        $nopages = ceil($nofiles / $resultspp);

        $pageno = Tools::getValue('p');

        $error = array(
            'thumbhtml' => iconv('UTF-8', 'UTF-8//IGNORE', display_gallery_page($files_array, $pageno, $dir, $resultspp, false)),
            'paginationhtml' => display_gallery_pagination('', count($files_array), $pageno, $resultspp, false),
            'noofpages' => $nopages
        );

        die(Tools::jsonEncode(array($error)));
    }

    public function actionUploadFile()
    {
        $uploadfolder = _PS_IMG_DIR_;
        $reluploadfolder = _PS_IMG_;

        if (Tools::getIsset('uploadfolder')) {
            $dir = preg_replace('/\.+/', '.', Tools::getValue('uploadfolder'));
            $uploadfolder .= $dir;
            $reluploadfolder .= $dir;
        }
        if (file_exists($uploadfolder)) {
            if (isset($_FILES['userfile']['name'])) {
                $mediatype = Tools::getValue('mediatype');

                $tname = $_FILES['userfile']['name'];

                $name = strtr($tname, 'ŔÁÂĂÄĹÇČÉĘËĚÍÎĎŇÓÔŐÖŮÚŰÜÝŕáâăäĺçčéęëěíîďđňóôőöůúűüý˙', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $name = preg_replace('/\s+/', '-', $name);

                $fileext = Tools::strtolower(pathinfo($name, PATHINFO_EXTENSION));

                $filename = Tools::strtolower(pathinfo($name, PATHINFO_FILENAME));

                $destination = $uploadfolder.$name;
                $reldestination = $reluploadfolder.$name;

                if (file_exists($destination)) {
                    $uniqid = uniqid();
                    $filename = $filename.'_'.$uniqid;
                    $name = $filename.'.'.$fileext;
                    $destination = $uploadfolder.$name;
                    $reldestination = $reluploadfolder.$name;
                }

                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $destination)) {
                    $uploadinfo = new stdClass();

                    $uploadinfo->name = $name;
                    $uploadinfo->destination = $reldestination;
                    $uploadinfo->mediatype = $mediatype;
                    die(Tools::jsonEncode(array($uploadinfo)));
                } else {
                    $error = array('error' => 'There was a problem uploading the file, please try again');
                    die(Tools::jsonEncode(array($error)));
                }
            } else {
                $error = array('error' => 'No file sent');
                die(Tools::jsonEncode(array($error)));
            }
        } else {
            $error = array('error' => 'Upload folder not correctly configured! '.$uploadfolder);
            die(Tools::jsonEncode(array($error)));
        }
    }

    public function display()
    {
        ob_start();
        require_once _PS_MODULE_DIR_.$this->module->name.'/mediamanager/mediamanager.php';
        $this->content = ob_get_contents();
        ob_end_clean();
        die($this->content);
    }
}
