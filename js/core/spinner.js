/**
 * @ver 1.0
 * @name jQuery Spinner Loading Icon
 */
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