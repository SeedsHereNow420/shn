<?php
require_once('../../config/config.inc.php');
$token = Tools::getValue('token');
$comparedToken = Tools::getAdminToken('gmtidy');
if ($token != $comparedToken) {
    die('invalid token');
}
require_once ('gmtidy.php');
$tidy = new GMTidy();
if ($tidy->deleteOutdatedSpecificPrices()) {
    echo 'OK';
} else {
    echo 'Error';
}