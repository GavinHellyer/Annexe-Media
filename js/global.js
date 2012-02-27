/**
 * @ver 1.0.1
*/
jQuery.fn.delays = function(time, func) {
  return this.each(function() {
    setTimeout(func, time);
  });
};

jQuery.fn.exists = function() {
  return jQuery(this).length > 0;
};

jQuery(function() {
  // Clear Less Cache
  less.env = 'development';
  destroyLessCache('/apps/videos/theme/green.less');
  destroyLessCache('/css/theme/loader.less');

  jQuery('[data-format]').format();
});

// Destroys the localStorage copy of CSS that less.js creates
var destroyLessCache = function(pathToCss) { // e.g. '/css/' or '/stylesheets/'
  if (!window.localStorage || !less || less.env !== 'development') {
    return;
  }
  var host = window.location.host;
  var protocol = window.location.protocol;
  var keyPrefix = protocol + '//' + host + pathToCss;
  for (var key in window.localStorage) {
    if (key.indexOf(keyPrefix) === 0) {
      delete window.localStorage[key];
    }
  }
};

// jQuery ajax function
var ajx = function(options) {
  var defaults = {
    url: '?ajax_call&action=',
    action: '',
    type: 'POST',
    data: { },
    dataType: 'json',
    loader: false,
    fillContainer: true,
    finished: function(msg) { console.log( msg ); },
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

var spinner;
jQuery.fn.spinner = function(options) {
  var defaults = {
    speed: 100,
    deg: 20
  };
  var opts = jQuery.extend({}, defaults, options);

  var start = function() {
    clearInterval(spinner);
    spinner = setInterval(
      function () {
        jQuery('.spinner').rotate(opts.deg);
      },
      opts.speed
    );
  };

  this.each(function() {
    var obj = jQuery(this);
    obj.prepend('<div class="spinner"></div>');
    start();
  });
};

jQuery.fn.rotate = function (val) {
  var rotate = jQuery(this).attr('rotate');
  if (rotate == undefined) {
    rotate = 0;
  }
  rotate = parseInt(rotate) + parseInt(val);
  if (rotate > 360) {
    rotate = rotate - 360;
  }

  jQuery(this).attr('rotate', rotate);
  jQuery(this).css({
    '-webkit-transform': 'rotate(' + rotate + 'deg)',
    '-moz-transform': 'rotate(' + rotate + 'deg)',
    '-o-transform': 'rotate(' + rotate + 'deg)',
    '-ms-transform': 'rotate(' + rotate + 'deg)'
  });
};

jQuery.fn.format = function(options) {
  var defaults = {
  };
  var opts = jQuery.extend({}, defaults, options);

  this.each(function() {
    var obj = jQuery(this);
    var formats = obj.attr('data-format').split(' ');

    for (var i = 0; i < formats.length; i++) {
      var format = formats[i].split('-');

      switch(format[0]) {
        case 'folder':
          switch(format[1]) {
            case 'normal':
              var data = jQuery.trim(obj.html());
              var matches = data.match(/^(([a-z][:][\/]?)||([\/][a-z]+[\/]))?(.*)([\/][a-z-_]+[\/]?)$/i);

              if (matches && (matches[1] + matches[5] != data)) {
                obj.attr('title', data);
                obj.html(matches[1] + '...' + matches[5]);
              }
            break;
          }
        break;
      }
    }
  });
};