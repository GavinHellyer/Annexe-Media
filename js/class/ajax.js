/**
 * @ver 1.0
 * @name jQuery Simple Ajax
 */
var ajx = function(options) {
  var defaults = {
    url: '?ajax_call&action=',
    action: '',
    type: 'POST',
    data: { },
    dataType: 'json',
    loader: false,
    fillContainer: true,
    finished: function(data) { console.log( data ); },
    failed: function(jqXHR, textStatus) { console.log( "Request failed: " + textStatus ); }
  };
  var opts = jQuery.extend({}, defaults, options);

  if (opts.loader) {
    var ajax_loader = jQuery(opts.loader);
    ajax_loader.one('ajaxStart', function() {
      if (opts.fillContainer) {
        ajax_loader.parent().addClass('ajax_container');
      }
      ajax_loader.prepend('<div id="ajax_loader"></div>');
      jQuery('#ajax_loader').spinner();
    });

    ajax_loader.one('ajaxStop', function() {
      if (jQuery('#ajax_loader').length) {
        if (opts.fillContainer) {
          ajax_loader.parent().removeClass('ajax_container');
        }
        jQuery('#ajax_loader').remove();
      }
    });
  }

  var request = jQuery.ajax({
    url: opts.url + opts.action,
    type: opts.type,
    data: opts.data,
    dataType: opts.dataType
  });

  request.done(opts.finished);

  request.fail(opts.failed);
};