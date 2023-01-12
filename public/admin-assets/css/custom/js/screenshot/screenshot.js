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
                            url: "screenshot/delete/" + delete_id,
                            data: {
                                _token: $("body").attr("token"),
                            },
                            success: function (response) {
                                swal(
                                    "Congratulations!",
                                    "Screenshot Deleted Succesfully !",
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

//now contact form submit

$(document).ready(function () {
    "use strict";
    $(".contact_form_submit").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "/contact/now",
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            success: function (response) {
                swal(
                    "Congratulations!",
                    "Message Sent Succesfully !",
                    "success"
                );
                $(".sa-confirm-button-container").on("click", function () {
                    location.reload();
                });
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

                    $(".sa-confirm-button-container").on("click", function () {
                        location.reload();
                    });
                }
                if (ajax.status == 404) {
                    swal({
                        title: "Opps !",
                        text: "Something Went Wrong Please Try Again !",
                        type: "error",
                        showCancelButton: true,
                        confirmButtonText: "Ok",
                    });

                    $(".sa-confirm-button-container").on("click", function () {
                        location.reload();
                    });
                }
            },
        });
    });
});
