/**
 * @ver 1.0
*/
jQuery(function($) {
  jQuery().bind('webkitspeechchange', function(data) {
    console.log(data);
  });
});