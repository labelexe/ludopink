
//its global variable
$(document).ready(function(){
	"use strict";
	$(".edit_buuton").each(function(){
    
		$(this).on('click',function(){
			var edit_id = $(this).attr("data-id");
      $(".offerimage").removeAttr("required");
      $(".image_field").html("");
			//now ajax request
			$.ajax({
				type : "GET",
				url: "offer/edit/" + edit_id,
				data: {
                    _token: $("body").attr("token"),
                },
                success : function(response){
                	console.log(response);
                  $(".image_button").removeClass("d-none");
                	var brand_id = response.data[0]._id;
                	var offer_title = response.data[0].offer_title;
                	var add_offer_coin = response.data[0].add_offer_coin;
                	var user_received_coin = response.data[0].user_received_coin;                	var offerimage = response.data[0].offerimage;

                  var domain = window.location.protocol + "//" + window.location.host;



                	//now append value
                	$(".offer_title").val(offer_title);
                	$(".add_offer_coin").val(add_offer_coin);
                	$(".user_received_coin").val(user_received_coin);
                  //create dynamic image image_field
                  var image = document.createElement("IMG");
                  image.width = "100";
                  image.src = domain+"/storage/OfferImg/"+offerimage;
                  $(".image_field").append(image);
                	$(".submit_btn").html("Update");
                	$(".create_brand").attr("action","offer/update/"+brand_id);
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
                  url: "offer/delete/" + delete_id,
                  data: {
                    _token: $("body").attr("token"),
                  },
                  success: function(response) {
                    swal(
                      'Congratulations!',
                      'Special Offer Deleted Succesfully !',
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
