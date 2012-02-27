<?php
/**
 * @ver 1.0
 * @order 100
 */
class loader extends imdb {
  public function __construct() {
    parent::__construct();
  }

  public function ajax_get_files() {
    $type = isset($_POST['type']) ? $_POST['type'] : false;

    echo $this->core->format_response(true, $this->get_drives()->get_videos()->get_files_by_type($type));
  }
}
?>