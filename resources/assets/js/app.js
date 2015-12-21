window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');

$(function(){
    console.log($.fn.tooltip.Constructor.VERSION);
});
