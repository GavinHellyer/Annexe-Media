/**
 * @ver 1.0
*/
jQuery(function($) {
  jQuery('body').on("click", function() {
    jQuery(this).side_panel_hide();
  });
  
  jQuery('.side-panel').on("click", function(e) {
    e.stopPropagation();
  });
  
  jQuery('.side-panel-container').on('mouseenter', function() {
    jQuery('.side-panel-container-content', this).stop(true, true).slideDown(400);
  });
  
  jQuery('.side-panel-container').on('mouseleave', function() {
    jQuery('.side-panel-container-content', this).stop(true, true).slideUp(400);
  });
});

jQuery.fn.side_panel_add_item = function(header, content) {
  var html = '<div class="side-panel-container">' +
    '<div class="side-panel-container-header">'+header+'</div>' +
    '<div class="side-panel-container-content">'+content+'</div>' +
  '</div>';
  jQuery('.side-panel-data').append(html);
  jQuery('.side-panel-container').animate({
    'width': '100%'
  }, 400);
}

jQuery.fn.side_panel_show = function() {
  var width = parseInt(jQuery('.side-panel').css('width'));
  if (width == 0) {
    jQuery('.side-panel').stop(true, true).animate({
      'width': '45%'
    }, 400);
    return true;
  }
  return false;
};

jQuery.fn.side_panel_hide = function() {
  var width = parseInt(jQuery('.side-panel').css('width'));
  if (width > 0) {
    jQuery('.side-panel').stop(true, true).animate({
      'width': '0px'
    }, 400);
    return true;
  }
  return false;
};