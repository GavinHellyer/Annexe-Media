/**
 * @ver 1.1
*/
jQuery(function() {
  jQuery('[data-format]').format();

  jQuery('.hidden-data-show').live("click", function() {
    jQuery(this).parent().children('[data-hidden]').toggle(200);
  });
});