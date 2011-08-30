<?php
define('SERVER_ROOT', dirname(__FILE__).'/');
define('SERVER_HOST', "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

require_once('api/api.php');

$_this->load_base_template();

if (isset($_REQUEST['admin'])) {
  $_this->set_current_page('admin');
} else {
  $_this->set_current_page('home');
}

$_this->execute_template();
?>