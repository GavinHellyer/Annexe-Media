/**
 * @ver 1.0
*/
jQuery(function($) {
  $('.temp-folder-list .folder-item').on("click", function() {
    var limit_type = $(this).prevUntil('.folder-item-header').andSelf().prev('.folder-item-header').andSelf().attr('data-ajax');
    var limit_folder = $(this).attr('data-ajax');
    ajx({
      action: 'get_files',
      data: { limit_type: limit_type, limit_folder: limit_folder },
      loader: '.hero-unit',
      finished: function(data) {
        var tpl = new TplFileList(data, jQuery('.hero-unit'));
        tpl.render();
      }
    });
  });
});