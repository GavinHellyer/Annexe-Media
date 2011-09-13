<?php
/**
 * @ver 1.0
 * @module Dashboard
 * @description List all of the apps
*/
$apps = array();

$d = dir(SERVER_ROOT."apps");
while (false !== ($entry = $d->read())) {
  if (!in_array($entry, array('.', '..', basename(dirname(__FILE__))))) {
    $app_dir = SERVER_ROOT."apps/".$entry."/";
    if (file_exists($app_dir."config.ini")) {
      $config = $this->get_config($app_dir."config.ini");
    }
    $apps[] = array(
      'app' => $entry,
      'name' => ((isset($config->info->name)) ? $config->info->name : $entry),
      'description' => ((isset($config->info->description)) ? $config->info->description : false),
      'icon' => ((file_exists(SERVER_ROOT."apps/".$entry."/icon.png")) ? SERVER_HOST."apps/".$entry."/icon.png" : false)
    );
  }
}
$d->close();

return $this->apply_template('dashboard', array('apps' => $this->object_to_array($apps)));
?>