<?php
require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');

$files_list = scandir(dirname(__FILE__).'/content_templates/');
$article_templates = array();

foreach ($files_list as $file)
	if (strripos($file, '.html') > 0)
        $article_templates[] = $file;

if(!count($article_templates))
    die;

$list = array();
foreach($article_templates as $k => $v)
{
    $temp = array(
        'title' => $v,
        'description' => '',
        'url' => _MODULE_DIR_.'steasycontent/content_templates/'.$v
    );
    $list[] = $temp;
}
echo Tools::jsonEncode($list);
?>