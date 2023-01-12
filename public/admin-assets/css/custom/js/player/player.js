$(document).ready(function(){
	"use strict";
	$(".addCoinButton").on('click',function(){
		var playerID = $(this).attr("data-id");
		var playerName = $(this).attr("data-username");
		var TotalCoin = $(this).attr("data-coin");
		var TotalWinCoin = $(this).attr("data-wincoin");
		$(".player_id").val(playerID);
		$(".player_name").val(playerName);
		$(".total_coin").val(TotalCoin);
		$(".totalwin_coin").val(TotalWinCoin);
	});
});


$(document).ready(function(){
  "use strict";
  $(".SendNotification").on('click',function(){
    var UserID = $(this).attr("data-id");
    var playerName = $(this).attr("data-username");
    $(".userID").val(UserID);
    $(".player_name").val(playerName);
  });
});



$(document).ready(function(){
	"use strict";
	$(".CutCoinButton").on('click',function(){
		var playerID = $(this).attr("data-id");
		var playerName = $(this).attr("data-username");
		var TotalCoin = $(this).attr("data-coin");
		var TotalWinCoin = $(this).attr("data-wincoin");
		$(".player_id").val(playerID);
		$(".player_name").val(playerName);
		$(".total_coin").val(TotalCoin);
		$(".totalwin_coin").val(TotalWinCoin);

		$(".coin_value").on('input',function(){
	  	var userInputValue = $(this).val();
	  	if(userInputValue.length >= TotalCoin.length)
	  	{
	  		var max = Math.max(userInputValue, TotalCoin);
	  		if(max == userInputValue)
	  		{
	  			$(this).val("");
	  			$(".warning-not").removeClass("d-none");
	  		}
	  		else{
               $(".warning-not").addClass("d-none");
	  		}
	  	}
	  });
		$(".wincoin_value").on('input',function(){
	  	var userInputValue = $(this).val();
	  	if(userInputValue.length >= TotalWinCoin.length)
	  	{
	  		var max = Math.max(userInputValue, TotalWinCoin);
	  		if(max == userInputValue)
	  		{
	  			$(this).val("");
	  			$(".warning-notice").removeClass("d-none");
	  		}
	  		else{
               $(".warning-notice").addClass("d-none");
	  		}
	  	}
	  });


	});


});


$(document).ready(function(){
	"use strict";
	$(".EditUserDetails").on('click',function(){
		var playerID = $(this).attr("data-id");
		var playerName = $(this).attr("data-username");
		var playerPhone = $(this).attr("data-phone");
		var playerEmail = $(this).attr("data-email");
		var TotalCoin = $(this).attr("data-coin");
		var WinningCoin = $(this).attr("data-wincoin");
		var KycStatus = $(this).attr("data-kyc");

		$(".player_id").val(playerID);
		$(".player_name").val(playerName);
		$(".player_phone").val(playerPhone);
		$(".player_email").val(playerEmail);
		$(".total_coin").val(TotalCoin);
		$(".total_wincoin").val(WinningCoin);
		$(".userTitle").html("Edit "+playerName+" Profile");

		if(KycStatus == 1){
			$(".kyc_status").append("<option value='0'>Unverified</option><option value='1' selected>Verified</option><option value='2'>Rejected</option>");
		}else if(KycStatus == 2){
			$(".kyc_status").append("<option value='0'>Unverified</option><option value='1'>Verified</option><option value='2' selected>Rejected</option>");
		}else{
           $(".kyc_status").append("<option value='0' selected>Unverified</option><option value='1'>Verified</option><option value='2'>Rejected</option>");
		}

	});
});


//now update status of withdraw transction

$(document).ready(function(){
  "use strict";
  $(".edit_buuton").on('click',function(){
    var playerID = $(this).attr("data-id");
    var playerName = $(this).attr("data-username");
    var PaymentMethod = $(this).attr("data-pay");
    var requestID = $(this).attr("data-requestid");
    var TxnID = $(this).attr("data-trans");
    var status = $(this).attr("data-status");

    $(".player_id").val(playerID);
    $(".player_name").val(playerName);
    $(".payment_method").val(PaymentMethod);
    $(".request_id").val(requestID);
    $(".transaction_id").val(TxnID);
    $(".userTitle").html("Update "+playerName+" Withdraw Status");

    if(status == 1){
      $(".status").append("<option value='0'>Pending</option><option value='1' selected>Success</option><option value='2'>Faield</option>");
    }else if(status == 2){
      $(".status").append("<option value='0'>Pending</option><option value='1'>Success</option><option value='2' selected>Faield</option>");
    }else{
      $(".status").append("<option value='0' selected>Pending</option><option value='1'>Success</option><option value='2'>Faield</option>");
    }

  });
});




var domain = window.location.protocol + "//" + window.location.host;

//now user block unblock method

$(document).ready(function(){
	"use strict";
	$(".block_btn").each(function(){
		$(this).on('click',function(){
		  var playerID = $(this).attr("data-id");
		  var BannedID = $(this).attr("data-banned");
		    swal({
              title: "Are you sure?",
              text: "Do You Really Want To Change Status These User ?",
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
              	if(BannedID == 1){

              	//now ajax Request
                $.ajax({
                  type: "post",
                  url: domain+"/admin/player/ban/update/" + playerID,
                  data: {
                    _token: $("body").attr("token"),
                  },
                  success: function(response) {
                    swal(
                      'Congratulations!',
                      'User Blocked Succesfully !',
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

              	}else{
              		//now ajax Request
                $.ajax({
                  type: "post",
                  url: domain+"/admin/player/unban/update/" + playerID,
                  data: {
                    _token: $("body").attr("token"),
                  },
                  success: function(response) {
                    swal(
                      'Congratulations!',
                      'User Unblock Succesfully !',
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
              	}

              } else {
                swal("Cancelled", "Good ! Now User Are Safe !", "error");
              }
            }
          );
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
                  type: "POST",
                  url: domain+"/admin/player/delete/" + delete_id,
                  data: {
                    _token: $("body").attr("token"),
                  },
                  success: function(response) {
                    swal(
                      'Congratulations!',
                      'User Deleted Succesfully !',
                      'success'
                    );
                    $(".sa-confirm-button-container").on('click', function() {
                      window.location = domain+"/admin/player/all";
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

