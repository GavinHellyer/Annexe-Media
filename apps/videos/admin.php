<?php
$output = $_REQUEST;

$this->app->get_drives();
if (isset($_REQUEST['id'])) {
  $found = $this->app->core->select('*', 'items', array('id' => $_REQUEST['id'], 'type' => IMDB_S));
  if ($found) {
    $output = $this->app->get_imdb_episodes($this->app->core->single($found));
  }
}

if (isset($_REQUEST['title'])) {
  $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : false;
  $this->app->get_imdb($_REQUEST['title'], false, $type);
}
?>
<!-- header -->
  <div class="container-fluid">
    <div class="sidebar">
      <div class="well">
        <h4>Drives</h4>

        <?php $this->load_module('folders'); ?>

      </div>
    </div>
    <div class="content">
      <div class="hero-unit"><?php $this->app->get_videos(); printR($output); ?></div>
    </div>
  </div>
<!-- footer -->