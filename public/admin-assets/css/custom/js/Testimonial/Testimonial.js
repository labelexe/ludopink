//now view coding
$(document).ready(function () {
    "use strict";
    $(".view_buttion").each(function () {
        $(this).on("click", function () {
            var name = $(this).attr("view-username");
            var post = $(this).attr("view-Designation");
            var email = $(this).attr("view-usermail");
            var start = $(this).attr("view-Star");
            var starvalue = "";
            if (start == 1) {
                starvalue = '<i class="las la-star text-warning"></i>';
            } else if (start == 2) {
                starvalue =
                    '<i class="las la-star text-warning"></i><i class="las la-star text-warning"></i>';
            } else if (start == 3) {
                starvalue =
                    '<i class="las la-star text-warning"></i><i class="las la-star text-warning"></i><i class="las la-star text-warning"></i>';
            } else if (start == 4) {
                starvalue =
                    '<i class="las la-star text-warning"></i><i class="las la-star text-warning"></i><i class="las la-star text-warning"></i><i class="las la-star text-warning"></i>';
            } else if (start == 5) {
                starvalue =
                    '<i class="las la-star text-warning"></i><i class="las la-star text-warning"></i><i class="las la-star text-warning"></i><i class="las la-star text-warning"></i><i class="las la-star text-warning"></i>';
            }
            var review = $(this).attr("view-Review");
            var date = $(this).attr("view-date");
            $(".username").html(name);
            $(".useremail").html(email);
            $(".userDesignation").html(post);
            $(".userstart").html(starvalue);
            $(".userreview").html(review);
            $(".submitdatehai").html(date);
            $(".modal-title").html(name + " Review Details");
        });
    });
});

//now delete method
$(document).ready(function () {
    "use strict";
    $(".delete_buuton").each(function () {
        $(this).on("click", function () {
            var delete_id = $(this).attr("delete-id");
            swal(
                {
                    title: "Are you sure?",
                    text: "Do You Really Want To Delete These Records ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#28C76F",
                    cancelButtonColor: "#ac0e0d",
                    confirmButtonText: "Yes, Delete it!",
                    cancelButtonText: "No, Sorry!",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                },
                function (isConfirm) {
                    if (isConfirm) {
                        //now ajax Request
                        $.ajax({
                            type: "post",
                            url: "delete/" + delete_id,
                            data: {
                                _token: $("body").attr("token"),
                            },
                            success: function (response) {
                                swal(
                                    "Congratulations!",
                                    "Testimonial Deleted Succesfully !",
                                    "success"
                                );
                                $(".sa-confirm-button-container").on(
                                    "click",
                                    function () {
                                        location.reload();
                                    }
                                );
                            },

                            error: function (ajax) {
                                if (ajax.status == 500) {
                                    swal({
                                        title: "Opps !",
                                        text: "Something Went Wrong Please Try Again !",
                                        type: "error",
                                        showCancelButton: true,
                                        confirmButtonText: "Ok",
                                    });

                                    $(".sa-confirm-button-container").on(
                                        "click",
                                        function () {
                                            location.reload();
                                        }
                                    );
                                }
                                if (ajax.status == 404) {
                                    swal({
                                        title: "Opps !",
                                        text: "Something Went Wrong Please Try Again !",
                                        type: "error",
                                        showCancelButton: true,
                                        confirmButtonText: "Ok",
                                    });

                                    $(".sa-confirm-button-container").on(
                                        "click",
                                        function () {
                                            location.reload();
                                        }
                                    );
                                }
                            },
                        });
                    } else {
                        swal(
                            "Cancelled",
                            "Good ! Now You Data Is Safe !",
                            "error"
                        );
                    }
                }
            );
        });
    });
});
