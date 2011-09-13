<?php
$time = microtime();

define('SERVER_ROOT', dirname(__FILE__).'/');
define('SERVER_HOST', "http://".$_SERVER['HTTP_HOST'].str_replace('index.php', '', $_SERVER['PHP_SELF']));

require_once('api/api.php');

if (isset($_REQUEST['app'])) {
  $core->set_current_app($_REQUEST['app']);
} else {
  $core->set_current_app('dashboard');
}

$core->load_cjs('_css', 'gen', 'global', 'global.css');
$core->load_cjs('_js', 'gen', 'jquery', 'jquery.js');
$core->load_cjs('_js', 'gen', 'isotope', 'jquery.isotope.min.js');
//$core->load_cjs('_js', 'gen', 'modernizr', 'modernizr.js');
$core->load_cjs('_js', 'gen', 'global', 'global.js');

if ($core->has_errors()) {
  printR($core->get_errors());
  exit;
}

$core->load_base_template();

if (isset($_REQUEST['admin'])) {
  $core->set_current_page('admin');
} else {
  $core->set_current_page('home');
}

$core->execute_template();

load_time($time);
?>