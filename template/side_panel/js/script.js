/**
 * @ver 1.0
*/
jQuery(function($) {
  jQuery('body').live("click", function() {
    jQuery(this).side_panel_hide();
  });
  
  jQuery('.panel-side').live("click", function(e) {
    e.stopPropagation();
  });
});

jQuery.fn.side_panel_show = function() {
  var width = parseInt(jQuery('.panel-side').css('width'));
  if (width == 0) {
    jQuery('.panel-side').stop(true, true).animate({
      'width': '45%'
    }, 400);
    return true;
  }
  return false;
};

jQuery.fn.side_panel_hide = function() {
  var width = parseInt(jQuery('.panel-side').css('width'));
  if (width > 0) {
    jQuery('.panel-side').stop(true, true).animate({
      'width': '0px'
    }, 400);
    return true;
  }
  return false;
};