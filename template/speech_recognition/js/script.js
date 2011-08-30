/**
 * @ver 1.0
*/
jQuery(function($) {
  jQuery('#speed-recognition').bind('webkitspeechchange', function(data) {
    var speech_input = jQuery(this).val();
    jQuery(this).side_panel_add_item('Search Results', speech_input);
    jQuery(this).side_panel_show();
  });
});