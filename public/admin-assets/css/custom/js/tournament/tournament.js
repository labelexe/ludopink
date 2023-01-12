$(document).ready(function(){
	"use strict";
    $(".player_select").on('change',function(){
    	var NumberOfPlayer = $(this).val();
    	if(NumberOfPlayer ==2){
    		$(".twoplayer_win_amount").removeClass("d-none");
    		$(".twoPlayerWin").attr("required","required");
    		$(".selectNoOFWinner").addClass("d-none");
    		$(".selectWinner").removeAttr("required");
    	}else{
    		$(".twoplayer_win_amount").addClass("d-none");
    		$(".twoPlayerWin").removeAttr("required");
    		$(".selectNoOFWinner").removeClass("d-none");
    		$(".selectWinner").attr("required","required");
    	}
    });

    //now select wwinner

    $(".selectWinner").on('change',function(){
    	var NumberOfWinner = $(this).val();
    	if(NumberOfWinner == 1){
    		$(".four1wiiner").removeClass("d-none");
    		$(".1stWinner").attr("required","required");
    		$(".four2wiiner").addClass("d-none");
    		$(".2ndWinner").removeAttr("required","required");
    		$(".four3wiiner").addClass("d-none");
    		$(".3rdWinner").removeAttr("required","required");

    	}else if(NumberOfWinner == 2){
            $(".four2wiiner").removeClass("d-none");
    		$(".2ndWinner").attr("required","required");
    		$(".four1wiiner").removeClass("d-none");
    		$(".1stWinner").attr("required","required");
    		$(".four3wiiner").addClass("d-none");
    		$(".3rdWinner").removeAttr("required","required");

    	}else if(NumberOfWinner == 3){
            $(".four3wiiner").removeClass("d-none");
    		$(".3rdWinner").attr("required","required");
    		$(".four2wiiner").removeClass("d-none");
    		$(".2ndWinner").attr("required","required");
    		$(".four1wiiner").removeClass("d-none");
    		$(".1stWinner").attr("required","required");
    	}
    });


});