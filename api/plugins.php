<?php
$d = dir(SERVER_ROOT."plugins");
while (false !== ($entry = $d->read())) {
  if (!in_array($entry, array('.', '..'))) {
    $file = SERVER_ROOT."plugins/".$entry."/loader.php";
    if (file_exists($file)) {
      require_once($file);
    }
  }
}
$d->close();
?>