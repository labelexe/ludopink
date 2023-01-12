//create about dynamic slug
$(document).ready(function(){
  "use strict";
 $(".about_title").on('input', function() {
   var title = $(this).val().trim();
   var slug = title.toLowerCase().replace(/ /g, "-");
   $(".about_slug").val(slug);
 });
});

//create tearms condition policy dynamic slug
$(document).ready(function(){
  "use strict";
 $(".terms_title").on('input', function() {
   var title = $(this).val().trim();
   var slug = title.toLowerCase().replace(/ /g, "-");
   $(".terms_slug").val(slug);
 });
});

//create privacy policy dynamic slug
$(document).ready(function(){
  "use strict";
 $(".privacy_title").on('input', function() {
   var title = $(this).val().trim();
   var slug = title.toLowerCase().replace(/ /g, "-");
   $(".privacy_slug").val(slug);
 });
});

//create privacy policy dynamic slug
$(document).ready(function(){
    "use strict";
   $(".refund_title").on('input', function() {
     var title = $(this).val().trim();
     var slug = title.toLowerCase().replace(/ /g, "-");
     $(".refund_slug").val(slug);
   });
  });


