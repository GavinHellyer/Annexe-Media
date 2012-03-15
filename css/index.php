<?php
$_type = basename(dirname(__FILE__));
define('SERVER_ROOT', str_replace($_type, '', dirname(__FILE__)));
define('SERVER_HOST', "http://".$_SERVER['HTTP_HOST'].str_replace('index.php', '', str_replace($_type.'/', '', $_SERVER['PHP_SELF'])));

require_once('../api/api.php');

$less = $core->combine_cjs($_type);
//$contents = CssMin::minify($core->less->parse($less));
$contents = $core->less->parse($less);

header('Content-Type: text/css');
header('Content-Length: '.strlen($contents));
echo $contents;
?>