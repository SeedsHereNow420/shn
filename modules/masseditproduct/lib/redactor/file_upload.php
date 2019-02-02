<?php
require_once('../../../../config/config.inc.php');
// This is a simplified example, which doesn't cover security of uploaded files. 
// This example just demonstrate the logic behind the process.
$dir = _PS_MODULE_DIR_.'adsboard/uploads/file/';
copy($_FILES['file']['tmp_name'], $dir.$_FILES['file']['name']);
					
$array = array(
	'filelink' => _MODULE_DIR_.'masseditproduct/uploads/file/'.$_FILES['file']['name'],
	'filename' => $_FILES['file']['name']
);

echo stripslashes(json_encode($array));