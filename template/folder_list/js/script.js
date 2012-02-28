/**
 * @ver 1.0
*/
jQuery(function($) {
  $('.temp-folder-list .folder-item').on("click", function() {
    var type = $.trim($(this).prevUntil('.folder-header').html());
    ajx({
      action: 'get_files',
      data: { type: type },
      loader: '.hero-unit',
      finished: function(data) {
        var tpl = new TplFileList(data, jQuery('.hero-unit'));
        tpl.render();
      }
    });
  });
});