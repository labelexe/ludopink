//allow seo for propduct
$(document).ready(function(){
  "use strict";
  //now check condition
  $("#customSwitch").on('click',function(){
    if($(this).prop("checked") == true){
        $(".allow_seo").val("1");
        $(".product_seo_box").removeClass("d-none");
        $(".meta_key").attr("required","required");
        $(".meta_desc").attr("required","required");
    }else{
        $(".allow_seo").val("0");
      $(".product_seo_box").addClass("d-none");
      $(".meta_key").removeAttr("required");
      $(".meta_desc").removeAttr("required");
    }
  });
});

//now calculate product discount
$(document).ready(function(){
  "use strict";
  //get previous price
  $(".prev_price").on('input',function(){
    $(".sale_price").removeAttr("disabled");
    var prev_price = $(this).val();
  //now get sale Price
  $(".sale_price").on('input',function(){
    var sale_price = $(this).val();
      //now calculate percentage
      var minus = prev_price-sale_price;
      var devide = minus/prev_price;
      var final = devide*100;
      var get_percent = Math.trunc(final);
      $(".discount").val(get_percent);
  });
  });
});

//allow Highlight in Featured
$(document).ready(function(){
  "use strict";
  //now check condition
  $("#in_featured").on('click',function(){
    if($(this).prop("checked") == true){
        $(".in_featured").val("1");
    }else{
      $(".in_featured").val("0");
    }
  });
});

//allow Highlight in Best Seller
$(document).ready(function(){
  "use strict";
  //now check condition
  $("#best_saller").on('click',function(){
    if($(this).prop("checked") == true){
        $(".best_saller").val("1");
    }else{
      $(".best_saller").val("0");
    }
  });
});

//allow Highlight in Top Rated
$(document).ready(function(){
  "use strict";
  //now check condition
  $("#top_rated").on('click',function(){
    if($(this).prop("checked") == true){
        $(".top_rated").val("1");
    }else{
      $(".top_rated").val("0");
    }
  });
});

//allow Highlight in Big Save
$(document).ready(function(){
  "use strict";
  //now check condition
  $("#big_save").on('click',function(){
    if($(this).prop("checked") == true){
        $(".big_save").val("1");
    }else{
      $(".big_save").val("0");
    }
  });
});

//allow Highlight in Hot
$(document).ready(function(){
  "use strict";
  //now check condition
  $("#hot_sale").on('click',function(){
    if($(this).prop("checked") == true){
        $(".hot_sale").val("1");
    }else{
      $(".hot_sale").val("0");
    }
  });
});

//allow Highlight in New
$(document).ready(function(){
  "use strict";
  //now check condition
  $("#in_new").on('click',function(){
    if($(this).prop("checked") == true){
        $(".in_new").val("1");
    }else{
      $(".in_new").val("0");
    }
  });
});

//allow Highlight in Trending
$(document).ready(function(){
  "use strict";
  //now check condition
  $("#trending").on('click',function(){
    if($(this).prop("checked") == true){
        $(".trending").val("1");
    }else{
      $(".trending").val("0");
    }
  });
});

//allow Highlight in Sale
$(document).ready(function(){
  "use strict";
  //now check condition
  $("#in_sale").on('click',function(){
    if($(this).prop("checked") == true){
        $(".in_sale").val("1");
    }else{
      $(".in_sale").val("0");
    }
  });
});

//allow Highlight in Sale
$(document).ready(function(){
  "use strict";
  //now check condition
  $("#flash_deal").on('click',function(){
    if($(this).prop("checked") == true){
        $(".flash_deal").val("1");
    }else{
      $(".flash_deal").val("0");
    }
  });
});

//now on flash sale on product
$(document).ready(function(){
  "use strict";
  //now on flash sale on product
  $("#flash_deal").on('click',function(){
    if($(this).prop("checked") == true){
        $(".flash_date_field").removeClass("d-none");
        $(".flash_date").attr("required","required");
    }else{
          $(".flash_date_field").addClass("d-none");
          $(".flash_date").removeAttr("required");
    }
  });
});



//now get SubCategory
$(document).ready(function(){
  "use strict";
  $(".category_name").on('change',function(){
    var cat_name = $(this).val();
    //now send ajax Request
    $.ajax({
      type : "GET",
      url : "/admin/product/get/subcategory",
      data: {
        _token: $("body").attr("token"),
        category_name : cat_name,
      },
      success : function(response){
        $(".sub_category").html("");
        $(".sub_category").append("<option selected label='Choose one'></option>");
        response.data.forEach(function(data){
          //now create option Tag
          var sub_category = data.subcategory_name;
          $(".sub_category").append("<option value="+sub_category+">"+sub_category+"</option>");
        });
      },
      error: function (ajax) {
        $(".sub_category option").each(function(){
          this.remove()
        });
        $(".fullpage-loader").addClass("d-none");
        if (ajax.status == 500) {
         $(".sub_category").append("<option selected label='Choose one'></option>");
          }
         if (ajax.status == 404) {
          $(".sub_category").append("<option selected label='Choose one'></option>");
        }
       }
    });
  });
});

//now create dynamic slug
$(document).ready(function(){
  "use strict";
 $(".product_title").on('input', function() {
   var title = $(this).val().trim();
   var slug = title.toLowerCase().replace(/ /g, "-");
   $(".product_slug").val(slug);
 });
});

//now delete method

$(document).ready(function(){
	"use strict";
	$(".delete_buuton").each(function(){
		$(this).on('click',function(){
		  var delete_id = $(this).attr("delete-id");
		    swal({
              title: "Are you sure?",
              text: "Do You Really Want To Delete These Records ?",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#28C76F",
              cancelButtonColor: '#ac0e0d',
              confirmButtonText: "Yes, Delete it!",
              cancelButtonText: "No, Sorry!",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm) {
              if (isConfirm) {
                //now ajax Request
                $.ajax({
                  type: "post",
                  url: "physical/delete/" + delete_id,
                  data: {
                    _token: $("body").attr("token"),
                  },
                  success: function(response) {
                    swal(
                      'Congratulations!',
                      'Product Deleted Succesfully !',
                      'success'
                    );
                    $(".sa-confirm-button-container").on('click', function() {
                      location.reload();
                    });
                  },

                  error: function(ajax) {
                    if (ajax.status == 500) {

                      swal({
                        title: "Opps !",
                        text: "Something Went Wrong Please Try Again !",
                        type: "error",
                        showCancelButton: true,
                        confirmButtonText: 'Ok',
                      });

                      $(".sa-confirm-button-container").on('click', function() {
                        location.reload();
                      });
                    }
                    if (ajax.status == 404) {

                      swal({
                        title: "Opps !",
                        text: "Something Went Wrong Please Try Again !",
                        type: "error",
                        showCancelButton: true,
                        confirmButtonText: 'Ok',
                      });

                      $(".sa-confirm-button-container").on('click', function() {
                        location.reload();
                      });

                    }
                  }

                });
              } else {
                swal("Cancelled", "Good ! Now You Data Is Safe !", "error");
              }
            }
          );
		});
	});
});
