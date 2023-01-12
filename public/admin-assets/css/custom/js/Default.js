$(document).ready(function(){
	"use strict";
	setTimeout(function() {
    $('#notice_msg,#success_msg').fadeOut('fast');
    $('.alert-dismissible').remove();
}, 3000); // <-- time in milliseconds
});

// $(document).ready(function(){
// 	"use strict";
// 	$('.input-images-1').imageUploader({
// 		imagesInputName: 'gallery[]',
// 		// preloadedInputName: 'old',
// 		// maxSize: 2 * 1024 * 1024,
// 		maxFiles: 10,
// 	});
// });


