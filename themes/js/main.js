
(function ($) {
    "use strict";
    if (window.location.href.indexOf("index") > -1) { 
        $("#index").addClass("active"); 
      }

      if (window.location.href.indexOf("about_us") > -1) { 
        $("#about_us").addClass("active"); 
      }
      if (window.location.href.indexOf("advisors") > -1) { 
        $("#advisors").addClass("active"); 
      }
      if (window.location.href.indexOf("contact_us") > -1) { 
        $("#contact_us").addClass("active"); 
      }
      if (window.location.href.indexOf("blog") > -1) { 
        $("#blog").addClass("active"); 
      }
      if (window.location.href.indexOf("register") > -1) { 
        $("#register").addClass("active"); 
      }
      if (window.location.href.indexOf("profile") > -1) { 
        $("#profile").addClass("active"); 
      }

      $(".select2").select2();

    })(jQuery);