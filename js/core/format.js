/**
 * @ver 1.0
 * @name jQuery Format Strings
 */
jQuery.fn.format = function(options) {
  var defaults = {
  };
  var opts = jQuery.extend({}, defaults, options);

  this.each(function() {
    var obj = jQuery(this);
    var formats = obj.attr('data-format').split(' ');

    for (var i = 0; i < formats.length; i++) {
      var format = formats[i].split('-');
      var string = jQuery.trim(obj.html());
      var new_string = formatString(string, format[0], format[1]);
      obj.attr('title', string);
      obj.html(new_string);
    }
  });
};

var formatString = function(string, type, format) {
  if (string != undefined && string.length) {
    var old_string = string;
    switch(type) {
      case 'folder':
        switch(format) {
          case 'normal':
            var matches = string.match(/^(([a-z][:][\/]?)||([\/][a-z]+[\/]))?(.*)([\/][a-zA-Z0-9-_\.\[\]\,\'\(\)\s]+[\/]?)$/i);
            if (matches && (matches[1] + matches[5] != string)) {
              string = matches[1] + '...' + matches[5];
            }
            break;
        }
        break;
    }
  }
  return string;
};