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
});