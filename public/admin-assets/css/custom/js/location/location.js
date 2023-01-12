$(document).ready(function() {
    "use strict";
    // create dynamic slug
    $(".state").on('change', function() {
        var state_id = $(this).val();
        //now ajax Request

        $.ajax({
            type: "POST",
            url: "location/city",
            data: {
                 state_id: state_id,
                _token: $("body").attr("token"),
            },
            dataType: 'json',
            success: function(result){
							$(".city").html("");
                $(".city").append('<option value="">Select City Name</option>');
                $.each(result.cities, function(key, value) {
                    $(".city").append('<option value="' + value.name + '">' + value.name + '</option>');
                });
            }

        });
    });
});

//now edit method
//its global variable
$(document).ready(function() {
    "use strict";
    $(".edit_button").each(function() {
        var selected_option = "";
        $(this).on('click', function() {
            var edit_id = $(this).attr("data-id");
            //now ajax request
            $.ajax({
                type: "GET",
                url: "location/edit/" + edit_id,
                data: {
                    _token: $("body").attr("token"),
                },
                success: function(response) {
                    console.log(response);
                    var location_id = response.data[0].id;
                    var state = response.data[0].state;
                    var city = response.data[0].city;
                    var status = response.data[0].status;

                    //now append value
                    $(".state option").removeAttr("selected");
                    $(".state option").each(function() {
                        if ($(this).val() == state) {
                            var option = $(this).attr("selected", "selected");
                            $(".state").append(option);
                        }
                    });

										//now get city

										$.ajax({
												type: "POST",
												url: "location/city",
												data: {
														 state_id: state,
														_token: $("body").attr("token"),
												},
												dataType: 'json',
												success: function(result){
													$(".city").html("");
														$(".city").append('<option value="">Select City Name</option>');
														$.each(result.cities, function(key, value) {
															if(city == value.name){
									                $(".city").append('<option selected value="' + value.name + '">' + value.name + '</option>');
									              }
									              else{
									                  $(".city").append('<option value="' + value.name + '">' + value.name + '</option>');
									              }

														});
												}

										});
                    if (status == 1) {
                        var selected_option = "<option selected value='1'>Active</option><option value='0'>Deactivate</option>";
                    } else {
                        var selected_option = "<option value='1'>Active</option><option selected value='0'>Deactivate</option>";
                    }
                    $(".status_option").html(selected_option);
                    $(".submit_btn").html("Update");
                    $(".create_location").attr("action", "location/update/" + location_id);
                }

            });
        });
    });
});

//now delete method

$(document).ready(function() {
    "use strict";
    $(".delete_button").each(function() {
        $(this).on('click', function() {
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
                            url: "location/delete/" + delete_id,
                            data: {
                                _token: $("body").attr("token"),
                            },
                            success: function(response) {
                                swal(
                                    'Congratulations!',
                                    'Location Deleted Succesfully !',
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
