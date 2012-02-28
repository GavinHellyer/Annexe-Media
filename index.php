<?php
ini_set('display_errors','On');
set_time_limit(300);

$time = microtime();

define('SERVER_ROOT', dirname(__FILE__).'/');
define('SERVER_HOST', "http://".$_SERVER['HTTP_HOST'].str_replace('index.php', '', $_SERVER['PHP_SELF']));

if (isset($_REQUEST['template'])) {
  if (file_exists(SERVER_ROOT.'js/template/'.$_REQUEST['template'].'.html')) {
    echo file_get_contents(SERVER_ROOT.'js/template/'.$_REQUEST['template'].'.html');
  } else {
    echo 'Template not found';
  }
  exit;
}

require_once('api/api.php');

if (isset($_REQUEST['app'])) {
  $core->set_current_app($_REQUEST['app']);
} else {
  $core->set_current_app('dashboard');
}

if (isset($_REQUEST['ajax_call'])) {
  $core->call_ajax();
}

$core->load_cjs('_css', 'gen', 'global', 'global.less');
$core->load_cjs('_js', 'gen', 'jquery', 'jquery.js');
$core->load_cjs('_js', 'gen', 'less', 'less.js');
$core->load_cjs('_js', 'gen', 'isotope', 'jquery.isotope.min.js');
$core->load_cjs('_js', 'gen', 'core', 'core.js');
$core->load_cjs('_js', 'gen', 'template', 'template/loader.js');
$core->load_cjs('_js', 'gen', 'global', 'global.js');

$core->load_base_template();

if (isset($_REQUEST['page'])) {
  $core->set_current_page($_REQUEST['page']);
} else {
  $core->set_current_page('home');
}

$core->execute_template();

load_time($time);
?>