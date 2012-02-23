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
}

jQuery(function($) {
  // Clear Less Cache
  less.env = 'development';
  destroyLessCache('/apps/videos/theme/green.less');
  destroyLessCache('/css/theme/loader.less');
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
}
