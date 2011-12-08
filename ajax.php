<?php
ini_set('display_errors','On');
set_time_limit(300);

$time = microtime();

define('SERVER_ROOT', dirname(__FILE__).'/');
define('SERVER_HOST', "http://".$_SERVER['HTTP_HOST'].str_replace('index.php', '', $_SERVER['PHP_SELF']));

require_once('api/api.php');

if (isset($_REQUEST['app'])) {
  $core->set_current_app($_REQUEST['app']);
} else {
  $core->set_current_app('dashboard');
}

$core->call_ajax();
?>