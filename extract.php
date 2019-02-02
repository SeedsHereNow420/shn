<?php

//system('unzip cardTricks.zip');
//shell_exec('unzip cardTricks.zip');

/* 
$zip = new ZipArchive;
$res = $zip->open('cardTricks.zip');
if ($res === TRUE) {
  $zip->extractTo('cardTricks');
  $zip->close();
  echo 'woot!';
} else {
  echo 'doh!';
} */

 $result = array();
    exec("unzip phpMyAdmin-4.7.0-all-languages.zip", $result, $returnval);
    print_r($result);
    print_r($returnval);
	
?>