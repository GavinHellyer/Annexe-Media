<?php
if (isset($_REQUEST['key']) && $_REQUEST['key'] == 'something') {
  $imdb = new imdb();
  $title = isset($_REQUEST['title']) ? $_REQUEST['title'] : false;
  $year = isset($_REQUEST['year']) ? $_REQUEST['year'] : false;
  $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : false;

  if ($title) {
    $imdb->get_imdb($title, $year, $type);
  } else {
    $imdb->get_avaliable_drives();
  }
} else {
  echo "You do not have access to view this page.";
}
?>