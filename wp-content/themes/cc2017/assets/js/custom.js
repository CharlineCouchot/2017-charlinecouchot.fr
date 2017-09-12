/**
 * scripts.js
 */

 (function($) {
   "use strict";

   $(window).on('load', function() {
     ajaxReload();
     
     $(".preloader").fadeOut("slow", function() {
       $(".preloader-left").addClass("slide-left");
     });
   });
 })(jQuery);
