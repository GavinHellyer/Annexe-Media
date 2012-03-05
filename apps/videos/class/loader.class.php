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
    $limit_type = isset($_POST['limit_type']) ? $_POST['limit_type'] : false;
    $limit_folder = isset($_POST['limit_folder']) ? $_POST['limit_folder'] : false;

    echo $this->core->format_response(true, $this->get_drives()->get_structure($limit_type, $limit_folder)->_get_type($limit_type));
  }
}
?>