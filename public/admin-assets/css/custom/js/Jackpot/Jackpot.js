
//its global variable
$(document).ready(function(){
	"use strict";
	$(".edit_buuton").each(function(){
    
		$(this).on('click',function(){
			var edit_id = $(this).attr("data-id");
			//now ajax request
			$.ajax({
				type : "GET",
				url: "jackpoint/edit/" + edit_id,
				data: {
                    _token: $("body").attr("token"),
                },
                success : function(response){
                	console.log(response);
                	var brand_id = response.data[0]._id;
                	var jackpot_entry = response.data[0].jackpot_entry;
                  var number_of_game = response.data[0].number_of_game;

                  var domain = window.location.protocol + "//" + window.location.host;

                	//now append value
                	$(".jackpot_entry").val(jackpot_entry);
                  $(".number_of_game").val(number_of_game);
                	$(".submit_btn").html("Update");
                	$(".create_brand").attr("action","jackpoint/update/"+brand_id);
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
                  url: "jackpoint/delete/" + delete_id,
                  data: {
                    _token: $("body").attr("token"),
                  },
                  success: function(response) {
                    swal(
                      'Congratulations!',
                      'Jackpot Deleted Succesfully !',
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
