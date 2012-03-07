/**
 * @ver 1.0
 * @name jQuery Delays
 */
jQuery.fn.delays = function(time, func) {
  return this.each(function() {
    setTimeout(func, time);
  });
};