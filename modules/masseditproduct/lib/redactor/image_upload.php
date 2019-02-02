<?php
require_once('../../../../config/config.inc.php');
$file = Tools::fileAttachment('file');
//if (in_array(exif_imagetype($file['tmp_name']), array(IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_PNG)))
if (1)
{
    $dir = _PS_MODULE_DIR_.'masseditproduct/uploads/image/';
	$filename = md5(date('YmdHis')).'.jpg';
    $file = $dir.$filename;
    call_user_func_array('copy', array($_FILES['file']['tmp_name'], $file));
	$array = array(
		'filelink' => _MODULE_DIR_.'masseditproduct/uploads/image/'.$filename
	);
	die(stripslashes(json_encode($array)));
}
