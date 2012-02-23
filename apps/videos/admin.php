<?php
$this->app->get_drives();
if (isset($_REQUEST['title'])) {
  $this->app->get_imdb($_REQUEST['title']);
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
      <div class="hero-unit"><?php printR($_REQUEST) ?></div>
    </div>
  </div>
<!-- footer -->