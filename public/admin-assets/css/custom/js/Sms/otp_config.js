//allow New Registration
$(document).ready(function(){
  "use strict";
  //now check condition
  $(".new_regis").on('click',function(){
    if($(this).prop("checked") == true){
        $(".new_regis").val("1");
    }else{
      $(".new_regis").val("0");
    }
  });
});

//allow Forgot Password
$(document).ready(function(){
  "use strict";
  //now check condition
  $(".reset_otp_setup").on('click',function(){
    if($(this).prop("checked") == true){
        $(".reset_otp_setup").val("1");
    }else{
      $(".reset_otp_setup").val("0");
    }
  });
});


//allow Order Success
$(document).ready(function(){
  "use strict";
  //now check condition
  $(".order_success").on('click',function(){
    if($(this).prop("checked") == true){
        $(".order_success").val("1");
    }else{
      $(".order_success").val("0");
    }
  });
});


//allow Change Order Status
$(document).ready(function(){
  "use strict";
  //now check condition
  $(".change_status").on('click',function(){
    if($(this).prop("checked") == true){
        $(".change_status").val("1");
    }else{
      $(".change_status").val("0");
    }
  });
});


//allow cancel_otp
$(document).ready(function(){
  "use strict";
  //now check condition
  $(".cancel_otp").on('click',function(){
    if($(this).prop("checked") == true){
        $(".cancel_otp").val("1");
    }else{
      $(".cancel_otp").val("0");
    }
  });
});


//allow deliverd_otp
$(document).ready(function(){
  "use strict";
  //now check condition
  $(".deliverd_otp").on('click',function(){
    if($(this).prop("checked") == true){
        $(".deliverd_otp").val("1");
    }else{
      $(".deliverd_otp").val("0");
    }
  });
});



//allow twillo
$(document).ready(function(){
  "use strict";
  //now check condition
  $(".twillo").on('click',function(){
    if($(this).prop("checked") == true){
        $(".twillo").val("1");
    }else{
      $(".twillo").val("0");
    }
  });
});



//allow textlocal
$(document).ready(function(){
  "use strict";
  //now check condition
  $(".textlocal").on('click',function(){
    if($(this).prop("checked") == true){
        $(".textlocal").val("1");
    }else{
      $(".textlocal").val("0");
    }
  });
});



//allow msg
$(document).ready(function(){
  "use strict";
  //now check condition
  $(".msg").on('click',function(){
    if($(this).prop("checked") == true){
        $(".msg").val("1");
    }else{
      $(".msg").val("0");
    }
  });
});
