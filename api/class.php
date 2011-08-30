<?php
require_once('class/core.class');

$d = dir(SERVER_ROOT."api/class");
$class = array();
while (false !== ($entry = $d->read())) {
  if (!in_array($entry, array('.', '..', 'core.class'))) {
    $comments = core::get_file_comments(SERVER_ROOT."api/class/".$entry);
    $class[$comments->order] = $entry;
  }
}
$d->close();

ksort($class);
foreach ($class as $order => $entry) {
  require_once('class/'.$entry);
}
?>