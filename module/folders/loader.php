<?php
/**
 * @ver 1.0
 * @module Folders
 * @description Display a list of available folders
 * @access open
 * @css false
 * @js false
*/
$items = $this->app->get_drives()->_folders();
$template_output = '<div class="mod-folders">'."\n";
$template_output .= IND.$this->format_output($this->apply_template('folder_list', array('items' => $this->object_to_array($items))), 1);
$template_output .= '</div>'."\n";

return $template_output;
?>