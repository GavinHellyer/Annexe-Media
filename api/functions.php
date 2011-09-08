<?php
$devMode = true;

function printR($data) {
  echo "<pre>\n";
  print_r($data);
  echo "</pre>\n";
}

function load_time($time) {
  $time = explode(" ", $time);
  $time = $time[1] + $time[0];
  $start = $time;
  $time = microtime();
  $time = explode(" ", $time);
  $time = $time[1] + $time[0];
  $finish = $time;
  $totalTime = round(($finish - $start), 4);
  echo '<!--This page took '.$totalTime.' seconds to load.-->';
}
?>