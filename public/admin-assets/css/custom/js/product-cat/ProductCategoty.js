$(document).ready(function(){
	"use strict";
  // create dynamic slug
	$(".category_name").on('input',function(){
		var category_name = $(this).val();
		var category_slug = category_name.toLowerCase().replace(/ /g, "-");
		$(".category_slug").val(category_slug);
	});
});

//its global variable
$(document).ready(function(){
	"use strict";
	$(".edit_buuton").each(function(){
		var selected_option = "";
		$(this).on('click',function(){
			var edit_id = $(this).attr("data-id");
			//now ajax request
			$.ajax({
				type : "GET",
				url: "category/edit/" + edit_id,
				data: {
                    _token: $("body").attr("token"),
                },
                success : function(response){
                	//console.log(response);
                	var category_id = response.data[0].id;
                	var category_name = response.data[0].category_name;
                	var category_slug = response.data[0].category_slug;
                	var meta_key = response.data[0].meta_key;
                	var meta_desc = response.data[0].meta_desc;
                	var status = response.data[0].status;
                	var create_date = response.data[0].create_date;

                	//now append value
                	$(".category_name").val(category_name);
                	$(".category_slug").val(category_slug);
                	$(".meta_key").val(meta_key);
                	$(".meta_desc").val(meta_desc);
                	$(".create_date").val(create_date);
                	if(status == 1){
                        var selected_option = "<option selected value='1'>Active</option><option value='0'>Deactivate</option>";
                	}else{
                        var selected_option = "<option value='1'>Active</option><option selected value='0'>Deactivate</option>";
                	}
                	$(".status_option").html(selected_option);
                	$(".submit_btn").html("Update");
                	$(".create_category").attr("action","category/update/"+category_id);
                }

			});
		});
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
                  url: "category/delete/" + delete_id,
                  data: {
                    _token: $("body").attr("token"),
                  },
                  success: function(response) {
                    swal(
                      'Congratulations!',
                      'Product Category Deleted Succesfully !',
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
