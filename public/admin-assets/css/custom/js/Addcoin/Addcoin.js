//now view coding
var domain = window.location.protocol + "//" + window.location.host;
$(document).ready(function () {
    "use strict";
    $(".view_buttion").each(function () {
        $(this).on("click", function () {
            var playerID = $(this).attr("view-playerid");
            var name = $(this).attr("view-name");
            var email = $(this).attr("view-email");
            var coin = $(this).attr("view-coin");
            var image = $(this).attr("view-image");
            var date = $(this).attr("view-date");
            $(".playerid").html(playerID);
            $(".username").html(name);
            $(".usermail").html(email);
            $(".requestcoin").html(coin);
            $(".requestdate").html(date);
            $(".proofimage").html('<img src="'+domain+'/storage/Payment/'+image+'" width="200">');
            $(".modal-title").html(name + " Request For Add Coin");
            console.log(image);
        });
    });
});



//now add coin Request method
$(document).ready(function () {
    "use strict";
    $(".approved_button").each(function () {
        $(this).on("click", function () {
            var requestID = $(this).attr("delete-id");
            swal(
                {
                    title: "Are you sure?",
                    text: "Do You Really Want To Add Coin ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#28C76F",
                    cancelButtonColor: "#ac0e0d",
                    confirmButtonText: "Yes, Add it!",
                    cancelButtonText: "No, Sorry!",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                },
                function (isConfirm) {
                    if (isConfirm) {
                        //now ajax Request
                        $.ajax({
                            type: "post",
                            url: "approved/" + requestID,
                            data: {
                                _token: $("body").attr("token"),
                            },
                            success: function (response) {
                                swal(
                                    "Congratulations!",
                                    "Coin Added Succesfully !",
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
                            "Ohh ! You Have Cancle Request !",
                            "error"
                        );
                    }
                }
            );
        });
    });
});



//now delete method
$(document).ready(function () {
    "use strict";
    $(".reject_button").each(function () {
        $(this).on("click", function () {
            var delete_id = $(this).attr("delete-id");
            swal(
                {
                    title: "Are you sure?",
                    text: "Do You Really Want To Reject This Request ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#28C76F",
                    cancelButtonColor: "#ac0e0d",
                    confirmButtonText: "Yes, Reject it!",
                    cancelButtonText: "No, Sorry!",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                },
                function (isConfirm) {
                    if (isConfirm) {
                        //now ajax Request
                        $.ajax({
                            type: "post",
                            url: "reject/" + delete_id,
                            data: {
                                _token: $("body").attr("token"),
                            },
                            success: function (response) {
                                swal(
                                    "Congratulations!",
                                    "Request Rejected Succesfully !",
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
