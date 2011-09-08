<?php
$time = microtime();

define('SERVER_ROOT', dirname(__FILE__).'/');
define('SERVER_HOST', "http://".$_SERVER['HTTP_HOST'].str_replace('index.php', '', $_SERVER['PHP_SELF']));

require_once('api/api.php');

if (isset($_REQUEST['app'])) {
  $core->set_current_app($_REQUEST['app']);
} else {
  $core->set_current_app('videos');
}

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

echo $core->get_errors();
load_time($time);
?>