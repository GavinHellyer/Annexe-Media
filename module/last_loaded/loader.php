<?php
/**
 * @ver 1.0
 * @module Last Loaded
 * @description Display the last few items that were loaded
 * @access secure
 * @css true
 * @js true
*/
$this->set_effect(
  array(
    '_rating_width' => 75,
    '_rating_title' => 'Rated %1$s/%2$s'
  )
);

$items = $this->select('items', false, true, 5);

$template_output = $this->apply_template('item_list', array('items' => $this->object_to_array($items)));

return $template_output;
?>